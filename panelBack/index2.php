<?php 
define('_FUTBOLME_', 1);
require_once '../src/consultas.php';
require_once '../src/funciones.php';

 $sql='SELECT id, localidad_id, nombre, observaciones, territorialRFEF
FROM club WHERE territorialRFEF ="01" AND localidad_id = 1';
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $sql);
        $datos = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC); 

        $contador=0;
        foreach ($datos as $key => $value) {
        	$o=$value['observaciones'];
        	$o1=explode('Localidad:',$o);
        	$o2=trim($o1[1]);        	
        	if (trim($o2)=='0'){ continue; }

        	$o3=explode(' ', $o2);
        	$o4=$o3[0];

        	$sq="SELECT id, nombre FROM localidad WHERE nombre LIKE '%".$o4."%'";
        	$resultadoSQL = mysqli_query($mysqli, $sq);
        	$ids = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC); 
        	echo $sq.'<br />';
        	imp($ids);
        	
        	if (count($ids)>0){
        		$sq='UPDATE club SET localidad_id='.$ids['id'].' WHERE id='.$value['id'];
        		mysqli_query($mysqli, $sq);
        		$contador++;
        		echo $sq.' Num: '.$contador.'<br />';
        	}
        }

?>