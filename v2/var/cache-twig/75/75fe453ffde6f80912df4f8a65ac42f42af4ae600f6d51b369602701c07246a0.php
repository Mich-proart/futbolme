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
class __TwigTemplate_81d8d612f75a0cc4dc2cb53f38eab7facfe43ab8f871d1d82f03443279c79749 extends Template
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
        <div class=\"col-12 nombreDiaPartido\" style=\"line-height: 30px; clear: both;\">
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
        // line 22
        if (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "enJuego", [], "any", false, false, false, 22)) {
            echo " partidosEnJuego";
        }
        echo " border\">
    <div class=\"cajaPartido row ";
        // line 23
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "colorfondo", [], "any", false, false, false, 23), "html", null, true);
        echo " \" itemscope
         itemtype=\"http://schema.org/SportsEvent\" style=\"padding:5px !important\">

        <meta itemprop=\"name\" content=\"";
        // line 26
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "localCorto", [], "any", false, false, false, 26), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitanteCorto", [], "any", false, false, false, 26), "html", null, true);
        echo "\">
        <meta itemprop=\"description\" content=\"Partido entre ";
        // line 27
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "localCorto", [], "any", false, false, false, 27), "html", null, true);
        echo " y ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitanteCorto", [], "any", false, false, false, 27), "html", null, true);
        echo "\">
        <span itemprop=\"location\" itemscope itemtype=\"http://schema.org/Place\">
            <meta itemprop=\"name\" content=\"";
        // line 29
        if (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estadio_nombre", [], "any", false, false, false, 29)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estadio_nombre", [], "any", false, false, false, 29), "html", null, true);
        } else {
            echo "Campo de fútbol";
        }
        echo "\">
            <meta itemprop=\"address\" content=\"";
        // line 30
        if (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estadio_localidad", [], "any", false, false, false, 30)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estadio_localidad", [], "any", false, false, false, 30), "html", null, true);
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

                        <div class=\"nopadding col-lg-3 col-2 h25 ";
        // line 39
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "colorFondo", [], "any", false, false, false, 39), "html", null, true);
        echo "\">
                            ";
        // line 40
        if (((0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 40), 2) || 0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 40), 6)) || 0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 40), 1))) {
            // line 41
            echo "                                <div class=\"horaPrevistaPartido\">
                                    ";
            // line 42
            if (0 === twig_compare(twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "hora_prevista", [], "any", false, false, false, 42),  -2, null), "11")) {
                // line 43
                echo "                                        ";
                $context["hora"] = ":";
                // line 44
                echo "                                    ";
            } else {
                // line 45
                echo "                                        ";
                $context["hora"] = twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "hora_prevista", [], "any", false, false, false, 45), 0, 5);
                // line 46
                echo "                                    ";
            }
            // line 47
            echo "
                                    ";
            // line 48
            echo twig_escape_filter($this->env, ($context["hora"] ?? null), "html", null, true);
            echo "
                                </div>
                            ";
        }
        // line 51
        echo "                        </div>

                        <div class=\"col-lg-6 col-5 px-lg-3 px-0 h25 text-center\">
                            ";
        // line 54
        if (((isset($context["jornadaActiva"]) || array_key_exists("jornadaActiva", $context)) && 1 === twig_compare(($context["jornadaActiva"] ?? null), 0))) {
            // line 55
            echo "                                <i style='color:dimgray'>
                                    &nbsp;&nbsp;";
            // line 56
            echo twig_escape_filter($this->env, ($context["jornadaTxt"] ?? null), "html", null, true);
            echo "
                                </i>
                            ";
        }
        // line 59
        echo "
                            ";
        // line 60
        if ((1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 60), 1) && 0 !== twig_compare(($context["pagina"] ?? null), "televisados"))) {
            // line 61
            echo "
                                ";
            // line 62
            $context["colorTexto"] = "white";
            // line 63
            echo "
                                ";
            // line 64
            if (1 === twig_compare(twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "comentarios", [], "any", false, false, false, 64)), 2)) {
                // line 65
                echo "                                    ";
                $context["t"] = null;
                // line 66
                echo "
                                    ";
                // line 67
                $context["t"] = twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "comentarios", [], "any", false, false, false, 67), "-");
                // line 68
                echo "                                    
                                    ";
                // line 69
                if (twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 3, [], "any", true, true, false, 69)) {
                    // line 70
                    echo "                                        ";
                    $context["ev"] = twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 3, [], "any", false, false, false, 70);
                    // line 71
                    echo "                                    ";
                }
                // line 72
                echo "
                                    ";
                // line 73
                if ((isset($context["t"]) || array_key_exists("t", $context))) {
                    // line 74
                    echo "
                                        ";
                    // line 75
                    $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#f07474"]);
                    // line 78
                    echo "
                                        ";
                    // line 79
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 79), 1)) {
                        // line 80
                        echo "                                            ";
                        $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#f07474"]);
                        // line 83
                        echo "                                        ";
                    }
                    // line 84
                    echo "
                                        ";
                    // line 85
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 85), 2)) {
                        // line 86
                        echo "                                            ";
                        $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#7cc002"]);
                        // line 89
                        echo "                                        ";
                    }
                    // line 90
                    echo "
                                        ";
                    // line 91
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 91), 3)) {
                        // line 92
                        echo "                                            ";
                        $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#610B0B"]);
                        // line 95
                        echo "                                        ";
                    }
                    // line 96
                    echo "
                                        ";
                    // line 97
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 97), 4)) {
                        // line 98
                        echo "                                            ";
                        $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#0B3B0B"]);
                        // line 101
                        echo "                                        ";
                    }
                    // line 102
                    echo "
                                        ";
                    // line 103
                    $context["parte"] = "";
                    // line 104
                    echo "
                                        ";
                    // line 105
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 105), 1)) {
                        // line 106
                        echo "                                            ";
                        $context["parte"] = "1T - ";
                        // line 107
                        echo "                                        ";
                    } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 107), 2)) {
                        // line 108
                        echo "                                            ";
                        $context["parte"] = "2T - ";
                        // line 109
                        echo "                                        ";
                    }
                    // line 110
                    echo "
                                        ";
                    // line 111
                    $context["t"] = twig_array_merge(($context["t"] ?? null), ["tiempo" => ((                    // line 112
($context["parte"] ?? null) . "Minuto ") . twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 1, [], "any", false, false, false, 112))]);
                    // line 114
                    echo "
                                        ";
                    // line 115
                    if ((twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 2, [], "any", true, true, false, 115) && 1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 2, [], "any", false, false, false, 115), 0))) {
                        // line 116
                        echo "                                            ";
                        $context["t"] = twig_array_merge(($context["t"] ?? null), ["tiempo" => ((((                        // line 117
($context["parte"] ?? null) . "Minuto ") . twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 1, [], "any", false, false, false, 117)) . " + ") . twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 2, [], "any", false, false, false, 117))]);
                        // line 119
                        echo "                                        ";
                    }
                    // line 120
                    echo "

                                        ";
                    // line 122
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 122), 6)) {
                        // line 123
                        echo "                                            ";
                        $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#ffe400", "tiempo" => "Descanso"]);
                        // line 127
                        echo "
                                            ";
                        // line 128
                        $context["colorTexto"] = "maroon";
                        // line 129
                        echo "                                        ";
                    }
                    // line 130
                    echo "
                                        ";
                    // line 131
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 131), 7)) {
                        // line 132
                        echo "                                            ";
                        $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#2E2E2E", "tiempo" => "Penaltis"]);
                        // line 136
                        echo "                                        ";
                    }
                    // line 137
                    echo "
                                        ";
                    // line 138
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 138), 8)) {
                        // line 139
                        echo "                                            ";
                        $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "blue", "tiempo" => "Prórroga"]);
                        // line 143
                        echo "                                        ";
                    }
                    // line 144
                    echo "
                                    ";
                }
                // line 146
                echo "                                ";
            }
            // line 147
            echo "

                                <div class=\"infopwhitebox\">
                                    ";
            // line 150
            if ((isset($context["t"]) || array_key_exists("t", $context))) {
                // line 151
                echo "
                                    ";
                // line 152
                if ((twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "categoria_torneo_id", [], "any", true, true, false, 152) && 0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "categoria_torneo_id", [], "any", false, false, false, 152), 17))) {
                    // line 153
                    echo "                                        ";
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 153), 2)) {
                        // line 154
                        echo "                                            ";
                        $context["t"] = twig_array_merge(($context["t"] ?? null), ["tiempo" => "2ª parte"]);
                        // line 157
                        echo "                                        ";
                    }
                    // line 158
                    echo "
                                        ";
                    // line 159
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 159), 1)) {
                        // line 160
                        echo "                                            ";
                        $context["t"] = twig_array_merge(($context["t"] ?? null), ["tiempo" => "1ª parte"]);
                        // line 163
                        echo "                                        ";
                    }
                    // line 164
                    echo "                                    ";
                }
                // line 165
                echo "
                                    ";
                // line 166
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 166), 6)) {
                    // line 167
                    echo "                                        <p class=\"timeresult mb-0\" style=\" color: orange !important\">Descanso</p>
                                    ";
                } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,                 // line 168
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 168), 7)) {
                    // line 169
                    echo "                                        <p class=\"timeresult mb-0\" style=\"color: #E81346;\">Penaltis</p>
                                    ";
                } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,                 // line 170
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 170), 8)) {
                    // line 171
                    echo "                                        <p class=\"timeresult mb-0\" style=\"color: dodgerblue;\">Prórroga</p>
                                    ";
                } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,                 // line 172
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 172), 9)) {
                    // line 173
                    echo "                                        <p class=\"timeresult mb-0\" style=\"color: #9EFF23;\">";
                    echo twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), "tiempo", [], "any", false, false, false, 173);
                    echo "</p>
                                    ";
                } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,                 // line 174
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 174), 10)) {
                    // line 175
                    echo "                                        <p class=\"timeresult mb-0\" style=\"color: #9EFF23;\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), "tiempo", [], "any", false, false, false, 175), "html", null, true);
                    echo "</p>
                                    ";
                } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,                 // line 176
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 176), 11)) {
                    // line 177
                    echo "                                        <p class=\"timeresult mb-0\" style=\"color: orange;\">Desc.Prórr.</p>
                                    ";
                } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,                 // line 178
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 178), 2)) {
                    // line 179
                    echo "                                        <p class=\"timeresult mb-0\" style=\"color: #9EFF23 !important;\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), "tiempo", [], "any", false, false, false, 179), "html", null, true);
                    echo "</p>
                                    ";
                }
                // line 181
                echo "
                                    ";
            }
            // line 183
            echo "                                </div>
                    ";
        }
        // line 185
        echo "                        </div>


                        <div class=\"contenedorIconosPartido col-lg-3 col-5 nopadding h25\">
                            <div class=\"pull-right icons-directos-estaticos\" style=\"margin-right: 4px !important\">

                                ";
        // line 191
        echo ($context["icono"] ?? null);
        echo "

\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t
                                \t\t<img class=\"span-id-torneo-alineacion partidoDirectoImg\" attr-test=\"";
        // line 195
        echo twig_escape_filter($this->env, ($context["partido"] ?? null), "html", null, true);
        echo "\" attr-id-evento=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 195), "html", null, true);
        echo "\" src=\"/static/img/icon-alienacion-white.svg\" alt=\"Partidos alineaciones\" style=\"cursor: pointer;\">                                

                                \t\t<img class=\"span-evento-trigger img-fluid d-custom d-inline-block partidoDirectoImg\" attr-test=\"";
        // line 197
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "betsapi", [], "any", false, false, false, 197), "html", null, true);
        echo "\" attr-id-evento=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 197), "html", null, true);
        echo "\" src=\"/static/img/balon-eventos.png\" alt=\"Partidos eventos\" style=\"cursor: pointer;\">
\t\t\t\t\t\t\t\t\t

                                <a class=\"simboloMasPartido jorge-f-clase\" href=\"javascript:mostrarColor(";
        // line 200
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 200), "html", null, true);
        echo ");\" class=\"d-inline-block\">
                                    ";
        // line 201
        if (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "enJuego", [], "any", false, false, false, 201)) {
            // line 202
            echo "                                        <img src=\"/static/img/simbolo-mas-blanco.svg\" title=\"Partido entre ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "local", [], "any", false, false, false, 202), "html", null, true);
            echo " y ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitante", [], "any", false, false, false, 202), "html", null, true);
            echo "\" alt=\"Partido entre ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "local", [], "any", false, false, false, 202), "html", null, true);
            echo " y ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitante", [], "any", false, false, false, 202), "html", null, true);
            echo "\" class=\"p-2\">
                                    ";
        } else {
            // line 204
            echo "                                        <img src=\"/static/img/simbolo-mas.svg\" title=\"Partido entre ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "local", [], "any", false, false, false, 204), "html", null, true);
            echo " y ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitante", [], "any", false, false, false, 204), "html", null, true);
            echo "\" alt=\"Partido entre ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "local", [], "any", false, false, false, 204), "html", null, true);
            echo " y ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitante", [], "any", false, false, false, 204), "html", null, true);
            echo "\" class=\"p-2\">
                                    ";
        }
        // line 206
        echo "                                </a>

                                <div class=\"d-none content-eventos de-partido-suelto\">
                                    <div class=\"d-flex align-items-center justify-content-between w-100\">
                                        <h3 class=\"d-block\">Eventos</h3>
                                        <span class=\"cerrar-eventos display-4\" style=\"cursor: pointer;\">&times;</span>
                                    </div>
                                    <ul class=\"list-group lista-eventos text-left\"></ul>
                                </div>
                                

                                <div class=\"d-none align-items-center content-alineaciones\" >
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
                    </div>
                </div>

                <div class=\"col-12\">
                    <div class=\"row\">

                        <div class=\"col-5 equipoPartido equipoPartidoLocal\">
                            <p class=\"pull-right boldfont lead txt11\" style=\"padding-right: 10px; color:";
        // line 246
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "colorL", [], "any", false, false, false, 246), "html", null, true);
        echo ";  background-color:";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "fondocolorL", [], "any", false, false, false, 246), "html", null, true);
        echo "; cursor:pointer;\"  onclick=\"mostrarColor(";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 246), "html", null, true);
        echo ")\">
                                <span itemprop=\"name\" class=\"txt11\">
                                    ";
        // line 248
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "localCorto", [], "any", false, false, false, 248), "html", null, true);
        echo "
                                </span>
                            </p>                            
                        </div>

                        ";
        // line 253
        $context["aplazadoOSuspendido"] = 0;
        // line 254
        echo "                        <div class=\"col-2 resultadoPartido\">
                            ";
        // line 255
        if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 255), 1)) {
            // line 256
            echo "
                                <span
                                        ";
            // line 258
            if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "goles_local", [], "any", false, false, false, 258), 1)) {
                // line 259
                echo "                                    style='padding: 1px 1px;'
                                        ";
            }
            // line 260
            echo ">

                                    ";
            // line 262
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "goles_local", [], "any", false, false, false, 262), "html", null, true);
            echo "
                                </span>
                                -
                                <span
                                        ";
            // line 266
            if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "goles_visitante", [], "any", false, false, false, 266), 1)) {
                // line 267
                echo "                                            style='padding: 1px 1px;'
                                        ";
            }
            // line 269
            echo "                                >
                                    ";
            // line 270
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "goles_visitante", [], "any", false, false, false, 270), "html", null, true);
            echo "
                                </span>

                            ";
        } elseif (1 === twig_compare(twig_get_attribute($this->env, $this->source,         // line 273
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 273), 2)) {
            // line 274
            echo "
                                ";
            // line 275
            if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 275), 3) || 0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 275), 4))) {
                // line 276
                echo "                                    <div class=\"horaPartido\" style=\"color:tomato; font-size:12px; margin-top: -20px;\">
                                        ";
                // line 277
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 277), 3)) {
                    // line 278
                    echo "                                            ";
                    $context["aplazadoOSuspendido"] = 1;
                    // line 279
                    echo "                                            SUSP.
                                        ";
                } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,                 // line 280
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 280), 4)) {
                    // line 281
                    echo "                                            ";
                    $context["aplazadoOSuspendido"] = 1;
                    // line 282
                    echo "                                            APLZ.
                                        ";
                }
                // line 284
                echo "                                    </div>
                                ";
            }
            // line 286
            echo "
                            ";
        }
        // line 288
        echo "

                            ";
        // line 290
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 290), 2) || 1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 290), 5))) {
            // line 291
            echo "                                <span class=\"
                                    ";
            // line 292
            if (0 === twig_compare(($context["ev"] ?? null), 5)) {
                // line 293
                echo "                                        parpadea
                                    ";
            }
            // line 294
            echo "\">
                                    ";
            // line 295
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "goles_local", [], "any", false, false, false, 295), "html", null, true);
            echo "
                                </span>

                                -

                                <span class=\"
                                    ";
            // line 301
            if (0 === twig_compare(($context["ev"] ?? null), 6)) {
                // line 302
                echo "                                        parpadea
                                    ";
            }
            // line 303
            echo "\">
                                    ";
            // line 304
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "goles_visitante", [], "any", false, false, false, 304), "html", null, true);
            echo "
                                </span>
                            ";
        }
        // line 307
        echo "
                            ";
        // line 308
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 308), 0) || (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 308), 2) && -1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 308), 6)))) {
            // line 309
            echo "                                <div class=\"text-center\">
                                    ";
            // line 324
            echo "                                    ";
            if ( !($context["aplazadoOSuspendido"] ?? null)) {
                // line 325
                echo "                                        <div class=\"horaPartido\">

                                            ";
                // line 327
                if (0 === twig_compare(twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "hora_prevista", [], "any", false, false, false, 327),  -2, null), "11")) {
                    // line 328
                    echo "                                                ";
                    $context["hora"] = ":";
                    // line 329
                    echo "                                            ";
                } else {
                    // line 330
                    echo "                                                ";
                    $context["hora"] = twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "hora_prevista", [], "any", false, false, false, 330), 0, 5);
                    // line 331
                    echo "                                            ";
                }
                // line 332
                echo "
                                            ";
                // line 333
                echo twig_escape_filter($this->env, ($context["hora"] ?? null), "html", null, true);
                echo "
                                        </div>
                                    ";
            } else {
                // line 336
                echo "                                        <div class=\"text-center\" style=\"margin-top:-10px; font-size:12px\">
                                            ";
                // line 337
                echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "fecha", [], "any", false, false, false, 337),  -2), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "fecha", [], "any", false, false, false, 337), 5, 2), "html", null, true);
                echo "
                                        </div>
                                        <div class=\"text-center\" style=\"margin-top:-25px; font-size:12px\">
                                            ";
                // line 340
                if (0 === twig_compare(twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "hora_prevista", [], "any", false, false, false, 340),  -2, null), "11")) {
                    // line 341
                    echo "                                                ";
                    $context["hora"] = ":";
                    // line 342
                    echo "                                            ";
                } else {
                    // line 343
                    echo "                                                ";
                    $context["hora"] = twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "hora_prevista", [], "any", false, false, false, 343), 0, 5);
                    // line 344
                    echo "                                            ";
                }
                // line 345
                echo "
                                            ";
                // line 346
                echo twig_escape_filter($this->env, ($context["hora"] ?? null), "html", null, true);
                echo "

                                        </div>

                                    ";
            }
            // line 351
            echo "                                </div>
                            ";
        }
        // line 353
        echo "                        </div>


                        <div class=\"col-5 equipoPartido equipoPartidoVisitante\">
                            <p class=\"pull-left boldfont lead txt11\" style=\"padding-left: 10px; color:";
        // line 357
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "colorV", [], "any", false, false, false, 357), "html", null, true);
        echo ";  background-color:";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "fondocolorV", [], "any", false, false, false, 357), "html", null, true);
        echo "; cursor:pointer;\" onclick=\"mostrarColor(";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 357), "html", null, true);
        echo ")\">
                                <span itemprop=\"name\" class=\"txt11\">
                                    ";
        // line 359
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitanteCorto", [], "any", false, false, false, 359), "html", null, true);
        echo "
                                </span>
                            </p>                            
                        </div>

                        <div class=\"col-12\" id=\"posicion";
        // line 364
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 364), "html", null, true);
        echo "\" style=\"display: none\">
                            <div class=\"enlacesDeInteres\">

                                <span class=\"float-right\" onclick=\"mostrarColor(";
        // line 367
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "id", [], "any", false, false, false, 367), "html", null, true);
        echo ")\" style=\"cursor:pointer;\">Cerrar enlaces</span>
                                <br />
                                <h4 class=\"text-center\">ENLACES DE INTERES</h4>

                                <div class=\"row\">

                                    <div class=\"enlacesDeInteresColumnaEquipo col-6 text-center\">
                                        <h6>";
        // line 374
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "localCorto", [], "any", false, false, false, 374), "html", null, true);
        echo "</h6>
                                        <a href=\"";
        // line 375
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "pgLocal", [], "any", false, false, false, 375), "html", null, true);
        echo "/datos?temp_id=";
        echo twig_escape_filter($this->env, ($context["temp_id"] ?? null), "html", null, true);
        echo "\">Calendario</a><br />
                                    </div>

                                    <div class=\"enlacesDeInteresColumnaEquipo col-6 text-center\">
                                        <h6>";
        // line 379
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitanteCorto", [], "any", false, false, false, 379), "html", null, true);
        echo "</h6>
                                        <a href=\"";
        // line 380
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "pgVisitante", [], "any", false, false, false, 380), "html", null, true);
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
        return array (  804 => 380,  800 => 379,  791 => 375,  787 => 374,  777 => 367,  771 => 364,  763 => 359,  754 => 357,  748 => 353,  744 => 351,  736 => 346,  733 => 345,  730 => 344,  727 => 343,  724 => 342,  721 => 341,  719 => 340,  711 => 337,  708 => 336,  702 => 333,  699 => 332,  696 => 331,  693 => 330,  690 => 329,  687 => 328,  685 => 327,  681 => 325,  678 => 324,  675 => 309,  673 => 308,  670 => 307,  664 => 304,  661 => 303,  657 => 302,  655 => 301,  646 => 295,  643 => 294,  639 => 293,  637 => 292,  634 => 291,  632 => 290,  628 => 288,  624 => 286,  620 => 284,  616 => 282,  613 => 281,  611 => 280,  608 => 279,  605 => 278,  603 => 277,  600 => 276,  598 => 275,  595 => 274,  593 => 273,  587 => 270,  584 => 269,  580 => 267,  578 => 266,  571 => 262,  567 => 260,  563 => 259,  561 => 258,  557 => 256,  555 => 255,  552 => 254,  550 => 253,  542 => 248,  533 => 246,  491 => 206,  479 => 204,  467 => 202,  465 => 201,  461 => 200,  453 => 197,  446 => 195,  439 => 191,  431 => 185,  427 => 183,  423 => 181,  417 => 179,  415 => 178,  412 => 177,  410 => 176,  405 => 175,  403 => 174,  398 => 173,  396 => 172,  393 => 171,  391 => 170,  388 => 169,  386 => 168,  383 => 167,  381 => 166,  378 => 165,  375 => 164,  372 => 163,  369 => 160,  367 => 159,  364 => 158,  361 => 157,  358 => 154,  355 => 153,  353 => 152,  350 => 151,  348 => 150,  343 => 147,  340 => 146,  336 => 144,  333 => 143,  330 => 139,  328 => 138,  325 => 137,  322 => 136,  319 => 132,  317 => 131,  314 => 130,  311 => 129,  309 => 128,  306 => 127,  303 => 123,  301 => 122,  297 => 120,  294 => 119,  292 => 117,  290 => 116,  288 => 115,  285 => 114,  283 => 112,  282 => 111,  279 => 110,  276 => 109,  273 => 108,  270 => 107,  267 => 106,  265 => 105,  262 => 104,  260 => 103,  257 => 102,  254 => 101,  251 => 98,  249 => 97,  246 => 96,  243 => 95,  240 => 92,  238 => 91,  235 => 90,  232 => 89,  229 => 86,  227 => 85,  224 => 84,  221 => 83,  218 => 80,  216 => 79,  213 => 78,  211 => 75,  208 => 74,  206 => 73,  203 => 72,  200 => 71,  197 => 70,  195 => 69,  192 => 68,  190 => 67,  187 => 66,  184 => 65,  182 => 64,  179 => 63,  177 => 62,  174 => 61,  172 => 60,  169 => 59,  163 => 56,  160 => 55,  158 => 54,  153 => 51,  147 => 48,  144 => 47,  141 => 46,  138 => 45,  135 => 44,  132 => 43,  130 => 42,  127 => 41,  125 => 40,  121 => 39,  105 => 30,  97 => 29,  90 => 27,  84 => 26,  78 => 23,  72 => 22,  67 => 19,  59 => 14,  54 => 11,  51 => 10,  48 => 7,  45 => 6,  42 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "index/__part/partidoDirectoSueltos.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/index/__part/partidoDirectoSueltos.html.twig");
    }
}
