<?php
require_once '../consultas.php';

$mysqli = conectar();

if (!isset($_GET['temporada_id'])) {
    $temporada_id = $_POST['temporada_id'];
} else {
    $temporada_id = $_GET['temporada_id'];
}

    if (isset($_GET['modo'])) {
        if ('insertar_equipo' == $_GET['modo']) {
            $consulta = '	
			INSERT INTO temporada_equipo (temporada_id,equipo_id)
			VALUES 
			('.$_GET['temporada_id'].', '.$_GET['equipo_id'].')									
		    ';

            $consulta = mysqli_query($mysqli, $consulta);
            echo 'ok';
            die;
        }

        if ('quitar_equipo' == $_GET['modo']) {
            $consulta = '	
			DELETE FROM temporada_equipo WHERE 
			temporada_id='.$_GET['temporada_id'].' AND equipo_id='.$_GET['equipo_id'];

            $consulta = mysqli_query($mysqli, $consulta);
            echo 'ok';
            die;
        }
    }

$campos = 't.id, t.torneo_id, t.nombre, t.id_original,
(SELECT nombre FROM torneo WHERE id=t.torneo_id) nombre_torneo,
(SELECT categoria_id FROM torneo WHERE id=t.torneo_id) categoria_id, 
(SELECT nombre FROM categoria WHERE id=categoria_id) nombre_categoria, 
(SELECT pais_id FROM torneo WHERE id=t.torneo_id) pais_id, 
(SELECT nombre FROM pais WHERE id=pais_id) nombre_pais, 
(SELECT comunidad_id FROM torneo WHERE id=t.torneo_id) comunidad_id,
(SELECT nombre FROM comunidad WHERE id=comunidad_id) nombre_comunidad
';
$tabla = ' temporada t';
$condicion = ' WHERE t.id='.$temporada_id;
$consulta = 'SELECT '.$campos.' FROM '.$tabla.$condicion;
//echo $consulta;die;
$mysqli = conectar();
$resultadoSQL = mysqli_query($mysqli, $consulta);
$resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);

$nombre_temporada = $resultado[0]['nombre'];
$torneo_id = $resultado[0]['id_original'];
$nombre_torneo = $resultado[0]['nombre_torneo'];
$categoria_id = $resultado[0]['categoria_id'];
$pais_id = $resultado[0]['pais_id'];
$comunidad_id = $resultado[0]['comunidad_id'];

$categoria_n = $resultado[0]['nombre_categoria'];
$pais_n = $resultado[0]['nombre_pais'];
$comunidad_n = $resultado[0]['nombre_comunidad'];

$campos = 'te.equipo_id, (SELECT nombre FROM equipo WHERE id=te.equipo_id) nombre,
(SELECT count(id) FROM partido WHERE equipoLocal_id=te.equipo_id AND temporada_id='.$temporada_id.') pL, 
(SELECT count(id) FROM partido WHERE equipoVisitante_id=te.equipo_id AND temporada_id='.$temporada_id.') pV 
';
$tabla = ' temporada_equipo te';
$condicion = ' WHERE te.temporada_id='.$temporada_id.' ORDER BY nombre';

$consulta = 'SELECT '.$campos.' FROM '.$tabla.$condicion;
//echo $consulta;die;
$mysqli = conectar();
$resultadoSQL = mysqli_query($mysqli, $consulta);
$equipos = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);

$historicotemporadas_id = 0;
?>

<div style="width:100%;float:left">

<div style="width:30%;float:left">
<h3>Equipos</h3>
<ul id="equipos-temporada">
<?php 
foreach ($equipos as $fila) {
    echo "<li id='equipo-temporada-".$fila['equipo_id']."'>".$fila['nombre'].' ( '.$fila['equipo_id'].' ) Partidos='.($fila['pL'] + $fila['pV']);
    if (($fila['pL'] + $fila['pV']) == 0) {
        echo ' - <a href="#" onclick="eliminarEquipo(event, '.$temporada_id.', '.$fila['equipo_id'].')">quitar</a>';
    }
    echo '</li>';
}
?>
</ul>
<?php

echo 'Pais: '.$pais_n.' - '.$pais_id.'<br />';
echo 'Comunidad: '.$comunidad_n.' - '.$comunidad_id.'<br />';
echo 'Categoría: '.$categoria_n.' - '.$categoria_id.'<br />';

$campos = 'e.id, e.nombre, l.nombre localidad, p.nombre provincia, p.comunidad_id, c.es_seleccion';
$tabla = 'equipo e';
$union = ' INNER JOIN club c ON e.club_id=c.id';
$union2 = ' INNER JOIN localidad l ON c.localidad_id=l.id';
$union3 = ' INNER JOIN provincia p ON l.provincia_id=p.id';

        $modelo = 0;
        if ($categoria_id > 1 && 60 != $pais_id) {
            $condicion = ' WHERE 
			e.categoria_id='.$categoria_id.'
			AND c.pais_id='.$pais_id;

            $orden = ' ORDER BY e.nombre';
        } else {
            if (60 == $pais_id) {
                if (1 == $comunidad_id) {
                    $condicion = ' WHERE 
				e.categoria_id='.$categoria_id.'
				AND c.pais_id='.$pais_id.'
				AND e.desaparecido<1000
				AND p.id>1
				';

                    $orden = ' ORDER BY p.comunidad_id, e.nombre';
                } else {
                    $condicion = ' WHERE 
				e.categoria_id='.$categoria_id.'
				AND c.pais_id='.$pais_id.'
				AND p.comunidad_id='.($comunidad_id).'
				AND e.desaparecido<1000
				';

                    $orden = ' ORDER BY e.nombre';
                }
            } else {
                $campos = 'e.id, e.nombre, c.es_seleccion';

                $condicion = ' WHERE 
				e.categoria_id='.$categoria_id.'
				AND c.pais_id='.$pais_id;

                $union2 = '';
                $union3 = '';

                $orden = ' ORDER BY e.nombre';

                $modelo = 1;
            }
        }

        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$union2.$union3.$condicion.$orden;

        //echo $consulta."<hr />";

        echo "<table width='100%' border='0' cellpadding='1' cellspacing='1' bgcolor='gainsboro'>";
        echo '<tr><td>ID</td>
				  <td>disponibles</td>
				  <td>localidad</td>
				  <td>provincia</td>
				  <td>Comunidad - Seleccion</td>
				</tr>';

            $resultadoSQL = mysqli_query($mysqli, $consulta);
            $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);

            foreach ($resultado as $fila) {
                echo '<tr bgcolor="white">
   				<td>'.$fila['id'].'</td>
   				<td>'.$fila['nombre'].'</td>';
                if ($modelo < 1) {
                    echo '<td>'.$fila['localidad'].'</td>
   					<td>'.$fila['provincia'].'</td>
   					<td>'.$fila['comunidad_id'].' - <a href="#" onclick="insertarEquipo(event, '.$temporada_id.', '.$fila['id'].', \''.$fila['nombre'].'\')">insertar</a> - '.$fila['es_seleccion'].'</td>';
                } else {
                    echo '<td></td><td></td><td><a href="#" onclick="insertarEquipo(event, '.$temporada_id.', '.$fila['id'].', \''.$fila['nombre'].'\')">insertar</a> - '.$fila['es_seleccion'].'</td>';
                }

                echo '</tr>';
            }

        echo '</table>';

?>



</div>

<?php
$campos = "'".$nombre_temporada."' as temporada,'',fecha, 
hora_prevista, jornada, 0, (SELECT nombre FROM equipo WHERE id=equipoLocal_id) local,
goles_local, goles_visitante, (SELECT nombre FROM equipo WHERE id=equipoVisitante_id) visitante, 
(SELECT count(id) FROM historico WHERE partido_id=p.id ) copia
";
$tabla = ' partido p';
$condicion = ' WHERE p.temporada_id='.$temporada_id.' ORDER BY p.jornada, p.fecha, p.hora_prevista';
$consulta = 'SELECT '.$campos.' FROM '.$tabla.$condicion;
$consultaB = $consulta;
//echo $consulta;
$resultadoSQL = mysqli_query($mysqli, $consulta);
$calendario = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);
?>
<div id="calendario-central" style="width:35%;float:left">
<h3>CALENDARIO</h3>
<?php 
foreach ($calendario as $fila) {
    echo ' - 
	'.$fila['fecha'].' -
	'.$fila['hora_prevista'].' - 
	'.$fila['jornada'].' - 
	'.$fila['local'].' - 
	'.$fila['goles_local'].' - 
	'.$fila['goles_visitante'].' - 
	'.$fila['visitante'].' - 	
	copia = '.$fila['copia'].'
	<br />';
}
?>
</div>

<?php
$consulta = 'SELECT distinct(jornada), fecha FROM partido WHERE temporada_id='.$temporada_id;
$resultadoSQL = mysqli_query($mysqli, $consulta);
$datos = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);
?>


<div style="width:15%;float:left">
<div id="mensaje-fechas"></div>
<form method="POST" action="#" onsubmit="modificarFechas(event, $(this).serialize(), <?php echo $temporada_id; ?>)">
<input type="hidden" name="temporada_id" value="<?php echo $temporada_id; ?>">
<?php foreach ($datos as $fila) {
    $fecha1 = $fila['fecha'];
    $fecha = date('j-m-Y', strtotime($fecha1)); ?>
Jornada <?php echo $fila['jornada']; ?>	<input type="text" name="jornada<?php echo $fila['jornada']; ?>" value="<?php echo $fecha; ?>"><br />
<?php
} ?>
<input type="hidden" name="jornadas" value="<?php echo count($datos); ?>">
<input type="submit" name="modificar" value="modificar"> Formato dd-mm-aaaa
</form>
</div>




<div style="width:20%;float:left">
<?php


$consulta = 'SELECT id, torneo_id, nombre_temporada, temporada_ref  FROM historicotemporadas WHERE temporada_ref='.$temporada_id;
$resultadoSQL = mysqli_query($mysqli, $consulta);
$datos = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);

$numero = mysqli_num_rows($resultadoSQL);

if (0 == $numero) {
    ?>


<div id="referencia">
<form id="crearReferencia" method="POST" action="#" onsubmit="submitCrearReferencia(event, $(this).serialize())">
Nombre de temporada:<input type="text" name="nombre_temporada" value="<?php echo $nombre_temporada; ?>" size="15"><br />
Torneo id:<input type="text" name="torneo_id" value="<?php echo $torneo_id; ?>" size="2"><br />
Temporada ID:<input type="text" name="temporada_id" value="<?php echo $temporada_id; ?>" size="2"><br />
<input type="submit" name="crear_referencia" value="crear referencia">
</form>
</div>




<?php
} else {
        $nombre_temporada = $datos[0]['nombre_temporada'];
        $torneo_id = $datos[0]['torneo_id'];
        $historicotemporadas_id = $datos[0]['id'];
        $temporada_id = $datos[0]['temporada_ref']; ?>


Ya hay un historico con esa referencia.


<?php
    } ?>





<hr />
<div id="guardarCalendario">
<h3>GUARDAR EN EL HISTORICO</h3>
<p><?php echo $nombre_torneo; ?></p>
<form method="POST" action="#" onsubmit="submitGuardarCalendario(event, $(this).serialize(), <?php echo $temporada_id; ?>)">
Nombre de temporada:<input type="text" name="nombre_temporada" value="<?php echo $nombre_temporada; ?>" size="15"><br />
Torneo id:<input type="text" name="torneo_id" value="<?php echo $torneo_id; ?>" size="2"><br />
Historico Temporada ID:<input type="text" name="historicotemporadas_id" value="<?php echo $historicotemporadas_id; ?>" size="2"><br />
Temporada ID:<input type="text" name="temporada_id" value="<?php echo $temporada_id; ?>" size="2"><br />
<input type="submit" name="guardar_calendario" value="guardar calendario">
</form>
</div>
<a href="#" onclick="borrarCalendario(event, <?php echo $temporada_id; ?>)">Borrar calendario</a><hr />


<form method="POST" action="#" onsubmit="generarCalendarioSubmit (event, $(this).serialize())">
Jornadas:<input type="text" name="jornadas" value="0" size="2"><br />
Temporada ID:<input type="text" name="temporada" value="<?php echo $temporada_id; ?>" size="2"><br />
<input type="submit" name="generar_calendario" value="generar_calendario">
</form>



</div>

</div>

