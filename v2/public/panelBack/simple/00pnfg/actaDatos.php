<?php
// actaDatos.php

/*
Tabla gol.
id - jugador_id - partido_id - temporada_id - minuto - tipo - esLocal - observaciones

esLocal: 0-local : 1-visitante
tipo: 0-jugada : 1-penalti : 10-propia puerta : 11-penalti fallado.
minuto: 1xx-primera parte : 2xx-segunda parte

Tabla tarjeta
id - jugador_id - partido_id - temporada_id - minuto - tipo - esLocal

tipo amonestacion: 0-primera amarilla : 1-segunda amarilla : 5-roja directa
tipo sustitucion: 2-titular : 3-sale : 4-entra : 6-suplente*/





$tabla='tarjeta';
foreach ($jugador as $key => $value) {
	if ($value['titularL']['nombre']){
		//limpiamos el nombre, y sacamos su identificador
		//buscamos un nombre en jugadores parecido en su equipo.
		//si exite vinculamos el nombre con el identificador.
		$tipo=2;
		$esLocal=0;
		$minuto=0;
	}
	if ($value['suplenteL']['nombre']){
		//limpiamos el nombre
		$tipo=6;
		$esLocal=0;
		$minuto=0;

	}

	//aqui tenemos que tener un array con el identificador-jugador_id-jugador_nombre

	if ($value['cambiosL']['tipo']){
		//tenemos que buscar el jugador_id en el array creado con los titulares y los suplentes.
		//sale
		$tipo=3;
		$esLocal=0;
		$minuto=xxx;

	}

	if ($value['tarjetaL']['tipo']){
		//tenemos que buscar el jugador_id en el array creado con los titulares y los suplentes.
		//1ªamarilla=0 2ªamarilla=1 RojaDirecta=5
		$tipo=xx;
		$esLocal=0;
		$minuto=xxx;

	}
}

$tabla='gol';
foreach ($jugador['goles'] as $key => $value) {
	//se busca el identificador en un array con los jugadores de los dos equipos

}



$actaJson[$key]['tabla']=$tabla;
$actaJson[$key]['jugador_id']=$jugador_id;
$actaJson[$key]['partido_id']=$partido_id;
$actaJson[$key]['temporada_id']=$temporada_id;
$actaJson[$key]['minuto']=$equipoLocal_id;
$actaJson[$key]['tipo']=$tipo;
$actaJson[$key]['esLocal']=$esLocal;

function minuto($minuto){
	//saber si es primera o segunda parte.
	return $minuto;
}

function identificarJugador($identificador,$nombre,$equipo_id){
	$mysqli=conectar();
	$sql='SELECT id FROM jugadores WHERE federacion_id="'.$identificador.'"';
	$resultadoSQL = mysqli_query($mysqli, $sql);
    $r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
    if (count($r)>0){ 
    	$jugador_id=$r['id'];
    } else {
    	$sql='SELECT id, apodo, nombre, apellidos FROM jugadores WHERE nombre LIKE "'.$nombre.'" AND equipo_id='.$equipo;
		$resultadoSQL = mysqli_query($mysqli, $sql);
    	$r = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
    	foreach ($r as $key => $value) {
    		echo $r['id'].' '.$r['apodo'].' '.$r['nombre'].' '.$r['apellidos'].'<br />';
    		//se intentará encontrar aqui el jugador
    	}
    }

    
    return $jugador_id;
      
}