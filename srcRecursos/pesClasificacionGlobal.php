<link href="/css/tablesorter/blue/style.css" rel="stylesheet">



<div id="playClasi" class="col-xs-12 whitebox nopadding bloque-clasificacion">
<div class="clear h25"></div>

<table id="latabla" class="table tablesorter table-bordered table-condensed greenbox nomargin txt11">
	<thead>
        <tr class="darkgreenbox h40">
                <th class="text-center" title="Posición">P</th>
                <th class="text-center hidden-xs" title="Liga">Liga</th>
                <th class="text-center hidden-xs" title="porcentaje">%</th>
                <th class="text-center" title="Posición">P</th>
                <th class="text-center">Equipo</th>
                <th class="text-center" title="Puntos">Pts</th>
                <th class="text-center" title="Jugados">Ju</th>
                <th class="text-center" title="Ganados">Ga</th>
                <th class="text-center" title="Empatados">Em</th>
                <th class="text-center" title="Perdidos">Pe</th>
                <th class="text-center" title="Goles a favor">Fav</th>
                <th class="text-center" title="Goles en contra">Con</th>
                <th class="text-center hidden-xs" title="Diferencia de goles">Dif</th>
        </tr>
    </thead>
    <tbody class="whitebox">
        <?php 

        /*if ($idPais==60){
            shuffle($clasificacion['clasificacionFinal']);
        }*/

        foreach ($clasificacion['clasificacionFinal'] as $key => $fila) {

         

            if ($key<30){
                $equiposTw[$key]['id'] = $fila['equipo_id'];
                $equiposTw[$key]['equipo'] = $fila['nombreCorto'];
                $equiposTw[$key]['idPais'] = 60;
            }
            
            $pgEnlace = '/resultados-directo/equipo/'.poner_guion($fila['nombre']).'/'.$fila['equipo_id'];

            

            $color_fondo = 'white';
            if (isset($fila['preferente'])) {
                if (1 == $fila['preferente']) {
                    $color_fondo = 'yellow';
                }
            }

            $color_fila = '';
            if (isset($equipo_id) && $equipo_id == $fila['equipo_id']) {
                $color_fila = "style='background-color:#BCF5A9'";
            }
            if (isset($equipo_rival_id) && $equipo_rival_id == $fila['equipo_id']) {
                $color_fila = "style='background-color:#F8E6E0'";
            }

            $rutaEscudo = '/img/equipos/escudo'.$fila['equipo_id'].'.png';
            if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaEscudo))) {
                $rutaEscudo = '/img/jugadores/NI.png';
            } ?>
        <tr <?php echo $color_fila; ?>>
            <?php if (isset($trt)) {
                ?>
            <td class="text-center"><?php echo $key + 1; ?></td>
            <td class="text-center hidden-xs">

            <a href='/temporada.php?id=<?php echo $fila['temporada_id']; ?>'>
            <?php
            if (1 == $fila['temporada_id']) {echo '1ª'; }
            if (2 == $fila['temporada_id']) {echo '2ª'; }
            if ($fila['temporada_id'] > 2 && $fila['temporada_id'] < 7) {echo '2BG'.($fila['temporada_id'] - 2);}
            if ($fila['temporada_id'] > 6) {
                    $d = ($fila['temporada_id'] - 6);
                    if ($d < 10) {$d = '0'.$d;}
                    echo '3a'.$d;
                } ?></a>
            </td>
            <td class="text-center hidden-xs"><?php
            if ($fila['jugados']>0){ echo number_format(($fila['puntos'] / $fila['jugados']), 2); }?>
            </td>
            <?php
            } ?>
        	<td class="text-center" style="<?php echo $fila['css']; ?>"><?php echo $fila['posicion']; ?></td>
    		<td style="text-align:left;" itemscope itemtype="http://schema.org/SportsTeam">
    			<a href="<?php echo $pgEnlace; ?>&modelo=Calendario" title="Calendario del <?php echo $fila['nombreCorto']; ?>">
                    <img class="hidden-xs" src="<?php echo $rutaEscudo; ?>" itemprop="logo" alt="escudo <?=$fila['nombre'];?>"  style="width:18px; height:20px; margin-right: 5px">
                    <strong class="hidden-sm hidden-md hidden-lg" itemprop="name"><?php echo $fila['nombreCorto']; ?></strong>
                    <?php if ($_SESSION['user_id']==5211){ 
                     $twiter=sacarTwitter($fila['equipo_id']); ?>
                        <strong class="hidden-xs">@<?php echo ($twiter[0]); ?></strong>
                    <?php } else { ?>
                        <strong class="hidden-xs"><?php echo $fila['nombre']; ?></strong>
                    <?php } ?>
                    <meta itemprop="url" content="<?=$pgEnlace;?>">
    			</a>
                <br />
                <span class="visible-xs pull-left">
                    <?php echo number_format(($fila['puntos'] / $fila['jugados']), 2); ?>
                </span>
                <span class="visible-xs pull-right">
                    <a href='/temporada.php?id=<?php echo $fila['temporada_id']; ?>' style="color:maroon">
                    <?php
                    if (1 == $fila['temporada_id']) {echo '1ª'; }
                    if (2 == $fila['temporada_id']) {echo '2ª'; }
                    if ($fila['temporada_id'] > 2 && $fila['temporada_id'] < 7) {echo '2BG'.($fila['temporada_id'] - 2);}
                    if ($fila['temporada_id'] > 6) {
                            $d = ($fila['temporada_id'] - 6);
                            if ($d < 10) {$d = '0'.$d;}
                            echo '3a'.$d;
                        } ?></a>
                </span>
    		</td>
    		<td class="text-center" style="background-color:<?php echo $color_fondo; ?>">
    		<a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Puntos" title="<?php echo $fila['nombreCorto']; ?> - Puntos conseguidos">
    		<b><?php echo $fila['puntos']; ?></b></a>
    		</td>
    		<td class="text-center">
    		<a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Jugados" title="<?php echo $fila['nombreCorto']; ?> - Partidos jugados">
    		<?php echo $fila['jugados']; ?></a>
        		</td>
    		<td class="text-center">
    		<a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Ganados" title="<?php echo $fila['nombreCorto']; ?> - Partidos ganados">
    		<?php echo $fila['ganados']; ?></a>
    		</td>
    		<td class="text-center">
    		<a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Empatados" title="<?php echo $fila['nombreCorto']; ?> - Partidos empatados">
    		<?php echo $fila['empatados']; ?></a>
    		</td>
    		<td class="text-center">
    		<a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Perdidos" title="<?php echo $fila['nombreCorto']; ?> - Partidos perdidos">
    		<?php echo $fila['perdidos']; ?></a>
    		</td>
    		<td class="text-center">
    		<a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Favor" title="<?php echo $fila['nombreCorto']; ?> - Goles a favor">
    		<?php echo $fila['gFavor']; ?></a>
    		</td>
    		<td class="text-center">
    		<a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Contra" title="<?php echo $fila['nombreCorto']; ?> - Goles en contra">
    		<?php echo $fila['gContra']; ?></a>
    		</td>
    		<td class="text-center hidden-xs"><?php echo $fila['gFavor'] - $fila['gContra']; ?></td>
        </tr>
        

         <?php
        } ?>
         
    		
    </tbody>
</table>
</div>

<?php if (isset($clasificacion['sanciones'])) {
            ?>
<div class="col-xs-12 marco">
    <?php foreach ($clasificacion['sanciones'] as $fila) {
                if (isset($fila['nombre'])) {
                    ?>
        <b><?php echo $fila['nombre']; ?></b> cuenta con <span style='color:red'><b><?php echo $fila['puntos']; ?></b></span> puntos por sanción federativa<br />
        <?php 
        include 'pesSanciones.php';
                }
            } ?>
</div>
<?php
        } ?>

<?php if (!isset($trt)) {
            ?>
<div class="col-xs-12">
	<span class="text-center hidden-xs">* Pulsando en cualquier número de la tabla ampliarás información</span>
 	<span class="text-center visible-xs">* Pulsa en un número para +info</span>
</div>



<div class="col-xs-12">								
	<?php 
    foreach ($clasificacion['leyenda'] as $fila) {
        ?>
	<div class="text-center" style="padding:2px 6px; float:left; color:<?php echo $fila['color']; ?>;background-color:<?php echo $fila['fondo']; ?>"><?php echo $fila['leyenda']; ?></div>
	<?php
    } ?>
<div class="row h40"></div>	
</div>
<?php
        } ?>

<div class="marco col-xs-12 text-center">
    <h4 class="text-center">Clasificaciones generales</h4>
    <div class="col-xs-4 text-center">
        <a href="/e/general.php">Nacional</a>
    </div>
    <div class="col-xs-4 text-center">
        <a href="/e/general.php?t=1">Segunda B</a>
    </div>
    <div class="col-xs-4 text-center">
        <a href="/e/general.php?t=2">Tercera</a>
    </div>
</div>

<script src="/js/tablesorter/jquery.tablesorter.js"></script>
<script>
 $(function(){
 	$("#latabla").tablesorter();
});
</script>
