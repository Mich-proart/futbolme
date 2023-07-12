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
class __TwigTemplate_baa3428dc97cb587b0aa68023776b92a41863aa7d9f256b834d7609073feeb48 extends Template
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
            echo "    <div id=\"Futbolme_ATF2_300x250\" class=\"text-center\"></div>
    <script type=\"application/javascript\">
        var slmadshb = slmadshb || {};
        slmadshb.que = slmadshb.que || [];
        slmadshb.que.push(function() {
            slmadshb.display(\"Futbolme_ATF2_300x250\");
        });
    </script>
";
        }
        // line 22
        echo "
<div class=\"row\">
    ";
        // line 24
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
            // line 25
            echo "
        ";
            // line 26
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["p"], "partidos", [], "any", false, false, false, 26));
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
                // line 27
                echo "            ";
                $context["leagueName"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["partido"], "league", [], "any", false, false, false, 27), "name", [], "any", false, false, false, 27);
                // line 28
                echo "            ";
                $context["buscamos"] = "mins play";
                // line 29
                echo "
            ";
                // line 30
                if ( !twig_in_filter(($context["buscamos"] ?? null), ($context["leagueName"] ?? null))) {
                    // line 31
                    echo "
                ";
                    // line 32
                    $context["status"] = twig_get_attribute($this->env, $this->source, $context["partido"], "time_status", [], "any", false, false, false, 32);
                    // line 33
                    echo "
                ";
                    // line 35
                    echo "                ";
                    // line 39
                    echo "
                ";
                    // line 40
                    if ((0 === twig_compare(($context["status"] ?? null), 1) && 0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["partido"], "timer", [], "any", false, false, false, 40), "tm", [], "any", false, false, false, 40), 0))) {
                        // line 41
                        echo "
                    <div class=\"col-12\">

                        ";
                        // line 44
                        if (0 !== twig_compare(($context["temp_id"] ?? null), $context["key"])) {
                            // line 45
                            echo "
                            ";
                            // line 46
                            $context["fondoCabecera"] = "celestebox";
                            // line 47
                            echo "                            ";
                            $context["colorCabecera"] = "white !important";
                            // line 48
                            echo "                            ";
                            $context["enlaceTorneo"] = $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("torneo_index", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,                             // line 49
$context["partido"], "league", [], "any", false, false, false, 49), "name", [], "any", false, false, false, 49)]), "idTorneo" => (1000000 + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,                             // line 50
$context["partido"], "league", [], "any", false, false, false, 50), "id", [], "any", false, false, false, 50))]);
                            // line 52
                            echo "
                            <div class=\"cabeceraTorneo\">

                                <div class=\"nombreTorneo\">

                                    <a href=\"";
                            // line 57
                            echo twig_escape_filter($this->env, ($context["enlaceTorneo"] ?? null), "html", null, true);
                            echo "\" style=\"color: black;\">

                                        <h2 class=\"tname visible-xs txt11\">
                                            ";
                            // line 60
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["partido"], "league", [], "any", false, false, false, 60), "name", [], "any", false, false, false, 60), "html", null, true);
                            echo "
                                        </h2>
                                    </a>

                                </div>

                            </div>

                        ";
                        }
                        // line 69
                        echo "
                        ";
                        // line 70
                        $context["temp_id"] = $context["key"];
                        // line 71
                        echo "

                        ";
                        // line 73
                        $this->loadTemplate("index/__part/partidoDirectoSueltos.html.twig", "index/__part/contenidoSueltos.html.twig", 73)->display($context);
                        // line 74
                        echo "
                        ";
                        // line 75
                        $context["contador"] = (($context["contador"] ?? null) + 1);
                        // line 76
                        echo "

                        ";
                        // line 78
                        if (0 === twig_compare(($context["contador"] ?? null), 3)) {
                            // line 79
                            echo "                            <div id=\"Futbolme_ATF2_300x250\" class=\"text-center\"></div>
                            <script type=\"application/javascript\">
                                var slmadshb = slmadshb || {};
                                slmadshb.que = slmadshb.que || [];
                                slmadshb.que.push(function() {
                                    slmadshb.display(\"Futbolme_ATF2_300x250\");
                                });
                            </script>
                        ";
                        }
                        // line 88
                        echo "
                    </div>


                ";
                    }
                    // line 93
                    echo "            ";
                }
                // line 94
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
            // line 95
            echo "    ";
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
        // line 96
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
        return array (  260 => 96,  246 => 95,  232 => 94,  229 => 93,  222 => 88,  211 => 79,  209 => 78,  205 => 76,  203 => 75,  200 => 74,  198 => 73,  194 => 71,  192 => 70,  189 => 69,  177 => 60,  171 => 57,  164 => 52,  162 => 50,  161 => 49,  159 => 48,  156 => 47,  154 => 46,  151 => 45,  149 => 44,  144 => 41,  142 => 40,  139 => 39,  137 => 35,  134 => 33,  132 => 32,  129 => 31,  127 => 30,  124 => 29,  121 => 28,  118 => 27,  101 => 26,  98 => 25,  81 => 24,  77 => 22,  66 => 13,  64 => 12,  61 => 11,  59 => 10,  57 => 9,  54 => 8,  48 => 5,  46 => 4,  42 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "index/__part/contenidoSueltos.html.twig", "/home/futbolme/domains/futbolme.com/public_html/v2/templates/index/__part/contenidoSueltos.html.twig");
    }
}
