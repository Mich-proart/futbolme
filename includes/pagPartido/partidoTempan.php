<?php 
$pesEnfrentamientos = ''; $pesPartido = '';
if ('Enfrentamientos' == $modelo) {
    $pesEnfrentamientos = 'active';
}
if ('Partido' == $modelo) {
    $pesPartido = 'active';
}

$fondo_color = '';
?>
<div class="cols-xs-12 nopadding">
<ul class="nav nav-tabs nopadding celestebox" role="tablist" id="pestaTemporada">      
        <li class="text-center boldfont <?php echo $pesPartido; ?>">
        <a href="<?php echo $pgPartido; ?>&modelo=Partido">Partido</a>
        </li>
    </ul>
<?php 

switch ($modelo) {
    case 'Partido': ?>

        <div class="row greenbox nomargin">
            <div class="col-xs-12"><h1>Partido entre <?=$partido['local']; ?> y <?=$partido['visitante']; ?></h1></div>
            <div class="col-xs-12">            
                <span class="pull-left">                            
                <?php echo $partido['nombreTemporada']; ?>
                <br />
                    <?php 
                    if (198 != $partido['jornada']) {
                        if (1 == $partido['tipo_torneo']) {
                            echo 'Jornada '.$partido['jornada'];
                        } else {
                            echo $partido['fase'];
                        }
                    } else {
                        echo 'Ligas Internacionales';
                    }

                    ?>
                </span>
            </div>
        </div> 
            <span class="pull-right"><?php echo utf8_encode(nombreDia($partido['fecha'])).$partido['hora_prevista']; ?>
                </span>                       
        
        <!--Fin row Jornada y división-->
        <!--Begin Equipo y puesto-->
        <div class="row">
        <div class="col-xs-12 nopadding">
            <div class="col-xs-6 text-center">
                <h4><?php echo $partido['local']; ?></h4>
            </div>
            <div class="col-xs-6 text-center">
                <h4><?php echo $partido['visitante']; ?></h4>
            </div>
        </div>
        </div>
        <!--Finish Row Jornada y división-->
        <!--Begin Match State-->

<!--Finish Match State-->

<!--Begin match teams-->
    <div class="row">

     
        <div class="col-xs-3 col-md-4 col-lg-4 text-center" style="max-height:200px">
            <?php if (1 == $partido['es_seleccion']) {
                        ?>
            <img class="escudo_ind" src="/img/paises/banderas/ban<?php echo $partido['paisLocal_id']; ?>.png" alt="bandera">
            <?php
                    } else {
                        ?>                            
            <img class="escudo_ind" src="/img/equipos/escudo<?php echo $partido['equipoLocal_id']; ?>.png" alt="escudo">
            <?php
                    } ?>
            
        </div>

        <div class="col-xs-3 col-md-2 col-lg-2 blackbox text-center border-right-white" style="border-radius: 10px; background-color:<?php echo $fondo_color; ?>;">
            
            <p class="marcador"><?php echo $partido['goles_local']; ?></p>
            
        </div>
        <div class="col-xs-3 col-md-2 col-lg-2 blackbox text-center border-left-white" style="border-radius: 10px; background-color:<?php echo $fondo_color; ?>;">
            
            <p class="marcador"><?php echo $partido['goles_visitante']; ?></p>
            
        </div>
        <div class="col-xs-3 col-md-4 col-lg-4 text-center" style="max-height:200px;">
            <?php if (1 == $partido['es_seleccion']) {
                        ?>
            <img class="escudo_ind" src="/img/paises/banderas/ban<?php echo $partido['paisVisitante_id']; ?>.png" alt="escudo">
            <?php
                    } else {
                        ?>  
            <img class="escudo_ind" src="/img/equipos/escudo<?php echo $partido['equipoVisitante_id']; ?>.png" alt="escudo">
            <?php
                    } ?>
            
        </div>
        <div class="clear h25"></div>

        
    </div>

  
   
     <div class="col-xs-12 marco">
    <?php require_once 'includes/publicidad/cuerpo04.php'; ?>
    </div>


       


            
            
            <?php 

            if (strlen($partido['youtube_id']) > 4) {
                if ('*mdp' == substr($partido['youtube_id'], 0, 4)) {
                    $c = explode('/', $partido['youtube_id']);
                    if (isset($c[5])) {
                        $idMD = $c[5];
                    } else {
                        $idMD = '0';
                    }
                    if (192 == $partido['id_original']) {
                        $bd = 3;
                    } else {
                        $bd = 4;
                    } ?>
                <div style="clear:both"></div>
                <div class="h25"></div>
                <div class="col-xs-12 clear text-right">
                <span >
                <a href='http://www.futbolplus.com/foro/mundodeportivo.php?id=<?php echo $partido['temporada_id']; ?>&bd=<?php echo $bd; ?>&p=<?php echo $partido['id']; ?>&idMD=<?php echo $idMD; ?>' target='_blank'>    
                Ver crónica en Mundo Deportivo <img src='/img/television/mdp.png' width='30' height='30'></a>
                </span>
                <div class="h25"></div>
                </div>
               <?php
                } ?>

            <?php
            }

            ?>


    <?php break;
    case 'Enfrentamientos': ?>
        <div class="col-xs-12 marconegro clear">
        <?php require_once 'includes/publicidad/cuerpo04.php'; ?>
        </div>
        <?php require_once 'includes/partido/partidoEnfrentamientos.php'; ?>

    <?php break;
} ?>
</div>

