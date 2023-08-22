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

/* temporada/__content/__part/eliminatorioClasificacion.html.twig */
class __TwigTemplate_2fee8f54b185dd1bf849b0e2dd837d300d0423deccec1f93d540ce03e3d715da extends Template
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
    <div class=\"col-12\" style=\"padding: 0px;\">
        <div class=\"row\">
            <div class=\"col-12\">
                <div id=\"topLaTabla\">

                </div>
            </div>
        </div>
        <table id=\"latabla\" class=\"table tablesorter table-condensed\">
            <thead>
            <tr>
                <th class=\"text-center\" title=\"Posición\">
                    <strong>P</strong>
                </th>
                <th style=\"min-width: 130px\" class=\"text-center\">
                    <strong>Equipo</strong>
                </th>
                <th class=\"text-center\" title=\"Puntos\">
                    <strong>Pts</strong>
                </th>
                <th class=\"text-center\" title=\"Jugados\">
                    Ju
                </th>
                <th class=\"text-center\" title=\"Ganados\">
                    Ga
                </th>
                <th class=\"text-center\" title=\"Empatados\">
                    Em
                </th>
                <th class=\"text-center\" title=\"Perdidos\">
                    Pe
                </th>
                <th class=\"text-center\" title=\"Goles a favor\">
                    Fv
                </th>
                <th class=\"text-center\" title=\"Goles en contra\">
                    Cn
                </th>
                <th class=\"text-center\" title=\"Diferencia de goles\">
                    Di
                </th>
            </tr>
            </thead>

            <tbody>

            ";
        // line 48
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["clasificacionGrupo"] ?? null), "clasificacionFinal", [], "any", false, false, false, 48));
        foreach ($context['_seq'] as $context["key"] => $context["fila"]) {
            // line 49
            echo "
                ";
            // line 56
            echo "
                ";
            // line 57
            $context["pgEquipo"] = ($this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_index", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,             // line 58
$context["fila"], "nombre", [], "any", false, false, false, 58)]), "idEquipo" => (10000000 + twig_get_attribute($this->env, $this->source,             // line 59
$context["fila"], "equipo_id", [], "any", false, false, false, 59))]) . "/datos");
            // line 61
            echo "
                ";
            // line 62
            if (0 === twig_compare(($context["key"] % 2), 0)) {
                // line 63
                echo "                    ";
                $context["classFila"] = "fila-par";
                // line 64
                echo "                ";
            } else {
                // line 65
                echo "                    ";
                $context["classFila"] = "fila-impar";
                // line 66
                echo "                ";
            }
            // line 67
            echo "
                <tr class=\"";
            // line 68
            echo twig_escape_filter($this->env, ($context["classFila"] ?? null), "html", null, true);
            echo "\">

                    <td class=\"text-center\" style=\"";
            // line 70
            echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["fila"], "css", [], "any", false, false, false, 70), ["background-color" => "color", "white" => "#000000", "gold" => "#F1C422", "#FFEE00" => "#F1C422", "orange" => "#E38800", "indianred" => "#E80000"]), "html", null, true);
            // line 79
            echo "\">
                        ";
            // line 80
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "posicion", [], "any", false, false, false, 80), "html", null, true);
            echo "
                    </td>

                    <td>
                        <a href=\"";
            // line 84
            echo twig_escape_filter($this->env, ($context["pgEquipo"] ?? null), "html", null, true);
            echo "\">
                            ";
            // line 85
            if ((isset($context["seleccion"]) || array_key_exists("seleccion", $context))) {
                // line 86
                echo "
                                ";
                // line 87
                if (0 === twig_compare(($context["seleccion"] ?? null), 1)) {
                    // line 88
                    echo "                                    ";
                    $context["bandera"] = call_user_func_array($this->env->getFunction('XsacarBandera')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["fila"], "equipo_id", [], "any", false, false, false, 88)]);
                    // line 89
                    echo "                                    ";
                    $context["urlBandera"] = (("/static/img/paises/banderas/ban" . ($context["bandera"] ?? null)) . "b.png");
                    // line 90
                    echo "                                    ";
                    $context["anchoBandera"] = 34;
                    // line 91
                    echo "                                    ";
                    $context["altoBandera"] = 20;
                    // line 92
                    echo "
                                ";
                } else {
                    // line 94
                    echo "
                                    ";
                    // line 95
                    $context["urlBandera"] = (("/static/img/equipos/escudo" . twig_get_attribute($this->env, $this->source, $context["fila"], "equipo_id", [], "any", false, false, false, 95)) . ".png");
                    // line 96
                    echo "                                    ";
                    $context["anchoBandera"] = 18;
                    // line 97
                    echo "                                    ";
                    $context["altoBandera"] = 20;
                    // line 98
                    echo "
                                ";
                }
                // line 100
                echo "
                            ";
            } else {
                // line 102
                echo "
                                ";
                // line 103
                $context["urlBandera"] = (("/static/img/equipos/escudo" . twig_get_attribute($this->env, $this->source, $context["fila"], "equipo_id", [], "any", false, false, false, 103)) . ".png");
                // line 104
                echo "                                ";
                $context["anchoBandera"] = 18;
                // line 105
                echo "                                ";
                $context["altoBandera"] = 20;
                // line 106
                echo "
                            ";
            }
            // line 108
            echo "
                            ";
            // line 109
            if ( !call_user_func_array($this->env->getFunction('fileExists')->getCallable(), [("../public" . ($context["urlBandera"] ?? null))])) {
                // line 110
                echo "                                ";
                $context["urlBandera"] = "/static/img/equipos/NI.png";
                // line 111
                echo "                            ";
            }
            // line 112
            echo "
                            <img src=\"";
            // line 113
            echo twig_escape_filter($this->env, ($context["urlBandera"] ?? null), "html", null, true);
            echo "\" alt=\"escudo\"  style=\"width:";
            echo twig_escape_filter($this->env, ($context["anchoBandera"] ?? null), "html", null, true);
            echo "px; height:";
            echo twig_escape_filter($this->env, ($context["altoBandera"] ?? null), "html", null, true);
            echo "px\">

                            <strong>";
            // line 115
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "nombre", [], "any", false, false, false, 115), "html", null, true);
            echo "</strong>
                        </a>
                    </td>

                    <td class=\"text-center\">";
            // line 119
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "puntos", [], "any", false, false, false, 119), "html", null, true);
            echo "</td>
                    <td class=\"text-center\">";
            // line 120
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "jugados", [], "any", false, false, false, 120), "html", null, true);
            echo "</td>
                    <td class=\"text-center\">";
            // line 121
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "ganados", [], "any", false, false, false, 121), "html", null, true);
            echo "</td>
                    <td class=\"text-center\">";
            // line 122
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "empatados", [], "any", false, false, false, 122), "html", null, true);
            echo "</td>
                    <td class=\"text-center\">";
            // line 123
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "perdidos", [], "any", false, false, false, 123), "html", null, true);
            echo "</td>
                    <td class=\"text-center\">";
            // line 124
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "gFavor", [], "any", false, false, false, 124), "html", null, true);
            echo "</td>
                    <td class=\"text-center\">";
            // line 125
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "gContra", [], "any", false, false, false, 125), "html", null, true);
            echo "</td>
                    <td class=\"text-center\">";
            // line 126
            echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, $context["fila"], "gFavor", [], "any", false, false, false, 126) - twig_get_attribute($this->env, $this->source, $context["fila"], "gContra", [], "any", false, false, false, 126)), "html", null, true);
            echo "</td>

                </tr>

            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['fila'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 131
        echo "
            </tbody>
        </table>
        <div class=\"row\">
            <div class=\"col-12\">
                <div id=\"bottomLaTabla\" class=\"";
        // line 136
        echo twig_escape_filter($this->env, ($context["classFila"] ?? null), "html", null, true);
        echo "\">

                </div>
            </div>
        </div>
    </div>
</div>

<div class=\"row\">
    <div class=\"col-12\" style=\"padding: 0px;\">
        <div class=\"col-12 contenedorLeyendaClasificacion\" style=\"float: left; background: #4A4A4A; -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;\">
            ";
        // line 149
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["clasificacionGrupo"] ?? null), "leyenda", [], "any", false, false, false, 149));
        foreach ($context['_seq'] as $context["_key"] => $context["fila"]) {
            // line 150
            echo "                <div class=\"text-left\" style=\"float: left; margin-right: 20px; color:";
            echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["fila"], "fondo", [], "any", false, false, false, 150), ["white" => "#000000", "gold" => "#F1C422", "orange" => "#E38800", "indianred" => "#E80000"]), "html", null, true);
            // line 157
            echo "\">
                    ";
            // line 158
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "leyenda", [], "any", false, false, false, 158), "html", null, true);
            echo "
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['fila'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 161
        echo "        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "temporada/__content/__part/eliminatorioClasificacion.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  309 => 161,  300 => 158,  297 => 157,  294 => 150,  290 => 149,  274 => 136,  267 => 131,  256 => 126,  252 => 125,  248 => 124,  244 => 123,  240 => 122,  236 => 121,  232 => 120,  228 => 119,  221 => 115,  212 => 113,  209 => 112,  206 => 111,  203 => 110,  201 => 109,  198 => 108,  194 => 106,  191 => 105,  188 => 104,  186 => 103,  183 => 102,  179 => 100,  175 => 98,  172 => 97,  169 => 96,  167 => 95,  164 => 94,  160 => 92,  157 => 91,  154 => 90,  151 => 89,  148 => 88,  146 => 87,  143 => 86,  141 => 85,  137 => 84,  130 => 80,  127 => 79,  125 => 70,  120 => 68,  117 => 67,  114 => 66,  111 => 65,  108 => 64,  105 => 63,  103 => 62,  100 => 61,  98 => 59,  97 => 58,  96 => 57,  93 => 56,  90 => 49,  86 => 48,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "temporada/__content/__part/eliminatorioClasificacion.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/temporada/__content/__part/eliminatorioClasificacion.html.twig");
    }
}
