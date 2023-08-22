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

/* partidos-televisados/index.html.twig */
class __TwigTemplate_9f743132a05fbbeaaa67a885c4b6360cdccbd431ef52aad3a3ba5f93e9120a78 extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "partidos-televisados/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_contenedorIzquierda($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "
    ";
        // line 5
        $this->loadTemplate("__part/ultimosEventos.html.twig", "partidos-televisados/index.html.twig", 5)->display($context);
        // line 6
        echo "
";
    }

    // line 9
    public function block_contenedorCentral($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 10
        echo "
    <div class=\"col-12\">
        <div class=\"row\">
            <div class=\"col-12\">
                <h1>
                    Partidos de fútbol televisados
                </h1>
                <h2 class=\"subtitulo\">del ";
        // line 17
        echo twig_escape_filter($this->env, ($context["inicio"] ?? null), "html", null, true);
        echo " al ";
        echo twig_escape_filter($this->env, ($context["final"] ?? null), "html", null, true);
        echo "</h2>
            </div>
        </div>

        ";
        // line 21
        if ( !($context["footers"] ?? null)) {
            // line 22
            echo "        <div class=\"row contenedorGlobalSelectorFiltroTv \">

            <div id=\"contenedorBotonFiltroTv\" class=\"col-12\">
                <a id=\"botonFiltroTv\" class=\"btn btn-danger\" href=\"\">Filtro TV</a>
            </div>

            <div class=\"col-12 contenedorBlancoBordesRedondeados\">
                <ul class=\"row\" id=\"listadoCanalesTelevisados\" style=\"display: none;\">
                    <li class=\"filtro-tv-xs col-12\" data-valor=\"todos\">
                        <a>TODOS LOS CANALES</a>
                        <div class=\"separadorOpcionesFiltroTV\"></div>
                    </li>
                    ";
            // line 34
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["medios"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["medio"]) {
                // line 35
                echo "                        <li class=\"col-12 col-md-6 filtro-tv-xs\" data-valor=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["medio"], "medio_id", [], "any", false, false, false, 35), "html", null, true);
                echo "\" style=\"color:black; cursor:pointer\">
                            <img alt=\"";
                // line 36
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["medio"], "medio_id", [], "any", false, false, false, 36), "html", null, true);
                echo "\" src=\"";
                echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
                echo "static/img/television/medio";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["medio"], "medio_id", [], "any", false, false, false, 36), "html", null, true);
                echo ".png\" height=\"30\" style=\"margin-left: 10px;\">
                            <br />
                            ";
                // line 38
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["medio"], "medio", [], "any", false, false, false, 38), "html", null, true);
                echo " (";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["medio"], "nMedios", [], "any", false, false, false, 38), "html", null, true);
                echo ")

                            <div class=\"separadorOpcionesFiltroTV\"></div>

                        </li>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['medio'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 44
            echo "                </ul>
            </div>

        </div>
        ";
        }
        // line 49
        echo "
        <div class=\"row\">
            <div class=\"col-12\">
                ";
        // line 52
        if (0 === twig_compare(($context["google"] ?? null), 1)) {
            // line 53
            echo "

                ";
        }
        // line 56
        echo "            </div>
        </div>

        <div class=\"row\">
            <div class=\"col-12\">

            ";
        // line 62
        $context["contador"] = 0;
        // line 63
        echo "            ";
        $context["equiposTw"] = [];
        // line 64
        echo "            ";
        $context["numDia"] = 0;
        // line 65
        echo "

            ";
        // line 67
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["partidos"] ?? null));
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
        foreach ($context['_seq'] as $context["fecha"] => $context["partidoFecha"]) {
            // line 68
            echo "                ";
            if (1 === twig_compare(($context["contador"] ?? null), 0)) {
                // line 69
                echo "                    <div class=\"separadorCajasFechas\">

                    </div>
                ";
            }
            // line 73
            echo "
                ";
            // line 74
            $context["numDia"] = (($context["numDia"] ?? null) + 1);
            // line 75
            echo "
                ";
            // line 76
            if (((1 === twig_compare(($context["numDia"] ?? null), 1) && 0 === twig_compare((($context["numDia"] ?? null) % 2), 0)) && -1 === twig_compare(($context["numDia"] ?? null), 5))) {
                // line 77
                echo "
                    

                ";
            }
            // line 81
            echo "
                <div class=\"row\">
                    <div class=\"col-12\" style=\"padding: 0px;\">
                        <div class=\"row\">
                            <div class=\"col-12 contenedorNombreDia\">
                                <h4>";
            // line 86
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('nombreDiaCompleto')->getCallable(), [$context["fecha"]]), "html", null, true);
            echo "</h4>
                            </div>
                        </div>

                        <div class=\"row\">
                                ";
            // line 91
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["partidoFecha"]);
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
            foreach ($context['_seq'] as $context["_key"] => $context["parti"]) {
                // line 92
                echo "
                                    ";
                // line 93
                if (-1 === twig_compare(($context["contador"] ?? null), 10)) {
                    // line 94
                    echo "
                                        ";
                    // line 95
                    $context["equipoTWLocal"] = ["id" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,                     // line 96
$context["parti"], "partido", [], "any", false, false, false, 96), "equipoLocal_id", [], "any", false, false, false, 96), "equipo" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,                     // line 97
$context["parti"], "partido", [], "any", false, false, false, 97), "local", [], "any", false, false, false, 97), "idPais" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,                     // line 98
$context["parti"], "partido", [], "any", false, false, false, 98), "pais_local", [], "any", false, false, false, 98)];
                    // line 100
                    echo "                                        ";
                    $context["equiposTw"] = call_user_func_array($this->env->getFunction('anadirAArray')->getCallable(), [($context["equiposTw"] ?? null), ($context["equipoTWLocal"] ?? null)]);
                    // line 101
                    echo "
                                        ";
                    // line 102
                    $context["equipoTWVisitante"] = ["id" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,                     // line 103
$context["parti"], "partido", [], "any", false, false, false, 103), "equipoVisitante_id", [], "any", false, false, false, 103), "equipo" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,                     // line 104
$context["parti"], "partido", [], "any", false, false, false, 104), "visitante", [], "any", false, false, false, 104), "idPais" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,                     // line 105
$context["parti"], "partido", [], "any", false, false, false, 105), "pais_visitante", [], "any", false, false, false, 105)];
                    // line 107
                    echo "                                        ";
                    $context["equiposTw"] = call_user_func_array($this->env->getFunction('anadirAArray')->getCallable(), [($context["equiposTw"] ?? null), ($context["equipoTWVisitante"] ?? null)]);
                    // line 108
                    echo "

                                    ";
                }
                // line 111
                echo "
                                    ";
                // line 112
                $context["contador"] = (($context["contador"] ?? null) + 1);
                // line 113
                echo "
                                    <a name=\"tv-";
                // line 114
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["parti"], "partido", [], "any", false, false, false, 114), "id", [], "any", false, false, false, 114), "html", null, true);
                echo "\" style=\"padding-top: 180px\"></a>


                                    ";
                // line 117
                if (0 === twig_compare(($context["contador"] ?? null), 5)) {
                    // line 118
                    echo "
                                        ";
                    // line 119
                    $this->loadTemplate("publicidad/cuerpo01.html.twig", "partidos-televisados/index.html.twig", 119)->display($context);
                    // line 120
                    echo "
                                    ";
                }
                // line 122
                echo "

                                    <div class=\"col-12 patidosTelevisadosCajaPartido
                                        ";
                // line 125
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["parti"], "tvs", [], "any", false, false, false, 125));
                foreach ($context['_seq'] as $context["_key"] => $context["tv"]) {
                    // line 126
                    echo "                                            ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tv"], "medio_id", [], "any", false, false, false, 126), "html", null, true);
                    echo "
                                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tv'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 128
                echo "                                    \">


                                        <div class=\"row\">

                                            <div class=\"col-7 nombreTemporada\">
                                                ";
                // line 137
                echo "                                                <span>
                                                ";
                // line 138
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["parti"], "partido", [], "any", false, false, false, 138), "categoria_torneo_id", [], "any", false, false, false, 138), 17)) {
                    // line 139
                    echo "                                                    <strong>Fútbol Sala</strong> -
                                                ";
                }
                // line 141
                echo "
                                                ";
                // line 142
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["parti"], "partido", [], "any", false, false, false, 142), "nombreTemporada", [], "any", false, false, false, 142), "html", null, true);
                echo "
                                            </span>

                                            </div>

                                            <div class=\"col-5 contenedorIconosTv\">

                                                ";
                // line 149
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["parti"], "tvs", [], "any", false, false, false, 149));
                foreach ($context['_seq'] as $context["_key"] => $context["tv"]) {
                    // line 150
                    echo "
                                                    <div class=\"float-right\">

                                                        ";
                    // line 153
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["tv"], "medio_id", [], "any", false, false, false, 153), 132)) {
                        // line 154
                        echo "
                                                            <span href=\"https://www.footters.com/register?ref=futbolmeoficial\" target=\"_blank\"><b>footters.com</b></span>

                                                        ";
                    }
                    // line 158
                    echo "
                                                        <img alt=\"";
                    // line 159
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tv"], "nombreMedio", [], "any", false, false, false, 159), "html", null, true);
                    echo "\" src=\"";
                    echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
                    echo "static/img/television/medio";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tv"], "medio_id", [], "any", false, false, false, 159), "html", null, true);
                    echo ".png\" style=\"max-height: 38px\">

                                                    </div>

                                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tv'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 164
                echo "
                                            </div>

                                        </div>

                                        ";
                // line 169
                $context["partido"] = twig_get_attribute($this->env, $this->source, $context["parti"], "partido", [], "any", false, false, false, 169);
                // line 170
                echo "                                        ";
                $context["pagina"] = "televisados";
                // line 171
                echo "                                        ";
                $context["partido"] = twig_array_merge(($context["partido"] ?? null), ["partidoAPI" => 0]);
                // line 174
                echo "
                                        ";
                // line 175
                $this->loadTemplate("index/__part/filaPartido.html.twig", "partidos-televisados/index.html.twig", 175)->display($context);
                // line 176
                echo "

                                    </div>


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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['parti'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 182
            echo "                            </div>
                    </div>
                </div>

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
        unset($context['_seq'], $context['_iterated'], $context['fecha'], $context['partidoFecha'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 187
        echo "


        </div>
        </div>

    </div>

";
    }

    // line 197
    public function block_bloqueJs($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 198
        echo "
    <script type=\"text/javascript\">

        \$(document).on('click', '#botonFiltroTv', function(e){
            e.preventDefault();
            e.stopPropagation();

            var capaListadoCanales = \$('#listadoCanalesTelevisados');

            if (!capaListadoCanales.is(':visible')) {
                capaListadoCanales.fadeIn(300);
            } else {
                capaListadoCanales.fadeOut(300);
            }
        });

    </script>

";
    }

    // line 220
    public function block_contenedorDerecha($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 221
        echo "

";
    }

    public function getTemplateName()
    {
        return "partidos-televisados/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  485 => 221,  481 => 220,  459 => 198,  455 => 197,  443 => 187,  425 => 182,  406 => 176,  404 => 175,  401 => 174,  398 => 171,  395 => 170,  393 => 169,  386 => 164,  371 => 159,  368 => 158,  362 => 154,  360 => 153,  355 => 150,  351 => 149,  341 => 142,  338 => 141,  334 => 139,  332 => 138,  329 => 137,  321 => 128,  312 => 126,  308 => 125,  303 => 122,  299 => 120,  297 => 119,  294 => 118,  292 => 117,  286 => 114,  283 => 113,  281 => 112,  278 => 111,  273 => 108,  270 => 107,  268 => 105,  267 => 104,  266 => 103,  265 => 102,  262 => 101,  259 => 100,  257 => 98,  256 => 97,  255 => 96,  254 => 95,  251 => 94,  249 => 93,  246 => 92,  229 => 91,  221 => 86,  214 => 81,  208 => 77,  206 => 76,  203 => 75,  201 => 74,  198 => 73,  192 => 69,  189 => 68,  172 => 67,  168 => 65,  165 => 64,  162 => 63,  160 => 62,  152 => 56,  147 => 53,  145 => 52,  140 => 49,  133 => 44,  119 => 38,  110 => 36,  105 => 35,  101 => 34,  87 => 22,  85 => 21,  76 => 17,  67 => 10,  63 => 9,  58 => 6,  56 => 5,  53 => 4,  49 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "partidos-televisados/index.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/partidos-televisados/index.html.twig");
    }
}
