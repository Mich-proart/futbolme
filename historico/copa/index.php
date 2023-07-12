<?php 
define('_FUTBOLME_', 1);
require_once '../urlplus.php';
$torneo_id = 192;
$temporada_original = 186;
$titulo = 'CAMPEONATO DE ESPAÑA - COPA DE S.M. EL REY - Desde 1902 - ';
//imp($_GET);

$temporada_id = $_GET['temporada_id']??0;
$partido_id = $_GET['partido_id']??0;

$modelo = $_GET['modelo']??'campeones';
$nombreTemporada = $nombreTemporada??'';
$equipoNombre = $equipoNombre??'';


$tituloEquipo="";
if (isset($_GET['eq'])){ $equipo_id = $_GET['eq']; }
if (!isset($equipo_id)){ $equipo_id = $_GET['equipo_id']??0;}

if ($temporada_id > 0) {
    $modelo="temporada_id";
    $partidos = partidosHistorico($temporada_id);
    $nombreTemporada = $partidos[0]['nombre_temporada'];
    if ($equipo_id>0){
        if (992 == $equipo_id) { $equipo_id = 369;} //aurrera de ondarroa
        $e = nombreEquipo($equipo_id);
        $equipo_nombre = $e['nombre'];
        $tituloEquipo = ' - '.$equipo_nombre;    
    }
}


if ($equipo_id > 0 && $temporada_id==0) {
    $nombreTemporada="";
    $modelo="equipo";
    if (992 == $equipo_id) { $equipo_id = 369;} //aurrera de ondarroa
    $e = nombreEquipo($equipo_id);
    $equipo_nombre = $e['nombre'];
    $partisyrivales = participacionesEquipo($torneo_id, $_GET['equipo_id']);
    $tituloEquipo = ' Participaciones '.$equipo_nombre;
    if (isset($_GET['m'])) {
        $titulos = titulos($torneo_id, $_GET['equipo_id']);
        $titulo = 'Campeonatos y Subcampeonatos conseguidos por el '.$equipo_nombre.' - '.$titulo;
    }
    if (isset($_GET['enf'])) {
        //imp($_GET);

        $equipo1 = $_GET['equipo_id'];
        $equipo2 = $_GET['equipo_id2'];
        $e = nombreEquipo($_GET['equipo_id2']);
        $enfrentamientos = array();
        $equipo_nombre2 = '';
        if (isset($e)) {
            $equipo_nombre2 = $e['nombre'];
            $enfrentamientos = XenfrentamientosAgrupar2(4, $torneo_id, $_GET['equipo_id'], $_GET['equipo_id2']);
            $titulo = 'Enfrentamientos entre '.$equipo_nombre.' y '.$equipo_nombre2.' - '.$titulo;
        }
    }

}

$tituloPartido="";
if ($partido_id>0) {
    $modelo="partido";
    $partidoH = X2partidoH($partido_id);
    $nombreTemporada = $partidoH['nombreTemporada'];
    $tituloPartido = ' - '.$partidoH['fase'].' - '.$partidoH['localCorto'].' vs '.$partidoH['visitanteCorto'];
}



$pest1="";$pest2="";$pest3="";
switch ($modelo) {
    case 'campeones': $pest1 = 'active'; break;
    case 'finales': $pest2 = 'active'; break;
    case 'participantes': $pest3 = 'active'; break;
}


$titulo.=$nombreTemporada.$tituloEquipo.$tituloPartido;
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
	<div class="col-xs-12 col-sm-9 col-md-6 whitebox">    	

		<div class="row nomargin" style="text-align:center">
			<h1>HISTÓRICO CAMPEONATO DE ESPAÑA - COPA DE S.M. EL REY</h1>
			<div class="col-xs-6 col-md-6 col-lg-6">
			<p>Este torneo se disputa anualmente entre los mejores clubes de España y es organizado por la Real Federación Española de Fútbol.</p>
			<p>Se creó en 1903 a raíz del éxito de la Copa de la Coronación, disputada un año antes y que en futbolme también incluimos como parte del histórico. 
			Es el torneo nacional de fútbol más antiguo de España.</p>
			</div>  
			<div class="col-xs-6 col-md-6 col-lg-6" style="text-align:left">
			<b>Denominaciones: </b>
			<br />Copa de Su Majestad el Rey (1903 - 1932). 
			<br />Copa de Su Excelencia el Presidente de la República  (1932 - 1936)
			<br />Copa de Su Excelencia el Generalísimo (1939 - 1976)
			<br />Copa de Su Majestad el Rey (1976 - ? )
			</div>					
		</div>
		

		<div class="row nomargin horizontaldivider">
							        
		 

<div class="col-xs-12">
    <ul class="nav nav-tabs celestebox">
        <li class="<?php echo $pest1?>"><a href="/historico-copa">Cuadro de Honor</a></li>
        <li class="<?php echo $pest2?>"><a href="/historico/copa/index.php?modelo=finales">Las finales</a></li>
        <li class="<?php echo $pest3?>"><a href="/historico/copa/index.php?modelo=participantes">Los participantes</a></li>
    </ul>
    
                <?php 

                switch ($modelo) {
                case 'campeones':
                $equipos = campeonesysubcampeones($torneo_id);
                require_once 'pes_copa_campeones.php'; break;
                case 'finales':
                $finales = finales($torneo_id);
                require_once 'pes_copa_finales.php';break;
                case 'participantes':
                $participantes = participaciones($torneo_id);
                require_once 'pes_copa_participantes.php';break;
                case 'temporada_id':require_once 'pes_copa_temporadaID.php';break; 
                case 'equipo':require_once 'pes_copa_equipo.php';break;
                case 'partido':require_once 'pes_copa_partido.php';break;
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