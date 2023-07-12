<?php

define('_FUTBOLME_', 1);

require_once '../../src/config.php';

if (!isset($_GET['temporada_id'])) {
    die('introduce un valor temporada_id en el get');
}

if (!is_numeric($_GET['temporada_id'])) {
    die('introduce un valor temporada_id VALIDO');
}

$temporada_id = $_GET['temporada_id'];
$mysqli = conectar();

    $consulta = 'SELECT idTemporada, nombreTemporada, temporada, estilo, idDivision, fm_torneo_id
	FROM nacionaltorneos WHERE idTemporada='.$temporada_id.' AND estilo<2 ORDER BY idDivision, temporada';

    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);

    $datos = array();

    foreach ($resultado as $fila) {
        $temporada_id = $fila['idTemporada'];
        $datos['estilo'] = $fila['estilo'];
        $datos['idDivision'] = $fila['idDivision'];
        $datos['fm_torneo_id'] = $fila['fm_torneo_id'];
        $datos['temporada'] = $fila['temporada'];

        $clas_temporada = generarClasificacionH($temporada_id, 0, $fila['temporada']);

        /*imp($temporada_id);
        imp($clas_temporada);
        imp($datos);
        die;*/

        $grabar = grabarClasificacion($temporada_id, $clas_temporada, $datos);
        //esta funcion esta en src/hconsultas.

        echo 'Temporada '.$fila['temporada'].' ('.$fila['idTemporada'].') guardada correctamente.<br />';
    }
