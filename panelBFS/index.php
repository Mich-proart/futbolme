<?php 
$static_v = 20; 
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
<?php 

$tipo_torneo = $_GET['tipo_torneo']??1;
$comunidad_id = $_GET['comunidad_id']??0;

if ($_SERVER['HTTP_HOST'] == 'fm18.com') {
    /*$categoria_torneo=1;
    $usuario_id=101;*/
    $categoria_torneo=17;$usuario_id=0;

} else {
  if($_SERVER['PHP_AUTH_USER'] == 'xavier' &&  $_SERVER['PHP_AUTH_PW'] =='xGirvent2020'){
    $categoria_torneo=17;
  }
  if($_SERVER['PHP_AUTH_USER'] == 'andalucia910' &&  $_SERVER['PHP_AUTH_PW'] =='mbeato_perez'){
    $categoria_torneo=1;
    $usuario_id=101; //nginx.conf 
  }
  if($_SERVER['PHP_AUTH_USER'] == 'catalunya05' &&  $_SERVER['PHP_AUTH_PW'] =='josep_carbonell'){
    $categoria_torneo=1;
    $usuario_id=105; //nginx.conf 
  }
}


if (isset($_POST['categoria_torneo'])) {
  $categoria_torneo=$_POST['categoria_torneo'];
  $tipo_torneo=3;
}

if (isset($_POST['upload'])){
      var_export($_FILES);
      $carpeta='../img/club/';
      $fichero_subido = $carpeta.basename($_FILES['fichero']['name']);
      echo '<pre>';
      if (move_uploaded_file($_FILES['fichero']['tmp_name'], $fichero_subido)) {
          echo "El fichero es válido y se subió con éxito.\n";
      } else {
          echo "¡Posible ataque de subida de ficheros!\n";
      }
      /*echo 'Más información de depuración:';
      print_r($_FILES);*/
      print "</pre>";
      die;
    }
?>

<body>
<div style="width: 100%; float:left; padding:5px">
  <div style="width: 50%; float:left">
    <span style="background-color:orange; padding:2px;">Ligas <a href="?tipo_torneo=1">FUTBOLME</a></span>
    <?php if ($categoria_torneo==17) { ?>
    <span style="background-color:gold; padding:2px;"><a href="?tipo_torneo=3&modo=fm">Directos</a></span>
    - <a href="equipos.php" target="blank">Equipos</a>
    - <a href="crearCalendario.php" target="blank">Crear calendario</a>
    <?php } ?>
  </div>
  
  

</div>

<div style="width: 100%; float:left; padding:5px; background-color: #EFEFEF;">

  <div id="mensaje" style="text-align:right; background-color:gainsboro"></div>

<table>
  <tr>
    <td valign="top" width="30%">	 
  <?php if ($tipo_torneo!=3){ 
    //cargar_torneos(categoria_torneo,tipo_torneo)
    if ($categoria_torneo==17){?>

    <div style="background-color: white; width: 500px; text-align: center; padding: 20px">
      <form enctype="multipart/form-data" action="index.php" method="POST">
        <input type="hidden" name="upload" value="carga" />
          <input type="hidden" name="MAX_FILE_SIZE" value="150000" />
          Cargar escudo: <input name="fichero" type="file" />
          <input type="submit" value="Subir" />
      </form>
      <p>El nombre del fichero tiene que ser <b>escudoNNNNN.png</b> donde NNNNN es el número del club</p>
    </div>
    <?php } else { ?>
    <select name="categoria" onchange="cargar_torneos(this.value,<?php echo $tipo_torneo?>,<?php echo $usuario_id?>)">
    <option value="0">Categorias</option>    
    <option value="1" selected>RFEF</option>
    <option value="4">Autonómica</option>
    <option value="5">Juvenil</option>
    <option value="6">Cadete</option>
    <option value="14">Infantil</option>
    <option value="15">Alevín</option>
    <option value="7">Femenino</option> 
    </select>
    <?php }
  } ?>

  <div id="listaTorneos" style="float:left;"></div>

     <div  style="clear: both;"></div>
     

  </td>
  <td valign="top" width="70%">
    <div id="listaTorneoJornadas" style="float:left;"></div>
    <div id="listaTorneoFutbolme" style="float:left;"></div>
    
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
cargar_torneos(<?php echo $categoria_torneo; ?>,<?php echo $tipo_torneo; ?>,<?php echo $usuario_id; ?>);
</script>
