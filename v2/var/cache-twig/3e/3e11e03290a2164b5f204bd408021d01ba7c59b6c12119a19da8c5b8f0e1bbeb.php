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
class __TwigTemplate_b38a3100e38b807f6a5c460ce75c955f0af0e9ea96c3b5a5ac00c7755fb9522f extends Template
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
        // line 11
        if ( !(isset($context["ev"]) || array_key_exists("ev", $context))) {
            // line 12
            echo "    ";
            $context["ev"] = "";
        }
        // line 15
        echo "<div class=\"col-12 cajaGlobalPartidos";
        if (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "enJuego", [], "any", false, false, false, 15)) {
            echo " partidosEnJuego";
        }
        echo "\">

    <div class=\"cajaPartido\" itemscope itemtype=\"http://schema.org/SportsEvent\" style=\"padding:5px !important\">

        <meta itemprop=\"name\" content=\"";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "localCorto", [], "any", false, false, false, 19), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitanteCorto", [], "any", false, false, false, 19), "html", null, true);
        echo "\">
        <meta itemprop=\"description\" content=\"Partido entre ";
        // line 20
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "local", [], "any", false, false, false, 20), "html", null, true);
        echo " y <?= ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitante", [], "any", false, false, false, 20), "html", null, true);
        echo "\">
        <span itemprop=\"location\" itemscope itemtype=\"http://schema.org/Place\">
            <meta itemprop=\"name\" content=\"";
        // line 22
        if (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estadio_nombre", [], "any", false, false, false, 22)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estadio_nombre", [], "any", false, false, false, 22), "html", null, true);
        } else {
            echo "Campo de fútbol";
        }
        echo "\">
            <meta itemprop=\"address\" content=\"";
        // line 23
        if (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estadio_localidad", [], "any", false, false, false, 23)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estadio_localidad", [], "any", false, false, false, 23), "html", null, true);
        } else {
            echo "Campo de fútbol";
        }
        echo "\">
        </span>

        ";
        // line 26
        if (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "fp", [], "any", true, true, false, 26)) {
            // line 27
            echo "            <meta itemprop=\"endDate\" content=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "ffp", [], "any", false, false, false, 27), "html", null, true);
            echo "\">
            <meta itemprop=\"startDate\" content=\"";
            // line 28
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "fp", [], "any", false, false, false, 28), "html", null, true);
            echo "\">
        ";
        }
        // line 30
        echo "
        <div class=\"col-12 contenedorPrimeraLinea\">
            <div class=\"row\">

                ";
        // line 37
        echo "
                <div class=\"nopadding col-3 h25\">
                    ";
        // line 39
        if (0 === twig_compare(($context["pagina"] ?? null), "equipo")) {
            // line 40
            echo "                        <div class=\"horaPrevistaPartido\">
                            ";
            // line 41
            $context["fechaTrozos"] = twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "fecha", [], "any", false, false, false, 41), "-");
            // line 42
            echo "                            ";
            echo twig_escape_filter($this->env, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["fechaTrozos"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4[2] ?? null) : null), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = ($context["fechaTrozos"] ?? null)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144[1] ?? null) : null), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, twig_slice($this->env, (($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = ($context["fechaTrozos"] ?? null)) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b[0] ?? null) : null),  -2), "html", null, true);
            echo "
                        </div>

                    ";
        } elseif (((0 === twig_compare(twig_get_attribute($this->env, $this->source,         // line 45
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 45), 2) || 0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 45), 6)) || 0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 45), 1))) {
            // line 46
            echo "                        <div class=\"horaPrevistaPartido\">
                            ";
            // line 47
            if (0 === twig_compare(twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "hora_prevista", [], "any", false, false, false, 47),  -2, null), "11")) {
                // line 48
                echo "                                ";
                $context["hora"] = ":";
                // line 49
                echo "                            ";
            } else {
                // line 50
                echo "                                ";
                $context["hora"] = twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "hora_prevista", [], "any", false, false, false, 50), 0, 5);
                // line 51
                echo "                            ";
            }
            // line 52
            echo "                            ";
            echo twig_escape_filter($this->env, ($context["hora"] ?? null), "html", null, true);
            echo "
                        </div>
                    ";
        }
        // line 55
        echo "                </div>

                <div class=\"col-6 nopadding h25 text-center\">

                    ";
        // line 59
        if (((0 === twig_compare(($context["pagina"] ?? null), "index") || 0 === twig_compare(($context["pagina"] ?? null), "equipo")) || ((0 === twig_compare(($context["pagina"] ?? null), "seleccion") && 0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 59), 2)) && 0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 59), 6)))) {
            // line 60
            echo "
                        ";
            // line 62
            echo "                        ";
            $context["enlaceJornada"] = $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("torneo_jornada", ["idTorneo" => twig_get_attribute($this->env, $this->source,             // line 63
($context["partido"] ?? null), "temporada_id", [], "any", false, false, false, 63), "slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,             // line 64
($context["partido"] ?? null), "nombreTorneo", [], "any", false, false, false, 64)]), "jornada" => twig_get_attribute($this->env, $this->source,             // line 65
($context["partido"] ?? null), "jornada", [], "any", false, false, false, 65)]);
            // line 67
            echo "
                        ";
            // line 68
            if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "grupo_id", [], "any", false, false, false, 68), 0)) {
                // line 69
                echo "                            ";
                // line 70
                echo "                            ";
                $context["enlaceJornada"] = $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("torneo_jornada_grupo_id", ["idTorneo" => twig_get_attribute($this->env, $this->source,                 // line 71
($context["partido"] ?? null), "temporada_id", [], "any", false, false, false, 71), "slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,                 // line 72
($context["partido"] ?? null), "nombreTorneo", [], "any", false, false, false, 72)]), "jornada" => twig_get_attribute($this->env, $this->source,                 // line 73
($context["partido"] ?? null), "jornada", [], "any", false, false, false, 73), "grupo_id" => twig_get_attribute($this->env, $this->source,                 // line 74
($context["partido"] ?? null), "grupo_id", [], "any", false, false, false, 74)]);
                // line 76
                echo "
                        ";
            }
            // line 78
            echo "
                        <a class=\"nombreJornada\" href='";
            // line 79
            echo twig_escape_filter($this->env, ($context["enlaceJornada"] ?? null), "html", null, true);
            echo "'>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "jornadaTxt", [], "any", false, false, false, 79), "html", null, true);
            echo "</a>

                    ";
        }
        // line 82
        echo "
                    ";
        // line 83
        if ((0 === twig_compare(($context["pagina"] ?? null), "televisados") && 0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 83), 1))) {
            // line 84
            echo "
                        ";
            // line 85
            $context["diferencia"] = twig_get_attribute($this->env, $this->source, twig_date_converter($this->env, (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "fecha", [], "any", false, false, false, 85) . twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "hora_prevista", [], "any", false, false, false, 85))), "diff", [0 => twig_date_converter($this->env, twig_date_format_filter($this->env, "now", "Y-m-d H:i:s", "Europe/Madrid"))], "method", false, false, false, 85);
            // line 86
            echo "
                        ";
            // line 87
            $context["dias"] = twig_get_attribute($this->env, $this->source, ($context["diferencia"] ?? null), "d", [], "any", false, false, false, 87);
            // line 88
            echo "                        ";
            $context["horas"] = twig_get_attribute($this->env, $this->source, ($context["diferencia"] ?? null), "h", [], "any", false, false, false, 88);
            // line 89
            echo "                        ";
            $context["minutos"] = twig_get_attribute($this->env, $this->source, ($context["diferencia"] ?? null), "i", [], "any", false, false, false, 89);
            // line 90
            echo "                        ";
            $context["segundos"] = twig_get_attribute($this->env, $this->source, ($context["diferencia"] ?? null), "s", [], "any", false, false, false, 90);
            // line 91
            echo "                        ";
            $context["invertido"] = twig_get_attribute($this->env, $this->source, ($context["diferencia"] ?? null), "invert", [], "any", false, false, false, 91);
            // line 92
            echo "
                        ";
            // line 93
            $context["txth"] = (($context["horas"] ?? null) . " horas");
            // line 94
            echo "                        ";
            $context["txtm"] = (($context["minutos"] ?? null) . " minutos");
            // line 95
            echo "
                        ";
            // line 96
            if (0 === twig_compare(($context["invertido"] ?? null), 0)) {
                // line 97
                echo "                            <strong style=\"color:red\">En estos momentos...</strong>
                        ";
            } else {
                // line 99
                echo "                            ";
                if (0 === twig_compare(($context["dias"] ?? null), 0)) {
                    // line 100
                    echo "
                                ";
                    // line 101
                    if (0 === twig_compare(($context["horas"] ?? null), 1)) {
                        // line 102
                        echo "                                    ";
                        $context["txth"] = (($context["horas"] ?? null) . " hora");
                        // line 103
                        echo "                                ";
                    }
                    // line 104
                    echo "
                                ";
                    // line 105
                    if (0 === twig_compare(($context["horas"] ?? null), 0)) {
                        // line 106
                        echo "                                    ";
                        $context["txth"] = "";
                        // line 107
                        echo "                                ";
                    }
                    // line 108
                    echo "
                                ";
                    // line 109
                    if ((1 === twig_compare(($context["horas"] ?? null), 0) && 1 === twig_compare(($context["minutos"] ?? null), 0))) {
                        // line 110
                        echo "                                    ";
                        $context["txth"] = (($context["txth"] ?? null) . " y ");
                        // line 111
                        echo "                                ";
                    }
                    // line 112
                    echo "
                                ";
                    // line 113
                    if (0 === twig_compare(($context["minutos"] ?? null), 1)) {
                        // line 114
                        echo "                                    ";
                        $context["txtm"] = (($context["minutos"] ?? null) . " minuto");
                        // line 115
                        echo "                                ";
                    }
                    // line 116
                    echo "
                                ";
                    // line 117
                    if (0 === twig_compare(($context["minutos"] ?? null), 0)) {
                        // line 118
                        echo "                                    ";
                        $context["txtm"] = "";
                        // line 119
                        echo "                                ";
                    }
                    // line 120
                    echo "
                                Televisado en ";
                    // line 121
                    echo twig_escape_filter($this->env, ($context["txth"] ?? null), "html", null, true);
                    echo twig_escape_filter($this->env, ($context["txtm"] ?? null), "html", null, true);
                    echo "

                            ";
                }
                // line 124
                echo "
                        ";
            }
            // line 126
            echo "
                    ";
        }
        // line 128
        echo "

                    ";
        // line 130
        if (0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "clasificado", [], "any", false, false, false, 130), "")) {
            // line 131
            echo "                        ";
            $context["clasificado"] = twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "clasificado", [], "any", false, false, false, 131);
            // line 132
            echo "                    ";
        } else {
            // line 133
            echo "                        ";
            $context["clasificado"] = 0;
            // line 134
            echo "                    ";
        }
        // line 135
        echo "
                    ";
        // line 136
        if ((1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 136), 1) && 0 !== twig_compare(($context["pagina"] ?? null), "televisados"))) {
            // line 137
            echo "
                        ";
            // line 138
            $context["colorTexto"] = "white";
            // line 139
            echo "
                        ";
            // line 140
            if (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "comentario", [], "any", false, false, false, 140)) {
                // line 141
                echo "                            ";
                $context["t"] = twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "comentario", [], "any", false, false, false, 141), "-");
                // line 142
                echo "
                            ";
                // line 143
                if ((twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 3, [], "any", true, true, false, 143) &&  !(null === twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 3, [], "any", false, false, false, 143)))) {
                    // line 144
                    echo "                                ";
                    $context["ev"] = twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 3, [], "any", false, false, false, 144);
                    // line 145
                    echo "                            ";
                }
                // line 146
                echo "
                            ";
                // line 147
                if (((isset($context["t"]) || array_key_exists("t", $context)) &&  !(null === ($context["t"] ?? null)))) {
                    // line 148
                    echo "
                                ";
                    // line 149
                    $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#f07474"]);
                    // line 150
                    echo "
                                ";
                    // line 151
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 151), 1)) {
                        // line 152
                        echo "                                    ";
                        $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#f07474"]);
                        // line 153
                        echo "                                ";
                    }
                    // line 154
                    echo "
                                ";
                    // line 155
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 155), 2)) {
                        // line 156
                        echo "                                    ";
                        $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#7cc002"]);
                        // line 157
                        echo "                                ";
                    }
                    // line 158
                    echo "
                                ";
                    // line 159
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 159), 3)) {
                        // line 160
                        echo "                                    ";
                        $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#610B0B"]);
                        // line 161
                        echo "                                ";
                    }
                    // line 162
                    echo "
                                ";
                    // line 163
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 163), 4)) {
                        // line 164
                        echo "                                    ";
                        $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#0B3B0B"]);
                        // line 165
                        echo "                                ";
                    }
                    // line 166
                    echo "
                                ";
                    // line 167
                    $context["parte"] = "";
                    // line 168
                    echo "
                                ";
                    // line 169
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 169), 1)) {
                        // line 170
                        echo "                                    ";
                        $context["parte"] = "1T - ";
                        // line 171
                        echo "                                ";
                    } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 171), 2)) {
                        // line 172
                        echo "                                    ";
                        $context["parte"] = "2T - ";
                        // line 173
                        echo "                                ";
                    }
                    // line 174
                    echo "
                                ";
                    // line 175
                    $context["t"] = twig_array_merge(($context["t"] ?? null), ["tiempo" => ("Minuto " . twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 1, [], "any", false, false, false, 175))]);
                    // line 176
                    echo "

                                ";
                    // line 178
                    if ((twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 2, [], "any", true, true, false, 178) && 1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 2, [], "any", false, false, false, 178), 0))) {
                        // line 179
                        echo "                                    ";
                        $context["t"] = twig_array_merge(($context["t"] ?? null), ["tiempo" => ((twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), "tiempo", [], "any", false, false, false, 179) . " + ") . twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 2, [], "any", false, false, false, 179))]);
                        // line 180
                        echo "                                ";
                    }
                    // line 181
                    echo "
                                ";
                    // line 182
                    $context["t"] = twig_array_merge(($context["t"] ?? null), ["tiempo" => (($context["parte"] ?? null) . twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), "tiempo", [], "any", false, false, false, 182))]);
                    // line 183
                    echo "
                            ";
                }
                // line 185
                echo "

                            ";
                // line 187
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 187), 6)) {
                    // line 188
                    echo "                                ";
                    $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#ffe400", "tiempo" => "Descanso"]);
                    // line 194
                    echo "
                                ";
                    // line 195
                    $context["colorTexto"] = "maroon";
                    // line 196
                    echo "
                            ";
                } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,                 // line 197
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 197), 7)) {
                    // line 198
                    echo "
                                ";
                    // line 199
                    $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#2E2E2E", "tiempo" => "Penaltis"]);
                    // line 205
                    echo "
                            ";
                } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,                 // line 206
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 206), 8)) {
                    // line 207
                    echo "
                                ";
                    // line 208
                    $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "blue", "tiempo" => "Prórroga"]);
                    // line 214
                    echo "
                            ";
                }
                // line 216
                echo "
                        ";
            }
            // line 218
            echo "

                    ";
        }
        // line 221
        echo "
                    ";
        // line 222
        if ((isset($context["t"]) || array_key_exists("t", $context))) {
            // line 223
            echo "                        <div class=\"infopwhitebox\">

                            ";
            // line 225
            if ((twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "categoria_torneo_id", [], "any", true, true, false, 225) && 0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "categoria_torneo_id", [], "any", false, false, false, 225), 17))) {
                // line 226
                echo "
                                ";
                // line 227
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 227), 2)) {
                    // line 228
                    echo "                                    ";
                    $context["t"] = twig_array_merge(($context["t"] ?? null), ["tiempo" => "2ª parte"]);
                    // line 233
                    echo "                                ";
                }
                // line 234
                echo "
                                ";
                // line 235
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 235), 1)) {
                    // line 236
                    echo "                                    ";
                    $context["t"] = twig_array_merge(($context["t"] ?? null), ["tiempo" => "1ª parte"]);
                    // line 241
                    echo "                                ";
                }
                // line 242
                echo "
                            ";
            }
            // line 244
            echo "
                            ";
            // line 252
            echo "
                            ";
            // line 253
            if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 253), 6)) {
                // line 254
                echo "
                                ";
                // line 256
                echo "                                <p class=\"timeresult\" style=\" color: orange !important\">Descanso</p>

                            ";
            } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 258
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 258), 7)) {
                // line 259
                echo "
                                ";
                // line 261
                echo "
                                <p class=\"timeresult\" style=\"color: #E81346;\">Penaltis</p>


                            ";
            } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 265
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 265), 8)) {
                // line 266
                echo "
                                ";
                // line 268
                echo "                                <p class=\"timeresult\" style=\"color: dodgerblue;\">Prórroga</p>

                            ";
            } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 270
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 270), 9)) {
                // line 271
                echo "
                                ";
                // line 273
                echo "                                <p class=\"timeresult\" style=\"color: #9EFF23;\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), "tiempo", [], "any", false, false, false, 273), "html", null, true);
                echo "</p>

                            ";
            } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 275
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 275), 10)) {
                // line 276
                echo "
                                ";
                // line 278
                echo "                                <p class=\"timeresult\" style=\"color: #9EFF23;\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), "tiempo", [], "any", false, false, false, 278), "html", null, true);
                echo "</p>

                            ";
            } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 280
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 280), 11)) {
                // line 281
                echo "
                                ";
                // line 283
                echo "                                <p class=\"timeresult\" style=\"color: orange;\">Desc.Prórr.</p>

                            ";
            } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 285
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 285), 2)) {
                // line 286
                echo "
                                ";
                // line 288
                echo "                                <p class=\"timeresult\" style=\"color: #9EFF23; !important\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), "tiempo", [], "any", false, false, false, 288), "html", null, true);
                echo "</p>

                            ";
            }
            // line 291
            echo "                        </div>
                    ";
        }
        // line 293
        echo "                </div>

                <div class=\"contenedorIconosPartido col-3 nopadding h25\">

                    ";
        // line 297
        echo twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "txtTV", [], "any", false, false, false, 297);
        echo "

                    ";
        // line 299
        if (((1 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "tvs", [], "any", false, false, false, 299), 0, [], "any", false, false, false, 299), 0) && 0 !== twig_compare(1, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 299))) && 0 !== twig_compare(($context["pagina"] ?? null), "televisados"))) {
            // line 300
            echo "                        <a href=\"/partidos-televisados#tv-";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 300), "html", null, true);
            echo "\" title=\"partido televisado\">
                            ";
            // line 301
            if (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "enJuego", [], "any", false, false, false, 301)) {
                // line 302
                echo "                                <img src=\"/static/img/icono-partidos-televisados-blanco.svg\" alt=\"partido televisado\" width=\"19\">
                            ";
            } else {
                // line 304
                echo "                                <img src=\"/static/img/icono-partidos-televisados.svg\" alt=\"partido televisado\" width=\"19\">
                            ";
            }
            // line 306
            echo "                        </a>
                    ";
        }
        // line 308
        echo "
                    ";
        // line 309
        echo ($context["icono"] ?? null);
        echo "

                    <a class=\"simboloMasPartido\" href=\"javascript:mostrarColor(";
        // line 311
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 311), "html", null, true);
        echo ");\">
                        ";
        // line 312
        if (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "enJuego", [], "any", false, false, false, 312)) {
            // line 313
            echo "                            <img src=\"/static/img/simbolo-mas-blanco.svg\" title=\"Partido entre ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "local", [], "any", false, false, false, 313), "html", null, true);
            echo " y ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitante", [], "any", false, false, false, 313), "html", null, true);
            echo "\" alt=\"Partido entre ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "local", [], "any", false, false, false, 313), "html", null, true);
            echo " y ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitante", [], "any", false, false, false, 313), "html", null, true);
            echo "\">
                        ";
        } else {
            // line 315
            echo "                            <img src=\"/static/img/simbolo-mas.svg\" title=\"Partido entre ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "local", [], "any", false, false, false, 315), "html", null, true);
            echo " y ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitante", [], "any", false, false, false, 315), "html", null, true);
            echo "\" alt=\"Partido entre ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "local", [], "any", false, false, false, 315), "html", null, true);
            echo " y ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitante", [], "any", false, false, false, 315), "html", null, true);
            echo "\">
                        ";
        }
        // line 317
        echo "                    </a>

                </div>

            </div>

        </div>

        <div style=\"clear: both;\"></div>

        ";
        // line 330
        echo "
        <div class=\"col-12\">
            <div class=\"row\">

            <div class=\"col-5 equipoPartido equipoPartidoLocal\">
                ";
        // line 338
        echo "                <p onclick=\"mostrarColor(";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 338), "html", null, true);
        echo ")\">
                    <span itemprop=\"name\" style=\"";
        // line 339
        if (0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "colorL", [], "any", false, false, false, 339), "")) {
            echo "color: ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "colorL", [], "any", false, false, false, 339), "html", null, true);
            echo ";";
        }
        echo "\"><span class=\"d-block d-sm-none\" style=\"";
        if (0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "colorL", [], "any", false, false, false, 339), "")) {
            echo "color: ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "colorL", [], "any", false, false, false, 339), "html", null, true);
            echo ";";
        }
        echo "\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "localCorto", [], "any", false, false, false, 339), "html", null, true);
        echo "</span><span class=\"d-none d-sm-block\" style=\"";
        if (0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "colorL", [], "any", false, false, false, 339), "")) {
            echo "color: ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "colorL", [], "any", false, false, false, 339), "html", null, true);
            echo ";";
        }
        echo "\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "local", [], "any", false, false, false, 339), "html", null, true);
        echo "</span></span>
                </p>
            </div>

            <div class=\"col-2 resultadoPartido\">
                ";
        // line 344
        if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 344), 1)) {
            // line 345
            echo "                    <span>
                        ";
            // line 346
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "goles_local", [], "any", false, false, false, 346), "html", null, true);
            echo "
                    </span>

                    -

                    <span>
                        ";
            // line 352
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "goles_visitante", [], "any", false, false, false, 352), "html", null, true);
            echo "
                    </span>
                ";
        }
        // line 355
        echo "
                ";
        // line 356
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 356), 2) || 1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 356), 5))) {
            // line 357
            echo "

                <span class=\"
                    ";
            // line 360
            if (0 === twig_compare(($context["ev"] ?? null), 5)) {
                // line 361
                echo "                        parpadea
                    ";
            }
            // line 363
            echo "                \">
                    ";
            // line 364
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "goles_local", [], "any", false, false, false, 364), "html", null, true);
            echo "
                </span>

                -

                <span class=\"
                    ";
            // line 370
            if (0 === twig_compare(($context["ev"] ?? null), 6)) {
                // line 371
                echo "                        parpadea
                    ";
            }
            // line 373
            echo "                \">
                    ";
            // line 374
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "goles_visitante", [], "any", false, false, false, 374), "html", null, true);
            echo "
                </span>

                ";
        }
        // line 378
        echo "
                ";
        // line 379
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 379), 0) || (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 379), 2) && -1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 379), 6)))) {
            // line 380
            echo "                <div>
                    ";
            // line 381
            if ((0 === twig_compare(($context["pagina"] ?? null), "index") && (isset($context["temporada_id"]) || array_key_exists("temporada_id", $context)))) {
                // line 382
                echo "                        <span class=\"text-center boldfont\" style=\"font-size:12px\">
                            ";
                // line 383
                echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "fecha", [], "any", false, false, false, 383),  -2, null), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "fecha", [], "any", false, false, false, 383), 5, 2), "html", null, true);
                echo "
                        </span>
                    <br/>
                    ";
            }
            // line 387
            echo "
                    ";
            // line 388
            if (((isset($context["tipoTorneo"]) || array_key_exists("tipoTorneo", $context)) && 0 === twig_compare(($context["tipoTorneo"] ?? null), 4))) {
                // line 389
                echo "                    <span class=\"text-center boldfont\" style=\"font-size:12px;\">
                        ";
                // line 390
                echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "fecha", [], "any", false, false, false, 390),  -2, null), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "fecha", [], "any", false, false, false, 390), 5, 2), "html", null, true);
                echo "
                    </span>
                    ";
            }
            // line 393
            echo "
                    <div class=\"horaPartido\">
                        ";
            // line 395
            if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 395), 3)) {
                // line 396
                echo "                            <span class=\"suspendido\">Susp.</span>
                        ";
            } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 397
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 397), 4)) {
                // line 398
                echo "                            <span class=\"aplazado\">Aplaz.</span>
                        ";
            } else {
                // line 400
                echo "
                            ";
                // line 401
                if (0 === twig_compare(twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "hora_prevista", [], "any", false, false, false, 401),  -2, null), 11)) {
                    // line 402
                    echo "                                ";
                    $context["hora"] = ":";
                    // line 403
                    echo "                            ";
                } else {
                    // line 404
                    echo "                                ";
                    $context["hora"] = twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "hora_prevista", [], "any", false, false, false, 404), 0, 5);
                    // line 405
                    echo "                            ";
                }
                // line 406
                echo "
                            ";
                // line 407
                echo twig_escape_filter($this->env, ($context["hora"] ?? null), "html", null, true);
                echo "

                        ";
            }
            // line 410
            echo "                    </div>

                </div>
                ";
        }
        // line 414
        echo "            </div>

            <div class=\"col-5 equipoPartido equipoPartidoVisitante\">
                ";
        // line 420
        echo "                <p onclick=\"mostrarColor(";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 420), "html", null, true);
        echo ")\">
                    <span itemprop=\"name\" class=\"txt11\" style=\"";
        // line 421
        if (0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "colorV", [], "any", false, false, false, 421), "")) {
            echo "color: ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "colorV", [], "any", false, false, false, 421), "html", null, true);
            echo ";";
        }
        echo "\"><span class=\"d-block d-sm-none\" style=\"";
        if (0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "colorV", [], "any", false, false, false, 421), "")) {
            echo "color: ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "colorV", [], "any", false, false, false, 421), "html", null, true);
            echo ";";
        }
        echo "\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitanteCorto", [], "any", false, false, false, 421), "html", null, true);
        echo "</span><span class=\"d-none d-sm-block\" style=\"";
        if (0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "colorV", [], "any", false, false, false, 421), "")) {
            echo "color: ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "colorV", [], "any", false, false, false, 421), "html", null, true);
            echo ";";
        }
        echo "\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitante", [], "any", false, false, false, 421), "html", null, true);
        echo "</span></span>
                </p>
            </div>

        </div>
        </div>


        ";
        // line 429
        if ((0 === twig_compare(($context["desfasado"] ?? null), 1) && 0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "fecha", [], "any", false, false, false, 429), "1970-01-01"))) {
            // line 430
            echo "            <div id=\"resultado-";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 430), "html", null, true);
            echo "\">
                <table style=\"width: 100%; background-color: orange\">
                    <form method=\"post\" onsubmit=\"submitEnviarResultado(event, \$(this).serialize(), ";
            // line 432
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 432), "html", null, true);
            echo ")\">

                        <input type=\"hidden\" name=\"usuario\" value=\"<?php echo \$_COOKIE['futbolme_2018']??'000000';?>\">
                        <input type=\"hidden\" name=\"partido_id\" value=\"";
            // line 435
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 435), "html", null, true);
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
        // line 446
        echo "
        ";
        // line 451
        echo "
        ";
        // line 452
        if ((twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "ida", [], "any", true, true, false, 452) && 0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "jornada", [], "any", false, false, false, 452), 95))) {
            // line 453
            echo "            <div class=\"col-12\">
                ";
            // line 454
            if (-1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 454), 2)) {
                // line 455
                echo "
                    <p class=\"textoIda\">

                ";
            } else {
                // line 459
                echo "                    
                    <p class=\"textoIda\" style=\"color:white\">

                ";
            }
            // line 463
            echo "
                    ";
            // line 464
            $context["ida"] = twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "ida", [], "any", false, false, false, 464), ",");
            // line 465
            echo "
                    ";
            // line 466
            $context["ida_resulcasa"] = twig_get_attribute($this->env, $this->source, ($context["ida"] ?? null), 0, [], "any", false, false, false, 466);
            // line 467
            echo "                    ";
            $context["ida_resulfuera"] = twig_get_attribute($this->env, $this->source, ($context["ida"] ?? null), 1, [], "any", false, false, false, 467);
            // line 468
            echo "                    ";
            $context["ida_jornada"] = twig_get_attribute($this->env, $this->source, ($context["ida"] ?? null), 2, [], "any", false, false, false, 468);
            // line 469
            echo "                    ";
            $context["ida_fecha"] = twig_get_attribute($this->env, $this->source, ($context["ida"] ?? null), 3, [], "any", false, false, false, 469);
            // line 470
            echo "
                    ";
            // line 471
            if ( !twig_get_attribute($this->env, $this->source, ($context["ida"] ?? null), 5, [], "any", true, true, false, 471)) {
                // line 472
                echo "                        ";
                $context["ida"] = twig_array_merge(($context["ida"] ?? null), [5 => 1]);
                // line 473
                echo "                    ";
            }
            // line 474
            echo "
                    ";
            // line 475
            $context["ida_tipo"] = twig_get_attribute($this->env, $this->source, ($context["ida"] ?? null), 5, [], "any", false, false, false, 475);
            // line 476
            echo "
                    ";
            // line 477
            if (0 === twig_compare(($context["ida_tipo"] ?? null), 2)) {
                // line 478
                echo "
                        ";
                // line 479
                if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "fecha", [], "any", false, false, false, 479), ($context["ida_fecha"] ?? null))) {
                    // line 480
                    echo "                            ";
                    $context["txtFecha"] = "IDA";
                    // line 481
                    echo "                        ";
                } else {
                    // line 482
                    echo "                            ";
                    $context["txtFecha"] = "VUELTA";
                    // line 483
                    echo "                        ";
                }
                // line 484
                echo "
                        ";
                // line 485
                echo twig_escape_filter($this->env, ($context["txtFecha"] ?? null), "html", null, true);
                echo "

                        ";
                // line 487
                echo twig_escape_filter($this->env, ($context["ida_resulfuera"] ?? null), "html", null, true);
                echo " - ";
                echo twig_escape_filter($this->env, ($context["ida_resulcasa"] ?? null), "html", null, true);
                echo "

                        ";
                // line 489
                if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 489), 0)) {
                    // line 490
                    echo "                            ";
                    $context["global_casa"] = (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "goles_local", [], "any", false, false, false, 490) + ($context["ida_resulfuera"] ?? null));
                    // line 491
                    echo "                            ";
                    $context["global_fuera"] = (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "goles_visitante", [], "any", false, false, false, 491) + ($context["ida_resulcasa"] ?? null));
                    // line 492
                    echo "                            | GLOBAL ";
                    echo twig_escape_filter($this->env, ($context["global_casa"] ?? null), "html", null, true);
                    echo " - ";
                    echo twig_escape_filter($this->env, ($context["global_fuera"] ?? null), "html", null, true);
                    echo "
                        ";
                }
                // line 494
                echo "
                    ";
            }
            // line 496
            echo "                </p>
            </div>
            <div class=\"clear\"></div>
        ";
        }
        // line 500
        echo "
        ";
        // line 501
        if (((twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "twLocal", [], "any", true, true, false, 501) && 1 === twig_compare(twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "twLocal", [], "any", false, false, false, 501)), 3)) || (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "twVisitante", [], "any", true, true, false, 501) && 1 === twig_compare(twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "twVisitante", [], "any", false, false, false, 501)), 3)))) {
            // line 502
            echo "            <div id=\"log-tw-";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 502), "html", null, true);
            echo "\" class=\"hide\"></div>
        ";
        }
        // line 504
        echo "
        ";
        // line 513
        echo "
        ";
        // line 514
        $context["cadenaGoles"] = 0;
        // line 515
        echo "
        ";
        // line 517
        echo "
        ";
        // line 518
        if ((twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "observaciones", [], "any", true, true, false, 518) && 1 === twig_compare(twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "observaciones", [], "any", false, false, false, 518)), 5))) {
            // line 519
            echo "
            <div class=\"col-12 nopadding\">

                ";
            // line 522
            $context["cadena"] = call_user_func_array($this->env->getFunction('desglosarTexto')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "observaciones", [], "any", false, false, false, 522)]);
            // line 523
            echo "
                ";
            // line 524
            if (twig_get_attribute($this->env, $this->source, ($context["cadena"] ?? null), 1, [], "any", true, true, false, 524)) {
                // line 525
                echo "                    ";
                $context["cadenaGoles"] = twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["cadena"] ?? null), 1, [], "any", false, false, false, 525));
                // line 526
                echo "                ";
            }
            // line 527
            echo "
                ";
            // line 528
            if (twig_get_attribute($this->env, $this->source, ($context["cadena"] ?? null), 2, [], "any", true, true, false, 528)) {
                // line 529
                echo "                    ";
                $context["cadenaGoles"] = (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["cadena"] ?? null), 2, [], "any", false, false, false, 529)) + ($context["cadenaGoles"] ?? null));
                // line 530
                echo "                ";
            }
            // line 531
            echo "
                ";
            // line 532
            $this->loadTemplate("index/__part/partidosObservaciones.html.twig", "index/__part/filaPartido.html.twig", 532)->display($context);
            // line 533
            echo "
            </div>
            <div class=\"clear\" style=\"height: 5px !important;\"></div>

        ";
        }
        // line 538
        echo "
        <div id=\"posicion";
        // line 539
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 539), "html", null, true);
        echo "\" style=\"display: none;\">
            <div class=\"enlacesDeInteres\" style=\"padding: 0px 10px\">
                <span class=\"float-right\" onclick=\"mostrarColor(";
        // line 541
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 541), "html", null, true);
        echo ")\" style=\"cursor:pointer;\">Cerrar enlaces</span>
                <br />
                <h4>ENLACES DE INTERES</h4>

                <div class=\"row\">

                    <div class=\"enlacesDeInteresColumnaCampeonato col-4\">
                        ";
        // line 548
        if (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "temporada_id", [], "any", true, true, false, 548)) {
            // line 549
            echo "                            <h5><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "enlace_torneo", [], "any", false, false, false, 549), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "nombreTorneo", [], "any", false, false, false, 549), "html", null, true);
            echo "</a></h5>

                            ";
            // line 551
            $context["partido"] = twig_array_merge(($context["partido"] ?? null), ["temporada_id" => ($context["temporada_id"] ?? null)]);
            // line 552
            echo "
                        ";
        }
        // line 554
        echo "
                        <a href=\"";
        // line 555
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "pgPartido", [], "any", false, false, false, 555), "html", null, true);
        echo "\">Ir al partido</a><br />
                        <a href=\"";
        // line 556
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "pgPartido", [], "any", false, false, false, 556), "html", null, true);
        echo "/enfrentamientos\">
                            Ver enfrentamientos
                        </a>

                    </div>

                    <div class=\"enlacesDeInteresColumnaEquipo col-4\">

                        ";
        // line 564
        if (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "pgLocal", [], "any", true, true, false, 564)) {
            // line 565
            echo "                            ";
            $context["pgLocal"] = twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "pgLocal", [], "any", false, false, false, 565);
            // line 566
            echo "                        ";
        } else {
            // line 567
            echo "                            ";
            $context["pgLocal"] = $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_datos", ["idEquipo" => twig_get_attribute($this->env, $this->source,             // line 568
($context["partido"] ?? null), "equipoLocal_id", [], "any", false, false, false, 568), "slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,             // line 569
($context["partido"] ?? null), "local", [], "any", false, false, false, 569)])]);
            // line 571
            echo "                        ";
        }
        // line 572
        echo "
                        <h6>";
        // line 573
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "localCorto", [], "any", false, false, false, 573), "html", null, true);
        echo "</h6>
                        <a href=\"";
        // line 574
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_calendario", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,         // line 575
($context["partido"] ?? null), "local", [], "any", false, false, false, 575)]), "idEquipo" => twig_get_attribute($this->env, $this->source,         // line 576
($context["partido"] ?? null), "equipoLocal_id", [], "any", false, false, false, 576)]), "html", null, true);
        // line 577
        echo "\">Calendario</a><br />

                        <a href=\"";
        // line 579
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_clasificacion", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,         // line 580
($context["partido"] ?? null), "local", [], "any", false, false, false, 580)]), "idEquipo" => twig_get_attribute($this->env, $this->source,         // line 581
($context["partido"] ?? null), "equipoLocal_id", [], "any", false, false, false, 581)]), "html", null, true);
        // line 582
        echo "\">Clasificación</a><br />

                        ";
        // line 584
        if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "idPais", [], "any", false, false, false, 584), 60)) {
            // line 585
            echo "                            ";
            if ((-1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "division", [], "any", false, false, false, 585), 6) || 0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "temporada_id", [], "any", false, false, false, 585), 214))) {
                // line 586
                echo "
                                <a style=\"font-weight: bold;\" href=\"";
                // line 587
                echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_plantilla", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,                 // line 588
($context["partido"] ?? null), "local", [], "any", false, false, false, 588)]), "idEquipo" => twig_get_attribute($this->env, $this->source,                 // line 589
($context["partido"] ?? null), "equipoLocal_id", [], "any", false, false, false, 589)]), "html", null, true);
                // line 590
                echo "\">Plantilla</a><br />

                            ";
            }
            // line 593
            echo "
                            <a href=\"";
            // line 594
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_datos", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,             // line 595
($context["partido"] ?? null), "local", [], "any", false, false, false, 595)]), "idEquipo" => twig_get_attribute($this->env, $this->source,             // line 596
($context["partido"] ?? null), "equipoLocal_id", [], "any", false, false, false, 596)]), "html", null, true);
            // line 597
            echo "\">Datos del club</a><br />

                            <a href=\"";
            // line 599
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_equipos", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,             // line 600
($context["partido"] ?? null), "local", [], "any", false, false, false, 600)]), "idEquipo" => twig_get_attribute($this->env, $this->source,             // line 601
($context["partido"] ?? null), "equipoLocal_id", [], "any", false, false, false, 601)]), "html", null, true);
            // line 602
            echo "\">Equipos del club</a><br />


                            ";
            // line 615
            echo "
                        ";
        }
        // line 617
        echo "
                        ";
        // line 621
        echo "
                    </div>


                    <div class=\"enlacesDeInteresColumnaEquipo col-4\">

                        ";
        // line 627
        if (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "pgVisitante", [], "any", true, true, false, 627)) {
            // line 628
            echo "                            ";
            $context["pgVisitante"] = twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "pgVisitante", [], "any", false, false, false, 628);
            // line 629
            echo "                        ";
        } else {
            // line 630
            echo "                            ";
            $context["pgVisitante"] = $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_datos", ["idEquipo" => twig_get_attribute($this->env, $this->source,             // line 631
($context["partido"] ?? null), "equipoVisitante_id", [], "any", false, false, false, 631), "slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,             // line 632
($context["partido"] ?? null), "visitante", [], "any", false, false, false, 632)])]);
            // line 634
            echo "                        ";
        }
        // line 635
        echo "
                        <h6>";
        // line 636
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitanteCorto", [], "any", false, false, false, 636), "html", null, true);
        echo "</h6>
                        <a href=\"";
        // line 637
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_calendario", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,         // line 638
($context["partido"] ?? null), "visitante", [], "any", false, false, false, 638)]), "idEquipo" => twig_get_attribute($this->env, $this->source,         // line 639
($context["partido"] ?? null), "equipoVisitante_id", [], "any", false, false, false, 639)]), "html", null, true);
        // line 640
        echo "\">Calendario</a><br />
                        <a href=\"";
        // line 641
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_clasificacion", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,         // line 642
($context["partido"] ?? null), "visitante", [], "any", false, false, false, 642)]), "idEquipo" => twig_get_attribute($this->env, $this->source,         // line 643
($context["partido"] ?? null), "equipoVisitante_id", [], "any", false, false, false, 643)]), "html", null, true);
        // line 644
        echo "\">Clasificación</a><br />

                        ";
        // line 646
        if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "idPais", [], "any", false, false, false, 646), 60)) {
            // line 647
            echo "
                            ";
            // line 648
            if ((-1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "division", [], "any", false, false, false, 648), 6) || 0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "temporada_id", [], "any", false, false, false, 648), 214))) {
                // line 649
                echo "
                                <a style=\"font-weight: bold;\" href=\"";
                // line 650
                echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_plantilla", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,                 // line 651
($context["partido"] ?? null), "visitante", [], "any", false, false, false, 651)]), "idEquipo" => twig_get_attribute($this->env, $this->source,                 // line 652
($context["partido"] ?? null), "equipoVisitante_id", [], "any", false, false, false, 652)]), "html", null, true);
                // line 653
                echo "\">Plantilla</a><br />

                            ";
            }
            // line 656
            echo "
                            <a href=\"";
            // line 657
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_datos", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,             // line 658
($context["partido"] ?? null), "visitante", [], "any", false, false, false, 658)]), "idEquipo" => twig_get_attribute($this->env, $this->source,             // line 659
($context["partido"] ?? null), "equipoVisitante_id", [], "any", false, false, false, 659)]), "html", null, true);
            // line 660
            echo "\">Datos del club</a><br />
                            <a href=\"";
            // line 661
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_equipos", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,             // line 662
($context["partido"] ?? null), "visitante", [], "any", false, false, false, 662)]), "idEquipo" => twig_get_attribute($this->env, $this->source,             // line 663
($context["partido"] ?? null), "equipoVisitante_id", [], "any", false, false, false, 663)]), "html", null, true);
            // line 664
            echo "\">Equipos del club</a><br />

                            ";
            // line 675
            echo "
                            ";
            // line 679
            echo "
                        ";
        }
        // line 681
        echo "
                    </div>

                </div>


                <div class=\"clear\"></div>
            </div>
        </div>

        <div id=\"alineaciones-";
        // line 691
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 691), "html", null, true);
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
        return array (  1411 => 691,  1399 => 681,  1395 => 679,  1392 => 675,  1388 => 664,  1386 => 663,  1385 => 662,  1384 => 661,  1381 => 660,  1379 => 659,  1378 => 658,  1377 => 657,  1374 => 656,  1369 => 653,  1367 => 652,  1366 => 651,  1365 => 650,  1362 => 649,  1360 => 648,  1357 => 647,  1355 => 646,  1351 => 644,  1349 => 643,  1348 => 642,  1347 => 641,  1344 => 640,  1342 => 639,  1341 => 638,  1340 => 637,  1336 => 636,  1333 => 635,  1330 => 634,  1328 => 632,  1327 => 631,  1325 => 630,  1322 => 629,  1319 => 628,  1317 => 627,  1309 => 621,  1306 => 617,  1302 => 615,  1297 => 602,  1295 => 601,  1294 => 600,  1293 => 599,  1289 => 597,  1287 => 596,  1286 => 595,  1285 => 594,  1282 => 593,  1277 => 590,  1275 => 589,  1274 => 588,  1273 => 587,  1270 => 586,  1267 => 585,  1265 => 584,  1261 => 582,  1259 => 581,  1258 => 580,  1257 => 579,  1253 => 577,  1251 => 576,  1250 => 575,  1249 => 574,  1245 => 573,  1242 => 572,  1239 => 571,  1237 => 569,  1236 => 568,  1234 => 567,  1231 => 566,  1228 => 565,  1226 => 564,  1215 => 556,  1211 => 555,  1208 => 554,  1204 => 552,  1202 => 551,  1194 => 549,  1192 => 548,  1182 => 541,  1177 => 539,  1174 => 538,  1167 => 533,  1165 => 532,  1162 => 531,  1159 => 530,  1156 => 529,  1154 => 528,  1151 => 527,  1148 => 526,  1145 => 525,  1143 => 524,  1140 => 523,  1138 => 522,  1133 => 519,  1131 => 518,  1128 => 517,  1125 => 515,  1123 => 514,  1120 => 513,  1117 => 504,  1111 => 502,  1109 => 501,  1106 => 500,  1100 => 496,  1096 => 494,  1088 => 492,  1085 => 491,  1082 => 490,  1080 => 489,  1073 => 487,  1068 => 485,  1065 => 484,  1062 => 483,  1059 => 482,  1056 => 481,  1053 => 480,  1051 => 479,  1048 => 478,  1046 => 477,  1043 => 476,  1041 => 475,  1038 => 474,  1035 => 473,  1032 => 472,  1030 => 471,  1027 => 470,  1024 => 469,  1021 => 468,  1018 => 467,  1016 => 466,  1013 => 465,  1011 => 464,  1008 => 463,  1002 => 459,  996 => 455,  994 => 454,  991 => 453,  989 => 452,  986 => 451,  983 => 446,  969 => 435,  963 => 432,  957 => 430,  955 => 429,  924 => 421,  919 => 420,  914 => 414,  908 => 410,  902 => 407,  899 => 406,  896 => 405,  893 => 404,  890 => 403,  887 => 402,  885 => 401,  882 => 400,  878 => 398,  876 => 397,  873 => 396,  871 => 395,  867 => 393,  859 => 390,  856 => 389,  854 => 388,  851 => 387,  842 => 383,  839 => 382,  837 => 381,  834 => 380,  832 => 379,  829 => 378,  822 => 374,  819 => 373,  815 => 371,  813 => 370,  804 => 364,  801 => 363,  797 => 361,  795 => 360,  790 => 357,  788 => 356,  785 => 355,  779 => 352,  770 => 346,  767 => 345,  765 => 344,  737 => 339,  732 => 338,  725 => 330,  713 => 317,  701 => 315,  689 => 313,  687 => 312,  683 => 311,  678 => 309,  675 => 308,  671 => 306,  667 => 304,  663 => 302,  661 => 301,  656 => 300,  654 => 299,  649 => 297,  643 => 293,  639 => 291,  632 => 288,  629 => 286,  627 => 285,  623 => 283,  620 => 281,  618 => 280,  612 => 278,  609 => 276,  607 => 275,  601 => 273,  598 => 271,  596 => 270,  592 => 268,  589 => 266,  587 => 265,  581 => 261,  578 => 259,  576 => 258,  572 => 256,  569 => 254,  567 => 253,  564 => 252,  561 => 244,  557 => 242,  554 => 241,  551 => 236,  549 => 235,  546 => 234,  543 => 233,  540 => 228,  538 => 227,  535 => 226,  533 => 225,  529 => 223,  527 => 222,  524 => 221,  519 => 218,  515 => 216,  511 => 214,  509 => 208,  506 => 207,  504 => 206,  501 => 205,  499 => 199,  496 => 198,  494 => 197,  491 => 196,  489 => 195,  486 => 194,  483 => 188,  481 => 187,  477 => 185,  473 => 183,  471 => 182,  468 => 181,  465 => 180,  462 => 179,  460 => 178,  456 => 176,  454 => 175,  451 => 174,  448 => 173,  445 => 172,  442 => 171,  439 => 170,  437 => 169,  434 => 168,  432 => 167,  429 => 166,  426 => 165,  423 => 164,  421 => 163,  418 => 162,  415 => 161,  412 => 160,  410 => 159,  407 => 158,  404 => 157,  401 => 156,  399 => 155,  396 => 154,  393 => 153,  390 => 152,  388 => 151,  385 => 150,  383 => 149,  380 => 148,  378 => 147,  375 => 146,  372 => 145,  369 => 144,  367 => 143,  364 => 142,  361 => 141,  359 => 140,  356 => 139,  354 => 138,  351 => 137,  349 => 136,  346 => 135,  343 => 134,  340 => 133,  337 => 132,  334 => 131,  332 => 130,  328 => 128,  324 => 126,  320 => 124,  313 => 121,  310 => 120,  307 => 119,  304 => 118,  302 => 117,  299 => 116,  296 => 115,  293 => 114,  291 => 113,  288 => 112,  285 => 111,  282 => 110,  280 => 109,  277 => 108,  274 => 107,  271 => 106,  269 => 105,  266 => 104,  263 => 103,  260 => 102,  258 => 101,  255 => 100,  252 => 99,  248 => 97,  246 => 96,  243 => 95,  240 => 94,  238 => 93,  235 => 92,  232 => 91,  229 => 90,  226 => 89,  223 => 88,  221 => 87,  218 => 86,  216 => 85,  213 => 84,  211 => 83,  208 => 82,  200 => 79,  197 => 78,  193 => 76,  191 => 74,  190 => 73,  189 => 72,  188 => 71,  186 => 70,  184 => 69,  182 => 68,  179 => 67,  177 => 65,  176 => 64,  175 => 63,  173 => 62,  170 => 60,  168 => 59,  162 => 55,  155 => 52,  152 => 51,  149 => 50,  146 => 49,  143 => 48,  141 => 47,  138 => 46,  136 => 45,  125 => 42,  123 => 41,  120 => 40,  118 => 39,  114 => 37,  108 => 30,  103 => 28,  98 => 27,  96 => 26,  86 => 23,  78 => 22,  71 => 20,  65 => 19,  55 => 15,  51 => 12,  49 => 11,  45 => 4,  43 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "index/__part/filaPartido.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.eu/v2/templates/index/__part/filaPartido.html.twig");
    }
}
