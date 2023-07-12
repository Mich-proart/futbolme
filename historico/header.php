<?php include_once '../../includes/analyticstracking.php'; ?>

<nav style="position:fixed; left:0; top:0; z-index:2; width:100%;" class="darkgreenbox2">
   <?php //if (!isset($_GET['userApp'])) {?>
    <ul class="col-xs-12 nav nav-pills h40 text-center">
        <li class="dropdown h40" style='padding:2px'>
            <img src="/apple-touch-icon-precomposed.png" onclick="location.href='https://futbolme.com'" alt="logo" height="34" width="34">
        </li>
        
        
        
        <li class="dropdown h40">
            <a class="btn btn-danger boldfont text-center" href='/partidos-televisados'>
                <span class="hidden-xs">Televisados</span>
                <span class="visible-xs nopadding"><img src="/img/mini_tv.png" alt="logo tv" style="height: 15px"></span>
            </a>
        </li>
        
        
        
        <li class="dropdown h40 pull-right">
            <a class="btn btn-danger boldfont text-center" href='/contacto'>
                <span class="hidden-xs">Contacto</span>
                <span class="visible-xs nopadding">Contacto</span>
            </a>
        </li>
        
        
    </ul>
<?php //}?>
</nav>

