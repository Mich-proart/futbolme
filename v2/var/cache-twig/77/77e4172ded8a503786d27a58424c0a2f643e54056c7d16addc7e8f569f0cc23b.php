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

/* publicidad/cuerpo01.html.twig */
class __TwigTemplate_96d96fd94c9b0fb5ca42004b82a9a30dd6bf76dbbde6e87e17c50fc7cfe18e35 extends Template
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
    }

    public function getTemplateName()
    {
        return "publicidad/cuerpo01.html.twig";
    }

    public function getDebugInfo()
    {
        return array ();
    }

    public function getSourceContext()
    {
        return new Source("", "publicidad/cuerpo01.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/publicidad/cuerpo01.html.twig");
    }
}
