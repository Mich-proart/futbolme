<?php
define('_FUTBOLME_', 1);
require_once '../../src/consultas.php';
require_once '../../src/funciones.php';

$tipo_torneo=1;

$resultado=listarTorneosPorCategoria($tipo_torneo,1);
$temporadas=$resultado[0];temporadas($temporadas);
$resultado=listarTorneosPorCategoria($tipo_torneo,4);
$temporadas=$resultado[0];temporadas($temporadas);
$resultado=listarTorneosPorCategoria($tipo_torneo,5);
$temporadas=$resultado[0];temporadas($temporadas);
$resultado=listarTorneosPorCategoria($tipo_torneo,7);
$temporadas=$resultado[0];temporadas($temporadas);
/*$resultado=listarTorneosPorCategoria($tipo_torneo,8);
$temporadas=$resultado[0];temporadas($temporadas);
$resultado=listarTorneosPorCategoria($tipo_torneo,9);
$temporadas=$resultado[0];temporadas($temporadas);*/

function temporadas($temporadas){
	foreach ($temporadas as $key => $value) {
		if ($value['id']>2) {
			echo $value['id'].' '.$value['nombre'].'<br />';
			//borrar_temporada($value['id']);
			//if ($value['id']==4) { die; } 
		}
		
	}
}



?>