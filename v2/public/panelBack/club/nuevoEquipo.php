<?php

define('_PANEL_', 1);
require_once '../includes/config.php'; //include funciones,consultas, post y fechas


$consulta = "INSERT INTO equipo (categoria_id, club_id, nombre, nombreCorto, nombre_completo, sexo )
			VALUES ('".$_POST['categoria_id']."', '".$_POST['club_id']."', '".$_POST['nombre']."', '".$_POST['nombre']."', '".$_POST['nombre_completo']."', '1')";
mysqli_query($mysqli, $consulta);
die();