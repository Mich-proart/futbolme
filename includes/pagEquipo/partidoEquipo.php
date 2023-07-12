<div>
	<div style="float:left; margin-left:10px; height:auto; text-align: right;">
		<?php 
    if (1 != $partido['estado_partido']) {
        echo utf8_encode(nombreDia($partido['fecha']));
    } else {
        echo '<i>'.substr($partido['fecha'], -2).'-'.substr($partido['fecha'], 5, 2).'&nbsp;</i>';
    }

    ?></div>
	<?php 
    if (isset($puntos)) {
        ?>
	<div class="<?php echo $class; ?>" style="float:left; width:20px;" title="Puntos que el <?=$equipotxt; ?> ganó en este partido"><?php echo $puntos; ?></div>
	<?php
    $puntosAlFinal += $puntos;
    }
    if (598 != $partido['temporada_id']) {
        if (1 == $partido['tipo_torneo']) {
            ?>
	<div style="float:left; width:30px; text-align:center;">
        <?php
        $datos = liga($partido['temporada_id']);
            $jornada = $partido['jornada'];
            $nombre = $datos['nombre'];

            $url = '/resultados-directo/torneo/'.poner_guion($nombre).'/'.$partido['temporada_id'].'/'.$jornada; ?>
		<a href="<?=$url; ?>">
		J<?php echo $partido['jornada']; ?>
		</a>	
		</div>
	<?php
        } else {
            ?>
	<div style="float:left; width:230px; text-align:left;"> - <?php echo $partido['fase']; ?></div>
	<?php
        }
    } ?>	
	<div style="float:left; min-width:51px;">
		<?php
        $gL = ''; $gV = '';
            if (1 == $partido['estado_partido']) {
                if (isset($aldescanso[$partido['id']])) {
                    //imp($aldescanso[$partido['id']]);
                    if (isset($aldescanso[$partido['id']][$partido['equipoLocal_id']])) {
                        $eL = $aldescanso[$partido['id']][$partido['equipoLocal_id']];
                        $gL = count($aldescanso[$partido['id']][$partido['equipoLocal_id']]);
                    } else {
                        $gL = 0;
                    }
                    if (isset($aldescanso[$partido['id']][$partido['equipoVisitante_id']])) {
                        $eV = $aldescanso[$partido['id']][$partido['equipoVisitante_id']];
                        $gV = count($aldescanso[$partido['id']][$partido['equipoVisitante_id']]);
                    } else {
                        $gV = 0;
                    }
                } else {
                    if ($temporada_id < 25) {
                        $gL = 0;
                        $gV = 0;
                    }
                }

                if ($temporada_id < 25) {
                    $puntos2 = 0;
                    $class2 = 'colores_fondo_resultados_perdido';
                    if ($gL == $gV) {
                        $puntos2 = 1;
                        $class2 = 'colores_fondo_resultados_empatado';
                    } elseif ($equipo_id == $partido['equipoLocal_id']) {
                        if ($gL > $gV) {
                            $puntos2 = 3;
                            $class2 = 'colores_fondo_resultados_ganado';
                        }
                    } else {
                        if ($gV > $gL) {
                            $puntos2 = 3;
                            $class2 = 'colores_fondo_resultados_ganado';
                        }
                    }

                    $puntosAlDescanso += $puntos2;

                    echo  '&nbsp;&nbsp;al descanso <b>'.$gL.'-'.$gV.'</b>&nbsp';
                    echo '<span class="'.$class2.'" title="Puntos que el '.$equipotxt.' iba ganando al final de la primera parte">'.$puntos2.'</span>';

                    if ($puntos > $puntos2) {
                        echo "<span class'boldfont' style='color:blue'> +".($puntos - $puntos2).'</span>';
                    }
                    if ($puntos < $puntos2) {
                        echo "<span class'boldfont' style='color:red'> -".($puntos2 - $puntos).'</span>';
                    }
                }
            }
    ?>		
	</div>


    <?php

        $equipo_id=(int)$equipo_id;

        if ( ($equipo_id == $partido['equipoLocal_id'] && $partido['goles_local'] < $partido['goles_visitante'])
            || ($equipo_id == $partido['equipoVisitante_id'] && $partido['goles_local'] > $partido['goles_visitante'])) {
            $icono='<span class="badge" style="font-weight:300; background-color:red">D</span>';
        }

        if ( ($equipo_id == $partido['equipoLocal_id'] && $partido['goles_local'] > $partido['goles_visitante'])
            || ($equipo_id == $partido['equipoVisitante_id'] && $partido['goles_local'] < $partido['goles_visitante'])) {
            $icono='<span class="badge" style="font-weight:300; background-color:green">V</span>';
        }


        if ($partido['goles_local'] == $partido['goles_visitante']) {
            $icono='<span class="badge" style="font-weight:300; background-color:orange;">E</span>';
        }

        if ($equipo_id == $partido['equipoLocal_id']) {
            $iconoGF='<span class="badge" style="font-weight:300; background-color:#0B2161">'.$partido['goles_local'].'</span>';
            $iconoGC='<span class="badge" style="font-weight:300; background-color:#424242">'.$partido['goles_visitante'].'</span>';
        }
        if ($equipo_id == $partido['equipoVisitante_id']) {
            $iconoGF='<span class="badge" style="font-weight:300; background-color:#013ADF">'.$partido['goles_visitante'].'</span>';
            $iconoGC='<span class="badge" style="font-weight:300; background-color:#A4A4A4">'.$partido['goles_local'].'</span>';
        }




    ?>
	
	<div class="text-right icon-partido"  style="float:right;">ddd<?php echo $icono?></div>

    <div class="text-right icon-partido"  style="float:right;">
		
		<a href="<?php echo $enlace_partido; ?>" title="datos del partido">
		<span class="glyphicon glyphicon-chevron-down iconhover" style="cursor:pointer;background-color: green;width: 28px;height: 20px;margin: 0 3px;border: 3px solid black; color:white;"></span>
		</a>
	</div>

       <?php if (isset($temporada_id)) { $idt=$temporada_id; }
            if (!isset($idt)) { $idt=0; }
            echo "<div class='pull-right h25 text-center' style='padding:3px; width:25px; top-margin:-3px'>";
            include $nivel.'srcRecursos/partidoRmd.php';
            echo "</div>";
         ?>  
         
	<?php if (isset($partido['estadio'])) {
            $estadio = explode(',', $partido['estadio']);
            if (isset($estadio[1])) {
                $nombreEstadio = $estadio[1];
            } else {
                $nombreEstadio = '';
            } ?>
	<div style=" float:right; color:maroon" class="boldfont estadio-arbitro hidden-xs"><i><?php echo $nombreEstadio; ?></i></div>
	<?php
        } ?>
</div>
	
<div class="col-xs-12" style="width:100%;float:left;background-color:<?php echo $colorFila; ?>">
	<div class="col-xs-4 col-md-5 col-lg-5 col-centered mnopadding equipo-partido">			
		<div id="menu-equipo1-<?php echo $partido['equipoLocal_id']; ?>" class="menuEquipo1"></div>		
		<p class="pull-right boldfont lead" style="cursor: pointer;" >		
			
			<a href="<?php echo $enlace_local; ?>">
			<span class="hidden-xs"
			<?php if (1 == $partido['clasificado']) {
            ?>style="<?php echo $colorL; ?>; color: green !important"<?php
        } ?> 
			<?php if (2 == $partido['clasificado']) {
            ?>style="<?php echo $colorL; ?>; color: red !important"<?php
        } ?> 
			style="<?php echo $colorL; ?>;
			<?php if ($partido['equipoLocal_id'] == $equipo_id) {
            echo 'color: green;';
        }?>">
			<?php echo $partido['local']; ?>
			</span>
			<span class="hidden-sm hidden-md hidden-lg"
			<?php if (1 == $partido['clasificado']) {
            ?>style="<?php echo $colorL; ?>; color: green !important"<?php
        } ?> 
			<?php if (2 == $partido['clasificado']) {
            ?>style="<?php echo $colorL; ?>; color: red !important"<?php
        } ?> 
			style="<?php echo $colorL; ?>;
			<?php if ($partido['equipoLocal_id'] == $equipo_id) {
            echo 'color: green;';
        }?>">
			<?php echo $partido['localCorto']; ?>
			</span>
			</a>				
		</p>
	</div>
	<div class="col-xs-4 col-md-2 col-lg-2 col-centered resultado-partido">
		<?php 
        if (1 == $partido['estado_partido']) {
            ?>
		<p class="reboxL pull-left"><?php echo $partido['goles_local']; ?></p>
		<p class="reboxR pull-right"><?php echo $partido['goles_visitante']; ?></p>
		<?php
        } ?>
		<?php if ($partido['estado_partido'] > 2) {
            ?>
		<div style="color:orange; font-size:12px; font-weight:bold; text-align:center;">
		<?php if (3 == $partido['estado_partido']) {
                echo "SUSP<span style='color:orange; font-size:12px; font-weight:bold; text-align:center;' class='hidden-xs'>ENDIDO</span><br />";
            } ?>
		<?php if (4 == $partido['estado_partido']) {
                echo "APL<span style='color:orange; font-size:12px; font-weight:bold; text-align:center;' class='hidden-xs'>A</span>Z<span style='color:orange; font-size:12px; font-weight:bold; text-align:center;' class='hidden-xs'>ADO</span><br />";
            } ?>
		</div>
		<?php
        } ?>
	</div>
	<div class="col-xs-4 col-md-5 col-lg-5 col-centered mnopadding equipo-partido">	
		<p class="pull-left boldfont lead" style="cursor: pointer;">
			
			<a href="<?php echo $enlace_visitante; ?>">
			<span class="hidden-xs" 
			<?php if (1 == $partido['clasificado']) {
            ?>style="<?php echo $colorV; ?>; color: red !important"<?php
        } ?> 
			<?php if (2 == $partido['clasificado']) {
            ?>style="<?php echo $colorV; ?>; color: green !important"<?php
        } ?> 
			style="<?php echo $colorV; ?>;
			<?php if ($partido['equipoVisitante_id'] == $equipo_id) {
            echo 'color: green;';
        }?>">
			<?php echo $partido['visitante']; ?>
			</span>
			<span class="hidden-sm hidden-md hidden-lg"
			<?php if (1 == $partido['clasificado']) {
            ?>style="<?php echo $colorV; ?>; color: red !important"<?php
        } ?> 
			<?php if (2 == $partido['clasificado']) {
            ?>style="<?php echo $colorV; ?>; color: green !important"<?php
        } ?> 
			style="<?php echo $colorV; ?>;
			<?php if ($partido['equipoVisitante_id'] == $equipo_id) {
            echo 'color: green;';
        }?>">
			<?php echo $partido['visitanteCorto']; ?>
			</span>
			</a>
		</p>	
	</div>	
</div>
