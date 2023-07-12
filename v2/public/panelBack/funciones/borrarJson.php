<?php 
var_dump($_POST);

$files = glob('../../../json/temporada/'.$_POST['id'].'/*.*'); // obtiene todos los archivos
    foreach($files as $file){
      if(is_file($file)){ unlink($file); echo 'Borrado el fichero '.$file.'<br />';}     
    }
die;
?>