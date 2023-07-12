<?php
        //buscamos el texto en el contenido.
$string = str_get_html($content);
$html->load($string);
$partidos=array();



if ($modelo==1) {
    
}

if ($modelo==2) {
    foreach($html->find('table.table') as $key => $tabla) {
        echo $tabla;
        $contador=0;
        foreach($tabla->find('tr[align=center]') as $k => $tr){
                $partidos[$contador]['jornada'] = $jda;
                $partidos[$contador]['partido'] = trim($tr->find('td', 0)->plaintext);
                $partidos[$contador]['resultado'] = trim($tr->find('td', 1)->plaintext);
                $contador++;         
        }  
        break;
    }
}

if ($modelo==3) {
    foreach($html->find('table.table-striped') as $key => $tabla) {
        //echo $tabla;
        $contador=0;
        foreach($tabla->find('tr') as $k => $tr){

                $partidos[$key][$contador]['jornada'] = $jda;
                $partidos[$key][$contador]['local'] = trim($tr->find('td',0)->plaintext);
                $partidos[$key][$contador]['id_local'] = trim($tr->find('a',0)->href);
                $partidos[$key][$contador]['resultado'] = trim($tr->find('td',1)->plaintext);
                $partidos[$key][$contador]['visitante'] = trim($tr->find('td',2)->plaintext);
                $partidos[$key][$contador]['id_visitante'] = trim($tr->find('a',1)->href);
                $contador++; 
                //echo $tr;
                //echo '<hr />';        
        } 
    }
}


if ($modelo==4) { 
    foreach($html->find('table.table-condensed') as $key => $tabla) {


        echo $tabla;

        $contador=0;
        if ($key==1 || $key==3){ continue; }
        foreach($tabla->find('tr') as $k => $tr){

                $partidos[$key][$contador]['jornada'] = $jda;

                $local=trim($tr->find('td',0)->plaintext);
                $local=utf8_decode($local);
                $local=str_replace('Ã', 'Ñ', $local);

                $idLocal=text_to_ascii($local);

                imp($idLocal);

                $partidos[$key][$contador]['local'] = $local;
                $partidos[$key][$contador]['id_local'] = trim($tr->find('a',0)->href);
                $partidos[$key][$contador]['resultado'] = trim($tr->find('td',1)->plaintext);

                $visitante=trim($tr->find('td',2)->plaintext);
                $visitante=utf8_decode($visitante);
                $visitante=str_replace('Ã', 'Ñ', $visitante);

                $idVisitante=text_to_ascii($visitante);

                imp($idVisitante);

                $partidos[$key][$contador]['visitante'] = $visitante;
                $partidos[$key][$contador]['id_visitante'] = trim($tr->find('a',1)->href);
                $contador++;
                
        } 
    }
}
    

    

imp($partidos);

die('finalizado');

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


 
function text_to_ascii($cadena){
 
        $cadena=stripslashes($cadena); 
        $ascii='';
        $valor=0;
        
        for($i = 0; $i < strlen($cadena); $i++){

                if ($i==1 || $i==3){
                    $valor=($valor*ord(substr($cadena,$i)));
                }else{
                    $valor=($valor+ord(substr($cadena,$i)));
                }
                
                
                $ascii.=ord(substr($cadena,$i));
                $ascii.=",";
        } 

            
        
        $ascii=substr ($ascii, 0, -1);

        imp($valor);
        imp($cadena);
        
return $ascii;
 
}
 
function ascii_to_text($ascii){
 
        $ascii=stripslashes($ascii);
        $partes=explode(",",$ascii);
        
        for($x = 0; $x < count($partes); $x++){
                $cadena.=chr($partes[$x]);
        }
        
return $cadena;
 
}

