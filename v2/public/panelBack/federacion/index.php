
  <table class="table">
    <tr>
    <?php for ($i=0; $i < 19; $i++) { ?>
      <td><div class="content-fed btn" data-related="fed-<?php echo $i?>" data-id="<?php echo $i?>"><?php echo $i?></div></td>
  	<?php } ?>
  	  <td><div class="content-fed btn" data-related="fed-100" data-id="100">FS</div></td>
    </tr>
    <tr><td colspan="20" valign="top" class="cols-xs-9" style="padding: 10px">
    <div id="main-content-fed">
      <?php for ($i=0; $i < 19; $i++) { 
      	$display='none'; if ($i==0){ $display='block'; }?>
      	<div class="container-fed" id="fed-<?php echo $i?>" style="display: <?php echo $display?>;">
      		<?php echo $i?>
      	</div>
      <?php } ?>
      <div class="container-fed" id="fed-100" style="display: <?php echo $display?>;">FS</div>
    </div>
  </td></tr>
</table>



<?php

/*
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

if ($comunidad_id==0){

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
$sinactas = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
echo ' - <a href="/panelCargador/actasPendientes.php?comunidad_id='.($comunidad_id+1).'" target="_blank" style="color:maroon">Partidos sin nº de acta: '.$sinactas['sinactas'].'</a>';

	echo '<hr />';

	if ($comunidad_id==100){ 
		echo '- <a href="/panelCargador/asaltoSala.php">Asalto Sala</a>';
	}

}


	$partidos=$sJ[$comunidad_id];$comunidad_id_bis=$comunidad_id; ?>
	</td><td valign="top" width="50%"><?php 
	if ($comunidad_id==100){ $bd='proxis100';}
	include('gesProxis.php');?></td>
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
	
	$grupaje[$value['categoria_torneo_id']][$value['categoria_id']][$key]['torneo_id']=$value['id'];
	$grupaje[$value['categoria_torneo_id']][$value['categoria_id']][$key]['nombre']=$value['nombre'];
	$grupaje[$value['categoria_torneo_id']][$value['categoria_id']][$key]['temporada_id']=$value['temporada_id'];
	$grupaje[$value['categoria_torneo_id']][$value['categoria_id']][$key]['categoria_torneo']=$value['categoria_torneo'];	
	$grupaje[$value['categoria_torneo_id']][$value['categoria_id']][$key]['categoria']=$value['categoria'];
	
	
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


				<?php
				if ($comunidad_id<10) { $comunidadX='0'.$comunidad_id;} else { $comunidadX=$comunidad_id;}
				if ($value['categoria_id']<10) { $categoriaX='0'.$value['categoria_id'];} else { $categoriaX=$value['categoria_id'];}
				$rutaX='../../json/_federacion/201920/'.$comunidadX.'/'.$categoriaX.'/'.$value['apiRFEFcompeticion'].'/'.$value['apiRFEFgrupo'];
			    
			    if (file_exists($rutaX)) {
			    	echo '<b>creado</b>';
			    	listarArchivos($rutaX);
			    } 
			   
			    ?>

			</td>
		</form>
		
		<td align="center" valign="top">
			
			<?php if ($value['temporada_id']>0){ ?>
			<?php echo $value['temporada_id']?> - <a href="/temporada.php?id=<?php echo $value['temporada_id']?>" target="_blank">Ver</a>
			<br /><a href="/panelCargador/asalto.php?modo=1&torneo_id=<?php echo $value['id']?>&jornada=<?php echo $value['activa']?>" target="_blank">actualizar</a>
			<?php 
			echo ' - <a href="http://fm18.com/temporadaB.php?id='.$value['temporada_id'].'&jornada='.$value['activa'].'" target="_blank">TmpB</a>';
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
			}


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

			 echo '<br />Faltan actas: <a href="/panelCargador/actasPendientes.php?comunidad_id='.($comunidad_id+1).'&torneo_id='.$value['id'].'&temporada_id='.$value['temporada_id'].'">'.$value['sinActa'].'</a>';?>
			 --- <a href="/panelCargador/comprobarResultados.php?torneo_id=<?php echo $value['id']?>" target="_blank">Comp. resul (<?php echo $value['sinComp']?>)</a>
			
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
				<br />Us:<input type="text" name="usuario" value="<?php echo $value['usuario']?>" size="2" style="text-align:center">
				

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
			echo '------> Torneo id: '.$value['torneo_id'].'<br />';
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
*/
?>



