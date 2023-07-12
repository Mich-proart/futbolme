
    <?php 
$promotor = 0; $texto_entrada = '';
if (8 == $partido['acta']) {
    $promotor = $partido['equipoLocal_id'];
}
if (9 == $partido['acta']) {
    $promotor = $partido['equipoVisitante_id'];
}
    if ($promotor > 0) {
        $ePartidos = XequipoPartidos($promotor);
        $p = array_reverse($ePartidos['partidos']);
        foreach ($p as $key => $value) {
            if (1 == $value['estado_partido']) {
                continue;
            }
            if ($value['temporada_id'] != $partido['temporada_id']) {
                continue;
            }
            if ($value['equipoLocal_id'] != $promotor) {
                continue;
            }
            if ($value['jornada'] == $partido['jornada']) {
                continue;
            }
            if ($value['equipoLocal_id'] == $promotor) {
                $entradas = $value;
                break;
            }
        }

        if (isset($porra)) {
            $texto_entrada = "<span style='color:red'>Ven gratis al @".$entradas['localSlug'].' - @'.$entradas['visitanteSlug'].' : j'.$entradas['jornada'].'</span>';
        } else {
            $texto_entrada = "<span style='color:red'>Ven gratis al ".$entradas['localCorto'].' - '.$entradas['visitanteCorto'].' : j'.$entradas['jornada'].'</span>';
        }
    }

if (10 == $partido['acta']) {
    for ($i = 0; $i < 2; ++$i) {
        if (0 == $i) {
            $promotor = $partido['equipoLocal_id'];
        }
        if (1 == $i) {
            $promotor = $partido['equipoVisitante_id'];
        }
        if ($promotor > 0) {
            $ePartidos = XequipoPartidos($promotor);
            $p = array_reverse($ePartidos['partidos']);
            foreach ($p as $key => $value) {
                if (1 == $value['estado_partido']) {
                    continue;
                }
                if ($value['temporada_id'] != $partido['temporada_id']) {
                    continue;
                }
                if ($value['equipoLocal_id'] != $promotor) {
                    continue;
                }
                if ($value['jornada'] == $partido['jornada']) {
                    continue;
                }
                if ($value['equipoLocal_id'] == $promotor) {
                    $entradas = $value;
                    break;
                }
            }

            if (isset($porra)) {
                if (0 == $i) {
                    $texto_entrada .= "<span style='color:red'>Ven gratis al @".$entradas['localSlug'].' - @'.$entradas['visitanteSlug'].' : j'.$entradas['jornada'];
                }
                if (1 == $i) {
                    $texto_entrada .= 'y al @'.$entradas['localSlug'].' - @'.$entradas['visitanteSlug'].' : j'.$entradas['jornada'].'</span>';
                }
            } else {
                if (0 == $i) {
                    $texto_entrada .= "<span style='color:red'>Ven gratis al ".$entradas['localCorto'].' - '.$entradas['visitanteCorto'].' : j'.$entradas['jornada'];
                }
                if (1 == $i) {
                    $texto_entrada .= ' y al '.$entradas['localCorto'].' - '.$entradas['visitanteCorto'].' : j'.$entradas['jornada'].'</span>';
                }
            }
        }
    }
}

echo $texto_entrada;

$ancho = '25';
if (isset($pag) && 'partido' == $pag) {
    $ancho = '40';
}

    if (5 == $partido['acta']) {
        $titulo = 'Partido para el Hat-trick de FUTBOLME'; ?>
    
    <?php
    }

    if (7 == $partido['acta']) {
        $titulo = 'Minutazo BWIN'; ?>
    <a href='https://mediaserver.bwinpartypartners.com/renderBanner.do?zoneId=1799466' rel='nofollow'><img src="/img/checkbox/minutazo.png" width="<?php echo $ancho; ?>" title="<?php echo $titulo; ?>" style="padding-right: 5px; "></a>
    <?php
    }

if (8 == $partido['acta'] || 9 == $partido['acta'] || 10 == $partido['acta']) {
    if (isset($pag) && 'partido' == $pag) {
        ?>
    <div class="col-xs-12 text-center">
    <?php
    }

    if (199786 == $partido['id']) {
        ?>
        <a href="https://twitter.com/SaRoquetaBalear" target="_blank">Regalo gentileza de @SaRoquetaBalear</a>
        <?php
    }

    if (8 == $partido['acta']) {
        if (isset($pag) && 'EntradasGratis' == $pag) {
            echo 'Promotor: '.$partido['localCorto'];
        }
        $titulo = 'Consigue tu entrada para ver al '.$partido['localCorto']; ?>
    <a href="/partido.php?id=<?php echo $partido['id']; ?>&modelo=Apuestas">
    <img src="/img/checkbox/tickets.png" alt="tickets" width="<?php echo $ancho; ?>" title="<?php echo $titulo; ?>"></a>
    <?php
    }
    if (9 == $partido['acta']) {
        if (isset($pag) && 'EntradasGratis' == $pag) {
            echo 'Promotor: '.$partido['visitanteCorto'];
        }
        $titulo = 'Consigue tu entrada para ver al '.$partido['visitanteCorto']; ?>
    <a href="/partido.php?id=<?php echo $partido['id']; ?>&modelo=Apuestas">            
    <img src="/img/checkbox/tickets.png" alt="tickets" width="<?php echo $ancho; ?>" title="<?php echo $titulo; ?>"></a>
    <?php
    }

    if (10 == $partido['acta']) {
        if (isset($pag) && 'EntradasGratis' == $pag) {
            echo 'Promotor: Ambos';
        }
        $titulo = 'Consigue tu entrada para ver a estos equipos'; ?>
    <a href="/partido.php?id=<?php echo $partido['id']; ?>&modelo=Apuestas">            
    <img src="/img/checkbox/tickets.png" alt="tickets" width="<?php echo $ancho; ?>" title="<?php echo $titulo; ?>"></a>
    <?php
    }

    if (isset($pag) && 'partido' == $pag) {
        ?>
        <h5 class="text-center boldfont"><?php echo $titulo; ?></h5>
        
    <div class="marco">
        <i>*Una entrada para cada acertante del resultado exacto. Las entradas son intransferibles.</i></div>
    </div>
    <?php
    }
} ?>

