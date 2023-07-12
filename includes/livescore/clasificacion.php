

<table id="latabla" class="table tablesorter table-bordered table-condensed greenbox nomargin txt11">        
    <thead>
        <tr class="darkgreenbox h40 nopadding">
        <th style="padding: 1px;" class="text-center" title="Posición">P</th>
        <th style="padding: 1px;min-width: 130px" class="text-center">Equipo</th>
        <th style="padding: 1px;" class="text-center" title="Puntos">Pts</th>
        <th style="padding: 1px;" class="text-center" title="Jugados">Ju</th>
        <th style="padding: 1px;" class="text-center" title="Ganados">Ga</th>
        <th style="padding: 1px;" class="text-center" title="Empatados">Em</th>
        <th style="padding: 1px;" class="text-center" title="Perdidos">Pe</th>
        <th style="padding: 1px;" class="text-center" title="Goles a favor">Fav</th>
        <th style="padding: 1px;" class="text-center" title="Goles en contra">Con</th>
        <th style="padding: 1px;" class="text-center hidden-xs" title="Diferencia de goles">Dif</th>
    </tr>
    </thead>    

    <tbody class="whitebox">
        <?php 

       

        foreach ($total['rows'] as $key => $fila) {

        $pgEquipo = '/resultados-directo/equipo/'.poner_guion($fila['team']['name']).'/'.(10000000+$fila['team']['id']).'&temp_id='.$temp_id; ?>

           


        <tr>
            
        	<td class="text-center" padding: 1px;"><?php echo $fila['pos']; ?></td>
    		<td style="text-align:left; padding: 1px;min-width: 130px">
            <img src="https://assets.b365api.com/images/team/s/<?php echo $fila['team']['id']?>.png">
            <a href="<?php echo $pgEquipo?>"><?php echo $fila['team']['name']?></a>
    		</td>
    		<td class="text-center" style="padding: 1px;?>">
    		<b><?php echo $fila['points']; ?></b>
    		</td>
    		<td class="text-center" style="padding: 1px;?>">
            <?php echo ($fila['win']+$fila['draw']+$fila['loss'])?>
            </td>
    		<td class="text-center" style="padding: 1px;?>"><?php echo $fila['win']?></td>
    		<td class="text-center" style="padding: 1px;?>"><?php echo $fila['draw']?></td>
            <td class="text-center" style="padding: 1px;?>"><?php echo $fila['loss']?></td>
            <td class="text-center" style="padding: 1px;?>"><?php echo $fila['goalsfor']?></td>
            <td class="text-center" style="padding: 1px;?>"><?php echo $fila['goalsagainst']?></td>
            <td class="text-center" style="padding: 1px;?>"><?php echo $fila['goalDiffTotal']?></td>
            
        </tr>
        

         <?php
        } ?>
         
    		
    </tbody>
</table>

