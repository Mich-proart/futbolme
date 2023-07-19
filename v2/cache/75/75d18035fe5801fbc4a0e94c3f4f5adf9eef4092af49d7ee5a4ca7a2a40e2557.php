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

/* index/__part/contenidoDirecto.html.twig */
class __TwigTemplate_36b749a0a80aaa00b88017a66c9ec9d8a111f67bfb21fb55ee42a3f0bce85e35 extends Template
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
        if (( !(isset($context["partidosDirecto"]) || array_key_exists("partidosDirecto", $context)) && (isset($context["directos"]) || array_key_exists("directos", $context)))) {
            // line 2
            echo "    ";
            $context["partidosDirecto"] = ($context["directos"] ?? null);
        }
        // line 4
        echo "
<div class=\"col-xs-12 nopadding\">
    ";
        // line 6
        $context["temp_id"] = 0;
        // line 7
        echo "    ";
        $context["contador"] = 0;
        // line 8
        echo "
    ";
        // line 9
        $context["espacio"] = "cabeceraDirectos";
        // line 10
        echo "    ";
        $this->loadTemplate("publicidad/publiGestion.html.twig", "index/__part/contenidoDirecto.html.twig", 10)->display($context);
        // line 11
        echo "
    ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["partidosDirecto"] ?? null));
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
            // line 13
            echo "
        ";
            // line 14
            if ((0 !== twig_compare(($context["temp_id"] ?? null), twig_get_attribute($this->env, $this->source, $context["partido"], "temporada_id", [], "any", false, false, false, 14)) &&  !(isset($context["temporada_id"]) || array_key_exists("temporada_id", $context)))) {
                // line 15
                echo "
            ";
                // line 16
                $context["fondoCabecera"] = "celestebox";
                // line 17
                echo "            ";
                $context["colorCabecera"] = "white";
                // line 18
                echo "
            ";
                // line 19
                $this->loadTemplate("index/__part/contenidoCabecera.html.twig", "index/__part/contenidoDirecto.html.twig", 19)->display($context);
                // line 20
                echo "
        ";
            }
            // line 22
            echo "
        ";
            // line 23
            $this->loadTemplate("index/__part/filaPartido.html.twig", "index/__part/contenidoDirecto.html.twig", 23)->display($context);
            // line 24
            echo "
        ";
            // line 25
            $context["contador"] = (($context["contador"] ?? null) + 1);
            // line 26
            echo "
        ";
            // line 27
            if (0 === twig_compare(($context["contador"] ?? null), 1)) {
                // line 28
                echo "            <div class=\"col-xs-12 text-center whitebox\">
                ";
                // line 29
                $this->loadTemplate("publicidad/directos.html.twig", "index/__part/contenidoDirecto.html.twig", 29)->display($context);
                // line 30
                echo "            </div>
        ";
            }
            // line 32
            echo "
        ";
            // line 33
            if (0 === twig_compare(($context["contador"] ?? null), 4)) {
                // line 34
                echo "
            ";
                // line 35
                $context["espacio"] = "entreDirectos";
                // line 36
                echo "            ";
                $this->loadTemplate("publicidad/publiGestion.html.twig", "index/__part/contenidoDirecto.html.twig", 36)->display($context);
                // line 37
                echo "
        ";
            }
            // line 39
            echo "
        ";
            // line 40
            $context["temp_id"] = twig_get_attribute($this->env, $this->source, $context["partido"], "temporada_id", [], "any", false, false, false, 40);
            // line 41
            echo "    ";
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
        // line 42
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "index/__part/contenidoDirecto.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  162 => 42,  148 => 41,  146 => 40,  143 => 39,  139 => 37,  136 => 36,  134 => 35,  131 => 34,  129 => 33,  126 => 32,  122 => 30,  120 => 29,  117 => 28,  115 => 27,  112 => 26,  110 => 25,  107 => 24,  105 => 23,  102 => 22,  98 => 20,  96 => 19,  93 => 18,  90 => 17,  88 => 16,  85 => 15,  83 => 14,  80 => 13,  63 => 12,  60 => 11,  57 => 10,  55 => 9,  52 => 8,  49 => 7,  47 => 6,  43 => 4,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "index/__part/contenidoDirecto.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/index/__part/contenidoDirecto.html.twig");
    }
}
