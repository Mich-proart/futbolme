<?php 
define('_FUTBOLME_', 1);
require_once 'src/config.php';

if (isset($_GET['pest'])) {
    $pestana = $_GET['pest'];
} else {
    $pestana = 'nacional';
}
switch ($pestana) {
case 'nacional':
    $pesNac = 'active'; $pesAut = ''; $pesJuv = ''; $pesFem = ''; $categoria_id = 1; $t = 'Categoría Nacional';
    break;
case 'autonomicas':
    $pesNac = ''; $pesAut = 'active'; $pesJuv = ''; $pesFem = ''; $categoria_id = 4; $t = 'Autonómicas';
    break;
case 'juveniles':
    $pesNac = ''; $pesAut = ''; $pesJuv = 'active'; $pesFem = ''; $categoria_id = 5; $t = 'Juveniles';
    break;
case 'femenino':
    $pesNac = ''; $pesAut = ''; $pesJuv = ''; $pesFem = 'active'; $categoria_id = 7; $t = 'Fútbol Femenino';
    break;
default:
    $pesNac = 'active'; $pesAut = ''; $pesJuv = ''; $pesFem = ''; $categoria_id = 1; $t = 'Categoría Nacional';
    break;
}
$ascensos = ascensos($categoria_id); ?>

<?php require_once 'includes/head.php'; ?>
    <title>Pizarra de ascensos y descensos - <?php echo $t; ?></title>

</head>
<?php require_once 'includes/contenedorSup.php'; ?>                
<div class="row nomargin whitebox" style="margin-top:10px;">
    <ul class="nav nav-tabs celestebox txt11" role="tablist">
        <li class="<?php echo $pesNac; ?>"><a href="?pest=nacional">Nacional</a></li>
        <li class="<?php echo $pesFem; ?>"><a href="?pest=femenino">Femenino</a></li> 
        <li class="<?php echo $pesAut; ?>"><a href="?pest=autonomicas">Autonómicas</a></li>
        <li class="<?php echo $pesJuv; ?>"><a href="?pest=juveniles">Juveniles</a></li> 
    </ul>

    <div class="tab-content">
        <?php 
        //imp($ascensos);

        switch ($pestana) {
        case 'nacional':
            require_once 'includes/ascensos/nacional.php';
            break;
        case 'autonomicas':
            require_once 'includes/ascensos/autonomica.php';
            break;
        case 'juveniles':
            require_once 'includes/ascensos/juvenil.php';
            break;
        case 'femenino':
            require_once 'includes/ascensos/femenino.php';
            break;
        }?> 
    </div>
</div>
<?php require_once 'includes/contenedorInf.php'; ?>