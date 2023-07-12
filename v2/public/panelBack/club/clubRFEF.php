<?php
define('_PANEL_', 1);
require_once '../includes/config.php'; 
require_once '../includes/head.php'; 

$codigoRFEF = $_POST['codigoRFEF'];

$sql = 'SELECT e.id, e.nombre, e.codigoRFEF, e.federacion_id, e.club_id, c.nombre club, c.territorialRFEF, co.nombre comunidad, co.web_federacion
FROM equipo e 
INNER JOIN club c ON e.club_id=c.id 
INNER JOIN comunidad co ON c.territorialRFEF=co.codigoRFEF
WHERE c.codigoRFEF="'.$_POST['codigoRFEF'].'"';
//echo $sql;
$resultadoSQL = mysqli_query($mysqli, $sql);
$r = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

if (empty($r)){ 
	echo '<h3>No se han encontrado resultados</h3>';
} else { ?>
	<h3>Resultados con la búsqueda <?php echo $_POST['codigoRFEF']?></h3>

	<div id="club-id"></div>
	<table class="table">
		<tr>
			<td>Club</td>
			<td>Equipo</td>
			<td>Categoria</td>
			<td>Territorial</td>
		</tr>

	<?php foreach ($r as $k => $v) {?>

		<tr>
			<td>




				<?php echo $v['club']?> (<span style="cursor: pointer;" class="boldfont" onclick="verClub(<?php echo $v['club_id']?>)"><?php echo $v['club_id']?></span>)</td>
			<td><?php echo $v['nombre']?> (<?php echo $v['id']?>)</td>
			<td><?php echo $v['codigoRFEF']?></td>
			<td><a href="<?php echo $v['web_federacion']?>" target="_blank"><?php echo $v['comunidad']?></a> (<?php echo $v['territorialRFEF']?>)</td>
		</tr>

		
	<?php }?>

	</table>
<?php }