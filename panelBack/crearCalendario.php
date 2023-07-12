<?php 
$static_v =9; 
define('_FUTBOLME_', 1);
require_once '../src/consultas.php';
require_once '../src/funciones.php';
?>



  <?php

$tipo_torneo = $_GET['tipo_torneo']??1;
$categoria_torneo = $_GET['categoria_torneo']??1;
$temporada_id = $_GET['temporada_id']??1;
$modo = $_GET['modo']??null;
$ver_equipos = $_GET['ver_equipos']??0;





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
          mysqli_query($mysqli, $consulta);

          $consulta = 'UPDATE partido SET equipoLocal_id=null WHERE temporada_id='.$_GET['temporada_id'].' and equipoLocal_id='.$_GET['equipo_id'];
          mysqli_query($mysqli, $consulta);

          $consulta = 'UPDATE partido SET equipoVisitante_id=null WHERE temporada_id='.$_GET['temporada_id'].' and equipoVisitante_id='.$_GET['equipo_id'];
          mysqli_query($mysqli, $consulta);
          echo 'ok';
          die;
      }
  }

  if (isset($_POST['modo'])) {  

  //imp($_POST);  
    $mysqli = conectar();
    if ('borrar_calendario' == $_POST['modo']) {
        $sql = 'DELETE FROM partido WHERE temporada_id='.$_POST['temporada_id'];            
        $resultadoSQL = mysqli_query($mysqli, $sql); 
       
    }

    if ('quitar_equipo' == $_POST['modo']) {
          $consulta = 'DELETE FROM temporada_equipo WHERE temporada_id='.$_POST['temporada_id'].' AND equipo_id='.$_POST['e_quitado'];
          mysqli_query($mysqli, $consulta);

          $consulta = 'UPDATE partido SET equipoLocal_id=null WHERE temporada_id='.$_POST['temporada_id'].' and equipoLocal_id='.$_POST['e_quitado'];
          mysqli_query($mysqli, $consulta);

          $consulta = 'UPDATE partido SET equipoVisitante_id=null WHERE temporada_id='.$_POST['temporada_id'].' and equipoVisitante_id='.$_POST['e_quitado'];
          mysqli_query($mysqli, $consulta);
         
      }

        
    if ('agregar_equipo' == $_POST['modo']) {
        $consulta = 'INSERT INTO temporada_equipo (temporada_id,equipo_id) VALUES ('.$_POST['temporada_id'].', '.$_POST['e_agregado'].')';
        $consulta = mysqli_query($mysqli, $consulta);

        $tipo_torneo = $_POST['tipo_torneo'];
        $categoria_torneo = $_POST['categoria_torneo']??1;
        $temporada_id = $_POST['temporada_id']??1;        
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

      //imp($_POST);
        $e_entrante = $_POST['e_entrante'];
        $e_saliente = $_POST['e_saliente'];
        $temporada_id = $_POST['temporada_id'];

        if (null != $e_saliente) {
            $consulta = 'UPDATE temporada_equipo set equipo_id='.$e_entrante.' 
    WHERE temporada_id='.$temporada_id.' AND equipo_id='.$e_saliente;
            $resultadoSQL = mysqli_query($mysqli, $consulta);
            //echo $consulta.'<br />';
        
        $consulta = 'UPDATE partido set equipoLocal_id='.$e_entrante.' 
    WHERE temporada_id='.$temporada_id.' AND equipoLocal_id='.$e_saliente;
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        //echo $consulta.'<br />';
        $consulta = 'UPDATE partido set equipoVisitante_id='.$e_entrante.' 
    WHERE temporada_id='.$temporada_id.' AND equipoVisitante_id='.$e_saliente;
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        //echo $consulta.'<br />';

        echo '<h4>Equipo sustituido correctamente</h4>';

        }
    }
     
  $_GET['tipo_torneo']=$_POST['tipo_torneo'];
  $_GET['temporada_id']=$_POST['temporada_id'];
  $_GET['categoria_torneo']=$_POST['categoria_torneo'];   

  $tipo_torneo = $_GET['tipo_torneo']??1;
  $categoria_torneo = $_GET['categoria_torneo']??1;
  $temporada_id = $_GET['temporada_id']??1;
  $modo = $_GET['modo']??null;
  $ver_equipos = $_GET['ver_equipos']??0;     
      
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


    if ($modo=='borrarFicheros'){ 
      $file1='../json/temporada/'.$temporada_id.'/partidosActiva.json';
      echo $file1.'<br />';
      unlink($file1);
      $file2='../json/temporada/'.$temporada_id.'/tipo.json';
      echo $file2.'<br />';
      unlink($file2);
    }

    if ($modo=='borrarFichero'){ 
      $file1=$_GET['f'];
      echo $file1.'<br />';
      unlink($file1);
    }

?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title> 
<link href="/css/bootstrap.min.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/main.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/style.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<noscript><link rel="stylesheet" href="/css/allcss.css?v=<?php echo $static_v; ?>"></noscript>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/js/ajax.js?=<?php echo $static_v; ?>"></script>
</head>
<body>

<div style="float:left; width:100%; background-color: #AED6F1; padding:5px">
   <div id="mensaje" style="text-align:right; background-color:gainsboro"></div>
       	<div id="categorias" style="float:left; width:10%">
      		<select name="categoria" onchange="location='?categoria_torneo='+this.value+'&tipo_torneo=<?php echo $tipo_torneo; ?>'"> 
      		<option value="0" <?php if ($categoria_torneo==0){ echo 'selected'; } ?>>Categorias</option>
      		<option value="1" <?php if ($categoria_torneo==1){ echo 'selected'; } ?>>RFEF</option>
      		<?php if (2 == $tipo_torneo) { ?>
      		<option value="2" <?php if ($categoria_torneo==2){ echo 'selected'; } ?>>FIFA</option>
      		<option value="3" <?php if ($categoria_torneo==3){ echo 'selected'; } ?>>UEFA</option>
      		<?php }?>
      		<option value="4" <?php if ($categoria_torneo==4){ echo 'selected'; } ?>>Autonómica</option>
      		<option value="5" <?php if ($categoria_torneo==5){ echo 'selected'; } ?>>Juvenil</option>
          <option value="6" <?php if ($categoria_torneo==6){ echo 'selected'; } ?>>Cadete</option>
          <option value="14" <?php if ($categoria_torneo==14){ echo 'selected'; } ?>>Infantil</option>
          <option value="15" <?php if ($categoria_torneo==15){ echo 'selected'; } ?>>Alevín</option>
      		<option value="7" <?php if ($categoria_torneo==7){ echo 'selected'; } ?>>Femenino</option>  
          <option value="8" <?php if ($categoria_torneo==8){ echo 'selected'; } ?>>América</option>
          <option value="9" <?php if ($categoria_torneo==9){ echo 'selected'; } ?>>Europa</option>
          <option value="17" <?php if ($categoria_torneo==17){ echo 'selected'; } ?>>F. Sala</option>      		
      		</select>
      	</div>
       	
        <div id="listaTorneos" style="float:left; width:90%">
            <?php
            $lista_torneos = listarTorneosPorCategoria($tipo_torneo, $categoria_torneo,0); 

            ?>
            <select name="temporada" onchange="location='?temporada_id='+this.value+'&categoria_torneo=<?php echo $categoria_torneo; ?>&tipo_torneo=<?php echo $tipo_torneo; ?>'">
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
        </div> 

        <div><a href="?modo=borrarFicheros&temporada_id=<?php echo $temporada_id?>&tipo_torneo=<?php echo $tipo_torneo?>&categoria_torneo=<?php echo $categoria_torneo?>">Borrar ficheros json</a>
          - <a href="/temporada.php?id=<?php echo $temporada_id?>" target="_blank">Ver temporada</a>
        </div>   
</div>         

<div id="listaDatos" style="float:left; width:100%; background-color: #F2F4F4;">
<?php

$campos = 'te.equipo_id, e.nombre, te.grupo, e.betsapi, e.slug, e.federacion_id,
(SELECT count(id) FROM partido WHERE equipoLocal_id=te.equipo_id AND temporada_id='.$temporada_id.') pL, 
(SELECT count(id) FROM partido WHERE equipoVisitante_id=te.equipo_id AND temporada_id='.$temporada_id.') pV 
';
$tabla = ' temporada_equipo te INNER JOIN equipo e ON e.id=te.equipo_id';
$condicion = ' WHERE te.temporada_id='.$temporada_id.' ORDER BY nombre';
$consulta = 'SELECT '.$campos.' FROM '.$tabla.$condicion;
//echo $consulta;die;
$mysqli = conectar();
$resultadoSQL = mysqli_query($mysqli, $consulta);
$resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC); 
$equiposTorneo=$resultado;?>

  <div style="width:35%;float:left">
    <h3><a href="federacion/recursos/equiposTemporada.php?temporada_id=<?php echo $temporada_id?>" target="_blank">Equipos</a></h3>

    <?php 
    $origen="crearCalendario";
    $altura=700;
    include('../includes/diseny/formBetsapiTwitter.php')?>                
    <table><tr><td>
      <form method="POST" action="crearCalendario.php">
        <input type="hidden" name="modo" value="sustituir_equipo">
        <input type="hidden" name="tipo_torneo" value="<?php echo $tipo_torneo; ?>">
        <input type="hidden" name="categoria_torneo" value="<?php echo $categoria_torneo; ?>">
        <input type="hidden" name="temporada_id" value="<?php echo $temporada_id; ?>">
        Sustituir id: <input type='text' name='e_saliente' size="6">
        por id:  <input type='text' name='e_entrante' size="6">
        <input type='submit' name='sustituir' value='sustituir'></td>
      </form>
    </td></tr>
    <tr><td>
      <form method="POST" action="crearCalendario.php">
        <input type="hidden" name="modo" value="agregar_equipo">
        <input type="hidden" name="tipo_torneo" value="<?php echo $tipo_torneo; ?>">
        <input type="hidden" name="categoria_torneo" value="<?php echo $categoria_torneo; ?>">
        <input type="hidden" name="temporada_id" value="<?php echo $temporada_id; ?>">
        Agregar id: <input type='text' name='e_agregado' size="6">
        <input type='submit' name='agregar' value='agregar'></td>
      </form>
    </td></tr>
    <tr><td>
      <form method="POST" action="crearCalendario.php">
        <input type="hidden" name="modo" value="quitar_equipo">
        <input type="hidden" name="tipo_torneo" value="<?php echo $tipo_torneo; ?>">
        <input type="hidden" name="categoria_torneo" value="<?php echo $categoria_torneo; ?>">
        <input type="hidden" name="temporada_id" value="<?php echo $temporada_id; ?>">
        Quitar id: <input type='text' name='e_quitado' size="6">
        <input type='submit' name='Quitar' value='Quitar'></td>
      </form>
    </td></tr>
    <tr>
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

   <a href="?categoria_torneo=<?php echo $categoria_torneo?>&temporada_id=<?php echo $temporada_id?>&tipo_torneo=<?php echo $tipo_torneo?>&ver_equipos=1">Ver equipos</a>
  <?php

  if ($ver_equipos==1){
            echo 'Pais: '.$pais_n.' - '.$pais_id.'<br />';
            echo 'Comunidad: '.$comunidad_n.' - '.$comunidad_id.'<br />';
            echo 'Categoría: '.$categoria_n.' - '.$categoria_id.'<br />';

            $campos = 'e.id, e.nombre, l.nombre localidad, p.nombre provincia, p.comunidad_id, c.es_seleccion';
            $tabla = 'equipo e';
            $union = ' INNER JOIN club c ON e.club_id=c.id';
            $union2 = ' INNER JOIN localidad l ON c.localidad_id=l.id';
            $union3 = ' INNER JOIN provincia p ON l.provincia_id=p.id';

            $modelo = 0;
            if ($categoria_id > 1 && 60 != $pais_id) {
                $condicion = ' WHERE e.categoria_id='.$categoria_id.'AND c.pais_id='.$pais_id;
                $orden = ' ORDER BY e.nombre';
            } else {
                if (60 == $pais_id) {
                    if (1 == $comunidad_id) {
                        $condicion = ' WHERE e.categoria_id='.$categoria_id.' AND c.pais_id='.$pais_id.' AND e.desaparecido<1000 AND p.id>1';
                        $orden = ' ORDER BY p.comunidad_id, e.nombre';
                    } else {
                        $condicion = ' WHERE e.categoria_id='.$categoria_id.' AND c.pais_id='.$pais_id.' AND p.comunidad_id='.($comunidad_id).' AND e.desaparecido<1000';
                        $orden = ' ORDER BY e.nombre';
                    }
                } else {
                    $campos = 'e.id, e.nombre, c.es_seleccion';
                    $condicion = ' WHERE e.categoria_id='.$categoria_id.' AND c.pais_id='.$pais_id;
                    $union2 = '';
                    $union3 = '';
                    $orden = ' ORDER BY e.nombre';
                    $modelo = 1;
                }
            }
            $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$union2.$union3.$condicion.$orden;

            $resultadoSQL = mysqli_query($mysqli, $consulta);
            $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
            echo "<table width='100%' border='0' cellpadding='1' cellspacing='1' bgcolor='gainsboro'>";
            echo '<tr><td>ID</td>
                    <td>disponibles</td>
                    <td>localidad</td>
                    <td>provincia</td>
                    <td>Comunidad - Seleccion</td>
                  </tr>';

              foreach ($resultado as $fila) {
                  echo '<tr bgcolor="white">
                      <td>'.$fila['id'].'</td>
                      <td>'.$fila['nombre'].'</td>';
                  if ($modelo < 1) {
                      echo '<td>'.$fila['localidad'].'</td>
                        <td>'.$fila['provincia'].'</td>
                        <td>'.$fila['comunidad_id'].' - <a href="#" onclick="insertarEquipo(event, '.$temporada_id.', '.$fila['id'].', \''.$fila['nombre'].'\')">insertar</a> - '.$fila['es_seleccion'].'</td>';
                  } else {
                      echo '<td></td><td></td><td><a href="#" onclick="insertarEquipo(event, '.$temporada_id.', '.$fila['id'].', \''.$fila['nombre'].'\')">insertar</a> - '.$fila['es_seleccion'].'</td>';
                  }
                  echo '</tr>';
              }
            echo '</table>'; 

}


          $campos = "p.id, '".$nombre_temporada."' as temporada,p.fecha, ec.nombre local, ef.nombre visitante, ec.federacion_id fedLocal, ef.federacion_id fedVisitante,
          p.hora_prevista, p.jornada,p.goles_local, p.goles_visitante, p.grupo_id,
          p.partidoAPI, p.equipoLocal_id,p.equipoVisitante_id, p.estado_partido, p.comentario, p.codigo_acta, (SELECT count(id) FROM tarjeta WHERE partido_id=p.id) datosActa";
            $tabla = ' partido p';
            $condicion = ' INNER JOIN equipo ec ON ec.id=p.equipoLocal_id
            INNER JOIN equipo ef ON ef.id=p.equipoVisitante_id
            WHERE p.temporada_id='.$temporada_id.' ORDER BY p.jornada, p.fecha, p.hora_prevista';
            $consulta = 'SELECT '.$campos.' FROM '.$tabla.$condicion;
            $consultaB = $consulta;
            //echo $consulta;
            
            $resultadoSQL = mysqli_query($mysqli, $consulta);
            $calendario = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC); ?>
  </div>
<div  style="width:35%;float:left; background-color: #FAE5D3">
  Jornadas: <input id="boton-jornadas-<?php echo $temporada_id; ?>" type="text" name="jornadas" value="<?php echo $jornadas?>"  style="font-size:12px; width:50px; background-color: #EFEFEF; text-align: center">
  Estado: <input id="boton-visible-<?php echo $temporada_id; ?>" type="text" name="visible" value="<?php echo $visible?>"  style="font-size:12px; width:50px; background-color: #EFEFEF; text-align: center">
  <input class="resultado" id="boton-betsapi-<?php echo $temporada_id; ?>" type="text" name="betsapi" value="<?php echo $betsapi; ?>" style="font-size:12px; width:50px; background-color: yellow; text-align: center">
  <input class="btn_enviar hidden-xs" id="boton-orden-<?php echo $temporada_id; ?>" type="button" onclick="orden_torneo2(<?php echo $temporada_id; ?>)" 
      style="font-size:12px" value="Or."> <a href="/src/funciones/apis/comprobando.php?api_id=<?php echo $betsapi?>&temporada_id=<?php echo $temporada_id?>">Comparar partidos</a> - <a href="/src/funciones/apis/comprobando.php?api_id=<?php echo $betsapi?>&temporada_id=<?php echo $temporada_id?>&modo=recuperar">Recuperar partidos</a>

<?php

if (isset($_GET['territorial'])) {
  

  if (@file_exists($f)) { 
    $f = '../panelBack/federacion/'.$_GET['territorial'].'/equipos/'.$_GET['grupo'].'-equipos.json';
    $json = file_get_contents($f);
    $datos = json_decode($json, true);?>
    <?php foreach ($datos as $key => $value) {
    $fed_id=str_replace('NFG_VisCompeticiones_Grupo?cod_primaria=1000123&codequipo=', '', $value['url']);
    $fed_id=str_replace('&codgrupo='.$_GET['grupo'], '', $fed_id);
      foreach ($equiposTorneo as $k => $v) {
        if($v['federacion_id']==$fed_id){
          $equiposTorneo[$k]['nombreFed']=$value['equipo'];
        }
      }
    }
  }

  $f = '../panelBack/federacion/'.$_GET['territorial'].'/calendarios/'.$_GET['grupo'].'-partidos.json';
  
  if (@file_exists($f)) { 
    $json = file_get_contents($f);
    $datos = json_decode($json, true);
    //imp($equiposTorneo);
    echo '<hr />';
    foreach ($datos as $key => $value) {
      $jornada=$value['jornada'];
      $f=$value['fecha'];
      $f=explode('-', $f);$f=str_replace('(', '', $f);$f=str_replace(')', '', $f);
      $fecha=$f[2].'-'.$f[1].'-'.$f[0];
      foreach ($value['partidos'] as $k => $v) {
          $local_id=0;$visitante_id=0;$eLocal=''; $eVisitante='';
          foreach ($equiposTorneo as $k1 => $v1) {            
            $v['local']=str_replace('&nbsp;', '', $v['local']);
            if(trim($v1['nombreFed'])==trim($v['local']) ) {
              $eLocal=$v1['nombre'];
              $local_id=$v1['equipo_id'];
            }
            if($v1['nombreFed']==$v['visitante']){
              $eVisitante=$v1['nombre'];
              $visitante_id=$v1['equipo_id'];
            }
          } //equipostorneo
        //echo 'Jda.'.$jornada.' - '.$fecha.' ('.$eLocal.'->'.$local_id.') - '.$v['local'].' - '.$v['visitante'].' - ('.$eVisitante.'->'.$visitante_id.')<br />';
        
        $sq='SELECT id FROM partido WHERE temporada_id='.$temporada_id.' AND equipoLocal_id='.$local_id.' AND equipoVisitante_id='.$visitante_id;
        $resultadoSQL = mysqli_query($mysqli, $sq);
        $p = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
        if (count($p)==0){
          $consulta = 'INSERT INTO partido (temporada_id, estado_partido, goles_local, goles_visitante, fecha, hora_prevista, jornada, equipoLocal_id, equipoVisitante_id) VALUES ('.$temporada_id.',0,0,0,"'.$fecha.'", "00:00:11",'.$jornada.', '.$local_id.', '.$visitante_id.')';
            mysqli_query($mysqli, $consulta);
            echo $consulta.'<br />';
        }      
      } //partidos
    } //datos calendario
  } //si existe calendario
}
?>

  <div id="calendario-central">
  <h3>CALENDARIO</h3> <a href="/panelCargador/actasGenerar.php?c=<?php echo ($comunidad_id-1)?>&t=<?php echo $temporada_id?>">Actas</a>
  <?php 
  $comunidad_id=($comunidad_id-1);
  require_once 'federacion/funciones/urlFederaciones.php'; 
  


  $j = 0;$contador = 0;
  foreach ($calendario as $fila) {
    ++$contador;
    
    if ($fila['jornada'] != $j) { ?>
    <div style="background-color: orange">Jornada <?php echo $fila['jornada']?>
      - <span onclick="editarJornada(<?php echo $fila['jornada']?>,<?php echo $temporada_id?>,<?php echo $categoria_torneo?>)" style="cursor:pointer;"><b>Editar</b></span>
       - <a href="/panelCargador/actasPendientes.php?modo=1&comunidad_id=<?php echo ($comunidad_id+1)?>&torneo_id=<?php echo $torneo_id?>&temporada_id=<?php echo $temporada_id?>&modo=descargarActas&jornada=<?php echo $fila['jornada']?>">Descargar actas</a> 
      --  <a href="/partidoApu.php?jornada=<?php echo $fila['jornada']?>&temporada_id=<?php echo $temporada_id?>" target="_blank">ver2</a> 

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
      <span title="'.$fila['local'].' - FM: '.$fila['equipoLocal_id'].' - Fed: '.$fila['fedLocal'].'"">'.$fila['local'].'</span> - 
      <b>'.$fila['goles_local'].' - 
      '.$fila['goles_visitante'].'</b> - 
      <span title="'.$fila['visitante'].' - FM: '.$fila['equipoVisitante_id'].' - Fed: '.$fila['fedVisitante'].'"">'.$fila['visitante'].'</span> - <a href="federacion/actas.php?c='.$comunidad_id.'&id='.$fila['id'].'&acta='.$fila['codigo_acta'].'" target="_blank">'.$fila['codigo_acta'].'</a>';

      if ($fila['codigo_acta']>0 && $fila['estado_partido']==1){
        $f='../json/temporada/'.$temporada_id.'/ac-'.$fila['jornada'].'-'.$fila['codigo_acta'].'-'.$fila['id'].'.json';
        if (!@file_exists($f)) { 
          echo '---- '.$fila['datosActa']; 
        } else  { 
          echo ' - OK - '.$fila['datosActa']; ?>

        <a href="?modo=borrarFichero&temporada_id=<?php echo $temporada_id?>&tipo_torneo=<?php echo $tipo_torneo?>&categoria_torneo=<?php echo $categoria_torneo?>&f=<?php echo $f?>">Q</a> - 

        <?php

        } 
        $url=str_replace('xxx', $fila['codigo_acta'], $urlActa);
        echo ' - <a href="'.$url.'" target="_blank">Fed</a>';
        unset($f);
      } 

      echo ' - <a href="/partido.php?id='.$fila['id'].'&m=1" target="_blank">ver</a>'; 

      
      echo '<br />';




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


