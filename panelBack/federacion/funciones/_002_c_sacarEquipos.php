<?php


//die('<h4>comentar esta linea para ejecutar el script</h4>');
$mysqliFB = conectar();

$sql='DELETE FROM proxis WHERE uso=0 AND fallo>1';
mysqli_query($mysqliFB, $sql);

$sql='DELETE FROM proxis WHERE fallo>2 AND uso<10';
mysqli_query($mysqliFB, $sql); 
$sql='SELECT id,ip FROM proxis WHERE fallo<3 ORDER BY uso DESC, fallo LIMIT 8';
$resultadoSQL = mysqli_query($mysqliFB, $sql);
$proxis = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC); 
$proxis = array_reverse($proxis);
if (count($proxis)<5){
    $sql='UPDATE proxis SET uso=0, fallo=0';
    mysqli_query($mysqliFB, $sql);
}
//imp($proxis);
$fallo=0;

    foreach ($proxis as $key1 => $value) {

        $proxi=$value['ip'];
        $id_proxi=$value['id'];
        //imp($proxi);imp($id_proxi);        
        $html = new simple_html_dom();
        $content=getPage($url,$proxi,$id_proxi);         
        if (strlen($content)>1000) { break; }
        $sql='UPDATE proxis SET fallo=fallo+1  WHERE id='.$id_proxi;
        mysqli_query($mysqliFB, $sql); 
        unset($proxis[$key1]);
        unset($proxi);
        unset($id_proxi);
        $html->clear();
        unset($html); 
        $totalProxis=count($proxis);
        echo ' - Quedan '.$totalProxis.' proxis por usar<br />';
        if ($totalProxis==0){ $fallo=1;break; }
    }
    //var_export($content);
    if ($fallo==0){
        $sql='UPDATE proxis SET uso=uso+1 WHERE id='.$id_proxi;
        mysqli_query($mysqliFB, $sql); 

        $string = str_get_html($content);
        $html->load($string);
        
        $equipos=array();        
        
        

        foreach($html->find('img.escudo_equipo') as $e)
        $codigo=$e->src;
        $codigo=str_replace('https://www.ffcv.es/fenix/escudos/02', '', $codigo);
        $futbolbase_id=str_replace('.jpg', '', $codigo);
        
        $tabla1=$html->find('table.tablaclub', 0); 

        //echo $tabla1;

        

        $positivo=0;

        foreach($tabla1->find('tr') as $k => $e){
            if ($e->find('a',0) != null){
                $equipos[$k]['url'] = trim($e->find('a', 0)->href);
                $equipos[$k]['equipo'] = trim($e->find('a', 0)->plaintext);
            }
        }
        
   
        

        if (count($equipos)>0){ 
            $equiposClub=array();
            foreach ($equipos as $v2) {
                //imp($v2);
                $url=$v2['url'];
                $url=str_replace('competiciones_publico_equipo.php?id_equipo=', '', $url);
                $url=str_replace('&id_ambito=3', '', $url);
                $url=explode('&id_grupo=', $url);
                $id_equipo=$url[0];
                $id_grupo=$url[1];
                
                $eq=$v2['equipo'];
                $eq=explode(PHP_EOL, $eq);
                $nom_equip=$eq[0];
                $tor_equip=$eq[1];

                $equiposClub[$futbolbase_id][$id_equipo]['nombre']=$nom_equip;
                $equiposClub[$futbolbase_id][$id_equipo]['torneo']=$tor_equip;
                $equiposClub[$futbolbase_id][$id_equipo]['grupo_id']=$id_grupo;

                /*imp($id_equipo);
                imp($id_grupo);

                imp($nom_equip);
                imp($tor_equip);
                die; */

            }



            $file = '../../federacion/'.$territorial.'/equipos/futbolbase_'.$futbolbase_id.'.json';
            imp($futbolbase_id);
            guardarJSON($equiposClub, $file); 
            unset($equiposClub);
        }

        //imp($equipos);

        
        
       
       
       

        unset($equipos);

        $html->clear();
        unset($html);
    }

