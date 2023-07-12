<?php 
define('_FUTBOLME_', 1);
require_once '../src/config.php'; 

$hoy = new DateTime('now');

$temporada_id=$_GET['id']??1;

$f = '../json/temporada/'.$temporada_id.'/tipo.json';

$division=4;
if ($temporada_id<7){ $division=3; }
if ($temporada_id==2){ $division=2; }
if ($temporada_id==1){ $division=1; }

$json = file_get_contents($f);
$datos = json_decode($json, true);


$torneo=$datos['torneo'];
$equipos=$datos['equipos'];
$fichajes=$datos['fichajes'];
$clasificacion=$datos['clasificacion'];



$valorJornada=$torneo['jornadaActiva'];
$valorJornada=abs($valorJornada);

$partidosJornada = Xpartidos($temporada_id, $valorJornada); 

$equiposTw = array();
foreach ($equipos as $kk => $value) {   
    $equiposTw[$kk]['id'] = $value['equipo_id'];
    $equiposTw[$kk]['equipo'] = $value['nombreCorto'];
    $equiposTw[$kk]['idPais'] = $value['pais_id'];
    $equiposTw[$kk]['twitter'] = $value['slug'];
}

$horarios="";$resultados="";
$pj=count($partidosJornada);
foreach ($partidosJornada as $k1 => $valor) {

$equipo_id=$valor['equipoLocal_id'];
$equipoRival=$valor['equipoVisitante_id'];
$nombreCortoR=$valor['visitanteCorto'];;

$clasEquipo=array();$clasRival=array();
    
foreach ($clasificacion['clasificacionFinal'] as $v) {
	if ($v['equipo_id']==$equipo_id){ $clasEquipo=$v; }
	if ($v['equipo_id']==$equipoRival){ $clasRival=$v; }
}


	$datos = XequipoClub($equipo_id);
	$nombreCorto=$datos['datos']['nombreCorto'];
	$enlace_equipo = '/resultados-directo/equipo/'.poner_guion($datos['datos']['nombre']).'/'.$equipo_id; 

	$ePartidos = XequipoPartidos($equipo_id);
	$estadisticas = $ePartidos['estadisticas'];
	$racha = Xracha($temporada_id, $equipo_id);


?>

<div style="width:100%; float:left">
<div style="width:33%; float:left">
	<div style="clear:both;"><?php echo $datos['datos']['nombre']?></div>
	<div style="clear:both;"><?php echo $datos['datos']['web']?></div>
	<div style="clear:both;"><?php echo $equipo_id?> - @<?php echo $datos['datos']['slug']?>
		<?php echo $equipoRival?>
	</div>
	<div style="clear:both;"><?php
	foreach ($estadisticas as $key => $value) {
		if ($value['tipo_torneo']!=1){ continue; }
		$nombreTorneo=$value['nombreTorneo'];
		echo $value['id']." ".$value['nombreTorneo']." ".$value['tipo_torneo']."<br />";
		include 'utilidades/buscadorEstadisticas.php'; 		
	 }
	echo "Posicion: ".$clasEquipo['posicion']."<hr />"; ?>	 	
	 </div>
	<?php
	    if (isset($racha[$equipo_id])) {
	        $fila = $racha[$equipo_id];
	        $e_racha = explode(';', $fila['racha']); 
            $gaL=0;$gaV=0;
            $emL=0;$emV=0;
            $peL=0;$peV=0;
            $gfL=0;$gfV=0;
            $gcL=0;$gcV=0;
	        include 'utilidades/buscadorRacha.php';
	        } ?>

</div>



<div style="width:33%; float:left">

    
	<div style="float:right">
	
	    <?php 
	    echo $nombreTorneo."<br />";
	    $h=substr($valor['hora_prevista'],0,5);$h=str_replace(":", ".", $h);
	    echo "Jornada ".$valor['jornada']." :  ".$h."<br />";
        echo "Clasificación https://futbolme.eu/temporada.php?id=".$valor['temporada_id']."<br />";
        echo "Todos los detalles en https://futbolme.eu/partido.php?id=".$valor['id']."<br />";

	    echo '@'.$valor['twitterLocal'].' '.$valor['goles_local'].'-'.$valor['goles_visitante'].' @'.$valor['twitterVisitante'];

        if ($valor['estado_partido']==1){
            $resultados.='@'.$valor['twitterLocal'].' '.$valor['goles_local'].'-'.$valor['goles_visitante'].' @'.$valor['twitterVisitante'].'<br />';
        }
	   
       $horarios.='@'.$valor['twitterLocal'].' - @'.$valor['twitterVisitante'].' '.$h.'<br />';
	    ?>
	</div>


	<div style="clear:both;"><?php
	$ePartidos = XequipoPartidos($equipoRival);
	$estadisticas = $ePartidos['estadisticas'];

	foreach ($estadisticas as $key => $value) {
		if ($value['tipo_torneo']!=1){ continue; }
		echo $value['id']." ".$value['nombreTorneo']." ".$value['tipo_torneo']."<br />"; 
		include 'utilidades/buscadorEstadisticas.php'; 
		}
	 echo "Posicion: ".$clasRival['posicion']."<hr />";?>	 	
	 </div>



    

<?php

    $racha = Xracha($temporada_id, $equipoRival);

    if (isset($racha[$equipoRival])) {
        $fila = $racha[$equipoRival];
        $e_racha = explode(';', $fila['racha']); 
        $equipo_id=$equipoRival;
        $nombreCorto=$nombreCortoR;
        $gaL=0;$gaV=0;
        $emL=0;$emV=0;
        $peL=0;$peV=0;
        $gfL=0;$gfV=0;
        $gcL=0;$gcV=0;
        include 'utilidades/buscadorRacha.php'; 
        $equipo_id=0;       
        } ?>

   

</div><!--  div 33%  -->

<div style="width:33%; float:left">

<?php if ($k1==0) { ?>

	<table id="latabla" class="table tablesorter table-bordered table-condensed greenbox nomargin txt11">
    <thead>
    <tr class="darkgreenbox h40">
        <th class="text-center">P</th>
        <th class="text-center">Equipo</th>
        <th class="text-center">P<span class="hidden-xs">TO</span>S</th>
        <th class="text-center">J<span class="hidden-xs">U</span></th>
        <th class="text-center">G<span class="hidden-xs">A</span></th>
        <th class="text-center">E<span class="hidden-xs">M</span></th>
        <th class="text-center">P<span class="hidden-xs">E</span></th>
        <th class="text-center"><span class="hidden-xs">G</span>F</th>
        <th class="text-center"><span class="hidden-xs">G</span>C</th>
        <th class="text-center">D<span class="hidden-xs">I</span>F</th>
    </tr>
    </thead>
    <tbody class="whitebox">
    <?php

    echo "Clasificación https://futbolme.com/temporada.php?id=".$valor['temporada_id']."<br />";
        
    foreach ($clasificacion['clasificacionFinal'] as $fila) {
        $fila['css'] = '';

        $pgEnlace = '/resultados-directo/equipo/'.poner_guion($fila['nombre']).'/'.$fila['equipo_id'];

        
        foreach ($equiposTw as $cc => $v3) {
        	if ($fila['equipo_id']==$v3['id']) { 

                echo $fila['posicion']." @".$v3['twitter']." , ".$fila['puntos']."<br />"; break; 
            }
        }
        $color_fondo = 'white';
        if (isset($fila['preferente'])) {
            if (1 == $fila['preferente']) {
                $color_fondo = 'yellow';
            }
        }

        $color_fila = '';
        if (isset($equipo_id) && $equipo_id == $fila['equipo_id']) {
            $color_fila = "style='background-color:gainsboro'";
        }

        $rutaEscudo = '/img/equipos/escudo'.$fila['equipo_id'].'.png';
        if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaEscudo))) {
            $rutaEscudo = '/img/jugadores/NI.png';
        } ?>
        <tr <?php echo $color_fila; ?>>
            <td class="text-center" style="<?php echo $fila['css']; ?>"><?php echo $fila['posicion']; ?></td>
            <td style="text-align:left;">
			
                <span class="hidden-xs">
			<a href="<?php echo $pgEnlace; ?>&modelo=Calendario"
               title="Calendario del <?php echo $fila['nombreCorto']; ?>">
			<img src="<?php echo $rutaEscudo; ?>"  alt="equipo" style="width:18px; height:20px">
			<b><?php echo $fila['nombre']; ?></b>
			</a>
			</span>
            </td>
            <td class="text-center" style="background-color:<?php echo $color_fondo; ?>">
                <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Puntos"
                   title="<?php echo $fila['nombreCorto']; ?> - Puntos conseguidos">
                    <b><?php echo $fila['puntos']; ?></b></a>
            </td>
            <td class="text-center">
                <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Jugados"
                   title="<?php echo $fila['nombreCorto']; ?> - Partidos jugados">
                    <?php echo $fila['jugados']; ?></a>
            </td>
            <td class="text-center">
                <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Ganados"
                   title="<?php echo $fila['nombreCorto']; ?> - Partidos ganados">
                    <?php echo $fila['ganados']; ?></a>
            </td>
            <td class="text-center">
                <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Empatados"
                   title="<?php echo $fila['nombreCorto']; ?> - Partidos empatados">
                    <?php echo $fila['empatados']; ?></a>
            </td>
            <td class="text-center">
                <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Perdidos"
                   title="<?php echo $fila['nombreCorto']; ?> - Partidos perdidos">
                    <?php echo $fila['perdidos']; ?></a>
            </td>
            <td class="text-center">
                <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Favor"
                   title="<?php echo $fila['nombreCorto']; ?> - Goles a favor">
                    <?php echo $fila['gFavor']; ?></a>
            </td>
            <td class="text-center">
                <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Contra"
                   title="<?php echo $fila['nombreCorto']; ?> - Goles en contra">
                    <?php echo $fila['gContra']; ?></a>
            </td>
            <td class="text-center"><?php echo $fila['gFavor'] - $fila['gContra']; ?></td>
        </tr>


        <?php
    } ?>
    </tbody>
</table>

	<?php  



    }

    if (($k1+1)==$pj){ 
        echo $horarios; 
        echo "<hr />";
        echo $resultados; }

    ?>
</div>


</div><!--  div 100%  -->

<?php
	
}