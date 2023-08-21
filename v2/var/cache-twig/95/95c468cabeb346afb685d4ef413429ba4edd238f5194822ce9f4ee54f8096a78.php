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

/* aviso-legal/index.html.twig */
class __TwigTemplate_d9e79d8d3dd8cdc66f7702ac2ea43242626b37b5bc8d0227a80606368cd6bdcc extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "aviso-legal/index.html.twig", 1);
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
        $this->loadTemplate("__part/ultimosEventos.html.twig", "aviso-legal/index.html.twig", 5)->display($context);
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
    <div class=\"col-12 contenedorBlancoBordesRedondeados\">
        <h1>Aviso Legal</h1>

        <strong>Protección de datos personales</strong><br>
                www.futbolme.com, Email de contacto <strong>info@futbolme.com</strong><br><br>
                
                <strong>No se obtiene ningún tipo de datos personales</strong><br>
                Futbolme.com no obtiene ningún tipo de datos personales mediante ningún procedimiento. Basa su información respecto al usuario mediante cookies y tokens proporcionadas por el dispositivo de acceso. Para cualquier información al respecto pueden utilizar el email de contacto <strong>info@futbolme.com</strong><br><br>

                <strong>Cookies</strong><br>
                www.futbolme.com guarda una cookie para facilitar la información al usuario. Esta cookie no es nociva ni puede dañar su equipo.<br><br>

                <strong>Tokens</strong><br>
                www.futbolme.com guarda una token para facilitar la información al usuario. Esta token es proporcionado por el dispositivo móvil cuando se accede mediante la APP de futbolme.com<br><br>
                
                <strong>Propiedad intelectual</strong><br>
                Futbolme es una marca registrada y esta prohibida la utilización total o parcial de logos, diseños y textos, así como la copia, reproducción, adaptación  o cualquier acción que utilice contenidos del portal sin la previa aprobación de Futbolme.<br><br>
                
                <strong>Enlaces de terceros y banners publicitarios</strong><br>

                Entre los contenidos del portal www.futbolme.com se incluyen banners publicitarios y enlaces a Webs externas, gestionadas por terceros. No se responsabiliza del los enlaces a terceros, contenido de los mismos ni ningún servicio prestado en dichos enlaces externos.<br><br>
                
                <strong>Exención de responsabilidad de FUTBOLME.COM </strong><br>
                FUTBOLME.COM en ningún caso sera responsable de las circunstancias que que seguidamente se mencionan:<br>
                1) Posibles errores de seguridad que se pueda producir por el hecho de utilizar sistemas informáticos infectados por virus.<br>
                2) Infracciones del derecho de propiedad industrial e intelectual por parte de terceros.<br>
                3) Defectos en los servicios o errores en el contenido de la Web de www.futbolme.com<br>

                4) No funcionamiento de la Web o algunos de los servicios<br>
                5) Problemas causados por el mal funcionamiento del navegador Web usado por el visitante o por el uso de versiones no actualizadas de este.
    </div>

";
    }

    // line 45
    public function block_bloqueJs($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 46
        echo "
";
    }

    // line 49
    public function block_contenedorDerecha($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 50
        echo "
";
    }

    public function getTemplateName()
    {
        return "aviso-legal/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 50,  113 => 49,  108 => 46,  104 => 45,  67 => 10,  63 => 9,  58 => 6,  56 => 5,  53 => 4,  49 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "aviso-legal/index.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/aviso-legal/index.html.twig");
    }
}
