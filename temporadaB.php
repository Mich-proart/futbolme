<?php 
define('_FUTBOLME_', 1);
require_once 'src/config.php';

$temporada_id = $_GET['id']??1;
$valorJornada = $_GET['jornada']??0;


$f = './json/temporada/'.$temporada_id.'/tipo.json';
if (!@file_exists($f)) { 
    Xtipo($temporada_id);
}

$json = file_get_contents($f);
$datos = json_decode($json, true);

$torneo=$datos['torneo'];
$equipos=$datos['equipos'];

imp($torneo);

?>
<div id="chekinFed"></div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
<?php 


    $paraFed=Array();
    $paraFed['temporada_id']=$temporada_id;
    $paraFed['fase']=$torneo['apifutbol'];
    $paraFed['c']=$torneo['apiRFEFcompeticion'];
    $paraFed['g']=$torneo['apiRFEFgrupo'];
    $paraFed['j']=$valorJornada;
    $paraFed['co']=$torneo['idComunidad'];

    $temporada_id = $paraFed['temporada_id'];
    $fase = $paraFed['fase']; 
    $c = $paraFed['c'];
    $g = $paraFed['g'];
    $j = $paraFed['j'];
    $co = $paraFed['co'];

    //echo $co.'<br />';

    if ($co>1 && $co!=5 && $co!=13){ 
        $f='json/temporada/'.$temporada_id.'/partidosFed_'.$j.'.json';
        //echo $f.'<br />';
        $diaN = date('N');
        if ($diaN<6){ $cachetime = 86400; } else { $cachetime = 3600; }
        if (@file_exists($f)) { 
            $fichero_time = @filemtime($f);
            //imp((time() - $fichero_time));
            if ((time() - $fichero_time)> $cachetime) { ?>
                
                extraerDatosFed(<?php echo $temporada_id?>,<?php echo $fase?>,<?php echo $c?>,<?php echo $g?>,<?php echo $j?>,<?php echo $co?>,1);
               
            <?php }        
        } else { ?>
           
            extraerDatosFed(<?php echo $temporada_id?>,<?php echo $fase?>,<?php echo $c?>,<?php echo $g?>,<?php echo $j?>,<?php echo $co?>,2);
            
        <?php }
    }
?>


function extraerDatosFed(temporada_id,fase,c,g,j,co,x){

  console.log(temporada_id);
  console.log(c);
  console.log(g);
  console.log(j);
        
   $.ajax({
        type: 'POST',
        url: '/src/funciones/extraerDatosFed.php',
        data: "temporada_id="+temporada_id+"&fase="+fase+"&c="+c+"&g="+g+"&j="+j+"&co="+co,
        success: function(data){          
         console.log(data);
         $('#chekinFed').html(data); 
        }
    });
    return false;
} 
</script>

