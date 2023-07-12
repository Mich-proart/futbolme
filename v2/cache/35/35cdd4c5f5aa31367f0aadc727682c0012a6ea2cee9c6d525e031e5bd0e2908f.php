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

/* index/__part/contenidoIndex.html.twig */
class __TwigTemplate_b3cf29cf24ae216d2676cc6cb37f218f09f3feb2869b4d1e43677771652967cc extends Template
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
        $this->loadTemplate("publicidad/cuerpo01.html.twig", "index/__part/contenidoIndex.html.twig", 1)->display($context);
        // line 2
        echo "
<div id=\"bloque-resto\">
    ";
        // line 4
        $context["temp_id"] = 0;
        // line 5
        echo "    ";
        $context["contador"] = 0;
        // line 6
        echo "    ";
        $context["equiposTw"] = [];
        // line 7
        echo "

    ";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["partidosIndex"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["kk"] => $context["partido"]) {
            // line 10
            echo "
        ";
            // line 11
            $context["contador"] = (($context["contador"] ?? null) + 1);
            // line 12
            echo "
        ";
            // line 13
            if (0 === twig_compare(($context["contador"] ?? null), 4)) {
                // line 14
                echo "
        ";
            }
            // line 16
            echo "
        ";
            // line 17
            $context["colorFondo"] = "whitebox";
            // line 18
            echo "
        ";
            // line 19
            if (((0 !== twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "idPais", [], "any", false, false, false, 19), 60) && 0 !== twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "idPais", [], "any", false, false, false, 19), 200)) || 0 === twig_compare("España", twig_get_attribute($this->env, $this->source, $context["partido"], "local", [], "any", false, false, false, 19)))) {
                // line 20
                echo "            ";
                $context["colorL"] = "background-color:#F4FA58";
                // line 21
                echo "        ";
            } else {
                // line 22
                echo "            ";
                $context["colorL"] = "background-color:white";
                // line 23
                echo "        ";
            }
            // line 24
            echo "
        ";
            // line 25
            if (((0 !== twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "idPais", [], "any", false, false, false, 25), 60) && 0 !== twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "idPais", [], "any", false, false, false, 25), 200)) || 0 === twig_compare("España", twig_get_attribute($this->env, $this->source, $context["partido"], "visitante", [], "any", false, false, false, 25)))) {
                // line 26
                echo "            ";
                $context["colorV"] = "background-color:#F4FA58";
                // line 27
                echo "        ";
            } else {
                // line 28
                echo "            ";
                $context["colorV"] = "background-color:white";
                // line 29
                echo "        ";
            }
            // line 30
            echo "

        ";
            // line 32
            $context["hora_prevista"] = twig_get_attribute($this->env, $this->source, $context["partido"], "hora_prevista", [], "any", false, false, false, 32);
            // line 33
            echo "        ";
            $context["colorFila"] = "white";
            // line 34
            echo "

        ";
            // line 36
            if (0 !== twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "temporada_id", [], "any", false, false, false, 36), ($context["temp_id"] ?? null))) {
                // line 37
                echo "            ";
                $context["fondoCabecera"] = "greenbox";
                // line 38
                echo "            ";
                $context["colorCabecera"] = "black";
                // line 39
                echo "
            ";
                // line 40
                $this->loadTemplate("index/__part/contenidoCabecera.html.twig", "index/__part/contenidoIndex.html.twig", 40)->display($context);
                // line 41
                echo "        ";
            }
            // line 42
            echo "
        <div style=\"clear:both\"></div>
        <div>
            ";
            // line 45
            $this->loadTemplate("index/__part/filaPartido.html.twig", "index/__part/contenidoIndex.html.twig", 45)->display(twig_array_merge($context, ["partido" =>             // line 46
$context["partido"], "pagina" => "index"]));
            // line 49
            echo "        </div>


        ";
            // line 52
            $context["equiposTw"] = twig_array_merge(($context["equiposTw"] ?? null), [(            // line 54
$context["kk"] . "_l") => ["id" => twig_get_attribute($this->env, $this->source,             // line 55
$context["partido"], "equipoLocal_id", [], "any", false, false, false, 55), "equipo" => twig_get_attribute($this->env, $this->source,             // line 56
$context["partido"], "local", [], "any", false, false, false, 56), "club_id" => twig_get_attribute($this->env, $this->source,             // line 57
$context["partido"], "club_local", [], "any", false, false, false, 57), "idPais" => twig_get_attribute($this->env, $this->source,             // line 58
$context["partido"], "idPais", [], "any", false, false, false, 58)]]);
            // line 62
            echo "

        ";
            // line 64
            $context["equiposTw"] = twig_array_merge(($context["equiposTw"] ?? null), [(            // line 66
$context["kk"] . "_v") => ["id" => twig_get_attribute($this->env, $this->source,             // line 67
$context["partido"], "equipoVisitante_id", [], "any", false, false, false, 67), "equipo" => twig_get_attribute($this->env, $this->source,             // line 68
$context["partido"], "visitante", [], "any", false, false, false, 68), "club_id" => twig_get_attribute($this->env, $this->source,             // line 69
$context["partido"], "club_visitante", [], "any", false, false, false, 69), "idPais" => twig_get_attribute($this->env, $this->source,             // line 70
$context["partido"], "idPais", [], "any", false, false, false, 70)]]);
            // line 74
            echo "
        ";
            // line 75
            $context["temp_id"] = twig_get_attribute($this->env, $this->source, $context["partido"], "temporada_id", [], "any", false, false, false, 75);
            // line 76
            echo "
    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['kk'], $context['partido'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 78
        echo "</div>


<div class=\"row\"></div>

<div class=\"col-12\">
    ";
        // line 84
        $this->loadTemplate("__part/pesLeerTwitsPortada.html.twig", "index/__part/contenidoIndex.html.twig", 84)->display($context);
        // line 85
        echo "
</div>



";
    }

    public function getTemplateName()
    {
        return "index/__part/contenidoIndex.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  215 => 85,  213 => 84,  205 => 78,  190 => 76,  188 => 75,  185 => 74,  183 => 70,  182 => 69,  181 => 68,  180 => 67,  179 => 66,  178 => 64,  174 => 62,  172 => 58,  171 => 57,  170 => 56,  169 => 55,  168 => 54,  167 => 52,  162 => 49,  160 => 46,  159 => 45,  154 => 42,  151 => 41,  149 => 40,  146 => 39,  143 => 38,  140 => 37,  138 => 36,  134 => 34,  131 => 33,  129 => 32,  125 => 30,  122 => 29,  119 => 28,  116 => 27,  113 => 26,  111 => 25,  108 => 24,  105 => 23,  102 => 22,  99 => 21,  96 => 20,  94 => 19,  91 => 18,  89 => 17,  86 => 16,  82 => 14,  80 => 13,  77 => 12,  75 => 11,  72 => 10,  55 => 9,  51 => 7,  48 => 6,  45 => 5,  43 => 4,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "index/__part/contenidoIndex.html.twig", "/home/futbolme/domains/futbolme.com/public_html/v2/templates/index/__part/contenidoIndex.html.twig");
    }
}
