<?php

$files = glob('json/destacados/*.*');

//$files = glob('./json/eventos/ventanas/*_directo.json');
if (count($files)>0) { ?>
    <div class="NotiLateralGOL">
        <div class="CierreNotificacionGOL pull-right btn btn-default"
             style="font-size: 1em; clear:both"> X
        </div>
        <?php $contador = 0;
        foreach ($files as $key => $file) {
            $json = file_get_contents($file);
            $eventos = json_decode($json, true);
            
            
            $titulo=$eventos['fase'];
            $titulo2='';
            $clase1 = ''; //parpadeo
            $clase2 = '';
            $clase="pais"; $bandera=60;
            $escudoLocal='/img/equipos/escudo'.$eventos['equipoLocal_id'].'.png';
            $escudoVisitante='/img/equipos/escudo'.$eventos['equipoVisitante_id'].'.png';

            if ($eventos['comunidad_id'] > 1) {
                if (10 == $eventos['comunidad_id']) { $eventos['comunidad_id'] = 55; }
                if (11 == $eventos['comunidad_id']) { $eventos['comunidad_id'] = 56; }
                $clase="comunidad"; $bandera=$eventos['comunidad_id'];
            }            

            if ($eventos['pais_imagen'] > 1 && 60 != $eventos['pais_imagen']) { 
                $clase="pais"; $bandera=$eventos['pais_imagen'];
            }

            if ($eventos['es_seleccion']==1){
                $escudoLocal='/img/paises/banderas/ban'.$eventos['paisLocal_id'].'b.png';
                $escudoVisitante='/img/paises/banderas/ban'.$eventos['paisVisitante_id'].'b.png';
            } 

            if (isset($eventos['hora_prevista'])) {
                $horaPrevista = DateTime::createFromFormat('H:i:s', $eventos['hora_prevista']);
                $h = ' a las '.$horaPrevista->format('H:i');
            } else {
                $h = '';
            }
            

            ?>
            <div class="clear"></div>
            <div class="col-xs-12 nopadding">
                <div class="col-xs-12" style="text-align:center; font-size:13px;">
                    <div class="pull-left flagbox <?php echo $clase?> flag<?php echo $bandera; ?>b pull-right" style="margin-top:-10px; padding:10px"></div>
                    <a style="font-size: 15px;" href="/temporada.php?id=<?php echo $eventos['temporada_id']; ?>"><?php echo $eventos['nombreTemporada']; ?></a>
                </div>

                <div class="col-xs-12 boldfont text-center" style="font-size: 2em; color:red;">
                    <?php echo $titulo; ?>
                </div>
                <div class="col-xs-12 boldfont text-center nopadding" style="font-size: 14px; color:dimgray;">
                    <?php echo nombreDia($eventos['fecha']).$h."<br />"; ?>
                    <div class="h25"></div>
                </div>
            </div>

            <div class="col-xs-12 nopadding">
                <div class="col-xs-12 boldfont text-center" style="font-size: 1.2em;">
                    <img src="<?php echo $escudoLocal; ?>" style="height:30px; border: 1px solid black">&nbsp;&nbsp;&nbsp;
                     <?php echo $eventos['local']; ?>
                </div>
                <div class="h40 text-center clear" style="font-size: 1.2em;"> vs </div>
                <div class="col-xs-12 boldfont text-center" style="font-size: 1.2em;">
                    <img src="<?php echo $escudoVisitante; ?>" style="height:30px; border: 1px solid black">
                     &nbsp;&nbsp;&nbsp;<?php echo $eventos['visitante']; ?>
                </div>
            </div>  
            <div class="h25 text-center clear" style="border-bottom: 1px solid;"></div>
            <div class="col-xs-12" style="font-size: 15px;">
                <div class="h10"></div>
                <a href="/partido.php?id=<?php echo $eventos['id']; ?>"><?php echo $eventos['noticia']; ?><br /><div class="pull-right" style="font-size: 12px;">mas detalles...</div></a>
                <div class="clear"></div>
                 <div class="h10 text-center" style="background-color: gainsboro"></div>
                <div class="clear h10"></div>
            </div> 

        <?php } ?>
        
    </div>
<?php }

function nombreDia($fecha)
{
    $fecha = strtotime($fecha);
    $fecha = gmmktime(0, 0, 0, date('n', $fecha), date('j', $fecha), date('Y', $fecha));
    setlocale(LC_TIME, 'spanish');
    $nombre = utf8_encode(strftime('%A, %d de %B', $fecha));

    return $nombre;
}    