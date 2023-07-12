<?php
$static_v = 1; 
define('_FUTBOLME_', 1);

require_once '../includes/config.php';
require_once '../includes/head.php';


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

	$f = '../../../json/temporada/'.$liga_local.'/tipo.json';
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
    $f = '../../../json/temporada/'.$liga_visitante.'/tipo.json';
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
</head>
<body>
<div class="col-xs-12 nopadding">
    <div class="col-xs-6 nopadding">
        <div id="partidoX" class="whitebox">
        <div class="row greenbox nomargin">
            
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

                $f = '../../../json/twits/'.$value['id'].'_twits.json';
                
                
                $idsequipos .= $value['id'].',';
                
                if (@file_exists($f)) {
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
                                  

                        if (0 == $contador) {
                            $hay = 1;
                            ++$contador;
                            $pgEquipo = '/resultados-directo/equipo/'.poner_guion($value['equipo']).'/'.$value['id']; ?>
                            <div class="col-xs-12 whitebox">
                                <div style="clear: both;"></div>
                            <hr />
                            <div style="padding: 10px"><a href="<?php echo $pgEquipo; ?>"><h3><?php echo $value['equipo']; ?></h3>
                            <img class="escudo_ind" src="<?php echo $escudo; ?>" alt="escudo" style="float:left; padding:15px;"></a></div>
                    <?php                     
                            
                            
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
                        
                        if (1 == $hay) {
                            ?></div><?php $hay = 0;$contador = 0;
                        }
                    } //if count>1
                } //si existe el fichero
            }
?>
        </div>
    </div>
    
</div>

</body>
</html>

<?php

function convertirUrls($ret)
    {
        $ret = preg_replace("#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t< ]*)#", '\\1<a href="\\2" >\\2</a>', $ret);
        $ret = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r< ]*)#", '\\1<a href="http://\\2" >\\2</a>', $ret);
        $ret = preg_replace("/<a href=(.*?)>(.*?)<\/a>/", '<a href="$1">Ver en twitter</a>', $ret);
        $ret = preg_replace("/@(\w+)/", '<a href="http://www.twitter.com/\\1" >@\\1</a>', $ret);
        $ret = preg_replace("/#(\w+)/", '<a href="http://search.twitter.com/search?q=\\1" >#\\1</a>', $ret);
        $ret = preg_replace("/'/D", '"', $ret);

        return $ret;
    }

?>
