va<?php //funciones y consultas
include '_conexion.php';

function imp($ob)
{
    if (!empty($ob)) {
        echo '<pre>';
        print_r($ob);
        echo '</pre>';
    }
}


function microtime_float()
{
    list($useg, $seg) = explode(' ', microtime());

    return (float) $useg + (float) $seg;
}

function guardarJSON($array, $ruta)
{
    //utf8_encode_deep($array);
    //imp($ruta);
    $jsonencoded = json_encode($array, JSON_UNESCAPED_UNICODE);
    echo print_json_last_error(json_last_error());
    $fh = fopen($ruta, 'w');
    fwrite($fh, $jsonencoded);
    fclose($fh);
    //echo "Creado el fichero ".$ruta;
}

function print_json_last_error($error)
{
    $mensaje = '';
    switch ($error) {
        case JSON_ERROR_NONE:
            //$mensaje = ' - Sin errores';
            break;
        case JSON_ERROR_DEPTH:
            $mensaje = ' - Excedido tamaño máximo de la pila';
            break;
        case JSON_ERROR_STATE_MISMATCH:
            $mensaje = ' - Desbordamiento de buffer o los modos no coinciden';
            break;
        case JSON_ERROR_CTRL_CHAR:
            $mensaje = ' - Encontrado carácter de control no esperado';
            break;
        case JSON_ERROR_SYNTAX:
            $mensaje = ' - Error de sintaxis, JSON mal formado';
            break;
        case JSON_ERROR_UTF8:
            $mensaje = ' - Caracteres UTF-8 malformados, posiblemente están mal codificados';
            break;
        default:
            $mensaje = ' - Error desconocido';
    }

    return $mensaje;
}


///CARGADOR

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
//$token="7865-b0PXlPMI94xvu3";
$token="153716-4djEyj4e6JZVou";
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

//añadido el 2021 para mundial de futbol
$ids[]['ids']=1735;
$ids[]['ids']=455;
$ids[]['ids']=530;
$ids[]['ids']=2641;
$ids[]['ids']=473;


    $partidosHoy=array(); $partidos=array();    
    $url='https://api.betsapi.com/v1/events/inplay?sport_id=1&token='.$token;
   $resultado = file_get_contents($url);            
    $resultado =json_decode($resultado,true);            
    $p=$resultado['results'];

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

    $f = '../../json/partidosSueltos.json';
    guardarJSON($partidosSueltos, $f);

    

    return $partidos; 
}

function partidosHoyBet($partidosApi) {   
    if (!isset($partidosApi[681])){ $partidosApi[681]=array(); } 
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

    //añadido el 2021 para mundial de futbol
    if (isset($partidosApi[1735])){
        $partidosApi[681] = array_merge($partidosApi[1735], $partidosApi[681]);
        unset($partidosApi[1735]);
    }
    if (isset($partidosApi[455])){
        $partidosApi[681] = array_merge($partidosApi[455], $partidosApi[681]);
        unset($partidosApi[455]);
    }
    if (isset($partidosApi[530])){
        $partidosApi[681] = array_merge($partidosApi[530], $partidosApi[681]);
        unset($partidosApi[530]);
    }
    if (isset($partidosApi[2641])){
        $partidosApi[681] = array_merge($partidosApi[2641], $partidosApi[681]);
        unset($partidosApi[2641]);
    }
    if (isset($partidosApi[473])){
        $partidosApi[681] = array_merge($partidosApi[473], $partidosApi[681]);
        unset($partidosApi[473]);
    }
    //fin de añadido el 2021 para mundial de futbol



    $partidos=listarPartidosDia(0,0);

    
    foreach ($partidosApi as $key => $datosAPI) {
        echo "<h3>".$key."</h3>";
        foreach ($partidos as $value) {   
            if ($value['api_id']!=$key) {continue; } ?>
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
                }*/?>
                </div>
            </div>
            <?php 
            $cosas="";
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

        echo $sql."<br />";
    
        if (!$resultadoSQL = mysqli_query($mysqli, $sql)) {
            printf("Errormessage: %s\n", mysqli_error($mysqli)); 
            echo $sql.'<br />';           
        } else {





            echo "Movimiento insertado correctamente. Evento: ".$partido['evento']."<br />";
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

function vaciarMovimientos()
{
    //Marcamos los movimientos
    $mysqli = conectar();
    $consulta = 'UPDATE movimiento SET estado=1';
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    //Editamos los movimientos
    $consulta = 'SELECT  partido_id, estado_partido, temporada_id, fecha, hora_prevista, hora_real, 
    goles_local, goles_visitante, evento, equipoLocal_id, local, equipoVisitante_id, 
    visitante, comentario, codigo_acta,(SELECT nombre FROM temporada WHERE id=temporada_id) nombre_torneo,
    usuario_id FROM movimiento WHERE estado=1 ORDER BY id';

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
        comentario="'.$fila['comentario'].'-'.$fila['evento'].'", 
        codigo_acta='.$fila['codigo_acta'].',
        usuario_id='.$fila['usuario_id'].'
        WHERE id='.$fila['partido_id'];

        echo $consulta."<br />";
        
        if (!$resultadoSQL = mysqli_query($mysqli, $consulta)) {
            printf("Errormessage: %s\n", mysqli_error($mysqli));
            exit;
        } else {
            echo "Partido actualizado correctamente. Id: ".$fila['partido_id']."<br />"; 
        }
        //puntuarApuesta($fila['partido_id'], $fila['goles_local'], $fila['goles_visitante']);
        if ($fila['evento']>0) { 
            $eventosMovimientos[] = $fila; 

            //include 'funcionWhatsapp.php'; //hay que poner aqui el whatsapp

        }//final del partido 
    } //termina el foreach de los partidos


    
    
    //imp("modifi ".$modificaciones);
    if (1 == $modificaciones) { generarPartidosDia(); }
    
    
    return array(
            'temporadas' => $temporadas,
            'eventos' => $eventosMovimientos
        );
}

function generarEventos($eventos){
    
    $files = glob('../../json/eventos/*.*'); // obtiene todos los archivos
    foreach($files as $file){
      if(is_file($file)){
        if(time()-filemtime($file) > 59){
            unlink($file); // lo elimina si se trata de un archivo
        } 
      } 
    }

    insertarEvento($eventos);


    $appuser = [];
    $resultado = eventos(); //consultas/consultaPortada.php

    guardarJSON($resultado, '../../json/eventos.json');
    echo "Hemos recogido los eventos<br />";
    
    $appuser = array();
    foreach ($resultado as $key => $value) {
        if (0 == $value['estado']) {
            $appuser[] = $value;
        }
    }
    
    $mysqli = conectar();
    $sql = 'UPDATE evento SET estado=1';
    mysqli_query($mysqli, $sql);
    
    
    
    //con require_once '../../src/cronsNotificaciones.php'; se pretende enviar notificaciones al usuario de APP
    // ha llegado a funcionar
    
     
    
}

function insertarEvento($eventos){

    $mysqli = conectar();

    foreach ($eventos as $even) { 


        $even['resultado']=$even['goles_local']." - ".$even['goles_visitante'];
        if ($even['evento']==19) { continue; } //evento 19 = no jugado.
        
        switch ($even['evento']) {
             case '1': case '2':
               $fecha = $even['fecha']; $hora = $even['hora_prevista'];
               if ($hora && '00:00:11' != $hora) {
                   $h = ' - '.substr($hora, 0, 5);
                   $even['valor'] = 'Fecha-hora';
               } else {
                   $h = '';
                   $even['valor'] = 'Fecha';
               }
                $leyenda = utf8_encode(nombreDiaMini($fecha));
                $even['resultado'] = $leyenda.$h;
               break;
           case '3':
               //para el arbitro
               break;
            case '5': $even['valor'] = '¡¡ GOL !! '.$even['local']; break;
            case '6': $even['valor'] = '¡¡ GOL !! '.$even['visitante']; break;
            case '7': $even['valor'] = 'Comienza el partido...'; break;
            case '8': $even['valor'] = 'Descanso'; break;
            case '9': $even['valor'] = 'Inicia la segunda parte...'; break;
            case '13': $even['valor'] = '¡¡ FINAL !!'; break;
            case '21': $even['valor'] = 'Prórroga'; break;
            case '22': $even['valor'] = 'Prórroga - 1ª Parte '; break;
            case '23': $even['valor'] = 'Prórroga - Descanso '; break;
            case '24': $even['valor'] = 'Prórroga - 2ª Parte '; break;
            case '20': $even['valor'] = 'penaltis '; break;
            case '26': //para televisados            
            break;
        
        }



        $sql = 'SELECT partido_id,valor FROM evento WHERE 
        partido_id='.$even['partido_id']." 
        AND valor='".$even['valor']."' 
        AND resultado='".$even['resultado']."' 
        ORDER BY id DESC LIMIT 30";

        $resultadoSQL = mysqli_query($mysqli, $sql);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
        echo $sql.'<br />';
        if (empty($resultado)) {


            $consulta = "INSERT INTO evento (evento, partido_id, valor, equipoLocal_id, equipoVisitante_id, momento, local, visitante, resultado)
                VALUES ('".$even['evento']."','".$even['partido_id']."','".$even['valor']."','".$even['equipoLocal_id']."','".$even['equipoVisitante_id']."',NOW(),'".$even['local']."','".$even['visitante']."','".$even['resultado']."')";

            if (!mysqli_query($mysqli, $consulta)) {
                printf("Errormessage: %s\n", mysqli_error($mysqli));
            }
            //echo $consulta;
            $f=$even['equipoLocal_id'].'-'.$even['equipoVisitante_id'].'-'.$even['temporada_id'].'-'.$even['evento'];
            guardarJSON($even, '../../json/eventos/'.$f.'.json');
            
        }

        
    }

} 

function nombreDiaMini($fecha)
{
    $fecha = strtotime($fecha);
    $fecha = gmmktime(0, 0, 0, date('n', $fecha), date('j', $fecha), date('Y', $fecha));
    setlocale(LC_TIME, 'spanish');
    $nombre = strftime('%A, %d de %b', $fecha);

    return $nombre;
}


function eventos()
{
    $mysqli = conectar();

    $fecha = new \DateTime();
    $dia = $fecha->format('Y-m-d');
//    $diaAnterior = new \DateTime();
    $diaAnterior = \DateTime::createFromFormat('Y-m-d', $dia);
    $diaAnterior = $diaAnterior->modify('-2 day')->format('Y-m-d');

    $sql = "DELETE FROM evento WHERE momento<'".$diaAnterior."'";
    mysqli_query($mysqli, $sql);

    $campos = 'e.partido_id,
    e.evento,
    e.valor,
    e.equipoLocal_id,
    e.equipoVisitante_id,
    e.momento,
    e.local,
    e.visitante,
    e.estado,
    e.resultado,
    tor.nombre nombre_torneo,
    tor.comunidad_id,
    tor.categoria_id categoria_id,
    te.id temporada_id';

    $tabla = 'evento e';
    $union= ' INNER JOIN partido p ON e.partido_id=p.id';
    $union.= ' INNER JOIN temporada te ON p.temporada_id=te.id';
    $union.= ' INNER JOIN torneo tor ON te.torneo_id=tor.id';
    //$condicion=" WHERE (cl.pais_id=60 OR cf.pais_id=60)";
    $condicion = '';
    $orden = ' ORDER BY e.momento DESC LIMIT 50';
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
    //echo $consulta;
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    return $resultado;
}




function partidosDia($dia, $temporada_id = 0)
{
    $campos = "p.id,p.temporada_id,p.estado_partido,p.jornada,fa.nombre fase,p.grupo_id,gr.nombre,p.fecha, p.partidoAPI,
p.hora_prevista,p.hora_real,p.clasificado,p.goles_local,p.goles_visitante,p.observaciones,p.estadio,
ec.nombre local, ec.nombreCorto localCorto, ec.slug twLocal,
p.equipoLocal_id, cec.id club_local, cec.pais_id pais_local, cef.id club_visitante, cef.pais_id pais_visitante,p.apuesta apuesta_partido,
ef.nombre visitante, ef.nombreCorto visitanteCorto, ef.slug twVisitante,p.equipoVisitante_id,p.youtube_id, tor.visible, tor.apuesta apuesta_torneo, tor.division_id,
tor.tipo_torneo,tor.nombre nombreTorneo,tor.torneoCorto,tor.categoria_torneo_id,tor.traduccion,
tor.apuesta apuesta_torneo,co.nombre nombreComunidad,co.id idComunidad,pa.nombre nombrePais,
pa.id idPais,pa.id_bwin,p.comentario,p.acta,p.betsapi,
CASE tor.tipo_torneo
WHEN 2 THEN 
    (select concat(p2.goles_local,',',p2.goles_visitante,',',p2.jornada,',', p2.fecha,',', p2.id,',',tor.tipo_torneo)
    FROM partido p2 
    WHERE p2.equipoLocal_id=p.equipoVisitante_id AND p2.equipoVisitante_id=p.equipoLocal_id 
    AND p2.temporada_id=p.temporada_id AND p2.estado_partido=1 AND p2.grupo_id IS NULL 
    AND p2.temporada_id<>287 AND p2.temporada_id<>231 AND p2.temporada_id<>442 AND p2.temporada_id<>330 LIMIT 1)
ELSE null
END
ida,
(SELECT GROUP_CONCAT(DISTINCT medio_id SEPARATOR '-') FROM partido_medio WHERE partido_id=p.id) tv,
(SELECT count(id) FROM gol WHERE partido_id=p.id) goles, e.id estadio_id, e.nombre estadio_nombre, l.nombre estadio_localidad";
    $tabla = 'partido p';
    $union = ' INNER JOIN equipo ec ON p.equipoLocal_id=ec.id';
    $union .= ' INNER JOIN equipo ef ON p.equipoVisitante_id=ef.id';
    $union .= ' INNER JOIN club cec ON ec.club_id=cec.id';
    $union .= ' INNER JOIN club cef ON ef.club_id=cef.id';
    $union .= ' INNER JOIN fase fa ON p.jornada=fa.id';
    $union .= ' LEFT JOIN grupo gr ON p.grupo_id=gr.id';
    $union .= ' INNER JOIN temporada te ON p.temporada_id=te.id';
    $union .= ' INNER JOIN torneo tor ON te.torneo_id=tor.id';
    $union .= ' INNER JOIN categoriatorneo ctor ON tor.categoria_torneo_id=ctor.id';
    $union .= ' INNER JOIN comunidad co ON tor.comunidad_id=co.id';
    $union .= ' INNER JOIN pais pa ON tor.pais_id=pa.id';
    $union .= ' LEFT JOIN estadio e ON e.id=ec.estadio_id';
    $union .= ' LEFT JOIN localidad l ON l.id=e.localidad_id';
    

    

        $condicion = " WHERE p.fecha='".$dia."' AND p.estado_partido<>2 AND p.estado_partido<5 AND ec.nombre<>'SIN PAIS' AND ef.nombre<>'SIN PAIS' AND tor.visible>4 AND tor.visible<100 ";
        if ($temporada_id > 0) { $condicion .= ' AND p.temporada_id='.$temporada_id; }
        $orden = ' ORDER BY tor.apuestaMa DESC, ctor.orden, tor.division_id, tor.orden, p.hora_prevista';
        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
        //echo $consulta;
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $partidos = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
    


        $condicion = " WHERE p.estado_partido=2 OR p.estado_partido>5";
        if ($temporada_id > 0) { $condicion .= ' AND p.temporada_id='.$temporada_id; }
        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
        //echo $consulta;
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $directos = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

        $condicion = " WHERE p.temporada_id=206";
        $orden = ' ORDER BY p.fecha, p.hora_prevista';
        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
        //echo $consulta;
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $promocion = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    return array(
        'partidos' => $partidos,  
        'directos' => $directos,
        'promocion' => $promocion);
}

function generarPartidosDia()
{
    ob_start();
    $fecha = new \DateTime();
    $dia = $fecha->format('Y-m-d');
    //$dia='2020-03-05';
    $resultado = partidosDia($dia);
    guardarJSON($resultado['partidos'], '../../json/index.json');
    guardarJSON($resultado['directos'], '../../json/directos.json'); 
    guardarJSON($resultado['promocion'], '../../json/promocion.json'); 
    ob_end_flush();
    //$headers = "From: Partidos del día <no-reply@futbolme.com>\r\n";
    //$message = count($resultado)." partidos.\r\n";
    //mail("futbolme@futbolme.com","partidosDia - Futbolme.com",$message,$headers);
    echo count($resultado['partidos']).' partidos. '.count($resultado['directos']).' directos.';
}

function cabeceras(){
    $dia=date('Y-m-d');
    $campos = "DISTINCT p.temporada_id, tor.tipo_torneo,
tor.nombre nombreTorneo,tor.torneoCorto,tor.categoria_torneo_id,tor.traduccion,
tor.apuesta apuesta_torneo,co.nombre nombreComunidad,co.id idComunidad,
pa.nombre nombrePais,pa.id idPais, 
(select count(id) from partido where temporada_id=p.temporada_id and fecha='".$dia."') partidos,
(select count(id) from partido where estado_partido=1 and temporada_id=p.temporada_id and fecha='".$dia."') finalizados,
(select count(id) from partido where estado_partido=2 and temporada_id=p.temporada_id and fecha='".$dia."') directos";
    $tabla = ' partido p';
    $union = ' INNER JOIN equipo ec ON p.equipoLocal_id=ec.id';
    $union .= ' INNER JOIN equipo ef ON p.equipoVisitante_id=ef.id';
    $union .= ' INNER JOIN temporada te ON p.temporada_id=te.id';
    $union .= ' INNER JOIN torneo tor ON te.torneo_id=tor.id';
    $union .= ' INNER JOIN categoriatorneo ctor ON tor.categoria_torneo_id=ctor.id';
    $union .= ' INNER JOIN comunidad co ON tor.comunidad_id=co.id';
    $union .= ' INNER JOIN pais pa ON tor.pais_id=pa.id';
    $condicion = " WHERE p.fecha='".$dia."'
AND ec.nombre<>'SIN PAIS'
AND ef.nombre<>'SIN PAIS' AND tor.visible>4 AND tor.visible<100";
    $orden = ' ORDER BY tor.apuestaMa DESC, ctor.orden, tor.orden, p.hora_prevista';
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
    //echo $consulta;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $cabeceras = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
    //imp($resultado);
    guardarJSON($cabeceras, '../../json/index_cabeceras.json');
}


/////GENERAR MENU

function prepararMenuComunidad($array)
{
    $menu = array(
        'Regional' => array(),
        'Juvenil' => array(),
        'Cadete' => array(),
        'Infantil' => array(),
        'Alevin' => array(),
        'Femenino' => array(),
        'Fútbol Sala' => array(),
    );

    foreach ($array as $item) {

        $pgTemporada = '/resultados-directo/torneo/'.poner_guion($item['nombre']).'/'.$item['temporada_id'].'/';
        $pgTemporada=utf8_encode($pgTemporada);
        $item['ruta']=$pgTemporada;

        if ((1 == $item['categoria_torneo_id'] || 4 == $item['categoria_torneo_id']) ) { 
            $menu['Regional'][] = $item;
        } elseif (5 == $item['categoria_torneo_id']) { $menu['Juvenil'][] = $item;
        } elseif (6 == $item['categoria_torneo_id']) { $menu['Cadete'][] = $item;        
        } elseif (14 == $item['categoria_torneo_id']) { $menu['Infantil'][] = $item;
        } elseif (15 == $item['categoria_torneo_id']) { $menu['Alevin'][] = $item;
        } elseif (7 == $item['categoria_torneo_id']) { $menu['Femenino'][] = $item;
        } elseif (17 == $item['categoria_torneo_id']) { $menu['Fútbol Sala'][] = $item;
        }
    }

    return $menu;
}

function categoriasComunidad($comunidad_id)
{
    $consulta = 'SELECT c.id,c.nombre,t.id torneo_id, t.nombre torneo_nombre, te.id temporada_id, t.categoria_torneo_id, t.tipo_torneo
    FROM torneo t 
    INNER JOIN temporada te ON te.torneo_id=t.id
    INNER JOIN categoria c ON c.id=t.categoria_id
    INNER JOIN categoriatorneo ct ON ct.id=t.categoria_torneo_id';
    if ($comunidad_id==10){ //los andaluces del grupo 9 tendrán en sexo=1 y luego mirar el orden.
    $consulta.=' WHERE (t.comunidad_id='.$comunidad_id.' OR t.sexo=11) AND t.visible>4 ORDER BY c.orden,t.orden';
    } else {
        $consulta.=' WHERE t.comunidad_id='.$comunidad_id.' AND t.visible>4 ORDER BY c.orden,t.orden';
    }
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    //echo $consulta;
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
    return $resultado;
}

function generarMenu()
{
    $resultado = menu(); 

    $menu = prepararMenu($resultado); 

    
   
    guardarJSON($menu, '../../json/menu.json');
    echo "Generado un nuevo menú para futbolme.com<br />";
}

function menu()
{
    $campos = 'tor.id, tor.nombre, tor.categoria_torneo_id, tor.tipo_torneo, te.id temporada_id, tor.orden, 
    pa.nombre nombrePais, pa.id imagenPais, co.nombre nombreComunidad, co.id imagenComunidad, tor.division_id, tor.visible';
    $tabla = ' torneo tor';
    $union = ' INNER JOIN temporada te ON te.torneo_id=tor.id';
    $union .= ' INNER JOIN categoriatorneo ctor ON tor.categoria_torneo_id=ctor.id';
    $union .= ' INNER JOIN pais pa ON tor.pais_id=pa.id';
    $union .= ' INNER JOIN comunidad co ON tor.comunidad_id=co.id';
    $condicion = ' WHERE tor.visible>4 AND tor.visible<100 AND tor.id>7';
    $orden = ' ORDER BY tor.categoria_torneo_id, tor.division_id, tor.orden';
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;

    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);


    return $resultado;


}


function prepararMenu($array)
{
    $menu = array(
        'primeraRFEF' => array(),
        'segundaRFEF' => array(),
        'promo2RFEF' => array(),
        'terceraRFEF' => array(),        
        'segundaB' => array(),
        'tercera' => array(),
        'promotercera' => array(),
        'RFEF' => array(),
        'FIFA' => array(),
        'UEFA' => array(),
        'autonomica' => array(),
        'juevenil' => array(),
        'cadete' => array(),
        'infantil' => array(),
        'femenino' => array(),
        'europa' => array(),
        'america' => array(),
        'sala' => array(),
    );


    foreach ($array as $item) {

        $pgTemporada = '/resultados-directo/torneo/'.poner_guion($item['nombre']).'/'.$item['temporada_id'].'/';
        $pgTemporada=utf8_encode($pgTemporada);
        $item['ruta']=$pgTemporada;

        if (1 == $item['categoria_torneo_id'] and 1 == $item['tipo_torneo'] and 3 == $item['division_id']) {


            if (substr($item['nombre'], 0,7)=='PRIMERA'){
                $menu['primeraRFEF'][] = $item;
            } else {
                $menu['segundaRFEF'][] = $item;
            }

        } elseif (1 == $item['categoria_torneo_id'] and 1 == $item['tipo_torneo'] and 4 == $item['division_id']) {

            $menu['segundaB'][] = $item;

        } elseif ((1 == $item['categoria_torneo_id'] and 1 < $item['imagenComunidad']) OR $item['id']==3130) {

            if (1 == $item['tipo_torneo'] ) {
                


                //if (substr($item['nombre'], 0, 22)=='TERCERA DIVISIÓN RFEF'){
                if (substr($item['nombre'], 0, 19)=='TERCERA FEDERACIÓN'){
                    $menu['terceraRFEF'][] = $item;
                } else {
                    $menu['tercera'][] = $item;
                }



            } else {

                if (substr($item['nombre'], 0,4)!='COPA' && $item['id']<3109 && $item['id']>3126){
                    $menu['promotercera'][] = $item;
                } elseif (($item['id']>3108 && $item['id']<3127) OR $item['id']==3130){
                    $menu['promo2RFEF'][] = $item;
                }
                
            }
            


        } elseif (1 == $item['categoria_torneo_id']) {
            if ($item['tipo_torneo']==1){ continue; } //para quitar los nuevos de segunda b
            $menu['RFEF'][] = $item;
        } elseif (2 == $item['categoria_torneo_id']) {
            $menu['FIFA'][] = $item;
        } elseif (3 == $item['categoria_torneo_id']) {
            $menu['UEFA'][] = $item;
        } elseif (4 == $item['categoria_torneo_id']) {
            if (!array_key_exists($item['nombreComunidad'], $menu['autonomica'])) {
                $menu['autonomica'][$item['nombreComunidad']] = array($item);
            } else {
                $menu['autonomica'][$item['nombreComunidad']][] = $item;
            }
            //se podría poner como clave imagenComunidad.
        } elseif (5 == $item['categoria_torneo_id']) {
            //if ($item['imagenComunidad']>1){ continue; }
            $menu['juvenil'][] = $item;
        } elseif (6 == $item['categoria_torneo_id']) {
            if (!array_key_exists($item['nombreComunidad'], $menu['cadete'])) {
                $menu['cadete'][$item['nombreComunidad']] = array($item);
            } else {
                $menu['cadete'][$item['nombreComunidad']][] = $item;
            }
        } elseif (14 == $item['categoria_torneo_id']) {
            if (!array_key_exists($item['nombreComunidad'], $menu['infantil'])) {
                $menu['infantil'][$item['nombreComunidad']] = array($item);
            } else {
                $menu['infantil'][$item['nombreComunidad']][] = $item;
            }
        } elseif (7 == $item['categoria_torneo_id']) {
            if ($item['imagenComunidad']>1){ continue; }
            $menu['femenino'][] = $item;
        } elseif (8 == $item['categoria_torneo_id']) {
            if (!array_key_exists($item['nombrePais'], $menu['america'])) {
                $menu['america'][$item['nombrePais']] = array($item);
            } else {
                $menu['america'][$item['nombrePais']][] = $item;
            }
        } elseif (9 == $item['categoria_torneo_id']) {
            //imp($item);
            if (!array_key_exists($item['nombrePais'], $menu['europa'])) {
                $menu['europa'][$item['nombrePais']] = array($item);                
            } else {
                $menu['europa'][$item['nombrePais']][] = $item;
            }
        } elseif (17 == $item['categoria_torneo_id']) {
            //if ($item['imagenComunidad']>1){ continue; }
            $menu['sala'][] = $item;
        }
    }

    
    
    return $menu;
}

//url torneos

function poner_guion($cadena)
{
    // $cadena = strtolower($cadena);

    $cadena = utf8_decode($cadena);
    $cadena = trim($cadena);
    $cadena = str_replace('"', '', $cadena);
    $cadena = str_replace('/', '-', $cadena);
    $cadena = str_replace(',', '', $cadena);
    $cadena = str_replace(' - ', '-', $cadena);
    $cadena = str_replace(' ', '-', $cadena);
    $cadena = str_replace('?', '', $cadena);
    $cadena = str_replace('+', '', $cadena);
    $cadena = str_replace(':', '', $cadena);
    $cadena = str_replace('??', '', $cadena);
    $cadena = str_replace('', '', $cadena);
    $cadena = str_replace('´', '', $cadena);
    $cadena = str_replace("'", '', $cadena);
    $cadena = str_replace('!', '', $cadena);
    $cadena = str_replace('¿', '', $cadena);
    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýýþÿ??´';
    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuuyybyRr--';
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);

    $cadena = strtolower($cadena);

    return $cadena;
}

function XidChat($temporada_id)
    {
    switch ($temporada_id) {
        case 1:
            $nombreTorneo='PRIMERA DIVISIÓN';
            $id_chat='34681924160-1626154007@g.us';
            $enlace_chat='https://chat.whatsapp.com/DvRFpMFULRaFjo35Rka99a';
            break;
        case 2:
            $nombreTorneo='SEGUNDA DIVISIÓN';
            $id_chat='34681924160-1626158091@g.us';
            $enlace_chat='https://chat.whatsapp.com/I2vt26vueY6KAUVaEIfxpj';
            break;
        case 3055:
            $nombreTorneo='1ª DIVISIÓN RFEF - Grupo 1';
            $id_chat='34681924160-1626158233@g.us';
            $enlace_chat='https://chat.whatsapp.com/IDRG62EYrsW3IYM0FnDbPm';
            break;
        case 3056:
            $nombreTorneo='1ª DIVISIÓN RFEF - Grupo 2';
            $id_chat='34681924160-1626158317@g.us';
            $enlace_chat='https://chat.whatsapp.com/ECtvaT6e4ABD43QLI1boOr';
            break;
        case 3057:
            $nombreTorneo='2ª DIVISIÓN RFEF - Grupo 1';
            $id_chat='34681924160-1626158442@g.us';
            $enlace_chat='https://chat.whatsapp.com/IjZLxQlIKnxEQ7owSfbxYm';
            break;
        case 3058:
            $nombreTorneo='2ª DIVISIÓN RFEF - Grupo 2';
            $id_chat='34681924160-1626158515@g.us';
            $enlace_chat='https://chat.whatsapp.com/G6lc70XLGvIGii8VESCxgz';
            break;
        case 3059:
            $nombreTorneo='2ª DIVISIÓN RFEF - Grupo 3';
            $id_chat='34681924160-1626158570@g.us';
            $enlace_chat='https://chat.whatsapp.com/CYZ8Bld9MkfBlFABG6AtSj';
            break;
        case 3060:
            $nombreTorneo='2ª DIVISIÓN RFEF - Grupo 4';
            $id_chat='34681924160-1626158659@g.us';
            $enlace_chat='https://chat.whatsapp.com/LF0xiV7XYxC4QBPaA4rNBL';
            break;
        case 3061:
            $nombreTorneo='2ª DIVISIÓN RFEF - Grupo 5';
            $id_chat='34681924160-1626158712@g.us';
            $enlace_chat='https://chat.whatsapp.com/GXkUra3aBS9C96AO68xdcw';
            break;

        case 214:
            $nombreTorneo='Primera División Femenina';
            $id_chat='34681924160-1626930899@g.us';
            $enlace_chat='https://chat.whatsapp.com/LkQyXt8xZFAFcUFothOE2u';
            break;


        case 1000:
            $nombreTorneo='Prueba';
            $id_chat='34678558201@c.us';
            $enlace_chat='https://chat.whatsapp.com/GXkUra3aBS9C96AO68xdcw';
            break;
        
        default:

            
            $mysqli = conectar();
            $sql='SELECT whatsapp FROM torneo WHERE id=(SELECT torneo_id FROM temporada WHERE id='.$_GET['temporada_id'].')';
            $resultadoSQL = mysqli_query($mysqli, $sql);
            $r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
            if (!empty($r)){ 
                $id_chat=$r['whatsapp']; 
            } else { 
                $id_chat=''; 
            }
            break;
    }

    return $id_chat;
}

?>