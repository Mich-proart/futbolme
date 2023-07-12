<table class="table">
        <tr><td>ID</td><td>Nombre</td><td>Federacion - Twitter - Betsapi</td></tr>
            <?php
            // /panelBack/club/club.php?id=<?php echo $fila['club_id']; 
           foreach ($equiposTorneo as $key => $fila) {?>
        <tr bgcolor="#EFEFEF">
        <td><?php echo $fila['equipo_id']; ?></td>
        <td><?php echo $fila['nombre']; ?><br />
        <?php 
            echo "<span id='equipo-temporada-".$fila['equipo_id']."' width='100'>".($key + 1).'-Pdos='.($fila['pL'] + $fila['pV']);
            if (($fila['pL'] + $fila['pV']) == 0) {
                echo '</span>'?>
                <span onclick="eliminarEquipoTemporada(event, <?php echo $temporada_id?>, <?php echo $fila['equipo_id']?>,0,1)" style="cursor:pointer;" class="boldfont">quitar</span>

            <?php }?>
            
        </td>
        <td>
        <form id="f-<?php echo $fila['equipo_id']; ?>" method="post" onsubmit="grabarTwitter(event, $(this).serialize(),<?php echo $fila['equipo_id']; ?>)">
        <input type="hidden" name="equipo_id" value="<?php echo $fila['equipo_id']; ?>">
        <input type="text" name="federacion_id" size="8" value="<?php echo $fila['federacion_id']; ?>">
        <input type="text" name="slug" size="10" value="<?php echo $fila['slug']?>">    
        <input type="text" name="betsapi" size="4" value="<?php echo $fila['betsapi']; ?>">
        <input type="submit" name="grabar" value="@">
        </form>
        <div id="alerta-<?php echo $fila['equipo_id']; ?>"></div></td>
        
        </tr>
    <?php  } ?>
    </table>

    <table class="table"><tr><td>
      <form onsubmit="submitSustituirEquipo(event, $(this).serialize())">        
        <input type="hidden" name="tipo_torneo" value="<?php echo $tipo_torneo; ?>">
        <input type="hidden" name="categoria_torneo" value="<?php echo $categoria_torneo; ?>">
        <input type="hidden" name="temporada_id" value="<?php echo $temporada_id; ?>">
        Sustituir id: <input type='text' name='e_saliente' size="6">
        por id:  <input type='text' name='e_entrante' size="6">
        <input type='submit' name='sustituir' value='sustituir'></td>
      </form>
    </td></tr>
    <tr><td>
      <form onsubmit="submitAgregarEquipo(event, $(this).serialize())">        
        <input type="hidden" name="tipo_torneo" value="<?php echo $tipo_torneo; ?>">
        <input type="hidden" name="categoria_torneo" value="<?php echo $categoria_torneo; ?>">
        <input type="hidden" name="temporada_id" value="<?php echo $temporada_id; ?>">
        Agregar id: <input type='text' name='equipo_id' size="6">
        <input type='submit' name='agregar' value='agregar'></td>
      </form>
    </td></tr>
    
    <tr>
    <td>
      <form  onsubmit="submitEliminarCalendario(event, $(this).serialize(),<?php echo $temporada_id?>)">
        <input type="hidden" name="tipo_torneo" value="<?php echo $tipo_torneo; ?>">
        <input type="hidden" name="categoria_torneo" value="<?php echo $categoria_torneo; ?>">
        <input type="hidden" name="temporada_id" value="<?php echo $temporada_id?>">
        <input type='submit' name='borrar' value='eliminar calendario'></td>
        <?php /*
        onclick="if(confirm('Deseas borrar los partidos del calendario?')){
        this.form.submit();} else {return false;}" */?> 
      </form>

      <span onclick="verEquiposAgregar(<?php echo $temporada_id?>)" style="cursor:pointer" class="boldfont btn btn-default pull-right" style="font-size: 30px">ver Equipos</span>
    </td>
    </tr>
    </table>

    
    <div id="ver-equipos-agregar"></div>    

