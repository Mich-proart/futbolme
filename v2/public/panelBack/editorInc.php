<div class="marco" id="noticia-<?php echo $v['id']?>" style="clear:both">
    <table><tr>
    	<td style="font-size: 13px"><?php echo $v['fecha']?></td>
    	<td style="font-size: 13px"><?php echo $v['posicion']?></td>
    	<td style="font-size: 13px">
      	<?php if ($v['portada']==1){
	      		if (substr($v['fecha'],0,10)==date('Y-m-d')) { echo '<b>V</b>'; } else { echo 'P'; }
	      	  } else { echo '-';}?>
      	</td>
      	<td style="font-size: 13px">
    <form  method="post" onclick="editor(event, this.serialize())" id="editor-<?php echo $v['id']?>">
      <input type="hidden" name="id" value="<?php echo $v['id']?>">
      <input type="hidden" name="modificar" value="1">
      <input type="submit" name="enviar" value="<?php echo $v['titulo']?>" />
      </form></td>
      <td style="font-size: 13px"><span onclick="quitarNoticia(<?php echo $v['id']?>)" style="cursor: pointer; color:red" class="boldfont pull-right">Q</span></td>
  </tr></table>
</div>