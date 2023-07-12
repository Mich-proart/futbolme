<?php
        //buscamos el texto en el contenido.
$string = str_get_html($content);
$html->load($string);
$partidos=array();
$idsEquipo=array();

//var_dump($html);

if (!isset($nJor)){
$numJornadas = trim($html->find('select[name=jornadas]',0)->plaintext);
//imp($numJornadas);
$nJornadas=substr($numJornadas, -15);
$nJ=explode(' - ',$nJornadas);
$nJor=$nJ[0];
settype($nJor, "integer");   
    echo "Jornadas = ".$nJor.' Jornadas en la BD: '.$jornadasTorneo.'<br />';
    if ($jornadasTorneo!=$nJor) {
        echo '<h3 style="color:red">¡¡ No coinciden las jornadas !! Tenemos grabadas '.$jornadasTorneo.'</h3>';
        die('<h4>Urgente repasar el torneo o los proxis</h4>');
    }
    if ($nJor==0){ unset($nJor); }
}



foreach($html->find('table[width=100%]') as $kt => $tabla){
    //echo $tabla->innertext . '<br>';
    foreach($tabla->find('div.font_widgetL') as $div)
    if ($div->find('a',0) != null){
    $partidos[$kt]['local'] = trim($div->find('a',0)->plaintext);
    $partidos[$kt]['enlaceLocal'] = trim($div->find('a',0)->href);
    }

    foreach($tabla->find('span.wid2_resultado_cerrada') as $k => $e){
        $partidos[$kt]['goles'][$k]=$e->innertext;
    }

    if ($tabla->find('a.btn',0) != null){    
        $partidos[$kt]['acta'][] = trim($tabla->find('a.btn',0)->href);
        $partidos[$kt]['acta'][] = trim($tabla->find('a.btn',0)->onmouseover);

    }

    if ($tabla->find('a.btn',1) != null){    
        $partidos[$kt]['masDatos'][] = trim($tabla->find('a.btn',1)->href);
        $partidos[$kt]['masDatos'][] = trim($tabla->find('a.btn',1)->onmouseover);

    }

    foreach($tabla->find('span.horario') as $k => $e){
        $partidos[$kt]['horario'][$k]=$e->plaintext;
    }
    

    foreach($tabla->find('div.font_widgetV') as $div)
    if ($div->find('a',0) != null){
    $partidos[$kt]['visitante'] = trim($div->find('a',0)->plaintext);
    $partidos[$kt]['enlaceVisitante'] = trim($div->find('a',0)->href);
    } 
    /*?>
    <textarea cols="100" rows="4"><?php echo $partidos[$kt]['goles'][0]?></textarea>
    <textarea cols="100" rows="4"><?php echo $partidos[$kt]['goles'][1]?></textarea>        
    <?php */
} // del html de los partidos de la jornada


$partidosJson=array();
if (count($partidos)>0){
    foreach ($partidos as $key => $value) {
        $fedLocal_id=0;
        $fedVisitante_id=0;
        if (!isset($value['local'])){ continue; }
        if (!isset($value['visitante'])){ continue; }
        $fedLocal_id=preg_replace('/NFG_VisEquipos\\?cod_primaria=(.*)&Codigo_Equipo=(.*)/', '$2', $value['enlaceLocal']);
        $fedVisitante_id=preg_replace('/NFG_VisEquipos\\?cod_primaria=(.*)&Codigo_Equipo=(.*)/', '$2', $value['enlaceVisitante']);


        if (isset($value['horario'])){
            $fecha1=$value['horario'][0];$fecha1=str_replace('&nbsp;', '', $fecha1);
            $hora_prevista=$value['horario'][1]??'00:00';
            $hora_prevista=str_replace('&nbsp;', '', $hora_prevista);
            $hora_prevista.=':00';
            $d=substr($fecha1,0,2);
            $m=substr($fecha1,3,2);
            $a=substr($fecha1,-4);
            $fecha=$a.'-'.$m.'-'.$d;            
            $hora_real=$hora_prevista; 
        } else {
            $hora_prevista='00:00:11';
            $d=substr($fecha1,0,2);
            $m=substr($fecha1,3,2);
            $a=substr($fecha1,-4);
            $fecha=$a.'-'.$m.'-'.$d;
        } 
        $id_partido=$fedLocal_id.'-'.$fedVisitante_id;
        $estado_partido=0;
        $valorActa=$value['acta']??'';
        $valorMasdatos=$value['masDatos']??'';
        if (isset($value['goles'])){
            $goles_local1=$value['goles'][0];
            $goles_local1=str_replace('-', '', $goles_local1);
            $goles_visitante1=$value['goles'][1]; 
            $goles_visitante1=str_replace('-', '', $goles_visitante1);
            $gl1=quitarFuncionEspecial($goles_local1);
            $gv1=quitarFuncionEspecial($goles_visitante1);
            $gl2=explode(',',$gl1);
            $gv2=explode(',',$gv1);
            $gl=$gl2[0];
            $gv=$gv2[0];
            $gl=str_replace('\003', '', $gl); 
            $gv=str_replace('\003', '', $gv);          
            if (count($gl2)>2 && $gl2[1]!=''){ 
                $gl=$gl2[1];
                $pos=0;
                $pos = strpos($goles_local1, 'display:none}'); 
                //si existe display:none}  el valor válido es el del centro
                if ($pos==0) { //si no existe agragaremos el primer valor antes o después al valor del centro.
                    $pos = strpos($goles_local1, 'after');
                    if ($pos>0) { $gl=$gl.$gl2[0]; }
                    $pos = strpos($goles_local1, 'before');
                    if ($pos>0) { $gl=$gl2[0].$gl; }
                }
            }
            $gl=str_replace('\003', '', $gl); //nos puede venir codificado en la primera posición las dos cifras.
            //echo ' y ahora esto vale gl '.$gl.'<hr />';
            if (count($gv2)>2 && $gv2[1]!=''){ 
                $gv=$gv2[1]; 
                $pos=0;
                $pos = strpos($goles_visitante1, 'display:none}');
                if ($pos==0) {
                    $pos = strpos($goles_visitante1, 'after');
                    if ($pos>0) { $gv=$gv.$gv2[0]; }
                    $pos = strpos($goles_visitante1, 'before');
                    if ($pos>0) { $gv=$gv2[0].$gv; }
                }
            }
            $gv=str_replace('\003', '', $gv);            
            $goles_local=strip_tags($gl);
            $goles_visitante=strip_tags($gv);
            $goles_local=trim($goles_local);
            $goles_visitante=trim($goles_visitante);
            $goles_local=(int)$goles_local;
            $goles_visitante=(int)$goles_visitante;
            if (isset($value['masDatos']) && $value['masDatos'][1] && strlen($value['masDatos'][1])>20){ 
                $pos = strpos($value['masDatos'][1], 'Provisional');
                if ($pos>0){ $estado_partido=0; }
            } else {
                $estado_partido=1; //echo 'Partido finalizado<hr />';
            }            
        } else {
            $goles_local=0;
            $goles_visitante=0; 
            $estado_partido=0;
            if (isset($value['masDatos']) && $value['masDatos'][1] && strlen($value['masDatos'][1])>20){ 
            $pos = strpos($value['masDatos'][1], 'SUSPENDIDO');
            if ($pos>0){ $estado_partido=4; }                
            }    
        }
        $codigo_acta=0;
        if (isset($value['acta'])){
            $c_a=$value['acta'][0];
            if (strlen($c_a)>10){
                $c_a1=explode('&cod_acta=', $c_a);
                $codigo_acta=$c_a1[1]??0;
                //$estado_partido=1; //echo 'Partido finalizado por acta<hr />';
            }
            if (isset($value['acta'][1]) && strlen($value['acta'][1])>20){
                $pos = strpos($value['acta'][1], 'Suspendido');
                if ($pos>0){ $estado_partido=4; }
            }
        } 
        
        $idsEquipo[$fedLocal_id]['nombreFed']=$value['local'];
        $idsEquipo[$fedVisitante_id]['nombreFed']=$value['visitante'];

        


        
        
        $partidosJson[$id_partido]['jornada']=$jornadaActiva;
        $partidosJson[$id_partido]['fecha']=$fecha;
        $partidosJson[$id_partido]['hora']=$hora_prevista;
        $partidosJson[$id_partido]['lugar']='';
        $partidosJson[$id_partido]['arbitro']='';
        $partidosJson[$id_partido]['acta']=$codigo_acta;
        $partidosJson[$id_partido]['fedLocal_id']=$fedLocal_id;
        foreach ($equipos as $k => $v) {
            if ($v['federacion_id']==$fedLocal_id){ 
                $partidosJson[$id_partido]['equipoLocal_id'] = $v['equipo_id'];
                $partidosJson[$id_partido]['local'] = $v['nombreCorto']; 
                $idsEquipo[$fedLocal_id]['id']=$v['equipo_id'];
                $idsEquipo[$fedLocal_id]['nombre']=$v['nombreCorto'];
                $idsEquipo[$fedLocal_id]['club_id']=$v['club_id'];
                break;
            }
        }
        

        $partidosJson[$id_partido]['fedVisitante_id']=$fedVisitante_id;
        foreach ($equipos as $k => $v) {
            if ($v['federacion_id']==$fedVisitante_id){ 
                $partidosJson[$id_partido]['equipoVisitante_id'] = $v['equipo_id'];
                $partidosJson[$id_partido]['visitante'] = $v['nombreCorto']; 
                $idsEquipo[$fedVisitante_id]['id']=$v['equipo_id'];
                $idsEquipo[$fedVisitante_id]['nombre']=$v['nombreCorto'];
                $idsEquipo[$fedVisitante_id]['club_id']=$v['club_id'];
                break;
            }
        }
        

        $partidosJson[$id_partido]['estado_partido']=$estado_partido;
        $partidosJson[$id_partido]['goles_local']=$goles_local;
        $partidosJson[$id_partido]['goles_visitante']=$goles_visitante;
        
    } 
unset($partidos); 
} // final si hay partidos 

