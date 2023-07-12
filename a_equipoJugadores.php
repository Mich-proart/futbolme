    <?php 
        $n5 = $_GET['n5']??'Fichajes';       
        $pg .= '&n2=Jugadores';
        $pesFichajes = ''; $pesPlantilla = '';
        switch ($n5) {
            case 'Fichajes':$pesFichajes = 'active'; break;
            case 'Plantilla':$pesPlantilla = 'active'; break;
        }?> 
<div class="col-xs-12 celestebox nopadding">
    
    <ul class="nav nav-tabs nopadding" role="tablist">
        <li class="<?php echo $pesFichajes; ?> h40"><a  class="btn btn-info" style="color: red" href="<?php echo $pg; ?>&n5=Fichajes">Fichajes</a></li>
        <li class="<?php echo $pesPlantilla; ?> h40"><a  class="btn btn-info" style="color: red" href="<?php echo $pg; ?>&n5=Plantilla">Plantilla</a></li> 
    </ul>
    <div class="col-xs-12 whitebox nopadding">
    <?php switch ($n5) {
        case 'Fichajes':
            $fichajes = Xfichajes($equipo_id);
            require_once 'srcRecursos/pesFichajes.php';
        break;
        case 'Plantilla':
            $equipoPlantilla = XequipoPlantilla($equipo_id);
            $equipoPlantilla['liga'] = $liga;
            require_once './srcRecursos/pesPlantilla.php';
        break;
    }?> 
    </div>
</div>