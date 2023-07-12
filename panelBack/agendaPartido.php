<?php

$temporada_id=$partido['temporada_id'];
$jornada=$partido['jornada'];
$comunidad_id=($partido['comunidad_id']-1);
$competicion_id=$partido['apiRFEFcompeticion'];
$grupo_id=$partido['apiRFEFgrupo'];
$fase=$partido['apifutbol'];

if ($grupo_id>0 && $competicion_id>0){
    
    include ('federacion/funciones/urlFederaciones.php');

    if ($carpeta=='00pnfg'){
    $url.='CodCompeticion='.$competicion_id.'&CodGrupo='.$grupo_id.'&CodJornada='.$jornada;
    }

    if ($carpeta=='00isquad'){
    $url.='id_competicion='.$competicion_id.'&id_fase='.$fase.'&id_grupo='.$grupo_id.'&jornada='.$jornada;
    }
}




$partido['hora_real']=$partido['hora_real']??'00:00:00';
$comentarios=$partido['comentario']??'';
$clasificado=$partido['clasificado']??0;
$partido['betsapi']=$partido['betsapi']??0;
$parte=0;$minutos=0;
$pagina='';$colorL='black';$colorV='black';
$fondocolorL="white";$fondocolorV="white";


$fecha1 = date('Y-m-d H:i:s');
$fecha1 = date_create($fecha1); //hora actual

$fecha2 = date($partido['fecha'].' '.$partido['hora_real']); 
$fecha2 = date_create($fecha2); // hora comienzo real

$fecha3 = date($partido['fecha'].' '.$partido['hora_prevista']);
$fecha3 = date_create($fecha3); //hora prevista

$dPartido = date_diff($fecha3, $fecha1);

$horasP = $dPartido->h;
$minutosP = $dPartido->i;
$segundosP = $dPartido->s;
$invertidoP = $dPartido->invert;
$mHP=($horasP*60)+$minutosP;

/*var_export($invertidoP);
var_export($mHP);
var_export($partido['estado_partido']);
*/

if ($invertidoP==0 && $mHP>105 && (int)$partido['estado_partido']==0){
    $sinFinalizar[]=$partido;    
}


?>

<div class="col-xs-6">

<?php
/*
var_dump($horasP)."<br />";
var_dump($minutosP)."<br />";
var_dump($segundosP)."<br />";
var_dump($invertidoP)."<br />";
var_dump($mHP)."<br />";*/
?>
</div>

<?php 
if (0 == $invertidoP && $partido['estado_partido']==2 && $partido['betsapi']==1) {
$dDirecto = date_diff($fecha2, $fecha1); 
$horasD = $dDirecto->h;
$minutosD = $dDirecto->i;
$segundosD = $dDirecto->s;
$invertidoD = $dDirecto->invert;
$mHD=($horasD*60)+$minutosD; 
?>

<div class="col-xs-6">

<?php
/*
var_dump($horasD)."<br />";
var_dump($minutosD)."<br />";
var_dump($segundosD)."<br />";
var_dump($invertidoD)."<br />";
var_dump($mHD)."<br />";*/
?>
</div>

<?php 

if ($minutosD<55 && $mHP<60) { $parte=1;$minutos=$minutosD;  }
if ($minutosD<55 && $mHP>59 && $mHP<120) { $parte=2; $minutos=$minutosD+45; }
if ($minutosD<20 && $mHP>119 && $mHP<135) { $parte=3; $minutos=$minutosD+90; }
if ($minutosD<20 && $mHP>134) { $parte=4; $minutos=$minutosD+105; }
$comentarios=$parte."-".$minutos."-0".$partido['comentario'];
}



if (isset($partido['fecha'])){
$timezone = new DateTimeZone('Europe/Madrid');
$fechaPartido = date_create_immutable_from_format('Y-m-d H:i:s',$partido['fecha'].' '.$partido['hora_prevista']??'00:00:00',$timezone);
$fechaPartido = $fechaPartido->setTimezone(new DateTimeZone('UTC'));
$fechaFinPartido = $fechaPartido->modify('+120 minutes');
}

$colorFondo=$colorFondo??'white';
?>
<div class="col-xs-12 whitebox nopadding one-bordergrey-vert">
    <div class="boxpartido col-xs-12 <?php echo $colorFondo; ?> nopadding" itemscope
         itemtype="http://schema.org/SportsEvent" style="padding:5px !important">

        


        <div class="col-xs-12 nopadding txt11">
            <div class="clear"><?php echo $partido['temporada_nombre']; ?> <span class="pull-right">

                <?php

                if (isset($temporada_id)){
                    $f = '../json/temporada/'.$temporada_id.'/federacion.json';
                    if (@file_exists($f)) { 
                        $fichero_time = @filemtime($f);

                        $ff= date('H:m:s', $fichero_time);

                        echo ' fichero recibido a las '.$ff.'  --  ';
                    } 


                    if ($grupo_id>0 && $competicion_id>0){ ?>
                    <a href="<?php echo $url?>" target="_blank">Federación</a> - 
                    <?php } 
                }



                ?>

                <a href="/partido.php?id=<?php echo $partido['id']; ?>" target="_blank">Ver partido</span></a>

                - <a href="agendaTwitt.php?id=<?php echo $partido['id']?>">+ Opciones</a>

                <?php if (isset($partido['tl']) || isset($partido['tv'])) {
                        if (strlen($partido['tl'])>0 || strlen($partido['tv'])>0) { echo " (TW)"; } 
                }

                if ($variable==1){ ?>
                <div id="j-<?php echo $jornada?>-<?php echo $grupo_id?>"></div>
                <?php } ?>
            </div>

            <div class="nopadding col-xs-2 whitebox h25 <?php echo $colorFondo; ?>">
            <?php if ($partido['estado_partido']>0) {?>
                <meta itemprop="endDate" content="<?= $fechaFinPartido->format('c'); ?>">
                <div class="boxresultcontent_hora boldfont txt11" itemprop="startDate"
                     content="<?= $fechaPartido->format('c'); ?>" style="background-color: dimgray !important">
                    <?php if ('11' == substr($partido['hora_prevista'], -2)) {
                        $hora = ':';
                    } else {
                        $hora = substr($partido['hora_prevista'], 0, 5);
                    }
                    echo $hora; ?>
                </div>
            <?php } ?>
            </div>

            <div class="col-xs-6 nopadding h25">            
                <?php 

                


                
                if ($partido['estado_partido']>1 && $pagina!='televisados') { 
                $colorTexto="white";
                    if (strlen($comentarios)>2) {
                         unset($t);
                        $t = explode('-', $comentarios);

                        if (isset($t[3])){$ev=$t[3];}
                        //var_dump($t);
                        if (isset($t)) {
                            //var_dump($t);
                            $t['color'] = '#f07474';
                            if (1 == $t[0]) {
                                $t['color'] = '#f07474';
                            }
                            if (2 == $t[0]) {
                                $t['color'] = '#7cc002';
                            }
                            if (3 == $t[0]) {
                                $t['color'] = '#610B0B';
                            }
                            if (4 == $t[0]) {
                                $t['color'] = '#0B3B0B';
                            }
                            
                            $t['tiempo'] = 'Minuto '.$t[1];
                            if (isset($t[2]) && $t[2]>0) {
                                $t['tiempo'].= '<span style="font-size:11px; color:white; float:right;"> +'.$t[2].'</span>';
                            }
                        }
                        if (6 == $partido['estado_partido']) {
                            $t['color'] = '#ffe400';
                            $t['tiempo'] = 'Descanso';
                            $colorTexto = 'maroon';
                        }
                        if (7 == $partido['estado_partido']) {
                            $t['color'] = '#2E2E2E';
                            $t['tiempo'] = 'Penaltis';
                        }
                        if (8 == $partido['estado_partido']) {
                            $t['color'] = 'blue';
                            $t['tiempo'] = 'Prórroga';
                        }

                        //if ($partido['partido_id']==189906) {imp($t);}
                    } ?>

                <div class="infopwhitebox">
                    <?php if (6 == $partido['estado_partido']) {?>  
                        <p class="timeresult" style="background-color: #ffe400; color: maroon !important">Descanso</p>
                        <?php }
                    if (7 == $partido['estado_partido']) { ?>
                        <p class="timeresult" style="background-color:#2E2E2E">Penaltis</p>
                        <?php }
                    if (8 == $partido['estado_partido']) { ?>
                        <p class="timeresult" style="background-color:blue">Prórroga</p>                    
                        <?php }
                    if (9 == $partido['estado_partido']) {
                    echo '<p class="timeresult" style="background-color:'.$t['color'].'">'.$t['tiempo'].'</p>';
                    }
                    if (10 == $partido['estado_partido']) {
                        echo '<p class="timeresult" style="background-color:'.$t['color'].'">'.$t['tiempo'].'</p>';
                    }
                    if (11 == $partido['estado_partido']) {
                        echo '<p class="timeresult tryellow">Desc.Prórr.</p>';
                    }
                    if (2 == $partido['estado_partido']) { 
                        echo '<p class="timeresult" style="background-color:'.$t['color'].'; color:'.$colorTexto.' !important">'.$t['tiempo'].'</p>';
                    } ?>
                </div>
                <?php }?>
            </div>

            <div class="col-xs-4 nopadding h25">

                <?php echo $comentarios." ";?>


                <?php if ($partido['betsapi']>1){ ?>
                    <span class="pull-right boldfont">BS</span>
                <?php } ?>
                <?php if ($partido['betsapi']==1){ ?>
                    <span class="pull-right boldfont">Manual</span>
                <?php } ?>

                

            </div>

            

            

           
    </div>


    <div class="col-xs-5 col-centered nopadding equipo-partido">
        <p class="pull-right boldfont lead">
            <a class="txt11" 
               style="padding-right: 10px; color:<?php echo $colorL; ?>; background-color:<?php echo $fondocolorL; ?>"><span itemprop="name"><?php echo $partido['localCorto']; ?></span></a>
        </p>
    </div>

    <div class="col-xs-2 col-centered resultado-partido">
        <?php if (1 == $partido['estado_partido']) {
            ?>
            <p class="reboxL pull-left"
                <?php if (strlen($partido['goles_local']) > 1) {
                    echo "style='padding: 1px 1px;'";
                } ?>
            ><?php echo $partido['goles_local']; ?></p>
            <p class="reboxR pull-right"
                <?php if (strlen($partido['goles_visitante']) > 1) {
                    echo "style='padding: 1px 1px;'";
                } ?>
            ><?php echo $partido['goles_visitante']; ?></p>
            <?php
        } ?>
        <?php if ($partido['estado_partido'] > 2) {
            ?>
            <div class="text-center boldfont" style="color:tomato; font-size:12px;">
                <?php if (3 == $partido['estado_partido']) {
                    echo 'SUSP.';
                } ?>
                <?php if (4 == $partido['estado_partido']) {
                    echo 'APLZ.';
                } ?>
            </div>
            <?php
        }

        if ($partido['estado_partido'] == 2 || $partido['estado_partido'] >5 ) { ?>
        <p class="reboxL pull-left <?php if (5 == $ev) {
            echo 'parpadea';
        }?>" style="background: #c31e1e;">
            <?php echo $partido['goles_local']; ?>
            </p>
            <p class="reboxR pull-right <?php if (6 == $ev) {
            echo 'parpadea';
        }?>" style="background: #c31e1e;">
            <?php echo $partido['goles_visitante']; ?>
            </p>
        <?php }

        if (0 == $partido['estado_partido'] || ($partido['estado_partido'] > 2 && $partido['estado_partido'] < 6)) {
            ?>
            <div class="text-center">
                <span class="text-center marco" style="background-color:dimgray; color:white; padding:2px;">
                    <?php if ('11' == substr($partido['hora_prevista'], -2)) {
                                $hora = ':';
                            } else {
                                $hora = substr($partido['hora_prevista'], 0, 5);
                            }
                            echo $hora; ?>
                            </span>
            </div>
            <?php
        } ?>
    </div>

    <div class="col-xs-5 col-centered nopadding equipo-partido">
        <p class="pull-left boldfont lead">
            <a class="txt11" 
               style="padding-left: 10px; color:<?php echo $colorV; ?>; background-color:<?php echo $fondocolorV; ?>"><span itemprop="name"><?php echo $partido['visitanteCorto']; ?></span></a>                
        </p>
    </div>
    

    <?php 

    if ($partido['partidoAPI']>1) {
        $f = '../json/temporada/'.$partido['temporada_id'].'/apifootball/dat_'.$partido['partidoAPI'].'.json';
        if (@file_exists($f)) { 
            $resultado = file_get_contents($f);            
            $resultado =json_decode($resultado,true);  
            $api_goleadores=$resultado[0]['goalscorer'];  
            foreach ($api_goleadores as $g => $gol) {

                if (strlen($gol['home_scorer'])>0) { ?>
                    <div class="pull-left clear"><span class="glyphicon glyphicon-eye-open iconhover" style="cursor:pointer;"
                  onclick="mostrarPlantilla(<?php echo $partido['id']?>,<?php echo $partido['equipoLocal_id']?>,'<?php echo $gol['home_scorer']?>')"> <b><?php echo $gol['time']?></b> <?php echo $gol['home_scorer']?></span></div>

                <?php } else { ?>
                    <div class="pull-right clear"><span class="glyphicon glyphicon-eye-open iconhover" style="cursor:pointer;"
             onclick="mostrarPlantilla(<?php echo $partido['id']?>,<?php echo $partido['equipoVisitante_id']?>,'<?php echo $gol['away_scorer']?>')"> <?php echo $gol['away_scorer']?>  <b><?php echo $gol['time']?></b></span></div>
                <?php }
            }

            $cosas=obsGoleadores($api_goleadores);            
            $cadena1 = desglosarTexto($cosas);
            $cadena2 = desglosarTexto($partido['observaciones']);

            if (strlen($cosas) > 5) { ?>
            <div class="col-xs-12 nopadding">
                <textarea style="width:100%; height:80px"><?php echo $cosas; ?></textarea>
                <?php 
                $cadena = desglosarTexto($cosas);
                include '../srcRecursos/partidoObsR.php'; ?>

                <form id="f2-<?php echo $partido['id']; ?>" method="post" onsubmit="editarApiId(event, $(this).serialize(),<?php echo $partido['id']; ?>)">
                <input type="hidden" name="id" value="<?php echo $partido['id']; ?>">
                <input type="hidden" name="apiName" value="observaciones">
                Obs:  <textarea style="width:100%; height:200px" name="apiId"><?php echo $partido['observaciones']; ?></textarea>
                <input type="submit" name="grabar" value="*">
                <div id="ver-alineacion-<?php echo $partido['id']?>"></div>
                </form>
            </div>
            <div class="clear" style="height: 5px !important;"></div>
            <?php } 
        }
    }?>

    <div id="p-<?php echo $partido['id']?>"></div>

</div>

</div>

