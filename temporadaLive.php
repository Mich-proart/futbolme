<?php 
$jornadas=array();
$equipos=array();
$temp_id=$temporada_id-1000000;
$carpeta = './json/newBetsapi/'.$temp_id;
$token="7865-b0PXlPMI94xvu3";
if (!file_exists($carpeta)) { mkdir($carpeta, 0777, true);} 

$cachetime = 86400; //86400 un dia.
$f = $carpeta.'/proximos.json';
$url='https://api.betsapi.com/v2/events/upcoming?sport_id=1&token='.$token.'&league_id='.$temp_id;
if (@file_exists($f)) { 
    $fichero_time = @filemtime($f);
    if ((time() - $fichero_time)> $cachetime) {
      $resultado = file_get_contents($url); //creamos fichero
      guardarFILE($resultado, $carpeta.'/proximos.json');   
       //echo 'reGeneramos fichero<br />';         
    } else {
      $resultado = file_get_contents($f);//leemos fichero
      //echo 'Leemos fichero<br />';
    }
} else {
    $resultado = file_get_contents($url); 
    guardarFILE($resultado, $carpeta.'/proximos.json');//creamos fichero
    //echo 'Generamos fichero nuevo<br />';
}    
$proximos = json_decode($resultado, true);
unset($resultado);
$jornadaActiva=$proximos['results'][0]['extra']['round']??0;
$equipo_id=$proximos['results'][0]['home']['id']??0;
$nombreTorneo=$proximos['results'][0]['league']['name']??'Torneo';


$cachetime = 86400; //86400 un dia.
$f = $carpeta.'/terminados.json';
$url='https://api.betsapi.com/v2/events/ended?sport_id=1&token='.$token.'&league_id='.$temp_id;
if (@file_exists($f)) { 
    $fichero_time = @filemtime($f);
    if ((time() - $fichero_time)> $cachetime) {
      $resultado = file_get_contents($url); //creamos fichero
      guardarFILE($resultado, $carpeta.'/terminados.json');            
    } else {
      $resultado = file_get_contents($f);//leemos fichero
    }
} else {
    $resultado = file_get_contents($url); 
    guardarFILE($resultado, $carpeta.'/terminados.json');//creamos fichero
}    
$terminados = json_decode($resultado, true);
unset($resultado);
$nombreTorneo=$terminados['results'][0]['league']['name']??'Torneo';



$cachetime = 86400; //86400 un dia.
$f = $carpeta.'/clasificacion.json';
$url='https://api.betsapi.com/v2/league/table?&token='.$token.'&league_id='.$temp_id;
if (@file_exists($f)) { 
    $fichero_time = @filemtime($f);
    if ((time() - $fichero_time)> $cachetime) {
      $resultado = file_get_contents($url); //creamos fichero
      guardarFILE($resultado, $carpeta.'/clasificacion.json');            
    } else {
      $resultado = file_get_contents($f);//leemos fichero
    }
} else {
    $resultado = file_get_contents($url); 
    guardarFILE($resultado, $carpeta.'/clasificacion.json');//creamos fichero
}    
$clasificacion = json_decode($resultado, true);
unset($resultado);
$clas=$clasificacion['results'];
if ($clas['season']['has_leaguetable']==1){ 
    $tipo_torneo=1; 
    foreach ($proximos['results'] as $key => $value) {
      if (isset($value['extra']['round'])){
        $jornadas[$value['extra']['round']][$value['id']]=$value;
      } else {
        $jornadas[1000][$value['id']]=$value;
      }
      $equipos[$value['home']['id']][$value['id']]=$value;
      $equipos[$value['away']['id']][$value['id']]=$value;
    }
    foreach ($terminados['results'] as $key => $value) {
      $j=$value['extra']['round']??0;
      $jornadas[$j]=$value;
      $equipos[$value['home']['id']][$value['id']]=$value;
      $equipos[$value['away']['id']][$value['id']]=$value;
    }

} else { $tipo_torneo=2; }

$titulo = $nombreTorneo; 
require_once 'includes/head.php'; ?>
        <title><?php echo $titulo; ?></title>
    </head>
   <?php require_once 'includes/contenedorSup.php'; ?>
    <div class="col-xs-12 nopadding whitebox clear">
        <div class="col-xs-12 nopadding whitebox clear">
                <div class="col-xs-2">
                    <div class="h10 clear"></div>
                    <div class="h10 clear"></div>
                </div>
                <div class="col-xs-10 nopadding boldfont">      
                    <h2 class="hidden-xs"><?php echo $nombreTorneo; ?></h2>
                    <h4 class="visible-xs"><?php echo $nombreTorneo; ?></h4>
                    <span class="txt11"><?php //echo $nombrePais; ?></span>
                </div>
        </div>
    <?php 

        $f='---';        
        foreach ($proximos['results'] as $key => $partido) {
        $status = $partido['time_status'];
         if (isset($partido['extra']['round']) && $partido['extra']['round']>($jornadaActiva+1)){ break; }
         include 'includes/livescore/partidoDirecto.php';
         $f=$partido['fecha'];
        } 

        if ($tipo_torneo==1){ ?>
            <div class="col-xs-12 whitebox nopadding one-bordergrey-vert">
            <?php 
            $total=$clas['overall']['tables'][0];  
            include('includes/livescore/clasificacion.php');
            $local=$clas['home']['tables'][0];
            $visitante=$clas['away']['tables'][0];?>
            </div>
        <?php } else { ?>
            <div class="col-xs-12 nopadding whitebox clear">
                    <div class="col-xs-2">
                        <div class="h10 clear"></div>
                        <div class="h10 clear"></div>
                    </div>
                    <div class="col-xs-10 nopadding boldfont">      
                        <h3>Últimos partidos </h3>
                    </div>
            </div>

           <?php 
            $f='---'; $contador=0;
            foreach ($terminados['results'] as $key => $partido) {
            $contador++; if ($contador>20){break;}
            $status = $partido['time_status'];
            if ($status!=3){ continue; }
             include 'includes/livescore/partidoDirecto.php';
             $f=$partido['fecha'];
            } 

        } ?>

   


    </div>
    <?php require_once 'includes/contenedorInf.php';
    die;