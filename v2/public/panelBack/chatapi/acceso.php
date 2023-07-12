<?php


$instanceId = '303713';
$token = 'lesxd4gz36b4b7up';


if (isset($_GET['group']) && $_GET['group']==1){

	require_once '../includes/funciones.php';
	$mysqli = conectar();

	//$avatarP=file_get_contents('avatarP2.txt');	
	//$avatarG=file_get_contents('avatarG2.txt');
	//son muy grandes
	//'preview96' => $avatarP,
	//'avatar640' => $avatarG


	var_dump($_GET);

	$avatarP='';$avatarG='';

	echo '<br />Nombre del chat:'.$_GET['txt'];
	$modo='group';
	$url = 'https://api.chat-api.com/instance'.$instanceId.'/'.$modo.'?token='.$token;
	$data = [
	    'groupName' => $_GET['txt'],
	    'phones' => '34678558201',
	    'messageText' => 'Grupo creado'
	];

	$json = json_encode($data); // Encode data to JSON
	$options = stream_context_create(['http' => [ 
	        'method'  => 'POST',
	        'header'  => 'Content-type: application/json',
	        'content' => $json
	    ]
	]);
	
	$result = file_get_contents($url, false, $options);
	$result=json_decode($result);

	var_dump($result);

	

	$sql='UPDATE torneo SET whatsapp="'.$result->chatId.'",whatsapp_url="'.$result->groupInviteLink.'" WHERE id='.$_GET['torneo_id'];
	mysqli_query($mysqli, $sql);

	$sql='UPDATE temporada_equipo SET grupo=1 WHERE temporada_id=(SELECT id FROM temporada WHERE torneo_id='.$_GET['torneo_id'].')';
	mysqli_query($mysqli, $sql);

	die('finalizado');
	
	
}


if (isset($_POST['sendMessage'])){

	$modo='sendMessage';
	$url = 'https://api.chat-api.com/instance'.$instanceId.'/'.$modo.'?token='.$token;
	
	//$telefono='+34'.$_POST['telefono'];
	$chatId=$_POST['id_chat'];
	$txt=$_POST['txt'];

	$data = [
		    'chatId' => $chatId, // Receivers phone
		    'body' => $txt, // Message
		];
		$json = json_encode($data); // Encode data to JSON


		$options = stream_context_create(['http' => [
		        'method'  => 'POST',
		        'header'  => 'Content-type: application/json',
		        'content' => $json
		    ]
		]);
		// Send a request
		$result = file_get_contents($url, false, $options);
		$result=json_decode($result);

		var_dump($result);

		if ($result->sent==true){ 
			echo 'OK';
		}


		die;
}

if (isset($sendMessageTel) && $sendMessageTel==1){
	$modo='sendMessage';
	$url = 'https://api.chat-api.com/instance'.$instanceId.'/'.$modo.'?token='.$token;
	$tel='34'.$telefono;

	//echo '<br />'.$tel;
	//echo '<br />'.$txt;

	
	$data = [
		    'phone' => $tel, // Receivers phone
		    'body' => $txt, // Message
		];
		$json = json_encode($data); // Encode data to JSON


		$options = stream_context_create(['http' => [
		        'method'  => 'POST',
		        'header'  => 'Content-type: application/json',
		        'content' => $json
		    ]
		]);
		// Send a request
		$result = file_get_contents($url, false, $options);
		$result=json_decode($result);

		//imp($result);


		if ($result->sent==true){ 			
			$resultado=1;
		} else {
			echo 'Algún problema al enviar whatsapp con información al cliente. No se ha podido enviar.';
		}


}






if (isset($verGrupo) && $verGrupo==1){

$id_chat=str_replace('@','%40',$id_whats);
$url = 'https://api.chat-api.com/instance'.$instanceId.'/dialog?token='.$token.'&chatId='.$id_chat;
//echo $url;
$result = file_get_contents($url);
$result = json_decode($result);

echo ' - '.count($result->metadata->participants).' participantes';

}



if (isset($_GET['sendMessage'])){

	//poner en temporada_equipo el valor 1 al campo grupo.
	//añadir la temporada_id en traspasar jugadores.



	$modo='sendMessage';
	$url = 'https://api.chat-api.com/instance'.$instanceId.'/'.$modo.'?token='.$token;

	
	
	//$telefono='+34'.$_POST['telefono'];
	$chatId=$_GET['id_chat'];
	$txt=$_GET['txt'];

	    $data = [
		    'chatId' => $chatId, // Receivers phone
		    'body' => $txt, // Message
		];

		$json = json_encode($data); // Encode data to JSON
		$options = stream_context_create(['http' => [
		        'method'  => 'POST',
		        'header'  => 'Content-type: application/json',
		        'content' => $json
		    ]
		]);

		if (!empty($chatId)){
			// Send a request
			$result = file_get_contents($url, false, $options);
			$result=json_decode($result);

			//print_r($result);

			if ($result->sent==true){ 
				echo '<br />Se ha enviado whatsapp con información al usuario...';

				 //mail('futbolme@gmail.com','Correcto Ligas - whatsapp',$txt.' - temporada_id='.$_GET['temporada_id'],'futbolme@futbolme.com');

			} else {
				echo '<br />Algún problema al enviar whatsapp con información al cliente. No se ha podido enviar.';

				//mail('futbolme@gmail.com','in-correcto Ligas - whatsapp',$txt.' - temporada_id='.$_GET['temporada_id'],'futbolme@futbolme.com');
			}

		}
			
}
?>

