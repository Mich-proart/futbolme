<aside class="hidden-xs col-sm-3 col-md-3 text-center nopadding">
	<div class="col-xs-12 whitebox clear marconegro">
			
		<?php require_once 'includes/publicidad/derecha01.php'; ?>
        
		<?php
        if ('index.php' == substr($_SERVER['REQUEST_URI'], -9) || '/' == $_SERVER['REQUEST_URI']) {
        ?><br/>
        <a style="color:white; background-color:black; font-size:13px; padding:4px; margin-top:2px;"
           class="badge boldfont" href="https://www.recambioscoche.es/">www.Recambioscoche.ES</a>
	        
	        <?php

            /*<div class="marco text-center">
                Análisis de todas las <a href="http://legal-bets.es/casas-de-apuestas/" target="_blank">casas de apuestas en España</a> en Legalbet.
        </div>*/



	    } ?><br />


        

        
       
		<?php 
		        
        if (isset($pagina) && $pagina=="temporada" && $temporada_id!=442 && $temporada_id!=2561 && $temporada_id<1000000){
         require_once 'srcRecursos/pesEquipos.php';
        }

        if (isset($pagina) && $pagina=="equipo"){
          include 'includes/pagEquipo/historialEquipo.php';
        } ?>

    <div class="col-xs-6 marco">
    <iframe style="width:120px;height:240px;" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="https://rcm-eu.amazon-adsystem.com/e/cm?ref=tf_til&t=futbolme-21&m=amazon&o=30&p=8&l=as1&IS2=1&asins=B07S8X6SF6&linkId=238c67ec02d8c441525a5e6c1cd689dc&bc1=000000&lt1=_top&fc1=333333&lc1=0066c0&bg1=ffffff&f=ifr">
    </iframe>
    </div>
    <div class="col-xs-6 marco">
        <iframe style="width:120px;height:240px;" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="https://rcm-eu.amazon-adsystem.com/e/cm?ref=tf_til&t=futbolme-21&m=amazon&o=30&p=8&l=as1&IS2=1&asins=8415242905&linkId=07592a9677c4b80edf17f236f08883d2&bc1=000000&lt1=_top&fc1=333333&lc1=0066c0&bg1=ffffff&f=ifr">
    </iframe>
       
    </div>
     

     <a target="_blank" href="https://www.amazon.es/gp/search/ref=as_li_qf_sp_sr_tl?ie=UTF8&tag=futbolme-21&keywords=equipaciones de futbol&index=aps&camp=3638&creative=24630&linkCode=ur2&linkId=819535e784393ef5b6ecc92378fcf5f2">Equipaciones de fútbol</a><img src="//ir-es.amazon-adsystem.com/e/ir?t=futbolme-21&l=ur2&o=30&camp=3638" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />

     <br />

     <a target="_blank" href="https://www.amazon.es/gp/search/ref=as_li_qf_sp_sr_tl?ie=UTF8&tag=futbolme-21&keywords=libros de futbol&index=aps&camp=3638&creative=24630&linkCode=ur2&linkId=464650a4ab2d46a5044a2a6f3b720490">Libros de fútbol</a><img src="//ir-es.amazon-adsystem.com/e/ir?t=futbolme-21&l=ur2&o=30&camp=3638" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />

     <br />

     <a target="_blank" href="https://www.amazon.es/gp/search/ref=as_li_qf_sp_sr_tl?ie=UTF8&tag=futbolme-21&keywords=futbol&index=aps&camp=3638&creative=24630&linkCode=ur2&linkId=7a1ca208fd6dd798db61bd42897b8fe1">Más productos Amazon...</a><img src="//ir-es.amazon-adsystem.com/e/ir?t=futbolme-21&l=ur2&o=30&camp=3638" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />

		<div class="col-xs-12 marco" style="font-size:18px; font-weight: bold; background-color: gainsboro;">Síguenos:
		   
		    <a href="https://twitter.com/futbolme1" title="twitter" target="_blank"><img src="/img/partners/twitter.PNG" alt="twitter"></a>

		
		  
		</div> 

		<div class="col-xs-12 marco text-center" style="margin-top:10px; font-size:18px; font-weight: bold; background-color: gainsboro;">
		<img src="/apple-touch-icon-precomposed.png" alt="logo" style="float:left">
		<a href="https://play.google.com/store/apps/details?id=com.futbolme.futbolme">
		Descargate nuestra APP en Google Play</a>


		</div>
<hr />

	<?php 
	/*if($pagina=='index'){
    $f = './json/temporada/2/tipo.json';
    $json = file_get_contents($f);
    $datos = json_decode($json, true);
    $equipos=$datos['equipos'];
    $equiposTw = array();
    foreach ($equipos as $kk => $value) {   
        $equiposTw[$kk]['id'] = $value['equipo_id'];
        $equiposTw[$kk]['equipo'] = $value['nombreCorto'];
        $equiposTw[$kk]['idPais'] = $value['pais_id'];
        $equiposTw[$kk]['twitter'] = $value['slug'];
        $equiposTw[$kk]['club_id'] = $value['club_id']??NULL;
    }
    $filtro=0;
    $titol='Segunda';
    include 'srcRecursos/pesLeerTwitsPortada.php'; //incluye derecha02
    
    unset($datos);
    unset($equipos);
    unset($equiposTw); 
	}*/?>
	
		
		
	</div>
</aside>
