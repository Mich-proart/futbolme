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

/* contacto/index.html.twig */
class __TwigTemplate_a4d83f633769c04f201b9a455ff5c7d30008eb2060e753e78b4a77dd602a4b81 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'contenedorIzquierda' => [$this, 'block_contenedorIzquierda'],
            'contenedorCentral' => [$this, 'block_contenedorCentral'],
            'bloqueJs' => [$this, 'block_bloqueJs'],
            'contenedorDerecha' => [$this, 'block_contenedorDerecha'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("base.html.twig", "contacto/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_contenedorIzquierda($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "
    ";
        // line 5
        $this->loadTemplate("__part/ultimosEventos.html.twig", "contacto/index.html.twig", 5)->display($context);
        // line 6
        echo "
";
    }

    // line 9
    public function block_contenedorCentral($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 10
        echo "
    <div class=\"col-12 contenedorBlancoBordesRedondeados\" style=\"padding-bottom: 20px;\">
        <h1>Contacta con nosotros</h1>

        <div class=\"col-12\">
            <em>Recuerda que futbolme no es la web oficial de ningún club de fútbol</em>
        </div>

        ";
        // line 18
        if (($context["formEnviado"] ?? null)) {
            // line 19
            echo "            ";
            if (($context["ok"] ?? null)) {
                // line 20
                echo "                <strong>Hemos recibido correctamente tu mensaje. te responderemos lo antes posible</strong>
            ";
            }
            // line 22
            echo "
        ";
        }
        // line 24
        echo "
        <div class=\"col-12\" style=\"margin-top: 30px;\">

            <form method=\"post\" enctype=\"multipart/form-data\">
                <div class=\"form-group\">
                    ";
        // line 29
        if (twig_get_attribute($this->env, $this->source, ($context["error"] ?? null), "nombre", [], "any", true, true, false, 29)) {
            // line 30
            echo "                        ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["error"] ?? null), "nombre", [], "any", false, false, false, 30), "html", null, true);
            echo "
                    ";
        }
        // line 32
        echo "                    <label for=\"tuNombre\">Nombre</label>
                    <input required=\"required\" type=\"text\" class=\"form-control\" id=\"tuNombre\" name=\"tuNombre\" placeholder=\"Tu nombre\" value=\"";
        // line 33
        echo twig_escape_filter($this->env, ($context["nombre"] ?? null), "html", null, true);
        echo "\">
                </div>
                <div class=\"form-group\">
                    ";
        // line 36
        if (twig_get_attribute($this->env, $this->source, ($context["error"] ?? null), "email", [], "any", true, true, false, 36)) {
            // line 37
            echo "                        ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["error"] ?? null), "email", [], "any", false, false, false, 37), "html", null, true);
            echo "
                    ";
        }
        // line 39
        echo "                    <label for=\"tuEmail\">Email</label>
                    <input required=\"required\" type=\"email\" class=\"form-control\" id=\"tuEmail\" name=\"tuEmail\" placeholder=\"Tu email\" value=\"";
        // line 40
        echo twig_escape_filter($this->env, ($context["email"] ?? null), "html", null, true);
        echo "\">
                </div>
                <div class=\"form-group\">
                    ";
        // line 43
        if (twig_get_attribute($this->env, $this->source, ($context["error"] ?? null), "mensaje", [], "any", true, true, false, 43)) {
            // line 44
            echo "                        ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["error"] ?? null), "mensaje", [], "any", false, false, false, 44), "html", null, true);
            echo "
                    ";
        }
        // line 46
        echo "                    <label for=\"tuMensaje\">Mensaje</label>
                    <textarea required=\"required\" class=\"form-control\" id=\"tuMensaje\" name=\"tuMensaje\" rows=\"5\" placeholder=\"Escribe aquí el mensaje\">";
        // line 47
        echo twig_escape_filter($this->env, ($context["mensaje"] ?? null), "html", null, true);
        echo "</textarea>
                </div>
                <div class=\"form-group\">
                    <div class=\"g-recaptcha\" data-sitekey=\"6Lev054UAAAAABDShSaZyAkcz8Kb7MRbuM0lTwl5\" data-callback=\"recaptchaCallback\" ></div>
                </div>
                <div class=\"form-group\">
                    <button disabled=\"disabled\" id=\"botonEnviar\" type=\"submit\" class=\"btn btn-block btn-success\">Enviar mensaje</button>
                </div>
            </form>

        </div>

    </div>

";
    }

    // line 63
    public function block_bloqueJs($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 64
        echo "
    <script type=\"text/javascript\" async defer src='https://www.google.com/recaptcha/api.js?hl=es'></script>
    <script type=\"text/javascript\">
        function recaptchaCallback() {
            \$('#botonEnviar').removeAttr('disabled');
        };
    </script>

";
    }

    // line 74
    public function block_contenedorDerecha($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 75
        echo "
";
    }

    public function getTemplateName()
    {
        return "contacto/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  181 => 75,  177 => 74,  165 => 64,  161 => 63,  142 => 47,  139 => 46,  133 => 44,  131 => 43,  125 => 40,  122 => 39,  116 => 37,  114 => 36,  108 => 33,  105 => 32,  99 => 30,  97 => 29,  90 => 24,  86 => 22,  82 => 20,  79 => 19,  77 => 18,  67 => 10,  63 => 9,  58 => 6,  56 => 5,  53 => 4,  49 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "contacto/index.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/contacto/index.html.twig");
    }
}
