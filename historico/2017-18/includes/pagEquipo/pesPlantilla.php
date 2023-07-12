
<div class="col-xs-12 whitebox nopadding">

        <?php 

        $posicion = 7;

        foreach ($equipoPlantilla as $jugador) {
            if (!isset($jugador['id'])) {
                continue;
            }

            $enlace_jugador = 'index.php?modo=j&id='.$jugador['id']; ?>
        <?php if ($jugador['posicion'] != $posicion) {
                ?>
         
           <h4><?php 
            switch ($jugador['posicion']) {
                case '1':
                    $txt_jugador = 'Porteros';
                    if (isset($liga) && 214 == $liga) {
                        $txt_jugador = 'Porteras';
                    }
                    break;
                case '2':
                    $txt_jugador = 'Defensas';
                    break;
                case '3':
                    $txt_jugador = 'Centrocampistas';
                    break;
                case '4':
                    $txt_jugador = 'Delanteros';
                    if (isset($liga) && 214 == $liga) {
                        $txt_jugador = 'Delanteras';
                    }
                    break;
                case '5':
                    $txt_jugador = 'Entrenador';
                    break;

                default:
                    $txt_jugador = 'Sin demarcación';
                    break;
            }

                echo $txt_jugador; ?></h4>
        					          
        <?php
            }

            $rutaJugador = '/img/jugadores/jugador'.$jugador['id'].'.jpg';
            if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaJugador))) {
                $rutaJugador = '/img/jugadores/NI.png';
            } ?> 
                
        <table class='table table-bordered table-condensed whitebox nomargin'>
			<thead>
        		<tr class='darkgreenbox'>

        		<th class='text-center' style='width:50px'>
        	   <a href='<?php echo $enlace_jugador; ?>'>
		       <img src='<?php echo $rutaJugador; ?>' 
		       class='img-rounded' width='50' alt="jugador"></a>
		       </th>
		 		<th class='text-center'>
		 		<span style='font-size:11px'><?php echo $jugador['nombre']; ?></span><br />
		       <span><a href='<?php echo $enlace_jugador; ?>' 
		       style='color:maroon'><?php echo $jugador['apodo']; ?></a></span>

               <?php $fmJugador = $jugador['id'];
            // include('includes/futbolmaniaJugador.php');?>

		    	</th>


        		<?php if (5 != $jugador['posicion']) {
                ?>
                <th class='text-center' style='width:20px'><span class='iconseparate'><img src="/img/balon.png" height="17" style="margin-bottom:3px"></span>
                	<br /><?php if (1 == $jugador['posicion'] && $jugador['goles'] > 0) {
                    echo '-';
                } ?>
	             	<?php echo $jugador['goles']; ?>	             	
                </th>
                <?php
            } ?>

                
                <?php 
                if (isset($equipoPlantilla['liga']) && $equipoPlantilla['liga'] < 7) {
                    ?>
                <th class='text-center' style='width:20px'>
                <span class='iconseparate'><img src="/img/ta.png" height="17" style="margin-bottom:3px"></span>
                <br /><?php echo $jugador['ta']; ?>
                </th>
                <th class='text-center' style='width:20px'>
                <span class='iconseparate'><img src="/img/tr.png" height="17" style="margin-bottom:3px"></span>
                <br /><?php echo $jugador['tr']; ?>
                </th>
                <?php
                } ?>	
              	

                </tr>
             </thead>             
        </table> 

         <?php 
        $posicion = $jugador['posicion'];
        } ?>
</div>

        