
<?php
define('_FUTBOLME_', 1);
require_once '../../src/consultas.php';

if (isset($_GET['modo'])) {
    if ($_GET['modo']=='palmares'){
        $sql = 'SELECT local_nombre, visitante_nombre, clasificado, 
        local_fm_id, visitante_fm_id FROM historico WHERE id='.$_GET['id_partido'];
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $sql);
        $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
        $fila = $resultado;
        if (1 == $fila['clasificado']) {
            $sql = "UPDATE historicotemporadas SET 
            campeon='".$fila['local_nombre']."', subcampeon='".$fila['visitante_nombre']."', 
            equipoCampeon_id='".$fila['local_fm_id']."', equipoSubcampeon_id='".$fila['visitante_fm_id']."' 
            WHERE id='".$_GET['historicoID']."'";
        } else {
            $sql = "UPDATE historicotemporadas SET 
            campeon='".$fila['visitante_nombre']."', subcampeon='".$fila['local_nombre']."', 
            equipoCampeon_id='".$fila['visitante_fm_id']."', equipoSubcampeon_id='".$fila['local_fm_id']."' 
            WHERE id='".$_GET['historicoID']."'";
        }
        echo $sql;
        $resultadoSQL = mysqli_query($mysqli, $sql);
    }

    if ($_GET['modo']=='borrarTemporada'){
        borrar_temporada($_GET['id_temporada']);
    }

    $_POST['temporada_id']=$_GET['id_temporada'];
}

if (!isset($_POST['temporada_id'])) { ?>

<form action="guardarTorneos.php" method="POST">
Introduce temporada_id. 
Temporada_id:<input type="text" name="temporada_id" size="4">
<input type="submit" name="enviar" value="enviar">
</form>
<?php 
die;
}

$mysqli = conectar();
$id_temporada = $_POST['temporada_id'];
$sql = 'SELECT id_original,nombre FROM temporada WHERE id='.$id_temporada;
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);

    $id_torneo = $resultado['id_original'];
    $nombreTemporada = $resultado['nombre'];

echo 'ID temporada: '.$id_temporada.'<br />';
echo '<b>Nombre temporada: '.$nombreTemporada.'</b><br />';
echo 'ID Torneo original: '.$id_torneo.'<br />';

$sql = 'SELECT id,nombre_temporada, campeon, subcampeon, equipoCampeon_id, equipoSubcampeon_id FROM historicotemporadas WHERE torneo_id='.$id_torneo.' ORDER BY nombre_temporada DESC';
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

$sql ='SELECT 
    jornada,fecha, (select nombre from equipo where id=equipoLocal_id) nomCasa,
    (select nombre from equipo where id=equipoVisitante_id) nomFuera,
    clasificado, goles_local, goles_visitante, (select nombre from fase where id=jornada) nomEli FROM partido WHERE temporada_id='.$id_temporada.' ORDER BY fecha DESC';

    $resultadoSQL = mysqli_query($mysqli, $sql);
    $resultado2 = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

echo '
<table width="100%"><tr><td valign="top" width="50%"><h4>Torneos en el histórico</h4><table width="100%" cellspacing="2" cellpadding="5" bgcolor="gainsboro">';

            foreach ($resultado as $key => $value) {
            echo '<tr bgcolor="white">
            <td align="center"><form action="guardarTorneos.php" method="POST">
            <input type="hidden" name="temporada_id" value="'.$id_temporada.'">
            <input type="hidden" name="historicoID" value="'.$value['id'].'">
            <input type="submit" name="enviar" value="Ver '.$value['id'].'">
            </form></td>
            <td align="center">'.$value['nombre_temporada'].'</td>
            <td align="center">'.$value['equipoCampeon_id'].'</td>
            <td align="center">'.$value['campeon'].'</td>
            <td align="center">'.$value['subcampeon'].'</td>
            <td align="center">'.$value['equipoSubcampeon_id'].'</td>
            </tr>';
            }
            echo '</table></td><td valign="top" width="50%">';

if (isset($_POST['historicoID'])){

                $sql = 'SELECT id, nombre_temporada, nombre_eliminatoria, fecha, hora, jornada, 
        local_nombre, local_goles, visitante_goles, visitante_nombre, 
        clasificado, cosas, arbitro_id, partido_id, local_fm_id, visitante_fm_id,  
        historicotemporadas_id, grupo_id,youtube_id FROM historico WHERE historicotemporadas_id='.$_POST['historicoID'].' ORDER BY fecha DESC';

            $mysqli = conectar();
            $resultadoSQL = mysqli_query($mysqli, $sql);
            $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);

            echo '<hr /><h4>'.$_POST['historicoID'].'</h4><table width="100%" style="background-color:gainsboro"><tr><td>id</td>                  
                  <td>nombre_eliminatoria</td>
                  <td>fecha</td>
                  <td>hora</td>
                  <td>jda</td>
                  <td>gr</td>
                  <td>local_nombre</td>
                  <td>lg</td>
                  <td>vg</td>
                  <td>visitante_nombre</td>
                  <td>clas</td>
                  <td>cosas</td>
                  <td>loc_id</td>
                  <td>vis_id</td>                  
                </tr>';

            //<td>'.$fila['grupo_id'].'</td>

            foreach ($resultado as $fila) {
                $idLocal = $fila['local_fm_id'];
                $idVisitante = $fila['visitante_fm_id'];
                $a = substr($fila['fecha'], 0, 4);
                $m = substr($fila['fecha'], 5, 2);
                $d = substr($fila['fecha'], 8, 2);
                $enlace="?modo=palmares&historicoID=".$_POST['historicoID']."&id_partido=".$fila['id']."&id_temporada=".$id_temporada;

if (isset($_POST['partidoID']) && $_POST['partidoID']==$fila['id']) { ?>
                <tr><td>
<form method="post" class="formulario" onsubmit="submitForm(event, $(this).serialize(),0)">
<input type="hidden" name="id_temporada" value="<?php echo $_GET['id_temporada']; ?>">
<input type="hidden" name="partido_id" value="<?php echo $fila['id']; ?>">
<input type="text" name="fecha" value="<?php echo $fila['fecha']; ?>" style="width:80px">
<input type="text" name="hora" value="<?php echo $fila['hora']; ?>" style="width:80px">
<input type="text" name="jornada" value="<?php echo $fila['jornada']; ?>" style="width:20px">
<input type="text" name="local_nombre" value="<?php echo $fila['local_nombre']; ?>" style="width:120px; text-align:right">
<input type="text" name="local_goles" value="<?php echo $fila['local_goles']; ?>" style="width:20px; text-align:center">
<input type="text" name="visitante_goles" value="<?php echo $fila['visitante_goles']; ?>" style="width:20px; text-align:center">
<input type="text" name="visitante_nombre" value="<?php echo $fila['visitante_nombre']; ?>" style="width:120px;">
<input type="text" name="clasificado" value="<?php echo $fila['clasificado']; ?>" style="width:20px; text-align:center">
    <textarea name="cosas"  onClick="this.style.height='100px'; this.style.width='300px'"><?php echo trim($fila['cosas']); ?></textarea>
<input type="text" name="youtube_id" value="<?php echo $fila['youtube_id']; ?>" style="width:250px;">
<input type="text" name="local_fm_id" value="<?php echo $fila['local_fm_id']; ?>" style="width:40px;">
<input type="text" name="visitante_fm_id" value="<?php echo $fila['visitante_fm_id']; ?>" style="width:40px;">
<input type="submit" name="modificar" value="modificar">
</form>
                </td></tr>
                <?php  }



               
                echo '<tr style="background-color:white"><td>
            <form action="guardarTorneos.php" method="POST">
            <input type="hidden" name="temporada_id" value="'.$id_temporada.'">
            <input type="hidden" name="historicoID" value="'.$_POST['historicoID'].'">
            <input type="hidden" name="partidoID" value="'.$fila['id'].'">
            <input type="submit" name="enviar" value="Ver '.$fila['id'].'">
            </form>
            </td>                
                  <td>'.$fila['nombre_eliminatoria'].'</td>
                  <td>'.$fila['fecha'].'</td>
                  <td>'.$fila['hora'].'</td>
                  <td>'.$fila['jornada'].'</td>
                  <td>'.$fila['grupo_id'].'</td>
                  <td align="right">'.$fila['local_nombre'].'</td>
                  <td align="center">'.$fila['local_goles'].'</td>
                  <td align="center">'.$fila['visitante_goles'].'</td>
                  <td>'.$fila['visitante_nombre'].'</td>
                  <td>'.$fila['clasificado'];
                if ('final' == strtolower($fila['nombre_eliminatoria']) || 'final - vuelta' == strtolower($fila['nombre_eliminatoria'])) {                    
                    echo '<a href="'.$enlace.'">*</a>';
                }
                echo '</td><td title="'.$fila['cosas'].'">...</td>'; 
                echo '<td>'.$fila['local_fm_id'].'</td>';                
                echo '<td>'.$fila['visitante_fm_id'].'</td></tr>';

                }
        
            echo '</table>';
        

}



echo '<h4>Partidos en FUTBOLME</h4><table width="100%" cellspacing="2" cellpadding="5" bgcolor="gainsboro">';

            foreach ($resultado2 as $key => $value) {
            echo '<tr bgcolor="white">
            <td align="center">'.$value['jornada'].'</td>
            <td align="center">'.$value['nomEli'].'</td>
            <td align="center">'.$value['fecha'].'</td>
            <td align="center">'.$value['nomCasa'].' - '.$value['nomFuera'].'</td>
            <td align="center">'.$value['goles_local'].'</td>
            <td align="center">'.$value['goles_visitante'].'</td>
            <td align="center">'.$value['clasificado'].'</td>
            </tr>';
            }
            echo '</table></td></tr></table>';
?>
<form action="guardarTorneos.php" method="POST">
<input type="hidden" name="temporada_id" value="<?php echo $id_temporada?>">
<input type="hidden" name="torneo_id" value="<?php echo $id_torneo?>">
<input type="text" name="temporada_nombre" size="20">
<input type="submit" name="enviar" value="Nombre de la temporada a guardar">
</form>

<?php 
 echo '<a href="guardarTorneos.php">Inicio</a><br />';

if (!isset($_POST['torneo_id'])) { die(); }

$id_torneo=$_POST['torneo_id'];
$nombre_temporada=$_POST['temporada_nombre'];



    $sql = "INSERT INTO historicotemporadas (id,torneo_id, nombre_temporada, campeon, subcampeon, equipoCampeon_id, equipoSubcampeon_id, comentario, temporada_ref) 
			VALUES (NULL, '".$id_torneo."', '".$nombre_temporada."', NULL, NULL, '0', '0', NULL, '".$id_temporada."')";

    $resultadoSQL = mysqli_query($mysqli, $sql);
    $sql = 'SELECT max(id) id FROM historicotemporadas';
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
    $nueva_temporada = $resultado['id'];

echo 'ID Historico: '.$nueva_temporada.'<br />';

    $sql = "INSERT INTO historico(
	jornada, fecha, local_nombre, visitante_nombre, 
	clasificado, cosas, local_goles, visitante_goles, hora, 
	nombre_temporada, nombre_eliminatoria,
	historicotemporadas_id, arbitro_id, partido_id, local_fm_id, visitante_fm_id, torneo_id, grupo_id) 
	SELECT 
	jornada,fecha, (select nombre from equipo where id=equipoLocal_id) nomCasa,
	(select nombre from equipo where id=equipoVisitante_id) nomFuera,
	clasificado, observaciones, goles_local, goles_visitante,  hora_prevista, 
	'".$nombre_temporada."',(select nombre from fase where id=jornada) nomEli,".$nueva_temporada.'
	, arbitro_id, 0, equipoLocal_id, equipoVisitante_id,'.$id_torneo.',grupo_id FROM partido WHERE temporada_id='.$id_temporada;
    echo $sql."<br />";
    $resultadoSQL = mysqli_query($mysqli, $sql);

    $sql2 = 'INSERT INTO historicoequipos(equipo_nombre, equipo_id, historicotemporadas_id, torneo_id) 
	SELECT (select nombre from equipo where id=equipo_id) equipo_nombre,equipo_id,'.$nueva_temporada.', '.$id_torneo.'
	FROM temporada_equipo WHERE temporada_id='.$id_temporada;
    echo $sql2."<br />";
    $resultadoSQL = mysqli_query($mysqli, $sql2);

    echo 'Temporada archivada<br />';

    
    echo '<a href="?modo=borrarTemporada&id_temporada='.$id_temporada.'">Quieres borrar la temporada</a><br />';
    echo '<a href="guardarTorneos.php">Inicio</a>';

die;

?>