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
class __TwigTemplate_fb6bcd519408660cde243ddaf5fb4a46dd295f66080257db1ba9337ca5d80445 extends Template
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
                        echo "
                    <div class=\"clear\"></div>
                    ";
                        // line 120
                        if (0 === twig_compare(($context["clickio"] ?? null), 1)) {
                            // line 121
                            echo "
                    ";
                        }
                        // line 123
                        echo "                    <div class=\"clear\"></div>


                ";
                    }
                    // line 127
                    echo "
                ";
                    // line 128
                    if (0 !== twig_compare(($context["fecha"] ?? null), twig_get_attribute($this->env, $this->source, $context["partido"], "fecha", [], "any", false, false, false, 128))) {
                        // line 129
                        echo "                    ";
                        $context["fecha"] = twig_get_attribute($this->env, $this->source, $context["partido"], "fecha", [], "any", false, false, false, 129);
                        // line 130
                        echo "
                    <div class=\"row\">
                        <div class=\"col-12 nombreDiaPartido\">
                            ";
                        // line 133
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('nombreDiaCompleto')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["partido"], "fecha", [], "any", false, false, false, 133)]), "html", null, true);
                        echo "
                        </div>
                    </div>

                ";
                    }
                    // line 138
                    echo "
                ";
                    // line 139
                    if (((null === twig_get_attribute($this->env, $this->source, $context["partido"], "equipoLocal_id", [], "any", false, false, false, 139)) || (null === twig_get_attribute($this->env, $this->source, $context["partido"], "equipoVisitante_id", [], "any", false, false, false, 139)))) {
                        // line 140
                        echo "                    <div class=\"row\">
                        <div class=\"col-12 equipoDescansa\">
                            Descansa
                            ";
                        // line 143
                        if ((null === twig_get_attribute($this->env, $this->source, $context["partido"], "equipoLocal_id", [], "any", false, false, false, 143))) {
                            // line 144
                            echo "                                ";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "visitante", [], "any", false, false, false, 144), "html", null, true);
                            echo "
                            ";
                        } else {
                            // line 146
                            echo "                                ";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "local", [], "any", false, false, false, 146), "html", null, true);
                            echo "
                            ";
                        }
                        // line 148
                        echo "                        </div>
                    </div>

                ";
                    } else {
                        // line 152
                        echo "
                    ";
                        // line 153
                        $this->loadTemplate("index/__part/filaPartido.html.twig", "temporada/__content/__part/pesJornada.html.twig", 153)->display($context);
                        // line 154
                        echo "
                ";
                    }
                    // line 156
                    echo "
                ";
                    // line 157
                    $context["i"] = (($context["i"] ?? null) + 1);
                    // line 158
                    echo "
            ";
                }
                // line 160
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
            // line 162
            echo "
    </div>

    ";
            // line 165
            if (1 === twig_compare(twig_length_filter($this->env, ($context["partidosSinFecha"] ?? null)), 0)) {
                // line 166
                echo "        <div class=\"col-12\">
            <div class=\"col-xs-12 txt11 cajanaranja text-center\">Sin fecha definida</div>
            ";
                // line 168
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
                    // line 169
                    echo "
                ";
                    // line 170
                    $this->loadTemplate("index/__part/filaPartido.html.twig", "temporada/__content/__part/pesJornada.html.twig", 170)->display($context);
                    // line 171
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
                // line 173
                echo "
        </div>
    ";
            }
            // line 176
            echo "

    ";
            // line 178
            $context["espacio"] = "temporadaClasificacion";
            // line 179
            echo "    ";
            $this->loadTemplate("publicidad/publiGestion.html.twig", "temporada/__content/__part/pesJornada.html.twig", 179)->display($context);
            // line 180
            echo "
    ";
            // line 181
            if ((isset($context["clasificacion"]) || array_key_exists("clasificacion", $context))) {
                // line 182
                echo "
        ";
                // line 183
                $this->loadTemplate("temporada/__content/__part/pesClasificacion.html.twig", "temporada/__content/__part/pesJornada.html.twig", 183)->display($context);
                // line 184
                echo "

    ";
            }
            // line 187
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
        return array (  448 => 187,  443 => 184,  441 => 183,  438 => 182,  436 => 181,  433 => 180,  430 => 179,  428 => 178,  424 => 176,  419 => 173,  404 => 171,  402 => 170,  399 => 169,  382 => 168,  378 => 166,  376 => 165,  371 => 162,  356 => 160,  352 => 158,  350 => 157,  347 => 156,  343 => 154,  341 => 153,  338 => 152,  332 => 148,  326 => 146,  320 => 144,  318 => 143,  313 => 140,  311 => 139,  308 => 138,  300 => 133,  295 => 130,  292 => 129,  290 => 128,  287 => 127,  281 => 123,  277 => 121,  275 => 120,  271 => 118,  269 => 117,  266 => 116,  264 => 115,  261 => 114,  258 => 108,  240 => 107,  237 => 106,  235 => 105,  231 => 103,  229 => 102,  226 => 101,  219 => 96,  217 => 95,  211 => 92,  205 => 88,  203 => 87,  184 => 70,  174 => 63,  168 => 62,  164 => 60,  162 => 59,  154 => 53,  144 => 49,  138 => 48,  135 => 47,  131 => 46,  121 => 41,  114 => 36,  110 => 34,  101 => 19,  95 => 18,  92 => 17,  90 => 16,  82 => 10,  77 => 7,  63 => 6,  60 => 5,  43 => 4,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "temporada/__content/__part/pesJornada.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/temporada/__content/__part/pesJornada.html.twig");
    }
}
