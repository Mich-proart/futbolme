<?php
define('_PANEL_', 1);
require_once 'includes/config.php'; //include funciones,consultas, post y fechas
require_once 'includes/post.php';
require_once 'includes/get.php';
require_once 'includes/head.php';


$temporada_id=$_POST['temporada_id']??442;

if ($temporada_id==442){
    $consulta="DELETE from partido WHERE temporada_id=442 AND fecha< curdate()-interval 60 day "; //borramos todos los partidos con mas de 60 dias de antiguedad.
    mysqli_query($mysqli, $consulta);
}

//imp($_POST);

$datos=Xtipo($temporada_id);
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

$fase_id = $_POST['fase_id']??0;
$grupo_id=$_POST['grupo_id']??0;
$partidos =Xpartidos($temporada_id, $fase_id, $grupo_id);
$equiposTorneo = Xequipos_temporada($temporada_id);
$fasesJornada=Xfases_jornadas($temporada_id);
$xfases=Xfases();$xgrupos=Xgrupos();
//imp($fasesJornada);
?>
<body>
<?php
echo '<h4>'.$temporada_nombre.' - ('.$temporada_nombre.')
		 - Temporada ID:'.$temporada_id.'
		 - Torneo ID:'.$torneo_id.' - Tipo de torneo '.$tipo_torneo.' - Jornada '.$activa.'</a></h4>';
?>
<span onclick="refrescarTorneo(<?php echo $temporada_id?>,0)" style="cursor:pointer" class="boldfont" style="font-size: 30px">Actualizar</span>
<table class="table">
  <tr><td>
    <div class="marco" style="background-color: lavender">
      <table class="table">
        <tr><td>ID</td>
          <td>Fase - Torneo: <?php echo $torneo_id?> - Temporada: <a href="temporada.php?id=<?php echo $temporada_id?>"><?php echo $temporada_id?></a></td>
          <td>Tipo</td>         
        </tr>
        <?php foreach ($fasesJornada as $fila) {
        $color='white';
        if ($fase_id == $fila['fase_id']) { $color = 'yellow';} ?>
        <tr bgcolor="<?php echo $color?>"><td><span onclick="refrescarTorneo(<?php echo $temporada_id?>,<?php echo $fila['fase_id']?>)" class="boldfont" style="cursor: pointer;"><?php echo $fila['fase_id']?></span></td>
            <td>(<?php echo $fila['partidos']?>) - <?php echo $fila['nombre']?>
            <?php if (0 == $fila['partidos']) { ?>
                <span onclick="gestionFases(<?php echo $temporada_id?>,<?php echo $torneo_id?>,<?php echo $fila['fase_id']?>,1)" class="boldfont" style="cursor: pointer;">Q</span>
            <?php } ?>
            </td>
            <td><?php echo $fila['tipo_eliminatoria']?></td>
        </tr>
         <?php if (3 == $fila['tipo_eliminatoria']) {
         $resultado2=Xfases_grupos($temporada_id,$fila['fase_id']);
         foreach ($resultado2 as $fila2) { ?>
            <tr><td><?php echo $torneo_id?></td>         
              <td><?php echo $fila2['nombre']?></td>
            <td>
              <span onclick="refrescarTorneo(<?php echo $temporada_id?>,<?php echo $fila['fase_id']?>,<?php echo $fila2['grupo_id']?>)" class="boldfont" style="cursor: pointer;"><?php echo $fila2['nombre']?></span>
               -> <?php echo ($fila2['partidos'])?>
               <?php if (0 == $fila2['partidos']) { ?>
                <span onclick="gestionFases(<?php echo $temporada_id?>,<?php echo $torneo_id?>,<?php echo $fila['fase_id']?>,3,<?php echo $fila2['grupo_id']?>)" class="boldfont" style="cursor: pointer;">Q</span>
                <?php } ?>

            </td>
            </tr>
          <?php }
          } 
        }?>
      </table>
  </div>
    <table class="table"><tr><td class="boldfont">Fases</td><td class="boldfont">Grupos</td></tr>
      <tr><td valign='top'>
        <div class="marco" style="background-color: dimgray">
      <table class="table">
        <tr style="background-color: gainsboro"><td>id</td><td>nombre</td><td>ord</td><td>tipo</td></tr>
        <?php foreach ($xfases as $fila) { ?>
        <tr bgcolor="white">
          <td><span onclick="gestionFases(<?php echo $temporada_id?>,<?php echo $torneo_id?>,<?php echo $fila['id']?>,0)" class="boldfont" style="cursor: pointer;">ins</span> - <?php echo $fila['id']?></td>
          <td><?php echo $fila['nombre']?></td>
          <td><?php echo $fila['orden']?></td>
          <td><?php echo $fila['tipo_eliminatoria']?></td>
          </tr>
        <?php } ?>
      </table>
    </div>
    </td><td valign='top'>
      <div class="marco" style="background-color: dimgray">
    <table class="table">
        <tr style="background-color: gainsboro"><td>id</td><td>nombre</td><td>ord</td></tr>
        <?php foreach ($xgrupos as $fila) { ?>
        <tr bgcolor="white"><td>
          <?php if ($fase_id>0) { ?>
            <span onclick="gestionFases(<?php echo $temporada_id?>,<?php echo $torneo_id?>,<?php echo $fase_id?>,2,<?php echo $fila['id']?>)" class="boldfont" style="cursor: pointer;">ins</span> - 
          <?php } ?>
          <?php echo $fila['id']?></td>
        <td><?php echo $fila['nombre']?></td>
        <td><?php echo $fila['orden']?></td>
          </tr>
        <?php } ?>
      </table>
    </div>
    </td>
  </tr></table>
    
  </td>
  <td>
 <div class="marco" style="background-color: gainsboro" id="partidosTorneo">

    <table class="table" style="background-color: gainsboro">
    <tr><td>Jda</td><td>Grupo</td><td>Fecha</td><td>Local</td><td>Visitante</td><td></td> </tr>



    <?php foreach ($partidos as $k => $fila) { 
      if ($grupo_id>0 && $grupo_id!=$fila['grupo_id']){ continue; }
      if ($k==0 && $fase_id==0) { $fase_id=$fila['jornada']; }?>
        <tr bgcolor="white" id="quitar-partido-<?php echo $fila['id']?>">
          <td><?php echo $fila['jornada']?></td>
          <td><?php echo $fila['grupo_id']?></td>
          <td><?php echo $fila['fecha']?></td>
          <td><?php echo $fila['equipoLocal_id']?> - <?php echo $fila['local']?></td>
          <td><?php echo $fila['visitante']?> - <?php echo $fila['equipoVisitante_id']?></td>
          <td align="center">
            <?php if ($fila['estado_partido']==1){ ?>
              <?php echo $fila['goles_local']?> - <?php echo $fila['goles_visitante']?>
              <?php } else { ?>
                <span style="cursor:pointer;" onclick="quitarPartido(<?php echo $fila['id']?>)">Borrar</span>
              <?php } ?>
            
          </td>
          </tr>
    <?php } ?>

    </table><hr />
    
    <form method="POST" action="#" onsubmit="grabarPartido(event, $(this).serialize(),<?php echo $temporada_id?>,2)">
    <input type='hidden' name='temporada_id' value="<?php echo $temporada_id?>">
      <table class="table">
        <tr><td colspan="2">Fase <input type='text' name='jornada' size='2' value="<?php echo $fase_id?>">
        Grupo <input type='text' name='grupo_id' size='2' value="<?php echo $grupo_id?>">
      </td></tr>
      <tr>
      <td>Fecha <input type='text' name='fecha' size='10' value="<?php echo date('Y-m-d')?>"></td>
      <td>Hora <input type='text' name='hora_prevista' size='10' value='16:00:00'></td>
      <td></tr>
      
      <tr><td>Local <select name='equipoLocal_id'><option value=''>-------</option>

    <?php foreach ($equiposTorneo as $fila) { ?>
        <option value="<?php echo $fila['equipo_id']?>"><?php echo $fila['nombre']?></option>
    <?php } ?>
    </select></td>
       <td>Visit <select name='equipoVisitante_id'><option value=''>-------</option>
       <?php foreach ($equiposTorneo as $fila) { ?>
        <option value="<?php echo $fila['equipo_id']?>"><?php echo $fila['nombre']?></option>
      <?php } ?>
    </select></td>
      <td><input type='submit' name='grabar' value='grabar'></td>
    </tr></table></form>


        <table class="table"><tr><td>
          <form onsubmit="submitAgregarEquipo(event, $(this).serialize(),<?php echo $temporada_id?>)">        
          <input type="hidden" name="tipo_torneo" value="2">
          <input type="hidden" name="fase_id" value="<?php echo $fase_id?>">
          <input type="hidden" name="temporada_id" value="<?php echo $temporada_id; ?>">
          Agregar id: <input type='text' name='equipo_id' size="2">
          <input type='submit' name='agregar' value='agregar'></td>
        </form>
      </td></tr></table>


  
  <table class="table">
    <tr><td>ID</td>
          <td colspan='4'>equipos incluidos</td>
        </tr>

    <?php foreach ($equiposTorneo as $fila) { ?>
      <tr bgcolor="white">
          <td><?php echo $fila['equipo_id']?></td>
          <td><?php echo $fila['nombreCorto']?></td>
          <td><?php echo $fila['betsapi']?></td>
          <td><span onclick="eliminarEquipoTemporada(event, <?php echo $temporada_id?>, <?php echo $fila['equipo_id']?>,0,2)" style="cursor:pointer;" class="boldfont">quitar</span></td>           
          </tr>
    <?php } ?>
    </table>

<table class="table">   
<tr bgcolor="gainsboro">
          <td>


<?php 
$categorias=array('1' => 'Senior Masculino',
'2' => 'Senior Femenino',
'3' => 'Juvenil Masculino',
'5' => 'Absoluta Masculino',
'6' => 'Absoluta Femenino',
'7' => 'Sub 21 Masculino',
'8' => 'Sub 20 Masculino',
'9' => 'Sub 19 Masculino',
'10' => 'Sub 17 Masculino',
'11' => 'Sub 20 Femenino',
'12' => 'Sub 19 Femenino',
'13' => 'Sub 17 Femenino',
'14' => 'Regiones',
'15' => 'Sub 18 Femenino',
'16' => 'Sub 16 Femenino',
'17' => 'Sub 18 Masculino',
'18' => 'Sub 16 Masculino',
'19' => 'Olímpica Masculino',
'20' => 'Olímpica Femenino');
?>
  <form id="form-buscador-equipos" onsubmit="buscadorEquipos(event, $(this).serialize(),<?php echo $temporada_id?>)">
    <select name="categoria_id">
      <option value="0" selected>Categorias</option>
      <?php foreach ($categorias as $key => $value) {
      if ($key==$categoria_id) { $selected='selected'; } else { $selected='';} ?>
        <option value="<?php echo $key?>" <?php echo $selected?>><?php echo $value?></option>
      <?php } ?>     
    </select>
    <input type="text" name="nombre" size="35" placeholder="nombre de equipo o vacio para todos"><br />
    Id pais: <input type="text" name="pais_id" value="0" size="2">
    Id comunidad: <input type="text" name="comunidad_id" value="0" size="2">
    <input type="hidden" name="temporada_id" value="<?php echo $temporada_id?>">
    <input type="hidden" name="fase_id" value="0">
    <input type='submit' name='buscaequipos' value='encontrar'></td>
  </form>
</td>
<tr>
<td>

    <div id="partidos-torneo-<?php echo $temporada_id?>"></div>
    
</td></tr>

</table>

  </td>
</tr>
</table>
</body></html>
