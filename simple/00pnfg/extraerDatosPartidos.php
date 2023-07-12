<?php
        //buscamos el texto en el contenido.
$string = str_get_html($content);
$html->load($string);
$partidos=array();
$jornadasDat=array();



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

    if (isset($jornadasTorneo) && $jornadasTorneo!=$nJor) {
        echo '<h3 style="color:red">¡¡ No coinciden las jornadas !! Tenemos grabadas '.$jornadasTorneo.'</h3>';
    }

    if ($nJor==0){ unset($nJor); }
}


foreach($html->find('select#jornada') as $kt => $select)
    //echo $select->innertext . '<br>';
    foreach($select->find('option') as $e)
        $jornadasDat[]=$e->plaintext;
    

    foreach($html->find('div.tabla_rdg') as $kt => $tabla){

        //echo $tabla;
        //echo $tabla->innertext . '<br>';
        $partidos[$kt]['fecha'] = trim($tabla->find('span.textocolor',0)->plaintext);
        foreach($tabla->find('a') as $e)
            $partidos[$kt]['enlaces'][]=$e->href;
        

        foreach($tabla->find('span.resultado_cerrada') as $e)
            $partidos[$kt]['goles'][]=$e->innertext;
            $partidos[$kt]['local'][] = trim($tabla->find('td',0)->plaintext);
            $partidos[$kt]['visitante'][] = trim($tabla->find('td',4)->plaintext);
            $partidos[$kt]['penaltis'][] = trim($tabla->find('td',5)->plaintext);
            $partidos[$kt]['campo'][] = trim($tabla->find('td',8)->plaintext);
            $partidos[$kt]['arbitro'][] = trim($tabla->find('td',9)->plaintext);
    } // del html de los partidos de la jornada

//var_dump($partidos);
//imp($partidos);die;

$partidosJson=array();
if (count($partidos)>0){
    //imp($jornadas);
    if (isset($jda)){
        $nomJornada=$jornadasDat[$jda];
        $nombre_jornada=substr($nomJornada, 11,strlen($nomJornada)-11);
        $nombre_jornada=str_replace('(', '', $nombre_jornada);
        $nombre_jornada=str_replace(')', '', $nombre_jornada);
    } else {
        $jda=$jornada;
        $nombre_jornada='Jornada '.$jda;
    }
    foreach ($partidos as $key => $value) {
        //imp($value['enlaces']);
        //imp($value['goles']);
        if (!isset($value['local'])){ continue; }
        if (!isset($value['visitante'])){ continue; }
        $equipoLocal_id=$value['enlaces'][0];
        $equipoLocal_id=str_replace('NFG_VisEquipos?cod_primaria=1000119&Codigo_Equipo=', '', $equipoLocal_id);
        $equipoVisitante_id=$value['enlaces'][1]??0;
        $equipoVisitante_id=str_replace('NFG_VisEquipos?cod_primaria=1000119&Codigo_Equipo=', '', $equipoVisitante_id);
        $fecha=$value['fecha'];$fecha=str_replace('&nbsp;', '', $fecha);        
        if (strlen($fecha)<12) {                
            $hora_prevista='00:00:11';
        } else {
            $f=explode('- ', $fecha);
            $fecha=$f[0];
            $hora_prevista=$f[1];
            $hora_prevista.=':00';
        }
        $estado_partido=0;
        if (isset($value['goles'])){
            $goles_local=$value['goles'][0];
            $goles_visitante=$value['goles'][1]; 
            
            $gl=quitarFuncionEspecial($goles_local);
            $gl=explode(',', $gl);
            if (count($gl)<3) { $goles_local=$gl[0]; }
            if (count($gl)==3 && $gl[1]=='') { $goles_local=$gl[0]; }
            if (count($gl)==3 && $gl[1]!='') { $goles_local=$gl[1]; }

            $gv=quitarFuncionEspecial($goles_visitante);
            $gv=explode(',', $gv);
            if (count($gv)<3) { $goles_visitante=$gv[0]; }
            if (count($gv)==3 && $gv[1]=='') { $goles_visitante=$gv[0]; } 
            if (count($gv)==3 && $gv[1]!='') { $goles_visitante=$gv[1]; } 

            $goles_local=(int)$goles_local;
            $goles_visitante=(int)$goles_visitante;
            /* ?>
            <textarea cols="100" rows="4"><?php echo $goles_local?></textarea>
             <textarea cols="100" rows="4"><?php echo $goles_visitante?></textarea>
            <?php */ 
            $estado_partido=1;
        } else {
            $goles_local=0;
            $goles_visitante=0; 
            $estado_partido=0;
        }

        $d=substr($fecha,0,2);
        $m=substr($fecha,3,2);
        $a=substr($fecha,-4);
        $fecha=$a.'-'.$m.'-'.$d;            
        $hora_real=$hora_prevista;

        
        $clasificado=0;
        $local=$value['local'][0];
        $cadena='(Clasificado)';
        $pos = strpos($local, $cadena);
        
        if ($pos !== false) {
            $clasificado=1;$local=str_replace($cadena, '', $local);
        } 
        $local=str_replace('&nbsp;', '', $local);
        $local=trim($local);

        $visitante=$value['visitante'][0];
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
        if (isset($value['enlaces'][2])){
            $c_a=$value['enlaces'][2];
            if (strlen($c_a)>10){
                $c_a1=explode('&cod_acta=', $c_a);
                $codigo_acta=$c_a1[1]??0;
            }
        }

        $codigo_campo=0;
        if (isset($value['enlaces'][4])){
            if (substr($value['enlaces'][4], 0, 10)=='/pnfg/NPcd') {
                $c_c=$value['enlaces'][4];
            } else {
                $c_c=$value['enlaces'][5];
            }
            
            if (strlen($c_c)>10){
                $c_c1=explode('&Codigo_Campo=', $c_c);
                $codigo_campo=$c_c1[1];
            }
        }

        if ($codigo_campo>0){
            $estadio=$value['campo'][0];
            $estadio=str_replace('Campo: ', '', $estadio);
            $estadio=str_replace('&nbsp;', '', $estadio);            
        } else { $estadio=''; }

        if (isset($value['arbitro'])){
              $arbitro=$value['arbitro'][0];
              $arbitro=str_replace('&Aacute;rbitro: ', '', $arbitro);
              $arbitro=str_replace('&nbsp;', '', $arbitro); 
        } else { $arbitro=''; }  

        //echo '<br />'.$local.'-'.$visitante.'<hr />';  
        
        
        include ('partidoDatos.php');
    } 
} // final si hay partidos

 //que pasa con los descansa????
