<?php
//imp(count($partidos)+$c_directos);
//imp($temporada_id);
?>
<div class="col-xs-12 whitebox nopadding txt11">
	<ul id="menuTorneo" class="nav nav-tabs nopadding celestebox" role="tablist" id="pestaTemporada">

		<li class="text-center boldfont <?php echo $pesJornada; ?>"><a href="<?php echo $pgTemporada2; ?>?modo=t">Jornada</a></li>
   		<?php if ($temporada_id < 25 || 214 == $temporada_id) { ?>
	    <li class="text-center boldfont <?php echo $pesGoleadores; ?>"><a href="<?php echo $pgTemporada; ?>&modelo=Goleadores">Goleadores</a></li>
		    <?php if ($temporada_id < 25 || 214 == $temporada_id) { ?>
		    <li class="text-center boldfont <?php echo $pesZamoras; ?>"><a href="<?php echo $pgTemporada; ?>&modelo=Zamoras">Zamoras</a></li>		        		    
	       <?php }
        } ?>
	    <li class="text-center boldfont <?php echo $pesCalendario; ?>"><a href="<?php echo $pgTemporada; ?>&modelo=Calendario">Calendario</a></li>
        <li class="text-center boldfont">
            <a href="/historico/2017-18/index.php?modo=t&id=<?php echo $temporada_id?>">2017-18</a>
        </li> 

        <span class="pull-right" style="color:yellow"><?php echo "Temporada ".$_SESSION['temporada']?>&nbsp;&nbsp;</span>  
        
	</ul>


	<?php 
    
    switch ($modelo) {        

            case 'Jornada':

            require_once 'pesJornada.php';
             break;

        case 'Goleadores':
            require_once 'pesGoleadores.php';
        break;

        case 'Zamoras':
            require_once 'pesZamoras.php';
        break;
        
        case 'Calendario': ?>
			<div class="col-xs-12 whitebox">
				<?php $f = ''; $colorFondo = ''; $j = 0; $html = '';
                $goles = array();
                    foreach ($partidos as $key => $partido) {
                        if ('resto' === $key) {
                            continue;
                        }
                        
                        if ($j != $partido['jornada']) {
                            echo $html."<div class='cols-xs-12 text-center cajaverde'><h4><a class='boldfont' href='/temporada.php?id=".$temporada_id.'&jornada='.$partido['jornada']."'>Jornada ".$partido['jornada'].'</a></h4></div>';
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
                        $j = $partido['jornada'];
                    }
                echo $html; unset($html); ?>
			</div>
 		<?php break;
        
    } ?>

</div>
