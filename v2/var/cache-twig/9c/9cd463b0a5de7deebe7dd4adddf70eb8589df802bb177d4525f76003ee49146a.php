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

/* equipo/equipoNonacional.html.twig */
class __TwigTemplate_926495ce7c8bac7db9399fe476474645860fe65236404de8a4b28fb17ccaa087 extends Template
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
        echo "Equipo Nacional";
    }

    public function getTemplateName()
    {
        return "equipo/equipoNonacional.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "equipo/equipoNonacional.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/equipo/equipoNonacional.html.twig");
    }
}
