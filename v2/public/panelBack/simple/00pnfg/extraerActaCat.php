<?php
        //buscamos el texto en el contenido.
$string = str_get_html($content);
$html->load($string);



$jugador=array();

foreach($html->find('div.col-sm-4') as $k1 => $tabla){

    imp($k1);
 //if ($k1==1){ echo $tabla; die; }
  //echo $tabla; die; 
   
    foreach($tabla->find('h5.font_responsive') as $k => $e){
        if (0==(int)$k1) {
        $jugador['arbitro'][$k]['nombre']=$e->plaintext;
        } 
    } 
    foreach($tabla->find('table.table') as $k => $e1){
        if (0==(int)$k1) {    
            foreach($e1->find('tr') as $kk => $e){
                $jugador['goles'][$kk]['reultado']= trim($e->find('td',0)->plaintext);
                $jugador['goles'][$kk]['nombre']= trim($e->find('td',1)->plaintext);            
            } 
        } 
    }

    foreach($tabla->find('a.btn') as $e){
        if (0==(int)$k1) {
            $jugador['estadio']['nombre']=trim($e->plaintext);
            $jugador['estadio']['enlace']=trim($e->href);     
        }
    }

  foreach($tabla->find('table.table-hover') as $k2 => $tablaSin){

    if ($k1==1 && $k2==0){
        foreach($tablaSin->find('tr') as $k => $e){
        $jugador['titularL'][$k]['nombre']=$e->find('td',1)->plaintext;
        $jugador['titularL'][$k]['enlace']=$e->onclick;
        }
    }
    if ($k1==1 && $k2==1){
        foreach($tablaSin->find('tr') as $k => $e){
        $jugador['suplenteL'][$k]['nombre']=$e->find('td',1)->plaintext;
        $jugador['suplenteL'][$k]['enlace']=$e->onclick;
        }
    }

    if ($k1==1 && $k2>1){
        foreach($tablaSin->find('tr') as $k => $e){
        if ($e->find('td',2) != null){ 
            $jugador['cambiosL'][$k2.'-'.$k]['tipo']= trim($e->find('i',0)->class);
            $jugador['cambiosL'][$k2.'-'.$k]['nombre']= trim($e->find('td',1)->plaintext);  
            }          
        } 
        foreach($tablaSin->find('tr') as $k => $e){
            if ($e->find('img',0) != null){ 
            $jugador['tarjetaL'][$k2.'-'.$k]['tipo']= trim($e->find('img',0)->src);
            $jugador['tarjetaL'][$k2.'-'.$k]['nombre']= trim($e->find('td',1)->plaintext); 
            }            
        }   



    }

    

    if ($k1==2 && $k2==0){
        foreach($tablaSin->find('tr') as $k => $e){
        $jugador['titularV'][$k]['nombre']=$e->find('td',1)->plaintext;
        $jugador['titularV'][$k]['enlace']=$e->onclick;
        }
    }
    if ($k1==2 && $k2==1){
        foreach($tablaSin->find('tr') as $k => $e){
        $jugador['suplenteV'][$k]['nombre']=$e->find('td',1)->plaintext;
        $jugador['suplenteV'][$k]['enlace']=$e->onclick;
        }
    }

    if ($k1==2 && $k2>1){
        foreach($tablaSin->find('tr') as $k => $e){
        if ($e->find('td',2) != null){ 
            $jugador['cambiosV'][$k2.'-'.$k]['tipo']= trim($e->find('i',0)->class);
            $jugador['cambiosV'][$k2.'-'.$k]['nombre']= trim($e->find('td',1)->plaintext);  
            }          
        }  

        foreach($tablaSin->find('tr') as $k => $e){
            if ($e->find('img',0) != null){ 
            $jugador['tarjetaV'][$k2.'-'.$k]['tipo']= trim($e->find('img',0)->src);
            $jugador['tarjetaV'][$k2.'-'.$k]['nombre']= trim($e->find('td',1)->plaintext); 
            }            
        }   
    }

    
    //imp($k2);
    //echo $tablaSin;

  }
      
}