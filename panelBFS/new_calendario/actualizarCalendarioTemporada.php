<?php
define('_FUTBOLME_', 1);
require_once '../../src/consultas.php';
require_once 'consultasNC.php';

die(actualizarPartidosLiga($_POST['temporada'], $_POST['combinacion'], $_POST['equipoId']));
