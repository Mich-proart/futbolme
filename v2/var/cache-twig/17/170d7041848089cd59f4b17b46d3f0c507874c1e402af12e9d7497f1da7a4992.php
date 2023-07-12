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
class __TwigTemplate_99f459b5d552d1ecb3a009c012622f8604996995e16da4d62355b4fd27fb850a extends Template
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
        echo "    ";
        // line 19
        echo "
    ";
        // line 20
        if (call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_IOS__"])) {
            // line 21
            echo "
        ";
            // line 22
            $context["espacio"] = "enHeadiOS";
            // line 23
            echo "
    ";
        } elseif (call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_MOBILE__"])) {
            // line 25
            echo "
        ";
            // line 26
            $context["espacio"] = "enHeadMobile";
            // line 27
            echo "
    ";
        } else {
            // line 29
            echo "
        ";
            // line 30
            $context["espacio"] = "enHead";
            // line 31
            echo "
    ";
        }
        // line 33
        echo "    ";
        $this->loadTemplate("publicidad/publiGestion.html.twig", "base.html.twig", 33)->display($context);
        // line 34
        echo "
    <link href=\"https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Dosis:wght@200;300;400;500;523;600;700;800&display=swap\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/bs4.5/css/bootstrap.min.css\">
    <link rel=\"stylesheet\" href=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/css/fm.css?v=";
        echo twig_escape_filter($this->env, ($context["staticVersion"] ?? null), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" href=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/css/comunidades.min.css?v=";
        echo twig_escape_filter($this->env, ($context["staticVersion"] ?? null), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" href=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/css/paises.min.css?v=";
        echo twig_escape_filter($this->env, ($context["staticVersion"] ?? null), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" href=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/fontawesome/css/all.css\">
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css\">
    ";
        // line 42
        $this->displayBlock('bloqueCss', $context, $blocks);
        // line 45
        echo "
    <script type=\"text/javascript\" src=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/jquery/jquery-3.5.1.min.js\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/popper/popper.js\"></script>
    <script async src=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/js/bootstrap.min.js\"></script>

    <script async src=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/js/bootstrap.bundle.min.js\"></script>
    <script async src=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/js/comunsite.min.js?v=";
        echo twig_escape_filter($this->env, ($context["staticVersion"] ?? null), "html", null, true);
        echo "\"></script>
    <script async src=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/js/notificaciones.js?v=";
        echo twig_escape_filter($this->env, ($context["staticVersion"] ?? null), "html", null, true);
        echo "\"></script>
    <script type='text/javascript' src=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/js/highcharts.min.js\"></script>
    <script async src=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/js/exporting.js\"></script>
    <script async src=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/js/ajax.js?v=";
        echo twig_escape_filter($this->env, ($context["staticVersion"] ?? null), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/js/global.js?v=";
        echo twig_escape_filter($this->env, ($context["staticVersion"] ?? null), "html", null, true);
        echo "\"></script>
    <script async src=\"";
        // line 57
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
        // line 78
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
        // line 108
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


    <script type=\"text/javascript\">

        ";
        // line 189
        echo "
    </script>


    ";
        // line 193
        $this->displayBlock('bloqueJs', $context, $blocks);
        // line 196
        echo "




";
        // line 206
        echo "



    <script type=\"text/javascript\">
        ";
        // line 211
        $context["torneosNotificaciones"] = [];
        // line 212
        echo "
        ";
        // line 213
        $context["torneosNotificaciones"] = call_user_func_array($this->env->getFunction('anadirAArray')->getCallable(), [($context["torneosNotificaciones"] ?? null), 1]);
        // line 214
        echo "        ";
        $context["torneosNotificaciones"] = call_user_func_array($this->env->getFunction('anadirAArray')->getCallable(), [($context["torneosNotificaciones"] ?? null), 2]);
        // line 215
        echo "
        ";
        // line 216
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(2615, 2624));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 217
            echo "            ";
            $context["torneosNotificaciones"] = call_user_func_array($this->env->getFunction('anadirAArray')->getCallable(), [($context["torneosNotificaciones"] ?? null), $context["i"]]);
            // line 218
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 219
        echo "
        ";
        // line 221
        echo "
        var torneosNotificaciones = [";
        // line 222
        echo twig_escape_filter($this->env, twig_join_filter(($context["torneosNotificaciones"] ?? null), ","), "html", null, true);
        echo "];

        function getNotificaciones1() {
            \$.ajax({
                type: \"POST\",
                url: \"/z_notificaciones1\",
                cache: false,
                data: {'torneos': JSON.stringify(torneosNotificaciones)}
            })
            .done(function (data) {
                \$('#NotificacionesFinales').html(data);
                //vamosCracks();
            });
        }

        setInterval(function () {
            getNotificaciones1();
        },60000);
    </script>

    ";
        // line 242
        if ( !call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_MOBILE__"])) {
            // line 243
            echo "    <!-- Hotjar Tracking Code for https://futbolme.com/ -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:2071424,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
    ";
        }
        // line 255
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
        // line 268
        echo "
    ";
        // line 288
        echo "    ";
        // line 344
        echo "
    <!-- mobusi -->
        
        ";
        // line 356
        echo "
 <!-- fin mobusi -->

 <!-- clickiogeneralCod -->
 ";
        // line 361
        echo " <!-- clickioTopSticky head -->
 <script>
         
            \$(function () {

                setInterval(function () {


                    ";
        // line 369
        if (call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_MOBILE__"])) {
            // line 370
            echo "                        if(\$('#r89-mobile-billboard-top-sticky-1-0-wrapper').length == 0 || \$(\"#r89-mobile-billboard-top-sticky-1-0-wrapper:visible\").length == 0)
                        {
                            \$(\"#headeradd\").css(\"height\", \"0px\");
                            \$(\"#contenedorGlobal\").attr('style', 'margin-top: 0px !important');
                        }else{
                            \$(\"#contenedorGlobal\").css(\"margin-top\", \"80px\");
                        }
                    ";
        } else {
            // line 378
            echo "                        ";
            // line 386
            echo "                    ";
        }
        // line 387
        echo "

                },1000);
            });

 </script>
 <script src=\"https://emea.hhkld.com/tag/load-106485.js\" async  charset=\"UTF-8\" ></script>
<style>@media only screen and (min-width: 768px){.header{width: 100%;top: 0;z-index: 10000001;transition:all 0.5s;}#top_sticky{width:100%;padding:0px 0;text-align:center;}#contenedorGlobal {margin-top: 140px !important;transition:all 0.5s;}}</style>
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
        // line 414
        echo "
<body class=\"";
        // line 415
        if ((isset($context["classPagina"]) || array_key_exists("classPagina", $context))) {
            echo twig_escape_filter($this->env, ($context["classPagina"] ?? null), "html", null, true);
        }
        echo "\">

";
        // line 418
        echo "
";
        // line 424
        echo "
 <!-- clickioTopSticky body -->
    ";
        // line 436
        echo "





<!-- Clickio anuncio cabecera -->
";
        // line 447
        echo "
<!-- age warning toast -->
<div class=\"modal fade\" id=\"exampleModalCenter\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalCenterTitle\" style=\"display: none; padding-right: 17px;\">
  <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
    <div class=\"modal-content\">
      <div class=\"modal-header\" style=\"justify-content: center;background: #2d712b!important;color: #fff;\">
        <h5 class=\"modal-title\" id=\"exampleModalCenterTitle\" style=\"
\">Debes ser mayor de edad para acceder</h5>
        
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
        // line 500
        echo "
";
        // line 519
        echo "
<!-- ONENETWORK -->
<script type=\"text/javascript\" src=\"https://video.onnetwork.tv/widget/widget_scrolllist.php?widget=903&cId=myContainer1\" defer></script>

<!-- mobusi -->
<!-- /22634706711/Futbolme_1x1_video -->
        ";
        // line 530
        echo "<!-- fin mobusi -->

<!-- MOBUSI -->
";
        // line 534
        echo "
<!-- END MOBUSI -->


";
        // line 541
        echo "

";
        // line 543
        if (call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_MOBILE__"])) {
            // line 544
            echo "    ";
            $context["espacio"] = "despuesDeAbrirBodyMobile";
        } else {
            // line 546
            echo "    ";
            $context["espacio"] = "despuesDeAbrirBody";
        }
        // line 548
        $this->loadTemplate("publicidad/publiGestion.html.twig", "base.html.twig", 548)->display($context);
        // line 549
        echo "
<div id=\"NotificacionesFinales\">

</div>

";
        // line 554
        $context["menu"] = call_user_func_array($this->env->getFunction('getMenu')->getCallable(), []);
        // line 555
        echo "

<div id=\"contenedorMenuSuperior\">
 
    <div class=\"header\" id=\"headeradd\">
    <div id=\"top_sticky\">
        ";
        // line 562
        echo "    </div>
    </div>

    ";
        // line 565
        if (call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_MOBILE__"])) {
            // line 566
            echo "        <div id=\"headerPublicidad\" style=\"height:auto\"></div>          
    ";
        }
        // line 568
        echo "
    ";
        // line 569
        if (call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_MOBILE__"])) {
            // line 570
            echo "        <nav id=\"menuTop\">            
    ";
        } else {
            // line 572
            echo "        <nav id=\"menuTop\">
    ";
        }
        // line 574
        echo "        
        <ul id=\"ulMenuDe\">
            <li class=\"d-none d-md-block\">
                <a href=\"";
        // line 577
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("partidosTelevisados"), "html", null, true);
        echo "\">
                    <img src=\"";
        // line 578
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
        // line 587
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
        // line 595
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/img/icono-busqueda.svg\" alt=\"FinderAnt\" class=\"loading\" data-was-processed=\"true\">
                </a>
            </li>
            
            ";
        // line 607
        echo "
            

            <li id=\"hamburgerMenu\" class=\"d-block d-md-none\">
                <a class=\"js-menuToggle\" href=\"javascript:;\" title=\"Menú móvil\">
                    <img src=\"";
        // line 612
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/img/hamburger-menu.svg\" alt=\"Menú móvil\" title=\"Menú móvil\">
                </a>
            </li>
        </ul>

        <div id=\"menuTopContenido\">
            <ul id=\"ulMenuIz\" class=\"col-xs-12 nav nav-pills\">
                <li id=\"liLogoFutbolme\">
                    <a href=\"";
        // line 620
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "\">
                        <img src=\"";
        // line 621
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/img/logo-new-futbolme.png\" alt=\"Logo Futbolme.com\" class=\"loading\" data-was-processed=\"true\">
                    </a>
                </li>
                <li class=\"dropdown h40 visible-xs text-center\">
                    ";
        // line 625
        if ( !call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_MOBILE__"])) {
            // line 626
            echo "            
                        <!-- <div class=\"col-12 text-center\" style=\"margin-left: 100px\"> 
                        <script data-cfasync=\"false\" type=\"text/javascript\" src=\"https://www.linkonclick.com/a/display.php?r=4366455\"></script>
                        </div>-->

                    ";
        }
        // line 632
        echo "                </li>
            </ul>
        </div>
    </nav>

    <nav id=\"menuBottom\" class=\"d-none d-md-block\" style=\"text-align:center;\">
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
        // line 705
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
        // line 752
        echo "
            <li id=\"liContactoMenu\" class=\"torneosPrincipales\">
                <a id=\"enlaceContactoMenu\" href=\"";
        // line 754
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
        // line 774
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("partidosTelevisados"), "html", null, true);
        echo "\">
                    Televisados
                </a>
            </li>
            <li>
                <img style=\"margin-left: 18px; margin-right: 5px;\" src=\"";
        // line 779
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/img/icono-busqueda.svg\" alt=\"\" class=\"loading\" data-was-processed=\"true\">
                <input type=\"text\" id=\"campoBusquedaEquiposMobile\" placeholder=\"Busca aquí tu equipo\">
            </li>
            <li style=\"margin-top: 10px;\">
                <img style=\"margin-left: 18px; margin-right: 5px;\" src=\"";
        // line 783
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
        // line 829
        $context["bandera"] = "60b";
        // line 830
        echo "                        ";
        $context["tipoBandera"] = "pais";
        // line 831
        echo "
                        <li> 
                        <div style=\"float: left;\">         
                                                           
                            <div style=\"float:left;\"><div style=\"width:20px\"></div><i style=\"margin-top: 10px\" class=\"";
        // line 835
        echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
        echo " flag";
        echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
        echo "\"></i></div>
                        
                        <div style=\"float:left\"><a href=\"/resultados-directo/torneo/espana-primera-division-rfef-campeon-absoluto/3138/\">Campeón Absoluto</a></div>

                        </div>
                        </li>




                        ";
        // line 845
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "primeraRFEF", [], "any", false, false, false, 845));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            echo "                                 
                        <li> 
                        <div style=\"float: left;\">         
                        ";
            // line 848
            if (0 !== twig_compare(($context["bandera"] ?? null), "")) {
                echo "                                    
                            <div style=\"float:left;\"><div style=\"width:20px\"></div><i style=\"margin-top: 10px\" class=\"";
                // line 849
                echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
                echo " flag";
                echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
                echo "\"\"></i></div>
                        ";
            }
            // line 851
            echo "                        <div style=\"float:left\"><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 851), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 851), ["PRIMERA" => "1ª"]), "html", null, true);
            echo "</a></div>

                        </div>
                        </li>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 856
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
        // line 878
        $context["bandera"] = "60b";
        // line 879
        echo "                        ";
        $context["tipoBandera"] = "pais";
        // line 880
        echo "
                        ";
        // line 881
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "segundaRFEF", [], "any", false, false, false, 881));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            echo "                                 
                        <li>          
                        <div style=\"float: left;\">         
                        ";
            // line 884
            if (0 !== twig_compare(($context["bandera"] ?? null), "")) {
                echo "                                    
                            <div style=\"float:left;\"><div style=\"width:20px\"></div><i style=\"margin-top: 10px\" class=\"";
                // line 885
                echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
                echo " flag";
                echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
                echo "\"\"></i></div>
                        ";
            }
            // line 887
            echo "                        <div style=\"float:left\"><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 887), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 887), ["SEGUNDA" => "2ª"]), "html", null, true);
            echo "</a></div>

                        </div>
                        </li>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 892
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
        // line 917
        $context["nn"] = "";
        // line 918
        echo "                    ";
        $context["counter"] = 0;
        echo " 

                    ";
        // line 920
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "terceraRFEF", [], "any", false, false, false, 920));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 921
            echo "                        ";
            $context["tipoBandera"] = "";
            // line 922
            echo "                        ";
            $context["bandera"] = "";
            // line 923
            echo "                        ";
            $context["imagenPais"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenPais", [], "any", false, false, false, 923);
            // line 924
            echo "                        ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 924);
            // line 925
            echo "
                        ";
            // line 926
            if (0 !== twig_compare(($context["imagenPais"] ?? null), 60)) {
                // line 927
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 928
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 929
                echo "                        ";
            } elseif ((0 === twig_compare(($context["imagenPais"] ?? null), 60) && -1 === twig_compare(($context["imagenComunidad"] ?? null), 2))) {
                // line 930
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 931
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 932
                echo "                        ";
            } elseif (1 === twig_compare(($context["imagenComunidad"] ?? null), 1)) {
                // line 933
                echo "                            ";
                $context["bandera"] = ($context["imagenComunidad"] ?? null);
                // line 934
                echo "                            ";
                $context["tipoBandera"] = "comunidad";
                // line 935
                echo "
                            ";
                // line 936
                if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                    // line 937
                    echo "                                ";
                    $context["bandera"] = 55;
                    // line 938
                    echo "                            ";
                } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                    // line 939
                    echo "                                ";
                    $context["bandera"] = 56;
                    // line 940
                    echo "                            ";
                }
                // line 941
                echo "
                        ";
            }
            // line 943
            echo "
                        ";
            // line 944
            if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                // line 945
                echo "                            ";
                $context["imagenComunidad"] = 55;
                // line 946
                echo "                        ";
            } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                // line 947
                echo "                            ";
                $context["imagenComunidad"] = 56;
                // line 948
                echo "                        ";
            }
            // line 949
            echo "                        <li>          
                        <div style=\"float: left;\">         
                        ";
            // line 951
            if (0 !== twig_compare(($context["bandera"] ?? null), "")) {
                echo "                                    
                            <div style=\"float:left;\"><div style=\"width:20px\"></div><i style=\"margin-top: 10px\" class=\"";
                // line 952
                echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
                echo " flag";
                echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
                echo "\"\"></i></div>
                        ";
            }
            // line 954
            echo "                        <div style=\"float:left\"><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 954), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 954), ["TERCERA" => "3ª"]), "html", null, true);
            echo "</a></div>

                        </div>
                        </li>
                     ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 958
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
        // line 972
        $context["nn"] = "";
        // line 973
        echo "                    ";
        $context["counter"] = 0;
        echo " 

                    ";
        // line 975
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "promo2RFEF", [], "any", false, false, false, 975));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 976
            echo "                        ";
            $context["tipoBandera"] = "";
            // line 977
            echo "                        ";
            $context["bandera"] = "";
            // line 978
            echo "                        ";
            $context["imagenPais"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenPais", [], "any", false, false, false, 978);
            // line 979
            echo "                        ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 979);
            // line 980
            echo "
                        ";
            // line 981
            if (0 !== twig_compare(($context["imagenPais"] ?? null), 60)) {
                // line 982
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 983
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 984
                echo "                        ";
            } elseif ((0 === twig_compare(($context["imagenPais"] ?? null), 60) && -1 === twig_compare(($context["imagenComunidad"] ?? null), 2))) {
                // line 985
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 986
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 987
                echo "                        ";
            } elseif (1 === twig_compare(($context["imagenComunidad"] ?? null), 1)) {
                // line 988
                echo "                            ";
                $context["bandera"] = ($context["imagenComunidad"] ?? null);
                // line 989
                echo "                            ";
                $context["tipoBandera"] = "comunidad";
                // line 990
                echo "
                            ";
                // line 991
                if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                    // line 992
                    echo "                                ";
                    $context["bandera"] = 55;
                    // line 993
                    echo "                            ";
                } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                    // line 994
                    echo "                                ";
                    $context["bandera"] = 56;
                    // line 995
                    echo "                            ";
                }
                // line 996
                echo "
                        ";
            }
            // line 998
            echo "
                        ";
            // line 999
            if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                // line 1000
                echo "                            ";
                $context["imagenComunidad"] = 55;
                // line 1001
                echo "                        ";
            } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                // line 1002
                echo "                            ";
                $context["imagenComunidad"] = 56;
                // line 1003
                echo "                        ";
            }
            // line 1004
            echo "

                        ";
            // line 1006
            if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["torneo"], "id", [], "any", false, false, false, 1006), 3130)) {
                // line 1007
                echo "                         ";
                $context["bandera"] = "60b";
                // line 1008
                echo "                         ";
                $context["tipoBandera"] = "pais";
                // line 1009
                echo "                        ";
            }
            // line 1010
            echo "



                        <li>          
                        <div style=\"float: left;\">         
                        ";
            // line 1016
            if (0 !== twig_compare(($context["bandera"] ?? null), "")) {
                echo "                                    
                            <div style=\"float:left;\"><div style=\"width:20px\"></div><i style=\"margin-top: 10px\" class=\"";
                // line 1017
                echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
                echo " flag";
                echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
                echo "\"></i></div>
                        ";
            }
            // line 1019
            echo "                        <div style=\"float:left\"><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 1019), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1019), ["PROMOCIÓN DE ASCENSO A SEGUNDA" => "Promoción a 2ª"]), "html", null, true);
            echo "</a></div>
                        </div>

                        </li>
                     ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1023
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
        // line 1040
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "autonomica", [], "any", false, false, false, 1040));
        foreach ($context['_seq'] as $context["nombre"] => $context["regional"]) {
            // line 1041
            echo "                    
                    ";
            // line 1042
            $context["nn"] = "";
            // line 1043
            echo "                    ";
            $context["counter"] = 0;
            echo " 

                    ";
            // line 1045
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["regional"]);
            foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
                // line 1046
                echo "                        ";
                $context["tipoBandera"] = "";
                // line 1047
                echo "                        ";
                $context["bandera"] = "";
                // line 1048
                echo "                        ";
                $context["imagenPais"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenPais", [], "any", false, false, false, 1048);
                // line 1049
                echo "                        ";
                $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 1049);
                // line 1050
                echo "
                        ";
                // line 1051
                if (0 !== twig_compare(($context["imagenPais"] ?? null), 60)) {
                    // line 1052
                    echo "                            ";
                    $context["bandera"] = ($context["imagenPais"] ?? null);
                    // line 1053
                    echo "                            ";
                    $context["tipoBandera"] = "pais";
                    // line 1054
                    echo "                        ";
                } elseif ((0 === twig_compare(($context["imagenPais"] ?? null), 60) && -1 === twig_compare(($context["imagenComunidad"] ?? null), 2))) {
                    // line 1055
                    echo "                            ";
                    $context["bandera"] = ($context["imagenPais"] ?? null);
                    // line 1056
                    echo "                            ";
                    $context["tipoBandera"] = "pais";
                    // line 1057
                    echo "                        ";
                } elseif (1 === twig_compare(($context["imagenComunidad"] ?? null), 1)) {
                    // line 1058
                    echo "                            ";
                    $context["bandera"] = ($context["imagenComunidad"] ?? null);
                    // line 1059
                    echo "                            ";
                    $context["tipoBandera"] = "comunidad";
                    // line 1060
                    echo "
                        ";
                }
                // line 1062
                echo "
                        ";
                // line 1063
                if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["torneo"], "temporada_id", [], "any", false, false, false, 1063), 85) || 0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["torneo"], "temporada_id", [], "any", false, false, false, 1063), 291))) {
                    // line 1064
                    echo "                            ";
                    $context["imagenComunidad"] = 22;
                    // line 1065
                    echo "                        ";
                } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["torneo"], "temporada_id", [], "any", false, false, false, 1065), 76)) {
                    // line 1066
                    echo "                            ";
                    $context["imagenComunidad"] = 21;
                    // line 1067
                    echo "                        ";
                }
                // line 1068
                echo "
                        

                        ";
                // line 1071
                $context["t"] = twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1071), 0,  -7);
                echo " 
                        ";
                // line 1072
                if (0 !== twig_compare(($context["nn"] ?? null), ($context["t"] ?? null))) {
                    echo "                                    
                                
                                 ";
                    // line 1074
                    if (0 !== twig_compare(($context["counter"] ?? null), 0)) {
                        echo "   
                                    </tr></table></li>
                                   ";
                        // line 1076
                        $context["counter"] = 0;
                        echo " 
                                ";
                    }
                    // line 1078
                    echo "                        <li>
                                        <table class=\"table\"><tr>
                                            <td colspan=\"4\" style=\"color: #AFAFAF;font-family: Roboto;font-style: normal;font-weight: normal;font-size: 13px;\">
                                    ";
                    // line 1081
                    if (0 !== twig_compare(($context["bandera"] ?? null), "")) {
                        echo " 
                                        <i class=\"comunidad flag";
                        // line 1082
                        echo twig_escape_filter($this->env, ($context["imagenComunidad"] ?? null), "html", null, true);
                        echo "\" style=\"margin-right: 10px; \"></i>
                                    ";
                    }
                    // line 1084
                    echo "                                        

                                    ";
                    // line 1086
                    $context["parte"] = twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1086),  -7);
                    // line 1087
                    echo "
                                    ";
                    // line 1088
                    if (0 !== twig_compare(twig_slice($this->env, ($context["parte"] ?? null), 0, 5), "Grupo")) {
                        echo " 

                                    <a href=\"";
                        // line 1090
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 1090), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1090), "html", null, true);
                        echo "</a></td>

                                    ";
                    } else {
                        // line 1093
                        echo "
                                        ";
                        // line 1094
                        echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1094), 0,  -8), "html", null, true);
                        echo "</td></tr>

                                   <tr>
                                   <td align=\"center\" style=\"padding: 0px; margin:0px\"><a href=\"";
                        // line 1097
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 1097), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1097),  -7), "html", null, true);
                        echo "</a></td>
                                    
                                    ";
                    }
                    // line 1099
                    echo "                                    

                                ";
                } else {
                    // line 1102
                    echo "
                                <td align=\"center\" style=\"padding: 0px; margin:0px\"><a href=\"";
                    // line 1103
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 1103), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1103),  -7), "html", null, true);
                    echo "</a></td>
                                ";
                }
                // line 1105
                echo "
                                ";
                // line 1106
                $context["counter"] = (($context["counter"] ?? null) + 1);
                // line 1107
                echo "                                ";
                $context["nn"] = ($context["t"] ?? null);
                echo " 

                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 1110
            echo "                    </tr></table></li>  
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['nombre'], $context['regional'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1111
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
        // line 1169
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "RFEF", [], "any", false, false, false, 1169));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 1170
            echo "                                ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 1170);
            // line 1171
            echo "                                ";
            if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                // line 1172
                echo "                                    ";
                $context["imagenComunidad"] = 55;
                // line 1173
                echo "                                ";
            } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                // line 1174
                echo "                                    ";
                $context["imagenComunidad"] = 56;
                // line 1175
                echo "                                ";
            }
            // line 1176
            echo "                                <li>
                                    <a href=\"";
            // line 1177
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 1177), "html", null, true);
            echo "\">
                                        <i class=\"comunidad flag";
            // line 1178
            echo twig_escape_filter($this->env, ($context["imagenComunidad"] ?? null), "html", null, true);
            echo "\"></i>
                                        ";
            // line 1179
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1179), "html", null, true);
            echo "
                                    </a>
                                </li>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1183
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
        // line 1195
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "FIFA", [], "any", false, false, false, 1195));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 1196
            echo "                                <li>
                                    <a href=\"";
            // line 1197
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 1197), "html", null, true);
            echo "\">
                                        ";
            // line 1198
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1198), "html", null, true);
            echo "
                                    </a>
                                </li>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1202
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
        // line 1214
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "UEFA", [], "any", false, false, false, 1214));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 1215
            echo "                                <li>
                                    <a href=\"";
            // line 1216
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 1216), "html", null, true);
            echo "\">
                                        ";
            // line 1217
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1217), "html", null, true);
            echo "
                                    </a>
                                </li>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1221
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
        // line 1239
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "europa", [], "any", false, false, false, 1239));
        foreach ($context['_seq'] as $context["nombrePais"] => $context["torneos"]) {
            // line 1240
            echo "                        ";
            $context["tipoBandera"] = "";
            // line 1241
            echo "                        ";
            $context["bandera"] = "";
            // line 1242
            echo "                        ";
            $context["imagenPais"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["torneos"], 0, [], "any", false, false, false, 1242), "imagenPais", [], "any", false, false, false, 1242);
            // line 1243
            echo "                        ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["torneos"], 0, [], "any", false, false, false, 1243), "imagenComunidad", [], "any", false, false, false, 1243);
            // line 1244
            echo "                        <li>
                            <div class=\"openLevel js-openLevel\">
                                ";
            // line 1246
            if (0 !== twig_compare(($context["imagenPais"] ?? null), 60)) {
                // line 1247
                echo "                                    ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 1248
                echo "                                    ";
                $context["tipoBandera"] = "pais";
                // line 1249
                echo "                                ";
            } elseif ((0 === twig_compare(($context["imagenPais"] ?? null), 60) && -1 === twig_compare(($context["imagenComunidad"] ?? null), 2))) {
                // line 1250
                echo "                                    ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 1251
                echo "                                    ";
                $context["tipoBandera"] = "pais";
                // line 1252
                echo "                                ";
            } elseif (1 === twig_compare(($context["imagenComunidad"] ?? null), 1)) {
                // line 1253
                echo "                                    ";
                $context["bandera"] = ($context["imagenComunidad"] ?? null);
                // line 1254
                echo "                                    ";
                $context["tipoBandera"] = "comunidad";
                // line 1255
                echo "
                                    ";
                // line 1256
                if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                    // line 1257
                    echo "                                        ";
                    $context["bandera"] = 55;
                    // line 1258
                    echo "                                    ";
                } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                    // line 1259
                    echo "                                        ";
                    $context["bandera"] = 56;
                    // line 1260
                    echo "                                    ";
                }
                // line 1261
                echo "
                                ";
            }
            // line 1263
            echo "
                                ";
            // line 1264
            if (0 === twig_compare(($context["tipoBandera"] ?? null), "pais")) {
                // line 1265
                echo "                                    ";
                $context["bandera"] = (($context["bandera"] ?? null) . "b");
                // line 1266
                echo "                                ";
            }
            // line 1267
            echo "
                                <i style=\"margin-left: 10px; margin-right: -10px;\" class=\"";
            // line 1268
            echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
            echo " flag";
            echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
            echo "\"></i>
                                ";
            // line 1269
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
            // line 1277
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["torneos"]);
            foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
                // line 1278
                echo "                                    <li>
                                        <a href=\"";
                // line 1279
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 1279), "html", null, true);
                echo "\">
                                            ";
                // line 1280
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1280), "html", null, true);
                echo "
                                        </a>
                                    </li>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 1284
            echo "                            </ul>
                        </li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['nombrePais'], $context['torneos'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1287
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
        // line 1304
        $context["nn"] = "";
        // line 1305
        echo "                    ";
        $context["counter"] = 0;
        echo " 

                    ";
        // line 1307
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "juvenil", [], "any", false, false, false, 1307));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 1308
            echo "                        ";
            $context["tipoBandera"] = "";
            // line 1309
            echo "                        ";
            $context["bandera"] = "";
            // line 1310
            echo "                        ";
            $context["imagenPais"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenPais", [], "any", false, false, false, 1310);
            // line 1311
            echo "                        ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 1311);
            // line 1312
            echo "
                        ";
            // line 1313
            if (0 !== twig_compare(($context["imagenPais"] ?? null), 60)) {
                // line 1314
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 1315
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 1316
                echo "                        ";
            } elseif ((0 === twig_compare(($context["imagenPais"] ?? null), 60) && -1 === twig_compare(($context["imagenComunidad"] ?? null), 2))) {
                // line 1317
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 1318
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 1319
                echo "                        ";
            } elseif (1 === twig_compare(($context["imagenComunidad"] ?? null), 1)) {
                // line 1320
                echo "                            ";
                $context["bandera"] = ($context["imagenComunidad"] ?? null);
                // line 1321
                echo "                            ";
                $context["tipoBandera"] = "comunidad";
                // line 1322
                echo "
                            ";
                // line 1323
                if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                    // line 1324
                    echo "                                ";
                    $context["bandera"] = 55;
                    // line 1325
                    echo "                            ";
                } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                    // line 1326
                    echo "                                ";
                    $context["bandera"] = 56;
                    // line 1327
                    echo "                            ";
                }
                // line 1328
                echo "
                            ";
                // line 1329
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["torneo"], "temporada_id", [], "any", false, false, false, 1329), 3093)) {
                    // line 1330
                    echo "                                    ";
                    $context["bandera"] = 22;
                    // line 1331
                    echo "                            ";
                }
                // line 1332
                echo "
                             ";
                // line 1333
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["torneo"], "temporada_id", [], "any", false, false, false, 1333), 3096)) {
                    // line 1334
                    echo "                                    ";
                    $context["bandera"] = 21;
                    // line 1335
                    echo "                            ";
                }
                // line 1336
                echo "

                        ";
            }
            // line 1339
            echo "
                        ";
            // line 1340
            if ((0 !== twig_compare(($context["bandera"] ?? null), "") && 0 === twig_compare(($context["tipoBandera"] ?? null), "pais"))) {
                // line 1341
                echo "                            ";
                $context["bandera"] = (($context["bandera"] ?? null) . "b");
                // line 1342
                echo "                        ";
            }
            // line 1343
            echo "                        
                        <li>                                       
                            ";
            // line 1345
            if (0 !== twig_compare(($context["bandera"] ?? null), "")) {
                echo "                                    
                                <div style=\"float:left;\"><div style=\"width:20px\"></div><i style=\"margin-top: 10px\" class=\"";
                // line 1346
                echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
                echo " flag";
                echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
                echo "\"\"></i></div>
                            ";
            }
            // line 1348
            echo "                            <div style=\"float:left; margin-right: 10px\">
                            &nbsp;&nbsp;<a href=\"";
            // line 1349
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 1349), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1349), "html", null, true);
            echo " </a>
                        </div>
                        </li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1353
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
        // line 1374
        $context["nn"] = "";
        // line 1375
        echo "                    ";
        $context["counter"] = 0;
        echo " 

                    ";
        // line 1377
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "femenino", [], "any", false, false, false, 1377));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 1378
            echo "
                        


                        ";
            // line 1382
            $context["tipoBandera"] = "";
            // line 1383
            echo "                        ";
            $context["bandera"] = "";
            // line 1384
            echo "                        ";
            $context["imagenPais"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenPais", [], "any", false, false, false, 1384);
            // line 1385
            echo "                        ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 1385);
            // line 1386
            echo "
                        ";
            // line 1387
            if (0 !== twig_compare(($context["imagenPais"] ?? null), 60)) {
                // line 1388
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 1389
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 1390
                echo "                        ";
            } elseif ((0 === twig_compare(($context["imagenPais"] ?? null), 60) && -1 === twig_compare(($context["imagenComunidad"] ?? null), 2))) {
                // line 1391
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 1392
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 1393
                echo "                        ";
            } elseif (1 === twig_compare(($context["imagenComunidad"] ?? null), 1)) {
                // line 1394
                echo "                            ";
                $context["bandera"] = ($context["imagenComunidad"] ?? null);
                // line 1395
                echo "                            ";
                $context["tipoBandera"] = "comunidad";
                // line 1396
                echo "
                            ";
                // line 1397
                if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                    // line 1398
                    echo "                                ";
                    $context["bandera"] = 55;
                    // line 1399
                    echo "                            ";
                } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                    // line 1400
                    echo "                                ";
                    $context["bandera"] = 56;
                    // line 1401
                    echo "                            ";
                }
                // line 1402
                echo "
                        ";
            }
            // line 1404
            echo "
                        ";
            // line 1405
            if ((0 !== twig_compare(($context["bandera"] ?? null), "") && 0 === twig_compare(($context["tipoBandera"] ?? null), "pais"))) {
                // line 1406
                echo "                            ";
                $context["bandera"] = (($context["bandera"] ?? null) . "b");
                // line 1407
                echo "                        ";
            }
            // line 1408
            echo "
                       <li> 
                        <div style=\"float: left;\">         
                        ";
            // line 1411
            if (0 !== twig_compare(($context["bandera"] ?? null), "")) {
                echo "                                    
                            <div style=\"float:left;\"><div style=\"width:20px\"></div><i style=\"margin-top: 10px\" class=\"";
                // line 1412
                echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
                echo " flag";
                echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
                echo "\"\"></i></div>
                        ";
            }
            // line 1414
            echo "                        <div style=\"float:left\"><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 1414), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1414), ["PRIMERA" => "1ª", "SEGUNDA" => "2ª", "FEMENINA" => "FEM."]), "html", null, true);
            echo "</a></div>

                        </div>
                        </li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1419
        echo "                    
                </ul>
            </li><!-- End section 1 -->


             ";
        // line 1514
        echo "
            <hr/>
            ";
        // line 1521
        echo "            <li>
                <a href=\"";
        // line 1522
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("contacto"), "html", null, true);
        echo "\">Contacto</a>
            </li>
        </ul>
    </nav>
        
    
        

</div>

<div id=\"contenedorGlobal\" class=\"container-fluid\"> 




    <div class=\"row\">
        ";
        // line 1538
        if ( !call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_MOBILE__"])) {
            // line 1539
            echo "            <div class=\"col-12 col-sm-3 p-0 pr-2\">

                <div class=\"row\" style=\"text-align-last: center;\">
                    <div class=\"col-12\">
                        ";
            // line 1543
            $context["espacio"] = "primerLateralIzquierdo";
            // line 1544
            echo "
                        ";
            // line 1545
            if ((isset($context["esPortada"]) || array_key_exists("esPortada", $context))) {
                // line 1546
                echo "                            ";
                if (($context["esPortada"] ?? null)) {
                    // line 1547
                    echo "                                ";
                    $context["espacio"] = "primerLateralIzquierdoPortada";
                    // line 1548
                    echo "                            ";
                }
                // line 1549
                echo "                        ";
            }
            // line 1550
            echo "
                        ";
            // line 1551
            $this->loadTemplate("publicidad/publiGestion.html.twig", "base.html.twig", 1551)->display($context);
            // line 1552
            echo "                    </div>
                </div> 

                <div class=\"col-12 text-center hide\" style=\"display:none\">
                    <a style=\"color:white; background-color:black; font-size:13px; padding:4px; margin-top:2px;\" class=\"badge boldfont\" href=\"https://www.autodoc.es/services/mobile-app/\">www.AutoDoc.es</a>
                </div>


                <div class=\"col-12 text-center\" style=\"padding: 0px;\">
                    ";
            // line 1564
            echo "                    ";
            // line 1567
            echo "                    ";
            // line 1570
            echo "                </div>

                ";
            // line 1572
            $context["mostrarWidget"] = true;
            // line 1573
            echo "
                ";
            // line 1574
            if (((isset($context["esPortada"]) || array_key_exists("esPortada", $context)) && 0 === twig_compare(twig_date_format_filter($this->env, "now", "d/m/Y"), "25/12/2020"))) {
                // line 1575
                echo "                    ";
                $context["mostrarWidget"] = false;
                // line 1576
                echo "                ";
            }
            // line 1577
            echo "
                ";
            // line 1578
            if (($context["mostrarWidget"] ?? null)) {
                // line 1579
                echo "                    ";
                $context["tituloWidget"] = "Las noticias de Futbolme";
                // line 1580
                echo "                    ";
                $context["noticiasWidget"] = call_user_func_array($this->env->getFunction('obtenerNoticiasPortadaPosiciones')->getCallable(), [[0 => 1, 1 => 2]]);
                // line 1581
                echo "
                    ";
                // line 1582
                if (1 === twig_compare(twig_length_filter($this->env, ($context["noticiasWidget"] ?? null)), 0)) {
                    // line 1583
                    echo "                        <div class=\"row\" style=\"margin-bottom: 15px;\">
                            <div class=\"col-12\">
                                ";
                    // line 1585
                    $this->loadTemplate("noticias/widgetNoticias.html.twig", "base.html.twig", 1585)->display($context);
                    // line 1586
                    echo "                            </div>
                        </div>
                    ";
                }
                // line 1589
                echo "                ";
            }
            // line 1590
            echo "
                <div class=\"row\">
                    <div class=\"col-12\">
                        ";
            // line 1593
            $context["espacio"] = "segundoLateralIzquierdo";
            // line 1594
            echo "                        ";
            $this->loadTemplate("publicidad/publiGestion.html.twig", "base.html.twig", 1594)->display($context);
            // line 1595
            echo "                    </div>
                </div>

                <div class=\"d-none d-md-block\">
                    ";
            // line 1599
            $this->displayBlock('contenedorIzquierda', $context, $blocks);
            // line 1602
            echo "                </div>



                ";
            // line 1648
            echo "
                <div class=\"row\">
                    <div class=\"col-12\">
                        ";
            // line 1651
            $context["espacio"] = "pieLateralIzquierdo";
            // line 1652
            echo "                        ";
            $this->loadTemplate("publicidad/publiGestion.html.twig", "base.html.twig", 1652)->display($context);
            // line 1653
            echo "                    </div>
                </div>

            </div>
        ";
        }
        // line 1658
        echo "        <div id=\"contenedorCentral\" class=\"col-12 col-sm-9 col-md-6 p-0\">

            ";
        // line 1660
        $this->displayBlock('contenedorCentral', $context, $blocks);
        // line 1663
        echo "
        </div>

        ";
        // line 1666
        if ( !call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_MOBILE__"])) {
            // line 1667
            echo "            <div class=\"hidden-xs col-3 p-0 pl-2\">
                <div class=\"row\" style=\"margin: 0px;\">

                    <div class=\"col-12\" id=\"contenedorIconosDerecha\" style=\"padding: 0px;\">

                    

                        <div id=\"myContainer1\" style=\"width:336px;margin-left:auto;margin-right: auto; margin-bottom:10px;\"> </div>

                        <div class=\"row\" style=\"text-align-last: center;\">
                            <div class=\"col-12 text-center\"\">
                                ";
            // line 1678
            $context["espacio"] = "primerLateralDerecho";
            // line 1679
            echo "
                                ";
            // line 1680
            if ((isset($context["esPortada"]) || array_key_exists("esPortada", $context))) {
                // line 1681
                echo "                                    ";
                if (($context["esPortada"] ?? null)) {
                    // line 1682
                    echo "                                        ";
                    $context["espacio"] = "primerLateralDerechoPortada";
                    // line 1683
                    echo "                                    ";
                }
                // line 1684
                echo "                                ";
            }
            // line 1685
            echo "
                                ";
            // line 1686
            $this->loadTemplate("publicidad/publiGestion.html.twig", "base.html.twig", 1686)->display($context);
            // line 1687
            echo "                            </div>
                        </div> 

                        

                        

                        

                        <!-- <div class=\"col-12 text-center\">
                            <script data-cfasync=\"false\" type=\"text/javascript\" src=\"https://www.linkonclick.com/a/display.php?r=4366447\"></script>
                        </div> -->

                        ";
            // line 1705
            echo "
                        ";
            // line 1706
            $context["tituloWidget"] = "Las noticias de Futbolme";
            // line 1707
            echo "                        ";
            $context["noticiasWidget"] = call_user_func_array($this->env->getFunction('obtenerNoticiasPortadaPosiciones')->getCallable(), [[0 => 4, 1 => 5]]);
            // line 1708
            echo "
                        ";
            // line 1709
            if (1 === twig_compare(twig_length_filter($this->env, ($context["noticiasWidget"] ?? null)), 0)) {
                // line 1710
                echo "                            <div class=\"row\" style=\"margin-bottom: 15px;\">
                                <div class=\"col-12\">
                                    ";
                // line 1712
                $this->loadTemplate("noticias/widgetNoticias.html.twig", "base.html.twig", 1712)->display($context);
                // line 1713
                echo "                                </div>
                            </div>
                        ";
            }
            // line 1716
            echo "
                        <div class=\"row\">
                            <div class=\"col-12\">
                                ";
            // line 1719
            $context["espacio"] = "segundoLateralDerecho";
            // line 1720
            echo "                                ";
            $this->loadTemplate("publicidad/publiGestion.html.twig", "base.html.twig", 1720)->display($context);
            // line 1721
            echo "                            </div>
                        </div>


                        <div class=\"col-12\">
                            <div id=\"contenedorTwitter\">
                                <a href=\"https://twitter.com/futbolmeoficial\" class=\"botonTwitter\" target=\"_blank\" rel=\"nofollow\">
                                    <img width=\"21\" height=\"19\" class=\"iconoTwitter\" src=\"/static/img/logo-twitter.svg\" alt=\"\">
                                    
                                </a><a href=\"https://www.instagram.com/futbolmeoficial/\" class=\"\" target=\"_blank\" rel=\"nofollow\">
                                    <img class=\"iconoTwitter\" src=\"/static/img/logo-instagram.png\" alt=\"\">
                                    
                                </a>
                            </div>
                            <div id=\"contenedorGooglePlay\">
                                <a href=\"https://play.google.com/store/apps/details?id=com.futbolme.futbolme\" target=\"_blank\" rel=\"nofollow\">
                                    <img width=\"132\" height=\"40\" src=\"/static/img/google-play-badge.png\" alt=\"\">
                                </a>
                            </div> 
                        </div>

";
            // line 1763
            echo "
                    </div>


                   



                    ";
            // line 1771
            $this->displayBlock('contenedorDerecha', $context, $blocks);
            // line 1774
            echo "
                    ";
            // line 1775
            $context["espacio"] = "pieLateralDerecho";
            // line 1776
            echo "                    ";
            $this->loadTemplate("publicidad/publiGestion.html.twig", "base.html.twig", 1776)->display($context);
            // line 1777
            echo "

                    ";
            // line 1786
            echo "                </div>
            </div>
        ";
        }
        // line 1789
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
        // line 1810
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "primeraRFEF", [], "any", false, false, false, 1810));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 1811
            echo "                <li>
                <div style=\"float:left; padding:5px\">
                 ";
            // line 1813
            if (0 !== twig_compare(($context["bandera"] ?? null), "")) {
                echo "                                    
                   <div style=\"float:left\"><i style=\"margin-left: 10px\" class=\"";
                // line 1814
                echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
                echo " flag";
                echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
                echo "\"></i></div>
                 ";
            }
            // line 1816
            echo "                  <div style=\"float:left; margin-left: 10px\"><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 1816), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1816), "html", null, true);
            echo "</a></div>
                </div>
                </li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1820
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
        // line 1830
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "segundaRFEF", [], "any", false, false, false, 1830));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 1831
            echo "                <li>
                    <div style=\"float:left; padding:5px\">
                 ";
            // line 1833
            if (0 !== twig_compare(($context["bandera"] ?? null), "")) {
                echo "                                    
                    <div style=\"float:left\"><i style=\"margin-right: 10px;\" class=\"";
                // line 1834
                echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
                echo " flag";
                echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
                echo "\"></i></div>
                 ";
            }
            // line 1836
            echo "                 <div style=\"float:left; margin-right: 10px\"><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 1836), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1836), "html", null, true);
            echo "</a></div>
                 </div>
                </li>
                    
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1841
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
        // line 1851
        $context["nn"] = "";
        // line 1852
        echo "                    ";
        $context["counter"] = 0;
        echo " 

                    ";
        // line 1854
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "promo2RFEF", [], "any", false, false, false, 1854));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 1855
            echo "                        ";
            $context["tipoBandera"] = "";
            // line 1856
            echo "                        ";
            $context["bandera"] = "";
            // line 1857
            echo "                        ";
            $context["imagenPais"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenPais", [], "any", false, false, false, 1857);
            // line 1858
            echo "                        ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 1858);
            // line 1859
            echo "
                        ";
            // line 1860
            if (0 !== twig_compare(($context["imagenPais"] ?? null), 60)) {
                // line 1861
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 1862
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 1863
                echo "                        ";
            } elseif ((0 === twig_compare(($context["imagenPais"] ?? null), 60) && -1 === twig_compare(($context["imagenComunidad"] ?? null), 2))) {
                // line 1864
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 1865
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 1866
                echo "                        ";
            } elseif (1 === twig_compare(($context["imagenComunidad"] ?? null), 1)) {
                // line 1867
                echo "                            ";
                $context["bandera"] = ($context["imagenComunidad"] ?? null);
                // line 1868
                echo "                            ";
                $context["tipoBandera"] = "comunidad";
                // line 1869
                echo "
                            ";
                // line 1870
                if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                    // line 1871
                    echo "                                ";
                    $context["bandera"] = 55;
                    // line 1872
                    echo "                            ";
                } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                    // line 1873
                    echo "                                ";
                    $context["bandera"] = 56;
                    // line 1874
                    echo "                            ";
                }
                // line 1875
                echo "
                        ";
            }
            // line 1877
            echo "
                        ";
            // line 1878
            if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                // line 1879
                echo "                            ";
                $context["imagenComunidad"] = 55;
                // line 1880
                echo "                        ";
            } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                // line 1881
                echo "                            ";
                $context["imagenComunidad"] = 56;
                // line 1882
                echo "                        ";
            }
            // line 1883
            echo "

                        ";
            // line 1885
            if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["torneo"], "id", [], "any", false, false, false, 1885), 3130)) {
                // line 1886
                echo "                         ";
                $context["bandera"] = "60b";
                // line 1887
                echo "                         ";
                $context["tipoBandera"] = "pais";
                // line 1888
                echo "                        ";
            }
            // line 1889
            echo "                 
                <li>
                    <div style=\"float:left; padding:5px\">
                 ";
            // line 1892
            if (0 !== twig_compare(($context["bandera"] ?? null), "")) {
                echo "                                    
                    <div style=\"float:left\"><i style=\"margin-right: 10px;\" class=\"";
                // line 1893
                echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
                echo " flag";
                echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
                echo "\"></i></div>
                 ";
            }
            // line 1895
            echo "                 <div style=\"float:left; margin-right: 10px\"><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 1895), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1895), "html", null, true);
            echo "</a></div>
                 </div>
                </li>
                    
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1899
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
        // line 1913
        $context["nn"] = "";
        // line 1914
        echo "                    ";
        $context["counter"] = 0;
        echo " 

                    ";
        // line 1916
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "terceraRFEF", [], "any", false, false, false, 1916));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 1917
            echo "                        ";
            $context["tipoBandera"] = "";
            // line 1918
            echo "                        ";
            $context["bandera"] = "";
            // line 1919
            echo "                        ";
            $context["imagenPais"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenPais", [], "any", false, false, false, 1919);
            // line 1920
            echo "                        ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 1920);
            // line 1921
            echo "
                        ";
            // line 1922
            if (0 !== twig_compare(($context["imagenPais"] ?? null), 60)) {
                // line 1923
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 1924
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 1925
                echo "                        ";
            } elseif ((0 === twig_compare(($context["imagenPais"] ?? null), 60) && -1 === twig_compare(($context["imagenComunidad"] ?? null), 2))) {
                // line 1926
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 1927
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 1928
                echo "                        ";
            } elseif (1 === twig_compare(($context["imagenComunidad"] ?? null), 1)) {
                // line 1929
                echo "                            ";
                $context["bandera"] = ($context["imagenComunidad"] ?? null);
                // line 1930
                echo "                            ";
                $context["tipoBandera"] = "comunidad";
                // line 1931
                echo "
                            ";
                // line 1932
                if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                    // line 1933
                    echo "                                ";
                    $context["bandera"] = 55;
                    // line 1934
                    echo "                            ";
                } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                    // line 1935
                    echo "                                ";
                    $context["bandera"] = 56;
                    // line 1936
                    echo "                            ";
                }
                // line 1937
                echo "
                        ";
            }
            // line 1939
            echo "
                        ";
            // line 1940
            if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                // line 1941
                echo "                            ";
                $context["imagenComunidad"] = 55;
                // line 1942
                echo "                        ";
            } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                // line 1943
                echo "                            ";
                $context["imagenComunidad"] = 56;
                // line 1944
                echo "                        ";
            }
            // line 1945
            echo "                 
                <li>
                    <div style=\"float:left; padding:5px\">
                 ";
            // line 1948
            if (0 !== twig_compare(($context["bandera"] ?? null), "")) {
                echo "                                    
                    <div style=\"float:left\"><i style=\"margin-right: 10px;\" class=\"";
                // line 1949
                echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
                echo " flag";
                echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
                echo "\"></i></div>
                 ";
            }
            // line 1951
            echo "                 <div style=\"float:left; margin-right: 10px\"><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 1951), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1951), "html", null, true);
            echo "</a></div>
                 </div>
                </li>
                    
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1955
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
        // line 1967
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "autonomica", [], "any", false, false, false, 1967));
        foreach ($context['_seq'] as $context["nombre"] => $context["regional"]) {
            // line 1968
            echo "                    
                    ";
            // line 1969
            $context["nn"] = "";
            // line 1970
            echo "                    ";
            $context["counter"] = 0;
            echo " 
                    ";
            // line 1971
            $context["id_comunidad"] = 0;
            // line 1972
            echo "
                    <ul class=\"menuTorneosUL row\">

                    ";
            // line 1975
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["regional"]);
            foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
                // line 1976
                echo "                        ";
                $context["tipoBandera"] = "";
                // line 1977
                echo "                        ";
                $context["bandera"] = "";
                // line 1978
                echo "                        ";
                $context["imagenPais"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenPais", [], "any", false, false, false, 1978);
                // line 1979
                echo "                        ";
                $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 1979);
                // line 1980
                echo "
                        ";
                // line 1981
                if (0 !== twig_compare(($context["imagenPais"] ?? null), 60)) {
                    // line 1982
                    echo "                            ";
                    $context["bandera"] = ($context["imagenPais"] ?? null);
                    // line 1983
                    echo "                            ";
                    $context["tipoBandera"] = "pais";
                    // line 1984
                    echo "                        ";
                } elseif ((0 === twig_compare(($context["imagenPais"] ?? null), 60) && -1 === twig_compare(($context["imagenComunidad"] ?? null), 2))) {
                    // line 1985
                    echo "                            ";
                    $context["bandera"] = ($context["imagenPais"] ?? null);
                    // line 1986
                    echo "                            ";
                    $context["tipoBandera"] = "pais";
                    // line 1987
                    echo "                        ";
                } elseif (1 === twig_compare(($context["imagenComunidad"] ?? null), 1)) {
                    // line 1988
                    echo "                            ";
                    $context["bandera"] = ($context["imagenComunidad"] ?? null);
                    // line 1989
                    echo "                            ";
                    $context["tipoBandera"] = "comunidad";
                    // line 1990
                    echo "
                            

                        ";
                }
                // line 1994
                echo "
                        ";
                // line 1995
                if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["torneo"], "temporada_id", [], "any", false, false, false, 1995), 85) || 0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["torneo"], "temporada_id", [], "any", false, false, false, 1995), 291))) {
                    // line 1996
                    echo "                            ";
                    $context["imagenComunidad"] = 22;
                    // line 1997
                    echo "                        ";
                } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["torneo"], "temporada_id", [], "any", false, false, false, 1997), 76)) {
                    // line 1998
                    echo "                            ";
                    $context["imagenComunidad"] = 21;
                    // line 1999
                    echo "                        ";
                }
                // line 2000
                echo "                        ";
                $context["t"] = twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 2000), 0,  -7);
                echo " 
                        ";
                // line 2001
                if (0 !== twig_compare(($context["nn"] ?? null), ($context["t"] ?? null))) {
                    echo "                                    
                                
                                 ";
                    // line 2003
                    if (0 !== twig_compare(($context["counter"] ?? null), 0)) {
                        echo "   
                                    </tr></table></div></li>
                                   ";
                        // line 2005
                        $context["counter"] = 0;
                        echo " 
                                ";
                    }
                    // line 2007
                    echo "                        <li>
                            <div style=\"padding: 5px; margin-top: 20px; border: solid gainsboro 1px; \"><table class=\"table\"><tr>
                                            <td colspan=\"8\" style=\"color: #AFAFAF;font-family: Roboto;font-style: normal;font-weight: normal;font-size: 13px;\">
                                    ";
                    // line 2010
                    if (0 !== twig_compare(($context["bandera"] ?? null), "")) {
                        echo " 
                                        <i class=\"comunidad flag";
                        // line 2011
                        echo twig_escape_filter($this->env, ($context["imagenComunidad"] ?? null), "html", null, true);
                        echo "\" style=\"margin-right: 10px; \"></i>
                                    ";
                    }
                    // line 2013
                    echo "                                        

                                    ";
                    // line 2015
                    $context["parte"] = twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 2015),  -7);
                    // line 2016
                    echo "
                                

                                    ";
                    // line 2019
                    if (0 !== twig_compare(twig_slice($this->env, ($context["parte"] ?? null), 0, 5), "Grupo")) {
                        echo " 

                                    <a href=\"";
                        // line 2021
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 2021), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 2021), "html", null, true);
                        echo "</a></td>

                                    ";
                    } else {
                        // line 2024
                        echo "
                                        ";
                        // line 2025
                        echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 2025), 0,  -8), "html", null, true);
                        echo " </td></tr>

                                   <tr>
                                   <td align=\"center\" style=\"padding: 0px; margin:0px\"><a href=\"";
                        // line 2028
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 2028), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 2028),  -7), "html", null, true);
                        echo "</a></td>
                                    
                                    ";
                    }
                    // line 2030
                    echo "  






                            ";
                } else {
                    // line 2038
                    echo "
                            <td align=\"center\" style=\"padding: 0px; margin:0px\"><a href=\"";
                    // line 2039
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 2039), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 2039),  -7), "html", null, true);
                    echo "</a></td>

                            ";
                }
                // line 2042
                echo "
                                ";
                // line 2043
                $context["counter"] = (($context["counter"] ?? null) + 1);
                // line 2044
                echo "                                ";
                $context["nn"] = ($context["t"] ?? null);
                echo " 
                                ";
                // line 2045
                $context["id_comunidad"] = ($context["imagenComunidad"] ?? null);
                echo " 

                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 2047
            echo "                    
                    </tr></table></div>
                    </li>                        
                </ul>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['nombre'], $context['regional'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 2051
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
        // line 2096
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "RFEF", [], "any", false, false, false, 2096));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 2097
            echo "                        ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 2097);
            // line 2098
            echo "                        ";
            if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                // line 2099
                echo "                            ";
                $context["imagenComunidad"] = 55;
                // line 2100
                echo "                        ";
            } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                // line 2101
                echo "                            ";
                $context["imagenComunidad"] = 56;
                // line 2102
                echo "                        ";
            }
            // line 2103
            echo "                        <li>
                            <a href=\"";
            // line 2104
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 2104), "html", null, true);
            echo "\">
                                <i style=\"margin-right: 10px;\" class=\"comunidad flag";
            // line 2105
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 2105), "html", null, true);
            echo "\"></i>
                                ";
            // line 2106
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 2106), "html", null, true);
            echo "
                            </a>
                        </li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 2110
        echo "                </ul>
            </div>

            <div class=\"col-3\">
                <h3 class=\"menuTorneosTituloListado\">
                    <div class=\"flagbox pais flag200b\" style=\"margin-top:-7px; margin-right:10px\"></div>
                    FIFA
                </h3>
                <ul class=\"menuTorneosUL\">
                    ";
        // line 2119
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "FIFA", [], "any", false, false, false, 2119));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 2120
            echo "                        <li>
                            <a href=\"";
            // line 2121
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 2121), "html", null, true);
            echo "\">
                                ";
            // line 2122
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 2122), "html", null, true);
            echo "
                            </a>
                        </li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 2126
        echo "                </ul>
            </div>

            <div class=\"col-3\">
                <h3 class=\"menuTorneosTituloListado\">
                    UEFA
                    <div class=\"flagbox pais flag199b\" style=\"margin-top:-7px; margin-right:10px\"></div>
                </h3>
                <ul class=\"menuTorneosUL\">
                    ";
        // line 2135
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "UEFA", [], "any", false, false, false, 2135));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 2136
            echo "                        <li>
                            <a href=\"";
            // line 2137
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 2137), "html", null, true);
            echo "\">
                                ";
            // line 2138
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 2138), "html", null, true);
            echo "
                            </a>
                        </li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 2142
        echo "                </ul>
            </div>


        </div>
    </div>

    <div class=\"container-fluid menuDesplegable\" id=\"menuEuropa\">

        <div class=\"row\">
            ";
        // line 2152
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "europa", [], "any", false, false, false, 2152));
        foreach ($context['_seq'] as $context["nombrePais"] => $context["torneos"]) {
            // line 2153
            echo "                ";
            $context["tipoBandera"] = "";
            // line 2154
            echo "                ";
            $context["bandera"] = "";
            // line 2155
            echo "                ";
            $context["imagenPais"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["torneos"], 0, [], "any", false, false, false, 2155), "imagenPais", [], "any", false, false, false, 2155);
            // line 2156
            echo "                ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["torneos"], 0, [], "any", false, false, false, 2156), "imagenComunidad", [], "any", false, false, false, 2156);
            // line 2157
            echo "                <div class=\"col-3\" style=\"margin-bottom: 20px;\">
                    <h3 class=\"menuTorneosTituloListado\">
                        ";
            // line 2159
            if (0 !== twig_compare(($context["imagenPais"] ?? null), 60)) {
                // line 2160
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 2161
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 2162
                echo "                        ";
            } elseif ((0 === twig_compare(($context["imagenPais"] ?? null), 60) && -1 === twig_compare(($context["imagenComunidad"] ?? null), 2))) {
                // line 2163
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 2164
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 2165
                echo "                        ";
            } elseif (1 === twig_compare(($context["imagenComunidad"] ?? null), 1)) {
                // line 2166
                echo "                            ";
                $context["bandera"] = ($context["imagenComunidad"] ?? null);
                // line 2167
                echo "                            ";
                $context["tipoBandera"] = "comunidad";
                // line 2168
                echo "
                            ";
                // line 2169
                if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                    // line 2170
                    echo "                                ";
                    $context["bandera"] = 55;
                    // line 2171
                    echo "                            ";
                } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                    // line 2172
                    echo "                                ";
                    $context["bandera"] = 56;
                    // line 2173
                    echo "                            ";
                }
                // line 2174
                echo "
                        ";
            }
            // line 2176
            echo "
                        ";
            // line 2177
            if (0 === twig_compare(($context["tipoBandera"] ?? null), "pais")) {
                // line 2178
                echo "                            ";
                $context["bandera"] = (($context["bandera"] ?? null) . "b");
                // line 2179
                echo "                        ";
            }
            // line 2180
            echo "
                        ";
            // line 2181
            echo twig_escape_filter($this->env, $context["nombrePais"], "html", null, true);
            echo "
                    </h3>
                    <ul class=\"menuTorneosUL\">
                        ";
            // line 2184
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["torneos"]);
            foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
                // line 2185
                echo "                            <li>
                                <a href=\"";
                // line 2186
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 2186), "html", null, true);
                echo "\">
                                    <i style=\"margin-right: 10px;\" class=\"";
                // line 2187
                echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
                echo " flag";
                echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
                echo "\"></i>
                                    ";
                // line 2188
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 2188), "html", null, true);
                echo "
                                </a>
                            </li>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 2192
            echo "                    </ul>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['nombrePais'], $context['torneos'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 2195
        echo "        </div>
    </div>

    <div class=\"container-fluid menuDesplegable\" id=\"menuJuvenil\" style=\"max-width: 400px; right: 0px; margin-right: 0px;\">
        <div class=\"row\">
            <div class=\"col-12\">
                <h3 class=\"menuTorneosTituloListado\">Juvenil</h3>
                <ul class=\"menuTorneosUL row\">
                    ";
        // line 2203
        $context["nn"] = "";
        // line 2204
        echo "                    ";
        $context["counter"] = 0;
        echo " 

                    ";
        // line 2206
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "juvenil", [], "any", false, false, false, 2206));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 2207
            echo "                        ";
            $context["tipoBandera"] = "";
            // line 2208
            echo "                        ";
            $context["bandera"] = "";
            // line 2209
            echo "                        ";
            $context["imagenPais"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenPais", [], "any", false, false, false, 2209);
            // line 2210
            echo "                        ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 2210);
            // line 2211
            echo "
                        ";
            // line 2212
            if (0 !== twig_compare(($context["imagenPais"] ?? null), 60)) {
                // line 2213
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 2214
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 2215
                echo "                        ";
            } elseif ((0 === twig_compare(($context["imagenPais"] ?? null), 60) && -1 === twig_compare(($context["imagenComunidad"] ?? null), 2))) {
                // line 2216
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 2217
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 2218
                echo "                        ";
            } elseif (1 === twig_compare(($context["imagenComunidad"] ?? null), 1)) {
                // line 2219
                echo "                            ";
                $context["bandera"] = ($context["imagenComunidad"] ?? null);
                // line 2220
                echo "                            ";
                $context["tipoBandera"] = "comunidad";
                // line 2221
                echo "
                            ";
                // line 2222
                if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                    // line 2223
                    echo "                                ";
                    $context["bandera"] = 55;
                    // line 2224
                    echo "                            ";
                } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                    // line 2225
                    echo "                                ";
                    $context["bandera"] = 56;
                    // line 2226
                    echo "                            ";
                }
                // line 2227
                echo "
                             ";
                // line 2228
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["torneo"], "temporada_id", [], "any", false, false, false, 2228), 3093)) {
                    // line 2229
                    echo "                                    ";
                    $context["bandera"] = 22;
                    // line 2230
                    echo "                            ";
                }
                // line 2231
                echo "
                             ";
                // line 2232
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["torneo"], "temporada_id", [], "any", false, false, false, 2232), 3096)) {
                    // line 2233
                    echo "                                    ";
                    $context["bandera"] = 21;
                    // line 2234
                    echo "                            ";
                }
                // line 2235
                echo "
                        ";
            }
            // line 2237
            echo "
                        ";
            // line 2238
            if ((0 !== twig_compare(($context["bandera"] ?? null), "") && 0 === twig_compare(($context["tipoBandera"] ?? null), "pais"))) {
                // line 2239
                echo "                            ";
                $context["bandera"] = (($context["bandera"] ?? null) . "b");
                // line 2240
                echo "                        ";
            }
            echo " 
                        <li>                                       
                            ";
            // line 2242
            if (0 !== twig_compare(($context["bandera"] ?? null), "")) {
                echo "                                    
                                <div style=\"float:left;\"><div style=\"width:20px\"></div><i style=\"margin-top: 10px\" class=\"";
                // line 2243
                echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
                echo " flag";
                echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
                echo "\"\"></i></div>
                            ";
            }
            // line 2245
            echo "                             <div style=\"float:left; margin-right: 10px\">
                            <a href=\"";
            // line 2246
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 2246), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 2246), "html", null, true);
            echo "</a></div>
                        </li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 2249
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
        // line 2260
        $context["nn"] = "";
        // line 2261
        echo "                    ";
        $context["counter"] = 0;
        echo " 

                    ";
        // line 2263
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "femenino", [], "any", false, false, false, 2263));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 2264
            echo "
                        ";
            // line 2265
            if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["torneo"], "id", [], "any", false, false, false, 2265), 71) || 0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["torneo"], "id", [], "any", false, false, false, 2265), 76))) {
                // line 2266
                echo "
                            ";
                // line 2267
                $context["nn"] = "";
                echo " 

                        ";
            }
            // line 2270
            echo "

                        ";
            // line 2272
            $context["tipoBandera"] = "";
            // line 2273
            echo "                        ";
            $context["bandera"] = "";
            // line 2274
            echo "                        ";
            $context["imagenPais"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenPais", [], "any", false, false, false, 2274);
            // line 2275
            echo "                        ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 2275);
            // line 2276
            echo "
                        ";
            // line 2277
            if (0 !== twig_compare(($context["imagenPais"] ?? null), 60)) {
                // line 2278
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 2279
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 2280
                echo "                        ";
            } elseif ((0 === twig_compare(($context["imagenPais"] ?? null), 60) && -1 === twig_compare(($context["imagenComunidad"] ?? null), 2))) {
                // line 2281
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 2282
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 2283
                echo "                        ";
            } elseif (1 === twig_compare(($context["imagenComunidad"] ?? null), 1)) {
                // line 2284
                echo "                            ";
                $context["bandera"] = ($context["imagenComunidad"] ?? null);
                // line 2285
                echo "                            ";
                $context["tipoBandera"] = "comunidad";
                // line 2286
                echo "
                            ";
                // line 2287
                if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                    // line 2288
                    echo "                                ";
                    $context["bandera"] = 55;
                    // line 2289
                    echo "                            ";
                } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                    // line 2290
                    echo "                                ";
                    $context["bandera"] = 56;
                    // line 2291
                    echo "                            ";
                }
                // line 2292
                echo "
                        ";
            }
            // line 2294
            echo "
                        ";
            // line 2295
            if ((0 !== twig_compare(($context["bandera"] ?? null), "") && 0 === twig_compare(($context["tipoBandera"] ?? null), "pais"))) {
                // line 2296
                echo "                            ";
                $context["bandera"] = (($context["bandera"] ?? null) . "b");
                // line 2297
                echo "                        ";
            }
            // line 2298
            echo "
                      
                <li>
                    <div style=\"float:left; padding:5px\">
                 ";
            // line 2302
            if (0 !== twig_compare(($context["bandera"] ?? null), "")) {
                echo "                                    
                    <div style=\"float:left\"><i style=\"margin-right: 10px;\" class=\"";
                // line 2303
                echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
                echo " flag";
                echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
                echo "\"></i></div>
                 ";
            }
            // line 2305
            echo "                 <div style=\"float:left; margin-right: 10px\"><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 2305), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 2305), "html", null, true);
            echo "</a></div>
                 </div>
                </li>

                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 2310
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
        // line 2322
        $context["nn"] = "";
        // line 2323
        echo "                     ";
        $context["counter"] = 0;
        echo " 

                    ";
        // line 2325
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "sala", [], "any", false, false, false, 2325));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 2326
            echo "                        ";
            $context["tipoBandera"] = "";
            // line 2327
            echo "                        ";
            $context["bandera"] = "";
            // line 2328
            echo "                        ";
            $context["imagenPais"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenPais", [], "any", false, false, false, 2328);
            // line 2329
            echo "                        ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 2329);
            // line 2330
            echo "
                        ";
            // line 2331
            if (0 !== twig_compare(($context["imagenPais"] ?? null), 60)) {
                // line 2332
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 2333
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 2334
                echo "                        ";
            } elseif ((0 === twig_compare(($context["imagenPais"] ?? null), 60) && -1 === twig_compare(($context["imagenComunidad"] ?? null), 2))) {
                // line 2335
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 2336
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 2337
                echo "                        ";
            } elseif (1 === twig_compare(($context["imagenComunidad"] ?? null), 1)) {
                // line 2338
                echo "                            ";
                $context["bandera"] = ($context["imagenComunidad"] ?? null);
                // line 2339
                echo "                            ";
                $context["tipoBandera"] = "comunidad";
                // line 2340
                echo "
                            ";
                // line 2341
                if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                    // line 2342
                    echo "                                ";
                    $context["bandera"] = 55;
                    // line 2343
                    echo "                            ";
                } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                    // line 2344
                    echo "                                ";
                    $context["bandera"] = 56;
                    // line 2345
                    echo "                            ";
                }
                // line 2346
                echo "
                        ";
            }
            // line 2348
            echo "
                        ";
            // line 2349
            if ((0 !== twig_compare(($context["bandera"] ?? null), "") && 0 === twig_compare(($context["tipoBandera"] ?? null), "pais"))) {
                // line 2350
                echo "                            ";
                $context["bandera"] = (($context["bandera"] ?? null) . "b");
                // line 2351
                echo "                        ";
            }
            // line 2352
            echo "
                        

                                ";
            // line 2355
            $context["t"] = twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 2355), 0,  -7);
            // line 2356
            echo "                                ";
            if (0 !== twig_compare(($context["nn"] ?? null), ($context["t"] ?? null))) {
                echo "                                    
                                    
                                     ";
                // line 2358
                if (0 !== twig_compare(($context["counter"] ?? null), 0)) {
                    echo "   
                                        </tr></table></li>
                                       ";
                    // line 2360
                    $context["counter"] = 0;
                    echo " 
                                    ";
                }
                // line 2362
                echo "
                                    <li class=\"col-4\">
                                        <table class=\"table\"><tr><td>
                                    ";
                // line 2365
                if (0 !== twig_compare(($context["bandera"] ?? null), "")) {
                    echo "                                    
                                        <i style=\"margin-right: 10px;\" class=\"";
                    // line 2366
                    echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
                    echo " flag";
                    echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
                    echo "\"></i>
                                    ";
                }
                // line 2368
                echo "                                        </td>

                                    ";
                // line 2370
                $context["parte"] = twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 2370),  -7);
                // line 2371
                echo "
                                    ";
                // line 2372
                if (0 !== twig_compare(twig_slice($this->env, ($context["parte"] ?? null), 0, 5), "Grupo")) {
                    echo " 
                                    <td><a href=\"";
                    // line 2373
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 2373), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 2373), "html", null, true);
                    echo "</a></td>
                                    ";
                } else {
                    // line 2375
                    echo "
                                   <td style=\"color: #AFAFAF;font-family: Roboto;font-style: normal;font-weight: normal;font-size: 13px;\">";
                    // line 2376
                    echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 2376), 0,  -9), "html", null, true);
                    echo "</td>
                                   <td align=\"center\"><a href=\"";
                    // line 2377
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 2377), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 2377),  -7), "html", null, true);
                    echo "</a></td>
                                    
                                    ";
                }
                // line 2379
                echo "                                    

                                ";
            } else {
                // line 2382
                echo "
                                <td align=\"center\"><a href=\"";
                // line 2383
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 2383), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 2383),  -7), "html", null, true);
                echo "</a></td>
                                ";
            }
            // line 2385
            echo "
                                ";
            // line 2386
            $context["counter"] = (($context["counter"] ?? null) + 1);
            // line 2387
            echo "                                ";
            $context["nn"] = ($context["t"] ?? null);
            echo " 
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 2389
        echo "                    </tr></table></li>
                </ul>
            </div>
        </div>
    </div>

    ";
        // line 2412
        echo "
    


    <footer class=\"col-12\" style=\"color:#2F4F4F; text-align:center; padding-top: 20px; padding-bottom:7px; bottom: 2px !important;\">
        <a style=\"color:#2F4F4F;\" href=\"#\" onclick=\"if(window.__lxG__consent__!==undefined&&window.__lxG__consent__.getState()!==null){window.__lxG__consent__.showConsent()} else {alert('This function only for users from European Economic Area (EEA)')}; return false\">Change privacy settings</a>
        - <a href=\"/aviso-legal\" rel=\"nofollow noopener noreferrer\" style=\"color:#2F4F4F;\">Aviso Legal</a>
        - Futbolme 1999-2020
        - <a style=\"color:#2F4F4F;\" target=\"_blank\" href=\"https://finderant.com/\">motor de búsqueda finderant.com</a>
        - <a style=\"color:#2F4F4F;\" rel=\"nofollow noopener noreferrer\" href=\"http://www.hyd.es\" target=\"_blank\">Alojado en Hyd</a>
        - Colabora <a style=\"color:#2F4F4F;\" href=\"http://www.quesomecanico.com\" rel=\"nofollow noopener noreferrer\" target=\"_blank\">quesomecanico.com</a>
    </footer>

    <div class=\"col-12 text-center\" style=\"font-size: 14px; color: #333333; margin-bottom: 90px;\">
        ";
        // line 2426
        $context["tiempoTotal"] = (call_user_func_array($this->env->getFunction('microtime')->getCallable(), [true]) - call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__INICIO_MICROTIME__"]));
        // line 2427
        echo "        Página generada en ";
        echo twig_escape_filter($this->env, twig_round(($context["tiempoTotal"] ?? null), 3), "html", null, true);
        echo " segundos
    </div>

    ";
        // line 2431
        echo "    
    

    ";
        // line 2440
        echo "
</body>
</html>";
    }

    // line 42
    public function block_bloqueCss($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 43
        echo "
    ";
    }

    // line 193
    public function block_bloqueJs($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 194
        echo "
    ";
    }

    // line 1599
    public function block_contenedorIzquierda($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1600
        echo "
                    ";
    }

    // line 1660
    public function block_contenedorCentral($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1661
        echo "
            ";
    }

    // line 1771
    public function block_contenedorDerecha($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1772
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
        return array (  3963 => 1772,  3959 => 1771,  3954 => 1661,  3950 => 1660,  3945 => 1600,  3941 => 1599,  3936 => 194,  3932 => 193,  3927 => 43,  3923 => 42,  3917 => 2440,  3912 => 2431,  3905 => 2427,  3903 => 2426,  3887 => 2412,  3879 => 2389,  3870 => 2387,  3868 => 2386,  3865 => 2385,  3858 => 2383,  3855 => 2382,  3850 => 2379,  3842 => 2377,  3838 => 2376,  3835 => 2375,  3828 => 2373,  3824 => 2372,  3821 => 2371,  3819 => 2370,  3815 => 2368,  3808 => 2366,  3804 => 2365,  3799 => 2362,  3794 => 2360,  3789 => 2358,  3783 => 2356,  3781 => 2355,  3776 => 2352,  3773 => 2351,  3770 => 2350,  3768 => 2349,  3765 => 2348,  3761 => 2346,  3758 => 2345,  3755 => 2344,  3752 => 2343,  3749 => 2342,  3747 => 2341,  3744 => 2340,  3741 => 2339,  3738 => 2338,  3735 => 2337,  3732 => 2336,  3729 => 2335,  3726 => 2334,  3723 => 2333,  3720 => 2332,  3718 => 2331,  3715 => 2330,  3712 => 2329,  3709 => 2328,  3706 => 2327,  3703 => 2326,  3699 => 2325,  3693 => 2323,  3691 => 2322,  3677 => 2310,  3663 => 2305,  3656 => 2303,  3652 => 2302,  3646 => 2298,  3643 => 2297,  3640 => 2296,  3638 => 2295,  3635 => 2294,  3631 => 2292,  3628 => 2291,  3625 => 2290,  3622 => 2289,  3619 => 2288,  3617 => 2287,  3614 => 2286,  3611 => 2285,  3608 => 2284,  3605 => 2283,  3602 => 2282,  3599 => 2281,  3596 => 2280,  3593 => 2279,  3590 => 2278,  3588 => 2277,  3585 => 2276,  3582 => 2275,  3579 => 2274,  3576 => 2273,  3574 => 2272,  3570 => 2270,  3564 => 2267,  3561 => 2266,  3559 => 2265,  3556 => 2264,  3552 => 2263,  3546 => 2261,  3544 => 2260,  3531 => 2249,  3520 => 2246,  3517 => 2245,  3510 => 2243,  3506 => 2242,  3500 => 2240,  3497 => 2239,  3495 => 2238,  3492 => 2237,  3488 => 2235,  3485 => 2234,  3482 => 2233,  3480 => 2232,  3477 => 2231,  3474 => 2230,  3471 => 2229,  3469 => 2228,  3466 => 2227,  3463 => 2226,  3460 => 2225,  3457 => 2224,  3454 => 2223,  3452 => 2222,  3449 => 2221,  3446 => 2220,  3443 => 2219,  3440 => 2218,  3437 => 2217,  3434 => 2216,  3431 => 2215,  3428 => 2214,  3425 => 2213,  3423 => 2212,  3420 => 2211,  3417 => 2210,  3414 => 2209,  3411 => 2208,  3408 => 2207,  3404 => 2206,  3398 => 2204,  3396 => 2203,  3386 => 2195,  3378 => 2192,  3368 => 2188,  3362 => 2187,  3358 => 2186,  3355 => 2185,  3351 => 2184,  3345 => 2181,  3342 => 2180,  3339 => 2179,  3336 => 2178,  3334 => 2177,  3331 => 2176,  3327 => 2174,  3324 => 2173,  3321 => 2172,  3318 => 2171,  3315 => 2170,  3313 => 2169,  3310 => 2168,  3307 => 2167,  3304 => 2166,  3301 => 2165,  3298 => 2164,  3295 => 2163,  3292 => 2162,  3289 => 2161,  3286 => 2160,  3284 => 2159,  3280 => 2157,  3277 => 2156,  3274 => 2155,  3271 => 2154,  3268 => 2153,  3264 => 2152,  3252 => 2142,  3242 => 2138,  3238 => 2137,  3235 => 2136,  3231 => 2135,  3220 => 2126,  3210 => 2122,  3206 => 2121,  3203 => 2120,  3199 => 2119,  3188 => 2110,  3178 => 2106,  3174 => 2105,  3170 => 2104,  3167 => 2103,  3164 => 2102,  3161 => 2101,  3158 => 2100,  3155 => 2099,  3152 => 2098,  3149 => 2097,  3145 => 2096,  3098 => 2051,  3088 => 2047,  3079 => 2045,  3074 => 2044,  3072 => 2043,  3069 => 2042,  3061 => 2039,  3058 => 2038,  3048 => 2030,  3040 => 2028,  3034 => 2025,  3031 => 2024,  3023 => 2021,  3018 => 2019,  3013 => 2016,  3011 => 2015,  3007 => 2013,  3002 => 2011,  2998 => 2010,  2993 => 2007,  2988 => 2005,  2983 => 2003,  2978 => 2001,  2973 => 2000,  2970 => 1999,  2967 => 1998,  2964 => 1997,  2961 => 1996,  2959 => 1995,  2956 => 1994,  2950 => 1990,  2947 => 1989,  2944 => 1988,  2941 => 1987,  2938 => 1986,  2935 => 1985,  2932 => 1984,  2929 => 1983,  2926 => 1982,  2924 => 1981,  2921 => 1980,  2918 => 1979,  2915 => 1978,  2912 => 1977,  2909 => 1976,  2905 => 1975,  2900 => 1972,  2898 => 1971,  2893 => 1970,  2891 => 1969,  2888 => 1968,  2884 => 1967,  2870 => 1955,  2856 => 1951,  2849 => 1949,  2845 => 1948,  2840 => 1945,  2837 => 1944,  2834 => 1943,  2831 => 1942,  2828 => 1941,  2826 => 1940,  2823 => 1939,  2819 => 1937,  2816 => 1936,  2813 => 1935,  2810 => 1934,  2807 => 1933,  2805 => 1932,  2802 => 1931,  2799 => 1930,  2796 => 1929,  2793 => 1928,  2790 => 1927,  2787 => 1926,  2784 => 1925,  2781 => 1924,  2778 => 1923,  2776 => 1922,  2773 => 1921,  2770 => 1920,  2767 => 1919,  2764 => 1918,  2761 => 1917,  2757 => 1916,  2751 => 1914,  2749 => 1913,  2733 => 1899,  2719 => 1895,  2712 => 1893,  2708 => 1892,  2703 => 1889,  2700 => 1888,  2697 => 1887,  2694 => 1886,  2692 => 1885,  2688 => 1883,  2685 => 1882,  2682 => 1881,  2679 => 1880,  2676 => 1879,  2674 => 1878,  2671 => 1877,  2667 => 1875,  2664 => 1874,  2661 => 1873,  2658 => 1872,  2655 => 1871,  2653 => 1870,  2650 => 1869,  2647 => 1868,  2644 => 1867,  2641 => 1866,  2638 => 1865,  2635 => 1864,  2632 => 1863,  2629 => 1862,  2626 => 1861,  2624 => 1860,  2621 => 1859,  2618 => 1858,  2615 => 1857,  2612 => 1856,  2609 => 1855,  2605 => 1854,  2599 => 1852,  2597 => 1851,  2585 => 1841,  2571 => 1836,  2564 => 1834,  2560 => 1833,  2556 => 1831,  2552 => 1830,  2540 => 1820,  2527 => 1816,  2520 => 1814,  2516 => 1813,  2512 => 1811,  2508 => 1810,  2485 => 1789,  2480 => 1786,  2476 => 1777,  2473 => 1776,  2471 => 1775,  2468 => 1774,  2466 => 1771,  2456 => 1763,  2433 => 1721,  2430 => 1720,  2428 => 1719,  2423 => 1716,  2418 => 1713,  2416 => 1712,  2412 => 1710,  2410 => 1709,  2407 => 1708,  2404 => 1707,  2402 => 1706,  2399 => 1705,  2384 => 1687,  2382 => 1686,  2379 => 1685,  2376 => 1684,  2373 => 1683,  2370 => 1682,  2367 => 1681,  2365 => 1680,  2362 => 1679,  2360 => 1678,  2347 => 1667,  2345 => 1666,  2340 => 1663,  2338 => 1660,  2334 => 1658,  2327 => 1653,  2324 => 1652,  2322 => 1651,  2317 => 1648,  2311 => 1602,  2309 => 1599,  2303 => 1595,  2300 => 1594,  2298 => 1593,  2293 => 1590,  2290 => 1589,  2285 => 1586,  2283 => 1585,  2279 => 1583,  2277 => 1582,  2274 => 1581,  2271 => 1580,  2268 => 1579,  2266 => 1578,  2263 => 1577,  2260 => 1576,  2257 => 1575,  2255 => 1574,  2252 => 1573,  2250 => 1572,  2246 => 1570,  2244 => 1567,  2242 => 1564,  2231 => 1552,  2229 => 1551,  2226 => 1550,  2223 => 1549,  2220 => 1548,  2217 => 1547,  2214 => 1546,  2212 => 1545,  2209 => 1544,  2207 => 1543,  2201 => 1539,  2199 => 1538,  2180 => 1522,  2177 => 1521,  2173 => 1514,  2166 => 1419,  2152 => 1414,  2145 => 1412,  2141 => 1411,  2136 => 1408,  2133 => 1407,  2130 => 1406,  2128 => 1405,  2125 => 1404,  2121 => 1402,  2118 => 1401,  2115 => 1400,  2112 => 1399,  2109 => 1398,  2107 => 1397,  2104 => 1396,  2101 => 1395,  2098 => 1394,  2095 => 1393,  2092 => 1392,  2089 => 1391,  2086 => 1390,  2083 => 1389,  2080 => 1388,  2078 => 1387,  2075 => 1386,  2072 => 1385,  2069 => 1384,  2066 => 1383,  2064 => 1382,  2058 => 1378,  2054 => 1377,  2048 => 1375,  2046 => 1374,  2023 => 1353,  2011 => 1349,  2008 => 1348,  2001 => 1346,  1997 => 1345,  1993 => 1343,  1990 => 1342,  1987 => 1341,  1985 => 1340,  1982 => 1339,  1977 => 1336,  1974 => 1335,  1971 => 1334,  1969 => 1333,  1966 => 1332,  1963 => 1331,  1960 => 1330,  1958 => 1329,  1955 => 1328,  1952 => 1327,  1949 => 1326,  1946 => 1325,  1943 => 1324,  1941 => 1323,  1938 => 1322,  1935 => 1321,  1932 => 1320,  1929 => 1319,  1926 => 1318,  1923 => 1317,  1920 => 1316,  1917 => 1315,  1914 => 1314,  1912 => 1313,  1909 => 1312,  1906 => 1311,  1903 => 1310,  1900 => 1309,  1897 => 1308,  1893 => 1307,  1887 => 1305,  1885 => 1304,  1866 => 1287,  1858 => 1284,  1848 => 1280,  1844 => 1279,  1841 => 1278,  1837 => 1277,  1826 => 1269,  1820 => 1268,  1817 => 1267,  1814 => 1266,  1811 => 1265,  1809 => 1264,  1806 => 1263,  1802 => 1261,  1799 => 1260,  1796 => 1259,  1793 => 1258,  1790 => 1257,  1788 => 1256,  1785 => 1255,  1782 => 1254,  1779 => 1253,  1776 => 1252,  1773 => 1251,  1770 => 1250,  1767 => 1249,  1764 => 1248,  1761 => 1247,  1759 => 1246,  1755 => 1244,  1752 => 1243,  1749 => 1242,  1746 => 1241,  1743 => 1240,  1739 => 1239,  1719 => 1221,  1709 => 1217,  1705 => 1216,  1702 => 1215,  1698 => 1214,  1684 => 1202,  1674 => 1198,  1670 => 1197,  1667 => 1196,  1663 => 1195,  1649 => 1183,  1639 => 1179,  1635 => 1178,  1631 => 1177,  1628 => 1176,  1625 => 1175,  1622 => 1174,  1619 => 1173,  1616 => 1172,  1613 => 1171,  1610 => 1170,  1606 => 1169,  1546 => 1111,  1539 => 1110,  1529 => 1107,  1527 => 1106,  1524 => 1105,  1517 => 1103,  1514 => 1102,  1509 => 1099,  1501 => 1097,  1495 => 1094,  1492 => 1093,  1484 => 1090,  1479 => 1088,  1476 => 1087,  1474 => 1086,  1470 => 1084,  1465 => 1082,  1461 => 1081,  1456 => 1078,  1451 => 1076,  1446 => 1074,  1441 => 1072,  1437 => 1071,  1432 => 1068,  1429 => 1067,  1426 => 1066,  1423 => 1065,  1420 => 1064,  1418 => 1063,  1415 => 1062,  1411 => 1060,  1408 => 1059,  1405 => 1058,  1402 => 1057,  1399 => 1056,  1396 => 1055,  1393 => 1054,  1390 => 1053,  1387 => 1052,  1385 => 1051,  1382 => 1050,  1379 => 1049,  1376 => 1048,  1373 => 1047,  1370 => 1046,  1366 => 1045,  1360 => 1043,  1358 => 1042,  1355 => 1041,  1351 => 1040,  1332 => 1023,  1318 => 1019,  1311 => 1017,  1307 => 1016,  1299 => 1010,  1296 => 1009,  1293 => 1008,  1290 => 1007,  1288 => 1006,  1284 => 1004,  1281 => 1003,  1278 => 1002,  1275 => 1001,  1272 => 1000,  1270 => 999,  1267 => 998,  1263 => 996,  1260 => 995,  1257 => 994,  1254 => 993,  1251 => 992,  1249 => 991,  1246 => 990,  1243 => 989,  1240 => 988,  1237 => 987,  1234 => 986,  1231 => 985,  1228 => 984,  1225 => 983,  1222 => 982,  1220 => 981,  1217 => 980,  1214 => 979,  1211 => 978,  1208 => 977,  1205 => 976,  1201 => 975,  1195 => 973,  1193 => 972,  1177 => 958,  1163 => 954,  1156 => 952,  1152 => 951,  1148 => 949,  1145 => 948,  1142 => 947,  1139 => 946,  1136 => 945,  1134 => 944,  1131 => 943,  1127 => 941,  1124 => 940,  1121 => 939,  1118 => 938,  1115 => 937,  1113 => 936,  1110 => 935,  1107 => 934,  1104 => 933,  1101 => 932,  1098 => 931,  1095 => 930,  1092 => 929,  1089 => 928,  1086 => 927,  1084 => 926,  1081 => 925,  1078 => 924,  1075 => 923,  1072 => 922,  1069 => 921,  1065 => 920,  1059 => 918,  1057 => 917,  1030 => 892,  1016 => 887,  1009 => 885,  1005 => 884,  997 => 881,  994 => 880,  991 => 879,  989 => 878,  965 => 856,  951 => 851,  944 => 849,  940 => 848,  932 => 845,  917 => 835,  911 => 831,  908 => 830,  906 => 829,  857 => 783,  850 => 779,  842 => 774,  819 => 754,  815 => 752,  773 => 705,  699 => 632,  691 => 626,  689 => 625,  682 => 621,  678 => 620,  667 => 612,  660 => 607,  653 => 595,  642 => 587,  630 => 578,  626 => 577,  621 => 574,  617 => 572,  613 => 570,  611 => 569,  608 => 568,  604 => 566,  602 => 565,  597 => 562,  589 => 555,  587 => 554,  580 => 549,  578 => 548,  574 => 546,  570 => 544,  568 => 543,  564 => 541,  558 => 534,  553 => 530,  545 => 519,  542 => 500,  507 => 447,  498 => 436,  494 => 424,  491 => 418,  484 => 415,  481 => 414,  459 => 387,  456 => 386,  454 => 378,  444 => 370,  442 => 369,  432 => 361,  426 => 356,  421 => 344,  419 => 288,  416 => 268,  402 => 255,  388 => 243,  386 => 242,  363 => 222,  360 => 221,  357 => 219,  351 => 218,  348 => 217,  344 => 216,  341 => 215,  338 => 214,  336 => 213,  333 => 212,  331 => 211,  324 => 206,  317 => 196,  315 => 193,  309 => 189,  264 => 108,  231 => 78,  205 => 57,  199 => 56,  193 => 55,  189 => 54,  185 => 53,  179 => 52,  173 => 51,  169 => 50,  164 => 48,  160 => 47,  156 => 46,  153 => 45,  151 => 42,  146 => 40,  140 => 39,  134 => 38,  128 => 37,  124 => 36,  120 => 34,  117 => 33,  113 => 31,  111 => 30,  108 => 29,  104 => 27,  102 => 26,  99 => 25,  95 => 23,  93 => 22,  90 => 21,  88 => 20,  85 => 19,  83 => 16,  80 => 14,  71 => 11,  63 => 10,  55 => 9,  50 => 6,  48 => 5,  42 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "base.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.eu/v2/templates/base.html.twig");
    }
}
