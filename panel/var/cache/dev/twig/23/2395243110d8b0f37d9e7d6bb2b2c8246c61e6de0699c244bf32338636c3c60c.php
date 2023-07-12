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

/* noticias/administrar.html.twig */
class __TwigTemplate_e848d53e8e925db16d015b5599af7dc3c21f62c40fd5d6057a68253a5883ba9d extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'mainBody' => [$this, 'block_mainBody'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base_template/universal-panel.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "noticias/administrar.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "noticias/administrar.html.twig"));

        $this->parent = $this->loadTemplate("base_template/universal-panel.html.twig", "noticias/administrar.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Administrar Noticias";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 4
    public function block_mainBody($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "mainBody"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "mainBody"));

        // line 5
        echo "
    <table class=\"table\">
        <thead>
        <tr>
            <th>Id</th>
            <th>Titulo</th>
            ";
        // line 12
        echo "            <th>Fecha</th>
            ";
        // line 14
        echo "            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["noticias"]) || array_key_exists("noticias", $context) ? $context["noticias"] : (function () { throw new RuntimeError('Variable "noticias" does not exist.', 18, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["noticia"]) {
            // line 19
            echo "            ";
            $context["color"] = "";
            // line 20
            echo "            <tr
                style=\"
                    ";
            // line 22
            if ((twig_get_attribute($this->env, $this->source, $context["noticia"], "estado", [], "any", false, false, false, 22) ==  -1)) {
                // line 23
                echo "                        background: #FF4E50;
                        ";
                // line 24
                $context["color"] = "#FFFFFF";
                // line 25
                echo "                    ";
            } elseif ((twig_get_attribute($this->env, $this->source, $context["noticia"], "estado", [], "any", false, false, false, 25) == 0)) {
                // line 26
                echo "                        background: orange;
                        ";
                // line 27
                $context["color"] = "#333333";
                // line 28
                echo "                    ";
            } elseif ((twig_get_attribute($this->env, $this->source, $context["noticia"], "estado", [], "any", false, false, false, 28) == 1)) {
                // line 29
                echo "                        background: #1D976C;
                        ";
                // line 30
                $context["color"] = "#FFFFFF";
                // line 31
                echo "                    ";
            }
            // line 32
            echo "                \"
            >
                <td style=\"color: ";
            // line 34
            echo twig_escape_filter($this->env, (isset($context["color"]) || array_key_exists("color", $context) ? $context["color"] : (function () { throw new RuntimeError('Variable "color" does not exist.', 34, $this->source); })()), "html", null, true);
            echo ";\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["noticia"], "id", [], "any", false, false, false, 34), "html", null, true);
            echo "</td>
                <td style=\"color: ";
            // line 35
            echo twig_escape_filter($this->env, (isset($context["color"]) || array_key_exists("color", $context) ? $context["color"] : (function () { throw new RuntimeError('Variable "color" does not exist.', 35, $this->source); })()), "html", null, true);
            echo ";\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["noticia"], "titulo", [], "any", false, false, false, 35), "html", null, true);
            echo "</td>
                ";
            // line 37
            echo "                <td style=\"color: ";
            echo twig_escape_filter($this->env, (isset($context["color"]) || array_key_exists("color", $context) ? $context["color"] : (function () { throw new RuntimeError('Variable "color" does not exist.', 37, $this->source); })()), "html", null, true);
            echo ";\">";
            ((twig_get_attribute($this->env, $this->source, $context["noticia"], "fecha", [], "any", false, false, false, 37)) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["noticia"], "fecha", [], "any", false, false, false, 37), "d/m/Y H:i:s"), "html", null, true))) : (print ("")));
            echo "</td>
                ";
            // line 39
            echo "                <td style=\"color: ";
            echo twig_escape_filter($this->env, (isset($context["color"]) || array_key_exists("color", $context) ? $context["color"] : (function () { throw new RuntimeError('Variable "color" does not exist.', 39, $this->source); })()), "html", null, true);
            echo ";\">
                    ";
            // line 44
            echo "                    <a style=\"color: ";
            echo twig_escape_filter($this->env, (isset($context["color"]) || array_key_exists("color", $context) ? $context["color"] : (function () { throw new RuntimeError('Variable "color" does not exist.', 44, $this->source); })()), "html", null, true);
            echo ";\" href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("revisar_noticias", ["id" => twig_get_attribute($this->env, $this->source, $context["noticia"], "id", [], "any", false, false, false, 44)]), "html", null, true);
            echo "\">Revisar</a>
                </td>
            </tr>
        ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 48
            echo "            <tr>
                <td colspan=\"5\">No se han encontrado noticias</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['noticia'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 52
        echo "        </tbody>
    </table>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "noticias/administrar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  192 => 52,  183 => 48,  171 => 44,  166 => 39,  159 => 37,  153 => 35,  147 => 34,  143 => 32,  140 => 31,  138 => 30,  135 => 29,  132 => 28,  130 => 27,  127 => 26,  124 => 25,  122 => 24,  119 => 23,  117 => 22,  113 => 20,  110 => 19,  105 => 18,  99 => 14,  96 => 12,  88 => 5,  78 => 4,  59 => 2,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base_template/universal-panel.html.twig\" %}
{% block title %}Administrar Noticias{% endblock %}

{% block mainBody %}

    <table class=\"table\">
        <thead>
        <tr>
            <th>Id</th>
            <th>Titulo</th>
            {# <th>Descripcion</th> #}
            <th>Fecha</th>
            {# <th>Estado</th> #}
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        {% for noticia in noticias %}
            {% set color = '' %}
            <tr
                style=\"
                    {% if noticia.estado == -1 %}
                        background: #FF4E50;
                        {% set color = '#FFFFFF' %}
                    {% elseif noticia.estado == 0 %}
                        background: orange;
                        {% set color = '#333333' %}
                    {% elseif noticia.estado == 1 %}
                        background: #1D976C;
                        {% set color = '#FFFFFF' %}
                    {% endif %}
                \"
            >
                <td style=\"color: {{ color }};\">{{ noticia.id }}</td>
                <td style=\"color: {{ color }};\">{{ noticia.titulo }}</td>
                {# <td>{{ noticia.descripcion }}</td> #}
                <td style=\"color: {{ color }};\">{{ noticia.fecha ? noticia.fecha|date('d/m/Y H:i:s') : '' }}</td>
                {# <td>{{ noticia.estado }}</td> #}
                <td style=\"color: {{ color }};\">
                    {#
                    <a href=\"{{ path('noticias_show', {'id': noticia.id}) }}\">Ver</a>
                    |
                    #}
                    <a style=\"color: {{ color }};\" href=\"{{ path('revisar_noticias', {'id': noticia.id}) }}\">Revisar</a>
                </td>
            </tr>
        {% else %}
            <tr>
                <td colspan=\"5\">No se han encontrado noticias</td>
            </tr>
        {% endfor %}
        </tbody>
    </table>

{% endblock %}
", "noticias/administrar.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.eu/panel/templates/noticias/administrar.html.twig");
    }
}
