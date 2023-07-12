<?php

//imp($partido);

$colorL = 'black';
$colorV = 'black';
$pagina=$pagina??'';
$icono=$icono??'';
$ev=0;
$partido['localCorto']=$partido['home']['name'];
$partido['visitanteCorto']=$partido['away']['name'];
$partido['idPais']=$partido['idPais']??0;
$clasificado=$partido['clasificado']??0;
$partido['jornada']=$partido['extra']['round']??0;
$partido['estadio_nombre']=$partido['extra']['round']??0;
$partido['estadio_localidad']=$partido['extra']['round']??0;

$fondocolorL = '';
$fondocolorV = '';



$partido['betsapi']=$partido['id']??0;
$comentarios=$partido['comentario']??'';
$partido['hora_real']=$partido['hora_real']??'00:00:00';
$parte=0; $minutos=0;


$fecha1 = date('Y-m-d H:i:s');
$fecha1 = date_create($fecha1); //hora actual


$fecha2 = date_create();
date_timestamp_set($fecha2, $partido['time']);
$partido['fecha']=date_format($fecha2, 'Y-m-d');
$partido['hora_prevista']=date_format($fecha2, 'H:i:s');





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

$pgLocal = '/resultados-directo/equipo/'.poner_guion($partido['localCorto']).'/'.(10000000+$partido['home']['id']).'&temp_id='.$temp_id;
$pgVisitante = '/resultados-directo/equipo/'.poner_guion($partido['visitanteCorto']).'/'.(10000000+$partido['away']['id']).'&temp_id='.$temp_id;
//$pgPartido = '/resultados-directo/partido/'.poner_guion($partido['localCorto']).'-'.poner_guion($partido['visitanteCorto']).'/'.$partido['id'];

$equipo_id=0;
$colorFondo=$colorFondo??'white';


    
$jornadaTxt='Jornada '.$partido['jornada'];


switch ($status) {
      case '0': $txt_status='Sin comenzar';break;
      case '1': $txt_status='En juego';break;
      case '2': $txt_status='Para ser fijado';break;
      case '3': $txt_status='Finalizado';break;
      case '4': $txt_status='Pospuesto';break;
      case '5': $txt_status='Cancelado';break;
      case '6': $txt_status='Walkover';break;
      case '7': $txt_status='interrumpido';break;
      case '8': $txt_status='Abandonado';break;
      case '9': $txt_status='retirado';break;
      case '99': $txt_status='eliminado';break;          
      default: $txt_status='Sin definir';break;
  } 

$parte=0;$ep = 0;            
$minuto = $partido['timer']['tm']??-1;
$segundo = $partido['timer']['ts']??-1;  
$totalSegundos=(($minuto*60)+$segundo);
$prolongacion = $partido['timer']['ta']??0; //tiempo añadido
$juego = $partido['timer']['tt']??0;  //tiempo detenido
$totalMinutos=$minuto+$prolongacion+1;

$prorroga=0;
$gl=$partido['scores']['2']['home']??0;
$gv=$partido['scores']['2']['away']??0;


if (2 == $status){ 
   if (($gl+$gv)>0){
       $ep = 1; $txt_status='Finalizado';  
   } 
   if (isset($partido['events'])) {
       $evs=$partido['events'];
       $ultimo = end($evs);
        $ultimo=$ultimo['text'];
        $t   = 'Score at the end of Full Time';

        $final = strpos($ultimo, $t);
        if ($final === false) {
            //echo "NO se ha encontrado la palabra deseada!!!!";
        } else {
            $ep = 1; $txt_status='Finalizado';
        }
    }
} 
//FINALIZADO  || 2 == $status
if (3 == $status) { $ep = 1; $txt_status='Finalizado'; }

if ($status>3 && $status<7) { $ep = 4; $txt_status='Aplazado'; } 


$minuto=(int)$minuto;
$segundo=(int)$segundo;


//echo "<br />estado partido antes de las condiciones=".$ep;

 
if (1 === (int)$status ) { //si esta en juego
//echo "<br />juego=".$juego;
    
    $colortexto = 'white';
    if (0 === (int)$juego ) {
        $parte=0;
        if (0 === $minuto && 0===$segundo ) { 
            $ep = 0;  $txt_status='A punto de comenzar'; 
        } 
        if (45 === $minuto && 0===$segundo ) { 
            $ep = 6;  $txt_status='Descanso'; $colortexto = 'marron';
        } 
        if ($minuto>44 && $minuto<50) { 
            $ep = 6;  $txt_status='Descanso'; $colortexto = 'marron'; //ultimas condiciones
        } 
        if (90 === $minuto && 0===$segundo && $prorroga==0 ) { 
            $ep = 1;  $txt_status='Finalizado';
        } 
        if ($minuto>89 && $minuto<99 && $prorroga==0) { 
            $ep = 1;  $txt_status='Finalizado'; //ultimas condiciones
        }         
        if (90 === $minuto && 0===$segundo && $prorroga==1 ) {
            $ep = 8;  $txt_status='Prórroga';
        }
        if (105 === $minuto && 0===$segundo ) { 
            $ep = 11;  $txt_status='Descanso prórroga'; 
        } 
        if (120 === $minuto && 0===$segundo && $prorroga==0 ) { 
            $ep = 1;  $txt_status='Finalizado'; 
        } 
        if (120 === $minuto && 0===$segundo && $prorroga==1 ) { 
            $ep = 7;  $txt_status='Penaltis'; 
        }
        if ($minuto>119 && $minuto<125 && $prorroga==0) { 
            $ep = 1;  $txt_status='Finalizado'; //ultimas condiciones
        }    

       // echo "<br />estado partido en juego 0=".$ep;
        // echo "<br />valor de la prorroga=".$prorroga;

    } else {
        
        /*var_dump($totalMinutos);
        var_dump($minuto);
        var_dump($parte);
        var_dump($colorfondo);
        var_dump($epFM);
        echo "<hr />";*/

        $ep = 2;
        if ($minuto<$totalMinutos && $ep===0) { $parte = 1;  $txt_status='primera parte';} 
        if ($minuto<$totalMinutos && $ep===6) { $parte = 2;  $txt_status='segunda parte';} 
        if ($minuto<$totalMinutos && $ep===8) { $parte = 3;  $txt_status='prórroga 1ª parte';} 
        if ($minuto<$totalMinutos && $ep===11) { $parte = 4;  $txt_status='prórroga 2ª parte';} 
        if ($parte===0){
            if ($minuto>45) { $parte=2; } else { $parte=1; }
        }
        $minuto=($minuto+1);
    }

//echo "<br />estado partido=".$ep;

if (1 == $parte) { $colorfondo = '#f07474';}
if (2 == $parte) { $colorfondo = '#7cc002';}
if (3 == $parte) { $colorfondo = '#610B0B';}
if (4 == $parte) { $colorfondo = '#0B3B0B';}
if (6 == $ep) { $colorfondo = '#ffe400';}
if (1 == $ep) { $colorfondo = 'black';}
if (8 == $ep) { $colorfondo = 'blue';}
if (11 == $ep) { $colorfondo = 'yellow';$colortexto = 'black';}
if (7 == $ep) { $colorfondo = '#2E2E2E';}

$comentarios=$parte.'-'.$minuto.'-'.$prolongacion.'-'.$ev;

} //fin de si esta en juego.
//echo "<br />Comentario= parte (".$parte.") - minuto (".$minuto.") - prolongación (".$prolongacion.") - evento (".$ev.")";


$partido['estado_partido']=$ep; 
$partido['goles_local']=$gl; 
$partido['goles_visitante']=$gv;  


if (isset($f) && $f != $partido['fecha']) {
    if ('whitebox' == $colorFondo) {
        $colorFondo = 'cajagrisclaro';
    } else {
        $colorFondo = 'whitebox';
    } ?>
<div class="col-xs-12 txt11 cajanaranja text-center"><?php echo nombreDiaCompleto($partido['fecha']); ?></div>
<?php }?>

<div class="col-xs-12 whitebox nopadding one-bordergrey-vert">
    <div class="boxpartido col-xs-12 <?php echo $colorFondo; ?> nopadding" itemscope
         itemtype="http://schema.org/SportsEvent" style="padding:5px !important">

        <meta itemprop="name" content="<?= $partido['localCorto'].' - '.$partido['visitanteCorto']; ?>">
        <meta itemprop="description" content="Partido entre <?= $partido['localCorto']; ?> y <?= $partido['visitanteCorto']; ?>">
        <span itemprop="location" itemscope itemtype="http://schema.org/Place">
            <meta itemprop="name" content="<?= $partido['estadio_nombre'] ?? 'Campo de fútbol'; ?>">
            <meta itemprop="address" content="<?= $partido['estadio_localidad'] ?? 'Campo de fútbol'; ?>">
        </span>

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
             <?php if (isset($jornadaActiva) && $jornadaActiva>0){?>
             <i style='color:dimgray'>&nbsp;&nbsp;<?=$jornadaTxt?></i>
            <?php } 
              

                
                

                
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
                border: 1px solid black; padding:3px;" title="Partido entre <?=$partido['localCorto'];?> y <?=$partido['visitanteCorto'];?>" onclick="mostrarColor(<?php echo $partido['id']?>)"></span>
                </div>

                
                
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


<div id="posicion<?php echo $partido['id']; ?>" style="display: none" >
<div class="marco" style="background-color: #CEECF5">
    <span class="pull-right boldfont" onclick="mostrarColor(<?php echo $partido['id']?>)" style="cursor:pointer;">Cerrar enlaces</span><br />
    <h4 class="text-center">Enlaces de interes de este partido</h4>

    <div class="col-xs-12 text-center">

        
<table width="100%">
    <tr><td width="50%" align="center">
        <h4><?php echo $partido['localCorto']; ?></h4>
    <h4><a class="txt11" href="<?php echo $pgLocal?>">Calendario</a></h4>
     <?php /*if (isset($tipo_torneo) && $tipo_torneo==1){ ?>
        <h4><a class="txt11" href="<?php echo $pgLocal?>&modelo=Clasificacion">Clasificación</a></h4>
        <?php }*/?>
    

 
</td>

<td width="50%" align="center">
    <h4><?php echo $partido['visitanteCorto']; ?></h4>
    <h4><a class="txt11" href="<?php echo $pgVisitante?>">Calendario</a></h4>
    <?php /*if (isset($tipo_torneo) && $tipo_torneo==1){ ?>
    <h4><a class="txt11" href="<?php echo $pgVisitante?>&modelo=Clasificacion">Clasificación</a></h4>
    <?php }*/ ?>
    
   
</td></tr>
</table>
    </div>
    <div class="clear"></div>
</div>
</div>

   
</div>

</div>

