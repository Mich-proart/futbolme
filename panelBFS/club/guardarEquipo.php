<?php

define('_FUTBOLME_', 1);

require_once '../../src/consultas.php';
require_once 'consultasClub.php';

$mysqli = conectar();

foreach ($_POST as $key => $value) {
    $$key = mysqli_real_escape_string($mysqli, $value);
}

if ('(NULL)' == $estadio_id) {
    $estadio_id = 'NULL';
}
if ('(NULL)' == $equipacion_id) {
    $equipacion_id = 'NULL';
}

$categoria_id=(int)$categoria_id;
$fundado=(int)$fundado;
$sexo=(int)$sexo;
$desaparecido=(int)$desaparecido;
$debut_nacional=(int)$debut_nacional;

$consulta = "UPDATE equipo SET nombre='".$nombre."',nombre_completo='".$nombre_completo."', fundado=".$fundado.", desaparecido=".$desaparecido.", debut_nacional=".$debut_nacional.", escudo='".$escudo."', sexo=".$sexo.", categoria_id=".$categoria_id.", estadio_id=".$estadio_id.", equipacion_id=".$equipacion_id.", slug='".$slug."' WHERE id=".$id;

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
