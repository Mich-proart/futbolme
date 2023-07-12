<?php
define('_FUTBOLME_', 1);

require_once '../consultas.php';
require_once '../funciones.php';
$id=$_POST['id'];
$competicion_id=$_POST['competicion_id'];
$grupo_id=$_POST['grupo_id'];
$comunidad_id=$_POST['comunidad_id'];

$mysqliFM = conectarFM();
$mysqli = conectar();
$sql="UPDATE torneo SET apiRFEFcompeticion=".$competicion_id.",apiRFEFgrupo=".$grupo_id." WHERE id=".$id;
mysqli_query($mysqliFM, $sql);
echo $sql.'<br />';

$sql="SELECT id FROM temporada WHERE torneo_id=".$id;
$resultadoSQL = mysqli_query($mysqliFM, $sql);
$te = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
$temporada_id=$te['id'];

$sql='UPDATE partido SET temporada_id='.$temporada_id.' WHERE grupo_id='.$grupo_id.' AND comunidad_id='.$comunidad_id;
echo $sql.'<br />';
mysqli_query($mysqli, $sql);

$sql='UPDATE torneo SET temporada_id='.$temporada_id.' WHERE grupo_id='.$grupo_id.' AND comunidad_id='.$comunidad_id;
echo $sql.'<br />';
mysqli_query($mysqli, $sql);

echo '<a href="index.php">actualizar</a>';

?>