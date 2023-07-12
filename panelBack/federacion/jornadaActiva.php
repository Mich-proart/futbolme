<?php 
$static_v = 18; 
define('_FUTBOLME_', 1);

require_once '../src/consultas.php';

$mysqli=conectar();
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
<?php
if (isset($_POST['modo'])) {
    if ('cambiar' == $_POST['modo']) {
        for ($i = 0; $i <= $_POST['elementos']; ++$i) {
            if (isset($_POST['check'.$i])) {
                if ('on' == $_POST['check'.$i]) {
                    $t = $_POST['torneo'.$i];
                    $t=explode(',', $t);
                    $torneo_id=$t[0]; $temporada_id=$t[1];
                    $consulta = 'UPDATE liga SET jornadaActiva=jornadaActiva+1 WHERE id='.$torneo_id;
                    mysqli_query($mysqli, $consulta);
                    //echo $consulta."<br />";
                    borrar_cache($temporada_id);
                   
                }
            }
        }
    }
}

$color = 'white';
$tipo_torneo = 0;

if (isset($_GET['categoriatorneo'])) {
    $categoriatorneo = $_GET['categoriatorneo'];
} else {
    $categoriatorneo = 1;
} ?>

<table width='100%' border='0' cellpadding='1' cellspacing='1' bgcolor='orange'>
<tr>
  <form method='get' action='jornadaActiva.php'>
  <input type='hidden' name='modo' value='buscar_temporada'>
  		<td>Tipo <select name='categoriatorneo'>
  		  <option value='0'>Selecciona categoria</option>
		  <option value='1'>Nacional</option>
		  <option value='4'>Autonomica</option>
		  <option value='5'>Juvenil</option>
		  <option value='6'>Cadete</option>
          <option value='14'>Infantil</option>
          <option value='15'>Alevin</option>
		  <option value='7'>Femenino</option>
		  <option value='8'>America</option>
		  <option value='9'>Europa</option>
          <option value='17'>Fútbol Sala</option>
		  </select>
		<input type='submit' name='buscar' value='ver torneos'>

 <?php  switch ($categoriatorneo) {
            case '1': echo 'Nacional'; break;
            case '4': echo 'Autonomica'; break;
            case '5': echo 'Juvenil'; break;
            case '6': echo 'Cadete'; break;
            case '15': echo 'Infantil'; break;
            case '16': echo 'Alevin'; break;
            case '7': echo 'Femenino'; break;
            case '8': echo 'America'; break;
            case '9': echo 'Europa'; break;
            case '17': echo 'Fútbol Sala'; break;
        } ?>

 </td></form></tr></table>



	<?php 

    $campos = 'te.id, te.torneo_id, te.nombre, co.nombre comunidad,
	liga.jornadaActiva, (SELECT nombre FROM pais WHERE id=tor.pais_id) pais,
    (SELECT fecha FROM partido WHERE jornada=ABS(liga.jornadaActiva) AND temporada_id=te.id LIMIT 1) fecha,
	(SELECT fecha FROM partido WHERE jornada=(ABS(liga.jornadaActiva)+1) AND temporada_id=te.id LIMIT 1) fechaP,
    (SELECT count(id) FROM partido where jornada=ABS(liga.jornadaActiva) and temporada_id=te.id and estado_partido=0 and equipoLocal_id>0 and equipoVisitante_id>0) partidos
	';
    $tabla = 'temporada te';
    $union = ' INNER JOIN torneo tor ON te.torneo_id=tor.id';
    $union.= ' INNER JOIN liga ON liga.id=tor.id';
    $union.= ' INNER JOIN comunidad co ON co.id=tor.comunidad_id';
    $condicion = ' WHERE tor.categoria_torneo_id='.$categoriatorneo.' AND tor.tipo_torneo=1 AND tor.visible>4';
    $orden = ' ORDER BY tor.comunidad_id, tor.orden';

    $consulta = 'SELECT '.$campos.' FROM '.$tabla.$union.$condicion.$orden;

    //echo $consulta.'<br />';

    $color = 'white'; ?>

    <table width='100%' border='1' cellpadding='5' cellspacing='5' bgcolor='gainsboro' style="font-size: 20px">
        <tr><td align="center">ID</td>
			  <td>Nombre</td>
              <td align="center">por jugar</td>
			  <td align="center">Activa</td>
               <td align="center">Fecha</td>
			  <td align="center">Prox.</td>
			  <td align="center">Fecha</td>
			  <td align="center">Marcar</td>
			  
		  </tr><form method='post' action='jornadaActiva.php'>
		  	   <input type='hidden' name='categoriatorneo' value='<?php echo $categoriatorneo?>'>
  		       <input type='hidden' name='modo' value='cambiar'>
    <?php 
    

    $resultado = mysqli_query($mysqli, $consulta);

    $i = -1;
    foreach ($resultado as $key => $fila) {

        $jornada=abs($fila['jornadaActiva']);
    
        if (598 == $fila['id']) {
            continue;
        }

        if (isset($_GET['temporada_id'])) {
            if ($_GET['temporada_id'] != $fila['id']) {
                $color = 'white';
            } else {
                $color = 'yellow';
            }
        }

        ++$i;
        $proxima = $jornada + 1;

        ?>
        <tr bgcolor="<?php echo $color?>"><td align="center">
            <a href="/temporada.php?id=<?php echo $fila['id']?>" target="_blank"><?php echo $fila['id']?></a>
                
            </td>
	      <td><?php echo $fila['pais']?> - <?php echo $fila['nombre']?> - <?php echo $fila['comunidad']?></td>
          <td align="center"><?php echo $fila['partidos']?></td>
	      <td align="center"><b><?php echo $jornada?></b></td>
	      <td align="center"><b><?php echo $fila['fecha']?></b></td> 
          <td align="center"><?php echo $proxima?></td> 
	      <td align="center"><?php echo $fila['fechaP']?></td> 
	      <td align="center"><input type="checkbox" <?php if ($fila['partidos']==0) { ?>checked="checked" <?php } ?> name="check<?php echo $i?>"/></td></tr>
	      <input type="hidden" name="torneo<?php echo $i?>" value="<?php echo $fila['torneo_id']?>,<?php echo $fila['id']?>">

        
    <?php 
    } ?>

    <input type='hidden' name='elementos' value="<?php echo $i?>">
<tr><td colspan='5' align='center'><input type='submit' name='avanzar' value='Avanzar 1 jornada los torneos marcados'></td>
	</form></tr></table>


</body>
</html>
