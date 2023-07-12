
        		</div>
        		<?php
                if (1 != $_SESSION['app']) {
                     require_once $nivel.'includes/right_sidebar.php';
                } ?>
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
<script async src="/js/notificaciones.js"></script>
<script async src="/js/bootstrap.min.js"></script>
<script async src="/js/comunsite.min.js"></script>



<?php
//<script>
//    try {
//        var pageTracker = _gat._getTracker("UA-1140373-1");
//        pageTracker._trackPageview();
//    } catch(err) {}
//</script>

require_once 'includes/footer.php'; 
 ?>
</body>
</html>