<?php

if ($modelo=='novanet'){

  foreach($html->find('div.form-group') as $key =>  $element) {
        echo '<br />key: '.$key.'<br />';
         if ($key==4){ 
            //echo $element; 
            foreach($element->find('option') as $k => $op) { 
                if ($k==0) { continue; } 
                /*?>
                <textarea cols="100" rows="2"><?php echo $op->outertext?></textarea>
                <?php */
                $v=explode('value=',$op->outertext);
                $v1=explode('>',$v[1]);
                $idCampeonato=$v1[0];
                $nCampeonato=$v1[1];
                //var_dump($idCampeonato);
                //var_dump($nCampeonato);
                echo '<hr />';
                //echo $idCampeonato.' '.$nCampeonato.'<br />';
                $datos[$idCampeonato]['id']=$idCampeonato;
                $datos[$idCampeonato]['nombre']=strip_tags($nCampeonato);
                //imp($campeonatos);
                unset($v);unset($v1);                
            }
        }
  }

} else {

  foreach($html->find('select#grupo') as $key =>  $element) { 
  echo $element;        
        foreach($element->find('option') as $k => $op) { 
            if ($k==0 && $comunidad_id!=2) { continue; } 
            $v=explode('value=',$op->outertext);
            $v1=explode('>',$v[1]);
            $idCampeonato=$v1[0];
            $nCampeonato=$v1[1];
            $datos[$idCampeonato]['id']=$idCampeonato;
            $datos[$idCampeonato]['nombre']=strip_tags($nCampeonato);
            unset($v);unset($v1);                
        }
    }
}

if ($comunidad_id==2 || $comunidad_id==6 || $comunidad_id==8 || $comunidad_id==15){
$fases=array();
  foreach($html->find('select#fase') as $key =>  $element) { 
  echo $element;        
        foreach($element->find('option') as $k => $op) {
            $v=explode('value=',$op->outertext);
            $v1=explode('>',$v[1]);
            $idCampeonato=$v1[0];
            $nCampeonato=$v1[1];
            $fases[]=$idCampeonato;            
            unset($v);unset($v1);                
        }
    }

    $datos['fases']=$fases;
}

