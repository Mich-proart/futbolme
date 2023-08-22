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

/* equipo/__part/pesDatos.html.twig */
class __TwigTemplate_c20919d794ac933013cca7d8690ca773cb4bd15e2bd777f8ac01fd66ad63619f extends Template
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
    ";
        // line 2
        $this->loadTemplate("publicidad/cuerpo03.html.twig", "equipo/__part/pesDatos.html.twig", 2)->display($context);
        // line 3
        echo "</div>
<div style=\"margin-top: 10px\" class=\"col-12 contenedorBlancoBordesRedondeadosConPadding\">
    <div class=\"row\">
        <div class=\"col-6\">
            <h3>";
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["equipoClub"] ?? null), "nombreEstadio", [], "any", false, false, false, 7), "html", null, true);
        echo "</h3>
            <span>
                    ";
        // line 9
        if (1 === twig_compare(twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["equipoClub"] ?? null), "direccionEstadio", [], "any", false, false, false, 9)), 5)) {
            // line 10
            echo "                        ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["equipoClub"] ?? null), "direccionEstadio", [], "any", false, false, false, 10), "html", null, true);
            echo " -
                    ";
        }
        // line 12
        echo "
                ";
        // line 13
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["equipoClub"] ?? null), "localidadEstadio", [], "any", false, false, false, 13), "html", null, true);
        echo "
                </span>

            <hr>

            <div>
                Año de inauguración: ";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["equipoClub"] ?? null), "inaguracion", [], "any", false, false, false, 19), "html", null, true);
        echo "
            </div>
            <div>
                Capacidad: ";
        // line 22
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["equipoClub"] ?? null), "capacidad", [], "any", false, false, false, 22), "html", null, true);
        echo "
            </div>
        </div>

        ";
        // line 26
        $context["rutaEstadio"] = (("static/img/estadios/estadi" . twig_get_attribute($this->env, $this->source, ($context["equipoClub"] ?? null), "estadio_id", [], "any", false, false, false, 26)) . ".png");
        // line 27
        echo "        ";
        if ( !call_user_func_array($this->env->getFunction('fileExists')->getCallable(), [($context["rutaEstadio"] ?? null)])) {
            // line 28
            echo "            ";
            $context["rutaEstadio"] = "static/img/jugadores/NI.png";
            // line 29
            echo "        ";
        }
        // line 30
        echo "        <div class=\"col-6\">
            <img style='max-width:100%' src='";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo twig_escape_filter($this->env, ($context["rutaEstadio"] ?? null), "html", null, true);
        echo "' alt=\"campo de futbol\">
        </div>

        <div class=\"col-12 text-right\">
            <span class=\"small\">Puedes enviar fotos y datos de estadios a jugadores@futbolme.net</span>
        </div>
    </div>
</div>

<div style=\"margin-top: 10px;\" class=\"col-12 contenedorBlancoBordesRedondeadosConPadding\">
    <div class=\"row\">
        <div class=\"col-7\">
            <h3>Datos del club</h3>
            <div><strong>";
        // line 44
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["equipoClub"] ?? null), "nombre_completo", [], "any", false, false, false, 44), "html", null, true);
        echo "</strong></div>
            ";
        // line 45
        $context["fundado"] = 0;
        // line 46
        echo "            ";
        if ((1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["equipoClub"] ?? null), "fundado", [], "any", false, false, false, 46), 0) || 1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["equipoClub"] ?? null), "efundado", [], "any", false, false, false, 46), 0))) {
            // line 47
            echo "
                <div>Fundado en
                    ";
            // line 49
            if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["equipoClub"] ?? null), "efundado", [], "any", false, false, false, 49), 0)) {
                // line 50
                echo "                        ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["equipoClub"] ?? null), "efundado", [], "any", false, false, false, 50), "html", null, true);
                echo "
                    ";
            } else {
                // line 52
                echo "                        ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["equipoClub"] ?? null), "fundado", [], "any", false, false, false, 52), "html", null, true);
                echo "
                    ";
            }
            // line 54
            echo "                </div>
            ";
        }
        // line 56
        echo "
            ";
        // line 57
        if (0 === twig_compare(($context["desaparecido"] ?? null), 0)) {
            // line 58
            echo "                
                ";
            // line 67
            echo "
                <div><strong>Web:</strong> <a href='http://";
            // line 68
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["equipoClub"] ?? null), "web", [], "any", false, false, false, 68), "html", null, true);
            echo "'
                                              target='_blank'>";
            // line 69
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["equipoClub"] ?? null), "web", [], "any", false, false, false, 69), "html", null, true);
            echo "</a></div>
            ";
        } else {
            // line 71
            echo "                <div>Desaparecido en ";
            echo twig_escape_filter($this->env, ($context["desaparecido"] ?? null), "html", null, true);
            echo "</div>
            ";
        }
        // line 73
        echo "        </div>

        <div class=\"col-5\">

            ";
        // line 77
        $context["rutaEquipacion"] = (("static/img/equipaciones/eq" . twig_get_attribute($this->env, $this->source, ($context["equipoClub"] ?? null), "equipacion_id", [], "any", false, false, false, 77)) . ".png");
        // line 78
        echo "            ";
        if ( !call_user_func_array($this->env->getFunction('fileExists')->getCallable(), [($context["rutaEquipacion"] ?? null)])) {
            // line 79
            echo "                ";
            $context["rutaEquipacion"] = "static/img/jugadores/NI.png";
            // line 80
            echo "            ";
        }
        // line 81
        echo "
            <img width='60' src='";
        // line 82
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo twig_escape_filter($this->env, ($context["rutaEquipacion"] ?? null), "html", null, true);
        echo "'
                 alt=\"equipacion ";
        // line 83
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["equipoClub"] ?? null), "nombre_completo", [], "any", false, false, false, 83), "html", null, true);
        echo "\">
            Equipación: Camiseta ";
        // line 84
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["equipoClub"] ?? null), "camiseta", [], "any", false, false, false, 84), "html", null, true);
        echo ",
            pantalón ";
        // line 85
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["equipoClub"] ?? null), "pantalon", [], "any", false, false, false, 85), "html", null, true);
        echo " y medias ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["equipoClub"] ?? null), "media", [], "any", false, false, false, 85), "html", null, true);
        echo ".
        </div>
    </div>
</div>
<!-- OnnetWork newPubli-->
<script type=\"text/javascript\" src=\"https://video.onnetwork.tv/embed.php?sid=M2d3LDVUYXgsMA==\"></script>
";
        // line 92
        echo "<div id=\"13939-2\">
    <script src=\"//ads.themoneytizer.com/s/gen.js?type=2\"></script>
    <script src=\"//ads.themoneytizer.com/s/requestform.js?siteId=13939&formatId=2\" ></script>
</div>";
    }

    public function getTemplateName()
    {
        return "equipo/__part/pesDatos.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  218 => 92,  207 => 85,  203 => 84,  199 => 83,  194 => 82,  191 => 81,  188 => 80,  185 => 79,  182 => 78,  180 => 77,  174 => 73,  168 => 71,  163 => 69,  159 => 68,  156 => 67,  153 => 58,  151 => 57,  148 => 56,  144 => 54,  138 => 52,  132 => 50,  130 => 49,  126 => 47,  123 => 46,  121 => 45,  117 => 44,  100 => 31,  97 => 30,  94 => 29,  91 => 28,  88 => 27,  86 => 26,  79 => 22,  73 => 19,  64 => 13,  61 => 12,  55 => 10,  53 => 9,  48 => 7,  42 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "equipo/__part/pesDatos.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/equipo/__part/pesDatos.html.twig");
    }
}
