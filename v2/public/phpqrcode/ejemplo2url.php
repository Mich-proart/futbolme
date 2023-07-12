<?php

include 'qrlib.php';

echo 

$imagen=generarQR('https://www.futbolme.com');

echo $imagen;

echo '<img src="'.$imagen.'" /><hr/>';

function generarQR($url)
{
    $tempDir = 'img/';
    $fileName = "qrcode.png";
    $pngAbsoluteFilePath = $tempDir . $fileName;
    QRCode::png($url, $pngAbsoluteFilePath, 'L', '4', '4');
    return $pngAbsoluteFilePath;
}



?>