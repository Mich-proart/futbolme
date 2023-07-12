<?php
        //buscamos el texto en el contenido.
$string = str_get_html($content);
$html->load($string);

$clasificacion=array();
$partido=array();
$idsEquipo=array();

foreach($html->find('h3.panel-title') as $e)

$titulo=explode(' ', $e->plaintext);
$jornada=$titulo[1];

//echo 'Jornada extraida: '.$jornada.'<br />';


foreach($html->find('table.table-hover') as $kt =>  $e)
    if ($kt==0){
        
        foreach($e->find('tr') as $k2 =>  $i){ 
            //echo $i->outertext . '<br>';
            $informacion = trim($i->find('a.font-blue',0)->onmouseover); 
            $acta = trim($i->find('a.font-blue',1)->href);  

            //imp($informacion);
            $info=explode('<br>', $informacion);
            //imp($info);
            $fecha=$info[0];
            $fecha=str_replace('showhint(\'<b>Fecha:</b> ', '', $fecha);
            $hora=$info[1];
            $hora=str_replace('<b>Hora:</b> ', '', $hora);$hora=str_replace(' h.', '', $hora);
            $lugar=$info[2];
            $lugar=str_replace('<b>Lugar:</b> ', '', $lugar);
            $arbitro=$info[3];
            $arbitro=str_replace('<b>Árbitro:</b>  ', '', $arbitro);$arbitro=str_replace(' \',this,300)', '', $arbitro);

            $codigo_acta=0;
            $codigo_acta=preg_replace('/pnfg\\/NPcd\\/NFG_CmpPartido\\?cod_primaria=(.*)&CodActa=(.*)/', '$2', $acta);
            $codigo_acta=str_replace('/', '', $codigo_acta);

            $partido[$k2]['jornada'] = $jornada;
            $partido[$k2]['fecha'] = $fecha;
            $partido[$k2]['hora'] = $hora; 
            $partido[$k2]['lugar'] = $lugar;
            $partido[$k2]['arbitro'] = $arbitro; 
            $partido[$k2]['acta'] = $codigo_acta;           
            ?> 
            
            <table style="display:none">
            <?php foreach($i->find('h4') as $k3 =>  $u){
                //echo $u->plaintext . '<br>';
                if ($k3==0){ 
                    $valor=$u->plaintext;
                    $enlace = trim($u->find('a',0)->href);
                    $fedLocal_id=preg_replace('/NFG_VisEquipos\\?cod_primaria=(.*)&Codigo_Equipo=(.*)/', '$2', $enlace);
                    $partido[$k2]['fedLocal_id'] = $fedLocal_id; 
                    $idsEquipo[$fedLocal_id]['nombreFed']=$valor;                   
                    echo  '<tr><td width="150">'.$valor.'<br />'.$fedLocal_id.'</td>';
                    foreach ($equipos as $key => $value) {
                        if ($value['federacion_id']==$fedLocal_id){ 
                            $partido[$k2]['equipoLocal_id'] = $value['equipo_id'];
                            $partido[$k2]['local'] = $value['nombreCorto']; 
                            $idsEquipo[$fedLocal_id]['id']=$value['equipo_id'];
                            $idsEquipo[$fedLocal_id]['nombre']=$value['nombreCorto'];
                            $idsEquipo[$fedLocal_id]['club_id']=$value['club_id'];
                            ?>
                        <td width="150"><?php echo $value['nombreCorto']?><br /><?php echo $value['equipo_id']?></td>
                        <?php break;
                        }
                    }
                }
                if ($k3==1){ 
                    //$partido[$k2]['partido']['resultado']=$u->plaintext;
                    
                    $goles=explode(' - ', $u->innertext);
                    $gl=$goles[0];  
                    $gv=$goles[1];
                    $glx1=quitarFuncionEspecial($gl);
                    $gvx1=quitarFuncionEspecial($gv);
                    $glx2=explode(',',$glx1);
                    $gvx2=explode(',',$gvx1);

                    $glx=$glx2[0];
                    $gvx=$gvx2[0];
                    
                    if (count($glx2)>2 && $glx2[1]!=''){ $glx=$glx2[1]; }
                    if (count($gvx2)>2 && $gvx2[1]!=''){ $gvx=$gvx2[1]; }

                    $glx=strip_tags($glx);
                    $gvx=strip_tags($gvx);

                    $partido[$k2]['goles_casa'] = $glx;
                    $partido[$k2]['goles_fuera'] = $gvx;
                    $partido[$k2]['estado_partido'] = 1;

                    echo  '<td width="50">'.$u->plaintext.'</td>
                    <td width="50" bgcolor="orange">'.quitarFuncionEspecial($gl).' - '.quitarFuncionEspecial($gv).'</td>
                    <td width="50" bgcolor="yellow">'.$glx.' - '.$gvx.'</td>
                    <td width="50">'.$u->outertext.'</td>';  ?> 
                    <td><textarea cols="50" rows="4"><?php echo $gl?></textarea></td>
                    <td><textarea cols="50" rows="4"><?php echo $gv?></textarea></td>
                <?php }
                if ($k3==2){ 
                    $valor=$u->plaintext; 
                    $enlace = trim($u->find('a',0)->href);
                    $fedVisitante_id=preg_replace('/NFG_VisEquipos\\?cod_primaria=(.*)&Codigo_Equipo=(.*)/', '$2', $enlace);
                    $partido[$k2]['fedVisitante_id'] = $fedVisitante_id;
                    $idsEquipo[$fedVisitante_id]['nombreFed']=$valor;
                    foreach ($equipos as $key => $value) {
                        if ($value['federacion_id']==$fedVisitante_id){ 
                            $partido[$k2]['equipoVisitante_id'] = $value['equipo_id'];
                            $partido[$k2]['visitante'] = $value['nombreCorto'];
                            $idsEquipo[$fedVisitante_id]['id']=$value['equipo_id'];
                            $idsEquipo[$fedVisitante_id]['nombre']=$value['nombreCorto'];
                            $idsEquipo[$fedVisitante_id]['club_id']=$value['club_id'];
                            ?>
                        <td width="150"><?php echo $value['nombreCorto']?><br /><?php echo $value['equipo_id']?></td>
                        <?php break; }
                    }
                    echo  '<td width="150">'.$valor.'<br />'.$fedVisitante_id.'</td></tr>';                    
                }
            } ?>
        </table>
        <?php }
    break;
    }

/*foreach ($equipos as $key => $value) {
    foreach ($idsEquipo as $k => $v) {
        if ($value['federacion_id']==$k){       
            $idsEquipo[$k]['nombre']=$value['nombreCorto'];
            $idsEquipo[$k]['club_id']=$value['club_id'];
            break;
        }
    }    
}*/

//imp($partido);
//die;

foreach($html->find('table.table-bordered') as $kt =>  $e)
    if ($kt==0){
        //echo $e->outertext . '<br>';
        foreach($e->find('tr') as $k1 =>  $i){
            if ($k1<2){ continue; }
            //echo $i->outertext . '<br>';
            foreach($i->find('td') as $k2 =>  $u){
                //echo $u->plaintext . '<br>';
                if ($k2==0){ $clasificacion[$k1]['ascenso']=$u->plaintext; }
                if ($k2==1){ $clasificacion[$k1]['posicion']=$u->plaintext; }
                if ($k2==2){ 
                    $clasificacion[$k1]['equipo']=$u->plaintext; 
                    $enlace = trim($u->find('a',0)->href);
                    $fed_id=preg_replace('/NFG_VisCompeticiones_Grupo\\?cod_primaria=(.*)&codequipo=(.*)&codgrupo=(.*)/', '$2', $enlace);
                    $clasificacion[$k1]['fed_id'] = $fed_id; 
                    $clasificacion[$k1]['nombreFM'] = $idsEquipo[$fed_id]['nombre'];
                    $clasificacion[$k1]['equipo_id'] = $idsEquipo[$fed_id]['id'];
                    $clasificacion[$k1]['club_id'] = $idsEquipo[$fed_id]['club_id'];
                }
                if ($k2==3){ $clasificacion[$k1]['puntos']=$u->plaintext; }
                if ($k2==4){ $clasificacion[$k1]['jc']=$u->plaintext; }
                if ($k2==5){ $clasificacion[$k1]['gc']=$u->plaintext; }
                if ($k2==6){ $clasificacion[$k1]['ec']=$u->plaintext; }
                if ($k2==7){ $clasificacion[$k1]['pc']=$u->plaintext; }
                if ($k2==8){ $clasificacion[$k1]['jf']=$u->plaintext; }
                if ($k2==9){ $clasificacion[$k1]['gf']=$u->plaintext; }
                if ($k2==10){ $clasificacion[$k1]['ef']=$u->plaintext; }
                if ($k2==11){ $clasificacion[$k1]['pf']=$u->plaintext; }
                if ($k2==12){ $clasificacion[$k1]['gfavor']=$u->plaintext; }
                if ($k2==13){ $clasificacion[$k1]['gcontra']=$u->plaintext; }
                if ($k2==14){ $clasificacion[$k1]['racha']=$u->plaintext; }
                if ($k2==15){ $clasificacion[$k1]['sancion']=$u->plaintext; }

            }
        }
        //imp($clasificacion);
    }
    
