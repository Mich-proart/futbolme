<?php
define('_FUTBOLME_', 1);

include 'funcionesV2.php';

$tiempo_inicio = microtime_float();


$ids_apis=torneosApiBetHoy(); //recogemos las ids_apis que tienen partidos hoy.

if (count($ids_apis)>0){
   $partidosApi=partidosApiBetHoy($ids_apis); //recogemos los datos de BETSAPI de cada torneo/
} else {  echo "<br />No hay <b>TORNEOS</b> con el livescore de Betsapi para hoy."; }


$tiempo_fin = microtime_float();
$tiempo = $tiempo_fin - $tiempo_inicio;
echo 'Tiempo empleado: '.($tiempo_fin - $tiempo_inicio);


$time = time();
echo '<br />La hora actual en el servidor es: '.date('H:i:s', $time);

function torneosApiBetHoy()
{
    
    $dia = date('Y-m-j'); 
    $campos = 'DISTINCT tor.betsapi ids';
    $tabla = ' partido p';
    $union = ' INNER JOIN temporada te ON te.id=p.temporada_id';
    $union.= ' INNER JOIN torneo tor ON tor.id=te.torneo_id';
    $condicion = ' WHERE p.fecha="'.$dia.'" 
    AND tor.betsapi>0';   
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion;
    //echo $consulta."<br />";
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC); 

    return $resultado;
}

function partidosApiBetHoy($ids){

//$token="7865-b0PXlPMI94xvu3";
$token="153716-4djEyj4e6JZVou";
$dia = date('Y-m-d'); 
$inicio=str_replace("-", "", $dia);
//en juego= inplay
//próximos=upcoming 
$ids[]['ids']=631;
$ids[]['ids']=375;
$ids[]['ids']=1764;
$ids[]['ids']=6084;

    $partidosHoy=array(); $partidos=array();
    foreach ($ids as $value) {
            $url= "";
            $url='https://api.betsapi.com/v1/events/inplay?sport_id=1&token='.$token.'&day='.$inicio.'&league_id='.$value['ids'];
            echo $url."<br />";
            //$resultado = file_get_contents($url); 
            $ch = curl_init($url);     
            curl_setopt($ch, CURLOPT_FAILONERROR, true);
            curl_setopt($ch, CURLOPT_HEADER, 0);    
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true );
            curl_setopt($ch, CURLOPT_ENCODING, "" );
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
            curl_setopt($ch, CURLOPT_AUTOREFERER, true );    
            curl_setopt($ch, CURLOPT_MAXREDIRS, 10 );
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_REFERER, 'http://www.google.com/');
            curl_setopt($ch, CURLOPT_AUTOREFERER, true);
            $resultado = curl_exec($ch);
            print_r(curl_getinfo($ch));
            if(curl_errno($ch)) {
                echo curl_error($ch);
                return 'sin proxy:  - ERROR '.curl_error($ch);
            } 
            curl_close($ch); 
                       
            $resultado =json_decode($resultado,true);            
            $partidos[$value['ids']]=$resultado['results']; 
    }
    
    $partidosHoy=json_encode($partidos);
    $f = '../../json/betsapi/partidosHoy.json'; 
            $fh = fopen($f, 'w');
            fwrite($fh, $partidosHoy);
            fclose($fh);
    return $partidos;    
}

?>


</body>
</html>

