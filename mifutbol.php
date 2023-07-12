<?php 
define('_FUTBOLME_', 1);


require_once 'src/config.php';
require_once 'src/mifutbol/funciones.php';

if (isset($_GET['u'])){
    if (isset($_GET['m'])){
        $usuario=aActivarUser($_GET['u'],$_GET['m']);
        if ($usuario==0){ 'Problema de autentificación'; die; }
        $mail=$_GET['m'];
        $_SESSION['gestor_id']=$usuario;
        $_SESSION['gestor']=$mail;
        header('Localhost:/mifutbol.php?');
    } else {
        $_SESSION['gestor_id']=null;
        $_SESSION['gestor']=null;
        echo '<a href="/mifutbol.php">Pulsa para continuar</a>';die;
    }
    
}

/**/

require_once 'src/mifutbol/post.php';

$titulo = 'MiFutbol, el gestor de ligas para el usuario de futbolme.com';
$metaDescripcion = 'Todas las ligas y todas las categorías del fútbol español - Futbolme.com ';

require_once 'includes/head.php'; ?>

	<title><?php echo $titulo; ?></title>

</head>
<?php require_once 'includes/contenedorSup.php'?>
<div class="col-xs-12 whitebox nopadding">    
    <div class="clear col-xs-12 one-bordergrey-vert text-center">
<?php if(isset($_GET['g']) && isset($_GET['gr'])){ 
     
        $f = 'json/gestores/'.$_GET['g'].'/torneos.json';
        if (@file_exists($f)) {
        $json = file_get_contents($f);$torneos = json_decode($json, true);
        $gestor=$torneos[0]['user']??'';
        echo '<h3>Torneos gestionados por <span style="color:maroon">'.$gestor.'</span></h3>';
        } else { $torneos=array(); } ?>
        <div style="overflow: auto; max-height: 300px">
            <table width="100%">
                <?php foreach ($torneos as $key => $value) {
                    $colorFila='white';
                    if ($value['estado']==0){ continue; }
                    if ($_GET['gr']==0){ $_GET['gr']=$value['grupo'];}
                    if ($_GET['gr']==$value['grupo']) { $activo=$value; $colorFila='#D6EAF8'; }?>
                    <tr style="border:solid; background-color: <?php echo $colorFila?>">
                        <td><?php echo nComunidad($value['comunidad_id'])?>
                            <br /><?php echo nCTorneo($value['categoria_torneo_id'])?>
                        </td>                        
                        <td><?php echo $value['nombre']?><br />
                            <?php echo nCEquipo($value['categoria_id'])?>
                        </td>
                        <td align="center"><?php echo $value['nombreGrupo']?><br />
                        <?php if ($colorFila=='white'){ ?>
                        <a href="?g=<?php echo $_GET['g']?>&gr=<?php echo $value['grupo']?>">Ver</a>
                        <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    <div class="pull-right"><a href="/mifutbol.php">Volver a Mi fútbol</a></div>
    <?php
    if ($_GET['gr']==0){
        echo 'Sin torneos<hr />';
    } else {
        if (isset($activo)){
        echo '<hr /><h4>'.$activo['nombre'].' - '.$activo['nombreGrupo'].'</h4>';
        require_once 'src/mifutbol/vista.php'; //vista de la página del torneo
        } else {
            echo 'Sin torneos activados.<hr />';
        }
    }
    
} else { ?>

	<h1 class="text-center">Elige la liga que quieres gestionar y compartir con el resto de usuarios</h1>
    <div class="marco clear">
        <?php if (isset($_SESSION['gestor_id']) && $_SESSION['gestor_id']>0){ ?>
            <span class="pull-left"><?php echo $_SESSION['gestor_id']?>
             - <?php echo $_SESSION['gestor']?>
             - <span  class="boldfont" title="Editar cuenta" onclick="verFormCuenta()" style="cursor:pointer; color: navy"><?php echo $_SESSION['nombreGestor']?></span>   
             </span>
            &nbsp;&nbsp;&nbsp;<a href="?u=0">Salir</a>
            <div  class="celestebox pull-right" id="formCuenta" style="display: none; padding: 30px">
        <form name="entrada" method="post" onsubmit="regCuenta(event, $(this).serialize())">
         <input type="hidden" name="cuenta" value="1" />
         <input type="hidden" name="gestor_id" value="<?php echo $_SESSION['gestor_id']?>" />
        <span style="color:white">Nombre: </span><input type="text" name="nombreGestor" value="<?php echo $_SESSION['nombreGestor']?>" required />
        <br />
        <span style="color:white">Twitter: </span><input type="text" name="twGestor" value="<?php echo $_SESSION['twGestor']?>" /><br />
        <p style="color:white">Si dispones de twitter y quieres que tus twitts aparezcan en tus torneos, introducelo aquí.</p>
        <button type="submit" name="register">Modificar</button><hr />
        <p style="color:white">Para cambiar el email asociado a tu cuenta, contacta con el administrador (futbolme@gmail.com)</p>
        
        </form></div>
                     
        
        <?php } else { ?>
            <span  class="boldfont pull-right" onclick="verFormGestor()" style="cursor:pointer; color: navy">Regístro/acceso como gestor</span>
        <?php } ?>
        
        <div  class="celestebox pull-right" id="formReg" style="display: none"><form name="entrada" method="post" onsubmit="regGestor(event, $(this).serialize())">
        <input type="text" name="email" placeholder="Email" required />
        <input type="password" name="password" placeholder="Password (maximo 8 caracteres)" maxlength="8" required /><br />
        <button type="submit" name="register">Registro/Acceso</button>
        </form></div>
        <div id="mensajeGestor"></div>
    
        <div id="torneosSalto" class="h40 clear"><div class="h40"></div></div>
        <div id="torneos" class="col-xs-12">
            <?php if (isset($_SESSION['gestor_id'])){ 
                $f = './json/gestores/'.$_SESSION['gestor_id'].'/torneos.json';
                if (@file_exists($f)) { 
                    $json = file_get_contents($f);
                    $datos = json_decode($json, true);                
                    include 'src/mifutbol/torneos.php';
                }
            } ?>
        </div> 
    </div>
    <?php if (isset($totalPasos) && $totalPasos>0){ $display='none'; } else { $display='block';} ?>    
    <div class="clear"></div>
    <div class="col-xs-12 nopadding">
    <div class="col-xs-8 celestebox">
        <h2 class="text-center" style="color:white">COMUNIDADES</h2>
        <table class="table whitebox text-center" style="display: <?php echo $display?>; width: 100%" id='tablaComunidades' bgcolor="gainsboro">
        <tr><td style="width: 33%">Galicia</td>
            <td style="width: 33%">Asturias</td>
            <td style="width: 33%">Cantabria</td>
        </tr>
        <tr><td colspan="3"></td></tr>
        <tr><td>Euskadi</td>
            <td>
            <form method="post" onsubmit="submitComunidad(event, $(this).serialize(),2,5)">
            <input type="hidden" name="comunidad_id" value="5" >
            <input type="submit" name="cambiar" value="Cataluña">
            </form>
            </td>
            <td>Com. Valenciana</td>
        </tr>        
        <tr><td colspan="3"><div id="fila2"></div></td></tr>
        <tr><td>Com. Madrid</td>
            <td>Castilla y León</td>
            <td>Andalucia</td>
        </tr>
        <tr><td colspan="3"></td></tr>
        <tr><td>Baleares</td>
            <td>Canarias</td>
            <td>Reg. Murcia</td>
        </tr>
        <tr><td colspan="3"></td></tr>
        <tr><td>Extremadura</td>
            <td>Navarra</td>
            <td>La Rioja</td>
        </tr>
        <tr><td colspan="3"></td></tr>
        <tr><td>Aragón</td>
            <td>Castilla La Mancha</td>
            <td>Ceuta y Melilla</td>
        </tr>
        <tr><td colspan="3"></td></tr>
        
    </table>
        
    </div>
    <div class="col-xs-4 celestebox">
        <h2 class="text-center" style="color:white">GESTORES</h2>
        <table class="table whitebox text-center" style="display: <?php echo $display?>; width: 100%" id='tablaComunidades' bgcolor="gainsboro">
        <?php  $users=aUsuariosTorneos();
        foreach ($users as $key => $value) { ?>
            <tr><td><a href="?gr=0&g=<?php echo $value['id']?>"><?php echo $value['user']?> (<?php echo $value['torneos']?> torneos)</a></td></tr>
        <?php } ?>
        </table>
    </div>
    </div>
<?php } ?>   
    </div>
</div>
<?php 
$_SESSION['app'] = 1;
require_once 'includes/contenedorInf.php';
$_SESSION['app'] = 0;
require_once 'src/mifutbol/ajax.php'; 

?>


