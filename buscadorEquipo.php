<?php 
define('_FUTBOLME_', 1);
require_once 'src/config.php'; ?>
<?php //require_once('src/cacheOn.php')?>
<?php 
if (isset($_GET['nombre'])) {
    $nombre = $_GET['nombre'];
} else {
    header('Location:/');
    die;
}


$equiposFM = buscarEquipo($nombre);


?>

<?php require_once 'includes/head.php'; ?>
	<title>Futbol en directo - Buscador de equipos </title>

</head>
	
			<?php require_once 'includes/contenedorSup.php'; ?>		
					
				<?php 
                if (is_array($equiposFM)) {
                    foreach ($equiposFM as $equipo) {

                    	$rutaEscudo=rutaEscudo($equipo['club_id'],$equipo['id']);
                        $enlace_equipo = '/resultados-directo/equipo/'.poner_guion($equipo['nombre']).'/'.$equipo['id']; ?>    
				<!--Comienza Casilla Jugador-->
				<div class="row row-centered playerboxesgen nomargin">
				    <div class="col-xs-12 whitebox colorseparator">
				        <div class="col-xs-2">
				            <a href="<?php echo $enlace_equipo; ?>">
				                <img src="<?php echo $rutaEscudo?>" alt="<?php echo $equipo['nombre']; ?>">
				            </a>
				        </div>
				        <div class="col-sm-6 col-xs-10">
				            <div class="row col-xs-12"><h3 class="black-text"><?php echo $equipo['nombre']; ?></h3></div>
				            <div class="row col-xs-12"><p class="black-text"><a href="/resultados-directo/equipo/<?php echo poner_guion($equipo['nombre']); ?>/<?php echo $equipo['id']; ?>"><?php echo $equipo['nombre_completo']; ?></a></p>
				            <p class="black-text righth3 margin-v-5 boldfont"><?php echo $equipo['nombreCategoria']; ?></p>				            
				            </div>				            
				        </div>
				        
				            

				           
				           
				            
				       
				        <div class="col-xs-12 nopadding">
				        	<table>
				        	<tr>
				        	<td width="5%">  
				        	<div class="pais flag<?php echo $equipo['imagenPais']; ?>b pull-left"></div> 
				        	</td>
					         <?php if ('Sin localidad' != $equipo['nombreLocalidad']) {
                            ?>
				            <td align="left" width="45%">

				            	<?php echo $equipo['nombreLocalidad']; ?>
				            </td>
				            <?php
                        } ?>
				            <?php if ('sin provincia' != $equipo['nombreProvincia']) {
                            ?>
				            <td align="right" width="45%"><?php echo $equipo['nombreProvincia']; ?>
				            </td>
				            <?php
                        } ?>
				        <td width="5%"> 	
                        <div class="comunidad flag<?php echo $equipo['imagenComunidad']; ?> pull-right"></div>
				        </td> 		
				        </tr></table>
				    </div>
					</div>
				</div>
				<!--Fin de Casilla Jugador-->
				<?php
                    }
                } else {
                    echo $equiposFM;
                } 
                
                require_once 'includes/contenedorInf.php'; ?>