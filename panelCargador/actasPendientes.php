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

$modo=$_GET['modo']??0;

if (isset($_GET['id_proxi'])){
    require_once('actualizadorConex.php');
    $mysqli = conectarFB();
    $consulta = 'DELETE FROM '.$_GET['bd'].' WHERE id='.$_GET['id_proxi'];
    mysqli_query($mysqli, $consulta);
    die('id proxi eliminado');
}

if (isset($_GET['torneo_id'])) {

    if (isset($_GET['jornada'])){ $condicion='p.jornada='.$_GET['jornada'].' '; } else { $condicion='p.fecha<="'.$hoy.'" '; }

    $consulta = 'SELECT p.temporada_id, p.jornada, t.torneo_id, tor.tipo_torneo, tor.comunidad_id, tor.nombre, tor.apifutbol, tor.apiRFEFcompeticion, tor.apiRFEFgrupo, tor.estado, tor.categoria_torneo_id
        FROM partido p 
        INNER JOIN temporada t ON t.id=p.temporada_id
        INNER JOIN temporada_equipo tel ON p.equipoLocal_id=tel.equipo_id
        INNER JOIN temporada_equipo tev ON p.equipoVisitante_id=tev.equipo_id
        INNER JOIN torneo tor ON tor.id=t.torneo_id
        WHERE '.$condicion.' AND p.estado_partido=1 AND tor.id='.$_GET['torneo_id'].' AND p.codigo_acta=0 AND p.equipoLocal_id>0 AND p.equipoVisitante_id>0 AND tel.grupo>-1 AND tev.grupo>-1 AND tel.temporada_id=p.temporada_id AND tev.temporada_id=p.temporada_id GROUP BY p.temporada_id, p.jornada'; 

} else {

    if ($_GET['comunidad_id']==1){

        $consulta = 'SELECT p.temporada_id, p.jornada, t.torneo_id, tor.tipo_torneo, tor.comunidad_id, tor.nombre, tor.apifutbol, tor.apiRFEFcompeticion, tor.apiRFEFgrupo, tor.estado, tor.categoria_torneo_id
        FROM partido p 
        INNER JOIN temporada t ON t.id=p.temporada_id
        INNER JOIN temporada_equipo tel ON p.equipoLocal_id=tel.equipo_id
        INNER JOIN temporada_equipo tev ON p.equipoVisitante_id=tev.equipo_id
        INNER JOIN torneo tor ON tor.id=t.torneo_id
        WHERE p.fecha<="'.$hoy.'" AND p.estado_partido=1 AND tor.tipo_torneo=1 AND tor.comunidad_id='.$_GET['comunidad_id'].' AND tor.pais_id=60 AND p.codigo_acta=0 AND p.equipoLocal_id>0 AND p.equipoVisitante_id>0 AND tel.grupo>-1 AND tev.grupo>-1 AND tel.temporada_id=p.temporada_id AND tev.temporada_id=p.temporada_id  AND (tor.id<8) GROUP BY p.temporada_id, p.jornada'; 


    } else {

    $consulta = 'SELECT p.temporada_id, p.jornada, t.torneo_id, tor.tipo_torneo, tor.comunidad_id, tor.nombre, tor.apifutbol, tor.apiRFEFcompeticion, tor.apiRFEFgrupo, tor.estado, tor.categoria_torneo_id
    FROM partido p 
    INNER JOIN temporada t ON t.id=p.temporada_id
    INNER JOIN temporada_equipo tel ON p.equipoLocal_id=tel.equipo_id
    INNER JOIN temporada_equipo tev ON p.equipoVisitante_id=tev.equipo_id
    INNER JOIN torneo tor ON tor.id=t.torneo_id
    WHERE p.fecha<="'.$hoy.'" AND p.estado_partido=1 AND tor.tipo_torneo=1 AND tor.comunidad_id='.$_GET['comunidad_id'].' AND tor.pais_id=60 AND p.codigo_acta=0 AND p.equipoLocal_id>0 AND p.equipoVisitante_id>0 AND tel.grupo>-1 AND tev.grupo>-1 AND tel.temporada_id=p.temporada_id AND tev.temporada_id=p.temporada_id  AND (tor.orden<15310 OR tor.orden>15702) GROUP BY p.temporada_id, p.jornada'; 

    }





}

    
   
$resultadoSQL = mysqli_query($mysqli, $consulta);
echo $consulta.'<br />';

$torneos = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);



echo 'Torneos a actualizar: '.count($torneos).'<br />';

if ($modo==0){ ?>
<table><tr><td valign="top" width="60%"> 

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
        echo $nombreTorneo.' <a href="/temporada.php?id='.$temporada_id.'&jornada='.$jornadaActiva.'" target="_blank">Temporada id:'.$temporada_id.'</a> Jornada '.$jornadaActiva.' - Torneo_id: '.$torneo_id.' - Grupo id:'.$grupo_id; 
        include ('../panelBack/federacion/funciones/urlFederaciones.php');

        echo ' - Base de datos: <b>'.$bd.'</b> - Comunidad_id: '.$comunidad_id.'<br />';

        if ($carpeta=='00nacional'){ 
            $j=$jornadaActiva+$base2;
            $url=str_replace('xxx', $j, $url);
            echo '<a href="'.$url.'" target="_blank">fed</a> --- ';
        }
        
        if ($carpeta=='00pnfg'){
        $url.='CodCompeticion='.$competicion_id.'&CodGrupo='.$grupo_id.'&CodJornada='.$jornadaActiva;
        }

        if ($carpeta=='00isquad'){
        $url.='id_competicion='.$competicion_id.'&id_fase='.$fase.'&id_grupo='.$grupo_id.'&jornada='.$jornadaActiva;
        }
        echo $url.'<hr />';
  } ?>

</td>
<td valign="top" width="40%">
    <?php 
    if (isset($_GET['torneo_id'])){
    echo '<a href="actasPendientes.php?modo=1&comunidad_id='.$_GET['comunidad_id'].'&torneo_id='.$_GET['torneo_id'].'&temporada_id='.$_GET['temporada_id'].'">Buscar números de actas</a> ----------------- <a href="actasPendientes.php?modo=1&comunidad_id='.$_GET['comunidad_id'].'&torneo_id='.$_GET['torneo_id'].'&temporada_id='.$_GET['temporada_id'].'&modo=descargarActas">Descargar actas</a> --------------- <a href="?comunidad_id='.$_GET['comunidad_id'].'&torneo_id='.$_GET['torneo_id'].'&temporada_id='.$_GET['temporada_id'].'">Refrescar</a>';

        $sq='SELECT p.id,p.jornada,p.fecha, p.codigo_acta, p.estado_partido, ec.nombreCorto local, ef.nombreCorto visitante, p.equipoLocal_id, p.equipoVisitante_id, p.goles_local, p.goles_visitante
        FROM partido p 
        INNER JOIN equipo ec ON p.equipoLocal_id=ec.id
        INNER JOIN equipo ef ON p.equipoVisitante_id=ef.id    
        WHERE p.temporada_id='.$_GET['temporada_id'].' AND p.fecha<="'.$hoy.'" ORDER BY p.jornada DESC, p.fecha DESC, p.codigo_acta DESC';
        $resultadoSQL = mysqli_query($mysqli, $sq);
        $p = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);?>
        <table bgcolor="black" cellpadding="3" cellspacing="1"><tr bgcolor="gainsboro">
            <td>JDA</td>
            <td>FECHA</td>
            <td>PARTIDO</td>
            <td>ACTA</td>
            <td>JU</td>
            <td>-</td>
           </tr>

        <?php 

        $comunidad_id=($_GET['comunidad_id']-1);
        $temporada_id=$_GET['temporada_id'];
        require_once('actualizadorConex.php');
        $mysqliFB = conectarFB(); 
                
        include ('../panelBack/federacion/funciones/urlFederaciones.php'); 
        require_once ('../panelBack/simple/simple_html_dom.php');




        foreach ($p as $k_p => $val_p) { 

            $jornada=$val_p['jornada'];
            $partido_id=$val_p['id'];
            $acta=$val_p['codigo_acta'];

            $file = '../json/temporada/'.$temporada_id.'/ac-'.$jornada.'-'.$acta.'-'.$partido_id.'.json';

            $modo=$_GET['modo']??'no';

            if (!@file_exists($file)) { 
                $txt="-"; 
                
                $equipoLocal_id=$val_p['equipoLocal_id'];
                $equipoVisitante_id=$val_p['equipoVisitante_id'];
                $equipoLocal=$val_p['local'];
                $equipoVisitante=$val_p['visitante'];
                $goles_local=$val_p['goles_local'];
                $goles_visitante=$val_p['goles_visitante'];
                
                if ($modo=='descargarActas' && $acta>0){ 

                    $url=str_replace('xxx', $acta, $urlActa);
                    echo $url.' BD: '.$bd.' - Carpeta: '.$carpeta.'<br />';
                    echo 'Partido: <a href="/partido.php?id='.$partido_id.'" target="_blank">'.$partido_id.'</a>
                    <b>'.$equipoLocal.' <span style="color:maroon">'.$goles_local.'-'.$goles_visitante.'</span> '.$equipoVisitante.'</b> - Temporada: <a href="/temporada.php?id='.$temporada_id.'" target="_blank"> '.$temporada_id.' - Jornada '.$jornada.'</a><br />';

                    $sql='DELETE FROM '.$bd.' WHERE fallo>1 AND uso=0 AND mantener=0';
                    $resultadoSQL = mysqli_query($mysqliFB, $sql);

                    $sql='SELECT id, ip, uso FROM '.$bd.' WHERE fallo<6 ORDER BY uso DESC, fallo LIMIT 8';
                    $resultadoSQL = mysqli_query($mysqliFB, $sql);
                    //echo $sql;
                    $proxis = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
                    $proxis = array_reverse($proxis); 
                    include ('actas/actas.php'); 
                }

            } else { 
                if (filesize($file)<1000){
                   unlink($file);
                   $txt='<span>-</span>';
                } else {
                  $txt='<span title="'.$file.'">OK ('.filesize($file).' bytes)</span>';  
                }
                 
            }

            ?>
           <tr bgcolor="white">
            <td><?php echo $val_p['jornada']?></td>
            <td><?php echo $val_p['fecha']?></td>
            <td><?php echo $val_p['local']?> - <?php echo $val_p['visitante']?></td>
            <td><a href="https://www.rfef.es/actas?pid=<?php echo $val_p['codigo_acta']?>" target="_blank"><?php echo $val_p['codigo_acta']?></a></td>
            <td><?php echo $val_p['estado_partido']?></td>
            <td><?php echo $txt?></td>
           </tr>
        <?php 
        } ?>
    </table>

    <?php } else {
    echo '<a href="actasPendientes.php?modo=1&comunidad_id='.$_GET['comunidad_id'].'">Buscar números de actas</a>';
    }


    
     ?>
</td></tr></table>
<?php 

    die;

}

$torneosActualizados=0;

$contator=0;
foreach ($torneos as $kt => $torneo) { 

//if ($torneo['temporada_id']!=15){ continue; }
//imp($torneo);

$contator++;   
$temporada_id=$torneo['temporada_id'];
$torneo_id=$torneo['torneo_id'];
$jornadaActiva=$torneo['jornada'];$jornadaActiva=abs($jornadaActiva);
$categoria_torneo_id=$torneo['categoria_torneo_id'];
$comu_id=$torneo['comunidad_id'];


$nombreTorneo=$torneo['nombre'];
$fase=$torneo['apifutbol'];
$competicion_id=$torneo['apiRFEFcompeticion'];
$grupo_id=$torneo['apiRFEFgrupo'];
$textoP='';$textoC='';
echo $nombreTorneo.' Temporada id:'.$temporada_id.' Jornada '.$jornadaActiva.' - Torneo_id: '.$torneo_id.' - Grupo id:'.$grupo_id.'<br />'; 

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
        if ($comu_id==1){
            $fechasDat[$kDat]['local']=$vDat['localCorto'];
            $fechasDat[$kDat]['visitante']=$vDat['visitanteCorto'];        
        } else {
            $fechasDat[$kDat]['local']=$vDat['local'];
            $fechasDat[$kDat]['visitante']=$vDat['visitante'];        
        }
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

        $pag="asaltoPendientes";

        include('actualizador.php');

        
        if ($jornadaActiva==2){
            echo 'Hay que comprobar que todos los equipos esten asociados.';
            //die;
        }


    
   
unset($texto);unset($textoP);unset($textoC);
unset($proxis);
unset($partidos);
unset($fechasDat);
unset($partidosJson);
unset($partidosJornada);


}

$message='<h2>Torneos actualizados '.$torneosActualizados.' de '.count($torneos).'</h2><br />';

    /*
    $from = "futbolme@futbolme.com";
    $to = "futbolme@gmail.com";
    $subject = "Asalto realizado ";
    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);
    */

ob_flush();
flush();

die('fin de la primera ronda');

?>

</body>
</html>