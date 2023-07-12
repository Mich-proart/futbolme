<?php
echo '1';
//require_once('actualizadorConex.php');
echo '2';
require_once ('../panelBack/simple/simple_html_dom.php');
echo '3';
$carpeta='';

include ('../panelBack/federacion/funciones/urlFederaciones.php');
echo '4';
if ($carpeta=='00pnfg'){
$url.='CodCompeticion='.$competicion_id.'&CodGrupo='.$grupo_id.'&CodJornada='.$jornadaActiva;
}

if ($carpeta=='00isquad'){
$url.='id_competicion='.$competicion_id.'&id_fase='.$fase.'&id_grupo='.$grupo_id.'&jornada='.$jornadaActiva;
}


if ($carpeta=='00nacional') { 
    $j=$jornadaActiva+$base2;
    $url=str_replace('xxx', $j, $url);    
}
$jda=$jornadaActiva;




echo $url.'<br />';

//if (strlen($url)<50){ echo 'No hay url'; continue; }


$mysqliFB = conectarFB(); 
$sql='DELETE FROM '.$bd.' WHERE fallo>1 AND uso=0 AND mantener=0';
$resultadoSQL = mysqli_query($mysqliFB, $sql);

$sql='SELECT id, ip, uso FROM '.$bd.' WHERE fallo<6 ORDER BY uso DESC, fallo LIMIT 8';
$resultadoSQL = mysqli_query($mysqliFB, $sql);
//echo $sql;
$proxis = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
$proxis = array_reverse($proxis); 

$fallo=0;
foreach ($proxis as $key => $value) {
    $proxi=$value['ip'];
    $id_proxi=$value['id']; 
    $uso_proxi=$value['uso'];
    $html = new simple_html_dom();

    
    
    
    
    
    if ($totalProxis==1){
        $content=getPageLibre($url,$proxi,$id_proxi);
    } else { 
        $content=getPage($url,$proxi,$id_proxi);
    }

    //$content = file_get_html($url);

    //imp($content);die('devolucion'); 

    if (strlen($content)>1000) { break; }
    $sql='UPDATE '.$bd.' SET fallo=fallo+1  WHERE id='.$id_proxi;
    mysqli_query($mysqliFB, $sql); 
    unset($proxis[$key]);unset($proxi);unset($id_proxi);unset($uso_proxi);
    $html->clear();
    unset($html);  
    echo ' ---- Quedan '.$totalProxis.' proxis por usar --> <b>'.$content.'</b><br />';
    $totalProxis=count($proxis);
    if ($totalProxis==0){ $fallo=1;break; }
}
echo '<br />fallo='.$fallo.' bd utilizada...'.$bd.' proxi: <b>'.$proxi.'</b> <a href="?bd='.$bd.'&id_proxi='.$id_proxi.'">Eliminar proxi</a>-- <br />';

    if ($fallo==0){
        $sql='UPDATE '.$bd.' SET uso=uso+1 WHERE id='.$id_proxi;
        mysqli_query($mysqliFB, $sql); 
        $texto.='<br />----proxi: '.$id_proxi.' uso: '.$uso_proxi; 
        switch ($comunidad_id) {
            case 2:
            case 6:
            case 8:
            case 15:
                include('../panelBack/simple/'.$carpeta.'/edpISQUAD.php');
                break;
            case 3:            
            case 13:
            case 14:
            case 16:
            case 17:
                  
                include('../panelBack/simple/'.$carpeta.'/extraerDatosPartidos.php');
                break;
            case 5:
                include('../panelBack/simple/'.$carpeta.'/edpCAT.php');
                break;
            case 1:
            case 7:
            case 9:
            case 10:
            case 11:
            case 18:  
                include('../panelBack/simple/'.$carpeta.'/extraerDatosPartidosM.php');
                break;
            case 0:
                include('../panelBack/simple/'.$carpeta.'/edpNac2.php');
                break;
        }

        $html->clear();
        unset($html); 
    	
    } // si fallo es cero
    
$message1='Partidos Json='.count($partidosJson).' - <a href="'.$url.'" target="_blank">Fed</a> - 
<a href="/panelBack/crearCalendario.php?temporada_id='.$temporada_id.'&categoria_torneo='.$categoria_torneo_id.'&tipo_torneo=1" target="_blank">Edit</a>
<a href="https://futbolme.eu/panelBack/crearCalendario.php?temporada_id='.$temporada_id.'&categoria_torneo='.$categoria_torneo_id.'&tipo_torneo=1" target="_blank">Edit FM</a>
<a href="https://futbolme.eu/panelCargador/actasPendientes.php?modo=1&comunidad_id='.($comunidad_id+1).'&torneo_id='.$torneo_id.'" target="_blank">Reintentar</a><br />';

echo $message1;
//imp($partidosJson);
//imp($fechasDat); 



if (count($partidosJson)>0){
    //echo 'partidosJson: '; imp($partidosJson);

    if ($_SERVER['HTTP_HOST']=='fm18.com'){      
        $file = '../json/actualizarFed/'.$temporada_id.'_'.$jornadaActiva.'_federacion.json';
        guardarJSON($partidosJson, $file);
    } else {
        foreach ($partidosJson as $key => $value) {
            //imp($value);
            foreach ($fechasDat as $kD => $vD) {
                $vD['estado']=$vD['estado']??0;
                //if ($vD['estado']>0) { continue; }
                if ($vD['fed_l']==0 || $vD['fed_v']==0) { 
                    $fechasDat[$kD]['estado']=5;
                    $fechasDat[$kD]['datos']=$vD;
                    continue; 
                }
                $partidosJson[$key]['estado']=20;
                if ($value['equipoLocal_id']==$vD['fed_l'] && $value['equipoVisitante_id']==$vD['fed_v']){
                    $fechasDat[$kD]['datos']=$value;
                    $fechasDat[$kD]['estado']=1;
                    $partidosJson[$key]['estado']=1;                
                } 
                if ($value['equipoLocal_id']==$vD['fed_v'] && $value['equipoVisitante_id']==$vD['fed_l']){
                $fechasDat[$kD]['datos']=$value;
                $fechasDat[$kD]['estado']=10;
                $partidosJson[$key]['estado']=10;break;
                } 
            }
        } 
        $finales=0; ?>

        <table border="1">
        <?php 
        $errorPartido=0;
        foreach ($fechasDat as $key => $value) { 
            $bgcolor='white';
            if ($value['estado_partido']!=1){ $bgcolor='orange';}
            if ($value['estado_partido']==0){ $bgcolor='#FC8D8D';}

            if (isset($value['datos'])){ ?>
            <tr bgcolor="<?php echo $bgcolor?>">
                <td><?php echo $value['partido_id']?></td>
                <td><b><?php echo $value['jornada']?></b><br />
                     <span style="color:dimgray"><?php echo $value['datos']['jornada']?></span></td>
                <td>
                    <b><?php echo $value['fecha']?></b><br />
                     <span style="color:dimgray"><?php echo $value['datos']['fecha']?></span>                        
                </td>
                <td>
                    <b><?php echo $value['hora_prevista']?></b><br />
                     <span style="color:dimgray"><?php echo $value['datos']['hora_prevista']?></span>
                </td>

                <td><b><?php echo $value['equipoLocal_id']?></b> - <?php echo $value['fed_l']?>=<?php echo $value['datos']['equipoLocal_id']?></td>
                <td>
                    <b><?php echo $value['local']?></b><br />
                     <span style="color:dimgray"><?php echo $value['datos']['local']?></span>
                </td>
                <td>
                    <b><?php echo $value['goles_local']?></b><br />
                     <span style="color:dimgray"><?php echo $value['datos']['goles_local']?></span>                        
                </td>
                <td>
                    <b><?php echo $value['goles_visitante']?></b><br />
                     <span style="color:dimgray"><?php echo $value['datos']['goles_visitante']?></span>                       
                </td>
                <td bgcolor="orange"><b><?php echo $value['datos']['goles_local1']?></b></td>
                <td bgcolor="orange"><b><?php echo $value['datos']['goles_visitante1']?></b></td>
                <td bgcolor="yellow"><?php echo $value['datos']['gl1']?></td>
                <td bgcolor="yellow"><?php echo $value['datos']['gv1']?></td>

                <td><textarea cols="50" rows="4"><?php echo $value['datos']['goles_local1']?></textarea></td>
                <td><textarea cols="50" rows="4"><?php echo $value['datos']['goles_visitante1']?></textarea></td>
                <td>
                    <b><?php echo $value['visitante']?></b><br />
                     <span style="color:dimgray"><?php echo $value['datos']['visitante']?></span>
                </td>
                <td><?php echo $value['fed_v']?>=<?php echo $value['datos']['equipoVisitante_id']?> - <b><?php echo $value['equipoVisitante_id']?></b></td>                    
                <td>
                    <b><?php echo $value['estado_partido']?></b><br />
                     <?php echo $value['datos']['estado_partido']?>                        
                </td>
                <td><?php if ($value['estado']!=5){ echo $value['datos']['observaciones']; }?></td>
                <td><?php echo $value['datos']['codigo_acta']?></td>
                <td><?php if ($value['estado']!=5){ echo $value['datos']['grupo_id']; }?></td>
                <td>
                    <?php 
                    if ($value['estado_partido']==1 
                        && $value['datos']['estado_partido']==1 
                        && ($value['goles_local']!=$value['datos']['goles_local'] || $value['goles_visitante']!=$value['datos']['goles_visitante'] )){
                            echo '<span style="color:red">No coincide el resultado</span><br />';
                            $enviarEmail=0;                        
                                $modificacion=array();
                                $codigoActa=$value['datos']['codigo_acta']??0;
                                $codigoActa=(int)$codigoActa;
                                $modificacion['evento']=0; 
                                $modificacion['goles_local']=$value['datos']['goles_local'];  
                                $modificacion['goles_visitante']=$value['datos']['goles_visitante'];  
                                $modificacion['fecha']=$value['datos']['fecha']; 
                                $modificacion['hora_prevista']=$value['datos']['hora_prevista']; 
                                $modificacion['estado_partido']=1;
                                $modificacion['comentario']='acta: '.$codigoActa;
                                $modificacion['codigo_acta']=$codigoActa;
                                $modificacion['partido_id']=$value['partido_id']; 
                                $modificacion['temporada_id']=$temporada_id; 
                                $modificacion['jornada']=$value['jornada'];  
                                $modificacion['equipoLocal_id']=$value['equipoLocal_id'];  
                                $modificacion['local']=$value['local'];  
                                $modificacion['equipoVisitante_id']=$value['equipoVisitante_id'];  
                                $modificacion['visitante']=$value['visitante'];                            
                                $modificacion['hora_real']='00:00:11'; 
                                //imp($partido); los datos que vamos a insertar
                                    insertarMovimiento($modificacion);
                                    unset($modificacion); 
                        }
                    if ($value['estado']==10){
                        $sq='SELECT id,jornada,fecha,hora_prevista FROM partido WHERE temporada_id='.$temporada_id.' AND equipoVisitante_id='.$value['equipoLocal_id'].' AND equipoLocal_id='.$value['equipoVisitante_id'];
                        $resultadoSQL = mysqli_query($mysqli, $sq);
                        $p = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
                        imp($p);
                        $sq='UPDATE partido SET jornada='.$p['jornada'].', fecha="'.$p['fecha'].'" WHERE id='.$value['partido_id'];
                        mysqli_query($mysqli, $sq);

                        $sq='UPDATE partido SET jornada='.$value['jornada'].' WHERE id='.$p['id'];
                        mysqli_query($mysqli, $sq);
                        $fechasDat[$key]['partido_id']=$p['id'];
                        $finales=1;
                    } 
                    if ($value['estado']==5){ echo '<b>Falta un indice</b>'; }

                    if ($value['fecha']!=$value['datos']['fecha']) { echo 'Fecha '.$value['fecha'].' por '.$value['datos']['fecha'].'<br />'; }
                    if ($value['hora_prevista']!=$value['datos']['hora_prevista']) { echo 'Hora '.$value['hora_prevista'].' por '.$value['datos']['hora_prevista'].'<br />'; } ?>                        
                </td>
            </tr>
            <?php } else { //si no existe value['datos']?>
            <tr bgcolor="tomato">
                <td><?php echo $value['partido_id']?></td>
                <td><b><?php echo $value['jornada']?></b></td>
                <td><b><?php echo $value['fecha']?></b></td>
                <td><b><?php echo $value['hora_prevista']?></b></td>
                <td><b><?php echo $value['equipoLocal_id']?></b> - <?php echo $value['fed_l']?></td>
                <td><b><?php echo $value['local']?></b></td>
                <td><b><?php echo $value['goles_local']?></b></td>
                <td><b><?php echo $value['goles_visitante']?></b></td>
                <td><b><?php echo $value['visitante']?></b></td>
                <td><?php echo $value['fed_v']?> - <b><?php echo $value['equipoVisitante_id']?></b></td>                    
                <td><b><?php echo $value['estado_partido']?></b></td>
                
                <td><?php if ($value['estado']!=5){ echo $value['estado']; }?></td>
                <td><?php echo $value['datos']['codigo_acta']?></td>
                <td><?php if ($value['estado']!=5){ echo $value['estado']; }?></td>
                <td><?php echo $value['estado'];
                    if ($value['estado']==10){
                        $sq='SELECT id,jornada,fecha,hora_prevista FROM partido WHERE temporada_id='.$temporada_id.' AND equipoVisitante_id='.$value['equipoLocal_id'].' AND equipoLocal_id='.$value['equipoVisitante_id'];
                        $resultadoSQL = mysqli_query($mysqli, $sq);
                        $p = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
                        imp($p);
                        $sq='UPDATE partido SET jornada='.$p['jornada'].', fecha="'.$p['fecha'].'" WHERE id='.$value['partido_id'];
                        mysqli_query($mysqli, $sq);

                        $sq='UPDATE partido SET jornada='.$value['jornada'].' WHERE id='.$p['id'];
                        mysqli_query($mysqli, $sq);
                        $fechasDat[$key]['partido_id']=$p['id'];
                        $finales=1;
                    } 
                    if ($value['estado']==5){ echo '<b>Falta un indice</b>'; }
                    echo ' - Error en partido ';
                    $errorPartido++;
                    ?>                        
                </td>
            </tr>
        <?php }
        unset($value['datos']['valorActa']);
        unset($value['datos']['valorMasdatos']);
        unset($value['datos']['goles_local1']);
        unset($value['datos']['goles_visitante1']);
        unset($value['datos']['gl1']);
        unset($value['datos']['gv1']);
        }?>
        </table>

        <?php
        foreach ($fechasDat as $key => $value) {
            $fechaX=$value['fecha'];
            $horaX=$value['hora_prevista'];
            $epX=$value['estado_partido'];
            $glX=$value['goles_local'];
            $gvX=$value['goles_visitante'];
            $codigoX=0;
            $cambios=0; 
            $textoP='<br />'.$value['partido_id'].': '.$value['local'].' - '.$value['visitante'];
            if (!isset($value['datos'])){ 
                echo $textoP.' --- No hay datos para este partido '; continue; 
            }
            $textoC=''; 
            //imp($value);
            //imp($value['datos']);
            //echo '<hr />';   
                if ($value['fecha']!=$value['datos']['fecha']){
                    if ($value['datos']['hora_prevista']!='00:00:00'){
                        $fechaX=$value['datos']['fecha'];$cambios++;
                        $textoC.='<br /> - cambiamos la fecha a '.$value['datos']['fecha'];
                    }
                }
                if ($value['hora_prevista']!=$value['datos']['hora_prevista']){
                    if ($value['datos']['hora_prevista']!='00:00:00'){
                        $horaX=$value['datos']['hora_prevista'];$cambios++;
                        $textoC.='<br /> - cambiamos la hora a '.$value['datos']['hora_prevista'];
                    }
                }
                if ($value['codigo_acta']!=$value['datos']['codigo_acta'] && $value['datos']['codigo_acta']>0){
                    $codigoX=$value['datos']['codigo_acta'];$cambios++;
                    $textoC.='<br /> - ponemos el id de acta '.$value['datos']['codigo_acta'];
                }

                $fechaP = date($value['fecha'].' '.$value['hora_prevista']);
                $fechaP = date_create($fechaP); 
                $dPartidoX = date_diff($fechaP, $fechaSis);
                $horasPx = $dPartidoX->h;
                $minutosPx = $dPartidoX->i;
                $invertidoPx = $dPartidoX->invert;
                $evento=0; 
                //imp($invertidoPx);
                //imp($horasPx);
                if ($invertidoPx==0 && $horasPx>=2){
                    if ($value['estado_partido']!=1 && $value['datos']['estado_partido']==1){
                        $evento=13;
                        $finales++;$cambios++;
                        $glX=$value['datos']['goles_local'];
                        $gvX=$value['datos']['goles_visitante'];
                        $epX=1;
                        $textoC.='<br /> - ponemos el el resultado '.$value['datos']['goles_local'].'-'.$value['datos']['goles_visitante'];
                    }
                    if ($value['estado_partido']==1 && $value['datos']['estado_partido']==1){
                        if ($glX!=$value['datos']['goles_local'] || $gvX!=$value['datos']['goles_visitante']){
                            $textoC.='<br /> - <font style="color:red"> ¡¡ OJO !! </font> Futbolme: <b>'.$glX.'-'.$gvX.'</b> - Federación: <b>'.$value['datos']['goles_local'].'-'.$value['datos']['goles_visitante'].'</b>';
                        }
                    }
                    if ($value['datos']['estado_partido']==4){
                        $finales++;$cambios++;
                        $glX=0;
                        $gvX=0;
                        $epX=4;
                        $textoC.='<br /> - marcamos el partido como aplazado';
                    }

                }
                if ($cambios>0){
                    $partido=array();
                    $partido['evento']=$evento; 
                    $partido['goles_local']=$glX;  
                    $partido['goles_visitante']=$gvX;  
                    $partido['fecha']=$fechaX; 
                    $partido['hora_prevista']=$horaX; 
                    $partido['estado_partido']=$epX;
                    $partido['comentario']='acta: '.$codigoX;
                    $partido['codigo_acta']=$codigoX;
                    $partido['partido_id']=$value['partido_id']; 
                    $partido['temporada_id']=$temporada_id; 
                    $partido['jornada']=$value['jornada'];  
                    $partido['equipoLocal_id']=$value['equipoLocal_id'];  
                    $partido['local']=$value['local'];  
                    $partido['equipoVisitante_id']=$value['equipoVisitante_id'];  
                    $partido['visitante']=$value['visitante'];                            
                    $partido['hora_real']='00:00:11'; 
                    //imp($partido); los datos que vamos a insertar
                    echo $textoP.'<br />'.$textoC;
                    insertarMovimiento($partido);
                    unset($partido);
                    $texto.=$textoP.$textoC;
                    $finales=1; 
                }             
        }  // fechasDat
        
        if ($finales>0){
            $partidosJornada = Xpartidos($temporada_id, $jornadaActiva);
            guardarJSON($partidosJornada, '../json/temporada/'.$temporada_id.'/partidosActiva.json');
            $f = '../json/temporada/'.$temporada_id.'/tipo.json';
            Xtipo($temporada_id);
            $json = file_get_contents($f);
            $datos = json_decode($json, true);
            $clasificacion=$datos['clasificacion'];
        }

        $texto.=' --- <a href="'.$url.'" target="_blank">Federacion</a><hr />';
        $file = '../json/actualizaciones/'.$temporada_id.'_federacion.txt';
        guardarFILE($texto, $file); 


        

        if ($pag=="asaltoPendientes" && $fallo==0){
            $sql='UPDATE torneo SET estado=200 WHERE id='.$torneo_id;
            mysqli_query($mysqli, $sql);  
        }

        if ($pag=="repasador" && $fallo==0){
            $sql='UPDATE torneo SET estado=estado+1 WHERE id='.$torneo_id;
            mysqli_query($mysqli, $sql);  
        }

        if ($pag=="comprobador" && $fallo==0){
            $sql='UPDATE partido SET tipo_partido=1 WHERE jornada='.$jornadaActiva.' AND estado_partido=1 AND temporada_id='.$temporada_id;
            mysqli_query($mysqli, $sql);  
        }

    } //si esta en el servidor se graban los resultado directamente

    if ($pag=="asalto" && $fallo==0){
        if ($errorPartido>=count($partidosJson)){
            echo '<br /><span style="color:maroon">fallo='.$fallo.' bd utilizada...'.$bd.' proxi: <b>'.$proxi.'</b> (<a href="?id_proxi='.$id_proxi.'&bd='.$bd.'">'.$id_proxi.'</a>)-- '.$url.'</span><br />';
        } else {
            $sql='UPDATE torneo SET estado=100 WHERE id='.$torneo_id;
            mysqli_query($mysqli, $sql);  
        }            
    }

    echo 'Pagina '.$pag.' - consulta: '.$sql.' bd utilizada...'.$bd.'<br />';    
    $torneosActualizados++;

} else {
    echo 'torneo fallado...';
    $torneosFallados[]=$torneo;
}// si hay partidosJson 
	
echo '<hr />';   


?>

