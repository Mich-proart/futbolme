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
class __TwigTemplate_61d72541ecfd375139807cb7d26741f9ac5547be1a111c3681351289501a1519 extends Template
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
            </tr>
        </thead>

        <tbody>

        ";
        // line 103
        echo "
            ";
        // line 104
        $context["equiposTw"] = [];
        // line 105
        echo "            ";
        $context["classFila"] = "";
        // line 106
        echo "
            ";
        // line 107
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["clasificacion"] ?? null), "clasificacionFinal", [], "any", false, false, false, 107));
        foreach ($context['_seq'] as $context["key"] => $context["fila"]) {
            // line 108
            echo "
                ";
            // line 109
            if (-1 === twig_compare($context["key"], 30)) {
                // line 110
                echo "
                    ";
                // line 111
                $context["equipoTW"] = ["id" => twig_get_attribute($this->env, $this->source,                 // line 112
$context["fila"], "equipo_id", [], "any", false, false, false, 112), "equipo" => twig_get_attribute($this->env, $this->source,                 // line 113
$context["fila"], "nombreCorto", [], "any", false, false, false, 113), "idPais" => 60];
                // line 116
                echo "
                    ";
                // line 117
                $context["equiposTw"] = call_user_func_array($this->env->getFunction('anadirAArray')->getCallable(), [($context["equiposTw"] ?? null), ($context["equipoTW"] ?? null)]);
                // line 118
                echo "
                ";
            }
            // line 120
            echo "
                ";
            // line 121
            $context["pgEnlace"] = ((("/resultados-directo/equipo/" . call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["fila"], "nombre", [], "any", false, false, false, 121)])) . "/") . twig_get_attribute($this->env, $this->source, $context["fila"], "equipo_id", [], "any", false, false, false, 121));
            // line 122
            echo "
                ";
            // line 123
            $context["pgEnlaceClasificacionBase"] = $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_clasificacion", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,             // line 124
$context["fila"], "nombre", [], "any", false, false, false, 124)]), "idEquipo" => twig_get_attribute($this->env, $this->source,             // line 125
$context["fila"], "equipo_id", [], "any", false, false, false, 125)]);
            // line 127
            echo "
                ";
            // line 128
            $context["color_fondo"] = "white";
            // line 129
            echo "                ";
            if (twig_get_attribute($this->env, $this->source, $context["fila"], "preferente", [], "any", true, true, false, 129)) {
                // line 130
                echo "                    ";
                if (twig_get_attribute($this->env, $this->source, $context["fila"], "preferente", [], "any", false, false, false, 130)) {
                    // line 131
                    echo "                        ";
                    $context["color_fondo"] = "yellow";
                    // line 132
                    echo "                    ";
                }
                // line 133
                echo "                ";
            }
            // line 134
            echo "
                ";
            // line 135
            $context["color_fila"] = "";
            // line 136
            echo "                ";
            if (((isset($context["equipo_id"]) || array_key_exists("equipo_id", $context)) && 0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["fila"], "equipo_id", [], "any", false, false, false, 136), ($context["equipo_id"] ?? null)))) {
                // line 137
                echo "                    ";
                $context["color_fila"] = "style='background-color:#BCF5A9'";
                // line 138
                echo "                ";
            }
            // line 139
            echo "
                ";
            // line 140
            if (((isset($context["equipo_rival_id"]) || array_key_exists("equipo_rival_id", $context)) && 0 === twig_compare(($context["equipo_rival_id"] ?? null), twig_get_attribute($this->env, $this->source, $context["fila"], "equipo_id", [], "any", false, false, false, 140)))) {
                // line 141
                echo "                    ";
                $context["color_fila"] = "style='background-color:#F8E6E0'";
                // line 142
                echo "                ";
            }
            // line 143
            echo "
                ";
            // line 144
            $context["rutaEscudo"] = call_user_func_array($this->env->getFunction('rutaEscudo')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["fila"], "club_id", [], "any", false, false, false, 144), twig_get_attribute($this->env, $this->source, $context["fila"], "equipo_id", [], "any", false, false, false, 144)]);
            // line 145
            echo "
                ";
            // line 146
            if ( !call_user_func_array($this->env->getFunction('fileExists')->getCallable(), [($context["rutaEscudo"] ?? null)])) {
                // line 147
                echo "                    ";
                $context["rutaEscudo"] = "/static/img/jugadores/NI.png";
                // line 148
                echo "                ";
            }
            // line 149
            echo "
                ";
            // line 150
            if (0 === twig_compare(($context["key"] % 2), 0)) {
                // line 151
                echo "                    ";
                $context["classFila"] = "fila-par";
                // line 152
                echo "                ";
            } else {
                // line 153
                echo "                    ";
                $context["classFila"] = "fila-impar";
                // line 154
                echo "                ";
            }
            // line 155
            echo "
                ";
            // line 157
            echo "                <tr class=\"";
            echo twig_escape_filter($this->env, ($context["classFila"] ?? null), "html", null, true);
            echo "\" ";
            if (((isset($context["equipo_id"]) || array_key_exists("equipo_id", $context)) && 0 === twig_compare(($context["equipo_id"] ?? null), twig_get_attribute($this->env, $this->source, $context["fila"], "equipo_id", [], "any", false, false, false, 157)))) {
                echo " style=\"background: #8AE813;\" ";
            }
            echo ">
                    ";
            // line 158
            if ((isset($context["trt"]) || array_key_exists("trt", $context))) {
                // line 159
                echo "
                        <td class=\"text-center\" style=\"padding: 0px;\">
                            ";
                // line 161
                echo twig_escape_filter($this->env, ($context["key"] + 1), "html", null, true);
                echo "
                        </td>
                        <td class=\"text-center\">
                            <a href='/temporada.php?id=";
                // line 164
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "temporada_id", [], "any", false, false, false, 164), "html", null, true);
                echo "'>
                            ";
                // line 165
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["fila"], "temporada_id", [], "any", false, false, false, 165), 1)) {
                    // line 166
                    echo "                                1
                            ";
                }
                // line 168
                echo "
                            ";
                // line 169
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["fila"], "temporada_id", [], "any", false, false, false, 169), 2)) {
                    // line 170
                    echo "                                2
                            ";
                }
                // line 172
                echo "
                            ";
                // line 173
                if ((1 === twig_compare(twig_get_attribute($this->env, $this->source, $context["fila"], "temporada_id", [], "any", false, false, false, 173), 2) && -1 === twig_compare(twig_get_attribute($this->env, $this->source, $context["fila"], "temporada_id", [], "any", false, false, false, 173), 7))) {
                    // line 174
                    echo "                                2BG";
                    echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, $context["fila"], "temporada_id", [], "any", false, false, false, 174) - 2), "html", null, true);
                    echo "
                            ";
                }
                // line 176
                echo "
                            ";
                // line 177
                if (1 === twig_compare(twig_get_attribute($this->env, $this->source, $context["fila"], "temporada_id", [], "any", false, false, false, 177), 6)) {
                    // line 178
                    echo "                                ";
                    $context["d"] = (twig_get_attribute($this->env, $this->source, $context["fila"], "temporada_id", [], "any", false, false, false, 178) - 6);
                    // line 179
                    echo "
                                ";
                    // line 180
                    if (-1 === twig_compare(($context["d"] ?? null), 10)) {
                        // line 181
                        echo "                                    ";
                        $context["d"] = ("0" . ($context["d"] ?? null));
                        // line 182
                        echo "                                ";
                    }
                    // line 183
                    echo "
                            ";
                }
                // line 185
                echo "                            </a>
                        </td>
                        <td class=\"text-center\">
                            ";
                // line 188
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (twig_get_attribute($this->env, $this->source, $context["fila"], "puntos", [], "any", false, false, false, 188) / twig_get_attribute($this->env, $this->source, $context["fila"], "jugados", [], "any", false, false, false, 188)), 2), "html", null, true);
                echo "
                        </td>

                    ";
            }
            // line 192
            echo "                    <td class=\"text-left celda-posicion\" style=\"";
            echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["fila"], "css", [], "any", false, false, false, 192), ["background-color" => "color", "white" => "#000000", "gold" => "#F1C422", "orange" => "#E38800", "indianred" => "#E80000"]), "html", null, true);
            // line 200
            echo ";\">
                        ";
            // line 201
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "posicion", [], "any", false, false, false, 201), "html", null, true);
            echo "
                    </td>
                    <td style=\"text-align:left;min-width: 130px\" itemscope itemtype=\"http://schema.org/SportsTeam\">
                        <a href=\"";
            // line 204
            echo twig_escape_filter($this->env, ($context["pgEnlace"] ?? null), "html", null, true);
            echo "&modelo=Calendario\" title=\"Calendario del ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "nombreCorto", [], "any", false, false, false, 204), "html", null, true);
            echo "\">
                            <img src=\"";
            // line 205
            echo twig_escape_filter($this->env, ($context["rutaEscudo"] ?? null), "html", null, true);
            echo "\" itemprop=\"logo\" alt=\"escudo ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "nombre", [], "any", false, false, false, 205), "html", null, true);
            echo "\" style=\"width:18px; height:20px; margin-right: 2px\">
                            <strong itemprop=\"name\">
                                ";
            // line 207
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "nombreCorto", [], "any", false, false, false, 207), "html", null, true);
            echo "
                            </strong>

                            <meta itemprop=\"url\" content=\"";
            // line 210
            echo twig_escape_filter($this->env, ($context["pgEnlace"] ?? null), "html", null, true);
            echo "\">
                        </a>
                    </td>
                    <td class=\"text-center\" style=\"";
            // line 213
            echo "\">
                        <a style=\"color:black\" href=\"";
            // line 214
            echo twig_escape_filter($this->env, ($context["pgEnlaceClasificacionBase"] ?? null), "html", null, true);
            echo "puntos\" title=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "nombreCorto", [], "any", false, false, false, 214), "html", null, true);
            echo " - Puntos conseguidos\">
                            <b>";
            // line 215
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "puntos", [], "any", false, false, false, 215), "html", null, true);
            echo "</b></a>
                    </td>
                    <td class=\"text-center\">
                        <a style=\"color:black\" href=\"";
            // line 218
            echo twig_escape_filter($this->env, ($context["pgEnlaceClasificacionBase"] ?? null), "html", null, true);
            echo "jugados\" title=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "nombreCorto", [], "any", false, false, false, 218), "html", null, true);
            echo " - Partidos jugados\">
                            ";
            // line 219
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "jugados", [], "any", false, false, false, 219), "html", null, true);
            echo "
                        </a>
                    </td>
                    <td class=\"text-center\">
                        <a style=\"color:black\" href=\"";
            // line 223
            echo twig_escape_filter($this->env, ($context["pgEnlaceClasificacionBase"] ?? null), "html", null, true);
            echo "ganados\" title=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "nombreCorto", [], "any", false, false, false, 223), "html", null, true);
            echo " - Partidos ganados\">
                            ";
            // line 224
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "ganados", [], "any", false, false, false, 224), "html", null, true);
            echo "
                        </a>
                    </td>
                    <td class=\"text-center\">
                        <a style=\"color:black\" href=\"";
            // line 228
            echo twig_escape_filter($this->env, ($context["pgEnlaceClasificacionBase"] ?? null), "html", null, true);
            echo "empatados\" title=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "nombreCorto", [], "any", false, false, false, 228), "html", null, true);
            echo " - Partidos empatados\">
                            ";
            // line 229
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "empatados", [], "any", false, false, false, 229), "html", null, true);
            echo "
                        </a>
                    </td>
                    <td class=\"text-center\">
                        <a style=\"color:black\" href=\"";
            // line 233
            echo twig_escape_filter($this->env, ($context["pgEnlaceClasificacionBase"] ?? null), "html", null, true);
            echo "perdidos\" title=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "nombreCorto", [], "any", false, false, false, 233), "html", null, true);
            echo " - Partidos perdidos\">
                            ";
            // line 234
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "perdidos", [], "any", false, false, false, 234), "html", null, true);
            echo "
                        </a>
                    </td>
                    <td class=\"text-center\">
                        <a style=\"color:black\" href=\"";
            // line 238
            echo twig_escape_filter($this->env, ($context["pgEnlaceClasificacionBase"] ?? null), "html", null, true);
            echo "favor\" title=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "nombreCorto", [], "any", false, false, false, 238), "html", null, true);
            echo " - Goles a favor\">
                            ";
            // line 239
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "gFavor", [], "any", false, false, false, 239), "html", null, true);
            echo "
                        </a>
                    </td>
                    <td class=\"text-center\">
                        <a style=\"color:black\" href=\"";
            // line 243
            echo twig_escape_filter($this->env, ($context["pgEnlaceClasificacionBase"] ?? null), "html", null, true);
            echo "contra\" title=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "nombreCorto", [], "any", false, false, false, 243), "html", null, true);
            echo " - Goles en contra\">
                            ";
            // line 244
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "gContra", [], "any", false, false, false, 244), "html", null, true);
            echo "
                        </a>
                    </td>
                    <td class=\"text-center\">
                        ";
            // line 248
            echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, $context["fila"], "gFavor", [], "any", false, false, false, 248) - twig_get_attribute($this->env, $this->source, $context["fila"], "gContra", [], "any", false, false, false, 248)), "html", null, true);
            echo "
                    </td>
                </tr>

            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['fila'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 253
        echo "
        </tbody>
    </table>
    <div class=\"row\">
        <div class=\"col-12\">
            <div id=\"bottomLaTabla\" class=\"";
        // line 258
        echo twig_escape_filter($this->env, ($context["classFila"] ?? null), "html", null, true);
        echo "\">

            </div>
        </div>
    </div>
</div>




";
        // line 268
        if (twig_get_attribute($this->env, $this->source, ($context["clasificacion"] ?? null), "sanciones", [], "any", true, true, false, 268)) {
            // line 269
            echo "    <div class=\"col-12\">
        ";
            // line 270
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["clasificacion"] ?? null), "sanciones", [], "any", false, false, false, 270));
            foreach ($context['_seq'] as $context["_key"] => $context["fila"]) {
                // line 271
                echo "
            ";
                // line 272
                if (twig_get_attribute($this->env, $this->source, $context["fila"], "nombre", [], "any", true, true, false, 272)) {
                    // line 273
                    echo "                <strong>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "nombre", [], "any", false, false, false, 273), "html", null, true);
                    echo "</strong> cuenta con <span style='color:red'><strong>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "puntos", [], "any", false, false, false, 273), "html", null, true);
                    echo "</strong></span> puntos por sanción federativa<br />
            ";
                }
                // line 275
                echo "
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['fila'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 277
            echo "    </div>
";
        }
        // line 279
        echo "

";
        // line 281
        if ( !(isset($context["trt"]) || array_key_exists("trt", $context))) {
            // line 282
            echo "<div class=\"col-12\">
    <div class=\"col-12 contenedorLeyendaClasificacion\" style=\"float: left; background: #4A4A4A; -webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;\">
        ";
            // line 290
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["clasificacion"] ?? null), "leyenda", [], "any", false, false, false, 290));
            foreach ($context['_seq'] as $context["_key"] => $context["fila"]) {
                // line 291
                echo "            ";
                // line 301
                echo "            <div class=\"text-left\" style=\"float: left; margin-right: 20px; color:";
                echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["fila"], "fondo", [], "any", false, false, false, 301), ["white" => "#000000", "gold" => "#F1C422", "orange" => "#E38800", "indianred" => "#E80000"]), "html", null, true);
                // line 308
                echo "\">
                ";
                // line 309
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "leyenda", [], "any", false, false, false, 309), "html", null, true);
                echo "
            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['fila'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 312
            echo "    </div>
</div>
";
        }
        // line 315
        echo "
";
        // line 343
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
        return array (  648 => 343,  645 => 315,  640 => 312,  631 => 309,  628 => 308,  625 => 301,  623 => 291,  618 => 290,  612 => 282,  610 => 281,  606 => 279,  602 => 277,  595 => 275,  587 => 273,  585 => 272,  582 => 271,  578 => 270,  575 => 269,  573 => 268,  560 => 258,  553 => 253,  542 => 248,  535 => 244,  529 => 243,  522 => 239,  516 => 238,  509 => 234,  503 => 233,  496 => 229,  490 => 228,  483 => 224,  477 => 223,  470 => 219,  464 => 218,  458 => 215,  452 => 214,  449 => 213,  443 => 210,  437 => 207,  430 => 205,  424 => 204,  418 => 201,  415 => 200,  412 => 192,  405 => 188,  400 => 185,  396 => 183,  393 => 182,  390 => 181,  388 => 180,  385 => 179,  382 => 178,  380 => 177,  377 => 176,  371 => 174,  369 => 173,  366 => 172,  362 => 170,  360 => 169,  357 => 168,  353 => 166,  351 => 165,  347 => 164,  341 => 161,  337 => 159,  335 => 158,  326 => 157,  323 => 155,  320 => 154,  317 => 153,  314 => 152,  311 => 151,  309 => 150,  306 => 149,  303 => 148,  300 => 147,  298 => 146,  295 => 145,  293 => 144,  290 => 143,  287 => 142,  284 => 141,  282 => 140,  279 => 139,  276 => 138,  273 => 137,  270 => 136,  268 => 135,  265 => 134,  262 => 133,  259 => 132,  256 => 131,  253 => 130,  250 => 129,  248 => 128,  245 => 127,  243 => 125,  242 => 124,  241 => 123,  238 => 122,  236 => 121,  233 => 120,  229 => 118,  227 => 117,  224 => 116,  222 => 113,  221 => 112,  220 => 111,  217 => 110,  215 => 109,  212 => 108,  208 => 107,  205 => 106,  202 => 105,  200 => 104,  197 => 103,  145 => 41,  140 => 40,  135 => 39,  130 => 38,  125 => 37,  120 => 36,  115 => 35,  110 => 34,  105 => 33,  100 => 32,  96 => 31,  91 => 29,  86 => 26,  81 => 24,  76 => 23,  74 => 22,  69 => 20,  65 => 19,  61 => 18,  55 => 14,  43 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "temporada/__content/__part/pesClasificacion.html.twig", "/home/futbolme/domains/futbolme.com/public_html/v2/templates/temporada/__content/__part/pesClasificacion.html.twig");
    }
}
