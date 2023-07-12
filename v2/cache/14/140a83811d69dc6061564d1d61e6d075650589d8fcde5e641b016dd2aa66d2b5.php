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

/* index/__part/partidosObservaciones.html.twig */
class __TwigTemplate_672de16d163570a3da6ca6a4746e11915ed8a3b47328b5d528ba28a3153095a4 extends Template
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
        if (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "observaciones", [], "any", true, true, false, 1)) {
            // line 2
            echo "
    ";
            // line 3
            $context["cadena"] = twig_array_merge(($context["cadena"] ?? null), [0 => twig_replace_filter(twig_get_attribute($this->env, $this->source, ($context["cadena"] ?? null), 0, [], "any", false, false, false, 3), ["000000" => ""])]);
            // line 4
            echo "
    ";
            // line 5
            if (( !(isset($context["goles"]) || array_key_exists("goles", $context)) || ((isset($context["goles"]) || array_key_exists("goles", $context)) && 0 === twig_compare(twig_length_filter($this->env, ($context["goles"] ?? null)), 0)))) {
                // line 6
                echo "
        <div class=\"row observacionesGoles\">

            ";
                // line 9
                if (twig_get_attribute($this->env, $this->source, ($context["cadena"] ?? null), 1, [], "any", true, true, false, 9)) {
                    // line 10
                    echo "                <div class=\"col-6 nopadding\">
                    <p class=\"w100 text-right txt11\">
                        <i>
                            ";
                    // line 13
                    echo twig_get_attribute($this->env, $this->source, ($context["cadena"] ?? null), 1, [], "any", false, false, false, 13);
                    echo "
                        </i>
                    </p>
                </div>
            ";
                }
                // line 18
                echo "
            ";
                // line 19
                if (twig_get_attribute($this->env, $this->source, ($context["cadena"] ?? null), 2, [], "any", true, true, false, 19)) {
                    // line 20
                    echo "                <div class=\"col-6 nopadding\">
                    <p class=\"w100 text-left txt11\">
                        <i>
                            ";
                    // line 23
                    echo twig_get_attribute($this->env, $this->source, ($context["cadena"] ?? null), 2, [], "any", false, false, false, 23);
                    echo "
                        </i>
                    </p>
                </div>
            ";
                }
                // line 28
                echo "
        </div>

    ";
            }
            // line 32
            echo "
    ";
            // line 33
            if (1 === twig_compare(twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["cadena"] ?? null), 0, [], "any", false, false, false, 33)), 10)) {
                // line 34
                echo "        <div class=\"row observaciones\">
            <div class=\"col-12 text-right\" style=\"font-size:13px;\">
                <i>
                    ";
                // line 37
                echo twig_get_attribute($this->env, $this->source, ($context["cadena"] ?? null), 0, [], "any", false, false, false, 37);
                echo "
                </i>
            </div>
        </div>

    ";
            }
            // line 43
            echo "
";
        }
    }

    public function getTemplateName()
    {
        return "index/__part/partidosObservaciones.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 43,  103 => 37,  98 => 34,  96 => 33,  93 => 32,  87 => 28,  79 => 23,  74 => 20,  72 => 19,  69 => 18,  61 => 13,  56 => 10,  54 => 9,  49 => 6,  47 => 5,  44 => 4,  42 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "index/__part/partidosObservaciones.html.twig", "/home/futbolme/domains/futbolme.com/public_html/v2/templates/index/__part/partidosObservaciones.html.twig");
    }
}
