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

/* temporada/__content/__part/pesJornada.html.twig */
class __TwigTemplate_05efb9818166c090132b420c34f926fb4827ad1fdab58d9031722a25ab42d148 extends Template
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
        if (1 === twig_compare(twig_length_filter($this->env, ($context["partidosIndexFeed"] ?? null)), 0)) {
            // line 2
            echo "    <div class=\"row\">
        <div class=\"col-12\">
            ";
            // line 4
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["partidosIndexFeed"] ?? null));
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
                // line 5
                echo "                ";
                $this->loadTemplate("index/__part/filaPartido.html.twig", "temporada/__content/__part/pesJornada.html.twig", 5)->display($context);
                // line 6
                echo "            ";
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
            // line 7
            echo "        </div>
    </div>
";
        }
        // line 10
        echo "
<div class=\"col-12\">


        <div id=\"selector-jornadas\" class=\"row\">

            ";
        // line 16
        if (1 === twig_compare(($context["valorJornada"] ?? null), 1)) {
            // line 17
            echo "                <div class=\"contenedorSelectorFechaLiveScore\">
                    <a href=\"";
            // line 18
            echo twig_escape_filter($this->env, ($context["pgTemporadaJornadaBase"] ?? null), "html", null, true);
            echo "jornada/";
            echo twig_escape_filter($this->env, (($context["valorJornada"] ?? null) - 1), "html", null, true);
            echo "\" class=\"boldfont cajasLiveScore selectorFechaLiveScore selectorFechaLiveScoreIzquierda\">
                        <span id=\"jornada-previa\" data-val=\"";
            // line 19
            echo twig_escape_filter($this->env, (($context["valorJornada"] ?? null) - 1), "html", null, true);
            echo "\" class=\"iconseparate glyphicon glyphicon-chevron-left\">
                        <
                    </span>
                    </a>
                </div>

                ";
            // line 34
            echo "
            ";
        }
        // line 36
        echo "
            <div class=\"contenedorCajaCentralLiveScore\">
                <div class=\"cajasLiveScore cajaCentralLiveScore text-center\">

                    <button type=\"button\" class=\"col-12 btn dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                        Jornada ";
        // line 41
        echo twig_escape_filter($this->env, ($context["valorJornada"] ?? null), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, ($context["jornadas"] ?? null), "html", null, true);
        echo "
                    </button>

                    <div class=\"dropdown-menu\" x-placement=\"bottom-start\">
                        <div class='menu_16 text-center'>
                            ";
        // line 46
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(1, ($context["jornadas"] ?? null)));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 47
            echo "                                <div class='text-center opcionJornada'>
                                    <a href='";
            // line 48
            echo twig_escape_filter($this->env, ($context["pgTemporadaJornadaBase"] ?? null), "html", null, true);
            echo "jornada/";
            echo twig_escape_filter($this->env, $context["i"], "html", null, true);
            echo "'>
                                        ";
            // line 49
            echo twig_escape_filter($this->env, $context["i"], "html", null, true);
            echo "
                                    </a>
                                </div>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 53
        echo "                        </div>
                    </div>

                </div>
            </div>

            ";
        // line 59
        if ((-1 === twig_compare(($context["valorJornada"] ?? null), ($context["jornadas"] ?? null)) && 1 === twig_compare(($context["valorJornada"] ?? null), 0))) {
            // line 60
            echo "
                <div class=\"contenedorSelectorFechaLiveScore\">
                    <a href=\"";
            // line 62
            echo twig_escape_filter($this->env, ($context["pgTemporadaJornadaBase"] ?? null), "html", null, true);
            echo "jornada/";
            echo twig_escape_filter($this->env, (($context["valorJornada"] ?? null) + 1), "html", null, true);
            echo "\" class=\"boldfont cajasLiveScore selectorFechaLiveScore selectorFechaLiveScoreDerecha\">
                        <span id=\"jornada-posterior\" data-val=\"";
            // line 63
            echo twig_escape_filter($this->env, (($context["valorJornada"] ?? null) + 1), "html", null, true);
            echo "\" class=\"iconseparate glyphicon glyphicon-chevron-right\">
                            >
                        </span>
                    </a>
                </div>

            ";
        }
        // line 70
        echo "
        </div>



</div>


<div class=\"row\">

    <div class=\"col-12\" id=\"mostrar-calendario\">

    </div>

</div>


";
        // line 87
        if (1 === twig_compare(($context["c_directos"] ?? null), 0)) {
            // line 88
            echo "    <div class=\"col-12\">
        <div id=\"contenedor-jornada-clasificacion\">

            <span class=\"actua pull-right badge\" style=\"font-weight:100;\">
            Actualizado a las ";
            // line 92
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, call_user_func_array($this->env->getFunction('hoyDateTime')->getCallable(), []), "H:i:s"), "html", null, true);
            echo "
            </span>

            ";
            // line 95
            $this->loadTemplate("index/__part/contenidoDirecto.html.twig", "temporada/__content/__part/pesJornada.html.twig", 95)->display($context);
            // line 96
            echo "
        </div>
    </div>

";
        }
        // line 101
        echo "
";
        // line 102
        if (1 === twig_compare(($context["valorJornada"] ?? null), 0)) {
            // line 103
            echo "    <div class=\"col-12\">

        ";
            // line 105
            $context["i"] = 1;
            // line 106
            echo "        ";
            $context["fecha"] = "";
            // line 107
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["partidosConFecha"] ?? null));
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
            foreach ($context['_seq'] as $context["key"] => $context["partido"]) {
                // line 108
                echo "
            ";
                // line 114
                echo "
            ";
                // line 115
                if ( !(0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "estado_partido", [], "any", false, false, false, 115), 2) || 1 === twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "estado_partido", [], "any", false, false, false, 115), 4))) {
                    // line 116
                    echo "
                ";
                    // line 117
                    if (0 === twig_compare(($context["i"] ?? null), 4)) {
                        // line 118
                        echo "                    <div class=\"col-12\">
                        ";
                        // line 119
                        $context["espacio"] = "entrePartidos";
                        // line 120
                        echo "                        ";
                        $this->loadTemplate("publicidad/publiGestion.html.twig", "temporada/__content/__part/pesJornada.html.twig", 120)->display($context);
                        // line 121
                        echo "                    </div>

                ";
                    }
                    // line 124
                    echo "
                ";
                    // line 125
                    if (0 !== twig_compare(($context["fecha"] ?? null), twig_get_attribute($this->env, $this->source, $context["partido"], "fecha", [], "any", false, false, false, 125))) {
                        // line 126
                        echo "                    ";
                        $context["fecha"] = twig_get_attribute($this->env, $this->source, $context["partido"], "fecha", [], "any", false, false, false, 126);
                        // line 127
                        echo "
                    ";
                        // line 129
                        echo "                        <div class=\"col-12 nombreDiaPartido\" style=\"padding:0px; line-height: 30px; clear: both;\">
                            ";
                        // line 130
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('nombreDiaCompleto')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["partido"], "fecha", [], "any", false, false, false, 130)]), "html", null, true);
                        echo "
                        </div>
                    ";
                        // line 133
                        echo "
                ";
                    }
                    // line 135
                    echo "
                ";
                    // line 136
                    if (((null === twig_get_attribute($this->env, $this->source, $context["partido"], "equipoLocal_id", [], "any", false, false, false, 136)) || (null === twig_get_attribute($this->env, $this->source, $context["partido"], "equipoVisitante_id", [], "any", false, false, false, 136)))) {
                        // line 137
                        echo "                    <div class=\"row\">
                        <div class=\"col-12 equipoDescansa\">
                            Descansa
                            ";
                        // line 140
                        if ((null === twig_get_attribute($this->env, $this->source, $context["partido"], "equipoLocal_id", [], "any", false, false, false, 140))) {
                            // line 141
                            echo "                                ";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "visitante", [], "any", false, false, false, 141), "html", null, true);
                            echo "
                            ";
                        } else {
                            // line 143
                            echo "                                ";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "local", [], "any", false, false, false, 143), "html", null, true);
                            echo "
                            ";
                        }
                        // line 145
                        echo "                        </div>
                    </div>

                ";
                    } else {
                        // line 149
                        echo "
                    ";
                        // line 150
                        $this->loadTemplate("index/__part/filaPartido.html.twig", "temporada/__content/__part/pesJornada.html.twig", 150)->display($context);
                        // line 151
                        echo "
                ";
                    }
                    // line 153
                    echo "
                ";
                    // line 154
                    $context["i"] = (($context["i"] ?? null) + 1);
                    // line 155
                    echo "
            ";
                }
                // line 157
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
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['partido'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 159
            echo "
    </div>

    ";
            // line 162
            if (1 === twig_compare(twig_length_filter($this->env, ($context["partidosSinFecha"] ?? null)), 0)) {
                // line 163
                echo "        <div class=\"col-12\">
            <div class=\"col-xs-12 txt11 cajanaranja text-center\">Sin fecha definida</div>
            ";
                // line 165
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["partidosSinFecha"] ?? null));
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
                foreach ($context['_seq'] as $context["key"] => $context["partido"]) {
                    // line 166
                    echo "
                ";
                    // line 167
                    $this->loadTemplate("index/__part/filaPartido.html.twig", "temporada/__content/__part/pesJornada.html.twig", 167)->display($context);
                    // line 168
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
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['partido'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 170
                echo "
        </div>
    ";
            }
            // line 173
            echo "
    <div class=\"col-12\">
        ";
            // line 175
            if (call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_MOBILE__"])) {
                // line 176
                echo "            ";
                $context["espacio"] = "temporadaClasificacionMobile";
                // line 177
                echo "        ";
            } else {
                // line 178
                echo "            ";
                $context["espacio"] = "temporadaClasificacion";
                // line 179
                echo "        ";
            }
            // line 180
            echo "        ";
            $this->loadTemplate("publicidad/publiGestion.html.twig", "temporada/__content/__part/pesJornada.html.twig", 180)->display($context);
            // line 181
            echo "    </div>


    ";
            // line 184
            if ((isset($context["clasificacion"]) || array_key_exists("clasificacion", $context))) {
                // line 185
                echo "
        ";
                // line 186
                $this->loadTemplate("temporada/__content/__part/pesClasificacion.html.twig", "temporada/__content/__part/pesJornada.html.twig", 186)->display($context);
                // line 187
                echo "

    ";
            }
            // line 190
            echo "

";
        }
    }

    public function getTemplateName()
    {
        return "temporada/__content/__part/pesJornada.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  461 => 190,  456 => 187,  454 => 186,  451 => 185,  449 => 184,  444 => 181,  441 => 180,  438 => 179,  435 => 178,  432 => 177,  429 => 176,  427 => 175,  423 => 173,  418 => 170,  403 => 168,  401 => 167,  398 => 166,  381 => 165,  377 => 163,  375 => 162,  370 => 159,  355 => 157,  351 => 155,  349 => 154,  346 => 153,  342 => 151,  340 => 150,  337 => 149,  331 => 145,  325 => 143,  319 => 141,  317 => 140,  312 => 137,  310 => 136,  307 => 135,  303 => 133,  298 => 130,  295 => 129,  292 => 127,  289 => 126,  287 => 125,  284 => 124,  279 => 121,  276 => 120,  274 => 119,  271 => 118,  269 => 117,  266 => 116,  264 => 115,  261 => 114,  258 => 108,  240 => 107,  237 => 106,  235 => 105,  231 => 103,  229 => 102,  226 => 101,  219 => 96,  217 => 95,  211 => 92,  205 => 88,  203 => 87,  184 => 70,  174 => 63,  168 => 62,  164 => 60,  162 => 59,  154 => 53,  144 => 49,  138 => 48,  135 => 47,  131 => 46,  121 => 41,  114 => 36,  110 => 34,  101 => 19,  95 => 18,  92 => 17,  90 => 16,  82 => 10,  77 => 7,  63 => 6,  60 => 5,  43 => 4,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "temporada/__content/__part/pesJornada.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.eu/v2/templates/temporada/__content/__part/pesJornada.html.twig");
    }
}
