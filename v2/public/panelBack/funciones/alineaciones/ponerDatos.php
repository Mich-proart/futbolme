<?php

    
    $campos = 'g.id, g.jugador_id, g.minuto, g.tipo, g.esLocal, g.partido_id, j.apodo nombreJugador,g.observaciones ';
    $tabla = 'partido p';
    $union = ' INNER JOIN gol g ON p.id=g.partido_id';
    $union .= ' INNER JOIN jugador j ON j.id=g.jugador_id';
    $condicion = ' WHERE p.id='.$partido_id.' AND g.jugador_id='.$filaJ['id'];
    $orden = ' ORDER BY g.minuto';
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
    //echo $consulta;
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
        
        foreach ($resultado as $value) { ?>

            <?php echo $value['nombreJugador']?>
            <?php echo $value['minuto']?>
            <span class='iconseparate fa fa-futbol-o' title='<?php echo $value['tipo']?>'></span>
            <span style="cursor:pointer" onclick="QuitarGol(<?php echo $value['id']?>,<?php echo $temporada_id?>,<?php echo $value['partido_id']?>)">Q</span><br />
       <?php } ?>


<?php
/*
    $tarjetas = '';
    $campos = 'g.id, g.jugador_id, g.minuto, g.tipo, g.esLocal, g.partido_id, j.apodo nombreJugador,g.observaciones ';
    $tabla = 'partido p';
    $union = ' INNER JOIN tarjeta g ON p.id=g.partido_id';
    $union .= ' INNER JOIN jugador j ON j.id=g.jugador_id';
    $condicion = ' WHERE p.id='.$partido_id.' AND g.jugador_id='.$filaJ['id'].' AND g.tipo<>2'; //2 es alineacion
    $orden = ' ORDER BY g.minuto';
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
    //echo $consulta;
        $mysqli = conectar(); $txt = '';
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
        foreach ($resultado as $value) {
            switch ($value['tipo']) {
                case '0':$txt = '<span class="iconseparate"><img src="/img/ta.png" height="17" style="margin-bottom:3px"></span>'; break;
                case '1':$txt = '<span class="iconseparate"><img src="/img/ta2.png" height="17" style="margin-bottom:3px"></span>'; break;
                case '3':$txt = "<span style='color:maroon;' class='iconseparate glyphicon glyphicon-arrow-right'></span>"; break;
                case '4':$txt = "<span style='color:green;' class='iconseparate glyphicon glyphicon-arrow-left'></span>"; break;
                case '5':$txt = '<span class="iconseparate"><img src="/img/tr.png" height="17" style="margin-bottom:3px"></span>'; break;
                case '6':$txt = 'puf';
            }
            $tarjetas .= $value['nombreJugador'].' '.$value['minuto'].' '.$txt.' <b>'.$value['observaciones']."</b><span style='cursor:pointer' onclick='QuitarTarjeta(".$value['id'].','.$temporada_id.','.$value['partido_id'].")'>Q</span><br />";
        }

    echo $tarjetas;
*/
?>