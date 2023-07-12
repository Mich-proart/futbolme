
<?php
$static_v = 13; 
define('_FUTBOLME_', 1);

require_once 'consultas.php';
require_once 'funciones.php';
require_once '../../src/funciones.php';

$tiempo_inicio = microtime_float(); ?>
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
<script src="/js/federacion.js?=<?php echo $static_v; ?>"></script>
</head>
<body>

	<div style="padding: 10px; background-color: white">
		<a href="funciones/_000clarktm" target="_blank">clarktm</a> - 
		<a href="funciones/_000sslproxies" target="_blank">sslproxies</a> - 
		<a href="https://www.proxy-list.download/es/HTTPS" target="_blank">proxy-list</a> - 
		<a href="https://hidemyna.me/es/proxy-list/" target="_blank">hidemyna</a> - 
		<a href="gestorProxis.php" target="_blank">INICIO</a><hr />

<?php

if (isset($_POST['modo'])){
	$mysqli = conectar();
	if ($_POST['modo']=='borrarProxis'){
		for ($i=0; $i < 20 ; $i++) { 
			$bd='proxis'.$i;
			if ($i==19){ $bd='proxis100';}
			$sq='DELETE FROM '.$bd;
			mysqli_query($mysqli, $sq);
			echo $sq.'<br />';
		}
	}

	if ($_POST['modo']=='cargar'){
		$p=$_POST['proxis'];
		$proveedor='global';
		$proxis=explode("\r\n", $p);		
			for ($i=0; $i < 20 ; $i++) { 
			$bd='proxis'.$i;
			if ($i==19){ $bd='proxis100';}

				foreach ($proxis as $key => $ip) {
					$x=explode(':', $ip);
					if ($x[1]!='8080' && $x[1]!='80' && $x[1]!='443' && $x[1]!='3128' && $x[1]!='8811' && $x[1]!='9999'){ continue; }
					$sql='SELECT id FROM '.$bd.' WHERE ip="'.$ip.'"';
				    $resultadoSQL = mysqli_query($mysqli, $sql);
				    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
				    if (count($resultado)==0){
						$sql='INSERT INTO '.$bd.' (ip, uso, estado, proveedor) VALUES ("'.$ip.'",0,0,"'.$proveedor.'")';
						mysqli_query($mysqli, $sql);
					}
				}
				echo 'Proxis cargados en proxis'.$i.'<br />';
			}
	}

	if ($_POST['modo']=='trasladar'){
		$dela=$_POST['dela'];if ($dela==19){ $dela='100';}
		$ala=$_POST['ala'];if ($ala==19){ $ala='100';}
		$dela='proxis'.$dela;$ala='proxis'.$ala;
		$sql='SELECT ip,proveedor FROM '.$dela;
		$resultadoSQL = mysqli_query($mysqli, $sql);
	    $proxis = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
	    foreach ($proxis as $key => $v) {
	    	$sql='SELECT id FROM '.$ala.' WHERE ip="'.$v['ip'].'"';
		    $resultadoSQL = mysqli_query($mysqli, $sql);
		    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
		    if (count($resultado)==0){
				$sql='INSERT INTO '.$ala.' (ip, uso, estado, proveedor) VALUES ("'.$v['ip'].'",0,0,"'.$v['proveedor'].'")';
				echo $sql.'<br />';
				mysqli_query($mysqli, $sql);
			}
	    }
	}


	if ($_POST['modo']=='trasladar2'){
		$dela=$_POST['dela'];if ($dela==19){ $dela='100';}
		$ala=$_POST['ala'];if ($ala==19){ $ala='100';}
		$dela='proxis'.$dela;$ala='proxis'.$ala;
		$sql='SELECT ip,proveedor FROM '.$dela.' WHERE uso>'.$_POST['uso'];
		$resultadoSQL = mysqli_query($mysqli, $sql);
	    $proxis = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
	    foreach ($proxis as $key => $v) {
	    	$sql='SELECT id FROM '.$ala.' WHERE ip="'.$v['ip'].'"';
		    $resultadoSQL = mysqli_query($mysqli, $sql);
		    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
		    if (count($resultado)==0){
				$sql='INSERT INTO '.$ala.' (ip, uso, estado, proveedor) VALUES ("'.$v['ip'].'",0,0,"'.$v['proveedor'].'")';
				echo $sql.'<br />';
				mysqli_query($mysqli, $sql);
			} else { echo 'ya existe <br />';}
	    }
	}


	










}

?>
<table><tr><td valign="top">
	<form action="?" method="post">
		<input type="hidden" name="modo" value="cargar">
		<textarea cols="80" rows="20" name="proxis" required></textarea><br />		
		<input type="submit" name="enviar" value="cargarProxis">
	</form><hr />
	<form method="post" action="?">
		<input type="hidden" name="modo" value="borrarProxis">
		<input type="submit" name="boton" value="Borrar todos los registros de todas las tablas">
	</form>
</td>
<td valign="top">
	<form action="?" method="post">
		<input type="hidden" name="modo" value="trasladar">
		De la <select name="dela">
			<?php for ($i=0; $i < 20 ; $i++) { 
				$bd='proxis'.$i;
				if ($i==19){ $bd='proxis100';}?> 
				<option value="<?php echo  $i?>"><?php echo $bd?></option>
			<?php } ?>
		</select>
		 - a la <select name="ala">
			<?php for ($i=0; $i < 20 ; $i++) { 
				$bd='proxis'.$i;
				if ($i==19){ $bd='proxis100';}?> 
				<option value="<?php echo  $i?>"><?php echo $bd?></option>
			<?php } ?>
		</select>
		<input type="submit" name="enviar" value="trasladar">
	</form><hr />

	<form action="?" method="post">
		<input type="hidden" name="modo" value="trasladar2">
		Usos <input type="text" name="uso" size="3">
		De la <select name="dela">
			<?php for ($i=0; $i < 20 ; $i++) { 
				$bd='proxis'.$i;
				if ($i==19){ $bd='proxis100';}?> 
				<option value="<?php echo  $i?>"><?php echo $bd?></option>
			<?php } ?>
		</select>
		 - a la <select name="ala">
			<?php for ($i=0; $i < 20 ; $i++) { 
				$bd='proxis'.$i;
				if ($i==19){ $bd='proxis100';}?> 
				<option value="<?php echo  $i?>"><?php echo $bd?></option>
			<?php } ?>
		</select>
		<input type="submit" name="enviar" value="trasladar">
	</form><hr />
	
</td></tr></table>


</div>
</body>
</html>