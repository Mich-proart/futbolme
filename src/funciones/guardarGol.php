<?php 
define('_FUTBOLME_', 1);
require_once '../consultas.php';
require_once '../funciones.php';

$mysqli = conectar();

echo '<pre>';
print_r($_POST);
echo '</pre>';



if (isset($_POST['golId'])) { 
   	$sql = 'SELECT partido_id FROM gol WHERE id='.$_POST['golId'];
   	$resultadoSQL = mysqli_query($mysqli, $sql);
	$resultado = mysqli_fetch_array($resultadoSQL);
	$partido = $resultado[0];

    $consulta = 'DELETE FROM gol WHERE id='.$_POST['golId'];
} else { 

	$temporada = $_POST['temporada'];
	$partido = $_POST['partido'];
	$jugador = $_POST['jugador'];
	$tipo = $_POST['tipo'];
	$minuto = $_POST['minuto'];
	$esLocal = $_POST['esLocal'];  
    $consulta = "INSERT INTO gol (jugador_id, partido_id, tipo, minuto, esLocal, temporada_id)
                        VALUES ('".$jugador."', '".$partido."', '".$tipo."', '".$minuto."', '".$esLocal."', '".$temporada."')";
} 
echo $consulta;
mysqli_query($mysqli, $consulta);

$partidoGoles = XpartidoGoles($partido);
$cosas=obsGoleadores2($partidoGoles);  
$sql = 'UPDATE partido SET observaciones="'.$cosas.'" WHERE id='.$partido;
echo "<br />".$sql;
   	$resultadoSQL = mysqli_query($mysqli, $sql);
	
?>

