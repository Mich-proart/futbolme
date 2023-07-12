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

/* __part/ultimosEventos.html.twig */
class __TwigTemplate_5330b0b07ace184a563391aa95bc61976b73c4c6eeb524e846449a60c14484a2 extends Template
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
        if ( !(isset($context["comunidad_id"]) || array_key_exists("comunidad_id", $context))) {
            // line 2
            echo "    ";
            $context["comunidad_id"] = 1;
        }
        // line 4
        echo "
";
        // line 5
        $context["ultimosEventos"] = call_user_func_array($this->env->getFunction('getUltimosEventosPreparados')->getCallable(), [($context["comunidad_id"] ?? null)]);
        // line 6
        echo "

";
        // line 8
        if (1 === twig_compare(twig_length_filter($this->env, ($context["ultimosEventos"] ?? null)), 0)) {
            // line 9
            echo "    <div id=\"ultimosEventos\" class=\"contenedorBlancoBordesRedondeados col-12\">
        <h4 class=\"titularSidebar\">Información a la última</h4>

        ";
            // line 12
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["ultimosEventos"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["ultimoEvento"]) {
                // line 13
                echo "
            <div class=\"cajaPartidoInformacionALaUltima";
                // line 14
                if (twig_get_attribute($this->env, $this->source, $context["ultimoEvento"], "enJuevo", [], "any", false, false, false, 14)) {
                    echo "cajaEnJuego";
                }
                echo "\">

                <div>
                        <span class=\"hora\">
                            ";
                // line 18
                echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["ultimoEvento"], "momento", [], "any", false, false, false, 18), 11, null), "html", null, true);
                echo " ·
                        </span>
                    <span class=\"estado\">
                            ";
                // line 21
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["ultimoEvento"], "titulo", [], "any", false, false, false, 21), "html", null, true);
                echo "
                        </span>
                </div>

                <div class=\"contenedorNombreTorneo\">
                    <a class=\"nombreTorneo\" href=\"";
                // line 26
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["ultimoEvento"], "url", [], "any", false, false, false, 26), "html", null, true);
                echo "\" target=\"blank\">
                        ";
                // line 27
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["ultimoEvento"], "nombreTorneo", [], "any", false, false, false, 27), "html", null, true);
                echo "
                    </a>
                </div>

                <div>
                    <span class=\"equiposPartido\">";
                // line 32
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["ultimoEvento"], "partido", [], "any", false, false, false, 32), "html", null, true);
                echo "</span>
                    <span class=\"contenedorResultadoYEnlacePartido\">
                        <span class=\"resultado\">";
                // line 34
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["ultimoEvento"], "resultado", [], "any", false, false, false, 34), "html", null, true);
                echo "</span>
                        <a class=\"enlacePartido\" href=\"";
                // line 35
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["ultimoEvento"], "enlacePartido", [], "any", false, false, false, 35), "html", null, true);
                echo "\">
                            <img src=\"/static/img/enlace-partido.svg\" alt=\"\">
                        </a>
                    </span>
                </div>
                ";
                // line 45
                echo "                <div>
                    ";
                // line 46
                if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["ultimoEvento"], "evento", [], "any", false, false, false, 46), 3) || true)) {
                    // line 47
                    echo "                        <a href=\"/arbitro.php?id=";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["arbitro"] ?? null), 0, [], "any", false, false, false, 47), "html", null, true);
                    echo "\" target=\"blank\" style=\"color:orange\">
                            <span class=\"iconhover glyphicon glyphicon-arrow-right\"></span>
                        </a>
                    ";
                }
                // line 51
                echo "
                    ";
                // line 52
                if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["ultimoEvento"], "evento", [], "any", false, false, false, 52), 26) || true)) {
                    // line 53
                    echo "                        <a href=\"/partidos-televisados\" target=\"blank\" style=\"color:#FA5882\">
                            <span class=\"iconhover glyphicon glyphicon-arrow-right\"></span>
                        </a>
                    ";
                }
                // line 57
                echo "                </div>

            </div>

        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ultimoEvento'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 62
            echo "    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "__part/ultimosEventos.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  152 => 62,  142 => 57,  136 => 53,  134 => 52,  131 => 51,  123 => 47,  121 => 46,  118 => 45,  110 => 35,  106 => 34,  101 => 32,  93 => 27,  89 => 26,  81 => 21,  75 => 18,  66 => 14,  63 => 13,  59 => 12,  54 => 9,  52 => 8,  48 => 6,  46 => 5,  43 => 4,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "__part/ultimosEventos.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.eu/v2/templates/__part/ultimosEventos.html.twig");
    }
}
