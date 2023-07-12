<?php 
define('_PANEL_', 1);
require_once '../includes/config.php';

 //die('bloqueado');

function Xtelevisados() {
    	$mysqli = conectar();
    	$fecha = date('Y-m-j');
        $campos = 'p.id, 
p.temporada_id,
te.nombre nombreTemporada,
p.estado_partido, 
p.jornada,
fa.nombre fase, 
p.fecha, 
p.hora_prevista, 
p.apuesta,
p.goles_local,
p.goles_visitante,
p.grupo_id,
ec.nombre local,ec.nombreCorto localCorto, 
(SELECT es_seleccion FROM club WHERE club.id=ec.club_id) seleccion,
(SELECT pais_id FROM club WHERE club.id=ec.club_id) pais_local,
(SELECT pais_id FROM club WHERE club.id=ef.club_id) pais_visitante,
p.equipoLocal_id,
ef.nombre visitante,ef.nombreCorto visitanteCorto,
p.equipoVisitante_id,
(SELECT count(partido_id) FROM partido_medio WHERE partido_id=p.id) tv,
m.id idMedio,m.nombre nombreMedio,m.id_original,e.id estadio_id, e.nombre estadio_nombre, l.nombre estadio_localidad, tor.categoria_torneo_id, tor.tipo_torneo
 ';
        $tabla = ' partido p';
        $union = ' INNER JOIN equipo ec ON p.equipoLocal_id=ec.id';
        $union.= ' INNER JOIN equipo ef ON p.equipoVisitante_id=ef.id';
        $union.= ' INNER JOIN fase fa ON p.jornada=fa.id';
        $union.= ' INNER JOIN temporada te ON p.temporada_id=te.id';
        $union.= ' INNER JOIN torneo tor ON tor.id=te.torneo_id';
        $union.= ' RIGHT JOIN partido_medio pm ON p.id=pm.partido_id';
        $union.= ' INNER JOIN medio m ON m.id=pm.medio_id';
        $union.= ' LEFT JOIN estadio e ON e.id=ec.estadio_id';
        $union.= ' LEFT JOIN localidad l ON l.id=e.localidad_id';
        $condicion = " WHERE p.fecha='".$fecha."'";
        $orden = ' ORDER BY p.fecha, p.hora_prevista, p.id, m.nombre';
        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;

        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

        return $resultado;
}

$mysqli = conectar();
$sql='SELECT id,whatsapp FROM torneo WHERE whatsapp<>"" ORDER BY categoria_torneo_id, orden'; 
$resultadoSQL = mysqli_query($mysqli, $sql);
$resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

$idsChat=array();

foreach ($resultado as $key => $value) {
	$idsChat[$value['whatsapp']]=$value;
}



$t=Xtelevisados();

$televisados=array();

foreach ($t as $k => $v) {
	$televisados[$v['id']][$v['idMedio']]=$v;
}





foreach ($televisados as $k => $partido) {

	$contador=0;$por='televisado por: ';
	foreach ($partido as $k1 => $v) {

		$contador++;
		
		if ($contador==1){
			$hora='Hoy, a las '.substr($v['hora_prevista'], 0, 5).' hora peninsular';
			$desde='desde '.$v['estadio_nombre'].' ('.$v['estadio_localidad'].')';
			$partido=$v['localCorto'].' - '.$v['visitanteCorto']."\n";
			if ($v['tipo_torneo']==1){
				$partido.='partido correspondiente a la jornada '.$v['jornada'].' de '.$v['nombreTemporada'];
			} else {
				$partido.='partido correspondiente al torneo '.$v['nombreTemporada'];
			}
		}
		$por.=$v['nombreMedio'].' - ';	
	} 

	$por=substr($por,0,-3); 

	$txt=$hora."\n".$por."\n".$desde."\n".$partido."\n";
	$txt.='Consulta todos los partidos televisados hoy en https://futbolme.eu/partidos-televisados'."\n";
 

	
	//para el envio de whatsapp.

		$wLocal=$v['equipoLocal_id'];$temporada_local=0;
		$wVisitante=$v['equipoVisitante_id'];$temporada_visitante=0;

		$sq='SELECT te.temporada_id FROM temporada_equipo te WHERE te.equipo_id='.$wLocal.' AND te.grupo=1';
		$resultadoSQL = mysqli_query($mysqli, $sq);
		$r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
		if (!empty($r)){ $temporada_local=$r['temporada_id']; }

		$sq='SELECT te.temporada_id FROM temporada_equipo te WHERE te.equipo_id='.$wVisitante.' AND te.grupo=1';
		$resultadoSQL = mysqli_query($mysqli, $sq);
		$r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
		if (!empty($r)){ $temporada_visitante=$r['temporada_id']; }

		//$temporada_local=1000;
		//$temporada_visitante=1000;
		echo '<br />temporada local id: '.$temporada_local;
		echo '<br />temporada visitante id: '.$temporada_visitante;

		if (($temporada_local+$temporada_visitante)>0){

		    if ($temporada_local==$temporada_visitante){
		        //un mensaje para los dos equipos.
		        $_GET['sendMessage']=1;
		        $_GET['id_chat']=XidChat($temporada_local);
		        unset($idsChat[$_GET['id_chat']]);
		        $_GET['txt']=$txt;
		        include('../chatapi/acceso.php');

		    } else {

		        if ($temporada_local>0){

		            $_GET['sendMessage']=1;
		            $_GET['id_chat']=XidChat($temporada_local);
		            unset($idsChat[$_GET['id_chat']]);
		        	$_GET['txt']=$txt;
		            include('../chatapi/acceso.php');

		        }

		        if ($temporada_visitante>0){

		            $_GET['sendMessage']=1;
		            $_GET['id_chat']=XidChat($temporada_visitante);
		            unset($idsChat[$_GET['id_chat']]);
		        	$_GET['txt']=$txt;
		            include('../chatapi/acceso.php');

		        }

		    }
		}

	//fin de envio de whatsapp
	



	$txt=str_replace("\n",'<br />', $txt);
	echo $txt;
	echo '<hr />';
	unset($txt);

	
}


$txt='Consulta todos los partidos televisados hoy en https://futbolme.eu/partidos-televisados'."\n";
 
$_GET['sendMessage']=1;
$_GET['txt']=$txt;
foreach ($idsChat as $key => $v) {
	$_GET['id_chat']=$key;
	include('../chatapi/acceso.php');
}

die('fin');


?>
