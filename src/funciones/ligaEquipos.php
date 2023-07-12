<?php

$f = '../../apis/'.$api_nombre.'/equipos/'.$api_id.'_equipos.json'; 

if (!@file_exists($f)) {
    $metodo = 'action=get_standings';
    $liga = '&league_id='.$api_id;
    $metodo .= $liga;
    $url = 'https://apifootball.com/api/?'.$metodo.$clau;
    echo $url;
    $resultado = file_get_contents($url);

    $fh = fopen($f, 'w');
    fwrite($fh, $resultado);
    fclose($fh);
}


$path = $f;
$json = file_get_contents($path);
$datos = json_decode($json, true);

$equiposAPI = array();
foreach ($datos as $key => $value) {
    $equiposAPI[] = $value['team_name'];
}
	

$equipos = Xapiequipospais($api_id); 

$pais_id=$equipos[0]['pais_id'];
$pais_nombre=$equipos[0]['pais_nombre'];

?>
<div style="float:left; width: 60%">
<p>Tenemos <?php echo count($equipos); ?> equipos en futbolme de <?php echo $pais_nombre; ?> (<?php echo $pais_id; ?>) Para grabar el partido tiene que conincidir el nombre en la celda naranja con el nombre de api</p>




<table>

<?php $encontrados = array();
foreach ($equipos as $key => $value) {
    $equipo = $value['nombre'];
    $eGrabado = $value['nombreAPI'];
    $equipo_id = $value['id'];
    $pais_id = $value['pais_id']; ?>
	
	<tr><td><b><?php echo $equipo; ?></b> con el id <b><?php echo $equipo_id; ?></b></td>
	<td bgcolor="orange"><?php echo $eGrabado; ?></td>
	<?php 	if ('FC Lahti Akatemia' == $equipo) {
        continue;
    }
    $valor = 0;
    foreach ($equiposAPI as  $e) {
        $pos = strpos($equipo, $e);

        if (false === $pos) {
        } else {
            ?>
		    <td>Cadena <b><?php echo $e; ?></b> encontrada en '<b><?php echo $equipo; ?></b>'</td> 
		    <td><form method="post" class="formulario" id="form<?php echo $equipo_id; ?>" onsubmit="submitEquipoApi(event, $(this).serialize(),<?php echo $equipo_id; ?>)">
		    <input type="hidden" name="equipo_id" value="<?php echo $equipo_id; ?>">
		    <input type="hidden" name="equipoAPI" value="<?php echo $pais_id.'_'.$e; ?>">
		    <input type='submit' name='grabar' value='Grabar'>&nbsp;&nbsp;&nbsp;<?php echo $pais_id.'_'.$e; ?></form></td>
		    <?php 
            $nombre_api = $api_id.'_'.$e;
            $encontrados[] = $e;
            $valor = 1;
            break;
            //Xnominar($equipo_id,$nombre_api);
        }
    }
    if (0 == $valor) {
        ?>

			<td><form method="post" class="formulario" id="form<?php echo $equipo_id; ?>" onsubmit="submitEquipoApi(event, $(this).serialize(),<?php echo $equipo_id; ?>)">
		    <input type="hidden" name="equipo_id" value="<?php echo $equipo_id; ?>">
		    <input type="text" name="equipoAPI" value="<?php echo $pais_id.'_'; ?>">
		    <input type='submit' name='grabar' value='Grabar'>
		    </form></td>


	<?php
    } ?>
	<td><div id="alerta-<?php echo $equipo_id; ?>"></div></td>
	</tr>
	<?php
} ?>
</table>
</div>

	<div style="float: left; width: 40%">

		<div style="float: left; width: 50%">
		<?php
		imp(count($equiposAPI)); echo " <b>Nombre en API</b>";
		imp($equiposAPI);?>
		</div>
		<div style="float: left; width: 50%">
		<?php 
		//imp(count($encontrados));
		//imp($encontrados);
		foreach ($equiposAPI as  $e) {
		    $valor = 0;
		    foreach ($encontrados as  $e2) {
		        if ($e2 == $e) {
		        	echo '<b> - '.$e.' - </b><br />';
		            $valor = 1;
		            break;
		        }
		    }
		    if (0 == $valor) {
		        echo $e.'<br />';
		    }
		}
		?>
		</div>
		<div style="clear: both"></div>
		<h3>Insertar club de <?php echo $pais_nombre; ?> (<?php echo $pais_id; ?>) </h3>
		<form method="post" class="formulario" onsubmit="submitInsertarClub(event, $(this).serialize())">

					<input type="hidden" name="pais_id" value="<?php echo $pais_id?>">					
					Nombre: <input type="text" name="nombre" size="15">
					Categoría: <select name="categoria_id">
					<option value="1">Senior Masculino</option>
					<option value="2">Senior Femenino</option>
					<option value="3">Juvenil</option>
					<option value="4">Cadete</option>
					<option value="21">Infantil</option>
					</select>
					<input type="submit" name="grabar" value="grabar club y equipo nuevo.">
					</form>

		<div id="alertaInsertarClub"></div>
		</form>

	</div>
