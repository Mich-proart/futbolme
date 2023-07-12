<?php 
define('_FUTBOLME_', 1);
require_once '../../consultas.php';
$mysqli = conectar();

//id, partidoAPI, arbitro_id, fase_id, tipo_partido, acta, apuesta, hora_real, id_original, usuario_id, combinacionLocal, combinacionVisitante, comentario, estadio, youtube_id

$sql="SELECT id,apodo,nombre,dorsal FROM jugador WHERE id=".$_POST['id'];


    $resultadoSQL = mysqli_query($mysqli, $sql);
    $r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);

?>
<div style="background-color: #D4EFDF; padding:5px; text-align: center">
<form method="post" onsubmit="submitEditarJugador(event, $(this).serialize(),<?php echo $_POST['id']?>)">
<input type="hidden" name="jugador_id" value="<?php echo $_POST['id']?>">
<br />id: <?php echo $r['id']?><br />
- nombre:<input type="text" name="nombre" value="<?php echo $r['nombre']?>"><br />
- apodo :<input type="text" name="apodo" value="<?php echo $r['apodo']?>"><br />
- dorsal :<input type="text" name="dorsal" value="<?php echo $r['dorsal']?>" size="2">
- <input type="submit" name="boton" value="modificar">
</form>
</div>
