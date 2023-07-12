<div class="col-xs-12 table-responsive txt11">
	<table id="goleadores" class="table table-bordered table-condensed whitebox">
		<thead>            
            <tr class="darkgreenbox">
                <th class="text-center"></th>
                <th class="text-center">Jugador</th>
                <th class="text-center">Equipo</th>
                <th class="text-center">Goles</th>		                
            </tr>
        </thead>
        <tbody>
        	<?php
            
            foreach ($goleadores as $key => $fila) {
                //todo quitar este máximo y paginar
               

               
                $fmJugador = $fila['jugador_id'];
                if (0 == $fmJugador) {
                    $fila['jugador'] = str_replace('(pen.)', '', $fila['jugador']);
                    $pos = strpos($fila['jugador'], '(p.p)');
                    if ($pos > 0) {
                        continue;
                    }
                }

               
                if (isset($equipo_id) && $equipo_id == $fila['equipo_id']) {
                    ?>
            <tr bgcolor='gainsboro'>
            <?php
                } else {
                    ?>
        	<tr>
            <?php
                } ?>
        		<td class="text-center"><?php echo $key + 1; ?></td>
		        <td class="text-left boldfont">
                
                <a href="index.php?modo=j&id=<?php echo $fila['jugador_id']; ?>"><?php echo $fila['jugador']; ?></a>
                
                </td>
		        <td class="text-left">
    			<a href="index.php?modo=e&id=<?php echo $fila['equipo_id']; ?>"><?php echo $fila['equipoCorto']; ?></a>
		        </td>
        		<td class="text-center boldfont"><?php echo $fila['goles']; ?></td>				        
        	</tr>        	
        	<?php
            } ?>
        </tbody>
	</table>
</div>