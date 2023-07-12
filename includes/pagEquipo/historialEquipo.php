<?php
        $division=4;
        if ($liga<7){ $division=3; }
        if ($liga==1){ $division=1; }
        if ($liga==2){ $division=2; }
        
        $historial=historialEquipo($equipo_id);?>
        <div class="col-xs-12 marco text-center">            
            <?php if ($historial['debut_nacional'] > 0) { ?>
            <h4>Palmarés en categoría nacional</h4>
            <?php }
        $his=0; 
        if ($historial['copas'] > 0) { ?>
            <br /><a href="/historico-copa-participaciones/<?php echo poner_guion($historial['nombre']); ?>/<?php echo $historial['id']; ?>">Copa de España (<?php echo $historial['copas']; ?>)</a>
            <?php } 
        if ($historial['primera'] > 0) {
            $his=$his+$historial['primera']; ?>
            <br /><a href="/historico-liga/titulos/primera-division/<?php echo poner_guion($historial['nombre']); ?>/<?php echo $historial['id']; ?>/1">Primera División (<?php echo $historial['primera']; ?>)</a>
            <?php  } 
        if ($historial['segunda'] > 0) { 
            $his=$his+$historial['segunda']; ?>
            <br /><a href="/historico-liga/titulos/segunda-division/<?php echo poner_guion($historial['nombre']); ?>/<?php echo $historial['id']; ?>/2">Segunda División (<?php echo $historial['segunda']; ?>)</a>
            <?php } 
        if ($historial['segundab'] > 0) { 
            $his=$his+$historial['segundab']; ?>            
            <br /><a href="/historico-liga/titulos/segunda-division-b/<?php echo poner_guion($historial['nombre']); ?>/<?php echo $historial['id']; ?>/3">Segunda División B (<?php echo $historial['segundab']; ?>)</a>
            <?php } 
        if ($historial['tercera'] > 0) { 
            $his=$his+$historial['tercera']; ?>
            <br /><a href="/historico-liga/titulos/tercera-division/<?php echo poner_guion($historial['nombre']); ?>/<?php echo $historial['id']; ?>/4">Tercera División (<?php echo $historial['tercera']; ?>)</a>
            <?php  } 
        if ($his>0) { ?>
            <br /><a href='/historico/liga/index.php?todos=1&division=<?php echo $division?>&equipo_id=<?php echo $equipo_id?>'>Todos sus partidos en todas sus ligas</a>
        <?php } ?>
        </div>
        <div class="h25 clear"></div>
