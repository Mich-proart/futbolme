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
class __TwigTemplate_4a09f7a2f220bd815ba008e0365178052a91424f883a80fb1bb3abcbb7a46b91 extends Template
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

    <div class=\"row\">
        <div class=\"col-1\">
            <div  

                    ";
        // line 29
        if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "idComunidad", [], "any", false, false, false, 29), 1)) {
            // line 30
            echo "                    ";
            $context["imagen"] = twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "idComunidad", [], "any", false, false, false, 30);
            // line 31
            echo "                    ";
            $context["nombreCom"] = "";
            // line 32
            echo "
                    ";
            // line 33
            if (((((-1 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 34
($context["partido"] ?? null), "temporada_id", [], "any", false, false, false, 34), 25) || 0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 35
($context["partido"] ?? null), "temporada_id", [], "any", false, false, false, 35), 266)) || 0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 36
($context["partido"] ?? null), "temporada_id", [], "any", false, false, false, 36), 267)) || 0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 37
($context["partido"] ?? null), "temporada_id", [], "any", false, false, false, 37), 34)) || 0 === twig_compare(twig_get_attribute($this->env, $this->source,             // line 38
($context["partido"] ?? null), "temporada_id", [], "any", false, false, false, 38), 35))) {
                // line 40
                echo "
                        ";
                // line 41
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "idComunidad", [], "any", false, false, false, 41), 10)) {
                    // line 42
                    echo "                            ";
                    $context["nombreCom"] = (($context["nombreCom"] ?? null) . " Y MELILLA");
                    // line 43
                    echo "                            ";
                    $context["imagen"] = 55;
                    // line 44
                    echo "                        ";
                }
                // line 45
                echo "
                        ";
                // line 46
                if (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "idComunidad", [], "any", false, false, false, 46), 11)) {
                    // line 47
                    echo "                            ";
                    $context["nombreCom"] = (($context["nombreCom"] ?? null) . "  Y CEUTA");
                    // line 48
                    echo "                            ";
                    $context["imagen"] = 56;
                    // line 49
                    echo "                        ";
                }
                // line 50
                echo "
                    ";
            }
            // line 52
            echo "
                    ";
            // line 53
            if (((0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "temporada_id", [], "any", false, false, false, 53), 85) || 0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "temporada_id", [], "any", false, false, false, 53), 291)) || 0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "temporada_id", [], "any", false, false, false, 53), 3093))) {
                // line 54
                echo "                            ";
                $context["imagen"] = 22;
                // line 55
                echo "                    ";
            } elseif ((0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "temporada_id", [], "any", false, false, false, 55), 76) || 0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "temporada_id", [], "any", false, false, false, 55), 3096))) {
                // line 56
                echo "                        ";
                $context["imagen"] = 21;
                // line 57
                echo "                    ";
            }
            // line 58
            echo "
                    class=\"bandera flagbox comunidad flag";
            // line 59
            echo twig_escape_filter($this->env, ($context["imagen"] ?? null), "html", null, true);
            echo "\"></div>
            ";
        } else {
            // line 61
            echo "            class=\"bandera flagbox pais flag";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "idPais", [], "any", false, false, false, 61), "html", null, true);
            echo "b\"></div>
        ";
        }
        // line 63
        echo "
        

        </div>

        <div class=\"col-11\">
            <div class=\"nombreTorneo\" style=\"margin-left:10px\">

                ";
        // line 72
        echo "                <a href=\"";
        echo twig_escape_filter($this->env, ($context["enlace_torneo"] ?? null), "html", null, true);
        echo "\" style=\"color: black;\">
                    ";
        // line 73
        $context["txtnombreTorneo"] = twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "nombreTorneo", [], "any", false, false, false, 73);
        // line 74
        echo "                    ";
        $context["txttraduccion"] = twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "traduccion", [], "any", false, false, false, 74);
        // line 75
        echo "
                    ";
        // line 76
        if ((((0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "idPais", [], "any", false, false, false, 76), 60) && 0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "idPais", [], "any", false, false, false, 76), 199)) && 0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "idPais", [], "any", false, false, false, 76), 200)) && 0 !== twig_compare(twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "idPais", [], "any", false, false, false, 76), 201))) {
            // line 77
            echo "                        ";
            $context["txttraduccion"] = twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "nombrePais", [], "any", false, false, false, 77);
            // line 78
            echo "                    ";
        }
        // line 79
        echo "                    <h2 class=\"tname visible-xs txt11\">
                        ";
        // line 80
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["partido"] ?? null), "torneoCorto", [], "any", false, false, false, 80), "html", null, true);
        echo "                        
                        ";
        // line 81
        if ( !twig_test_empty(($context["txttraduccion"] ?? null))) {
            // line 82
            echo "                            - ";
            echo twig_escape_filter($this->env, ($context["txttraduccion"] ?? null), "html", null, true);
            echo "
                        ";
        }
        // line 84
        echo "                    </h2>
                </a>

            </div>
        </div>
    </div>

";
        // line 106
        echo "

";
        // line 117
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
        return array (  226 => 117,  222 => 106,  213 => 84,  207 => 82,  205 => 81,  201 => 80,  198 => 79,  195 => 78,  192 => 77,  190 => 76,  187 => 75,  184 => 74,  182 => 73,  177 => 72,  167 => 63,  161 => 61,  156 => 59,  153 => 58,  150 => 57,  147 => 56,  144 => 55,  141 => 54,  139 => 53,  136 => 52,  132 => 50,  129 => 49,  126 => 48,  123 => 47,  121 => 46,  118 => 45,  115 => 44,  112 => 43,  109 => 42,  107 => 41,  104 => 40,  102 => 38,  101 => 37,  100 => 36,  99 => 35,  98 => 34,  97 => 33,  94 => 32,  91 => 31,  88 => 30,  86 => 29,  78 => 23,  74 => 18,  72 => 17,  69 => 16,  65 => 14,  61 => 12,  59 => 11,  56 => 10,  52 => 8,  48 => 6,  46 => 5,  43 => 4,  41 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "index/__part/contenidoCabecera.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/index/__part/contenidoCabecera.html.twig");
    }
}
