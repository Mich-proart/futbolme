<?php
define('_FUTBOLME_', 1);

require_once '../consultas.php';
require_once '../funciones.php';
$id=$_POST['id'];
$estado=$_POST['estado'];

if ($estado==1) { $nuevo_estado=2; } else { $nuevo_estado=1; }

$sql="UPDATE torneo SET estado=".$nuevo_estado." WHERE id=".$id;
$mysqli = conectar();
mysqli_query($mysqli, $sql);

echo 'Estado modificado a '.$nuevo_estado;
die;
?>

