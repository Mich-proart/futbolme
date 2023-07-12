<?php
define('_FUTBOLME_', 1);

require_once '../../consultas.php';

$mysqli = conectar();

$temporada_id = $_POST['temporada_id'];

$valores = $_POST['valores'];

for ($i = 0; $i < ($valores); ++$i) {
    $fecha1 = $_POST['f-'.$i];
    $jornada = $_POST['j-'.$i];
    $fechaO = $_POST['fe-'.$i];
    $jornadaO = $_POST['jo-'.$i];

    $fecha = date('Y-m-j', strtotime($fecha1));

    if ('' == $fechaO) {
        $consulta = "UPDATE partido SET fecha='".$fecha."',jornada=".$jornada.' WHERE temporada_id='.$temporada_id.' AND jornada='.$jornadaO;
    } else {
        $consulta = "UPDATE partido SET fecha='".$fecha."',jornada=".$jornada.' WHERE temporada_id='.$temporada_id.' AND jornada='.$jornadaO." AND fecha='".$fechaO."'";
    }

    //echo $consulta."<br />";

    $resultadoSQL = mysqli_query($mysqli, $consulta);
}
die('OK');
