<?php
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
    } 
}

?>
<div class="col-xs-12 whitebox nopadding one-bordergrey-vert">
    <div class="boxpartido col-xs-12 <?php echo $colorFondo; ?> nopadding" itemscope
         itemtype="http://schema.org/SportsEvent" style="padding:5px !important">

 


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

</div>

</div>

