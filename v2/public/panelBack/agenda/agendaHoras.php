<?php 
$static_v = 3; 
define('_FUTBOLME_', 1);
require_once '../src/consultas.php';
require_once '../src/funciones.php';
//require_once('scripts/panelFunciones.php');
// definimos los valores iniciales para nuestro calendario
    $fecha = $_GET['f']??date('Y-m-d');

$sql='SELECT count(p.id) partidos, p.hora_prevista, tor.comunidad_id
FROM partido p 
INNER JOIN temporada te ON te.id=p.temporada_id 
INNER JOIN torneo tor ON tor.id=te.torneo_id 
WHERE p.fecha="'.$fecha.'" AND p.equipoLocal_id>0 AND p.equipoVisitante_id>0 
GROUP BY p.hora_prevista, comunidad_id
ORDER BY p.hora_prevista, comunidad_id';

$mysqli = conectar();
$resultadoSQL = mysqli_query($mysqli, $sql);
$resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

$horas=array();
$partidos=0;

foreach ($resultado as $key => $value) {	
	$hora=substr($value['hora_prevista'],0,2);
	//if ($hora=='09'){ imp($value); }
	//if ($hora=='10'){ break; }
	if (!isset($horas[$hora]['partidos'])){$horas[$hora]['partidos']=0;} 
	$horas[$hora]['partidos']=$horas[$hora]['partidos']+$value['partidos'];
	if (!isset($horas[$hora]['franjas'][$value['hora_prevista']]['partidos'])){
		$horas[$hora]['franjas'][$value['hora_prevista']]['partidos']=0;
	} 

	$horas[$hora]['franjas'][$value['hora_prevista']]['partidos']=$horas[$hora]['franjas'][$value['hora_prevista']]['partidos']+$value['partidos'];
	$horas[$hora]['franjas'][$value['hora_prevista']]['porComunidad'][$value['comunidad_id']]=$value['partidos'];
	
	
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
<div style="float:left; width:300px">

	<?php foreach ($horas as $key => $value) { ?>
		<hr /><h3><a href=""><?php echo $key?></a> - <?php echo $value['partidos']?></h3>		
	<?php } ?>
	

</div>
	</td>
	<td valign="top">
		<div style="padding: 10px; background-color: orange">
			<?php foreach ($horas as $key => $value) { ?>
				<hr /><h3><?php echo $key?> - <?php echo $value['partidos']?></h3>
				<?php foreach ($value['franjas'] as $k => $v) { 


					$fecha1 = date('Y-m-d H:i:s');
					$fecha1 = date_create($fecha1); //hora actual

					$fecha2 = date($fecha.' '.$k); 
					$fecha2 = date_create($fecha2); // hora comienzo					

					$dPartido = date_diff($fecha2, $fecha1);

					$horasP = $dPartido->h;
					$minutosP = $dPartido->i;
					$segundosP = $dPartido->s;
					$invertidoP = $dPartido->invert;

					$color='black';
					if ($invertidoP==0 && $horasP>1) {$color='maroon'; }
					if ($invertidoP==1 && $horasP>1) {die('finalizado'); }
					//imp($dPartido);



					?>
					--------> <b><span style="color:<?php echo $color?>"><?php echo $k?></span></b> - <?php echo $v['partidos']?><br />
					<?php foreach ($v['porComunidad'] as $k1 => $v1) { ?>
						------------------------------------> <b><a href="agenda_partidosB.php?fecha=<?php echo $fecha?>&h=<?php echo $k?>&ct=<?php echo $k1?>"><?php echo ($k1-1)?></a></b> - Partidos: <?php echo $v1?>
						<?php 
						$sql='SELECT SUM(IF(p.estado_partido=1, 1, 0)) finalizados, SUM(IF(p.estado_partido>2, 1, 0)) suspendidos FROM partido p
						INNER JOIN temporada te ON te.id=p.temporada_id 
						INNER JOIN torneo tor ON tor.id=te.torneo_id 
						WHERE p.fecha="'.$fecha.'" AND p.hora_prevista="'.$k.'" AND tor.comunidad_id='.$k1.' AND p.estado_partido<>0';
						$resultadoSQL = mysqli_query($mysqli, $sql);
						$resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC); 
						//echo $sql.'<br />';
						if (($resultado['finalizados']+$resultado['suspendidos'])==$v1) { echo ' - <b>OK</b>'; } ?>
						- (<?php echo $resultado['finalizados']?>) finalizados
						- (<?php echo $resultado['suspendidos']?>) suspendidos						
						<br />
					<?php } ?>
				<?php } ?>
			<?php } ?>			
		</div>
	</td>
  </tr>
</table>

</body>
</html>

