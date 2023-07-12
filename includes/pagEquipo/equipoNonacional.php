<div class="col-xs-12 whitebox">
	<div class="row h25"></div>
	<div class="col-xs-4 text-center">		
		<img src="/img/equipos/escudo<?php echo $equipo_id; ?>.png" class="img-rounded" alt="escudo">
	</div>
	<div class="col-xs-8 text-center">						
		<h3><?php echo $equipotxt; ?></h3>
		<h5><?php echo $categoriatxt; ?></h5>
			
	</div>

<div class="clear"></div>
</div>
<?php 

$fecha = new \DateTime();
$hoy = $fecha->format('Y-m-d');

$ePartidos = XequipoPartidos($equipo_id);
unset($torneos);
if (isset($ePartidos)) {
    foreach ($ePartidos['partidos'] as $key => $value) {
        $fecha = date_create($value['fecha']);

        $torneos[$value['temporada_id']]['tipo_torneo'] = $value['tipo_torneo'];
        $torneos[$value['temporada_id']]['nombreTorneo'] = $value['nombreTorneo'];

        $porTorneos[$value['temporada_id']][] = $value;
    }

    if (isset($torneos)) {
        foreach ($torneos as $key => $value) {
            if (1 == $value['tipo_torneo']) {
                continue;
            }
            $value['nombreTorneo'] = preg_replace('/CAMPEONATO/D', 'CTO.', $value['nombreTorneo']); ?>

			<hr /><a href='/resultados-directo/torneo/<?php echo poner_guion($value['nombreTorneo']).'/'.$key.'/'; ?>'><h4><?php echo $value['nombreTorneo']; ?></h4></a>

			<?php foreach ($porTorneos[$key] as $k => $partido) {
                ?>
			<?php include 'srcRecursos/partidoR.php'; ?>	
			<?php
            } ?>
		<?php
        }
    }
} ?>