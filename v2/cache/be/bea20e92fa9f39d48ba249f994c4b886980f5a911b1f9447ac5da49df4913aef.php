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

/* publicidad/codigos/akc-ATF-300-250.html.twig */
class __TwigTemplate_60fd495a5933bdcf890dc88611f1fd629a95c7ff3c4b6397d4a37390071a474f extends Template
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
        echo "<div id=\"Futbolme_ATF_300x250\" class=\"text-center\"></div>
  <script type=\"application/javascript\">
    var slmadshb = slmadshb || {};
    slmadshb.que = slmadshb.que || [];
    slmadshb.que.push(function() {
      slmadshb.display(\"Futbolme_ATF_300x250\");
    });
  </script>";
    }

    public function getTemplateName()
    {
        return "publicidad/codigos/akc-ATF-300-250.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "publicidad/codigos/akc-ATF-300-250.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.eu/v2/templates/publicidad/codigos/akc-ATF-300-250.html.twig");
    }
}
