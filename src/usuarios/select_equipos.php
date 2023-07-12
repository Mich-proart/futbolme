<?php 
define('_FUTBOLME_', 1);
require_once '../consultas.php';
require_once '../funciones.php';
$temporada_id = $_POST['temporada_id'];
$equipos = Xequipos_temporada($temporada_id);



foreach ($equipos as $fila) {
	$rutaEscudo=rutaEscudo($fila['club_id'],$fila['equipo_id']);
    ?> 
<div class="col-xs-12 marconegro">
	<div class="col-xs-2">
	<img src="<?php echo $rutaEscudo?>" style="max-width:35px; max-height:35px" alt="escudo">
	</div>
	<div class="col-xs-10 nopadding">
	<b><?php echo $fila['nombre']; ?> </b>
	
	<button  onclick="anadir_equipo(<?php echo $fila['equipo_id']; ?>)"  class="btn btn-warning btn-fav pull-right" type="button" title="Añadir equipo a MI FUTBOLME"><span class="glyphicon glyphicon-star"></span></button>
	</div>
	
</div>
<?php
} ?>


