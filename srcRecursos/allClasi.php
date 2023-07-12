
<h4 class="text-center"><?php echo $equipotxt?></h4>
<?php
$diviLiga=0;$datosClas=array();
if (isset($liga) && $desaparecido==0) {

    if ($liga>0 && $liga<25) {        

        if ($liga==1) { $diviLiga=1;$color_d1="#FFD700";}
        if ($liga==2) { $diviLiga=2;$color_d1="#E6E6FA";}
        if ($liga>2 && $liga<7) { $diviLiga=3;$color_d1="#FFE4B5";}
        if ($liga>6) { $diviLiga=4;$color_d1="#D8BFD8";}
            

            $f = './json/temporada/'.$liga.'/tipo.json';           

            $json = file_get_contents($f);
            $datos = json_decode($json, true);

            $clasificacion=$datos['clasificacion'];

            
            if (isset($clasificacion)) {
                foreach ($clasificacion['clasificacionFinal'] as $key => $v) {
                        if ($v['equipo_id']==$equipo_id) { $datosClas=$v; break; }
                }
            }
    }
}

ksort($divisiones);

$sePinta=0;
foreach ($divisiones as $division) {
 
$path = 'json/clasHistorica_'.$division.'.json';
$json = file_get_contents($path);
$clasHistorica = json_decode($json,true);
    switch ($division) {
         case '1':$txtDivision="Primera División";$color_d="#FFD700";$e="/historico-liga/clasificacion/primera-division/1";break;
         case '2':$txtDivision="Segunda División";$color_d="#E6E6FA";$e="/historico-liga/clasificacion/segunda-division/2";break;
         case '3':$txtDivision="Segunda División B";$color_d="#FFE4B5";$e="/historico-liga/clasificacion/segunda-division-b/3";break;
         case '4':$txtDivision="Tercera División";$color_d="#D8BFD8";$e="/historico-liga/clasificacion/tercera-division/4";break;
    } 

    $datosHistorica=array(); 
    foreach ($clasHistorica as $key => $value) {
        if ($equipo_id==$value['fm_equipo_id']) {
            $datosHistorica=$value;
            $datosHistorica['posicion']=$key+1;                             
            break;
        }
    } 

if (!isset($datosHistorica['posicion'])) { continue; } ?>
<table class="table table-bordered table-condensed whitebox nomargin txt11">
 <thead>
    <tr class="darkgreenbox">
        <th class="text-center" style="width:7%">Categoría</th>
        <th class="text-center" style="width:7%">Pos.</th>
        <th class="text-center" style="width:7%">Temp</th>
        <th class="text-center" style="width:7%">P<span class="hidden-xs">TO</span>S</th>
        <th class="text-center" style="width:7%">J<span class="hidden-xs">U</span></th>
        <th class="text-center" style="width:7%">G<span class="hidden-xs">A</span></th>
        <th class="text-center" style="width:7%">E<span class="hidden-xs">M</span></th>
        <th class="text-center" style="width:7%">P<span class="hidden-xs">E</span></th>
        <th class="text-center" style="width:7%"><span class="hidden-xs">G</span>F</th>
        <th class="text-center" style="width:7%"><span class="hidden-xs">G</span>C</th>
        
    </tr>
</thead>
                            
<tbody class="whitebox">
<tr>
    <td class="text-center" style="background-color: <?php echo $color_d; ?>">
        <a href="<?php echo $e;?>"><?php echo $txtDivision; ?></a>   
    </td>
    <td class="text-center"><?php echo $datosHistorica['posicion']; ?>º</td>
    <td class="text-center"><?php echo $datosHistorica['temporadas']; ?></td>
    <td class="text-center"><b><?php echo $datosHistorica['puntos']; ?></b>
        <?php if ($diviLiga==$division) { ?>
        (<?php echo $datosHistorica['puntos']+$datosClas['puntos']; ?>)
        <?php } ?>
    </td>
    <td class="text-center"><b><?php echo $datosHistorica['jugados']; ?></b>
    <?php if ($diviLiga==$division) { ?>
        (<?php echo $datosHistorica['jugados']+$datosClas['jugados']; ?>)
        <?php } ?>
    </td>
    <td class="text-center"><b><?php echo $datosHistorica['ganados']; ?></b>
    <?php if ($diviLiga==$division) { ?>
        (<?php echo $datosHistorica['ganados']+$datosClas['ganados']; ?>)
        <?php } ?>
    </td>
    <td class="text-center"><b><?php echo $datosHistorica['empatados']; ?></b>
    <?php if ($diviLiga==$division) { ?>
        (<?php echo $datosHistorica['empatados']+$datosClas['empatados']; ?>)
        <?php } ?>
    </td>
    <td class="text-center"><b><?php echo $datosHistorica['perdidos']; ?></b>
    <?php if ($diviLiga==$division) { ?>
        (<?php echo $datosHistorica['perdidos']+$datosClas['perdidos']; ?>)
        <?php } ?>
    </td>
    <td class="text-center"><b><?php echo $datosHistorica['golesFavor']; ?></b>
    <?php if ($diviLiga==$division) { ?>
        (<?php echo $datosHistorica['golesFavor']+$datosClas['gFavor']; ?>)
        <?php } ?>
    </td>
    <td class="text-center"><b><?php echo $datosHistorica['golesContra']; ?></b>
    <?php if ($diviLiga==$division) { ?>
        (<?php echo $datosHistorica['golesContra']+$datosClas['gContra']; ?>)
        <?php } ?>
    </td>    
</tr>
<?php if ($diviLiga==$division) { 
$sePinta=1;?>
<tr style="background-color: gainsboro">
    <td class="text-center" style="background-color: <?php echo $color_d; ?>">
        <a href="/temporada.php?id=<?php echo $liga?>">2018-19</a>   
    </td>
    <td class="text-center"><?php echo $datosClas['posicion']; ?>º</td>
    <td class="text-center"></td>
    <td class="text-center"><b><?php echo $datosClas['puntos']; ?></b></td>
    <td class="text-center"><b><?php echo $datosClas['jugados']; ?></b></td>
    <td class="text-center"><b><?php echo $datosClas['ganados']; ?></b></td>
    <td class="text-center"><b><?php echo $datosClas['empatados']; ?></b></td>
    <td class="text-center"><b><?php echo $datosClas['perdidos']; ?></b></td>
    <td class="text-center"><b><?php echo $datosClas['gFavor']; ?></b></td>
    <td class="text-center"><b><?php echo $datosClas['gContra']; ?></b></td>    
</tr>
<?php } ?>  



</tbody>
</table>
<?php }


if ($sePinta==0 && $desaparecido==0 && $liga>0) {
$tit="2017-18";
if ($liga>24) {
    $color_d1="#81F7BE";
    $tit="2017-18 Regional";
    $f='./json/temporada/'.$liga.'/clasificacion.json';
    if (@file_exists($f)) {
        $json = file_get_contents($f);
        $clasificacion = json_decode($json,true);

        if (isset($clasificacion)) {
            foreach ($clasificacion['clasificacionFinal'] as $key => $v) {
                    if ($v['equipo_id']==$equipo_id) { $datosClas=$v; break; }
            }
        }
    }
}
   
if (isset($datosClas['posicion'])){ ?>
 <table class="table table-bordered table-condensed whitebox nomargin txt11">
 <thead>
    <tr class="darkgreenbox">
        <th class="text-center" style="width:7%">Categoría</th>
        <th class="text-center" style="width:7%">Pos.</th>
        <th class="text-center" style="width:7%">Temp</th>
        <th class="text-center" style="width:7%">P<span class="hidden-xs">TO</span>S</th>
        <th class="text-center" style="width:7%">J<span class="hidden-xs">U</span></th>
        <th class="text-center" style="width:7%">G<span class="hidden-xs">A</span></th>
        <th class="text-center" style="width:7%">E<span class="hidden-xs">M</span></th>
        <th class="text-center" style="width:7%">P<span class="hidden-xs">E</span></th>
        <th class="text-center" style="width:7%"><span class="hidden-xs">G</span>F</th>
        <th class="text-center" style="width:7%"><span class="hidden-xs">G</span>C</th>
        
    </tr>
</thead>
<tbody class="whitebox">
<tr style="background-color: gainsboro">
    <td class="text-center" style="background-color: <?php echo $color_d1; ?>">
        <a href="/temporada.php?id=<?php echo $liga?>"><?php echo $tit; ?></a>   
    </td>
    <td class="text-center"><?php echo $datosClas['posicion']; ?>º</td>
    <td class="text-center"></td>
    <td class="text-center"><b><?php echo $datosClas['puntos']; ?></b></td>
    <td class="text-center"><b><?php echo $datosClas['jugados']; ?></b></td>
    <td class="text-center"><b><?php echo $datosClas['ganados']; ?></b></td>
    <td class="text-center"><b><?php echo $datosClas['empatados']; ?></b></td>
    <td class="text-center"><b><?php echo $datosClas['perdidos']; ?></b></td>
    <td class="text-center"><b><?php echo $datosClas['gFavor']; ?></b></td>
    <td class="text-center"><b><?php echo $datosClas['gContra']; ?></b></td>    
</tr>
</tbody>
</table>
<?php }
} ?> 