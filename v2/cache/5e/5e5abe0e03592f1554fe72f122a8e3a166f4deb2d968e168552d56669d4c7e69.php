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

/* publicidad/anunciantes/cAkcelo.html.twig */
class __TwigTemplate_8096e7ea491d668064ff2d08b15232eb4baf7befa4a49ee65817984b866d8a87 extends Template
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
        if ((isset($context["espacio"]) || array_key_exists("espacio", $context))) {
            // line 2
            echo "
    ";
            // line 3
            if (0 === twig_compare(($context["espacio"] ?? null), "enHead")) {
                // line 4
                echo "        ";
                $this->loadTemplate("publicidad/codigos/akc-Prebid.html.twig", "publicidad/anunciantes/cAkcelo.html.twig", 4)->display($context);
                // line 5
                echo "    ";
            } elseif (0 === twig_compare(($context["espacio"] ?? null), "cabecera")) {
                // line 6
                echo "
    ";
            } elseif (0 === twig_compare(            // line 7
($context["espacio"] ?? null), "primerLateralIzquierdo")) {
                // line 8
                echo "
    ";
            } elseif (0 === twig_compare(            // line 9
($context["espacio"] ?? null), "segundoLateralIzquierdo")) {
                // line 10
                echo "        ";
                $this->loadTemplate("publicidad/codigos/akc-ATF-300-250.html.twig", "publicidad/anunciantes/cAkcelo.html.twig", 10)->display($context);
                // line 11
                echo "    ";
            } elseif (0 === twig_compare(($context["espacio"] ?? null), "primerLateralDerecho")) {
                // line 12
                echo "
    ";
            } elseif (0 === twig_compare(            // line 13
($context["espacio"] ?? null), "segundoLateralDerecho")) {
                // line 14
                echo "        ";
                $this->loadTemplate("publicidad/codigos/akc-ATF2-300-250.html.twig", "publicidad/anunciantes/cAkcelo.html.twig", 14)->display($context);
                // line 15
                echo "    ";
            } elseif (0 === twig_compare(($context["espacio"] ?? null), "cabeceraDirectos")) {
                // line 16
                echo "
    ";
            } elseif (0 === twig_compare(            // line 17
($context["espacio"] ?? null), "entreDirectos")) {
                // line 18
                echo "        ";
                $this->loadTemplate("publicidad/codigos/akc-ATF-300-250.html.twig", "publicidad/anunciantes/cAkcelo.html.twig", 18)->display($context);
                // line 19
                echo "    ";
            } elseif (0 === twig_compare(($context["espacio"] ?? null), "cabeceraPartidos")) {
                // line 20
                echo "
    ";
            } elseif (0 === twig_compare(            // line 21
($context["espacio"] ?? null), "entrePartidos")) {
                // line 22
                echo "        ";
                $this->loadTemplate("publicidad/codigos/akc-ATF-300-250.html.twig", "publicidad/anunciantes/cAkcelo.html.twig", 22)->display($context);
                // line 23
                echo "    ";
            } elseif (0 === twig_compare(($context["espacio"] ?? null), "cabeceraTwitter")) {
                // line 24
                echo "
    ";
            } elseif (0 === twig_compare(            // line 25
($context["espacio"] ?? null), "entreTwitter")) {
                // line 26
                echo "        ";
                $this->loadTemplate("publicidad/codigos/akc-ATF-300-250.html.twig", "publicidad/anunciantes/cAkcelo.html.twig", 26)->display($context);
                // line 27
                echo "    ";
            } elseif (0 === twig_compare(($context["espacio"] ?? null), "temporadaJornada")) {
                // line 28
                echo "
    ";
            } elseif (0 === twig_compare(            // line 29
($context["espacio"] ?? null), "temporadaClasificacion")) {
                // line 30
                echo "        ";
                $this->loadTemplate("publicidad/codigos/akc-ATF-300-250.html.twig", "publicidad/anunciantes/cAkcelo.html.twig", 30)->display($context);
                // line 31
                echo "    ";
            } elseif (0 === twig_compare(($context["espacio"] ?? null), "equipoCabecera")) {
                // line 32
                echo "
    ";
            } elseif (0 === twig_compare(            // line 33
($context["espacio"] ?? null), "equipoContenido")) {
                // line 34
                echo "        ";
                $this->loadTemplate("publicidad/codigos/akc-ATF-300-250.html.twig", "publicidad/anunciantes/cAkcelo.html.twig", 34)->display($context);
                // line 35
                echo "    ";
            } elseif (0 === twig_compare(($context["espacio"] ?? null), "partidoCabecera")) {
                // line 36
                echo "
    ";
            } elseif (0 === twig_compare(            // line 37
($context["espacio"] ?? null), "partidoContenido")) {
                // line 38
                echo "        ";
                $this->loadTemplate("publicidad/codigos/akc-ATF-300-250.html.twig", "publicidad/anunciantes/cAkcelo.html.twig", 38)->display($context);
                // line 39
                echo "    ";
            } elseif (0 === twig_compare(($context["espacio"] ?? null), "jugadorCabecera")) {
                // line 40
                echo "
    ";
            } elseif (0 === twig_compare(            // line 41
($context["espacio"] ?? null), "jugadorContenido")) {
                // line 42
                echo "        ";
                $this->loadTemplate("publicidad/codigos/akc-ATF-300-250.html.twig", "publicidad/anunciantes/cAkcelo.html.twig", 42)->display($context);
                // line 43
                echo "    ";
            } elseif (0 === twig_compare(($context["espacio"] ?? null), "pie")) {
                // line 44
                echo "
    ";
            }
            // line 46
            echo "

";
        }
    }

    public function getTemplateName()
    {
        return "publicidad/anunciantes/cAkcelo.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  158 => 46,  154 => 44,  151 => 43,  148 => 42,  146 => 41,  143 => 40,  140 => 39,  137 => 38,  135 => 37,  132 => 36,  129 => 35,  126 => 34,  124 => 33,  121 => 32,  118 => 31,  115 => 30,  113 => 29,  110 => 28,  107 => 27,  104 => 26,  102 => 25,  99 => 24,  96 => 23,  93 => 22,  91 => 21,  88 => 20,  85 => 19,  82 => 18,  80 => 17,  77 => 16,  74 => 15,  71 => 14,  69 => 13,  66 => 12,  63 => 11,  60 => 10,  58 => 9,  55 => 8,  53 => 7,  50 => 6,  47 => 5,  44 => 4,  42 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "publicidad/anunciantes/cAkcelo.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.eu/v2/templates/publicidad/anunciantes/cAkcelo.html.twig");
    }
}
