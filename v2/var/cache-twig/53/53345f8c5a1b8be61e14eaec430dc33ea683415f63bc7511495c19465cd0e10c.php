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

/* equipo/__part/pesEquipos.html.twig */
class __TwigTemplate_d45103a33ef0937a36f8bc0661f7af4b9e3b9dae1070702e475ecd89beee7d2f extends Template
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
<div style=\"margin-top:20px; padding: 15px;\" class=\"col-12 contenedorBlancoBordesRedondeadosConPadding\">
 <div>*Solo se muestran los equipos que pertenecen a las categorías tratadas en futbolme.com (Categoría nacional, autonómicas preferentes, juveniles en División de Honor o Liga
                Nacional y femeninos en Primera o Segunda División)</div> <hr /> 
    ";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["equipos"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["eq"]) {
            // line 6
            echo "
    ";
            // line 7
            if (0 === twig_compare(1, twig_get_attribute($this->env, $this->source, $context["eq"], "categoria_id", [], "any", false, false, false, 7))) {
                // line 8
                echo "    
        ";
                // line 9
                $context["color"] = "#000000";
                // line 10
                echo "        
    ";
            } elseif (0 === twig_compare(1, twig_get_attribute($this->env, $this->source,             // line 11
$context["eq"], "categoria_id", [], "any", false, false, false, 11))) {
                // line 12
                echo "
        ";
                // line 13
                $context["color"] = "#0B610B";
                // line 14
                echo "
    ";
            } elseif (0 === twig_compare(3, twig_get_attribute($this->env, $this->source,             // line 15
$context["eq"], "categoria_id", [], "any", false, false, false, 15))) {
                // line 16
                echo "
        ";
                // line 17
                $context["color"] = "#0B4C5F";
                // line 18
                echo "

    ";
            } elseif (0 === twig_compare(2, twig_get_attribute($this->env, $this->source,             // line 20
$context["eq"], "categoria_id", [], "any", false, false, false, 20))) {
                // line 21
                echo "
        ";
                // line 22
                $context["color"] = "#A901DB";
                // line 23
                echo "
    ";
            }
            // line 24
            echo " 



    <div style=\"color:";
            // line 28
            echo twig_escape_filter($this->env, ($context["color"] ?? null), "html", null, true);
            echo "\">

    ";
            // line 30
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["eq"], "equipo", [], "any", false, false, false, 30), "html", null, true);
            echo " - <b>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["eq"], "categoria", [], "any", false, false, false, 30), "html", null, true);
            echo "</b>

    ";
            // line 32
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["eq"], "valoresLiga", [], "any", false, false, false, 32));
            foreach ($context['_seq'] as $context["_key"] => $context["liga"]) {
                // line 33
                echo "
       - <a style=\"color:black\" href=\"";
                // line 34
                echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("torneo_jornada", ["idTorneo" => twig_get_attribute($this->env, $this->source,                 // line 35
$context["eq"], "torneo", [], "any", false, false, false, 35), "slug" => twig_get_attribute($this->env, $this->source,                 // line 36
$context["liga"], "slug", [], "any", false, false, false, 36), "jornada" => twig_get_attribute($this->env, $this->source,                 // line 37
$context["liga"], "valorJornada", [], "any", false, false, false, 37)]), "html", null, true);
                // line 38
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["liga"], "nombre", [], "any", false, false, false, 38), "html", null, true);
                echo "</a>


       

    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['liga'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 44
            echo "
    </div>
        
    

        <hr />
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['eq'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        echo "</div>



            ";
    }

    public function getTemplateName()
    {
        return "equipo/__part/pesEquipos.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  147 => 51,  135 => 44,  122 => 38,  120 => 37,  119 => 36,  118 => 35,  117 => 34,  114 => 33,  110 => 32,  103 => 30,  98 => 28,  92 => 24,  88 => 23,  86 => 22,  83 => 21,  81 => 20,  77 => 18,  75 => 17,  72 => 16,  70 => 15,  67 => 14,  65 => 13,  62 => 12,  60 => 11,  57 => 10,  55 => 9,  52 => 8,  50 => 7,  47 => 6,  43 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "equipo/__part/pesEquipos.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/equipo/__part/pesEquipos.html.twig");
    }
}
