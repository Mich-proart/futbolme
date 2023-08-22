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

/* graficos/_linea2.html.twig */
class __TwigTemplate_5e969c9bd31d8f48f0c1428c30e7856c3ad802cc0e4ae6f362c232ea392354f4 extends Template
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
<script type='text/javascript'>
    \$(function () {
        \$('#c";
        // line 4
        echo twig_escape_filter($this->env, ($context["contenedor"] ?? null), "html", null, true);
        echo "').highcharts({
            chart: {
                type: '";
        // line 6
        echo twig_escape_filter($this->env, ($context["tipo"] ?? null), "html", null, true);
        echo "'
            },
            title: {
                text: null
            },
            credits: {
                enabled: false
            },
            subtitle: {
                text: '";
        // line 15
        echo twig_escape_filter($this->env, ($context["subtitulo"] ?? null), "html", null, true);
        echo "',
                floating: true,
                align: 'left',
                verticalAlign: 'bottom',
                y: 10
            },


        ";
        // line 23
        if ( !(null === ($context["titulo"] ?? null))) {
            // line 24
            echo "            legend: {
                layout: 'vertical',
                    align: 'left',
                    verticalAlign: 'top',
                    x: 100,
                    y: 10,
                    floating: true,
                    borderWidth: 1
            },
        ";
        } else {
            // line 34
            echo "
            legend: { enabled: false },

        ";
        }
        // line 38
        echo "
        xAxis: {
            categories: [";
        // line 40
        echo ($context["a"] ?? null);
        echo "]
        },
        yAxis: {
            title: {
                text: null
            },
            min: ";
        // line 46
        echo twig_escape_filter($this->env, ($context["minimo"] ?? null), "html", null, true);
        echo ",
            max: ";
        // line 47
        echo twig_escape_filter($this->env, ($context["maximo"] ?? null), "html", null, true);
        echo ",
            startOnTick: false,
                tickInterval: 1

        },
        tooltip: {
            formatter: function () {
                return '<b>'+ this.point.name +'</b><br/>";
        // line 54
        echo twig_escape_filter($this->env, ($context["textoVY"] ?? null), "html", null, true);
        echo ": '  + this.y ;
            }
        },

        exporting: { enabled: false },


        series: [{
                name: '";
        // line 62
        echo twig_escape_filter($this->env, ($context["textoSerie1"] ?? null), "html", null, true);
        echo "',
                data: ";
        // line 63
        echo ($context["b"] ?? null);
        echo "
            }

        ";
        // line 66
        if ((isset($context["c"]) || array_key_exists("c", $context))) {
            // line 67
            echo "            ,
                {
                    name: '";
            // line 69
            echo ($context["textoSerie2"] ?? null);
            echo "',
                    data: ";
            // line 70
            echo ($context["c"] ?? null);
            echo "
                }

        ";
        }
        // line 74
        echo "        ]
        });
    });
</script>


";
    }

    public function getTemplateName()
    {
        return "graficos/_linea2.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  155 => 74,  148 => 70,  144 => 69,  140 => 67,  138 => 66,  132 => 63,  128 => 62,  117 => 54,  107 => 47,  103 => 46,  94 => 40,  90 => 38,  84 => 34,  72 => 24,  70 => 23,  59 => 15,  47 => 6,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "graficos/_linea2.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/graficos/_linea2.html.twig");
    }
}
