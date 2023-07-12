<?php

define('_FUTBOLME_', 1);
require_once '../consultas.php';
require_once '../funciones.php';
echo '<pre>';
print_r($_POST);
echo '</pre>';

inicioTorneo($_POST['temporada_id'], $_POST['inicio'], $_POST['api_id'], $_POST['api_nombre']);

function inicioTorneo($temporada_id, $inicio, $api_id, $api_nombre)
{

$fecha = new \DateTime();
$dia = $fecha->format('Y-m-d');



    switch ($api_nombre) {
        case 'apifootball':
            $liga = '&league_id='.$api_id;
            include 'apis/apifootball.php';
            break;

        case 'betsapi':
            include 'apis/betsapi.php';
            break;
        
        default:
            die("No se ha pasado ningún proveedor de partidos");
            break;
    }

    
    $resultado = file_get_contents($url);

    


    $carpeta = '../../json/temporada/'.$temporada_id;
    if (!file_exists($carpeta)) { mkdir($carpeta, 0777, true); }
    $carpeta = '../../json/temporada/'.$temporada_id.'/'.$api_nombre;
    if (!file_exists($carpeta)) { mkdir($carpeta, 0777, true); }

    $f = $carpeta.'/partidos.json';
    guardarFILE($resultado, $f);
    
    $partidos = file_get_contents($f);
    $partidos = json_decode($partidos, true);

    
    
    if ($api_nombre=='apifootball') {
        foreach ($partidos as $key => $value) {
        $nomFichero=$value['match_id'];
        guardarJSON($value, $carpeta.'/'.$nomFichero.'.json');
        }
    } else {
        foreach ($partidos['results'] as $key => $value) {
        $nomFichero=$value['id'];
        guardarJSON($value, $carpeta.'/'.$nomFichero.'.json');
        }
    }

    


    die;

    $mysqli = conectar();
    /*
    $sql='DELETE FROM partido WHERE temporada_id=(SELECT id FROM temporada WHERE torneo_id='.$torneo_id.')';
        if (!$resultadoSQL = mysqli_query($mysqli, $sql)) {
            printf("Errormessage: %s\n", mysqli_error($mysqli));
            exit;
        } else {
            echo "Partidos borrados. Torneo id: ".$torneo_id."<br />";
        }

    $sql = 'UPDATE liga SET jornadaActiva=1 WHERE id='.$torneo_id;
        if (!$resultadoSQL = mysqli_query($mysqli, $sql)) {
            printf("Errormessage: %s\n", mysqli_error($mysqli));
            exit;
        } else {
            echo "Primera jornada activada.  Torneo id: ".$torneo_id."<br />";
        }*/



    $sql = 'UPDATE torneo SET inicio="'.$inicio.'",visible=7 WHERE id='.$torneo_id;
        if (!$resultadoSQL = mysqli_query($mysqli, $sql)) {
            printf("Errormessage: %s\n", mysqli_error($mysqli));
            exit;
        } else {
            echo "Inicio del torneo en ".$inicio.". Torneo id: ".$torneo_id."<br />";
        }

    
    
}
?>