<?php 
define('_FUTBOLME_', 1);

require_once '../../src/consultas.php';

$mysqli=conectar();

if (isset($_POST['usuario'])) { 

$sql='SELECT id FROM resultado WHERE partido_id='.$_POST['partido_id'].' AND goles_local='.$_POST['goles_local'].' AND goles_visitante='.$_POST['goles_visitante'].' AND usuario="'.$_POST['usuario'].'"';
//echo $sql;
$resultadoSQL = mysqli_query($mysqli, $sql);
$r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
if (count($r)==0){
	$sql='INSERT INTO resultado (partido_id, goles_local, goles_visitante, usuario, puntos) VALUES 
	("'.$_POST['partido_id'].'", "'.$_POST['goles_local'].'", "'.$_POST['goles_visitante'].'", "'.$_POST['usuario'].'",0)';
	//echo $sql;
	mysqli_query($mysqli, $sql);
} else { echo 'Ya hemos recibido tu resultado. En breve lo publicaremos. Muchas gracias'; die;}


?>

	<table style="width: 100%" bgcolor="orange">

	<tr>
		<td style="width:50px; text-align: right; font-size: 16px"><?php echo $_POST['goles_local']?></td>
		<td style="width:50px; text-align: center">-</td>
		<td style="width:50px; text-align: left; font-size: 16px"><?php echo $_POST['goles_visitante']?></td>
	</tr>
	<tr><td colspan="3" align="center"><br />Este es el resultado que nos has enviado. Muchas gracias por tu colaboración. En breves minutos lo actualizaremos.</td></tr>
	</table>

<?php } ?>
