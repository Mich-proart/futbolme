
<?php 
define('_FUTBOLME_', 1);
require_once '../../src/config.php';

require_once '../../includes/head.php'?>

<body  style="margin-top: 40px">
<div id="contenedor" style="z-index: 1">

    <section class="container-fluid section_down cajagrisoscuro">

    <div id="cPrincipal" class="col-xs-12 nopadding clear"> 
<?php


/*
<h3>Menos de 31 partidos</h3>
    <a href="index.php?op=1">Sin directos</a><br />
    <a href="index.php?op=2">Con menos de 5 directos</a><br />
    <a href="index.php?op=3">Con mas de 4 directos</a><br />
<hr />
<h3>Mas de 30 partidos</h3>
    <a href="index.php?op=4">Sin directos</a><br />
    <a href="index.php?op=5">Con menos de 5 directos</a><br />
    <a href="index.php?op=6">Con mas de 4 directos</a><br />
*/

$pathS = 'partidosSueltos.json';

switch ($_GET['op']) {
    case '1':
    $pathD = 'menos31partidos/sindirectos/directos.json';
    $pathI = 'menos31partidos/sindirectos/index.json';
    $mensaje="Menos de 31 partidos. No se aplican filtros. No hay directos, por lo tanto se muestran los partidos sueltos de betsapi, para que no de sensación de inactividad.";
    break;

    case '2':
    $pathD = 'menos31partidos/menos5directos/directos.json';
    $pathI = 'menos31partidos/menos5directos/index.json';
    $mensaje="Menos de 31 partidos. No se aplican filtros. Hay menos de 5 directos, se muestran estos y después se muestran los partidos sueltos de betsapi.";

    break;

    case '3':
    $pathD = 'menos31partidos/mas4directos/directos.json';
    $pathI = 'menos31partidos/mas4directos/index.json';
    $mensaje="Menos de 31 partidos. No se aplican filtros. Hay mas de 4 directos, se muestran estos.<br /><b>NO</b> se muestran los partidos sueltos de betsapi.";

    break;

    case '4':
    $pathD = 'mas30partidos/sindirectos/directos.json';
    $pathI = 'mas30partidos/sindirectos/index.json';
    $mensaje="Mas de 30 partidos. Se aplican filtros. No hay directos, por lo tanto se muestran los partidos sueltos de betsapi, para que no de sensación de inactividad. Pulsa en los filtros para ver los partidos";
    break;

    case '5':
    $pathD = 'mas30partidos/menos5directos/directos.json';
    $pathI = 'mas30partidos/menos5directos/index.json';
     $mensaje="Mas de 30 partidos. Se aplican filtros. Hay menos de 5 directos, se muestran estos y después se muestran los partidos sueltos de betsapi. Pulsa en los filtros para ver los partidos";
    break;

    case '6':
    $pathD = 'mas30partidos/mas4directos/directos.json';
    $pathI = 'mas30partidos/mas4directos/index.json';
    $mensaje="Mas de 30 partidos. Se aplican filtros. Hay mas de 4 directos, se muestran estos. <br /><b>NO</b> se muestran los partidos sueltos de betsapi. Pulsa en los filtros para ver los partidos";
    break;
}

$json = file_get_contents($pathD);
$directos = json_decode($json, true);
$c_directos = count($directos);
$c_finales=0;
$c_resto=0;


$json = file_get_contents($pathI);
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



if (count($partidosDia)>30){
    if ($ct>0){
        $categorias[$ct]=$ct;

        
        $directos1=array(); 
        foreach ($directos as $v) {    
                if ($v['categoria_torneo_id']<4) { $v['categoria_torneo_id']=1; }
                if ($v['categoria_torneo_id']==7) { $v['categoria_torneo_id']=1; }
                if ($v['categoria_torneo_id']==5 && (substr($v['nombreTorneo'],0,18)=='DIVISIÓN DE HONOR' || substr($v['nombreTorneo'],0,10)=='CAMPEONATO')) { $v['categoria_torneo_id']=1; }
            $x=$v['categoria_torneo_id'];
            $enJuegoCat[$x][]=$v;

                if ($v['categoria_torneo_id']!=$ct){
                    $categorias[$v['categoria_torneo_id']]=$v['categoria_torneo_id']; continue; 
                }
                
           $directos1[]=$v;
        }
        unset($directos);$directos=$directos1; unset($directos1);
        
        
        
        $partidosDia1=array(); 

        
        foreach ($partidosDia as $v) {   
            
            if ($v['categoria_torneo_id']<4) { $v['categoria_torneo_id']=1; }      
            if ($v['categoria_torneo_id']==7) { $v['categoria_torneo_id']=1; }
            if ($v['categoria_torneo_id']==5 && (substr($v['nombreTorneo'],0,18)=='DIVISIÓN DE HONOR' || substr($v['nombreTorneo'],0,10)=='CAMPEONATO') ){ $v['categoria_torneo_id']=1; }
            if ($v['categoria_torneo_id']!=$ct){
                $categorias[$v['categoria_torneo_id']]=$v['categoria_torneo_id']; continue; 
            }
           $partidosDia1[]=$v;
        }


        unset($partidosDia);$partidosDia=$partidosDia1; unset($partidosDia1);
    } 


}


?>

            
<div id="partidos" style="max-width: 600px">
    <div class="marco">
        <a href="index.html">Volver a inicio</a>
        <hr />
        <?php echo $mensaje?><br />
        Total partidos: <?php echo $c_partidos?><br />
        Total directos: <?php echo $c_directos?><br />
        Los directos de futbolme se diferencian de los partidos sueltos de betsapi porque en los de futbolme, el torneo en la franja azul lleva siempre la bandera del país o de la comunidad, en los de betsapi no sale bandera.
    </div>


<div class="col-xs-12" style="background-color:#FFCC66;padding-bottom: 5px; padding-left: 5px">
    <?php if (count($categorias)>1) { 
        ksort($categorias);
        foreach ($categorias as $key => $value) { 

                if ($value==1) { $txtCat='Principal'; $titolCat='Partidos para hoy de los equipos que pertenecen a categoría nacional, fútbol femenino y División de Honor Juvenil'; }
                if ($value==5) { $txtCat='LNJ'; $titolCat='Partidos para hoy de los equipos de Liga Nacional Juvenil'; }
                if ($value==4) { $txtCat='Autonómica'; $titolCat='Partidos para hoy de los torneos de ámbito regional'; }
                if ($value==9) { $txtCat='Europa'; $titolCat='Partidos para hoy de las ligas europeas'; }

                if ($value==17) { $txtCat='Fútbol Sala'; $titolCat='Partidos para hoy de Fútbol Sala'; }


                ?>
            <a href="simulador.php?ct=<?php echo $value?>&op=<?php echo $_GET['op']?>" class="boldfont btn btn-danger" title="<?php echo $titolCat?>"><?php echo $txtCat?> 
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
    
    <?php 
    if ($c_directos > 0) { ?>

        <div class="col-xs-12 nopadding">   
    <?php 
    $temp_id = 0;
    $contador = 0;
    foreach ($directos as $partido) {     
    ++$contador;

        if ($temp_id != $partido['temporada_id'] && !isset($temporada_id)) {            
            $fondoCabecera = 'celestebox';
            $colorCabecera = 'white !important';

           

            include 'contenidoCabecera.php';






         }  
       include '../../includes/contenidoPartido.php';

        $temp_id = $partido['temporada_id'];
    
    } ?>    
</div>


    <?php } 



    if ($c_directos<5){

         
        $json = file_get_contents($pathS);
        $sueltos = json_decode($json, true);
        unset($f);
        include '../../includes/livescore/sueltos.php';
    } ?>

    


<div id="bloque-resto">     
<?php 
$temp_id = 0;
$contador = 0; $equiposTw = array();


foreach ($partidosDia as $kk => $partido) {

    //imp($partido);

    $contador++;
    
    
    $colorFondo = 'whitebox';
    //colorear españoles
    if ((60 != $partido['idPais'] && 200 != $partido['idPais']) || 'España' == $partido['local']) {
        $colorL = 'background-color:#F4FA58';
    } else {
        $colorL = 'background-color:white';
    }
    if ((60 != $partido['idPais'] && 200 != $partido['idPais']) || 'España' == $partido['visitante']) {
        $colorV = 'background-color:#F4FA58';
    } else {
        $colorV = 'background-color:white';
    }
    $hora_prevista = $partido['hora_prevista'];
    $colorFila = 'white';

    if ($partido['temporada_id'] != $temp_id) {        
        $fondoCabecera = 'greenbox';
        $colorCabecera = 'black';
         include 'contenidoCabecera.php';
    }

    //si cambia el id de temporada se hace una cabecera?>

        <div style="clear:both"></div>
        <div>
        <?php  include '../../includes/contenidoPartido.php'; ?> 
        </div>
        <?php 


        

        $temp_id = $partido['temporada_id'];


} ?>
</div>  



    <div class="clear"></div>
</div>




<?php

unset($partidosDia);
unset($directos);
unset($cabeceras);