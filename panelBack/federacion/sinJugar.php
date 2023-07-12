<?php

echo "<table border='1' cellpadding='1' cellspacing='1' bgcolor='gainsboro'>
    <tr><td>id Partido</td><td width='200'>temporada_nombre</td>
        <td>JDA</td>
        <td align='center'>partido</td>
        <td width='400'>Observaciones</td>
	</tr>";

$h = ''; $colorFila = 'white';
foreach ($partidos as $fila) {
    $estado = $fila['estado_partido'];


    

    if ('SIN PAIS' == $fila['local'] || 'SIN PAIS' == $fila['visitante']) {
        continue;
    }

    if ($fila['categoria_torneo_id'] > 7 && $fila['categoria_torneo_id'] < 11) {
        $colorFila = 'yellow';
    } else { $colorFila = 'white';}

    
    $fed='';unset($url);
    

    echo '<tr bgcolor="'.$colorFila.'">
      <td width="60" align="center">'.$fila['id'].'</td>
      <td width="520">'.$fila['temporada_nombre'];

     




      echo '</td>';
           
      echo '<td width="100" align="center"><a href="/temporada.php?id='.$fila['temporada_id'].'" target="_blank">'.$fila['jornada'].'</a> '.$fed.'</td>';

    if ($fila['estado_partido']==0){ echo '<td bgcolor="orange">'; } else { echo '<td>'; }

    
      ?>

      <form method="post" class="formulario" id="form<?php echo $fila['id']; ?>" onsubmit="submitForm(event, $(this).serialize(),<?php echo $fila['id']; ?>)">
<table bgcolor="gainsboro"> 
    <tr>
    <input type="hidden" name="id[]" value="<?php echo $fila['id']; ?>">
    <input type="hidden" name="temporada_id[]" value="<?php echo $fila['temporada_id']; ?>">
    <input type="hidden" name="jornada[]" value="<?php echo $fila['jornada']; ?>">
    <input type="hidden" name="or_estado_partido[]" value="<?php echo $fila['estado_partido']; ?>">
    <input type="hidden" name="or_fecha[]" value="<?php echo $fila['fecha']; ?>">
    <input type="hidden" name="or_hora_prevista[]" value="<?php echo $fila['hora_prevista']; ?>">
    <input type="hidden" name="or_goles_local[]" value="<?php echo $fila['goles_local']; ?>">
    <input type="hidden" name="or_goles_visitante[]" value="<?php echo $fila['goles_visitante']; ?>">
    <input type="hidden" name="local[]" value="<?php echo $fila['local']; ?>">
    <input type="hidden" name="visitante[]" value="<?php echo $fila['visitante']; ?>">
    <input type="hidden" name="equipoLocal_id[]" value="<?php echo $fila['equipoLocal_id']; ?>">
    <input type="hidden" name="equipoVisitante_id[]" value="<?php echo $fila['equipoVisitante_id']; ?>">
    <td class="estado"><select name="estado_partido[]">
    <option value="0" <?php if (0 == $fila['estado_partido']) { echo 'selected';} ?>>No jugado</option>
    <option value="1" <?php if (1 == $fila['estado_partido']) { echo 'selected';} ?>>FINAL</option>
    <option value="2" <?php if (2 == $fila['estado_partido']) { echo 'selected';} ?>>En juego</option>
    <option value="3" <?php if (3 == $fila['estado_partido']) { echo 'selected';} ?>>Suspendido</option>
    <option value="4" <?php if (4 == $fila['estado_partido']) { echo 'selected';} ?>>Aplazado</option>
    <option value="5" <?php if (5 == $fila['estado_partido']) { echo 'selected';} ?>>Anulado</option>
    <option value="6" <?php if (6 == $fila['estado_partido']) { echo 'selected';} ?>>Descanso</option>
    </select></td>
    <td align="right" width="200"><?php echo $fila['local'];?></td>
    <td align="center" width="10"><input type="text" name="goles_local[]" value="<?php echo $fila['goles_local']; ?>" size="2" style="text-align: center"></td>
    <td align="center" width="10"><input type="text" name="goles_visitante[]" value="<?php echo $fila['goles_visitante']; ?>" size="2" style="text-align: center"></td>
    <td width="200"><?php echo $fila['visitante'];?></td>
    <td class="fecha"><input class="fecha_input" type="text" name="fecha[]" value="<?php echo $fila['fecha']; ?>" size="10"></td>
    <td class="hora"><input class="hora_input" type="text" name="hora_prevista[]" value="<?php echo $fila['hora_prevista']; ?>" size="10"></td>
    <td><input type="submit" name="grabar" value="Grabar"></td>
    <td>
      <?php echo '<a href="/partido.php?id='.$fila['id'].'" target="_blank">Pdo</a>';?>

    </td>
    </tr>
    


    <?php         $comunidad_id=($fila['comunidad_id']-1);
                  $competicion_id=$fila['apiRFEFcompeticion'];
                  $grupo_id=$fila['apiRFEFgrupo'];
                  $fase=$fila['apifutbol'];
                  if ($comunidad_id>0){
                      
                      include ('../../panelBack/federacion/funciones/urlFederaciones.php');

                      if ($carpeta=='00pnfg'){
                      $url.='CodCompeticion='.$competicion_id.'&CodGrupo='.$grupo_id.'&CodJornada='.$fila['jornada'];
                      }

                      if ($carpeta=='00isquad'){
                      $url.='id_competicion='.$competicion_id.'&id_fase='.$fase.'&id_grupo='.$grupo_id.'&jornada='.$fila['jornada'];
                      }
                  }  


    ?>
        <input type="hidden" name="partidos" value="1">    
        <tr bgcolor="yellow">
            <td colspan="9" align="center">
                <?php if (isset($url)){ ?>
                    <a href="<?php echo $url?>" target="_blank"><b>Federación</b></a>
                <?php } ?>
                <?php if (isset($urlh)){ ?>
                    - <a href="<?php echo $urlh?>" target="_blank"><b>Horarios</b></a>
                <?php } ?>
            </td>
        </tr>
            </table>
            </form>



      <?php echo '</td><td><div id="mensaje-'.$fila['id'].'"></div>'.$fila['observaciones'].'</td></tr>';

    $h = $fila['hora_prevista'];
}
echo '</table><hr />';
?>
</div>