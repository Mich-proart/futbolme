<?php /*
<form method='post' action='?'>
	<input type='hidden' name='arbitro' value='0'>
	<input type='hidden' name='temporada_id' value='<?php echo $temporada_id?>'>
	<input type='hidden' name='id' value='<?php echo $partido_id?>'>
	<input type='hidden' name='acta' value='<?php echo $acta?>'>

	<input type='hidden' name='elementos' value="<?php echo $cf?>">
	<input type='submit' name='avanzar' value='Grabar <?php echo $cf?> filas'></td>
	</form>
*/?>
<div id="ver-alineacion-<?php echo $partido_id?>"></div>
<table><tr><td valign="top" width="15%" bgcolor="#EEF6AB">

<?php

if (isset($_GET['modo']) && 'grabar_jugador' == $_GET['modo']) {insertarJugador($_GET['equipoActual_id'],$_GET['dorsal'],$_GET['apodo']);}

if (isset($_GET['modo']) && 'borrar_jugador' == $_GET['modo']) {borrarJugador($_GET['jugador_id']);}

if (isset($_GET['tabla'])) {
	$sql='DELETE FROM '.$_GET['tabla'].' WHERE id='.$_GET['id_nota'];
	mysqli_query($mysqli, $sql);
}
// actaDatos.php
/*
Tabla gol.
id - jugador_id - partido_id - temporada_id - minuto - tipo - esLocal - observaciones

esLocal: 0-local : 1-visitante
tipo: 0-jugada : 1-penalti : 10-propia puerta : 11-penalti fallado.
minuto: 1xx-primera parte : 2xx-segunda parte

Tabla tarjeta
id - jugador_id - partido_id - temporada_id - minuto - tipo - esLocal

tipo amonestacion: 0-primera amarilla : 1-segunda amarilla : 5-roja directa
tipo sustitucion: 2-titular : 3-sale : 4-entra : 6-suplente*/






$plantilla=array();
$cf=0;

$paraGrabar=array();

echo '<h3>Titulares Locales</h3>';
foreach ($jugador['titularL'] as $key => $value) {
	$n=explode(' ',$value['nombre']);
	//imp($n);
	$dorsal=$n[0];
	$llave=$n[1];
	if (count($n)>2){ 
		$findme   = '.';
		$pos = strpos($n[1], $findme);
		if ($pos > 0) { 
			$llave=$n[2];
		} else {
			$pos = strpos($n[2], $findme);
			if ($pos > 0) { 
				$llave=$n[1]; 
			} else { 
				if ($n[2]=='(C)' || $n[2]=='(P)') {
					$llave=$n[1];
				} else { 
					$llave=$n[1].' '.$n[2]; 
				}
			}
		}

		//cambios
		$findme   = "'";
		foreach ($n as $kn => $vn) {
		if ($kn<3){ continue; }
		$pos = strpos($vn, $findme);
			if ($pos>0) { $cambios[1][$vn][3]['dorsal']=$n[0]; }
		}
	}
	//imp($llave);
	$jugadorLocal=identificarJugadorRFEF($dorsal,$llave,$equipoLocal_id,$comunidad_id,$acta,$temporada_id, $partido_id);
	//imp($jugadorLocal);
	$plantilla[1][2][$llave]=$jugadorLocal;
}


echo '<h3>Suplentes Locales</h3>';
foreach ($jugador['suplenteL'] as $key => $value) {
	$n=explode(' ',$value['nombre']);
	//imp($n);
	$dorsal=$n[0];
	$llave=$n[1];
	if (count($n)>2){ 
		$findme   = '.';
		$pos = strpos($n[1], $findme);
		if ($pos > 0) { 
			$llave=$n[2];
		} else {
			$pos = strpos($n[2], $findme);
			if ($pos > 0) { 
				$llave=$n[1]; 
			} else { 
				if ($n[2]=='(C)' || $n[2]=='(P)') {
					$llave=$n[1];
				} else { 
					$llave=$n[1].' '.$n[2]; 
				} 
			}
		}	

		//cambios
		$findme   = "'";
		foreach ($n as $kn => $vn) {
		if ($kn<3){ continue; }
		$pos = strpos($vn, $findme);
			if ($pos>0) { 
				foreach ($cambios[1] as $key => $value) {
					if ($key==$vn){ $cambios[1][$key][4]['dorsal']=$n[0];}
				}
			}
		}
	}
	//imp($llave);
	$jugadorLocal=identificarJugadorRFEF($dorsal,$llave,$equipoLocal_id,$comunidad_id,$acta,$temporada_id, $partido_id);
	//imp($jugadorLocal);
	$plantilla[1][6][$llave]=$jugadorLocal;
} 

?>
<table width='100%' border='0' cellpadding='1' cellspacing='1' bgcolor='gainsboro'>
    <tr bgcolor="gainsboro"><td colspan="3">Local - titulares</td></tr>
    <tr bgcolor="orange"><td>id</td><td>Nombre</td><td>Apodo</td></tr>
<?php foreach ($plantilla[1][2] as $key => $value) { $cf++;
	if ($value['id']>0) { $colorBG='white'; $colorF='black'; } else { $colorBG='red'; $colorF='white';} ?>
	<tr style="background-color: <?php echo $colorBG?>; color:<?php echo $colorF?>; border-bottom: maroon 1px solid">
	<td><?php echo $value['id']?></td><td><?php echo $value['nombre']?></td>
		<td title="dorsal <?php echo $value['identificador']?>"><?php echo $value['apodo']?>

		<?php if ($value['id']==0){ ?>
			--- <a href="?acta=<?php echo $acta?>&id=<?php echo $partido_id?>&modo=grabar_jugador&equipoActual_id=<?php echo $equipoLocal_id?>&dorsal=<?php echo $value['identificador']?>&apodo=<?php echo $value['apodo']?>" style="color:yellow">Grabar</a>
		<?php } ?> -><?php echo $cf?>
		
		</td></tr>

	<?php 
	$paraGrabar[$cf]['id']=$value['id'];
	$paraGrabar[$cf]['tipo']=2;
	$paraGrabar[$cf]['minuto']=0;
	$paraGrabar[$cf]['esLocal']=1;
	$paraGrabar[$cf]['tabla']='tarjeta';
	$paraGrabar[$cf]['posicion']='';
	?>
	
<?php }?>
</table>
<table width='100%' border='0' cellpadding='1' cellspacing='1' bgcolor='gainsboro'>
    <tr bgcolor="gainsboro"><td colspan="3">Local - suplentes</td></tr>
    <tr bgcolor="orange"><td>id</td><td>Nombre</td><td>Apodo</td></tr>
<?php foreach ($plantilla[1][6] as $key => $value) { $cf++;
	if ($value['id']>0) { $colorBG='white'; $colorF='black'; } else { $colorBG='red'; $colorF='white';} ?>
<tr style="background-color: <?php echo $colorBG?>; color:<?php echo $colorF?>; border-bottom: maroon 1px solid">

	<td><?php echo $value['id']?></td><td><?php echo $value['nombre']?></td>
		<td title="dorsal <?php echo $value['identificador']?>"><?php echo $value['apodo']?>

		<?php if ($value['id']==0){ ?>
			--- <a href="?acta=<?php echo $acta?>&id=<?php echo $partido_id?>&modo=grabar_jugador&equipoActual_id=<?php echo $equipoLocal_id?>&dorsal=<?php echo $value['identificador']?>&apodo=<?php echo $value['apodo']?>" style="color:yellow">Grabar</a>
		<?php } ?>
			
		 -><?php echo $cf?>
		</td></tr>

		<?php 
		$paraGrabar[$cf]['id']=$value['id'];
		$paraGrabar[$cf]['tipo']=6;
		$paraGrabar[$cf]['minuto']=0;
		$paraGrabar[$cf]['esLocal']=1;
		$paraGrabar[$cf]['tabla']='tarjeta';
		$paraGrabar[$cf]['posicion']='';
		?>
	
<?php }?>
</table>

<?php 
if (isset($cambios[1])){
foreach ($cambios[1] as $key => $tipo) {
	foreach ($tipo as $k => $v) {
		if ($k==3) {
			foreach ($plantilla[1][2] as $value) {
				if($value['identificador']==$v['dorsal']){
					$cambios[1][$key][3]['apodo']=$value['apodo'];
					$cambios[1][$key][3]['id']=$value['id'];
					break;
				}
			}
		}
		if ($k==4) {
			foreach ($plantilla[1][6] as $value) {
				if($value['identificador']==$v['dorsal']){
					$cambios[1][$key][4]['apodo']=$value['apodo'];
					$cambios[1][$key][4]['id']=$value['id'];
					break;
				}
			}
		}
		
	}
}
?>

<table width='100%' border='0' cellpadding='1' cellspacing='1' bgcolor='gainsboro'>
    <tr bgcolor="gainsboro"><td colspan="3">Local - cambios</td></tr>
    <tr bgcolor="orange"><td>id</td><td>ord</td><td>Nombre</td><td>tipo</td><td>minuto</td></tr>
    <?php 
    $numeroCambio=1; $ultimo=0;
    foreach ($cambios[1] as $key => $tipo) { 
    	foreach ($tipo as $k1 => $t1) { $cf++; 
    	if ($ultimo==$k1){ $numeroCambio++; ?>
			<tr bgcolor="white"><td colspan="5" style="color:red"> ------Faltan datos</td></tr>
		<?php } ?>
	    <tr bgcolor="white" style="border-bottom: maroon 1px solid"><td><?php echo $t1['id']?></td>
	    	<td><?php echo $numeroCambio?></td>
	    <td><?php echo $t1['apodo']?></td><td><?php echo $k1?></td><td><?php echo $key?> -><?php echo $cf?></td>
		</tr>

		<?php 
		$paraGrabar[$cf]['id']=$t1['id'];
		$paraGrabar[$cf]['tipo']=$k1;
		$paraGrabar[$cf]['minuto']=$key;
		$paraGrabar[$cf]['esLocal']=1;
		$paraGrabar[$cf]['tabla']='tarjeta';
		$paraGrabar[$cf]['posicion']=$numeroCambio;
		if ($k1==4){ $numeroCambio++; }
		$ultimo=$k1;
		?>
		
	<?php }
	}?>
</table>

<?php
} else { echo '<h3>No hay cambios</h3>';}

$tarjetas=array();

foreach ($jugador['tarjetaL'] as $key => $vn) {
	
	$tipo=$key;
	foreach ($vn['nombre'] as $kn => $value) {

		
		$value=str_replace('"', '', $value);
		$n=explode(':',$value);
		$n=explode(',',$n[0]);
		$n=explode('jugador',$n[0]);
		$minuto=str_replace('En el minuto ', '', $n[0]);
		$minuto=str_replace(' el', '', $minuto);$minuto=trim($minuto);
		$tarjetas['tarjetaL'][$key][$kn]['minuto']=$minuto;
		if (count($n)>1){
			$tarjetas['tarjetaL'][$key][$kn]['jugador']=trim($n[1]);
			$amonestado=trim($n[1]);$amonestado=strtolower($amonestado);
			
			foreach ($plantilla[1][2] as $vp) {
				$n=quitar_acentos($vp['nombre']);$n=strtolower($n);
				//echo $n.' -->> '.$amonestado.'<br />';
				$pos = strpos($n, $amonestado);
				if ($pos > 0) { $tarjetas['tarjetaL'][$key][$kn]['id']=$vp['id']; break;}
			}

			
			
			foreach ($plantilla[1][6] as $vp) {
				$n=quitar_acentos($vp['nombre']);$n=strtolower($n);
				//echo $n.' -->> '.$amonestado.'<br />';
				$pos = strpos($n, $amonestado);
				if ($pos > 0) { $tarjetas['tarjetaL'][$key][$kn]['id']=$vp['id']; break;}
			}
		}
	}

} 


?>

<table width='100%' border='0' cellpadding='1' cellspacing='1' bgcolor='gainsboro'>
    <tr bgcolor="gainsboro"><td colspan="4">Local - tarjetas</td></tr>
    <tr bgcolor="orange"><td>id</td><td>Nombre</td><td>tipo</td><td>minuto</td></tr>
    <?php foreach ($tarjetas['tarjetaL'] as $key => $value) {
    	
    	foreach ($value as $k => $val) {
    	if ($val['minuto']=='Ninguna'){ continue; }
    	$cf++;
    		
    	?>
	    <tr bgcolor="white" style="border-bottom: maroon 1px solid"><td><?php echo $val['id']?></td>
	    <td><?php echo $val['jugador']?></td><td><?php echo $key?></td><td><?php echo $val['minuto']?> -><?php echo $cf?></td>
		</tr>

		<?php 
		$paraGrabar[$cf]['id']=$val['id'];
		$paraGrabar[$cf]['tipo']=$key;
		$paraGrabar[$cf]['minuto']=$val['minuto'];
		$paraGrabar[$cf]['esLocal']=1;
		$paraGrabar[$cf]['tabla']='tarjeta';
		$paraGrabar[$cf]['posicion']='';
		?>

		
	<?php }


	}?>
</table>

</td>

<td valign="top" width="15%" bgcolor="#EEF6AB">
<?php include('actaDatosRFEFplantillaLocal.php');?>
</td>



<td valign="top" width="15%" bgcolor="#C2FBEE">

<?php

echo '<h3>Titulares Visitantes</h3>';
foreach ($jugador['titularV'] as $key => $value) {
	$n=explode(' ',$value['nombre']);
	//imp($n);
	$dorsal=$n[0];
	$llave=$n[1];
	if (count($n)>2){ 
		$findme   = '.';
		$pos = strpos($n[1], $findme);
		if ($pos > 0) { 
			$llave=$n[2];
		} else {
			$pos = strpos($n[2], $findme);
			if ($pos > 0) { 
				$llave=$n[1]; 
			} else { 
				if ($n[2]=='(C)' || $n[2]=='(P)') {
					$llave=$n[1];
				} else { 
					$llave=$n[1].' '.$n[2]; 
				}
			}
		}
		//cambios
		$findme   = "'";
		foreach ($n as $kn => $vn) {
		if ($kn<3){ continue; }
		$pos = strpos($vn, $findme);
			if ($pos>0) { $cambios[0][$vn][3]['dorsal']=$n[0]; }
		}			
	}
	$jugadorLocal=identificarJugadorRFEF($dorsal,$llave,$equipoVisitante_id,$comunidad_id,$acta,$temporada_id, $partido_id);
	//imp($jugadorLocal);
	$plantilla[0][2][$llave]=$jugadorLocal;
}

echo '<h3>Suplentes Visitantes</h3>';
//imp($jugador['suplenteV']);
foreach ($jugador['suplenteV'] as $key => $value) {
	$n=explode(' ',$value['nombre']);
	//imp($n);
	$dorsal=$n[0];
	$llave=$n[1];
	if (count($n)>2){ 
		$findme   = '.';
		$pos = strpos($n[1], $findme);
		if ($pos > 0) { 
			$llave=$n[2];
		} else {
			$pos = strpos($n[2], $findme);
			if ($pos > 0) { 
				$llave=$n[1]; 
			} else { 
				if ($n[2]=='(C)' || $n[2]=='(P)') {
					$llave=$n[1];
				} else { 
					$llave=$n[1].' '.$n[2]; 
				} 
			}
		}	
		//cambios
		$findme   = "'";
		foreach ($n as $kn => $vn) {
		if ($kn<3){ continue; }
		$pos = strpos($vn, $findme);
			if ($pos>0) { 
				foreach ($cambios[0] as $key => $value) {
					if ($key==$vn){ $cambios[0][$key][4]['dorsal']=$n[0];}
				}
			}
		}
	}
	$jugadorLocal=identificarJugadorRFEF($dorsal,$llave,$equipoVisitante_id,$comunidad_id,$acta,$temporada_id, $partido_id);
	//imp($jugadorLocal);
	$plantilla[0][6][$llave]=$jugadorLocal;
}?>
<table width='100%' border='0' cellpadding='1' cellspacing='1' bgcolor='gainsboro'>
    <tr bgcolor="gainsboro"><td colspan="3">Visitante - titulares</td></tr>
    <tr bgcolor="orange"><td>id</td><td>Nombre</td><td>Apodo</td></tr>
<?php foreach ($plantilla[0][2] as $key => $value) { $cf++;
	if ($value['id']>0) { $colorBG='white'; $colorF='black'; } else { $colorBG='red'; $colorF='white';} ?>
	<tr style="background-color: <?php echo $colorBG?>; color:<?php echo $colorF?>; border-bottom: maroon 1px solid">
	<td><?php echo $value['id']?></td><td><?php echo $value['nombre']?></td>
			<td title="dorsal <?php echo $value['identificador']?>"><?php echo $value['apodo']?>

			<?php if ($value['id']==0){ ?>
			--- <a href="?acta=<?php echo $acta?>&id=<?php echo $partido_id?>&modo=grabar_jugador&equipoActual_id=<?php echo $equipoVisitante_id?>&dorsal=<?php echo $value['identificador']?>&apodo=<?php echo $value['apodo']?>" style="color:yellow">Grabar</a>
			<?php } ?> -><?php echo $cf?>
				

			</td></tr>
		<?php 
		$paraGrabar[$cf]['id']=$value['id'];
		$paraGrabar[$cf]['tipo']=2;
		$paraGrabar[$cf]['minuto']=0;
		$paraGrabar[$cf]['esLocal']=0;
		$paraGrabar[$cf]['tabla']='tarjeta';
		$paraGrabar[$cf]['posicion']='';
		?>
<?php }?>
</table>
<table width='100%' border='0' cellpadding='1' cellspacing='1' bgcolor='gainsboro'>
    <tr bgcolor="gainsboro"><td colspan="3">Visitante - suplentes</td></tr>
    <tr bgcolor="orange"><td>id</td><td>Nombre</td><td>Apodo</td></tr>
<?php foreach ($plantilla[0][6] as $key => $value) { $cf++;
	if ($value['id']>0) { $colorBG='white'; $colorF='black'; } else { $colorBG='red'; $colorF='white';} ?>
	<tr style="background-color: <?php echo $colorBG?>; color:<?php echo $colorF?>; border-bottom: maroon 1px solid">
	<td><?php echo $value['id']?></td><td><?php echo $value['nombre']?></td>
		<td title="dorsal <?php echo $value['identificador']?>"><?php echo $value['apodo']?>

		<?php if ($value['id']==0){ ?>
		--- <a href="?acta=<?php echo $acta?>&id=<?php echo $partido_id?>&modo=grabar_jugador&equipoActual_id=<?php echo $equipoVisitante_id?>&dorsal=<?php echo $value['identificador']?>&apodo=<?php echo $value['apodo']?>" style="color:yellow">Grabar</a>
		<?php } ?>
		 -><?php echo $cf?>

		</td></tr>
		<?php 
		$paraGrabar[$cf]['id']=$value['id'];
		$paraGrabar[$cf]['tipo']=6;
		$paraGrabar[$cf]['minuto']=0;
		$paraGrabar[$cf]['esLocal']=0;
		$paraGrabar[$cf]['tabla']='tarjeta';
		$paraGrabar[$cf]['posicion']='';
		?>
<?php }?>
</table>

<?php 

if (isset($cambios[0])){
foreach ($cambios[0] as $key => $tipo) {
	foreach ($tipo as $k => $v) {
		if ($k==3) {
			foreach ($plantilla[0][2] as $value) {
				if($value['identificador']==$v['dorsal']){
					$cambios[0][$key][3]['apodo']=$value['apodo'];
					$cambios[0][$key][3]['id']=$value['id'];
					break;
				}
			}
		}
		if ($k==4) {
			foreach ($plantilla[0][6] as $value) {
				if($value['identificador']==$v['dorsal']){
					$cambios[0][$key][4]['apodo']=$value['apodo'];
					$cambios[0][$key][4]['id']=$value['id'];
					break;
				}
			}
		}
		
	}
}
?>

<table width='100%' border='0' cellpadding='1' cellspacing='1' bgcolor='gainsboro'>
    <tr bgcolor="gainsboro"><td colspan="4">Visitante - cambios</td></tr>
    <tr bgcolor="orange"><td>id</td><td>ord</td><td>Nombre</td><td>tipo</td><td>minuto</td></tr>
    <?php $numeroCambio=1; $ultimo=0;  	
    foreach ($cambios[0] as $key => $tipo) {
    	foreach ($tipo as $k1 => $t1) { $cf++; 
    	if ($ultimo==$k1){ $numeroCambio++; ?>
			<tr bgcolor="white"><td colspan="5" style="color:red"> ------Faltan datos</td></tr>
		<?php } ?>
	    <tr bgcolor="white" style="border-bottom: maroon 1px solid"><td><?php echo $t1['id']?></td>
	    <td><?php echo $numeroCambio?></td><td><?php echo $t1['apodo']?></td><td><?php echo $k1?></td><td><?php echo $key?> -><?php echo $cf?></td>
		</tr>
		<?php 
		
		$paraGrabar[$cf]['id']=$t1['id'];
		$paraGrabar[$cf]['tipo']=$k1;
		$paraGrabar[$cf]['minuto']=$key;
		$paraGrabar[$cf]['esLocal']=0;
		$paraGrabar[$cf]['tabla']='tarjeta';
		$paraGrabar[$cf]['posicion']=$numeroCambio;
		if ($k1==4){ $numeroCambio++; }
		$ultimo=$k1;
		?>
		

	<?php }
	}?>
</table>

<?php
} else { echo '<h3>No hay cambios</h3>';}


foreach ($jugador['tarjetaV'] as $key => $vn) {
	
	$tipo=$key;
	foreach ($vn['nombre'] as $kn => $value) {

		
		$value=str_replace('"', '', $value);
		$n=explode(':',$value);
		$n=explode(',',$n[0]);
		$n=explode('jugador',$n[0]);
		$minuto=str_replace('En el minuto ', '', $n[0]);
		$minuto=str_replace(' el', '', $minuto);$minuto=trim($minuto);
		$tarjetas['tarjetaV'][$key][$kn]['minuto']=$minuto;
		
		if (count($n)>1){
			$tarjetas['tarjetaV'][$key][$kn]['jugador']=trim($n[1]);
			$amonestado=trim($n[1]);$amonestado=strtolower($amonestado);
			
			
			
			foreach ($plantilla[0][2] as $vp) {
				$n=quitar_acentos($vp['nombre']);$n=strtolower($n);
				//echo $n.' -->> '.$amonestado.'<br />';
				$pos = strpos($n, $amonestado);
				if ($pos > 0) { $tarjetas['tarjetaV'][$key][$kn]['id']=$vp['id']; break;}
			}

			
			
			foreach ($plantilla[0][6] as $vp) {
				$n=quitar_acentos($vp['nombre']);$n=strtolower($n);
				//echo $n.' -->> '.$amonestado.'<br />';
				$pos = strpos($n, $amonestado);
				if ($pos > 0) { $tarjetas['tarjetaV'][$key][$kn]['id']=$vp['id']; break;}
			}
		}
	}

} 


?>

<table width='100%' border='0' cellpadding='1' cellspacing='1' bgcolor='gainsboro'>
    <tr bgcolor="gainsboro"><td colspan="4">Local - tarjetas</td></tr>
    <tr bgcolor="orange"><td>id</td><td>Nombre</td><td>tipo</td><td>minuto</td></tr>
    <?php foreach ($tarjetas['tarjetaV'] as $key => $value) {
    	
    	foreach ($value as $k => $val) {
    	if ($val['minuto']=='Ninguna'){ continue; }
    	$cf++;
    		
    	?>
	    <tr bgcolor="white" style="border-bottom: maroon 1px solid"><td><?php echo $val['id']?></td>
	    <td><?php echo $val['jugador']?></td><td><?php echo $key?></td><td><?php echo $val['minuto']?> -><?php echo $cf?></td>
		</tr>

		<?php 
		$paraGrabar[$cf]['id']=$val['id'];
		$paraGrabar[$cf]['tipo']=$key;
		$paraGrabar[$cf]['minuto']=$val['minuto'];
		$paraGrabar[$cf]['esLocal']=0;
		$paraGrabar[$cf]['tabla']='tarjeta';
		$paraGrabar[$cf]['posicion']='';
		?>
		
	<?php }


	}?>
</table>


</td>

<td valign="top" width="15%" bgcolor="#C2FBEE" cellpadding="3">
<?php include('actaDatosRFEFplantillaVisitante.php');?>

</td>


<td valign="top" width="15%">
	<h3>DATOS EN FM 
		<span id="alineaciones-<?php echo $partido_id?>" onclick="alineaciones(<?php echo $partido_id?>,0,0)" style="background-color:orange; cursor:pointer; border: 2px solid black; padding:2px;">Goles</span>

	</h3>
	<?php 
$sql='SELECT id,jugador_id, partido_id, temporada_id, minuto, tipo, esLocal,(select apodo from jugador where id=jugador_id) jugador FROM gol WHERE partido_id='.$partido_id.' ORDER BY minuto';
 $resultadoSQL = mysqli_query($mysqli, $sql);
    $r = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);?>
    <table width='100%' border='0' cellpadding='1' cellspacing='1' bgcolor='gainsboro'>
	    <tr bgcolor="celeste"><td colspan="4">Goles en BD</td></tr>
	    <tr bgcolor="yellow"><td>minuto</td><td>Nombre</td><td>id</td><td>tipo</td><td>-</td></tr>
	    <?php foreach ($r as $key => $val) {?>
		    <tr bgcolor="white" style="border-bottom: black 1px solid">
		    	<td><?php echo $val['minuto']?></td>
		    	<td><?php echo $val['jugador']?></td>
		    	<td><?php echo $val['jugador_id']?></td>
		    	<td><?php echo $val['tipo']?> <a href="?id=<?php echo $partido_id?>&acta=<?php echo $acta?>&tabla=gol&id_nota=<?php echo $val['id']?>">Q</a></td>
		    	<td><?php echo $val['esLocal']?></td>
			</tr>
		<?php }?>
	</table>

	<?php 
$sql='SELECT id,jugador_id, partido_id, temporada_id, minuto, tipo, esLocal,(select apodo from jugador where id=jugador_id) jugador FROM tarjeta WHERE partido_id='.$partido_id.' ORDER BY minuto DESC, esLocal DESC, tipo DESC';
 $resultadoSQL = mysqli_query($mysqli, $sql);
    $r = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);?>
    <table width='100%' border='0' cellpadding='1' cellspacing='1' bgcolor='gainsboro'>
	    <tr bgcolor="celeste"><td colspan="4">Alineaciones, cambios, tarjetas en BD</td></tr>
	    <tr bgcolor="yellow"><td>minuto</td><td>Nombre</td><td>id</td><td>tipo</td><td>-</td></tr>
	    <?php 
	    $sustitucion=0;$amonestacion=0;$supL=0;$titL=0;$supV=0;$titV=0;
	    foreach ($r as $key => $val) {
	    	if (($val['tipo']<2 || $val['tipo']==4 || $val['tipo']==5) && $sustitucion==0){ ?>
	    		<tr bgcolor="green"><td colspan="4" style="color:white">Cambios y tarjetas</td></tr>
	    	<?php $sustitucion++; }

	    	if (($val['tipo']==6 && $val['esLocal']==1) && $supL==0){ ?>
	    		<tr bgcolor="green"><td colspan="4" style="color:white">Suplentes locales</td></tr>
	    	<?php $supL++; }
	    	if (($val['tipo']==2 && $val['esLocal']==1) && $titL==0){ ?>
	    		<tr bgcolor="green"><td colspan="4" style="color:white">Titulares locales</td></tr>
	    	<?php $titL++; }

	    	if (($val['tipo']==6 && $val['esLocal']==0) && $supV==0){ ?>
	    		<tr bgcolor="green"><td colspan="4" style="color:white">Suplentes visitantes</td></tr>
	    	<?php $supV++; }
	    	if (($val['tipo']==2 && $val['esLocal']==0) && $titV==0){ ?>
	    		<tr bgcolor="green"><td colspan="4" style="color:white">Titulares visitantes</td></tr>
	    	<?php $titV++; }

	    	$colorC1='white'; $colorC='white';$colorF='white';
	    	if ($val['esLocal']==0){ $colorC='gainsboro'; $colorF='gainsboro'; }
	    	if ($val['tipo']==3){ $colorC1='#F5B7B1'; }
	    	if ($val['tipo']==4){ $colorC1='#ABEBC6'; }
	    	if ($val['tipo']<2 || $val['tipo']==5){
	    		switch ($val['tipo']) {
	    			case '0':$colorC='yellow';break;
	    			case '1':$colorC='gold';break;
	    			case '5':$colorC='red';break;
	    		}
	    	}

	    	 ?>
		    <tr bgcolor="<?php echo $colorF?>" style="border-bottom: black 1px solid">
		    	<td bgcolor="<?php echo $colorC1?>"><?php echo $val['minuto']?></td>
		    	<td><?php echo $val['jugador']?></td>
		    	<td><?php echo $val['jugador_id']?></td>
		    	<td bgcolor="<?php echo $colorC?>"><?php echo $val['tipo']?> <a href="?id=<?php echo $partido_id?>&acta=<?php echo $acta?>&tabla=tarjeta&id_nota=<?php echo $val['id']?>">Q</a></td>
		    	<td><?php echo $val['esLocal']?></td>
			</tr>
		<?php }?>
	</table>
</td>

<td valign="top" width="20%">
	<h3>DATOS A GRABAR</h3>

	

	<table width='100%' border='0' cellpadding='1' cellspacing='1' bgcolor='gainsboro'>
    <tr bgcolor="gainsboro"><td colspan="4">Goles</td></tr>
	<?php 
	$goles=array();

	foreach ($jugador['goles'] as $key => $value) {
		if ($key==1){ $esLocal=1;} else { $esLocal=0; }
		
		
		foreach ($value as $k => $v) {
			$apodo='';
			$minuto=0;
			$tipo=0;
			$dato=explode(' ',$v['resultado']);
			foreach ($dato as $k1 => $d1) {

				$findme   = '.';
				$pos = strpos($d1, $findme);
				if ($pos > 0) { $d1=''; } 
				//imp($d1);
				$pos = strpos($d1, '´');
				if ($pos > 0) { $minuto=$d1; $d1=''; } 
				$pos = strpos($d1, 'P)');
				if ($pos > 0) { 
					if (strlen($d1)>3){ $tipo=10; } else { $tipo=1; }
					$d1='';
				}
				
				if ($d1!=''){ $apodo=$apodo.' '.$d1; }
			}

			$jugador_id=0;$apodo=trim($apodo);$apodo=strtolower($apodo);

			foreach ($plantilla[$key][2] as $value) {
				$n=quitar_acentos('z '.$value['nombre'].' '.$value['apodo']);$n=strtolower($n);
				//echo $n.' -->> '.$apodo.'<br />';
				$pos = strpos($n, $apodo);
				if ($pos > 0) { $jugador_id=$value['id']; break;}
			}

			foreach ($plantilla[$key][6] as $value) {
				$n=quitar_acentos('z '.$value['nombre'].' '.$value['apodo']);$n=strtolower($n);
				//echo $n.' -->> '.$apodo.'<br />';
				$pos = strpos($n, $apodo);
				if ($pos > 0) { $jugador_id=$value['id']; break;}
			} ?>
			
			
		<tr><td>
			<?php 
			$cf++;
			echo 'apodo: '.$apodo.' ('.$jugador_id.') - minuto: '.$minuto.' - tipo: '.$tipo.' - local: '.$esLocal.' ->'.$cf.'<br />';?>
		</td></tr>

		<?php 
		$paraGrabar[$cf]['id']=$jugador_id;
		$paraGrabar[$cf]['tipo']=$tipo;
		$paraGrabar[$cf]['minuto']=$minuto;
		$paraGrabar[$cf]['esLocal']=$esLocal;
		$paraGrabar[$cf]['tabla']='gol';
		$paraGrabar[$cf]['posicion']='';
		}


	}?>

	</table>
		<form method='post' action='?'>
		  <input type='hidden' name='partido_id' value='<?php echo $partido_id?>'>
  		  <input type='hidden' name='acta' value='<?php echo $acta?>'>
  		  <input type='hidden' name='temporada_id' value='<?php echo $temporada_id?>'>
  		  <?php foreach ($paraGrabar as $i => $v) { 
  		  $minuto=arregloMinuto($v['minuto'])?>
  		  <input type="text" size="2" value="<?php echo $i?>" name="indice[<?php echo $i?>]" readonly />
  		  

  		  <input type="checkbox" <?php if ($v['tabla']=='tarjeta') { echo 'checked="checked"'; } ?> name="check[<?php echo $i?>]"/>


  		  <input type="text" size="8" value="<?php echo $v['tabla']?>" name="tabla[<?php echo $i?>]"/>
  		  <input type="text" size="1" value="<?php echo $v['esLocal']?>" name="esLocal[<?php echo $i?>]"/>
  		  <input type="text" size="1" value="<?php echo $v['tipo']?>" name="tipo[<?php echo $i?>]"/>
  		  <input type="text" size="3" value="<?php echo $minuto?>" name="minuto[<?php echo $i?>]"/>
  		  <input type="text" size="6" value="<?php echo $v['id']?>" name="jugador[<?php echo $i?>]"/>
  		  <input type="text" size="6" value="<?php echo $v['posicion']?>" name="posicion[<?php echo $i?>]"/>
		  <br />
  		  <?php } ?>
		  <input type='submit' name='grabar' value='grabar'></td>
		</form>


</td>




</tr></table>


<?php
