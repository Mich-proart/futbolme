<?php 
define('_PANEL_', 1);
require_once '../includes/config.php';


if (!isset($_POST['betsapi'])){
$consulta = "UPDATE equipo SET slug='".$_POST['slug']."' WHERE id=".$_POST['equipo_id'];
} else {
$consulta = "UPDATE equipo SET slug='".$_POST['slug']."',betsapi='".$_POST['betsapi']."' WHERE id=".$_POST['equipo_id'];	
}
//echo $consulta;

mysqli_query($mysqli, $consulta);
?>

			
