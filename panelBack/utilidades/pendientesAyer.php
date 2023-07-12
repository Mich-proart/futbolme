<?php 
$static_v = 6; 
define('_FUTBOLME_', 1);

require_once '../../src/consultas.php';
require_once '../../src/funciones.php';



?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<link href="/css/bootstrap.min.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/main.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/style.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<noscript><link rel="stylesheet" href="/css/allcss.css?v=<?php echo $static_v; ?>"></noscript>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/js/ajax.js?=<?php echo $static_v; ?>"></script>
</head>

<body>

<div style="width: 100%; float:left; padding:5px; background-color: white">

 <?php 

 /*
equipos con usuarios.
 select count(ue.equipo_id), ue.equipo_id, e.nombre, e.categoria_id
from usuario_equipo ue 
inner join equipo e on ue.equipo_id=e.id
group by ue.equipo_id order by count(ue.equipo_id) desc

*/

 $mysqli = conectar();



$diaN = date('N');

$fecha=date('2019-10-12');
$h='';
$partidos = partidosTodos($fecha);

$consulta='SELECT count(id) actualizados FROM torneo WHERE estado=100';
$resultadoSQL = mysqli_query($mysqli, $consulta);
$r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
echo 'Torneos actualizados='.$r['actualizados']; 


$sinFinalizar=array(); ?>

<table>
  <tr>
    <td valign="top">
<?php

if ($diaN>5){
  echo '<h1>Partidos para hoy en las próximas 2 horas</h1>';
} else {
  echo '<h1>Partidos para hoy</h1>';
}


foreach ($partidos as $key=> $partido) {   

  $temporada_id=$partido['temporada_id'];
  $jornada=$partido['jornada'];
  $comunidad_id=($partido['comunidad_id']-1);
  $competicion_id=$partido['apiRFEFcompeticion'];
  $grupo_id=$partido['apiRFEFgrupo'];
  $fase=$partido['apifutbol'];  

  $partido['hora_real']=$partido['hora_real']??'00:00:00';
  $comentarios=$partido['comentario']??'';
  $clasificado=$partido['clasificado']??0;
  $partido['betsapi']=$partido['betsapi']??0;
  $parte=0;$minutos=0;
  $pagina='';$colorL='black';$colorV='black';
  $fondocolorL="white";$fondocolorV="white";


  $fecha1 = date('Y-m-d H:i:s');
  $fecha1 = date_create($fecha1); //hora actual
  $fecha2 = date($partido['fecha'].' '.$partido['hora_real']); 
  $fecha2 = date_create($fecha2); // hora comienzo real
  $fecha3 = date($partido['fecha'].' '.$partido['hora_prevista']);
  $fecha3 = date_create($fecha3); //hora prevista
  $dPartido = date_diff($fecha3, $fecha1);

  //imp($dPartido);

  
  $diasP = $dPartido->d;
  $horasP = $dPartido->h;
  $minutosP = $dPartido->i;
  $segundosP = $dPartido->s;
  $invertidoP = $dPartido->invert;
  $mHP=($horasP*60)+$minutosP;
  if ($diasP>0){ $mHP=$mHP+1000; } //se añade un valor para que supere los 105 del corte

  

    if ($invertidoP==0 && ((int)$partido['estado_partido']==0 || (int)$partido['estado_partido']>2) ) {
      $sinFinalizar[$partido['temporada_id']][$partido['jornada']]['temporada_nombre']=$partido['temporada_nombre']; 
        $sinFinalizar[$partido['temporada_id']][$partido['jornada']]['apifutbol']=$partido['apifutbol']; 
        $sinFinalizar[$partido['temporada_id']][$partido['jornada']]['apiRFEFcompeticion']=$partido['apiRFEFcompeticion']; 
        $sinFinalizar[$partido['temporada_id']][$partido['jornada']]['apiRFEFgrupo']=$partido['apiRFEFgrupo']; 
        $sinFinalizar[$partido['temporada_id']][$partido['jornada']]['comunidad_id']=$partido['comunidad_id'];
        $sinFinalizar[$partido['temporada_id']][$partido['jornada']]['pais']=$partido['pais'];
        $sinFinalizar[$partido['temporada_id']][$partido['jornada']]['partidos'][]=$partido;    
    } else {
      echo '<hr />'.$partido['temporada_nombre'].' - Jornada '.$partido['jornada'].'<br />';
      echo $partido['fecha'].' <b>'.$partido['hora_prevista'].'</b> '.$partido['local'].' - '.$partido['visitante'].' ---- <b>'.$partido['estado_partido'].'</b><br />';  
    }

    $h = $partido['hora_prevista'];    
} ?>

</td>
<td valign="top">
<?php echo '<h1>Partidos pendientes</h1>';

$contador=0;$aplazados=0;
foreach ($sinFinalizar as $torneos) {

    
    foreach ($torneos as $key => $torneo) {  
      
        echo '<hr />'.$torneo['pais'].' - '.$torneo['temporada_nombre'].' - Jornada '.$key.'<br />';
        foreach ($torneo['partidos'] as $kp => $vp) {


            $fila['partido_id']=$vp['partido_id'];
            $fila['temporada_id']=$vp['temporada_id'];
            $fila['jornada']=$key;
            $fila['estado_partido']=$vp['estado_partido'];
            $fila['fecha']=$vp['fecha'];
            $fila['hora_prevista']=$vp['hora_prevista'];
            $fila['goles_local']=0;
            $fila['goles_visitante']=0;
            $fila['ncLocal']=$vp['local'];
            $fila['ncVisitante']=$vp['visitante']; 
            $fila['equipoLocal_id']=$vp['equipoLocal_id'];
            $fila['equipoVisitante_id']=$vp['equipoVisitante_id'];
            $fila['apiRFEFcompeticion']=$vp['apiRFEFcompeticion'];
            $fila['apiRFEFgrupo']=$vp['apiRFEFgrupo'];
            $fila['temporada_nombre']=$vp['temporada_nombre'];

          if ($fila['estado_partido']==0){ 
            $colorTr='white';$contador++; 
          } else { 
            $colorTr='gainsboro';$aplazados++; continue; 
          }
            ?>

<form method="post" class="formulario" id="form<?php echo $fila['partido_id']; ?>" onsubmit="submitForm(event, $(this).serialize(),0)">
<table bgcolor="gainsboro"> 
    <tr bgcolor="<?php echo $colorTr?>">
    <input type="hidden" name="id[]" value="<?php echo $fila['partido_id']; ?>">
    <input type="hidden" name="temporada_id[]" value="<?php echo $fila['temporada_id']; ?>">
    <input type="hidden" name="jornada[]" value="<?php echo $fila['jornada']; ?>">
    <input type="hidden" name="or_estado_partido[]" value="<?php echo $fila['estado_partido']; ?>">
    <input type="hidden" name="or_fecha[]" value="<?php echo $fila['fecha']; ?>">
    <input type="hidden" name="or_hora_prevista[]" value="<?php echo $fila['hora_prevista']; ?>">
    <input type="hidden" name="or_goles_local[]" value="<?php echo $fila['goles_local']; ?>">
    <input type="hidden" name="or_goles_visitante[]" value="<?php echo $fila['goles_visitante']; ?>">
    <input type="hidden" name="local[]" value="<?php echo $fila['ncLocal']; ?>">
    <input type="hidden" name="visitante[]" value="<?php echo $fila['ncVisitante']; ?>">
    <input type="hidden" name="equipoLocal_id[]" value="<?php echo $fila['equipoLocal_id']; ?>">
    <input type="hidden" name="equipoVisitante_id[]" value="<?php echo $fila['equipoVisitante_id']; ?>">
    <td class="estado"><select name="estado_partido[]">
    <option value="0" <?php if (0 == $fila['estado_partido']) { echo 'selected';} ?>>No jugado</option>
    <option value="1" <?php if (1 == $fila['estado_partido']) { echo 'selected';} ?>>FINAL</option>
    <option value="2" <?php if (2 == $fila['estado_partido']) { echo 'selected';} ?>>En juego</option>
    <option value="3" <?php if (3 == $fila['estado_partido']) { echo 'selected';} ?>>Suspendido</option>
    <option value="4" <?php if (4 == $fila['estado_partido']) { echo 'selected';} ?>>Aplazado</option>
    <option value="5" <?php if (5 == $fila['estado_partido']) { echo 'selected';} ?>>Anulado</option>
    <option value="6" <?php if (6 == $fila['estado_partido']) { echo 'selected';} ?>>Descanso</option>
    </select></td>
    <td align="right"><?php echo $fila['ncLocal'];?></td>
    <td align="center" width="10"><input type="text" name="goles_local[]" value="<?php echo $fila['goles_local']; ?>" size="2" style="text-align: center"></td>
    <td align="center" width="10"><input type="text" name="goles_visitante[]" value="<?php echo $fila['goles_visitante']; ?>" size="2" style="text-align: center"></td>
    <td><?php echo $fila['ncVisitante'];?></td>
    <td class="fecha"><input class="fecha_input" type="text" name="fecha[]" value="<?php echo $fila['fecha']; ?>" size="10"></td>
    <td class="hora"><input class="hora_input" type="text" name="hora_prevista[]" value="<?php echo $fila['hora_prevista']; ?>" size="10"></td>
    <td><input type="submit" name="grabar" value="Grabar"></td>
    <td>
      <?php echo '<a href="/temporada.php?id='.$vp['temporada_id'].'" target="_blank">Tmp</a> - <a href="/partido.php?id='.$vp['partido_id'].'" target="_blank">Pdo</a> - <a href="/panelBack/federacion/index.php?comunidad_id='.($vp['comunidad_id']-1).'" target="_blank">com</a>';?>

    </td>
    </tr>
    


    
        <input type="hidden" name="partidos" value="1">    
        <tr bgcolor="yellow">
            <td colspan="9" align="center">
                <?php

                  $comunidad_id=($torneo['comunidad_id']-1);
                  $competicion_id=$torneo['apiRFEFcompeticion'];
                  $grupo_id=$torneo['apiRFEFgrupo'];
                  $fase=$torneo['apifutbol'];
                  if ($comunidad_id>0){
                      
                      include ('../../panelBack/federacion/funciones/urlFederaciones.php');

                      if ($carpeta=='00pnfg'){
                      $url.='CodCompeticion='.$competicion_id.'&CodGrupo='.$grupo_id.'&CodJornada='.$fila['jornada'];
                      }

                      if ($carpeta=='00isquad'){
                      $url.='id_competicion='.$competicion_id.'&id_fase='.$fase.'&id_grupo='.$grupo_id.'&jornada='.$fila['jornada'];
                      }
                  }  

                if (isset($url)){ ?>
                    <a href="<?php echo $url?>" target="_blank"><b>Federación</b></a>
                <?php } ?>
                <?php if (isset($urlh)){ ?>
                    - <a href="<?php echo $urlh?>" target="_blank"><b>Horarios</b></a>
                <?php } ?>
            </td>
        </tr>
            </table>
            </form><hr />
            
        <?php }
    }
}

echo '<h3>Partidos pendientes: '.$contador.' - Aplazados: '.$aplazados.'</h3>';?>

</td>
</tr></table>  
 </div>
</body>
</html>




<?php
function partidosTodos($fecha)
{
    $campos = 'p.id partido_id, p.estado_partido, p.fase_id, p.partidoAPI, p.temporada_id,
    p.equipoLocal_id, p.equipoVisitante_id, p.hora_real, p.observaciones, p.codigo_acta, 
    p.goles_local, p.goles_visitante, p.fecha, p.comentario, p.betsapi,ec.federacion_id fed_l,ef.federacion_id fed_v, pa.nombre pais, 
    p.hora_prevista, ec.nombre local, ef.nombre visitante, p.jornada,
    te.nombre temporada_nombre, tor.apifutbol, tor.apiRFEFcompeticion, tor.apiRFEFgrupo, tor.comunidad_id';
    $tabla = ' partido p';
    $union = ' INNER JOIN equipo ec ON ec.id=p.equipoLocal_id';
    $union .= ' INNER JOIN equipo ef ON ef.id=p.equipoVisitante_id';
    $union .= ' INNER JOIN temporada te ON te.id=p.temporada_id';
    $union .= ' INNER JOIN torneo tor ON tor.id=te.torneo_id';
    $union .= ' INNER JOIN pais pa ON tor.pais_id=pa.id';
    $union .= ' INNER JOIN categoriatorneo ct ON ct.id=tor.categoria_torneo_id';
    $condicion = ' WHERE p.fecha="'.$fecha.'" AND p.estado_partido=1 AND tor.visible>4';

    $orden = ' ORDER BY p.fecha, p.hora_prevista, tor.comunidad_id';

    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;

    //echo $consulta; die;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    return $resultado;
}

/*

SELECT p.id partido_id, p.estado_partido, p.fase_id, p.partidoAPI, p.temporada_id, p.equipoLocal_id, p.equipoVisitante_id, p.hora_real, p.observaciones, 
p.codigo_acta, p.goles_local, p.goles_visitante, p.fecha, p.comentario, p.betsapi,ec.federacion_id fed_l,ef.federacion_id fed_v, 
pa.nombre pais, p.hora_prevista, ec.nombre local, ef.nombre visitante, p.jornada, te.nombre temporada_nombre, tor.apifutbol, 
tor.apiRFEFcompeticion, tor.apiRFEFgrupo, tor.comunidad_id 
FROM partido p 
INNER JOIN equipo ec ON ec.id=p.equipoLocal_id 
INNER JOIN equipo ef ON ef.id=p.equipoVisitante_id 
INNER JOIN temporada te ON te.id=p.temporada_id 
INNER JOIN torneo tor ON tor.id=te.torneo_id 
INNER JOIN pais pa ON tor.pais_id=pa.id 
INNER JOIN categoriatorneo ct ON ct.id=tor.categoria_torneo_id 
WHERE p.fecha="2019-10-05" AND p.estado_partido<>1 AND tor.visible>4 
ORDER BY p.fecha, p.hora_prevista, tor.comunidad_id


*/

