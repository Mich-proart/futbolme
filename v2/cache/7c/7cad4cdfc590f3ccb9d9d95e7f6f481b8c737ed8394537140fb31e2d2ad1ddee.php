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
class __TwigTemplate_2f2a8069f24256ca33933c9a6480efc9b17074b5683b612d7f111f13541ebe34 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'contenedorCentral' => [$this, 'block_contenedorCentral'],
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
    <div id=\"contenedorLiveScore\" class=\"col-12\">
        <div class=\"contenedorSelectorFechaLiveScore\">
            <a href=\"/partidos-dia/";
        // line 6
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["diaAnterior"] ?? null), "Y-m-d"), "html", null, true);
        echo "\" class=\"boldfont cajasLiveScore selectorFechaLiveScore selectorFechaLiveScoreIzquierda\">
                &lt; ";
        // line 7
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["diaAnterior"] ?? null), "d/m"), "html", null, true);
        echo "
            </a>
        </div>

        <div class=\"contenedorCajaCentralLiveScore\">
            <div class=\"cajasLiveScore cajaCentralLiveScore text-center\">
                ";
        // line 13
        if (($context["viendoHoy"] ?? null)) {
            // line 14
            echo "                    LIVESCORE
                ";
        } else {
            // line 16
            echo "                    ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["diaVer"] ?? null), "d"), "html", null, true);
            echo " de ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["diaVer"] ?? null), "F"), "html", null, true);
            echo " - <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
            echo "\">Ver hoy</a>
                ";
        }
        // line 18
        echo "            </div>
        </div>

        <div class=\"contenedorSelectorFechaLiveScore\">
            <a href=\"/partidos-dia/";
        // line 22
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["diaSiguiente"] ?? null), "Y-m-d"), "html", null, true);
        echo "\" class=\"boldfont cajasLiveScore selectorFechaLiveScore selectorFechaLiveScoreDerecha\">
                ";
        // line 23
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["diaSiguiente"] ?? null), "d/m"), "html", null, true);
        echo " &gt;
            </a>
        </div>
    </div>


    <div id=\"contenedorSubCabeceraLivescore\" class=\"col-12\" style=\"margin-bottom: 25px;\">
        <div id=\"contenedorBotonesFiltroLivescore\" class=\"col-md-8\">
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
                    echo "                        ";
                    $context["titolCat"] = "Partidos para hoy de los equipos que pertenecen a categoría nacional, fútbol femenino y División de Honor Juvenil";
                    // line 39
                    echo "
                    ";
                } elseif (0 === twig_compare(                // line 40
$context["value"], 4)) {
                    // line 41
                    echo "
                        ";
                    // line 42
                    $context["txtCat"] = "Autonómica";
                    // line 43
                    echo "                        ";
                    $context["titolCat"] = "Partidos para hoy de los torneos de ámbito regional";
                    // line 44
                    echo "
                    ";
                } elseif (0 === twig_compare(                // line 45
$context["value"], 5)) {
                    // line 46
                    echo "
                        ";
                    // line 47
                    $context["txtCat"] = "LNJ";
                    // line 48
                    echo "                        ";
                    $context["titolCat"] = "Partidos para hoy de los equipos de Liga Nacional Juvenil";
                    // line 49
                    echo "
                    ";
                } elseif (0 === twig_compare(                // line 50
$context["value"], 9)) {
                    // line 51
                    echo "
                        ";
                    // line 52
                    $context["txtCat"] = "Europa";
                    // line 53
                    echo "                        ";
                    $context["titolCat"] = "Partidos para hoy de las ligas europeas";
                    // line 54
                    echo "

                    ";
                } elseif (0 === twig_compare(                // line 56
$context["value"], 17)) {
                    // line 57
                    echo "
                        ";
                    // line 58
                    $context["txtCat"] = "Fútbol Sala";
                    // line 59
                    echo "                        ";
                    $context["titolCat"] = "Partidos para hoy de Fútbol Sala";
                    // line 60
                    echo "
                    ";
                }
                // line 62
                echo "

                    <a href=\"";
                // line 64
                echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("partidosHoy", ["categoria" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [($context["txtCat"] ?? null)]), "ct" => $context["value"]]), "html", null, true);
                echo "\" class=\"botonFiltroLivescore\" title=\"";
                echo twig_escape_filter($this->env, ($context["txtCat"] ?? null), "html", null, true);
                echo "\">
                        ";
                // line 65
                echo twig_escape_filter($this->env, ($context["txtCat"] ?? null), "html", null, true);
                echo "

                        ";
                // line 67
                if (twig_get_attribute($this->env, $this->source, ($context["enJuegoCat"] ?? null), $context["value"], [], "array", true, true, false, 67)) {
                    // line 68
                    echo "                            <span class=\"nPartidos\">
                                ";
                    // line 69
                    echo twig_escape_filter($this->env, twig_length_filter($this->env, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["enJuegoCat"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4[$context["value"]] ?? null) : null)), "html", null, true);
                    echo "
                            </span>
                        ";
                }
                // line 72
                echo "                    </a>

                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 75
            echo "
            ";
        }
        // line 77
        echo "        </div>
        <span class=\"float-right col-md-4 fechaActualizado\">
            Actualizado a las ";
        // line 79
        echo twig_escape_filter($this->env, ($context["horaActual"] ?? null), "html", null, true);
        echo "
        </span>
    </div>

    <div class=\"clear\"></div>

    <div class=\"row\">
        <div class=\"col-12\">
            <p>
                <span style=\"color:black;\">Partidos para hoy: ";
        // line 88
        echo twig_escape_filter($this->env, ($context["nTotalPartidosHoy"] ?? null), "html", null, true);
        echo "</span> -
                <span style=\"color:red;\">En juego: ";
        // line 89
        echo twig_escape_filter($this->env, ($context["nPartidosDirecto"] ?? null), "html", null, true);
        echo "</span>  -
                <span style=\"color:green;\">Finalizados: ";
        // line 90
        echo twig_escape_filter($this->env, ($context["c_finales"] ?? null), "html", null, true);
        echo "</span> -
                <span style=\"color:dimgray;\">Sin resultado: ";
        // line 91
        echo twig_escape_filter($this->env, ($context["c_resto"] ?? null), "html", null, true);
        echo "</span>
            </p>

            <div id=\"13939-19\" style=\"height: 255px !important\">
                <script src=\"//ads.themoneytizer.com/s/gen.js?type=19\"></script><script src=\"//ads.themoneytizer.com/s/requestform.js?siteId=13939&formatId=19\" ></script>
            </div>

            ";
        // line 102
        echo "
        </div>
    </div>

    <div class=\"clear\"></div>

    <div>

        ";
        // line 110
        if (1 === twig_compare(twig_length_filter($this->env, ($context["partidosDirecto"] ?? null)), 0)) {
            // line 111
            echo "            ";
            $this->loadTemplate("index/__part/contenidoDirecto.html.twig", "index/index.html.twig", 111)->display($context);
            // line 112
            echo "        ";
        }
        // line 113
        echo "
        ";
        // line 114
        if (1 === twig_compare(twig_length_filter($this->env, ($context["partidosSueltos"] ?? null)), 0)) {
            // line 115
            echo "            ";
            $this->loadTemplate("index/__part/contenidoSueltos.html.twig", "index/index.html.twig", 115)->display($context);
            // line 116
            echo "        ";
        }
        // line 117
        echo "

        ";
        // line 119
        $this->loadTemplate("index/__part/contenidoIndex.html.twig", "index/index.html.twig", 119)->display($context);
        // line 120
        echo "
    </div>


";
    }

    // line 126
    public function block_contenedorIzquierda($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 127
        echo "
    ";
        // line 128
        $this->loadTemplate("__part/ultimosEventos.html.twig", "index/index.html.twig", 128)->display($context);
        // line 129
        echo "
";
    }

    // line 132
    public function block_bloqueJs($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 133
        echo "    ";
        if (($context["viendoHoy"] ?? null)) {
            // line 134
            echo "        <script type=\"text/javascript\">
            \$(function () {

                setInterval(function () {

                    //refrescarHomeAjax();

                },60000);
            });

            function refrescarHomeAjax() {
                \$.ajax({
                    type: 'GET',
                    url: '";
            // line 147
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("partidosHoy", ["categoria" => "ninguna", "ct" => ($context["ct"] ?? null), "ajax" => true]), "html", null, true);
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
        return array (  341 => 147,  326 => 134,  323 => 133,  319 => 132,  314 => 129,  312 => 128,  309 => 127,  305 => 126,  297 => 120,  295 => 119,  291 => 117,  288 => 116,  285 => 115,  283 => 114,  280 => 113,  277 => 112,  274 => 111,  272 => 110,  262 => 102,  252 => 91,  248 => 90,  244 => 89,  240 => 88,  228 => 79,  224 => 77,  220 => 75,  212 => 72,  206 => 69,  203 => 68,  201 => 67,  196 => 65,  190 => 64,  186 => 62,  182 => 60,  179 => 59,  177 => 58,  174 => 57,  172 => 56,  168 => 54,  165 => 53,  163 => 52,  160 => 51,  158 => 50,  155 => 49,  152 => 48,  150 => 47,  147 => 46,  145 => 45,  142 => 44,  139 => 43,  137 => 42,  134 => 41,  132 => 40,  129 => 39,  126 => 38,  124 => 37,  121 => 36,  119 => 35,  116 => 34,  112 => 33,  109 => 32,  107 => 31,  96 => 23,  92 => 22,  86 => 18,  76 => 16,  72 => 14,  70 => 13,  61 => 7,  57 => 6,  52 => 3,  48 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "index/index.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.eu/v2/templates/index/index.html.twig");
    }
}
