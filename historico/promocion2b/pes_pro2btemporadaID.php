<div class="panel panel-default">
<div class="panel-heading">								

<div class="panel-body">
<div class="nopadding col-xs-12 col-md-12 col-lg-12">
		<?php 

        $partidos = partidosHistoricoLiga($temporada_id);

            if (isset($_GET['equipo'])) {
                $equipo_activo = $_GET['equipo'];
            }

                if (1 == $estilo) {
                    $clas_temporada = leerClasificacionH($temporada_id, 0, 0); ?>

				<table class="table table-bordered table-condensed whitebox nomargin">
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
                    $fondo = $fila['color_fondo'];
                    if ($fila['posicion'] > 1) {
                        $fondo = 'white';
                    }
                    $css = 'color:'.$fila['color_texto'].'; background-color:'.$fondo;
                    if ('0' == $fila['equipo']) {
                        continue;
                    } ?>

				<tr>
				<td style='<?php echo $css; ?>; text-align:center;' width='7%'><?php echo $fila['posicion']; ?>º</td>
				<td style='<?php echo $css; ?>; text-align:left;'>
				<?php 
                $enlace = '';

                    if (isset($equipo_activo)) {
                        if ($equipo_activo != $fila['equipo_id']) {
                            echo $fila['equipo'];
                        } else {
                            echo '<b>'.$fila['equipo'].'</b>';
                        }
                    } else {
                        echo $fila['equipo'];
                    } ?>
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


				<div style="background-color:yellow;margin-bottom:20px;"><?php echo resumen($temporada_id); ?></div>
				<?php
                } //si estilo=1?>



		<table class="table table-bordered table-condensed whitebox nomargin">
		<thead>
		<tr class="darkgreenbox">
		<th class="text-center" colspan="7"><?php  echo $nombreTemporada; ?>
		<?php if (isset($equipo_activo)) {
                    $enlace = '/historico-liga/temporada-'.$nt.'-'.substr(($nt + 1), -2).'/torneo/'.trim(poner_guion($txtDivision)).'/'.$temporada_id.'/'.$nt.'/'.$division; ?>
		&nbsp;&nbsp;&nbsp;<a href="<?php echo $enlace; ?>">Ver todos los partidos</a>
		<?php
                } ?>
		</th>																												
		</tr>
		</thead>

		<tbody class="whitebox">					 
		<?php	

        $j = 0;
        foreach ($partidos as $partido) {
            $puntos = -1;

            $css1 = '';
            $css2 = '';
            if (1 == $partido['clasificado']) {
                $css1 = 'style="color:green; text-align:center;"';
                $css2 = 'style="color:red; text-align:center;"';
            }
            if (2 == $partido['clasificado']) {
                $css1 = 'style="color:red; text-align:center;"';
                $css2 = 'style="color:green; text-align:center;"';
            }
            if (0 == $partido['clasificado']) {
                $css1 = 'style="text-align:center;"';
                $css2 = 'style="text-align:center;"';
            }

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

            if ('1900-01-01' == $partido['fecha']) {
                $fecha = '';
            } else {
                $fecha = nombreDia($partido['fecha']);
            }

            $txtJornada = 'Jornada '.$partido['jornada'];

            if (!isset($equipo_activo)) {
                if ($partido['jornada'] != $j) {
                    if ($partido['jornada'] < 7) {
                        $txtJornada = 'Jornada '.$partido['jornada'];
                    } else {
                        $id_eliminatoria = $partido['jornada'];
                        include '../eliminatorias.php';
                    } ?>
		<tr><td colspan='6'><b><?php echo $txtJornada; ?></b></td></tr>
		<?php
                }
            } ?>

		<tr><td colspan='6' style="font-size:10px"><?php echo $fecha; ?></td></tr>
		<tr bgcolor='white'>

		<?php if (isset($equipo_activo)) {
                ?>
		<td >Jda. <?php echo $partido['jornada']; ?></td>
		<?php
            } ?>



		
		<?php if ($puntos > -1) {
                ?>
		<td class="<?php echo $class; ?>"><?php echo $puntos; ?></td>
		<?php
            } else {
                ?> 
		<td></td>
		<?php
            } ?> 

		<td <?php echo $css1; ?>>
		<?php 
        if (isset($equipo_activo)) {
            if ($equipo_activo != $partido['fm_local_id']) {
                echo $partido['nomCasa'];
            } else {
                echo '<b>'.$partido['nomCasa'].'</b>';
            }
        } else {
            echo $partido['nomCasa'];
        } ?>
		</td>
		<td style="text-align:center;font-weight:bold; min-width:50px">
		<?php echo $partido['resulCasa']; ?> - <?php echo $partido['resulFuera']; ?>
		</td>
		<td <?php echo $css2; ?>>
		<?php 
        if (isset($equipo_activo)) {
            if ($equipo_activo != $partido['fm_visitante_id']) {
                echo $partido['nomFuera'];
            } else {
                echo '<b>'.$partido['nomFuera'].'</b>';
            }
        } else {
            echo $partido['nomFuera'];
        } ?>
		</td>
		<td>
		<?php $enlace = '/historico/promocion2b/index.php?partido_id='.$partido['idPartido'].'&pest=partido'; ?>
		<a href="<?php echo $enlace; ?>">
		<span style="font-size:18; font-weight:bold">+</span>
		</a>
		</td>


		</tr>
		<?php if (strlen($partido['cosas']) > 5) {
            ?>
		<tr><td class="text-right" colspan="5">

					<div class="col-xs-12 text-center" style="font-size:15px;">
					<?php 
                        $cosas = explode('*', $partido['cosas']); ?>
		                 <?php if (isset($cosas[1])) {
                            ?>
		                 <div class="col-xs-6 nopadding">
		                    <p class="observacion-partido w100 cronicaL"
		                    style="padding-right:30px;">
		                    <?php echo substr($cosas[1], 1); ?>
		                    </p>
		                </div>
		                <?php
                        } ?>
		                <?php if (isset($cosas[2])) {
                            ?>
		                <div class="col-xs-6 nopadding">
		                    <p class="observacion-partido w100 cronicaR"
		                    style="padding-left:30px;">
		                    <?php echo substr($cosas[2], 1); ?>
		                    </p>
		                </div>
		                <?php
                        } ?>
		                <?php if (strlen($cosas[0]) > 2) {
                            ?>
		                <div class="col-xs-12">
		                    <p class="observacion-partido w100">
		                    <i>&nbsp; &nbsp; &nbsp;<?php echo $cosas[0]; ?></i>
		                    </p>
		                </div>
		                <?php
                        } ?>
		            </div>





		</td></tr>
		<?php
        }
            $j = $partido['jornada'];
        }?>

		</tbody>
		</table>

																		
		</div>
</div>
								
</div>								
</div>	