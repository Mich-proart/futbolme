

<div  id="crear-calendario" style="display: block;">
  Jornadas: <input id="boton-jornadas-<?php echo $temporada_id?>" type="text" name="jornadas" value="<?php echo $jornadas?>"  style="font-size:12px; width:50px; background-color: #EFEFEF; text-align: center">
  Estado: <input id="boton-visible-<?php echo $temporada_id; ?>" type="text" name="visible" value="<?php echo $visible?>"  style="font-size:12px; width:50px; background-color: #EFEFEF; text-align: center">
  
  <input id="boton-betsapi-<?php echo $temporada_id?>" type="text" name="betsapi" value="<?php echo $betsapi?>" style="font-size:12px; width:50px; background-color: yellow; text-align: center">

  <input class="btn_enviar hidden-xs" id="boton-orden-<?php echo $temporada_id?>" type="button" onclick="orden_torneo2(<?php echo $temporada_id; ?>)" 
      style="font-size:12px" value="Or."> 

      <a href="*" onclick="compararPartidos(<?php echo $betsapi?>,<?php echo $temporada_id?>)">Comparar partidos</a>



  <div id="calendario-central">
  <h3>CALENDARIO</h3> 
  <?php 
  


  $j = 0;$contador = 0;
  $jornadasFechas=array();

  foreach ($calendario as $fila) {
    ++$contador;
    $jornadasFechas[$fila['jornada']]=$fila['fecha'];
    if ($fila['jornada'] != $j) { ?>
    <div style="background-color: orange">Jornada <?php echo $fila['jornada']?>
      - <span onclick="editarJornada(<?php echo $fila['jornada']?>,<?php echo $temporada_id?>,<?php echo $categoria_torneo?>)" style="cursor:pointer;"><b>Editar</b></span>
      <div id="j<?php echo $fila['jornada']?>-t<?php echo $temporada_id?>"></div>
    </div>
    <?php } 

    $colorFondo='';

    if ($fila['hora_prevista']=='00:00:11') {$colorFondo='white';}
    if ((int)$fila['estado_partido']==1) {$colorFondo='#A9DFBF';}
    ?>
    <div id="partido-<?php echo $fila['id']; ?>"></div>
    <div style="background-color: <?php echo $colorFondo?>; border: gainsboro 1px solid; ">    
    <span style="cursor:pointer;"onclick="editar_partido(<?php echo $fila['id']; ?>)"> *</span>
    <?php    
    echo $contador.' - 
      '.$fila['fecha'].' -
      '.$fila['hora_prevista'].' - 
      '.$fila['jornada'].' - 
      <span title="'.$fila['local'].' - FM: '.$fila['equipoLocal_id'].' - Fed: '.$fila['fedLocal'].'"">'.$fila['local'].'</span> - 
      <b>'.$fila['goles_local'].' - 
      '.$fila['goles_visitante'].'</b> - 
      <span title="'.$fila['visitante'].' - FM: '.$fila['equipoVisitante_id'].' - Fed: '.$fila['fedVisitante'].'">'.$fila['visitante'].'</span>';

      

      echo ' - <a href="/partido.php?id='.$fila['id'].'&m=1" target="_blank">ver</a>'; 

      
      echo '<br />';




          $j = $fila['jornada']; ?>
     </div>     
  <?php } ?>
  </div>
  <div class="h40"></div>
</div>