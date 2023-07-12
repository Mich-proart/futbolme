
<!--Begin twitter/foro-->
<div class="col-xs-12 nopadding" style="max-height: 700px; overflow: auto; background-color: black;">
    
        <div class="col-xs-6 nopadding" style="margin-top: 5px; padding:2px !important;">
             <?php 
             if ($partido['estado_partido']==2){
                $cachetime = 300; //86400 un dia.
             } else {
                $cachetime = 6000; //100 minutos
             }
                $ahora=time();
                $antiguedad=$cachetime+1;
                $equipo_id=$partido['equipoLocal_id'];
                $twEquipo=$partido['twitter_local'];
                if (strlen($twEquipo) > 2 && $equipo_id>0) {
                
                    $f = './json/twits/'.$equipo_id.'_twits.json';
                    if (@file_exists($f) && (time() - filemtime($f)) < $cachetime) {
                        $antiguedad=(time() - filemtime($f));
                        $json = file_get_contents($f);
                        $t = json_decode($json, true);
                    } else {
                        $t=returnTweet($twEquipo, $equipo_id);                              
                    }
                    if (!isset($t['errors']) && $antiguedad>$cachetime) {
                        guardarJSON($t, './json/twits/'.$equipo_id.'_twits.json'); 
                    }
                    if (count($t) > 1) {
                        include 'srcRecursos/pesLeerTwits.php'; //incluye derecha02
                    }
                }
             ?>
       </div>
         <div class="col-xs-6 nopadding" style="margin-top: 5px; padding:2px !important;">
            <?php 
                $equipo_id=$partido['equipoVisitante_id'];
                $twEquipo=$partido['twitter_visitante'];
                if (strlen($twEquipo) > 2 && $equipo_id>0) {
                
                    $f = './json/twits/'.$equipo_id.'_twits.json';
                    if (@file_exists($f) && (time() - filemtime($f)) < $cachetime) {
                        $antiguedad=(time() - filemtime($f));
                        $json = file_get_contents($f);
                        $t = json_decode($json, true);
                    } else {
                        $t=returnTweet($twEquipo, $equipo_id);                              
                    }
                    if (!isset($t['errors']) && $antiguedad>$cachetime) {
                        guardarJSON($t, './json/twits/'.$equipo_id.'_twits.json'); 
                    }
                    if (count($t) > 1) {
                        include 'srcRecursos/pesLeerTwits.php'; //incluye derecha02
                    }
                }
                $equipo_id=0;
            ?>
       </div>    
</div> 

<div style="clear:both"></div>
