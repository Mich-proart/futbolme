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
class __TwigTemplate_8e0475aba34d8c29f42e7b654b3d6a3072fef74f9d25b5eb6d3f71c84c3ef626 extends Template
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
        echo " border\">

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
            <div class=\"row align-items-center\">

                ";
        // line 37
        echo "
                <div class=\"nopadding col-lg-3 col-2 h25\">
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

                <div class=\"col-lg-6 col-5 px-lg-3 px-0 nopadding h25 text-center\">

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
            echo "                        ";
            // line 85
            echo "                        ";
            $context["fechaHoraPartido"] = ((twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "fecha", [], "any", false, false, false, 85) . " ") . twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "hora_prevista", [], "any", false, false, false, 85));
            // line 86
            echo "                        ";
            $context["fechaHoraActual"] = twig_date_format_filter($this->env, "now", "Y-m-d H:i:s", "Europe/Madrid");
            // line 87
            echo "
                        ";
            // line 88
            $context["diferencia"] = twig_get_attribute($this->env, $this->source, twig_date_converter($this->env, ($context["fechaHoraPartido"] ?? null)), "diff", [0 => twig_date_converter($this->env, ($context["fechaHoraActual"] ?? null))], "method", false, false, false, 88);
            // line 89
            echo "

                        ";
            // line 91
            $context["dias"] = twig_get_attribute($this->env, $this->source, ($context["diferencia"] ?? null), "d", [], "any", false, false, false, 91);
            // line 92
            echo "                        ";
            $context["horas"] = twig_get_attribute($this->env, $this->source, ($context["diferencia"] ?? null), "h", [], "any", false, false, false, 92);
            // line 93
            echo "                        ";
            $context["minutos"] = twig_get_attribute($this->env, $this->source, ($context["diferencia"] ?? null), "i", [], "any", false, false, false, 93);
            // line 94
            echo "                        ";
            $context["segundos"] = twig_get_attribute($this->env, $this->source, ($context["diferencia"] ?? null), "s", [], "any", false, false, false, 94);
            // line 95
            echo "                        ";
            $context["invertido"] = twig_get_attribute($this->env, $this->source, ($context["diferencia"] ?? null), "invert", [], "any", false, false, false, 95);
            // line 96
            echo "
                        ";
            // line 97
            $context["txth"] = (($context["horas"] ?? null) . " horas");
            // line 98
            echo "                        ";
            $context["txtm"] = (($context["minutos"] ?? null) . " minutos");
            // line 99
            echo "
                        ";
            // line 100
            if (0 === twig_compare(($context["invertido"] ?? null), 0)) {
                // line 101
                echo "                            <strong style=\"color:red\">En estos momentos...</strong>
                        ";
            } else {
                // line 103
                echo "                            ";
                if (0 === twig_compare(($context["dias"] ?? null), 0)) {
                    // line 104
                    echo "
                                ";
                    // line 105
                    if (0 === twig_compare(($context["horas"] ?? null), 1)) {
                        // line 106
                        echo "                                    ";
                        $context["txth"] = (($context["horas"] ?? null) . " hora");
                        // line 107
                        echo "                                ";
                    }
                    // line 108
                    echo "
                                ";
                    // line 109
                    if (0 === twig_compare(($context["horas"] ?? null), 0)) {
                        // line 110
                        echo "                                    ";
                        $context["txth"] = "";
                        // line 111
                        echo "                                ";
                    }
                    // line 112
                    echo "
                                ";
                    // line 113
                    if ((1 === twig_compare(($context["horas"] ?? null), 0) && 1 === twig_compare(($context["minutos"] ?? null), 0))) {
                        // line 114
                        echo "                                    ";
                        $context["txth"] = (($context["txth"] ?? null) . " y ");
                        // line 115
                        echo "                                ";
                    }
                    // line 116
                    echo "
                                ";
                    // line 117
                    if (0 === twig_compare(($context["minutos"] ?? null), 1)) {
                        // line 118
                        echo "                                    ";
                        $context["txtm"] = (($context["minutos"] ?? null) . " minuto");
                        // line 119
                        echo "                                ";
                    }
                    // line 120
                    echo "
                                ";
                    // line 121
                    if (0 === twig_compare(($context["minutos"] ?? null), 0)) {
                        // line 122
                        echo "                                    ";
                        $context["txtm"] = "";
                        // line 123
                        echo "                                ";
                    }
                    // line 124
                    echo "
                                Televisado en ";
                    // line 125
                    echo twig_escape_filter($this->env, ($context["txth"] ?? null), "html", null, true);
                    echo twig_escape_filter($this->env, ($context["txtm"] ?? null), "html", null, true);
                    echo "

                            ";
                }
                // line 128
                echo "
                        ";
            }
            // line 130
            echo "
                    ";
        }
        // line 132
        echo "

                    ";
        // line 134
        if (0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "clasificado", [], "any", false, false, false, 134), "")) {
            // line 135
            echo "                        ";
            $context["clasificado"] = twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "clasificado", [], "any", false, false, false, 135);
            // line 136
            echo "                    ";
        } else {
            // line 137
            echo "                        ";
            $context["clasificado"] = 0;
            // line 138
            echo "                    ";
        }
        // line 139
        echo "
                    ";
        // line 140
        if ((1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 140), 1) && 0 !== twig_compare(($context["pagina"] ?? null), "televisados"))) {
            // line 141
            echo "
                        ";
            // line 142
            $context["colorTexto"] = "white";
            // line 143
            echo "
                        ";
            // line 144
            if (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "comentario", [], "any", false, false, false, 144)) {
                // line 145
                echo "                            ";
                $context["t"] = twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "comentario", [], "any", false, false, false, 145), "-");
                // line 146
                echo "
                            ";
                // line 147
                if ((twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 3, [], "any", true, true, false, 147) &&  !(null === twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 3, [], "any", false, false, false, 147)))) {
                    // line 148
                    echo "                                ";
                    $context["ev"] = twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 3, [], "any", false, false, false, 148);
                    // line 149
                    echo "                            ";
                }
                // line 150
                echo "
                            ";
                // line 151
                if (((isset($context["t"]) || array_key_exists("t", $context)) &&  !(null === ($context["t"] ?? null)))) {
                    // line 152
                    echo "
                                ";
                    // line 153
                    $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#f07474"]);
                    // line 154
                    echo "
                                ";
                    // line 155
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 155), 1)) {
                        // line 156
                        echo "                                    ";
                        $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#f07474"]);
                        // line 157
                        echo "                                ";
                    }
                    // line 158
                    echo "
                                ";
                    // line 159
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 159), 2)) {
                        // line 160
                        echo "                                    ";
                        $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#7cc002"]);
                        // line 161
                        echo "                                ";
                    }
                    // line 162
                    echo "
                                ";
                    // line 163
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 163), 3)) {
                        // line 164
                        echo "                                    ";
                        $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#610B0B"]);
                        // line 165
                        echo "                                ";
                    }
                    // line 166
                    echo "
                                ";
                    // line 167
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 167), 4)) {
                        // line 168
                        echo "                                    ";
                        $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#0B3B0B"]);
                        // line 169
                        echo "                                ";
                    }
                    // line 170
                    echo "
                                ";
                    // line 171
                    $context["parte"] = "";
                    // line 172
                    echo "
                                ";
                    // line 173
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 173), 1)) {
                        // line 174
                        echo "                                    ";
                        $context["parte"] = "1T - ";
                        // line 175
                        echo "                                ";
                    } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 175), 2)) {
                        // line 176
                        echo "                                    ";
                        $context["parte"] = "2T - ";
                        // line 177
                        echo "                                ";
                    }
                    // line 178
                    echo "
                                ";
                    // line 179
                    $context["t"] = twig_array_merge(($context["t"] ?? null), ["tiempo" => ("Minuto " . twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 1, [], "any", false, false, false, 179))]);
                    // line 180
                    echo "

                                ";
                    // line 182
                    if ((twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 2, [], "any", true, true, false, 182) && 1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 2, [], "any", false, false, false, 182), 0))) {
                        // line 183
                        echo "                                    ";
                        $context["t"] = twig_array_merge(($context["t"] ?? null), ["tiempo" => ((twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), "tiempo", [], "any", false, false, false, 183) . " + ") . twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 2, [], "any", false, false, false, 183))]);
                        // line 184
                        echo "                                ";
                    }
                    // line 185
                    echo "
                                ";
                    // line 186
                    $context["t"] = twig_array_merge(($context["t"] ?? null), ["tiempo" => (($context["parte"] ?? null) . twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), "tiempo", [], "any", false, false, false, 186))]);
                    // line 187
                    echo "
                            ";
                }
                // line 189
                echo "

                            ";
                // line 191
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 191), 6)) {
                    // line 192
                    echo "                                ";
                    $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#ffe400", "tiempo" => "Descanso"]);
                    // line 198
                    echo "
                                ";
                    // line 199
                    $context["colorTexto"] = "maroon";
                    // line 200
                    echo "
                            ";
                } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,                 // line 201
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 201), 7)) {
                    // line 202
                    echo "
                                ";
                    // line 203
                    $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#2E2E2E", "tiempo" => "Penaltis"]);
                    // line 209
                    echo "
                            ";
                } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,                 // line 210
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 210), 8)) {
                    // line 211
                    echo "
                                ";
                    // line 212
                    $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "blue", "tiempo" => "Prórroga"]);
                    // line 218
                    echo "
                            ";
                }
                // line 220
                echo "
                        ";
            }
            // line 222
            echo "

                    ";
        }
        // line 225
        echo "
                    ";
        // line 226
        if ((isset($context["t"]) || array_key_exists("t", $context))) {
            // line 227
            echo "                        <div class=\"infopwhitebox\">

                            ";
            // line 229
            if ((twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "categoria_torneo_id", [], "any", true, true, false, 229) && 0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "categoria_torneo_id", [], "any", false, false, false, 229), 17))) {
                // line 230
                echo "
                                ";
                // line 231
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 231), 2)) {
                    // line 232
                    echo "                                    ";
                    $context["t"] = twig_array_merge(($context["t"] ?? null), ["tiempo" => "2ª parte"]);
                    // line 237
                    echo "                                ";
                }
                // line 238
                echo "
                                ";
                // line 239
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 239), 1)) {
                    // line 240
                    echo "                                    ";
                    $context["t"] = twig_array_merge(($context["t"] ?? null), ["tiempo" => "1ª parte"]);
                    // line 245
                    echo "                                ";
                }
                // line 246
                echo "
                            ";
            }
            // line 248
            echo "
                            ";
            // line 256
            echo "
                            ";
            // line 257
            if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 257), 6)) {
                // line 258
                echo "
                                ";
                // line 260
                echo "                                <p class=\"timeresult mb-0\" style=\" color: orange !important\">Descanso</p>

                            ";
            } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 262
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 262), 7)) {
                // line 263
                echo "
                                ";
                // line 265
                echo "
                                <p class=\"timeresult mb-0\" style=\"color: #E81346;\">Penaltis</p>


                            ";
            } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 269
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 269), 8)) {
                // line 270
                echo "
                                ";
                // line 272
                echo "                                <p class=\"timeresult mb-0\" style=\"color: dodgerblue;\">Prórroga</p>

                            ";
            } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 274
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 274), 9)) {
                // line 275
                echo "
                                <p class=\"timeresult mb-0\" style=\"color: #9EFF23;\">";
                // line 276
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), "tiempo", [], "any", false, false, false, 276), "html", null, true);
                echo "</p>

                            ";
            } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 278
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 278), 10)) {
                // line 279
                echo "
                                <p class=\"timeresult mb-0\" style=\"color: #9EFF23;\">";
                // line 280
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), "tiempo", [], "any", false, false, false, 280), "html", null, true);
                echo "</p>

                            ";
            } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 282
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 282), 11)) {
                // line 283
                echo "
                                ";
                // line 285
                echo "                                <p class=\"timeresult mb-0\" style=\"color: orange;\">Desc.Prórr.</p>

                            ";
            } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 287
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 287), 2)) {
                // line 288
                echo "
                                <p class=\"timeresult mb-0\" style=\"color: #9EFF23 !important;\">";
                // line 289
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), "tiempo", [], "any", false, false, false, 289), "html", null, true);
                echo "</p>

                            ";
            }
            // line 292
            echo "                        </div>
                    ";
        }
        // line 294
        echo "                </div>

                <div class=\"contenedorIconosPartido col-lg-3 col-5 nopadding h25 jorge-jorge\">

                    ";
        // line 298
        echo twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "txtTV", [], "any", false, false, false, 298);
        echo "

                    ";
        // line 300
        if (((1 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "tvs", [], "any", false, false, false, 300), 0, [], "any", false, false, false, 300), 0) && 0 !== twig_compare(1, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 300))) && 0 !== twig_compare(($context["pagina"] ?? null), "televisados"))) {
            // line 301
            echo "                        <a href=\"/partidos-televisados#tv-";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 301), "html", null, true);
            echo "\" title=\"partido televisado\" class=\"d-inline-block\">
                            ";
            // line 302
            if (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "enJuego", [], "any", false, false, false, 302)) {
                // line 303
                echo "                                <img src=\"/static/img/icono-partidos-televisados-blanco.svg\" alt=\"partido televisado\" width=\"35\" class=\"p-2\">
                            ";
            } else {
                // line 305
                echo "                                <img src=\"/static/img/icono-partidos-televisados.svg\" alt=\"partido televisado\" width=\"35\">
                            ";
            }
            // line 307
            echo "                        </a>
                    ";
        }
        // line 309
        echo "
                    ";
        // line 310
        echo ($context["icono"] ?? null);
        echo "

\t\t\t\t\t\t
\t\t\t\t\t
                    \t\t<img class=\"span-id-torneo-alineacion filaPartidoImg\" attr-id-evento=\"";
        // line 314
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "betsapi", [], "any", false, false, false, 314), "html", null, true);
        echo "\" src=\"/static/img/icon-alienacion-white.svg\" alt=\"Partidos alineaciones\" style=\"cursor: pointer;\" attr-test=\"";
        echo twig_escape_filter($this->env, ($context["partido"] ?? null), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t

                    \t\t<img class=\"span-evento-trigger img-fluid d-custom d-inline-block filaPartidoImg\" attr-id-evento=\"";
        // line 317
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "betsapi", [], "any", false, false, false, 317), "html", null, true);
        echo "\" src=\"/static/img/balon-eventos.png\" alt=\"Partidos eventos\" style=\"cursor: pointer;\">
\t\t\t\t\t\t
\t\t\t\t\t\t

                    <a class=\"simboloMasPartido jorge-clase\" href=\"javascript:mostrarColor(";
        // line 321
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 321), "html", null, true);
        echo ");\" class=\"d-inline-block\">
                        ";
        // line 322
        if (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "enJuego", [], "any", false, false, false, 322)) {
            // line 323
            echo "                            <img src=\"/static/img/simbolo-mas-blanco.svg\" title=\"Partido entre ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "local", [], "any", false, false, false, 323), "html", null, true);
            echo " y ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitante", [], "any", false, false, false, 323), "html", null, true);
            echo "\" alt=\"Partido entre ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "local", [], "any", false, false, false, 323), "html", null, true);
            echo " y ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitante", [], "any", false, false, false, 323), "html", null, true);
            echo "\" class=\"p-2\">
                        ";
        } else {
            // line 325
            echo "                            <img src=\"/static/img/simbolo-mas.svg\" title=\"Partido entre ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "local", [], "any", false, false, false, 325), "html", null, true);
            echo " y ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitante", [], "any", false, false, false, 325), "html", null, true);
            echo "\" alt=\"Partido entre ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "local", [], "any", false, false, false, 325), "html", null, true);
            echo " y ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitante", [], "any", false, false, false, 325), "html", null, true);
            echo "\" class=\"p-2\">
                        ";
        }
        // line 327
        echo "                    </a>

                    <div class=\"d-none content-eventos de-fila-partido\" >
                        <div class=\"d-flex align-items-center justify-content-between w-100\">
                            <h3 class=\"d-block\">Eventos</h3>
                            <span class=\"cerrar-eventos display-4\" style=\"cursor: pointer;\">&times;</span>
                        </div>
                        <ul class=\"list-group lista-eventos text-left\"></ul>
                    </div>
                    

                    <div class=\"d-none content-alineaciones\">
                        <div class=\"d-flex align-items-center justify-content-between w-100\">
                            <h3 class=\"d-block\">Alineaciones</h3>
                            <span class=\"cerrar-alineacion display-4\" style=\"cursor: pointer;\">&times;</span>
                        </div>
                        <div class=\"align-items-start flex-wrap d-flex\">
                            <div class=\"left-content-alin pr-lg-3 w-50 text-left\">
                                <h4 class=\"title-alineacion title-alineacion-locales\">Local</h4>
                                <ul class=\"list-unstyled listado-locales\"></ul>
                            </div>
                            <div class=\"rigth-content-alin w-50 text-left\">
                                <h4 class=\"title-alineacion title-alineacion-visitantes\">Visitante</h4>
                                <ul class=\"list-unstyled listado-visitantes\"></ul>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div style=\"clear: both;\"></div>

        ";
        // line 366
        echo "
        <div class=\"col-12\">
            <div class=\"row\">

            <div class=\"col-5 equipoPartido equipoPartidoLocal\">
                
                <p onclick=\"mostrarColor(";
        // line 372
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 372), "html", null, true);
        echo ")\">
                    <span itemprop=\"name\" style=\"";
        // line 373
        if (0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "colorL", [], "any", false, false, false, 373), "")) {
            echo "color: ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "colorL", [], "any", false, false, false, 373), "html", null, true);
            echo ";";
        }
        echo "\"><span class=\"d-block d-sm-none\" style=\"";
        if (0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "colorL", [], "any", false, false, false, 373), "")) {
            echo "color: ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "colorL", [], "any", false, false, false, 373), "html", null, true);
            echo ";";
        }
        echo "\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "localCorto", [], "any", false, false, false, 373), "html", null, true);
        echo "</span><span class=\"d-none d-sm-block\" style=\"";
        if (0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "colorL", [], "any", false, false, false, 373), "")) {
            echo "color: ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "colorL", [], "any", false, false, false, 373), "html", null, true);
            echo ";";
        }
        echo "\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "local", [], "any", false, false, false, 373), "html", null, true);
        echo "</span></span>
                </p>                
            </div>

            <div class=\"col-2 resultadoPartido\">
                ";
        // line 378
        if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 378), 1)) {
            // line 379
            echo "                    <span>
                        ";
            // line 380
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "goles_local", [], "any", false, false, false, 380), "html", null, true);
            echo "
                    </span>

                    -

                    <span>
                        ";
            // line 386
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "goles_visitante", [], "any", false, false, false, 386), "html", null, true);
            echo "
                    </span>
                ";
        }
        // line 389
        echo "
                ";
        // line 390
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 390), 2) || 1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 390), 5))) {
            // line 391
            echo "

                <span class=\"
                    ";
            // line 394
            if (0 === twig_compare(($context["ev"] ?? null), 5)) {
                // line 395
                echo "                        parpadea
                    ";
            }
            // line 397
            echo "                \">
                    ";
            // line 398
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "goles_local", [], "any", false, false, false, 398), "html", null, true);
            echo "
                </span>

                -

                <span class=\"
                    ";
            // line 404
            if (0 === twig_compare(($context["ev"] ?? null), 6)) {
                // line 405
                echo "                        parpadea
                    ";
            }
            // line 407
            echo "                \">
                    ";
            // line 408
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "goles_visitante", [], "any", false, false, false, 408), "html", null, true);
            echo "
                </span>

                ";
        }
        // line 412
        echo "
                ";
        // line 413
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 413), 0) || (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 413), 2) && -1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 413), 6)))) {
            // line 414
            echo "                <div>
                    ";
            // line 415
            if ((0 === twig_compare(($context["pagina"] ?? null), "index") && (isset($context["temporada_id"]) || array_key_exists("temporada_id", $context)))) {
                // line 416
                echo "                        <span class=\"text-center boldfont\" style=\"font-size:12px\">
                            ";
                // line 417
                echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "fecha", [], "any", false, false, false, 417),  -2, null), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "fecha", [], "any", false, false, false, 417), 5, 2), "html", null, true);
                echo "
                        </span>
                    <br/>
                    ";
            }
            // line 421
            echo "
                    ";
            // line 422
            if (((isset($context["tipoTorneo"]) || array_key_exists("tipoTorneo", $context)) && 0 === twig_compare(($context["tipoTorneo"] ?? null), 4))) {
                // line 423
                echo "                    <span class=\"text-center boldfont\" style=\"font-size:12px;\">
                        ";
                // line 424
                echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "fecha", [], "any", false, false, false, 424),  -2, null), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "fecha", [], "any", false, false, false, 424), 5, 2), "html", null, true);
                echo "
                    </span>
                    ";
            }
            // line 427
            echo "
                    <div class=\"horaPartido\">
                        ";
            // line 429
            if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 429), 3)) {
                // line 430
                echo "                            <span class=\"suspendido\">Susp.</span>
                        ";
            } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 431
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 431), 4)) {
                // line 432
                echo "                            <span class=\"aplazado\">Aplaz.</span>
                        ";
            } else {
                // line 434
                echo "
                            ";
                // line 435
                if (0 === twig_compare(twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "hora_prevista", [], "any", false, false, false, 435),  -2, null), 11)) {
                    // line 436
                    echo "                                ";
                    $context["hora"] = ":";
                    // line 437
                    echo "                            ";
                } else {
                    // line 438
                    echo "                                ";
                    $context["hora"] = twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "hora_prevista", [], "any", false, false, false, 438), 0, 5);
                    // line 439
                    echo "                            ";
                }
                // line 440
                echo "
                            ";
                // line 441
                echo twig_escape_filter($this->env, ($context["hora"] ?? null), "html", null, true);
                echo "

                        ";
            }
            // line 444
            echo "                    </div>

                </div>
                ";
        }
        // line 448
        echo "            </div>

            <div class=\"col-5 equipoPartido equipoPartidoVisitante\">
                
                
                <p onclick=\"mostrarColor(";
        // line 453
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 453), "html", null, true);
        echo ")\">
                    <span itemprop=\"name\" class=\"txt11\" style=\"";
        // line 454
        if (0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "colorV", [], "any", false, false, false, 454), "")) {
            echo "color: ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "colorV", [], "any", false, false, false, 454), "html", null, true);
            echo ";";
        }
        echo "\"><span class=\"d-block d-sm-none\" style=\"";
        if (0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "colorV", [], "any", false, false, false, 454), "")) {
            echo "color: ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "colorV", [], "any", false, false, false, 454), "html", null, true);
            echo ";";
        }
        echo "\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitanteCorto", [], "any", false, false, false, 454), "html", null, true);
        echo "</span><span class=\"d-none d-sm-block\" style=\"";
        if (0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "colorV", [], "any", false, false, false, 454), "")) {
            echo "color: ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "colorV", [], "any", false, false, false, 454), "html", null, true);
            echo ";";
        }
        echo "\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitante", [], "any", false, false, false, 454), "html", null, true);
        echo "</span></span>
                </p>                
            </div>

        </div>
        </div>


        ";
        // line 462
        if ((0 === twig_compare(($context["desfasado"] ?? null), 1) && 0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "fecha", [], "any", false, false, false, 462), "1970-01-01"))) {
            // line 463
            echo "            <div id=\"resultado-";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 463), "html", null, true);
            echo "\">
                <table style=\"width: 100%; background-color: orange\">
                    <form method=\"post\" onsubmit=\"submitEnviarResultado(event, \$(this).serialize(), ";
            // line 465
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 465), "html", null, true);
            echo ")\">

                        <input type=\"hidden\" name=\"usuario\" value=\"<?php echo \$_COOKIE['futbolme_2018']??'000000';?>\">
                        <input type=\"hidden\" name=\"partido_id\" value=\"";
            // line 468
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 468), "html", null, true);
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
        // line 479
        echo "
        ";
        // line 484
        echo "
        ";
        // line 485
        if ((twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "ida", [], "any", true, true, false, 485) && 0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "jornada", [], "any", false, false, false, 485), 95))) {
            // line 486
            echo "            <div class=\"col-12\">
                ";
            // line 487
            if (-1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 487), 2)) {
                // line 488
                echo "
                    <p class=\"textoIda\">

                ";
            } else {
                // line 492
                echo "                    
                    <p class=\"textoIda\" style=\"color:white\">

                ";
            }
            // line 496
            echo "
                    ";
            // line 497
            $context["ida"] = twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "ida", [], "any", false, false, false, 497), ",");
            // line 498
            echo "
                    ";
            // line 499
            $context["ida_resulcasa"] = twig_get_attribute($this->env, $this->source, ($context["ida"] ?? null), 0, [], "any", false, false, false, 499);
            // line 500
            echo "                    ";
            $context["ida_resulfuera"] = twig_get_attribute($this->env, $this->source, ($context["ida"] ?? null), 1, [], "any", false, false, false, 500);
            // line 501
            echo "                    ";
            $context["ida_jornada"] = twig_get_attribute($this->env, $this->source, ($context["ida"] ?? null), 2, [], "any", false, false, false, 501);
            // line 502
            echo "                    ";
            $context["ida_fecha"] = twig_get_attribute($this->env, $this->source, ($context["ida"] ?? null), 3, [], "any", false, false, false, 502);
            // line 503
            echo "
                    ";
            // line 504
            if ( !twig_get_attribute($this->env, $this->source, ($context["ida"] ?? null), 5, [], "any", true, true, false, 504)) {
                // line 505
                echo "                        ";
                $context["ida"] = twig_array_merge(($context["ida"] ?? null), [5 => 1]);
                // line 506
                echo "                    ";
            }
            // line 507
            echo "
                    ";
            // line 508
            $context["ida_tipo"] = twig_get_attribute($this->env, $this->source, ($context["ida"] ?? null), 5, [], "any", false, false, false, 508);
            // line 509
            echo "
                    ";
            // line 510
            if (0 === twig_compare(($context["ida_tipo"] ?? null), 2)) {
                // line 511
                echo "
                        ";
                // line 512
                if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "fecha", [], "any", false, false, false, 512), ($context["ida_fecha"] ?? null))) {
                    // line 513
                    echo "                            ";
                    $context["txtFecha"] = "IDA";
                    // line 514
                    echo "                        ";
                } else {
                    // line 515
                    echo "                            ";
                    $context["txtFecha"] = "VUELTA";
                    // line 516
                    echo "                        ";
                }
                // line 517
                echo "
                        ";
                // line 518
                echo twig_escape_filter($this->env, ($context["txtFecha"] ?? null), "html", null, true);
                echo "

                        ";
                // line 520
                echo twig_escape_filter($this->env, ($context["ida_resulfuera"] ?? null), "html", null, true);
                echo " - ";
                echo twig_escape_filter($this->env, ($context["ida_resulcasa"] ?? null), "html", null, true);
                echo "

                        ";
                // line 522
                if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 522), 0)) {
                    // line 523
                    echo "                            ";
                    $context["global_casa"] = (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "goles_local", [], "any", false, false, false, 523) + ($context["ida_resulfuera"] ?? null));
                    // line 524
                    echo "                            ";
                    $context["global_fuera"] = (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "goles_visitante", [], "any", false, false, false, 524) + ($context["ida_resulcasa"] ?? null));
                    // line 525
                    echo "                            | GLOBAL ";
                    echo twig_escape_filter($this->env, ($context["global_casa"] ?? null), "html", null, true);
                    echo " - ";
                    echo twig_escape_filter($this->env, ($context["global_fuera"] ?? null), "html", null, true);
                    echo "
                        ";
                }
                // line 527
                echo "
                    ";
            }
            // line 529
            echo "                </p>
            </div>
            <div class=\"clear\"></div>
        ";
        }
        // line 533
        echo "
        ";
        // line 534
        if (((twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "twLocal", [], "any", true, true, false, 534) && 1 === twig_compare(twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "twLocal", [], "any", false, false, false, 534)), 3)) || (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "twVisitante", [], "any", true, true, false, 534) && 1 === twig_compare(twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "twVisitante", [], "any", false, false, false, 534)), 3)))) {
            // line 535
            echo "            <div id=\"log-tw-";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 535), "html", null, true);
            echo "\" class=\"hide\"></div>
        ";
        }
        // line 537
        echo "
        ";
        // line 546
        echo "
        ";
        // line 547
        $context["cadenaGoles"] = 0;
        // line 548
        echo "
        ";
        // line 550
        echo "
        ";
        // line 551
        if ((twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "observaciones", [], "any", true, true, false, 551) && 1 === twig_compare(twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "observaciones", [], "any", false, false, false, 551)), 5))) {
            // line 552
            echo "
            <div class=\"col-12 nopadding\">

                ";
            // line 555
            $context["cadena"] = call_user_func_array($this->env->getFunction('desglosarTexto')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "observaciones", [], "any", false, false, false, 555)]);
            // line 556
            echo "
                ";
            // line 557
            if (twig_get_attribute($this->env, $this->source, ($context["cadena"] ?? null), 1, [], "any", true, true, false, 557)) {
                // line 558
                echo "                    ";
                $context["cadenaGoles"] = twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["cadena"] ?? null), 1, [], "any", false, false, false, 558));
                // line 559
                echo "                ";
            }
            // line 560
            echo "
                ";
            // line 561
            if (twig_get_attribute($this->env, $this->source, ($context["cadena"] ?? null), 2, [], "any", true, true, false, 561)) {
                // line 562
                echo "                    ";
                $context["cadenaGoles"] = (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["cadena"] ?? null), 2, [], "any", false, false, false, 562)) + ($context["cadenaGoles"] ?? null));
                // line 563
                echo "                ";
            }
            // line 564
            echo "
                ";
            // line 565
            $this->loadTemplate("index/__part/partidosObservaciones.html.twig", "index/__part/filaPartido.html.twig", 565)->display($context);
            // line 566
            echo "
            </div>
            <div class=\"clear\" style=\"height: 5px !important;\"></div>

        ";
        }
        // line 571
        echo "
        <div id=\"posicion";
        // line 572
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 572), "html", null, true);
        echo "\" style=\"display: none;\">
            <div class=\"enlacesDeInteres\" style=\"padding: 0px 10px\">
                <span class=\"float-right\" onclick=\"mostrarColor(";
        // line 574
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 574), "html", null, true);
        echo ")\" style=\"cursor:pointer;\">Cerrar enlaces</span>
                <br />
                <h4>ENLACES DE INTERES</h4>

                <div class=\"row\">

                    <div class=\"enlacesDeInteresColumnaCampeonato col-4\">
                        ";
        // line 581
        if (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "temporada_id", [], "any", true, true, false, 581)) {
            // line 582
            echo "                            <h5><a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "enlace_torneo", [], "any", false, false, false, 582), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "nombreTorneo", [], "any", false, false, false, 582), "html", null, true);
            echo "</a></h5>

                            ";
            // line 584
            $context["partido"] = twig_array_merge(($context["partido"] ?? null), ["temporada_id" => ($context["temporada_id"] ?? null)]);
            // line 585
            echo "
                        ";
        }
        // line 587
        echo "
                        <a href=\"";
        // line 588
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "pgPartido", [], "any", false, false, false, 588), "html", null, true);
        echo "\">Ir al partido</a><br />
                        <a href=\"";
        // line 589
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "pgPartido", [], "any", false, false, false, 589), "html", null, true);
        echo "/enfrentamientos\">
                            Ver enfrentamientos
                        </a>

                    </div>

                    <div class=\"enlacesDeInteresColumnaEquipo col-4\">

                        ";
        // line 597
        if (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "pgLocal", [], "any", true, true, false, 597)) {
            // line 598
            echo "                            ";
            $context["pgLocal"] = twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "pgLocal", [], "any", false, false, false, 598);
            // line 599
            echo "                        ";
        } else {
            // line 600
            echo "                            ";
            $context["pgLocal"] = $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_datos", ["idEquipo" => twig_get_attribute($this->env, $this->source,             // line 601
($context["partido"] ?? null), "equipoLocal_id", [], "any", false, false, false, 601), "slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,             // line 602
($context["partido"] ?? null), "local", [], "any", false, false, false, 602)])]);
            // line 604
            echo "                        ";
        }
        // line 605
        echo "
                        <h6>";
        // line 606
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "localCorto", [], "any", false, false, false, 606), "html", null, true);
        echo "</h6>
                        <a href=\"";
        // line 607
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_calendario", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,         // line 608
($context["partido"] ?? null), "local", [], "any", false, false, false, 608)]), "idEquipo" => twig_get_attribute($this->env, $this->source,         // line 609
($context["partido"] ?? null), "equipoLocal_id", [], "any", false, false, false, 609)]), "html", null, true);
        // line 610
        echo "\">Calendario</a><br />

                        <a href=\"";
        // line 612
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_clasificacion", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,         // line 613
($context["partido"] ?? null), "local", [], "any", false, false, false, 613)]), "idEquipo" => twig_get_attribute($this->env, $this->source,         // line 614
($context["partido"] ?? null), "equipoLocal_id", [], "any", false, false, false, 614)]), "html", null, true);
        // line 615
        echo "\">Clasificación</a><br />

                        ";
        // line 617
        if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "idPais", [], "any", false, false, false, 617), 60)) {
            // line 618
            echo "                            ";
            if ((-1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "division", [], "any", false, false, false, 618), 6) || 0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "temporada_id", [], "any", false, false, false, 618), 214))) {
                // line 619
                echo "
                                <a style=\"font-weight: bold;\" href=\"";
                // line 620
                echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_plantilla", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,                 // line 621
($context["partido"] ?? null), "local", [], "any", false, false, false, 621)]), "idEquipo" => twig_get_attribute($this->env, $this->source,                 // line 622
($context["partido"] ?? null), "equipoLocal_id", [], "any", false, false, false, 622)]), "html", null, true);
                // line 623
                echo "\">Plantilla</a><br />

                            ";
            }
            // line 626
            echo "
                            <a href=\"";
            // line 627
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_datos", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,             // line 628
($context["partido"] ?? null), "local", [], "any", false, false, false, 628)]), "idEquipo" => twig_get_attribute($this->env, $this->source,             // line 629
($context["partido"] ?? null), "equipoLocal_id", [], "any", false, false, false, 629)]), "html", null, true);
            // line 630
            echo "\">Datos del club</a><br />

                            <a href=\"";
            // line 632
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_equipos", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,             // line 633
($context["partido"] ?? null), "local", [], "any", false, false, false, 633)]), "idEquipo" => twig_get_attribute($this->env, $this->source,             // line 634
($context["partido"] ?? null), "equipoLocal_id", [], "any", false, false, false, 634)]), "html", null, true);
            // line 635
            echo "\">Equipos del club</a><br />


                            ";
            // line 648
            echo "
                        ";
        }
        // line 650
        echo "
                        ";
        // line 654
        echo "
                    </div>


                    <div class=\"enlacesDeInteresColumnaEquipo col-4\">

                        ";
        // line 660
        if (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "pgVisitante", [], "any", true, true, false, 660)) {
            // line 661
            echo "                            ";
            $context["pgVisitante"] = twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "pgVisitante", [], "any", false, false, false, 661);
            // line 662
            echo "                        ";
        } else {
            // line 663
            echo "                            ";
            $context["pgVisitante"] = $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_datos", ["idEquipo" => twig_get_attribute($this->env, $this->source,             // line 664
($context["partido"] ?? null), "equipoVisitante_id", [], "any", false, false, false, 664), "slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,             // line 665
($context["partido"] ?? null), "visitante", [], "any", false, false, false, 665)])]);
            // line 667
            echo "                        ";
        }
        // line 668
        echo "
                        <h6>";
        // line 669
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitanteCorto", [], "any", false, false, false, 669), "html", null, true);
        echo "</h6>
                        <a href=\"";
        // line 670
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_calendario", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,         // line 671
($context["partido"] ?? null), "visitante", [], "any", false, false, false, 671)]), "idEquipo" => twig_get_attribute($this->env, $this->source,         // line 672
($context["partido"] ?? null), "equipoVisitante_id", [], "any", false, false, false, 672)]), "html", null, true);
        // line 673
        echo "\">Calendario</a><br />
                        <a href=\"";
        // line 674
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_clasificacion", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,         // line 675
($context["partido"] ?? null), "visitante", [], "any", false, false, false, 675)]), "idEquipo" => twig_get_attribute($this->env, $this->source,         // line 676
($context["partido"] ?? null), "equipoVisitante_id", [], "any", false, false, false, 676)]), "html", null, true);
        // line 677
        echo "\">Clasificación</a><br />

                        ";
        // line 679
        if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "idPais", [], "any", false, false, false, 679), 60)) {
            // line 680
            echo "
                            ";
            // line 681
            if ((-1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "division", [], "any", false, false, false, 681), 6) || 0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "temporada_id", [], "any", false, false, false, 681), 214))) {
                // line 682
                echo "
                                <a style=\"font-weight: bold;\" href=\"";
                // line 683
                echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_plantilla", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,                 // line 684
($context["partido"] ?? null), "visitante", [], "any", false, false, false, 684)]), "idEquipo" => twig_get_attribute($this->env, $this->source,                 // line 685
($context["partido"] ?? null), "equipoVisitante_id", [], "any", false, false, false, 685)]), "html", null, true);
                // line 686
                echo "\">Plantilla</a><br />

                            ";
            }
            // line 689
            echo "
                            <a href=\"";
            // line 690
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_datos", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,             // line 691
($context["partido"] ?? null), "visitante", [], "any", false, false, false, 691)]), "idEquipo" => twig_get_attribute($this->env, $this->source,             // line 692
($context["partido"] ?? null), "equipoVisitante_id", [], "any", false, false, false, 692)]), "html", null, true);
            // line 693
            echo "\">Datos del club</a><br />
                            <a href=\"";
            // line 694
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_equipos", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,             // line 695
($context["partido"] ?? null), "visitante", [], "any", false, false, false, 695)]), "idEquipo" => twig_get_attribute($this->env, $this->source,             // line 696
($context["partido"] ?? null), "equipoVisitante_id", [], "any", false, false, false, 696)]), "html", null, true);
            // line 697
            echo "\">Equipos del club</a><br />

                            ";
            // line 708
            echo "
                            ";
            // line 712
            echo "
                        ";
        }
        // line 714
        echo "
                    </div>

                </div>


                <div class=\"clear\"></div>
            </div>
        </div>

        <div id=\"alineaciones-";
        // line 724
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 724), "html", null, true);
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
        return array (  1461 => 724,  1449 => 714,  1445 => 712,  1442 => 708,  1438 => 697,  1436 => 696,  1435 => 695,  1434 => 694,  1431 => 693,  1429 => 692,  1428 => 691,  1427 => 690,  1424 => 689,  1419 => 686,  1417 => 685,  1416 => 684,  1415 => 683,  1412 => 682,  1410 => 681,  1407 => 680,  1405 => 679,  1401 => 677,  1399 => 676,  1398 => 675,  1397 => 674,  1394 => 673,  1392 => 672,  1391 => 671,  1390 => 670,  1386 => 669,  1383 => 668,  1380 => 667,  1378 => 665,  1377 => 664,  1375 => 663,  1372 => 662,  1369 => 661,  1367 => 660,  1359 => 654,  1356 => 650,  1352 => 648,  1347 => 635,  1345 => 634,  1344 => 633,  1343 => 632,  1339 => 630,  1337 => 629,  1336 => 628,  1335 => 627,  1332 => 626,  1327 => 623,  1325 => 622,  1324 => 621,  1323 => 620,  1320 => 619,  1317 => 618,  1315 => 617,  1311 => 615,  1309 => 614,  1308 => 613,  1307 => 612,  1303 => 610,  1301 => 609,  1300 => 608,  1299 => 607,  1295 => 606,  1292 => 605,  1289 => 604,  1287 => 602,  1286 => 601,  1284 => 600,  1281 => 599,  1278 => 598,  1276 => 597,  1265 => 589,  1261 => 588,  1258 => 587,  1254 => 585,  1252 => 584,  1244 => 582,  1242 => 581,  1232 => 574,  1227 => 572,  1224 => 571,  1217 => 566,  1215 => 565,  1212 => 564,  1209 => 563,  1206 => 562,  1204 => 561,  1201 => 560,  1198 => 559,  1195 => 558,  1193 => 557,  1190 => 556,  1188 => 555,  1183 => 552,  1181 => 551,  1178 => 550,  1175 => 548,  1173 => 547,  1170 => 546,  1167 => 537,  1161 => 535,  1159 => 534,  1156 => 533,  1150 => 529,  1146 => 527,  1138 => 525,  1135 => 524,  1132 => 523,  1130 => 522,  1123 => 520,  1118 => 518,  1115 => 517,  1112 => 516,  1109 => 515,  1106 => 514,  1103 => 513,  1101 => 512,  1098 => 511,  1096 => 510,  1093 => 509,  1091 => 508,  1088 => 507,  1085 => 506,  1082 => 505,  1080 => 504,  1077 => 503,  1074 => 502,  1071 => 501,  1068 => 500,  1066 => 499,  1063 => 498,  1061 => 497,  1058 => 496,  1052 => 492,  1046 => 488,  1044 => 487,  1041 => 486,  1039 => 485,  1036 => 484,  1033 => 479,  1019 => 468,  1013 => 465,  1007 => 463,  1005 => 462,  974 => 454,  970 => 453,  963 => 448,  957 => 444,  951 => 441,  948 => 440,  945 => 439,  942 => 438,  939 => 437,  936 => 436,  934 => 435,  931 => 434,  927 => 432,  925 => 431,  922 => 430,  920 => 429,  916 => 427,  908 => 424,  905 => 423,  903 => 422,  900 => 421,  891 => 417,  888 => 416,  886 => 415,  883 => 414,  881 => 413,  878 => 412,  871 => 408,  868 => 407,  864 => 405,  862 => 404,  853 => 398,  850 => 397,  846 => 395,  844 => 394,  839 => 391,  837 => 390,  834 => 389,  828 => 386,  819 => 380,  816 => 379,  814 => 378,  786 => 373,  782 => 372,  774 => 366,  736 => 327,  724 => 325,  712 => 323,  710 => 322,  706 => 321,  699 => 317,  691 => 314,  684 => 310,  681 => 309,  677 => 307,  673 => 305,  669 => 303,  667 => 302,  662 => 301,  660 => 300,  655 => 298,  649 => 294,  645 => 292,  639 => 289,  636 => 288,  634 => 287,  630 => 285,  627 => 283,  625 => 282,  620 => 280,  617 => 279,  615 => 278,  610 => 276,  607 => 275,  605 => 274,  601 => 272,  598 => 270,  596 => 269,  590 => 265,  587 => 263,  585 => 262,  581 => 260,  578 => 258,  576 => 257,  573 => 256,  570 => 248,  566 => 246,  563 => 245,  560 => 240,  558 => 239,  555 => 238,  552 => 237,  549 => 232,  547 => 231,  544 => 230,  542 => 229,  538 => 227,  536 => 226,  533 => 225,  528 => 222,  524 => 220,  520 => 218,  518 => 212,  515 => 211,  513 => 210,  510 => 209,  508 => 203,  505 => 202,  503 => 201,  500 => 200,  498 => 199,  495 => 198,  492 => 192,  490 => 191,  486 => 189,  482 => 187,  480 => 186,  477 => 185,  474 => 184,  471 => 183,  469 => 182,  465 => 180,  463 => 179,  460 => 178,  457 => 177,  454 => 176,  451 => 175,  448 => 174,  446 => 173,  443 => 172,  441 => 171,  438 => 170,  435 => 169,  432 => 168,  430 => 167,  427 => 166,  424 => 165,  421 => 164,  419 => 163,  416 => 162,  413 => 161,  410 => 160,  408 => 159,  405 => 158,  402 => 157,  399 => 156,  397 => 155,  394 => 154,  392 => 153,  389 => 152,  387 => 151,  384 => 150,  381 => 149,  378 => 148,  376 => 147,  373 => 146,  370 => 145,  368 => 144,  365 => 143,  363 => 142,  360 => 141,  358 => 140,  355 => 139,  352 => 138,  349 => 137,  346 => 136,  343 => 135,  341 => 134,  337 => 132,  333 => 130,  329 => 128,  322 => 125,  319 => 124,  316 => 123,  313 => 122,  311 => 121,  308 => 120,  305 => 119,  302 => 118,  300 => 117,  297 => 116,  294 => 115,  291 => 114,  289 => 113,  286 => 112,  283 => 111,  280 => 110,  278 => 109,  275 => 108,  272 => 107,  269 => 106,  267 => 105,  264 => 104,  261 => 103,  257 => 101,  255 => 100,  252 => 99,  249 => 98,  247 => 97,  244 => 96,  241 => 95,  238 => 94,  235 => 93,  232 => 92,  230 => 91,  226 => 89,  224 => 88,  221 => 87,  218 => 86,  215 => 85,  213 => 84,  211 => 83,  208 => 82,  200 => 79,  197 => 78,  193 => 76,  191 => 74,  190 => 73,  189 => 72,  188 => 71,  186 => 70,  184 => 69,  182 => 68,  179 => 67,  177 => 65,  176 => 64,  175 => 63,  173 => 62,  170 => 60,  168 => 59,  162 => 55,  155 => 52,  152 => 51,  149 => 50,  146 => 49,  143 => 48,  141 => 47,  138 => 46,  136 => 45,  125 => 42,  123 => 41,  120 => 40,  118 => 39,  114 => 37,  108 => 30,  103 => 28,  98 => 27,  96 => 26,  86 => 23,  78 => 22,  71 => 20,  65 => 19,  55 => 15,  51 => 12,  49 => 11,  45 => 4,  43 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "index/__part/filaPartido.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/index/__part/filaPartido.html.twig");
    }
}
