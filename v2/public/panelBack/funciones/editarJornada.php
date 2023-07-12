<?php 
define('_PANEL_', 1);
require_once '../includes/config.php';

imp($_POST);

$j=$_POST['j'];$ct=$_POST['ct'];$t=$_POST['t'];		

if (isset($_POST['modo'])){
	if ($_POST['modo']=='cambiarIds'){
			$partidos=count($_POST['id']);
			for ($i=0; $i < $partidos; $i++) {
			    $sql="UPDATE partido SET 
			    fecha='".$_POST['fecha'][$i]."',
			    hora_prevista='".$_POST['hora_prevista'][$i]."',
			    equipoLocal_id=".$_POST['equipoLocal_id'][$i].", 
			    equipoVisitante_id=".$_POST['equipoVisitante_id'][$i]." WHERE id=".$_POST['id'][$i];
    			mysqli_query($mysqli, $sql);
			    
			}			
   	}


$nJ=$_POST['nJ']??0;

	if ($_POST['modo']=='crear'){
		if(is_numeric($nJ) && $nJ>0) {
			$sql='INSERT INTO partido(temporada_id, equipoLocal_id, equipoVisitante_id, jornada) 
			SELECT  temporada_id, equipoLocal_id, equipoVisitante_id, "'.$nJ.'" FROM partido WHERE temporada_id='.$t.' AND jornada='.$j;
			echo $sql.'<br />';
    		mysqli_query($mysqli, $sql);
		}
		die('modo crear');
	}

	if ($_POST['modo']=='invertir'){ //invertimos la jornada
		if(is_numeric($nJ) && $nJ>0) {
			$sql='INSERT INTO partido(temporada_id, equipoLocal_id, equipoVisitante_id, jornada) 
			SELECT  temporada_id, equipoVisitante_id, equipoLocal_id, "'.$nJ.'" FROM partido WHERE temporada_id='.$t.' AND jornada='.$j;
			mysqli_query($mysqli, $sql);
    		
		}
	}

	if ($_POST['modo']=='borrarJornada'){ //invertimos la jornada
		if(is_numeric($nJ) && $nJ>0) {
			$sql='DELETE FROM partido WHERE temporada_id='.$t.' AND jornada='.$nJ;			
			mysqli_query($mysqli, $sql);
    		
		}
	}

	if ($_POST['modo']=='borrarJornadas'){ 
		$nJ2=$_POST['nJ2'];
		if(is_numeric($nJ) && is_numeric($nJ2)) {
			$sql='DELETE FROM partido WHERE temporada_id='.$t.' AND jornada>='.$nJ.' AND jornada<='.$nJ2;
			mysqli_query($mysqli, $sql);    		
		}
	}

	if ($_POST['modo']=='duplicarJornadas'){
		$nJ2=$_POST['nJ2'];$nJ3=$_POST['nJ3'];
		if(is_numeric($nJ) && is_numeric($nJ2) && is_numeric($nJ3)) {
			$sql='INSERT INTO partido(temporada_id, equipoLocal_id, equipoVisitante_id, jornada) 
			SELECT  temporada_id, equipoLocal_id, equipoVisitante_id, (jornada-'.$nJ.')+'.$nJ3.' FROM partido WHERE temporada_id='.$t.' AND jornada>='.$nJ.' AND jornada<='.$nJ2;
			mysqli_query($mysqli, $sql);    		
		}
	}

	if ($_POST['modo']=='invertirJornadas'){
		$nJ2=$_POST['nJ2'];$nJ3=$_POST['nJ3'];
		if(is_numeric($nJ) && is_numeric($nJ2) && is_numeric($nJ3)) {
			$sql='INSERT INTO partido(temporada_id, equipoLocal_id, equipoVisitante_id, jornada) 
			SELECT  temporada_id, equipoVisitante_id, equipoLocal_id, (jornada-'.$nJ.')+'.$nJ3.' FROM partido WHERE temporada_id='.$t.' AND jornada>='.$nJ.' AND jornada<='.$nJ2;
			mysqli_query($mysqli, $sql);    		
		}
	}
}

$equipos = Xequipos_temporada($t);
$partidos = Xpartidos($t, $j);



?>

 <h3>Jornada <?php echo $j; ?></h3>
        <form onsubmit="submitEditarJornada(event,$(this).serialize(),<?php echo $j?>,<?php echo $t?>)" id="formjt">
            <table>
        	<tbody>
            <input type="hidden" name="t" value="<?php echo $t; ?>">
 			<input type="hidden" name="j" value="<?php echo $j; ?>">
 			<input type="hidden" name="ct" value="<?php echo $ct; ?>">
 			<input type="hidden" name="modo" value="cambiarIds">
 
                <?php foreach ($partidos as $partido) { ?>
 				<input type="hidden" name="id[]" value="<?php echo $partido['id']; ?>">    
                <tr>
                    
                    <td>
                        <select style="width: 100%;" class="equipo-seleccionable" data-posicion="<?php echo $partido['local']; ?>" name="equipoLocal_id[]">
                            <option value=""></option>
                            <?php foreach ($equipos as $equipo) { ?>
                            <option value="<?php echo $equipo['equipo_id']; ?>"
                            	<?php if ($equipo['equipo_id']==$partido['equipoLocal_id']) { ?> selected <?php } ?>>
                            	<?php echo $equipo['nombre']; ?></option>
                            <?php  } ?>
                        </select>
                    </td>
                    <td align="right">
                        <select style="width: 100%;" data-posicion="<?php echo $partido['visitante']; ?>" class="equipo-seleccionable" name="equipoVisitante_id[]">
                            <option value=""></option>
                            <?php foreach ($equipos as $equipo) { ?>
                            <option value="<?php echo $equipo['equipo_id']; ?>"
                            	<?php if ($equipo['equipo_id']==$partido['equipoVisitante_id']) { ?> selected <?php } ?>>
                            	<?php echo $equipo['nombre']; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <td><input type="text" size="10" name="fecha[]" value="<?php echo $partido['fecha']; ?>"></td>
                    <td><input type="text" size="8" name="hora_prevista[]" value="<?php echo $partido['hora_prevista']; ?>"></td>
                    
                </tr>                
                <?php  } ?>
            </tbody>
        </table>
        
        <div style="width:100%; text-align:right">
        
        <input type="submit" name="validar" value="validar">
        </div>
        </form>
        
    </div>




<table border="1">
	<tr bgcolor="grey" style="color:white; padding:5px"><td>Editar jornada <?php echo $_POST['j']?></td></tr>
	<tr bgcolor="white">
	<td>
	<form  onsubmit="submitEditarJornada(event,$(this).serialize(),<?php echo $j?>,<?php echo $t?>)" method="POST">
			<input type="hidden" name="j" value="<?php echo $_POST['j']?>">
			<input type="hidden" name="t" value="<?php echo $_POST['t']?>">
			<input type="hidden" name="ct" value="<?php echo $_POST['ct']?>">
			<input type="hidden" name="modo" value="crear">
		Crear otra EXACTAMENTE IGUAL en la jornada <input type="text" size="2" name="nJ">
			<input type="submit" name="boton" value="crear">
		</form>
	</td></tr>
	<tr bgcolor="white"><td>
	<form  onsubmit="submitEditarJornada(event,$(this).serialize(),<?php echo $j?>,<?php echo $t?>)" method="POST">
			<input type="hidden" name="j" value="<?php echo $_POST['j']?>">
			<input type="hidden" name="t" value="<?php echo $_POST['t']?>">
			<input type="hidden" name="ct" value="<?php echo $_POST['ct']?>">
			<input type="hidden" name="modo" value="invertir">		
	Crear otra jornada INVERTIDA en la jornada <input type="text" size="2" name="nJ">
			<input type="submit" name="boton" value="invertir">
		</form>
	</td></tr>
	
	<tr bgcolor="grey" style="color:white; padding:5px"><td>Editar calendario</td></tr>
	<tr bgcolor="white"><td>
		<form onsubmit="submitEditarJornada(event,$(this).serialize(),<?php echo $j?>,<?php echo $t?>)" method="POST">
			<input type="hidden" name="j" value="<?php echo $_POST['j']?>">
			<input type="hidden" name="t" value="<?php echo $_POST['t']?>">
			<input type="hidden" name="ct" value="<?php echo $_POST['ct']?>">		
			<input type="hidden" name="modo" value="duplicarJornadas">
	DUPLICAR calendario de la jornada <input type="text" size="2" name="nJ">
	a la <input type="text" size="2" name="nJ2"> empezando por la <input type="text" size="2" name="nJ3">
			<input type="submit" name="boton" value="duplicarJornadas">
		</form>
	</td></tr>

	<tr bgcolor="white"><td>
		<form onsubmit="submitEditarJornada(event,$(this).serialize(),<?php echo $j?>,<?php echo $t?>)" method="POST">
			<input type="hidden" name="j" value="<?php echo $_POST['j']?>">
			<input type="hidden" name="t" value="<?php echo $_POST['t']?>">
			<input type="hidden" name="ct" value="<?php echo $_POST['ct']?>">
			<input type="hidden" name="modo" value="invertirJornadas">		
	INVERTIR calendario de la jornada <input type="text" size="2" name="nJ">
	a la <input type="text" size="2" name="nJ2"> empezando por la <input type="text" size="2" name="nJ3">
			<input type="submit" name="boton" value="invertirJornadas">
		</form>
	</td></tr>

	<tr bgcolor="white"><td>
		<form onsubmit="submitEditarJornada(event,$(this).serialize(),<?php echo $j?>,<?php echo $t?>)" method="POST">
			<input type="hidden" name="j" value="<?php echo $_POST['j']?>">
			<input type="hidden" name="t" value="<?php echo $_POST['t']?>">
			<input type="hidden" name="ct" value="<?php echo $_POST['ct']?>">
			<input type="hidden" name="modo" value="borrarJornada">		
	BORRAR jornada <input type="text" size="2" name="nJ">
			<input type="submit" name="boton" value="borrar">
		</form>
	</td></tr>
	<tr bgcolor="white"><td>
		<form onsubmit="submitEditarJornada(event,$(this).serialize(),<?php echo $j?>,<?php echo $t?>)" method="POST">
			<input type="hidden" name="j" value="<?php echo $_POST['j']?>">
			<input type="hidden" name="t" value="<?php echo $_POST['t']?>">
			<input type="hidden" name="ct" value="<?php echo $_POST['ct']?>">
			<input type="hidden" name="modo" value="borrarJornadas">			
	BORRAR jornadas de la <input type="text" size="2" name="nJ">
	a la <input type="text" size="2" name="nJ2">
			<input type="submit" name="boton" value="borrarJornadas">
		</form>
	</td></tr>	
</table>
