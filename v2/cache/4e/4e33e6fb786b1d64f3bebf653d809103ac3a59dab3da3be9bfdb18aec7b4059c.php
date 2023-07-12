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

/* temporada/__content/__part/pesEquipos.html.twig */
class __TwigTemplate_5c31c900941c305cd6e4a1516e3ed04e541137ef39010a1b7a8a55d008dfeb2c extends Template
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
        if ((isset($context["equipos"]) || array_key_exists("equipos", $context))) {
            // line 2
            echo "    <div id=\"contenedorLateralEquipos\" class=\"col-12\">
        ";
            // line 3
            $context["twiterols"] = "";
            // line 4
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["equipos"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["fila"]) {
                // line 5
                echo "
            <div class=\"row filaLateralEquiposEquipo\">

                ";
                // line 8
                if (twig_get_attribute($this->env, $this->source, $context["fila"], "es_seleccion", [], "any", false, false, false, 8)) {
                    // line 9
                    echo "                    ";
                    $context["rutaEscudo"] = (("/static/img/paises/banderas/ban" . twig_get_attribute($this->env, $this->source, $context["fila"], "pais_id", [], "any", false, false, false, 9)) . ".png");
                    // line 10
                    echo "                ";
                } else {
                    // line 11
                    echo "                    ";
                    $context["rutaEscudo"] = call_user_func_array($this->env->getFunction('rutaEscudo')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["fila"], "club_id", [], "any", false, false, false, 11), twig_get_attribute($this->env, $this->source, $context["fila"], "equipo_id", [], "any", false, false, false, 11)]);
                    // line 12
                    echo "                ";
                }
                // line 13
                echo "
                ";
                // line 14
                if ( !call_user_func_array($this->env->getFunction('fileExists')->getCallable(), [($context["rutaEscudo"] ?? null)])) {
                    // line 15
                    echo "                    ";
                    $context["rutaEscudo"] = "/static/img/jugadores/NI.png";
                    // line 16
                    echo "                ";
                }
                // line 17
                echo "
                ";
                // line 18
                $context["rutaEquipacion"] = (("/static/img/equipaciones/eq" . twig_get_attribute($this->env, $this->source, $context["fila"], "equipacion_id", [], "any", false, false, false, 18)) . ".png");
                // line 19
                echo "                ";
                if ( !call_user_func_array($this->env->getFunction('fileExists')->getCallable(), [($context["rutaEquipacion"] ?? null)])) {
                    // line 20
                    echo "                    ";
                    $context["rutaEquipacion"] = "/static/img/jugadores/NI.png";
                    // line 21
                    echo "                ";
                }
                // line 22
                echo "
                ";
                // line 23
                $context["rutaEstadio"] = (("/static/img/estadios/estadi" . twig_get_attribute($this->env, $this->source, $context["fila"], "estadio_id", [], "any", false, false, false, 23)) . ".png");
                // line 24
                echo "                ";
                if ( !call_user_func_array($this->env->getFunction('fileExists')->getCallable(), [($context["rutaEstadio"] ?? null)])) {
                    // line 25
                    echo "                    ";
                    $context["rutaEstadio"] = "/static/img/jugadores/NI.png";
                    // line 26
                    echo "                ";
                }
                // line 27
                echo "
                ";
                // line 28
                $context["urlEquipo"] = $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_index", ["idEquipo" => twig_get_attribute($this->env, $this->source,                 // line 29
$context["fila"], "equipo_id", [], "any", false, false, false, 29), "slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,                 // line 30
$context["fila"], "nombre", [], "any", false, false, false, 30)])]);
                // line 32
                echo "

                <div class=\"col-5\">
                    <div class=\"col-6 float-left\">
                        <a href=\"";
                // line 36
                echo twig_escape_filter($this->env, ($context["urlEquipo"] ?? null), "html", null, true);
                echo "\">
                            <img class=\"contenedorLateralEquiposEscudo\" src=\"";
                // line 37
                echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
                echo twig_escape_filter($this->env, ($context["rutaEscudo"] ?? null), "html", null, true);
                echo "\" alt=\"\">
                        </a>
                    </div>
                    ";
                // line 40
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["fila"], "es_seleccion", [], "any", false, false, false, 40), 0)) {
                    // line 41
                    echo "                        <div class=\"col-6 float-right\">
                            <a href=\"";
                    // line 42
                    echo twig_escape_filter($this->env, ($context["urlEquipo"] ?? null), "html", null, true);
                    echo "\">
                                <img class=\"contenedorLateralEquiposEquipacion\" src=\"";
                    // line 43
                    echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
                    echo twig_escape_filter($this->env, ($context["rutaEquipacion"] ?? null), "html", null, true);
                    echo "\" alt=\"\">
                            </a>
                        </div>
                    ";
                }
                // line 47
                echo "                </div>
                <div class=\"col-6 filaLateralEquiposEquipoContenedorDatosEquipo\">
                    <div class=\"col-12\">
                        <h3 class=\"equiposLateralNombreEquipo\">
                            <a href=\"";
                // line 51
                echo twig_escape_filter($this->env, ($context["urlEquipo"] ?? null), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "nombre", [], "any", false, false, false, 51), "html", null, true);
                echo "</a>
                        </h3>
                    </div>
                    ";
                // line 68
                echo "                    <div class=\"col-12\">
                        <div class=\"comunidad flag";
                // line 69
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "comunidad_id", [], "any", false, false, false, 69), "html", null, true);
                echo "\"></div>
                    </div>
                </div>
                <div class=\"col-1 filaLateralEquiposEquipoContenedorAnadirAMiFutbolme\">
                    ";
                // line 80
                echo "                </div>

                <div class=\"filaLateralEquiposEquipoSeparador\"></div>

            </div>

        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['fila'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 87
            echo "    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "temporada/__content/__part/pesEquipos.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  184 => 87,  172 => 80,  165 => 69,  162 => 68,  154 => 51,  148 => 47,  140 => 43,  136 => 42,  133 => 41,  131 => 40,  124 => 37,  120 => 36,  114 => 32,  112 => 30,  111 => 29,  110 => 28,  107 => 27,  104 => 26,  101 => 25,  98 => 24,  96 => 23,  93 => 22,  90 => 21,  87 => 20,  84 => 19,  82 => 18,  79 => 17,  76 => 16,  73 => 15,  71 => 14,  68 => 13,  65 => 12,  62 => 11,  59 => 10,  56 => 9,  54 => 8,  49 => 5,  44 => 4,  42 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "temporada/__content/__part/pesEquipos.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.eu/v2/templates/temporada/__content/__part/pesEquipos.html.twig");
    }
}
