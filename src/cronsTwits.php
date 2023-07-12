<?php


require "../twitteroauth/autoload.php";


use Abraham\TwitterOAuth\TwitterOAuth;

const CONSUMER_KEY = 'pnF0qfFtonZzsOsRUwrSAb4Zr';
const CONSUMER_SECRET = 'iGXvD70txRwBKeyLLM6y220TYFLVJrXSSvqRDxsmThap6u6XoK';
$access_token = '484030348-XnuBgEEq2Ln9TtVWWJM12vUs007IxBtAjeOOKXUX';
$access_token_secret = 'H0iW6wFbJVxB8syw4zgsBKh0sW7nnLzFsjgJb3dYyC5Ez';



try {
    $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token, $access_token_secret);
    $connection->setTimeouts(7, 10);
} catch (\Exception $e) {
    //do Nothing
}


if (!empty($twit)) {
    try {
        $connection->post('statuses/update', ['status' => $twit]);
        echo "ok";
    } catch (\Exception $e) {
        //do Nothing
      echo "ko";
    }
}
