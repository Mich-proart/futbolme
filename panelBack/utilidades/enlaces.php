<?php 
$static_v = 6; 
define('_FUTBOLME_', 1);

require_once '../../src/consultas.php';
require_once '../../src/funciones.php';



?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Enlaces de gestión</title>
<link href="/css/bootstrap.min.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/main.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/style.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<noscript><link rel="stylesheet" href="/css/allcss.css?v=<?php echo $static_v; ?>"></noscript>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/js/ajax.js?=<?php echo $static_v; ?>"></script>
</head>

<body>
  
  <div style="width: 100%; float:left; padding:5px; background-color: white">
      <div class="col-xs-3 marco text-center">
        <h3>Partidos pendientes</h3>
        <?php for ($i=1; $i < 19; $i++) { 
          if ($i==4 || $i==12) { continue; }?>
          <span style="border:10px"><a href="/panelCargador/repasadorCom.php?c=<?php echo $i?>" target="_blank"><?php echo $i?></a></span><br />
        <?php  } ?>
      </div>

      <div class="col-xs-3 marco text-center">
        <h3>Números de actas</h3>
        <?php for ($i=2; $i < 20; $i++) { 
          if ($i==5 || $i==13) { continue; }?>
          <span style="border:10px"><a href="/panelCargador/actasPendientes.php?comunidad_id=<?php echo $i?>" target="_blank"><?php echo ($i-1)?></a></span><br />
        <?php  } ?>
      </div>

      <div class="col-xs-3 marco text-center">
        <h3>Actas</h3>

      </div>

      <div class="col-xs-3 marco text-center">
        <h3>Comprobador</h3>
        <?php for ($i=2; $i < 20; $i++) { 
          if ($i==5 || $i==13) { continue; }?>
          <span style="border:10px"><a href="/panelCargador/comprobarResultados.php?comunidad_id=<?php echo $i?>" target="_blank"><?php echo ($i-1)?></a></span><br />
        <?php  } ?>

      </div>

      <div class="col-xs-3 marco text-center">
        <h3>Asalto</h3>
        <?php for ($i=2; $i < 20; $i++) { 
          if ($i==5 || $i==13) { continue; }?>
          <span style="border:10px"><a href="/panelCargador/asaltoComunidad.php?comunidad_id=<?php echo $i?>" target="_blank"><?php echo ($i-1)?></a></span><br />
        <?php  } ?>
      </div>
  
 </div>
</body>
</html>

