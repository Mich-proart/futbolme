<?php
define('_PANEL_', 1);
require_once '../includes/config.php'; 


if ('0' == $_POST['es_seleccion']) {
    $insertar = "INSERT INTO club 
(origen_id, localidad_id, pais_id, nombre, nombre_completo, fundado, desaparecido, presidente, socios, patrocinador, presupuesto, contacto, email, telefono, web, direccion, observaciones, slug, es_seleccion, id_original) 
VALUES (NULL, '".$_POST['localidad_id']."', '".$_POST['pais_id']."', '".$_POST['nombre']."', '".$_POST['nombre_completo']."', '0', '0', '', '0', '', '0', '0', '', '', '', '', '', '', '0', '0')";
} else {
    $insertar = "INSERT INTO club 
(origen_id, localidad_id, pais_id, nombre, nombre_completo, fundado, desaparecido, presidente, socios, patrocinador, presupuesto, contacto, email, telefono, web, direccion, observaciones, slug, es_seleccion, id_original) 
VALUES (NULL, '1', '".$_POST['pais_id']."', '".$_POST['nombre']."', '".$_POST['nombre_completo']."', '0', '0', '', '0', '', '0', '0', '', '', '', '', '', '', '2', '0')";
}

echo 'club grabado - ';

$resultadoSQL = mysqli_query($mysqli, $insertar);

$consulta = 'SELECT max(id) FROM club';

$resultadoSQL = mysqli_query($mysqli, $consulta);
$resultado = mysqli_fetch_array($resultadoSQL);

$club_id = $resultado[0];

$comunidad_id = $_POST['comunidad_id'];
$provincia_id = $_POST['provincia_id'];
$categoria_id = $_POST['categoria_id'];

$insertar = "INSERT INTO equipo (categoria_id, club_id, estadio_id, equipacion_id, nombre, nombre_completo, fundado, desaparecido, debut_nacional, escudo, sexo, id_original, slug) 
VALUES ('".$categoria_id."', '".$club_id."', NULL, NULL, '".$_POST['nombre']."', '".$_POST['nombre_completo']."', '0', '0', '0', '0', '1', '0', '')";
echo ' equipo grabado.';
mysqli_query($mysqli, $insertar);

die;