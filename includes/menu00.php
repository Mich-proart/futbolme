<?php

$nivel=$nivel??'';
if ($_SESSION['futbolme']===0){ 
$path = $nivel.'json/menu.json';
$json = file_get_contents($path);
$menu = json_decode($json, true);

$path = $nivel.'json/menus/menu'.($comunidad_id-1).'.json';
$json = file_get_contents($path);
$categorias = json_decode($json, true);


$path = $nivel.'json/index_cabecerasFed.json';
$json = file_get_contents($path);
$cabeceras = json_decode($json, true);

if (isset($cabeceras[$comunidad_id])){
$cabecera=$cabeceras[$comunidad_id];
} 
?>
<div class="col-xs-12 nopadding text-center marco">

  <div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font style="vertical-align: inherit;">Futbolme.com</font></button>
    <div class="dropdown-menu" x-placement="bottom-start">
      <div class='col-xs-12' style="max-width: 350px;">
          <div class="h40 marco text-center">
            <a href='/'>Portada - Partidos Hoy</a>
          </div>
           <div class="h40 marco text-center">
            <a href='/resultados-directo/torneo/primera-division/1/'>Primera División</a>
          </div>
          <div class="h40 marco text-center">
            <a href='/resultados-directo/torneo/segunda-division/2/'>Segunda División</a>
          </div>
  
  <div class="h40 marco col-xs-6 boldfont text-center">
  <a href='/resultados-directo/torneo/segunda-division-b-grupo-1a/2615/'>2BG1A</a>
  </div>
  <div class="h40 marco col-xs-6 boldfont text-center">
  <a href='/resultados-directo/torneo/segunda-division-b-grupo-1b/2616/'>2BG1B</a>
  </div>
  <div class="h40 marco col-xs-6 boldfont text-center">
  <a  href='/resultados-directo/torneo/segunda-division-b-grupo-2a/2617/'>2BG2A</a>
  </div>
  <div class="h40 marco col-xs-6 boldfont text-center">
  <a  href='/resultados-directo/torneo/segunda-division-b-grupo-2b/2618/'>2BG2B</a>
  </div>
  <div class="h40 marco col-xs-6 boldfont text-center">
  <a  href='/resultados-directo/torneo/segunda-division-b-grupo-3a/2619/'>2BG3A</a>
  </div>
  <div class="h40 marco col-xs-6 boldfont text-center">
  <a  href='/resultados-directo/torneo/segunda-division-b-grupo-3b/2620/'>2BG3B</a>
  </div>
  <div class="h40 marco col-xs-6 boldfont text-center">
  <a  href='/resultados-directo/torneo/segunda-division-b-grupo-4a/2621/'>2BG4A</a>
  </div>
  <div class="h40 marco col-xs-6 boldfont text-center">
  <a  href='/resultados-directo/torneo/segunda-division-b-grupo-4b/2622/'>2BG4B</a>
  </div>
  <div class="h40 marco col-xs-6 boldfont text-center">
  <a  href='/resultados-directo/torneo/segunda-division-b-grupo-5a/2623/'>2BG5A</a>
  </div>
  <div class="h40 marco col-xs-6 boldfont text-center">
  <a  href='/resultados-directo/torneo/segunda-division-b-grupo-5b/2624/'>2BG5B</a>
  </div>


          <table class='table table-bordered table-condensed whitebox nomargin'>
                <tr class='darkgreenbox'><th  colspan='3'><div class='flagbox pais flag60b' style='margin-top:-5px; margin-right:10px'></div>Tercera División</th></tr>
                
                  <?php foreach ($menu['tercera'] as $key => $temporal) {                  
                  $nombreCom = $temporal['nombreComunidad'];
                  $imagen = $temporal['imagenComunidad'];
                  $pdosFed=0;
                  if (isset($partidosFed[$imagen])){
                    $pdosFed=count($partidosFed[$imagen]);
                  }
                  if (10 == $temporal['imagenComunidad']) {
                      $nombreCom .= ' y Melilla';
                      $imagen = 55;
                  }
                  if (11 == $temporal['imagenComunidad']) {
                      $nombreCom .= ' y Ceuta';
                      $imagen = 56;
                  }?>

                  <tr><th>
                  <div class='comunidad flag<?php echo $imagen; ?>'></div>
                  <a href='/resultados-directo/torneo/<?php echo poner_guion(
                           $temporal['nombre']
                       ); ?>/<?php echo $temporal['temporada_id']; ?>/'><?php echo $temporal['nombre']?></a> 
                  </th></tr>
                <?php } ?>
                            </table>
          </div>
    </div>
  </div><!-- /btn-group -->

</td>


 
   
<?php foreach ($categorias as $key => $value) { 
  if (count($value)==0) { continue; } 
  $sumaPartidos=0;?>

 <div class="btn-group">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    <font><?php echo $key?></font></button>
    <div class="dropdown-menu" x-placement="bottom-start">
     <div class='col-xs-12' style="max-width: 350px"> 
          <?php 

          $tTitulo='';$contador=0;

          foreach ($value as $k => $torneo) { 
            
            $t=explode('-',$torneo['torneo_nombre']);
            if (count($t)>1){
              $tN=$t[0]; $tG=$t[1]; $tN=trim($tN);
            } else { $tN=$torneo['torneo_nombre']; $tG=$torneo['torneo_nombre']; }

            if ($tN!=$tTitulo){ ?>
              <h4><?php echo $tN?></h4>
            <?php } ?>
              <div class='marco'>
              <a href='/resultados-directo/torneo/<?php echo poner_guion($torneo['torneo_nombre'])?>/<?php echo $torneo['temporada_id'] ?>/'><?php echo $tG; ?></a>
              
              <?php $partidosTor=$cabecera[$torneo['temporada_id']]['partidos']??0;
              if ($partidosTor>0){ 
                $sumaPartidos=$sumaPartidos+$partidosTor; ?>
                <span class="badge pull-right">
                <?php echo $partidosTor; ?> 
                </span>                
              <?php } ?>
              </div>
          <?php  
          $tTitulo=$tN;
        }  ?>

      </div>
    </div>
        <?php  if ($sumaPartidos>0){ ?>
          <span class="badge pull-right" style='margin-left: -2px; background-color: dimgray; border-radius: 2px;'>
          <?php echo $sumaPartidos?> 
          </span>
        <?php } ?>    
  </div>
<?php } ?>

  <div class="btn btn-primary boldfont" style="background-color:maroon;"><a href="/index.php?fm=1" style="color:white" title="Personaliza futbolme con tus equipos preferidos">Mi futbolme (<?php echo count($_SESSION['equipos'])?>)</a>

    

  </div>
  
</div>
<div class="clear"></div>
<?php } else { ?>
<nav class="col-xs-12 nopadding text-center darkgreenbox2">
    <div class="btn btn-primary boldfont" style="background-color:maroon;"><a href="/index.php?fm=0" style="color:white">Volver a futbolme</a></div>
</nav>
<?php }
?>