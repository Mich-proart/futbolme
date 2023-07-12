<html>
<body>
<?php 
$static_v = 3; 
define('_FUTBOLME_', 1);

require_once '../src/consultas.php';
require_once '../src/funciones.php';
$tiempo_inicio = microtime_float();

$categoria_torneo=$_GET['ct']??1;


$fecha = new \DateTime();
    $dia = $fecha->format('Y-m-d');
    //$dia = "2018-09-30";
    $resultado = partidosDia($dia);
    
    foreach ($resultado['partidos'] as $key => $partido) {

        if ($partido['categoria_torneo_id']!=$categoria_torneo){ continue;}
        if (strlen($partido['twLocal'])<2){ continue; }
    	$pgPartido = '/resultados-directo/partido/'.poner_guion($partido['local']).'-'.poner_guion(
        $partido['visitante']
    ).'/'.$partido['id'];
    	$horaPrevista = DateTime::createFromFormat('H:i:s', $partido['hora_prevista']);

        if ($partido['estado_partido']!=1){
            $twit="@".$partido['twLocal']." - @".$partido['twVisitante']."  ".$horaPrevista->format('H:i')."\n ".$partido['torneoCorto']."\n Comentarios Twitter en https://futbolme.com".$pgPartido."\n Resto de la jornada y clasificación en https://futbolme.eu/temporada.php?id=".$partido['temporada_id']."\n"; 
        } else {
            $twit="@".$partido['twLocal']." ".$partido['goles_local']."-".$partido['goles_visitante']." @".$partido['twVisitante']."\n ".$partido['torneoCorto']."\n Comentarios Twitter en https://futbolme.com".$pgPartido."\n Resto de la jornada y clasificación en https://futbolme.eu/temporada.php?id=".$partido['temporada_id']."\n"; 
        }
    	
    	
    	echo $twit."<hr />";

    	if (isset($_GET['modo']) && $_GET['modo']=='vsc'){			
			include '../src/cronsTwits.php'; 
			echo "Enviado...<hr />";

		}
    }

echo "<a href='/panelBack/twits.php?modo=vsc&ct=1'>Enviar twits Nacional</a> ";
echo "<a href='/panelBack/twits.php?modo=vsc&ct=4'>Enviar twits Autonómica</a> ";
echo "<a href='/panelBack/twits.php?modo=vsc&ct=5'>Enviar twits Juvenil</a> ";
echo "<a href='/panelBack/twits.php?modo=vsc&ct=7'>Enviar twits Femenino</a> ";
echo "<a href='/panelBack/twits.php?modo=vsc&ct=3'>Enviar twits UEFA</a> ";
echo "<a href='/panelBack/twits.php?modo=vsc&ct=9'>Enviar twits Europa</a> ";


$tiempo_fin = microtime_float();
$tiempo = $tiempo_fin - $tiempo_inicio;
echo 'Tiempo empleado: '.($tiempo_fin - $tiempo_inicio);

