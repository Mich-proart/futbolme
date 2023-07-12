<?php define('_FUTBOLME_', 1);
require_once '../consultas.php';
require_once '../funciones.php';

$mysqli = conectar();

echo '<pre>';
print_r($_POST);
echo '</pre>';



if (isset($_POST['tarId'])) {    
    $consulta = 'DELETE FROM tarjeta WHERE id='.$_POST['tarId'];
} else { 

    $temporada = $_POST['temporada'];
    $partido = $_POST['partido'];
    $jugador = $_POST['jugador'];
    $tipo = $_POST['tipo'];
    $minuto = $_POST['minuto'];
    $esLocal = $_POST['esLocal']; 
    $arbitro = $_POST['arbitro']??0; 

    $consulta = "INSERT INTO tarjeta (jugador_id, arbitro_id, partido_id, tipo, minuto, esLocal, temporada_id)
            VALUES ('".$jugador."', ".$arbitro.", '".$partido."', '".$tipo."', '".$minuto."', '".$esLocal."', '".$temporada."')";
}
    

echo $consulta;
mysqli_query($mysqli, $consulta);
?>
