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

/* user_security/login.html.twig */
class __TwigTemplate_d0122b6a6267661c4896fd5fac8c5286288dbbc8a0c7f64273270bea30427cd3 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user_security/login.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user_security/login.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <!-- Required meta tags -->
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <meta name=\"robots\" content=\"noindex\">

    <title>";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["project_name"]) || array_key_exists("project_name", $context) ? $context["project_name"] : (function () { throw new RuntimeError('Variable "project_name" does not exist.', 9, $this->source); })()), "html", null, true);
        echo " - Acceso a la zona de usuario</title>

    <!-- Vendor css -->
    <link href=\"../lib/font-awesome/css/font-awesome.css\" rel=\"stylesheet\">
    <link href=\"../lib/Ionicons/css/ionicons.css\" rel=\"stylesheet\">

    <!-- Shamcey CSS -->
    <link rel=\"stylesheet\" href=\"../css/shamcey.css\">
</head>

<body class=\"bg-gray-900\">

<div class=\"signpanel-wrapper\">
    <div class=\"signbox\">
        <div class=\"signbox-header\">
            <h2>";
        // line 24
        echo twig_escape_filter($this->env, (isset($context["project_name"]) || array_key_exists("project_name", $context) ? $context["project_name"] : (function () { throw new RuntimeError('Variable "project_name" does not exist.', 24, $this->source); })()), "html", null, true);
        echo "</h2>
            <p class=\"mg-b-0\">Acceso a la zona de usuario</p>
        </div><!-- signbox-header -->
        <div class=\"signbox-body\">

            ";
        // line 29
        if ((isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 29, $this->source); })())) {
            // line 30
            echo "                <div>";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 30, $this->source); })()), "messageKey", [], "any", false, false, false, 30), twig_get_attribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 30, $this->source); })()), "messageData", [], "any", false, false, false, 30), "security"), "html", null, true);
            echo "</div>
            ";
        }
        // line 32
        echo "
            <form action=\"";
        // line 33
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("login");
        echo "\" method=\"post\">

                <div class=\"form-group\">
                    <label class=\"form-control-label\" for=\"username\">Usuario:</label>
                    <input type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 37
        echo twig_escape_filter($this->env, (isset($context["last_username"]) || array_key_exists("last_username", $context) ? $context["last_username"] : (function () { throw new RuntimeError('Variable "last_username" does not exist.', 37, $this->source); })()), "html", null, true);
        echo "\" placeholder=\"Tu usuario o email\" class=\"form-control\" />
                </div><!-- form-group -->

                <div class=\"form-group\">
                    <label class=\"form-control-label\" for=\"password\">Contraseña:</label>
                    <input type=\"password\" id=\"password\" name=\"_password\" placeholder=\"Tu contraseña\" class=\"form-control\" />
                </div><!-- form-group -->

                ";
        // line 50
        echo "
                <button class=\"btn btn-success btn-block\" type=\"submit\">Iniciar sesión</button>

                <div class=\"tx-center bg-white bd pd-10 mg-t-40\"><a href=\"";
        // line 53
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("new_password");
        echo "\">¿Recordar contraseña?</a></div>
            </form>

        </div><!-- signbox-body -->
    </div><!-- signbox -->
</div><!-- signpanel-wrapper -->

<script src=\"../lib/jquery/jquery.js\"></script>
<script src=\"../lib/popper.js/popper.js\"></script>
<script src=\"../lib/bootstrap/bootstrap.js\"></script>

<script src=\"../js/shamcey.js\"></script>
</body>
</html>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "user_security/login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 53,  108 => 50,  97 => 37,  90 => 33,  87 => 32,  81 => 30,  79 => 29,  71 => 24,  53 => 9,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <!-- Required meta tags -->
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <meta name=\"robots\" content=\"noindex\">

    <title>{{ project_name }} - Acceso a la zona de usuario</title>

    <!-- Vendor css -->
    <link href=\"../lib/font-awesome/css/font-awesome.css\" rel=\"stylesheet\">
    <link href=\"../lib/Ionicons/css/ionicons.css\" rel=\"stylesheet\">

    <!-- Shamcey CSS -->
    <link rel=\"stylesheet\" href=\"../css/shamcey.css\">
</head>

<body class=\"bg-gray-900\">

<div class=\"signpanel-wrapper\">
    <div class=\"signbox\">
        <div class=\"signbox-header\">
            <h2>{{ project_name }}</h2>
            <p class=\"mg-b-0\">Acceso a la zona de usuario</p>
        </div><!-- signbox-header -->
        <div class=\"signbox-body\">

            {% if error %}
                <div>{{ error.messageKey|trans(error.messageData, 'security') }}</div>
            {% endif %}

            <form action=\"{{ path('login') }}\" method=\"post\">

                <div class=\"form-group\">
                    <label class=\"form-control-label\" for=\"username\">Usuario:</label>
                    <input type=\"text\" id=\"username\" name=\"_username\" value=\"{{ last_username }}\" placeholder=\"Tu usuario o email\" class=\"form-control\" />
                </div><!-- form-group -->

                <div class=\"form-group\">
                    <label class=\"form-control-label\" for=\"password\">Contraseña:</label>
                    <input type=\"password\" id=\"password\" name=\"_password\" placeholder=\"Tu contraseña\" class=\"form-control\" />
                </div><!-- form-group -->

                {#
                    If you want to control the URL the user
                    is redirected to on success (more details below)
                    <input type=\"hidden\" name=\"_target_path\" value=\"/account\" />
                #}

                <button class=\"btn btn-success btn-block\" type=\"submit\">Iniciar sesión</button>

                <div class=\"tx-center bg-white bd pd-10 mg-t-40\"><a href=\"{{ path('new_password') }}\">¿Recordar contraseña?</a></div>
            </form>

        </div><!-- signbox-body -->
    </div><!-- signbox -->
</div><!-- signpanel-wrapper -->

<script src=\"../lib/jquery/jquery.js\"></script>
<script src=\"../lib/popper.js/popper.js\"></script>
<script src=\"../lib/bootstrap/bootstrap.js\"></script>

<script src=\"../js/shamcey.js\"></script>
</body>
</html>
", "user_security/login.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/panel/templates/user_security/login.html.twig");
    }
}
