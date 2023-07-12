<?php 
define('_PANEL_', 1);

$idChat=$_POST['idChat'].'@g.us';
$txt=$_POST['txt'];
$txt=str_replace('<br />',"\n",$txt);

$_GET['sendMessage']=1;
$_GET['txt']=$txt;
$_GET['id_chat']=$idChat;
include('../chatapi/acceso.php');

die('Enviado');


?>
