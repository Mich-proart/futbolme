<?php 
define('_PANEL_', 1);
require_once '../../includes/config.php'; 

$temporada_id = $_POST['temporada_id'];

$borrar = 'DELETE FROM partido WHERE temporada_id='.$temporada_id;

$resultadoSQL = mysqli_query($mysqli, $borrar);

echo 'Calendario borrado';
die;
