<div class="tab-pane" id="pestana_5">
    <div class="panel-body">
        
            <?php 

            foreach ($menu['femenino'] as $key => $temporada) {
                if ($temporada['temporada_id'] != $temporada_id) {
                    continue;
                }

                $cadena = $temporada['nombre'];
                $cadena = str_replace('FEMENINA', '', $cadena);
                if (2 == $temporada['tipo_torneo']) {
                    continue;
                } ?>
                <div class="cols-xs-12">                     
                    <ul>
                        <?php   foreach ($ascensos as $fila) {
                    if (214 == $temporada['temporada_id'] && $fila['orden'] > 435) {
                        continue;
                    }
                    if (214 != $temporada['temporada_id'] && $fila['orden'] > 405 && $fila['orden'] < 440) {
                        continue;
                    }
                    if (363 == $temporada['temporada_id'] && 32 == $fila['ascenso_id']) {
                        continue;
                    } //Menorca?>
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