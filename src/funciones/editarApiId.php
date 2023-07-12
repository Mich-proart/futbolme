<?php

define('_FUTBOLME_', 1);
require_once '../consultas.php';

echo '<pre>';
print_r($_POST);
echo '</pre>';

if ($_POST['apiName']=='betsapi'){
	$consulta = 'UPDATE partido SET betsapi='.$_POST['apiId'].' WHERE id='.$_POST['id'];
} 
if ($_POST['apiName']=='apifootball'){
	$consulta = 'UPDATE partido SET partidoAPI='.$_POST['apiId'].' WHERE id='.$_POST['id'];
}
if ($_POST['apiName']=='clasificado'){
	$consulta = 'UPDATE partido SET clasificado='.$_POST['apiId'].' WHERE id='.$_POST['id'];
}
if ($_POST['apiName']=='estadio'){
	$consulta = 'UPDATE partido SET estadio='.$_POST['apiId'].' WHERE id='.$_POST['id'];
}
if ($_POST['apiName']=='arbitro_id'){
	$consulta = 'UPDATE partido SET arbitro_id='.$_POST['apiId'].' WHERE id='.$_POST['id'];
}

if ($_POST['apiName']=='observaciones'){
	$consulta = 'UPDATE partido SET observaciones="'.$_POST['apiId'].'" WHERE id='.$_POST['id'];
}

if ($_POST['apiName']=='comentario'){
	$consulta = 'UPDATE partido SET comentario="'.$_POST['apiId'].'" WHERE id='.$_POST['id'];
}

if ($_POST['apiName']=='vincularJugador'){
	$consulta = 'UPDATE jugador SET imagen="'.$_POST['nombre'].'" WHERE id='.$_POST['id'];
} 

echo $consulta;

    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);

?>
