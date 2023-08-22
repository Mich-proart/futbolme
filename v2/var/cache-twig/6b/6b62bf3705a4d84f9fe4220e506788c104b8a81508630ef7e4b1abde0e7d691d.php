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

/* __part/ultimosEventos.html.twig */
class __TwigTemplate_23934b7a1fe881f8523f7d607d937539b37ac2e53d91054b41676a8237461753 extends Template
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
        if ( !(isset($context["comunidad_id"]) || array_key_exists("comunidad_id", $context))) {
            // line 2
            echo "    ";
            $context["comunidad_id"] = 1;
        }
        // line 4
        echo "
";
        // line 5
        $context["ultimosEventos"] = call_user_func_array($this->env->getFunction('getUltimosEventosPreparados')->getCallable(), [($context["comunidad_id"] ?? null)]);
        // line 6
        echo "

";
        // line 8
        if (1 === twig_compare(twig_length_filter($this->env, ($context["ultimosEventos"] ?? null)), 0)) {
            // line 9
            echo "    <div id=\"ultimosEventos\" class=\"contenedorBlancoBordesRedondeados col-12\">
        ";
            // line 11
            echo "
        ";
            // line 12
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["ultimosEventos"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["ultimoEvento"]) {
                // line 13
                echo "
           ";
                // line 62
                echo "
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ultimoEvento'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 64
            echo "    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "__part/ultimosEventos.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 64,  67 => 62,  64 => 13,  60 => 12,  57 => 11,  54 => 9,  52 => 8,  48 => 6,  46 => 5,  43 => 4,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "__part/ultimosEventos.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/__part/ultimosEventos.html.twig");
    }
}
