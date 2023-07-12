<table><tr><td>

<table><tr>
    <td>
    <?php if ($betsapi>0) { ?>
    <a href="partidosProximos.php?id=<?php echo $betsapi?>&temporada_id=<?php echo $temporada_id?>" target="_blank">Próximos partidos BETSAPI</a> -    
    <?php } ?>
    </td>

    
    <td>
    <?php 

    if ($tipo_torneo==2) { ?>
    <a href="partidosTorneo.php?temporada_id=<?php echo $temporada_id?>" target="_blank">Crear partidos</a>    
    <?php } ?>
    </td>
    <?php  if (isset($_SERVER['HTTP_REFERER']) && substr($_SERVER['HTTP_REFERER'],0,30)=='https://futbolme.com/panelBack') { ?>
    <td>
    <input id="boton-apuestaMA-<?php echo $temporada_id; ?>" type="hidden" name="apuestaMA" value="0">
    <input class="resultado" id="boton-betsapi-<?php echo $temporada_id; ?>" type="text" size="4" name="betsapi" value="<?php echo $betsapi; ?>" style="font-size:12px; width:20; background-color: yellow; text-align: center">
    <input class="btn_enviar hidden-xs" id="boton-orden-<?php echo $temporada_id; ?>" type="button" onclick="orden_torneo(<?php echo $temporada_id; ?>)" 
    style="font-size:12px" value="Or.">
    </td>
    <?php } //si es futbolme?>
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
    
<?php 
}

?>

</td></tr>
<tr><td>


    <div  style="float:left; width:100%; padding:2px;">
        <form method="post" class="formulario" id="form<?php echo $i; ?>" onsubmit="submitForm(event, $(this).serialize(),0)">
        <table width="100%" bgcolor="gainsboro">
            <tr><td class="estado">Estado</td>
                <td colspan="4">Partido</td>
                <td class="fecha">Fecha</td>
                <td class="hora">Hora</td>
            </tr>
    <?php $i = 0;
        foreach ($partidos as $fila) { 
            
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
    <option value="3" <?php if (3 == $fila['estado_partido']) { echo 'selected';} ?>>Suspendido</option>
    <option value="4" <?php if (4 == $fila['estado_partido']) { echo 'selected';} ?>>Aplazado</option>
    <option value="5" <?php if (5 == $fila['estado_partido']) { echo 'selected';} ?>>Anulado</option>
    
    <?php /*
    <option value="6" <?php if (6 == $fila['estado_partido']) { echo 'selected';} ?>>Descanso</option>
    <option value="2" <?php if (2 == $fila['estado_partido']) { echo 'selected';} ?>>En juego</option>
    */ ?>
    
    </select></td>
    <td align="right"><?php echo $fila['ncLocal'];?></td>
    <td align="center" width="10"><input type="text" name="goles_local[]" value="<?php echo $fila['goles_local']; ?>" size="2" style="text-align: center"></td>
    <td align="center" width="10"><input type="text" name="goles_visitante[]" value="<?php echo $fila['goles_visitante']; ?>" size="2" style="text-align: center"></td>
    <td><?php echo $fila['ncVisitante'];?></td>
    <td class="fecha"><input class="fecha_input" type="text" name="fecha[]" value="<?php echo $fila['fecha']; ?>" size="10"></td>
    <td class="hora"><input class="hora_input" type="text" name="hora_prevista[]" value="<?php echo $fila['hora_prevista']; ?>" size="10"></td>
    </tr>
    <?php $i = $i + 1;?>
    <?php } 


    if ($tipo_torneo==1){
        $sq='SELECT apifutbol, apiRFEFcompeticion, apiRFEFgrupo, comunidad_id FROM torneo WHERE id=(SELECT torneo_id FROM temporada WHERE id='.$temporada_id.')';
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $sq);
        $torneo = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);

        $comunidad_id=($torneo['comunidad_id']-1);
        $competicion_id=$torneo['apiRFEFcompeticion'];
        $grupo_id=$torneo['apiRFEFgrupo'];
        $fase=$torneo['apifutbol'];

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
            <td colspan="2" align="center">
                <?php if (isset($url)){ ?>
                    <a href="<?php echo $url?>" target="_blank"><b>Federación</b></a>
                <?php } ?>
                <?php if (isset($urlh)){ ?>
                    - <a href="<?php echo $urlh?>" target="_blank"><b>Horarios</b></a>
                <?php } ?>

                   - <a href="/temporada.php?id=<?php echo $temporada_id?>" target="_blank"><b>FM</b></a>
            </td>
        </tr>
            </table>
            </form>
            <div id="clasificacion"></div>
    </div>

</td></tr>
    

<tr><td>
    <?php 
    if (isset($_SERVER['HTTP_REFERER']) && substr($_SERVER['HTTP_REFERER'],0,29)=='https://futbolme.com/panelBFS') { ?>

    <div  style="float:left; width:100%; background-color: orange; padding:2px; ">

         <table width="100%" bgcolor="orange" border="1">
            <tr>
                <td colspan="3">Partido</td>
                <td class="clasificado" style="visibility: hidden">Clas</td>
                <td class="estadio" style="visibility: hidden">Est</td>
                <td class="arbitro" style="visibility: hidden">Arb</td>
                <td class="medios">Med</td>
                <td class="observaciones">Obs</td>
                <td class="goles" style="visibility: hidden">Gol</td>
            </tr>
        <?php $i = 0;
        foreach ($partidos as $fila) { 
            if ('SIN PAIS' == $fila['local'] || 'SIN PAIS' == $fila['visitante']) { continue; }

            if (1 == $fila['estado_partido']) { $color_fila = '#eeffbb'; } else { $color_fila = 'white';  } 
            ?>
            <tr bgcolor="<?php echo $color_fila; ?>">            
            <td align="right"><?php echo $fila['ncLocal'];?></td>
            <td align="center" width="30" style="text-align: center"><?php echo $fila['goles_local'];?> - <?php echo $fila['goles_visitante'];?></td>            
            <td><?php echo $fila['ncVisitante'];?></td>
            
            <td style="visibility: hidden">
            <form id="f1-<?php echo $fila['partido_id']; ?>" method="post" onsubmit="editarApiId(event, $(this).serialize(),<?php echo $fila['partido_id']; ?>)">
            <input type="hidden" name="id" value="<?php echo $fila['partido_id']; ?>">
            <input type="hidden" name="apiName" value="clasificado">
            <input type="text" name="apiId" size="1" value="<?php echo $fila['clasificado']; ?>">
            <input type="submit" name="grabar" value="*">
            </form>
           </td>

           <td style="visibility: hidden">
            <form id="f2-<?php echo $fila['partido_id']; ?>" method="post" onsubmit="editarApiId(event, $(this).serialize(),<?php echo $fila['partido_id']; ?>)">
            <input type="hidden" name="id" value="<?php echo $fila['partido_id']; ?>">
            <input type="hidden" name="apiName" value="estadio">
            <input type="text" name="apiId" size="1" value="<?php echo $fila['estadio']; ?>">
            <input type="submit" name="grabar" value="*">
            </form>
           </td>
            
            
            <td style="visibility: hidden">
            <form id="f2-<?php echo $fila['partido_id']; ?>" method="post" onsubmit="editarApiId(event, $(this).serialize(),<?php echo $fila['partido_id']; ?>)">
            <input type="hidden" name="id" value="<?php echo $fila['partido_id']; ?>">
            <input type="hidden" name="apiName" value="arbitro_id">
            <input type="text" name="apiId" size="1" value="<?php echo $fila['arbitro_id']; ?>">
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
                        echo '<span id="partido-medio-'.$fila4['id'].'">'.$fila4['nombre'].' - <a href="#" onclick="insertarMedio('.$fila4['id'].','.$fila['partido_id'].', 1)">quitar</a></span><br />';
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
           <td style="visibility: hidden"><span id="alineaciones-<?php echo $fila['partido_id']; ?>" onclick="alineaciones(<?php echo $fila['partido_id']; ?>,0,0)"
      style="background-color:orange; cursor:pointer; border: 2px solid black; padding:2px;">Goles</span></td>

            </tr>
            <tr bgcolor="gainsboro"><td colspan="9"><div id="ver-alineacion-<?php echo $fila['partido_id']; ?>"style="text-align: center;"></div></td></tr>
            <?php $i = $i + 1;?>
            
        <?php } ?>
            </table>


    </div>




    <?php } ?>

    
    <?php 

    
    if (isset($_SERVER['HTTP_REFERER']) && substr($_SERVER['HTTP_REFERER'],0,30)=='https://futbolme.com/panelBack' || $_SERVER['HTTP_REFERER']=='http://fm18.com/panelBack/') { ?>
    <div  style="float:left; width:100%; background-color: orange; padding:2px; ">

         <table width="100%" bgcolor="orange" border="1">
            <tr>
                <td colspan="3">Partido</td>
                <td class="clasificado">Clas</td>
                <td class="estadio">Est</td>
                <td class="arbitro">Arb</td>
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
            <td align="center" width="30" style="text-align: center"><?php echo $fila['goles_local'];?> - <?php echo $fila['goles_visitante'];?></td>            
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
            <form id="f2-<?php echo $fila['partido_id']; ?>" method="post" onsubmit="editarApiId(event, $(this).serialize(),<?php echo $fila['partido_id']; ?>)">
            <input type="hidden" name="id" value="<?php echo $fila['partido_id']; ?>">
            <input type="hidden" name="apiName" value="estadio">
            <input type="text" name="apiId" size="1" value="<?php echo $fila['estadio']; ?>">
            <input type="submit" name="grabar" value="*">
            </form>
           </td>
            
            
            <td>
            <form id="f2-<?php echo $fila['partido_id']; ?>" method="post" onsubmit="editarApiId(event, $(this).serialize(),<?php echo $fila['partido_id']; ?>)">
            <input type="hidden" name="id" value="<?php echo $fila['partido_id']; ?>">
            <input type="hidden" name="apiName" value="arbitro_id">
            <input type="text" name="apiId" size="1" value="<?php echo $fila['arbitro_id']; ?>">
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
                        echo '<span id="partido-medio-'.$fila4['id'].'">'.$fila4['nombre'].' - <a href="#" onclick="insertarMedio('.$fila4['id'].','.$fila['partido_id'].', 1)">quitar</a></span><br />';
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
    <?php } ?>

</td></tr></table>
