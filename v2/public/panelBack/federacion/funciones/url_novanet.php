<?php
if ($comunidad_id!=11){

	if ($comunidad_id!=7){
		$url=$rot.'/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120&CodTemporada='.$idTF.'&CodCompeticion=aaa&CodGrupo=ccc&CodJornada=ddd&cod_agrupacion=1&Sch_Codigo_Delegacion=&Sch_Tipo_Juego=&';
		$url_equipo=$rot.'/pnfg/NPcd/NFG_VisEquipos?cod_primaria=1000119&Codigo_Equipo=xxx';
	} else {
		$url=$rot.'/competiciones/calendario?season='.$idTF.'&type=1&grouping=1&competition=aaa&group=ccc&round=ddd&club=';
	}

} else {

	$url=$rot.'/Fed/NPcd/NFG_CmpJornada?cod_primaria=1000110&CodTemporada='.$idTF.'&CodCompeticion=aaa&CodGrupo=ccc&CodJornada=ddd&Sch_Codigo_Delegacion=&Sch_Tipo_Juego=&';	
	$url_equipo=$rot.'/Fed/NPcd/NFG_VisEquipos?cod_primaria=1000109&Codigo_Equipo=xxx';

	
}

?>