<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.tiny.cloud/1/19zd7p7vtknhuabp6t9luepr21o7okuaowymhu163mtaelsk/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<?php
session_start();

if (!isset($_SESSION['id'])){ echo 'No tiene permisos para acceder a esta página'; die(); }

include 'config.php';
$mysqli=$link;



$id_usuario=$_POST['id_usuario']??0;
$co=$_POST['co']??0;
$div=$_POST['div']??0;
$t=$_POST['t']??0;
$l=$_POST['l']??0;
$vis=$_POST['vis']??0;
$p=$_POST['p']??0;

//var_dump($_POST);

if ($id_usuario>1000){ $id_usuario=($id_usuario-1000); }

if ($id_usuario>0){
    $sql='SELECT email FROM usuario WHERE id='.$id_usuario;
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
    echo 'Noticias de '.$r['email'].' ('.$id_usuario.')<br />';
    $email_usuario=$r['email'];
}

if ($co>0){
    $sql='SELECT nombre FROM comunidad WHERE id='.($co+1);
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
    echo 'Noticia para '.$r['nombre'].'<br />';
}

if ($t>0){
    $sql='SELECT nombre FROM temporada WHERE id='.$t;
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $r = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
    echo 'Noticia de '.$r['nombre'].'<br />';
}

if ($l>0){
    $sql='SELECT nombre FROM equipo WHERE id='.$l;
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $rl = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
    echo 'Noticia del '.$rl['nombre'].'<br />';
}

if ($vis>0){
    $sql='SELECT nombre FROM equipo WHERE id='.$vis;
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $rv = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
    echo 'Noticia del '.$rv['nombre'].'<br />';
}



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
        //var_dump($_POST);
        $t=$_POST['t']??0;
        $l=$_POST['l']??0;
        $vis=$_POST['vis']??0;
        $co=$_POST['co']??0;
        $div=$_POST['div']??0;
        $id_usuario=$_POST['id_usuario']??0;
        $p=$_POST['p']??0;
        $portada=$_POST['portada']??1;
        $posicion=$_POST['posicion']??0;
        $titular=$_POST['titular']??'';
        $contenidoNoticia=$_POST['contenidoNoticia']??'';
        $contenidoNoticia = str_replace('="../static/', '="/static/', $contenidoNoticia);
        $usuario=$_SERVER['PHP_AUTH_USER']??'-';

        if (isset($_POST['publicar'])){
            /*$sql='INSERT INTO noticias(id_temporada, id_partido, id_local, id_visitante, portada, posicion, titulo, descripcion,usuario) VALUES ('.$t.',"'.$p.'","'.$l.'","'.$vis.'","'.$portada.'","'.$posicion.'","'.$titular.'","'.$contenidoNoticia.'","'.$usuario.'")';*/

            $sql="INSERT INTO noticias(id_temporada, id_partido, id_local, id_visitante,id_comunidad, id_division, id_usuario, portada, posicion, titulo, descripcion,usuario, estado) VALUES ('".$t."','".$p."','".$l."','".$vis."','".$co."','".$div."','".$id_usuario."','".$portada."','".$posicion."','".$titular."','".$contenidoNoticia."','".$usuario."',0)";
            echo $sql;
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


            $sql="UPDATE noticias SET titulo='".$titular."',
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


$portada=$portada??1;
$posicion=$posicion??1;
$titular=$titular??'';
$contenidoNoticia=$contenidoNoticia??'';

if ($portada==1){ $s1='selected'; $s0=''; } else { $s1=''; $s0='selected';}

//var_dump($_SESSION);

?>

    <div id="mensaje"></div>

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
    <form  method="post" action="editor2.php">
        <input type="hidden" name="t" value="<?php echo $t?>" class="form-control">
        <input type="hidden" name="l" value="<?php echo $l?>" class="form-control">
        <input type="hidden" name="vis" value="<?php echo $vis?>" class="form-control">
        <input type="hidden" name="p" value="<?php echo $p?>" class="form-control">
        <input type="hidden" name="co" value="<?php echo $co?>" class="form-control">
        <input type="hidden" name="div" value="<?php echo $div?>" class="form-control">
        <input type="hidden" name="id_usuario" value="<?php echo $id_usuario?>" class="form-control">
        <input type="hidden" name="portada" value="0" class="form-control">
        <input type="hidden" name="posicion" value="0" class="form-control">
        <div class="form-group">
            
            <label for="titular">Titular </label>
            <input type="text" class="form-control" name="titular" id="titular" placeholder="Titular" value="<?php echo $titular?>" required>
        </div>
         
        <div class="form-group">
            <label for="contenidoNoticia" style="width: 50%">Contenido noticia</label>
            <br />
            <textarea name="contenidoNoticia" id="contenidoNoticia" cols="100" rows="20" required>
                <?php 
                $contenidoNoticia = str_replace('="/static/', '="../static/', $contenidoNoticia);
                echo $contenidoNoticia?>
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

<td valign="top" align="left">
    <h3>Tus noticias</h3>
    <?php if (isset($_POST)) { ?>
        <div class="marco" style="background-color: lavender; clear:both">
        <h3><?php echo $titular?></h3>
        <?php echo $contenidoNoticia?>
        </div>
    <?php } 
    
    $campos='id,titulo,fecha,portada,posicion';
    $sql='SELECT '.$campos.' FROM noticias WHERE id_usuario='.$_SESSION['id'].' ORDER BY fecha DESC';
        $resultadoSQL = mysqli_query($mysqli, $sql);
        $temporadaN = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

        //echo $sql;
        
        foreach ($temporadaN as $key => $v) { ?>
            <div class="marco" id="noticia-<?php echo $v['id']?>" style="clear:both">

            <table><tr>
                <td style="font-size: 13px"><?php echo $v['fecha']?></td>
                <td style="font-size: 13px"><?php echo $v['posicion']?></td>
                <td style="font-size: 13px">
                <?php if ($v['portada']==1){
                        if (substr($v['fecha'],0,10)==date('Y-m-d')) { echo '<b>V</b>'; } else { echo 'P'; }
                      } else { echo '-';}?>
                </td>
                <td style="font-size: 13px">
            <form  method="post" onclick="editor(event, this.serialize())" id="editor-<?php echo $v['id']?>">
              <input type="hidden" name="id" value="<?php echo $v['id']?>">
              <input type="hidden" name="modificar" value="1">
              <input type="submit" name="enviar" value="<?php echo $v['titulo']?>" />
              </form></td>
          </tr></table>
        </div>

        <?php }
    
?>


</td>


</tr></table>
<script>
    tinymce.init({
    selector: 'textarea',
    plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker image',
    toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table image',
    toolbar_mode: 'floating',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name'
    });
</script>
</body>
</html>