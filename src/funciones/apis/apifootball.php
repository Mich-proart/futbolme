<?php

$fin=$fin??'2020-12-31';
$d=$d??'';
$liga=$liga??'';

$APIkey = '3629afd5a679bca50b3d3f77c64225affb76c7cb9a5677a2b5ff560b0b589e13';
$clau="&APIkey=".$APIkey;
$metodo = 'action=get_events';
$from = '&from='.$inicio;
$to = '&to='.$fin;
$metodo .= $from.$to.$liga.$d;


//$jornada="&match_id=".$jornada_id;
$url = 'https://apifootball.com/api/?'.$metodo.$clau;




