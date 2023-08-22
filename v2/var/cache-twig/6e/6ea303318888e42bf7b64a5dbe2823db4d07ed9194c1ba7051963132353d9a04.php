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

/* temporada/__content/__part/eliminatorioPartidos.html.twig */
class __TwigTemplate_87bab94e26ee93eedc266b1397763b0a605e7fd594fb8f305011e5558b65e0df extends Template
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
        echo "<div class=\"row\">
    <div class=\"col-12\" style=\"padding: 0px;\">
        ";
        // line 3
        $context["f"] = "";
        // line 4
        echo "        ";
        $context["colorFondo"] = "";
        // line 5
        echo "        ";
        $context["j"] = "";
        // line 6
        echo "
        ";
        // line 7
        $context["equiposEnJuego"] = [];
        // line 8
        echo "
        ";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["partidos"] ?? null));
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
            // line 10
            echo "
        ";
            // line 11
            if (twig_get_attribute($this->env, $this->source, $context["partido"], "id", [], "any", true, true, false, 11)) {
                // line 12
                echo "        ";
                if (0 !== twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "estado_partido", [], "any", false, false, false, 12), 2)) {
                    // line 13
                    echo "
        ";
                    // line 14
                    $context["colorL"] = "";
                    // line 15
                    echo "        ";
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "local", [], "any", false, false, false, 15), "España")) {
                        // line 16
                        echo "            ";
                        $context["colorL"] = "background-color:#F4FA58";
                        // line 17
                        echo "        ";
                    }
                    // line 18
                    echo "
        ";
                    // line 19
                    $context["colorV"] = "";
                    // line 20
                    echo "        ";
                    if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "visitante", [], "any", false, false, false, 20), "España")) {
                        // line 21
                        echo "            ";
                        $context["colorV"] = "background-color:#F4FA58";
                        // line 22
                        echo "        ";
                    }
                    // line 23
                    echo "

        ";
                    // line 25
                    if ((((1 === twig_compare(call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__APP__"]), 0) && 0 === twig_compare(twig_length_filter($this->env, ($context["directos"] ?? null)), 0)) && 1 === twig_compare($context["key"], 1)) && -1 === twig_compare($context["key"], 3))) {
                        // line 26
                        echo "            ";
                        $this->loadTemplate("publicidad/cuerpo04.html.twig", "temporada/__content/__part/eliminatorioPartidos.html.twig", 26)->display($context);
                        // line 27
                        echo "        ";
                    }
                    // line 28
                    echo "
        ";
                    // line 29
                    $context["enlace_partido"] = twig_get_attribute($this->env, $this->source, $context["partido"], "pgPartido", [], "any", false, false, false, 29);
                    // line 30
                    echo "
        ";
                    // line 31
                    $context["enlace_local"] = twig_get_attribute($this->env, $this->source, $context["partido"], "pgLocal", [], "any", false, false, false, 31);
                    // line 32
                    echo "        ";
                    $context["enlace_visitante"] = twig_get_attribute($this->env, $this->source, $context["partido"], "pgVisitante", [], "any", false, false, false, 32);
                    // line 33
                    echo "
        ";
                    // line 34
                    $context["hora_prevista"] = twig_get_attribute($this->env, $this->source, $context["partido"], "hora_prevista", [], "any", false, false, false, 34);
                    // line 35
                    echo "

        ";
                    // line 37
                    if (((0 === twig_compare(($context["valorJornada"] ?? null), 0) && 0 !== twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "jornada", [], "any", false, false, false, 37), ($context["j"] ?? null))) || 0 === twig_compare(($context["porFecha"] ?? null), 1))) {
                        // line 38
                        echo "            <div class=\"row\">
                <div class=\"col-12 nombreDiaPartido\" style=\"line-height: 30px; clear: both;\">
                    ";
                        // line 40
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "fase", [], "any", false, false, false, 40), "html", null, true);
                        echo "
                </div>
            </div>
        ";
                    }
                    // line 44
                    echo "
        ";
                    // line 45
                    if (0 === twig_compare(($context["porFecha"] ?? null), 0)) {
                        // line 46
                        echo "
        <div class=\"row\">
            <div class=\"col-12 grupoEliminatorio
                                    ";
                        // line 49
                        if (twig_get_attribute($this->env, $this->source, $context["partido"], "grupo_id", [], "any", false, false, false, 49)) {
                            // line 50
                            echo "                                        grupo";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "grupo_id", [], "any", false, false, false, 50), "html", null, true);
                            echo "
                                    ";
                        }
                        // line 52
                        echo "                                \"

                    ";
                        // line 54
                        if (0 !== twig_compare(($context["primerGrupo"] ?? null), twig_get_attribute($this->env, $this->source, $context["partido"], "grupo_id", [], "any", false, false, false, 54))) {
                            // line 55
                            echo "                        style=\"display: none;\"
                    ";
                        }
                        // line 57
                        echo "            >

                ";
                    } else {
                        // line 60
                        echo "
                <div class=\"row\">
                    <div class=\"col-12\">
                        <div class=\"row\">
                            <div class=\"col-12\">
                                ";
                        // line 65
                        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["grupos"] ?? null), ($context["valorJornada"] ?? null), [], "array", false, true, false, 65), twig_get_attribute($this->env, $this->source, $context["partido"], "grupo_id", [], "any", false, false, false, 65), [], "array", true, true, false, 65)) {
                            // line 66
                            echo "                                    ";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = ($context["grupos"] ?? null)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144[($context["valorJornada"] ?? null)] ?? null) : null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4[twig_get_attribute($this->env, $this->source, $context["partido"], "grupo_id", [], "any", false, false, false, 66)] ?? null) : null), "nombre", [], "any", false, false, false, 66), "html", null, true);
                            echo "
                                ";
                        }
                        // line 68
                        echo "                            </div>
                        </div>
                        ";
                    }
                    // line 71
                    echo "                        ";
                    if (0 !== twig_compare(($context["f"] ?? null), twig_get_attribute($this->env, $this->source, $context["partido"], "fecha", [], "any", false, false, false, 71))) {
                        // line 72
                        echo "                            ";
                        if (0 === twig_compare(($context["colorFondo"] ?? null), "whitebox")) {
                            // line 73
                            echo "                                ";
                            $context["colorFondo"] = "cajagrisclaro";
                            // line 74
                            echo "                            ";
                        } else {
                            // line 75
                            echo "                                ";
                            $context["colorFondo"] = "whitebox";
                            // line 76
                            echo "                            ";
                        }
                        // line 77
                        echo "
                            <div class=\"row\">
                                <div class=\"col-12 nombreDiaPartido\" style=\"line-height: 30px; clear: both;\">
                                    ";
                        // line 80
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('nombreDiaCompleto')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["partido"], "fecha", [], "any", false, false, false, 80)]), "html", null, true);
                        echo "
                                </div>
                            </div>

                        ";
                    }
                    // line 85
                    echo "

                        ";
                    // line 87
                    if (0 === twig_compare($context["key"], 3)) {
                        // line 88
                        echo "
                            ";
                        // line 89
                        $this->loadTemplate("publicidad/cuerpo01.html.twig", "temporada/__content/__part/eliminatorioPartidos.html.twig", 89)->display($context);
                        // line 90
                        echo "
                        ";
                    }
                    // line 92
                    echo "
                        ";
                    // line 93
                    if (((isset($context["primerGrupo"]) || array_key_exists("primerGrupo", $context)) && 0 === twig_compare(($context["primerGrupo"] ?? null), twig_get_attribute($this->env, $this->source, $context["partido"], "grupo_id", [], "any", false, false, false, 93)))) {
                        // line 94
                        echo "                            ";
                        $context["equiposEnJuego"] = call_user_func_array($this->env->getFunction('anadirAArrayKey')->getCallable(), [($context["equiposEnJuego"] ?? null), twig_get_attribute($this->env, $this->source, $context["partido"], "equipoLocal_id", [], "any", false, false, false, 94), twig_get_attribute($this->env, $this->source, $context["partido"], "equipoLocal_id", [], "any", false, false, false, 94)]);
                        // line 95
                        echo "                            ";
                        $context["equiposEnJuego"] = call_user_func_array($this->env->getFunction('anadirAArrayKey')->getCallable(), [($context["equiposEnJuego"] ?? null), twig_get_attribute($this->env, $this->source, $context["partido"], "equipoVisitante_id", [], "any", false, false, false, 95), twig_get_attribute($this->env, $this->source, $context["partido"], "equipoVisitante_id", [], "any", false, false, false, 95)]);
                        // line 96
                        echo "
                            ";
                        // line 97
                        $this->loadTemplate("index/__part/filaPartido.html.twig", "temporada/__content/__part/eliminatorioPartidos.html.twig", 97)->display($context);
                        // line 98
                        echo "                        ";
                    }
                    // line 99
                    echo "

                        ";
                    // line 101
                    $context["f"] = twig_get_attribute($this->env, $this->source, $context["partido"], "fecha", [], "any", false, false, false, 101);
                    // line 102
                    echo "                        ";
                    $context["j"] = twig_get_attribute($this->env, $this->source, $context["partido"], "jornada", [], "any", false, false, false, 102);
                    // line 103
                    echo "
                    </div>
                </div>

                ";
                }
                // line 108
                echo "                ";
            }
            // line 109
            echo "                ";
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
        // line 110
        echo "            </div>
        </div>
";
    }

    public function getTemplateName()
    {
        return "temporada/__content/__part/eliminatorioPartidos.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  308 => 110,  294 => 109,  291 => 108,  284 => 103,  281 => 102,  279 => 101,  275 => 99,  272 => 98,  270 => 97,  267 => 96,  264 => 95,  261 => 94,  259 => 93,  256 => 92,  252 => 90,  250 => 89,  247 => 88,  245 => 87,  241 => 85,  233 => 80,  228 => 77,  225 => 76,  222 => 75,  219 => 74,  216 => 73,  213 => 72,  210 => 71,  205 => 68,  199 => 66,  197 => 65,  190 => 60,  185 => 57,  181 => 55,  179 => 54,  175 => 52,  169 => 50,  167 => 49,  162 => 46,  160 => 45,  157 => 44,  150 => 40,  146 => 38,  144 => 37,  140 => 35,  138 => 34,  135 => 33,  132 => 32,  130 => 31,  127 => 30,  125 => 29,  122 => 28,  119 => 27,  116 => 26,  114 => 25,  110 => 23,  107 => 22,  104 => 21,  101 => 20,  99 => 19,  96 => 18,  93 => 17,  90 => 16,  87 => 15,  85 => 14,  82 => 13,  79 => 12,  77 => 11,  74 => 10,  57 => 9,  54 => 8,  52 => 7,  49 => 6,  46 => 5,  43 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "temporada/__content/__part/eliminatorioPartidos.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/temporada/__content/__part/eliminatorioPartidos.html.twig");
    }
}
