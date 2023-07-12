
<div class="nopadding col-xs-12 whitebox">
    <?php 

    if (isset($_GET['todos'])) {
        $cachetime = 86400*30; //86400 un dia.
        $f = '../../json/twits/'.$equipo_id.'_todos.json';
        if (@file_exists($f)) { 
            $fichero_time = @filemtime($f);
            if ((time() - $fichero_time)> $cachetime) {
                $todos=equipoInicio($equipo_id);                
                if (count($todos)>0){ guardarJSON($todos, $f); } else { die; }
            } else {
               $json = file_get_contents($f);
                $todos = json_decode($json, true); 
            }                        
        } else {
            $todos=equipoInicio($equipo_id); 
            if (count($todos)>0){ guardarJSON($todos, $f); } else { die; }
            
            //echo "Se ha guardado ".$f."<br />"; 
        }
$patron=$_GET['patron']??0;
switch ($patron) {
    case 1:$titol="Todas las victorias";break;
    case 11:$titol="Victorias locales";break;
    case 12:$titol="Victorias visitante";break;
    case 2:$titol="Todos los empates";break;
    case 21:$titol="Empates locales";break;
    case 22:$titol="Empates visitante";break;
    case 3:$titol="Todas las derrotas";break;
    case 31:$titol="Derrotas locales";break;
    case 32:$titol="Derrotas visitante";break;
    case 4:$titol="Sin recibir goles";break;
    case 41:$titol="Imbatido en casa";break;
    case 42:$titol="Imbatido fuera";break;
    case 5:$titol="Partidos donde a marcado";break;
    case 51:$titol="Ha marcado en casa";break;
    case 52:$titol="Ha marcado fuera";break; 
    case 6:$titol="Todos los puntos";break;
    case 61:$titol="Puntos como local";break;
    case 62:$titol="Puntos como visitante";break;

    default:$titol="Todos sus partidos";break;
}


        ?>
<table class="table table-bordered table-condensed whitebox nomargin">
    <thead>
        <tr class="darkgreenbox">
            <th class="text-center">Fecha</th>
            <th class="text-center hidden-xs">Jda</th>
            <form method="get" action="/historico/liga/index.php" name="formulaPatron" id="2">
            <th class="text-center" colspan="3">
                 <span class="visible-xs" colspan="3"><?php echo $equipo_nombre?></span>
                <input type="hidden" name="todos" value="1">
                <input type="hidden" name="equipo" value="<?php echo $equipo_id?>">
<select size="1" name="patron" onChange="return patron_onchange()">
<option <?php if ($patron==0) { echo "selected"; }?> value="0">Todos sus partidos</option>
<option <?php if ($patron==1) { echo "selected"; }?> value="1">Todas las victorias</option>
<option <?php if ($patron==11) { echo "selected"; }?> value="11">Victorias locales</option>
<option <?php if ($patron==12) { echo "selected"; }?> value="12">Victorias visitante</option>
<option <?php if ($patron==2) { echo "selected"; }?> value="2">Todos los empates</option>
<option <?php if ($patron==21) { echo "selected"; }?> value="21">Empates locales</option>
<option <?php if ($patron==22) { echo "selected"; }?> value="22">Empates visitante</option>
<option <?php if ($patron==3) { echo "selected"; }?> value="3">Todas las derrotas</option>
<option <?php if ($patron==31) { echo "selected"; }?> value="31">Derrotas locales</option>
<option <?php if ($patron==32) { echo "selected"; }?> value="32">Derrotas visitante</option>
<option <?php if ($patron==6) { echo "selected"; }?> value="6">Todos los puntos</option>
<option <?php if ($patron==61) { echo "selected"; }?> value="61">Puntos locales</option>
<option <?php if ($patron==62) { echo "selected"; }?> value="62">Puntos visitante</option>
<option <?php if ($patron==4) { echo "selected"; }?> value="4">Sin recibir goles</option>
<option <?php if ($patron==41) { echo "selected"; }?> value="41">Imbatido en casa</option>
<option <?php if ($patron==42) { echo "selected"; }?> value="42">Imbatido fuera</option>
<option <?php if ($patron==5) { echo "selected"; }?> value="5">Partidos donde marca</option>
<option <?php if ($patron==51) { echo "selected"; }?> value="51">Ha marcado en casa</option>
<option <?php if ($patron==52) { echo "selected"; }?> value="52">Ha marcado fuera</option>
</select>            
            </th></form>
            <th class="text-center hidden-xs" colspan="3"><?php echo $equipo_nombre?></th>
            
        </tr>
    </thead>
    <tbody class="whitebox">
            <?php 

$colorFondo="whitebox";$idt=0;$k=0;
$colorCelda = '#F8E0F7';
$gcT=0;$gfT=0;$ecT=0;$efT=0;$pcT=0;$pfT=0;$gfcT=0;$gffT=0;$gccT=0;$gcfT=0;
$gcT1=0;$gfT1=0;$ecT1=0;$efT1=0;$pcT1=0;$pfT1=0;$gfcT1=0;$gffT1=0;$gccT1=0;$gcfT1=0;
$gcT2=0;$gfT2=0;$ecT2=0;$efT2=0;$pcT2=0;$pfT2=0;$gfcT2=0;$gffT2=0;$gccT2=0;$gcfT2=0;
$gcT3=0;$gfT3=0;$ecT3=0;$efT3=0;$pcT3=0;$pfT3=0;$gfcT3=0;$gffT3=0;$gccT3=0;$gcfT3=0;
$gcT4=0;$gfT4=0;$ecT4=0;$efT4=0;$pcT4=0;$pfT4=0;$gfcT4=0;$gffT4=0;$gccT4=0;$gcfT4=0;

            foreach ($todos as $key => $fila) { 

                if ($fila['local']=='SIN PAIS' || $fila['visitante']=='SIN PAIS'){ 
                    $idt=$fila['idTemporada'];
                    if ('#E0F2F7' == $colorCelda) {
                        $colorCelda = '#F8E0F7';
                    } else {
                        $colorCelda = '#E0F2F7';
                    }  
                    continue; 
                }

                if ('#E0F2F7' == $colorCelda) {
                    $colorCelda = '#F8E0F7';
                } else {
                    $colorCelda = '#E0F2F7';
                } 

                if ($idt != $fila['idTemporada']) {                    

                    if ($key>0){ ?>

                        <tr class="cajagrisoscuro">
                        <td class="text-center" colspan="8">
<div class="col-xs-12" style="float:left;">
    <div class="marco" style="float:left;">    
    G - <?php echo $gcT+$gfT?>                           
    <span class="badge" style="font-weight:300; background-color:#0B610B"><?php echo $gcT?></span>
    <span class="badge" style="font-weight:300; background-color:#01DF01"><?php echo $gfT?></span>
    </div><div class="marco" style="float:left;">
    E - <?php echo $ecT+$efT?>
    <span class="badge" style="font-weight:300; background-color:orange"><?php echo $ecT?></span>
    <span class="badge" style="font-weight:300; background-color:#FACC2E"><?php echo $efT?></span>
    </div><div class="marco" style="float:left;">
    P - <?php echo $pcT+$pfT?>
    <span class="badge" style="font-weight:300; background-color:#B40404"><?php echo $pcT?></span>
    <span class="badge" style="font-weight:300; background-color:#FE642E"><?php echo $pfT?></span>
    </div><div class="marco" style="float:left;">
    GF - <?php echo $gfcT+$gffT?> 
    <span class="badge" style="font-weight:300; background-color:#0B2161"><?php echo $gfcT?></span>
    <span class="badge" style="font-weight:300; background-color:#013ADF"><?php echo $gffT?></span>
    </div><div class="marco" style="float:left;">
    GC - <?php echo $gccT+$gcfT?> 
    <span class="badge" style="font-weight:300; background-color:#424242"><?php echo $gccT?></span>
    <span class="badge" style="font-weight:300; background-color:#A4A4A4"><?php echo $gcfT?></span>
    </div>
</div>

                        </td>
                    </tr>

                    <?php 
        switch ($idD) {
            case 1:
$gcT1=($gcT1+$gcT);$gfT1=($gfT1+$gfT);$ecT1=($ecT1+$ecT);$efT1=($efT1+$efT);
$pcT1=($pcT1+$pcT);$pfT1=($pfT1+$pfT);$gfcT1=($gfcT1+$gfcT);$gffT1=($gffT1+$gffT);
$gccT1=($gccT1+$gccT);$gcfT1=($gcfT1+$gcfT);
            break;
            case 2:
$gcT2=($gcT2+$gcT);$gfT2=($gfT2+$gfT);$ecT2=($ecT2+$ecT);$efT2=($efT2+$efT);
$pcT2=($pcT2+$pcT);$pfT2=($pfT2+$pfT);$gfcT2=($gfcT2+$gfcT);$gffT2=($gffT2+$gffT);
$gccT2=($gccT2+$gccT);$gcfT2=($gcfT2+$gcfT);
            break;
            case 3:
$gcT3=($gcT3+$gcT);$gfT3=($gfT3+$gfT);$ecT3=($ecT3+$ecT);$efT3=($efT3+$efT);
$pcT3=($pcT3+$pcT);$pfT3=($pfT3+$pfT);$gfcT3=($gfcT3+$gfcT);$gffT3=($gffT3+$gffT);
$gccT3=($gccT3+$gccT);$gcfT3=($gcfT3+$gcfT);
            break;
            case 4:
$gcT4=($gcT4+$gcT);$gfT4=($gfT4+$gfT);$ecT4=($ecT4+$ecT);$efT4=($efT4+$efT);
$pcT4=($pcT4+$pcT);$pfT4=($pfT4+$pfT);$gfcT4=($gfcT4+$gfcT);$gffT4=($gffT4+$gffT);
$gccT4=($gccT4+$gccT);$gcfT4=($gcfT4+$gcfT);
            break;
        }

                $gcT=0;$gfT=0;$ecT=0;$efT=0;$pcT=0;$pfT=0;$gfcT=0;$gffT=0;$gccT=0;$gcfT=0;

                }


                    ?>

                    <tr class="cajanaranja">
                    <td class="text-center">
                        <a href="/historico/liga/index.php?temporada_id=<?php echo $fila['idTemporada']?>&temporada=<?php echo $fila['temporada']?>&edicion=<?php echo $fila['idDivision']?>&equipo_id=<?php echo $equipo_id?>"><?php echo $fila['temporada'].'-'.substr(($fila['temporada']+1),-2)?></a>
                    </td>
                    <td class="text-center" colspan="7">
                        <?php 
                        switch ($fila['idDivision']) {
                            case 1: echo " Primera División";break;
                            case 2: echo " Segunda División ";break;
                            case 3: echo " Segunda División B ";break;
                            case 4: echo " Tercera División ";break;
                        } ?>                         
                    </td> 
                    </tr>


                <?php }

$equipo_id=(int)$equipo_id;
$gc=0;$gf=0;$ec=0;$ef=0;$pc=0;$pf=0;$gfc=0;$gff=0;$gcc=0;$gcf=0;

if ( ($equipo_id == $fila['equipoLocal_id'] && $fila['goles_local'] < $fila['goles_visitante'])
    || ($equipo_id == $fila['equipoVisitante_id'] && $fila['goles_local'] > $fila['goles_visitante'])) {
        if ($equipo_id == $fila['equipoLocal_id']) { 
            $colorI='#B40404';$pc=1;$pcT++; 
        } else { 
            $colorI='#FE642E'; $pf=1;$pfT++;
        }
    $icono='<span class="badge" style="font-weight:300; background-color:'.$colorI.'">D</span>';
}

if ( ($equipo_id == $fila['equipoLocal_id'] && $fila['goles_local'] > $fila['goles_visitante'])
    || ($equipo_id == $fila['equipoVisitante_id'] && $fila['goles_local'] < $fila['goles_visitante'])) {
        if ($equipo_id == $fila['equipoLocal_id']) { 
            $colorI='#0B610B';$gc=1;$gcT++;
        } else { 
            $colorI='#01DF01';$gf=1;$gfT++;
        }
    $icono='<span class="badge" style="font-weight:300; background-color:'.$colorI.'">V</span>';
}


if ($fila['goles_local'] == $fila['goles_visitante']) {
    if ($equipo_id == $fila['equipoLocal_id']) { 
        $colorI='orange'; $ec=1;$ecT++;
    } else { 
        $colorI='#FACC2E'; $ef=1;$efT++;
    }
    $icono='<span class="badge" style="font-weight:300; background-color:'.$colorI.';">E</span>';
}

if ($equipo_id == $fila['equipoLocal_id']) {
    $gfc=$fila['goles_local'];$gcc=$fila['goles_visitante'];
    $gfcT=$gfcT+$gfc;$gccT=$gccT+$gcc;
    $iconoGF='<span class="badge" style="font-weight:300; background-color:#0B2161">'.$fila['goles_local'].'</span>';
    $iconoGC='<span class="badge" style="font-weight:300; background-color:#424242">'.$fila['goles_visitante'].'</span>';
}
if ($equipo_id == $fila['equipoVisitante_id']) {
    $gff=$fila['goles_visitante'];$gcf=$fila['goles_local'];
    $gffT=$gffT+$gff;$gcfT=$gcfT+$gcf;    
    $iconoGF='<span class="badge" style="font-weight:300; background-color:#013ADF">'.$fila['goles_visitante'].'</span>';
    $iconoGC='<span class="badge" style="font-weight:300; background-color:#A4A4A4">'.$fila['goles_local'].'</span>';
}

/*imp($fila);

imp('gc '.$gc);
imp('gf '.$gf);
imp('ec '.$ec);
imp('ef '.$ef);
imp('pc '.$pc);
imp('pf '.$pf);
imp($gfc);
imp($gff);
imp($gcc);
imp($gcf);*/


$salida=0;
if ($patron>0){
    switch ($patron) {
    case 1:if ($gc==0 && $gf==0){ $salida=1; } break;
    case 11:if ($gc==0){ $salida=1; } break;
    case 12:if ($gf==0){ $salida=1; } break;
    case 2:if ($ec==0 && $ef==0){ $salida=1; } break;
    case 21:if ($ec==0){ $salida=1; } break;
    case 22:if ($ef==0){ $salida=1; } break;
    case 3:if ($pc==0 && $pf==0){ $salida=1; } break;
    case 31:if ($pc==0){ $salida=1; } break;
    case 32:if ($pf==0){ $salida=1; } break;

    case 6:if ($pc>0 || $pf>0){ $salida=1; } break;
    case 61:
        if ($pc>0 || $pf>0){ $salida=1; }
        if ($equipo_id != $fila['equipoLocal_id']) { $salida=1; } 
    break;
    case 62:
        if ($pc>0 || $pf>0){ $salida=1; }
        if ($equipo_id == $fila['equipoLocal_id']) { $salida=1; }
    break;

    case 4:
        if ($equipo_id == $fila['equipoLocal_id']) { if ($gcc>0){ $salida=1; } }
        if ($equipo_id != $fila['equipoLocal_id']) { if ($gcf>0){ $salida=1; } }
    break;

    case 41:
        if ($equipo_id == $fila['equipoLocal_id']) { if ($gcc>0){ $salida=1; } } 
        if ($equipo_id != $fila['equipoLocal_id']) { $salida=1; } 
    break;
    case 42:
        if ($equipo_id == $fila['equipoVisitante_id']) { if ($gcf>0){ $salida=1; } } 
        if ($equipo_id == $fila['equipoLocal_id']) { $salida=1; } 
    break;
    case 5:
        if ($equipo_id == $fila['equipoLocal_id']) { if ($gfc==0){ $salida=1; } }
        if ($equipo_id != $fila['equipoLocal_id']) { if ($gff==0){ $salida=1; } }
    break;
    case 51:
        if ($equipo_id == $fila['equipoLocal_id']) { if ($gfc==0){ $salida=1; } } 
        if ($equipo_id != $fila['equipoLocal_id']) { $salida=1; } 
    break;
    case 52:
        if ($equipo_id == $fila['equipoVisitante_id']) { if ($gff==0){ $salida=1; } } 
        if ($equipo_id == $fila['equipoLocal_id']) { $salida=1; } 
    break; 
    }
}


if ($salida>0){ 
    $idt=$fila['idTemporada'];
    if ('#E0F2F7' == $colorCelda) {
        $colorCelda = '#F8E0F7';
    } else {
        $colorCelda = '#E0F2F7';
    }  
    continue; 
}


$fecha = substr($fila['fecha'], 0,10); ?>
                <tr style="font-size: 12px" class="<?php echo $colorFondo?>">
                    <td class="text-center"><?php echo $fecha?>

                    <table class="visible-xs" bgcolor="white" border="0"><tr>
                        <td><span class="visible-xs"><?php echo $icono?></span></td>
                        <td><span class="visible-xs"><?php echo $iconoGF?></span></td>
                        <td><span class="visible-xs"><?php echo $iconoGC?></span></td>
                    </tr></table>
                        

                    </td>                    
                    <?php 
                    if (($k+1)==$key){ 
                        if ('#E0F2F7' == $colorCelda) {
                            $colorCelda = '#F8E0F7';
                        } else {
                            $colorCelda = '#E0F2F7';
                        } 
                    } ?>
                    <td class="text-center hidden-xs" bgcolor="<?php echo $colorCelda?>"><?php echo $fila['jornada']?></td>
                    <td class="text-right"><?php echo $fila['local']?></td>
                    <td class="text-center" style="min-width: 50px">
                        <b><?php echo $fila['goles_local'].' - '.$fila['goles_visitante']?></b>
                        <span class="visible-xs" style="background-color:<?php echo $colorCelda?>">J-<?php echo $fila['jornada']?></span>
                        
                    </td>               
                    <td class="text-left"><?php echo $fila['visitante']?></td>
                    <td class="text-center hidden-xs"><?php echo $icono?></td>
                    <td class="text-center hidden-xs"><?php echo $iconoGF?></td>
                    <td class="text-center hidden-xs"><?php echo $iconoGC?></td>                       
                </tr>
                       
            <?php 
            $idt=$fila['idTemporada'];
            $idD=$fila['idDivision'];
            $k=$key;
        } 


        switch ($idD) {
            case 1:
$gcT1=($gcT1+$gcT);$gfT1=($gfT1+$gfT);$ecT1=($ecT1+$ecT);$efT1=($efT1+$efT);
$pcT1=($pcT1+$pcT);$pfT1=($pfT1+$pfT);$gfcT1=($gfcT1+$gfcT);$gffT1=($gffT1+$gffT);
$gccT1=($gccT1+$gccT);$gcfT1=($gcfT1+$gcfT);
            break;
            case 2:
$gcT2=($gcT2+$gcT);$gfT2=($gfT2+$gfT);$ecT2=($ecT2+$ecT);$efT2=($efT2+$efT);
$pcT2=($pcT2+$pcT);$pfT2=($pfT2+$pfT);$gfcT2=($gfcT2+$gfcT);$gffT2=($gffT2+$gffT);
$gccT2=($gccT2+$gccT);$gcfT2=($gcfT2+$gcfT);
            break;
            case 3:
$gcT3=($gcT3+$gcT);$gfT3=($gfT3+$gfT);$ecT3=($ecT3+$ecT);$efT3=($efT3+$efT);
$pcT3=($pcT3+$pcT);$pfT3=($pfT3+$pfT);$gfcT3=($gfcT3+$gfcT);$gffT3=($gffT3+$gffT);
$gccT3=($gccT3+$gccT);$gcfT3=($gcfT3+$gcfT);
            break;
            case 4:
$gcT4=($gcT4+$gcT);$gfT4=($gfT4+$gfT);$ecT4=($ecT4+$ecT);$efT4=($efT4+$efT);
$pcT4=($pcT4+$pcT);$pfT4=($pfT4+$pfT);$gfcT4=($gfcT4+$gfcT);$gffT4=($gffT4+$gffT);
$gccT4=($gccT4+$gccT);$gcfT4=($gcfT4+$gcfT);
            break;
        }



        ?>

                        <tr class="cajagrisoscuro">
                        <td class="text-center" colspan="8">
<div class="col-xs-12" style="float:left;">
    <div class="marco" style="float:left;">    
    G - <?php echo $gcT+$gfT?>                           
    <span class="badge" style="font-weight:300; background-color:#0B610B"><?php echo $gcT?></span>
    <span class="badge" style="font-weight:300; background-color:#01DF01"><?php echo $gfT?></span>
    </div><div class="marco" style="float:left;">
    E - <?php echo $ecT+$efT?>
    <span class="badge" style="font-weight:300; background-color:orange"><?php echo $ecT?></span>
    <span class="badge" style="font-weight:300; background-color:#FACC2E"><?php echo $efT?></span>
    </div><div class="marco" style="float:left;">
    P - <?php echo $pcT+$pfT?>
    <span class="badge" style="font-weight:300; background-color:#B40404"><?php echo $pcT?></span>
    <span class="badge" style="font-weight:300; background-color:#FE642E"><?php echo $pfT?></span>
    </div><div class="marco" style="float:left;">
    GF - <?php echo $gfcT+$gffT?> 
    <span class="badge" style="font-weight:300; background-color:#0B2161"><?php echo $gfcT?></span>
    <span class="badge" style="font-weight:300; background-color:#013ADF"><?php echo $gffT?></span>
    </div><div class="marco" style="float:left;">
    GC - <?php echo $gccT+$gcfT?> 
    <span class="badge" style="font-weight:300; background-color:#424242"><?php echo $gccT?></span>
    <span class="badge" style="font-weight:300; background-color:#A4A4A4"><?php echo $gcfT?></span>
    </div>
</div>

                        </td>
                    </tr>        




            </tbody>
        </table>

    <table class="table table-bordered table-condensed whitebox nomargin">
    <?php
    if ($gcfT1>0) { ?>
        <tr class="darkgreenbox"><td>Primera División</td><td>

    <div class="marco" style="float:left;">    
    G - <?php echo $gcT1+$gfT1?><br />                          
    <span class="badge" style="font-weight:300; background-color:#0B610B"><?php echo $gcT1?></span>
    <span class="badge" style="font-weight:300; background-color:#01DF01"><?php echo $gfT1?></span>
    </div></td><td><div class="marco" style="float:left;">
    E - <?php echo $ecT1+$efT1?><br /> 
    <span class="badge" style="font-weight:300; background-color:orange"><?php echo $ecT1?></span>
    <span class="badge" style="font-weight:300; background-color:#FACC2E"><?php echo $efT1?></span>
    </div></td><td><div class="marco" style="float:left;">
    P - <?php echo $pcT1+$pfT1?><br /> 
    <span class="badge" style="font-weight:300; background-color:#B40404"><?php echo $pcT1?></span>
    <span class="badge" style="font-weight:300; background-color:#FE642E"><?php echo $pfT1?></span>
    </div></td><td><div class="marco" style="float:left;">
    GF - <?php echo $gfcT1+$gffT1?><br />  
    <span class="badge" style="font-weight:300; background-color:#0B2161"><?php echo $gfcT1?></span>
    <span class="badge" style="font-weight:300; background-color:#013ADF"><?php echo $gffT1?></span>
    </div></td><td><div class="marco" style="float:left;">
    GC - <?php echo $gccT1+$gcfT1?><br />  
    <span class="badge" style="font-weight:300; background-color:#424242"><?php echo $gccT1?></span>
    <span class="badge" style="font-weight:300; background-color:#A4A4A4"><?php echo $gcfT1?></span>
    </div>

            
        </td></tr>
    <?php } ?>
    <?php 
    if ($gcfT2>0) { ?>
        <tr class="darkgreenbox"><td>Segunda División</td><td>
   <div class="marco" style="float:left;">    
    G - <?php echo $gcT2+$gfT2?><br />                            
    <span class="badge" style="font-weight:300; background-color:#0B610B"><?php echo $gcT2?></span>
    <span class="badge" style="font-weight:300; background-color:#01DF01"><?php echo $gfT2?></span>
    </div></td><td><div class="marco" style="float:left;">
    E - <?php echo $ecT2+$efT2?><br /> 
    <span class="badge" style="font-weight:300; background-color:orange"><?php echo $ecT2?></span>
    <span class="badge" style="font-weight:300; background-color:#FACC2E"><?php echo $efT2?></span>
    </div></td><td><div class="marco" style="float:left;">
    P - <?php echo $pcT2+$pfT2?><br /> 
    <span class="badge" style="font-weight:300; background-color:#B40404"><?php echo $pcT2?></span>
    <span class="badge" style="font-weight:300; background-color:#FE642E"><?php echo $pfT2?></span>
    </div></td><td><div class="marco" style="float:left;">
    GF - <?php echo $gfcT2+$gffT2?><br />  
    <span class="badge" style="font-weight:300; background-color:#0B2161"><?php echo $gfcT2?></span>
    <span class="badge" style="font-weight:300; background-color:#013ADF"><?php echo $gffT2?></span>
    </div></td><td><div class="marco" style="float:left;">
    GC - <?php echo $gccT2+$gcfT2?><br />  
    <span class="badge" style="font-weight:300; background-color:#424242"><?php echo $gccT2?></span>
    <span class="badge" style="font-weight:300; background-color:#A4A4A4"><?php echo $gcfT2?></span>
    </div>
        </td></tr>
    <?php } ?>
    <?php 
    if ($gcfT3>0) { ?>
        <tr class="darkgreenbox"><td>Segunda División B</td><td>

    <div class="marco" style="float:left;">    
    G - <?php echo $gcT3+$gfT3?><br />                           
    <span class="badge" style="font-weight:300; background-color:#0B610B"><?php echo $gcT3?></span>
    <span class="badge" style="font-weight:300; background-color:#01DF01"><?php echo $gfT3?></span>
    </div></td>
    <td><div class="marco" style="float:left;">
    E - <?php echo $ecT3+$efT3?><br />
    <span class="badge" style="font-weight:300; background-color:orange"><?php echo $ecT3?></span>
    <span class="badge" style="font-weight:300; background-color:#FACC2E"><?php echo $efT3?></span>
    </div></td><td><div class="marco" style="float:left;">
    P - <?php echo $pcT3+$pfT3?><br />
    <span class="badge" style="font-weight:300; background-color:#B40404"><?php echo $pcT3?></span>
    <span class="badge" style="font-weight:300; background-color:#FE642E"><?php echo $pfT3?></span>
    </div></td><td><div class="marco" style="float:left;">
    GF - <?php echo $gfcT3+$gffT3?><br /> 
    <span class="badge" style="font-weight:300; background-color:#0B2161"><?php echo $gfcT3?></span>
    <span class="badge" style="font-weight:300; background-color:#013ADF"><?php echo $gffT3?></span>
    </div></td><td><div class="marco" style="float:left;">
    GC - <?php echo $gccT3+$gcfT3?><br /> 
    <span class="badge" style="font-weight:300; background-color:#424242"><?php echo $gccT3?></span>
    <span class="badge" style="font-weight:300; background-color:#A4A4A4"><?php echo $gcfT3?></span>
    </div>
           
        </td></tr>
    <?php } ?>
    <?php 
    
    if ($gcfT4>0) { ?>
        <tr class="darkgreenbox"><td>Tercera División</td>
            <td>
    <div class="marco" style="float:left;">    
    G - <?php echo $gcT4+$gfT4?><br/ >                           
    <span class="badge" style="font-weight:300; background-color:#0B610B"><?php echo $gcT4?></span>
    <span class="badge" style="font-weight:300; background-color:#01DF01"><?php echo $gfT4?></span>
    </div></td><td class="text-center"><div class="marco" style="float:left;">
    E - <?php echo $ecT4+$efT4?><br/ >
    <span class="badge" style="font-weight:300; background-color:orange"><?php echo $ecT4?></span>
    <span class="badge" style="font-weight:300; background-color:#FACC2E"><?php echo $efT4?></span>
    </div></td><td class="text-center"><div class="marco" style="float:left;">
    P - <?php echo $pcT4+$pfT4?><br/ >
    <span class="badge" style="font-weight:300; background-color:#B40404"><?php echo $pcT4?></span>
    <span class="badge" style="font-weight:300; background-color:#FE642E"><?php echo $pfT4?></span>
    </div></td><td class="text-center"><div class="marco" style="float:left;">
    GF - <?php echo $gfcT4+$gffT4?><br/ > 
    <span class="badge" style="font-weight:300; background-color:#0B2161"><?php echo $gfcT4?></span>
    <span class="badge" style="font-weight:300; background-color:#013ADF"><?php echo $gffT4?></span>
    </div></td><td class="text-center"><div class="marco" style="float:left;">
    GC - <?php echo $gccT4+$gcfT4?><br/ > 
    <span class="badge" style="font-weight:300; background-color:#424242"><?php echo $gccT4?></span>
    <span class="badge" style="font-weight:300; background-color:#A4A4A4"><?php echo $gcfT4?></span>
    </div>
        </td></tr>
    <?php } ?>
</table>
    <?php }



    if (isset($_GET['enf'])) { ?>
			<table class="table table-bordered table-condensed whitebox nomargin">
			<thead>
				<tr class="darkgreenbox">
					<th class="text-center">Temporada</th>
					<th class="text-center" colspan="4">Partido</th>															
				</tr>
			</thead>
			<tbody class="whitebox">					 
				<?php	
                    foreach ($enfrentamientos as $partido) {
                        $css1 = '';
                        $css2 = '';
                        if ('1900-01-01' == $partido['fecha']) {
                            $partido['fecha'] = '';
                        }

                        $nt = $partido['nt'];
                        $ntText=$nt.'-'.substr(($nt + 1), -2);
                        $fecha = date_create($partido['fecha']);
                        if (4 == strlen($partido['hora'])) {
                            $hora = substr($partido['hora'], 0, 2).':'.substr($partido['hora'], -2);
                        } else {
                            $hora = '';
                        } ?>													
					<tr>														
						<td class="text-center" style="font-size:10px"><?php echo $ntText; ?>
						 - <?php echo 'Jornada '.$partido['ne']; ?><br />
						 <?php echo date_format($fecha, 'd/m/y').' '.$hora; ?></td>
						<td class="text-center"><?php echo $partido['local']; ?></td>
						<td class="text-center" style="font-weight:bold; min-width:50px;">
							<?php echo $partido['resulCasa']; ?> - <?php echo $partido['resulFuera']; ?>
						</td>
						<td class="text-center"><?php echo $partido['visitante']; ?></td>
					
						<td align="center">
						<?php 
                        $enlace = '/historico-liga/'.poner_guion(trim($ntText)).'/'.poner_guion(trim($txtDivision)).'/'.poner_guion($partido['local']).'-'.poner_guion($partido['visitante']).'/jornada-'.$partido['ne'].'/partido/'.$partido['id']; ?>
							<a href="<?php echo $enlace; ?>">
								<span class="glyphicon glyphicon-eye-open iconhover pull-right" style="cursor:pointer;
                border: 1px solid black; padding:3px" title="Partido entre <?=$partido['local'];?> y <?=$partido['visitante'];?> "></span>
							</a>
						</td>
					</tr>
						
						<?php
                    }

    $enlace = '/historico-liga/titulos/'.poner_guion($txtDivision).'/'.poner_guion($equipo_nombre2).'/'.$equipo2.'/'.$division; 
    $rutaEscudo = '/img/equipos/escudo'.$equipo2.'.png';
    if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaEscudo))) {
        $rutaEscudo = '/img/jugadores/NI.png';
    }?>

					<tr><td class="text-center" colspan="7">
                        <div class="marco" style="text-align:left !important"><img src="<?php echo $rutaEscudo; ?>"  itemprop="logo" alt="escudo <?php echo $equipo_nombre2; ?>"  style="width:18px; height:20px; margin-right: 5px">
                        <a href="<?php echo $enlace; ?>"><?php echo $equipo_nombre2; ?> palmarés</a></div>
                    </td></tr>
						
				
			</tbody>
		</table>
   <?php   } 

   $rutaEscudo = '/img/equipos/escudo'.$equipo_id.'.png';
    if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaEscudo))) {
        $rutaEscudo = '/img/jugadores/NI.png';
    }

   ?>

	<div class="col-xs-6">
		<hr /><h3 class="panel-title" style="padding-bottom: 20px">Participaciones del <?php echo $equipo_nombre; ?> en <?php echo $txtDivision; ?></h3>
        <h3 class="panel-title marco" style="padding-bottom: 20px">
            <img src="<?php echo $rutaEscudo; ?>" class="img-rounded" alt="escudo">
		<?php 
        $historial=historialEquipo($equipo_id);?>

        <div class="col-xs-12 marco text-center">
            
            <?php if ($historial['fundado'] > 0) { ?>
            Fundado en <?php echo $historial['fundado']; ?>
            <?php
        } 
        if ($historial['copas'] > 0) {?>
            <br /><a href="/historico-copa-participaciones/<?php echo poner_guion($historial['nombre']); ?>/<?php echo $historial['id']; ?>">Copa de España (<?php echo $historial['copas']; ?>)</a>
            <?php
        } 
        if ($historial['primera'] > 0) {?>
            <br /><a href="/historico-liga/titulos/primera-division/<?php echo poner_guion($historial['nombre']); ?>/<?php echo $historial['id']; ?>/1">Primera División (<?php echo $historial['primera']; ?>)</a>
            <?php
        } 
        if ($historial['segunda'] > 0) { ?>
            <br /><a href="/historico-liga/titulos/segunda-division/<?php echo poner_guion($historial['nombre']); ?>/<?php echo $historial['id']; ?>/2">Segunda División (<?php echo $historial['segunda']; ?>)</a>
            <?php
        } 
        if ($historial['segundab'] > 0) { ?>            
            <br /><a href="/historico-liga/titulos/segunda-division-b/<?php echo poner_guion($historial['nombre']); ?>/<?php echo $historial['id']; ?>/3">Segunda División B (<?php echo $historial['segundab']; ?>)</a>
            <?php
        } 
        if ($historial['tercera'] > 0) { ?>
            <br /><a href="/historico-liga/titulos/tercera-division/<?php echo poner_guion($historial['nombre']); ?>/<?php echo $historial['id']; ?>/4">Tercera División (<?php echo $historial['tercera']; ?>)</a>
            <?php
        } ?>
        </div>
        <div class="h40 clear"></div>

        <?php
        foreach ($partisyrivales['participacionesEquipo'] as $parti) {
            $colorFondo="white";         
            if ($parti['posicion']==1){ $colorFondo="gold"; }
            if ($parti['posicion']==2){ $colorFondo="silver"; }
            $nt = $parti['nombre_temporada'];
            $enlace = '/historico-liga/temporada-'.$nt.'-'.substr(($nt + 1), -2).'/torneo/'.trim(poner_guion($txtDivision)).'/'.$parti['temporada_id'].'/'.$nt.'/'.$division.'&equipo_id='.$equipo_id;
            echo '<div class="marco" style="background-color:'.$colorFondo.'">Temporada <a href='.$enlace.'>'.$nt.'-'.substr(($nt + 1), -2).'</a> <b>'.$parti['posicion'].'º</b> de '.$parti['equipos'].'</div>';            
        } ?>
	</div>

	<div class="col-xs-6">
		<hr /><h3 class="panel-title" style="padding-bottom: 20px">Rivales del <?php echo $equipo_nombre; ?> en <?php echo $txtDivision; ?></h3>
		<?php $nuevo = array();
        asort($partisyrivales['rivales']);
        foreach ($partisyrivales['rivales'] as $key => $val) { $nuevo[$key] = $val;}
        foreach ($nuevo as $parti) {
            if ('sin jugar' == $parti['nombre']) {continue;}
            $rutaEscudo = '/img/equipos/escudo'.$parti['fm_id'].'.png';
            if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaEscudo))) {
                $rutaEscudo = '/img/jugadores/NI.png';
            }
            $enlace = '/historico-liga/'.poner_guion($equipo_nombre).'-vs-'.poner_guion($parti['nombre']).'/enfrentamientos/'.$equipo_id.'/'.$parti['fm_id'].'/'.$division;
            echo '<div class="marco" style="text-align:left !important"><img src="'.$rutaEscudo.'"  itemprop="logo" alt="escudo '.$parti['nombre'].'"  style="width:18px; height:20px; margin-right: 5px"> <a href='.$enlace.'>'.$parti['nombre'].'</a></div>';
        } ?>
	</div>
</div>
