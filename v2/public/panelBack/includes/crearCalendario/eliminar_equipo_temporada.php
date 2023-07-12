<?php 
define('_PANEL_', 1);
require_once '../../includes/config.php'; 

$mysqli = conectar();
$consulta = '	
DELETE FROM temporada_equipo WHERE 
temporada_id='.$_POST['temporada_id'].' AND equipo_id='.$_POST['equipo_id'];

$consulta = mysqli_query($mysqli, $consulta);
$temporada_id=$_POST['temporada_id'];
$categoria_torneo=$_POST['categoria_torneo'];
$tipo_torneo=$_POST['tipo_torneo'];
$ver_equipos=0;
$equiposTorneo=Xequipos_temporada($temporada_id);

if (!isset($_POST['fase_id'])){
	include '../../includes/crearCalendario/crear-equipos.php';
}
die;