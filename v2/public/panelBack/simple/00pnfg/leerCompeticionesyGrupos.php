<?php


 //$etiqueta = trim($og->label);
echo $url.'<br />';

    $html = new simple_html_dom();
    $content=getPage($url);

    $string = str_get_html($content);
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



    

    foreach ($categorias[0]['torneos'] as $key => $v) {

    	if ($v['valor']==0){ continue; }
   
   		$urlNueva=$url2.'&codcompeticion='.$v['valor']; //codcompeticion en minúsculas.
    	echo $urlNueva.'<br />';
    	$html = new simple_html_dom();
    	$content=getPage($urlNueva); 

	    $res=str_replace('<script>var grupos=new Array("0","-- Seleccione --",', '', $content);
	    $res=str_replace(');top.Select_Init(top.document.BuscaNFG_CMP.grupo,grupos,null);', '', $res);
	    $res=str_replace('if(grupos.length==4){top.document.BuscaNFG_CMP.grupo.value=grupos[2];parent.BuscarJornadas(grupos[2],1)};</script>', '', $res);
	    $res=utf8_encode($res);

	    
	    $categorias[0]['torneos'][$key]['grupos']=$res;
	    $categorias[0]['torneos'][$key]['url']=$urlNueva;
	    ?>
	    <p><?php echo $v['nombre']?> - <?php echo $v['valor']?> - <?php echo $res?></p>
	    
	    <?php     	
	    $html->clear();
	    unset($html);	

	    //if ($v['valor']==7294146){ break; }

    }

    

    $mysqli = conectar();
    foreach ($categorias as $key => $value) {
	imp($key);
    imp($value['categoria']);	
    	$categoria=$value['categoria'];
    	if ($key==0){    		
    		foreach ($value['torneos'] as $k1 => $v1) {
    			$orden=($k1+1)*100;
    			$nombre=$v1['nombre'];
    			$torneo_id=$v1['valor'];
    			$grupos=$v1['grupos'];
    			$url=$v1['url'];
    			include('grabar_torneos.php');
    			//if ($torneo_id==7294146){ die('final'); }
    		}
    	} else {

    		foreach ($value['torneos'] as $k1 => $v1) {    			
    			$torneo_id=$v1['valor']; 
    			$sql='UPDATE torneo SET categoria="'.$categoria.'" WHERE comunidad_id='.$i.' AND torneo_id='.$torneo_id;
        		mysqli_query($mysqli, $sql);
    			echo $sql.'<br />';
    		}
    		
    	}
    	
    }

    
    die ('finalizado');

?>