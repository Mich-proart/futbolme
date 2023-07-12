<?php
define('_PANEL_', 1);
require_once 'includes/config.php'; //include funciones,consultas, post y fechas
require_once 'includes/post.php';
require_once 'includes/get.php';
require_once 'includes/head.php';?>
</head>
<body>
<?php


$inicio=date('Y-m-d');
$fin=$inicio;
$api_id=$_GET['id'];
$liga="&league_id=".$api_id;
$temporada_id=$_GET['temporada_id'];

$proximos=1;
include 'funciones/apis/betsapi.php';	

//en juego
//$url=$u1.'/inplay?sport_id=1&token='.$token.'&league_id='.$api_id.'&day='.$inicio;

imp($url) ;


//$resultado = file_get_contents($url);


	$ch = curl_init($url);     
    curl_setopt($ch, CURLOPT_FAILONERROR, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);    
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true );
    curl_setopt($ch, CURLOPT_ENCODING, "" );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt($ch, CURLOPT_AUTOREFERER, true );    
    curl_setopt($ch, CURLOPT_MAXREDIRS, 10 );
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_REFERER, 'http://www.google.com/');
    curl_setopt($ch, CURLOPT_AUTOREFERER, true);
    $resultado = curl_exec($ch);
   
    if(curl_errno($ch)) {
        echo curl_error($ch);
        return 'sin proxy:  - ERROR '.curl_error($ch);
    } 
    curl_close($ch);

    $resultado =json_decode($resultado,true);            
   

    


    if (!empty($resultado['results'])){?>
	<div style="width:100%; float:left; background-color: lavender">



		<div style="width:50%; float:left">
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
		    <input type="hidden" name="api_id" value="'.$api_id.'">
		    <input type="hidden" name="id" value="'.$value['id'].'">
		    <input type="hidden" name="temporada_id" value="'.$temporada_id.'">
		    <input type="hidden" name="local_id" value="'.$value['home']['id'].'">
		    <input type="hidden" name="visitante_id" value="'.$value['away']['id'].'"> 
		    <input type="hidden" name="pais_l" value="'.$value['home']['cc'].'">
		    <input type="hidden" name="pais_v" value="'.$value['away']['cc'].'">   
		    <input type="hidden" name="hora" value="'.$value['time'].'">    
		    <input type="submit" name="grabar" value="'.$value['id'].'">
		    </form></td>
			</tr>
			<tr><td colspan="5"><div id="partido-'.$value['id'].'"></div></td></tr>';

			
		}
		echo '</table>';?>
	    </div>
	    <div style="width:50%; float:left">
	    	<?php $partidos=Xpartidos($temporada_id);

	    	echo '<h4>Partidos en futbolme</h4><table width="100%" cellspacing="2" cellpadding="5" bgcolor="gainsboro">';

	    	foreach ($partidos as $key => $value) {
	    		if ($value['estado_partido']==1){ continue; }
	    	echo '<tr bgcolor="white">
			<td align="center">'.$value['equipoLocal_id'].'</td>
			<td align="center">'.$value['jornada'].'</td>
			<td align="right">'.$value['localCorto'].' - </td>
			<td align="left"> - '.$value['visitanteCorto'].'</td>
			<td align="center">'.$value['equipoVisitante_id'].'</td>
			<td align="center">'.$value['id'].'</td>
			<td align="center">'.$value['betsapi'].'</td>
			</tr>';
	    	}
	    	echo '</table>';
	    	?>
	    </div>
	    
	</div>
	<?php 
}
?>
</body></html>

<?php require_once 'includes/ajax.php';?>