<?php
$static_v = 1; 
define('_FUTBOLME_', 1);

require_once '../src/consultas.php';
require_once '../src/funciones.php';
// definimos los valores iniciales para nuestro calendario
$_GET['modo']=$_GET['modo']??'';
if ('enviar_twit_equipo' == $_GET['modo']) {
            $url = 'https://futbolme.com/equipo.php?id=';
            $urlMi = 'http://futbolme.com/src/usuarios/anadirEquipoFavoritoUrl.php?equipo_id=';
            $hastags = '#futbolmeCalendarios';
            $msj = $_GET['mensaje'];
            $equipos = $_GET['equipos'];
            $idsequipos = $_GET['idsequipos'];
            $equipos = explode(',', $equipos);
            $idsequipos = explode(',', $idsequipos);

            $mensaje=$msj."\n";

            foreach ($equipos as $key => $equipo) {                
            $mensaje.="Agrega $equipo a Mifutbolme ".$urlMi.$idsequipos[$key]."\n";
            }

            echo $mensaje.'<br />';
            $respuesta = sendTweet2($mensaje);
            imp($respuesta);
            //echo "<br />Copia y pega para Enviados";
            die;
        }


$partido_id=$_GET['id'];


//require_once '../includes/pagPartido/arranque.php';

$partido = Xpartido($partido_id);
$apuesta_torneo = $partido['apuesta_torneo'];
$betsapi = $partido['betsapi'];
$apifootball = $partido['partidoAPI'];
$e1 = $partido['equipoLocal_id'];
$e2 = $partido['equipoVisitante_id'];
$et1 = $partido['local'];
$et2 = $partido['visitante'];
$equipos= $et1.','.$et2;
$seleccion = $partido['es_seleccion'];
$temporada_id = $partido['temporada_id']; 
$liga_local = $partido['liga_local'];
$liga_visitante = $partido['liga_visitante']; 
$liga_local=$liga_local??0;
$liga_visitante=$liga_visitante??0;

$tipo_eliminatoria=0;
if (2 == $partido['tipo_torneo']) {
    $tipoJornada=tipoJornada($partido['jornada']);
    $tipo_eliminatoria=$tipoJornada[0];
}

$equiposTw = array();
$equiposTw[0]['id'] = $e1;
$equiposTw[0]['equipo'] = $et1;
$equiposTw[0]['idPais'] = $partido['paisLocal_id'];
$equiposTw[0]['twitter'] = $partido['twitter_local'];
$equiposTw[0]['club_id'] = $partido['club_id_local']??NULL;

$equiposTw[1]['id'] = $e2;
$equiposTw[1]['equipo'] = $et2;
$equiposTw[1]['idPais'] = $partido['paisVisitante_id'];
$equiposTw[1]['twitter'] = $partido['twitter_visitante'];
$equiposTw[1]['club_id'] = $partido['club_id_visitante']??NULL;

$escudoLocal=rutaEscudo($partido['club_id_local'],$partido['equipoLocal_id']);
$escudoVisitante=rutaEscudo($partido['club_id_visitante'],$partido['equipoVisitante_id']);

$texto_color='white';
if ($partido['estado_partido']<2){$fondo_color='black';} else {$fondo_color='red';}

$torneoSlug=poner_guion($partido['nombreTemporada']??'xxx');
$pgEnlace="/resultados-directo/torneo/".$torneoSlug."/".$partido['temporada_id']."/".$partido['jornada'];
$pgEnlaceActiva="/resultados-directo/torneo/".$torneoSlug."/".$partido['temporada_id'];

$horaPrevista = DateTime::createFromFormat('H:i:s', $partido['hora_prevista']);
$horaActual = date('Y-m-j H:m:s');

$partido['betsapi']=$partido['betsapi']??0;
$comentarios=$partido['comentario']??'';
$partido['hora_real']=$partido['hora_real']??'00:00:00';
$parte=0; $minutos=0;
$fecha1 = date('Y-m-d H:i:s');
$fecha1 = date_create($fecha1); //hora actual
$fecha2 = date($partido['fecha'].' '.$partido['hora_real']); 
$fecha2 = date_create($fecha2); // hora comienzo real
if ($partido['id']==257896){ $partido['hora_prevista']="15:22:00";}
$fecha3 = date($partido['fecha'].' '.$partido['hora_prevista']);
$fecha3 = date_create($fecha3); //hora prevista
$dPartido = date_diff($fecha3, $fecha1);
$diasP = $dPartido->d;
$horasP = $dPartido->h;
$minutosP = $dPartido->i;
$segundosP = $dPartido->s;
$invertidoP = $dPartido->invert;
$txth = $horasP.' horas';
$txtm = $minutosP.' minutos';
$partiTv=partidosMedios($partido_id);

if (0 == $invertidoP) {                                       
        $textoTv='Televisado en estos momentos por: ';
} else { 
    if (0 == $diasP) {
        if (1 == $horasP) {$txth = $horasP.' hora';}
        if (0 == $horasP) {$txth = '';}
        if ($horasP > 0 && $minutosP > 0) { $txth .= ' y ';}
        if (1 == $minutosP) {$txtm = $minutosP.' minuto';}
        if (0 == $minutosP) {$txtm = '';}
        $textoTv='Televisado en '.$txth.$txtm.' por: ';
    }
}

if ($liga_local>0) {

	$f = '../json/temporada/'.$liga_local.'/tipo.json';
    Xtipo($liga_local);
   

	$json = file_get_contents($f);
	$datos = json_decode($json, true);	
	if (isset($datos['clasificacion'])){
		$clasificacion=$datos['clasificacion']['clasificacionFinal'];
		foreach ($clasificacion as $key => $value) {
			if($value['equipo_id']==$e1){ $e1Clas=$value; break; }
		}
	}
    //imp($e1Clas);   
    
} 
if ($liga_visitante>0) {
    $f = '../json/temporada/'.$liga_visitante.'/tipo.json';
	$json = file_get_contents($f);
	$datos = json_decode($json, true);
	if (isset($datos['clasificacion'])){	
		$clasificacion=$datos['clasificacion']['clasificacionFinal'];
		foreach ($clasificacion as $key => $value) {
			if($value['equipo_id']==$e2){ $e2Clas=$value; break; }
		}
	}
    //imp($e2Clas);   
}?>
<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:image" content="https://futbolme.com/img/logo.png" />
<meta name="ga-site-verification" content="UPgOhn36Odw90H6CQqECMmTG" />
<?php if (isset($metaDescripcion)) { ?>
<meta name="description" content="<?php echo $metaDescripcion; ?>" />
<meta property="og:description" content="<?php echo $metaDescripcion; ?>" />
<?php } ?>

<link href="/css/bootstrap.min.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/main.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/style.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/comunidades.min.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/paises.min.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/js/ajax.js?=<?php echo $static_v; ?>"></script>
</head>
<body>
<div class="col-xs-12 nopadding">
    <div class="col-xs-6 nopadding">
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
                                echo '<a href="'.$pgEnlace.'" target="_blank">Jornada '.$partido['jornada'].'</a>';
                                echo ' - <a href="'.$pgEnlaceActiva.'/" target="_blank">Activa</a>';
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
            require_once '../includes/pagPartido/alineaciones.php';

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



            


        <?php if (isset($e1Clas) && isset($e2Clas)) { ?>
        <table class="table table-bordered table-condensed whitebox nomargin txt11">
        <?php 
        $color_fondo = 'white';
                $txtPreferente = '';
                $jornadas = 0;
                for ($i = 0; $i < 2; ++$i) {
                    if (0 == $i && !isset($e1Clas)) {
                        continue;
                    }
                    if (1 == $i && !isset($e2Clas)) {
                        continue;
                    }
                    if (isset($e1Clas) && 0 == $i) {
                        $fila = $e1Clas;
                        $temporada_id = $liga_local;
                    }
                    if (isset($e2Clas) && 1 == $i) {
                        $fila = $e2Clas;
                        $temporada_id = $liga_visitante;
                    }
                    if (isset($fila['preferente'])) {
                        if (1 == $fila['preferente'] && 0 == $i) {
                            $color_fondo = 'yellow';
                            $txtPreferente = '*Clasificación En vivo';
                        }
                    }

                    if (0 == $i) {
                        ?>
                <thead>
                    <tr class="darkgreenbox">
                        <th class="text-center" colspan="2">
                        <?php if ($tipo_eliminatoria==3) {
                            echo "En sus respectivas ligas...";
                        } ?>
                        </th>
                        <th class="text-center" style="width:7%">P<span class="hidden-xs">TO</span>S</th>
                        <th class="text-center" style="width:7%">J<span class="hidden-xs">U</span></th>
                        <th class="text-center" style="width:7%">G<span class="hidden-xs">A</span></th>
                        <th class="text-center" style="width:7%">E<span class="hidden-xs">M</span></th>
                        <th class="text-center" style="width:7%">P<span class="hidden-xs">E</span></th>
                        <th class="text-center" style="width:7%"><span class="hidden-xs">G</span>F</th>
                        <th class="text-center" style="width:7%"><span class="hidden-xs">G</span>C</th>
                        <th class="text-center" style="width:9%">D<span class="hidden-xs">I</span>F</th>
                    </tr>
                </thead>
                <?php
                    } ?>
                <tbody class="whitebox">
                <?php 
                if ($fila['jugados'] > $jornadas) {
                    $jornadas = $fila['jugados'];
                }
                    $pgEnlace = '/resultados-directo/equipo/'.poner_guion($fila['nombre']).'/'.$fila['equipo_id'];
                    $color_fondo = 'white';
                    if (isset($fila['preferente'])) {
                        if (1 == $fila['preferente']) {
                            $color_fondo = 'yellow';
                        }
                    }
                    $color_fila = '';
                    if (isset($equipo_id) && $equipo_id == $fila['equipo_id']) {
                        $color_fila = "style='background-color:gainsboro'";
                    } 

                    $rutaEscudo=rutaEscudo($fila['club_id'],$fila['equipo_id']);

                    if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaEscudo))) {
                        $rutaEscudo = '/img/jugadores/NI.png';
                    }

                    ?>
                        <tr>
                            <td class="text-center" style="<?php echo $fila['css']; ?>"><?php echo $fila['posicion']; ?></td>
                            <td style="text-align:left;">
                                <span class="hidden-sm hidden-md hidden-lg">
                                <a href="<?php echo $pgEnlace; ?>&modelo=Calendario" title="Calendario del <?php echo $fila['nombreCorto']; ?>">
                                <img src="<?php echo $rutaEscudo?>"  alt="equipo" style="width:18px; height:20px">
                                <b><?php echo $fila['nombreCorto']; ?></b>
                                </a>
                                </span>
                                <span class="hidden-xs">
                                <a href="<?php echo $pgEnlace; ?>&modelo=Calendario" title="Calendario del <?php echo $fila['nombreCorto']; ?>">
                                <img src="<?php echo $rutaEscudo?>" alt="equipo"  style="width:18px; height:20px">
                                <b><?php echo $fila['nombre']; ?></b>
                                </a>
                                </span>
                            </td>
                            <td class="text-center" style="background-color:<?php echo $color_fondo; ?>">
                            <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Puntos" title="<?php echo $fila['nombreCorto']; ?> - Puntos conseguidos">
                            <b><?php echo $fila['puntos']; ?></b></a>
                            </td>
                            <td class="text-center">
                            <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Jugados" title="<?php echo $fila['nombreCorto']; ?> - Partidos jugados">
                            <?php echo $fila['jugados']; ?></a>
                            </td>
                            <td class="text-center">
                            <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Ganados" title="<?php echo $fila['nombreCorto']; ?> - Partidos ganados">
                            <?php echo $fila['ganados']; ?></a>
                            </td>
                            <td class="text-center">
                            <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Empatados" title="<?php echo $fila['nombreCorto']; ?> - Partidos empatados">
                            <?php echo $fila['empatados']; ?></a>
                            </td>
                            <td class="text-center">
                            <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Perdidos" title="<?php echo $fila['nombreCorto']; ?> - Partidos perdidos">
                            <?php echo $fila['perdidos']; ?></a>
                            </td>
                            <td class="text-center">
                            <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Favor" title="<?php echo $fila['nombreCorto']; ?> - Goles a favor">
                            <?php echo $fila['gFavor']; ?></a>
                            </td>
                            <td class="text-center">
                            <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Contra" title="<?php echo $fila['nombreCorto']; ?> - Goles en contra">
                            <?php echo $fila['gContra']; ?></a>
                            </td>
                            <td class="text-center"><?php echo $fila['gFavor'] - $fila['gContra']; ?></td>
                        </tr>  
                    <?php
                } ?>
                    <tr><td colspan="10" align="right"><?php echo $txtPreferente; ?></td></tr>  
                            </tbody>
                    </table>
        <?php } //si existe e2Clas o e1Cla

               
               $filtro=0;
               $titol="últimos comentarios..."; 
               $tiempoAcorrer=(60*5);
               $nivel="../";
               //require_once '../srcRecursos/pesLeerTwitsPortada.php';
        //imp($equiposTw);

        $equiposTw = array_slice($equiposTw, 0, 20);
        shuffle($equiposTw);
        $f = new \DateTime();
        $f1 = $f->format('Y-m-d H:i:s');
        $titol = $titol??'Visto en twitter';
        $filtro = $filtro??0;
        $tiempoAcorrer=$tiempoAcorrer??3600;
        //$tiempoAcorrer=(60*60); // 7 días; 24 horas; 60 minutos; 60 segundos

         ?> 
            <div class="col-xs-12 nopadding whitebox"><h3 style="background-color: #5a94dd; color:white; padding: 10px"><?php echo $titol?></h3></div>
            <?php $contador = 0;

            $categoria_id=$categoria_id??0;
            $idsequipos='';


            foreach ($equiposTw as $key => $value) {

                

                if (!isset($value['twitter'])) { $value['twitter']=0; }        
                if (!isset($value['idPais'])) { $value['idPais'] = 60;}
                $seleccion=$value['seleccion']??0; 
                    if ($seleccion==0){
                        $escudo=rutaEscudo($value['club_id'],$value['id']);                
                    } else {
                        $escudo='/img/paises/banderas/ban'.$value['idPais'].'.png';
                    }

                $f = $nivel.'json/twits/'.$value['id'].'_twits.json';
                if (!@file_exists($f)) { 
                    //echo "El fichero no existe y se va a crear<br />";
                    returnTweet($value['twitter'], $value['id'], 100); //con 100 indicamos que estamos en panelBack
                } 

                
                $idsequipos .= $value['id'].',';
                
                if (@file_exists($f)) {
                    $tiempo1=time();$tiempo2=filemtime($f);$segundos=$tiempo1-$tiempo2;            
                    if ($segundos>$tiempoAcorrer) {returnTweet($value['twitter'], $value['id'], 100);} 
                    $json = file_get_contents($f);
                    $t = json_decode($json, true);
                    //imp($t);
                    if (isset($t['errors'])) { 
                        unlink($f); 
                    }
                    //imp(count($t));die;

                    if (count($t) > 2) {
                        $hay = 0; 
                        foreach ($t as $k => $txt) {
                            
                            if (!isset($txt['created_at'])) {
                                break;
                            }
                            if (isset($txt['retweeted_status']['text'])) {
                                $f2 = date('Y-m-d H:i:s', strtotime($txt['retweeted_status']['created_at'])); // extrae la fecha
                                $tx = ($txt['retweeted_status']['text']);
                                $id_str = $txt['retweeted_status']['id_str'];
                            } else {
                                $tx = $txt['text'];
                                $f2 = date('Y-m-d H:i:s', strtotime($txt['created_at'])); // extrae la fecha
                                $id_str = $txt['id_str'];
                            }
                            //imp($txt);die;
                            $d = diferenciaHoras($f1, $f2);
                            $diasamostrar=25;
                            if ($d->d < $diasamostrar && 0 == $d->m) { //si tiene menos de un dia
                                    if ($filtro==1){
                                        $buscamos="traspas"; //twits con la palabra temporada
                                        $pos = strripos($tx, $buscamos);
                                        if ($pos === false) { 
                                            $buscamos="cedido"; //twits con la palabra partido
                                            $pos = strripos($tx, $buscamos);
                                            if ($pos === false) { 
                                                $buscamos="fichaje"; //twits con la palabra fichaje
                                                $pos = strripos($tx, $buscamos);
                                                if ($pos === false) { 
                                                    $buscamos="alta"; //twits con la palabra alta
                                                    $pos = strripos($tx, $buscamos);
                                                    if ($pos === false) { 
                                                        $buscamos="baja"; //twits con la palabra baja
                                                        $pos = strripos($tx, $buscamos);
                                                        if ($pos === false) { 
                                                            $buscamos="abon"; //twits con la palabra baja
                                                            $pos = strripos($tx, $buscamos);
                                                            if ($pos === false) { 
                                                                $buscamos="temporada"; //twits con la palabra baja
                                                                $pos = strripos($tx, $buscamos);
                                                                if ($pos === false) { continue; }
                                                            }
                                                        }
                                                    }
                                                }                                        
                                            }
                                        } 
                                    }  

                        if (0 == $contador) {
                            $hay = 1;
                            ++$contador;
                            $pgEquipo = '/resultados-directo/equipo/'.poner_guion($value['equipo']).'/'.$value['id']; ?>
                            <div class="col-xs-12 whitebox">
                            <div class="hide"><?php echo $value['idPais']; ?></div>
                            <a href="<?php echo $pgEquipo; ?>"><h4><?php echo $value['equipo']; ?></h4>
                            <img class="escudo_ind" src="<?php echo $escudo; ?>" alt="escudo" style="float:left; padding:15px;"></a>
                    <?php                     
                            if (isset($value['club_id'])){
                                $enlaces=enlaceAleatorioAmazon($value['club_id']);   
                                                   
                                if (!empty($enlaces)){ 
                                    shuffle($enlaces);
                                    $enlace=$enlaces[0]['enlace']; 
                                    echo '<div class="pull-right">';     
                                    include $nivel.'includes/publicidad/amazon.php';
                                    echo '</div>';
                                }
                            }
                            
                        }
                        
                        if (5 == (int)$k) {
                            break;
                        }
                        $texto = convertirUrls($tx);
                        if (null != $texto) {
                            ?>
                            <div class="marco">
                           <span style="color:dimgray"><b><i><?php echo substr($f2,-8)?></i></b></span> - <?php echo $texto; ?>                                
                            </div>  
                    <?php
                        }
                    }
                }
                        
                        if (1 == $hay) {
                            ?></div><?php $hay = 0;$contador = 0;
                        }
                    } //if count>1
                } //si existe el fichero
            }
?>
        </div>
    </div>
    <div class="col-xs-6 nopadding">
        <div id="partido-<?php echo $partido_id?>"></div>
        <span style="cursor:pointer;"onclick="editar_partido(<?php echo $partido_id?>)"> -Editar partido </span> - 
        <span style="color:maroon"><a href="/panelBack/federacion/recursos/equiposTemporada.php?temporada_id=<?php echo $temporada_id?>" target="_blank">Equipos</a></span>
         - 
        <span style="color:maroon"><a href="/panelBack/crearCalendario.php?temporada_id=<?php echo $temporada_id?>&categoria_torneo=<?php echo $partido['categoria_torneo_id']?>&tipo_torneo=1" target="_blank">Calendario</a></span>
        <?php        
        imp($escudoLocal);
        imp($escudoVisitante);

        if (strlen($partido['twitter_local'])>0 || strlen($partido['twitter_visitante'])>0) {

        imp($partido['twitter_local'].' '.$partido['twitter_visitante']);
        ?>
        <form method='get' action='agendaTwitt.php'>
                <input type='hidden' name='modo' value='enviar_twit_equipo'>
                <input type='hidden' name='equipos' value='<?php echo $equipos; ?>'>
                <input type='hidden' name='idsequipos' value='<?php echo $idsequipos; ?>'>
                <input type='hidden' name='temporada_id' value='<?php echo $temporada_id?>'>
                <textarea name="mensaje" cols="80" rows="5"><?php 
                    if (strlen($partido['twitter_local'])>0 && strlen($partido['twitter_visitante'])>0) {
                        echo '@'.$partido['twitter_local'].' - '.'@'.$partido['twitter_visitante'];
                    }

                    if (strlen($partido['twitter_local'])>0 && strlen($partido['twitter_visitante'])==0) {
                        echo '@'.$partido['twitter_local'].' - '.$et2;
                    }

                    if (strlen($partido['twitter_local'])==0 && strlen($partido['twitter_visitante'])>0) {
                        echo '@'.$partido['twitter_visitante'].' visita al '.$et1;
                    }

                    echo "\n";
                    echo 'Hoy, '.$h.', partido de '.$partido['nombreTemporada']."\n";


                    ?>



            </textarea> 
                <input type="submit" name="enviar" value="Enviar twit.">
        </form>
        <?php } ?>
    </div>
</div>

</body>
</html>



<?php

function sendTweet2($mensaje)
{
    ini_set('display_errors', 1);
    require_once 'apiTwitter/TwitterAPIExchange.php';
    /** Set access tokens here - see: https://dev.twitter.com/apps/ **/
    
    $settings = array(
            'oauth_access_token' => '484030348-H8XpRjupJBMGR8F9PYczsJITxxiF28tIwJaaVVFs',
            'oauth_access_token_secret' => '8GgBO8vrVEr7RLmW7tFsdH7cFEEVqwKkyFTTW0zepoek3',
            'consumer_key' => '46Qx5J4aaZyFt3yR62TJSFerj',
            'consumer_secret' => 'fr0AM3l7ty21UfeEqkcl51gLp0uqVAnjcXoepQymGGX8D3yXxN',
        );

    $url = 'https://api.twitter.com/1.1/statuses/update.json';
    $requestMethod = 'POST';
    /** POST fields required by the URL above. See relevant docs as above **/
    $postfields = array('status' => $mensaje);
    /** Perform a POST request and echo the response **/
    $twitter = new TwitterAPIExchange($settings);

    return $twitter->buildOauth($url, $requestMethod)->setPostfields($postfields)->performRequest();
}
?>