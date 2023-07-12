<?php 
define('_FUTBOLME_', 1);
require_once '../../consultas.php';
$mysqli = conectar();

//id, partidoAPI, arbitro_id, fase_id, tipo_partido, acta, apuesta, hora_real, id_original, usuario_id, combinacionLocal, combinacionVisitante, comentario, estadio, youtube_id

$sql="SELECT jornada, grupo_id, estado_partido, fecha, hora_prevista, equipoLocal_id, (SELECT nombre FROM equipo WHERE id=equipoLocal_id) local, goles_local, goles_visitante, equipoVisitante_id,  (SELECT nombre FROM equipo WHERE id=equipoVisitante_id) visitante, clasificado, observaciones, temporada_id  FROM partido WHERE id=".$_POST['id'];


    $resultadoSQL = mysqli_query($mysqli, $sql);
    $r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);

?>
<div style="background-color: #D4EFDF; padding:5px; text-align: center">
<form method="post" onsubmit="submitEditarPartido(event, $(this).serialize(),<?php echo $_POST['id']?>)">
<input type="hidden" name="partido_id" value="<?php echo $_POST['id']?>">

<br />jornada:<input type="text" name="jornada" value="<?php echo $r['jornada']?>" size="1">
- grupo_id:<input type="text" name="grupo_id" value="<?php echo $r['grupo_id']?>" size="1">
- estado:<input type="text" name="estado_partido" value="<?php echo $r['estado_partido']?>" size="1">
<br />fecha:<input type="text" name="fecha" value="<?php echo $r['fecha']?>" size="9">
- hora:<input type="text" name="hora_prevista" value="<?php echo $r['hora_prevista']?>" size="9">
<br /><input type="hidden" name="equipoLocal_id" value="<?php echo $r['equipoLocal_id']?>" size="2">
<b><?php echo $r['local']?></b> 
<input type="text" name="goles_local" value="<?php echo $r['goles_local']?>" size="1" style="text-align: center;">
-<input type="text" name="goles_visitante" value="<?php echo $r['goles_visitante']?>" size="1"  style="text-align: center;">
<b><?php echo $r['visitante']?></b> <input type="hidden" name="equipoVisitante_id" value="<?php echo $r['equipoVisitante_id']?>" size="2">
<br />clasificado:<input type="text" name="clasificado" value="<?php echo $r['clasificado']?>" size="1">
- observaciones:<input type="text" name="observaciones" value="<?php echo $r['observaciones']?>" size="20">
- <input type="submit" name="modificar" value="modificar">
</form>
</div>
