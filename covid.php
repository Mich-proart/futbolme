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
    <div class="marco text-center">
        <h1>Infórmate en esta tabla de la reanudación de las principales ligas de fútbol de cada país.</h1>
    </div>
<div class="clear col-xs-12 one-bordergrey-vert">
    
        <?php 
        $id=6;
        $mysqli = conectar();
        $sq='select cv.positivos,cv.muertos,cv.recuperados,cv.hospital,cv.uci,cv.fecha,cv.pais_id, pa.nombre pais, pa.orden, pa.slug, pa.imagen, pa.id_bwin,
    (select concat(nombre,",",betsapi,",",visible) from torneo where pais_id=cv.pais_id and tipo_torneo=1 order by orden limit 1) torneo, 
    (select id from temporada where torneo_id=(select id from torneo where pais_id=cv.pais_id and tipo_torneo=1 order by orden limit 1)) temporada_id
    FROM coronavirus cv 
    INNER JOIN pais pa ON pa.id=cv.pais_id
    WHERE cv.comunidad_id=0 AND cv.fecha="'.date('Y-m-d').'"
    ORDER BY pa.orden DESC, cv.positivos DESC';
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
            <th style="padding: 1px;min-width: 130px" class="text-center">Pais</th>
            <th style="padding: 1px;" class="text-center" title="Positivos">Positivos</th>
            <th style="padding: 1px;" class="text-center" title="Recuperados">Recuperados</th>
            <th style="padding: 1px;" class="text-center" title="Muertos">Muertos</th>
            <th style="padding: 1px;" class="text-center hide" title="Hospital">Hospital</th>
            <th style="padding: 1px;" class="text-center hide" title="U.C.I.">U.C.I.</th>
            <th style="padding: 1px;" class="text-center" title="estado">estado</th>
        </tr>
        </thead>    

        
        
        <tbody class="whitebox">
            <?php $liga='VYSSHAYA LIGA'; $liga_id=6717;
        $enlace_torneo = $enlace.poner_guion($liga).'/'.(1000000+$liga_id).'/';?>
            <tr style='background-color:#FFFFFF' class="h40">           
                <td class="text-center" style="padding: 1px;">1</td>
                <td style="text-align:left; padding: 1px;min-width: 130px">
                    <img style="width:40px; margin-top:-15px; margin-right:5px" src="/img/paises/banderas/ban181.png">Tayikistán<br />
                    <a style="margin-left: 40px" href="<?php echo $enlace_torneo; ?>"><i><?php echo $liga; ?></i></a>
                </td>
            <td class="text-center" style="padding: 1px;"><b>-</b></td>
            <td class="text-center" style="padding: 1px;">-</td>
            <td class="text-center" style="padding: 1px;">-</td>
            <td class="text-center hide" style="padding: 1px;">-</td>
            <td class="text-center hide" style="padding: 1px;">-</td>
            <td class="text-center" style="padding: 1px;">Liga en juego</td>            
            </tr>
            <?php $liga='YOKARY LIGA'; $liga_id=22917;
        $enlace_torneo = $enlace.poner_guion($liga).'/'.(1000000+$liga_id).'/';?>
             <tr style='background-color:#FFFFFF' class="h40">           
                <td class="text-center" style="padding: 1px;">2</td>
                <td style="text-align:left; padding: 1px;min-width: 130px">
                    <img style="width:40px; margin-top:-15px; margin-right:5px" src="/img/paises/banderas/ban187.png">Turkmenistán<br /><a style="margin-left: 40px" href="<?php echo $enlace_torneo; ?>"><i><?php echo $liga; ?></i></a>
                </td>
            <td class="text-center" style="padding: 1px;"><b>-</b></td>
            <td class="text-center" style="padding: 1px;">-</td>
            <td class="text-center" style="padding: 1px;">-</td>
            <td class="text-center hide" style="padding: 1px;">-</td>
            <td class="text-center hide" style="padding: 1px;">-</td>
            <td class="text-center" style="padding: 1px;">Liga en juego</td>            
            </tr>

            <?php 


        foreach ($corona as $key => $fila) {

            //if ($key<5){ imp($fila); }
            //if ($key==34){ imp($fila); }
            //if ($key==35){ imp($fila);die; }

                $pgEnlace='';$id_bwin=1;

                $nombre='';$betsapi=0;$estado=0;
                if (isset($fila['torneo'])){
                    $torneo=explode(',', $fila['torneo']);
                    if (count($torneo>0)){
                        $nombre=$torneo[0];
                        $betsapi=$torneo[1];
                    }
                    $pgEnlace = '/resultados-directo/torneo/'.poner_guion($nombre).'/'.$fila['temporada_id'].'/';
                
                } else {
                    $nombre=$fila['imagen'];
                    $pgEnlace = '/resultados-directo/torneo/'.poner_guion($nombre).'/'.(1000000+$fila['id_bwin']).'/';
                    $id_bwin=$fila['id_bwin'];
                }

                if ($fila['orden']==0){ $fila['slug']='suspendida'; }
                if ($id_bwin==0){ $fila['slug']='-';$nombre=''; }
                
                
                $color_fondo = 'white';
                $color_fila = "style='background-color:#BCF5A9'";
                
                if ($fila['orden']>5 && $fila['orden']<50){ $color_fila = "style='background-color:#FCF85B'";}
                if ($fila['orden']==50){ $color_fila = "style='background-color:#FFFFFF'";}
                if ($fila['orden']==5){ $color_fila = "style='background-color:#FADBD8'";}
                



            ?>
            <tr <?php echo $color_fila; ?> class="h40">           
                <td class="text-center" style="padding: 1px;"><?php echo ($key+3)?></td>
                <td style="text-align:left; padding: 1px;min-width: 130px">
                    <img style="width:40px; margin-top:-10px; margin-right:5px" src="/img/paises/banderas/ban<?php echo $fila['pais_id']; ?>.png"><?php echo $fila['pais']; ?><br /> 
                    <a style="margin-left: 40px" href="<?php echo $pgEnlace; ?>"><i><?php echo $nombre; ?></i></a>
                </td>
            <td class="text-center" style="padding: 1px;"><b><?php echo number_format($fila['positivos'],0,",",".")?></b></td>
            <td class="text-center" style="padding: 1px;"><?php echo number_format($fila['recuperados'],0,",",".")?></td>
            <td class="text-center" style="padding: 1px;"><?php echo number_format($fila['muertos'],0,",",".")?></td>
            <td class="text-center hide" style="padding: 1px;"><?php echo number_format($fila['hospital'],0,",",".")?></td>
            <td class="text-center hide" style="padding: 1px;"><?php echo number_format($fila['uci'],0,",",".")?></td>
            <td class="text-center" style="padding: 1px;"><?php echo $fila['slug']?></td>            
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

