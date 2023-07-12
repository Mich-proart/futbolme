<div class="tab-pane" id="pestana_3">
    <div class="panel-body">
                                    

            <?php 

            foreach ($menu['juvenil'] as $temporada) {
                if ($temporada['temporada_id'] != $temporada_id) {
                    continue;
                }

                $cadena = $temporada['nombre'];
                $cadena = str_replace('JUVENIL', '', $cadena); ?>

                <div class="cols-xs-12">
                    <ul >
                    
                    <?php foreach ($ascensos as $fila) {
                    if (37 == $fila['ascenso_id']) {
                        continue;
                    } //Copa de campeones
                    if (23 == $fila['ascenso_id']) {
                        continue;
                    } //Campeón de Copa
                    if (93 == $temporada['temporada_id'] && 38 == $fila['ascenso_id']) {
                        continue;
                    } //Juvenil Preferente de La Palma

                    if ('DIVISI' == substr(trim($temporada['nombre']), 0, 6) && $fila['orden'] > 249) {
                        continue;
                    }
                    if ('DIVISI' != substr(trim($temporada['nombre']), 0, 6) && $fila['orden'] < 249) {
                        continue;
                    }
                    if ('JUVEN' != substr(trim($temporada['nombre']), 0, 5) && 41 == $fila['ascenso_id']) {
                        continue;
                    }
                    //imp($temporada['nombre']);
                    if (39 == $temporada['temporada_id'] && 21 == $fila['ascenso_id']) {
                        $fila['nombre'] = 'Descienden a Juvenil Preferente';
                    } ?>
                        <li><?php echo $fila['nombre']; ?></li>

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
                    echo '<hr />';
                } ?>
                    </ul>

                </div>

                

            <?php
            } ?>                              

    </div>
</div>  