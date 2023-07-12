<?php
$static_v = 12; 
define('_FUTBOLME_', 1);
?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Clubs </title>
<link href="/css/bootstrap.min.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/main.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/style.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<noscript><link rel="stylesheet" href="/css/allcss.css?v=<?php echo $static_v; ?>"></noscript>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="ajaxclub.js?=<?php echo $static_v; ?>"></script>
</head>
<?php 
require_once '../../src/consultas.php';

if (isset($_GET['pais_id'])) {
    $pais_id = $_GET['pais_id'];
} else {
    $pais_id = 60;
}

?>
<body>
<?php
$paises = listarPaises();
?>

<select id="selector-paises" name="temporada" onchange="cargar_clubes(this.value)">
<option value="0">Paises</option>
<?php foreach ($paises as $fila) {
    echo "<option value='".$fila['id']."-0-0'>
	".$fila['nombre_federacion'].' - '.$fila['nombre'].' ('.$fila['id'].')</option>';
} ?>
</select>

<?php

if ($pais_id==60){   
    $comunidades = listarComunidades(); ?>
    <select id="selector-comunidad" name="temporada" onchange="cargar_clubes(this.value)">
      <option value="0">Elige comunidad</option>
      <option value="1">Sin comunidad</option>
      <?php foreach ($comunidades as $key => $value) {
      if ($value['id']==1) { continue; }  ?>
      <option value="60-<?php echo $value['id']?>-0"><?php echo $value['nombre']?></option>  
      <?php  } ?>
      </select>
 <?php  } ?>

<div id="listaClubes" style="float:left; width:100%">


</div>
</body>

