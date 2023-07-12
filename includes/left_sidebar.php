
<aside style="min-height:700px;" class="hidden-xs hidden-sm col-md-3 text-center nopadding">
	<div class="col-xs-12 marconegro whitebox text-center">
		<div class="col-xs-12 whitebox clear nopadding text-center">
		
		<?php require_once __DIR__.'/publicidad/izquierda01.php'; ?>
		

		
			<?php
        if ('index.php' == substr($_SERVER['REQUEST_URI'], -9) || '/' == $_SERVER['REQUEST_URI']) { ?>
               <br /><a style="color:white; background-color:black; font-size:13px; padding:4px; margin-top:2px;"
               class="badge boldfont" href="https://www.autodoc.es/services/mobile-app/">www.AutoDoc.es</a>
        <?php } ?>

        
    <?php 
    /*$f = './json/temporada/1/tipo.json';
    $json = file_get_contents($f);
    $datos = json_decode($json, true);
    $equipos2=$datos['equipos'];
    $equiposTw = array();
    foreach ($equipos2 as $kk => $value) {   
        $equiposTw[$kk]['id'] = $value['equipo_id'];
        $equiposTw[$kk]['equipo'] = $value['nombreCorto'];
        $equiposTw[$kk]['idPais'] = $value['pais_id'];
        $equiposTw[$kk]['twitter'] = $value['slug'];
        $equiposTw[$kk]['club_id'] = $value['club_id']??NULL;
    }
    $filtro=0;
    $titol='Primera';
    include 'srcRecursos/pesLeerTwitsPortada.php'; //incluye derecha02
    
    unset($datos);
    unset($equipos2);
    unset($equiposTw); */?>


<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- 2016_automatic -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2316935358389492"
     data-ad-slot="1049673364"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>

		</div>	

		
		<div id="ultimosEventos" class="hide">
		<?php require_once $raiz.'ultimosEventos.php'; ?>
		<div class="clear"></div>
		</div>



	</div>		
		
</aside>