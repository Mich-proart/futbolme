<meta charset="utf-8">
<?php
define('_FUTBOLME_', 1);
require_once '../consultas.php';

if (isset($_POST['modo'])) {
	$temporada_id=$_POST['temporada_id'];
	$api_id=$_POST['api_id'];
	$fecha=$_POST['fecha'];
	$hora_prevista=$_POST['hora_prevista'];
	$fase_id=$_POST['fase_id'];
	$betsapi_id=$_POST['betsapi_id'];
	$equipoLocal_id=$_POST['equipoLocal_id'];
	$equipoVisitante_id=$_POST['equipoVisitante_id'];

	if(!is_numeric($equipoLocal_id)) { echo "El id local no es válido"; die; }
	if(!is_numeric($equipoVisitante_id)) { echo "El id visitante no es válido"; die; }

	$mysqli = conectar();

        $consulta = 'INSERT INTO partido (temporada_id,fecha,hora_prevista,jornada,equipoLocal_id, equipoVisitante_id, betsapi)
                    VALUES ('.$temporada_id.', 
                     "'.$fecha.'", 
                     "'.$hora_prevista.'",
                     "'.$fase_id.'", 
                     '.$equipoLocal_id.', 
                     '.$equipoVisitante_id.',                     
                     '.$betsapi_id.')';
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        header('Location:/panelBack/partidosProximos.php?id='.$api_id.'&temporada_id='.$temporada_id);

    die();



} else {

$api_id=$_POST['api_id'];
$betsapi_id=$_POST['id'];
$local_idB=$_POST['local_id'];
$visitante_idB=$_POST['visitante_id'];
$temporada_id=$_POST['temporada_id'];
$hora=$_POST['hora'];
$pais_l=$_POST['pais_l'];
$pais_v=$_POST['pais_v'];

$resultado=Xfases_jornadas($temporada_id);


$idL=buscarEquipoBetsapi($local_idB);
$idV=buscarEquipoBetsapi($visitante_idB);

$local_id=$idL['id'];$local=$idL['nombreCorto'];
$visitante_id=$idV['id'];$visitante=$idV['nombreCorto'];




?>
<div style="background-color: white; padding:10px">	
<form method="POST" action="/src/funciones/insertarPartidoBetsapi.php">
Temporada id: <?php echo $temporada_id?>
    <input type="hidden" name="temporada_id" value="<?php echo $temporada_id?>">
    <input type="hidden" name="modo" value="grabar">
	<input type="hidden" name="betsapi_id" value="<?php echo $betsapi_id?>">
	<input type="hidden" name="api_id" value="<?php echo $api_id?>">
	<input type="hidden" name="fecha" value="<?php echo date('Y-m-d',$hora)?>">
	<input type="hidden" name="hora_prevista" value="<?php echo date('H:i:s',$hora)?>">
	
Fase: <select name="fase_id">
		<?php foreach ($resultado as $fila) { 

			if ($fila['fase_id']==$fila['jornadaActiva']){ $s="selected"; } else $s="";
			?>
			<option value="<?php echo $fila['fase_id']?>" <?php echo $s?>>
				<?php echo $fila['fase_id']?> - <?php echo $fila['nombre']?></option>
		<?php } ?>
	</select>
	<br />
	<input type="hidden" name="equipoLocal_id" value="<?php echo $local_id?>" size="6">
	<input type="hidden" name="equipoVisitante_id" value="<?php echo $visitante_id?>" size="6">
	<br /><?php echo $local?> - <?php echo $visitante?> 
	<br />Fecha: <?php echo date('Y-m-d',$hora)?> Hora: <?php echo date('H:i:s',$hora)?>

	<?php
	echo "<br />Betsapi: Id Local: ".$local_idB;
	echo "<br />Betsapi: Id visit: ".$visitante_idB;
	echo "<br />Futbolme: Id Local: ".$local_id;
	echo "<br />Futbolme: Id visit: ".$visitante_id;
	echo "<br />Betsapi: Id partido: ".$betsapi_id;
	
	if ($local_id>0 && $visitante_id>0){$partido=XpartidoVincular($temporada_id,$local_id,$visitante_id);}


	if (isset($partido)) {
	echo "<br />Futbolme: Id partido: ".$partido['id'];	
		vincularPartido($partido['id'],$betsapi_id);
        echo "<br />Partido vinculado ";
	} else { 

		echo "<br />No hemos encontrado el partido en futbolme.com"; 
			if ($local_id>0 && $visitante_id>0){ ?>
				<input type="submit" name="grabar" value="grabar">

	<?php 	} else {

				echo "<br />Para grabar el partido hacen falta los ids de los equipos.";

			}	
	}?>




	
</form>
</div>

	<?php /*if ($ahora=='no') { ?>
	<div style="width:100%; float:left">
		<table cellpadding="0"; cellspacing="0">
			<tr><td width="51%">	
		    	<?php 
		    	$pais=buscarPaisBetsapi($pais_l);
		    	$idPais=$pais['id'];
		    	$nombrePais=$pais['nombre'];
		    	echo '<h4>'.$nombrePais.'</h4>';
		    	$resultado=listarEquiposPais($idPais);
		    	include '../../includes/diseny/formBetsapiTwitter.php'; ?>
			    </td>
		    	<td width="49%">
		    	<?php 
		    	$pais=buscarPaisBetsapi($pais_v);
		    	$idPais=$pais['id'];
		    	$nombrePais=$pais['nombre'];
		    	echo '<h4>'.$nombrePais.'</h4>';
		    	$resultado=listarEquiposPais($idPais);
		    	include '../../includes/diseny/formBetsapiTwitter.php'; ?>
		    </td></tr>
		</table>
	</div>
	<?php } */?>	
<?php } ?>

