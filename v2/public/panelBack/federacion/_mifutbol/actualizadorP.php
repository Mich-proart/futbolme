<?php
define('_PANEL_', 1);
set_time_limit(0);
require_once '../../includes/config.php';
include('../../simple/simple_html_dom.php');
$tiempo_inicio = microtime_float(); 
$comunidad_id=$_GET['comunidad_id'];
$compe=$_GET['compe']??0;
$carpeta='';
require_once '../funciones/urlFederaciones.php';
$f = '../../federacion/'.$territorial.'/campeonatos.json';
$json = file_get_contents($f);
$campeonatos = json_decode($json, true);

foreach ($campeonatos as $kC => $camp) 
{    
    $kC=str_replace("'", '', $kC); $kC=trim($kC);
    if ($kC!=$compe){ continue; }
    echo $camp['nombre'].'<br />';
    $f = '../../federacion/'.$territorial.'/'.$kC.'-grupos.json';
    
    if (@file_exists($f)) 
    { 
        $json = file_get_contents($f);
        $grupos = json_decode($json, true); 
        $contador=0;
        imp($grupos);
        $kf=$grupos['fases'][0];
        $kf=str_replace("'", '', $kf);
        $kf=str_replace('selected', '', $kf); 
        $kf=trim($kf);
        foreach ($grupos as $kg => $v) 
        {
            if ($kg=='fases'){ $contador++; continue; }
            $kg=str_replace("'", '', $kg);$kg=str_replace("selected", '', $kg); $kg=trim($kg);
            echo '<br />'.$v['nombre'].' - ';            

            $fe = '../../federacion/'.$territorial.'/equipos/'.$kg.'-equipos.json';
            if (@file_exists($fe))
            { 
                imp($fe);
                $fp = '../../federacion/'.$territorial.'/calendarios/'.$kg.'-partidos.json';                
                if (!@file_exists($fp)) 
                { 
                  imp($fp);
                  echo '<h3>'.$kg.'</h3>';

                    if ($comunidad_id==2
                      || $comunidad_id==6 
                      || $comunidad_id==8 
                      || $comunidad_id==15
                    ){   
                        $variables='&id_competicion='.$kC.'&id_fase='.$kf.'&id_grupo='.$kg;
                        $url=str_replace('xxx', $variables, $urlj1);
                    } else {
                        $variables='&codcompeticion='.$kC.'&codgrupo='.$kg; 
                        $url=$urlCalendario.$variables;
                    }

                    
                    echo ' - <a href="'.$url.'" target="_blank">ver</a><hr />';
                    
                    include '../funciones/getPage.php';
                    if ($fallo==0)
                    {
                        include('../_mifutbol/partidos.php');                        
                        $partidos=array();
                        if (isset($datos) && count($datos)>0)
                        {
                          $fe = '../../federacion/'.$territorial.'/equipos/'.$kg.'-equipos.json';
                          $json = file_get_contents($fe);
                          $equiposTorneo = json_decode($json, true);
                         
                          foreach ($datos as $key => $value) 
                          {
                          if ($comunidad_id==2
                            || $comunidad_id==6 
                            || $comunidad_id==8 
                            || $comunidad_id==15
                          ){   
                              $jornada=$value['jornada'];
                              $f1=$value['fecha'];
                              $f1=str_replace(')', '', $f1);
                              $f=explode('/', $f1);       
                              $fecha=trim($f[2]).'-'.trim($f[1]).'-'.trim($f[0]);     
                          }
                          if ($comunidad_id==5 || $comunidad_id==3 || $comunidad_id==9 || $comunidad_id==10){
                              $jornada=$value['jornada'];
                              $f=$value['fecha'];
                              $f=explode('-', $f);$f=str_replace('(', '', $f);$f=str_replace(')', '', $f);
                              $fecha=$f[2].'-'.$f[1].'-'.$f[0];       
                          }
                          if ($comunidad_id==14|| $comunidad_id==1){
                              $jornada=$value['jornada'];
                              $f=$value['fecha'];
                              $f=explode('(', $f);$f1=str_replace(')', '', $f[1]);$jornada=$f[0];
                              $f=explode('-', $f1);       
                              $fecha=$f[2].'-'.$f[1].'-'.$f[0];
                          }                  
                          foreach ($value['partidos'] as $kp => $v) {
                              $local_id=0;$visitante_id=0;$eLocal=''; $eVisitante='';
                              foreach ($equiposTorneo as $k1 => $v1) { 
                                include 'actualizadorP-remplazos.php';
                              } //equipos torneo
                              $partidos[$key][$kp]['jornada']=$jornada;
                              $partidos[$key][$kp]['fecha']=$fecha;
                              $partidos[$key][$kp]['local']=$eLocal;
                              $partidos[$key][$kp]['visitante']=$eVisitante;
                              $partidos[$key][$kp]['local_id']=$local_id;
                              $partidos[$key][$kp]['visitante_id']=$visitante_id;
                              $jornadas[$key]['id']=$jornada;
                              $jornadas[$key]['fecha']=$fecha; 
                            }   //partidos                                  
                          }   //datos 

                                

                        $file2 = '../../federacion/'.$territorial.'/calendarios/'.$kg.'-parCalendario.json';
                        guardarJSON($datos, $file2);  

                        guardarJSON($partidos, $fp);
                        echo 'Guardado '.$fp.'<br />';
                        unset($datos);unset($partidos);
                        } else { 
                          echo 'La carga de partidos ha fallado. Vuelvelo a intentar pasados unos minutos';
                          $sql='DELETE FROM '.$bd.' WHERE id='.$id_proxi;
                          mysqli_query($mysqliBase, $sql);
                          unset($proxi); unset($id_proxi);
                        } //hay datos

                        $html->clear();
                        unset($html);  
                    } // si fallo=0                    
                    echo '<hr />';
                } // si existe el calendario 
            } // si existen equipos
        }// desarrollo grupos
    } //si hay grupos
} // los campeonatos
ob_flush();
flush();
$time = time();
echo '<br />La hora actual en el servidor es: '.date('H:i:s', $time);

if ($contador>0){ 
 echo 'Actualizando en 20 segundos....'; ?>

<script type="text/javascript">
  function actualizar(){location.reload(true);}
//Función para actualizar cada x segundos(x-000 milisegundos)
  setInterval("actualizar()",20000);
</script>

<?php }

