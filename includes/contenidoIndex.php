<?php require_once 'includes/publicidad/cuerpo01.php';?>

<div id="bloque-resto">		
<?php 
$temp_id = 0;
$contador = 0; $equiposTw = array();


foreach ($partidosDia as $kk => $partido) {

    //imp($partido);

    $contador++;
    
    
    $colorFondo = 'whitebox';
    //colorear españoles
    if ((60 != $partido['idPais'] && 200 != $partido['idPais']) || 'España' == $partido['local']) {
        $colorL = 'background-color:#F4FA58';
    } else {
        $colorL = 'background-color:white';
    }
    if ((60 != $partido['idPais'] && 200 != $partido['idPais']) || 'España' == $partido['visitante']) {
        $colorV = 'background-color:#F4FA58';
    } else {
        $colorV = 'background-color:white';
    }
    $hora_prevista = $partido['hora_prevista'];
    $colorFila = 'white';

    if ($partido['temporada_id'] != $temp_id) {        
        $fondoCabecera = 'greenbox';
        $colorCabecera = 'black';
        include './includes/contenidoCabecera.php';
    }

    //si cambia el id de temporada se hace una cabecera?>

		<div style="clear:both"></div>
		<div>
		<?php include './includes/contenidoPartido.php'; ?>	
		</div>
		<?php 


        if (3 == $contador || 5 == $contador) { 

        if ($themoneytizer===1){?>        
            <?php if ($contador==3){ ?>        
                <div id="themoney-11" class="text-center"></div>
            <?php } else { ?>
                <div id="13939-19" class="text-center"><script src="//ads.themoneytizer.com/s/gen.js?type=19"></script><script src="//ads.themoneytizer.com/s/requestform.js?siteId=13939&formatId=19" ></script></div>
            <?php } ?>
        <?php } 
        
        }
    
        if ($kk<20){
        $equiposTw[$kk]['id'] = $partido['equipoLocal_id'];
        $equiposTw[$kk]['equipo'] = $partido['localCorto'];
        $equiposTw[$kk]['idPais'] = $partido['pais_local'];
        $equiposTw[$kk]['twitter'] = $partido['twLocal'];
        $equiposTw[$kk]['club_id'] = $partido['club_local'];
        $equiposTw[$kk + 1000]['id'] = $partido['equipoVisitante_id'];
        $equiposTw[$kk + 1000]['equipo'] = $partido['visitanteCorto'];
        $equiposTw[$kk + 1000]['idPais'] = $partido['idPais'];
        $equiposTw[$kk + 1000]['twitter'] = $partido['twVisitante'];
        $equiposTw[$kk + 1000]['club_id'] = $partido['club_visitante'];
        }

        $temp_id = $partido['temporada_id'];



} ?>
</div>	
