<?php 
$static_v = 16; 
define('_FUTBOLME_', 1);

require_once '../src/consultas.php';
require_once '../src/funciones.php';
?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">


<link href="/css/bootstrap.min.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/main.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/style.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/comunidades.min.css?v=<?php echo $static_v; ?>" rel="stylesheet">
<link href="/css/paises.min.css?v=<?php echo $static_v; ?>" rel="stylesheet">

<noscript><link rel="stylesheet" href="/css/allcss.css?v=<?php echo $static_v; ?>"></noscript>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/js/ajax.js?=<?php echo $static_v; ?>"></script>
<script async src="/js/bootstrap.min.js"></script>
</head>
<body><hr />
  <div class="whitebox">
<?php

$idT=$_GET['temporada_id']??0;

$carpeta="../json/actualizaciones/";

if ($idT>0){
  $ruta=$carpeta.$_GET['temporada_id'].'_federacion.json';
  echo '<hr />actualizacion borrada. ';
  unlink($ruta);
}
    

    $directorio = opendir($carpeta); //ruta actual
    $archivos=array();
      while ($archivo = readdir($directorio)) {  
        if ($archivo=="." || $archivo=="..") { continue; } 
        $archivos[] = $archivo;              
      } 

      if (count($archivos)>0) {
        require_once('actualizaciones.php');
      } else {
        echo "<hr />";
      }?>

<?php
//SELECT te.temporada_id, e.id, e.federacion_id, e.nombre FROM temporada_equipo te INNER JOIN equipo e ON e.id=te.equipo_id WHERE te.temporada_id=34 ORDER BY e.federacion_id ASC
      
    foreach ($archivos as $key => $value) {

        $json = file_get_contents($carpeta.$value);
        $t=explode('_',$value);
        $temporada_id=$t[0];
        $partidos = json_decode($json, true);
        
        //imp($jornada);
        //imp($temporada_id);
        
        $equiposFED=array();
        $equiposFM=array();

        $jornada=$partidos[0]['jornada'];
          
       


        $sql='SELECT id, jornada, goles_local, goles_visitante, fecha, hora_prevista, estado_partido, observaciones, codigo_acta, equipoLocal_id, (select federacion_id from equipo where id=equipoLocal_id) local_id, equipoVisitante_id, (select federacion_id from equipo where id=equipoVisitante_id) visitante_id,
        (select nombre from equipo where id=equipoLocal_id) local,
        (select nombre from equipo where id=equipoVisitante_id) visitante, temporada_id, 
        (select nombre from temporada where id=temporada_id) temporadaNombre 
        FROM partido WHERE temporada_id='.$temporada_id.' AND jornada='.$jornada;
        $mysqli = conectar();
        $resultadoSQL = mysqli_query($mysqli, $sql);
        $partidosFM = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC); 

        $sinId=0;
              foreach ($partidosFM as $key => $value) {
                $value['local']=str_replace('"', '', $value['local']);
                $value['visitante']=str_replace('"', '', $value['visitante']);
                $value['local']=str_replace('&nbsp;', '', $value['local']);
                $value['visitante']=str_replace('&nbsp;', '', $value['visitante']);

                if (isset($value['local_id'])){                
                  if ($value['local_id']==0){ $sinId++; }
                }
                if (isset($value['visitante_id'])){
                  if ($value['visitante_id']==0){ $sinId++; }
                }

                //echo $value['local'].' '.$value['local_id'].' '.$value['visitante_id'].' '.$value['visitante'].' = '.$sinId.'<br />';
                



              } ?>

      <div id="mensaje-<?php echo $temporada_id?>"> 

  <table>
    <tr><td>
        <table border="1">
              <tr><td>Jda</td><td>Fecha</td><td>Hora</td><td>Estado</td><td>local</td><td colspan="2">resultado</td><td>visitante</td><td>acta</td></tr>
              <?php 
              foreach ($partidos as $key => $value) { 

                
                $value['local']=str_replace('-', ' ', $value['local']);
                $value['visitante']=str_replace('-', ' ', $value['visitante']);
                $value['local']=str_replace(',', ' ', $value['local']);
                $value['visitante']=str_replace(',', ' ', $value['visitante']);

                $palabras = explode(' ', $value['local']);
                usort($palabras, function($a, $b) { return strlen($b) - strlen($a); });
                $largo = $palabras[0];
                //echo 'Local: '.$largo.' '.$value['equipoLocal_id'].'<br />'; 
                $equiposFED[$value['equipoLocal_id']]['nombre']=$largo;
                $equiposFED[$value['equipoLocal_id']]['federacion_id']=$value['equipoLocal_id'];

                $palabras = explode(' ', $value['visitante']);
                usort($palabras, function($a, $b) { return strlen($b) - strlen($a); });
                $largo = $palabras[0];
                //echo 'Visitante: '.$largo.' '.$value['equipoVisitante_id'].'<br />';  
                $equiposFED[$value['equipoVisitante_id']]['nombre']=$largo;
                $equiposFED[$value['equipoVisitante_id']]['federacion_id']=$value['equipoVisitante_id'];


               ?>
              <tr bgcolor="white"><td><?php echo $value['jornada']?></td>
                <td><?php echo $value['fecha']?></td>
                <td><?php echo $value['hora_prevista']?></td>
                <td><?php echo $value['estado_partido']?></td>
                <td align="right"><b><?php echo $value['equipoLocal_id']?></b> - <?php echo $value['local']?></td>
                <td colspan="2" align="center"><?php echo $value['goles_local']?> - <?php echo $value['goles_visitante']?></td>
                <td><?php echo $value['visitante']?> - <b><?php echo $value['equipoVisitante_id']?></b></td>
                <td><?php echo $value['codigo_acta']?></td>                
              </tr>
              <?php } ?>

        </table>
        <table border="1">
              <tr><td>Jda</td><td>Fecha</td><td>Hora</td><td>Estado</td><td>local</td><td colspan="2">resultado</td><td>visitante</td><td>acta</td><td>Obs.</td></tr>
              <?php 
              foreach ($partidosFM as $key => $value) {

              if (isset($value['equipoLocal_id'])){
                $palabras = explode(' ', $value['local']);
                usort($palabras, function($a, $b) { return strlen($b) - strlen($a); });
                $largo = $palabras[0];
                //echo 'Local: '.$largo.' '.$value['equipoLocal_id'].'<br />';
                $equiposFM[$value['equipoLocal_id']]['equipo']=$value['local'];
                $equiposFM[$value['equipoLocal_id']]['nombre']=$largo;
                $equiposFM[$value['equipoLocal_id']]['id']=$value['equipoLocal_id']; 
              } 

              if (isset($value['equipoVisitante_id'])){ 
                $palabras = explode(' ', $value['visitante']);
                usort($palabras, function($a, $b) { return strlen($b) - strlen($a); });
                $largo = $palabras[0];
                //echo 'Visitante: '.$largo.' '.$value['equipoVisitante_id'].'<br />';
                $equiposFM[$value['equipoVisitante_id']]['equipo']=$value['visitante'];
                $equiposFM[$value['equipoVisitante_id']]['nombre']=$largo;
                $equiposFM[$value['equipoVisitante_id']]['id']=$value['equipoVisitante_id']; 
              } 

                ?>
              <tr><td><?php echo $value['jornada']?></td>
                <td><?php echo $value['fecha']?></td>
                <td><?php echo $value['hora_prevista']?></td>
                <td><?php echo $value['estado_partido']?></td>
                <td><?php echo $value['equipoLocal_id']?> - <?php echo $value['local']?> - <?php echo $value['local_id']?></td>
                <td colspan="2"><?php echo $value['goles_local']?> - <?php echo $value['goles_visitante']?></td>
                <td><?php echo $value['visitante_id']?> - <?php echo $value['visitante']?> - <?php echo $value['equipoVisitante_id']?> -</td>
                <td><?php echo $value['codigo_acta']?></td>
                <td><?php //echo $value['observaciones']?></td>
              </tr>
              <?php } ?>

        </table>
      <?php } ?>
    </td>
    <td>

         <?php 


         //imp($equiposFM);
          foreach ($equiposFM as $k1 => $v1) {
            $nombre1=$v1['nombre'];
            $nombre1=quitar_guion($nombre1);
            $equiposFM[$k1]['federacion_id']=0;
            foreach ($equiposFED as $k2 => $v2) {
              $nombre2=$v2['nombre'];
              $nombre2=quitar_guion($nombre2);
              //echo $nombre1.' && '.$nombre2.'<br >';

              if ($nombre1==$nombre2){
                $equiposFM[$k1]['federacion_id']=$k2;
              }
            }
          }
          
          echo 'Equipos sin ID:'.$sinId.'<br />';
          if ($sinId>0) { ?>
            <form id="t-<?php echo $temporada_id?>" onsubmit="submitFederacionGrabarId(event, $(this).serialize(),<?php echo $temporada_id?>)">
              <table border="1">
              <?php 
              foreach ($equiposFM as $key => $value){ ?>
                <input type="hidden" name="id[]" value="<?php echo $value['id']?>" />             
                <tr><td><?php echo $value['equipo']?></td><td><?php echo $value['id']?></td><td> <input type="text" name="federacion_id[]" value="<?php echo $value['federacion_id']?>" size="10" /></td></tr>              
              <?php } ?>
              <tr><td colspan="3" align="center"><input type="submit" name="validar" value="validar" /></td></tr>

            </table>
            </form>

          <?php } ?>
    </td></tr></table>





      </div>
        
</div>
</body>
</html>    



    <?php 

function quitar_guion($cadena)
{
    // $cadena = strtolower($cadena);

    $cadena = utf8_decode($cadena);
    $cadena = trim($cadena);
    $cadena = str_replace('"', '', $cadena);
    $cadena = str_replace('-', '', $cadena);
    $cadena = str_replace('?', '', $cadena);
    $cadena = str_replace('+', '', $cadena);
    $cadena = str_replace(':', '', $cadena);
    $cadena = str_replace('??', '', $cadena);
    $cadena = str_replace('', '', $cadena);
    $cadena = str_replace('´', '', $cadena);
    $cadena = str_replace("'", '', $cadena);
    $cadena = str_replace('!', '', $cadena);
    $cadena = str_replace('¿', '', $cadena);
    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýýþÿ??´';
    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuuyybyRr--';
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);

    $cadena = strtolower($cadena);

    return $cadena;
}
            ?>