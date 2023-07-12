<?php 
define('_FUTBOLME_', 1);
require_once '../consultas.php';
require_once '../funciones.php';

echo "<hr />";

$id=$_POST['id'];
$e=$_POST['e'];
$j=$_POST['j'];


$partido=Xpartido($id);

$temporada_id=$partido['temporada_id'];

if ((int)$partido['equipoLocal_id']==(int)$e){ $esLocal=1; } else { $esLocal=0; }

$equipoPlantilla = XequipoPlantilla($e);

foreach ($equipoPlantilla as $key => $value) { 
    

if (trim($j)==trim($value['imagen'])) { ?>
<div class="marco clear" style="background-color: orange">

<span onclick="ver_gol(<?php echo $e;?>,<?php echo $id; ?>,<?php echo $value['id']; ?>)" class='iconseparate fa fa-futbol-o' style="cursor:pointer; border: 1px solid black; padding:2px;"></span> 
<span onclick="ver_tarjeta(<?php echo $e;?>,<?php echo $id; ?>,<?php echo $value['id']; ?>)" style='color:orange;background:black;cursor:pointer; border: 1px solid black; padding:2px;' class='iconseparate fa fa-file'></span>

<div style="clear:both;">
<!-- poner gol -->
<div id="<?php echo $e; ?>-gol-<?php echo $id; ?>-<?php echo $value['id']; ?>" style="width:100%; display:none; z-index:1;">
	<form method="post" onsubmit="submitFormGol(event, $(this).serialize(),0)">
		<input type="hidden" name="modo" value="insertar">
		<input type="hidden" name="partido" value="<?php echo $id; ?>">
		<input type="hidden" name="jugador" value="<?php echo $value['id']; ?>">
		<input type="hidden" id="temporada" name="temporada" value="<?php echo $temporada_id; ?>">
		<input type="hidden" name="esLocal" value="<?php echo $esLocal; ?>">
			<?php	
            echo ' Min. <input name="minuto" size="2">';
            $select = ' Gol <select name="tipo">';
            $select .= '<option value="0">jugada</option>';
            $select .= '<option value="1">penalti</option>';
            $select .= '<option value="10">propia puerta</option>';
            $select .= '</select>';
            echo $select;
        ?>
		<input type="submit" name="grabarlocal" value="Grabar">
	</form>
</div>
<!-- poner tarjeta -->
<div id="<?php echo $e; ?>-tar-<?php echo $id; ?>-<?php echo $value['id']; ?>" style="width:100%; display:none; z-index:2;">
	<form method="post" onsubmit="submitFormTarjeta(event, $(this).serialize(),0)">
		<input type="hidden" name="modo" value="insertar">
		<input type="hidden" name="partido" value="<?php echo $id; ?>">
		<input type="hidden" name="jugador" value="<?php echo $value['id']; ?>">
		<input type="hidden" id="temporada" name="temporada" value="<?php echo $temporada_id; ?>">
		<input type="hidden" name="esLocal" value="<?php echo $esLocal; ?>">
			<?php	
            echo ' Min. <input name="minuto" size="2">';
            $select = ' Tarjeta <select name="tipo">';
            $select .= '<option value="0">1ª Amarilla</option>';
            $select .= '<option value="1">2ª Amarilla</option>';
            $select .= '<option value="5">Roja Directa</option>';
            $select .= '</select>';
            echo $select;
        ?>
		<input type="submit" name="grabarlocal" value="Grabar">
	</form>
</div>

<div class="marco"><?php 

$goles = '';
$campos = 'g.id, g.jugador_id, g.minuto, g.tipo, g.esLocal, g.partido_id, j.apodo nombreJugador,g.observaciones ';
$tabla = 'partido p';
$union = ' INNER JOIN gol g ON p.id=g.partido_id';
$union .= ' INNER JOIN jugador j ON j.id=g.jugador_id';
$condicion = ' WHERE p.id='.$id.' AND g.jugador_id='.$value['id'];
$orden = ' ORDER BY g.minuto';
$consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
    //echo $consulta;
$mysqli = conectar();
$resultadoSQL = mysqli_query($mysqli, $consulta);
$resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

foreach ($resultado as $valore) {
    $txt = "<span class='iconseparate fa fa-futbol-o' title='".$valore['tipo']."'></span>";

    $goles .= $valore['nombreJugador'].' '.$valore['minuto'].' '.$txt." <span style='cursor:pointer' onclick='QuitarGol(".$valore['id'].','.$temporada_id.','.$valore['partido_id'].")'>Q</span><br />";
}

echo $goles;

$tarjetas = '';
    $campos = 'g.id, g.jugador_id, g.minuto, g.tipo, g.esLocal, g.partido_id, j.apodo nombreJugador,g.observaciones ';
    $tabla = 'partido p';
    $union = ' INNER JOIN tarjeta g ON p.id=g.partido_id';
    $union .= ' INNER JOIN jugador j ON j.id=g.jugador_id';
    $condicion = ' WHERE p.id='.$id.' AND g.jugador_id='.$value['id'].' AND g.tipo<>2'; //2 es alineacion
    $orden = ' ORDER BY g.minuto';
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
    //echo $consulta;
        $mysqli = conectar(); $txt = '';
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
        foreach ($resultado as $valore) {
            switch ($valore['tipo']) {
                case '0':$txt = '<span class="iconseparate"><img src="/img/ta.png" height="17" style="margin-bottom:3px"></span>'; break;
                case '1':$txt = '<span class="iconseparate"><img src="/img/ta2.png" height="17" style="margin-bottom:3px"></span>'; break;                
                case '5':$txt = '<span class="iconseparate"><img src="/img/tr.png" height="17" style="margin-bottom:3px"></span>'; break;                
            }
            $tarjetas .= $valore['nombreJugador'].' '.$valore['minuto'].' '.$txt.' <b>'.$valore['observaciones']."</b><span style='cursor:pointer' onclick='QuitarTarjeta(".$valore['id'].','.$temporada_id.','.$valore['partido_id'].")'>Q</span><br />";
        }

    echo $tarjetas;
 
?></div>

</div>	

<?php } else { ?>
<div class="marco clear">
<?php } ?>

	<form id="f-<?php echo $value['id']; ?>" method="post" onsubmit="editarApiId(event, $(this).serialize(),<?php echo $value['id']; ?>)">
	<?php $pos = stripos($j,$value['apodo']);
	if ($pos > 0) { ?>
	    <span><?php echo $value['id']?></span>
	    <span><?php echo $value['nombre']?></span>
	    <span><b><?php echo $value['apodo']?></b></span>	    
	<?php } else { ?>
		<span>-------<?php echo $value['id']?></span>
	    <span><?php echo $value['nombre']?></span>
	    <span><?php echo $value['apodo']?></span>
	<?php }	?>
	 
    <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
    <input type="hidden" name="apiName" value="vincularJugador">
    <input type="hidden" name="nombre" value="<?php echo $j; ?>">
    <input type="submit" name="grabar" value="*">
    </form>
    <div id="ver-alineacion-<?php echo $value['id']; ?>"></div>
</div>
<?php }

?>
