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

/* publicidad/anunciantes/cThemoneytizer.html.twig */
class __TwigTemplate_5f4882cc9507132dc63c82a41d6617fc50802828a264504406903b1bfaf578c2 extends Template
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
                $this->loadTemplate("publicidad/codigos/theMoney-13939-11.html.twig", "publicidad/anunciantes/cThemoneytizer.html.twig", 4)->display($context);
                // line 5
                echo "        ";
                $this->loadTemplate("publicidad/codigos/theMoney-13939-6.html.twig", "publicidad/anunciantes/cThemoneytizer.html.twig", 5)->display($context);
                // line 6
                echo "        ";
                $this->loadTemplate("publicidad/codigos/theMoney-consent.html.twig", "publicidad/anunciantes/cThemoneytizer.html.twig", 6)->display($context);
                // line 7
                echo "    ";
            } elseif (0 === twig_compare(($context["espacio"] ?? null), "cabecera")) {
                // line 8
                echo "        ";
                $this->loadTemplate("publicidad/codigos/theMoney-13939-1.html.twig", "publicidad/anunciantes/cThemoneytizer.html.twig", 8)->display($context);
                // line 9
                echo "    ";
            } elseif (0 === twig_compare(($context["espacio"] ?? null), "primerLateralIzquierdo")) {
                // line 10
                echo "        ";
                $this->loadTemplate("publicidad/codigos/theMoney-13939-3.html.twig", "publicidad/anunciantes/cThemoneytizer.html.twig", 10)->display($context);
                // line 11
                echo "    ";
            } elseif (0 === twig_compare(($context["espacio"] ?? null), "segundoLateralIzquierdo")) {
                // line 12
                echo "
    ";
            } elseif (0 === twig_compare(            // line 13
($context["espacio"] ?? null), "primerLateralDerecho")) {
                // line 14
                echo "        ";
                $this->loadTemplate("publicidad/codigos/theMoney-13939-4.html.twig", "publicidad/anunciantes/cThemoneytizer.html.twig", 14)->display($context);
                // line 15
                echo "    ";
            } elseif (0 === twig_compare(($context["espacio"] ?? null), "segundoLateralDerecho")) {
                // line 16
                echo "
    ";
            } elseif (0 === twig_compare(            // line 17
($context["espacio"] ?? null), "cabeceraDirectos")) {
                // line 18
                echo "        ";
                $this->loadTemplate("publicidad/codigos/theMoney-13939-19.html.twig", "publicidad/anunciantes/cThemoneytizer.html.twig", 18)->display($context);
                // line 19
                echo "    ";
            } elseif (0 === twig_compare(($context["espacio"] ?? null), "entreDirectos")) {
                // line 20
                echo "
    ";
            } elseif (0 === twig_compare(            // line 21
($context["espacio"] ?? null), "cabeceraPartidos")) {
                // line 22
                echo "        ";
                $this->loadTemplate("publicidad/codigos/theMoney-13939-19.html.twig", "publicidad/anunciantes/cThemoneytizer.html.twig", 22)->display($context);
                // line 23
                echo "    ";
            } elseif (0 === twig_compare(($context["espacio"] ?? null), "entrePartidos")) {
                // line 24
                echo "
    ";
            } elseif (0 === twig_compare(            // line 25
($context["espacio"] ?? null), "cabeceraTwitter")) {
                // line 26
                echo "        ";
                $this->loadTemplate("publicidad/codigos/theMoney-13939-19.html.twig", "publicidad/anunciantes/cThemoneytizer.html.twig", 26)->display($context);
                // line 27
                echo "    ";
            } elseif (0 === twig_compare(($context["espacio"] ?? null), "entreTwitter")) {
                // line 28
                echo "
    ";
            } elseif (0 === twig_compare(            // line 29
($context["espacio"] ?? null), "temporadaJornada")) {
                // line 30
                echo "        ";
                $this->loadTemplate("publicidad/codigos/theMoney-13939-19.html.twig", "publicidad/anunciantes/cThemoneytizer.html.twig", 30)->display($context);
                // line 31
                echo "    ";
            } elseif (0 === twig_compare(($context["espacio"] ?? null), "temporadaClasificacion")) {
                // line 32
                echo "
    ";
            } elseif (0 === twig_compare(            // line 33
($context["espacio"] ?? null), "equipoCabecera")) {
                // line 34
                echo "        ";
                $this->loadTemplate("publicidad/codigos/theMoney-13939-19.html.twig", "publicidad/anunciantes/cThemoneytizer.html.twig", 34)->display($context);
                // line 35
                echo "    ";
            } elseif (0 === twig_compare(($context["espacio"] ?? null), "equipoContenido")) {
                // line 36
                echo "
    ";
            } elseif (0 === twig_compare(            // line 37
($context["espacio"] ?? null), "partidoCabecera")) {
                // line 38
                echo "        ";
                $this->loadTemplate("publicidad/codigos/theMoney-13939-19.html.twig", "publicidad/anunciantes/cThemoneytizer.html.twig", 38)->display($context);
                // line 39
                echo "    ";
            } elseif (0 === twig_compare(($context["espacio"] ?? null), "partidoContenido")) {
                // line 40
                echo "
    ";
            } elseif (0 === twig_compare(            // line 41
($context["espacio"] ?? null), "jugadorCabecera")) {
                // line 42
                echo "        ";
                $this->loadTemplate("publicidad/codigos/theMoney-13939-19.html.twig", "publicidad/anunciantes/cThemoneytizer.html.twig", 42)->display($context);
                // line 43
                echo "    ";
            } elseif (0 === twig_compare(($context["espacio"] ?? null), "jugadorContenido")) {
                // line 44
                echo "
    ";
            } elseif (0 === twig_compare(            // line 45
($context["espacio"] ?? null), "pie")) {
                // line 46
                echo "        ";
                $this->loadTemplate("publicidad/codigos/theMoney-13939-5.html.twig", "publicidad/anunciantes/cThemoneytizer.html.twig", 46)->display($context);
                // line 47
                echo "    ";
            }
            // line 48
            echo "

";
        }
    }

    public function getTemplateName()
    {
        return "publicidad/anunciantes/cThemoneytizer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  167 => 48,  164 => 47,  161 => 46,  159 => 45,  156 => 44,  153 => 43,  150 => 42,  148 => 41,  145 => 40,  142 => 39,  139 => 38,  137 => 37,  134 => 36,  131 => 35,  128 => 34,  126 => 33,  123 => 32,  120 => 31,  117 => 30,  115 => 29,  112 => 28,  109 => 27,  106 => 26,  104 => 25,  101 => 24,  98 => 23,  95 => 22,  93 => 21,  90 => 20,  87 => 19,  84 => 18,  82 => 17,  79 => 16,  76 => 15,  73 => 14,  71 => 13,  68 => 12,  65 => 11,  62 => 10,  59 => 9,  56 => 8,  53 => 7,  50 => 6,  47 => 5,  44 => 4,  42 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "publicidad/anunciantes/cThemoneytizer.html.twig", "/home/futbolme/domains/futbolme.com/public_html/v2/templates/publicidad/anunciantes/cThemoneytizer.html.twig");
    }
}
