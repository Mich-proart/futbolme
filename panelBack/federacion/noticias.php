<?php 

header('Location: https://futbolme.com/');

die;


define('_FUTBOLME_', 1);

require_once 'src/config.php';

$titulo = 'Madrid y Barça: su pugna por el título de Liga... ¿Y por Mbappé?. FUTBOLME.COM';
$metaDescripcion = 'Noticias de la liga española - Futbolme.com ';

require_once 'includes/head.php'; ?>

	<title><?php echo $titulo; ?></title>
 <link href="/css/tablesorter/blue/style.css" rel="stylesheet">

</head>
<?php require_once 'includes/contenedorSup.php'; ?>
							

<div class="col-xs-12 whitebox nopadding">
    
    <div class="clear col-xs-12 one-bordergrey-vert">
        <?php require_once 'json/noticias/20200514/mayo.php'; ?>
    </div>
</div>
    

<?php require_once 'includes/contenedorInf.php'; ?>

