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

/* equipo/equipoSeleccion.html.twig */
class __TwigTemplate_e28267323aa78b04e695bbf7ef292c3269e00212ac6e30e05c2e56645d600c7e extends Template
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
    <div class=\"row contenedorBlancoBordesRedondeadosConPadding\">
        <div class=\"col-3\">
            <img src=\"/static/img/paises/banderas/ban";
        // line 4
        echo twig_escape_filter($this->env, ($context["pais_id"] ?? null), "html", null, true);
        echo ".png\" class=\"img-rounded\">
        </div>
        <div class=\"col-9\">
            <h1>";
        // line 7
        echo twig_escape_filter($this->env, ($context["equipotxt"] ?? null), "html", null, true);
        echo "</h1>
            <h2 class=\"subtitulo\">";
        // line 8
        echo twig_escape_filter($this->env, ($context["categoriatxt"] ?? null), "html", null, true);
        echo "</h2>
        </div>
    </div>
</div>

";
        // line 13
        $context["torneoDestacado"] = 238;
        // line 14
        $context["ePartidos"] = call_user_func_array($this->env->getFunction('XequipoPartidos')->getCallable(), [($context["equipo_id"] ?? null)]);
        // line 15
        echo "
";
        // line 16
        $context["torneos"] = [];
        // line 17
        $context["porTorneos"] = [];
        // line 18
        echo "
";
        // line 19
        if (1 === twig_compare(twig_length_filter($this->env, ($context["ePartidos"] ?? null)), 0)) {
            // line 20
            echo "
    ";
            // line 21
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["ePartidos"] ?? null), "partidos", [], "any", false, false, false, 21));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 22
                echo "        ";
                $context["torneos"] = call_user_func_array($this->env->getFunction('anadirAArrayKeyDoble')->getCallable(), [($context["torneos"] ?? null), twig_get_attribute($this->env, $this->source, $context["value"], "temporada_id", [], "any", false, false, false, 22), "tipo_torneo", twig_get_attribute($this->env, $this->source, $context["value"], "tipo_torneo", [], "any", false, false, false, 22)]);
                // line 23
                echo "        ";
                $context["torneos"] = call_user_func_array($this->env->getFunction('anadirAArrayKeyDoble')->getCallable(), [($context["torneos"] ?? null), twig_get_attribute($this->env, $this->source, $context["value"], "temporada_id", [], "any", false, false, false, 23), "nombreTorneo", twig_get_attribute($this->env, $this->source, $context["value"], "nombreTorneo", [], "any", false, false, false, 23)]);
                // line 24
                echo "        ";
                $context["porTorneos"] = call_user_func_array($this->env->getFunction('anadirAArrayKeyDoble')->getCallable(), [($context["porTorneos"] ?? null), twig_get_attribute($this->env, $this->source, $context["value"], "temporada_id", [], "any", false, false, false, 24), twig_get_attribute($this->env, $this->source, $context["value"], "id", [], "any", false, false, false, 24), $context["value"]]);
                // line 25
                echo "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 26
            echo "
";
        }
        // line 28
        echo "


";
        // line 31
        if (1 === twig_compare(twig_length_filter($this->env, ($context["torneos"] ?? null)), 0)) {
            // line 32
            echo "
    <div class=\"tab-content\">
        ";
            // line 34
            $context["contador"] = 0;
            // line 35
            echo "        ";
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
            foreach ($context['_seq'] as $context["key1"] => $context["value"]) {
                // line 36
                echo "
            ";
                // line 37
                if (0 !== twig_compare($context["key1"], 231)) {
                    // line 38
                    echo "                <div class=\"panel panel-default\">

                    ";
                    // line 40
                    $context["urlTorneo"] = $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("torneo_index", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,                     // line 41
$context["value"], "nombreTorneo", [], "any", false, false, false, 41), 0, [], "any", false, false, false, 41)]), "idTorneo" =>                     // line 42
$context["key1"]]);
                    // line 44
                    echo "
                    <div class=\"row\">
                        <div class=\"col-12 nombreDiaPartido\" style=\"line-height: 30px; clear: both;\">
                            <a style=\"color: #212529;\" class=\"boldfont pull-right\" href=\"";
                    // line 47
                    echo twig_escape_filter($this->env, ($context["urlTorneo"] ?? null), "html", null, true);
                    echo "\">Ir a ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["value"], "nombreTorneo", [], "any", false, false, false, 47), 0, [], "any", false, false, false, 47), "html", null, true);
                    echo "</a>
                        </div>
                    </div>

                    ";
                    // line 51
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["porTorneos"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4[$context["key1"]] ?? null) : null));
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
                    foreach ($context['_seq'] as $context["k"] => $context["partidos"]) {
                        // line 52
                        echo "                        ";
                        $context["idt"] = $context["key1"];
                        // line 53
                        echo "                        ";
                        $context["pagina"] = "seleccion";
                        // line 54
                        echo "
                        ";
                        // line 55
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($context["partidos"]);
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
                        foreach ($context['_seq'] as $context["_key"] => $context["partido"]) {
                            // line 56
                            echo "                            ";
                            $context["partido"] = call_user_func_array($this->env->getFunction('prepararPartido')->getCallable(), [$context["partido"]]);
                            // line 57
                            echo "                            ";
                            $this->loadTemplate("index/__part/filaPartido.html.twig", "equipo/equipoSeleccion.html.twig", 57)->display($context);
                            // line 58
                            echo "                        ";
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
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['partido'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 59
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
                    unset($context['_seq'], $context['_iterated'], $context['k'], $context['partidos'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 61
                    echo "
                </div>
            ";
                }
                // line 64
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
            unset($context['_seq'], $context['_iterated'], $context['key1'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 66
            echo "    </div>

";
        }
    }

    public function getTemplateName()
    {
        return "equipo/equipoSeleccion.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  258 => 66,  243 => 64,  238 => 61,  223 => 59,  209 => 58,  206 => 57,  203 => 56,  186 => 55,  183 => 54,  180 => 53,  177 => 52,  160 => 51,  151 => 47,  146 => 44,  144 => 42,  143 => 41,  142 => 40,  138 => 38,  136 => 37,  133 => 36,  115 => 35,  113 => 34,  109 => 32,  107 => 31,  102 => 28,  98 => 26,  92 => 25,  89 => 24,  86 => 23,  83 => 22,  79 => 21,  76 => 20,  74 => 19,  71 => 18,  69 => 17,  67 => 16,  64 => 15,  62 => 14,  60 => 13,  52 => 8,  48 => 7,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "equipo/equipoSeleccion.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/equipo/equipoSeleccion.html.twig");
    }
}
