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
class __TwigTemplate_ec8c94fbca40fc631c487f2a258dcd1b96a7b1e722ce54bf6aa186a7b160ab73 extends Template
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
        $context["staticVersion"] = 27;
        // line 6
        echo "
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\">
    <title>";
        // line 9
        if (($context["titleTag"] ?? null)) {
            echo twig_escape_filter($this->env, ($context["titleTag"] ?? null), "html", null, true);
        } else {
            echo "Resultados de fútbol y clasificaciones-Bienvenido a Futbolme";
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
    <link href=\"https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Dosis:wght@200;300;400;500;523;600;700;800&display=swap\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/bs4.5/css/bootstrap.min.css\">
    <link rel=\"stylesheet\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/css/fm.css?v=";
        echo twig_escape_filter($this->env, ($context["staticVersion"] ?? null), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/css/comunidades.min.css?v=";
        echo twig_escape_filter($this->env, ($context["staticVersion"] ?? null), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/css/paises.min.css?v=";
        echo twig_escape_filter($this->env, ($context["staticVersion"] ?? null), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/fontawesome/css/all.css\">
    ";
        // line 18
        $this->displayBlock('bloqueCss', $context, $blocks);
        // line 21
        echo "
    <script type=\"text/javascript\" src=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/jquery/jquery-3.5.1.min.js\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/popper/popper.js\"></script>
    <script async src=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/js/bootstrap.min.js\"></script>
    <script async src=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css\"></script>
    <script async src=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/js/bootstrap.bundle.min.js\"></script>
    <script async src=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/js/comunsite.min.js\"></script>
    <script async src=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/js/notificaciones.js?v=";
        echo twig_escape_filter($this->env, ($context["staticVersion"] ?? null), "html", null, true);
        echo "\"></script>
    <script async src=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/js/exporting.js\"></script>
    <script async src=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/js/ajax.js?v=";
        echo twig_escape_filter($this->env, ($context["staticVersion"] ?? null), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/js/global.js?v=";
        echo twig_escape_filter($this->env, ($context["staticVersion"] ?? null), "html", null, true);
        echo "\"></script>
    <script async src=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/js/hambuerguer-menu-multilevel-hayleyt.js?v=";
        echo twig_escape_filter($this->env, ($context["staticVersion"] ?? null), "html", null, true);
        echo "\"></script>

    ";
        // line 34
        $this->displayBlock('bloqueJs', $context, $blocks);
        // line 37
        echo "

    ";
        // line 40
        echo "    <script type='text/javascript'>
        (function(c){
            var s=document.createElement('script');
            s.src='//ads.sportslocalmedia.com/slm.prebid.futbolme.js?'+((new Date).getTime()/1e3/600).toFixed();
            s.type='text/javascript';s.async='true';
            try{ var i=document.getElementsByTagName('script')[0];i.parentNode.insertBefore(s,i); }catch(e){};
        })();
    </script>

    <div id=\"13939-11\"><script src=\"//ads.themoneytizer.com/s/gen.js?type=11\"></script><script src=\"//ads.themoneytizer.com/s/requestform.js?siteId=13939&formatId=11\"></script></div>

    <div id=\"13939-6\"><script src=\"//ads.themoneytizer.com/s/gen.js?type=6\"></script><script src=\"//ads.themoneytizer.com/s/requestform.js?siteId=13939&formatId=6\"></script></div>

    <!-- Quantcast Choice. Consent Manager Tag v2.0 (for TCF 2.0) -->
    <script type=\"text/javascript\" async=\"true\">
        (function() {
            var host = window.location.hostname;
            var element = document.createElement('script');
            var firstScript = document.getElementsByTagName('script')[0];
            var url = 'https://quantcast.mgr.consensu.org'
                .concat('/choice/', '6Fv0cGNfc_bw8', '/', host, '/choice.js')
            var uspTries = 0;
            var uspTriesLimit = 3;
            element.async = true;
            element.type = 'text/javascript';
            element.src = url;

            firstScript.parentNode.insertBefore(element, firstScript);

            function makeStub() {
                var TCF_LOCATOR_NAME = '__tcfapiLocator';
                var queue = [];
                var win = window;
                var cmpFrame;

                function addFrame() {
                    var doc = win.document;
                    var otherCMP = !!(win.frames[TCF_LOCATOR_NAME]);

                    if (!otherCMP) {
                        if (doc.body) {
                            var iframe = doc.createElement('iframe');

                            iframe.style.cssText = 'display:none';
                            iframe.name = TCF_LOCATOR_NAME;
                            doc.body.appendChild(iframe);
                        } else {
                            setTimeout(addFrame, 5);
                        }
                    }
                    return !otherCMP;
                }

                function tcfAPIHandler() {
                    var gdprApplies;
                    var args = arguments;

                    if (!args.length) {
                        return queue;
                    } else if (args[0] === 'setGdprApplies') {
                        if (
                            args.length > 3 &&
                            args[2] === 2 &&
                            typeof args[3] === 'boolean'
                        ) {
                            gdprApplies = args[3];
                            if (typeof args[2] === 'function') {
                                args[2]('set', true);
                            }
                        }
                    } else if (args[0] === 'ping') {
                        var retr = {
                            gdprApplies: gdprApplies,
                            cmpLoaded: false,
                            cmpStatus: 'stub'
                        };

                        if (typeof args[2] === 'function') {
                            args[2](retr);
                        }
                    } else {
                        queue.push(args);
                    }
                }

                function postMessageEventHandler(event) {
                    var msgIsString = typeof event.data === 'string';
                    var json = {};

                    try {
                        if (msgIsString) {
                            json = JSON.parse(event.data);
                        } else {
                            json = event.data;
                        }
                    } catch (ignore) {}

                    var payload = json.__tcfapiCall;

                    if (payload) {
                        window.__tcfapi(
                            payload.command,
                            payload.version,
                            function(retValue, success) {
                                var returnMsg = {
                                    __tcfapiReturn: {
                                        returnValue: retValue,
                                        success: success,
                                        callId: payload.callId
                                    }
                                };
                                if (msgIsString) {
                                    returnMsg = JSON.stringify(returnMsg);
                                }
                                event.source.postMessage(returnMsg, '*');
                            },
                            payload.parameter
                        );
                    }
                }

                while (win) {
                    try {
                        if (win.frames[TCF_LOCATOR_NAME]) {
                            cmpFrame = win;
                            break;
                        }
                    } catch (ignore) {}

                    if (win === window.top) {
                        break;
                    }
                    win = win.parent;
                }
                if (!cmpFrame) {
                    addFrame();
                    win.__tcfapi = tcfAPIHandler;
                    win.addEventListener('message', postMessageEventHandler, false);
                }
            };

            if (typeof module !== 'undefined') {
                module.exports = makeStub;
            } else {
                makeStub();
            }

            var uspStubFunction = function() {
                var arg = arguments;
                if (typeof window.__uspapi !== uspStubFunction) {
                    setTimeout(function() {
                        if (typeof window.__uspapi !== 'undefined') {
                            window.__uspapi.apply(window.__uspapi, arg);
                        }
                    }, 500);
                }
            };

            var checkIfUspIsReady = function() {
                uspTries++;
                if (window.__uspapi === uspStubFunction && uspTries < uspTriesLimit) {
                    console.warn('USP is not accessible');
                } else {
                    clearInterval(uspInterval);
                }
            };

            if (typeof window.__uspapi === 'undefined') {
                window.__uspapi = uspStubFunction;
                var uspInterval = setInterval(checkIfUspIsReady, 6000);
            }
        })();
    </script>
    <!-- End Quantcast Choice. Consent Manager Tag v2.0 (for TCF 2.0) -->
    <style>
        .qc-cmp-button,
        .qc-cmp-button.qc-cmp-secondary-button:hover {
            background-color: #000000 !important;
            border-color: #000000 !important;
        }
        .qc-cmp-button:hover,
        .qc-cmp-button.qc-cmp-secondary-button {
            background-color: transparent !important;
            border-color: #000000 !important;
        }
        .qc-cmp-alt-action,
        .qc-cmp-link {
            color: #000000 !important;
        }
        .qc-cmp-button,
        .qc-cmp-button.qc-cmp-secondary-button:hover {
            color: #ffffff !important;
        }
        .qc-cmp-button:hover,
        .qc-cmp-button.qc-cmp-secondary-button {
            color: #000000 !important;
        }
        .qc-cmp-small-toggle,
        .qc-cmp-toggle {
            background-color: #000000 !important;
            border-color: #000000 !important;
        }
        .qc-cmp-main-messaging,
        .qc-cmp-messaging,
        .qc-cmp-sub-title,
        .qc-cmp-privacy-settings-title,
        .qc-cmp-purpose-list,
        .qc-cmp-tab,
        .qc-cmp-title,
        .qc-cmp-vendor-list,
        .qc-cmp-vendor-list-title,
        .qc-cmp-enabled-cell,
        .qc-cmp-toggle-status,
        .qc-cmp-table,
        .qc-cmp-table-header {
            color: #000000 !important;
        }

        .qc-cmp-ui {
            background-color: #ffffff !important;
        }

        .qc-cmp-table,
        .qc-cmp-table-row {
            border: 1px solid !important;
            border-color: #000000 !important;
        }
        #qcCmpButtons a {
            text-decoration: none !important;

        }

        #qcCmpButtons button {
            margin-top: 65px;
        }


        @media screen and (min-width: 851px) {
            #qcCmpButtons a {
                position: absolute;
                bottom: 10%;
                left: 60px;
            }
        }
        .qc-cmp-qc-link-container{
            display:none;
        }

        body {
            margin:0; /*gets rid of white space around body*/
            margin-top:16px;
            position:relative; /*REQUIRED Sets up positioning for your footer*/
        }

        #sticky {
            width:300px;
            height:auto;
            background:black;
            color:white;
            font-weight:bold;
            font-size:24px;
            text-align:center;
            position:fixed;    /*Here's what sticks it*/
            bottom:30px;          /*to the bottom of the window*/
            right:0;            /*and to the left of the window.*/
        }

    </style>
</head>
<body class=\"";
        // line 309
        if ((isset($context["classPagina"]) || array_key_exists("classPagina", $context))) {
            echo twig_escape_filter($this->env, ($context["classPagina"] ?? null), "html", null, true);
        }
        echo "\">
";
        // line 310
        $context["menu"] = call_user_func_array($this->env->getFunction('getMenu')->getCallable(), []);
        // line 311
        echo "<div id=\"contenedorMenuSuperior\">

    <nav id=\"menuTop\">
        <ul id=\"ulMenuDe\">
            <li class=\"d-none d-md-block\">
                <a href=\"\">
                    <img src=\"";
        // line 317
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/img/icono-busqueda.svg\" alt=\"\" class=\"loading\" data-was-processed=\"true\">
                </a>
            </li>
            <li class=\"d-none d-md-block\">
                <a href=\"";
        // line 321
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("partidosTelevisados"), "html", null, true);
        echo "\">
                    <img src=\"";
        // line 322
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/img/icono-tv.svg\" alt=\"\" class=\"loading\" data-was-processed=\"true\">
                </a>
            </li>
            <li id=\"liIconoUsuario\" class=\"d-none d-md-block\">
                <a href=\"\">
                    <img src=\"";
        // line 327
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/img/icono-usuario.svg\" alt=\"\" class=\"loading\" data-was-processed=\"true\">
                    <div>(1)</div>
                </a>
            </li>
            <li id=\"hamburgerMenu\" class=\"d-block d-md-none\">
                <a class=\"js-menuToggle\" href=\"\" title=\"Menú móvil\">
                    <img src=\"";
        // line 333
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/img/hamburger-menu.svg\" alt=\"Menú móvil\" title=\"Menú móvil\">
                </a>
            </li>
        </ul>

        <div id=\"menuTopContenido\">
            <ul id=\"ulMenuIz\" class=\"col-xs-12 nav nav-pills\">
                <li id=\"liLogoFutbolme\">
                    <a href=\"";
        // line 341
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "\">
                        <img src=\"";
        // line 342
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/img/logo-futbolme.svg\" alt=\"Logo Futbolme.com\" class=\"loading\" data-was-processed=\"true\">
                    </a>
                </li>

                <li class=\"dropdown h40 visible-xs text-center\">
                </li>
            </ul>
        </div>
    </nav>

    <nav id=\"menuBottom\" class=\"d-none d-md-block\">
        <ul>
            <li class=\"torneosPrincipales\">
                <a href=\"/resultados-directo/torneo/primera-division/1/\">1ª</a>
            </li>
            <li class=\"torneosPrincipales\">
                <a href=\"/resultados-directo/torneo/segunda-division/2/\">2ª</a>
            </li>
            <li id=\"menuLiSegundaB\">
                <a href=\"\" id=\"menuEnlaceSegundaB\" data-menu=\"SegundaB\">2B</a>
                <div class=\"fondoContactoMenu\"></div>
                <div class=\"flechaTorneos\"></div>
            </li>
            <li id=\"menuLiTercera\" class=\"torneosSecundarios\">
                <a href=\"\" id=\"menuEnlaceTercera\" data-menu=\"Tercera\">3ª y Aut</a>
                <div class=\"flechaTorneos\"></div>
            </li>
            <li class=\"torneosSecundarios\" id=\"menuLiTorneos\">
                <a href=\"\" id=\"menuEnlaceTorneos\" data-menu=\"Torneos\">Torneos</a>
                <div class=\"flechaTorneos\"></div>
            </li>
            <li class=\"torneosSecundarios\" id=\"menuLiEuropa\">
                <a href=\"\" id=\"menuEnlaceEuropa\" data-menu=\"Europa\">Europa</a>
                <div class=\"flechaTorneos\"></div>
            </li>
            <li class=\"torneosSecundarios\" id=\"menuLiJuvenil\">
                <a href=\"\" id=\"menuEnlaceJuvenil\" data-menu=\"Juvenil\">Juvenil</a>
                <div class=\"flechaTorneos\"></div>
            </li>
            <li class=\"torneosSecundarios\" id=\"menuLiFemenino\">
                <a href=\"\" id=\"menuEnlaceFemenino\" data-menu=\"Femenino\">Femenino</a>
                <div class=\"flechaTorneos\"></div>
            </li>
            <li class=\"torneosSecundarios\" id=\"menuLiFutbolSala\">
                <a href=\"\" id=\"menuEnlaceFutbolSala\" data-menu=\"FutbolSala\">Fútbol Sala</a>
                <div class=\"flechaTorneos\"></div>
            </li>
            <li id=\"liContactoMenu\" class=\"torneosSecundarios\">
                <a id=\"enlaceContactoMenu\" href=\"\">
                    Contacto
                </a>
                <div class=\"fondoContactoMenu\"></div>
            </li>
        </ul>
    </nav>

    <nav>
        <ul class=\"pushNav js-topPushNav\">
            <li class=\"closeLevel js-closeLevelTop hdg\">
                Cerrar Menú
            </li>
            <li>
                <a href=\"/resultados-directo/torneo/primera-division/1/\">
                    Primera división
                </a>
            </li>
            <li>
                <a href=\"/resultados-directo/torneo/segunda-division/2/\">
                    Segunda división
                </a>
            </li>

            <li><!-- Begin section 1 -->
                <div class=\"openLevel js-openLevel\">
                    Segunda B
                    <i class=\"fa fa-chevron-right\"></i>
                </div>
                <ul class=\"pushNav pushNav_level js-pushNavLevel\">
                    <li class=\"closeLevel js-closeLevel hdg\">
                        <i class=\"fa fa-chevron-left\"></i>
                        Volver atrás
                    </li>
                    <li>
                        ";
        // line 425
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "segundaB", [], "any", false, false, false, 425));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 426
            echo "                    <li>
                        <a href=\"";
            // line 427
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 427), "html", null, true);
            echo "\">
                            ";
            // line 428
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 428), "html", null, true);
            echo "
                        </a>
                    </li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 432
        echo "                </ul>
            </li><!-- End section 1 -->

            <li><!-- Begin section 1 -->
                <div class=\"openLevel js-openLevel\">
                    Tercera división y Aut.
                    <i class=\"fa fa-chevron-right\"></i>
                </div>
                <ul class=\"pushNav pushNav_level js-pushNavLevel\">
                    <li class=\"closeLevel js-closeLevel hdg\">
                        <i class=\"fa fa-chevron-left\"></i>
                        Volver atrás
                    </li>
                    ";
        // line 465
        echo "                    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "tercera", [], "any", false, false, false, 465));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 466
            echo "                        ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 466);
            // line 467
            echo "                        ";
            if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                // line 468
                echo "                            ";
                $context["imagenComunidad"] = 55;
                // line 469
                echo "                        ";
            } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                // line 470
                echo "                            ";
                $context["imagenComunidad"] = 56;
                // line 471
                echo "                        ";
            }
            // line 472
            echo "                        <li>
                            <a href=\"";
            // line 473
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 473), "html", null, true);
            echo "\">
                                <i class=\"comunidad flag";
            // line 474
            echo twig_escape_filter($this->env, ($context["imagenComunidad"] ?? null), "html", null, true);
            echo "\"></i>
                                ";
            // line 475
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 475), "html", null, true);
            echo "
                            </a></li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 478
        echo "                </ul>
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
        // line 530
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "RFEF", [], "any", false, false, false, 530));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 531
            echo "                                ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 531);
            // line 532
            echo "                                ";
            if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                // line 533
                echo "                                    ";
                $context["imagenComunidad"] = 55;
                // line 534
                echo "                                ";
            } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                // line 535
                echo "                                    ";
                $context["imagenComunidad"] = 56;
                // line 536
                echo "                                ";
            }
            // line 537
            echo "                                <li>
                                    <a href=\"";
            // line 538
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 538), "html", null, true);
            echo "\">
                                        <i class=\"comunidad flag";
            // line 539
            echo twig_escape_filter($this->env, ($context["imagenComunidad"] ?? null), "html", null, true);
            echo "\"></i>
                                        ";
            // line 540
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 540), "html", null, true);
            echo "
                                    </a>
                                </li>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 544
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
        // line 556
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "FIFA", [], "any", false, false, false, 556));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 557
            echo "                                <li>
                                    <a href=\"";
            // line 558
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 558), "html", null, true);
            echo "\">
                                        ";
            // line 559
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 559), "html", null, true);
            echo "
                                    </a>
                                </li>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 563
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
        // line 575
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "UEFA", [], "any", false, false, false, 575));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 576
            echo "                                <li>
                                    <a href=\"";
            // line 577
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 577), "html", null, true);
            echo "\">
                                        ";
            // line 578
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 578), "html", null, true);
            echo "
                                    </a>
                                </li>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 582
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
        // line 600
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "europa", [], "any", false, false, false, 600));
        foreach ($context['_seq'] as $context["nombrePais"] => $context["torneos"]) {
            // line 601
            echo "                        ";
            $context["tipoBandera"] = "";
            // line 602
            echo "                        ";
            $context["bandera"] = "";
            // line 603
            echo "                        ";
            $context["imagenPais"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["torneos"], 0, [], "any", false, false, false, 603), "imagenPais", [], "any", false, false, false, 603);
            // line 604
            echo "                        ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["torneos"], 0, [], "any", false, false, false, 604), "imagenComunidad", [], "any", false, false, false, 604);
            // line 605
            echo "                        <li>
                            <div class=\"openLevel js-openLevel\">
                                ";
            // line 607
            if (0 !== twig_compare(($context["imagenPais"] ?? null), 60)) {
                // line 608
                echo "                                    ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 609
                echo "                                    ";
                $context["tipoBandera"] = "pais";
                // line 610
                echo "                                ";
            } elseif ((0 === twig_compare(($context["imagenPais"] ?? null), 60) && -1 === twig_compare(($context["imagenComunidad"] ?? null), 2))) {
                // line 611
                echo "                                    ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 612
                echo "                                    ";
                $context["tipoBandera"] = "pais";
                // line 613
                echo "                                ";
            } elseif (1 === twig_compare(($context["imagenComunidad"] ?? null), 1)) {
                // line 614
                echo "                                    ";
                $context["bandera"] = ($context["imagenComunidad"] ?? null);
                // line 615
                echo "                                    ";
                $context["tipoBandera"] = "comunidad";
                // line 616
                echo "
                                    ";
                // line 617
                if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                    // line 618
                    echo "                                        ";
                    $context["bandera"] = 55;
                    // line 619
                    echo "                                    ";
                } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                    // line 620
                    echo "                                        ";
                    $context["bandera"] = 56;
                    // line 621
                    echo "                                    ";
                }
                // line 622
                echo "
                                ";
            }
            // line 624
            echo "
                                ";
            // line 625
            if (0 === twig_compare(($context["tipoBandera"] ?? null), "pais")) {
                // line 626
                echo "                                    ";
                $context["bandera"] = (($context["bandera"] ?? null) . "b");
                // line 627
                echo "                                ";
            }
            // line 628
            echo "
                                <i style=\"margin-left: 10px; margin-right: -10px;\" class=\"";
            // line 629
            echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
            echo " flag";
            echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
            echo "\"></i>
                                ";
            // line 630
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
            // line 638
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["torneos"]);
            foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
                // line 639
                echo "                                    <li>
                                        <a href=\"";
                // line 640
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 640), "html", null, true);
                echo "\">
                                            ";
                // line 641
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 641), "html", null, true);
                echo "
                                        </a>
                                    </li>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 645
            echo "                            </ul>
                        </li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['nombrePais'], $context['torneos'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 648
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
        // line 664
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "juvenil", [], "any", false, false, false, 664));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 665
            echo "                        ";
            $context["tipoBandera"] = "";
            // line 666
            echo "                        ";
            $context["bandera"] = "";
            // line 667
            echo "                        ";
            $context["imagenPais"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenPais", [], "any", false, false, false, 667);
            // line 668
            echo "                        ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 668);
            // line 669
            echo "
                        ";
            // line 670
            if (0 !== twig_compare(($context["imagenPais"] ?? null), 60)) {
                // line 671
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 672
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 673
                echo "                        ";
            } elseif ((0 === twig_compare(($context["imagenPais"] ?? null), 60) && -1 === twig_compare(($context["imagenComunidad"] ?? null), 2))) {
                // line 674
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 675
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 676
                echo "                        ";
            } elseif (1 === twig_compare(($context["imagenComunidad"] ?? null), 1)) {
                // line 677
                echo "                            ";
                $context["bandera"] = ($context["imagenComunidad"] ?? null);
                // line 678
                echo "                            ";
                $context["tipoBandera"] = "comunidad";
                // line 679
                echo "
                            ";
                // line 680
                if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                    // line 681
                    echo "                                ";
                    $context["bandera"] = 55;
                    // line 682
                    echo "                            ";
                } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                    // line 683
                    echo "                                ";
                    $context["bandera"] = 56;
                    // line 684
                    echo "                            ";
                }
                // line 685
                echo "
                        ";
            }
            // line 687
            echo "
                        ";
            // line 688
            if ((0 !== twig_compare(($context["bandera"] ?? null), "") && 0 === twig_compare(($context["tipoBandera"] ?? null), "pais"))) {
                // line 689
                echo "                            ";
                $context["bandera"] = (($context["bandera"] ?? null) . "b");
                // line 690
                echo "                        ";
            }
            // line 691
            echo "                        <li>
                            <a href=\"";
            // line 692
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 692), "html", null, true);
            echo "\">
                                ";
            // line 693
            if (0 !== twig_compare(($context["bandera"] ?? null), "")) {
                // line 694
                echo "                                    <i style=\"margin-left: 10px; margin-right: -10px;\" class=\"";
                echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
                echo " flag";
                echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
                echo "\"></i>
                                ";
            }
            // line 696
            echo "                                ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 696), "html", null, true);
            echo "
                            </a>
                        </li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 700
        echo "                </ul>
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
        // line 716
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "femenino", [], "any", false, false, false, 716));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 717
            echo "                        ";
            $context["tipoBandera"] = "";
            // line 718
            echo "                        ";
            $context["bandera"] = "";
            // line 719
            echo "                        ";
            $context["imagenPais"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenPais", [], "any", false, false, false, 719);
            // line 720
            echo "                        ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 720);
            // line 721
            echo "
                        ";
            // line 722
            if (0 !== twig_compare(($context["imagenPais"] ?? null), 60)) {
                // line 723
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 724
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 725
                echo "                        ";
            } elseif ((0 === twig_compare(($context["imagenPais"] ?? null), 60) && -1 === twig_compare(($context["imagenComunidad"] ?? null), 2))) {
                // line 726
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 727
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 728
                echo "                        ";
            } elseif (1 === twig_compare(($context["imagenComunidad"] ?? null), 1)) {
                // line 729
                echo "                            ";
                $context["bandera"] = ($context["imagenComunidad"] ?? null);
                // line 730
                echo "                            ";
                $context["tipoBandera"] = "comunidad";
                // line 731
                echo "
                            ";
                // line 732
                if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                    // line 733
                    echo "                                ";
                    $context["bandera"] = 55;
                    // line 734
                    echo "                            ";
                } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                    // line 735
                    echo "                                ";
                    $context["bandera"] = 56;
                    // line 736
                    echo "                            ";
                }
                // line 737
                echo "
                        ";
            }
            // line 739
            echo "
                        ";
            // line 740
            if ((0 !== twig_compare(($context["bandera"] ?? null), "") && 0 === twig_compare(($context["tipoBandera"] ?? null), "pais"))) {
                // line 741
                echo "                            ";
                $context["bandera"] = (($context["bandera"] ?? null) . "b");
                // line 742
                echo "                        ";
            }
            // line 743
            echo "                        <li>
                            <a href=\"";
            // line 744
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 744), "html", null, true);
            echo "\">
                                ";
            // line 745
            if (0 !== twig_compare(($context["bandera"] ?? null), "")) {
                // line 746
                echo "                                    <i style=\"margin-left: 10px; margin-right: -10px;\" class=\"";
                echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
                echo " flag";
                echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
                echo "\"></i>
                                ";
            }
            // line 748
            echo "                                ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 748), "html", null, true);
            echo "
                            </a>
                        </li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 752
        echo "                </ul>
            </li><!-- End section 1 -->


            <li><!-- Begin section 1 -->
                <div class=\"openLevel js-openLevel\">
                    Fútbol Sala
                    <i class=\"fa fa-chevron-right\"></i>
                </div>
                <ul class=\"pushNav pushNav_level js-pushNavLevel\">
                    <li class=\"closeLevel js-closeLevel hdg\">
                        <i class=\"fa fa-chevron-left\"></i>
                        Volver atrás
                    </li>
                    <li>
                    ";
        // line 767
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "sala", [], "any", false, false, false, 767));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 768
            echo "                        ";
            $context["tipoBandera"] = "";
            // line 769
            echo "                        ";
            $context["bandera"] = "";
            // line 770
            echo "                        ";
            $context["imagenPais"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenPais", [], "any", false, false, false, 770);
            // line 771
            echo "                        ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 771);
            // line 772
            echo "
                        ";
            // line 773
            if (0 !== twig_compare(($context["imagenPais"] ?? null), 60)) {
                // line 774
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 775
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 776
                echo "                        ";
            } elseif ((0 === twig_compare(($context["imagenPais"] ?? null), 60) && -1 === twig_compare(($context["imagenComunidad"] ?? null), 2))) {
                // line 777
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 778
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 779
                echo "                        ";
            } elseif (1 === twig_compare(($context["imagenComunidad"] ?? null), 1)) {
                // line 780
                echo "                            ";
                $context["bandera"] = ($context["imagenComunidad"] ?? null);
                // line 781
                echo "                            ";
                $context["tipoBandera"] = "comunidad";
                // line 782
                echo "
                            ";
                // line 783
                if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                    // line 784
                    echo "                                ";
                    $context["bandera"] = 55;
                    // line 785
                    echo "                            ";
                } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                    // line 786
                    echo "                                ";
                    $context["bandera"] = 56;
                    // line 787
                    echo "                            ";
                }
                // line 788
                echo "
                        ";
            }
            // line 790
            echo "
                        ";
            // line 791
            if ((0 !== twig_compare(($context["bandera"] ?? null), "") && 0 === twig_compare(($context["tipoBandera"] ?? null), "pais"))) {
                // line 792
                echo "                            ";
                $context["bandera"] = (($context["bandera"] ?? null) . "b");
                // line 793
                echo "                        ";
            }
            // line 794
            echo "                        <li>
                            <a href=\"";
            // line 795
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 795), "html", null, true);
            echo "\">
                                ";
            // line 796
            if (0 !== twig_compare(($context["bandera"] ?? null), "")) {
                // line 797
                echo "                                    <i style=\"margin-left: 10px; margin-right: -10px;\" class=\"";
                echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
                echo " flag";
                echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
                echo "\"></i>
                                ";
            }
            // line 799
            echo "                                ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 799), "html", null, true);
            echo "
                            </a>
                        </li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 803
        echo "                </ul>
            </li><!-- End section 1 -->


            <hr/>
            <li>
                <a href=\"#\">Mi Futbolme</a>
            </li>
            <li>
                <a href=\"#\">Contacto</a>
            </li>
        </ul>
    </nav>


</div>


<div id=\"contenedorGlobal\" class=\"container-fluid\">
    <div class=\"row\">
        <div class=\"col-12 col-sm-3 p-0 pr-2\">

            ";
        // line 826
        echo "            <div id=\"Futbolme_ATF_300x250\"></div>
            <script type=\"application/javascript\">
                var slmadshb = slmadshb || {};
                slmadshb.que = slmadshb.que || [];
                slmadshb.que.push(function() {
                    slmadshb.display(\"Futbolme_ATF_300x250\");
                });
            </script>

            ";
        // line 836
        echo "            <div id=\"themoney-11\">
            </div>

            <div class=\"d-none d-md-block\">

                <div class=\"col-12 text-center\" style=\"margin-bottom: 10px\">
                    <a style=\"color:white; background-color:black; font-size:13px; padding:4px; margin-top:2px;\" class=\"badge boldfont\" href=\"https://www.autodoc.es/services/mobile-app/\">www.AutoDoc.es</a>
                </div>

                ";
        // line 845
        $this->displayBlock('contenedorIzquierda', $context, $blocks);
        // line 848
        echo "            </div>

        </div>

        <div id=\"contenedorCentral\" class=\"col-12 col-sm-9 col-md-6 p-0\">

            ";
        // line 854
        $this->displayBlock('contenedorCentral', $context, $blocks);
        // line 857
        echo "
        </div>

        <div class=\"hidden-xs col-3  p-0 pl-2\">

            ";
        // line 863
        echo "            <div id=\"13939-2\"><script src=\"//ads.themoneytizer.com/s/gen.js?type=2\"></script><script src=\"//ads.themoneytizer.com/s/requestform.js?siteId=13939&formatId=2\" ></script></div>

            ";
        // line 866
        echo "            <div id=\"Futbolme_ATF2_300x250\"></div>
            <script type=\"application/javascript\">
                var slmadshb = slmadshb || {};
                slmadshb.que = slmadshb.que || [];
                slmadshb.que.push(function() {
                    slmadshb.display(\"Futbolme_ATF2_300x250\");
                });
            </script>

            <br />

            <div id=\"contenedorIconosDerecha\">

                <div class=\"col-12 text-center\" style=\"margin-bottom: 10px;\">
                    <a style=\"color:white; background-color:black; font-size:13px; padding:4px; margin-top:2px;\" class=\"badge boldfont\" href=\"https://www.recambioscoche.es/\">www.Recambioscoche.ES</a>
                </div>

                <div id=\"contenedorGooglePlay\">
                    <a href=\"https://play.google.com/store/apps/details?id=com.futbolme.futbolme\" target=\"_blank\" rel=\"nofollow\">
                        <img width=\"132\" height=\"40\" src=\"/static/img/google-play-badge.png\" alt=\"\">
                    </a>
                </div>

                ";
        // line 890
        echo "                <div id=\"contenedorTwitter\">
                    <a href=\"https://twitter.com/futbolme1\" class=\"botonTwitter\" target=\"_blank\" rel=\"nofollow\">
                        <img width=\"21\" height=\"19\" class=\"iconoTwitter\" src=\"/static/img/logo-twitter.svg\" alt=\"\">
                        <div class=\"textoTwitter\">
                            Síguenos en Twitter
                        </div>
                    </a>
                </div>

            </div>

            ";
        // line 906
        echo "
            <div class=\"row\"></div>

            ";
        // line 909
        $this->displayBlock('contenedorDerecha', $context, $blocks);
        // line 912
        echo "
            <div id=\"contenedorBannerFootersGrande\">
                <a href=\"https://www.footters.com/register?ref=futbolmeoficial\" target=\"_blank\" rel=\"nofollow\">
                    <img src=\"/static/img/banner-footers-grande.jpg\" alt=\"\">
                </a>
            </div>

        </div>
    </div>
</div>


    <div class=\"container-fluid menuDesplegable\" id=\"menuSegundaB\" style=\"max-width: 800px; right: 0px; margin-right: 0px;\">
        <div class=\"row\">
            <div class=\"col-12\">
                <h3 class=\"menuTorneosTituloListado\">Segunda B</h3>
                <ul class=\"menuTorneosUL row\">
                    ";
        // line 929
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "segundaB", [], "any", false, false, false, 929));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 930
            echo "                        ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 930);
            // line 931
            echo "                        ";
            if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                // line 932
                echo "                            ";
                $context["imagenComunidad"] = 55;
                // line 933
                echo "                        ";
            } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                // line 934
                echo "                            ";
                $context["imagenComunidad"] = 56;
                // line 935
                echo "                        ";
            }
            // line 936
            echo "                        <li class=\"col-6\">
                            <a href=\"";
            // line 937
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 937), "html", null, true);
            echo "\">
                                <i style=\"margin-right: 10px;\" class=\"comunidad flag";
            // line 938
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 938), "html", null, true);
            echo "\"></i>
                                ";
            // line 939
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 939), "html", null, true);
            echo "
                            </a>
                        </li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 943
        echo "                </ul>
            </div>
        </div>
    </div>

    <div class=\"container-fluid menuDesplegable\" id=\"menuTercera\" style=\"max-width: 800px; right: 0px; margin-right: 0px;\">
        <div class=\"row\">
            <div class=\"col-12\">
                <h3 class=\"menuTorneosTituloListado\">Tercera y Autonómicas</h3>
                <ul class=\"menuTorneosUL row\">
                    ";
        // line 953
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "tercera", [], "any", false, false, false, 953));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 954
            echo "                        ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 954);
            // line 955
            echo "                        ";
            if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                // line 956
                echo "                            ";
                $context["imagenComunidad"] = 55;
                // line 957
                echo "                        ";
            } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                // line 958
                echo "                            ";
                $context["imagenComunidad"] = 56;
                // line 959
                echo "                        ";
            }
            // line 960
            echo "                        <li class=\"col-6\">
                            <a href=\"";
            // line 961
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 961), "html", null, true);
            echo "\">
                                <i style=\"margin-right: 10px;\" class=\"comunidad flag";
            // line 962
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 962), "html", null, true);
            echo "\"></i>
                                ";
            // line 963
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 963), "html", null, true);
            echo "
                            </a>
                        </li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 967
        echo "                </ul>
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
        // line 1006
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "RFEF", [], "any", false, false, false, 1006));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 1007
            echo "                        ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 1007);
            // line 1008
            echo "                        ";
            if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                // line 1009
                echo "                            ";
                $context["imagenComunidad"] = 55;
                // line 1010
                echo "                        ";
            } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                // line 1011
                echo "                            ";
                $context["imagenComunidad"] = 56;
                // line 1012
                echo "                        ";
            }
            // line 1013
            echo "                        <li>
                            <a href=\"";
            // line 1014
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 1014), "html", null, true);
            echo "\">
                                <i style=\"margin-right: 10px;\" class=\"comunidad flag";
            // line 1015
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 1015), "html", null, true);
            echo "\"></i>
                                ";
            // line 1016
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1016), "html", null, true);
            echo "
                            </a>
                        </li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1020
        echo "                </ul>
            </div>

            <div class=\"col-3\">
                <h3 class=\"menuTorneosTituloListado\">
                    <div class=\"flagbox pais flag200b\" style=\"margin-top:-7px; margin-right:10px\"></div>
                    FIFA
                </h3>
                <ul class=\"menuTorneosUL\">
                    ";
        // line 1029
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "FIFA", [], "any", false, false, false, 1029));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 1030
            echo "                        <li>
                            <a href=\"";
            // line 1031
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 1031), "html", null, true);
            echo "\">
                                ";
            // line 1032
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1032), "html", null, true);
            echo "
                            </a>
                        </li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1036
        echo "                </ul>
            </div>

            <div class=\"col-3\">
                <h3 class=\"menuTorneosTituloListado\">
                    UEFA
                    <div class=\"flagbox pais flag199b\" style=\"margin-top:-7px; margin-right:10px\"></div>
                </h3>
                <ul class=\"menuTorneosUL\">
                    ";
        // line 1045
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "UEFA", [], "any", false, false, false, 1045));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 1046
            echo "                        <li>
                            <a href=\"";
            // line 1047
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 1047), "html", null, true);
            echo "\">
                                ";
            // line 1048
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1048), "html", null, true);
            echo "
                            </a>
                        </li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1052
        echo "                </ul>
            </div>


        </div>
    </div>

    <div class=\"container-fluid menuDesplegable\" id=\"menuEuropa\">

        <div class=\"row\">
            ";
        // line 1062
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "europa", [], "any", false, false, false, 1062));
        foreach ($context['_seq'] as $context["nombrePais"] => $context["torneos"]) {
            // line 1063
            echo "                ";
            $context["tipoBandera"] = "";
            // line 1064
            echo "                ";
            $context["bandera"] = "";
            // line 1065
            echo "                ";
            $context["imagenPais"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["torneos"], 0, [], "any", false, false, false, 1065), "imagenPais", [], "any", false, false, false, 1065);
            // line 1066
            echo "                ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["torneos"], 0, [], "any", false, false, false, 1066), "imagenComunidad", [], "any", false, false, false, 1066);
            // line 1067
            echo "                <div class=\"col-3\" style=\"margin-bottom: 20px;\">
                    <h3 class=\"menuTorneosTituloListado\">
                        ";
            // line 1069
            if (0 !== twig_compare(($context["imagenPais"] ?? null), 60)) {
                // line 1070
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 1071
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 1072
                echo "                        ";
            } elseif ((0 === twig_compare(($context["imagenPais"] ?? null), 60) && -1 === twig_compare(($context["imagenComunidad"] ?? null), 2))) {
                // line 1073
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 1074
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 1075
                echo "                        ";
            } elseif (1 === twig_compare(($context["imagenComunidad"] ?? null), 1)) {
                // line 1076
                echo "                            ";
                $context["bandera"] = ($context["imagenComunidad"] ?? null);
                // line 1077
                echo "                            ";
                $context["tipoBandera"] = "comunidad";
                // line 1078
                echo "
                            ";
                // line 1079
                if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                    // line 1080
                    echo "                                ";
                    $context["bandera"] = 55;
                    // line 1081
                    echo "                            ";
                } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                    // line 1082
                    echo "                                ";
                    $context["bandera"] = 56;
                    // line 1083
                    echo "                            ";
                }
                // line 1084
                echo "
                        ";
            }
            // line 1086
            echo "
                        ";
            // line 1087
            if (0 === twig_compare(($context["tipoBandera"] ?? null), "pais")) {
                // line 1088
                echo "                            ";
                $context["bandera"] = (($context["bandera"] ?? null) . "b");
                // line 1089
                echo "                        ";
            }
            // line 1090
            echo "
                        ";
            // line 1091
            echo twig_escape_filter($this->env, $context["nombrePais"], "html", null, true);
            echo "
                    </h3>
                    <ul class=\"menuTorneosUL\">
                        ";
            // line 1094
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["torneos"]);
            foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
                // line 1095
                echo "                            <li>
                                <a href=\"";
                // line 1096
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 1096), "html", null, true);
                echo "\">
                                    <i style=\"margin-right: 10px;\" class=\"";
                // line 1097
                echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
                echo " flag";
                echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
                echo "\"></i>
                                    ";
                // line 1098
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1098), "html", null, true);
                echo "
                                </a>
                            </li>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 1102
            echo "                    </ul>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['nombrePais'], $context['torneos'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1105
        echo "        </div>
    </div>

    <div class=\"container-fluid menuDesplegable\" id=\"menuJuvenil\">
        <div class=\"row\">
            <div class=\"col-12\">
                <h3 class=\"menuTorneosTituloListado\">Juvenil</h3>
                <ul class=\"menuTorneosUL row\">
                    ";
        // line 1113
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "juvenil", [], "any", false, false, false, 1113));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 1114
            echo "                        ";
            $context["tipoBandera"] = "";
            // line 1115
            echo "                        ";
            $context["bandera"] = "";
            // line 1116
            echo "                        ";
            $context["imagenPais"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenPais", [], "any", false, false, false, 1116);
            // line 1117
            echo "                        ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 1117);
            // line 1118
            echo "
                        ";
            // line 1119
            if (0 !== twig_compare(($context["imagenPais"] ?? null), 60)) {
                // line 1120
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 1121
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 1122
                echo "                        ";
            } elseif ((0 === twig_compare(($context["imagenPais"] ?? null), 60) && -1 === twig_compare(($context["imagenComunidad"] ?? null), 2))) {
                // line 1123
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 1124
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 1125
                echo "                        ";
            } elseif (1 === twig_compare(($context["imagenComunidad"] ?? null), 1)) {
                // line 1126
                echo "                            ";
                $context["bandera"] = ($context["imagenComunidad"] ?? null);
                // line 1127
                echo "                            ";
                $context["tipoBandera"] = "comunidad";
                // line 1128
                echo "
                            ";
                // line 1129
                if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                    // line 1130
                    echo "                                ";
                    $context["bandera"] = 55;
                    // line 1131
                    echo "                            ";
                } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                    // line 1132
                    echo "                                ";
                    $context["bandera"] = 56;
                    // line 1133
                    echo "                            ";
                }
                // line 1134
                echo "
                        ";
            }
            // line 1136
            echo "
                        ";
            // line 1137
            if ((0 !== twig_compare(($context["bandera"] ?? null), "") && 0 === twig_compare(($context["tipoBandera"] ?? null), "pais"))) {
                // line 1138
                echo "                            ";
                $context["bandera"] = (($context["bandera"] ?? null) . "b");
                // line 1139
                echo "                        ";
            }
            // line 1140
            echo "
                        <li class=\"col-3\">
                            <a href=\"";
            // line 1142
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 1142), "html", null, true);
            echo "\">
                                ";
            // line 1143
            if (0 !== twig_compare(($context["bandera"] ?? null), "")) {
                // line 1144
                echo "                                    <i style=\"margin-right: 10px;\" class=\"";
                echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
                echo " flag";
                echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
                echo "\"></i>
                                ";
            }
            // line 1146
            echo "                                ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1146), "html", null, true);
            echo "
                            </a>
                        </li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1150
        echo "                </ul>
            </div>
        </div>
    </div>

    <div class=\"container-fluid menuDesplegable\" id=\"menuFemenino\">
        <div class=\"row\">
            <div class=\"col-12\">
                <h3 class=\"menuTorneosTituloListado\">Femenino</h3>
                <ul class=\"menuTorneosUL row\">
                    ";
        // line 1160
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "femenino", [], "any", false, false, false, 1160));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 1161
            echo "                        ";
            $context["tipoBandera"] = "";
            // line 1162
            echo "                        ";
            $context["bandera"] = "";
            // line 1163
            echo "                        ";
            $context["imagenPais"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenPais", [], "any", false, false, false, 1163);
            // line 1164
            echo "                        ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 1164);
            // line 1165
            echo "
                        ";
            // line 1166
            if (0 !== twig_compare(($context["imagenPais"] ?? null), 60)) {
                // line 1167
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 1168
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 1169
                echo "                        ";
            } elseif ((0 === twig_compare(($context["imagenPais"] ?? null), 60) && -1 === twig_compare(($context["imagenComunidad"] ?? null), 2))) {
                // line 1170
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 1171
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 1172
                echo "                        ";
            } elseif (1 === twig_compare(($context["imagenComunidad"] ?? null), 1)) {
                // line 1173
                echo "                            ";
                $context["bandera"] = ($context["imagenComunidad"] ?? null);
                // line 1174
                echo "                            ";
                $context["tipoBandera"] = "comunidad";
                // line 1175
                echo "
                            ";
                // line 1176
                if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                    // line 1177
                    echo "                                ";
                    $context["bandera"] = 55;
                    // line 1178
                    echo "                            ";
                } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                    // line 1179
                    echo "                                ";
                    $context["bandera"] = 56;
                    // line 1180
                    echo "                            ";
                }
                // line 1181
                echo "
                        ";
            }
            // line 1183
            echo "
                        ";
            // line 1184
            if ((0 !== twig_compare(($context["bandera"] ?? null), "") && 0 === twig_compare(($context["tipoBandera"] ?? null), "pais"))) {
                // line 1185
                echo "                            ";
                $context["bandera"] = (($context["bandera"] ?? null) . "b");
                // line 1186
                echo "                        ";
            }
            // line 1187
            echo "
                        <li class=\"col-3\">
                            <a href=\"";
            // line 1189
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 1189), "html", null, true);
            echo "\">
                                ";
            // line 1190
            if (0 !== twig_compare(($context["bandera"] ?? null), "")) {
                // line 1191
                echo "                                    <i style=\"margin-right: 10px;\" class=\"";
                echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
                echo " flag";
                echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
                echo "\"></i>
                                ";
            }
            // line 1193
            echo "                                ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1193), "html", null, true);
            echo "
                            </a>
                        </li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1197
        echo "                </ul>
            </div>
        </div>
    </div>

    <div class=\"container-fluid menuDesplegable\" id=\"menuFutbolSala\">
        <div class=\"row\">
            <div class=\"col-12\">
                <h3 class=\"menuTorneosTituloListado\">Fútbol Sala</h3>
                <ul class=\"menuTorneosUL row\">
                    ";
        // line 1207
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), "sala", [], "any", false, false, false, 1207));
        foreach ($context['_seq'] as $context["_key"] => $context["torneo"]) {
            // line 1208
            echo "                        ";
            $context["tipoBandera"] = "";
            // line 1209
            echo "                        ";
            $context["bandera"] = "";
            // line 1210
            echo "                        ";
            $context["imagenPais"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenPais", [], "any", false, false, false, 1210);
            // line 1211
            echo "                        ";
            $context["imagenComunidad"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "imagenComunidad", [], "any", false, false, false, 1211);
            // line 1212
            echo "
                        ";
            // line 1213
            if (0 !== twig_compare(($context["imagenPais"] ?? null), 60)) {
                // line 1214
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 1215
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 1216
                echo "                        ";
            } elseif ((0 === twig_compare(($context["imagenPais"] ?? null), 60) && -1 === twig_compare(($context["imagenComunidad"] ?? null), 2))) {
                // line 1217
                echo "                            ";
                $context["bandera"] = ($context["imagenPais"] ?? null);
                // line 1218
                echo "                            ";
                $context["tipoBandera"] = "pais";
                // line 1219
                echo "                        ";
            } elseif (1 === twig_compare(($context["imagenComunidad"] ?? null), 1)) {
                // line 1220
                echo "                            ";
                $context["bandera"] = ($context["imagenComunidad"] ?? null);
                // line 1221
                echo "                            ";
                $context["tipoBandera"] = "comunidad";
                // line 1222
                echo "
                            ";
                // line 1223
                if (0 === twig_compare(($context["imagenComunidad"] ?? null), 10)) {
                    // line 1224
                    echo "                                ";
                    $context["bandera"] = 55;
                    // line 1225
                    echo "                            ";
                } elseif (0 === twig_compare(($context["imagenComunidad"] ?? null), 11)) {
                    // line 1226
                    echo "                                ";
                    $context["bandera"] = 56;
                    // line 1227
                    echo "                            ";
                }
                // line 1228
                echo "
                        ";
            }
            // line 1230
            echo "
                        ";
            // line 1231
            if ((0 !== twig_compare(($context["bandera"] ?? null), "") && 0 === twig_compare(($context["tipoBandera"] ?? null), "pais"))) {
                // line 1232
                echo "                            ";
                $context["bandera"] = (($context["bandera"] ?? null) . "b");
                // line 1233
                echo "                        ";
            }
            // line 1234
            echo "
                        <li class=\"col-3\">
                            <a href=\"";
            // line 1236
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "ruta", [], "any", false, false, false, 1236), "html", null, true);
            echo "\">
                                ";
            // line 1237
            if (0 !== twig_compare(($context["bandera"] ?? null), "")) {
                // line 1238
                echo "                                    <i style=\"margin-right: 10px;\" class=\"";
                echo twig_escape_filter($this->env, ($context["tipoBandera"] ?? null), "html", null, true);
                echo " flag";
                echo twig_escape_filter($this->env, ($context["bandera"] ?? null), "html", null, true);
                echo "\"></i>
                                ";
            }
            // line 1240
            echo "                                ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "nombre", [], "any", false, false, false, 1240), "html", null, true);
            echo "
                            </a>
                        </li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['torneo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1244
        echo "                </ul>
            </div>
        </div>
    </div>

    ";
        // line 1266
        echo "</body>
</html>";
    }

    // line 18
    public function block_bloqueCss($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 19
        echo "
    ";
    }

    // line 34
    public function block_bloqueJs($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 35
        echo "
    ";
    }

    // line 845
    public function block_contenedorIzquierda($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 846
        echo "
                ";
    }

    // line 854
    public function block_contenedorCentral($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 855
        echo "
            ";
    }

    // line 909
    public function block_contenedorDerecha($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 910
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
        return array (  2261 => 910,  2257 => 909,  2252 => 855,  2248 => 854,  2243 => 846,  2239 => 845,  2234 => 35,  2230 => 34,  2225 => 19,  2221 => 18,  2216 => 1266,  2209 => 1244,  2198 => 1240,  2190 => 1238,  2188 => 1237,  2184 => 1236,  2180 => 1234,  2177 => 1233,  2174 => 1232,  2172 => 1231,  2169 => 1230,  2165 => 1228,  2162 => 1227,  2159 => 1226,  2156 => 1225,  2153 => 1224,  2151 => 1223,  2148 => 1222,  2145 => 1221,  2142 => 1220,  2139 => 1219,  2136 => 1218,  2133 => 1217,  2130 => 1216,  2127 => 1215,  2124 => 1214,  2122 => 1213,  2119 => 1212,  2116 => 1211,  2113 => 1210,  2110 => 1209,  2107 => 1208,  2103 => 1207,  2091 => 1197,  2080 => 1193,  2072 => 1191,  2070 => 1190,  2066 => 1189,  2062 => 1187,  2059 => 1186,  2056 => 1185,  2054 => 1184,  2051 => 1183,  2047 => 1181,  2044 => 1180,  2041 => 1179,  2038 => 1178,  2035 => 1177,  2033 => 1176,  2030 => 1175,  2027 => 1174,  2024 => 1173,  2021 => 1172,  2018 => 1171,  2015 => 1170,  2012 => 1169,  2009 => 1168,  2006 => 1167,  2004 => 1166,  2001 => 1165,  1998 => 1164,  1995 => 1163,  1992 => 1162,  1989 => 1161,  1985 => 1160,  1973 => 1150,  1962 => 1146,  1954 => 1144,  1952 => 1143,  1948 => 1142,  1944 => 1140,  1941 => 1139,  1938 => 1138,  1936 => 1137,  1933 => 1136,  1929 => 1134,  1926 => 1133,  1923 => 1132,  1920 => 1131,  1917 => 1130,  1915 => 1129,  1912 => 1128,  1909 => 1127,  1906 => 1126,  1903 => 1125,  1900 => 1124,  1897 => 1123,  1894 => 1122,  1891 => 1121,  1888 => 1120,  1886 => 1119,  1883 => 1118,  1880 => 1117,  1877 => 1116,  1874 => 1115,  1871 => 1114,  1867 => 1113,  1857 => 1105,  1849 => 1102,  1839 => 1098,  1833 => 1097,  1829 => 1096,  1826 => 1095,  1822 => 1094,  1816 => 1091,  1813 => 1090,  1810 => 1089,  1807 => 1088,  1805 => 1087,  1802 => 1086,  1798 => 1084,  1795 => 1083,  1792 => 1082,  1789 => 1081,  1786 => 1080,  1784 => 1079,  1781 => 1078,  1778 => 1077,  1775 => 1076,  1772 => 1075,  1769 => 1074,  1766 => 1073,  1763 => 1072,  1760 => 1071,  1757 => 1070,  1755 => 1069,  1751 => 1067,  1748 => 1066,  1745 => 1065,  1742 => 1064,  1739 => 1063,  1735 => 1062,  1723 => 1052,  1713 => 1048,  1709 => 1047,  1706 => 1046,  1702 => 1045,  1691 => 1036,  1681 => 1032,  1677 => 1031,  1674 => 1030,  1670 => 1029,  1659 => 1020,  1649 => 1016,  1645 => 1015,  1641 => 1014,  1638 => 1013,  1635 => 1012,  1632 => 1011,  1629 => 1010,  1626 => 1009,  1623 => 1008,  1620 => 1007,  1616 => 1006,  1575 => 967,  1565 => 963,  1561 => 962,  1557 => 961,  1554 => 960,  1551 => 959,  1548 => 958,  1545 => 957,  1542 => 956,  1539 => 955,  1536 => 954,  1532 => 953,  1520 => 943,  1510 => 939,  1506 => 938,  1502 => 937,  1499 => 936,  1496 => 935,  1493 => 934,  1490 => 933,  1487 => 932,  1484 => 931,  1481 => 930,  1477 => 929,  1458 => 912,  1456 => 909,  1451 => 906,  1438 => 890,  1413 => 866,  1409 => 863,  1402 => 857,  1400 => 854,  1392 => 848,  1390 => 845,  1379 => 836,  1368 => 826,  1344 => 803,  1333 => 799,  1325 => 797,  1323 => 796,  1319 => 795,  1316 => 794,  1313 => 793,  1310 => 792,  1308 => 791,  1305 => 790,  1301 => 788,  1298 => 787,  1295 => 786,  1292 => 785,  1289 => 784,  1287 => 783,  1284 => 782,  1281 => 781,  1278 => 780,  1275 => 779,  1272 => 778,  1269 => 777,  1266 => 776,  1263 => 775,  1260 => 774,  1258 => 773,  1255 => 772,  1252 => 771,  1249 => 770,  1246 => 769,  1243 => 768,  1239 => 767,  1222 => 752,  1211 => 748,  1203 => 746,  1201 => 745,  1197 => 744,  1194 => 743,  1191 => 742,  1188 => 741,  1186 => 740,  1183 => 739,  1179 => 737,  1176 => 736,  1173 => 735,  1170 => 734,  1167 => 733,  1165 => 732,  1162 => 731,  1159 => 730,  1156 => 729,  1153 => 728,  1150 => 727,  1147 => 726,  1144 => 725,  1141 => 724,  1138 => 723,  1136 => 722,  1133 => 721,  1130 => 720,  1127 => 719,  1124 => 718,  1121 => 717,  1117 => 716,  1099 => 700,  1088 => 696,  1080 => 694,  1078 => 693,  1074 => 692,  1071 => 691,  1068 => 690,  1065 => 689,  1063 => 688,  1060 => 687,  1056 => 685,  1053 => 684,  1050 => 683,  1047 => 682,  1044 => 681,  1042 => 680,  1039 => 679,  1036 => 678,  1033 => 677,  1030 => 676,  1027 => 675,  1024 => 674,  1021 => 673,  1018 => 672,  1015 => 671,  1013 => 670,  1010 => 669,  1007 => 668,  1004 => 667,  1001 => 666,  998 => 665,  994 => 664,  976 => 648,  968 => 645,  958 => 641,  954 => 640,  951 => 639,  947 => 638,  936 => 630,  930 => 629,  927 => 628,  924 => 627,  921 => 626,  919 => 625,  916 => 624,  912 => 622,  909 => 621,  906 => 620,  903 => 619,  900 => 618,  898 => 617,  895 => 616,  892 => 615,  889 => 614,  886 => 613,  883 => 612,  880 => 611,  877 => 610,  874 => 609,  871 => 608,  869 => 607,  865 => 605,  862 => 604,  859 => 603,  856 => 602,  853 => 601,  849 => 600,  829 => 582,  819 => 578,  815 => 577,  812 => 576,  808 => 575,  794 => 563,  784 => 559,  780 => 558,  777 => 557,  773 => 556,  759 => 544,  749 => 540,  745 => 539,  741 => 538,  738 => 537,  735 => 536,  732 => 535,  729 => 534,  726 => 533,  723 => 532,  720 => 531,  716 => 530,  662 => 478,  653 => 475,  649 => 474,  645 => 473,  642 => 472,  639 => 471,  636 => 470,  633 => 469,  630 => 468,  627 => 467,  624 => 466,  619 => 465,  604 => 432,  594 => 428,  590 => 427,  587 => 426,  583 => 425,  497 => 342,  493 => 341,  482 => 333,  473 => 327,  465 => 322,  461 => 321,  454 => 317,  446 => 311,  444 => 310,  438 => 309,  167 => 40,  163 => 37,  161 => 34,  154 => 32,  148 => 31,  142 => 30,  138 => 29,  132 => 28,  128 => 27,  124 => 26,  119 => 24,  115 => 23,  111 => 22,  108 => 21,  106 => 18,  102 => 17,  96 => 16,  90 => 15,  84 => 14,  80 => 13,  71 => 11,  63 => 10,  55 => 9,  50 => 6,  48 => 5,  42 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "base.html.twig", "/home/futbolme/domains/futbolme.com/public_html/v2/templates/base.html.twig");
    }
}
