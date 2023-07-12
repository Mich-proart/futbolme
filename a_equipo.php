<?php 
//imp($_SESSION['equipo']);
//imp($_GET);
 $equipo_id=$equipo_id??0;
 $club_id=$club_id??0;
 $valorJornada=$valorJornada??0;

if ($equipo_id>0){ $pg .= '&equipo='.$equipo_id.','.$equipo_txt.'&n1=Equipo';}

if ($club_id>0){ 
$rutaEscudo=rutaEscudo($club_id, $equipo_id);?>
<div class="col-xs-12 marconegro">
    <div class="col-xs-2 nopadding" style="height: 50px">
    <img style="max-width:35px; max-height:35px; float:left" alt="escudo" src="<?php echo $rutaEscudo?>">
    </div>
    <div class="col-xs-10 text-center">
    	<span class="boldfont"><?php echo $equipo_txt; ?></span><br />		
    	<div class="marconegro marco" style="background-color: gainsboro">
            <a href="<?php echo $pgTemporada?>"><i><?php echo $nombreLiga; ?></i></a>
        </div>
    </div>    
</div>
<?php } 

$n2 = $_GET['n2']??'Calendario';
$n3 = $_GET['n3']??'Proximo';

$calendario = XequipoPartidos($equipo_id);
$p = $calendario['partidos'];
$partidos = array();
$proximoPartido = array();
$proximosPartidos = array();
$estadisticas = $calendario['estadisticas'];

if (isset($p)) {
    foreach ($p as $key => $value) {
        $fecha = date_create($value['fecha']);
        $diferencia = date_diff($fecha, $hoy2);
        $dias = $diferencia->days;
        $invertido = $diferencia->invert;
        
        if (1 == $invertido || 3 > $dias ) {
            $proximosPartidos[] = $value;
        } else {
            $partidos[] = $value;
        }
    }
    $proximoPartido = end($proximosPartidos); //nos da el ultimo elemento
    $proximosPartidos = array_reverse($proximosPartidos);    
} 

//imp($proximoPartido);

$j = $_GET['j']??$valorJornada;
?>
<div class="clear"></div>
<div id="panel-equipo-global" class="nopadding">
<?php if (!empty($_SESSION['equipo'])){ ?>
<ul class="col-xs-12 nav nav-pills h40 text-center cajagrisoscuro">
	<li class="dropdown h40" style="margin-left: 5px;">
	    <a class="btn btn-primary" href="<?php echo $pg?>&n3=Proximo" style="color:white">Calendario</a>
    </li>
    <li class="dropdown h40">
    <a class="btn btn-primary" href="<?php echo $pg?>&n2=Clasificacion" style="color:white">Clasificación</a>
    </li>
    <?php if ($liga>0 && $liga<25) { 
        $pg2 = $pg.'&n2=Jugadores'; ?>
    <li class="dropdown h40">
    <a class="btn btn-primary" href="<?php echo $pg2; ?>&n5=Plantilla" style="color:white">Plantilla</a>
    </li>
	<?php } ?>
</ul>
<?php } 

/*
imp('pg: '.$pg); 
imp('pg1: '.$pg1); 
imp('pg2: '.$pg2); 
imp('n2: '.$n2);
*/
?>
<div class="col-xs-12 nopadding cajagrisclaro">

<?php switch ($n2) {
    case 'Clasificacion':
    include 'a_equipoClasificacion.php';    
    break;

    case 'Jugadores':
    include 'a_equipoJugadores.php'; 
    break;

    case 'Calendario':

    $n3 = $_GET['n3']??'Proximo';       
    $pg .= '&n2=Calendario';
    $pesProximo = ''; $pesJornada = '';
    switch ($n3) {
        case 'Proximo':$pesProximo = 'active'; break;
        case 'Jornada':$pesJornada = 'active'; break;
    }?> 

	
<div class="col-xs-12 celestebox nopadding">
    <ul class="nav nav-tabs nopadding" role="tablist">
        <li class="<?php echo $pesProximo?> h40"><a class="btn btn-info" style="color: red" href="<?php echo $pg; ?>&n3=Proximo">Próximo partido</a></li>            
        <li class="<?php echo $pesJornada?> h40"><a class="btn btn-info" style="color: red" href="<?php echo $pg; ?>&n3=Jornada">Jornada Activa (<?php echo $valorJornada; ?>)</a></li>
    </ul>
    <div class="col-xs-12 whitebox nopadding">
    <?php switch ($n3) {

            case 'Proximo':
            include 'a_equipoCalendarioProximo.php';
            break;
                       
            case 'Jornada':
            $partidos = Xpartidos($liga, $j, 0);?>
            <div class="col-xs-12">
                <h4 class="text-center boldfont">
                <?php if (($j - 1) > 0) { ?>
                <span class="pull-left">
                <a href="<?php echo $pg; ?>&n3=Jornada&j=<?php echo $j - 1; ?>">(<?php echo $j - 1; ?>) <- </a>
                </span>
                <?php } ?>
                Jornada <?php echo $j; ?>
                <?php if (($j + 1) < ($ultimaJornada+1)) { ?>
                <span class="pull-right"><a href="<?php echo $pg; ?>&n3=Jornada&j=<?php echo $j + 1; ?>">-> (<?php echo $j + 1; ?>)</a></span>
                <?php } ?>
                </h4>
            </div>
            <?php 

            $f = ''; $colorFondo = '';
            $pag = 'seleccion'; $equipo_id = 0; //parametros para que no salgan errores en partidoR
            foreach ($partidos as $key => $partido) {
                if ('resto' === $key) {continue;}
                if (2 == $partido['estado_partido']) { continue;}
                if ($f != $partido['fecha']) {
                    if ('whitebox' == $colorFondo) {
                        $colorFondo = 'cajagrisclaro';
                    } else {
                        $colorFondo = 'whitebox';
                    } ?>
                <div class="col-xs-12 txt11 cajanaranja text-center"><?php echo utf8_encode(nombreDiaCompleto($partido['fecha'])); ?></div>
                <?php }
                if (null == $partido['equipoLocal_id'] || null == $partido['equipoVisitante_id']) {
                    $html = '<span class="boldfont" style="margin-left: 20px;">
                    Descansa ';
                    if (null == $partido['equipoLocal_id']) {
                        $html .= $partido['visitante'];
                    } else {
                        $html .= $partido['local'];
                    }
                    $html.'</span>';
                } else {
                    include 'includes/contenidoPartido.php';
                }
                $f = $partido['fecha'];
            }
            break;
        } // swicht n3?>
    </div>
</div>
<?php  } // swicht n2 ?>
</div>
</div>