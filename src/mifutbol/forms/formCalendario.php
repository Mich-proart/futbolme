<form method="post"  name="cal<?php echo $valorGrupo?>" onsubmit="editCalendario(event, $(this).serialize(),<?php echo $valorGrupo?>)">
 <input type="hidden" name="gestor" value="<?php echo $valorGestor?>" >
 <input type="hidden" name="grupo" value="<?php echo $valorGrupo?>" >
 <input type="hidden" name="calendario" value="1" >  
 <input type="hidden" name="valor" value="<?php echo $valor?>" >
 <input type="hidden" name="territorial" value="<?php echo $territorial?>" >
 
<?php 

if ($valor==0){
echo $txtp1. ' el calendario de este torneo para su gestión.'; 
    foreach ($dCal as $k => $v) { 
        foreach ($v as $k1 => $v1) { 
            //echo 'local_id:'.$v1['local_id'].'<br />';?>
        <input type="hidden" name="jornada[<?php echo $k?>][<?php echo $k1?>]" value="<?php echo $v1['jornada']?>">
        <input type="hidden" name="fecha[<?php echo $k?>][<?php echo $k1?>]" value="<?php echo $v1['fecha']?>">
        <input type="hidden" name="local_id[<?php echo $k?>][<?php echo $k1?>]" value="<?php echo $v1['local_id']?>">
        <input type="hidden" name="visitante_id[<?php echo $k?>][<?php echo $k1?>]" value="<?php echo $v1['visitante_id']?>">
        <input type="hidden" name="local[<?php echo $k?>][<?php echo $k1?>]" value="<?php echo $v1['local']?>">
        <input type="hidden" name="visitante[<?php echo $k?>][<?php echo $k1?>]" value="<?php echo $v1['visitante']?>">
        <?php }
    } ?>
    <button type="submit" name="<?php echo $txt2?>" style="margin-top: 10px"><?php echo $txtp2?></button>
    </form>
<?php } else {

foreach ($dCal as $k => $v) { 
    if (($k+1)==$ja){?>
    <input type="hidden" value="<?php echo $ja?>" name="jornada">
    <?php echo '<div class="whitebox"><h4>Jornada '.$ja.'</h4><table cellspacing="1" cellpadding="1" bgcolor="black">';
        foreach ($v as $k1 => $v1) {
            $local='';$visitante='';
            foreach ($dEq as $k2 => $v2) {
                if ($v1['local_id']==$v2['id']){ $local=$v2['equipo']; }
                if ($v1['visitante_id']==$v2['id']){ $visitante=$v2['equipo']; }
            } 
            $gl=$v1['goles_local'];
            $gv=$v1['goles_visitante'];
            $hora=$v1['hora']??'00:00';
            switch ($v1['estado_partido']) {
                case '0':$ep=0;$eptxt='No jugado';$colorFila='white';break;
                case '1':$ep=1;$eptxt='Final';$colorFila='GREENYELLOW';break;
                case '2':$ep=2;$eptxt='En juego';$colorFila='SALMON';break;
                case '3':$ep=3;$eptxt='aplazado';$colorFila='ORANGE';break;
                case '4':$ep=4;$eptxt='suspendido';$colorFila='VIOLET';break;
            }?>
        <tr bgcolor="<?php echo $colorFila?>">
            <td><input type="txt" style="text-align: center" value="<?php echo $v1['fecha']?>" size="10" name="fecha[<?php echo $k1?>]"></td>
            <td><input type="txt" style="text-align: center" value="<?php echo $hora?>" size="5" name="hora[<?php echo $k1?>]"></td>
            <td align="right">
                <?php //echo $local?>        
                <select name="local_id[<?php echo $k1?>]">
                    <option value="<?php echo $v1['local_id']?>,<?php echo $local?>" selected><?php echo $local?></option>
                    <?php foreach ($dEq as $k2 => $v2) { ?>
                       <option value="<?php echo $v2['id']?>,<?php echo $v2['equipo']?>"><?php echo $v2['equipo']?></option>
                    <?php } ?>
                </select>
                    
            </td>
            <td><input type="txt" style="text-align: center" value="<?php echo $gl?>" size="2" name="gl[<?php echo $k1?>]"></td>
            <td><input type="txt" style="text-align: center" value="<?php echo $gv?>" size="2" name="gv[<?php echo $k1?>]"></td>
            <td align="left">
                <?php //echo $visitante?>                
                <select name="visitante_id[<?php echo $k1?>]">
                    <option value="<?php echo $v1['visitante_id']?>,<?php echo $visitante?>" selected><?php echo $visitante?></option>
                    <?php foreach ($dEq as $k2 => $v2) { ?>
                    <option value="<?php echo $v2['id']?>,<?php echo $v2['equipo']?>"><?php echo $v2['equipo']?></option>
                    <?php } ?>
                </select>
                    
                </td>
            <td>
                <select name="ep[<?php echo $k1?>]">
                    <option value="<?php echo $ep?>"><?php echo $eptxt?></option>
                    <option value="0">No jugado</option>
                    <option value="1">Final</option>
                    <option value="2">En juego</option>
                    <option value="3">aplazado</option>
                    <option value="4">suspendido</option>
                </select>
            </td>
        </tr>
        <?php }
        echo '</table></div>';
    } // si la key es igual a jornada
} //recorremos el calendario

$jdas=$k+1; ?>
<button type="submit" name="<?php echo $txt2?>" style="margin-top: 10px"><?php echo $txtp2?></button>
</form>
<div class="pull-right" style="background-color: orange; padding: 5px">
    <form method="post"  name="act<?php echo $valorGrupo?>" onsubmit="editActiva(event, $(this).serialize(),<?php echo $valorGrupo?>)">
     <input type="hidden" name="gestor" value="<?php echo $valorGestor?>" >
     <input type="hidden" name="grupo" value="<?php echo $valorGrupo?>" >
     <input type="hidden" name="calendario" value="2" >
     <input type="hidden" name="territorial" value="<?php echo $territorial?>" >
     <select name="jActiva">
         <?php for ($i=1; $i < $jdas ; $i++) { ?>
             <option value="<?php echo $i?>">Jornada <?php echo $i?></option>
         <?php }?>
     </select>
     <button type="submit" name="activa">Jornada activa</button>
    </form>
</div>
<div class="h10 clear"></div>
<?php } // si valor = 1?>
<div class="clear"></div>