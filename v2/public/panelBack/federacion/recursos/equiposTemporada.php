<?php
define('_PANEL_', 1);
require_once '../../includes/config.php';
set_time_limit(0);
$tiempo_inicio = microtime_float(); 


if (isset($_POST['temporada_id'])){
	foreach ($_POST['fed_id'] as $val) {
		$sq='SELECT equipo_id FROM temporada_equipo WHERE equipo_id='.$val.' AND temporada_id='.$_POST['temporada_id'];
		$resultadoSQL = mysqli_query($mysqli, $sq);
    	$resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
    	if (count($resultado)==0){
    		$sq='INSERT INTO temporada_equipo (equipo_id, temporada_id) VALUES ("'.$val.'","'.$_POST['temporada_id'].'")';
			mysqli_query($mysqli, $sq);
    	}
	}

	$_GET['temporada_id']=$_POST['temporada_id'];
	$_GET['territorial']=$_POST['territorial'];
	$_GET['grupo']=$_POST['grupo'];
	$_GET['torneo_id']=$_POST['torneo_id'];
	$_GET['comunidad_id']=$_POST['comunidad_id'];
}


if (isset($_POST['equipo_id'])){
	$sq='UPDATE equipo SET federacion_id='.$_POST['federacion_id'].' WHERE id='.$_POST['equipo_id'];
	mysqli_query($mysqli, $sq);
	$_GET['temporada_id']=$_POST['temporada_id'];
}

if (isset($_POST['club_id'])){
	$sq='UPDATE club SET codigoRFEF="'.$_POST['codigoRFEF'].'" WHERE id='.$_POST['club_id'];
	mysqli_query($mysqli, $sq);
	$_GET['temporada_id']=$_POST['temporada_id'];
}


$comunidad_id=$_GET['comunidad_id']??0;
$temporada_id=$_GET['temporada_id']??0;
if ($temporada_id==0){ die('Falta temporada_id'); }






if (isset($_GET['modo']) && $_GET['modo']="quitar"){
	$sq='DELETE FROM temporada_equipo WHERE temporada_id='.$temporada_id;
	mysqli_query($mysqli, $sq);
	echo "<b>--> Quitados los equipos de este torneo.</b><br />";

}



$sq='SELECT t.nombre tempNombre, t.id tempId, t.torneo_id, e.id eqId, e.equipacion_id, e.nombre eqNombre, e.categoria_id, e.federacion_id, e.codigoRFEF eqRFEF, c.id clubId, c.nombre clubNombre, c.codigoRFEF clubRFEF, c.futbolbase_id, c.territorialRFEF, tor.comunidad_id, tor.visible, tor.apiRFEFgrupo, e.slug, 
(select count(p.id) from partido p where (p.equipoLocal_id=e.id or p.equipoVisitante_id=e.id) and p.temporada_id=te.temporada_id) partidos
FROM temporada_equipo te 
INNER JOIN equipo e ON e.id=te.equipo_id
INNER JOIN club c ON c.id=e.club_id
INNER JOIN temporada t ON t.id=te.temporada_id
INNER JOIN torneo tor ON tor.id=t.torneo_id
WHERE te.temporada_id='.$temporada_id;

$resultadoSQL = mysqli_query($mysqli, $sq);
$equipos = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC); 
$clubes=array();



$nequipos = array();
$contador=0;

foreach ($equipos as $key => $fila) {   
    $nequipos[$contador]['equipo']= $fila['eqNombre'];
    $nequipos[$contador]['id']= $fila['eqId'];
    $nequipos[$contador]['tw']= $fila['slug'];
    $contador++;
} 

?><div id="mensaje"></div>
<table class="table">
	<tr><td valign="top"><h4>Contenido del json</h4>
<?php 
$f = '../../../panelBack/federacion/'.$_GET['territorial'].'/equipos/'.$_GET['grupo'].'-equipos.json';
echo $f.'<br />';
if (@file_exists($f)) { 
    $json = file_get_contents($f);
	$datos = json_decode($json, true);
	//imp($datos);
	$equiposFed=array();?>
	<form method="post" action="?">
		<input type="hidden" name="temporada_id" value="<?php echo $temporada_id?>">
		<input type="hidden" name="territorial" value="<?php echo $_GET['territorial']?>">
		<input type="hidden" name="grupo" value="<?php echo $_GET['grupo']?>">
		<input type="hidden" name="torneo_id" value="<?php echo $_GET['torneo_id']?>">
		<input type="hidden" name="comunidad_id" value="<?php echo $_GET['comunidad_id']?>">
	<table  bgcolor="black">
		<tr bgcolor="gainsboro"><td>Equipo</td><td>idFed</td><td>BD-id-CodRFEF</td></tr>
	<?php foreach ($datos as $key => $value) {
	//imp($value['url']);
	
	$fed_id=str_replace('NFG_VisEquipos?cod_primaria=1000119&Codigo_Equipo=', '', $value['url']);

	if ($fed_id>0){
	$equiposFed[$fed_id]=$value['equipo'];
	$sq='SELECT e.id,e.nombre,e.codigoRFEF,(SELECT count(equipoLocal_id) FROM partido WHERE equipoLocal_id=e.id) partidos FROM equipo e WHERE federacion_id='.$fed_id;
	//echo $sq;
	$resultadoSQL = mysqli_query($mysqli, $sq);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
	?>
		<tr bgcolor="white"><td><?php echo $value['equipo']?></td>
			<td><?php echo $fed_id?></td>
			<td>

				
				<?php 
				if (empty($resultado)){
					echo '<b>no se ha encontrado equipo en la BD</b>';
				} else {
					foreach ($resultado as $k => $v) { 
						if ($v['partidos']>0) {

							$sql='SELECT temporada_id FROM temporada_equipo WHERE equipo_id='.$v['id'];
							$resultadoSQL = mysqli_query($mysqli, $sql);
	    					$torEquipo = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
	    					if (!empty($torEquipo)){
	    						foreach ($torEquipo as $val) { ?>
	    							<a href="https://futbolme.com/temporada.php?id=<?php echo $val['temporada_id']?>" target="_blank"><?php echo $val['temporada_id']?></a> - 
	    						<?php }
	    					}


						}?>
					<input type="checkbox" name="fed_id[]" value="<?php echo $v['id']?>">
					<?php echo $v['nombre'].' '.$v['id'].' '.$v['codigoRFEF'].' ('.$v['partidos'].')<br />';
					} 
				}?>
				
			</td>
		</tr>
	<?php }
	 } ?>
	<tr><td colspan="5" align="center"><input type="submit" name="agregar" value="agregar">
	</td>	
	</table>
	</form>
<?php } else {
    echo 'No tenemos json con los equipos de este grupo';
} ?>


	</td>
	<td valign="top">
<table cellpadding="2" cellspacing="2" bgcolor="black">	
<?php foreach ($equipos as $key => $value) { 
	if ($key==0) { ?>
		<tr bgcolor="yellow"> 
			<td colspan="6"><?php echo $value['tempNombre']?> - id: <?php echo $value['tempId']?></td>
			<td colspan="7">Torneo: <?php echo $value['torneo_id']?> - Comunidad: <?php echo $value['comunidad_id']-1?> - Visible: <?php echo $value['visible']?>
			- <a href="?temporada_id=<?php echo $temporada_id?>&modo=quitar">Quitar equipos del torneo</a>
			</td>
			<form method='post' action='buscarTw.php' target="_blank">
				<td>
                    <input type='hidden' name='modo' value='buscarTw'>
                    <input type='hidden' name='equipos' value='<?php echo serialize($nequipos)?>'>
                    <input type='hidden' name='temporada_id' value='<?php echo $_GET['temporada_id']?>'>                
                    <input type="submit" name="enviar" value="Buscar twitters">
                </td>
            </form>
		</tr>
		<tr bgcolor="gainsboro">
			<td>N</td>		
			<td>Equipo</td>
			<td>idE</td>
			<td>Cat</td>
			<td>RFEF</td>
			<td>Fed id</td>
			<td>Pdos</td>
			<td>Club</td>
			<td>idC</td>
			<td>codRFEF</td>
			<td>fb_id</td>
			<td>terr</td>
			<td>escudo</td>
			<td>equipacion</td>
		</tr>
	<?php 
	 	$comunidad_id=($value['comunidad_id']-1);
	 	$carpeta="";
		require_once '../funciones/urlFederaciones.php';		
	} $clubes[]=$value['clubId'];?>
	<tr bgcolor="white"><td><?php echo $key+1?></td>
		<td><?php echo $value['eqNombre']?></td>
		<td align="right"><?php echo $value['eqId']?></td>
		<td align="center"><?php echo $value['categoria_id']?></td>
		<td align="center"><?php echo $value['eqRFEF']?></td>
			<form method="post" action="?" id="equipo-<?php echo $value['eqId']?>">
				<?php if (isset($equiposFed[$value['federacion_id']])){ $colorin='gold'; } else { $colorin='red';}?>
				<td align="right" bgcolor="<?php echo $colorin?>">
				<input type="hidden" name="equipo_id" value="<?php echo $value['eqId']?>">
				<input type="hidden" name="temporada_id" value="<?php echo $temporada_id?>">
				<input style="text-align:right" type="text" name="federacion_id" value="<?php echo $value['federacion_id']?>" size="4">
				<input type="submit" name="*" value="*">
			</td>
			</form>	
		<td align="center"><?php echo $value['partidos']?></td>
		<td><?php echo $value['clubNombre']?></td>
		<td align="right">
			<a href="/panelBack/club/club.php?id=<?php echo $value['clubId']?>" target="_blank"><?php echo $value['clubId']?></a>
		</td>
			<form method="post" action="?" id="club-<?php echo $value['clubId']?>">
				<td align="right">
				<input type="hidden" name="club_id" value="<?php echo $value['clubId']?>">
				<input type="hidden" name="temporada_id" value="<?php echo $temporada_id?>">
				<input style="text-align:right" type="text" name="codigoRFEF" value="<?php echo $value['clubRFEF']?>" size="4">
				<input type="submit" name="*" value="*"></td>
			</form>
		<td align="right">
			<?php echo $value['futbolbase_id']?></a>			
		</td>
		<td align="center"><?php echo $value['territorialRFEF']?></td>
		<td>
			<?php
			$rutaEscudo=rutaEscudo($value['clubId'],$value['eqId']);
            if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaEscudo))) {
                $rutaEscudo = '/static/img/jugadores/NI.png';
            }?>
            <img src="<?php echo $rutaEscudo; ?>" itemprop="logo" style="width:24px; height:28px; margin-right: 2px">
		</td>	
		<td>
			<?php
			$rutaEquipacion='/static/img/equipaciones/eq'.$value['equipacion_id'].'.png';
            if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaEquipacion))) {
                $rutaEquipacion = '/static/img/jugadores/NI.png';
            }?>
            <img src="<?php echo $rutaEquipacion; ?>" itemprop="logo" style="width:24px; height:28px; margin-right: 2px">
		</td>				
	</tr>
<?php }  ?>
</table>
		</td>
	</tr>
</table>


<?php

foreach ($clubes as $key => $value) {
	$sq='SELECT e.id,e.nombre,e.nombreCorto,e.slug,e.categoria_id,e.codigoRFEF,e.federacion_id,(SELECT count(p.id) from partido p WHERE p.equipoLocal_id=e.id) partidos FROM equipo e WHERE e.club_id='.$value.' ORDER BY categoria_id, codigoRFEF'; 
	$resultadoSQL = mysqli_query($mysqli, $sq);
	$equipos = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC); ?>
	<table width="100%" bgcolor="gainsboro">
        <tr><td>id</td>
            <td align="center">nombre</td>
            <td align="center">nombreCorto</td>
            <td align="center">twitter</td>
            <td>categoria_id</td>
            <td align="center">codigoRFEF</td>
            <td align="center">federacion_id</td>
            <td>partidos</td>
        </tr>
	<form method="post" class="formulario" id="form<?php echo $value; ?>" onsubmit="submitTwitters(event, $(this).serialize(),<?php echo $value?>)">
	<?php foreach ($equipos as $kE => $vE) { 

		$titulo='---';$colorCat="white";
		switch ($vE['categoria_id']) {
			case 1:$titulo='Seniors Masculino';$colorCat="#F9FBC3";break;
			case 2:$titulo='Seniors Femenino';$colorCat="#F9C3FB";break;
			case 3:$titulo='Juveniles Masc.';$colorCat="#B9F99C";break;
			case 4:$titulo='Cadetes Masc.';$colorCat="#9CE7F9";break;
			case 21:$titulo='Infantiles Masc.';$colorCat="#BDCAD7";break;
			case 23:$titulo='Alevines Masc.';$colorCat="#F6B384";break;
			case 26:$titulo='Juveniles Fem.';$colorCat="#EDB1EC";break;
			case 27:$titulo='Cadetes Fem.';$colorCat="#EA8DB8";break;
			case 28:$titulo='Infantiles Fem.';$colorCat="#FB5BA4";break;
			case 30:$titulo='Alevines Fem.';$colorCat="#F36A89";break;

		}




		?>
		<input type="hidden" name="id[]" value="<?php echo $vE['id']; ?>">
		<tr bgcolor="<?php echo $colorCat?>"><td><?php echo $vE['id']; ?></td>
            <td align="center"><input type="text" name="nombre[]" value="<?php echo $vE['nombre']; ?>"></td>
            <td align="center"><input type="text" name="nombreCorto[]" value="<?php echo $vE['nombreCorto']; ?>"></td>
            <td align="center"><input type="text" name="slug[]" value="<?php echo $vE['slug']; ?>" style="text-align: center"></td>            
            <td><?php echo $titulo. '('.$vE['categoria_id'].')'; ?></td>
            <td align="center"><input type="text" name="codigoRFEF[]" value="<?php echo $vE['codigoRFEF']; ?>" style="text-align: center"></td>
            <td align="center"><input type="text" name="federacion_id[]" value="<?php echo $vE['federacion_id']; ?>" style="text-align: center"></td>
            <td><?php echo $vE['partidos']; ?></td>
        </tr>
		
	<?php } ?>

	<tr><td colspan="8" align="center">
		<input type="submit" name="grabar" value="Grabar">
		<div id="mensaje-<?php echo $value?>"></div>
	</td></tr>

	</form>
    </table><hr />      

<?php }


$tiempo_fin = microtime_float();
$tiempo = $tiempo_fin - $tiempo_inicio;
echo '<hr />Tiempo empleado: '.($tiempo_fin - $tiempo_inicio);


$time = time();
echo '<br />La hora actual en el servidor es: '.date('H:i:s', $time);
?>