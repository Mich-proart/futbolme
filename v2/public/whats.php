<?php

$hoy = new \DateTime();
$hoy = $hoy->format('Y-m-d');


$ayer = new \DateTime();
$ayer = \DateTime::createFromFormat('Y-m-d', $hoy);
$ayer = $ayer->modify('-1 day')->format('Y-m-d');

//print_r($_POST);

include ('panelBack/includes/funciones.php');

switch ($_POST['temporada_id']) {
	case 1:
		$nombreTorneo='PRIMERA DIVISIÓN';
		$id_chat='34681924160-1626154007@g.us';
		$enlace_chat='https://chat.whatsapp.com/DvRFpMFULRaFjo35Rka99a';
		break;
	case 2:
		$nombreTorneo='SEGUNDA DIVISIÓN';
		$id_chat='34681924160-1626158091@g.us';
		$enlace_chat='https://chat.whatsapp.com/I2vt26vueY6KAUVaEIfxpj';
		break;
	case 3055:
		$nombreTorneo='1ª DIVISIÓN RFEF - Grupo 1';
		$id_chat='34681924160-1626158233@g.us';
		$enlace_chat='https://chat.whatsapp.com/IDRG62EYrsW3IYM0FnDbPm';
		break;
	case 3056:
		$nombreTorneo='1ª DIVISIÓN RFEF - Grupo 2';
		$id_chat='34681924160-1626158317@g.us';
		$enlace_chat='https://chat.whatsapp.com/ECtvaT6e4ABD43QLI1boOr';
		break;
	case 3057:
		$nombreTorneo='2ª DIVISIÓN RFEF - Grupo 1';
		$id_chat='34681924160-1626158442@g.us';
		$enlace_chat='https://chat.whatsapp.com/IjZLxQlIKnxEQ7owSfbxYm';
		break;
	case 3058:
		$nombreTorneo='2ª DIVISIÓN RFEF - Grupo 2';
		$id_chat='34681924160-1626158515@g.us';
		$enlace_chat='https://chat.whatsapp.com/G6lc70XLGvIGii8VESCxgz';
		break;
	case 3059:
		$nombreTorneo='2ª DIVISIÓN RFEF - Grupo 3';
		$id_chat='34681924160-1626158570@g.us';
		$enlace_chat='https://chat.whatsapp.com/CYZ8Bld9MkfBlFABG6AtSj';
		break;
	case 3060:
		$nombreTorneo='2ª DIVISIÓN RFEF - Grupo 4';
		$id_chat='34681924160-1626158659@g.us';
		$enlace_chat='https://chat.whatsapp.com/LF0xiV7XYxC4QBPaA4rNBL';
		break;
	case 3061:
		$nombreTorneo='2ª DIVISIÓN RFEF - Grupo 5';
		$id_chat='34681924160-1626158712@g.us';
		$enlace_chat='https://chat.whatsapp.com/GXkUra3aBS9C96AO68xdcw';
		break;
	case 214:
		$nombreTorneo='PRIMERA DIVISIÓN FEMENINA';
		$id_chat='34681924160-1626930899@g.us';
		$enlace_chat='https://chat.whatsapp.com/LkQyXt8xZFAFcUFothOE2u';
		break;
	
	default: 

		$mysqli = conectar();
            $sql='SELECT whatsapp, nombre, whatsapp_url FROM torneo WHERE id=(SELECT torneo_id FROM temporada WHERE id='.$_POST['temporada_id'].')';
            $resultadoSQL = mysqli_query($mysqli, $sql);
            $r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
            if (!empty($r)){ 
                $id_chat=$r['whatsapp'];
                $nombreTorneo=$r['nombre']; 
                $enlace_chat=$r['whatsapp_url']; 
            } else { 
                $id_chat=''; 
                echo 'Elige un grupo válido ';?>

				<h4><a href="https://futbolme.com">Volver a futbolme.com</a></h4>

				<?php die;
            }
            	
	break;
}

$telefono=$_POST['telefono'];



	$sendMessageTel=1;$resultado=0;
	$txt='Bienvenido al grupo  de whatsapp de '.$nombreTorneo.' - Pulsa en el enlace y unete al grupo. '.$enlace_chat.' (Si el enlace no está activo es porque tienes que agregar primero este número en tus contactos.)';

	include 'panelBack/chatapi/acceso.php';

	if ($resultado==1){

		//$sql='INSERT INTO telefono (numero,temporada_id) VALUES ("'.$telefono.'","'.$_POST['temporada_id'].'")';
		//mysqli_query($mysqli, $sql);
		echo 'Se ha enviado el mensaje de invitación. Gracias por unirte al grupo.';

	} else {

	echo 'No se ha podido enviar el mensaje de invitación para unirse al grupo';

	}



?>
<h4><a href="https://futbolme.com">Volver a futbolme.com</a></h4>

<?php die; ?>