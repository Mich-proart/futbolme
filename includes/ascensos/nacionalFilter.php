<div class="tab-pane" id="pestana_1">
    <div class="panel-body nopadding">
        
            <?php if (1 == $temporada_id) {
    ?>
            <div class="cols-xs-12">           
                <ul>
                    <?php foreach ($ascensos[2] as $fila) {
        ?>
                        <li><?php echo $fila['nombre']; ?></li>

                        <?php 

                            $equipos = ascensoequipos($fila['ascenso_id'], 1);
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
            
            <?php if (2 == $temporada_id) {
        ?>
            <div class="cols-xs-12">            
                <ul>
                    <?php foreach ($ascensos[3] as $fila) {
            ?>
                        <li><?php echo $fila['nombre']; ?></li>
                        <?php 
                            $equipos = ascensoequipos($fila['ascenso_id'], 2);
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
            
            
            <div style="clear:both"></div>
            <?php if (3 == $temporada_id) {
        ?>
            <div class="cols-xs-12">
                <ul>
                    <?php foreach ($ascensos[4] as $fila) {
            ?>
                        <li><?php echo $fila['nombre']; ?></li>

                        <?php 

                            $equipos = ascensoequipos($fila['ascenso_id'], 3);
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
            <?php if (4 == $temporada_id) {
        ?>
            <div class="cols-xs-12">
                <ul>
                    <?php foreach ($ascensos[4] as $fila) {
            ?>
                        <li><?php echo $fila['nombre']; ?></li>

                        <?php 

                            $equipos = ascensoequipos($fila['ascenso_id'], 4);
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
            <?php if (5 == $temporada_id) {
        ?>
            <div class="cols-xs-12">
                <ul>
                    <?php foreach ($ascensos[4] as $fila) {
            ?>
                        <li><?php echo $fila['nombre']; ?></li>

                        <?php 

                            $equipos = ascensoequipos($fila['ascenso_id'], 5);
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
            <?php if (6 == $temporada_id) {
        ?>
            <div class="cols-xs-12">
                <ul>
                    <?php foreach ($ascensos[4] as $fila) {
            ?>
                        <li><?php echo $fila['nombre']; ?></li>

                        <?php 

                            $equipos = ascensoequipos($fila['ascenso_id'], 6);
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
            <div style="clear:both"></div>
            
            
            <?php 

            if ($temporada_id > 6) {
                $temporada = $menu['tercera'][$temporada_id - 7]; ?>
             <div class="cols-xs-12">   
                        <ul>
                            <?php foreach ($ascensos[5] as $fila) {
                    $cadena = $fila['nombre'];
                    if (($temporada['imagenComunidad'] - 1) == 4 && 18 == $fila['ascenso_id']) {
                        $cadena = 'Descienden a Preferente / División Honor';
                    }
                    if (($temporada['imagenComunidad'] - 1) == 5 && 18 == $fila['ascenso_id']) {
                        $cadena = 'Descienden a Primera Catalana';
                    }
                    if (($temporada['imagenComunidad'] - 1) == 8 && 18 == $fila['ascenso_id']) {
                        $cadena = 'Descienden a Primera Regional';
                    }
                    if (($temporada['imagenComunidad'] - 1) == 9 && 18 == $fila['ascenso_id']) {
                        $cadena = 'Descienden a 1ª Andaluza / 1ª Aut. Melilla';
                    }
                    if (($temporada['imagenComunidad'] - 1) == 10 && 18 == $fila['ascenso_id']) {
                        $cadena = 'Descienden a Primera Andaluza';
                    }
                    if (($temporada['imagenComunidad'] - 1) == 12 && 18 == $fila['ascenso_id']) {
                        $cadena = 'Descienden a Interinsular Preferente';
                    }
                    if (($temporada['imagenComunidad'] - 1) == 13 && 18 == $fila['ascenso_id']) {
                        $cadena = 'Descienden a Preferente Autonómica';
                    }
                    if (($temporada['imagenComunidad'] - 1) == 18 && 18 == $fila['ascenso_id']) {
                        $cadena = 'Descienden a Primera Autonómica Preferente';
                    }
                    if (($temporada['imagenComunidad'] - 1) == 15 && 18 == $fila['ascenso_id']) {
                        $cadena = 'Descienden a Primera Autonómica';
                    } ?>

                           <li><?php echo $cadena; ?></li>

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