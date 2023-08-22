<html>
<body>
<?php 
define('_FUTBOLME_', 1);
date_default_timezone_set('Europe/Madrid');
include 'funcionesV2.php';

$tiempo_inicio = microtime_float();

$ids_apis=torneosApiBet(); //recogemos las ids_apis que tienen partidos hoy - SOLO TORNEOS ESPAÑOLES.
//hay que cambiar el nombre de foro por betsapi
//echo 'Ids que tienen partidos hoy<br />';

//if (count($ids_apis)>0){
   $partidosApi=partidosApiBet($ids_apis); //recogemos los datos de BETSAPI de cada torneo/grupo de hoy. 

   //echo 'Partidos extraidos de los ids<br />';
   



   if (count($partidosApi)>0){
        partidosHoyBet($partidosApi);
    } else {
        echo "<br />No hay partidos en el livescore de Betsapi para hoy."; 
    }
//} else {  echo "<br />No hay <b>TORNEOS</b> con el livescore de Betsapi para hoy."; }

$movimientos = vaciarMovimientos(); //$temporadas son las temporadas afectadas por los movimientos.
        //si hay modificaciones se hara generarPartidosDia($dia);
//Nos devuelve las temporadas afectadas y los eventos generados
$temporadas=$movimientos['temporadas'];
$eventos=$movimientos['eventos'];
echo "<br />movimientos vaciados...<br />";

//se pasan las temporadas.

//imp($temporadas);

include 'cargadorJson.php';


foreach ($temporadas as $value) {
    $temporada = $value;
    $file = '../../json/temporada/'.$temporada.'/tipo.json';
    unlink($file);  
    echo $file.'<br />'; 
    $file = '../../json/temporada/'.$temporada.'/partidosActiva.json';
    unlink($file);    
    echo $file.'<br />';    
}


echo "Ahora generamos los eventos...<br />";
generarEventos($eventos); //se generan los eventos y se enviarian las notificaciones



generarPartidosDia();
cabeceras();



echo '<br><br>Movimientos actualizados';
$tiempo_fin = microtime_float();
$tiempo = $tiempo_fin - $tiempo_inicio;
echo 'Tiempo empleado: '.($tiempo_fin - $tiempo_inicio);


//$time = time();
$timezone = new DateTimeZone('Europe/Madrid');
$currentTime = new DateTime('now', $timezone);
echo '<br />La hora actual en el servidor es: '.$currentTime->format('H:i:s');;

?>


</body>
</html>
