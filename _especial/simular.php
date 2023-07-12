<?php 
define('_FUTBOLME_', 1);
require_once '../src/config.php';

//if (isset($_GET['t'])) { $temporada_id = $_GET['t']; }
if (isset($_POST['t'])) {
    $temporada_id = $_POST['t'];
}
if (!is_numeric($temporada_id)) {
    header('Location:/');
}

$extras = array();

$datos = $_POST['datos'];
$datos = explode(',', $datos);
$datos = array_unique($datos);
foreach ($datos as $key => $fila) {
    $p = explode('-', $fila);
    if (is_numeric($p[3]) && is_numeric($p[4])) {
        $extras[$key]['id_local'] = $p[1];
        $extras[$key]['id_visitante'] = $p[2];
        $extras[$key]['re_local'] = $p[3];
        $extras[$key]['re_visitante'] = $p[4];
    }
}

if (@file_exists('../json/temporada/'.$temporada_id.'/clasificacion.json')) {
    $json = file_get_contents('../json/temporada/'.$temporada_id.'/clasificacion.json');
} else {
    exit($json);
}
$c = json_decode($json, true);
$clasificacion = $c['clasificacionFinal'];
$nueva = array();
foreach ($clasificacion as $key => $value) {
    $nueva[$value['equipo_id']]['ant_posicion'] = $value['posicion'];
    $nueva[$value['equipo_id']]['ant_puntos'] = $value['puntos'];
    $nueva[$value['equipo_id']]['posicion'] = $value['posicion'];
    $nueva[$value['equipo_id']]['equipo_id'] = $value['equipo_id'];
    $nueva[$value['equipo_id']]['nombreCorto'] = $value['nombreCorto'];
    $nueva[$value['equipo_id']]['puntos'] = $value['puntos'];
    $nueva[$value['equipo_id']]['jugados'] = $value['jugados'];
    $nueva[$value['equipo_id']]['gFavor'] = $value['gFavor'];
    $nueva[$value['equipo_id']]['gContra'] = $value['gContra'];
    $nueva[$value['equipo_id']]['diferencia'] = ($value['gFavor'] - $value['gContra']);
    foreach ($extras as $k => $fila) {
        if ($value['equipo_id'] == $fila['id_local'] || $value['equipo_id'] == $fila['id_visitante']) {
            $nueva[$value['equipo_id']]['jugados'] += 1;
            if ($value['equipo_id'] == $fila['id_local']) {
                $nueva[$value['equipo_id']]['gFavor'] += $fila['re_local'];
                $nueva[$value['equipo_id']]['gContra'] += $fila['re_visitante'];
                if ($fila['re_local'] > $fila['re_visitante']) {
                    $nueva[$value['equipo_id']]['puntos'] += 3;
                } elseif ($fila['re_visitante'] > $fila['re_local']) {
                    //$nueva[$value['equipo_id']]['perdidos']=($nueva[$value['equipo_id']]['perdidos']+1);
                } else {
                    $nueva[$value['equipo_id']]['puntos'] += 1;
                }
            } else {
                $nueva[$value['equipo_id']]['gFavor'] += $fila['re_visitante'];
                $nueva[$value['equipo_id']]['gContra'] += $fila['re_local'];
                if ($fila['re_local'] < $fila['re_visitante']) {
                    $nueva[$value['equipo_id']]['puntos'] += 3;
                } elseif ($fila['re_visitante'] < $fila['re_local']) {
                    //$nueva[$value['equipo_id']]['perdidos']=($nueva[$value['equipo_id']]['perdidos']+1);
                } else {
                    $nueva[$value['equipo_id']]['puntos'] += 1;
                }
            }
        }
    }
}

$oP = []; $oDG = []; $oMG = [];

foreach ($nueva as $key => $clasifica) {
    $oP[$key] = $clasifica['puntos'];
    $oDG[$key] = $clasifica['gFavor'] - $clasifica['gContra'];
    $oMG[$key] = $clasifica['gFavor'];
}

    array_multisort($oP, SORT_DESC, SORT_NUMERIC, $oDG, SORT_DESC, SORT_NUMERIC, $oMG, SORT_DESC, SORT_NUMERIC, $nueva);

$reOrdenar = $nueva;

?>

<h4 class="text-center"><a href="http:www.futbolme.com">futbolme.com</a></h4>
		<table class="table table-bordered table-condensed whitebox nomargin txt11">
			<thead>
			<tr class="darkgreenbox"><h4 >En la simulación no se tienen en cuenta el golaverage particular</h4></tr>
	            <tr class="darkgreenbox">
		                <th class="text-center">P</th>
		                <th class="text-center">Equipo</th>
		                <th class="text-center">P<span class="hidden-xs">TO</span>S</th>
		                <th class="text-center">J<span class="hidden-xs">U</span></th>
		                <th class="text-center"><span class="hidden-xs">G</span>F</th>
		                <th class="text-center"><span class="hidden-xs">G</span>C</th>
		                <th class="text-center">D<span class="hidden-xs">I</span>F</th>
		        </tr>
		    </thead>
		    <tbody class="whitebox">
		        <?php 

                foreach ($reOrdenar as $key => $fila) {
                    $color_fondo = 'white'; ?>
		        <tr data-id="<?php echo $fila['equipo_id']; ?>">
		        	<td class="text-center nopadding" style="<?php echo $fila['css']??''; ?>">
		        	<?php echo $key + 1; ?>
		        	<span style="font-size:9px;background-color:gainsboro;"><b><?php echo $fila['ant_posicion']; ?></b></span>
		        	</td>
	        		<td id="<?php echo $fila['equipo_id']; ?>" data-posicion="<?php echo $fila['posicion']; ?>" class="nopadding">
	        		 <img src="/img/equipos/escudo<?php echo $fila['equipo_id']; ?>.png"  alt="equipo" style="width:18px; height:20px">
                     <b><?php echo $fila['nombreCorto']; ?></b>
            		</td>
	        		<td class="text-center nopadding" style="background-color:<?php echo $color_fondo; ?>">
	        		<span><b><?php echo $fila['puntos']; ?></b></span>
	        		<span style="font-size:9px;background-color:gainsboro;"><b><?php echo $fila['ant_puntos']; ?></b></span>
	        		</td>
	        		<td class="text-center nopadding">
	        		<span><?php echo $fila['jugados']; ?></span>
 	        		</td>
	        		<td class="text-center nopadding"><span><?php echo $fila['gFavor']; ?></span>
	        		</td>
	        		<td class="text-center nopadding"><span><?php echo $fila['gContra']; ?></span>
	        		</td>
	        		<td class="text-center nopadding"><?php echo $fila['gFavor'] - $fila['gContra']; ?></td>
		        </tr>
		        

		         <?php
                } ?>	         
	        		
	        </tbody>
		</table>	