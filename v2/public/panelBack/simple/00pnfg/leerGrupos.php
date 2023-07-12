<?php
$mysqli = conectar();

$sql="SELECT id FROM torneo WHERE comunidad_id=".$i." AND grupo_id=0 AND estado=1";
$resultadoSQL = mysqli_query($mysqli, $sql);
$tors = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

$sql='SELECT id,ip FROM proxis WHERE fallo<3 ORDER BY fallo';
$resultadoSQL = mysqli_query($mysqli, $sql);
$proxis = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);  

$proxis2=array_rand($proxis,1);

$proxis3=$proxis[$proxis2];


    $proxi=$proxis3['ip'];
    $id_proxi=$proxis3['id'];

    echo $proxi."<hr />";
    
    foreach ($tors as $kt => $vt) {
        $sql="SELECT id,nombre,competicion_id valor FROM torneo WHERE id=".$vt['id'];
        $resultadoSQL = mysqli_query($mysqli, $sql);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
            $categorias=array();
            foreach ($resultado as $kk => $v) {
            	if ($v['valor']==0){ continue; }
                $categorias[$kk]['id']=$v['id'];
                $categorias[$kk]['nombre']=$v['nombre'];
                $categorias[$kk]['valor']=$v['valor']; 
                $competicion_id=$v['valor']; 
                $cola='&CodTemporada=14&CodJornada=1&cod_agrupacion=1&Sch_Tipo_Juego=';  
                
                $urlNueva=$url.'&CodCompeticion='.$competicion_id.$cola; //CodCompeticion en mayúsculas.
                echo $urlNueva.'<br />';
            	$html = new simple_html_dom();
            	$content=getPage($urlNueva, $proxi,$id_proxi);

                $largo=strlen($content);
                echo $largo.' caracteres de retorno.<hr />';
                if ($largo<500) { 
                echo 'fallido'; 
                $sq1="UPDATE proxis SET fallo=fallo+1 WHERE id=".$id_proxi;
                echo $sq1.'<br />';
                mysqli_query($mysqli, $sq1);

                die; } //nos salimos del primer for
                
                $sq1="UPDATE proxis SET uso=uso+1 WHERE id=".$id_proxi;
                echo $sq1.'<br />';
                mysqli_query($mysqli, $sq1);

                $string = str_get_html($content);
                $html->load($string);                
                foreach($html->find('select#grupo') as $div){ 

                    echo $div;


                    foreach ($div->find('option') as $k => $op){
                        $nombre = trim($op->plaintext);
                        $valor = trim($op->value);
                        $categorias[$kk]['torneos'][$k]['nombre']=$nombre;
                        $categorias[$kk]['torneos'][$k]['valor']=$valor;                       
                    } 
                } 
                 
                       
            $html->clear();
            unset($html);
            }

            

            imp($categorias);  

                
            foreach ($categorias as $key => $value) {
                $id=$value['id'];
                echo $id.' '.$value['valor'].' '.$value['nombre'].'<br /> ';
        		$contador=0;
                foreach ($value['torneos'] as $k1 => $v1) {
                    if ($v1['valor']==0){ continue; }
                    $contador++;
                    $grupo_id=$v1['valor'];
                    $grupo=$v1['nombre'];            
                    if ($contador==1){
                        $sqContador='UPDATE torneo SET grupo="'.$grupo.'", grupo_id='.$grupo_id.' WHERE id='.$id;
                        
                    } else {
                        $nuevo=duplicar($id,$grupo,$grupo_id,$contador);
                        echo 'registro duplicado:'.$nuevo.' - del registro '.$id; 
                    }             			
        		}   
            }

            echo $sqContador."<br />";
            mysqli_query($mysqli, $sqContador);

            

            $sq1="SELECT id,ip,uso,fallo,estado FROM proxis ORDER BY uso DESC";
            $resultadoSQL = mysqli_query($mysqli, $sq1);
            $leerProxis = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
            foreach ($leerProxis as $key => $p) {
                echo 'id '.$p['id'].' u:'.$p['uso'].' f:'.$p['fallo'].' e:'.$p['estado'].' - '.$p['ip'].'<br />';
            }

            die;

    } //tors sin grupo_id


?>