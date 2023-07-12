<?php
define('_FUTBOLME_', 1);

require_once '../consultas.php';
require_once '../funciones.php';
include('../../simple/simple_html_dom.php');


$clubs=$_POST['data'];
$comunidad_id=$clubs[0];

include ('urlFederaciones.php');


$mysqli = conectar(); 
$mysqliFM = conectarFM(); 
$sql='SELECT id,ip FROM proxis WHERE fallo=0 AND estado=0 ORDER BY uso DESC';
$resultadoSQL = mysqli_query($mysqli, $sql);
$proxis = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC); 

$totalProxis=count($proxis);

//imp($url); 
foreach ($clubs as $k1 => $v) {
	if ($k1==0){ continue; } //comunidad_id;
 	$url=$urlClub.$v;

 	echo $url.'<br />';

	
		$proxi=$proxis['ip'];
		$id_proxi=$proxis['id'];
		//imp($proxi);
		//imp($id_proxi);
		$html = new simple_html_dom();
		$content=getPage($url,$proxi,$id_proxi);  

		
		if (substr($content, 0,5)=='proxy') { 
			echo $content.'<hr />';
			$sql='UPDATE proxis SET fallo=fallo+1  WHERE id='.$id_proxi;
			echo $sql.'<br />';
			mysqli_query($mysqli, $sql); 
			echo 'finalizado por error en proxi '.$proxi;
			die; 
		}
		
		

	$sql='UPDATE proxis SET uso=uso+1 WHERE id='.$id_proxi;
	mysqli_query($mysqli, $sql); 

	$string = str_get_html($content);
	$html->load($string);
	$datos=array();

	foreach($html->find('div.desc') as $kt => $tr){  
		if ($kt==0){      
	        $datos['codigo'] = trim($tr->find('h5', 0)->plaintext);
	        $datos['localidad'] = trim($tr->find('h5', 4)->plaintext);
	        $datos['cp'] = trim($tr->find('h5', 6)->plaintext);
	        $datos['web'] = trim($tr->find('h5', 7)->plaintext);   
	    } 	
	    if ($kt==1){      
	        $datos['camiseta'] = trim($tr->find('h5', 0)->plaintext);
	        $datos['pantalon'] = trim($tr->find('h5', 1)->plaintext);
	        $datos['medias'] = trim($tr->find('h5', 2)->plaintext);
	    } 	
	    if ($kt==2){      
	        $datos['email'] = trim($tr->find('h5', 6)->plaintext);
	    } 
	    if ($kt==3){      
	        $datos['telefonos'] = trim($tr->find('h5', 0)->plaintext);
	    } 	
    } 

    
    $codigo=explode(':',$datos['codigo']); $co=trim($codigo[1]);
    $localidad=explode(':',$datos['localidad']); $l=trim($localidad[1]);
    $cpostal=explode(':',$datos['cp']); $cp=trim($cpostal[1]);
    $web=explode(':',$datos['web']); $w=trim($web[1]);
    $camiseta=explode(':',$datos['camiseta']); $ca=trim($camiseta[1]);
    $pantalon=explode(':',$datos['pantalon']); $pa=trim($pantalon[1]);
    $medias=explode(':',$datos['medias']); $me=trim($medias[1]);
    $email=explode(':',$datos['email']); $em=trim($email[1]);
    $telefonos=explode(':',$datos['telefonos']); $te=trim($telefonos[1]);

    $largo=strlen($co);
	  switch ($largo) {
	    case 1: $codigoFed='0000'.$co;break;
	    case 2: $codigoFed='000'.$co;break;
	    case 3: $codigoFed='00'.$co;break;
	    case 4: $codigoFed='0'.$co;break;
	    case 5: $codigoFed=$co;break;
	  }

	 $sql='SELECT id FROM club WHERE codigoRFEF="'.$codigoFed.'" AND territorialRFEF="'.$territorial.'"';
     $resultadoSQL = mysqli_query($mysqliFM, $sql);
	 $club = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC); 
	 if (count($club)>0){ $club_id=$club['id'];} else { $club_id=0; }  

	$sql='UPDATE club SET id_futbolme='.$club_id.', federacion_ref='.$co.', localidad="'.$l.'", cp="'.$cp.'", web="'.$w.'", camiseta="'.$ca.'", pantalon="'.$pa.'", medias="'.$me.'", email="'.$em.'", telefonos="'.$te.'" WHERE federacion_id='.$v.' AND comunidad_id='.$comunidad_id;
	echo $sql.'<br />';
    mysqli_query($mysqli, $sql);

	$html->clear();
    unset($html); 

} //clubs

die('Finalizado Ok');





?>
