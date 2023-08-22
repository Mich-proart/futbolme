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

/* temporada/__content/eliminatorio.html.twig */
class __TwigTemplate_8a8db2f1bcf9833d9edd0e91d284cafbb6d58c5dbd151c86060022214e6af9ab extends Template
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
    <div class=\"row\">
        <div class=\"col-12\" style=\"padding: 0px;\">
            ";
        // line 4
        $context["promocion"] = 0;
        // line 5
        echo "
            ";
        // line 6
        if (1 === twig_compare(($context["c_directos"] ?? null), 0)) {
            // line 7
            echo "                <div class=\"row\">
                    <div class=\"col-12\">
                    <span class=\"actua pull-right badge\" style=\"font-weight:100;\">
                        Actualizado a las ";
            // line 10
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, call_user_func_array($this->env->getFunction('hoyDateTime')->getCallable(), []), "H:i:s"), "html", null, true);
            echo "
                    </span>

                        ";
            // line 13
            $this->loadTemplate("index/__part/contenidoDirecto.html.twig", "temporada/__content/eliminatorio.html.twig", 13)->display($context);
            // line 14
            echo "
                    </div>
                </div>
            ";
        }
        // line 18
        echo "        </div>
    </div>

    ";
        // line 21
        $this->loadTemplate("temporada/__content/__part/eliminatorioFases.html.twig", "temporada/__content/eliminatorio.html.twig", 21)->display($context);
        // line 22
        echo "
    ";
        // line 23
        $this->loadTemplate("publicidad/cuerpo03.html.twig", "temporada/__content/eliminatorio.html.twig", 23)->display($context);
        // line 24
        echo "
    ";
        // line 25
        $this->loadTemplate("temporada/__content/__part/eliminatorioMenuGrupos.html.twig", "temporada/__content/eliminatorio.html.twig", 25)->display($context);
        // line 26
        echo "
    ";
        // line 27
        $context["clasificacionGrupo"] = call_user_func_array($this->env->getFunction('X2generarClasificacion')->getCallable(), [($context["temporada_id"] ?? null), ($context["tipoTorneo"] ?? null), ($context["valorJornada"] ?? null), ($context["primerGrupo"] ?? null), 0]);
        // line 28
        echo "
    ";
        // line 29
        $this->loadTemplate("temporada/__content/__part/eliminatorioPartidos.html.twig", "temporada/__content/eliminatorio.html.twig", 29)->display($context);
        // line 30
        echo "
    <div class=\"row\">
        <div class=\"col-12\" style=\"height: 35px;\">

        </div>
    </div>

    ";
        // line 37
        if ((((0 !== twig_compare(($context["tipo_eliminatoria"] ?? null), 1) && 0 !== twig_compare(($context["temporada_id"] ?? null), 3014)) && 0 !== twig_compare(($context["temporada_id"] ?? null), 3039)) && 0 !== twig_compare(($context["temporada_id"] ?? null), 3040))) {
            // line 38
            echo "        ";
            $this->loadTemplate("temporada/__content/__part/eliminatorioClasificacionGrupos.html.twig", "temporada/__content/eliminatorio.html.twig", 38)->display($context);
            // line 39
            echo "    ";
        }
        // line 40
        echo "
    ";
        // line 41
        $context["equiposTw2"] = [];
        // line 42
        echo "
    ";
        // line 43
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["equiposEnJuego"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
            // line 44
            echo "        ";
            $context["break"] = 0;
            // line 45
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["equiposTw"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["v"]) {
                // line 46
                echo "            ";
                if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["v"], "id", [], "any", false, false, false, 46), $context["value"]) &&  !($context["break"] ?? null))) {
                    // line 47
                    echo "                ";
                    $context["equiposTw2"] = call_user_func_array($this->env->getFunction('anadirAArray')->getCallable(), [($context["equiposTw2"] ?? null), $context["v"]]);
                    // line 48
                    echo "                ";
                    $context["break"] = 1;
                    // line 49
                    echo "            ";
                }
                // line 50
                echo "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['v'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 51
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 52
        echo "
    ";
        // line 53
        $context["equiposTw"] = ($context["equiposTw2"] ?? null);
        // line 54
        echo "
    ";
        // line 55
        if ((isset($context["equiposTw"]) || array_key_exists("equiposTw", $context))) {
            // line 56
            echo "        ";
            $context["filtro"] = 0;
            // line 57
            echo "        ";
            $this->loadTemplate("__part/pesLeerTwitsPortada.html.twig", "temporada/__content/eliminatorio.html.twig", 57)->display($context);
            // line 58
            echo "    ";
        }
        // line 59
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "temporada/__content/eliminatorio.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  175 => 59,  172 => 58,  169 => 57,  166 => 56,  164 => 55,  161 => 54,  159 => 53,  156 => 52,  150 => 51,  144 => 50,  141 => 49,  138 => 48,  135 => 47,  132 => 46,  127 => 45,  124 => 44,  120 => 43,  117 => 42,  115 => 41,  112 => 40,  109 => 39,  106 => 38,  104 => 37,  95 => 30,  93 => 29,  90 => 28,  88 => 27,  85 => 26,  83 => 25,  80 => 24,  78 => 23,  75 => 22,  73 => 21,  68 => 18,  62 => 14,  60 => 13,  54 => 10,  49 => 7,  47 => 6,  44 => 5,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "temporada/__content/eliminatorio.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/temporada/__content/eliminatorio.html.twig");
    }
}
