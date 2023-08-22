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

/* index/__part/contenidoSueltos.html.twig */
class __TwigTemplate_0532032cb8f4eb8c3c9a92cdae58c40714abad010f143b74678ab528701b4625 extends Template
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
        $context["torneos"] = [];
        // line 2
        echo "
";
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["partidosSueltos"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
            // line 4
            echo "    ";
            $context["torneos"] = call_user_func_array($this->env->getFunction('anadirAArrayKey')->getCallable(), [($context["torneos"] ?? null), $context["key"], ["partidos" =>             // line 5
$context["value"]]]);
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 8
        echo "
";
        // line 9
        $context["temp_id"] = 0;
        // line 10
        $context["contador"] = 0;
        // line 11
        echo "
";
        // line 12
        if (0 === twig_compare(twig_length_filter($this->env, ($context["torneos"] ?? null)), 0)) {
            // line 13
            echo "    <div class=\"row\">
        <div class=\"col-12\">
            ";
            // line 15
            $context["espacio"] = "cabeceraDirectos";
            // line 16
            echo "            ";
            if (call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_IOS__"])) {
                // line 17
                echo "                ";
                $context["espacio"] = "cabeceraDirectosiOS";
                // line 18
                echo "            ";
            }
            // line 19
            echo "            ";
            $this->loadTemplate("publicidad/publiGestion.html.twig", "index/__part/contenidoSueltos.html.twig", 19)->display($context);
            // line 20
            echo "        </div>
    </div>
";
        }
        // line 23
        echo "
<div class=\"row\">
    ";
        // line 25
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["torneos"] ?? null));
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
        foreach ($context['_seq'] as $context["key"] => $context["p"]) {
            // line 26
            echo "
        ";
            // line 27
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["p"], "partidos", [], "any", false, false, false, 27));
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
            foreach ($context['_seq'] as $context["k"] => $context["partido"]) {
                // line 28
                echo "            ";
                $context["leagueName"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["partido"], "league", [], "any", false, false, false, 28), "name", [], "any", false, false, false, 28);
                // line 29
                echo "            ";
                $context["buscamos"] = "mins play";
                // line 30
                echo "
            ";
                // line 31
                if ( !twig_in_filter(($context["buscamos"] ?? null), ($context["leagueName"] ?? null))) {
                    // line 32
                    echo "
                ";
                    // line 33
                    $context["status"] = twig_get_attribute($this->env, $this->source, $context["partido"], "time_status", [], "any", false, false, false, 33);
                    // line 34
                    echo "
                ";
                    // line 36
                    echo "                ";
                    // line 40
                    echo "
                ";
                    // line 41
                    if ((0 === twig_compare(($context["status"] ?? null), 1) && 0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["partido"], "timer", [], "any", false, false, false, 41), "tm", [], "any", false, false, false, 41), 0))) {
                        // line 42
                        echo "
                    <div class=\"col-12\">

                        ";
                        // line 45
                        if (0 !== twig_compare(($context["temp_id"] ?? null), $context["key"])) {
                            // line 46
                            echo "
                            ";
                            // line 47
                            $context["fondoCabecera"] = "celestebox";
                            // line 48
                            echo "                            ";
                            $context["colorCabecera"] = "white !important";
                            // line 49
                            echo "                            ";
                            $context["enlaceTorneo"] = $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("torneo_index", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,                             // line 50
$context["partido"], "league", [], "any", false, false, false, 50), "name", [], "any", false, false, false, 50)]), "idTorneo" => (1000000 + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,                             // line 51
$context["partido"], "league", [], "any", false, false, false, 51), "id", [], "any", false, false, false, 51))]);
                            // line 53
                            echo "
                            <div class=\"cabeceraTorneo\">

                                <div class=\"nombreTorneo\">

                                    <a href=\"";
                            // line 58
                            echo twig_escape_filter($this->env, ($context["enlaceTorneo"] ?? null), "html", null, true);
                            echo "\" style=\"color: black;\">

                                        <h2 class=\"tname visible-xs txt11\">                                            
                                            ";
                            // line 61
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["partido"], "league", [], "any", false, false, false, 61), "name", [], "any", false, false, false, 61), "html", null, true);
                            echo "
                                        </h2>
                                    </a>

                                </div>

                            </div>

                        ";
                        }
                        // line 70
                        echo "
                        ";
                        // line 71
                        $context["temp_id"] = $context["key"];
                        // line 72
                        echo "

                        ";
                        // line 74
                        $this->loadTemplate("index/__part/partidoDirectoSueltos.html.twig", "index/__part/contenidoSueltos.html.twig", 74)->display($context);
                        // line 75
                        echo "
                        ";
                        // line 76
                        $context["contador"] = (($context["contador"] ?? null) + 1);
                        // line 77
                        echo "

                        ";
                        // line 79
                        if (0 === twig_compare(($context["contador"] ?? null), 3)) {
                            // line 80
                            echo "                            <div class=\"row\">
                                <div class=\"col-12\">
                                    ";
                            // line 82
                            $context["espacio"] = "entreDirectos";
                            // line 83
                            echo "                                    ";
                            $this->loadTemplate("publicidad/publiGestion.html.twig", "index/__part/contenidoSueltos.html.twig", 83)->display($context);
                            // line 84
                            echo "                                </div>
                            </div>
                        ";
                        }
                        // line 87
                        echo "
                    </div>
                ";
                    }
                    // line 90
                    echo "            ";
                }
                // line 91
                echo "        ";
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
            unset($context['_seq'], $context['_iterated'], $context['k'], $context['partido'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 92
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
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['p'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 97
        echo "</div>

";
    }

    public function getTemplateName()
    {
        return "index/__part/contenidoSueltos.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  277 => 97,  259 => 92,  245 => 91,  242 => 90,  237 => 87,  232 => 84,  229 => 83,  227 => 82,  223 => 80,  221 => 79,  217 => 77,  215 => 76,  212 => 75,  210 => 74,  206 => 72,  204 => 71,  201 => 70,  189 => 61,  183 => 58,  176 => 53,  174 => 51,  173 => 50,  171 => 49,  168 => 48,  166 => 47,  163 => 46,  161 => 45,  156 => 42,  154 => 41,  151 => 40,  149 => 36,  146 => 34,  144 => 33,  141 => 32,  139 => 31,  136 => 30,  133 => 29,  130 => 28,  113 => 27,  110 => 26,  93 => 25,  89 => 23,  84 => 20,  81 => 19,  78 => 18,  75 => 17,  72 => 16,  70 => 15,  66 => 13,  64 => 12,  61 => 11,  59 => 10,  57 => 9,  54 => 8,  48 => 5,  46 => 4,  42 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "index/__part/contenidoSueltos.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/index/__part/contenidoSueltos.html.twig");
    }
}
