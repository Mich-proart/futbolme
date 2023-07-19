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
class __TwigTemplate_b4867a2eb141192985358c498091db329fefe772cc730ab3fa492cb0744b51ec extends Template
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
        $context["themoneytizer"] = 1;
        // line 4
        $context["akcelo"] = 1;
        // line 5
        echo "
";
        // line 6
        if (0 === twig_compare(($context["adsense"] ?? null), 1)) {
            // line 7
            echo "    ";
            $this->loadTemplate("publicidad/anunciantes/cAdsense.html.twig", "publicidad/publiGestion.html.twig", 7)->display($context);
        }
        // line 9
        echo "
";
        // line 10
        if (0 === twig_compare(($context["clickio"] ?? null), 1)) {
            // line 11
            echo "    ";
            $this->loadTemplate("publicidad/anunciantes/cClickio.html.twig", "publicidad/publiGestion.html.twig", 11)->display($context);
        }
        // line 13
        echo "
";
        // line 14
        if (0 === twig_compare(($context["themoneytizer"] ?? null), 1)) {
            // line 15
            echo "    ";
            $this->loadTemplate("publicidad/anunciantes/cThemoneytizer.html.twig", "publicidad/publiGestion.html.twig", 15)->display($context);
        }
        // line 17
        echo "
";
        // line 18
        if (0 === twig_compare(($context["akcelo"] ?? null), 1)) {
            // line 19
            echo "    ";
            $this->loadTemplate("publicidad/anunciantes/cAkcelo.html.twig", "publicidad/publiGestion.html.twig", 19)->display($context);
        }
        // line 21
        echo "

";
        // line 23
        if ((isset($context["espacio"]) || array_key_exists("espacio", $context))) {
            // line 24
            echo "
    <p>Este es el espacio ";
            // line 25
            echo twig_escape_filter($this->env, ($context["espacio"] ?? null), "html", null, true);
            echo "</p>

    ";
            // line 27
            if (0 === twig_compare(($context["espacio"] ?? null), "enHead")) {
                // line 28
                echo "         ";
                $this->loadTemplate("publicidad/codigos/theMoney-13939-11.html.twig", "publicidad/publiGestion.html.twig", 28)->display($context);
                // line 29
                echo "         ";
                $this->loadTemplate("publicidad/codigos/theMoney-13939-6.html.twig", "publicidad/publiGestion.html.twig", 29)->display($context);
                // line 30
                echo "         ";
                $this->loadTemplate("publicidad/codigos/theMoney-13939-11.html.twig", "publicidad/publiGestion.html.twig", 30)->display($context);
                // line 31
                echo "    ";
            } elseif (0 === twig_compare(($context["espacio"] ?? null), "cabecera")) {
                // line 32
                echo "
    ";
            } elseif (0 === twig_compare(            // line 33
($context["espacio"] ?? null), "primerLateralIzquierdo")) {
                // line 34
                echo "
    ";
            } elseif (0 === twig_compare(            // line 35
($context["espacio"] ?? null), "segundoLateralIzquierdo")) {
                // line 36
                echo "
    ";
            } elseif (0 === twig_compare(            // line 37
($context["espacio"] ?? null), "primerLateralDerecho")) {
                // line 38
                echo "
    ";
            } elseif (0 === twig_compare(            // line 39
($context["espacio"] ?? null), "segundoLateralDerecho")) {
                // line 40
                echo "
    ";
            } elseif (0 === twig_compare(            // line 41
($context["espacio"] ?? null), "cabeceraDirectos")) {
                // line 42
                echo "
    ";
            } elseif (0 === twig_compare(            // line 43
($context["espacio"] ?? null), "entreDirectos")) {
                // line 44
                echo "
    ";
            } elseif (0 === twig_compare(            // line 45
($context["espacio"] ?? null), "cabeceraPartidos")) {
                // line 46
                echo "
    ";
            } elseif (0 === twig_compare(            // line 47
($context["espacio"] ?? null), "entrePartidos")) {
                // line 48
                echo "
    ";
            } elseif (0 === twig_compare(            // line 49
($context["espacio"] ?? null), "cabeceraTwitter")) {
                // line 50
                echo "
    ";
            } elseif (0 === twig_compare(            // line 51
($context["espacio"] ?? null), "entreTwitter")) {
                // line 52
                echo "
    ";
            } elseif (0 === twig_compare(            // line 53
($context["espacio"] ?? null), "temporadaJornada")) {
                // line 54
                echo "
    ";
            } elseif (0 === twig_compare(            // line 55
($context["espacio"] ?? null), "temporadaClasificacion")) {
                // line 56
                echo "
    ";
            } elseif (0 === twig_compare(            // line 57
($context["espacio"] ?? null), "equipoCabecera")) {
                // line 58
                echo "
    ";
            } elseif (0 === twig_compare(            // line 59
($context["espacio"] ?? null), "equipoContenido")) {
                // line 60
                echo "
    ";
            } elseif (0 === twig_compare(            // line 61
($context["espacio"] ?? null), "partidoCabecera")) {
                // line 62
                echo "
    ";
            } elseif (0 === twig_compare(            // line 63
($context["espacio"] ?? null), "partidoContenido")) {
                // line 64
                echo "
    ";
            } elseif (0 === twig_compare(            // line 65
($context["espacio"] ?? null), "jugadorCabecera")) {
                // line 66
                echo "
    ";
            } elseif (0 === twig_compare(            // line 67
($context["espacio"] ?? null), "jugadorContenido")) {
                // line 68
                echo "
    ";
            } elseif (0 === twig_compare(            // line 69
($context["espacio"] ?? null), "pie")) {
                // line 70
                echo "        ";
                $this->loadTemplate("publicidad/codigos/theMoney-13939-5.html.twig", "publicidad/publiGestion.html.twig", 70)->display($context);
                // line 71
                echo "    ";
            }
            // line 72
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
        return array (  210 => 72,  207 => 71,  204 => 70,  202 => 69,  199 => 68,  197 => 67,  194 => 66,  192 => 65,  189 => 64,  187 => 63,  184 => 62,  182 => 61,  179 => 60,  177 => 59,  174 => 58,  172 => 57,  169 => 56,  167 => 55,  164 => 54,  162 => 53,  159 => 52,  157 => 51,  154 => 50,  152 => 49,  149 => 48,  147 => 47,  144 => 46,  142 => 45,  139 => 44,  137 => 43,  134 => 42,  132 => 41,  129 => 40,  127 => 39,  124 => 38,  122 => 37,  119 => 36,  117 => 35,  114 => 34,  112 => 33,  109 => 32,  106 => 31,  103 => 30,  100 => 29,  97 => 28,  95 => 27,  90 => 25,  87 => 24,  85 => 23,  81 => 21,  77 => 19,  75 => 18,  72 => 17,  68 => 15,  66 => 14,  63 => 13,  59 => 11,  57 => 10,  54 => 9,  50 => 7,  48 => 6,  45 => 5,  43 => 4,  41 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "publicidad/publiGestion.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/publicidad/publiGestion.html.twig");
    }
}
