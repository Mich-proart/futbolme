<?php 
define('_FUTBOLME_', 1);

$pagina="temporada";




$url = $_SERVER['REQUEST_URI'];
if ('/resultados-directo/torneo' == substr($url, 0, 26)) {
    $u = explode('/', $url);
    $temporada_id = $u[4];
}
require_once 'src/config.php';
//$haz301 = array('?id=');


$temporada_id = $_GET['id']??1;
$valorJornada = $_GET['jornada']??0;
$grupo_id = $_GET['grupo_id']??0;
$activa=1;
if (!is_numeric($temporada_id)) { $temporada_id = 1; }


if ($temporada_id>1000000){
    require_once 'temporadaLive.php';
}

if ($temporada_id==56){
    //require_once 'temporadaFed.php';
}



require_once 'includes/pagTemporada/arranque.php';



$descJornada='';
if (!empty($_GET['jornada'])) {
    $descJornada = ' - Jornada '.$_GET['jornada'];
}

/*
imp($_POST);
imp($_GET);
imp($modelo);
imp($valorJornada);
//imp($partidosJornada);
*/

if($partidosJornada>0) { 
    if ($tipoTorneo==1){
        $descJornada = 'Jornada '.$valorJornada;
    } else {
        $descJornada = 'Nombre fase '.$valorJornada;
    }
}



$colorL = ''; $colorV = '';

$pgTemporada = '/resultados-directo/torneo/'.poner_guion($nombreTorneo).'/'.$temporada_id.'/';
$pgTemporadaJornada = '/resultados-directo/torneo/'.poner_guion($nombreTorneo).'/'.$temporada_id.'/'.$valorJornada;


$temporada=$_SESSION['temporada'];

if ($tipoTorneo==1){
$nombreTemporada="Temporada ".$temporada;
} else {
$nombreTemporada="Edición ".$temporada;
}

if ($categoria_torneo_id==17){ $nombreTorneo.=' - Fútbol Sala'; }

$metaDescripcion = 'Resultados, clasificación, datos, estadísticas, goleadores y zamoras de '.$nombreTorneo.' ('.$temporada.')'.$descJornada;

if (186 == $temporada_id && 1 == $_SESSION['app']) {$nombreTorneo = 'CAMP. DE ESPAÑA - Copa S.M. El Rey';}
//if (1 == $temporada_id) {$nombreTorneo = 'PRIMERA DIVISIÓN LaLiga Santander';}
//if (2 == $temporada_id) {$nombreTorneo = 'SEGUNDA DIVISIÓN LaLiga SmartBank';}
//if (214 == $temporada_id) {$nombreTorneo = 'PRIMERA DIVISIÓN FEMENINA Liga Iberdrola';}
//if (1720 == $temporada_id) {$nombreTorneo = 'SEGUNDA DIVISIÓN FEMENINA - Grupo Norte Reto Iberdrola';}
//if (1721 == $temporada_id) {$nombreTorneo = 'SEGUNDA DIVISIÓN FEMENINA - Grupo Sur Reto Iberdrola';}






$path = './json/directos.json';
$json = file_get_contents($path);
$directos = json_decode($json, true);
$directosTemporada = array();
foreach ($directos as $directo) {
    if ($directo['temporada_id'] == $temporada_id) {
        $directosTemporada[] = $directo;
    }
}
unset($directos);
$directos = $directosTemporada;
unset($directosTemporada);
$c_directos = count($directos);

$titulo = $nombreTorneo.' - '.$nombreTemporada.' - '.$descJornada;    

//imp($_GET);
//imp($titulo);
?>

<?php require_once 'includes/head.php'; ?>
	<title><?php echo $titulo; ?> <?php echo $_GET['modelo']??''?></title>
</head>

<?php 
require_once 'includes/contenedorSup.php'; 

?>
<div class="col-xs-12 nopadding whitebox clear">
		<div class="col-xs-2">
            <div class="h10 clear"></div>
            <div class="h10 clear"></div>
		<?php if ($comunidad_id > 1) {
                 $nombrePais = $nombreComunidad;
            if (10 == $comunidad_id && 1 == $categoria_torneo_id) {
                $comunidad_id = 55;
                $nombrePais = $nombrePais.' y Melilla';
            }
            if (11 == $comunidad_id && 1 == $categoria_torneo_id) {
                $comunidad_id = 56;
                $nombrePais = $nombrePais.' y Ceuta';
            } ?>
        	<div class="comunidad flag<?php echo $comunidad_id; ?>" style="border-bottom: 1px solid black"></div>
        		<?php
        } else { ?>
			<div class="pais flag<?php echo $idPais; ?>b" style="border-bottom: 1px solid black"></div>
		<?php  }  ?>
		</div>
		
		<div class="col-xs-10 nopadding boldfont">		
			<h2 class="hidden-xs"><?php echo $nombreTorneo; ?></h2>
            <h4 class="visible-xs"><?php echo $nombreTorneo; ?></h4>
			<span class="txt11"><?php echo $nombrePais; ?></span>
		</div>
</div>
<?php

//imp($tipoTorneo);die;
//imp($partidos);


        
switch ($tipoTorneo) {
    case '1':
        require_once 'includes/pagTemporada/arranque2.php';

        require_once 'includes/pagTemporada/liga.php';

        break;

    case '2':
        
        if (216 != $temporada_id) {
            require_once 'includes/pagTemporada/eliminatorio.php';
        } else {
            require_once 'includes/pagTemporada/mundial.php';
            $pagina="mundial";
        }

        break;


    case '3':
        require_once 'includes/temporada/eliminatorioLargo.php';
        break;
    case '4':
        require_once 'includes/pagTemporada/eliminatorioCorto.php';
        break;
    case '5':
        require_once 'includes/pagTemporada/amistoso.php';
        break;
    case '6':
        require_once 'includes/temporada/eliminatorioHis.php';
        break;
    case '7':
        require_once 'includes/pagTemporada/eliminatorioLargoH.php';
        break;
    case '8':
        require_once 'includes/pagTemporada/eliminatorioPromocion.php';
        break;

} ?>


<script type="text/javascript">
    
	<?php if (count($directos) > 0) {
    ?>
		var dt = new Date();
        var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds(); 
        $.ajax({
        type: 'GET',
        url: "/temporada_ajax.php",
        data: "id="+<?php echo $temporada_id; ?>,      
        })
        .done(function( data ) {
            $('.bloque-directos').html(data);
        });
        $('.actua').html('Actualizado a las '+time);
	
    	setInterval(function(){
        var dt = new Date();
        var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds(); 
            $.ajax({
            type: 'GET',
            url: "/temporada_ajax.php",
            data: "id="+<?php echo $temporada_id; ?>,      
            })
            .done(function( data ) {
                $('.bloque-directos').html(data);
            });
            $('.actua').html('Actualizado a las '+time); 
        },30000);    
	
	
		setInterval(function(){
		    $.ajax({
		    type: 'GET',
		    url: "/srcPagajax/clasificacion.php",
		    data: "id="+<?php echo $temporada_id; ?>,      
		    })
		    .done(function( data ) {
		        $('.bloque-clasificacion').html(data);
		    });
		},30000);

    <?php
} ?>  

	

    <?php if (1 == $desarrollo) {
        ?>
		cuadro_honor(<?php echo $temporada_id; ?>);
	<?php
    } ?>

	

<?php if (7 == $tipoTorneo) {
        ?> 
	$('#fasesh').on('change', function (event) {
    	var fase = $('#fasesh').val();
    	console.log(fase);

    	window.location.href = "/resultados-directo/torneo/<?php echo poner_guion($nombreTorneo); ?>/<?php echo $temporada_original; ?>/" + fase + "&idH7=<?php echo $htid; ?>";
    })

    $( document ).ready(function(){
       // $('.faseEliminatorio').not('#fase<?php echo $jornadaActiva; ?>').hide();
        $('.clasificacionFase').not('#clasificacionFase<?php echo $jornadaActiva; ?>').hide();
    })

    $('.grupo').on('click', function (event) {
    	var grupo = $(this).attr('data-id');
    	var ngrupo = $(this).text();
    	console.log(ngrupo);
    	$('#grupo_id').val(grupo);
    	$('#nombreprimerGrupo').html(ngrupo);
    	$('.grupoEliminatorio').show();
    	$('.grupoEliminatorio').not('.grupo' + grupo).hide();
    	$('.grupoEliminatorio .grupo' + grupo).show();
    	$('.clasificacionGrupo').show();
    	$('.clasificacionGrupo').not('#clasificacionGrupo' + grupo).hide();
    	$('.clasificacionGrupo #clasificacionGrupo' + grupo).show();
    })
<?php
    } ?>

<?php if (2 == $tipoTorneo or 8 == $tipoTorneo) {
        ?>	
    $( document ).ready(function(){
       // $('.faseEliminatorio').not('#fase<?php echo $jornadaActiva; ?>').hide();
        $('.clasificacionFase').not('#clasificacionFase<?php echo $jornadaActiva; ?>').hide();
    })

    $('#fases').on('change', function (event) {
    	var fase = $('#fases').val();
    	window.location.href = "/resultados-directo/torneo/<?php echo poner_guion($nombreTorneo); ?>/<?php echo $temporada_id; ?>/" + fase;
    })
    
    $('.grupo').on('click', function (event) {
    	var grupo = $(this).attr('data-id');
    	var ngrupo = $(this).text();
    	console.log(ngrupo);
    	$('#grupo_id').val(grupo);
    	$('#nombreprimerGrupo').html(ngrupo);
    	$('.grupoEliminatorio').show();
    	$('.grupoEliminatorio').not('.grupo' + grupo).hide();
    	$('.grupoEliminatorio .grupo' + grupo).show();
    	$('.clasificacionGrupo').show();
    	$('.clasificacionGrupo').not('#clasificacionGrupo' + grupo).hide();
    	$('.clasificacionGrupo #clasificacionGrupo' + grupo).show();
    })
<?php
    } ?>
</script>

<div id="checkinfed"></div>
<?php 

unset($directos);
unset($datos);
unset($torneo);
unset($fichajes);
unset($clasificacion);
unset($equiposTw);



require_once 'includes/contenedorInf.php';



?>

<script>
<?php 
/*if (isset($paraFed)){    
    $temporada_id = $paraFed['temporada_id'];
    $fase = $paraFed['fase']; 
    $c = $paraFed['c'];
    $g = $paraFed['g'];
    $j = $paraFed['j'];
    $co = $paraFed['co'];

    if ($co>1 && $co!=5 && $co!=13){ 
        $f='json/temporada/'.$temporada_id.'/partidosFed_'.$j.'.json';

        $diaN = date('N');
        if ($diaN<6){ $cachetime = 86400; } else { $cachetime = 3600; }
        if (@file_exists($f)) { 
            $fichero_time = @filemtime($f);
            //imp((time() - $fichero_time));
            if ((time() - $fichero_time)> $cachetime) { ?>
                
                extraerDatosFed(<?php echo $temporada_id?>,<?php echo $fase?>,<?php echo $c?>,<?php echo $g?>,<?php echo $j?>,<?php echo $co?>,1);
               
            <?php }        
        } else { ?>
           
            extraerDatosFed(<?php echo $temporada_id?>,<?php echo $fase?>,<?php echo $c?>,<?php echo $g?>,<?php echo $j?>,<?php echo $co?>,2);
            
        <?php }
    }
} */?>


function extraerDatosFed(temporada_id,fase,c,g,j,co,x){

  //console.log(temporada_id);
  //console.log(c);
  //console.log(g);
  //console.log(j);
        
   $.ajax({
        type: 'POST',
        url: '/src/funciones/extraerDatosFed.php',
        data: "temporada_id="+temporada_id+"&fase="+fase+"&c="+c+"&g="+g+"&j="+j+"&co="+co,
        success: function(data){          
         console.log(data);
        }
    });
    return false;
} 
</script>