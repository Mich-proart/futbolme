<?php
define('_FUTBOLME_', 1);
require_once '../../consultas.php';

$mysqli = conectar();
$consulta = '	
			INSERT INTO temporada_equipo (temporada_id,equipo_id)
			VALUES 
			('.$_POST['temporada_id'].', '.$_POST['equipo_id'].')									
		    ';

$consulta = mysqli_query($mysqli, $consulta);
echo 'ok'; die;
