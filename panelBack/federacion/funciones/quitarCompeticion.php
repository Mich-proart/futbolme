<?php
define('_FUTBOLME_', 1);


require_once '../consultas.php';
require_once '../funciones.php';

$id=$_POST['id'];
$temporada_id=$_POST['temporada_id'];

$mysqli = conectar();
$mysqliFM = conectarFM();

//futbolme
$sql="DELETE FROM partido WHERE temporada_id=".$temporada_id;
mysqli_query($mysqliFM, $sql);
$sql="DELETE from temporada WHERE id=".$temporada_id;
mysqli_query($mysqliFM, $sql);
$sql="DELETE from temporada_equipo WHERE temporada_id=".$temporada_id;
mysqli_query($mysqliFM, $sql);
$sql="DELETE from liga WHERE id=".$id;
mysqli_query($mysqliFM, $sql);



$sql="UPDATE torneo SET visible=4, apiRFEFcompeticion=0, apiRFEFgrupo=0 WHERE id=".$id;
mysqli_query($mysqliFM, $sql);

//futbolbase
$sql="UPDATE partido SET temporada_id=0 WHERE temporada_id=".$temporada_id;
mysqli_query($mysqli, $sql);

$carpeta = '../../../json/temporada/'.$temporada_id;

foreach(glob($carpeta . "/*") as $archivos_carpeta){   
unlink($archivos_carpeta);      
}
rmdir($carpeta);

echo 'Carpeta '.$carpeta.' eliminada';

die;
?>

