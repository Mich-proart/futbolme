<table class="whitebox"><tr><td>

<div id="mensaje"></div>
<?php if ($usuario_id==0){ ?>
<table>
    <tr>
    
    
    <td>
    <?php if ($betsapi>0) { ?>

        <a href="/panelBack/partidosProximos.php?id=<?php echo $betsapi?>&temporada_id=<?php echo $temporada_id?>&tipo_torneo=<?php echo $tipo_torneo?>" target="_blank">Próximos partidos BETSAPI</a> -
    <span  onclick="partidosProximos(<?php echo $betsapi?>,<?php echo $temporada_id?>,<?php echo $tipo_torneo?>)" style="cursor:pointer" class="boldfont hide"></span>    
    <?php } ?>
    </td>
    
    
    <td>
    <?php 

    if ($tipo_torneo==2) { ?>
    <span onclick="refrescarTorneo(<?php echo $temporada_id?>,0)" style="cursor:pointer" class="boldfont" style="font-size: 30px">Crear Partidos</span>    
    <?php } ?>
    </td>
    
    <td>
    <input id="boton-apuestaMA-<?php echo $temporada_id; ?>" type="hidden" name="apuestaMA" value="0">
    <input class="resultado" id="boton-betsapi-<?php echo $temporada_id; ?>" type="text" size="4" name="betsapi" value="<?php echo $betsapi; ?>" style="font-size:12px; width:20; background-color: yellow; text-align: center">
    <input class="btn_enviar hidden-xs" id="boton-orden-<?php echo $temporada_id; ?>" type="button" onclick="orden_torneo(<?php echo $temporada_id; ?>)" 
    style="font-size:12px" value="Or.">
    </td>
    
    <td>
    <form method="post" class="jornadaActiva" onsubmit="submitActiva(event, $(this).serialize())">
    <input type="hidden" name="tipo_torneo" value="<?php echo $tipo_torneo; ?>" >
    <input type="hidden" name="temporada_id" value="<?php echo $temporada_id; ?>" >
    <input type="text" name="jornadaActiva" value="<?php echo $jornadaActiva; ?>" size="4">
    <input type="submit" name="cambiar" value="cambiar activa">
    </form>
    </td>

    
    

    <td>
    <select name="temporada" onchange="cargar_torneo_futbolme(this.value,<?php echo $tipo_torneo; ?>)">
    <?php if (1 == $tipo_torneo) {
        echo "<option value='0'>Jornadas</option>";
        for ($i = 1; $i < $jornadas + 1; ++$i) {
            echo "<option value='".$temporada_id.','.$jornadas.','.$i.",0'";
            if ($i == $jornadaActiva) {
                echo 'selected';
            }
            echo '>Jornada '.$i.'</option>';
        }
    } else {
        $fases = listarFases($temporada_id);
        echo "<option value='0'>Eliminatorias</option>";
        foreach ($fases as $fila) {
            echo "<option value='".$temporada_id.','.$fila['tipo_eliminatoria'].','.$fila['id'].",0'>".$fila['nombre'].' ('.$fila['id'].')</option>';
        }
    } ?>
    </select>
    </td>

<td>
<input id="ostiaClasi" type="button" value="clasificacion <?php echo $_POST['temporada']; ?>" onclick="mostrarClasificacion('<?php echo $_POST['tipo_torneo']; ?>', '<?php echo $_POST['temporada']; ?>')">
</td>

<td>
<?php
if (2 == $tipo_torneo && 3 == $jornadas) {
        $consulta = 'SELECT t.torneo_id FROM temporada t WHERE t.id='.$temporada_id;
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $consulta);
        $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);
        $torneo_id = $resultado[0]['torneo_id']; ?>
<select name="temporada" onchange="cargar_torneo_futbolme(this.value,<?php echo $tipo_torneo; ?>)">
<?php	

    $grupos = listarGrupos($torneo_id, $jornadaActiva);
        echo "<option value='".$temporada_id.',3,'.$jornadaActiva.",0'>Todos los grupos</option>";
        foreach ($grupos as $fila) {
            echo "<option value='".$temporada_id.',3,'.$jornadaActiva.','.$fila['id'].','.$betsapi."'>".$fila['nombre'].'</option>';
        } ?>
</select>
<?php } ?>

</td></tr></table>
<?php } //usuario_id=0 ?>


<?php 

//echo 'cargar partidos<br />';
/*echo "<pre>";
print_r($grupo_id);
echo "</pre>";*/

if ($temporada_id==442){
    $fecha=$grupo_id; $grupo_id=0;
    if (empty($fecha)) { $fecha=date('Y-m-d'); } 
}

$jornadaActiva=abs($jornadaActiva);
$partidos = listarPartidos($temporada_id, $jornadaActiva, $grupo_id);
$medios = listarMedios();
$c = comunidad($temporada_id);
$comunidad_id = ($c - 1); 

//echo 'total partidos '.count($partidos).'<br />';


if ($temporada_id==442){
    $fechas=array();$partidosAmistosos=array();

    
    
    foreach ($partidos as $k => $p) {
        $fechas[$p['fecha']]=$p['fecha'];
        if ($p['fecha']==$fecha){            
            $partidosAmistosos[]=$p;
        }
    } 
    
    unset($partidos); $partidos=$partidosAmistosos; 
     ?>

    <div style="margin-left: 50px"><select name="temporada" onchange="cargar_torneo_futbolme(this.value,<?php echo $tipo_torneo; ?>)">
    <?php 
        echo "<option value='".$temporada_id.',-1,'.$jornadaActiva.','.$fecha.','.$betsapi."'>Hoy</option>";
        foreach ($fechas as $ff) {
            echo "<option value='".$temporada_id.',-1,'.$jornadaActiva.','.$ff.','.$betsapi."'>".$ff."</option>";
        } ?>
        </select></div>
    
<?php } ?>

</td></tr>
<tr><td>


    <div  style="float:left; width:100%; padding:2px;">
        
        <input type="hidden" id="id_temporada" value="<?php echo $temporada_id?>" />
        <input type="hidden" id="id_division" value="<?php echo $partidos[0]['division_id']?>" />
        <input type="hidden" id="id_comunidad" value="<?php echo $comunidad_id?>" />
        <input type="hidden" id="id_usuario" value="<?php echo $usuario_id?>" />


        <form method="post" class="formulario" id="form" onsubmit="submitForm(event, $(this).serialize(),0)">
        <table width="100%" bgcolor="gainsboro">
            <tr><td class="estado">Estado</td>
                <td colspan="4">Partido</td>
                <td class="fecha">Fecha</td>
                <td class="hora">Hora</td>
            </tr>
    <?php $i = 0;$txtWhats='';$lafecha='';
        foreach ($partidos as $key => $fila) { 
            
            if ('SIN PAIS' == $fila['local'] || 'SIN PAIS' == $fila['visitante']) { continue; }

            if (1 == $fila['estado_partido']) { $color_fila = '#eeffbb'; } else { $color_fila = 'white';  } 
            ?>
    <tr bgcolor="<?php echo $color_fila; ?>">    
    <input type="hidden" name="id[]" value="<?php echo $fila['partido_id']; ?>">
    <input type="hidden" name="temporada_id[]" value="<?php echo $fila['temporada_id']; ?>">
    <input type="hidden" name="jornada[]" value="<?php echo $fila['jornada']; ?>">
    <input type="hidden" name="or_estado_partido[]" value="<?php echo $fila['estado_partido']; ?>">
    <input type="hidden" name="or_fecha[]" value="<?php echo $fila['fecha']; ?>">
    <input type="hidden" name="or_hora_prevista[]" value="<?php echo $fila['hora_prevista']; ?>">
    <input type="hidden" name="or_goles_local[]" value="<?php echo $fila['goles_local']; ?>">
    <input type="hidden" name="or_goles_visitante[]" value="<?php echo $fila['goles_visitante']; ?>">
    <input type="hidden" name="local[]" value="<?php echo $fila['ncLocal']; ?>">
    <input type="hidden" name="visitante[]" value="<?php echo $fila['ncVisitante']; ?>">
    <input type="hidden" name="equipoLocal_id[]" value="<?php echo $fila['equipoLocal_id']; ?>">
    <input type="hidden" name="equipoVisitante_id[]" value="<?php echo $fila['equipoVisitante_id']; ?>">
    <td class="estado"><select name="estado_partido[]">
    <option value="0" <?php if (0 == $fila['estado_partido']) { echo 'selected';} ?>>No jugado</option>
    <option value="1" <?php if (1 == $fila['estado_partido']) { echo 'selected';} ?>>FINAL</option>
    <?php if ($usuario_id==0){ ?>
    <option value="3" <?php if (3 == $fila['estado_partido']) { echo 'selected';} ?>>Suspendido</option>
    <option value="4" <?php if (4 == $fila['estado_partido']) { echo 'selected';} ?>>Aplazado</option>
    <option value="5" <?php if (5 == $fila['estado_partido']) { echo 'selected';} ?>>Anulado</option>
    <?php } ?>
    <?php /*
    <option value="6" <?php if (6 == $fila['estado_partido']) { echo 'selected';} ?>>Descanso</option>
    <option value="2" <?php if (2 == $fila['estado_partido']) { echo 'selected';} ?>>En juego</option>
    */ ?>
    
    </select></td>
    <td align="right">

        <span style="cursor:pointer; color: maroon" class="boldfont" onclick="filtrarComandes(<?php echo $fila['equipoLocal_id']?>,0,0)">N</span>
        <?php echo $fila['ncLocal'];?></td>
    <td align="center" width="10"><input type="text" name="goles_local[]" value="<?php echo $fila['goles_local']; ?>" size="2" style="text-align: center"></td>
    <td align="center" width="10"><input type="text" name="goles_visitante[]" value="<?php echo $fila['goles_visitante']; ?>" size="2" style="text-align: center"></td>
    <td><?php echo $fila['ncVisitante'];?>
    <span style="cursor:pointer; color: maroon" class="boldfont" onclick="filtrarComandes(0,<?php echo $fila['equipoVisitante_id']?>,0)">N</span>
 </td>
    <td class="fecha"><input class="fecha_input" type="text" name="fecha[]" value="<?php echo $fila['fecha']; ?>" size="10"></td>
    <td class="hora"><input class="hora_input" type="text" name="hora_prevista[]" value="<?php echo $fila['hora_prevista']; ?>" size="10">

    <span style="cursor:pointer; color: maroon" class="boldfont" onclick="filtrarComandes(<?php echo $fila['equipoLocal_id']?>,<?php echo $fila['equipoVisitante_id']?>,<?php echo $fila['partido_id']?>)">N</span>

    <?php if ($usuario_id==0){ ?>
     - <span onclick="enfrentamientos(<?php echo $fila['equipoLocal_id']?>,<?php echo $fila['equipoVisitante_id']?>,'<?php echo $fila['ncLocal']?>','<?php echo $fila['ncVisitante']?>')" style="cursor:pointer;" class="boldfont">ENF</span><?php } ?>


    </td>
    </tr>
    <?php 

         if ($key==0){
            $txtWhats.='Horarios de '.$fila['torneo_nombre'].' para la jornada '.$fila['jornada']."\n";
        }

        if ($lafecha!=$fila['fecha']){
            $txtWhats.="\n".nombreDiaCompleto($fila['fecha'])."\n\n";
        }

        
        $txtWhats.=str_replace(':','.',substr($fila['hora_prevista'],0,5)).' : ';
        $txtWhats.=$fila['ncLocal'].' - '.$fila['ncVisitante']."\n";


        $i = $i + 1; $lafecha=$fila['fecha'];

           


    } 


    if ($tipo_torneo==1){
        $sq='SELECT apifutbol, apiRFEFcompeticion, apiRFEFgrupo, comunidad_id, whatsapp FROM torneo WHERE id=(SELECT torneo_id FROM temporada WHERE id='.$temporada_id.')';
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $sq);
        $torneo = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);

        $comunidad_id=($torneo['comunidad_id']-1);
        $competicion_id=$torneo['apiRFEFcompeticion'];
        $grupo_id=$torneo['apiRFEFgrupo'];
        $fase=$torneo['apifutbol'];
        $whatsapp=$torneo['whatsapp'];

        if ($comunidad_id>0){
            
            include ('../../panelBack/federacion/funciones/urlFederaciones.php');

            if ($carpeta=='00pnfg'){
            $url.='CodCompeticion='.$competicion_id.'&CodGrupo='.$grupo_id.'&CodJornada='.$jornadaActiva;
            }

            if ($carpeta=='00isquad'){
            $url.='id_competicion='.$competicion_id.'&id_fase='.$fase.'&id_grupo='.$grupo_id.'&jornada='.$jornadaActiva;
            }
        }
    }
    ?>
        <input type="hidden" name="partidos" value="<?php echo $i; ?>">    
        <tr bgcolor="yellow">
            <td colspan="6" align="center"><input type="submit" name="grabar" value="Grabar"></td>
            <?php 

            
           

            if ($usuario_id==0){ ?>
            <td colspan="2" align="center">
                <?php if (isset($url)){ ?>
                    <a href="<?php echo $url?>" target="_blank"><b>Federación</b></a>
                <?php } ?>
                <?php if (isset($urlh)){ ?>
                    - <a href="<?php echo $urlh?>" target="_blank"><b>Horarios</b></a>
                <?php } ?>
                   - <a href="/temporada.php?id=<?php echo $temporada_id?>" target="_blank"><b>FM</b></a>
            
            </td>
            <?php } ?>
        </tr>
            </table>
            </form>
            
            <?php 

            if (!empty($whatsapp)){ 


                $txtWhats.='<br />Todos los datos en https://futbolme.eu/temporada.php?id='.$temporada_id."\n";
                $txtWhats=str_replace("\n",'<br />',$txtWhats);
                $whatsapp=str_replace("@g.us",'',$whatsapp);
                
                ?>
                <table width="100%"><tr><td>
                <span onclick="enviarHorarios('<?php echo $whatsapp?>','<?php echo $txtWhats?>')" style="cursor:pointer; background-color: maroon; color:white; padding:5px">Enviar horarios para whatsapp</span>
                </td>
                <td align="right">
                <span onclick="generarPDF(<?php echo $temporada_id?>)" style="cursor:pointer; background-color: maroon; color:white; padding:5px">Generar PDF</span>
                </td></tr></table>

                <div id="chat-<?php echo $whatsapp?>"></div>
                <div id="pdf-<?php echo $temporada_id?>"></div>
            <?php  }

            


            if ($usuario_id==0){ ?>
                <div id="clasificacion"></div>
                    <?php if ($comunidad_id==1
                     || $comunidad_id==3 
                     || $comunidad_id==5
                     || $comunidad_id==7 
                     || $comunidad_id==9
                     || $comunidad_id==10
                     || $comunidad_id==11 
                     || $comunidad_id==18

                    ){ ?>
                    <table class="table">
                        <tr><td>
                    Ctrl+U (abrir código fuente); Ctrl+A (seleccionar código)<br />Ctrl+C (copiar código); Ctrl+V (pegar código)<br />
                        </td>
                        <td>
                    <form onsubmit="procesar(event, $(this).serialize())" method="post">
                    <input type="hidden" name="carpeta" value="<?php echo $carpeta?>">
                    <input type="hidden" name="territorial" value="<?php echo $territorial?>">
                    <input type="hidden" name="jornada" value="<?php echo $jornadaActiva?>">
                    <input type="hidden" name="temporada_id" value="<?php echo $temporada_id?>">
                    <input type="hidden" name="comunidad_id" value="<?php echo $comunidad_id?>">
                    <input type="hidden" name="apifutbol" value="<?php echo $fase?>" size="8" style="text-align: center">
                    <input type="hidden" name="apiRFEFcompeticion" value="<?php echo $competicion_id?>" size="8">
                    <input type="hidden" name="apiRFEFgrupo" value="<?php echo $grupo_id?>" size="8">
                    <textarea name="pagina" cols="50" rows="2"></textarea>
                    <input type="submit" name="enviar" value="ok"> 
                    </form> 
                    </td></tr></table>
                <?php } ?>
             <?php } //usuario_id==0 ?>

    </div>

</td></tr>
    
<?php if ($usuario_id==0){ ?>
<tr><td>
    

    

    <div  style="float:left; width:100%; background-color: orange; padding:2px; ">

         <table class="table">
            <tr>
                <td colspan="3">Partido</td>
                <td class="clasificado">Clas</td>
                <td class="medios">Med</td>
                <td class="observaciones">Obs</td>
                <td class="goles">Gol</td>
            </tr>
        <?php $i = 0;
        foreach ($partidos as $fila) { 
            if ('SIN PAIS' == $fila['local'] || 'SIN PAIS' == $fila['visitante']) { continue; }

            if (1 == $fila['estado_partido']) { $color_fila = '#eeffbb'; } else { $color_fila = 'white';  } 
            ?>
            <tr bgcolor="<?php echo $color_fila; ?>">            
            <td align="right"><?php echo $fila['ncLocal'];?></td>
            <td align="center" style="text-align: center; width: 50px"><?php echo $fila['goles_local'];?> - <?php echo $fila['goles_visitante'];?></td>            
            <td><?php echo $fila['ncVisitante'];?></td>
            
            <td>
            <form id="f1-<?php echo $fila['partido_id']; ?>" method="post" onsubmit="editarApiId(event, $(this).serialize(),<?php echo $fila['partido_id']; ?>)">
            <input type="hidden" name="id" value="<?php echo $fila['partido_id']; ?>">
            <input type="hidden" name="apiName" value="clasificado">
            <input type="text" name="apiId" size="1" value="<?php echo $fila['clasificado']; ?>">
            <input type="submit" name="grabar" value="*">
            </form>
           </td>                       
            
            <td>
                <select class='medio' id="medio-<?php echo $fila['partido_id']; ?>"  onchange="insertarMedio($(this).val(), <?php echo $fila['partido_id']; ?>, 0)">
                    <option value='0'>Seleccionar</option>
                    <?php foreach ($medios as $fila3) {
                            echo "<option value='".$fila3['id']."'>".$fila3['nombre'].'</option>';
                        } ?>
                </select>                
            <div id="partido-medios-<?php echo $fila['partido_id']; ?>">
                <?php if ($fila['medios'] > 0) {
                    $partidosmedios = partidosMedios($fila['partido_id']);
                    foreach ($partidosmedios as $fila4) {
                        echo '<span id="partido-medio-'.$fila4['id'].'">'.$fila4['nombre'].' - <span href="#" onclick="insertarMedio('.$fila4['id'].','.$fila['partido_id'].', 1)" style="cursor:pointer" class="boldfont">quitar</span></span><br />';
                    }
                } ?>
            </div>
            </td>

            


           <td>
            <form id="f3-<?php echo $fila['partido_id']; ?>" method="post" onsubmit="editarApiId(event, $(this).serialize(),<?php echo $fila['partido_id']; ?>)">
            <input type="hidden" name="id" value="<?php echo $fila['partido_id']; ?>">
            <input type="hidden" name="apiName" value="observaciones">
            <textarea style="width:150px; height:25px" name="apiId" onClick="this.style.height='80px'"><?php echo $fila['observaciones']; ?></textarea>
            <input type="submit" name="grabar" value="*">
            </form>
           </td>
           <td><span id="alineaciones-<?php echo $fila['partido_id']; ?>" onclick="alineaciones(<?php echo $fila['partido_id']; ?>,0,0)"
      style="background-color:orange; cursor:pointer; border: 2px solid black; padding:2px;">Goles</span></td>

            </tr>
            <tr bgcolor="gainsboro"><td colspan="9"><div id="ver-alineacion-<?php echo $fila['partido_id']; ?>"style="text-align: center;"></div></td></tr>
            <?php $i = $i + 1;?>
            
        <?php } ?>
            </table>


    </div>
    

</td></tr>
<?php } ?>
</table>

