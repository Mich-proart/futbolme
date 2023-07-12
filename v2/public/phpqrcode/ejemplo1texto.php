<?php

include 'qrlib.php';

$_GET['quba']='Hola amigo';
$_GET['q']='L';
$_GET['qa']='5';

if (empty($_GET['quba']) || empty($_GET['q']) || empty($_GET['qa'])) {
    die('Missing params.');
}
// Generate a QR Code with the relevant information.
QRCode::png($_GET['quba'] . '|' . $_GET['q'] . '|' . $_GET['qa'], false, 'Q', 5);

?>