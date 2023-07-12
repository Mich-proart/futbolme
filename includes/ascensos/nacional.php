<div class="tab-pane <?php echo $pesNac; ?>" id="pestana_1">
    <div class="panel-body nopadding">
        <h2>Nacional</h2>                      
            
            <div class="nav_cat_btns">           
             <div class="greenbox clear"><a href="/resultados-directo/torneo/primera-division/1/">Primera División</a></div>
                <ul>
                    <?php foreach ($ascensos[2] as $fila) {
    ?>
                        <li><?php echo $fila['nombre']; ?></li>

                        <?php 

                            $equipos = ascensoequipos($fila['ascenso_id'], 1);
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
            
            <div class="nav_cat_btns">            
             <div class="greenbox clear"><a href="/resultados-directo/torneo/segunda-division/2/">Segunda División</a></div>
                <ul>
                    <?php foreach ($ascensos[3] as $fila) {
    ?>
                        <li><?php echo $fila['nombre']; ?></li>
                        <?php 
                            $equipos = ascensoequipos($fila['ascenso_id'], 2);
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

            <div style="clear:both"></div>
            
            <div class="nav_cat_btns">
            <div class="greenbox clear"><a href="/resultados-directo/torneo/segunda-division-b-grupo-1/3/">Segunda División B Grupo 1</a></div>
                <ul>
                    <?php foreach ($ascensos[4] as $fila) {
    ?>
                        <li><?php echo $fila['nombre']; ?></li>

                        <?php 

                            $equipos = ascensoequipos($fila['ascenso_id'], 3);
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
            

            </div><div class="nav_cat_btns">
            <div class="greenbox clear"><a href="/resultados-directo/torneo/segunda-division-b-grupo-2/4/">Segunda División B Grupo 2</a></div>
                <ul>
                    <?php foreach ($ascensos[4] as $fila) {
    ?>
                        <li><?php echo $fila['nombre']; ?></li>

                        <?php 

                            $equipos = ascensoequipos($fila['ascenso_id'], 4);
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
            <div style="clear:both"></div>

            <div class="nav_cat_btns">
            <div class="greenbox clear"><a href="/resultados-directo/torneo/segunda-division-b-grupo-3/5/">Segunda División B Grupo 3</a></div>
                <ul>
                    <?php foreach ($ascensos[4] as $fila) {
    ?>
                        <li><?php echo $fila['nombre']; ?></li>

                        <?php 

                            $equipos = ascensoequipos($fila['ascenso_id'], 5);
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
            

            </div><div class="nav_cat_btns">
            <div class="greenbox clear"><a href="/resultados-directo/torneo/segunda-division-b-grupo-4/6/">Segunda División B Grupo 4</a></div>
                <ul>
                    <?php foreach ($ascensos[4] as $fila) {
    ?>
                        <li><?php echo $fila['nombre']; ?></li>

                        <?php 

                            $equipos = ascensoequipos($fila['ascenso_id'], 6);
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

            <div style="clear:both"></div>
            
            
            <?php foreach ($menu['tercera'] as $key => $temporada) {
    if (0 == $key % 2) {
        echo "<div style='clear:both'></div>";
    } ?>
             <div class="nav_cat_btns">   
                    <div class="greenbox clear"><div class="comunidad flag<?php echo $temporada['imagenComunidad']; ?>"></div>
                    <a href="/resultados-directo/torneo/<?php echo poner_guion($temporada['nombre']); ?>/<?php echo $temporada['temporada_id']; ?>/"><?php echo $temporada['nombre']; ?></a></div>
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
} ?>                         
    </div>
</div>