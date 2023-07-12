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

/* temporada/index.html.twig */
class __TwigTemplate_35e2619318376f2371de572fc387d1473b07c9e965981df97a56597501cfc643 extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "temporada/index.html.twig", 1);
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
        $this->loadTemplate("__part/ultimosEventos.html.twig", "temporada/index.html.twig", 5)->display($context);
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
    ";
        // line 11
        if ((isset($context["categorias"]) || array_key_exists("categorias", $context))) {
            // line 12
            echo "        ";
            if ( !(null === ($context["categorias"] ?? null))) {
                // line 13
                echo "            <div class=\"row\">
                <ul id=\"menuCategorias\" class=\"col-12\">
                    ";
                // line 15
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["categorias"] ?? null));
                foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                    // line 16
                    echo "                        ";
                    if (1 === twig_compare(twig_length_filter($this->env, $context["value"]), 0)) {
                        // line 17
                        echo "                            ";
                        $context["sumaPartidos"] = 0;
                        // line 18
                        echo "
                            <li>
                                <a class=\"btn btn-secondary opcionCategoria\" data-categoria=\"";
                        // line 20
                        echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                        echo "\" href=\"\">";
                        echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                        echo "</a>
                            </li>

                        ";
                    }
                    // line 24
                    echo "                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 25
                echo "                </ul>
            </div>

            <div class=\"row\">
                ";
                // line 29
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["categorias"] ?? null));
                foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                    // line 30
                    echo "                    ";
                    if (1 === twig_compare(twig_length_filter($this->env, $context["value"]), 0)) {
                        // line 31
                        echo "                        <div id=\"menuTorneosCategoria";
                        echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                        echo "\" class=\"col-12 menuTorneosCategoria\" style=\"display: none; margin-bottom: 20px;\">
                            <div class=\"col-12 contenedorBlancoBordesRedondeados\" style=\"padding-top: 10px;\">
                                <h2 class=\"subtitulo\">";
                        // line 33
                        echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                        echo "</h2>

                                <a class=\"enlaceCerrarMenuTorneosCategoria\" style=\"position:absolute; top: 0px; right: 0px; color: #333333; font-size: 12px;\" href=\"\">CERRAR [X]</a>

                                <div class=\"row\">
                                    <div class=\"col-12\">
                                        ";
                        // line 39
                        $context["tTitulo"] = "";
                        // line 40
                        echo "                                        ";
                        $context["contador"] = 0;
                        // line 41
                        echo "
                                        ";
                        // line 42
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($context["value"]);
                        foreach ($context['_seq'] as $context["k"] => $context["torneo"]) {
                            // line 43
                            echo "
                                            ";
                            // line 44
                            $context["t"] = twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torneo"], "torneo_nombre", [], "any", false, false, false, 44), "-");
                            // line 45
                            echo "
                                            ";
                            // line 46
                            if (1 === twig_compare(twig_length_filter($this->env, ($context["t"] ?? null)), 1)) {
                                // line 47
                                echo "                                                ";
                                $context["tN"] = twig_trim_filter(twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 0, [], "any", false, false, false, 47));
                                // line 48
                                echo "                                                ";
                                $context["tG"] = twig_get_attribute($this->env, $this->source, ($context["t"] ?? null), 1, [], "any", false, false, false, 48);
                                // line 49
                                echo "                                            ";
                            } else {
                                // line 50
                                echo "                                                ";
                                $context["tN"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "torneo_nombre", [], "any", false, false, false, 50);
                                // line 51
                                echo "                                                ";
                                $context["tG"] = twig_get_attribute($this->env, $this->source, $context["torneo"], "torneo_nombre", [], "any", false, false, false, 51);
                                // line 52
                                echo "                                            ";
                            }
                            // line 53
                            echo "

                                            ";
                            // line 55
                            if (0 !== twig_compare(($context["tN"] ?? null), ($context["tTitulo"] ?? null))) {
                                // line 56
                                echo "                                                <h3 class=\"subtitulo\" style=\"margin: 10px 0px;\">";
                                echo twig_escape_filter($this->env, ($context["tN"] ?? null), "html", null, true);
                                echo "</h3>
                                            ";
                            }
                            // line 58
                            echo "
                                            ";
                            // line 59
                            $context["enlaceTorneo"] = $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("torneo_index", ["slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,                             // line 60
$context["torneo"], "torneo_nombre", [], "any", false, false, false, 60)]), "idTorneo" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,                             // line 61
$context["torneo"], "temporada_id", [], "any", false, false, false, 61)])]);
                            // line 63
                            echo "
                                            <div class=\"row\">
                                                <div class=\"col-12\">
                                                    <a class=\"enlaceTorneo\" href=\"";
                            // line 66
                            echo twig_escape_filter($this->env, ($context["enlaceTorneo"] ?? null), "html", null, true);
                            echo "\">
                                                        ";
                            // line 67
                            echo twig_escape_filter($this->env, ($context["tG"] ?? null), "html", null, true);
                            echo "

                                                        ";
                            // line 69
                            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["cabecera"] ?? null), twig_get_attribute($this->env, $this->source, $context["torneo"], "temporada_id", [], "any", false, false, false, 69), [], "array", false, true, false, 69), "partidos", [], "any", true, true, false, 69)) {
                                // line 70
                                echo "                                                            ";
                                $context["partidosTor"] = twig_get_attribute($this->env, $this->source, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["cabecera"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4[twig_get_attribute($this->env, $this->source, $context["torneo"], "temporada_id", [], "any", false, false, false, 70)] ?? null) : null), "partidos", [], "any", false, false, false, 70);
                                // line 71
                                echo "                                                        ";
                            } else {
                                // line 72
                                echo "                                                            ";
                                $context["partidosTor"] = 0;
                                // line 73
                                echo "                                                        ";
                            }
                            // line 74
                            echo "
                                                        ";
                            // line 75
                            if (1 === twig_compare(($context["partidosTor"] ?? null), 0)) {
                                // line 76
                                echo "                                                            ";
                                $context["sumaPartidos"] = (($context["sumaPartidos"] ?? null) + ($context["partidosTor"] ?? null));
                                // line 77
                                echo "                                                            <span class=\"badge pull-right\">
                                                                ";
                                // line 78
                                echo twig_escape_filter($this->env, ($context["partidosTor"] ?? null), "html", null, true);
                                echo "
                                                            </span>
                                                        ";
                            }
                            // line 81
                            echo "
                                                    </a>
                                                </div>
                                            </div>


                                            ";
                            // line 87
                            $context["tTitulo"] = ($context["tN"] ?? null);
                            // line 88
                            echo "
                                        ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['k'], $context['torneo'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 90
                        echo "                                    </div>
                                </div>
                            </div>
                        </div>
                    ";
                    }
                    // line 95
                    echo "                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 96
                echo "            </div>


        ";
            }
            // line 100
            echo "    ";
        }
        // line 101
        echo "
    <div id=\"cabeceraTorneo\" class=\"row\">

        <div class=\"col-12\">
            <h1>
                ";
        // line 106
        echo twig_escape_filter($this->env, ($context["nombreTorneo"] ?? null), "html", null, true);
        echo "
            </h1>
            <span class=\"contenedorBandera\">
                ";
        // line 109
        if (1 === twig_compare(($context["comunidad_id"] ?? null), 1)) {
            // line 110
            echo "
                    ";
            // line 111
            $context["nombrePais"] = ($context["nombreComunidad"] ?? null);
            // line 112
            echo "
                    ";
            // line 113
            if ((0 === twig_compare(($context["comunidad_id"] ?? null), 10) && 0 === twig_compare(($context["categoria_torneo_id"] ?? null), 1))) {
                // line 114
                echo "                        ";
                $context["comunidad_id"] = 55;
                // line 115
                echo "                        ";
                $context["nombrePais"] = (($context["nombrePais"] ?? null) . " y Melilla");
                // line 116
                echo "                    ";
            } elseif ((0 === twig_compare(($context["comunidad_id"] ?? null), 11) && 0 === twig_compare(($context["categoria_torneo_id"] ?? null), 1))) {
                // line 117
                echo "                        ";
                $context["comunidad_id"] = 56;
                // line 118
                echo "                        ";
                $context["nombrePais"] = (($context["nombrePais"] ?? null) . " y Ceuta");
                // line 119
                echo "                    ";
            }
            // line 120
            echo "                    <div class=\"comunidad flag";
            echo twig_escape_filter($this->env, ($context["comunidad_id"] ?? null), "html", null, true);
            echo "\"></div>
                ";
        } else {
            // line 122
            echo "                    <div class=\"pais flag";
            echo twig_escape_filter($this->env, ($context["idPais"] ?? null), "html", null, true);
            echo "b\"></div>
                ";
        }
        // line 124
        echo "            </span>
            <span><h2 class=\"subtitulo\">";
        // line 125
        echo twig_escape_filter($this->env, ($context["nombrePais"] ?? null), "html", null, true);
        echo "</h2></span>
        </div>

        <div class=\"col-12 text-center contenedorDescripcionTorneo\">
            <p>";
        // line 129
        echo twig_escape_filter($this->env, ($context["textoLiga"] ?? null), "html", null, true);
        echo "</p>
            ";
        // line 130
        $context["espacio"] = "temporadaJornada";
        // line 131
        echo "            ";
        $this->loadTemplate("publicidad/publiGestion.html.twig", "temporada/index.html.twig", 131)->display($context);
        // line 132
        echo "        </div>

    </div>


    ";
        // line 137
        if (0 === twig_compare(($context["tipoTorneo"] ?? null), 1)) {
            // line 138
            echo "        ";
            $this->loadTemplate("temporada/__content/liga.html.twig", "temporada/index.html.twig", 138)->display($context);
            // line 139
            echo "    ";
        } elseif (0 === twig_compare(($context["tipoTorneo"] ?? null), 2)) {
            // line 140
            echo "        ";
            $this->loadTemplate("temporada/__content/eliminatorio.html.twig", "temporada/index.html.twig", 140)->display($context);
            // line 141
            echo "    ";
        } elseif (0 === twig_compare(($context["tipoTorneo"] ?? null), 3)) {
            // line 142
            echo "        ";
            $this->loadTemplate("temporada/__content/eliminatorio.html.twig", "temporada/index.html.twig", 142)->display($context);
            // line 143
            echo "    ";
        } elseif (0 === twig_compare(($context["tipoTorneo"] ?? null), 4)) {
            // line 144
            echo "        ";
            $this->loadTemplate("temporada/__content/eliminatorioCorto.html.twig", "temporada/index.html.twig", 144)->display($context);
            // line 145
            echo "    ";
        } elseif (0 === twig_compare(($context["tipoTorneo"] ?? null), 5)) {
            // line 146
            echo "        ";
            $this->loadTemplate("temporada/__content/amistoso.html.twig", "temporada/index.html.twig", 146)->display($context);
            // line 147
            echo "    ";
        } elseif (0 === twig_compare(($context["tipoTorneo"] ?? null), 6)) {
            // line 148
            echo "
    ";
        } elseif (0 === twig_compare(        // line 149
($context["tipoTorneo"] ?? null), 7)) {
            // line 150
            echo "
    ";
        } elseif (0 === twig_compare(        // line 151
($context["tipoTorneo"] ?? null), 8)) {
            // line 152
            echo "
    ";
        }
        // line 154
        echo "

";
    }

    // line 158
    public function block_bloqueJs($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 159
        echo "
<script type=\"text/javascript\">

    function mostrarPestanaAmistosos(pestanaMostrar) {
        console.log(pestanaMostrar);

        \$('#tabsAmistosos .nav-link').each(function(i, el) {
            var jEl = \$(el);
            jEl.removeClass('active');
        });
        \$('#tabsAmistosos #' + pestanaMostrar + '-tab').addClass('active');
        \$('#tabsAmistososContent .tab-pane').removeClass('show active');
        \$('#tabsAmistososContent #' + pestanaMostrar).addClass('show active');
    }

    \$(document).on('click', '#ayer-tab, #hoy-tab, #manana-tab, #proximos-dias-tab', function (e) {
        var jThis = \$(this);
        var pestana = jThis.attr('aria-controls');

        mostrarPestanaAmistosos(pestana);
    });

    \$(document).on('click', '#menuCategorias a.opcionCategoria', function(e){
        e.preventDefault();
        e.stopPropagation();

        var jThis = \$(this);
        var nombreCategoria = jThis.data('categoria');

        \$('.menuTorneosCategoria').fadeOut(500);
        \$('#menuTorneosCategoria' + nombreCategoria).fadeIn(500);
    });

    \$(document).on('click', '.enlaceCerrarMenuTorneosCategoria', function(e) {
        e.preventDefault();
        e.stopPropagation();

        \$('.menuTorneosCategoria').fadeOut(500);

    });


    function refrescaPaginaTemporada()
    {
        var dt = new Date();
        var time = dt.getHours() + \":\" + dt.getMinutes() + \":\" + dt.getSeconds();
        \$.ajax({
            type: 'GET',
            url: '";
        // line 207
        echo twig_escape_filter($this->env, ($context["pgTemporada"] ?? null), "html", null, true);
        echo "'
        })
        .done(function(data) {
            console.log(\$(data).find('#contenedorCentral').html());
            \$('#contenedorCentral').html(\$(data).find('#contenedorCentral').html());
        });
        \$('.actua').html('Actualizado a las '+time);
    }

    ";
        // line 216
        if (1 === twig_compare(twig_length_filter($this->env, ($context["directos"] ?? null)), 0)) {
            // line 217
            echo "
        setInterval(function(){
            refrescaPaginaTemporada();
        },30000);

        /*
        setInterval(function(){
            \$.ajax({
                type: 'GET',
                url: \"/srcPagajax/clasificacion.php\",
                data: \"id=\" + ";
            // line 227
            echo twig_escape_filter($this->env, ($context["temporada_id"] ?? null), "html", null, true);
            echo ",
        })
        .done(function( data ) {
                \$('.bloque-clasificacion').html(data);
            });
        },30000);
        */
    ";
        }
        // line 235
        echo "

    ";
        // line 237
        if (0 === twig_compare(($context["desarrollo"] ?? null), 1)) {
            // line 238
            echo "        cuadro_honor(";
            echo twig_escape_filter($this->env, ($context["temporada_id"] ?? null), "html", null, true);
            echo ");
    ";
        }
        // line 240
        echo "

    ";
        // line 242
        if (0 === twig_compare(($context["tipoTorneo"] ?? null), 7)) {
            // line 243
            echo "        \$('#fasesh').on('change', function (event) {
            var fase = \$('#fasesh').val();
            console.log(fase);

            window.location.href = \"/resultados-directo/torneo/";
            // line 247
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [($context["nombreTorneo"] ?? null)]), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, ($context["temporada_original"] ?? null), "html", null, true);
            echo "/\" + fase + \"&idH7=";
            echo twig_escape_filter($this->env, ($context["htid"] ?? null), "html", null, true);
            echo "\";
        })

        \$( document ).ready(function(){
            // \$('.faseEliminatorio').not('#fase<?php echo \$jornadaActiva; ?>').hide();
            \$('.clasificacionFase').not('#clasificacionFase";
            // line 252
            echo twig_escape_filter($this->env, ($context["jornadaActiva"] ?? null), "html", null, true);
            echo "').hide();
        })

        \$('.grupo').on('click', function (event) {
            var grupo = \$(this).attr('data-id');
            var ngrupo = \$(this).text();
            console.log(ngrupo);
            \$('#grupo_id').val(grupo);
            \$('#nombreprimerGrupo').html(ngrupo);
            \$('.grupoEliminatorio').show();
            \$('.grupoEliminatorio').not('.grupo' + grupo).hide();
            \$('.grupoEliminatorio .grupo' + grupo).show();
            \$('.clasificacionGrupo').show();
            \$('.clasificacionGrupo').not('#clasificacionGrupo' + grupo).hide();
            \$('.clasificacionGrupo #clasificacionGrupo' + grupo).show();
        })
    ";
        }
        // line 269
        echo "
    ";
        // line 270
        if ((0 === twig_compare(($context["tipoTorneo"] ?? null), 2) || 0 === twig_compare(($context["tipoTorneo"] ?? null), 8))) {
            // line 271
            echo "        \$( document ).ready(function(){
            // \$('.faseEliminatorio').not('#fase<?php echo \$jornadaActiva; ?>').hide();
            \$('.clasificacionFase').not('#clasificacionFase";
            // line 273
            echo twig_escape_filter($this->env, ($context["jornadaActiva"] ?? null), "html", null, true);
            echo "').hide();
        })

        \$(document).on('change', '#fases', function (event) {
            var fase = \$('#fases').val();

            var urlBaseJornada = '";
            // line 279
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("torneo_jornada", ["idTorneo" =>             // line 280
($context["temporada_id"] ?? null), "slug" =>             // line 281
($context["slug"] ?? null), "slug" =>             // line 282
($context["slug"] ?? null), "jornada" => "-AA-JORNADA-AA-"]), "html", null, true);
            // line 284
            echo "'

            var urlJornada = urlBaseJornada.replace('-AA-JORNADA-AA-', fase);

            window.location.href = urlJornada;
        })

        \$('.grupo').on('click', function (event) {
            var grupo = \$(this).attr('data-id');
            var ngrupo = \$(this).text();
            console.log(ngrupo);
            \$('#grupo_id').val(grupo);
            \$('#nombreprimerGrupo').html(ngrupo);
            \$('.grupoEliminatorio').show();
            \$('.grupoEliminatorio').not('.grupo' + grupo).hide();
            \$('.grupoEliminatorio .grupo' + grupo).show();
            \$('.clasificacionGrupo').show();
            \$('.clasificacionGrupo').not('#clasificacionGrupo' + grupo).hide();
            \$('.clasificacionGrupo #clasificacionGrupo' + grupo).show();
        })
    ";
        }
        // line 305
        echo "</script>

<script src=\"";
        // line 307
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("home"), "html", null, true);
        echo "static/js/tablesorter/jquery.tablesorter.js\"></script>
<script>
    if (\$('#latabla').length == 1) {
        \$(function(){
            \$('#latabla').tablesorter();
        });
    }
</script>
";
    }

    // line 319
    public function block_contenedorDerecha($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 320
        echo "
    ";
        // line 321
        $this->loadTemplate("temporada/__content/__part/pesEquipos.html.twig", "temporada/index.html.twig", 321)->display($context);
        // line 322
        echo "
";
    }

    public function getTemplateName()
    {
        return "temporada/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  631 => 322,  629 => 321,  626 => 320,  622 => 319,  609 => 307,  605 => 305,  582 => 284,  580 => 282,  579 => 281,  578 => 280,  577 => 279,  568 => 273,  564 => 271,  562 => 270,  559 => 269,  539 => 252,  527 => 247,  521 => 243,  519 => 242,  515 => 240,  509 => 238,  507 => 237,  503 => 235,  492 => 227,  480 => 217,  478 => 216,  466 => 207,  416 => 159,  412 => 158,  406 => 154,  402 => 152,  400 => 151,  397 => 150,  395 => 149,  392 => 148,  389 => 147,  386 => 146,  383 => 145,  380 => 144,  377 => 143,  374 => 142,  371 => 141,  368 => 140,  365 => 139,  362 => 138,  360 => 137,  353 => 132,  350 => 131,  348 => 130,  344 => 129,  337 => 125,  334 => 124,  328 => 122,  322 => 120,  319 => 119,  316 => 118,  313 => 117,  310 => 116,  307 => 115,  304 => 114,  302 => 113,  299 => 112,  297 => 111,  294 => 110,  292 => 109,  286 => 106,  279 => 101,  276 => 100,  270 => 96,  264 => 95,  257 => 90,  250 => 88,  248 => 87,  240 => 81,  234 => 78,  231 => 77,  228 => 76,  226 => 75,  223 => 74,  220 => 73,  217 => 72,  214 => 71,  211 => 70,  209 => 69,  204 => 67,  200 => 66,  195 => 63,  193 => 61,  192 => 60,  191 => 59,  188 => 58,  182 => 56,  180 => 55,  176 => 53,  173 => 52,  170 => 51,  167 => 50,  164 => 49,  161 => 48,  158 => 47,  156 => 46,  153 => 45,  151 => 44,  148 => 43,  144 => 42,  141 => 41,  138 => 40,  136 => 39,  127 => 33,  121 => 31,  118 => 30,  114 => 29,  108 => 25,  102 => 24,  93 => 20,  89 => 18,  86 => 17,  83 => 16,  79 => 15,  75 => 13,  72 => 12,  70 => 11,  67 => 10,  63 => 9,  58 => 6,  56 => 5,  53 => 4,  49 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "temporada/index.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.eu/v2/templates/temporada/index.html.twig");
    }
}
