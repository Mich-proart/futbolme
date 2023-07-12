<div class="panel panel-default">
<h5 style="margin:10px;">
<?php
echo 'Partido correspondiente a la 
jornada '.$partidoH['jornada'].' de '.$txtDivision.' de la 
temporada '.$partidoH['temporada'].'-'.substr(($partidoH['temporada'] + 1), -2);

?></h5>
			


			    <!--Begin Equipo y puesto-->

<div class="row nomargin">
<div class="col-xs-12 nopadding">
    <div class="col-xs-6 text-center border-right-black">
        <h4><?php echo $partidoH['nomCasa']; ?></h4>
    </div>
    <div class="col-xs-6 text-center">
        <h4><?php echo $partidoH['nomFuera']; ?></h4>
    </div>
</div>
<?php
$rutaEscudo1 = '/img/equipos/escudo'.$partidoH['fm_local_id'].'.png';
if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaEscudo1))) {
    $rutaEscudo1 = '/img/jugadores/NI.png';
}

$rutaEscudo2 = '/img/equipos/escudo'.$partidoH['fm_visitante_id'].'.png';
if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaEscudo2))) {
    $rutaEscudo2 = '/img/jugadores/NI.png';
} ?>

<div class="row h10"></div>
    <div class="col-xs-3 col-md-4 col-lg-4 text-center" style="max-height:200px">                          
        <img class="escudo_ind" src="<?php echo $rutaEscudo1?>" alt="escudo">
    </div>

    <div class="col-xs-3 col-md-2 col-lg-2 blackbox text-center border-right-white" style="border-radius: 10px; background-color:black;">        
        <p class="marcador"><?php echo $partidoH['resulCasa']; ?></p>        
    </div>
    <div class="col-xs-3 col-md-2 col-lg-2 blackbox text-center border-left-white" style="border-radius: 10px; background-color:black;">
        <p class="marcador"><?php echo $partidoH['resulFuera']; ?></p>        
    </div>
    <div class="col-xs-3 col-md-4 col-lg-4 text-center" style="max-height:200px;">
        <img class="escudo_ind" src="<?php echo $rutaEscudo2?>" alt="escudo">
    </div>


<div class="col-xs-12" style="margin-top: 50px;">
    <div class="col-xs-6">
        <?php  
        $datos = XequipoClub($partidoH['fm_local_id']);
        $equipoClub = $datos['datos'];
        $twEquipo = $equipoClub['slug'];
        $torneos = $datos['torneos'];
        $liga = $datos['liga'];
        $grupo_liga = $datos['grupo_liga'];
        if ($equipoClub['desaparecido']>0){ ?>
            <div class="marco txt11">
                El <?php echo $equipoClub['nombre_completo']?> fué un club de la ciudad de <?php echo $equipoClub['localidadEquipo']?> fundado en <?php echo $equipoClub['efundado']?> y que desapareció en <?php echo $equipoClub['desaparecido']?>

            </div>
        <?php } else { ?>
            <div class="marco txt11">
                El <?php echo $equipoClub['nombre_completo']?> es un club de la ciudad de <?php echo $equipoClub['localidadEquipo']?> fundado en <?php echo $equipoClub['efundado']?>
                 
                <?php if ($liga>0){ ?>
                 y que milita actualmente en la  <?php echo $torneos[0]['nombre']?>
                <?php } else { ?>
                 y que actualmente no figura en ninguna liga de las gestionadas en futbolme.com   
                <?php } ?>


            </div>
        <?php } ?>
    </div>
    <div class="col-xs-6">
        <?php  
        $datos = XequipoClub($partidoH['fm_visitante_id']);
        $equipoClub = $datos['datos'];
        $twEquipo = $equipoClub['slug'];
        $torneos = $datos['torneos'];
        $liga = $datos['liga'];
        $grupo_liga = $datos['grupo_liga'];
        if ($equipoClub['desaparecido']>0){ ?>
            <div class="marco txt11">
                <?php echo $equipoClub['nombre_completo']?> fué un club de la ciudad de <?php echo $equipoClub['localidadEquipo']?> fundado en <?php echo $equipoClub['efundado']?> y que desapareció en <?php echo $equipoClub['desaparecido']?>

            </div>
        <?php } else { 
            if (isset($liga) && $liga>0) { ?>
            <div class="marco txt11">
                <?php echo $equipoClub['nombre_completo']?> es un club de la ciudad de <?php echo $equipoClub['localidadEquipo']?> fundado en <?php echo $equipoClub['efundado']?> y que milita actualmente en la  <?php echo $torneos[0]['nombre']?>
            </div>
            <?php } else { ?>
                <div class="marco txt11">
                <?php echo $equipoClub['nombre_completo']?> es un club de la ciudad de <?php echo $equipoClub['localidadEquipo']?> fundado en <?php echo $equipoClub['efundado']?>. Actualmente no milita en ninguna categoría gestionada por futbolme.com 
               </div>
            <?php }
         }?>
    </div>
</div>

<div class="h40 clear"></div>

      <div class="col-xs-12 text-center">
        <div class="col-xs-6 text-center"><a href="/historico-liga/titulos/<?php echo poner_guion($txtDivision)?>/<?php echo poner_guion($partidoH['nomCasa'])?>/<?php echo $partidoH['fm_local_id']?>/<?php echo $division?>">Palmarés en Liga</a></div>
        <div class="col-xs-6 text-center"><a href="/historico-liga/titulos/<?php echo poner_guion($txtDivision)?>/<?php echo poner_guion($partidoH['nomFuera'])?>/<?php echo $partidoH['fm_visitante_id']?>/<?php echo $division?>">Palmarés en Liga</a></div>
      </div>

      <div class="h40 clear"></div>

        <?php if (strlen($partidoH['youtube_id']) > 4) {
            if ('*mdp' == substr($partidoH['youtube_id'], 0, 4)) {
                $c = substr($partidoH['youtube_id'], 4);
            }
            if (isset($c)) { ?>
                        <div style="clear:both"></div>
                        <span class='pull-right'>
                        <a class="pull-left" href="http://hemeroteca.mundodeportivo.com/preview<?php echo $c; ?>#&mode=fullScreen" target="_blank">
                        Ver la crónica de Mundo Deportivo <img src='/img/television/mdp.png' width='30' height='30'>
                        </a>
                        </span>                    
                <?php    }
        }?> 


</div>


	



								
</div>	