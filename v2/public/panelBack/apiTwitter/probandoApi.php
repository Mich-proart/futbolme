<?php
define('_FUTBOLME_', 1);
require_once ('../../src/funciones.php');
require_once('TwitterAPIExchange.php');

$claveApi='4wzNd8fyaskkfNm4ewX72KG2Q';
$claveSecreta='p8tuPLO0kyyqvZOzoH5D2HE5CBEAWyLIeob5iRv9qxBxWV8MwY';
$tokenTwitter='1298181681229312001-R2VHc5G2VQIFF6TBC59iKWAU3Nanuq';
$tokenSecreto='OExyAXoDgEyFdSzipbeCSWs8Gha6O8uDy4QeloYkGQtq3';



//AAAAAAAAAAAAAAAAAAAAAHCJHAEAAAAAfgMcG92uVdXv3ITd1nHVykWwHGs%3Dyos9gDhkUu5SwjTisxtOc3OFxatooizuB683RwlSfYbIeTd2PI



$settings = array(
    'oauth_access_token' => $tokenTwitter,
    'oauth_access_token_secret' => $tokenSecreto,
    'consumer_key' => $claveApi,
    'consumer_secret' => $claveSecreta
);


$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$getfield = '?screen_name=alex_esquiva&count=100';        
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
$json =  $twitter->setGetfield($getfield)
                     ->buildOauth($url, $requestMethod)
                     ->performRequest();

imp($json);
?>