<?php 
$static_v = 9; 
define('_FUTBOLME_', 1);

require_once '../src/consultas.php';
// definimos los valores iniciales para nuestro calendario
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
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/js/ajax.js?=<?php echo $static_v; ?>"></script>
</head>
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
<body>


<div style="float:left; width:100%">
<table id="calendar"> 
	<caption>

	<?php 

$partidos=partidosCat($month,$year); 
$partidos2=partidosCat2($month,$year);  


$partidosTodos=$partidos2[0]; 
$partidosSinfecha=$partidos2[1]; 

    $aa = $year; $mm = ($month - 1);
    if ($mm < 1) {
        $aa = ($year - 1);
        $mm = 12;
    }
    echo "<a style='color:white;' href='?fecha=".$aa.'-'.$mm.'-01'."'>".$meses[$mm].' '.$aa.'</a> -- ';
    ?>

	<?php echo $meses[$month].' '.$year; ?> -- 

	<?php 
    $aa = $year; $mm = ($month + 1);
    if ($mm > 12) {
        $aa = ($year + 1);
        $mm = 1;
    }
    echo "<a style='color:white;' href='?fecha=".$aa.'-'.$mm.'-01'."'>".$meses[$mm].' '.$aa.'</a> -- ';
    ?>



	&nbsp;&nbsp;&nbsp;&nbsp;<a style="color:white;" href="agendaPendientes.php">Partidos Pendientes</a>
	</caption>
	<tr> 
		<th>Lun</th><th>Mar</th><th>Mie</th><th>Jue</th>
		<th>Vie</th><th>Sab</th><th>Dom</th>
	</tr>
	<tr bgcolor="silver"> 
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
                    <div class='marco'><a href='agenda_partidos.php?m=2&fecha=".$fecha."&ct=".$fila['categoria_torneo_id']."' target='blank'>***</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href='agenda_partidos.php?m=1&fecha=".$fecha."&ct=".$fila['categoria_torneo_id']."' target='blank'>".$fila['nombre']."</a>

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
                    <div class='marco'><a href='agenda_partidosB.php?m=1&fecha=".$fecha."&ct=".$fila2['categoria_torneo_id']."' target='blank'>".$fila2['nombre']."</a>

                     - ".$fila2['partidos']."</div>";
                     $total2=($total2+$fila2['partidos']);
                }

                foreach ($partidosCategorias2sin as $fila3) {
                    $cadena3 .= "<br />
                    <div class='marco'><a href='agenda_partidosB.php?m=1&fecha=".$fecha."&ct=".$fila3['categoria_torneo_id']."' target='blank'>".$fila3['nombre']."</a>

                     - ".$fila3['partidos']."</div>";
                }

                $total3=$total1+$total2;

                unset($partidosCategorias2);

                if ($day == $diaActual) { ?>
                    <td valign='top' class='hoy'>
                        <div style='font-size:20px; margin-right:20px; margin-top:5px; position:absolute'><?php echo $day?></div><div style="clear:both;"></div>
                        <div style="width: 50%; float: left; background-color: white; margin-top: 50px;">
                            <?php echo $cadena2?>
                            <br />Total: <?php echo $total2?>
                            <?php echo '<hr />'.$cadena3?>
                        </div>
                        <div style="width: 50%; float: right">
                            <?php echo $cadena?>
                            <br />Total: <?php echo $total1?>
                        </div>
                        <div style="clear:both">
                        <h3>Total: <?php echo $total3?></h3>
                        </div>
                    </td>
                <?php } else { ?>
                    <td valign='top'><div style='font-size:20px; margin-right:20px; margin-top:5px; position:absolute'><?php echo $day?></div>
                        <div style="width: 50%; float: left; background-color: white; margin-top: 50px;">
                            <?php echo $cadena2?>
                            <br />Total: <?php echo $total2?>
                            <?php echo '<hr />'.$cadena3?>
                        </div>
                        <div style="width: 50%; float: right">
                            <?php echo $cadena?>
                            <br />Total: <?php echo $total1?>
                        </div>
                        <div style="clear:both">
                        <h3>Total: <?php echo $total3?></h3>
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


</body>
</html>

<?php

function partidosCat($mes,$ano)
{
    $campos = 'COUNT(p.id) partidos, tor.categoria_torneo_id, ct.nombre, p.fecha';
    $tabla = ' partido p';
    $union = ' INNER JOIN temporada te ON te.id=p.temporada_id';
    $union2 = ' INNER JOIN torneo tor ON tor.id=te.torneo_id';
    $union3 = ' INNER JOIN categoriatorneo ct ON ct.id=tor.categoria_torneo_id';
    $condicion = ' WHERE tor.visible>4 AND tor.visible<70 AND MONTH(fecha)="'.$mes.'" AND YEAR(fecha) ="'.$ano.'"';

    $orden = 'GROUP BY p.fecha, tor.categoria_torneo_id ORDER BY p.fecha, ct.orden';

    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$union2.$union3.$condicion.$orden;

    //echo $consulta; die;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    $partidos=array();

    foreach ($resultado as $key => $value) {
        $partidos[$value['fecha']][]=$value;
    }

    return $partidos;
}

function partidosCat2($mes,$ano)
{
    $campos = 'COUNT(p.id) partidos, tor.categoria_torneo_id, ct.nombre, p.fecha';
    $tabla = ' partido p';
    $union = ' INNER JOIN temporada te ON te.id=p.temporada_id';
    $union.= ' INNER JOIN torneo tor ON tor.id=te.torneo_id';
    $union.= ' INNER JOIN categoriatorneo ct ON ct.id=tor.categoria_torneo_id';
    $condicion = ' WHERE tor.visible>69 AND MONTH(fecha)="'.$mes.'" AND YEAR(fecha) ="'.$ano.'"';
    $orden = 'GROUP BY p.fecha, tor.categoria_torneo_id ORDER BY p.fecha, ct.orden';
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
    //echo $consulta; die;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
    $partidos=array();
    foreach ($resultado as $key => $value) {
        $partidos[$value['fecha']][]=$value;
    }

    $partidosT[0]=$partidos;

    $campos = 'COUNT(p.id) partidos, tor.categoria_torneo_id, ct.nombre, p.fecha';
    $tabla = ' partido p';
    $union = ' INNER JOIN temporada te ON te.id=p.temporada_id';
    $union.= ' INNER JOIN torneo tor ON tor.id=te.torneo_id';
    $union.= ' INNER JOIN categoriatorneo ct ON ct.id=tor.categoria_torneo_id';
    $condicion = ' WHERE tor.visible>69 AND MONTH(fecha)="'.$mes.'" AND YEAR(fecha) ="'.$ano.'" AND p.hora_prevista="00:00:11" AND p.equipoLocal_id>0 AND p.equipoVisitante_id>0 ';
    $orden = 'GROUP BY p.fecha, tor.categoria_torneo_id ORDER BY p.fecha, ct.orden';
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
    //echo $consulta; die;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
    $partidos=array();
    foreach ($resultado as $key => $value) {
        $partidos[$value['fecha']][]=$value;
    }

    $partidosT[1]=$partidos;

    return $partidosT;
}

