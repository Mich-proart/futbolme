<?php
$static_v = 1; 
define('_FUTBOLME_', 1);

require_once '../consultas.php';
require_once '../funciones.php';
include('../../simple/simple_html_dom.php');

$grupo_id=$_POST['grupo_id'];
$comunidad_id=$_POST['comunidad_id'];

$mysqli = conectar(); 

$sql='SELECT temporada_id,competicion_id FROM torneo WHERE comunidad_id='.$comunidad_id.' AND grupo_id='.$grupo_id;
$resultadoSQL = mysqli_query($mysqli, $sql);
$t = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC); 
$temporada_id=$t['temporada_id'];
$competicion_id=$t['competicion_id'];

include ('urlFederaciones.php');

$urlCalendario.='&codcompeticion='.$competicion_id.'&codgrupo='.$grupo_id;
$url=$urlCalendario;



$sql='SELECT e.id,e.nombre, e.federacion_eq_id, e.futbolme_id fm_equipo_id
FROM equipo e
WHERE e.comunidad_id='.$comunidad_id.' AND e.grupo_id='.$grupo_id;
$resultadoSQL = mysqli_query($mysqli, $sql);
$equipos = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC); 



echo $url.'<br />';


$sql='SELECT id,ip FROM proxis WHERE fallo=0 AND estado=0 ORDER BY ip';
$resultadoSQL = mysqli_query($mysqli, $sql);
$proxis = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC); 




	$proxi=$proxis['ip'];
	$id_proxi=$proxis['id'];

	echo $proxi.' '.$id_proxi.'<br />';
	

	$html = new simple_html_dom();
	$content=getPage($url,$proxi,$id_proxi);


	   if (substr($content, 0,5)=='proxy') { 
            echo $content.'<hr />';
            $sql='UPDATE proxis SET fallo=fallo+1  WHERE id='.$id_proxi;
            echo $sql.'<br />';
            mysqli_query($mysqli, $sql); 
            echo 'finalizado por error en proxi '.$proxi;
            die; 
        }
        
        

    $sql='UPDATE proxis SET uso=uso+1 WHERE id='.$id_proxi;
    mysqli_query($mysqli, $sql); 


	$string = str_get_html($content);
    var_dump($string); 

	$html->load($string);
	$jornadas=array();

	foreach($html->find('div.panel-primary') as $key => $div){
        $jornadas[$key]['jornada'] = trim($div->find('h3', 0)->plaintext);

        foreach($div->find('tr') as $k => $tr){
        $jornadas[$key]['partidos'][$k]['local'] = trim($tr->find('td', 0)->plaintext);
        $jornadas[$key]['partidos'][$k]['visitante'] = trim($tr->find('td', 2)->plaintext);
    	}        
    } 

    foreach ($jornadas as $kj => $value) {
        $j=explode('(',$value['jornada']);
        $jornada=$j[0];$jornada=str_replace('Jornada ', '', $jornada);
        $f=$j[1];$f=str_replace(')', '', $f);
        $fecha=substr($f, -4).'-'.substr($f, 3,2).'-'.substr($f, 0,2);

        foreach ($value['partidos'] as $kp => $vp) {
            $local=$vp['local'];$local=str_replace('"', '', $local);$local=str_replace('&nbsp;', '', $local);
            $visitante=$vp['visitante'];$visitante=str_replace('"', '', $visitante);$visitante=str_replace('&nbsp;', '', $visitante);
            $fm_local=0;$fm_visitante=0;$equipoLocal_id=0;$equipoVisitante_id=0; 

            foreach ($equipos as $ke => $ve) {                
                if (trim($ve['nombre'])==trim($local)){ 
                    $fm_local=$ve['fm_equipo_id'];
                    $equipoLocal_id=$ve['federacion_eq_id'];
                }  
                if (trim($ve['nombre'])==trim($visitante)){ 
                    $fm_visitante=$ve['fm_equipo_id'];
                    $equipoVisitante_id=$ve['federacion_eq_id'];
                } 
             }
            

            echo 'Temporada '.$temporada_id.'<br />';
            echo 'Comunidad '.$comunidad_id.'<br />';
            echo 'Jornada '.$jornada.'<br />';
            echo 'Fecha '.$fecha.'<br />';
            echo 'local '.$local.'<br />';
            echo 'visitante '.$visitante.'<br />';
            echo 'fm_local '.$fm_local.'<br />';
            echo 'fm_visitante '.$fm_visitante.'<br />';
            echo 'equipoLocal_id '.$equipoLocal_id.'<br />';
            echo 'equipoVisitante_id '.$equipoVisitante_id.'<hr />';

            if ($fm_local==0 && $fm_visitante==0){ continue; }

            $sql='SELECT id FROM partido WHERE temporada_id='.$temporada_id.' AND fm_local_id='.$fm_local.' AND fm_visitante_id='.$fm_visitante;
            $resultadoSQL = mysqli_query($mysqli, $sql);
            $p = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
            if (count($p)==0){
                $sql='INSERT INTO partido (temporada_id, comunidad_id, jornada, fm_local_id, fm_visitante_id, fecha, local, visitante, equipoLocal_id, equipoVisitante_id) VALUES ("'.$temporada_id.'", "'.$comunidad_id.'", "'.$jornada.'", "'.$fm_local.'", "'.$fm_visitante.'", "'.$fecha.'", "'.$local.'", "'.$visitante.'", "'.$equipoLocal_id.'", "'.$equipoVisitante_id.'")'; 
                mysqli_query($mysqli, $sql);
                echo $sql.'<br />';
            } else { echo 'este partido ya estaba grabado<br />';}
        }
    }


	$html->clear();
    unset($html);  
	die('Finalizado OK');


?>
