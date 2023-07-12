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

/* noticias/index.html.twig */
class __TwigTemplate_587e7b144581e26884d1b18b5d41855a70478971feb219625e69abb2f2fab073 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "noticias/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "noticias/index.html.twig"));

        $this->parent = $this->loadTemplate("base_template/universal-panel.html.twig", "noticias/index.html.twig", 1);
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

        echo "Noticias";
        
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
    <div class=\"row\" style=\"margin-bottom: 30px;\">
        <div class=\"col-12\">
            <a class=\"btn btn-success\" href=\"";
        // line 8
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("noticias_new");
        echo "\">Crear noticia</a>
        </div>
    </div>

    <table class=\"table\">
        <thead>
            <tr>
                <th>Id</th>
                <th>Titulo</th>
                ";
        // line 18
        echo "                <th>Fecha</th>
                ";
        // line 20
        echo "                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        ";
        // line 24
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["noticias"]) || array_key_exists("noticias", $context) ? $context["noticias"] : (function () { throw new RuntimeError('Variable "noticias" does not exist.', 24, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["noticia"]) {
            // line 25
            echo "            <tr>
                <td>";
            // line 26
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["noticia"], "id", [], "any", false, false, false, 26), "html", null, true);
            echo "</td>
                <td>";
            // line 27
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["noticia"], "titulo", [], "any", false, false, false, 27), "html", null, true);
            echo "</td>
                ";
            // line 29
            echo "                <td>";
            ((twig_get_attribute($this->env, $this->source, $context["noticia"], "fecha", [], "any", false, false, false, 29)) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["noticia"], "fecha", [], "any", false, false, false, 29), "d/m/Y H:i:s"), "html", null, true))) : (print ("")));
            echo "</td>
                ";
            // line 31
            echo "                <td>
                    ";
            // line 36
            echo "                    <a href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("noticias_edit", ["id" => twig_get_attribute($this->env, $this->source, $context["noticia"], "id", [], "any", false, false, false, 36)]), "html", null, true);
            echo "\">Editar</a>
                </td>
            </tr>
        ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 40
            echo "            <tr>
                <td colspan=\"5\">No se han encontrado noticias</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['noticia'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 44
        echo "        </tbody>
    </table>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "noticias/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  157 => 44,  148 => 40,  138 => 36,  135 => 31,  130 => 29,  126 => 27,  122 => 26,  119 => 25,  114 => 24,  108 => 20,  105 => 18,  93 => 8,  88 => 5,  78 => 4,  59 => 2,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base_template/universal-panel.html.twig\" %}
{% block title %}Noticias{% endblock %}

{% block mainBody %}

    <div class=\"row\" style=\"margin-bottom: 30px;\">
        <div class=\"col-12\">
            <a class=\"btn btn-success\" href=\"{{ path('noticias_new') }}\">Crear noticia</a>
        </div>
    </div>

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
            <tr>
                <td>{{ noticia.id }}</td>
                <td>{{ noticia.titulo }}</td>
                {# <td>{{ noticia.descripcion }}</td> #}
                <td>{{ noticia.fecha ? noticia.fecha|date('d/m/Y H:i:s') : '' }}</td>
                {# <td>{{ noticia.estado }}</td> #}
                <td>
                    {#
                    <a href=\"{{ path('noticias_show', {'id': noticia.id}) }}\">Ver</a>
                    |
                    #}
                    <a href=\"{{ path('noticias_edit', {'id': noticia.id}) }}\">Editar</a>
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
", "noticias/index.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.eu/panel/templates/noticias/index.html.twig");
    }
}
