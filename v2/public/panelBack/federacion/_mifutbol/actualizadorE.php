<?php
define('_PANEL_', 1);
set_time_limit(0);
require_once '../../includes/config.php';

$compe=$_GET['compe']??0;



include('../../simple/simple_html_dom.php');
$tiempo_inicio = microtime_float(); 
$comunidad_id=$_GET['comunidad_id'];
$carpeta='';

require_once '../funciones/urlFederaciones.php';
$f = '../../federacion/'.$territorial.'/campeonatos.json';

$json = file_get_contents($f);
$campeonatos = json_decode($json, true);
$contador=0;
foreach ($campeonatos as $kC => $camp) { 
    $kC=str_replace("'", '', $kC); $kC=trim($kC);
    if ($kC!=$compe){ continue; }
    echo $camp['nombre'].'<br />';
    $f = '../../federacion/'.$territorial.'/'.$kC.'-grupos.json';    
    if (@file_exists($f)) { 
        $json = file_get_contents($f);
        $grupos = json_decode($json, true);
        $contador=0;
        imp($grupos);
        $kf=$grupos['fases'][0];
        $kf=str_replace("'", '', $kf);
        $kf=str_replace('selected', '', $kf); 
        $kf=trim($kf);
        foreach ($grupos as $kg => $v) {
            if ($kg=='fases'){ $contador++; continue; }
            $kg=str_replace("'", '', $kg);$kg=str_replace("selected", '', $kg); $kg=trim($kg);
            echo '<br />'.$v['nombre'].' - ';             
            $fe = '../../federacion/'.$territorial.'/equipos/'.$kg.'-equipos.json';
            if ($comunidad_id==2
              || $comunidad_id==6 
              || $comunidad_id==8 
              || $comunidad_id==15
            ){   
                $variables='&id_competicion='.$kC.'&id_fase='.$kf.'&id_grupo='.$kg;
            } else {
                $variables='&CodCompeticion='.$kC.'&CodGrupo='.$kg;
            }
            $url=str_replace('xxx', $variables, $urlj1);
            
            if (!@file_exists($fe)) {
                echo ' - <a href="'.$url.'" target="_blank">ver</a>';

                include '../funciones/getPage.php';
                if ($fallo==0){
                    include('../_mifutbol/jornada.php');
                    $html->clear();
                    unset($html); 
                     
                    $dd=array();
                    $k=0;
                    if (isset($datos)){
                        foreach ($datos['partidos'] as $value) {        
                            $dd[$k]['url']=$value['url_local'];

                            if($comunidad_id==2){
                                $i=explode('&', $dd[$k]['url']);
                                $id=str_replace('competiciones_publico_equipo.php?id_equipo=', '', $i[0]);
                            } else {
                                $id=str_replace('NFG_VisEquipos?cod_primaria=1000119&Codigo_Equipo=', '', $dd[$k]['url']);
                            }
                            


                            
                            $dd[$k]['id']=$id;
                            $dd[$k]['equipo']=$value['local'];
                            $dd[$k]['club']=$value['escudo_local'];
                            $k++;
                            $dd[$k]['url']=$value['url_visitante'];
                            if ($comunidad_id==2
                              || $comunidad_id==6 
                              || $comunidad_id==8 
                              || $comunidad_id==15
                            ){   
                                $i=explode('&', $dd[$k]['url']);
                                $id=str_replace('competiciones_publico_equipo.php?id_equipo=', '', $i[0]);
                            } else {
                                $id=str_replace('NFG_VisEquipos?cod_primaria=1000119&Codigo_Equipo=', '', $dd[$k]['url']);
                            }
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
            } // si no existe el fichero de equipos

            sleep (5);
         } // desarrollo grupos        
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

