<?php

if (!isset($origen)) { //si viende de directos se hace esto.
    //imp($partido['goles']);

    $partido['id'] = $partido['partido_id'];

    $goles = explode('--', $partido['goles']);
    $golesLocal = $goles[0];
    $golesVisitante = $goles[1];
    $golLocal = explode('@', $golesLocal);
    $golVisitante = explode('@', $golesVisitante);

    $goles = array();
    $i = 0;
    foreach ($golLocal as $value) {
        $datosGol = explode(',', $value);
        if (isset($datosGol[1])) {
            $goles[$i]['jugador_id'] = $datosGol[0];
            $goles[$i]['jugador'] = $datosGol[1];
            $goles[$i]['minuto'] = $datosGol[2];
            $goles[$i]['tipo'] = $datosGol[3];
            if (isset($datosGol[4]) && strlen($datosGol[4]) > 5) {
                $goles[$i]['observaciones'] = $datosGol[4];
                $goles[$i]['id'] = $datosGol[5];
            }
            $goles[$i]['esLocal'] = 1;
            $i = $i + 1;
            //echo $datosGol[1]." - ".$datosGol[2]."<br />";
        }
    }

    foreach ($golVisitante as $value) {
        $datosGol = explode(',', $value);
        if (isset($datosGol[1])) {
            $goles[$i]['jugador_id'] = $datosGol[0];
            $goles[$i]['jugador'] = $datosGol[1];
            $goles[$i]['minuto'] = $datosGol[2];
            $goles[$i]['tipo'] = $datosGol[3];
            if (isset($datosGol[4]) && strlen($datosGol[4]) > 5) {
                $goles[$i]['observaciones'] = $datosGol[4];
                $goles[$i]['id'] = $datosGol[5];
            }
            $goles[$i]['esLocal'] = 0;
            $i = $i + 1;
            //echo $datosGol[1]." - ".$datosGol[2]."<br />";
        }
    }
} else { //si no viene de directos se hace la consulta
    $campos = 'g.id, g.jugador_id, g.minuto, g.tipo, g.esLocal, g.partido_id, j.apodo jugador';

    
        $l = $partido['localCorto'];
        $v = $partido['visitanteCorto'];

        //memcached
        //si existe partido['goles']

        //else exit;
//        echo 'no';
//        exit;
        $tabla = 'gol g';
        $union = ' LEFT JOIN jugador j ON j.id=g.jugador_id';
        $condicion = ' WHERE g.partido_id='.$partido_id.' AND g.jugador_id is not null';
    

    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion;

    $mysqli = mysqli_connect('localhost', 'futbolme_nueva', 'A3r0r3d', 'futbolme_nueva');
    $acentos = $mysqli->query("SET NAMES 'utf8'");

    if (!$resultadoSQL = mysqli_query($mysqli, $consulta)) {
        //echo $consulta;
        printf("Errormessage: %s\n", mysqli_error($mysqli));
        exit;
    }

    $goles = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
}
        $orden_goles = [];

        foreach ($goles as $key => $gol) {
            $orden_goles[$key] = $gol['minuto'];
        }

        array_multisort($orden_goles, SORT_ASC, SORT_NUMERIC, $goles);

        $ml = 0; $mv = 0;

if (count($goles) > 0) {
    ?>    


<div class='col-xs-12 nopadding'>

<?php

    foreach ($goles as $key => $value) {
        if (11 == $value['tipo']) {
            continue;
        }
        if (1 == $value['esLocal'] && 10 != $value['tipo']) {
            $ml = $ml + 1;
            $goles[$key]['marcador'] = '<b>'.$ml.'</b>-'.$mv;
        }
        if (0 == $value['esLocal'] && 10 != $value['tipo']) {
            $mv = $mv + 1;
            $goles[$key]['marcador'] = $ml.'-<b>'.$mv.'</b>';
        }
        if (1 == $value['esLocal'] && 10 == $value['tipo']) {
            $mv = $mv + 1;
            $value['esLocal'] = 3;
            $goles[$key]['marcador'] = $ml.'-<b>'.$mv.'</b>';
        }
        if (0 == $value['esLocal'] && 10 == $value['tipo']) {
            $ml = $ml + 1;
            $value['esLocal'] = 2;
            $goles[$key]['marcador'] = '<b>'.$ml.'</b>-'.$mv;
        }

        //$goles[$key]['marcador']=$ml."-".$mv;
        $goles[$key]['esLocal'] = $value['esLocal'];
    } ?>
            
            <div class="col-xs-6 nopadding">
                <p class="w100 text-right txt11" style="background-color: #DDE89E;"><i>
                <?php foreach ($goles as $value) {
        if (11 == $value['tipo']) {
            continue;
        }
        //imp($value);
        if (isset($jgl1t)) {
            $ti = substr($value['minuto'], 0, 1);
            if ('1' == $ti && 1 == $value['esLocal']) {
                $jgl1t = $jgl1t + 1;
            }
            if ('2' == $ti && 1 == $value['esLocal']) {
                $jgl2t = $jgl2t + 1;
            }
            if ('1' == $ti && 0 == $value['esLocal']) {
                $jgv1t = $jgv1t + 1;
            }
            if ('2' == $ti && 0 == $value['esLocal']) {
                $jgv2t = $jgv2t + 1;
            }
            if ('1' == $ti && 1 == $value['esLocal'] && 1 == $value['tipo']) {
                $jglp1 = $jglp1 + 1;
            }
            if ('2' == $ti && 1 == $value['esLocal'] && 1 == $value['tipo']) {
                $jglp2 = $jglp2 + 1;
            }
            if ('1' == $ti && 0 == $value['esLocal'] && 1 == $value['tipo']) {
                $jgvp1 = $jgvp1 + 1;
            }
            if ('2' == $ti && 0 == $value['esLocal'] && 1 == $value['tipo']) {
                $jgvp2 = $jgvp2 + 1;
            }
        }

        if (1 == $value['esLocal'] || 2 == $value['esLocal']) {
            if (1 == $value['tipo']) {
                $txtG = ' (pen.)';
            } else {
                $txtG = '';
            }
            if (2 == $value['esLocal']) {
                $txtG = ' (p.p.)';
            }
            $txtM = substr($value['minuto'], 1);
            if ($value['minuto'] > 145 && $value['minuto'] < 200) {
                $txtM = '45+'.($value['minuto'] - 145);
            }
            if ($value['minuto'] > 290 && $value['minuto'] < 370) {
                $txtM = '90+'.($value['minuto'] - 290);
            }

            if ($value['minuto'] > 3105 && $value['minuto'] < 3200) {
                $txtM = '105+'.($value['minuto'] - 3105);
            }

            if ($value['minuto'] > 4120) {
                $txtM = '120+'.($value['minuto'] - 4120);
            }

            if (29752 != $value['jugador_id']) {
                if (isset($jugador_id) && $jugador_id == $value['jugador_id']) {
                    $txtJ = "<a href='index.php?modo=j&id=".$value['jugador_id']."' target='_blank' style='color:red; font-size:14px; font-weight:bold'>".$value['jugador'].'</a>';
                } else {
                    $txtJ = "<a href='index.php?modo=j&id=".$value['jugador_id']."' target='_blank' style='color:navy'>".$value['jugador'].'</a>';
                }
            } else {
                $txtJ = $value['jugador'];
            }

            if (isset($value['observaciones']) && strlen($value['observaciones']) > 5) {
                $txtYT = '&nbsp;<span class="glyphicon glyphicon-facetime-video iconhover" style="width:30px; cursor:pointer; padding-right:7px; color:navy;" onclick="menu_youtube('.$partido['id'].',-1,'.$value['id'].')"></span>';
            } else {
                $txtYT = '<span style="padding-right:37px;"></span>';
            }

            if (238 != $partido['temporada_id']) {
                $txtYT = '<span style="padding-left:15px;"></span>';
            } else {
                $urlYT = 'https://www.youtube.com/results?search_query='.$l.'+'.$v.'+'.$value['jugador'];
                $txtYT = '&nbsp;<a href="'.$urlYT.'" target="_blank" title="Sugerencia en youtube"><span class="glyphicon glyphicon-facetime-video iconhover" style="width:30px; cursor:pointer; padding-right:7px; color:navy;"></span></a>';
            }

            echo $txtM."' - ".$txtJ.$txtG.', '.$value['marcador'].$txtYT.'<br />';
        }
    } ?>
                </i></p>
            </div>
            <div class="col-xs-6 nopadding">
                <p class="w100 text-left txt11" style="background-color: #DDE89E;"><i>
                <?php foreach ($goles as $value) {
        //imp($value);
        if (11 == $value['tipo']) {
            continue;
        }
        if (0 == $value['esLocal'] || 3 == $value['esLocal']) {
            if (1 == $value['tipo']) {
                $txtG = ' (pen.)';
            } else {
                $txtG = '';
            }
            if (3 == $value['esLocal']) {
                $txtG = ' (p.p.)';
            }
            $txtM = substr($value['minuto'], 1);
            if ($value['minuto'] > 145 && $value['minuto'] < 200) {
                $txtM = '45+'.($value['minuto'] - 145);
            }
            if ($value['minuto'] > 290 && $value['minuto'] < 370) {
                $txtM = '90+'.($value['minuto'] - 290);
            }
            if ($value['minuto'] > 3105 && $value['minuto'] < 3200) {
                $txtM = '105+'.($value['minuto'] - 3105);
            }

            if ($value['minuto'] > 4120) {
                $txtM = '120+'.($value['minuto'] - 4120);
            }

            if (29752 != $value['jugador_id']) {
                if (isset($jugador_id) && $jugador_id == $value['jugador_id']) {
                    $txtJ = "<a href='index.php?modo=j&id=".$value['jugador_id']."' target='_blank' style='color:red; font-size:14px; font-weight:bold'>".$value['jugador'].'</a>';
                } else {
                    $txtJ = "<a href='index.php?modo=j&id=".$value['jugador_id']."' target='_blank' style='color:navy'>".$value['jugador'].'</a>';
                }
            } else {
                $txtJ = $value['jugador'];
            }

            if (isset($value['observaciones']) && strlen($value['observaciones']) > 5) {
                $txtYT = '&nbsp;<span class="glyphicon glyphicon-facetime-video iconhover" style="width:30px; cursor:pointer; padding-left:7px; color:navy;" onclick="menu_youtube('.$partido['id'].',-1,'.$value['id'].')"></span>';
            } else {
                $txtYT = '<span style="padding-left:37px;"></span>';
            }

            if (238 != $partido['temporada_id']) {
                $txtYT = '<span style="padding-left:15px;"></span>';
            } else {
                $urlYT = 'https://www.youtube.com/results?search_query='.$l.'+'.$v.'+'.$value['jugador'];
                $txtYT = '&nbsp;<a href="'.$urlYT.'" target="_blank" title="Sugerencia en youtube"><span class="glyphicon glyphicon-facetime-video iconhover" style="width:30px; cursor:pointer; padding-left:7px; color:navy;"></span></a>&nbsp;';
            }

            echo $txtYT.' '.$value['marcador'].', '.$txtJ.$txtG.' - '.$txtM."'<br />";
        }
    } ?>
                </i></p>
            </div>

</div>
<div class='clear'></div>
<?php
} ?>
