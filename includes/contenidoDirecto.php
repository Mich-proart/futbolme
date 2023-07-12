<div class="col-xs-12 nopadding">	
	<?php 
    $temp_id = 0;
    $contador = 0;
    foreach ($directos as $partido) {     
    ++$contador;

        if ($temp_id != $partido['temporada_id'] && !isset($temporada_id)) {            
            $fondoCabecera = 'celestebox';
            $colorCabecera = 'white';
            include 'contenidoCabecera.php';
        }  
       include 'contenidoPartido.php';
       if (1 == $contador || 4 == $contador || 9 == $contador || 14 == $contador || 18 == $contador) { ?>
        <div class="col-xs-12 text-center whitebox">
            <?php  require_once 'includes/publicidad/directos.php'; ?>
        </div>
        <?php }

        $temp_id = $partido['temporada_id'];
    
    } ?>	
</div>