<?php define('_FUTBOLME_', 1);

require_once '../config.php';

$mysqli = conectar();

$usuario = $_SESSION['user_id'];

if ($_SESSION['user_id']==30623){
    echo " - no se graba......................";
    imp($_POST);
}

$equipo = mysqli_real_escape_string($mysqli, $_POST['equipo_id']);

if (!isset($_POST['orden'])) {
    $consulta = 'INSERT INTO usuario_equipo (usuario_id, equipo_id, orden)
			VALUES ('.$usuario.', '.$equipo.',100)';
} else {
    $consulta = 'UPDATE usuario_equipo SET orden='.$_POST['orden'].'+orden WHERE usuario_id='.$usuario;
    mysqli_query($mysqli, $consulta);
    $consulta = 'UPDATE usuario_equipo SET orden='.$_POST['orden'].' WHERE usuario_id='.$usuario.' AND equipo_id='.$equipo;
}



mysqli_query($mysqli, $consulta);
unset($_SESSION['equipos']);
unset($_SESSION['equipo']);
$_SESSION['equipos'] = equiposUsuario($usuario);
foreach ($_SESSION['equipos'] as $key => $value) {
    $_SESSION['equipo']=$key.','.$value['nombre'].','.$value['club_id']; break;
}
/*$torneos=array();$torneosE=array();             
    foreach ($_SESSION['equipos'] as $key => $value) {
        $tt=equipoTorneos($value['equipo_id']);
        foreach ($tt as $key => $fila) {
            $torneos[$fila['id']]['nombre']=$fila['nombre'];
            $torneos[$fila['id']]['tipo_torneo']=$fila['tipo_torneo'];
            $torneos[$fila['id']]['categoria_torneo_id']=$fila['categoria_torneo_id'];
            $torneos[$fila['id']]['equipo'][]=$value['equipo_id'];                  
            $torneosE[$value['equipo_id']][]=$fila['id']; //torneos de un equipo
        }

    }

    $_SESSION['torneos']=$torneos;
    $_SESSION['torneosE']=$torneosE;*/

    

die();
