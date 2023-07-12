<?php 

$documento='calendario';




$txt='<div style="height: 10mm; clear:both"></div><table><tr><td valign="top"><table>';

$fecha='';
foreach ($datosActiva as $k => $v) { 

    $obs=desglosarTexto($v['observaciones']); 

    

    if ($fecha!=$v['fecha']){

        $txt.='<tr><td colspan="4" align="center" style="padding: 1mm; font-size: 12pt; color: maroon">'.nombreDiacompleto($v['fecha']).'</td></tr>';

    }

    if ($v['estado_partido']==1){

      $txt.='<tr bgcolor="#EAF7D4" style="font-size: 15pt"><td style="padding: 1mm;">'.substr($v['hora_prevista'],0,5).'</td><td style="padding: 1mm;" align="right">'.$v['localCorto'].'</td><td align="center" style="padding: 1mm;"><b>'.$v['goles_local'].' - '.$v['goles_visitante'].'</b></td><td style="padding: 1mm;">'.$v['visitanteCorto'].'</td></tr>';    
      $txt.='<tr><td></td><td align="right">'.$obs[1].'</td><td></td><td>'.$obs[2].'</td></tr>'; 

    } else {

        $txt.='<tr bgcolor="#EAF7D4" style="font-size: 15pt"><td style="padding: 1mm;"></td><td style="padding: 1mm;" align="right">'.$v['localCorto'].'</td><td align="center" style="padding: 1mm;"><b>'.substr($v['hora_prevista'],0,5).'</b></td><td style="padding: 1mm;">'.$v['visitanteCorto'].'</td></tr>';

    }

    
    $fecha=$v['fecha'];
}
$txt.='</table></td>

<td style="padding: 5mm;font-size: 15pt" valign="top" align="center">
<img src="../../static/img/qr/marco.png" width="100" style="margin:0.5mm" /><br />Aqui tu QR <br />(web, carta, etc)<hr />
<img src="../../static/img/qr/torneo_'.$temporada_id.'.png" width="180" style="margin:0.5mm" /><br />Accede al<br />torneo.<hr />
<img src="../../static/img/qr/televisados.png" width="180" style="margin:0.5mm" /><br />Partidos<br />televisados.

</td></tr></table>';


$txt.='<div style="page-break-after:always; clear:both"></div>';

$txt.='<div style="height: 10mm; clear:both"></div>
<table style="width: 130mm"><tr><td valign="top"><table>
            <tr bgcolor="gainsboro"><td style="padding: 1mm;">P</td>
                <td style="padding: 1mm;" colspan="2">Equipo</td>
                <td style="padding: 1mm;">Pts</td>
                <td style="padding: 1mm;">Ju</td>
                <td style="padding: 1mm;">Ga</td>
                <td style="padding: 1mm;">Em</td>
                <td style="padding: 1mm;">Pe</td>
                <td style="padding: 1mm;">Fv</td>
                <td style="padding: 1mm;">Cn</td>
                <td style="padding: 1mm;">Di</td>
            </tr>'; 
foreach ($clasificacion as $k => $v) { 

    $txt.='<tr><td style="padding: 1mm;'.$v['css'].'; border-bottom: 0.5pt solid black" align="right">'.$v['posicion'].'º</td>
                <td style="padding: 1mm; border-bottom: 0.5pt solid black"><img src="../../static/img/club/escudo'.$v['club_id'].'.png" height="25" style="margin:0.5mm"></td>
                <td style="padding: 1mm; border-bottom: 0.5pt solid black">'.$v['nombreCorto'].'</td>
                <td style="padding: 1mm; border-bottom: 0.5pt solid black" align="center"><b>'.$v['puntos'].'</b></td>
                <td style="padding: 1mm; border-bottom: 0.5pt solid black" align="center">'.$v['jugados'].'</td>
                <td style="padding: 1mm; border-bottom: 0.5pt solid black" align="center">'.$v['ganados'].'</td>
                <td style="padding: 1mm; border-bottom: 0.5pt solid black" align="center">'.$v['empatados'].'</td>
                <td style="padding: 1mm; border-bottom: 0.5pt solid black" align="center">'.$v['perdidos'].'</td>
                <td style="padding: 1mm; border-bottom: 0.5pt solid black" align="center">'.$v['gFavor'].'</td>
                <td style="padding: 1mm; border-bottom: 0.5pt solid black" align="center">'.$v['gContra'].'</td>
                <td style="padding: 1mm; border-bottom: 0.5pt solid black" align="center">'.($v['gFavor']-$v['gContra']).'</td>
            </tr>';
}

$txt.='</table>';

$txt.='<table style="width: 130mm"><tr><td><div style="float:left">';
foreach ($leyenda as $k => $v) { 

 $txt.='<span style="margin: 3mm; padding: 3mm; background-color:'.$v['fondo'].';color:'.$v['color'].';">'.$v['leyenda'].'</span>';  
 
}
$txt.='</div></td></tr></table>
</td>

<td style="padding: 5mm;font-size: 15pt" valign="top" align="center">
<img src="../../static/img/qr/marco.png" width="100" style="margin:0.5mm" /><br />Aqui tu QR <br />(web, carta, etc)<hr />
<img src="../../static/img/qr/marco.png" width="100" style="margin:0.5mm" /><br />Aqui tu QR <br />(promociones, etc)<hr />
</td></tr></table>';

$txt.='<div style="page-break-after:always; clear:both"></div>';


$txt.='<div style="height: 10mm; clear:both"></div>
<h3>QR de los calendarios de los equipos del torneo.</h3><table><tr>';
$conta=0;
foreach ($equipos as $k => $v) {
    
    if ($conta==2){ $txt.='</tr><tr>'; $conta=0; } 

    
    $txt.='<td style="padding: 1mm; border-bottom: 0.5pt solid black" align="center"><img src="../../static/img/club/escudo'.$v['club_id'].'.png" height="48" style="margin:1mm"></td>
    <td style="padding: 1mm; border-bottom: 0.5pt solid black"><b>'.$v['nombreCorto'].'</b><br />'.$v['localidad'].'</td><td style="padding: 1mm; border-bottom: 0.5pt solid black">
    <img src="../../static/img/qr/equipo_'.$v['equipo_id'].'.png" width="48" style="margin:0.5mm" /></td>';
    $conta++;
}
$txt.='</tr></table>
<div style="height: 10mm; clear:both; padding:5mm; font-size:15pt"><img src="../../static/img/qr/correo.png" width="100" style="margin:0.5mm" style="float:left" />Personalizamos este flyer a tus necesidades, totalmente gratuito, a cambio de la difusión de nuestro sitio web.<br /><br /> Escanea el QR de la izquierda para solicitar información.</div>';







include '_estilos.php';?>

<page backtop="14mm" backbottom="14mm" backleft="10mm" backright="10mm" style="font-size: 11pt">
<page_header>
        <table width="100%">
            <tr>
                <td align="right" width="70">
                    <img src="../../static/img/futbolme.jpg" width="70">
                </td>
                <td style="font-size: 20pt" width="300"><?php echo $nombre?></td>
                <td align="right" style="font-size: 20pt;" width="300">Jornada <?php echo $jornadaActiva?></td>
            </tr>
        </table>


    </page_header>
    <page_footer>
        <table class="page_footer">
            <tr>
                <td style="width: 33%; text-align: left;">
                    <?php echo $documento?>
                </td>
                <td style="width: 34%; text-align: center">
                    page [[page_cu]]/[[page_nb]]
                </td>
                <td style="width: 33%; text-align: right">futbolme.com
                </td>
            </tr>
        </table>
    </page_footer>
    
    <?php echo $txt; ?>
    
    

</page>


