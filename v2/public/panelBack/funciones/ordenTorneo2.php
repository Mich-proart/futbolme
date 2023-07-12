<?php 
define('_PANEL_', 1);
require_once '../includes/config.php';


    $consulta = 'UPDATE torneo SET visible='.$_POST['visible'].',betsapi='.$_POST['betsapi'].' WHERE id=(select torneo_id from temporada where id='.$_POST['id'].')';
   mysqli_query($mysqli, $consulta);
   			if (!mysqli_query($mysqli, $consulta)) {
                echo $consulta;
                printf("Errormessage: %s\n", mysqli_error($mysqli));
                exit;
            }

     $consulta1 = "UPDATE liga SET jornadas='".$_POST['jornadas']."' WHERE id=(select torneo_id from temporada where id=".$_POST['id'].")";
            if (!mysqli_query($mysqli, $consulta1)) {
                echo $consulta1;
                printf("Errormessage: %s\n", mysqli_error($mysqli));
                exit;
            }
    die();
/*
echo $consulta.'<br />';
echo 'Modificado correctamente...';
header('Location: /panelBack/?tipo_torneo=3&modo=fm');
*/
