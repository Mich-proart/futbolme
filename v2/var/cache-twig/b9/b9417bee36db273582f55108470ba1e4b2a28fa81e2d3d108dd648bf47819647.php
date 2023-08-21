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

/* temporada/__content/__part/eliminatorioFases.html.twig */
class __TwigTemplate_1f03583e19bf0bb14db63d988ab376e70bf55cb60559a23aa2ad2bd458eff7df extends Template
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
        echo "<div class=\"row\" style=\"margin-top: 20px;\">
    <div class=\"col-12\" style=\"padding: 0px;\">
        <select id=\"fases\" name=\"fases\" class=\"form-control\">
            ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["fases"] ?? null));
        foreach ($context['_seq'] as $context["id"] => $context["fila"]) {
            // line 5
            echo "                <option value=\"";
            echo twig_escape_filter($this->env, $context["id"], "html", null, true);
            echo "\" ";
            if (0 === twig_compare($context["id"], ($context["valorJornada"] ?? null))) {
                echo " selected=\"selected\" ";
            }
            echo ">
                    ";
            // line 6
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "nombre", [], "any", false, false, false, 6), "html", null, true);
            echo "
                </option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['id'], $context['fila'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 9
        echo "        </select>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "temporada/__content/__part/eliminatorioFases.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 9,  55 => 6,  46 => 5,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "temporada/__content/__part/eliminatorioFases.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/temporada/__content/__part/eliminatorioFases.html.twig");
    }
}
