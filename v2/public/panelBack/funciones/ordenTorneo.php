<?php 
define('_PANEL_', 1);
require_once '../includes/config.php';

    $consulta = 'UPDATE torneo SET apuestaMA='.$_POST['apuestaMA'].',betsapi='.$_POST['betsapi'].' WHERE id=(select torneo_id from temporada where id='.$_POST['id'].')';
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    die();
/*
echo $consulta.'<br />';
echo 'Modificado correctamente...';
header('Location: /panelBack/?tipo_torneo=3&modo=fm');
*/
