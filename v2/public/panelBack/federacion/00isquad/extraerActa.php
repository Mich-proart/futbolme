<?php
        //buscamos el texto en el contenido.
$string = str_get_html($content);
$html->load($string);

//echo $html;


$jugador=array();
foreach($html->find('div.tablaacta') as $k1 => $tabla){
    if ($k1==0){ continue; }
    if ($k1==2){ continue; }
    if ($k1==5){ continue; }
    echo $tabla->find('th[colspan="6"]', 0)->plaintext.' - k1='.$k1.'<br><hr>';
    
    //1=Goles - 3=titulares - 4=suplentes - 6=sustituciones - 7=amonestaciones

    foreach($tabla->find('table.tablacompeticiones') as $k => $e1){
        if (1==(int)$k1) {    
            foreach($e1->find('tr') as $kk => $e){
                if ($e->find('td',0) != null){ 
                    if (strlen($e->find('td',0)->plaintext)==0){ continue; }
                    $jugador['goles']['1-'.$kk]['reultado']= trim($e->find('td',2)->plaintext);
                    $jugador['goles']['1-'.$kk]['nombre']= trim($e->find('td',0)->plaintext); 
                }           
            } 
            foreach($e1->find('tr') as $kk => $e){
                if ($e->find('td',0) != null){ 
                    if (strlen($e->find('td',5)->plaintext)==0){ continue; }
                    $jugador['goles']['2-'.$kk]['reultado']= trim($e->find('td',3)->plaintext);
                    $jugador['goles']['2-'.$kk]['nombre']= trim($e->find('td',5)->plaintext);
                }            
            } 
        } 

        if (3==(int)$k1) {    
            foreach($e1->find('tr') as $kk => $e){
                if ($e->find('td',0) != null){ 
                    if (strlen($e->find('td',2)->plaintext)==0){ continue; }
                    $jugador['titularL'][$kk]['nombre']=$e->find('td',2)->plaintext;
                    $jugador['titularL'][$kk]['enlace']=$e->find('img',0)->src;               
                }           
            } 
            foreach($e1->find('tr') as $kk => $e){
                if ($e->find('td',0) != null){ 
                    if (strlen($e->find('td',5)->plaintext)==0){ continue; }
                    $jugador['titularV'][$kk]['nombre']=$e->find('td',5)->plaintext;
                    $jugador['titularV'][$kk]['enlace']=$e->find('img',1)->src;   
                }            
            } 
        } 

        if (4==(int)$k1) {    
            foreach($e1->find('tr') as $kk => $e){
                if ($e->find('td',0) != null){ 
                    if (strlen($e->find('td',2)->plaintext)==0){ continue; }
                    $jugador['suplenteL'][$kk]['nombre']=$e->find('td',2)->plaintext;
                    $jugador['suplenteL'][$kk]['enlace']=$e->find('img',0)->src;               
                }           
            } 
            foreach($e1->find('tr') as $kk => $e){
                if ($e->find('td',0) != null){ 
                    if (strlen($e->find('td',5)->plaintext)==0){ continue; }
                    $jugador['suplenteV'][$kk]['nombre']=$e->find('td',5)->plaintext;
                    $jugador['suplenteV'][$kk]['enlace']=$e->find('img',1)->src;   
                }            
            } 
        } 

        if (6==(int)$k1) { 
            foreach($e1->find('tr') as $kk => $e){
                if ($e->find('td',0) != null){ 
                    if (strlen($e->find('td',0)->plaintext)==0){ continue; }
                    $jugador['cambios'][$kk]['minuto']= trim($e->find('td',0)->plaintext);
                    $jugador['cambios'][$kk]['entra']= trim($e->find('td',2)->plaintext);
                    $jugador['cambios'][$kk]['sale']= trim($e->find('td',4)->plaintext);
                    $jugador['cambios'][$kk]['equipo']= trim($e->find('img.escudo_tabla',0)->src);          
                }           
            }             
        }

        if (7==(int)$k1) {  
        //echo $e1;die;  
            foreach($e1->find('tr') as $kk => $e){
                if ($e->find('td',0) != null){ 
                    if (strlen($e->find('td',2)->plaintext)==0){ continue; }
                    $jugador['tarjetaL'][$kk]['nombre']=$e->find('td',2)->plaintext;
                    $jugador['tarjetaL'][$kk]['minuto']=$e->find('td',0)->plaintext;
                    $jugador['tarjetaL'][$kk]['tipo']=$e->find('div.minutogol',0)->class;               
                }           
            } 
            foreach($e1->find('tr') as $kk => $e){
                if ($e->find('td',0) != null){ 
                    if (strlen($e->find('td',5)->plaintext)==0){ continue; }
                    $jugador['tarjetaV'][$kk]['nombre']=$e->find('td',5)->plaintext;
                    $jugador['tarjetaV'][$kk]['minuto']=$e->find('td',3)->plaintext; 
                    $jugador['tarjetaV'][$kk]['tipo']=$e->find('div.minutogol',1)->class;  
                }            
            } 
        }  
    }
}

