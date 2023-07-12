
<div class="cols-xs-12 nopadding">
<ul class="nav nav-tabs nopadding celestebox" role="tablist" id="pestaTemporada">      
        <li class="text-center boldfont h40" style="margin-left: 5px;">
            <a class="btn btn-primary" href="<?php echo $pgPartido; ?>&modelo=Partido">Partido</a>
        </li>
        <li class="text-center boldfont h40" style="margin-left: 5px;">
            <a class="btn btn-primary" href="<?php echo $pgPartido; ?>&modelo=Enfrentamientos">Enfrentamientos</a>
        </li>
     </ul>
<?php 
switch ($modelo) {
    case 'Enfrentamientos': ?>
        <div class="col-xs-12 marconegro clear">
         <?php require_once 'includes/publicidad/adsenseAdaptable.php'; ?>
        </div>
         <?php  require_once 'includes/pagPartido/partidoEnfrentamientos.php'; ?>
     <div>
    <?php break;
    case 'Partido':
    //if ($liga_local>0) { $torneo = Xtipo($liga_local); }
    //if ($liga_visitante>0) { $torneo = Xtipo($liga_visitante); } 

    

    include 'partidoCabecera.php';

    /*if ($partido['codigo_acta']>0 && $partido['estado_partido']==1){        
        $f='./json/temporada/'.$partido['temporada_id'].'/ac-'.$partido['jornada'].'-'.$partido['codigo_acta'].'-'.$partido['id'].'.json';
        if (!@file_exists($f)) { 
            echo ' - KOOOOOOOOOO - '; 
         } else  { 
          echo ' - OK - '; 
        } 
        unset($f);
    } */

    



if ($tipo_eliminatoria==3){
    $clasificacion = X2generarClasificacion($partido['temporada_id'], 2, $partido['jornada'], $partido['grupo_id'], 0);
    include 'srcRecursos/pesClasificacionGrupo.php';

}

if (isset($e1Clas) && isset($e2Clas)) { ?>
<table class="table table-bordered table-condensed whitebox nomargin txt11">
<?php 
$color_fondo = 'white';
        $txtPreferente = '';
        $jornadas = 0;
        for ($i = 0; $i < 2; ++$i) {
            if (0 == $i && !isset($e1Clas)) {
                continue;
            }
            if (1 == $i && !isset($e2Clas)) {
                continue;
            }
            if (isset($e1Clas) && 0 == $i) {
                $fila = $e1Clas;
                $temporada_id = $liga_local;
            }
            if (isset($e2Clas) && 1 == $i) {
                $fila = $e2Clas;
                $temporada_id = $liga_visitante;
            }
            if (isset($fila['preferente'])) {
                if (1 == $fila['preferente'] && 0 == $i) {
                    $color_fondo = 'yellow';
                    $txtPreferente = '*Clasificación En vivo';
                }
            }

            if (0 == $i) {
                ?>
        <thead>
            <tr class="darkgreenbox">
                <th class="text-center" colspan="2">
                <?php if ($tipo_eliminatoria==3) {
                    echo "En sus respectivas ligas...";
                } ?>
                </th>
                <th class="text-center" style="width:7%">P<span class="hidden-xs">TO</span>S</th>
                <th class="text-center" style="width:7%">J<span class="hidden-xs">U</span></th>
                <th class="text-center" style="width:7%">G<span class="hidden-xs">A</span></th>
                <th class="text-center" style="width:7%">E<span class="hidden-xs">M</span></th>
                <th class="text-center" style="width:7%">P<span class="hidden-xs">E</span></th>
                <th class="text-center" style="width:7%"><span class="hidden-xs">G</span>F</th>
                <th class="text-center" style="width:7%"><span class="hidden-xs">G</span>C</th>
                <th class="text-center" style="width:9%">D<span class="hidden-xs">I</span>F</th>
            </tr>
        </thead>
        <?php
            } ?>
        <tbody class="whitebox">
        <?php 
        if ($fila['jugados'] > $jornadas) {
            $jornadas = $fila['jugados'];
        }
            $pgEnlace = '/resultados-directo/equipo/'.poner_guion($fila['nombre']).'/'.$fila['equipo_id'];
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

            $rutaEscudo=rutaEscudo($fila['club_id'],$fila['equipo_id']);

            if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaEscudo))) {
                $rutaEscudo = '/img/jugadores/NI.png';
            }

            ?>
                <tr>
                    <td class="text-center" style="<?php echo $fila['css']; ?>"><?php echo $fila['posicion']; ?></td>
                    <td style="text-align:left;">
                        <span class="hidden-sm hidden-md hidden-lg">
                        <a href="<?php echo $pgEnlace; ?>&modelo=Calendario" title="Calendario del <?php echo $fila['nombreCorto']; ?>">
                        <img src="<?php echo $rutaEscudo?>"  alt="equipo" style="width:18px; height:20px">
                        <b><?php echo $fila['nombreCorto']; ?></b>
                        </a>
                        </span>
                        <span class="hidden-xs">
                        <a href="<?php echo $pgEnlace; ?>&modelo=Calendario" title="Calendario del <?php echo $fila['nombreCorto']; ?>">
                        <img src="<?php echo $rutaEscudo?>" alt="equipo"  style="width:18px; height:20px">
                        <b><?php echo $fila['nombre']; ?></b>
                        </a>
                        </span>
                    </td>
                    <td class="text-center" style="background-color:<?php echo $color_fondo; ?>">
                    <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Puntos" title="<?php echo $fila['nombreCorto']; ?> - Puntos conseguidos">
                    <b><?php echo $fila['puntos']; ?></b></a>
                    </td>
                    <td class="text-center">
                    <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Jugados" title="<?php echo $fila['nombreCorto']; ?> - Partidos jugados">
                    <?php echo $fila['jugados']; ?></a>
                    </td>
                    <td class="text-center">
                    <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Ganados" title="<?php echo $fila['nombreCorto']; ?> - Partidos ganados">
                    <?php echo $fila['ganados']; ?></a>
                    </td>
                    <td class="text-center">
                    <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Empatados" title="<?php echo $fila['nombreCorto']; ?> - Partidos empatados">
                    <?php echo $fila['empatados']; ?></a>
                    </td>
                    <td class="text-center">
                    <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Perdidos" title="<?php echo $fila['nombreCorto']; ?> - Partidos perdidos">
                    <?php echo $fila['perdidos']; ?></a>
                    </td>
                    <td class="text-center">
                    <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Favor" title="<?php echo $fila['nombreCorto']; ?> - Goles a favor">
                    <?php echo $fila['gFavor']; ?></a>
                    </td>
                    <td class="text-center">
                    <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Contra" title="<?php echo $fila['nombreCorto']; ?> - Goles en contra">
                    <?php echo $fila['gContra']; ?></a>
                    </td>
                    <td class="text-center"><?php echo $fila['gFavor'] - $fila['gContra']; ?></td>
                </tr>  
            <?php
        } ?>
            <tr><td colspan="10" align="right"><?php echo $txtPreferente; ?></td></tr>  
                    </tbody>
            </table>

            <div id="13939-2" style="height: 255px !important">
                <script src="//ads.themoneytizer.com/s/gen.js?type=2"></script>
                <script src="//ads.themoneytizer.com/s/requestform.js?siteId=13939&formatId=2" ></script>
            </div>
        
<?php } //si existe e2Clas o e1Cla


/*
imp($racha1);

if (isset($racha1)) {
$racha=$racha1;
$gaL=0;$gaV=0;$gaT=0;
$emL=0;$emV=0;$emT=0;
$peL=0;$peV=0;$peT=0;
$gfL=0;$gfV=0;$gfT=0;
$gcL=0;$gcV=0;$gcT=0;
$fila = $racha[$e1];
$e_racha = explode(';', $fila['racha']);
$equipo_id=$e1; 
$nombreCortoR=$et1;
include 'buscadorRacha.php';

echo $nombreCortoR.": ";
echo "<hr />";
if (($gaL+$gaV)==0){ 
    echo "No ha ganado ningún partido.<br />";
} else {
    if ($gaL==0){ echo "No ha ganado en casa.<br />"; }
    if ($gaV==0){ echo "No ha ganado fuera.<br />"; }
    if ($gaL>0){ echo "Ganados como local ".$gaL."<br />";}
    if ($gaV>0){ echo "Ganados como visitante ".$gaV."<br />";}
    if ($gaL>0 && $gaV>0){ echo "Ganados en total ".($gaL+$gaV)."<br />";}
}

echo "<hr />";
if (($emL+$emV)==0){ 
    echo "No ha empatado ningún partido.<br />";
} else {
    if ($emL==0){ echo "No ha empatado en casa.<br />"; }
    if ($emV==0){ echo "No ha empatado fuera.<br />"; }
    if ($emL>0){ echo "Empatados como local ".$emL."<br />";}
    if ($emV>0){ echo "Empatados como visitante ".$emV."<br />";}
    if ($emL>0 && $emV>0){ echo "Empatados en total ".($emL+$emV)."<br />";}
}

echo "<hr />";
if (($peL+$peV)==0){ 
    echo "No ha empatado ningún partido.<br />";
} else {
    if ($peL==0){ echo "No ha perdido en casa.<br />"; }
    if ($peV==0){ echo "No ha perdido fuera.<br />"; }
    if ($peL>0){ echo "Perdidos como local ".$peL."<br />";}
    if ($peV>0){ echo "Perdidos como visitante ".$peV."<br />";}
    if ($peL>0 && $peV>0){ echo "Perdidos en total ".($peL+$peV)."<br />";}
}

echo "<hr />";
if (($gfL+$gfV)==0){ 
    echo "No ha metido ningún gol.<br />";
} else {
    if ($gfL==0){ echo "No ha metido ningún gol en casa.<br />"; }
    if ($gfV==0){ echo "No ha metido ningún gol fuera.<br />"; }
    if ($gfL>0){ echo "Goles a favor como local ".$gfL."<br />";}
    if ($gfV>0){ echo "Goles a favor como visitante ".$gfV."<br />";}
    if ($gfL>0 && $gfV>0){ echo "Goles a favor en total ".($gfL+$gfV)."<br />";}
}

echo "<hr />";
if (($gcL+$gcV)==0){ 
    echo "No ha recibido ningún gol.<br />";
} else {
    if ($gcL==0){ echo "No ha recibido ningún gol en casa.<br />"; }
    if ($gcV==0){ echo "No ha recibido ningún gol fuera.<br />"; }
    if ($gcL>0){ echo "Goles en contra como local ".$gcL."<br />";}
    if ($gcV>0){ echo "Goles en contra como visitante ".$gcV."<br />";}
    if ($gcL>0 && $gfV>0){ echo "Goles en contra en total ".($gcL+$gcV)."<br />";}
}




$u_derrota = explode(',', $racha[$equipo_id]['u_derrota']);
    $p=$u_derrota[2].$u_derrota[3];$p=str_replace($nombreCortoR, "", $p);
    if ($nombreCortoR==$u_derrota[2]) { $txt=" en casa "; }else { $txt=" fuera ";}
    echo "Última derrota: Jornada ".$u_derrota[1]." 
    Fecha ".$u_derrota[0]." ".$txt." contra el ".$p." (".$u_derrota[4]."-".$u_derrota[5].")<br />";

    $u_gol_contra = explode(',', $racha[$equipo_id]['u_gol_contra']);
    $p=$u_gol_contra[2].$u_gol_contra[3];$p=str_replace($nombreCortoR, "", $p);
    if ($nombreCortoR==$u_gol_contra[2]) { $txt=" en casa "; } else { $txt=" fuera ";}
    echo "Último gol en contra: Jornada ".$u_gol_contra[1]." 
    Fecha ".$u_gol_contra[0]." ".$txt." contra el ".$p." (".$u_gol_contra[4]."-".$u_gol_contra[5].")<br />";

    $u_gol_favor = explode(',', $racha[$equipo_id]['u_gol_favor']);
    $p=$u_gol_favor[2].$u_gol_favor[3];$p=str_replace($nombreCortoR, "", $p);
    if ($nombreCortoR==$u_gol_favor[2]) { $txt=" en casa "; }else { $txt=" fuera ";}
    echo "Último gol a favor: Jornada ".$u_gol_favor[1]." 
    Fecha ".$u_gol_favor[0]." ".$txt." contra el ".$p." (".$u_gol_favor[4]."-".$u_gol_favor[5].")<br />";

    $u_punto = explode(',', $racha[$equipo_id]['u_punto']);
    $p=$u_punto[2].$u_punto[3];$p=str_replace($nombreCortoR, "", $p);
    if ($nombreCortoR==$u_punto[2]) { $txt=" en casa "; }else { $txt=" fuera ";}
    echo "Último punto conseguido: Jornada ".$u_punto[1]." 
    Fecha ".$u_punto[0]." ".$txt." contra el ".$p." (".$u_punto[4]."-".$u_punto[5].")<br />";

    $u_victoria = explode(',', $racha[$equipo_id]['u_victoria']);
    $p=$u_victoria[2].$u_victoria[3];$p=str_replace($nombreCortoR, "", $p);
    if ($nombreCortoR==$u_victoria[2]) { $txt=" en casa "; }else { $txt=" fuera ";}
    echo "Última victoria: Jornada ".$u_victoria[1]." 
    Fecha ".$u_victoria[0]." ".$txt." contra el ".$p." (".$u_victoria[4]."-".$u_victoria[5].")<br />";



} 

*/


if (isset($proximosPartidos)) { ?>
            <div class="col-xs-12 marco clear txt11" style="background-color: gainsboro">
                <h4>Próximos partidos</h4>
                <div class="col-xs-5 text-center hide"><h5><a href="<?php echo $pg; ?>&n3=Siguientes">Próximos partidos</a></h5></div>
                <div class="col-xs-3 text-center hide"><h5><a href="<?php echo $pg; ?>&n3=Jugados">Jugados</a></h5></div>
                <div class="col-xs-4 text-center hide"><h5><a href="<?php echo $pg; ?>&n3=Jornada">Jornada (<?php echo $valorJornada; ?>)</a></h5></div>
             </div>   
                <div class="clear"></div>
                
            <div class="col-xs-12 marco clear txt11">
            <table class="table nomargin">
                <?php                 
                foreach ($proximosPartidos as $key => $value) {
                    if ($value['estado_partido']==1){ continue; }
                    if (5 == $key) { break; }
                    if($value['tipo_torneo']==1){
                        $txtTorneo="Liga";
                    } else {
                        $txtTorneo=$value['nombreTorneo'];
                        $txtTorneo=str_replace("CLUBES - ", "", $txtTorneo);
                        $txtTorneo=str_replace("CAMPEONATO DE ESPAÑA - ", "", $txtTorneo);
                    }?>

            <tr><td colspan="3" class="col-xs-12 h10"><span class="pull-left txt11" style="color:tomato;"><?php echo nombreDia($value['fecha']); ?></span>
                <span class="pull-right txt11" style="color:dimgray;"><?php echo $txtTorneo; ?></span>
            </td></tr>
            <tr class="h40">
          <td class="text-right"><span class="txt11"><?php echo $value['localCorto']; ?></span></td>
          <td class="text-center"> - </td>
          <td><span class="txt11"><?php echo $value['visitanteCorto']; ?></span></td>
              </tr>                  
                <?php
                } ?>
                </table>
            </div>   
<?php } ?>


    <div class="col-xs-12 whitebox">
    <?php 
    //imp($partido);

    if ($partido['estado_partido']!=1 && $partido['tipo_torneo']==1){
     require_once 'partidoStads.php';
    } else {
         //require_once 'partidoStads.php';
    } ?>
    </div>

    <?php 
       
       $filtro=0;
       $titol="últimos comentarios..."; 
       //$tiempoAcorrer=3600; //3600=1 hora
       require_once 'srcRecursos/pesLeerTwitsPortada.php'; ?>

    <?php break;


} 


require_once 'partidoTwitter.php'; 
?>
</div>

</div>



