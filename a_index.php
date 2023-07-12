<?php

$equiposU=0;
if (isset($_SESSION['equipos'])) { $equiposU=count($_SESSION['equipos']);}

$ids_p_e_d = array(); //ids partidos de mis equipos en directo
$ids_p_e_t = array(); //ids partidos de mis equipos todos
$ids_p_t_d = array(); //ids partidos de mis equipos en directo
$ids_p_t_t = array(); //ids partidos de mis equipos todos
$c_partidos_ed = 0; //partidos en directo de mis equipos
$c_partidos_et = 0; //partidos todos de mis equipos 
$c_partidos_td = 0; //partidos en directo de mis torneos
$c_partidos_tt = 0; //partidos todos de mis torneos 


//$c_partidos = ($c_directos + $c_finales + $c_resto); en index

if ($equiposU>0) {
  $ids=array_keys($_SESSION['equipos']);
  $idsTor=array();

  foreach ($_SESSION['equipos'] as $key => $value) {
    foreach ($value['torneos'] as $k => $v) {
      $idsTor[$k]=$k;
    }
  }

  //imp($idsTor);



  foreach ($directos as $partido) {     
    foreach ($ids as $e_id) {                
       if ($e_id == $partido['equipoLocal_id'] || $e_id == $partido['equipoVisitante_id']) {
           ++$c_partidos_ed;
           $ids_p_e_d[] = $partido['id'];
       }
    }  
    if (442 == $partido['temporada_id']) {continue;}   
    foreach ($idsTor as $t_id) {                
       if ($t_id == $partido['temporada_id']) {
           ++$c_partidos_td;
           $ids_p_t_d[] = $partido['id'];
       }
    }   
  }

  foreach ($partidosDia as $key => $v) { 
        foreach ($ids as $e_id) {                
           if ($e_id == $v['equipoLocal_id'] || $e_id == $v['equipoVisitante_id']) {
               ++$c_partidos_et;
               $ids_p_e_t[] = $partido['id'];
           }
        }
        if (442 == $v['temporada_id']) {continue;}
        foreach ($idsTor as $t_id) {                
           if ($t_id == $v['temporada_id']) {
               ++$c_partidos_tt;
               $ids_p_t_t[] = $v['id'];
           }
        } 
  }

  $ids_p_e_d = array_unique($ids_p_e_d);
  $ids_p_e_t = array_unique($ids_p_e_t);
  $ids_p_t_d = array_unique($ids_p_t_d);
  $ids_p_t_t = array_unique($ids_p_t_t);
  /*imp($ids_p_e_d);
  imp($ids_p_e_t);
  imp($ids_p_t_d);
  imp($ids_p_t_t);*/

}

$c_partidos_tet = ($c_partidos_ed + $c_partidos_et);
$c_partidos_ttt = ($c_partidos_td + $c_partidos_tt);

$futbolmetxt = '';$tustorneostxt = '';$tusequipostxt = '';

  if ($c_partidos_tet > 0) { $tusequipostxt = "($c_partidos_tet partidos)";  } 
  if ($c_partidos_ttt > 0) { $tustorneostxt = "($c_partidos_ttt partidos)"; } 
  if (isset($c_partidos) && $c_partidos > 0) { $futbolmetxt = "($c_partidos partidos)"; } 

?>


