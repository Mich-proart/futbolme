<?php
// Initialize the session
session_start();
$jornadaActiva=abs($jornadaActiva);
$partidos = listarPartidos($temporada_id, $jornadaActiva, $grupo_id);

switch ($partidos[0]['division_id']) {
    case '4':$division='Segunda B División'; break;
    case '5':$division='Tercera División'; break;
    default: $division=''; break;break;
}
?>
<div id="mensaje">
    <?php if ($division!='') { echo $division.' - '; }?>
    <?php echo $partidos[0]['categoria_nombre']?> -
    <?php echo $partidos[0]['torneo_nombre']?>
    <?php if ($partidos[0]['comunidad_id']>1) { echo ' - '.$partidos[0]['comunidad_nombre']; }?>
    - <span style="cursor:pointer; color: maroon" onclick="filtrarComandes(0,0,0)" class="hide"><b>Noticia del grupo</b></span>
        <br />
    <?php echo $_SESSION['username']?> - <?php echo $_SESSION['id']?>
</div>

    <div  style="float:left; width:100%; padding:2px;">
        <input type="hidden" id="id_temporada" value="<?php echo $temporada_id?>" />
        <input type="hidden" id="id_division" value="<?php echo $partidos[0]['division_id']?>" />
        <input type="hidden" id="id_usuario" value="<?php echo $_SESSION['id']?>" />
        <input type="hidden" id="id_comunidad" value="<?php echo ($partidos[0]['comunidad_id']-1)?>" />

        <select name="temporada" onchange="cargar_torneo_futbolme(this.value,1)">
        <?php echo "<option value='0'>Jornadas</option>";
        for ($i = 1; $i < $jornadas + 1; ++$i) {
            echo "<option value='".$temporada_id.','.$jornadas.','.$i.",0'";
            if ($i == $jornadaActiva) { echo 'selected';}
            echo '>Jornada '.$i.'</option>';
        } ?>
        </select>

<form method="post" class="formulario" id="form" onsubmit="submitForm(event, $(this).serialize(),0)">
<table width="100%" bgcolor="gainsboro">
    <tr><td class="estado">Estado</td>
        <td colspan="4">Partido</td>
        <td class="fecha">Fecha</td>
        <td class="hora">Hora</td><td>Observaciones</td>
    </tr>
        
            
<?php $i = 0;
foreach ($partidos as $fila) {
    if ('SIN PAIS' == $fila['local'] || 'SIN PAIS' == $fila['visitante']) { continue; }
    if (1 == $fila['estado_partido']) { $color_fila = '#eeffbb'; } else { $color_fila = 'white'; } 

    if ($fila['betsapi']>1) { ?>
        <tr bgcolor="<?php echo $color_fila; ?>"><td colspan="8" align="left" style="padding: 10px"><b><?php echo $fila['ncLocal'];?> - <?php echo $fila['ncVisitante'];?></b> gestionado automáticamente por <b>betsapi</b></td></tr>
    <?php    continue; 
    }
    ?>
    <tr bgcolor="<?php echo $color_fila; ?>">
    <input type="hidden" name="id[]" value="<?php echo $fila['partido_id']; ?>">
    <input type="hidden" name="temporada_id[]" value="<?php echo $fila['temporada_id']; ?>">
    <input type="hidden" name="jornada[]" value="<?php echo $fila['jornada']; ?>">
    <input type="hidden" name="or_estado_partido[]" value="<?php echo $fila['estado_partido']; ?>">
    <input type="hidden" name="or_fecha[]" value="<?php echo $fila['fecha']; ?>">
    <input type="hidden" name="or_hora_prevista[]" value="<?php echo $fila['hora_prevista']; ?>">
    <input type="hidden" name="or_goles_local[]" value="<?php echo $fila['goles_local']; ?>">
    <input type="hidden" name="or_goles_visitante[]" value="<?php echo $fila['goles_visitante']; ?>">
    <input type="hidden" name="or_observaciones[]" value="<?php echo $fila['observaciones']; ?>">
    <input type="hidden" name="local[]" value="<?php echo $fila['ncLocal']; ?>">
    <input type="hidden" name="visitante[]" value="<?php echo $fila['ncVisitante']; ?>">
    <input type="hidden" name="equipoLocal_id[]" value="<?php echo $fila['equipoLocal_id']; ?>">
    <input type="hidden" name="equipoVisitante_id[]" value="<?php echo $fila['equipoVisitante_id']; ?>">
    <input type="hidden" name="usuario_id[]" value="<?php echo $_SESSION['id']?>" />

    
        <td class="estado">
        <select name="estado_partido[]" onchange="estadoPartido(this.value,<?php echo $fila['partido_id']?>)">
        <option value="0" <?php if (0 == $fila['estado_partido']) { echo 'selected';} ?>>No jugado</option>
        <option value="1" <?php if (1 == $fila['estado_partido']) { echo 'selected';} ?>>FINAL</option>
        <option value="3" <?php if (3 == $fila['estado_partido']) { echo 'selected';} ?>>Suspendido</option>
        <option value="4" <?php if (4 == $fila['estado_partido']) { echo 'selected';} ?>>Aplazado</option>
        <?php //if ($partidos[0]['division_id']>5){ ?>
        <option value="2" <?php if (2 == $fila['estado_partido']) { echo 'selected';} ?>>En juego</option>
        <option value="6" <?php if (6 == $fila['estado_partido']) { echo 'selected';} ?>>Descanso</option>
        <?php //} ?>
        </select>
        </td>
    <td align="right">
        <span style="cursor:pointer; color: maroon" class="boldfont hide" onclick="filtrarComandes(<?php echo $fila['equipoLocal_id']?>,0,0)"><b>Noticia</b></span> - <?php echo $fila['ncLocal'];?>
    </td>
    <td align="center" width="2"><input type="text" name="goles_local[]" value="<?php echo $fila['goles_local']; ?>" size="2" style="text-align: center">
    </td>
    <td align="center" width="2"><input type="text" name="goles_visitante[]" value="<?php echo $fila['goles_visitante']; ?>" size="2" style="text-align: center">
    </td>
    <td align="left"><?php echo $fila['ncVisitante'];?> - <span style="cursor:pointer; color: maroon" class="hide boldfont" onclick="filtrarComandes(0,<?php echo $fila['equipoVisitante_id']?>,0)"><b>Noticia</b></span>
    </td>
    <td class="fecha"><input class="fecha_input" type="date" name="fecha[]" value="<?php echo $fila['fecha']; ?>" size="10"></td>
    <td class="hora"><input class="hora_input" type="text" name="hora_prevista[]" value="<?php echo $fila['hora_prevista']; ?>" size="10">
        <br /><span style="display:none"  id="estado-partido-<?php echo $fila['partido_id']?>">Inicio: <input class="hora_input" type="text" name="hora_real[]" value="<?php echo $fila['hora_real']; ?>" size="10"></span>
    </td>
    <?php if ($partidos[0]['division_id']>5){ ?>
    <td>
        <textarea cols="30" rows="3" name="observaciones[]"><?php echo $fila['observaciones']; ?></textarea>
    </td>
    <?php } else { ?>
        <td style="display:none">
        <textarea cols="30" rows="3" name="observaciones[]"><?php echo $fila['observaciones']; ?></textarea>
        </td>
    <?php } ?>
    <td><span style="cursor:pointer; color: maroon" class="boldfont hide" onclick="filtrarComandes(<?php echo $fila['equipoLocal_id']?>,<?php echo $fila['equipoVisitante_id']?>,<?php echo $fila['partido_id']?>)"><b>Partido</b></span>
    </td>
    </tr>

    <?php $i = $i + 1;?>
    <?php }  ?>
        <input type="hidden" name="partidos" value="<?php echo $i; ?>">    
    <?php if ($partidos[0]['division_id']>4){ ?>
    <tr bgcolor="yellow">
            <td colspan="8" align="center"><input type="submit" name="grabar" value="Grabar"></td>
    </tr> 
    <?php } ?>   
    </table>
</form>
<div class="marco" style="text-align: left">
<br /><b>Aplazado</b>: Lo marcaremos siempre que no se dispute en la fecha y hora prevista oficialmente. En observaciones pondremos el motivo del aplazamiento.<br />
<hr /><b>Suspendido</b>: Lo marcaremos siempre que el partido haya comenzado y por alguna circunstancia el árbitro lo suspenda. Indicaremos en observaciones minuto de juego y resultado al momento de la suspensión.<br />
<hr /><b>En juego</b>: Nos saldrá debajo de la hora oficial otro reloj para indicar la hora de inicio del partido. También tendremos que poner la hora de inicio de la segunda parte.<br />
<hr /><b>Descanso</b>: Si realizamos directos, tenemos que indicar el tiempo de descanso.<br />
</div>
</div>


<?php
function listarPartidos($temporada_id, $jornada, $grupo, $dia=1)
{
    if ($dia==1 || $dia==17) { $dia = date('Y-m-d'); }
    $campos = 'ct.id categoria_id, ct.orden categoria_orden, ct.nombre categoria_nombre,
    tor.id torneo_id, tor.orden torneo_orden, tor.nombre torneo_nombre, tor.division_id,
    co.id comunidad_id, co.nombre comunidad_nombre,
    pa.id pais_id, pa.nombre pais_nombre, 
    p.id partido_id, p.estado_partido, p.temporada_id, p.fecha, p.arbitro_id,
    p.hora_prevista, p.hora_real, p.goles_local, p.goles_visitante, 
    p.jornada, p.clasificado, p.observaciones, p.estadio, p.partidoAPI, p.comentario,
    p.equipoLocal_id, ec.nombre local, ec.nombreCorto ncLocal, ec.slug twLocal, ec.betsapi betsapiL,
    (select comunidad_id from provincia where id=
            (select provincia_id from localidad where id=(select localidad_id from club where id=ec.club_id)
        )
    ) comunidad_local,
    (select nombre from comunidad where id=
        (select comunidad_id from provincia where id=
            (select provincia_id from localidad where id=(select localidad_id from club where id=ec.club_id)

            )
        )
    ) comunidad_local_nombre,
    (select pais_id from club where id=ec.club_id) pais_local,
    (select nombre from pais where id=(select pais_id from club where id=ec.club_id)) pais_local_nombre,
    p.equipoVisitante_id, ef.nombre visitante, ef.nombreCorto ncVisitante, ef.slug twVisitante, ef.betsapi betsapiV,
        (select comunidad_id from provincia where id=
            (select provincia_id from localidad where id=(select localidad_id from club where id=ef.club_id)
        )
    ) comunidad_visitante,
    (select nombre from comunidad where id=
        (select comunidad_id from provincia where id=
            (select provincia_id from localidad where id=(select localidad_id from club where id=ef.club_id)

            )
        )
    ) comunidad_visitante_nombre,
    (select pais_id from club where id=ef.club_id) pais_visitante,
    (select nombre from pais where id=(select pais_id from club where id=ef.club_id)) pais_visitante_nombre,
    p.usuario_id, (select count(id) from medio where partido_id=p.id) medios, p.youtube_id, p.betsapi';
    $tabla = ' partido p';
    $union = ' INNER JOIN equipo ec ON ec.id=p.equipoLocal_id';
    $union .= ' INNER JOIN equipo ef ON ef.id=p.equipoVisitante_id';
    $union .= ' INNER JOIN temporada te ON te.id=p.temporada_id';
    $union .= ' INNER JOIN torneo tor ON tor.id=te.torneo_id';
    $union .= ' INNER JOIN comunidad co ON co.id=tor.comunidad_id';
    $union .= ' INNER JOIN pais pa ON pa.id=tor.pais_id';
    $union .= ' INNER JOIN categoriatorneo ct ON ct.id=tor.categoria_torneo_id';

    
    if ($jornada==0) { //mostramos los partidos de hoy.
        $condicion = ' WHERE (p.temporada_id='.$temporada_id.' AND p.fecha="'.$dia.'") OR (p.fecha<>"'.$dia.'" AND p.estado_partido=2)';
    } else {
        if ($grupo > 0) {
            $condicion = ' WHERE p.temporada_id='.$temporada_id.' 
        AND p.jornada='.$jornada.' 
        AND p.grupo_id='.$grupo;
        } else {
            if (231 == $temporada_id or
                442 == $temporada_id or
                287 == $temporada_id or
                330 == $temporada_id) {
                $condicion = ' WHERE p.temporada_id='.$temporada_id.' AND p.jornada='.$jornada." AND p.fecha>'2017-09-20'";
            } else {
                $condicion = ' WHERE p.temporada_id='.$temporada_id.' AND p.jornada='.$jornada;
            }
        }
    }

    $orden = ' ORDER BY p.fecha, p.hora_prevista';

    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;

    //echo $consulta;
    include 'config.php';
    $mysqli = $link;
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    return $resultado;
}
?>
