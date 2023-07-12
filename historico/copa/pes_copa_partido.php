<div class="panel panel-default">
<h1 style="text-align:center"><?php echo $nombreTemporada; ?></h1>
<h2 style="text-align:center"><?php echo $partidoH['fase']; ?></h2>
<div class="col-xs-12 whitebox nopadding">	
        <div class="col-xs-12 whitebox">
            <div class="col-xs-6 col-md-6 col-lg-6 text-center border-right-black">
                <div class="row h10"></div>
                    <p class="boldfont"><?php echo $partidoH['local']; ?></p>
            </div>
            <div class="col-xs-6 col-md-6 col-lg-6 text-center">
                <div class="row h10"></div>
                <p class="boldfont"><?php echo $partidoH['visitante']; ?></p>
            </div>
        </div>
    

    <div class="col-xs-12 whitebox">
        <div class="row h10 nomargin"></div>
        <div class="col-xs-3 col-md-4 col-lg-4 text-center" style="max-height:200px">
            <img class="escudo_ind" src="/img/equipos/escudo<?php echo $partidoH['equipoLocal_id']; ?>.png" height="150" alt="escudo">
        </div>

        <div class="col-xs-3 col-md-2 col-lg-2 blackbox text-center border-right-white" style="border-radius: 10px;">
            <p class="marcador"><?php echo $partidoH['goles_local']; ?></p>
        </div>

        <div class="col-xs-3 col-md-2 col-lg-2 blackbox text-center border-left-white" style="border-radius: 10px;">
            <p class="marcador"><?php echo $partidoH['goles_visitante']; ?></p>
        </div>

        <div class="col-xs-3 col-md-4 col-lg-4 text-center" style="max-height:200px">
            <img class="escudo_ind" src="/img/equipos/escudo<?php echo $partidoH['equipoVisitante_id']; ?>.png" height="150" alt="escudo">
        </div>
    </div>
    <div class="row h10 nomargin"></div>
    <div class="col-xs-12 text-center">
    <?php echo nombreDiaCompleto($partidoH['fecha']); ?>  
    <?php echo substr($partidoH['hora_prevista'], 0, 2).':'.substr($partidoH['hora_prevista'], -2); ?>
    </div>

    <?php if (strlen($partidoH['observaciones']) > 5) {
    $cadena = desglosarTexto($partidoH['observaciones']); ?>
    <div class="col-xs-6 col-md-6 col-lg-6 nopadding">
        <?php if (strlen($cadena[1]) > 2) { ?>
            <p class="observacion-partido w100 cronicaL"><i>
            <?php echo $cadena[1]; ?>
            </i></p>
        <?php } ?>
    </div>
    <div class="col-xs-6 col-md-6 col-lg-6 nopadding">
        <?php if (strlen($cadena[2]) > 2) { ?>
            <p class="observacion-partido w100 cronicaR"><i>
            <?php echo $cadena[2]; ?>
            </i></p>
        <?php } ?>
    </div>
    <?php if (strlen($cadena[0]) > 2) { ?>
    <div class="col-xs-12">
        <p class="observacion-partido w100 text-right"><i>
        <?php echo $cadena[0]; ?>
        </i></p>
    </div>
    <?php  } 
      } ?>
      <div class="h40 clear"></div>

      <div class="col-xs-12 text-center">
        <div class="col-xs-6 text-center"><a href="/historico-copa-participaciones/<?php echo poner_guion($partidoH['localCorto'])?>/<?php echo $partidoH['equipoLocal_id']?>">Palmarés en Copa</a></div>
        <div class="col-xs-6 text-center"><a href="/historico-copa-participaciones/<?php echo poner_guion($partidoH['visitanteCorto'])?>/<?php echo $partidoH['equipoVisitante_id']?>">Palmarés en Copa</a></div>
      </div>

      <div class="h40 clear"></div>
      

</div>										
</div>	



  