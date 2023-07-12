<div class="panel panel-default">
	
<div class="col-xs-6 txt11 whitebox">
<h4>Campeones</h4>
	<?php
if (isset($equipos['campeones'])) {
    foreach ($equipos['campeones'] as $equipo) {
        if (339 == $equipo['equipoCampeon_id'] && 1 == $division) {
            $equipo['veces'] = ($equipo['veces'] - 1);
        }
        if (421 == $equipo['equipoCampeon_id'] && 1 == $division) {
            $equipo['veces'] = ($equipo['veces'] - 1);
        }
        $enlace2 = '/historico-liga/titulos/'.poner_guion($txtDivision).'/'.poner_guion($equipo['campeon']).'/'.$equipo['equipoCampeon_id'].'/'.$division;

        $rutaEscudo = '/img/equipos/escudo'.$equipo['equipoCampeon_id'].'.png';
        if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaEscudo))) {
            $rutaEscudo = '/img/jugadores/NI.png';
        }

        echo '<div class="col-xs-12 marco" style="float:left;"><div style="float:left; width:20%"><img src="'.$rutaEscudo.'" alt="escudo"  style="width:36px; height:40px">';
        echo '</div><div style="float:right; width:79%">'.$equipo['campeon']."<br /><i>
		<a href='".$enlace2."'>".$equipo['veces'].' ocasiones</a></i></div></div>';
    }
}
    ?>
</div>
<div class="col-xs-6 txt11 whitebox">
<h4>Subcampeones</h4>
	<?php
if (isset($equipos['subcampeones'])) {
        foreach ($equipos['subcampeones'] as $equipo) {
            $enlace2 = '/historico-liga/titulos/'.poner_guion($txtDivision).'/'.poner_guion($equipo['subcampeon']).'/'.$equipo['equipoSubcampeon_id'].'/'.$division;

            $rutaEscudo = '/img/equipos/escudo'.$equipo['equipoSubcampeon_id'].'.png';
            if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaEscudo))) {
                $rutaEscudo = '/img/jugadores/NI.png';
            }

            echo '<div class="col-xs-12 marco" style="float:left;"><div style="float:left; width:20%"><img src="'.$rutaEscudo.'" alt="escudo"  style="width:36px; height:40px">';
            echo '</div><div style="float:right; width:79%">'.$equipo['subcampeon']."<br /><i>
		<a href='".$enlace2."'>".$equipo['veces'].' ocasiones</a></i></div></div>';
        }
    }
    ?>
</div>
	
</div>	