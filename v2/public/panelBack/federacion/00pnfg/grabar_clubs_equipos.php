<?php


  $mysqli = conectar();  
        
        
        $cId=$_GET['cId']??0;   
        if ($cId>8959590) { $cId=0; } 

        $sql='SELECT id,federacion_id FROM club WHERE comunidad_id="'.$i.'" AND equipos>0 AND federacion_id>'.$cId.' AND estado=0 ORDER BY federacion_id';
        $resultadoSQL = mysqli_query($mysqli, $sql);
        $clubs = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

        $sql='SELECT id,ip FROM proxis WHERE estado<>1 ORDER BY id LIMIT 1';
        $resultadoSQL = mysqli_query($mysqli, $sql);
        $proxis = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);        
        
        $cuentaProxis=0;
        foreach ($clubs as $key => $value) {
            
            $federacion_id=(int)$value['federacion_id'];
            $club_id=(int)$value['id'];
            $proxi=$proxis['ip'];
            $id_proxi=$proxis['id'];
            $sql='UPDATE proxis SET uso=uso+1 WHERE id='.$id_proxi;
            mysqli_query($mysqli, $sql);            
            
            $url3='http://www.futgal.es/pnfg/NPcd/NFG_VerClub?cod_primaria=1000118&codigo_club='.$federacion_id;
            echo '<h3>'.$url3.' - proxy: '.$proxi.' - id:'.$id_proxi.'</h3>';
            $html = new simple_html_dom();
            $content=getPage($url3,$proxi,$id_proxi);  

            
            if (strlen($content)<100) {
                echo $content.'<br />';
                
                $sql='UPDATE proxis SET estado=1 WHERE id='.$id_proxi;
                echo $sql;
                mysqli_query($mysqli, $sql); ?>

                <script> 
                window.location.href = 'index.php?cId=<?php echo $federacion_id?>'; 
                </script>
                <?php 
                die;
                
            }

            

            $string = str_get_html($content);
            $html->load($string);
            $equipos=array();
            foreach($html->find('table.tabla_rdg') as $tabla){

                echo $tabla->innertext . '<br>';

                if($tabla->find('table[cellpadding=2]')){
                    foreach($tabla->find('table[cellpadding=2]') as $e){
                        foreach($e->find('a') as $k => $a){
                            $equipos[$k+1]['enlace'] = $a->href;
                            $equipos[$k+1]['equipo'] = $a->plaintext;
                            $equipos[$k+1]['federacion_id'] = $federacion_id;
                            $equipos[$k+1]['club_id'] = $club_id;
                        }

                        foreach($e->find('td[align=left]') as $k => $td){
                            $equipos[$k]['cat'] = $td->plaintext;
                        }
                    }
                } else {
                    echo 'texto no encontrado';
                }        
            }

            
            
            
            if (count($equipos)>0){
                foreach ($equipos as $key => $value) {
                    if (!isset($value['enlace'])){ continue; }
                    $Efederacion_id=$value['enlace'];
                    $Efederacion_id=str_replace('/pnfg/NPcd/NFG_VisEquipos?cod_primaria=1000119&Codigo_Equipo=', '', $Efederacion_id);
                    $equipo=$value['equipo'];
                    $equipo=str_replace('"', '', $equipo);
                    $Cfederacion_id=$value['federacion_id'];
                    $club_id=$value['club_id'];
                    $cat=$value['cat'];
                    $cat=str_replace('&nbsp;', '', $cat);
                    
                    $sql="SELECT id FROM equipo WHERE federacion_club_id='".$Cfederacion_id."' AND federacion_eq_id=".$Efederacion_id;
                    $resultadoSQL = mysqli_query($mysqli, $sql);
                    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
                    if (count($resultado)==0){
                        $sql='INSERT INTO equipo(club_id, nombre, federacion_club_id, federacion_eq_id,categoria) VALUES ("'.$club_id.'", "'.$equipo.'", "'.$Cfederacion_id.'", "'.$Efederacion_id.'", "'.$cat.'")';
                        $mysqli = conectar();
                        mysqli_query($mysqli, $sql);
                        echo $sql.'<br />';
                        echo "Equipo insertado<br />"; 
                    } else { 
                        echo "Este equipo ya esta grabado<br />"; 
                    }
                }

                $sql='UPDATE club SET estado=1 WHERE id='.$club_id;
                echo $sql;
                mysqli_query($mysqli, $sql);


            }

            $cuentaProxis++;

            if ($cuentaProxis>25){
                $sql='UPDATE proxis SET estado=2 WHERE id='.$id_proxi;
                echo $sql;
                mysqli_query($mysqli, $sql); 
                $cuentaProxis==0;
                $sql='SELECT id,ip FROM proxis WHERE estado<>1 ORDER BY estado, ip DESC LIMIT 1';
                $resultadoSQL = mysqli_query($mysqli, $sql);
                $proxis = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);  
            }


            $html->clear();
            unset($html);                
            sleep(5);
        }

        

        
        /*
        //GRABAR CLUBES - OPCION 1

        include('../'.$i.'/clubs.php');

        $club=explode(':', $clubes);
        $equipos=$c[4]??0;
        foreach ($club as $key => $value) {
            $c=explode(',', $value);
            $sql='SELECT id FROM club WHERE federacion_id="'.trim($c[1]).'"';
            $resultadoSQL = mysqli_query($mysqli, $sql);
            $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
            if (count($resultado)==0){
                $sql='INSERT INTO club(nombre, federacion_id, federacion_ref, comunidad_id, localidad, equipos) 
                VALUES ("'.trim($c[2]).'", "'.trim($c[1]).'", "'.trim($c[0]).'", "'.$i.'", "'.trim($c[3]).'", "'.$equipos.'")';
                mysqli_query($mysqli, $sql);
                echo $sql.'<br />';
            } else { echo 'Esta club ya está grabado<br />'; }
        }
        */

?>
