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

/* equipo/index.html.twig */
class __TwigTemplate_4ddec4e3e31068bd563e36331bb314d003db9caf65bd9f4026074a11a882a4cc extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'titleTag' => [$this, 'block_titleTag'],
            'metaDescripcion' => [$this, 'block_metaDescripcion'],
            'metaDescripcionOG' => [$this, 'block_metaDescripcionOG'],
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
        $this->parent = $this->loadTemplate("base.html.twig", "equipo/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_titleTag($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, ($context["titleTag"] ?? null), "html", null, true);
    }

    // line 4
    public function block_metaDescripcion($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, ($context["metaDescripcion"] ?? null), "html", null, true);
    }

    // line 5
    public function block_metaDescripcionOG($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, ($context["metaDescripcion"] ?? null), "html", null, true);
    }

    // line 7
    public function block_contenedorIzquierda($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        echo "
    ";
        // line 9
        $this->loadTemplate("__part/ultimosEventos.html.twig", "equipo/index.html.twig", 9)->display($context);
        // line 10
        echo "
";
    }

    // line 13
    public function block_contenedorCentral($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 14
        echo "

    ";
        // line 16
        if ((0 === twig_compare(($context["es_seleccion"] ?? null), 0) && (0 === twig_compare(($context["es_nacional"] ?? null), 1) || 1 === twig_compare(($context["visible"] ?? null), 4)))) {
            // line 17
            echo "
        ";
            // line 18
            $this->loadTemplate("equipo/equipo1.html.twig", "equipo/index.html.twig", 18)->display($context);
            // line 19
            echo "
    ";
        } else {
            // line 21
            echo "
        ";
            // line 22
            if (1 === twig_compare(($context["es_seleccion"] ?? null), 0)) {
                // line 23
                echo "
            ";
                // line 24
                $this->loadTemplate("equipo/equipoSeleccion.html.twig", "equipo/index.html.twig", 24)->display($context);
                // line 25
                echo "
        ";
            } else {
                // line 27
                echo "
            ";
                // line 28
                $this->loadTemplate("equipo/equipoNonacional.html.twig", "equipo/index.html.twig", 28)->display($context);
                // line 29
                echo "
        ";
            }
            // line 31
            echo "
    ";
        }
        // line 33
        echo "

";
    }

    // line 37
    public function block_bloqueJs($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 38
        echo "


";
    }

    // line 45
    public function block_contenedorDerecha($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 46
        echo "

";
    }

    public function getTemplateName()
    {
        return "equipo/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  154 => 46,  150 => 45,  143 => 38,  139 => 37,  133 => 33,  129 => 31,  125 => 29,  123 => 28,  120 => 27,  116 => 25,  114 => 24,  111 => 23,  109 => 22,  106 => 21,  102 => 19,  100 => 18,  97 => 17,  95 => 16,  91 => 14,  87 => 13,  82 => 10,  80 => 9,  77 => 8,  73 => 7,  66 => 5,  59 => 4,  52 => 3,  41 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "equipo/index.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/equipo/index.html.twig");
    }
}
