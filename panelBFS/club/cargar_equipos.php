<?php
define('_FUTBOLME_', 1);



require_once '../../src/consultas.php';
require_once 'consultasClub.php';

$categorias=categorias();

$mysqli = conectar();
$sq='SELECT id,observaciones FROM club WHERE territorialRFEF="05" AND futbolbase_id>0 AND origen_id IS NULL ORDER BY id LIMIT 1';
$resultadoSQL = mysqli_query($mysqli, $sq);
$fed = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
if (count($fed)==0){ die('FINALIZADO'); }
$id=$fed['id'];
$observaciones=$fed['observaciones'];



$sq='SELECT id,nombre,categoria_id, federacion_id FROM equipo WHERE club_id='.$id;
$resultadoSQL = mysqli_query($mysqli, $sq);
$equiposBD = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);


?>
<select size="20">
<?php foreach ($categorias as $key => $value) { ?>
	<option value="<?php echo $value['id']?>"><?php echo $value['nombre'] ?> - <?php echo $value['id']?> - <?php echo $value['orden']?></option>
<?php } ?>
</select>
<?php 
$f = 'datos/'.$id.'_datos.json';
if (@file_exists($f)) { 	
	$json = file_get_contents($f);
	$datos = json_decode($json, true);

	$obs='';$web='';$email='';$telefono='';
	foreach ($datos['datos'] as $key => $value) {
		if (($key>0 && $key<5) || ($key>7 && $key<11) || $key==6){
			$obs.=$value['valor'].'<br />';
		}
		if ($key==7){ $web=$value['valor'];}
		if ($key==17){ $email=$value['valor'];}
		if ($key==18){ $telefono=$value['valor'];} 
	}
	$obs=$obs.$observaciones;
	$pw=explode(':', $web);
	$web=trim($pw[1])??'';
	$pem=explode(':', $email);
	$email=trim($pem[1])??'';
	$pt=explode(':', $telefono);
	$telefono=trim($pt[1])??'';
	imp($web);
	imp($email);
	imp($telefono);
	?>
	<table>
	<?php foreach ($equiposBD as $key => $value) { ?>
		<tr><td><?php echo $value['federacion_id']?></td><td><?php echo $value['nombre']?></td>
			<td>Id equipo: <?php echo $value['id']?></td>
			<td><?php echo $value['categoria_id']?></td>
		</tr>

	<?php }
	foreach ($datos['equipos'] as $key => $value) { 
		$f_eq=$value['url'];
		$f_eq=str_replace('/pnfg/NPcd/NFG_VisEquipos?cod_primaria=1000119&Codigo_Equipo=', '', $f_eq);
		$nom_eq=$value['equipo'];
		$nom_eq=str_replace('"', '', $nom_eq);


        $nom_eq = ucwords(mb_strtolower($nom_eq));
        $nom_eq=str_replace('C.d.', 'CD', $nom_eq);
        $nom_eq=str_replace('CDb.', 'CDB', $nom_eq);
        $nom_eq=str_replace('CD Atlético', 'CDA', $nom_eq);
        $nom_eq=str_replace('A.d.', 'AD', $nom_eq);
        $nom_eq=str_replace('A.d.', 'AD', $nom_eq);
        $nom_eq=str_replace('A.d', 'AD', $nom_eq);
        $nom_eq=str_replace('C.f.', 'CF', $nom_eq);
        $nom_eq=str_replace('Club De Futbol', 'CF', $nom_eq);
        $nom_eq=str_replace('F.c.', 'FC', $nom_eq);
        $nom_eq=str_replace('S.a.d.', 'SAD', $nom_eq);
        $nom_eq=str_replace('C.r.', 'CR', $nom_eq);
        $nom_eq=str_replace('C.d.', 'CD', $nom_eq);
        $nom_eq=str_replace('R.c.d.', 'RCD', $nom_eq);
        $nom_eq=str_replace('R.s.d.', 'RSD', $nom_eq);
        $nom_eq=str_replace('U.d.', 'UD', $nom_eq);
        $nom_eq=str_replace('Unión Deportiva', 'UD', $nom_eq);
        $nom_eq=str_replace('U.d', 'UD', $nom_eq); 
        $nom_eq=str_replace('Escuela Futbol De', 'EF de', $nom_eq); 
        $nom_eq=str_replace('E.m.f.', 'EMF', $nom_eq); 
        $nom_eq=str_replace('Emf.', 'EMF', $nom_eq); 
        $nom_eq=str_replace('Esc. fut.', 'EF', $nom_eq); 
        $nom_eq=str_replace('Esc.fut.at', 'EFA', $nom_eq); 
        $nom_eq=str_replace('U.r.j.c.', 'URJC', $nom_eq); 
        $nom_eq=str_replace('Esc. mun.', 'EM', $nom_eq); 
        
        $nom_eq=str_replace('Asoc. Rec.', 'AR', $nom_eq);  
		$nom_eq=str_replace('CFd.', 'CFD', $nom_eq); 
		$nom_eq=str_replace('ADc.', 'ADC', $nom_eq); 
		$nom_eq=str_replace('CDe.', 'CDE', $nom_eq); 
		$nom_eq=str_replace('CD Futbol.', 'CDF', $nom_eq); 
		$nom_eq=str_replace('CDEf.', 'CDEF', $nom_eq); 
		$nom_eq=str_replace('CDv.', 'CDV', $nom_eq); 
		$nom_eq=str_replace('A.v.', 'AV', $nom_eq);  

        
         


		$tor=$value['torneo'];
		$cat=0;$categoria=0;
		for ($i=0; $i < 14 ; $i++) {
			if ($i==0){ 
				$findme='FEMENINO';
				$pos = strpos($tor, $findme);
				if ($pos !== false) { $i=8; }				 
			} 
			if ($i==0){ 
				$findme='NACIONAL';
				$pos = strpos($tor, $findme);
				if ($pos !== false) { $cat=1;$i=14; }				 
			} 
			if ($i==0){ 
				$findme='SELECCIONES';
				$pos = strpos($tor, $findme);
				if ($pos !== false) { $cat=1;$i=14; }				 
			} 
			if ($i==0){ $findme='CATEGORIA'; $cat=1; }
			if ($i==1){ $findme='AFICIONADOS'; $cat=1; }
			if ($i==2){ $findme='JUVENIL'; $cat=3; }
			if ($i==3){ $findme='CADETE'; $cat=4; }
			if ($i==4){ $findme='INFANTIL'; $cat=21; }
			if ($i==5){ $findme='ALEVIN'; $cat=23; }
			if ($i==6){ $findme=' BENJAMIN'; $cat=24; }
			if ($i==7){ $findme='PREBENJAMIN'; $cat=25; }
			if ($i==8){ $findme='FUTBOL FEMENINO'; $cat=2; }
			if ($i==9){ $findme='FEMENINO JUVENIL'; $cat=26; }
			if ($i==10){ $findme='FEMENINO CADETE'; $cat=27; }
			if ($i==11){ $findme='FEMENINO INFANTIL'; $cat=28; }
			if ($i==12){ $findme='DEBUTANTE'; $cat=29; }
			if ($i==13){ $findme='FEMENINO ALEVIN'; $cat=30; }
			$pos = strpos($tor, $findme);
			if ($pos !== false) { $categoria=$cat; break; }
		}

		if ($categoria==0){ 
			imp($value);
			die('repasar categorias'); 
		}

			$grabacion=0;$txt='para insertar';
			foreach ($equiposBD as $k => $v) {				
				if ($v['federacion_id']==(int)$f_eq){ 
					$txt='ya esta grabado'; $grabacion=2;					
				}
				if ($v['categoria_id']==$categoria && $v['federacion_id']==0){ 
					if (substr($nom_eq, -2)==' A'){
						$txt='actualizar federacion_id: '.$f_eq.' al equipo_id:'.$v['id'];
						$grabacion=1; $equipo_id=$v['id'];
					} else {
						if (substr($nom_eq, -2)==substr($v['nombre'], -2)){
							$txt='actualizar federacion_id: '.$f_eq.' al equipo_id:'.$v['id'];
							$grabacion=1;$equipo_id=$v['id'];
						} else {
							$txt='para insertar';$grabacion=0;
						}
					}
				}
			}

			switch ($grabacion) {
				case 0:
					$sq='INSERT INTO equipo (categoria_id, club_id, nombre, nombreCorto, codigoRFEF, federacion_id) 
		  	VALUES ("'.$categoria.'","'.$id.'","'.$nom_eq.'","'.$nom_eq.'","000","'.$f_eq.'")';
					mysqli_query($mysqli, $sq);
					echo $sq.'<br />';
					break;
				case 1:
					$sq='UPDATE equipo SET federacion_id='.$f_eq.' WHERE id='.$equipo_id;
					mysqli_query($mysqli, $sq);
					echo $sq.'<br />';
					break;
			}

		?>
		<tr><td><?php echo $f_eq?></td><td><?php echo $nom_eq?></td><td><?php echo $tor?></td>
			<td><?php echo $categoria?></td><td><?php echo $txt?></td>
		</tr>
		
	<?php } ?>
	</table>

<?php } 



$sq='UPDATE club SET origen_id=1,observaciones="'.$obs.'",web="'.$web.'",email="'.$email.'",telefono="'.$telefono.'" WHERE id='.$id;
	    echo $sq.'<br />';
		mysqli_query($mysqli, $sq);


function imp($ob)
{
    if (!empty($ob)) {
        echo '<pre>';
        print_r($ob);
        echo '</pre>';
    }
}


?>

<script LANGUAGE="JavaScript"> 
var pagina="cargar_equipos.php"; 

function redireccionar() 
{ 
location.href=pagina 
} 
setTimeout ("redireccionar()", 3000); 
</script> 
