<?php
define('_PANEL_', 1);
require_once '../../includes/config.php';
set_time_limit(0);
$tiempo_inicio = microtime_float(); 

if (isset($_POST['modo']) && $_POST['modo']='ordenar'){
	$sql='UPDATE torneo SET orden='.$_POST['orden'].' WHERE id='.$_POST['id'];
	mysqli_query($mysqliBase, $sql);
	die;
}

$comunidad_id=$_POST['comunidad_id']??$_GET['comunidad_id'];
require_once '../funciones/urlFederaciones.php';

if (isset($_GET['modo'])){require_once 'get.php';}

	$sq='SELECT id,apiRFEFgrupo, nombre FROM torneo WHERE comunidad_id='.($comunidad_id+1).' AND visible>4 ORDER BY categoria_torneo_id, orden';
$resultadoSQL = mysqli_query($mysqli, $sq);
$vinculables = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
$vinPorGrupo=array();

foreach ($vinculables as $key => $v) {
	/*if ($v['apiRFEFgrupo']>0){
		$sq='SELECT id FROM torneo WHERE comunidad_id='.$comunidad_id.' AND grupo='.$v['apiRFEFgrupo'];
		$resultadoSQL = mysqli_query($mysqliBase, $sq);
		$r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
		if (!empty($r)){ continue; unset($v); }
	}*/
	$vinPorGrupo[$v['apiRFEFgrupo']]=$v;
	$sq='SELECT fase,competicion, nombre, nombreGrupo FROM torneo WHERE grupo='.$v['apiRFEFgrupo'].' AND comunidad_id='.$comunidad_id;
	$resultadoSQL = mysqli_query($mysqliBase, $sq);
	$mas = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
	if (!empty($mas)){ 
		$sq='UPDATE torneo SET traduccion="'.trim($mas['nombre']).'/'.trim($mas['nombreGrupo']).'",apifutbol='.$mas['fase'].', apiRFEFcompeticion='.$mas['competicion'].', apifutbol='.$mas['fase'].' WHERE id='.$v['id'];
		//echo $sq.'<br />';
		mysqli_query($mysqli, $sq);
	}
}

$sql='SELECT id, categoria_torneo_id, categoria_id, fase, competicion, grupo, comunidad_id, nombre, nombreGrupo, orden, tipo_torneo, inicio, estado, usuario FROM torneo WHERE comunidad_id='.$comunidad_id.' ORDER BY orden';
$resultadoSQL = mysqli_query($mysqliBase, $sql);
$datos = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC); ?>
<html>
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>

	<table cellpadding="1" cellspacing="1" bgcolor="black">
		<tr bgcolor="gainsboro">
			<td>Id</td>
			<td>Cat.</td>
			<td>Fase</td>
			<td>Comp.</td>
			<td>Nombre</td>
			<td>N. Grupo</td>
			
			<td>Equipos</td>
			<td>Calendario</td>
			<td>Orden</td>
			<td>Tipo</td>
			<td>Inicio</td>
			<td>Estado<br />Usuario</td>
			<td>Grupos</td>
		</tr>
		<?php 
		$n=''; ?>


		<?php foreach ($datos as $key => $value) {?>
		<tr bgcolor="white">
			<td><?php echo $value['id']?></td>
			<td><?php if ($n!=$value['nombre']){echo 'Tor: '.$value['categoria_torneo_id'];}?>
				<hr />
				<?php if ($n!=$value['nombre']){echo 'Equ: '.$value['categoria_id'];}?></td>
			<td align="center"><?php if ($n!=$value['nombre']){echo $value['fase'];}?></td>
			<td>
		<?php if ($n!=$value['nombre']){ ?>
		<a href="gruposSelect.php?comunidad_id=<?php echo $comunidad_id?>&competicion=<?php echo $value['competicion']?>" title="Extraer los grupos de esta competición"><?php echo $value['competicion']?></a>

		- <a href="_01selects.php?comunidad_id=<?php echo $comunidad_id?>&competicion=<?php echo $value['competicion']?>" title="Extraer los grupos de esta competición">gr</a>

		- <a href="actualizadorE.php?compe=<?php echo $value['competicion']?>&comunidad_id=<?php echo $comunidad_id?>" target="_blank">EQ</a> 

		- <a href="actualizadorP.php?compe=<?php echo $value['competicion']?>&comunidad_id=<?php echo $comunidad_id?>" target="_blank">PD</a> 
	<?php } ?>

			</td>
			
			<td><?php if ($n!=$value['nombre']){echo $value['nombre'].'<br />';}?>
				<p style="text-align:right"><?php 
				echo 'ID: '.$value['grupo'];
			if ($value['grupo']>0){
				$enlace=$url.'CodCompeticion='.$value['competicion'].'&CodGrupo='.$value['grupo'].'&CodJornada=1';
				echo ' - <a href="'.$enlace.'" target="_blank" title="Ver el torneo en la página de la federación">Ver</a> -> ';
				}?></p>
			<div id="vinculables-<?php echo $value['id']?>" style="display: none">
				<?php $vinculado='';
				foreach ($vinculables as $k => $v) {
				if ($value['grupo']>0 && $v['apiRFEFgrupo']==$value['grupo']){ 
					$vinculado=$v['nombre']; 


					continue; 
				}?>
					<span><?php echo $v['id']?> - <?php echo $v['nombre']?><a href="?modo=vincular&id=<?php echo $v['id']?>&g=<?php echo $value['grupo']?>&comunidad_id=<?php echo $comunidad_id?>"> vincular </a></span><br />
				<?php }?>				
			</div>
				<br /><b><?php echo $vinculado?></b>
			</td>
			<td><b><?php echo $value['nombreGrupo'];?></b><br />
			<?php if ($value['grupo']>0 && isset($vinPorGrupo[$value['grupo']])){
				$txtVinculo='';
			} else {
				$txtVinculo='no vinculado';
			}
			?>			
			<span onclick="verVinculables(<?php echo $value['id']?>)" style="cursor: pointer; background-color: orange"><?php echo $txtVinculo?></span>
			</td>

			<td><?php 
			$f = '../../federacion/'.$territorial.'/equipos/'.$value['grupo'].'-equipos.json';
			if (@file_exists($f)) { 
				echo '<span  onclick="verEquipos('.$value['grupo'].')" style="cursor:pointer">Ver equipos</span>';
			    $json = file_get_contents($f);
				$e = json_decode($json, true);
				echo '<div id="mostrarEquipos'.$value['grupo'].'" style="display:none; width:300px">';
				foreach ($e as $kj => $vj) {	
					$rutaEscudo='';
		            if (isset($vj['club'])){
		            	$n=explode('_', $vj['club']);
                    	$club=$n[1];$club=intval($club);
                    	$rutaEscudo='/img/federacion/'.$territorial.'/escudo_'.$club.'.png';
                    	echo '
		            <img src="'.$rutaEscudo.'" style="width:18px; height:20px"> <a href="'.$vj['url'].'" target="_blank">'.$vj['id'].' - '.$vj['equipo'].'</a><br />';

		            } else {
		            	echo '
		            -----<a href="'.$vj['url'].'" target="_blank">'.$vj['id'].' - '.$vj['equipo'].'</a><br />';

		            }
		            
		        
				}
				echo '<hr /><a href="_escudos.php?f='.$f.'" target="_blank">Descargar escudos</a>'; ?>
				 - <a href="_05tablas.php?comunidad_id=<?php echo $comunidad_id?>&competicion=<?php echo $value['competicion']?>&grupo=<?php echo $value['grupo']?>">repetir equipos</a>
				</div>				
			<?php } else { ?>
				<a href="gruposSelect.php?comunidad_id=<?php echo $comunidad_id?>&competicion=<?php echo $value['competicion']?>&grupo=<?php echo $value['grupo']?>">Cargar equipos</a>
			<?php } ?>
			</td>

			<td><?php 
			$f = '../../federacion/'.$territorial.'/calendarios/'.$value['grupo'].'-partidos.json';
			if (@file_exists($f)) { 
				echo '<span  onclick="verCalendario('.$value['grupo'].')" style="cursor:pointer">Ver calendario</span>'; ?>

				 - <a href="_04tablas.php?comunidad_id=<?php echo $comunidad_id?>&competicion=<?php echo $value['competicion']?>&grupo=<?php echo $value['grupo']?>">repetir</a>

				  - <a href="?comunidad_id=<?php echo $comunidad_id?>&modo=borrarCal&f=<?php echo $f?>">borrar</a>

				<?php 
			    $json = file_get_contents($f);
				$partidos = json_decode($json, true);

				echo '<div id="mostrarCalendario'.$value['grupo'].'" style="display:none; width:300px">';
				foreach ($partidos as $kj => $vj) {
					imp($vj);
				}
				echo '</div>';
				
			} else { ?>
				<a href="_04tablas.php?comunidad_id=<?php echo $comunidad_id?>&competicion=<?php echo $value['competicion']?>&grupo=<?php echo $value['grupo']?>">Cargar partidos</a>

			<?php } ?>
			</td>

			<td><?php echo '<span  id="aOrdenar'.$value['id'].'" onclick="reOrdenar('.$value['id'].')" style="cursor:pointer">'.$value['orden'].'</span>';?>

			<div id="mostrarOrdenar<?php echo $value['id']?>" style="display:none; width:300px">
				<form method="post" onsubmit="submitOrden(event, $(this).serialize(),<?php echo $value['grupo']?>)">
				<input type="hidden" name="modo" value="ordenar">
			    <input type="hidden" name="id" value="<?php echo $value['id']?>" >
			    <input type="hidden" name="grupo" value="<?php echo $value['grupo']?>" >
			    <input type="text" name="orden" value="<?php echo $value['orden']?>" size="4">
			    <input type="submit" name="cambiar" value="ok">
			    </form>
			</div>
				


			</td>
			<td><?php if ($n!=$value['nombre']){echo $value['tipo_torneo'];}?></td>
			<td><?php if ($n!=$value['nombre']){echo $value['inicio'];}?></td>
			<td><?php echo $value['estado']?><hr /><?php echo $value['usuario']?></td>
			<td>
				<?php 
				 if ($n!=$value['nombre']){
					$f = '../../federacion/'.$territorial.'/'.$value['competicion'].'-grupos.json';
					if (@file_exists($f)) { 
					    $json = file_get_contents($f);
						$grupos = json_decode($json, true);
						if ($comunidad_id==2){
							$nGrupos=(count($grupos)-1);
							echo $nGrupos.' grupos -';
						} else {
							$nGrupos=count($grupos);
							echo $nGrupos.' grupos -';
						}
						$sql='SELECT count(id) gr FROM torneo WHERE competicion='.$value['competicion'].' AND grupo>0';
						$resultadoSQL = mysqli_query($mysqliBase, $sql);
						$g = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);

						if ($g['gr']!=$nGrupos){ $color='red';} else { $color='blue';}
						echo '<a href="?comunidad_id='.$comunidad_id.'&competicion='.$value['competicion'].'&modo=grabar" style="color:'.$color.'" title="Grabar los grupos en la BD"> en BD '.$g['gr'].'</a><br />';
						echo '<span  onclick="verGrupos('.$value['competicion'].')" style="cursor:pointer">Ver grupos</span>';
						echo '<div id="mostrarGrupos'.$value['competicion'].'" style="display:none; width:300px">';
							foreach ($grupos as $v) {
								echo $v['id'].' '.$v['nombre'].'<br />';
							}
							echo '</div>';						
						unset($datos);
					} else {
					    echo 'X'; 
					}
				}?>
			</td>
		</tr>
	    <?php $n=$value['nombre'];
		} ?>
</table>


<?php 
$tiempo_fin = microtime_float();
$tiempo = $tiempo_fin - $tiempo_inicio;
echo '<hr />Tiempo empleado: '.($tiempo_fin - $tiempo_inicio);


$time = time();
echo '<br />La hora actual en el servidor es: '.date('H:i:s', $time);
?>

</body>
</html>
<script>
function verVinculables(id){ $('#vinculables-'+id).toggle(); }
	function verEquipos(grupo){ $('#mostrarEquipos'+grupo).toggle(); }
	function verJornadas(grupo){ $('#mostrarJornadas'+grupo).toggle(); }
	function verCalendario(grupo){ $('#mostrarCalendario'+grupo).toggle(); }
	function verGrupos(competicion){ $('#mostrarGrupos'+competicion).toggle(); }
	function reOrdenar(grupo){ $('#mostrarOrdenar'+grupo).toggle(); }

function submitOrden (event, form, id){
        event.preventDefault();        
        var url = "/panelBack/federacion/_mifutbol/_00listar.php"; // El script a dónde se realizará la petición.
        $.ajax({
            type: 'POST',
            url: url,
            data: form,
            success: function(data){
              console.log(data);
              $('#aOrdenar'+id).html('Orden modificado'); 
            
            }
        });
    }; 

</script>