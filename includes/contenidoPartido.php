<a id="<?php echo $partido['id']; ?>"></a>
<?php
$colorL = 'black';
$colorV = 'black';
$pagina=$pagina??'';
$icono=$icono??'';
$ev=$ev??0;
$partido['localCorto']=$partido['localCorto']??$partido['local'];
$partido['visitanteCorto']=$partido['visitanteCorto']??$partido['visitante'];
$partido['idPais']=$partido['idPais']??0;

if (isset($partido['clasificado'])) {
    if (1 == $partido['clasificado']) {
        $colorL = 'green';
        $colorV = 'red';
    }
    if (2 == $partido['clasificado']) {
        $colorL = 'red';
        $colorV = 'green';
    }    
    if (0 == $partido['clasificado'] && $pagina=='equipo') {
        if ($equipo_id==$partido['equipoLocal_id']){ $colorL = '#886A08';}
        if ($equipo_id==$partido['equipoVisitante_id']){ $colorV = '#886A08';}        
    }
}
$fondocolorL = '';
$fondocolorV = '';
if (isset($partido['idPais']) && $partido['idPais'] > 198) {
    if (isset($partido['temporada_id']) && 442 != $partido['temporada_id'] && 330 != $partido['temporada_id']) {
        if (60 == $partido['pais_local']) {
            $fondocolorL = '#FADF74';
        }
        if (60 == $partido['pais_visitante']) {
            $fondocolorV = '#FADF74';
        }
    }
}


$partido['betsapi']=$partido['betsapi']??0;
$comentarios=$partido['comentario']??'';
$partido['hora_real']=$partido['hora_real']??'00:00:00';
$parte=0; $minutos=0;

$fecha1 = date('Y-m-d H:i:s');
$fecha1 = date_create($fecha1); //hora actual

$fecha2 = date($partido['fecha'].' '.$partido['hora_real']); 
$fecha2 = date_create($fecha2); // hora comienzo real

if ($partido['id']==257896){
   // $partido['hora_prevista']="15:22:00";
}
$fecha3 = date($partido['fecha'].' '.$partido['hora_prevista']);
$fecha3 = date_create($fecha3); //hora prevista

$dPartido = date_diff($fecha3, $fecha1);


$horasP = $dPartido->h;
$minutosP = $dPartido->i;
$segundosP = $dPartido->s;
$invertidoP = $dPartido->invert;


if (0 == $invertidoP && $partido['estado_partido']==0 && (($horasP*60)+$minutosP)>150) { $desfasado=1; } else { $desfasado=0; }

if (0 == $invertidoP && $partido['estado_partido']==2 && $partido['betsapi']==1) {
$dDirecto = date_diff($fecha2, $fecha1); 
$horasD = $dDirecto->h;
$minutosD = $dDirecto->i;
$segundosD = $dDirecto->s;
$mHP=($horasP*60)+$minutosP;
//var_dump($mHP);
//var_dump($minutosD);


if ($minutosD<55 && $mHP<60) { $parte=1;$minutos=$minutosD;  }
if ($minutosD<55 && $mHP>59 && $mHP<120) { $parte=2; $minutos=$minutosD+45; }
if ($minutosD<20 && $mHP>119 && $mHP<135) { $parte=3; $minutos=$minutosD+90; }
if ($minutosD<20 && $mHP>134) { $parte=4; $minutos=$minutosD+105; }
$comentarios=$parte."-".$minutos."-0".$partido['comentario'];
}


if (isset($partido['fecha'])){
$timezone = new DateTimeZone('Europe/Madrid');

    if ($partido['hora_prevista']!='00:00:11'){
        $fechaPartido = date_create_immutable_from_format('Y-m-d H:i:s',$partido['fecha'].' '.$partido['hora_prevista']??'00:00:00',$timezone);
        $fechaPartido = $fechaPartido->setTimezone(new DateTimeZone('UTC'));
        $fechaFinPartido = $fechaPartido->modify('+120 minutes');
        $ffp=$fechaFinPartido->format('c');
        $fp=$fechaPartido->format('c');
    } else {
        $fechaPartido = date_create_immutable_from_format('Y-m-d',$partido['fecha'],$timezone);
        $fechaPartido = $fechaPartido->setTimezone(new DateTimeZone('UTC'));
        $fp = $fechaPartido->format('c');
        $ffp = $fechaPartido->format('c');
    }
}

$pgLocal = '/resultados-directo/equipo/'.poner_guion($partido['local']).'/'.$partido['equipoLocal_id'];
$pgVisitante = '/resultados-directo/equipo/'.poner_guion($partido['visitante']).'/'.$partido['equipoVisitante_id'];
$pgPartido = '/resultados-directo/partido/'.poner_guion($partido['local']).'-'.poner_guion(
        $partido['visitante']
    ).'/'.$partido['id'];

if (!isset($equipo_id)){ $equipo_id=0;}
$colorFondo=$colorFondo??'white';

if ($_SESSION['app']==0){
    $partido['localCorto']=$partido['local'];
    $partido['visitanteCorto']=$partido['visitante'];
}

$jornadaTxt="";
if ($pagina=='index' || $pagina=='equipo' || $pagina=='seleccion'){
    if (1 == $partido['tipo_torneo']) {
        $jornadaTxt='Jornada '.$partido['jornada'];
    } else { 
        $jornadaTxt=$partido['fase'];
        if ($partido['grupo_id'] > 0) {
            $jornadaTxt.=" ".$partido['nombre'];
        }
    }
    
    if ($pagina=='equipo' &&  !is_null($partido['fecha'])){
        $jornadaTxt.=' - '.date_format($fecha2, 'd/m/y');
    }
}


$tvs=explode('-',$partido['tv']);$txtTV='';
foreach ($tvs as $vtv) {
    if ($vtv==132){
        $txtTV=' <a href="https://www.footters.com/register?ref=futbolmeoficial" target="_blank">
        <img alt="footters.com" src="/img/television/medio132.png" width="20" height="20"
                             style="margin-right: 4px;"></a>';
    }
}
//imp($tvs);

?>
<div class="col-xs-12 whitebox nopadding one-bordergrey-vert">
    <div class="boxpartido col-xs-12 <?php echo $colorFondo; ?> nopadding" itemscope
         itemtype="http://schema.org/SportsEvent" style="padding:5px !important">

        <meta itemprop="name" content="<?= $partido['localCorto'].' - '.$partido['visitanteCorto']; ?>">
        <meta itemprop="description" content="Partido entre <?= $partido['local']; ?> y <?= $partido['visitante']; ?>">
        <span itemprop="location" itemscope itemtype="http://schema.org/Place">
            <meta itemprop="name" content="<?= $partido['estadio_nombre'] ?? 'Campo de fútbol'; ?>">
            <meta itemprop="address" content="<?= $partido['estadio_localidad'] ?? 'Campo de fútbol'; ?>">
        </span>

            <?php if (isset($fp)) { ?>
                <meta itemprop="endDate" content="<?= $ffp; ?>">
                <meta itemprop="startDate" content="<?= $fp; ?>">
            <?php } ?>


        <div class="col-xs-12 nopadding txt11">


            <div class="nopadding col-xs-2 whitebox h25 <?php echo $colorFondo; ?>">
            <?php if ($partido['estado_partido']==2 || $partido['estado_partido']==6 || $partido['estado_partido']==1) {?>
                <div class="boxresultcontent_hora boldfont txt11" style="background-color: dimgray !important">
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
            if (('index' == $pagina || 'equipo' == $pagina || 'seleccion' == $pagina) && (int)$partido['estado_partido']!=2 && (int)$partido['estado_partido']!=6) {
            $enlaceJornada='/temporada.php?id='.$partido['temporada_id'].'&jornada='.$partido['jornada'];
            if ($partido['grupo_id']>0){ $enlaceJornada.='&grupo_id='.$partido['grupo_id']; }?>

            <i style='color:dimgray'>&nbsp;&nbsp;<a href='<?=$enlaceJornada?>'><?=$jornadaTxt?></a></i>
            
            <?php }

                

                if ('televisados' == $pagina && 1 != $partido['estado_partido']) {

                $diferencia=diferenciaFechas(date($partido['fecha'].' '.$partido['hora_prevista']));                
                
                $dias = $diferencia->d;
                $horas = $diferencia->h;
                $minutos = $diferencia->i;
                $segundos = $diferencia->s;
                $invertido = $diferencia->invert;

                    $txth = $horas.' horas';
                    $txtm = $minutos.' minutos';
                    if (0 == $invertido) { ?>                        
                        <b>En estos momentos...</b>
                    <?php  } else {
                        if (0 == $dias) {
                            if (1 == $horas) {
                                $txth = $horas.' hora';
                            }
                            if (0 == $horas) {
                                $txth = '';
                            }
                            if ($horas > 0 && $minutos > 0) {
                                $txth .= ' y ';
                            }
                            if (1 == $minutos) {
                                $txtm = $minutos.' minuto';
                            }
                            if (0 == $minutos) {
                                $txtm = '';
                            }

                            echo 'Televisado en '.$txth.$txtm;
                        }
                    }
                }


              

                
                $clasificado=$partido['clasificado']??0;

                
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
                    <?php

                

                if (isset($t)){  

                    if (isset($partido['categoria_torneo_id']) && $partido['categoria_torneo_id']==17){
                        if ($t[0]==2) { $t['tiempo']='2ª parte';}
                        if ($t[0]==1) { $t['tiempo']='1ª parte';}
                    }   

                    if (6 == $partido['estado_partido']) {?>  
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
                    }
                } 

                    ?>
                </div>
                <?php }?>
            </div>

            

            <div class="col-xs-4 nopadding h25">
                <div class="pull-right" style="margin-right: 4px !important">
                <span class="glyphicon glyphicon-search iconhover" style="cursor:pointer;
                border: 1px solid black; padding:3px;" title="Partido entre <?=$partido['local'];?> y <?=$partido['visitante'];?>" onclick="mostrarColor(<?php echo $partido['id']?>)"></span>
                </div>

                <?php 
                if ($tvs[0] > 0 && 1 != $partido['estado_partido'] && $pagina!='televisados') { ?>
                    
                    <div class="pull-right h25" style="padding:1px; margin-right: 3px; width:30px">
                        <a href="/partidos-televisados#tv-<?php echo $partido['id']; ?>" title="partido televisado">

                            <img src='/img/tv.png' alt="partido televisado" height='18'>
                        </a>
                    </div>
                <?php } ?>
            <div class="pull-right"><?php echo $txtTV?></div>
                
            <div class="pull-right" style="margin-right: 4px !important"><?php echo $icono?></div>
               
            </div>
    </div>
    
    <div class="col-xs-5 col-centered nopadding equipo-partido" >
        <p class="pull-right boldfont lead txt11" style="padding-right: 10px; color:<?php echo $colorL; ?>;  background-color:<?php echo $fondocolorL; ?>; cursor:pointer;"  onclick="mostrarColor(<?php echo $partido['id']?>)">
            <span itemprop="name" class="txt11"><?php echo $partido['localCorto']; ?></span>
        </p>
    </div>

    <div class="col-xs-2 col-centered resultado-partido">
        <?php if (1 == $partido['estado_partido']) {


        if (isset($jornadaFed2) && $jornadaFed2==$partido['jornada']){
            foreach ($partidosFed2 as $key => $value) {
                if ($value['fedLocal_id']==$partido['federacion_id_l']){ 
                    $partido['goles_local']=$value['goles_casa'];
                    $partido['goles_visitante']=$value['goles_fuera'];
                    /*?>
                <div class="clear"><span><?php echo $value['goles_casa']?> - <?php echo $value['goles_fuera']?></span></div>
                <?php */ 
                }
            }
        }
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
                <?php if (5 == $partido['estado_partido']) {
                    echo 'ANULADO';
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
                <?php if ('index' != $pagina && !isset($temporada_id)) {
                    ?>
                    <span class="text-center boldfont" style="font-size:12px"><?php echo substr(
                                $partido['fecha'],
                                -2
                            ).'/'.substr($partido['fecha'], 5, 2); ?> </span>
                    <br/>
                    <?php
                } 

                if (isset($tipoTorneo) && $tipoTorneo==4){ ?>
                    <span class="text-center boldfont" style="font-size:12px"><?php echo substr(
                                $partido['fecha'],
                                -2).'/'.substr($partido['fecha'], 5, 2); ?> </span>

                <?php }


                ?>

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
        <p class="pull-left boldfont lead txt11" style="padding-left: 10px; color:<?php echo $colorV; ?>;  background-color:<?php echo $fondocolorV; ?>; cursor:pointer;" onclick="mostrarColor(<?php echo $partido['id']?>)">
            <span itemprop="name" class="txt11"><?php echo $partido['visitanteCorto']; ?></span>                
        </p>
    </div>

    <?php if ($desfasado==1 && $partido['fecha']!='1970-01-01') { ?>
    <div id="resultado-<?php echo $partido['id']; ?>">
        <table style="width: 100%; background-color: orange">
            <form method="post" onsubmit="submitEnviarResultado(event, $(this).serialize(),<?php echo $partido['id']; ?>)">

                <input type="hidden" name="usuario" value="<?php echo $_COOKIE['futbolme_2018']??'000000';?>">
                <input type="hidden" name="partido_id" value="<?php echo $partido['id']; ?>">
            <tr><td align="right"><b>¿Sabes el resultado?</b></td>
                <td align="right"><input type="text" name="goles_local" size="2" maxlength="2" style="width:50px; text-align: center" required></td>
                <td style="width:50px; text-align: center">-</td>
                <td><input type="text" name="goles_visitante" size="2" maxlength="2" style="width:50px; text-align: center" required></td><td><input type="submit" name="enviar" value="Enviar resultado"></td>
            </tr>
            
            </form>
            </table>
    </div>
    <?php } ?>

    <?php

    if (isset($partido['ida']) && 95 != $partido['jornada']) {
        ?>
        <div class="col-xs-12">
            <p class="w100 text-center" style="background-color:white;">
                <?php $ida = explode(',', $partido['ida']);

                //imp($ida);
                $ida_resulcasa = $ida[0];
                $ida_resulfuera = $ida[1];
                $ida_jornada = $ida[2];
                $ida_fecha = $ida[3];
                if (!isset($ida[5])) {
                    $ida[5] = 1;
                }
                $ida_tipo = $ida[5];
                if (2 == $ida_tipo) {
                    if ($partido['fecha'] > $ida_fecha) {
                        $txtFecha = 'IDA';
                    } else {
                        $txtFecha = 'VUELTA';
                    }
                    echo $txtFecha; ?>: <b><?php echo $ida_resulfuera; ?> - <?php echo $ida_resulcasa; ?></b>
                    <?php if ($partido['estado_partido'] > 0) {
                        $global_casa = ($partido['goles_local'] + $ida_resulfuera);
                        $global_fuera = ($partido['goles_visitante'] + $ida_resulcasa); ?>
                        :: Global: <b><?php echo $global_casa; ?> - <?php echo $global_fuera; ?></b>
                        <?php
                    }
                } ?>
            </p>
        </div>
        <div class="clear"></div>
        <?php
    }

    if ((isset($partido['twLocal']) && strlen($partido['twLocal']) > 3) || (isset($partido['twVisitante']) && strlen(
                $partido['twVisitante']
            ) > 3)) {
        ?>


        <div id="log-tw-<?php echo $partido['id']; ?>" class="hide"></div>
        <?php
    }
    
    /*if (!isset($tarjetas) && $partido['estado_partido'] > 0) { 
        if (isset($temporada_id)) { $partido['temporada_id'] = $temporada_id; }
        $origen = 'index';
        $partido_id = $partido['id'];
        include $nivel.'srcRecursos/pargolesR.php';
    }*/

    $cadenaGoles=0;
    //imp($partido['observaciones']);
    if (isset($partido['observaciones']) && strlen($partido['observaciones']) > 5) {

        ?>
        <div class="col-xs-12 nopadding">
            <?php $cadena = desglosarTexto($partido['observaciones']);

            

            if (isset($cadena[1])){ $cadenaGoles=strlen($cadena[1]); }
            if (isset($cadena[2])){ $cadenaGoles=strlen($cadena[2])+$cadenaGoles; }
            /*if ((int)$partido['id']==285327){
                imp($cadena);
                imp($cadenaGoles);
            }*/
            
            include $nivel.'srcRecursos/partidoObsR.php'; ?>
        </div>
        <div class="clear" style="height: 5px !important;"></div>
        <?php
    } 

    ?>

<div id="posicion<?php echo $partido['id']; ?>" style="display: none" >
<div class="marco" style="background-color: #CEECF5">
    <span class="pull-right boldfont" onclick="mostrarColor(<?php echo $partido['id']?>)" style="cursor:pointer;">Cerrar enlaces</span><br />
    <h4 class="text-center">Enlaces de interes de este partido</h4>

    <div class="col-xs-12 text-center">

        <?php if (!isset($temporada_id) && $pagina!='televisados'){ ?>
        <h4><a href="<?php echo $enlace_torneo; ?>"><?php echo $txtnombreTorneo?></a></h4>
        <?php } 

        if (isset($temporada_id)){ $partido['temporada_id']=$temporada_id; }
        ?>

        <h4><a href="<?php echo $pgPartido?>">Ir al partido</a> - <a href="<?php echo $pgPartido?>&modelo=Enfrentamientos">Ver enfrentamientos</a></h4>
<table width="100%">
    <tr><td width="50%" align="center">
        <h4><?php echo $partido['localCorto']; ?></h4>
    <h4><a class="txt11" href="<?php echo $pgLocal?>">Calendario</a></h4>
    <h4><a class="txt11" href="<?php echo $pgLocal?>&modelo=Clasificacion">Clasificación</a></h4>

    <?php if ($partido['idPais']==60){ ?>
        <?php if ($partido['temporada_id'] > 0 && $partido['temporada_id'] < 25 || 214 == $partido['temporada_id']) { ?>
    <h4><a class="txt11" href="<?php echo $pgLocal?>&modelo=Plantilla">Plantilla</a></h4>
        <?php } ?>
    <h4><a class="txt11" href="<?php echo $pgLocal?>&modelo=Datos">Datos del club</a></h4>
    <h4><a class="txt11" href="<?php echo $pgLocal?>&modelo=Equipos">Equipos del club</a></h4>
    
        <?php if ($partido['temporada_id'] <25) { ?>
        <h4><a class="txt11" href="<?php echo $pgLocal?>&modelo=Historico">Histórico</a></h4>
        <?php } ?>

        <?php if ($partido['visible'] < 100) { ?>
        <h4><a class="txt11" href="/historico/2018-19/index.php?modo=e&id=<?php echo $partido['equipoLocal_id']?>">Temporada anterior</a></h4>
        <?php } ?>
    <?php } ?>

    <h4><a class="txt11" href="/src/usuarios/anadirEquipoFavoritoUrl.php?equipo_id=<?php echo $partido['equipoLocal_id']?>">Agregar a MiFutbolme</a></h4>
</td>

<td width="50%" align="center">
    <h4><?php echo $partido['visitanteCorto']; ?></h4>
    <h4><a class="txt11" href="<?php echo $pgVisitante?>">Calendario</a></h4>
    <h4><a class="txt11" href="<?php echo $pgVisitante?>&modelo=Clasificacion">Clasificación</a></h4>

    <?php if ($partido['idPais']==60){ ?>
        <?php if ($partido['temporada_id'] > 0 && $partido['temporada_id'] < 25 || 214 == $partido['temporada_id']) { ?>
        <h4><a class="txt11" href="<?php echo $pgVisitante?>&modelo=Plantilla">Plantilla</a></h4>
        <?php } ?>
    <h4><a class="txt11" href="<?php echo $pgVisitante?>&modelo=Datos">Datos del club</a></h4>
    <h4><a class="txt11" href="<?php echo $pgVisitante?>&modelo=Equipos">Equipos del club</a></h4>
    
        <?php if ($partido['temporada_id'] <25) { ?>
        <h4><a class="txt11" href="<?php echo $pgVisitante?>&modelo=Historico">Histórico</a></h4>
        <?php } ?>
    
        <?php if ($partido['visible'] < 100) { ?>
        <h4><a class="txt11" href="/historico/2018-19/index.php?modo=e&id=<?php echo $partido['equipoVisitante_id']?>">Temporada anterior</a></h4>
        <?php } ?>
    <?php } ?>

    <h4><a class="txt11" href="/src/usuarios/anadirEquipoFavoritoUrl.php?equipo_id=<?php echo $partido['equipoVisitante_id']?>">Agregar a MiFutbolme</a></h4>
</td></tr>
</table>
    </div>
    <div class="clear"></div>
</div>
</div>

    <div id="alineaciones-<?php echo $partido['id']; ?>">   
    </div>

</div>

</div>

