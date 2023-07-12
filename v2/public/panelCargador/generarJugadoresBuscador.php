<?php

define('_FUTBOLME_', 1);

include 'funcionesV2.php';

$consulta = "
SELECT j.id, j.apodo, j.nombre, j.lugar_nacimiento, j.equipoActual_id, e.nombreCorto, te.temporada_id,t.nombre nombreTemporada
FROM jugador j
INNER JOIN equipo e ON e.id=j.equipoActual_id
INNER JOIN temporada_equipo te ON te.equipo_id=e.id
INNER JOIN temporada t ON t.id=te.temporada_id
INNER JOIN torneo tor ON tor.id=t.torneo_id
WHERE tor.tipo_torneo=1";
$mysqli = conectar();
$resultadoSQL = mysqli_query($mysqli, $consulta);
$resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

$agrupando=array();

foreach ($resultado as $key => $value) {
	$agrupando[$value['id']]['id']=$value['id'];
	$agrupando[$value['id']]['title']=$value['apodo'];
	$agrupando[$value['id']]['nombre']=$value['nombre'];
	$n=poner_guion($value['apodo']);
	$n=utf8_encode($n);
	$agrupando[$value['id']]['link'] = 'https://futbolme.eu/resultados-directo/jugador/'.$n.'/'.$value['id'];
	$agrupando[$value['id']]['imagenJugador']='https://futbolme.eu/static/img/jugadores/jugador'.$value['id'].'.jpg';

	$agrupando[$value['id']]['equipo_id']=$value['equipoActual_id'];
	$agrupando[$value['id']]['equipo_nombre']=$value['nombreCorto'];	
	$agrupando[$value['id']]['equipo_enlace']='https://futbolme.eu/resultados-directo/equipo/'.poner_guion($value['nombreCorto']).'/'.$value['equipoActual_id'].'/';
	

	$agrupando[$value['id']]['temporada_id']=$value['temporada_id'];
	$agrupando[$value['id']]['temporada_nombre']=$value['nombreTemporada'];	
	$agrupando[$value['id']]['temporada_enlace']='https://futbolme.eu/resultados-directo/torneo/'.poner_guion($value['nombreTemporada']).'/'.$value['temporada_id'].'/';
}


/*

['id']=$value['id'];
['title']=$value['apodo'];
['nombre']=$value['nombre'];
['link'] = 'https://futbolme.eu/resultados-directo/jugador/'.$n.'/'.$value['id'];
['imagenJugador']='https://futbolme.eu/static/img/jugadores/jugador'.$value['id'].'.jpg';

['equipo_id']=$value['equipoActual_id'];
['equipo_nombre']=$value['nombreCorto'];	
['equipo_enlace']='https://futbolme.eu/resultados-directo/equipo/'.poner_guion($value['nombreCorto']).'/'.$value['equipoActual_id'].'/';
	

['temporada_id']=$value['temporada_id'];
['temporada_nombre']=$value['nombreTemporada'];	
['temporada_enlace']='https://futbolme.eu/resultados-directo/torneo/'.poner_guion($value['nombreTemporada']).'/'.$value['temporada_id'].'/';

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

$file = 'buscadorJugadores.json';
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