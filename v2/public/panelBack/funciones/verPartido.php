<?php 
define('_PANEL_', 1);
require_once '../includes/config.php';

$id = $_POST['id'];
$modo = $_POST['modo'];

    if ($modo==1){ ?>
    <div style="width: 500px; background-color:lavender; padding: 5px;">

        <?php 
        //$token="7865-b0PXlPMI94xvu3";

        $token="153716-4djEyj4e6JZVou";

        $url="https://api.betsapi.com/v1/event/view?token=".$token."&event_id=".$id;


        
        $ch = curl_init($url);     
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);    
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true );
        curl_setopt($ch, CURLOPT_ENCODING, "" );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($ch, CURLOPT_AUTOREFERER, true );    
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10 );
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_REFERER, 'http://www.google.com/');
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        $resultado = curl_exec($ch);
        print_r(curl_getinfo($ch));
        if(curl_errno($ch)) {
            echo curl_error($ch);
            return 'sin proxy:  - ERROR '.curl_error($ch);
        } 
        curl_close($ch);          
        $r =json_decode($resultado,true); 
        

        echo '<div style="padding: 5px">';
        echo '<h3>liga</h3>';
        echo $r['results'][0]['league']['name']; 
        echo '</div>';

        echo '<div style="padding: 5px">';
        echo '<h3>partido</h3>';
        echo $r['results'][0]['home']['name'].' - '.$r['results'][0]['away']['name']; 
        echo ' ('.$r['results'][0]['ss'].')'; 
        echo '</div>';

        echo '<div style="padding: 5px">';
        echo '<h3>timer - tiempo</h3>';
        foreach ($r['results'][0]['timer'] as $k => $v) {
            echo '<br />'.$k.' : '.$v;
        }
        echo '</div>'; 

        echo '<div style="padding: 5px">';
        echo '<h3>scores - puntaje</h3>';
        foreach ($r['results'][0]['scores'] as $k => $v) {
            echo '<br />'.$k.' : '.$v['home'].' - '.$v['away'];
        }
        echo '</div>';

        echo '<div style="padding: 5px">';
        echo '<h3>stats - estadísticas</h3>';
        foreach ($r['results'][0]['stats'] as $k => $v) {
            echo '<br />Local '.$k.' : '.$v[0];
            echo '<br />Visitante '.$k.' : '.$v[1].'<hr />';
        }
        echo '</div>';

        echo '<div style="padding: 5px">';
        echo '<h3>extra</h3>';
        foreach ($r['results'][0]['extra'] as $k => $v) {
            echo $k;
            if (is_array($v)){
                foreach ($v as $key => $value) {
                    echo '<br />'.$key.' : '.$value;
                }
                echo '<hr />';

            } else {
                echo ' - '.$v.'<hr />';
            }

        }
        echo '</div>';

        echo '<div style="padding: 5px">';
        echo '<h3>eventos</h3>';
        foreach ($r['results'][0]['events'] as $k => $v) {
            echo '<br />'.$v['text'];
        }
        echo '</div>';
        
         
        
        if ($r['results'][0]['has_lineup']==1){
           $url="https://api.b365api.com/v1/event/lineup?token=".$token."&event_id=".$id;
           $ch = curl_init($url);     
            curl_setopt($ch, CURLOPT_FAILONERROR, true);
            curl_setopt($ch, CURLOPT_HEADER, 0);    
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true );
            curl_setopt($ch, CURLOPT_ENCODING, "" );
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
            curl_setopt($ch, CURLOPT_AUTOREFERER, true );    
            curl_setopt($ch, CURLOPT_MAXREDIRS, 10 );
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_REFERER, 'http://www.google.com/');
            curl_setopt($ch, CURLOPT_AUTOREFERER, true);
            $alineaciones = curl_exec($ch);
            print_r(curl_getinfo($ch));
            if(curl_errno($ch)) {
                echo curl_error($ch);
                return 'sin proxy:  - ERROR '.curl_error($ch);
            } 
            curl_close($ch);            
           $a =json_decode($alineaciones,true); 


           ?>
            <div style="padding: 5px">
            <h3>ALINEACIONES</h3>

            <?php echo "<pre>";
            echo print_r($a);
            echo "</pre>";?>


            </div>';
        <?php }?>

    </div> 
   <?php  }    

 die;      
        /*
        echo "Partido Betsapi id:".$id;
        echo "<pre>";
        echo print_r($resultado);
        echo "</pre>";
        
        


        [success] => 1
    [results] => Array
        (
            [0] => Array
                (
             

                    [events] => Array
                        (
                            [0] => Array
                                (
                                    [id] => 127542505
                                    [text] => 6' - 1st Corner - Darmstadt
                                )

                            [1] => Array
                                (
                                    [id] => 127542614
                                    [text] => 6' - 2nd Corner - Darmstadt
                                )

                            [2] => Array
                                (
                                    [id] => 127542665
                                    [text] => 6' - 1st Goal - Honsak  (Darmstadt) -
                                )

                            [3] => Array
                                (
                                    [id] => 127543350
                                    [text] => 11' - 3rd Corner - Darmstadt
                                )

                            [4] => Array
                                (
                                    [id] => 127543351
                                    [text] => 11' - Race to 3 Corners - Darmstadt
                                )

                            [5] => Array
                                (
                                    [id] => 127543905
                                    [text] => 15' - 4th Corner - Sandhausen
                                )

                            [6] => Array
                                (
                                    [id] => 127544390
                                    [text] => 18' - 5th Corner - Sandhausen
                                )

                            [7] => Array
                                (
                                    [id] => 127545173
                                    [text] => 25' - 2nd Goal - Honsak  (Darmstadt) -
                                )

                            [8] => Array
                                (
                                    [id] => 127545662
                                    [text] => 30' - 1st Yellow Card - Esswein (Sandhausen)
                                )

                            [9] => Array
                                (
                                    [id] => 127545690
                                    [text] => 30' - 6th Corner - Darmstadt
                                )

                            [10] => Array
                                (
                                    [id] => 127545774
                                    [text] => 31' - 2nd Yellow Card - Schnellhardt (Darmstadt)
                                )

                            [11] => Array
                                (
                                    [id] => 127545953
                                    [text] => 32' - 7th Corner - Darmstadt
                                )

                            [12] => Array
                                (
                                    [id] => 127545954
                                    [text] => 32' - Race to 5 Corners - Darmstadt
                                )

                            [13] => Array
                                (
                                    [id] => 127547002
                                    [text] => 39' - 8th Corner - Darmstadt
                                )

                            [14] => Array
                                (
                                    [id] => 127548329
                                    [text] => Score After First Half - 0-2
                                )

                            [15] => Array
                                (
                                    [id] => 127550698
                                    [text] => 46' - Substitution - Pfeiffer for Schnellhardt (Darmstadt)
                                )

                        )

                    [has_lineup] => 1
                    [inplay_created_at] => 1675444560
                    [inplay_updated_at] => 1675449356
                    [confirmed_at] => 1675448517
                    [bet365_id] => 131467169
                )

        )

)




        $evs=$resultado['results'][0]['events'];

        $ultimo = end($evs);
        $ultimo=$ultimo['text'];
        imp($ultimo);        
        $t   = 'Score at the end of Full Time';

        $final = strpos($ultimo, $t);
        if ($final === false) {
            echo "NO se ha encontrado la palabra deseada!!!!";
        } else {
            echo "Éxito!!! Se ha encontrado la palabra buscada en la posición: ".$final;
        }
        

    } else {
        $token='3629afd5a679bca50b3d3f77c64225affb76c7cb9a5677a2b5ff560b0b589e13';
        $url='https://apifootball.com/api/?action=get_events&match_id='.$id.'&APIkey='.$token;
        $resultado = file_get_contents($url); 
        $resultado =json_decode($resultado,true); 
        echo "Partido Apifootball id:".$id;
        echo "<pre>";
        echo print_r($resultado);
        echo "</pre>";

    }*/
?>
