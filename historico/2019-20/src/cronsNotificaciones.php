<?php

foreach ($appuser as $value) {

    
    $idEquipos = $value['equipoLocal_id'].','.$value['equipoVisitante_id'];
    $resultado = extraerToken($idEquipos);
    $formato=0; // tengo que preguntarle a Javier a que afecta el formato.
    
    if (count($resultado) > 0) {
        $local = $value['local'];
        $visitante =$value['visitante'];       

        $enlace = '/resultados-directo/torneo/xxx/'.$value['temporada_id'].'/';
        if ($value['evento'] > 1 && $value['evento'] < 10 && 3 != $value['evento']) {
            $enlace = 'partido.php?id='.$value['partido_id'];
        }
        if ($value['evento'] > 19 && $value['evento'] < 25) {
            $enlace = 'partido.php?id='.$value['partido_id'];
        }
        if ('LIGA DE CAMPEONES DE LA UEFA' == $value['nombre_torneo']) {
            $value['nombre_torneo'] = 'CHAMPIONS LEAGUE';
        }

        $message = [
            'partido_id' => $value['partido_id'],
            'formato' => $formato,
            'valor' => $value['valor'],
            'equipoLocal_id' => $value['equipoLocal_id'],
            'equipoVisitante_id' => $value['equipoVisitante_id'],
            'local' => $local,
            'visitante' => $visitante,
            'resultado' => $value['resultado'],
            'nombre_torneo' => $value['nombre_torneo'],
            'enlace' => 'https://futbolme.com/'.$enlace,
        ];

        $tokens = array();
        foreach ($resultado as $key => $tks) {
            if (strlen($tks['token']) > 1) {
                $tokens[] = $tks['token']; //recojo los tokens
            }
        }

        imp($tokens);
        imp($message);
        //die('Esto es lo que se enviaria a la app');
        //$message_status = send_notification($tokens, $message);
        //imp($message_status);


    } //si resultado>0 es que hay tokens.

} //bucle de appuser.

function extraerToken($idEquipos)
{
    $mysqli = conectar();
    $consulta = 'SELECT ue.usuario_id, ue.equipo_id, ut.token FROM usuario_equipo ue
	INNER JOIN usuario_token ut ON ue.usuario_id=ut.id
	WHERE ue.equipo_id IN ('.$idEquipos.')';
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
    //echo $consulta."<br />";
    return $resultado;
}

function send_notification($tokens, $message)
{
    $url = 'https://fcm.googleapis.com/fcm/send';
    $headers = array('Content-Type: application/json',
            'Authorization:key=AAAANkcO8MU:APA91bFKbvALrtkYs-zBDqNLAKFkOhh84S96ujj940X0FRurAfYXQ7-Xdzk3kJhKAcQxCpGfSeiTlc-vjCBNZQ1_XsSmipQKk7zOZyJNkz-wg0s-Hv3zoR1BMeOkv0p20MzBLJaGUjJN',
        );

    $fields = array(
            'registration_ids' => $tokens,
            'data' => $message,
        );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    if (false === $result) {
        die('Curl failed: '.curl_error($ch));
    }

    curl_close($ch);

    return $result;
}

function nombreDiaMini($fecha)
{
    $fecha = strtotime($fecha);
    $fecha = gmmktime(0, 0, 0, date('n', $fecha), date('j', $fecha), date('Y', $fecha));
    setlocale(LC_TIME, 'spanish');
    $nombre = strftime('%A, %d de %b', $fecha);

    return $nombre;
}
?>
