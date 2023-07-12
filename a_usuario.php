<?php


if (isset($_GET['error'])) {
    switch ($_GET['error']) { 
        case '1':
            $errorMensaje = 'No se han recibido datos';
        case '2':
            $errorMensaje = 'El nombre de usuario no puede superar los 20 caracteres'; 
            break;      
        case '3':
            $errorMensaje = 'El nombre de usuario ya existe, tienes que elegir otro.';
            break; 
        case '4':
            $errorMensaje = 'Solo se aceptan caracteres alfabéticos.';
            break;
        default:
            $errorMensaje = 'Error al enviar el formulario';
            break;
    }
}
if (isset($_GET['ok'])) {
    $mensaje = 'Datos actualizados con éxito';
}

if (isset($_GET['error'])) { ?>
		<div class="alert alert-danger dismiss">
		    <?php echo $errorMensaje; ?>
		    <a href="#" class="close" data-dismiss="alert">&times;</a>
		</div>
<?php } 
if (isset($_GET['ok'])) { ?>
	<div class="alert alert-success dismiss">
	    <?php echo $mensaje; ?>
	    <a href="#" class="close" data-dismiss="alert">&times;</a>
	</div>
<?php   } ?>
 <div class="col-xs-12 whitebox">	
 	 <h4 class="text-center">Cambiar nombre de usuario</h4>
        <div class="marco" style="background-color: gainsboro"><form id="form2" class="form" method="post" action="src/usuarios/actualizar.php" >
        <table class="col-xs-12"><tr><td>
        <label class="control-label required text-right" for="form_username">
            Usuario:
        </label> 
        </td>
        <td>                   
        <input type="text" required="required" value="<?php echo $_SESSION['username']; ?>" name="username" id="form_username" maxlength="20">
        </td><td>
        <input type="submit" value="Cambiar" class="btn btn-default">
        </td></tr></table></form>
        <div class="clear"></div></div>

     <div class="nopadding col-xs-12 whitebox">						        
		<?php 
        $txt='';

        $equiposU=0;


        if (isset($_SESSION['equipos'])) {
        $equiposU=count($_SESSION['equipos']);   
    	echo '<h4>Estos son tus equipos</h4>';
        if ($_SESSION['user_id']==30623){
                echo " - no se graba......................";
            }

        $contador=0;
        foreach ($_SESSION['equipos'] as $k => $equipo) {
            

                $txtCategoria = $equipo['categoria'];  
                $rutaEscudo=rutaEscudo($equipo['club_id'], $k);

            ?>	
            <div class="col-xs-12 marconegro clear">
                <div class="col-xs-2 text-center nopadding">
                <img style="max-width:35px; max-height:35px" src="<?php echo $rutaEscudo?>" alt="escudo">
                </div>
                <div class="col-xs-10 nopadding">
            	<a href="/equipo.php?id=<?php echo $k?>">
                <b><?php echo $equipo['nombre']; ?></b>
                <span style="color:dimgray; margin-left: 10px"><i><?php echo $txtCategoria; ?></i></span>
                <br />
                <?php foreach ($equipo['torneos'] as $k2 => $v) { 
                    if ($v['tipo_torneo']==1) {?>
                    <?php echo $v['nombre']?>   
                    <?php break; }
                } ?>
                </a>
                

                <button data-equipo="<?php echo $k?>" class="btn btn-danger btn-rm-fav pull-right" type="button">
                <span class="glyphicon glyphicon-remove"></span>
                </button>
                <?php if ($contador > 0) { ?>
                <span data-id="<?php echo $k; ?>" data-orden="<?php echo $k?>" class="btn-orden pull-right glyphicon glyphicon-arrow-up iconhover" style="width: 20px"></span>
                <?php
	            } else { ?>
	                <br /><span class="btn-orden pull-right boldfont">predeterminado&nbsp;&nbsp;&nbsp;</span>
	            <?php } ?>
                </div>
        	</div>    
        <!--Fin de Casilla Equipo-->
    <?php $contador++;
    }

	    if (count($_SESSION['equipos']) > 1) {
	        $txt= 'Pulsa en la flecha para elegír tu equipo predeterminado.';
	    }
	} else {
	    $txt= "Selecciona la categoría y la competición del equipo que quieres seguir y pulsa en su estrella <span class='glyphicon glyphicon-star '></span> para añadirlo.";
	}?>
</div>
 
<div class="col-xs-12 whitebox">
    <h4 class="text-center">Añadir equipo</h4>	
    <p class="text-center boldfont">Selecciona la liga donde juega tu equipo. Puedes buscarlo por categoría o por la comunidad.</p>
 	   <?php
       if ($equiposU < 100) { ?>
        <div class="col-xs-6">
            <select class="form-control" name="categoria" onchange="cargar_torneosU(this.value,0)">
            <option value="0" selected>Categoría...</option>
            <option value="1">Nacional</option>
            <option value="4">Autonómicas</option>
            <option value="5">Juvenil</option>
            <option value="6">Cadete</option>
            <option value="14">Infantil</option>
            <option value="15">Alevín</option>
            <option value="7">Femenino</option>
            <option value="9">Europa</option>
            <option value="8">América</option>
            <option value="17">Fútbol Sala</option>
            </select>
            </div>
            <div class="col-xs-6">
            <select class="form-control" name="categoria" onchange="cargar_torneosU(this.value,1)">
            <option value="1" selected>Comunidad...</option>
            <option value="2">Galicia</option>
            <option value="3">Asturias</option>
            <option value="4">Cantabria</option>
            <option value="5">Euskadi</option>
            <option value="6">Catalunya</option>
            <option value="7">Com. Valenciana</option>
            <option value="8">Com. Madrid</option>
            <option value="9">Castilla y León</option>
            <option value="10">Andalucía Or.</option>
            <option value="21">Melilla</option>
            <option value="11">Andalucía Oc.</option>
            <option value="22">Ceuta</option>
            <option value="12">Baleares</option>            
            <option value="13">Canarias</option>
            <option value="14">Reg. Murcia</option>
            <option value="15">Extremadura</option>
            <option value="16">Navarra</option>
            <option value="17">La Rioja</option>
            <option value="18">Aragón</option>
            <option value="19">Castilla LM</option>

            </select>
        </div>

        <div id="listaTorneos" style="float:left"></div> 
        <div id="listaEquipos"></div>
        <?php } ?>

        <div class="clear"></div>
        <div class="col-xs-12 text-center"><hr /><?php echo $txt?><hr /></div>

 </div> 

</div>


<script>

$('#boton-fm').click(function(){
window.location.href = "/usuario.php?pest=inicio";
})      


$( ".btn-rm-fav").on('click', function() {
    var equipo_id = $(this).attr('data-equipo');
    var equipo = $(this).parent();
    $.ajax({
    type: 'POST',
    url: "/src/usuarios/eliminarEquipoFavorito.php",
    data: "equipo_id="+equipo_id
    })
    .done(function(data) {
        equipo.remove();
        window.location.href = "/index.php?n1=config&pest=equipos";                 
    });  
   
});

$( ".btn-orden").on('click', function() {
    var equipo_id = $(this).attr('data-id');
    var orden = $(this).attr('data-orden');
    console.log(equipo_id);
    console.log(orden);
    $.ajax({
    type: 'POST',
    url: "/src/usuarios/anadirEquipoFavorito.php",
    data: "equipo_id="+equipo_id+"&orden="+orden
    })


    
    .done(function(data) {
        //console.log(data);
        window.location.href = "/index.php?n1=config&pest=equipos";                 
    });    
    

});
</script>
