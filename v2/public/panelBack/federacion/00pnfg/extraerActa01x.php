<?php
        //buscamos el texto en el contenido.
$string = str_get_html($content);
$html->load($string);

$jugador=array();

$hayGoles=0;

foreach($html->find('table.tabla_rdg') as $tabla){

  foreach($tabla->find('table') as $k => $tablaSin){
    if ($k==11) { 
        //echo $tablaSin;
        echo '<h3>goles  ->'.$k.'</h3>';
        foreach($tablaSin->find('tr') as $k => $e){
            echo $e->plaintext . '<br>';            
            if ($e->find('td',1) != null){ 
            $jugador['goles'][$k]['resultado']= trim($e->find('td',0)->plaintext);
            $jugador['goles'][$k]['nombre']= trim($e->find('td',1)->plaintext);
            $jugador['goles'][$k]['tipo']= trim($e->find('a.img',0)->class); 
            //$hayGoles=0;
            }           
        }
    } //goles
    if ($k==12) { 
    //echo $tablaSin; 
            echo '<h3>estadio  ->'.$k.'</h3>';
            $jugador['estadio']['nombre']=trim($tablaSin->find('a',0)->plaintext);
            $jugador['estadio']['enlace']=trim($tablaSin->find('a',0)->href);
        
    } //estadio y ciudad
  }

  //imp($hayGoles);die;

  foreach($tabla->find('table.tabla_rdg') as $tabla2){
    
    //echo $tabla2;
    
    
        foreach($tabla2->find('table.tabla_rdg') as $kt => $tabla3){
            if ($cuentaTablas==0){ //titulares - local
                echo '<h3>titulares local  ->'.$kt.'</h3>';
                foreach($tabla3->find('a') as $k => $e){
                echo $e->plaintext . '<br>';
                $jugador['titularL'][$k]['nombre']=$e->plaintext;
                $jugador['titularL'][$k]['enlace']=$e->href;
                }
            }

            if ($kt==1){ //suplentes - local
                echo '<h3>suplentes local  ->'.$kt.'</h3>';
                foreach($tabla3->find('a') as $k => $e){
                echo $e->plaintext . '<br>';
                $jugador['suplenteL'][$k]['nombre']=$e->plaintext;
                $jugador['suplenteL'][$k]['enlace']=$e->href;
                } 
            }

            if ($kt==3){ //cambios - local
                echo '<h3>cambios local  ->'.$kt.'</h3>';
                foreach($tabla3->find('tr') as $k => $e){
                echo $e->plaintext . '<br>';
                $jugador['cambiosL'][$k]['tipo']= trim($e->find('img',0)->src);
                $jugador['cambiosL'][$k]['nombre']= trim($e->find('td.textosm',0)->plaintext);             
                } 
            }

            if ($kt==4){ //tarjetas - local
                echo '<h3>tarjetas local  ->'.$kt.'</h3>';
                foreach($tabla3->find('tr') as $k => $e){
                echo $e->plaintext . '<br>';
                $jugador['tarjetaL'][$k]['tipo']= trim($e->find('img',0)->src);
                $jugador['tarjetaL'][$k]['nombre']= trim($e->find('td.textosm',0)->plaintext);             
                } 
            }

            if ($kt==(5+($hayGoles))){ //arbitros
                echo '<h3>Arbitros  ->'.$kt.'</h3>';
                foreach($tabla3->find('td.textosm') as $k => $e){
                echo $e->plaintext . '<br>';
                $jugador['arbitro'][$k]['nombre']=$e->plaintext;
                } 
            }

            //visitante

            if ($kt==(6+($hayGoles))){ //titulares - visitante
                echo '<h3>titulares visitantes  ->'.$kt.'</h3>';
                foreach($tabla3->find('a') as $k => $e){
                echo $e->plaintext . '<br>';
                $jugador['titularV'][$k]['nombre']=$e->plaintext;
                $jugador['titularV'][$k]['enlace']=$e->href;
                } 
            }

            if ($kt==(7+($hayGoles))){ //suplentes - visitante
                echo '<h3>suplentes visitantes  ->'.$kt.'</h3>';
                foreach($tabla3->find('a') as $k => $e){
                echo $e->plaintext . '<br>';
                $jugador['suplenteV'][$k]['nombre']=$e->plaintext;
                $jugador['suplenteV'][$k]['enlace']=$e->href;
                } 
            }

            if ($kt==(9+($hayGoles))){ //cambios - visitante
                echo '<h3>cambios visitantes  ->'.$kt.'</h3>';
                foreach($tabla3->find('tr') as $k => $e){
                echo $e->plaintext . '<br>';
                $jugador['cambiosV'][$k]['tipo']= trim($e->find('img',0)->src);
                $jugador['cambiosV'][$k]['nombre']= trim($e->find('td.textosm',0)->plaintext);             
                } 
            }

            if ($kt==(10+($hayGoles))){ //tarjetas - visitante
                echo '<h3>tarjetas visitantes  ->'.$kt.'</h3>';
                foreach($tabla3->find('tr') as $k => $e){
                echo $e->plaintext . '<br>';
                $jugador['tarjetaV'][$k]['tipo']= trim($e->find('img',0)->src);
                $jugador['tarjetaV'][$k]['nombre']= trim($e->find('td.textosm',0)->plaintext);             
                } 
            }

            if ($kt==(10+($hayGoles))){ break; }

        }
  }
  break; 
}