<?php

if ($modelo=='novanet'){    
      foreach($html->find('tr.filagorda') as $k => $e){ 
        if (strlen($e)<300){ continue; }
          /*imp($k);
          ?>
          <textarea cols="150" rows="8"><?php echo $e?></textarea>
        <?php */
        if ($e->find('a.enlace_equipo',1) != null){
          $datos['partidos'][$k]['escudo_local'] = trim($e->find('img.escudo_tabla',0)->src);
          $datos['partidos'][$k]['escudo_visitante'] = trim($e->find('img.escudo_tabla',1)->src);
          $datos['partidos'][$k]['url_local'] = trim($e->find('a.enlace_equipo',0)->href);
          $datos['partidos'][$k]['local'] = trim($e->find('a.enlace_equipo',0)->plaintext);
          $datos['partidos'][$k]['url_visitante'] = trim($e->find('a.enlace_equipo',1)->href);
          $datos['partidos'][$k]['visitante'] = trim($e->find('a.enlace_equipo',1)->plaintext);
        }       
      } 
       
} else {

  foreach($html->find('table.table-hover') as $key =>  $element) {
      if ($key==0){ 
        echo $element;
          foreach($element->find('tr') as $k => $e){
            $datos['partidos'][$k]['escudo_local'] = trim($e->find('img',0)->src);
            $datos['partidos'][$k]['escudo_visitante'] = trim($e->find('img',1)->src);        
          } 
          foreach($element->find('div.font_widgetL') as $k => $e){        
            $datos['partidos'][$k]['url_local'] = trim($e->find('a',0)->href);
            $datos['partidos'][$k]['local'] = trim($e->find('a',0)->plaintext);
          } 
          foreach($element->find('div.font_widgetV') as $k => $e){        
            $datos['partidos'][$k]['url_visitante'] = trim($e->find('a',0)->href);
            $datos['partidos'][$k]['visitante'] = trim($e->find('a',0)->plaintext);
          } 
      }  
  }
}

if ($comunidad_id==14){
  foreach($html->find('div.tabla_rdg') as $key =>  $element) { 
  echo $key.' - div<hr />';    
    foreach($element->find('table') as $ky =>  $tb) {
      echo $ky.' - table<hr />'; 
      foreach($tb->find('tr') as $k => $e){
        echo $k.' - tr<hr />'; 
        if ($k==0){
          echo $e;
          if ($e->find('img[align=absmiddle]',0) != null || $e->find('img[align=absmiddle]',1) != null){
          $datos['partidos'][$key]['escudo_local'] = trim($e->find('img[align=absmiddle]',0)->src);
          $datos['partidos'][$key]['escudo_visitante'] = trim($e->find('img[align=absmiddle]',1)->src);
          $datos['partidos'][$key]['url_local'] = trim($e->find('a',0)->href);
          $datos['partidos'][$key]['local'] = trim($e->find('a',0)->plaintext);
          $datos['partidos'][$key]['url_visitante'] = trim($e->find('a',1)->href);
          $datos['partidos'][$key]['visitante'] = trim($e->find('a',1)->plaintext);
          }
        }       
      }
    }    
  }
}
