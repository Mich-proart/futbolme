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

/* equipo/__part/pesCalendario.html.twig */
class __TwigTemplate_a2aafac033deb3afd6fbc115e4428b549dfd61b4a7b31704878180f586b625e1 extends Template
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
        // line 3
        if (1 === twig_compare(($context["retirado"] ?? null), 0)) {
            // line 4
            echo "        <h3>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["ret"] ?? null), "motivo", [], "any", false, false, false, 4), "html", null, true);
            echo "</h3>
    ";
        } else {
            // line 6
            echo "
        ";
            // line 7
            if ((isset($context["partido"]) || array_key_exists("partido", $context))) {
                // line 8
                echo "            ";
                $context["partido"] = ($context["proximoPartido"] ?? null);
                // line 9
                echo "
            ";
                // line 10
                if (0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 10), 1)) {
                    // line 11
                    echo "                <h4 class=\"boldfont text-center\">Próximo partido</h4>
            ";
                } else {
                    // line 13
                    echo "                <h4 class=\"boldfont text-center\">Último partido</h4>
            ";
                }
                // line 15
                echo "
            ";
                // line 16
                $context["colorFila"] = "white";
                // line 17
                echo "            ";
                $context["hora_prevista"] = twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "hora_prevista", [], "any", false, false, false, 17);
                // line 18
                echo "            ";
                $context["enlace_partido"] = $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("partido_index", ["idPartido" => twig_get_attribute($this->env, $this->source,                 // line 19
($context["partido"] ?? null), "id", [], "any", false, false, false, 19), "slug" => ((call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,                 // line 20
($context["partido"] ?? null), "local", [], "any", false, false, false, 20)]) . "-") . call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitante", [], "any", false, false, false, 20)]))]);
                // line 22
                echo "
            ";
                // line 23
                $context["proxPart"] = twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 23);
                // line 24
                echo "            ";
                $this->loadTemplate("index/__part/filaPartido.html.twig", "equipo/__part/pesCalendario.html.twig", 24)->display($context);
                // line 25
                echo "        ";
            }
            // line 26
            echo "
    ";
        }
        // line 28
        echo "

    <div class=\"row\" style=\"margin-top: 10px; margin-bottom: 10px;\">
        <div class=\"col-12\" style=\"padding: 0px\">
            <ul class=\"nav nav-tabs\" role=\"tablist\" id=\"menuEquipoTorneos\">
                ";
        // line 40
        echo "
                ";
        // line 41
        if ((null === ($context["temporada_id"] ?? null))) {
            // line 42
            echo "                    ";
            $context["temporada_id"] = ($context["liga"] ?? null);
            // line 43
            echo "                ";
        }
        // line 44
        echo "
                ";
        // line 45
        $context["nt"] = "";
        // line 46
        echo "                ";
        $context["tt"] = 0;
        // line 47
        echo "                ";
        $context["active"] = "";
        // line 48
        echo "                ";
        $context["pgTemporada2"] = "";
        // line 49
        echo "                ";
        $context["urlTorneoCalendario"] = "";
        // line 50
        echo "
                ";
        // line 51
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["torneos"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
            // line 52
            echo "                    ";
            $context["nombreTorneo"] = twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["value"], "nombreTorneo", [], "any", false, false, false, 52), ["CAMPEONATO" => "CTO."]);
            // line 55
            echo "
                    ";
            // line 56
            if (0 === twig_compare($context["key"], ($context["temporada_id"] ?? null))) {
                // line 57
                echo "                        ";
                $context["active"] = "activa";
                // line 58
                echo "                        ";
                $context["nt"] = twig_get_attribute($this->env, $this->source, $context["value"], "nombreTorneo", [], "any", false, false, false, 58);
                // line 59
                echo "                        ";
                $context["tt"] = twig_get_attribute($this->env, $this->source, $context["value"], "tipo_torneo", [], "any", false, false, false, 59);
                // line 60
                echo "                        ";
                $context["pgTemporada2"] = $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_index", ["idEquipo" =>                 // line 61
($context["idEquipo"] ?? null), "slug" =>                 // line 62
($context["slug"] ?? null)]);
                // line 64
                echo "                        ";
                $context["urlTorneoCalendario"] = $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("torneo_index", ["idTorneo" =>                 // line 65
$context["key"], "slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,                 // line 66
$context["value"], "nombreTorneo", [], "any", false, false, false, 66)])]);
                // line 68
                echo "                    ";
            } else {
                // line 69
                echo "                        ";
                $context["active"] = "";
                // line 70
                echo "                    ";
            }
            // line 71
            echo "
                    <li class=\"";
            // line 72
            echo twig_escape_filter($this->env, ($context["active"] ?? null), "html", null, true);
            echo "\">
                        <a class=\"btn btn-secondary\" href=\"";
            // line 73
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_calendario_torneo", ["slug" =>             // line 74
($context["slug"] ?? null), "idEquipo" =>             // line 75
($context["idEquipo"] ?? null), "idTorneo" =>             // line 76
$context["key"], "nombreTorneo" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,             // line 77
$context["value"], "nombreTorneo", [], "any", false, false, false, 77)])]), "html", null, true);
            // line 78
            echo "\">
                            ";
            // line 79
            echo twig_escape_filter($this->env, ($context["nombreTorneo"] ?? null), "html", null, true);
            echo "
                        </a>
                    </li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 83
        echo "            </ul>
        </div>

        ";
        // line 86
        if (twig_get_attribute($this->env, $this->source, ($context["porTorneos"] ?? null), ($context["temporada_id"] ?? null), [], "array", true, true, false, 86)) {
            // line 87
            echo "            ";
            $context["partidosLiga"] = twig_reverse_filter($this->env, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["porTorneos"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4[($context["temporada_id"] ?? null)] ?? null) : null));
            // line 88
            echo "        ";
        } else {
            // line 89
            echo "            ";
            $context["partidosLiga"] = [];
            // line 90
            echo "        ";
        }
        // line 91
        echo "
        <div class=\"col-12\" style=\"padding: 0px\">
            <h2 class=\"nombreTorneoCalendario\">
                ";
        // line 95
        echo "                <a href=\"";
        echo twig_escape_filter($this->env, ($context["urlTorneoCalendario"] ?? null), "html", null, true);
        echo "\">
                    ";
        // line 96
        echo twig_escape_filter($this->env, ($context["nt"] ?? null), "html", null, true);
        echo "
                </a>
            </h2>

            ";
        // line 100
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["partidosLiga"] ?? null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["partido"]) {
            // line 101
            echo "                ";
            if (((null === twig_get_attribute($this->env, $this->source, $context["partido"], "equipoLocal_id", [], "any", false, false, false, 101)) || (null === twig_get_attribute($this->env, $this->source, $context["partido"], "equipoVisitante_id", [], "any", false, false, false, 101)))) {
                // line 102
                echo "                    <div>
                        <div style=\"float:left; width:30px; text-align:center;\">
                            ";
                // line 104
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "temporada_id", [], "any", false, false, false, 104), 598)) {
                    // line 105
                    echo "                                J ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "jornada", [], "any", false, false, false, 105), "html", null, true);
                    echo "
                            ";
                }
                // line 107
                echo "                        </div>

                        <div style=\"float:left; margin-left:10px; height:auto; text-align:right\">
                            <span>";
                // line 110
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('nombreDiaCompleto')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["partido"], "fecha", [], "any", false, false, false, 110)]), "html", null, true);
                echo "</span>
                            <span class=\"boldfont\" style=\"margin-left: 20px;\">
                            Descansa
                            ";
                // line 113
                if ((null === twig_get_attribute($this->env, $this->source, $context["partido"], "equipoLocal_id", [], "any", false, false, false, 113))) {
                    // line 114
                    echo "                                ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "visitante", [], "any", false, false, false, 114), "html", null, true);
                    echo "
                            ";
                } else {
                    // line 116
                    echo "                                ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "local", [], "any", false, false, false, 116), "html", null, true);
                    echo "
                            ";
                }
                // line 118
                echo "                        </span>
                        </div>
                        <div class=\"clear\"></div>
                    </div>
                ";
            } else {
                // line 123
                echo "
                    ";
                // line 124
                $context["enlace_partido"] = $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("partido_index", ["idPartido" => twig_get_attribute($this->env, $this->source,                 // line 125
$context["partido"], "id", [], "any", false, false, false, 125), "slug" => ((call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,                 // line 126
$context["partido"], "local", [], "any", false, false, false, 126)]) . "-") . call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["partido"], "visitante", [], "any", false, false, false, 126)]))]);
                // line 128
                echo "
                    ";
                // line 129
                $context["enlace_local"] = $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_datos", ["idEquipo" => twig_get_attribute($this->env, $this->source,                 // line 130
$context["partido"], "equipoLocal_id", [], "any", false, false, false, 130), "slug" => twig_get_attribute($this->env, $this->source,                 // line 131
$context["partido"], "local", [], "any", false, false, false, 131)]);
                // line 133
                echo "
                    ";
                // line 134
                $context["enlace_visitante"] = $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_datos", ["idEquipo" => twig_get_attribute($this->env, $this->source,                 // line 135
$context["partido"], "equipoVisitante_id", [], "any", false, false, false, 135), "slug" => twig_get_attribute($this->env, $this->source,                 // line 136
$context["partido"], "visitante", [], "any", false, false, false, 136)]);
                // line 138
                echo "
                    ";
                // line 139
                $context["puntos"] = null;
                // line 140
                echo "
                    ";
                // line 141
                if ((((0 !== twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "goles_local", [], "any", false, false, false, 141), "") && 0 !== twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "goles_visitante", [], "any", false, false, false, 141), "")) && 0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "tipo_torneo", [], "any", false, false, false, 141), 1)) && 0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "estado_partido", [], "any", false, false, false, 141), 1))) {
                    // line 142
                    echo "
                        ";
                    // line 143
                    $context["puntos"] = 0;
                    // line 144
                    echo "                        ";
                    $context["class"] = "colores_fondo_resultados_perdido";
                    // line 145
                    echo "
                        ";
                    // line 146
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "goles_local", [], "any", false, false, false, 146), twig_get_attribute($this->env, $this->source, $context["partido"], "goles_visitante", [], "any", false, false, false, 146))) {
                        // line 147
                        echo "
                            ";
                        // line 148
                        $context["puntos"] = 1;
                        // line 149
                        echo "                            ";
                        $context["class"] = "colores_fondo_resultados_empatado";
                        // line 150
                        echo "
                        ";
                    } elseif (0 === twig_compare(                    // line 151
($context["equipo_id"] ?? null), twig_get_attribute($this->env, $this->source, $context["partido"], "equipoLocal_id", [], "any", false, false, false, 151))) {
                        // line 152
                        echo "
                            ";
                        // line 153
                        if (1 === twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "goles_local", [], "any", false, false, false, 153), twig_get_attribute($this->env, $this->source, $context["partido"], "goles_visitante", [], "any", false, false, false, 153))) {
                            // line 154
                            echo "                                ";
                            $context["puntos"] = 3;
                            // line 155
                            echo "                                ";
                            $context["class"] = "colores_fondo_resultados_ganado";
                            // line 156
                            echo "                            ";
                        }
                        // line 157
                        echo "
                        ";
                    } else {
                        // line 159
                        echo "
                            ";
                        // line 160
                        if (1 === twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "goles_visitante", [], "any", false, false, false, 160), twig_get_attribute($this->env, $this->source, $context["partido"], "goles_local", [], "any", false, false, false, 160))) {
                            // line 161
                            echo "                                ";
                            $context["puntos"] = 3;
                            // line 162
                            echo "                                ";
                            $context["class"] = "colores_fondo_resultados_ganado";
                            // line 163
                            echo "                            ";
                        }
                        // line 164
                        echo "
                        ";
                    }
                    // line 166
                    echo "
                    ";
                }
                // line 168
                echo "
                    ";
                // line 169
                $context["hora_prevista"] = twig_get_attribute($this->env, $this->source, $context["partido"], "hora_prevista", [], "any", false, false, false, 169);
                // line 170
                echo "                    ";
                $context["colorFila"] = "white";
                // line 171
                echo "                    ";
                $context["colorL"] = "background-color:white";
                // line 172
                echo "                    ";
                $context["colorV"] = "background-color:white";
                // line 173
                echo "
                    <div class=\"\" style=\"background-color: ";
                // line 174
                echo twig_escape_filter($this->env, ($context["colorFila"] ?? null), "html", null, true);
                echo "\">

                        ";
                // line 176
                $context["icono"] = "";
                // line 177
                echo "
                        ";
                // line 178
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "estado_partido", [], "any", false, false, false, 178), 1)) {
                    // line 179
                    echo "
                            ";
                    // line 180
                    if (((0 === twig_compare(                    // line 181
($context["equipo_id"] ?? null), twig_get_attribute($this->env, $this->source, $context["partido"], "equipoLocal_id", [], "any", false, false, false, 181)) && -1 === twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "goles_local", [], "any", false, false, false, 181), twig_get_attribute($this->env, $this->source, $context["partido"], "goles_visitante", [], "any", false, false, false, 181))) || (0 === twig_compare(                    // line 183
($context["equipo_id"] ?? null), twig_get_attribute($this->env, $this->source, $context["partido"], "equipoVisitante_id", [], "any", false, false, false, 183)) && 1 === twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "goles_local", [], "any", false, false, false, 183), twig_get_attribute($this->env, $this->source, $context["partido"], "goles_visitante", [], "any", false, false, false, 183))))) {
                        // line 185
                        echo "
                                ";
                        // line 186
                        if (0 === twig_compare(($context["equipo_id"] ?? null), twig_get_attribute($this->env, $this->source, $context["partido"], "equipoLocal_id", [], "any", false, false, false, 186))) {
                            // line 187
                            echo "                                    ";
                            $context["colorI"] = "#B40404";
                            // line 188
                            echo "                                ";
                        } else {
                            // line 189
                            echo "                                    ";
                            $context["colorI"] = "#FE642E";
                            // line 190
                            echo "                                ";
                        }
                        // line 191
                        echo "
                                ";
                        // line 192
                        $context["icono"] = (("<span class=\"badge\" style=\"font-weight:300; background-color:" . ($context["colorI"] ?? null)) . "\">D</span>");
                        // line 193
                        echo "
                            ";
                    }
                    // line 195
                    echo "

                            ";
                    // line 197
                    if (((0 === twig_compare(                    // line 198
($context["equipo_id"] ?? null), twig_get_attribute($this->env, $this->source, $context["partido"], "equipoLocal_id", [], "any", false, false, false, 198)) && 1 === twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "goles_local", [], "any", false, false, false, 198), twig_get_attribute($this->env, $this->source, $context["partido"], "goles_visitante", [], "any", false, false, false, 198))) || (0 === twig_compare(                    // line 200
($context["equipo_id"] ?? null), twig_get_attribute($this->env, $this->source, $context["partido"], "equipoVisitante_id", [], "any", false, false, false, 200)) && -1 === twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "goles_local", [], "any", false, false, false, 200), twig_get_attribute($this->env, $this->source, $context["partido"], "goles_visitante", [], "any", false, false, false, 200))))) {
                        // line 202
                        echo "                                ";
                        if (0 === twig_compare(($context["equipo_id"] ?? null), twig_get_attribute($this->env, $this->source, $context["partido"], "equipoLocal_id", [], "any", false, false, false, 202))) {
                            // line 203
                            echo "                                    ";
                            $context["colorI"] = "#0B610B";
                            // line 204
                            echo "                                ";
                        } else {
                            // line 205
                            echo "                                    ";
                            $context["colorI"] = "#01DF01";
                            // line 206
                            echo "                                ";
                        }
                        // line 207
                        echo "
                                ";
                        // line 208
                        $context["icono"] = (("<span class=\"badge\" style=\"font-weight:300; background-color:" . ($context["colorI"] ?? null)) . "\">V</span>");
                        // line 209
                        echo "
                            ";
                    }
                    // line 211
                    echo "

                            ";
                    // line 213
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "goles_local", [], "any", false, false, false, 213), twig_get_attribute($this->env, $this->source, $context["partido"], "goles_visitante", [], "any", false, false, false, 213))) {
                        // line 214
                        echo "                                ";
                        if (0 === twig_compare(($context["equipo_id"] ?? null), twig_get_attribute($this->env, $this->source, $context["partido"], "equipoLocal_id", [], "any", false, false, false, 214))) {
                            // line 215
                            echo "                                    ";
                            $context["colorI"] = "orange";
                            // line 216
                            echo "                                ";
                        } else {
                            // line 217
                            echo "                                    ";
                            $context["colorI"] = "#FACC2E";
                            // line 218
                            echo "                                ";
                        }
                        // line 219
                        echo "
                                ";
                        // line 220
                        $context["icono"] = (("<span class=\"badge\" style=\"font-weight:300; background-color:" . ($context["colorI"] ?? null)) . ";\">E</span>");
                        // line 221
                        echo "                            ";
                    }
                    // line 222
                    echo "
                            ";
                    // line 223
                    if (0 === twig_compare(($context["equipo_id"] ?? null), twig_get_attribute($this->env, $this->source, $context["partido"], "equipoLocal_id", [], "any", false, false, false, 223))) {
                        // line 224
                        echo "                                ";
                        $context["iconoGF"] = (("<span class=\"badge\" style=\"font-weight:300; background-color:#0B2161\">" . twig_get_attribute($this->env, $this->source, $context["partido"], "goles_local", [], "any", false, false, false, 224)) . "</span>");
                        // line 225
                        echo "                                ";
                        $context["iconoGC"] = (("<span class=\"badge\" style=\"font-weight:300; background-color:#424242\">" . twig_get_attribute($this->env, $this->source, $context["partido"], "goles_visitante", [], "any", false, false, false, 225)) . "</span>");
                        // line 226
                        echo "                            ";
                    }
                    // line 227
                    echo "
                            ";
                    // line 228
                    if (0 === twig_compare(($context["equipo_id"] ?? null), twig_get_attribute($this->env, $this->source, $context["partido"], "equipoVisitante_id", [], "any", false, false, false, 228))) {
                        // line 229
                        echo "                                ";
                        $context["iconoGF"] = (("<span class=\"badge\" style=\"font-weight:300; background-color:#013ADF\">" . twig_get_attribute($this->env, $this->source, $context["partido"], "goles_visitante", [], "any", false, false, false, 229)) . "</span>");
                        // line 230
                        echo "                                ";
                        $context["iconoGC"] = (("<span class=\"badge\" style=\"font-weight:300; background-color:#A4A4A4\">" . (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = $context["partido"]) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144["goles_local"] ?? null) : null)) . "</span>");
                        // line 231
                        echo "                            ";
                    }
                    // line 232
                    echo "

                        ";
                }
                // line 235
                echo "
                        ";
                // line 236
                $this->loadTemplate("index/__part/filaPartido.html.twig", "equipo/__part/pesCalendario.html.twig", 236)->display($context);
                // line 237
                echo "
                        <div id=\"youtube-";
                // line 238
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "id", [], "any", false, false, false, 238), "html", null, true);
                echo "\" class=\"col-xs-12 nopadding text-center\"></div>

                    </div>

                ";
            }
            // line 243
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['partido'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 245
        echo "        </div>
    </div>


</div>";
    }

    public function getTemplateName()
    {
        return "equipo/__part/pesCalendario.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  586 => 245,  571 => 243,  563 => 238,  560 => 237,  558 => 236,  555 => 235,  550 => 232,  547 => 231,  544 => 230,  541 => 229,  539 => 228,  536 => 227,  533 => 226,  530 => 225,  527 => 224,  525 => 223,  522 => 222,  519 => 221,  517 => 220,  514 => 219,  511 => 218,  508 => 217,  505 => 216,  502 => 215,  499 => 214,  497 => 213,  493 => 211,  489 => 209,  487 => 208,  484 => 207,  481 => 206,  478 => 205,  475 => 204,  472 => 203,  469 => 202,  467 => 200,  466 => 198,  465 => 197,  461 => 195,  457 => 193,  455 => 192,  452 => 191,  449 => 190,  446 => 189,  443 => 188,  440 => 187,  438 => 186,  435 => 185,  433 => 183,  432 => 181,  431 => 180,  428 => 179,  426 => 178,  423 => 177,  421 => 176,  416 => 174,  413 => 173,  410 => 172,  407 => 171,  404 => 170,  402 => 169,  399 => 168,  395 => 166,  391 => 164,  388 => 163,  385 => 162,  382 => 161,  380 => 160,  377 => 159,  373 => 157,  370 => 156,  367 => 155,  364 => 154,  362 => 153,  359 => 152,  357 => 151,  354 => 150,  351 => 149,  349 => 148,  346 => 147,  344 => 146,  341 => 145,  338 => 144,  336 => 143,  333 => 142,  331 => 141,  328 => 140,  326 => 139,  323 => 138,  321 => 136,  320 => 135,  319 => 134,  316 => 133,  314 => 131,  313 => 130,  312 => 129,  309 => 128,  307 => 126,  306 => 125,  305 => 124,  302 => 123,  295 => 118,  289 => 116,  283 => 114,  281 => 113,  275 => 110,  270 => 107,  264 => 105,  262 => 104,  258 => 102,  255 => 101,  238 => 100,  231 => 96,  226 => 95,  221 => 91,  218 => 90,  215 => 89,  212 => 88,  209 => 87,  207 => 86,  202 => 83,  192 => 79,  189 => 78,  187 => 77,  186 => 76,  185 => 75,  184 => 74,  183 => 73,  179 => 72,  176 => 71,  173 => 70,  170 => 69,  167 => 68,  165 => 66,  164 => 65,  162 => 64,  160 => 62,  159 => 61,  157 => 60,  154 => 59,  151 => 58,  148 => 57,  146 => 56,  143 => 55,  140 => 52,  136 => 51,  133 => 50,  130 => 49,  127 => 48,  124 => 47,  121 => 46,  119 => 45,  116 => 44,  113 => 43,  110 => 42,  108 => 41,  105 => 40,  98 => 28,  94 => 26,  91 => 25,  88 => 24,  86 => 23,  83 => 22,  81 => 20,  80 => 19,  78 => 18,  75 => 17,  73 => 16,  70 => 15,  66 => 13,  62 => 11,  60 => 10,  57 => 9,  54 => 8,  52 => 7,  49 => 6,  43 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "equipo/__part/pesCalendario.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/equipo/__part/pesCalendario.html.twig");
    }
}
