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

/* temporada/partidosSueltos.html.twig */
class __TwigTemplate_1358e0e38a39ccdda4380be7763a2715574a1a8ce11c88d7a11aa7b08d07c747 extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "temporada/partidosSueltos.html.twig", 1);
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
        $this->loadTemplate("__part/ultimosEventos.html.twig", "temporada/partidosSueltos.html.twig", 5)->display($context);
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
    <div class=\"col-12 nopadding whitebox clear\">
        <div class=\"col-12 nopadding whitebox clear\">
                <h1>";
        // line 13
        echo twig_escape_filter($this->env, ($context["nombreTorneo"] ?? null), "html", null, true);
        echo "</h1>
        </div>

        <div class=\"row\">
            <div class=\"col-12\">
                ";
        // line 18
        $context["espacio"] = "temporadaJornada";
        // line 19
        echo "                ";
        $this->loadTemplate("publicidad/publiGestion.html.twig", "temporada/partidosSueltos.html.twig", 19)->display($context);
        // line 20
        echo "            </div>
        </div>

        ";
        // line 23
        $context["f"] = "---";
        // line 24
        echo "        ";
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
        foreach ($context['_seq'] as $context["key"] => $context["partido"]) {
            // line 25
            echo "            ";
            $context["status"] = twig_get_attribute($this->env, $this->source, $context["partido"], "time_status", [], "any", false, false, false, 25);
            // line 26
            echo "
            ";
            // line 27
            if (0 === twig_compare($context["key"], 3)) {
                // line 28
                echo "
                <div class=\"row\">
                    <div class=\"col-12\">
                        ";
                // line 31
                $context["espacio"] = "entrePartidos";
                // line 32
                echo "                        ";
                $this->loadTemplate("publicidad/publiGestion.html.twig", "temporada/partidosSueltos.html.twig", 32)->display($context);
                // line 33
                echo "                    </div>
                </div>

            ";
            }
            // line 37
            echo "
            ";
            // line 38
            if ( !(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["partido"], "extra", [], "any", false, true, false, 38), "round", [], "any", true, true, false, 38) && 1 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["partido"], "extra", [], "any", false, false, false, 38), "round", [], "any", false, false, false, 38), (($context["jornadaActiva"] ?? null) + 1)))) {
                // line 39
                echo "
                ";
                // line 40
                $this->loadTemplate("index/__part/partidoDirectoSueltos.html.twig", "temporada/partidosSueltos.html.twig", 40)->display($context);
                // line 41
                echo "
                ";
                // line 42
                $context["f"] = twig_get_attribute($this->env, $this->source, $context["partido"], "fecha", [], "any", false, false, false, 42);
                // line 43
                echo "            ";
            }
            // line 44
            echo "        ";
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
        // line 45
        echo "

        ";
        // line 47
        if (0 === twig_compare(($context["tipo_torneo"] ?? null), 1)) {
            // line 48
            echo "
            <div class=\"col-12\">
                ";
            // line 50
            $context["total"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["clas"] ?? null), "overall", [], "any", false, false, false, 50), "tables", [], "any", false, false, false, 50), 0, [], "any", false, false, false, 50);
            // line 51
            echo "
                <div class=\"row\"></div>

                ";
            // line 54
            $this->loadTemplate("temporada/__content/__part_sueltos/clasificacion.html.twig", "temporada/partidosSueltos.html.twig", 54)->display($context);
            // line 55
            echo "
                ";
            // line 56
            $context["local"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["clas"] ?? null), "home", [], "any", false, false, false, 56), "tables", [], "any", false, false, false, 56), 0, [], "any", false, false, false, 56);
            // line 57
            echo "                ";
            $context["visitante"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["clas"] ?? null), "away", [], "any", false, false, false, 57), "tables", [], "any", false, false, false, 57), 0, [], "any", false, false, false, 57);
            // line 58
            echo "            </div>

        ";
        } else {
            // line 61
            echo "
            <div class=\"col-12\">
                <h2 class=\"subtitulo\">Últimos partidos</h2>
            </div>

            <div class=\"col-12\">
                ";
            // line 67
            $context["f"] = "---";
            // line 68
            echo "                ";
            $context["contador"] = 0;
            // line 69
            echo "
                ";
            // line 70
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["terminados"] ?? null), "results", [], "any", false, false, false, 70));
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
                // line 71
                echo "
                    ";
                // line 72
                $context["contador"] = (($context["contador"] ?? null) + 1);
                // line 73
                echo "
                    ";
                // line 74
                if (0 === twig_compare(($context["contador"] ?? null), 3)) {
                    // line 75
                    echo "                        <div class=\"row\">
                            <div class=\"col-12\">
                                ";
                    // line 77
                    $context["espacio"] = "entrePartidos";
                    // line 78
                    echo "                                ";
                    $this->loadTemplate("publicidad/publiGestion.html.twig", "temporada/partidosSueltos.html.twig", 78)->display($context);
                    // line 79
                    echo "                            </div>
                        </div>
                    ";
                }
                // line 82
                echo "
                    ";
                // line 83
                if (0 >= twig_compare(($context["contador"] ?? null), 20)) {
                    // line 84
                    echo "                        ";
                    $context["status"] = twig_get_attribute($this->env, $this->source, $context["partido"], "time_status", [], "any", false, false, false, 84);
                    // line 85
                    echo "                        ";
                    if ( !0 !== twig_compare(($context["status"] ?? null), 3)) {
                        // line 86
                        echo "
                            ";
                        // line 87
                        $this->loadTemplate("index/__part/partidoDirectoSueltos.html.twig", "temporada/partidosSueltos.html.twig", 87)->display($context);
                        // line 88
                        echo "                            ";
                        $context["f"] = twig_get_attribute($this->env, $this->source, $context["partido"], "fecha", [], "any", false, false, false, 88);
                        // line 89
                        echo "
                        ";
                    }
                    // line 91
                    echo "                    ";
                }
                // line 92
                echo "                ";
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
            // line 93
            echo "            </div>

        ";
        }
        // line 96
        echo "
    </div>


";
    }

    // line 102
    public function block_bloqueJs($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 103
        echo "

";
    }

    // line 108
    public function block_contenedorDerecha($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 109
        echo "

";
    }

    public function getTemplateName()
    {
        return "temporada/partidosSueltos.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  322 => 109,  318 => 108,  312 => 103,  308 => 102,  300 => 96,  295 => 93,  281 => 92,  278 => 91,  274 => 89,  271 => 88,  269 => 87,  266 => 86,  263 => 85,  260 => 84,  258 => 83,  255 => 82,  250 => 79,  247 => 78,  245 => 77,  241 => 75,  239 => 74,  236 => 73,  234 => 72,  231 => 71,  214 => 70,  211 => 69,  208 => 68,  206 => 67,  198 => 61,  193 => 58,  190 => 57,  188 => 56,  185 => 55,  183 => 54,  178 => 51,  176 => 50,  172 => 48,  170 => 47,  166 => 45,  152 => 44,  149 => 43,  147 => 42,  144 => 41,  142 => 40,  139 => 39,  137 => 38,  134 => 37,  128 => 33,  125 => 32,  123 => 31,  118 => 28,  116 => 27,  113 => 26,  110 => 25,  92 => 24,  90 => 23,  85 => 20,  82 => 19,  80 => 18,  72 => 13,  67 => 10,  63 => 9,  58 => 6,  56 => 5,  53 => 4,  49 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "temporada/partidosSueltos.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/temporada/partidosSueltos.html.twig");
    }
}
