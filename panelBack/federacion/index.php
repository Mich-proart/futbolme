
<?php
$static_v = 14; 
define('_FUTBOLME_', 1);

require_once 'consultas.php';
require_once 'funciones.php';
require_once '../../src/funciones.php';

$tiempo_inicio = microtime_float(); ?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<link href="/css/bootstrap.min.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/main.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/style.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<noscript><link rel="stylesheet" href="/css/allcss.css?v=<?php echo $static_v; ?>"></noscript>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/js/federacion.js?=<?php echo $static_v; ?>"></script>
</head>
<body>

	<div style="padding: 10px; background-color: white">

<?php
if (isset($_GET['recuperar'])){
	$mysqli = conectarFM();
	$sql='UPDATE torneo SET visible=5 WHERE id='.$_GET['id'];
	echo $sql;
	$resultadoSQL = mysqli_query($mysqli, $sql);
	
}

if (isset($_GET['matarTorneo'])){
	if (isset($_GET['temporada_id'])){
		matarTorneoFM($_GET['temporada_id'],$_GET['id']);
		echo 'Temporada '.$_GET['temporada_id'].' es ('.$_GET['id'].') muerto';
	} else {
		$t = unserialize($_GET['t']);
		foreach ($t as $key => $value) {
			matarTorneoFM($value['temporada_id'],$value['torneo_id']);
			echo $value['nombre'].'<br />Temporada '.$value['temporada_id'].' es ('.$value['torneo_id'].') muerto<br />';
		}
	}
}


if (isset($_GET['ruta'])){

	//imp($_GET['ruta']);
	$json = file_get_contents($_GET['ruta']);
	$datos = json_decode($json, true);	
	echo '<table>';
	foreach ($datos as $key => $value) {
		echo '<tr>';
		echo '<td><b>'.$value['jornada'].'</b></td>';
		echo '<td>'.$value['local'].'</td>';
		echo '<td><b>'.$value['goles_casa'].'-'.$value['goles_fuera'].'</b></td>';
		echo '<td>'.$value['visitante'].'</td>';
		echo '<td><b>'.$value['estado_partido'].'</b></td>';
		echo '</tr>';
	}
	echo '</table>';
	die;

}

if (isset($_POST['modo'])){
	if ($_POST['modo']=='cargar'){
		$p=$_POST['proxis'];
		$proveedor=$_POST['proveedor'];
		$proxis=explode("\r\n", $p);
		$mysqli2 = conectar();
		//imp($_POST);
		foreach ($proxis as $key => $ip) {
			$x=explode(':', $ip);
			if ($x[1]!='8080' && $x[1]!='80' && $x[1]!='443' && $x[1]!='3128' && $x[1]!='8811' && $x[1]!='9999'){ continue; }
			$sql='SELECT id FROM '.$_POST['bd'].' WHERE ip="'.$ip.'"';
		    $resultadoSQL = mysqli_query($mysqli2, $sql);
		    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
		    if (count($resultado)==0){
				$sql='INSERT INTO '.$_POST['bd'].' (ip, uso, estado, proveedor) VALUES ("'.$ip.'",0,0,"'.$proveedor.'")';
				mysqli_query($mysqli2, $sql);
			}
		}
		echo 'Proxis cargados...<br />';
		$_GET['comunidad_id']=$_POST['comunidad_id'];
	}
}

if (isset($_POST['id'])){
	$mysqli = conectarFM();
	$sq='UPDATE torneo SET visible='.$_POST['visible'].',usuario='.$_POST['usuario'].',orden='.$_POST['orden'].' WHERE id='.$_POST['id'];
		mysqli_query($mysqli, $sq);
		echo $sq.'<br />';

	if (isset($_POST['jornadas'])){
		$sq='UPDATE liga set jornadas='.$_POST['jornadas'].', jornadaActiva='.abs($_POST['activa']).' WHERE id='.$_POST['id'];		
		mysqli_query($mysqli, $sq);
		echo $sq.'<br />';		
		$file1='../../json/temporada/'.$_POST['temporada_id'].'/partidosActiva.json';
		echo $file1.'<br />';
		unlink($file1);
		$file2='../../json/temporada/'.$_POST['temporada_id'].'/tipo.json';
		echo $file2.'<br />';
		unlink($file2);	
		$_GET['comunidad_id']=$_POST['comunidad_id'];
	} else {
		$sq='UPDATE eliminatorio set fase_activa='.abs($_POST['fase_activa']).' WHERE id='.$_POST['id'];
		mysqli_query($mysqli, $sq);
		echo $sq.'<br />';		

	}
	
}

if (isset($_POST['torneo_id'])){
	$mysqli = conectarFM();
	$sq='UPDATE torneo SET apifutbol='.$_POST['apifutbol'].',apiRFEFcompeticion='.$_POST['apiRFEFcompeticion'].',apiRFEFgrupo='.$_POST['apiRFEFgrupo'].', nombre="'.$_POST['nombre'].'", traduccion="'.$_POST['traduccion'].'", torneoCorto="'.$_POST['torneoCorto'].'" WHERE id='.$_POST['torneo_id'];
	mysqli_query($mysqli, $sq);
	echo $sq.'<br />';
	$sq='UPDATE temporada SET nombre="'.$_POST['nombreTemporada'].'" WHERE torneo_id='.$_POST['torneo_id'];
	mysqli_query($mysqli, $sq);
	echo $sq.'<br />';
	
	$_GET['comunidad_id']=$_POST['comunidad_id'];
}

if (isset($_POST['nuevo_torneo'])){
	$mysqli = conectarFM();
	

	if (isset($_POST['clon_id'])){

	$sq='SELECT categoria_torneo_id, categoria_id, division_id,
	pais_id, comunidad_id, nombre, torneoCorto, orden, visible, tipo_torneo, apifutbol, apiRFEFcompeticion, apiRFEFgrupo
	FROM torneo WHERE id='.$_POST['clon_id'];
	$resultadoSQL = mysqli_query($mysqli, $sq);
    $datos = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC); 
    if ($datos['tipo_torneo']==1){ $txtTT='Liga'; } else { $txtTT='Eliminatorias';} ?>
    <form method="post" action="index.php">
    	<input type="hidden" name="comunidad_id" value="<?php echo $_POST['comunidad_id']?>">
    	<input type="hidden" name="nuevo_torneo" value="1">
    	<input type="hidden" name="categoria_torneo_id" value="<?php echo $datos['categoria_torneo_id']?>">
    	<input type="hidden" name="categoria_id" value="<?php echo $datos['categoria_id']?>">
    	<input type="hidden" name="division_id" value="<?php echo $datos['division_id']?>">
    	<input type="hidden" name="pais_id" value="<?php echo $datos['pais_id']?>">
    	Tipo de torneo <select name="tipo_torneo" id="tipo_torneo">
    	<option value="<?php echo $datos['tipo_torneo']?>"><?php echo $datos['tipo_torneo']?> - <?php echo $txtTT?></option>
    	<option value="1">1 - Liga</option>
    	<option value="2">2 - Eliminatorias</option>
    	</select><br />
    	Nombre de torneo <input type="text" name="nombre" value="<?php echo $datos['nombre']?>" size="100"><br />
    	Nombre corto <input type="text" name="torneoCorto" value="<?php echo $datos['torneoCorto']?>"  size="60" maxsize="60"><br />
    	Orden <input type="text" name="orden" value="<?php echo ($datos['orden']+1)?>" size="8"> (se ordena dentro de los torneos de su categoría)<br />
    	Visible <input type="text" name="visible" value="<?php echo $datos['visible']?>" size="1">(con menos de 4 no aparece en ningún listado. Para ligas europeas siempre 7)<br />
    	Betsapi (o fase para las federaciones) <input type="text" name="apifutbol" value="<?php echo $datos['apifutbol']?>" size="10"><br />
    	Competicion <input type="text" name="apiRFEFcompeticion" value="<?php echo $datos['apiRFEFcompeticion']?>" size="8"><br />
    	Grupo <input type="text" name="apiRFEFgrupo" value="0" size="8"><br />
    	<br />

    	<div id="tipo_torneo_contenido">
    		<?php if ($datos['tipo_torneo']==1){ ?>

				Jornadas <input type="text" name="jornadas" value="30" size="2">  -
				Jornada activa<input type="text" name="activa" value="1" size="1"> - <input type="submit" name="enviar" value="Grabar Torneo">

				<?php } else { 

					$sq='SELECT id, nombre, orden, tipo_eliminatoria FROM fase ORDER BY orden';
					$resultadoSQL = mysqli_query($mysqli, $sq);
				    $fases = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);?>

				Fases: <select name="fases[]" size="20" multiple required>
					<?php foreach ($fases as $key => $value) { ?>
				    	<option value="<?php echo $value['id']?>">
				    		<?php echo $value['tipo_eliminatoria']?> -
				    		<?php echo $value['orden']?> --
				    		<?php echo $value['nombre']?>
				    	</option>
				    <?php } ?>    	
				</select>
				 - <input type="submit" name="enviar" value="Grabar Torneo">

			<?php } ?>


    	</div>

    </form>

    <script type="text/javascript">
		$(document).ready(function(){
			 $("#tipo_torneo").change(function(){
			    $.get("tipoTorneoTT.php","tipo_torneo="+$("#tipo_torneo").val(), function(data){
			        $("#tipo_torneo_contenido").html(data);        
			      });
			 });   
		});
	</script>

    <?php } else {
		//GRABANDO TORNEO		
    	if ($_POST['comunidad_id']==100){ $_POST['comunidad_id']=0; } 
			$sql='INSERT INTO torneo
	(categoria_torneo_id, categoria_id, pais_id, division_id, comunidad_id, apifutbol, apiRFEFcompeticion, apiRFEFgrupo, nombre, traduccion, torneoCorto, orden, visible,  tipo_torneo, sexo, discr, desarrollo, inicio)
	VALUES
	("'.$_POST['categoria_torneo_id'].'","'.$_POST['categoria_id'].'","'.$_POST['pais_id'].'","'.$_POST['division_id'].'","'.($_POST['comunidad_id']+1).'","'.$_POST['apifutbol'].'","'.$_POST['apiRFEFcompeticion'].'","'.$_POST['apiRFEFgrupo'].'","'.$_POST['nombre'].'","'.$_POST['nombre'].'","'.$_POST['torneoCorto'].'","'.$_POST['orden'].'","'.$_POST['visible'].'","'.$_POST['tipo_torneo'].'","0","","0","'.date('Y-m-d').'");'; 
	echo $sql.'<br />'; 
	mysqli_query($mysqli, $sql);
	$torneo_id=mysqli_insert_id($mysqli);
	    

	if($_POST['tipo_torneo']==1){
	$sql='INSERT INTO liga (id, jornadas, jornadaActiva, tipoClasificacion, tipoPuntuacion) VALUES ("'.$torneo_id.'", "'.$_POST['jornadas'].'", '.$_POST['activa'].', 0, 3);';
	mysqli_query($mysqli, $sql);
	echo $sql.'<br />';
	} else {

		foreach ($_POST['fases'] as $val) {
		$sql='INSERT INTO eliminatorio_fase (eliminatorio_id, fase_id) VALUES ("'.$torneo_id.'", "'.$val.'");';
		mysqli_query($mysqli, $sql);
		echo $sql.'<br />';
		$fase_activa=$val;
		}

		$sql='INSERT INTO eliminatorio (id, fase_activa ) VALUES ("'.$torneo_id.'", "'.$fase_activa.'");';
		mysqli_query($mysqli, $sql);
		echo $sql.'<br />';


	}


	$sql='INSERT INTO temporada (torneo_id, nombre, id_original) VALUES ("'.$torneo_id.'", "'.$_POST['nombre'].'", "'.$torneo_id.'");';
	mysqli_query($mysqli, $sql);
	echo $sql.'<br />';

	echo '<hr />Torneo creado correctamente....<a href="index.php?comunidad_id='.$_POST['comunidad_id'].'"></a>';

	}

	die;


}

if (isset($_GET['quitarFicheros'])){	
	$file = $_GET['t'].'/calendarios/'.$_GET['g'].'-equipos.json';
	unlink($file);
	$file = $_GET['t'].'/calendarios/'.$_GET['g'].'-jornadas.json';
	unlink($file);	
}

if (isset($_GET['twits'])){
	

    $campos = "p.id, 
	p.fecha, 
	p.hora_prevista, 
	p.equipoLocal_id,
	ec.nombreCorto localCorto, 
	ec.slug twitterLocal, 
	ef.nombreCorto visitanteCorto, 
	ef.slug twitterVisitante,
	p.equipoVisitante_id";
    $tabla = 'partido p';
    $union = ' INNER JOIN equipo ec ON p.equipoLocal_id=ec.id';
    $union .= ' INNER JOIN equipo ef ON p.equipoVisitante_id=ef.id';
    $condicion = ' WHERE p.temporada_id='.$_GET['temporada_id'].' AND p.jornada=1';
    $orden = ' ORDER BY p.fecha DESC, p.hora_prevista';
    
    $mysqli = conectarFM();
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;    
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $partidosJornada = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

	foreach ($partidosJornada as $key => $value) {
		$url = 'https://futbolme.com/partido.php?id='.$value['id'];
    	$urlLocal = 'http://futbolme.com/src/usuarios/anadirEquipoFavoritoUrl.php?equipo_id='.$value['equipoLocal_id'];
    	$urlVisitante = 'http://futbolme.com/src/usuarios/anadirEquipoFavoritoUrl.php?equipo_id='.$value['equipoVisitante_id'];
    	$twLocal="@".$value['twitterLocal'];
    	$twVisitante="@".$value['twitterVisitante'];

    	$fecha=$value['fecha'];
    	$hora=$value['hora_prevista'];
            
        if (strlen($twLocal)>2){

        	if (strlen($twVisitante)<2){ $twVisitante=$value['visitanteCorto']; }

	        $mensaje =$twLocal." - ".$twVisitante."\n";
	        $mensaje.=$_GET['nombreT']." ".$url."\n";
	        if (isset($hora)) { 
	        	$horaPrevista = DateTime::createFromFormat('H:i:s', $hora);                
	        	$h = ' a las '.$horaPrevista->format('H:i');
	    	} else { $h = ''; }
	    	$mensaje.=nombreDia($fecha).$h."\n";

	        $mensaje.="Agrega ".$value['localCorto']."  a Mifutbolme ".$urlLocal."\n";
	        $mensaje.="Agrega ".$value['visitanteCorto']."  a Mifutbolme ".$urlVisitante."\n";

	        echo $mensaje.'<br />';

	        if ($h==' a las 00:00'){
	        	echo '<b>'.nombreDia($fecha).$h."</b> No se envía<hr />";
	        } else {
	        	if (strlen($mensaje)<400){
	        	$respuesta = sendTweet2($mensaje);
        		imp($respuesta);
        		} else { echo 'Demasiado largo...';}        		
        		echo "<hr />";        	
	        }

	    }


        
		
	}

	die;
}


if (isset($_GET['quitarTorneoFM']) && $_GET['quitarTorneoFM']==1){quitarTorneoFM($_GET['tor']);}
if (isset($_GET['borrarCalendario'])){ borrarCalendario($_GET['temporada_id'],$_GET['id']);}



if (isset($_GET['quitarTorneoFB']) && $_GET['quitarTorneoFB']==1){
	quitarTorneoFB($_GET['id'],$_GET['g'],$_GET['t']);
}
if (isset($_GET['modo']) && $_GET['modo']=='jornadaAcero'){jornadaAceroFB($_GET['id']);}
echo '-- Federación: ';

$sJ=array();
$mysqli2 = conectar();

for ($i=1; $i < 19; $i++) {
	
	//if ($i%2==0){ $color='white'; }else{ $color='gainsboro'; }
	$color='gainsboro';
	echo '<span style="background-color:'.$color.'">&nbsp;<a href="?comunidad_id='.$i.'"><b>'.$i.'</b></a> ';
	$sJ[$i]=sinJugar($i);
	echo '<span style="font-size:20px; padding:2px; background-color:orange">-'.count($sJ[$i]).'-</span> pxis: ';
	$bd='proxis';
	$sql='SELECT count(id) utiles FROM '.$bd.$i.' WHERE fallo<6';
	$resultadoSQL = mysqli_query($mysqli2, $sql);
	$r = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
	if ($r[0]['utiles']<15) { echo '<span class="parpadea"> -- ¡¡ OJO, Hay que cargar proxis !! -- </span>'; }
	if ($r[0]['utiles']<150) { $clase="parpadea"; } else { $clase=""; }

	echo '<span style="color:maroon" class="'.$clase.'"><b>'.$r[0]['utiles'].'</b></span>&nbsp;</span> || ';




	if ($i==10) { echo '<br />'; }
} 

$sJ[0]=sinJugar(0);
$sJ[100]=sinJugar(100);



?> <a href="?comunidad_id=0">Nacional </a> (<?php echo count($sJ[0])?>)
 - <a href="?comunidad_id=100">Fútbol Sala</a> (<?php echo count($sJ[100])?>)
 - <a href="/panelBack/index.php">Panel de control</a>
 - <a href="/panelBack/agenda.php" target="_blank">Agenda</a>
 - <a href="/panelBack/utilidades" target="_blank"><b>U</b></a>
 - <a href="/panelBack/agendaHoras.php" target="_blank">Por horas</a>


<?php
$comunidad_id=$_GET['comunidad_id']??0;

if ($comunidad_id==0){ $territorial='Nacional'; }

if ($comunidad_id==100){ 
	$territorial='Fútbol Sala';$carpeta='----'; 
}

require_once 'funciones/urlFederaciones.php';
echo '<table width="100%"><tr><td width="50%">Comunidad: <b>'.$comunidad_id.'</b> - Territorial <b>'.$territorial.'</b> - carpeta: <b>'.$carpeta.'</b> - Base de datos: <b>'.$bd.'</b><br />';

if ($comunidad_id<99 && $comunidad_id!=4 && $comunidad_id!=12) {

	if ($comunidad_id==0){ 
		$url='https://www.rfef.es/competiciones/futbol-masculino/resultados/22331/2020';
	}
		echo $url.' - <a href="'.$url.'" target="_blank" title="Abrír pagina de la federación">federación</a> - <a href="/panelCargador/asaltoComunidad.php?comunidad_id='.($comunidad_id+1).'" title="Poner fechas y horarios para los próximos siete días">Asalto Comunidad</a> -
		    <a href="/panelCargador/asaltoComunidadPendientes.php?comunidad_id='.($comunidad_id+1).'" target="_blank" title="Partidos que no estan finalizados (igual o menor que hoy)">Asalto Pendientes</a> -
		    <a href="/panelCargador/repasadorCom.php?c='.$comunidad_id.'" target="_blank" title="Partidos de hoy que deberían estar finalizados.">Repasador</a>';
	
		
	$mysqli = conectarFM();

/*if ($comunidad_id==0){

    $consulta = 'SELECT count(p.id) sinactas
    FROM partido p 
    INNER JOIN temporada t ON t.id=p.temporada_id
    INNER JOIN temporada_equipo tel ON p.equipoLocal_id=tel.equipo_id
    INNER JOIN temporada_equipo tev ON p.equipoVisitante_id=tev.equipo_id
    INNER JOIN torneo tor ON tor.id=t.torneo_id
    INNER JOIN liga l ON tor.id=l.id
    WHERE tor.tipo_torneo=1 AND tor.comunidad_id='.($comunidad_id+1).' AND tor.pais_id=60 AND p.estado_partido=1 AND p.codigo_acta=0 AND p.equipoLocal_id>0 AND p.equipoVisitante_id>0 AND tel.grupo>-1 AND tev.grupo>-1 AND tel.temporada_id=p.temporada_id AND tev.temporada_id=p.temporada_id  AND (tor.id<8)'; 

} else {
$consulta = 'SELECT count(p.id) sinactas
FROM partido p 
INNER JOIN temporada t ON t.id=p.temporada_id
INNER JOIN temporada_equipo tel ON p.equipoLocal_id=tel.equipo_id
INNER JOIN temporada_equipo tev ON p.equipoVisitante_id=tev.equipo_id
INNER JOIN torneo tor ON tor.id=t.torneo_id
WHERE tor.tipo_torneo=1 AND tor.comunidad_id='.($comunidad_id+1).' AND tor.pais_id=60 AND p.estado_partido=1 AND p.codigo_acta=0 AND p.equipoLocal_id>0 AND p.equipoVisitante_id>0 AND tel.grupo>-1 AND tev.grupo>-1 AND tel.temporada_id=p.temporada_id AND tev.temporada_id=p.temporada_id AND (tor.orden<15310 OR tor.orden>15702)';
//echo $consulta.'<br />';
}

$resultadoSQL = mysqli_query($mysqli, $consulta);
*/
//$sinactas = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
//echo ' - <a href="/panelCargador/actasPendientes.php?comunidad_id='.($comunidad_id+1).'" target="_blank" style="color:maroon">Partidos sin nº de acta: '.$sinactas['sinactas'].'</a>';

	/*echo '<hr />';

	if ($comunidad_id==100){ 
		echo '- <a href="/panelCargador/asaltoSala.php">Asalto Sala</a>';
	}*/

}


	$partidos=$sJ[$comunidad_id];$comunidad_id_bis=$comunidad_id; ?>
	</td><td valign="top" width="50%"><?php 
	/*if ($comunidad_id==100){ $bd='proxis100';}
	include('gesProxis.php');*/?></td>
</div>

<table><tr>
	<td valign="top" width="100%"><?php 
	//include('sinJugar.php');
	unset($partidos);
	$comunidad_id=$comunidad_id_bis;?></td>
	
	</tr>
</table>


<?php
	
$grupaje=array();

$torneosFM=torneosFM($comunidad_id+1);


$bgcolor='white'; ?>

<table border="1" bgcolor="dimgray">
	<tr bgcolor="gainsboro">
		<td align="center">id</td>
		<td align="center">id cat tor</td>
		<td align="center">cat. torneo</td>
		<td align="center">id cat</td>
		<td align="center">categoria</td>		
		<td align="center">nombre</td>
		<td align="center">fase</td>
		<td align="center">competicion</td>
		<td align="center">grupo</td>
		<td align="center">id_temporada</td>
		<td align="center">cal</td>
		<td align="center">tipo</td>
		<td align="center">div</td>
		<td align="center">partidos</td>
		<td align="center">equipos</td>
		<td align="center">orden</td>
		<td align="center">visible</td>
		<td align="center">Activa</td>
		<td align="center">-</td>		
	</tr>
<?php 
$federacion_id=array();
$torneosVinculables=array();

foreach ($torneosFM as $key => $value) { 

$variables='?territorial='.$territorial.'&comunidad_id='.$comunidad_id.'&torneo_id='.$value['id'].'&temporada_id='.$value['temporada_id'];
	
	if ($value['visible']<5){
	$grupaje[$value['categoria_torneo_id']][$value['categoria_id']][$key]['torneo_id']=$value['id'];
	$grupaje[$value['categoria_torneo_id']][$value['categoria_id']][$key]['nombre']=$value['nombre'];
	$grupaje[$value['categoria_torneo_id']][$value['categoria_id']][$key]['temporada_id']=$value['temporada_id'];
	$grupaje[$value['categoria_torneo_id']][$value['categoria_id']][$key]['categoria_torneo']=$value['categoria_torneo'];	
	$grupaje[$value['categoria_torneo_id']][$value['categoria_id']][$key]['categoria']=$value['categoria'];
	continue; 
	} //quitamos los invisibles;
	
	if ($value['id']==1){ continue; } //el primer id sin torneo
	//if ($value['pais_id']<>60){ continue; } //el primer id sin torneo
	 

	if ($value['categoria_torneo_id']==8 || $value['categoria_torneo_id']==10){ continue; } //el primer id sin torneo
	$federacion_id[$value['apiRFEFgrupo']]=$value['apiRFEFgrupo'];
	if ($value['apiRFEFgrupo']==0) {
		$colorFila="white";
		$torneosVinculables[$value['id']]['id']=$value['id'];
		$torneosVinculables[$value['id']]['categoria']=$value['categoria'];
		$torneosVinculables[$value['id']]['nombre']=$value['nombre'];
	} else { $colorFila="#EAE88F"; }

	if ($value['visible']==3){ $colorVisible='DARKSALMON'; } else { $colorVisible='gold'; }
	if ($value['visible']>200){ $colorVisible='#32E17C'; } 
	?>
	<tr bgcolor="<?php echo $colorFila?>">
		<td align="center" valign="top"><?php echo $value['id']?><br />
			<a href="?matarTorneo=1&temporada_id=<?php echo $value['temporada_id']?>&comunidad_id=<?php echo $comunidad_id?>&id=<?php echo $value['id']?>">Matar</a>

		</td>
		<td align="center" valign="top"><?php echo $value['categoria_torneo_id']?></td>
		<td align="center" valign="top"><?php echo $value['categoria_torneo']?></td>
		<td align="center" valign="top"><?php echo $value['categoria_id']?></td>
		<td align="center" valign="top"><?php echo $value['categoria']?></td>
		
		<form method="post" action="index.php" id="<?php echo $value['id']?>">
		<td align="center" valign="top" bgcolor="<?php echo $colorVisible?>">
			<span class="pull-left" style="cursor:pointer" onclick="verDefiniciones(<?php echo $value['id']?>)">ver</span>
			<span style="cursor:pointer; color:blue;" onclick="cargarCalendarioFM(<?php echo $value['temporada_id']?>,<?php echo $comunidad_id?>,<?php echo $value['id']?>,<?php echo $value['apiRFEFgrupo']?>)"><?php echo $value['nombre']?> - <?php echo $value['nombrePais']?></span><span class="pull-right" style="margin-right: 10px"><a href="historicoTorneo.php?torneo_id=<?php echo $value['id']?>&temporada_id=<?php echo $value['temporada_id']?>" target="_blank">His</a></span>
			
			<div  class="marco celestebox" id="definiciones-<?php echo $value['id']?>" style="display: none;">
			Nombre: <input type="text" name="nombre" value="<?php echo $value['nombre']?>"  size="30"><br />
			Traduccion: <input type="text" name="traduccion" value="<?php echo $value['traduccion']?>"  size="30"><br />
			Torneo corto: <input type="text" name="torneoCorto" value="<?php echo $value['torneoCorto']?>"  size="30"><br />
			Nombre temporada: <input type="text" name="nombreTemporada" value="<?php echo $value['nombreTemporada']?>"  size="30">
			</div>
			<div id="vFM-<?php echo $value['temporada_id']?>"></div>
		</td>

			<td align="center" valign="top" colspan="3">		
				<input type="hidden" name="torneo_id" value="<?php echo $value['id']?>">
				<input type="hidden" name="temporada_id" value="<?php echo $value['temporada_id']?>">
				<input type="hidden" name="comunidad_id" value="<?php echo $comunidad_id?>">
				<input type="text" name="apifutbol" value="<?php echo $value['apifutbol']?>" size="8" style="text-align: center">
				<input type="text" name="apiRFEFcompeticion" value="<?php echo $value['apiRFEFcompeticion']?>" size="8">
				<input type="text" name="apiRFEFgrupo" value="<?php echo $value['apiRFEFgrupo']?>" size="8">
				<input type="submit" name="enviar" value="ok">	


				

			</td>
		</form>
		
		<td align="center" valign="top">
			
			<?php if ($value['temporada_id']>0){ ?>
			<?php echo $value['temporada_id']?> - <a href="/temporada.php?id=<?php echo $value['temporada_id']?>" target="_blank">Ver</a>
			<br />
			<?php
			$variables2=''; 
			if ($comunidad_id==2 || $comunidad_id==6|| $comunidad_id==8 || $comunidad_id==15){
			$variables2='&id_competicion='.$value['apiRFEFcompeticion'].'&id_fase='.$value['apifutbol'].'&id_grupo='.$value['apiRFEFgrupo'].'';
        	$urlWeb=str_replace('xxx', $variables2, $urlWebJor);
        	echo ' - <a href="'.$urlWeb.'" target="_blank">web</a>';


        	$fe = '../federacion/'.$territorial.'/equipos/'.$value['apiRFEFgrupo'].'-equipos.json';            
	            if (!@file_exists($fe)) {

		        	echo ' - <a href="_mifutbol/actualizadorE.php?f='.$value['apifutbol'].'&co='.$comunidad_id.'&g='.$value['apiRFEFgrupo'].'&c='.$value['apiRFEFcompeticion'].'" target="_blank">Eq</a>';
		        }

			}
			

			
			$urlClasi.='codcompeticion='.$value['apiRFEFcompeticion'].'&codgrupo='.$value['apiRFEFgrupo'].'&codjornada='.$value['activa'];
			
			$f='../../json/temporada/'.$value['temporada_id'].'/clasFederacion.json';
	        if (!@file_exists($f)) {  echo '---- '; } else  { echo '<b>OK</b>'; } 
	    	}?>
		
		</td>
		<td align="center">			
			<?php
			$f = $territorial.'/calendarios/'.$value['apiRFEFgrupo'].'-jornadas.json';
			//if ($carpeta=='00isquad'){
				if (@file_exists($f)) { ?>
					<a href="funciones/_002_b_comprobarEquipos.php?te=<?php echo $value['temporada_id']?>&c=<?php echo $value['apiRFEFcompeticion']?>&t=<?php echo $territorial?>&g=<?php echo $value['apiRFEFgrupo']?>&cm=<?php echo $comunidad_id?>&cat=<?php echo $value['categoria_id']?>" target="_blank">EQ</a> - 
					<a href="funciones/_002_b_grabarCalendario.php?te=<?php echo $value['temporada_id']?>&c=<?php echo $value['apiRFEFcompeticion']?>&t=<?php echo $territorial?>&g=<?php echo $value['apiRFEFgrupo']?>&cm=<?php echo $comunidad_id?>&cat=<?php echo $value['categoria_id']?>&tor=<?php echo $value['id']?>" target="_blank">CAL</a> - 

					<a href="index.php?quitarFicheros=1&t=<?php echo $territorial?>&g=<?php echo $value['apiRFEFgrupo']?>&comunidad_id=<?php echo $comunidad_id?>">Q</a>

				<?php } 
			//}

			/*if ($carpeta=='00pnfg'){
				if (@file_exists($f)) { ?>
					<a href="funciones/_002_a_comprobarEquipos.php?te=<?php echo $value['temporada_id']?>&t=<?php echo $territorial?>&g=<?php echo $value['apiRFEFgrupo']?>&cm=<?php echo $comunidad_id?>&cat=<?php echo $value['categoria_id']?>" target="_blank">si</a>
				<?php } 
			}*/


			?> 
		</td>
		<td align="center" valign="top"><?php echo $value['tipo_torneo']?></td>
		<td align="center" valign="top"><?php echo $value['division_id']?></td>
		<?php if ($value['partidos']==0){ ?>
		<td align="center" valign="top" bgcolor="gainsboro">
		<?php } else { ?>
		<td align="center" valign="top">
		<?php } ?>	
			<?php echo $value['partidos']?>
				<?php if ($value['porJugar']>0){ ?>
				 - <span style="color:red"><b><?php echo $value['porJugar']?></b></span>
				<?php } ?>
			 
			 <?php

			 $inicio=explode(',', $value['proximo']);
			 if (count($inicio)>1) {
			 	$date = date_create($inicio[1]);

			 	$fecha1 = date('Y-m-d H:i:s');
				$fecha1 = date_create($fecha1); //hora actual
				$fecha3 = date_format($date,'Y-m-d H:i:s');
				$fecha3 = date_create($fecha3); //hora prevista
				$diferencia = date_diff($fecha3, $fecha1);

				if ($diferencia->invert ==0){
					echo " - Jornada pasada ";
				} else {
					
					echo " - Faltan <b>".$diferencia->d.'</b> dias ';
					if ($inicio[0]==1 && $diferencia->d<7 && $diferencia->m==0) { 
			 		echo '<b>Jornada '.$inicio[0].'</b>'; 
			 		echo '<br /> - <a href="?twits=1&temporada_id='.$value['temporada_id'].'&nombreT='.$value['nombreTemporada'].'">enviar Twitts</a>'; ?>	
			 		<?php } else { ?>

			 			 --- <a href="?borrarCalendario=1&temporada_id=<?php echo $value['temporada_id']?>&comunidad_id=<?php echo $comunidad_id?>&id=<?php echo $value['id']?>">Borrar</a>

			 		<?php } 
				}

				echo 'Jornada '.$inicio[0];
			 	echo ' - '.date_format($date, 'd/<b>m</b>/Y'); 
			 }

			 /*echo '<br />Faltan actas: <a href="/panelCargador/actasPendientes.php?comunidad_id='.($comunidad_id+1).'&torneo_id='.$value['id'].'&temporada_id='.$value['temporada_id'].'">'.$value['sinActa'].'</a>';?>
			 --- <a href="/panelCargador/comprobarResultados.php?torneo_id=<?php echo $value['id']?>" target="_blank">Comp. resul (<?php echo $value['sinComp']?>)</a>
			 */?>
			
		</td>
		<td align="center">			
			<a href="recursos/equiposTemporada.php<?php echo $variables?>&competicion=<?php echo $value['apiRFEFcompeticion']?>&grupo=<?php echo $value['apiRFEFgrupo']?>&equipos=<?php echo $value['equiposTemporada']?>" target="_blank"><?php echo $value['equiposTemporada']?></a>
    	</td>
		

		<form method="post" action="index.php" id="<?php echo $value['id']?>">			
		
		
		<td bgcolor="<?php echo $colorVisible?>" colspan="3">
				<input type="hidden" name="id" value="<?php echo $value['id']?>">
				<input type="hidden" name="temporada_id" value="<?php echo $value['temporada_id']?>">
				<input type="hidden" name="comunidad_id" value="<?php echo $comunidad_id?>">
				Or.<input type="text" name="orden" value="<?php echo $value['orden']?>" size="2" style="text-align: center">
				Vi.<input type="text" name="visible" value="<?php echo $value['visible']?>" size="2" style="text-align:center"><br />
				<?php if ($value['tipo_torneo']==1){ ?>


				Jdas:<input type="text" name="jornadas" value="<?php echo $value['jornadas']?>" size="2">
				Activa:<input type="text" name="activa" value="<?php echo $value['activa']?>" size="2" style="text-align:center">
				<input type="hidden" name="usuario" value="<?php echo $value['usuario']?>" size="2" style="text-align:center">
				

				<?php } else { ?>
					Activa:<input type="text" name="fase_activa" value="<?php echo $value['fase_activa']?>" size="2" style="text-align:center">
					<input type="hidden" name="usuario" value="0">
				<?php }  ?>
				<input type="submit" name="enviar" value="ok">
			
		</td></form>

		<td>
			

		<form method="post" action="index.php" id="<?php echo $value['id']?>">
				<input type="hidden" name="clon_id" value="<?php echo $value['id']?>">
				<input type="hidden" name="comunidad_id" value="<?php echo $comunidad_id?>">
				<input type="hidden" name="nuevo_torneo" value="1">				
				<input type="submit" name="enviar" value="Nuevo detrás">
		</form>
			
			<?php 
			if ($value['partidos']==0 && $value['visible']==0 && $value['temporada_id']==0){
				echo '<b><a href="?quitarTorneoFM=1&tor='.$value['id'].'" title="Quitar torneo de Futbolme">Q</a></b>';
			}

			/* se oculta de momento
			&nbsp;&nbsp;&nbsp;quitar
			<span style="cursor:pointer; color:maroon;" onclick="quitarCompeticion(<?php echo $value['id']?>,<?php echo $value['temporada_id']?>)" title="quitar competicion">

			->*<-</span>
			*/
			if ($value['tipo_torneo']==1){ ?>
			<a href="/panelBack/crearCalendario.php<?php echo $variables?>&grupo=<?php echo $value['apiRFEFgrupo']?>&categoria_torneo=<?php echo $value['categoria_torneo_id']?>&tipo_torneo=1" target="_blank">Edit</a>
			<?php } else {

				echo '<a href="/panelBack/partidosTorneo.php?temporada_id='.$value['temporada_id'].'" target="_blank">Edit</a>';
			}

			?>


				

			</td>
	</tr>
<?php 
} ?>
</table>

<h1>No visibles</h1>
<?php

foreach ($grupaje as $k => $categoria) {
	echo 'Categoría torneo:'.$k.'<br />';
	foreach ($categoria as $k1 => $torneo) {
		echo '---> Categoría equipo:'.$k1.'<br />';
		$paraMatar=array();
		$contador=0;
		foreach ($torneo as $k2 => $value) {
			echo '------> Categoría torneo: '.$value['categoria_torneo'].'<br />';
			echo '------> Categoría equipo: '.$value['categoria'].'<br />';
			echo '------> Nombre: <b>'.$value['nombre'].'</b><br />';
			echo '------> Torneo id: '.$value['torneo_id'].' ---------------------
			<a href="?recuperar=1&comunidad_id='.$comunidad_id.'&id='.$value['torneo_id'].'">Recuperar</a><br />';
			echo '------> Temporada id: '.$value['temporada_id'].'<br />';
			$paraMatar[$k2]['nombre']=$value['nombre'];
			$paraMatar[$k2]['torneo_id']=$value['torneo_id'];
			$paraMatar[$k2]['temporada_id']=$value['temporada_id'];
			$contador++;
			//if ($contador==15){break;}
		}
		$t=serialize($paraMatar);
		$t = urlencode($t);
		unset($paraMatar);
		
		//echo '<a href="?matarTorneo=1&comunidad_id='.$comunidad_id.'&t='.$t.'">Matar esta categoria</a><hr />';
		unset($t);
		
	}
}

$tiempo_fin = microtime_float();
$tiempo = $tiempo_fin - $tiempo_inicio;
echo 'Tiempo empleado: '.($tiempo_fin - $tiempo_inicio);


$time = time();
echo '<br />La hora actual en el servidor es: '.date('H:i:s', $time);

?>

</div>

</body>
</html>

<?php

function sendTweet2($mensaje)
{
    ini_set('display_errors', 1);
    require_once '../apiTwitter/TwitterAPIExchange.php';
    /** Set access tokens here - see: https://dev.twitter.com/apps/ **/
    
    $settings = array(
            'oauth_access_token' => '484030348-H8XpRjupJBMGR8F9PYczsJITxxiF28tIwJaaVVFs',
            'oauth_access_token_secret' => '8GgBO8vrVEr7RLmW7tFsdH7cFEEVqwKkyFTTW0zepoek3',
            'consumer_key' => '46Qx5J4aaZyFt3yR62TJSFerj',
            'consumer_secret' => 'fr0AM3l7ty21UfeEqkcl51gLp0uqVAnjcXoepQymGGX8D3yXxN',
        );

    $url = 'https://api.twitter.com/1.1/statuses/update.json';
    $requestMethod = 'POST';
    /** POST fields required by the URL above. See relevant docs as above **/
    $postfields = array('status' => $mensaje);
    /** Perform a POST request and echo the response **/
    $twitter = new TwitterAPIExchange($settings);

    return $twitter->buildOauth($url, $requestMethod)->setPostfields($postfields)->performRequest();
} 

function sinJugar($comunidad_id)
{
    $dia = date('Y-m-d');
    //$nuevafecha = strtotime ( '-5 day' , strtotime ( $dia ) ) ;
    //$dia = date ( 'Y-m-j' , $nuevafecha );

    $campos = 'p.id, p.estado_partido,p.hora_prevista, p.fecha, p.jornada, p.temporada_id, ec.nombre local, p.equipoLocal_id, p.equipoVisitante_id, p.goles_local, p.goles_visitante,
    ef.nombre visitante, te.nombre temporada_nombre, p.observaciones, tor.categoria_torneo_id, tor.comunidad_id, tor.apifutbol, tor.apiRFEFcompeticion, tor.apiRFEFgrupo ';
    $tabla = ' partido p';
    $union = ' INNER JOIN equipo ec ON ec.id=p.equipoLocal_id';
    $union.= ' INNER JOIN equipo ef ON ef.id=p.equipoVisitante_id';
    $union.= ' INNER JOIN temporada te ON te.id=p.temporada_id';
    $union.= ' INNER JOIN torneo tor ON tor.id=te.torneo_id';


    if ($comunidad_id==100){
        $condicion=' WHERE p.fecha<"'.$dia.'" AND p.estado_partido<>1 AND p.estado_partido<3 AND tor.visible>4 AND  tor.categoria_torneo_id=17';
    } else{
        $condicion = " WHERE p.fecha<'".$dia."' AND p.estado_partido<>1 AND p.estado_partido<3 AND tor.visible>4 AND tor.comunidad_id=".($comunidad_id+1);
    }


    
    $orden = ' ORDER BY tor.categoria_torneo_id, tor.orden';

    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;

    //echo $consulta;
    $mysqli = conectarFM();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    return $resultado;
}

function listarArchivos( $path ){
    // Abrimos la carpeta que nos pasan como parámetro
    $dir = opendir($path);
    // Leo todos los ficheros de la carpeta
    while ($elemento = readdir($dir)){
        // Tratamos los elementos . y .. que tienen todas las carpetas
        if( $elemento != "." && $elemento != ".."){
            // Si es una carpeta
            if( is_dir($path.$elemento) ){
                // Muestro la carpeta
                echo "<p><strong>CARPETA: ". $elemento ."</strong></p>";
            // Si es un fichero
            } else {
                // Muestro el fichero
                if (substr($elemento, -5)=='.json'){
                	echo "<br />". $elemento;
                } else {
                	echo "<br /><a href='?ruta=".$path."/".$elemento."/partidos.json' target='_blank'>". $elemento."</a>";
                }
                
            }
        }
    }
}

?>



