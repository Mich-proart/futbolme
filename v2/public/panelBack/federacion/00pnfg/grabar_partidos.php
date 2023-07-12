<?php
$url3='http://futgal.es/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120&CodTemporada=14&cod_agrupacion=1&Sch_Codigo_Delegacion=&Sch_Tipo_Juego='; 

    $mysqli = conectar(); 
        
    $cId=$_GET['cId']??0;   
    if ($cId>3309) { $cId=0; } 

        $sql='SELECT t.id,t.torneo_id,t.grupo_id, t.jornadas,(SELECT max(p.jornada) FROM partido p WHERE p.grupo_id=t.grupo_id) ultima FROM torneo t WHERE t.comunidad_id="'.$i.'" AND t.id>'.$cId.' AND t.estado=1 ORDER BY t.id';
        $resultadoSQL = mysqli_query($mysqli, $sql);
        $torneos = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

        $sql='SELECT id,ip FROM proxis WHERE estado<>1 ORDER BY id LIMIT 1';
        $resultadoSQL = mysqli_query($mysqli, $sql);
        $proxis = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);        
        
        
        foreach ($torneos as $key => $value) {
            
            $id=(int)$value['id'];
            $grupo_id=(int)$value['grupo_id'];
            $torneo_id=(int)$value['torneo_id'];
            $jornadasTor=(int)$value['jornadas'];
            $ultima=(int)$value['ultima'];
            $url2=$url3.'&CodCompeticion='.$torneo_id.'&CodGrupo='.$grupo_id;
            //echo $url3.'<br />';echo $url.'<br />';die;
            $cuentaProxis=0;

            $jornada_inicio=1;
            if ($ultima>0) { $jornada_inicio=$ultima; }

                for ($jda=$jornada_inicio; $jda < ($jornadasTor+1); $jda++) {                 
                    $proxi=$proxis['ip'];
                    $id_proxi=$proxis['id'];
                    $sql='UPDATE proxis SET uso=uso+1 WHERE id='.$id_proxi;
                    mysqli_query($mysqli, $sql); 

                    $url=$url2.'&CodJornada='.$jda;
                    echo '<h5>'.$url.' - proxy: '.$proxi.' - id:'.$id_proxi.' ('.$id.')</h5>';

                    
                    $html = new simple_html_dom();
                    $content=getPage($url,$proxi,$id_proxi);  
                    
                    if (strlen($content)<100) {
                        echo $content.'<br />';                
                        $sql='UPDATE proxis SET estado=1 WHERE id='.$id_proxi;
                        echo $sql;
                        mysqli_query($mysqli, $sql); ?>
                        <script> 
                        window.location.href = 'index.php?cId=<?php echo $id?>'; 
                        </script>
                        <?php 
                        die;                
                    }

                    
                    include('extraerDatosPartidos.php');

                    $cuentaProxis++;
                    echo $cuentaProxis." viajes del proxy<br />";

                    if ($cuentaProxis>25){
                        $sql='UPDATE proxis SET estado=2 WHERE id='.$id_proxi;
                        echo $sql;
                        mysqli_query($mysqli, $sql); 
                        $cuentaProxis==0;
                        $sql='SELECT id,ip FROM proxis WHERE estado<>1 ORDER BY estado, ip DESC LIMIT 1';
                        $resultadoSQL = mysqli_query($mysqli, $sql);
                        $proxis = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC);  
                    }

                    $html->clear();
                    unset($html);                
                    sleep(5);



                } //bucle de las jornadas


            $sql='UPDATE torneo SET estado=2 WHERE id='.$id;
            echo $sql;
            mysqli_query($mysqli, $sql);

            

            


            
        }




function quitarFuncion($gol) {
    $gl = preg_replace('/<style>#idh(.*?):after{content:"\\\003(.*?)"}<\/style>/', '$2,', $gol);
    $gl = preg_replace('/<span id=idh(.*?)>(.*?)<span style="display:none;">(.*?)<\/span><\/span>/', '$2,$3', $gl);
    $gl = preg_replace('/<style>#idh(.*?):after{content:"\\\003(.*?)";display:none}<\/style>/', '$2,', $gl);
    $gl = preg_replace('/<style>#idh(.*?):after{content:"(.*?)"}<\/style>/', '$2,', $gl);
    $gl = preg_replace('/<style>#idh(.*?):before{content:"\\\003(.*?)"}<\/style>/', '$2,', $gl);
    $gl = preg_replace('/<style>#idh(.*?):before{content:"\\\003(.*?)";display:none}<\/style>/', '$2,', $gl);
    $gl = preg_replace('/<style>#idh(.*?):before{content:"(.*?)"}<\/style>/', '$2,', $gl);
    $gl = preg_replace('/<span id=idh(.*?)>(.*?)<\/span>/', '$2,', $gl);
    return $gl;
}