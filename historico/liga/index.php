<script LANGUAGE="javascript">
	<!--
	function temporada_onchange() {
	document.formula.submit ()
	}
    function patron_onchange() {
    document.formulaPatron.submit ()
    }
	//-->
	</script>
<?php 
define('_FUTBOLME_', 1);
require_once '../urlplus.php';

//imp($_GET);
$division = $_GET['division']??1;


if (isset($_GET['equipo'])){ $equipo_id = $_GET['equipo']; }
if (!isset($equipo_id)){ $equipo_id = $_GET['equipo_id']??0;}

$temporada = $_GET['temporada']??'2018';
$temporada=substr($temporada, 0,4);

$datosTemporada = temporadas($temporada); //campeon y subcampeon de cada liga de ese año.

$nombreTemporada = ' Temporada '.$temporada.'-'.substr(($temporada + 1), 2);

$temporada_id = $_GET['temporada_id']??0;
$partido_id = $_GET['partido_id']??0;

$modelo = $_GET['modelo']??'temporada';


$titulo = 'CAMPEONATO NACIONAL DE LIGA';

if ($temporada_id > 0) {
    $modelo="temporada_id";
    $datosTemporadaId = datosTemporadaN($temporada_id);
    $temporada = $datosTemporadaId['nombreTemporada'];
    $division = $datosTemporadaId['idDivision'];
    $jornadas = $datosTemporadaId['jornadas'];
    $grupo = $datosTemporadaId['grupo'];
    $estilo = $datosTemporadaId['estilo'];
    $fm_torneo_id = $datosTemporadaId['fm_torneo_id'];

    $partidos = partidosHistoricoLiga($temporada_id);
    $clas_temporada = leerClasificacionH($temporada_id, 0, $temporada);
    //imp($clas_temporada);
}

$tituloEquipo="";
if ($equipo_id > 0 && $temporada_id==0) {
    $nombreTemporada="";
    $modelo="equipo";
    if (992 == $equipo_id) { $equipo_id = 369;} //aurrera de ondarroa
    $e = nombreEquipo($equipo_id);
    $equipo_nombre = $e['nombre'];

    $partisyrivales = participacionesEquipoLiga($division, $equipo_id);
    $tituloEquipo = ' Participaciones '.$equipo_nombre;
    if (isset($_GET['m'])) {
        $titulos = titulosLiga($division, $equipo_id);
        $titulo = 'Campeonatos y Subcampeonatos conseguidos por el '.$equipo_nombre.' - '.$titulo;
    }
    if (isset($_GET['enf'])) {
        $equipo1 = $equipo_id;
        $equipo2 = $_GET['equipo_id2'];
        if (992 == $equipo1) { $equipo1 = 369; } //aurrera de ondarroa
        if (992 == $equipo2) { $equipo2 = 369; } //aurrera de ondarroa
        $e = nombreEquipo($equipo2); $equipo_nombre2 = $e['nombre'];
        $enfrentamientos = enfrentamientosLiga($division, $_GET['equipo_id'], $_GET['equipo_id2']);
        $tituloEquipo = ' - Enfrentamientos entre '.$equipo_nombre.' y '.$equipo_nombre2;
    }
    if (isset($_GET['todos'])) {
        $todos=equipoInicio($equipo_id); 
        $tituloEquipo=" ".$equipo_nombre." Todos sus partidos en categoría nacional ";       
    }

}

$tituloPartido="";
if ($partido_id!=0) {
    $modelo="partido";
    $partidoH = partidoLiga($partido_id);
    $division = $partidoH['idDivision']; 
    $temporada = $partidoH['temporada'];   
    $fm_torneo_id = $partidoH['fm_torneo_id'];
    $nombreTemporada = ' Temporada '.$temporada.'-'.substr(($temporada + 1), 2);
    $tituloPartido = ' - jornada '.$partidoH['jornada'].' - '.$partidoH['nomCasa'].' vs '.$partidoH['nomFuera'];
}

switch ($division) {
    case '1': $txtDivision = 'Primera División'; break;
    case '2': $txtDivision = 'Segunda División'; break;
    case '3': $txtDivision = 'Segunda División B'; break;
    case '4': $txtDivision = 'Tercera División'; break;
    default: $txtDivision = 'Primera División'; break;
}

$pest1="";$pest2="";$pest3="";
switch ($modelo) {
    case 'campeones': $pest1 = 'active'; break;
    case 'historica': $pest2 = 'active'; break;
    case 'temporada': $pest3 = 'active'; break;
}



$titulo.=$nombreTemporada.$tituloEquipo.$tituloPartido.' - '.$txtDivision;


//imp($titulo);

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
    <div class="col-xs-12 col-sm-9 col-md-6 nopadding">		


	<div class="col-xs-12 whitebox text-center">
	<h1>HISTÓRICO CAMPEONATO NACIONAL DE LIGA</h1>
	<h2><?php echo $txtDivision; ?></h2>
		<div class="col-xs-8">
		<a href="/historico-liga/clasificacion/primera-division/1">Primera</a> - 
		<a href="/historico-liga/clasificacion/segunda-division/2">Segunda</a> - 
		<a href="/historico-liga/clasificacion/segunda-division-b/3">Segunda B</a> - 
		<a href="/historico-liga/clasificacion/tercera-division/4">Tercera</a> - 
		<a href="/historico/copa/">Copa</a>			
		</div>
		<div class="col-xs-4 pull-left">
		 <form method="get" action="/historico/liga/index.php" name="formula" id="1">
		    <input type="hidden" name="division" value="<?php echo $division; ?>">
		    <select size="1" name="temporada" onChange="return temporada_onchange()">
		    <option value="0">Elige temporada</option>
		    <?php 
            for ($i = 2018; $i > 1927; --$i) {
                if (1939 == $i) { $i = 1935;}
                $t = $i.'-'.substr(($i + 1), -2); ?>
		    <option value="<?php echo $i; ?>">Temporada <?php echo $t; ?></option>
		    <?php
            } ?>
		    </select>
		    </form>
		 </div>
	</div>	

    <div class="col-xs-12 marco text-center">
   
    <div class="clear"></div>
				
	<div class="row nomargin horizontaldivider">
		<ul class="nav nav-tabs celestebox">
	        <li class="<?php echo $pest1?>"><a href="/historico/liga/index.php?modelo=campeones&division=<?php echo $division?>">Cuadro de Honor</a></li>
	        <li class="<?php echo $pest2?>"><a href="/historico/liga/index.php?&modelo=historica&division=<?php echo $division?>">Clasificación Histórica</a></li>			        
	        <li class="<?php echo $pest3?>"><a href="/historico/liga/index.php?&modelo=temporada&temporada=<?php echo $temporada?>&division=<?php echo $division?>"><?php echo $nombreTemporada; ?></a></li>			
         </ul>
	    <div class="tab-content">
	    	<div class="tab-pane active" id="pestana_1">
	    	<?php 
            //imp($modelo);
            
            switch ($modelo) {
            case 'campeones':
            $equipos = campeonesysubcampeonesLiga($division);
            require_once 'pes_campeones.php'; break;
            case 'historica':
            $clasificacion = clasificacionHistorica($division);
            require_once 'pes_clasihistorica.php';break;
            case 'temporada':require_once 'pes_temporada.php';break;
            case 'temporada_id':require_once 'pes_temporadaID.php';break; 
            case 'equipo':require_once 'pes_equipo.php';break;
            case 'partido':require_once 'pes_partido.php';break;
            }
            ?>					
	        </div>
	    </div>
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