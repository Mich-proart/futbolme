<link href="/css/tablesorter/blue/style.css" rel="stylesheet">

<div class="clear"></div>
<div class="col-xs-12 whitebox text-center">
<?php if ($themoneytizer===1){ ?>
<div id="13939-19" style="height: 255px !important">
    <script src="//ads.themoneytizer.com/s/gen.js?type=19"></script><script src="//ads.themoneytizer.com/s/requestform.js?siteId=13939&formatId=19" ></script>
</div>
<?php } ?>
</div>
<div class="clear"></div>
<?php if ($temporada_id==14 || $temporada_id==17 || $temporada_id==18 || $temporada_id==20 || 
    $temporada_id==23 || $temporada_id==24 || $temporada_id==92 || $temporada_id==34){ 
   $clasiCoe=$clasificacion['clasificacionFinal'];
   foreach ($clasiCoe as $key => $value) {
       $clasiCoe[$key]['coe']=$value['puntos']/$value['jugados'];
   }
   $ordenCoe = [];
    foreach ($clasiCoe as $key => $clasifica) { $ordenCoe[$key] = $clasifica['coe'];}
    array_multisort($ordenCoe, SORT_DESC, SORT_NUMERIC, $clasiCoe);
   ?>

    <h2 class="text-center">Clasificación por coeficiente de puntos por partido.</h2>
<table  class="table tablesorter table-bordered table-condensed greenbox nomargin txt11">        
    <thead>
        <tr class="darkgreenbox h40 nopadding">
        <th style="padding: 1px;" class="text-center" title="Posición">PF</th>
        <th style="padding: 1px;" class="text-center" title="Posición">P</th>
        <th style="padding: 1px;min-width: 130px" class="text-center">Equipo</th>
        <th style="padding: 1px;" class="text-center" title="Puntos">Coe</th>
        <th style="padding: 1px;" class="text-center" title="Puntos">Pts</th>
        <th style="padding: 1px;" class="text-center" title="Jugados">Ju</th>
        <th style="padding: 1px;" class="text-center" title="Ganados">Ga</th>
        <th style="padding: 1px;" class="text-center" title="Empatados">Em</th>
        <th style="padding: 1px;" class="text-center" title="Perdidos">Pe</th>
        <th style="padding: 1px;" class="text-center" title="Goles a favor">Fav</th>
        <th style="padding: 1px;" class="text-center" title="Goles en contra">Con</th>
        <th style="padding: 1px;" class="text-center hidden-xs" title="Diferencia de goles">Dif</th>
    </tr>
    </thead>    

    <tbody class="whitebox">

            <?php foreach ($clasiCoe as $key => $fila) {            
            $pgEnlace = '/resultados-directo/equipo/'.poner_guion($fila['nombre']).'/'.$fila['equipo_id'];
            $color_fondo = 'white';
            $color_fila = '';            
            $rutaEscudo=rutaEscudo($fila['club_id'],$fila['equipo_id']);
            if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaEscudo))) {
                $rutaEscudo = '/img/jugadores/NI.png';
            } 
            if (($key+1)!=$fila['posicion']){ $color_fondo = 'gainsboro';}
            ?>
        


        <tr <?php echo $color_fila; ?>>
            <td class="text-center boldfont" style="<?php echo $fila['css']; ?>; padding: 1px;"><?php echo $key+1?></td>
            <td class="text-center" style="<?php echo $fila['css']; ?>; padding: 1px;"><?php echo $fila['posicion']; ?></td>
            <td style="text-align:left; padding: 1px;min-width: 130px" itemscope itemtype="http://schema.org/SportsTeam">
                <a href="<?php echo $pgEnlace; ?>&modelo=Calendario" title="Calendario del <?php echo $fila['nombreCorto']; ?>">
                <img src="<?php echo $rutaEscudo; ?>" itemprop="logo" alt="escudo <?=$fila['nombre'];?>" style="width:18px; height:20px; margin-right: 2px">
                    <strong class="hidden-sm hidden-md hidden-lg" itemprop="name"><?php echo $fila['nombreCorto']; ?></strong>
                    
                        <strong class="hidden-xs"><?php echo $fila['nombre']; ?></strong>
                   
                    <meta itemprop="url" content="<?=$pgEnlace;?>">
                </a>
            </td>
            <td class="text-center" style="padding: 1px;background-color:<?php echo $color_fondo; ?>">
            <a style="color:black" title="<?php echo $fila['nombreCorto']; ?> - Puntos por partido">
            <b><?php echo number_format($fila['coe'],3)?></b></a>
            </td>
            <td class="text-center" style="padding: 1px;background-color:<?php echo $color_fondo; ?>">
            <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Puntos" title="<?php echo $fila['nombreCorto']; ?> - Puntos conseguidos">
            <?php echo $fila['puntos']; ?></a>
            </td>
            <td class="text-center" style="padding: 1px;">
            <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Jugados" title="<?php echo $fila['nombreCorto']; ?> - Partidos jugados">
            <?php echo $fila['jugados']; ?></a>
                </td>
            <td class="text-center" style="padding: 1px;">
            <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Ganados" title="<?php echo $fila['nombreCorto']; ?> - Partidos ganados">
            <?php echo $fila['ganados']; ?></a>
            </td>
            <td class="text-center" style="padding: 1px;">
            <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Empatados" title="<?php echo $fila['nombreCorto']; ?> - Partidos empatados">
            <?php echo $fila['empatados']; ?></a>
            </td>
            <td class="text-center" style="padding: 1px;">
            <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Perdidos" title="<?php echo $fila['nombreCorto']; ?> - Partidos perdidos">
            <?php echo $fila['perdidos']; ?></a>
            </td>
            <td class="text-center" style="padding: 1px;">
            <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Favor" title="<?php echo $fila['nombreCorto']; ?> - Goles a favor">
            <?php echo $fila['gFavor']; ?></a>
            </td>
            <td class="text-center" style="padding: 1px;">
            <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Contra" title="<?php echo $fila['nombreCorto']; ?> - Goles en contra">
            <?php echo $fila['gContra']; ?></a>
            </td>
            <td class="text-center hidden-xs"><?php echo $fila['gFavor'] - $fila['gContra']; ?></td>
        </tr>
        

         <?php
        }

        unset($clasiCoe); ?>

    </tbody>
</table>

<?php } ?>

<div id="playClasi" class="col-xs-12 whitebox nopadding bloque-clasificacion">
<div class="clear h25"></div>
<div class="col-xs-12 nopadding txt11 marco">
	<div class="text-center cajagrisoscuro" style="padding:2px 6px; float:left; color:white;">
	<span style="cursor:pointer;" onclick="play_clasi(<?php echo $temporada_id; ?>,-3)">GENERAL</span>
	</div>
	<div class="text-center celestebox" style="padding:2px 6px; float:left; color:white;">
    <span style="cursor:pointer;" onclick="play_clasi(<?php echo $temporada_id; ?>,-1)">LOCAL</span>
	</div>

	<div class="text-center celestebox" style="padding:2px 6px; float:left; color:white;">
    <span style="cursor:pointer;" onclick="play_clasi(<?php echo $temporada_id; ?>,-2)">VISITANTE</span>
	</div>

    <?php if (isset($mitadJornada) && $jornadaActiva > $mitadJornada) { ?>
    <div class="text-center celestebox" style="padding:2px 6px; float:left; color:white;">
    <span style="cursor:pointer;" onclick="play_clasi(<?php echo $temporada_id; ?>,-4)">1ª VUELTA</span>
    </div>
    <div class="text-center celestebox" style="padding:2px 6px; float:left; color:white;">
    <span style="cursor:pointer;" onclick="play_clasi(<?php echo $temporada_id; ?>,-5)">2ª VUELTA</span>
    </div>    
    <?php } ?>
    <div class="text-center celestebox" style="padding:2px 6px; float:left; color:black; font-size: 12px">
    <span style="color:white">
        últimas Jornadas</span>
        <select onchange="play_clasi(<?php echo $temporada_id; ?>,this.value)">
            <option value="0">-</option>
            <?php if ($jornadaActiva>10) { ?><option value="-15">10</option><?php } ?>
            <?php if ($jornadaActiva>9) { ?><option value="-14">9</option><?php } ?>
            <?php if ($jornadaActiva>8) { ?><option value="-13">8</option><?php } ?>
            <?php if ($jornadaActiva>7) { ?><option value="-12">7</option><?php } ?>
            <?php if ($jornadaActiva>6) { ?><option value="-11">6</option><?php } ?>
            <?php if ($jornadaActiva>5) { ?><option value="-10">5</option><?php } ?>
            <?php if ($jornadaActiva>4) { ?><option value="-9">4</option><?php } ?>
            <?php if ($jornadaActiva>3) { ?><option value="-8">3</option><?php } ?>
            <?php if ($jornadaActiva>2) { ?><option value="-7">2</option><?php } ?>
            <?php if ($jornadaActiva>1) { ?><option value="-6">1</option><?php } ?>
        </select>
    </div>
</div>

<table id="latabla" class="table tablesorter table-bordered table-condensed greenbox nomargin txt11">        
    <thead>
        <tr class="darkgreenbox h40 nopadding">
        <th style="padding: 1px;" class="text-center" title="Posición">P</th>
        <th style="padding: 1px;min-width: 130px" class="text-center">Equipo</th>
        <th style="padding: 1px;" class="text-center" title="Puntos">Pts</th>
        <th style="padding: 1px;" class="text-center" title="Jugados">Ju</th>
        <th style="padding: 1px;" class="text-center" title="Ganados">Ga</th>
        <th style="padding: 1px;" class="text-center" title="Empatados">Em</th>
        <th style="padding: 1px;" class="text-center" title="Perdidos">Pe</th>
        <th style="padding: 1px;" class="text-center" title="Goles a favor">Fav</th>
        <th style="padding: 1px;" class="text-center" title="Goles en contra">Con</th>
        <th style="padding: 1px;" class="text-center hidden-xs" title="Diferencia de goles">Dif</th>
    </tr>
    </thead>    

    <tbody class="whitebox">
        <?php 

        if ($temporada_id==364){ 

           $clasificacion['clasificacionFinal'][12]['posicion']=14;
           $clasificacion['clasificacionFinal'][13]['posicion']=13;
           $array1=$clasificacion['clasificacionFinal'][12]; 
           $array2=$clasificacion['clasificacionFinal'][13];
            $clasificacion['clasificacionFinal'][12]=$array2;
            $clasificacion['clasificacionFinal'][13]=$array1;
        }

        

        /*clasificacion aleatoria
        if ($temporada_id>0 && $temporada_id<3){
            $colores=array();
            foreach ($clasificacion['clasificacionFinal'] as $key => $fila) {
                $colores[$key]['posicion']=$fila['posicion'];
                $colores[$key]['css']=$fila['css'];
            }
            $aleatoria=$clasificacion['clasificacionFinal'];
            shuffle($aleatoria);
            foreach ($aleatoria as $key => $value) {
                $aleatoria[$key]['css']=$colores[$key]['css'];
                $aleatoria[$key]['posicion']=$colores[$key]['posicion'];
            } 
            $clasificacion['clasificacionFinal']=$aleatoria;
        }*/


        foreach ($clasificacion['clasificacionFinal'] as $key => $fila) {

            //imp($fila);
            if (isset($clasificacionFed)){
                //imp($clasificacionFed[$key+2]);

                $fila['equipo_id']=$clasificacionFed[$key+2]['equipo_id'];
                $fila['club_id']=$clasificacionFed[$key+2]['club_id'];
                $fila['nombre']=$clasificacionFed[$key+2]['nombreFM'];
                $fila['nombreCorto']=$clasificacionFed[$key+2]['nombreFM'];
                $fila['puntos']=$clasificacionFed[$key+2]['puntos'];
                $fila['jugados']=($clasificacionFed[$key+2]['jc']+$clasificacionFed[$key+2]['jf']);
                $fila['ganados']=($clasificacionFed[$key+2]['gc']+$clasificacionFed[$key+2]['gf']);
                $fila['empatados']=($clasificacionFed[$key+2]['ec']+$clasificacionFed[$key+2]['ef']);
                $fila['perdidos']=($clasificacionFed[$key+2]['pc']+$clasificacionFed[$key+2]['pf']);
                $fila['gFavor']=$clasificacionFed[$key+2]['gfavor'];
                $fila['gContra']=$clasificacionFed[$key+2]['gcontra'];
                


            }
            

            //die;



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

            
            $rutaEscudo=rutaEscudo($fila['club_id'],$fila['equipo_id']);
            


            if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaEscudo))) {
                $rutaEscudo = '/img/jugadores/NI.png';
            } ?>
        


        <tr <?php echo $color_fila; ?>>
            <?php if (isset($trt)) {
                ?>
            <td class="text-center" style="padding: 0px;"><?php echo $key + 1; ?></td>
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
        	<td class="text-center" style="<?php echo $fila['css']; ?>; padding: 1px;"><?php echo $fila['posicion']; ?></td>
    		<td style="text-align:left; padding: 1px;min-width: 130px" itemscope itemtype="http://schema.org/SportsTeam">
    			<a href="<?php echo $pgEnlace; ?>&modelo=Calendario" title="Calendario del <?php echo $fila['nombreCorto']; ?>">
                <img src="<?php echo $rutaEscudo; ?>" itemprop="logo" alt="escudo <?=$fila['nombre'];?>" style="width:18px; height:20px; margin-right: 2px">
                    <strong class="hidden-sm hidden-md hidden-lg" itemprop="name"><?php echo $fila['nombreCorto']; ?></strong>
                    
                        <strong class="hidden-xs"><?php echo $fila['nombre']; ?></strong>
                   
                    <meta itemprop="url" content="<?=$pgEnlace;?>">
    			</a>
    		</td>
    		<td class="text-center" style="padding: 1px;background-color:<?php echo $color_fondo; ?>">
    		<a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Puntos" title="<?php echo $fila['nombreCorto']; ?> - Puntos conseguidos">
    		<b><?php echo $fila['puntos']; ?></b></a>
    		</td>
    		<td class="text-center" style="padding: 1px;">
    		<a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Jugados" title="<?php echo $fila['nombreCorto']; ?> - Partidos jugados">
    		<?php echo $fila['jugados']; ?></a>
        		</td>
    		<td class="text-center" style="padding: 1px;">
    		<a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Ganados" title="<?php echo $fila['nombreCorto']; ?> - Partidos ganados">
    		<?php echo $fila['ganados']; ?></a>
    		</td>
    		<td class="text-center" style="padding: 1px;">
    		<a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Empatados" title="<?php echo $fila['nombreCorto']; ?> - Partidos empatados">
    		<?php echo $fila['empatados']; ?></a>
    		</td>
    		<td class="text-center" style="padding: 1px;">
    		<a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Perdidos" title="<?php echo $fila['nombreCorto']; ?> - Partidos perdidos">
    		<?php echo $fila['perdidos']; ?></a>
    		</td>
    		<td class="text-center" style="padding: 1px;">
    		<a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Favor" title="<?php echo $fila['nombreCorto']; ?> - Goles a favor">
    		<?php echo $fila['gFavor']; ?></a>
    		</td>
    		<td class="text-center" style="padding: 1px;">
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

<?php /*
<div class="marco col-xs-12 text-center">
    <h4 class="text-center">Clasificaciones generales</h4>
    <div class="col-xs-4 text-center">
        <a href="/generalClas.php?fm=0">Nacional</a>
    </div>
    <div class="col-xs-4 text-center">
        <a href="/generalClas.php?t=1&fm=0">Segunda B</a>
    </div>
    <div class="col-xs-4 text-center">
        <a href="/generalClas.php?t=2&fm=0">Tercera</a>
    </div>
</div>
<?php */?>


<script src="/js/tablesorter/jquery.tablesorter.js"></script>
<script>
 $(function(){
 	$("#latabla").tablesorter();
});
</script>
