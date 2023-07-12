<?php 
define('_PANEL_', 1);
require_once '../../includes/config.php'; 

      //imp($_POST);
        $e_entrante = $_POST['e_entrante'];
        $e_saliente = $_POST['e_saliente'];
        $temporada_id = $_POST['temporada_id'];

        if (null != $e_saliente) {
            $consulta = 'UPDATE temporada_equipo set equipo_id='.$e_entrante.' 
    WHERE temporada_id='.$temporada_id.' AND equipo_id='.$e_saliente;
            $resultadoSQL = mysqli_query($mysqli, $consulta);
            //echo $consulta.'<br />';
        
        $consulta = 'UPDATE partido set equipoLocal_id='.$e_entrante.' 
    WHERE temporada_id='.$temporada_id.' AND equipoLocal_id='.$e_saliente;
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        //echo $consulta.'<br />';
        $consulta = 'UPDATE partido set equipoVisitante_id='.$e_entrante.' 
    WHERE temporada_id='.$temporada_id.' AND equipoVisitante_id='.$e_saliente;
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        //echo $consulta.'<br />';

        echo '<h4>Equipo sustituido correctamente</h4>';

        }


$categoria_torneo=$_POST['categoria_torneo'];
$tipo_torneo=$_POST['tipo_torneo'];
$ver_equipos=0;
$equiposTorneo=Xequipos_temporada($temporada_id);

include '../../includes/crearCalendario/crear-equipos.php';
die;
