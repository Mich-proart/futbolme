<?php

        //buscamos el texto en el contenido.
$string = str_get_html($content);
$html->load($string);

//echo $html; - Activar para comprobar el contenido enviado.
$datos=array();

  foreach($html->find('table.table-bordered') as $key =>  $element) {
        echo '<br />key: '.$key.'<br />';
         if ($key==0){  
            foreach($element->find('a') as $k => $e){

                $datos[$k]['url']=$e->href;
                $id=str_replace('NFG_VisCompeticiones_Grupo?cod_primaria=1000123&codequipo=', '', $datos[$k]['url']);
                $id=str_replace('&codgrupo='.$grupo, '', $id);
                $datos[$k]['id']=$id;
                $datos[$k]['equipo']=strip_tags($e->plaintext);
            } 
        }
  }
