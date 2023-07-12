<?php
$static_v = 11; 
define('_FUTBOLME_', 1);
include('../../../src/funciones.php');
include('../../../src/consultas.php'); ?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<link href="/css/bootstrap.min.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/main.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/style.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<noscript><link rel="stylesheet" href="/css/allcss.css?v=<?php echo $static_v; ?>"></noscript>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/js/federacion.js?=<?php echo $static_v; ?>"></script>
</head>
<body>




<?php



$comunidad_id=$_GET['comunidad_id']??5;
require_once 'urlFederaciones.php';

$mysqli=conectar();

if (isset($_GET['modo']) && $_GET['modo']=='quitarE'){
    $sq='DELETE FROM equipo WHERE id='.$_GET['id'];
    mysqli_query($mysqli, $sq);
}

if (isset($_GET['modo']) && $_GET['modo']=='quitarC'){
    $sq='DELETE FROM club WHERE id='.$_GET['id'];
    mysqli_query($mysqli, $sq);
}

if (isset($_POST['actualizo'])){
    $sq='UPDATE equipo SET categoria_id='.$_POST['categoria_id'].',federacion_id='.$_POST['federacion_id'].',codigoRFEF="'.$_POST['codigoRFEF'].'" WHERE id='.$_POST['actualizo'];
    mysqli_query($mysqli, $sq);
    echo $sq.'<br />';
    
}

if (isset($_POST['codigoRFEFclub'])){
    $sq='UPDATE club SET codigoRFEF="'.$_POST['codigoRFEFclub'].'",futbolbase_id='.$_POST['futbolbase_id'].' WHERE id='.$_POST['id'];
    mysqli_query($mysqli, $sq);
    echo $sq.'<br />';
    
}


$sq='SELECT c.id, c.origen_id, c.nombre, c.territorialRFEF, c.codigoRFEF, c.futbolbase_id
FROM club c WHERE c.territorialRFEF="'.$territorial.'" AND c.desaparecido=0 AND (c.origen_id IS NULL or c.origen_id=0) ORDER BY c.codigoRFEF limit 50';



$resultadoSQL = mysqli_query($mysqli, $sq);
$clubs = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);?>
<table>
    <tr>
        <td valign="top">
            <?php echo $urlClub.'<br />';
            $buscar=str_replace('/NFG_VerClub?cod_primaria=1000118&codigo_club=', '/NFG_Clubes?cod_primaria=1000118&Buscar=1&nclub=', $urlClub);
            echo $buscar;
            ?>
            
            <table border="1" bgcolor="orange">
            <?php 
                 foreach ($clubs as $k3 => $c3) { ?>
                    <tr bgcolor="white">
                        <td align="right">
                            <span style="cursor:pointer; color:blue;" onclick="ponerComprobado(<?php echo $c3['id']?>)" title="poner comprobado">
                            <?php echo $c3['id']?></span>  
                            </td>
                        <td align="center" id="comprobado-<?php echo $c3['id']?>"><?php echo $c3['origen_id']?></td>
                        <td><?php echo $c3['nombre']?></td>
                        <td align="center"><?php echo $c3['territorialRFEF']?></td>
                        <td align="center">
                            <form id="eq2-<?php echo $value['id']?>" action="?" method="post">
                                <input type="hidden" name="id" value="<?php echo $c3['id']?>">
                                <input type="text" name="codigoRFEFclub" value="<?php echo $c3['codigoRFEF']?>" size="5" style="text-align: center">
                            <input type="text" name="futbolbase_id" value="<?php echo $c3['futbolbase_id']?>" size="8" style="text-align: right">

                                <input type="submit" name="*" value="*">

                            </form></td>
                        <?php 
                        $equis=array();
                        $carpeta = '../../federacion/'.$territorial.'/equipos/';
                        $f=$carpeta.'futbolbase_'.$c3['futbolbase_id'].'.json';
                        if (@file_exists($f)) {
                            $json = file_get_contents($f);
                            $club = json_decode($json, true);
                            $equi2=$club['equipos'];
                            foreach ($equi2 as $vv2) {
                                $findme   = 'BENJAM';
                                $pos = strpos($vv2['torneo'], $findme);
                                if ($pos > 0) { continue; }
                                $findme   = ' F.S.';
                                $pos = strpos($vv2['torneo'], $findme);
                                if ($pos > 0) { continue; }
                                $findme   = 'BEBE';
                                $pos = strpos($vv2['torneo'], $findme);
                                if ($pos > 0) { continue; }
                                $findme   = 'SALA';
                                $pos = strpos($vv2['torneo'], $findme);
                                if ($pos > 0) { continue; }
                                $findme   = 'ALEVÍ';
                                $pos = strpos($vv2['torneo'], $findme);
                                if ($pos > 0) { continue; }
                                $findme   = 'DEBUTANT';
                                $pos = strpos($vv2['torneo'], $findme);
                                if ($pos > 0) { continue; }
                                $findme   = 'VETERANS';
                                $pos = strpos($vv2['torneo'], $findme);
                                if ($pos > 0) { continue; }

                               $equipo_id=str_replace('/pnfg/NPcd/NFG_VisEquipos?cod_primaria=1000119&Codigo_Equipo=', '', $vv2['url']);
                               $equis[$equipo_id]=$vv2['torneo'];
                            }
                        } ?>

                        

                        <?php
                        $sqE='SELECT e.id, 
                        e.categoria_id, 
                        e.nombre, 
                        e.codigoRFEF, 
                        e.federacion_id, 
                        (select count(p.id) from partido p where p.equipoLocal_id=e.id) partidos,
                        (select count(p.idPartido) from nacionalcalendario p where p.fm_local_id=e.id) nc,
                        (select count(p.id) from historico p where p.local_fm_id=e.id) nh
                        FROM equipo e WHERE e.club_id='.$c3['id'].' ORDER BY e.categoria_id, e.codigoRFEF';
                        $resultadoSQL = mysqli_query($mysqli, $sqE);
                        $eqs = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

                        if (count($eqs)==0){ ?>
                            <td align="center" bgcolor="orange">
                                <a href="?modo=quitarC&id=<?php echo $c3['id']?>">Quitar</a>
                            </td>
                        <?php } else {
                        foreach ($eqs as $key => $value) { 
                            $color="white";$txt='';
                            foreach ($equis as $kk3 => $vv3) {
                                if ($kk3==$value['federacion_id']){ 
                                    $color='gold'; 
                                    $txt=$vv3;
                                    unset($equis[$kk3]);
                                    break;
                                }
                            } ?>
                            <td align="center" bgcolor="<?php echo $color?>">
                                <?php echo $value['id']?> - <?php echo $value['nombre']?><br />
                                
                                <form id="eq2-<?php echo $value['id']?>" action="?" method="post">
                                <input type="hidden" name="actualizo" value="<?php echo $value['id']?>">
                                <input style="text-align:center;color:red" type="text" size="2" name="categoria_id" value="<?php echo $value['categoria_id']?>">
                                <input style="text-align:center" type="text" size="3" name="codigoRFEF" value="<?php echo $value['codigoRFEF']?>">
                                <input style="text-align:center" type="text" size="8" name="federacion_id" value="<?php echo $value['federacion_id']?>">
                                <input type="submit" name="x" value="*">
                                </form>
                                - <b><?php echo $txt?></b><br />
                                - <span style="color:red"><?php echo $value['partidos']?></span>
                                - <span style="color:green"><?php echo $value['nc']?></span>  
                                - <span style="color:blue"><?php echo $value['nh']?></span> 
                                <?php
                                if (($value['partidos']+$value['nc']+$value['nh'])==0){ ?>
                                    <a href="?modo=quitarE&id=<?php echo $value['id']?>">Quitar</a>

                                <?php }

                                ?> 
                            </td>
                        <?php }
                    }

                        ?>

                        <td><?php imp($equis)?></td>
                    </tr>
                <?php } ?>
            </table> 
        </td>

        <td valign="top">

        </td>
    </tr>
</table>

<?php 
