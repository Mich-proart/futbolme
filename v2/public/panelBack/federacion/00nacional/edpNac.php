<?php
        //buscamos el texto en el contenido.
$string = str_get_html($content);
$html->load($string);
$partidos=array();


foreach($html->find('table[width="580"]') as $key => $tabla){
    if ($key==0){ continue; }

    foreach($tabla->find('a') as $k => $e){ 
      $partidos[$key]['acta']=$e->href;
    }

    foreach($tabla->find('span.tituloficha') as $k => $e){ 
      if ($k==0){ $partidos[$key]['local']=$e->plaintext;}
      if ($k==1){ $partidos[$key]['visitante']=$e->plaintext;}
    }
}



foreach ($partidos as $k => $v) {
    $palabras = explode(' ', $v['local']);
    usort($palabras, function($a, $b) { return strlen($b) - strlen($a); });    
    $largo = $palabras[0]; 
    foreach ($palabras as $vv) {
      $vv=html_entity_decode($vv);
      $vv=utf8_encode($vv);
      if ($vv=='Osasuna'){ $largo=$vv; break; }
      if ($vv=='Alavés'){ $largo='Deportivo'; break; }
    }
    $largo=html_entity_decode($largo);
    $largo=utf8_encode($largo);
    $partidos[$k]['local']=$largo;

    $palabras = explode(' ', $v['visitante']);
    usort($palabras, function($a, $b) { return strlen($b) - strlen($a); });
    $largo = $palabras[0]; 
    foreach ($palabras as $vv) {
      $vv=utf8_encode($vv);
      if ($vv=='Osasuna'){ $largo=$vv; break; }
      if ($vv=='Alavés'){ $largo='Deportivo'; break; }
    }
    $largo=html_entity_decode($largo);
    $largo=utf8_encode($largo);
    $partidos[$k]['visitante']=$largo;
    $acta=str_replace('/actas/RFEF_CmpPartido?cod_primaria=1000144&CodActa=', '', $v['acta']);
    $partidos[$k]['acta']=$acta;
}

foreach ($partidos as $k => $v) {
  echo ' <br />--- <b>'.$v['local'].' - '.$v['visitante'].'</b> --- <br />'; 
}

foreach ($fechasDat as $key => $value) {
    $partido_id=$value['partido_id']; 
    $value['local']=str_replace('Balompié', '', $value['local']); 
    $palabras = explode(' ', $value['local']);
    usort($palabras, function($a, $b) { return strlen($b) - strlen($a); });
    $local = $palabras[0];
    
    $value['visitante']=str_replace('Balompié', '', $value['visitante']);    
    $palabras = explode(' ', $value['visitante']);
    usort($palabras, function($a, $b) { return strlen($b) - strlen($a); });
    $visitante = $palabras[0];
    echo $value['local'].' - '.$value['visitante'].' -- Partido id: '.$partido_id; 
    foreach ($partidos as $k => $v) {
        if (trim($v['local'])==trim($local) && trim($v['visitante'])==trim($visitante)){
            echo ' -- '.$v['local'].' - '.$v['visitante'].' : <b> acta: '.$v['acta'].'</b><br />';
            $sql='UPDATE partido SET codigo_acta='.$v['acta'].' WHERE id='.$partido_id;
            //echo $sql.'<br />';
            mysqli_query($mysqli, $sql);
        } 

    }

    echo '<hr />'; 
}