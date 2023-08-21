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

/* temporada/__content/__part/eliminatorioMenuGrupos.html.twig */
class __TwigTemplate_e479c25599c06a64e4a527b4e6774da48299c7625186f38f7d3c7019afc55880 extends Template
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
        if (0 === twig_compare(($context["tipo_eliminatoria"] ?? null), 3)) {
            // line 2
            echo "
    ";
            // line 3
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["grupos"] ?? null));
            foreach ($context['_seq'] as $context["fase"] => $context["gruposFase"]) {
                // line 4
                echo "
        ";
                // line 5
                if (0 === twig_compare($context["fase"], ($context["valorJornada"] ?? null))) {
                    // line 6
                    echo "
            <div class=\"row\" style=\"margin-top: 20px;\">
                <ul id=\"gruposFase";
                    // line 8
                    echo twig_escape_filter($this->env, $context["fase"], "html", null, true);
                    echo "\" class=\"col-12 menuListGrises\" style=\"padding: 0px;\">
                    ";
                    // line 9
                    $context["conta"] = 0;
                    // line 10
                    echo "                    ";
                    // line 11
                    echo "
                    ";
                    // line 12
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["gruposFase"]);
                    foreach ($context['_seq'] as $context["id"] => $context["grupo"]) {
                        // line 13
                        echo "                        ";
                        $context["conta"] = (($context["conta"] ?? null) + 1);
                        // line 14
                        echo "
                        ";
                        // line 15
                        if ((0 === twig_compare(($context["conta"] ?? null), 1) && 0 === twig_compare(($context["primerGrupo"] ?? null), 0))) {
                            // line 16
                            echo "                            ";
                            $context["primerGrupo"] = $context["id"];
                            // line 17
                            echo "                            ";
                            $context["nombreprimerGrupo"] = twig_get_attribute($this->env, $this->source, $context["grupo"], "nombre", [], "any", false, false, false, 17);
                            // line 18
                            echo "                        ";
                        }
                        // line 19
                        echo "
                        ";
                        // line 20
                        if (0 === twig_compare(($context["grupo_id"] ?? null), $context["id"])) {
                            // line 21
                            echo "                            ";
                            $context["primerGrupo"] = $context["id"];
                            // line 22
                            echo "                            ";
                            $context["nombreprimerGrupo"] = twig_get_attribute($this->env, $this->source, $context["grupo"], "nombre", [], "any", false, false, false, 22);
                            // line 23
                            echo "                        ";
                        }
                        // line 24
                        echo "
                        <li class=\"";
                        // line 25
                        if ((0 === twig_compare(($context["grupo_id"] ?? null), $context["id"]) || 0 === twig_compare(($context["primerGrupo"] ?? null), $context["id"]))) {
                            echo "activa";
                        }
                        echo "\">
                            <a class=\"btn btn-secondary\" href=\"
                                ";
                        // line 27
                        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("torneo_jornada_grupo_id", ["idTorneo" =>                         // line 28
($context["temporada_id"] ?? null), "slug" =>                         // line 29
($context["slug"] ?? null), "jornada" =>                         // line 30
($context["valorJornada"] ?? null), "grupo_id" =>                         // line 31
$context["id"]]), "html", null, true);
                        // line 32
                        echo "\">
                                ";
                        // line 33
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["grupo"], "nombre", [], "any", false, false, false, 33), "html", null, true);
                        echo "
                            </a>
                        </li>

                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['id'], $context['grupo'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 38
                    echo "                </ul>
            </div>

            <div class=\"row\" style=\"margin-top: 30px;\">
                <div class=\"col-12\">
                    <h2 class=\"subtitulo\" id=\"nombreprimerGrupo\">
                        ";
                    // line 44
                    echo twig_escape_filter($this->env, ($context["nombreprimerGrupo"] ?? null), "html", null, true);
                    echo "
                    </h2>
                </div>
            </div>

        ";
                }
                // line 50
                echo "
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['fase'], $context['gruposFase'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 52
            echo "

";
        }
    }

    public function getTemplateName()
    {
        return "temporada/__content/__part/eliminatorioMenuGrupos.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  155 => 52,  148 => 50,  139 => 44,  131 => 38,  120 => 33,  117 => 32,  115 => 31,  114 => 30,  113 => 29,  112 => 28,  111 => 27,  104 => 25,  101 => 24,  98 => 23,  95 => 22,  92 => 21,  90 => 20,  87 => 19,  84 => 18,  81 => 17,  78 => 16,  76 => 15,  73 => 14,  70 => 13,  66 => 12,  63 => 11,  61 => 10,  59 => 9,  55 => 8,  51 => 6,  49 => 5,  46 => 4,  42 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "temporada/__content/__part/eliminatorioMenuGrupos.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/temporada/__content/__part/eliminatorioMenuGrupos.html.twig");
    }
}
