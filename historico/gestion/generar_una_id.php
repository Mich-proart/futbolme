<?php

define('_FUTBOLME_', 1);

require_once 'consultas.php';
require_once '../../src/hconsultas/clasificacionH.php';

if (!isset($_GET['idTemporada'])) {
    die('introduce un valor temporada_id en el get');
}

if (!is_numeric($_GET['idTemporada'])) {
    die('introduce un valor temporada_id VALIDO');
}

$idTemporada = $_GET['idTemporada'];
$mysqli = conectar();

    $consulta = 'SELECT idTemporada, nombreTemporada, temporada, estilo, idDivision, fm_torneo_id
	FROM nacionaltorneos WHERE idTemporada='.$idTemporada;

    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    $datos = array();

    foreach ($resultado as $fila) {
        $datos['estilo'] = $fila['estilo'];
        $datos['idDivision'] = $fila['idDivision'];
        $datos['fm_torneo_id'] = $fila['fm_torneo_id'];
        $datos['temporada'] = $fila['temporada'];

        $clas_temporada = generarClasificacionH($idTemporada, 0, $fila['temporada']);


        $grabar = grabarClasificacion($idTemporada, $clas_temporada, $datos);
        //esta funcion esta en src/hconsultas.

        echo 'Temporada '.$fila['temporada'].' ('.$idTemporada.') guardada correctamente.<br />';
    }
