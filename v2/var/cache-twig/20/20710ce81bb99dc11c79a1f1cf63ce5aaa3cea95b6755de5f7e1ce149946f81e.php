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
class __TwigTemplate_d1451caba863e05e9f599241285faf7e7703d00f42a930d07c23d19c87f70edf extends Template
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
        // line 7
        echo "
";
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
        return array (  263 => 123,  259 => 121,  257 => 120,  254 => 119,  252 => 118,  249 => 117,  247 => 116,  244 => 115,  242 => 114,  239 => 113,  237 => 112,  234 => 111,  232 => 110,  229 => 109,  227 => 108,  224 => 107,  222 => 106,  219 => 105,  217 => 104,  214 => 103,  212 => 102,  209 => 101,  207 => 100,  204 => 99,  202 => 98,  199 => 97,  197 => 96,  194 => 95,  192 => 94,  189 => 93,  187 => 92,  184 => 91,  182 => 90,  179 => 89,  177 => 88,  174 => 87,  172 => 86,  169 => 85,  167 => 84,  164 => 83,  162 => 82,  159 => 81,  157 => 80,  154 => 79,  152 => 78,  149 => 77,  147 => 76,  144 => 75,  142 => 74,  139 => 73,  137 => 72,  134 => 71,  132 => 70,  129 => 69,  127 => 68,  124 => 67,  122 => 66,  119 => 65,  117 => 64,  114 => 63,  112 => 62,  109 => 61,  107 => 60,  104 => 59,  102 => 58,  99 => 57,  97 => 56,  94 => 55,  92 => 54,  89 => 53,  87 => 52,  84 => 51,  82 => 50,  79 => 49,  77 => 48,  74 => 47,  72 => 46,  69 => 45,  67 => 44,  64 => 43,  62 => 42,  59 => 41,  57 => 40,  54 => 39,  52 => 38,  49 => 37,  46 => 35,  44 => 34,  40 => 32,  37 => 7,);
    }

    public function getSourceContext()
    {
        return new Source("", "publicidad/publiGestion.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/publicidad/publiGestion.html.twig");
    }
}
