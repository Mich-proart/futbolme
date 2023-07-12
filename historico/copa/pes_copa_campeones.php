<div class="panel panel-default">
	<div class="panel-heading">			
		
		<div class="panel-body">
			<div class="nopadding col-xs-12 col-md-12 col-lg-12">
				<div class="nopadding col-xs-6 col-md-6 col-lg-6">
				<h3 class="panel-title">Campeones</h3>
					<?php
                    foreach ($equipos['campeones'] as $equipo) {
                        //$enlace="?m=c&equipo_id=".$equipo['equipoCampeon_id']."&equipo_nombre=".$equipo['campeon'];
                        $enlace2 = '/historico-copa-campeon/'.poner_guion($equipo['campeon']).'/'.$equipo['equipoCampeon_id'];

                        $rutaEscudo = '/img/equipos/escudo'.$equipo['equipoCampeon_id'].'.png';
                        if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaEscudo))) {
                            $rutaEscudo = '/img/jugadores/NI.png';
                        }

                        echo '<div class="panel-body" style="font-size:16px; float:left;; width:100%"><div style="float:left; width:20%"><img src="'.$rutaEscudo.'" alt="escudo"  style="width:36px; height:40px">';
                        echo '</div><div style="float:right; width:79%">'.$equipo['campeon']."<br /><i>
						<a href='".$enlace2."'>".$equipo['veces'].' ocasiones</a></i></div></div>';
                    }
                    ?>
				</div>
				<div class="nopadding col-xs-6 col-md-6 col-lg-6">
				<h3 class="panel-title">Subcampeones</h3>
					<?php
                    foreach ($equipos['subcampeones'] as $equipo) {
                        $enlace2 = '/historico-copa-subcampeon/'.poner_guion($equipo['subcampeon']).'/'.$equipo['equipoSubcampeon_id'];

                        $rutaEscudo = '/img/equipos/escudo'.$equipo['equipoSubcampeon_id'].'.png';
                        if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaEscudo))) {
                            $rutaEscudo = '/img/jugadores/NI.png';
                        }

                        echo '<div class="panel-body" style="font-size:16px; float:left;; width:100%"><div style="float:left; width:20%"><img src="'.$rutaEscudo.'" alt="escudo"  style="width:36px; height:40px">';
                        echo '</div><div style="float:right; width:79%">'.$equipo['subcampeon']."<br /><i>
						<a href='".$enlace2."'>".$equipo['veces'].' ocasiones</a></i></div></div>';
                    }
                    ?>
				</div>
			</div>
		</div>									
	</div>								
</div>