<?php 
/*
if ($partido['fecha']>'2018-06-13') { ?>   
<div class="txt11 text-right col-xs-6 whitebox pull-right" style="margin-top: 4px;"> 
<span style="cursor:pointer;" onclick="ver_alineaciones(<?php echo $partido['id']; ?>,<?php echo $partido['temporada_id']; ?>,1)"><b class="caret" style="border-top: 12px solid;
        border-right: 8px solid transparent;
        border-left: 8px solid transparent; color:#337ab7; margin-top:-3px; margin-right:100px">
        <div style="margin-top:-14px; margin-left:12px;">Alineaciones</div></b> 
</span> 
</div>

<div id="alineaciones-<?php echo $partido['id']?>"></div>	
<?php 
}*/



 if ($partido['temporada_id']==216 && $partido['estado_partido']==0) {
	if ($partido['fecha']>'2018-06-13') { ?>   
	<div class="txt11 text-left col-xs-6 whitebox pull-left" style="margin-top: 4px;"> 
	<span style="cursor:pointer;" onclick="ver_apuestas(<?php echo $partido['id']; ?>,<?php echo $partido['temporada_id']; ?>,1)"><b class="caret" style="border-top: 12px solid;
	        border-right: 8px solid transparent;
	        border-left: 8px solid transparent; color:#337ab7; margin-top:-3px;">
	        <div style="margin-top:-14px; margin-left:12px;">Apuestas</div></b> 
	</span> 
	</div>

	
    <div id="odds-<?php echo $partido['id']; ?>" class="ods"></div>
	<div class="clear"></div>
	<?php 
	}
}



?>