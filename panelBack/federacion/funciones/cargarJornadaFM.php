<?php
$static_v = 1; 
define('_FUTBOLME_', 1);

require_once '../consultas.php';
require_once '../funciones.php';


$temporada_id=$_POST['temporada_id'];
$jornada=$_POST['jornada'];

$partidos=calendarioFM($temporada_id,$jornada); ?>

<table border="1" bgcolor="dimgray">
	<tr bgcolor="gainsboro">
		<td align="center">id</td>
		<td align="center">estado</td>
		<td align="center">Jda</td>
		<td align="center">Fecha</td>
		<td align="center">Hora</td>
		<td align="center">local</td>
		<td align="center">resultado</td>
		<td align="center">visitante</td>
	</tr>
<?php 

foreach ($partidos as $key => $value) { ?>
	<tr bgcolor="white">
		<td align="center"><?php echo $value['id']?></td>
		<td align="center"><?php echo $value['estado_partido']?></td>
		<td align="center"><?php echo $value['jornada']?></td>	
		<td align="center"><?php echo $value['fecha']?></td>	
		<td align="center"><?php echo $value['hora_prevista']?></td>		
		<td align="center"><?php echo $value['local']?></td>
		<td align="center"><?php echo $value['goles_local']?> - <?php echo $value['goles_visitante']?></td>
		<td align="center"><?php echo $value['visitante']?></td>
	</tr>
<?php 
}

echo '</table>';


?>

