<?php
        //buscamos el texto en el contenido.
$string = str_get_html($content);
$html->load($string);

$jugador=array();

foreach($html->find('table.tabla_bordeado_fichabot') as $tabla2){

  //echo $tabla2; 

  foreach($tabla2->find('table') as $k => $tablaSin){

    if ($k<5){ continue; }

    //imp($k);
    //5 - cambios - Local
    //6 - tarjetas - local
    //7 - resultado
    //8 - arbitros
    //9 - Goles
    //10 - estadio
    //14 - cambios - visitante
    //15 - tarjetas - visitante
    //echo $tablaSin;
    
    if (5==(int)$k) {
        foreach($tablaSin->find('tr') as $k2 => $e){
            if ($e->find('td',2) != null){ 
            $jugador['cambiosL'][$k2]['tipo']= trim($e->find('img',0)->src);
            $jugador['cambiosL'][$k2]['nombre']= trim($e->find('td.textosm',0)->plaintext);  
            }          
        }           
    } 

    if (6==(int)$k) {
        foreach($tablaSin->find('tr') as $k2 => $e){
            $jugador['tarjetaL'][$k2]['tipo']= trim($e->find('img',0)->src);
            $jugador['tarjetaL'][$k2]['nombre']= trim($e->find('td.textosm',0)->plaintext);             
        }         
    } 

    if (7==(int)$k) {
        foreach($tablaSin->find('tr') as $k2 => $e){
            $jugador['resultado'][$k2]['local']= trim($e->find('td',1)->plaintext);
            $jugador['resultado'][$k2]['visitante']= trim($e->find('td',3)->plaintext);
            break;            
        }        
    }
    if (8==(int)$k) {
        foreach($tablaSin->find('td.textosm') as $k2 => $e){
        $jugador['arbitro'][$k2]['nombre']=$e->plaintext;
        }       
    }
    if (9==(int)$k) {
        foreach($tablaSin->find('tr') as $k2 => $e){
            $jugador['goles'][$k2]['resultado']= trim($e->find('td',0)->plaintext);
            $jugador['goles'][$k2]['nombre']= trim($e->find('td',1)->plaintext);            
        }      
    }
    if (10==(int)$k) {
        $jugador['estadio']['nombre']=trim($tablaSin->find('a',0)->plaintext);
        $jugador['estadio']['enlace']=trim($tablaSin->find('a',0)->href);     
    }
    if (14==(int)$k) {
        foreach($tablaSin->find('tr') as $k2 => $e){
            if ($e->find('td',2) != null){ 
            $jugador['cambiosV'][$k2]['tipo']= trim($e->find('img',0)->src);
            $jugador['cambiosV'][$k2]['nombre']= trim($e->find('td.textosm',0)->plaintext);  
            }          
        }           
    } 

    if (15==(int)$k) {
        foreach($tablaSin->find('tr') as $k2 => $e){
            $jugador['tarjetaV'][$k2]['tipo']= trim($e->find('img',0)->src);
            $jugador['tarjetaV'][$k2]['nombre']= trim($e->find('td.textosm',0)->plaintext);             
        }         
    } 


  }
  
    
        foreach($tabla2->find('table.tabla_bordeado') as $kt => $tabla3){            
            if ($kt==0){ //titulares - local
                foreach($tabla3->find('a') as $k => $e){
                //echo $e->plaintext . '<br>';
                $jugador['titularL'][$k]['nombre']=$e->plaintext;
                $jugador['titularL'][$k]['enlace']=$e->href;
                } 
            }
            if ($kt==1){ //suplentes - local
                foreach($tabla3->find('a') as $k => $e){
                //echo $e->plaintext . '<br>';
                $jugador['suplenteL'][$k]['nombre']=$e->plaintext;
                $jugador['suplenteL'][$k]['enlace']=$e->href;
                } 
            }  
            if ($kt==2){ //titulares - visitante                
                foreach($tabla3->find('a') as $k => $e){
                //echo $e->plaintext . '<br>';
                $jugador['titularV'][$k]['nombre']=$e->plaintext;
                $jugador['titularV'][$k]['enlace']=$e->href;
                } 
            }
            if ($kt==3){ //suplentes - visitante
                foreach($tabla3->find('a') as $k => $e){
                //echo $e->plaintext . '<br>';
                $jugador['suplenteV'][$k]['nombre']=$e->plaintext;
                $jugador['suplenteV'][$k]['enlace']=$e->href;
                } 
            }
            if ($kt==3) { break;  }  
        }

 break;  
  
}