<?php
define('_PANEL_', 1);
require_once 'includes/config.php'; //include funciones,consultas, post y fechas
require_once 'includes/post.php';
require_once 'includes/get.php';
require_once 'includes/head.php';
?>
<body>

<?php

$tipo_torneo = 1;
$temporada_id = $_POST['temporada_id']??1;

$ver_equipos = $ver_equipos??0;

$resultado=crearCalendarioTemporada($temporada_id);


    $nombre_temporada = $resultado['nombre'];
    $temporada_nombre=$nombre_temporada;
    $torneo_id = $resultado['torneo_id'];
    $nombre_torneo = $resultado['nombre_torneo'];
    $categoria_id = $resultado['categoria_id'];
    $categoria_torneo = $resultado['categoria_torneo_id'];
    $pais_id = $resultado['pais_id'];
    $comunidad_id = $resultado['comunidad_id'];

    $categoria_n = $resultado['nombre_categoria'];
    $pais_n = $resultado['nombre_pais'];
    $comunidad_n = $resultado['nombre_comunidad'];
    $betsapi = $resultado['betsapi'];
    $visible = $resultado['visible'];
    $jornadas = $resultado['jornadas'];


?>

<body>

<div style="float:left; width:100%; background-color: #AED6F1; padding:5px">
   <div id="mensaje" style="text-align:right; background-color:gainsboro"></div>
       	
       	
        <div id="listaTorneos" style="float:left; width:90%">
            <?php
            $lista_torneos = listarTorneosPorCategoria($tipo_torneo, $categoria_torneo,0); 

            ?>
            <select name="temporada" onchange="crearCalendario(this.value)">
            <option value="0">Competiciones</option>
            <?php foreach ($lista_torneos[0] as $fila) {

                if ($fila['id']==$temporada_id){ $selected="selected"; } else { $selected=""; }
                echo "<option value='".$fila['id']."' ".$selected.">".$fila['nombrePais'].' - '.$fila['nombre'].' ('.$fila['id'].')</option>';
            } ?>
            <option value="0">-----no activos</option>
            <?php foreach ($lista_torneos[1] as $fila) {
                echo "<option value='".$fila['id']."'>".$fila['nombrePais'].' - '.$fila['nombre'].' ('.$fila['id'].')</option>';
            } ?>
            </select>
         - <span onclick="borrarJson(<?php echo $temporada_id?>)" style="cursor:pointer" id="borrar-jsons">Borrar jsons </span>
          - <a href="/temporada.php?id=<?php echo $temporada_id?>" target="_blank">Ver temporada</a> -
          <span onclick="refrescarTemporada(<?php echo $temporada_id?>)" style="cursor:pointer" class="boldfont" style="font-size: 30px">Actualizar</span>

         



        <form method="POST" action="#" onsubmit="generarCalendarioSubmit (event, $(this).serialize(),<?php echo $temporada_id?>)" class="pull-right">
        Temporada ID:<input type="text" name="temporada" value="<?php echo $temporada_id?>" size="2"> -
        Jornadas:<select name="jornadas" required>
          <option value="0">Jornadas</option>
          <option value="6">6</option>
          <option value="10">10</option>
          <option value="14">14</option>
          <option value="18">18</option>
          <option value="22">22</option>
          <option value="26">26</option>
          <option value="30">30</option>
          <option value="34">34</option>
          <option value="38">38</option>
          <option value="42">42</option>
          <option value="46">46</option>

        </select>
        <input type="hidden" name="tipo_torneo" value="<?php echo $tipo_torneo; ?>">
        <input type="hidden" name="categoria_torneo" value="<?php echo $categoria_torneo; ?>">
        <input type="submit" name="generar_calendario" value="generar_calendario">
        </form>
        </div>   
</div>         

<div id="listaDatos" style="float:left; width:100%; background-color: #F2F4F4;">
      <?php //include 'federacion/recursos/verTorneo.php'?>
<?php

$equiposTorneo=Xequipos_temporada($temporada_id);

$partidosLiga = obtenerPartidosLiga($temporada_id);

$calendario=obtenerCalendario($temporada_id);

if (!empty($partidosLiga) && empty($calendario)){ ?>
<div class="text-center">
<?php include 'includes/crearCalendario/configurarCalendario.php'?>
<?php }?>

<table class="table">
<tr>

<td valign="top">
  <h3><a href="federacion/recursos/equiposTemporada.php?temporada_id=<?php echo $temporada_id?>" target="_blank">Equipos</a></h3>
  <div id='crear-equipos'>
  <?php include 'includes/crearCalendario/crear-equipos.php';?>
  </div>
</td>

<td valign="top">
<?php require_once 'includes/crearCalendario/crear-calendario.php';?>
</td>

<td valign="top">
<?php 
require_once 'includes/crearCalendario/crear-jornadas.php';?> 
</td>
</tr></table>
</div>
<?php require_once 'includes/ajax.php';?>        
</body>
</html>


