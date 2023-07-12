
<?php 
$static_v =9; 
define('_FUTBOLME_', 1);
require_once '../src/consultas.php';
require_once '../src/funciones.php';
?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<link href="/css/bootstrap.min.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/main.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/style.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<noscript><link rel="stylesheet" href="/css/allcss.css?v=<?php echo $static_v; ?>"></noscript>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/js/ajax.js?=<?php echo $static_v; ?>"></script>
</head>
<body>


  <?php

$tipo_torneo = $_GET['tipo_torneo']??1;
$categoria_torneo = $_GET['categoria_torneo']??17;

if ($categoria_torneo!=17){ echo 'No tiene permisos para ver está página'; die; }
$temporada_id = $_GET['temporada_id']??1617;
$modo = $_GET['modo']??null;
$ver_equipos = $_GET['ver_equipos']??0;

$files = glob('../json/temporada/'.$temporada_id.'/*.*');
foreach ($files as $file) {
    echo $file.'<br />';
    if ($modo=='borrarFicheros'){ unlink($file);}
}

  if (isset($_GET['modo'])) {
      $mysqli = conectar();

    if ('grabar_partido' == $_GET['modo']) {
          $consulta = 'INSERT INTO partido (temporada_id, estado_partido, goles_local, goles_visitante, fecha, hora_prevista, jornada, equipoLocal_id, equipoVisitante_id)
    VALUES 
    ('.$_GET['temporada_id'].','.$_GET['estado_partido'].','.$_GET['goles_local'].','.$_GET['goles_visitante'].", '".$_GET['fecha']."', '".$_GET['hora_prevista']."',198, ".$_GET['equipoLocal_id'].', '.$_GET['equipoVisitante_id'].')                 
      ';
          $consulta = mysqli_query($mysqli, $consulta);
          echo $consulta;
      }

      if ('insertar_equipo' == $_GET['modo']) {
          $consulta = 'INSERT INTO temporada_equipo (temporada_id,equipo_id) VALUES ('.$_GET['temporada_id'].', '.$_GET['equipo_id'].')';
          $consulta = mysqli_query($mysqli, $consulta);
          echo 'ok';
          die;
      }

      if ('quitar_equipo' == $_GET['modo']) {
          $consulta = 'DELETE FROM temporada_equipo WHERE temporada_id='.$_GET['temporada_id'].' AND equipo_id='.$_GET['equipo_id'];
          $consulta = mysqli_query($mysqli, $consulta);
          echo 'ok';
          die;
      }
  }

  if (isset($_POST['modo'])) {    
    $mysqli = conectar();
    if ('borrar_calendario' == $_POST['modo']) {
        $sql = 'DELETE FROM partido WHERE temporada_id='.$_POST['temporada_id'];            
        $resultadoSQL = mysqli_query($mysqli, $sql); 
       
    }

        
    if ('agregar_equipo' == $_POST['modo']) {
        $consulta = 'INSERT INTO temporada_equipo (temporada_id,equipo_id) VALUES ('.$_POST['temporada_id'].', '.$_POST['e_agregado'].')';
        $consulta = mysqli_query($mysqli, $consulta);
    }

    if ('sustituir_fechas' == $_POST['modo']) {
        $id_fechas = $_POST['id_fechas'];
        $temporada_id = $_POST['temporada_id'];
        $consulta = 'SELECT distinct fecha, jornada FROM partido WHERE temporada_id='.$id_fechas;
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

        foreach ($resultado as $fila) {
          
            $consulta = "UPDATE partido SET fecha='".$fila['fecha']."'
    WHERE temporada_id=".$temporada_id.' AND jornada='.$fila['jornada'];
            $resultadoSQL = mysqli_query($mysqli, $consulta);
        
        }
        
    }
    if ('sustituir_equipo' == $_POST['modo']) {
        $e_entrante = $_POST['e_entrante'];
        $e_saliente = $_POST['e_saliente'];

        if (null != $e_saliente) {
            $consulta = 'UPDATE temporada_equipo set equipo_id='.$e_entrante.' 
    WHERE temporada_id='.$temporada_id.' AND equipo_id='.$e_saliente;
            $resultadoSQL = mysqli_query($mysqli, $consulta);
        }
        $consulta = 'UPDATE partido set equipoLocal_id='.$e_entrante.' 
    WHERE temporada_id='.$temporada_id.' AND equipoLocal_id='.$e_saliente;
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $consulta = 'UPDATE partido set equipoVisitante_id='.$e_entrante.' 
    WHERE temporada_id='.$temporada_id.' AND equipoVisitante_id='.$e_saliente;
        $resultadoSQL = mysqli_query($mysqli, $consulta);

        echo '<h4>Equipo sustituido correctamente</h4>';
    }
     
  $_GET['tipo_torneo']=$_POST['tipo_torneo'];
  $_GET['temporada_id']=$_POST['temporada_id'];
  $_GET['categoria_torneo']=$_POST['categoria_torneo'];        
      
}


    $campos = 't.id, t.torneo_id, t.nombre, t.id_original, tor.betsapi, tor.visible,
    tor.nombre nombre_torneo,
    tor.categoria_id, 
    (SELECT nombre FROM categoria WHERE id=tor.categoria_id) nombre_categoria, 
    tor.pais_id, 
    (SELECT nombre FROM pais WHERE id=tor.pais_id) nombre_pais, 
    tor.comunidad_id,
    (SELECT nombre FROM comunidad WHERE id=tor.comunidad_id) nombre_comunidad
    ';
    $tabla = ' temporada t INNER JOIN torneo tor ON t.torneo_id=tor.id';
    $condicion = ' WHERE t.id='.$temporada_id;
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$condicion;
    //echo $consulta;die;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);

    $nombre_temporada = $resultado['nombre'];
    $torneo_id = $resultado['torneo_id'];
    $nombre_torneo = $resultado['nombre_torneo'];
    $categoria_id = $resultado['categoria_id'];
    $pais_id = $resultado['pais_id'];
    $comunidad_id = $resultado['comunidad_id'];

    $categoria_n = $resultado['nombre_categoria'];
    $pais_n = $resultado['nombre_pais'];
    $comunidad_n = $resultado['nombre_comunidad'];
    $betsapi = $resultado['betsapi'];
    $visible = $resultado['visible'];


    $sql="SELECT jornadas FROM liga WHERE id=".$torneo_id;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
    $jornadas=$resultado['jornadas'];


?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title> 
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/js/ajax.js?=<?php echo $static_v; ?>"></script>
</head>
<body>
<div style="float:left; width:100%; background-color: #AED6F1; padding:5px">
   <div id="mensaje" style="text-align:right; background-color:gainsboro"></div>
       	<div id="categorias" style="float:left; width:10%">
      		<select name="categoria" onchange="location='?categoria_torneo='+this.value+'&tipo_torneo=<?php echo $tipo_torneo; ?>'"> 
      		<option value="0" selected>Categorias</option>
      		<option value="17">SALA</option>
      		
      		</select>
      	</div>
       	
        <div id="listaTorneos" style="float:left; width:90%">
            <?php
            $lista_torneos = listarTorneosPorCategoria($tipo_torneo, $categoria_torneo,0); 

            ?>
            <select name="temporada" onchange="location='?temporada_id='+this.value+'&categoria_torneo=<?php echo $categoria_torneo; ?>&tipo_torneo=<?php echo $tipo_torneo; ?>'">
            <option value="0">Competiciones</option>
            <?php foreach ($lista_torneos[0] as $fila) {
                echo "<option value='".$fila['id']."'>".$fila['nombrePais'].' - '.$fila['nombre'].' ('.$fila['id'].')</option>';
            } ?>
            <option value="0">-----no activos</option>
            <?php foreach ($lista_torneos[1] as $fila) {
                echo "<option value='".$fila['id']."'>".$fila['nombrePais'].' - '.$fila['nombre'].' ('.$fila['id'].')</option>';
            } ?>
            </select>
        </div> 

        <div><a href="?modo=borrarFicheros&temporada_id=<?php echo $temporada_id?>&tipo_torneo=<?php echo $tipo_torneo?>&categoria_torneo=<?php echo $categoria_torneo?>">Borrar ficheros json</a></div>   
</div>         

<div id="listaDatos" style="float:left; width:100%; background-color: #F2F4F4;">
<?php

$campos = 'te.equipo_id, e.nombre, te.grupo, e.betsapi, e.slug,
(SELECT count(id) FROM partido WHERE equipoLocal_id=te.equipo_id AND temporada_id='.$temporada_id.') pL, 
(SELECT count(id) FROM partido WHERE equipoVisitante_id=te.equipo_id AND temporada_id='.$temporada_id.') pV 
';
$tabla = ' temporada_equipo te INNER JOIN equipo e ON e.id=te.equipo_id';
$condicion = ' WHERE te.temporada_id='.$temporada_id.' ORDER BY nombre';
$consulta = 'SELECT '.$campos.' FROM '.$tabla.$condicion;
//echo $consulta;die;
$mysqli = conectar();
$resultadoSQL = mysqli_query($mysqli, $consulta);
$resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC); ?>

  <div style="width:35%;float:left">
    <h3>Equipos</h3>
    <?php 
    $origen="crearCalendario";
    $altura=700;
    include('../includes/diseny/formBetsapiTwitter.php')?>                
    <table><tr>
      <?php /* 
      <td>
      <form method="POST" action="crearCalendario.php">
        <input type="hidden" name="modo" value="sustituir_equipo">
        <input type="hidden" name="tipo_torneo" value="<?php echo $tipo_torneo; ?>">
        <input type="hidden" name="categoria_torneo" value="<?php echo $categoria_torneo; ?>">
        <input type="hidden" name="temporada_id" value="<?php echo $temporada_id; ?>">
        Sustituir id: <input type='text' name='e_saliente' size="2">
        por id:  <input type='text' name='e_entrante' size="2">
        <input type='submit' name='sustituir' value='sustituir'></td>
      </form>
    </td></tr>
    <tr><td >
      <form method="POST" action="crearCalendario.php">
        <input type="hidden" name="modo" value="agregar_equipo">
        <input type="hidden" name="tipo_torneo" value="<?php echo $tipo_torneo; ?>">
        <input type="hidden" name="categoria_torneo" value="<?php echo $categoria_torneo; ?>">
        <input type="hidden" name="temporada_id" value="<?php echo $temporada_id; ?>">
        Agregar id: <input type='text' name='e_agregado' size="2">
        <input type='submit' name='agregar' value='agregar'></td>
      </form>
    </td>
    */ ?>
    <td>
      <form method="POST" action="crearCalendario.php">
        <input type="hidden" name="modo" value="borrar_calendario">
        <input type="hidden" name="tipo_torneo" value="<?php echo $tipo_torneo; ?>">
        <input type="hidden" name="categoria_torneo" value="<?php echo $categoria_torneo; ?>">
        <input type="hidden" name="temporada_id" value="<?php echo $temporada_id; ?>">
        <input type='submit' name='borrar'
        onclick="if(confirm('Deseas borrar los partidos del calendario?')){
        this.form.submit();} else {return false;}"  value='eliminar calendario'></td>
      </form>
    </td>
    </tr>
    </table>

   <?php


          $campos = "id, '".$nombre_temporada."' as temporada,'',fecha, 
          hora_prevista, jornada, 0, (SELECT nombre FROM equipo WHERE id=equipoLocal_id) local,goles_local, goles_visitante, grupo_id,
          (SELECT nombre FROM equipo WHERE id=equipoVisitante_id) visitante, partidoAPI, equipoLocal_id,equipoVisitante_id, estado_partido";
            $tabla = ' partido p';
            $condicion = ' WHERE p.temporada_id='.$temporada_id.' ORDER BY p.jornada, p.fecha, p.hora_prevista';
            $consulta = 'SELECT '.$campos.' FROM '.$tabla.$condicion;
            $consultaB = $consulta;
            //echo $consulta;
            $resultadoSQL = mysqli_query($mysqli, $consulta);
            $calendario = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC); ?>
  </div>
<div  style="width:35%;float:left; background-color: #FAE5D3"> 

  <div id="calendario-central">
  <h3>CALENDARIO</h3> 
  <?php 
  $j = 0;$contador = 0;
  foreach ($calendario as $fila) {
    ++$contador;
    if ($fila['jornada'] != $j) { ?>
    <div style="background-color: orange">Jornada <?php echo $fila['jornada']?>
      - <span onclick="editarJornada(<?php echo $fila['jornada']?>,<?php echo $temporada_id?>,<?php echo $categoria_torneo?>)" style="cursor:pointer;"><b>Editar</b></span>
      <div id="j<?php echo $fila['jornada']?>-t<?php echo $temporada_id?>"></div>
    </div>
    <?php } 

    $colorFondo='';
    if ($fila['hora_prevista']=='00:00:11') {$colorFondo='white';}
    if ((int)$fila['estado_partido']==1) {$colorFondo='#A9DFBF';}
    ?>
    <div id="partido-<?php echo $fila['id']; ?>"></div>
    <div style="background-color: <?php echo $colorFondo?>; border: gainsboro 1px solid; ">    
    <span style="cursor:pointer;"onclick="editar_partido(<?php echo $fila['id']; ?>)"> *</span>
    <?php
    echo $contador.' - 
      '.$fila['fecha'].' -
      '.$fila['hora_prevista'].' - 
      '.$fila['jornada'].' - 
      '.$fila['local'].' - 
      <b>'.$fila['goles_local'].' - 
      '.$fila['goles_visitante'].'</b> - 
      '.$fila['visitante'].'<br />';
          $j = $fila['jornada']; ?>
     </div>     
  <?php } ?>
  </div>
  <div class="h40"></div>
</div>

<?php
$consulta = 'SELECT distinct(jornada), fecha FROM partido WHERE temporada_id='.$temporada_id.' ORDER BY jornada';
  $resultadoSQL = mysqli_query($mysqli, $consulta);
  $datos = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH); ?>

  <div style="width:15%;float:left">
      <div id="mensaje-fechas"></div>
      <form method="POST" action="#" onsubmit="modificarFechas(event, $(this).serialize(), <?php echo $temporada_id; ?>)">
      <input type="hidden" name="temporada_id" value="<?php echo $temporada_id; ?>">
      <input type="hidden" name="valores" value="<?php echo count($datos); ?>">
      <?php foreach ($datos as $k => $fila) {
            $fecha1 = $fila['fecha'];
            $fecha = date('j-m-Y', strtotime($fecha1)); ?>
      J-
      <input type="hidden" name="jo-<?php echo $k; ?>" value="<?php echo $fila['jornada']; ?>"> 
      <input type="hidden" name="fe-<?php echo $k; ?>" value="<?php echo $fila['fecha']; ?>">
      <input type="text" name="j-<?php echo $k; ?>" value="<?php echo $fila['jornada']; ?>" size="3" style="width:30px"> 
      <input type="text" name="f-<?php echo $k; ?>" value="<?php echo $fecha; ?>" size="10" style="width:80px"><br />
      <?php
        } ?>
      <input type="submit" name="modificar" value="modificar"> Form. dd-mm-aaaa
      </form>
      <form method="POST" action="crearCalendario.php">
          <input type="hidden" name="modo" value="sustituir_fechas">
          <input type="hidden" name="tipo_torneo" value="<?php echo $tipo_torneo; ?>">
          <input type="hidden" name="categoria_torneo" value="<?php echo $categoria_torneo; ?>">
          <input type="hidden" name="temporada_id" value="<?php echo $temporada_id; ?>">
          Poner fechas del torneo... <input type='text' name='id_fechas' size="2">
          <input type='submit' name='sustituir' value='sustituir'></td>
        </form>

        <form method="POST" action="#" onsubmit="generarCalendarioSubmit (event, $(this).serialize())">
        Jornadas:<input type="text" name="jornadas" value="0" size="2"><br />
        Temporada ID:<input type="text" name="temporada" value="<?php echo $temporada_id; ?>" size="2"><br />
        <input type="hidden" name="tipo_torneo" value="<?php echo $tipo_torneo; ?>">
        <input type="hidden" name="categoria_torneo" value="<?php echo $categoria_torneo; ?>">                                  
        <input type="submit" name="generar_calendario" value="generar_calendario">
        </form>
  </div>
</div>
         
</body>
</html>


