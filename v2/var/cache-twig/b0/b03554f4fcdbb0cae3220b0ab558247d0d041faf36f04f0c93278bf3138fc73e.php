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

/* __part/pesLeerTwitsPortada.html.twig */
class __TwigTemplate_e493a2ae55ddac20dbd319e06de72768d3e78bae20d35bb909f4386206c3368c extends Template
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
        if ( !(isset($context["equiposTw"]) || array_key_exists("equiposTw", $context))) {
            // line 2
            echo "    ";
            $context["equiposTw"] = [];
        }
        // line 4
        echo "
";
        // line 5
        if ( !(isset($context["titol"]) || array_key_exists("titol", $context))) {
            // line 6
            echo "    ";
            $context["titol"] = "Visto en twitter";
        }
        // line 8
        echo "
";
        // line 9
        $context["fechaActual"] = call_user_func_array($this->env->getFunction('hoyDateTime')->getCallable(), []);
        // line 10
        $context["fechaActualFormatada"] = twig_date_format_filter($this->env, ($context["fechaActual"] ?? null), "Y-m-d H:i:s");
        // line 11
        echo "
";
        // line 12
        if ( !(isset($context["filtro"]) || array_key_exists("filtro", $context))) {
            // line 13
            echo "    ";
            $context["filtro"] = 0;
        }
        // line 15
        echo "
";
        // line 16
        if ( !(isset($context["tiempoAcorrer"]) || array_key_exists("tiempoAcorrer", $context))) {
            // line 17
            echo "    ";
            // line 18
            echo "    ";
            $context["tiempoAcorrer"] = 86400;
        }
        // line 20
        echo "
";
        // line 21
        if ( !(isset($context["nivel"]) || array_key_exists("nivel", $context))) {
            // line 22
            echo "    ";
            $context["nivel"] = "..";
        }
        // line 24
        echo "
";
        // line 25
        $context["equiposTw"] = twig_slice($this->env, ($context["equiposTw"] ?? null), 0, 20);
        // line 26
        $context["equiposTw"] = call_user_func_array($this->env->getFunction('shuffle')->getCallable(), [($context["equiposTw"] ?? null)]);
        // line 27
        echo "
";
        // line 28
        if (0 === twig_compare(call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__APP__"]), 1)) {
            // line 29
            echo "
";
        }
        // line 31
        echo "
";
        // line 32
        if (call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_MOBILE__"])) {
            // line 33
            echo "    <div id=\"myContainer1\" style=\"width:100%;margin-left: auto;margin-right: auto; margin-bottom:10px;\"> </div>
";
        }
        // line 35
        echo "
<div id=\"r89-taboola\" class=\"col-12\"></div>
<div class=\"";
        // line 37
        if ((isset($context["esPaginaTorneo"]) || array_key_exists("esPaginaTorneo", $context))) {
            echo "col-12";
        } else {
            echo "row";
        }
        echo " contenedorActualidadEnTwitter\" style=\"clear:both;display: block; margin-top: 15px;\">
    <div class=\"row\" style=\"display:block;\">
        <div class=\"col-12\">
            <h4 class=\"contenedorActualidadEnTwitterTitulo\">
                ";
        // line 41
        echo twig_escape_filter($this->env, ($context["titol"] ?? null), "html", null, true);
        echo " <img style=\"margin-left: 5px;\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/img/icono-twitter-mini.svg\" alt=\"\">
            </h4>
        </div>

        <div class=\"row\">
            <div class=\"col-12\">
                ";
        // line 47
        $context["espacio"] = "cabeceraTwitter";
        // line 48
        echo "                ";
        $this->loadTemplate("publicidad/publiGestion.html.twig", "__part/pesLeerTwitsPortada.html.twig", 48)->display($context);
        // line 49
        echo "            </div>
        </div>
    </div>

    <div class=\"col-12 contenidoActualidadEnTwitter\">
        ";
        // line 54
        $context["contador"] = 0;
        // line 55
        echo "        ";
        if ( !(isset($context["categoria_id"]) || array_key_exists("categoria_id", $context))) {
            // line 56
            echo "            ";
            $context["categoria_id"] = 0;
            // line 57
            echo "        ";
        }
        // line 58
        echo "
        ";
        // line 59
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["equiposTw"] ?? null));
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
        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
            // line 60
            echo "            ";
            if ( !twig_get_attribute($this->env, $this->source, $context["value"], "twitter", [], "any", true, true, false, 60)) {
                // line 61
                echo "                ";
                $context["value"] = twig_array_merge($context["value"], ["twitter" => 0]);
                // line 62
                echo "            ";
            }
            // line 63
            echo "
            ";
            // line 64
            if ( !twig_get_attribute($this->env, $this->source, $context["value"], "idPais", [], "any", true, true, false, 64)) {
                // line 65
                echo "                ";
                $context["value"] = twig_array_merge($context["value"], ["idPais" => 60]);
                // line 66
                echo "            ";
            }
            // line 67
            echo "
            ";
            // line 68
            if (twig_get_attribute($this->env, $this->source, $context["value"], "seleccion", [], "any", true, true, false, 68)) {
                // line 69
                echo "                 ";
                $context["seleccion"] = twig_get_attribute($this->env, $this->source, $context["value"], "seleccion", [], "any", false, false, false, 69);
                // line 70
                echo "            ";
            } else {
                // line 71
                echo "                ";
                $context["seleccion"] = 0;
                // line 72
                echo "            ";
            }
            // line 73
            echo "
            ";
            // line 74
            if (0 === twig_compare(($context["seleccion"] ?? null), 0)) {
                // line 75
                echo "                ";
                $context["escudo"] = call_user_func_array($this->env->getFunction('rutaEscudo')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["value"], "club_id", [], "any", false, false, false, 75), twig_get_attribute($this->env, $this->source, $context["value"], "id", [], "any", false, false, false, 75)]);
                // line 76
                echo "            ";
            } else {
                // line 77
                echo "                ";
                $context["escudo"] = call_user_func_array($this->env->getFunction('rutaEscudoPais')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["value"], "idPais", [], "any", false, false, false, 77)]);
                // line 78
                echo "            ";
            }
            // line 79
            echo "
            ";
            // line 80
            if ( !call_user_func_array($this->env->getFunction('fileExists')->getCallable(), [($context["escudo"] ?? null)])) {
                // line 81
                echo "                ";
                $context["escudo"] = "/static/img/jugadores/NI.png";
                // line 82
                echo "            ";
            }
            // line 83
            echo "

            ";
            // line 85
            $context["ficheroJsonTwits"] = (((($context["nivel"] ?? null) . "/json/twits/") . twig_get_attribute($this->env, $this->source, $context["value"], "id", [], "any", false, false, false, 85)) . "_twits.json");
            // line 86
            echo "
            ";
            // line 87
            if ( !call_user_func_array($this->env->getFunction('fileExists')->getCallable(), [($context["ficheroJsonTwits"] ?? null)])) {
                // line 88
                echo "                ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('returnTweet')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["value"], "twitter", [], "any", false, false, false, 88), twig_get_attribute($this->env, $this->source, $context["value"], "id", [], "any", false, false, false, 88)]), "html", null, true);
                echo "
            ";
            }
            // line 90
            echo "


            ";
            // line 93
            if (call_user_func_array($this->env->getFunction('fileExists')->getCallable(), [($context["ficheroJsonTwits"] ?? null)])) {
                // line 94
                echo "
                ";
                // line 95
                $context["tiempo1"] = call_user_func_array($this->env->getFunction('time')->getCallable(), []);
                // line 96
                echo "                ";
                $context["tiempo2"] = call_user_func_array($this->env->getFunction('filemtime')->getCallable(), [($context["ficheroJsonTwits"] ?? null)]);
                // line 97
                echo "
                ";
                // line 98
                $context["segundos"] = (($context["tiempo1"] ?? null) - ($context["tiempo2"] ?? null));
                // line 99
                echo "
                ";
                // line 100
                if (1 === twig_compare(($context["segundos"] ?? null), ($context["tiempoAcorrer"] ?? null))) {
                    // line 101
                    echo "                    ";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('returnTweet')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["value"], "twitter", [], "any", false, false, false, 101), twig_get_attribute($this->env, $this->source, $context["value"], "id", [], "any", false, false, false, 101)]), "html", null, true);
                    echo "
                ";
                }
                // line 103
                echo "
                ";
                // line 104
                $context["json"] = call_user_func_array($this->env->getFunction('fileGetContents')->getCallable(), [($context["ficheroJsonTwits"] ?? null)]);
                // line 105
                echo "                ";
                $context["twitterArray"] = call_user_func_array($this->env->getFunction('jsonDecode')->getCallable(), [($context["json"] ?? null), true]);
                // line 106
                echo "

                ";
                // line 108
                if (1 === twig_compare(twig_length_filter($this->env, ($context["twitterArray"] ?? null)), 2)) {
                    // line 109
                    echo "
                    ";
                    // line 110
                    $context["hay"] = 0;
                    // line 111
                    echo "                    ";
                    $context["break"] = false;
                    // line 112
                    echo "
                    ";
                    // line 113
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["twitterArray"] ?? null));
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
                    foreach ($context['_seq'] as $context["k"] => $context["txt"]) {
                        // line 114
                        echo "                        ";
                        $context["continuar"] = false;
                        // line 115
                        echo "
                        ";
                        // line 116
                        if (twig_get_attribute($this->env, $this->source, $context["txt"], "created_at", [], "any", true, true, false, 116)) {
                            // line 117
                            echo "
                            ";
                            // line 118
                            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["txt"], "retweeted_status", [], "any", false, true, false, 118), "text", [], "any", true, true, false, 118)) {
                                // line 119
                                echo "
                                ";
                                // line 120
                                $context["fecha2"] = twig_date_format_filter($this->env, call_user_func_array($this->env->getFunction('stringToDateTime')->getCallable(), [twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["txt"], "retweeted_status", [], "any", false, false, false, 120), "created_at", [], "any", false, false, false, 120)]), "Y-m-d H:i:s");
                                // line 121
                                echo "                                ";
                                $context["tx"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["txt"], "retweeted_status", [], "any", false, false, false, 121), "text", [], "any", false, false, false, 121);
                                // line 122
                                echo "                                ";
                                $context["id_str"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["txt"], "retweeted_status", [], "any", false, false, false, 122), "id_str", [], "any", false, false, false, 122);
                                // line 123
                                echo "
                            ";
                            } else {
                                // line 125
                                echo "
                                ";
                                // line 126
                                $context["fecha2"] = twig_date_format_filter($this->env, call_user_func_array($this->env->getFunction('stringToDateTime')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["txt"], "created_at", [], "any", false, false, false, 126)]), "Y-m-d H:i:s");
                                // line 127
                                echo "                                ";
                                $context["tx"] = twig_get_attribute($this->env, $this->source, $context["txt"], "text", [], "any", false, false, false, 127);
                                // line 128
                                echo "                                ";
                                $context["id_str"] = twig_get_attribute($this->env, $this->source, $context["txt"], "id_str", [], "any", false, false, false, 128);
                                // line 129
                                echo "
                            ";
                            }
                            // line 131
                            echo "
                            ";
                            // line 132
                            $context["d"] = call_user_func_array($this->env->getFunction('diferenciaHoras')->getCallable(), [($context["fechaActualFormatada"] ?? null), ($context["fecha2"] ?? null)]);
                            // line 133
                            echo "
                            ";
                            // line 134
                            if ((-1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["d"] ?? null), "d", [], "any", false, false, false, 134), 2) && 0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["d"] ?? null), "m", [], "any", false, false, false, 134), 0))) {
                                // line 135
                                echo "
                                ";
                                // line 136
                                if (0 === twig_compare(($context["filtro"] ?? null), 1)) {
                                    // line 137
                                    echo "
                                    ";
                                    // line 138
                                    $context["buscamos"] = "traspas";
                                    // line 139
                                    echo "                                    ";
                                    if (!twig_in_filter(($context["buscamos"] ?? null), ($context["tx"] ?? null))) {
                                        // line 140
                                        echo "
                                        ";
                                        // line 141
                                        $context["buscamos"] = "cedido";
                                        // line 142
                                        echo "                                        ";
                                        if (!twig_in_filter(($context["buscamos"] ?? null), ($context["tx"] ?? null))) {
                                            // line 143
                                            echo "
                                            ";
                                            // line 144
                                            $context["buscamos"] = "fichaje";
                                            // line 145
                                            echo "                                            ";
                                            if (!twig_in_filter(($context["buscamos"] ?? null), ($context["tx"] ?? null))) {
                                                // line 146
                                                echo "
                                                ";
                                                // line 147
                                                $context["buscamos"] = "alta";
                                                // line 148
                                                echo "                                                ";
                                                if (!twig_in_filter(($context["buscamos"] ?? null), ($context["tx"] ?? null))) {
                                                    // line 149
                                                    echo "
                                                    ";
                                                    // line 150
                                                    $context["buscamos"] = "baja";
                                                    // line 151
                                                    echo "                                                    ";
                                                    if (!twig_in_filter(($context["buscamos"] ?? null), ($context["tx"] ?? null))) {
                                                        // line 152
                                                        echo "
                                                        ";
                                                        // line 153
                                                        $context["buscamos"] = "abon";
                                                        // line 154
                                                        echo "                                                        ";
                                                        if (!twig_in_filter(($context["buscamos"] ?? null), ($context["tx"] ?? null))) {
                                                            // line 155
                                                            echo "
                                                            ";
                                                            // line 156
                                                            $context["buscamos"] = "temporada";
                                                            // line 157
                                                            echo "                                                            ";
                                                            if (!twig_in_filter(($context["buscamos"] ?? null), ($context["tx"] ?? null))) {
                                                                // line 158
                                                                echo "                                                                ";
                                                                $context["continuar"] = true;
                                                                // line 159
                                                                echo "                                                            ";
                                                            }
                                                            // line 160
                                                            echo "
                                                        ";
                                                        }
                                                        // line 162
                                                        echo "

                                                    ";
                                                    }
                                                    // line 165
                                                    echo "


                                                ";
                                                }
                                                // line 169
                                                echo "


                                            ";
                                            }
                                            // line 173
                                            echo "

                                        ";
                                        }
                                        // line 176
                                        echo "

                                    ";
                                    }
                                    // line 179
                                    echo "


                                ";
                                }
                                // line 183
                                echo "

                            ";
                            }
                            // line 186
                            echo "

                            ";
                            // line 188
                            if (0 === twig_compare(($context["contador"] ?? null), 0)) {
                                // line 189
                                echo "                                ";
                                $context["hay"] = 1;
                                // line 190
                                echo "                                ";
                                $context["contador"] = (($context["contador"] ?? null) + 1);
                                // line 191
                                echo "                                ";
                                $context["pgEquipo"] = ((("/resultados-directo/equipo/" . call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["value"], "equipo", [], "any", false, false, false, 191)])) . "/") . twig_get_attribute($this->env, $this->source, $context["value"], "id", [], "any", false, false, false, 191));
                                // line 192
                                echo "

                                <div class=\"row filaEquipoTwitter\">

                                    <div class=\"col-12 filaEquipoTwitterContenedorNombreEquipo\">
                                        <a href=\"";
                                // line 197
                                echo twig_escape_filter($this->env, ($context["pgEquipo"] ?? null), "html", null, true);
                                echo "\">
                                            <h4 class=\"nombreEquipoTwitter\">";
                                // line 198
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["value"], "equipo", [], "any", false, false, false, 198), "html", null, true);
                                echo "</h4>
                                        </a>
                                    </div>

                                    <div class=\"col-12 col-md-3 contenedorLateralTwitterEquipo\">

                                        <div class=\"d-none\">
                                            ";
                                // line 205
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["value"], "idPais", [], "any", false, false, false, 205), "html", null, true);
                                echo "
                                        </div>

                                        <a class=\"twitterContenedorEscudoEquipo\" href=\"";
                                // line 208
                                echo twig_escape_filter($this->env, ($context["pgEquipo"] ?? null), "html", null, true);
                                echo "\">
                                            <img class=\"escudo_ind\" src=\"";
                                // line 209
                                echo twig_escape_filter($this->env, ($context["escudo"] ?? null), "html", null, true);
                                echo "\" alt=\"escudo\">
                                        </a>

                                        ";
                                // line 212
                                if (twig_get_attribute($this->env, $this->source, $context["value"], "club_id", [], "any", true, true, false, 212)) {
                                    // line 213
                                    echo "
                                            ";
                                    // line 214
                                    $context["enlaces"] = call_user_func_array($this->env->getFunction('enlaceAleatorioAmazon')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["value"], "club_id", [], "any", false, false, false, 214)]);
                                    // line 226
                                    echo "                                        ";
                                }
                                // line 227
                                echo "
                                    </div>
                                    <div class=\"col-12 col-md-9\">


                            ";
                            }
                            // line 233
                            echo "
                            ";
                            // line 234
                            if ((0 === twig_compare(($context["contador"] ?? null), 1) && 0 === twig_compare($context["k"], 2))) {
                                // line 235
                                echo "                                <div class=\"row\">
                                    <div class=\"col-12\">
                                        ";
                                // line 237
                                $context["espacio"] = "entreTwitter";
                                // line 238
                                echo "                                        ";
                                $this->loadTemplate("publicidad/publiGestion.html.twig", "__part/pesLeerTwitsPortada.html.twig", 238)->display($context);
                                // line 239
                                echo "                                    </div>
                                </div>
                            ";
                            }
                            // line 242
                            echo "

                            ";
                            // line 244
                            if (0 === twig_compare($context["k"], 5)) {
                                // line 245
                                echo "                                ";
                                $context["break"] = true;
                                // line 246
                                echo "                            ";
                            }
                            // line 247
                            echo "

                            ";
                            // line 249
                            $context["texto"] = call_user_func_array($this->env->getFunction('convertirUrls')->getCallable(), [($context["tx"] ?? null)]);
                            // line 250
                            echo "

                            ";
                            // line 252
                            if (( !(null === ($context["texto"] ?? null)) &&  !($context["break"] ?? null))) {
                                // line 253
                                echo "
                                <div class=\"row\">
                                    <div class=\"col-12 filaMensajeTwitter\">
                                        <span class=\"horaPublicacionTwitter\">
                                            ";
                                // line 257
                                echo twig_escape_filter($this->env, twig_slice($this->env, ($context["fecha2"] ?? null),  -8), "html", null, true);
                                echo "
                                        </span>
                                        <span style=\"color: #83ACAC;\">-</span>
                                        ";
                                // line 260
                                echo twig_replace_filter(                                // line 261
($context["texto"] ?? null), ["<a" => "<a target=\"_blank\"", "\"\"" => "\"", "\" \"" => "\""]);
                                // line 267
                                echo "
                                    </div>
                                </div>

                            ";
                            }
                            // line 272
                            echo "
                        ";
                        }
                        // line 274
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
                    unset($context['_seq'], $context['_iterated'], $context['k'], $context['txt'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 276
                    echo "
                    ";
                    // line 277
                    if (0 === twig_compare(($context["hay"] ?? null), 1)) {
                        // line 278
                        echo "                            </div>
                        </div>
                        ";
                        // line 280
                        $context["hay"] = 0;
                        // line 281
                        echo "                        ";
                        $context["contador"] = 0;
                        // line 282
                        echo "                    ";
                    }
                    // line 283
                    echo "
                ";
                }
                // line 285
                echo "

            ";
            }
            // line 288
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
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 291
        echo "    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "__part/pesLeerTwitsPortada.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  695 => 291,  679 => 288,  674 => 285,  670 => 283,  667 => 282,  664 => 281,  662 => 280,  658 => 278,  656 => 277,  653 => 276,  638 => 274,  634 => 272,  627 => 267,  625 => 261,  624 => 260,  618 => 257,  612 => 253,  610 => 252,  606 => 250,  604 => 249,  600 => 247,  597 => 246,  594 => 245,  592 => 244,  588 => 242,  583 => 239,  580 => 238,  578 => 237,  574 => 235,  572 => 234,  569 => 233,  561 => 227,  558 => 226,  556 => 214,  553 => 213,  551 => 212,  545 => 209,  541 => 208,  535 => 205,  525 => 198,  521 => 197,  514 => 192,  511 => 191,  508 => 190,  505 => 189,  503 => 188,  499 => 186,  494 => 183,  488 => 179,  483 => 176,  478 => 173,  472 => 169,  466 => 165,  461 => 162,  457 => 160,  454 => 159,  451 => 158,  448 => 157,  446 => 156,  443 => 155,  440 => 154,  438 => 153,  435 => 152,  432 => 151,  430 => 150,  427 => 149,  424 => 148,  422 => 147,  419 => 146,  416 => 145,  414 => 144,  411 => 143,  408 => 142,  406 => 141,  403 => 140,  400 => 139,  398 => 138,  395 => 137,  393 => 136,  390 => 135,  388 => 134,  385 => 133,  383 => 132,  380 => 131,  376 => 129,  373 => 128,  370 => 127,  368 => 126,  365 => 125,  361 => 123,  358 => 122,  355 => 121,  353 => 120,  350 => 119,  348 => 118,  345 => 117,  343 => 116,  340 => 115,  337 => 114,  320 => 113,  317 => 112,  314 => 111,  312 => 110,  309 => 109,  307 => 108,  303 => 106,  300 => 105,  298 => 104,  295 => 103,  289 => 101,  287 => 100,  284 => 99,  282 => 98,  279 => 97,  276 => 96,  274 => 95,  271 => 94,  269 => 93,  264 => 90,  258 => 88,  256 => 87,  253 => 86,  251 => 85,  247 => 83,  244 => 82,  241 => 81,  239 => 80,  236 => 79,  233 => 78,  230 => 77,  227 => 76,  224 => 75,  222 => 74,  219 => 73,  216 => 72,  213 => 71,  210 => 70,  207 => 69,  205 => 68,  202 => 67,  199 => 66,  196 => 65,  194 => 64,  191 => 63,  188 => 62,  185 => 61,  182 => 60,  165 => 59,  162 => 58,  159 => 57,  156 => 56,  153 => 55,  151 => 54,  144 => 49,  141 => 48,  139 => 47,  128 => 41,  117 => 37,  113 => 35,  109 => 33,  107 => 32,  104 => 31,  100 => 29,  98 => 28,  95 => 27,  93 => 26,  91 => 25,  88 => 24,  84 => 22,  82 => 21,  79 => 20,  75 => 18,  73 => 17,  71 => 16,  68 => 15,  64 => 13,  62 => 12,  59 => 11,  57 => 10,  55 => 9,  52 => 8,  48 => 6,  46 => 5,  43 => 4,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "__part/pesLeerTwitsPortada.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.eu/v2/templates/__part/pesLeerTwitsPortada.html.twig");
    }
}
