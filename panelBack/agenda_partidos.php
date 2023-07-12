<?php 
$static_v = 3; 
define('_FUTBOLME_', 1);
require_once '../src/consultas.php';
require_once '../src/funciones.php';
//require_once('scripts/panelFunciones.php');
// definimos los valores iniciales para nuestro calendario
if (isset($_GET['fecha'])) {
    $fecha = $_GET['fecha'];
    $ct = $_GET['ct'];
} else {
    echo 'Sin parametros';
    die;
}

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
<script src="/js/federacion.js?=<?php echo $static_v; ?>"></script>
</head>
<body>
<table>
	<tr><td valign="top">
<div style="float:left; width:700px">
<?php

$partidos = partidosPorCategoria($fecha, $ct);
$h = ''; $colorFila = 'white';  $variable=0;
$sinFinalizar=array();

foreach ($partidos as $key=> $partido) {	
    if ((int)$_GET['m']==2){
		include('agendaPartido2.php');
	} else {
		include('agendaPartido.php');	
	}
    $h = $partido['hora_prevista'];    
}

?>
</div>
	</td>
	<td valign="top">
		<div style="padding: 10px; background-color: orange">
		<?php		
		$h = ''; $colorFila = 'white'; $variable=1;
		foreach ($sinFinalizar as $partido) {
		    if ((int)$_GET['m']==2){
				include('agendaPartido2.php');
			} else {			

				include('agendaPartido.php');	
			}
		    $h = $partido['hora_prevista'];
		}
		?>
		</div>
	</td>
  </tr>
</table>

</body>
</html>

