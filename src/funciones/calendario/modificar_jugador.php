<?php

define('_FUTBOLME_', 1);
require_once '../../consultas.php';

echo '<pre>';
print_r($_POST);
echo '</pre>';



	modificarJugador($_POST); 

	die;


	//borrarJugador($_POST); 


?>
