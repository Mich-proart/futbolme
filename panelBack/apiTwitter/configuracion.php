<meta charset="utf-8">
<?php
 ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
$cadena = $_GET['cadena'];

$twitterObject = new Twitter();
$jsonraw = $twitterObject->getJsonTweets($cadena, 100);
$rawdata = $twitterObject->getArrayTweets($jsonraw);
$twitterObject->displayTable($rawdata);



class Twitter
{
    public function getJsonTweets($query, $num_tweets)
    {
        require_once 'TwitterAPIExchange.php';

        $claveApi='4wzNd8fyaskkfNm4ewX72KG2Q';
        $claveSecreta='p8tuPLO0kyyqvZOzoH5D2HE5CBEAWyLIeob5iRv9qxBxWV8MwY';
        $tokenTwitter='1298181681229312001-R2VHc5G2VQIFF6TBC59iKWAU3Nanuq';
        $tokenSecreto='OExyAXoDgEyFdSzipbeCSWs8Gha6O8uDy4QeloYkGQtq3';

        $settings = array(
            'oauth_access_token' => $tokenTwitter,
            'oauth_access_token_secret' => $tokenSecreto,
            'consumer_key' => $claveApi,
            'consumer_secret' => $claveSecreta
        );



        
        if ($num_tweets > 100) {
            $num_tweets = 100;
        }
        $url = 'https://api.twitter.com/1.1/search/tweets.json';
        $getfield = '?q='.$query.'&count='.$num_tweets.'&result_type=recent';
        $requestMethod = 'GET';
        $twitter = new TwitterAPIExchange($settings);
        $json = $twitter->setGetfield($getfield)
                      ->buildOauth($url, $requestMethod)
                      ->performRequest(true, array(CURLOPT_CAINFO => __DIR__.'/cacert.pem'));

        return $json;
    }

    //dentro de performRequest: true, array(CURLOPT_CAINFO => dirname(__FILE__) . '/cacert.pem')

    public function getArrayTweets($jsonraw)
    {
        $rawdata = [];
        $json = json_decode($jsonraw, true);
//        $num_items = count($json);
        
        $json = $json['statuses'];

        $contador = 0;

        foreach ($json as $key => $value) {
            /*if ($key==0) {
                 echo "<pre>";
                 print_r($value);
                 echo "</pre>";
             }*/

            $fecha = $value['created_at'];
            $tweet = $value['text'];

            if ('RT' == substr($tweet, 0, 2)) {
                continue;
            }

            $rawdata[$key][0] = $fecha;
            $rawdata[$key]['FECHA'] = $fecha;
            $rawdata[$key][1] = $tweet;
            $rawdata[$key]['tweet'] = $tweet;

            $palabras = 'arranca|final|descanso|comienza|gol|gool|goool|gooool|goooool|gooooool';

            if (preg_match('/'.$palabras.'/i', $tweet)) {
                $colorFondo = 'gainsboro';
            } else {
                $colorFondo = 'white';
            }

            ++$contador; ?>


    <div style="width:100%; padding: 2px; color:black; clear:both; border-bottom: 1px solid black; background-color: <?php echo $colorFondo; ?>">
    <?php echo $contador.' - '.substr($fecha, 0, 20).' :: '.$tweet; ?>        
    </div>

    <?php
        }

        die;

        return $rawdata;
    }

    public function displayTable($rawdata)
    {
        //DIBUJAMOS LA TABLA
        echo '<table border=1>';
        $columnas = count($rawdata[0]) / 2;
        //echo $columnas;
        $filas = count($rawdata);
        //echo "<br>".$filas."<br>";
        //Añadimos los titulos
        for ($i = 1; $i < count($rawdata[0]); $i = $i + 2) {
            next($rawdata[0]);
            echo '<th><b>'.key($rawdata[0]).'</b></th>';
            next($rawdata[0]);
        }
        for ($i = 0; $i < $filas; ++$i) {
            echo '<tr>';
            for ($j = 0; $j < $columnas; ++$j) {
                echo '<td>'.$rawdata[$i][$j].'</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    }
}
