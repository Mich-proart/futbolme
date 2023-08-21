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

/* equipo/__part/pesClasificacion.html.twig */
class __TwigTemplate_45843f4fb48e8dd98d418d017a5b19dbbb5a6fe85d6bd43493fd80f7a1830e7a extends Template
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
        echo "<div class=\"col-12\" style=\"padding: 0px; margin-top: 10px;\">

    ";
        // line 3
        $context["jornadaActiva"] = 0;
        // line 4
        echo "    ";
        if ((((isset($context["ePartidos"]) || array_key_exists("ePartidos", $context)) && (isset($context["e_racha"]) || array_key_exists("e_racha", $context))) && -1 === twig_compare(($context["tipoVista"] ?? null), 10))) {
            // line 5
            echo "        ";
            $context["jornadaActiva"] = (twig_length_filter($this->env, ($context["e_racha"] ?? null)) - 1);
            // line 6
            echo "        ";
            $this->loadTemplate("equipo/__part/puntosYgoles.html.twig", "equipo/__part/pesClasificacion.html.twig", 6)->display($context);
            // line 7
            echo "    ";
        }
        // line 8
        echo "
    <div class=\"row\">
        <div class=\"col-12\">
            <ul class=\"nav nav-tabs menuListGrises\" role=\"tablist\" id=\"pestaTemporada\">
                <li class=\"text-center\">
                    <a style=\"padding-left: 8px; padding-right: 8px;\" class=\"btn btn-secondary ";
        // line 13
        echo twig_escape_filter($this->env, ($context["pesPuntos"] ?? null), "html", null, true);
        echo "\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_clasificacion", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [        // line 14
($context["equipotxt"] ?? null)]), "idEquipo" =>         // line 15
($context["equipo_id"] ?? null), "vista" => "puntos"]), "html", null, true);
        // line 17
        echo "\">Puntos</a>
                </li>
                <li class=\"text-center\">
                    <a style=\"padding-left: 8px; padding-right: 8px;\" class=\"btn btn-secondary ";
        // line 20
        echo twig_escape_filter($this->env, ($context["pesJugados"] ?? null), "html", null, true);
        echo "\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_clasificacion", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [        // line 21
($context["equipotxt"] ?? null)]), "idEquipo" =>         // line 22
($context["equipo_id"] ?? null), "vista" => "jugados"]), "html", null, true);
        // line 24
        echo "\">Jugados</a>
                </li>
                <li class=\"text-center\">
                    <a style=\"padding-left: 8px; padding-right: 8px;\" class=\"btn btn-secondary ";
        // line 27
        echo twig_escape_filter($this->env, ($context["pesGanados"] ?? null), "html", null, true);
        echo "\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_clasificacion", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [        // line 28
($context["equipotxt"] ?? null)]), "idEquipo" =>         // line 29
($context["equipo_id"] ?? null), "vista" => "ganados"]), "html", null, true);
        // line 31
        echo "\">Ganados</a>
                </li>
                <li class=\"text-center\">
                    <a style=\"padding-left: 8px; padding-right: 8px;\" class=\"btn btn-secondary ";
        // line 34
        echo twig_escape_filter($this->env, ($context["pesEmpatados"] ?? null), "html", null, true);
        echo "\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_clasificacion", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [        // line 35
($context["equipotxt"] ?? null)]), "idEquipo" =>         // line 36
($context["equipo_id"] ?? null), "vista" => "empatados"]), "html", null, true);
        // line 38
        echo "\">Empatados</a>
                </li>
                <li class=\"text-center\">
                    <a style=\"padding-left: 8px; padding-right: 8px;\" class=\"btn btn-secondary ";
        // line 41
        echo twig_escape_filter($this->env, ($context["pesPerdidos"] ?? null), "html", null, true);
        echo "\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_clasificacion", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [        // line 42
($context["equipotxt"] ?? null)]), "idEquipo" =>         // line 43
($context["equipo_id"] ?? null), "vista" => "perdidos"]), "html", null, true);
        // line 45
        echo "\">Perdidos</a>
                </li>
                <li class=\"text-center\">
                    <a style=\"padding-left: 8px; padding-right: 8px;\" class=\"btn btn-secondary ";
        // line 48
        echo twig_escape_filter($this->env, ($context["pesFavor"] ?? null), "html", null, true);
        echo "\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_clasificacion", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [        // line 49
($context["equipotxt"] ?? null)]), "idEquipo" =>         // line 50
($context["equipo_id"] ?? null), "vista" => "favor"]), "html", null, true);
        // line 52
        echo "\">G-Favor</a>
                </li>
                <li class=\"text-center\">
                    <a style=\"padding-left: 8px; padding-right: 8px;\" class=\"btn btn-secondary ";
        // line 55
        echo twig_escape_filter($this->env, ($context["pesContra"] ?? null), "html", null, true);
        echo "\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_clasificacion", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [        // line 56
($context["equipotxt"] ?? null)]), "idEquipo" =>         // line 57
($context["equipo_id"] ?? null), "vista" => "contra"]), "html", null, true);
        // line 59
        echo "\">G-Contra</a>
                </li>
                <li class=\"text-center\">
                    <a style=\"padding-left: 8px; padding-right: 8px;\" class=\"btn btn-secondary ";
        // line 62
        echo twig_escape_filter($this->env, ($context["pesEstadisticas"] ?? null), "html", null, true);
        echo "\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_clasificacion", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [        // line 63
($context["equipotxt"] ?? null)]), "idEquipo" =>         // line 64
($context["equipo_id"] ?? null), "vista" => "estadisticas"]), "html", null, true);
        // line 66
        echo "\">Estadísticas</a>
                </li>
            </ul>
        </div>
    </div>

    ";
        // line 72
        if ( !twig_test_empty(($context["ePartidosFiltrados"] ?? null))) {
            // line 73
            echo "        <div class=\"contenedorBlancoBordesRedondeados\">
            <table class=\"col-12\">
                ";
            // line 75
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["ePartidosFiltrados"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["partido"]) {
                // line 76
                echo "                    <tr>
                        <td class=\"text-center\">
                            ";
                // line 78
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "jornada", [], "any", false, false, false, 78), "html", null, true);
                echo "
                        </td>
                        <td class=\"text-right\">
                            <a href=\"";
                // line 81
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "pgEnlace1", [], "any", false, false, false, 81), "html", null, true);
                echo "\" style=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "Flocal", [], "any", false, false, false, 81), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "localCorto", [], "any", false, false, false, 81), "html", null, true);
                echo "</a>
                        </td>
                        <td class=\"text-center\">
                            <strong>";
                // line 84
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "goles_local", [], "any", false, false, false, 84), "html", null, true);
                echo " - ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "goles_visitante", [], "any", false, false, false, 84), "html", null, true);
                echo "</strong>
                        </td>
                        <td>
                            <a href=\"";
                // line 87
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "pgEnlace2", [], "any", false, false, false, 87), "html", null, true);
                echo "\" style=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "Fvisitante", [], "any", false, false, false, 87), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "visitanteCorto", [], "any", false, false, false, 87), "html", null, true);
                echo "</a>
                        </td>
                        <td class=\"text-center\" style=\"color:#FFFFFF;\">
                            ";
                // line 90
                echo twig_get_attribute($this->env, $this->source, $context["partido"], "icono", [], "any", false, false, false, 90);
                echo "
                        </td>
                        <td class=\"text-center\" style=\"color:#FFFFFF;\">
                            ";
                // line 93
                echo twig_get_attribute($this->env, $this->source, $context["partido"], "iconoGF", [], "any", false, false, false, 93);
                echo "
                        </td>
                        <td class=\"text-center\" style=\"color:#FFFFFF;\">
                            ";
                // line 96
                echo twig_get_attribute($this->env, $this->source, $context["partido"], "iconoGC", [], "any", false, false, false, 96);
                echo "
                        </td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['partido'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 100
            echo "                <tr>
                    <td colspan=\"8\" style=\"background: rgb(74, 74, 74); padding: 5px 0px;\">
                        <div class=\"col-12\">
                            <div class=\"contenedorBlancoBordesRedondeados\" style=\"float:left; padding: 3px 8px; margin-right: 5px;\">
                                G - ";
            // line 104
            echo twig_escape_filter($this->env, (($context["gcT"] ?? null) + ($context["gfT"] ?? null)), "html", null, true);
            echo "
                                <span class=\"badge\" style=\"font-weight:300; background-color:#0B610B; color:#FFFFFF;\">";
            // line 105
            echo twig_escape_filter($this->env, ($context["gcT"] ?? null), "html", null, true);
            echo "</span>
                                <span class=\"badge\" style=\"font-weight:300; background-color:#01DF01; color:#FFFFFF;\">";
            // line 106
            echo twig_escape_filter($this->env, ($context["gfT"] ?? null), "html", null, true);
            echo "</span>
                            </div>
                            <div class=\"contenedorBlancoBordesRedondeados\" style=\"float:left; padding: 3px 8px; margin-right: 5px;\">
                                E - ";
            // line 109
            echo twig_escape_filter($this->env, (($context["ecT"] ?? null) + ($context["efT"] ?? null)), "html", null, true);
            echo "
                                <span class=\"badge\" style=\"font-weight:300; background-color:orange; color:#FFFFFF;\">";
            // line 110
            echo twig_escape_filter($this->env, ($context["ecT"] ?? null), "html", null, true);
            echo "</span>
                                <span class=\"badge\" style=\"font-weight:300; background-color:#FACC2E; color:#FFFFFF;\">";
            // line 111
            echo twig_escape_filter($this->env, ($context["efT"] ?? null), "html", null, true);
            echo "</span>
                            </div>
                            <div class=\"contenedorBlancoBordesRedondeados\" style=\"float:left; padding: 3px 8px; margin-right: 5px;\">
                                P - ";
            // line 114
            echo twig_escape_filter($this->env, (($context["pcT"] ?? null) + ($context["pfT"] ?? null)), "html", null, true);
            echo "
                                <span class=\"badge\" style=\"font-weight:300; background-color:#B40404; color:#FFFFFF;\">";
            // line 115
            echo twig_escape_filter($this->env, ($context["pcT"] ?? null), "html", null, true);
            echo "</span>
                                <span class=\"badge\" style=\"font-weight:300; background-color:#FE642E; color:#FFFFFF;\">";
            // line 116
            echo twig_escape_filter($this->env, ($context["pfT"] ?? null), "html", null, true);
            echo "</span>
                            </div>
                            <div class=\"contenedorBlancoBordesRedondeados\" style=\"float:left; padding: 3px 8px; margin-right: 5px;\">
                                GF - ";
            // line 119
            echo twig_escape_filter($this->env, (($context["gfcT"] ?? null) + ($context["gffT"] ?? null)), "html", null, true);
            echo "
                                <span class=\"badge\" style=\"font-weight:300; background-color:#0B2161; color:#FFFFFF;\">";
            // line 120
            echo twig_escape_filter($this->env, ($context["gfcT"] ?? null), "html", null, true);
            echo "</span>
                                <span class=\"badge\" style=\"font-weight:300; background-color:#013ADF; color:#FFFFFF;\">";
            // line 121
            echo twig_escape_filter($this->env, ($context["gffT"] ?? null), "html", null, true);
            echo "</span>
                            </div>
                            <div class=\"contenedorBlancoBordesRedondeados\" style=\"float:left; padding: 3px 8px;\">
                                GC - ";
            // line 124
            echo twig_escape_filter($this->env, (($context["gccT"] ?? null) + ($context["gcfT"] ?? null)), "html", null, true);
            echo "
                                <span class=\"badge\" style=\"font-weight:300; background-color:#424242; color:#FFFFFF;\">";
            // line 125
            echo twig_escape_filter($this->env, ($context["gccT"] ?? null), "html", null, true);
            echo "</span>
                                <span class=\"badge\" style=\"font-weight:300; background-color:#A4A4A4; color:#FFFFFF;\">";
            // line 126
            echo twig_escape_filter($this->env, ($context["gcfT"] ?? null), "html", null, true);
            echo "</span>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    ";
        }
        // line 134
        echo "

            ";
        // line 136
        if ((((isset($context["ePartidos"]) || array_key_exists("ePartidos", $context)) && (isset($context["e_racha"]) || array_key_exists("e_racha", $context))) && -1 === twig_compare(($context["tipoVista"] ?? null), 10))) {
            // line 137
            echo "                <div class=\"col-12\" style=\"padding: 0px; margin-top: 10px;\">
                    <div class=\"row\">
                        ";
            // line 139
            $context["temporada_id"] = ($context["liga"] ?? null);
            // line 140
            echo "                        ";
            $this->loadTemplate("temporada/__content/__part/pesClasificacion.html.twig", "equipo/__part/pesClasificacion.html.twig", 140)->display($context);
            // line 141
            echo "                    </div>
                </div>
            ";
        } elseif (        // line 143
(isset($context["e_racha"]) || array_key_exists("e_racha", $context))) {
            // line 144
            echo "                <div class=\"col-12\">
                    <div class=\"row\">
                        ";
            // line 146
            $this->loadTemplate("equipo/__part/clasificacionEstadisticas.html.twig", "equipo/__part/pesClasificacion.html.twig", 146)->display($context);
            // line 147
            echo "                    </div>
                </div>
            ";
        }
        // line 150
        echo "

</div>";
    }

    public function getTemplateName()
    {
        return "equipo/__part/pesClasificacion.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  336 => 150,  331 => 147,  329 => 146,  325 => 144,  323 => 143,  319 => 141,  316 => 140,  314 => 139,  310 => 137,  308 => 136,  304 => 134,  293 => 126,  289 => 125,  285 => 124,  279 => 121,  275 => 120,  271 => 119,  265 => 116,  261 => 115,  257 => 114,  251 => 111,  247 => 110,  243 => 109,  237 => 106,  233 => 105,  229 => 104,  223 => 100,  213 => 96,  207 => 93,  201 => 90,  191 => 87,  183 => 84,  173 => 81,  167 => 78,  163 => 76,  159 => 75,  155 => 73,  153 => 72,  145 => 66,  143 => 64,  142 => 63,  139 => 62,  134 => 59,  132 => 57,  131 => 56,  128 => 55,  123 => 52,  121 => 50,  120 => 49,  117 => 48,  112 => 45,  110 => 43,  109 => 42,  106 => 41,  101 => 38,  99 => 36,  98 => 35,  95 => 34,  90 => 31,  88 => 29,  87 => 28,  84 => 27,  79 => 24,  77 => 22,  76 => 21,  73 => 20,  68 => 17,  66 => 15,  65 => 14,  62 => 13,  55 => 8,  52 => 7,  49 => 6,  46 => 5,  43 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "equipo/__part/pesClasificacion.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/equipo/__part/pesClasificacion.html.twig");
    }
}
