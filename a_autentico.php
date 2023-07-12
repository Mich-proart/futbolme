<div class="col-xs-12 nopadding">
<?php 
//siempre primero a_autentico.
//segundo menuUsuario.

//imp($_SESSION);

if (!empty($_SESSION['equipo'])){

    $_SESSION['equipo']=$_GET['equipo']??$_SESSION['equipo'];
    $equipo = explode(',', $_SESSION['equipo']);
    $equipo_id = $equipo[0];
    $club_id = $equipo[2]??0;
    if (!isset($equipo[1])) {
        $equipo[1]=equipoNombre($equipo_id);
    }
    $equipo_txt = $equipo[1];

    $saberLiga = XsaberLiga($equipo_id);
    $liga = $saberLiga['temporada_id'];
    $nombreLiga = $saberLiga['nombre'];
    $pgTemporada = '/resultados-directo/torneo/'.poner_guion($nombreLiga).'/'.$liga.'/';
    $valorJornada = $saberLiga['valorJornada']; $jj = $valorJornada;
    $ultimaJornada = $saberLiga['jornadas'];
    $hoy2 = new DateTime('now');
    $valorJornada=abs($valorJornada);

}

require_once __DIR__.'/includes/diseny/menuUsuario.php';


if (isset($_GET['n1'])) { $n1 = $_GET['n1']; } else { $n1 = 'Equipo'; }

if (!isset($partidosDia)) { $partidosDia = array(); }
if (!isset($c_partidos_ed)) { $c_partidos_ed = 0; }
if (!isset($c_partidos_td)) { $c_partidos_td = 0; }
$pg = '/index.php?fm=1';
?>

<div class="nopadding marco">
<?php 

//imp($_SESSION);
//hay que actualizar este script si hay partidos en juego.
//if ($c_partidos_ed>0) { $claseDirectos=""; } else { $claseDirectos='hide';}
//if ($n1!='PartidosHoy') { $claseDirectos='hide'; }

if (isset($c_directos) && $c_directos > 0) {
    ?>
	<div class="col-xs-12 nopadding text-center whitebox txt13">
    	<div class="h10"></div>   
        <div class="marco">
        	<div class="whitebox col-xs-6">
             <b>En juego:</b>&nbsp;&nbsp;&nbsp;<?php if ($c_partidos_ed > 0) { ?>
        	<span class="boldfont"><a href="?x=0&n1=PartidosHoy&n2=TusEquipos">Mis equipos: (<?php echo $c_partidos_ed; ?>)</a></span>
        	<?php } ?></div>

            <div class="whitebox col-xs-3"><?php if ($c_partidos_td > 0) { ?>
        	<span class="boldfont"><a href="?x=0&n1=PartidosHoy&n2=TusTorneos">Mis torneos: (<?php echo $c_partidos_td; ?>)</a></span>
        	<?php } ?></div>

            <div class="whitebox col-xs-3">
            <a href="?x=0&n1=PartidosHoy&n2=Futbolme"><span class="boldfont" style="color:red">Futbolme <?php echo "($c_directos)"; ?></span>
            </a></div>
            <div class="clear"></div>
        </div>

	</div>	
	
<?php
}



//imp('n1: '.$n1);
/*var_dump($_SESSION['equipos']);
imp($_SESSION['equipo']);

*/

//imp($n2);
//imp($c_partidos_ed);*/

switch ($n1) {
    case 'Equipo':
        
        $tiempo_inicio = microtime_float();
        

        require_once $nivel.'a_equipo.php'; 


        if (isset($partido_id)){ ?>
        <script>
         $(function () {            
            setInterval(function () { 
                var dt = new Date();
                var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
                $.ajax({
                    type: 'GET',
                    url: "/ajax_partido.php?id=<?php echo $partido_id?>",
                })
                .done(function (data) {
                    $('#partidoX').html(data);
                });

            },60000);
        });
        </script> 
        <?php }


        $tiempo_fin = microtime_float();
        $tiempo = $tiempo_fin - $tiempo_inicio;
        //echo 'Tiempo empleado: '.($tiempo_fin - $tiempo_inicio);


        break;

    case 'config':
        require_once $nivel.'a_usuario.php';
        break;

    case 'PartidosHoy': ?>

        <div class="col-xs-12 whitebox">
            <div class="h10"></div>
                <span class="actua pull-right badge">
                Actualizado a las <?php echo $hora = date('H:i:s'); ?>
                </span>
                <div class="clear"></div>
        <div id="partidos">
        <?php switch ($n2) {
            case 'TusEquipos':

                $temporada_id = 0;
                $partidosEquipos = array();

                /*
                imp($c_partidos);
                imp($c_directos);
                imp($c_partidos_ep);*/

                if ($c_partidos > 0) {
                    

                    if ($c_directos > 0) {
                        $directosEquipos = array();
                        foreach ($directos as $key => $value) {
                            foreach ($_SESSION['equipos'] as $key => $v) {
                                if (($key == $value['equipoLocal_id'] || $key == $value['equipoVisitante_id'])) {
                                    $directosEquipos[] = $value;
                                }
                            }
                        }
                        unset($directos);
                        $directos = $directosEquipos;
                        include 'includes/contenidoDirecto.php';
                    }

                    foreach ($partidosDia as $key => $value) {
                        foreach ($_SESSION['equipos'] as $key => $v) {
                            if (($key == $value['equipoLocal_id'] || $key == $value['equipoVisitante_id']) && 2 != $value['estado_partido']) {
                                $partidosEquipos[] = $value;
                            }
                        }
                    }                    
                    unset($partidosDia);
                    $partidosDia = $partidosEquipos;
                    require_once 'includes/contenidoIndex.php';
                }

                if (0 == $c_partidos_tet) {
                    ?>
					<div class="col-xs-12 marco"><h4 class="text-center">Ninguno de tus equipos tiene partido hoy</h4></div>
				<?php
                }

            break;
            case 'TusTorneos':
                $temporada_id = 0;
                $partidosTorneos = array();
                if ($c_partidos > 0) {
                    if ($c_directos > 0) {
                        $directosTorneos = array();
                        foreach ($directos as $key => $value) {
                            if (isset($_SESSION['equipos'])) {
                                foreach ($_SESSION['equipos'] as $k => $v) {
                                    foreach ($v['torneos'] as $kt => $vt) {
                                        if (442 == $kt) {continue;}
                                        if ($kt == $value['temporada_id']) {
                                            $directosTorneos[] = $value;
                                        }
                                    }
                                }
                            }
                        }

                        unset($directos);
                        $directos = $directosTorneos;
                        include 'includes/contenidoDirecto.php';
                    }

                    if (isset($_SESSION['equipos'])) {
                        foreach ($partidosDia as $key => $value) {
                            foreach ($_SESSION['equipos'] as $k => $v) {
                                foreach ($v['torneos'] as $kt => $vt) {
                                    if (442 == $kt) {continue;}
                                    if ($value['temporada_id'] == $kt && 2 != $value['estado_partido']) {
                                        $partidosTorneos[] = $value;
                                        break;
                                    }
                                }
                            }
                        }
                    }

                    $pag = 'seleccion';
                    $equipo_id = 0;
                    unset($partidosDia);
                    $partidosDia = $partidosTorneos;
                    require_once 'includes/contenidoIndex.php';
                }

                if (0 == $c_partidos_ttt) {
                    ?>
					<div class="col-xs-12 marco"><h4 class="text-center">Ninguno de tus torneos tienen partidos hoy</h4></div>
				<?php
                }

            break;
            case 'Futbolme': ?>

			
							
				<?php include 'includes/contenidoDirecto.php'; ?>				
			

			<?php include 'includes/publicidad/cuerpo04.php'; ?>

			<div class="clear"></div>
			<div class="col-xs-12 nopadding">
					<?php 
                    $path = './json/index_cabeceras.json';
                    $json = file_get_contents($path);
                    $partidosDia = json_decode($json, true); require_once './srcRecursos/pesCabeceras.php'; ?>
			</div>
			<?php break;
        }?>
        </div>  <!-- div id="partidos"-->
        <div class="h10"></div>
    </div>

   
        <script>
         $(function () {   
                      
            setInterval(function () { 
                var dt = new Date();
                var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();                
                $.ajax({
                    type: 'GET',
                    url: "/ajax_autentico.php?n2=<?php echo $n2?>",
                })
                .done(function (data) {
                    $('#partidos').html(data);
                });
                $('.actua').html('Actualizado a las ' + time);
                $.ajax({
                    type: 'GET',
                    url: "/ultimosEventos.php",
                })
                .done(function (data) {
                    $('#ultimosEventos').html(data);
                });
            },60000);
        });
        </script>
  

	<?php break;

    case 'Televisados':

    $fecha = new \DateTime();
        $dia = $fecha->format('Y-m-d');

        $medios = Xmedios($dia);
        $partidosSQL = Xtelevisados($dia);
        $partidos = prepararTelevisados($partidosSQL);

        $contador = 0; $inicio = ''; $final = ''; $key = 0;
        foreach ($partidos as $key => $value) {
            if (0 == $contador) {
                $inicio = $key;
            }
            $contador = $contador + 1;
        }

        $final = $key;
        $inicio = nombreDia($inicio);
        $final = nombreDia($final);
        $inicio = str_replace(',', '', $inicio);
        $final = str_replace(',', '', $final);

        $equipos = array(); $tustelevisados = array(); $restopartidos = array();

        foreach ($_SESSION['equipos'] as $key => $value) {
            $equipos[] = $key;
        }

        foreach ($partidos as $fecha => $partidoFecha) {
            //imp($partidoFecha);
            foreach ($partidoFecha as $key => $partido) {
                $continua = 0;
                foreach ($equipos as $value) {
                    if ($partido['partido']['equipoLocal_id'] == $value ||
                        $partido['partido']['equipoVisitante_id'] == $value) {
                        $continua = 1;
                    }
                }

                if (1 == $continua) {
                    $tustelevisados[$fecha][$key] = $partido;
                    continue;
                }
            }
            //die;
        }

    $pg .= '&n1=Televisados';
    if (isset($_GET['n2'])) {
        $n2 = $_GET['n2'];
    } else {
        $n2 = 'TVequipos';
    }
        switch ($n2) {
            case 'TVequipos':
                if (count($tustelevisados) > 0) {
                    $partidos = $tustelevisados;
                    require_once './srcPagajax/televisados.php';
                }

                if (0 == count($tustelevisados)) {
                    ?>
				<div class="col-xs-12 marco"><h4 class="text-center">De momento no se televisa ningún partido de tus equipos en los próximos días</h4></div>
				<?php
                }
            break;
            case 'TVfutbolme': require_once './srcPagajax/televisados.php';

            break;
        }?>	
		
	<?php break;   
} 



?>
</div>			


</div>  								

<?php require_once 'includes/contenedorInf.php'; ?>
