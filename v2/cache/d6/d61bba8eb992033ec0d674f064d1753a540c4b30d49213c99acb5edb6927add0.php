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

/* index/__part/partidoDirectoSueltos.html.twig */
class __TwigTemplate_37fce965d7fe57122bc7ad435d7f20023739bbe0d039a6a1dbfc3c93f2ffdca9 extends Template
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
        if (((isset($context["f"]) || array_key_exists("f", $context)) && 0 !== twig_compare(($context["f"] ?? null), twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "fecha", [], "any", false, false, false, 1)))) {
            // line 2
            echo "    ";
            if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "colorFondo", [], "any", false, false, false, 2), "whitebox")) {
                // line 3
                echo "        ";
                $context["partido"] = twig_array_merge(($context["partido"] ?? null), ["colorFondo" => "cajagrisclaro"]);
                // line 6
                echo "    ";
            } else {
                // line 7
                echo "        ";
                $context["partido"] = twig_array_merge(($context["partido"] ?? null), ["colorFondo" => "whitebox"]);
                // line 10
                echo "    ";
            }
            // line 11
            echo "
    <div class=\"row\">
        <div class=\"col-12 nombreDiaPartido\">
            ";
            // line 14
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('nombreDiaCompleto')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "fecha", [], "any", false, false, false, 14)]), "html", null, true);
            echo "
        </div>
    </div>

";
        }
        // line 19
        echo "
<div class=\"col-12 cajaGlobalPartidos ";
        // line 20
        if (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "enJuego", [], "any", false, false, false, 20)) {
            echo " partidosEnJuego";
        }
        echo "\">
    <div class=\"cajaPartido row ";
        // line 21
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "colorfondo", [], "any", false, false, false, 21), "html", null, true);
        echo " \" itemscope
         itemtype=\"http://schema.org/SportsEvent\" style=\"padding:5px !important\">

        <meta itemprop=\"name\" content=\"";
        // line 24
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "localCorto", [], "any", false, false, false, 24), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitanteCorto", [], "any", false, false, false, 24), "html", null, true);
        echo "\">
        <meta itemprop=\"description\" content=\"Partido entre ";
        // line 25
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "localCorto", [], "any", false, false, false, 25), "html", null, true);
        echo " y ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitanteCorto", [], "any", false, false, false, 25), "html", null, true);
        echo "\">
        <span itemprop=\"location\" itemscope itemtype=\"http://schema.org/Place\">
            <meta itemprop=\"name\" content=\"";
        // line 27
        if (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estadio_nombre", [], "any", false, false, false, 27)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estadio_nombre", [], "any", false, false, false, 27), "html", null, true);
        } else {
            echo "Campo de fútbol";
        }
        echo "\">
            <meta itemprop=\"address\" content=\"";
        // line 28
        if (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estadio_localidad", [], "any", false, false, false, 28)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estadio_localidad", [], "any", false, false, false, 28), "html", null, true);
        } else {
            echo "Campo de fútbol";
        }
        echo "\">
        </span>

        <div class=\"col-12\">
            <div class=\"row\">
                <div class=\"col-12 contenedorPrimeraLinea\">
                    <div class=\"col-12\">
                        <div class=\"row\">

                        <div class=\"nopadding col-3 h25 ";
        // line 37
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "colorFondo", [], "any", false, false, false, 37), "html", null, true);
        echo "\">
                            ";
        // line 38
        if (((0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 38), 2) || 0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 38), 6)) || 0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 38), 1))) {
            // line 39
            echo "                                <div class=\"horaPrevistaPartido\">
                                    ";
            // line 40
            if (0 === twig_compare(twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "hora_prevista", [], "any", false, false, false, 40),  -2, null), "11")) {
                // line 41
                echo "                                        ";
                $context["hora"] = ":";
                // line 42
                echo "                                    ";
            } else {
                // line 43
                echo "                                        ";
                $context["hora"] = twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "hora_prevista", [], "any", false, false, false, 43), 0, 5);
                // line 44
                echo "                                    ";
            }
            // line 45
            echo "
                                    ";
            // line 46
            echo twig_escape_filter($this->env, ($context["hora"] ?? null), "html", null, true);
            echo "
                                </div>
                            ";
        }
        // line 49
        echo "                        </div>

                        <div class=\"col-6 h25 text-center\">
                            ";
        // line 52
        if (((isset($context["jornadaActiva"]) || array_key_exists("jornadaActiva", $context)) && 1 === twig_compare(($context["jornadaActiva"] ?? null), 0))) {
            // line 53
            echo "                                <i style='color:dimgray'>
                                    &nbsp;&nbsp;";
            // line 54
            echo twig_escape_filter($this->env, ($context["jornadaTxt"] ?? null), "html", null, true);
            echo "
                                </i>
                            ";
        }
        // line 57
        echo "
                            ";
        // line 58
        if ((1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 58), 1) && 0 !== twig_compare(($context["pagina"] ?? null), "televisados"))) {
            // line 59
            echo "
                                ";
            // line 60
            $context["colorTexto"] = "white";
            // line 61
            echo "
                                ";
            // line 62
            if (1 === twig_compare(twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "comentarios", [], "any", false, false, false, 62)), 2)) {
                // line 63
                echo "                                    ";
                $context["t"] = null;
                // line 64
                echo "
                                    ";
                // line 65
                $context["t"] = twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "comentarios", [], "any", false, false, false, 65), "-");
                // line 66
                echo "
                                    ";
                // line 67
                if (twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 3, [], "any", true, true, false, 67)) {
                    // line 68
                    echo "                                        ";
                    $context["ev"] = twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 3, [], "any", false, false, false, 68);
                    // line 69
                    echo "                                    ";
                }
                // line 70
                echo "
                                    ";
                // line 71
                if ((isset($context["t"]) || array_key_exists("t", $context))) {
                    // line 72
                    echo "
                                        ";
                    // line 73
                    $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#f07474"]);
                    // line 76
                    echo "
                                        ";
                    // line 77
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 77), 1)) {
                        // line 78
                        echo "                                            ";
                        $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#f07474"]);
                        // line 81
                        echo "                                        ";
                    }
                    // line 82
                    echo "
                                        ";
                    // line 83
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 83), 2)) {
                        // line 84
                        echo "                                            ";
                        $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#7cc002"]);
                        // line 87
                        echo "                                        ";
                    }
                    // line 88
                    echo "
                                        ";
                    // line 89
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 89), 3)) {
                        // line 90
                        echo "                                            ";
                        $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#610B0B"]);
                        // line 93
                        echo "                                        ";
                    }
                    // line 94
                    echo "
                                        ";
                    // line 95
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 95), 4)) {
                        // line 96
                        echo "                                            ";
                        $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#0B3B0B"]);
                        // line 99
                        echo "                                        ";
                    }
                    // line 100
                    echo "
                                        ";
                    // line 101
                    $context["t"] = twig_array_merge(($context["t"] ?? null), ["tiempo" => ("Minuto " . twig_get_attribute($this->env, $this->source,                     // line 102
($context["t"] ?? null), 1, [], "any", false, false, false, 102))]);
                    // line 104
                    echo "
                                        ";
                    // line 105
                    if ((twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 2, [], "any", true, true, false, 105) && 1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 2, [], "any", false, false, false, 105), 0))) {
                        // line 106
                        echo "                                            ";
                        $context["t"] = twig_array_merge(($context["t"] ?? null), ["tiempo" => (("<span style=\"font-size:11px; color:white; float:right;\">" . twig_get_attribute($this->env, $this->source,                         // line 107
($context["t"] ?? null), 2, [], "any", false, false, false, 107)) . "</span>")]);
                        // line 109
                        echo "                                        ";
                    }
                    // line 110
                    echo "

                                        ";
                    // line 112
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 112), 6)) {
                        // line 113
                        echo "                                            ";
                        $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#ffe400", "tiempo" => "Descanso"]);
                        // line 117
                        echo "
                                            ";
                        // line 118
                        $context["colorTexto"] = "maroon";
                        // line 119
                        echo "                                        ";
                    }
                    // line 120
                    echo "
                                        ";
                    // line 121
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 121), 7)) {
                        // line 122
                        echo "                                            ";
                        $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#2E2E2E", "tiempo" => "Penaltis"]);
                        // line 126
                        echo "                                        ";
                    }
                    // line 127
                    echo "
                                        ";
                    // line 128
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 128), 8)) {
                        // line 129
                        echo "                                            ";
                        $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "blue", "tiempo" => "Prórroga"]);
                        // line 133
                        echo "                                        ";
                    }
                    // line 134
                    echo "
                                    ";
                }
                // line 136
                echo "                                ";
            }
            // line 137
            echo "

                                <div class=\"infopwhitebox\">
                                    ";
            // line 140
            if ((isset($context["t"]) || array_key_exists("t", $context))) {
                // line 141
                echo "
                                    ";
                // line 142
                if ((twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "categoria_torneo_id", [], "any", true, true, false, 142) && 0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "categoria_torneo_id", [], "any", false, false, false, 142), 17))) {
                    // line 143
                    echo "                                        ";
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 143), 2)) {
                        // line 144
                        echo "                                            ";
                        $context["t"] = twig_array_merge(($context["t"] ?? null), ["tiempo" => "2ª parte"]);
                        // line 147
                        echo "                                        ";
                    }
                    // line 148
                    echo "
                                        ";
                    // line 149
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 149), 1)) {
                        // line 150
                        echo "                                            ";
                        $context["t"] = twig_array_merge(($context["t"] ?? null), ["tiempo" => "1ª parte"]);
                        // line 153
                        echo "                                        ";
                    }
                    // line 154
                    echo "                                    ";
                }
                // line 155
                echo "
                                    ";
                // line 156
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 156), 6)) {
                    // line 157
                    echo "                                        <p class=\"timeresult\" style=\" color: orange !important\">Descanso</p>
                                    ";
                } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,                 // line 158
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 158), 7)) {
                    // line 159
                    echo "                                        <p class=\"timeresult\" style=\"color: #E81346;\">Penaltis</p>
                                    ";
                } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,                 // line 160
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 160), 8)) {
                    // line 161
                    echo "                                        <p class=\"timeresult\" style=\"color: dodgerblue;\">Prórroga</p>
                                    ";
                } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,                 // line 162
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 162), 9)) {
                    // line 163
                    echo "                                        <p class=\"timeresult\" style=\"color: #9EFF23;\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), "tiempo", [], "any", false, false, false, 163), "html", null, true);
                    echo "</p>
                                    ";
                } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,                 // line 164
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 164), 10)) {
                    // line 165
                    echo "                                        <p class=\"timeresult\" style=\"color: #9EFF23;\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), "tiempo", [], "any", false, false, false, 165), "html", null, true);
                    echo "</p>
                                    ";
                } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,                 // line 166
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 166), 11)) {
                    // line 167
                    echo "                                        <p class=\"timeresult\" style=\"color: orange;\">Desc.Prórr.</p>
                                    ";
                } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,                 // line 168
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 168), 2)) {
                    // line 169
                    echo "                                        <p class=\"timeresult\" style=\"color: #9EFF23; !important\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), "tiempo", [], "any", false, false, false, 169), "html", null, true);
                    echo "</p>
                                    ";
                }
                // line 171
                echo "
                                    ";
            }
            // line 173
            echo "                                </div>
                    ";
        }
        // line 175
        echo "                        </div>


                        <div class=\"contenedorIconosPartido col-3 nopadding h25\">
                            <div class=\"pull-right\" style=\"margin-right: 4px !important\">

                                ";
        // line 181
        echo ($context["icono"] ?? null);
        echo "

                                <a class=\"simboloMasPartido\" href=\"javascript:mostrarColor(";
        // line 183
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 183), "html", null, true);
        echo ");\">
                                    ";
        // line 184
        if (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "enJuego", [], "any", false, false, false, 184)) {
            // line 185
            echo "                                        <img src=\"/static/img/simbolo-mas-blanco.svg\" title=\"Partido entre ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "local", [], "any", false, false, false, 185), "html", null, true);
            echo " y ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitante", [], "any", false, false, false, 185), "html", null, true);
            echo "\" alt=\"Partido entre ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "local", [], "any", false, false, false, 185), "html", null, true);
            echo " y ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitante", [], "any", false, false, false, 185), "html", null, true);
            echo "\">
                                    ";
        } else {
            // line 187
            echo "                                        <img src=\"/static/img/simbolo-mas.svg\" title=\"Partido entre ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "local", [], "any", false, false, false, 187), "html", null, true);
            echo " y ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitante", [], "any", false, false, false, 187), "html", null, true);
            echo "\" alt=\"Partido entre ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "local", [], "any", false, false, false, 187), "html", null, true);
            echo " y ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitante", [], "any", false, false, false, 187), "html", null, true);
            echo "\">
                                    ";
        }
        // line 189
        echo "                                </a>

                            </div>

                        </div>

                    </div>
                    </div>
                </div>

                <div class=\"col-12\">
                    <div class=\"row\">

                        <div class=\"col-5 equipoPartido equipoPartidoLocal\">
                            <p class=\"pull-right boldfont lead txt11\" style=\"padding-right: 10px; color:";
        // line 203
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "colorL", [], "any", false, false, false, 203), "html", null, true);
        echo ";  background-color:";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "fondocolorL", [], "any", false, false, false, 203), "html", null, true);
        echo "; cursor:pointer;\"  onclick=\"mostrarColor(";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 203), "html", null, true);
        echo ")\">
                                <span itemprop=\"name\" class=\"txt11\">
                                    ";
        // line 205
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "localCorto", [], "any", false, false, false, 205), "html", null, true);
        echo "
                                </span>
                            </p>
                        </div>

                        ";
        // line 210
        $context["aplazadoOSuspendido"] = false;
        // line 211
        echo "                        <div class=\"col-2 resultadoPartido\">
                            ";
        // line 212
        if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 212), 1)) {
            // line 213
            echo "
                                <span
                                        ";
            // line 215
            if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "goles_local", [], "any", false, false, false, 215), 1)) {
                // line 216
                echo "                                    style='padding: 1px 1px;'
                                        ";
            }
            // line 217
            echo ">

                                    ";
            // line 219
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "goles_local", [], "any", false, false, false, 219), "html", null, true);
            echo "
                                </span>
                                -
                                <span
                                        ";
            // line 223
            if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "goles_visitante", [], "any", false, false, false, 223), 1)) {
                // line 224
                echo "                                            style='padding: 1px 1px;'
                                        ";
            }
            // line 226
            echo "                                >
                                    ";
            // line 227
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "goles_visitante", [], "any", false, false, false, 227), "html", null, true);
            echo "
                                </span>

                            ";
        } elseif (1 === twig_compare(twig_get_attribute($this->env, $this->source,         // line 230
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 230), 2)) {
            // line 231
            echo "
                                <div class=\"horaPartido\" style=\"color:tomato; font-size:12px; margin-top: -20px;\">
                                    ";
            // line 233
            if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 233), 3)) {
                // line 234
                echo "                                        ";
                $context["aplazadoOSuspendido"] = true;
                // line 235
                echo "                                        SUSP.
                                    ";
            } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 236
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 236), 4)) {
                // line 237
                echo "                                        ";
                $context["aplazadoOSuspendido"] = true;
                // line 238
                echo "                                        APLZ.
                                    ";
            }
            // line 240
            echo "                                </div>

                            ";
        }
        // line 243
        echo "

                            ";
        // line 245
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 245), 2) || 1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 245), 5))) {
            // line 246
            echo "                                <span class=\"
                                    ";
            // line 247
            if (0 === twig_compare(($context["ev"] ?? null), 5)) {
                // line 248
                echo "                                        parpadea
                                    ";
            }
            // line 249
            echo "\">
                                    ";
            // line 250
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "goles_local", [], "any", false, false, false, 250), "html", null, true);
            echo "
                                </span>

                                -

                                <span class=\"
                                    ";
            // line 256
            if (0 === twig_compare(($context["ev"] ?? null), 6)) {
                // line 257
                echo "                                        parpadea
                                    ";
            }
            // line 258
            echo "\">
                                    ";
            // line 259
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "goles_visitante", [], "any", false, false, false, 259), "html", null, true);
            echo "
                                </span>
                            ";
        }
        // line 262
        echo "
                            ";
        // line 263
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 263), 0) || (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 263), 2) && -1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 263), 6)))) {
            // line 264
            echo "                                <div class=\"text-center\">
                                    ";
            // line 279
            echo "                                    ";
            if ( !($context["aplazadoOSuspendido"] ?? null)) {
                // line 280
                echo "                                    <div class=\"horaPartido\">

                                        ";
                // line 282
                if (0 === twig_compare(twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "hora_prevista", [], "any", false, false, false, 282),  -2, null), "11")) {
                    // line 283
                    echo "                                            ";
                    $context["hora"] = ":";
                    // line 284
                    echo "                                        ";
                } else {
                    // line 285
                    echo "                                            ";
                    $context["hora"] = twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "hora_prevista", [], "any", false, false, false, 285), 0, 5);
                    // line 286
                    echo "                                        ";
                }
                // line 287
                echo "
                                        ";
                // line 288
                echo twig_escape_filter($this->env, ($context["hora"] ?? null), "html", null, true);
                echo "
                                    </div>
                                    ";
            } else {
                // line 291
                echo "                                        <div class=\"text-center\" style=\"margin-top:-10px; font-size:12px\">
                                            ";
                // line 292
                echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "fecha", [], "any", false, false, false, 292),  -2), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "fecha", [], "any", false, false, false, 292), 5, 2), "html", null, true);
                echo "
                                        </div>
                                        <div class=\"text-center\" style=\"margin-top:-25px; font-size:12px\">
                                            ";
                // line 295
                if (0 === twig_compare(twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "hora_prevista", [], "any", false, false, false, 295),  -2, null), "11")) {
                    // line 296
                    echo "                                                ";
                    $context["hora"] = ":";
                    // line 297
                    echo "                                            ";
                } else {
                    // line 298
                    echo "                                                ";
                    $context["hora"] = twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "hora_prevista", [], "any", false, false, false, 298), 0, 5);
                    // line 299
                    echo "                                            ";
                }
                // line 300
                echo "
                                            ";
                // line 301
                echo twig_escape_filter($this->env, ($context["hora"] ?? null), "html", null, true);
                echo "

                                        </div>

                                    ";
            }
            // line 306
            echo "                                </div>
                            ";
        }
        // line 308
        echo "                        </div>


                        <div class=\"col-5 equipoPartido equipoPartidoVisitante\">
                            <p class=\"pull-left boldfont lead txt11\" style=\"padding-left: 10px; color:";
        // line 312
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "colorV", [], "any", false, false, false, 312), "html", null, true);
        echo ";  background-color:";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "fondocolorV", [], "any", false, false, false, 312), "html", null, true);
        echo "; cursor:pointer;\" onclick=\"mostrarColor(";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 312), "html", null, true);
        echo ")\">
                                <span itemprop=\"name\" class=\"txt11\">
                                    ";
        // line 314
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitanteCorto", [], "any", false, false, false, 314), "html", null, true);
        echo "
                                </span>
                            </p>
                        </div>

                        <div class=\"col-12\" id=\"posicion";
        // line 319
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 319), "html", null, true);
        echo "\" style=\"display: none\">
                            <div class=\"enlacesDeInteres\">

                                <span class=\"float-right\" onclick=\"mostrarColor(";
        // line 322
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 322), "html", null, true);
        echo ")\" style=\"cursor:pointer;\">Cerrar enlaces</span>
                                <br />
                                <h4 class=\"text-center\">ENLACES DE INTERES</h4>

                                <div class=\"row\">

                                    <div class=\"enlacesDeInteresColumnaEquipo col-6 text-center\">
                                        <h6>";
        // line 329
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "localCorto", [], "any", false, false, false, 329), "html", null, true);
        echo "</h6>
                                        <a href=\"";
        // line 330
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "pgLocal", [], "any", false, false, false, 330), "html", null, true);
        echo "/datos?temp_id=";
        echo twig_escape_filter($this->env, ($context["temp_id"] ?? null), "html", null, true);
        echo "\">Calendario</a><br />
                                    </div>

                                    <div class=\"enlacesDeInteresColumnaEquipo col-6 text-center\">
                                        <h6>";
        // line 334
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitanteCorto", [], "any", false, false, false, 334), "html", null, true);
        echo "</h6>
                                        <a href=\"";
        // line 335
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "pgVisitante", [], "any", false, false, false, 335), "html", null, true);
        echo "/datos?temp_id=";
        echo twig_escape_filter($this->env, ($context["temp_id"] ?? null), "html", null, true);
        echo "\">Calendario</a><br />
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "index/__part/partidoDirectoSueltos.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  730 => 335,  726 => 334,  717 => 330,  713 => 329,  703 => 322,  697 => 319,  689 => 314,  680 => 312,  674 => 308,  670 => 306,  662 => 301,  659 => 300,  656 => 299,  653 => 298,  650 => 297,  647 => 296,  645 => 295,  637 => 292,  634 => 291,  628 => 288,  625 => 287,  622 => 286,  619 => 285,  616 => 284,  613 => 283,  611 => 282,  607 => 280,  604 => 279,  601 => 264,  599 => 263,  596 => 262,  590 => 259,  587 => 258,  583 => 257,  581 => 256,  572 => 250,  569 => 249,  565 => 248,  563 => 247,  560 => 246,  558 => 245,  554 => 243,  549 => 240,  545 => 238,  542 => 237,  540 => 236,  537 => 235,  534 => 234,  532 => 233,  528 => 231,  526 => 230,  520 => 227,  517 => 226,  513 => 224,  511 => 223,  504 => 219,  500 => 217,  496 => 216,  494 => 215,  490 => 213,  488 => 212,  485 => 211,  483 => 210,  475 => 205,  466 => 203,  450 => 189,  438 => 187,  426 => 185,  424 => 184,  420 => 183,  415 => 181,  407 => 175,  403 => 173,  399 => 171,  393 => 169,  391 => 168,  388 => 167,  386 => 166,  381 => 165,  379 => 164,  374 => 163,  372 => 162,  369 => 161,  367 => 160,  364 => 159,  362 => 158,  359 => 157,  357 => 156,  354 => 155,  351 => 154,  348 => 153,  345 => 150,  343 => 149,  340 => 148,  337 => 147,  334 => 144,  331 => 143,  329 => 142,  326 => 141,  324 => 140,  319 => 137,  316 => 136,  312 => 134,  309 => 133,  306 => 129,  304 => 128,  301 => 127,  298 => 126,  295 => 122,  293 => 121,  290 => 120,  287 => 119,  285 => 118,  282 => 117,  279 => 113,  277 => 112,  273 => 110,  270 => 109,  268 => 107,  266 => 106,  264 => 105,  261 => 104,  259 => 102,  258 => 101,  255 => 100,  252 => 99,  249 => 96,  247 => 95,  244 => 94,  241 => 93,  238 => 90,  236 => 89,  233 => 88,  230 => 87,  227 => 84,  225 => 83,  222 => 82,  219 => 81,  216 => 78,  214 => 77,  211 => 76,  209 => 73,  206 => 72,  204 => 71,  201 => 70,  198 => 69,  195 => 68,  193 => 67,  190 => 66,  188 => 65,  185 => 64,  182 => 63,  180 => 62,  177 => 61,  175 => 60,  172 => 59,  170 => 58,  167 => 57,  161 => 54,  158 => 53,  156 => 52,  151 => 49,  145 => 46,  142 => 45,  139 => 44,  136 => 43,  133 => 42,  130 => 41,  128 => 40,  125 => 39,  123 => 38,  119 => 37,  103 => 28,  95 => 27,  88 => 25,  82 => 24,  76 => 21,  70 => 20,  67 => 19,  59 => 14,  54 => 11,  51 => 10,  48 => 7,  45 => 6,  42 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "index/__part/partidoDirectoSueltos.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/index/__part/partidoDirectoSueltos.html.twig");
    }
}
