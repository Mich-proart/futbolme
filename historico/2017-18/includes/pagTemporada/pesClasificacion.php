<?php if (!isset($sufijo)) {
    $sufijo = '';
}

if (!isset($temporada_id)) {
    $temporada_id = $liga;
}?>

<table id="latabla" class="table tablesorter table-bordered table-condensed greenbox nomargin txt11">
	<thead>
        <tr class="darkgreenbox h40">
                <?php if (isset($trt)) {
        ?>
                <th class="text-center">PG</th>
                <th class="text-center">Tor</th>
                <th class="text-center">%</th>
                <?php
    } ?>
                <th class="text-center" title="Posición">P</th>
                <th class="text-center">Equipo</th>
                <th class="text-center" title="Puntos">P<span class="hidden-xs">TO</span>S</th>
                <th class="text-center" title="Jugados">J<span class="hidden-xs">U</span></th>
                <th class="text-center" title="Ganados">G<span class="hidden-xs">A</span></th>
                <th class="text-center" title="Empatados">E<span class="hidden-xs">M</span></th>
                <th class="text-center" title="Perdidos">P<span class="hidden-xs">E</span></th>
                <th class="text-center" title="Goles a favor"><span class="hidden-xs">G</span>F</th>
                <th class="text-center" title="Goles en contra"><span class="hidden-xs">G</span>C</th>
                <th class="text-center" title="Diferencia de goles">D<span class="hidden-xs">I</span>F</th>
        </tr>
    </thead>
    <tbody class="whitebox">
        <?php 

        foreach ($clasificacion['clasificacionFinal'] as $key => $fila) {

            if ($key<30){
                $equiposTw[$key]['id'] = $fila['equipo_id'];
                $equiposTw[$key]['equipo'] = $fila['nombreCorto'];
                $equiposTw[$key]['idPais'] = 60;
            }
            
            $pgEnlace = 'index.php?modo=e&id='.$fila['equipo_id'];

            

            $color_fondo = 'white';
            if (isset($fila['preferente'])) {
                if (1 == $fila['preferente']) {
                    $color_fondo = 'yellow';
                }
            }

            $color_fila = '';
            if (isset($equipo_id) && $equipo_id == $fila['equipo_id']) {
                $color_fila = "style='background-color:#BCF5A9'";
            }
            if (isset($equipo_rival_id) && $equipo_rival_id == $fila['equipo_id']) {
                $color_fila = "style='background-color:#F8E6E0'";
            }

            $rutaEscudo = '/img/equipos/escudo'.$fila['equipo_id'].'.png';
            if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaEscudo))) {
                $rutaEscudo = '/img/jugadores/NI.png';
            } ?>
        <tr <?php echo $color_fila; ?>>
            <?php if (isset($trt)) {
                ?>
            <td class="text-center"><?php echo $key + 1; ?></td>
            
            <td class="text-center"><?php echo number_format(($fila['puntos'] / $fila['jugados']), 2); ?></td>
            <?php
            } ?>
        	<td class="text-center" style="<?php echo $fila['css']; ?>"><?php echo $fila['posicion']; ?></td>
    		<td style="text-align:left;" itemscope itemtype="http://schema.org/SportsTeam">
    			<a href="<?php echo $pgEnlace; ?>&modelo=Calendario" title="Calendario del <?php echo $fila['nombreCorto']; ?>">
                    <img src="<?php echo $rutaEscudo; ?>" itemprop="logo" alt="escudo <?=$fila['nombre'];?>"  style="width:18px; height:20px; margin-right: 5px">
                    <strong class="hidden-sm hidden-md hidden-lg" itemprop="name"><?php echo $fila['nombreCorto']; ?></strong>
                    <strong class="hidden-xs"><?php echo $fila['nombre']; ?></strong>
                    <meta itemprop="url" content="<?=$pgEnlace;?>">
    			</a>
    		</td>
    		<td class="text-center" style="background-color:<?php echo $color_fondo; ?>">
    		
    		<b><?php echo $fila['puntos']; ?></b>
    		</td>
    		<td class="text-center">
    		
    		<?php echo $fila['jugados']; ?>
        		</td>
    		<td class="text-center">
    		
    		<?php echo $fila['ganados']; ?>
    		</td>
    		<td class="text-center">
    		
    		<?php echo $fila['empatados']; ?>
    		</td>
    		<td class="text-center">
    		
    		<?php echo $fila['perdidos']; ?>
    		</td>
    		<td class="text-center">
    		
    		<?php echo $fila['gFavor']; ?>
    		</td>
    		<td class="text-center">
    		
    		<?php echo $fila['gContra']; ?>
    		</td>
    		<td class="text-center"><?php echo $fila['gFavor'] - $fila['gContra']; ?></td>
        </tr>
        

         <?php
        } ?>
         
    		
    </tbody>
</table>


<?php if (isset($clasificacion['sanciones'])) {
            ?>
<div class="col-xs-12 marco">
    <?php foreach ($clasificacion['sanciones'] as $fila) {
                if (isset($fila['nombre'])) {
                    ?>
        <b><?php echo $fila['nombre']; ?></b> cuenta con <span style='color:red'><b><?php echo $fila['puntos']; ?></b></span> puntos por sanción federativa<br />
        <?php 
        include 'pesSanciones.php';
                }
            } ?>
</div>
<?php
        } ?>

<?php if (!isset($trt)) {
            ?>


<div class="col-xs-12">								
	<?php 
    foreach ($clasificacion['leyenda'] as $fila) {
        ?>
	<div class="text-center" style="padding:2px 6px; float:left; color:<?php echo $fila['color']; ?>;background-color:<?php echo $fila['fondo']; ?>"><?php echo $fila['leyenda']; ?></div>
	<?php
    } ?>
<div class="row h40"></div>	
</div>
<?php
        } ?>
<script src="/js/tablesorter/jquery.tablesorter.js"></script>
<script>
 $(function(){
 	$("#latabla").tablesorter();
});
</script>
