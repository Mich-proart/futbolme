
<html>
<body>
	<div style="float:left; width:100%; float:left">
<?php

define('_FUTBOLME_', 1);
require_once '../src/consultas.php';
require_once '../src/funciones.php';

$mysqli = conectar();

$temporada_id=$_GET['temporada_id']??442;

if ($temporada_id==442){
    $consulta="DELETE from partido WHERE temporada_id=442 AND fecha< curdate()-interval 60 day "; //borramos todos los partidos con mas de 60 dias de antiguedad.
    mysqli_query($mysqli, $consulta);
    //echo 'Partidos borrados<br />';
    //echo $consulta.'<hr />';
}

        Xtipo($temporada_id);

        $f = '../json/temporada/'.$temporada_id.'/tipo.json';
        $json = file_get_contents($f);
        $datos = json_decode($json, true);
        $fila=$datos['torneo'];

        $torneo_id = $fila['torneo_id'];
        $tipo_torneo = $fila['tipo_torneo'];
        $temporada_nombre = $fila['nombre'];
        $categoria_id = $fila['categoria_id'];
        $categoria_nombre = $fila['categoria_nombre'];
        $pais_id = $fila['idPais'];
        $pais_nombre = $fila['nombrePais'];
        $comunidad_id = $fila['idComunidad'];
        $comunidad_nombre = $fila['nombreComunidad'];
        $activa = $fila['jornadaActiva'];

        
        echo '<h4>'.$temporada_nombre.' - ('.$temporada_nombre.')
	 		 - Temporada ID:'.$temporada_id.'
	 		 - Torneo ID:'.$torneo_id.' - Tipo de torneo '.$tipo_torneo.' - Jornada '.$activa.'</a></h4>';




if (isset($_GET['modo2'])) {
        if ('agregar_equipo' == $_GET['modo2']) {
            $consulta = 'INSERT INTO temporada_equipo (temporada_id,equipo_id) VALUES ('.$_GET['temporada_id'].', '.$_GET['e_agregado'].')';
            $consulta = mysqli_query($mysqli, $consulta);
        }

        if ('ver_jornada' == $_GET['modo2']) {
            $activa = $_GET['jornada'];
        }

        if ('rehacer_equipos' == $_GET['modo2']) {
            $consulta = 'DELETE FROM temporada_equipo WHERE temporada_id='.$_GET['temporada_id'];
            $resultadoSQL = mysqli_query($mysqli, $consulta);

            $consulta = 'SELECT DISTINCT equipoLocal_id FROM partido WHERE temporada_id='.$_GET['temporada_id'];
            $resultadoSQL = mysqli_query($mysqli, $consulta);
            $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);

            foreach ($resultado as $key => $fila) {
                $sq = "INSERT INTO temporada_equipo (temporada_id,equipo_id) VALUES ('".$_GET['temporada_id']."','".$fila['equipoLocal_id']."')";
                $resultadoSQL = mysqli_query($mysqli, $sq);
                //echo $sq."<br />";
            }

            $consulta = 'SELECT DISTINCT equipoVisitante_id FROM partido WHERE temporada_id='.$_GET['temporada_id'];
            $resultadoSQL = mysqli_query($mysqli, $consulta);
            $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);

            foreach ($resultado as $key => $fila) {
                $sql = 'SELECT equipo_id FROM temporada_equipo WHERE equipo_id='.$fila['equipoVisitante_id'].' AND temporada_id='.$_GET['temporada_id'];
                $resultadoSQL = mysqli_query($mysqli, $sql);
                $equipos = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);

                if (0 == count($equipos)) {
                    $sq = "INSERT INTO temporada_equipo (temporada_id,equipo_id) VALUES ('".$_GET['temporada_id']."','".$fila['equipoVisitante_id']."')";
                    $resultadoSQL = mysqli_query($mysqli, $sq);
                    echo $sq.'<br />';
                } else {
                    echo '--- ';
                }
            }

            /*$consulta="SELECT DISTINCT equipoVisitante_id FROM partido WHERE temporada_id=".$_GET['temporada_id'];
            $consulta="SELECT DISTINCT equipoVisitante_id FROM partido WHERE temporada_id=286";
            $resultadoSQL = mysqli_query($mysqli, $consulta);
            $equipos2 = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);*/
        }

        if ('borrar_fase' == $_GET['modo2']) {
            $consulta = '	
				DELETE FROM  eliminatorio_fase WHERE eliminatorio_id='.$torneo_id.' AND fase_id='.$_GET['id_fase_borrar'];

            $resultadoSQL = mysqli_query($mysqli, $consulta);
        }

        if ('insertar_fase' == $_GET['modo2']) {
            $consulta = '	
				INSERT INTO eliminatorio_fase (eliminatorio_id,fase_id)
				VALUES 
				('.$torneo_id.', '.$_GET['id_fase_insertar'].')									
			    ';
            $resultadoSQL = mysqli_query($mysqli, $consulta);

        }

        if ('insertar_grupo' == $_GET['modo2']) {
            $consulta = '	
				INSERT INTO grupofasetorneo (torneo_id,fase_id, grupo_id)
				VALUES 
				('.$torneo_id.', '.$_GET['fase_id'].', '.$_GET['id_grupo_insertar'].')									
			    ';

            $resultadoSQL = mysqli_query($mysqli, $consulta);
        }

        if ('borrar_partido' == $_GET['modo2']) {
            $consulta="DELETE from partido WHERE id=".$_GET['partido_id'];
            mysqli_query($mysqli, $consulta);
            echo 'Partido borrado<br />';
            echo $consulta.'<hr />';
        }

        if ('grabar_partido' == $_GET['modo2']) {
            if (isset($_GET['grupo_id'])) {
                $consulta = '	
			INSERT INTO partido (temporada_id,estado_partido,fecha,hora_prevista,jornada,grupo_id, equipoLocal_id, equipoVisitante_id)
			VALUES 
			('.$_GET['temporada_id'].",0, '".$_GET['fecha']."', '".$_GET['hora_prevista']."',".$_GET['fase_id'].', '.$_GET['grupo_id'].', '.$_GET['equipoLocal_id'].', '.$_GET['equipoVisitante_id'].')									
		    ';
            } else {
                $consulta = '	
			INSERT INTO partido (temporada_id,estado_partido,fecha,hora_prevista,jornada,equipoLocal_id, equipoVisitante_id)
			VALUES 
			('.$_GET['temporada_id'].",0, '".$_GET['fecha']."', '".$_GET['hora_prevista']."',".$_GET['fase_id'].', '.$_GET['equipoLocal_id'].', '.$_GET['equipoVisitante_id'].')									
		    ';
            }

            //$f = '../../json/temporada/'.$_GET["temporada_id"].'/partidos.json';
            //unlink($f);
            //Xpartidos($_GET["temporada_id"],$_GET["fase_id"],1);

            echo $consulta.'<hr />';

            $resultadoSQL = mysqli_query($mysqli, $consulta);
        }

        if ('insertar_equipo' == $_GET['modo2']) {
            $consulta = '	
			INSERT INTO temporada_equipo (temporada_id,equipo_id)
			VALUES 
			('.$_GET['temporada_id'].', '.$_GET['equipo_id'].')									
		    ';

            $resultadoSQL = mysqli_query($mysqli, $consulta);
        }

        if ('quitar_equipo' == $_GET['modo2']) {
            $consulta = '	
			DELETE FROM temporada_equipo WHERE 
			temporada_id='.$_GET['temporada_id'].' AND equipo_id='.$_GET['equipo_id'];

            $resultadoSQL = mysqli_query($mysqli, $consulta);
        }
    }
?>

<div style="float:left; width:40%;">
<?php

 

    $resultado=Xfases_jornadas($temporada_id);

    echo "<table width='100%' border='0' cellpadding='1' cellspacing='1' bgcolor='gainsboro'>";
    echo '<tr><td>ID</td>
				  <td>Fase - Torneo: '.$torneo_id.' - Temporada:'.$temporada_id.'</td>
				  <td>Tipo</td>				  
			  </tr>';


	$color = 'white';
    foreach ($resultado as $fila) {


        if (isset($_GET['fase_id'])) {
            if ($_GET['fase_id'] != $fila['fase_id']) {
                $color = 'white';
            } else {
                $color = 'yellow';
            }
        }

        if (3 == $fila['tipo_eliminatoria']) {
            echo '<tr bgcolor="'.$color.'"><td><a href="?temporada_id='.$temporada_id.'&fase_id='.$fila['fase_id'].'">'.$fila['fase_id'].'</a></td>
   					<td>('.$fila['partidos'].') - '.$fila['nombre'];

            if (0 == $fila['partidos']) {
                echo ' -- <a href="?temporada_id='.$temporada_id.'&modo2=borrar_fase&id_fase_borrar='.$fila['fase_id'].'">Q</a>';
            }

            echo '</td><td>'.$fila['tipo_eliminatoria'].'</td></tr>';
             $resultado2=Xfases_grupos($temporada_id,$fila['fase_id']);

            foreach ($resultado2 as $fila2) {
                echo '<tr><td>'.$torneo_id.'</td>				  
						  	  <td>'.$fila2['nombre'].'</td>
							  <td><a href="?temporada_id='.$temporada_id.'&fase_id='.$fila['fase_id'].'&grupo_id='.$fila2['grupo_id'].'">'.$fila2['grupo_id'].'</a></td>
							  </tr>';
            }
        } else {
            echo '<tr bgcolor="'.$color.'"><td><a href="?temporada_id='.$temporada_id.'&fase_id='.$fila['fase_id'].'">'.$fila['fase_id'].'</a></td>
   					<td>('.$fila['partidos'].') - '.$fila['nombre'];

            if (0 == $fila['partidos']) {
                echo ' -- <a href="?temporada_id='.$temporada_id.'&modo2=borrar_fase&id_fase_borrar='.$fila['fase_id'].'">Q</a>';
            }

            echo '</td><td>'.$fila['tipo_eliminatoria'].'</td></tr>';
        }
    }

    echo '</table>';

    echo "<table width='100%' border='0' cellpadding='1' cellspacing='1' bgcolor='gainsboro'>";
    echo '<tr><td>Fases</td><td>Grupos</td></tr>';
    echo "<tr><td valign='top'>";
    echo "<table width='100%' border='0' cellpadding='1' cellspacing='1' bgcolor='gainsboro'>";
    echo '<tr><td>id</td><td>nombre</td><td>ord</td><td>tipo</td></tr>';

    $resultado=Xfases();

    foreach ($resultado as $fila) {
        echo '<tr bgcolor="white">
   				<td><a href="?temporada_id='.$temporada_id.'&modo2=insertar_fase&id_fase_insertar='.$fila['id'].'">ins</a> - '.$fila['id'].'</td>
   				<td>'.$fila['nombre'].'</td>
   				<td>'.$fila['orden'].'</td>
   				<td>'.$fila['tipo_eliminatoria'].'</td>
   				</tr>';
    }
    echo "</table></td><td valign='top'>";
    echo "<table width='100%' border='0' cellpadding='1' cellspacing='1' bgcolor='gainsboro'>";
    echo '<tr><td>id</td><td>nombre</td><td>ord</td></tr>';

    

    $resultado=Xgrupos();

    foreach ($resultado as $fila) {
        echo '<tr bgcolor="white">';

        if (isset($_GET['fase_id'])) {
            echo '<td><a href="?temporada_id='.$temporada_id.'&modo2=insertar_grupo&fase_id='.$_GET['fase_id'].'&id_grupo_insertar='.$fila['id'].'">ins</a> - '.$fila['id'].'</td>';
        } else {
            echo '<td>'.$fila['id'].'</td>';
        }

        echo '<td>'.$fila['nombre'].'</td>
   				<td>'.$fila['orden'].'</td>
   				</tr>';
    }

    echo '</table></td></tr></table>';

?>
</div>

<div style="float:left; width:60%;">
<?php

if (isset($_GET['fase_id'])) {
    $fase_id = $_GET['fase_id'];

    $grupo_id=$_GET['grupo_id']??0;
    //echo $consulta;

    $resultado =Xpartidos($temporada_id, $_GET['fase_id']);
    


    echo "<div style='height:300px; overflow: scroll;'><table width='100%' border='0' cellpadding='1' cellspacing='1' bgcolor='gainsboro'>";
    echo '<tr><td>Jornada</td>
				  <td>Grupo</td>
				  <td>Fecha</td>
				  <td>Local</td>
				  <td>Visitante</td><td></td>				  
			  </tr>';



    foreach ($resultado as $fila) {
        echo '<tr bgcolor="white">
   				<td><a href="?temporada_id='.$temporada_id.'&fase_id='.$fase_id.'">'.$fila['jornada'].'</a></td>
   				<td>'.$fila['grupo_id'].'</td>
   				<td>'.$fila['fecha'].'</td>
   				<td>'.$fila['equipoLocal_id'].' - '.$fila['local'].'</td>
   				<td>'.$fila['visitante'].' - '.$fila['equipoVisitante_id'].'</td>
   				<td><a href="partidosTorneo.php?partido_id='.$fila['id'].'&temporada_id='.$temporada_id.'&fase_id='.$_GET['fase_id'].'&grupo_id='.$grupo_id.'&modo2=borrar_partido">Borrar</td>
   				</tr>';
    }

    echo '</table></div><hr />';

    $resultado = Xequipos_temporada($temporada_id);

    echo "<table width='100%' border='0' cellpadding='1' cellspacing='1' bgcolor='gainsboro'>";
    echo "<tr>
		  <form method='get' action='partidosTorneo.php'>
		  <input type='hidden' name='modo' value='buscar_temporada'>
		  <input type='hidden' name='modo2' value='grabar_partido'>
		  <input type='hidden' name='temporada_id' value='".$temporada_id."'>
		  <input type='hidden' name='fase_id' value='".$_GET['fase_id']."'>
		  <td>Fecha <input type='text' name='fecha' size='10' value='".date('Y').'-'.date('m').'-'.date('d')."'></td>
		  <td>Hora <input type='text' name='hora_prevista' size='10' value='16:00:00'></td>";

    if (isset($_GET['grupo_id'])) {
        echo "<td>Grupo <input type='text' name='grupo_id' size='2' value='".$_GET['grupo_id']."'></td>";
    }

    echo "</tr>
		  <tr><td>Local <select name='equipoLocal_id'><option value=''>-------</option>";

    foreach ($resultado as $fila) {
        
        echo '<option value="'.$fila['equipo_id'].'">'.$fila['nombre'].'</option>';
    }
    echo "</select></td>
		   <td>Visit <select name='equipoVisitante_id'><option value=''>-------</option>";

    foreach ($resultado as $fila) {
        echo '<option value="'.$fila['equipo_id'].'">'.$fila['nombre'].'</option>';
    }
    echo "</select></td>
		  <td><input type='submit' name='grabar' value='grabar'></td>
	  </form></tr></table>"; ?>

	      <div style="text-align:center; padding:20px"><form method="GET" action="partidosTorneo.php">
	        <input type="hidden" name="modo" value="buscar_temporada">
	        <input type="hidden" name="modo2" value="agregar_equipo">
	        <input type="hidden" name="fase_id" value="<?php echo $_GET['fase_id']; ?>">
	        <input type="hidden" name="temporada_id" value="<?php echo $temporada_id; ?>">
	        Agregar id: <input type='text' name='e_agregado' size="2">
	        <input type='submit' name='agregar' value='agregar'></td>
	      </form></div>


	<?php echo "<div style='height:300px; overflow: scroll;'><table width='100%' border='0' cellpadding='1' cellspacing='1' bgcolor='gainsboro'>";
    echo "<tr><td>ID</td>
				  <td colspan='3'>equipos incluidos</td>
				</tr>";

    foreach ($resultado as $fila) {
    	
        echo '<tr bgcolor="white">
   				<td>'.$fila['equipo_id'].'</td>
   				<td>'.$fila['nombreCorto'].'</td>
   				<td>'.$fila['betsapi'].'</td>
   				<td><a href="partidosTorneo.php?modo2=quitar_equipo&temporada_id='.$temporada_id.'&fase_id='.$_GET['fase_id'].'&equipo_id='.$fila['equipo_id'].'">quitar</a></td>   				
   				</tr>';
    }

    echo '</table></div>';


    $resultado=XbuscadorEquipos($categoria_id, $pais_id, $comunidad_id, $temporada_id, $_GET['fase_id']);

    echo "<div style='height:300px; overflow: scroll;'><table width='100%' border='0' cellpadding='1' cellspacing='1' bgcolor='gainsboro'>";
    echo '<tr><td>ID</td>
				  <td>disponibles</td>
				  <td>localidad</td>
				  <td>provincia</td>
				  <td>Comunidad - Seleccion</td>
				</tr>';
	$modelo=0;
    
    foreach ($resultado as $fila) {
        echo '<tr bgcolor="white">
   				<td>'.$fila['id'].'</td>
   				<td>'.$fila['nombre'].'</td>';
        if ($modelo < 1) {
            echo '<td>'.$fila['localidad'].'</td>
   					<td>'.$fila['provincia'].'</td>
   					<td>'.$fila['comunidad_id'].' - <a href="partidosTorneo.php?modo2=insertar_equipo&temporada_id='.$temporada_id.'&modo=buscar_temporada&fase_id='.$_GET['fase_id'].'&equipo_id='.$fila['id'].'">insertar</a> - '.$fila['es_seleccion'].'</td>';
        } else {
            echo '<td></td><td></td><td><a href="partidosTorneo.php?modo2=insertar_equipo&temporada_id='.$temporada_id.'&modo=buscar_temporada&fase_id='.$_GET['fase_id'].'&equipo_id='.$fila['id'].'">insertar</a> - '.$fila['es_seleccion'].'</td>';
        }

        echo '</tr>';
    }

    echo '</table></div>';
} else {

     $resultado =Xpartidos($temporada_id);
    


    echo "<div style='height:300px; overflow: scroll;'><table width='100%' border='0' cellpadding='1' cellspacing='1' bgcolor='gainsboro'>";
    echo '<tr><td>Jornada</td>
                  <td>Grupo</td>
                  <td>Fecha</td>
                  <td>Local</td>
                  <td>Visitante</td><td></td>                 
              </tr>';



    foreach ($resultado as $fila) {
        echo '<tr bgcolor="white">
                <td><a href="?temporada_id='.$temporada_id.'">'.$fila['jornada'].'</a></td>
                <td>'.$fila['grupo_id'].'</td>
                <td>'.$fila['fecha'].'</td>
                <td>'.$fila['equipoLocal_id'].' - '.$fila['local'].'</td>
                <td>'.$fila['visitante'].' - '.$fila['equipoVisitante_id'].'</td>
                <td><a href="partidosTorneo.php?partido_id='.$fila['id'].'&temporada_id='.$temporada_id.'&modo2=borrar_partido">Borrar</td>
                </tr>';
    }

    echo '</table></div><hr />';

}
?>
</div>


</div></body></html>
