
<div class="col-xs-12">
	<div id="selector-jornadas" class="col-xs-6 btn btn-success txt11">
	<?php if ($valorJornada > 0) {
    ?>
	<a  style='color:#ffffff' href="<?php echo $pgTemporadaSinJornada; ?>&jornada=<?php echo $valorJornada - 1; ?>"><span id="jornada-previa" data-val="<?php echo $valorJornada - 1; ?>" class="iconseparate glyphicon glyphicon-chevron-left"></span></a>
	<?php
} ?>
		<a href="#" onclick="return false;" style='color:#ffffff' data-toggle="popover" data-placement="bottom" data-container="body" data-html="true" 
		data-content="<div class='menu_16 text-center'>
			<?php for ($i = 0; $i < $jornadas; ++$i) {
        ?>
			<div class='text-center boldfont' style='border: 1px solid black; float:left; min-width:40px; height:40px; font-size:20px'>
			<a href='<?php echo $pgTemporadaSinJornada; ?>&jornada=<?php echo $i + 1; ?>'>
			<?php echo $i + 1; ?></a></div>					                
            <?php
    } ?>
		</div>" 
		data-original-title="Jornadas">
		<?php if ($valorJornada > 0) {
        ?>
		Jornada <?php echo $valorJornada; ?> de <?php echo $jornadas; ?>
		<?php
    } else {
        ?>	
		Jornadas
		<?php
    } ?>
		<span class="glyphicon glyphicon-chevron-down iconhover"></span>
		</a>
	<?php if ($valorJornada < $jornadas && $valorJornada > 0) {
        ?>
	<a style='color:#ffffff' href="<?php echo $pgTemporadaSinJornada; ?>&jornada=<?php echo $valorJornada + 1; ?>"><span id="jornada-posterior" data-val="<?php echo $valorJornada + 1; ?>" class="iconseparate glyphicon glyphicon-chevron-right"></span></a>
	<?php
    } ?>
	</div>

		
	<div class="col-xs-6 txt11">		
	
	</div>
</div>

<div class="col-xs-12 nopadding" id="mostrar-calendario"></div>
	
	<div id="contenedor-jornada-clasificacion" class="col-xs-12">
	

	<?php if ($valorJornada > 0) {
        ?>
		<?php 
            $f = '';
        $colorFondo = '';
        $html = '';
        foreach ($partidos as $key => $partido) {
            if ('resto' === $key) {
                continue;
            }
            if (2 == $partido['estado_partido']) {
                continue;
            }
            if ($f != $partido['fecha']) {
                if ('whitebox' == $colorFondo) {
                    $colorFondo = 'cajagrisclaro';
                } else {
                    $colorFondo = 'whitebox';
                } ?>
			<div class="col-xs-12 txt11 cajanaranja text-center"><?php echo utf8_encode(nombreDiaCompleto($partido['fecha'])); ?></div>
			<?php
            }
            if (null == $partido['equipoLocal_id'] || null == $partido['equipoVisitante_id']) {
                $html = '<span class="boldfont" style="margin-left: 20px;">
					Descansa ';
                if (null == $partido['equipoLocal_id']) {
                    $html .= $partido['visitante'];
                } else {
                    $html .= $partido['local'];
                }
                $html.'</span>';
            } else {
                include 'partidoR.php';
            }
            $f = $partido['fecha'];
        }
        echo $html;

        //if ($temporada_id==2) { imp($clasificacion); }?>

			<div class="clear"></div>

			<?php 
            require_once 'pesClasificacion.php';
       
    }?>

</div>
	
		
	