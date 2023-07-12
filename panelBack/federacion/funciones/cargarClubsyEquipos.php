<?php
$static_v = 1; 
define('_FUTBOLME_', 1);

require_once '../consultas.php';
require_once '../funciones.php';
include('../../simple/simple_html_dom.php');


$grupo_id=$_POST['grupo_id'];
$competicion_id=$_POST['competicion_id'];
$comunidad_id=$_POST['comunidad_id'];

include ('urlFederaciones.php');
$urlClubsyEquipos.='&codcompeticion='.$competicion_id.'&Sch_Grupo='.$grupo_id;
$url=$urlClubsyEquipos;

$mysqli = conectar(); 
$sql='SELECT id,ip FROM proxis WHERE fallo=0 AND estado=0 ORDER BY uso DESC';
$resultadoSQL = mysqli_query($mysqli, $sql);
$proxis = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC); 


	$proxi=$proxis['ip'];
	$id_proxi=$proxis['id'];

	echo $proxi.' '.$id_proxi.'<br />';

	//imp($id_proxi);
	

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
	$equipos=array();

	foreach($html->find('table.table-striped') as $kt => $tabla){
        foreach($html->find('tr') as $k => $tr){
        if ($k==0){ continue; }
        $equipos[$k][] = trim($tr->find('td', 3)->plaintext);
        $equipos[$k][] = trim($tr->find('td', 4)->plaintext);
        $equipos[$k][]= trim($tr->find('a', 2)->href);
        $equipos[$k][]= trim($tr->find('a', 3)->href);
    	}        
    } 

    foreach ($equipos as $key => $value) {
    	
    	$nombreC=$value[0];$nombreC=str_replace('"', '', $nombreC);
    	$nombreE=$value[1];$nombreE=str_replace('"', '', $nombreE);
    	$fci = preg_replace('/\\/pnfg\\/NPcd\\/NFG_VisCompeticiones_Club\\?cod_primaria=1000123&codclub=(.*)&codtemporada=14/', '$1', $value[2]);
    	$fei = preg_replace('/\\/pnfg\\/NPcd\\/NFG_VisCompeticiones_Equipo\\?cod_primaria=1000123&codequipo=(.*)&codtemporada=14/', '$1', $value[3]);

    	echo $nombreC.'<br />';
    	echo $nombreE.'<br />';
    	echo $fci.'<br />';
    	echo $fei.'<br />';

    	

    	$sql="SELECT id FROM club WHERE federacion_id='".$fci."' AND comunidad_id=".$comunidad_id;
                    $resultadoSQL = mysqli_query($mysqli, $sql);
                    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
                    if (count($resultado)==0){
                        $sqClub='INSERT INTO club (nombre, federacion_id, comunidad_id) 
									VALUES ("'.$nombreC.'", "'.$fci.'", "'.$comunidad_id.'")';
                        $mysqli = conectar();
                        mysqli_query($mysqli, $sqClub);
                        echo $sqClub.'<br />';
                        echo "club insertado<br />"; 
                    } else { 
                        echo "Este club ya esta grabado<br />"; 
                    }

        $sql="SELECT id FROM equipo WHERE federacion_eq_id='".$fei."' AND comunidad_id=".$comunidad_id;
                    $resultadoSQL = mysqli_query($mysqli, $sql);
                    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
                    if (count($resultado)==0){
                        $sqEq='INSERT INTO equipo(nombre, federacion_club_id, federacion_eq_id, comunidad_id, grupo_id) VALUES ("'.$nombreE.'", "'.$fci.'", "'.$fei.'", "'.$comunidad_id.'", "'.$grupo_id.'")';
                        $mysqli = conectar();
                        mysqli_query($mysqli, $sqEq);
                        echo $sqEq.'<br />';
                        echo "Equipo insertado<br />"; 
                    } else { 
                        echo "Este equipo ya esta grabado<br />"; 
                    }
    

    }










	$html->clear();
    unset($html);  
	die('Finalizado');





?>
