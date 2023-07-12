<script async src="/js/highcharts.min.js"></script>
<?php 
if (!isset($_GET['torneo_id'])) {
    $torneo_id = 0;
} else {
    $torneo_id = $_GET['torneo_id'];
}

$pesActiva = '';
$pgPartido2 .= '&modelo=Enfrentamientos';

$enfrentamientos = XenfrentamientosAgrupar($e1, $e2);

?>
<ul id="menuEnfrentamientos" class="nav nav-tabs nopadding celestebox txt11" role="tablist">
<?php if (0 == $torneo_id) {
    $pesActiva = 'active';
} ?>
<li class="text-center boldfont <?php echo $pesActiva; ?>"><a href="<?php echo $pgPartido; ?>">Esta temporada</a></li>
<?php 
$pesActiva = '';
foreach ($enfrentamientos['liga'] as $key => $liga) {
    $bd = 1;
    if ('sin torneo' == $liga['nombreT']) {
        continue;
    }
    if ($torneo_id == $liga['torneo_id']) {
        $pesActiva = 'active';
    } else {
        $pesActiva = '';
    } ?>
        <li class="text-center boldfont <?php echo $pesActiva; ?>">
        <a href="<?php echo $pgPartido2; ?>&torneo_id=<?php echo $liga['torneo_id']; ?>&nt=<?php echo $liga['nombreT']; ?>&bd=<?php echo $bd; ?>"><?php echo $liga['nombreT']; ?></a>
        </li>     
     <?php
}
     foreach ($enfrentamientos['promociones'] as $key => $liga) {
         $bd = 2;
         if ($torneo_id == $liga['torneo_id']) {
             $pesActiva = 'active';
         } else {
             $pesActiva = '';
         } ?>
        <li class="text-center boldfont <?php echo $pesActiva; ?>">
        <a href="<?php echo $pgPartido2; ?>&torneo_id=<?php echo $liga['torneo_id']; ?>&nt=<?php echo $liga['nombreT']; ?>&bd=<?php echo $bd; ?>"><?php echo $liga['nombreT']; ?></a>
        </li>     
     <?php
     }

     if (count($enfrentamientos['copa']) > 0) {
         $bd = 3;
         if ($enfrentamientos['copa'][0]['torneo_id'] == $torneo_id) {
             $pesActiva = 'active';
         } else {
             $pesActiva = '';
         } ?>
        <li class="text-center boldfont <?php echo $pesActiva; ?>">
        <a href="<?php echo $pgPartido2; ?>&torneo_id=<?php echo $enfrentamientos['copa'][0]['torneo_id']; ?>&nt=<?php echo $enfrentamientos['copa'][0]['nombreT']; ?>&bd=<?php echo $bd; ?>"><?php echo $enfrentamientos['copa'][0]['nombreT']; ?></a>
        </li>
     <?php
     }

     foreach ($enfrentamientos['resto'] as $key => $liga) {
         $bd = 4;
         if ($torneo_id == $liga['torneo_id']) {
             $pesActiva = 'active';
         } else {
             $pesActiva = '';
         } ?>
        <li class="text-center boldfont <?php echo $pesActiva; ?>">
        <a href="<?php echo $pgPartido2; ?>&torneo_id=<?php echo $liga['torneo_id']; ?>&nt=<?php echo $liga['nombreT']; ?>&bd=<?php echo $bd; ?>"><?php echo $liga['nombreT']; ?></a>
        </li>     
     <?php
     } ?>
</ul>

<?php 
 if (isset($_GET['bd'])) {
     $bd = $_GET['bd'];
 } else {
     $bd = 0;
 }

    if (0 == $torneo_id) {
        $enfrentamientosAct = XenfrentamientosAct($e1, $e2);
        //imp($enfrentamientosAct);die;?>
        <hr />
        <h1 class="text-center hidden-xs">Enfrentamientos entre <b><?php echo $et1; ?></b>
y <b><?php echo $et2; ?></b> en la temporada actual.</h1>
 <h3 class="text-center visible-xs">Enfrentamientos entre <b><?php echo $et1; ?></b>
y <b><?php echo $et2; ?></b> en la temporada actual.</h3>

        <div id="bloque-actual">     
        <?php $equipo_id = 1; //para que salga la fecha
        foreach ($enfrentamientosAct as $partido) {
            $colorFondo = 'whitebox';

            $partido['nombreTorneo'] = $partido['nombreTemporada']; ?>
            <div style="clear:both"></div>
            <div>
            <?php 
            $partido['tv']=0;
            include 'includes/contenidoPartido.php'; ?>   
            </div>
        <?php
        } ?>
        </div> 
            
    <?php
    } else {
        $nt = $_GET['nt'];

        $partidos = XenfrentamientosAgrupar2($bd, $torneo_id, $e1, $e2);
        //$torneo_id=192 copa del rey
        //$torneo_id=188 champions
        //$torneo_id=191 supercopa de españa
        if (count($partidos) > 0) {
            $colordiv = '#ffffff';
            if (192 == $torneo_id) {
                $colordiv = '#E1F5A9';
            }
            if (188 == $torneo_id) {
                $colordiv = '#F5D0A9';
            }
            if (191 == $torneo_id) {
                $colordiv = '#A9BCF5';
            } ?>
                           
               <div style="background-color:<?php echo $colordiv; ?>">
               <?php include 'includes/graficos/partido3.php'; ?>
               </div>

                <?php 

                if (192 == $torneo_id) {
                    unset($a);
                    unset($b);
                    unset($c);
                    $a = '';
                    $b = '';
                    $c = '';
                    foreach ($eliminatorias as $key => $value) {
                        $n = $value[0];
                        $n = preg_replace('/ - Vuelta/D', '', $n);
                        $n = preg_replace('/Octavos/D', '1/8', $n);
                        $n = preg_replace('/Cuartos/D', '1/4', $n);
                        $n = preg_replace('/Dieciseisavos/D', '1/16', $n);
                        $a .= "'".$n."',";
                        if (is_array($value)) {
                            if (isset($value[$e1])) {
                                $b .= count($value[$e1]).',';
                            } else {
                                $b .= '0,';
                            }
                            if (isset($value[$e2])) {
                                $c .= count($value[$e2]).',';
                            } else {
                                $c .= '0,';
                            }
                        }
                    }
                    $a = substr($a, 0, -1);
                    $b = substr($b, 0, -1);
                    $c = substr($c, 0, -1);

                    if (191 == $torneo_id) {
                        $pie = 'Finales Supercopa de España';
                    }
                    if (192 == $torneo_id) {
                        $pie = 'Eliminatorias de Copa';
                    }

                    $contenedor = 'copa-'.$torneo_id;
                    $tipo = 'bar';
                    $serie1 = $et1;
                    $serie2 = $et2;
                    include 'includes/graficos/bar-stacked.php'; ?>
                <div style="clear:both"></div>
                <div style="float:left; padding:5px; background-color:<?php echo $colordiv; ?>; ">
                <div id="copa-<?php echo $torneo_id; ?>" style="float:right; width: 300px; height:200px; margin: 0 auto;"></div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                <?php
                }
        } //si hay partidos
    }

 ?>