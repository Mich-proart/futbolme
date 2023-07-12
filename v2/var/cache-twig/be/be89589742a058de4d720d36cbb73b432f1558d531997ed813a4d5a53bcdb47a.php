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
class __TwigTemplate_025ade75c419cf4907f63190a7f192b6100721da84cadfa122cc22078a94b4d1 extends Template
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
    <div class=\"row\">
        <div class=\"col-12\">
            ";
        // line 11
        $context["espacio"] = "cabeceraDirectos";
        // line 12
        echo "            ";
        if (call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_IOS__"])) {
            // line 13
            echo "                ";
            $context["espacio"] = "cabeceraDirectosiOS";
            // line 14
            echo "            ";
        }
        // line 15
        echo "            ";
        $this->loadTemplate("publicidad/publiGestion.html.twig", "index/__part/contenidoDirecto.html.twig", 15)->display($context);
        // line 16
        echo "        </div>
    </div>

    ";
        // line 19
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
            // line 20
            echo "
        ";
            // line 21
            if ((0 !== twig_compare(($context["temp_id"] ?? null), twig_get_attribute($this->env, $this->source, $context["partido"], "temporada_id", [], "any", false, false, false, 21)) &&  !(isset($context["temporada_id"]) || array_key_exists("temporada_id", $context)))) {
                // line 22
                echo "
            ";
                // line 23
                $context["fondoCabecera"] = "celestebox";
                // line 24
                echo "            ";
                $context["colorCabecera"] = "white";
                // line 25
                echo "
            ";
                // line 26
                $this->loadTemplate("index/__part/contenidoCabecera.html.twig", "index/__part/contenidoDirecto.html.twig", 26)->display($context);
                // line 27
                echo "
        ";
            }
            // line 29
            echo "
        ";
            // line 30
            $this->loadTemplate("index/__part/filaPartido.html.twig", "index/__part/contenidoDirecto.html.twig", 30)->display($context);
            // line 31
            echo "
        ";
            // line 32
            $context["contador"] = (($context["contador"] ?? null) + 1);
            // line 33
            echo "        ";
            // line 40
            echo "        ";
            if (0 === twig_compare(($context["contador"] ?? null), 4)) {
                // line 41
                echo "
            <div class=\"row\">
                <div class=\"col-12\">
                    ";
                // line 44
                $context["espacio"] = "entreDirectos";
                // line 45
                echo "                    ";
                $this->loadTemplate("publicidad/publiGestion.html.twig", "index/__part/contenidoDirecto.html.twig", 45)->display($context);
                // line 46
                echo "                </div>
            </div>

        ";
            }
            // line 50
            echo "
        ";
            // line 51
            $context["temp_id"] = twig_get_attribute($this->env, $this->source, $context["partido"], "temporada_id", [], "any", false, false, false, 51);
            // line 52
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
        // line 53
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
        return array (  165 => 53,  151 => 52,  149 => 51,  146 => 50,  140 => 46,  137 => 45,  135 => 44,  130 => 41,  127 => 40,  125 => 33,  123 => 32,  120 => 31,  118 => 30,  115 => 29,  111 => 27,  109 => 26,  106 => 25,  103 => 24,  101 => 23,  98 => 22,  96 => 21,  93 => 20,  76 => 19,  71 => 16,  68 => 15,  65 => 14,  62 => 13,  59 => 12,  57 => 11,  52 => 8,  49 => 7,  47 => 6,  43 => 4,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "index/__part/contenidoDirecto.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.eu/v2/templates/index/__part/contenidoDirecto.html.twig");
    }
}
