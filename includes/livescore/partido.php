<?php
$fecha = date_create();
date_timestamp_set($fecha, $v['time']);

    switch ($v['time_status']) {
              case '0': $txt_status='Sin comenzar';break;
              case '1': $txt_status='En juego';break;
              case '2': $txt_status='Para ser fijado';break;
              case '3': $txt_status='Finalizado';break;
              case '4': $txt_status='Pospuesto';break;
              case '5': $txt_status='Cancelado';break;
              case '6': $txt_status='Walkover';break;
              case '7': $txt_status='interrumpido';break;
              case '8': $txt_status='Abandonado';break;
              case '9': $txt_status='retirado';break;
              case '99': $txt_status='eliminado';break;          
              default: $txt_status='Sin definir';break;
        } ?>
        <tr>
          <td><?php echo date_format($fecha, 'Y-m-d H:i:s')?></td>
            <td><?php echo $v['home']['name']." ". $v['away']['name']?></td>
            <td><?php  
            if (isset($v['timer'])){
            echo "minuto: ".$v['timer']['tm']."<br />";
            echo "segundo: ".$v['timer']['ts']."<br />";
            echo "juego: ".$v['timer']['tt']."<br />";
            echo "prolongacion: ".$v['timer']['ta']."<br />";
            $totalMinutos=$v['timer']['tm']+$v['timer']['ta']+1;
            echo $totalMinutos;
            }?></td>
            <td><?php echo $txt_status?></td>
            <td><?php 
            if (isset($v['scores'])){
            echo $v['scores']['2']['home'].' - '.$v['scores']['2']['away'];
            }?></td>
            <td><?php 
            if (isset($v['extra']['round'])){
            echo 'Jornada '.$v['extra']['round'];
            }?></td>
        </tr>
    