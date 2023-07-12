<?php
$fecha = new \DateTime();
$diaAnterior = new \DateTime();
$diaSiguiente = new \DateTime();
$dia = $fecha->format('Y-m-d');

$diaAnterior = \DateTime::createFromFormat('Y-m-d', $dia);
$diaSiguiente = \DateTime::createFromFormat('Y-m-d', $dia);

$diaAnterior = $diaAnterior->modify('-1 day')->format('Y-m-d');
$diaSiguiente = $diaSiguiente->modify('+1 day')->format('Y-m-d');

$pr = array(); $ph = array(); $pa = array(); $pm = array();

foreach ($partidos as  $value) {
    if (!isset($value['jornada'])) {
        continue;
    }
    if ($value['fecha'] == $diaAnterior) {
        $pa[] = $value;
        continue;
    }
    if ($value['fecha'] == $dia) {
        $ph[] = $value;
        continue;
    }
    if ($value['fecha'] == $diaSiguiente) {
        $pm[] = $value;
        continue;
    }
    if (1 == $value['estado_partido']) {
        continue;
    }
    $pr[] = $value;
}

$phAc = ''; $pmAc = ''; $prAc = ''; $pRev = '';
if (count($ph) > 0) {
    $phAc = 'active';
    $pmAc = '';
    $prAc = '';
} elseif (count($pm) > 0) {
    $phAc = '';
    $pmAc = 'active';
    $prAc = '';
} elseif (count($pr) > 0) {
    $phAc = '';
    $pmAc = '';
    $prAc = 'active';
}

?>
<div class="col-xs-12 whitebox">

	<div class="col-xs-12 nopadding">
		<ul class="nav nav-tabs nopadding pesta celestebox" role="tablist" style="margin-top:3px;">
		    <?php if (count($pa) > 0) {
    ?>
		    <li class="text-center boldfont"><a href="#pesta_1">Ayer</a></li>
		    <?php
} ?>
		    <?php if (count($ph) > 0) {
        ?>
		    <li class="text-center boldfont <?php echo $phAc; ?>"><a href="#pesta_2">Hoy</a></li>
		    <?php
    } ?>
		    <?php if (count($pm) > 0) {
        ?>
		    <li class="text-center boldfont <?php echo $pmAc; ?>"><a href="#pesta_3">Mañana</a></li>
		    <?php
    } ?>
		    <?php if (count($pr) > 0) {
//        $pRev = array();
        $pRev = array_reverse($pr); ?>
		    <li class="text-center boldfont <?php echo $prAc; ?>"><a href="#pesta_4">Próximos días</a></li>
		    <?php
    } ?>
		</ul>
	</div>

	<div class="tab-content">
		    	
		<div class="tab-pane" id="pesta_1">
			<div class="row h40 whitebox nomargin"></div>
			<?php $j = '';
            foreach ($pa as $key => $partido) {
                if ($j != $partido['jornada']) {
                    echo '<h4>'.$partido['fase'].'</h4>';
                } ?>			
			<?php include './includes/contenidoPartido.php'; ?>
			<?php $j = $partido['jornada'];
            }?>		
    	</div>

    	<div class="tab-pane <?php echo $phAc; ?>" id="pesta_2">
			<div class="row h40 whitebox nomargin"></div>
			<?php $j = '';
            foreach ($ph as $key => $partido) {
                if ($j != $partido['jornada']) {
                    echo '<h4>'.$partido['fase'].'</h4>';
                } ?>			
			<?php include './includes/contenidoPartido.php'; ?>
			<?php $j = $partido['jornada'];
            }?>		
    	</div>

    	<div class="tab-pane <?php echo $pmAc; ?>" id="pesta_3">
			<div class="row h40 whitebox nomargin"></div>
			<?php $j = '';
            foreach ($pm as $key => $partido) {
                if ($j != $partido['jornada']) {
                    echo '<h4>'.$partido['fase'].'</h4>';
                } ?>			
			<?php include 'includes/contenidoPartido.php'; ?>
			<?php $j = $partido['jornada'];
            }?>		
    	</div>

		<div class="tab-pane <?php echo $prAc; ?>" id="pesta_4">
			<div class="row h40 whitebox nomargin"></div>
			<?php
            $f = ''; $colorFondo = ''; $j = 0;
                foreach ($pRev as $key => $partido) {
                    if (!isset($partido['jornada'])) {
                        continue;
                    }
                    if ($j != $partido['jornada']) {
                        echo '<h4>'.$partido['fase'].'</h4>';
                    }
                    if ($f != $partido['fecha']) {
                        if ('whitebox' == $colorFondo) {
                            $colorFondo = 'cajagrisclaro';
                        } else {
                            $colorFondo = 'whitebox';
                        } ?>
				<div class="col-xs-12 txt11 cajanaranja text-center"><?php echo utf8_encode(nombreDiaCompleto($partido['fecha'])); ?></div>
				<?php
                    } ?>
				<?php include 'includes/contenidoPartido.php'; ?>
				<?php 
                $f = $partido['fecha'];
                    $j = $partido['jornada'];
                }?>
    	</div>


    </div>

	
</div>
