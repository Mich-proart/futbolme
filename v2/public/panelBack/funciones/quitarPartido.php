<?php 
define('_PANEL_', 1);
require_once '../includes/config.php'; //include funciones,consultas, post y fechas

$sql='DELETE FROM partido WHERE id='.$_POST['id'];
mysqli_query($mysqli, $sql);
?>
<td colspan="6">Partido eliminado</td>