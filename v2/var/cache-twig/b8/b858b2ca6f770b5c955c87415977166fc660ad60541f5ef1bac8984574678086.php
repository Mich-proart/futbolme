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

/* temporada/__content/__part/pesClasificacion.html.twig */
class __TwigTemplate_e6dde46484ca2f403476d1cebeac92117820cf55544cfbb9d2be9494ebba5e16 extends Template
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
        echo "<link href=\"/css/tablesorter/blue/style.css\" rel=\"stylesheet\">

";
        // line 3
        if (0 === twig_compare(($context["themoneytizer"] ?? null), 1)) {
            // line 4
            echo "    <div class=\"clear\"></div>

    <div class=\"col-12\">
        <div id=\"13939-19\" style=\"height: 255px !important\">
            <script src=\"//ads.themoneytizer.com/s/gen.js?type=19\"></script><script src=\"//ads.themoneytizer.com/s/requestform.js?siteId=13939&formatId=19\" ></script>
        </div>
    </div>

    <div class=\"clear\"></div>
";
        }
        // line 14
        echo "
<div id=\"playClasi\" class=\"col-12 whitebox nopadding bloque-clasificacion\">
    <div class=\"row\">
        <div class=\"col-12\" id=\"menuOpcionesClasificacion\">
                <a class=\"btn btn-secondary\" onclick=\"play_clasi(";
        // line 18
        echo twig_escape_filter($this->env, ($context["temporada_id"] ?? null), "html", null, true);
        echo ",-3)\">General</a>
                <a class=\"btn btn-secondary\" onclick=\"play_clasi(";
        // line 19
        echo twig_escape_filter($this->env, ($context["temporada_id"] ?? null), "html", null, true);
        echo ",-1)\">Local</a>
                <a class=\"btn btn-secondary\" onclick=\"play_clasi(";
        // line 20
        echo twig_escape_filter($this->env, ($context["temporada_id"] ?? null), "html", null, true);
        echo ",-2)\">Visitante</a>

            ";
        // line 22
        if (((isset($context["mitadJornada"]) || array_key_exists("mitadJornada", $context)) && 1 === twig_compare(($context["jornadaActiva"] ?? null), ($context["mitadJornada"] ?? null)))) {
            // line 23
            echo "                <a class=\"btn btn-secondary\" onclick=\"play_clasi(";
            echo twig_escape_filter($this->env, ($context["temporada_id"] ?? null), "html", null, true);
            echo ",-4)\">1ª Vuel</a>
                <a class=\"btn btn-secondary\" onclick=\"play_clasi(";
            // line 24
            echo twig_escape_filter($this->env, ($context["temporada_id"] ?? null), "html", null, true);
            echo ",-5)\">2ª Vuel</a>
            ";
        }
        // line 26
        echo "
            <div class=\"btn btn-secondary\">
                Últimas Jor.
                <select onchange=\"play_clasi(";
        // line 29
        echo twig_escape_filter($this->env, ($context["temporada_id"] ?? null), "html", null, true);
        echo ",this.value)\">
                    <option value=\"0\">-</option>
                    ";
        // line 31
        if (1 === twig_compare(($context["jornadaActiva"] ?? null), 10)) {
            echo "<option value=\"-15\">10</option>";
        }
        // line 32
        echo "                    ";
        if (1 === twig_compare(($context["jornadaActiva"] ?? null), 9)) {
            echo "<option value=\"-14\">9</option>";
        }
        // line 33
        echo "                    ";
        if (1 === twig_compare(($context["jornadaActiva"] ?? null), 8)) {
            echo "<option value=\"-13\">8</option>";
        }
        // line 34
        echo "                    ";
        if (1 === twig_compare(($context["jornadaActiva"] ?? null), 7)) {
            echo "<option value=\"-12\">7</option>";
        }
        // line 35
        echo "                    ";
        if (1 === twig_compare(($context["jornadaActiva"] ?? null), 6)) {
            echo "<option value=\"-11\">6</option>";
        }
        // line 36
        echo "                    ";
        if (1 === twig_compare(($context["jornadaActiva"] ?? null), 5)) {
            echo "<option value=\"-10\">5</option>";
        }
        // line 37
        echo "                    ";
        if (1 === twig_compare(($context["jornadaActiva"] ?? null), 4)) {
            echo "<option value=\"-9\">4</option>";
        }
        // line 38
        echo "                    ";
        if (1 === twig_compare(($context["jornadaActiva"] ?? null), 3)) {
            echo "<option value=\"-8\">3</option>";
        }
        // line 39
        echo "                    ";
        if (1 === twig_compare(($context["jornadaActiva"] ?? null), 2)) {
            echo "<option value=\"-7\">2</option>";
        }
        // line 40
        echo "                    ";
        if (1 === twig_compare(($context["jornadaActiva"] ?? null), 1)) {
            echo "<option value=\"-6\">1</option>";
        }
        // line 41
        echo "                </select>
            </div>
        </div>
    </div>

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
                ";
        // line 86
        if (twig_in_filter(($context["visible"] ?? null), [0 => 6, 1 => 86])) {
            // line 87
            echo "                <th class=\"text-center\" title=\"Puntos por partido\">
                    %
                </th>
                ";
        }
        // line 91
        echo "            </tr>
        </thead>

        <tbody>

        ";
        // line 108
        echo "
            ";
        // line 109
        $context["equiposTw"] = [];
        // line 110
        echo "            ";
        $context["classFila"] = "";
        // line 111
        echo "
            ";
        // line 112
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["clasificacion"] ?? null), "clasificacionFinal", [], "any", false, false, false, 112));
        foreach ($context['_seq'] as $context["key"] => $context["fila"]) {
            // line 113
            echo "
                ";
            // line 114
            if (-1 === twig_compare($context["key"], 30)) {
                // line 115
                echo "
                    ";
                // line 116
                $context["equipoTW"] = ["id" => twig_get_attribute($this->env, $this->source,                 // line 117
$context["fila"], "equipo_id", [], "any", false, false, false, 117), "equipo" => twig_get_attribute($this->env, $this->source,                 // line 118
$context["fila"], "nombreCorto", [], "any", false, false, false, 118), "idPais" => 60];
                // line 121
                echo "
                    ";
                // line 122
                $context["equiposTw"] = call_user_func_array($this->env->getFunction('anadirAArray')->getCallable(), [($context["equiposTw"] ?? null), ($context["equipoTW"] ?? null)]);
                // line 123
                echo "
                ";
            }
            // line 125
            echo "
                ";
            // line 126
            $context["pgEnlace"] = ((("/resultados-directo/equipo/" . call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["fila"], "nombre", [], "any", false, false, false, 126)])) . "/") . twig_get_attribute($this->env, $this->source, $context["fila"], "equipo_id", [], "any", false, false, false, 126));
            // line 127
            echo "
                ";
            // line 128
            $context["pgEnlaceClasificacionBase"] = $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_clasificacion", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,             // line 129
$context["fila"], "nombre", [], "any", false, false, false, 129)]), "idEquipo" => twig_get_attribute($this->env, $this->source,             // line 130
$context["fila"], "equipo_id", [], "any", false, false, false, 130)]);
            // line 132
            echo "
                ";
            // line 133
            $context["color_fondo"] = "white";
            // line 134
            echo "                ";
            $context["filaEnJuego"] = false;
            // line 135
            echo "                ";
            if (twig_get_attribute($this->env, $this->source, $context["fila"], "preferente", [], "any", true, true, false, 135)) {
                // line 136
                echo "                    ";
                if (twig_get_attribute($this->env, $this->source, $context["fila"], "preferente", [], "any", false, false, false, 136)) {
                    // line 137
                    echo "                        ";
                    $context["color_fondo"] = "yellow";
                    // line 138
                    echo "                        ";
                    $context["filaEnJuego"] = true;
                    // line 139
                    echo "                    ";
                }
                // line 140
                echo "                ";
            }
            // line 141
            echo "
                ";
            // line 142
            $context["color_fila"] = "";
            // line 143
            echo "                ";
            if (((isset($context["equipo_id"]) || array_key_exists("equipo_id", $context)) && 0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["fila"], "equipo_id", [], "any", false, false, false, 143), ($context["equipo_id"] ?? null)))) {
                // line 144
                echo "                    ";
                $context["color_fila"] = "style='background-color:#BCF5A9'";
                // line 145
                echo "                ";
            }
            // line 146
            echo "
                ";
            // line 147
            if (((isset($context["equipo_rival_id"]) || array_key_exists("equipo_rival_id", $context)) && 0 === twig_compare(($context["equipo_rival_id"] ?? null), twig_get_attribute($this->env, $this->source, $context["fila"], "equipo_id", [], "any", false, false, false, 147)))) {
                // line 148
                echo "                    ";
                $context["color_fila"] = "style='background-color:#F8E6E0'";
                // line 149
                echo "                ";
            }
            // line 150
            echo "
                ";
            // line 151
            $context["rutaEscudo"] = call_user_func_array($this->env->getFunction('rutaEscudo')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["fila"], "club_id", [], "any", false, false, false, 151), twig_get_attribute($this->env, $this->source, $context["fila"], "equipo_id", [], "any", false, false, false, 151)]);
            // line 152
            echo "
                ";
            // line 153
            if ( !call_user_func_array($this->env->getFunction('fileExists')->getCallable(), [($context["rutaEscudo"] ?? null)])) {
                // line 154
                echo "                    ";
                $context["rutaEscudo"] = "/static/img/jugadores/NI.png";
                // line 155
                echo "                ";
            }
            // line 156
            echo "
                ";
            // line 157
            if (0 === twig_compare(($context["key"] % 2), 0)) {
                // line 158
                echo "                    ";
                $context["classFila"] = "fila-par";
                // line 159
                echo "                ";
            } else {
                // line 160
                echo "                    ";
                $context["classFila"] = "fila-impar";
                // line 161
                echo "                ";
            }
            // line 162
            echo "
                ";
            // line 164
            echo "                <tr data-bk=\"";
            echo twig_escape_filter($this->env, ($context["color_fondo"] ?? null), "html", null, true);
            echo "\" class=\"";
            echo twig_escape_filter($this->env, ($context["classFila"] ?? null), "html", null, true);
            echo "\" ";
            if (((isset($context["equipo_id"]) || array_key_exists("equipo_id", $context)) && 0 === twig_compare(($context["equipo_id"] ?? null), twig_get_attribute($this->env, $this->source, $context["fila"], "equipo_id", [], "any", false, false, false, 164)))) {
                echo " style=\"";
                if ( !($context["filaEnJuego"] ?? null)) {
                    echo "background: #8AE813;";
                } else {
                    echo "background: #FDDE02;";
                }
                echo "\" ";
            } else {
                echo " ";
                if (($context["filaEnJuego"] ?? null)) {
                    echo "style=\"background: #FDDE02;\"";
                }
                echo " ";
            }
            echo ">
                    ";
            // line 165
            if ((isset($context["trt"]) || array_key_exists("trt", $context))) {
                // line 166
                echo "
                        <td class=\"text-center\" style=\"padding: 0px;\">
                            ";
                // line 168
                echo twig_escape_filter($this->env, ($context["key"] + 1), "html", null, true);
                echo "
                        </td>
                        <td class=\"text-center\">
                            <a href='/temporada.php?id=";
                // line 171
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "temporada_id", [], "any", false, false, false, 171), "html", null, true);
                echo "'>
                            ";
                // line 172
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["fila"], "temporada_id", [], "any", false, false, false, 172), 1)) {
                    // line 173
                    echo "                                1
                            ";
                }
                // line 175
                echo "
                            ";
                // line 176
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["fila"], "temporada_id", [], "any", false, false, false, 176), 2)) {
                    // line 177
                    echo "                                2
                            ";
                }
                // line 179
                echo "
                            ";
                // line 180
                if ((1 === twig_compare(twig_get_attribute($this->env, $this->source, $context["fila"], "temporada_id", [], "any", false, false, false, 180), 2) && -1 === twig_compare(twig_get_attribute($this->env, $this->source, $context["fila"], "temporada_id", [], "any", false, false, false, 180), 7))) {
                    // line 181
                    echo "                                2BG";
                    echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, $context["fila"], "temporada_id", [], "any", false, false, false, 181) - 2), "html", null, true);
                    echo "
                            ";
                }
                // line 183
                echo "
                            ";
                // line 184
                if (1 === twig_compare(twig_get_attribute($this->env, $this->source, $context["fila"], "temporada_id", [], "any", false, false, false, 184), 6)) {
                    // line 185
                    echo "                                ";
                    $context["d"] = (twig_get_attribute($this->env, $this->source, $context["fila"], "temporada_id", [], "any", false, false, false, 185) - 6);
                    // line 186
                    echo "
                                ";
                    // line 187
                    if (-1 === twig_compare(($context["d"] ?? null), 10)) {
                        // line 188
                        echo "                                    ";
                        $context["d"] = ("0" . ($context["d"] ?? null));
                        // line 189
                        echo "                                ";
                    }
                    // line 190
                    echo "
                            ";
                }
                // line 192
                echo "                            </a>
                        </td>
                        <td class=\"text-center\">
                            ";
                // line 195
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (twig_get_attribute($this->env, $this->source, $context["fila"], "puntos", [], "any", false, false, false, 195) / twig_get_attribute($this->env, $this->source, $context["fila"], "jugados", [], "any", false, false, false, 195)), 2), "html", null, true);
                echo "
                        </td>

                    ";
            }
            // line 199
            echo "                    <td class=\"text-left celda-posicion\" style=\"";
            echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["fila"], "css", [], "any", false, false, false, 199), ["background-color" => "color", "white" => "#000000", "gold" => "#F1C422", "orange" => "#E38800", "indianred" => "#E80000"]), "html", null, true);
            // line 207
            echo ";\">
                        ";
            // line 208
            if ( !twig_get_attribute($this->env, $this->source, $context["fila"], "resultadoPartidoEnJuego", [], "any", true, true, false, 208)) {
                // line 209
                echo "                            ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "posicion", [], "any", false, false, false, 209), "html", null, true);
                echo "
                        ";
            } else {
                // line 211
                echo "                            <span class=\"badge\" style=\"color:#000000; background: ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "resultadoPartidoEnJuegoColor", [], "any", false, false, false, 211), "html", null, true);
                echo ";\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "resultadoPartidoEnJuego", [], "any", false, false, false, 211), "html", null, true);
                echo "</span>
                        ";
            }
            // line 213
            echo "                    </td>
                    <td style=\"text-align:left;min-width: 130px\" itemscope itemtype=\"http://schema.org/SportsTeam\">
                        <a href=\"";
            // line 215
            echo twig_escape_filter($this->env, ($context["pgEnlace"] ?? null), "html", null, true);
            echo "&modelo=Calendario\" title=\"Calendario del ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "nombreCorto", [], "any", false, false, false, 215), "html", null, true);
            echo "\">
                            <img src=\"";
            // line 216
            echo twig_escape_filter($this->env, ($context["rutaEscudo"] ?? null), "html", null, true);
            echo "\" itemprop=\"logo\" alt=\"escudo ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "nombre", [], "any", false, false, false, 216), "html", null, true);
            echo "\" style=\"width:18px; height:20px; margin-right: 2px\">
                            <strong itemprop=\"name\">
                                <span class=\"d-inline-block d-sm-none\">";
            // line 218
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "nombreCorto", [], "any", false, false, false, 218), "html", null, true);
            echo "</span>
                                <span class=\"d-none d-sm-inline-block\">";
            // line 219
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "nombre", [], "any", false, false, false, 219), "html", null, true);
            echo "</span>
                            </strong>

                            <meta itemprop=\"url\" content=\"";
            // line 222
            echo twig_escape_filter($this->env, ($context["pgEnlace"] ?? null), "html", null, true);
            echo "\">
                        </a>
                    </td>
                    <td class=\"text-center\" style=\"";
            // line 225
            echo "\">
                        <a style=\"color:black\" href=\"";
            // line 226
            echo twig_escape_filter($this->env, ($context["pgEnlaceClasificacionBase"] ?? null), "html", null, true);
            echo "puntos\" title=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "nombreCorto", [], "any", false, false, false, 226), "html", null, true);
            echo " - Puntos conseguidos\">
                            <b>";
            // line 227
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "puntos", [], "any", false, false, false, 227), "html", null, true);
            echo "</b>
                        </a> 
                    </td>
                    <td class=\"text-center\">
                        <a style=\"color:black\" href=\"";
            // line 231
            echo twig_escape_filter($this->env, ($context["pgEnlaceClasificacionBase"] ?? null), "html", null, true);
            echo "jugados\" title=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "nombreCorto", [], "any", false, false, false, 231), "html", null, true);
            echo " - Partidos jugados\">
                            ";
            // line 232
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "jugados", [], "any", false, false, false, 232), "html", null, true);
            echo "
                        </a>
                    </td>
                    <td class=\"text-center\">
                        <a style=\"color:black\" href=\"";
            // line 236
            echo twig_escape_filter($this->env, ($context["pgEnlaceClasificacionBase"] ?? null), "html", null, true);
            echo "ganados\" title=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "nombreCorto", [], "any", false, false, false, 236), "html", null, true);
            echo " - Partidos ganados\">
                            ";
            // line 237
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "ganados", [], "any", false, false, false, 237), "html", null, true);
            echo "
                        </a>
                    </td>
                    <td class=\"text-center\">
                        <a style=\"color:black\" href=\"";
            // line 241
            echo twig_escape_filter($this->env, ($context["pgEnlaceClasificacionBase"] ?? null), "html", null, true);
            echo "empatados\" title=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "nombreCorto", [], "any", false, false, false, 241), "html", null, true);
            echo " - Partidos empatados\">
                            ";
            // line 242
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "empatados", [], "any", false, false, false, 242), "html", null, true);
            echo "
                        </a>
                    </td>
                    <td class=\"text-center\">
                        <a style=\"color:black\" href=\"";
            // line 246
            echo twig_escape_filter($this->env, ($context["pgEnlaceClasificacionBase"] ?? null), "html", null, true);
            echo "perdidos\" title=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "nombreCorto", [], "any", false, false, false, 246), "html", null, true);
            echo " - Partidos perdidos\">
                            ";
            // line 247
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "perdidos", [], "any", false, false, false, 247), "html", null, true);
            echo "
                        </a>
                    </td>
                    <td class=\"text-center\">
                        <a style=\"color:black\" href=\"";
            // line 251
            echo twig_escape_filter($this->env, ($context["pgEnlaceClasificacionBase"] ?? null), "html", null, true);
            echo "favor\" title=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "nombreCorto", [], "any", false, false, false, 251), "html", null, true);
            echo " - Goles a favor\">
                            ";
            // line 252
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "gFavor", [], "any", false, false, false, 252), "html", null, true);
            echo "
                        </a>
                    </td>
                    <td class=\"text-center\">
                        <a style=\"color:black\" href=\"";
            // line 256
            echo twig_escape_filter($this->env, ($context["pgEnlaceClasificacionBase"] ?? null), "html", null, true);
            echo "contra\" title=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "nombreCorto", [], "any", false, false, false, 256), "html", null, true);
            echo " - Goles en contra\">
                            ";
            // line 257
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "gContra", [], "any", false, false, false, 257), "html", null, true);
            echo "
                        </a>
                    </td>
                    <td class=\"text-center\">
                        ";
            // line 261
            echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, $context["fila"], "gFavor", [], "any", false, false, false, 261) - twig_get_attribute($this->env, $this->source, $context["fila"], "gContra", [], "any", false, false, false, 261)), "html", null, true);
            echo "
                    </td>
                    
                    ";
            // line 264
            if (twig_in_filter(($context["visible"] ?? null), [0 => 6, 1 => 86])) {
                // line 265
                echo "                    <td class=\"text-center\" title=\"puntos por partido\">
                        ";
                // line 266
                if (1 === twig_compare(twig_get_attribute($this->env, $this->source, $context["fila"], "jugados", [], "any", false, false, false, 266), 0)) {
                    // line 267
                    echo "                        
                        <span style=\"font-size:12px; color:green; font-weight:bold\" >";
                    // line 268
                    echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (twig_get_attribute($this->env, $this->source, $context["fila"], "puntos", [], "any", false, false, false, 268) / twig_get_attribute($this->env, $this->source, $context["fila"], "jugados", [], "any", false, false, false, 268)), 2), "html", null, true);
                    echo "</span>

                        ";
                }
                // line 271
                echo "                    </td>
                    ";
            }
            // line 273
            echo "
                </tr>

            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['fila'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 277
        echo "
        </tbody>
    </table>
    <div class=\"row\">
        <div class=\"col-12\">
            <div id=\"bottomLaTabla\" class=\"";
        // line 282
        echo twig_escape_filter($this->env, ($context["classFila"] ?? null), "html", null, true);
        echo "\">

            </div>
        </div>
    </div>
</div>




";
        // line 292
        if (twig_get_attribute($this->env, $this->source, ($context["clasificacion"] ?? null), "sanciones", [], "any", true, true, false, 292)) {
            // line 293
            echo "    <div class=\"col-12\">
        ";
            // line 294
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["clasificacion"] ?? null), "sanciones", [], "any", false, false, false, 294));
            foreach ($context['_seq'] as $context["_key"] => $context["fila"]) {
                // line 295
                echo "
            ";
                // line 296
                if (twig_get_attribute($this->env, $this->source, $context["fila"], "nombre", [], "any", true, true, false, 296)) {
                    // line 297
                    echo "                
                ";
                    // line 298
                    if (-1 === twig_compare(twig_get_attribute($this->env, $this->source, $context["fila"], "puntos", [], "any", false, false, false, 298), 0)) {
                        // line 299
                        echo "
                <strong>";
                        // line 300
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "nombre", [], "any", false, false, false, 300), "html", null, true);
                        echo "</strong> cuenta con <span style='color:red'><strong>";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "puntos", [], "any", false, false, false, 300), "html", null, true);
                        echo "</strong></span> puntos por sanción federativa<br />

                 ";
                    } else {
                        // line 303
                        echo "
                 <strong>";
                        // line 304
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "nombre", [], "any", false, false, false, 304), "html", null, true);
                        echo "</strong> cuenta con <span style='color:red'><strong>";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "puntos", [], "any", false, false, false, 304), "html", null, true);
                        echo "</strong></span> puntos de la primera fase

                 ";
                        // line 306
                        if (0 === twig_compare(($context["temporada_id"] ?? null), 2860)) {
                            // line 307
                            echo "
                 (";
                            // line 308
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "jugados", [], "any", false, false, false, 308), "html", null, true);
                            echo " partidos)

                 ";
                        }
                        // line 311
                        echo "                 <br />

                 ";
                    }
                    // line 314
                    echo "
            ";
                }
                // line 316
                echo "
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['fila'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 318
            echo "    </div>
";
        }
        // line 320
        echo "

";
        // line 322
        if ( !(isset($context["trt"]) || array_key_exists("trt", $context))) {
            // line 323
            echo "<div class=\"col-12\">
    <div class=\"col-12 contenedorLeyendaClasificacion\" style=\"float: left; background: #4A4A4A; -webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;\">
        ";
            // line 331
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["clasificacion"] ?? null), "leyenda", [], "any", false, false, false, 331));
            foreach ($context['_seq'] as $context["_key"] => $context["fila"]) {
                // line 332
                echo "            ";
                // line 342
                echo "            <div class=\"text-left\" style=\"float: left; margin-right: 20px; color:";
                echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["fila"], "fondo", [], "any", false, false, false, 342), ["white" => "#000000", "gold" => "#F1C422", "orange" => "#E38800", "indianred" => "#E80000"]), "html", null, true);
                // line 349
                echo "\">
                ";
                // line 350
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "leyenda", [], "any", false, false, false, 350), "html", null, true);
                echo "
            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['fila'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 353
            echo "    </div>
</div>
";
        }
        // line 356
        echo "
<div class=\"col-12\">
    ";
        // line 358
        $context["espacio"] = "temporadaAplazados";
        // line 359
        echo "    ";
        $this->loadTemplate("publicidad/publiGestion.html.twig", "temporada/__content/__part/pesClasificacion.html.twig", 359)->display($context);
        // line 360
        echo "</div>

";
        // line 362
        if (1 === twig_compare(twig_length_filter($this->env, ($context["aplazados"] ?? null)), 0)) {
            // line 363
            echo "<div class=\"col-12\" style=\"margin-top: 25px;\">
    <div class=\"contenedorBlancoBordesRedondeados\">
        <h2 class=\"subtitulo\">Partidos aplazados</h2>

        ";
            // line 392
            echo "        <div class=\"col-12\" style=\"font-size: 15px;\">
            ";
            // line 393
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["aplazados"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["partido"]) {
                // line 394
                echo "                <div class=\"row\">
                    <div class=\"col-3 col-md-1 text-center\">
                        J";
                // line 396
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "jornada", [], "any", false, false, false, 396), "html", null, true);
                echo "
                    </div>
                    <div class=\"col-5 col-md-2 text-center\">
                        ";
                // line 399
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "fecha", [], "any", false, false, false, 399), "d/m/Y"), "html", null, true);
                echo "
                    </div>
                    <div class=\"col-4 col-md-1 text-center\">
                        ";
                // line 402
                if (0 === twig_compare(twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "hora_prevista", [], "any", false, false, false, 402),  -2, null), "11")) {
                    // line 403
                    echo "                            ";
                    $context["hora"] = ":";
                    // line 404
                    echo "                        ";
                } else {
                    // line 405
                    echo "                            ";
                    $context["hora"] = twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "hora_prevista", [], "any", false, false, false, 405), 0, 5);
                    // line 406
                    echo "                        ";
                }
                // line 407
                echo "                        ";
                echo twig_escape_filter($this->env, ($context["hora"] ?? null), "html", null, true);
                echo "
                    </div>
                    <div class=\"col-6 col-md-4 text-right\">
                        <strong class=\"d-block d-md-none\">";
                // line 410
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "localCorto", [], "any", false, false, false, 410), "html", null, true);
                echo "</strong>
                        <strong class=\"d-none d-md-block\">";
                // line 411
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "local", [], "any", false, false, false, 411), "html", null, true);
                echo "</strong>
                    </div>
                    <div class=\"col-6 col-md-4 text-left\">
                        <strong class=\"d-block d-md-none\">";
                // line 414
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "visitanteCorto", [], "any", false, false, false, 414), "html", null, true);
                echo "</strong>
                        <strong class=\"d-none d-md-block\">";
                // line 415
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "visitante", [], "any", false, false, false, 415), "html", null, true);
                echo "</strong>
                    </div>
                    <div class=\"col-12\" style=\"font-size: 13px; margin-bottom: 10px; padding-bottom: 10px; border-bottom: solid 1px #212529;\">
                        <em style=\"";
                // line 418
                if ( !call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_MOBILE__"])) {
                    echo " font-size: 14px; ";
                }
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "observaciones", [], "any", false, false, false, 418), "html", null, true);
                echo "</em>
                    </div>
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['partido'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 422
            echo "        </div>
    </div>
</div>
";
        }
        // line 426
        echo "
";
        // line 454
        echo "
";
    }

    public function getTemplateName()
    {
        return "temporada/__content/__part/pesClasificacion.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  864 => 454,  861 => 426,  855 => 422,  841 => 418,  835 => 415,  831 => 414,  825 => 411,  821 => 410,  814 => 407,  811 => 406,  808 => 405,  805 => 404,  802 => 403,  800 => 402,  794 => 399,  788 => 396,  784 => 394,  780 => 393,  777 => 392,  771 => 363,  769 => 362,  765 => 360,  762 => 359,  760 => 358,  756 => 356,  751 => 353,  742 => 350,  739 => 349,  736 => 342,  734 => 332,  729 => 331,  723 => 323,  721 => 322,  717 => 320,  713 => 318,  706 => 316,  702 => 314,  697 => 311,  691 => 308,  688 => 307,  686 => 306,  679 => 304,  676 => 303,  668 => 300,  665 => 299,  663 => 298,  660 => 297,  658 => 296,  655 => 295,  651 => 294,  648 => 293,  646 => 292,  633 => 282,  626 => 277,  617 => 273,  613 => 271,  607 => 268,  604 => 267,  602 => 266,  599 => 265,  597 => 264,  591 => 261,  584 => 257,  578 => 256,  571 => 252,  565 => 251,  558 => 247,  552 => 246,  545 => 242,  539 => 241,  532 => 237,  526 => 236,  519 => 232,  513 => 231,  506 => 227,  500 => 226,  497 => 225,  491 => 222,  485 => 219,  481 => 218,  474 => 216,  468 => 215,  464 => 213,  456 => 211,  450 => 209,  448 => 208,  445 => 207,  442 => 199,  435 => 195,  430 => 192,  426 => 190,  423 => 189,  420 => 188,  418 => 187,  415 => 186,  412 => 185,  410 => 184,  407 => 183,  401 => 181,  399 => 180,  396 => 179,  392 => 177,  390 => 176,  387 => 175,  383 => 173,  381 => 172,  377 => 171,  371 => 168,  367 => 166,  365 => 165,  342 => 164,  339 => 162,  336 => 161,  333 => 160,  330 => 159,  327 => 158,  325 => 157,  322 => 156,  319 => 155,  316 => 154,  314 => 153,  311 => 152,  309 => 151,  306 => 150,  303 => 149,  300 => 148,  298 => 147,  295 => 146,  292 => 145,  289 => 144,  286 => 143,  284 => 142,  281 => 141,  278 => 140,  275 => 139,  272 => 138,  269 => 137,  266 => 136,  263 => 135,  260 => 134,  258 => 133,  255 => 132,  253 => 130,  252 => 129,  251 => 128,  248 => 127,  246 => 126,  243 => 125,  239 => 123,  237 => 122,  234 => 121,  232 => 118,  231 => 117,  230 => 116,  227 => 115,  225 => 114,  222 => 113,  218 => 112,  215 => 111,  212 => 110,  210 => 109,  207 => 108,  200 => 91,  194 => 87,  192 => 86,  145 => 41,  140 => 40,  135 => 39,  130 => 38,  125 => 37,  120 => 36,  115 => 35,  110 => 34,  105 => 33,  100 => 32,  96 => 31,  91 => 29,  86 => 26,  81 => 24,  76 => 23,  74 => 22,  69 => 20,  65 => 19,  61 => 18,  55 => 14,  43 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "temporada/__content/__part/pesClasificacion.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.eu/v2/templates/temporada/__content/__part/pesClasificacion.html.twig");
    }
}
