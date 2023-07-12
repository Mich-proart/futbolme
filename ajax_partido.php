<?php
define('_FUTBOLME_', 1);
require_once 'src/config.php';
$pagina = 'partido';
$partido_id=$_GET['id']??0;

require_once 'includes/pagPartido/arranque.php';

require_once 'includes/pagPartido/partidoCabecera.php';


require_once 'includes/pagPartido/partidoTwitter.php';  ?>






