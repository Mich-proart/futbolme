

<div class="panel panel-default">
<h1 style="text-align:center"><?php echo $partidoH['nombreTemporada']; ?></h1>
<h2 style="text-align:center"><?php

 $txtJornada = 'Jornada '.$partidoH['jornada'];

    $id_eliminatoria = $partidoH['jornada'];
    include '../eliminatorias.php';

echo $txtJornada;

?></h2>
								

                                <div class="panel-heading">	
									<div class="table-responsive whitebox">
										


										    <!--Begin Equipo y puesto-->

    <div class="row nomargin">
        <div class="col-xs-12 col-md-12 col-lg-12 nopadding">
            <div class="col-xs-6 col-md-6 col-lg-6 text-center border-right-black">
                <div class="row h10"></div>
                    <p><?php echo $partidoH['nomCasa']; ?></p>
            </div>
            <div class="col-xs-6 col-md-6 col-lg-6 text-center">
                <div class="row h10"></div>
                <p><?php echo $partidoH['nomFuera']; ?></p>
            </div>
        </div>
    </div>   

    <!--Begin match teams-->

    <div class="row nomargin">
        <div class="row h10 nomargin"></div>
        <div class="col-xs-3 col-md-4 col-lg-4 text-center" style="max-height:200px">
            <img class="escudo_ind" src="/img/equipos/escudo<?php echo $partidoH['fm_local_id']; ?>.png" width="150" alt="escudo">
        </div>

        <div class="col-xs-3 col-md-2 col-lg-2 blackbox text-center border-right-white" style="border-radius: 10px;">
            <p class="marcador"><?php echo $partidoH['resulCasa']; ?></p>
        </div>

        <div class="col-xs-3 col-md-2 col-lg-2 blackbox text-center border-left-white" style="border-radius: 10px;">
            <p class="marcador"><?php echo $partidoH['resulFuera']; ?></p>
        </div>

        <div class="col-xs-3 col-md-4 col-lg-4 text-center" style="max-height:200px">
            <img class="escudo_ind" src="/img/equipos/escudo<?php echo $partidoH['fm_visitante_id']; ?>.png" width="150" alt="escudo">
        </div>
    </div>
    <div class="row h10 nomargin"></div>
    <div class="col-xs-12 col-md-12 col-lg-12 nopadding text-center">
    <?php echo nombreDiaCompleto($partidoH['fecha']); ?>  
    <?php echo substr($partidoH['hora'], 0, 2).':'.substr($partidoH['hora'], -2); ?>
    </div>

                    <?php if (strlen($partidoH['cosas']) > 5) {
    $cadena = desglosarTexto($partidoH['cosas']); ?>
                    
                        
                        <div class="col-xs-6 col-md-6 col-lg-6 nopadding">
                        <?php if (strlen($cadena[1]) > 2) {
        ?>
                            <p class="observacion-partido w100 cronicaL"><i>
                            <?php echo $cadena[1]; ?>
                            </i></p>
                        <?php
    } ?>
                        </div>
                        
                        
                        <div class="col-xs-6 col-md-6 col-lg-6 nopadding">
                        <?php if (strlen($cadena[2]) > 2) {
        ?>
                            <p class="observacion-partido w100 cronicaR"><i>
                            <?php echo $cadena[2]; ?>
                            </i></p>
                        <?php
    } ?>
                        </div>
                        
                        <?php if (strlen($cadena[0]) > 2) {
        ?>
                        <div class="col-xs-12 col-md-12 col-lg-12 nopadding">
                            <p class="observacion-partido w100 text-right"><i>
                            <?php echo $cadena[0]; ?>
                            </i></p>
                        </div>
                        <?php
    } ?>               


                    <?php
} ?>




									</div>										
								</div>	



    <?php
    if (!isset($eliminatorio)) {
        $archivo = '../../historico/liga/partidos/nac'.$partido_id.'.xml';
    } else {
        $archivo = './historico/liga/partidos/nac'.$partido_id.'.xml';
    }

    if (file_exists($archivo)) {
        ?>
    <div class="col-xs-12 col-md-12 col-lg-12 mnopadding">
     <?php
     $xml = simplexml_load_string(file_get_contents($archivo));
        echo $xml[0]; ?>
    </div>
    <?php
    } ?>

    <?php if (isset($eliminatorio)) {
        ?><div style="clear:both"></div><?php
    } ?>
    


<?php if (!isset($eliminatorio)) {
        ?>

<?php if (isset($_GET['ok'])) {
            ?>
<div class="alert alert-success dismiss">
    Hemos recibido tu sugerencia. Muchas gracias por tu colaboración.
    <a href="#" class="close" data-dismiss="alert">&times;</a>
</div>
<?php
        } ?>


<div class="panel-body">
	<?php if (isset($_SESSION['logeado']) && $_SESSION['logeado'] = 1) {
            ?>
	<?php 
        $fecha = '';
            $hora = '';
            if ($p[0]['fecha']) {
                $fecha = $p[0]['fecha'];
            } ?>
	<a class="btn btn-primary hide" data-toggle="collapse" href="#collapseForm" aria-expanded="false" aria-controls="collapseForm">
		Enviar modificación de datos
	</a>
	<div class="collapse" id="collapseForm">
		<form style="margin-top:25px;" action="/historico/copa/crearSugerencia.php" method="POST">
			<div class="row">
				<div class="col-xs-7">
						<div class="form-group">
						<label class="control-label col-sm-3" for="form_fecha">
        					Fecha:
                        </label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" value="<?php echo $fecha; ?>"  name="fecha" id="form_fecha">
                        </div>
                    </div>
				</div>
				<div class="col-xs-5">
					<div class="form-group">
						<label class="control-label col-sm-3" for="form_hora">
        					Hora:
                        </label>
                        <div class="col-sm-9">
                            <input class="form-control" value="<?php echo substr($partidoH['hora'], 0, 2).':'.substr($partidoH['hora'], -2); ?>"  name="hora" id="form_hora">
                        </div>
                    </div>
				</div>
			</div>
			<div style="margin-top:10px;" class="row">
				<div class="col-xs-6">
					<div class="form-group">
						<label class="control-label col-sm-8" for="form_local_goles">
        					Goles local:
                        </label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" value="<?php echo $p[0]['local_goles']; ?>"  name="local_goles" id="form_local_goles">
                        </div>
                    </div>
				</div>
				<div class="col-xs-6">
					<div class="form-group">
						<label class="control-label col-sm-8" for="form_visitante_goles">
        					Goles visitante:
                        </label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" value="<?php echo $p[0]['visitante_goles']; ?>"  name="visitante_goles" id="form_visitante_goles">
                        </div>
                    </div>
				</div>
			</div>											
			<div class="row form-group">
				<label class="control-label col-sm-3" for="form_cosas">
					Observaciones:
                </label>
                <div class="col-sm-9">
                    <textarea name="cosas" id="form_cosas" class="form-control" rows="3"></textarea>
                </div>
            </div>
            <div style="margin-top:10px;" class="row form-group">
				<label class="control-label col-sm-3" for="form_enlaces">
					Enlaces:
                </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value=""  name="enlaces" id="form_enlaces">
                </div>
                Si hay algún video o información interesante sobre este partido puedes dejarnos el enlace y lo vincularemos.
            </div>
			<input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" class="form-control" name="usuario_id" id="form_usuario_id">
			<input type="hidden" value="<?php echo $partido_id; ?>" class="form-control" name="partido_id" id="form_partido_id">
			<div class="form-group input-sm">
            	<input type="submit" value="Enviar" class="btn btn-default pull-right">
            </div>											
		</form>
	</div>
	<?php
        } else {
            ?>

    <a class="btn btn-default hide" href="/loginUsuario.php">Si puedes aportar información de este partido, autentifícate.</a>
                
    <?php
        } ?>
</div>
<?php
    } //no existe eliminatorio?>

</div>

