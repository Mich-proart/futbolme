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
class __TwigTemplate_e378ea590effff3ef44b64f6bd7614d9009b34c3f259682dba2834f4b393016b extends Template
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
        echo "´ññ´^``
´

";
        // line 27
        $context["equiposTw"] = twig_slice($this->env, ($context["equiposTw"] ?? null), 0, 20);
        // line 28
        $context["equiposTw"] = call_user_func_array($this->env->getFunction('shuffle')->getCallable(), [($context["equiposTw"] ?? null)]);
        // line 29
        echo "
";
        // line 30
        if (0 === twig_compare(call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__APP__"]), 1)) {
            // line 31
            echo "    <div id=\"Futbolme_ATF_300x250\" class=\"text-center\"></div>
    <script type=\"application/javascript\">
        var slmadshb = slmadshb || {};
        slmadshb.que = slmadshb.que || [];
        slmadshb.que.push(function() {
            slmadshb.display(\"Futbolme_ATF_300x250\");
        });
    </script>
";
        }
        // line 40
        echo "
<div class=\"";
        // line 41
        if ((isset($context["esPaginaTorneo"]) || array_key_exists("esPaginaTorneo", $context))) {
            echo "col-12";
        } else {
            echo "row";
        }
        echo " contenedorActualidadEnTwitter\">
    <div class=\"row\">
        <div class=\"col-12\">
            <h4 class=\"contenedorActualidadEnTwitterTitulo\">
                ";
        // line 45
        echo twig_escape_filter($this->env, ($context["titol"] ?? null), "html", null, true);
        echo " <img style=\"margin-left: 5px;\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/img/icono-twitter-mini.svg\" alt=\"\">
            </h4>
        </div>
    </div>

    <div class=\"col-12 contenidoActualidadEnTwitter\">
        ";
        // line 51
        $context["contador"] = 0;
        // line 52
        echo "        ";
        if ( !(isset($context["categoria_id"]) || array_key_exists("categoria_id", $context))) {
            // line 53
            echo "            ";
            $context["categoria_id"] = 0;
            // line 54
            echo "        ";
        }
        // line 55
        echo "
        ";
        // line 56
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
            // line 57
            echo "            ";
            if ( !twig_get_attribute($this->env, $this->source, $context["value"], "twitter", [], "any", true, true, false, 57)) {
                // line 58
                echo "                ";
                $context["value"] = twig_array_merge($context["value"], ["twitter" => 0]);
                // line 59
                echo "            ";
            }
            // line 60
            echo "
            ";
            // line 61
            if ( !twig_get_attribute($this->env, $this->source, $context["value"], "idPais", [], "any", true, true, false, 61)) {
                // line 62
                echo "                ";
                $context["value"] = twig_array_merge($context["value"], ["idPais" => 60]);
                // line 63
                echo "            ";
            }
            // line 64
            echo "
            ";
            // line 65
            if (twig_get_attribute($this->env, $this->source, $context["value"], "seleccion", [], "any", true, true, false, 65)) {
                // line 66
                echo "                 ";
                $context["seleccion"] = twig_get_attribute($this->env, $this->source, $context["value"], "seleccion", [], "any", false, false, false, 66);
                // line 67
                echo "            ";
            } else {
                // line 68
                echo "                ";
                $context["seleccion"] = 0;
                // line 69
                echo "            ";
            }
            // line 70
            echo "
            ";
            // line 71
            if (0 === twig_compare(($context["seleccion"] ?? null), 0)) {
                // line 72
                echo "                ";
                $context["escudo"] = call_user_func_array($this->env->getFunction('rutaEscudo')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["value"], "club_id", [], "any", false, false, false, 72), twig_get_attribute($this->env, $this->source, $context["value"], "id", [], "any", false, false, false, 72)]);
                // line 73
                echo "            ";
            } else {
                // line 74
                echo "                ";
                $context["escudo"] = call_user_func_array($this->env->getFunction('rutaEscudoPais')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["value"], "idPais", [], "any", false, false, false, 74)]);
                // line 75
                echo "            ";
            }
            // line 76
            echo "

            ";
            // line 78
            $context["ficheroJsonTwits"] = (((($context["nivel"] ?? null) . "/json/twits/") . twig_get_attribute($this->env, $this->source, $context["value"], "id", [], "any", false, false, false, 78)) . "_twits.json");
            // line 79
            echo "
            ";
            // line 80
            if ( !call_user_func_array($this->env->getFunction('fileExists')->getCallable(), [($context["ficheroJsonTwits"] ?? null)])) {
                // line 81
                echo "                ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('returnTweet')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["value"], "twitter", [], "any", false, false, false, 81), twig_get_attribute($this->env, $this->source, $context["value"], "id", [], "any", false, false, false, 81)]), "html", null, true);
                echo "
            ";
            }
            // line 83
            echo "


            ";
            // line 86
            if (call_user_func_array($this->env->getFunction('fileExists')->getCallable(), [($context["ficheroJsonTwits"] ?? null)])) {
                // line 87
                echo "
                ";
                // line 88
                $context["tiempo1"] = call_user_func_array($this->env->getFunction('time')->getCallable(), []);
                // line 89
                echo "                ";
                $context["tiempo2"] = call_user_func_array($this->env->getFunction('filemtime')->getCallable(), [($context["ficheroJsonTwits"] ?? null)]);
                // line 90
                echo "
                ";
                // line 91
                $context["segundos"] = (($context["tiempo1"] ?? null) - ($context["tiempo2"] ?? null));
                // line 92
                echo "
                ";
                // line 93
                if (1 === twig_compare(($context["segundos"] ?? null), ($context["tiempoAcorrer"] ?? null))) {
                    // line 94
                    echo "                    ";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('returnTweet')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["value"], "twitter", [], "any", false, false, false, 94), twig_get_attribute($this->env, $this->source, $context["value"], "id", [], "any", false, false, false, 94)]), "html", null, true);
                    echo "
                ";
                }
                // line 96
                echo "
                ";
                // line 97
                $context["json"] = call_user_func_array($this->env->getFunction('fileGetContents')->getCallable(), [($context["ficheroJsonTwits"] ?? null)]);
                // line 98
                echo "                ";
                $context["twitterArray"] = call_user_func_array($this->env->getFunction('jsonDecode')->getCallable(), [($context["json"] ?? null), true]);
                // line 99
                echo "

                ";
                // line 101
                if (1 === twig_compare(twig_length_filter($this->env, ($context["twitterArray"] ?? null)), 2)) {
                    // line 102
                    echo "
                    ";
                    // line 103
                    $context["hay"] = 0;
                    // line 104
                    echo "                    ";
                    $context["break"] = false;
                    // line 105
                    echo "
                    ";
                    // line 106
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
                        // line 107
                        echo "                        ";
                        $context["continuar"] = false;
                        // line 108
                        echo "
                        ";
                        // line 109
                        if (twig_get_attribute($this->env, $this->source, $context["txt"], "created_at", [], "any", true, true, false, 109)) {
                            // line 110
                            echo "
                            ";
                            // line 111
                            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["txt"], "retweeted_status", [], "any", false, true, false, 111), "text", [], "any", true, true, false, 111)) {
                                // line 112
                                echo "
                                ";
                                // line 113
                                $context["fecha2"] = twig_date_format_filter($this->env, call_user_func_array($this->env->getFunction('stringToDateTime')->getCallable(), [twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["txt"], "retweeted_status", [], "any", false, false, false, 113), "created_at", [], "any", false, false, false, 113)]), "Y-m-d H:i:s");
                                // line 114
                                echo "                                ";
                                $context["tx"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["txt"], "retweeted_status", [], "any", false, false, false, 114), "text", [], "any", false, false, false, 114);
                                // line 115
                                echo "                                ";
                                $context["id_str"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["txt"], "retweeted_status", [], "any", false, false, false, 115), "id_str", [], "any", false, false, false, 115);
                                // line 116
                                echo "
                            ";
                            } else {
                                // line 118
                                echo "
                                ";
                                // line 119
                                $context["fecha2"] = twig_date_format_filter($this->env, call_user_func_array($this->env->getFunction('stringToDateTime')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["txt"], "created_at", [], "any", false, false, false, 119)]), "Y-m-d H:i:s");
                                // line 120
                                echo "                                ";
                                $context["tx"] = twig_get_attribute($this->env, $this->source, $context["txt"], "text", [], "any", false, false, false, 120);
                                // line 121
                                echo "                                ";
                                $context["id_str"] = twig_get_attribute($this->env, $this->source, $context["txt"], "id_str", [], "any", false, false, false, 121);
                                // line 122
                                echo "
                            ";
                            }
                            // line 124
                            echo "
                            ";
                            // line 125
                            $context["d"] = call_user_func_array($this->env->getFunction('diferenciaHoras')->getCallable(), [($context["fechaActualFormatada"] ?? null), ($context["fecha2"] ?? null)]);
                            // line 126
                            echo "
                            ";
                            // line 127
                            if ((-1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["d"] ?? null), "d", [], "any", false, false, false, 127), 2) && 0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["d"] ?? null), "m", [], "any", false, false, false, 127), 0))) {
                                // line 128
                                echo "
                                ";
                                // line 129
                                if (0 === twig_compare(($context["filtro"] ?? null), 1)) {
                                    // line 130
                                    echo "
                                    ";
                                    // line 131
                                    $context["buscamos"] = "traspas";
                                    // line 132
                                    echo "                                    ";
                                    if (!twig_in_filter(($context["buscamos"] ?? null), ($context["tx"] ?? null))) {
                                        // line 133
                                        echo "
                                        ";
                                        // line 134
                                        $context["buscamos"] = "cedido";
                                        // line 135
                                        echo "                                        ";
                                        if (!twig_in_filter(($context["buscamos"] ?? null), ($context["tx"] ?? null))) {
                                            // line 136
                                            echo "
                                            ";
                                            // line 137
                                            $context["buscamos"] = "fichaje";
                                            // line 138
                                            echo "                                            ";
                                            if (!twig_in_filter(($context["buscamos"] ?? null), ($context["tx"] ?? null))) {
                                                // line 139
                                                echo "
                                                ";
                                                // line 140
                                                $context["buscamos"] = "alta";
                                                // line 141
                                                echo "                                                ";
                                                if (!twig_in_filter(($context["buscamos"] ?? null), ($context["tx"] ?? null))) {
                                                    // line 142
                                                    echo "
                                                    ";
                                                    // line 143
                                                    $context["buscamos"] = "baja";
                                                    // line 144
                                                    echo "                                                    ";
                                                    if (!twig_in_filter(($context["buscamos"] ?? null), ($context["tx"] ?? null))) {
                                                        // line 145
                                                        echo "
                                                        ";
                                                        // line 146
                                                        $context["buscamos"] = "abon";
                                                        // line 147
                                                        echo "                                                        ";
                                                        if (!twig_in_filter(($context["buscamos"] ?? null), ($context["tx"] ?? null))) {
                                                            // line 148
                                                            echo "
                                                            ";
                                                            // line 149
                                                            $context["buscamos"] = "temporada";
                                                            // line 150
                                                            echo "                                                            ";
                                                            if (!twig_in_filter(($context["buscamos"] ?? null), ($context["tx"] ?? null))) {
                                                                // line 151
                                                                echo "                                                                ";
                                                                $context["continuar"] = true;
                                                                // line 152
                                                                echo "                                                            ";
                                                            }
                                                            // line 153
                                                            echo "
                                                        ";
                                                        }
                                                        // line 155
                                                        echo "

                                                    ";
                                                    }
                                                    // line 158
                                                    echo "


                                                ";
                                                }
                                                // line 162
                                                echo "


                                            ";
                                            }
                                            // line 166
                                            echo "

                                        ";
                                        }
                                        // line 169
                                        echo "

                                    ";
                                    }
                                    // line 172
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
                            // line 181
                            if (0 === twig_compare(($context["contador"] ?? null), 0)) {
                                // line 182
                                echo "                                ";
                                $context["hay"] = 1;
                                // line 183
                                echo "                                ";
                                $context["contador"] = (($context["contador"] ?? null) + 1);
                                // line 184
                                echo "                                ";
                                $context["pgEquipo"] = ((("/resultados-directo/equipo/" . call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["value"], "equipo", [], "any", false, false, false, 184)])) . "/") . twig_get_attribute($this->env, $this->source, $context["value"], "id", [], "any", false, false, false, 184));
                                // line 185
                                echo "

                                <div class=\"row filaEquipoTwitter\">

                                    <div class=\"col-12 filaEquipoTwitterContenedorNombreEquipo\">
                                        <a href=\"";
                                // line 190
                                echo twig_escape_filter($this->env, ($context["pgEquipo"] ?? null), "html", null, true);
                                echo "\">
                                            <h4 class=\"nombreEquipoTwitter\">";
                                // line 191
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["value"], "equipo", [], "any", false, false, false, 191), "html", null, true);
                                echo "</h4>
                                        </a>
                                    </div>

                                    <div class=\"col-6 col-md-3 contenedorLateralTwitterEquipo\">

                                        <div class=\"d-none\">
                                            ";
                                // line 198
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["value"], "idPais", [], "any", false, false, false, 198), "html", null, true);
                                echo "
                                        </div>

                                        <a class=\"twitterContenedorEscudoEquipo\" href=\"";
                                // line 201
                                echo twig_escape_filter($this->env, ($context["pgEquipo"] ?? null), "html", null, true);
                                echo "\">
                                            <img class=\"escudo_ind\" src=\"";
                                // line 202
                                echo twig_escape_filter($this->env, ($context["escudo"] ?? null), "html", null, true);
                                echo "\" alt=\"escudo\">
                                        </a>

                                        ";
                                // line 205
                                if (twig_get_attribute($this->env, $this->source, $context["value"], "club_id", [], "any", true, true, false, 205)) {
                                    // line 206
                                    echo "
                                            ";
                                    // line 207
                                    $context["enlaces"] = call_user_func_array($this->env->getFunction('enlaceAleatorioAmazon')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["value"], "club_id", [], "any", false, false, false, 207)]);
                                    // line 219
                                    echo "                                        ";
                                }
                                // line 220
                                echo "
                                    </div>
                                    <div class=\"col-6 col-md-9\">


                            ";
                            }
                            // line 226
                            echo "
                            ";
                            // line 227
                            if ((0 === twig_compare(($context["contador"] ?? null), 1) && 0 === twig_compare($context["k"], 2))) {
                                // line 228
                                echo "                                ";
                                $this->loadTemplate("__part/dentroTwitter.html.twig", "__part/pesLeerTwitsPortada.html.twig", 228)->display($context);
                                // line 229
                                echo "                            ";
                            }
                            // line 230
                            echo "

                            ";
                            // line 232
                            if (0 === twig_compare($context["k"], 5)) {
                                // line 233
                                echo "                                ";
                                $context["break"] = true;
                                // line 234
                                echo "                            ";
                            }
                            // line 235
                            echo "

                            ";
                            // line 237
                            $context["texto"] = call_user_func_array($this->env->getFunction('convertirUrls')->getCallable(), [($context["tx"] ?? null)]);
                            // line 238
                            echo "

                            ";
                            // line 240
                            if (( !(null === ($context["texto"] ?? null)) &&  !($context["break"] ?? null))) {
                                // line 241
                                echo "
                                <div class=\"row\">
                                    <div class=\"col-12 filaMensajeTwitter\">
                                        <span class=\"horaPublicacionTwitter\">
                                            ";
                                // line 245
                                echo twig_escape_filter($this->env, twig_slice($this->env, ($context["fecha2"] ?? null),  -8), "html", null, true);
                                echo "
                                        </span>
                                        <span style=\"color: #83ACAC;\">-</span>
                                        ";
                                // line 248
                                echo twig_replace_filter(                                // line 249
($context["texto"] ?? null), ["<a" => "<a target=\"_blank\"", "\"\"" => "\"", "\" \"" => "\""]);
                                // line 255
                                echo "
                                    </div>
                                </div>

                            ";
                            }
                            // line 260
                            echo "
                        ";
                        }
                        // line 262
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
                    // line 264
                    echo "
                    ";
                    // line 265
                    if (0 === twig_compare(($context["hay"] ?? null), 1)) {
                        // line 266
                        echo "                            </div>
                        </div>
                        ";
                        // line 268
                        $context["hay"] = 0;
                        // line 269
                        echo "                        ";
                        $context["contador"] = 0;
                        // line 270
                        echo "                    ";
                    }
                    // line 271
                    echo "
                ";
                }
                // line 273
                echo "

            ";
            }
            // line 276
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
        // line 279
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
        return array (  663 => 279,  647 => 276,  642 => 273,  638 => 271,  635 => 270,  632 => 269,  630 => 268,  626 => 266,  624 => 265,  621 => 264,  606 => 262,  602 => 260,  595 => 255,  593 => 249,  592 => 248,  586 => 245,  580 => 241,  578 => 240,  574 => 238,  572 => 237,  568 => 235,  565 => 234,  562 => 233,  560 => 232,  556 => 230,  553 => 229,  550 => 228,  548 => 227,  545 => 226,  537 => 220,  534 => 219,  532 => 207,  529 => 206,  527 => 205,  521 => 202,  517 => 201,  511 => 198,  501 => 191,  497 => 190,  490 => 185,  487 => 184,  484 => 183,  481 => 182,  479 => 181,  475 => 179,  470 => 176,  464 => 172,  459 => 169,  454 => 166,  448 => 162,  442 => 158,  437 => 155,  433 => 153,  430 => 152,  427 => 151,  424 => 150,  422 => 149,  419 => 148,  416 => 147,  414 => 146,  411 => 145,  408 => 144,  406 => 143,  403 => 142,  400 => 141,  398 => 140,  395 => 139,  392 => 138,  390 => 137,  387 => 136,  384 => 135,  382 => 134,  379 => 133,  376 => 132,  374 => 131,  371 => 130,  369 => 129,  366 => 128,  364 => 127,  361 => 126,  359 => 125,  356 => 124,  352 => 122,  349 => 121,  346 => 120,  344 => 119,  341 => 118,  337 => 116,  334 => 115,  331 => 114,  329 => 113,  326 => 112,  324 => 111,  321 => 110,  319 => 109,  316 => 108,  313 => 107,  296 => 106,  293 => 105,  290 => 104,  288 => 103,  285 => 102,  283 => 101,  279 => 99,  276 => 98,  274 => 97,  271 => 96,  265 => 94,  263 => 93,  260 => 92,  258 => 91,  255 => 90,  252 => 89,  250 => 88,  247 => 87,  245 => 86,  240 => 83,  234 => 81,  232 => 80,  229 => 79,  227 => 78,  223 => 76,  220 => 75,  217 => 74,  214 => 73,  211 => 72,  209 => 71,  206 => 70,  203 => 69,  200 => 68,  197 => 67,  194 => 66,  192 => 65,  189 => 64,  186 => 63,  183 => 62,  181 => 61,  178 => 60,  175 => 59,  172 => 58,  169 => 57,  152 => 56,  149 => 55,  146 => 54,  143 => 53,  140 => 52,  138 => 51,  127 => 45,  116 => 41,  113 => 40,  102 => 31,  100 => 30,  97 => 29,  95 => 28,  93 => 27,  88 => 24,  84 => 22,  82 => 21,  79 => 20,  75 => 18,  73 => 17,  71 => 16,  68 => 15,  64 => 13,  62 => 12,  59 => 11,  57 => 10,  55 => 9,  52 => 8,  48 => 6,  46 => 5,  43 => 4,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "__part/pesLeerTwitsPortada.html.twig", "/home/futbolme/domains/futbolme.com/public_html/v2/templates/__part/pesLeerTwitsPortada.html.twig");
    }
}
