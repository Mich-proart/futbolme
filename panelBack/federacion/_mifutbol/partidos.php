<?php

        //buscamos el texto en el contenido.
$string = str_get_html($content);
$html->load($string);

//echo $html; - Activar para comprobar el contenido enviado.
$datos=array();

  foreach($html->find('h3.panel-title') as $key =>  $element) {
        //echo '<br />key: '.$key.'<br />';
        //echo $element->plaintext;
        $d=explode(' ',$element->plaintext);
        $datos[$key]['jornada']=$d[1];
        $datos[$key]['fecha']=$d[2];
  }

  foreach($html->find('table.table-striped') as $key =>  $element) {
        
      foreach($element->find('tr') as $k => $e){
        $datos[$key]['partidos'][$k]['local'] = trim($e->find('td',0)->plaintext);
        $datos[$key]['partidos'][$k]['visitante'] = trim($e->find('td',2)->plaintext);
      } 
           
  }
