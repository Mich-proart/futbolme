<?php 
$static_v = 8; 
define('_FUTBOLME_', 1);
require_once '../src/consultas.php';
require_once '../src/funciones.php';
?>


<meta charset="utf-8">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/js/ajax.js?=<?php echo $static_v; ?>"></script>
</head>
<body>
	<?php $link = conectar();?>
	
	<?php
    if (isset($_POST['temporada_id'])) {

       // imp($_POST);

       $equipo_id= $_POST['equipo_id'];
            $sql = 'UPDATE equipo SET slug="'.$_POST['slug'].'", nombre="'.$_POST['nombre'].'", nombreCorto="'.$_POST['nombreCorto'].'" WHERE id='.$equipo_id;
                //echo $sql;

            if (!mysqli_query($link, $sql)) {
                
                printf("Errormessage: %s\n", mysqli_error($link));
                exit;
            }

            unset($sql);

        $_GET['temporada_id']=$_POST['temporada_id'];

    }
    if (isset($_GET['modo'])) {
        if ('sel' == $_GET['modo']) {
            $s = $_GET['seleccion'];
            $ids = $_GET['ids'];
            $sql = 'UPDATE jugador SET dorsal='.$s.' WHERE id IN ('.$ids.')';

            if (!mysqli_query($link, $sql)) {
                echo $sql;
                printf("Errormessage: %s\n", mysqli_error($link));
                exit;
            }
        }
        if ('borrsel' == $_GET['modo']) {
            $s = $_GET['seleccion'];
            $sql = 'UPDATE jugador SET dorsal=0 WHERE dorsal='.$s;
            if (!mysqli_query($link, $sql)) {
                echo $sql;
                printf("Errormessage: %s\n", mysqli_error($link));
                exit;
            }
        }
        if ('borrsel2' == $_GET['modo']) {
            $sql = 'UPDATE jugador SET dorsal=0 WHERE id='.$_GET['id'];
            if (!mysqli_query($link, $sql)) {
                echo $sql;
                printf("Errormessage: %s\n", mysqli_error($link));
                exit;
            }
        }

        if ('enviar_twit_grupo' == $_GET['modo']) {
            $url = 'https://futbolme.eu/resultados-directo/torneo/xxx/'.$_GET['temporada_id'].'/';
            $hastags = '#futbolmeResultados';
            $msj = $_GET['mensaje'];
            $mensaje = $msj.'. Toda la info en '.$url.' '.$hastags;
            echo $mensaje.'<br />';
            $respuesta = sendTweet2($mensaje);
            echo '<br />Twit Enviado';
            die;
        }

        if ('enviar_twit_equipo' == $_GET['modo']) {
            $url = 'https://futbolme.eu/equipo.php?id=';
            $urlMi = 'http://futbolme.eu/src/usuarios/anadirEquipoFavoritoUrl.php?equipo_id=';
            $hastags = '#futbolmeCalendarios';
            $msj = $_GET['mensaje'];
            $equipos = $_GET['equipos'];
            $idsequipos = $_GET['idsequipos'];
            $equipos = explode(',', $equipos);
            $idsequipos = explode(',', $idsequipos);
            foreach ($equipos as $key => $equipo) {
                if (strlen($equipo) > 1) {
                    $mensaje = '@'.$equipo.' '.$msj.'. <br />Puedes verlo en '.$url.$idsequipos[$key].' <br />Para agregar a Mifutbolme pulsa aquí '.$urlMi.$idsequipos[$key];

                    echo $mensaje.'<br />';
                    //$respuesta = sendTweet2($mensaje);
                }
            }
            //echo "<br />Copia y pega para Enviados";
            die;
        }

        if ('enviar_twit_widgets' == $_GET['modo']) {
            $url = 'https://futbolme.eu/widgets.php?equipo_id=';
            $hastags = '#futbolmeWidgets';
            $msj = $_GET['mensaje'];
            $equipos = $_GET['equipos'];
            $idsequipos = $_GET['idsequipos'];
            $equipos = explode(',', $equipos);
            $idsequipos = explode(',', $idsequipos);
            foreach ($equipos as $key => $equipo) {
                if (strlen($equipo) > 1) {
                    $mensaje = $msj.' @'.$equipo.' aquí '.$url.$idsequipos[$key].' '.$hastags;

                    echo $mensaje.'<br />';
                    $respuesta = sendTweet2($mensaje);
                }
            }
            echo '<br />Twits Widgets enviados';
            die;
        }

        if ('modificar_torneo' == $_GET['modo']) {
            $torneo_id = $_GET['torneo_id'];
            $nombreTorneo = $_GET['nombreTorneo'];
            $jornadas = $_GET['jornadas'];
            $activa = $_GET['activa'];
            $foro = $_GET['foro'];
            $apuesta = $_GET['apuesta'];
            $visible = $_GET['visible'];
            $consulta = "UPDATE temporada SET nombre ='".$nombreTorneo."' WHERE id=".$_GET['temporada_id'];
            if (!mysqli_query($link, $consulta)) {
                echo $consulta;
                printf("Errormessage: %s\n", mysqli_error($link));
                exit;
            }
            $consulta2 = "UPDATE torneo SET nombre ='".$nombreTorneo."', foro='".$foro."', apuesta='".$apuesta."', visible='".$visible."' WHERE id=".$torneo_id;
            if (!mysqli_query($link, $consulta2)) {
                echo $consulta2;
                printf("Errormessage: %s\n", mysqli_error($link));
                exit;
            }
            $consulta3 = "UPDATE liga SET jornadas='".$jornadas."', jornadaActiva='".$activa."' WHERE id=".$torneo_id;
            if (!mysqli_query($link, $consulta3)) {
                echo $consulta3;
                printf("Errormessage: %s\n", mysqli_error($link));
                exit;
            }

            echo $consulta;

            borrar_cache2($_GET['temporada_id']);
        }

        if ('buscar_jugador' == $_GET['modo']) {
            $campos = 'j.id, j.nombre, j.apodo, j.es_baja, j.lugar_nacimiento, e.nombre equipo, e.id equipo_id';
            $tabla = 'jugador j';
            $union = ' LEFT JOIN equipo e ON j.equipoActual_id=e.id';

            if (0 != $_GET['jugador_id']) {
                $condicion = ' WHERE j.id='.$_GET['jugador_id'];
                $orden = '';
            } else {
                if (strlen($_GET['jugador_lugar']) > 2) {
                    $condicion = " WHERE (j.lugar_nacimiento LIKE '%".$_GET['jugador_lugar']."%')";
                } else {
                    $condicion = " WHERE (j.nombre LIKE '%".$_GET['jugador_nombre']."%' OR j.apodo LIKE '%".$_GET['jugador_nombre']."%')";
                }
                $orden = '';
            }
            $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;

            //echo $consulta;?>
	<table width='100%' border='0' cellpadding='1' cellspacing='1' bgcolor='gainsboro'>
		<tr><td>ID</td>
			<td>baja</td>
			<td>nombre</td>
			<td>lugar nacimiento</td>
			<td>apodo</td>
			<td>equipo</td>				  
		</tr>
				<?php
                $resultado = mysqli_query($link, $consulta);
            while ($fila = mysqli_fetch_assoc($resultado)) {
                ?>
		<tr bgcolor="white">
			<td>
				<a href="?temporada_id=1000&equipo_id=<?php echo $fila['equipo_id']; ?>&jugador_id=<?php echo $fila['id']; ?>">
					<?php echo $fila['id']; ?>
				</a>
			</td>
			<td><?php echo $fila['es_baja']; ?></td>
			<td><?php echo $fila['nombre']; ?></td>
			<td><?php echo $fila['lugar_nacimiento']; ?></td>
			<td><?php echo $fila['apodo']; ?></td>
			<td><?php echo $fila['equipo']; ?></td>
		</tr>
					<?php
            } ?>
	</table>
				<?php die;
        }
        if ('grabar_jugador' == $_GET['modo']) {
            if (isset($_GET['origen'])) {
                $_GET['nombre'] = $_GET['apodo'];
            }
            $consulta = "	
				INSERT INTO jugador (nombre, apodo, sexo, posicion, equipoActual_id, es_baja)
				VALUES 
				('".$_GET['nombre']."','".$_GET['apodo']."', 1, ".$_GET['posicion'].', '.$_GET['equipoActual_id'].',0)									
				';

            if (!$consulta = mysqli_query($link, $consulta)) {
                printf("Errormessage: %s\n", mysqli_error($link));
                exit;
            }
            if (isset($_GET['origen'])) {
                header('location:/panel/inicio.php?tipo_torneo=3');
            }
        }
        if ('traspasar_jugador' == $_GET['modo']) {
            if (strlen($_GET['procedencia_fichaje']) > 0) {
                $consulta = 'UPDATE jugador SET es_baja=0, fecha_modificacion=NOW(),  
					es_fichaje='.$_GET['jugador_fichaje'].",
					slug='".$_GET['procedencia_fichaje']."',
					equipoActual_id=".$_GET['equipoNuevo_id'].'
					 WHERE id='.$_GET['jugador_id'];
            } else {
                $consulta = 'UPDATE jugador SET es_baja=0, fecha_modificacion=NOW(), 
					es_fichaje='.$_GET['jugador_fichaje'].',
					equipoActual_id='.$_GET['equipoNuevo_id'].'
					 WHERE id='.$_GET['jugador_id'];
            }

            if (!mysqli_query($link, $consulta)) {
                echo $consulta;
                printf("Errormessage: %s\n", mysqli_error($link));
                exit;
            }
        }
        if ('modificar_jugador' == $_GET['modo']) {
            $fecha_nacimiento = ('' != $_GET['jugador_fecha_nacimiento']) ? "'".$_GET['jugador_fecha_nacimiento']."'" : 'NULL';
            $dorsal = ('' != $_GET['jugador_dorsal']) ? "'".$_GET['jugador_dorsal']."'" : 'NULL';
            $altura = ('' != $_GET['jugador_altura']) ? "'".$_GET['jugador_altura']."'" : 'NULL';
            $peso = ('' != $_GET['jugador_peso']) ? "'".$_GET['jugador_peso']."'" : 'NULL';
            $consulta = "UPDATE jugador SET nombre = '".$_GET['jugador_nombre']."', 
							apodo = '".$_GET['jugador_apodo']."', 
							posicion = '".$_GET['jugador_posicion']."', 
							dorsal = ".$dorsal.', 
							altura = '.$altura.', 
							peso = '.$peso.', 
							fecha_nacimiento = '.$fecha_nacimiento.", 
							lugar_nacimiento = '".$_GET['jugador_lugar_nacimiento']."', 
							pais_id = ".$_GET['jugador_pais_id'].', 
							es_baja = '.$_GET['jugador_baja'].', 
							es_fichaje = '.$_GET['jugador_fichaje'].", 
							caracteristicas = '".$_GET['jugador_caracteristicas']."', 
							palmares = '".$_GET['jugador_palmares']."',
							slug = '".$_GET['procedencia']."'
							WHERE id=".$_GET['jugador_id'];

            //echo $consulta;

            if (!mysqli_query($link, $consulta)) {
                echo $consulta;
                printf("Errormessage: %s\n", mysqli_error($link));
                exit;
            }
        }
    }
        $color = 'white';
        $campos = 'te.id, te.torneo_id, te.nombre, te.id_original, tor.tipo_torneo, tor.visible, tor.categoria_torneo_id, p.nombre pais, 
		(SELECT count(id) FROM partido WHERE temporada_id=te.id) partidos, 
		(SELECT count(temporada_id) FROM temporada_equipo WHERE temporada_id=te.id) equipos'
        ;
        $tabla = 'temporada te';
        $union = ' INNER JOIN torneo tor ON te.torneo_id=tor.id';
        $union .= ' INNER JOIN pais p ON tor.pais_id=p.id';
        $condicion = ' WHERE tor.categoria_torneo_id=17 AND visible>3';
        $orden = ' ORDER BY tor.categoria_torneo_id, tor.orden';
        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden; ?>
	<div style="float:left; width:100%">
		<div style="float:left; width:40%">				
			<table width='100%' border='0' cellpadding='1' cellspacing='1' bgcolor='gainsboro'>
				<tr><td>ID</td>
					<td>Nombre</td>	
					<td>Cat</td>
					<td>Tipo</td>
					<td>Pais</td>
					<td>Vis</td>
					<td>Pdos</td>
					<td>Equ</td>				
				</tr>
				<?php
                $resultado = mysqli_query($link, $consulta);
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    if (isset($_GET['temporada_id'])) {
                        if ($_GET['temporada_id'] != $fila['id']) {
                            $color = 'white';
                        } else {
                            $color = 'yellow';
                        }
                    } ?>
				<tr bgcolor="<?php echo $color; ?>">
					<td style="font-size:12px; height:20px;">
						<a href="?temporada_id=<?php echo $fila['id']; ?>">
							<?php echo $fila['id']; ?>
						</a>
					</td>
					<td style="font-size:12px"><?php echo $fila['nombre']; ?></td>
					<td style="font-size:12px"><?php echo $fila['categoria_torneo_id']; ?></td>
					<td style="font-size:12px"><?php echo $fila['tipo_torneo']; ?></td>
					<td style="font-size:12px"><?php echo $fila['pais']; ?></td>
					<td style="font-size:12px"><?php echo $fila['visible']; ?></td>
					<td style="font-size:12px"><?php echo $fila['partidos']; ?></td>
					<td style="font-size:12px"><?php echo $fila['equipos']; ?></td>
				</tr>
				<?php
                }
                $color = 'white'; ?>
			</table>

		</div>


		<div style="float:left; width:50%; z-index:7">	
		

					<?php
                    if (isset($_GET['temporada_id'])) {
                        /*if ($_GET['temporada_id']==1000 && isset($_GET['equipo_id']) ) {

                                $sql="SELECT torneo_id FROM temporada
                                INNER JOIN torneo tor ON tor.id=te.torneo_id WHERE id=".$_GET['temporada_id'];
                        se debería buscar el torneo al que pertenece el equipo.
                        }*/

                        $camposT = 'te.id, te.torneo_id, te.nombre, te.id_original, tor.visible, tor.apuesta, lig.jornadas, lig.jornadaActiva, tor.comunidad_id, tor.apiRFEFgrupo';
                        $tablaT = 'temporada te';
                        $unionT = ' INNER JOIN torneo tor ON te.torneo_id=tor.id';
                        $union2T = ' INNER JOIN liga lig ON lig.id=tor.id';
                        $condicionT = ' WHERE te.id='.$_GET['temporada_id'];
                        $consultaT = 'SELECT '.$camposT.' FROM '.$tablaT.$unionT.$union2T.$condicionT;

                        
                        //echo $consultaT;

                        $resultado = mysqli_query($link, $consultaT);

                        

                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            $torneo_id = $fila['torneo_id'];
                            $nombreTorneo = $fila['nombre'];
                            $jornadas = $fila['jornadas'];
                            $activa = $fila['jornadaActiva'];
                            $foro = 0;
                            $apuesta = $fila['apuesta'];
                            $visible = $fila['visible'];
                            $comunidad_id = ($fila['comunidad_id']-1);
                            $grupo_id = $fila['apiRFEFgrupo'];
                        }

                        $campos = "e.id, e.nombre, e.club_id, e.slug, e.equipacion_id, e.debut_nacional, e.nombreAPI, (select futbolbase_id from club where id=e.club_id) futbolbase, e.federacion_id, e.nombreCorto, 
						(SELECT concat_ws(' ,', camiseta, pantalon, media) FROM equipacion WHERE equipacion.id=e.equipacion_id) equipacionN";
                        $tabla = 'equipo e';
                        $union = ' INNER JOIN temporada_equipo te ON te.equipo_id=e.id';
                        $condicion = ' WHERE te.temporada_id='.$_GET['temporada_id'];
                        $orden = ' ORDER BY e.nombre';
                        $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden; ?>

		<input type="button" id="mostrar" name="boton1" value="Opciones del torneo">

		<div style="float:left; width:100%; display:none; padding:10px; text-align:center;" id="target">
		<?php if (isset($torneo_id)) {
                            ?>
		<form method='get' action='fichajes.php'>
			<input type="button" id="ocultar" class="target" name="boton2" value="Click para ocultar elementos"><br />
			<input type='hidden' name='modo' value='modificar_torneo'>
			<input type='hidden' name='torneo_id' value='<?php echo $torneo_id; ?>'>
			<input type='hidden' name='temporada_id' value='<?php echo $_GET['temporada_id']; ?>'>
					
			<br />Nombre del torneo:<input type="text" name="nombreTorneo" value="<?php echo $nombreTorneo; ?>" size="25">
			<br />Número de jornadas:<input type="text" name="jornadas" value="<?php echo $jornadas; ?>" size="2">
			Jornada Activa:<input type="text" name="activa" value="<?php echo $activa; ?>" size="2">
			Visible:<input type="text" name="visible" value="<?php echo $visible; ?>" size="2">

			

			<br /><input type="submit" name="modificar" value="Modificar">
			 - <a href="/temporada.php?id=<?php echo $_GET['temporada_id']; ?>" target="_blank">Ver página en futbolme</a>

			  - <a href="/panel/crear_calendario.php?temporada_id=<?php echo $_GET['temporada_id']; ?>" target="_blank">Editar calendario</a>
                                  
		</form>
		

		<hr />
		
		
			

		

		<?php  } ?>	
				
		</div>

        <?php 

        $carp=$carpeta??'';

        ?>


			<table width='100%' border='0' cellpadding='1' cellspacing='1' bgcolor='gainsboro'>
				

				<tr>
					<td>ID</td>
					<td>Twitter</td>					
					<td>Escritorio</td>
                    <td>Movil</td>			  
				</tr>
							<?php
                            $resultado = mysqli_query($link, $consulta);
                        $color = 'white';
                        $cadenaSlug = '';
                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            if (isset($_GET['equipo_id'])) {
                                if ($_GET['equipo_id'] != $fila['id']) {
                                    $color = 'white';
                                } else {
                                    $color = 'yellow';
                                }
                            }


                            $cadenaSlug .= $fila['slug'].' OR '; ?>
				<tr bgcolor="<?php echo $color; ?>">
					<td>
						 
                        <?php echo $fila['id']; ?>&nbsp;&nbsp;&nbsp;
						<a href="?temporada_id=<?php echo $_GET['temporada_id']; ?>&equipo_id=<?php echo $fila['id']; ?>"></a>

                        <?php if ($carp=='00isquad'){ ?>
                             - <a href="<?php echo $urlClub?>id_equipo=<?php echo $fila['federacion_id']?>&id_grupo=<?php echo $grupo_id?>" target="_blank">Fed</a>
                        <?php } ?>
					</td>
					
                    <form method="post" action="equipos.php" id="5">
                    <td valign="top" colspan="3">        
                        <input type="hidden" name="temporada_id" value="<?php echo $_GET['temporada_id']; ?>">
                        <input type="hidden" name="equipo_id" value="<?php echo $fila['id']; ?>">
                       <input type="text" name="slug" value="<?php echo $fila['slug']?>" size="15" >
                       <input type="text" name="nombre" value="<?php echo $fila['nombre']?>" size="32">
                       <input type="text" name="nombreCorto" value="<?php echo $fila['nombreCorto']?>" size="20">
                        <input type="submit" name="enviar" value="ok">          
                    </td>
                </form>
				</tr>
								<?php
                        } ?>
				<tr><td colspan="4">

				</td></tr>
				</table>
							
		<?php
                    } //si existe temporada?>
		</div>
		<div style="float:left; width:30%">
							<?php
                            if (isset($_GET['equipo_id'])) {
                                $campos = 'j.id, j.nombre, j.apodo, j.posicion,j.es_baja, j.equipoProcedencia_id, (select nombre from equipo where id=equipoProcedencia_id) ep, j.slug';
                                $tabla = 'jugador j';
                                $union = ' INNER JOIN equipo e ON j.equipoActual_id=e.id';
                                $condicion = ' WHERE j.equipoActual_id='.$_GET['equipo_id'];
                                $orden = ' ORDER BY j.posicion, j.nombre';
                                $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden; ?>
			<table width='100%' border='0' cellpadding='1' cellspacing='1' bgcolor='gainsboro'>
				<form method='get' action='fichajes.php'>
					<input type='hidden' name='modo' value='grabar_jugador'>
					<input type='hidden' name='temporada_id' value='<?php echo $_GET['temporada_id']; ?>'>
					<input type='hidden' name='equipo_id' value='<?php echo $_GET['equipo_id']; ?>'>
					<input type='hidden' name='equipoActual_id' value='<?php echo $_GET['equipo_id']; ?>'>
					<tr>
						<td>
							Nombre <input type='text' name='nombre' size='20'>
						</td>
						<td>
							Apodo <input type='text' name='apodo' size='15'>
						</td>
					</tr>
					<tr>
						<td>
							Tipo <select name='posicion'>
								<option value='0'>Sin demarcacion</option>
								<option value='1'>Portero</option>
								<option value='2'>Defensa</option>
								<option value='3'>Centrocampista</option>
								<option value='4'>Delantero</option>
								<option value='5'>Entrenador</option>
							</select>
						</td>
						<td>
							<input type='submit' name='grabar' value='grabar'> Equipo <?php echo $_GET['equipo_id']; ?>
						</td>
					</tr>
				</form>
			</table>
			<table width='100%' border='0' cellpadding='1' cellspacing='1' bgcolor='gainsboro'>
				<tr>
					<td>ID</td>
					<td>Foto</td>
					<td>Nombre</td>
					<td>Apodo</td>
					<td>Posicion</td>
					<td>Baja</td>				  
				</tr>
								<?php
                                $color = 'white';
                                $resultado = mysqli_query($link, $consulta);
                                while ($fila = mysqli_fetch_assoc($resultado)) {
                                    if (isset($_GET['jugador_id'])) {
                                        if ($_GET['jugador_id'] != $fila['id']) {
                                            $color = 'white';
                                        } else {
                                            $color = 'yellow';
                                        }
                                    }
                                    $rutaJugador = '/img/jugadores/jugador'.$fila['id'].'.jpg';
                                    if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaJugador))) {
                                        $rutaJugador = '/img/jugadores/NI.png';
                                    } ?>
				<tr bgcolor="<?php echo $color; ?>">
					<td>
						<a href="?temporada_id=<?php echo $_GET['temporada_id']; ?>&equipo_id=<?php echo $_GET['equipo_id']; ?>&jugador_id=<?php echo $fila['id']; ?>#jugador<?php echo $fila['id']; ?>">
							<?php echo $fila['id']; ?>
						</a>
					</td>
					<td><img src="<?php echo $rutaJugador; ?>" width="50" alt="jugador"></td>
					<td><?php echo $fila['nombre']; ?><br />
					<span style="color:red">
					<?php echo $fila['slug']; ?> 
					<?php if (null !== $fila['ep']) {
                                        ?>
					<br /><span style="color:green"><?php echo $fila['ep']; ?></span>
					<?php
                                    } ?>
					</span>
					</td>
					<td><?php echo $fila['apodo']; ?></td>
					<td><?php echo $fila['posicion']; ?></td>
					<td><?php echo $fila['es_baja']; ?></td>
				</tr>




				<?php
                            if (isset($_GET['jugador_id']) && $_GET['jugador_id'] == $fila['id']) {
                                $campos = 'j.id, j.nombre, j.apodo, j.posicion, j.es_baja, e.nombre equipo, j.pais_id, j.fecha_nacimiento, j.lugar_nacimiento, j.dorsal, j.altura, j.peso, j.caracteristicas, j.palmares, j.es_fichaje, j.slug';
                                $tabla = 'jugador j';
                                $union = ' INNER JOIN equipo e ON j.equipoActual_id=e.id';
                                $condicion = ' WHERE j.id='.$_GET['jugador_id'];
                                $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion;
                                $resultado3 = mysqli_query($link, $consulta);
                                $fila3 = mysqli_fetch_assoc($resultado3);
                                $consultaPaises = 'SELECT id, nombre FROM pais WHERE 1';
                                $resultadoPaises = mysqli_query($link, $consultaPaises); ?>
			<tr><td colspan="7">
			<a  id="jugador<?php echo $fila['id']; ?>"></a>
			<table width='100%' border='0' cellpadding='1' cellspacing='1' bgcolor='gold'>
				<form method='get' action='fichajes.php'>
					<input type='hidden' name='modo' value='modificar_jugador'>
					<input type='hidden' name='temporada_id' value='<?php echo $_GET['temporada_id']; ?>'>
					<input type='hidden' name='equipo_id' value='<?php echo $_GET['equipo_id']; ?>'>
					<input type='hidden' name='jugador_id' value='<?php echo $_GET['jugador_id']; ?>'>
					<tr>
						<td colspan="2">
							Nombre: <input type='text' name='jugador_nombre' size='25' value='<?php echo $fila3['nombre']; ?>'>
						</td>
						<td colspan="2">
							Apodo: <input type='text' name='jugador_apodo' size='15' value='<?php echo $fila3['apodo']; ?>'>
						</td>
					</tr>
					<tr>
						<td>
							Posici&oacute;n: <input type='text' name='jugador_posicion' size='1' value='<?php echo $fila3['posicion']; ?>'>
						</td>						
						<td>
							Dorsal: <input type="text" value="<?php echo $fila3['dorsal']; ?>" name="jugador_dorsal" id="jugador_dorsal" size='1'>
						</td>						
						<td>
							Altura: <input type="text" value="<?php echo $fila3['altura']; ?>" name="jugador_altura" id="jugador_altura" size='3'>
						</td>						
						<td>
							Peso: <input type="text" value="<?php echo $fila3['peso']; ?>" name="jugador_peso" id="jugador_peso" size='3'>
						</td>
					</tr>
					<tr>						
						<td colspan="2">
							F. nacimiento: <input type="date" value="<?php echo $fila3['fecha_nacimiento']; ?>" name="jugador_fecha_nacimiento" id="jugador_fecha_nacimiento">
						</td>
						<td colspan="2">
							L. nacimiento: <input type="text" value="<?php echo $fila3['lugar_nacimiento']; ?>" name="jugador_lugar_nacimiento" id="jugador_lugar_nacimiento">
						</td>
					</tr>
					<tr>
						<td colspan="2">
							Pais: <select name="jugador_pais_id" id="jugador_pais_id">
								<?php while ($pais = mysqli_fetch_assoc($resultadoPaises)) {
                                    ?>
								<option <?php if ($fila3['pais_id'] == $pais['id']) {
                                        ?> selected <?php
                                    } ?> value="<?php echo $pais['id']; ?>"><?php echo $pais['nombre']; ?></option>
								<?php
                                } ?>
							</select>
						</td>
						<td>
							Baja?: <input type='text' name='jugador_baja' size='1' value='<?php echo $fila3['es_baja']; ?>'>
						</td>
						<td>
							Fichaje?: <input type='text' name='jugador_fichaje' size='1' value='<?php echo $fila3['es_fichaje']; ?>'>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							Caracter&iacute;sticas: <textarea name="jugador_caracteristicas" id="jugador_caracteristicas" cols="21" rows="5"  onClick="this.style.height='200px'; this.style.width='300px'"><?php echo $fila3['caracteristicas']; ?></textarea>
						</td>
						<td colspan="2">
							Palmar&eacute;s: <textarea name="jugador_palmares" id="jugador_palmares" cols="21" rows="5"  onClick="this.style.height='200px'; this.style.width='300px'"><?php echo $fila3['palmares']; ?></textarea>
						</td>

					</tr>
					<tr>
						<td colspan="2">
							Procedencia: <input type='text' name='procedencia' size='15' value='<?php echo $fila3['slug']; ?>'>
						</td>
						<td colspan="2">
							<input type='submit' name='modificar' value='modificar'>
						</td>
					</tr>
				</form>
			</table>

			<hr />
			<table width='100%' border='0' cellpadding='1' cellspacing='1' bgcolor='gold'>
				<form method='get' action='fichajes.php'>
					<input type='hidden' name='modo' value='traspasar_jugador'>
					<input type='hidden' name='temporada_id' value='<?php echo $_GET['temporada_id']; ?>'>
					<input type='hidden' name='equipo_id' value='<?php echo $_GET['equipo_id']; ?>'>
					<input type='hidden' name='jugador_id' value='<?php echo $_GET['jugador_id']; ?>'>
					<tr>
						<td><?php echo $fila3['id']; ?> - Nombre <?php echo $fila3['nombre']; ?></td>
						<td>Equipo <?php echo $fila3['equipo']; ?></td>
					</tr>
					<tr>
						<td>Tipo 
							<select name='equipoNuevo_id'>
												<?php
                                                $campos = 'te.temporada_id, e.nombre equipo, e.id';
                                $tabla = 'temporada_equipo te';
                                $union = ' INNER JOIN equipo e ON te.equipo_id=e.id';
                                $condicion = ' WHERE te.temporada_id<25 OR temporada_id=214';
                                $orden = ' ORDER BY te.temporada_id, e.nombre';
                                $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
                                $resultado2 = mysqli_query($link, $consulta);
                                while ($fila2 = mysqli_fetch_assoc($resultado2)) {
                                    ?>
								<option value="<?php echo $fila2['id']; ?>"><?php echo $fila2['temporada_id']; ?> - <?php echo $fila2['equipo']; ?></option>
												<?php
                                } ?>
							</select>
							<br />Fichaje?: <input type='text' name='jugador_fichaje' size='1' value='0'>
							<br />Procedencia: <input type='text' name='procedencia_fichaje' size='15' value=''>
						</td>
						<td>
							<input type='submit' name='traspasar' value='traspasar'>
						</td>
					</tr>
				</form>
			</table>
			</td></tr>
								<?php
                            } ?>
									











									<?php
                                } ?>
			</table>
								<?php
                            }	?>
		</div>
	</div>
</body>
</html>

<script>

	$(document).ready(function(){
		$("#mostrar").on( "click", function() {
			$('#target').show(); //muestro mediante id
			$('.target').show(); //muestro mediante id
		 });
		$("#ocultar").on( "click", function() {
			$('#target').hide(); //oculto mediante id
			$('.target').hide(); //muestro mediante id
		});
	});

</script>
<?php
function borrar_cache2($temporada_id)
                            {
                                $files = glob('../../json/temporada/'.$temporada_id.'/*.*');
                                /*echo "<pre>";
                                print_r($files);
                                echo "</pre>";*/
                                foreach ($files as $file) {
                                    //echo $file."<br />";
                                    unlink($file);
                                }
                            }

function sendTweet2($mensaje)
{
    ini_set('display_errors', 1);
    require_once 'TwitterAPIExchange.php';
    /** Set access tokens here - see: https://dev.twitter.com/apps/ **/
    $settings = array(
            'oauth_access_token' => '484030348-p34m111znom3XsQ8u1SeXCd9SFIbisDnL2MVDmpQ',
            'oauth_access_token_secret' => 'zA6of6tGPhe34yj1D2dXiF9Tj4Na1c5qZvGntjxQQRJ7C',
            'consumer_key' => 'dUNrCSgC4dwbpj5g9Sfmx8j1T',
            'consumer_secret' => 'hiuVRLNNQICMHKAeOgT2ofOGOCUwDChIaqPIATnq2NUs0XwQ0S',
        );

    $url = 'https://api.twitter.com/1.1/statuses/update.json';
    $requestMethod = 'POST';
    /** POST fields required by the URL above. See relevant docs as above **/
    $postfields = array('status' => $mensaje);
    /** Perform a POST request and echo the response **/
    $twitter = new TwitterAPIExchange($settings);

    return $twitter->buildOauth($url, $requestMethod)->setPostfields($postfields)->performRequest();
}

?>