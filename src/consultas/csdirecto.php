<?php

function insertarMovimiento($partido) {

$codigo_acta=$partido['codigo_acta']??0;

$sql='INSERT INTO movimiento(
partido_id, 
estado_partido, 
temporada_id, 
fecha, 
hora_prevista,
hora_real, 
comentario, 
goles_local, 
goles_visitante, 
evento, 
equipoLocal_id, 
local, 
equipoVisitante_id, 
visitante, codigo_acta) VALUES ("'.$partido['partido_id'].'","'.$partido['estado_partido'].'","'.$partido['temporada_id'].'","'.$partido['fecha'].'","'.$partido['hora_prevista'].'","'.$partido['hora_real'].'","'.$partido['comentario'].'","'.$partido['goles_local'].'","'.$partido['goles_visitante'].'","'.$partido['evento'].'","'.$partido['equipoLocal_id'].'","'.$partido['local'].'","'.$partido['equipoVisitante_id'].'","'.$partido['visitante'].'","'.$codigo_acta.'")';
    $mysqli = conectar();

        echo $sql.";<br />";
    
        if (!$resultadoSQL = mysqli_query($mysqli, $sql)) {
            printf("Errormessage: %s\n", mysqli_error($mysqli)); 
            echo $sql.'<br />';           
        } else {
            //echo "Movimiento insertado correctamente. Evento: ".$partido['evento']."<br />";
        }
}



function listarPartidosDia($temporada_id=0, $fecha)
{
    if (0 == $fecha) {
        $dia = date('y-m-j');
        $condicionDirectos=" OR p.estado_partido=2";
    } else {
        $a = substr($fecha, 0, 4);
        $m = substr($fecha, 4, 2);
        $d = substr($fecha, -2);
        $dia = $a.'-'.$m.'-'.$d;
        $condicionDirectos="";
    }

    $campos = 'p.id partido_id, p.estado_partido, p.temporada_id, p.fecha, p.hora_prevista, p.hora_real, p.goles_local, p.goles_visitante, p.jornada, p.clasificado, p.equipoLocal_id, ec.nombreCorto ncLocal,p.equipoVisitante_id, ef.nombreCorto ncVisitante, p.partidoAPI, p.betsapi, p.comentario, p.observaciones, tor.betsapi api_id, tor.tipo_torneo';
    $tabla = ' partido p';
    $union = ' INNER JOIN equipo ec ON ec.id=p.equipoLocal_id';
    $union.= ' INNER JOIN equipo ef ON ef.id=p.equipoVisitante_id';
    $union.= ' INNER JOIN temporada te ON te.id=p.temporada_id';
    $union.= ' INNER JOIN torneo tor ON tor.id=te.torneo_id';   
     
    if ($temporada_id==0){
      $condicion = ' WHERE p.fecha="'.$dia.'"'.$condicionDirectos;   
    } else {
      $condicion = ' WHERE p.temporada_id='.$temporada_id.' AND p.fecha="'.$dia.'"';      
    }
    $orden = ' ORDER BY p.estado_partido, p.hora_prevista';
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
    //echo $consulta;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    return $resultado;
}

function torneosApi()
{
    
    $dia = date('y-m-j'); 
    $campos = 'DISTINCT a.api_id ids';
    $tabla = ' partido p';
    $union = ' INNER JOIN temporada te ON te.id=p.temporada_id';
    $union.= ' INNER JOIN torneo tor ON tor.id=te.torneo_id';
    $union.= ' INNER JOIN apis a ON a.torneo_id=tor.id AND p.grupo_id=a.grupo_id';    
    $condicion = ' WHERE p.fecha="'.$dia.'"';   
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado1 = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    $campos = 'DISTINCT a.api_id ids';
    $tabla = ' partido p';
    $union = ' INNER JOIN temporada te ON te.id=p.temporada_id';
    $union.= ' INNER JOIN torneo tor ON tor.id=te.torneo_id';
    $union.= ' INNER JOIN apis a ON a.torneo_id=tor.id AND p.grupo_id IS NULL';    
    $condicion = ' WHERE p.fecha="'.$dia.'"';   
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado2 = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    $resultado= array_merge($resultado1,$resultado2);

    return $resultado;
}

function torneosApiBet()
{
    
    $dia = date('Y-m-j'); 
    $campos = 'DISTINCT tor.betsapi ids';
    $tabla = ' partido p';
    $union = ' INNER JOIN temporada te ON te.id=p.temporada_id';
    $union.= ' INNER JOIN torneo tor ON tor.id=te.torneo_id';
    $condicion = ' WHERE p.fecha="'.$dia.'" 
    AND p.estado_partido<>1 
    AND tor.betsapi>0';   
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion;
    //echo $consulta."<br />";
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC); 

    return $resultado;
}

function partidosApiBet($ids){
$token="7865-b0PXlPMI94xvu3";
$dia = date('Y-m-d'); 
$inicio=str_replace("-", "", $dia);
//en juego= inplay  próximos=upcoming

$ids[]['ids']=631;
$ids[]['ids']=375;
$ids[]['ids']=1764;
$ids[]['ids']=6084;
$ids[]['ids']=508;
$ids[]['ids']=1711;
$ids[]['ids']=2656;
$ids[]['ids']=8993;

$ids[]['ids']=26;
$ids[]['ids']=250;
$ids[]['ids']=508;
$ids[]['ids']=598;
$ids[]['ids']=6584;
$ids[]['ids']=10942;

$ids[]['ids']=4026;

$ids[]['ids']=5371;
$ids[]['ids']=1711;
$ids[]['ids']=6296;
$ids[]['ids']=795;
$ids[]['ids']=3756;

    $partidosHoy=array(); $partidos=array();
    $tiempo_inicio = microtime_float();    
    $url= "";
    $url='https://api.betsapi.com/v1/events/inplay?sport_id=1&token='.$token;

    echo $url."<br />";
    $resultado = file_get_contents($url);            
    $resultado =json_decode($resultado,true);            
    $p=$resultado['results']; 

    /* $url2='https://api.betsapi.com/v2/events/ended?sport_id=1&token='.$token;
    echo $url2."<br />";
    $resultado2 = file_get_contents($url2);            
    $resultado2 =json_decode($resultado2,true); 
    $p2=$resultado2['results']; 

    

    $p = array_merge($p, $p2); */

    $partidosSueltos=array();
    //imp($ids);
    foreach ($p as $value) {
        $exito=0;
        foreach ($ids as $v) {
            if ((int)$value['league']['id']==(int)$v['ids']){
                $partidos[$v['ids']][]=$value;
                $exito=1;
            } 
        }
        if ($exito==0) {
            //echo "Añado un partido al suelto<br />";
            $partidosSueltos[(int)$value['league']['id']][(int)$value['id']]=$value; 
            //imp($value);
        }
    }

    $f = '../json/partidosSueltos.json';
    guardarJSON($partidosSueltos, $f);
    


    return $partidos;  



}


function partidosHoyBet($partidosApi) {

    
    if (!isset($partidosApi[363])){ $partidosApi[363]=array(); }
    if (!isset($partidosApi[5361])){ $partidosApi[5361]=array(); }
    if (!isset($partidosApi[941])){ $partidosApi[941]=array(); }
    if (!isset($partidosApi[217])){ $partidosApi[217]=array(); }

    
    if (isset($partidosApi[631])){
        $partidosApi[363] = array_merge($partidosApi[631], $partidosApi[363]);
        unset($partidosApi[631]);
    }
    if (isset($partidosApi[1764])){
        $partidosApi[363] = array_merge($partidosApi[1764], $partidosApi[363]);
        unset($partidosApi[1764]);
    }
    if (isset($partidosApi[6084])){
        $partidosApi[363] = array_merge($partidosApi[6084], $partidosApi[363]);
        unset($partidosApi[6084]);
    }
    if (isset($partidosApi[375])){
        $partidosApi[363] = array_merge($partidosApi[375], $partidosApi[363]);
        unset($partidosApi[375]);
    }
    
    
    if (isset($partidosApi[508])){
        $partidosApi[363] = array_merge($partidosApi[508], $partidosApi[363]);
        unset($partidosApi[508]);
    }
    if (isset($partidosApi[1711])){
        $partidosApi[363] = array_merge($partidosApi[1711], $partidosApi[363]);
        unset($partidosApi[1711]);
    }
    if (isset($partidosApi[2656])){
        $partidosApi[363] = array_merge($partidosApi[2656], $partidosApi[363]);
        unset($partidosApi[2656]);
    }
    if (isset($partidosApi[8993])){
        $partidosApi[363] = array_merge($partidosApi[8993], $partidosApi[363]);
        unset($partidosApi[8993]);
    }


    if (isset($partidosApi[250])){
        $partidosApi[5361] = array_merge($partidosApi[250], $partidosApi[5361]);
        unset($partidosApi[250]);
    }
    if (isset($partidosApi[508])){
        $partidosApi[5361] = array_merge($partidosApi[508], $partidosApi[5361]);
        unset($partidosApi[508]);
    }
    if (isset($partidosApi[598])){
        $partidosApi[5361] = array_merge($partidosApi[598], $partidosApi[5361]);
        unset($partidosApi[598]);
    }
    if (isset($partidosApi[10942])){
        $partidosApi[5361] = array_merge($partidosApi[10942], $partidosApi[5361]);
        unset($partidosApi[10942]);
    }
    if (isset($partidosApi[6584])){
        $partidosApi[5361] = array_merge($partidosApi[6584], $partidosApi[5361]);
        unset($partidosApi[6584]);
    }

    if (isset($partidosApi[4026])){
        $partidosApi[941] = array_merge($partidosApi[4026], $partidosApi[941]);
        unset($partidosApi[4026]);
    }


    if (isset($partidosApi[5371])){
        $partidosApi[217] = array_merge($partidosApi[5371], $partidosApi[217]);
        unset($partidosApi[5371]);
    }
    if (isset($partidosApi[1711])){
        $partidosApi[217] = array_merge($partidosApi[1711], $partidosApi[217]);
        unset($partidosApi[1711]);
    }
    if (isset($partidosApi[6296])){
        $partidosApi[217] = array_merge($partidosApi[6296], $partidosApi[217]);
        unset($partidosApi[6296]);
    }
    if (isset($partidosApi[795])){
        $partidosApi[363] = array_merge($partidosApi[795], $partidosApi[363]);
        unset($partidosApi[795]);
    }
    if (isset($partidosApi[3756])){
        $partidosApi[217] = array_merge($partidosApi[3756], $partidosApi[217]);
        unset($partidosApi[3756]);
    }


    




    $partidos=listarPartidosDia(0,0);

    
    foreach ($partidosApi as $key => $datosAPI) {
        echo "<h3>".$key."</h3>";

        

        foreach ($partidos as $value) {

            
                 
            if ($value['api_id']!=$key) {
                /*if ($value['estado_partido']==2){
                    if($value['api_id']>0){
                        $excF1 = date('Y-m-d H:i:s');
                        $excF2 = date($value['fecha'].' '.$value['hora_prevista']);
                        
                        $excF1 = date_create($excF1); //hora actual                                           
                        $excF2 = date_create($excF2); //hora prevista

                        $excDif = date_diff($excF2, $excF1);
                        $excHor = $excDif->h;
                        if ($exHor>1){
                            $token="7865-b0PXlPMI94xvu3";
                            $url='https://api.betsapi.com/v1/event/view?token='.$token.'&event_id='.$value['api_id'];
                            $resultado = file_get_contents($url);            
                            $resultado =json_decode($resultado,true);            
                            $p=$resultado['results']; 
                            if ($p['time_status']==3){
                                $partido['partido_id']=$value['partido_id'];
                                $partido['estado_partido']=1; 
                                $partido['temporada_id']=$value['temporada_id']; 

                
                                $partido['fecha']=$value['fecha']; //se configura la fecha
                                $partido['hora_prevista']=$value['hora_prevista']; 
                                $partido['comentario'] = 0;
                                $partido['goles_local']=$p['scores']['2']['home']; 
                                $partido['goles_visitante']=$p['scores']['2']['away'];
                                
                                $partido['equipoLocal_id']=$value['equipoLocal_id'];  
                                $partido['local']=$value['ncLocal'];
                                $partido['equipoVisitante_id']=$value['equipoVisitante_id'];  
                                $partido['visitante']=$value['ncVisitante']; 
                                $partido['hora_real']='00:00:00';
                                
                                $partido['evento']=13; 
                                insertarMovimiento($partido); 
                            }

                        }

                    }
                }*/
                continue; 
            } 
            ?>
            <div style="width: 100%; float: left;">
                <?php foreach ($datosAPI as $v) { //partidos del torneo con el mismo api_id
                
                if ($v['id']!=$value['betsapi']) { continue; } ?>                
                <div style="width: 50%; float: right; height: 200px; overflow: auto;">
                <?php imp($value);?>
                </div>
                <div style="width: 50%; float: left; height: 200px; overflow: auto;">
                <?php 
                
                imp($v); 

                /*if ($v['id']==860664 && $v['time_status']!=1) {
                    $titulo= $v['home']['name']." ". $v['away']['name'];
                    $valor="Estado: ".$v['time_status']."<br />";
                    $valor.="minuto: ".$v['timer']['tm']."<br />";
                    $valor.="segundo: ".$v['timer']['ts']."<br />";
                    $valor.="juego: ".$v['timer']['tt']."<br />";
                    $valor.="prolongacion: ".$v['timer']['ta']."<br />";
                    enviarEmail($titulo,$valor);
                }*/




                ?>
                </div>
            </div>
            <?php 
            /*
            6 Walkover  //triunfo facil
             */
           

            /*
            if ($v['has_lineup']==1) {
                guardarAlineacion($v['id'],$value['temporada_id']);
            }*/
            $cosas="";
            
            /*if ($value['partidoAPI']>1) {
                $resultado=guardarDatos($value['partidoAPI'],$value['temporada_id']);
                if (isset($resultado[0]['goalscorer'])) { 
                  $api_goleadores=$resultado[0]['goalscorer'];
                  if (count($api_goleadores)>0){ $cosas=obsGoleadores($api_goleadores); } 
                }
            }*/

            $status = $v['time_status'];
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
$minuto = $v['timer']['tm']??-1;
$segundo = $v['timer']['ts']??-1;  
$totalSegundos=(($minuto*60)+$segundo);
$prolongacion = $v['timer']['ta']??0; //tiempo añadido
$juego = $v['timer']['tt']??0;  //tiempo detenido
$totalMinutos=$minuto+$prolongacion+1;
$epFM=(int)$value['estado_partido'];
$colorfondo = 'white';
$colortexto = 'black';
$comentario = $value['comentario'];
//$observaciones = $value['observaciones'];
//$observaciones=trim($observaciones); 
$observaciones=$cosas; 
$c=explode("-", $comentario);
if (isset($c[0])) { $parte=$c[0]; } else { $parte=0; }
$parte=(int)$parte;

/*
$status = 3; $txt_status='En juego';
$minuto = 120;
$segundo = 0;  
$totalSegundos=(($minuto*60)+$segundo);
$prolongacion = 0; //tiempo añadido
$juego = 0;  //tiempo detenido
$totalMinutos=($minuto+$prolongacion+1);
*/
$prorroga=0;
$gl=$v['scores']['2']['home']??0;
$gv=$v['scores']['2']['away']??0;

if ($observaciones=='x-x' && $gl==$gv){ $prorroga=1; } //si queremos prorroga si hay empate
$o=explode("-", $observaciones);
echo "<br /> observaciones ".$observaciones;
if (isset($o) && count($o)>1){
    $idaL=$o[0];$idaV=[1];
    if ((int)$idaL==(int)$gl && (int)$idaV==(int)$gv) { $prorroga=1; }
} //esto es para ver si hay prorroga. Pondremos en observaciones el resultado de la ida
//y comprobamos resultado idalocal y idavisitante

if ($value['tipo_torneo']==1 && 2 == $status){ 
   if (($gl+$gv)>0){
       $ep = 1; $txt_status='Finalizado';  
   } 
   if (isset($v['events'])) {
       $evs=$v['events'];
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


echo "<br />estado partido antes de las condiciones=".$ep;

 
if (1 === (int)$status ) { //si esta en juego
echo "<br />juego=".$juego;
    
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

        echo "<br />estado partido en juego 0=".$ep;
        echo "<br />valor de la prorroga=".$prorroga;

    } else {
        
        /*var_dump($totalMinutos);
        var_dump($minuto);
        var_dump($parte);
        var_dump($colorfondo);
        var_dump($epFM);
        echo "<hr />";*/

        $ep = 2;
        if ($minuto<$totalMinutos && $epFM===0) { $parte = 1;  $txt_status='primera parte';} 
        if ($minuto<$totalMinutos && $epFM===6) { $parte = 2;  $txt_status='segunda parte';} 
        if ($minuto<$totalMinutos && $epFM===8) { $parte = 3;  $txt_status='prórroga 1ª parte';} 
        if ($minuto<$totalMinutos && $epFM===11) { $parte = 4;  $txt_status='prórroga 2ª parte';} 
        if ($parte===0){
            if ($minuto>45) { $parte=2; } else { $parte=1; }
        }
        $minuto=($minuto+1);
    }

echo "<br />estado partido=".$ep;

if (1 == $parte) { $colorfondo = '#f07474';}
if (2 == $parte) { $colorfondo = '#7cc002';}
if (3 == $parte) { $colorfondo = '#610B0B';}
if (4 == $parte) { $colorfondo = '#0B3B0B';}
if (6 == $ep) { $colorfondo = '#ffe400';}
if (1 == $ep) { $colorfondo = 'black';}
if (8 == $ep) { $colorfondo = 'blue';}
if (11 == $ep) { $colorfondo = 'yellow';$colortexto = 'black';}
if (7 == $ep) { $colorfondo = '#2E2E2E';}

$comentario=$parte.'-'.$minuto.'-'.$prolongacion;

} //fin de si esta en juego.
echo "<br />Comentario= parte (".$parte.") - minuto (".$minuto.") - prolongación (".$prolongacion.")";                            
echo "<br />estado partido final de las condiciones=".$ep;
        

/*
        echo "<hr />";
        var_dump($ep);
        var_dump($totalMinutos);
        var_dump($minuto);
        var_dump($parte);
        var_dump($colorfondo);
        var_dump($epFM);
        echo "<hr />";
        */

 
    
?>
<div style="width: 100%; float:left; clear:both; border-top: solid 1px; background-color: #E6E6E6;">
    <div style="width: 100%; float:left;"><b><?php echo $v['league']['name']; ?></b>
    </div>
    <div style="width: 16%; float:left;">
    <b>Betsapi: <?php echo $status.'->'.$ep; ?></b> - <?php echo $v['id']; ?></div>
    <div style="width: 3%; float:left;"> - Status: <?php echo $txt_status; ?></div>
    <div style="width: 10%; float:left;"><?php echo date('Y-m-d H:i:s', $v['time']);; ?></b></div>
    <div style="width: 10%; float:left; text-align: right"><?php echo $v['home']['name']; ?></div>
    <div style="width: 3%; float:left; text-align: center; color:<?php echo $colortexto; ?>; background-color: <?php echo $colorfondo; ?>;">
    <?php echo $gl; ?> - <?php echo $gv; ?>             
    </div>
    <div style="width: 10%; float:left;"><?php echo $v['away']['name']; ?></div>
    <div style="width: 10%; float:left;">    
    Minuto: <?php echo (int) $minuto; ?> - Parte: <?php echo $parte; ?>
    </div>
    <div style="width: 16%; float:left;">
    <b>Futbolme: <?php echo $epFM; ?></b> - <?php echo $value['partido_id']; ?>
    </div>
    <div style="width: 3%; float:left; text-align: center; background-color: <?php echo $colorfondo; ?>;">
    <?php echo $value['goles_local']; ?> - 
    <?php echo $value['goles_visitante']; ?>             
    </div>
</div>



             <?php 
                $partido=array();

                $evento=0;
                if ($value['estado_partido'] != $ep) {
                    if (1 == $ep && $epFM!=1) { $evento = 13;} // (FINAL)
                    if (6 == $ep && $epFM==2) { $evento = 8;} // (descanso)
                    if (7 == $ep) { $evento = 20;}//penaltis
                    if (8 == $ep) { $evento = 21;}//prorroga
                    if (9 == $ep) { $evento = 22;}//1t prorroga
                    if (11 == $ep) { $evento = 23;}//descanso prorroga
                    if (10 == $ep) { $evento = 24;}//2t prorroga
                    if (2 == $ep && $epFM==6) { $evento = 9;} // inicia 2ª parte
                    if (2 == $ep && $epFM==0) { $evento = 7;} // inicia el partido
                }

                if ($ep==2) {
                    if ($value['goles_local'] != $gl && $gl>$value['goles_local']) { $evento = 5; } //gol local
                    if ($value['goles_visitante'] != $gv && $gv>$value['goles_visitante']) { $evento = 6; } // gol visitante
                }

                if ($evento>4 && $evento<7) {
                    $f = '../../json/temporada/'.$value['temporada_id'].'/clasificacion.json';
                    if (@file_exists($f)){unlink($f); }
                    
                }


                $partido['partido_id']=$value['partido_id'];
                $partido['estado_partido']=$ep; 
                $partido['temporada_id']=$value['temporada_id']; 

                
                $partido['fecha']=$value['fecha']; //se configura la fecha
                $partido['hora_prevista']=$value['hora_prevista']; 
                $partido['comentario'] = $comentario;
                $partido['goles_local']=$gl; 
                $partido['goles_visitante']=$gv;  
                
                $partido['equipoLocal_id']=$value['equipoLocal_id'];  
                $partido['local']=$value['ncLocal'];
                $partido['equipoVisitante_id']=$value['equipoVisitante_id'];  
                $partido['visitante']=$value['ncVisitante']; 
                $partido['hora_real']='00:00:00';
                
                $partido['evento']=$evento;                  
                

                if ($ep!=$epFM || $ep===2){ 
                    insertarMovimiento($partido);                
                }

                

            } //foreach datosAPI
        } //foreach partidos
    } //foreach partidosAPI
}

function partidosApi($ids)
{
$fecha = new \DateTime();
$dia = $fecha->format('Y-m-d'); 
$APIkey = '3629afd5a679bca50b3d3f77c64225affb76c7cb9a5677a2b5ff560b0b589e13';
$key="&APIkey=".$APIkey;
$metodo="action=get_events";
$from="&from=".$dia;
$to="&to=".$dia;
$metodo.=$from.$to;            
    $resultado=array(); $partidos=array();
    foreach ($ids as $value) {
            $url= "";
            $d="&league_id=".$value['ids'];
            $url= "https://apifootball.com/api/?".$metodo.$d.$key; 
            echo $url."<br />";
            $resultado = file_get_contents($url);
            $partidos[$value['ids']]=$resultado;
            $f = '../json/apifootball/apiPartidos_'.$value['ids'].'.json'; 
            $fh = fopen($f, 'w');
            fwrite($fh, $resultado);
            fclose($fh);
    }
    return $partidos;    
    /*$path = $f;
    $json = file_get_contents($path);
    $datos = json_decode($json, true);*/
}

function guardarDatos($id,$temporada_id){
    $token='3629afd5a679bca50b3d3f77c64225affb76c7cb9a5677a2b5ff560b0b589e13';
    $url='https://apifootball.com/api/?action=get_events&match_id='.$id.'&APIkey='.$token;
    $resultado = file_get_contents($url); 
    //echo $url."<br />";
    $carpeta = '../json/temporada/'.$temporada_id;
    if (!file_exists($carpeta)) { mkdir($carpeta, 0777, true); }
    $carpeta = '../json/temporada/'.$temporada_id.'/apifootball';
    if (!file_exists($carpeta)) { mkdir($carpeta, 0777, true); }
    $f = $carpeta.'/dat_'.$id.'.json';
    echo $f."<br />";
    guardarFILE($resultado, $f); 
    return $resultado;   
}

function guardarAlineacion($id,$temporada_id){
    $token="7865-b0PXlPMI94xvu3";
    $url='https://api.betsapi.com/v1/event/lineup?token='.$token.'&event_id='.$id;    
    $resultado = file_get_contents($url); 
    $url='https://api.betsapi.com/v1/event/odds?token='.$token.'&source=bwin&odds_market=1&event_id='.$id;    
    $resultado2 = file_get_contents($url); 
    $url='https://api.betsapi.com/v1/event/stats_trend?token='.$token.'&event_id='.$id;    
    $resultado3 = file_get_contents($url); 
    $url='https://api.betsapi.com/v1/event/videos?token='.$token.'&event_id='.$id;    
    $resultado4 = file_get_contents($url); 


    $carpeta = '../json/temporada/'.$temporada_id;
    if (!file_exists($carpeta)) { mkdir($carpeta, 0777, true); }
    $carpeta = '../json/temporada/'.$temporada_id.'/betsapi';
    if (!file_exists($carpeta)) { mkdir($carpeta, 0777, true); }

    $f = $carpeta.'/al_'.$id.'.json';
    echo $f."<br />";
    guardarFILE($resultado, $f);
    $f = $carpeta.'/od_'.$id.'.json';
    echo $f."<br />";
    guardarFILE($resultado2, $f);
    $f = $carpeta.'/st_'.$id.'.json';
    echo $f."<br />";
    guardarFILE($resultado3, $f);
    $f = $carpeta.'/vi_'.$id.'.json';
    echo $f."<br />";
    guardarFILE($resultado4, $f);
    
    
}

function partidosHoy($partidosApi) {
    $partidos=listarPartidosDia(0,0);
    foreach ($partidosApi as $key => $val) {


        $datosAPI = json_decode($val, true);


        echo "<h3>".$key."</h3>";
        foreach ($partidos as $value) {
            if ($value['api_id']!=$key) { continue; } ?>

            <div style="width: 100%; float: left;">
                

            <?php foreach ($datosAPI as $v) { //partidos del torneo con el mismo api_id
                if ($v['match_id']!=$value['partidoAPI']) { continue; } ?>
                
                <div style="width: 50%; float: right; height: 200px; overflow: auto;">
                <?php imp($value); 
                $timezone = new DateTimeZone('Europe/Madrid');
                $comienzaPartido = date_create_immutable_from_format('Y-m-d H:i:s',$value['fecha'].' '.$value['hora_prevista']??'00:00:00',$timezone);
                $comienzaPartido = $comienzaPartido->setTimezone(new DateTimeZone('UTC'));
                $finPartido = $comienzaPartido->modify('+120 minutes');
                ?>
                </div>
                <div style="width: 50%; float: left; height: 200px; overflow: auto;">
                <?php imp($v); ?>
                </div>

            </div>

    <?php  $e_p = 0;
    $parte = 0;
    $minuto = 0;
    $colorfondo = 'white';
    $colortexto = 'black';
    $texto_apifutbol_tipo = '';
    if (0 == $v['match_live']) {$colortexto = '#A4A4A4';}
    if ('Canc.' == $v['match_status'] || 'Postp.' == $v['match_status']) { $e_p = 3;}
    if ('FT' == $v['match_status']) { $e_p = 1; $colorfondo = 'white';}
    if ('AET' == $v['match_status']) { $e_p = 1; $colorfondo = 'white';}
    if ('AP' == $v['match_status']) { $e_p = 1;$colorfondo = 'white';}
    if ("'" == substr($v['match_status'], -1)) { $e_p = 2; $minuto = substr($v['match_status'], 0, -1);}
    if ('HT' == $v['match_status']) {$e_p = 6;$colorfondo = '#ffe400';$minuto = 9999;$parte = 6; }

    $gl=$v['match_hometeam_score'];
    $gv=$v['match_awayteam_score'];

    if ($e_p>1){
        if (45 == $minuto) { $minuto = '45+';}
        if (90 == $minuto) { $minuto = '90+';}
        if (105 == $minuto) {$minuto = '105+';}
        if (120 == $minuto) {$minuto = '120+';}
        $pos = strpos($minuto, '+');
        if (false === $pos) {
            $minuto = (int) $minuto;
            if (44 == $minuto) {$minuto = 45;}
            if (89 == $minuto) {$minuto = 90;}
            if (104 == $minuto) {$minuto = 105;}
            if (119 == $minuto) {$minuto = 120;}

            if ($minuto < 44) {$minuto = ($minuto + 2);}
            if ($minuto > 45 && $minuto < 89) {$minuto = ($minuto + 2);}
            if ($minuto > 90 && $minuto < 104) {$minuto = ($minuto + 2);}
            if ($minuto > 105 && $minuto < 119) {$minuto = ($minuto + 2);}
        }

        if ($minuto < 46) {$parte = 1;$colorfondo = '#f07474';}
        if ($minuto > 45 && $minuto < 91) {$parte = 2;$colorfondo = '#7cc002';}
        if ($minuto > 90 && $minuto < 106) {$parte = 3;$colorfondo = '#610B0B';}
        if ($minuto > 105 && $minuto < 121) {$parte = 4;$colorfondo = '#0B3B0B';}
    }          
    
?>
<div style="width: 100%; float:left; clear:both; border-top: solid 1px; background-color: #E6E6E6;">
    <div style="width: 100%; float:left;"><?php echo $v['country_name']; ?>: <b><?php echo $v['league_name']; ?></b>
    </div>
    <div style="width: 16%; float:left;">
    <b>Apifootball: <?php echo $e_p; ?></b> - <?php echo $v['match_id']; ?> - Live: <?php echo $v['match_live']; ?>
    </div>
    <div style="width: 3%; float:left;"> <?php echo $v['match_status']; ?></div>
    <div style="width: 10%; float:left;"><?php echo $v['match_date']; ?> <b><?php echo $v['match_time']; ?></b></div>
    <div style="width: 10%; float:left; text-align: right"><?php echo $v['match_hometeam_name']; ?></div>
    <div style="width: 3%; float:left; text-align: center; background-color: <?php echo $colorfondo; ?>;">
    <?php echo $v['match_hometeam_score']; ?> - 
    <?php echo $v['match_awayteam_score']; ?>             
    </div>
    <div style="width: 10%; float:left;"><?php echo $v['match_awayteam_name']; ?></div>
     
    <div style="width: 10%; float:left;">
    <?php if ($e_p==1){ ?>
    FINAL
    <?php } else { ?>
    Minuto: <?php echo (int) $minuto; ?> (<?php echo $minuto; ?>) - Parte: <?php echo $parte; ?>
    <?php } ?>
    </div>

    <div style="width: 16%; float:left;">
    <b>Futbolme: <?php echo $value['estado_partido']; ?></b> - <?php echo $value['partido_id']; ?>
    </div>
    <div style="width: 3%; float:left; text-align: center; background-color: <?php echo $colorfondo; ?>;">
    <?php echo $value['goles_local']; ?> - 
    <?php echo $value['goles_visitante']; ?>             
    </div>
</div>



             <?php 
             $local_id=$value['equipoLocal_id'];
             $visitante_id=$value['equipoVisitante_id'];
             $goles=$v['goalscorer'];
             $tarjetas=$v['cards'];

             $titularesL=$v['lineup']['home']['starting_lineups'];
             $titularesV=$v['lineup']['away']['starting_lineups'];

             $suplentesL=$v['lineup']['home']['substitutes'];
             $suplentesV=$v['lineup']['away']['substitutes'];

             $cambiosL=$v['lineup']['home']['substitutions'];
             $cambiosV=$v['lineup']['away']['substitutions'];

             $entrenadorL=$v['lineup']['home']['coach'];
             $entrenadorV=$v['lineup']['away']['coach'];

             //imp($cambiosL);
             //imp($cambiosV);              

            include ('goles.php'); 

                $partido=array();

                $evento=0;
                if ($value['estado_partido'] != $e_p) {
                    if (1 == $e_p) { $evento = 13;} // (FINAL)
                    if (6 == $e_p) { $evento = 8;} // (descanso)
                    //if (7 == $_POST['estado_partido']) { $evento = 20;}//penaltis
                    //if (8 == $_POST['estado_partido']) { $evento = 21;}//prorroga
                    //if (9 == $_POST['estado_partido']) { $evento = 22;}//1t prorroga
                    //if (11 == $_POST['estado_partido']) { $evento = 23;}//descanso prorroga
                    //if (10 == $_POST['estado_partido']) { $evento = 24;}//2t prorroga
                    if (2 == $e_p && $value['estado_partido']==6) { $evento = 9;} // inicia 2ª parte
                    if (2 == $e_p && $value['estado_partido']==0) { $evento = 7;} // inicia el partido
                }

                if ($e_p==2) {
                    if ($value['goles_local'] != $gl && $gl>$value['goles_local']) { $evento = 5; } //gol local
                    if ($value['goles_visitante'] != $gv && $gv>$value['goles_visitante']) { $evento = 6; } // gol visitante
                }

                if ($evento>4 && $evento<7) {
                    $f = '../../json/temporada/'.$value['temporada_id'].'/clasificacion.json';
                    if (@file_exists($f)){unlink($f); }
                    
                }


                $partido['partido_id']=$value['partido_id'];
                $partido['estado_partido']=$e_p; 
                $partido['temporada_id']=$value['temporada_id']; 

                
                $partido['fecha']=$value['fecha']; //se configura la fecha
                $partido['hora_prevista']=$value['hora_prevista']; 
                $partido['comentario'] = $parte.'-'.$minuto;
                $partido['goles_local']=$v['match_hometeam_score']; 
                $partido['goles_visitante']=$v['match_awayteam_score'];  
                
                $partido['observaciones']=$cosas; //se configura el texto
                $partido['equipoLocal_id']=$value['equipoLocal_id'];  
                $partido['local']=$value['ncLocal'];
                $partido['equipoVisitante_id']=$value['equipoVisitante_id'];  
                $partido['visitante']=$value['ncVisitante']; 
                $partido['clasificado']=0; //hay que averiguar

                
                $partido['evento']=$evento;                  
                

                if ($e_p>0 && $value['estado_partido']!=$e_p || $e_p==2){ 
                    insertarMovimiento($partido);                
                }

                

            } //foreach datosAPI
        } //foreach partidos
    } //foreach partidosAPI
}


function buscarPuntos($jugador) {

    $findme=".";
    $pos = strpos($jugador, $findme);

    // Nótese el uso de ===. Puesto que == simple no funcionará como se espera
    // porque la posición de 'a' está en el 1° (primer) caracter.
    if ($pos === false) {
        return $jugador;
    } else {
        
        $jugador=substr($jugador, ($pos+1));    
        return $jugador;
    }

}

function insertarGol($gol){    
    $mysqli = conectar();
    $sql='SELECT id FROM gol WHERE jugador_id='.$gol['jugador_id'].' AND minuto='.$gol['minuto'].' AND partido_id='.$gol['partido_id'];
    $resultadoSQL = mysqli_query($mysqli, $sql);        
    /*$resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_NUM);
    if (is_null($resultado)){
        $sql='INSERT INTO gol(jugador_id, partido_id, temporada_id, minuto, tipo, esLocal) VALUES ('.$gol['jugador_id'].','.$gol['partido_id'].','.$gol['temporada_id'].','.$gol['minuto'].','.$gol['tipo'].','.$gol['esLocal'].')';
       $resultadoSQL = mysqli_query($mysqli, $sql);            //echo $sql;            
    } */    
}

function insertarTarjeta($tarjeta){    
    $mysqli = conectar();
    $sql='SELECT id FROM tarjeta WHERE jugador_id='.$tarjeta['jugador_id'].' AND minuto='.$tarjeta['minuto'].' AND partido_id='.$tarjeta['partido_id'];
    $resultadoSQL = mysqli_query($mysqli, $sql);        
    /*$resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_NUM);
    if (is_null($resultado)){
        $sql='INSERT INTO tarjeta(jugador_id, partido_id, temporada_id, minuto, tipo, esLocal) VALUES ('.$tarjeta['jugador_id'].','.$tarjeta['partido_id'].','.$tarjeta['temporada_id'].','.$tarjeta['minuto'].','.$tarjeta['tipo'].','.$tarjeta['esLocal'].')';
       $resultadoSQL = mysqli_query($mysqli, $sql);            //echo $sql;            
    } */    
}





function insertarJugador($equipo_id,$jugador){
    if ((int)$equipo_id>0){
        $mysqli = conectar();
        $sql='SELECT id FROM jugador WHERE apodo="'.$jugador.'" AND equipoActual_id='.$equipo_id;
        $resultadoSQL = mysqli_query($mysqli, $sql);
        
        /*$resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_NUM);
        if (is_null($resultado)){
            $sql='INSERT INTO jugador(nombre, apellidos, apodo, sexo, es_fichaje, es_baja, slug, equipoActual_id) VALUES ("-","'.$jugador.'","'.$jugador.'",0,0,0,"-",'.$equipo_id.')';
            $resultadoSQL = mysqli_query($mysqli, $sql);
            //echo $sql;
            $sql='SELECT max(id) id FROM jugador';
            $resultadoSQL = mysqli_query($mysqli, $sql);
            $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_NUM);
            return $resultado[0];
        } else {
            return $resultado[0];
        }*/
    }
}


function vaciarMovimientos()
{
    //Marcamos los movimientos
    $mysqli = conectar();
    $consulta = 'UPDATE movimiento SET estado=1';
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    //Editamos los movimientos
    $consulta = 'SELECT  partido_id, estado_partido, temporada_id, fecha, hora_prevista, hora_real, 
    goles_local, goles_visitante, evento, equipoLocal_id, local, equipoVisitante_id, torneo_nombre, 
    visitante, comentario, codigo_acta,(SELECT nombre FROM temporada WHERE id=temporada_id) nombre_torneo FROM movimiento WHERE estado=1 ORDER BY id';

    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $movimientos = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);


    $temporadas = array(); //nos dira que temporadas tenemos que  actualizar
    $eventosMovimientos = array();
    $modificaciones = 0;

    $consulta = 'DELETE FROM movimiento WHERE estado=1'; //borramos los movimientos editados
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    echo '<br />movimientos borrados';
    
    foreach ($movimientos as $fila) {
        $modificaciones = 1;
        $temporadas[$fila['temporada_id']] = $fila['temporada_id'];

        if ($fila['hora_real']==''){ $fila['hora_real']=$fila['hora_prevista'];}


        $consulta = 'UPDATE partido SET 
        estado_partido='.$fila['estado_partido'].',
        fecha="'.$fila['fecha'].'",
        hora_prevista="'.$fila['hora_prevista'].'",
        hora_real="'.$fila['hora_real'].'",
        goles_local='.$fila['goles_local'].',
        goles_visitante='.$fila['goles_visitante'].',
        comentario="'.$fila['comentario'].'-'.$fila['evento'].'", codigo_acta='.$fila['codigo_acta'].' WHERE id='.$fila['partido_id'];

        echo $consulta."<br />";
        
        if (!$resultadoSQL = mysqli_query($mysqli, $consulta)) {
            printf("Errormessage: %s\n", mysqli_error($mysqli));
            exit;
        } else {
            echo "Partido actualizado correctamente. Id: ".$fila['partido_id']."<br />";
        }
        //puntuarApuesta($fila['partido_id'], $fila['goles_local'], $fila['goles_visitante']);
        if ($fila['evento']>0) { $eventosMovimientos[] = $fila; }//final del partido 
    } //termina el foreach de los partidos


    
    
    //imp("modifi ".$modificaciones);
    if (1 == $modificaciones) { generarPartidosDia(); }
    
    
    return array(
            'temporadas' => $temporadas,
            'eventos' => $eventosMovimientos
        );
}



function puntuarApuesta($partido_id, $resulcasa, $resulfuera)
{
    $mysqli = conectar();
    $consulta = 'SELECT id, goles_local, goles_visitante FROM
        apuesta WHERE partido_id='.$partido_id;
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
    foreach ($resultado as $fila) {
        $id_fila = $fila['id'];
        $rc = $fila['goles_local'];
        $rf = $fila['goles_visitante'];
        $acierto = 1; //1=no ha acertado nada
        if ($rc == $resulcasa && $rf == $resulfuera) {
            $acierto = 3;
        //si es todo igual acierto 3 y actualizamos: Resultado exacto
        } else {
            if ($rc > $rf) {
                if ($resulcasa > $resulfuera) {
                    $acierto = 2;
                }
            }
            if ($rc == $rf) {
                if ($resulcasa == $resulfuera) {
                    $acierto = 2;
                }
            }
            if ($rc < $rf) {
                if ($resulcasa < $resulfuera) {
                    $acierto = 2;
                }
            }
            // cualquier opcion de las tres es pronostico acertado.
        }
        $consulta = 'UPDATE apuesta SET acierto='.$acierto.' WHERE  id='.$id_fila;
        $resultadoSQL = mysqli_query($mysqli, $consulta);
    }
}



?>