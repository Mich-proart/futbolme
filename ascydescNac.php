
<?php 
//define( '_FUTBOLME_', 1 );
//require_once('src/config.php');
$titol="La actualidad hoy... ";
$contador=-1;
$equiposTwDia=array();

foreach ($partidosDia as $key => $value) { 

    $seleccion=0;
    foreach ($selecciones as $v) {
        if ($value['temporada_id']==$v){$seleccion=1; break; }
    }
    if (isset($value['equipoLocal_id'])){
        $contador++;    
        $equiposTwDia[$contador]['id'] = $value['equipoLocal_id'];
        $equiposTwDia[$contador]['equipo'] = $value['localCorto'];
        $equiposTwDia[$contador]['idPais'] = $value['pais_local'];
        $equiposTwDia[$contador]['twitter'] = $value['twLocal'];
        $equiposTwDia[$contador]['club_id'] = $value['club_local'];
        $equiposTwDia[$contador]['seleccion'] = $seleccion;
    }
    if (isset($value['equipoVisitante_id'])){
    $contador++;
    $equiposTwDia[$contador]['id'] = $value['equipoVisitante_id'];
    $equiposTwDia[$contador]['equipo'] = $value['visitanteCorto'];
    $equiposTwDia[$contador]['idPais'] = $value['pais_visitante'];
    $equiposTwDia[$contador]['twitter'] = $value['twVisitante'];
    $equiposTwDia[$contador]['club_id'] = $value['club_visitante'];
    $equiposTwDia[$contador]['seleccion'] = $seleccion;
    }
}  


$equiposTw=array();
if (count($equiposTwDia)>6){
    foreach ($equiposTwDia as $key => $value) {
        if ($value['idPais']==60){ $equiposTw[]=$value; }
    }
    unset($equiposTwDia);
} else {
    $equiposTw=$equiposTwDia;
    unset($equiposTwDia);
}

/*
$titol="Fichajes, pretemporada, abonos... Primera División";
$contador=-1;
$equiposTw=array();
$temporada_id=1; 
$equipos = Xequipos_temporada($temporada_id);
foreach ($equipos as $key => $value) {  
    $contador++;
    $equiposTw[$contador]['id'] = $value['equipo_id'];
    $equiposTw[$contador]['equipo'] = $value['nombreCorto'];
    $equiposTw[$contador]['idPais'] = $value['pais_id'];
    $equiposTw[$contador]['twitter'] = $value['slug'];
    $equiposTw[$contador]['club_id'] = $value['club_id'];
} 
*/


$filtro=0;

if (isset($equiposTw)) {
    include 'srcRecursos/pesLeerTwitsPortada.php'; //incluye derecha02
} //isset equiposTw


/*

$p[0] = Xpartidos(206, 3); //ascenso a segunda 
$p[0] = Xpartidos(207, 91); //permanencia
$p[0] = Xpartidos(208, 3); //ascenso a segunda B
$p[0] = Xpartidos(208, 27); //Campeones - ascenso a segunda B


$p[0] = Xpartidos(206, 91); //Campeones - Final ida

*/




?>  
            