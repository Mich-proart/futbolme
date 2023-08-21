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

/* temporada/__content/__part/eliminatorioClasificacionGrupos.html.twig */
class __TwigTemplate_d0afead569e5e335d9ddec1dcdde587b44490ed212deed53ca633eba8800417e extends Template
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
        ";
        // line 3
        if ((isset($context["clasificacionGrupo"]) || array_key_exists("clasificacionGrupo", $context))) {
            // line 4
            echo "
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
            // line 50
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["clasificacionGrupo"] ?? null), "clasificacionFinal", [], "any", false, false, false, 50));
            foreach ($context['_seq'] as $context["key"] => $context["fila"]) {
                // line 51
                echo "
                    ";
                // line 58
                echo "
                    ";
                // line 59
                $context["pgEquipo"] = ($this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_index", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,                 // line 60
$context["fila"], "nombre", [], "any", false, false, false, 60)]), "idEquipo" => twig_get_attribute($this->env, $this->source,                 // line 61
$context["fila"], "equipo_id", [], "any", false, false, false, 61)]) . "/datos");
                // line 63
                echo "

                    ";
                // line 65
                $context["color_fondo"] = "white";
                // line 66
                echo "                    ";
                $context["filaEnJuego"] = false;
                // line 67
                echo "                    ";
                if (twig_get_attribute($this->env, $this->source, $context["fila"], "preferente", [], "any", true, true, false, 67)) {
                    // line 68
                    echo "                        ";
                    if (twig_get_attribute($this->env, $this->source, $context["fila"], "preferente", [], "any", false, false, false, 68)) {
                        // line 69
                        echo "                            ";
                        $context["color_fondo"] = "yellow";
                        // line 70
                        echo "                            ";
                        $context["filaEnJuego"] = true;
                        // line 71
                        echo "                        ";
                    }
                    // line 72
                    echo "                    ";
                }
                // line 73
                echo "
                    ";
                // line 74
                if (0 === twig_compare(($context["key"] % 2), 0)) {
                    // line 75
                    echo "                        ";
                    $context["classFila"] = "fila-par";
                    // line 76
                    echo "                    ";
                } else {
                    // line 77
                    echo "                        ";
                    $context["classFila"] = "fila-impar";
                    // line 78
                    echo "                    ";
                }
                // line 79
                echo "
                    <tr class=\"";
                // line 80
                echo twig_escape_filter($this->env, ($context["classFila"] ?? null), "html", null, true);
                echo "\" ";
                if (($context["filaEnJuego"] ?? null)) {
                    echo "style=\"background: #FDDE02;\"";
                }
                echo ">

                        <td class=\"text-center\" style=\"";
                // line 82
                echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["fila"], "css", [], "any", false, false, false, 82), ["background-color" => "color", "white" => "#000000", "gold" => "#F1C422", "#FFEE00" => "#F1C422", "orange" => "#E38800", "indianred" => "#E80000"]), "html", null, true);
                // line 91
                echo "\">
                            ";
                // line 92
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "posicion", [], "any", false, false, false, 92), "html", null, true);
                echo "
                        </td>

                        <td>
                            <a href=\"";
                // line 96
                echo twig_escape_filter($this->env, ($context["pgEquipo"] ?? null), "html", null, true);
                echo "\">
                                ";
                // line 97
                if ((isset($context["seleccion"]) || array_key_exists("seleccion", $context))) {
                    // line 98
                    echo "
                                    ";
                    // line 99
                    if (0 === twig_compare(($context["seleccion"] ?? null), 1)) {
                        // line 100
                        echo "                                        ";
                        $context["bandera"] = call_user_func_array($this->env->getFunction('XsacarBandera')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["fila"], "equipo_id", [], "any", false, false, false, 100)]);
                        // line 101
                        echo "                                        ";
                        $context["urlBandera"] = (("/static/img/paises/banderas/ban" . ($context["bandera"] ?? null)) . "b.png");
                        // line 102
                        echo "                                        ";
                        $context["anchoBandera"] = 34;
                        // line 103
                        echo "                                        ";
                        $context["altoBandera"] = 20;
                        // line 104
                        echo "
                                    ";
                    } else {
                        // line 106
                        echo "
                                        ";
                        // line 107
                        $context["urlBandera"] = (("/static/img/equipos/escudo" . twig_get_attribute($this->env, $this->source, $context["fila"], "equipo_id", [], "any", false, false, false, 107)) . ".png");
                        // line 108
                        echo "                                        ";
                        $context["anchoBandera"] = 18;
                        // line 109
                        echo "                                        ";
                        $context["altoBandera"] = 20;
                        // line 110
                        echo "
                                    ";
                    }
                    // line 112
                    echo "
                                ";
                } else {
                    // line 114
                    echo "
                                    ";
                    // line 115
                    $context["urlBandera"] = (("/static/img/equipos/escudo" . twig_get_attribute($this->env, $this->source, $context["fila"], "equipo_id", [], "any", false, false, false, 115)) . ".png");
                    // line 116
                    echo "                                    ";
                    $context["anchoBandera"] = 18;
                    // line 117
                    echo "                                    ";
                    $context["altoBandera"] = 20;
                    // line 118
                    echo "
                                ";
                }
                // line 120
                echo "
                                ";
                // line 121
                if ( !call_user_func_array($this->env->getFunction('fileExists')->getCallable(), [("../public" . ($context["urlBandera"] ?? null))])) {
                    // line 122
                    echo "                                    ";
                    $context["urlBandera"] = "/static/img/equipos/NI.png";
                    // line 123
                    echo "                                ";
                }
                // line 124
                echo "
                                <img src=\"";
                // line 125
                echo twig_escape_filter($this->env, ($context["urlBandera"] ?? null), "html", null, true);
                echo "\" alt=\"escudo\"  style=\"width:";
                echo twig_escape_filter($this->env, ($context["anchoBandera"] ?? null), "html", null, true);
                echo "px; height:";
                echo twig_escape_filter($this->env, ($context["altoBandera"] ?? null), "html", null, true);
                echo "px\">

                                <strong>";
                // line 127
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "nombre", [], "any", false, false, false, 127), "html", null, true);
                echo "</strong>
                            </a>
                        </td>

                        <td class=\"text-center\">";
                // line 131
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "puntos", [], "any", false, false, false, 131), "html", null, true);
                echo "</td>
                        <td class=\"text-center\">";
                // line 132
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "jugados", [], "any", false, false, false, 132), "html", null, true);
                echo "</td>
                        <td class=\"text-center\">";
                // line 133
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "ganados", [], "any", false, false, false, 133), "html", null, true);
                echo "</td>
                        <td class=\"text-center\">";
                // line 134
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "empatados", [], "any", false, false, false, 134), "html", null, true);
                echo "</td>
                        <td class=\"text-center\">";
                // line 135
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "perdidos", [], "any", false, false, false, 135), "html", null, true);
                echo "</td>
                        <td class=\"text-center\">";
                // line 136
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "gFavor", [], "any", false, false, false, 136), "html", null, true);
                echo "</td>
                        <td class=\"text-center\">";
                // line 137
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "gContra", [], "any", false, false, false, 137), "html", null, true);
                echo "</td>
                        <td class=\"text-center\">";
                // line 138
                echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, $context["fila"], "gFavor", [], "any", false, false, false, 138) - twig_get_attribute($this->env, $this->source, $context["fila"], "gContra", [], "any", false, false, false, 138)), "html", null, true);
                echo "</td>

                    </tr>

                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['fila'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 143
            echo "
                </tbody>
            </table>
            <div class=\"row\">
                <div class=\"col-12\">
                    <div id=\"bottomLaTabla\" class=\"";
            // line 148
            echo twig_escape_filter($this->env, ($context["classFila"] ?? null), "html", null, true);
            echo "\">

                    </div>
                </div>
            </div>

        ";
        }
        // line 155
        echo "    </div>
</div>

<div class=\"row\">
    <div class=\"col-12\" style=\"padding: 0px;\">
        <div class=\"col-12 contenedorLeyendaClasificacion\" style=\"float: left; background: #4A4A4A; -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;\">
            ";
        // line 163
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["clasificacionGrupo"] ?? null), "leyenda", [], "any", false, false, false, 163));
        foreach ($context['_seq'] as $context["_key"] => $context["fila"]) {
            // line 164
            echo "                <div class=\"text-left\" style=\"float: left; margin-right: 20px; color:";
            echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["fila"], "fondo", [], "any", false, false, false, 164), ["white" => "#000000", "gold" => "#F1C422", "orange" => "#E38800", "indianred" => "#E80000"]), "html", null, true);
            // line 171
            echo "\">
                    ";
            // line 172
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "leyenda", [], "any", false, false, false, 172), "html", null, true);
            echo "
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['fila'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 175
        echo "        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "temporada/__content/__part/eliminatorioClasificacionGrupos.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  349 => 175,  340 => 172,  337 => 171,  334 => 164,  330 => 163,  320 => 155,  310 => 148,  303 => 143,  292 => 138,  288 => 137,  284 => 136,  280 => 135,  276 => 134,  272 => 133,  268 => 132,  264 => 131,  257 => 127,  248 => 125,  245 => 124,  242 => 123,  239 => 122,  237 => 121,  234 => 120,  230 => 118,  227 => 117,  224 => 116,  222 => 115,  219 => 114,  215 => 112,  211 => 110,  208 => 109,  205 => 108,  203 => 107,  200 => 106,  196 => 104,  193 => 103,  190 => 102,  187 => 101,  184 => 100,  182 => 99,  179 => 98,  177 => 97,  173 => 96,  166 => 92,  163 => 91,  161 => 82,  152 => 80,  149 => 79,  146 => 78,  143 => 77,  140 => 76,  137 => 75,  135 => 74,  132 => 73,  129 => 72,  126 => 71,  123 => 70,  120 => 69,  117 => 68,  114 => 67,  111 => 66,  109 => 65,  105 => 63,  103 => 61,  102 => 60,  101 => 59,  98 => 58,  95 => 51,  91 => 50,  43 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "temporada/__content/__part/eliminatorioClasificacionGrupos.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/temporada/__content/__part/eliminatorioClasificacionGrupos.html.twig");
    }
}
