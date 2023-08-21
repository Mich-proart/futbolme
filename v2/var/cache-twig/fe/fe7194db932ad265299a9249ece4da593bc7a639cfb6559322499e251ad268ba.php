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

/* jugador/index.html.twig */
class __TwigTemplate_4c0d1f617d0ed03c86dc6629cd6f5f4084ae71139881e63cc97aa9bc6ff14cce extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'contenedorIzquierda' => [$this, 'block_contenedorIzquierda'],
            'contenedorCentral' => [$this, 'block_contenedorCentral'],
            'bloqueJs' => [$this, 'block_bloqueJs'],
            'contenedorDerecha' => [$this, 'block_contenedorDerecha'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 10
        if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["jugador"] ?? null), "posicion", [], "any", false, false, false, 10), "1")) {
            // line 12
            $context["txt_jugador"] = "Portero";
            // line 13
            if (((isset($context["liga"]) || array_key_exists("liga", $context)) && 0 === twig_compare(($context["liga"] ?? null), 214))) {
                // line 14
                $context["txt_jugador"] = "Portera";
            }
        } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,         // line 17
($context["jugador"] ?? null), "posicion", [], "any", false, false, false, 17), "2")) {
            // line 19
            $context["txt_jugador"] = "Defensa";
        } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,         // line 21
($context["jugador"] ?? null), "posicion", [], "any", false, false, false, 21), "3")) {
            // line 23
            $context["txt_jugador"] = "Centrocampista";
        } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,         // line 25
($context["jugador"] ?? null), "posicion", [], "any", false, false, false, 25), "4")) {
            // line 27
            $context["txt_jugador"] = "Delantero";
        } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,         // line 29
($context["jugador"] ?? null), "posicion", [], "any", false, false, false, 29), "5")) {
            // line 31
            $context["txt_jugador"] = "Entrenado";
        } else {
            // line 35
            $context["txt_jugador"] = "Sin demarcación";
        }
        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "jugador/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_contenedorIzquierda($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "
    ";
        // line 6
        $this->loadTemplate("__part/ultimosEventos.html.twig", "jugador/index.html.twig", 6)->display($context);
        // line 7
        echo "
";
    }

    // line 39
    public function block_contenedorCentral($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 40
        echo "
    <div class=\"col-12 contenedorBlancoBordesRedondeadosConPadding\">
        <div class=\"row\">
            <div class=\"col-6 col-md-8 col-lg-8\">
                <h1>";
        // line 44
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["jugador"] ?? null), "nombre", [], "any", false, false, false, 44), "html", null, true);
        echo "</h1>
            </div>

            <div class=\"col-6 col-md-4 col-lg-4 text-right\">
                <strong>Equipo actual</strong><br />
                ";
        // line 49
        $context["enlace_equipo"] = $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_datos", ["idEquipo" => twig_get_attribute($this->env, $this->source,         // line 50
($context["jugador"] ?? null), "equipoActual_id", [], "any", false, false, false, 50), "slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,         // line 51
($context["jugador"] ?? null), "equipoActual", [], "any", false, false, false, 51)])]);
        // line 53
        echo "                <a class=\"pull-right\" href=\"";
        echo twig_escape_filter($this->env, ($context["enlace_equipo"] ?? null), "html", null, true);
        echo "\">
                    ";
        // line 54
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["jugador"] ?? null), "equipoActual", [], "any", false, false, false, 54), "html", null, true);
        echo "
                </a>
            </div>
        </div>

        ";
        // line 59
        $context["rutaJugador"] = (("static/img/jugadores/jugador" . twig_get_attribute($this->env, $this->source, ($context["jugador"] ?? null), "id", [], "any", false, false, false, 59)) . ".jpg");
        // line 60
        echo "        ";
        if ( !call_user_func_array($this->env->getFunction('fileExists')->getCallable(), [($context["rutaJugador"] ?? null)])) {
            // line 61
            echo "            ";
            $context["rutaJugador"] = "static/img/jugadores/NI.png";
            // line 62
            echo "        ";
        }
        // line 63
        echo "
        <div class=\"row\">
            <div class=\"col-5 col-md-3 col-lg-3\">
                <img width=\"100%\" src=\"/";
        // line 66
        echo twig_escape_filter($this->env, ($context["rutaJugador"] ?? null), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["jugador"] ?? null), "nombre", [], "any", false, false, false, 66), "html", null, true);
        echo "\">
            </div>
            <div class=\"col-9\">
                <p><span style=\"font-weight: bold;\">Nombre:</span> ";
        // line 69
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["jugador"] ?? null), "nombre", [], "any", false, false, false, 69), "html", null, true);
        echo "</p>
                <p><span style=\"font-weight: bold;\">Apodo:</span> ";
        // line 70
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["jugador"] ?? null), "apodo", [], "any", false, false, false, 70), "html", null, true);
        echo "</p>
                <p><span style=\"font-weight: bold;\">Nacimiento:</span>
                    ";
        // line 72
        if (0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["jugador"] ?? null), "fecha_nacimiento", [], "any", false, false, false, 72), "1900-01-01")) {
            // line 73
            echo "                        ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["jugador"] ?? null), "fecha_nacimiento", [], "any", false, false, false, 73), "html", null, true);
            echo "
                    ";
        }
        // line 75
        echo "                </p>
                <p><span style=\"font-weight: bold;\">Lugar de nacimiento:</span> ";
        // line 76
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["jugador"] ?? null), "lugar_nacimiento", [], "any", false, false, false, 76), "html", null, true);
        echo "</p>
                <p><span style=\"font-weight: bold;\">Peso:</span>
                    ";
        // line 78
        if (0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["jugador"] ?? null), "peso", [], "any", false, false, false, 78), 0)) {
            // line 79
            echo "                        ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["jugador"] ?? null), "peso", [], "any", false, false, false, 79), "html", null, true);
            echo "
                    ";
        }
        // line 81
        echo "                </p>
                <p><span style=\"font-weight: bold;\">Altura:</span>
                    ";
        // line 83
        if (0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["jugador"] ?? null), "altura", [], "any", false, false, false, 83), 0)) {
            // line 84
            echo "                        ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["jugador"] ?? null), "altura", [], "any", false, false, false, 84), "html", null, true);
            echo "
                    ";
        }
        // line 86
        echo "            </div>
        </div>

        <div class=\"row\">
            <div class=\"col-12\">
                <strong>";
        // line 91
        echo twig_escape_filter($this->env, ($context["txt_jugador"] ?? null), "html", null, true);
        echo "</strong>
            </div>
        </div>

        <div class=\"row\">
            <div class=\"col-12\">
                ";
        // line 97
        if (call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_MOBILE__"])) {
            // line 98
            echo "                    ";
            $context["espacio"] = "jugadorCabeceraMobile";
            // line 99
            echo "                ";
        } else {
            // line 100
            echo "                    ";
            $context["espacio"] = "jugadorCabecera";
            // line 101
            echo "                ";
        }
        // line 102
        echo "                ";
        $this->loadTemplate("publicidad/publiGestion.html.twig", "jugador/index.html.twig", 102)->display($context);
        // line 103
        echo "            </div>
        </div>

        <div class=\"row\" style=\"margin-top: 10px;\">
            <div class=\"col-12\">
                <h2 class=\"subtitulo\">Palmarés</h2>
                ";
        // line 109
        echo nl2br(twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["jugador"] ?? null), "palmares", [], "any", false, false, false, 109), "html", null, true));
        echo "
            </div>
        </div>

        <div class=\"row\" style=\"margin-top: 10px;\">
            <div class=\"col-12\">
                <h2 class=\"subtitulo\">Características</h2>
                ";
        // line 116
        echo nl2br(twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["jugador"] ?? null), "caracteristicas", [], "any", false, false, false, 116), "html", null, true));
        echo "
            </div>
        </div>

        <div class=\"row\">
            <div class=\"col-12\">
                ";
        // line 122
        if (call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_MOBILE__"])) {
            // line 123
            echo "                    ";
            $context["espacio"] = "jugadorContenidoMobile";
            // line 124
            echo "                ";
        } else {
            // line 125
            echo "                    ";
            $context["espacio"] = "jugadorContenido";
            // line 126
            echo "                ";
        }
        // line 127
        echo "                ";
        $this->loadTemplate("publicidad/publiGestion.html.twig", "jugador/index.html.twig", 127)->display($context);
        // line 128
        echo "            </div>
        </div>

        ";
        // line 131
        if (1 === twig_compare(twig_length_filter($this->env, ($context["tarjetas"] ?? null)), 0)) {
            // line 132
            echo "
            <table class=\"table\">
                <tr>
                    Tarjetas
                </tr>
                ";
            // line 137
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["tarjetas"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["partido"]) {
                // line 138
                echo "
                    ";
                // line 139
                $context["enlace_partido"] = $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("partido_index", ["idPartido" => twig_get_attribute($this->env, $this->source,                 // line 140
$context["partido"], "partido_id", [], "any", false, false, false, 140), "slug" => ((call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,                 // line 141
$context["partido"], "local", [], "any", false, false, false, 141)]) . "-") . call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["partido"], "visitante", [], "any", false, false, false, 141)]))]);
                // line 143
                echo "
                    <tr>
                        <td>
                            <div class=\"row\">
                                <div class=\"col-6\">
                                    <a href=\"";
                // line 148
                echo twig_escape_filter($this->env, ($context["enlace_partido"] ?? null), "html", null, true);
                echo "\">
                <span class=\"glyphicon glyphicon-eye-open iconhover\" style=\"cursor:pointer;
                border: 1px solid black; padding:3px;\" title=\"Partido entre ";
                // line 150
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "local", [], "any", false, false, false, 150), "html", null, true);
                echo " y ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "visitante", [], "any", false, false, false, 150), "html", null, true);
                echo "\"></span></a>

                                    ";
                // line 152
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "local", [], "any", false, false, false, 152), "html", null, true);
                echo "
                                    <b>";
                // line 153
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "goles_local", [], "any", false, false, false, 153), "html", null, true);
                echo "  - ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "goles_visitante", [], "any", false, false, false, 153), "html", null, true);
                echo "</b>
                                    ";
                // line 154
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "visitante", [], "any", false, false, false, 154), "html", null, true);
                echo "<br />
                                    <a href=\"/temporada.php?id=";
                // line 155
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "temporada_id", [], "any", false, false, false, 155), "html", null, true);
                echo "&jornada=";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "jornada", [], "any", false, false, false, 155), "html", null, true);
                echo "\">Jornada ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "jornada", [], "any", false, false, false, 155), "html", null, true);
                echo "</a>
                                </div>
                                <div class=\"col-6\">

                                    ";
                // line 159
                $context["minuto"] = twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "minuto", [], "any", false, false, false, 159),  -2);
                // line 160
                echo "                                    ";
                $context["parte"] = twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "minuto", [], "any", false, false, false, 160), 0, 1);
                // line 161
                echo "
                                    ";
                // line 162
                if (0 === twig_compare(($context["parte"] ?? null), 1)) {
                    // line 163
                    echo "                                        1ª parte
                                    ";
                } else {
                    // line 165
                    echo "                                        2ª parte
                                    ";
                }
                // line 167
                echo "
                                    ";
                // line 168
                echo twig_escape_filter($this->env, ($context["minuto"] ?? null), "html", null, true);
                echo "

                                    ";
                // line 170
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "tipo", [], "any", false, false, false, 170), 0)) {
                    // line 171
                    echo "                                        <img src=\"/static/img/ta.png\" height=\"17\" style=\"margin-bottom:3px\"></span>
                                    ";
                }
                // line 173
                echo "
                                    ";
                // line 174
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "tipo", [], "any", false, false, false, 174), 1)) {
                    // line 175
                    echo "                                        <img src=\"/static/img/ta2.png\" height=\"17\" style=\"margin-bottom:3px\"></span>
                                    ";
                }
                // line 177
                echo "
                                    ";
                // line 178
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "tipo", [], "any", false, false, false, 178), 5)) {
                    // line 179
                    echo "                                        <img src=\"/static/img/tr.png\" height=\"17\" style=\"margin-bottom:3px\"></span>
                                    ";
                }
                // line 181
                echo "                                </div>
                            </div>
                        </td>
                    </tr>


                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['partido'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 188
            echo "            </table>

        ";
        }
        // line 191
        echo "
        ";
        // line 192
        if (1 === twig_compare(twig_length_filter($this->env, ($context["golesPartido"] ?? null)), 0)) {
            // line 193
            echo "
            <table class=\"table\">
                <tr>
                    Goles
                </tr>
                ";
            // line 198
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["golesPartido"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["partido"]) {
                // line 199
                echo "
                    ";
                // line 200
                $context["enlace_partido"] = $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("partido_index", ["idPartido" => twig_get_attribute($this->env, $this->source,                 // line 201
$context["partido"], "partido_id", [], "any", false, false, false, 201), "slug" => ((call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,                 // line 202
$context["partido"], "local", [], "any", false, false, false, 202)]) . "-") . call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["partido"], "visitante", [], "any", false, false, false, 202)]))]);
                // line 204
                echo "
                    <tr>
                        <td>
                            <div class=\"row\">
                                <div class=\"col-6\">
                                    <a style=\"color: #434343;\" href=\"";
                // line 209
                echo twig_escape_filter($this->env, ($context["enlace_partido"] ?? null), "html", null, true);
                echo "\" title=\"Partido entre ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "local", [], "any", false, false, false, 209), "html", null, true);
                echo " y ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "visitante", [], "any", false, false, false, 209), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "local", [], "any", false, false, false, 209), "html", null, true);
                echo "
                                        <b>";
                // line 210
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "goles_local", [], "any", false, false, false, 210), "html", null, true);
                echo "  - ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "goles_visitante", [], "any", false, false, false, 210), "html", null, true);
                echo "</b>
                                        ";
                // line 211
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "visitante", [], "any", false, false, false, 211), "html", null, true);
                echo "</a>

                                    <br />
                                    <a style=\"color: #434343;\" href=\"/temporada.php?id=";
                // line 214
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "temporada_id", [], "any", false, false, false, 214), "html", null, true);
                echo "&jornada=";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "jornada", [], "any", false, false, false, 214), "html", null, true);
                echo "\">Jornada ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "jornada", [], "any", false, false, false, 214), "html", null, true);
                echo "</a>
                                </div>
                                <div class=\"col-6\">
                                    ";
                // line 217
                $context["cadena"] = call_user_func_array($this->env->getFunction('desglosarTexto')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["partido"], "observaciones", [], "any", false, false, false, 217)]);
                // line 218
                echo "                                    ";
                $context["gl"] = twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["cadena"] ?? null), 1, [], "any", false, false, false, 218), "<br />");
                // line 219
                echo "                                    ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["gl"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["vl"]) {
                    // line 220
                    echo "                                        ";
                    if (twig_in_filter(twig_trim_filter(twig_get_attribute($this->env, $this->source, ($context["jugador"] ?? null), "apodo", [], "any", false, false, false, 220)), $context["vl"])) {
                        // line 221
                        echo "                                            ";
                        echo $context["vl"];
                        echo "<br />
                                        ";
                    }
                    // line 223
                    echo "                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['vl'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 224
                echo "                                    ";
                $context["gl"] = twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["cadena"] ?? null), 2, [], "any", false, false, false, 224), "<br />");
                // line 225
                echo "                                    ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["gl"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["vl"]) {
                    // line 226
                    echo "                                        ";
                    if (twig_in_filter(twig_trim_filter(twig_get_attribute($this->env, $this->source, ($context["jugador"] ?? null), "apodo", [], "any", false, false, false, 226)), $context["vl"])) {
                        // line 227
                        echo "                                            ";
                        echo $context["vl"];
                        echo "<br />
                                        ";
                    }
                    // line 229
                    echo "                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['vl'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 230
                echo "                                </div>
                            </div>
                        </td>
                    </tr>


                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['partido'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 237
            echo "            </table>

        ";
        }
        // line 240
        echo "
    </div>

";
    }

    // line 245
    public function block_bloqueJs($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 246
        echo "


";
    }

    // line 253
    public function block_contenedorDerecha($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 254
        echo "

";
    }

    public function getTemplateName()
    {
        return "jugador/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  559 => 254,  555 => 253,  548 => 246,  544 => 245,  537 => 240,  532 => 237,  520 => 230,  514 => 229,  508 => 227,  505 => 226,  500 => 225,  497 => 224,  491 => 223,  485 => 221,  482 => 220,  477 => 219,  474 => 218,  472 => 217,  462 => 214,  456 => 211,  450 => 210,  440 => 209,  433 => 204,  431 => 202,  430 => 201,  429 => 200,  426 => 199,  422 => 198,  415 => 193,  413 => 192,  410 => 191,  405 => 188,  393 => 181,  389 => 179,  387 => 178,  384 => 177,  380 => 175,  378 => 174,  375 => 173,  371 => 171,  369 => 170,  364 => 168,  361 => 167,  357 => 165,  353 => 163,  351 => 162,  348 => 161,  345 => 160,  343 => 159,  332 => 155,  328 => 154,  322 => 153,  318 => 152,  311 => 150,  306 => 148,  299 => 143,  297 => 141,  296 => 140,  295 => 139,  292 => 138,  288 => 137,  281 => 132,  279 => 131,  274 => 128,  271 => 127,  268 => 126,  265 => 125,  262 => 124,  259 => 123,  257 => 122,  248 => 116,  238 => 109,  230 => 103,  227 => 102,  224 => 101,  221 => 100,  218 => 99,  215 => 98,  213 => 97,  204 => 91,  197 => 86,  191 => 84,  189 => 83,  185 => 81,  179 => 79,  177 => 78,  172 => 76,  169 => 75,  163 => 73,  161 => 72,  156 => 70,  152 => 69,  144 => 66,  139 => 63,  136 => 62,  133 => 61,  130 => 60,  128 => 59,  120 => 54,  115 => 53,  113 => 51,  112 => 50,  111 => 49,  103 => 44,  97 => 40,  93 => 39,  88 => 7,  86 => 6,  83 => 5,  79 => 4,  74 => 1,  71 => 35,  68 => 31,  66 => 29,  64 => 27,  62 => 25,  60 => 23,  58 => 21,  56 => 19,  54 => 17,  51 => 14,  49 => 13,  47 => 12,  45 => 10,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "jugador/index.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/jugador/index.html.twig");
    }
}
