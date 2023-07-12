<?php
        //buscamos el texto en el contenido.
$string = str_get_html($content);
$html->load($string);

$jugador=array();

foreach($html->find('table') as $key => $tablon){
    
    if ($key<7) { continue; }
    echo $tablon.' <b>'.$key.'</b><hr />';


    //$key=9 resultado
    //$key=8 titularL
    //$key=10 arbitros
    //$key=11 titularV
    //$key=12 cambiosL
    //$key=13 goles
    //$key=15 tarjetasL
    //$key=16 tarjetasV
    //$key=19 cambiosV

    
} 
die;

    /*

    7

    if ($kt==7){ //cambios - local
        echo '<h3>cambios local  ->'.$kt.'</h3>';
        foreach($tabla->find('tr') as $k => $e){
        echo $e->plaintext . '<br>';
        $jugador['cambiosL'][$k]['tipo']= trim($e->find('img',0)->src);
        $jugador['cambiosL'][$k]['nombre']= trim($e->find('td.textosm',0)->plaintext);             
        } 
    }

    if ($kt==8){ //tarjetas - local
        echo '<h3>tarjetas local  ->'.$kt.'</h3>';
        foreach($tabla->find('tr') as $k => $e){
        echo $e->plaintext . '<br>';
        $jugador['tarjetaL'][$k]['tipo']= trim($e->find('img',0)->src);
        $jugador['tarjetaL'][$k]['nombre']= trim($e->find('td.textosm',0)->plaintext);             
        } 
    }

    if ($kt==9){ echo '<h3>resultado  ->'.$kt.'</h3>';}

    if ($kt==10){ //arbitros
        echo '<h3>Arbitros  ->'.$kt.'</h3>';
        foreach($tabla->find('td.textosm') as $k => $e){
        echo $e->plaintext . '<br>';
        $jugador['arbitro'][$k]['nombre']=$e->plaintext;
        } 
    }

    if ($kt==11) { 
        //echo $tablaSin;
        echo '<h3>goles  ->'.$kt.'</h3>';
        foreach($tabla->find('tr') as $k => $e){
            echo $e->plaintext . '<br>';            
            if ($e->find('td',1) != null){ 
            $jugador['goles'][$k]['resultado']= trim($e->find('td',0)->plaintext);
            $jugador['goles'][$k]['nombre']= trim($e->find('td',1)->plaintext);
            $jugador['goles'][$k]['tipo']= trim($e->find('a.img',0)->class); 
            //$hayGoles=0;
            }           
        }
    } //goles

    if ($kt==12) {
            echo '<h3>estadio  ->'.$kt.'</h3>';
            $jugador['estadio']['nombre']=trim($tabla->find('a',0)->plaintext);
            $jugador['estadio']['enlace']=trim($tabla->find('a',0)->href);
        
    } //estadio y ciudad

    
    

    if ($kt==16){ //cambios - visitante
        echo '<h3>cambios visitantes  ->'.$kt.'</h3>';
        foreach($tabla->find('tr') as $k => $e){
        echo $e->plaintext . '<br>';
        $jugador['cambiosV'][$k]['tipo']= trim($e->find('img',0)->src);
        $jugador['cambiosV'][$k]['nombre']= trim($e->find('td.textosm',0)->plaintext);             
        } 
    }

    if ($kt==17){ //tarjetas - visitante
        echo '<h3>tarjetas visitantes  ->'.$kt.'</h3>';
        foreach($tabla->find('tr') as $k => $e){
        echo $e->plaintext . '<br>';
        $jugador['tarjetaV'][$k]['tipo']= trim($e->find('img',0)->src);
        $jugador['tarjetaV'][$k]['nombre']= trim($e->find('td.textosm',0)->plaintext);             
        } 
    }*/


imp($jugador);
die;


