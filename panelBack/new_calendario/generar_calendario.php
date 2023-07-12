<?php
define('_FUTBOLME_', 1);
require_once '../../src/consultas.php';
require_once 'consultasNC.php';

$temporada = $_POST['temporada'];
$jornadas = $_POST['jornadas'];
$tipo_torneo = $_POST['tipo_torneo'];
$categoria_torneo = $_POST['categoria_torneo'];

$sql = 'UPDATE liga SET jornadas='.$jornadas.',jornadaActiva=1 WHERE id=(select torneo_id from temporada where id='.$temporada.')';
$mysqli = conectar();
$resultadoSQL = mysqli_query($mysqli, $sql);

$idCombinacion = round($jornadas / 2).(round($jornadas / 2) + 1);

//$idCombinacion = ($jornadas % 2 == 0) ? ($jornadas-1).$jornadas : $jornadas.($jornadas+1);
$path = 'combinacion.json';

$json = file_get_contents($path);
$combinaciones = json_decode($json, true);
$combinacion = $combinaciones[$idCombinacion];

$equipos = Xequipos_temporada($temporada);

if (0 == contarPartidosLiga($temporada)) {
    for ($i = 1; $i <= $jornadas; ++$i) {
        foreach ($combinacion[$i] as $partido) {
            crearPartidoVacioLiga($temporada, $i, $partido['casa'], $partido['fuera']);
        }
    }
}

$partidos = obtenerPartidosLiga($temporada);
?>

<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>


<div style="width:100%;float:left"> 
    <?php for ($i = 1; $i <= $jornadas; ++$i) {
    ?>
    <div style="width: 100%;">
        <h3>Jornada <?php echo $i; ?></h3>
        <table>
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>Equipo Local</th>
                    <th>Equipo Visitante</th>
                    <th>Nº</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($combinacion[$i] as $partido) {
        ?>
                    <?php if (1 == $i) {
            ?>
                <tr>
                    <td><?php echo $partido['casa']; ?></td>
                    <td>
                        <select style="width: 100%;" class="equipo-seleccionable" data-posicion="<?php echo $partido['casa']; ?>">
                            <option value=""></option>
                            <?php foreach ($equipos as $equipo) {
                ?>
                            <option value="<?php echo $equipo['equipo_id']; ?>"><?php echo $equipo['nombre']; ?></option>
                            <?php
            } ?>
                        </select>
                    </td>
                    <td>
                        <select style="width: 100%;" data-posicion="<?php echo $partido['fuera']; ?>" class="equipo-seleccionable">
                            <option value=""></option>
                            <?php foreach ($equipos as $equipo) {
                ?>
                            <option value="<?php echo $equipo['equipo_id']; ?>"><?php echo $equipo['nombre']; ?></option>
                            <?php
            } ?>
                        </select>
                    </td>
                    <td><?php echo $partido['fuera']; ?></td>
                </tr>
                    <?php
        } else {
            ?>
                <tr>
                    <td><?php echo $partido['casa']; ?></td>
                    <td class="<?php echo 'equipo-'.$partido['casa']; ?>"><?php echo 'equipo '.$partido['casa']; ?></td>
                    <td class="<?php echo 'equipo-'.$partido['fuera']; ?>"><?php echo 'equipo '.$partido['fuera']; ?></td>
                    <td><?php echo $partido['fuera']; ?></td>
                </tr>
                    <?php
        } ?>                
                <?php
    } ?>
            </tbody>
        </table>
        <?php if (1 == $i) {
        ?>
        <div style="width:100%; text-align:right">
        <form method="GET" action="crearCalendario.php">
        <input type="hidden" name="tipo_torneo" value="<?php echo $tipo_torneo; ?>">
        <input type="hidden" name="categoria_torneo" value="<?php echo $categoria_torneo; ?>">
        <input type="hidden" name="temporada_id" value="<?php echo $temporada; ?>">
        <input type="submit" name="validar" value="validar">
        </form>
        </div>
        <?php
    } ?> 
    </div>
    <?php
} ?>
</div>
    <script>
    $('.equipo-seleccionable').on('change', function(){
        var equipoId = $(this).val();
        var equipoNombre = $(this).children('option:selected').html();
        console.log('equipo: ' + equipoNombre + ' ' + equipoId);
        var posicion = $(this).attr('data-posicion');
        console.log('posicion '+posicion);        
        $('.equipo-' + posicion).html(equipoNombre);
        $('.equipo-' + posicion).attr('data-id', equipoId);
        if (equipoId == '') {
            $('option').show();
        } else {
            $('option[value="' + equipoId + '"]').not('.equipo-seleccionable[data-posicion="' + posicion + '"] option[value="' + equipoId + '"]').hide();
        };
        $.ajax({
            type: 'POST',
            url: 'new_calendario/actualizarCalendarioTemporada.php',
            data: 'temporada=<?php echo $temporada; ?>&combinacion=' + posicion + '&equipoId=' + equipoId,
            success: function(data){
              console.log(data); 
            },
            error: function(){

            }
        });
        
    });
    </script>
</body>
</html>