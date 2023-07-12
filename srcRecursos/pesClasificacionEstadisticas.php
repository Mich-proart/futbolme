<?php 
/*
imp($e_racha);
imp($fila);
*/
?>

<div style="float:left; padding:5px">
<h4 class="text-center boldfont">Puntos</h4>
<?php
unset($a); $a = ''; unset($b);
foreach ($e_racha as $key => $v) {
    if (!isset($v[1])) {
        continue;
    }
    $value = explode(',', $v);

    $a .= "'J".$value[1]."',";
    $nombre = 'Jornada '.$value[1].' '.$value[2].'-'.$value[3].' ('.$value[4].'-'.$value[5].') <br />Fecha: '.$value[0].'<br /><b>'.$value[9].'</b> puntos.';
    if (0 == $value[9]) {
        $value[9] = 0.2;
    }
    $b[$key]['y'] = (float) ($value[9]);
    $b[$key]['name'] = $nombre;
    if (3 == (int) $value[9]) {
        if ($equipo_id == $value[6]) {
            $b[$key]['color'] = 'green';
        } else {
            $b[$key]['color'] = '#58FA82';
        }
    } elseif (1 == (int) $value[9]) {
        if ($equipo_id == $value[6]) {
            $b[$key]['color'] = 'orange';
        } else {
            $b[$key]['color'] = '#F5DA81';
        }
    } else {
        if ($equipo_id == $value[6]) {
            $b[$key]['color'] = 'red';
        } else {
            $b[$key]['color'] = '#F78181';
        }
    }
}

$a = substr($a, 0, -1);
$b = json_encode($b);
$b = str_replace('"y"', 'y', $b);
$b = str_replace('"', "'", $b);
  $contenedor = $equipo_id; $maximo = 3; $minimo = -0.5; $tipo = 'column';
  $titulo = null;
  $subtitulo = '';
  $textoY = 'Puntos obtenidos'; $textoSerie1 = $titulo; $textoSerie2 = '';
  $textoVY = 'Puntos';
  include 'includes/graficos/_linea2.php';

if (!isset($fila['equipo_id'])) {
    $fila['equipo_id'] = $equipo_id;
}
  ?>

<div id='c<?php echo $fila['equipo_id']; ?>' style='float:left; width: 320px; height: 150px; margin: 0 auto'></div>
<?php
$te_u_punto = ''; $te_u_victoria = ''; $te_u_empate = ''; $te_u_derrota = '';
if (isset($fila['u_punto'])) {
    $e_u_punto = explode(',', $fila['u_punto']);
    $e_u_punto[8];
    if (0 == $fila['u_punto']) {
        $te_u_punto = 'El '.$fila['nombre'].' todavía no ha conseguido ningún punto.';
    } else {
        $te_u_punto = 'Últimos puntos: <b>Jornada '.$e_u_punto[1].'</b>  '.$e_u_punto[0].' 
	<br />'.$e_u_punto[2].'-'.$e_u_punto[3].' (<b>'.$e_u_punto[4].'-'.$e_u_punto[5].'</b>)';
    }
}

if (isset($fila['u_victoria'])) {
    $e_u_victoria = explode(',', $fila['u_victoria']);
    if (0 == $fila['u_victoria']) {
        $te_u_victoria = 'El '.$fila['nombre'].' todavía no ha ganado ningún partido.';
    } else {
        if ($e_u_punto[8] == $e_u_victoria[8]) {
            $te_u_victoria = ' y también es la última victoria conseguida';
        } else {
            $te_u_victoria = '<br />Última victoria: <b>Jornada '.$e_u_victoria[1].'</b>  '.$e_u_victoria[0].' 
		<br />'.$e_u_victoria[2].'-'.$e_u_victoria[3].' (<b>'.$e_u_victoria[4].'-'.$e_u_victoria[5].'</b>)';
        }
    }
}

if (isset($fila['u_empate'])) {
    $e_u_empate = explode(',', $fila['u_empate']);
    if (0 == $fila['u_empate']) {
        $te_u_empate = '<br />El '.$fila['nombre'].' todavía no ha empatado ningún partido.';
    } else {
        if ($e_u_punto[8] == $e_u_empate[8]) {
            $te_u_empate = ' y también es el última empate conseguido';
        } else {
            $te_u_empate = '<br />Último empate: <b>Jornada '.$e_u_empate[1].'</b>  '.$e_u_empate[0].' 
		<br />'.$e_u_empate[2].'-'.$e_u_empate[3].' (<b>'.$e_u_empate[4].'-'.$e_u_empate[5].'</b>)';
        }
    }
}

    if (isset($fila['u_derrota'])) {
        $e_u_derrota = explode(',', $fila['u_derrota']);
        if (0 == $fila['u_derrota']) {
            $te_u_derrota = '<br />El '.$fila['nombre'].' todavía no ha perdido ningún partido.';
        } else {
            $te_u_derrota = '<br />Última derrota: <b>Jornada '.$e_u_derrota[1].'</b>  '.$e_u_derrota[0].' 
	<br />'.$e_u_derrota[2].'-'.$e_u_derrota[3].' (<b>'.$e_u_derrota[4].'-'.$e_u_derrota[5].'</b>)';
        }
    }
?>
<?php echo $te_u_punto; ?>
<?php echo $te_u_victoria; ?>
<?php echo $te_u_empate; ?>
<?php echo $te_u_derrota; ?>
</div>


<?php
if (isset($estadisticas)) {
    foreach ($estadisticas as $key => $value) {
        if (1 == $value['tipo_torneo']) {
            $estad = $value;
            break;
        }
    }

    $maximo = 0;
    $ar1 = '{y: '.$estad['galocal'].",
        color: 'green'},
        {y: ".$estad['emlocal'].",
        color: 'orange'},
        {y: ".$estad['pelocal'].",
        color: 'red'}";

    $ar2 = '{y: '.$estad['gavisitante'].",
        color: '#58FA82'},
        {y: ".$estad['emvisitante'].",
        color: '#F5DA81'},
        {y: ".$estad['pevisitante'].",
        color: '#F78181'}";

    if ($estad['galocal'] + $estad['gavisitante'] > $maximo) {
        $maximo = $estad['galocal'] + $estad['gavisitante'];
    }
    if ($estad['emlocal'] + $estad['emvisitante'] > $maximo) {
        $maximo = $estad['emlocal'] + $estad['emvisitante'];
    }
    if ($estad['pelocal'] + $estad['pevisitante'] > $maximo) {
        $maximo = $estad['pelocal'] + $estad['pevisitante'];
    }
    $maximo = $maximo + 1;
    $contenedor = 'partidos';
    $tipo = 'column';
    $a = "'<b>Ganados</b>', '<b>Empatados</b>', '<b>Perdidos</b>'"; ?>
<?php include 'includes/graficos/columnaGEP.php'; ?>
<div style="float:left; padding:5px">
<h4 class="text-center boldfont">Partidos</h4>
<div id="c-<?php echo $contenedor; ?>" style="float:right; width: 230px; height: 200px; margin: 0 auto">
</div>
<?php if ($estad['galocal'] > 0) {
        if ($estad['galocal'] > 1) {
            ?>
	<br /><b>Como local</b> el <?php echo $equipotxt; ?> ha ganado <?php echo $estad['galocal']; ?> partidos,
	<?php
        } else {
            ?>
	<br /><b>Como local</b> el <?php echo $equipotxt; ?> solo ha ganado un partido,
	<?php
        }
    } else {
        ?>
<br /><b>Como local</b> el <?php echo $equipotxt; ?> no conoce la victoria,
<?php
    } ?>
<?php if ($estad['emlocal'] > 0) {
        if ($estad['emlocal'] > 1) {
            ?>
	ha empatado <?php echo $estad['emlocal']; ?> partidos
	<?php
        } else {
            ?>
	ha empatado solo un partido
	<?php
        }
    } else {
        ?>
no ha empatado ningún partido 
<?php
    } ?>
<?php if ($estad['pelocal'] > 0) {
        if ($estad['pelocal'] > 1) {
            ?>
	&nbsp;y ha perdido <?php echo $estad['pelocal']; ?> partidos,
	<?php
        } else {
            ?>
	&nbsp;y solo ha perdido un partido,
	<?php
        }
    } else {
        ?>
&nbsp;y no ha perdido ninguno,
<?php
    }
    $puntosL = ($estad['galocal'] * 3) + $estad['emlocal']; ?>
por lo tanto ha conseguido en casa <?php echo $puntosL; ?> puntos.

<?php if ($estad['gavisitante'] > 0) {
        if ($estad['gavisitante'] > 1) {
            ?>
	<br /><br /><b>Como visitante</b> el <?php echo $equipotxt; ?> ha ganado <?php echo $estad['gavisitante']; ?> partidos,
	<?php
        } else {
            ?>
	<br /><br /><b>Como visitante</b> el <?php echo $equipotxt; ?> solo ha ganado un partido,
	<?php
        }
    } else {
        ?>
<br /><br /><b>Como visitante</b> el <?php echo $equipotxt; ?> no conoce la victoria,
<?php
    } ?>
<?php if ($estad['emvisitante'] > 0) {
        if ($estad['emvisitante'] > 1) {
            ?>
	ha empatado <?php echo $estad['emvisitante']; ?> partidos
	<?php
        } else {
            ?>
	ha empatado solo un partido
	<?php
        }
    } else {
        ?>
no ha empatado ningún partido 
<?php
    } ?>
<?php if ($estad['pevisitante'] > 0) {
        if ($estad['pevisitante'] > 1) {
            ?>
	&nbsp;y ha perdido <?php echo $estad['pevisitante']; ?> partidos,
	<?php
        } else {
            ?>
	&nbsp;y solo ha perdido un partido,
	<?php
        }
    } else {
        ?>
&nbsp;y no ha perdido ninguno,
<?php
    }
    $puntosV = ($estad['gavisitante'] * 3) + $estad['emvisitante']; ?>
por lo tanto ha conseguido fuera de casa <?php echo $puntosV; ?> puntos.
</div>

<?php
$maximo = 0;
    $ar1 = '{y: '.$estad['gflocal'].",
        color: '#0489B1'},
        {y: ".$estad['gclocal'].",
        color: '#A4A4A4'}";

    $ar2 = '{y: '.$estad['gfvisitante'].",
        color: '#0B4C5F'},
        {y: ".$estad['gcvisitante'].",
        color: '#585858'}";

    if ($estad['gflocal'] + $estad['gfvisitante'] > $maximo) {
        $maximo = $estad['gflocal'] + $estad['gfvisitante'];
    }
    if ($estad['gclocal'] + $estad['gcvisitante'] > $maximo) {
        $maximo = $estad['gclocal'] + $estad['gcvisitante'];
    }
    $maximo = $maximo + 1;
    $contenedor = 'goles';
    $tipo = 'column';
    $a = "'<b>A favor</b>', '<b>En contra</b>'"; ?>
<?php include 'includes/graficos/columnaGEP.php'; ?>
<div style="float:left; padding:5px; ">
<hr /><h4 class="text-center boldfont">Goles</h4>
<div id="c-<?php echo $contenedor; ?>" style="float:left; width: 200px; height: 200px; margin: 0 auto"></div>
<?php
if ($estad['gflocal'] < $estad['gfvisitante']) {
        echo 'El '.$equipotxt.' ha conseguido más goles como visitante ('.$estad['gfvisitante'].') que como local ('.$estad['gflocal'].').';
    } ?>

			<?php if ($liga < 25) {
        ?>
			<h5 class="text-center boldfont">Los goles a favor como local</h5>
			Estos <b><?php echo $estad['gflocal']; ?></b> goles fueron 
			conseguidos <b><?php echo $goles['fv_l_1t']; ?></b> en la primera parte y 
			 <b><?php echo $goles['fv_l_2t']; ?></b> en la segunda.
			 <?php if ($goles['propia_fv_l'] > 0) {
            if ($goles['propia_fv_l'] > 1) {
                echo ' Hay que añadir <b>'.$goles['propia_fv_l'].'</b> goles que anotaron en propia puerta sus rivales.';
            } else {
                echo ' Hay que añadir <b>1</b> gol que anotaron en propia puerta a su favor.';
            }
        } ?>

			<?php if ($goles['penal_fv_l'] > 0) {
            if ($goles['penal_fv_l'] > 1) {
                echo ' De estos goles <b>'.$goles['penal_fv_l'].'</b> fuerón de penalti.';
            } else {
                echo ' De estos goles <b>1</b> fué de penalti.';
            }
        } ?>

			<h5 class="text-center boldfont">Los goles a favor como visitante</h5>
			Estos <b><?php echo $estad['gfvisitante']; ?></b> goles fueron 
			conseguidos <b><?php echo $goles['fv_v_1t']; ?></b> en la primera parte y 
			 <b><?php echo $goles['fv_v_2t']; ?></b> en la segunda.
			 <?php if ($goles['propia_fv_v'] > 0) {
            if ($goles['propia_fv_v'] > 1) {
                echo ' Hay que añadir <b>'.$goles['propia_fv_v'].'</b> goles que anotaron en propia puerta sus rivales.';
            } else {
                echo ' Hay que añadir <b>1</b> gol que anotaron en propia puerta a su favor.';
            }
        } ?>

			<?php if ($goles['penal_fv_v'] > 0) {
            if ($goles['penal_fv_v'] > 1) {
                echo ' De estos goles <b>'.$goles['penal_fv_v'].'</b> fuerón de penalti.';
            } else {
                echo ' De estos goles <b>1</b> fué de penalti.';
            }
        } ?>

			<h5 class="text-center boldfont">Los goles en contra como local</h5>
			Estos <b><?php echo $estad['gclocal']; ?></b> goles fueron 
			encajados <b><?php echo $goles['ct_l_1t']; ?></b> en la primera parte y 
			 <b><?php echo $goles['ct_l_2t']; ?></b> en la segunda.
			 <?php if ($goles['propia_ct_l'] > 0) {
            if ($goles['propia_ct_l'] > 1) {
                echo ' Hay que añadir <b>'.$goles['propia_ct_l'].'</b> goles que anotaron en propia puerta sus rivales.';
            } else {
                echo ' Hay que añadir <b>1</b> gol que anotaron en propia puerta a su favor.';
            }
        } ?>

			<?php if ($goles['penal_ct_l'] > 0) {
            if ($goles['penal_ct_l'] > 1) {
                echo ' De estos goles <b>'.$goles['penal_ct_l'].'</b> fuerón de penalti.';
            } else {
                echo ' De estos goles <b>1</b> fué de penalti.';
            }
        } ?>

			<h5 class="text-center boldfont">Los goles en contra como visitante</h5>
			Estos <b><?php echo $estad['gcvisitante']; ?></b> goles fueron 
			encajados <b><?php echo $goles['ct_v_1t']; ?></b> en la primera parte y 
			 <b><?php echo $goles['ct_v_2t']; ?></b> en la segunda.
			 <?php if ($goles['propia_ct_v'] > 0) {
            if ($goles['propia_ct_v'] > 1) {
                echo ' Hay que añadir <b>'.$goles['propia_ct_v'].'</b> goles que anotaron en propia puerta sus rivales.';
            } else {
                echo ' Hay que añadir <b>1</b> gol que anotaron en propia puerta a su favor.';
            }
        } ?>

			<?php if ($goles['penal_ct_v'] > 0) {
            if ($goles['penal_ct_v'] > 1) {
                echo ' De estos goles <b>'.$goles['penal_ct_l'].'</b> fuerón de penalti.';
            } else {
                echo ' De estos goles <b>1</b> fué de penalti.';
            }
        }
    }  //si liga<25 se miran goles en primera y segunda parte

    $te_u_gol_favor = '';
    $te_u_gol_contra = '';
    if (isset($fila['u_gol_favor'])) {
        $e_u_gol_favor = explode(',', $fila['u_gol_favor']);
        if (0 == $fila['u_gol_favor']) {
            $te_u_gol_favor = '<br /><br />El '.$fila['nombre'].' todavía no ha conseguido ningún gol.';
        } else {
            $te_u_gol_favor = '<br /><br />Último gol a favor: <b>Jornada '.$e_u_gol_favor[1].'</b>  '.$e_u_gol_favor[0].' 
	<br />'.$e_u_gol_favor[2].'-'.$e_u_gol_favor[3].' (<b>'.$e_u_gol_favor[4].'-'.$e_u_gol_favor[5].'</b>)';
        }
    }

    if (isset($fila['u_gol_contra'])) {
        $e_u_gol_contra = explode(',', $fila['u_gol_contra']);
        if (0 == $fila['u_gol_contra']) {
            $te_u_gol_favor = '<br />El '.$fila['nombre'].' todavía no ha encajado ningún gol.';
        } else {
            if (isset($e_u_gol_favor[8])) {
                if ($e_u_gol_favor[8] == $e_u_gol_contra[8]) {
                    $te_u_gol_contra = ' y también en este partido recibió su último gol en contra.';
                } else {
                    $te_u_gol_contra = '<br />Último gol en contra: <b>Jornada '.$e_u_gol_contra[1].'</b> '.$e_u_gol_contra[0].' 
			<br />'.$e_u_gol_contra[2].'-'.$e_u_gol_contra[3].' (<b>'.$e_u_gol_contra[4].'-'.$e_u_gol_contra[5].'</b>)';
                }
            }
        }
    } ?>
<?php echo $te_u_gol_favor; ?>
<?php echo $te_u_gol_contra; ?>
</div>
<?php
} ?>

<div class="clear"></div>