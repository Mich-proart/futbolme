<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.tiny.cloud/1/19zd7p7vtknhuabp6t9luepr21o7okuaowymhu163mtaelsk/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <?php
define('_PANEL_', 1);
require_once 'includes/config.php';

include '../../src/Application/Helpers/DbHelper.php';

/*
<select name="tipoUrl" id="tipoUrl">
    <option<?php if ($tipoUrl == 'torneo') { ?> selected="selected"<?php } ?> value="torneo">Torneo</option>
    <option<?php if ($tipoUrl == 'equipo') { ?> selected="selected"<?php } ?> value="equipo">Equipo</option>
    <option<?php if ($tipoUrl == 'partido') { ?> selected="selected"<?php } ?> value="partido">Partido</option>
</select>
*/


//imp($_POST);

$id_usuario=$_POST['id_usuario']??0;
$co=$_POST['co']??0;
$div=$_POST['div']??0;
$t=$_POST['t']??0;
$l=$_POST['l']??0;
$vis=$_POST['v']??0;
$p=$_POST['p']??0;



echo '<table><tr><td valign="top">';

if ($id_usuario>1000){ $id_usuario=($id_usuario-1000); }

if ($id_usuario>0){
    $sql='SELECT email FROM usuario WHERE id='.$id_usuario;
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
    echo 'Noticias de '.$r['email'].'<br />';
    $email_usuario=$r['email'];
}

if ($co>0){
    $sql='SELECT nombre FROM comunidad WHERE id='.($co+1);
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
    echo 'Noticias de '.$r['nombre'].'<br />';
}

if ($t>0){
    $sql='SELECT nombre FROM temporada WHERE id='.$t;
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
    $nombreTorneo=$r['nombre'];
    echo 'Noticia para '.$nombreTorneo.'<br />';
}

if ($l>0){
    $sql='SELECT nombre FROM equipo WHERE id='.$l;
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $rl = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
    $local=$rl['nombre'];
    echo 'Noticia de '.$local.'<br />';
}

if ($vis>0){
    $sql='SELECT nombre FROM equipo WHERE id='.$vis;
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $rv = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
    $visitante=$rv['nombre'];
    echo 'Noticia del '.$visitante.'<br />';
}

if ($p>0){
    
    echo 'Noticia del partido '.$rl['nombre'].' - '.$rv['nombre'].'<br />';
}

if (!isset($_POST['titular'])){

    $etiquetas=' Etiquetas: ';
    echo '</td><td style="width:30px"></td><td valign="top">';

    if ($t>0){$url = generaUrl('torneo', $t);echo $url . '<br />'; $etiquetas.=' -> <a href="'.$url.'">'.$nombreTorneo.'</a>'; }

    if ($l>0){$url = generaUrl('equipo', $l);echo $url . '<br />'; $etiquetas.=' -> <a href="'.$url.'">'.$local.'</a>';}

    if ($vis>0){$url = generaUrl('equipo', $vis);echo $url . '<br />'; $etiquetas.=' -> <a href="'.$url.'">'.$visitante.'</a>';}

    if ($p>0){$url = generaUrl('partido', $p);echo $url . '<br />'; $etiquetas.=' -> <a href="'.$url.'">Enfrentamientos</a>';}
}

echo '</td></tr></table>';

//echo 'id_usuario='.$id_usuario;

if (isset($_POST['modo'])){
    $sql='DELETE FROM noticias WHERE id='.$_POST['id'];
    mysqli_query($mysqli, $sql);
    die;
}

if (isset($_GET['h'])){
    $sql='SELECT n.id, n.id_temporada, (select nombre from temporada where id=n.id_temporada) nombreT, n.id_partido, n.id_local, (select nombreCorto from equipo where id=n.id_local) local, n.id_visitante, (select nombreCorto from equipo where id=n.id_visitante) visitante,n.portada, n.posicion, n.titulo, n.descripcion, n.fecha FROM noticias n ORDER BY n.fecha DESC';
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $noticias = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
}

if (isset($_GET['editores'])){
    $sql='SELECT u.id, u.username, u.enabled, u.username_canonical, u.email, u.password, (select count(id) from noticias where id_usuario=u.id) noticias FROM usuario u WHERE u.enabled<1 ORDER BY u.username';
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $editores = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    $id=$_GET['id']??0;
    
    if ($id>0){ 
        foreach ($editores as $k => $v) {
            if($id==$v['id']){ $editor=$v; break; }
        }
        include 'editorGestion.php'; 
    }
}
?>


    <div id="mensaje"></div>
<?php 

$modo='';

if (isset($_POST['titular']) || isset($_POST['modificar'])){
        
        if(isset($_POST['modificar'])){
            $sql='SELECT id_temporada t, id_partido p, id_local l, id_visitante vis, portada, posicion, titulo titular, descripcion contenidoNoticia FROM noticias WHERE id='.$_POST['id'];
            //echo $sql;
            
            $resultadoSQL = mysqli_query($mysqli, $sql);
            $r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
            $_POST=array_merge($_POST, $r);
        }
        //imp($_POST);
        $t=$_POST['t']??0;
        $l=$_POST['l']??0;
        $vis=$_POST['v']??0;
        $co=$_POST['co']??0;
        $div=$_POST['div']??0;
        $id_usuario=$_POST['id_usuario']??0;
        $p=$_POST['p']??0;
        $portada=$_POST['portada']??1;
        $posicion=$_POST['posicion']??0;
        $titular=$_POST['titular']??'';
        $contenidoNoticia=$_POST['contenidoNoticia']??'';
        $contenidoNoticia = str_replace('../', '/', $contenidoNoticia);
        //$contenidoNoticia = str_replace('="../static/', '="/static/', $contenidoNoticia);
        $usuario=$_SERVER['PHP_AUTH_USER']??'-';

        if (isset($_POST['publicar'])){
            /*$sql='INSERT INTO noticias(id_temporada, id_partido, id_local, id_visitante, portada, posicion, titulo, descripcion,usuario) VALUES ('.$t.',"'.$p.'","'.$l.'","'.$vis.'","'.$portada.'","'.$posicion.'","'.$titular.'","'.$contenidoNoticia.'","'.$usuario.'")';*/

            $sql="INSERT INTO noticias(id_temporada, id_partido, id_local, id_visitante,id_comunidad, id_division, id_usuario, portada, posicion, titulo, descripcion,usuario) VALUES ('".$t."','".$p."','".$l."','".$vis."','".$co."','".$div."','0','".$portada."','".$posicion."','".$titular."','".$contenidoNoticia."','".$usuario."')";
            //echo $sql;
                if (mysqli_query($mysqli, $sql)) {echo '<h1>Noticia grabada</h1>';}
                $modo='insertar noticia';
        } 

        if (isset($_POST['corregir'])){

            /*$sql='UPDATE noticias SET id_temporada="'.$t.'",
            id_partido="'.$p.'",
            id_local="'.$l.'",
            id_visitante="'.$vis.'",
            portada="'.$portada.'",
            posicion="'.$posicion.'",
            titulo="'.$titular.'",
            descripcion="'.$contenidoNoticia.'" WHERE id='.$_POST['id'];
                if (mysqli_query($mysqli, $sql)) {echo '<h1>Noticia editada</h1>';}
            echo $sql;*/


            $sql="UPDATE noticias SET id_temporada='".$t."',
            id_partido='".$p."',
            id_local='".$l."',
            id_visitante='".$vis."',
            id_comunidad='".$co."',
            id_division='".$div."',
            id_usuario='0',
            portada='".$portada."',
            posicion='".$posicion."',
            titulo='".$titular."',
            descripcion='".$contenidoNoticia."' WHERE id=".$_POST['id'];
                if (mysqli_query($mysqli, $sql)) {echo '<h1>Noticia editada</h1>';}
            //echo $sql;

                $modo='corregir noticia';
        }

        if ($id_usuario>0){

            $from='futbolme@futbolme.com';
            $to='futbolme@gmail.com';
            $subject='Noticia de '.$email_usuario-' modo='.$modo;
            $message=$portada.'<br />'.$contenidoNoticia;
            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-type: text/html; charset=utf8';
            // Additional headers
            $headers[] = 'From: '.$from; 
            mail($to,$subject,$message,implode("\r\n", $headers));

        }


} /*else {

    $t=$_GET['t']??0;
    $l=$_GET['l']??0;
    $vis=$_GET['v']??0;
    $co=$_GET['co']??0;
    $div=$_GET['div']??0;
    $id_usuario=$_GET['id_usuario']??0;
    $p=$_GET['p']??0;
    

}*/

if (isset($_GET['t'])){ $t=$_GET['t']; }


$portada=$portada??1;
$posicion=$posicion??1;
$titular=$titular??'';
$contenidoNoticia=$contenidoNoticia??'';

if ($portada==1){ $s1='selected'; $s0=''; } else { $s1=''; $s0='selected';}

?>
<table class="table">
    <?php if (isset($_GET['h'])){ ?>
        <tr><td colspan="2">
            <table class="table">
                <?php foreach ($noticias as $k => $v) {?>
                    <tr><td><?php echo $v['id']?></td><td><?php echo $v['fecha']?></td><td><?php echo $v['portada']?></td><td><?php echo $v['posicion']?></td><td title="<?php echo $v['nombreT']?>"><?php echo $v['id_temporada']?></td><td><?php echo $v['local']?></td><td><?php echo $v['visitante']?></td><td><?php echo $v['id_partido']?></td><td title="<?php echo $v['descripcion']?>"><?php echo $v['titulo']?></td></tr>
                <?php } ?>
            </table>
        </td></tr>
    <?php } ?>
    <tr><td valign="top">
<div style="width: 700px; padding: 20px">
    <form  method="post" onsubmit="editor(event, this.serialize())" id="editor">
        <input type="hidden" name="t" value="<?php echo $t?>" class="form-control">
        <input type="hidden" name="l" value="<?php echo $l?>" class="form-control">
        <input type="hidden" name="v" value="<?php echo $vis?>" class="form-control">
        <input type="hidden" name="p" value="<?php echo $p?>" class="form-control">
        <input type="hidden" name="co" value="<?php echo $co?>" class="form-control">
        <input type="hidden" name="div" value="<?php echo $div?>" class="form-control">
        <input type="hidden" name="id_usuario" value="<?php echo $id_usuario?>" class="form-control">
        <div class="form-group">
            <table><tr><td>
            <label for="titular">Titular </label>
        </td>
        <?php if ($id_usuario>0){ ?>
                <input type="hidden" name="portada" value="-1" class="form-control">
            <?php } else { ?>

                <td>En portada: </td><td><select name="portada" class="form-control">
                <option value="1" <?php echo $s1?>>si</option>
                <option value="0" <?php echo $s0?>>no</option>
                    </elect>
                </td>

            <?php } ?>
       
        <td>posicion: </td><td>
            <select name="posicion" class="form-control">
                <option value="0" <?php if ($posicion==0) { echo 'selected'; }?>>0</option>
                <option value="1" <?php if ($posicion==1) { echo 'selected'; }?>>1</option>
                <option value="2" <?php if ($posicion==2) { echo 'selected'; }?>>2</option>
                <option value="3" <?php if ($posicion==3) { echo 'selected'; }?>>3</option>
                <option value="4" <?php if ($posicion==4) { echo 'selected'; }?>>4</option>
                <option value="5" <?php if ($posicion==5) { echo 'selected'; }?>>5</option>
            </select>
        </td>


        </tr></table>
            <input type="text" class="form-control" name="titular" id="titular" placeholder="Titular" value="<?php echo $titular?>" required>
        </div>
         
        <div class="form-group">
            <label for="contenidoNoticia" style="width: 50%">Contenido noticia</label>
            
            <br />
            <textarea name="contenidoNoticia" id="contenidoNoticia" cols="100" rows="20" required>
                <?php 

                $contenidoNoticia = str_replace('../', '/', $contenidoNoticia);

                echo $contenidoNoticia."\r\n".$etiquetas?>
            </textarea>
        </div>

        <div class="form-group">
            <?php if (isset($_POST['id'])){ ?>
                    <input type="hidden" name="id" value="<?php echo $_POST['id']?>" class="form-control">
                    <input type="submit" class="btn btn-block btn-success col-xs-6" name="visualizar" value="visualizar noticia">
                    <input type="submit" class="btn btn-block btn-success col-xs-6" name="corregir" value="Modificar noticia">
             <?php } else { ?>
                    <input type="submit" class="btn btn-block btn-success col-xs-6" name="visualizar" value="visualizar noticia">
                <?php if (isset($_POST['visualizar'])){ ?>
                    <input type="submit" class="btn btn-block btn-success col-xs-6" name="publicar" value="Publicar noticia">
                <?php } ?>
            <?php } ?>
        </div>
    </form>
</div>
</td>

<td valign="top">
    <?php if (isset($_GET['editores'])){ ?>
        <table>
        <?php foreach ($editores as $k => $v) { 

            $n=explode(' ', $v['username_canonical']);
            if (isset($_GET['id']) && $_GET['id']==$v['id']){ continue; }?>
        <tr><td><?php echo $v['id']?></td><td><?php echo $v['username']?></td><td><?php echo $v['enabled']?></td>
            <td><?php echo $v['username_canonical']?></td><td><?php echo $v['email']?></td>
            <td><?php echo $v['password']?></td><td><?php echo $v['noticias']?></td>
            <td><a href="?editores=1&id=<?php echo $v['id']?>">Email</a></td>
            <td><a href="https://wa.me/34<?php echo $v['password']?>?text=Hola <?php echo $n[0]?>, soy Vicent Sanchis de futbolme.com. Te he enviado un e-mail a tu correo <?php echo $v['email']?>. Por favor comprueba que te ha llegado correctamente. No olvides comprobar la carpeta spam de tu cuenta." target="_blank">Whats</a></td>
        </tr>
        <?php } ?>
        </table>
    <?php } ?>

    <?php if ($t<0){ ?>
        <table><tr><td>
            <a onclick="subirFichero('ivan',0)" style="cursor:pointer;" class="boldfont">subir imagen</a>
             ruta: ../static/img/camponeutral/xxxx.xxx<br />
             <div id="subir-fichero-0"></div>
        </td>
        <td>
            <?php 
            $path='../static/img/camponeutral';
            $dir = opendir($path);?>
            <div style="width: 300px; height: 150px; overflow: auto; float:right; background-color: lavender">
            <?php while ($elemento = readdir($dir)){
                if( $elemento != "." && $elemento != ".."){
                    if( !is_dir($path.$elemento) ){
                        echo "<br />". $elemento;
                    } 
                }
            } ?></div>
        </td></tr></table>
    <?php } ?>


<?php 


if ($id_usuario==0){ ?>
    <span class="pull-right"><a href="?h=1">Histórico de noticias</a></span>
    - <span class="pull-right"><a href="?editores=1">Editores</a></span>
    <?php if (isset($_POST)) { ?>
        <div class="marco" style="background-color: lavender; clear:both">
        <h3><?php echo $titular?></h3>
        <?php echo $contenidoNoticia?>
        </div>
    <?php } 
    $temporadaN=array();$localN=array();$visitanteN=array();$partidoN=array();
    $campos='id,titulo,fecha,portada,posicion';

    if ($t==-1){
        $sql='SELECT '.$campos.' FROM noticias WHERE id_temporada='.$t.' ORDER BY fecha DESC';
        $resultadoSQL = mysqli_query($mysqli, $sql);
        $temporadaN = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
        echo '<h3>Editor de Iván</h3>';
        foreach ($temporadaN as $key => $v) { include 'editorInc.php'; }
    }

    if ($p>0){
        $sql='SELECT '.$campos.' FROM noticias WHERE id_partido='.$p.' ORDER BY fecha DESC';
        $resultadoSQL = mysqli_query($mysqli, $sql);
        $partidoN = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
        echo '<h3>Noticias del partido - id='.$p.'</h3>';
        foreach ($partidoN as $key => $v) { include 'editorInc.php'; }
    } else {

        if ($t>0){
        $sql='SELECT '.$campos.' FROM noticias WHERE id_temporada='.$t.' ORDER BY fecha DESC';
        $resultadoSQL = mysqli_query($mysqli, $sql);
        $temporadaN = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
        echo '<h3>Noticias por temporada - id='.$t.'</h3>';
        foreach ($temporadaN as $key => $v) { include 'editorInc.php'; }
        }

        if ($l>0 && $t==0){
            $sql='SELECT '.$campos.' FROM noticias WHERE id_local='.$l.' ORDER BY fecha DESC';
            $resultadoSQL = mysqli_query($mysqli, $sql);
            $localN = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
            echo '<h3>Noticias del equipo local - id='.$l.'</h3>';
            foreach ($localN as $key => $v) { include 'editorInc.php'; }
        }

        if ($vis>0 && $t==0){ 
            $sql='SELECT '.$campos.' FROM noticias WHERE id_visitante='.$vis.' ORDER BY fecha DESC';
            $resultadoSQL = mysqli_query($mysqli, $sql);
            $visitanteN = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
            echo '<h3>Noticias del equipo visitante - id='.$vis.'</h3>';
            foreach ($visitanteN as $key => $v) { include 'editorInc.php'; }
        }
    }
} // id_usuario==0?>
</td>


</tr></table>
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: '     autolink lists  media     table    image',
        toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table image undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | outdent indent',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name'
    });
</script>
</body>
</html>
<?php 


require_once 'includes/ajax.php';?>
