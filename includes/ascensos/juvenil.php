
<div class="tab-pane <?php echo $pesJuv; ?>" id="pestana_3">
    <div class="panel-body">
        <h2>Juveniles</h2> 

        <div class="nav_cat_btns">
        <li style="margin-left:10px">Campeón Copa de Campeones</li><br />

          
        <hr />
        </div>
        <div class="nav_cat_btns">
        <li style="margin-left:10px">Campeón de Copa</li><br />

        <hr />
        </div> 
        <div style="clear:both"></div>                               

            <?php 
            $contador = 0;
            foreach ($menu['juvenil'] as $temporada) {
                if ($temporada['temporada_id']>700){ break; }
                if (2 == $temporada['tipo_torneo']) {
                    continue;
                }
                $contador = $contador + 1;

                $cadena = $temporada['nombre'];
                $cadena = str_replace('JUVENIL', '', $cadena); ?>

                <div class="nav_cat_btns">
                    <ul >
                    <div class="comunidad flag<?php echo $temporada['imagenComunidad']; ?>"></div>
                    <a style="padding-left:-15px !important; " href="/resultados-directo/torneo/<?php echo poner_guion($temporada['nombre']); ?>/<?php echo $temporada['temporada_id']; ?>/"><?php echo $cadena; ?></a>
                    
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
                                        <img src="/img/club/escudo<?php echo $equipo['club_id']; ?>.png" alt="<?php echo $equipo['equipo']; ?>" style="width:18px; height:20px">
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

            if (0 == $contador % 2) {
                echo "<div style='clear:both'></div>";
            }

                if (94 == $temporada['temporada_id']) {
                    $contador = 0;
                    echo "<div style='clear:both'></div>";
                } //ultima division de honor
            } ?>                              

    </div>
</div>  