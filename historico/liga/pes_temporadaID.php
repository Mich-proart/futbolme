<div class="nopadding col-xs-12">
<?php 
if ($equipo_id > 0) { $equipo_activo = $equipo_id; } ?>
	<table class="table table-bordered table-condensed greenbox nomargin txt11">
	<tr bgcolor='#336699'>
	<td style='color:#FFFFFF; text-align:center;' width='7%'>Pos</td>
	<td style='color:#FFFFFF;'>Equipo</td>
	<td style='color:#FFFFFF; text-align:center;' width='7%'>Ptos</td>
	<td style='color:#FFFFFF; text-align:center;' width='7%'>Ju</td>
	<td style='color:#FFFFFF; text-align:center;' width='7%'>Ga</td>
	<td style='color:#FFFFFF; text-align:center;' width='7%'>Em</td>
	<td style='color:#FFFFFF; text-align:center;' width='7%'>Pe</td>
	<td style='color:#FFFFFF; text-align:center;' width='7%'>Gf</td>
	<td style='color:#FFFFFF; text-align:center;' width='7%'>Gc</td>
	</tr>
		<?php 

        foreach ($clas_temporada as $fila) {
            $css = 'color:'.$fila['color_texto'].'; background-color:'.$fila['color_fondo'];
            if ('0' == $fila['equipo']) {
                continue;
            }
            $nombreEquipo = $fila['equipo'];
            $nombreCorto = $fila['equipo'];

            $rutaEscudo = '/img/equipos/escudo'.$fila['equipo_id'].'.png';
            if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaEscudo))) {
                $rutaEscudo = '/img/jugadores/NI.png';
            } ?>

		<tr>
		<td style='<?php echo $css; ?>; text-align:center;' width='7%'><?php echo $fila['posicion']; ?>º</td>
		<td style='<?php echo $css; ?>; text-align:left;'>
            <img src="<?php echo $rutaEscudo; ?>" itemprop="logo" alt="escudo <?=$fila['equipo'];?>"  style="width:18px; height:20px; margin-right: 5px">
		<?php 
        $enlace = '/historico-liga/temporada-'.trim(poner_guion($nombreTemporada)).'/torneo/'.trim(poner_guion($txtDivision)).'/'.$temporada_id.'/'.$temporada.'/'.$division.'&equipo_id='.$fila['equipo_id']; ?>				
		<a href="<?php echo $enlace; ?>" style="color:navy">
		<?php if ($equipo_id == $fila['equipo_id']) {
            echo '<b>'.$nombreEquipo.'</b>';
        } else {
            echo $nombreEquipo;
        } ?></a>
		</td>
		<td style='<?php echo $css; ?>; text-align:center;' width='7%'><?php echo $fila['puntos']; ?></td>
		<td style='<?php echo $css; ?>; text-align:center;' width='7%'><?php echo $fila['jugados']; ?></td>
		<td style='<?php echo $css; ?>; text-align:center;' width='7%'><?php echo $fila['ganados']; ?></td>
		<td style='<?php echo $css; ?>; text-align:center;' width='7%'><?php echo $fila['empatados']; ?></td>
		<td style='<?php echo $css; ?>; text-align:center;' width='7%'><?php echo $fila['perdidos']; ?></td>
		<td style='<?php echo $css; ?>; text-align:center;' width='7%'><?php echo $fila['golesFavor']; ?></td>
		<td style='<?php echo $css; ?>; text-align:center;' width='7%'><?php echo $fila['golesContra']; ?></td>
		</tr>

		<?php
        } ?>
		</table>


		<div style="background-color:yellow"><?php echo resumen($temporada_id); ?></div>




		<table class="table table-bordered table-condensed whitebox nomargin">
		<thead>
		<tr class="darkgreenbox">
		<th class="text-center" colspan="7">
		<?php  echo $nombreTemporada; ?>
		<?php if ($equipo_id > 0) {
            $enlace = '/historico-liga/'.trim(poner_guion($nombreTemporada)).'/torneo/'.trim(poner_guion($txtDivision)).'/'.$temporada_id.'/'.$temporada.'/'.$division; ?>
		&nbsp;&nbsp;&nbsp;<a href="<?php echo $enlace; ?>">Ver toda la temporada</a>
		<?php
        } ?>
		</th>																												
		</tr>
		</thead>

		<tbody class="whitebox">					 
		<?php	

        $j = 0;
        if (!isset($partidos)) {
            $partidos = array();
        }
        foreach ($partidos as $partido) {
            if (!isset($partido['idPartido'])) {
                continue;
            }
            $puntos = -1;

            $e = denominacion($partido['fm_local_id'], $temporada);
            if (0 == count($e)) {
                $localEquipo = $partido['nomCasa'];
                $localCorto = $partido['nomCasa'];
                $localescudo = $partido['fm_local_id'];
            } else {
                $localEquipo = $e[0]['nombre'];
                $localCorto = $e[0]['nombreCorto'];
                $localescudo = $partido['fm_local_id'].$e[0]['escudo'];
            }

            $e = denominacion($partido['fm_visitante_id'], $temporada);
            if (0 == count($e)) {
                $visitEquipo = $partido['nomFuera'];
                $visitCorto = $partido['nomFuera'];
                $visitescudo = $partido['fm_visitante_id'];
            } else {
                $visitEquipo = $e[0]['nombre'];
                $visitCorto = $e[0]['nombreCorto'];
                $visitescudo = $partido['fm_visitante_id'].$e[0]['escudo'];
            }

            $pgHpartido = '/historico-liga/'.poner_guion($txtDivision).'/'.poner_guion($nombreTemporada).'/'.poner_guion($partido['nomCasa']).'-'.poner_guion($partido['nomFuera']).'/'.$partido['jornada'].'/partido/'.$partido['idPartido'];

            if (isset($equipo_activo)) {
                if ($equipo_activo != $partido['fm_local_id'] && $equipo_activo != $partido['fm_visitante_id']) {
                    continue;
                }

                if ($equipo_activo == $partido['fm_local_id'] || $equipo_activo == $partido['fm_visitante_id']) {
                    $puntos = 0;
                    $class = ' colores_fondo_resultados_perdido';
                    if ($partido['resulCasa'] == $partido['resulFuera']) {
                        $puntos = 1;
                        $class = ' colores_fondo_resultados_empatado';
                    } elseif ($equipo_activo == $partido['fm_local_id']) {
                        if ($partido['resulCasa'] > $partido['resulFuera']) {
                            $puntos = 3;
                            $class = ' colores_fondo_resultados_ganado';
                        }
                    } else {
                        if ($partido['resulFuera'] > $partido['resulCasa']) {
                            $puntos = 3;
                            $class = ' colores_fondo_resultados_ganado';
                        }
                    }
                }
            }

            if (!isset($partido['fecha'])) {
                continue;
            }

            if ('1900-01-01' == $partido['fecha']) {
                $fecha = '';
            } else {
                $fecha = nombreDiaCompleto($partido['fecha']);
            }

            if (!isset($equipo_activo)) {
                if ($partido['jornada'] != $j) {
                    ?>
		<tr bgcolor='orange'><td colspan='6'>Jornada <?php echo $partido['jornada']; ?></td></tr>
		<?php
                }
            } ?>


		<tr bgcolor='white'><td colspan='6'>
		<?php if ($puntos > -1) {
                ?>
		<div class="<?php echo $class; ?>" style="float:left; width:20px;"><?php echo $puntos; ?></div>
		<?php
            } ?>

		<?php if (isset($equipo_activo)) {
                ?>
		<div class="pull-left" style="padding-left:10px;">Jda. <?php echo $partido['jornada']; ?></div>
		<?php
            } ?>
		<div class="pull-left" style="padding-left:10px;font-size:12px;"><?php echo $fecha; ?></div>
		
		<a href="<?php echo $pgHpartido; ?>">
        <span class="glyphicon glyphicon-eye-open iconhover pull-right" style="cursor:pointer;
                border: 1px solid black; padding:3px" title="Partido entre <?=$localEquipo;?> y <?=$visitEquipo;?> "></span>
        </a>
				<?php
                /*$idt=$temporada_id;
                $bdPartido=1;
                $partido['id']=$partido['idPartido'];
                include $nivel.'srcRecursos/partidoRmd.php';*/
                ?>
				
        	
		
		</td></tr>

		<tr bgcolor='white'>
			

		<td align="right">
		<?php 
        if (isset($equipo_activo)) {
            if ($equipo_activo != $partido['fm_local_id']) {
                echo $localEquipo;
            } else {
                echo '<b>'.$localEquipo.'</b>';
            }
        } else {
            echo $localEquipo;
        } ?>
		</td>
		<td align="center" class="boldfont" style="min-width:50px">
		<?php echo $partido['resulCasa']; ?> - <?php echo $partido['resulFuera']; ?>
		</td>
		<td>
		<?php 
        if (isset($equipo_activo)) {
            if ($equipo_activo != $partido['fm_visitante_id']) {
                echo $visitEquipo;
            } else {
                echo '<b>'.$visitEquipo.'</b>';
            }
        } else {
            echo $visitEquipo;
        } ?>
		</td>
		<?php 
        /*
        <td>
        $enlace="/historico-liga/".poner_guion($nombreTemporada)."/".poner_guion($txtDivision)."/".poner_guion($partido['nomCasa'])."-".poner_guion($partido['nomFuera'])."/jornada-".$partido['jornada']."/partido/".$partido['idPartido'];
        <a href="<?php echo $enlace; ?>">
        <span style="font-size:18; font-weight:bold">+</span>
        </a>
        </td>
        */
        ?>
		


		</tr>
		<?php if (strlen($partido['cosas']) > 5) {
            ?>

		<tr><td class="text-right" colspan="4">

				<?php $cadena = desglosarTexto($partido['cosas']); ?>    
                <div class="col-xs-6 col-md-6 col-lg-6 nopadding" style="min-height:20px">
                <?php if (strlen($cadena[1]) > 2) {
                ?>
                    <p class="observacion-partido w100 cronicaL"><i>
                    <?php echo $cadena[1]; ?>
                    </i></p>
                <?php
            } ?>
                </div> 
                <div class="col-xs-6 col-md-6 col-lg-6 nopadding">
                <?php if (strlen($cadena[2]) > 2) {
                ?>
                    <p class="observacion-partido w100 cronicaR"><i>
                    <?php echo $cadena[2]; ?>
                    </i></p>
                <?php
            } ?>
                </div>
                <?php if (strlen($cadena[0]) > 2) {
                ?>
                <div class="col-xs-12 col-md-12 col-lg-12 nopadding">
                    <p class="observacion-partido w100 text-right"><i>
                    <?php echo $cadena[0]; ?>
                    </i></p>
                </div>
                <?php
            } ?> 




		</td></tr>
		

		<?php
        } ?>
		

		<?php $j = $partido['jornada'];
        }?>

		
		</tbody>
		</table>
														
</div>
