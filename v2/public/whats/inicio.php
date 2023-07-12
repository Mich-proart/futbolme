<?php

require_once 'bot.php';

$chatId='34681924160-1626154007@g.us';

$whats=new whatsAppBot();
$resultado=$whats->sendMessage($chatId,'prueba');

echo $resultado;

var_dump($resultado);

unset($whats);  
