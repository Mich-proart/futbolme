<?php //imp($valorJornada);?>
<div class="col-xs-12 table-responsive txt11">
	<table class="table table-bordered table-condensed whitebox">
		<thead>            
            <tr class="darkgreenbox">
                <th class="text-center"></th>
                <th class="text-center">Jugador</th>
                <th class="text-center">Equipo</th>
                <th class="text-center">Gol</th>
                <th class="text-center">Par</th>
                <th class="text-center">COEF</th>                
            </tr>
        </thead>
        <tbody>
        	<?php 
            $contador = 0;
            foreach ($zamoras as $key => $fila) {
                ?>
        	<?php if (($valorJornada * 0.75) <= $fila['partidos']) {
                    ++$contador;
                   
                    if (isset($equipo_id) && $equipo_id == $fila['equipo_id']) {
                        ?>
            <tr bgcolor='gainsboro'>
            <?php
                    } else {
                        ?>
            <tr>
            <?php
                    } ?>
        		<td class="text-center"><?php echo $contador; ?></td>
        		<td class="text-left boldfont"><a href="index.php?modo=j&id=<?php echo $fila['portero_id']; ?>"><?php echo $fila['portero']; ?></a></td>
		         <td class="text-left">
		        <span>
    			<a href="index.php?modo=e&id=<?php echo $fila['equipo_id']; ?>"><?php echo $fila['equipoCorto']; ?></a>
				</span>
		        </td>
		        <td class="text-center boldfont" style="color:maroon"><?php echo $fila['goles']; ?></td>
        		<td class="text-center boldfont" style="color:navy"><?php echo $fila['partidos']; ?></td>
        		<td class="text-center boldfont"><?php echo round($fila['goles'] / $fila['partidos'], 2); ?></td>
        	</tr>	
        		<?php
                } ?>
        	<?php
            } ?>
        </tbody>
	</table>
</div>

<div class="col-xs-12 table-responsive txt11">
	<table class="table table-bordered table-condensed whitebox">
		<thead>
            <tr>
                <th colspan="6">Zamoras (menos de 75% partidos jugados)</th>
            </tr>
            <tr class="darkgreenbox">
                <th class="text-center"></th>
                <th class="text-center">Jugador</th>
                <th class="text-center">Equipo</th>
                <th class="text-center">Gol</th>
                <th class="text-center">Par</th>
                <th class="text-center">COEF</th>
            </tr>
        </thead>
        <tbody>
        	<?php
            $contador = 0;
            foreach ($zamoras as $key => $fila) {
                ?>
        		<?php if (($valorJornada * 0.75) > $fila['partidos']) {
                    ++$contador;
                    if (isset($equipo_id) && $equipo_id == $fila['equipo_id']) {
                        ?>
            <tr bgcolor='gainsboro'>
            <?php
                    } else {
                        ?>
            <tr>
            <?php
                    } ?>
        		<td class="text-center"><?php echo $contador; ?></td>
        		<td class="text-left boldfont"><a href="index.php?modo=j&id=<?php echo $fila['portero_id']; ?>"><?php echo $fila['portero']; ?></a></td>
		         <td class="text-left">
		        <span>
    			<a href="index.php?modo=e&id=<?php echo $fila['equipo_id']; ?>"><?php echo $fila['equipoCorto']; ?></a>
				</span>
				</td>
		        <td class="text-center boldfont" style="color:maroon"><?php echo $fila['goles']; ?></td>
        		<td class="text-center boldfont" style="color:navy"><?php echo $fila['partidos']; ?></td>
        		<td class="text-center boldfont"><?php echo round($fila['goles'] / $fila['partidos'], 2); ?></td>
        	</tr>        			
        		<?php
                } ?>
        	<?php
            } ?>
        </tbody>
	</table>
</div>	
