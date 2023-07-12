
<?php
$static_v = 8; 
define('_FUTBOLME_', 1);
require_once '../src/consultas.php';
require_once '../src/funciones.php';


for ($i=1; $i < 19; $i++) {
    
    $resultado = categoriasComunidad($i+1);// en src/consultas/csfutbolbase
   
	$menu = prepararMenuComunidad($resultado);
    guardarJSON($menu, '../json/menus/menu'.$i.'.json');
    echo "Generado un nuevo menú para Comunidad ".$i."<br />";
}

generarMenu();


function prepararMenuComunidad($array)
{
    $menu = array(
        'Regional' => array(),
        'Juvenil' => array(),
        'Cadete' => array(),
        'Infantil' => array(),
        'Alevin' => array(),
        'Femenino' => array(),
        'Fútbol Sala' => array(),
    );

    foreach ($array as $item) {

    	if ((1 == $item['categoria_torneo_id'] || 4 == $item['categoria_torneo_id']) ) { 
            $menu['Regional'][] = $item;
        } elseif (5 == $item['categoria_torneo_id']) { $menu['Juvenil'][] = $item;
        } elseif (6 == $item['categoria_torneo_id']) { $menu['Cadete'][] = $item;        
        } elseif (14 == $item['categoria_torneo_id']) { $menu['Infantil'][] = $item;
        } elseif (15 == $item['categoria_torneo_id']) { $menu['Alevin'][] = $item;
        } elseif (7 == $item['categoria_torneo_id']) { $menu['Femenino'][] = $item;
        } elseif (17 == $item['categoria_torneo_id']) { $menu['Fútbol Sala'][] = $item;
        }
    }

    return $menu;
}

?>