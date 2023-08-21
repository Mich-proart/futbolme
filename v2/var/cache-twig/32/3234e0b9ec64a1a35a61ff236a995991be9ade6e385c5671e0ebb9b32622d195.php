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

/* temporada/__content/eliminatorioCorto.html.twig */
class __TwigTemplate_0ff2d8c7df503b6228be89d99d452f58c2ac8bc390364c27d72bd11cbb630676 extends Template
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
        echo "<div class=\"col-12\">
    <div class=\"row\">
        <div class=\"col-12\" style=\"padding: 0px;\">
            ";
        // line 4
        $context["promocion"] = 0;
        // line 5
        echo "
            ";
        // line 6
        if (1 === twig_compare(($context["c_directos"] ?? null), 0)) {
            // line 7
            echo "                <div class=\"row\">
                    <div class=\"col-12\">
                    <span class=\"actua pull-right badge\" style=\"font-weight:100;\">
                        Actualizado a las ";
            // line 10
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, call_user_func_array($this->env->getFunction('hoyDateTime')->getCallable(), []), "H:i:s"), "html", null, true);
            echo "
                    </span>

                        ";
            // line 13
            $this->loadTemplate("index/__part/contenidoDirecto.html.twig", "temporada/__content/eliminatorioCorto.html.twig", 13)->display($context);
            // line 14
            echo "
                    </div>
                </div>
            ";
        }
        // line 18
        echo "        </div>
    </div>

    ";
        // line 24
        echo "
    ";
        // line 25
        $this->loadTemplate("publicidad/cuerpo03.html.twig", "temporada/__content/eliminatorioCorto.html.twig", 25)->display($context);
        // line 26
        echo "
    ";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["fasesSQL"] ?? null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
            // line 28
            echo "        ";
            if (1 === twig_compare(twig_length_filter($this->env, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["partidos"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4[twig_get_attribute($this->env, $this->source, $context["value"], "fase_id", [], "any", false, false, false, 28)] ?? null) : null)), 0)) {
                // line 29
                echo "
            <div class=\"row\">
                <div class=\"col-12 nombreDiaPartido\">
                    ";
                // line 32
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["value"], "nombre", [], "any", false, false, false, 32), "html", null, true);
                echo "
                </div>
            </div>

        ";
            }
            // line 37
            echo "
        ";
            // line 38
            if (0 !== twig_compare(twig_get_attribute($this->env, $this->source, $context["value"], "tipo_eliminatoria", [], "any", false, false, false, 38), 3)) {
                // line 39
                echo "
            ";
                // line 40
                $context["f"] = "";
                // line 41
                echo "            ";
                $context["colorFila"] = "white";
                // line 42
                echo "            ";
                $context["j"] = 0;
                // line 43
                echo "
            ";
                // line 44
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = ($context["partidos"] ?? null)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144[twig_get_attribute($this->env, $this->source, $context["value"], "fase_id", [], "any", false, false, false, 44)] ?? null) : null));
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
                    // line 45
                    echo "                ";
                    if (twig_get_attribute($this->env, $this->source, $context["partido"], "id", [], "any", true, true, false, 45)) {
                        // line 46
                        echo "                    ";
                        $context["colorL"] = "";
                        // line 47
                        echo "                    ";
                        if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "local", [], "any", false, false, false, 47), "España")) {
                            // line 48
                            echo "                        ";
                            $context["colorL"] = "background-color:#F4FA58";
                            // line 49
                            echo "                    ";
                        }
                        // line 50
                        echo "
                    ";
                        // line 51
                        $context["colorV"] = "";
                        // line 52
                        echo "                    ";
                        if (0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "visitante", [], "any", false, false, false, 52), "España")) {
                            // line 53
                            echo "                        ";
                            $context["colorV"] = "background-color:#F4FA58";
                            // line 54
                            echo "                    ";
                        }
                        // line 55
                        echo "
                    ";
                        // line 56
                        $context["coletilla"] = "";
                        // line 57
                        echo "
                    ";
                        // line 58
                        $context["enlace_partido"] = twig_get_attribute($this->env, $this->source, $context["partido"], "pgPartido", [], "any", false, false, false, 58);
                        // line 59
                        echo "
                    ";
                        // line 60
                        $context["enlace_local"] = twig_get_attribute($this->env, $this->source, $context["partido"], "pgLocal", [], "any", false, false, false, 60);
                        // line 61
                        echo "                    ";
                        $context["enlace_visitante"] = twig_get_attribute($this->env, $this->source, $context["partido"], "pgVisitante", [], "any", false, false, false, 61);
                        // line 62
                        echo "
                    ";
                        // line 63
                        $context["hora_prevista"] = twig_get_attribute($this->env, $this->source, $context["partido"], "hora_prevista", [], "any", false, false, false, 63);
                        // line 64
                        echo "

                    ";
                        // line 66
                        if ((0 === twig_compare(($context["valorJornada"] ?? null), 0) && 0 !== twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "jornada", [], "any", false, false, false, 66), ($context["j"] ?? null)))) {
                            // line 67
                            echo "                        <div class=\"row\">
                            <div class=\"col-12 nombreDiaPartido\">
                                ";
                            // line 69
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["partido"], "fase", [], "any", false, false, false, 69), "html", null, true);
                            echo "
                            </div>
                        </div>
                    ";
                        }
                        // line 73
                        echo "
                    <div class=\"row\">
                        <div class=\"col-12\" style=\"padding: 0px;\">
                            ";
                        // line 76
                        $this->loadTemplate("index/__part/filaPartido.html.twig", "temporada/__content/eliminatorioCorto.html.twig", 76)->display($context);
                        // line 77
                        echo "                        </div>
                    </div>

                    ";
                        // line 80
                        $context["f"] = twig_get_attribute($this->env, $this->source, $context["partido"], "fecha", [], "any", false, false, false, 80);
                        // line 81
                        echo "                    ";
                        $context["j"] = twig_get_attribute($this->env, $this->source, $context["partido"], "jornada", [], "any", false, false, false, 81);
                        // line 82
                        echo "
                ";
                    }
                    // line 84
                    echo "            ";
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
                // line 85
                echo "
        ";
            } else {
                // line 87
                echo "
            ";
                // line 88
                $context["p"] = [];
                // line 89
                echo "
            ";
                // line 90
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = ($context["partidos"] ?? null)) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b[twig_get_attribute($this->env, $this->source, $context["value"], "fase_id", [], "any", false, false, false, 90)] ?? null) : null));
                foreach ($context['_seq'] as $context["key"] => $context["partido"]) {
                    // line 91
                    echo "                ";
                    $context["p"] = call_user_func_array($this->env->getFunction('anadirAArrayKeyDoble')->getCallable(), [($context["p"] ?? null), twig_get_attribute($this->env, $this->source, $context["partido"], "jornada", [], "any", false, false, false, 91), twig_get_attribute($this->env, $this->source, $context["partido"], "grupo_id", [], "any", false, false, false, 91), $context["partido"]]);
                    // line 92
                    echo "            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['partido'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 93
                echo "
            ";
                // line 94
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["grupos"] ?? null));
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
                foreach ($context['_seq'] as $context["fase"] => $context["gruposFase"]) {
                    // line 95
                    echo "
                ";
                    // line 96
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["gruposFase"]);
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
                    foreach ($context['_seq'] as $context["id"] => $context["grupo"]) {
                        // line 97
                        echo "                    <div class=\"row\">
                        <div class=\"col-12 nombreDiaPartido\">
                            ";
                        // line 99
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["grupo"], "nombre", [], "any", false, false, false, 99), "html", null, true);
                        echo "
                        </div>
                    </div>

                    ";
                        // line 103
                        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["p"] ?? null), $context["fase"], [], "array", false, true, false, 103), $context["id"], [], "array", true, true, false, 103)) {
                            // line 104
                            echo "
                        ";
                            // line 105
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable((($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 = (($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 = ($context["p"] ?? null)) && is_array($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4) || $__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 instanceof ArrayAccess ? ($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4[$context["fase"]] ?? null) : null)) && is_array($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002) || $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 instanceof ArrayAccess ? ($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002[$context["id"]] ?? null) : null));
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
                                // line 106
                                echo "                            ";
                                $context["equipo_id"] = 10000;
                                // line 107
                                echo "                            ";
                                $context["partido"] = call_user_func_array($this->env->getFunction('anadirAArrayKey')->getCallable(), [$context["partido"], "nombreTorneo", ""]);
                                // line 108
                                echo "                            <div class=\"row\">
                                <div class=\"col-12\" style=\"padding: 0px;\">
                                    ";
                                // line 110
                                $this->loadTemplate("index/__part/filaPartido.html.twig", "temporada/__content/eliminatorioCorto.html.twig", 110)->display($context);
                                // line 111
                                echo "                                </div>
                            </div>
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
                            // line 114
                            echo "
                        <div class=\"row\">
                            <div class=\"col-12\" style=\"height: 35px;\">

                            </div>
                        </div>

                        ";
                            // line 121
                            $context["clasificacionGrupo"] = call_user_func_array($this->env->getFunction('X2generarClasificacion')->getCallable(), [($context["temporada_id"] ?? null), 2, $context["fase"], $context["id"]]);
                            // line 122
                            echo "

                        ";
                            // line 124
                            $this->loadTemplate("temporada/__content/__part/eliminatorioClasificacion.html.twig", "temporada/__content/eliminatorioCorto.html.twig", 124)->display($context);
                            // line 125
                            echo "
                    ";
                        }
                        // line 127
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
                    unset($context['_seq'], $context['_iterated'], $context['id'], $context['grupo'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 129
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
                unset($context['_seq'], $context['_iterated'], $context['fase'], $context['gruposFase'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 131
                echo "

        ";
            }
            // line 134
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 135
        echo "

    ";
        // line 137
        $context["equiposTw2"] = [];
        // line 138
        echo "
    ";
        // line 139
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["equiposEnJuego"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
            // line 140
            echo "        ";
            $context["break"] = 0;
            // line 141
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["equiposTw"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["v"]) {
                // line 142
                echo "            ";
                if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["v"], "id", [], "any", false, false, false, 142), $context["value"]) &&  !($context["break"] ?? null))) {
                    // line 143
                    echo "                ";
                    $context["equiposTw2"] = call_user_func_array($this->env->getFunction('anadirAArray')->getCallable(), [($context["equiposTw2"] ?? null), $context["v"]]);
                    // line 144
                    echo "                ";
                    $context["break"] = 1;
                    // line 145
                    echo "            ";
                }
                // line 146
                echo "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['v'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 147
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 148
        echo "
    ";
        // line 149
        $context["equiposTw"] = ($context["equiposTw2"] ?? null);
        // line 150
        echo "
    ";
        // line 151
        if ((isset($context["equiposTw"]) || array_key_exists("equiposTw", $context))) {
            // line 152
            echo "        ";
            $context["filtro"] = 0;
            // line 153
            echo "        ";
            $this->loadTemplate("__part/pesLeerTwitsPortada.html.twig", "temporada/__content/eliminatorioCorto.html.twig", 153)->display($context);
            // line 154
            echo "    ";
        }
        // line 155
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "temporada/__content/eliminatorioCorto.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  514 => 155,  511 => 154,  508 => 153,  505 => 152,  503 => 151,  500 => 150,  498 => 149,  495 => 148,  489 => 147,  483 => 146,  480 => 145,  477 => 144,  474 => 143,  471 => 142,  466 => 141,  463 => 140,  459 => 139,  456 => 138,  454 => 137,  450 => 135,  436 => 134,  431 => 131,  416 => 129,  401 => 127,  397 => 125,  395 => 124,  391 => 122,  389 => 121,  380 => 114,  364 => 111,  362 => 110,  358 => 108,  355 => 107,  352 => 106,  335 => 105,  332 => 104,  330 => 103,  323 => 99,  319 => 97,  302 => 96,  299 => 95,  282 => 94,  279 => 93,  273 => 92,  270 => 91,  266 => 90,  263 => 89,  261 => 88,  258 => 87,  254 => 85,  240 => 84,  236 => 82,  233 => 81,  231 => 80,  226 => 77,  224 => 76,  219 => 73,  212 => 69,  208 => 67,  206 => 66,  202 => 64,  200 => 63,  197 => 62,  194 => 61,  192 => 60,  189 => 59,  187 => 58,  184 => 57,  182 => 56,  179 => 55,  176 => 54,  173 => 53,  170 => 52,  168 => 51,  165 => 50,  162 => 49,  159 => 48,  156 => 47,  153 => 46,  150 => 45,  133 => 44,  130 => 43,  127 => 42,  124 => 41,  122 => 40,  119 => 39,  117 => 38,  114 => 37,  106 => 32,  101 => 29,  98 => 28,  81 => 27,  78 => 26,  76 => 25,  73 => 24,  68 => 18,  62 => 14,  60 => 13,  54 => 10,  49 => 7,  47 => 6,  44 => 5,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "temporada/__content/eliminatorioCorto.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/temporada/__content/eliminatorioCorto.html.twig");
    }
}
