<?php 

if ($activo['comunidad_id']==5){$federacion='01'; }
$fa = './json/gestores/'.$_GET['g'].'/'.$_GET['gr'].'-activa.json';
$fe = './json/gestores/'.$_GET['g'].'/'.$_GET['gr'].'-equipos.json';
$fp = './json/gestores/'.$_GET['g'].'/'.$_GET['gr'].'-partidos.json';
$fq = './panelBack/federacion/'.$federacion.'/equipos/'.$_GET['gr'].'-equipos.json';
$json = file_get_contents($fa);$ja = json_decode($json, true);
$json = file_get_contents($fe);$eq = json_decode($json, true);
$json = file_get_contents($fp);$p = json_decode($json, true);
$json = file_get_contents($fq);$eqC = json_decode($json, true);

$partidos=array();
foreach ($p as $k => $v) {
    foreach ($v as $k1 => $v1) {
        
        foreach ($eq as $k2 => $v2) {            
            if($v1['local_id']==$v2['id']){ 
                $v1['localText']=$v2['equipo'];$p[$k][$k1]['localText']=$v2['equipo'];
            }
            if($v1['visitante_id']==$v2['id']){
                $v1['visitanteText']=$v2['equipo'];$p[$k][$k1]['visitanteText']=$v2['equipo'];
            }
        }
        $partidos[]=$v1;
    }
}
/*
imp($ja);
imp($eq);die;
imp($p);die;
*/
$jornadas=count($p);
$valorJornada=$_GET['jda']??$ja['activa'];
$pgTemporada='?gr='.$_GET['gr'].'&g='.$_GET['g'].'&jda=';?>

<div id="selector-jornadas" class="col-xs-8 btn txt11">
      <div class="btn-group">
        <?php if ($valorJornada > 1) { ?>
        <a class="btn btn-success pull-left" href="<?php echo $pgTemporada;?><?php echo $valorJornada - 1; ?>"><span id="jornada-previa" data-val="<?php echo $valorJornada - 1; ?>" class="iconseparate glyphicon glyphicon-chevron-left"></span></a>
        <?php } ?>
        <?php if ($valorJornada < $jornadas && $valorJornada > 0) { ?>
        <a class="pull-right btn btn-success" href="<?php echo $pgTemporada; ?><?php echo $valorJornada + 1; ?>"><span id="jornada-posterior" data-val="<?php echo $valorJornada + 1; ?>" class="iconseparate glyphicon glyphicon-chevron-right"></span></a>
        <?php } ?>
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font style="vertical-align: inherit;">Jornada <?php echo $valorJornada; ?> de <?php echo $jornadas; ?></font></button>
        <div class="dropdown-menu" x-placement="bottom-start"> 
          <div class='menu_16 text-center'>
                <?php for ($i = 0; $i < $jornadas; ++$i) {?>
                <div class='text-center boldfont' style='border: 1px solid black; float:left; min-width:40px; height:40px; font-size:20px'>
                <a href='<?php echo $pgTemporada; ?><?php echo $i + 1; ?>'>
                <?php echo $i + 1; ?></a></div>                                 
                <?php } ?>
            </div>                                
        </div>
      </div>
      
</div>

<?php
$f=''; //para iniciar
foreach ($p[($valorJornada-1)] as $key => $partido) { 
$hora=substr($partido['hora'],0,5);if ($hora=='00:00'){ $hora=":";}

$colorL='black';$colorV='black';$fondocolorL = '';$fondocolorV = ''; $colorFondo='whitebox';

if ($f!=$partido['fecha']) {
    if ('whitebox'==$colorFondo) {$colorFondo='cajagrisclaro';} else {$colorFondo='whitebox';} ?>
<div class="col-xs-12 txt11 cajanaranja text-center"><?php echo nombreDiaCompleto($partido['fecha']); ?></div>
<?php  } ?>

<div class="col-xs-12 whitebox nopadding one-bordergrey-vert">    
    <div class="col-xs-5 col-centered nopadding equipo-partido" >
        <p class="pull-right boldfont lead txt11" style="padding-right: 10px; color:<?php echo $colorL; ?>;  background-color:<?php echo $fondocolorL; ?>;">
            <span itemprop="name" class="txt11"><?php echo $partido['localText']??''; ?></span>
        </p>
    </div>    
    <div class="col-xs-2 col-centered resultado-partido">
        <?php if (1 == $partido['estado_partido']) { ?>
            <span class="reboxL pull-left" style="margin-top: 10px;"><?php echo $partido['goles_local']; ?></span>
            <span class="reboxR pull-right" style="margin-top: 10px;"><?php echo $partido['goles_visitante']; ?></span>
        <?php } else { ?>
            
            <div class="text-center boldfont" style="font-size:12px; margin-bottom: 10px">
                <?php 
                if (3 == $partido['estado_partido']) {echo 'SUSP.';} 
                if (4 == $partido['estado_partido']) {echo 'APLZ.';} 
                if (5 == $partido['estado_partido']) {echo 'ANULADO';} 
                if (0 == $partido['estado_partido']) {echo $hora;}?> 
            </div>
            
        <?php } ?> 
    </div>
    <div class="col-xs-5 col-centered nopadding equipo-partido">
        <p class="pull-left boldfont lead txt11" style="padding-left: 10px; color:<?php echo $colorV; ?>;  background-color:<?php echo $fondocolorV; ?>;">
            <span itemprop="name" class="txt11"><?php echo $partido['visitanteText']??''; ?></span>                
        </p>
    </div>
</div>
<?php $f=$partido['fecha'];
} //fin de partidos 
?>

<link href="/css/tablesorter/blue/style.css" rel="stylesheet">
<div class="clear"></div>
<div id="playClasi" class="col-xs-12 whitebox nopadding bloque-clasificacion">
<table id="latabla" class="table tablesorter table-bordered table-condensed greenbox nomargin txt11">        
    <thead>
        <tr class="darkgreenbox h40 nopadding">
        <th style="padding: 1px;" class="text-center" title="Posición">P</th>
        <th style="padding: 1px;min-width: 130px" class="text-center">Equipo</th>
        <th style="padding: 1px;" class="text-center" title="Puntos">Pts</th>
        <th style="padding: 1px;" class="text-center" title="Jugados">Ju</th>
        <th style="padding: 1px;" class="text-center" title="Ganados">Ga</th>
        <th style="padding: 1px;" class="text-center" title="Empatados">Em</th>
        <th style="padding: 1px;" class="text-center" title="Perdidos">Pe</th>
        <th style="padding: 1px;" class="text-center" title="Goles a favor">Fav</th>
        <th style="padding: 1px;" class="text-center" title="Goles en contra">Con</th>
        <th style="padding: 1px;" class="text-center hidden-xs" title="Diferencia de goles">Dif</th>
    </tr>
    </thead>    

    
    <tbody>
        <?php $i = 1;
        $cl = './json/gestores/'.$_GET['g'].'/'.$_GET['gr'].'-clasificacion.json';
        $json = file_get_contents($cl);$clasificacion = json_decode($json, true);

        $f = 'json/gestores/'.$_GET['g'].'/'.$_GET['gr'].'-clas_colores.json';
        if (@file_exists($f)) {
        $json = file_get_contents($f);$pintadas = json_decode($json, true);
        } else { $pintadas=array(); }

        foreach ($clasificacion as $k1 => $fila) {   
        $color_fondo = 'white';$cssF = 'white';$cssT = 'black';
        if (isset($fila['preferente']) && 1 == $fila['preferente']) {$color_fondo = 'yellow';}
        if (isset($pintadas[$fila['posicion']])) {
            $cssF = $pintadas[$fila['posicion']]['cf'];
            $cssT = $pintadas[$fila['posicion']]['ct'];
        }
                
           $rutaEscudo='';
           foreach ($eqC as $k3 => $v3) {
                if($fila['equipo_id']==$v3['id'] && isset($v3['club'])){
                    $n=explode('_', $v3['club']);
                    $club=$n[1];$club=intval($club);
                    $rutaEscudo='/img/federacion/'.$federacion.'/escudo_'.$club.'.png';
                    break;
                }
            }

          
           ?>
            <tr style="background-color: <?php echo $cssF?>;color:<?php echo $cssT?>">
                <td><?php echo $fila['posicion']?>º</td>
                <td align="left">                       
                    <img src="<?php echo $rutaEscudo?>" style="width:18px; height:20px">
                    <b><?php echo $fila['nombre']; ?></b>
                </td>
                <td align="center"><b><?php echo $fila['puntos']; ?></b></td>
                <td align="center"><?php echo $fila['jugados']; ?></td>
                <td align="center"><?php echo $fila['ganados']; ?></td>
                <td align="center"><?php echo $fila['empatados']; ?></td>
                <td align="center"><?php echo $fila['perdidos']; ?></td>
                <td align="center"><?php echo $fila['gFavor']; ?></td>
                <td align="center"><?php echo $fila['gContra']; ?></td>
                <td align="center"><?php echo $fila['gFavor'] - $fila['gContra']; ?></td>
            </tr>
            
            <?php ++$i;
        } ?> 
        </tbody>
    </table>
</div>    
        <div class="whitebox clear" style="float:left; width: 100%; padding: 20px; text-align: center">
            <table width="100%"><tr>
            <?php ksort($pintadas);
            $t='';
            foreach ($pintadas as $pinto) {
            if ($t==$pinto['ly']){ continue;} ?>
            <td style="width: auto; padding: 5px; color:<?php echo $pinto['ct']; ?>;background-color:<?php echo $pinto['cf']; ?>"><?php echo $pinto['ly']; ?></td>
            <?php $t=$pinto['ly'];
            } ?></tr></table>
        </div>
    
<div class="whitebox">
<?php 
$f = 'json/gestores/'.$_GET['g'].'/'.$_GET['gr'].'-clas_sanciones.json';
if (@file_exists($f)) {
$json = file_get_contents($f);$sanciones = json_decode($json, true);
} else { $sanciones=array(); }
if (count($sanciones)>0){
    echo '<h3>Sanciones</h3>';
  foreach ($sanciones as $k => $v) {
    foreach ($v as $k1 => $v1) {
        foreach ($clasificacion as $key => $fila) {
            $nombre='';
            if ($fila['equipo_id']==$k1){ $nombre=$fila['nombre']; break;}
        }
        echo 'Jornada '.$k.' - Eq.'.$nombre.' '.$v1['puntos'].' '.$v1['motivo'].'<br />';
    }
  }
}?>
</div>
    

<div class="col-xs-12 h40">
    
</div>

<script src="/js/tablesorter/jquery.tablesorter.js"></script>
<script>
 $(function(){
    $("#latabla").tablesorter();
});
</script>