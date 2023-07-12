<?php 
define('_FUTBOLME_', 1);
require_once 'src/config.php';

$pagina = 'index';
$c_finales = 0;$c_resto = 0;$c_partidos = 0;

$path = './json/directos.json';
$json = file_get_contents($path);
$directos = json_decode($json, true);
$c_directos = count($directos);

$path = './json/index.json';
$json = file_get_contents($path);
$partidosDia = json_decode($json, true);
$cabeceras = array();
foreach ($partidosDia as $key => $v) {
    if (1 == $v['estado_partido']) {
        ++$c_finales;
        continue;
    }
    ++$c_resto;
}

$c_partidos = ($c_directos + $c_finales + $c_resto);

$ct=$_GET['ct']??1;
$ct=(int)$ct;
$mostrarPartidos=150;
$categorias=array();
$enJuegoCat=array();


$footters=0;

if (count($partidosDia)>30){
    if ($ct>0){
        $categorias[$ct]=$ct;

        if ($dia == $hoy) {
            $directos1=array(); 
            foreach ($directos as $v) {    
                $div=$v['division_id'];  
                if ($div<4){ $div=1; }
                if ($div==8){ 
                    if ($v['categoria_torneo_id']==7) { $div=9; }
                    if ($v['categoria_torneo_id']==5) { $div=8; }
                    if ($v['categoria_torneo_id']==9) { $div=10; }
                    if ($v['categoria_torneo_id']<4) { $div=1; }
                }
                $enJuegoCat[$div][]=$v;

                if ($div!=$ct){ $categorias[$div]=$div; continue; }
                    
               $directos1[]=$v;
            }
            unset($directos);$directos=$directos1; unset($directos1);
        }
        
        
        $partidosDia1=array(); 

        
        /*foreach ($partidosDia as $v) {   
            
            if ($v['categoria_torneo_id']<4) { $v['categoria_torneo_id']=1; }      
            if ($v['categoria_torneo_id']==7) { $v['categoria_torneo_id']=1; }
            if ($v['categoria_torneo_id']==5 && (substr($v['nombreTorneo'],0,18)=='DIVISIÓN DE HONOR' || substr($v['nombreTorneo'],0,10)=='CAMPEONATO') ){ $v['categoria_torneo_id']=1; }
            if ($v['categoria_torneo_id']!=$ct){
                $categorias[$v['categoria_torneo_id']]=$v['categoria_torneo_id']; continue; 
            }
           $partidosDia1[]=$v;
        }*/

        foreach ($partidosDia as $v) { 

            $div=$v['division_id'];  
            if ($div<4){ $div=1; }
            if ($div==8){ 
                if ($v['categoria_torneo_id']==7) { $div=9; }
                if ($v['categoria_torneo_id']==5) { $div=8; }
                if ($v['categoria_torneo_id']==9) { $div=10; }
                if ($v['categoria_torneo_id']<4) { $div=1; }
            }
            
            if ($div!=$ct){ $categorias[$div]=$div; continue; }
           $partidosDia1[]=$v;
        }

        

        unset($partidosDia);$partidosDia=$partidosDia1; unset($partidosDia1);
    } 


}

?>

<div class="col-xs-12" style="background-color:#FFCC66;padding-bottom: 5px; padding-left: 5px">
    <?php if (count($categorias)>1) { 
        ksort($categorias);
        foreach ($categorias as $key => $value) { 

                if ($value==1) { $txtCat='Principal'; $titolCat='Partidos de Primera y Segunda División'; }
                if ($value==4) { $txtCat='Segunda B'; $titolCat='Partidos de Segunda División B'; }
                if ($value==5) { $txtCat='Tercera'; $titolCat='Partidos de Tercera División'; }
                if ($value==7) { $txtCat='Autonómica'; $titolCat='Partidos de los torneos de ámbito regional'; }
                if ($value==8) { $txtCat='Juveniles'; $titolCat='Partidos para hoy de los equipos de DHJ y LNJ'; }
                if ($value==9) { $txtCat='Femenino'; $titolCat='Partidos para hoy de las ligas femeninas de categoría nacional'; }
                if ($value==10) { $txtCat='Europa'; $titolCat='Partidos para hoy de las ligas europeas'; }

                if ($value==22) { $txtCat='Fútbol Sala'; $titolCat='Partidos para hoy de Fútbol Sala'; }


                ?>
            <a href="/index.php?ct=<?php echo $value?>" class="boldfont btn btn-danger" title="<?php echo $titolCat?>"><?php echo $txtCat?> 
            <?php if (isset($enJuegoCat[$value])){ ?>
            <span class="badge"><?php echo count($enJuegoCat[$value])?></span>
            <?php } ?>
            </a>&nbsp;
         <?php } 
     } ?>
    <span class="actua pull-right badge" style="font-weight:100;">
    Actualizado a las <?php echo $hora = date('H:i:s'); ?>
    </span>
</div>
<?php //require_once 'includes/diseny/menuPromocion.php'; ?>
<div class="clear"></div>

<?php



require_once 'ascyprom.php';

if ($c_directos > 0) { include 'includes/contenidoDirecto.php';} 



    if ($c_directos==0){
         $path = './json/partidosSueltos.json';
        $json = file_get_contents($path);
        $sueltos = json_decode($json, true);
        include 'includes/livescore/sueltos.php';
    }




if ($c_partidos > $mostrarPartidos && 1 == $_SESSION['app']) {
    $partidosNac = array();
    foreach ($partidosDia as $key => $value) {
        if ($value['temporada_id'] > 24 && 666 != $value['temporada_id']) {
            break;
        }
        $partidosNac[] = $value;
    }
    $partidosDia = $partidosNac;
    unset($partidosNac);
    require_once 'includes/contenidoIndex.php';
    $path = './json/index_cabeceras.json';
    $json = file_get_contents($path);
    $partidosDia = json_decode($json, true);
    require_once 'srcRecursos/pesCabeceras.php';
} else {
    require_once 'includes/contenidoIndex.php';
} 



unset($partidosDia);
unset($directos);
unset($cabeceras);
?>

