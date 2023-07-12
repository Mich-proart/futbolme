<?php
define('_FUTBOLME_', 1);

require_once '../consultas.php';
require_once '../funciones.php';
$id=$_POST['id'];

if (isset($_POST['modo'])){

$comunidad_id=$_POST['comunidad_id']+1;	

	$sql='INSERT INTO torneo
(categoria_torneo_id, categoria_id, pais_id, comunidad_id, apiRFEFcompeticion, apiRFEFgrupo, nombre, traduccion, torneoCorto, orden, visible,  tipo_torneo, sexo, discr, desarrollo, inicio)
VALUES
("'.$_POST['categoria_torneo_id'].'","'.$_POST['categoria_id'].'","'.$_POST['pais_id'].'","'.$comunidad_id.'","'.$_POST['apiRFEFcompeticion'].'","'.$_POST['apiRFEFgrupo'].'","'.$_POST['nombre'].'","'.$_POST['nombre'].'","'.$_POST['nombre'].'","'.$_POST['orden'].'","'.$_POST['visible'].'","'.$_POST['tipo_torneo'].'","'.$_POST['sexo'].'","'.$_POST['discr'].'","'.$_POST['desarrollo'].'","'.$_POST['inicio'].'")'; 
echo $sql.'<br />'; 
$mysqli = conectarFM();
mysqli_query($mysqli, $sql);
$ultimo_id=mysqli_insert_id($mysqli);


$sql='INSERT INTO liga (id, jornadas, jornadaActiva, tipoClasificacion, tipoPuntuacion) VALUES ("'.$ultimo_id.'", "'.$_POST['jornadas'].'", 1, 0, 3)';
echo $sql.'<br />'; 
mysqli_query($mysqli, $sql);

echo '<a href="/panelBack/federacion/index.php?comunidad_id='.$_POST['comunidad_id'].'">Refrescar</a>';

} else {


$sql='SELECT id, comunidad_id, orden, categoria, nombre, grupo, competicion_id, grupo_id, equipos, rondas, jornadas, estado, temporada_id FROM torneo WHERE id='.$id;

$mysqli = conectar();
$resultadoSQL = mysqli_query($mysqli, $sql);
//echo $consulta;
$resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC); ?>

<form method="post" id="inserto" onsubmit="submitInsertarTorneo(event, $(this).serialize(),<?php echo $id?>)">
  <input type="hidden" name="modo" value="insertar">
  <input type="hidden" name="id" value="<?php echo $resultado['id']?>">
  <input type="hidden" name="comunidad_id" value="<?php echo $resultado['comunidad_id']?>">
  <input type="hidden" name="apiRFEFcompeticion" value="<?php echo $resultado['competicion_id']?>">
  <input type="hidden" name="apiRFEFgrupo" value="<?php echo $resultado['grupo_id']?>">
  <input type="hidden" name="jornadas" value="<?php echo $resultado['jornadas']?>">
  <input type="hidden" name="pais_id" value="60">
  <input type="hidden" name="sexo" value="0">
  <input type="hidden" name="discr" value="-">
  <input type="hidden" name="desarrollo" value="0">
  <input type="hidden" name="inicio" value="0000-00-00">
  <br />nombre: <input type="text" size="50" name="nombre" value="<?php echo $resultado['nombre']?> - <?php echo $resultado['grupo']?>">
  <br />categoria: <b><?php echo $resultado['categoria']?></b>
  <hr />categoria_torneo_id: <input type="text" name="categoria_torneo_id" value="" required size="1">
   - categoria_id: <input type="text" name="categoria_id" value="" required size="1">
   - orden: <input type="text" name="orden" value="" required size="4">
  <hr />visible: <input type="text" name="visible" value="4" required size="1">
  - tipo_torneo: <input type="text" name="tipo_torneo" value="1" required size="1">
  - jornadas: <input type="text" name="jornadas" value="<?php echo $resultado['jornadas']?>" size="2">
  
  <input type="submit" name="enviar" value="insertar torneo">
  <br /><br />
</form>

<?php 

}
/*

/// crear categoria ///
INSERT INTO categoria (id, nombre, orden, id_original, slug) VALUES (NULL, 'Base Femenino', '9', '0', 'base-femenino'); el id es 22

/// crear torneo ///

INSERT INTO torneo
(id, categoria_torneo_id, categoria_id, pais_id, comunidad_id, nombre, traduccion, torneoCorto, orden, visible,  tipo_torneo, discr, desarrollo)
VALUES
(NULL, '7', '22','60', '7', 'Femenino Base Grupo 3', '', 'Femenino Base Grupo 3', '120', '4',   '1', '0', '0');  El id es 645

/// Creamos la temporada ///

INSERT INTO temporada (id, torneo_id, nombre, id_original) VALUES (NULL, '645', 'Femenino Base Grupo 3', '645');  el id es 599

/// Configuramos jornada ///

INSERT INTO liga (id, jornadas, jornadaActiva, tipoClasificacion, tipoPuntuacion) VALUES ('645', '18', '9', '0', '3');

*/
?>