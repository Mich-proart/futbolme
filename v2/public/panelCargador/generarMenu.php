
<?php
define('_FUTBOLME_', 1);

include 'funcionesV2.php';

generarMenu();


for ($i=1; $i < 19; $i++) {
    
    $resultado = categoriasComunidad($i+1);// en src/consultas/csfutbolbase
   
	$menu = prepararMenuComunidad($resultado);
    guardarJSON($menu, '../../json/menus/menu'.$i.'.json');
    echo "Generado un nuevo menú para Comunidad ".$i."<br />";
}






?>