

<?php define('_FUTBOLME_', 1);

require_once '../config.php';

$mysqli = conectar();

$usuario = $_SESSION['user_id'];


$equipo = mysqli_real_escape_string($mysqli, $_GET['equipo_id']);

    $sq='SELECT id FROM equipo WHERE id='.$equipo;
    $resultadoSQL = mysqli_query($mysqli, $sq);
    $r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
    if (count($r)==0){
        //no existe el equipo-
        header('Location: https://futbolme.eu/');
    } else {


            //comprobar si este usuario ya tiene este equipo.
            $sq='SELECT usuario_id FROM usuario_equipo WHERE usuario_id='.$usuario.' AND equipo_id='.$equipo;
            $resultadoSQL = mysqli_query($mysqli, $sq);
            $r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
            if (count($r)==0){
                $consulta = 'INSERT INTO usuario_equipo (usuario_id, equipo_id, orden)
    			VALUES ('.$usuario.', '.$equipo.',100)';
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

            }

            header("Location: /index.php?fm=1&n1=config&pest=equipos");

    } //si existe el equipo