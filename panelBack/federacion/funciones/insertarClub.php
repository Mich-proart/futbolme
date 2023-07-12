<?php

define('_FUTBOLME_', 1);

require_once '../consultas.php';
require_once '../funciones.php';?>

<?php 
$club_id=$_POST['id'];
$comunidad_id=$_POST['comunidad_id'];
$categoria_id=$_POST['categoria_id'];

include('urlFederaciones.php');

$mysqli = conectar();
$mysqliFM = conectarFM();


$sql='SELECT id, id_futbolme, nombre, federacion_id, federacion_ref, comunidad_id, localidad FROM club WHERE id='.$club_id;
//echo $sql.'<br />';
$resultadoSQL = mysqli_query($mysqli, $sql);
$v = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
//imp($v);
$equipo=$v['nombre'];
$equipo = ucwords(strtolower($equipo));

$codigo=$v['federacion_ref'];$largo=strlen($codigo);
  switch ($largo) {
    case 1: $codigo='0000'.$codigo;break;
    case 2: $codigo='000'.$codigo;break;
    case 3: $codigo='00'.$codigo;break;
    case 4: $codigo='0'.$codigo;break;
  }


$sql='SELECT l.id,l.nombre, p.nombre provincia  FROM localidad l
INNER JOIN provincia p ON l.provincia_id=p.id
WHERE l.nombre LIKE "%'.$v['localidad'].'%" AND p.comunidad_id='.($comunidad_id+1);
$resultadoSQL = mysqli_query($mysqliFM, $sql);
$l = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);

$sql='SELECT l.id,l.nombre, p.nombre provincia  FROM localidad l
INNER JOIN provincia p ON l.provincia_id=p.id
WHERE p.comunidad_id='.($comunidad_id+1).' ORDER BY nombre';
$resultadoSQL = mysqli_query($mysqliFM, $sql);
$localidades = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

$sql='SELECT id, nombre, federacion_club_id, federacion_eq_id,futbolme_id FROM equipo WHERE futbolme_id=0 AND federacion_club_id='.$v['federacion_id'];
//echo $sql;
$resultadoSQL = mysqli_query($mysqli, $sql);
$e = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

//echo 'Equipos: '.$v['equipos'].'<br />';
?>
<form method="post" id="clubyequipo" onsubmit="submitInsertarClub(event, $(this).serialize(),<?php echo $club_id?>)">
  <table width="100%">
	<tr><td width="50%" align="right">
		<input type="hidden" name="futbolbase_id" value="<?php echo $v['id']?>">
		Localidad: <b><?php echo $v['localidad']?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
		<select name="localidad_id" size="10" required>
		<?php if (count($l)>0) { ?>
		<option value="<?php echo $l['id']?>" selected><?php echo $l['id']?> - <?php echo $l['nombre']?> - <?php echo $l['provincia']?></option>
		<?php } ?>
		<?php foreach ($localidades as $key => $vl) { ?>
			<option value="<?php echo $vl['id']?>"><?php echo $vl['id']?> - <?php echo $vl['nombre']?> - <?php echo $vl['provincia']?></option>
		<?php } ?>
		</select>
	</td>
	<td width="50%">

		CLUB:&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" size="30" name="nombreC" value="<?php echo $equipo?>">
		<input type="hidden" name="nombre_completo" value="<?php echo $equipo?>">
		<br />Código RFEF<input type="text" size="5" name="codigoRFEF" value="<?php echo $codigo?>">
		Territorial: <input type="text" size="2" name="territorialRFEF" value="<?php echo $territorial?>">
		Categoría Equipo: <input type="text" size="2" name="categoria_id" value="<?php echo $categoria_id?>"><br />
		EQUIPO: <input type="text" size="30" name="nombreE" value="<?php echo str_replace('.', '', $equipo)?>">
		<hr />
		
		<select name="equipo" size="3" required>
		<?php foreach ($e as $key => $vv) { ?>
			<option value="<?php echo $vv['id']?>,<?php echo $vv['federacion_eq_id']?>"><?php echo $vv['id']?> - <?php echo $vv['nombre']?> - <?php echo $vv['futbolme_id']?></option>
		<?php } ?>
		</select>
		<input type="submit" name="insertar" value="insertar club">
	</td></tr>
</table>
</form>
<?php

die;
