<?php
$token="7865-b0PXlPMI94xvu3";

//Próximos eventos:
$inicio=str_replace("-", "", $inicio);
$u1='https://api.betsapi.com/v1/events';
$u2='https://api.betsapi.com/v2/events';

if (isset($api_id)){
	$pagina=$_GET['pagina']??1;	
	if (isset($proximos)){			
		$url=$u2.'/upcoming?sport_id=1&token='.$token.'&league_id='.$api_id.'&page='.$pagina;
	} elseif (isset($recuperar)) {
		$url=$u2.'/ended?sport_id=1&token='.$token.'&league_id='.$api_id.'&page='.$pagina.$inicio;
	} else {
		$url=$u1.'/inplay?sport_id=1&token='.$token.'&league_id='.$api_id.'&day='.$inicio;
	}

} else {
$url='https://api.betsapi.com/v1/events/inplay?sport_id=1&token='.$token.'&day='.$inicio;
}

//en juego= inplay
//próximos= 

