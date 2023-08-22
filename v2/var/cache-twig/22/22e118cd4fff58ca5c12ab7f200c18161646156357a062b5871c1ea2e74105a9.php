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

/* equipo/equipo1.html.twig */
class __TwigTemplate_f56a7a78dbc26d5037c59c76c2349cee3cb1b36648caabf36e6d9b6d24942b6e extends Template
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
        echo "<div class=\"col-12\">

    <ul class=\"nav nav-tabs nopadding celestebox row\" role=\"tablist\" id=\"menuEquipo\">
        ";
        // line 4
        if (0 === twig_compare(($context["es_nacional"] ?? null), 1)) {
            // line 5
            echo "            <li class=\"";
            if (0 === twig_compare(($context["modelo"] ?? null), "Datos")) {
                echo "activa";
            }
            echo "\">
                <a class=\"btn btn-secondary\" href=\"";
            // line 6
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_datos", ["idEquipo" =>             // line 7
($context["idEquipo"] ?? null), "slug" =>             // line 8
($context["slug"] ?? null)]), "html", null, true);
            // line 9
            echo "\">Datos</a>
            </li>
        ";
        }
        // line 12
        echo "
        ";
        // line 13
        if (1 === twig_compare(($context["totalPartidos"] ?? null), 0)) {
            // line 14
            echo "            <li class=\"";
            if (0 === twig_compare(($context["modelo"] ?? null), "Calendario")) {
                echo "activa";
            }
            echo "\">
                <a class=\"btn btn-secondary\" href=\"";
            // line 15
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_calendario", ["idEquipo" =>             // line 16
($context["idEquipo"] ?? null), "slug" =>             // line 17
($context["slug"] ?? null)]), "html", null, true);
            // line 18
            echo "\">Calendario</a class=\"btn btn-secondary\">
            </li>
        ";
        }
        // line 21
        echo "
        ";
        // line 22
        if (1 === twig_compare(($context["liga"] ?? null), 0)) {
            // line 23
            echo "            <li class=\"";
            if (0 === twig_compare(($context["modelo"] ?? null), "Clasificacion")) {
                echo "activa";
            }
            echo "\">
                <a class=\"btn btn-secondary\" href=\"";
            // line 24
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_clasificacion", ["idEquipo" =>             // line 25
($context["idEquipo"] ?? null), "slug" =>             // line 26
($context["slug"] ?? null)]), "html", null, true);
            // line 27
            echo "\">Clasificación</a>
            </li>
        ";
        }
        // line 30
        echo "
        


        ";
        // line 34
        if (((1 === twig_compare(($context["division"] ?? null), 0) && -1 === twig_compare(($context["division"] ?? null), 6)) || 0 === twig_compare(($context["liga"] ?? null), 214))) {
            // line 35
            echo "            <li class=\"";
            if (0 === twig_compare(($context["modelo"] ?? null), "Plantilla")) {
                echo "activa";
            }
            echo "\">
                <a class=\"btn btn-secondary\" href=\"";
            // line 36
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_plantilla", ["idEquipo" =>             // line 37
($context["idEquipo"] ?? null), "slug" =>             // line 38
($context["slug"] ?? null)]), "html", null, true);
            // line 39
            echo "\">Plantilla</a>
            </li>
        ";
        }
        // line 42
        echo "
        

        ";
        // line 45
        if (((1 === twig_compare(($context["division"] ?? null), 0) && -1 === twig_compare(($context["division"] ?? null), 4)) || 0 === twig_compare(($context["liga"] ?? null), 214))) {
            // line 46
            echo "            <li class=\"";
            if (0 === twig_compare(($context["modelo"] ?? null), "Fichajes")) {
                echo "activa";
            }
            echo "\">
                <a class=\"btn btn-secondary\" href=\"";
            // line 47
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_fichajes", ["idEquipo" =>             // line 48
($context["idEquipo"] ?? null), "slug" =>             // line 49
($context["slug"] ?? null)]), "html", null, true);
            // line 50
            echo "\">Fichajes</a>
            </li>
        ";
        }
        // line 53
        echo "
        ";
        // line 54
        if (((isset($context["equipos"]) || array_key_exists("equipos", $context)) && 1 === twig_compare(twig_length_filter($this->env, ($context["equipos"] ?? null)), 1))) {
            // line 55
            echo "            <li class=\"";
            if (0 === twig_compare(($context["modelo"] ?? null), "Equipos")) {
                echo "activa";
            }
            echo "\">
                <a class=\"btn btn-secondary\" href=\"";
            // line 56
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_equipos", ["idEquipo" =>             // line 57
($context["idEquipo"] ?? null), "slug" =>             // line 58
($context["slug"] ?? null)]), "html", null, true);
            // line 59
            echo "\">Equipos</a>
            </li>
        ";
        }
        // line 62
        echo "


        
        ";
        // line 76
        echo "

        ";
        // line 78
        $context["miFutbolme"] = 0;
        // line 79
        echo "        ";
        if (1 === twig_compare(($context["liga"] ?? null), 0)) {
            // line 80
            echo "
        ";
        }
        // line 82
        echo "
        ";
        // line 88
        echo "
        ";
        // line 99
        echo "        ";
        // line 102
        echo "    </ul>

    <div id=\"contenedorSuperiorEquipo\" class=\"row contenedorBlancoBordesRedondeados\">
        <div class=\"col-8\">
            <h1>";
        // line 106
        echo twig_escape_filter($this->env, ($context["equipotxt"] ?? null), "html", null, true);
        echo "</h1>
            <h2 class=\"subtitulo\">";
        // line 107
        echo twig_escape_filter($this->env, ($context["categoriatxt"] ?? null), "html", null, true);
        echo "</h2>
        </div>

        <div class=\"col-4 text-center\">
            ";
        // line 111
        $context["rutaEscudo"] = call_user_func_array($this->env->getFunction('rutaEscudo')->getCallable(), [($context["club_id"] ?? null), ($context["equipo_id"] ?? null)]);
        // line 112
        echo "            <img src=\"";
        echo twig_escape_filter($this->env, ($context["rutaEscudo"] ?? null), "html", null, true);
        echo "\" class=\"escudo_ind\" alt=\"escudo\">
        </div>

        <div class=\"col-12\">

            ";
        // line 117
        if (call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_MOBILE__"])) {
            // line 118
            echo "                ";
            $context["espacio"] = "equipoCabeceraMobile";
            // line 119
            echo "            ";
        } else {
            // line 120
            echo "                ";
            $context["espacio"] = "equipoCabecera";
            // line 121
            echo "            ";
        }
        // line 122
        echo "            ";
        $this->loadTemplate("publicidad/publiGestion.html.twig", "equipo/equipo1.html.twig", 122)->display($context);
        // line 123
        echo "
        </div>

    </div>


    <div class=\"clear\"></div>

    <div class=\"col-12\">
        ";
        // line 132
        if (call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_MOBILE__"])) {
            // line 133
            echo "            ";
            $context["espacio"] = "equipoContenidoMobile";
            // line 134
            echo "        ";
        } else {
            // line 135
            echo "            ";
            $context["espacio"] = "equipoContenido";
            // line 136
            echo "        ";
        }
        // line 137
        echo "        ";
        $this->loadTemplate("publicidad/publiGestion.html.twig", "equipo/equipo1.html.twig", 137)->display($context);
        // line 138
        echo "    </div>

    <div class=\"col-12 text-center hide\">

        ";
        // line 142
        if (1 === twig_compare(twig_length_filter($this->env, ($context["amazon"] ?? null)), 0)) {
            // line 143
            echo "
            ";
            // line 147
            echo "
            ";
            // line 148
            if (0 === twig_compare(($context["modelo"] ?? null), "Tienda")) {
                // line 149
                echo "
                <button type=\"button\" class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\">
                    <span style=\"vertical-align: inherit;\" class=\"boldfont\">Pulsa para ver todas las categorías de la tienda</span>
                </button>

                <div class=\"dropdown-menu\" x-placement=\"bottom-start\">

                    ";
                // line 156
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["amazon"] ?? null));
                foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                    // line 157
                    echo "


                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 161
                echo "
                </div>


            ";
            } else {
                // line 166
                echo "


            ";
            }
            // line 170
            echo "
        ";
        }
        // line 172
        echo "
    </div>

    <div class=\"clear\"></div>

</div>

";
        // line 179
        if (0 === twig_compare(($context["modelo"] ?? null), "Datos")) {
            // line 180
            echo "
    ";
            // line 181
            $this->loadTemplate("equipo/__part/pesDatos.html.twig", "equipo/equipo1.html.twig", 181)->display($context);
            // line 182
            echo "
";
        } elseif (0 === twig_compare(        // line 183
($context["modelo"] ?? null), "Calendario")) {
            // line 184
            echo "
    ";
            // line 185
            $this->loadTemplate("equipo/__part/pesCalendario.html.twig", "equipo/equipo1.html.twig", 185)->display($context);
            // line 186
            echo "
";
        } elseif (0 === twig_compare(        // line 187
($context["modelo"] ?? null), "Clasificacion")) {
            // line 188
            echo "
    ";
            // line 189
            $this->loadTemplate("equipo/__part/pesClasificacion.html.twig", "equipo/equipo1.html.twig", 189)->display($context);
            // line 190
            echo "
";
        } elseif (0 === twig_compare(        // line 191
($context["modelo"] ?? null), "Plantilla")) {
            // line 192
            echo "
    ";
            // line 193
            $this->loadTemplate("equipo/__part/pesPlantilla.html.twig", "equipo/equipo1.html.twig", 193)->display($context);
            // line 194
            echo "
";
        } elseif (0 === twig_compare(        // line 195
($context["modelo"] ?? null), "Tienda")) {
            // line 196
            echo "
";
        } elseif (0 === twig_compare(        // line 197
($context["modelo"] ?? null), "Fichajes")) {
            // line 198
            echo "
    ";
            // line 199
            $this->loadTemplate("equipo/__part/pesFichajes.html.twig", "equipo/equipo1.html.twig", 199)->display($context);
            // line 200
            echo "
";
        } elseif (0 === twig_compare(        // line 201
($context["modelo"] ?? null), "Goleadores")) {
            // line 202
            echo "
";
        } elseif (0 === twig_compare(        // line 203
($context["modelo"] ?? null), "Equipos")) {
            // line 204
            echo "
    ";
            // line 205
            $this->loadTemplate("equipo/__part/pesEquipos.html.twig", "equipo/equipo1.html.twig", 205)->display($context);
            // line 206
            echo "
";
        } elseif (0 === twig_compare(        // line 207
($context["modelo"] ?? null), "Historico")) {
            // line 208
            echo "
";
        } elseif (0 === twig_compare(        // line 209
($context["modelo"] ?? null), "Anterior")) {
            // line 210
            echo "
";
        } elseif (0 === twig_compare(        // line 211
($context["modelo"] ?? null), "Twitter")) {
            // line 212
            echo "
";
        }
    }

    public function getTemplateName()
    {
        return "equipo/equipo1.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  416 => 212,  414 => 211,  411 => 210,  409 => 209,  406 => 208,  404 => 207,  401 => 206,  399 => 205,  396 => 204,  394 => 203,  391 => 202,  389 => 201,  386 => 200,  384 => 199,  381 => 198,  379 => 197,  376 => 196,  374 => 195,  371 => 194,  369 => 193,  366 => 192,  364 => 191,  361 => 190,  359 => 189,  356 => 188,  354 => 187,  351 => 186,  349 => 185,  346 => 184,  344 => 183,  341 => 182,  339 => 181,  336 => 180,  334 => 179,  325 => 172,  321 => 170,  315 => 166,  308 => 161,  299 => 157,  295 => 156,  286 => 149,  284 => 148,  281 => 147,  278 => 143,  276 => 142,  270 => 138,  267 => 137,  264 => 136,  261 => 135,  258 => 134,  255 => 133,  253 => 132,  242 => 123,  239 => 122,  236 => 121,  233 => 120,  230 => 119,  227 => 118,  225 => 117,  216 => 112,  214 => 111,  207 => 107,  203 => 106,  197 => 102,  195 => 99,  192 => 88,  189 => 82,  185 => 80,  182 => 79,  180 => 78,  176 => 76,  170 => 62,  165 => 59,  163 => 58,  162 => 57,  161 => 56,  154 => 55,  152 => 54,  149 => 53,  144 => 50,  142 => 49,  141 => 48,  140 => 47,  133 => 46,  131 => 45,  126 => 42,  121 => 39,  119 => 38,  118 => 37,  117 => 36,  110 => 35,  108 => 34,  102 => 30,  97 => 27,  95 => 26,  94 => 25,  93 => 24,  86 => 23,  84 => 22,  81 => 21,  76 => 18,  74 => 17,  73 => 16,  72 => 15,  65 => 14,  63 => 13,  60 => 12,  55 => 9,  53 => 8,  52 => 7,  51 => 6,  44 => 5,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "equipo/equipo1.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/equipo/equipo1.html.twig");
    }
}
