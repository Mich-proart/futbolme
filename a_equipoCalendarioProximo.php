
<div class="col-xs-12 nopadding">                           
                <?php if (isset($proximoPartido['estado_partido'])) {
                $partido = $proximoPartido;
                $display = 'block';
                $clase = 'proximo';
                //$proxPart=$partido['id'];
                $partido_id = $partido['id'];
                unset($partido);
                $pgPartido = '/index.php?m=m&equipo='.$equipo_id.','.$equipo_txt;
                $pgPartido2 = $pgPartido.'&modelo=Enfrentamientos';
                if (isset($_GET['modelo'])) {
                    $modelo = $_GET['modelo'];
                } else {
                    $modelo = 'Partido';
                } ?>                            
                    <div class="proximo">
                        <?php 
                        
                require_once 'includes/pagPartido/arranque.php';
                require_once 'includes/pagPartido/partidoCabecera.php';


                if (isset($e1Clas) && isset($e2Clas)) { ?>
<table class="table table-bordered table-condensed whitebox nomargin txt11">
<?php 
$color_fondo = 'white';
        $txtPreferente = '';
        $jornadas = 0;
        for ($i = 0; $i < 2; ++$i) {
            if (0 == $i && !isset($e1Clas)) {
                continue;
            }
            if (1 == $i && !isset($e2Clas)) {
                continue;
            }
            if (isset($e1Clas) && 0 == $i) {
                $fila = $e1Clas;
                $temporada_id = $liga_local;
            }
            if (isset($e2Clas) && 1 == $i) {
                $fila = $e2Clas;
                $temporada_id = $liga_visitante;
            }
            if (isset($fila['preferente'])) {
                if (1 == $fila['preferente'] && 0 == $i) {
                    $color_fondo = 'yellow';
                    $txtPreferente = '*Clasificación En vivo';
                }
            }

            if (0 == $i) {
                ?>
        <thead>
            <tr class="darkgreenbox">
                <th class="text-center" colspan="2">
                <?php if ($tipo_eliminatoria==3) {
                    echo "En sus respectivas ligas...";
                } ?>
                </th>
                <th class="text-center" style="width:7%">P<span class="hidden-xs">TO</span>S</th>
                <th class="text-center" style="width:7%">J<span class="hidden-xs">U</span></th>
                <th class="text-center" style="width:7%">G<span class="hidden-xs">A</span></th>
                <th class="text-center" style="width:7%">E<span class="hidden-xs">M</span></th>
                <th class="text-center" style="width:7%">P<span class="hidden-xs">E</span></th>
                <th class="text-center" style="width:7%"><span class="hidden-xs">G</span>F</th>
                <th class="text-center" style="width:7%"><span class="hidden-xs">G</span>C</th>
                <th class="text-center" style="width:9%">D<span class="hidden-xs">I</span>F</th>
            </tr>
        </thead>
        <?php
            } ?>
        <tbody class="whitebox">
        <?php 
        if ($fila['jugados'] > $jornadas) {
            $jornadas = $fila['jugados'];
        }
            $pgEnlace = '/resultados-directo/equipo/'.poner_guion($fila['nombre']).'/'.$fila['equipo_id'];
            $color_fondo = 'white';
            if (isset($fila['preferente'])) {
                if (1 == $fila['preferente']) {
                    $color_fondo = 'yellow';
                }
            }
            $color_fila = '';
            if (isset($equipo_id) && $equipo_id == $fila['equipo_id']) {
                $color_fila = "style='background-color:gainsboro'";
            } 

            $rutaEscudo=rutaEscudo($fila['club_id'],$fila['equipo_id']);

            ?>
                <tr>
                    <td class="text-center" style="<?php echo $fila['css']; ?>"><?php echo $fila['posicion']; ?></td>
                    <td style="text-align:left;">
                        <span class="hidden-sm hidden-md hidden-lg">
                        <a href="<?php echo $pgEnlace; ?>&modelo=Calendario" title="Calendario del <?php echo $fila['nombreCorto']; ?>">
                        <img src="<?php echo $rutaEscudo?>"  alt="equipo" style="width:18px; height:20px">
                        <b><?php echo $fila['nombreCorto']; ?></b>
                        </a>
                        </span>
                        <span class="hidden-xs">
                        <a href="<?php echo $pgEnlace; ?>&modelo=Calendario" title="Calendario del <?php echo $fila['nombreCorto']; ?>">
                        <img src="<?php echo $rutaEscudo?>" alt="equipo"  style="width:18px; height:20px">
                        <b><?php echo $fila['nombre']; ?></b>
                        </a>
                        </span>
                    </td>
                    <td class="text-center" style="background-color:<?php echo $color_fondo; ?>">
                    <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Puntos" title="<?php echo $fila['nombreCorto']; ?> - Puntos conseguidos">
                    <b><?php echo $fila['puntos']; ?></b></a>
                    </td>
                    <td class="text-center">
                    <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Jugados" title="<?php echo $fila['nombreCorto']; ?> - Partidos jugados">
                    <?php echo $fila['jugados']; ?></a>
                    </td>
                    <td class="text-center">
                    <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Ganados" title="<?php echo $fila['nombreCorto']; ?> - Partidos ganados">
                    <?php echo $fila['ganados']; ?></a>
                    </td>
                    <td class="text-center">
                    <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Empatados" title="<?php echo $fila['nombreCorto']; ?> - Partidos empatados">
                    <?php echo $fila['empatados']; ?></a>
                    </td>
                    <td class="text-center">
                    <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Perdidos" title="<?php echo $fila['nombreCorto']; ?> - Partidos perdidos">
                    <?php echo $fila['perdidos']; ?></a>
                    </td>
                    <td class="text-center">
                    <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Favor" title="<?php echo $fila['nombreCorto']; ?> - Goles a favor">
                    <?php echo $fila['gFavor']; ?></a>
                    </td>
                    <td class="text-center">
                    <a style="color:black" href="<?php echo $pgEnlace; ?>&modelo=Clasificacion&vista=Contra" title="<?php echo $fila['nombreCorto']; ?> - Goles en contra">
                    <?php echo $fila['gContra']; ?></a>
                    </td>
                    <td class="text-center"><?php echo $fila['gFavor'] - $fila['gContra']; ?></td>
                </tr>  
            <?php
        } ?>
            <tr><td colspan="10" align="right"><?php echo $txtPreferente; ?></td></tr>  
                    </tbody>
            </table>
<?php } //si existe e2Clas o e1Cla


if (isset($proximosPartidos)) { ?>
            <div class="col-xs-12 marco clear txt11" style="background-color: gainsboro">
                <h4>Próximos partidos</h4>
                <div class="col-xs-5 text-center hide"><h5><a href="<?php echo $pg; ?>&n3=Siguientes">Próximos partidos</a></h5></div>
                <div class="col-xs-3 text-center hide"><h5><a href="<?php echo $pg; ?>&n3=Jugados">Jugados</a></h5></div>
                <div class="col-xs-4 text-center hide"><h5><a href="<?php echo $pg; ?>&n3=Jornada">Jornada (<?php echo $valorJornada; ?>)</a></h5></div>
             </div>   
                <div class="clear"></div>
                
            <div class="col-xs-12 marco clear txt11">
            <table class="table nomargin">
                <?php                 
                foreach ($proximosPartidos as $key => $value) {
                    if ($value['estado_partido']==1){ continue; }
                    if (5 == $key) { break; }
                    if($value['tipo_torneo']==1){
                        $txtTorneo="Liga";
                    } else {
                        $txtTorneo=$value['nombreTorneo'];
                        $txtTorneo=str_replace("CLUBES - ", "", $txtTorneo);
                        $txtTorneo=str_replace("CAMPEONATO DE ESPAÑA - ", "", $txtTorneo);
                    }?>

            <tr><td colspan="3" class="col-xs-12 h10"><span class="pull-left txt13" style="color:tomato;"><?php echo nombreDia($value['fecha']); ?></span>
                <span class="pull-right txt13" style="color:dimgray;"><?php echo $txtTorneo; ?></span>
            </td></tr>
            <tr class="h40">
          <td class="text-right"><span class="txt13"><?php echo $value['localCorto']; ?></span></td>
          <td class="text-center boldfont" style="color:black">
            <?php 
            
            if (substr($value['hora_prevista'],0,5)=='00:00') { echo ' - '; } else {
                echo substr($value['hora_prevista'],0,5);
            }

            ?></td>
          <td><span class="txt13"><?php echo $value['visitanteCorto']; ?></span></td>
              </tr>                  
                <?php
                } ?>
                </table>
            </div>   
<?php } 

$filtro=0;
$titol="últimos comentarios..."; 
$tiempoAcorrer=3600; //60 segundos por 60 minutos = 1 hora
 
require_once 'srcRecursos/pesLeerTwitsPortada.php';




                        ?>
                        </div>
                    </div>
                    <?php 
                    $displayJugados = 'none';
            } else {
                if (count($_SESSION['equipos'])==0){
                    echo "<h4 class='text-center' style='padding:10px'>No tienes equipos en tu futbolme.<br /> Pulsa <a href='/index.php?n1=config' class='btn btn-default' style='font-size:18px'>aquí</a> y <b>personaliza tu futbolme</b> con tus equipos preferidos.</h4>"; ?>

                    <div class="marco">
                        Personalizando tu futbolme podrás elegir en cualquier momento como quieres ver futbolme.<br />
                        Puedes elegir hasta 10 equipos y cuando entres en <b>Mifutbolme</b> tendrás un panel exclusivo con la información y enlaces rápidos a tus equipos y sus torneos, pudiendo conmutar a entre <b>futbolme</b> y <b>Mifutbolme</b> según lo prefieras

                    </div>

                    <?php

                } else {
                    echo "<h4 class='text-center' style='padding:10px'>De momento no hay próximo partido a corto plazo.</h4>";
                }
                
                $displayJugados = 'block';
            }
                        //die('hola');?>
                    <div class="row h40"></div>
            </div>