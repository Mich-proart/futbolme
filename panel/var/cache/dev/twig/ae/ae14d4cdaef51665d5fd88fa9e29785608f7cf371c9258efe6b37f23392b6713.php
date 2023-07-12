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

/* noticias/_form.html.twig */
class __TwigTemplate_db639b3afcfe32a8b65213007325d6d4bce7cfc19165ddd915ade36a0355159f extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "noticias/_form.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "noticias/_form.html.twig"));

        // line 1
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 1, $this->source); })()), 'form_start');
        echo "

    <input type=\"hidden\" id=\"url_cambio_campo_temporada\" value=\"";
        // line 3
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("noticias_cambio_campo_temporada");
        echo "\">

    <div class=\"d-none\">
        ";
        // line 6
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 6, $this->source); })()), "usuario", [], "any", false, false, false, 6), 'row');
        echo "
    </div>

    <div class=\"row\">
        <div class=\"col-12\">
            ";
        // line 11
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 11, $this->source); })()), "titulo", [], "any", false, false, false, 11), 'row');
        echo "
        </div>
    </div>

    <div class=\"row\">
        <div class=\"col-12\">
            ";
        // line 17
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 17, $this->source); })()), "descripcionCorta", [], "any", false, false, false, 17), 'row');
        echo "
        </div>
    </div>

    <div class=\"row\">
        <div class=\"col-12\">
            ";
        // line 23
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 23, $this->source); })()), "descripcion", [], "any", false, false, false, 23), 'row');
        echo "
        </div>
    </div>

    <div class=\"row\">
        <div class=\"col-6\">
            ";
        // line 29
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 29, $this->source); })()), "fecha", [], "any", false, false, false, 29), 'row');
        echo "
        </div>
        <div class=\"col-6\">
            ";
        // line 32
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 32, $this->source); })()), "temporada", [], "any", false, false, false, 32), 'row');
        echo "
        </div>
    </div>

    <div class=\"row\">
        <div class=\"col-6\">
            <div id=\"contenedorCampoPartidos\">
                ";
        // line 39
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 39, $this->source); })()), "partido", [], "any", false, false, false, 39), 'row');
        echo "
            </div>
        </div>
        <div class=\"col-6\">
            <div id=\"contenedorCampoEquipos\">
                ";
        // line 44
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 44, $this->source); })()), "equipos", [], "any", false, false, false, 44), 'row');
        echo "
            </div>
        </div>
    </div>

    <div class=\"row\">
        <div class=\"col-6\">
            ";
        // line 51
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 51, $this->source); })()), "comunidad", [], "any", false, false, false, 51), 'row');
        echo "
        </div>
        <div class=\"col-6\">
            ";
        // line 54
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 54, $this->source); })()), "division", [], "any", false, false, false, 54), 'row');
        echo "
        </div>
    </div>

    <div class=\"row\">
        <div class=\"col-6\">

        </div>
        <div class=\"col-6 ";
        // line 62
        if (!twig_in_filter("ROLE_ADMIN", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 62, $this->source); })()), "user", [], "any", false, false, false, 62), "roles", [], "any", false, false, false, 62))) {
            echo " d-none";
        }
        echo "\">
            ";
        // line 63
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 63, $this->source); })()), "posicion", [], "any", false, false, false, 63), 'row');
        echo "
        </div>
    </div>

<button style=\"margin-top: 200px; margin-bottom: 200px;\" class=\"btn btn-success btn-block\">";
        // line 67
        echo twig_escape_filter($this->env, (((isset($context["button_label"]) || array_key_exists("button_label", $context))) ? (_twig_default_filter((isset($context["button_label"]) || array_key_exists("button_label", $context) ? $context["button_label"] : (function () { throw new RuntimeError('Variable "button_label" does not exist.', 67, $this->source); })()), "Guardar noticia")) : ("Guardar noticia")), "html", null, true);
        echo "</button>
";
        // line 68
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 68, $this->source); })()), 'form_end');
        echo "


<script src=\"https://cdn.tiny.cloud/1/19zd7p7vtknhuabp6t9luepr21o7okuaowymhu163mtaelsk/tinymce/5/tinymce.min.js\" referrerpolicy=\"origin\"></script>

<link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css\" integrity=\"sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z\" crossorigin=\"anonymous\">";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "noticias/_form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  157 => 68,  153 => 67,  146 => 63,  140 => 62,  129 => 54,  123 => 51,  113 => 44,  105 => 39,  95 => 32,  89 => 29,  80 => 23,  71 => 17,  62 => 11,  54 => 6,  48 => 3,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{ form_start(form) }}

    <input type=\"hidden\" id=\"url_cambio_campo_temporada\" value=\"{{ url('noticias_cambio_campo_temporada') }}\">

    <div class=\"d-none\">
        {{ form_row(form.usuario) }}
    </div>

    <div class=\"row\">
        <div class=\"col-12\">
            {{ form_row(form.titulo) }}
        </div>
    </div>

    <div class=\"row\">
        <div class=\"col-12\">
            {{ form_row(form.descripcionCorta) }}
        </div>
    </div>

    <div class=\"row\">
        <div class=\"col-12\">
            {{ form_row(form.descripcion) }}
        </div>
    </div>

    <div class=\"row\">
        <div class=\"col-6\">
            {{ form_row(form.fecha) }}
        </div>
        <div class=\"col-6\">
            {{ form_row(form.temporada) }}
        </div>
    </div>

    <div class=\"row\">
        <div class=\"col-6\">
            <div id=\"contenedorCampoPartidos\">
                {{ form_row(form.partido) }}
            </div>
        </div>
        <div class=\"col-6\">
            <div id=\"contenedorCampoEquipos\">
                {{ form_row(form.equipos) }}
            </div>
        </div>
    </div>

    <div class=\"row\">
        <div class=\"col-6\">
            {{ form_row(form.comunidad) }}
        </div>
        <div class=\"col-6\">
            {{ form_row(form.division) }}
        </div>
    </div>

    <div class=\"row\">
        <div class=\"col-6\">

        </div>
        <div class=\"col-6 {% if 'ROLE_ADMIN' not in app.user.roles %} d-none{% endif %}\">
            {{ form_row(form.posicion) }}
        </div>
    </div>

<button style=\"margin-top: 200px; margin-bottom: 200px;\" class=\"btn btn-success btn-block\">{{ button_label|default('Guardar noticia') }}</button>
{{ form_end(form) }}


<script src=\"https://cdn.tiny.cloud/1/19zd7p7vtknhuabp6t9luepr21o7okuaowymhu163mtaelsk/tinymce/5/tinymce.min.js\" referrerpolicy=\"origin\"></script>

<link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css\" integrity=\"sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z\" crossorigin=\"anonymous\">", "noticias/_form.html.twig", "/home/futbolme/domains/futbolme.com/public_html/panel/templates/noticias/_form.html.twig");
    }
}
