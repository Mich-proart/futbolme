<?php
define('_PANEL_', 1);
require_once '../includes/config.php'; //include funciones,consultas, post y fechas
require_once '../includes/head.php';



$p = $_POST['pais_id'];

$p=explode('-',$p);

$pais_id=$p[0]??60;
$comunidad_id = $p[1]??2;
$localidad_id = $p[2]??0;
    


$datosClub = datosClub($pais_id, $comunidad_id, $localidad_id);

$localidades=listarLocalidades($comunidad_id);
?>

<div class="table-responsive whitebox">
	<div style="float:left; width:100%; background-color:orange">
					<form onsubmit="crearClub(event, $(this).serialize())">
					<input type="hidden" name="pais_id" value="<?php echo $pais_id; ?>">
					Comunidad <input type="text" name="comunidad_id" value="0" size="2">
					Provincia <input type="text" name="provincia_id" value="0" size="2">
					Localidad <input type="text" name="localidad_id" value="1" size="2">
					
					Nombre: <input type="text" name="nombre" size="15">
					Categoría: <select name="categoria_id">
					<option value="1">Senior Masculino</option>
					<option value="2">Senior Femenino</option>
					<option value="3">Juvenil</option>
					<option value="4">Cadete</option>
					<option value="21">Infantil</option>
					</select>
					Club/Región: <select name="es_seleccion">
					<option value="0" selected>Club</option>
					<option value="2">Region</option>
					</select>
					Completo <input type="text" name="nombre_completo" size="20">
					
					<input type="submit" name="grabar" value="grabar club y equipo nuevo.">
					</form>
					</div>
<table  class="table">
	
	    <tr class="darkgreenbox">
	    	<td>
	    		<select id="selector-paises" name="temporada" onchange="cargarClubes(this.value)">
				<option value="0">Localidades</option>
				<?php foreach ($localidades as $value) { ?>
				<option value="<?php echo $pais_id?>-<?php echo $comunidad_id?>-<?php echo $value['id']?>"><?php echo $value['provincia']?> - <?php echo $value['nombre']?> (<?php echo $value['equipos']?>) id:<?php echo $value['id']?></option>
				<?php } ?>
				</select>
	    	</td>
			<td>localidad</td>
			<td>nombre</td>
			<td>fund/desap/selec</td>
			<td>presi/socios/patro</td>
			<td>presu/contac/email</td>
			<td>telefono</td>			
		</tr>
		<tr><td colspan="8"><div id="club-id"></div></td></tr>
	
	<?php	foreach ($datosClub as $key => $final) {
    ?>
			

<tr bgcolor="white">
<td style="padding:5px;">
<?php echo $final['id']; ?> - 
<span style="cursor: pointer;" class="boldfont" onclick="verClub(<?php echo $final['id']; ?>)"><?php echo $final['nombre_completo']?></span>  - Equipos: <?php echo $final['equipos']; ?>; 
<?php

/*$f = 'datos/'.$final['id'].'_datos.json';
if (@file_exists($f)) { ?>
	<a href="#" onclick="cargar_equipos(<?php echo $final['id']?>)">cargar equipos</a>
<?php } */



?>
<div id="carga-equipos-<?php echo $final['id']?>"></div>
</td>
<td style="padding:5px;"><?php echo $final['nombre_localidad']; ?></td>
<td style="padding:5px;">
Fundado: <?php echo $final['fundado']; ?>
<br />Desaparecido: <?php echo $final['desaparecido']; ?>
<br />Selección: <?php echo $final['es_seleccion']; ?>
</td>
<td style="padding:5px;">
Presidente: <?php echo $final['presidente']; ?>
<br />Socios: <?php echo $final['socios']; ?>
<br />Patrocindador: <?php echo $final['patrocinador']; ?>
<br />Obs: <?php echo $final['observaciones']; ?>
</td>
<td style="padding:5px;">
Presupuesto: <?php echo $final['presupuesto']; ?>
<br />Telefono: <?php echo $final['telefono']; ?>

</td>
<td style="padding:5px;">
Web: <?php echo $final['web']; ?>
<br />Dirección: <?php echo $final['direccion']; ?>
<br />Contacto: <?php echo $final['contacto']; ?>
<br />E-mail: <?php echo $final['email']; ?>

</td>
	
</tr>
	<?php
} ?>
	
 </table>
</div>