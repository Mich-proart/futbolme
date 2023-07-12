<?php
define('_FUTBOLME_', 1);
require_once 'src/config.php';
$fecha = new \DateTime();
$dia = $fecha->format('Y-m-d');

$medios = Xmedios($dia);
$partidosSQL = Xtelevisados($dia);

if (isset($_GET['footters'])){

    $footters=array();
    foreach ($partidosSQL as $key => $value) {
        if ($value['idMedio']==132){ $footters[]=$value; }
    }
    unset($partidosSQL);
    $partidosSQL=$footters;
}



$partidos = prepararTelevisados($partidosSQL);



$pagina = 'televisados';

$contador = 0;
$inicio = '';
$final = '';
$key = 0;
foreach ($partidos as $key => $value) {
    if (0 == $contador) {
        $inicio = $key;
    }
    $contador = $contador + 1;
}

$final = $key;
$inicio = nombreDia($inicio);
$final = nombreDia($final);
$inicio = str_replace(',', '', $inicio);
$final = str_replace(',', '', $final);

//$central="televisados";
$metaDescripcion = 'Guia de partidos de fútbol televisados en los próximos días';

?>
<?php require_once 'includes/head.php'; ?>
<title>Resultados de fútbol y clasificaciones - Partidos Televisados - Futbolme</title>
</head>

<?php require_once 'includes/contenedorSup.php'; ?>

<div class="col-xs-12 celestebox">
    <?php if (!isset($_GET['footters'])){ ?>
    <ul class="nav nav-pills h40" style="float:left">
        <li class="dropdown h40">
            <a class="dropdown-toggle btn btn-warning boldfont" data-toggle="dropdown" href="#">Filtro TV</a>
            <ul class="dropdown-menu" style='margin-left: 0'>
                <li class="filtro-tv-xs h40 padding1" data-valor="todos"><a>TODOS LOS CANALES</a></li>
                <?php foreach ($medios as $medio) {
                    ?>
                    <li class="filtro-tv-xs h40 padding1" data-valor="<?php echo $medio['medio_id']; ?>"
                        style="color:black; cursor:pointer">
                        <img alt="<?= $medio['medio_id']; ?>"
                             src="img/television/medio<?php echo $medio['medio_id']; ?>.png" width="30" height="30"
                             style="margin-left: 10px;">
                        <?php echo $medio['medio']; ?> (<?php echo $medio['nMedios']; ?>)
                    </li>
                    <!--Fin cadena tv-->
                    <?php
                } ?>
            </ul>
        </li>
    </ul>
    <?php } ?>
    <h4 class="text-center txt13"><span style="color:white">Partidos televisados del <?php echo $inicio; ?> al <?php echo $final; ?></span></h4>
</div>

    <div class="col-xs-12 one-bordergrey-vert">
        <?php if ($google===1){ ?>


        <?php } ?>
    </div>

<div class="col-xs-12 nopadding">

    <?php
    $contador = 0;
    $equiposTw = array();
    $numDia=0;
    foreach ($partidos as $fecha => $partidoFecha) {
        $numDia++;
        ?>
        <!--Comienza una caja completa-->
        <div class="boxresultcomplete fecha
			<?php foreach ($partidoFecha as $partido) {
            ?>
			<?php foreach ($partido['tvs'] as $tv) {
                echo ' '.$tv['medio_id'];
            } ?>
			<?php
        } ?>
		">
            <?php
            if ($numDia >1 && 0 == $numDia % 2 && $numDia <5 ) {
                ?>
                <div class="col-xs-12 one-bordergrey-vert">
                    <!-- adaptable1 -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-2316935358389492"
                         data-ad-slot="7196777762"
                         data-ad-format="auto"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
                <?php }?>
            <!--Comienzo greenbox head-->
            <div class="col-xs-12 greenbox h40 clear" style="color: black">
                <div class="col-xs-12 text-right">
                    <h4><span class="boldfont"><?php echo nombreDia($fecha); ?></span></h4>
                </div>
            </div>
            <!--Fin greenbox head-->
            <!--Comienzo boxresultcontent genera la whitebox completa-->
            <div class="col-xs-12 whitebox nopadding">
                <?php

                foreach ($partidoFecha as $parti) {
                    
                    if ($contador < 10) {
                        $equiposTw[$contador]['id'] = $parti['partido']['equipoLocal_id'];
                        $equiposTw[$contador]['equipo'] = $parti['partido']['local'];
                        $equiposTw[$contador]['idPais'] = $parti['partido']['pais_local'];
                        $equiposTw[$contador + 100]['id'] = $parti['partido']['equipoVisitante_id'];
                        $equiposTw[$contador + 100]['equipo'] = $parti['partido']['visitante'];
                        $equiposTw[$contador + 100]['idPais'] = $parti['partido']['pais_visitante'];
                    }

                ++$contador; ?>
			<a name="tv-<?php echo $parti['partido']['id']; ?>" style="padding-top: 180px"></a>


                    <?php if (isset($_GET['id']) && $parti['partido']['id'] == $_GET['id']) {
                        echo "<div class='col-xs-12 h40 clear'></div>";
                    }

                    if (5 == $contador) {
                        require_once 'includes/publicidad/cuerpo01.php';
                    } ?>

                    <!-- Inicio boxresultcontentresultados-->
                    <div class="whitebox col-xs-12 partido
				<?php foreach ($parti['tvs'] as $tv) {
                        echo ' '.$tv['medio_id'];
                    } ?>" style="padding:0 !important; margin:0 !important;">
                        <!--Comienza bloque de resultados televisados-->

                        <div class="boxresultcontent" style="border: 1px solid black;">
                            <div class="col-xs-12 cajagrisclaro nopadding">
                                <div class="col-xs-7" style="padding:0 !important; margin:0 !important;">
                                    <?php
                                    $hora = date_create($parti['partido']['hora_prevista']); ?>
                                    <span class="textoStandar"><?php 
                                    if ($parti['partido']['categoria_torneo_id']==17) {
                                        echo '<b>Fútbol Sala</b> - '; 
                                    }
                                    echo $parti['partido']['nombreTemporada']; 

                                    ?></span>
                                </div>

                                <div class="col-xs-5" style="float:right; padding:0 !important; margin:0 !important;">
                                    <?php foreach ($parti['tvs'] as $tv) { ?>
                                        <div class="h40" style="float:right">

                                           <?php if ($tv['medio_id']==132){ 
                                            echo ' <a href="https://www.footters.com/register?ref=futbolmeoficial" target="_blank"><b>footters.com</b></a>';}?> 
                                            <img alt="<?= $tv['nombreMedio']; ?>"
                                                 src="/img/television/medio<?php echo $tv['medio_id']; ?>.png"
                                                 style="max-height: 38px">
                                            

                                        </div>
                                        <?php
                                    } ?>
                                </div>
                            </div>

                            <?php
                            $partido = $parti['partido'];
                            $pag = 'televisados';
                            $partido['partidoAPI'] = 0;                            
                            include 'includes/contenidoPartido.php'; ?>

                        </div>


                    </div>
                    <!--Finaliza bloque de resultados televisados-->
                    <?php
                } ?>

            </div>

        </div>
        <!--Fin de una caja completa-->
        <?php
    } ?>
</div>
<div class="h40 clear"></div>
</div>


                <?php 
                if (1 != $_SESSION['app']) {
                     require_once $nivel.'includes/right_sidebar.php';
                } ?>
        </div> <!-- id cPrincipal  -->
    </section>

</div>
<?php
//<script>
//    try {
//        var pageTracker = _gat._getTracker("UA-1140373-1");
//        pageTracker._trackPageview();
//    } catch(err) {}
//</script>

if (0 == $_SESSION['app']) { require_once 'includes/publicidad/skinANDinterstitial.php'; }



?>
<?php require_once 'includes/contenedorInf.php'; ?>

<script>
    $(function () {

        $('.filtro-tv-xs').click(function () {
            var id = $(this).attr('data-valor');
            console.log(id);
            if (id == "todos") {
                $('.partido').show();
                $('.fecha').show();
                $('html, body').animate({scrollTop: 0}, 0);
            } else {
                $('.fecha').show();
                $('.partido').show();
                $('.fecha').not('.' + id).hide();
                $('.partido').not('.' + id).hide();
                $('.fecha .' + id).show();
                $('.partido .' + id).show();
                $('html, body').animate({scrollTop: 0}, 0);
            }
        })

    });
</script>
