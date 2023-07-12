<?php
define('_FUTBOLME_', 1);

require_once 'src/config.php';

$diaN = date('N');
$fecha = new \DateTime();



$hoy = $fecha->format('Y-m-d');
$diaAnterior = new \DateTime();
$diaSiguiente = new \DateTime();

$lahora=date('h');


if (isset($_GET['fecha'])) {
    $dia = $_GET['fecha'];
    ob_start();
} else {
    $dia = $fecha->format('Y-m-d');
}
$diaNG = date('N', strtotime($dia)); //numero del dia si hay fecha en get.


//imp($diaNG);
$diaAnterior = \DateTime::createFromFormat('Y-m-d', $dia);
$diaSiguiente = \DateTime::createFromFormat('Y-m-d', $dia);
$diaAnterior = $diaAnterior->modify('-1 day')->format('Y-m-d');

$diaSiguiente = $diaSiguiente->modify('+1 day')->format('Y-m-d');


$pagina = 'index';
$c_finales = 0;$c_resto = 0;$c_partidos = 0;

if ($dia != $hoy) {
    $partidos = partidosDia($dia);
    $partidosDia=$partidos['partidos'];
    unset($directos);
    $c_directos = 0;
} else {

    $path = './json/directos.json';
    $json = file_get_contents($path);
    $directos = json_decode($json, true);
    $c_directos = count($directos);

    $path = './json/index.json';
    $json = file_get_contents($path);
    $partidosDia = json_decode($json, true);
    $cabeceras = array();
    foreach ($partidosDia as $key => $v) {
        if (1 == $v['estado_partido']) {
            ++$c_finales;
            continue;
        }
        ++$c_resto;
    }

    $c_partidos = ($c_directos + $c_finales + $c_resto);
    if ($_SESSION['futbolme']==1) { include 'a_index.php';}
    
}



$ct=$_GET['ct']??1;
$ct=(int)$ct;
$mostrarPartidos=150;
$categorias=array();
$enJuegoCat=array();


/*if ($c_partidos>$mostrarPartidos && $ct==0){ $ct=1; }
if ($c_partidos<=$mostrarPartidos){ 
    //$ct=0; 
    foreach ($partidosDia as $key => $value) {
        if ($value['categoria_torneo_id']==17){
            $categorias[$value['categoria_torneo_id']]=$value['categoria_torneo_id'];break;
        }
    }
}*/


$footters=0;

if (count($partidosDia)>30){
    if ($ct>0){
        $categorias[$ct]=$ct;

        if ($dia == $hoy) {
            $directos1=array(); 
            foreach ($directos as $v) {    
                $div=$v['division_id'];  
                if ($div<4){ $div=1; }
                if ($div==8){ 
                    if ($v['categoria_torneo_id']==7) { $div=9; }
                    if ($v['categoria_torneo_id']==5) { $div=8; }
                    if ($v['categoria_torneo_id']==9) { $div=10; }
                    if ($v['categoria_torneo_id']<4) { $div=1; }
                }
                $enJuegoCat[$div][]=$v;

                if ($div!=$ct){ $categorias[$div]=$div; continue; }
                    
               $directos1[]=$v;
            }
            unset($directos);$directos=$directos1; unset($directos1);
        }
        
        
        $partidosDia1=array(); 

        
        /*foreach ($partidosDia as $v) {   
            
            if ($v['categoria_torneo_id']<4) { $v['categoria_torneo_id']=1; }      
            if ($v['categoria_torneo_id']==7) { $v['categoria_torneo_id']=1; }
            if ($v['categoria_torneo_id']==5 && (substr($v['nombreTorneo'],0,18)=='DIVISIÓN DE HONOR' || substr($v['nombreTorneo'],0,10)=='CAMPEONATO') ){ $v['categoria_torneo_id']=1; }
            if ($v['categoria_torneo_id']!=$ct){
                $categorias[$v['categoria_torneo_id']]=$v['categoria_torneo_id']; continue; 
            }
           $partidosDia1[]=$v;
        }*/

        foreach ($partidosDia as $v) { 

            $div=$v['division_id'];  
            if ($div<4){ $div=1; }
            if ($div==8){ 
                if ($v['categoria_torneo_id']==7) { $div=9; }
                if ($v['categoria_torneo_id']==5) { $div=8; }
                if ($v['categoria_torneo_id']==9) { $div=10; }
                if ($v['categoria_torneo_id']<4) { $div=1; }
            }
            
            if ($div!=$ct){ $categorias[$div]=$div; continue; }
           $partidosDia1[]=$v;
        }

        

        unset($partidosDia);$partidosDia=$partidosDia1; unset($partidosDia1);
    } 


}


/* else {

    foreach ($partidosDia as $v) {
        $tvs=explode('-',$v['tv']);
        foreach ($tvs as $vtv) {
            if ($vtv==132){ $footters++;}
        }
    }

} */


/*imp("Total ".$c_partidos);
imp("Directos ".$c_directos);
imp("Finales ".$c_finales);
imp("Resto ".$c_resto);*/

$metaDescripcion = 'Fútbol en directo de Primera, Segunda, Segunda B y Tercera División. Si no esta en Futbolme, no se ha jugado.';

?>
<?php require_once 'includes/head.php'; ?>
<?php if (0 == $_SESSION['app']??0) {
    try {
        $date = new \DateTimeImmutable('now');
        $fechaC = $date->format('c');
    } catch (Exception $e) {
        $fechaC='';
    }

    ?>
	<title>Resultados de fútbol y clasificaciones - Bienvenido a Futbolme</title>
	<?php
} else {
    ?>
    <title>Futbolme</title>
    <?php
} ?>

    </head>

<?php
require_once 'includes/contenedorSup.php';?>
<div class="marco text-center clear boldfont hide">
        <p>¿Cuando se reanudará el fútbol en las principales ligas?</p>
        <a href="/covid.php">Calendario del desconfinamiento</a>
    </div>
<div class="col-xs-12" style="background-color:#FFCC66">
    <div class="col-xs-4 padding1">
        <a href="/?fecha=<?php echo $diaAnterior; ?>" class="boldfont" >
            <span class="iconseparate glyphicon glyphicon-chevron-left"></span>
            <?php echo substr($diaAnterior, -2).'/'.substr($diaAnterior, 5, 2); ?>
        </a></div>

    <div class="col-xs-4 padding1" style="text-align:center">
        <?php if ($hoy != $dia) {
            $fecha = new \DateTime($dia); ?>
            <?php echo $fecha->format('d').' de '.nombremes($fecha->format('n')); ?>
             <span class="badge" style='background-color: maroon'><a style="color:white" href="/">HOY</a></span>
            <?php
        } else {
            ?>
            <span style="margin: 2px; font-size: 16px;"><b>Livescore</b></span>
            <?php
        } ?>
    </div>
    <div class="col-xs-4 padding1 text-right">
        <a href="/?fecha=<?php echo $diaSiguiente; ?>" class="boldfont">
            <?php echo substr($diaSiguiente, -2).'/'.substr($diaSiguiente, 5, 2); ?>
            <span class="iconseparate glyphicon glyphicon-chevron-right"></span>
        </a>
   </div>
</div>

            
<div id="partidos">



<div class="col-xs-12" style="background-color:#FFCC66;padding-bottom: 5px; padding-left: 5px">
    <?php if (count($categorias)>1) { 
        ksort($categorias);
        foreach ($categorias as $key => $value) { 

                if ($value==1) { $txtCat='Principal'; $titolCat='Partidos de Primera y Segunda División'; }
                if ($value==4) { $txtCat='Segunda B'; $titolCat='Partidos de Segunda División B'; }
                if ($value==5) { $txtCat='Tercera'; $titolCat='Partidos de Tercera División'; }
                if ($value==7) { $txtCat='Autonómica'; $titolCat='Partidos de los torneos de ámbito regional'; }
                if ($value==8) { $txtCat='Juveniles'; $titolCat='Partidos para hoy de los equipos de DHJ y LNJ'; }
                if ($value==9) { $txtCat='Femenino'; $titolCat='Partidos para hoy de las ligas femeninas de categoría nacional'; }
                if ($value==10) { $txtCat='Europa'; $titolCat='Partidos para hoy de las ligas europeas'; }

                if ($value==22) { $txtCat='Fútbol Sala'; $titolCat='Partidos para hoy de Fútbol Sala'; }


                ?>
            <a href="/index.php?ct=<?php echo $value?>&fecha=<?php echo $dia?>" class="boldfont btn btn-danger" title="<?php echo $titolCat?>"><?php echo $txtCat?> 
            <?php if (isset($enJuegoCat[$value])){ ?>
            <span class="badge"><?php echo count($enJuegoCat[$value])?></span>
            <?php } ?>
            </a>&nbsp;
         <?php } 
     } ?>
    <span class="actua pull-right badge" style="font-weight:100;">
    Actualizado a las <?php echo $hora = date('H:i:s'); ?>
    </span>
</div>
<?php //require_once 'includes/diseny/menuPromocion.php'; ?>
<div class="clear"></div>

    
    <?php 

    require_once 'ascyprom.php';
    
    if ($c_directos > 0) { include 'includes/contenidoDirecto.php';} 

    

    if ($c_directos==0){

         $path = './json/partidosSueltos.json';
        $json = file_get_contents($path);
        $sueltos = json_decode($json, true);
        unset($f);
        include 'includes/livescore/sueltos.php';
    } ?>

    <div class="marco col-xs-12 clear hide">
    <?php //require_once 'json/noticias/portada.php';?>
    </div>

<?php
   
   if ($c_partidos > $mostrarPartidos && 1 == $_SESSION['app']) {
        $partidosNac = array();
        foreach ($partidosDia as $key => $value) {            
            $partidosNac[] = $value;
        }
        $partidosDia = $partidosNac;
        unset($partidosNac);
        require_once 'includes/contenidoIndex.php';
        $path = './json/index_cabeceras.json';
        $json = file_get_contents($path);
        $partidosDia = json_decode($json, true);
        require_once 'srcRecursos/pesCabeceras.php';
    } else {
        require_once 'includes/contenidoIndex.php';
    } 
    ?>
    <div class="clear"></div>
    <?php if ($c_directos>4) { //no se ven partidos sueltos y mostramos la publicidad de slm aqui?>
        <div id="Futbolme_ATF2_300x250" class="text-center"></div>
          <script type="application/javascript">
            var slmadshb = slmadshb || {};
            slmadshb.que = slmadshb.que || [];
            slmadshb.que.push(function() {
              slmadshb.display("Futbolme_ATF2_300x250");
            });
          </script>

          
        <hr />
    <?php } ?>
</div>




<?php 
/*if (isset($equiposTw)) {
    shuffle($equiposTw);
    if ($_SERVER['HTTP_HOST']=='fm20.'){
      echo '<h3>sin twitter</h3>'; 
    } else {
        $cachetime = 86400; //86400 un dia.
        $filtro=0;
        foreach ($equiposTw as $key => $value) {
            
            if (isset($value['twitter']) && strlen($value['twitter']) > 2 && $value['id']>0) {
                if (!isset($value['twitter'])) { $value['twitter']=0; }        
                if (!isset($value['idPais'])) { $value['idPais'] = 60;}
                $seleccion=$value['seleccion']??0; 
                if ($seleccion==0){
                    $escudo=rutaEscudo($value['club_id'],$value['id']);                
                } else {
                    $escudo='/img/paises/banderas/ban'.$value['idPais'].'.png';
                }             
                $t=capturaTwit($value['id'], $value['twitter'], $cachetime);
                if (count($t) > 1) {
                    include 'srcRecursos/pesLeerTwits2.php'; //incluye derecha02
                } 
            }
        }
        
    }
    unset($equiposTw);
} //isset equiposTw
*/

/*if (0 == $_SESSION['app']) { $inicio=3; } else { $inicio=1; }

for ($i=$inicio; $i < 7 ; $i++) { ?>
<div class="col-xs-6 nopadding">
    <?php switch ($i) {
        case 1: $titol='Primera';break;
        case 2: $titol='Segunda';break;
        case 3: $titol='2B Gr. 1';break;
        case 4: $titol='2B Gr. 2';break;
        case 5: $titol='2B Gr. 3';break;
        case 6: $titol='2B Gr. 4';break;

    }
    $f = './json/temporada/'.$i.'/tipo.json';
    $json = file_get_contents($f);
    $datos = json_decode($json, true);
    $equipos=$datos['equipos'];

    $equiposTw = array();
    foreach ($equipos as $kk => $value) {   
        $equiposTw[$kk]['id'] = $value['equipo_id'];
        $equiposTw[$kk]['equipo'] = $value['nombreCorto'];
        $equiposTw[$kk]['idPais'] = $value['pais_id'];
        $equiposTw[$kk]['twitter'] = $value['slug'];
        $equiposTw[$kk]['club_id'] = $value['club_id']??NULL;
    }
    $filtro=0;
    if ($_SERVER['HTTP_HOST']=='fm18.com'){
      echo '<h3>sin twitter</h3>'; 
    } else {
    include 'srcRecursos/pesLeerTwitsPortada.php'; //incluye derecha02
    }
    unset($datos);
    unset($equipos);
    unset($equiposTw); ?>
</div>
<?php }*/ ?>


<?php


//if ($dia===$hoy) { require_once('ascydescNac.php');}



$fichajes=Xfichajes(0,1);?>
<div class="col-xs-12 whitebox nopadding">
    <div class="col-xs-12 nopadding text-center"><h3 style="background-color: #A4A4A4; color:white; padding: 10px">Fichajes Temporada 2020-21 </h3></div>
            <?php
            $id_equipo=0;

            foreach ($fichajes as $jugador) {
            $enlace_jugador="/resultados-directo/jugador/".poner_guion($jugador['apodo'])."/".$jugador['id'];
            $enlace_equipo="/resultados-directo/equipo/".poner_guion($jugador['equipo'])."/".$jugador['equipoActual_id'];
                        switch ($jugador['posicion']) {
                            case '1':
                                $txtPosicion="Portero";
                                if ($jugador['categoria_id']==2) { $txtPosicion="Portera"; }
                                break;
                            case '2':
                                $txtPosicion="Defensa";
                                break;
                            case '3':
                                $txtPosicion="Centrocampista";
                                break;
                            case '4':
                                $txtPosicion="Delantero";
                                if ($jugador['categoria_id']==2) { $txtPosicion="Delantera"; }
                                break;
                            case '5':
                                $txtPosicion="Entrenador";
                                break;
                            default:
                                $txtPosicion="Sin demarcación";
                                break;
                        }

                 $rutaJugador="img/jugadores/jugador".$jugador['id'].".jpg";
                 if (!@file_exists($rutaJugador)){ $rutaJugador="img/jugadores/NI.png";}

                 $rutaEscudo=rutaEscudo($jugador['club_id'],$jugador['equipoActual_id']);

                        ?>

                <div style="clear:both; border-top: solid 5px gainsboro; padding:5px; margin-top:5px"></div>
                <div class="col-xs-3 col-sm-2">
                    <a href="<?php echo $enlace_jugador; ?>"><img src="<?php echo $rutaJugador ?>" class="img-rounded" width="64"  height="96"></a>
                </div>
                <div class="col-xs-5 col-sm-5" style="float:left">
                    <span><a href="<?php echo $enlace_jugador; ?>"><h4><?php echo $jugador['apodo']; ?></h4></a></span>

                     <div style="float:left; padding-right:5px"><a href="<?php echo $enlace_equipo; ?>"><img src="<?php echo $rutaEscudo; ?>" class="img-rounded" width="30"  height="45"></a></div>
                    <div style="float:left"><span><a href="<?php echo $enlace_equipo; ?>"><?php echo $jugador['equipo']; ?></a></span></div>

                </div>

                <div class="col-xs-4 col-sm-5">
                        <span><p class="boldfont txt11" style="color:maroon"><?php echo $txtPosicion; ?></p></span>
                        <span class="txt11">Procedencia: <b><?php echo $jugador['slug']; ?></b></span>

                 </div>
                <?php
                $id_equipo=$jugador['equipoActual_id'];
                } ?>

</div>

<?php 

unset($partidosDia);
unset($directos);
unset($cabeceras);

require_once 'includes/contenedorInf.php'; 

if ($dia == $hoy) { ?>
<script>
 $(function () {   
              
    setInterval(function () { 
        var dt = new Date();
        var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();

        
        $.ajax({
            type: 'GET',
            url: "/ajax_index.php?ct=<?php echo $ct?>",
        })
        .done(function (data) {
            $('#partidos').html(data);
        });
        $('.actua').html('Actualizado a las ' + time);


        $.ajax({
            type: 'GET',
            url: "/ultimosEventos.php",
        })
        .done(function (data) {
            $('#ultimosEventos').html(data);
        });

    },60000);
});
</script>
<?php  } 




