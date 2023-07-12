

<div class="col-xs-12 whitebox">
    

    <div class="row whitebox nomargin">
        <div class="col-xs-6 nopadding hide">		        
               <h4 class="text-center"> 
                <select id="fases" name="fases" class="form-control input-sm">
            		<?php foreach ($fases as $id => $fila) {
        ?>
            			<option value="<?php echo $id; ?>" <?php if ($id == $valorJornada) {
            ?> selected <?php
        } ?>><?php echo $fila['nombre']; ?></option>
            		<?php
    } ?>
            	</select> 
            	</h4>
        </div>
        <div class="col-xs-6 txt11 hide">
        <?php if (206 == $temporada_id or 208 == $temporada_id) {
            ?>	
        <a href="<?php echo $_SERVER['REQUEST_URI']; ?>&ver=equipos">Equipos</a> 
        <?php
        } ?>
        </div>
    </div>	



    <div class="col-xs-12 whitebox nopadding txt11 celestebox">

    <ul class="nav nav-tabs text-center" role="tablist">
        <li class="col-xs-4 hide"><a href="/resultados-directo/torneo/segunda-division-promocion-de-ascenso/239/">Segunda - Promoción de ascenso</a></li>
        <li class="col-xs-4 hide"><a href="/resultados-directo/torneo/segunda-division-b-campeon-absoluto/462/">Segunda B - Campeón Absoluto</a></li>
        <li class="col-xs-6"><a href="/resultados-directo/torneo/segunda-division-b-promocion-de-ascenso/206/">
        <span class="hidden-xs">Segunda B - Promoción de ascenso</span>
        <span class="visible-xs">2ªB - Prom. ascenso</span>
        </a>
        <div class="marco nopadding nomargin" style="background-color: #BEF781"><a href='/historico/promocion2b/index.php'>Histórico 2ªB</a></div>
    	</li>
        <li class="col-xs-4 hide"><a href="/resultados-directo/torneo/segunda-division-b-promocion-de-permanencia/207/">Segunda B - Permanencia</a></li>   
        <li class="col-xs-6"><a href="/resultados-directo/torneo/tercera-division-promocion-de-ascenso/208/">
        <span class="hidden-xs">Tercera - Promoción de ascenso</span>
        <span class="visible-xs">3ª - Prom. ascenso</span> 
        <div class="marco nopadding nomargin" style="background-color: #BEF781"><a href='/historico/promocion3/index.php'>Histórico 3ª</a></div>   
        </a></li>    
    </ul>
    </div>


<?php

$partidos=array_reverse($partidos);?>

    <div id="eliminatoria"> 
            <?php $f = '';
            $colorFila = 'white';
            $colorFondo = 'cajagrisclaro';
            $fase='';
            foreach ($partidos as $key => $partido) {

                //if($partido['fecha']=='2019-06-16'){ continue; }

                if ($fase!=$partido['fase']) { ?>
                    <div class="clear"></div>
                    <div class="col-xs-12 whitebox text-center">
                    <?php if ($clickio===1){ ?>

                    <?php } ?>
                    </div>
                    <div class="clear"></div>
            
                    <div class="col-xs-12 marco"><h3><?php echo $partido['fase']?></h3></div>
                <?php }
                if ($f != $partido['fecha']) {
                    if ('whitebox' == $colorFondo) {
                        $colorFondo = 'cajagrisclaro';
                    } else {
                        $colorFondo = 'whitebox';
                    } ?>
                    <div class="col-xs-12 txt11 cajanaranja text-center"><?php echo nombreDiaCompleto($partido['fecha']); ?></div>
                    <?php
                }
                include 'includes/contenidoPartido.php';
                $f = $partido['fecha'];
                $fase=$partido['fase'];
            } ?>
        </div>
</div>
<?php 

















/*

die;


if ($temporada_id < 209) {
        $columnas = 3;
        $tope = 4;
        $suma = 2;
        if (208 == $temporada_id) {
            $columnas = 4;
            $tope = 3;
            $suma = 6;
        }

        if (isset($partidos['resto'])) {
            unset($partidos['resto']);
        }

        if (207 == $temporada_id) {
            ?>

	<div id="eliminatoria">	
		<?php $f = '';
            $colorFila = 'white';
            $colorFondo = 'cajagrisclaro';
            foreach ($partidos as $partido) {
                if ($f != $partido['fecha']) {
                    if ('whitebox' == $colorFondo) {
                        $colorFondo = 'cajagrisclaro';
                    } else {
                        $colorFondo = 'whitebox';
                    } ?>
			<div class="col-xs-12 txt11 cajanaranja text-center"><?php echo utf8_encode(nombreDiaCompleto($partido['fecha'])); ?></div>
			<?php
                }
                include './srcRecursos/partidoR.php';
                $f = $partido['fecha'];
            } ?>
	</div>

	<div class="col-xs-12 marconegro">
	<?php require_once 'includes/publicidad/cuerpo04.php'; ?>
	</div>

<div class="col-xs-12 whitebox">
	<h1 class="text-center">Promocionan para mantener la categoría</h1>
	<?php 
    $equipos = $promocion;
            $contador = 0;

            foreach ($equipos as $fila) {
                ++$contador;
                $rutaEscudo = '/img/equipos/escudo'.$fila['equipo_id'].'.png';
                if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaEscudo))) {
                    $rutaEscudo = '/img/jugadores/NI.png';
                } ?>
	    <div class="col-xs-<?php echo $columnas; ?> whitebox text-center">        
	            <a href="/resultados-directo/equipo/<?php echo poner_guion($fila['nombre']); ?>/<?php echo $fila['equipo_id']; ?>">
	                <img src="<?php echo $rutaEscudo; ?>" style="height:90px;" alt="escudo">
	            </a><br /><a href="/temporada.php?id=<?php echo $fila['grupo'] + $suma; ?>">Grupo <?php echo $fila['grupo']; ?></a><br />
	            <b><a href="/resultados-directo/equipo/<?php echo poner_guion($fila['nombre']); ?>/<?php echo $fila['equipo_id']; ?>"><?php echo $fila['nombre']; ?></a></b>
	     </div>
	<?php 

    if ($contador == $tope) {
        $contador = 0;
        echo "<div class='clear h40'></div>";
    }
            } ?>
	
	<div class="clear"></div>
	
</div>	


	<?php
        } else {
            ?>

		
		<div id="eliminatoria">	
			<?php $f = '';
            $colorFila = 'white';
            $colorFondo = 'cajagrisclaro';
            foreach ($partidos as $key => $partido) {
                if ($f != $partido['fecha']) {
                    if ('whitebox' == $colorFondo) {
                        $colorFondo = 'cajagrisclaro';
                    } else {
                        $colorFondo = 'whitebox';
                    } ?>
					<div class="col-xs-12 txt11 cajanaranja text-center"><?php echo utf8_encode(nombreDiaCompleto($partido['fecha'])); ?></div>
					<?php
                }
                include 'includes/contenidoPartido.php';
                $f = $partido['fecha'];
            } ?>
		</div>

		<div class="col-xs-12 marconegro">
		<?php require_once 'includes/publicidad/cuerpo04.php'; ?>
		</div>

		
					<?php if (isset($_GET['ver'])) {
                ?>
					<div class="col-xs-12 whitebox">
						<h1 class="text-center">Campeones</h1>
						<?php 
                        $equipos = $primeros;
                $contador = 0;

                foreach ($equipos as $fila) {
                    ++$contador;
                    $rutaEscudo = '/img/equipos/escudo'.$fila['equipo_id'].'.png';
                    if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaEscudo))) {
                        $rutaEscudo = '/img/jugadores/NI.png';
                    } ?>
						    <div class="col-xs-<?php echo $columnas; ?> whitebox text-center">        
						            <a href="/resultados-directo/equipo/<?php echo poner_guion($fila['nombre']); ?>/<?php echo $fila['equipo_id']; ?>">
						                <img src="<?php echo $rutaEscudo; ?>" style="height:90px;" alt="escudo">
						            </a>
						            <br /><a href="/temporada.php?id=<?php echo $fila['grupo'] + $suma; ?>">Grupo <?php echo $fila['grupo']; ?></a><br />
						            <b><a href="/resultados-directo/equipo/<?php echo poner_guion($fila['nombre']); ?>/<?php echo $fila['equipo_id']; ?>"><?php echo $fila['nombre']; ?></a></b>

						     </div>
						<?php 

                        if ($contador == $tope) {
                            $contador = 0;
                            echo "<div class='clear h40'></div>";
                        }
                } ?>
						
						
					</div>	

					<div class="col-xs-12 whitebox">
						<h1 class="text-center">Segundos clasificados</h1>
						<?php 

                        $equipos = $segundo;
                $contador = 0;

                foreach ($equipos as $fila) {
                    ++$contador;
                    $rutaEscudo = '/img/equipos/escudo'.$fila['equipo_id'].'.png';
                    if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaEscudo))) {
                        $rutaEscudo = '/img/jugadores/NI.png';
                    } ?>
						    <div class="col-xs-<?php echo $columnas; ?> whitebox text-center">        
						            <a href="/resultados-directo/equipo/<?php echo poner_guion($fila['nombre']); ?>/<?php echo $fila['equipo_id']; ?>">
						                <img src="<?php echo $rutaEscudo; ?>" style="height:90px;" alt="escudo">
						            </a><br /><a href="/temporada.php?id=<?php echo $fila['grupo'] + $suma; ?>">Grupo <?php echo $fila['grupo']; ?></a><br />
						            <b><a href="/resultados-directo/equipo/<?php echo poner_guion($fila['nombre']); ?>/<?php echo $fila['equipo_id']; ?>"><?php echo $fila['nombre']; ?></a></b>
						     </div>
						<?php 
                        if ($contador == $tope) {
                            $contador = 0;
                            echo "<div class='clear h40'></div>";
                        }
                } ?>
						
					</div>	

					<div class="col-xs-12 whitebox">
						<h1 class="text-center">Terceros clasificados</h1>
						<?php 
                        $equipos = $terceros;
                $contador = 0;

                foreach ($equipos as $fila) {
                    ++$contador;
                    $rutaEscudo = '/img/equipos/escudo'.$fila['equipo_id'].'.png';
                    if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaEscudo))) {
                        $rutaEscudo = '/img/jugadores/NI.png';
                    } ?>
						    <div class="col-xs-<?php echo $columnas; ?> whitebox text-center">        
						            <a href="/resultados-directo/equipo/<?php echo poner_guion($fila['nombre']); ?>/<?php echo $fila['equipo_id']; ?>">
						                <img src="<?php echo $rutaEscudo; ?>" style="height:90px;" alt="escudo">
						            </a><br /><a href="/temporada.php?id=<?php echo $fila['grupo'] + $suma; ?>">Grupo <?php echo $fila['grupo']; ?></a><br />
						            <b><a href="/resultados-directo/equipo/<?php echo poner_guion($fila['nombre']); ?>/<?php echo $fila['equipo_id']; ?>"><?php echo $fila['nombre']; ?></a></b>
						     </div>
						<?php 
                        if ($contador == $tope) {
                            $contador = 0;
                            echo "<div class='clear h40'></div>";
                        }
                } ?>
						
					</div>	

					<div class="col-xs-12 whitebox">
						<h1 class="text-center">Cuartos clasificados</h1>
						<?php 
                        $equipos = $cuartos;
                $contador = 0;

                foreach ($equipos as $fila) {
                    ++$contador;
                    $rutaEscudo = '/img/equipos/escudo'.$fila['equipo_id'].'.png';
                    if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaEscudo))) {
                        $rutaEscudo = '/img/jugadores/NI.png';
                    } ?>
						    <div class="col-xs-<?php echo $columnas; ?> whitebox text-center">        
						            <a href="/resultados-directo/equipo/<?php echo poner_guion($fila['nombre']); ?>/<?php echo $fila['equipo_id']; ?>">
						                <img src="<?php echo $rutaEscudo; ?>" style="height:90px;" alt="escudo">
						            </a><br /><a href="/temporada.php?id=<?php echo $fila['grupo'] + $suma; ?>">Grupo <?php echo $fila['grupo']; ?></a><br />
						            <b><a href="/resultados-directo/equipo/<?php echo poner_guion($fila['nombre']); ?>/<?php echo $fila['equipo_id']; ?>"><?php echo $fila['nombre']; ?></a></b>
						     </div>
						<?php 
                        if ($contador == $tope) {
                            $contador = 0;
                            echo "<div class='clear h40'></div>";
                        }
                } ?>
						
					</div>	
							<?php if (208 == $temporada_id) {
                    ?>
							<div class="col-xs-12 whitebox marco">
							En el grupo 15, el segundo clasificado fué el CD Iruña, que al no poder ascender a Segunda B por estar en dicha categoría el Atlético Osasuna B y ser ambos equipos filiales del mismo club (Club Atlético Osasuna), cede su posición al Atlético Cirbonero que fué tercero. El CD Cortes que fué cuarto pasa a ocupar plaza de tercero y el CD Oberena que fué quinto pasa a ocupar plaza de cuarto en esta promoción. 
							</div>
							<?php
                } // si temporada es igaul a 208?>
				<?php
            } // si existe ver?>
	<?php
        } // si temporada es diferente a 207?>
<?php
    } else { //462?> 

	<div id="eliminatoria">	
		<?php $f = '';
        $colorFila = 'white';
        $colorFondo = 'cajagrisclaro';
        if (isset($partidos['resto'])) {
            unset($partidos['resto']);
        }
        foreach ($partidos as $partido) {
            if ($f != $partido['fecha']) {
                if ('whitebox' == $colorFondo) {
                    $colorFondo = 'cajagrisclaro';
                } else {
                    $colorFondo = 'whitebox';
                } ?>
			<div class="col-xs-12 txt11 cajanaranja text-center"><?php echo utf8_encode(nombreDiaCompleto($partido['fecha'])); ?></div>
			<?php
            }
            include 'includes/contenidoPartido.php';
            $f = $partido['fecha'];
        } ?>
	</div>

	<div class="col-xs-12 marconegro">
	<?php require_once 'includes/publicidad/cuerpo04.php'; ?>
	</div>

<?php
    }?>
</div>

















<!-- para el historico -->
<div id="eliminatoria" class="hide">	
		<?php $f = ''; $colorFila = 'white'; $j = 0;
            foreach ($partidos as $key => $partido) {
                if (!isset($partido['idPartido'])) {
                    continue;
                }
                $colorL = '';
                $colorV = '';
                //if ($partido['jornada']==$valorJornada) {
                if ($f != $partido['fecha']) {
                    if ('white' == $colorFila) {
                        $colorFila = '#ddffff';
                    } else {
                        $colorFila = 'white';
                    }
                }
                if (0 == $valorJornada && $partido['jornada'] != $j) {
                    ?>
					<div class="row h10 nomargin"></div>
					<div class="boxresultgreenhead row darkgreenbox nomargin"> <!--Comienzo greenbox head-->
					    <div class="col-xs-12">
				            <p class="nomargin">
				                <span class="boldfont"><?php echo $partido['fase']; ?></span>	                
				            </p>
				        </div>
				    </div> <!--Fin greenbox head-->
			    <?php
                }
                $equipo_id = 10000;
                $partido['nombreTorneo'] = ''; // para que salga la fase
                include './srcRecursos/partidoPromo.php';
                $f = $partido['fecha'];
                $j = $partido['jornada'];
            } ?>
	</div>


*/

