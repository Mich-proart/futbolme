<?php
        //buscamos el texto en el contenido.
$string = str_get_html($content);
$html->load($string);
$partidos=array();


foreach($html->find('div.view-content') as $key => $tabla){

    echo $tabla.'  -><b>'.$key.'</b><br />';
    foreach($tabla->find('tr') as $k => $e){
        if ($k==0){continue;}
       $local=trim($e->find('td',0)->plaintext); 
       $local=html_entity_decode($local);
       $pos = strpos($local, chr(34));
       if ($pos >0) {$local=substr($local, 0,$pos);}        
       $partidos[$k]['local']=$local;
       $partidos[$k]['resulLocal']= trim($e->find('td',1)->plaintext); 
       $partidos[$k]['resulVisitante']= trim($e->find('td',2)->plaintext); 
       $visitante=trim($e->find('td',3)->plaintext); 
       $visitante=html_entity_decode($visitante);
       $pos = strpos($visitante, chr(34));
       if ($pos >0) {$visitante=substr($visitante, 0,$pos);} 
       $partidos[$k]['visitante']= $visitante; 
       $partidos[$k]['acta']= trim($e->find('a',0)->href);             
    } 

}

foreach ($partidos as $k => $v) {
    $palabras=$v['local'];
    if ($palabras=='Club Recreativo Granada'){ $palabras='Club Granada'; }
    $palabras = explode(' ', $palabras);
    usort($palabras, function($a, $b) { return strlen($b) - strlen($a); });
    $largo = $palabras[0]; 
    foreach ($palabras as $vv) {
      $vv=html_entity_decode($vv);      
      if ($vv=='Osasuna'){ $largo=$vv; break; }
      if ($vv=='Alavés'){ $largo='Deportivo'; break; }
      if ($vv=='Espanyol'){ $largo='Espanyol'; break; }
      if ($vv=='Santander'){ $largo='Racing'; break; }
      if ($vv=='Sebastián'){ $largo='Reyes'; break; }
      if ($temporada_id==5){
        if ($vv=='Atlético'){ $largo='Levante'; break; }
        if ($vv=='Terraferma'){ $largo='Esportiu'; break; }
        if ($vv=='Gimnàstic'){ $largo='Tarragona'; break; }
        if ($vv=='Llagostera-Costa'){ $largo='Llagostera'; break; }
      }
      if ($temporada_id==6){
        if ($vv=='Recreativo'){ $largo='Huelva'; break; }
        if ($vv=='Universidad'){ $largo='UCAM'; break; }
      }
    }
    $largo=html_entity_decode($largo);
    $partidos[$k]['local']=$largo;
    $palabras=$v['visitante'];
    if ($palabras=='Club Recreativo Granada'){ $palabras='Club Granada'; }
    $palabras = explode(' ', $palabras);
    usort($palabras, function($a, $b) { return strlen($b) - strlen($a); });
    $largo = $palabras[0]; 
    foreach ($palabras as $vv) {
      $vv=html_entity_decode($vv);
      if ($vv=='Osasuna'){ $largo=$vv; break; }
      if ($vv=='Alavés'){ $largo='Deportivo'; break; }
      if ($vv=='Espanyol'){ $largo='Espanyol'; break; }
      if ($vv=='Santander'){ $largo='Racing'; break; }
      if ($vv=='Sebastián'){ $largo='Reyes'; break; }
      if ($temporada_id==5){
        if ($vv=='Atlético'){ $largo='Levante'; break; }
        if ($vv=='Terraferma'){ $largo='Esportiu'; break; }
        if ($vv=='Gimnàstic'){ $largo='Tarragona'; break; }
        if ($vv=='Llagostera-Costa'){ $largo='Llagostera'; break; }
      }
      if ($temporada_id==6){
        if ($vv=='Recreativo'){ $largo='Huelva'; break; }
        if ($vv=='Universidad'){ $largo='UCAM'; break; }
      }
    }
    $largo=html_entity_decode($largo);
    $partidos[$k]['visitante']=$largo;
    $acta=str_replace('/actas?pid=', '', $v['acta']);
    $partidos[$k]['acta']=$acta;
}

foreach ($partidos as $k => $v) {
  echo ' <br />--- <b>'.$v['local'].' - '.$v['visitante'].'</b> --- <br />'; 
}


foreach ($fechasDat as $key => $value) {
    $partido_id=$value['partido_id']; 
    $palabras=$value['local'];
    if ($palabras=='UCAM Murcia CF'){ $palabras='UCAM CF'; }    
    $palabras = explode(' ', $palabras);
    usort($palabras, function($a, $b) { return strlen($b) - strlen($a); });
    $local = $palabras[0];    
    $palabras=$value['visitante'];
    if ($palabras=='UCAM Murcia CF'){ $palabras='UCAM CF'; }    
    $palabras = explode(' ', $palabras);
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

