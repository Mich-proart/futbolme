<?php 
define('_FUTBOLME_', 1);
require_once 'src/config.php';

$titulo = 'El coronavirus y el fútbol. FUTBOLME.COM';
$metaDescripcion = 'COVID-19 '.$titulo;

require_once 'includes/head.php'; ?>

	<title><?php echo $titulo; ?></title>

    <link href="/css/tablesorter/blue/style.css" rel="stylesheet">

</head>
<?php require_once 'includes/contenedorSup.php'; ?>
							

<div class="col-xs-12 whitebox nopadding">
<div class="clear col-xs-12 one-bordergrey-vert">
    
        <?php
        $mysqli = conectar();
        $sq='select cv.positivos,cv.muertos,cv.recuperados,cv.hospital,cv.uci,cv.fecha,cv.comunidad_id ,co.nombre 
FROM coronavirus cv 
    INNER JOIN comunidad co ON co.id=cv.comunidad_id
    WHERE cv.comunidad_id>0 
    ORDER BY cv.fecha DESC, cv.positivos DESC LIMIT 19';
        //echo $sq.'<br />';
        $resultadoSQL = mysqli_query($mysqli, $sq);
        $corona = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

        $uCorona='https://en.wikipedia.org/wiki/2020_coronavirus_pandemic_in_Spain';        
        $enlace = '/resultados-directo/torneo/';
        ?>

        
        

    <div id="playClasi" class="col-xs-12 whitebox nopadding bloque-clasificacion">


    <table id="latabla" class="table tablesorter table-bordered table-condensed greenbox nomargin txt11">        
        <thead>
            <tr class="darkgreenbox h40 nopadding">
            <th style="padding: 1px;" class="text-center" title="Posición">P</th>
            <th style="padding: 1px;min-width: 130px" class="text-center">Comunidad</th>
            <th style="padding: 1px;" class="text-center" title="Positivos">Positivos</th>
            <th style="padding: 1px;" class="text-center" title="Recuperados">Recuperados</th>
            <th style="padding: 1px;" class="text-center" title="Muertos">Muertos</th>
            <th style="padding: 1px;" class="text-center" title="Hospital">Hospital</th>
            <th style="padding: 1px;" class="text-center" title="U.C.I.">U.C.I.</th>
        </tr>
        </thead>    

        
        
        <tbody class="whitebox">

            <?php 


        foreach ($corona as $key => $fila) {

            //if ($key<5){ imp($fila); }
            //if ($key==34){ imp($fila); }
            //if ($key==35){ imp($fila);die; }
            if ($fila['comunidad_id']<20){
                $grupo=($fila['comunidad_id']-1);
            } else { $grupo=$fila['comunidad_id']; }

                if ($grupo==9){ $fila['nombre']='Andalucía'; }
                $temporada_id=($grupo+6);
                $nombre='3ª DIVISIÓN - Gr. '.$grupo;
                
                $pgEnlace = '/resultados-directo/torneo/tercera-division-grupo-'.$grupo.'/'.$temporada_id.'/';
                
                $color_fondo = 'white';
                $color_fila = "style='background-color:#BCF5A9'";



            ?>
            <tr <?php echo $color_fila; ?> class="h40">           
                <td class="text-center" style="padding: 1px;"><?php echo ($key+3)?></td>
                <td style="text-align:left; padding: 1px;min-width: 130px">
                    <img style="width:40px; margin-right:5px" src="/img/comunidades/co<?php echo $grupo?>.png"><?php echo $fila['nombre']; ?><br /> 


                    <?php if ($grupo<20){ ?>
                    <a style="margin-left: 40px" href="<?php echo $pgEnlace; ?>"><i><?php echo $nombre; ?></i></a>
                    <?php if ($grupo==9){ ?>
                     <i>y</i> <a href="/resultados-directo/torneo/tercera-division-grupo-10/16/"><i>Gr. 10</i></a>
                    <?php } ?>

                    <?php } else { ?>
                        <?php if ($grupo==22){ ?>
                         <a style="margin-left: 40px" href="/resultados-directo/torneo/tercera-division-grupo-10/16/"><i>3ª DIVISIÓN - Gr. 10</i></a>
                        <?php } ?>
                        <?php if ($grupo==21){ ?>
                         <a style="margin-left: 40px" href="/resultados-directo/torneo/tercera-division-grupo-10/15/"><i>3ª DIVISIÓN - Gr. 9</i></a>
                        <?php } ?>
                    <?php } ?>

                </td>
            <td class="text-center" style="padding: 1px;"><b><?php echo number_format($fila['positivos'],0,",",".")?></b></td>
            <td class="text-center" style="padding: 1px;"><?php echo number_format($fila['recuperados'],0,",",".")?></td>
            <td class="text-center" style="padding: 1px;"><?php echo number_format($fila['muertos'],0,",",".")?></td>
            <td class="text-center" style="padding: 1px;"><?php echo number_format($fila['hospital'],0,",",".")?></td>
            <td class="text-center" style="padding: 1px;"><?php echo number_format($fila['uci'],0,",",".")?></td>
            </tr>
            <?php  


    } ?> 
        </tbody>
    </table>
    </div>

    </div>
</div>
<script src="/js/tablesorter/jquery.tablesorter.js"></script>
<script>
 $(function(){
    $("#latabla").tablesorter();
});
</script>

			<?php require_once 'includes/contenedorInf.php'; ?>

