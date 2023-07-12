<html>
<body>
<?php 
set_time_limit(0);

define('_FUTBOLME_', 1);

require_once '../src/consultas.php';
require_once '../src/funciones.php';
require_once('funcionesCargador.php');

$mysqli = conectar();

$torneosFallados=array();
$fechaSis = date('Y-m-d H:i:s');
$fechaSis = date_create($fechaSis); //hora actual

$diaN = date('N');
echo 'Número de día es '.$diaN.'<br />';
$nuevoDia = new \DateTime();
$hoy = $nuevoDia->format('Y-m-d'); 

$dia7 = new \DateTime();
$dia7 = $dia7->modify('+7 day')->format('Y-m-d');
echo 'Siete días: '.$dia7.'<br />';

$modo=$_GET['modo']??0;
$horaSis=idate('h', strtotime("now"));

/*if (isset($_GET['id_proxi'])){
    require_once('actualizadorConex.php');
    $mysqli = conectarFB();
    $consulta = 'DELETE FROM '.$_GET['bd'].' WHERE id='.$_GET['id_proxi'];
    mysqli_query($mysqli, $consulta);
    die('id proxi eliminado');
}*/


/*$consulta='DELETE FROM movimiento';
mysqli_query($mysqli, $consulta);*/
if (isset($_GET['torneo_id'])){
    $consulta = 'SELECT p.temporada_id, p.jornada, t.torneo_id, tor.tipo_torneo, tor.comunidad_id, tor.nombre, tor.apifutbol, tor.apiRFEFcompeticion, tor.apiRFEFgrupo, tor.estado, tor.categoria_torneo_id
FROM partido p 
INNER JOIN temporada t ON t.id=p.temporada_id
INNER JOIN torneo tor ON tor.id=t.torneo_id
WHERE tor.id='.$_GET['torneo_id'].' AND p.jornada='.$_GET['jornada'].'  GROUP BY p.temporada_id, p.jornada'; 

} else {
    $consulta = 'SELECT p.temporada_id, p.jornada, t.torneo_id, tor.tipo_torneo, tor.comunidad_id, tor.nombre, tor.apifutbol, tor.apiRFEFcompeticion, tor.apiRFEFgrupo, tor.estado, tor.categoria_torneo_id
FROM partido p 
INNER JOIN temporada t ON t.id=p.temporada_id
INNER JOIN torneo tor ON tor.id=t.torneo_id
INNER JOIN liga l ON tor.id=l.id
WHERE p.fecha<"'.$dia7.'" AND p.fecha>NOW() AND tor.tipo_torneo=1 AND tor.comunidad_id='.$_GET['comunidad_id'].' AND tor.estado<>100 AND p.equipoVisitante_id>0 AND p.equipoLocal_id>0 GROUP BY p.temporada_id'; 
}



   
$resultadoSQL = mysqli_query($mysqli, $consulta);
echo $consulta.'<br />';
$torneos = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);


echo 'Torneos a actualizar: '.count($torneos).'<br />';

if ($modo==0){ ?>
<table><tr><td valign="top" width="85%"> 

    <?php
    foreach ($torneos as $kt => $torneo) {
        $temporada_id=$torneo['temporada_id'];
        $categoria_torneo_id=$torneo['categoria_torneo_id'];
        $torneo_id=$torneo['torneo_id'];
        $jornadaActiva=$torneo['jornada'];$jornadaActiva=abs($jornadaActiva);

        $nombreTorneo=$torneo['nombre'];
        $fase=$torneo['apifutbol'];
        $competicion_id=$torneo['apiRFEFcompeticion'];
        $grupo_id=$torneo['apiRFEFgrupo'];
        $comunidad_id=($torneo['comunidad_id']-1); 
        $textoP='';$textoC='';
        echo $nombreTorneo.' Temporada id:'.$temporada_id.' - Torneo_id: '.$torneo_id.' - Grupo id:'.$grupo_id; 
        include ('../panelBack/federacion/funciones/urlFederaciones.php');

        echo ' - Base de datos: <b>'.$bd.'</b> - Comunidad_id: '.$comunidad_id.'<br />';


        if ($carpeta=='00pnfg'){
        $url.='CodCompeticion='.$competicion_id.'&CodGrupo='.$grupo_id.'&CodJornada='.$jornadaActiva;
        }

        if ($carpeta=='00isquad'){
        $url.='id_competicion='.$competicion_id.'&id_fase='.$fase.'&id_grupo='.$grupo_id.'&jornada='.$jornadaActiva;
        }
        echo $url.'<hr />';
    } ?>

</td>
<td valign="top" width="15%">
    <?php echo '<a href="asaltoComunidad.php?modo=1&comunidad_id='.$_GET['comunidad_id'].'">Asalto</a>'; ?>
</td></tr></table>
<?php 
die;
}

$torneosActualizados=0;

$contator=0;
foreach ($torneos as $kt => $torneo) { 

//if ($torneo['temporada_id']!=15){ continue; }



$contator++;   
$temporada_id=$torneo['temporada_id'];
$torneo_id=$torneo['torneo_id'];
$jornadaActiva=$torneo['jornada'];$jornadaActiva=abs($jornadaActiva);
$categoria_torneo_id=$torneo['categoria_torneo_id'];

$nombreTorneo=$torneo['nombre'];
$fase=$torneo['apifutbol'];
$competicion_id=$torneo['apiRFEFcompeticion'];
$grupo_id=$torneo['apiRFEFgrupo'];
$textoP='';$textoC='';
echo $nombreTorneo.' Temporada id:'.$temporada_id.' - Torneo_id: '.$torneo_id.' - Grupo id:'.$grupo_id.'<br />'; 

    $partidosJornada = Xpartidos($temporada_id, $jornadaActiva);     
    
    $porJugar=0;   
    foreach ($partidosJornada as $kDat => $vDat) {
        $fechasDat[$kDat]['estado_partido']=$vDat['estado_partido'];
        $fechasDat[$kDat]['jornada']=$vDat['jornada'];
        $fechasDat[$kDat]['fecha']=$vDat['fecha'];
        $fechasDat[$kDat]['hora_prevista']=$vDat['hora_prevista'];
        $fechasDat[$kDat]['fed_l']=$vDat['federacion_id_l']??0;
        $fechasDat[$kDat]['fed_v']=$vDat['federacion_id_v']??0;
        $fechasDat[$kDat]['partido_id']=$vDat['id'];
        $fechasDat[$kDat]['codigo_acta']=$vDat['codigo_acta']??0;
        //if ($hoy==$vDat['fecha'] && $vDat['estado_partido']==0){ $porJugar++;}  
        $fechasDat[$kDat]['local']=$vDat['local'];
        $fechasDat[$kDat]['visitante']=$vDat['visitante'];
        $fechasDat[$kDat]['goles_local']=$vDat['goles_local'];
        $fechasDat[$kDat]['goles_visitante']=$vDat['goles_visitante'];
        $fechasDat[$kDat]['equipoLocal_id']=$vDat['equipoLocal_id'];
        $fechasDat[$kDat]['equipoVisitante_id']=$vDat['equipoVisitante_id']; 
        $fechasDat[$kDat]['estado']=0; 
        if ($vDat['estado_partido']==0){ $porJugar++;}      
    }
    
    echo 'Por jugar: '.$porJugar.'<br />';
    //imp($partidosJornada);
    //imp($fechasDat);
    
        $comunidad_id=($torneo['comunidad_id']-1);                
        
        
        $texto=$nombreTorneo.' - Jornada '.$jornadaActiva.' '.date('d-m-Y H:i:s').' -- <a href="/temporada.php?id='.$temporada_id.'" target="_blank">ver en FM</a>';

        $partidosJson=array();
        $tipo_torneo=1;

        $pag="asalto";



        include('actualizador.php');


    
   
unset($texto);unset($textoP);unset($textoC);
unset($proxis);
unset($partidos);
unset($fechasDat);
unset($partidosJson);
unset($partidosJornada);


}

$message='<h2>Torneos actualizados '.$torneosActualizados.' de '.count($torneos).'</h2><br />';

echo '<h2>Torneos actualizados '.$torneosActualizados.' de '.count($torneos).'</h2><br />';

    $from = "futbolme@futbolme.com";
    $to = "futbolme@gmail.com";
    $subject = "Asalto realizado ";
    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);

ob_flush();
flush();



if ($modo==1 && ((count($torneos)-$torneosActualizados)>0)) {

    echo 'Actualizando en 4 segundos....'; ?>

    <script type="text/javascript">
      function actualizar(){location.reload(true);}
    //Función para actualizar cada 4 segundos(4000 milisegundos)
      setInterval("actualizar()",5000);
    </script>
<?php } 

die('fin de la primera ronda');
?>
</body>
</html>