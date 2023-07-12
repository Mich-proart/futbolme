<?php
define('_FUTBOLME_', 1);
include('../../../src/funciones.php');
include('../../../src/consultas.php');
?>
<h4>Categorias y equipos</h4>
<?php

$comunidad_id=$_GET['comunidad_id'];
require_once 'urlFederaciones.php';

$carpeta = '../../federacion/'.$territorial.'/equipos/';

imp($carpeta);


$directorio = opendir($carpeta); //ruta actual
$archivos=array();
  while ($archivo = readdir($directorio)) {  
    if ($archivo=="." || $archivo=="..") { continue; } 
    $archivos[] = $archivo;
  }

  $torneos=array();

  
    
    if (count($archivos)>0) {
         
        foreach ($archivos as $f) {
            $json = file_get_contents($carpeta.$f);
            $club = json_decode($json, true);
            if (!isset($club['equipos'])){ continue; }
            $equipos=$club['equipos'];
            
            foreach ($equipos as $key => $value) {

            if (substr($value['torneo'], -3)=='(*)'){ continue; }

                //galicia
                    $mystring = $value['torneo'];
                    $findme   = 'FUTBOL SALA';
                    $pos = strpos($mystring, $findme);
                    //imp($pos);
                    if ($pos > 0) { continue; }  

                    $mystring = $value['torneo'];
                    $findme   = 'F. SALA';
                    $pos = strpos($mystring, $findme);
                    //imp($pos);
                    if ($pos > 0) { continue; } 

                    $mystring = $value['torneo'];
                    $findme   = ' F.S.';
                    $pos = strpos($mystring, $findme);
                    //imp($pos);
                    if ($pos > 0) { continue; } 

                    $mystring = $value['torneo'];
                    $findme   = 'PLAYA';
                    $pos = strpos($mystring, $findme);
                    //imp($pos);
                    if ($pos > 0) { continue; }  

                    $mystring = $value['torneo'];
                    $findme   = 'VETERANO';
                    $pos = strpos($mystring, $findme);
                    //imp($pos);
                    if ($pos > 0) { continue; }  

                    $mystring = $value['torneo'];
                    $findme   = 'BIBERON';
                    $pos = strpos($mystring, $findme);
                    //imp($pos);
                    if ($pos > 0) { continue; }  

                    $mystring = $value['torneo'];
                    $findme   = 'F-8';
                    $pos = strpos($mystring, $findme);
                    //imp($pos);
                    if ($pos > 0) { continue; }  
                    $mystring = $value['torneo'];
                    $findme   = 'F-7';
                    $pos = strpos($mystring, $findme);
                    //imp($pos);
                    if ($pos > 0) { continue; } 

                    $mystring = $value['torneo'];
                    $findme   = 'NACIONAL';
                    $pos = strpos($mystring, $findme);
                    //imp($pos);
                    if ($pos > 0) { continue; } 

                    $mystring = $value['torneo'];
                    $findme   = 'PREFERENTE';
                    $pos = strpos($mystring, $findme);
                    //imp($pos);
                    if ($pos > 0) { continue; } 

                    $mystring = $value['torneo'];
                    $findme   = 'FUTBOL 8';
                    $pos = strpos($mystring, $findme);
                    //imp($pos);
                    if ($pos > 0) { continue; } 

                    $mystring = $value['torneo'];
                    $findme   = 'PROMESAS FEMENINA';
                    $pos = strpos($mystring, $findme);
                    //imp($pos);
                    if ($pos > 0) { continue; } 


                    $mystring = $value['torneo'];
                    $findme   = 'GAELICO';
                    $pos = strpos($mystring, $findme);
                    //imp($pos);
                    if ($pos > 0) { continue; }  

                //fin de galicia

                /*catalunya
                    $mystring = $value['torneo'];
                    $findme   = 'F-7';
                    $pos = strpos($mystring, $findme);
                    //imp($pos);
                    if ($pos > 0) { continue; } 

                    $mystring = $value['torneo'];
                    $findme   = 'SALA';
                    $pos = strpos($mystring, $findme);
                    //imp($pos);
                    if ($pos > 0) { continue; }                      

                    $mystring = $value['torneo'];
                    $findme   = 'NACIONAL';
                    $pos = strpos($mystring, $findme);
                    //imp($pos);
                    if ($pos > 0) { continue; } 

                    $mystring = $value['torneo'];
                    $findme   = 'BENJAMÍ';
                    $pos = strpos($mystring, $findme);
                    //imp($pos);
                    if ($pos > 0) { continue; } 

                    $mystring = $value['torneo'];
                    $findme   = 'DEBUTANT';
                    $pos = strpos($mystring, $findme);
                    //imp($pos);
                    if ($pos > 0) { continue; } 

                    $mystring = $value['torneo'];
                    $findme   = 'PLATJA';
                    $pos = strpos($mystring, $findme);
                    //imp($pos);
                    if ($pos > 0) { continue; } 

                    $mystring = $value['torneo'];
                    $findme   = 'TARRAGONA';
                    $pos = strpos($mystring, $findme);
                    //imp($pos);
                    if ($pos > 0) { continue; } 

                    $mystring = $value['torneo'];
                    $findme   = 'PENYES';
                    $pos = strpos($mystring, $findme);
                    //imp($pos);
                    if ($pos > 0) { continue; } 

                    $mystring = $value['torneo'];
                    $findme   = 'ALEVÍ';
                    $pos = strpos($mystring, $findme);
                    //imp($pos);
                    if ($pos > 0) { continue; } 

                //fin de catalunya */

                   
                    $futbolbase_id=str_replace('futbolbase_', '', $f);
                    $futbolbase_id=str_replace('.json', '', $futbolbase_id);

                    
                    $equipo_id=str_replace('/pnfg/NPcd/NFG_VisEquipos?cod_primaria=1000119&Codigo_Equipo=', '', $value['url']);
                    $equiposClub[$futbolbase_id][$equipo_id]['federacion_id']=$equipo_id;
                    $equiposClub[$futbolbase_id][$equipo_id]['equipo']=$value['equipo'];
                    $equiposClub[$futbolbase_id][$equipo_id]['categoria']=$value['torneo'];   


                    $torneos[$value['torneo']]=$value['torneo'];
               }

            }   
        imp($torneos);   
        imp($equiposClub);        

        $file1 = '../../federacion/'.$territorial.'/categorias.json';
        $file2 = '../../federacion/'.$territorial.'/equipos.json';
        guardarJSON($torneos, $file1);
        guardarJSON($equiposClub, $file2); 

    } else {
    echo "sin archivos<hr />";
    } ?>
