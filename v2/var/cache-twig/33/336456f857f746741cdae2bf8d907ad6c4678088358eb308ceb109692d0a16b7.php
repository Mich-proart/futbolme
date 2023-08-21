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

/* temporada/__content/__part_sueltos/clasificacion.html.twig */
class __TwigTemplate_0abd4b55cd6e9a6fa6bbb4587f9a3831d54261902362b9f34a7abf395e8abb40 extends Template
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

<div class=\"row\">
    <div class=\"col-12\" style=\"margin-top: 30px; padding: 0px;\">
        <div class=\"row\">
            <div class=\"col-12\">
                <div id=\"topLaTabla\">

                </div>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-12\">

            </div>
        </div>
        <table id=\"latabla\" class=\"table tablesorter\">
            <thead>
            <tr class=\"darkgreenbox h40 nopadding\">
                <th style=\"padding: 1px;\" class=\"text-center\" title=\"Posición\">P</th>
                <th style=\"padding: 1px;min-width: 130px\" class=\"text-center\">Equipo</th>
                <th style=\"padding: 1px;\" class=\"text-center\" title=\"Puntos\">Pts</th>
                <th style=\"padding: 1px;\" class=\"text-center\" title=\"Jugados\">Ju</th>
                <th style=\"padding: 1px;\" class=\"text-center\" title=\"Ganados\">Ga</th>
                <th style=\"padding: 1px;\" class=\"text-center\" title=\"Empatados\">Em</th>
                <th style=\"padding: 1px;\" class=\"text-center\" title=\"Perdidos\">Pe</th>
                <th style=\"padding: 1px;\" class=\"text-center\" title=\"Goles a favor\">Fav</th>
                <th style=\"padding: 1px;\" class=\"text-center\" title=\"Goles en contra\">Con</th>
                <th style=\"padding: 1px;\" class=\"text-center hidden-xs\" title=\"Diferencia de goles\">Dif</th>
            </tr>
            </thead>

            <tbody class=\"whitebox\">

            ";
        // line 35
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["total"] ?? null), "rows", [], "any", false, false, false, 35));
        foreach ($context['_seq'] as $context["key"] => $context["fila"]) {
            // line 36
            echo "
                ";
            // line 37
            $context["pgEquipo"] = (($this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_index", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 38
$context["fila"], "team", [], "any", false, false, false, 38), "name", [], "any", false, false, false, 38)]), "idEquipo" => (10000000 + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 39
$context["fila"], "team", [], "any", false, false, false, 39), "id", [], "any", false, false, false, 39))]) . "/datos?temp_id=") .             // line 40
($context["temp_id"] ?? null));
            // line 41
            echo "

                <tr>

                    <td class=\"text-center\">
                        ";
            // line 46
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "pos", [], "any", false, false, false, 46), "html", null, true);
            echo "
                    </td>
                    <td style=\"text-align:left; padding: 1px;min-width: 130px\">
                        <img src=\"https://assets.b365api.com/images/team/s/";
            // line 49
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["fila"], "team", [], "any", false, false, false, 49), "id", [], "any", false, false, false, 49), "html", null, true);
            echo ".png\">
                        <a href=\"";
            // line 50
            echo twig_escape_filter($this->env, ($context["pgEquipo"] ?? null), "html", null, true);
            echo "\">
                            ";
            // line 51
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["fila"], "team", [], "any", false, false, false, 51), "name", [], "any", false, false, false, 51), "html", null, true);
            echo "
                        </a>
                    </td>
                    <td class=\"text-center\" style=\"padding: 1px;\">
                        <strong>";
            // line 55
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "points", [], "any", false, false, false, 55), "html", null, true);
            echo "</strong>
                    </td>
                    <td class=\"text-center\">
                        ";
            // line 58
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["fila"], "win", [], "any", false, false, false, 58) + twig_get_attribute($this->env, $this->source, $context["fila"], "draw", [], "any", false, false, false, 58)) + twig_get_attribute($this->env, $this->source, $context["fila"], "loss", [], "any", false, false, false, 58)), "html", null, true);
            echo "
                    </td>
                    <td class=\"text-center\" style=\"padding: 1px;\">
                        ";
            // line 61
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "win", [], "any", false, false, false, 61), "html", null, true);
            echo "
                    </td>
                    <td class=\"text-center\" style=\"padding: 1px;\">
                        ";
            // line 64
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "draw", [], "any", false, false, false, 64), "html", null, true);
            echo "
                    </td>
                    <td class=\"text-center\" style=\"padding: 1px;\">
                        ";
            // line 67
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "loss", [], "any", false, false, false, 67), "html", null, true);
            echo "
                    </td>
                    <td class=\"text-center\" style=\"padding: 1px;\">
                        ";
            // line 70
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "goalsfor", [], "any", false, false, false, 70), "html", null, true);
            echo "
                    </td>
                    <td class=\"text-center\" style=\"padding: 1px;\">
                        ";
            // line 73
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "goalsagainst", [], "any", false, false, false, 73), "html", null, true);
            echo "
                    </td>
                    <td class=\"text-center\" style=\"padding: 1px;\">
                        ";
            // line 76
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "goalDiffTotal", [], "any", false, false, false, 76), "html", null, true);
            echo "
                    </td>

                </tr>


            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['fila'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 83
        echo "
            </tbody>
        </table>
        <div class=\"row\">
            <div class=\"col-12\">
                <div id=\"bottomLaTabla\" class=\"";
        // line 88
        echo twig_escape_filter($this->env, ($context["classFila"] ?? null), "html", null, true);
        echo "\">

                </div>
            </div>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "temporada/__content/__part_sueltos/clasificacion.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  175 => 88,  168 => 83,  155 => 76,  149 => 73,  143 => 70,  137 => 67,  131 => 64,  125 => 61,  119 => 58,  113 => 55,  106 => 51,  102 => 50,  98 => 49,  92 => 46,  85 => 41,  83 => 40,  82 => 39,  81 => 38,  80 => 37,  77 => 36,  73 => 35,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "temporada/__content/__part_sueltos/clasificacion.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/temporada/__content/__part_sueltos/clasificacion.html.twig");
    }
}
