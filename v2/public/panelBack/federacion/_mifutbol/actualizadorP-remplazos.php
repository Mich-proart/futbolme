<?php 
$v1['equipo']=str_replace('&nbsp;', '', $v1['equipo']);           
$v1['equipo']=str_replace(' A ', 'A', $v1['equipo']);

$v['local']=str_replace('&nbsp;', '', $v['local']);
$v['local']=str_replace(' A ', 'A', $v['local']);

$v['visitante']=str_replace('&nbsp;', '', $v['visitante']);
$v['visitante']=str_replace(' A ', 'A', $v['visitante']);

$v1['equipo']=str_replace(' B ', 'B', $v1['equipo']);
$v['local']=str_replace(' B ', 'B', $v['local']);
$v['visitante']=str_replace(' B ', 'B', $v['visitante']);
$v1['equipo']=str_replace(' C ', 'C', $v1['equipo']);
$v['local']=str_replace(' C ', 'C', $v['local']);
$v['visitante']=str_replace(' C ', 'C', $v['visitante']);
$v1['equipo']=str_replace(' D ', 'D', $v1['equipo']);
$v['local']=str_replace(' D ', 'D', $v['local']);
$v['visitante']=str_replace(' D ', 'D', $v['visitante']);
$v1['equipo']=str_replace(' E ', 'E', $v1['equipo']);
$v['local']=str_replace(' E ', 'E', $v['local']);
$v['visitante']=str_replace(' E ', 'E', $v['visitante']);
$v1['equipo']=str_replace(' F ', 'F', $v1['equipo']);
$v['local']=str_replace(' F ', 'F', $v['local']);
$v['visitante']=str_replace(' F ', 'F', $v['visitante']);
$v1['equipo']=str_replace(' G ', 'G', $v1['equipo']);
$v['local']=str_replace(' G ', 'G', $v['local']);
$v['visitante']=str_replace(' G ', 'G', $v['visitante']);
$v1['equipo']=str_replace(' H ', 'H', $v1['equipo']);
$v['local']=str_replace(' H ', 'H', $v['local']);
$v['visitante']=str_replace(' H ', 'H', $v['visitante']);
$v1['equipo']=str_replace(' I ', 'I', $v1['equipo']);
$v['local']=str_replace(' I ', 'I', $v['local']);
$v['visitante']=str_replace(' I ', 'I', $v['visitante']);

if(trim($v1['equipo'])==trim($v['local']) ) {
  $eLocal=$v1['equipo'];
  $local_id=$v1['id'];
}

if(trim($v1['equipo'])==trim($v['visitante']) ) {
  $eVisitante=$v1['equipo'];
  $visitante_id=$v1['id'];
}

