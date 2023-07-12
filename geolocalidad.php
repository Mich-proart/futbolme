<?php 
define('_FUTBOLME_', 1);
require_once 'src/config.php';

if (isset($_GET['m'])) {
    $id = $_GET['id'];

    $localidades = localidades($_GET['m'], $id);

    if (count($localidades) > 0) {
        if (1 == $_GET['m']) {
            $txtTitulo = 'Equipos de la localidad ';
            $txtLocal = $localidades[0]['localidad'];
        }
        if (2 == $_GET['m']) {
            $txtTitulo = 'Equipos de la provincia ';
            $txtLocal = $localidades[0]['provincia'];
        }
        if (3 == $_GET['m']) {
            $txtTitulo = 'Equipos de la comunidad ';
            $txtLocal = $localidades[0]['comunidad'];
        }

        if (10 == $id) {
            $txtLocal = $txtLocal.' Y Melilla';
        }
        if (11 == $id) {
            $txtLocal = $txtLocal.' Y Ceuta';
        }
    } else {
        header('HTTP/1.0 404 Not Found');
        echo "No disponemos de datos de esta localidad <a href='https://futbolme.eu'>Ir a pagina principal de futbolme.eu</a>";
        die;
    }
} else {
    exit;
}

?>

<?php require_once 'includes/head.php'; ?>

	<title><?php echo $txtTitulo; ?> -  <?php echo $txtLocal; ?></title>


</head>
<?php require_once 'includes/contenedorSup.php'; ?>
							

				<div class="row nomargin horizontaldivider" style="background-color:white">

                    <div class="clear col-xs-12 one-bordergrey-vert">
    <div class="col-xs-12 whitebox nopadding">
    <?php 
    $mysqli = conectar();
    $sq='select cv.positivos,cv.muertos,cv.recuperados,cv.hospital,cv.uci,cv.fecha,co.nombre,co.id comunidad_id FROM coronavirus cv 
    INNER JOIN comunidad co ON co.id=cv.comunidad_id 
    INNER JOIN provincia pro ON pro.comunidad_id=co.id 
    WHERE pro.id='.$id.' ORDER BY fecha DESC LIMIT 1';
    //echo $sq.'<br />';
    $resultadoSQL = mysqli_query($mysqli, $sq);
    $corona = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
    ?>

    <table class="table">
        <tr><td class="boldfont">
            <?php 
    if ($corona['comunidad_id']==10 || $corona['comunidad_id']==11) { $corona['nombre']='Andalucía';}
    $uCorona='https://en.wikipedia.org/wiki/2020_coronavirus_pandemic_in_Spain'?>
    El coronavirus en <?php echo $corona['nombre']?>
    

        </td>
            <td align="center">Positivos</td>
            <td align="center">Recuperados</td>
            <td align="center">Muertos</td>
            <td align="center">En Hospital</td>
            <td align="center">En U.C.I.</td>
        </tr>
        <tr bgcolor="white">
            <td><i>Fuente: <a href="<?php echo $uCorona?>" target="_blank">Wikipedia</a></i></td>
            <td align="center"><?php echo number_format($corona['positivos'],0,",",".")?></td>
            <td align="center"><?php echo number_format($corona['recuperados'],0,",",".")?></td>
            <td align="center"><?php echo number_format($corona['muertos'],0,",",".")?></td>
            <td align="center"><?php echo number_format($corona['hospital'],0,",",".")?></td>
            <td align="center"><?php echo number_format($corona['uci'],0,",",".")?></td>
            
        </tr>
    </table>
    </div>

					<div class="banner-container col-xs-12 col-md-12 col-lg-12" style="float:left">
					<h4><?php
    


                    echo $txtTitulo; ?> -  <b><?php echo $txtLocal; ?></b>

					<?php if (1 == $_GET['m']) {
    ?>
					- <a href="?m=2&id=<?php echo $localidades[0]['provincia_id']; ?>"><?php echo $localidades[0]['provincia']; ?></a> 
					<?php
} ?>
					<?php if ($_GET['m'] < 3) {
        ?>
					- <a href="?m=3&id=<?php echo $localidades[0]['comunidad_id']; ?>"><?php echo $localidades[0]['comunidad']; ?></a>
					<?php
    } ?>
					</h4>
                    <?php 

                    $equipo_id = 0; $temporada_id = 0;

                        foreach ($localidades as $fila) {
                            echo "<div style='float:left;  width:98%; padding:1%;'>";
                            if ($temporada_id != $fila['temporada_id']) {
                                $enlace = '/resultados-directo/torneo/';
                                $nC = $localidades[0]['comunidad_id'];
                                $nP = 'España';

                                $enlace_torneo = $enlace.poner_guion($fila['temporadanombre']).'/'.$fila['temporada_id'].'/';

                                echo "<div style='float:left; width:100%; border: 1px solid gainsboro; background-color:#F2EC29'><a style='padding:10px;' href='".$enlace_torneo."'>".$fila['temporadanombre'].'</a></div>';
                            }

                            if ($equipo_id != $fila['equipo_id']) {
                                $enlace_equipo = '/resultados-directo/equipo/'.poner_guion($fila['equipo']).'/'.$fila['equipo_id'];

                                echo '<div style="float:left; width:26%; text-align:center"><img src="/img/equipos/escudo'.$fila['equipo_id'].'.png" alt="escudo" class="img-rounded" height="80"></div>';

                                echo "<div style='float:left; width:74%; color:navy; font-size:15px;'>";
                                echo "<a href='".$enlace_equipo."'>".$fila['equipo'].'</a> - '.$fila['categoria'];
                                echo "<br /><b><a href='?m=1&id=".$fila['localidad_id']."'>".$fila['localidad'].'</a></b> - Estadio: '.$fila['estadio'];
                                echo "<br /><a href='?m=2&id=".$fila['provincia_id']."'><span style='color:dimgray'>(".$fila['provincia'].")</span></a><span style='color:dimgray'> - <b>".$fila['comunidad'].'</b></span>';
                                echo "</div><div style='clear:both; border:1px solid dimgray'></div>";
                            }
                            echo '</div>';

                            $equipo_id = $fila['equipo_id'];
                            $temporada_id = $fila['temporada_id'];
                        }

                    ?>			    								
				    </div>
				</div>
</div>
			<?php require_once 'includes/contenedorInf.php'; ?>

