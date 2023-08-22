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

/* index/__part/fichajes.html.twig */
class __TwigTemplate_ea0de1f59def87561a1320f8305adab3c1dfe012091f7d2ae4f9afca85f40584 extends Template
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
        echo "<div class=\"col-12 contenedorBlancoBordesRedondeadosConPadding\" style=\"
clear:both; margin-top: 25px;\">
    <h2 class=\"subtitulo\" style=\"font-size: 20px;\">Fichajes Temporada 2023-24</h2>
    ";
        // line 4
        $context["id_equipo"] = 0;
        // line 5
        echo "
    ";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["fichajes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["jugador"]) {
            // line 7
            echo "
        ";
            // line 8
            $context["enlace_jugador"] = $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("jugador_url_nombre", ["id" => twig_get_attribute($this->env, $this->source,             // line 9
$context["jugador"], "id", [], "any", false, false, false, 9), "slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,             // line 10
$context["jugador"], "apodo", [], "any", false, false, false, 10)])]);
            // line 12
            echo "
        ";
            // line 13
            $context["enlace_equipo"] = $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_datos", ["idEquipo" => twig_get_attribute($this->env, $this->source,             // line 14
$context["jugador"], "equipoActual_id", [], "any", false, false, false, 14), "slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,             // line 15
$context["jugador"], "apodo", [], "any", false, false, false, 15)])]);
            // line 17
            echo "
        ";
            // line 18
            if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["jugador"], "posicion", [], "any", false, false, false, 18), "1")) {
                // line 19
                echo "
            ";
                // line 20
                $context["txt_jugador"] = "Portero";
                // line 21
                echo "            ";
                if (((isset($context["liga"]) || array_key_exists("liga", $context)) && 0 === twig_compare(($context["liga"] ?? null), 214))) {
                    // line 22
                    echo "                ";
                    $context["txt_jugador"] = "Portera";
                    // line 23
                    echo "            ";
                }
                // line 24
                echo "
        ";
            } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 25
$context["jugador"], "posicion", [], "any", false, false, false, 25), "2")) {
                // line 26
                echo "
            ";
                // line 27
                $context["txt_jugador"] = "Defensa";
                // line 28
                echo "
        ";
            } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 29
$context["jugador"], "posicion", [], "any", false, false, false, 29), "3")) {
                // line 30
                echo "
            ";
                // line 31
                $context["txt_jugador"] = "Centrocampista";
                // line 32
                echo "
        ";
            } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 33
$context["jugador"], "posicion", [], "any", false, false, false, 33), "4")) {
                // line 34
                echo "
            ";
                // line 35
                $context["txt_jugador"] = "Delantero";
                // line 36
                echo "
        ";
            } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 37
$context["jugador"], "posicion", [], "any", false, false, false, 37), "5")) {
                // line 38
                echo "
            ";
                // line 39
                $context["txt_jugador"] = "Entrenador";
                // line 40
                echo "
        ";
            } else {
                // line 42
                echo "
            ";
                // line 43
                $context["txt_jugador"] = "Sin demarcación";
                // line 44
                echo "
        ";
            }
            // line 46
            echo "
        ";
            // line 47
            $context["rutaJugador"] = (("/static/img/jugadores/jugador" . twig_get_attribute($this->env, $this->source, $context["jugador"], "id", [], "any", false, false, false, 47)) . ".jpg");
            // line 48
            echo "        ";
            if ( !call_user_func_array($this->env->getFunction('fileExists')->getCallable(), [($context["rutaJugador"] ?? null)])) {
                // line 49
                echo "            ";
                $context["rutaJugador"] = "/static/img/jugadores/NI.png";
                // line 50
                echo "        ";
            }
            // line 51
            echo "
        ";
            // line 52
            $context["rutaEscudo"] = call_user_func_array($this->env->getFunction('rutaEscudo')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["jugador"], "club_id", [], "any", false, false, false, 52), twig_get_attribute($this->env, $this->source, $context["jugador"], "equipoActual_id", [], "any", false, false, false, 52)]);
            // line 53
            echo "

        <div class=\"row\" style=\"margin-top: 10px;\">
            <div class=\"col-3 col-sm-2\">
                <a href=\"";
            // line 57
            echo twig_escape_filter($this->env, ($context["enlace_jugador"] ?? null), "html", null, true);
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, ($context["rutaJugador"] ?? null), "html", null, true);
            echo "\" class=\"img-rounded\" width=\"64\" height=\"96\"></a>
            </div>
            <div class=\"col-5\">
                <span><a style=\"color: #434343; font-size: 15px;\" href=\"";
            // line 60
            echo twig_escape_filter($this->env, ($context["enlace_jugador"] ?? null), "html", null, true);
            echo "\"><h4 style=\"font-size: 16px;\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["jugador"], "apodo", [], "any", false, false, false, 60), "html", null, true);
            echo "</h4></a></span>

                <div style=\"float:left; padding-right:5px\"><a href=\"";
            // line 62
            echo twig_escape_filter($this->env, ($context["enlace_equipo"] ?? null), "html", null, true);
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, ($context["rutaEscudo"] ?? null), "html", null, true);
            echo "\" class=\"img-rounded\" width=\"30\" height=\"45\"></a></div>
                <div style=\"float:left\"><span><a style=\"color: #434343; font-size: 15px;\" href=\"";
            // line 63
            echo twig_escape_filter($this->env, ($context["enlace_equipo"] ?? null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["jugador"], "equipo", [], "any", false, false, false, 63), "html", null, true);
            echo "</a></span></div>
            </div>
            <div class=\"col-4 col-sm-5\">
                <span><p style=\"font-weight: bold; font-size: 15px;\">";
            // line 66
            echo twig_escape_filter($this->env, ($context["txt_jugador"] ?? null), "html", null, true);
            echo "</p></span>
                <span class=\"txt11\" style=\"font-size: 15px;\">Procedencia: <b>";
            // line 67
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["jugador"], "slug", [], "any", false, false, false, 67), "html", null, true);
            echo "</b></span>
            </div>
        </div>


        ";
            // line 72
            $context["id_equipo"] = twig_get_attribute($this->env, $this->source, $context["jugador"], "equipoActual_id", [], "any", false, false, false, 72);
            // line 73
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['jugador'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 75
        echo "</div>

";
    }

    public function getTemplateName()
    {
        return "index/__part/fichajes.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  212 => 75,  205 => 73,  203 => 72,  195 => 67,  191 => 66,  183 => 63,  177 => 62,  170 => 60,  162 => 57,  156 => 53,  154 => 52,  151 => 51,  148 => 50,  145 => 49,  142 => 48,  140 => 47,  137 => 46,  133 => 44,  131 => 43,  128 => 42,  124 => 40,  122 => 39,  119 => 38,  117 => 37,  114 => 36,  112 => 35,  109 => 34,  107 => 33,  104 => 32,  102 => 31,  99 => 30,  97 => 29,  94 => 28,  92 => 27,  89 => 26,  87 => 25,  84 => 24,  81 => 23,  78 => 22,  75 => 21,  73 => 20,  70 => 19,  68 => 18,  65 => 17,  63 => 15,  62 => 14,  61 => 13,  58 => 12,  56 => 10,  55 => 9,  54 => 8,  51 => 7,  47 => 6,  44 => 5,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "index/__part/fichajes.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/index/__part/fichajes.html.twig");
    }
}
