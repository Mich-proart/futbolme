
<div id="partidoX" class="whitebox">
<div class="row greenbox nomargin">
    <div class="col-xs-12">
    <h1 class="hidden-xs">Partido entre <?=$partido['local']; ?> y <?=$partido['visitante']; ?></h1>
    <h3 class="visible-xs">Partido entre <?=$partido['local']; ?> y <?=$partido['visitante']; ?></h3>
    </div>
    <div class="col-xs-12 marco">
        <div class="col-xs-2 col-md-1 col-lg-1">
        <?php if ($partido['comunidad_id'] > 1) { ?>
            <div class="flagbox comunidad flag<?php echo $partido['comunidad_imagen']; ?>"></div>
        <?php } else { ?>
            <div class="flagbox pais flag<?php echo $partido['pais_imagen']; ?>b"></div>
        <?php }?> 
        </div>
        <div class="col-xs-10 col-md-11 col-lg-11">            
            <span class="pull-left boldfont">                            
                <?php echo $partido['nombreTemporada']; ?>
                <br />
                <div class="marconegro marco" style="background-color: gainsboro">
                <?php 
                if (198 != $partido['jornada']) {
                    if (1 == $partido['tipo_torneo']) {
                        echo '<a href="'.$pgEnlace.'">Jornada '.$partido['jornada'].'</a>';
                    } else {
                        echo '<a href="'.$pgEnlace.'">'.$partido['fase'].'</a>';
                        if ($partido['grupo_id']>0) { echo ' - <a href="'.$pgEnlace.'&grupo_id='.$partido['grupo_id'].'">'.$partido['nombreGrupo'].'</a>'; }
                    }
                } else {echo 'Ligas Internacionales';} ?>
                </div>
            </span>
        </div>
            
        <div class="col-xs-12 h25 whitebox" style="margin-top: 5px"><span class="pull-right">
        <?php if (isset($partido['hora_prevista'])) { $h = ' a las '.$horaPrevista->format('H:i');
            } else { $h = ''; }
            echo nombreDia($partido['fecha']).$h; ?>
            </span>
        </div>
    </div>
</div>
<?php if ($partido['tv'] > 0 && 1 != $partido['estado_partido']) { ?>
<div class="clear"></div>
<div class="col-xs-12 text-center marco" style="background-color: gainsboro !important">
    <div class="col-xs-12 text-center boldfont"><?= $textoTv??''; ?></div>
    <div class="col-xs-12">
    <?php foreach ($partiTv as $tvs) { ?>
        <div>
        <?= $tvs['nombre']; ?>
        <img alt="<?= $tvs['nombre']; ?>" src="/img/television/medio<?php echo $tvs['id']; ?>.png"
             style="max-height: 38px">
         </div>
    <?php } ?>
    </div>
    <div class="clear"></div>
</div>
<div class="clear"></div>
<?php } ?>
 <!--Fin row Jornada y división-->

<?php
if (0 == $invertidoP && $partido['estado_partido']==2 && $partido['betsapi']<2) {
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

if (strlen($comentarios)>2) {
     unset($t);
    $t = explode('-', $comentarios);
    if (isset($t[3])){$ev=$t[3];}
    //var_dump($t);
    if (isset($t)) {
        $t['color'] = '#f07474';
        if (1 == $t[0]) { $t['color'] = '#f07474'; }
        if (2 == $t[0]) { $t['color'] = '#7cc002'; }
        if (3 == $t[0]) { $t['color'] = '#610B0B'; }
        if (4 == $t[0]) { $t['color'] = '#0B3B0B'; }        
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
    } ?>
    <div class="col-xs-12 text-center clear">
        <span class="actua pull-right badge">
        Actualizado a las <?php echo $hora = date('H:i:s'); ?>
        </span>
        <div class="h25"></div>
        <?php if (6 == $partido['estado_partido']) { ?>
        <p class="timeresult tryellow" style="margin-left:30%; width: 40% !important">Descanso</p>
        <?php } elseif (2 == $partido['estado_partido']) { ?>
        <p class="timeresult" style="background-color:<?php echo $t['color']; ?>; margin-left:30%; width: 40% !important">
            <?php echo $t['tiempo']; ?>                    
            </p>
        <?php } elseif (3 == $partido['estado_partido'] || 4 == $partido['estado_partido']) { ?>
        <p><?php echo $partido['estado_partido']; ?></p>
        <?php  } ?>
    </div>

<?php } ?>

<!--Begin Equipos-->
<div class="row">
    <div class="col-xs-12 nopadding">
        <div class="col-xs-6 text-center">
            <h4><?php echo $partido['local']; ?></h4>
        </div>
        <div class="col-xs-6 text-center">
            <h4><?php echo $partido['visitante']; ?></h4>
        </div>

        <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id']==5211 || $_SESSION['user_id']==11348051){ 
        echo '<div class="col-xs-12">@'.$partido['twitter_local'].' '.$partido['goles_local'].'-'.$partido['goles_visitante'].' @'.$partido['twitter_visitante'].'<br />
        Todos los detalles en https://futbolme.com'.$_SERVER['REQUEST_URI'].'</div>'; } ?>
    </div>
</div>
<!--FIN Begin Equipos-->
<div class="col-xs-12 whitebox" id="partido-directo">
    <div class="col-xs-3 col-md-4 col-lg-4 text-center">
        <img class="escudo_ind" src="<?php echo $escudoLocal?>" alt="escudo">
    </div>
    <?php  if ($partido['estado_partido']==4) { ?>
        <div class="col-xs-6 col-md-4 col-lg-4 text-center border-right-white boldfont" style="border-radius: 10px; background-color: orange">Aplazado
        </div>
    <?php } else { ?>
        <div class="col-xs-3 col-md-2 col-lg-2 text-center border-right-white" style="border-radius: 10px; background-color:<?php echo $fondo_color; ?>; color:<?php echo $texto_color; ?>">
            <?php if (1 == $partido['estado_partido'] || 2 == $partido['estado_partido'] || 6 == $partido['estado_partido']) { ?>
                <p class="marcador"><?php echo $partido['goles_local']; ?></p>
            <?php } else { ?>
                <p class="marcador">-</p>
            <?php } ?>
        </div>
        
        <div class="col-xs-3 col-md-2 col-lg-2 text-center border-left-white" style="border-radius: 10px; background-color:<?php echo $fondo_color; ?>; color:<?php echo $texto_color; ?>">
            <?php if (1 == $partido['estado_partido'] || 2 == $partido['estado_partido'] || 6 == $partido['estado_partido']) { ?>
                <p class="marcador"><?php echo $partido['goles_visitante']; ?></p>
            <?php } else { ?>
                <p class="marcador">-</p>
            <?php } ?>
        </div>
    <?php }  ?>
    <div class="col-xs-3 col-md-4 col-lg-4 text-center">
    <img class="escudo_ind" src="<?php echo $escudoVisitante?>" alt="escudo">
    </div>
    <div class="clear h25"></div>
<?php
    require_once 'includes/pagPartido/alineaciones.php';
    if (isset($partido['observaciones']) && strlen($partido['observaciones']) > 5 && count($partidoGoles)==0) {?>
        <div class="col-xs-12 nopadding">
            <?php $cadena = desglosarTexto($partido['observaciones']); 
            if (isset($cadena[1])){ $cadenaGoles=strlen($cadena[1]); }
            if (isset($cadena[2])){ $cadenaGoles=strlen($cadena[2])+$cadenaGoles; }
            include 'srcRecursos/partidoObsR.php'; ?>
        </div>
        <div class="clear" style="height: 5px !important;"></div>
    <?php } ?>
</div>



<?php  if (isset($partido['ida'])) { ?>
<div class="col-xs-12" style="text-align:center; background-color:gainsboro">
<?php $ida = explode(',', $partido['ida']);
    $ida_resulcasa = $ida[0]; //el resultado del visitante en casa en la ida
    $ida_resulfuera = $ida[1];$ida_jornada = $ida[2];$ida_fecha = $ida[3];
    if ($partido['fecha'] > $ida_fecha && 198 != $partido['jornada']) {
        $ida_partido = $ida[4];
        if (1 == $partido['tipo_torneo']) { $txt = 'correspondiente a la jornada '.$ida_jornada;
        } else { $txt = ''; }
        if ($ida_resulcasa == $ida_resulfuera) {
            echo 'En el partido de ida, '.$txt.'  el '.$partido['visitante'].' y el '.$partido['local'].' empataron <b>'.$ida_resulcasa.'-'.$ida_resulfuera."</b> <a href='/resultados-directo/partido/".poner_guion($partido['visitante']).'-contra-'.poner_guion($partido['local']).'/'.$ida_partido."'>-ver-</a>";
        } elseif ($ida_resulcasa > $ida_resulfuera) {
            echo 'En la ida, el '.$partido['visitante'].' venció al '.$partido['local'].' '.$txt.' con un resultado de <b>'.$ida_resulcasa.'-'.$ida_resulfuera."</b>. <a href='/resultados-directo/partido/".poner_guion($partido['visitante']).'-contra-'.poner_guion($partido['local']).'/'.$ida_partido."'>-ver-</a>";
        } else {
            echo 'El '.$partido['visitante'].' perdió en casa contra el '.$partido['local'].' por <b>'.$ida_resulcasa.'-'.$ida_resulfuera.'</b> '.$txt." <a href='/resultados-directo/partido/".poner_guion($partido['visitante']).'-contra-'.poner_guion($partido['local']).'/'.$ida_partido."'>-ver-</a>";
        }
    } ?>
</div>
<?php } ?>