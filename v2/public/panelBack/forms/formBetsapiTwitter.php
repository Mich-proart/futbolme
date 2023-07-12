<table class="table">
        <tr><td>ID</td><td>Nombre</td><td>Betsapi - Twitter</td></tr>
            <?php
            // /panelBack/club/club.php?id=<?php echo $fila['club_id']; 
           foreach ($resultado as $key => $fila) {?>
        <tr bgcolor="#EFEFEF">
        <td><?php echo $fila['equipo_id']; ?></td>
        <td><?php echo $fila['nombre']; ?><br />
        <?php if (isset($origen) && $origen=='crearCalendario'){
            echo "<span id='equipo-temporada-".$fila['equipo_id']."' width='100'>".($key + 1).'-Pdos='.($fila['pL'] + $fila['pV']);
            if (($fila['pL'] + $fila['pV']) == 0) {
                echo '</span> - <a href="#" onclick="eliminarEquipoTemporada(event, '.$temporada_id.', '.$fila['equipo_id'].')">quitar</a>';
                }
            } ?>
            
        </td>
        <td>
        <form id="f-<?php echo $fila['equipo_id']; ?>" method="post" onsubmit="grabarTwitter(event, $(this).serialize(),<?php echo $fila['equipo_id']; ?>)">
        <input type="hidden" name="equipo_id" value="<?php echo $fila['equipo_id']; ?>">
        <input type="text" name="betsapi" size="4" value="<?php echo $fila['betsapi']; ?>">
        <input type="text" name="slug" size="10" value="<?php echo $fila['slug']; ?>">    
        <input type="submit" name="grabar" value="@">
        </form>
        <div id="alerta-<?php echo $fila['equipo_id']; ?>"></div></td>
        
        </tr>
    <?php  } ?>
    </table>
