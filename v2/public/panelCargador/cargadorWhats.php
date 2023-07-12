<?php 
define('_FUTBOLME_', 1);

include 'funcionesV2.php';


$files = glob('../../json/eventos/*.*'); // obtiene todos los archivos



    foreach($files as $file){
      if(is_file($file)){

        $fila=file_get_contents($file);
        $fila=json_decode($fila);

        $fila = get_object_vars($fila);

        
        /*echo '<pre>';
        print_r($fila);
        echo '</pre>';*/

        include 'funcionWhatsapp.php';

        unlink($file); // lo elimina si se trata de un archivo
        
      } 
    }
die('Fin');
?>