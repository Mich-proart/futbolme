<?php
define('_PANEL_', 1);
require_once 'includes/config.php';
require_once 'includes/head.php'; ?>
</head>
<body style="background-color: lavender; padding: 10px">
	<?php $link = conectar();?>
	<form  onsubmit="buscarJugador(event, $(this).serialize())">
        <table class="table">
		<tr>
            <td>Por id: <input type='text' name='jugador_id' size='4' value='0'></td>
			<td>Por nombre: <input type='text' name='jugador_nombre' size='15'></td>
			<td>Por lugar de nacimiento: <input type='text' name='jugador_lugar' size='15'></td>				  
			<td><input type='submit' name='buscar' value='buscar'> Jugadores que sus equipos esten en alguna LIGA</td>
		</tr>
	</table>
    </form>
    <div id="buscar-jugador"></div>

    
	<?php
    
        $color = 'white';
        $campos = 'te.id, te.torneo_id, te.nombre, te.id_original, tor.tipo_torneo, tor.visible, tor.categoria_torneo_id, p.nombre pais, 
		(SELECT count(id) FROM partido WHERE temporada_id=te.id) partidos, 
		(SELECT count(temporada_id) FROM temporada_equipo WHERE temporada_id=te.id) equipos'
        ;
        $tabla = 'temporada te';
        $union = ' INNER JOIN torneo tor ON te.torneo_id=tor.id';
        $union .= ' INNER JOIN pais p ON tor.pais_id=p.id';
        $condicion = ' WHERE visible>4 AND (tor.categoria_torneo_id<5 OR tor.categoria_torneo_id=9 OR tor.categoria_torneo_id=7)';
        $orden = ' ORDER BY tor.categoria_torneo_id, tor.orden';
        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden; ?>
	<div style="float:left; width:100%">
		<div style="float:left; width:35%; background-color: lavender; height: 700px; overflow: auto;">				
			<table class="table" style="background-color: lavender">
				<tr style="background-color: gainsboro"><td>ID</td>
					<td style="width: 400px">Nombre</td>
					<td>Pais</td>
					<td>Vis</td>
					<td>Pdos</td>
					<td>Equ</td>				
				</tr>
				<?php
                $resultado = mysqli_query($link, $consulta);
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    if (isset($_GET['temporada_id'])) {
                        if ($_GET['temporada_id'] != $fila['id']) {
                            $color = 'white';
                        } else {
                            $color = 'yellow';
                        }
                    } ?>
				<tr style="background-color: lavender">
					<td style="font-size:12px; height:20px;">
						<a onclick="buscarJugadorTemporada(<?php echo $fila['id']; ?>)" style="cursor:pointer;">
							<?php echo $fila['id']; ?>
						</a>
					</td>
					<td style="font-size:12px"><?php echo $fila['nombre']; ?></td>
					<td style="font-size:12px"><?php echo $fila['pais']; ?><br />
						Cat. <?php echo $fila['categoria_torneo_id']; ?> - TT <?php echo $fila['tipo_torneo']; ?>
						
					</td>
					<td style="font-size:12px"><?php echo $fila['visible']; ?></td>
					<td style="font-size:12px"><?php echo $fila['partidos']; ?></td>
					<td style="font-size:12px"><?php echo $fila['equipos']; ?></td>
				</tr>
				<?php
                }
                $color = 'white'; ?>
			</table>

		</div>
        <div style="float:left; width:65%" id="buscar-jugador-temporada"></div>
        <div style="float:left; width:65%" id="buscar-jugador-plantilla"></div>
	</div>

</body>
</html>
