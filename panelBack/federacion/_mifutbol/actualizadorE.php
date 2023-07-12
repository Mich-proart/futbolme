<?php
set_time_limit(0);
define('_FUTBOLME_', 1);

require_once '../consultas.php';
require_once '../funciones.php';
include('../../simple/simple_html_dom.php');
include('../../../src/funciones.php');
$tiempo_inicio = microtime_float(); 

$mysqli = conectar();

$comunidad_id=$_GET['co'];
$fase=$_GET['f'];
$competicion=$_GET['c'];
$grupo=$_GET['g'];


require_once '../funciones/urlFederaciones.php';

$variables='&id_competicion='.$competicion.'&id_fase='.$fase.'&id_grupo='.$grupo;
$url=str_replace('xxx', $variables, $urlWebJor);

echo ' - <a href="'.$url.'" target="_blank">ver</a>';


$sql='DELETE FROM '.$bd.' WHERE uso=0 AND fallo>1';
echo $sql.'<br/>';
mysqli_query($mysqli, $sql);    
     
$sql='SELECT id,ip,uso FROM '.$bd.' WHERE fallo<3 ORDER BY uso DESC, fallo LIMIT 8';
$resultadoSQL = mysqli_query($mysqli, $sql);
$proxis = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC); 
$proxis = array_reverse($proxis);


if (count($proxis)<5){
    $sql='UPDATE '.$bd.' SET uso=0, fallo=0';
    mysqli_query($mysqli, $sql);
    echo 'reiniciados los proxis<br />'; 
}   
$fallo=1;

$html = new simple_html_dom();
$content=getPageLibre($url); 

if (strlen($content)>1000) { 
    $fallo=0; echo 'conseguido independiente.<br />';
} else {

    foreach ($proxis as $key => $value) {
        $proxi=$value['ip'];
        $id_proxi=$value['id'];
        $uso_proxi=$value['uso'];
        imp($proxi);
        imp($id_proxi);         
        $html = new simple_html_dom();
        //$content=getPageLibre($url,$proxi,$id_proxi); 
        $content=getPage($url,$proxi,$id_proxi); 
        if (strlen($content)>1000) { $fallo=0; break; }
        $sql='UPDATE '.$bd.' SET fallo=fallo+1  WHERE id='.$id_proxi;
        mysqli_query($mysqli, $sql); 
        unset($proxis[$key]);
        unset($proxi);
        unset($id_proxi);
        $html->clear();
        unset($html);
        $totalProxis=count($proxis);
        echo ' - Quedan '.($totalProxis).' proxis por usar<br />';
        if ($totalProxis==0){ $fallo=1; break; } 
    }
}
echo '<br />Fallo: '.$fallo.'<br />';
if ($fallo==0){

    $fe = '../'.$territorial.'/equipos/'.$grupo.'-equipos.json';
                    
    $string = str_get_html($content);
    $html->load($string);

    //echo $html; //- Activar para comprobar el contenido enviado.
    $datos=array();

   
      foreach($html->find('tr.filagorda') as $k => $e){ 
        if (strlen($e)<300){ continue; }
          /*imp($k);
          ?>
          <textarea cols="150" rows="8"><?php echo $e?></textarea>
        <?php */
        if ($e->find('a.enlace_equipo',1) != null){
          $datos['partidos'][$k]['escudo_local'] = trim($e->find('img.escudo_tabla',0)->src);
          $datos['partidos'][$k]['escudo_visitante'] = trim($e->find('img.escudo_tabla',1)->src);
          $datos['partidos'][$k]['url_local'] = trim($e->find('a.enlace_equipo',0)->href);
          $datos['partidos'][$k]['local'] = trim($e->find('a.enlace_equipo',0)->plaintext);
          $datos['partidos'][$k]['url_visitante'] = trim($e->find('a.enlace_equipo',1)->href);
          $datos['partidos'][$k]['visitante'] = trim($e->find('a.enlace_equipo',1)->plaintext);
        }       
      } 

    
    $html->clear();
    unset($html); 
     
    $dd=array();
    $k=0;
    if (isset($datos)){
        foreach ($datos['partidos'] as $value) {        
            $dd[$k]['url']=$value['url_local'];            
            $i=explode('&', $dd[$k]['url']);
            $id=str_replace('competiciones_publico_equipo.php?id_equipo=', '', $i[0]);            
            $dd[$k]['id']=$id;
            $dd[$k]['equipo']=$value['local'];
            $dd[$k]['club']=$value['escudo_local'];
            $k++;

            $dd[$k]['url']=$value['url_visitante'];            
            $i=explode('&', $dd[$k]['url']);
            $id=str_replace('competiciones_publico_equipo.php?id_equipo=', '', $i[0]);            
            $dd[$k]['id']=$id;
            $dd[$k]['equipo']=$value['visitante'];
            $dd[$k]['club']=$value['escudo_visitante'];
            $k++;
        }
    }



    
    if (count($dd)>0){
        guardarJSON($dd, $fe);
        echo 'Guardado '.$fe.'<br />';
        
        unset($datos);unset($dd);
    } else { 
        echo 'La carga de equipos ha fallado. Vuelvelo a intentar pasados unos minutos'; 
        $sql='DELETE FROM '.$bd.' WHERE id='.$id_proxi;
        mysqli_query($mysqliBase, $sql);
        unset($proxi); unset($id_proxi);
    }

} // si fallo de fichero equipo es igual a 0
            