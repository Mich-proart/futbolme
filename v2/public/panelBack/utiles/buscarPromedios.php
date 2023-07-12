<?php 
define('_PANEL_', 1);
require_once '../includes/config.php';
include '../../../src/Application/Helpers/DbHelper.php';

$sql='SELECT t.id, t.nombre,te.id temporada_id FROM torneo t
INNER JOIN temporada te ON te.torneo_id=t.id
WHERE t.division_id>1 AND t.division_id<6 AND t.tipo_torneo=1 AND t.visible>4 ORDER BY orden';

$resultadoSQL = mysqli_query($mysqli, $sql);
$r = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

$txt='<hr /><hr />Promedio de puntos por gol conseguido<br /><br />';

$txt2='<hr /><hr />Equipos imbatidos<br /><br />';

$txt3='<hr /><hr />Los más goleadores<br /><br />';

foreach ($r as $k => $v) {
    $f = '../../../json/temporada/'.$v['temporada_id'].'/tipo.json';
    if (!@file_exists($f)) { 
       Xtipo($v['temporada_id']);    
    }

    $json = file_get_contents($f);
    $datos = json_decode($json, true);

    $clasi=$datos['clasificacion']['clasificacionFinal'];
    
    
    foreach ($clasi as $k1 => $v1) {
      //imp($v1);
      $pintoTorneo=0;$pintoTorneo2=0;$pintoTorneo3=0;
      if ($v1['puntos']==0 || $v1['gFavor']==0){ continue; }
      $promedio=($v1['puntos']/$v1['gFavor']);
      $promedio3=($v1['gFavor']/$v1['jugados']);
      //echo $promedio;  

        if ($promedio3>2.0){
          if ($pintoTorneo3==0){
          $txt3.='<hr /><b><a href="'.generaUrl('torneo', $v['temporada_id']).'">'.$v['nombre'].'</a></b><br /><br />';
          $pintoTorneo3=1;
          }
          $txt3.='El <a href="'.generaUrl('equipo', $v1['equipo_id']).'">'.$v1['nombreCorto'].'</a> es '.posicion($v1['posicion']).' después de '.$v1['jugados'].' partidos disputados<br />';

          $txt3.='Ha conseguido '.$v1['puntos'].' puntos, ganando en '.$v1['ganados'].' partidos y empatando en '.$v1['empatados'].', marcando '.$v1['gFavor'].' goles, lo que le da un promedio de <b>'.$promedio3.'</b> goles por partido.<br />';
        }

        if ($v1['gContra']==0){
          if ($pintoTorneo2==0){
          $txt2.='<hr /><b><a href="'.generaUrl('torneo', $v['temporada_id']).'">'.$v['nombre'].'</a></b><br /><br />';
          $pintoTorneo2=1;
          }
          $txt2.='El <a href="'.generaUrl('equipo', $v1['equipo_id']).'">'.$v1['nombreCorto'].'</a> es '.posicion($v1['posicion']).' después de '.$v1['jugados'].' partidos disputados<br />';

          $txt2.='Ha conseguido '.$v1['puntos'].' puntos, ganando en '.$v1['ganados'].' partidos y empatando en '.$v1['empatados'].', marcando '.$v1['gFavor'].' goles, lo que le da un promedio de <b>'.$promedio.'</b> puntos por gol conseguido.<br />';
        }

        if ($promedio>2.9){
          if ($pintoTorneo==0){
          $txt.='<hr /><b><a href="'.generaUrl('torneo', $v['temporada_id']).'">'.$v['nombre'].'</a></b><br /><br />';
          $pintoTorneo=1;
          }
          $txt.='El <a href="'.generaUrl('equipo', $v1['equipo_id']).'">'.$v1['nombreCorto'].'</a> es '.posicion($v1['posicion']).' después de '.$v1['jugados'].' partidos disputados<br />';

          $txt.='Ha conseguido '.$v1['puntos'].' puntos, ganando en '.$v1['ganados'].' partidos y empatando en '.$v1['empatados'].', marcando '.$v1['gFavor'].' goles, lo que le da un promedio de <b>'.$promedio.'</b> puntos por gol conseguido.<br />';
        }
    }

    
}

echo $txt3;
echo '<hr />';
echo $txt2;
echo '<hr />';
echo $txt;

$txt=str_replace('<br />', "\r\n", $txt);
$txt2=str_replace('<br />', "\r\n", $txt2);
$txt3=str_replace('<br />', "\r\n", $txt3);



?>
<textarea cols="150" rows="100"><?php echo $txt3?><?php echo $txt2?><?php echo $txt?></textarea>

<?php

function posicion($p){
  switch ($p) {
    case '1': $res='<b>Lider</b>'; break;
    case '2': $res='segundo'; break;
    case '3': $res='tercero'; break;
    case '4': $res='cuarto'; break;
    case '5': $res='quinto'; break;
    case '6': $res='sexto'; break;
    case '7': $res='séptimo'; break;
    case '8': $res='octavo'; break;
    case '9': $res='noveno'; break;    
    default: $res='------'; break;
  }

  return $res;

}

