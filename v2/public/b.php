<?php


// create curl resource
/*
$ch = curl_init();

$url = 'https://api.betsapi.com/v2/events/upcoming?sport_id=1&token=7865-b0PXlPMI94xvu3&league_id=50&page=1';

var_dump($url);

// set url
curl_setopt($ch, CURLOPT_URL, $url);

//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $output contains the output string
$output = curl_exec($ch);

// close curl resource to free up system resources
curl_close($ch);

var_dump(curl_getinfo($ch));

var_dump($output);
*/

$ping = shell_exec("ping -c 1 api.betsapi.com");


var_dump($ping);