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

/* equipo/equipoLive.html.twig */
class __TwigTemplate_5a4859946335ff34ecad1663d4236c600c78964505b9ae0b162ac11559d5d946 extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "equipo/equipoLive.html.twig", 1);
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
        $this->loadTemplate("__part/ultimosEventos.html.twig", "equipo/equipoLive.html.twig", 5)->display($context);
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
    <div class=\"row\">
        <div class=\"col-12\">
            <div class=\"col-12\">
                <h1>";
        // line 14
        echo twig_escape_filter($this->env, ($context["nombreEquipo"] ?? null), "html", null, true);
        echo "</h1>
                <h2 class=\"subtitulo\">";
        // line 15
        echo twig_escape_filter($this->env, ($context["nombreTorneo"] ?? null), "html", null, true);
        echo "</h2>
            </div>

            ";
        // line 18
        $context["f"] = "---";
        // line 19
        echo "            ";
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
            // line 20
            echo "
                ";
            // line 21
            $context["status"] = twig_get_attribute($this->env, $this->source, $context["partido"], "time_status", [], "any", false, false, false, 21);
            // line 22
            echo "                ";
            $context["f"] = twig_get_attribute($this->env, $this->source, $context["partido"], "fecha", [], "any", false, false, false, 22);
            // line 23
            echo "
                ";
            // line 24
            $this->loadTemplate("index/__part/partidoDirectoSueltos.html.twig", "equipo/equipoLive.html.twig", 24)->display($context);
            // line 25
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
        // line 27
        echo "        </div>
    </div>

    <div class=\"row\">
        <div class=\"col-12\">
            ";
        // line 32
        if (0 === twig_compare(($context["tipo_torneo"] ?? null), 1)) {
            // line 33
            echo "
                <div class=\"col-12\">
                    ";
            // line 35
            $context["total"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["clas"] ?? null), "overall", [], "any", false, false, false, 35), "tables", [], "any", false, false, false, 35), 0, [], "any", false, false, false, 35);
            // line 36
            echo "
                    ";
            // line 37
            $this->loadTemplate("temporada/__content/__part_sueltos/clasificacion.html.twig", "equipo/equipoLive.html.twig", 37)->display($context);
            // line 38
            echo "
                    ";
            // line 39
            $context["local"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["clas"] ?? null), "home", [], "any", false, false, false, 39), "tables", [], "any", false, false, false, 39), 0, [], "any", false, false, false, 39);
            // line 40
            echo "                    ";
            $context["visitante"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["clas"] ?? null), "away", [], "any", false, false, false, 40), "tables", [], "any", false, false, false, 40), 0, [], "any", false, false, false, 40);
            // line 41
            echo "                </div>

            ";
        }
        // line 44
        echo "        </div>
    </div>

";
    }

    // line 49
    public function block_bloqueJs($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 50
        echo "

";
    }

    // line 55
    public function block_contenedorDerecha($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 56
        echo "

";
    }

    public function getTemplateName()
    {
        return "equipo/equipoLive.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  185 => 56,  181 => 55,  175 => 50,  171 => 49,  164 => 44,  159 => 41,  156 => 40,  154 => 39,  151 => 38,  149 => 37,  146 => 36,  144 => 35,  140 => 33,  138 => 32,  131 => 27,  116 => 25,  114 => 24,  111 => 23,  108 => 22,  106 => 21,  103 => 20,  85 => 19,  83 => 18,  77 => 15,  73 => 14,  67 => 10,  63 => 9,  58 => 6,  56 => 5,  53 => 4,  49 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "equipo/equipoLive.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/equipo/equipoLive.html.twig");
    }
}
