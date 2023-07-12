<?php 
define('_PANEL_', 1);
require_once '../includes/config.php';
include '../../../src/Application/Helpers/DbHelper.php';

$sql='SELECT t.id, t.nombre,te.id temporada_id FROM torneo t
INNER JOIN temporada te ON te.torneo_id=t.id
WHERE t.division_id<6 AND t.tipo_torneo=1 AND t.visible>4 AND t.pais_id=60 ORDER BY orden';

$resultadoSQL = mysqli_query($mysqli, $sql);
$r = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

$txt='Equipos invictos en categóría nacional<br /><br />';

foreach ($r as $k => $v) {
    $f = '../../../json/temporada/'.$v['temporada_id'].'/tipo.json';
    if (!@file_exists($f)) { 
       Xtipo($v['temporada_id']);    
    }

    $json = file_get_contents($f);
    $datos = json_decode($json, true);

    $clasi=$datos['clasificacion']['clasificacionFinal'];
    
    
    foreach ($clasi as $k1 => $v1) {
        if ($v1['jugados']>0 && $v1['perdidos']==0 && $v1['empatados']==0){

          $txt.='<hr /><b><a href="'.generaUrl('torneo', $v['temporada_id']).'">'.$v['nombre'].'</a></b><br /><br />';

          $txt.='El <a href="'.generaUrl('equipo', $v1['equipo_id']).'">'.$v1['nombreCorto'].'</a> es '.posicion($v1['posicion']).' después de '.$v1['jugados'].' partidos disputados<br />';

          $txt.='Ha conseguido '.$v1['puntos'].' puntos, ganando en '.$v1['ganados'].' partidos y empatando en '.$v1['empatados'].'.<br />';

          $txt.='En cuanto a goles, ha logrado marcar '.$v1['gFavor'].' goles y ha encajado '.$v1['gContra'].'<br />';              
        }
    }
}

$txt=str_replace('<br />', "\r\n", $txt);

?>
<textarea cols="150" rows="100"><?php echo $txt?></textarea>

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

