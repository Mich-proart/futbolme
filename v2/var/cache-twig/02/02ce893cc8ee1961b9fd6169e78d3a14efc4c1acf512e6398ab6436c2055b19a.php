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

/* equipo/__part/pesPlantilla.html.twig */
class __TwigTemplate_6a6397469a49dc124de4e8dfa9953bc5fe0057c07ec7b8fdfe9d318c4107e733 extends Template
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
    ";
        // line 2
        $this->loadTemplate("publicidad/cuerpo04.html.twig", "equipo/__part/pesPlantilla.html.twig", 2)->display($context);
        // line 3
        echo "</div>

<div style=\"margin-top: 10px;\" class=\"col-12 contenedorBlancoBordesRedondeadosConPadding\">
    ";
        // line 6
        $context["posicion"] = 7;
        // line 7
        echo "
    ";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["equipoPlantilla"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["jugador"]) {
            // line 9
            echo "        ";
            if (twig_get_attribute($this->env, $this->source, $context["jugador"], "id", [], "any", true, true, false, 9)) {
                // line 10
                echo "
            ";
                // line 11
                if (0 !== twig_compare(twig_get_attribute($this->env, $this->source, $context["jugador"], "posicion", [], "any", false, false, false, 11), ($context["posicion"] ?? null))) {
                    // line 12
                    echo "
                ";
                    // line 13
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["jugador"], "posicion", [], "any", false, false, false, 13), "1")) {
                        // line 14
                        echo "
                    ";
                        // line 15
                        $context["txt_jugador"] = "Porteros";
                        // line 16
                        echo "                    ";
                        if (((isset($context["liga"]) || array_key_exists("liga", $context)) && 0 === twig_compare(($context["liga"] ?? null), 214))) {
                            // line 17
                            echo "                        ";
                            $context["txt_jugador"] = "Porteras";
                            // line 18
                            echo "                    ";
                        }
                        // line 19
                        echo "
                ";
                    } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,                     // line 20
$context["jugador"], "posicion", [], "any", false, false, false, 20), "2")) {
                        // line 21
                        echo "
                    ";
                        // line 22
                        $context["txt_jugador"] = "Defensas";
                        // line 23
                        echo "
                ";
                    } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,                     // line 24
$context["jugador"], "posicion", [], "any", false, false, false, 24), "3")) {
                        // line 25
                        echo "
                    ";
                        // line 26
                        $context["txt_jugador"] = "Centrocampistas";
                        // line 27
                        echo "
                ";
                    } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,                     // line 28
$context["jugador"], "posicion", [], "any", false, false, false, 28), "4")) {
                        // line 29
                        echo "
                    ";
                        // line 30
                        $context["txt_jugador"] = "Delanteros";
                        // line 31
                        echo "
                ";
                    } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,                     // line 32
$context["jugador"], "posicion", [], "any", false, false, false, 32), "5")) {
                        // line 33
                        echo "
                    ";
                        // line 34
                        $context["txt_jugador"] = "Entrenador";
                        // line 35
                        echo "
                ";
                    } else {
                        // line 37
                        echo "
                    ";
                        // line 38
                        $context["txt_jugador"] = "Sin demarcación";
                        // line 39
                        echo "
                ";
                    }
                    // line 41
                    echo "
                <div class=\"col-12\">
                    <h2 class=\"subtitulo\">";
                    // line 43
                    echo twig_escape_filter($this->env, ($context["txt_jugador"] ?? null), "html", null, true);
                    echo "</h2>
                </div>

            ";
                }
                // line 47
                echo "
        ";
            }
            // line 49
            echo "
        ";
            // line 50
            $context["rutaJugador"] = (("static/img/jugadores/jugador" . twig_get_attribute($this->env, $this->source, $context["jugador"], "id", [], "any", false, false, false, 50)) . ".jpg");
            // line 51
            echo "        ";
            if ( !call_user_func_array($this->env->getFunction('fileExists')->getCallable(), [($context["rutaJugador"] ?? null)])) {
                // line 52
                echo "            ";
                $context["rutaJugador"] = "static/img/jugadores/NI.png";
                // line 53
                echo "        ";
            }
            // line 54
            echo "
        ";
            // line 55
            $context["enlace_jugador"] = $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("jugador_url_nombre", ["id" => twig_get_attribute($this->env, $this->source,             // line 56
$context["jugador"], "id", [], "any", false, false, false, 56), "slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,             // line 57
$context["jugador"], "apodo", [], "any", false, false, false, 57)])]);
            // line 59
            echo "
        ";
            // line 60
            if (0 !== twig_compare(twig_get_attribute($this->env, $this->source, $context["jugador"], "nombre", [], "any", false, false, false, 60), "")) {
                // line 61
                echo "
            <div class=\"row\" style=\"margin-bottom: 10px;\">

            

                <div class=\"col-2\">

                


                
                    <a href='";
                // line 72
                echo twig_escape_filter($this->env, ($context["enlace_jugador"] ?? null), "html", null, true);
                echo "' style=\"float:left\">
                        <img src='";
                // line 73
                echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
                echo twig_escape_filter($this->env, ($context["rutaJugador"] ?? null), "html", null, true);
                echo "' class='img-rounded' width='50' alt=\"jugador\">
                    </a>
                </div>

                <div class=\"";
                // line 77
                if (0 !== twig_compare(twig_get_attribute($this->env, $this->source, $context["jugador"], "posicion", [], "any", false, false, false, 77), 5)) {
                    echo "col-8";
                } else {
                    echo "col-10";
                }
                echo "\">
                    <span style='font-size: 15px'>
                        ";
                // line 79
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["jugador"], "nombre", [], "any", false, false, false, 79), "html", null, true);
                echo "
                    </span><br />
                    <span>
                       
                        ";
                // line 83
                if (0 !== twig_compare(twig_get_attribute($this->env, $this->source, $context["jugador"], "posicion", [], "any", false, false, false, 83), "5")) {
                    // line 84
                    echo "                        <span class=\"badge\" style=\"background-color:#626262; color:white; font-size: 14px; float:left; margin:5px; width:30px;\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["jugador"], "dorsal", [], "any", false, false, false, 84), "html", null, true);
                    echo "</span>
                        ";
                }
                // line 86
                echo "
                        <a style=\"color: #7bdb00;float:left\" href='";
                // line 87
                echo twig_escape_filter($this->env, ($context["enlace_jugador"] ?? null), "html", null, true);
                echo "'>
                            ";
                // line 88
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["jugador"], "apodo", [], "any", false, false, false, 88), "html", null, true);
                echo "
                        </a>
                    </span>
                    ";
                // line 91
                $context["fmJugador"] = twig_get_attribute($this->env, $this->source, $context["jugador"], "id", [], "any", false, false, false, 91);
                // line 92
                echo "                </div>

                ";
                // line 94
                if (0 !== twig_compare(twig_get_attribute($this->env, $this->source, $context["jugador"], "posicion", [], "any", false, false, false, 94), 5)) {
                    // line 95
                    echo "                    <div class=\"col-2 text-center\">
                        <span class='iconseparate'>
                            <img src=\"";
                    // line 97
                    echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
                    echo "static/img/balon.png\" height=\"17\" style=\"margin-bottom:3px\"></span>
                        <br />
                        ";
                    // line 99
                    if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["jugador"], "posicion", [], "any", false, false, false, 99), 1) && 1 === twig_compare(twig_get_attribute($this->env, $this->source, $context["jugador"], "goles", [], "any", false, false, false, 99), 0))) {
                        // line 100
                        echo "                            -
                        ";
                    }
                    // line 102
                    echo "                        ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["jugador"], "goles", [], "any", false, false, false, 102), "html", null, true);
                    echo "
                    </div>
                ";
                }
                // line 105
                echo "
            </div>

            ";
                // line 108
                $context["posicion"] = twig_get_attribute($this->env, $this->source, $context["jugador"], "posicion", [], "any", false, false, false, 108);
                // line 109
                echo "        ";
            }
            // line 110
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['jugador'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 112
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "equipo/__part/pesPlantilla.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  286 => 112,  279 => 110,  276 => 109,  274 => 108,  269 => 105,  262 => 102,  258 => 100,  256 => 99,  251 => 97,  247 => 95,  245 => 94,  241 => 92,  239 => 91,  233 => 88,  229 => 87,  226 => 86,  220 => 84,  218 => 83,  211 => 79,  202 => 77,  194 => 73,  190 => 72,  177 => 61,  175 => 60,  172 => 59,  170 => 57,  169 => 56,  168 => 55,  165 => 54,  162 => 53,  159 => 52,  156 => 51,  154 => 50,  151 => 49,  147 => 47,  140 => 43,  136 => 41,  132 => 39,  130 => 38,  127 => 37,  123 => 35,  121 => 34,  118 => 33,  116 => 32,  113 => 31,  111 => 30,  108 => 29,  106 => 28,  103 => 27,  101 => 26,  98 => 25,  96 => 24,  93 => 23,  91 => 22,  88 => 21,  86 => 20,  83 => 19,  80 => 18,  77 => 17,  74 => 16,  72 => 15,  69 => 14,  67 => 13,  64 => 12,  62 => 11,  59 => 10,  56 => 9,  52 => 8,  49 => 7,  47 => 6,  42 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "equipo/__part/pesPlantilla.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/equipo/__part/pesPlantilla.html.twig");
    }
}
