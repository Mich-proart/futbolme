<?php
define('_FUTBOLME_', 1);
require_once '../consultas.php';    


$equipos=count($_POST['federacion_id']);
$unicos = array_unique($_POST['federacion_id']);

echo 'Equipos: '.$equipos.' - Unicos: '.count($unicos).'<br />';

if($equipos > count($unicos)){
	  echo "¡Hay equipos repetidos!"; 
	  $f=$_POST['federacion_id'];asort($f);
	     echo '<pre>';
	    print_r($f);
	    echo '</pre>';
	  die; 

} else {

  	$mysqli = conectar();
	for ($i=0; $i < $equipos; $i++) {    
	$sql='UPDATE equipo SET federacion_id='.$_POST['federacion_id'][$i].' WHERE id='.$_POST['id'][$i];
	mysqli_query($mysqli, $sql);
	echo $sql.'<br />';
	}
	echo '<hr />equipos actualizados';
}






    ?>
