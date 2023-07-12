<?php 
$f = $_GET['f'];
if (@file_exists($f)) { 
$json = file_get_contents($f);
$e = json_decode($json, true);
//$ruta='https://files.fcf.cat/escudos/clubes/escudos/';
$ruta='http://efo87.fcf.novanet.es';
$carpeta='../../../img/federacion/01/';
	foreach ($e as $kj => $vj) {
		$escudo=$vj['club']??'';		
		if (substr($escudo, 0,1)=='h'){ continue; }
		echo '<br />Escudo: '.$escudo;
		$origen=$ruta.$escudo;
		echo '<br />Origen: '.$origen;
		$n=explode('_', $escudo);
		$club=$n[1];$club=intval($club);
		$destino=$carpeta.'escudo_'.$club.'.png';
		echo '<br />Destino: '.$destino;
		file_put_contents($destino, file_get_contents($origen));
	}
}
die;

//00100_0000101511_escut_fcf.png

//(/pnfg/pimg/Clubes/00100_0000101511_escut_fcf.png)
///pnfg/pimg/Clubes/00100_0000065941_escudo_para_federacion
/*$img = "./ruta/imagen.jpg";
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename='.basename($img));
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header('Content-Length: ' . filesize($img));
ob_clean();
flush();
readfile($img);*/
?>