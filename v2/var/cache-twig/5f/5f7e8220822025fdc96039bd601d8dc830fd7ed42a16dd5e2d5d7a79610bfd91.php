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

/* publicidad/cuerpo04.html.twig */
class __TwigTemplate_8ccf6ee4850cf12e04fe69eb7d6f1cc9aa7ea92cbb9b482cb6b44d7fd1663f69 extends Template
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
        return "publicidad/cuerpo04.html.twig";
    }

    public function getDebugInfo()
    {
        return array ();
    }

    public function getSourceContext()
    {
        return new Source("", "publicidad/cuerpo04.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/publicidad/cuerpo04.html.twig");
    }
}
