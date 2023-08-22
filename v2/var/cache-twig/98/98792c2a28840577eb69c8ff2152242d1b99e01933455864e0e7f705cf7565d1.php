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

/* equipo/__part/pesFichajes.html.twig */
class __TwigTemplate_995e9fc45b442d8c65943a5ef003ab4c5e9c05520c23171efc1f9d45fcaf2238 extends Template
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
        echo "<div class=\"col-12 contenedorBlancoBordesRedondeadosConPadding\" style=\"margin-top: 10px;\">
    ";
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["fichajes"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["key"] => $context["jugador"]) {
            // line 3
            echo "
        ";
            // line 4
            $context["enlace_jugador"] = $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("jugador_url_nombre", ["id" => twig_get_attribute($this->env, $this->source,             // line 5
$context["jugador"], "id", [], "any", false, false, false, 5), "slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,             // line 6
$context["jugador"], "apodo", [], "any", false, false, false, 6)])]);
            // line 8
            echo "
        ";
            // line 9
            $context["enlace_equipo"] = $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_datos", ["idEquipo" => twig_get_attribute($this->env, $this->source,             // line 10
$context["jugador"], "equipoActual_id", [], "any", false, false, false, 10), "slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,             // line 11
$context["jugador"], "apodo", [], "any", false, false, false, 11)])]);
            // line 13
            echo "
        ";
            // line 14
            if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["jugador"], "posicion", [], "any", false, false, false, 14), "1")) {
                // line 15
                echo "
            ";
                // line 16
                $context["txt_jugador"] = "Portero";
                // line 17
                echo "            ";
                if (((isset($context["liga"]) || array_key_exists("liga", $context)) && 0 === twig_compare(($context["liga"] ?? null), 214))) {
                    // line 18
                    echo "                ";
                    $context["txt_jugador"] = "Portera";
                    // line 19
                    echo "            ";
                }
                // line 20
                echo "
        ";
            } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 21
$context["jugador"], "posicion", [], "any", false, false, false, 21), "2")) {
                // line 22
                echo "
            ";
                // line 23
                $context["txt_jugador"] = "Defensa";
                // line 24
                echo "
        ";
            } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 25
$context["jugador"], "posicion", [], "any", false, false, false, 25), "3")) {
                // line 26
                echo "
            ";
                // line 27
                $context["txt_jugador"] = "Centrocampista";
                // line 28
                echo "
        ";
            } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 29
$context["jugador"], "posicion", [], "any", false, false, false, 29), "4")) {
                // line 30
                echo "
            ";
                // line 31
                $context["txt_jugador"] = "Delantero";
                // line 32
                echo "
        ";
            } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 33
$context["jugador"], "posicion", [], "any", false, false, false, 33), "5")) {
                // line 34
                echo "
            ";
                // line 35
                $context["txt_jugador"] = "Entrenador";
                // line 36
                echo "
        ";
            } else {
                // line 38
                echo "
            ";
                // line 39
                $context["txt_jugador"] = "Sin demarcación";
                // line 40
                echo "
        ";
            }
            // line 42
            echo "
        ";
            // line 43
            $context["rutaJugador"] = (("static/img/jugadores/jugador" . twig_get_attribute($this->env, $this->source, $context["jugador"], "id", [], "any", false, false, false, 43)) . ".jpg");
            // line 44
            echo "        ";
            if ( !call_user_func_array($this->env->getFunction('fileExists')->getCallable(), [($context["rutaJugador"] ?? null)])) {
                // line 45
                echo "            ";
                $context["rutaJugador"] = "static/img/jugadores/NI.png";
                // line 46
                echo "        ";
            }
            // line 47
            echo "
        ";
            // line 48
            if (0 !== twig_compare(twig_get_attribute($this->env, $this->source, $context["jugador"], "equipoActual_id", [], "any", false, false, false, 48), ($context["equipo_id"] ?? null))) {
                // line 49
                echo "
            <div class=\"row\">
                <div class=\"col-3\">
                    <a href=\"";
                // line 52
                echo twig_escape_filter($this->env, ($context["enlace_equipo"] ?? null), "html", null, true);
                echo "\"><img src=\"/static/img/equipos/escudo";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["jugador"], "equipoActual_id", [], "any", false, false, false, 52), "html", null, true);
                echo ".png\" alt=\"escudo\" class=\"img-rounded\" width=\"60\" height=\"90\"></a>
                </div>
                <div class=\"col-9\">
                    <h4><span><a href=\"";
                // line 55
                echo twig_escape_filter($this->env, ($context["enlace_equipo"] ?? null), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["jugador"], "equipo", [], "any", false, false, false, 55), "html", null, true);
                echo "</a></span>
                    </h4>
                </div>
            </div>


        ";
            }
            // line 62
            echo "
        ";
            // line 63
            if (0 === twig_compare($context["key"], 1)) {
                // line 64
                echo "            ";
                $this->loadTemplate("publicidad/cuerpo04.html.twig", "equipo/__part/pesFichajes.html.twig", 64)->display($context);
                // line 65
                echo "        ";
            }
            // line 66
            echo "

        <div class=\"row\" style=\"margin-bottom: 10px; padding-bottom: 10px; border-bottom: solid 1px #212529;\">
            <div class=\"col-3\">
                <a href=\"";
            // line 70
            echo twig_escape_filter($this->env, ($context["enlace_jugador"] ?? null), "html", null, true);
            echo "\"><img src=\"/";
            echo twig_escape_filter($this->env, ($context["rutaJugador"] ?? null), "html", null, true);
            echo "\" alt=\"jugador ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["jugador"], "nombre", [], "any", false, false, false, 70), "html", null, true);
            echo "\" class=\"img-rounded\" width=\"64\" height=\"96\"></a>
            </div>
            <div class=\"col-5\">
                <span><a href=\"";
            // line 73
            echo twig_escape_filter($this->env, ($context["enlace_jugador"] ?? null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["jugador"], "apodo", [], "any", false, false, false, 73), "html", null, true);
            echo "</a></span>
                <br/><span>Procedencia: ";
            // line 74
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["jugador"], "slug", [], "any", false, false, false, 74), "html", null, true);
            echo "</span>
                <br/><span><b>";
            // line 75
            echo twig_escape_filter($this->env, ($context["txt_jugador"] ?? null), "html", null, true);
            echo "</b></span>
            </div>
            <div class=\"col-12 col-lg-4\">
                ";
            // line 78
            echo nl2br(twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["jugador"], "palmares", [], "any", false, false, false, 78), "html", null, true));
            echo "
            </div>
        </div>


        ";
            // line 83
            $context["id_equipo"] = twig_get_attribute($this->env, $this->source, $context["jugador"], "equipoActual_id", [], "any", false, false, false, 83);
            // line 84
            echo "
    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['jugador'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 86
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "equipo/__part/pesFichajes.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  255 => 86,  240 => 84,  238 => 83,  230 => 78,  224 => 75,  220 => 74,  214 => 73,  204 => 70,  198 => 66,  195 => 65,  192 => 64,  190 => 63,  187 => 62,  175 => 55,  167 => 52,  162 => 49,  160 => 48,  157 => 47,  154 => 46,  151 => 45,  148 => 44,  146 => 43,  143 => 42,  139 => 40,  137 => 39,  134 => 38,  130 => 36,  128 => 35,  125 => 34,  123 => 33,  120 => 32,  118 => 31,  115 => 30,  113 => 29,  110 => 28,  108 => 27,  105 => 26,  103 => 25,  100 => 24,  98 => 23,  95 => 22,  93 => 21,  90 => 20,  87 => 19,  84 => 18,  81 => 17,  79 => 16,  76 => 15,  74 => 14,  71 => 13,  69 => 11,  68 => 10,  67 => 9,  64 => 8,  62 => 6,  61 => 5,  60 => 4,  57 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "equipo/__part/pesFichajes.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/equipo/__part/pesFichajes.html.twig");
    }
}
