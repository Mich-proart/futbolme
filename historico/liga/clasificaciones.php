<?php 
define('_FUTBOLME_', 1);
require_once '../../src/config.php';

$titulo = 'CAMPEONATO NACIONAL DE LIGA';

$clashisto = 1;

if (isset($_GET['clashisto'])) {
    $clashisto = $_GET['clashisto'];
}

$clasificacion = clasificacionHistorica($clashisto);

?>
<div class="row nomargin" style="text-align:center; color:maroon; ">
*Todavía no está terminado. Puedes colaborar registrándote y reportándonos los datos que nos faltan.
</div>
<div class="row nomargin horizontaldivider">
<div class="nopadding col-xs-12 col-md-12 col-lg-12">
<table width='100%' border='0' cellpadding='3' cellspacing='1' bgcolor='#cccccc' align='center'>
<tr><td colspan='11' bgcolor='#99FF99'></td></tr>
<tr bgcolor='#336699'>
<td style='color:#FFFFFF' width='7%'>Pos</td>
<td style='color:#FFFFFF' width='7%'>Tmp</td>
<td style='color:#FFFFFF'>Equipo</td>
<td style='color:#FFFFFF' width='7%'>Ptos</td>
<td style='color:#FFFFFF' width='7%'>Ju</td>
<td style='color:#FFFFFF' width='7%'>Ga</td>
<td style='color:#FFFFFF' width='7%'>Em</td>
<td style='color:#FFFFFF' width='7%'>Pe</td>
<td style='color:#FFFFFF' width='7%'>Gf</td>
<td style='color:#FFFFFF' width='7%'>Gc</td>
<td style='color:#FFFFFF' width='7%'>Dif</td>
</tr>
<?php foreach ($clasificacion as $fila) {
    ?>
<tr bgcolor='#336699'>
<td style='color:#FFFFFF' width='7%'><?php echo $fila['posicion']; ?></td>
<td style='color:#FFFFFF' width='7%'><?php echo $fila['temporadas']; ?></td>
<td style='color:#FFFFFF'><?php echo $fila['equipo']; ?></td>
<td style='color:#FFFFFF' width='7%'><?php echo $fila['puntos']; ?></td>
<td style='color:#FFFFFF' width='7%'><?php echo $fila['jugados']; ?></td>
<td style='color:#FFFFFF' width='7%'><?php echo $fila['ganados']; ?></td>
<td style='color:#FFFFFF' width='7%'><?php echo $fila['empatados']; ?></td>
<td style='color:#FFFFFF' width='7%'><?php echo $fila['perdidos']; ?></td>
<td style='color:#FFFFFF' width='7%'><?php echo $fila['golesFavor']; ?></td>
<td style='color:#FFFFFF' width='7%'><?php echo $fila['golesContra']; ?></td>
<td style='color:#FFFFFF' width='7%'><?php echo $fila['golesFavor'] - $fila['golesContra']; ?></td>
</tr>
<?php
} ?>
</table>
</div>						
</div>