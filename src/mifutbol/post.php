<?php
if (isset($_POST['mostrar'])){
  $valorGestor=$_POST['gestor_id'];
  $valorMostrar=$_POST['mostrar'];
  $valorId=$_POST['id'];
  torneoMostrar($valorId, $valorGestor, $valorMostrar);
  die;
}
if (isset($_POST['sancion'])){
  $valorGestor=$_POST['gestor'];
  $valorGrupo=$_POST['grupo'];
  $equipo_id=$_POST['equipo_id'];  
  $puntos=$_POST['puntos'];
  $jornada=$_POST['jornada'];
  $motivo=$_POST['motivo'];

  $sancion['puntos']=$puntos;
  $sancion['motivo']=$motivo;

  $f = 'json/gestores/'.$valorGestor.'/'.$valorGrupo.'-clas_sanciones.json';
  
  

  if (@file_exists($f)) {
      $json = file_get_contents($f);$sanciones = json_decode($json, true);
  } else { $sanciones=array(); }


  
  $sanciones[$jornada][$equipo_id]=$sancion; 
  guardarJSON($sanciones, $f);

      echo '<h3>Sanciones</h3>';
      foreach ($sanciones as $k => $v) {
      foreach ($v as $k1 => $v1) {
        echo 'Jornada '.$k.' - Eq.'.$k1.' '.$v1['puntos'].' '.$v1['motivo'].'<br />';
        }
      }
  
  die;
}

if (isset($_POST['pintar'])){
  $valorGestor=$_POST['gestor'];
  $valorGrupo=$_POST['grupo'];
  $estilo=$_POST['estilo'];  
  $posicion=$_POST['posicion'];
  $fc = 'json/gestores/'.$valorGestor.'/colores.json';        
  $f = 'json/gestores/'.$valorGestor.'/'.$valorGrupo.'-clas_colores.json';
  
  if ($estilo<0){
    $nuevo['id']=-1;
    $nuevo['cf']='white';
    $nuevo['ct']='black';
    $nuevo['ly']='';
  } else {
  $json = file_get_contents($fc);$colores = json_decode($json, true);
  
    foreach ($colores as $key => $value) {    
      if ($value['id']==(int)$estilo){ $nuevo=$value; break; }
    }
  }

  if (@file_exists($f)) {
      $json = file_get_contents($f);$pintadas = json_decode($json, true);
  } else { $pintadas=array(); }
  $pintadas[$posicion]=$nuevo;
  
  guardarJSON($pintadas, $f);
  echo $nuevo['cf'].'+'.$nuevo['ct'];
  die;
}

if (isset($_POST['cuenta'])){
    $gestor_id = $_POST['gestor_id'];
    $nombreGestor = $_POST['nombreGestor'];
    $nombreGestor=trim($nombreGestor);
    $twGestor=$_POST['twGestor']??'';
    $twGestor=trim($twGestor);
    if (strlen($nombreGestor)<3) { 
        echo 'El nombre tiene que tener un mínimo de 3 caracteres';
    } else {
        $n=aModificarUser($gestor_id,$nombreGestor,$twGestor);
        $_SESSION['nombreGestor']=$n['nombreGestor'];
        $_SESSION['twGestor']=$n['twGestor']; ?>
    <div  class="celestebox pull-right" id="formCuenta" style="display: block; padding: 30px">
        <form name="entrada" method="post" onsubmit="regCuenta(event, $(this).serialize())">
         <input type="hidden" name="cuenta" value="1" />
         <input type="hidden" name="gestor_id" value="<?php echo $_SESSION['gestor_id']?>" />
        <span style="color:white">Nombre: </span><input type="text" name="nombreGestor" value="<?php echo $_SESSION['nombreGestor']?>" required />
        <br />
        <span style="color:white">Twitter: </span><input type="text" name="twGestor" value="<?php echo $_SESSION['twGestor']?>" /><br />
        <p style="color:white">Los cambios se realizaron correctamente.</p>
               
        </form></div>

    <?php   } 
    die;
}


if(isset($_POST['p'])){
    if ($_POST['p']==1){ 
      //header('Location: /panelBack/federacion/_mifutbol/_02selects.php?comunidad_id='.$_POST['comunidad_id'].'&competicion='.$_POST['competicion'].'&grupo='.$_POST['grupo'].'&modo=1');
      $url = 'https://futbolme.eu/panelBack/federacion/_mifutbol/_02selects.php?comunidad_id='.$_POST['comunidad_id'].'&competicion='.$_POST['competicion'].'&grupo='.$_POST['grupo'].'&modo=1'; 
      $username = 'vicent';
      $password = '1vsc965ONTI';     
      $context = stream_context_create(array (
        'http' => array (
          'header' => 'Authorization: Basic ' . base64_encode("$username:$password")
        )));     
      $data=file_get_contents($url, false, $context);

      imp($data);
      
      echo 'Conseguido';  
    }

    if ($_POST['p']==2){ 
      //header('Location: /panelBack/federacion/_mifutbol/_03tablas.php?comunidad_id='.$_POST['comunidad_id'].'&competicion='.$_POST['competicion'].'&grupo='.$_POST['grupo'].'&modo=1');
      //header('Location: /panelBack/federacion/_mifutbol/_05tablas.php?comunidad_id='.$_POST['comunidad_id'].'&competicion='.$_POST['competicion'].'&grupo='.$_POST['grupo'].'&modo=1');

      $url = 'https://futbolme.eu/panelBack/federacion/_mifutbol/_05tablas.php?comunidad_id='.$_POST['comunidad_id'].'&competicion='.$_POST['competicion'].'&grupo='.$_POST['grupo'].'&modo=1'; 
      $username = 'vicent';
      $password = '1vsc965ONTI';     
      $context = stream_context_create(array (
        'http' => array (
          'header' => 'Authorization: Basic ' . base64_encode("$username:$password")
        )));     
      $data=file_get_contents($url, false, $context);
      imp($data);
      echo 'Conseguido';  
    }

    if ($_POST['p']==3){ 
      //header('Location: /panelBack/federacion/_mifutbol/_04tablas.php?comunidad_id='.$_POST['comunidad_id'].'&competicion='.$_POST['competicion'].'&grupo='.$_POST['grupo'].'&modo=1');

      $url = 'https://futbolme.eu/panelBack/federacion/_mifutbol/_04tablas.php?comunidad_id='.$_POST['comunidad_id'].'&competicion='.$_POST['competicion'].'&grupo='.$_POST['grupo'].'&modo=1'; 
      $username = 'vicent';
      $password = '1vsc965ONTI';     
      $context = stream_context_create(array (
        'http' => array (
          'header' => 'Authorization: Basic ' . base64_encode("$username:$password")
        )));     
      $data=file_get_contents($url, false, $context); 
      imp($data);
      echo 'Conseguido'; 
    }
    die;
}

if(isset($_POST['calendario'])){
    $valorGestor=$_POST['gestor'];
    $valorGrupo=$_POST['grupo'];
    $valor=$_POST['valor']??0;
    $territorial=$_POST['territorial']??0;
    $jornada=$_POST['jornada']??1;$ja=$jornada;
    if ($_POST['calendario']==2){
        $file = './json/gestores/'.$valorGestor.'/'.$valorGrupo.'-activa.json';
        $j['activa']=$_POST['jActiva'];
        guardarJSON($j, $file); 
        $valor=1;$ja=$j['activa'];
    }
    $fp = './json/gestores/'.$valorGestor.'/'.$valorGrupo.'-partidos.json';      
    if ($valor==1){
      
         $json = file_get_contents($fp);
         $dCal = json_decode($json, true);
         $jornadas=count($dCal);
         
         if (isset($_POST['ep'])){

          foreach ($_POST['ep'] as $k => $value) {
               $dCal[($jornada-1)][$k]['estado_partido']=$_POST['ep'][$k];
               $dCal[($jornada-1)][$k]['goles_local']=$_POST['gl'][$k];
               $dCal[($jornada-1)][$k]['goles_visitante']=$_POST['gv'][$k];
               $dCal[($jornada-1)][$k]['fecha']=$_POST['fecha'][$k];
               $dCal[($jornada-1)][$k]['hora']=$_POST['hora'][$k];

               $loc=explode(',',$_POST['local_id'][$k]);
               $vis=explode(',',$_POST['visitante_id'][$k]);

               $dCal[($jornada-1)][$k]['local_id']=$loc[0]??0;
               $dCal[($jornada-1)][$k]['visitante_id']=$vis[0]??0;
               $dCal[($jornada-1)][$k]['local']=$loc[1]??'';
               $dCal[($jornada-1)][$k]['visitante']=$vis[1]??'';
           }
           guardarJSON($dCal, $fp);
         }



         $clas=array(
                'jornada' => $jornada,
                'grupo_id' => $valorGrupo,
                'jornadas' => $jornadas,
                'puntosPorganar' => 3,
                'partidos' => $dCal,
                'gestor_id' => $valorGestor,
                );
         $clasificacion=aClasificacion($clas);
         $txtp1='Editando...';$txtp2='Editar';$txt2='Editando';
         $fe='./json/gestores/'.$valorGestor.'/'.$valorGrupo.'-equipos.json';
         $json = file_get_contents($fe);
         $dEq = json_decode($json, true); 

         $fq='./panelBack/federacion/'.$territorial.'/equipos/'.$valorGrupo.'-equipos.json';
         $json = file_get_contents($fq);  //saca los equipos con su id de club
         $eqC = json_decode($json, true); //saca los equipos con su id de club
         echo '<h3 style="color:white">Cambios realizados correctamente. '.date('h:i:s A').'</h3>';

         
         include 'forms/formCalendario.php';
         include 'forms/formClasi.php';
         die;

    } else { //if valor=0

      
      
      $datos=array();$contador=0;
      foreach($_POST['jornada'] as $k =>  $v) {        
        foreach ($v as $k1 => $v1) {
            $datos[$k][$k1]['jornada']=$v1;
            $datos[$k][$k1]['hora']='00:00';
            $datos[$k][$k1]['goles_local']='0';
            $datos[$k][$k1]['goles_visitante']='0';
            $datos[$k][$k1]['estado_partido']='0';
        }  
      } 
      foreach($_POST['fecha'] as $k =>  $v) {        
        foreach ($v as $k1 => $v1) {
            $datos[$k][$k1]['fecha']=$v1;
        }  
      } 
      foreach($_POST['local_id'] as $k =>  $v) {        
        foreach ($v as $k1 => $v1) {
            $datos[$k][$k1]['local_id']=$v1;
        }  
      } 
      foreach($_POST['visitante_id'] as $k =>  $v) {        
        foreach ($v as $k1 => $v1) {
            $datos[$k][$k1]['visitante_id']=$v1;
        }  
      } 
      foreach($_POST['local'] as $k =>  $v) {        
        foreach ($v as $k1 => $v1) {
            $datos[$k][$k1]['local']=$v1;
        }  
      } 
      foreach($_POST['visitante'] as $k =>  $v) {        
        foreach ($v as $k1 => $v1) {
            $datos[$k][$k1]['visitante']=$v1;
        }  
      }   
      guardarJSON($datos, $fp);
      echo 'ok';
      die;
    }
}


if(isset($_POST['equipo'])){    
  $datos=array();$contador=0;
  foreach($_POST['equipo'] as $k =>  $v) {        
    $datos[$contador]['id']=$k;
    $datos[$contador]['equipo']=$v;
    $contador++;     
  } 
  $file = './json/gestores/'.$_POST['gestor'].'/'.$_POST['grupo'].'-equipos.json';
  guardarJSON($datos, $file);
  echo 'ok';
  die;
}



if(isset($_POST['m'])){
    //si gestor_id=0 veremos los gestores del torneo o lo ofrecemos al visitante
    if ($_POST['m']=='t-a'){ torneoListado($_POST['torneo_id'],$_POST['gestor_id'],0); }
    if ($_POST['m']=='t-q'){ torneoListado($_POST['torneo_id'],$_POST['gestor_id'],1); header('Location: /mifutbol.php'); }    
    die;
}



if (isset($_POST['email'])){

    function validar_email(string $texto): bool {
        return (filter_var($texto, FILTER_VALIDATE_EMAIL) === FALSE) ? False : True;
    }
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $email=trim($email);

    if (!validar_email($email)) { 
        echo 'El campo de Email tiene un formato no válido.';
    } else {
        $correo=0;$usuario=0;
        $r=aRegAcces($email,$_POST['password']);
        $correo=$r['correo'];
        $usuario=$r['usuario'];
        $nombre=$r['nombre'];
        $tw=$r['tw'];

        if ($correo==0){
            if ($usuario>0){ echo 'Se ha enviado un email a la cuenta de correo '.$email.' con el fin de completar el registro. Accede a dicha cuenta y pulsa en el enlace que se te ha enviado para completar la activación';} else { echo 'Problemas de registro. Contacta con el administrador (futbolme@futbolmecom).';}
        } else {
            if ($usuario==0){ echo 'El password proporcionado no es el correcto para este usuario ('.$email.').';} 
        }
    }

    if ($correo==1 && $usuario>0){
        $_SESSION['gestor_id']=$usuario;
        $_SESSION['gestor']=$email;
        $_SESSION['nombreGestor']=$nombre;
        $_SESSION['twGestor']=$tw;
        echo 'ok'; die;
    } else { die; }
    
}

$user_id=$_SESSION['gestor_id']??0;

if (isset($_POST['comunidad_id'])){
    $torneos=aTorneosFederacion($_POST['comunidad_id']);
    $n=''; $contador=0;    
    foreach ($torneos as $key => $value) {
        if ($value['nombre']!=$n){ 
            if ($key==0) { ?>
                <h5><?php echo $value['nombre']?></h5>
                <div id="selector<?php echo $contador?>"></div>
                <select name='selector<?php echo $contador?>' onchange="aAgregarTorneo(this.value,<?php echo $user_id?>,<?php echo $contador?>)">
                    <option value="0">Selecciona torneo</option>
            <?php } else { ?>
                </select><br /><h5><?php echo $value['nombre']?></h5>
                <div id="selector<?php echo $contador?>"></div>
                <select name='selector<?php echo $contador?>' onchange="aAgregarTorneo(this.value,<?php echo $user_id?>,<?php echo $contador?>)">
                    <option value="0">Selecciona torneo</option>
            <?php }
            } ?>
        <option value="<?php echo $value['id']?>"><?php echo $value['nombreGrupo']?> (<?php echo $value['gestiones']?>)</option>
        <?php $n=$value['nombre'];$contador++;
    } ?>
    </select>
    <hr />
<?php die; }
