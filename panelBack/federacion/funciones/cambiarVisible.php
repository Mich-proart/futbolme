<?php
define('_FUTBOLME_', 1);

require_once '../../../src/consultas.php'; //conectando con futbolme

$id=$_POST['id'];
$visible=$_POST['visible'];
$temporada_id=$_POST['temporada_id'];


if ($visible==4) { 
	$nuevo_visible=5; 
	
	Xtipo($temporada_id);
	echo '<a href="/temporada.php?id='.$temporada_id.'">Ver</a><hr />';

} else { $nuevo_visible=4; }

$sql="UPDATE torneo SET visible=".$nuevo_visible." WHERE id=".$id;
$mysqli = conectar();
mysqli_query($mysqli, $sql);

echo 'Visible modificado a '.$nuevo_visible;


function diferenciaFechas($fecha){ 
    $fecha1 = date('Y-m-d H:i:s');
    $fecha2 = date($fecha);
    $fecha1 = date_create($fecha1);
    $fecha2 = date_create($fecha2);
    $diferencia = date_diff($fecha2, $fecha1);
    return $diferencia;    
}

function guardarJSON($array, $ruta)
{
    //utf8_encode_deep($array);
    $jsonencoded = json_encode($array, JSON_UNESCAPED_UNICODE);
    echo print_json_last_error(json_last_error());
    $fh = fopen($ruta, 'w');
    fwrite($fh, $jsonencoded);
    fclose($fh);
    //echo "Creado el fichero ".$ruta;
}

function print_json_last_error($error)
{
    $mensaje = '';
    switch ($error) {
        case JSON_ERROR_NONE:
            //$mensaje = ' - Sin errores';
            break;
        case JSON_ERROR_DEPTH:
            $mensaje = ' - Excedido tamaño máximo de la pila';
            break;
        case JSON_ERROR_STATE_MISMATCH:
            $mensaje = ' - Desbordamiento de buffer o los modos no coinciden';
            break;
        case JSON_ERROR_CTRL_CHAR:
            $mensaje = ' - Encontrado carácter de control no esperado';
            break;
        case JSON_ERROR_SYNTAX:
            $mensaje = ' - Error de sintaxis, JSON mal formado';
            break;
        case JSON_ERROR_UTF8:
            $mensaje = ' - Caracteres UTF-8 malformados, posiblemente están mal codificados';
            break;
        default:
            $mensaje = ' - Error desconocido';
    }

    return $mensaje;
}





die;
?>

