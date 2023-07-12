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
  <div class="col-xs-12 marco">
    <a href="limpiezaUsuarios.php" target="_blank">Limpieza de usuarios</a>
-  <a href="puntuarUsuarios.php" target="_blank">Puntuar usuarios</a>
-  <a href="/panelBack/agendaPendientes.php" target="_blank">Partidos pendientes</a>
-  <a href="/panelCargador/repasador.php" target="_blank">Repasador</a>
-  <a href="/panelCargador/asalto.php" target="_blank">Asalto</a>
-  <a href="/panelBack/simple/00control/proxys.php" target="_blank">Proxis</a>
-  <a href="/panelBack/simple/00control/proxyss.php" target="_blank">Proxis HTTPS</a>
-  <a href="/panelBack/federacion/index.php" target="_blank">federaciones</a>
-  <a href="/panelBack/index.php" target="_blank">CONTROL</a>
-  <a href="sancionados.php" target="_blank">sancionados</a>
-  <a href="?actas=1">cargar actas</a>
-  <a href="enlaces.php">Enlaces de gestión</a>
-  <a href="/panelBack/agenda.php">Agenda</a>

  </div>
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

if (isset($_GET['actas'])){
  $f = '../../partido.json';
  $json = file_get_contents($f);
  $datos = json_decode($json, true);
  foreach ($datos as $key => $value) {
    $sql='UPDATE partido SET codigo_acta='.$value['codigo_acta'].' WHERE id='.$value['id'];
    mysqli_query($mysqli, $sql);
    //echo $sql;die;
  }
  echo 'Finalizado';die;
}

 
if (isset($_POST['id'])){ 

  $_GET['temporada_id']=$_POST['temporada_id'];

  if (isset($_POST['id_producto'])){ 
    $sq3='DELETE FROM amazon WHERE id='.$_POST['id_producto'];
    mysqli_query($mysqli, $sq3);

  }

  //imp($_POST['categoria']);

  $cat=explode(',',$_POST['categoria']);

  ?>
  <h3><?php echo $_POST['n']?> - <?php echo $cat[1]?></h3>
  <form method="post" action="index.php">
    <input type="hidden" name="id" value="<?php echo $_POST['id']?>">
    <input type="hidden" name="n" value="<?php echo $_POST['n']?>">
    <input type="hidden" name="temporada_id" value="<?php echo $_POST['temporada_id']?>">
    <input type="text" name="enlace" size="60">
    <input type="text" name="nombre" size="60">
    <input type="text" name="categoria" size="20" value="<?php echo $cat[0]?>,<?php echo $cat[1]?>">
    <input type="submit" name="enviar" value="enviar"> 
  </form>

<hr />
<?php 

  if (isset($_POST['enlace'])){
    $e=$_POST['enlace'];
    $nombre=$_POST['nombre'];
    $cat=explode(',',$_POST['categoria']);

    

    $e=str_replace('<iframe style="width:120px;height:240px;" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="//rcm-eu.amazon-adsystem.com/e/cm', '', $e);

    $e=str_replace('"></iframe>', '', $e);

    //var_export(strlen($e));


    $sq='INSERT INTO amazon(club_id, enlace, nombre,categoria_amazon) VALUES ('.$_POST['id'].',"'.$e.'","'.$nombre.'","'.$cat[0].'")';
    mysqli_query($mysqli, $sq);
   // echo $sq."<br />";
  }

  $sq2="SELECT a.id,a.nombre, c.nombre categoria FROM amazon a
  INNER JOIN amazon_cat c ON a.categoria_amazon=c.id
  WHERE club_id=".$_POST['id'].' AND categoria_amazon='.$cat[0].' ORDER BY c.nombre,a.nombre';
    $resultadoSQL = mysqli_query($mysqli, $sq2);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    echo '<div style="padding:20px"><table border="1" bgcolor="dimgray">';
    foreach ($resultado as $key => $value) {
      echo '<tr bgcolor="white"><td><td>'.$key.'</td><td>' ?>
      <form method="post" id="f-<?php echo $value['id']?>" action="index.php">
        <input type="hidden" name="id" value="<?php echo $_POST['id']?>">
        <input type="hidden" name="n" value="<?php echo $_POST['n']?>">
        <input type="hidden" name="categoria" value="<?php echo $cat[0]?>,<?php echo $cat[1]?>">
       <input type="hidden" name="temporada_id" value="<?php echo $_POST['temporada_id']?>">
      <input type="hidden" name="id_producto" value="<?php echo $value['id']?>">
        <input type="submit" name="enviar" value="quitar <?php echo $value['id']?>"> 
      </form>
      <?php echo '</td><td>'.$value['categoria'].'</td><td>'.$value['nombre'].'</td></tr>';
    }
    echo '</table></div>';


}


$diaN = date('N');

$fecha=date('Y-m-d');
//$fecha='2020-02-23';
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
  echo '<h3>En las próximas 2 horas</h3>'; $title='Partidos para hoy en las próximas 2 horas';
} else {
  echo '<h3>Partidos para hoy</h3>'; $title='Partidos para hoy';
}

$contadorPH=0;
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
  

if ($horasP>1 && $invertidoP==1 && $diaN>5){ continue; }

$contadorPH++; 

    if ($invertidoP==0 && $mHP>105 && ((int)$partido['estado_partido']==0 || (int)$partido['estado_partido']>2) ) {
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
<?php echo '<h1>Pendientes</h1>';

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
      <?php echo '<a href="http://fm18.com/temporadaB.php?id='.$vp['temporada_id'].'&jornada='.$fila['jornada'].'" target="_blank">TmpB</a> - <a href="/temporada.php?id='.$vp['temporada_id'].'" target="_blank">Tmp</a> - <a href="/partido.php?id='.$vp['partido_id'].'" target="_blank">Pdo</a> - <a href="/panelBack/federacion/index.php?comunidad_id='.($vp['comunidad_id']-1).'" target="_blank">com</a>';?>

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
?>

</td>

<td valign="top">
<?php
echo '<h3>'.$title.': '.$contadorPH.'</h3>';
echo '<h3>Partidos pendientes: '.$contador.' - Aplazados: '.$aplazados.'</h3>';

?>
  Cambiar a un equipo de un torneo.<br /><textarea cols="50" rows="10">update partido set equipoLocal_id=34749 where temporada_id=1299 and equipoLocal_id=34636;
update partido set equipoVisitante_id=34749 where temporada_id=1299 and equipoVisitante_id=34636;
update temporada_equipo set equipo_id=34749 where temporada_id=1299 and equipo_id=34636;</textarea>
<hr />
  Introducir ?temporada_id=x para cambiar torneo.<br />
<?php

$temporada_id=$_GET['temporada_id']??1;

$campos = "e.id, e.nombre, e.club_id, 
            (SELECT count(club_id) FROM amazon WHERE club_id=e.club_id) productos";
$tabla = 'equipo e';
$union = ' INNER JOIN temporada_equipo te ON te.equipo_id=e.id';
$condicion = ' WHERE te.temporada_id='.$temporada_id;
$orden = ' ORDER BY (SELECT count(club_id) FROM amazon WHERE club_id=e.club_id), e.nombre';
$consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;

$resultadoSQL = mysqli_query($mysqli, $consulta);
$resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

$sql="SELECT id,nombre FROM amazon_cat ORDER BY nombre";
$mysqli = conectar();
$resultadoSQL = mysqli_query($mysqli, $sql);
$categorias = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

foreach ($resultado as $key => $value) { ?> 
  
  <form method="post" action="index.php">
    <?php echo $value['nombre']?> - <?php echo $value['club_id']?> <span style="color:red">(<?php echo $value['productos']?>)</span>
    <input type="hidden" name="id" value="<?php echo $value['club_id']?>">
    <input type="hidden" name="n" value="<?php echo $value['nombre']?>">
    <input type="hidden" name="temporada_id" value="<?php echo $temporada_id?>">
    <select name="categoria">
    <?php foreach ($categorias as $v) { ?>
      <option value="<?php echo $v['id']?>,<?php echo $v['nombre']?>"><?php echo $v['id']?> - <?php echo $v['nombre']?> </option>
    <?php } ?>
    </select>
    <input type="submit" name="enviar" value="enviar"> 
  </form>
  <br />
<?php }


?>
</td></tr></table>  
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
    $condicion = ' WHERE p.fecha="'.$fecha.'" AND p.estado_partido<>1 AND tor.visible>4';

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

