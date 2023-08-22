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

/* equipo/__part/puntosYgoles.html.twig */
class __TwigTemplate_76823549ec8a3dff16fa8e5399b3dd7bc355a705ea76026fbd229821a11451aa extends Template
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
        echo "<script type='text/javascript'>
    \$(function () {
        \$('#c";
        // line 3
        echo twig_escape_filter($this->env, ($context["contenedor"] ?? null), "html", null, true);
        echo "').highcharts({
            chart: {
                zoomType: 'xy'
            },
            title: {
                text: null
            },
            subtitle: {
                text: '";
        // line 11
        echo twig_escape_filter($this->env, ($context["subtitulo"] ?? null), "html", null, true);
        echo "',
                floating: true,
                align: 'left',
                verticalAlign: 'bottom',
                y: 10
            },

        ";
        // line 18
        if ( !(null === ($context["titulo"] ?? null))) {
            // line 19
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
            // line 29
            echo "
            legend: { enabled: false },

        ";
        }
        // line 33
        echo "
        xAxis: {
            categories: [";
        // line 35
        echo ($context["a"] ?? null);
        echo "]
        },
        yAxis: [{
            labels: {
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
            title: {
                text: 'Total puntos',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
            min: ";
        // line 49
        echo twig_escape_filter($this->env, ($context["minimo"] ?? null), "html", null, true);
        echo ",
        max: ";
        // line 50
        echo twig_escape_filter($this->env, ($context["maximo"] ?? null), "html", null, true);
        echo ",
        startOnTick: false,
            tickInterval: 1

    }, { // Secondary yAxis
            gridLineWidth: 0,
                title: {
                text: 'Goles',
                    style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            labels: {
                format: '{value}',
                    style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            opposite: true

        }],

        tooltip: {
            //shared: true,
            dataLabels: {
                formatter: function () {
                    return '<b>'+ this.point.name +'</b><br/>";
        // line 76
        echo twig_escape_filter($this->env, ($context["textoVY"] ?? null), "html", null, true);
        echo ": '  + this.y ;
                }
            },
        },

        exporting: { enabled: false },




        series: [{
            type: 'spline',
            name: 'Total puntos',
            style: {
                color: Highcharts.getOptions().colors[0]
            },
            data: ";
        // line 92
        echo twig_escape_filter($this->env, ($context["puntos"] ?? null), "html", null, true);
        echo "
    },

        {
            type: 'spline',
                name: 'Goles a Favor',
            color: 'green',
            marker: {
            enabled: false
        },
            dashStyle: 'shortdot',
                yAxis: 1,
            data: ";
        // line 104
        echo twig_escape_filter($this->env, ($context["golesF"] ?? null), "html", null, true);
        echo "
        },
        {
            type: 'spline',
                name: 'Goles en contra',
            color: 'red',
            marker: {
            enabled: false,
        },
            dashStyle: 'shortdot',
                yAxis: 1,
            data: ";
        // line 115
        echo twig_escape_filter($this->env, ($context["golesC"] ?? null), "html", null, true);
        echo "
        },


        {
            type: 'column',
                name: 'Puntos partido',
            data: ";
        // line 122
        echo ($context["b"] ?? null);
        echo ",
            cursor: 'pointer',
                point: {
            events: {
                click: function () {
                    location.href = '/partido.php?id=' + this.options.id;
                }
            }
        }
        }]
    });
    });
</script>



<div id='c";
        // line 138
        echo twig_escape_filter($this->env, ($context["equipo_id"] ?? null), "html", null, true);
        echo "' style='height: 300px; margin: 0 auto; margin-bottom: 10px;'></div>";
    }

    public function getTemplateName()
    {
        return "equipo/__part/puntosYgoles.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  213 => 138,  194 => 122,  184 => 115,  170 => 104,  155 => 92,  136 => 76,  107 => 50,  103 => 49,  86 => 35,  82 => 33,  76 => 29,  64 => 19,  62 => 18,  52 => 11,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "equipo/__part/puntosYgoles.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/equipo/__part/puntosYgoles.html.twig");
    }
}
