<?php
define('_FUTBOLME_', 1);

require_once '../consultas.php';
require_once '../funciones.php';

$grupo_id=$_POST['grupo_id'];
$comunidad_id=$_POST['comunidad_id'];
$temporada_id=$_POST['temporada_id'];

$mysqli = conectar();
$mysqliFM = conectarFM();
$sql='SELECT categoria_id FROM torneo WHERE id=(select torneo_id from temporada where id='.$temporada_id.')';
echo $sql.'<br />';
$resultadoSQL = mysqli_query($mysqliFM, $sql);
$c = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
$categoria_id=$c['categoria_id'];

echo $categoria_id;


$sql='SELECT e.id,e.nombre, e.federacion_club_id, e.federacion_eq_id, e.futbolme_id fm_equipo_id, c.federacion_ref, c.id_futbolme fm_club_id, c.id club_id 
FROM equipo e
INNER JOIN club c ON c.federacion_id=e.federacion_club_id
WHERE e.comunidad_id='.$comunidad_id.' AND e.grupo_id='.$grupo_id;
echo $sql.'<br />';
$resultadoSQL = mysqli_query($mysqli, $sql);
$equipos = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC); ?>
<table border="1">
	<tr bgcolor="gainsboro">
		<td>id Eq</td>
		<td>club/equipo</td>
		<td>Eq. ID Fed</td>
		<td>Eq. ID FM</td>
		<td>Club ID Fed</td>
		<td>Club ID FM</td>
		<td>Club CodFed</td>
	</tr>

<?php 
$clubs=array();
$clubs[]=$comunidad_id;

foreach ($equipos as $key => $value) { 
	if ($value['federacion_ref']==0){
		$clubs[]=$value['federacion_club_id'];
	}?>
	<tr bgcolor="white">
		<td align="center"><?php echo $value['id']?></td>
		<td><?php echo $value['nombre']?></td>
		<td align="center"><?php echo $value['federacion_eq_id']?></td>
		<td align="center" style="background-color: yellow"><?php echo $value['fm_equipo_id']?></td>
		<td align="center"><?php echo $value['federacion_club_id']?></td>
		<td align="center" style="background-color: yellow">
			<?php if ($value['federacion_ref']>0 && $value['fm_club_id']==0) { ?>
			 <span style="cursor:pointer; color:violet" onclick="insertarClub(<?php echo $value['club_id']?>,<?php echo $comunidad_id?>,<?php echo $categoria_id?>)"><b>crear</b></span>
    			<div id="insertar-club-<?php echo $value['club_id']?>"></div>
    		<?php } else { ?>
			<?php echo $value['fm_club_id']?>
			<?php } ?>	
		</td>
		<td align="center"><?php echo $value['federacion_ref']?></td>
	</tr>
<?php } 

die;
?>
</table><hr />
1º.-<span style="cursor:pointer; color:maroon;" onclick='codigoFederacion(<?php echo json_encode($clubs);?>,<?php echo $grupo_id?>)'>Completar Código Federación</span><br />
2º.-<span>Completar club_id FM</span><br />
3º.-<span>Completar equipo_id FM</span><br />
4º.-<span style="cursor:pointer; color:blue;" onclick="cargarCalendarioInicio(<?php echo $grupo_id?>,<?php echo $comunidad_id?>)">Cargar calendario inicial</span><hr />

<table border="1">
	<tr bgcolor="gainsboro">
		<td>id Eq</td>
		<td>equipo</td>
		<td>equipo fm (Completar equipo_id FM)</td>
		<td>Eq. ID Fed</td>
		<td>Eq. ID FM</td>
		<td>Club ID FM</td>		
	</tr>

<?php 
foreach ($equipos as $key => $value) { ?>
	<tr bgcolor="white">
		<td align="center"><?php echo $value['id']?></td>
		<td><?php echo $value['nombre']?></td>
		<td id="vincular-<?php echo $value['id']?>">
			<?php 
			$sql='SELECT id, nombre, categoria_id, (SELECT nombre FROM categoria WHERE id=categoria_id) categoria, federacion_id FROM equipo WHERE club_id='.$value['fm_club_id'].' ORDER BY categoria_id';
			$resultadoSQL = mysqli_query($mysqliFM, $sql);
			$equiposFM = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
			$totE=count($equiposFM);?>
	<form method="post" id="vinculo" onsubmit="submitVincularEquipo(event, $(this).serialize(),<?php echo $value['id']?>)">
		<select name="futbolme_id" size="<?php echo $totE?>">
		<?php foreach ($equiposFM as $valFM) { ?>
		<option value="<?php echo $valFM['id']?>"><?php echo $valFM['id']?> - <?php echo $valFM['categoria']?> - <?php echo $valFM['nombre']?> - <?php echo $valFM['federacion_id']?></option>
		<?php } ?>
		</select>
      <input type="hidden" name="equipo_id" value="<?php echo $value['id']?>">
      <input type="hidden" name="vincular" value="si">
      <input type="hidden" name="f_equipo_id" value="<?php echo $value['federacion_eq_id']?>">
      <?php if ($value['fm_equipo_id']==0){ ?>
      <input type="submit" name="boton" value="vincular">
  	  <?php } ?>
    </form>

    <?php if ($value['fm_equipo_id']==0){ ?>
    <div style="text-align: right"><span style="cursor:pointer; color:navy;" onclick="crearEquipo(<?php echo $value['fm_club_id']?>,<?php echo $categoria_id?>,<?php echo $value['federacion_eq_id']?>,<?php echo $value['id']?>)">crear equipo en esta categoría (<?php echo $categoria_id?>)</span>
    </div>
    <?php } ?>

		</td>
		<td align="center"><?php echo $value['federacion_eq_id']?></td>
		<td align="center" style="background-color: yellow">
	<?php if ($value['fm_equipo_id']>0){ ?>
	<form method="post" id="desvinculo" onsubmit="submitVincularEquipo(event, $(this).serialize(),<?php echo $value['id']?>)">
	<input type="hidden" name="equipo_id" value="<?php echo $value['id']?>">
	<input type="hidden" name="vincular" value="no">
  	<input type="hidden" name="f_equipo_id" value="<?php echo $value['federacion_eq_id']?>">
  	<input type="hidden" name="futbolme_id" value="<?php echo $value['fm_equipo_id']?>">
  	<input type="submit" name="boton" value="<?php echo $value['fm_equipo_id']?>">	
  	</form>
	<?php } else { echo $value['fm_equipo_id']; } ?>			
		</td>
		<td align="center" style="background-color: yellow"><?php echo $value['fm_club_id']?></td>
		
	</tr>
<?php } ?>
</table><hr />





