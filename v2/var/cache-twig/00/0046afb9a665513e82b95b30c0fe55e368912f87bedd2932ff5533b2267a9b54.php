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

/* graficos/columnaGEP.html.twig */
class __TwigTemplate_29e342058b67e23fc6cca768b04438754ce0064786f68ffefff61f41c08f3a1e extends Template
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
        echo "<script>
    \$(function () {
        \$('#c-";
        // line 3
        echo twig_escape_filter($this->env, ($context["contenedor"] ?? null), "html", null, true);
        echo "').highcharts({
            chart: {
                type: '";
        // line 5
        echo twig_escape_filter($this->env, ($context["tipo"] ?? null), "html", null, true);
        echo "'
            },
            title: {
                text: null
            },
            credits: { enabled: false },
            exporting: { enabled: false },
            legend: { enabled: false },
            xAxis: {
                categories: [";
        // line 14
        echo ($context["a"] ?? null);
        echo "]
    },

        subtitle: {
            text: null
        },
        yAxis: {
            title: {
                text: null
            },
            max:";
        // line 24
        echo twig_escape_filter($this->env, ($context["maximo"] ?? null), "html", null, true);
        echo ",
            stackLabels: {
                enabled: true,
                    style: {
                    fontWeight: 'bold',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                }
            },
            startOnTick: false,
                tickInterval: 5
        },

        tooltip: {
            headerFormat: '<b>{point.x}</b><br/>',
                pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                    dataLabels: {
                    enabled: true,
                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                        style: {
                        textShadow: '0 0 3px black'
                    }
                }
            }
        },
        series: [{
                name: 'Local',
                data: [";
        // line 54
        echo ($context["ar1"] ?? null);
        echo "]
            }
            , {
                name: 'Visitante',
                data: [";
        // line 58
        echo ($context["ar2"] ?? null);
        echo "]
            }
        ]
    });
    });
</script>";
    }

    public function getTemplateName()
    {
        return "graficos/columnaGEP.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 58,  104 => 54,  71 => 24,  58 => 14,  46 => 5,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "graficos/columnaGEP.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/graficos/columnaGEP.html.twig");
    }
}
