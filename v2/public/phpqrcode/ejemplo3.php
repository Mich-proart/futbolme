
<?php

include 'qrlib.php';

echo 

createQRCode('Probando');




function createQRCode($str)
 {
     $rn = strtotime(date("Y-m-d H:i:s"));
     QRCode::png($str, $rn . '.png', "large", 10, 3);
     header("Content-type: image/png");
     readfile($rn . '.png');
     unlink($rn . '.png');
     exit(0);
 }