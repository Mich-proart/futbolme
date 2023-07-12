<table class="table table-bordered table-condensed whitebox nomargin txt11">
<thead>
    <tr class="darkgreenbox">
            <th class="text-center">P</th>
            <th class="text-center">Equipo</th>
            <th class="text-center">P<span class="hidden-xs">TO</span>S</th>
            <th class="text-center">J<span class="hidden-xs">U</span></th>
            <th class="text-center">G<span class="hidden-xs">A</span></th>
            <th class="text-center">E<span class="hidden-xs">M</span></th>
            <th class="text-center">P<span class="hidden-xs">E</span></th>
            <th class="text-center"><span class="hidden-xs">G</span>F</th>
            <th class="text-center"><span class="hidden-xs">G</span>C</th>
            <th class="text-center">D<span class="hidden-xs">I</span>F</th>
    </tr>
</thead>
<tbody class="whitebox">
    <?php 

    foreach ($reOrdenar as $key => $fila) {
        $color_fondo = 'white'; ?>
    <tr data-id="<?php echo $fila['equipo_id']; ?>">
    	<td class="text-center nopadding"><?php echo $key + 1; ?></td>
		<td class="nopadding" style="color:<?php echo $fila['color']; ?>">
		 <img src="/img/equipos/escudo<?php echo $fila['equipo_id']; ?>.png"  alt="equipo" style="width:18px; height:20px"><b><?php echo $fila['nombre']; ?></b>
		</td>
		<td class="text-center nopadding"><b><?php echo $fila['puntos']; ?></b></td>
		<td class="text-center nopadding"><?php echo $fila['jugados']; ?></td>
		<td class="text-center nopadding"><?php echo $fila['ganados']; ?></td>
		<td class="text-center nopadding"><?php echo $fila['empatados']; ?></td>
		<td class="text-center nopadding"><?php echo $fila['perdidos']; ?></td>
		<td class="text-center nopadding"><?php echo $fila['gFavor']; ?></td>
		<td class="text-center nopadding"><?php echo $fila['gContra']; ?></td>
		<td class="text-center nopadding"><?php echo $fila['gFavor'] - $fila['gContra']; ?></td>
    </tr>
    

     <?php
    } ?>	         
		
</tbody>
</table>
<?php if (count($encuentros) < $tp) {
        ?>
<table class="table">
<thead><tr class="whitebox"><th style="color:red">Este golaverage particular no es válido, pues no estan todos los encuentros disputados entre los equipos implicados</th></tr></thead>
</table>
<?php
    }  ?>