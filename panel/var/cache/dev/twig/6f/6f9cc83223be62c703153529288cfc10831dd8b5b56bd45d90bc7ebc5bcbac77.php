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

/* admin/admin-users/edit.html.twig */
class __TwigTemplate_c215ed77f0c3f72b94006cc02e79ae1515d174d2a2958d4e5cebd382e883f6a8 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'icon' => [$this, 'block_icon'],
            'title' => [$this, 'block_title'],
            'description' => [$this, 'block_description'],
            'css' => [$this, 'block_css'],
            'js' => [$this, 'block_js'],
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/admin-users/edit.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/admin-users/edit.html.twig"));

        $this->parent = $this->loadTemplate("base_template/universal-panel.html.twig", "admin/admin-users/edit.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_icon($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "icon"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "icon"));

        echo "icon ion-ios-people";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Gestión de usuarios";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 4
    public function block_description($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "description"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "description"));

        echo "Gestión de usuarios";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 6
    public function block_css($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "css"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "css"));

        // line 7
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/admin/admin-users.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 11
    public function block_js($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 12
        echo "    <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/admin/admin-users.js"), "html", null, true);
        echo "\"></script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 15
    public function block_mainBody($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "mainBody"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "mainBody"));

        // line 16
        echo "    <div class=\"card bd-primary mg-t-20\">
        <div class=\"card-header bg-primary tx-white\">Editar usuario <strong>";
        // line 17
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["userEdit"]) || array_key_exists("userEdit", $context) ? $context["userEdit"] : (function () { throw new RuntimeError('Variable "userEdit" does not exist.', 17, $this->source); })()), "getUsername", [], "any", false, false, false, 17), "html", null, true);
        echo "</strong></div>
        <div class=\"card-body pd-sm-30\">
            ";
        // line 19
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 19, $this->source); })()), 'form_start');
        echo "
            <div class=\"row\">
                <label class=\"col-sm-4 form-control-label\">Usuario: <span class=\"tx-danger\">*</span></label>
                <div class=\"col-sm-8 mg-t-10 mg-sm-t-0\">
                    ";
        // line 23
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 23, $this->source); })()), "username", [], "any", false, false, false, 23), 'row', ["label" => " "]);
        echo "
                </div>
            </div><!-- row -->
            <div class=\"row mg-t-20\">
                <label class=\"col-sm-4 form-control-label\">Email: <span class=\"tx-danger\">*</span></label>
                <div class=\"col-sm-8 mg-t-10 mg-sm-t-0\">
                    ";
        // line 29
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 29, $this->source); })()), "email", [], "any", false, false, false, 29), 'row', ["label" => " "]);
        echo "
                </div>
            </div>
            <div class=\"row mg-t-20\">
                <label class=\"col-sm-4 form-control-label\">Contraseña: <span class=\"tx-danger\">*</span></label>
                <div class=\"col-sm-8 mg-t-10 mg-sm-t-0\">
                    ";
        // line 35
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 35, $this->source); })()), "plainPassword", [], "any", false, false, false, 35), 'row', ["label" => " "]);
        echo "
                </div>
            </div>
            <div class=\"row mg-t-20\">
                <label class=\"col-sm-4 form-control-label\">Permisos del usuario: <span class=\"tx-danger\">*</span></label>
                <div class=\"col-sm-8 mg-t-10 mg-sm-t-0\">
                    <p>
                        <label class=\"ckbox mg-b-0\">
                            <input id=\"permisAdministrador\" name=\"permisAdministrador\" type=\"checkbox\" value=\"1\"";
        // line 43
        if ((isset($context["isAdmin"]) || array_key_exists("isAdmin", $context) ? $context["isAdmin"] : (function () { throw new RuntimeError('Variable "isAdmin" does not exist.', 43, $this->source); })())) {
            echo " checked=\"checked\"";
        }
        echo "><span></span>
                        </label> Administrador
                    </p>
                    <p>
                        <label class=\"ckbox mg-b-0\">
                            <input id=\"permisGestorNoticias\" name=\"permisGestorNoticias\" type=\"checkbox\" value=\"1\"";
        // line 48
        if ((isset($context["isGestorNoticias"]) || array_key_exists("isGestorNoticias", $context) ? $context["isGestorNoticias"] : (function () { throw new RuntimeError('Variable "isGestorNoticias" does not exist.', 48, $this->source); })())) {
            echo " checked=\"checked\"";
        }
        echo "><span></span>
                        </label> Gestor noticias
                    </p>
                    ";
        // line 51
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 51, $this->source); })()), "roles", [], "any", false, false, false, 51), 'row', ["attr" => ["style" => "display:none;"], "label" => " "]);
        echo "
                </div>
            </div>
            <div class=\"form-layout-footer mg-t-30\">
                <button class=\"btn btn-success mg-r-5\">Editar usuario</button>
            </div><!-- form-layout-footer -->
            ";
        // line 57
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 57, $this->source); })()), 'form_end');
        echo "
        </div><!-- card-body -->
    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "admin/admin-users/edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  247 => 57,  238 => 51,  230 => 48,  220 => 43,  209 => 35,  200 => 29,  191 => 23,  184 => 19,  179 => 17,  176 => 16,  166 => 15,  153 => 12,  143 => 11,  130 => 7,  120 => 6,  101 => 4,  82 => 3,  63 => 2,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base_template/universal-panel.html.twig\" %}
{% block icon %}icon ion-ios-people{% endblock %}
{% block title %}Gestión de usuarios{% endblock %}
{% block description %}Gestión de usuarios{% endblock %}

{% block css %}
    <link href=\"{{ asset('css/admin/admin-users.css') }}\" rel=\"stylesheet\">
{% endblock %}


{% block js %}
    <script type=\"text/javascript\" src=\"{{ asset('js/admin/admin-users.js') }}\"></script>
{% endblock %}

{% block mainBody %}
    <div class=\"card bd-primary mg-t-20\">
        <div class=\"card-header bg-primary tx-white\">Editar usuario <strong>{{ userEdit.getUsername }}</strong></div>
        <div class=\"card-body pd-sm-30\">
            {{ form_start(form) }}
            <div class=\"row\">
                <label class=\"col-sm-4 form-control-label\">Usuario: <span class=\"tx-danger\">*</span></label>
                <div class=\"col-sm-8 mg-t-10 mg-sm-t-0\">
                    {{ form_row(form.username, {'label': ' '}) }}
                </div>
            </div><!-- row -->
            <div class=\"row mg-t-20\">
                <label class=\"col-sm-4 form-control-label\">Email: <span class=\"tx-danger\">*</span></label>
                <div class=\"col-sm-8 mg-t-10 mg-sm-t-0\">
                    {{ form_row(form.email, {'label': ' '}) }}
                </div>
            </div>
            <div class=\"row mg-t-20\">
                <label class=\"col-sm-4 form-control-label\">Contraseña: <span class=\"tx-danger\">*</span></label>
                <div class=\"col-sm-8 mg-t-10 mg-sm-t-0\">
                    {{ form_row(form.plainPassword, {'label': ' '}) }}
                </div>
            </div>
            <div class=\"row mg-t-20\">
                <label class=\"col-sm-4 form-control-label\">Permisos del usuario: <span class=\"tx-danger\">*</span></label>
                <div class=\"col-sm-8 mg-t-10 mg-sm-t-0\">
                    <p>
                        <label class=\"ckbox mg-b-0\">
                            <input id=\"permisAdministrador\" name=\"permisAdministrador\" type=\"checkbox\" value=\"1\"{% if isAdmin %} checked=\"checked\"{% endif %}><span></span>
                        </label> Administrador
                    </p>
                    <p>
                        <label class=\"ckbox mg-b-0\">
                            <input id=\"permisGestorNoticias\" name=\"permisGestorNoticias\" type=\"checkbox\" value=\"1\"{% if isGestorNoticias %} checked=\"checked\"{% endif %}><span></span>
                        </label> Gestor noticias
                    </p>
                    {{ form_row(form.roles, { 'attr': { 'style': 'display:none;' }, 'label': ' ' }) }}
                </div>
            </div>
            <div class=\"form-layout-footer mg-t-30\">
                <button class=\"btn btn-success mg-r-5\">Editar usuario</button>
            </div><!-- form-layout-footer -->
            {{ form_end(form) }}
        </div><!-- card-body -->
    </div>
{% endblock %}", "admin/admin-users/edit.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/panel/templates/admin/admin-users/edit.html.twig");
    }
}
