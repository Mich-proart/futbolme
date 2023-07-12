<?php 
$static_v = 9; 
define('_FUTBOLME_', 1);

require_once '../src/consultas.php';
?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/js/ajax.js?=<?php echo $static_v; ?>"></script>
</head>
<body>
<?php


$inicio=date('Y-m-d');
$fin=$inicio;
$api_id=$_GET['id'];
$liga="&league_id=".$api_id;


if ($_GET['api']=='apifootball') {
include '../src/funciones/apis/apifootball.php';
} else {
include '../src/funciones/apis/betsapi.php';	
}

//echo $url;

$resultado = file_get_contents($url);
$resultado = json_decode($resultado, true);



if ($_GET['api']=='apifootball') {
	if (count($resultado)>0){
		echo '<h4>'.$resultado[0]['league_name'].' ('.$resultado[0]['league_id'].') '.$resultado[0]['country_name'].'</h4><table width="500" cellspacing="2" cellpadding="5" bgcolor="gainsboro">';
		foreach ($resultado as $key => $value) {
			echo '<tr bgcolor="white"><td align="right">'.$value['match_hometeam_name'].'</td>
			<td align="left">'.$value['match_awayteam_name'].'</td>
			<td align="center">'.$value['match_id'].'</td></tr>';
		}
		echo '</table>';
	}
} else {
	if (count($resultado['results'])>0){ ?>
	<div style="width:100%; float:left">

		<div style="width:33%; float:left">
	    <?php
		echo '<h4>'.$resultado['results'][0]['league']['name'].' ('.$resultado['results'][0]['league']['id'].') '.$resultado['results'][0]['league']['cc'].'</h4><table width="100%" cellspacing="2" cellpadding="5" bgcolor="gainsboro">';
		foreach ($resultado['results'] as $key => $value) {
			echo '<tr bgcolor="white">
			<td align="center">'.$value['home']['id'].'</td>
			<td align="right">'.$value['home']['name'].' - '.$value['home']['cc'].' - </td>
			<td align="left"> - '.$value['away']['cc'].' - '.$value['away']['name'].'</td>
			<td align="center">'.$value['away']['id'].'</td>
			<td align="center" bgcolor="yellow">

			<form id="f-'.$value['id'].'" method="post" onsubmit="insertarPartidoBetsapi(event, $(this).serialize(),'.$value['id'].')">
		    <input type="hidden" name="id" value="'.$value['id'].'">
		    <input type="hidden" name="local_id" value="'.$value['home']['id'].'">
		    <input type="hidden" name="visitante_id" value="'.$value['away']['id'].'">    
		    <input type="hidden" name="hora" value="'.$value['time'].'">    
		    <input type="submit" name="grabar" value="'.$value['id'].'">
		    </form></td>
			</tr>
			<tr><td colspan="5"><div id="partido-'.$value['id'].'"></div></td></tr>';
		}
		echo '</table>';?>
	    </div>
	    <div style="width:10%; float:left">
	    	<?php 
	    	$paises=listarPaises();
	    	echo '<h4>PAISES</h4><table width="100%" cellspacing="2" cellpadding="5" bgcolor="gainsboro">';
	    	foreach ($paises as $key => $value) {
	    		echo '<tr><td><span onclick="equiposPais('.$value['id'].')" style="background-color:gainsboro; cursor:pointer;">'.$value['nombre'].'</span></td></tr>';
	    	}
	    	echo '</table>';?>
	    </div>
	    <div style="width:50%; float:left" id="equipos-pais"></div>
	</div>
	<?php }
}
?>
</body></html>