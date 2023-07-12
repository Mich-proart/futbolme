<?php include_once 'analyticstracking.php'; ?>

<nav style="position:fixed; left:0; top:0; z-index:2; width:100%;" class="darkgreenbox2">
    <?php
    
        require_once __DIR__.'/diseny/menu_no_logueado.php';
    ?>
</nav>

<?php 

/*<br /><a class="badge boldfont" title="johnnybet" href="https://es.johnnybet.com/"
               style="margin-top:2px;font-size: 14px; padding: 6px 12px 7px 35px; background: #1f1f1f url('https://static3.johnnybet.com/uploads/new/other/jbminiicoothers.png') no-repeat 4px 2px;">JohnnyBet</a>*/


if (0 == $_SESSION['app']) { ?>
    <div class="col-xs-12 nopadding darkgreenbox2 clear">

        <div class="hidden-xs hidden-sm col-md-12 text-center nopadding">
            <div class="pull-left" style="margin-left:10px; margin-top:10px;">
                <a href="/"><img alt="Logotipo Futbolme" src="/img/logo.png" width="220"></a>
                
            </div>
            <?php  if (0 == $_SESSION['app']) { require_once __DIR__.'/publicidad/megabanner.php'; } ?>
       </div>
        
    </div>
<?php }

if (isset($temporada_id) && isset($comunidad_id) && $comunidad_id>1){
    if (21 == $comunidad_id) {
        $comunidad_id = 10;
    }
    if (22 == $comunidad_id) {
        $comunidad_id = 11;
    }
      
    require_once __DIR__.'/menu00.php'; 
} else {
    require_once __DIR__.'/menu.php';
}

?>

