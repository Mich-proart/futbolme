<?php
define('_PANEL_', 1);
require_once '../includes/config.php';


$nombre=$_POST['nombre'];
$nombre_completo=$_POST['nombre_completo'];
$fundado=$_POST['fundado'];
$desaparecido=$_POST['desaparecido'];
$debut_nacional=$_POST['debut_nacional'];
$escudo=$_POST['escudo'];
$sexo=$_POST['sexo']??0;
$categoria_id=$_POST['categoria_id'];
$estadio_id=$_POST['estadio_id'];

if ($estadio_id>0) { $estadio_txt=' estadio_id='.$estadio_id.', '; } else { $estadio_txt=''; }

$equipacion_id=$_POST['equipacion_id'];
$slug=$_POST['slug'];
$id=$_POST['id'];

$consulta = 'UPDATE equipo SET nombre="'.$nombre.'",nombre_completo="'.$nombre_completo.'", fundado='.$fundado.', desaparecido='.$desaparecido.', debut_nacional='.$debut_nacional.', escudo="'.$escudo.'", sexo=0, categoria_id='.$categoria_id.','.$estadio_txt.'equipacion_id='.$equipacion_id.', slug="'.$slug.'" WHERE id='.$id;

//echo $consulta;

mysqli_query($mysqli, $consulta);


die;