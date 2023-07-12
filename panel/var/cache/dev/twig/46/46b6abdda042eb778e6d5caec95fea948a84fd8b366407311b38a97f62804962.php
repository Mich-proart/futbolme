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

/* noticias/_form_revisar.html.twig */
class __TwigTemplate_1feae75b60e52ccf392ede8ee62889663a6805f3bf1ed45d7ac4ba509c4112b1 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "noticias/_form_revisar.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "noticias/_form_revisar.html.twig"));

        // line 1
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 1, $this->source); })()), 'form_start');
        echo "

    <input type=\"hidden\" id=\"url_cambio_campo_temporada\" value=\"";
        // line 3
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("noticias_cambio_campo_temporada");
        echo "\">

    <div class=\"row\">
        <div class=\"col-6\">
            ";
        // line 7
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 7, $this->source); })()), "usuario", [], "any", false, false, false, 7), 'row');
        echo "
        </div>
    </div>

    <div class=\"row\">
        <div class=\"col-12\">
            ";
        // line 13
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 13, $this->source); })()), "titulo", [], "any", false, false, false, 13), 'row');
        echo "
        </div>
    </div>

    <div class=\"row\">
        <div class=\"col-12\">
            <label for=\"\">Código HTML descripción corta</label><br />
            <p style=\"margin-bottom: 50px;\">";
        // line 20
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["noticia"]) || array_key_exists("noticia", $context) ? $context["noticia"] : (function () { throw new RuntimeError('Variable "noticia" does not exist.', 20, $this->source); })()), "descripcionCorta", [], "any", false, false, false, 20), "html", null, true);
        echo "</p>
            ";
        // line 21
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 21, $this->source); })()), "descripcionCorta", [], "any", false, false, false, 21), 'row');
        echo "
        </div>
    </div>

    <div class=\"row\">
        <div class=\"col-12\">
            <label for=\"\">Código HTML descripción</label><br />
            <p style=\"margin-bottom: 50px;\">";
        // line 28
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["noticia"]) || array_key_exists("noticia", $context) ? $context["noticia"] : (function () { throw new RuntimeError('Variable "noticia" does not exist.', 28, $this->source); })()), "descripcion", [], "any", false, false, false, 28), "html", null, true);
        echo "</p>
            ";
        // line 29
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 29, $this->source); })()), "descripcion", [], "any", false, false, false, 29), 'row');
        echo "
        </div>
    </div>

    <div class=\"row\">
        <div class=\"col-6\">
            ";
        // line 35
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 35, $this->source); })()), "fecha", [], "any", false, false, false, 35), 'row');
        echo "
        </div>
        <div class=\"col-6\">
            ";
        // line 38
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 38, $this->source); })()), "temporada", [], "any", false, false, false, 38), 'row');
        echo "
        </div>
    </div>

    <div class=\"row\">
        <div class=\"col-6\">
            <div id=\"contenedorCampoPartidos\">
                ";
        // line 45
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 45, $this->source); })()), "partido", [], "any", false, false, false, 45), 'row');
        echo "
            </div>
        </div>
        <div class=\"col-6\">
            <div id=\"contenedorCampoEquipos\">
                ";
        // line 50
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 50, $this->source); })()), "equipos", [], "any", false, false, false, 50), 'row');
        echo "
            </div>
        </div>
    </div>

    <div class=\"row\">
        <div class=\"col-6\">
            ";
        // line 57
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 57, $this->source); })()), "comunidad", [], "any", false, false, false, 57), 'row');
        echo "
        </div>
        <div class=\"col-6\">
            ";
        // line 60
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 60, $this->source); })()), "division", [], "any", false, false, false, 60), 'row');
        echo "
        </div>
    </div>

    <div class=\"row\">
        <div class=\"col-6\">
            ";
        // line 66
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 66, $this->source); })()), "estado", [], "any", false, false, false, 66), 'row');
        echo "
        </div>
        <div class=\"col-6\">
            ";
        // line 69
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 69, $this->source); })()), "posicion", [], "any", false, false, false, 69), 'row');
        echo "
        </div>
    </div>

<button style=\"margin-top: 200px; margin-bottom: 200px;\" class=\"btn btn-success btn-block\">";
        // line 73
        echo twig_escape_filter($this->env, (((isset($context["button_label"]) || array_key_exists("button_label", $context))) ? (_twig_default_filter((isset($context["button_label"]) || array_key_exists("button_label", $context) ? $context["button_label"] : (function () { throw new RuntimeError('Variable "button_label" does not exist.', 73, $this->source); })()), "Guardar noticia")) : ("Guardar noticia")), "html", null, true);
        echo "</button>
";
        // line 74
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 74, $this->source); })()), 'form_end');
        echo "


<script src=\"https://cdn.tiny.cloud/1/19zd7p7vtknhuabp6t9luepr21o7okuaowymhu163mtaelsk/tinymce/5/tinymce.min.js\" referrerpolicy=\"origin\"></script>

<link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css\" integrity=\"sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z\" crossorigin=\"anonymous\">";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "noticias/_form_revisar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  167 => 74,  163 => 73,  156 => 69,  150 => 66,  141 => 60,  135 => 57,  125 => 50,  117 => 45,  107 => 38,  101 => 35,  92 => 29,  88 => 28,  78 => 21,  74 => 20,  64 => 13,  55 => 7,  48 => 3,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{ form_start(form) }}

    <input type=\"hidden\" id=\"url_cambio_campo_temporada\" value=\"{{ url('noticias_cambio_campo_temporada') }}\">

    <div class=\"row\">
        <div class=\"col-6\">
            {{ form_row(form.usuario) }}
        </div>
    </div>

    <div class=\"row\">
        <div class=\"col-12\">
            {{ form_row(form.titulo) }}
        </div>
    </div>

    <div class=\"row\">
        <div class=\"col-12\">
            <label for=\"\">Código HTML descripción corta</label><br />
            <p style=\"margin-bottom: 50px;\">{{ noticia.descripcionCorta }}</p>
            {{ form_row(form.descripcionCorta) }}
        </div>
    </div>

    <div class=\"row\">
        <div class=\"col-12\">
            <label for=\"\">Código HTML descripción</label><br />
            <p style=\"margin-bottom: 50px;\">{{ noticia.descripcion }}</p>
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
            {{ form_row(form.estado) }}
        </div>
        <div class=\"col-6\">
            {{ form_row(form.posicion) }}
        </div>
    </div>

<button style=\"margin-top: 200px; margin-bottom: 200px;\" class=\"btn btn-success btn-block\">{{ button_label|default('Guardar noticia') }}</button>
{{ form_end(form) }}


<script src=\"https://cdn.tiny.cloud/1/19zd7p7vtknhuabp6t9luepr21o7okuaowymhu163mtaelsk/tinymce/5/tinymce.min.js\" referrerpolicy=\"origin\"></script>

<link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css\" integrity=\"sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z\" crossorigin=\"anonymous\">", "noticias/_form_revisar.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.eu/panel/templates/noticias/_form_revisar.html.twig");
    }
}
