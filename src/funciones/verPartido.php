<?php 
define('_FUTBOLME_', 1);
require_once '../../src/config.php';

$id = $_POST['id'];
$modo = $_POST['modo'];

    if ($modo==1){
        $token="7865-b0PXlPMI94xvu3";
        $url="https://api.betsapi.com/v1/event/view?token=".$token."&event_id=".$id;
        $resultado = file_get_contents($url);            
        $resultado =json_decode($resultado,true);         
        echo "Partido Betsapi id:".$id;
        echo "<pre>";
        echo print_r($resultado);
        echo "</pre>";
    } else {
        $token='3629afd5a679bca50b3d3f77c64225affb76c7cb9a5677a2b5ff560b0b589e13';
        $url='https://apifootball.com/api/?action=get_events&match_id='.$id.'&APIkey='.$token;
        $resultado = file_get_contents($url); 
        $resultado =json_decode($resultado,true); 
        echo "Partido Apifootball id:".$id;
        echo "<pre>";
        echo print_r($resultado);
        echo "</pre>";

    }
?>
