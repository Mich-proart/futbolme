<?php
define('_FUTBOLME_', 1);

require_once '../../../src/consultas.php'; //conectando con futbolme

$id=$_POST['id'];


$sql="UPDATE club SET origen_id=1 WHERE id=".$id;
$mysqli = conectar();
mysqli_query($mysqli, $sql);

echo ' - OK';


die;
?>

