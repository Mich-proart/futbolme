<?php
define('_PANEL_', 1);
require_once '../../includes/config.php';
include('../../simple/simple_html_dom.php');
$comunidad_id=$_GET['comunidad_id']??$_POST['comunidad_id'];
$competicion=$_GET['competicion']??0;
$grupo=$_GET['grupo']??0;
if (isset($_POST['competicion'])){$competicion=$_POST['competicion'];}
if (isset($_POST['grupo'])){$grupo=$_POST['grupo'];}

require_once '../funciones/urlFederaciones.php';

$modelo='novanet';
$vCompeticion='&CodCompeticion='.$competicion;
$vGrupo='&CodGrupo='.$grupo;

if ($comunidad_id==2 || $comunidad_id==6 || $comunidad_id==8 || $comunidad_id==15) {
	$modelo='isquad';
	$vCompeticion='id_competicion='.$competicion;
	$vGrupo='id_grupo='.$grupo.'&id_fase='.$fase;
	
}

if ($competicion>0){ 
	$url=str_replace('xxx', $vCompeticion, $url);	
}
if ($grupo>0){ 
	$url=str_replace('yyy', $vGrupo, $url); 
}
$url=str_replace('xxx', '', $url); 
$url=str_replace('yyy', '', $url); 
    

echo ' - <a href="'.$url.'" target="_blank">ver</a><hr />';


?>
<table><tr>
<td valign="top" style="display:none"><h3>Calendario</h3>
<form method="post" action="gruposSelect.php">
<input type="hidden" name="comunidad_id" value="<?php echo $comunidad_id?>">
<input type="hidden" name="competicion" value="<?php echo $competicion?>">
<input type="hidden" name="grupo" value="<?php echo $grupo?>">
<input type="hidden" name="pedido" value="calendario">
<textarea name="codigo" cols="60" rows="20" ></textarea>
<input type="submit" name="enviar" value="enviar">
</form>
</td>
<td valign="top"><h3>Equipos</h3>
<form method="post" action="gruposSelect.php">
<input type="hidden" name="comunidad_id" value="<?php echo $comunidad_id?>">
<input type="hidden" name="competicion" value="<?php echo $competicion?>">
<input type="hidden" name="grupo" value="<?php echo $grupo?>">
<input type="hidden" name="pedido" value="equipos">
<textarea name="codigo" cols="60" rows="20" ></textarea>
<input type="submit" name="enviar" value="enviar">
</form>
</td>
<td valign="top"><h3>Grupos</h3>
<form method="post" action="gruposSelect.php">
<input type="hidden" name="comunidad_id" value="<?php echo $comunidad_id?>">
<input type="hidden" name="competicion" value="<?php echo $competicion?>">
<input type="hidden" name="grupo" value="<?php echo $grupo?>">
<input type="hidden" name="pedido" value="grupos">
<textarea name="codigo" cols="60" rows="20" ></textarea>
<input type="submit" name="enviar" value="enviar">
</form>
</td>
<td valign="top"><h3>Campeonatos</h3>
<form method="post" action="gruposSelect.php">
<input type="hidden" name="comunidad_id" value="<?php echo $comunidad_id?>">
<input type="hidden" name="competicion" value="<?php echo $competicion?>">
<input type="hidden" name="grupo" value="<?php echo $grupo?>">
<input type="hidden" name="pedido" value="campeonatos">
<textarea name="codigo" cols="60" rows="20" ></textarea>
<input type="submit" name="enviar" value="enviar">
</form>
</td>
</tr>
<tr><td colspan="4">
<?php



if (isset($_POST['codigo'])){
	$html = new simple_html_dom();
	$content=$_POST['codigo'];
	$string = str_get_html($content);
	$html->load($string);
	//echo $html; //- Activar para comprobar el contenido enviado.
	$datos=array();
	
	switch ($_POST['pedido']) {
		case 'campeonatos':
		if ($comunidad_id==1) {$modelo='isquad';}
		include '_xcampeonatos.php';$nomFichero='campeonatos.json';
		break;
		case 'grupos':
		if ($comunidad_id==3) {$modelo='isquad';}
		include '_xgrupos.php';$nomFichero=$competicion.'-grupos.json';
		break;

		case 'equipos':
		include '_xequipos.php';
		$dd=array();
		$k=0;
		foreach ($datos['partidos'] as $key => $value) {		
			$dd[$k]['url']=$value['url_local'];
	        $id=str_replace('NFG_VisEquipos?cod_primaria=1000119&Codigo_Equipo=', '', $dd[$k]['url']);
	        $dd[$k]['id']=$id;
	        $dd[$k]['equipo']=$value['local'];
	        $dd[$k]['club']=$value['escudo_local'];
	        $k++;
	        $dd[$k]['url']=$value['url_visitante'];
	        $id=str_replace('NFG_VisEquipos?cod_primaria=1000119&Codigo_Equipo=', '', $dd[$k]['url']);
	        $dd[$k]['id']=$id;
	        $dd[$k]['equipo']=$value['visitante'];
	        $dd[$k]['club']=$value['escudo_visitante'];
	        $k++;
		}	
		break;
		//case 'calendario':
		//include '_xcalendario.php';
		//break;
	}

	if (isset($dd) && count($dd)>0){
		$file = '../../federacion/'.$territorial.'/equipos/'.$grupo.'-equipos.json';
		guardarJSON($dd, $file);
		echo 'Guardado '.$file.'<br />';
		unset($datos);unset($dd);
	} 
	if (isset($datos)){
		$file = '../../federacion/'.$territorial.'/'.$nomFichero;
		guardarJSON($datos, $file);
		echo 'Guardado '.$file.'<br />';
		unset($datos);
	}

}?>	
</td></tr>
</table>
