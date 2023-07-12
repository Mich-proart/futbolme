<div class="col-xs-12 txt11">
    <?php   $id_equipo = 0; $contador = 0;
    foreach ($fichajes as $jugador) {
        $enlace_jugador = '/resultados-directo/jugador/'.poner_guion($jugador['apodo']).'/'.$jugador['id'];
        $enlace_equipo = '/resultados-directo/equipo/'.poner_guion($jugador['equipo']).'/'.$jugador['equipoActual_id'];
        switch ($jugador['posicion']) {
            case '1':
                $txtPosicion = 'Portero';
                break;
            case '2':
                $txtPosicion = 'Defensa';
                break;
            case '3':
                $txtPosicion = 'Centrocampista';
                break;
            case '4':
                $txtPosicion = 'Delantero';
                break;
            case '5':
                $txtPosicion = 'Entrenador';
                break;
            default:
                $txtPosicion = 'Sin demarcación';
                break;
        }
        if ($jugador['equipoActual_id'] != $id_equipo && isset($temporada_id)) {
            ++$contador; 

            $rutaEscudo=rutaEscudo($jugador['club_id'],$jugador['equipoActual_id']);

            ?>
			<div style="clear:both; border-top: solid 10px gainsboro; padding:10px; margin-top:10px"></div> 
	        <div class="col-xs-3">
	            
                <a href="<?php echo $enlace_equipo; ?>"><img src="<?php echo $rutaEscudo; ?>" alt="<?=$jugador['equipo']; ?>" class="img-rounded" width="60"  height="90"></a>

	        </div>
	        <div class="col-xs-9 celestebox">
	             <h4><span><a href="<?php echo $enlace_equipo; ?>" style="color:white"><?php echo $jugador['equipo']; ?></a></span>
	             </h4>
	        </div> 
	        <div style="clear:both"></div> 
	        <?php if (2 == $contador) { ?>
            <div class="col-xs-12 marconegro">
            <?php require_once 'includes/publicidad/cuerpo04.php'; ?>
            </div>
            <?php
            }
        }

        $rutaJugador = '/img/jugadores/jugador'.$jugador['id'].'.jpg';
        if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaJugador))) {
            $rutaJugador = '/img/jugadores/NI.png';
        } ?>
	    <div style="height:5px; width:100%; border-top: solid 1px dimgray"></div>
	    <div class="row nomargin">        
	        <div class="col-xs-3">
	            <a href="<?php echo $enlace_jugador; ?>"><img src="<?php echo $rutaJugador; ?>" class="img-rounded" width="64"  height="96" alt="jugador"></a>
	        </div>
	        <div class="col-xs-9">
    	    <span><a href="<?php echo $enlace_jugador; ?>"><?php echo $jugador['apodo']; ?></a></span>
            <br /><span>Procedencia: <?php echo $jugador['slug']; ?></span>
            <br /><span><b><?php echo $txtPosicion; ?></b></span>	            
	        </div>       
	    </div>
	    <?php $id_equipo = $jugador['equipoActual_id'];
    } ?>
</div>

