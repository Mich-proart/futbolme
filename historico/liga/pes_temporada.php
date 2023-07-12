<div class="panel panel-default">
	
			<table class="table table-bordered table-condensed greenbox nomargin txt11">
				<tr bgcolor='#336699'>
				<td style='color:#FFFFFF; text-align:center;' width='33%'>División</td>
				<td style='color:#FFFFFF; text-align:center;' width='33%'>Campeón</td>
				<td style='color:#FFFFFF; text-align:center;' width='33%'>Subcampeón</td><td></td>
				</tr>
			<?php 
            if (isset($datosTemporada)) {
                foreach ($datosTemporada as $fila) {
                    $bgcolor="#E6E6E6";
                    if (1 == $fila['idDivision']) {
                        $txt = 'Primera División';
                        if (1986 == $temporada) {
                            if (194 == $fila['idTemporada']) {
                                $txt = '1ª División - Fase Regular ';
                            }
                            if (1680 == $fila['idTemporada']) {
                                $txt = '1ª División - Título ';
                            }
                            if (1681 == $fila['idTemporada']) {
                                $txt = '1ª División - Copa Liga ';
                            }
                            if (1682 == $fila['idTemporada']) {
                                $txt = '1ª División - Descenso ';
                            }
                        }
                    } elseif (2 == $fila['idDivision']) {
                        $txt = 'Segunda División';
                        if (1986 == $temporada) {
                            if (195 == $fila['idTemporada']) {
                                $txt = '2ª División - Fase Regular ';
                            }
                            if (1683 == $fila['idTemporada']) {
                                $txt = '2ª División - Descenso ';
                            }
                            if (1684 == $fila['idTemporada']) {
                                $txt = '2ª División - Ascenso G1 ';
                            }
                            if (1685 == $fila['idTemporada']) {
                                $txt = '2ª División - Ascenso G2 ';
                            }
                        }
                    } elseif (3 == $fila['idDivision']) {
                        $txt = 'Segunda División B '.$fila['grupo'];
                        if (1986 == $temporada) {
                            $txt = 'Segunda División B ';
                        }
                    } else {
                        $txt = 'Tercera División '.$fila['grupo'];
                    } 
                    //imp($fila['idDivision']);
                    //imp($division);
                    if ((int)$fila['idDivision']==(int)$division){ $bgcolor="white"; }?>
				<tr bgcolor='<?php echo $bgcolor; ?>'>
				<td style='text-align:center; height: 40px' width='30%'>
				<?php
                $enlace = '/historico-liga/'.poner_guion($nombreTemporada).'/torneo/'.trim(poner_guion($txtDivision)).'/'.$fila['idTemporada'].'/'.$temporada.'/'.$fila['idDivision'];
                    $rutaEscudoC = '/img/equipos/escudo'.$fila['id_campeon'].'.png';
                    $rutaEscudoS = '/img/equipos/escudo'.$fila['id_subcampeon'].'.png'; ?>
				<a href="<?php echo $enlace; ?>"><?php echo $txt; ?></a></td>
				<td width='33%'>
				<img src="<?php echo $rutaEscudoC; ?>"  alt="equipo" style="width:18px; height:20px">
				<?php echo $fila['campeon']; ?></td>
				<td width='33%'>
				<img src="<?php echo $rutaEscudoS; ?>"  alt="equipo" style="width:18px; height:20px">
				<?php echo $fila['subcampeon']; ?></td>
				<td>
				<?php /*if ($fila['idDivision']<3) { ?>
                <a href="http://www.futbolplus.com/foro/mundodeportivo.php?id=<?php echo $fila['idTemporada']?>&bd=1" target="_blank">MD</a>
                <?php } */ ?>
				</td>
				</tr>
			<?php
                }
            }?>
			</table>
							
</div>	
