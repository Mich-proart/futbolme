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

/* index/index.html.twig */
class __TwigTemplate_3202ac562f7e4af35f4d3f8319b62f5ca55e184db7108ab5482d1734cb219b88 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'contenedorCentral' => [$this, 'block_contenedorCentral'],
            'contenedorDerecha' => [$this, 'block_contenedorDerecha'],
            'contenedorIzquierda' => [$this, 'block_contenedorIzquierda'],
            'bloqueJs' => [$this, 'block_bloqueJs'],
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
        $this->parent = $this->loadTemplate("base.html.twig", "index/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_contenedorCentral($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "
    <div class=\"row\" style=\"margin: 0px;\">
        <div id=\"contenedorLiveScore\" class=\"col-12\">
            <div class=\"contenedorSelectorFechaLiveScore\">
                <a ";
        // line 7
        if ((0 !== twig_compare(($context["categoriaArg"] ?? null), "") && 0 !== twig_compare(($context["ctArg"] ?? null), ""))) {
            echo " rel=\"nofollow\" ";
        }
        echo " href=\"";
        if ((0 !== twig_compare(($context["categoriaArg"] ?? null), "") && 0 !== twig_compare(($context["ctArg"] ?? null), ""))) {
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home_fecha_categoria", ["fecha" => twig_date_format_filter($this->env, ($context["diaAnterior"] ?? null), "Y-m-d"), "categoria" => ($context["categoriaArg"] ?? null), "ct" => ($context["ctArg"] ?? null)]), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home_fecha", ["fecha" => twig_date_format_filter($this->env, ($context["diaAnterior"] ?? null), "Y-m-d")]), "html", null, true);
        }
        echo "\" class=\"boldfont cajasLiveScore selectorFechaLiveScore selectorFechaLiveScoreIzquierda\">
                    &lt; ";
        // line 8
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["diaAnterior"] ?? null), "d/m"), "html", null, true);
        echo "
                </a>
            </div>

            <div class=\"contenedorCajaCentralLiveScore\">
                <div class=\"cajasLiveScore cajaCentralLiveScore text-center\">
                    ";
        // line 14
        if (($context["viendoHoy"] ?? null)) {
            // line 15
            echo "                        LIVESCORE
                    ";
        } else {
            // line 17
            echo "                        ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["diaVer"] ?? null), "d"), "html", null, true);
            echo " de ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["diaVer"] ?? null), "F"), "html", null, true);
            echo " - <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
            echo "\">Ver hoy</a>
                    ";
        }
        // line 19
        echo "                </div>
            </div>

            <div class=\"contenedorSelectorFechaLiveScore\">
                <a ";
        // line 23
        if ((0 !== twig_compare(($context["categoriaArg"] ?? null), "") && 0 !== twig_compare(($context["ctArg"] ?? null), ""))) {
            echo " rel=\"nofollow\" ";
        }
        echo " href=\"";
        if ((0 !== twig_compare(($context["categoriaArg"] ?? null), "") && 0 !== twig_compare(($context["ctArg"] ?? null), ""))) {
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home_fecha_categoria", ["fecha" => twig_date_format_filter($this->env, ($context["diaSiguiente"] ?? null), "Y-m-d"), "categoria" => ($context["categoriaArg"] ?? null), "ct" => ($context["ctArg"] ?? null)]), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home_fecha", ["fecha" => twig_date_format_filter($this->env, ($context["diaSiguiente"] ?? null), "Y-m-d")]), "html", null, true);
        }
        echo "\" class=\"boldfont cajasLiveScore selectorFechaLiveScore selectorFechaLiveScoreDerecha\">
                    ";
        // line 24
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["diaSiguiente"] ?? null), "d/m"), "html", null, true);
        echo " &gt;
                </a>
            </div>
        </div>

        <div id=\"contenedorSubCabeceraLivescore\" class=\"col-12\">
            <div id=\"contenedorBotonesFiltroLivescore\" class=\"col-12\">
                ";
        // line 31
        if (1 === twig_compare(twig_length_filter($this->env, ($context["categorias"] ?? null)), 1)) {
            // line 32
            echo "
                    ";
            // line 33
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["categorias"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 34
                echo "
                        ";
                // line 35
                if (0 === twig_compare($context["value"], 1)) {
                    // line 36
                    echo "
                            ";
                    // line 37
                    $context["txtCat"] = "Principal";
                    // line 38
                    echo "                            ";
                    $context["titolCat"] = "Partidos de Primera y Segunda División, FIFA, UEFA y Amistosos";
                    // line 39
                    echo "
                        ";
                } elseif (0 === twig_compare(                // line 40
$context["value"], 2)) {
                    // line 41
                    echo "
                            ";
                    // line 42
                    $context["txtCat"] = "Primera RFEF";
                    // line 43
                    echo "                            ";
                    $context["titolCat"] = "Partidos de Primera RFEF";
                    // line 44
                    echo "
                        ";
                } elseif (0 === twig_compare(                // line 45
$context["value"], 3)) {
                    // line 46
                    echo "
                            ";
                    // line 47
                    $context["txtCat"] = "Copa RFEF";
                    // line 48
                    echo "                            ";
                    $context["titolCat"] = "Partidos de la COPA RFEF";
                    // line 49
                    echo "
                        ";
                } elseif (0 === twig_compare(                // line 50
$context["value"], 4)) {
                    // line 51
                    echo "
                            ";
                    // line 52
                    $context["txtCat"] = "Segunda Fed.";
                    // line 53
                    echo "                            ";
                    $context["titolCat"] = "Partidos de Segunda Federación";
                    // line 54
                    echo "
                        ";
                } elseif (0 === twig_compare(                // line 55
$context["value"], 5)) {
                    // line 56
                    echo "
                            ";
                    // line 57
                    $context["txtCat"] = "Tercera Fed.";
                    // line 58
                    echo "                            ";
                    $context["titolCat"] = "Partidos de Tercera Federación";
                    // line 59
                    echo "
                        ";
                } elseif (0 === twig_compare(                // line 60
$context["value"], 7)) {
                    // line 61
                    echo "
                            ";
                    // line 62
                    $context["txtCat"] = "Autonómica";
                    // line 63
                    echo "                            ";
                    $context["titolCat"] = "Partidos de los torneos de ámbito regional";
                    // line 64
                    echo "
                        ";
                } elseif (0 === twig_compare(                // line 65
$context["value"], 8)) {
                    // line 66
                    echo "
                            ";
                    // line 67
                    $context["txtCat"] = "Juveniles";
                    // line 68
                    echo "                            ";
                    $context["titolCat"] = "Partidos para hoy de los equipos de DHJ y LNJ";
                    // line 69
                    echo "
                        ";
                } elseif (0 === twig_compare(                // line 70
$context["value"], 9)) {
                    // line 71
                    echo "
                            ";
                    // line 72
                    $context["txtCat"] = "Femenino";
                    // line 73
                    echo "                            ";
                    $context["titolCat"] = "Partidos para hoy de las ligas femeninas de categoría nacional";
                    // line 74
                    echo "
                        ";
                } elseif (0 === twig_compare(                // line 75
$context["value"], 10)) {
                    // line 76
                    echo "
                            ";
                    // line 77
                    $context["txtCat"] = "Europa";
                    // line 78
                    echo "                            ";
                    $context["titolCat"] = "Partidos para hoy de las ligas europeas";
                    // line 79
                    echo "
                        ";
                } elseif (0 === twig_compare(                // line 80
$context["value"], 22)) {
                    // line 81
                    echo "
                            ";
                    // line 82
                    $context["txtCat"] = "Fútbol Sala";
                    // line 83
                    echo "                            ";
                    $context["titolCat"] = "Partidos para hoy de Fútbol Sala";
                    // line 84
                    echo "
                        ";
                }
                // line 86
                echo "
                        <a href=\"";
                // line 87
                if (($context["viendoHoy"] ?? null)) {
                    echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("partidosHoy", ["categoria" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [($context["txtCat"] ?? null)]), "ct" => $context["value"]]), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home_fecha_categoria", ["fecha" => twig_date_format_filter($this->env, ($context["diaVer"] ?? null), "Y-m-d"), "categoria" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [($context["txtCat"] ?? null)]), "ct" => $context["value"]]), "html", null, true);
                }
                echo "\" class=\"botonFiltroLivescore";
                if (0 === twig_compare(($context["ctArg"] ?? null), $context["value"])) {
                    echo " activa";
                }
                echo "\" title=\"";
                echo twig_escape_filter($this->env, ($context["txtCat"] ?? null), "html", null, true);
                echo "\" style=\"margin-bottom: 5px;\">
                            ";
                // line 88
                echo twig_escape_filter($this->env, ($context["txtCat"] ?? null), "html", null, true);
                echo "

                            ";
                // line 90
                if (twig_get_attribute($this->env, $this->source, ($context["enJuegoCat"] ?? null), $context["value"], [], "array", true, true, false, 90)) {
                    // line 91
                    echo "                                <span class=\"nPartidos badge badge-danger\">
                                    ";
                    // line 92
                    echo twig_escape_filter($this->env, twig_length_filter($this->env, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["enJuegoCat"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4[$context["value"]] ?? null) : null)), "html", null, true);
                    echo "
                                </span>
                            ";
                }
                // line 95
                echo "                        </a>

                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 98
            echo "
                ";
        }
        // line 100
        echo "            </div>
             <span class=\"float-right col-md-4 fechaActualizado\">
                Actualizado a las ";
        // line 102
        echo twig_escape_filter($this->env, ($context["horaActual"] ?? null), "html", null, true);
        echo "
            </span> 
        </div>

        <div class=\"row\"></div>

        <div class=\"cajasPartidosHoy\" style=\"padding: 0px;\">
            <p>
                <span style=\"color:black;\">Partidos para hoy: ";
        // line 110
        echo twig_escape_filter($this->env, ($context["nTotalPartidosHoy"] ?? null), "html", null, true);
        echo "</span> -
                <span style=\"color:red;\">En juego: ";
        // line 111
        echo twig_escape_filter($this->env, ($context["nPartidosDirecto"] ?? null), "html", null, true);
        echo "</span>  -
                <span style=\"color:green;\">Finalizados: ";
        // line 112
        echo twig_escape_filter($this->env, ($context["c_finales"] ?? null), "html", null, true);
        echo "</span> -
                <span style=\"color:dimgray;\">Sin resultado: ";
        // line 113
        echo twig_escape_filter($this->env, ($context["c_resto"] ?? null), "html", null, true);
        echo "</span>
            </p>

            ";
        // line 120
        echo "
        </div>
        
    </div>

    <div>

        ";
        // line 127
        if (1 === twig_compare(twig_length_filter($this->env, ($context["partidosDirecto"] ?? null)), 0)) {
            // line 128
            echo "            ";
            $this->loadTemplate("index/__part/contenidoDirecto.html.twig", "index/index.html.twig", 128)->display($context);
            // line 129
            echo "        ";
        }
        // line 130
        echo "
        ";
        // line 131
        if (1 === twig_compare(twig_length_filter($this->env, ($context["partidosPromocion"] ?? null)), 0)) {
            // line 132
            echo "           ";
            // line 133
            echo "        ";
        }
        // line 134
        echo "
        ";
        // line 135
        if (0 === twig_compare(($context["current_url"] ?? null), "https://futbolme.com/")) {
            // line 136
            echo "            ";
            if (1 === twig_compare(twig_length_filter($this->env, ($context["partidosSueltos"] ?? null)), 0)) {
                // line 137
                echo "                ";
                $this->loadTemplate("index/__part/contenidoSueltos.html.twig", "index/index.html.twig", 137)->display($context);
                // line 138
                echo "                <div class=\"col-12\">
                    ";
                // line 139
                if (call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_MOBILE__"])) {
                    // line 140
                    echo "                        <div id=\"mobile-rectangle-infinite-fallback-wrapper\"></div>
                    ";
                } else {
                    // line 142
                    echo "                        <div id=\"desktop-leaderboard-atf-fallback-wrapper\" style=\"margin-top: 135px; margin-bottom: 25px;\"></div>
                    ";
                }
                // line 144
                echo "                </div> 
            ";
            }
            // line 146
            echo "        ";
        }
        // line 147
        echo "
        ";
        // line 177
        echo "
        


        ";
        // line 181
        $this->loadTemplate("index/__part/contenidoIndex.html.twig", "index/index.html.twig", 181)->display($context);
        // line 182
        echo "

        ";
        // line 185
        echo "            ";
        $this->loadTemplate("index/__part/fichajes.html.twig", "index/index.html.twig", 185)->display($context);
        // line 186
        echo "        ";
        // line 187
        echo "
    </div>

";
    }

    // line 192
    public function block_contenedorDerecha($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 193
        echo "    ";
    }

    // line 196
    public function block_contenedorIzquierda($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 197
        echo "
    ";
        // line 198
        $this->loadTemplate("__part/ultimosEventos.html.twig", "index/index.html.twig", 198)->display($context);
        // line 199
        echo "
";
    }

    // line 202
    public function block_bloqueJs($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 203
        echo "    ";
        if (($context["viendoHoy"] ?? null)) {
            // line 204
            echo "        <script type=\"text/javascript\">
            \$(function () {

                setInterval(function () {

                    refrescarHomeAjax();

                },60000);
            });

            function refrescarHomeAjax() {
                \$.ajax({
                    type: 'GET',
                    url: '";
            // line 217
            echo ($context["current_url"] ?? null);
            echo "',
                    cache: false,
                })
                .done(function (data) {
                    \$('#contenedorCentral').html(\$(data).find('#contenedorCentral').html());
                    \$('#ultimosEventos').html(\$(data).find('#ultimosEventos').html());      

                    ";
            // line 224
            if (call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_MOBILE__"])) {
                // line 225
                echo "                    var script = document.createElement('script');
                            
                    script.src = \"https://video.onnetwork.tv/widget/widget_scrolllist.php?widget=903&cId=myContainer1\";
                            
                    document.head.appendChild(script);
                    ";
            }
            // line 231
            echo "

                });
            }
        </script>
    ";
        }
    }

    public function getTemplateName()
    {
        return "index/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  494 => 231,  486 => 225,  484 => 224,  474 => 217,  459 => 204,  456 => 203,  452 => 202,  447 => 199,  445 => 198,  442 => 197,  438 => 196,  434 => 193,  430 => 192,  423 => 187,  421 => 186,  418 => 185,  414 => 182,  412 => 181,  406 => 177,  403 => 147,  400 => 146,  396 => 144,  392 => 142,  388 => 140,  386 => 139,  383 => 138,  380 => 137,  377 => 136,  375 => 135,  372 => 134,  369 => 133,  367 => 132,  365 => 131,  362 => 130,  359 => 129,  356 => 128,  354 => 127,  345 => 120,  339 => 113,  335 => 112,  331 => 111,  327 => 110,  316 => 102,  312 => 100,  308 => 98,  300 => 95,  294 => 92,  291 => 91,  289 => 90,  284 => 88,  270 => 87,  267 => 86,  263 => 84,  260 => 83,  258 => 82,  255 => 81,  253 => 80,  250 => 79,  247 => 78,  245 => 77,  242 => 76,  240 => 75,  237 => 74,  234 => 73,  232 => 72,  229 => 71,  227 => 70,  224 => 69,  221 => 68,  219 => 67,  216 => 66,  214 => 65,  211 => 64,  208 => 63,  206 => 62,  203 => 61,  201 => 60,  198 => 59,  195 => 58,  193 => 57,  190 => 56,  188 => 55,  185 => 54,  182 => 53,  180 => 52,  177 => 51,  175 => 50,  172 => 49,  169 => 48,  167 => 47,  164 => 46,  162 => 45,  159 => 44,  156 => 43,  154 => 42,  151 => 41,  149 => 40,  146 => 39,  143 => 38,  141 => 37,  138 => 36,  136 => 35,  133 => 34,  129 => 33,  126 => 32,  124 => 31,  114 => 24,  102 => 23,  96 => 19,  86 => 17,  82 => 15,  80 => 14,  71 => 8,  59 => 7,  53 => 3,  49 => 2,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "index/index.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/index/index.html.twig");
    }
}
