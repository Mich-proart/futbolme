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

/* noticias/widgetNoticias.html.twig */
class __TwigTemplate_2b9f39070d3da070286fe01c8678555c622b4c3576523ad3d284b8a88ddbdb3b extends Template
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
        if ( !(isset($context["longitudNoticiaWidget"]) || array_key_exists("longitudNoticiaWidget", $context))) {
            // line 2
            echo "    ";
            $context["longitudNoticiaWidget"] = 150;
        }
        // line 4
        echo "
<div class=\"col-12 contenedorBlancoBordesRedondeadosConPadding\" style=\"padding-top: 10px; padding-bottom: 0px;\">
    <div class=\"row\">
        <div class=\"col-12 text-center\">
            <h4 class=\"titularSidebar\"><a style=\"color:#434343;\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("noticias"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, ($context["tituloWidget"] ?? null), "html", null, true);
        echo "</a></h4>
        </div>
        ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["noticiasWidget"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["noticia"]) {
            // line 11
            echo "            <div class=\"col-12\" style=\"border-top: 1px solid #E9E9E9; padding-top: 5px; padding-bottom: 5px;\">
                ";
            // line 12
            $context["enlaceNoticia"] = $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("noticia_individual", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,             // line 13
$context["noticia"], "titulo", [], "any", false, false, false, 13)]), "idNoticia" => twig_get_attribute($this->env, $this->source,             // line 14
$context["noticia"], "id", [], "any", false, false, false, 14)]);
            // line 16
            echo "
                <a style=\"text-decoration: underline; color: #7bdb00; line-height: 25px; font-weight: bold;\" href=\"";
            // line 17
            echo twig_escape_filter($this->env, ($context["enlaceNoticia"] ?? null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["noticia"], "titulo", [], "any", false, false, false, 17), "html", null, true);
            echo "</a>

                ";
            // line 19
            $context["palabras"] = twig_split_filter($this->env, strip_tags(twig_get_attribute($this->env, $this->source, $context["noticia"], "descripcion", [], "any", false, false, false, 19)), " ");
            // line 20
            echo "                ";
            $context["descripcionCorta"] = "";
            // line 21
            echo "                ";
            $context["largoDescripcionCorta"] = 0;
            // line 22
            echo "
                ";
            // line 23
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["palabras"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["palabra"]) {
                // line 24
                echo "                    ";
                if (-1 === twig_compare(($context["largoDescripcionCorta"] ?? null), ($context["longitudNoticiaWidget"] ?? null))) {
                    // line 25
                    echo "                        ";
                    $context["descripcionCorta"] = ((($context["descripcionCorta"] ?? null) . $context["palabra"]) . " ");
                    // line 26
                    echo "                        ";
                    $context["largoDescripcionCorta"] = twig_length_filter($this->env, ($context["descripcionCorta"] ?? null));
                    // line 27
                    echo "                    ";
                }
                // line 28
                echo "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['palabra'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 29
            echo "
                <p style=\"margin-bottom: 3px;\">
                    ";
            // line 31
            echo ($context["descripcionCorta"] ?? null);
            echo "...
                </p>


                <div class=\"row\">
                    <div class=\"col-4\">
                        <p class=\"text-left\" style=\"font-family: Roboto;
                            font-style: normal;
                            font-weight: 500;
                            font-weight: bold;
                            font-size: 12px;
                            line-height: 24px;
                            color: #B9BBBE;\">
                            ";
            // line 44
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["noticia"], "fecha", [], "any", false, false, false, 44), "d/m/Y"), "html", null, true);
            echo "
                        </p>
                    </div>
                    <div class=\"col-8\">
                        <p class=\"text-right\">
                            <a href=\"";
            // line 49
            echo twig_escape_filter($this->env, ($context["enlaceNoticia"] ?? null), "html", null, true);
            echo "\" style=\"text-decoration: underline; color: #626262; font-weight: bold;\">Leer noticia completa</a>
                            <a href=\"";
            // line 50
            echo twig_escape_filter($this->env, ($context["enlaceNoticia"] ?? null), "html", null, true);
            echo "\">
                        <span style=\"background: #626262;
        width: 24px;
        height: 24px;
        line-height: 24px;
        display: inline-block;
        text-align: center;
    border-radius: 3px 3px 3px 3px;
        -moz-border-radius: 3px 3px 3px 3px;
        -webkit-border-radius: 3px 3px 3px 3px;\">
                            <img src=\"/static/img/enlace-partido.svg\" alt=\"\">
                        </span>
                            </a>
                        </p>
                    </div>
                </div>

            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['noticia'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 69
        echo "    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "noticias/widgetNoticias.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  167 => 69,  142 => 50,  138 => 49,  130 => 44,  114 => 31,  110 => 29,  104 => 28,  101 => 27,  98 => 26,  95 => 25,  92 => 24,  88 => 23,  85 => 22,  82 => 21,  79 => 20,  77 => 19,  70 => 17,  67 => 16,  65 => 14,  64 => 13,  63 => 12,  60 => 11,  56 => 10,  49 => 8,  43 => 4,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "noticias/widgetNoticias.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/noticias/widgetNoticias.html.twig");
    }
}
