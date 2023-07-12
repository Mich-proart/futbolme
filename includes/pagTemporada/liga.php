<div class="col-xs-12 whitebox nopadding txt11">
     <div class="col-xs-12 marco text-center txt11">


        <p><?php 
        echo $textoLiga;?></p>
        <?php if ($themoneytizer===1){ ?>
        <div id="13939-2" style="height: 255px !important">
            <script src="//ads.themoneytizer.com/s/gen.js?type=2"></script>
            <script src="//ads.themoneytizer.com/s/requestform.js?siteId=13939&formatId=2" ></script>
        </div>
    <?php } ?>
    </div>
    <div class="clear"></div>
	<ul id="menuTorneo" class="nav nav-tabs nopadding celestebox" role="tablist" id="pestaTemporada">

		<?php 
        if ($partidosJornada>0) { ?>
        <li class="text-center boldfont <?php echo $pesJornada; ?>"><a href="<?php echo $pgTemporada; ?>&modelo=Jornada">Jornada</a></li>
               		<?php if ($division < 6 || 214 == $temporada_id || 7 == $visible) { ?>
            	    <li class="text-center boldfont <?php echo $pesGoleadores; ?>"><a href="<?php echo $pgTemporada; ?>&modelo=Goleadores">Goleadores</a></li>
            		    <?php if ($temporada_id < 25 || 214 == $temporada_id) { ?>
            		    
            		    <?php if ($temporada_id < 7) { ?>
            		    <li class="text-center boldfont <?php echo $pesLimpio; ?> hide"><a href="<?php echo $pgTemporada; ?>?modelo=Limpio">Juego Limpio</a></li>
            		    <?php } ?>
            		    		    		    
            	       <?php }
                    } ?>
	    <li class="text-center boldfont <?php echo $pesCalendario; ?>"><a href="<?php echo $pgTemporada; ?>&modelo=Calendario">Calendario</a></li>
        <?php } ?>
		<li class="visible-xs text-center boldfont <?php echo $pesEquipos; ?>"><a href="<?php echo $pgTemporada; ?>&modelo=Equipos">Equipos</a></li>
        
        <li class="text-center boldfont <?php echo $pesNoticias; ?>"><a href="<?php echo $pgTemporada; ?>&modelo=Noticias">Noticias</a></li>
        <?php 
        if (($division<6 || 214 == $temporada_id) && count($fichajes)>0) { ?>
        <li class="text-center boldfont <?php echo $pesFichajes; ?>"><a href="<?php echo $pgTemporada; ?>&modelo=Fichajes">Fichajes</a></li>
        <?php } ?>
        
        <?php if ($visible<100) { ?>
            <?php if ($temporada_id !=158 && $temporada_id < 3) {?>
            <li class="text-center boldfont">
                <a href="/historico/2019-20/index.php?modo=t&id=<?php echo $temporada_id?>">2019-20</a>
            </li>		    
    	    <?php } ?>
    	    
    	    <li class="text-center boldfont"><a href="/ascensosydescensos.php?pest=<?php echo $pest_ascenso; ?>">Ascensos y descensos</a></li>

            <li class="text-center boldfont hide <?php echo $pesHistorico; ?>"><a href="<?php echo $pgTemporada; ?>?modelo=Historico">Histórico</a></li> 
        

		<li class="text-center boldfont"><a href="/golaverage.php?id=<?php echo $temporada_id; ?>">Calcular Golaverage</a></li>

        <?php } ?>
        
            
        
	</ul>


	<?php 
$equiposTw2=$equiposTw??array();

if ($visible>99){    
    //imp($paraFed);
    $comunidad_id=($paraFed['co']-1);
    include 'panelBack/federacion/funciones/urlFederaciones.php';
    if($comunidad_id==5){ 
        $nombreFed=poner_guion($traduccion);$nombreFed=str_replace('.', '', $nombreFed); ?>   
        <table class="table">
            <tr bgcolor="gainsboro"><td colspan="3" class="boldfont text-center">Desde futbolme.com te ofrecemos los accesos más rápidos<br /> a la Federación Catalana de Fútbol</td>
            <tr>
        <td width="33%" class="text-center"><a href="<?php echo $url.$nombreFed?>" target="_blank" rel="nofollow">Torneo</a></td>
        <td width="33%" class="text-center"><a href="<?php echo $urlClasi.$nombreFed?>" target="_blank" rel="nofollow">Clasificación</a></td>
        <td width="33%" class="text-center"><a href="<?php echo $urlCalendario.$nombreFed?>" target="_blank" rel="nofollow">Calendario</a></td>
            </tr>
        </table>
        
    <?php }

    if($comunidad_id==3 || $comunidad_id==14){ 
        
        $urlWebJor=str_replace('yyy', 'NFG_CmpJornada', $urlWeb);
        $urlWebCal=str_replace('yyy', 'NFG_VisCalendario_Vis', $urlWeb);
        $urlWebCla=str_replace('yyy', 'NFG_VisClasificacion', $urlWeb);
        
        $variables='&CodCompeticion='.$paraFed['c'].'&CodGrupo='.$paraFed['g'];
        $variablesMin='&codcompeticion='.$paraFed['c'].'&codgrupo='.$paraFed['g'];

        $urlWebJor=str_replace('xxx', $variables, $urlWebJor);
        $urlWebCal=str_replace('xxx', $variablesMin, $urlWebCal);
        $urlWebCla=str_replace('xxx', $variablesMin, $urlWebCla);
        

        if ($comunidad_id==3){ $nombreFed='Federación Cantabra de Fútbol'; } 
        if ($comunidad_id==14){ $nombreFed='Federación Extremeña de Fútbol'; } 


        ?>   
        <table class="table">
            <tr bgcolor="gainsboro"><td colspan="3" class="boldfont text-center">Desde futbolme.com te ofrecemos los accesos más rápidos<br /> a la <?php echo $nombreFed?></td>
            <tr>
        <td width="33%" class="text-center"><a href="<?php echo $urlWebJor?>" target="_blank" rel="nofollow">Torneo</a></td>
        <td width="33%" class="text-center"><a href="<?php echo $urlWebCla?>" target="_blank" rel="nofollow">Clasificación</a></td>
        <td width="33%" class="text-center"><a href="<?php echo $urlWebCal?>" target="_blank" rel="nofollow">Calendario</a></td>
            </tr>
        </table>
        
    <?php }

    if($comunidad_id==2 || $comunidad_id==6 || $comunidad_id==8 || $comunidad_id==15){ 

        $variables='&id_competicion='.$paraFed['c'].'&id_fase='.$paraFed['fase'].'&id_grupo='.$paraFed['g'].'';
        $urlWebJor=str_replace('xxx', $variables, $urlWebJor);

        ?>
        <table class="table">
            <tr bgcolor="gainsboro"><td colspan="3" class="boldfont text-center"><a href="<?php echo $urlWebJor?>"target="_blank" rel="nofollow">Resultados y clasificación</a></td>            
            </tr>
        </table>
    <?php }

}


    switch ($modelo) {        

        case 'Fichajes':
            require_once 'srcRecursos/pesFichajes.php';
        break;

         
        
        case 'Jornada':

            require_once 'srcRecursos/pesJornada.php';
            /*if (isset($clasificacion['porJornada'])) {
                $porJornadas = $clasificacion['porJornada'];
                require_once 'includes/graficos/stadIsticas.php';
            }*/
            break;

        case 'Calendario':
        $partidos = $datos['partidos'];
             $j=0;
            foreach ($partidos as $key => $partido) { 

                if ($j!=$partido['jornada']){
                    echo '<div class="col-xs-12 cajanaranja"><h4 class="text-center"> Jornada '.$partido['jornada'].' - '.nombreDiaCompleto($partido['fecha']).' </h4></div>';
                }
                include __DIR__.'/../../includes/contenidoPartido.php';
                $j=$partido['jornada'];                
            }
            break;

        
        case 'Goleadores':
            require_once 'srcRecursos/pesGoleadores.php';
        break;

        case 'Equipos': //solo en el móvil
            require_once 'srcRecursos/pesEquipos.php';
        break;
        /*
        case 'Limpio':
            $tarjetasTor = XclasificacionTarjetas($temporada_id, 0);
            require_once 'srcRecursos/pesJuegoLimpio.php';
        break;
        case 'Calendario': ?>
			<div class="col-xs-12 whitebox">
				<?php $f = ''; $colorFondo = ''; $j = 0; $html = '';
                $goles = array();
                    foreach ($partidos as $key => $partido) {
                        if ('resto' === $key) {
                            continue;
                        }
                        if (5 == $key) {
                            require_once 'includes/publicidad/cuerpo04.php';
                        }
                        if ($j != $partido['jornada']) {
                            echo $html."<div class='cols-xs-12 text-center cajaverde'><h4><a class='boldfont' href='/temporada.php?id=".$temporada_id.'&jornada='.$partido['jornada']."'>Jornada ".$partido['jornada'].'</a></h4></div>';
                        }
                        if ($f != $partido['fecha']) {
                            if ('whitebox' == $colorFondo) {
                                $colorFondo = 'cajagrisclaro';
                            } else {
                                $colorFondo = 'whitebox';
                            } ?>
					<div class="col-xs-12 txt11 cajanaranja text-center"><?php echo utf8_encode(nombreDiaCompleto($partido['fecha'])); ?></div>
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
                            include 'srcRecursos/partidoR.php';
                        }
                        $f = $partido['fecha'];
                        $j = $partido['jornada'];
                    }
                echo $html; unset($html); ?>
			</div>
 		<?php break;
        case 'Twitter': ?>
			<div class="col-xs-12 marconegro">
            <?php  require_once 'includes/publicidad/cuerpo04.php'; ?>
            </div> 
			<?php  require_once 'srcRecursos/vistoentwitterR.php';
        break;
        case 'Fidelidad': ?>
			<div class="col-xs-12 marconegro">
            <?php  require_once 'includes/publicidad/cuerpo04.php'; ?>
            </div>
			<div class="col-xs-12"><a class="pull-right" href="/programa-fidelidad">Programa FIDELIDAD</a></div>
			<h4 class='text-center boldfont'>Top 20 </h4>
			<?php  require_once 'srcRecursos/pesApuestaTorneo.php';
        break;
        */
    }
    
    
    
    if (isset($equiposTw2)) {
        shuffle($equiposTw2);
        if ($_SERVER['HTTP_HOST']=='fm20x'){
          echo '<h3>sin twitter</h3>'; 
        } else {
            $cachetime = 86400; //86400 un dia.
            $filtro=0;
            foreach ($equiposTw2 as $key => $value) {
                
                if (isset($value['twitter']) && strlen($value['twitter']) > 2 && $value['id']>0) {
                    if (!isset($value['twitter'])) { $value['twitter']=0; }        
                    if (!isset($value['idPais'])) { $value['idPais'] = 60;}
                    $seleccion=$value['seleccion']??0; 
                    if ($seleccion==0){
                        $escudo=rutaEscudo($value['club_id'],$value['id']);                
                    } else {
                        $escudo='/img/paises/banderas/ban'.$value['idPais'].'.png';
                    }             
                    $t=capturaTwit($value['id'], $value['twitter'], $cachetime);
                    if (count($t) > 1) {
                        include 'srcRecursos/pesLeerTwits2.php'; //incluye derecha02
                    } 
                }
            }
            
        }
        unset($equiposTw);unset($equiposTw2);
    } //isset equiposTw

    

    ?>

</div>
