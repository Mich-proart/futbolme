<?php 
define('_PANEL_', 1);
require_once '../../includes/config.php'; 
require_once '../../includes/head.php';
?>
</head>
<body style="background-color: lavender; padding: 10px">

<div style="float:left; width:100%; z-index:1000">	


<?php
$link=conectar();

    $camposT = 'te.id, te.torneo_id, te.nombre, te.id_original, tor.visible, tor.apuesta, lig.jornadas, lig.jornadaActiva, tor.comunidad_id, tor.apiRFEFgrupo';
    $tablaT = 'temporada te';
    $unionT = ' INNER JOIN torneo tor ON te.torneo_id=tor.id';
    $union2T = ' INNER JOIN liga lig ON lig.id=tor.id';
    $condicionT = ' WHERE te.id='.$_POST['temporada_id'];
    $consultaT = 'SELECT '.$camposT.' FROM '.$tablaT.$unionT.$union2T.$condicionT;

    


    $resultado = mysqli_query($link, $consultaT);

    

    while ($fila = mysqli_fetch_assoc($resultado)) {
        $torneo_id = $fila['torneo_id'];
        $nombreTorneo = $fila['nombre'];
        $jornadas = $fila['jornadas'];
        $activa = $fila['jornadaActiva'];
        $foro = 0;
        $apuesta = $fila['apuesta'];
        $visible = $fila['visible'];
        $comunidad_id = ($fila['comunidad_id']-1);
        $grupo_id = $fila['apiRFEFgrupo'];
    }

    $campos = "e.id, e.nombre, e.club_id, e.slug, e.equipacion_id, e.debut_nacional, e.nombreAPI, (select futbolbase_id from club where id=e.club_id) futbolbase, e.federacion_id, 
	(SELECT concat_ws(' ,', camiseta, pantalon, media) FROM equipacion WHERE equipacion.id=e.equipacion_id) equipacionN";
    $tabla = 'equipo e';
    $union = ' INNER JOIN temporada_equipo te ON te.equipo_id=e.id';
    $condicion = ' WHERE te.temporada_id='.$_POST['temporada_id'];
    $orden = ' ORDER BY e.nombre';
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden; ?>


<table class="table">
<tr>
<td>ID</td>				
<td>Nombre</td>	
<td>Equipación</td>			  
</tr>

		<?php
        $resultado = mysqli_query($link, $consulta);
    $color = 'white';
    $cadenaSlug = '';
    while ($fila = mysqli_fetch_assoc($resultado)) {
        if (isset($_GET['equipo_id'])) {
            if ($_GET['equipo_id'] != $fila['id']) {
                $color = 'white';
            } else {
                $color = 'yellow';
            }
        }
        $cadenaSlug .= $fila['slug'].' OR '; ?>
<tr bgcolor="<?php echo $color; ?>">
<td>
	<a onclick="buscarJugadorPlantilla(<?php echo $fila['id']; ?>,<?php echo $_POST['temporada_id']; ?>)" style="cursor:pointer;">
		<?php echo $fila['id']; ?>
	</a>
</td>



<td><div id="alerta-<?php echo $fila['id']; ?>"></div><?php echo $fila['nombre']; ?>

<form id="bjt-<?php echo $fila['id']; ?>" method="post" onsubmit="grabarTwitter(event, $(this).serialize(),<?php echo $fila['id']; ?>)">
<input type="hidden" name="equipo_id" value="<?php echo $fila['id']; ?>">
<input type="text" name="slug" size="10" value="<?php echo $fila['slug']?>">    
<input type="submit" name="grabar" value="@">
</form>


 - <a onclick="jugadorClub(<?php echo $fila['club_id']?>)" style="cursor:pointer;">Club (<?php echo $fila['club_id']?>)</a></td>

<td><?php echo $fila['equipacion_id']; ?></td>
</tr>
<tr><td colspan="4"><div id='buscar-jugador-plantilla-<?php echo $fila['id']?>' class="jugador"></div></td></tr>
<?php } ?>
<tr><td colspan="4">
    <div id="cadenaTW">
    <?php echo $cadenaSlug; ?>
    </div>
</td></tr>

</table>

</div>


</body>
</html>