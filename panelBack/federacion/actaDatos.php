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
$plantilla=array();

echo '<h1>Titulares Locales</h1>';
foreach ($jugador['titularL'] as $key => $value) {	
	$llave=trim($value['nombre']);
	echo 'TitLocal '.$llave.'<br />';
	$identificador=preg_replace('/NFG_EstadisticasJugador\?cod_primaria=5000274&jugador=(.*?)&codacta=(.*?)&nueva_ventana=0/', '$1', $value['enlace']);
	$jugadorLocal=identificarJugador($identificador,$llave,$equipoLocal_id,$partido_id,$acta,$temporada_id);	
	$plantilla[1][$llave][2]=$jugadorLocal;
}

echo '<h1>Suplentes Locales</h1>';
foreach ($jugador['suplenteL'] as $key => $value) {
	$llave=trim($value['nombre']);
	echo 'SupLocal '.$llave.'<br />';
	$identificador=preg_replace('/NFG_EstadisticasJugador\?cod_primaria=5000274&jugador=(.*?)&codacta=(.*?)&nueva_ventana=0/', '$1', $value['enlace']);
	$jugadorLocal=identificarJugador($identificador,$llave,$equipoLocal_id,$partido_id,$acta,$temporada_id);
	$plantilla[1][$llave][6]=$jugadorLocal;
}

echo '<h1>Titulares Visitantes</h1>';

foreach ($jugador['titularV'] as $key => $value) {	
	$llave=trim($value['nombre']);
	echo 'TitVisitante '.$llave.'<br />';
	$identificador=preg_replace('/NFG_EstadisticasJugador\?cod_primaria=5000274&jugador=(.*?)&codacta=(.*?)&nueva_ventana=0/', '$1', $value['enlace']);
	$jugadorLocal=identificarJugador($identificador,$llave,$equipoVisitante_id,$partido_id,$acta,$temporada_id);	
	$plantilla[0][$llave][2]=$jugadorLocal;
}

echo '<h1>Suplentes Visitantes</h1>';
foreach ($jugador['suplenteV'] as $key => $value) {
	$llave=trim($value['nombre']);
	echo 'SupVisitante '.$llave.'<br />';
	$identificador=preg_replace('/NFG_EstadisticasJugador\?cod_primaria=5000274&jugador=(.*?)&codacta=(.*?)&nueva_ventana=0/', '$1', $value['enlace']);
	$jugadorLocal=identificarJugador($identificador,$llave,$equipoVisitante_id,$partido_id,$acta,$temporada_id);
	$plantilla[0][$llave][6]=$jugadorLocal;
}


$cambios=array();
echo '<h1>Cambios Locales</h1>';
$contador=0;

foreach ($jugador['cambiosL'] as $key => $value) {
	$findme   = '(';
	$pos = strpos($value['nombre'], $findme);
	if ($pos>0) { 
		$nombre=substr($value['nombre'], 0,$pos);
		$minuto=substr($value['nombre'], $pos); 
	} else { 
		$nombre=$value['nombre']; 
		$minuto='-';
	}
	$llave=trim($nombre);
	$tipo=0;
	$mystring = $value['tipo'];
	$findme   = 'flechas_in';
	$pos = strpos($mystring, $findme);
	if ($pos>0) { $tipo=4; } //entra
	$mystring = $value['tipo'];
	$findme   = 'flechas_out';
	$pos = strpos($mystring, $findme);
	if ($pos>0) { $tipo=3; } //sale
	foreach ($plantilla[1] as $key => $value) {
		if ($key==$llave){
			foreach ($value as $k => $v) 
			$cambios[1][$contador]['minuto']=$minuto;
			$cambios[1][$contador]['id'][]=$v['id'];
			$cambios[1][$contador]['tipo'][]=$tipo;
			if ($tipo==3){ $contador++; }
		}
	}
}

echo '<h1>Cambios Visitantes</h1>';
$contador=0;
foreach ($jugador['cambiosV'] as $key => $value) {
	$findme   = '(';
	$pos = strpos($value['nombre'], $findme);
	if ($pos>0) { 
		$nombre=substr($value['nombre'], 0, $pos);
		$minuto=substr($value['nombre'], $pos); 
	} else { 
		$nombre=$value['nombre']; 
		$minuto='-';
	}
	$llave=trim($nombre);
	$tipo=0;
	$mystring = $value['tipo'];
	$findme   = 'flechas_in';
	$pos = strpos($mystring, $findme);
	if ($pos>0) { $tipo=4; } //entra
	$mystring = $value['tipo'];
	$findme   = 'flechas_out';
	$pos = strpos($mystring, $findme);
	if ($pos>0) { $tipo=3; } //sale
	foreach ($plantilla[0] as $key => $value) {
		if ($key==$llave){
			foreach ($value as $k => $v) 
			$cambios[0][$contador]['minuto']=$minuto;
			$cambios[0][$contador]['id'][]=$v['id'];
			$cambios[0][$contador]['tipo'][]=$tipo;
			if ($tipo==3){ $contador++; }
		}
	}
}


$tarjetas=array();
echo '<h1>Tarjetas Locales</h1>';
$contador=0;
foreach ($jugador['tarjetaL'] as $key => $value) {
	$findme   = '(';
	$pos = strpos($value['nombre'], $findme);
	if ($pos>0) { 
		$nombre=substr($value['nombre'], 0, $pos);
		$minuto=substr($value['nombre'], $pos); 
	} else { 
		$nombre=$value['nombre']; 
		$minuto='-';
	}
	$llave=trim($nombre);
	$tipo=-1;
	$mystring = $value['tipo'];
	$findme   = 'tarj_amar';
	$pos = strpos($mystring, $findme);
	if ($pos>0) { $tipo=0; } //1ªamarilla 2ª amarilla=1
	$mystring = $value['tipo'];
	$findme   = 'tarj_roja';
	$pos = strpos($mystring, $findme);
	if ($pos>0) { $tipo=5; } //roja
	foreach ($plantilla[1] as $key => $value) {
		if ($key==$llave){
			foreach ($value as $k => $v) 
			$tarjetas[1][$contador]['minuto']=$minuto;
			$tarjetas[1][$contador]['id']=$v['id'];
			$tarjetas[1][$contador]['tipo']=$tipo;
		}
	}
	$contador++;
}

echo '<h1>Tarjetas Visitantes</h1>';
$contador=0;

if (isset($jugador['tarjetaV'])){
	foreach ($jugador['tarjetaV'] as $key => $value) {
		$findme   = '(';
		$pos = strpos($value['nombre'], $findme);
		if ($pos>0) { 
			$nombre=substr($value['nombre'], 0, $pos);
			$minuto=substr($value['nombre'], $pos); 
		} else { 
			$nombre=$value['nombre']; 
			$minuto='-';
		}
		$llave=trim($nombre);
		$tipo=-1;
		$mystring = $value['tipo'];
		$findme   = 'tarj_amar';
		$pos = strpos($mystring, $findme);
		if ($pos>0) { $tipo=0; } //1ªamarilla 2ª amarilla=1
		$mystring = $value['tipo'];
		$findme   = 'tarj_roja';
		$pos = strpos($mystring, $findme);
		if ($pos>0) { $tipo=5; } //roja
		foreach ($plantilla[0] as $key => $value) {
			if ($key==$llave){
				foreach ($value as $k => $v) 
				$tarjetas[0][$contador]['minuto']=$minuto;
				$tarjetas[0][$contador]['id']=$v['id'];
				$tarjetas[0][$contador]['tipo']=$tipo;
			}
		}
		$contador++;
	}
}

echo '<h1>Goles</h1>';
$rl=0;$rv=0;

if (isset($jugador['goles'])){
	$gol=array();
	foreach ($jugador['goles'] as $key => $value) {	
		$resultado=$value['resultado'];
		$r=explode('-', $value['resultado']);
		$r[0] = str_replace('&nbsp;', '', $r[0]);
		$r[1] = str_replace('&nbsp;', '', $r[1]);
		
		if ($r[0]>$rl){ /*echo $value['resultado'].' Gol local<br />';*/ $rl=$r[0]; $esLocal=1; }
		if ($r[1]>$rv){ /*echo $value['resultado'].' Gol visitante<br />';*/ $rv=$r[1]; $esLocal=0; }

		

		$findme   = '(';
		$pos = strpos($value['nombre'], $findme);
		if ($pos>0) { 
			$nombre=substr($value['nombre'], 0,$pos);
			$minuto=substr($value['nombre'], $pos); 
		} else { 
			$nombre=$value['nombre']; 
			$minuto='-';
		}

		if($value['tipo']=='img lgol'){ $tipo=0; }
		if($value['tipo']=='img lpenalti'){ $tipo=1; }
		if($value['tipo']=='img lgolpp'){ $tipo=10; }

		//614292 preferente gallega 1 - jornada 2 - sarriana-residencia 4-1
		
		$llave=trim($nombre);
		$llave = str_replace('&nbsp; ', '', $llave);
		//echo $llave.' '.$esLocal.' '.$resultado.'<br />';

		foreach ($plantilla[$esLocal] as $key => $value) {
			//var_dump($llave);echo '<br />';
			//var_dump($key);echo '<hr />';
			if (trim($key)==trim($llave)){
				foreach ($value as $k => $v) 
				$gol[$rl.'-'.$rv]['minuto']=$minuto;
				$gol[$rl.'-'.$rv]['id']=$v['id'];
				$gol[$rl.'-'.$rv]['esLocal']=$esLocal;
				$gol[$rl.'-'.$rv]['tipo']=$tipo;
			}
		}
	}
}

//if (isset($gol)) {  echo 'Goles'; imp($gol); };

/*
if (isset($plantilla)) { echo 'Plantilla'; imp($plantilla); };
if (isset($cambios)) {  echo 'Cambios'; imp($cambios); };
if (isset($tarjetas)) {  echo 'Tarjetas'; imp($tarjetas); };
*/

$sq='DELETE FROM gol WHERE partido_id='.$partido_id;
mysqli_query($mysqli, $sq);
$sq='DELETE FROM tarjeta WHERE partido_id='.$partido_id;
mysqli_query($mysqli, $sq);
/*$sq='DELETE FROM jugador WHERE id_original=11000';
mysqli_query($mysqli, $sq);*/

if (isset($jugador['goles'])){
	imp($jugador['goles']);
	imp($gol);
	foreach ($gol as $k => $v) {
		$minuto=$v['minuto'];
		$minuto=arregloMinuto($minuto);
		echo 'esLocal='.$v['esLocal'].' - ';
		echo 'minuto='.$minuto.' - ';
		echo 'tipo='.$v['tipo'].' - ';
		echo 'jugador_id='.$v['id'].'<br />';
		$sq='INSERT INTO gol (jugador_id,partido_id,temporada_id,minuto,tipo,esLocal) 
		VALUES ('.$v['id'].','.$partido_id.','.$temporada_id.','.$minuto.','.$v['tipo'].','.$v['esLocal'].')';
		echo $sq.'<br />';
		mysqli_query($mysqli, $sq);
	}
}

foreach ($plantilla as $key => $value) {
	$esLocal=$key;
	foreach ($value as $k => $v) {
		foreach ($v as $k1 => $v1) {
			$tipo=$k1;
			echo 'esLocal='.$esLocal.' - ';
			echo 'tipo='.$tipo.' - ';
			echo 'jugador_id='.$v1['id'].'<br />';
			$sq='INSERT INTO tarjeta (jugador_id,partido_id,temporada_id,minuto,tipo,esLocal) 
			VALUES ('.$v1['id'].','.$partido_id.','.$temporada_id.',0,'.$tipo.','.$esLocal.')';
			echo $sq.'<br />';
			mysqli_query($mysqli, $sq);
		}		
	}
}


foreach ($cambios as $key => $value) {
	$esLocal=$key;
	foreach ($value as $k => $v) {
		$minuto=$v['minuto'];
		$minuto=arregloMinuto($minuto);
		foreach ($v['id'] as $k1 => $v1) {
			echo 'esLocal='.$esLocal.' - ';
			echo 'minuto='.$minuto.' - ';
			echo 'tipo='.$v['tipo'][$k1].' - ';
			echo 'jugador_id='.$v1.'<br />';
			$sq='INSERT INTO tarjeta (jugador_id,partido_id,temporada_id,minuto,tipo,esLocal) 
			VALUES ('.$v1.','.$partido_id.','.$temporada_id.','.$minuto.','.$v['tipo'][$k1].','.$esLocal.')';
			echo $sq.'<br />';
			mysqli_query($mysqli, $sq);
		}		
	}
}

imp($jugador['tarjetaL']);
imp($jugador['tarjetaV']);
imp($tarjetas);
foreach ($tarjetas as $key => $value) {
	$esLocal=$key;
	foreach ($value as $k => $v) {
		$minuto=$v['minuto'];
		$minuto=arregloMinuto($minuto);
		echo 'esLocal='.$esLocal.' - ';
		echo 'minuto='.$minuto.' - ';
		echo 'tipo='.$v['tipo'].' - ';
		echo 'jugador_id='.$v['id'].'<br />';
		$sq='INSERT INTO tarjeta (jugador_id,partido_id,temporada_id,minuto,tipo,esLocal) 
			VALUES ('.$v['id'].','.$partido_id.','.$temporada_id.','.$minuto.','.$v['tipo'].','.$esLocal.')';
			echo $sq.'<br />';
			mysqli_query($mysqli, $sq);	
	}
}


/*

$actaJson[$key]['tabla']=$tabla;
$actaJson[$key]['jugador_id']=$jugador_id;
$actaJson[$key]['partido_id']=$partido_id;
$actaJson[$key]['temporada_id']=$temporada_id;
$actaJson[$key]['minuto']=$equipoLocal_id;
$actaJson[$key]['tipo']=$tipo;
$actaJson[$key]['esLocal']=$esLocal;

*/

//las funciones estan en actasGenerar.

