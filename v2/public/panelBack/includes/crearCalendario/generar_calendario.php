<?php 
define('_PANEL_', 1);
require_once '../../includes/config.php'; 
require_once 'consultasNC.php';

$temporada = $_POST['temporada'];
$jornadas = $_POST['jornadas'];
$tipo_torneo = $_POST['tipo_torneo'];
$categoria_torneo = $_POST['categoria_torneo'];

$sql = 'UPDATE liga SET jornadas='.$jornadas.',jornadaActiva=1 WHERE id=(select torneo_id from temporada where id='.$temporada.')';
$mysqli = conectar();
$resultadoSQL = mysqli_query($mysqli, $sql);

$idCombinacion = round($jornadas / 2).(round($jornadas / 2) + 1);

//$idCombinacion = ($jornadas % 2 == 0) ? ($jornadas-1).$jornadas : $jornadas.($jornadas+1);
$path = 'combinacion.json';

$json = file_get_contents($path);
$combinaciones = json_decode($json, true);
$combinacion = $combinaciones[$idCombinacion];

$equipos = Xequipos_temporada($temporada);

if (0 == contarPartidosLiga($temporada)) {
    for ($i = 1; $i <= $jornadas; ++$i) {
        foreach ($combinacion[$i] as $partido) {
            crearPartidoVacioLiga($temporada, $i, $partido['casa'], $partido['fuera']);
        }
    }
} ?>
    