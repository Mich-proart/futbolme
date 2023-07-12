<?php
//datos de la base de datos
function imp($ob)
{
    if (!empty($ob)) {
        echo '<pre>';
        print_r($ob);
        echo '</pre>';
    }
}

function nombreDiaCompleto($fecha)
{
    $fecha = strtotime($fecha);
    $fecha = gmmktime(0, 0, 0, date('n', $fecha), date('j', $fecha), date('Y', $fecha));
    setlocale(LC_TIME, 'spanish');
    $nombre = utf8_encode(strftime('%A, %d de %B de %Y', $fecha));

    return $nombre;
}

function poner_guion($cadena)
    {
        // $cadena = strtolower($cadena);

        $cadena = utf8_decode($cadena);
        $cadena = trim($cadena);
        $cadena = str_replace('"', '', $cadena);
        $cadena = str_replace(' ', '-', $cadena);
        $cadena = str_replace('?', '', $cadena);
        $cadena = str_replace('+', '', $cadena);
        $cadena = str_replace(':', '', $cadena);
        $cadena = str_replace('??', '', $cadena);
        $cadena = str_replace('`', '', $cadena);
        $cadena = str_replace('´', '', $cadena);
        $cadena = str_replace("'", '', $cadena);
        $cadena = str_replace('!', '', $cadena);
        $cadena = str_replace('¿', '', $cadena);
        $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýýþÿ??´`';
        $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuuyybyRr--';
        $cadena = strtr($cadena, utf8_decode($originales), $modificadas);

        $cadena = strtolower($cadena);

        return $cadena;
    }

function desglosarTexto($texto)
    {
        $txt3 = '';
        $txt2 = '';
        $txt1 = '';
        $texto = explode('*', $texto);
        $valores = count($texto);
        //  echo "<br />valores: ".$valores;
        if (1 == $valores) {
            $txt3 = $texto[0];
            $txt1 = '';
            $txt2 = '';
        }
        if (2 == $valores) {
            $t = $texto[1];
            $l = substr($t, 0, 1);
            if ('A' == $l) {
                $txt1 = substr($t, 1);
                $txt2 = '';
            } else {
                $txt2 = substr($t, 1);
                $txt1 = '';
            }
            $txt3 = $texto[0];
        }
        if (3 == $valores) {
            $txt1 = substr($texto[1], 1);
            $txt2 = substr($texto[2], 1);
            $txt3 = $texto[0];
        }

        $txt3=str_replace('<a','<span style="color:navy"',$txt3);
        $txt1=str_replace('<a','<span style="color:navy"',$txt1);
        $txt2=str_replace('<a','<span style="color:navy"',$txt2);

        $txt3=str_replace('</a>','</span>',$txt3);
        $txt1=str_replace('</a>','</span>',$txt1);
        $txt2=str_replace('</a>','</span>',$txt2);

        $texto[0] = $txt3;
        $texto[1] = $txt1;
        $texto[2] = $txt2;

        return $texto;
    }


$temporada_id=$_POST['temporada_id'];

    $tele='https://futbolme.eu/partidos-televisados';

    $f = "../../static/img/qr/televisados.png";
    if (!file_exists($f)) {
        QRcode::png($tele, "../../static/img/qr/televisados.png", 'L', 10, 5);        
    }

    $mail='mailto:futbolme@gmail.com?subject=INFORMACION QR PUBLICITARIO';

    $f = "../../static/img/qr/mail.png";
    //if (!file_exists($f)) {
        QRcode::png($mail, "../../static/img/qr/correo.png", 'L', 10, 5);        
    //} 


    $f = '../../../json/temporada/'.$temporada_id.'/tipo.json';
    $json = file_get_contents($f);
    $datos = json_decode($json, true);
    
    
    $nombre=$datos['torneo']['nombre'];
    $activa=$datos['torneo']['jornadaActiva'];

    

    $datosActiva=array();

    foreach ($datos['partidos'] as $k => $v) {
        if($v['jornada']==$activa){ $datosActiva[]=$v; }
    }

    $url='https://futbolme.eu/resultados-directo/torneo/'.poner_guion($nombre).'/'.$temporada_id.'/';
        
    $f3 = "../../static/img/qr/torneo_".$temporada_id.".png";

    if (!file_exists($f3)) {
        QRcode::png($url, "../../static/img/qr/torneo_".$temporada_id.".png", 'L', 10, 5);        
    } 

    
    $jornadaActiva=$datos['torneo']['jornadaActiva'];
    $equipos=$datos['equipos'];

    foreach ($equipos as $k => $v) {
        $url='https://futbolme.eu/resultados-directo/equipo/'.poner_guion($v['nombre']).'/'.$v['equipo_id'].'/calendario';
        $f4 = "../../static/img/qr/equipo_".$v['equipo_id'].".png";
        if (!file_exists($f4)) {
            QRcode::png($url, "../../static/img/qr/equipo_".$v['equipo_id'].".png", 'L', 10, 5);        
        } 
    }

    $clasificacion=$datos['clasificacion']['clasificacionFinal'];
    $leyenda=$datos['clasificacion']['leyenda'];


    //echo '<pre>';print_r($datosActiva);echo '</pre>';die;


?>