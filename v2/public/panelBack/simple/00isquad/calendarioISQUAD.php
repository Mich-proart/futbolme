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
    if ($nJor==0){ unset($nJor); }
}


$contador=0;
foreach($html->find('div#calendario') as $key => $div){
    foreach($div->find('table.table') as $k => $tabla){
    //echo $tabla;
        $contador=1;
        foreach($tabla->find('tr') as $k1 => $tr){
            if ($tr->find('td[colspan=4]',0) != null ) { 
                $partidos[$contador]['jornada'] = trim($tr->find('td[colspan=4]',0)->plaintext);
                $contador++;
            }
        }

        $contador=0;
        $contaceldas=0;
        foreach($tabla->find('tr') as $k => $tr){

            if ($tr->find('td[colspan=4]',0) != null ) {  $contaceldas=0;$contador++; continue; } 
            $partidos[$contador]['partidos'][$contaceldas]['local'] = trim($tr->find('td.etiquetalocalcalendario',0)->plaintext);
            $partidos[$contador]['partidos'][$contaceldas]['enlaceLocal'] = trim($tr->find('a.enlace_equipo', 0)->href);
            $partidos[$contador]['partidos'][$contaceldas]['visitante'] = trim($tr->find('td.etiquetavisitantecalendario',0)->plaintext);
            $partidos[$contador]['partidos'][$contaceldas]['enlaceVisitante'] = trim($tr->find('a.enlace_equipo', 1)->href);
            $contaceldas++;
        }
    //imp($partidos); 
    break;
    }
break;
}  

    

if (count($partidos)>0){
    
    foreach ($partidos as $key => $v) {

        $jornada=$v['jornada'];

        $jda=$key;

        $lafecha=str_replace('Jornada '.$key.' ( ', '', $jornada);
        $lafecha=str_replace(' )', '', $lafecha);

        $d=substr($lafecha,0,2);
        $m=substr($lafecha,3,2);
        $a=substr($lafecha,-4);
        $fecha=$a.'-'.$m.'-'.$d; 

        $hora_prevista='00:00:11';

        $goles_local=0;
        $goles_visitante=0;
        $estado_partido=0;
        $codigo_acta=0;
        

        foreach ($v['partidos'] as $k2 => $value) {
        
        
            if (!isset($value['local'])){ continue; }
            if (!isset($value['visitante'])){ continue; }

            $equipoLocal_id=preg_replace('/competiciones_publico_equipo.php\\?id_equipo=(.*)&id_grupo=(.*)/', '$1', $value['enlaceLocal']);
            $equipoVisitante_id=preg_replace('/competiciones_publico_equipo.php\\?id_equipo=(.*)&id_grupo=(.*)/', '$1', $value['enlaceVisitante']);
        
         
            $local=$value['local'];        
            $local=str_replace('&nbsp;', '', $local);
            $local=trim($local);

            $visitante=$value['visitante'];
            $visitante=str_replace('&nbsp;', '', $visitante);
            $visitante=trim($visitante);

            /*echo '<hr />goles_local: '.$goles_local.'<br />';
            echo 'goles_visitante: '.$goles_visitante.'<br />';
            echo '<br />local_id: '.$equipoLocal_id.'<br />';
            echo 'visitante_id: '.$equipoVisitante_id.'<br />';
            echo 'local: '.$local.'<br />';
            echo 'visitante: '.$visitante.'<br />';
            echo 'fecha: '.$fecha.'<br />';
            echo 'hora: '.$hora_prevista.'<br />';
            echo 'jornada: '.$jda.'<br />';
            echo 'estado_partido: '.$estado_partido.'<br />';
            echo 'codigo_acta: '.$codigo_acta.'<br />';        
            echo 'grupo_id: '.$grupo_id.'<br />';
            echo '<hr />';*/


            include ('calendarioPartidoDatosIsquad.php'); 

        }        
        
        
        
    } 
} // final si hay partidos

