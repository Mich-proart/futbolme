<?php
define('_FUTBOLME_', 1);
require_once '../../consultas.php';

$mysqli = conectar();
$consulta = '	
DELETE FROM temporada_equipo WHERE 
temporada_id='.$_POST['temporada_id'].' AND equipo_id='.$_POST['equipo_id'];

$consulta = mysqli_query($mysqli, $consulta);
echo 'ok'; die;
