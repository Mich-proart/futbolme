<?php 
$twiterols="";

foreach ($equipos as $fila) {




    
    if ($_SERVER['HTTP_HOST']=='fm18.com'){

          $twiterols.="@".$fila['slug']." ";        
    }

    if($fila['es_seleccion']==1){
        $rutaEscudo = '/img/paises/banderas/ban'.$fila['pais_id'].'.png';        
    } else {
        $rutaEscudo=rutaEscudo($fila['club_id'],$fila['equipo_id']);
    }
    if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaEscudo))) {
        $rutaEscudo = '/img/jugadores/NI.png';
    }

    $rutaEquipacion = '/img/equipaciones/eq'.$fila['equipacion_id'].'.png';
    if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaEquipacion))) {
        $rutaEquipacion = '/img/jugadores/NI.png';
    }

    $rutaEstadio = '/img/estadios/estadi'.$fila['estadio_id'].'.png';
    //imp($rutaEstadio);
    if (!file_exists(trim($_SERVER['DOCUMENT_ROOT'].$rutaEstadio))) {
        $rutaEstadio = '/img/jugadores/NI.png';
    } ?>
<!--Comienza Casilla Equipo-->
    <div class="col-xs-12 col-md-12 whitebox " style="border: 1px solid black; padding: 5px; margin-top: 2px;">
           <div class="col-xs-8 col-md-12">
                
               <?php if (isset($tipoTorneo) && $tipoTorneo==1) { ?>
                <button  onclick="anadir_equipo(<?php echo $fila['equipo_id']; ?>)"  class="btn btn-warning btn-fav pull-right" type="button" title="Añadir equipo a MI FUTBOLME"><span class="glyphicon glyphicon-star"></span></button>
                <?php  } ?>

                <a href="/resultados-directo/equipo/<?php echo poner_guion($fila['nombre']); ?>/<?php echo $fila['equipo_id']; ?>">
                    <img class="escudo_ind" src="<?php echo $rutaEscudo; ?>" style="height:90px;" alt="escudo">
                </a>
                <?php if ($fila['es_seleccion']==0) { ?>
                    
                <img  width="60" src="<?php echo $rutaEquipacion; ?>" alt="equipacion">
                <?php } ?>
                <h5 class="black-text">
                    <b><a href="/resultados-directo/equipo/<?php echo poner_guion($fila['nombre']); ?>/<?php echo $fila['equipo_id']; ?>"><?php echo $fila['nombre']; ?></a></b>
                </h5>

            </div>

            <div class="col-xs-4 col-md-12">			            
                <div class="comunidad flag<?php echo $fila['comunidad_id']; ?>"></div>
                
                <div><?php if ($fila['localidad']!='Sin localidad')  {?>
                <a href="/geolocalidad.php?m=1&id=<?php echo $fila['localidad_id']; ?>" title="Equipos de la localidad <?php echo $fila['localidad']; ?>"><?php echo $fila['localidad']; ?></a>
                <?php } ?>

                

                <?php if ($fila['provincia']!='sin provincia')  {?>
                 - <a href="/geolocalidad.php?m=2&id=<?php echo $fila['provincia_id']; ?>" title="Equipos de la provincia <?php echo $fila['provincia']; ?>" style="color:black;"><?php echo $fila['provincia']; ?></a>
                <?php } ?></div>
            </div>

    </div>
<?php } 

if ($_SERVER['HTTP_HOST']=='fm18.com'){
          echo $twiterols;      
    }
?>