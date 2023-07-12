


<table id="latabla" class="table tablesorter table-bordered table-condensed greenbox nomargin txt11">
	<thead>
        <tr class="darkgreenbox">               
                <th class="text-center" title="Posición">P</th>
                <th class="text-center"><?php echo $partido['nombreGrupo']?></th>
                <th class="text-center" title="Puntos">Pts</th>
                <th class="text-center" title="Jugados">Ju</th>
                <th class="text-center" title="Ganados">Ga</th>
                <th class="text-center" title="Empatados">Em</th>
                <th class="text-center" title="Perdidos">Pe</th>
                <th class="text-center" title="Goles a favor">Fav</th>
                <th class="text-center" title="Goles en contra">Con</th>
        </tr>
    </thead>
    <tbody class="whitebox" style="color:dimgray">
        <?php 

        /*if ($idPais==60){
            shuffle($clasificacion['clasificacionFinal']);
        }*/

        foreach ($clasificacion['clasificacionFinal'] as $key => $fila) {

        
            $pgEnlace = '/equipo.php?id='.$fila['equipo_id'].'&modelo=Calendario&vista='.$partido['temporada_id'].'&nv='.$partido['nombreTemporada'];

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
            <td class="text-center">

            <a href='/temporada.php?id=<?php echo $fila['temporada_id']; ?>'>
            <?php
            if (1 == $fila['temporada_id']) {
                echo '1ª';
            }
                if (2 == $fila['temporada_id']) {
                    echo '2ª';
                }
                if ($fila['temporada_id'] > 2 && $fila['temporada_id'] < 7) {
                    echo '2BG'.($fila['temporada_id'] - 2);
                }
                if ($fila['temporada_id'] > 6) {
                    $d = ($fila['temporada_id'] - 6);
                    if ($d < 10) {
                        $d = '0'.$d;
                    }
                    echo '3a'.$d;
                } ?></a></td>
            <td class="text-center"><?php echo number_format(($fila['puntos'] / $fila['jugados']), 2); ?></td>
            <?php
            } ?>
        	<td class="text-center" style="<?php echo $fila['css']; ?>"><?php echo $fila['posicion']; ?></td>
    		<td style="text-align:left;" itemscope itemtype="http://schema.org/SportsTeam">
    			<a href="<?php echo $pgEnlace; ?>&modelo=Calendario" title="Calendario del <?php echo $fila['nombreCorto']; ?>">

                    
                <?php if (1 == $seleccion) {
                    $bandera = XsacarBandera($fila['equipo_id']); ?>
                    <img src="/img/paises/banderas/ban<?php echo $bandera; ?>b.png" alt="bandera" style="width:34px; height:20px">
                <?php } else { ?>
                    <img src="<?php echo $rutaEscudo; ?>" itemprop="logo" alt="escudo <?=$fila['nombre'];?>"  style="width:18px; height:20px; margin-right: 5px">
                <?php } ?>

                    <strong class="hidden-sm hidden-md hidden-lg" itemprop="name"><?php echo $fila['nombreCorto']; ?></strong>
                    <strong class="hidden-xs"><?php echo $fila['nombre']; ?></strong>
                    <meta itemprop="url" content="<?=$pgEnlace;?>">
    			</a>
    		</td>
    		<td class="text-center" style="background-color:<?php echo $color_fondo; ?>">
    		<b><?php echo $fila['puntos']; ?></b></td>
    		<td class="text-center"><?php echo $fila['jugados']; ?></td>
    		<td class="text-center"><?php echo $fila['ganados']; ?></td>
    		<td class="text-center"><?php echo $fila['empatados']; ?></td>
    		<td class="text-center"><?php echo $fila['perdidos']; ?></td>
    		<td class="text-center"><?php echo $fila['gFavor']; ?></td>
    		<td class="text-center"><?php echo $fila['gContra']; ?></td>
        </tr>
        

         <?php
        } ?>
         
    		
    </tbody>
</table>

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


<div class="col-xs-12">
    <div class="col-xs-6">								
    	<?php 
        foreach ($clasificacion['leyenda'] as $fila) {
            ?>
    	<div class="text-center" style="padding:2px 6px; float:left; color:<?php echo $fila['color']; ?>;background-color:<?php echo $fila['fondo']; ?>"><?php echo $fila['leyenda']; ?></div>
    	<?php
        } ?>
    </div>
    <div class="col-xs-6">
       <span class="text-center">* Pulsa en los equipos para ver sus calendarios en los diferentes torneos</span>
    </div>
    <div class="row h40"></div> 
</div>


