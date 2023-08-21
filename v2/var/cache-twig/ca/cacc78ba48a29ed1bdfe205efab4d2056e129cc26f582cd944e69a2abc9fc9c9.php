<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* base.html.twig */
class __TwigTemplate_590f0c5a1861a447101e2dd31122940c3d0803d2379a7b5adfbaef70a8c178e0 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'bloqueCss' => [$this, 'block_bloqueCss'],
            'bloqueJs' => [$this, 'block_bloqueJs'],
            'contenedorIzquierda' => [$this, 'block_contenedorIzquierda'],
            'contenedorCentral' => [$this, 'block_contenedorCentral'],
            'contenedorDerecha' => [$this, 'block_contenedorDerecha'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!doctype html>
<html lang=\"es\">
<head>

    ";
        // line 5
        $context["staticVersion"] = 2;
        // line 6
        echo "
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\">
    <title>";
        // line 9
        if (($context["titleTag"] ?? null)) {
            echo twig_escape_filter($this->env, ($context["titleTag"] ?? null), "html", null, true);
        } else {
            echo "Resultados de fútbol y clasificaciones - Bienvenido a Futbolme";
        }
        echo "</title>
    <meta name=\"description\" content=\"";
        // line 10
        if (($context["metaDescripcion"] ?? null)) {
            echo twig_escape_filter($this->env, ($context["metaDescripcion"] ?? null), "html", null, true);
        } else {
            echo "Fútbol en directo de Primera, Segunda, Segunda B y Tercera División. Si no esta en Futbolme, no se ha jugado.";
        }
        echo "\" />
    <meta property=\"og:description\" content=\"";
        // line 11
        if (($context["metaDescripcion"] ?? null)) {
            echo twig_escape_filter($this->env, ($context["metaDescripcion"] ?? null), "html", null, true);
        } else {
            echo "Fútbol en directo de Primera, Segunda, Segunda B y Tercera División. Si no esta en Futbolme, no se ha jugado.";
        }
        echo "\" />

    ";
        // line 14
        echo "    <script async src=\"https://tags.refinery89.com/v2/futbolmecom.js\"></script>
    ";
        // line 16
        echo "    

    ";
        // line 18
        if (call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_IOS__"])) {
            // line 19
            echo "
        ";
            // line 20
            $context["espacio"] = "enHeadiOS";
            // line 21
            echo "
    ";
        } elseif (call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_MOBILE__"])) {
            // line 23
            echo "
        ";
            // line 24
            $context["espacio"] = "enHeadMobile";
            // line 25
            echo "
    ";
        } else {
            // line 27
            echo "
        ";
            // line 28
            $context["espacio"] = "enHead";
            // line 29
            echo "
    ";
        }
        // line 31
        echo "    ";
        $this->loadTemplate("publicidad/publiGestion.html.twig", "base.html.twig", 31)->display($context);
        // line 32
        echo "
    <link href=\"https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Dosis:wght@200;300;400;500;523;600;700;800&display=swap\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/bs4.5/css/bootstrap.min.css\">
    <link rel=\"stylesheet\" href=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/css/fm.css?v=";
        echo twig_escape_filter($this->env, ($context["staticVersion"] ?? null), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" href=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/css/comunidades.min.css?v=";
        echo twig_escape_filter($this->env, ($context["staticVersion"] ?? null), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" href=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/css/paises.min.css?v=";
        echo twig_escape_filter($this->env, ($context["staticVersion"] ?? null), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" href=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/fontawesome/css/all.css\">
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css\">
    ";
        // line 40
        $this->displayBlock('bloqueCss', $context, $blocks);
        // line 43
        echo "
    <script type=\"text/javascript\" src=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/jquery/jquery-3.5.1.min.js\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/popper/popper.js\"></script>
    <script async src=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/js/bootstrap.min.js\"></script>

    <script async src=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/js/bootstrap.bundle.min.js\"></script>
    <script async src=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/js/comunsite.min.js?v=";
        echo twig_escape_filter($this->env, ($context["staticVersion"] ?? null), "html", null, true);
        echo "\"></script>
    <script async src=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/js/notificaciones.js?v=";
        echo twig_escape_filter($this->env, ($context["staticVersion"] ?? null), "html", null, true);
        echo "\"></script>
    <script type='text/javascript' src=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/js/highcharts.min.js\"></script>
    <script async src=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/js/exporting.js\"></script>
    <script async src=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/js/ajax.js?v=";
        echo twig_escape_filter($this->env, ($context["staticVersion"] ?? null), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/js/global.js?v=";
        echo twig_escape_filter($this->env, ($context["staticVersion"] ?? null), "html", null, true);
        echo "\"></script>
    <script async src=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/js/hambuerguer-menu-multilevel-hayleyt.js?v=";
        echo twig_escape_filter($this->env, ($context["staticVersion"] ?? null), "html", null, true);
        echo "\"></script>

    <script type=\"text/javascript\">
        function initBuscadorEquipos(mobile = false) {
            finderant={};
            finderant.parameters={
                se: '49d1b46d8238f34e97e96122ead6e80c',
                inputSelector: 'input#campoBusquedaEquipos',
                layer: 'dropdown',
                fixedLayer: true,
                viewMode: 'list',
                mtop: 0,
                mleft: -200,
                width: 400,
                translations: {
                    results: 'resultados',
                    writeYourSearch: 'Busca aquí tu equipo',
                    close: 'Cerrar'
                }
            };

            !function(t,n,r,a){e=n.createElement(r),j=n.getElementsByTagName(r)[0],e.async=1,e.src=a,j.parentNode.insertBefore(e,j)}(window,document,\"script\",\"/static/js/futbolme-finderantV2.js?v=";
        // line 76
        echo twig_escape_filter($this->env, ($context["staticVersion"] ?? null), "html", null, true);
        echo "\");

            if (mobile) {
                setTimeout(function() {
                    lauchMobileLayer();
                    displayMobileLayer();
                }, 1000);
            }
        }
    </script>

    <script type=\"text/javascript\">
        function initBuscadorJugadores(mobile = false) {
            finderant = {};
            finderant.parameters = {
                se: '82a7f1b206b4a7572daa7e4fd85e9aec',
                inputSelector: 'input#campoBusquedaJugadores',
                layer: 'dropdown',
                fixedLayer: true,
                viewMode: 'list',
                mtop: 0,
                mleft: -200,
                width: 400,
                translations: {
                    results: 'resultados',
                    writeYourSearch: 'Busca tu jugador favorito',
                    close: 'Cerrar'
                }
            };

            !function(t,n,r,a){e=n.createElement(r),j=n.getElementsByTagName(r)[0],e.async=1,e.src=a,j.parentNode.insertBefore(e,j)}(window,document,\"script\",\"/static/js/futbolme-finderantV2Jugadores.js?v=";
        // line 106
        echo twig_escape_filter($this->env, ($context["staticVersion"] ?? null), "html", null, true);
        echo "\");

            console.log('aaaaa');
            console.log(mobile);

            if (mobile) {
                setTimeout(function() {
                    lauchMobileLayer();
                    displayMobileLayer();
                }, 1000);
            }
        }
    </script>

    <script type=\"text/javascript\">
        \$(document).on('focus', '#campoBusquedaEquipos', function(e) {
            initBuscadorEquipos();
        });

        \$(document).on('focus', '#campoBusquedaJugadores', function(e) {
            initBuscadorJugadores();
        });

        \$(document).on('focus', '#campoBusquedaEquiposMobile', function(e) {
            document.getElementById('campoBusquedaEquipos').focus();
            initBuscadorEquipos(true);
        });

        \$(document).on('focus', '#campoBusquedaJugadoresMobile', function(e) {
            document.getElementById('campoBusquedaEquipos').focus();
            initBuscadorJugadores(true);
        });

        \$(document).on('click', '.enlaceFinderant', function (e) {
            e.preventDefault();
            e.stopPropagation();
        });
    </script>




    ";
        // line 148
        $this->displayBlock('bloqueJs', $context, $blocks);
        // line 151
        echo "




";
        // line 161
        echo "


    ";
        // line 164
        if ( !call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_MOBILE__"])) {
            // line 165
            echo "    <!-- Hotjar Tracking Code for https://futbolme.com/ -->
    <script>
        /* (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:2071424,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv='); */
        console.log('ya no existe hotjar');
    </script>
    ";
        }
        // line 178
        echo "
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-1140373-1', 'auto');
        ga('send', 'pageview');

    </script>

    ";
        // line 191
        echo "
    ";
        // line 211
        echo "    ";
        // line 267
        echo "
    <!-- mobusi -->
        
        ";
        // line 279
        echo "
 <!-- fin mobusi -->

 <!-- clickiogeneralCod -->
 ";
        // line 284
        echo " <!-- clickioTopSticky head -->
 <script>
         
            /* \$(function () {

                setInterval(function () { */


                    /* ";
        // line 292
        if (call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_MOBILE__"])) {
            // line 293
            echo "                        if(\$('#r89-mobile-billboard-top-sticky-1-0-wrapper').length == 0 || \$(\"#r89-mobile-billboard-top-sticky-1-0-wrapper:visible\").length == 0)
                        {
                            \$(\"#headeradd\").css(\"height\", \"0px\");
                            \$(\"#contenedorGlobal\").attr('style', 'margin-top: 0px !important');
                        }else{
                            \$(\"#contenedorGlobal\").css(\"margin-top\", \"80px\");
                        }
                    ";
        } else {
            // line 301
            echo "                        ";
            // line 309
            echo "                    ";
        }
        echo " */

/* console.log('fuera estilos mobil');
                },1000);
            }); */

 </script>
 ";
        // line 317
        echo "<style>@media only screen and (min-width: 768px){.header{width: 100%;top: 0;z-index: 10000001;transition:all 0.5s;}#top_sticky{width:100%;padding:0px 0;text-align:center;}#contenedorGlobal {margin-top: 140px !important;transition:all 0.5s;}}</style> 
</head>

<!-- Google tag (gtag.js) -->
<script async src=\"https://www.googletagmanager.com/gtag/js?id=G-GJ38VYWK84\"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-GJ38VYWK84');
</script>

";
        // line 337
        echo "
<body class=\"";
        // line 338
        if ((isset($context["classPagina"]) || array_key_exists("classPagina", $context))) {
            echo twig_escape_filter($this->env, ($context["classPagina"] ?? null), "html", null, true);
        }
        echo "\">

";
        // line 341
        echo "
";
        // line 342
        if (call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_MOBILE__"])) {
        } else {
            // line 344
            echo "    ";
        }
        // line 347
        echo "


<!-- age warning toast -->
<div class=\"modal fade\" id=\"exampleModalCenter\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalCenterTitle\" style=\"display: none; padding-right: 17px;\">
  <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
    <div class=\"modal-content\">
      <div class=\"modal-header\" style=\"justify-content: center;background: #2d712b!important;color: #fff;\">
        <h5 class=\"modal-title\" id=\"exampleModalCenterTitle\">Debes ser mayor de edad para acceder</h5>
        
      </div>
      <div class=\"modal-body\">

<div class=\"cl-consent__descr\" style=\"
    text-align-last: center;
    font-size: 14px;
\">
<p>Debes tener 18 años o más para acceder a esta web.
</p><p>Forma parte de nuestro compromiso con el juego responsable.</p><p></p>
<p style=\"
    font-size: 17px !important;
    font-weight: bold;
\">¿Eres mayor de edad?</p> 
</div>
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">NO</button>
        <button type=\"button\" class=\"btn btn-primary\" style=\"background:#2d712b!important;\">SI</button>
      </div>
    </div>
  </div>
</div>


";
        // line 401
        echo "
";
        // line 420
        echo "
<!-- ONENETWORK -->
<script type=\"text/javascript\" src=\"https://video.onnetwork.tv/widget/widget_scrolllist.php?widget=903&cId=myContainer1\" defer></script>



";
        // line 429
        echo "

";
        // line 431
        if (call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_MOBILE__"])) {
            // line 432
            echo "    ";
            $context["espacio"] = "despuesDeAbrirBodyMobile";
        } else {
            // line 434
            echo "    ";
            $context["espacio"] = "despuesDeAbrirBody";
        }
        // line 436
        $this->loadTemplate("publicidad/publiGestion.html.twig", "base.html.twig", 436)->display($context);
        // line 437
        echo "
<div id=\"NotificacionesFinales\">

</div>

";
        // line 442
        $context["menu"] = call_user_func_array($this->env->getFunction('getMenu')->getCallable(), []);
        // line 443
        echo "

<div id=\"contenedorMenuSuperior\">
 
    <div class=\"header\" id=\"headeradd\">
    <div id=\"top_sticky\">
        ";
        // line 450
        echo "    </div>
    </div>

    ";
        // line 453
        if (call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_MOBILE__"])) {
            // line 454
            echo "        <div id=\"headerPublicidad\" style=\"height:auto\"></div>          
    ";
        }
        // line 456
        echo "
    ";
        // line 457
        if (call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_MOBILE__"])) {
            // line 458
            echo "        <nav id=\"menuTop\" class=\"px-4\">            
    ";
        } else {
            // line 460
            echo "        <nav id=\"menuTop\" class=\"px-5\">
    ";
        }
        // line 462
        echo "        
        <div id=\"menuTopContenido\">
            <ul id=\"ulMenuIz\" class=\"col-xs-12 nav nav-pills\">
                <li id=\"liLogoFutbolme\">
                    <a href=\"";
        // line 466
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "\">
                        <img src=\"";
        // line 467
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/img/logo.svg\" alt=\"Logo Futbolme.com\" class=\"loading\" data-was-processed=\"true\">
                    </a>
                </li>
                <li class=\"dropdown h40 visible-xs text-center\">
                    ";
        // line 471
        if ( !call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_MOBILE__"])) {
            // line 472
            echo "            
                        <!-- <div class=\"col-12 text-center\" style=\"margin-left: 100px\"> 
                        <script data-cfasync=\"false\" type=\"text/javascript\" src=\"https://www.linkonclick.com/a/display.php?r=4366455\"></script>
                        </div>-->

                    ";
        }
        // line 478
        echo "                </li>
            </ul>
        </div>

        <ul id=\"ulMenuDe\" class=\"mb-0\">
            <li class=\"d-none d-md-block\">
                <a href=\"";
        // line 484
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("partidosTelevisados"), "html", null, true);
        echo "\">
                    <img src=\"";
        // line 485
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/img/icono-tv.svg\" alt=\"\" class=\"loading\" data-was-processed=\"true\" title=\"Partidos televisados\">
                </a>
            </li>

            <li class=\"d-none d-md-block\" style=\"width: auto;\">
                <input type=\"text\" id=\"campoBusquedaJugadores\" placeholder=\"Busca tu jugador favorito\">
            </li>
            <li class=\"d-none d-md-block\" style=\"margin-right: 30px;\">
                <a class=\"enlaceFinderant\" title=\"FinderAnt\" href=\"https://finderant.com/\">
                    <img src=\"";
        // line 494
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/img/icono-busqueda.svg\" alt=\"FinderAnt\" class=\"loading\" data-was-processed=\"true\">
                </a>
            </li>
            <li class=\"d-none d-md-block\" style=\"width: auto;\">
                <input type=\"text\" id=\"campoBusquedaEquipos\" placeholder=\"Busca aquí tu equipo\">
            </li>
            <li class=\"d-none d-md-block\">
                <a class=\"enlaceFinderant\" title=\"FinderAnt\" href=\"https://finderant.com/\">
                    <img src=\"";
        // line 502
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/img/icono-busqueda.svg\" alt=\"FinderAnt\" class=\"loading\" data-was-processed=\"true\">
                </a>
            </li>
            
            ";
        // line 514
        echo "
            

            <li id=\"hamburgerMenu\" class=\"d-block d-md-none\">
                <a class=\"js-menuToggle\" href=\"javascript:;\" title=\"Menú móvil\">
                    <img src=\"";
        // line 519
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/img/hamburger-menu.svg\" alt=\"Menú móvil\" title=\"Menú móvil\">
                </a>
            </li>
        </ul>

        
    </nav>

    <nav id=\"menuBottom\" class=\"d-none d-md-block border\" style=\"text-align:center;\">
        <ul>
            <li class=\"torneosPrincipales\">
                <a href=\"/ascensos-y-descensos/nacional\">Ascensos y descensos</a>
                <div class=\"fondoContactoMenu\"></div>
            </li>
            <li class=\"torneosPrincipales\">
                <a href=\"/resultados-directo/torneo/primera-division/1/\">1ª</a>
                <div class=\"fondoContactoMenu\"></div>
            </li>

            <li class=\"torneosPrincipales\">
                <a href=\"/resultados-directo/torneo/espana-segunda-division-promocion-de-ascenso/239/\">
                    Promoción a 1ª
                </a>
                <div class=\"fondoContactoMenu\"></div>
            </li>

            <li class=\"torneosPrincipales\">
                <a href=\"/resultados-directo/torneo/segunda-division/2/\">2ª</a>
                <div class=\"fondoContactoMenu\"></div>
            </li>
            <li class=\"torneosPrincipales\">
                <a href=\"/resultados-directo/torneo/espana-primera-division-rfef-promocion-de-ascenso/3137/\">
                    Promoción a 2ª
                </a>
                <div class=\"fondoContactoMenu\"></div>
            </li>



            

            

            





            <li id=\"menuLiPrimeraRFEF\">
                <a href=\"\" id=\"menuEnlacePrimeraRFEF\" data-menu=\"PrimeraRFEF\">1ª Fed.</a>
                <div class=\"fondoContactoMenu\"></div>
                <div class=\"flechaTorneos\"></div>
            </li>

            <li class=\"torneosPrincipales\">
                <a href=\"/resultados-directo/torneo/espana-promocion-de-ascenso-1-rfef/3127/\">Promoción a 1ª Fed.</a>
                <div class=\"fondoContactoMenu\"></div>
            </li>

            <li id=\"menuLiSegundaRFEF\">
                <a href=\"\" id=\"menuEnlaceSegundaRFEF\" data-menu=\"SegundaRFEF\">2ª Fed.</a>
                <div class=\"fondoContactoMenu\"></div>
                <div class=\"flechaTorneos\"></div>
            </li>

            <li class=\"torneosPrincipales\">
                <a href=\"/resultados-directo/torneo/espana-promocion-de-permanencia.2-rfef/3128/\">Permanencia 2ª Fed.</a>
                <div class=\"fondoContactoMenu\"></div>
            </li>

            

            

            ";
        // line 595
        echo "            

            <li id=\"menuLiTercera\" class=\"torneosPrincipales\">
                <a href=\"\" id=\"menuEnlaceTercera\" data-menu=\"Tercera\">3ª Fed.</a>
                <div class=\"fondoContactoMenu\"></div>
                <div class=\"flechaTorneos\"></div>
            </li>

            <li id=\"menuLipromocion2RFEF\">
                <a href=\"\" id=\"menuEnlacepromocion2RFEF\" data-menu=\"promocion2RFEF\">Promoción a 2ª Fed.</a>
                <div class=\"fondoContactoMenu\"></div>
                <div class=\"flechaTorneos\"></div>
            </li>

            <li id=\"menuLiAutonomica\" class=\"torneosPrincipales\">
                <a href=\"\" id=\"menuEnlaceAutonomica\" data-menu=\"Autonomica\">Autonómicas</a>
                <div class=\"fondoContactoMenu\"></div>
                <div class=\"flechaTorneos\"></div>
            </li>
            <li class=\"torneosPrincipales\" id=\"menuLiTorneos\">
                <a href=\"\" id=\"menuEnlaceTorneos\" data-menu=\"Torneos\">Torneos</a>
                <div class=\"fondoContactoMenu\"></div>
                <div class=\"flechaTorneos\"></div>
            </li>
            <li class=\"torneosPrincipales\" id=\"menuLiEuropa\">
                <a href=\"\" id=\"menuEnlaceEuropa\" data-menu=\"Europa\">Europa</a>
                <div class=\"fondoContactoMenu\"></div>
                <div class=\"flechaTorneos\"></div>
            </li>
            <li class=\"torneosPrincipales\" id=\"menuLiJuvenil\">
                <a href=\"\" id=\"menuEnlaceJuvenil\" data-menu=\"Juvenil\">Juvenil</a>
                <div class=\"fondoContactoMenu\"></div>
                <div class=\"flechaTorneos\"></div>
            </li>
            <li class=\"torneosPrincipales\" id=\"menuLiFemenino\">
                <a href=\"\" id=\"menuEnlaceFemenino\" data-menu=\"Femenino\">Femenino</a>
                <div class=\"fondoContactoMenu\"></div>
                <div class=\"flechaTorneos\"></div>
            </li>

            ";
        // line 642
        echo "
            <li id=\"liContactoMenu\" class=\"torneosPrincipales\">
                <a id=\"enlaceContactoMenu\" href=\"";
        // line 644
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("contacto"), "html", null, true);
        echo "\">
                    Contacto
                </a>
                <div class=\"fondoContactoMenu\"></div>
            </li>
        </ul>
    </nav>

    <nav>
        <ul class=\"pushNav js-topPushNav\" style=\"z-index: 1000000000;\">
            <li class=\"closeLevel js-closeLevelTop hdg\">
                Cerrar Menú
            </li>
            <li>
                <a href=\"/\">
                    Inicio Futbome.com
                </a>
            </li>
            
            <li>
                <a href=\"";
        // line 664
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("partidosTelevisados"), "html", null, true);
        echo "\">
                    Televisados
                </a>
            </li>
            <li>
                <img style=\"margin-left: 18px; margin-right: 5px;\" src=\"";
        // line 669
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/img/icono-busqueda.svg\" alt=\"\" class=\"loading\" data-was-processed=\"true\">
                <input type=\"text\" id=\"campoBusquedaEquiposMobile\" placeholder=\"Busca aquí tu equipo\">
            </li>
            <li style=\"margin-top: 10px;\">
                <img style=\"margin-left: 18px; margin-right: 5px;\" src=\"";
        // line 673
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/img/icono-busqueda.svg\" alt=\"\" class=\"loading\" data-was-processed=\"true\">
                <input type=\"text\" id=\"campoBusquedaJugadoresMobile\" placeholder=\"Busca tu jugador favorito\">
            </li>

            <li>
            <a href=\"/ascensos-y-descensos/nacional\">Ascensos y descensos</a>
            </li>
            
            <li>
                <a href=\"/resultados-directo/torneo/primera-division/1/\">
                    Primera división
                </a>
            </li>

            <li>
                <a href=\"/resultados-directo/torneo/espana-segunda-division-promocion-de-ascenso/239/\">
                    Promoción a Primera
                </a>

            </li>

            <li>
                <a href=\"/resultados-directo/torneo/segunda-division/2/\">
                    Segunda división
                </a>

            </li>

            <li>
                <a href=\"/resultados-directo/torneo/espana-primera-division-rfef-promocion-de-ascenso/3137/\">
                    Promoción a Segunda
                </a>

            </li>


            <li><!-- Begin section primeraRFEF -->
                <div class=\"openLevel js-openLevel\">
                    Primera Fed.
                    <i class=\"fa fa-chevron-right\"></i>
                </div>
                <ul class=\"pushNav pushNav_level js-pushNavLevel\">
                    <li class=\"closeLevel js-closeLevel hdg\">
                        <i class=\"fa fa-chevron-left\"></i>
                        Volver atrás
                    </li>
                         ";
        // line 719
        $context["bandera"] = "60b";
        // line 720
        echo "                        ";
        $context["tipoBandera"] = "pais";
        // line 721
        echo "
                        <li> 
                        <div style=\"float: left;\">         
                                                           
                            <div style=\"float:left;\"><div style=\"width:20px\"></div><i style=\"margin-top: 10px\" class=\"";
        // line 725
        echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
        echo " flag";
        echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
        echo "\"></i></div>
                        
                        <div style=\"float:left\"><a href=\"/resultados-directo/torneo/espana-primera-division-rfef-campeon-absoluto/3138/\">Campeón Absoluto</a></div>

                        </div>
                        </li>




                        ";
        // line 735
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "primeraRFEF", [], "any", false, false, false, 735));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            echo "                                 
                        <li> 
                        <div style=\"float: left;\">         
                        ";
            // line 738
            if (0 !== twig_compare(($context["bandera"] ?? null), "")) {
                echo "                                    
                            <div style=\"float:left;\"><div style=\"width:20px\"></div><i style=\"margin-top: 10px\" class=\"";
                // line 739
                echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
                echo " flag";
                echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
                echo "\"\"></i></div>
                        ";
            }
            // line 741
            echo "                        <div style=\"float:left\"><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 741), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 741), ["PRIMERA" => "1ª"]), "html", null, true);
            echo "</a></div>

                        </div>
                        </li>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 746
        echo "                </ul>
            </li><!-- End section primera RFEF -->

            <li>
                <a href=\"/resultados-directo/torneo/espana-promocion-de-ascenso-1-rfef/3127/\">Promoción a 1ª Fed.</a>
            </li>

            

            

            <li><!-- Begin section segundaRFEF -->
                <div class=\"openLevel js-openLevel\">
                    Segunda Fed.
                    <i class=\"fa fa-chevron-right\"></i>
                </div>
                <ul class=\"pushNav pushNav_level js-pushNavLevel\">
                    <li class=\"closeLevel js-closeLevel hdg\">
                        <i class=\"fa fa-chevron-left\"></i>
                        Volver atrás
                    </li>

                        ";
        // line 768
        $context["bandera"] = "60b";
        // line 769
        echo "                        ";
        $context["tipoBandera"] = "pais";
        // line 770
        echo "
                        ";
        // line 771
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "segundaRFEF", [], "any", false, false, false, 771));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            echo "                                 
                        <li>          
                        <div style=\"float: left;\">         
                        ";
            // line 774
            if (0 !== twig_compare(($context["bandera"] ?? null), "")) {
                echo "                                    
                            <div style=\"float:left;\"><div style=\"width:20px\"></div><i style=\"margin-top: 10px\" class=\"";
                // line 775
                echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
                echo " flag";
                echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
                echo "\"\"></i></div>
                        ";
            }
            // line 777
            echo "                        <div style=\"float:left\"><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 777), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 777), ["SEGUNDA" => "2ª"]), "html", null, true);
            echo "</a></div>

                        </div>
                        </li>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 782
        echo "                    
                </ul>
            </li><!-- End section segunda RFEF -->

            <li>
                <a href=\"/resultados-directo/torneo/espana-promocion-de-permanencia.2-rfef/3128/\">Permanencia 2ª Fed.</a>
            </li>


            

            

            

            <li><!-- Begin section 1 -->
                <div class=\"openLevel js-openLevel\">
                    Tercera Fed.
                    <i class=\"fa fa-chevron-right\"></i>
                </div>
                <ul class=\"pushNav pushNav_level js-pushNavLevel\">
                    <li class=\"closeLevel js-closeLevel hdg\">
                        <i class=\"fa fa-chevron-left\"></i>
                        Volver atrás
                    </li>
                    ";
        // line 807
        $context["nn"] = "";
        // line 808
        echo "                    ";
        $context["counter"] = 0;
        echo " 

                    ";
        // line 810
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "terceraRFEF", [], "any", false, false, false, 810));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 811
            echo "                        ";
            $context["tipoBandera"] = "";
            // line 812
            echo "                        ";
            $context["bandera"] = "";
            // line 813
            echo "                        ";
            $context["imagenPais"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenPais", [], "any", false, false, false, 813);
            // line 814
            echo "                        ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 814);
            // line 815
            echo "
                        ";
            // line 816
            if (0 !== twig_compare(($context["imagenPais"] ?? null), 60)) {
                // line 817
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 818
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 819
                echo "                        ";
            } elseif ((0 === twig_compare(($context["imagenPais"] ?? null), 60) && -1 === twig_compare(($context["imagenComunidad"] ?? null), 2))) {
                // line 820
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 821
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 822
                echo "                        ";
            } elseif (1 === twig_compare(($context["imagenComunidad"] ?? null), 1)) {
                // line 823
                echo "                            ";
                $context["bandera"] = ($context["imagenComunidad"] ?? null);
                // line 824
                echo "                            ";
                $context["tipoBandera"] = "comunidad";
                // line 825
                echo "
                            ";
                // line 826
                if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                    // line 827
                    echo "                                ";
                    $context["bandera"] = 55;
                    // line 828
                    echo "                            ";
                } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                    // line 829
                    echo "                                ";
                    $context["bandera"] = 56;
                    // line 830
                    echo "                            ";
                }
                // line 831
                echo "
                        ";
            }
            // line 833
            echo "
                        ";
            // line 834
            if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                // line 835
                echo "                            ";
                $context["imagenComunidad"] = 55;
                // line 836
                echo "                        ";
            } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                // line 837
                echo "                            ";
                $context["imagenComunidad"] = 56;
                // line 838
                echo "                        ";
            }
            // line 839
            echo "                        <li>          
                        <div style=\"float: left;\">         
                        ";
            // line 841
            if (0 !== twig_compare(($context["bandera"] ?? null), "")) {
                echo "                                    
                            <div style=\"float:left;\"><div style=\"width:20px\"></div><i style=\"margin-top: 10px\" class=\"";
                // line 842
                echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
                echo " flag";
                echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
                echo "\"\"></i></div>
                        ";
            }
            // line 844
            echo "                        <div style=\"float:left\"><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 844), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 844), ["TERCERA" => "3ª"]), "html", null, true);
            echo "</a></div>

                        </div>
                        </li>
                     ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 848
        echo "                        
                </ul>
            </li><!-- End section 1 -->

            <li><!-- Begin section promosegundaRFEF -->
                <div class=\"openLevel js-openLevel\">
                    Promoción a 2 RFEF
                    <i class=\"fa fa-chevron-right\"></i>
                </div>
                <ul class=\"pushNav pushNav_level js-pushNavLevel\">
                    <li class=\"closeLevel js-closeLevel hdg\">
                        <i class=\"fa fa-chevron-left\"></i>
                        Volver atrás
                    </li>
                    ";
        // line 862
        $context["nn"] = "";
        // line 863
        echo "                    ";
        $context["counter"] = 0;
        echo " 

                    ";
        // line 865
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "promo2RFEF", [], "any", false, false, false, 865));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 866
            echo "                        ";
            $context["tipoBandera"] = "";
            // line 867
            echo "                        ";
            $context["bandera"] = "";
            // line 868
            echo "                        ";
            $context["imagenPais"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenPais", [], "any", false, false, false, 868);
            // line 869
            echo "                        ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 869);
            // line 870
            echo "
                        ";
            // line 871
            if (0 !== twig_compare(($context["imagenPais"] ?? null), 60)) {
                // line 872
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 873
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 874
                echo "                        ";
            } elseif ((0 === twig_compare(($context["imagenPais"] ?? null), 60) && -1 === twig_compare(($context["imagenComunidad"] ?? null), 2))) {
                // line 875
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 876
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 877
                echo "                        ";
            } elseif (1 === twig_compare(($context["imagenComunidad"] ?? null), 1)) {
                // line 878
                echo "                            ";
                $context["bandera"] = ($context["imagenComunidad"] ?? null);
                // line 879
                echo "                            ";
                $context["tipoBandera"] = "comunidad";
                // line 880
                echo "
                            ";
                // line 881
                if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                    // line 882
                    echo "                                ";
                    $context["bandera"] = 55;
                    // line 883
                    echo "                            ";
                } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                    // line 884
                    echo "                                ";
                    $context["bandera"] = 56;
                    // line 885
                    echo "                            ";
                }
                // line 886
                echo "
                        ";
            }
            // line 888
            echo "
                        ";
            // line 889
            if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                // line 890
                echo "                            ";
                $context["imagenComunidad"] = 55;
                // line 891
                echo "                        ";
            } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                // line 892
                echo "                            ";
                $context["imagenComunidad"] = 56;
                // line 893
                echo "                        ";
            }
            // line 894
            echo "

                        ";
            // line 896
            if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["torneo"], "id", [], "any", false, false, false, 896), 3130)) {
                // line 897
                echo "                         ";
                $context["bandera"] = "60b";
                // line 898
                echo "                         ";
                $context["tipoBandera"] = "pais";
                // line 899
                echo "                        ";
            }
            // line 900
            echo "



                        <li>          
                        <div style=\"float: left;\">         
                        ";
            // line 906
            if (0 !== twig_compare(($context["bandera"] ?? null), "")) {
                echo "                                    
                            <div style=\"float:left;\"><div style=\"width:20px\"></div><i style=\"margin-top: 10px\" class=\"";
                // line 907
                echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
                echo " flag";
                echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
                echo "\"></i></div>
                        ";
            }
            // line 909
            echo "                        <div style=\"float:left\"><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 909), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 909), ["PROMOCIÓN DE ASCENSO A SEGUNDA" => "Promoción a 2ª"]), "html", null, true);
            echo "</a></div>
                        </div>

                        </li>
                     ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 913
        echo "                        
                </ul>
            </li><!-- End section promosegunda RFEF -->


            

            <li><!-- Begin section 1 autonomica-->
                <div class=\"openLevel js-openLevel\">
                    Autonómicas
                    <i class=\"fa fa-chevron-right\"></i>
                </div>
                <ul class=\"pushNav pushNav_level js-pushNavLevel\">
                    <li class=\"closeLevel js-closeLevel hdg\">
                        <i class=\"fa fa-chevron-left\"></i>
                        Volver atrás
                    </li>
                    ";
        // line 930
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "autonomica", [], "any", false, false, false, 930));
        foreach ($context['_seq'] as $context["nombre"] => $context["regional"]) {
            // line 931
            echo "                    
                    ";
            // line 932
            $context["nn"] = "";
            // line 933
            echo "                    ";
            $context["counter"] = 0;
            echo " 

                    ";
            // line 935
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["regional"]);
            foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
                // line 936
                echo "                        ";
                $context["tipoBandera"] = "";
                // line 937
                echo "                        ";
                $context["bandera"] = "";
                // line 938
                echo "                        ";
                $context["imagenPais"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenPais", [], "any", false, false, false, 938);
                // line 939
                echo "                        ";
                $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 939);
                // line 940
                echo "
                        ";
                // line 941
                if (0 !== twig_compare(($context["imagenPais"] ?? null), 60)) {
                    // line 942
                    echo "                            ";
                    $context["bandera"] = ($context["imagenPais"] ?? null);
                    // line 943
                    echo "                            ";
                    $context["tipoBandera"] = "pais";
                    // line 944
                    echo "                        ";
                } elseif ((0 === twig_compare(($context["imagenPais"] ?? null), 60) && -1 === twig_compare(($context["imagenComunidad"] ?? null), 2))) {
                    // line 945
                    echo "                            ";
                    $context["bandera"] = ($context["imagenPais"] ?? null);
                    // line 946
                    echo "                            ";
                    $context["tipoBandera"] = "pais";
                    // line 947
                    echo "                        ";
                } elseif (1 === twig_compare(($context["imagenComunidad"] ?? null), 1)) {
                    // line 948
                    echo "                            ";
                    $context["bandera"] = ($context["imagenComunidad"] ?? null);
                    // line 949
                    echo "                            ";
                    $context["tipoBandera"] = "comunidad";
                    // line 950
                    echo "
                        ";
                }
                // line 952
                echo "
                        ";
                // line 953
                if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["torneo"], "temporada_id", [], "any", false, false, false, 953), 85) || 0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["torneo"], "temporada_id", [], "any", false, false, false, 953), 291))) {
                    // line 954
                    echo "                            ";
                    $context["imagenComunidad"] = 22;
                    // line 955
                    echo "                        ";
                } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["torneo"], "temporada_id", [], "any", false, false, false, 955), 76)) {
                    // line 956
                    echo "                            ";
                    $context["imagenComunidad"] = 21;
                    // line 957
                    echo "                        ";
                }
                // line 958
                echo "
                        

                        ";
                // line 961
                $context["t"] = twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 961), 0,  -7);
                echo " 
                        ";
                // line 962
                if (0 !== twig_compare(($context["nn"] ?? null), ($context["t"] ?? null))) {
                    echo "                                    
                                
                                 ";
                    // line 964
                    if (0 !== twig_compare(($context["counter"] ?? null), 0)) {
                        echo "   
                                    </tr></table></li>
                                   ";
                        // line 966
                        $context["counter"] = 0;
                        echo " 
                                ";
                    }
                    // line 968
                    echo "                        <li>
                                        <table class=\"table\"><tr>
                                            <td colspan=\"4\" style=\"color: #AFAFAF;font-family: Roboto;font-style: normal;font-weight: normal;font-size: 13px;\">
                                    ";
                    // line 971
                    if (0 !== twig_compare(($context["bandera"] ?? null), "")) {
                        echo " 
                                        <i class=\"comunidad flag";
                        // line 972
                        echo twig_escape_filter($this->env, ($context["imagenComunidad"] ?? null), "html", null, true);
                        echo "\" style=\"margin-right: 10px; \"></i>
                                    ";
                    }
                    // line 974
                    echo "                                        

                                    ";
                    // line 976
                    $context["parte"] = twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 976),  -7);
                    // line 977
                    echo "
                                    ";
                    // line 978
                    if (0 !== twig_compare(twig_slice($this->env, ($context["parte"] ?? null), 0, 5), "Grupo")) {
                        echo " 

                                    <a href=\"";
                        // line 980
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 980), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 980), "html", null, true);
                        echo "</a></td>

                                    ";
                    } else {
                        // line 983
                        echo "
                                        ";
                        // line 984
                        echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 984), 0,  -8), "html", null, true);
                        echo "</td></tr>

                                   <tr>
                                   <td align=\"center\" style=\"padding: 0px; margin:0px\"><a href=\"";
                        // line 987
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 987), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 987),  -7), "html", null, true);
                        echo "</a></td>
                                    
                                    ";
                    }
                    // line 989
                    echo "                                    

                                ";
                } else {
                    // line 992
                    echo "
                                <td align=\"center\" style=\"padding: 0px; margin:0px\"><a href=\"";
                    // line 993
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 993), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 993),  -7), "html", null, true);
                    echo "</a></td>
                                ";
                }
                // line 995
                echo "
                                ";
                // line 996
                $context["counter"] = (($context["counter"] ?? null) + 1);
                // line 997
                echo "                                ";
                $context["nn"] = ($context["t"] ?? null);
                echo " 

                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 1000
            echo "                    </tr></table></li>  
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['nombre'], $context['regional'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1001
        echo "                          
                </ul>
            </li><!-- End section 1 -->

            <li><!-- Begin section 1 -->
                <div class=\"openLevel js-openLevel\">
                    Torneos
                    <i class=\"fa fa-chevron-right\"></i>
                </div>
                <ul class=\"pushNav pushNav_level js-pushNavLevel\">
                    <li class=\"closeLevel js-closeLevel hdg\">
                        <i class=\"fa fa-chevron-left\"></i>
                        Volver atrás
                    </li>
                    <li>
                        <div class=\"openLevel js-openLevel\">
                            Principales Clubes
                            <i class=\"fa fa-chevron-right\"></i>
                        </div>
                        <ul class=\"pushNav pushNav_level js-pushNavLevel\">
                            <li class=\"closeLevel js-closeLevel hdg\">
                                <i class=\"fa fa-chevron-left\"></i>
                                Volver atrás
                            </li>
                            <li><a href='/resultados-directo/torneo/liga-de-campeones-de-la-uefa/183/'>LIGA DE CAMPEONES DE LA UEFA</a></li>
                            <li><a href='/resultados-directo/torneo/liga-europa-de-la-uefa-/184/'>LIGA EUROPA DE LA UEFA </a></li>
                            <li><a href='/resultados-directo/torneo/campeonato-de-espana---copa-de-s.m.-el-rey/186/'>CAMPEONATO DE ESPAÑA - Copa de S.M. El Rey</a></li>
                            <li>
                                <a href=\"/resultados-directo/torneo/camp.-de-espana-copa-de-s.m.-el-rey-2020-21/2855/\">
                                    CAMP. DE ESPAÑA - Copa de S.M. El Rey 2020-21
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div class=\"openLevel js-openLevel\">
                            Principales Selección
                            <i class=\"fa fa-chevron-right\"></i>
                        </div>
                        <ul class=\"pushNav pushNav_level js-pushNavLevel\">
                            <li class=\"closeLevel js-closeLevel hdg\">
                                <i class=\"fa fa-chevron-left\"></i>
                                Volver atrás
                            </li>
                            <li><a href='/resultados-directo/torneo/copa-mundial-de-la-fifa/216/'>COPA MUNDIAL DE LA FIFA</a></li>
                            <li><a href='/resultados-directo/torneo/campeonato-europeo-de-la-uefa-/238/'>CAMPEONATO EUROPEO DE LA UEFA </a></li>
                        </ul>
                    </li>
                    <li>
                        <div class=\"openLevel js-openLevel\">
                            RFEF
                            <i class=\"fa fa-chevron-right\"></i>
                        </div>
                        <ul class=\"pushNav pushNav_level js-pushNavLevel\">
                            <li class=\"closeLevel js-closeLevel hdg\">
                                <i class=\"fa fa-chevron-left\"></i>
                                Volver atrás
                            </li>
                            ";
        // line 1059
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "RFEF", [], "any", false, false, false, 1059));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 1060
            echo "                                ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 1060);
            // line 1061
            echo "                                ";
            if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                // line 1062
                echo "                                    ";
                $context["imagenComunidad"] = 55;
                // line 1063
                echo "                                ";
            } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                // line 1064
                echo "                                    ";
                $context["imagenComunidad"] = 56;
                // line 1065
                echo "                                ";
            }
            // line 1066
            echo "                                <li>
                                    <a href=\"";
            // line 1067
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 1067), "html", null, true);
            echo "\">
                                        <i class=\"comunidad flag";
            // line 1068
            echo twig_escape_filter($this->env, ($context["imagenComunidad"] ?? null), "html", null, true);
            echo "\"></i>
                                        ";
            // line 1069
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1069), "html", null, true);
            echo "
                                    </a>
                                </li>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1073
        echo "                        </ul>
                    </li>
                    <li>
                        <div class=\"openLevel js-openLevel\">
                            FIFA
                            <i class=\"fa fa-chevron-right\"></i>
                        </div>
                        <ul class=\"pushNav pushNav_level js-pushNavLevel\">
                            <li class=\"closeLevel js-closeLevel hdg\">
                                <i class=\"fa fa-chevron-left\"></i>
                                Volver atrás
                            </li>
                            ";
        // line 1085
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "FIFA", [], "any", false, false, false, 1085));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 1086
            echo "                                <li>
                                    <a href=\"";
            // line 1087
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 1087), "html", null, true);
            echo "\">
                                        ";
            // line 1088
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1088), "html", null, true);
            echo "
                                    </a>
                                </li>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1092
        echo "                        </ul>
                    </li>
                    <li>
                        <div class=\"openLevel js-openLevel\">
                            UEFA
                            <i class=\"fa fa-chevron-right\"></i>
                        </div>
                        <ul class=\"pushNav pushNav_level js-pushNavLevel\">
                            <li class=\"closeLevel js-closeLevel hdg\">
                                <i class=\"fa fa-chevron-left\"></i>
                                Volver atrás
                            </li>
                            ";
        // line 1104
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "UEFA", [], "any", false, false, false, 1104));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 1105
            echo "                                <li>
                                    <a href=\"";
            // line 1106
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 1106), "html", null, true);
            echo "\">
                                        ";
            // line 1107
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1107), "html", null, true);
            echo "
                                    </a>
                                </li>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1111
        echo "                        </ul>
                    </li>
                </ul>
            </li><!-- End section 1 -->


            <li><!-- Begin section 1 -->
                <div class=\"openLevel js-openLevel\">
                    Europa
                    <i class=\"fa fa-chevron-right\"></i>
                </div>
                <ul class=\"pushNav pushNav_level js-pushNavLevel\">
                    <li class=\"closeLevel js-closeLevel hdg\">
                        <i class=\"fa fa-chevron-left\"></i>
                        Volver atrás
                    </li>
                    <li>

                    ";
        // line 1129
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "europa", [], "any", false, false, false, 1129));
        foreach ($context['_seq'] as $context["nombrePais"] => $context["torneos"]) {
            // line 1130
            echo "                        ";
            $context["tipoBandera"] = "";
            // line 1131
            echo "                        ";
            $context["bandera"] = "";
            // line 1132
            echo "                        ";
            $context["imagenPais"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["torneos"], 0, [], "any", false, false, false, 1132), "imagenPais", [], "any", false, false, false, 1132);
            // line 1133
            echo "                        ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["torneos"], 0, [], "any", false, false, false, 1133), "imagenComunidad", [], "any", false, false, false, 1133);
            // line 1134
            echo "                        <li>
                            <div class=\"openLevel js-openLevel\">
                                ";
            // line 1136
            if (0 !== twig_compare(($context["imagenPais"] ?? null), 60)) {
                // line 1137
                echo "                                    ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 1138
                echo "                                    ";
                $context["tipoBandera"] = "pais";
                // line 1139
                echo "                                ";
            } elseif ((0 === twig_compare(($context["imagenPais"] ?? null), 60) && -1 === twig_compare(($context["imagenComunidad"] ?? null), 2))) {
                // line 1140
                echo "                                    ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 1141
                echo "                                    ";
                $context["tipoBandera"] = "pais";
                // line 1142
                echo "                                ";
            } elseif (1 === twig_compare(($context["imagenComunidad"] ?? null), 1)) {
                // line 1143
                echo "                                    ";
                $context["bandera"] = ($context["imagenComunidad"] ?? null);
                // line 1144
                echo "                                    ";
                $context["tipoBandera"] = "comunidad";
                // line 1145
                echo "
                                    ";
                // line 1146
                if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                    // line 1147
                    echo "                                        ";
                    $context["bandera"] = 55;
                    // line 1148
                    echo "                                    ";
                } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                    // line 1149
                    echo "                                        ";
                    $context["bandera"] = 56;
                    // line 1150
                    echo "                                    ";
                }
                // line 1151
                echo "
                                ";
            }
            // line 1153
            echo "
                                ";
            // line 1154
            if (0 === twig_compare(($context["tipoBandera"] ?? null), "pais")) {
                // line 1155
                echo "                                    ";
                $context["bandera"] = (($context["bandera"] ?? null) . "b");
                // line 1156
                echo "                                ";
            }
            // line 1157
            echo "
                                <i style=\"margin-left: 10px; margin-right: -10px;\" class=\"";
            // line 1158
            echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
            echo " flag";
            echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
            echo "\"></i>
                                ";
            // line 1159
            echo twig_escape_filter($this->env, $context["nombrePais"], "html", null, true);
            echo "
                                <i class=\"fa fa-chevron-right\"></i>
                            </div>
                            <ul class=\"pushNav pushNav_level js-pushNavLevel\">
                                <li class=\"closeLevel js-closeLevel hdg\">
                                    <i class=\"fa fa-chevron-left\"></i>
                                    Volver atrás
                                </li>
                                ";
            // line 1167
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["torneos"]);
            foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
                // line 1168
                echo "                                    <li>
                                        <a href=\"";
                // line 1169
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 1169), "html", null, true);
                echo "\">
                                            ";
                // line 1170
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1170), "html", null, true);
                echo "
                                        </a>
                                    </li>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 1174
            echo "                            </ul>
                        </li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['nombrePais'], $context['torneos'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1177
        echo "                </ul>
            </li><!-- End section 1 -->



            <li><!-- Begin section 1 -->
                <div class=\"openLevel js-openLevel\">
                    Juvenil
                    <i class=\"fa fa-chevron-right\"></i>
                </div>
                <ul class=\"pushNav pushNav_level js-pushNavLevel\">
                    <li class=\"closeLevel js-closeLevel hdg\">
                        <i class=\"fa fa-chevron-left\"></i>
                        Volver atrás
                    </li>
                    <li>
                    
                    ";
        // line 1194
        $context["nn"] = "";
        // line 1195
        echo "                    ";
        $context["counter"] = 0;
        echo " 

                    ";
        // line 1197
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "juvenil", [], "any", false, false, false, 1197));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 1198
            echo "                        ";
            $context["tipoBandera"] = "";
            // line 1199
            echo "                        ";
            $context["bandera"] = "";
            // line 1200
            echo "                        ";
            $context["imagenPais"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenPais", [], "any", false, false, false, 1200);
            // line 1201
            echo "                        ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 1201);
            // line 1202
            echo "
                        ";
            // line 1203
            if (0 !== twig_compare(($context["imagenPais"] ?? null), 60)) {
                // line 1204
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 1205
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 1206
                echo "                        ";
            } elseif ((0 === twig_compare(($context["imagenPais"] ?? null), 60) && -1 === twig_compare(($context["imagenComunidad"] ?? null), 2))) {
                // line 1207
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 1208
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 1209
                echo "                        ";
            } elseif (1 === twig_compare(($context["imagenComunidad"] ?? null), 1)) {
                // line 1210
                echo "                            ";
                $context["bandera"] = ($context["imagenComunidad"] ?? null);
                // line 1211
                echo "                            ";
                $context["tipoBandera"] = "comunidad";
                // line 1212
                echo "
                            ";
                // line 1213
                if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                    // line 1214
                    echo "                                ";
                    $context["bandera"] = 55;
                    // line 1215
                    echo "                            ";
                } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                    // line 1216
                    echo "                                ";
                    $context["bandera"] = 56;
                    // line 1217
                    echo "                            ";
                }
                // line 1218
                echo "
                            ";
                // line 1219
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["torneo"], "temporada_id", [], "any", false, false, false, 1219), 3093)) {
                    // line 1220
                    echo "                                    ";
                    $context["bandera"] = 22;
                    // line 1221
                    echo "                            ";
                }
                // line 1222
                echo "
                             ";
                // line 1223
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["torneo"], "temporada_id", [], "any", false, false, false, 1223), 3096)) {
                    // line 1224
                    echo "                                    ";
                    $context["bandera"] = 21;
                    // line 1225
                    echo "                            ";
                }
                // line 1226
                echo "

                        ";
            }
            // line 1229
            echo "
                        ";
            // line 1230
            if ((0 !== twig_compare(($context["bandera"] ?? null), "") && 0 === twig_compare(($context["tipoBandera"] ?? null), "pais"))) {
                // line 1231
                echo "                            ";
                $context["bandera"] = (($context["bandera"] ?? null) . "b");
                // line 1232
                echo "                        ";
            }
            // line 1233
            echo "                        
                        <li>                                       
                            ";
            // line 1235
            if (0 !== twig_compare(($context["bandera"] ?? null), "")) {
                echo "                                    
                                <div style=\"float:left;\"><div style=\"width:20px\"></div><i style=\"margin-top: 10px\" class=\"";
                // line 1236
                echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
                echo " flag";
                echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
                echo "\"\"></i></div>
                            ";
            }
            // line 1238
            echo "                            <div style=\"float:left; margin-right: 10px\">
                            &nbsp;&nbsp;<a href=\"";
            // line 1239
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 1239), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1239), "html", null, true);
            echo " </a>
                        </div>
                        </li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1243
        echo "                    
                </ul>
            </li><!-- End section 1 -->



            <li><!-- Begin section 1 -->
                <div class=\"openLevel js-openLevel\">
                    Femenino
                    <i class=\"fa fa-chevron-right\"></i>
                </div>
                <ul class=\"pushNav pushNav_level js-pushNavLevel\">
                    <li class=\"closeLevel js-closeLevel hdg\">
                        <i class=\"fa fa-chevron-left\"></i>
                        Volver atrás
                    </li>




                    <li>
                    ";
        // line 1264
        $context["nn"] = "";
        // line 1265
        echo "                    ";
        $context["counter"] = 0;
        echo " 

                    ";
        // line 1267
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "femenino", [], "any", false, false, false, 1267));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 1268
            echo "
                        


                        ";
            // line 1272
            $context["tipoBandera"] = "";
            // line 1273
            echo "                        ";
            $context["bandera"] = "";
            // line 1274
            echo "                        ";
            $context["imagenPais"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenPais", [], "any", false, false, false, 1274);
            // line 1275
            echo "                        ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 1275);
            // line 1276
            echo "
                        ";
            // line 1277
            if (0 !== twig_compare(($context["imagenPais"] ?? null), 60)) {
                // line 1278
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 1279
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 1280
                echo "                        ";
            } elseif ((0 === twig_compare(($context["imagenPais"] ?? null), 60) && -1 === twig_compare(($context["imagenComunidad"] ?? null), 2))) {
                // line 1281
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 1282
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 1283
                echo "                        ";
            } elseif (1 === twig_compare(($context["imagenComunidad"] ?? null), 1)) {
                // line 1284
                echo "                            ";
                $context["bandera"] = ($context["imagenComunidad"] ?? null);
                // line 1285
                echo "                            ";
                $context["tipoBandera"] = "comunidad";
                // line 1286
                echo "
                            ";
                // line 1287
                if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                    // line 1288
                    echo "                                ";
                    $context["bandera"] = 55;
                    // line 1289
                    echo "                            ";
                } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                    // line 1290
                    echo "                                ";
                    $context["bandera"] = 56;
                    // line 1291
                    echo "                            ";
                }
                // line 1292
                echo "
                        ";
            }
            // line 1294
            echo "
                        ";
            // line 1295
            if ((0 !== twig_compare(($context["bandera"] ?? null), "") && 0 === twig_compare(($context["tipoBandera"] ?? null), "pais"))) {
                // line 1296
                echo "                            ";
                $context["bandera"] = (($context["bandera"] ?? null) . "b");
                // line 1297
                echo "                        ";
            }
            // line 1298
            echo "
                       <li> 
                        <div style=\"float: left;\">         
                        ";
            // line 1301
            if (0 !== twig_compare(($context["bandera"] ?? null), "")) {
                echo "                                    
                            <div style=\"float:left;\"><div style=\"width:20px\"></div><i style=\"margin-top: 10px\" class=\"";
                // line 1302
                echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
                echo " flag";
                echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
                echo "\"\"></i></div>
                        ";
            }
            // line 1304
            echo "                        <div style=\"float:left\"><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 1304), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1304), ["PRIMERA" => "1ª", "SEGUNDA" => "2ª", "FEMENINA" => "FEM."]), "html", null, true);
            echo "</a></div>

                        </div>
                        </li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1309
        echo "                    
                </ul>
            </li><!-- End section 1 -->


             ";
        // line 1404
        echo "
            <hr/>
            ";
        // line 1411
        echo "            <li>
                <a href=\"";
        // line 1412
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("contacto"), "html", null, true);
        echo "\">Contacto</a>
            </li>
        </ul>
    </nav>
        
    
        

</div>

<div id=\"contenedorGlobal\" class=\"container-fluid\"> 




    <div class=\"row\">
        ";
        // line 1428
        if ( !call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_MOBILE__"])) {
            // line 1429
            echo "            <div class=\"col-12 col-sm-3 p-0 pr-2\">

                <div class=\"row\" style=\"text-align-last: center;\">
                    <div class=\"col-12\">
                        ";
            // line 1433
            $context["espacio"] = "primerLateralIzquierdo";
            // line 1434
            echo "
                        ";
            // line 1435
            if ((isset($context["esPortada"]) || array_key_exists("esPortada", $context))) {
                // line 1436
                echo "                            ";
                if (($context["esPortada"] ?? null)) {
                    // line 1437
                    echo "                                ";
                    $context["espacio"] = "primerLateralIzquierdoPortada";
                    // line 1438
                    echo "                            ";
                }
                // line 1439
                echo "                        ";
            }
            // line 1440
            echo "
                        ";
            // line 1441
            $this->loadTemplate("publicidad/publiGestion.html.twig", "base.html.twig", 1441)->display($context);
            // line 1442
            echo "                    </div>
                </div> 

                <div class=\"col-12 text-center hide\" style=\"display:none\">
                    <a style=\"color:white; background-color:black; font-size:13px; padding:4px; margin-top:2px;\" class=\"badge boldfont\" href=\"https://www.autodoc.es/services/mobile-app/\">www.AutoDoc.es</a>
                </div>


                <div class=\"col-12 text-center\" style=\"padding: 0px;\">
                    ";
            // line 1454
            echo "                    ";
            // line 1457
            echo "                    ";
            // line 1460
            echo "                </div>

                ";
            // line 1462
            $context["mostrarWidget"] = true;
            // line 1463
            echo "
                ";
            // line 1464
            if (((isset($context["esPortada"]) || array_key_exists("esPortada", $context)) && 0 === twig_compare(twig_date_format_filter($this->env, "now", "d/m/Y"), "25/12/2020"))) {
                // line 1465
                echo "                    ";
                $context["mostrarWidget"] = false;
                // line 1466
                echo "                ";
            }
            // line 1467
            echo "
                ";
            // line 1468
            if (($context["mostrarWidget"] ?? null)) {
                // line 1469
                echo "                    ";
                $context["tituloWidget"] = "Las noticias de Futbolme";
                // line 1470
                echo "                    ";
                $context["noticiasWidget"] = call_user_func_array($this->env->getFunction('obtenerNoticiasPortadaPosiciones')->getCallable(), [[0 => 1, 1 => 2]]);
                // line 1471
                echo "
                    ";
                // line 1472
                if (1 === twig_compare(twig_length_filter($this->env, ($context["noticiasWidget"] ?? null)), 0)) {
                    // line 1473
                    echo "                        <div class=\"row\" style=\"margin-bottom: 15px;\">
                            <div class=\"col-12\">
                                ";
                    // line 1475
                    $this->loadTemplate("noticias/widgetNoticias.html.twig", "base.html.twig", 1475)->display($context);
                    // line 1476
                    echo "                            </div>
                        </div>
                    ";
                }
                // line 1479
                echo "                ";
            }
            // line 1480
            echo "
                <div class=\"row\">
                    <div class=\"col-12\">
                        ";
            // line 1483
            $context["espacio"] = "segundoLateralIzquierdo";
            // line 1484
            echo "                        ";
            $this->loadTemplate("publicidad/publiGestion.html.twig", "base.html.twig", 1484)->display($context);
            // line 1485
            echo "                    </div>
                </div>

                <div class=\"d-none d-md-block\">
                    ";
            // line 1489
            $this->displayBlock('contenedorIzquierda', $context, $blocks);
            // line 1492
            echo "                </div>


                <div class=\"row\">
                    <div class=\"col-12\">
                        ";
            // line 1497
            $context["espacio"] = "pieLateralIzquierdo";
            // line 1498
            echo "                        ";
            $this->loadTemplate("publicidad/publiGestion.html.twig", "base.html.twig", 1498)->display($context);
            // line 1499
            echo "                    </div>
                </div>

            </div>
        ";
        }
        // line 1503
        echo "               
        <div id=\"contenedorCentral\" class=\"col-12 col-sm-9 col-md-6 p-0\">

            ";
        // line 1506
        $this->displayBlock('contenedorCentral', $context, $blocks);
        // line 1509
        echo "
        </div>

        ";
        // line 1512
        if ( !call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_MOBILE__"])) {
            // line 1513
            echo "            <div class=\"hidden-xs col-3 p-0 pl-2\">
                <div class=\"row\" style=\"margin: 0px;\">

                    <div class=\"col-12\" id=\"contenedorIconosDerecha\" style=\"padding: 0px;\">

                    

                        <div id=\"myContainer1\" style=\"max-width:400px;margin-left:auto;margin-right: auto; margin-bottom:10px;\"> </div>

                        <div class=\"row\" style=\"text-align-last: center;\">
                            <div class=\"col-12 text-center\"\">
                                ";
            // line 1524
            $context["espacio"] = "primerLateralDerecho";
            // line 1525
            echo "
                                ";
            // line 1526
            if ((isset($context["esPortada"]) || array_key_exists("esPortada", $context))) {
                // line 1527
                echo "                                    ";
                if (($context["esPortada"] ?? null)) {
                    // line 1528
                    echo "                                        ";
                    $context["espacio"] = "primerLateralDerechoPortada";
                    // line 1529
                    echo "                                    ";
                }
                // line 1530
                echo "                                ";
            }
            // line 1531
            echo "
                                ";
            // line 1532
            $this->loadTemplate("publicidad/publiGestion.html.twig", "base.html.twig", 1532)->display($context);
            // line 1533
            echo "                            </div>
                        </div> 

                        

                        

                        

                        ";
            // line 1545
            echo "

                        ";
            // line 1547
            $context["tituloWidget"] = "Las noticias de Futbolme";
            // line 1548
            echo "                        ";
            $context["noticiasWidget"] = call_user_func_array($this->env->getFunction('obtenerNoticiasPortadaPosiciones')->getCallable(), [[0 => 4, 1 => 5]]);
            // line 1549
            echo "
                        ";
            // line 1550
            if (1 === twig_compare(twig_length_filter($this->env, ($context["noticiasWidget"] ?? null)), 0)) {
                // line 1551
                echo "                            <div class=\"row\" style=\"margin-bottom: 15px;\">
                                <div class=\"col-12\">
                                    ";
                // line 1553
                $this->loadTemplate("noticias/widgetNoticias.html.twig", "base.html.twig", 1553)->display($context);
                // line 1554
                echo "                                </div>
                            </div>
                        ";
            }
            // line 1557
            echo "
                        <div class=\"row\">
                            <div class=\"col-12\">
                                ";
            // line 1560
            $context["espacio"] = "segundoLateralDerecho";
            // line 1561
            echo "                                ";
            $this->loadTemplate("publicidad/publiGestion.html.twig", "base.html.twig", 1561)->display($context);
            // line 1562
            echo "                            </div>
                        </div>


                        ";
            // line 1582
            echo "
";
            // line 1604
            echo "
                    </div>


                   



                    ";
            // line 1612
            $this->displayBlock('contenedorDerecha', $context, $blocks);
            // line 1615
            echo "
                    ";
            // line 1616
            $context["espacio"] = "pieLateralDerecho";
            // line 1617
            echo "                    ";
            $this->loadTemplate("publicidad/publiGestion.html.twig", "base.html.twig", 1617)->display($context);
            // line 1618
            echo "

                    ";
            // line 1627
            echo "                </div>
            </div>
        ";
        }
        // line 1630
        echo "
    </div>
</div>



<div class=\"container-fluid menuDesplegable\" id=\"menuPrimeraRFEF\">
    <div class=\"row\">
        <div class=\"col-12\" style=\"padding: 20px;\">
            <h3 class=\"menuTorneosTituloListado\">Primera Fed.</h3>
            <ul class=\"menuTorneosUL row\">

                <li> 
                <div style=\"float:left; padding:5px\">        
                                                   
                    <div style=\"float:left;\"><i style=\"margin-left: 10px\" class=\"pais flag60b\"></i></div>
                
                <div style=\"float:left; margin-left: 10px\"><a href=\"/resultados-directo/torneo/espana-primera-division-rfef-campeon-absoluto/3138/\">Campeón Absoluto</a></div>

                </div>
                </li>
                ";
        // line 1651
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "primeraRFEF", [], "any", false, false, false, 1651));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 1652
            echo "                <li>
                <div style=\"float:left; padding:5px\">
                 ";
            // line 1654
            if (0 !== twig_compare(($context["bandera"] ?? null), "")) {
                echo "                                    
                   <div style=\"float:left\"><i style=\"margin-left: 10px\" class=\"";
                // line 1655
                echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
                echo " flag";
                echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
                echo "\"></i></div>
                 ";
            }
            // line 1657
            echo "                  <div style=\"float:left; margin-left: 10px\"><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 1657), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1657), "html", null, true);
            echo "</a></div>
                </div>
                </li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1661
        echo "            </ul>
        </div>
    </div>
</div>

<div class=\"container-fluid menuDesplegable\" id=\"menuSegundaRFEF\">
    <div class=\"row\">
        <div class=\"col-12\" style=\"padding: 20px;\">
            <h3 class=\"menuTorneosTituloListado\">Segunda Fed.</h3>
            <ul class=\"menuTorneosUL row\">
                ";
        // line 1671
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "segundaRFEF", [], "any", false, false, false, 1671));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 1672
            echo "                <li>
                    <div style=\"float:left; padding:5px\">
                 ";
            // line 1674
            if (0 !== twig_compare(($context["bandera"] ?? null), "")) {
                echo "                                    
                    <div style=\"float:left\"><i style=\"margin-right: 10px;\" class=\"";
                // line 1675
                echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
                echo " flag";
                echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
                echo "\"></i></div>
                 ";
            }
            // line 1677
            echo "                 <div style=\"float:left; margin-right: 10px\"><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 1677), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1677), "html", null, true);
            echo "</a></div>
                 </div>
                </li>
                    
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1682
        echo "            </ul>
        </div>
    </div>
</div>

<div class=\"container-fluid menuDesplegable\" id=\"menupromocion2RFEF\">
    <div class=\"row\">
        <div class=\"col-12\" style=\"padding: 20px;\">
            <h3 class=\"menuTorneosTituloListado\">Promoción a 2ª Fed.</h3>
            <ul class=\"menuTorneosUL row\">
                    ";
        // line 1692
        $context["nn"] = "";
        // line 1693
        echo "                    ";
        $context["counter"] = 0;
        echo " 

                    ";
        // line 1695
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "promo2RFEF", [], "any", false, false, false, 1695));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 1696
            echo "                        ";
            $context["tipoBandera"] = "";
            // line 1697
            echo "                        ";
            $context["bandera"] = "";
            // line 1698
            echo "                        ";
            $context["imagenPais"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenPais", [], "any", false, false, false, 1698);
            // line 1699
            echo "                        ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 1699);
            // line 1700
            echo "
                        ";
            // line 1701
            if (0 !== twig_compare(($context["imagenPais"] ?? null), 60)) {
                // line 1702
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 1703
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 1704
                echo "                        ";
            } elseif ((0 === twig_compare(($context["imagenPais"] ?? null), 60) && -1 === twig_compare(($context["imagenComunidad"] ?? null), 2))) {
                // line 1705
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 1706
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 1707
                echo "                        ";
            } elseif (1 === twig_compare(($context["imagenComunidad"] ?? null), 1)) {
                // line 1708
                echo "                            ";
                $context["bandera"] = ($context["imagenComunidad"] ?? null);
                // line 1709
                echo "                            ";
                $context["tipoBandera"] = "comunidad";
                // line 1710
                echo "
                            ";
                // line 1711
                if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                    // line 1712
                    echo "                                ";
                    $context["bandera"] = 55;
                    // line 1713
                    echo "                            ";
                } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                    // line 1714
                    echo "                                ";
                    $context["bandera"] = 56;
                    // line 1715
                    echo "                            ";
                }
                // line 1716
                echo "
                        ";
            }
            // line 1718
            echo "
                        ";
            // line 1719
            if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                // line 1720
                echo "                            ";
                $context["imagenComunidad"] = 55;
                // line 1721
                echo "                        ";
            } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                // line 1722
                echo "                            ";
                $context["imagenComunidad"] = 56;
                // line 1723
                echo "                        ";
            }
            // line 1724
            echo "

                        ";
            // line 1726
            if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["torneo"], "id", [], "any", false, false, false, 1726), 3130)) {
                // line 1727
                echo "                         ";
                $context["bandera"] = "60b";
                // line 1728
                echo "                         ";
                $context["tipoBandera"] = "pais";
                // line 1729
                echo "                        ";
            }
            // line 1730
            echo "                 
                <li>
                    <div style=\"float:left; padding:5px\">
                 ";
            // line 1733
            if (0 !== twig_compare(($context["bandera"] ?? null), "")) {
                echo "                                    
                    <div style=\"float:left\"><i style=\"margin-right: 10px;\" class=\"";
                // line 1734
                echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
                echo " flag";
                echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
                echo "\"></i></div>
                 ";
            }
            // line 1736
            echo "                 <div style=\"float:left; margin-right: 10px\"><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 1736), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1736), "html", null, true);
            echo "</a></div>
                 </div>
                </li>
                    
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1740
        echo "   
                </ul>
        </div>
    </div>
</div>


    

    <div class=\"container-fluid menuDesplegable\" id=\"menuTercera\" style=\"margin-left: 500px;\">
        <div class=\"row\">
            <div class=\"col-6\" style=\"margin-bottom: 20px;\">
                <h3 class=\"menuTorneosTituloListado\">Tercera Fed.</h3>
                <ul class=\"menuTorneosUL row\">
                    ";
        // line 1754
        $context["nn"] = "";
        // line 1755
        echo "                    ";
        $context["counter"] = 0;
        echo " 

                    ";
        // line 1757
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "terceraRFEF", [], "any", false, false, false, 1757));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 1758
            echo "                        ";
            $context["tipoBandera"] = "";
            // line 1759
            echo "                        ";
            $context["bandera"] = "";
            // line 1760
            echo "                        ";
            $context["imagenPais"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenPais", [], "any", false, false, false, 1760);
            // line 1761
            echo "                        ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 1761);
            // line 1762
            echo "
                        ";
            // line 1763
            if (0 !== twig_compare(($context["imagenPais"] ?? null), 60)) {
                // line 1764
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 1765
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 1766
                echo "                        ";
            } elseif ((0 === twig_compare(($context["imagenPais"] ?? null), 60) && -1 === twig_compare(($context["imagenComunidad"] ?? null), 2))) {
                // line 1767
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 1768
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 1769
                echo "                        ";
            } elseif (1 === twig_compare(($context["imagenComunidad"] ?? null), 1)) {
                // line 1770
                echo "                            ";
                $context["bandera"] = ($context["imagenComunidad"] ?? null);
                // line 1771
                echo "                            ";
                $context["tipoBandera"] = "comunidad";
                // line 1772
                echo "
                            ";
                // line 1773
                if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                    // line 1774
                    echo "                                ";
                    $context["bandera"] = 55;
                    // line 1775
                    echo "                            ";
                } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                    // line 1776
                    echo "                                ";
                    $context["bandera"] = 56;
                    // line 1777
                    echo "                            ";
                }
                // line 1778
                echo "
                        ";
            }
            // line 1780
            echo "
                        ";
            // line 1781
            if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                // line 1782
                echo "                            ";
                $context["imagenComunidad"] = 55;
                // line 1783
                echo "                        ";
            } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                // line 1784
                echo "                            ";
                $context["imagenComunidad"] = 56;
                // line 1785
                echo "                        ";
            }
            // line 1786
            echo "                 
                <li>
                    <div style=\"float:left; padding:5px\">
                 ";
            // line 1789
            if (0 !== twig_compare(($context["bandera"] ?? null), "")) {
                echo "                                    
                    <div style=\"float:left\"><i style=\"margin-right: 10px;\" class=\"";
                // line 1790
                echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
                echo " flag";
                echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
                echo "\"></i></div>
                 ";
            }
            // line 1792
            echo "                 <div style=\"float:left; margin-right: 10px\"><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 1792), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1792), "html", null, true);
            echo "</a></div>
                 </div>
                </li>
                    
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1796
        echo "   
                </ul>
            </div>
        </div>
    </div>


    <div class=\"container-fluid menuDesplegable\" id=\"menuAutonomica\">
        <div class=\"row\">
            <div class=\"col-12\">
                <h3 class=\"menuTorneosTituloListado\">Autonómicas</h3>
                
                    ";
        // line 1808
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "autonomica", [], "any", false, false, false, 1808));
        foreach ($context['_seq'] as $context["nombre"] => $context["regional"]) {
            // line 1809
            echo "                    
                    ";
            // line 1810
            $context["nn"] = "";
            // line 1811
            echo "                    ";
            $context["counter"] = 0;
            echo " 
                    ";
            // line 1812
            $context["id_comunidad"] = 0;
            // line 1813
            echo "
                    <ul class=\"menuTorneosUL row\">

                    ";
            // line 1816
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["regional"]);
            foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
                // line 1817
                echo "                        ";
                $context["tipoBandera"] = "";
                // line 1818
                echo "                        ";
                $context["bandera"] = "";
                // line 1819
                echo "                        ";
                $context["imagenPais"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenPais", [], "any", false, false, false, 1819);
                // line 1820
                echo "                        ";
                $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 1820);
                // line 1821
                echo "
                        ";
                // line 1822
                if (0 !== twig_compare(($context["imagenPais"] ?? null), 60)) {
                    // line 1823
                    echo "                            ";
                    $context["bandera"] = ($context["imagenPais"] ?? null);
                    // line 1824
                    echo "                            ";
                    $context["tipoBandera"] = "pais";
                    // line 1825
                    echo "                        ";
                } elseif ((0 === twig_compare(($context["imagenPais"] ?? null), 60) && -1 === twig_compare(($context["imagenComunidad"] ?? null), 2))) {
                    // line 1826
                    echo "                            ";
                    $context["bandera"] = ($context["imagenPais"] ?? null);
                    // line 1827
                    echo "                            ";
                    $context["tipoBandera"] = "pais";
                    // line 1828
                    echo "                        ";
                } elseif (1 === twig_compare(($context["imagenComunidad"] ?? null), 1)) {
                    // line 1829
                    echo "                            ";
                    $context["bandera"] = ($context["imagenComunidad"] ?? null);
                    // line 1830
                    echo "                            ";
                    $context["tipoBandera"] = "comunidad";
                    // line 1831
                    echo "
                            

                        ";
                }
                // line 1835
                echo "
                        ";
                // line 1836
                if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["torneo"], "temporada_id", [], "any", false, false, false, 1836), 85) || 0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["torneo"], "temporada_id", [], "any", false, false, false, 1836), 291))) {
                    // line 1837
                    echo "                            ";
                    $context["imagenComunidad"] = 22;
                    // line 1838
                    echo "                        ";
                } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["torneo"], "temporada_id", [], "any", false, false, false, 1838), 76)) {
                    // line 1839
                    echo "                            ";
                    $context["imagenComunidad"] = 21;
                    // line 1840
                    echo "                        ";
                }
                // line 1841
                echo "                        ";
                $context["t"] = twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1841), 0,  -7);
                echo " 
                        ";
                // line 1842
                if (0 !== twig_compare(($context["nn"] ?? null), ($context["t"] ?? null))) {
                    echo "                                    
                                
                                 ";
                    // line 1844
                    if (0 !== twig_compare(($context["counter"] ?? null), 0)) {
                        echo "   
                                    </tr></table></div></li>
                                   ";
                        // line 1846
                        $context["counter"] = 0;
                        echo " 
                                ";
                    }
                    // line 1848
                    echo "                        <li>
                            <div style=\"padding: 5px; margin-top: 20px; border: solid gainsboro 1px; \"><table class=\"table\"><tr>
                                            <td colspan=\"8\" style=\"color: #AFAFAF;font-family: Roboto;font-style: normal;font-weight: normal;font-size: 13px;\">
                                    ";
                    // line 1851
                    if (0 !== twig_compare(($context["bandera"] ?? null), "")) {
                        echo " 
                                        <i class=\"comunidad flag";
                        // line 1852
                        echo twig_escape_filter($this->env, ($context["imagenComunidad"] ?? null), "html", null, true);
                        echo "\" style=\"margin-right: 10px; \"></i>
                                    ";
                    }
                    // line 1854
                    echo "                                        

                                    ";
                    // line 1856
                    $context["parte"] = twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1856),  -7);
                    // line 1857
                    echo "
                                

                                    ";
                    // line 1860
                    if (0 !== twig_compare(twig_slice($this->env, ($context["parte"] ?? null), 0, 5), "Grupo")) {
                        echo " 

                                    <a href=\"";
                        // line 1862
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 1862), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1862), "html", null, true);
                        echo "</a></td>

                                    ";
                    } else {
                        // line 1865
                        echo "
                                        ";
                        // line 1866
                        echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1866), 0,  -8), "html", null, true);
                        echo " </td></tr>

                                   <tr>
                                   <td align=\"center\" style=\"padding: 0px; margin:0px\"><a href=\"";
                        // line 1869
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 1869), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1869),  -7), "html", null, true);
                        echo "</a></td>
                                    
                                    ";
                    }
                    // line 1871
                    echo "  






                            ";
                } else {
                    // line 1879
                    echo "
                            <td align=\"center\" style=\"padding: 0px; margin:0px\"><a href=\"";
                    // line 1880
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 1880), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1880),  -7), "html", null, true);
                    echo "</a></td>

                            ";
                }
                // line 1883
                echo "
                                ";
                // line 1884
                $context["counter"] = (($context["counter"] ?? null) + 1);
                // line 1885
                echo "                                ";
                $context["nn"] = ($context["t"] ?? null);
                echo " 
                                ";
                // line 1886
                $context["id_comunidad"] = ($context["imagenComunidad"] ?? null);
                echo " 

                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 1888
            echo "                    
                    </tr></table></div>
                    </li>                        
                </ul>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['nombre'], $context['regional'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1892
        echo " 
            </div>
        </div>
    </div>


    <div class=\"container-fluid menuDesplegable\" id=\"menuTorneos\">
        <div class=\"row\">
            <div class=\"col-3\">
                <h3 class=\"menuTorneosTituloListado\">Principales clubes</h3>
                <ul class=\"menuTorneosUL\">
                    <li>
                        <a href='/resultados-directo/torneo/liga-de-campeones-de-la-uefa/183/'>LIGA DE CAMPEONES DE LA UEFA</a>
                    </li>
                    <li>
                        <a href='/resultados-directo/torneo/liga-europa-de-la-uefa-/184/'>LIGA EUROPA DE LA UEFA </a>
                    </li>
                    <li>
                        <a href='/resultados-directo/torneo/campeonato-de-espana---copa-de-s.m.-el-rey/186/'>CAMPEONATO DE ESPAÑA - Copa de S.M. El Rey</a>
                    </li>
                    <li>
                        <a href=\"/resultados-directo/torneo/camp.-de-espana-copa-de-s.m.-el-rey-2020-21/2855/\">
                            <i style=\"margin-right: 10px;\" class=\"comunidad flag1\"></i>
                            CAMP. DE ESPAÑA - Copa de S.M. El Rey 2020-21
                        </a>
                    </li>
                </ul>

                <h3 class=\"menuTorneosTituloListado\" style=\"float:left; margin-top: 40px;\">Principales Selección</h3>
                <ul class=\"menuTorneosUL\">
                    <li>
                        <a href='/resultados-directo/torneo/copa-mundial-de-la-fifa/216/'>COPA MUNDIAL DE LA FIFA</a>
                    </li>
                    <li>
                        <a href='/resultados-directo/torneo/campeonato-europeo-de-la-uefa-/238/'>CAMPEONATO EUROPEO DE LA UEFA </a>
                    </li>
                </ul>
            </div>

            <div class=\"col-3\">
                <h3 class=\"menuTorneosTituloListado\">
                    <div class=\"flagbox pais flag60b\" style=\"margin-top:-7px; margin-right:10px\"></div>
                    RFEF
                </h3>
                <ul class=\"menuTorneosUL\">
                    ";
        // line 1937
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "RFEF", [], "any", false, false, false, 1937));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 1938
            echo "                        ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 1938);
            // line 1939
            echo "                        ";
            if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                // line 1940
                echo "                            ";
                $context["imagenComunidad"] = 55;
                // line 1941
                echo "                        ";
            } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                // line 1942
                echo "                            ";
                $context["imagenComunidad"] = 56;
                // line 1943
                echo "                        ";
            }
            // line 1944
            echo "                        <li>
                            <a href=\"";
            // line 1945
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 1945), "html", null, true);
            echo "\">
                                <i style=\"margin-right: 10px;\" class=\"comunidad flag";
            // line 1946
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 1946), "html", null, true);
            echo "\"></i>
                                ";
            // line 1947
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1947), "html", null, true);
            echo "
                            </a>
                        </li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1951
        echo "                </ul>
            </div>

            <div class=\"col-3\">
                <h3 class=\"menuTorneosTituloListado\">
                    <div class=\"flagbox pais flag200b\" style=\"margin-top:-7px; margin-right:10px\"></div>
                    FIFA
                </h3>
                <ul class=\"menuTorneosUL\">
                    ";
        // line 1960
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "FIFA", [], "any", false, false, false, 1960));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 1961
            echo "                        <li>
                            <a href=\"";
            // line 1962
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 1962), "html", null, true);
            echo "\">
                                ";
            // line 1963
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1963), "html", null, true);
            echo "
                            </a>
                        </li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1967
        echo "                </ul>
            </div>

            <div class=\"col-3\">
                <h3 class=\"menuTorneosTituloListado\">
                    UEFA
                    <div class=\"flagbox pais flag199b\" style=\"margin-top:-7px; margin-right:10px\"></div>
                </h3>
                <ul class=\"menuTorneosUL\">
                    ";
        // line 1976
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "UEFA", [], "any", false, false, false, 1976));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 1977
            echo "                        <li>
                            <a href=\"";
            // line 1978
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 1978), "html", null, true);
            echo "\">
                                ";
            // line 1979
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1979), "html", null, true);
            echo "
                            </a>
                        </li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1983
        echo "                </ul>
            </div>


        </div>
    </div>

    <div class=\"container-fluid menuDesplegable\" id=\"menuEuropa\">

        <div class=\"row\">
            ";
        // line 1993
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "europa", [], "any", false, false, false, 1993));
        foreach ($context['_seq'] as $context["nombrePais"] => $context["torneos"]) {
            // line 1994
            echo "                ";
            $context["tipoBandera"] = "";
            // line 1995
            echo "                ";
            $context["bandera"] = "";
            // line 1996
            echo "                ";
            $context["imagenPais"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["torneos"], 0, [], "any", false, false, false, 1996), "imagenPais", [], "any", false, false, false, 1996);
            // line 1997
            echo "                ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["torneos"], 0, [], "any", false, false, false, 1997), "imagenComunidad", [], "any", false, false, false, 1997);
            // line 1998
            echo "                <div class=\"col-3\" style=\"margin-bottom: 20px;\">
                    <h3 class=\"menuTorneosTituloListado\">
                        ";
            // line 2000
            if (0 !== twig_compare(($context["imagenPais"] ?? null), 60)) {
                // line 2001
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 2002
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 2003
                echo "                        ";
            } elseif ((0 === twig_compare(($context["imagenPais"] ?? null), 60) && -1 === twig_compare(($context["imagenComunidad"] ?? null), 2))) {
                // line 2004
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 2005
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 2006
                echo "                        ";
            } elseif (1 === twig_compare(($context["imagenComunidad"] ?? null), 1)) {
                // line 2007
                echo "                            ";
                $context["bandera"] = ($context["imagenComunidad"] ?? null);
                // line 2008
                echo "                            ";
                $context["tipoBandera"] = "comunidad";
                // line 2009
                echo "
                            ";
                // line 2010
                if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                    // line 2011
                    echo "                                ";
                    $context["bandera"] = 55;
                    // line 2012
                    echo "                            ";
                } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                    // line 2013
                    echo "                                ";
                    $context["bandera"] = 56;
                    // line 2014
                    echo "                            ";
                }
                // line 2015
                echo "
                        ";
            }
            // line 2017
            echo "
                        ";
            // line 2018
            if (0 === twig_compare(($context["tipoBandera"] ?? null), "pais")) {
                // line 2019
                echo "                            ";
                $context["bandera"] = (($context["bandera"] ?? null) . "b");
                // line 2020
                echo "                        ";
            }
            // line 2021
            echo "
                        ";
            // line 2022
            echo twig_escape_filter($this->env, $context["nombrePais"], "html", null, true);
            echo "
                    </h3>
                    <ul class=\"menuTorneosUL\">
                        ";
            // line 2025
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["torneos"]);
            foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
                // line 2026
                echo "                            <li>
                                <a href=\"";
                // line 2027
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 2027), "html", null, true);
                echo "\">
                                    <i style=\"margin-right: 10px;\" class=\"";
                // line 2028
                echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
                echo " flag";
                echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
                echo "\"></i>
                                    ";
                // line 2029
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 2029), "html", null, true);
                echo "
                                </a>
                            </li>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 2033
            echo "                    </ul>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['nombrePais'], $context['torneos'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 2036
        echo "        </div>
    </div>

    <div class=\"container-fluid menuDesplegable\" id=\"menuJuvenil\" style=\"max-width: 400px; right: 0px; margin-right: 0px;\">
        <div class=\"row\">
            <div class=\"col-12\">
                <h3 class=\"menuTorneosTituloListado\">Juvenil</h3>
                <ul class=\"menuTorneosUL row\">
                    ";
        // line 2044
        $context["nn"] = "";
        // line 2045
        echo "                    ";
        $context["counter"] = 0;
        echo " 

                    ";
        // line 2047
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "juvenil", [], "any", false, false, false, 2047));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 2048
            echo "                        ";
            $context["tipoBandera"] = "";
            // line 2049
            echo "                        ";
            $context["bandera"] = "";
            // line 2050
            echo "                        ";
            $context["imagenPais"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenPais", [], "any", false, false, false, 2050);
            // line 2051
            echo "                        ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 2051);
            // line 2052
            echo "
                        ";
            // line 2053
            if (0 !== twig_compare(($context["imagenPais"] ?? null), 60)) {
                // line 2054
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 2055
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 2056
                echo "                        ";
            } elseif ((0 === twig_compare(($context["imagenPais"] ?? null), 60) && -1 === twig_compare(($context["imagenComunidad"] ?? null), 2))) {
                // line 2057
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 2058
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 2059
                echo "                        ";
            } elseif (1 === twig_compare(($context["imagenComunidad"] ?? null), 1)) {
                // line 2060
                echo "                            ";
                $context["bandera"] = ($context["imagenComunidad"] ?? null);
                // line 2061
                echo "                            ";
                $context["tipoBandera"] = "comunidad";
                // line 2062
                echo "
                            ";
                // line 2063
                if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                    // line 2064
                    echo "                                ";
                    $context["bandera"] = 55;
                    // line 2065
                    echo "                            ";
                } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                    // line 2066
                    echo "                                ";
                    $context["bandera"] = 56;
                    // line 2067
                    echo "                            ";
                }
                // line 2068
                echo "
                             ";
                // line 2069
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["torneo"], "temporada_id", [], "any", false, false, false, 2069), 3093)) {
                    // line 2070
                    echo "                                    ";
                    $context["bandera"] = 22;
                    // line 2071
                    echo "                            ";
                }
                // line 2072
                echo "
                             ";
                // line 2073
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["torneo"], "temporada_id", [], "any", false, false, false, 2073), 3096)) {
                    // line 2074
                    echo "                                    ";
                    $context["bandera"] = 21;
                    // line 2075
                    echo "                            ";
                }
                // line 2076
                echo "
                        ";
            }
            // line 2078
            echo "
                        ";
            // line 2079
            if ((0 !== twig_compare(($context["bandera"] ?? null), "") && 0 === twig_compare(($context["tipoBandera"] ?? null), "pais"))) {
                // line 2080
                echo "                            ";
                $context["bandera"] = (($context["bandera"] ?? null) . "b");
                // line 2081
                echo "                        ";
            }
            echo " 
                        <li>                                       
                            ";
            // line 2083
            if (0 !== twig_compare(($context["bandera"] ?? null), "")) {
                echo "                                    
                                <div style=\"float:left;\"><div style=\"width:20px\"></div><i style=\"margin-top: 10px\" class=\"";
                // line 2084
                echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
                echo " flag";
                echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
                echo "\"\"></i></div>
                            ";
            }
            // line 2086
            echo "                             <div style=\"float:left; margin-right: 10px\">
                            <a href=\"";
            // line 2087
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 2087), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 2087), "html", null, true);
            echo "</a></div>
                        </li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 2090
        echo "                    
                </ul>
            </div>
        </div>
    </div>

    <div class=\"container-fluid menuDesplegable\" id=\"menuFemenino\" style=\"max-width: 400px; right: 0px; margin-right: 0px;\">
        <div class=\"row\">
            <div class=\"col-12\">
                <h3 class=\"menuTorneosTituloListado\">Femenino</h3>
                <ul class=\"menuTorneosUL row\">
                    ";
        // line 2101
        $context["nn"] = "";
        // line 2102
        echo "                    ";
        $context["counter"] = 0;
        echo " 

                    ";
        // line 2104
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "femenino", [], "any", false, false, false, 2104));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 2105
            echo "
                        ";
            // line 2106
            if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["torneo"], "id", [], "any", false, false, false, 2106), 71) || 0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["torneo"], "id", [], "any", false, false, false, 2106), 76))) {
                // line 2107
                echo "
                            ";
                // line 2108
                $context["nn"] = "";
                echo " 

                        ";
            }
            // line 2111
            echo "

                        ";
            // line 2113
            $context["tipoBandera"] = "";
            // line 2114
            echo "                        ";
            $context["bandera"] = "";
            // line 2115
            echo "                        ";
            $context["imagenPais"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenPais", [], "any", false, false, false, 2115);
            // line 2116
            echo "                        ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 2116);
            // line 2117
            echo "
                        ";
            // line 2118
            if (0 !== twig_compare(($context["imagenPais"] ?? null), 60)) {
                // line 2119
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 2120
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 2121
                echo "                        ";
            } elseif ((0 === twig_compare(($context["imagenPais"] ?? null), 60) && -1 === twig_compare(($context["imagenComunidad"] ?? null), 2))) {
                // line 2122
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 2123
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 2124
                echo "                        ";
            } elseif (1 === twig_compare(($context["imagenComunidad"] ?? null), 1)) {
                // line 2125
                echo "                            ";
                $context["bandera"] = ($context["imagenComunidad"] ?? null);
                // line 2126
                echo "                            ";
                $context["tipoBandera"] = "comunidad";
                // line 2127
                echo "
                            ";
                // line 2128
                if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                    // line 2129
                    echo "                                ";
                    $context["bandera"] = 55;
                    // line 2130
                    echo "                            ";
                } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                    // line 2131
                    echo "                                ";
                    $context["bandera"] = 56;
                    // line 2132
                    echo "                            ";
                }
                // line 2133
                echo "
                        ";
            }
            // line 2135
            echo "
                        ";
            // line 2136
            if ((0 !== twig_compare(($context["bandera"] ?? null), "") && 0 === twig_compare(($context["tipoBandera"] ?? null), "pais"))) {
                // line 2137
                echo "                            ";
                $context["bandera"] = (($context["bandera"] ?? null) . "b");
                // line 2138
                echo "                        ";
            }
            // line 2139
            echo "
                      
                <li>
                    <div style=\"float:left; padding:5px\">
                 ";
            // line 2143
            if (0 !== twig_compare(($context["bandera"] ?? null), "")) {
                echo "                                    
                    <div style=\"float:left\"><i style=\"margin-right: 10px;\" class=\"";
                // line 2144
                echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
                echo " flag";
                echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
                echo "\"></i></div>
                 ";
            }
            // line 2146
            echo "                 <div style=\"float:left; margin-right: 10px\"><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 2146), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 2146), "html", null, true);
            echo "</a></div>
                 </div>
                </li>

                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 2151
        echo "                    
                </ul>
            </div>
        </div>
    </div>

    <div class=\"container-fluid menuDesplegable\" id=\"menuFutbolSala\">
        <div class=\"row\">
            <div class=\"col-12\">
                <h3 class=\"menuTorneosTituloListado\">Fútbol Sala</h3>
                <ul class=\"menuTorneosUL row\">
                     
                     ";
        // line 2163
        $context["nn"] = "";
        // line 2164
        echo "                     ";
        $context["counter"] = 0;
        echo " 

                    ";
        // line 2166
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "sala", [], "any", false, false, false, 2166));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 2167
            echo "                        ";
            $context["tipoBandera"] = "";
            // line 2168
            echo "                        ";
            $context["bandera"] = "";
            // line 2169
            echo "                        ";
            $context["imagenPais"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenPais", [], "any", false, false, false, 2169);
            // line 2170
            echo "                        ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 2170);
            // line 2171
            echo "
                        ";
            // line 2172
            if (0 !== twig_compare(($context["imagenPais"] ?? null), 60)) {
                // line 2173
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 2174
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 2175
                echo "                        ";
            } elseif ((0 === twig_compare(($context["imagenPais"] ?? null), 60) && -1 === twig_compare(($context["imagenComunidad"] ?? null), 2))) {
                // line 2176
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 2177
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 2178
                echo "                        ";
            } elseif (1 === twig_compare(($context["imagenComunidad"] ?? null), 1)) {
                // line 2179
                echo "                            ";
                $context["bandera"] = ($context["imagenComunidad"] ?? null);
                // line 2180
                echo "                            ";
                $context["tipoBandera"] = "comunidad";
                // line 2181
                echo "
                            ";
                // line 2182
                if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                    // line 2183
                    echo "                                ";
                    $context["bandera"] = 55;
                    // line 2184
                    echo "                            ";
                } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                    // line 2185
                    echo "                                ";
                    $context["bandera"] = 56;
                    // line 2186
                    echo "                            ";
                }
                // line 2187
                echo "
                        ";
            }
            // line 2189
            echo "
                        ";
            // line 2190
            if ((0 !== twig_compare(($context["bandera"] ?? null), "") && 0 === twig_compare(($context["tipoBandera"] ?? null), "pais"))) {
                // line 2191
                echo "                            ";
                $context["bandera"] = (($context["bandera"] ?? null) . "b");
                // line 2192
                echo "                        ";
            }
            // line 2193
            echo "
                        

                                ";
            // line 2196
            $context["t"] = twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 2196), 0,  -7);
            // line 2197
            echo "                                ";
            if (0 !== twig_compare(($context["nn"] ?? null), ($context["t"] ?? null))) {
                echo "                                    
                                    
                                     ";
                // line 2199
                if (0 !== twig_compare(($context["counter"] ?? null), 0)) {
                    echo "   
                                        </tr></table></li>
                                       ";
                    // line 2201
                    $context["counter"] = 0;
                    echo " 
                                    ";
                }
                // line 2203
                echo "
                                    <li class=\"col-4\">
                                        <table class=\"table\"><tr><td>
                                    ";
                // line 2206
                if (0 !== twig_compare(($context["bandera"] ?? null), "")) {
                    echo "                                    
                                        <i style=\"margin-right: 10px;\" class=\"";
                    // line 2207
                    echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
                    echo " flag";
                    echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
                    echo "\"></i>
                                    ";
                }
                // line 2209
                echo "                                        </td>

                                    ";
                // line 2211
                $context["parte"] = twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 2211),  -7);
                // line 2212
                echo "
                                    ";
                // line 2213
                if (0 !== twig_compare(twig_slice($this->env, ($context["parte"] ?? null), 0, 5), "Grupo")) {
                    echo " 
                                    <td><a href=\"";
                    // line 2214
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 2214), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 2214), "html", null, true);
                    echo "</a></td>
                                    ";
                } else {
                    // line 2216
                    echo "
                                   <td style=\"color: #AFAFAF;font-family: Roboto;font-style: normal;font-weight: normal;font-size: 13px;\">";
                    // line 2217
                    echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 2217), 0,  -9), "html", null, true);
                    echo "</td>
                                   <td align=\"center\"><a href=\"";
                    // line 2218
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 2218), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 2218),  -7), "html", null, true);
                    echo "</a></td>
                                    
                                    ";
                }
                // line 2220
                echo "                                    

                                ";
            } else {
                // line 2223
                echo "
                                <td align=\"center\"><a href=\"";
                // line 2224
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 2224), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 2224),  -7), "html", null, true);
                echo "</a></td>
                                ";
            }
            // line 2226
            echo "
                                ";
            // line 2227
            $context["counter"] = (($context["counter"] ?? null) + 1);
            // line 2228
            echo "                                ";
            $context["nn"] = ($context["t"] ?? null);
            echo " 
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 2230
        echo "                    </tr></table></li>
                </ul>
            </div>
        </div>
    </div>

    ";
        // line 2253
        echo "
    <script async src=\"";
        // line 2254
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/js/hambuerguer-menu-multilevel-hayleyt.js?v=1\"></script>
    <footer class=\"col-12\" style=\"color:#2F4F4F; text-align:center; padding-top: 20px; padding-bottom:7px; bottom: 2px !important;\">
        - <a href=\"/aviso-legal\" rel=\"nofollow noopener noreferrer\" style=\"color:#2F4F4F;\">Aviso Legal</a>
        - Futbolme 1999-2023
    </footer>

    <div class=\"col-12 text-center\" style=\"font-size: 14px; color: #333333; margin-bottom: 90px;\">
        ";
        // line 2261
        $context["tiempoTotal"] = (call_user_func_array($this->env->getFunction('microtime')->getCallable(), [true]) - call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__INICIO_MICROTIME__"]));
        // line 2262
        echo "        Página generada en ";
        echo twig_escape_filter($this->env, twig_round(($context["tiempoTotal"] ?? null), 1), "html", null, true);
        echo " segundos
    </div>

    ";
        // line 2266
        echo "    
    

    ";
        // line 2275
        echo "
</body>
</html>";
    }

    // line 40
    public function block_bloqueCss($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 41
        echo "
    ";
    }

    // line 148
    public function block_bloqueJs($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 149
        echo "
    ";
    }

    // line 1489
    public function block_contenedorIzquierda($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1490
        echo "
                    ";
    }

    // line 1506
    public function block_contenedorCentral($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1507
        echo "
            ";
    }

    // line 1612
    public function block_contenedorDerecha($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1613
        echo "
                    ";
    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  3863 => 1613,  3859 => 1612,  3854 => 1507,  3850 => 1506,  3845 => 1490,  3841 => 1489,  3836 => 149,  3832 => 148,  3827 => 41,  3823 => 40,  3817 => 2275,  3812 => 2266,  3805 => 2262,  3803 => 2261,  3793 => 2254,  3790 => 2253,  3782 => 2230,  3773 => 2228,  3771 => 2227,  3768 => 2226,  3761 => 2224,  3758 => 2223,  3753 => 2220,  3745 => 2218,  3741 => 2217,  3738 => 2216,  3731 => 2214,  3727 => 2213,  3724 => 2212,  3722 => 2211,  3718 => 2209,  3711 => 2207,  3707 => 2206,  3702 => 2203,  3697 => 2201,  3692 => 2199,  3686 => 2197,  3684 => 2196,  3679 => 2193,  3676 => 2192,  3673 => 2191,  3671 => 2190,  3668 => 2189,  3664 => 2187,  3661 => 2186,  3658 => 2185,  3655 => 2184,  3652 => 2183,  3650 => 2182,  3647 => 2181,  3644 => 2180,  3641 => 2179,  3638 => 2178,  3635 => 2177,  3632 => 2176,  3629 => 2175,  3626 => 2174,  3623 => 2173,  3621 => 2172,  3618 => 2171,  3615 => 2170,  3612 => 2169,  3609 => 2168,  3606 => 2167,  3602 => 2166,  3596 => 2164,  3594 => 2163,  3580 => 2151,  3566 => 2146,  3559 => 2144,  3555 => 2143,  3549 => 2139,  3546 => 2138,  3543 => 2137,  3541 => 2136,  3538 => 2135,  3534 => 2133,  3531 => 2132,  3528 => 2131,  3525 => 2130,  3522 => 2129,  3520 => 2128,  3517 => 2127,  3514 => 2126,  3511 => 2125,  3508 => 2124,  3505 => 2123,  3502 => 2122,  3499 => 2121,  3496 => 2120,  3493 => 2119,  3491 => 2118,  3488 => 2117,  3485 => 2116,  3482 => 2115,  3479 => 2114,  3477 => 2113,  3473 => 2111,  3467 => 2108,  3464 => 2107,  3462 => 2106,  3459 => 2105,  3455 => 2104,  3449 => 2102,  3447 => 2101,  3434 => 2090,  3423 => 2087,  3420 => 2086,  3413 => 2084,  3409 => 2083,  3403 => 2081,  3400 => 2080,  3398 => 2079,  3395 => 2078,  3391 => 2076,  3388 => 2075,  3385 => 2074,  3383 => 2073,  3380 => 2072,  3377 => 2071,  3374 => 2070,  3372 => 2069,  3369 => 2068,  3366 => 2067,  3363 => 2066,  3360 => 2065,  3357 => 2064,  3355 => 2063,  3352 => 2062,  3349 => 2061,  3346 => 2060,  3343 => 2059,  3340 => 2058,  3337 => 2057,  3334 => 2056,  3331 => 2055,  3328 => 2054,  3326 => 2053,  3323 => 2052,  3320 => 2051,  3317 => 2050,  3314 => 2049,  3311 => 2048,  3307 => 2047,  3301 => 2045,  3299 => 2044,  3289 => 2036,  3281 => 2033,  3271 => 2029,  3265 => 2028,  3261 => 2027,  3258 => 2026,  3254 => 2025,  3248 => 2022,  3245 => 2021,  3242 => 2020,  3239 => 2019,  3237 => 2018,  3234 => 2017,  3230 => 2015,  3227 => 2014,  3224 => 2013,  3221 => 2012,  3218 => 2011,  3216 => 2010,  3213 => 2009,  3210 => 2008,  3207 => 2007,  3204 => 2006,  3201 => 2005,  3198 => 2004,  3195 => 2003,  3192 => 2002,  3189 => 2001,  3187 => 2000,  3183 => 1998,  3180 => 1997,  3177 => 1996,  3174 => 1995,  3171 => 1994,  3167 => 1993,  3155 => 1983,  3145 => 1979,  3141 => 1978,  3138 => 1977,  3134 => 1976,  3123 => 1967,  3113 => 1963,  3109 => 1962,  3106 => 1961,  3102 => 1960,  3091 => 1951,  3081 => 1947,  3077 => 1946,  3073 => 1945,  3070 => 1944,  3067 => 1943,  3064 => 1942,  3061 => 1941,  3058 => 1940,  3055 => 1939,  3052 => 1938,  3048 => 1937,  3001 => 1892,  2991 => 1888,  2982 => 1886,  2977 => 1885,  2975 => 1884,  2972 => 1883,  2964 => 1880,  2961 => 1879,  2951 => 1871,  2943 => 1869,  2937 => 1866,  2934 => 1865,  2926 => 1862,  2921 => 1860,  2916 => 1857,  2914 => 1856,  2910 => 1854,  2905 => 1852,  2901 => 1851,  2896 => 1848,  2891 => 1846,  2886 => 1844,  2881 => 1842,  2876 => 1841,  2873 => 1840,  2870 => 1839,  2867 => 1838,  2864 => 1837,  2862 => 1836,  2859 => 1835,  2853 => 1831,  2850 => 1830,  2847 => 1829,  2844 => 1828,  2841 => 1827,  2838 => 1826,  2835 => 1825,  2832 => 1824,  2829 => 1823,  2827 => 1822,  2824 => 1821,  2821 => 1820,  2818 => 1819,  2815 => 1818,  2812 => 1817,  2808 => 1816,  2803 => 1813,  2801 => 1812,  2796 => 1811,  2794 => 1810,  2791 => 1809,  2787 => 1808,  2773 => 1796,  2759 => 1792,  2752 => 1790,  2748 => 1789,  2743 => 1786,  2740 => 1785,  2737 => 1784,  2734 => 1783,  2731 => 1782,  2729 => 1781,  2726 => 1780,  2722 => 1778,  2719 => 1777,  2716 => 1776,  2713 => 1775,  2710 => 1774,  2708 => 1773,  2705 => 1772,  2702 => 1771,  2699 => 1770,  2696 => 1769,  2693 => 1768,  2690 => 1767,  2687 => 1766,  2684 => 1765,  2681 => 1764,  2679 => 1763,  2676 => 1762,  2673 => 1761,  2670 => 1760,  2667 => 1759,  2664 => 1758,  2660 => 1757,  2654 => 1755,  2652 => 1754,  2636 => 1740,  2622 => 1736,  2615 => 1734,  2611 => 1733,  2606 => 1730,  2603 => 1729,  2600 => 1728,  2597 => 1727,  2595 => 1726,  2591 => 1724,  2588 => 1723,  2585 => 1722,  2582 => 1721,  2579 => 1720,  2577 => 1719,  2574 => 1718,  2570 => 1716,  2567 => 1715,  2564 => 1714,  2561 => 1713,  2558 => 1712,  2556 => 1711,  2553 => 1710,  2550 => 1709,  2547 => 1708,  2544 => 1707,  2541 => 1706,  2538 => 1705,  2535 => 1704,  2532 => 1703,  2529 => 1702,  2527 => 1701,  2524 => 1700,  2521 => 1699,  2518 => 1698,  2515 => 1697,  2512 => 1696,  2508 => 1695,  2502 => 1693,  2500 => 1692,  2488 => 1682,  2474 => 1677,  2467 => 1675,  2463 => 1674,  2459 => 1672,  2455 => 1671,  2443 => 1661,  2430 => 1657,  2423 => 1655,  2419 => 1654,  2415 => 1652,  2411 => 1651,  2388 => 1630,  2383 => 1627,  2379 => 1618,  2376 => 1617,  2374 => 1616,  2371 => 1615,  2369 => 1612,  2359 => 1604,  2356 => 1582,  2350 => 1562,  2347 => 1561,  2345 => 1560,  2340 => 1557,  2335 => 1554,  2333 => 1553,  2329 => 1551,  2327 => 1550,  2324 => 1549,  2321 => 1548,  2319 => 1547,  2315 => 1545,  2304 => 1533,  2302 => 1532,  2299 => 1531,  2296 => 1530,  2293 => 1529,  2290 => 1528,  2287 => 1527,  2285 => 1526,  2282 => 1525,  2280 => 1524,  2267 => 1513,  2265 => 1512,  2260 => 1509,  2258 => 1506,  2253 => 1503,  2246 => 1499,  2243 => 1498,  2241 => 1497,  2234 => 1492,  2232 => 1489,  2226 => 1485,  2223 => 1484,  2221 => 1483,  2216 => 1480,  2213 => 1479,  2208 => 1476,  2206 => 1475,  2202 => 1473,  2200 => 1472,  2197 => 1471,  2194 => 1470,  2191 => 1469,  2189 => 1468,  2186 => 1467,  2183 => 1466,  2180 => 1465,  2178 => 1464,  2175 => 1463,  2173 => 1462,  2169 => 1460,  2167 => 1457,  2165 => 1454,  2154 => 1442,  2152 => 1441,  2149 => 1440,  2146 => 1439,  2143 => 1438,  2140 => 1437,  2137 => 1436,  2135 => 1435,  2132 => 1434,  2130 => 1433,  2124 => 1429,  2122 => 1428,  2103 => 1412,  2100 => 1411,  2096 => 1404,  2089 => 1309,  2075 => 1304,  2068 => 1302,  2064 => 1301,  2059 => 1298,  2056 => 1297,  2053 => 1296,  2051 => 1295,  2048 => 1294,  2044 => 1292,  2041 => 1291,  2038 => 1290,  2035 => 1289,  2032 => 1288,  2030 => 1287,  2027 => 1286,  2024 => 1285,  2021 => 1284,  2018 => 1283,  2015 => 1282,  2012 => 1281,  2009 => 1280,  2006 => 1279,  2003 => 1278,  2001 => 1277,  1998 => 1276,  1995 => 1275,  1992 => 1274,  1989 => 1273,  1987 => 1272,  1981 => 1268,  1977 => 1267,  1971 => 1265,  1969 => 1264,  1946 => 1243,  1934 => 1239,  1931 => 1238,  1924 => 1236,  1920 => 1235,  1916 => 1233,  1913 => 1232,  1910 => 1231,  1908 => 1230,  1905 => 1229,  1900 => 1226,  1897 => 1225,  1894 => 1224,  1892 => 1223,  1889 => 1222,  1886 => 1221,  1883 => 1220,  1881 => 1219,  1878 => 1218,  1875 => 1217,  1872 => 1216,  1869 => 1215,  1866 => 1214,  1864 => 1213,  1861 => 1212,  1858 => 1211,  1855 => 1210,  1852 => 1209,  1849 => 1208,  1846 => 1207,  1843 => 1206,  1840 => 1205,  1837 => 1204,  1835 => 1203,  1832 => 1202,  1829 => 1201,  1826 => 1200,  1823 => 1199,  1820 => 1198,  1816 => 1197,  1810 => 1195,  1808 => 1194,  1789 => 1177,  1781 => 1174,  1771 => 1170,  1767 => 1169,  1764 => 1168,  1760 => 1167,  1749 => 1159,  1743 => 1158,  1740 => 1157,  1737 => 1156,  1734 => 1155,  1732 => 1154,  1729 => 1153,  1725 => 1151,  1722 => 1150,  1719 => 1149,  1716 => 1148,  1713 => 1147,  1711 => 1146,  1708 => 1145,  1705 => 1144,  1702 => 1143,  1699 => 1142,  1696 => 1141,  1693 => 1140,  1690 => 1139,  1687 => 1138,  1684 => 1137,  1682 => 1136,  1678 => 1134,  1675 => 1133,  1672 => 1132,  1669 => 1131,  1666 => 1130,  1662 => 1129,  1642 => 1111,  1632 => 1107,  1628 => 1106,  1625 => 1105,  1621 => 1104,  1607 => 1092,  1597 => 1088,  1593 => 1087,  1590 => 1086,  1586 => 1085,  1572 => 1073,  1562 => 1069,  1558 => 1068,  1554 => 1067,  1551 => 1066,  1548 => 1065,  1545 => 1064,  1542 => 1063,  1539 => 1062,  1536 => 1061,  1533 => 1060,  1529 => 1059,  1469 => 1001,  1462 => 1000,  1452 => 997,  1450 => 996,  1447 => 995,  1440 => 993,  1437 => 992,  1432 => 989,  1424 => 987,  1418 => 984,  1415 => 983,  1407 => 980,  1402 => 978,  1399 => 977,  1397 => 976,  1393 => 974,  1388 => 972,  1384 => 971,  1379 => 968,  1374 => 966,  1369 => 964,  1364 => 962,  1360 => 961,  1355 => 958,  1352 => 957,  1349 => 956,  1346 => 955,  1343 => 954,  1341 => 953,  1338 => 952,  1334 => 950,  1331 => 949,  1328 => 948,  1325 => 947,  1322 => 946,  1319 => 945,  1316 => 944,  1313 => 943,  1310 => 942,  1308 => 941,  1305 => 940,  1302 => 939,  1299 => 938,  1296 => 937,  1293 => 936,  1289 => 935,  1283 => 933,  1281 => 932,  1278 => 931,  1274 => 930,  1255 => 913,  1241 => 909,  1234 => 907,  1230 => 906,  1222 => 900,  1219 => 899,  1216 => 898,  1213 => 897,  1211 => 896,  1207 => 894,  1204 => 893,  1201 => 892,  1198 => 891,  1195 => 890,  1193 => 889,  1190 => 888,  1186 => 886,  1183 => 885,  1180 => 884,  1177 => 883,  1174 => 882,  1172 => 881,  1169 => 880,  1166 => 879,  1163 => 878,  1160 => 877,  1157 => 876,  1154 => 875,  1151 => 874,  1148 => 873,  1145 => 872,  1143 => 871,  1140 => 870,  1137 => 869,  1134 => 868,  1131 => 867,  1128 => 866,  1124 => 865,  1118 => 863,  1116 => 862,  1100 => 848,  1086 => 844,  1079 => 842,  1075 => 841,  1071 => 839,  1068 => 838,  1065 => 837,  1062 => 836,  1059 => 835,  1057 => 834,  1054 => 833,  1050 => 831,  1047 => 830,  1044 => 829,  1041 => 828,  1038 => 827,  1036 => 826,  1033 => 825,  1030 => 824,  1027 => 823,  1024 => 822,  1021 => 821,  1018 => 820,  1015 => 819,  1012 => 818,  1009 => 817,  1007 => 816,  1004 => 815,  1001 => 814,  998 => 813,  995 => 812,  992 => 811,  988 => 810,  982 => 808,  980 => 807,  953 => 782,  939 => 777,  932 => 775,  928 => 774,  920 => 771,  917 => 770,  914 => 769,  912 => 768,  888 => 746,  874 => 741,  867 => 739,  863 => 738,  855 => 735,  840 => 725,  834 => 721,  831 => 720,  829 => 719,  780 => 673,  773 => 669,  765 => 664,  742 => 644,  738 => 642,  696 => 595,  618 => 519,  611 => 514,  604 => 502,  593 => 494,  581 => 485,  577 => 484,  569 => 478,  561 => 472,  559 => 471,  552 => 467,  548 => 466,  542 => 462,  538 => 460,  534 => 458,  532 => 457,  529 => 456,  525 => 454,  523 => 453,  518 => 450,  510 => 443,  508 => 442,  501 => 437,  499 => 436,  495 => 434,  491 => 432,  489 => 431,  485 => 429,  477 => 420,  474 => 401,  438 => 347,  435 => 344,  432 => 342,  429 => 341,  422 => 338,  419 => 337,  404 => 317,  393 => 309,  391 => 301,  381 => 293,  379 => 292,  369 => 284,  363 => 279,  358 => 267,  356 => 211,  353 => 191,  339 => 178,  324 => 165,  322 => 164,  317 => 161,  310 => 151,  308 => 148,  263 => 106,  230 => 76,  204 => 55,  198 => 54,  192 => 53,  188 => 52,  184 => 51,  178 => 50,  172 => 49,  168 => 48,  163 => 46,  159 => 45,  155 => 44,  152 => 43,  150 => 40,  145 => 38,  139 => 37,  133 => 36,  127 => 35,  123 => 34,  119 => 32,  116 => 31,  112 => 29,  110 => 28,  107 => 27,  103 => 25,  101 => 24,  98 => 23,  94 => 21,  92 => 20,  89 => 19,  87 => 18,  83 => 16,  80 => 14,  71 => 11,  63 => 10,  55 => 9,  50 => 6,  48 => 5,  42 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "base.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/base.html.twig");
    }
}
