<?php 
define('_FUTBOLME_', 1);

require_once '../../src/consultas.php';
require_once '../../src/funciones.php';

if ($_GET['modo']=='borrar'){
	$sq="DELETE FROM partido WHERE temporada_id=".$_GET['temporada_id'];
	$mysqli = conectar();
    mysqli_query($mysqli, $sq);
}

$t=controlTemporadas(); 
?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<link href="/css/bootstrap.min.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/main.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/style.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<noscript><link rel="stylesheet" href="/css/allcss.css?v=<?php echo $static_v; ?>"></noscript>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/js/ajax.js?=<?php echo $static_v; ?>"></script>
</head>

<body>
<table class="table" border="1">
	<tr>
		<td>partidos</td>
		<td>temporada_id</td>
		<td>equipos</td>
		<td>nombre</td>
		<td>comunidad</td>
		<td>categoriaTorneo</td>
		<td>categoria</td>
		<td>visible</td>
		<td>division_id</td>
		<td>apifutbol</td>
		<td>apiRFEFcompeticion</td>
		<td>apiRFEFgrupo</td>
	</tr>

<?php foreach ($t as $key => $value) {
//if ($value['visible']!=4){ continue; } ?>
	<tr bgcolor="white">
		<td><?php echo $value['partidos']?></td>
		<td><?php echo $value['temporada_id']?></td>
		<td><?php echo $value['equipos']?></td>
		<td><?php echo $value['nombre']?></td>
		<td><?php echo $value['comunidad']?></td>
		<td><?php echo $value['categoriaTorneo']?></td>
		<td><?php echo $value['categoria']?></td>
		<td align="center">
			<?php 
			if ($value['visible']<5){
				echo '<a href="?modo=borrar&temporada_id='.$value['temporada_id'].'">'.$value['visible'].'</a>';
			} else { echo $value['visible']; }
			?>
				
			</td>
		<td><?php echo $value['division_id']?></td>
		<td><?php echo $value['apifutbol']?></td>
		<td><?php echo $value['apiRFEFcompeticion']?></td>
		<td><?php echo $value['apiRFEFgrupo']?></td>
		
	</tr>
<?php } ?>
</table>

</body>
</html>