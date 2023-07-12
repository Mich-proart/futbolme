<?php
define('_FUTBOLME_', 1);
require_once '../consultas.php';
require_once '../funciones.php';

$mysqli = conectar();

if ('1' == $_POST['modo']) {
    $consulta = 'DELETE FROM  partido_medio WHERE partido_id = '.$_POST['partido_id'].' AND medio_id='.$_POST['medio_id'];
    $consulta = mysqli_query($mysqli, $consulta);
} else {
    $consulta = 'INSERT INTO partido_medio (partido_id,medio_id) VALUES ('.$_POST['partido_id'].', '.$_POST['medio_id'].')';
    $consulta = mysqli_query($mysqli, $consulta);
    //$valorE=$_POST["medio_id"];
    $sql = "SELECT equipoLocal_id, equipoVisitante_id,
		(select nombreCorto) FROM equipo WHERE id=equipoLocal_id) local,
		(select nombreCorto FROM equipo WHERE id=equipoVisitante_id) visitante FROM partido WHERE id=".$_POST['partido_id'];

    $resultadoSQL = mysqli_query($mysqli, $sql);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);

    $sql = 'SELECT (select nombre from medio where id=medio_id) medio FROM partido_medio WHERE partido_id='.$_POST['partido_id'];
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $medios = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    echo '<pre>';

    print_r($medios);

    echo '</pre>';

    $medio1 = '';
    foreach ($medios as $medio) {
        $medio1 .= $medio['medio'].', ';
    }

    $even = array();

    $evento = 26;
    $even = array('evento' => $evento,
        'local' => $resultado['local'],
        'visitante' => $resultado['visitante'],
        'partido_id' => $_POST['partido_id'],
        'valor' => 'Televisado por '.$medio1.'-',
        'resultado' => '',
        'equipoLocal_id' => $resultado['equipoLocal_id'],
        'equipoVisitante_id' => $resultado['equipoVisitante_id'],
        'goles_local' => 0,
        'goles_visitante' => 0,
        );
    $event[0]=$even;

    insertarEvento($event);
}

/*
if ($_POST["modo"]!="1") {
$sql="INSERT INTO evento (evento, partido_id, valor, equipoLocal_id, equipoVisitante_id, momento)
SELECT 20,id,(select nombre from medio where id=".$_POST["medio_id"]."),equipoLocal_id, equipoVisitante_id,NOW() from partido WHERE id=".$_POST["partido_id"];
$resultadoSQL = mysqli_query($mysqli, $sql);
}*/

echo 'ok'; die;
