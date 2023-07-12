<?php 
//if (!isset($_GET['modo'])){ $_GET['modo']=1; }

$api=extraerApis($temporada_id);        
$apis=count($api);

if ($tipo_torneo==2 && $apis>0){
    //en tipo_torneo 2 solo una api de momento.
    $torneo = Xapifutbol($api[0]['api_id']); 
            ?>
        <select name="temporada" onchange="cargar_torneo_jornadas(this.value,<?php echo $tipo_torneo; ?>)">
        <option value="0">Grupos</option>
        <?php foreach ($api as $key => $value) { ?>
        <option value="<?php echo $temporada_id; ?>,1,<?php echo $value['jornada_id']?>,<?php echo $value['grupo_id']?>"><?php echo $value['grupo']?> (<?php echo $value['grupo_id']?>)</option>
        <?php } ?>        
        </select>
    <?php  

} else {

    if (count($api)>0){
        foreach ($api as $key => $value) {
            $api_id = $api[$key]['api_id'];
            $api_nombre = $api[$key]['api_nombre']; ?>

    <form method="post" class="formulario" onsubmit="submitInicioTorneo(event, $(this).serialize())">
        <input type="text" name="inicio" size="15" value="<?php echo date("Y-m-d"); ?>">
        <input type="text" name="temporada_id" value="<?php echo $temporada_id; ?>" size="1">
        <input type="text" name="api_id" value="<?php echo $api_id; ?>" size="3">
        <input type="text" name="api_nombre" value="<?php echo $api_nombre; ?>" size="10">
        <input type="submit" name="exportar" value="Exportar partidos">
        <div id="alertaInicio"></div>
        
    </form>


        <?php }

    } else {

         echo "Este torneo no está asociado a ninguna API"; 
         
        ?>
        <form method="post" class="formulario" onsubmit="submitAsociarTorneo(event, $(this).serialize())">
        <input type="text" name="api_id" size="3">
        <input type="text" name="api_nombre" size="15" value="apifootball">
        <input type="text" name="torneo_id" value="<?php echo $torneo_id; ?>" size="3">
        <input type="submit" name="asociar" value="asociar">

        <div id="alertaAsociar"></div>
        </form>

         <?php die;

    }

} 

die('Elige proveedor de partidos');

//si tipo_torneo=1   
        
        
    


$api_id=$api_id??0;
$torneo = Xapifutbol($api_id);
$torneo_id = Xtorneo_id($temporada_id);




$temporada_id = $torneo['temporada_id'];
$pais_id = $torneo['pais_id'];
$tipo_torneo = $torneo['tipo_torneo'];
$categoria_torneo_id = $torneo['categoria_torneo_id'];
$inicio = $torneo['inicio'];

if ($tipo_torneo==2) {
    $api_nombre="apifootball";$api_id=0;
    foreach ($api as $key => $value) {
        if ($grupo_id==$value['grupo_id']){ 
            echo $value['grupo']."<br />";
            $api_id=$value['api_id']; break; 
        }
    }
    imp($api_id);    
}

if ($api_id==0){ die('imposible continuar sin un api_id'); }


$f = '../../apis/'.$api_nombre.'/partidos/'.$api_id.'_partidos.json';
echo $f.'<br />';



$cTime = 60*60*24; //segundoa.

if (@file_exists($f)) { $f_time = @filemtime($f); } else { $f_time = 0; }

if ((time()-$cTime) > $f_time) { 
    $metodo = 'action=get_events';
    $from = '&from='.$inicio;
    $to = '&to=2020-12-31';
    $liga = '&league_id='.$api_id;
    $metodo .= $from.$to.$liga;
    //$jornada="&match_id=".$jornada_id;
    $url = 'https://apifootball.com/api/?'.$metodo.$clau;
    echo $url.'<br />';
    $resultado = file_get_contents($url);

    try {
         $fh = fopen($f, 'w');
         fwrite($fh, $resultado);
         fclose($fh);
     } catch (Exception $e) {
         echo 'Error (File: '.$e->getFile().', line '.$e->getLine().'): '.$e->getMessage();
     }
} else {
    echo 'Tiempo actual '.time(). ' - Tiempo del fichero '.$f_time.' Total: '.$cTime.' Transcurrido : '.(time()-$cTime).'<br />';
}

$path = $f;
$json = file_get_contents($path);
$datos = json_decode($json, true);

echo(count($datos)).' partidos ';


echo "<a href='/temporada.php?id=".$temporada_id."' target='_blank'>Ver en futbolme</a> - ";

?>

<div align="center">
<form method="post" class="formulario" onsubmit="submitCrearPartidos(event, $(this).serialize())">
<input type="text" name="inicio" value="<?php echo $hoy; ?>" size="8">
<input type="text" name="liga_id" value="<?php echo $api_id; ?>" size="3">
<?php if ($tipo_torneo==1){?>
<input type="submit" name="crear partidos" value="crear partidos" >
<a href="/panelBack/crear_calendario.php?temporada_id=<?php echo $temporada_id; ?>&categoria_torneo=<?php echo $categoria_torneo_id; ?>&tipo_torneo=<?php echo $tipo_torneo; ?>" target="_blank">Gestionar</a>
<div id="alerta"></div>
<?php } ?>
</form>




</div>

<table cellpadding="2" cellspacing="2">
    <tr><td bgcolor="orange"><b>id_api</b></td>
    <td bgcolor="orange">fecha</td>
    <td bgcolor="orange">hora</td>
    <td bgcolor="orange">local</td>
    <td bgcolor="orange">visitante</td>
    <td></td>
    <td bgcolor="yellow"><b>id_fm</b></td>
    <td bgcolor="yellow">fecha</td>
    <td bgcolor="yellow">hora</td>
    <td bgcolor="yellow">local</td>
    <td bgcolor="yellow">visitante</td>
    <td></td>
    </tr>
<?php 
foreach ($datos as $key => $partido) {
    $partidoAPI = $partido['match_id'];
    $fecha = $partido['match_date'];
    $hora = $partido['match_time'];
    $local = $partido['match_hometeam_name'];
    $visitante = $partido['match_awayteam_name'];

    $pos = strpos($local, '/');
    if ($pos > 0) {
        continue;
    }
    $pos = strpos($visitante, '/');
    if ($pos > 0) {
        continue;
    }

    $colorFondo = '#FFFFFF';
    if ($fecha == $hoy) {
        $colorFondo = '#F3E2A9';
    } ?>
<tr style="background-color: <?php echo $colorFondo; ?>">
<td><b><?php echo $partidoAPI; ?></b></td>
<td><?php echo $fecha; ?></td>
<td><?php echo $hora; ?></td>
<td><?php echo $local; ?></td>
<td><?php echo $visitante; ?></td>
	
<?php 

include 'paises.php';

    
        $local = str_replace('Atletico Madrid', 'Atlético de Madrid', $local);
        $visitante = str_replace('Atletico Madrid', 'Atlético de Madrid', $visitante);
        $local = str_replace('Atletico Baleares', 'Baleares', $local);
        $visitante = str_replace('Atletico Baleares', 'Baleares', $visitante);
        $local = str_replace('Atletico Saguntino', 'Saguntino', $local);
        $visitante = str_replace('Atletico Saguntino', 'Saguntino', $visitante);
        $local = str_replace('Pena Sport', 'Peña', $local);
        $visitante = str_replace('Pena Sport', 'Peña', $visitante);
        $local = str_replace('Deportivo La Coruna', 'La Coruña', $local);
        $visitante = str_replace('Deportivo La Coruna', 'La Coruña', $visitante);

        $l = explode(' ', $local);
        if (count($l) > 1) {
            $l2 = '';
            foreach ($l as $value) {
                if (strlen($value) > strlen($l2) && 'Dinamo' != $value && 'Mladost' != $value) {
                    $l2 = $value;
                }
            }
            $local = $l2;
        }

        $v = explode(' ', $visitante);
        if (count($v) > 1) {
            $v2 = '';
            foreach ($v as $value) {
                if (strlen($value) > strlen($v2) && 'Dinamo' != $value && 'Mladost' != $value) {
                    $v2 = $value;
                }
            }
            $visitante = $v2;
        }
    

    
        $consulta = "SELECT p.id, p.partidoAPI, ec.nombre local, ef.nombre visitante, p.fecha, p.hora_prevista FROM partido p 
	INNER JOIN equipo ec ON p.equipoLocal_id=ec.id
	INNER JOIN equipo ef ON p.equipoVisitante_id=ef.id
	WHERE p.fecha='".$fecha."' AND p.temporada_id=".$temporada_id." AND
	(ec.nombre LIKE '%".$local."%' OR ef.nombre LIKE '%".$visitante."%')";



    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC); ?>
<td bgcolor="gainsboro"><?php 
//imp($r);
if (count($r) > 0) {
    $partido_id = $r['id'];
    //echo $r['id'];?>
	<span style="cursor:pointer; color:blue" onclick="editar_campo(<?php echo $partido_id; ?>,0)">Edit</span>
	<div id="editCampo-<?php echo $partido_id; ?>"></div>
<?php
} else {
        $partido_id = 0;
        $consulta = 'SELECT p.id, p.partidoAPI, ec.nombre local, ef.nombre visitante, p.fecha, p.hora_prevista FROM partido p 
	INNER JOIN equipo ec ON p.equipoLocal_id=ec.id
	INNER JOIN equipo ef ON p.equipoVisitante_id=ef.id
	WHERE p.partidoAPI='.$partidoAPI;
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
        if (count($r) > 0) {
            ?>
	<span style="cursor:pointer; color:blue" onclick="vincular_campo(<?php echo $r['id']; ?>,0)">(<?php echo $r['id']; ?>) DESVINCULAR</span>
	<div id="vinculCampo-<?php echo $r['id']; ?>"></div>
	<?php
        } else {
            ?>
	<span style="cursor:pointer; color:blue" onclick="vincular_campo(0,<?php echo $partidoAPI; ?>)">Vincular</span>
	<div id="vinculCampo-<?php echo $partidoAPI; ?>"></div>	
	<?php
        } ?>

	
<?php
    } ?>
</td>
<td bgcolor="orange">
<?php if ($r['partidoAPI'] > 0 && $partidoAPI == $r['partidoAPI']) {
        ?>
<b><?php echo $r['partidoAPI']; ?></b>
<?php
    } else {
        ?>
<spam style="background-color: white; color:red"><?php echo $r['partidoAPI']; ?></spam>
<?php
    } ?>
</td>
<td bgcolor="gainsboro"><?php echo $r['fecha'];?></td>
<td bgcolor="gainsboro"><?php echo $r['hora_prevista'];?></td>
<td><?php echo $r['local']; ?></td>
<td><?php echo $r['visitante']; ?></td>
<td>
<form method="post" class="formulario" id="form<?php echo $partido_id; ?>" onsubmit="submitPartidoApi(event, $(this).serialize(),<?php echo $partido_id; ?>)">
<input type="hidden" name="partido_id" value="<?php echo $partido_id; ?>">
<input type="hidden" name="partidoAPI" value="<?php echo $partidoAPI; ?>">

<?php if ($partido_id > 0) {
    ?>
<input type='submit' name='grabar' value='Grabar'>
<?php } ?>

</form></td>
<td><div id="alerta-<?php echo $partido_id; ?>"></div></td>
	
</tr>
<?php 
//if ($partidoAPI==212536) {echo $consulta."<br />"; die;	}
} ?>
</table>

</body>
</html>