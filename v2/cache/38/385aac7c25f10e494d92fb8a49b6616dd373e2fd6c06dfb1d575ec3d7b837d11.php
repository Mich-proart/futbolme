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
class __TwigTemplate_6de93ca3450bde2720b01970f1e21118c3a3f99aac34d9b495699cfeeae79dfe extends Template
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
        echo "<div id=\"ultimosEventos\" class=\"contenedorBlancoBordesRedondeados col-12\">
    <h4 class=\"titularSidebar\">Información a la última</h4>

    ";
        // line 4
        if ( !(isset($context["comunidad_id"]) || array_key_exists("comunidad_id", $context))) {
            // line 5
            echo "        ";
            $context["comunidad_id"] = 1;
            // line 6
            echo "    ";
        }
        // line 7
        echo "
    ";
        // line 8
        $context["ultimosEventos"] = call_user_func_array($this->env->getFunction('getUltimosEventosPreparados')->getCallable(), [($context["comunidad_id"] ?? null)]);
        // line 9
        echo "
    ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["ultimosEventos"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["ultimoEvento"]) {
            // line 11
            echo "
        <div class=\"cajaPartidoInformacionALaUltima";
            // line 12
            if (twig_get_attribute($this->env, $this->source, $context["ultimoEvento"], "enJuevo", [], "any", false, false, false, 12)) {
                echo "cajaEnJuego";
            }
            echo "\">

            <div>
                    <span class=\"hora\">
                        ";
            // line 16
            echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["ultimoEvento"], "momento", [], "any", false, false, false, 16), 11, null), "html", null, true);
            echo " ·
                    </span>
                <span class=\"estado\">
                        ";
            // line 19
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["ultimoEvento"], "titulo", [], "any", false, false, false, 19), "html", null, true);
            echo "
                    </span>
            </div>

            <div class=\"contenedorNombreTorneo\">
                <a class=\"nombreTorneo\" href=\"";
            // line 24
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["ultimoEvento"], "url", [], "any", false, false, false, 24), "html", null, true);
            echo "\" target=\"blank\">
                    ";
            // line 25
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["ultimoEvento"], "nombreTorneo", [], "any", false, false, false, 25), "html", null, true);
            echo "
                </a>
            </div>

            <div>
                <span class=\"equiposPartido\">";
            // line 30
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["ultimoEvento"], "partido", [], "any", false, false, false, 30), "html", null, true);
            echo "</span>
                <span class=\"contenedorResultadoYEnlacePartido\">
                    <span class=\"resultado\">";
            // line 32
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["ultimoEvento"], "resultado", [], "any", false, false, false, 32), "html", null, true);
            echo "</span>
                    <a class=\"enlacePartido\" href=\"";
            // line 33
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["ultimoEvento"], "enlacePartido", [], "any", false, false, false, 33), "html", null, true);
            echo "\">
                        <img src=\"/static/img/enlace-partido.svg\" alt=\"\">
                    </a>
                </span>
            </div>
            ";
            // line 43
            echo "            <div>
                ";
            // line 44
            if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["ultimoEvento"], "evento", [], "any", false, false, false, 44), 3) || true)) {
                // line 45
                echo "                    <a href=\"/arbitro.php?id=";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["arbitro"] ?? null), 0, [], "any", false, false, false, 45), "html", null, true);
                echo "\" target=\"blank\" style=\"color:orange\">
                        <span class=\"iconhover glyphicon glyphicon-arrow-right\"></span>
                    </a>
                ";
            }
            // line 49
            echo "
                ";
            // line 50
            if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["ultimoEvento"], "evento", [], "any", false, false, false, 50), 26) || true)) {
                // line 51
                echo "                    <a href=\"/partidos-televisados\" target=\"blank\" style=\"color:#FA5882\">
                        <span class=\"iconhover glyphicon glyphicon-arrow-right\"></span>
                    </a>
                ";
            }
            // line 55
            echo "            </div>

        </div>

    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ultimoEvento'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        echo "</div>";
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
        return array (  151 => 60,  141 => 55,  135 => 51,  133 => 50,  130 => 49,  122 => 45,  120 => 44,  117 => 43,  109 => 33,  105 => 32,  100 => 30,  92 => 25,  88 => 24,  80 => 19,  74 => 16,  65 => 12,  62 => 11,  58 => 10,  55 => 9,  53 => 8,  50 => 7,  47 => 6,  44 => 5,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "__part/ultimosEventos.html.twig", "/home/futbolme/domains/futbolme.com/public_html/v2/templates/__part/ultimosEventos.html.twig");
    }
}
