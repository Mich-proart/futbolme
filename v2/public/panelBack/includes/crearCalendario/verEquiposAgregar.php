  <?php 
define('_PANEL_', 1);
require_once '../../includes/config.php'; 

$temporada_id=$_POST['temporada_id'];

$campos = 't.id, t.torneo_id, t.nombre, t.id_original, tor.betsapi, tor.visible,
    tor.nombre nombre_torneo, tor.tipo_torneo, tor.categoria_id,tor.categoria_torneo_id, 
    (SELECT nombre FROM categoria WHERE id=tor.categoria_id) nombre_categoria, 
    tor.pais_id, 
    (SELECT nombre FROM pais WHERE id=tor.pais_id) nombre_pais, 
    tor.comunidad_id,
    (SELECT nombre FROM comunidad WHERE id=tor.comunidad_id) nombre_comunidad
    ';
    $tabla = ' temporada t INNER JOIN torneo tor ON t.torneo_id=tor.id';
    $condicion = ' WHERE t.id='.$temporada_id;
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$condicion;
    //echo $consulta;die;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);

    $nombre_temporada = $resultado['nombre'];
    $torneo_id = $resultado['torneo_id'];
    $nombre_torneo = $resultado['nombre_torneo'];
    $categoria_torneo = $resultado['categoria_torneo_id'];
    $categoria_id = $resultado['categoria_id'];
    $pais_id = $resultado['pais_id'];
    $comunidad_id = $resultado['comunidad_id'];
    $tipo_torneo = $resultado['tipo_torneo'];

    $categoria_n = $resultado['nombre_categoria'];
    $pais_n = $resultado['nombre_pais'];
    $comunidad_n = $resultado['nombre_comunidad'];
    $betsapi = $resultado['betsapi'];
    $visible = $resultado['visible'];


            echo 'Pais: '.$pais_n.' - '.$pais_id.'<br />';
            echo 'Comunidad: '.$comunidad_n.' - '.$comunidad_id.'<br />';
            echo 'Categoría: '.$categoria_n.' - '.$categoria_id.'<br />';

            $campos = 'e.id, e.nombre, l.nombre localidad, p.nombre provincia, p.comunidad_id, c.es_seleccion';
            $tabla = 'equipo e';
            $union = ' INNER JOIN club c ON e.club_id=c.id';
            $union2 = ' INNER JOIN localidad l ON c.localidad_id=l.id';
            $union3 = ' INNER JOIN provincia p ON l.provincia_id=p.id';

            $modelo = 0;
            if ($categoria_id > 1 && 60 != $pais_id) {
                $condicion = ' WHERE e.categoria_id='.$categoria_id.'AND c.pais_id='.$pais_id;
                $orden = ' ORDER BY e.nombre';
            } else {
                if (60 == $pais_id) {
                    if (1 == $comunidad_id) {
                        $condicion = ' WHERE e.categoria_id='.$categoria_id.' AND c.pais_id='.$pais_id.' AND e.desaparecido<1000 AND p.id>1';
                        $orden = ' ORDER BY p.comunidad_id, e.nombre';
                    } else {
                        $condicion = ' WHERE e.categoria_id='.$categoria_id.' AND c.pais_id='.$pais_id.' AND p.comunidad_id='.($comunidad_id).' AND e.desaparecido<1000';
                        $orden = ' ORDER BY e.nombre';
                    }
                } else {
                    $campos = 'e.id, e.nombre, c.es_seleccion';
                    $condicion = ' WHERE e.categoria_id='.$categoria_id.' AND c.pais_id='.$pais_id;
                    $union2 = '';
                    $union3 = '';
                    $orden = ' ORDER BY e.nombre';
                    $modelo = 1;
                }
            }
            $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$union2.$union3.$condicion.$orden;

            $resultadoSQL = mysqli_query($mysqli, $consulta);
            $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
            echo "<table class='table'>";
            echo '<tr><td>ID</td>
                    <td>disponibles</td>
                    <td>localidad</td>
                    <td>provincia</td>
                    <td>Comunidad - Seleccion</td>
                  </tr>';

              foreach ($resultado as $fila) {
                  echo '<tr bgcolor="white">
                      <td>'.$fila['id'].'</td>
                      <td>'.$fila['nombre'].'</td>';
                  if ($modelo < 1) {
                      echo '<td>'.$fila['localidad'].'</td>
                        <td>'.$fila['provincia'].'</td>
                        <td>'.$fila['comunidad_id'].' - '.$fila['es_seleccion']?>

                        <form id="agragar-<?php echo $fila['id']?>" onsubmit="submitAgregarEquipo(event, $(this).serialize())">        
                          <input type="hidden" name="tipo_torneo" value="<?php echo $tipo_torneo; ?>">
                          <input type="hidden" name="categoria_torneo" value="<?php echo $categoria_torneo; ?>">
                          <input type="hidden" name="temporada_id" value="<?php echo $temporada_id; ?>">
                          <input type="hidden" name="equipo_id" value="<?php echo $fila['id']?>">
                          <input type='submit' name='agregar' value='agregar'></td>
                        </form>

                      <?php echo '</td>';
                  } else {
                      echo '<td></td><td></td><td>';?>
                      <form id="agragar-<?php echo $fila['id']?>" onsubmit="submitAgregarEquipo(event, $(this).serialize())">        
                          <input type="hidden" name="tipo_torneo" value="<?php echo $tipo_torneo; ?>">
                          <input type="hidden" name="categoria_torneo" value="<?php echo $categoria_torneo; ?>">
                          <input type="hidden" name="temporada_id" value="<?php echo $temporada_id; ?>">
                          <input type="hidden" name="equipo_id" value="<?php echo $fila['id']?>">
                          <input type='submit' name='agregar' value='agregar'></td>
                        </form>

                      <?php echo ' - '.$fila['es_seleccion'].'</td>';
                  }
                  echo '</tr>';
              }
            echo '</table>'; ?>
 