<?php
function mostrar($equipo_id)
{
    ?>
      
		document.write('<?php echo cargar_widget($equipo_id); ?>');
        
    <?php
}

function validar($dominio, $tipo, $id)
{
    $valor = 0;
    //imp($dominio);
    if (strpos($dominio, 'www.google') > -1) {
        echo 'No puedes acceder a este contenido. Consulta con el administrador en futbolme@gmail.com';
        die();
    }
    if (false === strpos($dominio, 'futbolme')) {
        $sql = "SELECT estado FROM widget WHERE dominio='".$dominio."'
		AND tipo_widget='".$tipo."' AND equipo='".$id."'";
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $sql);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);
        if (count($resultado) > 0) {
            $estado = $resultado[0][0];

            if (1 == $estado) {
                $sql = "UPDATE widget SET vistas=vistas+1 WHERE dominio='".$dominio."' AND tipo_widget='".$tipo."' AND equipo='".$id."'";
                $mysqli = conectar();
                $resultadoSQL = mysqli_query($mysqli, $sql);

                $valor = 1;
            }
        } else {
            $sql = "INSERT INTO widget (dominio,tipo_widget, equipo, vistas) 
			VALUES ('".$dominio."','".$tipo."','".$id."','1')";
            $mysqli = conectar();
            $resultadoSQL = mysqli_query($mysqli, $sql);

            $valor = 1;
        }
    } else {
        $valor = 1;
    }

    return $valor;
}

function widget_resultados($equipo_id, $servidor)
{
    $sql = 'SELECT e.nombre, t.nombre torneo_nombre, t.id temporada_id, 
	l.jornadaActiva
	FROM equipo e 
	INNER JOIN temporada_equipo te ON te.equipo_id=e.id
	INNER JOIN temporada t on te.temporada_id=t.id
	INNER JOIN torneo tor on t.torneo_id=tor.id
	INNER JOIN liga l on l.id=tor.id
	WHERE e.id='.$equipo_id.' AND tor.tipo_torneo=1 LIMIT 1';
    //echo $sql;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
    $equipo = $resultado['nombre'];
    $torneo_nombre = $resultado['torneo_nombre'];
    $temporada_id = $resultado['temporada_id'];
    $jornadaActiva = $resultado['jornadaActiva'];
    $jornadaActiva = abs($jornadaActiva);
    $partidos = Xpartidos($temporada_id, $jornadaActiva);



    $totalPartidos = count($partidos);

    if ($totalPartidos > 0) {
        $html = '<div style="text-align:center; font-size: 14px; background-color: #B5DA71;">'.$torneo_nombre.' - Jornada '.$jornadaActiva.'</div>';
        $html .= '<table style="width:100%;border-spacing:0; font-size:12px;">';
        $html .= '<tbody>';

        foreach ($partidos as $partido) {
            $fecha = substr($partido['fecha'], -2).'/'.substr($partido['fecha'], 5, 2);
            $hora = substr($partido['hora_prevista'], 0, 5);
            if ('11' == substr($partido['hora_prevista'], -2)) {
                $hora = ':';
            }
            $colorl = 'color:#424242';
            $colorv = 'color:#424242';
            if ($partido['local'] == $equipo) {
                $colorl = 'color:#0080FF';
            }
            if ($partido['visitante'] == $equipo) {
                $colorv = 'color:#0080FF';
            }

            $enlace1 = $servidor.'/resultados-directo/equipo/'.poner_guion($partido['local']).'/'.$partido['equipoLocal_id'];
            $enlace2 = $servidor.'/resultados-directo/equipo/'.poner_guion($partido['visitante']).'/'.$partido['equipoVisitante_id'];
            $html .= '<tr style=" height:40px;">';
            $html .= '<td align="right" width="43%" style="border: 1px solid gainsboro !important;"><a href="'.$enlace1.'" target="_blank" style="'.$colorl.';text-decoration: none;">'.$partido['localCorto'].'</a></td>';
            if ($partido['estado_partido'] > 0) {
                if (2 == $partido['estado_partido']) {
                    $html .= '<td align="center" width="14%"  style="border: 1px solid gainsboro !important;color:red"><b>'.$partido['goles_local'].'-'.$partido['goles_visitante'].'</b></td>';
                } elseif (3 == $partido['estado_partido']) {
                    $html .= '<td align="center" width="14%"  style="border: 1px solid gainsboro !important;color:#B45F04"><b>Susp.</b></td>';
                } elseif (4 == $partido['estado_partido']) {
                    $html .= '<td align="center" width="14%"  style="border: 1px solid gainsboro !important;color:#B45F04"><b>Aplz.</b></td>';
                } else {
                    $html .= '<td align="center" width="14%"  style="border: 1px solid gainsboro !important;color:black"><b>'.$partido['goles_local'].'-'.$partido['goles_visitante'].'</b></td>';
                }
            } else {
                $html .= '<td align="center" width="14%" style="border: 1px solid gainsboro !important;"><div style="font-size:10px; padding-top:2px">'.$fecha.'</div><div class="hora_resultados">'.$hora.'</div></td>';
            }
            $html .= '<td align="left" width="43%" style="border: 1px solid gainsboro !important;"><a href="'.$enlace2.'" target="_blank" style="'.$colorv.'; text-decoration: none;">'.$partido['visitanteCorto'].'</a></td>';
            $html .= '</tr>';
        }

        $html .= '</tbody></table>';
    } else {
        $html = 'Todavía no tenemos el calendario de este equipo';
    }

    return $html;
}

//******************PARTIDO*****************************************

function widget_partido($equipo_id, $servidor)
{
    $fecha = new \DateTime();
    $diasAntes = new \DateTime();
    $hoy = $fecha->format('Y-m-d');

    $diasAntes = \DateTime::createFromFormat('Y-m-d', $hoy);
    $diasAntes = $diasAntes->modify('-2 day')->format('Y-m-d');

    $sql = "SELECT p.id,p.temporada_id,p.estado_partido,p.jornada,
fa.nombre fase,p.fecha,p.hora_prevista,p.clasificado, p.acta,
p.goles_local,p.goles_visitante,p.arbitro_id,
ec.nombreCorto local, p.equipoLocal_id,
ef.nombreCorto visitante, p.equipoVisitante_id, p.comentarios,
te.nombre nombreTemporada, tor.tipo_torneo,
a.nombre nombreArbitro,
a.apellidos apellidosArbitro,
e.nombre estadioNombre,
e.id estadio_imagen, 
l.nombre localidad,
co.id comunidad_imagen,
pa.id pais_imagen
FROM partido p 
INNER JOIN equipo ec ON p.equipoLocal_id=ec.id
INNER JOIN equipo ef ON p.equipoVisitante_id=ef.id
INNER JOIN fase fa ON p.jornada=fa.id
INNER JOIN temporada te ON p.temporada_id=te.id
INNER JOIN torneo tor ON te.torneo_id=tor.id
LEFT JOIN arbitro a ON a.id=p.arbitro_id
LEFT JOIN estadio e ON e.id=ec.estadio_id
LEFT JOIN localidad l ON l.id=e.localidad_id
INNER JOIN comunidad co ON co.id=tor.comunidad_id
INNER JOIN pais pa ON pa.id=tor.pais_id
WHERE p.fecha>'".$diasAntes."' 
AND (p.equipoLocal_id=".$equipo_id.' OR p.equipoVisitante_id='.$equipo_id.') ORDER BY fecha';

    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_BOTH);

    $tipo_torneo = $resultado['tipo_torneo'];
    $torneo_nombre = $resultado['nombreTemporada'];
    $estado_partido = $resultado['estado_partido'];
    $jornada = 'Jornada '.$resultado['jornada'];
    $temporada_id = $resultado['temporada_id'];
    $partido_id = $resultado['id'];

    $color = 'black';
    $rl = $resultado['goles_local'];
    $rv = $resultado['goles_visitante'];

    if (0 == $estado_partido) {
        $rl = '-';
        $rv = '-';
    } elseif (2 == $estado_partido) {
        $color = 'red';
        $path = '../json/directos.json';
        $json = file_get_contents($path);
        $directos = json_decode($json, true);
        foreach ($directos as $key => $directo) {
            if ($key == $temporada_id) {
                if (isset($directos[$key]['partidos'])) {
                    foreach ($directos[$key]['partidos'] as $fila) {
                        if ($partido_id == $fila['partido_id']) {
                            $rl = $fila['goles_local'];
                            $rv = $fila['goles_visitante'];
                        }
                    }
                }
            }
        }
    } elseif (3 == $estado_partido) {
        $rl = 'A';
        $rv = 'P';
        $color = 'tomato';
    } elseif (4 == $estado_partido) {
        $rl = 'S';
        $rv = 'P';
        $color = 'tomato';
    }

    $hora = ' a las '.substr($resultado['hora_prevista'], 0, 5);
    if ('11' == substr($resultado['hora_prevista'], -2)) {
        $hora = '';
    }

    if (2 == $tipo_torneo) {
        $jornada = $resultado['fase'];
    }

    $html = '<div style="text-align:center; font-size: 14px; background-color: #B5DA71;">'.$torneo_nombre.' - '.$jornada.'</div>';

    $html .= '<table style="width:100%;">';

    $html .= '<tbody class="whitebox">';
    $enlace1 = $servidor.'/resultados-directo/equipo/'.poner_guion($resultado['local']).'/'.$resultado['equipoLocal_id'];
    $enlace2 = $servidor.'/resultados-directo/equipo/'.poner_guion($resultado['visitante']).'/'.$resultado['equipoVisitante_id'];
    $html .= '<tr style="background-color:silver;"><td colspan="2" width="50%" align="left" style="font-size:16px; font-weight:bold">'.$resultado['local'].'</td><td colspan="2" width="50%" align="right" style="font-size:16px; font-weight:bold">'.$resultado['visitante'].'</td></tr>';
    $html .= '<tr><td align="center" style="width:33%"><img src="https://futbolme.com/img/equipos/escudo'.$resultado['equipoLocal_id'].'.png" style="width:100%; max-width:75px;"></td>';
    $html .= '<td align="center" colspan="2" style="width:34%"><span style="font-size:40px;font-weight:bold; color:'.$color.';">'.$rl.'</span><span style="font-size:40px;font-weight:bold; color:navy;">-</span><span style="font-size:40px;font-weight:bold; color:'.$color.';">'.$rv.'</span></td>';
    $html .= '<td align="center" style="width:33%"><img src="https://futbolme.com/img/equipos/escudo'.$resultado['equipoVisitante_id'].'.png" style="width:100%; max-width:75px;"></td></tr>';
    if ($resultado['arbitro_id'] > 1) {
        $html .= '<tr><td colspan="4" align="center">Árbitro: '.$resultado['nombreArbitro'].' '.$resultado['apellidosArbitro'].'</td></tr>';
    }
    if ($resultado['estadio_imagen'] > 0) {
        $html .= '<tr><td colspan="4" align="center">Estadio: '.$resultado['estadioNombre'].' ('.$resultado['localidad'].')</td></tr>';
    }
    $html .= '<tr><td colspan="4" align="center">'.utf8_encode(nombreDia($resultado['fecha'])).' '.$hora.' <a href="https://futbolme.com/partido.php?id='.$resultado['id'].'" target="blank">+Info</a></td></tr>';
    $html .= '</tbody></table>';

    return $html;
}

//******************CLASIFICACION*****************************************

function widget_clasificacion($equipo_id, $servidor)
{
    $sql = 'SELECT e.nombreCorto nombre, t.nombre torneo_nombre, t.id temporada_id, 
	l.jornadaActiva
	FROM equipo e 
	INNER JOIN temporada_equipo te ON te.equipo_id=e.id
	INNER JOIN temporada t on te.temporada_id=t.id
	INNER JOIN torneo tor on t.torneo_id=tor.id
	INNER JOIN liga l on l.id=tor.id
	WHERE e.id='.$equipo_id.' AND tor.tipo_torneo=1 LIMIT 1';
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
    $equipo = $resultado['nombre'];
    $torneo_nombre = $resultado['torneo_nombre'];
    $temporada_id = $resultado['temporada_id'];
    $jornadaActiva = $resultado['jornadaActiva'];
    $jornadaActiva = abs($jornadaActiva);

    if (@file_exists('../json/temporada/'.$temporada_id.'/tipo.json')) {
        $json = file_get_contents('../json/temporada/'.$temporada_id.'/tipo.json');
        $datos = json_decode($json, true);
        $clasificacion=$datos['clasificacion'];
    } else {
        die('error al cargar widget');
    }

    $html = '<div style="width:100%; float:left;background-color: #B5DA71; font-size:14px; text-align:center;"> '.$torneo_nombre.' Jornada '.$jornadaActiva.'</div>';

    $html .= '<table style="width:100%; border-spacing:0; font-size:12px">';
    $html .= '<thead><tr>';
    $html .= '<th align="center" style="width:7%">Pos</th>';
    $html .= '<th align="center" style="width:44%">Equipo</th>';
    $html .= '<th align="center" style="width:7%">Pts</th>';
    $html .= '<th align="center" style="width:7%">J</th>';
    $html .= '<th align="center" style="width:7%">G</th>';
    $html .= '<th align="center" style="width:7%">E</th>';
    $html .= '<th align="center" style="width:7%">P</th>';
    $html .= '<th align="center" style="width:7%">GF</th>';
    $html .= '<th align="center" style="width:7%">GC</th>';
    $html .= '</tr></thead>';
    $html .= '<tbody class="whitebox">';

    foreach ($clasificacion['clasificacionFinal'] as $fila) {
        $color_fondo = 'white';
        $colore = 'color:#337ab7;';
        if ($fila['equipo_id'] == $equipo_id) {
            $colore = 'color:#610B0B';
        }

        $enlace1 = $servidor.'/resultados-directo/equipo/'.poner_guion($fila['nombre']).'/'.$fila['equipo_id'];
        if (isset($fila['preferente'])) {
            if (1 == $fila['preferente']) {
                $color_fondo = 'yellow';
            }
        }
        $html .= '<tr><td align="center" style="border: 1px solid gainsboro; '.$fila['css'].'">'.$fila['posicion'].'</td>';
        $html .= '<td align="left" bgcolor="white" style="border: 1px solid gainsboro;"><a href="'.$enlace1.'" style="'.$colore.'; text-decoration: none;" target="blank"> <b>'.$fila['nombreCorto'].'</b></a></td>';
        $html .= '<td align="center" style="border: 1px solid gainsboro !important;background-color:'.$color_fondo.'; color:black;"><b>'.$fila['puntos'].'</b></td>';
        $html .= '<td align="center" style="border: 1px solid gainsboro !important;background-color:'.$color_fondo.'; color:black;">'.$fila['jugados'].'</td>';
        $html .= '<td align="center" style="border: 1px solid gainsboro !important;background-color:'.$color_fondo.'; color:black;">'.$fila['ganados'].'</td>';
        $html .= '<td align="center" style="border: 1px solid gainsboro !important;background-color:'.$color_fondo.'; color:black;">'.$fila['empatados'].'</td>';
        $html .= '<td align="center" style="border: 1px solid gainsboro !important;background-color:'.$color_fondo.'; color:black;">'.$fila['perdidos'].'</td>';
        $html .= '<td align="center" style="border: 1px solid gainsboro !important;background-color:'.$color_fondo.'; color:black;">'.$fila['gFavor'].'</td>';
        $html .= '<td align="center" style="border: 1px solid gainsboro !important;background-color:'.$color_fondo.'; color:black;">'.$fila['gContra'].'</td>';
        $html .= '</tr>';
    }

    $html .= '</tbody></table>';

    $html .= '<div style="width:100%; float:left; max-width:300px">';
    foreach ($clasificacion['leyenda'] as $fila) {
        $html .= '<div style="color:'.$fila['color'].';background-color:'.$fila['fondo'].'" class="letra2"> '.$fila['leyenda'].' </div>';
    }
    $html .= '</div>';

    return $html;
}

//******************PALMARES*****************************************

function cargar_widget($equipo_id, $servidor)
{
    $tipo = 0;

    //$data->type='2-1';
    switch ($tipo) {
    case 0:
        //Resultados completo
        $width = 300;
        $fsize = 14;
    break;
}

    $sql = 'SELECT nombre FROM equipo WHERE id='.$equipo_id;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);
    $equipo = $resultado[0][0];

    $palmares = equipoPalmares($equipo_id);
    $p = $palmares['nacional'][0];

    $totalpalmares = 1;
    if ($p['participacionescopa'] > 0) {
        $totalpalmares = ($totalpalmares + 1);
    }
    if ($p['participacionespromo2'] > 0) {
        $totalpalmares = ($totalpalmares + 1);
    }
    if ($p['participacionespromo2camp'] > 0) {
        $totalpalmares = ($totalpalmares + 1);
    }
    if ($p['participacionespromo2b'] > 0) {
        $totalpalmares = ($totalpalmares + 1);
    }
    if ($p['participaciones1'] > 0) {
        $totalpalmares = ($totalpalmares + 1);
    }
    if ($p['participaciones2'] > 0) {
        $totalpalmares = ($totalpalmares + 1);
    }
    if ($p['participaciones2b'] > 0) {
        $totalpalmares = ($totalpalmares + 1);
    }
    if ($p['participaciones3'] > 0) {
        $totalpalmares = ($totalpalmares + 1);
    }

    $p['participacionespromo2'] = $p['participacionespromo2'] + $p['participacionespromo2camp'];

    //segunda
    if (62 == $equipo_id) {
        $p['participacionespromo2'] = ($p['participacionespromo2'] - 1);
    }
    if (525 == $equipo_id) {
        $p['participacionespromo2'] = ($p['participacionespromo2'] - 1);
    }
    //segunda b
    if (118 == $equipo_id) {
        $p['participacionespromo2b'] = ($p['participacionespromo2b'] - 1);
    }
    if (618 == $equipo_id) {
        $p['participacionespromo2b'] = ($p['participacionespromo2b'] - 1);
    }
    if (557 == $equipo_id) {
        $p['participacionespromo2b'] = ($p['participacionespromo2b'] - 1);
    }
    if (356 == $equipo_id) {
        $p['participacionespromo2b'] = ($p['participacionespromo2b'] - 1);
    }
    if (466 == $equipo_id) {
        $p['participacionespromo2b'] = ($p['participacionespromo2b'] - 1);
    }
    if (391 == $equipo_id) {
        $p['participacionespromo2b'] = ($p['participacionespromo2b'] - 1);
    }
    if (75 == $equipo_id) {
        $p['participacionespromo2b'] = ($p['participacionespromo2b'] - 1);
    }

    $posiciones = equipoPosiciones($equipo_id);

    $ancho = round(((100 / $totalpalmares) * 100) / 100); //B5DA71

    $html = '<div style="background-color: #B5DA71;"><a href="'.$servidor.'/resultados-directo/equipo/'.poner_guion($equipo).'/'.$equipo_id.'" target="_blank" style="text-decoration: none;"><span style="font-size:16px; font-weight:bold;">'.$equipo.'</span></a> - <span style="font-size:16px; text-align:right">Palmar&eacute;s</span></div>';
    $html .= '<table style="width:100%;">';
    $html .= '<thead>';
    $html .= '<tr>';
    $html .= '<th align="center" style="width:'.$ancho.'%">-</th>';
    if ($p['participaciones1'] > 0) {
        $html .= '<th align="center" style="width:'.$ancho.'%" title="Primera Divisi&oacute;n">1&ordf;</th>';
    }
    if ($p['participaciones2'] > 0) {
        $html .= '<th align="center" style="width:'.$ancho.'%" title="Segunda Divisi&oacute;n">2&ordf;</th>';
    }
    if ($p['participacionespromo2'] > 0) {
        $html .= '<th align="center" style="width:'.$ancho.'%" title="Promoci&oacute;n a Segunda Divisi&oacute;n">Pro2&ordf;</th>';
    }
    if ($p['participaciones2b'] > 0) {
        $html .= '<th align="center" style="width:'.$ancho.'%" title="Segunda Divisi&oacute;n B">2&ordf;B</th>';
    }
    if ($p['participacionespromo2b'] > 0) {
        $html .= '<th align="center" style="width:'.$ancho.'%" title="Promoci&oacute;n a Segunda Divisi&oacute;n B">Pro2&ordf;B</th>';
    }
    if ($p['participaciones3'] > 0) {
        $html .= '<th align="center" style="width:'.$ancho.'%" title="Tercera Divisi&oacute;n">3&ordf;</th>';
    }
    if ($p['participacionescopa'] > 0) {
        $html .= '<th align="center" style="width:'.$ancho.'%" title="Copa de Espa&ntilde;a">Copa</th>';
    }
    $html .= '</tr></thead>';
    $html .= '<tbody class="whitebox"><tr><td class="text-center letra">Part</td>';
    if ($p['participaciones1'] > 0) {
        $enlace = '/historico-liga/titulos/primera-division/'.poner_guion($equipo).'/'.$equipo_id.'/1';
        $html .= '<td align="center"><a href="https://futbolme.com'.$enlace.'" target="_blank">'.$p['participaciones1'].'</a></td>';
    }
    if ($p['participaciones2'] > 0) {
        $enlace = '/historico-liga/titulos/segunda-division/'.poner_guion($equipo).'/'.$equipo_id.'/2';
        $html .= '<td align="center"><a href="https://futbolme.com'.$enlace.'" target="_blank">'.$p['participaciones2'].'</a></td>';
    }
    if ($p['participacionespromo2'] > 0) {
        $enlace = '/historico/promocion2b/index.php?equipo_id='.$equipo_id.'&pest=equipo';
        $html .= '<td align="center"><a href="https://futbolme.com'.$enlace.'" target="_blank">'.$p['participacionespromo2'].'</a></td>';
    }
    if ($p['participaciones2b'] > 0) {
        $enlace = '/historico-liga/titulos/segunda-division-b/'.poner_guion($equipo).'/'.$equipo_id.'/3';
        $html .= '<td align="center"><a href="https://futbolme.com'.$enlace.'" target="_blank">'.$p['participaciones2b'].'</a></td>';
    }
    if ($p['participacionespromo2b'] > 0) {
        $enlace = '/historico/promocion3/index.php?equipo_id='.$equipo_id.'&pest=equipo';
        $html .= '<td align="center"><a href="https://futbolme.com'.$enlace.'" target="_blank">'.$p['participacionespromo2b'].'</a></td>';
    }
    if ($p['participaciones3'] > 0) {
        $enlace = '/historico-liga/titulos/tercera-division/'.poner_guion($equipo).'/'.$equipo_id.'/4';
        $html .= '<td align="center"><a href="https://futbolme.com'.$enlace.'" target="_blank">'.$p['participaciones3'].'</a></td>';
    }
    if ($p['participacionescopa'] > 0) {
        $enlace = '/historico-copa-participaciones/'.poner_guion($equipo).'/'.$equipo_id;
        $html .= '<td align="center"><a href="https://futbolme.com'.$enlace.'" target="_blank">'.$p['participacionescopa'].'</a></td>';
    }
    $html .= '</tr><tr><td class="text-center letra">Camp</td>';
    if ($p['participaciones1'] > 0) {
        if (0 == $p['campeon1']) {
            $p['campeon1'] = '';
        }
        $enlace = '/historico-liga/titulos/primera-division/'.poner_guion($equipo).'/'.$equipo_id.'/1';
        $html .= '<td align="center"><a href="https://futbolme.com'.$enlace.'" target="_blank">'.$p['campeon1'].'</a></td>';
    }
    if ($p['participaciones2'] > 0) {
        if (0 == $p['campeon2']) {
            $p['campeon2'] = '';
        }
        $enlace = '/historico-liga/titulos/segunda-division/'.poner_guion($equipo).'/'.$equipo_id.'/2';
        $html .= '<td align="center"><a href="https://futbolme.com'.$enlace.'" target="_blank">'.$p['campeon2'].'</a></td>';
    }
    if ($p['participacionespromo2'] > 0) {
        $html .= '<td align="center"></td>';
    }
    if ($p['participaciones2b'] > 0) {
        if (0 == $p['campeon2b']) {
            $p['campeon2b'] = '';
        }
        $enlace = '/historico-liga/titulos/segunda-division-b/'.poner_guion($equipo).'/'.$equipo_id.'/3';
        $html .= '<td align="center"><a href="https://futbolme.com'.$enlace.'" target="_blank">'.$p['campeon2b'].'</a></td>';
    }
    if ($p['participacionespromo2b'] > 0) {
        $html .= '<td align="center"></td>';
    }
    if ($p['participaciones3'] > 0) {
        if (0 == $p['campeon3']) {
            $p['campeon3'] = '';
        }
        $enlace = '/historico-liga/titulos/tercera-division/'.poner_guion($equipo).'/'.$equipo_id.'/4';
        $html .= '<td align="center"><a href="https://futbolme.com'.$enlace.'" target="_blank">'.$p['campeon3'].'</a></td>';
    }
    if ($p['participacionescopa'] > 0) {
        if (0 == $p['campeoncopa']) {
            $p['campeoncopa'] = '';
        }
        $enlace = '/historico-copa-campeon/'.poner_guion($equipo).'/'.$equipo_id;
        $html .= '<td align="center"><a href="https://futbolme.com'.$enlace.'" target="_blank">'.$p['campeoncopa'].'</a></td>';
    }
    $html .= '</tr><tr><td class="text-center letra">Subc</td>';
    if ($p['participaciones1'] > 0) {
        if (0 == $p['subcampeon1']) {
            $p['subcampeon1'] = '';
        }
        $enlace = '/historico-liga/titulos/primera-division/'.poner_guion($equipo).'/'.$equipo_id.'/1';
        $html .= '<td align="center"><a href="https://futbolme.com'.$enlace.'" target="_blank">'.$p['subcampeon1'].'</a></td>';
    }
    if ($p['participaciones2'] > 0) {
        if (0 == $p['subcampeon2']) {
            $p['subcampeon2'] = '';
        }
        $enlace = '/historico-liga/titulos/segunda-division/'.poner_guion($equipo).'/'.$equipo_id.'/2';
        $html .= '<td align="center"><a href="https://futbolme.com'.$enlace.'" target="_blank">'.$p['subcampeon2'].'</a></td>';
    }
    if ($p['participacionespromo2'] > 0) {
        $html .= '<td align="center"></td>';
    }
    if ($p['participaciones2b'] > 0) {
        if (0 == $p['subcampeon2b']) {
            $p['subcampeon2b'] = '';
        }
        $enlace = '/historico-liga/titulos/segunda-division-b/'.poner_guion($equipo).'/'.$equipo_id.'/3';
        $html .= '<td align="center"><a href="https://futbolme.com'.$enlace.'" target="_blank">'.$p['subcampeon2b'].'</a></td>';
    }
    if ($p['participacionespromo2b'] > 0) {
        $html .= '<td align="center"></td>';
    }
    if ($p['participaciones3'] > 0) {
        if (0 == $p['subcampeon3']) {
            $p['subcampeon3'] = '';
        }
        $enlace = '/historico-liga/titulos/tercera-division/'.poner_guion($equipo).'/'.$equipo_id.'/4';
        $html .= '<td align="center"><a href="https://futbolme.com'.$enlace.'" target="_blank">'.$p['subcampeon3'].'</a></td>';
    }
    if ($p['participacionescopa'] > 0) {
        if (0 == $p['subcampeoncopa']) {
            $p['subcampeoncopa'] = '';
        }
        $enlace = '/historico-copa-subcampeon/'.poner_guion($equipo).'/'.$equipo_id;
        $html .= '<td align="center" wtd><a href="https://futbolme.com'.$enlace.'" target="_blank">'.$p['subcampeoncopa'].'</a></td>';
    }
    $html .= '</tr></tbody></table><br /></div>';
    $html .= '<div style="width:100%; max-height:200px; max-width:300px;  overflow:auto; border:dimgray 1px solid;">';
    $html .= '<table style="width:100%;">';
    $html .= '<tr bgcolor="#336633"><td style="color:#FFF; text-align:center">Pos.</td><td style="color:#FFF; text-align:center">Temporada</td><td style="color:#FFF; text-align:center">Div.</td></tr>';

    foreach ($posiciones as $key => $fila) {
        switch ($fila['idDivision']) {
            case '1':
                $dd = '1&ordf;'; $color_f = '#FFD700'; $txtDivision = 'Primera Divisi&oacute;n';
                break;
            case '2':
                $dd = '2&ordf;'; $color_f = '#E6E6FA'; $txtDivision = 'Segunda Divisi&oacute;n';
                break;
            case '3':
                $dd = '2&ordf;B'; $color_f = '#FFE4B5'; $txtDivision = 'Segunda Divisi&oacute;n B';
                break;
            case '4':
                $dd = '3&ordf;'; $color_f = '#D8BFD8'; $txtDivision = 'Tercera Divisi&oacute;n';
                break;
        }

//        $t=$fila['temporada'];
        $t = $fila['temporada'].'-'.substr(($fila['temporada'] + 1), -2);

        $html .= '<tr style="background-color:'.$color_f.'"><td align="center" style="border:dimgray 1px solid;">'.$fila['posicion'].'&ordm;</td><td align="center" style="border:dimgray 1px solid;">';
        $enlace = '/historico-liga/'.poner_guion($t).'/torneo/'.trim(poner_guion($txtDivision)).'/'.$fila['temporada_id'].'/'.$t.'/'.$txtDivision;

        $html .= '<a href="https://futbolme.com'.$enlace.'" target="_blank">'.$t.'</a></td><td align="center" style="border:dimgray 1px solid;">'.$dd.'</td></tr>';
    }
    $html .= '</table>';

    return $html;
}
