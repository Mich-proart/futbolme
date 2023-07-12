<?php
require_once '../includes/config.php'; //include funciones,consultas, post y fechas
require_once '../includes/head.php';
require_once 'bot.php';

$chatId='34681924160-1626154007@g.us';

$whats=new whatsAppBot();
$resultado=$whats->welcome($chatId);

echo $resultado;

var_dump($resultado);

unset($whats);  
