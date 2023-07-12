<?php
        //buscamos el texto en el contenido.
$string = str_get_html($content);
$html->load($string);
$partidos=array();

//echo $html;

if (!isset($nJor)){
$numJornadas = trim($html->find('select[name=jornadas]',0)->plaintext);
$nJornadas=substr($numJornadas, -15);
$nJ=explode(' - ',$nJornadas);
$nJor=$nJ[0];
settype($nJor, "integer");

    if ($tipo_torneo==2){
        $i=0;
          foreach($html->find('select') as $element) { 
            if ($element->id == 'jornada')  { 
                  foreach($element->find('option') as $options) { // find options of this select box 
                   //$option_val[] = $options->value; // for option value
                    //$option_txt[] = $options->innertext; // for option text
                    $nJor=$options->value;
                  }
              }
          }
    }

    imp($tipo_torneo);
    echo "Jornadas = ".$nJor.' Tipo Torneo='.$tipo_torneo.'<br />';


    if ($nJor==0){ unset($nJor); }
}


foreach($html->find('table.table-hover') as $kt1 => $tr){
echo $tr;

    


    foreach($tr->find('tr') as $kt => $tabla){

        //echo $tr; 

        foreach($tabla->find('div.font_widgetL') as $div)
        $partidos[$kt]['local'] = trim($div->find('a',0)->plaintext);
        $partidos[$kt]['enlaceLocal'] = trim($div->find('a',0)->href);

        foreach($tabla->find('span.wid2_resultado_cerrada') as $k => $e){
            $partidos[$kt]['goles'][$k]=$e->innertext;
        }
        
        if ($tabla->find('a.font-green-meadow',0)!=null){
            $partidos[$kt]['acta'] = trim($tabla->find('a.font-green-meadow',0)->href);
        } else {  $partidos[$kt]['acta'] =0; }

        foreach($tabla->find('span.esconder') as $k => $e){
            $partidos[$kt]['horario'][$k]=$e->plaintext;
        }
        

        foreach($tabla->find('div.font_widgetV') as $div)

        if ($div->find('a',0)!=null){    
            $partidos[$kt]['visitante'] = trim($div->find('a',0)->plaintext);
            $partidos[$kt]['enlaceVisitante'] = trim($div->find('a',0)->href);
        } else {
            $partidos[$kt]['visitante'] = 'descansa';
            $partidos[$kt]['enlaceVisitante'] = 0;
        }
    }
    /*?>
    <textarea cols="100" rows="4"><?php echo $partidos[$kt]['goles'][0]?></textarea>
    <textarea cols="100" rows="4"><?php echo $partidos[$kt]['goles'][1]?></textarea>        
    <?php */
} // del html de los partidos de la jornada

if (count($partidos)>0){
    
    foreach ($partidos as $key => $value) {
        
        if (!isset($value['local'])){ continue; }
        if (!isset($value['visitante'])){ continue; }

        $hora_prevista='00:00';
        $fecha='01-01-1970';
        $equipoLocal_id=preg_replace('/NFG_VisEquipos\\?cod_primaria=(.*)&Codigo_Equipo=(.*)/', '$2', $value['enlaceLocal']);
        $equipoVisitante_id=preg_replace('/NFG_VisEquipos\\?cod_primaria=(.*)&Codigo_Equipo=(.*)/', '$2', $value['enlaceVisitante']);

        if (isset($value['horario'])){
            $fecha=$value['horario'][0];$fecha=str_replace('&nbsp;', '', $fecha);$fecha=trim($fecha);
            $hora_prevista=$value['horario'][1]??'00:00';$hora_prevista=str_replace('&nbsp;', '', $hora_prevista);$hora_prevista=trim($hora_prevista); 
        }        
         
        $hora_prevista.=':00';

        $d=substr($fecha,0,2);
        $m=substr($fecha,3,2);
        $a=substr($fecha,-4);
        $fecha=$a.'-'.$m.'-'.$d;            
        $hora_real=$hora_prevista;

        
        $estado_partido=0;
        if (isset($value['goles'])){

            $goles_local1=$value['goles'][0];
            $goles_local1=str_replace('-', '', $goles_local1);
            $goles_visitante1=$value['goles'][1]; 
            $goles_visitante1=str_replace('-', '', $goles_visitante1);

            $gl1=quitarFuncion($goles_local1);
            $gv1=quitarFuncion($goles_visitante1);
            $gl2=explode(',',$gl1);
            $gv2=explode(',',$gv1);

            $gl=$gl2[0];
            $gv=$gv2[0];
            $gl=str_replace('\003', '', $gl); 
            $gv=str_replace('\003', '', $gv); 

            //echo 'esto vale gl '.$gl.'<hr />';
            //de entrada se coge el primer valor de la cadena
            //si la cadena tiene por lo menos 2 comas y en el centro hay algún valor...            
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

            /*$goles_local=$value['goles'][0];
            $goles_visitante=$value['goles'][1]; 
            
            $gl=quitarFuncion($goles_local);
            $gl=explode(',', $gl);
            if (count($gl)<3) { $goles_local=$gl[0]; }
            if (count($gl)==3 && $gl[1]=='') { $goles_local=$gl[0]; }
            if (count($gl)==3 && $gl[1]!='') { $goles_local=$gl[1]; }

            $gv=quitarFuncion($goles_visitante);
            $gv=explode(',', $gv);
            if (count($gv)<3) { $goles_visitante=$gv[0]; }
            if (count($gv)==3 && $gv[1]=='') { $goles_visitante=$gv[0]; } 
            if (count($gv)==3 && $gv[1]!='') { $goles_visitante=$gv[1]; } 

            $goles_local=(int)$goles_local;
            $goles_visitante=(int)$goles_visitante;
             ?>
            <textarea cols="100" rows="4"><?php echo $goles_local?></textarea>
             <textarea cols="100" rows="4"><?php echo $goles_visitante?></textarea>
            <?php */ 
            $estado_partido=1;
        } else {
            $goles_local=0;
            $goles_visitante=0; 
            $estado_partido=0;
        }
        
        $clasificado=0;
        $local=$value['local'];
        $cadena='(Clasificado)';
        $pos = strpos($local, $cadena);
        
        if ($pos !== false) {
            $clasificado=1;$local=str_replace($cadena, '', $local);
        } 
        $local=str_replace('&nbsp;', '', $local);
        $local=trim($local);

        $visitante=$value['visitante'];
        $pos = strpos($visitante, $cadena);
        if ($pos !== false) {
            $clasificado=2;$visitante=str_replace($cadena, '', $visitante);
        } 
        $visitante=str_replace('&nbsp;', '', $visitante);
        $visitante=trim($visitante);

        $observaciones='';
        if (isset($value['penaltis'])){
            $observaciones=$value['penaltis'][0];
        }

        $codigo_acta=0;
        if (isset($value['acta'])){
            $c_a=$value['acta'];
            if (strlen($c_a)>10){
                $c_a1=explode('&cod_acta=', $c_a);
                $codigo_acta=$c_a1[1]??0;
            }
        }

        $valorActa=array();
        $valorMasdatos=array();
        
        
        include ('partidoDatos.php'); 
        
    } 
} // final si hay partidos