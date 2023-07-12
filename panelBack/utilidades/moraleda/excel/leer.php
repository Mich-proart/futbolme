<!DOCTYPE html>
<html>
<head>
	<title>Nombres</title>
</head>
<body>
<?php

define('_FUTBOLME_', 1);

require_once ('../../../../src/consultas.php');
require_once ('../../../../src/funciones.php');

require_once 'Classes/PHPExcel.php';
$archivo = "madrid.xlsx";
$inputFileType = PHPExcel_IOFactory::identify($archivo);
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objReader->load($archivo);
$sheet = $objPHPExcel->getSheet(0); 
$highestRow = $sheet->getHighestRow(); 
$highestColumn = $sheet->getHighestColumn(); 

?>
<table>
<?php 
$mysqli = conectar();
	    

for ($row = 2; $row <= $highestRow; $row++){ 

	
		$club_id=$sheet->getCell("A".$row)->getValue();
		$referencia=$sheet->getCell("B".$row)->getValue();
		$otro=$sheet->getCell("C".$row)->getValue();
		$nombreCompleto=$sheet->getCell("D".$row)->getValue();
		$escritorio=$sheet->getCell("E".$row)->getValue();
		$movil=$sheet->getCell("F".$row)->getValue();
		$filial=$sheet->getCell("G".$row)->getValue();
	
	
		echo '<table><tr><td>'.$club_id."</td>";
		echo '<td>'.$referencia.'</td>';
		echo '<td>'.$otro.'</td>';
		echo '<td>'.$nombreCompleto.'</td>';
		echo '<td>'.$escritorio.'</td>';
		echo '<td>'.$movil.'</td>';
		echo '<td>'.$filial.'</td>';
		echo '</tr></table>';

		/*$sq='SELECT nombre FROM club WHERE id='.$club_id;
		$resultadoSQL = mysqli_query($mysqli, $sq);
	    $club = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
	    echo $club['nombre'];*/

	    $sq='UPDATE club SET nombre_completo="'.$nombreCompleto.'" WHERE id='.$club_id;
	    //echo $sq.'<br />';
	    mysqli_query($mysqli, $sq);

	    $sq='SELECT id,nombre,nombreCorto FROM equipo WHERE club_id='.$club_id;
		$resultadoSQL = mysqli_query($mysqli, $sq);
	    $equipos = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
	    foreach ($equipos as $key => $e) {
	    	$equipo=trim($e['nombre']);
	    	$final=substr($equipo, -2);$f=trim($final);
	    	$largo=strlen($f);
	    	if ($largo==1){
	    		$nuevoEscritorio=$escritorio.$final;
	    		$nuevoMovil=$movil.$final;
	    	} else {
	    		$nuevoEscritorio=$escritorio;
	    		$nuevoMovil=$movil;
	    	}
	    	echo $e['id'].' : '.$equipo.' : '.$e['nombreCorto'].' - '.$final.' -- '.$largo.'<br />';
	    	echo 'Escritorio: '.$nuevoEscritorio.' : Movil: '.$nuevoMovil.'<hr />';

	    	$sq='UPDATE equipo SET nombre="'.$nuevoEscritorio.'", nombreCorto="'.$nuevoMovil.'" WHERE id='.$e['id'];
	    	//echo $sq.'<br />';
	    	mysqli_query($mysqli, $sq);

	    }

} ?>


<?php 

//var_export($stock);die;
//guardarJSON($stock, '../json/1.json');
?>
</body>
</html>