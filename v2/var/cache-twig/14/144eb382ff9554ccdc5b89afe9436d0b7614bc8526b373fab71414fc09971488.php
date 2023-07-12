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

/* index/__part/contenidoIndex.html.twig */
class __TwigTemplate_b8d413d9bd95051db0e9f8e98daefe90988933ff72204ea312800c3118df9d0e extends Template
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
        // line 2
        echo "
<div id=\"bloque-resto\">
    ";
        // line 4
        $context["temp_id"] = 0;
        // line 5
        echo "    ";
        $context["contador"] = 0;
        // line 6
        echo "    ";
        $context["contadorAUX"] = 0;
        // line 7
        echo "    ";
        $context["esAnuncioGrande"] = false;
        // line 8
        echo "    ";
        $context["equiposTw"] = [];
        // line 9
        echo "
    <div class=\"row\">
        <div class=\"col-12\">
            ";
        // line 12
        $context["espacio"] = "cabeceraPartidos";
        // line 13
        echo "            ";
        if (call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_IOS__"])) {
            // line 14
            echo "                ";
            $context["espacio"] = "cabeceraPartidosiOS";
            // line 15
            echo "            ";
        }
        // line 16
        echo "            ";
        $this->loadTemplate("publicidad/publiGestion.html.twig", "index/__part/contenidoIndex.html.twig", 16)->display($context);
        // line 17
        echo "        </div>
    </div>

    ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["partidosIndex"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["kk"] => $context["partido"]) {
            // line 21
            echo "

        ";
            // line 23
            $context["contador"] = (($context["contador"] ?? null) + 1);
            // line 24
            echo "        ";
            if (0 === twig_compare(($context["contador"] ?? null), 4)) {
                // line 25
                echo "            <div class=\"row\">
                <div class=\"col-12\">
                    ";
                // line 27
                $context["espacio"] = "entrePartidos";
                // line 28
                echo "                    ";
                $this->loadTemplate("publicidad/publiGestion.html.twig", "index/__part/contenidoIndex.html.twig", 28)->display($context);
                // line 29
                echo "                </div>
            </div>
        ";
            }
            // line 32
            echo "
        ";
            // line 33
            $context["colorFondo"] = "whitebox";
            // line 34
            echo "
        ";
            // line 35
            if (((0 !== twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "idPais", [], "any", false, false, false, 35), 60) && 0 !== twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "idPais", [], "any", false, false, false, 35), 200)) || 0 === twig_compare("España", twig_get_attribute($this->env, $this->source, $context["partido"], "local", [], "any", false, false, false, 35)))) {
                // line 36
                echo "            ";
                $context["colorL"] = "background-color:#F4FA58";
                // line 37
                echo "        ";
            } else {
                // line 38
                echo "            ";
                $context["colorL"] = "background-color:white";
                // line 39
                echo "        ";
            }
            // line 40
            echo "
        ";
            // line 41
            if (((0 !== twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "idPais", [], "any", false, false, false, 41), 60) && 0 !== twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "idPais", [], "any", false, false, false, 41), 200)) || 0 === twig_compare("España", twig_get_attribute($this->env, $this->source, $context["partido"], "visitante", [], "any", false, false, false, 41)))) {
                // line 42
                echo "            ";
                $context["colorV"] = "background-color:#F4FA58";
                // line 43
                echo "        ";
            } else {
                // line 44
                echo "            ";
                $context["colorV"] = "background-color:white";
                // line 45
                echo "        ";
            }
            // line 46
            echo "

        ";
            // line 48
            $context["hora_prevista"] = twig_get_attribute($this->env, $this->source, $context["partido"], "hora_prevista", [], "any", false, false, false, 48);
            // line 49
            echo "        ";
            $context["colorFila"] = "white";
            // line 50
            echo "

        ";
            // line 52
            if (0 !== twig_compare(twig_get_attribute($this->env, $this->source, $context["partido"], "temporada_id", [], "any", false, false, false, 52), ($context["temp_id"] ?? null))) {
                // line 53
                echo "            ";
                if (0 !== twig_compare(($context["contadorAUX"] ?? null), 0)) {
                    // line 54
                    echo "                ";
                    if (call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_MOBILE__"])) {
                        // line 55
                        echo "                    ";
                        if (($context["esAnuncioGrande"] ?? null)) {
                            // line 56
                            echo "                        <div class=\"col-12\">
                            <div id=\"mobile-rectangle-mid-300x600-wrapper\" style=\"margin-top: 135px; margin-bottom: 25px;\"></div>
                        </div>
                        ";
                            // line 59
                            $context["esAnuncioGrande"] = false;
                            // line 60
                            echo "                    ";
                        } else {
                            // line 61
                            echo "                        <div class=\"col-12\">
                            <div id=\"mobile-rectangle-infinite-fallback-wrapper\" style=\"margin-top: 135px; margin-bottom: 25px;\"></div>
                        </div>
                        ";
                            // line 64
                            $context["esAnuncioGrande"] = true;
                            // line 65
                            echo "                    ";
                        }
                        // line 66
                        echo "                ";
                    } else {
                        // line 67
                        echo "                    ";
                        if (($context["esAnuncioGrande"] ?? null)) {
                            // line 68
                            echo "                        <div class=\"col-12\">
                            <div id=\"desktop-leaderboard-atf-fallback-wrapper\" style=\"margin-top: 135px; margin-bottom: 25px;\"></div>
                        </div>
                        ";
                            // line 71
                            $context["esAnuncioGrande"] = false;
                            // line 72
                            echo "                    ";
                        } else {
                            // line 73
                            echo "                        <div class=\"col-12\">
                            <div id=\"desktop-leaderboard-btf-fallback-wrapper\" style=\"margin-top: 135px; margin-bottom: 25px;\"></div>
                        </div>
                        ";
                            // line 76
                            $context["esAnuncioGrande"] = true;
                            // line 77
                            echo "                    ";
                        }
                        // line 78
                        echo "                ";
                    }
                    // line 79
                    echo "            ";
                }
                // line 80
                echo "            ";
                $context["fondoCabecera"] = "greenbox";
                // line 81
                echo "            ";
                $context["colorCabecera"] = "black";
                // line 82
                echo "
            ";
                // line 83
                $this->loadTemplate("index/__part/contenidoCabecera.html.twig", "index/__part/contenidoIndex.html.twig", 83)->display($context);
                // line 84
                echo "            ";
                $context["contadorAUX"] = (($context["contadorAUX"] ?? null) + 1);
                // line 85
                echo "        ";
            }
            // line 86
            echo "
        <div style=\"clear:both\"></div>
        <div>
            ";
            // line 89
            $this->loadTemplate("index/__part/filaPartido.html.twig", "index/__part/contenidoIndex.html.twig", 89)->display(twig_array_merge($context, ["partido" =>             // line 90
$context["partido"], "pagina" => "index"]));
            // line 93
            echo "        </div>

        ";
            // line 95
            $context["equiposTw"] = twig_array_merge(($context["equiposTw"] ?? null), [(            // line 97
$context["kk"] . "_l") => ["id" => twig_get_attribute($this->env, $this->source,             // line 98
$context["partido"], "equipoLocal_id", [], "any", false, false, false, 98), "equipo" => twig_get_attribute($this->env, $this->source,             // line 99
$context["partido"], "local", [], "any", false, false, false, 99), "club_id" => twig_get_attribute($this->env, $this->source,             // line 100
$context["partido"], "club_local", [], "any", false, false, false, 100), "idPais" => twig_get_attribute($this->env, $this->source,             // line 101
$context["partido"], "idPais", [], "any", false, false, false, 101)]]);
            // line 105
            echo "

        ";
            // line 107
            $context["equiposTw"] = twig_array_merge(($context["equiposTw"] ?? null), [(            // line 109
$context["kk"] . "_v") => ["id" => twig_get_attribute($this->env, $this->source,             // line 110
$context["partido"], "equipoVisitante_id", [], "any", false, false, false, 110), "equipo" => twig_get_attribute($this->env, $this->source,             // line 111
$context["partido"], "visitante", [], "any", false, false, false, 111), "club_id" => twig_get_attribute($this->env, $this->source,             // line 112
$context["partido"], "club_visitante", [], "any", false, false, false, 112), "idPais" => twig_get_attribute($this->env, $this->source,             // line 113
$context["partido"], "idPais", [], "any", false, false, false, 113)]]);
            // line 117
            echo "
        ";
            // line 118
            $context["temp_id"] = twig_get_attribute($this->env, $this->source, $context["partido"], "temporada_id", [], "any", false, false, false, 118);
            // line 119
            echo "
    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['kk'], $context['partido'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 121
        echo "    
        
</div>

<div class=\"row\" style=\"height: 50px !important\"></div>



";
        // line 129
        if (((isset($context["esPortada"]) || array_key_exists("esPortada", $context)) && -1 === twig_compare(($context["nTotalPartidosHoy"] ?? null), 30))) {
            // line 130
            echo "

    ";
            // line 132
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["navidad"] ?? null));
            foreach ($context['_seq'] as $context["k"] => $context["torNavidad"]) {
                // line 133
                echo "    <div class=\"col-12 cajaGlobalPartidos\" style=\"background-color:white\">

    <h5 class=\"text-center\">";
                // line 135
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["torNavidad"], "torneo", [], "any", false, false, false, 135), "html", null, true);
                echo "</h5>
    
    ";
                // line 137
                if (call_user_func_array($this->env->getFunction('getConstante')->getCallable(), ["__ES_MOBILE__"])) {
                    // line 138
                    echo "
        <table>
        

            <tr>
            <td valign=\"top\" style=\"width: 100%\">
            <div class=\"col-12 contenedorLeyendaClasificacion\" style=\"float: left; background: white; -webkit-border-radius: 5px;
            -moz-border-radius: 5px; border-radius: 5px; width: 100%\">
            <h6 class=\"text-center\">CLASIFICACIÓN</h6>
            <table>
                <tr bgcolor=\"DarkGreen\" style=\"color:white\">
                   <td style=\"padding: 2px; width: 30px;\" class=\"text-center\">POS</td>
                   <td style=\"padding: 2px; width: 150px;\" class=\"text-center\">Equipo</td>
                   <td style=\"padding: 2px; width: 30px;\" class=\"text-center\">Ptos</td>
                   <td style=\"padding: 2px; width: 30px;\" class=\"text-center\">ju</td>
                   <td style=\"padding: 2px; width: 30px;\" class=\"text-center\">ga</td>
                   <td style=\"padding: 2px; width: 30px;\" class=\"text-center\">em</td>
                   <td style=\"padding: 2px; width: 30px;\" class=\"text-center\">pe</td>
                   <td style=\"padding: 2px; width: 30px;\" class=\"text-center\">gf</td>
                   <td style=\"padding: 2px; width: 30px;\" class=\"text-center\">gc</td>
                </tr>
                ";
                    // line 159
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["torNavidad"], "clasificacion", [], "any", false, false, false, 159));
                    foreach ($context['_seq'] as $context["kk"] => $context["clasi"]) {
                        // line 160
                        echo "
                ";
                        // line 161
                        $context["pgEnlace"] = ((("/resultados-directo/equipo/" . call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["clasi"], "nombre", [], "any", false, false, false, 161)])) . "/") . twig_get_attribute($this->env, $this->source, $context["clasi"], "equipo_id", [], "any", false, false, false, 161));
                        // line 162
                        echo "                ";
                        $context["rutaEscudo"] = call_user_func_array($this->env->getFunction('rutaEscudo')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["clasi"], "club_id", [], "any", false, false, false, 162), twig_get_attribute($this->env, $this->source, $context["clasi"], "equipo_id", [], "any", false, false, false, 162)]);
                        // line 163
                        echo "
                ";
                        // line 164
                        if ( !call_user_func_array($this->env->getFunction('fileExists')->getCallable(), [($context["rutaEscudo"] ?? null)])) {
                            // line 165
                            echo "                    ";
                            $context["rutaEscudo"] = "/static/img/jugadores/NI.png";
                            // line 166
                            echo "                ";
                        }
                        // line 167
                        echo "

                <tr><td style=\"";
                        // line 169
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["clasi"], "css", [], "any", false, false, false, 169), "html", null, true);
                        echo "; padding: 2px; text-align:right;\">";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["clasi"], "posicion", [], "any", false, false, false, 169), "html", null, true);
                        echo "&nbsp;&nbsp;</td>
                   <td style=\"padding: 2px;\">

                        <a href=\"";
                        // line 172
                        echo twig_escape_filter($this->env, ($context["pgEnlace"] ?? null), "html", null, true);
                        echo "&modelo=Calendario\" title=\"Calendario del ";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["clasi"], "nombreCorto", [], "any", false, false, false, 172), "html", null, true);
                        echo "\">
                            <img src=\"";
                        // line 173
                        echo twig_escape_filter($this->env, ($context["rutaEscudo"] ?? null), "html", null, true);
                        echo "\" itemprop=\"logo\" alt=\"escudo ";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["clasi"], "nombre", [], "any", false, false, false, 173), "html", null, true);
                        echo "\" style=\"width:18px; height:20px; margin-right: 2px\">
                            <strong itemprop=\"name\">
                               <span style=\"color:black\"> ";
                        // line 175
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["clasi"], "nombreCorto", [], "any", false, false, false, 175), "html", null, true);
                        echo " </span>
                            </strong>
                            <meta itemprop=\"url\" content=\"";
                        // line 177
                        echo twig_escape_filter($this->env, ($context["pgEnlace"] ?? null), "html", null, true);
                        echo "\">
                        </a>

                   </td>
                   <td style=\"padding: 2px;\" class=\"text-center\"><b>";
                        // line 181
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["clasi"], "puntos", [], "any", false, false, false, 181), "html", null, true);
                        echo "</b></td>
                   <td style=\"padding: 2px;\" class=\"text-center\">";
                        // line 182
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["clasi"], "jugados", [], "any", false, false, false, 182), "html", null, true);
                        echo "</td>
                   <td style=\"padding: 2px;\" class=\"text-center\">";
                        // line 183
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["clasi"], "ganados", [], "any", false, false, false, 183), "html", null, true);
                        echo "</td>
                   <td style=\"padding: 2px;\" class=\"text-center\">";
                        // line 184
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["clasi"], "empatados", [], "any", false, false, false, 184), "html", null, true);
                        echo "</td>
                   <td style=\"padding: 2px;\" class=\"text-center\">";
                        // line 185
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["clasi"], "perdidos", [], "any", false, false, false, 185), "html", null, true);
                        echo "</td>
                   <td style=\"padding: 2px;\" class=\"text-center\">";
                        // line 186
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["clasi"], "gFavor", [], "any", false, false, false, 186), "html", null, true);
                        echo "</td>
                   <td style=\"padding: 2px;\" class=\"text-center\">";
                        // line 187
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["clasi"], "gContra", [], "any", false, false, false, 187), "html", null, true);
                        echo "</td>
                </tr>
                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['kk'], $context['clasi'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 190
                    echo "            </table>
            </div>


            
              <div style=\"background-color:white;\">

              
             

                <div class=\"col-12 contenedorLeyendaClasificacion\" style=\"float: left; background: #4A4A4A; -webkit-border-radius: 5px;
            -moz-border-radius: 5px; border-radius: 5px; width: 100%\">

                    ";
                    // line 203
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["torNavidad"], "leyenda", [], "any", false, false, false, 203));
                    foreach ($context['_seq'] as $context["_key"] => $context["fila"]) {
                        echo "                    
                        <div class=\"text-left\" style=\"float: left; margin-right: 20px; color:";
                        // line 204
                        echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["fila"], "fondo", [], "any", false, false, false, 204), ["white" => "#000000", "gold" => "#F1C422", "orange" => "#E38800", "indianred" => "#E80000"]), "html", null, true);
                        // line 211
                        echo "\">
                            ";
                        // line 212
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "leyenda", [], "any", false, false, false, 212), "html", null, true);
                        echo "
                        </div>
                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['fila'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 215
                    echo "                </div>

            </div>

            <h4 class=\"text-center\">___</h4>
            
            <h6 class=\"text-center\">GOLEADORES</h6>
            
            
                <table style=\"border-spacing: 0px\">
                ";
                    // line 225
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["torNavidad"], "goleadores", [], "any", false, false, false, 225));
                    foreach ($context['_seq'] as $context["kk"] => $context["jugador"]) {
                        // line 226
                        echo "                <tr><td style=\"padding: 2px; text-align:center\">";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["jugador"], "goles", [], "any", false, false, false, 226), "html", null, true);
                        echo "</td>
                   <td style=\"padding: 2px\">
                        <a href=\"";
                        // line 228
                        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("jugador_url_nombre", ["id" => twig_get_attribute($this->env, $this->source,                         // line 229
$context["jugador"], "jugador_id", [], "any", false, false, false, 229), "slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,                         // line 230
$context["jugador"], "jugador", [], "any", false, false, false, 230)])]), "html", null, true);
                        // line 231
                        echo "\">
                            ";
                        // line 232
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["jugador"], "jugador", [], "any", false, false, false, 232), "html", null, true);
                        echo "
                        </a>
                   </td>
                   <td style=\"padding: 2px\">";
                        // line 235
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["jugador"], "equipoCorto", [], "any", false, false, false, 235), "html", null, true);
                        echo "</tr>
                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['kk'], $context['jugador'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 237
                    echo "                </table>
                
          

            </td>
            </tr>
        </table> 


    ";
                } else {
                    // line 247
                    echo "    <table>
        

        <tr>
        <td valign=\"top\" style=\"width: 60%\">
        <div class=\"col-12 contenedorLeyendaClasificacion\" style=\"float: left; background: white; -webkit-border-radius: 5px;
        -moz-border-radius: 5px; border-radius: 5px; width: 100%\">
        <h6 class=\"text-center\">CLASIFICACIÓN</h6>
        <table>
            <tr bgcolor=\"DarkGreen\" style=\"color:white\">
               <td style=\"padding: 2px; width: 30px;\" class=\"text-center\">POS</td>
               <td style=\"padding: 2px; width: 150px;\" class=\"text-center\">Equipo</td>
               <td style=\"padding: 2px; width: 30px;\" class=\"text-center\">Ptos</td>
               <td style=\"padding: 2px; width: 30px;\" class=\"text-center\">ju</td>
               <td style=\"padding: 2px; width: 30px;\" class=\"text-center\">ga</td>
               <td style=\"padding: 2px; width: 30px;\" class=\"text-center\">em</td>
               <td style=\"padding: 2px; width: 30px;\" class=\"text-center\">pe</td>
               <td style=\"padding: 2px; width: 30px;\" class=\"text-center\">gf</td>
               <td style=\"padding: 2px; width: 30px;\" class=\"text-center\">gc</td>
            </tr>
            ";
                    // line 267
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["torNavidad"], "clasificacion", [], "any", false, false, false, 267));
                    foreach ($context['_seq'] as $context["kk"] => $context["clasi"]) {
                        // line 268
                        echo "
            ";
                        // line 269
                        $context["pgEnlace"] = ((("/resultados-directo/equipo/" . call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["clasi"], "nombre", [], "any", false, false, false, 269)])) . "/") . twig_get_attribute($this->env, $this->source, $context["clasi"], "equipo_id", [], "any", false, false, false, 269));
                        // line 270
                        echo "            ";
                        $context["rutaEscudo"] = call_user_func_array($this->env->getFunction('rutaEscudo')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["clasi"], "club_id", [], "any", false, false, false, 270), twig_get_attribute($this->env, $this->source, $context["clasi"], "equipo_id", [], "any", false, false, false, 270)]);
                        // line 271
                        echo "
            ";
                        // line 272
                        if ( !call_user_func_array($this->env->getFunction('fileExists')->getCallable(), [($context["rutaEscudo"] ?? null)])) {
                            // line 273
                            echo "                ";
                            $context["rutaEscudo"] = "/static/img/jugadores/NI.png";
                            // line 274
                            echo "            ";
                        }
                        // line 275
                        echo "

            <tr><td style=\"";
                        // line 277
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["clasi"], "css", [], "any", false, false, false, 277), "html", null, true);
                        echo "; padding: 2px; text-align:right;\">";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["clasi"], "posicion", [], "any", false, false, false, 277), "html", null, true);
                        echo "&nbsp;&nbsp;</td>
               <td style=\"padding: 2px;\">

                    <a href=\"";
                        // line 280
                        echo twig_escape_filter($this->env, ($context["pgEnlace"] ?? null), "html", null, true);
                        echo "&modelo=Calendario\" title=\"Calendario del ";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["clasi"], "nombreCorto", [], "any", false, false, false, 280), "html", null, true);
                        echo "\">
                        <img src=\"";
                        // line 281
                        echo twig_escape_filter($this->env, ($context["rutaEscudo"] ?? null), "html", null, true);
                        echo "\" itemprop=\"logo\" alt=\"escudo ";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["clasi"], "nombre", [], "any", false, false, false, 281), "html", null, true);
                        echo "\" style=\"width:18px; height:20px; margin-right: 2px\">
                        <strong itemprop=\"name\">
                           <span style=\"color:black\"> ";
                        // line 283
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["clasi"], "nombreCorto", [], "any", false, false, false, 283), "html", null, true);
                        echo " </span>
                        </strong>
                        <meta itemprop=\"url\" content=\"";
                        // line 285
                        echo twig_escape_filter($this->env, ($context["pgEnlace"] ?? null), "html", null, true);
                        echo "\">
                    </a>

               </td>
               <td style=\"padding: 2px;\" class=\"text-center\"><b>";
                        // line 289
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["clasi"], "puntos", [], "any", false, false, false, 289), "html", null, true);
                        echo "</b></td>
               <td style=\"padding: 2px;\" class=\"text-center\">";
                        // line 290
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["clasi"], "jugados", [], "any", false, false, false, 290), "html", null, true);
                        echo "</td>
               <td style=\"padding: 2px;\" class=\"text-center\">";
                        // line 291
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["clasi"], "ganados", [], "any", false, false, false, 291), "html", null, true);
                        echo "</td>
               <td style=\"padding: 2px;\" class=\"text-center\">";
                        // line 292
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["clasi"], "empatados", [], "any", false, false, false, 292), "html", null, true);
                        echo "</td>
               <td style=\"padding: 2px;\" class=\"text-center\">";
                        // line 293
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["clasi"], "perdidos", [], "any", false, false, false, 293), "html", null, true);
                        echo "</td>
               <td style=\"padding: 2px;\" class=\"text-center\">";
                        // line 294
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["clasi"], "gFavor", [], "any", false, false, false, 294), "html", null, true);
                        echo "</td>
               <td style=\"padding: 2px;\" class=\"text-center\">";
                        // line 295
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["clasi"], "gContra", [], "any", false, false, false, 295), "html", null, true);
                        echo "</td>
            </tr>
            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['kk'], $context['clasi'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 298
                    echo "        </table>
        </div>

        


        </td>
        <td valign=\"top\" style=\"width: 40%\">
        <h6 class=\"text-center\">GOLEADORES</h6>
        
        
            <table style=\"border-spacing: 0px\">
            ";
                    // line 310
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["torNavidad"], "goleadores", [], "any", false, false, false, 310));
                    foreach ($context['_seq'] as $context["kk"] => $context["jugador"]) {
                        // line 311
                        echo "            <tr><td style=\"padding: 2px; text-align:center\">";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["jugador"], "goles", [], "any", false, false, false, 311), "html", null, true);
                        echo "</td>
               <td style=\"padding: 2px\">
                    <a href=\"";
                        // line 313
                        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->fullUrlFor("jugador_url_nombre", ["id" => twig_get_attribute($this->env, $this->source,                         // line 314
$context["jugador"], "jugador_id", [], "any", false, false, false, 314), "slug" => call_user_func_array($this->env->getFunction('ponerGuion')->getCallable(), [twig_get_attribute($this->env, $this->source,                         // line 315
$context["jugador"], "jugador", [], "any", false, false, false, 315)])]), "html", null, true);
                        // line 316
                        echo "\">
                        ";
                        // line 317
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["jugador"], "jugador", [], "any", false, false, false, 317), "html", null, true);
                        echo "
                    </a>
               </td>
               <td style=\"padding: 2px\">";
                        // line 320
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["jugador"], "equipoCorto", [], "any", false, false, false, 320), "html", null, true);
                        echo "</tr>
            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['kk'], $context['jugador'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 322
                    echo "            </table>
            
         
        
        <h4 class=\"text-center\">__________________</h4>
         <h6 class=\"text-center\">LEYENDA</h6>
         <div style=\"background-color:white;\">

          
         

            <div class=\"col-12 contenedorLeyendaClasificacion\" style=\"float: left; background: #4A4A4A; -webkit-border-radius: 5px;
        -moz-border-radius: 5px; border-radius: 5px; width: 100%\">

                ";
                    // line 336
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["torNavidad"], "leyenda", [], "any", false, false, false, 336));
                    foreach ($context['_seq'] as $context["_key"] => $context["fila"]) {
                        echo "                    
                    <div class=\"text-left\" style=\"float: left; margin-right: 20px; color:";
                        // line 337
                        echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["fila"], "fondo", [], "any", false, false, false, 337), ["white" => "#000000", "gold" => "#F1C422", "orange" => "#E38800", "indianred" => "#E80000"]), "html", null, true);
                        // line 344
                        echo "\">
                        ";
                        // line 345
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fila"], "leyenda", [], "any", false, false, false, 345), "html", null, true);
                        echo "
                    </div>
                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['fila'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 348
                    echo "            </div>

        </div>

        </td>
        </tr>
    </table> 
    ";
                }
                // line 356
                echo "
    <div style=\"clear:both\"></div>
    </div>

    <div class=\"row\" style=\"height: 50px !important\"></div>
    
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['k'], $context['torNavidad'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 363
            echo "
";
        }
        // line 365
        echo "


<div class=\"col-12\">
    ";
        // line 369
        $this->loadTemplate("__part/pesLeerTwitsPortada.html.twig", "index/__part/contenidoIndex.html.twig", 369)->display($context);
        // line 370
        echo "
</div>



";
    }

    public function getTemplateName()
    {
        return "index/__part/contenidoIndex.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  768 => 370,  766 => 369,  760 => 365,  756 => 363,  744 => 356,  734 => 348,  725 => 345,  722 => 344,  720 => 337,  714 => 336,  698 => 322,  690 => 320,  684 => 317,  681 => 316,  679 => 315,  678 => 314,  677 => 313,  671 => 311,  667 => 310,  653 => 298,  644 => 295,  640 => 294,  636 => 293,  632 => 292,  628 => 291,  624 => 290,  620 => 289,  613 => 285,  608 => 283,  601 => 281,  595 => 280,  587 => 277,  583 => 275,  580 => 274,  577 => 273,  575 => 272,  572 => 271,  569 => 270,  567 => 269,  564 => 268,  560 => 267,  538 => 247,  526 => 237,  518 => 235,  512 => 232,  509 => 231,  507 => 230,  506 => 229,  505 => 228,  499 => 226,  495 => 225,  483 => 215,  474 => 212,  471 => 211,  469 => 204,  463 => 203,  448 => 190,  439 => 187,  435 => 186,  431 => 185,  427 => 184,  423 => 183,  419 => 182,  415 => 181,  408 => 177,  403 => 175,  396 => 173,  390 => 172,  382 => 169,  378 => 167,  375 => 166,  372 => 165,  370 => 164,  367 => 163,  364 => 162,  362 => 161,  359 => 160,  355 => 159,  332 => 138,  330 => 137,  325 => 135,  321 => 133,  317 => 132,  313 => 130,  311 => 129,  301 => 121,  286 => 119,  284 => 118,  281 => 117,  279 => 113,  278 => 112,  277 => 111,  276 => 110,  275 => 109,  274 => 107,  270 => 105,  268 => 101,  267 => 100,  266 => 99,  265 => 98,  264 => 97,  263 => 95,  259 => 93,  257 => 90,  256 => 89,  251 => 86,  248 => 85,  245 => 84,  243 => 83,  240 => 82,  237 => 81,  234 => 80,  231 => 79,  228 => 78,  225 => 77,  223 => 76,  218 => 73,  215 => 72,  213 => 71,  208 => 68,  205 => 67,  202 => 66,  199 => 65,  197 => 64,  192 => 61,  189 => 60,  187 => 59,  182 => 56,  179 => 55,  176 => 54,  173 => 53,  171 => 52,  167 => 50,  164 => 49,  162 => 48,  158 => 46,  155 => 45,  152 => 44,  149 => 43,  146 => 42,  144 => 41,  141 => 40,  138 => 39,  135 => 38,  132 => 37,  129 => 36,  127 => 35,  124 => 34,  122 => 33,  119 => 32,  114 => 29,  111 => 28,  109 => 27,  105 => 25,  102 => 24,  100 => 23,  96 => 21,  79 => 20,  74 => 17,  71 => 16,  68 => 15,  65 => 14,  62 => 13,  60 => 12,  55 => 9,  52 => 8,  49 => 7,  46 => 6,  43 => 5,  41 => 4,  37 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "index/__part/contenidoIndex.html.twig", "/var/www/vhosts/futbolme.loading.net/futbolme.eu/v2/templates/index/__part/contenidoIndex.html.twig");
    }
}
