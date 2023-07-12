<?php 
define('_PANEL_', 1);
require_once '../../includes/config.php';

foreach ($_POST as $key => $value) {
    $$key = mysqli_real_escape_string($mysqli, $value);
}

if ('0' === $color_id) {
    $consulta = 'DELETE FROM colortorneo WHERE torneo_id = '.$torneo_id.' AND posicion = '.$posicion;
} else {
    $consulta = 'SELECT id FROM colortorneo WHERE torneo_id = '.$torneo_id.' AND posicion = '.$posicion.' AND color_id = '.$color_id;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_BOTH);
    $id = $resultado['id'];
    if ('' != $id) {
        $consulta = 'UPDATE colortorneo SET posicion = '.$posicion.', torneo_id = '.$torneo_id.', color_id = '.$color_id.' WHERE id = '.$id;
    } else {
        $consulta = "INSERT INTO colortorneo (torneo_id, posicion, color_id) VALUES ('".$torneo_id."', '".$posicion."', '".$color_id."')";
    }
}

mysqli_query($mysqli, $consulta);
echo $consulta;
//$f = __DIR__.'/../../../json/temporada/'.$temporada.'/clasificacion.json';
//unlink($f);


die();
