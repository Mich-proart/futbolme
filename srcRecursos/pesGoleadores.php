<div class="col-xs-12 table-responsive txt11">
	<div class="col-xs-12 marco"><span class="boldfont" style="color:maroon">Nota de interés.</span> En caso de que algún partido sea anulado por alineación indebida, los goleadores de ese encuentro no serán contabilizados en la clasificación del pichichi.</div>
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
            $golMax = 0;
            foreach ($goleadores as $key => $fila) {
                //todo quitar este máximo y paginar
                /*if (0 === $golMax) {
                    $golMax = $fila['goles'];
                }

                if ($fila['goles'] < $golMax / 7) {
                    continue;
                }*/
                $fmJugador = $fila['jugador_id'];
                if (0 == $fmJugador) {
                    $fila['jugador'] = str_replace('(pen.)', '', $fila['jugador']);
                    $pos = strpos($fila['jugador'], '(p.p)');
                    if ($pos > 0) {
                        continue;
                    }
                }

                if (10 == $key) {
                    ?>
            <tr class="fila-goleadores"><td colspan="4">
            <?php require_once $nivel.'includes/publicidad/cuerpo04.php'; ?>
            </td></tr>
            <?php
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
                <?php 
                //include('includes/futbolmaniaJugador.php');
                if (0 == $fmJugador) {
                    ?> 
                    <a href="/jugadorint.php?j=<?php echo $fila['jugador']; ?>&e=<?php echo $fila['equipo_id']; ?>&eq=<?php echo $fila['equipoCorto']; ?>"><?php echo $fila['jugador']; ?></a> 
                <?php
                } else {
                    ?>
                <a href="/resultados-directo/jugador/<?php echo poner_guion($fila['jugador']).'/'.$fila['jugador_id']; ?>"><?php echo $fila['jugador']; ?></a>
                <?php
                } ?>
                </td>
		        <td class="text-left">
    			<a href="/resultados-directo/equipo/<?php echo poner_guion($fila['equipo']); ?>/<?php echo $fila['equipo_id']; ?>"><?php echo $fila['equipoCorto']; ?></a>
		        </td>
        		<td class="text-center boldfont"><?php echo $fila['goles']; ?></td>				        
        	</tr>        	
        	<?php
            } ?>
        </tbody>
	</table>
</div>