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

/* publicidad/directos.html.twig */
class __TwigTemplate_b1e96cdd1a44a441b05f69e02ebb8f6ee86411999f05c574c9319dd9574972fb extends Template
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
        echo "
";
        // line 2
        if (0 === twig_compare(($context["themoneytizer"] ?? null), 1)) {
            // line 3
            echo "    <div id=\"13939-19\" style=\"height: 255px !important\">
        <script src=\"//ads.themoneytizer.com/s/gen.js?type=19\"></script><script src=\"//ads.themoneytizer.com/s/requestform.js?siteId=13939&formatId=19\" ></script>
    </div>
    <div class=\"clear\"></div>
";
        }
        // line 8
        echo "
";
        // line 9
        $context["espacio"] = "directos";
        // line 10
        echo "
";
        // line 11
        if (0 === twig_compare(call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ADSENSE__"]), 1)) {
            // line 12
            echo "    ";
            $this->loadTemplate("publicidad/anunciantes/publiAdsense.html.twig", "publicidad/directos.html.twig", 12)->display($context);
        }
        // line 14
        echo "
";
        // line 15
        if (0 === twig_compare(call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__CLICKIO__"]), 1)) {
            // line 16
            echo "    ";
            $this->loadTemplate("publicidad/anunciantes/publiClickio.html.twig", "publicidad/directos.html.twig", 16)->display($context);
        }
        // line 18
        echo "
";
        // line 19
        if (0 === twig_compare(call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__THEMONEYTIZER__"]), 1)) {
            // line 20
            echo "    ";
            $this->loadTemplate("publicidad/anunciantes/publiThemoneytizer.html.twig", "publicidad/directos.html.twig", 20)->display($context);
        }
        // line 22
        echo "
";
        // line 23
        if (0 === twig_compare(call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__AKCELO__"]), 1)) {
            // line 24
            echo "    ";
            $this->loadTemplate("publicidad/anunciantes/publiAkcelo.html.twig", "publicidad/directos.html.twig", 24)->display($context);
        }
    }

    public function getTemplateName()
    {
        return "publicidad/directos.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 24,  84 => 23,  81 => 22,  77 => 20,  75 => 19,  72 => 18,  68 => 16,  66 => 15,  63 => 14,  59 => 12,  57 => 11,  54 => 10,  52 => 9,  49 => 8,  42 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "publicidad/directos.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/publicidad/directos.html.twig");
    }
}
