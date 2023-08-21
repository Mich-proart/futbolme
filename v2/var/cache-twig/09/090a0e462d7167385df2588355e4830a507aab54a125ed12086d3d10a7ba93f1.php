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

/* temporada/__content/__part/pesCalendario.html.twig */
class __TwigTemplate_9445d7ea72c149143de478f3b68ed5077b49b31107f6a505985dd9f4b3742f6d extends Template
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
        if (twig_get_attribute($this->env, $this->source, ($context["datos"] ?? null), "partidos", [], "any", true, true, false, 1)) {
            // line 2
            echo "    ";
            $context["j"] = 0;
            // line 3
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["datos"] ?? null), "partidos", [], "any", false, false, false, 3));
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
            foreach ($context['_seq'] as $context["key"] => $context["partido"]) {
                // line 4
                echo "
        ";
                // line 5
                if (0 !== twig_compare(($context["j"] ?? null), twig_get_attribute($this->env, $this->source, $context["partido"], "jornada", [], "any", false, false, false, 5))) {
                    // line 6
                    echo "            ";
                    $context["j"] = twig_get_attribute($this->env, $this->source, $context["partido"], "jornada", [], "any", false, false, false, 6);
                    // line 7
                    echo "            <div class=\"col-12 contenedorTitularTorneoCalendario\">
                <h4>
                    Jornada ";
                    // line 9
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "jornada", [], "any", false, false, false, 9), "html", null, true);
                    echo " - ";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('nombreDiaCompleto')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["partido"], "fecha", [], "any", false, false, false, 9)]), "html", null, true);
                    echo "
                </h4>
            </div>
        ";
                }
                // line 13
                echo "
        <div class=\"col-12\">
            ";
                // line 15
                $this->loadTemplate("index/__part/filaPartido.html.twig", "temporada/__content/__part/pesCalendario.html.twig", 15)->display($context);
                // line 16
                echo "        </div>

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
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['partido'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 19
            echo "
";
        }
    }

    public function getTemplateName()
    {
        return "temporada/__content/__part/pesCalendario.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 19,  87 => 16,  85 => 15,  81 => 13,  72 => 9,  68 => 7,  65 => 6,  63 => 5,  60 => 4,  42 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "temporada/__content/__part/pesCalendario.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/temporada/__content/__part/pesCalendario.html.twig");
    }
}
