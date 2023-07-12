
        		</div>
        		<?php
                if (1 != $_SESSION['app']) {
                     require_once $nivel.'includes/right_sidebar.php';
                } 
                if ($adeq===1){ ?>
                <!-- /21820527814/futbolme.com_video_inbanner_300x250_ADEQ -->
                <div id='div-gpt-ad-1582885377349-0' style='width: 300px; height: 250px;'>
                  <script>
                    googletag.cmd.push(function() { googletag.display('div-gpt-ad-1582885377349-0'); });
                  </script>
                </div>
                <!-- /21820527814/futbolme.com_video_inbanner_300x250_ADEQ -->
                <?php } ?>
        </div> <!-- id cPrincipal  -->
    </section>


<?php
if (isset($_GET['fecha'])) {
    ob_end_flush();
}?>
</div>

<script>
    (function(w, d){
        var b = d.getElementsByTagName('body')[0];
        var s = d.createElement("script"); s.async = true;
        var v = !("IntersectionObserver" in w) ? "8.7.1" : "10.5.2";
        s.src = "https://cdnjs.cloudflare.com/ajax/libs/vanilla-lazyload/" + v + "/lazyload.min.js";
        w.lazyLoadOptions = {}; // Your options here. See "recipes" for more information about async.
        b.appendChild(s);
    }(window, document));
</script>
<script async src="/js/bootstrap.min.js"></script>
<script async src="/js/bootstrap.bundle.min.js"></script>
<script async src="/js/comunsite.min.js"></script>
<script async src="/js/notificaciones.js?v=<?php echo $static_v; ?>"></script>
<script async src="/js/exporting.js"></script>
<script async src="/js/ajax.js?v=<?php echo $static_v; ?>"></script>





<?php
//<script>
//    try {
//        var pageTracker = _gat._getTracker("UA-1140373-1");
//        pageTracker._trackPageview();
//    } catch(err) {}
//</script>

if (0 == $_SESSION['app']) {
    require_once $nivel.'includes/publicidad/skinANDinterstitial.php'; 
}
require_once $nivel.'includes/footer.php'; 
 
 ?>

</body>
</html>

<?php 


if (isset($_SESSION['equipos']) && count($_SESSION['equipos'])>0) {
    $t="";
    foreach ($_SESSION['equipos'] as $key => $equ) {    
      foreach ($equ['torneos'] as $k => $value) {
        if ($k!=442) { $t.=$k.","; }
      } 
    }
    $t=substr($t, 0,-1);
} else { $t=0; } 

?>

<script>
    var torneos = [<?php echo $t?>]; 
    setInterval(function () { 
        $.ajax({
              type: "POST",
              url: "/z_notificaciones1.php",
              data: {'torneos': JSON.stringify(torneos)}
              })//capturo array     
              .done(function (data) {            
                $('#NotificacionesFinales').html(data);
              });
    },60000);
</script>
