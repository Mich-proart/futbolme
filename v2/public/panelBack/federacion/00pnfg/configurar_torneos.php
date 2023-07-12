<?php

$url3='http://futgal.es/pnfg/NPcd/NFG_VisGrupos_Vis?&cod_primaria=1000123';       
    
    $mysqli = conectar(); 
        
    $cId=$_GET['cId']??0;   
    if ($cId>3309) { $cId=0; } 

        $sql='SELECT id,torneo_id,grupo_id FROM torneo WHERE comunidad_id="'.$i.'" AND id>'.$cId.' AND estado=0 ORDER BY id';
        $resultadoSQL = mysqli_query($mysqli, $sql);
        $torneos = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

        $sql='SELECT id,ip FROM proxis WHERE estado<>1 ORDER BY estado, ip DESC LIMIT 1';
        $resultadoSQL = mysqli_query($mysqli, $sql);
        $proxis = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);        
        
        $cuentaProxis=0;
        foreach ($torneos as $key => $value) {
            
            $id=(int)$value['id'];
            $grupo_id=(int)$value['grupo_id'];
            $torneo_id=(int)$value['torneo_id'];
            $url=$url3.'&codcompeticion='.$torneo_id.'&codgrupo='.$grupo_id;
            //echo $url3.'<br />';echo $url.'<br />';die;

            $proxi=$proxis['ip'];
            $id_proxi=$proxis['id'];
            $sql='UPDATE proxis SET uso=uso+1 WHERE id='.$id_proxi;
            mysqli_query($mysqli, $sql); 
            echo '<h3>'.$url.' - proxy: '.$proxi.' - id:'.$id_proxi.'</h3>';
            
            $html = new simple_html_dom();
            $content=getPage($url,$proxi,$id_proxi);  
            
            if (strlen($content)<100) {
                echo $content.'<br />';                
                $sql='UPDATE proxis SET estado=1 WHERE id='.$id_proxi;
                echo $sql;
                mysqli_query($mysqli, $sql); ?>
                <script> 
                window.location.href = 'index.php?cId=<?php echo $id?>'; 
                </script>
                <?php 
                die;                
            }

            
            //buscamos el texto en el contenido.
            $string = str_get_html($content);
            $html->load($string);
            $torneos=array();
                
                    foreach($html->find('table[height=18]') as $table){  

                    echo $table->innertext . '<br>';

                        foreach($table->find('td') as $e)
                        $torneos[] = $e->plaintext;
                        //$item['body'] = trim($article->find('div.body', 0)->plaintext);
                    }
                
           
            if (count($torneos)>0){                    
                    $equipos=$torneos[1];
                    $rondas=$torneos[3];
                    $jornadas=$torneos[5];                    
                        $sql='UPDATE torneo SET equipos='.$equipos.',rondas='.$rondas.',jornadas='.$jornadas.',estado=1 WHERE id='.$id;
                        $mysqli = conectar();
                        mysqli_query($mysqli, $sql);
                        echo $sql.'<br />';
                        echo "Torneo actualizado<br />";                
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

