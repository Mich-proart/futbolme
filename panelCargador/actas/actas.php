<?php

$fallo=0;
foreach ($proxis as $key => $value) {
    $proxi=$value['ip'];
    $id_proxi=$value['id']; 
    $uso_proxi=$value['uso'];
    $html = new simple_html_dom();
    $content=getPage($url,$proxi,$id_proxi); 

    if (strlen($content)>1000) { break; }
    $sql='UPDATE '.$bd.' SET fallo=fallo+1  WHERE id='.$id_proxi;
    mysqli_query($mysqliFB, $sql); 
    unset($proxis[$key]);unset($proxi);unset($id_proxi);unset($uso_proxi);
    $html->clear();
    unset($html);  
    $totalProxis=count($proxis);
    echo ' - Quedan '.$totalProxis.' proxis por usar<br />';
    if ($totalProxis==0){ $fallo=1;break; }
}
echo '<br />fallo='.$fallo.'<br />';

if ($fallo==0){
$sql='UPDATE '.$bd.' SET uso=uso+1 WHERE id='.$id_proxi;
mysqli_query($mysqliFB, $sql); 
echo '<br />----proxi: '.$id_proxi.' uso: '.$uso_proxi; 
switch ($comunidad_id) {
    case 2:
    case 6:
    case 8:
    case 15:
        include('../panelBack/simple/'.$carpeta.'/extraerActa.php');
        break;
    case 1: 
    case 13:            
    case 14:
    case 16:
    case 17:
    	include('../panelBack/simple/'.$carpeta.'/extraerActa01.php'); break; 
    case 3:
    case 9:
    case 10:                 
        include('../panelBack/simple/'.$carpeta.'/extraerActa.php');
        break;     
        
    case 5:include('../panelBack/simple/'.$carpeta.'/extraerActaCat.php');break; 
    case 7:
    case 11: //faltaria grabar el id acta.
    case 18:  
        include('../panelBack/simple/'.$carpeta.'/extraerActaM.php');
        break;
    case 0:  
        include('../panelBack/simple/'.$carpeta.'/extraerActa2.php');
        break;
}

$html->clear();
unset($html); 


echo $file.'<br />';
guardarJSON($jugador, $file);
$txt='Fichero creado';
// si fallo es cero

} else { echo 'No se ha podido grabar el fichero '.$file.'<br />';$txt='Fichero FALLADO'; }




?>

