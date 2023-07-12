<?php

        //buscamos el texto en el contenido.
$string = str_get_html($content);
$html->load($string);

//echo $html; //- Activar para comprobar el contenido enviado.
$datos=array();
if ($comunidad_id==9){
  foreach($html->find('div#divResultados_') as $key =>  $elemento) {
    echo $elemento;
  }
}

die;



if ($comunidad_id==2
  || $comunidad_id==6 
  || $comunidad_id==8 
  || $comunidad_id==15
){   

  foreach($html->find('div#calendario') as $key =>  $elemento) {
    
    foreach($elemento->find('table.table') as $k =>  $element) {
      //echo $element;
      foreach($element->find('tr') as $k1 => $e){ 
        echo '<h1>'.$k1.'</h1>';
        
        if ($e->find('td[colspan="4"]') != null){
          $conta=0;
          $x=trim($e->find('td[colspan="4"]',0)->plaintext);
          $j=explode('(',$x);
          $i=str_replace('Jornada ', '', $j[0]); $i=trim($i);

          $datos[$i]['jornada']=$i;
          $datos[$i]['fecha']=$j[1];           
        }
        if ($e->find('td.etiquetavisitantecalendario',0) != null){               
          $datos[$i]['partidos'][$conta]['local'] = trim($e->find('a.enlace_equipo',0)->plaintext);
          $datos[$i]['partidos'][$conta]['visitante'] = trim($e->find('a.enlace_equipo',1)->plaintext);
          $conta++;
        } 
      }
    }
  }       
}


if ($comunidad_id==5 || $comunidad_id==3 || $comunidad_id==9 || $comunidad_id==10){
  foreach($html->find('h3.panel-title') as $key =>  $element) {
    echo $element;
        $d=explode(' ',$element->plaintext);
        $datos[$key]['jornada']=$d[1];
        $datos[$key]['fecha']=$d[2];
  }

  foreach($html->find('table.table-striped') as $key =>  $element) {
     echo $element;
      foreach($element->find('tr') as $k => $e){
        $datos[$key]['partidos'][$k]['local'] = trim($e->find('td',0)->plaintext);
        $datos[$key]['partidos'][$k]['visitante'] = trim($e->find('td',2)->plaintext);
      }    
  }
}

if ($comunidad_id==14 || $comunidad_id==11 || $comunidad_id==1){
  for ($i=1; $i < 40; $i++) {
    if ($html->find('div#trPartidosJornada_'.$i) != null){
      foreach($html->find('div#trPartidosJornada_'.$i) as $ky =>  $div) {
        foreach($div->find('table') as $ky =>  $tb) {
          echo $ky.' - table<hr />'; 
          foreach($tb->find('tr') as $k => $e){
            echo $k.' - tr<hr />'; 
            echo $e;
            if ($k==0){
              foreach($e->find('span#Jornada_'.$i) as $ele)
              echo $ele->plaintext . '<br>';
              $datos[$i]['Jornada']='Jornada '.$i;
              $datos[$i]['fecha']=$ele->plaintext;
            } else {

            if (trim($e->find('td',0)->plaintext) == '' ){ continue; }
            $datos[$i]['partidos'][$k]['local'] = trim($e->find('td',0)->plaintext);
            $datos[$i]['partidos'][$k]['visitante'] = trim($e->find('td',4)->plaintext);
            }    
          }
        } 
      }
    }
  }  
}


