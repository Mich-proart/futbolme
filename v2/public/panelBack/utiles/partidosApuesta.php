<?php 
define('_PANEL_', 1);
require_once '../includes/config.php';
include '../../../src/Application/Helpers/DbHelper.php';

$txt='Pronósticos futbolme.com - ';


$temporada_id=$_GET['temporada_id']??0;
$jornada=$_GET['jornada']??0;

$sql='SELECT id, estado_partido FROM partido WHERE temporada_id='.$temporada_id.' AND jornada='.$jornada.' AND fecha="'.date('Y-m-d').'" ORDER BY hora_prevista';
echo $sql.'<br />';
$resultadoSQL = mysqli_query($mysqli, $sql);
$partidos = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC); 

$lectura=array();

foreach ($partidos as $kp => $p_id) {

if ($p_id['estado_partido']==1) { continue; };

$partido_id=$p_id['id'];
$partido = Xpartido($partido_id);


$e1 = $partido['equipoLocal_id'];
$e2 = $partido['equipoVisitante_id'];
$et1 = $partido['local'];
$et2 = $partido['visitante'];
$liga = $partido['temporada_id'];


$rachas=array();

$datos=Xtipo($liga); 



$txt.=$datos['torneo']['nombre'].' - '.nombreDia($partido['fecha']).'<br /><br />';

$txt.=' Jornada '.$partido['jornada'].'. '.substr($partido['hora_prevista'],0,5).' '.$et1.' - '.$et2.'<br />';

//$f = '../../../json/temporada/'.$liga.'/tipo.json';
//$json = file_get_contents($f);
//$datos = json_decode($json, true);  


$clasificacion=$datos['clasificacion']['clasificacionFinal'];
foreach ($clasificacion as $key => $value) {
  if($value['equipo_id']==$e1){ $e1Clas=$value; break; }
}
$racha = Xracha($liga, $e1);


$rachas[$e1]=$racha[$e1];unset($racha);
$rachas[$e1]['equipo']=$et1;


$clasificacion=$datos['clasificacion']['clasificacionFinal'];
foreach ($clasificacion as $key => $value) {
  if($value['equipo_id']==$e2){ $e2Clas=$value; break; }
}

$racha = Xracha($liga, $e2);
$rachas[$e2]=$racha[$e2];unset($racha);
$rachas[$e2]['equipo']=$et2; ?>

<h3 class="text-center" style='display:none'><?php echo $et1?> <b><?php echo $partido['goles_local']?>-<?php echo $partido['goles_visitante']?></b> <?php echo $et2?> - Jornada <?php echo $partido['jornada']?></h3>

<?php for ($i = 0; $i < 2; ++$i) {
    $repera = array();
    if (0 == $i) {
        $racha = $rachas[$e1];$equipo_id = $e1;$equipotxt = $et1;
    } else { 
        $racha = $rachas[$e2];$equipo_id = $e2;$equipotxt = $et2;
    }

    if ($partido['estado_partido']==1){ $corte=($partido['jornada']-1); } else { $corte=$partido['jornada'];}

    /*imp($racha);
    imp($equipo_id);
    imp($equipotxt);*/

    $pts = 0; $gf = 0; $gc = 0; 

    $eGl = 0;$eEl = 0;$ePl = 0;$eGFl = 0;$eGCl = 0;
    $eGv = 0;$eEv = 0;$ePv = 0;$eGFv = 0;$eGCv = 0;
    $sinMeterL=0; $sinMeterV=0;

    $e_racha = explode(';', $racha['racha']);    
  
    foreach ($e_racha as $key => $v) {
        $value = explode(',', $v);

        //imp($value);
        if (!isset($value[1])) {continue;}
                
                if ($equipo_id == $value[6]) {
                      if ($value[4] == $value[5]) {
                          ++$eEl;
                      } elseif ($value[4] > $value[5]) {
                          ++$eGl;
                      } else {
                          ++$ePl;
                      }
                      $eGFl = $eGFl + $value[4];
                      $eGCl = $eGCl + $value[5];

                      $repera[$value[6]]['jornadas'][$value[1]][0]['GF'] = $value[4];
                      $repera[$value[6]]['jornadas'][$value[1]][0]['GC'] = $value[5];
                      $repera[$value[6]]['jornadas'][$value[1]][0]['PT'] = $value[9];
                  } else {

                      if ($value[4] == $value[5]) {
                          ++$eEv;
                      } elseif ($value[5] > $value[4]) {
                          ++$eGv;
                      } else {
                          ++$ePv;
                      }
                      $eGFv = $eGFv + $value[5];
                      $eGCv = $eGCv + $value[4];

                      $repera[$value[7]]['jornadas'][$value[1]][1]['GF'] = $value[5];
                      $repera[$value[7]]['jornadas'][$value[1]][1]['GC'] = $value[4];
                      $repera[$value[7]]['jornadas'][$value[1]][1]['PT'] = $value[9];
                  }

        if ($key==$corte){ break; }                   
        if ($equipo_id == $value[6]) {
            if ($value[4] == $value[5]) { ++$eEl;
            } elseif ($value[4] > $value[5]) { ++$eGl;
            } else { ++$ePl;}
            $eGFl = $eGFl + $value[4];$eGCl = $eGCl + $value[5];
            if ($value[4]==0) { $sinMeterL++; }
        } else {
            if ($value[4] == $value[5]) { ++$eEv;
            } elseif ($value[5] > $value[4]) { ++$eGv;
            } else { ++$ePv;}
            $eGFv = $eGFv + $value[5]; $eGCv = $eGCv + $value[4];
            if ($value[5]==0) { $sinMeterV++; }
        }
        if ($value[6] == $equipo_id) {$gf = $gf + $value[4];}
        if ($value[7] == $equipo_id) {$gf = $gf + $value[5];}
        if ($value[6] != $equipo_id) {$gc = $gc + $value[4];}
        if ($value[7] != $equipo_id) {$gc = $gc + $value[5];} 

        
    }

    $rachas[$equipo_id]['gLocal']=$eGl; 
    $rachas[$equipo_id]['eLocal']=$eEl; 
    $rachas[$equipo_id]['pLocal']=$ePl; 
    $rachas[$equipo_id]['gfLocal']=$eGFl; 
    $rachas[$equipo_id]['gcLocal']=$eGCl;
    $rachas[$equipo_id]['sinMeterL']=$sinMeterL;  

    $rachas[$equipo_id]['gVisitante']=$eGv; 
    $rachas[$equipo_id]['eVisitante']=$eEv; 
    $rachas[$equipo_id]['pVisitante']=$ePv; 
    $rachas[$equipo_id]['gfVisitante']=$eGFv; 
    $rachas[$equipo_id]['gcVisitante']=$eGCv;
    $rachas[$equipo_id]['sinMeterV']=$sinMeterV; 
    $rachas[$equipo_id]['jornadas']=$repera[$equipo_id]['jornadas']; 


/*echo 'eGl = '.$eGl.'<br />';
echo 'eEl = '.$eEl.'<br />';
echo 'ePl = '.$ePl.'<br />';
echo 'eGFl = '.$eGFl.'<br />';
echo 'eGCl = '.$eGCl.'<br />';
echo 'eGv = '.$eGv.'<br />';
echo 'eEv = '.$eEv.'<br />';
echo 'ePv = '.$ePv.'<br />';
echo 'eGFv = '.$eGFv.'<br />';
echo 'eGCv = '.$eGCv.'<br />';*/

?>

<table style="width: 700px" cellspacing="1" cellpadding="1" bgcolor="dimgray">
  <tr bgcolor="white"><td width="240"><?php echo $equipotxt?></td><td colspan="6">Local</td><td colspan="6">Visitante</td></tr>
  <tr bgcolor="gainsboro">
    <td></td><td>G</td><td>E</td><td>P</td><td>GF</td><td>GC</td><td>sM</td>
    <td>G</td><td>E</td><td>P</td><td>GF</td><td>GC</td><td>sM</td>
  </tr>
  <tr bgcolor="white">
    <td></td><td><?php echo $eGl?></td><td><?php echo $eEl?></td><td><?php echo $ePl?></td>
    <td><?php echo $eGFl?></td><td><?php echo $eGCl?></td><td><?php echo $sinMeterL?></td>
  
    <td><?php echo $eGv?></td><td><?php echo $eEv?></td><td><?php echo $ePv?></td>
    <td><?php echo $eGFv?></td><td><?php echo $eGCv?></td><td><?php echo $sinMeterV?></td>
  </tr>

</table>

<?php  
}

//require_once('ultimasJornadas.php'); //(quitado al poner puntosygoles)
    //imp($partido['jornada']);
    //imp($repera);


for ($i = 0; $i < 2; ++$i) { 

    if (0 == $i) {
        $racha = $rachas[$e1];
        $equipo_id = $e1;
        $equipotxt = $et1;
    } else {
        $racha = $rachas[$e2];
        $equipo_id = $e2;
        $equipotxt = $et2;
    }


$eGl=$racha['gLocal']; 
$eEl=$racha['eLocal']; 
$ePl=$racha['pLocal']; 
$eGFl=$racha['gfLocal']; 
$eGCl=$racha['gcLocal']; 

$eGv=$racha['gVisitante']; 
$eEv=$racha['eVisitante']; 
$ePv=$racha['pVisitante']; 
$eGFv=$racha['gfVisitante']; 
$eGCv=$racha['gcVisitante'];



$repera1=$racha['jornadas']??12;
$etX = $racha['equipo'];

$repera1l = array();
$repera1v = array();

foreach ($repera1 as $key => $value) {
    if (isset($value[0])) { $repera1l[$key] = $value[0]; } else { $repera1v[$key] = $value[1]; }
}



$gl = 0;$el = 0;$pl = 0;$gfl = 0;$gcl = 0;$jul = 0;
$gv = 0;$ev = 0;$pv = 0;$gfv = 0;$gcv = 0;$juv = 0;

$eXGl = 0;$eXEl = 0;$eXPl = 0;$eXGFl = 0;$eXGCl = 0;
$golf = 0;$golc = 0;$pMinl = 0;$gMinl = 0;

$eXGv = 0;$eXEv = 0;$eXPv = 0;$eXGFv = 0;$eXGCv = 0;
$govf = 0;$govc = 0;$pMinv = 0;$gMinv = 0;

foreach ($repera1l as $key => $value) {

    if (3 == $value['PT']) { ++$eXGl; }
    if (1 == $value['PT']) { ++$eXEl; }
    if (0 == $value['PT']) { ++$eXPl; }

    $eXGFl = $eXGFl + $value['GF'];
    $eXGCl = $eXGCl + $value['GC'];

    if ($value['GF'] > 0) { ++$golf; }
    if ($value['GC'] > 0) { ++$golc; }

    if ($value['GF'] - $value['GC'] == 1) { ++$gMinl; }
    if ($value['GC'] - $value['GF'] == 1) { ++$pMinl; }

    if ($key > (count($repera1) - 6)) {
        //imp($value);
        if (3 == $value['PT']) { ++$gl; }
        if (1 == $value['PT']) { ++$el; }
        if (0 == $value['PT']) { ++$pl; }
        $gfl = $gfl + $value['GF'];
        $gcl = $gcl + $value['GC'];
        ++$jul;
    }
}

    
foreach ($repera1v as $key => $value) {
    if (3 == $value['PT']) { ++$eXGv; }
    if (1 == $value['PT']) { ++$eXEv; }
    if (0 == $value['PT']) { ++$eXPv; }

    $eXGFv = $eXGFv + $value['GF'];
    $eXGCv = $eXGCv + $value['GC'];
    if ($value['GF'] > 0) { ++$govf;}
    if ($value['GC'] > 0) { ++$govc;}

    if ($value['GC'] - $value['GF'] == 1) { ++$pMinv; }
    if ($value['GF'] - $value['GC'] == 1) { ++$gMinv; }
    if ($key > (count($repera1) - 6)) { 
        //imp($value);      
        if (3 == $value['PT']) { ++$gv; }
        if (1 == $value['PT']) { ++$ev; }
        if (0 == $value['PT']) { ++$pv; }
        $gfv = $gfv + $value['GF'];
        $gcv = $gcv + $value['GC'];
        ++$juv;
    }
}

if (0 == $i) { ?>
<div class="col-xs-12 col-sm-6">

El <b><?php echo $equipotxt; ?></b>
<?php if (0 == $eGl && 0 == $eGv) {?>no ha ganado ningún partido, <?php } ?>
<?php if (1 == $eGl && 0 == $eGv) {?>solo ha ganado <b>1</b> partido en casa, <?php } ?>
<?php if (0 == $eGl && 1 == $eGv) {?>solo ha ganado <b>1</b> partido como visitante,<?php } ?>
<?php if (1 == $eGl && 1 == $eGv) {?>ha ganado <b>2</b> partidos, uno como local y otro como visitante, <?php } ?>
<?php if ($eGl > 1 && 0 == $eGv) {?>ha ganado <b><?php echo $eGl; ?></b> partidos, todos como local,<?php } ?>
<?php if (0 == $eGl && $eGv > 1) {?>ha ganado <b><?php echo $eGv; ?></b> partidos, todos como visitante, <?php } ?>
<?php if (1 == $eGl && $eGv > 1) {?>ha ganado <b>1</b> partido como local y <b><?php echo $eGv; ?></b> como visitante, <?php } ?>
<?php if ($eGl > 1 && 1 == $eGv) {?>ha ganado <b><?php echo $eGl; ?></b> partidos como local y <b>1</b> como visitante, <?php } ?>
<?php if ($eGl > 1 && $eGv > 1) {?>ha ganado <b><?php echo $eGl; ?></b> partidos como local y <b><?php echo $eGv; ?></b> como visitante, <?php } ?>
<?php if (0 == $eEl && 0 == $eEv) {?>no ha empatado ningún partido <?php } ?>
<?php if (1 == $eEl && 0 == $eEv) {?>ha empatado <b>1</b> partido en casa <?php } ?>
<?php if (0 == $eEl && 1 == $eEv) {?>solo ha empatado <b>1</b> partido como visitante <?php } ?>
<?php if (1 == $eEl && 1 == $eEv) {?>ha empatado <b>2</b> partidos, uno como local y otro como visitante <?php } ?>
<?php if ($eEl > 1 && 0 == $eEv) {?>ha empatado <b><?php echo $eEl; ?></b> partidos, todos como local <?php } ?>
<?php if (0 == $eEl && $eEv > 1) {?>ha empatado <b><?php echo $eEv; ?></b> partidos, todos como visitante <?php } ?>
<?php if (1 == $eEl && $eEv > 1) {?>ha empatado <b>1</b> partido como local y <b><?php echo $eEv; ?></b> como visitante <?php } ?>
<?php if ($eEl > 1 && 1 == $eEv) {?>ha empatado <b><?php echo $eEl; ?></b> partidos como local y <b>1</b> como visitante <?php } ?>
<?php if ($eEl > 1 && $eEv > 1) {?>ha empatado <b><?php echo $eEl; ?></b> partidos como local y <b><?php echo $eEv; ?></b> como visitante <?php } ?>
<?php if (0 == $ePl && 0 == $ePv) {?>y no ha perdido ningún partido. <?php } ?>
<?php if (1 == $ePl && 0 == $ePv) {?>y ha perdido <b>1</b> partido en casa. <?php } ?>
<?php if (0 == $ePl && 1 == $ePv) {?>y solo ha perdido <b>1</b> partido como visitante. <?php } ?>
<?php if (1 == $ePl && 1 == $ePv) {?>y ha perdido <b>2</b> partidos, uno como local y otro como visitante. <?php } ?>
<?php if ($ePl > 1 && 0 == $ePv) {?>y ha perdido <b><?php echo $ePl; ?></b> partidos, todos como local. <?php } ?>
<?php if (0 == $ePl && $ePv > 1) {?>y ha perdido <b><?php echo $ePv; ?></b> partidos, todos como visitante. <?php } ?>
<?php if (1 == $ePl && $ePv > 1) {?>y ha perdido <b>1</b> partido como local y <b><?php echo $ePv; ?></b> como visitante. <?php } ?>
<?php if ($ePl > 1 && 1 == $ePv) {?>y ha perdido <b><?php echo $ePl; ?></b> partidos como local y <b>1</b> como visitante. <?php } ?>
<?php if ($ePl > 1 && $ePv > 1) {?>y ha perdido <b><?php echo $ePl; ?></b> partidos como local y <b><?php echo $ePv; ?></b> como visitante. <?php } ?>
<br />Respecto a goles, ha metido <b><?php echo $eGFl; ?></b> goles en casa y <b><?php echo $eGFv; ?></b> fuera. 
Por contra ha encajado <b><?php echo $eGCl; ?></b> goles en casa y <b><?php echo $eGCv; ?></b> goles fuera.
<hr />

<br />En liga, el <?php echo $etX; ?> ha jugado <b><?php echo count($repera1l); ?> partidos como local</b>.
<?php if ($eXGl > 0) {?><br />Ha ganado <?php echo $eXGl; ?>
  <?php if ($gMinl > 0) {?>&nbsp;(<?php if ($gMinl == $eXGl) { echo 'los ';} echo $gMinl; ?> por la mínima).<?php }?>
<?php } else { ?>
  <br />Todavía no ha ganado ningún partido.
<?php } ?>

<br />Ha empatado <?php echo $eXEl; ?>.

<?php if (0 == $eXPl) { ?>
<br />Todavía no ha perdido ningún partido.
<?php } else {?>
<br />Ha perdido <?php echo $eXPl; ?>
<?php } ?>
<?php if ($pMinl > 0) {?>&nbsp;(<?php if ($pMinl == $eXPl) { echo 'los ';} echo $pMinl; ?> por la mínima). <?php } ?>

<br />Ha metido <?php echo $eXGFl; ?> goles,consiguiendo marcar 
<?php if ($golf == count($repera1l)) {?>
en todos los partidos.
<?php } else {?>
algún gol en <?php echo $golf; ?> partidos.
dejándolo de hacer en <?php echo count($repera1l) - $golf; ?> de ellos.
<?php } ?>

<br />Ha encajado <?php echo $eXGCl; ?> goles, recibiendo algún gol en <?php echo $golc; ?> partidos.
Ha mantenido su puerta a cero en <?php echo count($repera1l) - $golc; ?> partidos.
<?php
}


if (1 == $i) {
        ?>
<div class="col-xs-12 col-sm-6">


El <b><?php echo $equipotxt; ?></b>
<?php if (0 == $eGl && 0 == $eGv) {?>no ha ganado ningún partido, <?php } ?>
<?php if (1 == $eGl && 0 == $eGv) {?>solo ha ganado <b>1</b> partido en casa, <?php } ?>
<?php if (0 == $eGl && 1 == $eGv) {?>solo ha ganado <b>1</b> partido como visitante,<?php } ?>
<?php if (1 == $eGl && 1 == $eGv) {?>ha ganado <b>2</b> partidos, uno como local y otro como visitante, <?php } ?>
<?php if ($eGl > 1 && 0 == $eGv) {?>ha ganado <b><?php echo $eGl; ?></b> partidos, todos como local,<?php } ?>
<?php if (0 == $eGl && $eGv > 1) {?>ha ganado <b><?php echo $eGv; ?></b> partidos, todos como visitante, <?php } ?>
<?php if (1 == $eGl && $eGv > 1) {?>ha ganado <b>1</b> partido como local y <b><?php echo $eGv; ?></b> como visitante, <?php } ?>
<?php if ($eGl > 1 && 1 == $eGv) {?>ha ganado <b><?php echo $eGl; ?></b> partidos como local y <b>1</b> como visitante, <?php } ?>
<?php if ($eGl > 1 && $eGv > 1) {?>ha ganado <b><?php echo $eGl; ?></b> partidos como local y <b><?php echo $eGv; ?></b> como visitante, <?php } ?>
<?php if (0 == $eEl && 0 == $eEv) {?>no ha empatado ningún partido <?php } ?>
<?php if (1 == $eEl && 0 == $eEv) {?>ha empatado <b>1</b> partido en casa <?php } ?>
<?php if (0 == $eEl && 1 == $eEv) {?>solo ha empatado <b>1</b> partido como visitante<?php } ?>
<?php if (1 == $eEl && 1 == $eEv) {?>ha empatado <b>2</b> partidos, uno como local y otro como visitante <?php } ?>
<?php if ($eEl > 1 && 0 == $eEv) {?>ha empatado <b><?php echo $eEl; ?></b> partidos, todos como local <?php } ?>
<?php if (0 == $eEl && $eEv > 1) {?>ha empatado <b><?php echo $eEv; ?></b> partidos, todos como visitante <?php } ?>
<?php if (1 == $eEl && $eEv > 1) {?>ha empatado <b>1</b> partido como local y <b><?php echo $eEv; ?></b> como visitante <?php } ?>
<?php if ($eEl > 1 && 1 == $eEv) {?>ha empatado <b><?php echo $eEl; ?></b> partidos como local y <b>1</b> como visitante <?php } ?>
<?php if ($eEl > 1 && $eEv > 1) {?>ha empatado <b><?php echo $eEl; ?></b> partidos como local y <b><?php echo $eEv; ?></b> como visitante <?php } ?>
<?php if (0 == $ePl && 0 == $ePv) {?>y no ha perdido ningún partido. <?php } ?>
<?php if (1 == $ePl && 0 == $ePv) {?>y ha perdido <b>1</b> partido en casa. <?php } ?>
<?php if (0 == $ePl && 1 == $ePv) {?>y solo ha perdido <b>1</b> partido como visitante. <?php } ?>
<?php if (1 == $ePl && 1 == $ePv) {?>y ha perdido <b>2</b> partidos, uno como local y otro como visitante. <?php } ?>
<?php if ($ePl > 1 && 0 == $ePv) {?>y ha perdido <b><?php echo $ePl; ?></b> partidos, todos como local. <?php } ?>
<?php if (0 == $ePl && $ePv > 1) {?>y ha perdido <b><?php echo $ePv; ?></b> partidos, todos como visitante. <?php } ?>
<?php if (1 == $ePl && $ePv > 1) {?>y ha perdido <b>1</b> partido como local y <b><?php echo $ePv; ?></b> como visitante. <?php } ?>
<?php if ($ePl > 1 && 1 == $ePv) {?>y ha perdido <b><?php echo $ePl; ?></b> partidos como local y <b>1</b> como visitante. <?php } ?>
<?php if ($ePl > 1 && $ePv > 1) {?>y ha perdido <b><?php echo $ePl; ?></b> partidos como local y <b><?php echo $ePv; ?></b> como visitante. <?php } ?>
<br />Respecto a goles, ha metido <b><?php echo $eGFl; ?></b> goles en casa y <b><?php echo $eGFv; ?></b> fuera. 
Por contra ha encajado <b><?php echo $eGCl; ?></b> goles en casa y <b><?php echo $eGCv; ?></b> goles fuera.
<hr />



<br />En liga, el <?php echo $etX; ?> ha jugado <b><?php echo count($repera1v); ?> partidos como visitante.</b>
<?php if ($eXGv > 0) { ?>
  <br />Ha ganado <?php echo $eXGv; ?>
  <?php if ($gMinv > 0) {?>&nbsp;(<?php if ($gMinv == $eXGv) { echo 'los '; } echo $gMinv; ?> por la mínima).<?php } ?>
<?php } else { ?>
  <br />Todavía no ha ganado ningún partido.
<?php } ?>

<br />Ha empatado <?php echo $eXEv; ?>.

<br />Ha perdido <?php echo $eXPv; ?>
<?php if ($pMinv > 0) { ?>&nbsp;(<?php if ($pMinv == $eXPv) { echo 'los ';}echo $pMinv; ?> por la mínima).<?php } ?>

<br />Ha metido <?php echo $eXGFv; ?> goles, consiguiendo marcar algún gol en <?php echo $govf; ?> partidos.
dejándolo de hacer en <?php echo count($repera1v) - $govf; ?> de ellos.

<br />Ha encajado <?php echo $eXGCv; ?> goles, recibiendo algún gol en <?php echo $govc; ?> partidos.
Ha mantenido su puerta a cero en <?php echo count($repera1v) - $govc; ?> partidos.
<?php 
} 
?>

<table class="table table-bordered table-condensed whitebox nomargin txt11 text-center" style="border: 1px solid #000; ">

<tr>
    <td colspan="7"><?php if (0 == $i) { echo 'Local'; } else { echo 'Visitante'; } ?></td>
       
</tr>
<tr>
    <td colspan="3">Toda la temporada</td>
    <td colspan="2">Ultimas 6 jornadas como <?php if (0 == $i) { echo 'local'; } else { echo 'visitante'; } ?></td>
    <td colspan="2">Ultimas 6 jornadas del calendario</td>   
</tr>

<?php

if (0 == $i) { 
    $gg1 = $gl;$gg2 = $gv;$yG = $eXGl;$cc = count($repera1l);$ju = $jul;
} else {
    $gg1 = $gv;$gg2 = $gl;$yG = $eXGv;$cc = count($repera1v);$ju = $juv;
}
    
    if ($yG > 0) {$percentG = ($yG * 100) / $cc;}
    if ($gg1 > 0) {$percentGa = ($gg1 * 100) / $ju;}
    if (($gg1 + $gg2) > 0) {$percentGb = (($gg1 + $gg2) * 100) / 6;}
    if (!isset($percentGa)) {$percentGa = 0;}
    if (!isset($percentEa)) {$percentEa = 0;}
    if (!isset($percentPa)) {$percentPa = 0;}
    if (!isset($percentGFa)) {$percentGFa = 0;}
    if (!isset($percentGFb)) {$percentGFb = 0;}
    if (!isset($percentGCa)) {$percentGCa = 0;}
    if (!isset($percentGCb)) {$percentGCb = 0;}
    if (!isset($percentEb)) {$percentEb = 0;}
    if (!isset($percentGb)) {$percentGb = 0;}
    if (!isset($percentPb)) {$percentPb = 0;}

    if (isset($percentG)) {?>
    <tr style="border: 2px solid green;">
        <td>G</td>
        <td style="background-color:#81F79F"><?php echo $yG; ?></td>
        <td style="background-color:#81F79F"><?php echo number_format(($percentG), 2); ?></td>
        <td style="background-color:#F5D0A9"><?php echo $gg1; ?></td>
        <td style="background-color:#F5D0A9"><?php echo number_format(($percentGa), 2); ?></td>
        <td style="background-color:#CEE3F6"><?php echo $gg1 + $gg2; ?></td>
        <td style="background-color:#CEE3F6"><?php echo number_format(($percentGb), 2); ?></td>
    </tr>
    <?php    }

if (0 == $i) {
    $ee1 = $el;$ee2 = $ev;$yE = $eXEl;
} else {
    $ee1 = $ev;$ee2 = $el;$yE = $eXEv;
}
    if ($yE > 0) {$percentE = ($yE * 100) / $cc;}
    if ($ee1 > 0) {$percentEa = ($ee1 * 100) / $ju;}
    if (($ee1 + $ee2) > 0) {$percentEb = (($ee1 + $ee2) * 100) / 6;}
    //hay que poner
    if (isset($percentE)) {?>
    <tr style="border: 2px solid orange;">
        <td>E</td>
        <td style="background-color:#81F79F"><?php echo $yE; ?></td>
        <td style="background-color:#81F79F"><?php echo number_format(($percentE), 2); ?></td>
        <td style="background-color:#F5D0A9"><?php echo $ee1; ?></td>
        <td style="background-color:#F5D0A9"><?php echo number_format(($percentEa), 2); ?></td>
        <td style="background-color:#CEE3F6"><?php echo $ee1 + $ee2; ?></td>
        <td style="background-color:#CEE3F6"><?php echo number_format(($percentEb), 2); ?></td>
    </tr>
    <?php }

if (0 == $i) {
    $pp1 = $pl;$pp2 = $pv;$yP = $eXPl;
} else {
    $pp1 = $pv;$pp2 = $pl;$yP = $eXPv;
}
    if ($yP > 0) { $percentP = ($yP * 100) / $cc; }
    if ($pp1 > 0) { $percentPa = ($pp1 * 100) / $ju; }
    if (($pp1 + $pp2) > 0) { $percentPb = (($pp1 + $pp2) * 100) / 6; }
    
    if (isset($percentP)) { ?>
    <tr style="border: 2px solid red;">
        <td>P</td>
        <td style="background-color:#81F79F"><?php echo $yP; ?></td>
        <td style="background-color:#81F79F"><?php echo number_format(($percentP), 2); ?></td>
        <td style="background-color:#F5D0A9"><?php echo $pp1; ?></td>
        <td style="background-color:#F5D0A9"><?php echo number_format(($percentPa), 2); ?></td>
        <td style="background-color:#CEE3F6"><?php echo $pp1 + $pp2; ?></td>
        <td style="background-color:#CEE3F6"><?php echo number_format(($percentPb), 2); ?></td>
    </tr>
    <?php }

if (0 == $i) {
    $ggf1 = $gfl;$ggf2 = $gfv;$yGF = $eXGFl;
} else {
    $ggf1 = $gfv;$ggf2 = $gfl;$yGF = $eXGFv;
}
    if ($yGF > 0) { $percentGF = $yGF / $cc;}
    if ($ggf1 > 0) { $percentGFa = $ggf1 / $ju; }
    if (($ggf1 + $ggf2) > 0) { $percentGFb = (($ggf1 + $ggf2) / 6); }

    if (isset($percentGF)) { ?>
    <tr style="border: 2px solid navy;">
        <td>GF</td>
        <td style="background-color:#81F79F"><?php echo $yGF; ?></td>
        <td style="background-color:#81F79F"><?php echo number_format($percentGF, 2); ?></td>
        <td style="background-color:#F5D0A9"><?php echo $ggf1; ?></td>
        <td style="background-color:#F5D0A9"><?php echo number_format($percentGFa, 2); ?></td>
        <td style="background-color:#CEE3F6"><?php echo $ggf1 + $ggf2; ?></td>
        <td style="background-color:#CEE3F6"><?php echo number_format($percentGFb, 2); ?></td>
    </tr>
    <?php }

if (0 == $i) {
    $ggc1 = $gcl;$ggc2 = $gcv;$yGC = $eXGCl;
} else {
    $ggc1 = $gcv;$ggc2 = $gcl;$yGC = $eXGCv;
}
    if ($yGC > 0) { $percentGC = $yGC / $cc; }
    if ($ggc1 > 0) { $percentGCa = $ggc1 / $ju; }
    if (($ggc1 + $ggc2) > 0) { $percentGCb = (($ggc1 + $ggc2) / 6); }

    if (isset($percentGC)) {  ?>
    <tr style="border: 2px solid black;">
        <td>GC</td>
        <td style="background-color:#81F79F"><?php echo $yGC; ?></td>
        <td style="background-color:#81F79F"><?php echo number_format($percentGC, 2); ?></td>
        <td style="background-color:#F5D0A9"><?php echo $ggc1; ?></td>
        <td style="background-color:#F5D0A9"><?php echo number_format($percentGCa, 2); ?></td>
        <td style="background-color:#CEE3F6"><?php echo $ggc1 + $ggc2; ?></td>
        <td style="background-color:#CEE3F6"><?php echo number_format($percentGCb, 2); ?></td>
    </tr>
    <?php }

    if (($yG + $yE + $yP) > 0) {  ?>
    <tr style="border: 2px solid dimgray;">
        <td>PTS</td>
        <td style="background-color:#81F79F"><?php echo($yG * 3) + $yE; ?></td>
        <td style="background-color:#81F79F"><?php echo number_format((($yG * 3) + $yE) / $cc, 2); ?></td>
        <td style="background-color:#F5D0A9"><?php echo($gg1 * 3) + $ee1; ?></td>
        <td style="background-color:#F5D0A9"><?php echo number_format((($gg1 * 3) + $ee1) / $ju, 2); ?></td>
        <td style="background-color:#CEE3F6"><?php echo(($gg1 + $gg2) * 3) + $ee1 + $ee2; ?></td>
        <td style="background-color:#CEE3F6"><?php echo number_format(((($gg1 + $gg2) * 3) + $ee1 + $ee2) / 6, 2); ?></td>
    </tr>
    <?php } ?>
</table>


<?php 
 


if (!isset($percentG)) {$percentG = 0;}
if (!isset($percentE)) {$percentE = 0;}
if (!isset($percentP)) {$percentP = 0;}
if (!isset($percentGF)) {$percentGF = 0;}
if (!isset($percentGC)) {$percentGC = 0;}

if (isset($percentG)) {
    if ($percentG > $percentE && $percentG > $percentP) {
        $percentT = $percentG;
        $TitPercent = number_format($percentT, 2).'% de ganar';
        $modelo = 1;
    }

    if ($percentE > $percentG && $percentE > $percentP) {
        $percentT = $percentE;
        $TitPercent = number_format($percentT, 2).'% de empatar';
        $modelo = 2;
    }

    if ($percentP > $percentE && $percentP > $percentG) {
        $percentT = $percentP;
        $TitPercent = number_format($percentT, 2).'% de perder';
        $modelo = 3;
    }

    if ($percentG == $percentE && $percentE > $percentP) {
        $percentT = $percentG;
        $TitPercent = number_format($percentT, 2).'% de ganar o empatar';
        $modelo = 4;
    }

    if ($percentE == $percentP && $percentE > $percentG) {
        $percentT = $percentE;
        $TitPercent = number_format($percentT, 2).'% de empatar o perder';
        $modelo = 5;
    }

    if ($percentG == $percentP && $percentG > $percentE) {
        $percentT = $percentG;
        $TitPercent = number_format($percentT, 2).'% de posibilidades de ganar o perder';
        $modelo = 6;
    }

    if ($percentG == $percentP && $percentP == $percentE) {
        $percentT = $percentG;
        $TitPercent = number_format($percentT, 2).'% cualquier resultado es posible';
        $modelo = 7;
    }



    $pronosticoFM[$i]['todos']['valor'] = number_format($percentT, 2);
    $pronosticoFM[$i]['todos']['modelo'] = $modelo;
    $pronosticoFM[$i]['todos']['gf'] = number_format($percentGF, 2);
    $pronosticoFM[$i]['todos']['gc'] = number_format($percentGC, 2);
    $pronosticoFM[$i]['todos']['ganadosLocal'] = $racha['gLocal'];
    $pronosticoFM[$i]['todos']['empatadosLocal'] = $racha['eLocal'];
    $pronosticoFM[$i]['todos']['perdidosLocal'] = $racha['pLocal'];
    $pronosticoFM[$i]['todos']['ganadosVis'] = $racha['gVisitante'];
    $pronosticoFM[$i]['todos']['empatadosVis'] = $racha['eVisitante'];
    $pronosticoFM[$i]['todos']['perdidosVis'] = $racha['pVisitante'];

    if ((($yG * 3) + $yE) > 0) {
        $pronosticoFM[$i]['todos']['ptos'] = number_format((($yG * 3) + $yE) / $cc, 2);
    } else {
        $pronosticoFM[$i]['todos']['ptos'] = 0;
    }

    echo '<div  class="marco" style="background-color:#81F79F;"';
    if (0 == $i) {
        echo '<h6>Contando todos los resultados como local desde el inicio de la liga</h6>';
        $txt.='<br />El <b>'.$equipotxt.'</b>, contando todos los resultados como local desde el inicio de la liga, tiene el ';
    } else {
        echo '<h6>Contando todos los resultados como visitante desde el inicio de la liga</h6>';
        $txt.='<br />El <b>'.$equipotxt.'</b>, contando todos los resultados como visitante desde el inicio de la liga, tiene el ';
    }
    echo '<b>'.$TitPercent.'</b>';
    $txt.='<br /><b>'.$TitPercent.'</b><br /><br />';

    echo '<br />Goles a favor: '.number_format($percentGF, 2).'<br />Goles en contra: '.number_format($percentGC, 2);
    echo '<br />Ha conseguido '.(($yG * 3) + $yE).' puntos sobre '.($cc * 3).' posibles, lo que da una proporción de '.number_format($pronosticoFM[$i]['todos']['ptos'],2).' puntos por partido.';
    echo '</div>';
}

$percentT = 0;$percentG = 0;$percentE = 0;$percentP = 0;$TitPercent = '';
$percentGF = 0;$percentGC = 0;$modelo = 0;

    if (isset($percentGa)) {
        if ($percentGa > $percentEa && $percentGa > $percentPa) {
            $percentTa = $percentGa;
            $TitPercenta = number_format($percentTa, 2).'% de ganar';
            $modelo = 1;
        }
        if ($percentEa > $percentGa && $percentEa > $percentPa) {
            $percentTa = $percentEa;
            $TitPercenta = number_format($percentTa, 2).'% de empatar';
            $modelo = 2;
        }
        if ($percentPa > $percentEa && $percentPa > $percentGa) {
            $percentTa = $percentPa;
            $TitPercenta = number_format($percentTa, 2).'% de perder';
            $modelo = 3;
        }
        if ($percentGa == $percentEa && $percentEa > $percentPa) {
            $percentTa = $percentGa;
            $TitPercenta = number_format($percentTa, 2).'% de ganar o empatar';
            $modelo = 4;
        }
        if ($percentEa == $percentPa && $percentEa > $percentGa) {
            $percentTa = $percentEa;
            $TitPercenta = number_format($percentTa, 2).'% de empatar o perder';
            $modelo = 5;
        }
        if ($percentGa == $percentPa && $percentGa > $percentEa) {
            $percentTa = $percentGa;
            $TitPercenta = number_format($percentTa, 2).'% de posibilidades de ganar o perder';
            $modelo = 6;
        }
        if ($percentGa == $percentPa && $percentPa == $percentEa) {
            $percentTa = $percentGa;
            $TitPercenta = number_format($percentTa, 2).'% cualquier resultado es posible';
            $modelo = 7;
        }

        $pronosticoFM[$i]['6local']['valor'] = number_format($percentTa, 2);
        $pronosticoFM[$i]['6local']['modelo'] = $modelo;
        $pronosticoFM[$i]['6local']['gf'] = number_format($percentGFa, 2);
        $pronosticoFM[$i]['6local']['gc'] = number_format($percentGCa, 2);
        if ((($gg1 * 3) + $ee1) > 0) {
            $pronosticoFM[$i]['6local']['ptos'] = number_format((($gg1 * 3) + $ee1) / $ju, 2);
        } else {
            $pronosticoFM[$i]['6local']['ptos'] = 0;
        }
        echo '<div   class="marco" style="background-color:#F5D0A9;"';
        if (0 == $i) {
            echo '<h6>Contando los resultados como local en las últimas 6 jornadas <b>('.$ju.' partidos)</b></h6>';
            $txt.='Contando los resultados como local en las últimas 6 jornadas <b>('.$ju.' partidos)</b> tiene el ';
        } else {
            echo '<h6>Contando los resultados como visitante en las últimas 6 jornadas <b>('.$ju.' partidos)</b></h6>';
            $txt.='Contando los resultados como visitante en las últimas 6 jornadas <b>('.$ju.' partidos)</b> tiene el ';
        }
        echo '<br /><b>'.$TitPercenta.'</b>';
        $txt.='<b>'.$TitPercenta.'</b><br /><br />';
        echo '<br />Goles a favor: '.number_format($percentGFa, 2).'<br />Goles en contra: '.number_format($percentGCa, 2);
        echo '<br />Ha conseguido '.(($gg1 * 3) + $ee1).' puntos sobre '.($ju * 3).' posibles, lo que da una proporción de '.number_format($pronosticoFM[$i]['6local']['ptos'],2).' puntos por partido.';
        echo '</div>';
    }

    $percentTa = 0;$percentGa = 0; $percentEa = 0;$percentPa = 0;$TitPercenta = '';
    $percentGFa = 0;$percentGCa = 0;$modelo = 0;

    if (!isset($percentEb)) {$percentEb = 0;}
    if (!isset($percentPb)) {$percentPb = 0;}
    if (!isset($percentGFb)) {$percentGFb = 0;}
    if (!isset($percentGCb)) {$percentGCb = 0;}

    if (isset($percentGb)) {
        if ($percentGb > $percentEb && $percentGb > $percentPb) {
            $percentTb = $percentGb;
            $TitPercentb = number_format($percentTb, 2).'% de ganar';
            $modelo = 1;
        }
        if ($percentEb > $percentGb && $percentEb > $percentPb) {
            $percentTb = $percentEb;
            $TitPercentb = number_format($percentTb, 2).'% de empatar';
            $modelo = 2;
        }
        if ($percentPb > $percentEb && $percentPb > $percentGb) {
            $percentTb = $percentPb;
            $TitPercentb = number_format($percentTb, 2).'% de perder';
            $modelo = 3;
        }
        if ($percentGb == $percentEb && $percentEb > $percentPb) {
            $percentTb = $percentGb;
            $TitPercentb = number_format($percentTb, 2).'% de ganar o empatar';
            $modelo = 4;
        }
        if ($percentEb == $percentPb && $percentEb > $percentGb) {
            $percentTb = $percentEb;
            $TitPercentb = number_format($percentTb, 2).'% de empatar o perder';
            $modelo = 5;
        }
        if ($percentGb == $percentPb && $percentGb > $percentEb) {
            $percentTb = $percentGb;
            $TitPercentb = number_format($percentTb, 2).'% de posibilidades de ganar o perder';
            $modelo = 6;
        }
        if ($percentGb == $percentPb && $percentPb == $percentEb) {
            $percentTb = $percentGb;
            $TitPercentb = number_format($percentTb, 2).'% cualquier resultado es posible';
            $modelo = 7;
        }

        $pronosticoFM[$i]['6todos']['valor'] = number_format($percentTb, 2);
        $pronosticoFM[$i]['6todos']['modelo'] = $modelo;
        $pronosticoFM[$i]['6todos']['gf'] = number_format($percentGFb, 2);
        $pronosticoFM[$i]['6todos']['gc'] = number_format($percentGCb, 2);
        $pronosticoFM[$i]['6todos']['ptos'] = number_format(((($gg1 + $gg2) * 3) + ($ee1 + $ee1)) / 6, 2);

        echo '<div   class="marco" style="background-color:#CEE3F6"';
        
        echo '<h6>Contando todos los resultados de las últimas 6 jornadas</h6>';
        $txt.= 'y si contamos con todos los resultados de las últimas 6 jornadas, tiene el ';
        
        echo '<br /><b>'.$TitPercentb.'</b>';
        $txt.='<b>'.$TitPercentb.'</b><br /><br />';
        echo '<br />Goles a favor: '.number_format($percentGFb, 2).'<br />Goles en contra: '.number_format($percentGCb, 2);
        echo '<br />Ha conseguido '.((($gg1 + $gg2) * 3) + $ee1 + $ee2).' puntos sobre '.(6 * 3).' posibles, lo que da una proporción de '.number_format(((($gg1 + $gg2) * 3) + $ee1 + $ee2) / 6, 2).' puntos por partido.';
        echo '</div>';
    }

    $percentTb = 0;$percentGb = 0;$percentEb = 0;$percentPb = 0;$TitPercentb = '';
    $percentGFb = 0;$percentGCb = 0;$modelo = 0;     ?>
</div>

<?php 

} 

$txt.='<br /><br />Puedes ver todos los detalles de este pronóstico <b><a href="'.generaUrl('partido', $partido_id).'">Aquí</a></b>'; 

$gLocal=0;$eLocal=0;$pLocal=0;
$gVisitante=0;$eVisitante=0;$pVisitante=0;

$seguro=(1.5);
$duda=(0.7);
$incierto=(0.3);

$glCruzado=0;$gvCruzado=0;
$gl6aCruzado=0;$gv6aCruzado=0;

?>


<table class="table table-bordered table-condensed whitebox nomargin txt11 text-center" style="border: 1px solid #000;">
    <tr><td></td><td>---</td><td>Valor</td><td>Pronostico</td><td>Modelo</td><td>G</td><td>E</td><td>P</td><td>GF</td><td>GC</td><td>PTOS</td></tr>
    <?php foreach ($pronosticoFM[0] as $k => $v) { 
    $m=$v['modelo'];
    //imp($v);
    $bonos=0; 
    if ($k=='6local'){ $bonos=(0.20); } 
    if ($k=='todos' && $v['gf']<$v['gc']){ $gLocal=(-0.40); } 

    if ($k=='todos'){$glCruzado=$v['gf'];$gvCruzado=$v['gc'];} 
    if ($k=='6todos'){$gl6aCruzado=$v['gf'];$gv6aCruzado=$v['gc'];} 


    if ($k=='todos' && ($v['ganadosLocal']+$v['empatadosLocal'])<$v['perdidosLocal']){ $gLocal=$gLocal+(-0.40); } 


    $ganadosLocal=-1; $ganadosVisitante=-1;$empatadosLocal=-1; $empatadosVisitante=-1;$perdidosLocal=-1; $perdidosVisitante=-1;
    if ($k=='todos'){ 
        $ganadosLocal=$v['ganadosLocal']; $ganadosVisitante=$v['ganadosVis'];$empatadosLocal=$v['empatadosLocal']; 
        $empatadosVisitante=$v['empatadosVis'];$perdidosLocal=$v['perdidosLocal']; $perdidosVisitante=$v['perdidosVis']; 
    } 
    if ($m==1){ $gLocal=$gLocal+$seguro+$bonos; }
    if ($m==2){ $eLocal=$eLocal+$seguro+$bonos; }
    if ($m==3){ $pLocal=$pLocal+$seguro+$bonos; }
    if ($m==4){ $gLocal=$gLocal+$duda; $eLocal=$eLocal+$duda; }
    if ($m==5){ $eLocal=$eLocal+$duda; $pLocal=$pLocal+$duda; }
    if ($m==6){ $gLocal=$gLocal+$duda; $pLocal=$pLocal+$duda; }
    if ($m==7){ $gLocal=$gLocal+$incierto; $eLocal=$eLocal+$incierto; $pLocal=$pLocal+$incierto; }
    ?>
    <tr><td>Local</td><td><?php echo $k?></td><td><?php echo $v['valor']?></td><td><?php echo modelo($m)?></td><td><?php echo $m?></td>
        <td style="border: 1px solid #000;"><?php echo $ganadosLocal?> / <?php echo $ganadosVisitante?></td>
        <td style="border: 1px solid #000;"><?php echo $empatadosLocal?> / <?php echo $empatadosVisitante?></td>
        <td style="border: 1px solid #000;"><?php echo $perdidosLocal?> / <?php echo $perdidosVisitante?></td>
        <td style="border: 1px solid #000;"><?php echo $v['gf']?></td><td><?php echo $v['gc']?></td><td><?php echo $v['ptos']?></td></tr>       
    <?php } ?>
    <?php foreach ($pronosticoFM[1] as $k => $v) { 
        $m=$v['modelo'];
        $bonos=0;
        if ($k=='6local'){ $bonos=(0.20); } 
        if ($k=='todos' && $v['gf']>$v['gc']){ $gVisitante=(0.40);} 
        if ($k=='todos'){ $glCruzado=$glCruzado+$v['gc'];$gvCruzado=$gvCruzado+$v['gf'];} 
        if ($k=='6todos'){ $gl6aCruzado=$gl6aCruzado+$v['gc'];$gv6aCruzado=$gv6aCruzado+$v['gf'];} 


        if ($k=='todos' && ($v['perdidosVis']+$v['empatadosVis'])<$v['ganadosVis']){ $gLocal=$gLocal+(0.40); } 

        $ganadosLocal=-1; $ganadosVisitante=-1;$empatadosLocal=-1; $empatadosVisitante=-1;$perdidosLocal=-1; $perdidosVisitante=-1;
        if ($k=='todos'){ 
            $ganadosLocal=$v['ganadosLocal']; $ganadosVisitante=$v['ganadosVis'];$empatadosLocal=$v['empatadosLocal']; 
            $empatadosVisitante=$v['empatadosVis'];$perdidosLocal=$v['perdidosLocal']; $perdidosVisitante=$v['perdidosVis']; 
        } 
        if ($m==1){ $gVisitante=$gVisitante+$seguro+$bonos; }
        if ($m==2){ $eVisitante=$eVisitante+$seguro+$bonos; }
        if ($m==3){ $pVisitante=$pVisitante+$seguro+$bonos; }
        if ($m==4){ $gVisitante=$gVisitante+$duda; $eVisitante=$eVisitante+$duda; }
        if ($m==5){ $eVisitante=$eVisitante+$duda; $pVisitante=$pVisitante+$duda; }
        if ($m==6){ $gVisitante=$gVisitante+$duda; $pVisitante=$pVisitante+$duda; }
        if ($m==7){ $gVisitante=$gVisitante+$incierto; $eVisitante=$eVisitante+$incierto; $pVisitante=$pVisitante+$incierto; }
        ?>
    <tr><td>Visit</td><td><?php echo $k?></td><td><?php echo $v['valor']?></td><td><?php echo modelo($m)?></td><td><?php echo $m?></td>
        <td style="border: 1px solid #000;"><?php echo $ganadosLocal?> / <?php echo $ganadosVisitante?></td>
        <td style="border: 1px solid #000;"><?php echo $empatadosLocal?> / <?php echo $empatadosVisitante?></td>
        <td style="border: 1px solid #000;"><?php echo $perdidosLocal?> / <?php echo $perdidosVisitante?></td>
        <td style="border: 1px solid #000;"><?php echo $v['gf']?></td><td><?php echo $v['gc']?></td><td><?php echo $v['ptos']?></td></tr>       
    <?php } ?>


</table>


<div style="clear:both"></div>
<div class="marco text-center" style="padding:20px;">
<div class="marco text-center" style="float: left; width: 100%">
    <div style="float: left;">Puntos para el 1 - <b><?php echo $gLocal+$pVisitante?></b> - </div>
    <div style="float: left;">Puntos para la X - <b><?php echo $eLocal+$eVisitante?></b> - </div>
    <div style="float: left;">Puntos para el 2 - <b><?php echo $pLocal+$gVisitante?></b> ----- </div>
    <div style="float: left;">Resultado <b><?php echo $partido['goles_local'].'-'.$partido['goles_visitante']?></b></div>
    <hr />
    Por goles: <?php echo $glCruzado.'-'.$gvCruzado?><br />
    Por goles L/V: <?php echo $gl6aCruzado.'-'.$gv6aCruzado?>
</div>
     
</div>
<?php

$quiniela='-';
if ($partido['estado_partido']==1) {
  if ($partido['goles_local']==$partido['goles_visitante']){ $quiniela='X';}
  if ($partido['goles_local']>$partido['goles_visitante']){ $quiniela='1';}
  if ($partido['goles_local']<$partido['goles_visitante']){ $quiniela='2';}
}


$lectura[$kp]['partido']=$partido['local'].' <b>'.$partido['goles_local'].'-'.$partido['goles_visitante'].'</b> '.$partido['visitante'];
$lectura[$kp]['1']=$gLocal+$pVisitante;
$lectura[$kp]['X']=$eLocal+$eVisitante;
$lectura[$kp]['2']=$pLocal+$gVisitante;
$lectura[$kp]['por goles L']=$glCruzado;
$lectura[$kp]['ultimos 6 L']=$gl6aCruzado;
$lectura[$kp]['por goles V']=$gvCruzado;
$lectura[$kp]['ultimos 6 V']=$gv6aCruzado;
$lectura[$kp]['Q']=$quiniela;
} ?>

<div style="position: fixed; width: 600px; top:0px; right:0px; background-color: yellow">
  <div class="marco text-center" style="float: left; width: 100%">
      <table>
        <?php 

        $aciertos=0;

        foreach ($lectura as $key => $value) { 
          $valor=1;
          

          //if ($value['ultimos 6 V']>$value['ultimos 6 L'] && $value['1']>$value['2']){ $value['X']=($value['X']+0.5); }

          $a=$value['ultimos 6 V']+$value['por goles V'];
          $b=$value['ultimos 6 L']+$value['por goles L'];

          if ($a>$b){ $valor=2; }
          if ($a<$b){ $valor=1; }

          
          if (($value['ultimos 6 L']-$value['ultimos 6 V'])<(0.5) &&
              ($value['ultimos 6 L']-$value['ultimos 6 V'])>(-1.1)){ $valor=3; }

          //if ($value['ultimos 6 V']>$value['ultimos 6 L']){ $valor=2; }
          //if ($value['ultimos 6 V']<$value['ultimos 6 L']){ $valor=1; }

          //if ($value['X']>$value['1'] && $value['X']>$value['2']){ $valor=3;}
          //if ($value['2']>$value['1'] && $value['2']>$value['X']){ $valor=2;}
          //if ($value['1']>$value['X'] && $value['1']>$value['2']){ $valor=1;}

          
          if ($valor==1){ $celda1='orange';$celda2='white';$celda3='white'; }
          if ($valor==2){ $celda1='white';$celda2='white';$celda3='orange'; }
          if ($valor==3){ $celda1='white';$celda2='orange';$celda3='white'; }
          ?>
          <tr>
            <td><?php echo $value['partido']?></td>
            <td bgcolor="<?php echo $celda1?>"><?php echo $value['1']?></td>
            <td bgcolor="<?php echo $celda2?>"><?php echo $value['X']?></td>
            <td bgcolor="<?php echo $celda3?>"><?php echo $value['2']?></td>
            <td><?php echo $value['por goles L']-$value['por goles V']?></td>
            <td><?php echo $value['ultimos 6 L']-$value['ultimos 6 V']?></td>
            
            <td align="center"><b><?php echo $value['Q']?></b></td>
          </tr>
        <?php 

        if ($valor==1 && $value['Q']=='1'){ $aciertos++; }
        if ($valor==2 && $value['Q']=='2'){ $aciertos++; }
        if ($valor==3 && $value['Q']=='X'){ $aciertos++; }

      } ?>
      </table>
      <h1><?php echo $aciertos?> aciertos.</h1>
  </div>
</div>

<div>
<?php echo $txt?>
</div>
<?php $txt=str_replace('<br />', "\r\n", $txt); ?>

<textarea cols="80" rows="20"><?php echo $txt?></textarea>

<?php 
function modelo($valor){
    switch ($valor) {
        case '1':$v='Gana';break;
        case '2':$v='Empata';break;
        case '3':$v='Pierde';break;
        case '4':$v='Gana o empata';break;
        case '5':$v='Empata o pierde';break;
        case '6':$v='No empata';break;
        case '7':$v='Cualquier resultado';break;
    }
    return $v;

}