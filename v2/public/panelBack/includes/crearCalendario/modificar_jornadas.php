<?php 
define('_PANEL_', 1);
require_once '../../includes/config.php'; 


$temporada_id = $_POST['temporada_id'];

if ($_POST['forma']==1){
    $id_fechas=$_POST['id_fechas'];
    $sq='SELECT DISTINCT jornada, fecha FROM partido WHERE temporada_id='.$id_fechas;
    $resultadoSQL = mysqli_query($mysqli, $sq);
    $r = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    foreach ($r as $k => $v) {
    	$sql='UPDATE partido SET fecha="'.$v['fecha'].'" WHERE jornada='.$v['jornada'].' AND temporada_id='.$temporada_id;
    	mysqli_query($mysqli, $sql);
    	
    }

    

} else {

    foreach ($_POST['f'] as $k => $v) {
        $fecha = date('Y-m-j', strtotime($v));
        $sql = 'UPDATE partido SET fecha="'.$fecha.'" WHERE temporada_id='.$temporada_id.' AND jornada='.$k;
        mysqli_query($mysqli, $sql);
    }

}
    

die('Fechas modificadas');
