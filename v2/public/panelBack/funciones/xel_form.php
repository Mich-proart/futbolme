<?php 
//var_export($_POST);
$id=$_POST['id'];
$f=$_POST['f'];

?>
<div class="dentroForm col-xs-6 marco" style="width: 500px; height: 90px">
<form enctype="multipart/form-data" id="formFicheroUnico-<?php echo $id?>" class="formImg" name="<?php echo $id?>">
    <!-- MAX_FILE_SIZE debe preceder al campo de entrada del fichero 10 mb-->
    <input type="hidden" name="MAX_FILE_SIZE" value="2000000" form="formFicheroUnico-<?php echo $id?>"/>
    
	<input type="hidden" name="f" value="<?php echo $f?>" form="formFicheroUnico-<?php echo $id?>" />
	<input type="hidden" name="id" value="<?php echo $id?>" form="formFicheroUnico-<?php echo $id?>" />
    <!-- El nombre del elemento de entrada determina el nombre en el array $_FILES -->
    <input name="fu" type="file" form="formFicheroUnico-<?php echo $id?>" />
	<input type="submit" value="Enviar" date-related="<?php echo $id?>" form="formFicheroUnico-<?php echo $id?>"/>
</form>
</div>
<div id='subirFichero-<?php echo $id?>'></div>