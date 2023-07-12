<?php
define('_FUTBOLME_', 1);

require_once '../../src/consultas.php';
require_once 'consultasClub.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('location:index.php');
}
$estadio = obtenerDatosEstadio($id);
$localidades = obtenerLocalidades();
$imagen = __DIR__."\..\..\img\\estadios\\estadio".$id.'.png';

?>

<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!DOCTYPE html>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maps.googleapis.com/maps/api/js"></script>
	<link rel="STYLESHEET" type="text/css" href="../scripts/estilos.css?v2">
	<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-beta.3/js/select2.min.js"></script>
	<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-beta.3/css/select2.min.css" rel="stylesheet" />
	<title>Editar estadio <?php echo $estadio['nombre']; ?></title>
</head>
<body>
<div>
<a href="/panelBack/club">Principal</a> - 
</div>
	<h1><?php echo $estadio['nombre']; ?></h1>		
	<form action="guardarEstadio.php" method="POST">
		<div style="width:49%; display:inline-block; vertical-align:top;">
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" id="nombre" value="<?php echo $estadio['nombre']; ?>">
		</div>
		<div style="width:49%; display:inline-block; vertical-align:top;">
			<label for="inaguracion">Inauguración</label>
			<input type="text" name="inaguracion" id="inaguracion" value="<?php echo $estadio['inaguracion']; ?>">
		</div>
		<div style="width:49%; display:inline-block; vertical-align:top;">
			<label for="capacidad">Capacidad</label>
			<input type="text" name="capacidad" id="capacidad" value="<?php echo $estadio['capacidad']; ?>">
		</div>
		<div style="width:49%; display:inline-block; vertical-align:top;">
			<label for="direccion">Dirección</label>
			<input type="text" name="direccion" id="direccion" value="<?php echo $estadio['direccion']; ?>">
		</div>
		<div style="width:49%; display:inline-block; vertical-align:top;">
			<label for="localidad_id">Localidad</label>
			<select name="localidad_id" id="localidad_id">
			<?php foreach ($localidades as $localidad) {
    ?>
			<option <?php if ($estadio['localidad_id'] == $localidad['id']) {
        ?> selected <?php
    } ?> value="<?php echo $localidad['id']; ?>"><?php echo $localidad['nombre']; ?></option>
			<?php
} ?>						
		</select>
		</div>
		<div style="width:49%; display:inline-block; vertical-align:top;">
			<label for="longitud">Longitud</label>
			<input type="text" name="longitud" id="longitud" value="<?php echo $estadio['longitud']; ?>">
		</div>

		<div style="width:49%; display:inline-block; vertical-align:top;">
			<label for="latitud">Latitud</label>
			<input type="text" name="latitud" id="latitud" value="<?php echo $estadio['latitud']; ?>">
		</div>
		<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
		<input type="submit" name="guardar" id="guardar" value="Guardar">
	</form>
	<div style="width:49%; display:inline-block; vertical-align:top;">
		<?php if (file_exists($imagen)) {
        ?>
		<img src="/img/estadios/estadio<?php echo $id; ?>.png" alt="campo de futbol">
		<a href="deleteFile.php?ruta=<?php echo $imagen; ?>">Eliminar</a>
		<?php
    } else {
        ?>
		<form action="upload.php" method="post" enctype="multipart/form-data">
		    Subir imagen:
		    <input type="file" name="imagen" id="imagen">
		    <input type="hidden" name="destino" id="destino" value="\img\estadios\">
		    <input type="hidden" name="nombre" id="nombre" value="estadio<?php echo $id; ?>.png">
		    <input type="submit" value="Subir imagen" name="submit">
		</form>
		<?php
    } ?>
	</div>
	<div style="width:49%; display:inline-block; vertical-align:top;">
		<div id="googleMap" style="width:500px;height:380px;"></div>
	</div>
	<script>
		$('#localidad_id').select2();
	</script>
	<script>
		var myCenter = new google.maps.LatLng(<?php echo $estadio['latitud']; ?>, <?php echo $estadio['longitud']; ?>);
		function initialize() {
			var mapProp = {
				center:myCenter,
				zoom:16,
				mapTypeId:google.maps.MapTypeId.ROADMAP,
				panControl:false,
				zoomControl:true,
				zoomControlOptions: {
					style:google.maps.ZoomControlStyle.SMALL
				},
				mapTypeControl:false,
				scaleControl:false,
				streetViewControl:true,
				overviewMapControl:false,
				rotateControl:false, 
			};
			var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
			var marker=new google.maps.Marker({
				position:myCenter,
				animation:google.maps.Animation.DROP,
				icon:'/img/estadio.png'
			});
			marker.setMap(map);
			var infowindow = new google.maps.InfoWindow({
				content:"<?php echo $estadio['nombre']; ?><br /><?php echo $estadio['direccion']; ?>"
			});	

			google.maps.event.addListener(marker,'click',function() {
				infowindow.open(map,marker);
			});	
			google.maps.event.addListener(map,'center_changed',function() {
				window.setTimeout(function() {
					map.panTo(marker.getPosition());
				},5000);
			});
		}	
		google.maps.event.addDomListener(window, 'load', initialize);
	</script>
</body>
</html>