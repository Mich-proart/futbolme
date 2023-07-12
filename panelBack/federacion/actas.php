<?php
$static_v = 5; 
define('_FUTBOLME_', 1);

require_once 'consultas.php';
require_once 'funciones.php';
require_once '../../src/funciones.php';

$tiempo_inicio = microtime_float(); ?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<link href="/css/bootstrap.min.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/main.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/style.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<noscript><link rel="stylesheet" href="/css/allcss.css?v=<?php echo $static_v; ?>"></noscript>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/js/federacion.js?=<?php echo $static_v; ?>"></script>
<script src="/js/ajax.js?=<?php echo $static_v; ?>"></script>
</head>
<body>

	<div style="padding: 10px; background-color: white">

<?php

$mysqli = conectarFM();

if (!empty($_POST)){
    //imp($_POST);
    $partido_id=$_POST['partido_id'];
    $temporada_id=$_POST['temporada_id'];

    foreach ($_POST['indice'] as $i) {

        

        if (isset($_POST['check'][$i])){
            $sql='SELECT id FROM '.$_POST['tabla'][$i].' WHERE jugador_id='.$_POST['jugador'][$i].' AND partido_id='.$partido_id.' AND tipo='.$_POST['tipo'][$i].' AND minuto='.$_POST['minuto'][$i];

            $resultadoSQL = mysqli_query($mysqli, $sql);
            $r = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
            //var_export(count($r));

            if (count($r)==0){

            $observaciones=$_POST['posicion'][$i]??'';

            $sq='INSERT INTO '.$_POST['tabla'][$i].' (jugador_id,partido_id,temporada_id,minuto,tipo,esLocal,observaciones) 
            VALUES ('.$_POST['jugador'][$i].','.$partido_id.','.$temporada_id.','.$_POST['minuto'][$i].','.$_POST['tipo'][$i].','.$_POST['esLocal'][$i].',"'.$observaciones.'")';
            mysqli_query($mysqli, $sq);
            echo $sq.'<br />';

            } else { echo 'registro ya grabado <br />'; }
        }

    }

   $_GET['id']=$partido_id;
   $_GET['acta']=$_POST['acta'];
}

$partido_id=$_GET['id'];
$acta=$_GET['acta'];

$sql='SELECT p.id, p.temporada_id, tor.comunidad_id, p.equipoLocal_id, p.equipoVisitante_id, p.jornada,
(select nombreCorto from equipo where id=p.equipoLocal_id) equipoLocal, (select nombreCorto from equipo where id=p.equipoVisitante_id)equipoVisitante, goles_local, goles_visitante
FROM partido p
INNER JOIN temporada te ON te.id=p.temporada_id
INNER JOIN torneo tor ON tor.id=te.torneo_id
WHERE p.id='.$partido_id;

$resultadoSQL = mysqli_query($mysqli, $sql);
$r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);



$comunidad_id=($r['comunidad_id']-1);
$temporada_id=$r['temporada_id'];
$jornada=$r['jornada'];
$equipoLocal_id=$r['equipoLocal_id'];
$equipoVisitante_id=$r['equipoVisitante_id'];
$equipoLocal=$r['equipoLocal'];
$equipoVisitante=$r['equipoVisitante'];
$goles_local=$r['goles_local'];
$goles_visitante=$r['goles_visitante'];

echo 'Partido: <a href="/partido.php?id='.$partido_id.'" target="_blank">'.$partido_id.'</a>
<b>'.$equipoLocal.' <span style="color:maroon">'.$goles_local.'-'.$goles_visitante.'</span> '.$equipoVisitante.'</b> - Temporada: <a href="/temporada.php?id='.$temporada_id.'" target="_blank"> '.$temporada_id.' - Jornada '.$jornada.'</a><br />';

$file = '../../json/temporada/'.$temporada_id.'/ac-'.$jornada.'-'.$acta.'-'.$partido_id.'.json';

if (!@file_exists($file)) { 

    require_once 'funciones/urlFederaciones.php';

    
    
    $url=str_replace('xxx', $acta, $urlActa);
    echo $url.' BD: '.$bd.' - Carpeta: '.$carpeta.'<br />';


    $mysqliFB = conectar(); 
    $sql='DELETE FROM '.$bd.' WHERE fallo>1 AND uso=0 AND mantener=0';
    $resultadoSQL = mysqli_query($mysqliFB, $sql);

    $sql='SELECT id, ip, uso FROM '.$bd.' WHERE fallo<6 ORDER BY uso DESC, fallo LIMIT 8';
    $resultadoSQL = mysqli_query($mysqliFB, $sql);
    //echo $sql;
    $proxis = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
    $proxis = array_reverse($proxis); 

    require_once ('../simple/simple_html_dom.php');


    $fallo=0;
    foreach ($proxis as $key => $value) {
        $proxi=$value['ip'];
        $id_proxi=$value['id']; 
        $uso_proxi=$value['uso'];
        $html = new simple_html_dom();
        $content=getPage($url,$proxi,$id_proxi); 

        if (strlen($content)>1000) { break; }
        $sql='UPDATE '.$bd.' SET fallo=fallo+1  WHERE id='.$id_proxi;
        mysqli_query($mysqliFB, $sql); 
        unset($proxis[$key]);unset($proxi);unset($id_proxi);unset($uso_proxi);
        $html->clear();
        unset($html);  
        $totalProxis=count($proxis);
        echo ' - Quedan '.$totalProxis.' proxis por usar<br />';
        if ($totalProxis==0){ $fallo=1;break; }
    }
    echo '<br />fallo='.$fallo.'<br />';

    if ($fallo==0){
        $sql='UPDATE '.$bd.' SET uso=uso+1 WHERE id='.$id_proxi;
        mysqli_query($mysqliFB, $sql); 
        echo '<br />----proxi: '.$id_proxi.' uso: '.$uso_proxi; 
        switch ($comunidad_id) {
            case 2:
            case 6:
            case 8:
            case 15:
                include('../simple/'.$carpeta.'/extraerActa.php');
                break;
            case 1: 
            case 13:            
            case 14:
            case 16:
            case 17:
            	include('../simple/'.$carpeta.'/extraerActa01.php'); break; 
            case 3:
            case 9:
            case 10:                 
                include('../simple/'.$carpeta.'/extraerActa.php');
                break;     
                
            case 5:include('../simple/'.$carpeta.'/extraerActaCat.php');break; 
            case 7:
            case 11: //faltaria grabar el id acta.
            case 18:  
                include('../simple/'.$carpeta.'/extraerActaM.php');
                break;
            case 0:  
                include('../simple/'.$carpeta.'/extraerActa2.php');
                break;
        }

        $html->clear();
        unset($html); 
      



            $file = '../../json/temporada/'.$temporada_id.'/ac-'.$jornada.'-'.$acta.'-'.$partido_id.'.json';
            echo $file.'<br />';

            guardarJSON($jugador, $file);
    	
    } // si fallo es cero


} else {

    $json = file_get_contents($file);
    $jugador = json_decode($json, true);


}

include('../../panelCargador/actasFunciones.php');

echo '<h1>Datos</h1>';
if ($temporada_id<7){
$urlActa='https://www.rfef.es/actas?pid=xxx';
$url=str_replace('xxx', $acta, $urlActa);
echo '<a href="'.$url.'" target="_blank">'.$url.'</a> --------------- <a href="?acta='.$acta.'&id='.$partido_id.'">refrescar</a><br />';
include('actaDatosRFEF.php');
} else {
include('actaDatos.php');
}





die;


?>

