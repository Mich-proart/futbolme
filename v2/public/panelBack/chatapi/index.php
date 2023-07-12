<?php
require_once '../includes/config.php'; //include funciones,consultas, post y fechas
require_once '../includes/head.php';


if (isset($_GET['modo']) && $_GET['modo']=='removeChat'){
	$quitarGrupo=1;$id_chat=$_GET['id_chat'];	
	$_GET['modo']=='dialogs';
}



include 'acceso.php';

$modo=$_GET['modo']??'dialogs';


$urlEstado = 'https://api.chat-api.com/instance'.$instanceId.'/status?token='.$token;
$result = file_get_contents($urlEstado);
$result = json_decode($result);

	if ($result->accountStatus=='authenticated'){
		echo '<h2>Whatsapp funcionando correctamente. Teléfono 681924160</h2>';
		
	} else {

		echo '<h3>Escanea el codigo QR para volver a activar whatsapp</h3>';

	}

	
	$urlQr ='https://api.chat-api.com/instance'.$instanceId.'/qr_code?token='.$token;?>
	<img src="<?php echo $urlQr?>" />

<?php 



$url = 'https://api.chat-api.com/instance'.$instanceId.'/dialogs?token='.$token.'&order=desc';


$result = file_get_contents($url);

$result = json_decode($result);

//imp($result->dialogs);


?>
<body>
<table class="table" style="padding:10px">
	<tr bgcolor="lavender">
		<td>Torneo</td>
		<td>ID chat</td>
		<td>Nombre chat / Enlace</td>

		<td>Participantes</td>

		<td>Actividad</td>
		
	</tr>
<?php


foreach ($result->dialogs as $k => $v) {


	
	$id_chat=$v->id;
	$nombre_chat=$v->name;
	$n1=explode(':', $v->name);	
	
	$participantes='';
	$p=$v->metadata->participants;

	$invite=$v->metadata->groupInviteLink;

	foreach ($p as $k1 => $v1) {
		if ($v1=='34681924160@c.us'){ $tel_empresa=1; }
		$participantes.=$v1.',';
	}
	$participantes=substr($participantes, 0,-1);

	//if (empty($p)){ continue; }

	
	$actualizado=$v->last_time;

	
    ?>

    <tr bgcolor="yellow">
		<td style="padding:10px"><?php echo $k?></td>
		<td style="padding:10px"><?php echo $id_chat;?></td>
		<td style="padding:10px"><?php echo $nombre_chat?><br /><?php echo $invite?></td>
		<td style="padding:10px"><?php echo $participantes?></td>
		<td style="padding:10px"><?php echo date("d/m/Y",$actualizado)?></td>

	</tr>
	<?php 



 } ?>

</table>

</body>
</html>
