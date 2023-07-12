<div class="col-xs-12 nopadding">
    <div class="col-xs-12 celestebox">
        <ul class="nav nav-pills h40" style="float:left">        
          <li class="dropdown h40">
            <a class="dropdown-toggle btn btn-warning boldfont" data-toggle="dropdown" href="#">Filtro TV</a>
            <ul class="dropdown-menu" style='margin-left: 0' >
                <li class="filtro-tv-xs h40 padding1" data-valor="todos"><a>TODOS LOS CANALES</a></li>
                <?php foreach ($medios as $medio) {
    ?>
                <li class="filtro-tv-xs h40 padding1" data-valor="<?php echo $medio['medio_id']; ?>" style="color:black"> 
                <img src="img/television/medio<?php echo $medio['medio_id']; ?>.png" width="30" height="30" style="margin-left: 10px;">
                    <?php echo $medio['medio']; ?> (<?php echo $medio['nMedios']; ?>)
                </li>
                <!--Fin cadena tv-->
                <?php
} ?>
            </ul>
          </li>
       </ul>
        <h4 class="text-center txt13"><span style="color:white">Partidos televisados del <?php echo $inicio; ?> al <?php echo $final; ?></span></h4>
    </div>

    
    
                

    <div class="col-xs-12 nopadding">

        <?php 
        //imp($_GET);
        $contador = 0;
        foreach ($partidos as $fecha => $partidoFecha) {
            ++$contador; ?>
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

                        <!--Comienzo greenbox head-->
        <div class="col-xs-12 greenbox h40 clear" style="color: black">
            <div class="col-xs-2"> 
                <?php 
                if (isset($_GET['n2']) && 'TVequipos' == $_GET['n2']) {
                    $contador = 2;
                } ?>   
            </div>
            <div class="col-xs-10 text-right">
                <h4><span class="boldfont"><?php echo nombreDia($fecha); ?></span></h4>
            </div>

        </div>
        <!--Fin greenbox head-->
        <!--Comienzo boxresultcontent genera la whitebox completa-->
        <div class="col-xs-12 whitebox">
            <?php foreach ($partidoFecha as $parti) {
                    ?>
                <!-- Inicio boxresultcontentresultados-->
                <div class="whitebox col-xs-12 col-md-12 col-lg-12 partido 
                <?php foreach ($parti['tvs'] as $tv) {
                        echo ' '.$tv['medio_id'];
                    } ?>" style="padding:0 !important; margin:0 !important;">
                <!--Comienza bloque de resultados televisados-->
                    
                    <div class="boxresultcontent" style="border: 1px solid black;">
                        <div class="col-xs-12 cajagrisclaro nopadding">
                            <div class="col-xs-7" style="padding:0 !important; margin:0 !important;">
                            <?php
                            $hora = date_create($parti['partido']['hora_prevista']); ?>
                                <span class="textoStandar"><?php echo $parti['partido']['nombreTemporada']; ?></span>
                            </div>

                            <div class="col-xs-5" style="float:right; padding:0 !important; margin:0 !important;">
                                    <?php foreach ($parti['tvs'] as $tv) {
                                ?>
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
                    $pagina = 'televisados';
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

<script>
    $(function() {

        $('.filtro-tv-xs').click(function(){     
            var id = $(this).attr('data-valor'); 
            console.log(id);       
            if(id == "todos") {
                $('.partido').show();
                $('.fecha').show();
                $('html, body').animate({ scrollTop: 0 }, 0);
            } else {
                $('.fecha').show();
                $('.partido').show();
                $('.fecha').not('.'+id).hide();
                $('.partido').not('.'+id).hide();
                $('.fecha .'+id).show(); 
                $('.partido .'+id).show(); 
                $('html, body').animate({ scrollTop: 0 }, 0);
            }        
        })

    });
</script>