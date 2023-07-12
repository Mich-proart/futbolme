<?php

$data = json_decode($_POST['torneos']);
$files = glob('json/eventos/*.*');

$mensaje="";
if ($data[0]===0){
    $mensaje='<div class="text-center"><hr />Como no tienes equipos en tu cuenta, te mostraremos las notificaciones de Primera División.<br /> Cuando tengas equipos en tu cuenta de usuario, te mostraremos las notificaciones de los torneos de tus equipos.</div>';
    $data[0]=1;
}


//$files = glob('./json/eventos/ventanas/*_directo.json');
if (count($files)>0) { 
        $contador = 0;
        foreach ($files as $key => $file) {

        	$f=str_replace('json/eventos/', '', $file);
        	$ff=explode("-", $f);
        	$coincide=0;
        	foreach ($data as $value) {
        		//if((int)$value==(int)$ff[0] || (int)$value==(int)$ff[1]) { $coincide=1; break; } 
                if((int)$value==(int)$ff[2]) { $coincide=1; break; } 
        	}

        	if ($coincide==0){ continue; } 

            $contador++;

            if ($contador==1) { ?>

    <div class="NotiLateralGOL">
        <div class="CierreNotificacion pull-right btn btn-default"
             style="font-size: 1em; clear:both"> X
        </div>

            <?php }
        	
            $json = file_get_contents($file);
            $eventos = json_decode($json, true);

            if ((int)$eventos['estado_partido']==1) { $colorTxt="navy"; } else { $colorTxt="red"; }

            
            $titulo=$eventos['valor'];            
            $clase = '';
            $clase1 = ''; //parpadeo
            $clase2 = '';
            if ($eventos['evento']==5){ $clase1 = 'parpadea'; $clase="parpadea"; }
            if ($eventos['evento']==6){ $clase2 = 'parpadea'; $clase="parpadea"; }
             $bandera=60;
            $escudoLocal='/img/equipos/escudo'.$eventos['equipoLocal_id'].'.png';
            $escudoVisitante='/img/equipos/escudo'.$eventos['equipoVisitante_id'].'.png';
            ?>
            <div class="clear"></div>
            <div class="col-xs-12 nopadding" style="border: 1px solid dimgray; margin-top: 10px;">
                

                <div class="col-xs-12 boldfont text-center <?php echo $clase?>" style="font-size: 1.2em; color:<?php echo $colorTxt?>;">
                    <?php echo $titulo; ?>
                </div>

                <div class="col-xs-6" style="text-align:left; font-size:12px;">
                    <a style="font-size: 15px;" href="/temporada.php?id=<?php echo $eventos['temporada_id']; ?>">Ir al torneo</a>
                </div>
                <div class="col-xs-6" style="text-align:right; font-size:12px;">
                    <a style="font-size: 15px;" href="/partido.php?id=<?php echo $eventos['partido_id']; ?>">Ir al partido</a>
                </div>
                
            </div>

            <div class="col-xs-12 nopadding" style="border: 1px solid black">
            	<table class="col-xs-12 nopadding">
            		<tr class="h40">
                        <td width="30" class="text-center"><img src="<?php echo $escudoLocal; ?>" style="height:30px;"></td>
                        <td align="right" class="boldfont"><?php echo $eventos['local']; ?>&nbsp;&nbsp;</td>
                        <td width="30" class="text-center boldfont  <?php echo $clase1?>" style="font-size: 1.2em; color:<?php echo $colorTxt?>"><?php echo $eventos['goles_local']; ?></td>

            		</tr>
            		<tr class="h40">
                        <td width="30" class="text-center"><img src="<?php echo $escudoVisitante; ?>" style="height:30px;"></td>
                        <td align="right" class="boldfont"><?php echo $eventos['visitante']; ?>&nbsp;&nbsp;</td>
                        <td width="30" class="text-center boldfont  <?php echo $clase2?>" style="font-size: 1.2em; color:<?php echo $colorTxt?>"><?php echo $eventos['goles_visitante']; ?></td>

            		</tr>
            	</table>
                
            </div>  
            

        <?php } 

    if ($contador>0) { 
    echo $mensaje; ?>        
    </div>
<?php }
}
