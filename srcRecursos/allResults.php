<div class="col-xs-12 nopadding">
 
<?php
require_once './src/hconsultas/sqlliga.php';

$p=partidosHistoricoEquipo($equipo_id);
$nombreTemporada=0;
$totalPuntos=0;
$p=array_reverse($p);

?>
<div class="col-xs-12 text-center publi">
    <h4>Pulsa en los botones para ocultar/mostrar resultados</h4>
<a id="local" class="btn btn-success boldfont text-center">Local</a>
<a id="visitante" class="btn btn-success boldfont text-center">Visitante</a>
<a id="ganados" class="btn btn-success boldfont text-center">Ganados</a>
<a id="empatados" class="btn btn-success boldfont text-center">Empatados</a>
<a id="perdidos" class="btn btn-success boldfont text-center">Perdidos</a>

</div>

    <table class="table table-bordered table-condensed nomargin txt11 col-xs-12">
       <tbody class="whitebox"><tr>
        <?php 
        $fila=0;
        foreach ($p as $key => $v) { 

        if ($v['fm_local_id']==9974 || $v['fm_visitante_id']==9974) { continue; }

        if (isset($equipo_id2) && $v['fm_local_id']!=$equipo_id2 && $v['fm_visitante_id']!=$equipo_id2) { continue; }

        if ($v['idTemporada']<1) { continue; }

        $fila++;

            switch ($v['idDivision']) {
                case '1':$dd="1&ordf;"; $color_d="#FFD700";break;
                case '2':$dd="2&ordf;"; $color_d="#E6E6FA";break;
                case '3':$dd="2&ordf;B"; $color_d="#FFE4B5";break;
                case '4':$dd="3&ordf;"; $color_d="#D8BFD8"; break;
            }

            $nt=$v['nombreTemporada'];
            $nt2=$nt+1;
            $nt=$nt."-".substr($nt2, -2);

            if ($key==0) { 
                $pos='';
                foreach ($posiciones as $kp => $vp) {
                    if ($vp['temporada_id']==$v['idTemporada']) {$pos=' - <b>'.$vp['posicion'].'º</b>';break; }
                }

                ?>
            <tr><td style="font-size: 12px; width: 60px"><a href="/historico/liga/index.php?temporada_id=<?php echo $v['idTemporada']?>&equipo_id=<?php echo $equipo_id?>"><?php echo $nt?></a>
                <div style="background-color: <?php echo $color_d?>"><?php echo $dd?><?php echo $pos?></div></td>
            <?php } 

            if ($nombreTemporada!=$v['nombreTemporada'] && $key>0 && !isset($_GET['e2'])) { 
                $pos='';
                foreach ($posiciones as $kp => $vp) {
                    if ($vp['temporada_id']==$v['idTemporada']) {$pos=' - <b>'.$vp['posicion'].'º</b>';break; }
                }
                ?>
            </tr><tr style="padding-top: 3px;"><td style="font-size: 12px; width: 60px"><a href="/historico/liga/index.php?temporada_id=<?php echo $v['idTemporada']?>&equipo_id=<?php echo $equipo_id?>"><?php echo $nt?></a>
                <div style="background-color: <?php echo $color_d?>"><?php echo $dd?><?php echo $pos?></div></td>
            <?php $totalPuntos=0;
            } 

            if (isset($_GET['e2']) && $fila==9) { ?>
            </tr><tr style="padding-top: 3px;">
            <?php $fila=1;
            } 

            
            if (isset($_GET['e2']) && $fila%2!=0) { ?>
            <td style="font-size: 12px; width: 60px"><a href="/historico/liga/index.php?temporada_id=<?php echo $v['idTemporada']?>&equipo_id=<?php echo $equipo_id?>"><?php echo $nt?></a>
                <div style="background-color: <?php echo $color_d?>"><?php echo $dd?></div></td>
            <?php }

            

            if ($v['nombreTemporada']<1995) { $pts=2; } else { $pts=3; }
            $gL=$v['resulCasa'];$gV=$v['resulFuera'];$puntos=0;
            $resultado=$gL."-".$gV;
            $class="colores_fondo_resultados_perdido";
            $c2="perdidos";
            if($gL==$gV){
                $puntos=1; $class="colores_fondo_resultados_empatado";
                $c2="empatados";
            } elseif($equipo_id==$v['fm_local_id']){
                
                if($gL>$gV){
                    $puntos=$pts; $class="colores_fondo_resultados_ganado";
                    $c2="ganados";
                }   
            } else {
                
                if($gV>$gL){
                    $puntos=$pts;$class="colores_fondo_resultados_ganado";
                     $c2="ganados";
                }                           
            }

            if($equipo_id==$v['fm_local_id']){
                $colorJF="white";$colorJT="dimgray";$c1="local";
            } else {
                $colorJF="dimgray";$colorJT="white";$c1="visitante";
            }

            $ancho='30px';
            if ($v['nombreTemporada']==1995 || $v['nombreTemporada']==1996) { $ancho='29px';}
            if ($v['nombreTemporada']==1986) { $ancho='28px';}

            if (strlen($resultado)>3) { $fuente="11px"; } else { $fuente="13px"; }
            ?>
            
            <td class="<?php echo $class?> nopadding <?php echo $c1?> <?php echo $c2?>" title="Jornada <?php echo $v['jornada']?> <?php echo $v['nomCasa']?>-<?php echo $v['nomFuera']?>" style="width:<?php echo $ancho?>; font-size: <?php echo $fuente?>">
                <div style="font-size: 10px; background-color: <?php echo $colorJF?>; color:<?php echo $colorJT?>">J-<?php echo $v['jornada']?></div>
                <a href="/historico/liga/index.php?partido_id=<?php echo $v['idPartido']?>" style="color:black">
                <?php echo $resultado?></a>

            </td>
            
        <?php $nombreTemporada=$v['nombreTemporada'];
                $totalPuntos=$puntos+$totalPuntos;
        } ?>

       </tr></tbody>
    </table>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $("#local").on( "click", function() { $('.local').toggle();});        
        $("#visitante").on( "click", function() { $('.visitante').toggle();});
        $("#ganados").on( "click", function() { $('.ganados').toggle();});
        $("#empatados").on( "click", function() { $('.empatados').toggle();});
        $("#perdidos").on( "click", function() { $('.perdidos').toggle();});    
    });


</script> 
