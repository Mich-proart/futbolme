<?php 
define('_PANEL_', 1);
require_once '../includes/config.php';
require_once '../includes/head.php';

?>
</head>
<body>
<div class="marco" style="
position: absolute;left:50%;width:900px;margin-top: 10px;margin-left: -450px; font-size: 20px;background-color: lavender; padding: 10px; float: left;">

<?php if (!isset($_POST['temporada_id'])) { ?>

<form action="guardarTorneos.php" method="POST">
Introduce Temporada_id:<input type="text" name="temporada_id" size="4">
<input type="submit" name="enviar" value="enviar">
</form>
<?php die;

} 

$mysqli = conectar();
$id_temporada = $_POST['temporada_id'];

if (isset($_POST['modo']) && $_POST['modo']=='borrar'){

    $sql = 'DELETE FROM gol WHERE temporada_id='.$temporada_id;
    $resultadoSQL = mysqli_query($mysqli, $sql);
    //echo $sql."<br />";
    $sql = 'DELETE FROM tarjeta WHERE temporada_id='.$temporada_id;
    $resultadoSQL = mysqli_query($mysqli, $sql);    
    //echo $sql."<br />";
    $sql = 'DELETE FROM partido WHERE temporada_id='.$temporada_id;
    $resultadoSQL = mysqli_query($mysqli, $sql);
    //echo $sql."<br />";    
    $files = glob('../../../json/temporada/'.$temporada_id.'/*.*');
    foreach ($files as $file) {
        echo $file.'<br />';
        unlink($file);
    }
    echo 'Temporada borrada...';

} 
    
   
    $sql = 'SELECT torneo_id,nombre FROM temporada WHERE id='.$id_temporada;
        $resultadoSQL = mysqli_query($mysqli, $sql);
        $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);

        $id_torneo = $resultado['torneo_id'];
        $nombreTemporada = $resultado['nombre'];

    echo 'ID temporada: '.$id_temporada.' - <b>Nombre temporada: '.$nombreTemporada.'</b> - ID Torneo: '.$id_torneo;
    $sql ='SELECT 
        jornada, fecha, hora_prevista, grupo_id, 
        (select nombre from equipo where id=equipoLocal_id) nomCasa,
        (select nombre from equipo where id=equipoVisitante_id) nomFuera,
        clasificado, goles_local, goles_visitante, 
        (select nombre from fase where id=jornada) nomEli, 
        (select nombre from grupo where id=grupo_id) nomGrupo 
        FROM partido WHERE temporada_id='.$id_temporada.' ORDER BY fecha DESC';

        $resultadoSQL = mysqli_query($mysqli, $sql);
        $partidos = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);


if (isset($_POST['modo']) && $_POST['modo']=='guardar'){
    $carpeta='../historico/2020';    
    guardarJSON($partidos, $carpeta.'/'.$id_temporada.'.json');

    $f = $carpeta.'/'.$id_temporada.'.json';
    if (@file_exists($f)) { echo '<a href="'.$f.'" target="_blank">Ver...</a> ---'; }
    echo 'Temporada guardada correctamente...'; ?>
        <form action="guardarTorneos.php" method="POST">
        <input type="hidden" name="temporada_id" value="<?php echo $id_temporada?>">
        <input type="hidden" name="torneo_id" value="<?php echo $id_torneo?>">
        <input type="hidden" name="modo" value="borrar">
        Pulsa para borrar los partidos y poder generar una nueva temporada..<input type="submit" name="enviar" value="Borrar partidos">
        </form>

    <?php 
    die;
}

//echo end($resultado2); // diciembre
if (!empty($partidos)){
?>

<form action="guardarTorneos.php" method="POST">
<input type="hidden" name="temporada_id" value="<?php echo $id_temporada?>">
<input type="hidden" name="torneo_id" value="<?php echo $id_torneo?>">
<input type="hidden" name="modo" value="guardar">
<input type="submit" name="enviar" value="Guardar temporada">
</form>
<?php
} else { echo '<h4>No hay partidos en esta competición</h4>'; }

echo '<h4>Partidos en FUTBOLME</h4><table width="100%" cellspacing="2" cellpadding="5" bgcolor="gainsboro">';

            foreach ($partidos as $key => $value) {
                $casa=$value['nomCasa'];
                $fuera=$value['nomFuera'];
            if ($value['clasificado']==1){ $casa='<b>'.$value['nomCasa'].'</b>'; }
            if ($value['clasificado']==2){ $fuera='<b>'.$value['nomFuera'].'</b>'; }
            echo '<tr bgcolor="white">
            <td align="center">'.$value['jornada'].'</td>
            <td align="center">'.$value['grupo_id'].'</td>
            <td align="center">'.$value['nomEli'].' <b>'.$value['nomGrupo'].'</b></td>
            <td align="center">'.$value['fecha'].'</td>
            <td align="center">'.$value['hora_prevista'].'</td>
            <td align="center">'.$casa.' ('.$value['goles_local'].' - '.$value['goles_visitante'].') '.$fuera.'</td>
            </tr>';
            }
            echo '</table>';
?>


</div></body></html>
