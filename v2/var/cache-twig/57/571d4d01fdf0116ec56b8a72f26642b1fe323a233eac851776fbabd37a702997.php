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
class __TwigTemplate_2a89af574ffdec0efa9ffdf8dd1794508b5e337d51788b19210c9a709fb83443 extends Template
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
            echo "
                    ";
            // line 121
            if (0 === twig_compare(($context["temporada_id"] ?? null), 3093)) {
                // line 122
                echo "                        ";
                $context["comunidad_id"] = 22;
                // line 123
                echo "                        ";
                $context["nombrePais"] = "Ceuta";
                // line 124
                echo "                    ";
            }
            // line 125
            echo "
                    ";
            // line 126
            if (0 === twig_compare(($context["temporada_id"] ?? null), 3096)) {
                // line 127
                echo "                        ";
                $context["comunidad_id"] = 21;
                // line 128
                echo "                        ";
                $context["nombrePais"] = "Melilla";
                // line 129
                echo "                    ";
            }
            // line 130
            echo "
                    <div class=\"comunidad flag";
            // line 131
            echo twig_escape_filter($this->env, ($context["comunidad_id"] ?? null), "html", null, true);
            echo "\"></div>
                ";
        } else {
            // line 133
            echo "                    <div class=\"pais flag";
            echo twig_escape_filter($this->env, ($context["idPais"] ?? null), "html", null, true);
            echo "b\"></div>
                ";
        }
        // line 135
        echo "            </span>
            <span><h2 class=\"subtitulo\">";
        // line 136
        echo twig_escape_filter($this->env, ($context["nombrePais"] ?? null), "html", null, true);
        echo "</h2></span>
        </div>

        <div class=\"col-12 text-center contenedorDescripcionTorneo\">
            <p>";
        // line 140
        echo twig_escape_filter($this->env, ($context["textoLiga"] ?? null), "html", null, true);
        echo "</p>
            ";
        // line 141
        if (call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_MOBILE__"])) {
            // line 142
            echo "                ";
            $context["espacio"] = "temporadaJornadaMobile";
            // line 143
            echo "            ";
        } else {
            // line 144
            echo "                ";
            $context["espacio"] = "temporadaJornada";
            // line 145
            echo "            ";
        }
        // line 146
        echo "            ";
        $this->loadTemplate("publicidad/publiGestion.html.twig", "temporada/index.html.twig", 146)->display($context);
        // line 147
        echo "        </div>

    </div>


    ";
        // line 152
        if (0 === twig_compare(($context["tipoTorneo"] ?? null), 1)) {
            // line 153
            echo "        ";
            $this->loadTemplate("temporada/__content/liga.html.twig", "temporada/index.html.twig", 153)->display($context);
            // line 154
            echo "    ";
        } elseif (0 === twig_compare(($context["tipoTorneo"] ?? null), 2)) {
            // line 155
            echo "        ";
            $this->loadTemplate("temporada/__content/eliminatorio.html.twig", "temporada/index.html.twig", 155)->display($context);
            // line 156
            echo "    ";
        } elseif (0 === twig_compare(($context["tipoTorneo"] ?? null), 3)) {
            // line 157
            echo "        ";
            $this->loadTemplate("temporada/__content/eliminatorio.html.twig", "temporada/index.html.twig", 157)->display($context);
            // line 158
            echo "    ";
        } elseif (0 === twig_compare(($context["tipoTorneo"] ?? null), 4)) {
            // line 159
            echo "        ";
            $this->loadTemplate("temporada/__content/eliminatorioCorto.html.twig", "temporada/index.html.twig", 159)->display($context);
            // line 160
            echo "    ";
        } elseif (0 === twig_compare(($context["tipoTorneo"] ?? null), 5)) {
            // line 161
            echo "        ";
            $this->loadTemplate("temporada/__content/amistoso.html.twig", "temporada/index.html.twig", 161)->display($context);
            // line 162
            echo "    ";
        } elseif (0 === twig_compare(($context["tipoTorneo"] ?? null), 6)) {
            // line 163
            echo "
    ";
        } elseif (0 === twig_compare(        // line 164
($context["tipoTorneo"] ?? null), 7)) {
            // line 165
            echo "
    ";
        } elseif (0 === twig_compare(        // line 166
($context["tipoTorneo"] ?? null), 8)) {
            // line 167
            echo "
    ";
        }
        // line 169
        echo "

";
    }

    // line 173
    public function block_bloqueJs($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 174
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
        // line 222
        echo twig_escape_filter($this->env, ($context["pgTemporada"] ?? null), "html", null, true);
        echo "',
            ajax: false,
        })
        .done(function(data) {
            console.log(\$(data).find('#contenedorCentral').html());
            \$('#contenedorCentral').html(\$(data).find('#contenedorCentral').html());
        });
        \$('.actua').html('Actualizado a las '+time);
    }

    ";
        // line 232
        if (1 === twig_compare(twig_length_filter($this->env, ($context["directos"] ?? null)), 0)) {
            // line 233
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
            // line 243
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
        // line 251
        echo "

    ";
        // line 253
        if (0 === twig_compare(($context["desarrollo"] ?? null), 1)) {
            // line 254
            echo "        cuadro_honor(";
            echo twig_escape_filter($this->env, ($context["temporada_id"] ?? null), "html", null, true);
            echo ");
    ";
        }
        // line 256
        echo "

    ";
        // line 258
        if (0 === twig_compare(($context["tipoTorneo"] ?? null), 7)) {
            // line 259
            echo "        \$('#fasesh').on('change', function (event) {
            var fase = \$('#fasesh').val();
            console.log(fase);

            window.location.href = \"/resultados-directo/torneo/";
            // line 263
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
            // line 268
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
        // line 285
        echo "
    ";
        // line 286
        if ((0 === twig_compare(($context["tipoTorneo"] ?? null), 2) || 0 === twig_compare(($context["tipoTorneo"] ?? null), 8))) {
            // line 287
            echo "        \$( document ).ready(function(){
            // \$('.faseEliminatorio').not('#fase<?php echo \$jornadaActiva; ?>').hide();
            \$('.clasificacionFase').not('#clasificacionFase";
            // line 289
            echo twig_escape_filter($this->env, ($context["jornadaActiva"] ?? null), "html", null, true);
            echo "').hide();
        })

        \$(document).on('change', '#fases', function (event) {
            var fase = \$('#fases').val();

            var urlBaseJornada = '";
            // line 295
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("torneo_jornada", ["idTorneo" =>             // line 296
($context["temporada_id"] ?? null), "slug" =>             // line 297
($context["slug"] ?? null), "slug" =>             // line 298
($context["slug"] ?? null), "jornada" => "-AA-JORNADA-AA-"]), "html", null, true);
            // line 300
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
        // line 321
        echo "</script>

<script src=\"";
        // line 323
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

    // line 336
    public function block_contenedorDerecha($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 337
        echo "
    ";
        // line 338
        $this->loadTemplate("temporada/__content/__part/pesEquipos.html.twig", "temporada/index.html.twig", 338)->display($context);
        // line 339
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
        return array (  675 => 339,  673 => 338,  670 => 337,  666 => 336,  652 => 323,  648 => 321,  625 => 300,  623 => 298,  622 => 297,  621 => 296,  620 => 295,  611 => 289,  607 => 287,  605 => 286,  602 => 285,  582 => 268,  570 => 263,  564 => 259,  562 => 258,  558 => 256,  552 => 254,  550 => 253,  546 => 251,  535 => 243,  523 => 233,  521 => 232,  508 => 222,  458 => 174,  454 => 173,  448 => 169,  444 => 167,  442 => 166,  439 => 165,  437 => 164,  434 => 163,  431 => 162,  428 => 161,  425 => 160,  422 => 159,  419 => 158,  416 => 157,  413 => 156,  410 => 155,  407 => 154,  404 => 153,  402 => 152,  395 => 147,  392 => 146,  389 => 145,  386 => 144,  383 => 143,  380 => 142,  378 => 141,  374 => 140,  367 => 136,  364 => 135,  358 => 133,  353 => 131,  350 => 130,  347 => 129,  344 => 128,  341 => 127,  339 => 126,  336 => 125,  333 => 124,  330 => 123,  327 => 122,  325 => 121,  322 => 120,  319 => 119,  316 => 118,  313 => 117,  310 => 116,  307 => 115,  304 => 114,  302 => 113,  299 => 112,  297 => 111,  294 => 110,  292 => 109,  286 => 106,  279 => 101,  276 => 100,  270 => 96,  264 => 95,  257 => 90,  250 => 88,  248 => 87,  240 => 81,  234 => 78,  231 => 77,  228 => 76,  226 => 75,  223 => 74,  220 => 73,  217 => 72,  214 => 71,  211 => 70,  209 => 69,  204 => 67,  200 => 66,  195 => 63,  193 => 61,  192 => 60,  191 => 59,  188 => 58,  182 => 56,  180 => 55,  176 => 53,  173 => 52,  170 => 51,  167 => 50,  164 => 49,  161 => 48,  158 => 47,  156 => 46,  153 => 45,  151 => 44,  148 => 43,  144 => 42,  141 => 41,  138 => 40,  136 => 39,  127 => 33,  121 => 31,  118 => 30,  114 => 29,  108 => 25,  102 => 24,  93 => 20,  89 => 18,  86 => 17,  83 => 16,  79 => 15,  75 => 13,  72 => 12,  70 => 11,  67 => 10,  63 => 9,  58 => 6,  56 => 5,  53 => 4,  49 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "temporada/index.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.com/v2/templates/temporada/index.html.twig");
    }
}
