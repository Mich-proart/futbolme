<?php
define('_PANEL_', 1);
require_once '../includes/config.php';

$target_dir = __DIR__."\..\..".$_POST['destino'];
$target_file = $target_dir.$_POST['nombre'];
$imageFileType = pathinfo(basename($_FILES['imagen']['name']), PATHINFO_EXTENSION);
$uploadOk = 1;
// Check if image file is a actual image or fake image
if (isset($_POST['submit'])) {
    $check = getimagesize($_FILES['imagen']['tmp_name']);
    if (false !== $check) {
        echo 'El archivo es una imagen - '.$check['mime'].'.';
        $uploadOk = 1;
    } else {
        echo 'El archivo no es una imagen.';
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo 'El archivo ya existe.';
    $uploadOk = 0;
}
// Check file size
if ($_FILES['imagen']['size'] > 500000) {
    echo 'El archivo es demasiado grande.';
    $uploadOk = 0;
}
// Allow certain file formats
if ('png' != $imageFileType && 'jpg' != $imageFileType) {
    echo 'Solo archivos PNG o JPG.';
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if (0 == $uploadOk) {
    echo 'El archivo no se ha subido.';
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
    header('Location:'.$_SERVER['HTTP_REFERER'].$flag);
    exit();
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $target_file)) {
        echo 'El archivo '.basename($_FILES['imagen']['name']).' se ha subido.';
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
        echo 'El archivo no se ha subido.';
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
}
