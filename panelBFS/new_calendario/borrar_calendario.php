<?php

require_once '../consultas.php';

$mysqli = conectar();

$temporada_id = $_GET['temporada_id'];

$borrar = 'DELETE FROM partido WHERE temporada_id='.$temporada_id;

$resultadoSQL = mysqli_query($mysqli, $borrar);

echo 'ok';
