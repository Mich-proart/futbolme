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

/* base_template/universal-panel.html.twig */
class __TwigTemplate_51efcee492ba92495b830afbcdb3aaf318dc79d9623a86627f8e3798c3b20eef extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'description' => [$this, 'block_description'],
            'title' => [$this, 'block_title'],
            'css' => [$this, 'block_css'],
            'mainBody' => [$this, 'block_mainBody'],
            'js' => [$this, 'block_js'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base_template/universal-panel.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base_template/universal-panel.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <meta name=\"description\" content=\"";
        // line 6
        $this->displayBlock('description', $context, $blocks);
        echo "\">
    <meta name=\"author\" content=\"FinderAnt\">

    <title>";
        // line 9
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

    <link href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("lib/font-awesome/css/font-awesome.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
    <link href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("lib/font-awesome/css/font-awesome.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
    <link href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("lib/Ionicons/css/ionicons.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
    <link href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("lib/perfect-scrollbar/css/perfect-scrollbar.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/shamcey.css"), "html", null, true);
        echo "\">

    <link rel=\"stylesheet\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/select2.min.css"), "html", null, true);
        echo "\">

    ";
        // line 19
        $this->displayBlock('css', $context, $blocks);
        // line 20
        echo "</head>
<body>

<div class=\"sh-logopanel\">
    <a href=\"\" class=\"sh-logo-text\">
        ";
        // line 25
        echo twig_escape_filter($this->env, (isset($context["project_name"]) || array_key_exists("project_name", $context) ? $context["project_name"] : (function () { throw new RuntimeError('Variable "project_name" does not exist.', 25, $this->source); })()), "html", null, true);
        echo "
    </a>
    <a id=\"navicon\" href=\"\" class=\"sh-navicon d-none d-xl-block\"><i class=\"icon ion-navicon\"></i></a>
    <a id=\"naviconMobile\" href=\"\" class=\"sh-navicon d-xl-none\"><i class=\"icon ion-navicon\"></i></a>
</div><!-- sh-logopanel -->

<div class=\"sh-sideleft-menu\">
    <label class=\"sh-sidebar-label\">Navegación</label>
    <ul class=\"nav\">
        <li class=\"nav-item\">
            <a href=\"\" class=\"nav-link with-sub";
        // line 35
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 35, $this->source); })()), "request", [], "any", false, false, false, 35), "get", [0 => "_route"], "method", false, false, false, 35) == "noticias_mis_noticias") || (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 35, $this->source); })()), "request", [], "any", false, false, false, 35), "get", [0 => "_route"], "method", false, false, false, 35) == "administrar_noticias"))) {
            echo " active";
        }
        echo "\">
                <i class=\"icon ion-compose\"></i>
                <span>Noticias</span>
            </a>
            <ul class=\"nav-sub\">
                <li class=\"nav-item\">
                    <a href=\"";
        // line 41
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("noticias_mis_noticias");
        echo "\" class=\"nav-link";
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 41, $this->source); })()), "request", [], "any", false, false, false, 41), "get", [0 => "_route"], "method", false, false, false, 41) == "noticias_mis_noticias")) {
            echo " active";
        }
        echo "\">Mis noticias</a>
                </li>
                ";
        // line 43
        if (twig_in_filter("ROLE_ADMIN", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 43, $this->source); })()), "user", [], "any", false, false, false, 43), "roles", [], "any", false, false, false, 43))) {
            // line 44
            echo "                    <li class=\"nav-item\">
                        <a href=\"";
            // line 45
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("administrar_noticias");
            echo "\" class=\"nav-link";
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 45, $this->source); })()), "request", [], "any", false, false, false, 45), "get", [0 => "_route"], "method", false, false, false, 45) == "administrar_noticias")) {
                echo " active";
            }
            echo "\">Administrar noticias</a>
                    </li>
                ";
        }
        // line 48
        echo "            </ul>
        </li><!-- nav-item -->
        ";
        // line 50
        if (twig_in_filter("ROLE_ADMIN", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 50, $this->source); })()), "user", [], "any", false, false, false, 50), "roles", [], "any", false, false, false, 50))) {
            // line 51
            echo "        <li class=\"nav-item\">
            <a href=\"";
            // line 52
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users");
            echo "\" class=\"nav-link";
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 52, $this->source); })()), "request", [], "any", false, false, false, 52), "get", [0 => "_route"], "method", false, false, false, 52) == "admin_users")) {
                echo " active";
            }
            echo "\">
                <i class=\"icon ion-ios-people\"></i>
                <span>Gestión de usuarios</span>
            </a>
        </li><!-- nav-item -->
        ";
        }
        // line 58
        echo "        <li class=\"nav-item\">
            <a href=\"";
        // line 59
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("logout");
        echo "\" class=\"nav-link\">
                <i class=\"icon ion-power\"></i>
                <span>Cerrar sesión</span>
            </a>
        </li><!-- nav-item -->
    </ul>
</div><!-- sh-sideleft-menu -->

<div class=\"sh-headpanel\">
    <div class=\"sh-headpanel-left\">
        ";
        // line 91
        echo "        <!-- START: DISPLAYED IN MOBILE ONLY -->
        <div class=\"dropdown dropdown-app-list\">
            <a href=\"\" data-toggle=\"dropdown\" class=\"dropdown-link\">
                <i class=\"icon ion-ios-keypad tx-18\"></i>
            </a>
            <div class=\"dropdown-menu\">
                <div class=\"row no-gutters\">
                    <div class=\"col-4\">
                        <a href=\"\" class=\"dropdown-menu-link\">
                            <div>
                                <i class=\"icon ion-ios-folder-outline\"></i>
                                <span>Directory</span>
                            </div>
                        </a>
                    </div><!-- col-4 -->
                    <div class=\"col-4\">
                        <a href=\"\" class=\"dropdown-menu-link\">
                            <div>
                                <i class=\"icon ion-ios-calendar-outline\"></i>
                                <span>Events</span>
                            </div>
                        </a>
                    </div><!-- col-4 -->
                    <div class=\"col-4\">
                        <a href=\"\" class=\"dropdown-menu-link\">
                            <div>
                                <i class=\"icon ion-ios-gear-outline\"></i>
                                <span>Settings</span>
                            </div>
                        </a>
                    </div><!-- col-4 -->
                </div><!-- row -->
            </div><!-- dropdown-menu -->
        </div><!-- dropdown -->
        <!-- END: DISPLAYED IN MOBILE ONLY -->

    </div><!-- sh-headpanel-left -->

    <div class=\"sh-headpanel-right\">
        ";
        // line 215
        echo "    </div><!-- sh-headpanel-right -->
</div><!-- sh-headpanel -->

<div class=\"sh-mainpanel\">
    ";
        // line 227
        echo "    <div class=\"sh-pagetitle\">
        <div class=\"input-group\">
            ";
        // line 235
        echo "        </div><!-- input-group -->
        <div class=\"sh-pagetitle-left\">
            ";
        // line 238
        echo "            <div class=\"sh-pagetitle-title\">
                ";
        // line 240
        echo "                <h2>";
        $this->displayBlock("title", $context, $blocks);
        echo "</h2>
            </div><!-- sh-pagetitle-left-title -->
        </div><!-- sh-pagetitle-left -->
    </div><!-- sh-pagetitle -->

    <div class=\"sh-pagebody\">
        <div class=\"row row-sm\">
            <div class=\"col-lg-12\">
                ";
        // line 248
        $this->displayBlock('mainBody', $context, $blocks);
        // line 251
        echo "            </div><!-- col-12 -->
        </div><!-- row -->
    </div><!-- sh-pagebody -->
    <div class=\"sh-footer\">
        <div class=\"col-md-12 text-center\">
            Copyright &copy; ";
        // line 256
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo " - Futbolme
        </div>
    </div><!-- sh-footer -->
</div><!-- sh-mainpanel -->

<script src=\"";
        // line 261
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("lib/jquery/jquery.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 262
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("lib/popper.js/popper.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 263
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("lib/bootstrap/bootstrap.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 264
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("lib/jquery-ui/jquery-ui.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 265
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 266
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("lib/moment/moment.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 267
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("lib/Flot/jquery.flot.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 268
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("lib/Flot/jquery.flot.resize.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 269
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("lib/flot-spline/jquery.flot.spline.js"), "html", null, true);
        echo "\"></script>

<script src=\"";
        // line 271
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/shamcey.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 272
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/dashboard.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 273
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/select2.min.js"), "html", null, true);
        echo "\"></script>

";
        // line 275
        $this->displayBlock('js', $context, $blocks);
        // line 278
        echo "
</body>
</html>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 6
    public function block_description($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "description"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "description"));

        echo "Dashboard";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 9
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Dashboard";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 19
    public function block_css($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "css"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "css"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 248
    public function block_mainBody($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "mainBody"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "mainBody"));

        // line 249
        echo "
                ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 275
    public function block_js($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 276
        echo "
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "base_template/universal-panel.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  426 => 276,  416 => 275,  405 => 249,  395 => 248,  377 => 19,  358 => 9,  339 => 6,  326 => 278,  324 => 275,  319 => 273,  315 => 272,  311 => 271,  306 => 269,  302 => 268,  298 => 267,  294 => 266,  290 => 265,  286 => 264,  282 => 263,  278 => 262,  274 => 261,  266 => 256,  259 => 251,  257 => 248,  245 => 240,  242 => 238,  238 => 235,  234 => 227,  228 => 215,  187 => 91,  174 => 59,  171 => 58,  158 => 52,  155 => 51,  153 => 50,  149 => 48,  139 => 45,  136 => 44,  134 => 43,  125 => 41,  114 => 35,  101 => 25,  94 => 20,  92 => 19,  87 => 17,  82 => 15,  78 => 14,  74 => 13,  70 => 12,  66 => 11,  61 => 9,  55 => 6,  48 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <meta name=\"description\" content=\"{% block description %}Dashboard{% endblock %}\">
    <meta name=\"author\" content=\"FinderAnt\">

    <title>{% block title %}Dashboard{% endblock %}</title>

    <link href=\"{{ asset('lib/font-awesome/css/font-awesome.css') }}\" rel=\"stylesheet\">
    <link href=\"{{ asset('lib/font-awesome/css/font-awesome.css') }}\" rel=\"stylesheet\">
    <link href=\"{{ asset('lib/Ionicons/css/ionicons.css') }}\" rel=\"stylesheet\">
    <link href=\"{{ asset('lib/perfect-scrollbar/css/perfect-scrollbar.css') }}\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"{{ asset('css/shamcey.css') }}\">

    <link rel=\"stylesheet\" href=\"{{ asset('css/select2.min.css') }}\">

    {% block css %}{% endblock %}
</head>
<body>

<div class=\"sh-logopanel\">
    <a href=\"\" class=\"sh-logo-text\">
        {{ project_name }}
    </a>
    <a id=\"navicon\" href=\"\" class=\"sh-navicon d-none d-xl-block\"><i class=\"icon ion-navicon\"></i></a>
    <a id=\"naviconMobile\" href=\"\" class=\"sh-navicon d-xl-none\"><i class=\"icon ion-navicon\"></i></a>
</div><!-- sh-logopanel -->

<div class=\"sh-sideleft-menu\">
    <label class=\"sh-sidebar-label\">Navegación</label>
    <ul class=\"nav\">
        <li class=\"nav-item\">
            <a href=\"\" class=\"nav-link with-sub{% if app.request.get('_route') == 'noticias_mis_noticias' or app.request.get('_route') == 'administrar_noticias' %} active{% endif %}\">
                <i class=\"icon ion-compose\"></i>
                <span>Noticias</span>
            </a>
            <ul class=\"nav-sub\">
                <li class=\"nav-item\">
                    <a href=\"{{ url('noticias_mis_noticias') }}\" class=\"nav-link{% if app.request.get('_route') == 'noticias_mis_noticias' %} active{% endif %}\">Mis noticias</a>
                </li>
                {% if 'ROLE_ADMIN' in app.user.roles %}
                    <li class=\"nav-item\">
                        <a href=\"{{ url('administrar_noticias') }}\" class=\"nav-link{% if app.request.get('_route') == 'administrar_noticias' %} active{% endif %}\">Administrar noticias</a>
                    </li>
                {% endif %}
            </ul>
        </li><!-- nav-item -->
        {% if 'ROLE_ADMIN' in app.user.roles %}
        <li class=\"nav-item\">
            <a href=\"{{ path('admin_users') }}\" class=\"nav-link{% if app.request.get('_route') == 'admin_users' %} active{% endif %}\">
                <i class=\"icon ion-ios-people\"></i>
                <span>Gestión de usuarios</span>
            </a>
        </li><!-- nav-item -->
        {% endif %}
        <li class=\"nav-item\">
            <a href=\"{{ path('logout') }}\" class=\"nav-link\">
                <i class=\"icon ion-power\"></i>
                <span>Cerrar sesión</span>
            </a>
        </li><!-- nav-item -->
    </ul>
</div><!-- sh-sideleft-menu -->

<div class=\"sh-headpanel\">
    <div class=\"sh-headpanel-left\">
        {#
        <!-- START: HIDDEN IN MOBILE -->
        <a href=\"\" class=\"sh-icon-link\">
            <div>
                <i class=\"icon ion-ios-folder-outline\"></i>
                <span>Directory</span>
            </div>
        </a>
        <a href=\"\" class=\"sh-icon-link\">
            <div>
                <i class=\"icon ion-ios-calendar-outline\"></i>
                <span>Events</span>
            </div>
        </a>
        <a href=\"\" class=\"sh-icon-link\">
            <div>
                <i class=\"icon ion-ios-gear-outline\"></i>
                <span>Settings</span>
            </div>
        </a>
        <!-- END: HIDDEN IN MOBILE -->
        #}
        <!-- START: DISPLAYED IN MOBILE ONLY -->
        <div class=\"dropdown dropdown-app-list\">
            <a href=\"\" data-toggle=\"dropdown\" class=\"dropdown-link\">
                <i class=\"icon ion-ios-keypad tx-18\"></i>
            </a>
            <div class=\"dropdown-menu\">
                <div class=\"row no-gutters\">
                    <div class=\"col-4\">
                        <a href=\"\" class=\"dropdown-menu-link\">
                            <div>
                                <i class=\"icon ion-ios-folder-outline\"></i>
                                <span>Directory</span>
                            </div>
                        </a>
                    </div><!-- col-4 -->
                    <div class=\"col-4\">
                        <a href=\"\" class=\"dropdown-menu-link\">
                            <div>
                                <i class=\"icon ion-ios-calendar-outline\"></i>
                                <span>Events</span>
                            </div>
                        </a>
                    </div><!-- col-4 -->
                    <div class=\"col-4\">
                        <a href=\"\" class=\"dropdown-menu-link\">
                            <div>
                                <i class=\"icon ion-ios-gear-outline\"></i>
                                <span>Settings</span>
                            </div>
                        </a>
                    </div><!-- col-4 -->
                </div><!-- row -->
            </div><!-- dropdown-menu -->
        </div><!-- dropdown -->
        <!-- END: DISPLAYED IN MOBILE ONLY -->

    </div><!-- sh-headpanel-left -->

    <div class=\"sh-headpanel-right\">
        {#
        <div class=\"dropdown mg-r-10\">
            <a href=\"\" class=\"dropdown-link dropdown-link-notification\">
                <i class=\"icon ion-ios-filing-outline tx-24\"></i>
            </a>
        </div>
        <div class=\"dropdown dropdown-notification\">
            <a href=\"\" data-toggle=\"dropdown\" class=\"dropdown-link dropdown-link-notification\">
                <i class=\"icon ion-ios-bell-outline tx-24\"></i>
                <span class=\"square-8\"></span>
            </a>
            <div class=\"dropdown-menu dropdown-menu-right\">
                <div class=\"dropdown-menu-header\">
                    <label>Notifications</label>
                    <a href=\"\">Mark All as Read</a>
                </div><!-- d-flex -->

                <div class=\"media-list\">
                    <!-- loop starts here -->
                    <a href=\"\" class=\"media-list-link read\">
                        <div class=\"media pd-x-20 pd-y-15\">
                            <img src=\"{{ asset('img/img8.jpg') }}\" class=\"wd-40 rounded-circle\" alt=\"\">
                            <div class=\"media-body\">
                                <p class=\"tx-13 mg-b-0\"><strong class=\"tx-medium\">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                                <span class=\"tx-12\">October 03, 2017 8:45am</span>
                            </div>
                        </div><!-- media -->
                    </a>
                    <!-- loop ends here -->
                    <a href=\"\" class=\"media-list-link read\">
                        <div class=\"media pd-x-20 pd-y-15\">
                            <img src=\"{{ asset('img/img9.jpg') }}\" class=\"wd-40 rounded-circle\" alt=\"\">
                            <div class=\"media-body\">
                                <p class=\"tx-13 mg-b-0\"><strong class=\"tx-medium\">Mellisa Brown</strong> appreciated your work <strong class=\"tx-medium\">The Social Network</strong></p>
                                <span class=\"tx-12\">October 02, 2017 12:44am</span>
                            </div>
                        </div><!-- media -->
                    </a>
                    <a href=\"\" class=\"media-list-link read\">
                        <div class=\"media pd-x-20 pd-y-15\">
                            <img src=\"{{ asset('img/img10.jpg') }}\" class=\"wd-40 rounded-circle\" alt=\"\">
                            <div class=\"media-body\">
                                <p class=\"tx-13 mg-b-0\">20+ new items added are for sale in your <strong class=\"tx-medium\">Sale Group</strong></p>
                                <span class=\"tx-12\">October 01, 2017 10:20pm</span>
                            </div>
                        </div><!-- media -->
                    </a>
                    <a href=\"\" class=\"media-list-link read\">
                        <div class=\"media pd-x-20 pd-y-15\">
                            <img src=\"{{ asset('img/img5.jpg') }}\" class=\"wd-40 rounded-circle\" alt=\"\">
                            <div class=\"media-body\">
                                <p class=\"tx-13 mg-b-0\"><strong class=\"tx-medium\">Julius Erving</strong> wants to connect with you on your conversation with <strong class=\"tx-medium\">Ronnie Mara</strong></p>
                                <span class=\"tx-12\">October 01, 2017 6:08pm</span>
                            </div>
                        </div><!-- media -->
                    </a>
                    <div class=\"media-list-footer\">
                        <a href=\"\" class=\"tx-12\"><i class=\"fa fa-angle-down mg-r-5\"></i> Show All Notifications</a>
                    </div>
                </div><!-- media-list -->
            </div><!-- dropdown-menu -->
        </div>
        <div class=\"dropdown dropdown-profile\">
            <a href=\"\" data-toggle=\"dropdown\" class=\"dropdown-link\">
                <img src=\"{{ asset('img/img1.jpg') }}\" class=\"wd-60 rounded-circle\" alt=\"\">
            </a>
            <div class=\"dropdown-menu dropdown-menu-right\">
                <div class=\"media align-items-center\">
                    <img src=\"{{ asset('img/img1.jpg') }}\" class=\"wd-60 ht-60 rounded-circle bd pd-5\" alt=\"\">
                    <div class=\"media-body\">
                        <h6 class=\"tx-inverse tx-15 mg-b-5\">{{ user.username }}</h6>
                        <p class=\"mg-b-0 tx-12\">{{ user.email }}</p>
                    </div><!-- media-body -->
                </div><!-- media -->
                <hr>
                <ul class=\"dropdown-profile-nav\">
                    <li><a href=\"{{ path('edit_profile') }}\"><i class=\"icon ion-ios-person\"></i> Edit Profile</a></li>
                    <li><a href=\"\"><i class=\"icon ion-ios-gear\"></i> Settings</a></li>
                    <li><a href=\"\"><i class=\"icon ion-ios-download\"></i> Downloads</a></li>
                    <li><a href=\"\"><i class=\"icon ion-ios-star\"></i> Favorites</a></li>
                    <li><a href=\"{{ path('logout') }}\"><i class=\"icon ion-power\"></i> Sign Out</a></li>
                </ul>
            </div><!-- dropdown-menu -->
        </div>
        #}
    </div><!-- sh-headpanel-right -->
</div><!-- sh-headpanel -->

<div class=\"sh-mainpanel\">
    {#
    <div class=\"sh-breadcrumb\">
        <nav class=\"breadcrumb\">
            <a class=\"breadcrumb-item\" href=\"index.html\">Shamcey</a>
            <span class=\"breadcrumb-item active\">Dashboard</span>
        </nav>
    </div><!-- sh-breadcrumb -->
    #}
    <div class=\"sh-pagetitle\">
        <div class=\"input-group\">
            {#
            <input type=\"search\" class=\"form-control\" placeholder=\"Search\">
            <span class=\"input-group-btn\">
            <button class=\"btn\"><i class=\"fa fa-search\"></i></button>
          </span><!-- input-group-btn -->
          #}
        </div><!-- input-group -->
        <div class=\"sh-pagetitle-left\">
            {# <div class=\"sh-pagetitle-icon\"><i class=\"icon ion-ios-home\"></i></div> #}
            <div class=\"sh-pagetitle-title\">
                {# <span>{{ block('description') }}</span> #}
                <h2>{{ block('title') }}</h2>
            </div><!-- sh-pagetitle-left-title -->
        </div><!-- sh-pagetitle-left -->
    </div><!-- sh-pagetitle -->

    <div class=\"sh-pagebody\">
        <div class=\"row row-sm\">
            <div class=\"col-lg-12\">
                {% block mainBody %}

                {% endblock %}
            </div><!-- col-12 -->
        </div><!-- row -->
    </div><!-- sh-pagebody -->
    <div class=\"sh-footer\">
        <div class=\"col-md-12 text-center\">
            Copyright &copy; {{ \"now\"|date(\"Y\") }} - Futbolme
        </div>
    </div><!-- sh-footer -->
</div><!-- sh-mainpanel -->

<script src=\"{{ asset('lib/jquery/jquery.js') }}\"></script>
<script src=\"{{ asset('lib/popper.js/popper.js') }}\"></script>
<script src=\"{{ asset('lib/bootstrap/bootstrap.js') }}\"></script>
<script src=\"{{ asset('lib/jquery-ui/jquery-ui.js') }}\"></script>
<script src=\"{{ asset('lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}\"></script>
<script src=\"{{ asset('lib/moment/moment.js') }}\"></script>
<script src=\"{{ asset('lib/Flot/jquery.flot.js') }}\"></script>
<script src=\"{{ asset('lib/Flot/jquery.flot.resize.js') }}\"></script>
<script src=\"{{ asset('lib/flot-spline/jquery.flot.spline.js') }}\"></script>

<script src=\"{{ asset('js/shamcey.js') }}\"></script>
<script src=\"{{ asset('js/dashboard.js') }}\"></script>
<script src=\"{{ asset('js/select2.min.js') }}\"></script>

{% block js %}

{% endblock %}

</body>
</html>
", "base_template/universal-panel.html.twig", "/home/futbolme/domains/futbolme.com/public_html/panel/templates/base_template/universal-panel.html.twig");
    }
}
