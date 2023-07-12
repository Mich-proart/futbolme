<?php 
set_time_limit(0);

define('_FUTBOLME_', 1);

require_once '../../src/consultas.php';
require_once '../../src/funciones.php';

?>
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

	<div style="padding: 10px; background-color: white">

<?php


$mysqli = conectar();

if (isset($_GET['modo'])){
    $sql='DELETE FROM sancion WHERE id='.$_GET['id'];
    mysqli_query($mysqli, $sql);
}


    $sql='SELECT s.id, s.temporada_id, s.equipo_id, s.jornada, s.puntos, s.jugados, s.ganados, s.empatados, s.perdidos, s.gFavor, s.gContra, e.nombre equipo, t.nombre nombreTemporada, tor.categoria_torneo_id, tor.orden
    FROM sancion s
    INNER JOIN equipo e ON e.id=s.equipo_id
    INNER JOIN temporada t ON t.id=s.temporada_id
    INNER JOIN torneo tor ON t.torneo_id=tor.id
    ORDER BY tor.categoria_torneo_id, tor.orden';
    //echo $sql.'<br />';

    
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC); ?>
<h1>Sancionados</h1>
<table border="1">
    <tr>
        <td>cat</td>
        <td>torneo</td>
        <td>equipo</td>
        <td>puntos</td>
        <td>jornada</td>
        <td>J</td>
        <td>G</td>
        <td>E</td>
        <td>P</td>
        <td>GF</td>
        <td>GC</td>
        <td></td>
    </tr>
    <?php foreach ($resultado as $key => $value) { 

        if ($key%2==0){
            $bgcolor='gainsboro';
        }else{
            $bgcolor='white';
        }?> 
    <tr bgcolor="<?php echo $bgcolor?>">
        <td><?php echo $value['categoria_torneo_id']?></td>
        <td><?php echo $value['nombreTemporada']?></td>
        <td><?php echo $value['equipo']?></td>
        <td><?php echo $value['puntos']?></td>
        <td><?php echo $value['jornada']?></td>
        <td><?php echo $value['jugados']?></td>
        <td><?php echo $value['ganados']?></td>
        <td><?php echo $value['empatados']?></td>
        <td><?php echo $value['perdidos']?></td>
        <td><?php echo $value['gFavor']?></td>
        <td><?php echo $value['gContra']?></td>
        <td><a href="?modo=q&id=<?php echo $value['id']?>">Quitar</a></td>
    </tr> 
    <?php } ?>
</table>

 </div>
</body>
</html>