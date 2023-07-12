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

/* publicidad/publiGestion.html.twig */
class __TwigTemplate_7d3648824fa5ccc5beb8e181c4f46b8e03360c5315fc308d16622cd66072aa70 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        $context["adsense"] = 0;
        // line 2
        $context["clickio"] = 0;
        // line 3
        $context["themoneytizer"] = 0;
        // line 4
        $context["akcelo"] = 0;
        // line 5
        $context["amazon"] = 0;
        // line 6
        $context["adcash"] = 0;
        // line 7
        echo "

";
        // line 9
        if (0 === twig_compare(($context["adsense"] ?? null), 1)) {
            // line 10
            echo "    ";
            $this->loadTemplate("publicidad/anunciantes/cAdsense.html.twig", "publicidad/publiGestion.html.twig", 10)->display($context);
        }
        // line 12
        echo "
";
        // line 13
        if (0 === twig_compare(($context["clickio"] ?? null), 1)) {
            // line 14
            echo "    ";
            $this->loadTemplate("publicidad/anunciantes/cClickio.html.twig", "publicidad/publiGestion.html.twig", 14)->display($context);
        }
        // line 16
        echo "
";
        // line 17
        if (0 === twig_compare(($context["themoneytizer"] ?? null), 1)) {
            // line 18
            echo "    ";
            $this->loadTemplate("publicidad/anunciantes/cThemoneytizer.html.twig", "publicidad/publiGestion.html.twig", 18)->display($context);
        }
        // line 20
        echo "
";
        // line 21
        if (0 === twig_compare(($context["akcelo"] ?? null), 1)) {
            // line 22
            echo "    ";
            $this->loadTemplate("publicidad/anunciantes/cAkcelo.html.twig", "publicidad/publiGestion.html.twig", 22)->display($context);
        }
        // line 24
        echo "
";
        // line 25
        if (0 === twig_compare(($context["amazon"] ?? null), 1)) {
            // line 26
            echo "    ";
            $this->loadTemplate("publicidad/anunciantes/cAmazon.html.twig", "publicidad/publiGestion.html.twig", 26)->display($context);
        }
        // line 28
        echo "
";
        // line 29
        if (0 === twig_compare(($context["adcash"] ?? null), 1)) {
            // line 30
            echo "    ";
            $this->loadTemplate("publicidad/anunciantes/cAdcash.html.twig", "publicidad/publiGestion.html.twig", 30)->display($context);
        }
        // line 32
        echo "

";
        // line 34
        if ((isset($context["espacio"]) || array_key_exists("espacio", $context))) {
            // line 35
            echo "
    ";
            // line 37
            echo "
    ";
            // line 38
            if (0 === twig_compare(($context["espacio"] ?? null), "enHead")) {
                // line 39
                echo "
    ";
            } elseif (0 === twig_compare(            // line 40
($context["espacio"] ?? null), "enHeadiOS")) {
                // line 41
                echo "
    ";
            } elseif (0 === twig_compare(            // line 42
($context["espacio"] ?? null), "despuesDeAbrirBody")) {
                // line 43
                echo "
    ";
            } elseif (0 === twig_compare(            // line 44
($context["espacio"] ?? null), "despuesDeAbrirBodyMobile")) {
                // line 45
                echo "
    ";
            } elseif (0 === twig_compare(            // line 46
($context["espacio"] ?? null), "cabecera")) {
                // line 47
                echo "
    ";
            } elseif (0 === twig_compare(            // line 48
($context["espacio"] ?? null), "contenedorCentral")) {
                // line 49
                echo "
    ";
            } elseif (0 === twig_compare(            // line 50
($context["espacio"] ?? null), "contenedorCentralMobile")) {
                // line 51
                echo "
    ";
            } elseif (0 === twig_compare(            // line 52
($context["espacio"] ?? null), "contenedorCentraliOS")) {
                // line 53
                echo "
    ";
            } elseif (0 === twig_compare(            // line 54
($context["espacio"] ?? null), "primerLateralIzquierdo")) {
                // line 55
                echo "
    ";
            } elseif (0 === twig_compare(            // line 56
($context["espacio"] ?? null), "primerLateralIzquierdoPortada")) {
                // line 57
                echo "
    ";
            } elseif (0 === twig_compare(            // line 58
($context["espacio"] ?? null), "segundoLateralIzquierdo")) {
                // line 59
                echo "       
    ";
            } elseif (0 === twig_compare(            // line 60
($context["espacio"] ?? null), "primerLateralDerecho")) {
                // line 61
                echo "
    ";
            } elseif (0 === twig_compare(            // line 62
($context["espacio"] ?? null), "primerLateralDerechoPortada")) {
                // line 63
                echo "       
    ";
            } elseif (0 === twig_compare(            // line 64
($context["espacio"] ?? null), "segundoLateralDerecho")) {
                // line 65
                echo "       
    ";
            } elseif (0 === twig_compare(            // line 66
($context["espacio"] ?? null), "cabeceraDirectos")) {
                // line 67
                echo "
    ";
            } elseif (0 === twig_compare(            // line 68
($context["espacio"] ?? null), "cabeceraDirectosiOS")) {
                // line 69
                echo "
    ";
            } elseif (0 === twig_compare(            // line 70
($context["espacio"] ?? null), "entreDirectos")) {
                // line 71
                echo "
    ";
            } elseif (0 === twig_compare(            // line 72
($context["espacio"] ?? null), "cabeceraPartidos")) {
                // line 73
                echo "
    ";
            } elseif (0 === twig_compare(            // line 74
($context["espacio"] ?? null), "cabeceraPartidosiOS")) {
                // line 75
                echo "
    ";
            } elseif (0 === twig_compare(            // line 76
($context["espacio"] ?? null), "entrePartidos")) {
                // line 77
                echo "
    ";
            } elseif (0 === twig_compare(            // line 78
($context["espacio"] ?? null), "cabeceraTwitter")) {
                // line 79
                echo "         
    ";
            } elseif (0 === twig_compare(            // line 80
($context["espacio"] ?? null), "entreTwitter")) {
                // line 81
                echo "
    ";
            } elseif (0 === twig_compare(            // line 82
($context["espacio"] ?? null), "temporadaJornada")) {
                // line 83
                echo "
    ";
            } elseif (0 === twig_compare(            // line 84
($context["espacio"] ?? null), "temporadaJornadaMobile")) {
                // line 85
                echo "
    ";
            } elseif (0 === twig_compare(            // line 86
($context["espacio"] ?? null), "temporadaClasificacion")) {
                // line 87
                echo "
    ";
            } elseif (0 === twig_compare(            // line 88
($context["espacio"] ?? null), "temporadaClasificacionMobile")) {
                // line 89
                echo "
    ";
            } elseif (0 === twig_compare(            // line 90
($context["espacio"] ?? null), "equipoCabecera")) {
                // line 91
                echo "
    ";
            } elseif (0 === twig_compare(            // line 92
($context["espacio"] ?? null), "equipoCabeceraMobile")) {
                // line 93
                echo "
    ";
            } elseif (0 === twig_compare(            // line 94
($context["espacio"] ?? null), "equipoContenido")) {
                // line 95
                echo "
    ";
            } elseif (0 === twig_compare(            // line 96
($context["espacio"] ?? null), "equipoContenidoMobile")) {
                // line 97
                echo "
    ";
            } elseif (0 === twig_compare(            // line 98
($context["espacio"] ?? null), "partidoCabecera")) {
                // line 99
                echo "
    ";
            } elseif (0 === twig_compare(            // line 100
($context["espacio"] ?? null), "partidoCabeceraMobile")) {
                // line 101
                echo "
    ";
            } elseif (0 === twig_compare(            // line 102
($context["espacio"] ?? null), "partidoContenido")) {
                // line 103
                echo "
    ";
            } elseif (0 === twig_compare(            // line 104
($context["espacio"] ?? null), "partidoContenidoMobile")) {
                // line 105
                echo "
    ";
            } elseif (0 === twig_compare(            // line 106
($context["espacio"] ?? null), "jugadorCabecera")) {
                // line 107
                echo "
    ";
            } elseif (0 === twig_compare(            // line 108
($context["espacio"] ?? null), "jugadorCabeceraMobile")) {
                // line 109
                echo "
    ";
            } elseif (0 === twig_compare(            // line 110
($context["espacio"] ?? null), "jugadorContenido")) {
                // line 111
                echo "
    ";
            } elseif (0 === twig_compare(            // line 112
($context["espacio"] ?? null), "jugadorContenidoMobile")) {
                // line 113
                echo "
    ";
            } elseif (0 === twig_compare(            // line 114
($context["espacio"] ?? null), "pie")) {
                // line 115
                echo "
    ";
            } elseif (0 === twig_compare(            // line 116
($context["espacio"] ?? null), "pieMobile")) {
                // line 117
                echo "
    ";
            } elseif (0 === twig_compare(            // line 118
($context["espacio"] ?? null), "pieLateralIzquierdo")) {
                // line 119
                echo "
    ";
            } elseif (0 === twig_compare(            // line 120
($context["espacio"] ?? null), "pieLateralDerecho")) {
                // line 121
                echo "
    ";
            }
            // line 123
            echo "

";
        }
    }

    public function getTemplateName()
    {
        return "publicidad/publiGestion.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  327 => 123,  323 => 121,  321 => 120,  318 => 119,  316 => 118,  313 => 117,  311 => 116,  308 => 115,  306 => 114,  303 => 113,  301 => 112,  298 => 111,  296 => 110,  293 => 109,  291 => 108,  288 => 107,  286 => 106,  283 => 105,  281 => 104,  278 => 103,  276 => 102,  273 => 101,  271 => 100,  268 => 99,  266 => 98,  263 => 97,  261 => 96,  258 => 95,  256 => 94,  253 => 93,  251 => 92,  248 => 91,  246 => 90,  243 => 89,  241 => 88,  238 => 87,  236 => 86,  233 => 85,  231 => 84,  228 => 83,  226 => 82,  223 => 81,  221 => 80,  218 => 79,  216 => 78,  213 => 77,  211 => 76,  208 => 75,  206 => 74,  203 => 73,  201 => 72,  198 => 71,  196 => 70,  193 => 69,  191 => 68,  188 => 67,  186 => 66,  183 => 65,  181 => 64,  178 => 63,  176 => 62,  173 => 61,  171 => 60,  168 => 59,  166 => 58,  163 => 57,  161 => 56,  158 => 55,  156 => 54,  153 => 53,  151 => 52,  148 => 51,  146 => 50,  143 => 49,  141 => 48,  138 => 47,  136 => 46,  133 => 45,  131 => 44,  128 => 43,  126 => 42,  123 => 41,  121 => 40,  118 => 39,  116 => 38,  113 => 37,  110 => 35,  108 => 34,  104 => 32,  100 => 30,  98 => 29,  95 => 28,  91 => 26,  89 => 25,  86 => 24,  82 => 22,  80 => 21,  77 => 20,  73 => 18,  71 => 17,  68 => 16,  64 => 14,  62 => 13,  59 => 12,  55 => 10,  53 => 9,  49 => 7,  47 => 6,  45 => 5,  43 => 4,  41 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "publicidad/publiGestion.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.eu/v2/templates/publicidad/publiGestion.html.twig");
    }
}
