<?php

define('_FUTBOLME_', 1);

require_once '../../src/consultas.php';
require_once 'consultasClub.php';

$mysqli = conectar();

foreach ($_POST as $key => $value) {
    $$key = mysqli_real_escape_string($mysqli, $value);
}

if ('' === $origen_id) {
    $origen = 'origen_id=(NULL)';
} else {
    $origen = "origen_id=".$origen_id;
}

$socios=(int)$socios;
$presupuesto=(int)$presupuesto;
$fundado=(int)$fundado;
$desaparecido=(int)$desaparecido;
$es_seleccion=(int)$es_seleccion;

$consulta = "UPDATE club SET 
nombre='".$nombre."', 
nombre_completo='".$nombre_completo."', 
presidente='".$presidente."', 
patrocinador='".$patrocinador."', 
socios=".$socios.", 
presupuesto=".$presupuesto.", 
web='".$web."', 
email='".$email."', 
contacto='".$contacto."', 
telefono='".$telefono."', 
observaciones='".$observaciones."', 
".$origen.", 
fundado=".$fundado.", 
desaparecido=".$desaparecido.", 
direccion='".$direccion."', 
es_seleccion=".$es_seleccion.", 
localidad_id='".$localidad_id."',
codigoRFEF='".$codigoRFEF."',
territorialRFEF='".$territorialRFEF."' WHERE id=".$id;


if (mysqli_query($mysqli, $consulta)) {
    $pos = strpos($_SERVER['HTTP_REFERER'], '?');
    if (false === $pos) {
        $flag = '?ok';
    } else {
        $flag = '&ok';
    }
    $pos = strpos($_SERVER['HTTP_REFERER'], substr($flag, 1));
    if (false !== $pos) {
        $flag = '';
    }
} else {
    $pos = strpos($_SERVER['HTTP_REFERER'], '?');
    if (false === $pos) {
        $flag = '?error';
    } else {
        $flag = '&error';
    }
    $pos = strpos($_SERVER['HTTP_REFERER'], substr($flag, 1));
    if (false !== $pos) {
        $flag = '';
    }
}
header('Location:'.$_SERVER['HTTP_REFERER'].$flag);
exit();
