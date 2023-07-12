<?php 
define('_PANEL_', 1);
require_once '../../includes/config.php';


$fechaBase='';
$api_id=$_POST['api_id']??die('Necesitamos un número de ID'); //bélgica
if ($api_id==0){ die('Necesitamos un número de ID'); }
$temporada_id=$_POST['temporada_id']??0;
$proximos=1;$inicio="";
$antiguos=0;

/*
if (isset($_GET['modo']) && $_GET['modo']=='recuperar'){
    $inicio=$_GET['day']??date('Y-m-d');
    $inicio='&day='.$inicio;
    if ($api_id==79 || $api_id==905 || $api_id==126 || $api_id==1086 || $api_id==222 || 
        $api_id==189 || $api_id==398 || $api_id==77 || $api_id==867 || $api_id==193 || 
        $api_id==942 || $api_id==4228 ) { $inicio=''; $antiguos=1;}
    
    switch ($api_id) {
        case 79:$fechaBase='2018-03-2';break;
        case 905:$fechaBase='2018-03-09';break;
        case 126:$fechaBase='2018-03-09';break;
        case 1086:$fechaBase='2018-03-29';break;
        case 222:$fechaBase='2018-04-26';break;
        case 189:$fechaBase='2018-04-04';break;
        case 398:$fechaBase='2018-02-13';break;
        case 77:$fechaBase='2018-03-28';break;
        case 867:$fechaBase='2018-03-01';break;
        case 193:$fechaBase='2018-02-21';break;
        case 942:$fechaBase='2018-02-28';break;
        case 4228:$fechaBase='2018-03-08';break;
        default:$fechaBase='';break;
    }
    unset($proximos); $recuperar=1;
}*/



include('betsapi.php');

echo $url."<br />";

$resultado = file_get_contents($url); 
$ch = curl_init($url);     
    curl_setopt($ch, CURLOPT_FAILONERROR, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);    
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true );
    curl_setopt($ch, CURLOPT_ENCODING, "" );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt($ch, CURLOPT_AUTOREFERER, true );    
    curl_setopt($ch, CURLOPT_MAXREDIRS, 10 );
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_REFERER, 'http://www.google.com/');
    curl_setopt($ch, CURLOPT_AUTOREFERER, true);
    $resultado = curl_exec($ch);
    print_r(curl_getinfo($ch));
    if(curl_errno($ch)) {
        echo curl_error($ch);
        return 'sin proxy:  - ERROR '.curl_error($ch);
    } 
    curl_close($ch);



if ($resultado['success']==1){
	echo "Página ".$resultado['pager']['page']."<br />";
	echo "Resultados por página ".$resultado['pager']['per_page']."<br />";
	echo "Total resultados ".$resultado['pager']['total']."<br />";
	$paginas=intdiv($resultado['pager']['total'], $resultado['pager']['per_page']);
	echo "Total páginas ".$paginas."<br />";
    if (isset($_GET['modo']) && $_GET['modo']=='recuperar' && $antiguos==1){ $m="&modo=recuperar"; } else { $m='';}
	for ($i=0; $i < $paginas; $i++) {
		$pagina=$i+1; 
		echo '<a href="comprobando.php?api_id='.$api_id.'&temporada_id='.$temporada_id.$m.'&pagina='.$pagina.'">'.$pagina.'</a> - ';
	}
}
$partidosApi = $resultado['results'];
$fechaBase=strtotime($fechaBase)??0;
$partidos = XpartidosX($temporada_id, 0);
    foreach ($partidosApi as $datosAPI) {
        $api_fecha=$datosAPI['time'];
        $fecha = date('Y-m-d',$api_fecha);
        $hora = date('H:i:s',$api_fecha);
        if (isset($_GET['modo']) && $_GET['modo']=='recuperar' && $antiguos==1 ){
            echo "<br />".$fecha." ".$hora."<br />";
            $api_fecha=(int)$api_fecha;
            imp($api_fecha);
            imp($fechaBase);

            if ($api_fecha<$fechaBase){ echo "no se graba - "; continue; }
        }

        $api_local=$datosAPI['home']['id'];
        $api_visitante=$datosAPI['away']['id'];

        $api_id_partido=$datosAPI['id'];
        $ep=$datosAPI['time_status'];
        if ($ep==3){ $ep=1; } else { $ep=0; }
        $gl=$datosAPI['scores']['2']['home']??0;
        $gv=$datosAPI['scores']['2']['away']??0;
        
        $api_jornada=$datosAPI['extra']['round'];
        unset($partidoApi);
        $partidoApi = array(
        'estado_partido' => $ep,
        'goles_local' => $gl,
        'goles_visitante' => $gv,
        'betsapi' => $api_id_partido,
        'fecha' => $fecha,
        'hora_prevista' => $hora,
        'jornada' => $api_jornada,
        );
        /*echo 'Jornada '.$api_jornada;
        echo ' ('.$datosAPI['home']['id'].') '.$datosAPI['home']['name'].' - '.$datosAPI['away']['name'].' ('.$datosAPI['away']['id'].')';
        echo ' '.$fecha.' '.$hora.'<br />';*/

        foreach ($partidos as $value) { 
        	if ((int)$value['betsapiLocal']==(int)$api_local && (int)$value['betsapiVisitante']==(int)$api_visitante){
        		
               
                if ($value['estado_partido']==1) {
                     echo '<br /><b>Jornada '.$value['jornada'];
                echo ' ('.$value['betsapiLocal'].') '.$value['localCorto'].' - '.$value['visitanteCorto'].' ('.$value['betsapiVisitante'].')';
                echo ' '.$value['fecha'].' '.$value['hora_prevista'].'</b>';

                } else {
                    $partidoApi['partido_id']=$value['id'];
            		modificarPartidoX($partidoApi);
                }
        		break;
        	}
        } //foreach
    }

echo '<h3><span style="cursor:pointer" onclick="editarCalendario('.$temporada_id.',1)">Partidos actualizados correctamente</span></h3>';

function XpartidosX($temporada_id)
{
    $campos = "p.id, p.partidoAPI,p.temporada_id,p.estado_partido,p.jornada,
p.fecha, p.hora_prevista, p.hora_real,p.goles_local,p.goles_visitante,
p.grupo_id, p.betsapi,ec.nombreCorto localCorto, ec.betsapi betsapiLocal,
p.equipoLocal_id,ef.nombreCorto visitanteCorto, ef.betsapi betsapiVisitante,
p.equipoVisitante_id";
    $tabla = 'partido p';
    $union = ' INNER JOIN equipo ec ON p.equipoLocal_id=ec.id';
    $union .= ' INNER JOIN equipo ef ON p.equipoVisitante_id=ef.id'; 
    $condicion = ' WHERE p.temporada_id='.$temporada_id;    
    $orden = ' ORDER BY p.jornada, p.grupo_id, p.fecha, p.hora_prevista';    
    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;
    //echo $consulta;
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);    
    return $resultado;
}

function modificarPartidoX($partidoApi) { 
    $mysqli = conectar();
    $consulta = 'UPDATE partido SET 
    estado_partido='.$partidoApi['estado_partido'].',
    goles_local='.$partidoApi['goles_local'].',
    goles_visitante='.$partidoApi['goles_visitante'].',
    betsapi='.$partidoApi['betsapi'].',
    jornada='.$partidoApi['jornada'].', 
    fecha="'.$partidoApi['fecha'].'",
    hora_prevista="'.$partidoApi['hora_prevista'].'"
    WHERE id='.$partidoApi['partido_id'];
    $resultadoSQL = mysqli_query($mysqli, $consulta); 
}

?>           
