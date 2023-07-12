<?php

define('_FUTBOLME_', 1);

require_once '../consultas.php';
require_once '../funciones.php';
include('../../simple/simple_html_dom.php');
include('../../../src/funciones.php');
$tiempo_inicio = microtime_float(); 


$comunidad_id=$_GET['comunidad_id'];
require_once 'urlFederaciones.php';

$mysqliFM = conectarFM();


$sq='SELECT id,futbolbase_id FROM club WHERE territorialRFEF="'.$territorial.'" AND futbolbase_id>0 AND (origen_id=0 OR origen_id IS NULL)  ORDER BY id LIMIT 1';
//echo $sq.'<br />';
$resultadoSQL = mysqli_query($mysqliFM, $sq);
$fed = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);

if (count($fed)==0){ die('FINALIZADO'); }
$futbolbase_id=$fed['futbolbase_id'];
$club_id=$fed['id']; 

$url=$urlClub.$futbolbase_id;
echo $url.'<br />';

//die('<h4>comentar esta linea para ejecutar el script</h4>');


$mysqli = conectar();

$sql='DELETE FROM proxis WHERE uso=0 AND fallo>1';
echo $sql.'<br/>';
mysqli_query($mysqli, $sql);

$sql='DELETE FROM proxis WHERE fallo>2 AND uso<10';
echo $sql.'<br/>';
mysqli_query($mysqli, $sql);
 
$sql='SELECT id,ip FROM proxis WHERE fallo<3 ORDER BY uso DESC, fallo LIMIT 8';
$resultadoSQL = mysqli_query($mysqli, $sql);
$proxis = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC); 

$proxis = array_reverse($proxis);

if (count($proxis)<5){
    $sql='UPDATE proxis SET uso=0, fallo=0';
    mysqli_query($mysqli, $sql);
}

imp($proxis);
$fallo=0;

    foreach ($proxis as $key => $value) {

        $proxi=$value['ip'];
        $id_proxi=$value['id'];
        imp($proxi);
        imp($id_proxi);

        
        $html = new simple_html_dom();
        $content=getPage($url,$proxi,$id_proxi); 

        
        if (strlen($content)>1000) { break; }
        $sql='UPDATE proxis SET fallo=fallo+1  WHERE id='.$id_proxi;
        mysqli_query($mysqli, $sql); 
        unset($proxis[$key]);
        unset($proxi);
        unset($id_proxi);
        $html->clear();
        unset($html);  

        $totalProxis=count($proxis);
        echo ' - Quedan '.$totalProxis.' proxis por usar<br />';
        if ($totalProxis==0){ $fallo=1;break; }
    }
    //var_export($content);
    if ($fallo==0){
        $sql='UPDATE proxis SET uso=uso+1 WHERE id='.$id_proxi;
        mysqli_query($mysqli, $sql); 

        $string = str_get_html($content);
        $html->load($string);
        $todo=array();
        $datos=array();
        $equipos=array();        
        
        $contadorDatos=0;
        
        
        $tabla1=$html->find('table.tabla_rdg', 0); //galicia, murcia, extremadura, rioja, aragon
        //$tabla1=$html->find('table.gradient', 0); //cantabria, catalunya, andalucia

        //echo $tabla1;
        $positivo=0;

        if ($tabla1 != null){
            foreach($tabla1->find('table') as $tabla){
                foreach($tabla->find('tr') as $k => $tr){
                    if ($tr->find('td',0) != null){
                        $datos[$contadorDatos][0] = trim($tr->find('td',0)->plaintext);
                        if ($tr->find('td',1) != null){
                            $datos[$contadorDatos][1] = trim($tr->find('td',1)->plaintext);
                        }
                        if (isset($datos[$contadorDatos][1])){ $contadorDatos++; }
                    }
                }
            }
            $positivo=1;
        }

        $contador=0;
        foreach($html->find('tr[bgcolor=#FFFFFF]') as $k => $e){
            $contador++;
            $equipos[$contador]['url'] = trim($e->find('a', 0)->href);
            $equipos[$contador]['equipo'] = trim($e->find('a', 0)->plaintext);
            $equipos[$contador]['torneo'] = trim($e->find('td', 1)->plaintext);  
        }
        foreach($html->find('tr[bgcolor=#F2F2F2]') as $k => $e){
            $contador++;
            $equipos[$contador]['url'] = trim($e->find('a', 0)->href);
            $equipos[$contador]['equipo'] = trim($e->find('a', 0)->plaintext);
            $equipos[$contador]['torneo'] = trim($e->find('td', 1)->plaintext);  
        } 

        
        
        
        

        /* 
        //madrid, balears
        $positivo=0;
        foreach($html->find('h5') as $k => $e){
            $datos[$k]['valor'] = $e->plaintext;
            if ($k>18){ break; }
        }


        foreach($html->find('h5.bold') as $k => $e){
            $equipos[$k]['url'] = trim($e->find('a', 0)->href);
            $equipos[$k]['equipo'] = trim($e->find('a', 0)->plaintext);  
        }

        foreach($html->find('h5.list-group-item-text') as $k => $e){
            $equipos[$k]['torneo'] = $e->plaintext;
        }
        */
        
        $todo['datos']=$datos;
        $todo['equipos']=$equipos;

        if (count($todo['equipos'])>0){ $positivo=1; }

        imp($todo); 

        
       
        $file = '../../federacion/'.$territorial.'/equipos/futbolbase_'.$futbolbase_id.'.json';     
        
        if ($positivo==1){
        guardarJSON($todo, $file); 
        $sq='UPDATE club SET origen_id=1 WHERE id='.$club_id;
        echo $sq.'<br />';
        mysqli_query($mysqliFM, $sq);
        }

        unset($todo);

        $html->clear();
        unset($html);
    }

 

$tiempo_fin = microtime_float();
$tiempo = $tiempo_fin - $tiempo_inicio;
echo '<hr />Tiempo empleado: '.($tiempo_fin - $tiempo_inicio);


$time = time();
echo '<br />La hora actual en el servidor es: '.date('H:i:s', $time);
?>
<script LANGUAGE="JavaScript"> 
var pagina="_03grabarEquipos.php?comunidad_id=<?php echo $comunidad_id?>"; 

function redireccionar() 
{ 
location.href=pagina 
} 
setTimeout ("redireccionar()", 2000); 
</script> 
