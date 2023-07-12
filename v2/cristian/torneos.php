<?php
//torneos
$sq='SELECT 
t.id, 
t.nombre titulo,
t.tipo_torneo,
d.nombre division,
c.nombre comunidad,
t.comunidad_id,
p.nombre pais, 
t.pais_id, 
ct.nombre categoriaTorneo, 
cat.nombre categoriaEquipo,
te.id temporada_id
FROM torneo t
INNER JOIN categoriatorneo ct ON ct.id=t.categoria_torneo_id
INNER JOIN categoria cat ON cat.id=t.categoria_id
INNER JOIN division d ON d.id=t.division_id
INNER JOIN pais p ON p.id=t.pais_id
INNER JOIN comunidad c ON c.id=t.comunidad_id
INNER JOIN temporada te ON te.torneo_id=t.id
WHERE t.visible>4
ORDER BY t.pais_id, t.comunidad_id, t.orden';

//echo $sq;

	$mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $sq);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

    foreach ($resultado as $k => $v) {
    	$resultado[$k]['enlace'] = 'https://futbolme.eu/resultados-directo/torneo/'.poner_guion($v['titulo']).'/'.$v['temporada_id'].'/';
    	$resultado[$k]['imagenPais'] ='https://futbolme.eu/img/paises/banderas/ban'.$v['pais_id'].'b.png';
    	if ($v['comunidad_id']==1){ 
    		unset($resultado[$k]['comunidad_id']);
    		$resultado[$k]['comunidad']='';
    	}
    	unset($resultado[$k]['comunidad_id']);
    	unset($resultado[$k]['temporada_id']);
    	
    }

    
?>