<?php
define('_PANEL_', 1);
require_once '../includes/config.php'; //include funciones,consultas, post y fechas
require_once '../includes/head.php';
?>

</head>
<body>
<div style="float: left;">

<?php 
$paises = listarPaises();
$pais_id = $_GET['pais_id']??60;

?>
<div style="float: left;">
<select id="selector-paises" name="temporada" onchange="cargarClubes(this.value)">
<option value="0">Paises</option>
<?php foreach ($paises as $fila) {
    echo "<option value='".$fila['id']."-0-0'>
	".$fila['nombre_federacion'].' - '.$fila['nombre'].' ('.$fila['id'].')</option>';
} ?>
</select></div>

<?php

if ($pais_id==60){   
    $comunidades = comunidades(); ?>
    <div style="float: left;">
    <select id="selector-comunidad" name="temporada" onchange="cargarClubes(this.value)">
      <option value="0">Elige comunidad</option>
      <option value="1">Sin comunidad</option>
      <?php foreach ($comunidades as $key => $value) {
      if ($value['id']==1) { continue; }  ?>
      <option value="60-<?php echo $value['id']?>-0"><?php echo $value['nombre']?></option>  
      <?php  } ?>
      </select>
  </div>
 <?php  } ?>

<div style="float: left; padding-left: 50px;">
<form onsubmit="clubRFEF(event, $(this).serialize())" method="post">
<input type="text" name="codigoRFEF" size="8">
<input type="submit" name="buscar" value="Buscar club por código RFEF">
</form>
</div>

</div>


<div id="listaClubes" style="float:left; width:100%">


</div>
</body>

