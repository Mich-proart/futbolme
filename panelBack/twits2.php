<html>
<body>
<?php 
$static_v = 3; 
define('_FUTBOLME_', 1);

require_once '../src/consultas.php';
require_once '../src/funciones.php';
$tiempo_inicio = microtime_float();

$id=$_GET['id']??0;

if ($id==0){ echo "Falta id"; die;}


$division=4;
if ($id<7){ $division=3; }
if ($id==2){ $division=2; }
if ($id==1){ $division=1; }


    $equipos=Xequipos_temporada($id);

$cabecera=" Toda la información ";

    foreach ($equipos as $key => $value) {

$tw="@".$value['slug'];
$calendario="https://futbolme.com/equipo.php?id=".$value['equipo_id']."&modelo=Calendario";
$clasificacion="https://futbolme.com/equipo.php?id=".$value['equipo_id']."&modelo=Clasificacion";
$lt="https://futbolme.com/equipo.php?id=".$value['equipo_id']."&modelo=Historico";
$tsp="https://futbolme.com/historico/liga/index.php?todos=1&division=".$division."&equipo_id=".$value['equipo_id'];

$titulo=$cabecera." del ".$tw."<br />";

$twit=$titulo;
$twit.=" Calendario ".$calendario."<br />";
$twit.=" Clasificación ".$clasificacion."<br />";
$twit.=" En categoría nacional <br />";
$twit.=" Linea del tiempo-posiciones conseguidas ".$lt."<br />";        
$twit.=" Todos sus partidos-ordenados cronológicamente ".$tsp."<br />"; 

        echo $twit."<hr />";
        /*if (isset($_GET['modo']) && $_GET['modo']=='vsc'){          
        include '../src/cronsTwits.php'; 
        echo "Enviado...<hr />";
        }*/
    }




   



$tiempo_fin = microtime_float();
$tiempo = $tiempo_fin - $tiempo_inicio;
echo 'Tiempo empleado: '.($tiempo_fin - $tiempo_inicio);