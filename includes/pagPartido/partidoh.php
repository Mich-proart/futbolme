<?php 

$pos = strpos($partido['youtube_id'], 'Undefined');
        //echo $cadena." ".$value;
        if ($pos > 0) {
            $partido['youtube_id'] = null;
        }

?>


 <div class="clear col-xs-12 whitebox h40">
        <a class="pull-right" href="/temporada.php?id=<?php echo $temporada_id; ?>">
            <?php echo $nombreTorneo; ?>
        </a>
 </div>
 <div class="col-xs-12 greenbox nomargin">
 
 <div class="col-xs-6">
    <h4 class="boldfont"><?php echo $partido['nombreTemporada']; ?></h4>
 </div>       
    
     <div class="col-xs-6">  
        <span class="pull-right"><?php

        $partido['hora_prevista'] = ltrim($partido['hora_prevista']);
        if (strlen($partido['hora_prevista']) > 3) {
            $h = ' a las '.substr($partido['hora_prevista'], 0, 2).':'.substr($partido['hora_prevista'], 3, 2);
            echo utf8_encode(nombreDiaCompleto($partido['fecha'])).$h;
        }?>
        <br />
            <b>Jornada <?php echo $partido['jornada']; ?></b>
        
        </span>
    </div>
                         
</div>
<!--Fin row Jornada y división-->
<!--Begin Equipo y puesto-->
<div class="row">
<div class="col-xs-12 nopadding">
    <div class="col-xs-6 text-center border-right-black">
        <h4><?php echo $partido['local']; ?></h4>
    </div>
    <div class="col-xs-6 text-center">
        <h4><?php echo $partido['visitante']; ?></h4>
    </div>
</div>
</div>
<!--Finish Row Jornada y división-->


<!--Begin match teams-->
<div class="row">
<div class="row h10"></div>
<div class="col-xs-3 col-md-4 col-lg-4 text-center" style="max-height:200px">
    <?php if (1 == $partido['es_seleccion']) {
            ?>
    <img class="escudo_ind" src="/img/paises/banderas/ban<?php echo $partido['paisLocal_id']; ?>.png" alt="bandera">
    <?php
        } else {
            ?>                            
    <img class="escudo_ind" src="/img/equipos/escudo<?php echo $partido['equipoLocal_id']; ?>.png" alt="escudo">
    <?php
        } ?>
</div>

<div class="col-xs-3 col-md-2 col-lg-2 blackbox text-center border-right-white" style="border-radius: 10px; background-color:black;">
    <p class="marcador"><?php echo $partido['goles_local']; ?></p>
</div>
<div class="col-xs-3 col-md-2 col-lg-2 blackbox text-center border-left-white" style="border-radius: 10px; background-color:black;">
    <p class="marcador"><?php echo $partido['goles_visitante']; ?></p>
    </div>
<div class="col-xs-3 col-md-4 col-lg-4 text-center" style="max-height:200px;">
    <?php if (1 == $partido['es_seleccion']) {
            ?>
    <img class="escudo_ind" src="/img/paises/banderas/ban<?php echo $partido['paisVisitante_id']; ?>.png" alt="bandera">
    <?php
        } else {
            ?>  
    <img class="escudo_ind" src="/img/equipos/escudo<?php echo $partido['equipoVisitante_id']; ?>.png" alt="escudo">
    <?php
        } ?>
</div>
</div>

<?php 
$todo = array();

foreach ($golesTarjetas['local'] as $GolT) {
    if (2 == $GolT['tipo']) {
        continue;
    }
    $todo[] = $GolT;
}
foreach ($golesTarjetas['visitante'] as $GolT) {
    if (2 == $GolT['tipo']) {
        continue;
    }
    $todo[] = $GolT;
}

usort($todo, function ($a, $b) {
    return $a['minuto'] - $b['minuto'];
});

$j = ''; $m = ''; $g = ''; $t = '';
foreach ($todo as $k => $valor) {
    if ($j == $valor['jugador_id'] && $m == $valor['minuto'] && $g == $valor['gol'] && (0 == $t || 1 == $t) && $valor['tipo'] < 2) {
        $todo1[$k - 1]['tipo'] = 25;
    } else {
        $todo1[] = $valor;
    }
    $j = $valor['jugador_id'];
    $m = $valor['minuto'];
    $g = $valor['gol'];
    $t = $valor['tipo'];
}
$eL = ''; $m = ''; $t = ''; $j = '';

if (count($todo) > 0) {
    foreach ($todo1 as $kk => $valor) {
        //imp($valor['nombreJugador']." ".$valor['tipo']);
        if (1 == $valor['gol']) {
            $todoOk[$valor['esLocal'].'-gol-'.$valor['minuto']] = $valor;
        } else {
            if ($valor['tipo'] < 2 || 25 == $valor['tipo']) {
                $todoOk[$valor['esLocal'].'-tarjeta-'.$valor['jugador_id']] = $valor;
            } else { //si es cambio se procede
                if (isset($todoOk[$valor['esLocal'].'-cambio-'.$valor['observaciones']])) {
                    //si es el segundo jugador del cambio, se comprueba si es el que entra o el que sale
                    if ($todoOk[$valor['esLocal'].'-cambio-'.$valor['observaciones']]['tipo'] == 3) {
                        $todoOk[$valor['esLocal'].'-cambio-'.$valor['observaciones']]['nombreJugador2'] = $valor['nombreJugador'];
                        $todoOk[$valor['esLocal'].'-cambio-'.$valor['observaciones']]['jugador_id2'] = $valor['jugador_id'];
                    } else {
                        //si es el que sale
                        $todoOk[$valor['esLocal'].'-cambio-'.$valor['observaciones']]['nombreJugador2'] = $todoOk[$valor['esLocal'].'-cambio-'.$valor['observaciones']]['nombreJugador'];
                        $todoOk[$valor['esLocal'].'-cambio-'.$valor['observaciones']]['jugador_id2'] = $todoOk[$valor['esLocal'].'-cambio-'.$valor['observaciones']]['jugador_id'];
                        $todoOk[$valor['esLocal'].'-cambio-'.$valor['observaciones']]['nombreJugador'] = $valor['nombreJugador'];
                        $todoOk[$valor['esLocal'].'-cambio-'.$valor['observaciones']]['jugador_id'] = $valor['jugador_id'];
                    }
                } else {
                    //si es el primer jugador del cambio se añade
                    $todoOk[$valor['esLocal'].'-cambio-'.$valor['observaciones']] = $valor;
                }
            }
        }
    } ?>
<!--Begin Goals/Cards-->
<div class="col-xs-12" style="background-color: #EFEFEF;"> 
<table class="col-xs-12">
<?php 
$cambioTiempo = 0;
    $contador = 0;

    foreach ($todoOk as $k => $GolT) {
        $txtMinuto = substr($GolT['minuto'], 1);

        if (strlen($txtMinuto) < 2) {
            $txtMinuto = '&nbsp;&nbsp;'.$txtMinuto;
        }
        $tiempo = substr($GolT['minuto'], 0, 1);
        if (0 == $contador) {
            ?>
<tr style="height:40px;"><td colspan="2" class="text-center"><span class="label label-warning">Primer Tiempo</span></td></tr>
<?php
        }
        if (0 == $cambioTiempo && 2 == $tiempo) {
            ?>
<tr style="height:40px;"><td colspan="2" class="text-center"><span class="label label-warning">Segundo Tiempo</span></td></tr>
<?php 
$cambioTiempo = 1;
        }

        $txtGol = '';
        $colorBalon = 'black';
        if (10 == $GolT['tipo']) {
            $colorBalon = 'red';
        }
        if (11 == $GolT['tipo']) {
            $colorBalon = 'dimgray';
        }
        //if ($GolT['tipo']==1) { $txtGol=" <i>penalti</i>  ";}
        if ($GolT['minuto'] > 200) {
            $txtTiempo = '2ºT';
        } else {
            $txtTiempo = '1ºT';
        } ?>
    <tr>
    <?php if (1 == $GolT['esLocal']) {
            ?>
    <td class="col-xs-6 text-right"  style="height:25px; border-bottom: 1px solid dimgray">
    <?php if (1 == $GolT['gol']) {
                ?>              
        
        <?php echo $txtGol; ?><a href="/jugador.php?id=<?php echo $GolT['jugador_id']; ?>"><?php echo $GolT['nombreJugador']; ?></a>
        <?php if (11 == $GolT['tipo']) {
                    ?>
        <span style="background-color:red; margin-right: -16px; font-size:7px; padding: 2px 5px" class="badge" title="Penalti fallado">F</span>
        <?php
                } ?>
        <?php if (1 == $GolT['tipo']) {
                    ?>
        <span style="background-color:green; margin-right: -16px; font-size:7px; padding: 2px 5px" class="badge" title="Gol de penalti">P</span>
        <?php
                } ?>
        <span style="color:<?php echo $colorBalon; ?>" class="iconseparate fa fa-futbol-o"></span>
        
        
        <span class="label label-info"><?php echo $txtMinuto; ?></span>
    
    <?php
            } else {
                ?>

          <a href="/jugador.php?id=<?php echo $GolT['jugador_id']; ?>"><?php echo $GolT['nombreJugador']; ?></a>
             <?php if (0 == $GolT['tipo']) {
                    ?>
            <span class="iconseparate"><img src="/img/ta.png" height="17" style="margin-bottom:3px"></span>
            <?php
                } elseif (1 == $GolT['tipo']) {
                    ?>
            <span class="iconseparate"><img src="/img/tr.png" height="17" style="margin-bottom:3px"></span>
            <?php
                } elseif ((3 == $GolT['tipo'] || 4 == $GolT['tipo']) && (isset($GolT['jugador_id2']))) {
                    ?>
            <span style='color:maroon;' class='glyphicon glyphicon-arrow-right'></span><span style='color:green;' class='iconseparate glyphicon glyphicon-arrow-left'></span>
            <a href="/jugador.php?id=<?php echo $GolT['jugador_id2']; ?>"><?php echo $GolT['nombreJugador2']; ?></a>
          
            
            <?php
                } elseif (25 == $GolT['tipo']) {
                    ?>
            <span><img src="/img/ta.png" height="17" style="margin-bottom:3px"></span> <span><img src="/img/tr.png" height="17" style="margin-bottom:3px"></span>
            <?php
                } ?>
            <span class="label label-info"><?php echo $txtMinuto; ?></span> 
     <?php
            } ?>
    </td><td class="col-xs-6" style="height:25px"></td>
    <?php
        } else {
            ?>
    <td class="col-xs-6" style="height:25px"></td><td class="col-xs-6" style="height:25px; border-bottom: 1px solid dimgray">

        <?php if (1 == $GolT['gol']) {
                ?>              
            <span class="label label-info"><?php echo $txtMinuto; ?></span> 
            
            <span style="color:<?php echo $colorBalon; ?>" class="iconseparate fa fa-futbol-o"></span>
            <?php if (11 == $GolT['tipo']) {
                    ?>
            <span style="background-color:red; margin-left: -16px; font-size:7px; padding: 2px 5px" class="badge" title="Penalti fallado">F</span>
            <?php
                } ?>
            <?php if (1 == $GolT['tipo']) {
                    ?>
            <span style="background-color:green; margin-left: -16px; font-size:7px; padding: 2px 5px" class="badge" title="Gol de penalti">P</span>
            <?php
                } ?>

            <a href="/jugador.php?id=<?php echo $GolT['jugador_id']; ?>"><?php echo $GolT['nombreJugador']; ?></a>  <?php echo $txtGol; ?>
            



            <?php
            } else {
                ?>
            <span class="label label-info"><?php echo $txtMinuto; ?></span> 
                
                <?php if (0 == $GolT['tipo']) {
                    ?>
                <span class="iconseparate"><img src="/img/ta.png" height="17" style="margin-bottom:3px"></span>
                <?php
                } elseif (1 == $GolT['tipo']) {
                    ?>
                <span class="iconseparate"><img src="/img/tr.png" height="17" style="margin-bottom:3px"></span>
                <?php
                } elseif ((3 == $GolT['tipo'] || 4 == $GolT['tipo']) && (isset($GolT['jugador_id2']))) {
                    ?>
                <a href="/jugador.php?id=<?php echo $GolT['jugador_id2']; ?>"><?php echo $GolT['nombreJugador2']; ?></a>
          
                <span style='color:green;' class='iconseparate glyphicon glyphicon-arrow-right'></span><span style='color:maroon;' class='glyphicon glyphicon-arrow-left'></span>
                <?php
                } elseif (25 == $GolT['tipo']) {
                    ?>
                <span><img src="/img/ta.png" height="17" style="margin-bottom:3px"></span> <span><img src="/img/ta.png" height="17" style="margin-bottom:3px"></span>
                <?php
                } ?>
                &nbsp;&nbsp;<a href="/jugador.php?id=<?php echo $GolT['jugador_id']; ?>"><?php echo $GolT['nombreJugador']; ?></a>
        <?php
            } ?>
        
        
    </td>    
    <?php
        } ?>
    </tr>
<?php 
++$contador;
    } ?>
</table>
</div>

<?php
}

if (238 == $temporada_id && count($golesTarjetas['local']) > 0) {
    $estilo = '';
} else {
    $estilo = 'hide';
}?>
        <span class="<?php echo $estilo; ?>" style="cursor:pointer;" onclick="ver_alineaciones(<?php echo $partido_id; ?>,<?php echo $temporada_id; ?>,2)"><b class="caret pull-left" style="border-top: 12px solid;
                border-right: 8px solid transparent;
                border-left: 8px solid transparent; color:#337ab7; margin-top:5px;">
                <div style="margin-top:-14px; margin-left:12px; font-size:12px">alineaciones</div></b>  
        </span>
        <div style="clear:both"></div>
        <div id="alineaciones-<?php echo $partido_id; ?>"></div> 

                <?php if (strlen($partido['youtube_id']) > 4) {
    if ('*mdp' == substr($partido['youtube_id'], 0, 4)) {
        $c = substr($partido['youtube_id'], 4);
    }
    if (isset($c)) {
        ?>
                        <div style="clear:both"></div>
                        <span class='pull-right'>
                        <a class="pull-left" href="http://hemeroteca.mundodeportivo.com/preview<?php echo $c; ?>#&mode=fullScreen" target="_blank">
                        Ver la crónica de Mundo Deportivo <img src='/img/television/mdp.png' width='30' height='30'>
                        </a>
                        </span>
                    
                <?php
    }
}?> 

