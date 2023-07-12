<?php 
require_once 'src/config.php';
//$haz301 = array('?id=');

$temporada_id = $_GET['id']??1;
$valorJornada = $_GET['jornada']??0;
$grupo_id = $_GET['grupo_id']??0;

if (!is_numeric($temporada_id)) { $temporada_id = 1; }
if ($temporada_id > 600) { header('Location:/', true, 301); }
$modelo = $_GET['modelo']??'Jornada';
//imp($_GET);

//aqui comienza el arranque
$torneo = Xtipo($temporada_id);
$equipos = Xequipos_temporada($temporada_id);
$desarrollo = $torneo['desarrollo'];
$tipoTorneo = $torneo['tipo_torneo'];
$categoria_torneo_id = $torneo['categoria_torneo_id'];
$sexo = $torneo['sexo'];
$flagPais = $torneo['flagPais'];
$comunidad_id = $torneo['flagComunidad'];
$nombreComunidad = $torneo['nombreComunidad'];
if ('SIN COMUNIDAD' != $nombreComunidad) {
    $nombreComunidad .= '-';
} else {
    $nombreComunidad = '';
}
//$nombrePais = $torneo['nombrePais'];
$nombrePais = '';
$traduccion = $torneo['traduccion'];
$nombreTorneo = $torneo['nombre'];
$jornadas = $torneo['jornadas']; 
$jornadaActiva = $torneo['jornadaActiva'];
$tipoClasificacion = $torneo['tipoClasificacion'];
$categoria_id = $torneo['categoria_id'];
$mitadJornada = (int) ($jornadas / 2);
$division = 0;
if (1 == $temporada_id) {$division = 1;$txtDivision = 'Primera División';}
if (2 == $temporada_id) {$division = 2;$txtDivision = 'Segunda División';}
if ($temporada_id > 2 && $temporada_id < 7) {$division = 3;$txtDivision = 'Segunda División B';}
if ($temporada_id > 6 && $temporada_id < 25) {$division = 4;$txtDivision = 'Tercera División';}
//jornada en pantalla
if (1 == $tipoTorneo && $valorJornada > $jornadas) {$valorJornada = $jornadas;}
if (1 == $tipoTorneo && $valorJornada ==0 ) {$valorJornada = $jornadaActiva;}
//equipo o selección
$seleccion = 0; $amistoso = 0; $tipo_eliminatoria = 1;
//aqui termina el arranque


$colorL = ''; $colorV = '';
$txttempan=$_SESSION['temporada'];


$pgTemporada = 'index.php?modo=t&id='.$temporada_id;
$pgTemporada2 = 'index.php?modo=t&id='.$temporada_id;
$pgTemporadaJornada = 'index.php';
$pgTemporadaSinJornada = 'index.php?modo=t&id='.$temporada_id;

$descJornada='';
if (!empty($_GET['jornada'])) {
    $descJornada = ' - Jornada '.$_GET['jornada'];
}
$metaDescripcion = 'Resultados, clasificación, datos, estadísticas, goleadores y zamoras de '.$nombreTorneo.' ('.$txttempan.')'.$descJornada;

if (186 == $temporada_id && 1 == $_SESSION['app']) {$nombreTorneo = 'CAMP. DE ESPAÑA - Copa S.M. El Rey';}
if (1 == $temporada_id) {$nombreTorneo = 'PRIMERA DIVISIÓN Liga Santander';}
if (2 == $temporada_id) {$nombreTorneo = 'SEGUNDA DIVISIÓN Liga 123';}
if (214 == $temporada_id) {$nombreTorneo = 'PRIMERA DIVISIÓN FEMENINA Liga Iberdrola';}


    $titulo = $nombreTorneo.' Temporada '.$txttempan.' - ';
    if ('Jornada' == $modelo) {
        $titulo .= $modelo.' '.$jornadaActiva;
    } else {
        $titulo .= $modelo;
    }
?>

<?php require_once 'includes/head.php'; ?>
	<title><?php echo $titulo; ?> <?php echo $_GET['modelo']??''?></title>
</head>

<?php require_once 'includes/contenedorSup.php'; 



//comienza arranque 2
$pesJornada = ''; 
$pesGoleadores = ''; 
$pesZamoras = ''; 
$pesCalendario = ''; 


$partidos = Xpartidos($temporada_id, $valorJornada);

    switch ($modelo) {
        case 'Jornada':
            $pesJornada = 'active';
            $jornadas = $torneo['jornadas']; $jornadaActiva = $torneo['jornadaActiva'];
            if ($jornadaActiva > $jornadas) {
                $jornadaActiva = $jornadas;
            }
            if ($jornadaActiva == $valorJornada || (empty($valorJornada) || '-1' == $valorJornada)) {
                $valorJornada = $jornadaActiva;
                $activa = 1;
            }
            $partidos = Xpartidos($temporada_id, $valorJornada, 0);            
            $clasificacion = XgenerarClasificacion($temporada_id, $valorJornada, 0, 0);

        break;

        case 'Goleadores':
            $pesGoleadores = 'active';            
            $goleadores = XclasificacionGoleadores($temporada_id);
        break;

        case 'Zamoras':
            $pesZamoras = 'active';
            $zamoras = XclasificacionZamoras($temporada_id, $valorJornada);
        break;  
        
        case 'Calendario':
            $pesCalendario = 'active';
            $partidos = Xpartidos($temporada_id, 0, 0);
        break;

        

        default:
            $pesNoticias = 'active';$pesFichajes = '';
            break;
    }

    

//fin de arranque 2



?>
<div class="col-xs-12 nopadding whitebox">
	<div class="h10"></div>
		<div class="col-xs-2">
		<?php if ($comunidad_id > 1) {
                 $nombrePais = $torneo['nombreComunidad'];
            if (10 == $comunidad_id && 1 == $torneo['categoria_torneo_id']) {
                $comunidad_id = 55;
                $nombrePais = $nombrePais.' y Melilla';
            }
            if (11 == $comunidad_id && 1 == $torneo['categoria_torneo_id']) {
                $comunidad_id = 56;
                $nombrePais = $nombrePais.' y Ceuta';
            } ?>
        	<div class="comunidad flag<?php echo $comunidad_id; ?>" style="margin-top: 10px; border-bottom: 1px solid black"></div>
        		<?php
        } else { ?>
			<div class="pais flag<?php echo $flagPais; ?>b" style="margin-top: 10px; border-bottom: 1px solid black"></div>
		<?php  }  ?>
		</div>
		
		<div class="col-xs-10 nopadding boldfont txt11">
		<table style="width:100%;">
        <tr><td style="width:80%;" >
			<?php echo $nombreTorneo; ?>
			<span style="font-size:11px"><?php echo $nombrePais; ?></span>
    		</td>
    		
        		<td style="padding-right: 5px; width:20%;text-align:right; cursor:pointer; ">
        			  <a href="/temporada.php?id=<?php echo $temporada_id?>">Volver a futbolme</a>
        		</td>		
    		
		</tr>
        </table>

           



		</div>
</div>
<?php
require_once 'includes/pagTemporada/liga.php';
require_once 'includes/contenedorInf.php'; ?>