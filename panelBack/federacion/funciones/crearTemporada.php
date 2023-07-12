<?php

define('_FUTBOLME_', 1);

require_once '../consultas.php';
require_once '../funciones.php';?>

<?php 
$id=$_POST['id'];
$comunidad_id=$_POST['comunidad_id'];
$grupo_id=$_POST['grupo_id'];

$mysqli = conectar();
$mysqliFM = conectarFM();

$sql = 'SELECT id FROM temporada WHERE torneo_id='.$id;
    $resultadoSQL = mysqli_query($mysqliFM, $sql);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
    if (count($resultado)==0){
      $sql="SELECT nombre FROM torneo WHERE id=".$id;
      $resultadoSQL = mysqli_query($mysqliFM, $sql);
      $t = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
      $sql='INSERT INTO temporada (torneo_id, nombre, id_original) VALUES ("'.$id.'", "'.$t['nombre'].'", "'.$grupo_id.'")'; 
      mysqli_query($mysqliFM, $sql);
      echo $sql;
      $temporada_id=mysqli_insert_id($mysqliFM);

    } else { $temporada_id=$resultado['id'];}

    $sql='UPDATE torneo SET temporada_id='.$temporada_id.' WHERE comunidad_id='.$comunidad_id.' AND grupo_id='.$grupo_id;
    mysqli_query($mysqli, $sql);
    
    echo "Temporada ID: ".$temporada_id.'<hr />';

    

die;

//de aqui para abajo para revisar.


$categoria_id=$_POST['categoria_id'];



include('urlFederaciones.php');
//$sql='SELECT DISTINCT equipoLocal_id, equipoVisitante_id FROM partido WHERE grupo_id='.$grupo_id.' AND comunidad_id='.$comunidad_id;
$sql='SELECT id, estado_partido, fecha, hora_prevista, goles_local, goles_visitante, jornada, observaciones, clasificado, equipoLocal_id, equipoVisitante_id, local, visitante FROM partido WHERE grupo_id='.$grupo_id.' AND comunidad_id='.$comunidad_id; 
//echo $sql.'<br />'; 
$resultadoSQL = mysqli_query($mysqli, $sql);
$partidosTorneo = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC); 

//imp($partidosTorneo);die;
$equipos=array();
$equiposN=array();
foreach ($partidosTorneo as $key => $value) {
  $equipos[$value['equipoLocal_id']]=$value['equipoLocal_id'];
  $equiposN[$value['equipoLocal_id']]=$value['local'];
  $equipos[$value['equipoVisitante_id']]=$value['equipoVisitante_id'];
  $equiposN[$value['equipoVisitante_id']]=$value['visitante'];
}

imp($equiposN);
$datosEquipos=array();
foreach ($equipos as $key => $value) {
  $sql='SELECT e.id, e.club_id, e.nombre equipo, e.federacion_eq_id, e.categoria, e.futbolme_id, c.nombre, c.id_futbolme id_futbolmeC, c.federacion_id, c.federacion_ref,c.equipos
  FROM equipo e
  INNER JOIN club c ON c.id=e.club_id
  WHERE federacion_eq_id='.$value;
  $resultadoSQL = mysqli_query($mysqli, $sql);
  $datos = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);  
  $datosEquipos[$value]['equipo_id']=$datos['id'];
  $datosEquipos[$value]['club_id']=$datos['club_id'];
  $datosEquipos[$value]['nombreE']=$datos['equipo'];
  $datosEquipos[$value]['categoria']=$datos['categoria'];
  $datosEquipos[$value]['futbolme_id']=$datos['futbolme_id'];
  $datosEquipos[$value]['f_equipo_id']=$datos['federacion_eq_id'];
  $datosEquipos[$value]['nombreC']=$datos['nombre'];
  $datosEquipos[$value]['id_futbolmeC']=$datos['id_futbolmeC'];
  $datosEquipos[$value]['f_club_id']=$datos['federacion_id'];
  $datosEquipos[$value]['f_refClub_id']=$datos['federacion_ref'];
  $datosEquipos[$value]['equipos']=$datos['equipos'];
}

imp($datosEquipos);

 ?>

<div style="width: 100%; float:left">
  <div style="width: 70%; float:left">

<?php 

$equiposCalendario=array();$contaEquipos=0;

foreach ($datosEquipos as $key => $value) {
  $codigo=$value['f_refClub_id'];$largo=strlen($codigo);
  switch ($largo) {
    case 1: $codigo='0000'.$codigo;break;
    case 2: $codigo='000'.$codigo;break;
    case 3: $codigo='00'.$codigo;break;
    case 4: $codigo='0'.$codigo;break;
  }
  $sql='SELECT id, nombre, futbolbase_id FROM club WHERE territorialRFEF="'.$territorial.'" AND codigoRFEF="'.$codigo.'"';
  $resultadoSQL = mysqli_query($mysqliFM, $sql);
  $club = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC); 

  //imp($value);
  //imp($club);
  if (isset($club)){
    $sql="UPDATE club SET id_futbolme=".$club['id']." WHERE id=".$value['club_id'];
    mysqli_query($mysqli, $sql);
    $sql="UPDATE club SET futbolbase_id=".$value['club_id']." WHERE id=".$club['id'];
    mysqli_query($mysqliFM, $sql);
     $sql='SELECT e.id, e.nombre, e.federacion_id, (select nombre from categoria where id=e.categoria_id) categoria FROM equipo e WHERE e.club_id='.$club['id'];
    $resultadoSQL = mysqli_query($mysqliFM, $sql);
    $equipos = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC); ?>

    
    <div style="background-color: white">
      <table width="100%" border="1">
      <tr>
        <td width="25%" valign="top">
        <?php 
        echo '<p><b>En futbolbase</b> ->'.$value['nombreC'].' - id: '.$value['club_id'].' - id_futbolme: '.$value['id_futbolmeC'].'</p>';
        echo '<b>Equipo </b><br />'.$value['nombreE'].'<br />id: '.$value['equipo_id'].' - id futbolme: '.$value['futbolme_id'].' - id_federacion: '.$value['f_equipo_id'].'<br />categoria: '.$value['categoria'].'<br />'; 
        $contaEquipos++;
        $equiposCalendario[$contaEquipos]['nombre']=$value['nombreE'];
        $equiposCalendario[$contaEquipos]['FBaseID']=$value['equipo_id'];
        $equiposCalendario[$contaEquipos]['FMID']=$value['futbolme_id'];
        $equiposCalendario[$contaEquipos]['FedID']=$value['f_equipo_id'];

        ?>
      </td>
      <td width="25%" align="center">
        <?php 
        $txt="cambiar vínculo";
        if ($value['futbolme_id']==0) { 
          $txt="vincular";?>
        <p>Introducir el id de futbolme para vincular</p>
      <?php } ?>
        <form method="post" id="vinculo" onsubmit="submitVincularEquipo(event, $(this).serialize(),<?php echo $value['equipo_id']?>)">
          <input type="hidden" name="equipo_id" value="<?php echo $value['equipo_id']?>">
          <input type="hidden" name="f_equipo_id" value="<?php echo $value['f_equipo_id']?>">
          <input type="text" name="futbolme_id" size="6">
          <input type="submit" name="<?php echo $txt?>" value="<?php echo $txt?>">
        </form>
        <div id="vincular-<?php echo $value['equipo_id']?>"></div>
     </td>
      <td width="50%" valign="top">
        <?php 
        echo '<p><b>En futbolme</b> ->'.$club['nombre'].' - id: '.$club['id'].' - id_futbolbase: '.$club['futbolbase_id'].'</p>';
        foreach ($equipos as $k => $v) { ?>
          <span style="color:red"><b><?php echo $v['id']?></b></span> - Fed_id: <span><?php echo $v['federacion_id']?></span> - <span><?php echo $v['nombre']?></span> - <span><?php echo $v['categoria']?></span><br />
        <?php } 

        if ($value['futbolme_id']==0) {?>
        <div style="text-align: right"><span style="cursor:pointer; color:navy;" onclick="crearEquipo(<?php echo $club['id']?>,<?php echo $categoria_id?>,<?php echo $value['f_equipo_id']?>,<?php echo $value['equipo_id']?>)">crear equipo en esta categoría (<?php echo $categoria_id?>)</span>
        </div>
        <?php } ?>     
        
      </td>
    </tr>
    </table>
  
    <?php // se buscan los equipos que hay del club y se comparan con los equipos de futbolbase
  } else { // si no existe club se crea?>
    <div style="background-color:gold">
    CLUB: <?php echo $value['nombreC'];?>
    <span style="cursor:pointer; color:navy" onclick="insertarClub(<?php echo $value['club_id']?>,<?php echo $comunidad_id?>,<?php echo $categoria_id?>)">-> crear club</span>
    <div id="insertar-club-<?php echo $value['club_id']?>"></div>
    </div>
  <?php } ?>
  </div>
  <div style="clear: both;"></div>
<?php } //datosEquipos?>
  </div>


<?php foreach ($datosEquipos as $key => $value) {
  if ($value['futbolme_id']==0){
    echo 'Falta vincular este equipo ',$value['nombreE']; die;
  }
}


?>
  <div style="width: 30%; float:right; background-color: white"> 
    <h4>Crear temporada</h4>  

    <?php
    echo "Torneo ID: ".$id.'<hr />';

    $sql = 'SELECT id FROM temporada WHERE torneo_id='.$id;
    $resultadoSQL = mysqli_query($mysqliFM, $sql);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
    if (count($resultado)==0){
      $sql="SELECT nombre FROM torneo WHERE id=".$id;
      $resultadoSQL = mysqli_query($mysqliFM, $sql);
      $t = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
      $sql='INSERT INTO temporada (torneo_id, nombre, id_original) VALUES ("'.$id.'", "'.$t['nombre'].'", "'.$grupo_id.'")'; 
      mysqli_query($mysqliFM, $sql);
      echo $sql;
      $temporada_id=mysqli_insert_id($mysqliFM);

    } else { $temporada_id=$resultado['id'];}

    
    echo "Temporada ID: ".$temporada_id.'<hr />';

    echo "Equipos:<br /><br />";

    foreach ($equiposCalendario as $k => $v) {
      $sql = 'SELECT equipo_id FROM temporada_equipo WHERE temporada_id='.$temporada_id.' AND equipo_id='.$v['FMID'];
      $resultadoSQL = mysqli_query($mysqliFM, $sql);
      $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
      if (count($resultado)==0){
        $sql2='INSERT INTO temporada_equipo(temporada_id, equipo_id) VALUES ("'.$temporada_id.'", "'.$v['FMID'].'")';
        echo $sql2.'<br />';
        mysqli_query($mysqliFM, $sql2);
      } else { echo ($k).' - '.$v['nombre'].' ya está incluido en este torneo.<br />'; }
    }
    echo "<hr />Partidos:<br /><br />";

    //SELECT temporada_id,equipo_id, (select nombre from equipo where id=equipo_id) equipo FROM `temporada_equipo` WHERE temporada_id=670

    //delete FROM `partido` WHERE temporada_id=670

    //imp($partidosTorneo);

    $sql='UPDATE partido SET temporada_id='.$temporada_id.' WHERE grupo_id='.$grupo_id.' AND comunidad_id='.$comunidad_id;
    echo $sql.'<br />';
    mysqli_query($mysqli, $sql);

    foreach ($partidosTorneo as $key => $value) {
  
    $equipoLocal_id=$datosEquipos[$value['equipoLocal_id']]['futbolme_id'];
    $equipoVisitante_id=$datosEquipos[$value['equipoVisitante_id']]['futbolme_id'];
    


    $jornada=$value['jornada'];
    $fecha=$value['fecha'];
    $h=$value['hora_prevista'];
    $codInfo=$value['id'];
    $estado=$value['estado_partido'];
    $golesLocal=$value['goles_local'];
    $golesVisitante=$value['goles_visitante'];

        if ($equipoLocal_id>0 && $equipoVisitante_id>0){
            
            $sql = "SELECT id FROM partido WHERE temporada_id=$temporada_id AND equipoLocal_id=$equipoLocal_id AND equipoVisitante_id=$equipoVisitante_id";
                $resultadoSQL = mysqli_query($mysqliFM, $sql);
                $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);

                if (0 == count($resultado)) {
                    $consulta = "INSERT INTO partido (temporada_id, jornada, fecha, hora_prevista,
                    equipoLocal_id, equipoVisitante_id, partidoAPI, estado_partido,
                    goles_local, goles_visitante) 
                    VALUES ($temporada_id, $jornada, '".$fecha."', '".$h."',".
                            $equipoLocal_id.', '.$equipoVisitante_id.', '.$codInfo.', '.$estado.', '.
                            $golesLocal.', '.$golesVisitante.')';

                    $resultadoSQL = mysqli_query($mysqliFM, $consulta);
                    //echo '<br />'.$consulta;
                } else {
                  echo 'J'.$jornada.' '.$estado.' - '.$fecha.' '.$h.' :: '.$value['local'].' '.$golesLocal.'-'.$golesVisitante.' '.$value['visitante'].'<br />';
                }
        } // si equipo local y visitante son mayor que 0
    }

    ?>  
  </div>

</div>