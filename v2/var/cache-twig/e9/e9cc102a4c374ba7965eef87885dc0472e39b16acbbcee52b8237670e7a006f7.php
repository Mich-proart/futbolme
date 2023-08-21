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

/* temporada/__content/__part/pesGoleadores.html.twig */
class __TwigTemplate_68c9db529f93b38c36f6f8bd51860a995a4b9fc533db45e470cae7f6503142fd extends Template
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
        echo "<div class=\"col-12 table-responsive\">

    <div style=\"margin-top: 10px;\" class=\"row\">
        <div class=\"col-12 small\">

            <strong>Nota de interés.</strong>
            En caso de que algún partido sea anulado por alineación indebida, los goleadores de ese encuentro no serán contabilizados en la clasificación del pichichi.

        </div>
    </div>

    <table style=\"margin-top: 10px;\" id=\"goleadores\" class=\"table table-condensed contenedorBlancoBordesRedondeadosConPadding\">
        <thead>
            <tr>
                <th></th>
                <th>Jugador</th>
                <th>Equipo</th>
                <th>Goles</th>
            </tr>
        </thead>
        <tbody>
            ";
        // line 22
        $context["golMax"] = 0;
        // line 23
        echo "            ";
        $context["contador"] = 1;
        // line 24
        echo "
            ";
        // line 25
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["goleadores"] ?? null));
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
        foreach ($context['_seq'] as $context["key"] => $context["fila"]) {
            // line 26
            echo "                ";
            $context["continue"] = false;
            // line 27
            echo "
                ";
            // line 28
            $context["fmJugador"] = twig_get_attribute($this->env, $this->source, $context["fila"], "jugador_id", [], "any", false, false, false, 28);
            // line 29
            echo "                ";
            if (0 === twig_compare(($context["fmJugador"] ?? null), 0)) {
                // line 30
                echo "                    ";
                $context["fila"] = twig_array_merge($context["fila"], ["jugador" => twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["fila"], "jugador", [], "any", false, false, false, 30), ["(pen.)" => ""])]);
                // line 33
                echo "
                    ";
                // line 34
                if (1 === twig_compare(($context["pos"] ?? null), 0)) {
                    // line 35
                    echo "                        ";
                    $context["continue"] = true;
                    // line 36
                    echo "                    ";
                }
                // line 37
                echo "                ";
            }
            // line 38
            echo "
                ";
            // line 39
            if ( !($context["continue"] ?? null)) {
                // line 40
                echo "
                    ";
                // line 41
                if (0 === twig_compare($context["key"], 10)) {
                    // line 42
                    echo "                        <tr class=\"fila-goleadores\">
                            <td colspan=\"4\">
                                ";
                    // line 44
                    $this->loadTemplate("publicidad/cuerpo04.html.twig", "temporada/__content/__part/pesGoleadores.html.twig", 44)->display($context);
                    // line 45
                    echo "                            </td>
                        </tr>

                    ";
                }
                // line 49
                echo "

                    ";
                // line 51
                if (((isset($context["equipo_id"]) || array_key_exists("equipo_id", $context)) && 0 === twig_compare(($context["equipo_id"] ?? null), twig_get_attribute($this->env, $this->source, $context["fila"], "equipo_id", [], "any", false, false, false, 51)))) {
                    // line 52
                    echo "                        <tr bgcolor='gainsboro'>
                    ";
                } else {
                    // line 54
                    echo "                        <tr>
                    ";
                }
                // line 56
                echo "
                    <td class=\"text-center\">
                        <strong>";
                // line 58
                echo twig_escape_filter($this->env, ($context["contador"] ?? null), "html", null, true);
                echo "</strong>
                    </td>
                    <td class=\"text-left boldfont\">
                        ";
                // line 61
                if (0 === twig_compare(($context["fmJugador"] ?? null), 0)) {
                    // line 62
                    echo "                            <a href=\"/jugadorint.php?j=";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "jugador", [], "any", false, false, false, 62), "html", null, true);
                    echo "&e=";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "equipo_id", [], "any", false, false, false, 62), "html", null, true);
                    echo "&eq=";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "equipoCorto", [], "any", false, false, false, 62), "html", null, true);
                    echo "\">
                                ";
                    // line 63
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "jugador", [], "any", false, false, false, 63), "html", null, true);
                    echo "
                            </a>
                        ";
                } else {
                    // line 66
                    echo "                            <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("jugador_url_nombre", ["id" => twig_get_attribute($this->env, $this->source,                     // line 67
$context["fila"], "jugador_id", [], "any", false, false, false, 67), "slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,                     // line 68
$context["fila"], "jugador", [], "any", false, false, false, 68)])]), "html", null, true);
                    // line 69
                    echo "\">
                                ";
                    // line 70
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "jugador", [], "any", false, false, false, 70), "html", null, true);
                    echo "
                            </a>
                        ";
                }
                // line 73
                echo "                    </td>
                    <td class=\"text-left\">
                        <a href=\"";
                // line 75
                echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("equipo_index", ["idEquipo" => twig_get_attribute($this->env, $this->source,                 // line 76
$context["fila"], "equipo_id", [], "any", false, false, false, 76), "slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,                 // line 77
$context["fila"], "equipo", [], "any", false, false, false, 77)])]), "html", null, true);
                // line 78
                echo "\">
                            ";
                // line 79
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "equipoCorto", [], "any", false, false, false, 79), "html", null, true);
                echo "
                        </a>
                    </td>
                    <td class=\"text-center boldfont\">
                        ";
                // line 83
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "goles", [], "any", false, false, false, 83), "html", null, true);
                echo "
                    </td>


                ";
            }
            // line 88
            echo "
                ";
            // line 89
            $context["contador"] = (($context["contador"] ?? null) + 1);
            // line 90
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
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['fila'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 92
        echo "        </tbody>
    </table>
</div>";
    }

    public function getTemplateName()
    {
        return "temporada/__content/__part/pesGoleadores.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  236 => 92,  221 => 90,  219 => 89,  216 => 88,  208 => 83,  201 => 79,  198 => 78,  196 => 77,  195 => 76,  194 => 75,  190 => 73,  184 => 70,  181 => 69,  179 => 68,  178 => 67,  176 => 66,  170 => 63,  161 => 62,  159 => 61,  153 => 58,  149 => 56,  145 => 54,  141 => 52,  139 => 51,  135 => 49,  129 => 45,  127 => 44,  123 => 42,  121 => 41,  118 => 40,  116 => 39,  113 => 38,  110 => 37,  107 => 36,  104 => 35,  102 => 34,  99 => 33,  96 => 30,  93 => 29,  91 => 28,  88 => 27,  85 => 26,  68 => 25,  65 => 24,  62 => 23,  60 => 22,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "temporada/__content/__part/pesGoleadores.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/temporada/__content/__part/pesGoleadores.html.twig");
    }
}
