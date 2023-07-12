<?php 
define('_PANEL_', 1);
require_once '../includes/config.php';

$consulta = "
SELECT e.id, e.club_id, e.nombre, c.nombre nombreCategoria, 
p.comunidad_id imagenComunidad, cl.pais_id imagenPais, 
l.nombre nombreLocalidad, p.nombre nombreProvincia, co.nombre nombreComunidad, teq.temporada_id,te.nombre nombreTemporada 
FROM equipo e 
INNER JOIN categoria c ON c.id=e.categoria_id 
INNER JOIN club cl ON cl.id=e.club_id 
INNER JOIN localidad l ON cl.localidad_id=l.id 
INNER JOIN provincia p ON l.provincia_id=p.id 
INNER JOIN comunidad co ON p.comunidad_id=co.id 
INNER JOIN temporada_equipo teq ON e.id=teq.equipo_id 
INNER JOIN temporada te ON te.id=teq.temporada_id
WHERE teq.temporada_id<>331 AND teq.temporada_id<>333 AND teq.temporada_id<>442
ORDER BY e.club_id, e.categoria_id, e.codigoRFEF";
$resultadoSQL = mysqli_query($mysqli, $consulta);
$resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

$agrupando=array();

foreach ($resultado as $key => $value) {

	$agrupando[$value['id']]['id']=$value['id'];
	$agrupando[$value['id']]['club_id']=$value['club_id'];
	$agrupando[$value['id']]['title']=$value['nombre'];
	$n=poner_guion($value['nombre']);
	$n=utf8_encode($n);
	$agrupando[$value['id']]['link'] = 'https://futbolme.eu/resultados-directo/equipo/'.$n.'/'.$value['id'];
	$agrupando[$value['id']]['imagenEscudo']='https://futbolme.eu/static/img/club/escudo'.$value['club_id'].'.png';
	

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


/*
foreach ($agrupando as $key => $value) {?>
	
	<table>
		<tr>
			<td width="92"></td>
			<td width="400">
				<b><?php echo $value['title']?></b><br />
				<i><?php echo $value['nombreCategoria']?></i><br />
				<?php echo $value['nombreLocalidad']?> (<?php echo $value['nombreProvincia']?>) - <?php echo $value['nombreComunidad']?>
			<hr />
				<?php foreach ($value['torneos'] as $key => $torneo) { ?>
					<a href="<?php echo $torneo['enlace']?>" target="_blank" style="font-size: 13px"><?php echo $torneo['nombreTemporada']?></a><br />
				<?php } ?>
			</td>


	</table>

	
<?php  }*/

$file = '../../../cristian/buscadorEquipos.json';
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

echo $file.'vFinalizado';

?>