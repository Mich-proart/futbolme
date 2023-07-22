<?php
define('_PANEL_', 1);
require_once 'includes/config.php'; //include funciones,consultas, post y fechas
require_once 'includes/get.php';
require_once 'includes/post.php';
require_once 'includes/head.php';

$externo=0;
if (isset($_GET['idu'])){ $externo=($_GET['idu']+1000);}


$comunidad_id=$_GET['comunidad_id']??0;
if ($comunidad_id>0){ $bloque='block'; } else { $bloque='none';} 

$tipo_torneo=$_GET['tipo_torneo']??1;
$categoria_torneo=1;
if (isset($_POST['categoria_torneo'])) {
  $categoria_torneo=$_POST['categoria_torneo'];
  $tipo_torneo=3;
  
}
?>
</head>
<body>
<?php
// Iniciamos la sesión
//session_start();

// Accedemos a los datos de la sesión
//$nombre = $_SESSION['nombre'];

// Puedes utilizar los datos como desees
//echo "Hola, $nombre. Tienes $edad años.";

// Destruimos la sesión (opcional)
//session_destroy();
?>

<?php var_dump($_SESSION['user']);?>
<?php if(isset($_SESSION['user'])){ ?>
<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmailLogin" aria-describedby="emailHelp">    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPasswordLogin">
  </div>
  <button type="button" class="btn btn-primary btn-login-panel">Submit</button>
</form>
<?php die;?>
<?php }?>

<div style="background-color: white; padding: 5px;">
  <div id="cache" class="pull-right"></div>
  <table class="table">
    <tr>
      <td><div class="content-inicio btn btn-default" data-related="liga" id="ligaClick">Ligas</div></td>
      <?php if ($externo==0){ ?>
      <td><div class="content-inicio btn btn-default" data-related="torneos" id="torneoClick">Torneos</div></td>
      <td><div class="content-inicio btn btn-default" data-related="directos">Directos</div></td>
      <td><div class="content-inicio btn btn-default" data-related="agenda">Agenda</div></td>
      <td><div class="content-inicio btn btn-default" data-related="federaciones">Federaciones</div></td>
      <td><div class="content-inicio btn btn-default" data-related="calLiga">Crear calendarios</div></td>
      <td class="hide"><div class="content-inicio btn btn-default" data-related="calTorneo">Crear torneos</div></td>
      <td><div class="content-inicio btn btn-default" data-related="clubs">Clubs</div></td>
      <td><div class="content-inicio btn btn-default" data-related="fichajes">Fichajes</div></td>
      <td><div class="content-inicio btn btn-default" data-related="activa">Jornada Activa</div></td>
      <td><div class="content-inicio btn btn-default" data-related="medios">Medios</div></td>
      <td><div class="content-inicio btn btn-default" data-related="historico">Histórico</div></td>
      <td><div class="content-inicio btn btn-default" data-related="whatsapp">Whatsapp</div></td>
      <?php } ?>
    </tr>
    
    
    <?php if ($externo==0){ ?>
    <tr><td colspan="12" align="right" style="padding: 10px; background-color: lavender">
    <a href="/panelCargador/cargador.php">Cargador</a> - 
    <a href="/panelCargador/generarMenu.php" target="blank">Generar menu</a> - 
    <a href="/panelCargador/urlTorneos.php" title="">Url torneos</a> - 
    <a href="/panelCargador/limpiezaUsuarios.php" target="blank">Limpieza de usuarios</a> - 
    <a href="/borrarCacheTWIG" target="blank">Borrar caché TWIG</a> - 
    <a href="/borrarCacheHTML" target="blank">Borrar caché HTML</a> - 
    <a href="utiles/generarEquiposBuscador.php" title="">Buscador Equipos</a> - 
    <a href="utiles/generarJugadoresBuscador.php" title="">Buscador Jugadores</a>

    (<a href="https://search.finderant.com/force-index-auto.php?hashKey=14d0a18510c816e8cbfc0dfdba2679ce&site=58" target="_blank">Actualizar.</a>)

     - 
    <a href="utiles/guardarTorneos.php" title="">Guardar torneos</a> - 
    <a style="display: none" href="editor.php" title="">Editores</a> -  
    <a style="display: none" href="editor.php?t=-1" title="Editor para Iván" class="boldfont" style="color:maroon">Editor Iván</a>    
    </td></tr>
    <?php } ?>

    <tr><td colspan="10" valign="top" class="celestebox">
      <div id="pruebas"></div>
    <div id="main-content-inicio">
      
      <div class="container-inicio index-interno" id="liga" style="display: block;">
        


              <div id="listaTorneoFutbolme1" style="float:left; position: absolute; top:150px; z-index: 1000; right:10px;" class="col-sm-7 col-xs-12"></div>
              <div style="position: absolute; top:60px;left:20px; max-width: 250px; height: 60px; z-index:0">
                <span onclick="refrescarLigas()" style="cursor:pointer" class="boldfont" style="font-size: 30px">Limpiar</span> - 
                Ligas<select name="categoria" onchange="cargar_torneos(this.value,1,<?php echo $externo?>)">
                  <option value="0" selected>Categorias</option>
                  <option value="1">RFEF</option>
                  <option value="4">Autonómica</option>
                  <option value="5">Juvenil</option>                
                  <option value="7">Femenino</option> 
                  <option value="9">Europa</option>
                  <option value="17">Fútbol Sala</option>           
                  </select>
              </div>
              <div id="listaTorneos1" style="position: absolute; top:150px;left:20px; max-width: auto;"></div>
      </div>
      <div class="container-inicio" id="torneos" style="display: none;">
        
              <div id="listaTorneoFutbolme2" style="float:left; position: absolute; top:150px; z-index: 1000; right:10px" class="col-sm-7 col-xs-12"></div>        
              <div style="position: absolute; top:60px;left:20px; max-width: 250px; height: 60px; z-index:0">
                <span onclick="refrescarTorneos()" style="cursor:pointer" class="boldfont" style="font-size: 30px">Limpiar</span> - 
                Torneos: <select name="categoria" onchange="cargar_torneos(this.value,2,<?php echo $externo?>)">
                <option value="0" selected>Categorias</option>
                <option value="1">RFEF</option>
                <option value="2">FIFA</option>
                <option value="3">UEFA</option>
                <option value="4">Autonómica</option>
                <option value="5">Juvenil</option>                
                <option value="7">Femenino</option> 
                <option value="9">Europa</option>
                <option value="17">Fútbol Sala</option>           
                </select>
              </div>
              <div id="listaTorneos2" style="position: absolute; top:150px;left:20px; max-width: auto; background-color: gainsboro"></div>
      </div>
      <div class="container-inicio" id="directos" style="display: none;">
              <div id="listaTorneoJornadas" style="float:left; position: absolute; top:150px; z-index: 1000; right:10px"  class="col-sm-7 col-xs-12"></div>
              <div id="listaTorneos3" style="position: absolute; top:60px;left:20px; max-width: 400px"></div>
      </div>
      
      <div class="container-inicio" id="agenda" style="display: none;"></div>

      <div class="container-inicio" id="federaciones" style="display: <?php echo $bloque?>;">
          <?php require_once 'federacion/index.php'?>
      </div>
      <div class="container-inicio" id="calLiga" style="display: none;"></div>
      <div class="container-inicio" id="calTorneo" style="display: none;"></div>
      <div class="container-inicio" id="clubs" style="display: none;"></div>
      <div class="container-inicio" id="fichajes" style="display: none;"></div>
      <div class="container-inicio" id="activa" style="display: none;"></div>
      <div class="container-inicio" id="medios" style="display: none;"></div>
      <div class="container-inicio" id="historico" style="display: none;"></div>
      <div class="container-inicio" id="whatsapp" style="display: none;"></div>
    </div>
  </td></tr>
</table>

</div>

</body>
</html>



<?php require_once 'includes/ajax.php';?>
<?php require_once 'funciones/clasificacion/jscolor.php';?>

<script>
cargar_torneos(1,3,0);
</script>