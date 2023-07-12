<?php 
define('_PANEL_', 1);
require_once '../../includes/config.php'; 

require_once 'consultasNC.php';

die(actualizarPartidosLiga($_POST['temporada'], $_POST['combinacion'], $_POST['equipoId']));
