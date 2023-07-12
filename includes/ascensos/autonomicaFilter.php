<div class="tab-pane" id="pestana_2">
    <div class="panel-body nopadding">
            <?php 
            $nc = substr(trim($nombreComunidad), 0, -1);
            $temporadas = $menu['autonomica'][$nc];
            $imagenComunidad = ($temporadas[0]['imagenComunidad'] - 1);
            ?>
                <div class="cols-xs-12">
                     <ul>                                                    
                        <?php foreach ($temporadas as $temporada) {
                if ($temporada['temporada_id'] != $temporada_id) {
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
                            
                            <?php 

                            //imp($temporada['temporada_id']);

                            foreach ($ascensos as $fila) {
                                //imp($fila['ascenso_id']);

                                $nombreAscenso = $fila['nombre'];
                                if (36 == $fila['ascenso_id']) {
                                    if (1 == $imagenComunidad || 13 == $imagenComunidad || 18 == $imagenComunidad) {
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
                                        $nombreAscenso = 'Descenso a Primera Aficionados';
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
                                        ?>
                                            <a href="/resultados-directo/equipo/<?php echo poner_guion($equipo['equipo']); ?>/<?php echo $equipo['equipo_id']; ?>">
                                                <img src="/img/equipos/escudo<?php echo $equipo['equipo_id']; ?>.png" alt="<?php echo $equipo['equipo']; ?>" style="width:18px; height:20px">
                                                <b><?php echo $equipo['equipo']; ?></b><br />
                                            </a>
                                        <?php
                                    }
                                }

                                if (209 == $temporada['temporada_id'] && 36 == $fila['ascenso_id']) {
                                    $equipo['equipo'] = 'UD Jesus y Maria';
                                    $equipo['equipo_id'] = 8676; ?>
                                            <a href="/resultados-directo/equipo/<?php echo poner_guion($equipo['equipo']); ?>/<?php echo $equipo['equipo_id']; ?>">
                                                <img src="/img/equipos/escudo<?php echo $equipo['equipo_id']; ?>.png" alt="<?php echo $equipo['equipo']; ?>" style="width:18px; height:20px">
                                                <b><?php echo $equipo['equipo']; ?></b><br />
                                            </a>

                                    <?php
                                }
                                echo '<hr />';
                            } ?>
                        <?php
            } ?>                                                    
                    </ul>
                </div>
            
   
</div>
</div>