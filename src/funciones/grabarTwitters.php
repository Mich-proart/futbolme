<?php
define('_FUTBOLME_', 1);
require_once '../consultas.php';

if (isset($_POST['temporada_id'])){
$consulta = "UPDATE equipo SET slug='".$_POST['slug']."' WHERE id=".$_POST['equipo_id'];
} else {
$consulta = "UPDATE equipo SET slug='".$_POST['slug']."',betsapi='".$_POST['betsapi']."' WHERE id=".$_POST['equipo_id'];	
}
               
   $mysqli = conectar();
   mysqli_query($mysqli, $consulta);
?>

			
