<?php //if (!isset($_GET['userApp'])) {?>
    <ul class="col-xs-12 nav nav-pills h40 text-center">
        <li class="dropdown h40" style='padding:2px'>
            <img src="/apple-touch-icon-precomposed.png" onclick="location.href='https://futbolme.com'" alt="logo" height="34" width="34">
        </li>
        
        
        <?php if (isset($_SESSION['futbolme']) && $_SESSION['futbolme']!=1) { ?>
        <li class="dropdown h40">
            <a class="btn btn-danger boldfont text-center" href='/partidos-televisados'>
                <span class="hidden-xs">Televisados</span>
                <span class="visible-xs nopadding"><img src="/img/mini_tv.png" alt="logo tv" style="height: 15px"></span>
            </a>
        </li>

        <li class="dropdown h40">
        <table><tr><td>
            <?php if ($_SESSION['app']==0) { ?>
            <input type="text" id="busquedaEquipos" placeholder="Busca aquí tu equipo">
            <?php } else { ?>
            <input type="text" id="busquedaEquipos" placeholder="Busca aquí tu equipo" style="width: 200px !important; height: 33px !important; margin-top: 3px !important;">                
            <?php }  ?>
        </td><td>
        <a href="https://finderant.com" target="_blank"><img src="/img/finderant.png" title="finderant.com" style="margin-top: 5px; height: 34px"></a></td></tr></table>
        </li>

        <?php } ?>

        <li class="dropdown h40 visible-xs text-center">
        </li>

        <li class="dropdown h40 pull-right hide">
            <a class="dropdown-toggle btn btn-success boldfont text-center" data-toggle="dropdown" href="#"><span
                        class="glyphicon glyphicon-user"></span>Log-in
            </a>
            <ul class="dropdown-menu" style='margin-left: -30px'>
                <li>
                    <?php require_once $raiz.'srcRecursos/logCortoR.php'; ?>
                </li>
            </ul>
        </li>

        <?php if (isset($_SESSION['futbolme']) && $_SESSION['futbolme']!=1) { ?>
        <li class="dropdown h40 pull-right">
            <a class="btn btn-danger boldfont text-center" href='/contacto'>
                <span class="hidden-xs">Contacto</span>
                <span class="visible-xs nopadding">C</span>
            </a>
        </li>
        <?php } ?>
        
    </ul>
<?php //}?>