<?php 
set_time_limit(0);

define('_FUTBOLME_', 1);

require_once '../../src/consultas.php';
require_once '../../src/funciones.php';


?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<link href="/css/bootstrap.min.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/main.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/style.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<noscript><link rel="stylesheet" href="/css/allcss.css?v=<?php echo $static_v; ?>"></noscript>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/js/federacion.js?=<?php echo $static_v; ?>"></script>
</head>
<body>

	<div style="padding: 10px; background-color: white">

<?php
$mysqli = conectar();

	$carpeta='../../img/equipos';
	$carpeta2='../../img/club';
	$directorio = opendir($carpeta); //ruta actual
    $equipos=array();
      while ($archivo = readdir($directorio)) {  
        if ($archivo=="." || $archivo=="..") { continue; } 
        if (substr($archivo,-4)!='.png') { continue; } 
        //$archivos[] = $archivo;  
        $equipo_id=str_replace('escudo', '', $archivo); 
        $equipo_id=str_replace('.png', '', $equipo_id);
        $equipos[]=$equipo_id;        
      } 

     $clubs=array();
     foreach ($equipos as $key => $value) {
     	if ($value<1){ continue; }
     	$sq='SELECT club_id FROM equipo WHERE id='.$value;
     	
     	$resultadoSQL = mysqli_query($mysqli, $sq);
    	$r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
    	if (count($r)>0){
    		$clubs[$r['club_id']]=$value;
    	} else {
    		echo $sq.'<br />';
    	}

     }

     //imp($clubs);

     $contador=0;
     foreach ($clubs as $key => $value) {
     	//echo ' clubid: '.$key.' equipo_id: '.$value.'<br />';
     	rename ($carpeta.'/escudo'.$value.'.png',$carpeta2.'/escudo'.$key.'.png');
     	//$contador++;
     	//if ($contador>10){ break; }
     }

?>