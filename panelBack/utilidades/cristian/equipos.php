<?php
//equipos

$consulta = "
SELECT e.id, e.club_id, e.nombre, c.nombre nombreCategoria, 
p.comunidad_id imagenComunidad, cl.pais_id imagenPais, 
l.nombre nombreLocalidad, p.nombre nombreProvincia, co.nombre nombreComunidad, teq.temporada_id,te.nombre nombreTemporada 
FROM equipo e 
INNER JOIN categoria c ON c.id=e.categoria_id 
INNER JOIN club cl ON cl.id=e.club_id 
INNER JOIN localidad l ON cl.localidad_id=l.id 
INNER JOIN provincia p ON l.provincia_id=p.id 
INNER JOIN comunidad co ON p.comunidad_id=co.id 
INNER JOIN temporada_equipo teq ON e.id=teq.equipo_id 
INNER JOIN temporada te ON te.id=teq.temporada_id
WHERE teq.temporada_id<>331 AND teq.temporada_id<>333 AND teq.temporada_id<>442
ORDER BY e.club_id, e.categoria_id, e.codigoRFEF";
$mysqli = conectar();
$resultadoSQL = mysqli_query($mysqli, $consulta);
$resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

//echo $consulta; 

 
?>