<?php
echo '<br />Modelo:'.$modelo.'<hr />';

if ($modelo=='novanet'){

  foreach($html->find('div.form-group') as $key =>  $element) {
        echo '<br />key: '.$key.'<br />';
         if ($key==3){ 
            echo $element; 
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

  foreach($html->find('select#competicion') as $key =>  $element) {   
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

