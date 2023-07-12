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
class __TwigTemplate_1a9026e57eb9064f6316b87e7a5380e816397253067f7847c50b807176a4d593 extends Template
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
    <div class=\"col-12\">
        <ul id=\"menuTorneo\" class=\"nav nav-tabs nopadding celestebox\" role=\"tablist\" id=\"pestaTemporada\">

        ";
        // line 5
        if (1 === twig_compare(($context["partidosJornada"] ?? null), 0)) {
            // line 6
            echo "            <li class=\"text-center ";
            if (0 === twig_compare(($context["modelo"] ?? null), "Jornada")) {
                echo "activa";
            }
            echo "\">
                <a class=\"btn btn-secondary\" href=\"";
            // line 7
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("torneo_jornada", ["idTorneo" =>             // line 8
($context["temporada_id"] ?? null), "slug" =>             // line 9
($context["slug"] ?? null), "jornada" =>             // line 10
($context["jornadaActiva"] ?? null)]), "html", null, true);
            // line 11
            echo "\">Jornada</a>
            </li>

            ";
            // line 14
            if (((-1 === twig_compare(($context["temporada_id"] ?? null), 25) || 0 === twig_compare(($context["temporada_id"] ?? null), 214)) || 0 === twig_compare(($context["visible"] ?? null), 7))) {
                // line 15
                echo "
                <li class=\"text-center ";
                // line 16
                if (0 === twig_compare(($context["modelo"] ?? null), "Goleadores")) {
                    echo "activa";
                }
                echo "\">
                    <a class=\"btn btn-secondary\" href=\"";
                // line 17
                echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("torneo_goleadores", ["idTorneo" =>                 // line 18
($context["temporada_id"] ?? null), "slug" =>                 // line 19
($context["slug"] ?? null)]), "html", null, true);
                // line 20
                echo "\">Goleadores</a>
                </li>
                ";
                // line 38
                echo "            ";
            }
            // line 39
            echo "            <li class=\"text-center ";
            if (0 === twig_compare(($context["modelo"] ?? null), "Calendario")) {
                echo "activa";
            }
            echo "\">
                <a class=\"btn btn-secondary\" href=\"";
            // line 40
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("torneo_calendario", ["idTorneo" =>             // line 41
($context["temporada_id"] ?? null), "slug" =>             // line 42
($context["slug"] ?? null)]), "html", null, true);
            // line 43
            echo "\">Calendario</a>
            </li>
        ";
        }
        // line 46
        echo "
        <li class=\"text-center ";
        // line 47
        if (0 === twig_compare(($context["modelo"] ?? null), "Equipos")) {
            echo "activa";
        }
        echo "\">
            <a class=\"btn btn-secondary\" href=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("torneo_equipos", ["idTorneo" =>         // line 49
($context["temporada_id"] ?? null), "slug" =>         // line 50
($context["slug"] ?? null)]), "html", null, true);
        // line 51
        echo "\">Equipos</a>
        </li>

        <li class=\"text-center ";
        // line 54
        if (0 === twig_compare(($context["modelo"] ?? null), "Noticias")) {
            echo "activa";
        }
        echo "\">
            <a class=\"btn btn-secondary\" href=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("torneo_noticias", ["idTorneo" =>         // line 56
($context["temporada_id"] ?? null), "slug" =>         // line 57
($context["slug"] ?? null)]), "html", null, true);
        // line 58
        echo "\">Noticias</a>
        </li>

        ";
        // line 61
        if (((-1 === twig_compare(($context["temporada_id"] ?? null), 25) || 0 === twig_compare(($context["temporada_id"] ?? null), 214)) && 1 === twig_compare(twig_length_filter($this->env, ($context["fichajes"] ?? null)), 0))) {
            // line 62
            echo "        <li class=\"text-center ";
            if (0 === twig_compare(($context["modelo"] ?? null), "Fichajes")) {
                echo "activa";
            }
            echo "\">
            <a class=\"btn btn-secondary\" href=\"";
            // line 63
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("torneo_fichajes", ["idTorneo" =>             // line 64
($context["temporada_id"] ?? null), "slug" =>             // line 65
($context["slug"] ?? null)]), "html", null, true);
            // line 66
            echo "\">Fichajes</a>
        </li>
        ";
        }
        // line 69
        echo "

        ";
        // line 71
        if (-1 === twig_compare(($context["visible"] ?? null), 100)) {
            // line 72
            echo "            ";
            // line 87
            echo "        ";
        }
        // line 88
        echo "
        ";
        // line 94
        echo "
    </ul>
    </div>


    ";
        // line 99
        if (0 === twig_compare(($context["modelo"] ?? null), "Fichajes")) {
            // line 100
            echo "
        ";
            // line 101
            $this->loadTemplate("temporada/__content/__part/pesFichajes.html.twig", "temporada/__content/liga.html.twig", 101)->display($context);
            // line 102
            echo "
    ";
        } elseif (0 === twig_compare(        // line 103
($context["modelo"] ?? null), "Jornada")) {
            // line 104
            echo "
        ";
            // line 105
            $this->loadTemplate("temporada/__content/__part/pesJornada.html.twig", "temporada/__content/liga.html.twig", 105)->display($context);
            // line 106
            echo "
    ";
        } elseif (0 === twig_compare(        // line 107
($context["modelo"] ?? null), "Calendario")) {
            // line 108
            echo "
        ";
            // line 109
            $this->loadTemplate("temporada/__content/__part/pesCalendario.html.twig", "temporada/__content/liga.html.twig", 109)->display($context);
            // line 110
            echo "
    ";
        } elseif (0 === twig_compare(        // line 111
($context["modelo"] ?? null), "Goleadores")) {
            // line 112
            echo "
        ";
            // line 113
            $this->loadTemplate("temporada/__content/__part/pesGoleadores.html.twig", "temporada/__content/liga.html.twig", 113)->display($context);
            // line 114
            echo "
    ";
        } elseif (0 === twig_compare(        // line 115
($context["modelo"] ?? null), "Equipos")) {
            // line 116
            echo "
        <div class=\"col-12\">
            ";
            // line 118
            $this->loadTemplate("temporada/__content/__part/pesEquipos.html.twig", "temporada/__content/liga.html.twig", 118)->display($context);
            // line 119
            echo "        </div>

    ";
        }
        // line 122
        echo "

    ";
        // line 124
        if ((isset($context["equiposTw"]) || array_key_exists("equiposTw", $context))) {
            // line 125
            echo "
        ";
            // line 126
            $context["titol"] = "actualidad en twitter";
            // line 127
            echo "        ";
            $context["filtro"] = 0;
            // line 128
            echo "        ";
            $context["esPaginaTorneo"] = 1;
            // line 129
            echo "
        ";
            // line 130
            $this->loadTemplate("__part/pesLeerTwitsPortada.html.twig", "temporada/__content/liga.html.twig", 130)->display($context);
            // line 131
            echo "
    ";
        }
        // line 133
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
        return array (  251 => 133,  247 => 131,  245 => 130,  242 => 129,  239 => 128,  236 => 127,  234 => 126,  231 => 125,  229 => 124,  225 => 122,  220 => 119,  218 => 118,  214 => 116,  212 => 115,  209 => 114,  207 => 113,  204 => 112,  202 => 111,  199 => 110,  197 => 109,  194 => 108,  192 => 107,  189 => 106,  187 => 105,  184 => 104,  182 => 103,  179 => 102,  177 => 101,  174 => 100,  172 => 99,  165 => 94,  162 => 88,  159 => 87,  157 => 72,  155 => 71,  151 => 69,  146 => 66,  144 => 65,  143 => 64,  142 => 63,  135 => 62,  133 => 61,  128 => 58,  126 => 57,  125 => 56,  124 => 55,  118 => 54,  113 => 51,  111 => 50,  110 => 49,  109 => 48,  103 => 47,  100 => 46,  95 => 43,  93 => 42,  92 => 41,  91 => 40,  84 => 39,  81 => 38,  77 => 20,  75 => 19,  74 => 18,  73 => 17,  67 => 16,  64 => 15,  62 => 14,  57 => 11,  55 => 10,  54 => 9,  53 => 8,  52 => 7,  45 => 6,  43 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "temporada/__content/liga.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.eu/v2/templates/temporada/__content/liga.html.twig");
    }
}
