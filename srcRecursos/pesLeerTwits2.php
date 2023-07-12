<?php
$f = new \DateTime();
$f1 = $f->format('Y-m-d H:i:s');
$hay = 0; $contador=0;
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


    if (1 == $hay) {
    ?></div><?php $hay = 0;$contador = 0;
}
?>