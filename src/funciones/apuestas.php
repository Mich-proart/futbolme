
<?php 
define('_FUTBOLME_', 1);
require_once '../config.php';
require_once '../consultas.php';
require_once '../funciones.php';

$partido_id = $_POST['id'];
$temporada_id = $_POST['temporada_id'];

$partido = Xpartido($partido_id);

if (!isset($partido['partidoAPI'])){ die('<div class="col-xs-12 alert nopadding">Todavía no tenemos apuestas para este partido.<a href="#" class="close" data-dismiss="alert" style="margin-right:20px; font-size: 30px">&times;</a></div>'); }


$APIkey = '3629afd5a679bca50b3d3f77c64225affb76c7cb9a5677a2b5ff560b0b589e13';
$key="&APIkey=".$APIkey;

$f = '../../json/temporada/'.$partido['temporada_id'].'/apifootball/p_'.$partido['partidoAPI'].'.json';


        $cTime = 60 * 60; //una hora.
        if (@file_exists($f)) { $f_time = @filemtime($f); } else { $f_time = 0; }

        if ((time()-$cTime) > $f_time) { 
            
            $metodo="action=get_odds";
            $from="&from=".$partido['fecha'];
            $to="&to=".$partido['fecha'];
            $d="&match_id=".$partido['partidoAPI'];
            //$d="&match_live=1"; // league_id = 1745
            $metodo.=$from.$to.$d;
            $url= "https://apifootball.com/api/?".$metodo.$key; 

            //echo $url."<br />"; 
            
            $resultado  = file_get_contents($url); 


            if (isset($resultado)) {
                $fh = fopen($f, 'w');
                fwrite($fh, $resultado);
                fclose($fh);
                //echo "Generado el fichero a las ".date ("F d Y H:i:s.",time());
                
            } else {

                //echo "Por algún motivo no se ha generado el fichero.";
                
            }

        } else { 

            //echo "La última modificación de $f fue: " . date ("F d Y H:i:s.", filemtime($f));
            
        }

    $path = $f;
    $json = file_get_contents($path);
    $datos = json_decode($json, true);

    $datosBwin=array();
    foreach ($datos as $key => $value) {
        if ($value['odd_bookmakers']!='bwin'){ continue; }
        $datosBwin[]=$value;
    }


   
  

$idzone = (1788181 + $_SESSION['app']);
$enlace_bwin_generico = 'https://mediaserver.bwinpartypartners.com/renderBanner.do?zoneId='.$idzone;
?>
<div class="col-xs-12 alert text-center" style="margin-top: 20px;">
    <a href="#" class="close" data-dismiss="alert" style="margin-right:20px; font-size: 30px">&times;</a>
<div class="clear"></div>



<table class="table table-bordered table-condensed greenbox nomargin txt11">
<tr class="greenbox"><td>La mejor apuesta con Bwin <img alt="Proovedor Apuestas" src="/img/partners/bwin.png" style="  margin-top: 2px;"></td>
<td class="text-center boldfont">1</td>
<td class="text-center boldfont">X</td>
<td class="text-center boldfont">2</td>
<td class="text-center boldfont">1X</td>
<td class="text-center boldfont">12</td>
<td class="text-center boldfont">x2</td>


</tr>
<?php foreach ($datosBwin as $key => $value) {
    
    $rutaImagen = '/img/promociones/bwin.PNG';    ?>
<tr class="whitebox">
<td>

<?php if (0 != $partido['apuesta_torneo']) {
    $enlace_bwin = 'https://sports.bwin.es/es/sports#eventId=&leagueIds='.$partido['apuesta_torneo'].'&marketGroupId=&page=0&sportId=4&zoneId=1789262';

    $enlace_bwin2 = 'https://sports.m.bwin.es/es/sports/sport/4/region/'.$partido['id_bwin'].'/league/'.$partido['apuesta_torneo'].'?zoneId=1651972'; ?>
    <div style="float:right;">
            <span style="font-size:14px;">
            <a href="<?php echo $enlace_bwin; ?>" rel="nofollow" target="blank"
               title="Apuesta a los partidos de <?php echo $partido['nombreTemporada']; ?> en BWIN">
                     Apuesta a los partidos de <?php echo $partido['nombreTemporada']; ?> en BWIN
            </a>
        </span>
    </div>
    <?php
} ?>



</td>
<td class="text-center"><?php echo $value['odd_1']; ?></td>
<td class="text-center"><?php echo $value['odd_x']; ?></td>
<td class="text-center"><?php echo $value['odd_2']; ?></td>
<td class="text-center"><?php echo $value['odd_1x']; ?></td>
<td class="text-center"><?php echo $value['odd_12']; ?></td>
<td class="text-center"><?php echo $value['odd_x2']; ?></td>
</tr>
<?php
} ?>
</table>
</div>
