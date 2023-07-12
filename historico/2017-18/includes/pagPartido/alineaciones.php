<?php 

$partidoGoles = XpartidoGoles($partido_id);
if (isset($sologol)) {
    $partidoTarjetas = array();
} else {
    $partidoTarjetas = XpartidoTarjetas($partido_id);
}
$golesTarjetas = prepararGolesTarjetas($partidoGoles, $partidoTarjetas);

//$golesTarjetas = prepararGolesTarjetas2($partidoGoles, $partidoTarjetas);
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
        $todo1[$k - 1]['tipo'] = 5;
    } else {
        //imp($valor);
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
            if ($valor['tipo'] < 2 || 5 == $valor['tipo']) {
                $todoOk[$valor['esLocal'].'-tarjeta-'.$valor['jugador_id'].$valor['tipo']] = $valor;
            } else { //si es cambio se procede
                if (isset($todoOk[$valor['esLocal']."-cambio-".$valor['observaciones']])) {
                //si es el segundo jugador del cambio, se comprueba si es el que entra o el que sale
                    if ($todoOk[$valor['esLocal']."-cambio-".$valor['observaciones']]['tipo']==3) {
                        $todoOk[$valor['esLocal']."-cambio-".$valor['observaciones']]['nombreJugador2']=$valor['nombreJugador'];
                        $todoOk[$valor['esLocal']."-cambio-".$valor['observaciones']]['jugador_id2']=$valor['jugador_id'];
                    } else {
                    //si es el que sale
                        $todoOk[$valor['esLocal']."-cambio-".$valor['observaciones']]['nombreJugador2']=$todoOk[$valor['esLocal']."-cambio-".$valor['observaciones']]['nombreJugador'];
                        $todoOk[$valor['esLocal']."-cambio-".$valor['observaciones']]['jugador_id2']=$todoOk[$valor['esLocal']."-cambio-".$valor['observaciones']]['jugador_id'];
                        $todoOk[$valor['esLocal']."-cambio-".$valor['observaciones']]['nombreJugador']=$valor['nombreJugador'];
                        $todoOk[$valor['esLocal']."-cambio-".$valor['observaciones']]['jugador_id']=$valor['jugador_id'];
                    }
                } else {
                  //si es el primer jugador del cambio se añade
                  $todoOk[$valor['esLocal']."-cambio-".$valor['observaciones']]=$valor;
                }
            }
        }
    } ?>

<!--Begin Goals/Cards-->
<div class="col-xs-12">
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
        $balon = '/img/balon.png';
        if (10 == $GolT['tipo']) {
            $balon = '/img/balonR.png';
        }
        if (11 == $GolT['tipo']) {
            $balon = '/img/balonG.png';
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
            <span class="iconseparate">
            <img src="<?php echo $balon; ?>" height="17" style="margin-bottom:3px">
            </span>
            
            
            <span class="label label-info"><?php echo $txtMinuto; ?></span>
        
        <?php
            } else {
                ?>

              <a href="index.php?modo=j&id=<?php echo $GolT['jugador_id']; ?>"><?php echo $GolT['nombreJugador']; ?></a>
                 <?php if (0 == $GolT['tipo']) {
                    ?>
                <span class="iconseparate"><img src="/img/ta.png" height="17" style="margin-bottom:3px"></span>
                <?php
                } elseif (1 == $GolT['tipo']) {
                    ?>
                <span class="iconseparate"><img src="/img/ta2.png" height="17" style="margin-bottom:3px"></span>
                <?php
                } elseif (5 == $GolT['tipo']) {
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
                
                <span class="iconseparate"><img src="<?php echo $balon; ?>" height="17" style="margin-bottom:3px"></span>
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

                <a href="index.php?modo=j&id=<?php echo $GolT['jugador_id']; ?>"><?php echo $GolT['nombreJugador']; ?></a>  <?php echo $txtGol; ?>
                



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
                    <span class="iconseparate"><img src="/img/ta2.png" height="17" style="margin-bottom:3px"></span>
                    <?php
                } elseif (5 == $GolT['tipo']) {
                    ?>
                    <span class="iconseparate"><img src="/img/tr.png" height="17" style="margin-bottom:3px"></span>

                    <?php
                } elseif ((3 == $GolT['tipo'] || 4 == $GolT['tipo']) && (isset($GolT['jugador_id2']))) {
                    ?>
                    <a href="index.php?modo=j&id=<?php echo $GolT['jugador_id2']; ?>"><?php echo $GolT['nombreJugador2']; ?></a>
              
                    <span style='color:green;' class='iconseparate glyphicon glyphicon-arrow-right'></span><span style='color:maroon;' class='glyphicon glyphicon-arrow-left'></span>
                    <?php
                } elseif (25 == $GolT['tipo']) {
                    ?>
                    <span><img src="/img/ta.png" height="17" style="margin-bottom:3px"></span> <span><img src="/img/ta.png" height="17" style="margin-bottom:3px"></span>
                    <?php
                } ?>
                    &nbsp;&nbsp;<a href="index.php?modo=j&id=<?php echo $GolT['jugador_id']; ?>"><?php echo $GolT['nombreJugador']; ?></a>
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
</div>


<?php } ?>


