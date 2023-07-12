<?php
/*
$equiposTw = array_slice($equiposTw, 0, 20);
shuffle($equiposTw);
$f = new \DateTime();
$f1 = $f->format('Y-m-d H:i:s');
$titol = $titol??'Visto en twitter';
$filtro = $filtro??0;
$tiempoAcorrer=$tiempoAcorrer??3600; // 7 días; 24 horas; 60 minutos; 60 segundos

?>
    


    <div class="col-xs-12 nopadding whitebox"><h3 style="background-color: #5a94dd; color:white; padding: 10px"><?php echo $titol?></h3></div>
    <?php $contador = 0;
    $categoria_id=$categoria_id??0;

    foreach ($equiposTw as $key => $value) {
        if (!isset($value['twitter'])) { $value['twitter']=0; }        
        if (!isset($value['idPais'])) { $value['idPais'] = 60;}
        $seleccion=$value['seleccion']??0; 
            if ($seleccion==0){
                $escudo=rutaEscudo($value['club_id'],$value['id']);                
            } else {
                $escudo='/img/paises/banderas/ban'.$value['idPais'].'.png';
            }
        $f = $nivel.'json/twits/'.$value['id'].'_twits.json';
        
        if (!@file_exists($f)) { 
            //echo "El fichero no existe y se va a crear<br />";
            returnTweet($value['twitter'], $value['id']);
        } 

        
        if (@file_exists($f)) {
            $tiempo1=time();$tiempo2=filemtime($f);$segundos=$tiempo1-$tiempo2;
            //imp($segundos);
            //imp($tiempoAcorrer);
            if ($segundos>$tiempoAcorrer) {returnTweet($value['twitter'], $value['id']);} 
            $json = file_get_contents($f);
            $t = json_decode($json, true);
            //imp($t);
            if (isset($t['errors'])) { 
                unlink($f); 
                //echo "Se ha borrado el fichero<br />";
            }


            if (count($t) > 2) {
                $hay = 0; 
                foreach ($t as $k => $txt) {
                    if (!isset($txt['created_at'])) {break;}
                    if (isset($txt['retweeted_status']['text'])) {
                        $f2 = date('Y-m-d H:i:s', strtotime($txt['retweeted_status']['created_at'])); // extrae la fecha
                        $tx = ($txt['retweeted_status']['text']);
                        $id_str = $txt['retweeted_status']['id_str'];
                    } else {
                        $tx = $txt['text'];
                        $f2 = date('Y-m-d H:i:s', strtotime($txt['created_at'])); // extrae la fecha
                        $id_str = $txt['id_str'];
                    }
                    $d = diferenciaHoras($f1, $f2);
                    if ($d->d < 2 && 0 == $d->m) { //si tiene menos de un dia
                            if ($filtro==1){
                                $buscamos="traspas"; //twits con la palabra temporada
                                $pos = strripos($tx, $buscamos);
                                if ($pos === false) { 
                                    $buscamos="cedido"; //twits con la palabra partido
                                    $pos = strripos($tx, $buscamos);
                                    if ($pos === false) { 
                                        $buscamos="fichaje"; //twits con la palabra fichaje
                                        $pos = strripos($tx, $buscamos);
                                        if ($pos === false) { 
                                            $buscamos="alta"; //twits con la palabra alta
                                            $pos = strripos($tx, $buscamos);
                                            if ($pos === false) { 
                                                $buscamos="baja"; //twits con la palabra baja
                                                $pos = strripos($tx, $buscamos);
                                                if ($pos === false) { 
                                                    $buscamos="abon"; //twits con la palabra baja
                                                    $pos = strripos($tx, $buscamos);
                                                    if ($pos === false) { 
                                                        $buscamos="temporada"; //twits con la palabra baja
                                                        $pos = strripos($tx, $buscamos);
                                                        if ($pos === false) { continue; }
                                                    }
                                                }
                                            }
                                        }                                        
                                    }
                                } 
                            }  

                            if (0 == $contador) {
                            $hay = 1;
                            ++$contador;
                            $pgEquipo2 = '/resultados-directo/equipo/'.poner_guion($value['equipo']).'/'.$value['id']; ?>
                    <div class="col-xs-12 whitebox">
                    <div class="hide"><?php echo $value['idPais']; ?></div>
                    <a href="<?php echo $pgEquipo2; ?>"><h4><?php echo $value['equipo']; ?></h4><img class="escudo_ind" src="<?php echo $escudo; ?>" alt="escudo" style="float:left; padding:15px;"></a>
                        <?php  }
                        
                            if (5 == (int)$k) {break;}
                            $texto = convertirUrls($tx);

                        

                        if (null != $texto) {?>
                            <div class="marco">
                            <span style="color:dimgray"><b><i><?php echo substr($f2,-8)?></i></b></span> - <?php echo $texto;?>                                
                            </div>  
                        <?php }
                    }
                }
                
                if (1 == $hay) {
                    ?></div><?php $hay = 0;$contador = 0;
                }
            } //if count>1
            unset($t);
        } //si existe el fichero
    }//foreach equiposTw
*/
?>