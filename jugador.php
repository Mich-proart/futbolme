<?php 
define('_FUTBOLME_', 1);
require_once 'src/config.php';

if (isset($_GET['id'])) {
    $jugador_id = $_GET['id'];
    if (!is_numeric($jugador_id)) {
        header('Location:/');
        die;
    }
} else {
    header('Location:/');
    die;
}


$jugador = Xjugador($jugador_id);

$posicionTxt = '';
switch ($jugador['posicion']) {
    case '0':$posicionTxt = 'Sin demarcación'; break;
    case '1':$posicionTxt = 'Portero'; break;
    case '2':$posicionTxt = 'Defensa'; break;
    case '3':$posicionTxt = 'Centrocampista'; break;
    case '4':$posicionTxt = 'Delantero'; break;
    case '5':$posicionTxt = 'Entrenador'; break;
}

$golesPartido = array(); $tarjetas = array();
if ($jugador['posicion'] < 5) {
    $golesPartido = XjugadorGolesPartido($jugador_id);
    $tarjetas = XjugadorTarjetasPartido($jugador_id);
}

$pgJugador = '/resultados-directo/jugador/'.poner_guion($jugador['nombre']).'/'.$jugador_id;

$titulo = $jugador['nombre'].' ';
$metaDescripcion = $titulo;
?>
<?php require_once 'includes/head.php'; ?>
	<title><?php echo $titulo.' - '.$jugador['equipoActual']; ?></title>

</head>
<?php require_once 'includes/contenedorSup.php'; ?>
<div class="col-xs-12 whitebox">
	<ul class="nav nav-tabs nopadding celestebox" role="tablist" id="pestaTemporada">		
	    <li class="text-center boldfont" style="color:white; padding:5px">
	    <?php echo $jugador['apodo']; ?>
	    </li>
	</ul>

			<div class="row nomargin">
	            <div class="col-xs-6 col-md-8 col-lg-8">
	                <h1 class="nombrejugadorficha"><?php echo $jugador['nombre']; ?></h1>
	            </div>
	            <div class="col-xs-6 col-md-4 col-lg-4">
	                <div class="col-lg-12"><p class="pull-right">Equipo Actual</p></div>
	                <div class="col-lg-12">
	                <?php
                    $enlace_equipo = '/resultados-directo/equipo/'.poner_guion($jugador['equipoActual']).'/'.$jugador['equipoActual_id'];
                        ?>
	                    <a class="pull-right" href="<?php echo $enlace_equipo; ?>">
                        <?php echo $jugador['equipoActual']; ?>
	                    </a>
	                </div>
	            </div>
	        </div>
	
		<?php 

            $rutaJugador = '/img/jugadores/jugador'.$jugador['id'].'.jpg';

            if (!@file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaJugador))) {
                $rutaJugador = '/img/jugadores/NI.png';
            }?>
				
		        <div class="row nomargin">
		            <div class="col-xs-5 col-md-3 col-lg-3">
		                <img width="100%" src="<?php echo $rutaJugador; ?>" alt=" <?php echo $jugador['nombre']; ?>">
		            </div>
		            <div class="col-xs-9 col-md-9 col-lg-9">
		                <div class="row">&nbsp</div>
		                <div class="row col-xs-12">
		                    <p><span class="boldfont">Nombre:</span> <?php echo $jugador['nombre']; ?></p>
		                </div>
		                <div class="row col-xs-12">
		                    <p><span class="boldfont">Apodo:</span> <?php echo $jugador['apodo']; ?></p>
		                </div>
		                <div class="row col-xs-12">
		                    <p><span class="boldfont">Nacimiento:</span> <?php 
                            if ('1900-01-01' != $jugador['fecha_nacimiento']) {
                                echo $jugador['fecha_nacimiento'];
                            }
                             ?></p>
		                </div>
		                <div class="row col-xs-12">
		                    <p><span class="boldfont">Lugar de nacimiento:</span> <?php echo $jugador['lugar_nacimiento']; ?></p>
		                </div>
		                <div class="row col-xs-12">
		                    <p><span class="boldfont">Peso:</span> <?php 
                            if ('0' != $jugador['peso']) {
                                echo $jugador['peso'];
                            }?></p>
		                </div>
		                <div class="row col-xs-12">
		                    <p><span class="boldfont">Altura:</span> <?php 
                            if ('0' != $jugador['altura']) {
                                echo $jugador['altura'];
                            }
                            ?> </p>
		                </div>
		            </div>

		            <div class="row">
		                <div class="col-xs-12">
		                    <p class="col-xs-12 text-left boldfont">
							<?php echo $posicionTxt; ?>
							<span class="pull-right"><?php 
                            $fmJugador = $jugador_id;
                            $fmJugador2 = 1;
                            $fila['jugador'] = $jugador['apodo'];
                            //include('includes/futbolmaniaJugador.php');?></span>
		                    </p>
		                </div>
		            </div>
		            
		        </div>
		        <div class="col-xs-12 marconegro clear">
			        <?php require_once 'includes/publicidad/cuerpo04.php'; ?>
			    </div>
		        <div class="col-xs-12">
						<div class="row">
		                    <h3 class="col-xs-12 col-md-12 col-lg-12 boldfont">Palmarés</h3>
		                </div>
		                <div class="row">
		                    <p class="col-xs-12 col-md-12 col-lg-12"><?php echo nl2br($jugador['palmares']); ?></p>
		                </div>
		                <div class="row horizontaldivider">
		                    <h3 class="col-xs-12 col-md-12 col-lg-12 boldfont">Características</h3>
		                </div>
		                <div class="row">
		                    <p class="col-xs-12 col-md-12 col-lg-12"><?php echo nl2br($jugador['caracteristicas']); ?></p>
		                </div>
		            </div>

<?php if (count($tarjetas)>0) { ?>
<table class='table table-bordered table-condensed whitebox nomargin'>
	<tr class='darkgreenbox'>
		<td class='text-center' style='width:20px'>Tarjetas</td>
	</tr>

	<?php 
		 foreach ($tarjetas as $key => $partido) { 
		 	$pgPartido = '/resultados-directo/partido/'.poner_guion($partido['local']).'-'.poner_guion(
        $partido['visitante']
    ).'/'.$partido['partido_id'];?>
			<tr><td><div class="col-xs-12 marco"><div class="col-xs-6">	

			<a href="<?php echo $pgPartido; ?>">
                <span class="glyphicon glyphicon-eye-open iconhover" style="cursor:pointer;
                border: 1px solid black; padding:3px;" title="Partido entre <?=$partido['local'];?> y <?=$partido['visitante'];?> "></span></a>

	 		<?php echo $partido['local']?>
	 		<b><?php echo $partido['goles_local']." - ".$partido['goles_visitante']?></b>
	 		 <?php echo $partido['visitante']?><br />
	 		 <a href="/temporada.php?id=<?php echo $partido['temporada_id']?>&jornada=<?php echo $partido['jornada']?>">Jornada <?php echo $partido['jornada']?></a>	 		
		 	</div>
		 	<div class="col-xs-6">
			
			<?php 
			$minuto=substr($partido['minuto'],-2);
			$parte=substr($partido['minuto'],0,1);
			if ($parte==1){ echo "1ª parte "; } else { echo "2ª parte "; }
			echo " - ".$minuto."'";
			
			if ($partido['tipo']==0) { ?>
			<span class='iconseparate'>
			<img src="/img/ta.png" height="17" style="margin-bottom:3px"></span>
			<?php }
			if ($partido['tipo']==1) {  ?>
			<span class='iconseparate'>
				<img src="/img/ta2.png" height="17" style="margin-bottom:3px"></span>
			<?php }
			if ($partido['tipo']==5) {  ?>
			<span class='iconseparate'>
				<img src="/img/tr.png" height="17" style="margin-bottom:3px"></span>
			<?php } 
			echo "</div></div></td></tr>";
			 } ?>
</table>
<?php } ?>	



<?php if (count($golesPartido)>0) { ?>
<table class='table table-bordered table-condensed whitebox nomargin'>
	<tr class='darkgreenbox'>		
		<td class='text-center' style='width:20px'>
			Goles        	
		</td>
	</tr>
	
		 
	 <?php foreach ($golesPartido as $key => $partido) { 
	 	$pgPartido = '/resultados-directo/partido/'.poner_guion($partido['local']).'-'.poner_guion(
        $partido['visitante']
    ).'/'.$partido['partido_id'];
    ?>
	 	<tr><td><div class="col-xs-12 marco"><div class="col-xs-6">
	 	<a href="<?php echo $pgPartido; ?>">
                <span class="glyphicon glyphicon-eye-open iconhover" style="cursor:pointer;
                border: 1px solid black; padding:3px;" title="Partido entre <?=$partido['local'];?> y <?=$partido['visitante'];?> "></span></a>
                		 		
	 		<?php echo $partido['local']?>
	 		<b><?php echo $partido['goles_local']." - ".$partido['goles_visitante']?></b>
	 		 <?php echo $partido['visitante']?><br />
	 		 <a href="/temporada.php?id=<?php echo $partido['temporada_id']?>&jornada=<?php echo $partido['jornada']?>">Jornada <?php echo $partido['jornada']?></a>
	 		
	 	</div>
	 	<div class="col-xs-6">
        <?php 
           $cadena = desglosarTexto($partido['observaciones']);	            
           $gl = explode("<br />", $cadena[1]);
           foreach ($gl as $vl) {
           		$pos = strpos($vl, trim($jugador['apodo']));
				if ($pos == true) { echo $vl."<br />"; } 
           } 
           $gl = explode("<br />", $cadena[2]);
           foreach ($gl as $vl) {
           		$pos = strpos($vl, trim($jugador['apodo']));
				if ($pos == true) { echo $vl."<br />"; } 
           } 

           ?>
        </div></div></td></tr>
	 <?php } ?>
</table>
<?php } ?>



			

</div>

 <?php require_once 'includes/contenedorInf.php'; ?>

		