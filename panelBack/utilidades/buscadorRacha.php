	<table style="width:600px; font-size: 15px" cellspacing="2" cellpadding="2">
	    <?php
	    foreach ($e_racha as $f) {
	    	$fila = explode(',', $f);

	    	if (count($fila)<7){ continue; }

	        if ($equipo_id == $fila[6]) {
	            $Flocal = 'color:rgb(232, 28, 28);;';
	            $Fvisitante = 'color:black;';
	        }
	        if ($equipo_id == $fila[7]) {
	            $Flocal = 'color:black;';
	            $Fvisitante = 'color: rgb(232, 28, 28);';
	        } 


	if ( ($equipo_id == $fila[6] && $fila[4] < $fila[5])
	    || ($equipo_id == $fila[7] && $fila[4] > $fila[5])) {
		if ($equipo_id == $fila[6]) { 
			$colorI='#B40404'; $peL++;
		} else { 
			$colorI='#FE642E'; $peV++;
		}
	    $icono='<div style="font-weight:300; background-color:'.$colorI.'; padding:3px; color:white">D</div>';
	}

	if ( ($equipo_id == $fila[6] && $fila[4] > $fila[5])
	    || ($equipo_id == $fila[7] && $fila[4] < $fila[5])) {
		if ($equipo_id == $fila[6]) { 
			$colorI='#0B610B'; $gaL++;
		} else { 
			$colorI='#01DF01'; $gaV++;
		}
		$icono='<div style="font-weight:300; background-color:'.$colorI.'; padding:3px; color:white">V</div>';
	}


	if ($fila[4] == $fila[5]) {
		if ($equipo_id == $fila[6]) { 
			$colorI='orange'; $emL++;
		} else { 
			$colorI='#FACC2E'; $emV++;
		}
		$icono='<div style="font-weight:300; background-color:'.$colorI.'; padding:3px; color:white">E</div>';
	}

	if ($equipo_id == $fila[6]) {
	    $iconoGF='<div style="font-weight:300; background-color:#0B2161; padding:3px; color:white">'.$fila[4].'</div>';
	    $iconoGC='<div style="font-weight:300; background-color:#424242; padding:3px; color:white">'.$fila[5].'</div>';
	    $gfL=$gfL+$fila[4];
	    $gcL=$gcL+$fila[5];
	}
	if ($equipo_id == $fila[7]) {
	    $iconoGF='<div style="font-weight:300; background-color:#013ADF; padding:3px; color:white">'.$fila[5].'</div>';
	    $iconoGC='<div style="font-weight:300; background-color:#A4A4A4; padding:3px; color:white">'.$fila[4].'</div>';
	    $gfV=$gfV+$fila[5];
	    $gcV=$gcV+$fila[4];
	}?>
	<tr style="background-color:#ECF6CE;">
	    <td style="text-align:center;"><?php echo 'J '.$fila[1];?></td>
	    <td style="text-align:center;"><?php echo $fila[0];?></td>
	    <td style="text-align:right;<?php echo $Flocal; ?>"><?php echo $fila[2]; ?></td>
	    <td style="text-align:center;"><?php echo $fila[4]."-".$fila[5]; ?></td>
	    <td style="text-align:left;<?php echo $Fvisitante; ?>"><?php echo $fila[3]; ?></td>
	    <td><?php echo $icono?></td>
	    <td><?php echo $iconoGF?></td>
	    <td><?php echo $iconoGC?></td>
	</tr>
	<?php
	} ?>
	</table>

	<?php

echo "<hr />";
if (($gaL+$gaV)==0){ 
    echo "No ha ganado ningún partido.<br />";
} else {
    if ($gaL==0){ echo "No ha ganado en casa.<br />"; }
    if ($gaV==0){ echo "No ha ganado fuera.<br />"; }
    if ($gaL>0){ echo "Ganados como local ".$gaL."<br />";}
    if ($gaV>0){ echo "Ganados como visitante ".$gaV."<br />";}
    if ($gaL>0 && $gaV>0){ echo "Ganados en total ".($gaL+$gaV)."<br />";}
}

echo "<hr />";
if (($emL+$emV)==0){ 
    echo "No ha empatado ningún partido.<br />";
} else {
    if ($emL==0){ echo "No ha empatado en casa.<br />"; }
    if ($emV==0){ echo "No ha empatado fuera.<br />"; }
    if ($emL>0){ echo "Empatados como local ".$emL."<br />";}
    if ($emV>0){ echo "Empatados como visitante ".$emV."<br />";}
    if ($emL>0 && $emV>0){ echo "Empatados en total ".($emL+$emV)."<br />";}
}

echo "<hr />";
if (($peL+$peV)==0){ 
    echo "No ha empatado ningún partido.<br />";
} else {
    if ($peL==0){ echo "No ha perdido en casa.<br />"; }
    if ($peV==0){ echo "No ha perdido fuera.<br />"; }
    if ($peL>0){ echo "Perdidos como local ".$peL."<br />";}
    if ($peV>0){ echo "Perdidos como visitante ".$peV."<br />";}
    if ($peL>0 && $peV>0){ echo "Perdidos en total ".($peL+$peV)."<br />";}
}

echo "<hr />";
if (($gfL+$gfV)==0){ 
    echo "No ha metido ningún gol.<br />";
} else {
    if ($gfL==0){ echo "No ha metido ningún gol en casa.<br />"; }
    if ($gfV==0){ echo "No ha metido ningún gol fuera.<br />"; }
    if ($gfL>0){ echo "Goles a favor como local ".$gfL."<br />";}
    if ($gfV>0){ echo "Goles a favor como visitante ".$gfV."<br />";}
    if ($gfL>0 && $gfV>0){ echo "Goles a favor en total ".($gfL+$gfV)."<br />";}
}

echo "<hr />";
if (($gcL+$gcV)==0){ 
    echo "No ha recibido ningún gol.<br />";
} else {
    if ($gcL==0){ echo "No ha recibido ningún gol en casa.<br />"; }
    if ($gcV==0){ echo "No ha recibido ningún gol fuera.<br />"; }
    if ($gcL>0){ echo "Goles en contra como local ".$gcL."<br />";}
    if ($gcV>0){ echo "Goles en contra como visitante ".$gcV."<br />";}
    if ($gcL>0 && $gfV>0){ echo "Goles en contra en total ".($gcL+$gcV)."<br />";}
}




$u_derrota = explode(',', $racha[$equipo_id]['u_derrota']);
    $p=$u_derrota[2].$u_derrota[3];$p=str_replace($nombreCorto, "", $p);
    if ($nombreCorto==$u_derrota[2]) { $txt=" en casa "; }else { $txt=" fuera ";}
    echo "Última derrota: Jornada ".$u_derrota[1]." 
    Fecha ".$u_derrota[0]." ".$txt." contra el ".$p." (".$u_derrota[4]."-".$u_derrota[5].")<br />";

    $u_gol_contra = explode(',', $racha[$equipo_id]['u_gol_contra']);
    $p=$u_gol_contra[2].$u_gol_contra[3];$p=str_replace($nombreCorto, "", $p);
    if ($nombreCorto==$u_gol_contra[2]) { $txt=" en casa "; } else { $txt=" fuera ";}
    echo "Último gol en contra: Jornada ".$u_gol_contra[1]." 
    Fecha ".$u_gol_contra[0]." ".$txt." contra el ".$p." (".$u_gol_contra[4]."-".$u_gol_contra[5].")<br />";

    $u_gol_favor = explode(',', $racha[$equipo_id]['u_gol_favor']);
    $p=$u_gol_favor[2].$u_gol_favor[3];$p=str_replace($nombreCorto, "", $p);
    if ($nombreCorto==$u_gol_favor[2]) { $txt=" en casa "; }else { $txt=" fuera ";}
    echo "Último gol a favor: Jornada ".$u_gol_favor[1]." 
    Fecha ".$u_gol_favor[0]." ".$txt." contra el ".$p." (".$u_gol_favor[4]."-".$u_gol_favor[5].")<br />";

    $u_punto = explode(',', $racha[$equipo_id]['u_punto']);
    $p=$u_punto[2].$u_punto[3];$p=str_replace($nombreCorto, "", $p);
    if ($nombreCorto==$u_punto[2]) { $txt=" en casa "; }else { $txt=" fuera ";}
    echo "Último punto conseguido: Jornada ".$u_punto[1]." 
    Fecha ".$u_punto[0]." ".$txt." contra el ".$p." (".$u_punto[4]."-".$u_punto[5].")<br />";

    $u_victoria = explode(',', $racha[$equipo_id]['u_victoria']);
    $p=$u_victoria[2].$u_victoria[3];$p=str_replace($nombreCorto, "", $p);
    if ($nombreCorto==$u_victoria[2]) { $txt=" en casa "; } else { $txt=" fuera ";}
    echo "Última victoria: Jornada ".$u_victoria[1]." 
    Fecha ".$u_victoria[0]." ".$txt." contra el ".$p." (".$u_victoria[4]."-".$u_victoria[5].")<br />";
