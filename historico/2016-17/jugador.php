<?php 
require_once 'src/config.php';

if (isset($_GET['id'])) {
    $jugador_id = $_GET['id'];
    if (!is_numeric($jugador_id)) {
        header('Location:/');
        die;
    }
} else {
    header('Location:/');
    die;
}


if (isset($_GET['modelo'])) {
    $modelo = $_GET['modelo'];
} else {
    $modelo = 'Datos';
}
$jugador = Xjugador($jugador_id);

$posicionTxt = '';
switch ($jugador['posicion']) {
    case '0':$posicionTxt = 'Sin demarcación'; break;
    case '1':$posicionTxt = 'Portero'; break;
    case '2':$posicionTxt = 'Defensa'; break;
    case '3':$posicionTxt = 'Centrocampista'; break;
    case '4':$posicionTxt = 'Delantero'; break;
    case '5':$posicionTxt = 'Entrenador'; break;
}

$goles = array(); $tarjetas = array();

if ($jugador['posicion'] < 5) {
    $goles = XjugadorGolesPartido($jugador_id);
    $tarjetas = XjugadorTarjetasPartido($jugador_id);
}

$pesDatos = ''; $pesPalmares = ''; $pesGoles = ''; $pesTarjetas = '';

switch ($modelo) {
    case 'Datos':$pesDatos = 'active'; break;
    case 'Goles':$pesGoles = 'active'; break;
    case 'Tarjetas':$pesTarjetas = 'active'; break;
}

$pgJugador = 'index.php?modo=j&id='.$jugador_id;

$titulo = $jugador['nombre'].' '.$modelo;
$metaDescripcion = $titulo;
?>
<?php require_once 'includes/head.php'; ?>
	<title><?php echo $titulo.' - '.$jugador['equipoActual']; ?></title>

</head>
<?php require_once 'includes/contenedorSup.php'; ?>
<div class="col-xs-12 whitebox">
	<ul class="nav nav-tabs nopadding celestebox" role="tablist" id="pestaTemporada">		
	    <li class="text-center boldfont <?php echo $pesDatos; ?>">
	    <a href="<?php echo $pgJugador; ?>&modelo=Datos">Datos, goles y tarjetas - Temporada <?php echo $_SESSION['temporada']?></a>
	    </li>
	    
		
	</ul>

			<div class="row nomargin">
	            <div class="col-xs-6 col-md-8 col-lg-8">
	                <h1 class="nombrejugadorficha"><?php echo $jugador['nombre']; ?></h1>
	            </div>
	            <div class="col-xs-6 col-md-4 col-lg-4">
	                <div class="col-lg-12"><p class="pull-right">
	                	<?php
	                	$pgJugadorT = '/resultados-directo/jugador/'.poner_guion($jugador['nombre']).'/'.$jugador_id; ?>

	                <a href="/jugador.php?id=<?php echo $jugador_id?>">Ver ficha del jugador en la temporada actual</a>
	            </p></div>
	                
	            </div>
	        </div>
	
		<?php 

            $rutaJugador = '/img/jugadores/jugador'.$jugador['id'].'.jpg';

            if (!@file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaJugador))) {
                $rutaJugador = '/img/jugadores/NI.png';
            }

        switch ($modelo) {
            case 'Datos': ?>
				
		        <div class="row nomargin">
		            <div class="col-xs-5 col-md-3 col-lg-3">
		                <img width="100%" src="<?php echo $rutaJugador; ?>" alt=" <?php echo $jugador['nombre']; ?>">
		            </div>
		            <div class="col-xs-9 col-md-9 col-lg-9">
		                <div class="row">&nbsp</div>
		                <div class="row col-xs-12">
		                    <p><span class="boldfont">Nombre:</span> <?php echo $jugador['nombre']; ?></p>
		                </div>
		                <div class="row col-xs-12">
		                    <p><span class="boldfont">Apodo:</span> <?php echo $jugador['apodo']; ?></p>
		                </div>
		                <div class="row col-xs-12">
		                    <p><span class="boldfont">Nacimiento:</span> <?php 
                            if ('1900-01-01' != $jugador['fecha_nacimiento']) {
                                echo $jugador['fecha_nacimiento'];
                            }
                             ?></p>
		                </div>
		                <div class="row col-xs-12">
		                    <p><span class="boldfont">Lugar de nacimiento:</span> <?php echo $jugador['lugar_nacimiento']; ?></p>
		                </div>
		                <div class="row col-xs-12">
		                    <p><span class="boldfont">Peso:</span> <?php 
                            if ('0' != $jugador['peso']) {
                                echo $jugador['peso'];
                            }?></p>
		                </div>
		                <div class="row col-xs-12">
		                    <p><span class="boldfont">Altura:</span> <?php 
                            if ('0' != $jugador['altura']) {
                                echo $jugador['altura'];
                            }
                            ?> </p>
		                </div>
		            </div>

		            <div class="row">
		                <div class="col-xs-12">
		                    <p class="col-xs-12 text-left boldfont">
							<?php echo $posicionTxt; ?>
							<span class="pull-right"><?php 
                            $fmJugador = $jugador_id;
                            $fmJugador2 = 1;
                            $fila['jugador'] = $jugador['apodo'];
                            //include('includes/futbolmaniaJugador.php');?></span>
		                    </p>
		                </div>
		            </div>
		            
		        </div>
		      
		  <h2>GOLES</h2>  
			<?php 
            $otrosGoles = array();
            $pag = 'index';
            $id_p = 0; $contador = 0;
            foreach ($goles as $partido) {
                if ($id_p == $partido['id']) {
                    ++$contador;
                    
                    continue;
                }
                unset($tarjetas);

                if (1 != $partido['tipo_torneo']) {
                    $otrosGoles[] = $partido;
                    continue;
                }
                
                include 'includes/pagTemporada/partidoR.php';
                $id_p = $partido['id'];
            } ?>

            <h2>TARJETAS</h2>
            <?php
            
            if ($jugador['posicion'] < 5) {
			    $tarjetas = XjugadorTarjetasPartido($jugador_id);
			}

            $otrosTarjetas = array(); $partidoGoles = array();
            $pag = 'index';
            $id_p = 0;
            foreach ($tarjetas as $key => $partido) {
                

                if (1 != $partido['tipo_torneo']) {
                    $otrosTarjetas[] = $partido;
                    continue;
                }
                $partidoTarjetas = XpartidoTarjetas($partido['id']);

                $golesTarjetas = prepararGolesTarjetas($partidoGoles, $partidoTarjetas);

                $todo1 = array();
                $todo2 = array();
                foreach ($golesTarjetas['local'] as $GolT) {
                    if (2 == $GolT['tipo']) {
                        continue;
                    }
                    if ($GolT['jugador_id'] != $jugador_id) {
                        continue;
                    }
                    $todo1 = $GolT;
                }
                foreach ($golesTarjetas['visitante'] as $GolT) {
                    if (2 == $GolT['tipo']) {
                        continue;
                    }
                    if ($GolT['jugador_id'] != $jugador_id) {
                        continue;
                    }
                    $todo2 = $GolT;
                }
                $tarjetas = 1;
               include 'includes/pagTemporada/partidoR.php';

                if (count($todo1) > 0) {
                    $GolT = $todo1;
                } else {
                    $GolT = $todo2;
                } ?>
				<!--Begin Goals/Cards-->
				<table class="col-xs-12">
					<?php $cambioTiempo = 0;
                $contador = 0;
                $txtMinuto = substr($GolT['minuto'], 1);
                if (strlen($txtMinuto) < 2) {
                    $txtMinuto = '&nbsp;&nbsp;'.$txtMinuto;
                }
                $tiempo = substr($GolT['minuto'], 0, 1);
                if (1 == $tiempo) {
                    ?>
					<tr style="height:40px;"><td colspan="2" class="text-center"><span class="label label-warning">Primer Tiempo</span></td></tr>
					<?php
                } else {
                    ?>
					<tr style="height:40px;"><td colspan="2" class="text-center"><span class="label label-warning">Segundo Tiempo</span></td></tr>
					<?php
                }
                if ($GolT['minuto'] > 200) {
                    $txtTiempo = '2ºT';
                } else {
                    $txtTiempo = '1ºT';
                } ?>
				    <tr>
				    <?php if (1 == $GolT['esLocal']) {
                    ?>
				    <td class="col-xs-6 text-right"  style="height:25px; border-bottom: 1px solid dimgray">
				          <a href="/jugador.php?id=<?php echo $GolT['jugador_id']; ?>"><?php echo $GolT['nombreJugador']; ?></a>
				             <?php if (0 == $GolT['tipo']) {
                        ?>
				            <span class="iconseparate"><img src="/img/ta.png" height="17" style="margin-bottom:3px"></span>
				            <?php
                    } elseif (1 == $GolT['tipo']) {
                        ?>
				            <span class="iconseparate"><img src="/img/ta2.png" height="17" style="margin-bottom:3px"></span>
				            <?php
                    } elseif (5 == $GolT['tipo']) {
                        ?>
				            <span class="iconseparate"><img src="/img/tr.png" height="17" style="margin-bottom:3px"></span>
				            <?php
                    } ?>
				            <span class="label label-info"><?php echo $txtMinuto; ?></span>
				    		</td><td class="col-xs-6" style="height:25px"></td>
				    <?php
                } else {
                    ?>
				    <td class="col-xs-6" style="height:25px"></td><td class="col-xs-6" style="height:25px; border-bottom: 1px solid dimgray">
					   <span class="label label-info"><?php echo $txtMinuto; ?></span> 
				                <?php if (0 == $GolT['tipo']) {
                        ?>
				                <span class="iconseparate"><img src="/img/ta.png" height="17" style="margin-bottom:3px"></span>
				                <?php
                    } elseif (1 == $GolT['tipo']) {
                        ?>
				                <span class="iconseparate"><img src="/img/ta2.png" height="17" style="margin-bottom:3px"></span>
				                <?php
                    } elseif (5 == $GolT['tipo']) {
                        ?>
				                <span class="iconseparate"><img src="/img/tr.png" height="17" style="margin-bottom:3px"></span>
				                <?php
                    } ?>
				                <?php echo $GolT['nombreJugador']; ?></a>
				    </td>    
				    <?php
                } ?>
				    </tr>
				</table>
				<?php
            $id_p = $partido['id'];
            }
            break;
    } ?>

</div>

 <?php require_once 'includes/contenedorInf.php'; ?>

		