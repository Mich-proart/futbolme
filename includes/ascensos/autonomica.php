<div class="tab-pane <?php echo $pesAut; ?>" id="pestana_2">
    <div class="panel-body nopadding">
        <h2>Autonómicas</h2>                                   

            <?php 
            $contador = 0;
            foreach ($menu['autonomica'] as $comunidad => $temporadas) {




                $imagenComunidad = ($temporadas[0]['imagenComunidad'] - 1);
                $contador = $contador + 1; ?>
                <div class="nav_cat_btns">
                    <div class="comunidad flag<?php echo $imagenComunidad + 1; ?>"></div>
                    <span style="font-size:15px; font-weight:bold; margin-left:10px; color:maroon"><?php echo $comunidad; ?></span>
                    <ul>                                                    
                        <?php foreach ($temporadas as $temporada) {
                            if ($temporada['temporada_id']>680){ break; }

                    if (2 == $temporada['tipo_torneo']) {
                        continue;
                    }
                    if (472 == $temporada['temporada_id']) {
                        continue;
                    } //I.P. - La Palma - Promoción Previa de Ascenso

                    $cadena = $temporada['nombre'];
                    $cadena = str_replace('PREFERENTE AUTONÓMICA - ', 'PREFERENTE AUT. - ', $cadena);
                    $cadena = str_replace('DIVISIÓN DE HONOR', 'D.H.', $cadena);
                    $cadena = str_replace('PRIMERA DIVISIÓN REGIONAL', '1ª DIV. REGIONAL', $cadena);
                    $cadena = str_replace('PRIMERA DIVISIÓN ANDALUZA - Grupo', '1ªDA. G.', $cadena);
                    $cadena = str_replace('PRIMERA REGIONAL PREFERENTE', '1ª REG. PREF.', $cadena);
                    $cadena = str_replace('INT. PREFERENTE', 'I.P.', $cadena);
                    $cadena = str_replace('INTERINSULAR PREFERENTE', 'I.P.', $cadena);
                    $cadena = str_replace('PRIMERA DIVISIÓN AUTONÓMICA PREFERENTE', '1ª DIV. AUT. PREF.', $cadena); ?>
                            <a href="/resultados-directo/torneo/<?php echo poner_guion($comunidad); ?>-<?php echo poner_guion($temporada['nombre']); ?>/<?php echo $temporada['temporada_id']; ?>/"><?php echo $cadena; ?></a>
                            <?php 

                            //imp($temporada['temporada_id']);

                            foreach ($ascensos as $fila) {
                                //imp($fila['ascenso_id']);

                                if (20 == $temporada['imagenComunidad'] && 36 == $fila['ascenso_id']) {
                                    continue;
                                }
                                if (21 == $temporada['imagenComunidad'] && 36 == $fila['ascenso_id']) {
                                    continue;
                                }

                                $nombreAscenso = $fila['nombre'];
                                if (36 == $fila['ascenso_id']) {
                                    if (22 == $imagenComunidad || 23 == $imagenComunidad) {
                                        continue;
                                    }
                                    if (84 == $temporada['temporada_id'] ||
                                        82 == $temporada['temporada_id'] ||
                                        50 == $temporada['temporada_id'] ||
                                        448 == $temporada['temporada_id']) {
                                        continue;
                                    }

                                    if (1 == $imagenComunidad) {
                                        $nombreAscenso = 'Descenso a Primera Galicia';
                                    }
                                    if (13 == $imagenComunidad || 18 == $imagenComunidad) {
                                        $nombreAscenso = 'Descenso a 1ª Autonómica';
                                    }
                                    if (5 == $imagenComunidad) {
                                        $nombreAscenso = 'Descenso a Segona Catalana';
                                    }
                                    if (7 == $imagenComunidad) {
                                        $nombreAscenso = 'Descenso a Primera de Aficionados';
                                    }
                                    if (8 == $imagenComunidad) {
                                        $nombreAscenso = 'Descenso a 1ª Provincial de Aficionados';
                                    }
                                    if (14 == $imagenComunidad) {
                                        $nombreAscenso = 'Descenso a Segunda Extremeña';
                                    }
                                    if (15 == $imagenComunidad) {
                                        $nombreAscenso = 'Descenso a Regional Preferente';
                                    }
                                    //if ($imagenComunidad==9 || $imagenComunidad==10) { continue; } //$nombreAscenso='Descenso a 2ª Andaluza Senior';
                                    if (22 == $temporada['imagenComunidad']) {
                                        continue;
                                    }

                                    if (78 == $temporada['temporada_id']) {
                                        $nombreAscenso = 'Descenso a Territorial Preferente';
                                    }
                                    if (61 == $temporada['temporada_id']) {
                                        $nombreAscenso = 'Descenso a Aficionado Preferente';
                                    }
                                    if (60 == $temporada['temporada_id']) {
                                        $nombreAscenso = 'Descenso a Primera Regional';
                                    }
                                    if (65 == $temporada['temporada_id']) {
                                        $nombreAscenso = 'Descenso a Primera Interinsular';
                                    }
                                    if (87 == $temporada['temporada_id'] || 89 == $temporada['temporada_id']) {
                                        $nombreAscenso = 'Descenso a Primera Andaluza';
                                    }
                                }

                                //if ($temporada['imagenComunidad']==21 && $fila['ascenso_id']==33) { $nombreAscenso="No hay ascensos"; }?>
                                <li><?php echo $nombreAscenso; ?></li>

                                <?php 

                                    $equipos = ascensoequipos($fila['ascenso_id'], $temporada['temporada_id']);
                                if (count($equipos) > 0) {
                                    foreach ($equipos as $equipo) {
                                $rutaEscudo=rutaEscudo($equipo['club_id'], $equipo['equipo_id']);
                                        ?>
                                            <a href="/resultados-directo/equipo/<?php echo poner_guion($equipo['equipo']); ?>/<?php echo $equipo['equipo_id']; ?>">
                                                <img src="<?php echo $rutaEscudo?>" alt="<?php echo $equipo['equipo']; ?>" style="width:18px; height:20px">
                                                <b><?php echo $equipo['equipo']; ?></b><br />
                                            </a>
                                        <?php
                                    }
                                }

                                echo '<hr />';
                            } ?>
                        <?php
                } ?>                                                    
                    </ul>
                </div>
            <?php 

                if (0 == $contador % 2) {
                    echo "<div style='clear:both'></div>";
                }
            } ?>
        
    </div>
</div>