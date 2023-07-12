<?php
$f = new \DateTime();
$f1 = $f->format('Y-m-d H:i:s');

foreach ($t as $k => $txt) {
    if (!isset($txt['created_at'])) {
        break;
    }

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
        if (2 == $k) {
            if (isset($origen)){
                include '../../includes/publicidad/adsenseAdaptable.php';
            } else {
                include 'includes/publicidad/adsenseAdaptable.php';
            }
            
        }

        $texto = convertirUrls($tx);
        if (null != $texto) {
            ?>
				<div class="marco" style="margin-top:5px">
	            <b><?php echo $f2; ?></b><br />
	            <?php echo $texto; ?>                                
	            </div>    

		<?php
        }
    }
}
