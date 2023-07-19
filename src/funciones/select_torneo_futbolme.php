<?php 
define('_FUTBOLME_', 1);
require_once '../consultas.php';
require_once '../funciones.php';
/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/

//imp(substr($_SERVER['HTTP_REFERER'],0,30));
//var_dump($_SERVER['HTTP_REFERER']);
//https://futbolme.com/panelBack/index.php

$tipo_torneo = $_POST['tipo_torneo'];
$temporada = $_POST['temporada'];


$temporada = explode(',', $temporada);



$temporada_id = $temporada[0];
$jornadas = $temporada[1]; //si tipo torneo=2 jornadas sera el tipo de eliminatoria
$jornadaActiva = $temporada[2]; //si tipo torneo=2 jornadaActiva sera el id eliminatoria
$grupo_id = $temporada[3]; //si tipo torneo=2 jornadaActiva sera el id eliminatoria
$betsapi = $temporada[4]??0; //si tipo torneo=2 jornadaActiva sera el id eliminatoria
$grupo_id = $temporada[3]??null;

include '../../includes/diseny/formResultados.php';


function lamaslarga($string)
    {
        $cadena = '';
        $l = explode(' ', $string);
        if (count($l) > 1) {
            $l2 = '';
            foreach ($l as $value) {
                if (strlen($value) > strlen($l2) && 'Dinamo' != $value && 'Mladost' != $value) {
                    $l2 = $value;
                }
            }
            $cadena = $l2;
        }

        return $cadena;
    }
?>