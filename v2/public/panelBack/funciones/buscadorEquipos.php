<?php 
define('_PANEL_', 1);
require_once '../includes/config.php';

$equipo = $_POST['nombre'];
$categoria_id = $_POST['categoria_id'];
$pais_id = $_POST['pais_id'];
$comunidad_id = ($_POST['comunidad_id']+1);
$temporada_id = $_POST['temporada_id'];
$fase_id = $_POST['fase_id'];


    $sql = 'SELECT e.id, e.nombre, l.nombre localidad, p.nombre provincia, p.comunidad_id, co.nombre comunidad, c.es_seleccion, pa.nombre pais
    FROM equipo e
    INNER JOIN club c ON e.club_id=c.id
    INNER JOIN localidad l ON c.localidad_id=l.id
    INNER JOIN provincia p ON l.provincia_id=p.id
    INNER JOIN comunidad co ON p.comunidad_id=co.id
    INNER JOIN pais pa ON c.pais_id=pa.id
    WHERE e.categoria_id='.$categoria_id;
    if (strlen($equipo)>2){ $sql.=' AND e.nombre_completo LIKE "%'.$equipo.'%"'; }
    if (($pais_id > 1 && $pais_id<199) || $pais_id > 201) { $sql.=' AND pa.id='.$pais_id; }
    if ($comunidad_id > 1) { $sql.=' AND co.id='.$comunidad_id; }
    //echo $sql;

    $resultadoSQL = mysqli_query($mysqli, $sql);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
    
    
    ?>

<table class="table">
    <tr><td>ID</td>
          <td>disponibles</td>
          <td>localidad</td>
          <td>provincia</td>
          <td>Comunidad - Seleccion</td>
        </tr>
        <?php 
  $modelo=0;
    
    foreach ($resultado as $fila) {
        echo '<tr bgcolor="white">
          <td>'.$fila['id'].'</td>
          <td>'.$fila['nombre'].'</td>';
        if ($modelo < 1) {
            echo '<td>'.$fila['localidad'].'</td>
            <td>'.$fila['provincia'].'</td>
            <td>'.$fila['comunidad_id'];
        } else {
            echo '<td></td><td></td><td>';
        } ?>

        <form id="form<?php echo $fila['id']?>" onsubmit="submitAgregarEquipo(event, $(this).serialize(),<?php echo $temporada_id?>)">        
          <input type="hidden" name="tipo_torneo" value="2">
          <input type="hidden" name="fase_id" value="<?php echo $fase_id?>">
          <input type="hidden" name="temporada_id" value="<?php echo $temporada_id?>">
          <input type="hidden" name="equipo_id" value="<?php echo $fila['id']?>">
          <input type='submit' name='agregar' value='insertar'> - <?php echo $fila['es_seleccion']?></td>
        </form></td></tr>
    <?php } ?>
  </table>