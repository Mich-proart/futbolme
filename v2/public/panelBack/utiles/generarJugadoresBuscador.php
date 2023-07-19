<?php 
define('_PANEL_', 1);

//ini_set('memory_limit','-1');

require_once '../includes/config.php';

$consulta = "
SELECT j.id, j.apodo, j.nombre, j.lugar_nacimiento, j.equipoActual_id, e.nombreCorto, te.temporada_id, tor.nombre nombreTemporada
FROM jugador j
INNER JOIN equipo e ON e.id=j.equipoActual_id
INNER JOIN temporada_equipo te ON te.equipo_id=e.id
INNER JOIN temporada t ON t.id=te.temporada_id
INNER JOIN torneo tor ON tor.id=t.torneo_id
WHERE tor.tipo_torneo=1 AND j.es_baja=0 AND te.grupo=1";

$resultadoSQL = mysqli_query($mysqli, $consulta);
$resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

$agrupando=array();

foreach ($resultado as $key => $value) {
	$agrupando[$value['id']]['id']=$value['id'];
	$agrupando[$value['id']]['title']=$value['apodo'];
	$agrupando[$value['id']]['nombre']=$value['nombre'];
	$n=poner_guion($value['apodo']);
	$n=utf8_encode($n);
	$agrupando[$value['id']]['link'] = 'https://futbolme.com/resultados-directo/jugador/'.$n.'/'.$value['id'];
	$agrupando[$value['id']]['imagenJugador']='https://futbolme.com/static/img/jugadores/jugador'.$value['id'].'.jpg';

	$agrupando[$value['id']]['equipo_id']=$value['equipoActual_id'];
	$agrupando[$value['id']]['equipo_nombre']=$value['nombreCorto'];	
	$agrupando[$value['id']]['equipo_enlace']='https://futbolme.com/resultados-directo/equipo/'.poner_guion($value['nombreCorto']).'/'.$value['equipoActual_id'].'/';
	
	
	

	$agrupando[$value['id']]['temporada_id']=$value['temporada_id'];
	$agrupando[$value['id']]['temporada_nombre']=$value['nombreTemporada'];	
	$agrupando[$value['id']]['temporada_enlace']='https://futbolme.com/resultados-directo/torneo/'.poner_guion($value['nombreTemporada']).'/'.$value['temporada_id'].'/';

	

	
}



$file = '../../../cristian/buscadorJugadores.json';
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