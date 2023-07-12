<?php
define('_FUTBOLME_', 1);

require_once '../urlplus.php';

require_once $nivel.'src/config.php';

//require_once('../../src/cacheOn.php');

if (!isset($_GET['partido_id'])) {
    //$pagina="promocion2";
}

//require_once('../../src/cacheOn.php') ;
$torneo_id = 294;
$titulo = 'Segunda División - Promoción de ascenso';

$temporadas2b = temporadasPromocion($torneo_id); //sqlliga
$participaciones1 = participacionesPromocion($torneo_id); //sqlliga

if (isset($_GET['partido_id'])) {
    $partido_id = $_GET['partido_id'];
    if (!is_numeric($partido_id)) {
        header('Location:/');
        die;
    }
    $p = partidoPromocion($partido_id);
    $partidoH = $p[0];

    $titulo = $partidoH['nombreTemporada'].' - '.$partidoH['jornada'].' - '.$partidoH['nomCasa'].' vs '.$partidoH['nomFuera'].' - '.$titulo;
}

if (isset($_GET['equipo_id'])) {
    if (!is_numeric($_GET['equipo_id'])) {
        header('Location:index.php');
    }

    $e = nombreEquipo($_GET['equipo_id']); //sqlcoparey
    $equipo_nombre = $e['nombre'];

    $partisyrivales = participacionesEquipoPromocion($torneo_id, $_GET['equipo_id']); //sqlliga

    $titulo = 'Participaciones '.$equipo_nombre.' - '.$titulo;

    if (isset($_GET['enf'])) {
        $equipoenf1 = $_GET['equipo_id'];
        $equipoenf2 = $_GET['equipo_id2'];

        $e = nombreEquipo($_GET['equipo_id2']);
        $equipo_nombre2 = $e['nombre'];
        $enfrentamientos = enfrentamientosPromocion($torneo_id, $_GET['equipo_id'], $_GET['equipo_id2']); //sqlliga

        $titulo = 'Enfrentamientos entre '.$equipo_nombre.' y '.$equipo_nombre2.' - '.$titulo;
    }
}

if (isset($_GET['temporada_id'])) {
    $temporada_id = $_GET['temporada_id'];
    if (!is_numeric($temporada_id)) {
        header('Location:index.php');
    }
    $datosTemporada = datosTemporadaN($temporada_id);

    $nombreTemporada = $datosTemporada['nombreTemporada'];
    $nombreTemporada = $nombreTemporada.'-'.substr(($nombreTemporada + 1), -2);
    $estilo = $datosTemporada['estilo'];
}

if (isset($_GET['pest'])) {
    $pestana = $_GET['pest'];
} else {
    $pestana = '';
}
    switch ($pestana) {
        case 'temporadas':
            $pesTemporadas = 'active'; $pesParticipaciones = ''; $pesTemporadaID = ''; $pesEquipo = ''; $pesPartido = '';
            break;
        case 'participaciones':
            $pesTemporadas = ''; $pesParticipaciones = 'active'; $pesTemporadaID = ''; $pesEquipo = ''; $pesPartido = '';
            break;
        case 'temporadaid':
            $pesTemporadas = ''; $pesParticipaciones = ''; $pesTemporadaID = 'active'; $pesEquipo = ''; $pesPartido = '';
            break;
        case 'equipo':
            $pesTemporadas = ''; $pesParticipaciones = ''; $pesTemporadaID = ''; $pesEquipo = 'active'; $pesPartido = '';
            break;
        case 'partido':
            $pesTemporadas = ''; $pesParticipaciones = ''; $pesTemporadaID = ''; $pesEquipo = ''; $pesPartido = 'active';
            break;

        default:
           $pesTemporadas = 'active'; $pesParticipaciones = ''; $pesTemporadaID = ''; $pesEquipo = ''; $pesPartido = '';
           break;
    }

$metaDescripcion = $titulo;

?>

<?php require_once __DIR__.'/../../includes/head.php'; ?>
	<title><?php echo $titulo; ?></title>

</head>

	<?php require_once $nivel.'src/contenedorSup.php'; ?>
			<div class="col-xs-12 whitebox nopadding">
				

				<?php if (isset($_GET['error'])) {
    ?>
				<div class="alert alert-danger dismiss">
				    Error el enviar los datos. Por favor vuelva a introducirlos
				    <a href="#" class="close" data-dismiss="alert">&times;</a>
				</div>
				<?php
} ?>
				

				<div class="row nomargin" style="text-align:center">
					<h1>Histórico Segunda División - Promoción de ascenso</h1>
					
				</div>
				

				<div class="row nomargin horizontaldivider">
					<ul class="nav nav-tabs" role="tablist" id="pestanasHistorico">
				        <li <?php if (!isset($_GET['equipo_id']) && !isset($_GET['temporada_id']) && !isset($_GET['partido_id'])) {
        ?> class="active" <?php
    } ?>><a href="#pestana_0">Temporadas</a></li>
				        <li><a href="#pestana_3">Participaciones</a></li>

				        <?php if (isset($_GET['temporada_id'])) {
        ?><li class="active"><a href="#pestana_temporada"><?php echo $nombreTemporada; ?></a></li> <?php
    } ?>
				        <?php if (isset($equipo_nombre)) {
        ?>
				        <li class="active"><a href="#pestana_equipo"><?php echo $equipo_nombre; ?></a></li>
				        <li><img src="/img/equipos/escudo<?php echo $_GET['equipo_id']; ?>.png" alt="escudo"  style="width:27px; height:30px"></li>
				        <?php
    } ?>
				        <?php if (isset($partido_id)) {
        ?>
				        <li class="active"><a href="#pestana_partido"><?php echo $partidoH['nomCasa'].' - '.$partidoH['nomFuera']; ?></a></li>
				        <li><img src="/img/equipos/escudo<?php echo $partidoH['fm_local_id']; ?>.png" alt="escudo"  style="width:27px; height:30px">-
				        <img src="/img/equipos/escudo<?php echo $partidoH['fm_visitante_id']; ?>.png" alt="escudo"  style="width:27px; height:30px"></li>
				        <?php
    } ?>
				    </ul>
				    <div class="tab-content">
				    	<div class="tab-pane <?php if (!isset($_GET['equipo_id']) && !isset($_GET['temporada_id']) && !isset($_GET['partido_id'])) {
        ?> active <?php
    } ?>" id="pestana_0">
				    	<div class="col-xs-12 whitebox padding1">
				    	
				    	
	    	

						<?php $nt2 = '';
                        foreach ($temporadas2b as $fila) {
                            $nombreTemporada = $fila['nombreTemporada'];
                            $estilo = $fila['estilo'];
                            $temporada_id = $fila['idTemporada'];

                            if ($nombreTemporada != $nt2) {
                                echo "<div style='text-align:center; width:100%; border-top: 2px solid dimgray; margin-top:10px;'><h3>Temporada ".$nombreTemporada.'-'.substr(($nombreTemporada + 1), -2).'</h3></div>';

                                //imp($temporada_id);
                            }

                            include 'pes_pro2temporadaID.php';

                            $nt2 = $nombreTemporada;
                        }?>
						</div>								
						</div>						

						<div class="tab-pane" id="pestana_3">
						<?php  require_once 'pes_pro2participantes.php'; ?>
				        </div>


				        <?php if (isset($_GET['partido_id'])) {
                            ?>
						<div class="tab-pane active" id="pestana_partido">
						<?php  require_once 'pes_pro2partido.php'; ?>							
						</div>
						<?php
                        } ?>

				        <?php if (isset($_GET['temporada_id'])) {
                            ?>
						<div class="tab-pane active" id="pestana_temporada">
						<?php //require_once('pes_pro2temporadaID.php');?>							
						</div>
						<?php
                        } ?>
						<?php if (isset($_GET['equipo_id'])) {
                            ?>
						<div class="tab-pane active" id="pestana_equipo">
						<?php  require_once 'pes_pro2equipo.php'; ?>						
						</div>
						<?php
                        } ?>

				    </div>
				</div>
			</div>
			
			<?php //$pagina="historico";?>
		<?php  require_once $nivel.'src/contenedorInf.php'; ?>
		
		
