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
class __TwigTemplate_427c86cbbd8c7297c7e9b963a4cbbecaecbd95ee01ceccbc7f59aee18cbca29f extends Template
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
            // line 4
            $context["twiterols"] = "";
            // line 5
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["equipos"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["fila"]) {
                // line 6
                echo "
            <div class=\"row filaLateralEquiposEquipo\">

                ";
                // line 9
                if (twig_get_attribute($this->env, $this->source, $context["fila"], "es_seleccion", [], "any", false, false, false, 9)) {
                    // line 10
                    echo "                    ";
                    $context["rutaEscudo"] = (("/static/img/paises/banderas/ban" . twig_get_attribute($this->env, $this->source, $context["fila"], "pais_id", [], "any", false, false, false, 10)) . ".png");
                    // line 11
                    echo "                ";
                } else {
                    // line 12
                    echo "                    ";
                    $context["rutaEscudo"] = call_user_func_array($this->env->getFunction('rutaEscudo')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["fila"], "club_id", [], "any", false, false, false, 12), twig_get_attribute($this->env, $this->source, $context["fila"], "equipo_id", [], "any", false, false, false, 12)]);
                    // line 13
                    echo "                ";
                }
                // line 14
                echo "
                ";
                // line 15
                if ( !call_user_func_array($this->env->getFunction('fileExists')->getCallable(), [($context["rutaEscudo"] ?? null)])) {
                    // line 16
                    echo "                    ";
                    $context["rutaEscudo"] = "/static/img/jugadores/NI.png";
                    // line 17
                    echo "                ";
                }
                // line 18
                echo "
                ";
                // line 19
                $context["rutaEquipacion"] = (("/static/img/equipaciones/eq" . twig_get_attribute($this->env, $this->source, $context["fila"], "equipacion_id", [], "any", false, false, false, 19)) . ".png");
                // line 20
                echo "                ";
                if ( !call_user_func_array($this->env->getFunction('fileExists')->getCallable(), [($context["rutaEquipacion"] ?? null)])) {
                    // line 21
                    echo "                    ";
                    $context["rutaEquipacion"] = "/static/img/jugadores/NI.png";
                    // line 22
                    echo "                ";
                }
                // line 23
                echo "
                ";
                // line 24
                $context["rutaEstadio"] = (("/static/img/estadios/estadi" . twig_get_attribute($this->env, $this->source, $context["fila"], "estadio_id", [], "any", false, false, false, 24)) . ".png");
                // line 25
                echo "                ";
                if ( !call_user_func_array($this->env->getFunction('fileExists')->getCallable(), [($context["rutaEstadio"] ?? null)])) {
                    // line 26
                    echo "                    ";
                    $context["rutaEstadio"] = "/static/img/jugadores/NI.png";
                    // line 27
                    echo "                ";
                }
                // line 28
                echo "
                ";
                // line 29
                $context["urlEquipo"] = $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_index", ["idEquipo" => twig_get_attribute($this->env, $this->source,                 // line 30
$context["fila"], "equipo_id", [], "any", false, false, false, 30), "slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,                 // line 31
$context["fila"], "nombre", [], "any", false, false, false, 31)])]);
                // line 33
                echo "

                <div class=\"col-5\">
                    <div class=\"col-6 float-left\">
                        <a href=\"";
                // line 37
                echo twig_escape_filter($this->env, ($context["urlEquipo"] ?? null), "html", null, true);
                echo "\">
                            <img class=\"contenedorLateralEquiposEscudo\" src=\"";
                // line 38
                echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
                echo twig_escape_filter($this->env, ($context["rutaEscudo"] ?? null), "html", null, true);
                echo "\" alt=\"\">
                        </a>
                    </div>
                    ";
                // line 41
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["fila"], "es_seleccion", [], "any", false, false, false, 41), 0)) {
                    // line 42
                    echo "                        <div class=\"col-6 float-right\">
                            <a href=\"";
                    // line 43
                    echo twig_escape_filter($this->env, ($context["urlEquipo"] ?? null), "html", null, true);
                    echo "\">
                                <img class=\"contenedorLateralEquiposEquipacion\" src=\"";
                    // line 44
                    echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
                    echo twig_escape_filter($this->env, ($context["rutaEquipacion"] ?? null), "html", null, true);
                    echo "\" alt=\"\">
                            </a>
                        </div>
                    ";
                }
                // line 48
                echo "                </div>
                <div class=\"col-6 filaLateralEquiposEquipoContenedorDatosEquipo\">
                    <div class=\"col-12\">
                        <h3 class=\"equiposLateralNombreEquipo\">
                            <a href=\"";
                // line 52
                echo twig_escape_filter($this->env, ($context["urlEquipo"] ?? null), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "nombre", [], "any", false, false, false, 52), "html", null, true);
                echo "</a>
                        </h3>
                    </div>
                    ";
                // line 69
                echo "                    <div class=\"col-12\">
                        <div class=\"comunidad flag";
                // line 70
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "comunidad_id", [], "any", false, false, false, 70), "html", null, true);
                echo "\"></div>
                    </div>
                </div>
                <div class=\"col-1 filaLateralEquiposEquipoContenedorAnadirAMiFutbolme\">
                    ";
                // line 81
                echo "                </div>

                <div class=\"filaLateralEquiposEquipoSeparador\"></div>

            </div>

        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['fila'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 88
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
        return array (  185 => 88,  173 => 81,  166 => 70,  163 => 69,  155 => 52,  149 => 48,  141 => 44,  137 => 43,  134 => 42,  132 => 41,  125 => 38,  121 => 37,  115 => 33,  113 => 31,  112 => 30,  111 => 29,  108 => 28,  105 => 27,  102 => 26,  99 => 25,  97 => 24,  94 => 23,  91 => 22,  88 => 21,  85 => 20,  83 => 19,  80 => 18,  77 => 17,  74 => 16,  72 => 15,  69 => 14,  66 => 13,  63 => 12,  60 => 11,  57 => 10,  55 => 9,  50 => 6,  45 => 5,  43 => 4,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "temporada/__content/__part/pesEquipos.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.eu/v2/templates/temporada/__content/__part/pesEquipos.html.twig");
    }
}
