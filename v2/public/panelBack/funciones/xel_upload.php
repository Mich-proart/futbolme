<?php 
define('_PANEL_', 1);

//imp($_POST);die;
if (isset($_POST['id'])){

	$f=$_POST['f'];
    $id=$_POST['id'];
	if ($f=='j'){ 
		$fichero='jugador'.$id.'.jpg';
		$carpeta='/v2/public/static/img/jugadores/'; //OJO LO CAMBIE PARA PROBAR MICH 31/07/2023
		$_FILES['fu']['name']=$fichero;
	}

	if ($f=='ivan'){ 
		$carpeta='../../static/img/camponeutral/';
	}

	if (isset($_POST['borrar'])){
		if($id==0){
			unlink($_POST['f']);
		} else {
			unlink($carpeta.$fichero);?>
			<div class="clear marco" id="muestro-<?php echo $_POST['id']?>"> 
			<span style="color:red; font-size: 12px;;cursor:pointer;" class="boldfont" onclick="subirFichero('<?php echo $f?>','<?php echo $_POST['id']?>')">subir imagen</span>
			</div>

		<?php } 
		die;
	} 
	
    
	
	
	$fichero_subido = $carpeta.basename($_FILES['fu']['name']);

	
	if (move_uploaded_file($_FILES['fu']['tmp_name'], $fichero_subido)) { ?>
	<div class="clear marco">
	<span onclick="borrarFichero('<?php echo $fichero_subido?>',<?php echo $_POST['id']?>)" style="cursor: pointer; color:white; background-color: maroon; padding:3px;">B</span>&nbsp;&nbsp;&nbsp;			
	<a href="<?php echo $fichero_subido?>" target="_blank"><?php echo $_FILES['fu']['name']?></a>
	</div>
	<?php } else {
		echo '<div class="clear marco" style="color:red; font-size: 20px">';
	    echo "Problema al subir el fichero. \n";
	    if ($_FILES['fu']['error']==2){ echo '<b>El fichero es demasiado grande</b>'; }
	    if ($_FILES['fu']['error']==4){ echo '<b>No se ha seleccionado ningún fichero</b>'; }
	    //imp($_FILES['fu']['error']);
	    echo '</div>';
	}
	die;
} else {
	imp($_POST);die;
}

?>