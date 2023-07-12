<?php 
define('_PANEL_', 1);
require_once '../includes/config.php';

$fecha = new \DateTime();
$hoy = $fecha->format('Y-m-d');



$tipo_torneo = $_POST['tipo_torneo'];
$temporada = $_POST['temporada'];

if ($tipo_torneo > 2) {
    $temporada_id = $temporada;
    $fecha = $_POST['fecha'];  
} else {
    $temporada = explode(',', $temporada);
    $temporada_id = $temporada[0];
    $jornadas = $temporada[1]; //si tipo torneo=2 jornadas sera el tipo de eliminatoria
    $jornadaActiva = $temporada[2]; //si tipo torneo=2 jornadaActiva sera el id eliminatoria
    $grupo_id = $temporada[3];
    $betsapi = $temporada[4];    
}

if ($tipo_torneo > 2) { ?>
<div class="whitebox">
<?php    
$partidos = listarPartidos($temporada_id, 0, 0, $fecha); 
foreach ($partidos as $key => $fila) {
    include '../forms/formDirectos.php';
} ?>
<div class="col-xs-12" id="addTw"></div>
<div class="text-center"><a style="cursor:pointer" class="ventanaTW">TW</a> - <a  style="cursor:pointer" class="ventanaTW2">OF</a>
<br />Para gestionar un partido tenemos que poner betsapi a uno: <b>1</b><br />
</div>  
<div style="clear:both"></div>
<div style="padding:20px; background-color: yellow">
 <?php
$inicio = date('Y-m-d');
$fin=$inicio;
$api=extraerApi($temporada_id);
$api_futbol=$api['apifutbol'];
$api_id=$api['betsapi'];
$f = '../../../json/betsapi/partidosHoy.json';
$json = file_get_contents($f);
$resultado = json_decode($json, true);

if (isset($resultado[$api_id])){
   foreach ($resultado[$api_id] as $key => $value) {    
    echo "<br />".$value['home']['name']." (<b>".$value['home']['id']."</b>) 
    - ".$value['away']['name']." (<b>".$value['away']['id']."</b>) 
    :: match_id=".$value['id'].''; 

    $idLocal=(int)$value['home']['id'];
    $idVisitante=(int)$value['away']['id'];
    $partido_api=(int)$value['id'];
    $nLocal=$value['home']['name'];
    $nVisitante=$value['away']['name'];
        foreach ($partidos as $vv) {
            $idLocal2=(int)$vv['betsapiL'];
            $idVisitante2=(int)$vv['betsapiV'];
            $partido_api2=(int)$vv['betsapi'];    
            if ($idLocal==$idLocal2 && $idVisitante==$idVisitante2 && $partido_api!=$partido_api2 && $partido_api2<1){
                vincularPartido($vv['partido_id'],$partido_api);
                echo "Partido vinculado <br />";
                break;
            }
        }
    }
} else { 
    echo "<br />No hay partidos en el json de partidosHoy para este torneo ".$temporada_id." betsapi_id: ".$api_id; 
}?>
</div>
<?php   
$resultado = Xequipos_temporada($temporada_id);
include '../forms/formBetsapiTwitter.php'; ?>
<div class="clear"></div>
</div>


<?php } else { //aqui terminan los tipo_torneo=3 (directos) 
    

    

        $APIkey = '3629afd5a679bca50b3d3f77c64225affb76c7cb9a5677a2b5ff560b0b589e13';
        $clau = '&APIkey='.$APIkey;

        include 'ligaPartidosFutbolme.php';
        if ($tipo_torneo==1){ include 'ligaEquipos.php';}
} //aqui cerramos si tipo torneo es 1 o 2.................

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
