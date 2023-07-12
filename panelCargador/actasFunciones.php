<?php
function arregloMinuto($minuto){
    $extra=0;
    $m=str_replace('(', '', $minuto);
    $m=str_replace("'", '', $m);
    $m=str_replace(')', '', $m);
    $m=str_replace('´', '', $m);
    $m=explode('+', $m);
    if (count($m)>1){ $minuto=$m[0]; $extra=$m[1]; } else { $minuto=$m[0]; }    
    if ($minuto<46) { $minuto=$minuto+$extra+100; } else { $minuto=$minuto+$extra+200; }
    return $minuto;
}

function identificarJugador($identificador,$llave,$equipo_id,$partido_id,$acta,$temporada_id){
    
    $jugador_id=0;
    $mysqli=conectarFM();

    
    

    $nombre=str_replace(',', '', $llave);
    $nombre=mb_strtolower($nombre);
    $nombre=ucwords($nombre);
    $apodo=$nombre;

    $n=explode(' ', $nombre);
    if (count($n)==3) { 
        $nombre=$n[2].' '.$n[0].' '.$n[1];
        $apodo=$n[2].' '.$n[0];
        $apellidos=$n[0].' '.$n[1];
        $apellido=$n[0];
    }

    if (count($n)==4) { 
        if (strlen($n[3])==1){ $n[3]=$n[3].'.'; }
        $nombre=$n[2].' '.$n[3].' '.$n[0].' '.$n[1];
        $apodo=$n[2].' '.$n[3].' '.$n[0];
        $apellidos=$n[0].' '.$n[1];
        $apellido=$n[0];
    }

    $x=explode(',',$llave);
    if (count($x)>1){
        $x1=explode(' ',$x[0]);
        if (count($x1)>2){
            $nombre=str_replace(',', '', $llave);
            $nombre=mb_strtolower($nombre);
            $nombre=ucwords($nombre);
            $apodo=$nombre;
            $n=explode(' ', $nombre);
            if (count($n)==4) {                 
                $nombre=$n[3].' '.$n[0].' '.$n[1].' '.$n[2];
                $apodo=$n[3].' '.$n[0];
                $apellidos=$n[0].' '.$n[1];
                $apellido=$n[0];
            }
        }
    }

    /*
    imp($llave);
    imp($nombre);
    imp($apellidos);
    imp($apellido);
    imp($apodo);
    imp($identificador);
    */
    
    

    $sql='SELECT id FROM jugador WHERE identificador="'.$identificador.'"';
    //echo $sql.'<br />';
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);

    
    
    if (count($r)>0){ 
        $jugador_id=$r['id'];   


    } else {

        
        
        
        $sql='SELECT id, apodo, nombre FROM jugador WHERE nombre LIKE "%'.$nombre.'%" AND equipoActual_id='.$equipo_id;
        $resultadoSQL = mysqli_query($mysqli, $sql);
        $r = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
        //var_export(count($r));

        if (count($r)==0){
            $sql='SELECT id, apodo, nombre FROM jugador WHERE nombre LIKE "%'.$apodo.'%" AND equipoActual_id='.$equipo_id;
            $resultadoSQL = mysqli_query($mysqli, $sql);
            $r = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
            //var_export(count($r));
            if (count($r)==0){
                $sql='SELECT id, apodo, nombre FROM jugador WHERE nombre LIKE "%'.$apellidos.'%" AND equipoActual_id='.$equipo_id;
                $resultadoSQL = mysqli_query($mysqli, $sql);
                $r = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
                //var_export(count($r));
                if (count($r)==0){
                    $sql='SELECT id, apodo, nombre FROM jugador WHERE nombre LIKE "%'.$apellido.'%" AND equipoActual_id='.$equipo_id;
                    $resultadoSQL = mysqli_query($mysqli, $sql);
                    $r = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
                    //var_export(count($r));
                    if (count($r)==0){
                        $sql='SELECT id, apodo, nombre FROM jugador WHERE equipoActual_id='.$equipo_id;
                        $resultadoSQL = mysqli_query($mysqli, $sql);
                        $r = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
                        //var_export(count($r));
                    }
                }
            }
        } else {?>
            <table>
            <?php 
            //var_export(count($r));
            if (count($r)==1){
                $sq='UPDATE jugador SET identificador="'.$identificador.'" WHERE id='.$r[0]['id'];
                mysqli_query($mysqli, $sq);
                $jugador_id=$r[0]['id'];
            } else {

                foreach ($r as $key => $value) { ?>
                    <tr><td><?php echo $value['id']?> - <b><?php echo $value['apodo']?></b> - <?php echo $value['nombre']?></td>
                        <form method="post" action="?" id="key-<?php echo $key?>">
                        <input type="hidden" name="modo" value="1">
                        <input type="hidden" name="partido_id" value="<?php echo $partido_id?>">
                        <input type="hidden" name="acta" value="<?php echo $acta?>">                
                        <td><textarea cols="70" rows="1" name="consulta">UPDATE jugador SET identificador="<?php echo $identificador?>" WHERE id=<?php echo $value['id']?></textarea>
                        <input type="submit" name="grabar" value="grabar identificador"></td>               
                    </form></tr>
                    <?php
                    //se intentará encontrar aqui el jugador
                } 

            } ?>
            </table>
        <?php }
    }

    
    echo '<h1>Jugador_id: '.$jugador_id.'</h1>';
    if ($jugador_id==0){
        if ($temporada_id<25) { ?>
                <form method="post" action="?" id="key-<?php echo $key?>">
                <input type="hidden" name="modo" value="1">
                <input type="hidden" name="partido_id" value="<?php echo $partido_id?>">
                <input type="hidden" name="acta" value="<?php echo $acta?>">                
                <td><textarea cols="80" rows="2" name="consulta">INSERT INTO jugador (nombre, apodo, posicion, equipoActual_id, identificador,sexo,id_original) VALUES ("<?php echo $nombre?>","<?php echo $apodo?>","0","<?php echo $equipo_id?>","<?php echo $identificador?>",0,10000)</textarea>
                <input type="submit" name="grabar" value="Insertar Jugador"><br />
    <?php 
        die;
        } else {

            $sq='INSERT INTO jugador (nombre, apodo, posicion, equipoActual_id, identificador,sexo,id_original) VALUES ("'.$nombre.'","'.$apodo.'","0","'.$equipo_id.'","'.$identificador.'",0,11000)';
            mysqli_query($mysqli, $sq);
            echo $sq.'<br />';
            $jugador_id = mysqli_insert_id($mysqli);

        }
    } 

    
    //
    /*if (!isset($jugador_id)){
        $sq='INSERT INTO jugador (nombre, apodo, demarcacion, equipoActual_id, federacion_id)
         VALUES ("'.$nombre.'","'.$apodo.'","0","'.$equipo_id.'","'.$club.'-'.$identificador.'")';
        mysqli_query($mysqli, $sq);
        //sacar el id del jugador insertado.
    }*/
    echo '<h3>'.$nombre.' - Dorsal: '.$identificador.' - FM: '.$jugador_id.'</h3>';
    $jugadorDatos=array();
    $jugadorDatos['id']=$jugador_id;
    $jugadorDatos['nombre']=$nombre;
    $jugadorDatos['identificador']=$identificador;

    return $jugadorDatos;
    
      
}

function identificarJugadorRFEF($dorsal,$llave,$equipo_id,$comunidad_id,$acta,$temporada_id,$partido_id){
    
    $jugador_id=0;$nombre='x';$apodo='y';
    $mysqli=conectarFM();
    $apodo=trim($llave);

    $sql='SELECT id,nombre,apodo FROM jugador WHERE dorsal='.$dorsal.' AND equipoActual_id='.$equipo_id;
    //echo $sql.'<br />';
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
    if (count($r)>0){ 
        $jugador_id=$r['id'];
        $nombre=$r['nombre'];
        $apodo=$r['apodo'];
    } else {       
        
            $sql='SELECT id, apodo, nombre FROM jugador WHERE (nombre LIKE "%'.$apodo.'%" OR apodo LIKE "%'.$apodo.'%") AND equipoActual_id='.$equipo_id;
            //echo $sql.'<br />';
            $resultadoSQL = mysqli_query($mysqli, $sql);
            $r = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC); ?>
            <table>
            <?php 
            //var_export(count($r));
            if (count($r)==1){
                $sq='UPDATE jugador SET dorsal='.$dorsal.' WHERE id='.$r[0]['id'];
                mysqli_query($mysqli, $sq);
                $jugador_id=$r[0]['id'];
                $nombre=$r[0]['nombre'];
            } else {

                foreach ($r as $key => $value) { ?>
                    <tr><td>Jugador id: <?php echo $value['id']?> - <b><?php echo $value['apodo']?></b> - <?php echo $value['nombre']?></td>
                        </tr>
                    <?php
                    //se intentará encontrar aqui el jugador
                } 

            } ?>
            </table>
        <?php }
    

    
    //echo '<h1>Jugador_id: '.$jugador_id.'</h1>';
    /*if ($jugador_id==0){ ?>
                
                <form method="post" action="?" id="key-<?php echo $key?>">
                <input type="hidden" name="modo" value="2">
                <input type="hidden" name="c" value="<?php echo $comunidad_id?>">
                <input type="hidden" name="t" value="<?php echo $temporada_id?>">                
                <textarea cols="80" rows="2" name="consulta">INSERT INTO jugador (nombre, apodo, posicion, equipoActual_id, dorsal,sexo,id_original) VALUES ("<?php echo $apodo?>","<?php echo $apodo?>","0","<?php echo $equipo_id?>","<?php echo $dorsal?>",0,10000)</textarea>
                <input type="submit" name="grabar" value="Insertar Jugador"></form><br />
    <?php  } 

    /*if (!isset($jugador_id)){
        $sq='INSERT INTO jugador (nombre, apodo, demarcacion, equipoActual_id, federacion_id)
         VALUES ("'.$nombre.'","'.$apodo.'","0","'.$equipo_id.'","'.$club.'-'.$identificador.'")';
        mysqli_query($mysqli, $sq);
        //sacar el id del jugador insertado.
    }*/
    echo '<div style="border-bottom: black 1px solid;"><b>'.$apodo.'</b> Dorsal: <b>'.$dorsal.'</b> - FM: <b>'.$jugador_id.'</b><br /> - '.$nombre;

   
    if ($jugador_id==0){ ?>
            --- <a href="?acta=<?php echo $acta?>&id=<?php echo $partido_id?>&modo=grabar_jugador&equipoActual_id=<?php echo $equipo_id?>&dorsal=<?php echo $dorsal?>&apodo=<?php echo $apodo?>" style="color:maroon"><b>Grabar</b></a>
        <?php } 

    echo ' - </div>';

    $jugadorDatos=array();
    $jugadorDatos['id']=$jugador_id;
    $jugadorDatos['nombre']=$nombre;
    $jugadorDatos['apodo']=$apodo;
    $jugadorDatos['identificador']=$dorsal;

    return $jugadorDatos;
    
      
}

function quitar_acentos($cadena){

    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðòóôõöøùúûýýþÿ';
    $modificadas = 'aaaaaaaceeeeiiiidoooooouuuuybsaaaaaaaceeeeiiiidoooooouuuyyby';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    return utf8_encode($cadena);
}

function borrarJugador($jugador_id) {
    $mysqli = conectarFM();
    $consulta = 'DELETE FROM jugador WHERE id='.$jugador_id;
    if (!mysqli_query($mysqli, $consulta)) {
        printf("Errormessage: %s\n", mysqli_error($mysqli)); 
    } 
    echo $consulta;           
}

function insertarJugador($equipoActual_id,$dorsal,$apodo) {
    $mysqli = conectarFM();
    $sql='SELECT id FROM jugador WHERE equipoActual_id='.$equipoActual_id.' AND dorsal='.$dorsal; 

    $resultadoSQL = mysqli_query($mysqli, $sql);
    $r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);

    if (count($r)==0){

$consulta = 'INSERT INTO jugador (nombre, apodo, sexo, posicion, equipoActual_id, es_baja, dorsal) VALUES ("'.$apodo.'","'.$apodo.'", 1, 0, '.$equipoActual_id.',0,'.$dorsal.')';
     mysqli_query($mysqli, $consulta);
 } else { echo '<h1/>Ya existe un jugador con ese dorsal</h1>'; }


}

?>