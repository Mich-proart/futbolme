<?php
        //buscamos el texto en el contenido.
$string = str_get_html($content);
$html->load($string);

$jugador=array();

foreach($html->find('table') as $key => $tabla){
    //echo $tabla.' <b>'.$key.'</b><hr />';
    if ($key==0){ //arbitros
        //echo '<h3>Arbitros  ->'.$key.'</h3>';
        foreach($tabla->find('td') as $k => $e){
        $jugador['arbitro'][$k]['nombre']=$e->plaintext;
        } 
    }

    if ($key==1){
        //echo '<h3>titulares local  ->'.$key.'</h3>';
        foreach($tabla->find('tr') as $k => $e){
        if ($k==0){ continue; }
        $jugador['titularL'][$k]['nombre']=trim($e->find('td',0)->plaintext);
        $jugador['titularL'][$k]['enlace']=0;
        }

        //echo '<h3>titulares visitante  ->'.$key.'</h3>';
        foreach($tabla->find('tr') as $k => $e){
        if ($k==0){ continue; }
        $jugador['titularV'][$k]['nombre']=trim($e->find('td',1)->plaintext);
        $jugador['titularV'][$k]['enlace']=0;
        }
    }

    if ($key==2){
        //echo '<h3>suplentes local  ->'.$key.'</h3>';
        foreach($tabla->find('tr') as $k => $e){
        if ($k==0){ continue; }
        $jugador['suplenteL'][$k]['nombre']=trim($e->find('td',0)->plaintext);
        $jugador['suplenteL'][$k]['enlace']=0;
        }

        //echo '<h3>suplentes visitante  ->'.$key.'</h3>';
        foreach($tabla->find('tr') as $k => $e){
        if ($k==0){ continue; }
        $jugador['suplenteV'][$k]['nombre']=trim($e->find('td',1)->plaintext);
        $jugador['suplenteV'][$k]['enlace']=0;
        }
    }

    if ($key==4){
        //echo '<h3>cambios local  ->'.$key.'</h3>';
        foreach($tabla->find('tr') as $k => $e){
        if ($k==0){ continue; }
        $jugador['cambiosL'][$k]['nombre']=trim($e->find('td',0)->plaintext);
        $jugador['cambiosL'][$k]['enlace']=0;
        }

        //echo '<h3>cambios visitante  ->'.$key.'</h3>';
        foreach($tabla->find('tr') as $k => $e){
        if ($k==0){ continue; }
        $jugador['cambiosV'][$k]['nombre']=trim($e->find('td',1)->plaintext);
        $jugador['cambiosV'][$k]['enlace']=0;
        }
    }
    //0 - Arbitros
    //1 - titulares
    //2 - suplentes
    //4 - cambios
}

foreach($html->find('span.gol-casa') as $k => $e){
    $jugador['goles'][1][$k]['resultado']= $e->plaintext;
}

foreach($html->find('span.gol-fuera') as $k => $e){
    $jugador['goles'][0][$k]['resultado']= $e->plaintext;
}



foreach($html->find('ul.lista-incidencias') as $key => $tabla){
    //echo $tabla.' '.$key.' ---------<br />';
    if ($key<2){
        foreach($tabla->find('li') as $k => $e){
        echo $e.' '.$k.'<br />';
        $jugador['tarjetaL'][$key]['nombre'][$k]= $e->plaintext;
        } 
    } 


    if ($key>3 && $key<6){
        foreach($tabla->find('li') as $k => $e){
            echo $e.' '.$k.'<br />';
        $jugador['tarjetaV'][($key-4)]['nombre'][$k]= $e->plaintext;            
        }  
    } 
}