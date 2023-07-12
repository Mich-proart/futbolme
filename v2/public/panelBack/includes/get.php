<?php
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

// fin partidosTorneo
if (isset($_GET['modo'])){
	if ($_GET['modo']=='compararCalendario'){
		$comunidad_id=$_GET['comunidad_id'];
		$temporada_id=$_GET['temporada_id'];

		$campos = 'te.equipo_id, e.nombre, te.grupo, e.betsapi, e.slug, e.federacion_id,
		(SELECT count(id) FROM partido WHERE equipoLocal_id=te.equipo_id AND temporada_id='.$temporada_id.') pL, 
		(SELECT count(id) FROM partido WHERE equipoVisitante_id=te.equipo_id AND temporada_id='.$temporada_id.') pV 
		';
		$tabla = ' temporada_equipo te INNER JOIN equipo e ON e.id=te.equipo_id';
		$condicion = ' WHERE te.temporada_id='.$temporada_id.' ORDER BY nombre';
		$consulta = 'SELECT '.$campos.' FROM '.$tabla.$condicion;
		//echo $consulta;die;
		$mysqli = conectar();
		$resultadoSQL = mysqli_query($mysqli, $consulta);
		$equiposTorneo = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC); 
			
			  
		  $f = '../panelBack/federacion/'.$_GET['territorial'].'/equipos/'.$_GET['grupo'].'-equipos.json';
		  if (@file_exists($f)) { 
		    $json = file_get_contents($f);
		    $datos = json_decode($json, true);?>
		    <?php 
		    foreach ($datos as $key => $value) {
		    $fed_id=str_replace('NFG_VisEquipos?cod_primaria=1000119&Codigo_Equipo=', '', $value['url']);
		      foreach ($equiposTorneo as $k => $v) {
		        if($v['federacion_id']==$fed_id){
		          $equiposTorneo[$k]['nombreFed']=$value['equipo'];
		        }
		      }
		    }
		  }
			  
		  $f = '../panelBack/federacion/'.$_GET['territorial'].'/calendarios/'.$_GET['grupo'].'-partidos.json';	
		  if (@file_exists($f)) { 
		    $json = file_get_contents($f);
		    $datos = json_decode($json, true);			    
		    foreach ($datos as $key => $partidosDatos) {
		        foreach ($partidosDatos as $k => $v) {			          
		          $local_id=0;$visitante_id=0;$eLocal=''; $eVisitante='';
		          foreach ($equiposTorneo as $k1 => $v1) {		          	
		            $jornada=str_replace('Jornada ', '', $v['jornada']);
		            $fecha=$v['fecha'];
		            
		            $v['local']=str_replace('&nbsp;', '', $v['local']);
		            if($v1['federacion_id']==$v['local_id']) {
		              $eLocal=$v1['nombre'];
		              $local_id=$v1['equipo_id'];
		            }
		            if($v1['federacion_id']==$v['visitante_id']) {
		              $eVisitante=$v1['nombre'];
		              $visitante_id=$v1['equipo_id'];
		            }
		          } //equipostorneo
		        echo 'Jda.'.$jornada.' - '.$fecha.' ('.$eLocal.'->'.$local_id.') - '.$v['local'].' - '.$v['visitante'].' - ('.$eVisitante.'->'.$visitante_id.')<br />';
		        $sqLocal=' AND equipoLocal_id='.$local_id;
		        $sqVisitante=' AND equipoVisitante_id='.$visitante_id;
		        if (IS_NULL($local_id)){ $local_id=0;}
		        if (IS_NULL($visitante_id)){ $visitante_id=0;}
		        if ($local_id==0){ $sqLocal=' AND equipoLocal_id IS NULL'; }
		        if ($visitante_id==0){ $sqVisitante=' AND equipoVisitante_id IS NULL'; }			        
		        $sq='SELECT id FROM partido WHERE temporada_id='.$temporada_id.$sqLocal.$sqVisitante;
		        $resultadoSQL = mysqli_query($mysqli, $sq);
		        $p = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
		        if (empty($p)){
		          echo $sq.'<br />';
		          if ($local_id==0){ $local_id='NULL'; }
		          if ($visitante_id==0){ $visitante_id='NULL'; }
		          $consulta = 'INSERT INTO partido (temporada_id, estado_partido, goles_local, goles_visitante, fecha, hora_prevista, jornada, equipoLocal_id, equipoVisitante_id) VALUES ('.$temporada_id.',0,0,0,"'.$fecha.'", "00:00:11",'.$jornada.', '.$local_id.', '.$visitante_id.')';
		            mysqli_query($mysqli, $consulta);
		            echo $consulta.'<hr />';
		        } else {
		        	echo $sq.'<hr />';
		        }      
		      } //partidos			      
		    } //datos calendario
		  } //si existe calendario

		  echo '<a href="index.php">continuar...</a>';die;
	}

	if ($_GET['modo']=='matarTorneo'){
		if (isset($_GET['temporada_id'])){
			matarTorneoFM($_GET['temporada_id'],$_GET['id'],$_GET['tipo']);
			
		} else {
			$t = unserialize($_GET['t']);
			foreach ($t as $key => $value) {
				matarTorneoFM($value['temporada_id'],$value['torneo_id']);
				echo $value['nombre'].'<br />Temporada '.$value['temporada_id'].' es ('.$value['torneo_id'].') muerto<br />';
			}
		}

		 echo '<a href="index.php?comunidad_id='.$_GET['comunidad_id'].'">continuar...</a>';die;
		
	}



	if ($_GET['modo']=='borrarTodos'){
		$sql='DELETE FROM '.$_GET['bd'].' WHERE mantener=0';
		mysqli_query($mysqliBase, $sql);
	}

	if ($_GET['modo']=='quitarMalos'){
		$sql='DELETE FROM '.$_GET['bd'].' WHERE uso<10 AND fallo>5';
		mysqli_query($mysqliBase, $sql);
	}

	if ($_GET['modo']=='quitar'){
		$sql='DELETE FROM '.$_GET['bd'].' WHERE id='.$_GET['id'];
		mysqli_query($mysqliBase, $sql);
	}

	if ($_GET['modo']=='activar'){
		$sql='UPDATE '.$_GET['bd'].' SET fallo=0 WHERE id='.$_GET['id'];
		mysqli_query($mysqliBase, $sql);
	}
	if ($_GET['modo']=='mantener'){
		$sql='UPDATE '.$_GET['bd'].' SET mantener=1 WHERE id='.$_GET['id'];
		mysqli_query($mysqliBase, $sql);
	}

	if ($_GET['modo']=='poneracero'){
		$sql='UPDATE '.$_GET['bd'].' SET fallo=0';
		mysqli_query($mysqliBase, $sql);
	}

//crear calendario

    if ('grabar_partido' == $_GET['modo']) {
          $consulta = 'INSERT INTO partido (temporada_id, estado_partido, goles_local, goles_visitante, fecha, hora_prevista, jornada, equipoLocal_id, equipoVisitante_id)
    VALUES 
    ('.$_GET['temporada_id'].','.$_GET['estado_partido'].','.$_GET['goles_local'].','.$_GET['goles_visitante'].", '".$_GET['fecha']."', '".$_GET['hora_prevista']."',198, ".$_GET['equipoLocal_id'].', '.$_GET['equipoVisitante_id'].')                 
      ';
          $consulta = mysqli_query($mysqli, $consulta);
          echo $consulta;
      }

      if ('insertar_equipo' == $_GET['modo']) {
          $consulta = 'INSERT INTO temporada_equipo (temporada_id,equipo_id) VALUES ('.$_GET['temporada_id'].', '.$_GET['equipo_id'].')';
          $consulta = mysqli_query($mysqli, $consulta);
          echo 'ok';
          die;
      }

      if ('quitar_equipo' == $_GET['modo']) {
          $consulta = 'DELETE FROM temporada_equipo WHERE temporada_id='.$_GET['temporada_id'].' AND equipo_id='.$_GET['equipo_id'];
          mysqli_query($mysqli, $consulta);

          $consulta = 'UPDATE partido SET equipoLocal_id=null WHERE temporada_id='.$_GET['temporada_id'].' and equipoLocal_id='.$_GET['equipo_id'];
          mysqli_query($mysqli, $consulta);

          $consulta = 'UPDATE partido SET equipoVisitante_id=null WHERE temporada_id='.$_GET['temporada_id'].' and equipoVisitante_id='.$_GET['equipo_id'];
          mysqli_query($mysqli, $consulta);
          echo 'ok';
          die;
      }
  }


?>