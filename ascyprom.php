 
  


<?php
//$p[0] = Xpartidos(207, 91); //permanencia
//$p[0] = Xpartidos(208, 3); //ascenso a segunda B
//$p[0] = Xpartidos(208, 27); //Campeones - ascenso a segunda B
//$txt = 'Segunda (cuartos contra segundos - terceros)';


/*$txt = 'repesca de Ascenso a Segunda B';
$p[0] = Xpartidos(208, 195); //Repesca

if (count($p[0]) > 0) { ?>
            <div class="clear"></div>
  <div class="cols-xs-12 marco" style="background-color: black">            
    <div class="cols-xs-12  marco"> 
    <h4 class="text-center marconegro">Emparejamientos para la <?php echo $txt; ?></h4>
    
    <?php

        foreach ($p[0] as $partido) {
            $colorFila = 'white'; ?> 
        
            <div class="boxpartido col-xs-12 col-md-12 col-lg-12 mnopadding one-bordergrey-vert" style="width:100%;float:left;background-color:<?php echo $colorFila; ?>">
                <div class="col-xs-4 col-md-5 col-lg-5 col-centered mnopadding equipo-partido">
                    <p class="pull-right boldfont lead" style="cursor: pointer;" >              
                        <?php $enlace_equipo = '/resultados-directo/equipo/'.poner_guion($partido['local']).'/'.$partido['equipoLocal_id']; ?>
                        <a href="<?php echo $enlace_equipo; ?>"class="text-right blacklink ntreduce">
                        <span class="hidden-xs">
                        <?php echo $partido['local']; ?>
                        </span>
                        <span class="hidden-sm hidden-md hidden-lg">
                        <?php echo $partido['localCorto']; ?>
                        </span>
                        </a>            
                    </p>
                </div>
                <div class="col-xs-4 col-md-2 col-lg-2 col-centered resultado-partido">
                    <div class="text-center">
                        <span class="text-center boldfont" style="font-size:12px"><?php echo substr($partido['fecha'], -2).'/'.substr($partido['fecha'], 5, 2); ?> </span>
                        <br />
                        <span class="text-center marco" style="background-color:dimgray; color:white; padding:2px">
                        <?php if ('11' == substr($partido['hora_prevista'], -2)) {
                $hora = ':';
            } else {
                $hora = substr($partido['hora_prevista'], 0, 5);
            }
            echo $hora; ?>
                        </span>
                    </div>
                </div>
                <div class="col-xs-4 col-md-5 col-lg-5 col-centered mnopadding equipo-partido">
                    <p class="pull-left boldfont lead" style="cursor: pointer;">
                        <?php $enlace_equipo = '/resultados-directo/equipo/'.poner_guion($partido['visitante']).'/'.$partido['equipoVisitante_id']; ?>
                        <a href="<?php echo $enlace_equipo; ?>" class="text-left blacklink ntreduce">
                        <span class="hidden-xs">
                        <?php echo $partido['visitante']; ?>
                        </span>
                        <span class="hidden-sm hidden-md hidden-lg">
                        <?php echo $partido['visitanteCorto']; ?>
                        </span>
                        </a>
                    </p>                    
                </div>
            </div>
            
        <?php
        } ?>
        <div class="clear"></div>
 </div>

</div>

  
<?php } else { ?>
 <div class="clear"></div>
  
<div class="cols-xs-12 marco">            
    <h4 class="text-center marconegro">En breves momentos, emparejamientos para la <?php echo $txt;?></h4>
</div>

<?php } 
*/

?>
