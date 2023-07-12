<html>
<body>
<?php 
define('_FUTBOLME_', 1);

include 'funcionesV2.php';

$tiempo_inicio = microtime_float();

$ids_apis=torneosApiBeteu2(); //recogemos las ids_apis que tienen partidos hoy que no sean de españa y id de torneo mayor que 399.
//hay que cambiar el nombre de foro por betsapi
//echo 'Ids que tienen partidos hoy<br />';
//imp($ids_apis);
//if (count($ids_apis)>0){
   $partidosApi=partidosApiBet($ids_apis); //recogemos los datos de BETSAPI de cada torneo/grupo de hoy. 

  // echo 'Partidos extraidos de los ids<br />';
  // imp($partidosApi);


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


$time = time();
echo '<br />La hora actual en el servidor es: '.date('H:i:s', $time);

?>


</body>
</html>
