<div class="col-xs-12 nopadding" id="bloque-cabeceras">
	<?php 
    foreach ($partidosDia as $key => $fila) {
        $nC = $fila['nombreComunidad'];
        $nP = $fila['nombrePais'];
        $enlace = '/resultados-directo/torneo/';

        
        if ('SIN COMUNIDAD' != $nC) {
            $nC .= '-';
        } else {
            $nC = '';
        }
        if ('España' == $nP) {
            $nP = '';
        } else {
            $nP .= '-';
        }
        $enlace_torneo = $enlace.poner_guion($nC.$nP.$fila['nombreTorneo']).'/'.$fila['temporada_id'].'/'; ?>	
		<div class="boxresultgreenhead enjuegobox_top greenbox one-bordergrey-vert" style="width:100%; float:left; margin-top:3px; position:relative; z-index:1">
			<a href="<?php echo $enlace_torneo; ?>">	
		
			<div style="float:left">
				<?php if ($fila['idComunidad'] > 1) {
            $imagen = $fila['idComunidad'];
            $nombreCom = '';
            if ($key < 25 || 266 == $key || 267 == $key || 34 == $key || 35 == $key) {
                if (10 == $fila['idComunidad']) {
                    $nombreCom = $nombreCom.' Y MELILLA';
                    $imagen = 55;
                }
                if (11 == $fila['idComunidad']) {
                    $nombreCom = $nombreCom.' Y CEUTA';
                    $imagen = 56;
                }
            } ?>
				<div class="flagbox comunidad flag<?php echo $imagen; ?>"></div>
				<?php
        } else {
            ?>
				<div class="flagbox pais flag<?php echo $fila['idPais']; ?>b"></div>
				<?php
        } ?>
			</div>
			<div style="float:left; margin-left:10px; margin-top: -2px;">	
				<?php
                $txtnombreTorneo = $fila['nombreTorneo'];
        $txttraduccion = $fila['traduccion'];
        if ($fila['partidos'] > 0) {
            $txtPartidos = "<span class='badge boldfont' style='color:white'>".$fila['partidos'].'</span>';
        } else {
            $txtPartidos = '';
        }
        if ($fila['directos'] > 0) {
            $txtDirecto = "<span class='badge' style='color:red; background-color:white'>".$fila['directos'].'</span>';
        } else {
            $txtDirecto = '';
        }
        if ($fila['finalizados'] > 0) {
            $txtFinal = "<span class='badge' style='color:white; background-color:black'>".$fila['finalizados'].'</span>';
        } else {
            $txtFinal = '';
        }

        if ($fila['partidos'] == $fila['finalizados']) {
            $txtPartidos = '';
        }

        if (60 != $fila['idPais'] && 199 != $fila['idPais'] && 200 != $fila['idPais'] && 201 != $fila['idPais']) {
            $txttraduccion = $fila['nombrePais'];
        } ?>
				<span class="tname hidden-xs"><?php echo $txtnombreTorneo; ?></span>
				<span class="tname visible-xs"><?php echo $fila['torneoCorto']; ?></span>
				<div style="margin-top:-5px;"><?php echo $txttraduccion; ?> </div>	
			</div>
			</a>

				<div class="pull-right" style="float:left; margin-left:2px">
				<span style="cursor:pointer" onclick="visor_hoy(<?php echo $fila['temporada_id']; ?>)">
				<?php echo $txtPartidos; ?> 
				<?php echo $txtDirecto; ?>
				<?php echo $txtFinal; ?>
				</span>	
				</div>
		</div>
		
		<div id="visorHoy-<?php echo $fila['temporada_id']; ?>" class="col-xs-12 nopadding text-center"></div>
	<?php
    }?>
</div>	

<?php

$path = './json/index_cabecerasFed.json';
$json = file_get_contents($path);
$partidosFed = json_decode($json, true);


foreach ($partidosFed as $com) { ?>
<div class="col-xs-12 nopadding" id="bloque-cabeceras">
    <?php 
    foreach ($com as $key => $fila) {
        $nC = $fila['nombreComunidad'];
        $enlace = '/resultados-directo/torneo/';
        $nP='España';
        $enlace_torneo = $enlace.poner_guion($nC.$nP.$fila['nombreTorneo']).'/'.$fila['temporada_id'].'/'; ?>   
        <div class="boxresultgreenhead enjuegobox_top greenbox one-bordergrey-vert" style="width:100%; float:left; margin-top:3px; position:relative; z-index:1">
            <a href="<?php echo $enlace_torneo; ?>">    
        
        
            <div style="float:left">
                <?php  $imagen = $fila['idComunidad'];
            $nombreCom = '';
            if ($key < 25 || 266 == $key || 267 == $key || 34 == $key || 35 == $key) {
                if (10 == $fila['idComunidad']) {
                    $nombreCom = $nombreCom.' Y MELILLA';
                    $imagen = 55;
                }
                if (11 == $fila['idComunidad']) {
                    $nombreCom = $nombreCom.' Y CEUTA';
                    $imagen = 56;
                }
            } ?>
            <div class="flagbox comunidad flag<?php echo $imagen; ?>"></div>
            </div>
        

            <div style="float:left; margin-left:10px; margin-top: -2px;">   
                <?php
                $txtnombreTorneo = $fila['nombreTorneo'];
        $txttraduccion = $fila['traduccion'];
        if ($fila['partidos'] > 0) {
            $txtPartidos = "<span class='badge boldfont' style='color:white'>".$fila['partidos'].'</span>';
        } else {
            $txtPartidos = '';
        }
        
        if ($fila['finalizados'] > 0) {
            $txtFinal = "<span class='badge' style='color:white; background-color:black'>".$fila['finalizados'].'</span>';
        } else {
            $txtFinal = '';
        }

        if ($fila['partidos'] == $fila['finalizados']) {
            $txtPartidos = '';
        }?>
                <span class="tname hidden-xs"><?php echo $txtnombreTorneo; ?></span>
                <span class="tname visible-xs"><?php echo $fila['torneoCorto']; ?></span>
                <div style="margin-top:-5px;"><?php echo $txttraduccion; ?> </div>  
            </div>
            </a>

                <div class="pull-right" style="float:left; margin-left:2px">
                <span style="cursor:pointer" onclick="visor_hoy(<?php echo $fila['temporada_id']; ?>)">
                <?php echo $txtPartidos; ?> 
                <?php echo $txtFinal; ?>
                </span> 
                </div>
        </div>
        
        <div id="visorHoy-<?php echo $fila['temporada_id']; ?>" class="col-xs-12 nopadding text-center"></div>
    <?php
    }?>
</div>  
<?php } ?>