<?php 
define('_PANEL_', 1);
require_once '../includes/config.php';

$grupo_id=$_POST['grupo_id']??0;
if ($grupo_id==0){ $grupo_id='NULL'; }

$sql = 'INSERT INTO partido (temporada_id,estado_partido,fecha,hora_prevista,jornada,grupo_id, equipoLocal_id, equipoVisitante_id) VALUES ("'.$_POST['temporada_id'].'","0", "'.$_POST['fecha'].'", "'.$_POST['hora_prevista'].'","'.$_POST['jornada'].'", '.$grupo_id.', "'.$_POST['equipoLocal_id'].'", "'.$_POST['equipoVisitante_id'].'")';

echo $sql.'<hr />';

$resultadoSQL = mysqli_query($mysqli, $sql);
?>