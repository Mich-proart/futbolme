<?php
$idCombinacion = round($jornadas / 2).(round($jornadas / 2) + 1);

//$idCombinacion = ($jornadas % 2 == 0) ? ($jornadas-1).$jornadas : $jornadas.($jornadas+1);
$path = 'includes/crearCalendario/combinacion.json';

$json = file_get_contents($path);
$combinaciones = json_decode($json, true);
$combinacion = $combinaciones[$idCombinacion];
$equipos=$equiposTorneo;

?>

<div style="width:400px;float:left" id="seleccionables" data-temporada="<?php echo $temporada_id?>" class="text-center"> 
  <span onclick="refrescarTemporada(<?php echo $temporada_id?>)" style="cursor:pointer" class="boldfont" style="font-size: 30px">Refrescar al terminar</span>
    <?php for ($i = 1; $i <= $jornadas; ++$i) { ?>
    <div class="text-center">
        <h3>Jornada <?php echo $i; ?></h3>
        <table class="table text-center">
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>Equipo Local</th>
                    <th>Equipo Visitante</th>
                    <th>Nº</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($combinacion[$i] as $partido) { ?>
                    <?php if (1 == $i) { ?>
                <tr>
                    <td><?php echo $partido['casa']; ?></td>
                    <td>
                        <select style="width: 100%;" class="equipo-seleccionable" data-posicion="<?php echo $partido['casa']; ?>">
                            <option value=""></option>
                            <?php foreach ($equipos as $equipo) { ?>
                            <option value="<?php echo $equipo['equipo_id']; ?>"><?php echo $equipo['nombre']; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                        <select style="width: 100%;" data-posicion="<?php echo $partido['fuera']; ?>" class="equipo-seleccionable">
                            <option value=""></option>
                            <?php foreach ($equipos as $equipo) {?>
                            <option value="<?php echo $equipo['equipo_id']; ?>"><?php echo $equipo['nombre']; ?></option>
                            <?php  } ?>
                        </select>
                    </td>
                    <td><?php echo $partido['fuera']; ?></td>
                </tr>
                    <?php  } else { ?>
                <tr>
                    <td><?php echo $partido['casa']; ?></td>
                    <td class="<?php echo 'equipo-'.$partido['casa']; ?>"><?php echo 'equipo '.$partido['casa']; ?></td>
                    <td class="<?php echo 'equipo-'.$partido['fuera']; ?>"><?php echo 'equipo '.$partido['fuera']; ?></td>
                    <td><?php echo $partido['fuera']; ?></td>
                </tr>
                    <?php } ?>                
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php
} ?>
</div>