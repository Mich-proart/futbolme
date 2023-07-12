<?php

define('_FUTBOLME_', 1);

require_once ('../src/consultas.php');
require_once ('../src/funciones.php');

$sq='SELECT t.id, t.nombre, te.id as temporada_id FROM torneo t INNER JOIN temporada te ON te.torneo_id=t.id WHERE t.visible>4';
$mysqli = conectar();
$resultadoSQL = mysqli_query($mysqli, $sq);
$resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
$torneo=array();


$file = 'urls_torneos.json';
$jsonencoded='';

foreach ($resultado as $key => $value) {
	$torneo[$value['id']]['torneo_id']=$value['id'];
	$torneo[$value['id']]['temporada_id']=$value['temporada_id'];
	$pgTemporada = '/resultados-directo/torneo/'.poner_guion($value['nombre']).'/'.$value['temporada_id'].'/';
	$pgTemporada=utf8_encode($pgTemporada);
	$torneo[$value['id']]['ruta']=$pgTemporada;

}
guardarJSON($torneo, $file);


die;


//consulta para localizar torneos
//include ('torneos.php');
include('equipos.php');
//include ('jugadores.php');
$agrupando=array();

foreach ($resultado as $key => $value) {

	$agrupando[$value['id']]['id']=$value['id'];
	$agrupando[$value['id']]['club_id']=$value['club_id'];
	$agrupando[$value['id']]['title']=$value['nombre'];
	$n=poner_guion($value['nombre']);
	$n=utf8_encode($n);
	$agrupando[$value['id']]['link'] = 'https://futbolme.com/resultados-directo/equipo/'.$n.'/'.$value['id'];
	$agrupando[$value['id']]['imagenEscudo']='https://futbolme.com/img/club/escudo'.$value['club_id'].'.png';
	

	$agrupando[$value['id']]['nombreCategoria']=$value['nombreCategoria'];
	//$agrupando[$value['id']]['imagenComunidad']=$value['imagenComunidad'];
	//$agrupando[$value['id']]['imagenPais']=$value['imagenPais'];
	$agrupando[$value['id']]['nombreLocalidad']=$value['nombreLocalidad'];
	$agrupando[$value['id']]['nombreProvincia']=$value['nombreProvincia'];
	$agrupando[$value['id']]['nombreComunidad']=$value['nombreComunidad'];
	$agrupando[$value['id']]['torneos'][$value['temporada_id']]['temporada_id']=$value['temporada_id'];
	$agrupando[$value['id']]['torneos'][$value['temporada_id']]['nombreTemporada']=$value['nombreTemporada'];	
	$agrupando[$value['id']]['torneos'][$value['temporada_id']]['enlace']='https://futbolme.com/resultados-directo/torneo/'.poner_guion($value['nombreTemporada']).'/'.$value['temporada_id'].'/';


}

/*
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

*/


$file = 'buscadorEquipos.json';
$jsonencoded='';

$contador=0;

foreach ($agrupando as $row) {
	$contador++;

    $jsonencoded.=json_encode($row)."\r\n";


    ob_flush();
    flush();
}

    
    $fh = fopen($file, 'w');
    fwrite($fh, $jsonencoded);
    fclose($fh);

echo 'Finalizado';

?>