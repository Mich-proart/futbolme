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

/* partido/partidoObsR.html.twig */
class __TwigTemplate_c7421ca550c7f6ab490c1366b346b3d46670a13620cdb23a9c05b4af224a8988 extends Template
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
        if (twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "observaciones", [], "any", false, false, false, 1)) {
            // line 2
            echo "    ";
            if (1 === twig_compare(twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["cadena"] ?? null), 0, [], "any", false, false, false, 2)), 10)) {
                // line 3
                echo "        <div class=\"row\">
            <div class=\"col-12 text-right\" style=\"font-size:13px; margin-top: 10px; margin-bottom: 10px;\">
                <i>";
                // line 5
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["cadena"] ?? null), 0, [], "any", false, false, false, 5), "html", null, true);
                echo "</i>
            </div>
        </div>
    ";
            }
        }
    }

    public function getTemplateName()
    {
        return "partido/partidoObsR.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 5,  42 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "partido/partidoObsR.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/partido/partidoObsR.html.twig");
    }
}
