<?php 
define('_FUTBOLME_', 1);
set_time_limit(0);

//include('funciones.php');
include('../../federacion/funciones.php');
include('../../federacion/consultas.php');
include('../simple_html_dom.php');

function imp($ob)
{
    if (!empty($ob)) {
        echo '<pre>';
        print_r($ob);
        echo '</pre>';
    }
}

?>
 - <a href="/panelBack/simple/00control/proxys.php" target="_blank">Gestión de proxis</a>


<?php

$i=18;

//die('detenido');

switch ($i) {

    case 2:
        //include('../00isquad/grabar_torneos.php');
        include('../00isquad/grabar_parametros.php');
        break;

    case 8:
        //include('../00isquad/grabar_torneos.php');
        include('../00isquad/grabar_parametros.php');
        break;

    case 16:
        //include('../00isquad/grabar_torneos.php');
        include('../00isquad/grabar_parametros.php');
        break;

        /* PARA PNFG
        1º Se leen las competiciones y se generan registros con el torneo_id y sus grupos.
        00control -> include('../00pnfg/leerCompeticiones.php');
        2º Se generan los grupos que se han podido capturar en el apartado 1.
        00control/generarGrupo.
        3º Se leen los torneos donde no se han podido capturar los grupos en el primer barrido.
        00control -> include('../00pnfg/leerGrupos.php');
        4º Se extraen los clubes
        */

    case 1:
        //paso 1 - include('../00pnfg/leerCompeticiones.php');
        //paso 2 - se ejecuta manualmente 00control/generarGrupo.php
        //paso 3 - include('../00pnfg/leerGrupos.php'); 
        //paso 4 - grabar clubes.- Probar opción de listar todos los clubes y limpiar el codigo html a mano.
        //poniendo en cd_Page=1 y en NPcd_PageLines el número de clubes.
        //paso 5 - grabar equipos
        //paso 4 y 5 - include('../00pnfg/grabar_clubs_equipos.php'); 
        //paso 6 configurar propiedades del torneo (jornadas, equipos, rondas)
        //include('../00pnfg/configurar_torneos.php'); 
        $url='http://www.futgal.es/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120';
        $url2='http://www.futgal.es/pnfg/NPcd/NFG_CmpJornada_Exec?cod_primaria=1000120';
        //include('../00pnfg/leerCompeticion.php');
        include('../00pnfg/leerGrupos.php');

        die;
        
        include('../00pnfg/grabar_partidos.php');

        
        
        die('finalizado');
        break;

           

    case 3:
    
        //$url='https://www.federacioncantabradefutbol.com/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120';
        //$url2='http://www.federacioncantabradefutbol.es/pnfg/NPcd/NFG_CmpJornada_Exec?cod_primaria=1000120';
        $url='http://adminpcffcantabria.novanet.es/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120';
        $url2='http://adminpcffcantabria.novanet.es/pnfg/NPcd/NFG_CmpJornada_Exec?cod_primaria=1000120';
        //include('../00pnfg/leerCompeticion.php');
        include('../00pnfg/leerGrupos.php');

        die;   

    case 5:
        $url='http://fcf.cat/portada/categories';
        $url2='http://fcf.cat/portada/grups'; 
        //include('../00ami/leerCompeticion.php');   
        include('../00ami/leerGrupos.php');
        die;

    case 7:

        $url='https://www.rffm.es/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120';
        $url2='https://www.rffm.es/pnfg/NPcd/NFG_CmpJornada_Exec?cod_primaria=1000120';  
        echo 'estamos en la comunidad 7';die;
        //include('../00pnfg/leerCompeticion.php'); TERMINADO
        //include('../00pnfg/leerGrupos.php'); TERMINADO
        break;

    case 9:
    
        //$url='https://www.rfaf.es/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120';
        //$url2='https://www.rfaf.es/pnfg/NPcd/NFG_CmpJornada_Exec?cod_primaria=1000120';
        $url='http://adminpcrfaf.novanet.es/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120';
        $url2='http://adminpcrfaf.novanet.es/pnfg/NPcd/NFG_CmpJornada_Exec?cod_primaria=1000120';
        //include('../00pnfg/leerCompeticion.php');
        include('../00pnfg/leerGrupos.php');

        die;


    case 11:
    
        $url='http://www.ffib.es/Fed/NPcd/NFG_CmpJornada?cod_primaria=1000110';
        $url2='http://adminpcrfaf.novanet.es/pnfg/NPcd/NFG_CmpJornada_Exec?cod_primaria=1000120';
        //include('../00pnfg/leerCompeticion.php');
        include('../00pnfg/leerGrupos.php');
        
        die;

    case 13:
        $url='http://www.ffrm.es/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120';
        $url2='http://www.ffrm.es/pnfg/NPcd/NFG_CmpJornada_Exec?cod_primaria=1000120';
        //include('../00pnfg/leerCompeticion.php');
        include('../00pnfg/leerGrupos.php');
        
        die;

    case 14:
        $url='http://www.fexfutbol.com/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120';
        $url2='http://www.fexfutbol.com/pnfg/NPcd/NFG_CmpJornada_Exec?cod_primaria=1000120';
        //include('../00pnfg/leerCompeticion.php');
        include('../00pnfg/leerGrupos.php');
        
        die;

    case 16:
        $url='http://www.frfutbol.com/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120';
        $url2='http://www.frfutbol.com/pnfg/NPcd/NFG_CmpJornada_Exec?cod_primaria=1000120';
        //include('../00pnfg/leerCompeticion.php');
        include('../00pnfg/leerGrupos.php');
        die;

    case 17:
        $url='http://www.futbolaragon.com/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120';
        $url2='http://www.futbolaragon.com/pnfg/NPcd/NFG_CmpJornada_Exec?cod_primaria=1000120';
        //include('../00pnfg/leerCompeticion.php');
        include('../00pnfg/leerGrupos.php');
        die;

    case 18:
        $url='http://www.ffcm.es/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120';
        $url2='http://www.ffcm.es/pnfg/NPcd/NFG_CmpJornada_Exec?cod_primaria=1000120';
        //include('../00pnfg/leerCompeticion.php');
        include('../00pnfg/leerGrupos.php');
        die;

    

    case 5: //amigable
        $url='http://www.ffrm.es/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120';
        $url2='http://www.ffrm.es/pnfg/NPcd/NFG_CmpJornada_Exec?cod_primaria=1000120';
        include('../00pnfg/leerCompeticiones.php');
        break;

    case 6: //json
        $url='http://www.ffrm.es/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120';
        $url2='http://www.ffrm.es/pnfg/NPcd/NFG_CmpJornada_Exec?cod_primaria=1000120';
        include('../00pnfg/leerCompeticiones.php');
        break;

    case 4: //-----
        $url='http://www.ffrm.es/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120';
        $url2='http://www.ffrm.es/pnfg/NPcd/NFG_CmpJornada_Exec?cod_primaria=1000120';
        include('../00pnfg/leerCompeticiones.php');
        break;

    case 12: //-----
        $url='http://www.ffrm.es/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120';
        $url2='http://www.ffrm.es/pnfg/NPcd/NFG_CmpJornada_Exec?cod_primaria=1000120';
        include('../00pnfg/leerCompeticiones.php');
        break;



}

die('finalizado');

/*
Para grabar los torneos en el grupo dos de asturias (https://isquad.es);

include('funciones.php');

*/


$sql="SELECT CodCompeticion FROM torneo WHERE comunidad_id=".($i+1)." ORDER BY orden";
    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_ASSOC);

foreach ($resultado as $key => $value) {
    echo $value['CodCompeticion']."<br />";
    $CodCompeticion=$value['CodCompeticion'];

    switch ($i) {
        case 2:
            $url='https://isquad.es/competiciones_publico.php?id_temporada=68&id_competicion='.$CodCompeticion.'&id_fase=429766&id_ambito=6';
            break;
    }
    

    
    $html = new simple_html_dom();
    $content=getPage($url);

    $string = str_get_html($content);
    $html->load($string);
    foreach($html->find('select.select2grupo') as $e){
        echo $e->outertext . '<br>';
            
    }
        $html->clear();
        unset($html);
    
   
}


?>


