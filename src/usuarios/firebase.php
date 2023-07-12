<?php
$token=''; 

if (isset($_GET['userApp'])) {
    $token=$_POST['firebaseToken']??0;
    if(strlen($token)>50){
        if (isset($_SESSION['user_id'])) {
         actualizarToken($_SESSION['user_id'],$token);        
        }
    } 
}

//unset($_SESSION['user_id']);
//$tiempo_inicio = microtime_float();

if (!isset($_SESSION['user_id'])) {    
    if(strlen($token)>50){
        $usuario = obtenerUsuarioCookie($token);
        if (empty($usuario)) {
            $usuario = grabarUsuarioCookie($token);        
        }


        usuarioDatos($usuario); 
    } else {
        if (isset($_COOKIE['futbolme_2018'])){
            $cookie = htmlentities($_COOKIE['futbolme_2018']); 
            $usuario = obtenerUsuarioCookie($cookie);            
        } else {
            $cookie = session_id();
            setcookie('futbolme_2018', $cookie, time()+3600*24*365*5, '/');
            $usuario = grabarUsuarioCookie($cookie);
        }        
        usuarioDatos($usuario); 
        
    }
}


//imp($_SESSION);


/*$tiempo_fin = microtime_float();
$tiempo = $tiempo_fin - $tiempo_inicio;
echo 'Tiempo empleado: '.($tiempo_fin - $tiempo_inicio);
//die;
*/

/*
*******************Limpieza de usuarios****************
update usuario_token
inner join usuario_equipo on usuario_token.id = usuario_equipo.usuario_id
set usuario_token.usuario_off=1

delete from usuario_token where usuario_off<>1 AND id<10000000;
****************************************************/

function grabarUsuarioCookie($cookie)
{
    $nombre="usuario-".substr($cookie, 0,5);
    $consulta = 'INSERT INTO usuario_token(token, nombre) VALUES ("'.$cookie.'","'.$nombre.'")';//echo $consulta."<br />";
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $consulta ="SELECT max(id) as id FROM usuario_token";
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $r1 = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
    $usuario['id']=$r1['id'];    
    $consulta ="SELECT nombre FROM usuario_token WHERE id=".$r1['id'];
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $r1 = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);    
    $usuario['nombre']=$r1['nombre'];    
    return $usuario;    
}

function actualizarToken($user_id, $token)
{
    $consulta = "UPDATE usuario_token SET token='".$token."' WHERE id=".$user_id;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
}


function obtenerUsuarioCookie($cookie)
{
    
    $consulta = "SELECT u.id, u.nombre FROM  usuario_token u WHERE u.token = '".$cookie."'";
    $mysqli = conectar();

    $resultadoSQL = mysqli_query($mysqli, $consulta);
    
    $usuario = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
    
    if (!isset($usuario)){
        //echo "no hay usuario con esa cookie";
        $nombre="usuario-".substr($cookie, 0,5);
        $consulta = 'INSERT INTO usuario_token(token, nombre) VALUES ("'.$cookie.'","'.$nombre.'")';
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $consulta ="SELECT max(id) as id FROM usuario_token";
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $r1 = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
        $usuario['id']=$r1['id'];
        $usuario['nombre']=$nombre;
    }
    $consulta = "UPDATE usuario_token SET acceso='".date("Y-m-d H:i:s")."' WHERE id=".$usuario['id'];
    mysqli_query($mysqli, $consulta);
    return $usuario;
}

function usuarioDatos($usuario)  {
    $_SESSION['user_id']=$usuario['id'];
    $_SESSION['username']=$usuario['nombre'];

    unset($_SESSION['equipos']);
    unset($_SESSION['equipo']);
    $_SESSION['equipos'] = equiposUsuario($usuario['id']);
    foreach ($_SESSION['equipos'] as $key => $value) {
        $_SESSION['equipo']=$key.','.$value['nombre'].','.$value['club_id']; break;
    }
    /*
    $torneos=array();$torneosE=array();             
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
    $_SESSION['torneosE']=$torneosE;
    */

    

    
}


