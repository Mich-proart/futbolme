<?php 
define('_FUTBOLME_', 1);
require_once 'src/config.php';

//imp($_GET);

if (isset($_GET['nombre'])) {
    $_GET['nombre'] = str_replace("'", '', $_GET['nombre']);
    $nombre = $_GET['nombre'];
    if (isset($_GET['pagina'])) {
        $paginaJ = $_GET['pagina'];
    } else {
        $paginaJ = 1;
    }
} else {
    header('Location:/');
    die;
}

$resultado = buscarJugador($nombre, $paginaJ);

if (isset($resultado['jugadores'])) {
    $jugadores = $resultado['jugadores'];
    $paginas = $resultado['paginas'];
    $hay_jugador = 1;
} else {
    $hay_jugador = 0;
    $jugador = $resultado;
}

?>

<?php require_once 'includes/head.php'; ?>
	<title>Futbol en directo - Buscador de jugadores </title>

</head>
	<?php require_once 'includes/contenedorSup.php'; ?>			
				
				<?php
                if (0 == $hay_jugador) {
                    echo '<div class="col-xs-12 col-lg-12 col-centered playerboxescontainer whitebox colorseparator">';
                    echo $jugador;
                    echo '</div>';
                } else {
                    foreach ($jugadores as $jugador) {
                        $enlace_jugador = '/resultados-directo/jugador/'.poner_guion($jugador['apodo']).'/'.$jugador['id'];
                        $enlace_equipo = '/resultados-directo/equipo/'.poner_guion($jugador['equipo']).'/'.$jugador['equipoActual_id'];

                        $fecha = $jugador['fecha_nacimiento'];
                        if ('1900' == substr($fecha, 0, 4)) {
                            $fecha = '';
                        }
                        switch ($jugador['posicion']) {
                        case '1':
                            $txtPosicion = 'Portero';
                            break;
                        case '2':
                            $txtPosicion = 'Defensa';
                            break;
                        case '3':
                            $txtPosicion = 'Centrocampista';
                            break;
                        case '4':
                            $txtPosicion = 'Delantero';
                            break;
                        case '5':
                            $txtPosicion = 'Entrenador';
                            break;
                        default:
                            $txtPosicion = 'sin demarcación';
                            break;
                    }

                        $rutaJugador = '/img/jugadores/jugador'.$jugador['id'].'.jpg';
                        if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaJugador))) {
                            $rutaJugador = '/img/jugadores/NI.png';
                        } ?>    
				<!--Comienza Casilla Jugador-->
				<div class="row row-centered playerboxesgen nomargin">
				    <div class="col-xs-12 col-lg-12 col-centered playerboxescontainer whitebox colorseparator">
				        <div class="col-xs-6 col-md-2">
				            
				            <div class="row col-xs-12"><?php echo $txtPosicion; ?></div>

				            
				            <a href="<?php echo $enlace_jugador; ?>">
				                <img src="<?php echo $rutaJugador; ?>" alt="<?php echo $jugador['apodo']; ?>">
				            </a>
				            
				          	  
				        </div>
				        <div class="col-xs-6 col-md-7">
				        	<a href="<?php echo $enlace_jugador; ?>"><h3 class="black-text"><?php echo $jugador['apodo']; ?></h3></a>
					        <?php echo $jugador['nombre']; ?><br />
					        <?php echo $fecha; ?>		        				            			            
				        </div>
				        <div class="col-xs-12 col-md-3">
				        <?php if (0 == $jugador['es_baja']) {
                            ?>
				        	<a href="<?php echo $enlace_equipo; ?>"><?php echo $jugador['equipo']; ?></a>
				        <?php
                        } else {
                            ?>
				        Estado actual: <i>Baja</i>
				        <?php
                        } ?>
				        </div>
				        
				    </div>
				</div>
				<!--Fin de Casilla Jugador-->
				<?php
                    } ?>


				<?php if ($paginas > 1) {
                        ?>
				<div class="col-xs-12" style="background-color:white">
					<?php for ($i = 1; $i <= $paginas; ++$i) {
                            if ($paginaJ == $i) {
                                echo '<b>'.$i.'</b> - ';
                            } else {
                                echo "<a href='/buscadorJugador.php?nombre=".$nombre.'&pagina='.$i."'>".$i.'</a> - ';
                            }
                        } ?>
				</div>
				<?php
                    }
                } //si hay jugador?>

	<?php require_once 'includes/contenedorInf.php'; ?>	