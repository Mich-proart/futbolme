<?php

define('_FUTBOLME_', 1);

require_once '../../src/consultas.php';
require_once 'consultasClub.php';

$archivo = $_GET['ruta'];
// See if it exists before attempting deletion on it
if (file_exists($archivo)) {
    unlink($archivo); // Delete now
}
// See if it exists again to be sure it was removed
if (file_exists($archivo)) {
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
} else {
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
}
header('Location:'.$_SERVER['HTTP_REFERER'].$flag);
exit();
