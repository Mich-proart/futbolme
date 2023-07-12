<?php


         /*$fe = './json/gestores/6/37865501-equipos.json';
         $json = file_get_contents($fe);$eq = json_decode($json, true);
         $fp = './json/gestores/6/37865501-partidos.json';      
         $json = file_get_contents($fp);
         $dCal = json_decode($json, true);
         
         $equipos=array();
         $partidos=array();
         
         foreach ($dCal as $k => $v) {
            
            foreach ($v as $k1 => $v1) { 
            if ($k==1){ imp($v1); } 
               
                foreach ($eq as $k2 => $v2) { 
                    if(isset($v1['local_id']) && (int)$v1['local_id']==(int)$v2['id']){ 
                        $v1['localText']=$v2['equipo'];$p[$k][$k1]['localText']=$v2['equipo'];
                        $equipos[$v1['local_id']] = $v1['local_id'];
                    }
                    if(isset($v1['visitante_id']) && (int)$v1['visitante_id']==(int)$v2['id']){
                        $v1['visitanteText']=$v2['equipo'];$p[$k][$k1]['visitanteText']=$v2['equipo'];
                        $equipos[$v1['visitante_id']] = $v1['visitante_id'];
                    }            
                }
                $partidos[]=$v1;
            }
            echo 'Jornada '.($k+1).' <br />';
            imp($equipos);
            if ($k==1){die;}
        }

        
        imp($equipos);
        
        die;*/

?>
<table class="table">
<?php 
$pasos=0;$totalPasos=(count($datos)*2);

foreach ($datos as $key => $value) { 
$comunidad_id=$value['comunidad_id']; 

/*$origenCarpeta=getcwd();
imp($origenCarpeta);*/
include ('panelBack/federacion/funciones/urlFederaciones.php');
$f='panelBack/federacion/'.$territorial.'/calendarios/'.$value['grupo'].'-partidos.json';
//$fj='panelBack/federacion/'.$territorial.'/jornadas/'.$value['grupo'].'-jornadas.json';
$fq='panelBack/federacion/'.$territorial.'/equipos/'.$value['grupo'].'-equipos.json';


?>
<tr style="border-top:solid; background-color: gainsboro">
    <td title="<?php echo $value['grupo']?>"><?php echo nCTorneo($value['categoria_torneo_id'])?></td>
    <td><?php echo nCEquipo($value['categoria_id'])?></td>
    <td><?php echo $value['nombre']?></td>
    <td><a href="/mifutbol.php?g=<?php echo $_SESSION['gestor_id']?>&gr=<?php echo $value['grupo']?>" target="_blank"><?php echo $value['nombreGrupo']?></a>

        <?php 
        $m=$value['estado']??0;
        if ($m==1) { $txtM='ocultar'; $claseBoton='primary';} else { $txtM='mostrar';  $claseBoton='danger';}?>
        <button type="button" class="btn btn-<?php echo $claseBoton?>" style="cursor:pointer" onclick="verNover(<?php echo $value['id']?>,<?php echo $_SESSION['gestor_id']?>,<?php echo $m?>)">
            <span id="torneo<?php echo $value['id']?>"><?php echo $txtM?></span>
            </button>
    </td>    
    <td><form method="post" name="torneo<?php echo $value['id']?>">
        <input type="hidden" name="m" value="t-q">
        <input type="hidden" name="torneo_id" value="<?php echo $value['id']?>">
        <input type="hidden" name="gestor_id" value="<?php echo $_SESSION['gestor_id']?>">
        <input type="submit" name="quitar" value="quitar">
    </form></td>    
</tr>

<tr style="border-bottom: solid;">
<td colspan="5" id="ventana<?php echo $value['grupo']?>">


    <?php 
    if (@file_exists($f) && @file_exists($fq)) { 
        $json = file_get_contents($fq);  //saca los equipos con su id de club
        $eqC = json_decode($json, true); //saca los equipos con su id de club
        $valorGestor=$_SESSION['gestor_id'];
        $valorGrupo=$value['grupo'];
            $fp='json/gestores/'.$valorGestor.'/'.$valorGrupo.'-partidos.json';
            $fe='json/gestores/'.$valorGestor.'/'.$valorGrupo.'-equipos.json';
            if (@file_exists($fe)) {
            $txt='Editar equipos';$txt1='Edita';$txt2='Editar';$color='green';$colort='white'; $losEquipos=1;
            } else { 
            $txt='Cargar equipos - Paso obligado para continuar';$txt1='Carga';$txt2='Cargar - Máximo 40 caracteres';$color='yellow';$colort='black';$losEquipos=0;
            $fe='panelBack/federacion/'.$territorial.'/equipos/'.$valorGrupo.'-equipos.json';
            }  ?>
            <div class="pull-left" style="width:45%">
                <button type="button" class="btn btn-primary" style="background-color: <?php echo $color?>; color:<?php echo $colort?>; cursor:pointer" onclick="verFormEditEquip(<?php echo $valorGrupo?>)"><?php echo $txt?></button>
            <?php if ($losEquipos==0){?>
            Carga los equipos y editalos como creas conveniente. Puedes dejarlos tal y como los has importado.
            <?php }?>
            </div>

            <div  class="marco celestebox" id="formEditEquip<?php echo $valorGrupo?>" style="display: none; background-color: <?php echo $color?>;">
                <form method="post" name="eq<?php echo $valorGrupo?>" onsubmit="editEquipos(event, $(this).serialize(),<?php echo $valorGrupo?>)">
             <input type="hidden" name="gestor" value="<?php echo $valorGestor?>" >
             <input type="hidden" name="grupo" value="<?php echo $valorGrupo?>" >       
            <div class="clear"></div><span style="color:yellow"><?php echo $txt1?> los equipos de este torneo para la gestión.</span><br />
            <?php $json = file_get_contents($fe);
            $dEq = json_decode($json, true); 
            foreach ($dEq as $k => $v) {?>
            <input type="text" name="equipo[<?php echo $v['id']?>]" value="<?php echo htmlentities($v['equipo'])?>" size="40" maxlength="40"><br />
            <?php } ?>
            <button type="submit" name="<?php echo $txt2?>"><?php echo $txt2?></button>
            </form>
            </div>

        <?php
        $txtp2='---';
        if (@file_exists($fp)) {
        $txtp='Editar calendario';$txtp1='Edita';$txtp2='Editar'; $color2='green';$color2t='white'; $valor=1;$totalPasos=($totalPasos-3);
        } else { 
        $txtp='Cargar calendario';$txtp1='Carga';$txtp2='Cargar'; $color2='yellow'; $color2t='black'; $valor=0;
        $fp=$f;
        }  

        if ($losEquipos==0){ $disCal='none'; } else { $disCal='block';} ?>
        <div style="width: 45%; display:<?php echo $disCal?>" class="pull-right">
            <button type="button" class="btn btn-primary" style="background-color: <?php echo $color2?>; color:<?php echo $color2t?>; cursor: pointer"  onclick="verFormEditCalendario(<?php echo $valorGrupo?>)"><?php echo $txtp?></button>
            <?php if ($valor==0){?>
            Una vez cargados los equipos, y para finalizar, carga el calendario. ¡¡¡Ya estará todo listo para la gestión del torneo!!!
        <?php } ?>
        </div>

        <div  class="marco celestebox" id="formEditCalendario<?php echo $value['grupo']?>" style="display: none; background-color: <?php echo $color2?>">
         <div class="clear"></div>            
        <?php 
        $fac='json/gestores/'.$valorGestor.'/'.$valorGrupo.'-activa.json';
        if (@file_exists($fac)) {
            $json = file_get_contents($fac);
            $d = json_decode($json, true);
            $ja=$d['activa'];
        } else {
            $ja=1;
            $j['activa']=1;
            guardarJSON($j, $fac);
        }
        $json = file_get_contents($fp);
        $dCal = json_decode($json, true);
        //imp($dCal);
        include 'forms/formCalendario.php'; 
        if ($valor==1){
            $cl = 'json/gestores/'.$valorGestor.'/'.$valorGrupo.'-clasificacion.json';
            if (@file_exists($cl)) {
            $json = file_get_contents($cl);$clasificacion = json_decode($json, true);
            } else { $clasificacion=array();}
            include 'forms/formClasi.php'; 
        }?>
        </div>

        <?php } else { //hasta aqui si esta el calendario ?>
            <div style="background-color:orange; border-style: solid;">
                <h4>Generar calendario</h4>
                <div id="carga-<?php echo $value['grupo']?>-1">
                <?php /*if (!@file_exists($fj)) {?>
                <form method="post" onsubmit="pasoCarga(event, $(this).serialize(),<?php echo $value['grupo']?>,1)" name="p1<?php echo $value['grupo']?>">
                    <input type="hidden" name="p" value="1">
                    <input type="hidden" name="comunidad_id" value="<?php echo $comunidad_id?>">
                    <input type="hidden" name="competicion" value="<?php echo $value['competicion']?>">
                    <input type="hidden" name="grupo" value="<?php echo $value['grupo']?>">
                    <input type="submit" name="cargar" value="Paso 1: cargar jornadas">
                </form>
                <?php } else { echo 'Paso 1 completado.';$pasos++; } */?>
                </div>
                <div id="carga-<?php echo $value['grupo']?>-2"> 
                <?php if (!@file_exists($fq)) {?>           
                <form method="post" onsubmit="pasoCarga(event, $(this).serialize(),<?php echo $value['grupo']?>,2)" name="p2<?php echo $value['grupo']?>">
                    <input type="hidden" name="p" value="2">
                    <input type="hidden" name="comunidad_id" value="<?php echo $comunidad_id?>">
                    <input type="hidden" name="competicion" value="<?php echo $value['competicion']?>">
                    <input type="hidden" name="grupo" value="<?php echo $value['grupo']?>">
                    <input type="submit" name="cargar" value="Paso 2: cargar equipos">
                </form>
                <?php } else { echo 'Paso 2 completado.'; $pasos++; } ?>
                </div>
                <div id="carga-<?php echo $value['grupo']?>-3">
                <form method="post" onsubmit="pasoCarga(event, $(this).serialize(),<?php echo $value['grupo']?>,3)" name="p3<?php echo $value['grupo']?>">
                    <input type="hidden" name="p" value="3">
                    <input type="hidden" name="comunidad_id" value="<?php echo $comunidad_id?>">
                    <input type="hidden" name="competicion" value="<?php echo $value['competicion']?>">
                    <input type="hidden" name="grupo" value="<?php echo $value['grupo']?>">
                    <input type="submit" name="cargar" value="Paso 3: cargar partidos">
                </form>
                </div>
            </div>
        <?php }?>
</td></tr>
<?php } ?> 
</table>
<?php 
if ($totalPasos>0){ ?>
<div class="marco">Para poder elegir más torneos tienes que terminar los tres pasos y cargar.</div>
<?php } ?>