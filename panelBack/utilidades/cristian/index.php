<?php

define('_FUTBOLME_', 1);

require_once ('../../../src/consultas.php');
require_once ('../../../src/funciones.php');


//consulta para localizar torneos
//include ('torneos.php');
include ('equipos.php');
//include ('jugadores.php');
$agrupando=array();

foreach ($resultado as $key => $value) {

	$agrupando[$value['id']]['id']=$value['id'];
	$agrupando[$value['id']]['club_id']=$value['club_id'];
	$agrupando[$value['id']]['nombre']=$value['nombre'];
	$n=poner_guion($value['nombre']);
	$n=utf8_encode($n);
	$agrupando[$value['id']]['enlaceEquipo'] = 'https://futbolme.eu/resultados-directo/equipo/'.$n.'/'.$value['id'];
	$agrupando[$value['id']]['imagenEscudo']='https://futbolme.eu/img/club/escudo'.$value['club_id'].'.png';
	

	$agrupando[$value['id']]['nombreCategoria']=$value['nombreCategoria'];
	//$agrupando[$value['id']]['imagenComunidad']=$value['imagenComunidad'];
	//$agrupando[$value['id']]['imagenPais']=$value['imagenPais'];
	$agrupando[$value['id']]['nombreLocalidad']=$value['nombreLocalidad'];
	$agrupando[$value['id']]['nombreProvincia']=$value['nombreProvincia'];
	$agrupando[$value['id']]['nombreComunidad']=$value['nombreComunidad'];
	$agrupando[$value['id']]['torneos'][$value['temporada_id']]['temporada_id']=$value['temporada_id'];
	$agrupando[$value['id']]['torneos'][$value['temporada_id']]['nombreTemporada']=$value['nombreTemporada'];	
	$agrupando[$value['id']]['torneos'][$value['temporada_id']]['enlace']='https://futbolme.eu/resultados-directo/torneo/'.poner_guion($value['nombreTemporada']).'/'.$value['temporada_id'].'/';


}

$equipos=array();

foreach ($agrupando as $key => $value) { 
	imp($value)?>
	<h3>La búsqueda se tiene que hacer solo sobre el valor de la variable nombre (nombre del equipo)</h3>
	<h1>Resultado: </h1>
	<table>
		<tr>
			<td width="92"><img src="<?php echo $value['imagenEscudo']?>" width="90"></td>
			<td width="400">
				<b><?php echo $value['nombre']?></b><br />
				<i><?php echo $value['nombreCategoria']?></i><br />
				<?php echo $value['nombreLocalidad']?> (<?php echo $value['nombreProvincia']?>) - <?php echo $value['nombreComunidad']?>
			<hr />
				<?php foreach ($value['torneos'] as $key => $torneo) { ?>
					<a href="<?php echo $torneo['enlace']?>" target="_blank" style="font-size: 13px"><?php echo $torneo['nombreTemporada']?></a><br />
				<?php } ?>
			</td>


	</table>

	
<?php die; }


/*
	
*/
die;

$file = 'buscadorEquipos.json';
$jsonencoded='';

foreach ($equipos as $row) {
    $jsonencoded.=json_encode($row)."\r\n";

    ob_flush();
    flush();
}


    
    $fh = fopen($file, 'w');
    fwrite($fh, $jsonencoded);
    fclose($fh);



?>