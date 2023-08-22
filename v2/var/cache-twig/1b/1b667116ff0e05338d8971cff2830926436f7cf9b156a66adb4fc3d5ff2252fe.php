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

/* temporada/__content/__part/pesFichajes.html.twig */
class __TwigTemplate_dd47153d8b9d95ebf8796a5541574e02cabd33b1d1b89a16ea2f44117cd4064b extends Template
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
        echo "<div class=\"col-12\">
    <div class=\"col-12 contenedorBlancoBordesRedondeados\" style=\"padding-top: 15px;\">
        ";
        // line 3
        $context["id_equipo"] = 0;
        // line 4
        echo "        ";
        $context["contador"] = 0;
        // line 5
        echo "
        ";
        // line 6
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
                $context["txt_jugador"] = "Porteros";
                // line 21
                echo "                ";
                if (((isset($context["liga"]) || array_key_exists("liga", $context)) && 0 === twig_compare(($context["liga"] ?? null), 214))) {
                    // line 22
                    echo "                    ";
                    $context["txt_jugador"] = "Porteras";
                    // line 23
                    echo "                ";
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
                $context["txt_jugador"] = "Defensas";
                // line 28
                echo "
            ";
            } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 29
$context["jugador"], "posicion", [], "any", false, false, false, 29), "3")) {
                // line 30
                echo "
                ";
                // line 31
                $context["txt_jugador"] = "Centrocampistas";
                // line 32
                echo "
            ";
            } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 33
$context["jugador"], "posicion", [], "any", false, false, false, 33), "4")) {
                // line 34
                echo "
                ";
                // line 35
                $context["txt_jugador"] = "Delanteros";
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
            $context["rutaJugador"] = (("static/img/jugadores/jugador" . twig_get_attribute($this->env, $this->source, $context["jugador"], "id", [], "any", false, false, false, 47)) . ".jpg");
            // line 48
            echo "            ";
            if ( !call_user_func_array($this->env->getFunction('fileExists')->getCallable(), [($context["rutaJugador"] ?? null)])) {
                // line 49
                echo "                ";
                $context["rutaJugador"] = "static/img/jugadores/NI.png";
                // line 50
                echo "            ";
            }
            // line 51
            echo "
            ";
            // line 52
            $context["rutaEscudo"] = call_user_func_array($this->env->getFunction('rutaEscudo')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["jugador"], "club_id", [], "any", false, false, false, 52), twig_get_attribute($this->env, $this->source, $context["jugador"], "equipoActual_id", [], "any", false, false, false, 52)]);
            // line 53
            echo "
            ";
            // line 54
            if ((0 !== twig_compare(twig_get_attribute($this->env, $this->source, $context["jugador"], "equipoActual_id", [], "any", false, false, false, 54), ($context["id_equipo"] ?? null)) && (isset($context["temporada_id"]) || array_key_exists("temporada_id", $context)))) {
                // line 55
                echo "                ";
                $context["contador"] = (($context["contador"] ?? null) + 1);
                // line 56
                echo "                ";
                $context["id_equipo"] = twig_get_attribute($this->env, $this->source, $context["jugador"], "equipoActual_id", [], "any", false, false, false, 56);
                // line 57
                echo "
                <div class=\"row\" style=\"margin-top: 10px; margin-bottom: 15px;\">
                    <div class=\"col-3\">
                        <a href=\"";
                // line 60
                echo twig_escape_filter($this->env, ($context["enlace_equipo"] ?? null), "html", null, true);
                echo "\"><img src=\"";
                echo twig_escape_filter($this->env, ($context["rutaEscudo"] ?? null), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["jugador"], "equipo", [], "any", false, false, false, 60), "html", null, true);
                echo "\" class=\"img-rounded\" width=\"60\"></a>
                    </div>
                    <div class=\"col-9\">
                        <h4><span><a href=\"";
                // line 63
                echo twig_escape_filter($this->env, ($context["enlace_equipo"] ?? null), "html", null, true);
                echo "\" style=\"line-height: 60px; color: #434343;\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["jugador"], "equipo", [], "any", false, false, false, 63), "html", null, true);
                echo "</a></span>
                        </h4>
                    </div>
                </div>

                ";
                // line 68
                if (0 === twig_compare(($context["contador"] ?? null), 2)) {
                    // line 69
                    echo "                    <div class=\"row\">
                        <div class=\"col-12\">
                            ";
                    // line 71
                    $this->loadTemplate("publicidad/cuerpo04.html.twig", "temporada/__content/__part/pesFichajes.html.twig", 71)->display($context);
                    // line 72
                    echo "                        </div>
                    </div>
                ";
                }
                // line 75
                echo "            ";
            }
            // line 76
            echo "
            <div class=\"row\" style=\"margin-bottom: 10px;\">
                <div class=\"col-2\">

                </div>
                <div class=\"col-3\">
                    <a href=\"";
            // line 82
            echo twig_escape_filter($this->env, ($context["enlace_jugador"] ?? null), "html", null, true);
            echo "\"><img src=\"/";
            echo twig_escape_filter($this->env, ($context["rutaJugador"] ?? null), "html", null, true);
            echo "\" class=\"img-rounded\" width=\"64\"  height=\"96\" alt=\"jugador\"></a>
                </div>
                <div class=\"col-7\">
                    <span><a href=\"";
            // line 85
            echo twig_escape_filter($this->env, ($context["enlace_jugador"] ?? null), "html", null, true);
            echo "\" style=\"font-weight: bold; color: #434343;\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["jugador"], "apodo", [], "any", false, false, false, 85), "html", null, true);
            echo "</a></span>
                    <br /><span>Procedencia: ";
            // line 86
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["jugador"], "slug", [], "any", false, false, false, 86), "html", null, true);
            echo "</span>
                    <br /><span><b>";
            // line 87
            echo twig_escape_filter($this->env, ($context["txtPosicion"] ?? null), "html", null, true);
            echo "</b></span>
                </div>
            </div>

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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['jugador'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 92
        echo "
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "temporada/__content/__part/pesFichajes.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  268 => 92,  249 => 87,  245 => 86,  239 => 85,  231 => 82,  223 => 76,  220 => 75,  215 => 72,  213 => 71,  209 => 69,  207 => 68,  197 => 63,  187 => 60,  182 => 57,  179 => 56,  176 => 55,  174 => 54,  171 => 53,  169 => 52,  166 => 51,  163 => 50,  160 => 49,  157 => 48,  155 => 47,  152 => 46,  148 => 44,  146 => 43,  143 => 42,  139 => 40,  137 => 39,  134 => 38,  132 => 37,  129 => 36,  127 => 35,  124 => 34,  122 => 33,  119 => 32,  117 => 31,  114 => 30,  112 => 29,  109 => 28,  107 => 27,  104 => 26,  102 => 25,  99 => 24,  96 => 23,  93 => 22,  90 => 21,  88 => 20,  85 => 19,  83 => 18,  80 => 17,  78 => 15,  77 => 14,  76 => 13,  73 => 12,  71 => 10,  70 => 9,  69 => 8,  66 => 7,  49 => 6,  46 => 5,  43 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "temporada/__content/__part/pesFichajes.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/temporada/__content/__part/pesFichajes.html.twig");
    }
}
