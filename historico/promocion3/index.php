<?php 
define('_FUTBOLME_', 1);

require_once '../urlplus.php';

//require_once('../../src/cacheOn.php');

if (!isset($_GET['partido_id'])) {
    //$pagina="promocion3";
}

//require_once('../../src/cacheOn.php') ;
$torneo_id = 221;
$titulo = 'Tercera División - Promoción de ascenso a Segunda B';

$temporadas3 = temporadasPromocion($torneo_id); //sqlliga

//imp($temporadas3); die;
$participaciones1 = participacionesPromocion($torneo_id); //sqlliga

if (isset($_GET['partido_id'])) {
    $partido_id = $_GET['partido_id'];
    if (!is_numeric($partido_id)) {
        header('Location:index.php');
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

 require_once '../../includes/head.php';
 ?>
    <title><?php echo $titulo; ?></title>

</head>

<body  style="margin-top: 40px">
<?php 
$nivel="../../";
require_once '../../includes/menu.php';?>
<div id="contenedor" style="z-index: 1">
   <section class="container-fluid section_down cajagrisoscuro">

    <div id="cPrincipal" class="col-xs-12 nopadding clear"> 
    <?php require_once '../header.php';
    require_once '../left_sidebar.php'; ?>
    <div class="col-xs-12 col-sm-9 col-md-6 whitebox">     
				

				<?php if (isset($_GET['error'])) {
    ?>
				<div class="alert alert-danger dismiss">
				    Error el enviar los datos. Por favor vuelva a introducirlos
				    <a href="#" class="close" data-dismiss="alert">&times;</a>
				</div>
				<?php
} ?>
				

				<div class="row nomargin" style="text-align:center">
					<h1>Histórico Tercera División  - Promoción ascenso a Segunda B</h1>
					
				</div>
				


				<div class="row nomargin horizontaldivider celestebox">
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
                        foreach ($temporadas3 as $fila) {
                            $nt = $fila['nombreTemporada'];

                            if ($nt < 1990) {
                                continue;
                            }

                            $estil = $fila['estilo'];
                            if ('Prom.' == substr(trim($fila['grupo']), -5)) {
                                $estil = 4;
                            }
                            //imp(trim($fila['grupo'])." ".$estil);
                            $campeon = datosFinal($fila['idTemporada'], $estil);
                            //\src\hconsultas\sqlliga.php:
                            //imp($fila);
                            $CampeonCampeones = 0;
                            $a1 = '';
                            $a2 = '';
                            $a3 = '';
                            $a4 = '';
                            if ('Camp.' == substr(trim($fila['grupo']), -5)) {
                                $estil = 4;
                                $CampeonCampeones = 1;
                            }

                            $ascensoCampeones = array();
                            if (count($campeon) > 0) {
                                if (4 == $estil) {
                                    foreach ($campeon as $key => $ccc) {
                                        if ($ccc['clasificado'] > 0) {
                                            if (1 == $ccc['clasificado']) {
                                                $ascensoCampeones[$key]['equipo'] = $ccc['nomCasa'];
                                                $ascensoCampeones[$key]['equipo_id'] = $ccc['fm_local_id'];
                                            } else {
                                                $ascensoCampeones[$key]['equipo'] = $ccc['nomFuera'];
                                                $ascensoCampeones[$key]['equipo_id'] = $ccc['fm_visitante_id'];
                                            }
                                        }
                                    }
                                } else {
                                    if (1 == $estil) {
                                        $equipo = $campeon[0]['equipo'];
                                        $equipo_id = $campeon[0]['equipo_id'];
                                    } else {
                                        if ($campeon[0]['clasificado'] == 1) {
                                            $equipo = $campeon[0]['nomCasa'];
                                            $equipo_id = $campeon[0]['fm_local_id'];
                                            $permanece = $equipo;
                                            $linkP = $equipo_id;
                                        } else {
                                            $equipo = $campeon[0]['nomFuera'];
                                            $equipo_id = $campeon[0]['fm_visitante_id'];
                                            $permanece = $equipo;
                                            $linkP = $equipo_id;
                                        }
                                    }
                                }
                            }
                            if ($nt != $nt2) {
                                echo "<div class='clear'></div><div style='text-align:center; width:100%; border-top: margin-top:10px;'><h3>Temporada ".$nt.'-'.substr(($nt + 1), -2).'</h3></div>';
                                echo "<div style='text-align:center; width:100%'><h4>Ascienden a Segunda División B:</h4></div>";
                            }

                            if (1 == $CampeonCampeones && 4 == $estil) {
                                ?>
								
								<div class='col-xs-12 marco txt11'>
									<div class='col-xs-12 greenbox'>
									<a href="?temporada_id=<?php echo $fila['idTemporada']; ?>&pest=temporadaid"><?php echo $fila['grupo']; ?></a>
									</div>
									<?php foreach ($ascensoCampeones as $ccc) {
                                    ?>
									<div class="col-xs-4 whitebox h40">
									<img src="/img/equipos/escudo<?php echo $ccc['equipo_id']; ?>.png" alt="escudo" style="width:27px; height:30px"> <a href="/historico/promocion3/index.php?equipo_id=<?php echo $ccc['equipo_id']; ?>&pest=equipo" style="color:black"><?php echo $ccc['equipo']; ?></a>
									</div>
									<?php
                                } ?>
									<div class="clear"></div>
								</div>
								
								<?php
                            }
                            if (0 == $CampeonCampeones && 4 == $estil) {
                                ?>
								<div class='col-xs-12 marco txt11'>
									<div class='col-xs-12 greenbox'>
									<a href="?temporada_id=<?php echo $fila['idTemporada']; ?>&pest=temporadaid"><?php echo $fila['grupo']; ?></a>
									</div>
									<?php foreach ($ascensoCampeones as $ccc) {
                                    ?>
									<div class="col-xs-4 whitebox h40">
									<img src="/img/equipos/escudo<?php echo $ccc['equipo_id']; ?>.png" alt="escudo" style="width:27px; height:30px"> <a href="/historico/promocion3/index.php?equipo_id=<?php echo $ccc['equipo_id']; ?>&pest=equipo" style="color:black"><?php echo $ccc['equipo']; ?></a>
									</div>
									<?php
                                } ?>
									<div class="clear"></div>
								</div>
								
								<?php
                            } ?>


							<?php	
                            if ($estil < 3) {
                                ?>
							
							<?php $txtGrupo = trim($fila['grupo']);
                                $txtGrupo = substr($txtGrupo, -2); ?>						
								<div class="col-xs-4 txt11"><br /><a class="greenbox" href="?temporada_id=<?php echo $fila['idTemporada']; ?>&pest=temporadaid">
									Grupo <?php echo $txtGrupo; ?></a>
									<div class="h40 txt11"><img src="/img/equipos/escudo<?php echo $equipo_id; ?>.png" style="width:18px; height:30px" alt="escudo"><a href="/historico/promocion3/index.php?equipo_id=<?php echo $equipo_id; ?>&pest=equipo" style="color:black;margin-left:1px"><?php echo $equipo; ?></a>
									</div>
								</div>	
												
							<?php
                            }
                            $nt2 = $nt; ?>


						<?php
                        }?>
						<div class="clear"></div>
						</div>								
						</div>						

						<div class="tab-pane" id="pestana_3">
						<?php require_once 'pes_pro3participantes.php'; ?>
				        </div>


				        <?php if (isset($_GET['partido_id'])) {
                            ?>
						<div class="tab-pane active" id="pestana_partido">
						<?php require_once 'pes_pro3partido.php'; ?>							
						</div>
						<?php
                        } ?>

				        <?php if (isset($_GET['temporada_id'])) {
                            ?>
						<div class="tab-pane active" id="pestana_temporada">
						<?php require_once 'pes_pro3temporadaID.php'; ?>							
						</div>
						<?php
                        } ?>
						<?php if (isset($_GET['equipo_id'])) {
                            ?>
						<div class="tab-pane active" id="pestana_equipo">
						<?php require_once 'pes_pro3equipo.php'; ?>						
						</div>
						<?php
                        } ?>

				    </div>
				</div>
			

 </div>
                <?php  require_once '../right_sidebar.php'; ?>
        </div> <!-- id cPrincipal  -->
    </section>
</div>

<script>
    (function(w, d){
        var b = d.getElementsByTagName('body')[0];
        var s = d.createElement("script"); s.async = true;
        var v = !("IntersectionObserver" in w) ? "8.7.1" : "10.5.2";
        s.src = "https://cdnjs.cloudflare.com/ajax/libs/vanilla-lazyload/" + v + "/lazyload.min.js";
        w.lazyLoadOptions = {}; // Your options here. See "recipes" for more information about async.
        b.appendChild(s);
    }(window, document));
</script>
<script async src="/js/notificaciones.js"></script>
<script async src="/js/bootstrap.min.js"></script>
<script async src="/js/comunsite.min.js"></script>
<script async src="/js/ajax.js?=<?php echo $static_v; ?>"></script>
<?php require_once $nivel.'includes/footer.php'; 
 ?>
</body>
</html>