<?php 
define('_FUTBOLME_', 1);

require_once '../urlplus.php';

//require_once('../../src/cacheOn.php');

if (!isset($_GET['partido_id'])) {
    //$pagina="promocion2b";
}

//require_once('../../src/cacheOn.php') ;

$torneo_id = 219;
$titulo = 'Segunda División B - Promoción de ascenso y permanencia';

$temporadas2b = temporadasPromocion($torneo_id); //sqlliga
$participaciones1 = participacionesPromocion(219); //sqlliga
$participaciones2 = participacionesPromocion(560); //sqlliga
$participaciones3 = participacionesPromocion(220); //sqlliga

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
    $nombreTemporada = $nombreTemporada.'-'.substr($nombreTemporada + 1, -2);
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
					<h1>Histórico Segunda División B - Promoción de ascenso y permanencia <?=$titulo?></h1>
					
					Los 4 primeros clasificados de cada grupo de Segunda División B promocionan Segunda División.<br />
					Estos clubs no tienen que tener ningún equipo en la categoría inmediatamente superior. <br />
					Se forman 2 grupos. En el primero se enfrentan los campeones, en una eliminatoria a ida y vuelta en la que los 2 vencedores ascenderan a Segunda División.
					Los dos vencedores jugarán entre ellos la final de la que saldrá el campeón absoluto de Segunda División B.<br />
					Los otros doce clasificados (2º, 3º y 4º de cada grupo) se enfrentaran en una primera eliminatoria de la que saldrán 6 vencedores que continuarán la fase de ascenso.<br />
					En la segunda eliminatoria se unirán a estos 6 equipos los dos perdedores del grupo de campeones. Estos ocho equipos disputarán otras 2 eliminatorias de la que saldrán las otras dos plazas de ascenso a Segunda División.				
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
				    	
				    	
	    	

						<?php $nt2 = ''; $equipo_id = 0; $link1 = ''; $link2 = ''; $link3 = ''; $link4 = '';
                        foreach ($temporadas2b as $fila) {

                          
                            $nt = $fila['nombreTemporada'];
                            $estil = $fila['estilo'];
                            if ('Permanencia' == trim($fila['grupo'])) {
                                $estil = 3;
                            }
                            if ('Prom.' == substr(trim($fila['grupo']), -5)) {
                                $estil = 4;
                            }
                            //imp(trim($fila['grupo'])." ".$estil);
                            $campeon = datosFinal($fila['idTemporada'], $estil);

                           /* if ($fila['idTemporada']==2235){
                            imp($campeon); die;

                        }*/

                            $CampeonCampeones = 0;
                            $CC = '';
                            $a1 = '';
                            $a2 = '';
                            $a3 = '';
                            $a4 = '';
                            if ('Camp.' == substr(trim($fila['grupo']), -5)) {
                                $estil = 4;
                                $CampeonCampeones = 1;
                            }

                            $equipo = '';
                            $equipo_id = 0;

                            




                            if (count($campeon) > 0) {
                                if (4 == $estil) {
                                    if ($campeon[0]['clasificado'] == 1) {
                                        $equipo = $campeon[0]['nomCasa'];
                                        $equipo_id = $campeon[0]['fm_local_id'];
                                        if (1 == $CampeonCampeones) {
                                            $CC = $equipo;
                                        }
                                        if (0 == $CampeonCampeones) {
                                            $a3 = $equipo;
                                            $link3 = $equipo_id;
                                        }
                                    } elseif ($campeon[0]['clasificado'] == 2) {
                                        $equipo = $campeon[0]['nomFuera'];
                                        $equipo_id = $campeon[0]['fm_visitante_id'];
                                        if (1 == $CampeonCampeones) {
                                            $CC = $equipo;
                                        }
                                        if (0 == $CampeonCampeones) {
                                            $a3 = $equipo;
                                            $link3 = $equipo_id;
                                        }
                                    }

                                   if (isset($campeon[1])){
                                        if ($campeon[1]['clasificado'] == 1) {
                                            $equipo2 = $campeon[1]['nomCasa'];
                                            $equipo_id2 = $campeon[1]['fm_local_id'];
                                            if (1 == $CampeonCampeones) {
                                                $CC = $equipo2;
                                            }
                                            if (0 == $CampeonCampeones) {
                                                $a4 = $equipo2;
                                                $link4 = $equipo_id2;
                                            }
                                        } elseif ($campeon[1]['clasificado'] == 2) {
                                            $equipo2 = $campeon[1]['nomFuera'];
                                            $equipo_id2 = $campeon[1]['fm_visitante_id'];
                                            if (1 == $CampeonCampeones) {
                                                $CC = $equipo2;
                                            }
                                            if (0 == $CampeonCampeones) {
                                                $a4 = $equipo2;
                                                $link4 = $equipo_id2;
                                            }
                                        }
                                    }
                                    
                                    

                                    if (1 == $CampeonCampeones) {
                                        $a1 = $campeon[0]['nomCasa'];
                                        $link1 = $campeon[0]['fm_local_id'];
                                        $a2 = $campeon[0]['nomFuera'];
                                        $link2 = $campeon[0]['fm_visitante_id'];
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
                                echo "<div style='text-align:center; width:100%; border-top: 2px solid dimgray; margin-top:10px;'><h3>Temporada ".$nt.'-'.substr(($nt + 1), -2).'</h3></div>';
                                if (1 == $CampeonCampeones) {
                                    echo "<div style='text-align:center; width:100%'><h4>Campeón Absoluto: <b>".$CC.'</b></h4></div>';
                                }
                                echo "<div style='text-align:center; width:100%'><h4>Ascienden a Segunda División:</h4></div>";
                                
                            }

                            
                            if (1 == $CampeonCampeones && 4 == $estil) {
                                ?>
								<div class='col-xs-12 clear'>
									<div class='col-xs-12 greenbox'>
									<a href="?temporada_id=<?php echo $fila['idTemporada']; ?>&pest=temporadaid"><?php echo $fila['grupo']; ?></a>
									</div>
									<div class="col-xs-6 h40">
									<img src="/img/equipos/escudo<?php echo $link1; ?>.png" alt="escudo" style="width:27px; height:30px"> <a href="/historico/promocion2b/index.php?equipo_id=<?php echo $equipo_id; ?>&pest=equipo" style="color:black"><?php echo $a1; ?></a>
									</div>
									<div class="col-xs-6 h40">
									<img src="/img/equipos/escudo<?php echo $link2; ?>.png" alt="escudo" style="width:27px; height:30px"> <a href="/historico/promocion2b/index.php?equipo_id=<?php echo $equipo_id; ?>&pest=equipo" style="color:black"><?php echo $a2; ?></a>
									</div>
								</div>
								
								<?php
                            }
                            if (0 == $CampeonCampeones && 4 == $estil) {
                                ?>
								<div class='col-xs-12 clear'>
									<div class='col-xs-12 greenbox'>
									<a href="?temporada_id=<?php echo $fila['idTemporada']; ?>&pest=temporadaid"><?php echo $fila['grupo']; ?></a>
									</div>
									<div class="col-xs-6 h40">
									<img src="/img/equipos/escudo<?php echo $link3; ?>.png" alt="escudo" style="width:27px; height:30px"> <a href="/historico/promocion2b/index.php?equipo_id=<?php echo $equipo_id; ?>&pest=equipo" style="color:black"><?php echo $a3; ?></a>
									</div>
									<div class="col-xs-6 h40">
									<img src="/img/equipos/escudo<?php echo $link4; ?>.png" alt="escudo" style="width:27px; height:30px"> <a href="/historico/promocion2b/index.php?equipo_id=<?php echo $equipo_id; ?>&pest=equipo" style="color:black"><?php echo $a4; ?></a>
									</div>
								</div>
								<?php
                            }

                            if (3 == $estil) {
                                ?>
							<div style="clear:both"></div>
							<div style='text-align:left; width:100%; margin-left:30px'>
							<a href="?temporada_id=<?php echo $fila['idTemporada']; ?>&pest=temporadaid">Permanencia en Segunda B</a> 
							</div>
							
							<?php
                            } ?>

							<?php if ($estil < 3) {
                                ?>
							<div class="col-xs-12">
							<div class="col-xs-6 greenbox text-right"><a href="?temporada_id=<?php echo $fila['idTemporada']; ?>&pest=temporadaid">
							Grupo <?php echo $fila['grupo']; ?></a></div>
							<div class="col-xs-6"><img src="/img/equipos/escudo<?php echo $equipo_id; ?>.png" style="width:18px; height:30px" alt="escudo"><a href="/historico/promocion2b/index.php?equipo_id=<?php echo $equipo_id; ?>&pest=equipo" style="color:black;margin-left:1px"><?php echo $equipo; ?></a></div>
							</div>
							<div class="clear"></div>
						    <?php
                            }

                            $nt2 = $nt;
                        }?>
						</div>								
						</div>						

						<div class="tab-pane" id="pestana_3">
						<?php require_once 'pes_pro2bparticipantes.php'; ?>
				        </div>


				        <?php if (isset($_GET['partido_id'])) {
                            ?>
						<div class="tab-pane active" id="pestana_partido">
						<?php require_once 'pes_pro2bpartido.php'; ?>							
						</div>
						<?php
                        } ?>

				        <?php if (isset($_GET['temporada_id'])) {
                            ?>
						<div class="tab-pane active" id="pestana_temporada">
						<?php require_once 'pes_pro2btemporadaID.php'; ?>							
						</div>
						<?php
                        } ?>
						<?php if (isset($_GET['equipo_id'])) {
                            ?>
						<div class="tab-pane active" id="pestana_equipo">
						<?php require_once 'pes_pro2bequipo.php'; ?>						
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