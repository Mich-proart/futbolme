<?php 
if ($diaN<6){
    if ($comunidad_id>1){
    	$path = 'json/indexFed.json';
    	$json = file_get_contents($path);
    	$resultado = json_decode($json, true);



    	$partidosFed=array();
    	foreach ($resultado as $key => $value) {
    	    $partidosFed[$value['idComunidad']][$value['temporada_id']][]=$value;
    	} 

        if ($temporada_id==15){ $comunidad_id=10; }
        if ($temporada_id==16){ $comunidad_id=11; }
        
        ?>

    	<div class="col-xs-12">
    	<?php 
    	$pagina="index";
        if (isset($partidosFed[$comunidad_id][$temporada_id])){
        	foreach ($partidosFed[$comunidad_id][$temporada_id] as $key => $partido) {
        	    if ($partido['jornada']!=$valorJornada){
        	        include 'includes/contenidoPartido.php'; 
        	    }  
        	}
        }
    	$pagina="temporada"; ?>
        </div>
    <?php } 
}


?>

<?php include 'includes/publicidad/adsenseAdaptable.php'; ?>

<div class="col-xs-12">
	<div id="selector-jornadas" class="col-xs-8 btn txt11">
          <div class="btn-group">
            <?php if ($valorJornada > 1) { ?>
            <a class="btn btn-success pull-left" href="<?php echo $pgTemporada; ?><?php echo $valorJornada - 1; ?>"><span id="jornada-previa" data-val="<?php echo $valorJornada - 1; ?>" class="iconseparate glyphicon glyphicon-chevron-left"></span></a>
            <?php } ?>
            <?php if ($valorJornada < $jornadas && $valorJornada > 0) { ?>
            <a class="pull-right btn btn-success" href="<?php echo $pgTemporada; ?><?php echo $valorJornada + 1; ?>"><span id="jornada-posterior" data-val="<?php echo $valorJornada + 1; ?>" class="iconseparate glyphicon glyphicon-chevron-right"></span></a>
            <?php } ?>
            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font style="vertical-align: inherit;">Jornada <?php echo $valorJornada; ?> de <?php echo $jornadas; ?></font></button>
            <div class="dropdown-menu" x-placement="bottom-start"> 
              <div class='menu_16 text-center'>
                    <?php for ($i = 0; $i < $jornadas; ++$i) {?>
                    <div class='text-center boldfont' style='border: 1px solid black; float:left; min-width:40px; height:40px; font-size:20px'>
                    <a href='<?php echo $pgTemporada; ?><?php echo $i + 1; ?>'>
                    <?php echo $i + 1; ?></a></div>                                 
                    <?php } ?>
                </div>                                
            </div>
          </div>
	</div>
</div>

<div class="col-xs-12 nopadding" id="mostrar-calendario"></div>
	
	<div id="contenedor-jornada-clasificacion" class="col-xs-12">
	<?php 

    if (!(empty($_GET['jornada']) || '-1' == $_GET['jornada']) && $_GET['jornada'] != $jornadaActiva) {
        $c_directos = 0;
    }

    if ($c_directos > 0) {
        ?>
	<div class="col-xs-12">
		<span class="actua pull-right badge" style="font-weight:100;">
		Actualizado a las <?php echo $hora = date('H:i:s'); ?>
		</span>
		<?php include 'includes/contenidoDirecto.php'; ?>
		
	</div>
	<?php
    } ?>

	<?php 

    //imp($partidosFed2);
    $jornadaFed2=$partidosFed2[0]['jornada']??0;
    

    if ($valorJornada > 0) {
        ?>
		<?php 
            $f = '';
        $colorFondo = '';
        $html = '';
        $partidosSinFecha=array();        
        foreach ($partidosJornada as $key => $partido) {     

        //imp($partido);       
            
            if (is_null($partido['fecha'])){
                $partidosSinFecha[]=$partido;continue;
            }
            if (2 == (int)$partido['estado_partido'] || (int)$partido['estado_partido']>5) {
                continue;
            }

            if ($key==3){ ?>
                <div class="clear"></div>
                <div class="col-xs-12 whitebox text-center">
                <?php if ($clickio===1){ ?>

                <?php } ?>
                </div>
                <div class="clear"></div>
            <?php  }

            if ($f != $partido['fecha']) {
                if ('whitebox' == $colorFondo) {
                    $colorFondo = 'cajagrisclaro';
                } else {
                    $colorFondo = 'whitebox';
                } ?>
			<div class="col-xs-12 txt11 cajanaranja text-center"><?php echo nombreDiaCompleto($partido['fecha']); ?></div>
			<?php
            }
            if (null == $partido['equipoLocal_id'] || null == $partido['equipoVisitante_id']) {
                $html = '<span class="boldfont" style="margin-left: 20px;">
					Descansa ';
                if (null == $partido['equipoLocal_id']) {
                    $html .= $partido['visitante'];
                } else {
                    $html .= $partido['local'];
                }
                $html.'</span>';
            } else {
                include 'includes/contenidoPartido.php';
            }
            $f = $partido['fecha'];
        }


        echo $html;

        if (count($partidosSinFecha)>0){ ?>
            <div class="col-xs-12 txt11 cajanaranja text-center">Sin fecha definida</div>
            <?php foreach ($partidosSinFecha as $key => $partido) {
                include 'includes/contenidoPartido.php';
            }
        }

        //if ($temporada_id==2) { imp($clasificacion); }?>

			<div class="clear"></div>

            <?php 
            //require_once __DIR__.'/../includes/publicidad/adVideoInText.php';
        
        if (isset($clasificacion)) {
                    
            require_once __DIR__.'/pesClasificacion.php';
        }

        if (count($aplazados)>0){ ?>
            <div class="marco clear" style="background-color: lavender">
             <h3>Partidos aplazados</h3>
            <table class="table" style="background-color: gainsboro">
                <?php foreach ($aplazados as $k => $v) {
                $fecha2 = date_create($v['fecha'])?>
                   <tr bgcolor="white">
                    <td class="text-center boldfont">Jda. <?php echo $v['jornada']?></td>
                    <td class="text-center"><?php echo date_format($fecha2, 'd/m/y');?></td>
                    <td class="text-center"><?php echo substr($partido['hora_prevista'], 0, 5);?></td>
                    <td align="right" class="boldfont"><?php echo $v['localCorto']?></td><td>-</td>
                    <td align="left" class="boldfont"><?php echo $v['visitanteCorto']?></td>
                   </tr>
                   <tr bgcolor="white"><td colspan="6" align="right"><?php echo $v['observaciones']?></td></tr>
                <?php } ?>
           </table>
       </div>
        <?php }
    }?>

</div>

	