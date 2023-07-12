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

/* index/__part/contenidoCabecera.html.twig */
class __TwigTemplate_6c5f408324e06b41462a60a1d7683694abb7591b46aa645c8e543d80cc722517 extends Template
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
        $context["nC"] = twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "nombreComunidad", [], "any", false, false, false, 1);
        // line 2
        $context["nP"] = twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "nombrePais", [], "any", false, false, false, 2);
        // line 3
        $context["enlace"] = "/resultados-directo/torneo/";
        // line 4
        echo "
";
        // line 5
        if (0 !== twig_compare(($context["nC"] ?? null), "SIN COMUNIDAD")) {
            // line 6
            echo "    ";
            $context["nC"] = (($context["nc"] ?? null) . "-");
        } else {
            // line 8
            echo "    ";
            $context["nC"] = "";
        }
        // line 10
        echo "
";
        // line 11
        if (0 !== twig_compare(($context["nP"] ?? null), "España")) {
            // line 12
            echo "    ";
            $context["nP"] = "";
        } else {
            // line 14
            echo "    ";
            $context["nP"] = (($context["nP"] ?? null) . "-");
        }
        // line 16
        echo "
";
        // line 17
        $context["enlace_torneo"] = ((((($context["enlace"] ?? null) . call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [((($context["nC"] ?? null) . ($context["nP"] ?? null)) . twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "nombreTorneo", [], "any", false, false, false, 17))])) . "/") . twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "temporada_id", [], "any", false, false, false, 17)) . "/");
        // line 18
        echo "

";
        // line 23
        echo "<div class=\"cabeceraTorneo\">

    <div class=\"nombreTorneo\">
        ";
        // line 27
        echo "        <a href=\"";
        echo twig_escape_filter($this->env, ($context["enlace_torneo"] ?? null), "html", null, true);
        echo "\" style=\"color: black;\">
            ";
        // line 28
        $context["txtnombreTorneo"] = twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "nombreTorneo", [], "any", false, false, false, 28);
        // line 29
        echo "            ";
        $context["txttraduccion"] = twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "traduccion", [], "any", false, false, false, 29);
        // line 30
        echo "
            ";
        // line 31
        if ((((0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "idPais", [], "any", false, false, false, 31), 60) && 0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "idPais", [], "any", false, false, false, 31), 199)) && 0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "idPais", [], "any", false, false, false, 31), 200)) && 0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "idPais", [], "any", false, false, false, 31), 201))) {
            // line 32
            echo "                ";
            $context["txttraduccion"] = twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "nombrePais", [], "any", false, false, false, 32);
            // line 33
            echo "            ";
        }
        // line 34
        echo "            <h2 class=\"tname visible-xs txt11\">
                ";
        // line 35
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "torneoCorto", [], "any", false, false, false, 35), "html", null, true);
        echo "

                ";
        // line 37
        if ( !twig_test_empty(($context["txttraduccion"] ?? null))) {
            // line 38
            echo "                    - ";
            echo twig_escape_filter($this->env, ($context["txttraduccion"] ?? null), "html", null, true);
            echo "
                ";
        }
        // line 40
        echo "            </h2>
        </a>

    </div>

    <div
        ";
        // line 46
        if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "idComunidad", [], "any", false, false, false, 46), 1)) {
            // line 47
            echo "            ";
            $context["imagen"] = twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "idComunidad", [], "any", false, false, false, 47);
            // line 48
            echo "            ";
            $context["nombreCom"] = "";
            // line 49
            echo "
            ";
            // line 50
            if (((((-1 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 51
($context["partido"] ?? null), "temporada_id", [], "any", false, false, false, 51), 25) || 0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 52
($context["partido"] ?? null), "temporada_id", [], "any", false, false, false, 52), 266)) || 0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 53
($context["partido"] ?? null), "temporada_id", [], "any", false, false, false, 53), 267)) || 0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 54
($context["partido"] ?? null), "temporada_id", [], "any", false, false, false, 54), 34)) || 0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 55
($context["partido"] ?? null), "temporada_id", [], "any", false, false, false, 55), 35))) {
                // line 57
                echo "
                ";
                // line 58
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "idComunidad", [], "any", false, false, false, 58), 10)) {
                    // line 59
                    echo "                    ";
                    $context["nombreCom"] = (($context["nombreCom"] ?? null) . " Y MELILLA");
                    // line 60
                    echo "                    ";
                    $context["imagen"] = 55;
                    // line 61
                    echo "                ";
                }
                // line 62
                echo "
                ";
                // line 63
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "idComunidad", [], "any", false, false, false, 63), 11)) {
                    // line 64
                    echo "                    ";
                    $context["nombreCom"] = (($context["nombreCom"] ?? null) . "  Y CEUTA");
                    // line 65
                    echo "                    ";
                    $context["imagen"] = 56;
                    // line 66
                    echo "                ";
                }
                // line 67
                echo "

            ";
            }
            // line 70
            echo "
            class=\"bandera flagbox comunidad flag";
            // line 71
            echo twig_escape_filter($this->env, ($context["imagen"] ?? null), "html", null, true);
            echo "\"></div>
        ";
        } else {
            // line 73
            echo "            class=\"bandera flagbox pais flag";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "idPais", [], "any", false, false, false, 73), "html", null, true);
            echo "b\"></div>
        ";
        }
        // line 75
        echo "

";
        // line 92
        echo "

";
        // line 103
        echo "
</div>

";
    }

    public function getTemplateName()
    {
        return "index/__part/contenidoCabecera.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  201 => 103,  197 => 92,  193 => 75,  187 => 73,  182 => 71,  179 => 70,  174 => 67,  171 => 66,  168 => 65,  165 => 64,  163 => 63,  160 => 62,  157 => 61,  154 => 60,  151 => 59,  149 => 58,  146 => 57,  144 => 55,  143 => 54,  142 => 53,  141 => 52,  140 => 51,  139 => 50,  136 => 49,  133 => 48,  130 => 47,  128 => 46,  120 => 40,  114 => 38,  112 => 37,  107 => 35,  104 => 34,  101 => 33,  98 => 32,  96 => 31,  93 => 30,  90 => 29,  88 => 28,  83 => 27,  78 => 23,  74 => 18,  72 => 17,  69 => 16,  65 => 14,  61 => 12,  59 => 11,  56 => 10,  52 => 8,  48 => 6,  46 => 5,  43 => 4,  41 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "index/__part/contenidoCabecera.html.twig", "/home/futbolme/domains/futbolme.com/public_html/v2/templates/index/__part/contenidoCabecera.html.twig");
    }
}
