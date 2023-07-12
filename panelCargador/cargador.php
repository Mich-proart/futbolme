<html>
<body>
<?php 
$static_v = 3; 
define('_FUTBOLME_', 1);

require_once '../src/consultas.php';
require_once '../src/funciones.php';
$tiempo_inicio = microtime_float();

/*
ALTER TABLE `torneo` CHANGE `foro` `betsapi` INT(11) NOT NULL DEFAULT '0';
ALTER TABLE `equipo` CHANGE `foro` `betsapi` INT(11) NOT NULL DEFAULT '0';
Para Ramón: INSERT INTO usuario_equipo(usuario_id, equipo_id, orden) 
SELECT 42610434,equipo_id,orden FROM usuario_equipo where usuario_id=15028864
*/

//$ids_apis=torneosApi(); //recogemos las ids_apis que tienen partidos hoy.
//$partidosApi=partidosApi($ids_apis); //recogemos los datos de APIFOOTBALL de cada torneo/grupo de hoy.

$ids_apis=torneosApiBet(); //recogemos las ids_apis que tienen partidos hoy.
//hay que cambiar el nombre de foro por betsapi
//imp($ids_apis);
//if (count($ids_apis)>0){
   $partidosApi=partidosApiBet($ids_apis); //recogemos los datos de BETSAPI de cada torneo/grupo de hoy. 
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

imp($temporadas);

foreach ($temporadas as $value) {
    $temporada = $value;
    $file = '../json/temporada/'.$temporada.'/tipo.json';
    unlink($file);  
    echo $file.'<br />'; 
    $file = '../json/temporada/'.$temporada.'/partidosActiva.json';
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
