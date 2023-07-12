<?php 
define('_FUTBOLME_', 1);
require_once '../../../src/funciones.php';
$gestor=$_GET['gestor']??$_POST['gestor'];
$grupo=$_GET['grupo']??$_POST['grupo'];
$f = '../../../json/gestores/'.$gestor.'/colores.json';
if (@file_exists($f)) {
$json = file_get_contents($f);$colores = json_decode($json, true);
} else { $colores=array(); guardarJSON($colores, $f); }

if (isset($_POST['copiar'])){	
	$cf=$_POST['cf'];
	$ct=$_POST['ct'];
	$ly=$_POST['ly'];
	$valor=0;

	if ($_POST['copiar']==2){
		foreach ($colores as $k => $v) {
			if ($v['id']==$_POST['id']){ 
				$colores[$k]['ly']=$_POST['ly'];
			} 
		}
	} else {
		if (count($colores)>0){
			$id=0;
			foreach ($colores as $k => $v) {
				if ($v['id']>$id){ $id=$v['id'];}
				if ($v['cf']==$cf && $v['ct']==$ct && $v['ly']==$ly){
					echo '<h3>Este formato ya lo tienes grabado en tu configuración</h3>';
					$valor=1;
				} 
			}
			$id=$id+1;
			
			
			if ($valor==0){
				$colores[$id]['id']=$id;
				$colores[$id]['ct']=trim($ct);
				if ($_POST['copiar']==0){
					$colores[$id]['cf']='#'.trim($cf);
				} else {
					$colores[$id]['cf']=trim($cf);
				}
				
				$colores[$id]['ly']=trim($ly);
			}

		} else {
			$colores[0]['id']=0;
			$colores[0]['ct']=$ct;
			$colores[0]['cf']=$cf;
			$colores[0]['ly']=$ly;
		}
	} // copiar =1
	if ($valor==0){
		guardarJSON($colores, $f);	
		//echo 'guardamos color '.$valor.'<br />';
	}
}


?>

<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="jscolor.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title>Editar colores</title>
	<meta http-equiv='cache-control' content='no-cache'>
	<meta http-equiv='expires' content='0'>
	<meta http-equiv='pragma' content='no-cache'>
</head>
<body>
	

	<div style="background-color: white; float:left">
		<div style="width:400px; float:left; padding:20px">
			<form method="post" action="clasPintar.php">
			<input type="hidden" name="grupo" value="<?php echo $grupo?>">
			<input type="hidden" name="gestor" value="<?php echo $gestor?>">
			<input type="hidden" name="copiar" value="0">	
			<b>Pulsa en el cuadro del fondo para elegir el color:</b><hr />
				Fondo <input class="color" name="cf" value="66ff00">
				<br />Letra <select name="ct">
				<option value="black">Letra en negro</option>
				<option value="white">Letra en blanco</option>
				</select>
				<br />Texto: <input type="text" name="ly" size="20" placeholder="leyenda del texto">
				<br /><p style="text-align: center"><input type="submit" name="grabar" value="grabar"></p>
			</form>
			<hr />
			<table width="400" bgcolor="gainsboro" cellpadding="1" cellspacing="1">
			<tr><td>ID</td><td>formato</td><td></td><td></td></tr>
			<?php	
            foreach ($colores as $fila) {
                $css = 'background-color:'.$fila['cf'].'; color:'.$fila['ct']; ?>
			<tr bgcolor="white">
				<td><?php echo $fila['id']?></td>
				<td style="<?php echo $css?>"><?php echo $fila['ly']?></td>
				<td>
			<form method="post" action="clasPintar.php" name="form<?php echo $k?>">
			<input type="hidden" name="grupo" value="<?php echo $grupo?>">
			<input type="hidden" name="gestor" value="<?php echo $gestor?>">
			<input type="hidden" name="id" value="<?php echo $fila['id']?>">
			<input type="hidden" name="cf" value="<?php echo $fila['cf']?>">
			<input type="hidden" name="ct" value="<?php echo $fila['ct']?>">
			<input type="hidden" name="copiar" value="2">
			<input type="text" name="ly" value="<?php echo $fila['ly']?>" size="15">			
			<input type="submit" name="cambiar" value="cambiar">
			
			</form>
				</td>
			</tr>	
			<?php
            } 
            unset($colores)
            ?> 
			</table>
			<hr />
			Desde aquí podrás crear y editar los colores para tus clasificaciones.<br />
			Estos colores los podrás aplicar a cualquiera de tus torneos.
		</div>
		<?php $c='color.json';
		$json = file_get_contents($c);
		$c = json_decode($json, true);
		$coloresPre=$c[2]['data']; //resultado de exportación desde phpmyadmin
		?>
		<div style="float:left; padding:20px">

			<table width="300" bgcolor="gainsboro" cellpadding="1" cellspacing="1">
			<tr><td colspan="2">Ejemplos</td></tr>
			<?php	
            foreach ($coloresPre as $k => $fila) {
             $css = 'background-color:'.$fila['color_fondo'].'; color:'.$fila['color_texto'];?>
			<tr bgcolor="white">
				<td>
					<form method="post" action="clasPintar.php" name="form<?php echo $k?>">
			<input type="hidden" name="grupo" value="<?php echo $grupo?>">
			<input type="hidden" name="gestor" value="<?php echo $gestor?>">
			<input type="hidden" name="copiar" value="1">
			<input type="hidden" name="cf" value="<?php echo trim($fila['color_fondo'])?>">
			<input type="hidden" name="ct" value="<?php echo trim($fila['color_texto'])?>">
			<input type="hidden" name="ly" value="<?php echo trim($fila['nombre'])?>">
			<input type="submit" name="envio" value="copiar">
				</form>
				</td>
				<td style="<?php echo $css; ?>"><?php echo $fila['nombre']; ?></td>
				
			</tr>	
			<?php
            } ?> 
			</table>

		</div>
	</div>
<?php 
unset($_GET);
unset($colores);
unset($coloresPre);
?>
</body>
</html>
		