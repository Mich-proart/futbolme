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

/* temporada/__content/liga.html.twig */
class __TwigTemplate_35bb0d1151a23dec65a9b21d0bb0461be65e43eddaddb16ffd4768d4b9616d4b extends Template
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
        echo "<div class=\"row\">

    ";
        // line 19
        echo "
    <div class=\"col-12\">
        <ul id=\"menuTorneo\" class=\"nav nav-tabs nopadding celestebox\" role=\"tablist\" id=\"pestaTemporada\">

        ";
        // line 23
        if (1 === twig_compare(($context["partidosJornada"] ?? null), 0)) {
            // line 24
            echo "            <li class=\"text-center ";
            if (0 === twig_compare(($context["modelo"] ?? null), "Jornada")) {
                echo "activa";
            }
            echo "\">
                <a class=\"btn btn-secondary\" href=\"";
            // line 25
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("torneo_jornada", ["idTorneo" =>             // line 26
($context["temporada_id"] ?? null), "slug" =>             // line 27
($context["slug"] ?? null), "jornada" =>             // line 28
($context["jornadaActiva"] ?? null)]), "html", null, true);
            // line 29
            echo "\">Jornada</a>
            </li>

            
            ";
            // line 33
            if (((1 === twig_compare(($context["division"] ?? null), 0) && -1 === twig_compare(($context["division"] ?? null), 4)) || 0 === twig_compare(($context["temporada_id"] ?? null), 214))) {
                // line 34
                echo "                <li class=\"text-center ";
                if (0 === twig_compare(($context["modelo"] ?? null), "Goleadores")) {
                    echo "activa";
                }
                echo "\">
                    <a class=\"btn btn-secondary\" href=\"";
                // line 35
                echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("torneo_goleadores", ["idTorneo" =>                 // line 36
($context["temporada_id"] ?? null), "slug" =>                 // line 37
($context["slug"] ?? null)]), "html", null, true);
                // line 38
                echo "\">Goleadores</a>
                </li>
                
            ";
            }
            // line 42
            echo "            <li class=\"text-center ";
            if (0 === twig_compare(($context["modelo"] ?? null), "Calendario")) {
                echo "activa";
            }
            echo "\">
                <a class=\"btn btn-secondary\" href=\"";
            // line 43
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("torneo_calendario", ["idTorneo" =>             // line 44
($context["temporada_id"] ?? null), "slug" =>             // line 45
($context["slug"] ?? null)]), "html", null, true);
            // line 46
            echo "\">Calendario</a>
            </li>
        ";
        }
        // line 49
        echo "
        <li class=\"text-center ";
        // line 50
        if (0 === twig_compare(($context["modelo"] ?? null), "Equipos")) {
            echo "activa";
        }
        echo "\">
            <a class=\"btn btn-secondary\" href=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("torneo_equipos", ["idTorneo" =>         // line 52
($context["temporada_id"] ?? null), "slug" =>         // line 53
($context["slug"] ?? null)]), "html", null, true);
        // line 54
        echo "\">Equipos</a>
        </li>

        <li class=\"text-center ";
        // line 57
        if (0 === twig_compare(($context["modelo"] ?? null), "Noticias")) {
            echo "activa";
        }
        echo "\">
            <a class=\"btn btn-secondary\" href=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("torneo_noticias", ["idTorneo" =>         // line 59
($context["temporada_id"] ?? null), "slug" =>         // line 60
($context["slug"] ?? null)]), "html", null, true);
        // line 61
        echo "\">Noticias</a> 
        </li>

        

        ";
        // line 66
        if (((1 === twig_compare(($context["division"] ?? null), 0) && -1 === twig_compare(($context["division"] ?? null), 4)) || 0 === twig_compare(($context["temporada_id"] ?? null), 214))) {
            // line 67
            echo "        <li class=\"text-center ";
            if (0 === twig_compare(($context["modelo"] ?? null), "Fichajes")) {
                echo "activa";
            }
            echo "\">
            <a class=\"btn btn-secondary\" href=\"";
            // line 68
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("torneo_fichajes", ["idTorneo" =>             // line 69
($context["temporada_id"] ?? null), "slug" =>             // line 70
($context["slug"] ?? null)]), "html", null, true);
            // line 71
            echo "\">Fichajes</a>
        </li>
        ";
        }
        // line 74
        echo "

        ";
        // line 76
        if (-1 === twig_compare(($context["visible"] ?? null), 100)) {
            // line 77
            echo "            ";
            // line 92
            echo "        ";
        }
        // line 93
        echo "
        ";
        // line 101
        echo "
        <li class=\"text-center\">
            <a class=\"btn btn-secondary\" href=\"/ascensosydescensos.php?pest=";
        // line 103
        echo twig_escape_filter($this->env, ($context["pest_ascenso"] ?? null), "html", null, true);
        echo "\">Ascensos y descensos</a>
        </li>

        
        <li class=\"text-center\">
            <a class=\"btn btn-secondary\" href=\"/golaverage2.php?id=";
        // line 108
        echo twig_escape_filter($this->env, ($context["temporada_id"] ?? null), "html", null, true);
        echo "\" target=\"_blank\">Calcular Golaverage</a>
        </li>
        

    </ul>
    </div>


    ";
        // line 116
        if (0 === twig_compare(($context["modelo"] ?? null), "Fichajes")) {
            // line 117
            echo "
        ";
            // line 118
            $this->loadTemplate("temporada/__content/__part/pesFichajes.html.twig", "temporada/__content/liga.html.twig", 118)->display($context);
            // line 119
            echo "
    ";
        } elseif (0 === twig_compare(        // line 120
($context["modelo"] ?? null), "Jornada")) {
            // line 121
            echo "
        ";
            // line 122
            $this->loadTemplate("temporada/__content/__part/pesJornada.html.twig", "temporada/__content/liga.html.twig", 122)->display($context);
            // line 123
            echo "
    ";
        } elseif (0 === twig_compare(        // line 124
($context["modelo"] ?? null), "Calendario")) {
            // line 125
            echo "
        ";
            // line 126
            $this->loadTemplate("temporada/__content/__part/pesCalendario.html.twig", "temporada/__content/liga.html.twig", 126)->display($context);
            // line 127
            echo "
    ";
        } elseif (0 === twig_compare(        // line 128
($context["modelo"] ?? null), "Goleadores")) {
            // line 129
            echo "
        ";
            // line 130
            $this->loadTemplate("temporada/__content/__part/pesGoleadores.html.twig", "temporada/__content/liga.html.twig", 130)->display($context);
            // line 131
            echo "
    ";
        } elseif (0 === twig_compare(        // line 132
($context["modelo"] ?? null), "Equipos")) {
            // line 133
            echo "
        <div class=\"col-12\">
            ";
            // line 135
            $this->loadTemplate("temporada/__content/__part/pesEquipos.html.twig", "temporada/__content/liga.html.twig", 135)->display($context);
            // line 136
            echo "        </div>

    ";
        }
        // line 139
        echo "
    



    ";
        // line 144
        if ((isset($context["equiposTw"]) || array_key_exists("equiposTw", $context))) {
            // line 145
            echo "
        ";
            // line 146
            $context["titol"] = "actualidad en twitter";
            // line 147
            echo "        ";
            $context["filtro"] = 0;
            // line 148
            echo "        ";
            $context["esPaginaTorneo"] = 1;
            // line 149
            echo "
        ";
            // line 150
            $this->loadTemplate("__part/pesLeerTwitsPortada.html.twig", "temporada/__content/liga.html.twig", 150)->display($context);
            // line 151
            echo "
    ";
        }
        // line 153
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "temporada/__content/liga.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  274 => 153,  270 => 151,  268 => 150,  265 => 149,  262 => 148,  259 => 147,  257 => 146,  254 => 145,  252 => 144,  245 => 139,  240 => 136,  238 => 135,  234 => 133,  232 => 132,  229 => 131,  227 => 130,  224 => 129,  222 => 128,  219 => 127,  217 => 126,  214 => 125,  212 => 124,  209 => 123,  207 => 122,  204 => 121,  202 => 120,  199 => 119,  197 => 118,  194 => 117,  192 => 116,  181 => 108,  173 => 103,  169 => 101,  166 => 93,  163 => 92,  161 => 77,  159 => 76,  155 => 74,  150 => 71,  148 => 70,  147 => 69,  146 => 68,  139 => 67,  137 => 66,  130 => 61,  128 => 60,  127 => 59,  126 => 58,  120 => 57,  115 => 54,  113 => 53,  112 => 52,  111 => 51,  105 => 50,  102 => 49,  97 => 46,  95 => 45,  94 => 44,  93 => 43,  86 => 42,  80 => 38,  78 => 37,  77 => 36,  76 => 35,  69 => 34,  67 => 33,  61 => 29,  59 => 28,  58 => 27,  57 => 26,  56 => 25,  49 => 24,  47 => 23,  41 => 19,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "temporada/__content/liga.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.eu/v2/templates/temporada/__content/liga.html.twig");
    }
}
