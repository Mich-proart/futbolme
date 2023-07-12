<?php
set_time_limit(0);
define('_FUTBOLME_', 1);

require_once '../consultas.php';
require_once '../funciones.php';
include('../../simple/simple_html_dom.php');
include('../../../src/funciones.php');
$tiempo_inicio = microtime_float(); 

$mysqli = conectar();

if (isset($_POST['modo']) && $_POST['modo']='ordenar'){
	$sql='UPDATE torneo SET orden='.$_POST['orden'].' WHERE id='.$_POST['id'];
	mysqli_query($mysqli, $sql);
	die;
}

$comunidad_id=$_POST['comunidad_id']??$_GET['comunidad_id'];
require_once '../funciones/urlFederaciones.php';

if (isset($_GET['modo'])){
	$c=$_GET['competicion'];
	$f = '../../federacion/'.$territorial.'/'.$c.'-grupos.json';
	if (@file_exists($f)) { 
	    $json = file_get_contents($f);
		$grupos = json_decode($json, true);
		foreach ($grupos as $key => $value) {
			$sql='SELECT id FROM torneo WHERE competicion='.$c.' AND grupo=0';
			$resultadoSQL = mysqli_query($mysqli, $sql);
			$t = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
			if (count($t)==1){ //solo hay uno y grupo=0 es la competicion grabada.
				$sql='UPDATE torneo SET grupo='.$value['id'].', nombreGrupo="'.$value['nombre'].'" WHERE id='.$t['id'];
				mysqli_query($mysqli, $sql);
			} else {

				$sql='SELECT id FROM torneo WHERE grupo='.$value['id'].' AND comunidad_id='.$comunidad_id;
				$resultadoSQL = mysqli_query($mysqli, $sql);
				$t = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
				if (count($t)==0){
					$sql='INSERT INTO torneo(categoria_torneo_id, categoria_id, fase, competicion, grupo, comunidad_id, nombre, nombreGrupo, orden, tipo_torneo, inicio, estado, usuario) 
					SELECT categoria_torneo_id, categoria_id, fase, competicion, '.$value['id'].', comunidad_id, nombre, "'.$value['nombre'].'", orden, tipo_torneo, inicio, estado, 0 FROM torneo WHERE competicion='.$c.' LIMIT 1';
					mysqli_query($mysqli, $sql);
				}
			}
		}
	}
}



$sql='SELECT id, categoria_torneo_id, categoria_id, fase, competicion, grupo, comunidad_id, nombre, nombreGrupo, orden, tipo_torneo, inicio, estado, usuario FROM torneo WHERE comunidad_id='.$comunidad_id.' ORDER BY orden';
$resultadoSQL = mysqli_query($mysqli, $sql);
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
			<td>Jornadas</td>
			<td>Equipos</td>
			<td>Calendario</td>
			<td>Orden</td>
			<td>Tipo</td>
			<td>Inicio</td>
			<td>Estado<br />Usuario</td>
			<td>Grupos</td>
		</tr>
		<?php 
		$n='';
		foreach ($datos as $key => $value) {?>
		<tr bgcolor="white">
			<td><?php echo $value['id']?></td>
			<td><?php if ($n!=$value['nombre']){echo 'Tor: '.$value['categoria_torneo_id'];}?>
				<hr />
				<?php if ($n!=$value['nombre']){echo 'Equ: '.$value['categoria_id'];}?></td>
			<td align="center"><?php if ($n!=$value['nombre']){echo $value['fase'];}?></td>
			<td><a href="_01selects.php?comunidad_id=<?php echo $comunidad_id?>&competicion=<?php echo $value['competicion']?>" title="Extraer los grupos de esta competición"><?php if ($n!=$value['nombre']){echo $value['competicion'];}?></a></td>
			
			<td><?php if ($n!=$value['nombre']){echo $value['nombre'].'<br />';}?>
				<p style="text-align:right"><?php 
				echo 'ID: '.$value['grupo'];
			if ($value['grupo']>0){
				$enlace=$url.'CodCompeticion='.$value['competicion'].'&CodGrupo='.$value['grupo'].'&CodJornada=1';
				echo ' - <a href="'.$enlace.'" target="_blank" title="Ver el torneo en la página de la federación">Ver</a> -> ';
				}?></p>
			</td>
			<td><?php 
			echo $value['nombreGrupo'];
			if ($value['grupo']>0){
			$mysqliFM = conectarFM();
			$sq='SELECT id FROM torneo WHERE apiRFEFgrupo='.$value['grupo'].' AND comunidad_id='.($comunidad_id+1);
				$resultadoSQL = mysqli_query($mysqliFM, $sq);
				$t = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
				if (!isset($t)){ echo '<br />no vinculado'; } else { echo '<br /><b>vinculado</b>'; }
			}?>
			</td>

			<td><?php 
			$f = '../../federacion/'.$territorial.'/jornadas/'.$value['grupo'].'-jornadas.json';
			if (@file_exists($f)) { 
				echo '<span  onclick="verJornadas('.$value['grupo'].')" style="cursor:pointer">Ver jornadas</span>';
				$json = file_get_contents($f);
				$jornadas = json_decode($json, true);
				echo '<div id="mostrarJornadas'.$value['grupo'].'" style="display:none; width:300px">';
				foreach ($jornadas as $kj => $vj) {
					echo $vj['id'].' '.$vj['nombre'].'<br />';
				}
				echo '</div>';
			} else { ?>
				<a href="_02selects.php?comunidad_id=<?php echo $comunidad_id?>&competicion=<?php echo $value['competicion']?>&grupo=<?php echo $value['grupo']?>">Cargar jornadas</a>
			<?php } ?>
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
				<a href="_05tablas.php?comunidad_id=<?php echo $comunidad_id?>&competicion=<?php echo $value['competicion']?>&grupo=<?php echo $value['grupo']?>">Cargar equipos</a>
			<?php } ?>
			</td>

			<td><?php 
			$f = '../../federacion/'.$territorial.'/calendarios/'.$value['grupo'].'-partidos.json';
			if (@file_exists($f)) { 
				echo '<span  onclick="verCalendario('.$value['grupo'].')" style="cursor:pointer">Ver calendario</span>'; ?>

				 - <a href="_04tablas.php?comunidad_id=<?php echo $comunidad_id?>&competicion=<?php echo $value['competicion']?>&grupo=<?php echo $value['grupo']?>">repetir</a>

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

			<td><?php echo '<span  id="aOrdenar'.$value['grupo'].'" onclick="reOrdenar('.$value['grupo'].')" style="cursor:pointer">'.$value['orden'].'</span>';?>

			<div id="mostrarOrdenar<?php echo $value['grupo']?>" style="display:none; width:300px">
				<form method="post" onsubmit="submitOrden(event, $(this).serialize(),<?php echo $value['grupo']?>)">
				<input type="hidden" name="modo" value="ordenar" >
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
						echo count($grupos).' grupos -';
						$sql='SELECT count(id) gr FROM torneo WHERE competicion='.$value['competicion'].' AND grupo>0';
						$resultadoSQL = mysqli_query($mysqli, $sql);
						$g = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);

						if ($g['gr']!=count($grupos)){ $color='red';} else { $color='blue';}
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

	function verEquipos(grupo){ $('#mostrarEquipos'+grupo).toggle(); }
	function verJornadas(grupo){ $('#mostrarJornadas'+grupo).toggle(); }
	function verCalendario(grupo){ $('#mostrarCalendario'+grupo).toggle(); }
	function verGrupos(competicion){ $('#mostrarGrupos'+competicion).toggle(); }
	function reOrdenar(grupo){ $('#mostrarOrdenar'+grupo).toggle(); }

function submitOrden (event, form, grupo){
        event.preventDefault();
        
        var url = "/panelBack/federacion/_mifutbol/_00listar.php"; // El script a dónde se realizará la petición.
        $.ajax({
            type: 'POST',
            url: url,
            data: form,
            success: function(data){
              console.log(data);
              $('#aOrdenar'+grupo).html('Orden modificado'); 
            
            },
            error: function(){

            }
        });

        return false;
    };  	





/*
   
   $(document).on('click', '#verJornadas', _verJornadas);
   //$(document).on('click', '.ventanaTW', _abrir_tw);

_verJornadas = function(){  
      var estado = $('#mostrarJornadas').css('display');
      console.log(estado);
      if (estado==='none') {
          $('#mostrarJornadas').css('display','block');
      } else {
          $('#mostrarJornadas').css('display','none');
      }; 
    }



$( "body" ).on( "click", "#btn_resultados", function() {
      $(".estado").css("display", "block");
      $(".resultado").css("display", "block");
      $(".clasificado").css("display", "block");
      $(".observaciones").css("display", "block");
      $(".arbitro").css("display", "none");
      $(".medio").css("display", "none");  
});

 _add_tw = function(){   

      var color = $(this).css('background-color');
      var texto = $('#addTw').text();
      var twLocal = $(this).attr('data-l');
      var twVisitante = $(this).attr('data-v');
      var cadena = twLocal+' OR '+twVisitante+' OR ';
      
      $('#addTw').css('background-color', 'white');

      if (color==='rgb(255, 0, 0)') {
          $('#addTw').text(function(a, reemplaza) {
              return reemplaza.replace(cadena, '');
          });
          $(this).css('background-color','white');
      } else {
          $('#addTw').text(texto+cadena);
          $(this).css('background-color','red');
      }; 
    }

_abrir_tw = function(){
  url = 'https://twitter.com/search?q=';
  busqueda = $('#addTw').text();
  c = busqueda.length;
  busqueda=busqueda.substr(0, c-3);
  url2 = url+busqueda;      
  $("<a>").attr("href", url2).attr("target", "_blank")[0].click();
  return false;
}
*/
</script>