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

/* partido/alineaciones.html.twig */
class __TwigTemplate_7a058f769b24930ff30b52d06236d673543529a55d8548740fc3555eeaa9dc4e extends Template
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
        echo "
<div class=\"row\" style=\"width: 100%;\">
    <div class=\"col-12\">
        <table class=\"col-12\">
        ";
        // line 5
        $context["cambioTiempo"] = 0;
        // line 6
        echo "        ";
        $context["contador"] = 0;
        // line 7
        echo "
        ";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["todoOk"] ?? null));
        foreach ($context['_seq'] as $context["k"] => $context["GolT"]) {
            // line 9
            echo "            ";
            $context["txtMinuto"] = twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["GolT"], "minuto", [], "any", false, false, false, 9), 1);
            // line 10
            echo "
            ";
            // line 11
            if (-1 === twig_compare(twig_length_filter($this->env, ($context["txtMinuto"] ?? null)), 2)) {
                // line 12
                echo "                ";
                $context["txtMinuto"] = ("&nbsp;&nbsp;" . ($context["txtMinuto"] ?? null));
                // line 13
                echo "            ";
            }
            // line 14
            echo "
            ";
            // line 15
            $context["tiempo"] = twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["GolT"], "minuto", [], "any", false, false, false, 15), 0, 1);
            // line 16
            echo "
            ";
            // line 17
            if (0 === twig_compare(($context["contador"] ?? null), 0)) {
                // line 18
                echo "                <tr style=\"height:40px;\">
                    <td colspan=\"2\" class=\"text-center\">
                        <h3 class=\"subtitulo\">
                            Primer Tiempo
                        </h3>
                    </td>
                </tr>
            ";
            }
            // line 26
            echo "
            ";
            // line 27
            if ((0 === twig_compare(($context["cambioTiempo"] ?? null), 0) && 0 === twig_compare(($context["tiempo"] ?? null), 2))) {
                // line 28
                echo "                <tr style=\"height:40px;\">
                    <td colspan=\"2\" class=\"text-center\">
                        <h3 class=\"subtitulo\">
                            Segundo Tiempo
                        </h3>
                    </td>
                </tr>
                ";
                // line 35
                $context["cambioTiempo"] = 1;
                // line 36
                echo "            ";
            }
            // line 37
            echo "
            ";
            // line 38
            $context["txtGol"] = "";
            // line 39
            echo "            ";
            $context["balon"] = "/static/img/balon.png";
            // line 40
            echo "
            ";
            // line 41
            $context["golTipo"] = twig_get_attribute($this->env, $this->source, $context["GolT"], "esLocal", [], "any", false, false, false, 41);
            // line 42
            echo "
            ";
            // line 43
            if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["GolT"], "tipo", [], "any", false, false, false, 43), 10)) {
                // line 44
                echo "                ";
                $context["balon"] = "/static/img/balonR.png";
                // line 45
                echo "                ";
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["GolT"], "esLocal", [], "any", false, false, false, 45), 1)) {
                    // line 46
                    echo "                    ";
                    $context["golTipo"] = 0;
                    // line 47
                    echo "                ";
                }
                // line 48
                echo "                ";
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["GolT"], "esLocal", [], "any", false, false, false, 48), 0)) {
                    // line 49
                    echo "                    ";
                    $context["golTipo"] = 1;
                    // line 50
                    echo "                ";
                }
                // line 51
                echo "            ";
            }
            // line 52
            echo "
            ";
            // line 53
            if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["GolT"], "tipo", [], "any", false, false, false, 53), 11)) {
                // line 54
                echo "                ";
                $context["balon"] = "/static/img/balonG.png";
                // line 55
                echo "            ";
            }
            // line 56
            echo "
            ";
            // line 57
            if (1 === twig_compare(twig_get_attribute($this->env, $this->source, $context["GolT"], "minuto", [], "any", false, false, false, 57), 200)) {
                // line 58
                echo "                ";
                $context["txtTiempo"] = "2ºT";
                // line 59
                echo "                ";
                if (1 === twig_compare(($context["txtMinuto"] ?? null), 90)) {
                    // line 60
                    echo "                    ";
                    $context["txtMinuto"] = ("90+" . (($context["txtMinuto"] ?? null) - 90));
                    // line 61
                    echo "                ";
                }
                // line 62
                echo "            ";
            } else {
                // line 63
                echo "                ";
                $context["txtTiempo"] = "1ºT";
                // line 64
                echo "                ";
                if (1 === twig_compare(($context["txtMinuto"] ?? null), 45)) {
                    // line 65
                    echo "                    ";
                    $context["txtMinuto"] = ("45+" . (($context["txtMinuto"] ?? null) - 45));
                    // line 66
                    echo "                ";
                }
                // line 67
                echo "            ";
            }
            // line 68
            echo "
            <tr>
            ";
            // line 70
            if (0 === twig_compare(($context["golTipo"] ?? null), 1)) {
                // line 71
                echo "                <td class=\"text-right\" style=\"width: 50%; height:25px;\">
                    ";
                // line 72
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["GolT"], "gol", [], "any", false, false, false, 72), 1)) {
                    // line 73
                    echo "                        ";
                    echo twig_escape_filter($this->env, ($context["txtGol"] ?? null), "html", null, true);
                    echo " <a style=\"color: #434343;\" href=\"/jugador.php?id=";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["GolT"], "jugador_id", [], "any", false, false, false, 73), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["GolT"], "nombreJugador", [], "any", false, false, false, 73), "html", null, true);
                    echo "</a>

                        ";
                    // line 75
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["GolT"], "tipo", [], "any", false, false, false, 75), 11)) {
                        // line 76
                        echo "                            <span style=\"background-color:red; font-size:7px; padding: 2px 5px\" class=\"badge\" title=\"Penalti fallado\">F</span>
                        ";
                    }
                    // line 78
                    echo "
                        ";
                    // line 79
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["GolT"], "tipo", [], "any", false, false, false, 79), 1)) {
                        // line 80
                        echo "                            <span style=\"background-color:green; font-size:7px; padding: 2px 5px\" class=\"badge\" title=\"Gol de penalti\">P</span>
                        ";
                    }
                    // line 82
                    echo "
                        <img src=\"";
                    // line 83
                    echo twig_escape_filter($this->env, ($context["balon"] ?? null), "html", null, true);
                    echo "\" height=\"17\" style=\"margin-bottom:3px\">

                        <span class=\"label label-info\">";
                    // line 85
                    echo ($context["txtMinuto"] ?? null);
                    echo "</span>
                    ";
                } else {
                    // line 87
                    echo "                        ";
                    echo twig_escape_filter($this->env, ($context["txtGol"] ?? null), "html", null, true);
                    echo " <a style=\"color: #434343;\" href=\"/jugador.php?id=";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["GolT"], "jugador_id", [], "any", false, false, false, 87), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["GolT"], "nombreJugador", [], "any", false, false, false, 87), "html", null, true);
                    echo "</a>

                        ";
                    // line 89
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["GolT"], "tipo", [], "any", false, false, false, 89), 0)) {
                        // line 90
                        echo "                            <span class=\"iconseparate\"><img src=\"/static/img/ta.png\" height=\"17\" style=\"margin-bottom:3px\"></span>
                        ";
                    } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,                     // line 91
$context["GolT"], "tipo", [], "any", false, false, false, 91), 1)) {
                        // line 92
                        echo "                            <span class=\"iconseparate\"><img src=\"/static/img/ta2.png\" height=\"17\" style=\"margin-bottom:3px\"></span>
                        ";
                    } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,                     // line 93
$context["GolT"], "tipo", [], "any", false, false, false, 93), 5)) {
                        // line 94
                        echo "                            <span class=\"iconseparate\"><img src=\"/img/tr.png\" height=\"17\" style=\"margin-bottom:3px\"></span>
                        ";
                    } elseif ((0 === twig_compare(twig_get_attribute($this->env, $this->source,                     // line 95
$context["GolT"], "tipo", [], "any", false, false, false, 95), 3) || (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["GolT"], "tipo", [], "any", false, false, false, 95), 4) && twig_get_attribute($this->env, $this->source, $context["GolT"], "jugador_id2", [], "any", true, true, false, 95)))) {
                        // line 96
                        echo "                            <span style='color:maroon;' class='glyphicon glyphicon-arrow-right'></span><span style='color:green;' class='iconseparate glyphicon glyphicon-arrow-left'></span>
                            <a href=\"/jugador.php?id=";
                        // line 97
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["GolT"], "jugador_id2", [], "any", false, false, false, 97), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["GolT"], "nombreJugador2", [], "any", false, false, false, 97), "html", null, true);
                        echo "</a>
                        ";
                    } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,                     // line 98
$context["GolT"], "tipo", [], "any", false, false, false, 98), 25)) {
                        // line 99
                        echo "                            <span><img src=\"/static/img/ta.png\" height=\"17\" style=\"margin-bottom:3px\"></span>
                            <span><img src=\"/static/img/tr.png\" height=\"17\" style=\"margin-bottom:3px\"></span>
                        ";
                    }
                    // line 102
                    echo "                        <span class=\"label label-info\">";
                    echo ($context["txtMinuto"] ?? null);
                    echo "</span>
                    ";
                }
                // line 104
                echo "                </td>
                <td style=\"width: 50%; height:25px\"></td>
            ";
            } else {
                // line 107
                echo "                <td style=\"width: 50%; height:25px\"></td>
                <td style=\"width: 50%; height:25px;\">
                    ";
                // line 109
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["GolT"], "gol", [], "any", false, false, false, 109), 1)) {
                    // line 110
                    echo "                        ";
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["GolT"], "gol", [], "any", false, false, false, 110), 11)) {
                        // line 111
                        echo "                            <span style=\"background-color:red; font-size:7px; padding: 2px 5px\" class=\"badge\" title=\"Penalti fallado\">F</span>
                        ";
                    }
                    // line 113
                    echo "
                        ";
                    // line 114
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["GolT"], "gol", [], "any", false, false, false, 114), 1)) {
                        // line 115
                        echo "                            <span class=\"label label-info\">";
                        echo ($context["txtMinuto"] ?? null);
                        echo "</span>
                            <span class=\"iconseparate\"><img src=\"";
                        // line 116
                        echo twig_escape_filter($this->env, ($context["balon"] ?? null), "html", null, true);
                        echo "\" height=\"17\" style=\"margin-bottom:3px\"></span>
                        ";
                    }
                    // line 118
                    echo "
                        <a style=\"color: #434343;\" href=\"/jugador.php?id=";
                    // line 119
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["GolT"], "jugador_id", [], "any", false, false, false, 119), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["GolT"], "nombreJugador", [], "any", false, false, false, 119), "html", null, true);
                    echo "</a>
                        ";
                    // line 120
                    echo twig_escape_filter($this->env, ($context["txtGol"] ?? null), "html", null, true);
                    echo "

                    ";
                } else {
                    // line 123
                    echo "
                        <span class=\"label label-info\">";
                    // line 124
                    echo ($context["txtMinuto"] ?? null);
                    echo "</span>
                        ";
                    // line 125
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["GolT"], "tipo", [], "any", false, false, false, 125), 0)) {
                        // line 126
                        echo "                            <span class=\"iconseparate\"><img src=\"/img/ta.png\" height=\"17\" style=\"margin-bottom:3px\"></span>
                        ";
                    } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,                     // line 127
$context["GolT"], "tipo", [], "any", false, false, false, 127), 1)) {
                        // line 128
                        echo "                            <span class=\"iconseparate\"><img src=\"/img/ta2.png\" height=\"17\" style=\"margin-bottom:3px\"></span>
                        ";
                    } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,                     // line 129
$context["GolT"], "tipo", [], "any", false, false, false, 129), 5)) {
                        // line 130
                        echo "                            <span class=\"iconseparate\"><img src=\"/img/tr.png\" height=\"17\" style=\"margin-bottom:3px\"></span>
                        ";
                    } elseif ((0 === twig_compare(twig_get_attribute($this->env, $this->source,                     // line 131
$context["GolT"], "tipo", [], "any", false, false, false, 131), 3) || (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["GolT"], "tipo", [], "any", false, false, false, 131), 4) && twig_get_attribute($this->env, $this->source, $context["GolT"], "jugador_id2", [], "any", true, true, false, 131)))) {
                        // line 132
                        echo "                            <a style=\"color: #434343;\"href=\"/jugador.php?id=";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["GolT"], "jugador_id2", [], "any", false, false, false, 132), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["GolT"], "nombreJugador2", [], "any", false, false, false, 132), "html", null, true);
                        echo "</a>

                            <span style='color:green;' class='iconseparate glyphicon glyphicon-arrow-right'></span><span style='color:maroon;' class='glyphicon glyphicon-arrow-left'></span>

                        ";
                    } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,                     // line 136
$context["GolT"], "tipo", [], "any", false, false, false, 136), 25)) {
                        // line 137
                        echo "                            <span><img src=\"/img/ta.png\" height=\"17\" style=\"margin-bottom:3px\"></span> <span><img src=\"/img/ta.png\" height=\"17\" style=\"margin-bottom:3px\"></span>
                        ";
                    }
                    // line 139
                    echo "
                        <a style=\"color: #434343;\" href=\"/jugador.php?id=";
                    // line 140
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["GolT"], "jugador_id", [], "any", false, false, false, 140), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["GolT"], "nombreJugador", [], "any", false, false, false, 140), "html", null, true);
                    echo "</a>

                    ";
                }
                // line 143
                echo "
                </td>

            ";
            }
            // line 147
            echo "
            </tr>

            ";
            // line 150
            $context["contador"] = (($context["contador"] ?? null) + 1);
            // line 151
            echo "
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['k'], $context['GolT'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 153
        echo "        </table>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "partido/alineaciones.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  413 => 153,  406 => 151,  404 => 150,  399 => 147,  393 => 143,  385 => 140,  382 => 139,  378 => 137,  376 => 136,  366 => 132,  364 => 131,  361 => 130,  359 => 129,  356 => 128,  354 => 127,  351 => 126,  349 => 125,  345 => 124,  342 => 123,  336 => 120,  330 => 119,  327 => 118,  322 => 116,  317 => 115,  315 => 114,  312 => 113,  308 => 111,  305 => 110,  303 => 109,  299 => 107,  294 => 104,  288 => 102,  283 => 99,  281 => 98,  275 => 97,  272 => 96,  270 => 95,  267 => 94,  265 => 93,  262 => 92,  260 => 91,  257 => 90,  255 => 89,  245 => 87,  240 => 85,  235 => 83,  232 => 82,  228 => 80,  226 => 79,  223 => 78,  219 => 76,  217 => 75,  207 => 73,  205 => 72,  202 => 71,  200 => 70,  196 => 68,  193 => 67,  190 => 66,  187 => 65,  184 => 64,  181 => 63,  178 => 62,  175 => 61,  172 => 60,  169 => 59,  166 => 58,  164 => 57,  161 => 56,  158 => 55,  155 => 54,  153 => 53,  150 => 52,  147 => 51,  144 => 50,  141 => 49,  138 => 48,  135 => 47,  132 => 46,  129 => 45,  126 => 44,  124 => 43,  121 => 42,  119 => 41,  116 => 40,  113 => 39,  111 => 38,  108 => 37,  105 => 36,  103 => 35,  94 => 28,  92 => 27,  89 => 26,  79 => 18,  77 => 17,  74 => 16,  72 => 15,  69 => 14,  66 => 13,  63 => 12,  61 => 11,  58 => 10,  55 => 9,  51 => 8,  48 => 7,  45 => 6,  43 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "partido/alineaciones.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/partido/alineaciones.html.twig");
    }
}
