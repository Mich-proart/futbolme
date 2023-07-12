<?php
function torneoListado($t, $g, $m){
    $mysqli = conectarFB();
    if($m==0){ //agregar
        if ($g==0){
            $sq='SELECT ut.torneo_id, ut.gestor_id, u.user, u.email_canonical, t.nombre, t.nombreGrupo, t.grupo FROM usuario_torneo ut  
            INNER JOIN usuario u ON u.id=ut.gestor_id
            INNER JOIN torneo t ON t.id=ut.torneo_id
            WHERE torneo_id='.$t;
            $resultadoSQL = mysqli_query($mysqli, $sq);
            $r = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
            //echo $sq.'<br />';
            if (count($r)>0){
                foreach ($r as $key => $value) {
                    echo $value['nombre'].' - '.$value['nombreGrupo'].' gestionado por '.$value['user'].' - <a href="?g='.$value['gestor_id'].'&gr='.$value['grupo'].'">'.$value['torneo_id'].'</a><br />';
                }
            } else {
                $sq='SELECT id, nombre, nombreGrupo FROM torneo  WHERE id='.$t;
                $resultadoSQL = mysqli_query($mysqli, $sq);
                $r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
                 echo $r['nombre'].' - '.$r['nombreGrupo'].' - ¿Quieres gestionar este torneo?<br />';
            }
            die;
        }
        $sq='SELECT torneo_id FROM usuario_torneo  WHERE torneo_id='.$t.' AND gestor_id='.$g;
        $resultadoSQL = mysqli_query($mysqli, $sq);
        $r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
        if(isset($r) && count($r)>0){ 
            echo 'Este torneo ya lo tienes asignado'; die; 
        } else {
            $sq='INSERT INTO usuario_torneo (torneo_id,gestor_id) VALUES ('.$t.','.$g.')';
            mysqli_query($mysqli, $sq);
        }

    } else { //quitar
        $sq='DELETE FROM usuario_torneo WHERE torneo_id='.$t.' AND gestor_id='.$g; 
        mysqli_query($mysqli, $sq);
    }

    $carpeta = './json/gestores/'.$g;
    if (!file_exists($carpeta)) { mkdir($carpeta, 0777, true); }

    $sq='SELECT t.id, t.comunidad_id, t.categoria_torneo_id, t.categoria_id, t.nombre, t.nombreGrupo, t.competicion, t.grupo, t.tipo_torneo, t.estado
    FROM torneo t INNER JOIN usuario_torneo ut ON t.id=ut.torneo_id
    WHERE ut.gestor_id='.$g.' ORDER BY t.orden';
    //echo $sq;
    $resultadoSQL = mysqli_query($mysqli, $sq);
    $datos = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);  
    guardarJSON($datos, $carpeta.'/torneos.json'); 
    if($m==0){ //agregar 
        include 'src/mifutbol/torneos.php';
    }
 }

function torneoMostrar($id, $g, $m){
    $mysqli = conectarFB();
        if ($m==0){ $m=1; } else { $m=0; }
        $sq='UPDATE usuario_torneo SET estado='.$m.' WHERE torneo_id='.$id.' AND gestor_id='.$g; 
        mysqli_query($mysqli, $sq);
    
        echo $sq;
        
    $carpeta = './json/gestores/'.$g;
    if (!file_exists($carpeta)) { mkdir($carpeta, 0777, true); }

    $sq='SELECT t.id, t.comunidad_id, t.categoria_torneo_id, t.categoria_id, t.nombre, t.nombreGrupo, t.competicion, t.grupo, t.tipo_torneo, ut.estado, (SELECT user FROM usuario WHERE id='.$g.') user
    FROM torneo t INNER JOIN usuario_torneo ut ON t.id=ut.torneo_id
    WHERE ut.gestor_id='.$g.' ORDER BY t.orden';
    //echo $sq;
    $resultadoSQL = mysqli_query($mysqli, $sq);
    $datos = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);  
    guardarJSON($datos, $carpeta.'/torneos.json'); 
    
 }



function aActivarUser($u, $m){
    $consulta = 'UPDATE usuario SET enabled=1 WHERE id='.$u;
    $mysqli = conectarFB();
    mysqli_query($mysqli, $consulta);
    if (mysqli_affected_rows($mysqli)==0){ $u=0; echo 'Operación no permitida'; }
    return $u;
}
function aModificarUser($u, $nombre, $twitter){
    $consulta = 'UPDATE usuario SET user="'.$nombre.'", twitter="'.$twitter.'" WHERE id='.$u;
    $mysqli = conectarFB();
    mysqli_query($mysqli, $consulta);
    //echo $consulta;
    $n=array();
    if (mysqli_affected_rows($mysqli)==0){ 
        echo 'No se realizaron cambios'; 
        $n['nombreGestor']='';
        $n['twGestor']='no se realizan cambios';
    } else {
        $n['nombreGestor']=$nombre;
        $n['twGestor']=$twitter;
    } 
    return $n;
}
function aRegAcces($email, $pass){
    $consulta = 'SELECT id, user, twitter FROM usuario WHERE email_canonical="'.$email.'"';
    $mysqli = conectarFB();
    //echo $consulta;
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
    $nombre=''; $tw='';
    
    if(count($r)>0){
        $correo=1;
        $consulta = 'SELECT id FROM usuario WHERE password="'.$pass.'" AND id='.$r['id'];
        $mysqli = conectarFB();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $r1 = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
        if(count($r1)>0){ $usuario=$r1['id']; $nombre=$r['user']; $tw=$r['twitter'];
        } else { $usuario=0; }
    } else {
        $correo=0;
        $n=explode('@', $email);
        $nombre=$n[0];
        $sq='INSERT INTO usuario (email_canonical, password, user) VALUES ("'.$email.'","'.$pass.'","'.$nombre.'")';
        mysqli_query($mysqli, $sq);
        //echo $sq.'<br />';
        $usuario=mysqli_insert_id($mysqli);
        $message="Estimado usuario/a, tu email y password han sido almacenados en nuestra base de datos. "."\n";
        $message.="Nombre de usuario: ".$email."\n";
        $message.="Password: ".$pass."\n";
        $message.="Para completar el registro y poder gestionar los torneos que te interesan debes completar la activación en el sistema pulsando en el siguiente enlace: https://futbolme.eu/mifutbol.php?u=".$usuario."&m=".$email."\n";
        //echo $message.'<br />';
        $from = "futbolme@futbolme.com";
        $to = $email;
        $subject = "Último paso para ser gestor de futbolme.com ";
        $headers = "From:" . $from;
        mail($to,$subject,$message, $headers);
    }
    return array(
        'correo' => $correo,  
        'usuario' => $usuario,
        'nombre' => $nombre,
        'tw' => $tw);
}

function aTorneosFederacion($comunidad_id){
    $consulta = 'SELECT t.id, t.categoria_torneo_id, t.nombre, t.nombreGrupo, t.orden, (SELECT count(torneo_id) FROM usuario_torneo WHERE torneo_id=t.id) gestiones
    FROM torneo t WHERE t.comunidad_id='.$comunidad_id.' AND t.tipo_torneo=1 ORDER BY orden';
    $mysqli = conectarFB();
    //echo $consulta;
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
    return $resultado;
}

function aUsuariosTorneos(){
    $consulta = 'SELECT u.id, u.user, (SELECT count(torneo_id) FROM usuario_torneo WHERE gestor_id=u.id) torneos
    FROM usuario u ORDER BY torneos DESC';
    $mysqli = conectarFB();
    //echo $consulta;
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
    return $resultado;
}

function categoriasComunidad($comunidad_id)
{
    $consulta = 'SELECT c.id,c.nombre,t.id torneo_id, t.nombre torneo_nombre, te.id temporada_id, t.categoria_torneo_id, t.tipo_torneo
    FROM torneo t 
    INNER JOIN temporada te ON te.torneo_id=t.id
    INNER JOIN categoria c ON c.id=t.categoria_id
    INNER JOIN categoriatorneo ct ON ct.id=t.categoria_torneo_id';
    if ($comunidad_id==10){ //los andaluces del grupo 9 tendrán en sexo=1 y luego mirar el orden.
    $consulta.=' WHERE (t.comunidad_id='.$comunidad_id.' OR t.sexo=11) AND t.visible>4 ORDER BY c.orden,t.orden';
    } else {
        $consulta.=' WHERE t.comunidad_id='.$comunidad_id.' AND t.visible>4 ORDER BY c.orden,t.orden';
    }
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    //echo $consulta;
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
    return $resultado;
}

function partidosDiaCom($dia, $temporada_id = 0)
{
    $campos = "p.id,p.temporada_id,p.estado_partido,p.jornada,p.fecha, p.hora_prevista,p.hora_real,p.clasificado,p.goles_local,p.goles_visitante,p.observaciones,p.estadio,
ec.nombre local, ec.nombreCorto localCorto, 
p.equipoLocal_id, cec.id club_local, cef.id club_visitante, ef.nombre visitante, ef.nombreCorto visitanteCorto, p.equipoVisitante_id, tor.visible, tor.tipo_torneo,tor.nombre nombreTorneo,tor.categoria_id,ctor.nombre categoria_nombre";
    $tabla = 'partido p';
    $union = ' INNER JOIN equipo ec ON p.equipoLocal_id=ec.id';
    $union .= ' INNER JOIN equipo ef ON p.equipoVisitante_id=ef.id';
    $union .= ' INNER JOIN club cec ON ec.club_id=cec.id';
    $union .= ' INNER JOIN club cef ON ef.club_id=cef.id';
    $union .= ' INNER JOIN torneo tor ON p.temporada_id=tor.id';
    $union .= ' INNER JOIN categoria ctor ON tor.categoria_id=ctor.id';
    

        $condicion = " WHERE p.fecha='".$dia."' AND p.estado_partido<>2 AND p.estado_partido<5 AND ec.nombre<>'SIN PAIS' AND ef.nombre<>'SIN PAIS'";
        if ($temporada_id > 0) { $condicion .= ' AND p.temporada_id='.$temporada_id; }
        $orden = ' ORDER BY tor.orden, p.hora_prevista';
        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
        //echo $consulta;
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $partidos = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
    


        $condicion = " WHERE p.estado_partido=2 OR p.estado_partido>5";
        if ($temporada_id > 0) { $condicion .= ' AND p.temporada_id='.$temporada_id; }
        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
        //echo $consulta;
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $directos = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    return array(
        'partidos' => $partidos,  
        'directos' => $directos);
}


?>