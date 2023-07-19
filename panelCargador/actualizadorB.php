<?php

define('_FUTBOLME_', 1);

require_once '../src/config.php';

$fechaSis = date('Y-m-d H:i:s');
$fechaSis = date_create($fechaSis); //hora actual

$ruta='../json/actualizarFed/';
 
$directorio = opendir($ruta); //ruta actual
while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
{
    if (is_dir($archivo))//verificamos si es o no un directorio
    {
        echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
    }
    else
    {
        echo $archivo . "<br />";
        $json = file_get_contents($ruta.$archivo);
        $partidosJson = json_decode($json, true);

        $valor=explode('_', $archivo);

        $temporada_id=$valor[0];
        $jornadaActiva=$valor[1];

        


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

                if (count($partidosJson)>0){
                    //echo 'partidosJson: '; imp($partidosJson);
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
                                            if ($value['goles_local']<10 && $value['goles_visitante']<10){
                                                insertarMovimiento($modificacion);
                                                unset($modificacion);
                                            } else {

                                                $subject = "Resultado para revisar. ";
                                        
                                                $message1.="\n".$value['local'].' '.$value['visitante'].' ('.$value['goles_local'].'-'.$value['goles_visitante'].') Fed: '.$value['datos']['goles_local'].'-'.$value['datos']['goles_visitante']."\n";
                                                $from = "futbolme@futbolme.com";
                                                $to = "futbolme@gmail.com";
                                                $headers = "From:" . $from;
                                                mail($to,$subject,$message1, $headers);
                                       

                                            }
                                            
                                            //$subject = "Resultado modificado. ";
                                            //$enviarEmail=0;
                                        
                                        

                                        
                                        /*$message1.="\n".$value['local'].' '.$value['visitante'].' ('.$value['goles_local'].'-'.$value['goles_visitante'].') Fed: '.$value['datos']['goles_local'].'-'.$value['datos']['goles_visitante']."\n";

                                        if ($enviarEmail==1){
                                            $from = "futbolme@futbolme.com";
                                            $to = "futbolme@gmail.com";
                                            $headers = "From:" . $from;
                                            mail($to,$subject,$message1, $headers);
                                        }*/
                                        

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
                                if ($value['hora_prevista']!=$value['datos']['hora_prevista']) { echo 'Hora '.$value['hora_prevista'].' por '.$value['datos']['hora_prevista'].'<br />'; }
                                



                                ?>                        
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

                                /*$message=' - <a href="'.$url.'" target="_blank">Fed</a> - <a href="https://futbolme.com/panelBack/crearCalendario.php?temporada_id='.$temporada_id.'&categoria_torneo='.$categoria_torneo_id.'&tipo_torneo=1" target="_blank">Edit FM</a> ('.$value['local'].' - '.$value['visitante'].')';
                                $from = "futbolme@futbolme.com";
                                $to = "futbolme@gmail.com";
                                $subject = "Error en partido. Temporada: $temporada_id";
                                $headers = "From:" . $from;
                                mail($to,$subject,$message, $headers);*/

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


                    } ?>
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

                        //
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
                                //$texto.=$textoP.$textoC;
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

                    
                }// si hay partidosJson 

                unset($partidosJson);
                unlink($ruta.$archivo);

    }
}



die();


?>

