<?php
define('_FUTBOLME_', 1);
include('../../../src/funciones.php');
include('../../../src/consultas.php');



$comunidad_id=$_GET['comunidad_id'];
require_once 'urlFederaciones.php';


$f = '../../federacion/'.$territorial.'/equipos.json';

//echo $f;

$json = file_get_contents($f);
$clubs = json_decode($json, true);

$mysqli=conectar();

$contaClub=0;

foreach ($clubs as $key => $value) {

    $contaClub++;

    
    $sql='SELECT id, nombre,nombre_completo, futbolbase_id FROM club WHERE territorialRFEF="'.$territorial.'" AND futbolbase_id='.$key;
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $club = mysqli_fetch_array($resultadoSQL, MYSQLI_ASSOC); 

    $club_id=$club['id'];
    //echo $sql.'<br />';

    //if ($contaClub==15){ die; }

    //imp($club); 
    if (count($club)>0){

        
        $nombreClub=$club['nombre'];

        //echo '<hr />Club id: '.$key.' ('.$contaClub.')-- Nombre: <b>'.$club['nombre'].'</b> Complet: <font style="color:green"><b>'.$club['nombre_completo'].'</b></font><br />';
        $sqE='SELECT id, categoria_id, nombre, nombreCorto, slug, codigoRFEF, federacion_id FROM equipo WHERE club_id='.$club_id;
        $resultadoSQL = mysqli_query($mysqli, $sqE);
        $equipos = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);
        //imp($club);

        //imp($equipos);
        
        if (count($equipos)>0){
            //echo ' -- equipo: <font style="color:red"><b>'.$equipos[0]['nombre'].'</b></font> ncorto: <b>'.$equipos[0]['nombreCorto'].'</b> tw: <font style="color:blue"><b>'.$equipos[0]['slug'].'</b></font><br />';
            $tw=$equipos[0]['slug'];
            $nombreCorto=$equipos[0]['nombreCorto'];
            foreach ($value as $nouEquip) {
            $federacion_id=$nouEquip['federacion_id'];
            $nombreE=$nouEquip['equipo'];
            $categoria_id=categoriaId($nouEquip['categoria']);
            $codigoRFEF=codigoRfef($nombreE, $categoria_id);
            $nombre=limpiarNombre($nombreClub,$codigoRFEF,$categoria_id);

                $actualizo=0;
                foreach ($equipos as $vE) {
                    if ($vE['codigoRFEF']==$codigoRFEF && $vE['categoria_id']==$categoria_id){
                        $sq='UPDATE equipo SET federacion_id='.$federacion_id.' WHERE id='.$vE['id'];
                        //mysqli_query($mysqli, $sq);
                        echo $sq.';<br />';
                        $actualizo=1;
                        break;
                    }
                }
                if ($actualizo==1){ continue; }

                $sq='INSERT INTO equipo(categoria_id, club_id, nombre, slug, codigoRFEF, nombreCorto, federacion_id) VALUES ('.$categoria_id.', '.$club_id.', "'.$nombre.'", "'.$tw.'", "'.$codigoRFEF.'", "'.$nombreCorto.'", '.$federacion_id.')';
                 echo '<b>'.$sq.';</b><br />';
                 //mysqli_query($mysqli, $sq);
                //echo 'Fed id: '.$federacion_id.' - '.$nombre.' - Cat: <b>'.$categoria_id.'</b> - Cod: <b>'.$codigoRFEF.'</b> ('.$nouEquip['categoria'].')<br />';
            }

            
        } else {
            //echo '<b>No hay equipos grabados en este club.</b><br />';
            $contador=0;
            foreach ($value as $nouEquip) {
                $contador++;
                
                $federacion_id=$nouEquip['federacion_id'];
                $nombreE=$nouEquip['equipo'];
                $categoria_id=categoriaId($nouEquip['categoria']);
                //imp($categoria_id);
                //imp($contaClub);
                $codigoRFEF=codigoRfef($nombreE, $categoria_id);
                $nombre=limpiarNombre($nombreClub,$codigoRFEF,$categoria_id);
                

                if ($contador==1){
                //echo ' -- equipo: '.$nombreE.' fed: '.$federacion_id.'<br />';
                }
                //echo 'Fed id: '.$federacion_id.' - '.$nombre.' - Cat: <b>'.$categoria_id.'</b> - Cod: <b>'.$codigoRFEF.'</b> ('.$nouEquip['categoria'].')<br />';
                $sq='INSERT INTO equipo(categoria_id, club_id, nombre, slug, codigoRFEF, nombreCorto, federacion_id) VALUES ('.$categoria_id.', '.$club_id.', "'.$nombre.'", "", "'.$codigoRFEF.'", "'.$nombre.'", '.$federacion_id.')';
                //mysqli_query($mysqli, $sq);
                echo '<b>'.$sq.';</b><br />';
            }
        }
        
        
    } else {
        echo 'No hay club para estos equipos: ';
    }

    if ($contaClub==296){
        //imp($value);
        //die;
    }

    unset($equipos);

    
    //echo '<hr />';
}

function limpiarNombre($nombre,$codigoRFEF,$categoria_id){
    $n1=explode(',', $nombre);
    if (count($n1)>1){
        $nombre=$n1[1].' '.$n1[0];
    }
    $n=str_replace('"A"', '', $nombre);    
    $n=str_replace('C.f.', 'CF', $n);
    $n=str_replace('C.d.', 'CD', $n);
    $n=str_replace('Rvo.', 'RVO', $n);
    $n=str_replace('Agr.dva.', 'AD', $n);
    $n=str_replace('U.d.', 'UD', $n);
    $n=str_replace('C.u.d.', 'CUD', $n);
    $n=str_replace('Juventud Dva.', 'JD', $n);
    $n=str_replace(' Del ', ' del ', $n);
    $n=str_replace(' De ', ' de ', $n);
    $n=str_replace('Aa.aa.', 'AA', $n);
    $n=str_replace('CDc.c.', 'CDCC', $n);
    $n=str_replace('Asoc.famil.', 'AF', $n);
    $n=str_replace('Bpie.', 'BPIE', $n);
    $n=str_replace('Union Dva.', 'UD', $n);
    $n=str_replace('R.c.d.', 'RCD', $n);
    $n=str_replace('Pino Montano', 'PM', $n);
    $n=str_replace('Futbol Base', 'FB', $n);
    $n=str_replace('F.c.', 'FC', $n);
    $n=str_replace('Ulloa C.', 'Ulloa', $n);
    $n=str_replace('Jorge Juan', 'JJ', $n);
    $n=str_replace('Juv.dva.', 'JD', $n);
    $n=str_replace('C.s.d.', 'CSD', $n);
    $n=str_replace('P.d.', 'PD', $n);
    $n=str_replace('Juventud de Futbol', 'JF', $n);
    $n=str_replace('A.d.', 'AD', $n);
    $n=str_replace('J.d. ', 'JD ', $n);
    $n=str_replace('C.d Futbol', 'CDF', $n);
    $n=str_replace('Aa.vv.', 'AV', $n);
    $n=str_replace('Amigos Dvos.', 'AD', $n);
    $n=str_replace('Ad-rabad', 'Ad-Rabad', $n);
    $n=str_replace('A.c.d.', 'ACD', $n);
    $n=str_replace('ADp.', 'ADP', $n);
    $n=str_replace('Peña Dva.', 'PD', $n);
    $n=str_replace('Atco.', 'AT', $n);
    $n=str_replace('AD Polideportivo', 'ADP', $n);
    $n=str_replace(' Y ', ' y ', $n);
    $n=str_replace('Cd ', 'CD ', $n);
    $n=str_replace('Ajcd', 'AJCD', $n);
    $n=str_replace('actitud ', 'Actitud ', $n);
    $n=str_replace('Fútbol Sala Femenino', 'FSF', $n);
    $n=str_replace('Club Deportivo', 'CD', $n);
    $n=str_replace('Club Balompie', 'CB', $n);
    $n=str_replace('Club CD', 'CCD', $n);
    $n=str_replace('Union Polideportivo', 'UP', $n);
    $n=str_replace('Asoc. Veteranos', 'AV', $n);
    $n=str_replace('Fútbol Sala', 'FS', $n);
    $n=str_replace('F.s.', 'FS', $n);
    $n=str_replace('Asoc. Veteranos', 'AV', $n);
    $n=str_replace('Union Polideportivo', 'UP', $n);
    $n=str_replace('S.m.', 'SM', $n);
    $n=str_replace('CD de Futbol', 'CDF', $n);
    $n=str_replace('CD Colonia de', 'CDC', $n);
    $n=str_replace('A.j.', 'AJ', $n);
    $n=str_replace('A.f.', 'AF', $n);
    $n=str_replace('Servicio Deporte', 'SD', $n);
    $n=str_replace('CD Cultural', 'CDC', $n);
    $n=str_replace('Marinas Urbanizacion', 'Marinas URB', $n);
    $n=str_replace('Monitores Futbol', 'MF', $n);
    $n=str_replace('ADpueblo Nuevo', 'AD PN', $n);
    $n=str_replace('C.m.', 'CM', $n);
    $n=str_replace('A.p.a. Sancti-petri', 'APA Sancti-Petri', $n);
    $n=str_replace('P.c.d.', 'PCD', $n);
    $n=str_replace('Asoc.dva.', 'AD', $n);
    $n=str_replace('ADj.', 'ADJ', $n);
    $n=str_replace(' Cf', ' CF', $n);
    $n=str_replace('Al-andalus Feminas FC', 'Al-Andalus FFC', $n);
    $n=str_replace('R.u.d.', 'RUD', $n);
    $n=str_replace('Calvario-Priego', 'Calvario-priego', $n);
    $n=str_replace('Servicio Deporte', 'SD', $n);
    $n=str_replace('Atl.', 'AT', $n);
    $n=str_replace('CD Base', 'CDB', $n);
    $n=str_replace('Club de Fútbol', 'CF', $n);
    $n=str_replace('ADc.', 'ADC', $n);
    $n=str_replace('Palomera-naranjo CDcultural', 'Palomera-Naranjo CDC', $n);
    $n=str_replace('CD Femenino', 'CDF', $n);
    $n=str_replace('Atco Femenino Cd', 'AF CD', $n);
    $n=str_replace('Futbol Sala', 'FS', $n);
    $n=str_replace('Racing Futbol Club', 'RFC', $n);
    $n=str_replace('F.b.', 'FB', $n);
    $n=str_replace('CD Vespertina Perro Verde - Hornachuelos CF','Perro Verde-Hornachuelos', $n);
    $n=str_replace('Racing Club', 'RC', $n);
    $n=str_replace('Asoc. de Futbolistas Españoles', 'AFE', $n);
    $n=str_replace('CDfútbol Base', 'CDFB', $n);
    $n=str_replace('Union Deportiva', 'UD', $n);
    $n=str_replace('P.m.d.', 'PMD', $n);
    $n=str_replace('E.f. ', 'EF ', $n);
    $n=str_replace('Siglo Xx', 'Siglo XX', $n);
    $n=str_replace('C.p. ', 'CP ', $n);
    $n=str_replace('C.d', 'CD', $n);
    $n=str_replace('E.f.', 'EF', $n);
    $n=str_replace('Asoc. Dva.', 'AD', $n);
    $n=str_replace('Fútbol Base', 'FB', $n);
    $n=str_replace('Patronato Municipal de Deportes', 'PMD', $n);
    $n=str_replace('As.dva.', 'AD', $n);
    $n=str_replace('Club de Futbol', 'CF', $n);
    $n=str_replace('Ass. Dva.', 'AD', $n);
    $n=str_replace('Cd. ', 'CD ', $n);
    $n=str_replace('Club Atletico', 'CA', $n);
    $n=str_replace('Ntra.sra.remedios', 'NS Remedios', $n);
    $n=str_replace('FSc.d.', 'FS CD', $n);
    $n=str_replace('J.gomez Juanito', 'JG Juanito', $n);
    $n=str_replace('Malaga EF', 'MEF', $n);
    $n=str_replace('MEFvillanueva', 'MEF Villanueva', $n);
    $n=str_replace('"Cuerpo Técnico Selecciones', 'CTS', $n);
    $n=str_replace('CDe.', 'CDE', $n);
    $n=str_replace('Einstein-pino', 'Einstein-Pino', $n);
    $n=str_replace('Xxi', 'XXI', $n);
    $n=str_replace('CDde FS', 'CDFS', $n);
    $n=str_replace('Palo-pedregalejo', 'Palo-Pedregalejo', $n);
    $n=str_replace('At.Cortegana', 'AT Cortegana', $n);
    $n=str_replace('.', '.', $n);
    $n=str_replace('.', '.', $n);
    $n=str_replace('.', '.', $n);
    $n=str_replace('.', '.', $n);
    $n=str_replace('.', '.', $n);
    $n=str_replace('.', '.', $n);
    $n=str_replace('.', '.', $n);
    $n=str_replace('.', '.', $n);
    $n=str_replace('.', '.', $n);
    $n=str_replace('.', '.', $n);
    $n=str_replace('.', '.', $n);
    $n=str_replace('.', '.', $n);

    

    if ($categoria_id==1){
        switch (substr($codigoRFEF, -2)) {
            case '21':$n.=' B';break;
            case '31':$n.=' C';break;
            case '32':$n.=' D';break;                    
        }
    }

    if ($categoria_id>1){
        switch (substr($codigoRFEF, -1)) {
            case '2':$n.=' B';break;
            case '3':$n.=' C';break;
            case '4':$n.=' D';break;
            case '5':$n.=' E';break;
            case '6':$n.=' F';break;
            case '7':$n.=' G';break;
            case '8':$n.=' H';break;
            case '9':$n.=' I';break;                  
        }

        switch (substr($codigoRFEF, -2)) {            
            case '10':$n.=' J';break;
            case '11':$n.=' K';break;                      
        }
    }
    
    return $n;
}
    

function categoriaId($nombre){

    $categoria_id=1;            
    $mystring = $nombre;
    
    $findme   = 'AUTONOMICA';
    $pos = strpos($mystring, $findme);
    if ($pos > 0) { $categoria_id=1; }
    $findme   = 'JUVENIL';
    $pos = strpos($mystring, $findme);
    if ($pos > 0) { $categoria_id=3; }
    $findme   = 'CADETE';
    $pos = strpos($mystring, $findme);
    if ($pos > 0) { $categoria_id=4; } 
    $findme   = 'INFANTIL';
    $pos = strpos($mystring, $findme);
    if ($pos > 0) { $categoria_id=21; } 
    $findme   = 'ALEVIN';
    $pos = strpos($mystring, $findme);
    if ($pos > 0) { $categoria_id=23; } 
    $findme   = 'FEMENINA';
    $pos = strpos($mystring, $findme);
    if ($pos > 0) { $categoria_id=2; }

    /*
    $findme   = 'JUVENIL';
    $pos = strpos($mystring, $findme);
    if ($pos > 0) { $categoria_id=3; }

    $findme   = 'CADET';
    $pos = strpos($mystring, $findme);
    if ($pos > 0) { $categoria_id=4; } 

    $findme   = 'INFANTIL';
    $pos = strpos($mystring, $findme);
    if ($pos > 0) { $categoria_id=21; } 



    $findme   = 'FEMENÍ ';
    $pos = strpos($mystring, $findme);
    if ($pos > 0) { $categoria_id=2; }
    
    $findme   = 'FEMENÍ JUVENIL';
    $pos = strpos($mystring, $findme);
    if ($pos > 0) { $categoria_id=26; }
    $findme   = 'FEMENÍ CADET';
    $pos = strpos($mystring, $findme);
    if ($pos > 0) { $categoria_id=27; }
    $findme   = 'FEMENÍ INFANTIL';
    $pos = strpos($mystring, $findme);
    if ($pos > 0) { $categoria_id=28; }
    $findme   = 'FEMENÍ ALEVÍ';
    $pos = strpos($mystring, $findme);
    if ($pos > 0) { $categoria_id=30; }
    */

    return $categoria_id;
}


function codigoRfef($nombre,$categoria_id){
    $mystring = $nombre;

        if ($categoria_id==1){ $codigoRFEF='011'; } //senior
        if ($categoria_id==2){ $codigoRFEF='051'; } //femenino
        if ($categoria_id==3){ $codigoRFEF='041'; } //juvenil
        if ($categoria_id==4){ $codigoRFEF='101'; } //cadete
        if ($categoria_id==21){ $codigoRFEF='201'; } //infantil
        if ($categoria_id==23){ $codigoRFEF='301'; } //cadete
        if ($categoria_id==26){ $codigoRFEF='601'; } //femenino juvenil
        if ($categoria_id==27){ $codigoRFEF='701'; } //femenino cadete 
        if ($categoria_id==28){ $codigoRFEF='801'; } //femenino infantil
        if ($categoria_id==30){ $codigoRFEF='901'; } //femenino alevin

              
        $findme   = '"';
        $pos = strpos($mystring, $findme);
        if ($pos > 0) {    
            
            
            $findme   = '"A"';
            $pos = strpos($mystring, $findme);
            if ($pos > 0) { 
                if ($categoria_id==1){ $codigoRFEF='011'; } //senior
                if ($categoria_id==2){ $codigoRFEF='051'; } //femenino
                if ($categoria_id==3){ $codigoRFEF='041'; } //juvenil
                if ($categoria_id==4){ $codigoRFEF='101'; } //cadete
                if ($categoria_id==21){ $codigoRFEF='201'; } //infantil
                if ($categoria_id==23){ $codigoRFEF='301'; } //cadete
                if ($categoria_id==26){ $codigoRFEF='601'; } //femenino juvenil
                if ($categoria_id==27){ $codigoRFEF='701'; } //femenino cadete 
                if ($categoria_id==28){ $codigoRFEF='801'; } //femenino infantil
                if ($categoria_id==30){ $codigoRFEF='901'; } //femenino alevin
            }

            $findme   = '"B"';
            $pos = strpos($mystring, $findme);
            if ($pos > 0) { 
                if ($categoria_id==1){ $codigoRFEF='021'; } //senior
                if ($categoria_id==2){ $codigoRFEF='052'; } //femenino
                if ($categoria_id==3){ $codigoRFEF='042'; } //juvenil
                if ($categoria_id==4){ $codigoRFEF='102'; } //cadete
                if ($categoria_id==21){ $codigoRFEF='202'; } //infantil
                if ($categoria_id==23){ $codigoRFEF='302'; } //cadete
                if ($categoria_id==26){ $codigoRFEF='602'; } //femenino juvenil
                if ($categoria_id==27){ $codigoRFEF='702'; } //femenino cadete 
                if ($categoria_id==28){ $codigoRFEF='802'; } //femenino infantil
                if ($categoria_id==30){ $codigoRFEF='902'; } //femenino alevin
            }

            $findme   = '"C"';
            $pos = strpos($mystring, $findme);
            if ($pos > 0) { 
                if ($categoria_id==1){ $codigoRFEF='031'; } //senior
                if ($categoria_id==2){ $codigoRFEF='053'; } //femenino
                if ($categoria_id==3){ $codigoRFEF='043'; } //juvenil
                if ($categoria_id==4){ $codigoRFEF='103'; } //cadete
                if ($categoria_id==21){ $codigoRFEF='203'; } //infantil
                if ($categoria_id==23){ $codigoRFEF='303'; } //cadete
                if ($categoria_id==26){ $codigoRFEF='603'; } //femenino juvenil
                if ($categoria_id==27){ $codigoRFEF='703'; } //femenino cadete 
                if ($categoria_id==28){ $codigoRFEF='803'; } //femenino infantil
                if ($categoria_id==30){ $codigoRFEF='903'; } //femenino alevin
            }
            
            $findme   = '"D"';
            $pos = strpos($mystring, $findme);
            if ($pos > 0) { 
                if ($categoria_id==1){ $codigoRFEF='032'; } //senior
                if ($categoria_id==2){ $codigoRFEF='054'; } //femenino
                if ($categoria_id==3){ $codigoRFEF='044'; } //juvenil
                if ($categoria_id==4){ $codigoRFEF='104'; } //cadete
                if ($categoria_id==21){ $codigoRFEF='204'; } //infantil
                if ($categoria_id==23){ $codigoRFEF='304'; } //cadete
                if ($categoria_id==26){ $codigoRFEF='604'; } //femenino juvenil
                if ($categoria_id==27){ $codigoRFEF='704'; } //femenino cadete 
                if ($categoria_id==28){ $codigoRFEF='804'; } //femenino infantil
                if ($categoria_id==30){ $codigoRFEF='904'; } //femenino alevin
            }

            $findme   = '"E"';
            $pos = strpos($mystring, $findme);
            if ($pos > 0) { 
                if ($categoria_id==1){ $codigoRFEF='033'; } //senior
                if ($categoria_id==2){ $codigoRFEF='055'; } //femenino
                if ($categoria_id==3){ $codigoRFEF='045'; } //juvenil
                if ($categoria_id==4){ $codigoRFEF='105'; } //cadete
                if ($categoria_id==21){ $codigoRFEF='205'; } //infantil
                if ($categoria_id==23){ $codigoRFEF='305'; } //cadete
                if ($categoria_id==26){ $codigoRFEF='605'; } //femenino juvenil
                if ($categoria_id==27){ $codigoRFEF='705'; } //femenino cadete 
                if ($categoria_id==28){ $codigoRFEF='805'; } //femenino infantil
                if ($categoria_id==30){ $codigoRFEF='905'; } //femenino alevin
            }

            $findme   = '"F"';
            $pos = strpos($mystring, $findme);
            if ($pos > 0) { 
                if ($categoria_id==2){ $codigoRFEF='056'; } //femenino
                if ($categoria_id==3){ $codigoRFEF='046'; } //juvenil
                if ($categoria_id==4){ $codigoRFEF='106'; } //cadete
                if ($categoria_id==21){ $codigoRFEF='206'; } //infantil
                if ($categoria_id==23){ $codigoRFEF='306'; } //cadete
                if ($categoria_id==26){ $codigoRFEF='606'; } //femenino juvenil
                if ($categoria_id==27){ $codigoRFEF='706'; } //femenino cadete 
                if ($categoria_id==28){ $codigoRFEF='806'; } //femenino infantil
                if ($categoria_id==30){ $codigoRFEF='906'; } //femenino alevin
            }

            $findme   = '"G"';
            $pos = strpos($mystring, $findme);
            if ($pos > 0) { 
                if ($categoria_id==2){ $codigoRFEF='057'; } //femenino
                if ($categoria_id==3){ $codigoRFEF='047'; } //juvenil
                if ($categoria_id==4){ $codigoRFEF='107'; } //cadete
                if ($categoria_id==21){ $codigoRFEF='207'; } //infantil
                if ($categoria_id==23){ $codigoRFEF='307'; } //cadete
                if ($categoria_id==26){ $codigoRFEF='607'; } //femenino juvenil
                if ($categoria_id==27){ $codigoRFEF='707'; } //femenino cadete 
                if ($categoria_id==28){ $codigoRFEF='807'; } //femenino infantil
                if ($categoria_id==30){ $codigoRFEF='907'; } //femenino alevin
            }

            $findme   = '"H"';
            $pos = strpos($mystring, $findme);
            if ($pos > 0) { 
                if ($categoria_id==2){ $codigoRFEF='0584'; } //femenino
                if ($categoria_id==3){ $codigoRFEF='048'; } //juvenil
                if ($categoria_id==4){ $codigoRFEF='108'; } //cadete
                if ($categoria_id==21){ $codigoRFEF='208'; } //infantil
                if ($categoria_id==23){ $codigoRFEF='308'; } //cadete
                if ($categoria_id==26){ $codigoRFEF='608'; } //femenino juvenil
                if ($categoria_id==27){ $codigoRFEF='708'; } //femenino cadete 
                if ($categoria_id==28){ $codigoRFEF='808'; } //femenino infantil
                if ($categoria_id==30){ $codigoRFEF='908'; } //femenino alevin
            }

            $findme   = '"I"';
            $pos = strpos($mystring, $findme);
            if ($pos > 0) { 
                if ($categoria_id==2){ $codigoRFEF='059'; } //femenino
                if ($categoria_id==3){ $codigoRFEF='049'; } //juvenil
                if ($categoria_id==4){ $codigoRFEF='109'; } //cadete
                if ($categoria_id==21){ $codigoRFEF='209'; } //infantil
                if ($categoria_id==23){ $codigoRFEF='309'; } //cadete
                if ($categoria_id==26){ $codigoRFEF='609'; } //femenino juvenil
                if ($categoria_id==27){ $codigoRFEF='709'; } //femenino cadete 
                if ($categoria_id==28){ $codigoRFEF='809'; } //femenino infantil
                if ($categoria_id==30){ $codigoRFEF='909'; } //femenino alevin
            }

            $findme   = '"J"';
            $pos = strpos($mystring, $findme);
            if ($pos > 0) { 
                if ($categoria_id==4){ $codigoRFEF='110'; } //cadete
                if ($categoria_id==21){ $codigoRFEF='210'; } //infantil
                if ($categoria_id==23){ $codigoRFEF='310'; } //cadete
                if ($categoria_id==26){ $codigoRFEF='610'; } //femenino juvenil
                if ($categoria_id==27){ $codigoRFEF='710'; } //femenino cadete 
                if ($categoria_id==28){ $codigoRFEF='810'; } //femenino infantil
                if ($categoria_id==30){ $codigoRFEF='910'; } //femenino alevin
            }

            $findme   = '"K"';
            $pos = strpos($mystring, $findme);
            if ($pos > 0) { 
                if ($categoria_id==4){ $codigoRFEF='111'; } //cadete
                if ($categoria_id==21){ $codigoRFEF='211'; } //infantil
                if ($categoria_id==23){ $codigoRFEF='311'; } //cadete
                if ($categoria_id==26){ $codigoRFEF='611'; } //femenino juvenil
                if ($categoria_id==27){ $codigoRFEF='711'; } //femenino cadete 
                if ($categoria_id==28){ $codigoRFEF='811'; } //femenino infantil
                if ($categoria_id==30){ $codigoRFEF='911'; } //femenino alevin
            }
        }

    return $codigoRFEF;
}