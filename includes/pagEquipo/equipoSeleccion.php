<div class="col-xs-12 whitebox">
	<div class="row h25"></div>
	<div class="col-xs-4 text-center">		
		<img src="/img/paises/banderas/ban<?php echo $pais_id; ?>.png" class="img-rounded">		
	</div>
	<div class="col-xs-8 text-center">						
		<h1><?php echo $equipotxt; ?></h1>
		<h3><?php echo $categoriatxt; ?></h3>
	</div>
<div class="clear"></div>
<?php 
$torneoDestacado = 238;
$ePartidos = XequipoPartidos($equipo_id);

unset($torneos);
$torneos = array();
$porTorneos = array();

if (count($ePartidos) > 0) {
    foreach ($ePartidos['partidos'] as $key => $value) {
        $torneos[$value['temporada_id']]['tipo_torneo'] = $value['tipo_torneo'];
        $torneos[$value['temporada_id']]['nombreTorneo'] = $value['nombreTorneo'];
        $porTorneos[$value['temporada_id']][$value['id']] = $value;
    }
}


if (count($torneos) > 0) {
    ?>
	<div class="tab-content marco">
	<?php
    $contador = 0; 
    foreach ($torneos as $key1 => $value) { 
              if ($key1==231){ continue; } ?>

                <div class="panel panel-default">
            
                <span><a class="boldfont pull-right" href="/temporada.php?id=<?=$key1; ?>">Ir a <?php echo $value['nombreTorneo']?></a></span>
        

                <?php foreach ($porTorneos[$key1] as $k => $partido) {
                $idt=$key1;
                $pagina = 'seleccion'; //para que no salga el nombre del torneo?>					
					<?php include 'includes/contenidoPartido.php'; ?>
				<?php } 

                /*
                if ($key1==$torneoDestacado) {
                    $eTXT=$equipotxt;
                    $equipoSeleccion=$equipo_id;
                    $torneoSeleccion=$torneoDestacado;
                    $partidoSeleccion=151500; //partido donde empieza a contar..
                    require_once('includes/seleccionados.php');
                } */

                ?>
			</div>
		
	  <?php } ?>
	  <div class="clear"></div>
	</div>
<?php
}	?>
</div>


	    
	