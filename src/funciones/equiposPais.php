<?php
define('_FUTBOLME_', 1);
require_once '../consultas.php';
$id=$_POST['id'];
$equipos=listarEquiposPais($id);
echo '<h4>EQUIPOS</h4><table width="100%" cellspacing="2" cellpadding="5" bgcolor="gainsboro">';
foreach ($equipos as $key => $value) {
	echo '<tr bgcolor="white">
	<td>'.$value['id'].'</td>
	<td>'.$value['categoria'].'</td>
	<td>'.$value['nombreCorto'].'</td>
	<td>
	<form id="f-'.$value['id'].'" method="post" onsubmit="grabarTwitter(event, $(this).serialize(),'.$value['id'].')">
    <input type="hidden" name="equipo_id" value="'.$value['id'].'">
    <input type="text" name="betsapi" size="3" value="'.$value['betsapi'].'">
    <input type="text" name="slug" size="15" value="'.$value['slug'].'">    
    <input type="submit" name="grabar" value="@">
    </form>
    <div id="alerta-'.$value['id'].'"></div></td>
	<td>'.$value['pais'].'</td>
	</tr>';
}
echo '</table>';
?>
