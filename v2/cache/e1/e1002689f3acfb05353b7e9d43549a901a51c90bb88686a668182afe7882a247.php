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

/* index/__part/filaPartido.html.twig */
class __TwigTemplate_910df4bb1d882c6f84b566b9a3d9b195f42e9fe60404c4f7b506fa1df4420334 extends Template
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
        echo "<a id=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 1), "html", null, true);
        echo "\"></a>

";
        // line 3
        if ( !(isset($context["pagina"]) || array_key_exists("pagina", $context))) {
            // line 4
            echo "    ";
            $context["pagina"] = "";
        }
        // line 6
        echo "
";
        // line 7
        if ( !(isset($context["ev"]) || array_key_exists("ev", $context))) {
            // line 8
            echo "    ";
            $context["ev"] = "";
        }
        // line 11
        echo "<div class=\"col-xs-12 cajaGlobalPartidos";
        if (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "enJuego", [], "any", false, false, false, 11)) {
            echo " partidosEnJuego";
        }
        echo "\">

    <div class=\"cajaPartido\" itemscope itemtype=\"http://schema.org/SportsEvent\" style=\"padding:5px !important\">

        <meta itemprop=\"name\" content=\"";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "localCorto", [], "any", false, false, false, 15), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitanteCorto", [], "any", false, false, false, 15), "html", null, true);
        echo "\">
        <meta itemprop=\"description\" content=\"Partido entre ";
        // line 16
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "local", [], "any", false, false, false, 16), "html", null, true);
        echo " y <?= ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitante", [], "any", false, false, false, 16), "html", null, true);
        echo "\">
        <span itemprop=\"location\" itemscope itemtype=\"http://schema.org/Place\">
            <meta itemprop=\"name\" content=\"";
        // line 18
        if (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estadio_nombre", [], "any", false, false, false, 18)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estadio_nombre", [], "any", false, false, false, 18), "html", null, true);
        } else {
            echo "Campo de fútbol";
        }
        echo "\">
            <meta itemprop=\"address\" content=\"";
        // line 19
        if (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estadio_localidad", [], "any", false, false, false, 19)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estadio_localidad", [], "any", false, false, false, 19), "html", null, true);
        } else {
            echo "Campo de fútbol";
        }
        echo "\">
        </span>

        ";
        // line 22
        if (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "fp", [], "any", true, true, false, 22)) {
            // line 23
            echo "            <meta itemprop=\"endDate\" content=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "ffp", [], "any", false, false, false, 23), "html", null, true);
            echo "\">
            <meta itemprop=\"startDate\" content=\"";
            // line 24
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "fp", [], "any", false, false, false, 24), "html", null, true);
            echo "\">
        ";
        }
        // line 26
        echo "
        <div class=\"col-12 contenedorPrimeraLinea\">
            <div class=\"row\">

                ";
        // line 33
        echo "
                <div class=\"nopadding col-3 h25\">
                    ";
        // line 35
        if (((0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 35), 2) || 0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 35), 6)) || 0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 35), 1))) {
            // line 36
            echo "                        <div class=\"horaPrevistaPartido\">
                            ";
            // line 37
            if (0 === twig_compare(twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "hora_prevista", [], "any", false, false, false, 37),  -2, null), "11")) {
                // line 38
                echo "                                ";
                $context["hora"] = ":";
                // line 39
                echo "                            ";
            } else {
                // line 40
                echo "                                ";
                $context["hora"] = twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "hora_prevista", [], "any", false, false, false, 40), 0, 5);
                // line 41
                echo "                            ";
            }
            // line 42
            echo "
                            ";
            // line 43
            echo twig_escape_filter($this->env, ($context["hora"] ?? null), "html", null, true);
            echo "
                        </div>
                    ";
        }
        // line 46
        echo "                </div>

                <div class=\"col-6 nopadding h25 text-center\">

                    ";
        // line 50
        if (((0 === twig_compare(($context["pagina"] ?? null), "index") || 0 === twig_compare(($context["pagina"] ?? null), "equipo")) || ((0 === twig_compare(($context["pagina"] ?? null), "seleccion") && 0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 50), 2)) && 0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 50), 6)))) {
            // line 51
            echo "
                        ";
            // line 52
            $context["enlaceJornada"] = ((("/temporada.php?id=" . twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "temporada_id", [], "any", false, false, false, 52)) . "&jornada=") . twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "jornada", [], "any", false, false, false, 52));
            // line 53
            echo "
                        ";
            // line 54
            if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "grupo_id", [], "any", false, false, false, 54), 0)) {
                // line 55
                echo "                            ";
                $context["enlaceJornada"] = ((($context["enlaceJornada"] ?? null) . "&grupo_id=") . twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "grupo_id", [], "any", false, false, false, 55));
                // line 56
                echo "                        ";
            }
            // line 57
            echo "
                        <a class=\"nombreJornada\" href='";
            // line 58
            echo twig_escape_filter($this->env, ($context["enlaceJornada"] ?? null), "html", null, true);
            echo "'>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "jornadaTxt", [], "any", false, false, false, 58), "html", null, true);
            echo "</a>

                    ";
        }
        // line 61
        echo "
                    ";
        // line 62
        if ((0 === twig_compare(($context["pagina"] ?? null), "televisados") && 0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 62), 1))) {
            // line 63
            echo "
                        ";
            // line 64
            $context["diferencia"] = twig_get_attribute($this->env, $this->source, twig_date_converter($this->env, "2020-09-10 00:00:00"), "diff", [0 => twig_date_converter($this->env, twig_date_format_filter($this->env, "now", "Y-m-d H:i:s", "Europe/Madrid"))], "method", false, false, false, 64);
            // line 65
            echo "
                        ";
            // line 66
            $context["dias"] = twig_get_attribute($this->env, $this->source, ($context["diferencia"] ?? null), "d", [], "any", false, false, false, 66);
            // line 67
            echo "                        ";
            $context["horas"] = twig_get_attribute($this->env, $this->source, ($context["diferencia"] ?? null), "h", [], "any", false, false, false, 67);
            // line 68
            echo "                        ";
            $context["minutos"] = twig_get_attribute($this->env, $this->source, ($context["diferencia"] ?? null), "i", [], "any", false, false, false, 68);
            // line 69
            echo "                        ";
            $context["segundos"] = twig_get_attribute($this->env, $this->source, ($context["diferencia"] ?? null), "s", [], "any", false, false, false, 69);
            // line 70
            echo "                        ";
            $context["invertido"] = twig_get_attribute($this->env, $this->source, ($context["diferencia"] ?? null), "invert", [], "any", false, false, false, 70);
            // line 71
            echo "
                        ";
            // line 72
            $context["txth"] = (($context["horas"] ?? null) . " horas");
            // line 73
            echo "                        ";
            $context["txtm"] = (($context["minutos"] ?? null) . " minutos");
            // line 74
            echo "
                        ";
            // line 75
            if (0 === twig_compare(($context["invertido"] ?? null), 0)) {
                // line 76
                echo "                            <strong>En estos momentos...</strong>
                        ";
            } else {
                // line 78
                echo "                            ";
                if (0 === twig_compare(($context["dias"] ?? null), 0)) {
                    // line 79
                    echo "
                                ";
                    // line 80
                    if (0 === twig_compare(($context["horas"] ?? null), 1)) {
                        // line 81
                        echo "                                    ";
                        $context["txth"] = (($context["horas"] ?? null) . " hora");
                        // line 82
                        echo "                                ";
                    }
                    // line 83
                    echo "
                                ";
                    // line 84
                    if (0 === twig_compare(($context["horas"] ?? null), 0)) {
                        // line 85
                        echo "                                    ";
                        $context["txth"] = "";
                        // line 86
                        echo "                                ";
                    }
                    // line 87
                    echo "
                                ";
                    // line 88
                    if ((1 === twig_compare(($context["horas"] ?? null), 0) && 1 === twig_compare(($context["minutos"] ?? null), 0))) {
                        // line 89
                        echo "                                    ";
                        $context["txth"] = (($context["txth"] ?? null) . " y ");
                        // line 90
                        echo "                                ";
                    }
                    // line 91
                    echo "
                                ";
                    // line 92
                    if (0 === twig_compare(($context["minutos"] ?? null), 1)) {
                        // line 93
                        echo "                                    ";
                        $context["txtm"] = (($context["minutos"] ?? null) . " minuto");
                        // line 94
                        echo "                                ";
                    }
                    // line 95
                    echo "
                                ";
                    // line 96
                    if (0 === twig_compare(($context["minutos"] ?? null), 0)) {
                        // line 97
                        echo "                                    ";
                        $context["txtm"] = "";
                        // line 98
                        echo "                                ";
                    }
                    // line 99
                    echo "
                                Televisado en ";
                    // line 100
                    echo twig_escape_filter($this->env, ($context["txth"] ?? null), "html", null, true);
                    echo twig_escape_filter($this->env, ($context["txtm"] ?? null), "html", null, true);
                    echo "

                            ";
                }
                // line 103
                echo "
                        ";
            }
            // line 105
            echo "
                    ";
        }
        // line 107
        echo "

                    ";
        // line 109
        if (0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "clasificado", [], "any", false, false, false, 109), "")) {
            // line 110
            echo "                        ";
            $context["clasificado"] = twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "clasificado", [], "any", false, false, false, 110);
            // line 111
            echo "                    ";
        } else {
            // line 112
            echo "                        ";
            $context["clasificado"] = 0;
            // line 113
            echo "                    ";
        }
        // line 114
        echo "
                    ";
        // line 115
        if ((1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 115), 1) && 0 !== twig_compare(($context["pagina"] ?? null), "televisados"))) {
            // line 116
            echo "
                        ";
            // line 117
            $context["colorTexto"] = "white";
            // line 118
            echo "
                        ";
            // line 119
            if (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "comentario", [], "any", false, false, false, 119)) {
                // line 120
                echo "                            ";
                $context["t"] = twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "comentario", [], "any", false, false, false, 120), "-");
                // line 121
                echo "
                            ";
                // line 122
                if ((twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 3, [], "any", true, true, false, 122) &&  !(null === twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 3, [], "any", false, false, false, 122)))) {
                    // line 123
                    echo "                                ";
                    $context["ev"] = twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 3, [], "any", false, false, false, 123);
                    // line 124
                    echo "                            ";
                }
                // line 125
                echo "
                            ";
                // line 126
                if (((isset($context["t"]) || array_key_exists("t", $context)) &&  !(null === ($context["t"] ?? null)))) {
                    // line 127
                    echo "
                                ";
                    // line 128
                    $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#f07474"]);
                    // line 129
                    echo "
                                ";
                    // line 130
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 130), 1)) {
                        // line 131
                        echo "                                    ";
                        $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#f07474"]);
                        // line 132
                        echo "                                ";
                    }
                    // line 133
                    echo "
                                ";
                    // line 134
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 134), 2)) {
                        // line 135
                        echo "                                    ";
                        $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#7cc002"]);
                        // line 136
                        echo "                                ";
                    }
                    // line 137
                    echo "
                                ";
                    // line 138
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 138), 3)) {
                        // line 139
                        echo "                                    ";
                        $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#610B0B"]);
                        // line 140
                        echo "                                ";
                    }
                    // line 141
                    echo "
                                ";
                    // line 142
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 142), 4)) {
                        // line 143
                        echo "                                    ";
                        $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#0B3B0B"]);
                        // line 144
                        echo "                                ";
                    }
                    // line 145
                    echo "
                                ";
                    // line 146
                    $context["t"] = twig_array_merge(($context["t"] ?? null), ["tiempo" => ("Minuto " . twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 1, [], "any", false, false, false, 146))]);
                    // line 147
                    echo "

                                ";
                    // line 149
                    if ((twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 2, [], "any", true, true, false, 149) && 1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 2, [], "any", false, false, false, 149), 0))) {
                        // line 150
                        echo "                                    ";
                        $context["t"] = twig_array_merge(($context["t"] ?? null), ["tiempo" => ((twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), "tiempo", [], "any", false, false, false, 150) . "+") . twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 2, [], "any", false, false, false, 150))]);
                        // line 151
                        echo "                                ";
                    }
                    // line 152
                    echo "
                            ";
                }
                // line 154
                echo "

                            ";
                // line 156
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 156), 6)) {
                    // line 157
                    echo "                                ";
                    $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#ffe400", "tiempo" => "Descanso"]);
                    // line 163
                    echo "
                                ";
                    // line 164
                    $context["colorTexto"] = "maroon";
                    // line 165
                    echo "
                            ";
                } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,                 // line 166
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 166), 7)) {
                    // line 167
                    echo "
                                ";
                    // line 168
                    $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#2E2E2E", "tiempo" => "Penaltis"]);
                    // line 174
                    echo "
                            ";
                } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,                 // line 175
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 175), 8)) {
                    // line 176
                    echo "
                                ";
                    // line 177
                    $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "blue", "tiempo" => "Prórroga"]);
                    // line 183
                    echo "
                            ";
                }
                // line 185
                echo "
                        ";
            }
            // line 187
            echo "

                    ";
        }
        // line 190
        echo "
                    ";
        // line 191
        if ((isset($context["t"]) || array_key_exists("t", $context))) {
            // line 192
            echo "                        <div class=\"infopwhitebox\">

                            ";
            // line 194
            if ((twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "categoria_torneo_id", [], "any", true, true, false, 194) && 0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "categoria_torneo_id", [], "any", false, false, false, 194), 17))) {
                // line 195
                echo "
                                ";
                // line 196
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 196), 2)) {
                    // line 197
                    echo "                                    ";
                    $context["t"] = twig_array_merge(($context["t"] ?? null), ["tiempo" => "2ª parte"]);
                    // line 202
                    echo "                                ";
                }
                // line 203
                echo "
                                ";
                // line 204
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 204), 1)) {
                    // line 205
                    echo "                                    ";
                    $context["t"] = twig_array_merge(($context["t"] ?? null), ["tiempo" => "1ª parte"]);
                    // line 210
                    echo "                                ";
                }
                // line 211
                echo "
                            ";
            }
            // line 213
            echo "
                            ";
            // line 221
            echo "
                            ";
            // line 222
            if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 222), 6)) {
                // line 223
                echo "
                                ";
                // line 225
                echo "                                <p class=\"timeresult\" style=\" color: orange !important\">Descanso</p>

                            ";
            } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 227
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 227), 7)) {
                // line 228
                echo "
                                ";
                // line 230
                echo "
                                <p class=\"timeresult\" style=\"color: #E81346;\">Penaltis</p>


                            ";
            } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 234
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 234), 8)) {
                // line 235
                echo "
                                ";
                // line 237
                echo "                                <p class=\"timeresult\" style=\"color: dodgerblue;\">Prórroga</p>

                            ";
            } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 239
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 239), 9)) {
                // line 240
                echo "
                                ";
                // line 242
                echo "                                <p class=\"timeresult\" style=\"color: #9EFF23;\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), "tiempo", [], "any", false, false, false, 242), "html", null, true);
                echo "</p>

                            ";
            } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 244
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 244), 10)) {
                // line 245
                echo "
                                ";
                // line 247
                echo "                                <p class=\"timeresult\" style=\"color: #9EFF23;\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), "tiempo", [], "any", false, false, false, 247), "html", null, true);
                echo "</p>

                            ";
            } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 249
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 249), 11)) {
                // line 250
                echo "
                                ";
                // line 252
                echo "                                <p class=\"timeresult\" style=\"color: orange;\">Desc.Prórr.</p>

                            ";
            } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 254
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 254), 2)) {
                // line 255
                echo "
                                ";
                // line 257
                echo "                                <p class=\"timeresult\" style=\"color: #9EFF23; !important\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), "tiempo", [], "any", false, false, false, 257), "html", null, true);
                echo "</p>

                            ";
            }
            // line 260
            echo "                        </div>
                    ";
        }
        // line 262
        echo "                </div>

                <div class=\"contenedorIconosPartido col-3 nopadding h25\">

                    ";
        // line 266
        echo twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "txtTV", [], "any", false, false, false, 266);
        echo "

                    ";
        // line 268
        if (((1 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "tvs", [], "any", false, false, false, 268), 0, [], "any", false, false, false, 268), 0) && 0 !== twig_compare(1, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 268))) && 0 !== twig_compare(($context["pagina"] ?? null), "televisados"))) {
            // line 269
            echo "                        <a href=\"/partidos-televisados#tv-";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 269), "html", null, true);
            echo "\" title=\"partido televisado\">
                            ";
            // line 270
            if (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "enJuego", [], "any", false, false, false, 270)) {
                // line 271
                echo "                                <img src=\"/static/img/icono-partidos-televisados-blanco.svg\" alt=\"partido televisado\" width=\"19\">
                            ";
            } else {
                // line 273
                echo "                                <img src=\"/static/img/icono-partidos-televisados.svg\" alt=\"partido televisado\" width=\"19\">
                            ";
            }
            // line 275
            echo "                        </a>
                    ";
        }
        // line 277
        echo "
                    ";
        // line 278
        echo ($context["icono"] ?? null);
        echo "

                    <a class=\"simboloMasPartido\" href=\"javascript:mostrarColor(";
        // line 280
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 280), "html", null, true);
        echo ");\">
                        ";
        // line 281
        if (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "enJuego", [], "any", false, false, false, 281)) {
            // line 282
            echo "                            <img src=\"/static/img/simbolo-mas-blanco.svg\" title=\"Partido entre ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "local", [], "any", false, false, false, 282), "html", null, true);
            echo " y ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitante", [], "any", false, false, false, 282), "html", null, true);
            echo "\" alt=\"Partido entre ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "local", [], "any", false, false, false, 282), "html", null, true);
            echo " y ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitante", [], "any", false, false, false, 282), "html", null, true);
            echo "\">
                        ";
        } else {
            // line 284
            echo "                            <img src=\"/static/img/simbolo-mas.svg\" title=\"Partido entre ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "local", [], "any", false, false, false, 284), "html", null, true);
            echo " y ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitante", [], "any", false, false, false, 284), "html", null, true);
            echo "\" alt=\"Partido entre ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "local", [], "any", false, false, false, 284), "html", null, true);
            echo " y ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitante", [], "any", false, false, false, 284), "html", null, true);
            echo "\">
                        ";
        }
        // line 286
        echo "                    </a>

                </div>

            </div>

        </div>

        <div style=\"clear: both;\"></div>

        ";
        // line 299
        echo "
        <div class=\"col-12\">
            <div class=\"row\">

            <div class=\"col-5 equipoPartido equipoPartidoLocal\">
                ";
        // line 307
        echo "                <p onclick=\"mostrarColor(";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 307), "html", null, true);
        echo ")\">
                    <span itemprop=\"name\">";
        // line 308
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "localCorto", [], "any", false, false, false, 308), "html", null, true);
        echo "</span>
                </p>
            </div>

            <div class=\"col-2 resultadoPartido\">
                ";
        // line 313
        if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 313), 1)) {
            // line 314
            echo "                    <span>
                        ";
            // line 315
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "goles_local", [], "any", false, false, false, 315), "html", null, true);
            echo "
                    </span>

                    -

                    <span>
                        ";
            // line 321
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "goles_visitante", [], "any", false, false, false, 321), "html", null, true);
            echo "
                    </span>
                ";
        }
        // line 324
        echo "
                ";
        // line 325
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 325), 2) || 1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 325), 5))) {
            // line 326
            echo "

                <span class=\"
                    ";
            // line 329
            if (0 === twig_compare(($context["ev"] ?? null), 5)) {
                // line 330
                echo "                        parpadea
                    ";
            }
            // line 332
            echo "                \">
                    ";
            // line 333
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "goles_local", [], "any", false, false, false, 333), "html", null, true);
            echo "
                </span>

                -

                <span class=\"
                    ";
            // line 339
            if (0 === twig_compare(($context["ev"] ?? null), 6)) {
                // line 340
                echo "                        parpadea
                    ";
            }
            // line 342
            echo "                \">
                    ";
            // line 343
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "goles_visitante", [], "any", false, false, false, 343), "html", null, true);
            echo "
                </span>

                ";
        }
        // line 347
        echo "
                ";
        // line 348
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 348), 0) || (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 348), 2) && -1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 348), 6)))) {
            // line 349
            echo "                <div>
                    ";
            // line 350
            if ((0 === twig_compare(($context["pagina"] ?? null), "index") && (isset($context["temporada_id"]) || array_key_exists("temporada_id", $context)))) {
                // line 351
                echo "                        <span class=\"text-center boldfont\" style=\"font-size:12px\">
                            ";
                // line 352
                echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "fecha", [], "any", false, false, false, 352),  -2, null), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "fecha", [], "any", false, false, false, 352), 5, 2), "html", null, true);
                echo "
                        </span>
                    <br/>
                    ";
            }
            // line 356
            echo "
                    ";
            // line 357
            if (((isset($context["tipoTorneo"]) || array_key_exists("tipoTorneo", $context)) && 0 === twig_compare(($context["tipoTorneo"] ?? null), 4))) {
                // line 358
                echo "                    <span class=\"text-center boldfont\" style=\"font-size:12px\">
                        ";
                // line 359
                echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "fecha", [], "any", false, false, false, 359),  -2, null), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "fecha", [], "any", false, false, false, 359), 5, 2), "html", null, true);
                echo "
                    </span>
                    ";
            }
            // line 362
            echo "
                    <div class=\"horaPartido\">
                        ";
            // line 364
            if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 364), 3)) {
                // line 365
                echo "                            <span class=\"suspendido\">Susp.</span>
                        ";
            } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 366
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 366), 4)) {
                // line 367
                echo "                            <span class=\"aplazado\">Aplaz.</span>
                        ";
            } else {
                // line 369
                echo "
                            ";
                // line 370
                if (0 === twig_compare(twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "hora_prevista", [], "any", false, false, false, 370),  -2, null), 11)) {
                    // line 371
                    echo "                                ";
                    $context["hora"] = ":";
                    // line 372
                    echo "                            ";
                } else {
                    // line 373
                    echo "                                ";
                    $context["hora"] = twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "hora_prevista", [], "any", false, false, false, 373), 0, 5);
                    // line 374
                    echo "                            ";
                }
                // line 375
                echo "
                            ";
                // line 376
                echo twig_escape_filter($this->env, ($context["hora"] ?? null), "html", null, true);
                echo "

                        ";
            }
            // line 379
            echo "                    </div>

                </div>
                ";
        }
        // line 383
        echo "            </div>

            <div class=\"col-5 equipoPartido equipoPartidoVisitante\">
                ";
        // line 389
        echo "                <p onclick=\"mostrarColor(";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 389), "html", null, true);
        echo ")\">
                    <span itemprop=\"name\" class=\"txt11\">";
        // line 390
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitanteCorto", [], "any", false, false, false, 390), "html", null, true);
        echo "</span>
                </p>
            </div>

        </div>
        </div>


        ";
        // line 398
        if ((0 === twig_compare(($context["desfasado"] ?? null), 1) && 0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "fecha", [], "any", false, false, false, 398), "1970-01-01"))) {
            // line 399
            echo "            <div id=\"resultado-";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 399), "html", null, true);
            echo "\">
                <table style=\"width: 100%; background-color: orange\">
                    <form method=\"post\" onsubmit=\"submitEnviarResultado(event, \$(this).serialize(), ";
            // line 401
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 401), "html", null, true);
            echo ")\">

                        <input type=\"hidden\" name=\"usuario\" value=\"<?php echo \$_COOKIE['futbolme_2018']??'000000';?>\">
                        <input type=\"hidden\" name=\"partido_id\" value=\"";
            // line 404
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 404), "html", null, true);
            echo "\">
                        <tr><td align=\"right\"><b>¿Sabes el resultado?</b></td>
                            <td align=\"right\"><input type=\"text\" name=\"goles_local\" size=\"2\" maxlength=\"2\" style=\"width:50px; text-align: center\" required></td>
                            <td style=\"width:50px; text-align: center\">-</td>
                            <td><input type=\"text\" name=\"goles_visitante\" size=\"2\" maxlength=\"2\" style=\"width:50px; text-align: center\" required></td><td><input type=\"submit\" name=\"enviar\" value=\"Enviar resultado\"></td>
                        </tr>

                    </form>
                </table>
            </div>
        ";
        }
        // line 415
        echo "
        ";
        // line 420
        echo "
        ";
        // line 421
        if ((twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "ida", [], "any", true, true, false, 421) && 0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "jornada", [], "any", false, false, false, 421), 95))) {
            // line 422
            echo "            <div class=\"col-xs-12\">
                <p class=\"textoIda\">
                    ";
            // line 424
            $context["ida"] = twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "ida", [], "any", false, false, false, 424), ",");
            // line 425
            echo "
                    ";
            // line 426
            $context["ida_resulcasa"] = twig_get_attribute($this->env, $this->source, ($context["ida"] ?? null), 0, [], "any", false, false, false, 426);
            // line 427
            echo "                    ";
            $context["ida_resulfuera"] = twig_get_attribute($this->env, $this->source, ($context["ida"] ?? null), 1, [], "any", false, false, false, 427);
            // line 428
            echo "                    ";
            $context["ida_jornada"] = twig_get_attribute($this->env, $this->source, ($context["ida"] ?? null), 2, [], "any", false, false, false, 428);
            // line 429
            echo "                    ";
            $context["ida_fecha"] = twig_get_attribute($this->env, $this->source, ($context["ida"] ?? null), 3, [], "any", false, false, false, 429);
            // line 430
            echo "
                    ";
            // line 431
            if ( !twig_get_attribute($this->env, $this->source, ($context["ida"] ?? null), 5, [], "any", true, true, false, 431)) {
                // line 432
                echo "                        ";
                $context["ida"] = twig_array_merge(($context["ida"] ?? null), [5 => 1]);
                // line 433
                echo "                    ";
            }
            // line 434
            echo "
                    ";
            // line 435
            $context["ida_tipo"] = twig_get_attribute($this->env, $this->source, ($context["ida"] ?? null), 5, [], "any", false, false, false, 435);
            // line 436
            echo "
                    ";
            // line 437
            if (0 === twig_compare(($context["ida_tipo"] ?? null), 2)) {
                // line 438
                echo "
                        ";
                // line 439
                if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "fecha", [], "any", false, false, false, 439), ($context["ida_fecha"] ?? null))) {
                    // line 440
                    echo "                            ";
                    $context["txtFecha"] = "IDA";
                    // line 441
                    echo "                        ";
                } else {
                    // line 442
                    echo "                            ";
                    $context["txtFecha"] = "VUELTA";
                    // line 443
                    echo "                        ";
                }
                // line 444
                echo "
                        ";
                // line 445
                echo twig_escape_filter($this->env, ($context["txtFecha"] ?? null), "html", null, true);
                echo "

                        ";
                // line 447
                echo twig_escape_filter($this->env, ($context["ida_resulfuera"] ?? null), "html", null, true);
                echo " - ";
                echo twig_escape_filter($this->env, ($context["ida_resulcasa"] ?? null), "html", null, true);
                echo "

                        ";
                // line 449
                if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 449), 0)) {
                    // line 450
                    echo "                            ";
                    $context["global_casa"] = (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "goles_local", [], "any", false, false, false, 450) + ($context["ida_resulfuera"] ?? null));
                    // line 451
                    echo "                            ";
                    $context["global_fuera"] = (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "goles_visitante", [], "any", false, false, false, 451) + ($context["ida_resulcasa"] ?? null));
                    // line 452
                    echo "                            | GLOBAL ";
                    echo twig_escape_filter($this->env, ($context["global_casa"] ?? null), "html", null, true);
                    echo " - ";
                    echo twig_escape_filter($this->env, ($context["global_fuera"] ?? null), "html", null, true);
                    echo "
                        ";
                }
                // line 454
                echo "
                    ";
            }
            // line 456
            echo "                </p>
            </div>
            <div class=\"clear\"></div>
        ";
        }
        // line 460
        echo "
        ";
        // line 461
        if (((twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "twLocal", [], "any", true, true, false, 461) && 1 === twig_compare(twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "twLocal", [], "any", false, false, false, 461)), 3)) || (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "twVisitante", [], "any", true, true, false, 461) && 1 === twig_compare(twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "twVisitante", [], "any", false, false, false, 461)), 3)))) {
            // line 462
            echo "            <div id=\"log-tw-";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 462), "html", null, true);
            echo "\" class=\"hide\"></div>
        ";
        }
        // line 464
        echo "
        ";
        // line 473
        echo "
        ";
        // line 474
        $context["cadenaGoles"] = 0;
        // line 475
        echo "
        ";
        // line 477
        echo "
        ";
        // line 478
        if ((twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "observaciones", [], "any", true, true, false, 478) && 1 === twig_compare(twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "observaciones", [], "any", false, false, false, 478)), 5))) {
            // line 479
            echo "
            <div class=\"col-xs-12 nopadding\">

                ";
            // line 482
            $context["cadena"] = call_user_func_array($this->env->getFunction('desglosarTexto')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "observaciones", [], "any", false, false, false, 482)]);
            // line 483
            echo "
                ";
            // line 484
            if (twig_get_attribute($this->env, $this->source, ($context["cadena"] ?? null), 1, [], "any", true, true, false, 484)) {
                // line 485
                echo "                    ";
                $context["cadenaGoles"] = twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["cadena"] ?? null), 1, [], "any", false, false, false, 485));
                // line 486
                echo "                ";
            }
            // line 487
            echo "
                ";
            // line 488
            if (twig_get_attribute($this->env, $this->source, ($context["cadena"] ?? null), 2, [], "any", true, true, false, 488)) {
                // line 489
                echo "                    ";
                $context["cadenaGoles"] = (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["cadena"] ?? null), 2, [], "any", false, false, false, 489)) + ($context["cadenaGoles"] ?? null));
                // line 490
                echo "                ";
            }
            // line 491
            echo "
                ";
            // line 492
            $this->loadTemplate("index/__part/partidosObservaciones.html.twig", "index/__part/filaPartido.html.twig", 492)->display($context);
            // line 493
            echo "
            </div>
            <div class=\"clear\" style=\"height: 5px !important;\"></div>

        ";
        }
        // line 498
        echo "
        <div id=\"posicion";
        // line 499
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 499), "html", null, true);
        echo "\" style=\"display: none;\">
            <div class=\"enlacesDeInteres\" style=\"padding: 0px 10px\">
                <span class=\"float-right\" onclick=\"mostrarColor(";
        // line 501
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 501), "html", null, true);
        echo ")\" style=\"cursor:pointer;\">Cerrar enlaces</span>
                <br />
                <h4>ENLACES DE INTERES</h4>

                <div class=\"row\">

                    <div class=\"enlacesDeInteresColumnaCampeonato col-4\">
                        ";
        // line 508
        if (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "temporada_id", [], "any", true, true, false, 508)) {
            // line 509
            echo "                            <h5><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "enlace_torneo", [], "any", false, false, false, 509), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "nombreTorneo", [], "any", false, false, false, 509), "html", null, true);
            echo "</a></h5>

                            ";
            // line 511
            $context["partido"] = twig_array_merge(($context["partido"] ?? null), ["temporada_id" => ($context["temporada_id"] ?? null)]);
            // line 512
            echo "
                        ";
        }
        // line 514
        echo "
                        <a href=\"";
        // line 515
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "pgPartido", [], "any", false, false, false, 515), "html", null, true);
        echo "\">Ir al partido</a>";
        // line 517
        echo "
                    </div>

                    <div class=\"enlacesDeInteresColumnaEquipo col-4\">

                        ";
        // line 522
        if (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "pgLocal", [], "any", true, true, false, 522)) {
            // line 523
            echo "                            ";
            $context["pgLocal"] = twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "pgLocal", [], "any", false, false, false, 523);
            // line 524
            echo "                        ";
        } else {
            // line 525
            echo "                            ";
            $context["pgLocal"] = $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_datos", ["idEquipo" => twig_get_attribute($this->env, $this->source,             // line 526
($context["partido"] ?? null), "equipoLocal_id", [], "any", false, false, false, 526), "slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,             // line 527
($context["partido"] ?? null), "local", [], "any", false, false, false, 527)])]);
            // line 529
            echo "                        ";
        }
        // line 530
        echo "
                        <h6>";
        // line 531
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "localCorto", [], "any", false, false, false, 531), "html", null, true);
        echo "</h6>
                        <a href=\"";
        // line 532
        echo twig_escape_filter($this->env, ($context["pgLocal"] ?? null), "html", null, true);
        echo "\">Calendario</a><br />
                        <a href=\"";
        // line 533
        echo twig_escape_filter($this->env, ($context["pgLocal"] ?? null), "html", null, true);
        echo "&modelo=Clasificacion\">Clasificación</a><br />

                        ";
        // line 535
        if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "idPais", [], "any", false, false, false, 535), 60)) {
            // line 536
            echo "                            ";
            if (((1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "temporada_id", [], "any", false, false, false, 536), 0) && -1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "temporada_id", [], "any", false, false, false, 536), 25)) || 0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "temporada_id", [], "any", false, false, false, 536), 214))) {
                // line 537
                echo "
                                <a style=\"font-weight: bold;\" href=\"";
                // line 538
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "pgLocal", [], "any", false, false, false, 538), "html", null, true);
                echo "&modelo=Plantilla\">Plantilla</a><br />

                            ";
            }
            // line 541
            echo "
                            <a href=\"";
            // line 542
            echo twig_escape_filter($this->env, ($context["pgLocal"] ?? null), "html", null, true);
            echo "&modelo=Datos\">Datos del club</a><br />
                            <a href=\"";
            // line 543
            echo twig_escape_filter($this->env, ($context["pgLocal"] ?? null), "html", null, true);
            echo "&modelo=Equipos\">Equipos del club</a><br />


                            ";
            // line 556
            echo "
                        ";
        }
        // line 558
        echo "
                        ";
        // line 562
        echo "
                    </div>


                    <div class=\"enlacesDeInteresColumnaEquipo col-4\">

                        ";
        // line 568
        if (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "pgVisitante", [], "any", true, true, false, 568)) {
            // line 569
            echo "                            ";
            $context["pgVisitante"] = twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "pgVisitante", [], "any", false, false, false, 569);
            // line 570
            echo "                        ";
        } else {
            // line 571
            echo "                            ";
            $context["pgVisitante"] = $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_datos", ["idEquipo" => twig_get_attribute($this->env, $this->source,             // line 572
($context["partido"] ?? null), "equipoVisitante_id", [], "any", false, false, false, 572), "slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,             // line 573
($context["partido"] ?? null), "visitante", [], "any", false, false, false, 573)])]);
            // line 575
            echo "                        ";
        }
        // line 576
        echo "
                        <h6>";
        // line 577
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitanteCorto", [], "any", false, false, false, 577), "html", null, true);
        echo "</h6>
                        <a href=\"";
        // line 578
        echo twig_escape_filter($this->env, ($context["pgVisitante"] ?? null), "html", null, true);
        echo "\">Calendario</a><br />
                        <a href=\"";
        // line 579
        echo twig_escape_filter($this->env, ($context["pgVisitante"] ?? null), "html", null, true);
        echo "&modelo=Clasificacion\">Clasificación</a><br />

                        ";
        // line 581
        if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "idPais", [], "any", false, false, false, 581), 60)) {
            // line 582
            echo "
                            ";
            // line 583
            if (((1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "temporada_id", [], "any", false, false, false, 583), 0) && -1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "temporada_id", [], "any", false, false, false, 583), 25)) || 0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "temporada_id", [], "any", false, false, false, 583), 214))) {
                // line 584
                echo "
                                <a style=\"font-weight: bold;\" href=\"";
                // line 585
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "pgVisitante", [], "any", false, false, false, 585), "html", null, true);
                echo "&modelo=Plantilla\">Plantilla</a><br />

                            ";
            }
            // line 588
            echo "
                            <a href=\"";
            // line 589
            echo twig_escape_filter($this->env, ($context["pgVisitante"] ?? null), "html", null, true);
            echo "&modelo=Datos\">Datos del club</a><br />
                            <a href=\"";
            // line 590
            echo twig_escape_filter($this->env, ($context["pgVisitante"] ?? null), "html", null, true);
            echo "&modelo=Equipos\">Equipos del club</a><br />

                            ";
            // line 601
            echo "
                            ";
            // line 605
            echo "
                        ";
        }
        // line 607
        echo "
                    </div>

                </div>


                <div class=\"clear\"></div>
            </div>
        </div>

        <div id=\"alineaciones-";
        // line 617
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 617), "html", null, true);
        echo "\">
        </div>

    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "index/__part/filaPartido.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1267 => 617,  1255 => 607,  1251 => 605,  1248 => 601,  1243 => 590,  1239 => 589,  1236 => 588,  1230 => 585,  1227 => 584,  1225 => 583,  1222 => 582,  1220 => 581,  1215 => 579,  1211 => 578,  1207 => 577,  1204 => 576,  1201 => 575,  1199 => 573,  1198 => 572,  1196 => 571,  1193 => 570,  1190 => 569,  1188 => 568,  1180 => 562,  1177 => 558,  1173 => 556,  1167 => 543,  1163 => 542,  1160 => 541,  1154 => 538,  1151 => 537,  1148 => 536,  1146 => 535,  1141 => 533,  1137 => 532,  1133 => 531,  1130 => 530,  1127 => 529,  1125 => 527,  1124 => 526,  1122 => 525,  1119 => 524,  1116 => 523,  1114 => 522,  1107 => 517,  1104 => 515,  1101 => 514,  1097 => 512,  1095 => 511,  1087 => 509,  1085 => 508,  1075 => 501,  1070 => 499,  1067 => 498,  1060 => 493,  1058 => 492,  1055 => 491,  1052 => 490,  1049 => 489,  1047 => 488,  1044 => 487,  1041 => 486,  1038 => 485,  1036 => 484,  1033 => 483,  1031 => 482,  1026 => 479,  1024 => 478,  1021 => 477,  1018 => 475,  1016 => 474,  1013 => 473,  1010 => 464,  1004 => 462,  1002 => 461,  999 => 460,  993 => 456,  989 => 454,  981 => 452,  978 => 451,  975 => 450,  973 => 449,  966 => 447,  961 => 445,  958 => 444,  955 => 443,  952 => 442,  949 => 441,  946 => 440,  944 => 439,  941 => 438,  939 => 437,  936 => 436,  934 => 435,  931 => 434,  928 => 433,  925 => 432,  923 => 431,  920 => 430,  917 => 429,  914 => 428,  911 => 427,  909 => 426,  906 => 425,  904 => 424,  900 => 422,  898 => 421,  895 => 420,  892 => 415,  878 => 404,  872 => 401,  866 => 399,  864 => 398,  853 => 390,  848 => 389,  843 => 383,  837 => 379,  831 => 376,  828 => 375,  825 => 374,  822 => 373,  819 => 372,  816 => 371,  814 => 370,  811 => 369,  807 => 367,  805 => 366,  802 => 365,  800 => 364,  796 => 362,  788 => 359,  785 => 358,  783 => 357,  780 => 356,  771 => 352,  768 => 351,  766 => 350,  763 => 349,  761 => 348,  758 => 347,  751 => 343,  748 => 342,  744 => 340,  742 => 339,  733 => 333,  730 => 332,  726 => 330,  724 => 329,  719 => 326,  717 => 325,  714 => 324,  708 => 321,  699 => 315,  696 => 314,  694 => 313,  686 => 308,  681 => 307,  674 => 299,  662 => 286,  650 => 284,  638 => 282,  636 => 281,  632 => 280,  627 => 278,  624 => 277,  620 => 275,  616 => 273,  612 => 271,  610 => 270,  605 => 269,  603 => 268,  598 => 266,  592 => 262,  588 => 260,  581 => 257,  578 => 255,  576 => 254,  572 => 252,  569 => 250,  567 => 249,  561 => 247,  558 => 245,  556 => 244,  550 => 242,  547 => 240,  545 => 239,  541 => 237,  538 => 235,  536 => 234,  530 => 230,  527 => 228,  525 => 227,  521 => 225,  518 => 223,  516 => 222,  513 => 221,  510 => 213,  506 => 211,  503 => 210,  500 => 205,  498 => 204,  495 => 203,  492 => 202,  489 => 197,  487 => 196,  484 => 195,  482 => 194,  478 => 192,  476 => 191,  473 => 190,  468 => 187,  464 => 185,  460 => 183,  458 => 177,  455 => 176,  453 => 175,  450 => 174,  448 => 168,  445 => 167,  443 => 166,  440 => 165,  438 => 164,  435 => 163,  432 => 157,  430 => 156,  426 => 154,  422 => 152,  419 => 151,  416 => 150,  414 => 149,  410 => 147,  408 => 146,  405 => 145,  402 => 144,  399 => 143,  397 => 142,  394 => 141,  391 => 140,  388 => 139,  386 => 138,  383 => 137,  380 => 136,  377 => 135,  375 => 134,  372 => 133,  369 => 132,  366 => 131,  364 => 130,  361 => 129,  359 => 128,  356 => 127,  354 => 126,  351 => 125,  348 => 124,  345 => 123,  343 => 122,  340 => 121,  337 => 120,  335 => 119,  332 => 118,  330 => 117,  327 => 116,  325 => 115,  322 => 114,  319 => 113,  316 => 112,  313 => 111,  310 => 110,  308 => 109,  304 => 107,  300 => 105,  296 => 103,  289 => 100,  286 => 99,  283 => 98,  280 => 97,  278 => 96,  275 => 95,  272 => 94,  269 => 93,  267 => 92,  264 => 91,  261 => 90,  258 => 89,  256 => 88,  253 => 87,  250 => 86,  247 => 85,  245 => 84,  242 => 83,  239 => 82,  236 => 81,  234 => 80,  231 => 79,  228 => 78,  224 => 76,  222 => 75,  219 => 74,  216 => 73,  214 => 72,  211 => 71,  208 => 70,  205 => 69,  202 => 68,  199 => 67,  197 => 66,  194 => 65,  192 => 64,  189 => 63,  187 => 62,  184 => 61,  176 => 58,  173 => 57,  170 => 56,  167 => 55,  165 => 54,  162 => 53,  160 => 52,  157 => 51,  155 => 50,  149 => 46,  143 => 43,  140 => 42,  137 => 41,  134 => 40,  131 => 39,  128 => 38,  126 => 37,  123 => 36,  121 => 35,  117 => 33,  111 => 26,  106 => 24,  101 => 23,  99 => 22,  89 => 19,  81 => 18,  74 => 16,  68 => 15,  58 => 11,  54 => 8,  52 => 7,  49 => 6,  45 => 4,  43 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "index/__part/filaPartido.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.eu/v2/templates/index/__part/filaPartido.html.twig");
    }
}
