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

/* equipo/__part/clasificacionEstadisticas.html.twig */
class __TwigTemplate_0d14c334a80df2b6052b50558bc169ad3b8d0cb798a0d9da4b59dffe557ad17d extends Template
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
        echo "<div class=\"col-12 contenedorBlancoBordesRedondeados\" style=\"margin-top: 20px; padding-top: 10px;\">
    <h2 class=\"subtitulo\">Puntos</h2>

    ";
        // line 4
        if ( !twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "equipo_id", [], "any", true, true, false, 4)) {
            // line 5
            echo "        ";
            if ( !(isset($context["fila"]) || array_key_exists("fila", $context))) {
                // line 6
                echo "            ";
                $context["fila"] = [];
                // line 7
                echo "        ";
            }
            // line 8
            echo "        ";
            $context["fila"] = call_user_func_array($this->env->getFunction('anadirAArrayKey')->getCallable(), [($context["fila"] ?? null), "equipo_id", ($context["equipo_id"] ?? null)]);
            // line 9
            echo "    ";
        }
        // line 10
        echo "
    ";
        // line 11
        $this->loadTemplate("graficos/_linea2.html.twig", "equipo/__part/clasificacionEstadisticas.html.twig", 11)->display($context);
        // line 12
        echo "
    <div class=\"row\">
        <div class=\"col-12 col-md-6\">
            <div id='c";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "equipo_id", [], "any", false, false, false, 15), "html", null, true);
        echo "' style='float:left; width: 100%; height: 150px; margin: 0 auto'></div>
        </div>
        <div class=\"col-12 col-md-6\">
            ";
        // line 18
        echo ($context["te_u_punto"] ?? null);
        echo "
            ";
        // line 19
        echo ($context["te_u_victoria"] ?? null);
        echo "
            ";
        // line 20
        echo ($context["te_u_empate"] ?? null);
        echo "
            ";
        // line 21
        echo ($context["te_u_derrota"] ?? null);
        echo "
        </div>
    </div>
</div>


";
        // line 27
        if ((isset($context["estadisticas"]) || array_key_exists("estadisticas", $context))) {
            // line 28
            echo "    <div class=\"col-12 contenedorBlancoBordesRedondeados\" style=\"margin-top: 20px; padding-top: 10px;\">
        ";
            // line 29
            $context["estad"] = null;
            // line 30
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["estadisticas"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 31
                echo "            ";
                if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["value"], "tipo_torneo", [], "any", false, false, false, 31), 1) && (null === ($context["estad"] ?? null)))) {
                    // line 32
                    echo "                ";
                    $context["estad"] = $context["value"];
                    // line 33
                    echo "            ";
                }
                // line 34
                echo "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 35
            echo "
        ";
            // line 36
            $context["maximo"] = 0;
            // line 37
            echo "        ";
            $context["ar1"] = (((((("{y: " . twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "galocal", [], "any", false, false, false, 37)) . ",
        color: \"green\"},
        {y: ") . twig_get_attribute($this->env, $this->source,             // line 39
($context["estad"] ?? null), "emlocal", [], "any", false, false, false, 39)) . ",
        color: \"orange\"},
        {y: ") . twig_get_attribute($this->env, $this->source,             // line 41
($context["estad"] ?? null), "pelocal", [], "any", false, false, false, 41)) . ",
        color: \"red\"}");
            // line 43
            echo "
        ";
            // line 44
            $context["ar2"] = (((((("{y: " . twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "gavisitante", [], "any", false, false, false, 44)) . ",
        color: \"#58FA82\"},
        {y: ") . twig_get_attribute($this->env, $this->source,             // line 46
($context["estad"] ?? null), "emvisitante", [], "any", false, false, false, 46)) . ",
        color: \"#F5DA81\"},
        {y: ") . twig_get_attribute($this->env, $this->source,             // line 48
($context["estad"] ?? null), "pevisitante", [], "any", false, false, false, 48)) . ",
        color: \"#F78181\"}");
            // line 50
            echo "
        ";
            // line 51
            if (1 === twig_compare((twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "galocal", [], "any", false, false, false, 51) + twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "gavisitante", [], "any", false, false, false, 51)), ($context["maximo"] ?? null))) {
                // line 52
                echo "            ";
                $context["maximo"] = (twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "galocal", [], "any", false, false, false, 52) + twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "gavisitante", [], "any", false, false, false, 52));
                // line 53
                echo "        ";
            }
            // line 54
            echo "
        ";
            // line 55
            if (1 === twig_compare((twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "emlocal", [], "any", false, false, false, 55) + twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "emvisitante", [], "any", false, false, false, 55)), ($context["maximo"] ?? null))) {
                // line 56
                echo "            ";
                $context["maximo"] = (twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "emlocal", [], "any", false, false, false, 56) + twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "emvisitante", [], "any", false, false, false, 56));
                // line 57
                echo "        ";
            }
            // line 58
            echo "
        ";
            // line 59
            if (1 === twig_compare((twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "pelocal", [], "any", false, false, false, 59) + twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "pevisitante", [], "any", false, false, false, 59)), ($context["maximo"] ?? null))) {
                // line 60
                echo "            ";
                $context["maximo"] = (twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "pelocal", [], "any", false, false, false, 60) + twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "pevisitante", [], "any", false, false, false, 60));
                // line 61
                echo "        ";
            }
            // line 62
            echo "
        ";
            // line 63
            $context["maximo"] = (($context["maximo"] ?? null) + 1);
            // line 64
            echo "        ";
            $context["contenedor"] = "partidos";
            // line 65
            echo "        ";
            $context["tipo"] = "column";
            // line 66
            echo "        ";
            $context["a"] = "'<b>Ganados</b>', '<b>Empatados</b>', '<b>Perdidos</b>'";
            // line 67
            echo "
        <h2 class=\"subtitulo\">Partidos</h2>

        ";
            // line 70
            $this->loadTemplate("graficos/columnaGEP.html.twig", "equipo/__part/clasificacionEstadisticas.html.twig", 70)->display($context);
            // line 71
            echo "
        <div class=\"row\">
            <div class=\"col-12 col-md-7\">


                ";
            // line 76
            if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "galocal", [], "any", false, false, false, 76), 0)) {
                // line 77
                echo "                    ";
                if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "galocal", [], "any", false, false, false, 77), 1)) {
                    // line 78
                    echo "                        <br /><b>Como local</b> el ";
                    echo twig_escape_filter($this->env, ($context["equipotxt"] ?? null), "html", null, true);
                    echo " ha ganado ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "galocal", [], "any", false, false, false, 78), "html", null, true);
                    echo " partidos,
                    ";
                } else {
                    // line 80
                    echo "                        <br /><b>Como local</b> el ";
                    echo twig_escape_filter($this->env, ($context["equipotxt"] ?? null), "html", null, true);
                    echo " solo ha ganado un partido,
                    ";
                }
                // line 82
                echo "                ";
            } else {
                // line 83
                echo "                    <b>Como local</b> el ";
                echo twig_escape_filter($this->env, ($context["equipotxt"] ?? null), "html", null, true);
                echo " no conoce la victoria,
                ";
            }
            // line 85
            echo "
                ";
            // line 86
            if (twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "emlocal", [], "any", false, false, false, 86)) {
                // line 87
                echo "                    ";
                if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "emlocal", [], "any", false, false, false, 87), 1)) {
                    // line 88
                    echo "                        ha empatado ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "emlocal", [], "any", false, false, false, 88), "html", null, true);
                    echo " partidos
                    ";
                } else {
                    // line 90
                    echo "                        ha empatado solo un partido
                    ";
                }
                // line 92
                echo "                ";
            } else {
                // line 93
                echo "                    no ha empatado ningún partido
                ";
            }
            // line 95
            echo "

                ";
            // line 97
            if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "pelocal", [], "any", false, false, false, 97), 0)) {
                // line 98
                echo "                    ";
                if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "pelocal", [], "any", false, false, false, 98), 1)) {
                    // line 99
                    echo "                        y ha perdido ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "pelocal", [], "any", false, false, false, 99), "html", null, true);
                    echo " partidos,
                    ";
                } else {
                    // line 101
                    echo "                        y solo ha perdido un partido,
                    ";
                }
                // line 103
                echo "                ";
            } else {
                // line 104
                echo "                    y no ha perdido ninguno,
                ";
            }
            // line 106
            echo "
                ";
            // line 107
            $context["puntosL"] = ((twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "galocal", [], "any", false, false, false, 107) * 3) + twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "emlocal", [], "any", false, false, false, 107));
            // line 108
            echo "                por lo tanto ha conseguido en casa ";
            echo twig_escape_filter($this->env, ($context["puntosL"] ?? null), "html", null, true);
            echo " puntos.


                ";
            // line 111
            if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "gavisitante", [], "any", false, false, false, 111), 0)) {
                // line 112
                echo "                    ";
                if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "gavisitante", [], "any", false, false, false, 112), 1)) {
                    // line 113
                    echo "                        <br /><br /><b>Como visitante</b> el ";
                    echo twig_escape_filter($this->env, ($context["equipotxt"] ?? null), "html", null, true);
                    echo " ha ganado ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "gavisitante", [], "any", false, false, false, 113), "html", null, true);
                    echo " partidos,
                    ";
                } else {
                    // line 115
                    echo "                        <br /><br /><b>Como visitante</b> el ";
                    echo twig_escape_filter($this->env, ($context["equipotxt"] ?? null), "html", null, true);
                    echo " solo ha ganado un partido,
                    ";
                }
                // line 117
                echo "                ";
            } else {
                // line 118
                echo "                    <br /><br /><b>Como visitante</b> el ";
                echo twig_escape_filter($this->env, ($context["equipotxt"] ?? null), "html", null, true);
                echo " no conoce la victoria,
                ";
            }
            // line 120
            echo "
                ";
            // line 121
            if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "emvisitante", [], "any", false, false, false, 121), 0)) {
                // line 122
                echo "                    ";
                if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "emvisitante", [], "any", false, false, false, 122), 1)) {
                    // line 123
                    echo "                        ha empatado ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "emvisitante", [], "any", false, false, false, 123), "html", null, true);
                    echo " partidos
                    ";
                } else {
                    // line 125
                    echo "                        ha empatado solo un partido
                    ";
                }
                // line 127
                echo "                ";
            } else {
                // line 128
                echo "                    no ha empatado ningún partido
                ";
            }
            // line 130
            echo "

                ";
            // line 132
            if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "pevisitante", [], "any", false, false, false, 132), 0)) {
                // line 133
                echo "                    ";
                if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "pevisitante", [], "any", false, false, false, 133), 1)) {
                    // line 134
                    echo "                        y ha perdido ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "pevisitante", [], "any", false, false, false, 134), "html", null, true);
                    echo " partidos,
                    ";
                } else {
                    // line 136
                    echo "                        y solo ha perdido un partido,
                    ";
                }
                // line 138
                echo "                ";
            } else {
                // line 139
                echo "                    y no ha perdido ninguno,
                ";
            }
            // line 141
            echo "
                ";
            // line 142
            $context["puntosV"] = ((twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "gavisitante", [], "any", false, false, false, 142) * 3) + twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "emvisitante", [], "any", false, false, false, 142));
            // line 143
            echo "                por lo tanto ha conseguido fuera de casa ";
            echo twig_escape_filter($this->env, ($context["puntosV"] ?? null), "html", null, true);
            echo " puntos.

            </div>
            <div class=\"col-12 col-md-5\">
                <div id=\"c-";
            // line 147
            echo twig_escape_filter($this->env, ($context["contenedor"] ?? null), "html", null, true);
            echo "\" style=\"float:right; width: 230px; height: 200px; margin: 0 auto\"></div>
            </div>
        </div>


    </div>
    <div class=\"col-12 contenedorBlancoBordesRedondeados\" style=\"margin-top: 20px; padding-top: 10px;\">

        ";
            // line 155
            $context["maximo"] = 0;
            // line 156
            echo "        ";
            $context["ar1"] = (((("{y: " . twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "gflocal", [], "any", false, false, false, 156)) . ",
        color: \"#0489B1\"},
        {y: ") . twig_get_attribute($this->env, $this->source,             // line 158
($context["estad"] ?? null), "gclocal", [], "any", false, false, false, 158)) . ",
        color: \"#A4A4A4\"}");
            // line 160
            echo "        ";
            $context["ar2"] = (((("{y: " . twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "gfvisitante", [], "any", false, false, false, 160)) . ",
        color: \"#0B4C5F\"},
        {y: ") . twig_get_attribute($this->env, $this->source,             // line 162
($context["estad"] ?? null), "gcvisitante", [], "any", false, false, false, 162)) . ",
        color: \"#585858\"}");
            // line 164
            echo "
        ";
            // line 165
            if (1 === twig_compare((twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "gflocal", [], "any", false, false, false, 165) + twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "gfvisitante", [], "any", false, false, false, 165)), ($context["maximo"] ?? null))) {
                // line 166
                echo "            ";
                $context["maximo"] = (twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "gflocal", [], "any", false, false, false, 166) + twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "gfvisitante", [], "any", false, false, false, 166));
                // line 167
                echo "        ";
            }
            // line 168
            echo "
        ";
            // line 169
            if (1 === twig_compare((twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "gclocal", [], "any", false, false, false, 169) + twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "gcvisitante", [], "any", false, false, false, 169)), ($context["maximo"] ?? null))) {
                // line 170
                echo "            ";
                $context["maximo"] = (twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "gclocal", [], "any", false, false, false, 170) + twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "gcvisitante", [], "any", false, false, false, 170));
                // line 171
                echo "        ";
            }
            // line 172
            echo "
        ";
            // line 173
            $context["maximo"] = (($context["maximo"] ?? null) + 1);
            // line 174
            echo "        ";
            $context["contenedor"] = "goles";
            // line 175
            echo "        ";
            $context["tipo"] = "column";
            // line 176
            echo "        ";
            $context["a"] = "'<b>A favor</b>', '<b>En contra</b>'";
            // line 177
            echo "

        <div class=\"row\">
            <div class=\"col-12\">
                <h2 class=\"subtitulo\">Goles</h2>
            </div>
        </div>

        <div class=\"row\">
            <div class=\"col-12 div col-md-5\">
                ";
            // line 187
            $this->loadTemplate("graficos/columnaGEP.html.twig", "equipo/__part/clasificacionEstadisticas.html.twig", 187)->display($context);
            // line 188
            echo "                <div id=\"c-";
            echo twig_escape_filter($this->env, ($context["contenedor"] ?? null), "html", null, true);
            echo "\" style=\"float:left; width: 200px; height: 200px; margin: 0 auto\"></div>
            </div>
            <div class=\"col-12 div col-md-7\">
                ";
            // line 191
            if (-1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "gflocal", [], "any", false, false, false, 191), twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "gfvisitante", [], "any", false, false, false, 191))) {
                // line 192
                echo "                    ";
                echo twig_escape_filter($this->env, (((((("El " . ($context["equipotxt"] ?? null)) . " ha conseguido más goles como visitante (") . twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "gfvisitante", [], "any", false, false, false, 192)) . ") que como local (") . twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "gflocal", [], "any", false, false, false, 192)) . ")."), "html", null, true);
                echo "
                ";
            }
            // line 194
            echo "

                 ";
            // line 196
            if (-1 === twig_compare(($context["liga"] ?? null), 25)) {
                // line 197
                echo "
                     <h3 class=\"subtitulo\" style=\"margin-top: 10px; margin-bottom: 5px;\">Los goles a favor como local</h3>

                     Estos <b>";
                // line 200
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "gflocal", [], "any", false, false, false, 200), "html", null, true);
                echo "</b> goles fueron conseguidos <b>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["goles"] ?? null), "fv_l_1t", [], "any", false, false, false, 200), "html", null, true);
                echo "</b> en la primera parte y
                     <b>";
                // line 201
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["goles"] ?? null), "fv_l_2t", [], "any", false, false, false, 201), "html", null, true);
                echo "</b> en la segunda.

                     ";
                // line 203
                if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["goles"] ?? null), "propia_fv_l", [], "any", false, false, false, 203), 0)) {
                    // line 204
                    echo "                         ";
                    if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["goles"] ?? null), "propia_fv_l", [], "any", false, false, false, 204), 1)) {
                        // line 205
                        echo "                             Hay que añadir <b>";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["goles"] ?? null), "propia_fv_l", [], "any", false, false, false, 205), "html", null, true);
                        echo "</b> goles que anotaron en propia puerta sus rivales.
                         ";
                    } else {
                        // line 207
                        echo "                             Hay que añadir <b>1</b> gol que anotaron en propia puerta a su favor.
                         ";
                    }
                    // line 209
                    echo "                     ";
                }
                // line 210
                echo "
                     ";
                // line 211
                if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["goles"] ?? null), "penal_fv_l", [], "any", false, false, false, 211), 0)) {
                    // line 212
                    echo "                         ";
                    if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["goles"] ?? null), "penal_fv_l", [], "any", false, false, false, 212), 1)) {
                        // line 213
                        echo "                             De estos goles <b>";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["goles"] ?? null), "penal_fv_l", [], "any", false, false, false, 213), "html", null, true);
                        echo "</b> fuerón de penalti.
                         ";
                    } else {
                        // line 215
                        echo "                             De estos goles <b>1</b> fué de penalti.
                         ";
                    }
                    // line 217
                    echo "                     ";
                }
                // line 218
                echo "
                     <h3 class=\"subtitulo\" style=\"margin-top: 10px; margin-bottom: 5px;\">Los goles a favor como visitante</h3>
                     Estos <b>";
                // line 220
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "gfvisitante", [], "any", false, false, false, 220), "html", null, true);
                echo "</b> goles fueron conseguidos <b>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["goles"] ?? null), "fv_v_1t", [], "any", false, false, false, 220), "html", null, true);
                echo "</b> en la primera parte y
                     <b>";
                // line 221
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["goles"] ?? null), "fv_v_2t", [], "any", false, false, false, 221), "html", null, true);
                echo "</b> en la segunda.

                     ";
                // line 223
                if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["goles"] ?? null), "propia_fv_v", [], "any", false, false, false, 223), 0)) {
                    // line 224
                    echo "                         ";
                    if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["goles"] ?? null), "propia_fv_v", [], "any", false, false, false, 224), 1)) {
                        // line 225
                        echo "                             Hay que añadir <b>";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["goles"] ?? null), "propia_fv_v", [], "any", false, false, false, 225), "html", null, true);
                        echo "</b> goles que anotaron en propia puerta sus rivales.
                         ";
                    } else {
                        // line 227
                        echo "                             Hay que añadir <b>1</b> gol que anotaron en propia puerta a su favor.
                         ";
                    }
                    // line 229
                    echo "                     ";
                }
                // line 230
                echo "

                     ";
                // line 232
                if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["goles"] ?? null), "penal_fv_v", [], "any", false, false, false, 232), 0)) {
                    // line 233
                    echo "                         ";
                    if (1 === twig_compare((($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["goles"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4["penal_fv_v"] ?? null) : null), 1)) {
                        // line 234
                        echo "                             De estos goles <b>";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["goles"] ?? null), "penal_fv_v", [], "any", false, false, false, 234), "html", null, true);
                        echo "</b> fuerón de penalti.
                         ";
                    } else {
                        // line 236
                        echo "                             De estos goles <b>1</b> fué de penalti.
                         ";
                    }
                    // line 238
                    echo "                     ";
                }
                // line 239
                echo "

                     <h3 class=\"subtitulo\" style=\"margin-top: 10px; margin-bottom: 5px;\">Los goles en contra como local</h3>
                     Estos <b>";
                // line 242
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "gclocal", [], "any", false, false, false, 242), "html", null, true);
                echo "</b> goles fueron encajados <b>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["goles"] ?? null), "ct_l_1t", [], "any", false, false, false, 242), "html", null, true);
                echo "</b> en la primera parte y
                     <b>";
                // line 243
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["goles"] ?? null), "ct_l_2t", [], "any", false, false, false, 243), "html", null, true);
                echo "</b> en la segunda.


                     ";
                // line 246
                if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["goles"] ?? null), "propia_ct_l", [], "any", false, false, false, 246), 0)) {
                    // line 247
                    echo "                         ";
                    if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["goles"] ?? null), "propia_ct_l", [], "any", false, false, false, 247), 1)) {
                        // line 248
                        echo "                             Hay que añadir <b>";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["goles"] ?? null), "propia_ct_l", [], "any", false, false, false, 248), "html", null, true);
                        echo "</b> goles que anotaron en propia puerta sus rivales.
                         ";
                    } else {
                        // line 250
                        echo "                             Hay que añadir <b>1</b> gol que anotaron en propia puerta a su favor.
                         ";
                    }
                    // line 252
                    echo "                     ";
                }
                // line 253
                echo "

                     ";
                // line 255
                if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["goles"] ?? null), "penal_ct_l", [], "any", false, false, false, 255), 0)) {
                    // line 256
                    echo "                         ";
                    if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["goles"] ?? null), "penal_ct_l", [], "any", false, false, false, 256), 1)) {
                        // line 257
                        echo "                             De estos goles <b>";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["goles"] ?? null), "penal_ct_l", [], "any", false, false, false, 257), "html", null, true);
                        echo "</b> fuerón de penalti.
                         ";
                    } else {
                        // line 259
                        echo "                             De estos goles <b>1</b> fué de penalti.
                         ";
                    }
                    // line 261
                    echo "                     ";
                }
                // line 262
                echo "

                     <h3 class=\"subtitulo\" style=\"margin-top: 10px; margin-bottom: 5px;\">Los goles en contra como visitante</h3>
                     Estos <b>";
                // line 265
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["estad"] ?? null), "gcvisitante", [], "any", false, false, false, 265), "html", null, true);
                echo "</b> goles fueron encajados <b>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["goles"] ?? null), "ct_v_1t", [], "any", false, false, false, 265), "html", null, true);
                echo "</b> en la primera parte y
                     <b>";
                // line 266
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["goles"] ?? null), "ct_v_2t", [], "any", false, false, false, 266), "html", null, true);
                echo "</b> en la segunda.

                     ";
                // line 268
                if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["goles"] ?? null), "propia_ct_v", [], "any", false, false, false, 268), 0)) {
                    // line 269
                    echo "                         ";
                    if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["goles"] ?? null), "propia_ct_v", [], "any", false, false, false, 269), 1)) {
                        // line 270
                        echo "                             Hay que añadir <b>";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["goles"] ?? null), "propia_ct_v", [], "any", false, false, false, 270), "html", null, true);
                        echo "</b> goles que anotaron en propia puerta sus rivales.
                         ";
                    } else {
                        // line 272
                        echo "                             Hay que añadir <b>1</b> gol que anotaron en propia puerta a su favor.
                         ";
                    }
                    // line 274
                    echo "                     ";
                }
                // line 275
                echo "
                     ";
                // line 276
                if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["goles"] ?? null), "penal_ct_v", [], "any", false, false, false, 276), 0)) {
                    // line 277
                    echo "                         ";
                    if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["goles"] ?? null), "penal_ct_v", [], "any", false, false, false, 277), 1)) {
                        // line 278
                        echo "                             De estos goles <b>";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["goles"] ?? null), "penal_ct_v", [], "any", false, false, false, 278), "html", null, true);
                        echo "</b> fuerón de penalti.
                         ";
                    } else {
                        // line 280
                        echo "                             De estos goles <b>1</b> fué de penalti.
                         ";
                    }
                    // line 282
                    echo "                     ";
                }
                // line 283
                echo "
                ";
            }
            // line 285
            echo "
                ";
            // line 286
            $context["te_u_gol_favor"] = "";
            // line 287
            echo "                ";
            $context["te_u_gol_contra"] = "";
            // line 288
            echo "
                ";
            // line 289
            if (twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "u_gol_favor", [], "any", true, true, false, 289)) {
                // line 290
                echo "                    ";
                $context["e_u_gol_favor"] = twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "u_gol_favor", [], "any", false, false, false, 290), ",");
                // line 291
                echo "                    ";
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "u_gol_favor", [], "any", false, false, false, 291), 0)) {
                    // line 292
                    echo "                        ";
                    $context["te_u_gol_favor"] = (("<br /><br />El " . twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "nombre", [], "any", false, false, false, 292)) . " todavía no ha conseguido ningún gol.");
                    // line 293
                    echo "                    ";
                } else {
                    // line 294
                    echo "                        ";
                    $context["te_u_gol_favor"] = (((((((((((("<br /><br />Último gol a favor: <b>Jornada " . (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = ($context["e_u_gol_favor"] ?? null)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144[1] ?? null) : null)) . "</b>  ") . (($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = ($context["e_u_gol_favor"] ?? null)) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b[0] ?? null) : null)) . "
\t<br />") . (($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 =                     // line 295
($context["e_u_gol_favor"] ?? null)) && is_array($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002) || $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 instanceof ArrayAccess ? ($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002[2] ?? null) : null)) . "-") . (($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 = ($context["e_u_gol_favor"] ?? null)) && is_array($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4) || $__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 instanceof ArrayAccess ? ($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4[3] ?? null) : null)) . " (<b>") . (($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 = ($context["e_u_gol_favor"] ?? null)) && is_array($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666) || $__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 instanceof ArrayAccess ? ($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666[4] ?? null) : null)) . "-") . (($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e = ($context["e_u_gol_favor"] ?? null)) && is_array($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e) || $__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e instanceof ArrayAccess ? ($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e[5] ?? null) : null)) . "</b>)");
                    // line 296
                    echo "                    ";
                }
                // line 297
                echo "                ";
            }
            // line 298
            echo "

                ";
            // line 300
            if (twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "u_gol_contra", [], "any", true, true, false, 300)) {
                // line 301
                echo "                    ";
                $context["e_u_gol_contra"] = twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "u_gol_contra", [], "any", false, false, false, 301), ",");
                // line 302
                echo "                    ";
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "u_gol_contra", [], "any", false, false, false, 302), 0)) {
                    // line 303
                    echo "                        ";
                    $context["te_u_gol_favor"] = (("<br />El " . twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "nombre", [], "any", false, false, false, 303)) . " todavía no ha encajado ningún gol.");
                    // line 304
                    echo "                    ";
                } else {
                    // line 305
                    echo "                        ";
                    if (twig_get_attribute($this->env, $this->source, ($context["e_u_gol_favor"] ?? null), 8, [], "array", true, true, false, 305)) {
                        // line 306
                        echo "                            ";
                        if (0 === twig_compare((($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52 = ($context["e_u_gol_favor"] ?? null)) && is_array($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52) || $__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52 instanceof ArrayAccess ? ($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52[8] ?? null) : null), (($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136 = ($context["e_u_gol_contra"] ?? null)) && is_array($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136) || $__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136 instanceof ArrayAccess ? ($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136[8] ?? null) : null))) {
                            // line 307
                            echo "                                ";
                            $context["te_u_gol_contra"] = " y también en este partido recibió su último gol en contra.";
                            // line 308
                            echo "                            ";
                        } else {
                            // line 309
                            echo "                                ";
                            $context["te_u_gol_contra"] = (((((((((((("<br />Último gol en contra: <b>Jornada " . (($__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386 = ($context["e_u_gol_contra"] ?? null)) && is_array($__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386) || $__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386 instanceof ArrayAccess ? ($__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386[1] ?? null) : null)) . "</b> ") . (($__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9 = ($context["e_u_gol_contra"] ?? null)) && is_array($__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9) || $__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9 instanceof ArrayAccess ? ($__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9[0] ?? null) : null)) . "
\t\t\t<br />") . (($__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae =                             // line 310
($context["e_u_gol_contra"] ?? null)) && is_array($__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae) || $__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae instanceof ArrayAccess ? ($__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae[2] ?? null) : null)) . "-") . (($__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f = ($context["e_u_gol_contra"] ?? null)) && is_array($__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f) || $__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f instanceof ArrayAccess ? ($__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f[3] ?? null) : null)) . " (<b>") . (($__internal_f769f712f3484f00110c86425acea59f5af2752239e2e8596bcb6effeb425b40 = ($context["e_u_gol_contra"] ?? null)) && is_array($__internal_f769f712f3484f00110c86425acea59f5af2752239e2e8596bcb6effeb425b40) || $__internal_f769f712f3484f00110c86425acea59f5af2752239e2e8596bcb6effeb425b40 instanceof ArrayAccess ? ($__internal_f769f712f3484f00110c86425acea59f5af2752239e2e8596bcb6effeb425b40[4] ?? null) : null)) . "-") . (($__internal_98e944456c0f58b2585e4aa36e3a7e43f4b7c9038088f0f056004af41f4a007f = ($context["e_u_gol_contra"] ?? null)) && is_array($__internal_98e944456c0f58b2585e4aa36e3a7e43f4b7c9038088f0f056004af41f4a007f) || $__internal_98e944456c0f58b2585e4aa36e3a7e43f4b7c9038088f0f056004af41f4a007f instanceof ArrayAccess ? ($__internal_98e944456c0f58b2585e4aa36e3a7e43f4b7c9038088f0f056004af41f4a007f[5] ?? null) : null)) . "</b>)");
                            // line 311
                            echo "                            ";
                        }
                        // line 312
                        echo "                        ";
                    }
                    // line 313
                    echo "                    ";
                }
                // line 314
                echo "                ";
            }
            // line 315
            echo "


                ";
            // line 318
            echo ($context["te_u_gol_favor"] ?? null);
            echo "
                ";
            // line 319
            echo ($context["te_u_gol_contra"] ?? null);
            echo "

            </div>
        </div>

    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "equipo/__part/clasificacionEstadisticas.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  810 => 319,  806 => 318,  801 => 315,  798 => 314,  795 => 313,  792 => 312,  789 => 311,  787 => 310,  784 => 309,  781 => 308,  778 => 307,  775 => 306,  772 => 305,  769 => 304,  766 => 303,  763 => 302,  760 => 301,  758 => 300,  754 => 298,  751 => 297,  748 => 296,  746 => 295,  743 => 294,  740 => 293,  737 => 292,  734 => 291,  731 => 290,  729 => 289,  726 => 288,  723 => 287,  721 => 286,  718 => 285,  714 => 283,  711 => 282,  707 => 280,  701 => 278,  698 => 277,  696 => 276,  693 => 275,  690 => 274,  686 => 272,  680 => 270,  677 => 269,  675 => 268,  670 => 266,  664 => 265,  659 => 262,  656 => 261,  652 => 259,  646 => 257,  643 => 256,  641 => 255,  637 => 253,  634 => 252,  630 => 250,  624 => 248,  621 => 247,  619 => 246,  613 => 243,  607 => 242,  602 => 239,  599 => 238,  595 => 236,  589 => 234,  586 => 233,  584 => 232,  580 => 230,  577 => 229,  573 => 227,  567 => 225,  564 => 224,  562 => 223,  557 => 221,  551 => 220,  547 => 218,  544 => 217,  540 => 215,  534 => 213,  531 => 212,  529 => 211,  526 => 210,  523 => 209,  519 => 207,  513 => 205,  510 => 204,  508 => 203,  503 => 201,  497 => 200,  492 => 197,  490 => 196,  486 => 194,  480 => 192,  478 => 191,  471 => 188,  469 => 187,  457 => 177,  454 => 176,  451 => 175,  448 => 174,  446 => 173,  443 => 172,  440 => 171,  437 => 170,  435 => 169,  432 => 168,  429 => 167,  426 => 166,  424 => 165,  421 => 164,  418 => 162,  414 => 160,  411 => 158,  407 => 156,  405 => 155,  394 => 147,  386 => 143,  384 => 142,  381 => 141,  377 => 139,  374 => 138,  370 => 136,  364 => 134,  361 => 133,  359 => 132,  355 => 130,  351 => 128,  348 => 127,  344 => 125,  338 => 123,  335 => 122,  333 => 121,  330 => 120,  324 => 118,  321 => 117,  315 => 115,  307 => 113,  304 => 112,  302 => 111,  295 => 108,  293 => 107,  290 => 106,  286 => 104,  283 => 103,  279 => 101,  273 => 99,  270 => 98,  268 => 97,  264 => 95,  260 => 93,  257 => 92,  253 => 90,  247 => 88,  244 => 87,  242 => 86,  239 => 85,  233 => 83,  230 => 82,  224 => 80,  216 => 78,  213 => 77,  211 => 76,  204 => 71,  202 => 70,  197 => 67,  194 => 66,  191 => 65,  188 => 64,  186 => 63,  183 => 62,  180 => 61,  177 => 60,  175 => 59,  172 => 58,  169 => 57,  166 => 56,  164 => 55,  161 => 54,  158 => 53,  155 => 52,  153 => 51,  150 => 50,  147 => 48,  144 => 46,  141 => 44,  138 => 43,  135 => 41,  132 => 39,  128 => 37,  126 => 36,  123 => 35,  117 => 34,  114 => 33,  111 => 32,  108 => 31,  103 => 30,  101 => 29,  98 => 28,  96 => 27,  87 => 21,  83 => 20,  79 => 19,  75 => 18,  69 => 15,  64 => 12,  62 => 11,  59 => 10,  56 => 9,  53 => 8,  50 => 7,  47 => 6,  44 => 5,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "equipo/__part/clasificacionEstadisticas.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/equipo/__part/clasificacionEstadisticas.html.twig");
    }
}
