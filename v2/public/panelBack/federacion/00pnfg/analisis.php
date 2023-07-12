<?php
/*
consulta para ver los partidos que tienen los torneos que se han grabado:

SELECT t.id,t.nombre, t.rondas, t.jornadas, t.grupo_id, t.estado, (SELECT count(p.id) FROM partido p WHERE p.grupo_id=t.grupo_id) partidos FROM torneo t WHERE t.comunidad_id=1 ORDER BY (SELECT count(p.id) FROM partido p WHERE p.grupo_id=t.grupo_id) desc




/*torneos que fallan
http://futgal.es/pnfg/NPcd/NFG_CmpJornada?cod_primaria=1000120&CodTemporada=14&cod_agrupacion=1&Sch_Codigo_Delegacion=&Sch_Tipo_Juego=&CodCompeticion=9166378&CodGrupo=9166379&CodJornada=1




$cadena='<style>#idh38405:after{content:"\0034"}</style><span id=idh38405><span style="display:none;">2</span></span>';
$cadena = preg_replace('/<style>#idh(.*?):after{content:"\\\00(.*?)"}<\/style>/', '$2,', $cadena);
$cadena = preg_replace('/<span id=idh(.*?)>(.*?)<span style="display:none;">(.*?)<\/span><\/span>/', '$2,$3', $cadena);

/*
$texto = preg_replace('/\[size=(\d*?)\]/', '<span style="font-size: $1px">', $texto);
$texto = preg_replace('/\[color=(\#[0-9A-F]{6}+)\]/', '<span style="color: $1">', $texto);
$texto = preg_replace('/\[quote=(.*?)\]/', '<div style="color:red"><b>$1</b>', $texto);
*/


?>

<textarea cols="100" rows="4"><?php echo $cadena?></textarea>

<hr />

4-0  (el 4 sin nada) Tamaño: 1 - 68
<style>#idh21224:after{content:"0"}</style><spanid=idh21224></span>
<hr />
0-2  Tamaño: 108 - 86
<style>#idh21225:after{content:"\0030"}</style><spanid=idh21225><spanstyle="display:none;">1</span></span>
<style>#idh21226:after{content:"\0030";display:none}</style><spanid=idh21226>2</span>

<hr />



1-0 Tamaño: 109 - 108
<style>#idh21227:before{content:"\0031"}</style><spanid=idh21227><spanstyle="display:none;">1</span></span>
<style>#idh21228:after{content:"\0030"}</style><spanid=idh21228><spanstyle="display:none;">1</span></span>
<hr />
2-0  (el 0 sin nada) Tamaño: 123 - 1
<style>#idh21229:before{content:"\0031";display:none}</style><spanid=idh21229>2<spanstyle="display:none;">1</span></span>
<hr />
1-3 Tamaño: 109 - 109
<style>#idh21231:before{content:"\0031"}</style><spanid=idh21231><spanstyle="display:none;">1</span></span>
<style>#idh21232:before{content:"\0033"}</style><spanid=idh21232><spanstyle="display:none;">2</span></span>
<hr />
6-1 Tamaño: 108 - 105
<style>#idh21233:after{content:"\0036"}</style><spanid=idh21233><spanstyle="display:none;">6</span></span>
<style>#idh21234:before{content:"1"}</style><spanid=idh21234><spanstyle="display:none;">1</span></span>
<hr />
2-1  (el 1 sin nada) Tamaño: 122 - 1
<style>#idh21235:after{content:"\0030";display:none}</style><spanid=idh21235>2<spanstyle="display:none;">1</span></span>
<hr />
0-1 (el 0 sin nada) Tamaño: 1 - 109
<style>#idh21238:before{content:"\0031"}</style><spanid=idh21238><spanstyle="display:none;">1</span></span>
<hr />
0-0 Tamaño: 123 - 109
<style>#idh21239:before{content:"\0030";display:none}</style><spanid=idh21239>0<spanstyle="display:none;">1</span></span>
<style>#idh21240:before{content:"\0030"}</style><spanid=idh21240><spanstyle="display:none;">1</span></span>
<hr />
1-1 Tamaño: 86 - 122
<style>#idh21241:after{content:"\0030";display:none}</style><spanid=idh21241>1</span>
<style>#idh21242:after{content:"\0030";display:none}</style><spanid=idh21242>1<spanstyle="display:none;">1</span></span>
<hr /><hr />
1<style>#idh21227:before{content:"\0031"}</style><spanid=idh21227><spanstyle="display:none;">1</span></span>
1<style>#idh21231:before{content:"\0031"}</style><spanid=idh21231><spanstyle="display:none;">1</span></span>
1<style>#idh21234:before{content:"1"}</style><spanid=idh21234><spanstyle="display:none;">1</span></span>
1<style>#idh21238:before{content:"\0031"}</style><spanid=idh21238><spanstyle="display:none;">1</span></span>

2<style>#idh21229:before{content:"\0031";display:none}</style><spanid=idh21229>2<spanstyle="display:none;">1</span></span>
3<style>#idh21232:before{content:"\0033"}</style><spanid=idh21232><spanstyle="display:none;">2</span></span>

0<style>#idh21239:before{content:"\0030";display:none}</style><spanid=idh21239>0<spanstyle="display:none;">1</span></span>
0<style>#idh21240:before{content:"\0030"}</style><spanid=idh21240><spanstyle="display:none;">1</span></span>

