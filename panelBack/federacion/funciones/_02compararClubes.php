<?php
define('_FUTBOLME_', 1);

include('../../../src/funciones.php');
include('../../../src/consultas.php');
$tiempo_inicio = microtime_float(); 


$comunidad_id=$_GET['comunidad_id'];
require_once 'urlFederaciones.php';

$f = '../../federacion/'.$territorial.'/clubes.json';

//echo $f.'<br />';

//die('<h4>comentar esta linea para ejecutar el script</h4>');

 
$mysqli = conectar();

$json = file_get_contents($f);
$clubes = json_decode($json, true);


$contador=0;
$actualizados=0;

foreach ($clubes as $key => $value) {

	$value['codigo']=trim($value['codigo']);
	$value['codigo']=str_replace('&nbsp;', '', $value['codigo']);
	$value['localidad']=trim($value['localidad']);
	$value['localidad']=str_replace('&nbsp;', '', $value['localidad']);
    $value['club']=str_replace('"', '', $value['club']);
	settype($value['codigo'],"integer");	

    //imp($key.' '.$value['club']);
	if ($value['equipos']=='-'){ continue; } // no tiene equipos en competicion
	//if ($value['codigo']<900){ continue; } //catalunya

   //imp($key.' '.$value['club']);
    $mystring = $value['club'];
    $findme   = 'escansa';
    $pos = strpos($mystring, $findme); 
    $mystring = $value['club'];
    $findme   = 'ELECCIÓN';
    $pos = strpos($mystring, $findme);    
    if ($pos > 0) { continue; } 
    $mystring = $value['club'];
    $findme   = 'ELECCION';
    $pos = strpos($mystring, $findme);    
    if ($pos > 0) { continue; } 
    $findme   = 'T.F.S.';
    $pos = strpos($mystring, $findme);    
    if ($pos > 0) { continue; } 
    $findme   = 'TAMIENTO';
    $pos = strpos($mystring, $findme);    
    if ($pos > 0) { continue; } 
    $findme   = 'ederación';
    $pos = strpos($mystring, $findme);    
    if ($pos > 0) { continue; } 
    $findme   = 'YTO. ';
    $pos = strpos($mystring, $findme);    
    if ($pos > 0) { continue; } 

   

    $futbolbase_id=str_replace('javascript:Ver(', '', $value['nombre']);
    $futbolbase_id=str_replace(')', '', $futbolbase_id);    

    //if ($futbolbase_id>2999 && $futbolbase_id<3202) { continue; }
    //if ($futbolbase_id>4700 && $futbolbase_id<5491) { continue; }


    if (strlen($value['codigo'])==5) { $codigo=$value['codigo']; }
    if (strlen($value['codigo'])==4) { $codigo='0'.$value['codigo']; }
    if (strlen($value['codigo'])==3) { $codigo='00'.$value['codigo']; } 
    if (strlen($value['codigo'])==2) { $codigo='000'.$value['codigo']; } 
    if (strlen($value['codigo'])==1) { $codigo='0000'.$value['codigo']; }

    if ($codigo=='00000'){ continue; }
    
    $obs='Equipos: '.$value['equipos'];
    $obs.='<br />Localidad: '.$value['localidad'];
    $sq='SELECT id FROM club WHERE territorialRFEF="'.$territorial.'" AND codigoRFEF="'.$codigo.'"';
    //echo $sq.'<br />';
    
    $resultadoSQL = mysqli_query($mysqli, $sq);
    $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC); 
    if (count($resultado)==0){      
        $club=$value['club'];
        //echo $club.'<br />'; 
        $club=str_replace("'", '´', $club);
        $club=str_replace("&nbsp;", '', $club);
        $club=str_replace(".", '', $club);

        $palabras = explode(' ', $club);
        $c='';
        foreach ($palabras as $palabra) {
            if (strlen($palabra)>2) { $palabra=ucwords(mb_strtolower($palabra)); }
            $c.=$palabra.' ';
        }
        $club=trim($c); 
        $club=str_replace(" DE ", ' de ', $club);
        $club=str_replace(" Y ", ' y ', $club);
        $club=str_replace("/", '-', $club);
        $club=str_replace("Cde ", 'CDE ', $club);
        $club=str_replace("Cdtorrevelo", 'CD Torrevelo', $club);
        $club=str_replace("Adbarrio", 'AD Barrio', $club);
        $club=str_replace("Emf ", 'EMF ', $club);
        $club=str_replace("Edm ", 'EDM ', $club);
        
        //$club = ucwords(mb_strtolower($club));
        
        //$club=trim($club); 
        //$club = preg_replace('/\.(.*?)\./', '$1', $club);            
        //echo $club.'<br />'; 

        

        $sql='SELECT l.id,l.nombre, p.nombre provincia  FROM localidad l
        INNER JOIN provincia p ON l.provincia_id=p.id
        WHERE l.nombre_alternativo LIKE "%'.$value['localidad'].'%" AND (p.comunidad_id='.($comunidad_id+1).' OR p.comunidad_id='.($comunidad_id+2).')';
        //echo $sql;
        $resultadoSQL = mysqli_query($mysqli, $sql);
        $l = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
        if (count($l)==0){ $localidad_id=1; } else { $localidad_id=$l['id']; }  
        //echo $localidad_id.' se busca: '.$value['localidad'].'<br />'; 
        


        $sql='INSERT INTO club(futbolbase_id, localidad_id, pais_id, nombre, nombre_completo, codigoRFEF, territorialRFEF, observaciones) VALUES 
        ("'.$futbolbase_id.'","'.$localidad_id.'","60","'.$club.'","'.$club.'","'.$codigo.'","'.$territorial.'","'.$obs.'")';
        echo $sql.';<br />';
        //mysqli_query($mysqli, $sql);
        $contador++;


    } else {
        $sq='UPDATE club SET futbolbase_id='.$futbolbase_id.',observaciones="'.$obs.'" WHERE id='.$resultado['id'];
        echo $sq.';<br />';
        $actualizados++;
        //mysqli_query($mysqli, $sq);
    }

    
}
//echo '<hr />'.$contador.' clubes insertados - '.$actualizados.' clubes actualizados.';

?>