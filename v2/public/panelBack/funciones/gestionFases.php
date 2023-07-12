<?php 
define('_PANEL_', 1);
require_once '../includes/config.php';
if ($_POST['m']==0){ // insertar fase
    $sql='INSERT INTO eliminatorio_fase (eliminatorio_id,fase_id) 
    VALUES ('.$_POST['tor'].', '.$_POST['fase_id'].')';
    mysqli_query($mysqli, $sql);
}

if ($_POST['m']==1){ // quitar fase
    $sql='DELETE FROM eliminatorio_fase WHERE eliminatorio_id='.$_POST['tor'].' AND fase_id='.$_POST['fase_id'];
    mysqli_query($mysqli, $sql);
}

if ($_POST['m']==2){ // insertar grupo a fase
	$sql = 'INSERT INTO grupofasetorneo (torneo_id,fase_id, grupo_id)
	VALUES ('.$_POST['tor'].', '.$_POST['fase_id'].', '.$_POST['grupo_id'].')';
	mysqli_query($mysqli, $sql);
}

if ($_POST['m']==3){ // quitar grupo
    $sql='DELETE FROM grupofasetorneo WHERE torneo_id='.$_POST['tor'].' AND fase_id='.$_POST['fase_id'].' AND grupo_id='.$_POST['grupo_id'];
    mysqli_query($mysqli, $sql);    
}
?>