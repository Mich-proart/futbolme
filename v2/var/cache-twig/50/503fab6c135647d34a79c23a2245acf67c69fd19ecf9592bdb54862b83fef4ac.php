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

/* noticias/individual.html.twig */
class __TwigTemplate_933708edfa810141b1719426ffe3b4b88bd9be526fa057de0f62c0d873425457 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'contenedorIzquierda' => [$this, 'block_contenedorIzquierda'],
            'contenedorCentral' => [$this, 'block_contenedorCentral'],
            'bloqueJs' => [$this, 'block_bloqueJs'],
            'contenedorDerecha' => [$this, 'block_contenedorDerecha'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 10
        if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["jugador"] ?? null), "posicion", [], "any", false, false, false, 10), "1")) {
            // line 12
            $context["txt_jugador"] = "Portero";
            // line 13
            if (((isset($context["liga"]) || array_key_exists("liga", $context)) && 0 === twig_compare(($context["liga"] ?? null), 214))) {
                // line 14
                $context["txt_jugador"] = "Portera";
            }
        } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,         // line 17
($context["jugador"] ?? null), "posicion", [], "any", false, false, false, 17), "2")) {
            // line 19
            $context["txt_jugador"] = "Defensa";
        } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,         // line 21
($context["jugador"] ?? null), "posicion", [], "any", false, false, false, 21), "3")) {
            // line 23
            $context["txt_jugador"] = "Centrocampista";
        } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,         // line 25
($context["jugador"] ?? null), "posicion", [], "any", false, false, false, 25), "4")) {
            // line 27
            $context["txt_jugador"] = "Delantero";
        } elseif (0 === twig_compare(twig_get_attribute($this->env, $this->source,         // line 29
($context["jugador"] ?? null), "posicion", [], "any", false, false, false, 29), "5")) {
            // line 31
            $context["txt_jugador"] = "Entrenado";
        } else {
            // line 35
            $context["txt_jugador"] = "Sin demarcación";
        }
        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "noticias/individual.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_contenedorIzquierda($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "
    ";
        // line 6
        $this->loadTemplate("__part/ultimosEventos.html.twig", "noticias/individual.html.twig", 6)->display($context);
        // line 7
        echo "
";
    }

    // line 39
    public function block_contenedorCentral($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 40
        echo "
    <div class=\"col-12 contenedorBlancoBordesRedondeadosConPadding\">
        <div class=\"row\">
            <div class=\"col-12\">
                <h1>";
        // line 44
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["noticia"] ?? null), "titulo", [], "any", false, false, false, 44), "html", null, true);
        echo "</h1>
            </div>
            <div class=\"col-12\">
                <p class=\"text-right\" style=\"font-family: Roboto;
                            font-style: normal;
                            font-weight: 500;
                            font-weight: bold;
                            font-size: 12px;
                            line-height: 24px;
                            color: #B9BBBE;\">
                    ";
        // line 54
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["noticia"] ?? null), "fecha", [], "any", false, false, false, 54), "d/m/Y"), "html", null, true);
        echo "
                </p>
            </div>
            <div class=\"col-12\">
                ";
        // line 58
        echo twig_get_attribute($this->env, $this->source, ($context["noticia"] ?? null), "descripcion", [], "any", false, false, false, 58);
        echo "
            </div>
        </div>
    </div>

    <div class=\"row\" style=\"margin-top: 30px;\">
        <div class=\"col-12\">
            <div class=\"outbrain-tm\" id=\"13939-16\"><script src=\"//ads.themoneytizer.com/s/gen.js?type=16\"></script><script src=\"//ads.themoneytizer.com/s/requestform.js?siteId=13939&formatId=16\"></script></div>
        </div>
    </div>


    <div class=\"row\" style=\"margin-top: 30px;\">
        <div class=\"col-12\">
            ";
        // line 72
        $context["tituloWidget"] = "Más noticias de Futbolme";
        // line 73
        echo "            ";
        $context["noticiasWidget"] = ($context["otrasNoticias"] ?? null);
        // line 74
        echo "            ";
        $this->loadTemplate("noticias/widgetNoticias.html.twig", "noticias/individual.html.twig", 74)->display($context);
        // line 75
        echo "        </div>
    </div>


";
    }

    // line 81
    public function block_bloqueJs($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 82
        echo "


";
    }

    // line 89
    public function block_contenedorDerecha($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 90
        echo "

";
    }

    public function getTemplateName()
    {
        return "noticias/individual.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  171 => 90,  167 => 89,  160 => 82,  156 => 81,  148 => 75,  145 => 74,  142 => 73,  140 => 72,  123 => 58,  116 => 54,  103 => 44,  97 => 40,  93 => 39,  88 => 7,  86 => 6,  83 => 5,  79 => 4,  74 => 1,  71 => 35,  68 => 31,  66 => 29,  64 => 27,  62 => 25,  60 => 23,  58 => 21,  56 => 19,  54 => 17,  51 => 14,  49 => 13,  47 => 12,  45 => 10,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "noticias/individual.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/noticias/individual.html.twig");
    }
}
