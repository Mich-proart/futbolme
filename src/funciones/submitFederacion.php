<?php
define('_FUTBOLME_', 1);
require_once '../consultas.php';    

    /*echo '<pre>';
    print_r($_POST);
    echo '</pre>';*/

    

$partidos=count($_POST['partido_id']);
$mysqli = conectar();

$cambio=0;
for ($i=0; $i < $partidos; $i++) {  
    if ($_POST['cambio'][$i]>0){
    	$cambio++;
		$sql='UPDATE partido SET estado_partido='.$_POST['estado_partido'][$i].',goles_local='.$_POST['goles_local'][$i].',goles_visitante='.$_POST['goles_visitante'][$i].' WHERE id='.$_POST['partido_id'][$i];
		mysqli_query($mysqli, $sql);
		echo $sql.'<br />';
	}
}


$ruta='../../json/actualizaciones/'.$_POST['temporada_id'][0].'_federacion.json';
echo '<hr />actualizacion borrada. ';
unlink($ruta);

if ($cambio>0){
$f1='../../json/temporada/'.$_POST['temporada_id'][0].'/tipo.json';
unlink($f1);
$f2='../../json/temporada/'.$_POST['temporada_id'][0].'/partidosActiva.json';
unlink($f2);
echo '<hr />ficheros del torneo borrados';
}

    ?>
