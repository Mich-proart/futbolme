<?php 
$tiempo_inicio = microtime(true);
define('_FUTBOLME_', 1);
require_once 'src/config.php';
$pagina = 'partido';
$partido_id=$_GET['id']??0;
if ($partido_id==0) { header('Location:/'); die(); }
$modelo = $_GET['modelo']??'Partido';
require_once 'includes/pagPartido/arranque.php';
$pgPartido = '/resultados-directo/partido/'.poner_guion($partido['local']).'-'.poner_guion($partido['visitante']).'/'.$partido_id;
$pgPartido2 = '/partido.php?id='.$partido_id;
$titulo = $partido['local'].' - '.$partido['visitante'].' :: '.$partido['nombreTemporada'].' '.$modelo;
$metaDescripcion = $titulo;
require_once 'includes/head.php'; 
?>
	<title><?php echo $titulo; ?></title>
</head>
<?php 
require_once 'includes/contenedorSup.php'; ?>
    <div class="col-xs-12 whitebox nopadding">
    <?php require_once 'includes/pagPartido/partido1.php'; ?>
    </div>
    

 <?php require_once 'includes/contenedorInf.php'; 

 if ($modelo=='Partido' && $partido['estado_partido']>1) { ?>
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

unset($partido);
?>     
