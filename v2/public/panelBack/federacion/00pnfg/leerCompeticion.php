<?php


 //$etiqueta = trim($og->label);
echo $url.'<br />';

$mysqli = conectar(); 
$sql='SELECT id,ip FROM proxis WHERE fallo=0';
$resultadoSQL = mysqli_query($mysqli, $sql);
$proxis = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);  

$proxis2=array_rand($proxis,5);

$proxis3=array();

foreach ($proxis2 as $value) {

    $proxis3[]=$proxis[$value];
}


foreach ($proxis3 as $key => $value) {

    $proxi=$value['ip'];
    $id_proxi=$value['id'];

    echo $proxi."<hr />";

    $html = new simple_html_dom();
    $content=getPage($url,$proxi,$id_proxi); 

    $string = str_get_html($content);

    //echo $string; 

    $html->load($string);
    $categorias=array();
    foreach($html->find('span#competiciones') as $div){ 
    	foreach ($div->find('optgroup') as $kk => $og){
    	$categorias[$kk]['categoria']=trim($og->label);
	    	foreach ($og->find('option') as $k => $op){
	    		$nombre = trim($op->plaintext);
				$valor = trim($op->value);
				$categorias[$kk]['torneos'][$k]['nombre']=$nombre;
				$categorias[$kk]['torneos'][$k]['valor']=$valor;				
			} 
		}
    } 

    $html->clear();
    unset($html);

    break;
    
}
    

    $mysqli = conectar();
    foreach ($categorias as $key => $value) {
	imp($key);
    imp($value['categoria']);	
    	$categoria=$value['categoria'];
    	  		
		foreach ($value['torneos'] as $k1 => $v1) {
			$orden=($k1+1)*100;
			$nombre=$v1['nombre'];
			$competicion_id=$v1['valor'];			
			
                $sql="SELECT id FROM torneo WHERE comunidad_id=".$i." AND competicion_id=".$competicion_id;
                $resultadoSQL = mysqli_query($mysqli, $sql);
                $resultado = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);
                if (count($resultado)==0){
                    $sql="INSERT INTO torneo (comunidad_id, orden, categoria, nombre, competicion_id) VALUES ('".$i."', '".$orden."', '".$categoria."', '".$nombre."', '".$competicion_id."')";
                    mysqli_query($mysqli, $sql);
                    echo $sql.'<br />';
                } else { 
                    $sql='UPDATE torneo SET categoria="'.$categoria.'" WHERE comunidad_id='.$i.' AND competicion_id='.$competicion_id;
                    mysqli_query($mysqli, $sql);
                    echo $sql.'<br />';
                    echo "Este codigo ya esta grabado<br />"; 
                }
		}
    	
    	
    }

    
    die ('finalizado');

?>