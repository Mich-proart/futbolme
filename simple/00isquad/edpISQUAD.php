<?php
        //buscamos el texto en el contenido.

$string = str_get_html($content);
$html->load($string);
$partidos=array();


foreach($html->find('div.capajornada') as $tr)         
    $jornadas=$tr->plaintext;


if (!isset($nJor)){
    $nJor=$jornadas;
    echo "Jornadas = ".$nJor;

    if (isset($jornadasTorneo) && $jornadasTorneo!=$nJor) {
        echo '<h3 style="color:red">¡¡ No coinciden las jornadas !! Tenemos grabadas '.$jornadasTorneo.'</h3>';
    }

    if ($nJor==0){ unset($nJor); }
}


    $contador=0;
    foreach($html->find('tr.filagorda') as $k => $tr){
        if ($k==0 || $k%2==0){ continue; }

        if ($tr->find('td.p-t-20',1) != null && $tr->find('a',1) != null && $tr->find('div.resultadocompeticionestabla',4) != null) {        
            $partidos[$contador]['local'] = trim($tr->find('td.p-t-20', 0)->plaintext);
            $partidos[$contador]['enlaceLocal'] = trim($tr->find('a', 0)->href);
            
        
            $partidos[$contador]['visitante'] = trim($tr->find('td.p-t-20', 1)->plaintext);
            $partidos[$contador]['enlaceVisitante'] = trim($tr->find('a', 1)->href);

            //foreach($tr->find('div.resultadocompeticionestabla') as $e)
            //$partidos[$contador]['goles'][] = $e->plaintext;
        
            $partidos[$contador]['goles'][0] = trim($tr->find('div.resultadocompeticionestabla', 5)->plaintext);
            $partidos[$contador]['goles'][1] = trim($tr->find('div.resultadocompeticionestabla', 6)->plaintext);
            $contador++;
        }
        
        if ($contador>10){ break; }    
    }  

    foreach($html->find('tr.filafina') as $k2 => $tr){
        //echo $tr.'<br />';
        foreach($tr->find('a') as $e)
            $partidos[$k2]['acta'] = $e->onclick;
        
        foreach($tr->find('div.mediacelda') as $e)
        $partidos[$k2]['fecha'][] = $e->plaintext; 
        if ($k2>10){ break; }                    
    }  

//imp($partidos);

if (count($partidos)>0){
    
    foreach ($partidos as $key => $value) {
        
        if (!isset($value['local'])){ continue; }
        if (!isset($value['visitante'])){ continue; }

        $equipoLocal_id=preg_replace('/competiciones_publico_equipo.php\\?id_equipo=(.*)&id_grupo=(.*)/', '$1', $value['enlaceLocal']);
        $equipoVisitante_id=preg_replace('/competiciones_publico_equipo.php\\?id_equipo=(.*)&id_grupo=(.*)/', '$1', $value['enlaceVisitante']);
        
        $lafecha=0;$hora_prevista='00:00';
        foreach ($value['fecha'] as $k => $v) {
            if ($v=='12/12/2019'){ continue; }
            if (strlen($v)<10 && $lafecha=0){ continue; }
            //imp($v);imp($k);
            if (strlen($v)>9){ 
                $fecha=$v;$lafecha=($k+1);break;
            }
        }

        if ($lafecha>0){ 
            $hora_prevista=$value['fecha'][$lafecha];
            $hora_prevista=substr($hora_prevista, 0,5);
        } 
          
         
        $hora_prevista.=':00';
        $d=substr($fecha,0,2);
        $m=substr($fecha,3,2);
        $a=substr($fecha,-4);
        $fecha=$a.'-'.$m.'-'.$d;            
        

        
        $estado_partido=0;
        if (isset($value['goles'])){
            $goles_local=$value['goles'][0];
            $goles_visitante=$value['goles'][1];
            if (strlen($goles_local)>0){
                $goles_local=(int)$goles_local;
                $goles_visitante=(int)$goles_visitante;            
                $estado_partido=1;
            } else {
                $goles_local=0;
                $goles_visitante=0; 
                $estado_partido=0;
            }
        } else {
            $goles_local=0;
            $goles_visitante=0; 
            $estado_partido=0;
        }
        
        $local=$value['local'];        
        $local=str_replace('&nbsp;', '', $local);
        $local=trim($local);

        $visitante=$value['visitante'];
        $visitante=str_replace('&nbsp;', '', $visitante);
        $visitante=trim($visitante);

        

        $codigo_acta=0;
        if (isset($value['acta'])){
            $codigo_acta=str_replace('mostrarActa(', '', $value['acta']);
            $codigo_acta=str_replace(')', '', $codigo_acta);
        }
        
        
        include ('partidoDatosIsquad.php'); 
        
    } 
} // final si hay partidos

