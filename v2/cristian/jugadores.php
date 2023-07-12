<?php
//jugadores

$mysqli = conectar();

$campos = 'j.id, j.nombre, j.apodo, j.fecha_nacimiento, j.lugar_nacimiento, j.es_baja, j.posicion, j.id_original, 
		j.equipoActual_id, (SELECT nombre FROM equipo WHERE id=j.equipoActual_id) equipo';
$tabla = ' jugador j';
$condicion = " WHERE es_baja=0";
$orden = ' ORDER BY j.apodo ';
$consulta = 'SELECT '.$campos.' FROM '.$tabla.$condicion.$orden;
//echo $consulta;
$resultadoSQL = mysqli_query($mysqli, $consulta);
$resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);


?>