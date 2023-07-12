<?php

$nivel=$nivel??'';
if ($_SESSION['futbolme']===0){ 
$path = $nivel.'json/menu.json';
$json = file_get_contents($path);
$menu = json_decode($json, true);


?>


<div class="col-xs-12 nopadding text-center marco">
  <div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Inicio</font></font></button>
    <div class="dropdown-menu" x-placement="bottom-start">
      <div class='col-xs-12' style="max-width: 350px;">
        <div class='marco'><a href='/?m=m'>Portada - Partidos para hoy</a></div>
        <?php if (isset($c_finales)) { ?>
                <div class='marco cajagrisclaro'>
                Total partidos: <span><?php echo $c_partidos; ?></span>
                <br />En juego: <span><?php echo $c_directos; ?></span>
                <br />Finalizados: <span><?php echo $c_finales; ?></span>
                </div>
                <?php } ?>
                <div class='marco hide'><a href='/programa-fidelidad' title='Programa FIDELIDAD'>Programa Fidelidad</a></div>
                <div class='marco'><a href='/ascensosydescensos.php'>Pizarra de ascensos y descensos</a></div>
                <h4 class='hide'>Hemeroteca</h4>
                <div class='marco'><a href='/historico-liga'>Histórico de la Liga</a></div>
                <div class='marco'><a href='/historico-copa'>Histórico Copa</a></div>
                <div class='marco hide'><a href='/historico/promocion2/index.php'>Histórico 2ª - PROMOCIÓN DE ASCENSO</a></div>
                <div class='marco'><a href='/historico/promocion2b/index.php'>Histórico 2ª B - PROMOCIÓN DE ASCENSO</a></div>
                <div class='marco'><a href='/historico/promocion3/index.php'>Histórico 3ª - PROMOCIÓN DE ASCENSO</a></div>
                
                <hr />Buscador de jugadores:
                <form method='GET' action='/buscadorJugador.php'>
                  <div style='float:left; width:100%;'>
                    <input required type='text' name='nombre' placeholder='jugadores'>
                    <input type='hidden' name='pagina' value='1'>
                    <button type='submit' class='btn btn-default'><span class='glyphicon glyphicon-search pull-right'></span></button>
                  </div>
                </form><hr />
        </div>
      

    </div>
  </div><!-- /btn-group -->


  <div class="btn btn-success boldfont text-center">
    <a style='color:#ffffff'href='/resultados-directo/torneo/primera-division/1/'>1ª</a>
  </div>
  <div class="btn btn-success boldfont text-center">
    <a style='color:#ffffff' href='/resultados-directo/torneo/segunda-division/2/'>2ª</a>
  </div>
  <div class="btn btn-success boldfont text-center">
  <a style='color:#ffffff'href='/resultados-directo/torneo/segunda-division-b-grupo-1a/2615/'>2BG1A</a>
  </div>
  <div class="btn btn-success boldfont text-center">
  <a style='color:#ffffff'href='/resultados-directo/torneo/segunda-division-b-grupo-1b/2616/'>2BG1B</a>
  </div>
  <div class="btn btn-success boldfont text-center">
  <a style='color:#ffffff' href='/resultados-directo/torneo/segunda-division-b-grupo-2a/2617/'>2BG2A</a>
  </div>
  <div class="btn btn-success boldfont text-center">
  <a style='color:#ffffff' href='/resultados-directo/torneo/segunda-division-b-grupo-2b/2618/'>2BG2B</a>
  </div>
  <div class="btn btn-success boldfont text-center">
  <a style='color:#ffffff' href='/resultados-directo/torneo/segunda-division-b-grupo-3a/2619/'>2BG3A</a>
  </div>
  <div class="btn btn-success boldfont text-center">
  <a style='color:#ffffff' href='/resultados-directo/torneo/segunda-division-b-grupo-3b/2620/'>2BG3B</a>
  </div>
  <div class="btn btn-success boldfont text-center">
  <a style='color:#ffffff' href='/resultados-directo/torneo/segunda-division-b-grupo-4a/2621/'>2BG4A</a>
  </div>
  <div class="btn btn-success boldfont text-center">
  <a style='color:#ffffff' href='/resultados-directo/torneo/segunda-division-b-grupo-4b/2622/'>2BG4B</a>
  </div>
  <div class="btn btn-success boldfont text-center">
  <a style='color:#ffffff' href='/resultados-directo/torneo/segunda-division-b-grupo-5a/2623/'>2BG5A</a>
  </div>
  <div class="btn btn-success boldfont text-center">
  <a style='color:#ffffff' href='/resultados-directo/torneo/segunda-division-b-grupo-5b/2624/'>2BG5B</a>
  </div>
  

  <div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">3ª y Aut.</font></font></button>
    <div class="dropdown-menu" x-placement="bottom-start">
      <div class='col-xs-12' style="max-width: 350px;">
          <table class='table table-bordered table-condensed whitebox nomargin'>
                <tr class='darkgreenbox'><th  colspan='3'><div class='flagbox pais flag60b' style='margin-top:-5px; margin-right:10px'></div>Tercera División</th></tr>
                <?php 
//https://online.codere.es/promoRedirect?key=ej0xMzU5OTAwMCZsPTEzNTQzNTE5JnA9OTQ5MjE%3D 

$path = './json/index_cabecerasFed.json';
$json = file_get_contents($path);
$partidosFed = json_decode($json, true);




                foreach ($menu['tercera'] as $key => $temporal) {                  
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
  
  <div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Torneos</font></font></button>
    <div class="dropdown-menu" x-placement="bottom-start">
      <div class='col-xs-12' style="max-width: 350px">   
          <p class='boldfont'>Principales Clubes</p>
          <div class='marco'><a href='/resultados-directo/torneo/liga-de-campeones-de-la-uefa/183/'>LIGA DE CAMPEONES DE LA UEFA</a></div>
          <div class='marco'><a href='/resultados-directo/torneo/liga-europa-de-la-uefa-/184/'>LIGA EUROPA DE LA UEFA </a></div>
          <div class='marco'><a href='/resultados-directo/torneo/campeonato-de-espana---copa-de-s.m.-el-rey/186/'>CAMPEONATO DE ESPAÑA - Copa de S.M. El Rey</a></div>
          <hr /><p class='boldfont'>Principales Selección</p>
          <div class='marco'><a href='/resultados-directo/torneo/copa-mundial-de-la-fifa/216/'>COPA MUNDIAL DE LA FIFA</a></div>
          <div class='marco'><a href='/resultados-directo/torneo/campeonato-europeo-de-la-uefa-/238/'>CAMPEONATO EUROPEO DE LA UEFA </a></div>
          <hr /><a  id='RFEF'></a>
          <div class='darkgreenbox boldfont' style='padding:5px; font-size:22'><div class='flagbox pais flag60b' style='margin-top:-7px; margin-right:10px'></div>RFEF</div>
          <?php foreach ($menu['RFEF'] as $temporal) {
        $imagen = $temporal['imagenComunidad'];
        $nombreCom = $temporal['nombreComunidad'];
        if (266 == $temporal['temporada_id'] || 267 == $temporal['temporada_id']) {
            if (10 == $temporal['imagenComunidad']) {
                $nombreCom .= ' y Melilla';
                $imagen = 55;
            }
            if (11 == $temporal['imagenComunidad']) {
                $nombreCom .= ' y Ceuta';
                $imagen = 56;
            }
        } ?>
            
              <div class='marco'><div class='comunidad flag<?php echo $imagen; ?>'></div>
              <a href='/resultados-directo/torneo/<?php echo poner_guion(
                   $temporal['nombre']
               ); ?>/<?php echo $temporal['temporada_id']; ?>/'><?php echo $temporal['nombre']; ?></a>
              </div>
          <?php
    } ?>
          <hr />
          <div class='darkgreenbox boldfont' style='padding:5px; font-size:22'><div class='flagbox pais flag200b' style='margin-top:-7px; margin-right:10px'></div>FIFA</div>
          <?php foreach ($menu['FIFA'] as $temporal) {
        ?>
          <div class='marco'>
          <a href='/resultados-directo/torneo/<?php echo poner_guion(
                   $temporal['nombre']
               ); ?>/<?php echo $temporal['temporada_id']; ?>/'><?php echo $temporal['nombre']; ?></a>
          </div>
          <?php
    } ?>
          <hr />
          <div class='darkgreenbox boldfont' style='padding:5px; font-size:22'><div class='flagbox pais flag199b' style='margin-top:-7px; margin-right:10px'></div>UEFA</div>
          <?php foreach ($menu['UEFA'] as $temporal) {
        ?>
          <div class='marco'>
          <a href='/resultados-directo/torneo/<?php echo poner_guion(
                   $temporal['nombre']
               ); ?>/<?php echo $temporal['temporada_id']; ?>/'><?php echo $temporal['nombre']; ?></a>
          </div>
          <?php
    } ?>
      </div>
    </div>
  </div>
    
<div class="btn-group hide">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">América</font></font></button>
    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 42px, 0px); top: 0px; left: 0px; will-change: transform;">
      <div class='menu_16' style='font-size:12px'>
          <?php foreach ($menu['america'] as $p) {
        foreach ($p as $temporal) {          
            ?>
              <div class='marco'><div class='pais flag<?php echo $temporal['imagenPais']; ?>b  style='margin-top:-5px; margin-right:10px'></div>
              <?php echo $temporal['nombrePais']; ?><br />
              <a href='/resultados-directo/torneo/<?php echo poner_guion(
                       $temporal['nombre']
                   ); ?>/<?php echo $temporal['temporada_id']; ?>/'><?php echo $temporal['nombre']; ?></a>
              </div>
          <?php
        }
    } ?>
      </div>

    </div>
  </div>
  

<div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Europa</font></font></button>
    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 42px, 0px); top: 0px; left: 0px; will-change: transform;">

      <div class='col-xs-12' style="max-width: 350px">   
          <div class='marco'><div class='pais flag60b  style='margin-top:-5px; margin-right:10px'></div>
            España - Ranking UEFA <b>1º</b><br />
            <a href='/resultados-directo/torneo/primera-division/1/'>Primera División</a>
          </div>

          <?php 

          $contador=0;
          foreach ($menu['europa'] as $key => $p) {
            $contador++;
        foreach ($p as $temporal) { ?>
              <div class='marco'><div class='pais flag<?php echo $temporal['imagenPais']; ?>b  style='margin-top:-5px; margin-right:10px'></div>
              <?php echo $temporal['nombrePais']; ?> - Ranking UEFA <b><?php echo (($temporal['orden']/10)+1)?>º</b><br />
              <a href='/resultados-directo/torneo/<?php echo poner_guion(
                       $temporal['nombre']
                   ); ?>/<?php echo $temporal['temporada_id']; ?>/'><?php echo $temporal['nombre']; ?></a>
              </div>
          <?php
        }
    } ?>
      </div>
    </div>
  </div>


<div class="btn-group hide">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Autonómicas</font></font></button>
    <div class="dropdown-menu" x-placement="bottom-start">
      <div class='col-xs-12' style="max-width: 350px">   
      <?php foreach ($menu['autonomica'] as $comunidad => $temporals) { ?>

              <div class='comunidad flag<?php echo $temporals[0]['imagenComunidad']; ?>'></div>
              <p><?php echo $comunidad; ?></p>
                <?php foreach ($temporals as $temporal) {
            ?>
                <div class='marco'>
                <a href='/resultados-directo/torneo/<?php echo poner_guion($comunidad); ?>-<?php
                   echo poner_guion(
                       $temporal['nombre']
                   ); ?>/<?php echo $temporal['temporada_id']; ?>/'><?php echo $temporal['nombre']; ?></a>
                </div>

                <?php
        } ?>
        <div class="h25"></div>
          <?php
    } ?>

      </div>

    </div>
  </div>
    

 <div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Juvenil</font></font></button>
    <div class="dropdown-menu" x-placement="bottom-start">
     <div class='col-xs-12' style="max-width: 350px"> 
          <?php foreach ($menu['juvenil'] as $temporal) {
        $imagen = $temporal['imagenComunidad'];
        if (34 == $temporal['temporada_id'] || 35 == $temporal['temporada_id']) {
            if (10 == $temporal['imagenComunidad']) {
                $nombreCom .= ' Y MELILLA';
                $imagen = 55;
            }
            if (11 == $temporal['imagenComunidad']) {
                $nombreCom .= ' Y CEUTA';
                $imagen = 56;
            }
        } ?>
              <div class='marco'>
              <div class='comunidad flag<?php echo $imagen; ?>' style='clear:both'></div>
              <a href='/resultados-directo/torneo/<?php echo poner_guion(
                   $temporal['nombre']
               ); ?>/<?php echo $temporal['temporada_id']; ?>/'><?php echo $temporal['nombre']; ?></a>
              </div>
          <?php
    } ?>
      </div>
    </div>
  </div>   

 <div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Femenino</font></font></button>
    <div class="dropdown-menu" x-placement="bottom-start">
      <div class='col-xs-12' style="max-width: 350px">
                <?php foreach ($menu['femenino'] as $temporal) {
              ?>
                    <div class='marco'><div class='comunidad flag<?php echo $temporal['imagenComunidad']; ?>'></div>
                    <a href='/resultados-directo/torneo/<?php echo poner_guion(
                         $temporal['nombre']
                     ); ?>/<?php echo $temporal['temporada_id']; ?>/'><?php echo $temporal['nombre']; ?></a>
                    </div>
                <?php
          } ?>
            </div>
    </div>
  </div>

  <div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Fútbol Sala</font></font></button>
    <div class="dropdown-menu" x-placement="bottom-start">
      <div class='col-xs-12' style="max-width: 350px">
                <?php foreach ($menu['sala'] as $temporal) {
              ?>
                    <div class='marco'><div class='comunidad flag<?php echo $temporal['imagenComunidad']; ?>'></div>
                    <a href='/resultados-directo/torneo/<?php echo poner_guion(
                         $temporal['nombre']
                     ); ?>/<?php echo $temporal['temporada_id']; ?>/'><?php echo $temporal['nombre']; ?></a>
                    </div>
                <?php
          } ?>
            </div>
    </div>
  </div>

      
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



