<?php 
define('_FUTBOLME_', 1);

require_once '../../../src/consultas.php';

function imp($ob)
{
    if (!empty($ob)) {
        echo '<pre>';
        print_r($ob);
        echo '</pre>';
    }
}

$f = 'clubes_madrid.json';


$json = file_get_contents($f);
$clubes = json_decode($json, true);

$territorial='05';
$comunidad_id=7;
$contador=0;

foreach ($clubes as $key => $value) {
    if (empty($value['codigo'])){ continue; }

    $futbolbase_id=str_replace('javascript:Ver(', '', $value['nombre']);
    $futbolbase_id=str_replace(')', '', $futbolbase_id);    
    if (strlen($value['codigo'])==5) { $codigo=$value['codigo']; }
    if (strlen($value['codigo'])==4) { $codigo='0'.$value['codigo']; }
    if (strlen($value['codigo'])==3) { $codigo='00'.$value['codigo']; } 
    $obs='Equipos: '.$value['equipos'];
    $sq='SELECT id FROM club WHERE territorialRFEF="'.$territorial.'" AND codigoRFEF="'.$codigo.'"';
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $sq);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC); 
    if (count($resultado)==0){      
        $club=$value['club'];
        $club = ucwords(mb_strtolower($club));
        $club=str_replace('C.d.', 'Club Deportivo', $club);
        $club=str_replace('A.d.', 'Asociación Deportiva', $club);
        $club=str_replace('C.f.', 'Club de Futbol', $club);
        $club=str_replace('S.a.d.', 'Sociedad Anónima Deportiva', $club);
        $club=str_replace('C.r.', 'Club Recreativo', $club);
        $club=str_replace('U.d.', 'Unión Deportiva', $club);        
        echo $club.'<br />'; 

        $sql='SELECT l.id,l.nombre, p.nombre provincia  FROM localidad l
        INNER JOIN provincia p ON l.provincia_id=p.id
        WHERE l.nombre LIKE "'.$value['localidad'].'" AND p.comunidad_id='.($comunidad_id+1);
        $resultadoSQL = mysqli_query($mysqli, $sql);
        $l = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
        if (count($l)==0){ $localidad_id=1; } else { $localidad_id=$l['id']; echo $l['nombre'].' - '; }  
        echo $localidad_id.'<br />'; 
        


        $sql='INSERT INTO club(futbolbase_id, localidad_id, pais_id, nombre, nombre_completo, codigoRFEF, territorialRFEF, observaciones) VALUES 
        ("'.$futbolbase_id.'","'.$localidad_id.'","60","'.$club.'","'.$club.'","'.$codigo.'","'.$territorial.'","'.$obs.'")';
        echo $sql.'<br />';
        $resultadoSQL = mysqli_query($mysqli, $sql);
        $contador++;

    } else {
        $sq='UPDATE club SET futbolbase_id='.$futbolbase_id.',observaciones="'.$obs.'" WHERE id='.$resultado['id'];
        mysqli_query($mysqli, $sq);
    }
}
echo '<hr />'.$contador.' clubes insertados';

?>


