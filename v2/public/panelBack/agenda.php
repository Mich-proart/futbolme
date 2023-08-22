<?php
define('_PANEL_', 1);
require_once 'includes/config.php';
?>
<div id="agenda2"></div>
<style>
        #calendar {
            font-family:Arial;
            font-size:14px;
            width:100%;
        }
        #calendar caption {
            text-align:left;
            padding:5px 10px;
            background-color:#003366;
            color:#fff;
            font-weight:bold;
        }
        #calendar th {
            background-color:#006699;
            color:#fff;
            width:14%;
        }
        #calendar td {
            text-align:right;
            padding:2px 5px;
            background-color:silver;
        }
        #calendar .hoy {
            background-color:red;
        }

    </style>

<?php // definimos los valores iniciales para nuestro calendario
date_default_timezone_set('Europe/Madrid');
if (isset($_GET['fecha'])) {
    $datos = $_GET['fecha'];
    $datos = explode('-', $datos);

    $year = $datos[0];
    $month = $datos[1];
    $diaActual = $datos[2];
} else {
    $month = date('n');
    $year = date('Y');
    $diaActual = date('j');
}

// Obtenemos el dia de la semana del primer dia
// Devuelve 0 para domingo, 6 para sabado
$diaSemana = date('w', mktime(0, 0, 0, $month, 1, $year)) + 7;
// Obtenemos el ultimo dia del mes
$ultimoDiaMes = date('d', (mktime(0, 0, 0, $month + 1, 1, $year) - 1));

$meses = array(1 => 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio',
'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre', );
?>



<div class="col-xs-12">
<table id="calendar" class="table"> 
	<tr>
        <td colspan="7" style="background-color: black; color:yellow">

	<?php 

$partidos=partidosCat($month,$year); 
$partidos2=partidosCat2($month,$year);  


$partidosTodos=$partidos2[0]; 
$partidosSinfecha=$partidos2[1]; 

    $aa = $year; $mm = ($month - 1);
    if ($mm < 1) {
        $aa = ($year - 1);
        $mm = 12;
    } ?>
    <a style='color:white;cursor:pointer;' onclick="agendaMas('<?php echo $aa?>-<?php echo $mm?>-01')"><?php echo $meses[$mm]?> <?php echo $aa?></a> -- 

	<?php echo $meses[$month].' '.$year; ?> -- 

	<?php 
    $aa = $year; $mm = ($month + 1);
    if ($mm > 12) {
        $aa = ($year + 1);
        $mm = 1;
    } ?>
    <a style='color:white;cursor:pointer;' onclick="agendaMas('<?php echo $aa?>-<?php echo $mm?>-01')"><?php echo $meses[$mm]?> <?php echo $aa?></a> -- &nbsp;&nbsp;<a style="color:white;cursor:pointer;" onclick="agendaPendientes()">Partidos Pendientes</a>
	</td></tr>
	<tr> 
		<th>Lun</th><th>Mar</th><th>Mie</th><th>Jue</th>
		<th>Vie</th><th>Sab</th><th>Dom</th>
	</tr>
	<tr> 
		<?php
        $last_cell = $diaSemana + $ultimoDiaMes;
        // hacemos un bucle hasta 42, que es el máximo de valores que puede
        // haber... 6 columnas de 7 dias
        for ($i = 1; $i <= 42; ++$i) {
            if ($i == $diaSemana) {
                // determinamos en que dia empieza
                $day = 1;
            }
            if ($i < $diaSemana || $i >= $last_cell) {
                // celca vacia
                echo '<td> </td>';
            } else {
                // mostramos el dia
                if ($month<10){ $mes='0'.$month; } else { $mes=$month; }
                if ($day<10){ $dia='0'.$day; } else { $dia=$day; }
                $fecha = $year.'-'.$mes.'-'.$dia;
                $mes='';$dia='';

                if (isset($partidos[$fecha])){ 
                    $partidosCategorias = $partidos[$fecha];
                } else { $partidosCategorias=array(); }

                $cadena = '';
                $total1=0;
                $total2=0;
                $total3=0;
                foreach ($partidosCategorias as $fila) {
                    $cadena .= "<br />
                    <div class='marco'>
                    <a href='/panelBack/agenda/agenda_partidos.php?m=1&fecha=".$fecha."&ct=".$fila['categoria_torneo_id']."' target='blank'>".$fila['nombre']."</a>

                     - ".$fila['partidos']."</div>";
                     $total1=($total1+$fila['partidos']);
                }
                
                if (isset($partidosTodos[$fecha])){ 
                    $partidosCategorias2 = $partidosTodos[$fecha];
                } else { 
                    $partidosCategorias2=array(); 
                }

                if (isset($partidosSinfecha[$fecha])){ 
                    $partidosCategorias2sin = $partidosSinfecha[$fecha];
                } else { 
                    $partidosCategorias2sin=array(); 
                }




                $cadena2 = ''; $cadena3='';
                foreach ($partidosCategorias2 as $fila2) {
                    $cadena2 .= "<br />
                    <div class='marco'><a href='/panelBack/agenda/agenda_partidos.php?m=1&fecha=".$fecha."&ct=".$fila2['categoria_torneo_id']."' target='blank'>".$fila2['nombre']."</a>

                     - ".$fila2['partidos']."</div>";
                     $total2=($total2+$fila2['partidos']);
                }

                foreach ($partidosCategorias2sin as $fila3) {
                    $cadena3 .= "<br />
                    <div class='marco'><a href='/panelBack/agenda/agenda_partidos.php?m=1&fecha=".$fecha."&ct=".$fila3['categoria_torneo_id']."' target='blank'>".$fila3['nombre']."</a>

                     - ".$fila3['partidos']."</div>";
                }

                $total3=$total1+$total2;

                unset($partidosCategorias2);

                if ($day == $diaActual) { ?>
                    <td valign='top' class='hoy'>
                        <div class="marco" style="background-color: lavender">
                        <div style='font-size:20px; margin-right:20px; margin-top:5px; position:absolute'><?php echo $day?> <span style="padding-left: 50px;">Total: <?php echo $total3?></span></div>
                        <div style="width: 100%; float: left; background-color: white; margin-top: 50px;">
                            <?php echo $cadena?>
                            <?php echo $cadena2?>
                        </div>
                        <div style="clear:both">
                        </div>
                        <div class="clear"></div>
                        </div>
                    </td>
                <?php } else { ?>
                    <td valign='top'>
                        <div class="marco" style="background-color: lavender">
                        <div style='font-size:20px; margin-right:20px; margin-top:5px; position:absolute'><?php echo $day?> <span style="padding-left: 50px;">Total: <?php echo $total3?></span></div>
                        <div style="width: 100%; float: left; background-color: white; margin-top: 50px;">
                            <?php echo $cadena?>
                            <?php echo $cadena2?>
                        </div>
                        <div style="clear:both">
                        </div>
                        <div class="clear"></div>
                        </div>
                    </td>
                <?php }
                ++$day;
            }
            // cuando llega al final de la semana, iniciamos una columna nueva
            if (0 == $i % 7) { ?>
                </tr><tr>
            <?php }
        }
    ?>
	</tr>
</table>



</div>


