<div class="tab-pane <?php echo $pesFem; ?>" id="pestana_5">
    <div class="panel-body">
        <h2>Femenino</h2>                             

            <?php 

            foreach ($menu['femenino'] as $key => $temporada) {
                $cadena = $temporada['nombre'];
                $cadena = str_replace('FEMENINA', '', $cadena);
                if (2 == $temporada['tipo_torneo']) {
                    continue;
                } ?>
                <div class="nav_cat_btns">
                    <div class="comunidad flag<?php echo $temporada['imagenComunidad']; ?>"></div>
                    <a href="/resultados-directo/torneo/<?php echo poner_guion($temporada['nombre']); ?>/<?php echo $temporada['temporada_id']; ?>/"><?php echo $cadena; ?></a>
                    
                    <ul>
                        <?php   foreach ($ascensos as $fila) {
                    if (214 == $temporada['temporada_id'] && $fila['orden'] > 435) {continue;}
                    if ((1720 == $temporada['temporada_id'] || 1721 == $temporada['temporada_id']) && $fila['orden']>400 && $fila['orden']<450) {continue;}
                    if ((1720 == $temporada['temporada_id'] || 1721 == $temporada['temporada_id']) && $fila['orden']>453) {continue;}

                    if (214 != $temporada['temporada_id'] && 1720 != $temporada['temporada_id'] && 1721 != $temporada['temporada_id'] && $fila['orden']>400 && $fila['orden']<460) {continue;}

                  

                    ?>
                        <li><?php echo $fila['nombre']; ?></li>
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
                    </ul>
                </div>
            <?php 
                if (0 == ($key + 1) % 2) {
                    echo "<div style='clear:both'></div>";
                }
            } ?>
       
    </div>
</div>