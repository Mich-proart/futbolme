<?php 
$static_v = 19; 
define('_FUTBOLME_', 1);

require_once '../src/consultas.php';
?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">


<link href="/css/bootstrap.min.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/main.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/style.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/comunidades.min.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/paises.min.css?v=<?php echo $static_v; ?>" rel="stylesheet">

<noscript><link rel="stylesheet" href="/css/allcss.css?v=<?php echo $static_v; ?>"></noscript>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/js/ajax.js?=<?php echo $static_v; ?>"></script>
<script async src="/js/bootstrap.min.js"></script>
</head>
<?php $tipo_torneo = $_GET['tipo_torneo']??1;

if (isset($_GET['f'])){
  $carpeta="../json/actualizaciones/";
  $f=$carpeta.$_GET['f'];
  unlink($f); echo ' fichero borrado....<br />';
}

$categoria_torneo=1;
if (isset($_POST['categoria_torneo'])) {
  $categoria_torneo=$_POST['categoria_torneo'];
  $tipo_torneo=3;
}
?>

<body>  
<div style="width: 100%; float:left; padding:5px">
  <div style="width: 50%; float:left">
    <span style="background-color:orange; padding:2px;">Ligas <a href="?tipo_torneo=1">FUTBOLME</a></span>
    <span style="background-color:gainsboro; padding:2px;">Torneos <a href="?tipo_torneo=2">FUTBOLME</a></span>
    <span style="background-color:gold; padding:2px;"><a href="?tipo_torneo=3&modo=fm">Directos</a></span>
    <a href="agenda.php">Agenda</a> -
    <a href="/panelCargador/cargador.php">Cargador</a> - 
    <a href="/panelBack/federacion">Federaciones</a> - 
  </div>
  
  <div style="width: 50%; float:right" class="whitebox">
    <a href="generarMenu.php" target="blank">Generar menu</a> - 
    <a href="limpiezaUsuarios.php" target="blank">Limpieza de usuarios</a> - 
    <a href="crearCalendario.php" target="blank">Crear calendario</a> - 
    <a href="partidosTorneo.php?temporada_id=442" target="blank">Crear amistosos</a> - 
    <a href="fichajes.php" target="blank">Fichajes</a> - 
    <a href="medios.php" target="blank">Medios</a> - 
    <a href="/panelBack/club/index.php" target="blank">Agregar club</a> - 
    <a href="jornadaActiva.php" target="blank">Jornada activa</a> -
  
  </div>

</div>

<div style="width: 100%; float:left; padding:5px; background-color: #EFEFEF;">

  <div id="mensaje" class="index-externo" style="text-align:right; background-color:gainsboro"></div>

<table>
  <tr>
    <td valign="top" width="30%">	 
  <?php if ($tipo_torneo!=3){ 
    //cargar_torneos(categoria_torneo,tipo_torneo)
    ?>
  
    
		<select name="categoria" onchange="cargar_torneos(this.value,<?php echo $tipo_torneo?>,0)">
		<option value="0">Categorias</option>
		<option value="1" selected>RFEF</option>
		<?php if (2 == $tipo_torneo) { ?>
		<option value="2">FIFA</option>
		<option value="3">UEFA</option>
		<?php
   } ?>
		<option value="4">Autonómica</option>
		<option value="5">Juvenil</option>
    <option value="6">Cadete</option>
    <option value="14">Infantil</option>
    <option value="15">Alevín</option>
		<option value="7">Femenino</option> 
    <option value="8">América</option> 
    <option value="9">Europa</option>
    <option value="17">Fútbol Sala</option>        		
		</select>
 
  <?php  }  
  ?>

  <div id="listaTorneos" style="float:left;"></div>
  </td>
  <td valign="top" width="70%">
    <div id="listaTorneoJornadas" style="float:left;"></div>
    <div id="listaTorneoFutbolme" style="float:left;"></div>
    <div class="clear"></div>
    <div class="marco" style="overflow: auto; height: 600px; padding:20px;">
      <?php
      

      $mysqli=conectar();

      $sq='SELECT r.id,r.partido_id,r.goles_local,r.goles_visitante,ec.nombre local, ef.nombre visitante, te.nombre temporada, te.id temporada_id, co.nombre comunidad, ca.nombre categoria, 
      ut.nombre usuario,ut.resultados, ut.fallos
      FROM resultado r';
      $union=' INNER JOIN partido p ON p.id=r.partido_id';
      $union .= ' INNER JOIN equipo ec ON p.equipoLocal_id=ec.id';
      $union .= ' INNER JOIN equipo ef ON p.equipoVisitante_id=ef.id';
      $union .= ' INNER JOIN temporada te ON p.temporada_id=te.id';
      $union .= ' INNER JOIN torneo t ON t.id=te.torneo_id';
      $union .= ' INNER JOIN comunidad co ON co.id=t.comunidad_id';
      $union .= ' INNER JOIN categoria ca ON ca.id=t.categoria_id';
      $union .= ' INNER JOIN usuario_token ut ON ut.token=r.usuario';
      $condicion=' WHERE puntos=0 ORDER BY id DESC';
      $sq.=$union.$condicion; 
      $resultadoSQL = mysqli_query($mysqli, $sq);
      $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC); ?>
      
      <table class="table" border="1" cellpadding="2" cellspacing="2">

      <?php foreach ($resultado as $key => $v) { ?>
        <tr>
          <td><?php echo $v['comunidad']?></td>
          <td><?php echo $v['categoria']?></td>
          <td><a href="/temporada.php?id=<?php echo $v['temporada_id']?>" target="_blank"><?php echo $v['temporada']?></a></td>
          <td align="right"><?php echo $v['local']?></td>
          <td align="center" width="80"><?php echo $v['goles_local']?> - <?php echo $v['goles_visitante']?></td>
          <td><?php echo $v['visitante']?></td>
          <td><?php echo $v['usuario']?></td>
          <td style='color:green'>Verdaderos: <?php echo $v['resultados']?></td>
          <td style='color:red'>Falsos: <?php echo $v['fallos']?></td>
          <td align="center"><div id="va-<?php echo  $v['id']?>"><span style="cursor:pointer;" onclick="validarResultado(<?php echo  $v['id']?>,<?php echo  $v['partido_id']?>,<?php echo  $v['goles_local']?>,<?php echo  $v['goles_visitante']?>,0)">Validar</span></div></td>
          <td align="center"><div id="ig-<?php echo  $v['id']?>"><span style="cursor:pointer;" onclick="validarResultado(<?php echo  $v['id']?>,<?php echo  $v['partido_id']?>,0,0,1)">Ignorar</span></div></td>
      <?php } ?>
      </table>



      <h4>Actualizaciones automáticas.</h4>
      <?php



        $carpeta="../json/actualizaciones/";
        $directorio = opendir($carpeta); //ruta actual
        $archivos=array();
        
          while ($archivo = readdir($directorio)) {  
            if ($archivo=="." || $archivo=="..") { continue; } 
            if (substr($archivo, -4)=='.json') { continue; } 
            $t=filemtime($carpeta.$archivo);
            $archivos[$t][] = $archivo;
          }

      if (count($archivos)>0) {
        krsort($archivos);
        foreach ($archivos as $key => $value) {
          foreach ($value as $k => $v) {
            $file = fopen($carpeta.$v, "r");
            echo '<hr />Contenido del fichero '.$v.' - <a href="?tipo_torneo='.$tipo_torneo.'&f='.$v.'">Borrar</a><br />';
            while(!feof($file)) {
              echo fgets($file). "<br />";
            }
            fclose($file);
          }
        }
      } else {
        echo "sin archivos<hr />";
      }?>

    </div>
  </td>
</tr>
</table>

  
</div>
</body>
</html>
<?php

function imp($ob)
{
    if (!empty($ob)) {
        echo '<pre>';
        print_r($ob);
        echo '</pre>';
    }
}

?>

<script>
cargar_torneos(<?php echo $categoria_torneo?>,<?php echo $tipo_torneo?>,0);


$( "body" ).on( "click", "#btn_resultados", function() {
      $(".estado").css("display", "block");
      $(".resultado").css("display", "block");
      $(".clasificado").css("display", "block");
      $(".observaciones").css("display", "block");
      $(".arbitro").css("display", "none");
      $(".medio").css("display", "none");  
});

$( "body" ).on( "click", "#btn_fechas", function() {
      $(".fecha_input").css("display", "block");
      $(".hora_input").css("display", "block");
      $(".estado").css("display", "none");
      $(".resultado").css("display", "none");
      $(".clasificado").css("display", "none");
      $(".observaciones").css("display", "none");
      $(".arbitro").css("display", "none");
      $(".medio").css("display", "none");  
      

});

$( "body" ).on( "click", "#btn_arbitros", function() {
      $(".fecha_input").css("display", "none");
      $(".hora_input").css("display", "none");
      $(".estado").css("display", "none");
      $(".resultado").css("display", "none");
      $(".clasificado").css("display", "none");
      $(".observaciones").css("display", "none");
      $(".arbitro").css("display", "block");   
      $(".medio").css("display", "none");    

});

$( "body" ).on( "click", "#btn_medios", function() {
      $(".fecha_input").css("display", "none");
      $(".hora_input").css("display", "none");
      $(".estado").css("display", "none");
      $(".resultado").css("display", "none");
      $(".clasificado").css("display", "none");
      $(".observaciones").css("display", "none");
      $(".arbitro").css("display", "none");  
      $(".medio").css("display", "block");      

});


$( "body" ).on( "click", "#btn_apuestas", function() {
      $(".fecha_input").css("display", "none");
      $(".hora_input").css("display", "none");
      $(".estado").css("display", "none");
      $(".resultado").css("display", "none");
      $(".clasificado").css("display", "none");
      $(".observaciones").css("display", "none");
      $(".arbitro").css("display", "none");  
      $(".medio").css("display", "none");
      $(".apuesta").css("display", "block");       

});


     _add_tw = function(){   

          var color = $(this).css('background-color');
          var texto = $('#addTw').text();
          var twLocal = $(this).attr('data-l');
          var twVisitante = $(this).attr('data-v');
          var cadena = twLocal+' OR '+twVisitante+' OR ';
          
          $('#addTw').css('background-color', 'white');

          if (color==='rgb(255, 0, 0)') {
              $('#addTw').text(function(a, reemplaza) {
                  return reemplaza.replace(cadena, '');
              });
              $(this).css('background-color','white');
          } else {
              $('#addTw').text(texto+cadena);
              $(this).css('background-color','red');
          }; 
        }

    _abrir_tw = function(){
      url = 'https://twitter.com/search?q=';
      busqueda = $('#addTw').text();
      c = busqueda.length;
      busqueda=busqueda.substr(0, c-3);
      url2 = url+busqueda;      
      $("<a>").attr("href", url2).attr("target", "_blank")[0].click();
      return false;
    }

    _abrir_tw2 = function(){
      url = 'https://twitter.com/search?q=';
      busqueda = $('#addTw').text();
      busqueda = busqueda.replace(/ OR /gi,' OR from:'); 
      c = busqueda.length;
      busqueda=busqueda.substr(0, c-9);
      url2 = url+'from:'+busqueda;
      $("<a>").attr("href", url2).attr("target", "_blank")[0].click();
      return false;
    }

    /*_abrir_tw3 = function(){
      url = '/panel/apiTwitter/configuracion.php?cadena=';
      busqueda = $('#addTw').text();
      c = busqueda.length;
      busqueda=busqueda.substr(0, c-3);
      console.log(busqueda);
      url2 = url+'from:'+busqueda;
      $("<a>").attr("href", url2).attr("target", "_blank")[0].click();
      return false;
    }*/

   
   $(document).on('click', '.add-tw', _add_tw);
   $(document).on('click', '.ventanaTW', _abrir_tw);
   $(document).on('click', '.ventanaTW2', _abrir_tw2);
   
  
   


</script>
