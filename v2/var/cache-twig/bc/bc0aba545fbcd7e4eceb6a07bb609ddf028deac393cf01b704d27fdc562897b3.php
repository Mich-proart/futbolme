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

/* partido/index.html.twig */
class __TwigTemplate_51eb4d51ad8bcc3e511ac76a92450c97ff83e5cb91e51cb4a9315d33a10bfaf2 extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "partido/index.html.twig", 1);
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
        $this->loadTemplate("__part/ultimosEventos.html.twig", "partido/index.html.twig", 6)->display($context);
        // line 7
        echo "
";
    }

    // line 11
    public function block_contenedorCentral($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 12
        echo "
    <div class=\"col-12\">
        <div class=\"row\">
            <ul class=\"col-12 nav nav-tabs menuListGrises\" role=\"tablist\">
                <li class=\"text-center ";
        // line 16
        if (0 === twig_compare(($context["modelo"] ?? null), "Partido")) {
            echo " activa";
        }
        echo "\" style=\"margin-left: 5px;\">
                    <a class=\"btn btn-primary\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("partido_index", ["idPartido" =>         // line 18
($context["partido_id"] ?? null), "slug" =>         // line 19
($context["slug"] ?? null)]), "html", null, true);
        // line 20
        echo "\">Partido</a>
                </li>
                <li class=\"text-center ";
        // line 22
        if (0 === twig_compare(($context["modelo"] ?? null), "Enfrentamientos")) {
            echo " activa";
        }
        echo "\" style=\"margin-left: 5px;\">
                    <a class=\"btn btn-primary\" href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("partido_enfrentamientos", ["idPartido" =>         // line 24
($context["partido_id"] ?? null), "slug" =>         // line 25
($context["slug"] ?? null)]), "html", null, true);
        // line 26
        echo "\">Enfrentamientos</a>
                </li>
                ";
        // line 36
        echo "            </ul>
        </div>
    </div>

    ";
        // line 40
        if (0 === twig_compare(($context["modelo"] ?? null), "Enfrentamientos")) {
            // line 41
            echo "
        <style type=\"text/css\">
            @media screen and (min-width: 500px) {
                #tabsEnfrentamientosContent td {
                    font-size: 15px !important;
                }
            }
        </style>

        <div class=\"col-12 contenedorBlancoBordesRedondeados\" style=\"margin-top: 25px; padding: 0px;\">
        <h1>ENFRENTAMIENTOS ENTRE ";
            // line 51
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "local", [], "any", false, false, false, 51), "html", null, true);
            echo " Y ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitante", [], "any", false, false, false, 51), "html", null, true);
            echo "</h1>

            <!--

            rutaFicheroEnfrentamientos: ";
            // line 55
            echo twig_escape_filter($this->env, ($context["rutaFicheroEnfrentamientos"] ?? null), "html", null, true);
            echo "
            existeFicheroEnfrentamientos: ";
            // line 56
            echo twig_escape_filter($this->env, ($context["existeFicheroEnfrentamientos"] ?? null), "html", null, true);
            echo "

            -->


        <ul id=\"tabsEnfrentamientos\" class=\"nav nav-tabs menuListGrises\" role=\"tablist\" style=\"margin-bottom: 30px; margin-top: 20px;\">
            ";
            // line 62
            $context["i"] = 0;
            // line 63
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["varEnfrentamientos"] ?? null), "pestanyas", [], "any", false, false, false, 63));
            foreach ($context['_seq'] as $context["_key"] => $context["pestanya"]) {
                // line 64
                echo "
                ";
                // line 65
                $context["slugPestanya"] = twig_replace_filter(call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [$context["pestanya"]]), ["." => "-"]);
                // line 66
                echo "
                <li class=\"text-center\">
                    <a class=\"btn btn-primary";
                // line 68
                if (0 === twig_compare(($context["i"] ?? null), 0)) {
                    echo " activa";
                }
                echo "\" id=\"";
                echo twig_escape_filter($this->env, ($context["slugPestanya"] ?? null), "html", null, true);
                echo "-tab\" data-toggle=\"tab\" href=\"#";
                echo twig_escape_filter($this->env, ($context["slugPestanya"] ?? null), "html", null, true);
                echo "\" role=\"tab\" aria-controls=\"";
                echo twig_escape_filter($this->env, ($context["slugPestanya"] ?? null), "html", null, true);
                echo "\" aria-selected=\"";
                if (0 === twig_compare(($context["i"] ?? null), 0)) {
                    echo "true";
                } else {
                    echo "false";
                }
                echo "\">";
                echo twig_escape_filter($this->env, $context["pestanya"], "html", null, true);
                echo "</a>
                </li>

                ";
                // line 71
                $context["i"] = (($context["i"] ?? null) + 1);
                // line 72
                echo "
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pestanya'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 74
            echo "        </ul>


        <div id=\"tabsEnfrentamientosContent\" class=\"col-12 tab-content\" style=\"display: inline-block; padding-bottom: 25px; padding: 0px;\">
            ";
            // line 78
            $context["i"] = 0;
            // line 79
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["varEnfrentamientos"] ?? null));
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
            foreach ($context['_seq'] as $context["key"] => $context["tor"]) {
                // line 80
                echo "
                    ";
                // line 81
                if (0 === twig_compare($context["key"], 0)) {
                    // line 82
                    echo "
                        <div class=\"tab-pane fade show active\" id=\"actualidad\" role=\"tabpanel\" aria-labelledby=\"actualidad-tab\">

                            <div class=\"col-12\" style=\"margin-bottom: 20px;\">
                                <h2 class=\"subtitulo\">Actualidad - ";
                    // line 86
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tor"], "nombre", [], "any", false, false, false, 86), "html", null, true);
                    echo "</h2>
                            </div>

                            ";
                    // line 89
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["tor"], "partidos", [], "any", false, false, false, 89));
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
                    foreach ($context['_seq'] as $context["_key"] => $context["partido"]) {
                        // line 90
                        echo "
                                ";
                        // line 91
                        $context["partido"] = call_user_func_array($this->env->getFunction('anadirAArrayKey')->getCallable(), [$context["partido"], "localCorto", twig_get_attribute($this->env, $this->source, $context["partido"], "local", [], "any", false, false, false, 91)]);
                        // line 92
                        echo "                                ";
                        $context["partido"] = call_user_func_array($this->env->getFunction('anadirAArrayKey')->getCallable(), [$context["partido"], "visitanteCorto", twig_get_attribute($this->env, $this->source, $context["partido"], "visitante", [], "any", false, false, false, 92)]);
                        // line 93
                        echo "
                                ";
                        // line 94
                        $this->loadTemplate("index/__part/filaPartido.html.twig", "partido/index.html.twig", 94)->display($context);
                        // line 95
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
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['partido'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 97
                    echo "
                        </div>

                    ";
                } elseif (1 === twig_compare(                // line 100
$context["key"], 0)) {
                    // line 101
                    echo "                        ";
                    // line 102
                    echo "
                        ";
                    // line 103
                    $context["slugPestanya"] = twig_replace_filter(call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["tor"], "nombre", [], "any", false, false, false, 103)]), ["." => "-"]);
                    // line 104
                    echo "
                        <div class=\"tab-pane fade\" id=\"";
                    // line 105
                    echo twig_escape_filter($this->env, ($context["slugPestanya"] ?? null), "html", null, true);
                    echo "\" role=\"tabpanel\" aria-labelledby=\"";
                    echo twig_escape_filter($this->env, ($context["slugPestanya"] ?? null), "html", null, true);
                    echo "-tab\">

                            <div class=\"col-12\" style=\"margin-top: 20px; margin-bottom: 20px;\">
                                <h2 class=\"subtitulo\">";
                    // line 108
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tor"], "nombre", [], "any", false, false, false, 108), "html", null, true);
                    echo " - ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tor"], "totalPartidos", [], "any", false, false, false, 108), "html", null, true);
                    echo " ENFRENTAMIENTOS</h2>
                            </div>

                            <table class=\"table\">

                                ";
                    // line 113
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["tor"], "estadisticas", [], "any", false, false, false, 113));
                    foreach ($context['_seq'] as $context["k"] => $context["stad"]) {
                        // line 114
                        echo "
                                    <tr style=\"background: #7bdb00; color: #FFFFFF;\"><td colspan=\"10\">

                                            ";
                        // line 117
                        if (0 === twig_compare($context["k"], "local")) {
                            // line 118
                            echo "
                                                ";
                            // line 119
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "local", [], "any", false, false, false, 119), "html", null, true);
                            echo " <br />

                                            ";
                        } else {
                            // line 122
                            echo "
                                                ";
                            // line 123
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitante", [], "any", false, false, false, 123), "html", null, true);
                            echo "

                                            ";
                        }
                        // line 126
                        echo "
                                        </td></tr>

                                    <tr style=\"background: #B9BBBE; color: #434343;\"><td colspan=\"5\">Local</td><td colspan=\"5\">Visitante</td></tr>
                                    <tr style=\"font-size: 13px;\"><td>G</td><td>E</td><td>P</td><td>GF</td><td>GC</td>
                                        <td>G</td><td>E</td><td>P</td><td>GF</td><td>GC</td></tr>


                                    <tr style=\"font-size: 13px;\"><td>";
                        // line 134
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["stad"], "vL", [], "any", false, false, false, 134), "html", null, true);
                        echo "</td>
                                        <td>";
                        // line 135
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["stad"], "eL", [], "any", false, false, false, 135), "html", null, true);
                        echo "</td>
                                        <td>";
                        // line 136
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["stad"], "dL", [], "any", false, false, false, 136), "html", null, true);
                        echo "</td>
                                        <td>";
                        // line 137
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["stad"], "gfL", [], "any", false, false, false, 137), "html", null, true);
                        echo "</td>
                                        <td>";
                        // line 138
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["stad"], "gcL", [], "any", false, false, false, 138), "html", null, true);
                        echo "</td>

                                        <td>";
                        // line 140
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["stad"], "vV", [], "any", false, false, false, 140), "html", null, true);
                        echo "</td>
                                        <td>";
                        // line 141
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["stad"], "eV", [], "any", false, false, false, 141), "html", null, true);
                        echo "</td>
                                        <td>";
                        // line 142
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["stad"], "dV", [], "any", false, false, false, 142), "html", null, true);
                        echo "</td>
                                        <td>";
                        // line 143
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["stad"], "gfV", [], "any", false, false, false, 143), "html", null, true);
                        echo "</td>
                                        <td>";
                        // line 144
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["stad"], "gcV", [], "any", false, false, false, 144), "html", null, true);
                        echo "</td></tr>

                                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['k'], $context['stad'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 147
                    echo "
                            </table>

                            <table class=\"table\">

                                ";
                    // line 152
                    $context["temporadaMostrando"] = "";
                    // line 153
                    echo "
                                ";
                    // line 154
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["tor"], "partidos", [], "any", false, false, false, 154));
                    foreach ($context['_seq'] as $context["k"] => $context["partido"]) {
                        // line 155
                        echo "                               

                                    ";
                        // line 157
                        $context["colorL"] = "black";
                        // line 158
                        echo "                                    ";
                        $context["colorV"] = "black";
                        // line 159
                        echo "

                                    ";
                        // line 161
                        if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "clasificado", [], "any", false, false, false, 161), 1)) {
                            // line 162
                            echo "                                        ";
                            $context["colorL"] = "green";
                            // line 163
                            echo "                                        ";
                            $context["colorV"] = "red";
                            // line 164
                            echo "                                    ";
                        }
                        // line 165
                        echo "
                                    ";
                        // line 166
                        if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "clasificado", [], "any", false, false, false, 166), 2)) {
                            // line 167
                            echo "                                        ";
                            $context["colorL"] = "red";
                            // line 168
                            echo "                                        ";
                            $context["colorV"] = "green";
                            // line 169
                            echo "                                    ";
                        }
                        // line 170
                        echo "

                                    ";
                        // line 172
                        if (0 !== twig_compare(($context["temporadaMostrando"] ?? null), twig_get_attribute($this->env, $this->source, $context["partido"], "enlace_nombre", [], "any", false, false, false, 172))) {
                            // line 173
                            echo "
                                        ";
                            // line 174
                            $context["temporadaMostrando"] = twig_get_attribute($this->env, $this->source, $context["partido"], "enlace_nombre", [], "any", false, false, false, 174);
                            // line 175
                            echo "
                                        ";
                            // line 177
                            echo "                                        ";
                            $context["segundoNumeroTemporada"] = (twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "enlace_nombre", [], "any", false, false, false, 177),  -2, null) + 1);
                            // line 178
                            echo "
                                        ";
                            // line 179
                            if (-1 === twig_compare(($context["segundoNumeroTemporada"] ?? null), 10)) {
                                // line 180
                                echo "                                            ";
                                $context["segundoNumeroTemporada"] = ("0" . ($context["segundoNumeroTemporada"] ?? null));
                                // line 181
                                echo "                                        ";
                            } elseif (0 === twig_compare(($context["segundoNumeroTemporada"] ?? null), 100)) {
                                // line 182
                                echo "                                            ";
                                $context["segundoNumeroTemporada"] = "00";
                                // line 183
                                echo "                                        ";
                            }
                            // line 184
                            echo "

                                        <tr>
                                            <td colspan=\"5\" style=\"background: #626262; color: #FFFFFF;\">

                                                ";
                            // line 189
                            if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "tipo_torneo", [], "any", false, false, false, 189), 1)) {
                                // line 190
                                echo "
                                                ";
                                // line 191
                                if (twig_in_filter("Temporada", twig_get_attribute($this->env, $this->source, $context["partido"], "enlace_nombre", [], "any", false, false, false, 191))) {
                                    // line 192
                                    echo "                                                       
                                                       ";
                                    // line 193
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "enlace_nombre", [], "any", false, false, false, 193), "html", null, true);
                                    echo "
                                                    
                                                ";
                                } else {
                                    // line 196
                                    echo "
                                                    Temporada ";
                                    // line 197
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "enlace_nombre", [], "any", false, false, false, 197), "html", null, true);
                                    echo "-";
                                    echo twig_escape_filter($this->env, ($context["segundoNumeroTemporada"] ?? null), "html", null, true);
                                    echo "

                                                ";
                                }
                                // line 200
                                echo "


                                                    ";
                                // line 204
                                echo "                                                    ";
                                // line 205
                                echo "
                                                ";
                            } else {
                                // line 207
                                echo "
                                                    ";
                                // line 208
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "enlace_nombre", [], "any", false, false, false, 208), "html", null, true);
                                echo " ";
                                // line 209
                                echo "                                                    ";
                                // line 210
                                echo "                                                    - ";
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "fase", [], "any", false, false, false, 210), "html", null, true);
                                echo "

                                                ";
                            }
                            // line 213
                            echo "

                                            </td>
                                        </tr>

                                    ";
                        }
                        // line 219
                        echo "
                                    <tr style=\"font-size: 12px;\">
                                        ";
                        // line 221
                        if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "tipo_torneo", [], "any", false, false, false, 221), 1)) {
                            // line 222
                            echo "
                                            <td align=\"left\" style=\"padding-left: 0px; padding-right: 5px; width: 25px;\">J";
                            // line 223
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "jornada", [], "any", false, false, false, 223), "html", null, true);
                            echo "</td>

                                        ";
                        }
                        // line 226
                        echo "
                                        <td style=\"padding-left: 0px; padding-right: 5px; width: 35px;\">
                                            ";
                        // line 228
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "fecha", [], "any", false, false, false, 228), "d/m"), "html", null, true);
                        echo "
                                        </td>

                                        <td style=\"color:";
                        // line 231
                        echo twig_escape_filter($this->env, ($context["colorL"] ?? null), "html", null, true);
                        echo "\" align=\"right\">";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "local", [], "any", false, false, false, 231), "html", null, true);
                        echo "</td>
                                        <td style=\"width: 45px; padding-left: 3px; padding-right: 3px;\" align=\"center\">";
                        // line 232
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "goles_local", [], "any", false, false, false, 232), "html", null, true);
                        echo " - ";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "goles_visitante", [], "any", false, false, false, 232), "html", null, true);
                        echo "</td>
                                        <td style=\"color:";
                        // line 233
                        echo twig_escape_filter($this->env, ($context["colorV"] ?? null), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "visitante", [], "any", false, false, false, 233), "html", null, true);
                        echo "</td>
                                        ";
                        // line 237
                        echo "                                    </tr>


                                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['k'], $context['partido'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 241
                    echo "
                            </table>

                        </div>

                    ";
                }
                // line 247
                echo "
                    ";
                // line 248
                $context["i"] = (($context["i"] ?? null) + 1);
                // line 249
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
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['tor'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 251
            echo "        </div>

    </div>
        ";
            // line 254
            if (call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_MOBILE__"])) {
                // line 255
                echo "            <div style=\"width:100%;margin-left: auto;margin-right: auto; margin-bottom:10px;\">
                <script type=\"text/javascript\" src=\"https://video.onnetwork.tv/widget/widget_scrolllist.php?widget=903\"></script>
            </div>
        ";
            }
            // line 259
            echo "    ";
        } else {
            // line 260
            echo "
        <div class=\"col-12 contenedorBlancoBordesRedondeados\">
            <h1>Partido entre ";
            // line 262
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "local", [], "any", false, false, false, 262), "html", null, true);
            echo " y ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitante", [], "any", false, false, false, 262), "html", null, true);
            echo "</h1>

            ";
            // line 264
            if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "comunidad_id", [], "any", false, false, false, 264), 1)) {
                // line 265
                echo "
                <div class=\"flagbox comunidad flag";
                // line 266
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "comunidad_imagen", [], "any", false, false, false, 266), "html", null, true);
                echo "\"></div>

            ";
            } else {
                // line 269
                echo "
                <div class=\"flagbox pais flag";
                // line 270
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "pais_imagen", [], "any", false, false, false, 270), "html", null, true);
                echo "b\"></div>

            ";
            }
            // line 273
            echo "
            <div class=\"row\">
                <div class=\"col-12\">
                    ";
            // line 276
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "nombreTemporada", [], "any", false, false, false, 276), "html", null, true);
            echo " -
                    ";
            // line 277
            if (0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "jornada", [], "any", false, false, false, 277), 198)) {
                // line 278
                echo "                        ";
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "tipo_torneo", [], "any", false, false, false, 278), 1)) {
                    // line 279
                    echo "                            <a style=\"color: #212529;\" href=\"";
                    echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("torneo_jornada", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,                     // line 280
($context["partido"] ?? null), "nombreTemporada", [], "any", false, false, false, 280)]), "idTorneo" => twig_get_attribute($this->env, $this->source,                     // line 281
($context["partido"] ?? null), "temporada_id", [], "any", false, false, false, 281), "jornada" => twig_get_attribute($this->env, $this->source,                     // line 282
($context["partido"] ?? null), "jornada", [], "any", false, false, false, 282)]), "html", null, true);
                    // line 283
                    echo "\">Jornada ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "jornada", [], "any", false, false, false, 283), "html", null, true);
                    echo "</a>
                        ";
                } else {
                    // line 285
                    echo "                            <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("torneo_jornada", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,                     // line 286
($context["partido"] ?? null), "nombreTemporada", [], "any", false, false, false, 286)]), "idTorneo" => twig_get_attribute($this->env, $this->source,                     // line 287
($context["partido"] ?? null), "temporada_id", [], "any", false, false, false, 287), "jornada" => twig_get_attribute($this->env, $this->source,                     // line 288
($context["partido"] ?? null), "jornada", [], "any", false, false, false, 288)]), "html", null, true);
                    // line 289
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "fase", [], "any", false, false, false, 289), "html", null, true);
                    echo "</a>
                            ";
                    // line 290
                    if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "grupo_id", [], "any", false, false, false, 290), 0)) {
                        // line 291
                        echo "                                - <a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("torneo_jornada_grupo_id", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,                         // line 292
($context["partido"] ?? null), "nombreTemporada", [], "any", false, false, false, 292)]), "idTorneo" => twig_get_attribute($this->env, $this->source,                         // line 293
($context["partido"] ?? null), "temporada_id", [], "any", false, false, false, 293), "jornada" => twig_get_attribute($this->env, $this->source,                         // line 294
($context["partido"] ?? null), "jornada", [], "any", false, false, false, 294), "grupo_id" => twig_get_attribute($this->env, $this->source,                         // line 295
($context["partido"] ?? null), "grupo_id", [], "any", false, false, false, 295)]), "html", null, true);
                        // line 296
                        echo "\">";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "nombreGrupo", [], "any", false, false, false, 296), "html", null, true);
                        echo "</a>
                            ";
                    }
                    // line 298
                    echo "                        ";
                }
                // line 299
                echo "                    ";
            } else {
                // line 300
                echo "                        Ligas Internacionales
                    ";
            }
            // line 302
            echo "                </div>
            </div>

            <div class=\"row\">
                <div class=\"col-12 text-right\">
                    ";
            // line 307
            if (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "hora_prevista", [], "any", true, true, false, 307)) {
                // line 308
                echo "                        ";
                $context["h"] = (" a las " . twig_date_format_filter($this->env, ($context["horaPrevista"] ?? null), "H:i"));
                // line 309
                echo "                    ";
            } else {
                // line 310
                echo "                        ";
                $context["h"] = "";
                // line 311
                echo "                    ";
            }
            // line 312
            echo "
                    ";
            // line 313
            echo twig_escape_filter($this->env, (call_user_func_array($this->env->getFunction('nombreDiaCompleto')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "fecha", [], "any", false, false, false, 313)]) . ($context["h"] ?? null)), "html", null, true);
            echo "
                </div>
            </div>

            ";
            // line 317
            if ((1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "tv", [], "any", false, false, false, 317), 0) && 0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 317), 1))) {
                // line 318
                echo "                <div class=\"row\" style=\"margin-top: 10px; margin-bottom: 10px;\">
                    <div class=\"col-12\">
                        ";
                // line 320
                echo twig_escape_filter($this->env, ($context["textoTv"] ?? null), "html", null, true);
                echo "
                    </div>
                    <div class=\"col-12 text-center\">
                        ";
                // line 323
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["partiTv"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["tvs"]) {
                    // line 324
                    echo "                            <div class=\"row\">
                                <div class=\"col\">
                                    <span style=\"font-size: 13px;\">";
                    // line 326
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tvs"], "nombre", [], "any", false, false, false, 326), "html", null, true);
                    echo "</span>
                                    <img src=\"/static/img/television/medio";
                    // line 327
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tvs"], "id", [], "any", false, false, false, 327), "html", null, true);
                    echo ".png\" alt=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tvs"], "nombre", [], "any", false, false, false, 327), "html", null, true);
                    echo "\" style=\"max-height: 38px\">
                                </div>
                            </div>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tvs'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 331
                echo "                    </div>
                </div>
            ";
            }
            // line 334
            echo "
            

            ";
            // line 337
            if (1 === twig_compare(twig_length_filter($this->env, ($context["comentarios"] ?? null)), 2)) {
                // line 338
                echo "                <div class=\"row\" style=\"margin-top: 15px; margin-bottom: 15px;\">
                    
                    <div class=\"col-12 text-right fechaActualizado\">
                        Actualizado a las ";
                // line 341
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, call_user_func_array($this->env->getFunction('hoyDateTime')->getCallable(), []), "H:i:s"), "html", null, true);
                echo "
                    </div>

                    <div class=\"col-12 text-center\">

                        ";
                // line 346
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 346), 6)) {
                    // line 347
                    echo "                            <p class=\"subtitulo\">Descanso</p>
                        ";
                } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,                 // line 348
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 348), 2)) {
                    // line 349
                    echo "
                            ";
                    // line 350
                    $context["t"] = twig_split_filter($this->env, ($context["comentarios"] ?? null), "-");
                    // line 351
                    echo "
                            ";
                    // line 352
                    if (((isset($context["t"]) || array_key_exists("t", $context)) &&  !(null === ($context["t"] ?? null)))) {
                        // line 353
                        echo "
                                ";
                        // line 354
                        $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#f07474"]);
                        // line 355
                        echo "
                                ";
                        // line 356
                        if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 356), 1)) {
                            // line 357
                            echo "                                    ";
                            $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#f07474"]);
                            // line 358
                            echo "                                ";
                        }
                        // line 359
                        echo "
                                ";
                        // line 360
                        if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 360), 2)) {
                            // line 361
                            echo "                                    ";
                            $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#7cc002"]);
                            // line 362
                            echo "                                ";
                        }
                        // line 363
                        echo "
                                ";
                        // line 364
                        if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 364), 3)) {
                            // line 365
                            echo "                                    ";
                            $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#610B0B"]);
                            // line 366
                            echo "                                ";
                        }
                        // line 367
                        echo "
                                ";
                        // line 368
                        if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 368), 4)) {
                            // line 369
                            echo "                                    ";
                            $context["t"] = twig_array_merge(($context["t"] ?? null), ["color" => "#0B3B0B"]);
                            // line 370
                            echo "                                ";
                        }
                        // line 371
                        echo "
                                ";
                        // line 372
                        $context["parte"] = "";
                        // line 373
                        echo "
                                ";
                        // line 374
                        if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 374), 1)) {
                            // line 375
                            echo "                                    ";
                            $context["parte"] = "1T - ";
                            // line 376
                            echo "                                ";
                        } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 376), 2)) {
                            // line 377
                            echo "                                    ";
                            $context["parte"] = "2T - ";
                            // line 378
                            echo "                                ";
                        }
                        // line 379
                        echo "
                                ";
                        // line 380
                        $context["t"] = twig_array_merge(($context["t"] ?? null), ["tiempo" => ("Minuto " . twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 1, [], "any", false, false, false, 380))]);
                        // line 381
                        echo "

                                ";
                        // line 383
                        if ((twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 2, [], "any", true, true, false, 383) && 1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 2, [], "any", false, false, false, 383), 0))) {
                            // line 384
                            echo "                                    ";
                            $context["t"] = twig_array_merge(($context["t"] ?? null), ["tiempo" => ((twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), "tiempo", [], "any", false, false, false, 384) . " + ") . twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 2, [], "any", false, false, false, 384))]);
                            // line 385
                            echo "                                ";
                        }
                        // line 386
                        echo "
                                ";
                        // line 387
                        $context["t"] = twig_array_merge(($context["t"] ?? null), ["tiempo" => (($context["parte"] ?? null) . twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), "tiempo", [], "any", false, false, false, 387))]);
                        // line 388
                        echo "
                            ";
                    }
                    // line 390
                    echo "
                            ";
                    // line 391
                    $context["p"] = twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), "tiempo", [], "any", false, false, false, 391), "+");
                    // line 392
                    echo "
                           

                            <p style=\"background-color:";
                    // line 395
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), "color", [], "any", false, false, false, 395), "html", null, true);
                    echo ";\">";
                    echo twig_replace_filter(twig_get_attribute($this->env, $this->source, ($context["p"] ?? null), 0, [], "any", false, false, false, 395), ["float:right;" => ""]);
                    echo "</p>






                        ";
                } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,                 // line 402
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 402), 3)) {
                    // line 403
                    echo "                             <p class=\"subtitulo\">Aplazado</p> 
                        ";
                } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,                 // line 404
($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 404), 4)) {
                    // line 405
                    echo "                             <p class=\"subtitulo\">Suspendido</p>
                        ";
                }
                // line 407
                echo "
                    </div>
                </div>

            ";
            }
            // line 412
            echo "
            <div class=\"row\">
                <div class=\"col-6\">
                    <h2 class=\"subtitulo\">";
            // line 415
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "local", [], "any", false, false, false, 415), "html", null, true);
            echo "</h2>
                </div>
                <div class=\"col-6\">
                    <h2 class=\"subtitulo\">";
            // line 418
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitante", [], "any", false, false, false, 418), "html", null, true);
            echo "</h2>
                </div>
            </div>

            <div class=\"row\">

                <div class=\"col-3\">
                    <img class=\"escudo_ind\" style=\"max-width: 100%;\" src=\"";
            // line 425
            echo twig_escape_filter($this->env, ($context["escudoLocal"] ?? null), "html", null, true);
            echo "\" alt=\"escudo\">
                </div>
                ";
            // line 427
            if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 427), 4)) {
                // line 428
                echo "                    <div class=\"col-xs-6 col-md-4 col-lg-4 text-center border-right-white boldfont\" style=\"border-radius: 10px; background-color: orange\">
                        Aplazado
                    </div>
                ";
            } else {
                // line 432
                echo "                    <div class=\"col-3 text-center\" style=\"border-radius: 10px; background-color:";
                echo twig_escape_filter($this->env, ($context["fondo_color"] ?? null), "html", null, true);
                echo "; color: ";
                echo twig_escape_filter($this->env, ($context["texto_color"] ?? null), "html", null, true);
                echo "; border-right: 1px solid white;\">
                        ";
                // line 433
                if (((0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 433), 1) || 0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 433), 2)) || 0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 433), 6))) {
                    // line 434
                    echo "                            <p class=\"marcador\" style=\"font-size: 5em; font-weight: bold;\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "goles_local", [], "any", false, false, false, 434), "html", null, true);
                    echo "</p>
                        ";
                } else {
                    // line 436
                    echo "                            <p class=\"marcador\" style=\"font-size: 5em; font-weight: bold;\">-</p>
                        ";
                }
                // line 438
                echo "                    </div>

                    <div class=\"col-3 text-center\" style=\"border-radius: 10px; background-color:";
                // line 440
                echo twig_escape_filter($this->env, ($context["fondo_color"] ?? null), "html", null, true);
                echo "; color: ";
                echo twig_escape_filter($this->env, ($context["texto_color"] ?? null), "html", null, true);
                echo "; border-left: 1px solid white;\">
                        ";
                // line 441
                if (((0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 441), 1) || 0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 441), 2)) || 0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 441), 6))) {
                    // line 442
                    echo "                            <p class=\"marcador\" style=\"font-size: 5em; font-weight: bold;\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "goles_visitante", [], "any", false, false, false, 442), "html", null, true);
                    echo "</p>
                        ";
                } else {
                    // line 444
                    echo "                            <p class=\"marcador\" style=\"font-size: 5em; font-weight: bold;\">-</p>
                        ";
                }
                // line 446
                echo "                    </div>
                ";
            }
            // line 448
            echo "                <div class=\"col-3 text-center\">
                    <img class=\"escudo_ind\" style=\"max-width: 100%;\" src=\"";
            // line 449
            echo twig_escape_filter($this->env, ($context["escudoVisitante"] ?? null), "html", null, true);
            echo "\" alt=\"escudo\">
                </div>


                ";
            // line 453
            $this->loadTemplate("partido/alineaciones.html.twig", "partido/index.html.twig", 453)->display($context);
            // line 454
            echo "
                ";
            // line 455
            if (((twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "observaciones", [], "any", false, false, false, 455) && 1 === twig_compare(twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "observaciones", [], "any", false, false, false, 455)), 5)) && 0 === twig_compare(twig_length_filter($this->env, ($context["partidoGoles"] ?? null)), 0))) {
                // line 456
                echo "
                    <div class=\"col-12\">
                        ";
                // line 458
                $context["cadena"] = call_user_func_array($this->env->getFunction('desglosarTexto')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "observaciones", [], "any", false, false, false, 458)]);
                // line 459
                echo "                        ";
                if (twig_get_attribute($this->env, $this->source, ($context["cadena"] ?? null), 1, [], "any", true, true, false, 459)) {
                    // line 460
                    echo "                            ";
                    $context["cadenaGoles"] = twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["cadena"] ?? null), 1, [], "any", false, false, false, 460));
                    // line 461
                    echo "                        ";
                }
                // line 462
                echo "                        ";
                if (twig_get_attribute($this->env, $this->source, ($context["cadena"] ?? null), 2, [], "any", true, true, false, 462)) {
                    // line 463
                    echo "                            ";
                    $context["cadenaGoles"] = (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["cadena"] ?? null), 2, [], "any", false, false, false, 463)) + ($context["cadenaGoles"] ?? null));
                    // line 464
                    echo "                        ";
                }
                // line 465
                echo "
                        ";
                // line 466
                $this->loadTemplate("partido/partidoObsR.html.twig", "partido/index.html.twig", 466)->display($context);
                // line 467
                echo "                    </div>

                ";
            }
            // line 470
            echo "

                ";
            // line 472
            if ((twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "ida", [], "any", true, true, false, 472) &&  !(null === twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "ida", [], "any", false, false, false, 472)))) {
                // line 473
                echo "                    <div class=\"col-12\">
                        ";
                // line 474
                $context["ida"] = twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "ida", [], "any", false, false, false, 474), ",");
                // line 475
                echo "                        ";
                $context["ida_resulcasa"] = twig_get_attribute($this->env, $this->source, ($context["ida"] ?? null), 0, [], "any", false, false, false, 475);
                // line 476
                echo "                        ";
                $context["ida_resulfuera"] = twig_get_attribute($this->env, $this->source, ($context["ida"] ?? null), 1, [], "any", false, false, false, 476);
                // line 477
                echo "                        ";
                $context["ida_jornada"] = twig_get_attribute($this->env, $this->source, ($context["ida"] ?? null), 2, [], "any", false, false, false, 477);
                // line 478
                echo "                        ";
                $context["ida_fecha"] = twig_get_attribute($this->env, $this->source, ($context["ida"] ?? null), 3, [], "any", false, false, false, 478);
                // line 479
                echo "
                        ";
                // line 480
                if ((1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "fecha", [], "any", false, false, false, 480), ($context["ida_fecha"] ?? null)) && 0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "jornada", [], "any", false, false, false, 480), 198))) {
                    // line 481
                    echo "                            ";
                    $context["ida_partido"] = twig_get_attribute($this->env, $this->source, ($context["ida"] ?? null), 4, [], "any", false, false, false, 481);
                    // line 482
                    echo "
                            ";
                    // line 483
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "tipo_torneo", [], "any", false, false, false, 483), 1)) {
                        // line 484
                        echo "                                ";
                        $context["txt"] = ("correspondiente a la jornada " . ($context["ida_jornada"] ?? null));
                        // line 485
                        echo "                            ";
                    } else {
                        // line 486
                        echo "                                ";
                        $context["txt"] = "";
                        // line 487
                        echo "                            ";
                    }
                    // line 488
                    echo "
                            ";
                    // line 489
                    $context["enlacePartido"] = $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("partido_index", ["idPartido" =>                     // line 490
($context["ida_partido"] ?? null), "slug" => ((call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,                     // line 491
($context["partido"] ?? null), "visitante", [], "any", false, false, false, 491)]) . "-") . call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "local", [], "any", false, false, false, 491)]))]);
                    // line 493
                    echo "
                            ";
                    // line 494
                    if (0 === twig_compare(($context["ida_resulcasa"] ?? null), ($context["ida_resulfuera"] ?? null))) {
                        // line 495
                        echo "                                En el partido de ida, ";
                        echo twig_escape_filter($this->env, ($context["txt"] ?? null), "html", null, true);
                        echo "  el ";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitante", [], "any", false, false, false, 495), "html", null, true);
                        echo " y el ";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "local", [], "any", false, false, false, 495), "html", null, true);
                        echo " empataron <b>";
                        echo twig_escape_filter($this->env, ($context["ida_resulcasa"] ?? null), "html", null, true);
                        echo "-";
                        echo twig_escape_filter($this->env, ($context["ida_resulfuera"] ?? null), "html", null, true);
                        echo "</b> <a href=\"";
                        echo twig_escape_filter($this->env, ($context["enlacePartido"] ?? null), "html", null, true);
                        echo "\">-ver-</a>
                            ";
                    } elseif (1 === twig_compare(                    // line 496
($context["ida_resulcasa"] ?? null), ($context["ida_resulfuera"] ?? null))) {
                        // line 497
                        echo "                                En la ida, el ";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitante", [], "any", false, false, false, 497), "html", null, true);
                        echo " venció al ";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "local", [], "any", false, false, false, 497), "html", null, true);
                        echo " ";
                        echo twig_escape_filter($this->env, ($context["txt"] ?? null), "html", null, true);
                        echo " con un resultado de <b>";
                        echo twig_escape_filter($this->env, ($context["ida_resulcasa"] ?? null), "html", null, true);
                        echo "-";
                        echo twig_escape_filter($this->env, ($context["ida_resulfuera"] ?? null), "html", null, true);
                        echo "</b>. <a href=\"";
                        echo twig_escape_filter($this->env, ($context["enlacePartido"] ?? null), "html", null, true);
                        echo "\">-ver-</a>
                            ";
                    } else {
                        // line 499
                        echo "                                El ";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "visitante", [], "any", false, false, false, 499), "html", null, true);
                        echo " perdió en casa contra el ";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "local", [], "any", false, false, false, 499), "html", null, true);
                        echo " por <b>";
                        echo twig_escape_filter($this->env, ($context["ida_resulcasa"] ?? null), "html", null, true);
                        echo "-";
                        echo twig_escape_filter($this->env, ($context["ida_resulfuera"] ?? null), "html", null, true);
                        echo "</b> ";
                        echo twig_escape_filter($this->env, ($context["txt"] ?? null), "html", null, true);
                        echo " <a href=\"";
                        echo twig_escape_filter($this->env, ($context["enlacePartido"] ?? null), "html", null, true);
                        echo "\">-ver-</a>
                            ";
                    }
                    // line 501
                    echo "                        ";
                }
                // line 502
                echo "                    </div>
                ";
            }
            // line 504
            echo "

                ";
            // line 506
            if (((isset($context["e1Clas"]) || array_key_exists("e1Clas", $context)) && (isset($context["e2Clas"]) || array_key_exists("e2Clas", $context)))) {
                // line 507
                echo "                    <div class=\"col-12\" style=\"margin-top: 20px; margin-bottom: 20px;\">
                        <table class=\"col-12\">
                            <thead>
                            <tr class=\"darkgreenbox\">
                                <th class=\"text-center\" colspan=\"2\">
                                    ";
                // line 512
                if (0 === twig_compare(($context["tipo_eliminatoria"] ?? null), 3)) {
                    // line 513
                    echo "                                        En sus respectivas ligas...
                                    ";
                }
                // line 515
                echo "                                </th>
                                <th class=\"text-center\" style=\"width:7%\">P<span class=\"hidden-xs\">TO</span>S</th>
                                <th class=\"text-center\" style=\"width:7%\">J<span class=\"hidden-xs\">U</span></th>
                                <th class=\"text-center\" style=\"width:7%\">G<span class=\"hidden-xs\">A</span></th>
                                <th class=\"text-center\" style=\"width:7%\">E<span class=\"hidden-xs\">M</span></th>
                                <th class=\"text-center\" style=\"width:7%\">P<span class=\"hidden-xs\">E</span></th>
                                <th class=\"text-center\" style=\"width:7%\"><span class=\"hidden-xs\">G</span>F</th>
                                <th class=\"text-center\" style=\"width:7%\"><span class=\"hidden-xs\">G</span>C</th>
                                <th class=\"text-center\" style=\"width:9%\">D<span class=\"hidden-xs\">I</span>F</th>
                            </tr>
                            </thead>
                            <tbody class=\"whitebox\">
                            ";
                // line 527
                $context["color_fondo"] = "white";
                // line 528
                echo "                            ";
                $context["txtPreferente"] = "";
                // line 529
                echo "                            ";
                $context["jornadas"] = 0;
                // line 530
                echo "
                            ";
                // line 531
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(0, 1));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 532
                    echo "                                ";
                    if (((0 === twig_compare($context["i"], 0) && (isset($context["e1Clas"]) || array_key_exists("e1Clas", $context))) || (0 === twig_compare($context["i"], 1) && (isset($context["e2Clas"]) || array_key_exists("e2Clas", $context))))) {
                        // line 533
                        echo "
                                    ";
                        // line 534
                        if (((isset($context["e1Clas"]) || array_key_exists("e1Clas", $context)) && 0 === twig_compare($context["i"], 0))) {
                            // line 535
                            echo "                                        ";
                            $context["fila"] = ($context["e1Clas"] ?? null);
                            // line 536
                            echo "                                        ";
                            $context["temporada_id"] = ($context["liga_local"] ?? null);
                            // line 537
                            echo "                                    ";
                        } elseif (((isset($context["e2Clas"]) || array_key_exists("e2Clas", $context)) && 0 === twig_compare($context["i"], 1))) {
                            // line 538
                            echo "                                        ";
                            $context["fila"] = ($context["e2Clas"] ?? null);
                            // line 539
                            echo "                                        ";
                            $context["temporada_id"] = ($context["liga_visitante"] ?? null);
                            // line 540
                            echo "                                    ";
                        }
                        // line 541
                        echo "
                                    ";
                        // line 542
                        if (twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "preferente", [], "any", true, true, false, 542)) {
                            // line 543
                            echo "                                        ";
                            if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "preferente", [], "any", false, false, false, 543), 1) && 0 === twig_compare($context["i"], 0))) {
                                // line 544
                                echo "                                            ";
                                $context["color_fondo"] = "yellow";
                                // line 545
                                echo "                                            ";
                                $context["txtPreferente"] = "*Clasificación En vivo";
                                // line 546
                                echo "                                        ";
                            }
                            // line 547
                            echo "                                    ";
                        }
                        // line 548
                        echo "
                                    ";
                        // line 549
                        if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "jugados", [], "any", false, false, false, 549), ($context["jornadas"] ?? null))) {
                            // line 550
                            echo "                                        ";
                            $context["jornadas"] = twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "jugados", [], "any", false, false, false, 550);
                            // line 551
                            echo "                                    ";
                        }
                        // line 552
                        echo "
                                    ";
                        // line 553
                        $context["pgEnlace"] = $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_index", ["idEquipo" => twig_get_attribute($this->env, $this->source,                         // line 554
($context["fila"] ?? null), "equipo_id", [], "any", false, false, false, 554), "slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,                         // line 555
($context["fila"] ?? null), "nombre", [], "any", false, false, false, 555)])]);
                        // line 557
                        echo "
                                    ";
                        // line 558
                        $context["color_fondo"] = "white";
                        // line 559
                        echo "
                                    ";
                        // line 560
                        if (twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "preferente", [], "any", true, true, false, 560)) {
                            // line 561
                            echo "                                        ";
                            if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "preferente", [], "any", false, false, false, 561), 1)) {
                                // line 562
                                echo "                                            ";
                                $context["color_fondo"] = "yellow";
                                // line 563
                                echo "                                        ";
                            }
                            // line 564
                            echo "                                    ";
                        }
                        // line 565
                        echo "
                                    ";
                        // line 566
                        $context["color_fila"] = "";
                        // line 567
                        echo "
                                    ";
                        // line 568
                        if (((isset($context["equipo_id"]) || array_key_exists("equipo_id", $context)) && 0 === twig_compare(($context["equipo_id"] ?? null), twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "equipo_id", [], "any", false, false, false, 568)))) {
                            // line 569
                            echo "                                        ";
                            $context["color_fila"] = "style='background-color:gainsboro'";
                            // line 570
                            echo "                                    ";
                        }
                        // line 571
                        echo "
                                    ";
                        // line 572
                        $context["rutaEscudo"] = call_user_func_array($this->env->getFunction('rutaEscudo')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "club_id", [], "any", false, false, false, 572), twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "equipo_id", [], "any", false, false, false, 572)]);
                        // line 573
                        echo "
                                    ";
                        // line 574
                        if ( !call_user_func_array($this->env->getFunction('fileExists')->getCallable(), [($context["rutaEscudo"] ?? null)])) {
                            // line 575
                            echo "                                        ";
                            $context["rutaEscudo"] = "/static/img/jugadores/NI.png";
                            // line 576
                            echo "                                    ";
                        }
                        // line 577
                        echo "
                                ";
                    }
                    // line 579
                    echo "
                                <tr>
                                    <td class=\"text-left celda-posicion\" style=\"";
                    // line 581
                    echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "css", [], "any", false, false, false, 581), ["background-color" => "color", "white" => "#000000", "gold" => "#F1C422", "orange" => "#E38800", "indianred" => "#E80000"]), "html", null, true);
                    // line 589
                    echo ";\">
                                        ";
                    // line 590
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "posicion", [], "any", false, false, false, 590), "html", null, true);
                    echo "
                                    </td>
                                    <td style=\"text-align:left;min-width: 130px\" itemscope itemtype=\"http://schema.org/SportsTeam\">
                                        <a style=\"color: #212529;\" href=\"";
                    // line 593
                    echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_calendario", ["idEquipo" => twig_get_attribute($this->env, $this->source,                     // line 594
($context["fila"] ?? null), "equipo_id", [], "any", false, false, false, 594), "slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,                     // line 595
($context["fila"] ?? null), "nombre", [], "any", false, false, false, 595)])]), "html", null, true);
                    // line 596
                    echo "\" title=\"Calendario del ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "nombreCorto", [], "any", false, false, false, 596), "html", null, true);
                    echo "\">
                                            <img src=\"";
                    // line 597
                    echo twig_escape_filter($this->env, ($context["rutaEscudo"] ?? null), "html", null, true);
                    echo "\" itemprop=\"logo\" alt=\"escudo ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "nombre", [], "any", false, false, false, 597), "html", null, true);
                    echo "\" style=\"width:18px; height:20px; margin-right: 2px\">
                                            <strong itemprop=\"name\">
                                                ";
                    // line 599
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "nombreCorto", [], "any", false, false, false, 599), "html", null, true);
                    echo "
                                            </strong>

                                            <meta itemprop=\"url\" content=\"";
                    // line 602
                    echo twig_escape_filter($this->env, ($context["pgEnlace"] ?? null), "html", null, true);
                    echo "\">
                                        </a>
                                    </td>
                                    <td class=\"text-center\" style=\"";
                    // line 605
                    echo "\">
                                        <a style=\"color:black\" href=\"";
                    // line 606
                    echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_clasificacion", ["idEquipo" => twig_get_attribute($this->env, $this->source,                     // line 607
($context["fila"] ?? null), "equipo_id", [], "any", false, false, false, 607), "slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,                     // line 608
($context["fila"] ?? null), "nombre", [], "any", false, false, false, 608)]), "vista" => "puntos"]), "html", null, true);
                    // line 610
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "nombreCorto", [], "any", false, false, false, 610), "html", null, true);
                    echo " - Puntos conseguidos\">
                                            <b>";
                    // line 611
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "puntos", [], "any", false, false, false, 611), "html", null, true);
                    echo "</b></a>
                                    </td>
                                    <td class=\"text-center\">
                                        <a style=\"color:black\" href=\"";
                    // line 614
                    echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_clasificacion", ["idEquipo" => twig_get_attribute($this->env, $this->source,                     // line 615
($context["fila"] ?? null), "equipo_id", [], "any", false, false, false, 615), "slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,                     // line 616
($context["fila"] ?? null), "nombre", [], "any", false, false, false, 616)]), "vista" => "jugados"]), "html", null, true);
                    // line 618
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "nombreCorto", [], "any", false, false, false, 618), "html", null, true);
                    echo " - Partidos jugados\">
                                            ";
                    // line 619
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "jugados", [], "any", false, false, false, 619), "html", null, true);
                    echo "
                                        </a>
                                    </td>
                                    <td class=\"text-center\">
                                        <a style=\"color:black\" href=\"";
                    // line 623
                    echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_clasificacion", ["idEquipo" => twig_get_attribute($this->env, $this->source,                     // line 624
($context["fila"] ?? null), "equipo_id", [], "any", false, false, false, 624), "slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,                     // line 625
($context["fila"] ?? null), "nombre", [], "any", false, false, false, 625)]), "vista" => "ganados"]), "html", null, true);
                    // line 627
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "nombreCorto", [], "any", false, false, false, 627), "html", null, true);
                    echo " - Partidos ganados\">
                                            ";
                    // line 628
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "ganados", [], "any", false, false, false, 628), "html", null, true);
                    echo "
                                        </a>
                                    </td>
                                    <td class=\"text-center\">
                                        <a style=\"color:black\" href=\"";
                    // line 632
                    echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_clasificacion", ["idEquipo" => twig_get_attribute($this->env, $this->source,                     // line 633
($context["fila"] ?? null), "equipo_id", [], "any", false, false, false, 633), "slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,                     // line 634
($context["fila"] ?? null), "nombre", [], "any", false, false, false, 634)]), "vista" => "empatados"]), "html", null, true);
                    // line 636
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "nombreCorto", [], "any", false, false, false, 636), "html", null, true);
                    echo " - Partidos empatados\">
                                            ";
                    // line 637
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "empatados", [], "any", false, false, false, 637), "html", null, true);
                    echo "
                                        </a>
                                    </td>
                                    <td class=\"text-center\">
                                        <a style=\"color:black\" href=\"";
                    // line 641
                    echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_clasificacion", ["idEquipo" => twig_get_attribute($this->env, $this->source,                     // line 642
($context["fila"] ?? null), "equipo_id", [], "any", false, false, false, 642), "slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,                     // line 643
($context["fila"] ?? null), "nombre", [], "any", false, false, false, 643)]), "vista" => "perdidos"]), "html", null, true);
                    // line 645
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "nombreCorto", [], "any", false, false, false, 645), "html", null, true);
                    echo " - Partidos perdidos\">
                                            ";
                    // line 646
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "perdidos", [], "any", false, false, false, 646), "html", null, true);
                    echo "
                                        </a>
                                    </td>
                                    <td class=\"text-center\">
                                        <a style=\"color:black\" href=\"";
                    // line 650
                    echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_clasificacion", ["idEquipo" => twig_get_attribute($this->env, $this->source,                     // line 651
($context["fila"] ?? null), "equipo_id", [], "any", false, false, false, 651), "slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,                     // line 652
($context["fila"] ?? null), "nombre", [], "any", false, false, false, 652)]), "vista" => "favor"]), "html", null, true);
                    // line 654
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "nombreCorto", [], "any", false, false, false, 654), "html", null, true);
                    echo " - Goles a favor\">
                                            ";
                    // line 655
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "gFavor", [], "any", false, false, false, 655), "html", null, true);
                    echo "
                                        </a>
                                    </td>
                                    <td class=\"text-center\">
                                        <a style=\"color:black\" href=\"";
                    // line 659
                    echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_clasificacion", ["idEquipo" => twig_get_attribute($this->env, $this->source,                     // line 660
($context["fila"] ?? null), "equipo_id", [], "any", false, false, false, 660), "slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,                     // line 661
($context["fila"] ?? null), "nombre", [], "any", false, false, false, 661)]), "vista" => "contra"]), "html", null, true);
                    // line 663
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "nombreCorto", [], "any", false, false, false, 663), "html", null, true);
                    echo " - Goles en contra\">
                                            ";
                    // line 664
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "gContra", [], "any", false, false, false, 664), "html", null, true);
                    echo "
                                        </a>
                                    </td>
                                    <td class=\"text-center\">
                                        ";
                    // line 668
                    echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "gFavor", [], "any", false, false, false, 668) - twig_get_attribute($this->env, $this->source, ($context["fila"] ?? null), "gContra", [], "any", false, false, false, 668)), "html", null, true);
                    echo "
                                    </td>
                                </tr>



                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 675
                echo "                            </tbody>
                        </table>

                        <div class=\"row\">
                            <div class=\"col-12 text-right\">
                                <small>";
                // line 680
                echo twig_escape_filter($this->env, ($context["txtPreferente"] ?? null), "html", null, true);
                echo "</small>
                            </div>
                        </div>
                    </div>
                ";
            }
            // line 685
            echo "
            </div>

        </div>

        ";
            // line 690
            if (call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_MOBILE__"])) {
                // line 691
                echo "            <div style=\"width:100%;margin-left: auto;margin-right: auto; margin-bottom:10px;\">
                <script type=\"text/javascript\" src=\"https://video.onnetwork.tv/widget/widget_scrolllist.php?widget=903\"></script>
            </div>
        ";
            }
            // line 695
            echo "
        <div class=\"col-12\">
            ";
            // line 697
            if (call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_MOBILE__"])) {
                // line 698
                echo "                ";
                $context["espacio"] = "partidoCabeceraMobile";
                // line 699
                echo "            ";
            } else {
                // line 700
                echo "                ";
                $context["espacio"] = "partidoCabecera";
                // line 701
                echo "            ";
            }
            // line 702
            echo "            ";
            $this->loadTemplate("publicidad/publiGestion.html.twig", "partido/index.html.twig", 702)->display($context);
            // line 703
            echo "        </div>


        <div class=\"col-12\">
            ";
            // line 707
            $this->loadTemplate("__part/pesLeerTwitsPortada.html.twig", "partido/index.html.twig", 707)->display($context);
            // line 708
            echo "        </div>

        <div id=\"rachas\" class=\"col-12 contenedorBlancoBordesRedondeados\" style=\"margin-top: 25px; padding-bottom: 25px;\">

            ";
            // line 712
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["rachas"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["racha"]) {
                // line 713
                echo "                ";
                echo twig_get_attribute($this->env, $this->source, $context["racha"], "resumen", [], "any", false, false, false, 713);
                echo "
                ";
                // line 714
                echo twig_get_attribute($this->env, $this->source, $context["racha"], "tabla", [], "any", false, false, false, 714);
                echo "

                ";
                // line 716
                if (0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "estado_partido", [], "any", false, false, false, 716), 1)) {
                    // line 717
                    echo "
                    ";
                    // line 718
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["racha"], "pronostico", [], "any", false, false, false, 718));
                    foreach ($context['_seq'] as $context["_key"] => $context["prono"]) {
                        // line 719
                        echo "                        ";
                        echo twig_get_attribute($this->env, $this->source, $context["prono"], "txt_percentG", [], "any", false, false, false, 719);
                        echo "
                        ";
                        // line 720
                        echo twig_get_attribute($this->env, $this->source, $context["prono"], "txt_percentGa", [], "any", false, false, false, 720);
                        echo "
                        ";
                        // line 721
                        echo twig_get_attribute($this->env, $this->source, $context["prono"], "txt_percentGb", [], "any", false, false, false, 721);
                        echo "
                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['prono'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 723
                    echo "                ";
                }
                // line 724
                echo "
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['racha'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 726
            echo "

            <style type=\"text/css\">
                #rachas table {
                    border-collapse: collapse;
                    border-style: hidden;
                }
            </style>
        </div>

        <div class=\"col-12\">
            ";
            // line 737
            if (call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_MOBILE__"])) {
                // line 738
                echo "                ";
                $context["espacio"] = "partidoContenidoMobile";
                // line 739
                echo "            ";
            } else {
                // line 740
                echo "                ";
                $context["espacio"] = "partidoContenido";
                // line 741
                echo "            ";
            }
            // line 742
            echo "            ";
            $this->loadTemplate("publicidad/publiGestion.html.twig", "partido/index.html.twig", 742)->display($context);
            // line 743
            echo "        </div>

    ";
        }
        // line 746
        echo "
";
    }

    // line 749
    public function block_bloqueJs($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 750
        echo "
    ";
        // line 751
        if (0 === twig_compare(($context["modelo"] ?? null), "Partido")) {
            // line 752
            echo "        <script>
            \$(function () {
                setInterval(function () {
                    refrescarPartido();
                },60000);
            });

            function refrescarPartido() {
                var dt = new Date();
                var time = dt.getHours() + \":\" + dt.getMinutes() + \":\" + dt.getSeconds();
                \$.ajax({
                    type: 'GET',
                    url: '";
            // line 764
            echo twig_escape_filter($this->env, ($context["current_url"] ?? null), "html", null, true);
            echo "',
                    cache: false,
                })
                    .done(function (data) {
                        \$('#contenedorCentral').html(\$(data).find('#contenedorCentral').html());
                        \$('#ultimosEventos').html(\$(data).find('#ultimosEventos').html());
                    });

            }
        </script>
    ";
        }
        // line 775
        echo "
    <script type=\"text/javascript\">

        function mostrarPestanaEnfrentamientos(pestanaMostrar) {
            console.log(pestanaMostrar);

            \$('#tabsEnfrentamientos .btn').each(function(i, el) {
                var jEl = \$(el);
                jEl.closest('li').removeClass('activa');
            });
            \$('#tabsEnfrentamientos #' + pestanaMostrar + '-tab').closest('li').addClass('activa');
            \$('#tabsEnfrentamientosContent .tab-pane').removeClass('show activa');
            \$('#tabsEnfrentamientosContent #' + pestanaMostrar).addClass('show activa');
        }

        \$(document).on('click', '#tabsEnfrentamientos .btn', function (e) {
            var jThis = \$(this);
            var pestana = jThis.attr('aria-controls');

            mostrarPestanaEnfrentamientos(pestana);
        });

    </script>

";
    }

    // line 803
    public function block_contenedorDerecha($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 804
        echo "

";
    }

    public function getTemplateName()
    {
        return "partido/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1799 => 804,  1795 => 803,  1767 => 775,  1753 => 764,  1739 => 752,  1737 => 751,  1734 => 750,  1730 => 749,  1725 => 746,  1720 => 743,  1717 => 742,  1714 => 741,  1711 => 740,  1708 => 739,  1705 => 738,  1703 => 737,  1690 => 726,  1683 => 724,  1680 => 723,  1672 => 721,  1668 => 720,  1663 => 719,  1659 => 718,  1656 => 717,  1654 => 716,  1649 => 714,  1644 => 713,  1640 => 712,  1634 => 708,  1632 => 707,  1626 => 703,  1623 => 702,  1620 => 701,  1617 => 700,  1614 => 699,  1611 => 698,  1609 => 697,  1605 => 695,  1599 => 691,  1597 => 690,  1590 => 685,  1582 => 680,  1575 => 675,  1562 => 668,  1555 => 664,  1550 => 663,  1548 => 661,  1547 => 660,  1546 => 659,  1539 => 655,  1534 => 654,  1532 => 652,  1531 => 651,  1530 => 650,  1523 => 646,  1518 => 645,  1516 => 643,  1515 => 642,  1514 => 641,  1507 => 637,  1502 => 636,  1500 => 634,  1499 => 633,  1498 => 632,  1491 => 628,  1486 => 627,  1484 => 625,  1483 => 624,  1482 => 623,  1475 => 619,  1470 => 618,  1468 => 616,  1467 => 615,  1466 => 614,  1460 => 611,  1455 => 610,  1453 => 608,  1452 => 607,  1451 => 606,  1448 => 605,  1442 => 602,  1436 => 599,  1429 => 597,  1424 => 596,  1422 => 595,  1421 => 594,  1420 => 593,  1414 => 590,  1411 => 589,  1409 => 581,  1405 => 579,  1401 => 577,  1398 => 576,  1395 => 575,  1393 => 574,  1390 => 573,  1388 => 572,  1385 => 571,  1382 => 570,  1379 => 569,  1377 => 568,  1374 => 567,  1372 => 566,  1369 => 565,  1366 => 564,  1363 => 563,  1360 => 562,  1357 => 561,  1355 => 560,  1352 => 559,  1350 => 558,  1347 => 557,  1345 => 555,  1344 => 554,  1343 => 553,  1340 => 552,  1337 => 551,  1334 => 550,  1332 => 549,  1329 => 548,  1326 => 547,  1323 => 546,  1320 => 545,  1317 => 544,  1314 => 543,  1312 => 542,  1309 => 541,  1306 => 540,  1303 => 539,  1300 => 538,  1297 => 537,  1294 => 536,  1291 => 535,  1289 => 534,  1286 => 533,  1283 => 532,  1279 => 531,  1276 => 530,  1273 => 529,  1270 => 528,  1268 => 527,  1254 => 515,  1250 => 513,  1248 => 512,  1241 => 507,  1239 => 506,  1235 => 504,  1231 => 502,  1228 => 501,  1212 => 499,  1196 => 497,  1194 => 496,  1179 => 495,  1177 => 494,  1174 => 493,  1172 => 491,  1171 => 490,  1170 => 489,  1167 => 488,  1164 => 487,  1161 => 486,  1158 => 485,  1155 => 484,  1153 => 483,  1150 => 482,  1147 => 481,  1145 => 480,  1142 => 479,  1139 => 478,  1136 => 477,  1133 => 476,  1130 => 475,  1128 => 474,  1125 => 473,  1123 => 472,  1119 => 470,  1114 => 467,  1112 => 466,  1109 => 465,  1106 => 464,  1103 => 463,  1100 => 462,  1097 => 461,  1094 => 460,  1091 => 459,  1089 => 458,  1085 => 456,  1083 => 455,  1080 => 454,  1078 => 453,  1071 => 449,  1068 => 448,  1064 => 446,  1060 => 444,  1054 => 442,  1052 => 441,  1046 => 440,  1042 => 438,  1038 => 436,  1032 => 434,  1030 => 433,  1023 => 432,  1017 => 428,  1015 => 427,  1010 => 425,  1000 => 418,  994 => 415,  989 => 412,  982 => 407,  978 => 405,  976 => 404,  973 => 403,  971 => 402,  959 => 395,  954 => 392,  952 => 391,  949 => 390,  945 => 388,  943 => 387,  940 => 386,  937 => 385,  934 => 384,  932 => 383,  928 => 381,  926 => 380,  923 => 379,  920 => 378,  917 => 377,  914 => 376,  911 => 375,  909 => 374,  906 => 373,  904 => 372,  901 => 371,  898 => 370,  895 => 369,  893 => 368,  890 => 367,  887 => 366,  884 => 365,  882 => 364,  879 => 363,  876 => 362,  873 => 361,  871 => 360,  868 => 359,  865 => 358,  862 => 357,  860 => 356,  857 => 355,  855 => 354,  852 => 353,  850 => 352,  847 => 351,  845 => 350,  842 => 349,  840 => 348,  837 => 347,  835 => 346,  827 => 341,  822 => 338,  820 => 337,  815 => 334,  810 => 331,  798 => 327,  794 => 326,  790 => 324,  786 => 323,  780 => 320,  776 => 318,  774 => 317,  767 => 313,  764 => 312,  761 => 311,  758 => 310,  755 => 309,  752 => 308,  750 => 307,  743 => 302,  739 => 300,  736 => 299,  733 => 298,  727 => 296,  725 => 295,  724 => 294,  723 => 293,  722 => 292,  720 => 291,  718 => 290,  713 => 289,  711 => 288,  710 => 287,  709 => 286,  707 => 285,  701 => 283,  699 => 282,  698 => 281,  697 => 280,  695 => 279,  692 => 278,  690 => 277,  686 => 276,  681 => 273,  675 => 270,  672 => 269,  666 => 266,  663 => 265,  661 => 264,  654 => 262,  650 => 260,  647 => 259,  641 => 255,  639 => 254,  634 => 251,  619 => 249,  617 => 248,  614 => 247,  606 => 241,  597 => 237,  591 => 233,  585 => 232,  579 => 231,  573 => 228,  569 => 226,  563 => 223,  560 => 222,  558 => 221,  554 => 219,  546 => 213,  539 => 210,  537 => 209,  534 => 208,  531 => 207,  527 => 205,  525 => 204,  520 => 200,  512 => 197,  509 => 196,  503 => 193,  500 => 192,  498 => 191,  495 => 190,  493 => 189,  486 => 184,  483 => 183,  480 => 182,  477 => 181,  474 => 180,  472 => 179,  469 => 178,  466 => 177,  463 => 175,  461 => 174,  458 => 173,  456 => 172,  452 => 170,  449 => 169,  446 => 168,  443 => 167,  441 => 166,  438 => 165,  435 => 164,  432 => 163,  429 => 162,  427 => 161,  423 => 159,  420 => 158,  418 => 157,  414 => 155,  410 => 154,  407 => 153,  405 => 152,  398 => 147,  389 => 144,  385 => 143,  381 => 142,  377 => 141,  373 => 140,  368 => 138,  364 => 137,  360 => 136,  356 => 135,  352 => 134,  342 => 126,  336 => 123,  333 => 122,  327 => 119,  324 => 118,  322 => 117,  317 => 114,  313 => 113,  303 => 108,  295 => 105,  292 => 104,  290 => 103,  287 => 102,  285 => 101,  283 => 100,  278 => 97,  263 => 95,  261 => 94,  258 => 93,  255 => 92,  253 => 91,  250 => 90,  233 => 89,  227 => 86,  221 => 82,  219 => 81,  216 => 80,  198 => 79,  196 => 78,  190 => 74,  183 => 72,  181 => 71,  159 => 68,  155 => 66,  153 => 65,  150 => 64,  145 => 63,  143 => 62,  134 => 56,  130 => 55,  121 => 51,  109 => 41,  107 => 40,  101 => 36,  97 => 26,  95 => 25,  94 => 24,  93 => 23,  87 => 22,  83 => 20,  81 => 19,  80 => 18,  79 => 17,  73 => 16,  67 => 12,  63 => 11,  58 => 7,  56 => 6,  53 => 5,  49 => 4,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "partido/index.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/partido/index.html.twig");
    }
}
