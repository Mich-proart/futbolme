<?php

if ($th_id > 1679 && $th_id < 1686) {
    if ($th_id < 1683) {
        $elnou_id = 194;
    } else {
        $elnou_id = 195;
    }

    $sql = 'SELECT equipo_id, puntos, jugados, ganados, empatados, perdidos, golesFavor, golesContra, idViejo
	FROM nacionalclasificacionok WHERE (temporada_id = '.$elnou_id.') AND equipo_id='.$clasifica['equipo_id'];

    $mysqli = conectar();
    $resultadoSQL = mysqli_query($mysqli, $sql);
    $resultado = mysqli_fetch_all($resultadoSQL, MYSQLI_BOTH);

    $row = $resultado[0];

    $clasifica['jugados'] = ($clasifica['jugados'] + $row['jugados']);
    $clasifica['puntos'] = ($clasifica['puntos'] + $row['puntos']);
    $clasifica['ganados'] = ($clasifica['ganados'] + $row['ganados']);
    $clasifica['empatados'] = ($clasifica['empatados'] + $row['empatados']);
    $clasifica['perdidos'] = ($clasifica['perdidos'] + $row['perdidos']);
    $clasifica['gFavor'] = ($clasifica['gFavor'] + $row['golesFavor']);
    $clasifica['gContra'] = ($clasifica['gContra'] + $row['golesContra']);
    $clasifica['diferencia'] = ($clasifica['gFavor'] - $clasifica['gContra']);

    if (407 == $clasifica['idViejo'] || 306 == $clasifica['idViejo'] || 330 == $clasifica['idViejo']) {
        $clasifica['diferencia'] = 20;
        //	$clasificacion[$clasifica['equipo_id']]=$clasifica;
    }

    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1022 == $th_id) {
    if (206 == $clasifica['idViejo']) {
        $clasifica['puntos'] = 29;
        $clasifica['ganados'] = 12;
        $clasifica['perdidos'] = 17;
        $clasificacion[$clasifica['equipo_id']] = $clasifica;
    }

    if (4044 == $clasifica['idViejo']) {
        $clasifica['puntos'] = 24;
        $clasifica['ganados'] = 9;
        $clasifica['perdidos'] = 18;
        $clasificacion[$clasifica['equipo_id']] = $clasifica;
    }
}

if (194 == $th_id && 538 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (194 == $th_id && 477 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (194 == $th_id && 478 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 40;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1269 == $th_id && 486 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1270 == $th_id && 4086 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1271 == $th_id && 516 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1274 == $th_id && 4381 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1275 == $th_id && 3985 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1275 == $th_id && 340 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 40;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1275 == $th_id && 57 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 30;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1276 == $th_id && 623 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1277 == $th_id && 4008 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1277 == $th_id && 3433 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1281 == $th_id && 759 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1283 == $th_id && 4029 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1284 == $th_id && 4152 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1125 == $th_id && 494 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1126 == $th_id && 519 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1131 == $th_id && 412 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1132 == $th_id && 57 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1133 == $th_id && 70 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1135 == $th_id && 759 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1136 == $th_id && 4014 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1262 == $th_id && 4027 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1263 == $th_id && 337 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1265 == $th_id && 419 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1266 == $th_id && 244 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1267 == $th_id && 4050 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = -5;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1141 == $th_id && 87 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1148 == $th_id && 4053 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1146 == $th_id && 4134 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1145 == $th_id && 690 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1144 == $th_id && 577 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1140 == $th_id && 4082 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1139 == $th_id && 421 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1139 == $th_id && 477 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = -50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1156 == $th_id && 4132 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1156 == $th_id && 4368 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 30;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1154 == $th_id && 3749 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1017 == $th_id && 234 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1151 == $th_id && 4082 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1150 == $th_id && 455 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 5;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1470 == $th_id && 114 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1165 == $th_id && 159 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1160 == $th_id && 246 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1160 == $th_id && 337 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 40;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1160 == $th_id && 524 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 30;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1159 == $th_id && 306 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1175 == $th_id && 4018 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1172 == $th_id && 478 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1172 == $th_id && 356 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1176 == $th_id && 534 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1177 == $th_id && 538 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1178 == $th_id && 4017 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1183 == $th_id && 868 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 2;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1188 == $th_id && 4375 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1180 == $th_id && 455 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1092 == $th_id && 623 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1092 == $th_id && 668 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 40;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1092 == $th_id && 246 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 30;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1092 == $th_id && 4028 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 20;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1092 == $th_id && 4375 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 10;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1033 == $th_id && 421 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1033 == $th_id && 305 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1033 == $th_id && 246 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 45;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (923 == $th_id && 3027 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (923 == $th_id && 4256 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (923 == $th_id && 714 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 45;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (922 == $th_id && 4114 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (922 == $th_id && 864 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 45;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (922 == $th_id && 779 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 40;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (922 == $th_id && 4255 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (921 == $th_id && 96 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (920 == $th_id && 4235 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (919 == $th_id && 5037 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (919 == $th_id && 572 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 45;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (919 == $th_id && 297 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (919 == $th_id && 4358 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 45;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (931 == $th_id && 991 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (930 == $th_id && 785 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 10;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (927 == $th_id && 364 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (927 == $th_id && 542 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (925 == $th_id && 4267 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (925 == $th_id && 94 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 45;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (924 == $th_id && 267 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (924 == $th_id && 311 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (918 == $th_id && 5088 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (918 == $th_id && 454 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (918 == $th_id && 4098 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (917 == $th_id && 4064 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (917 == $th_id && 467 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 45;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (916 == $th_id && 305 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (916 == $th_id && 368 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (916 == $th_id && 535 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (915 == $th_id && 599 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 40;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (915 == $th_id && 625 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 40;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (915 == $th_id && 407 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (915 == $th_id && 455 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (940 == $th_id && 4256 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (940 == $th_id && 5105 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 45;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (937 == $th_id && 653 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (937 == $th_id && 4312 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (936 == $th_id && 653 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (936 == $th_id && 652 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 45;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (936 == $th_id && 3873 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (936 == $th_id && 4358 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 45;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (936 == $th_id && 4874 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (948 == $th_id && 4250 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (948 == $th_id && 41 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 45;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (945 == $th_id && 4375 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (945 == $th_id && 401 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 45;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (946 == $th_id && 4224 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 10;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (943 == $th_id && 70 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (943 == $th_id && 1031 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 45;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (941 == $th_id && 4084 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 10;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (941 == $th_id && 3270 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (935 == $th_id && 5088 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (935 == $th_id && 4216 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 45;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (934 == $th_id && 420 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (934 == $th_id && 415 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (934 == $th_id && 80 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (934 == $th_id && 417 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 49;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (934 == $th_id && 516 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 48;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (934 == $th_id && 422 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 47;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (934 == $th_id && 55 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 46;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (933 == $th_id && 544 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 0;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (933 == $th_id && 421 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (933 == $th_id && 3995 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 48;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (933 == $th_id && 305 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 46;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (932 == $th_id && 478 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (932 == $th_id && 524 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (932 == $th_id && 455 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 48;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (957 == $th_id && 4037 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 10;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (957 == $th_id && 3027 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (957 == $th_id && 189 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (957 == $th_id && 403 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 110;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (957 == $th_id && 244 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 10;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (957 == $th_id && 58 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1384 == $th_id && 4249 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (956 == $th_id && 5084 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (955 == $th_id && 809 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (955 == $th_id && 2434 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (955 == $th_id && 793 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 40;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (954 == $th_id && 4604 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (965 == $th_id && 41 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (964 == $th_id && 2038 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (963 == $th_id && 424 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (963 == $th_id && 4230 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (963 == $th_id && 346 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (963 == $th_id && 4227 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (953 == $th_id && 4261 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (953 == $th_id && 4117 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (953 == $th_id && 4358 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (960 == $th_id && 1031 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (959 == $th_id && 1056 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (959 == $th_id && 340 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (959 == $th_id && 2153 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = -50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (958 == $th_id && 4135 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = -50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (952 == $th_id && 4082 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (952 == $th_id && 4216 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 45;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (951 == $th_id && 417 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = -50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (951 == $th_id && 415 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = -100;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (951 == $th_id && 269 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (951 == $th_id && 548 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (951 == $th_id && 4018 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 60;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (950 == $th_id && 3995 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = -10;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (950 == $th_id && 503 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = -50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (950 == $th_id && 368 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 45;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (950 == $th_id && 535 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (949 == $th_id && 495 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 5;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (949 == $th_id && 625 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (978 == $th_id && 86 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (973 == $th_id && 4037 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (975 == $th_id && 5105 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (974 == $th_id && 5084 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (970 == $th_id && 652 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (982 == $th_id && 4204 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (981 == $th_id && 4228 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 10;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (981 == $th_id && 4230 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (981 == $th_id && 4225 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (981 == $th_id && 4227 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (980 == $th_id && 4222 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (980 == $th_id && 735 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (980 == $th_id && 287 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (980 == $th_id && 4176 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (980 == $th_id && 3433 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (979 == $th_id && 364 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = -100;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (979 == $th_id && 4052 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (977 == $th_id && 4200 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (977 == $th_id && 206 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (976 == $th_id && 1672 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (969 == $th_id && 626 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 0;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (969 == $th_id && 454 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 0;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (968 == $th_id && 139 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = -30;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (968 == $th_id && 356 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = -50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (968 == $th_id && 544 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (968 == $th_id && 360 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = -50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (968 == $th_id && 549 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (971 == $th_id && 4604 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (972 == $th_id && 4237 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (972 == $th_id && 861 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (967 == $th_id && 544 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (967 == $th_id && 225 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (966 == $th_id && 478 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (966 == $th_id && 506 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1034 == $th_id && 422 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 0;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1040 == $th_id && 461 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1350 == $th_id && 99 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1352 == $th_id && 4213 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1352 == $th_id && 244 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = -50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1344 == $th_id && 4142 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1344 == $th_id && 320 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1344 == $th_id && 569 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = -10;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1345 == $th_id && 4358 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1339 == $th_id && 70 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1341 == $th_id && 4202 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1067 == $th_id && 225 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = -20;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1068 == $th_id && 269 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1325 == $th_id && 4064 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1049 == $th_id && 599 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1049 == $th_id && 3985 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 0;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1054 == $th_id && 4055 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1356 == $th_id && 509 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1318 == $th_id && 4028 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 20;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1077 == $th_id && 4117 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 0;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1320 == $th_id && 503 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 20;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1320 == $th_id && 522 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 20;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1320 == $th_id && 269 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = -20;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1321 == $th_id && 486 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 0;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (996 == $th_id && 139 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 0;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (993 == $th_id && 4350 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 20;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1307 == $th_id && 455 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1094 == $th_id && 412 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 0;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1083 == $th_id && 544 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = -50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1083 == $th_id && 503 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 0;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1084 == $th_id && 246 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 9;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1084 == $th_id && 306 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 10;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1085 == $th_id && 625 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 0;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1085 == $th_id && 139 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = -50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1317 == $th_id && 821 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 10;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1210 == $th_id && 495 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 10;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1205 == $th_id && 535 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 0;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1206 == $th_id && 478 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 20;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1201 == $th_id && 535 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 0;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1232 == $th_id && 549 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 10;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1232 == $th_id && 503 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1180 == $th_id && 523 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 0;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1177 == $th_id && 246 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 0;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1235 == $th_id && 521 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1174 == $th_id && 455 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1170 == $th_id && 306 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1169 == $th_id && 337 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1162 == $th_id && 152 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 0;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1149 == $th_id && 549 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 0;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1149 == $th_id && 306 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 0;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1150 == $th_id && 519 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 1;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1150 == $th_id && 868 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 0;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1156 == $th_id && 4133 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1139 == $th_id && 332 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1125 == $th_id && 534 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1126 == $th_id && 544 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = -2;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1019 == $th_id && 4051 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = -50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1134 == $th_id && 577 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = -5;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1271 == $th_id && 419 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = -10;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1285 == $th_id && 794 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1117 == $th_id && 519 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 0;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1020 == $th_id && 318 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 20;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1109 == $th_id && 521 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1112 == $th_id && 519 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1114 == $th_id && 376 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 0;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1115 == $th_id && 4029 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1293 == $th_id && 421 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1102 == $th_id && 527 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 0;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1103 == $th_id && 4128 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 0;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1103 == $th_id && 57 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = -1;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1298 == $th_id && 414 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 0;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1300 == $th_id && 652 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 20;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1301 == $th_id && 412 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 20;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1210 == $th_id && 599 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 10;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1206 == $th_id && 549 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 0;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (991 == $th_id && 306 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 20;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1202 == $th_id && 495 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 10;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1202 == $th_id && 503 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 0;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1198 == $th_id && 549 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 20;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1198 == $th_id && 522 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 0;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (998 == $th_id && 4343 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 0;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1194 == $th_id && 521 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 10;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1194 == $th_id && 534 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 10;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1190 == $th_id && 509 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 10;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1191 == $th_id && 3995 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 10;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1193 == $th_id && 419 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 10;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1216 == $th_id && 4349 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 10;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1309 == $th_id && 139 == $clasifica['idViejo']) {
    $clasifica['diferencia'] = 20;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1198 == $th_id) {
    if (503 == $clasifica['idViejo']) {
        $clasifica['jugados'] = 18;
        $clasifica['ganados'] = ($clasifica['ganados'] + 1);
        $clasifica['puntos'] = ($clasifica['puntos'] + 2);
        $clasificacion[$clasifica['equipo_id']] = $clasifica;
    }

    if (495 == $clasifica['idViejo']) {
        $clasifica['jugados'] = 18;
        $clasifica['ganados'] = ($clasifica['ganados'] + 1);
        $clasifica['puntos'] = ($clasifica['puntos'] + 2);
        $clasificacion[$clasifica['equipo_id']] = $clasifica;
    }

    if (524 == $clasifica['idViejo']) {
        $clasifica['jugados'] = 18;
        $clasifica['ganados'] = ($clasifica['ganados'] + 1);
        $clasifica['puntos'] = ($clasifica['puntos'] + 2);
        $clasificacion[$clasifica['equipo_id']] = $clasifica;
    }

    if (522 == $clasifica['idViejo']) {
        $clasifica['jugados'] = 18;
        $clasifica['ganados'] = ($clasifica['ganados'] + 1);
        $clasifica['puntos'] = ($clasifica['puntos'] + 2);
        $clasificacion[$clasifica['equipo_id']] = $clasifica;
    }

    if (4348 == $clasifica['idViejo']) {
        $clasifica['jugados'] = 18;
        $clasifica['perdidos'] = ($clasifica['perdidos'] + 4);
        $clasificacion[$clasifica['equipo_id']] = $clasifica;
    }
}

if (1098 == $th_id) {
    if (390 == $clasifica['idViejo']) {
        $clasifica['jugados'] = 32;
        $clasifica['puntos'] = 24;
        $clasifica['ganados'] = 8;
        $clasifica['perdidos'] = 15;
        $clasificacion[$clasifica['equipo_id']] = $clasifica;
    }

    if (868 == $clasifica['idViejo']) {
        $clasifica['jugados'] = 32;
        $clasifica['puntos'] = 29;
        $clasifica['ganados'] = 13;
        $clasifica['perdidos'] = 16;
        $clasificacion[$clasifica['equipo_id']] = $clasifica;
    }

    if (297 == $clasifica['idViejo']) {
        $clasifica['jugados'] = 32;
        $clasifica['puntos'] = 32;
        $clasifica['ganados'] = 15;
        $clasifica['perdidos'] = 15;
        $clasificacion[$clasifica['equipo_id']] = $clasifica;
    }

    if (4117 == $clasifica['idViejo']) {
        $clasifica['jugados'] = 32;
        $clasifica['puntos'] = 33;
        $clasifica['ganados'] = 14;
        $clasificacion[$clasifica['equipo_id']] = $clasifica;
    }

    if (4063 == $clasifica['idViejo']) {
        $clasifica['jugados'] = 32;
        $clasifica['puntos'] = 30;
        $clasifica['ganados'] = 13;
        $clasificacion[$clasifica['equipo_id']] = $clasifica;
    }

    if (4344 == $clasifica['idViejo']) {
        $clasifica['jugados'] = 32;
        $clasifica['puntos'] = 10;
        $clasifica['perdidos'] = 25;
        $clasificacion[$clasifica['equipo_id']] = $clasifica;
    }
}

if (1313 == $th_id) {
    if (4190 == $clasifica['idViejo']) {
        $clasifica['puntos'] = 0;
        $clasifica['ganados'] = 1;
        $clasifica['perdidos'] = 8;
        $clasifica['empatados'] = 1;
        $clasificacion[$clasifica['equipo_id']] = $clasifica;
    }

    if (4058 == $clasifica['idViejo']) {
        $clasifica['puntos'] = 13;
        $clasifica['ganados'] = 6;
        $clasifica['perdidos'] = 3;
        $clasifica['empatados'] = 1;
        $clasificacion[$clasifica['equipo_id']] = $clasifica;
    }

    if (4139 == $clasifica['idViejo']) {
        $clasifica['puntos'] = 11;
        $clasifica['ganados'] = 5;
        $clasifica['perdidos'] = 4;
        $clasificacion[$clasifica['equipo_id']] = $clasifica;
    }

    if (4281 == $clasifica['idViejo']) {
        $clasifica['puntos'] = 9;
        $clasifica['ganados'] = 4;
        $clasifica['perdidos'] = 5;
        $clasificacion[$clasifica['equipo_id']] = $clasifica;
    }
}

if (1315 == $th_id) {
    if (4169 == $clasifica['idViejo']) {
        $clasifica['puntos'] = 12;
        $clasifica['ganados'] = 5;
        $clasifica['perdidos'] = 3;
        $clasificacion[$clasifica['equipo_id']] = $clasifica;
    }

    if (793 == $clasifica['idViejo']) {
        $clasifica['puntos'] = 4;
        $clasifica['ganados'] = 2;
        $clasifica['perdidos'] = 7;
        $clasificacion[$clasifica['equipo_id']] = $clasifica;
    }
}

if (1195 == $th_id) {
    if (478 == $clasifica['idViejo']) {
        $clasifica['jugados'] = 18;
        $clasifica['ganados'] = ($clasifica['ganados'] + 1);
        $clasifica['puntos'] = ($clasifica['puntos'] + 2);
        $clasificacion[$clasifica['equipo_id']] = $clasifica;
    }

    if (535 == $clasifica['idViejo']) {
        $clasifica['jugados'] = 18;
        $clasifica['perdidos'] = ($clasifica['perdidos'] + 1);
        $clasificacion[$clasifica['equipo_id']] = $clasifica;
    }
}

if (1006 == $th_id) {
    $clasifica['jugados'] = 6;

    if (4040 == $clasifica['idViejo']) {
        $clasifica['ganados'] = ($clasifica['ganados'] + 2);
        $clasifica['perdidos'] = ($clasifica['perdidos'] + 1);
        $clasifica['puntos'] = ($clasifica['puntos'] + 4);
        $clasificacion[$clasifica['equipo_id']] = $clasifica;
    }

    if (4014 == $clasifica['idViejo']) {
        $clasifica['ganados'] = ($clasifica['ganados'] + 1);
        $clasifica['perdidos'] = ($clasifica['perdidos'] + 1);
        $clasifica['puntos'] = ($clasifica['puntos'] + 2);
        $clasificacion[$clasifica['equipo_id']] = $clasifica;
    }

    if (4343 == $clasifica['idViejo']) {
        $clasifica['ganados'] = ($clasifica['ganados'] + 1);
        $clasifica['perdidos'] = ($clasifica['perdidos'] + 2);
        $clasifica['puntos'] = ($clasifica['puntos'] + 2);
        $clasificacion[$clasifica['equipo_id']] = $clasifica;
    }

    if (4015 == $clasifica['idViejo']) {
        $clasifica['ganados'] = ($clasifica['ganados'] + 1);
        $clasifica['perdidos'] = ($clasifica['perdidos'] + 1);
        $clasifica['puntos'] = ($clasifica['puntos'] + 2);
        $clasificacion[$clasifica['equipo_id']] = $clasifica;
    }
}

if (1229 == $th_id) {
    $clasifica['jugados'] = 8;

    if (4076 == $clasifica['idViejo']) {
        $clasifica['ganados'] = ($clasifica['ganados'] + 1);
        $clasifica['puntos'] = ($clasifica['puntos'] + 2);
        $clasificacion[$clasifica['equipo_id']] = $clasifica;
    }

    if (419 == $clasifica['idViejo']) {
        $clasifica['ganados'] = ($clasifica['ganados'] + 1);
        $clasifica['puntos'] = ($clasifica['puntos'] + 2);
        $clasificacion[$clasifica['equipo_id']] = $clasifica;
    }

    if (4197 == $clasifica['idViejo']) {
        $clasifica['perdidos'] = ($clasifica['perdidos'] + 2);
        $clasificacion[$clasifica['equipo_id']] = $clasifica;
    }
}

if (1148 == $th_id && 244 == $clasifica['idViejo']) {
    $clasifica['puntos'] = ($clasifica['puntos'] + 2);
    $clasifica['ganados'] = ($clasifica['ganados'] + 1);
    $clasifica['perdidos'] = ($clasifica['perdidos'] - 1);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1148 == $th_id && 4132 == $clasifica['idViejo']) {
    $clasifica['puntos'] = ($clasifica['puntos'] - 3);
    $clasifica['perdidos'] = ($clasifica['perdidos'] + 1);
    $clasifica['ganados'] = ($clasifica['ganados'] - 1);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1145 == $th_id && 821 == $clasifica['idViejo']) {
    $clasifica['puntos'] = ($clasifica['puntos'] + 2);
    $clasifica['ganados'] = ($clasifica['ganados'] + 1);
    $clasifica['jugados'] = ($clasifica['jugados'] + 1);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1145 == $th_id && 4353 == $clasifica['idViejo']) {
    $clasifica['puntos'] = ($clasifica['puntos'] - 2);
    $clasifica['perdidos'] = ($clasifica['perdidos'] + 1);
    $clasifica['jugados'] = ($clasifica['jugados'] + 1);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1156 == $th_id && 244 == $clasifica['idViejo']) {
    $clasifica['puntos'] = ($clasifica['puntos'] + 2);
    $clasifica['ganados'] = ($clasifica['ganados'] + 1);
    $clasifica['jugados'] = ($clasifica['jugados'] + 1);
    $clasifica['diferencia'] = 40;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1156 == $th_id && 3457 == $clasifica['idViejo']) {
    $clasifica['puntos'] = ($clasifica['puntos'] - 2);
    $clasifica['perdidos'] = ($clasifica['perdidos'] + 1);
    $clasifica['jugados'] = ($clasifica['jugados'] + 1);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1092 == $th_id && 421 == $clasifica['idViejo']) {
    $clasifica['puntos'] = ($clasifica['puntos'] + 2);
    $clasifica['ganados'] = ($clasifica['ganados'] + 1);
    $clasifica['perdidos'] = ($clasifica['perdidos'] - 1);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1092 == $th_id && 576 == $clasifica['idViejo']) {
    $clasifica['puntos'] = ($clasifica['puntos'] + 2);
    $clasifica['ganados'] = ($clasifica['ganados'] + 1);
    $clasifica['perdidos'] = ($clasifica['perdidos'] - 1);
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1092 == $th_id && 542 == $clasifica['idViejo']) {
    $clasifica['puntos'] = ($clasifica['puntos'] - 6);
    $clasifica['ganados'] = ($clasifica['ganados'] - 2);
    $clasifica['perdidos'] = ($clasifica['perdidos'] + 2);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (925 == $th_id && 1056 == $clasifica['idViejo']) {
    $clasifica['puntos'] = ($clasifica['puntos'] - 4);
    $clasifica['ganados'] = ($clasifica['ganados'] - 1);
    $clasifica['perdidos'] = ($clasifica['perdidos'] + 1);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (925 == $th_id && 5106 == $clasifica['idViejo']) {
    $clasifica['puntos'] = ($clasifica['puntos'] + 2);
    $clasifica['ganados'] = ($clasifica['ganados'] + 1);
    $clasifica['perdidos'] = ($clasifica['perdidos'] - 1);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (918 == $th_id && 636 == $clasifica['idViejo']) {
    $clasifica['puntos'] = ($clasifica['puntos'] - 4);
    $clasifica['ganados'] = ($clasifica['ganados'] - 1);
    $clasifica['perdidos'] = ($clasifica['perdidos'] + 1);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (918 == $th_id && 626 == $clasifica['idViejo']) {
    $clasifica['puntos'] = ($clasifica['puntos'] + 2);
    $clasifica['ganados'] = ($clasifica['ganados'] + 1);
    $clasifica['perdidos'] = ($clasifica['perdidos'] - 1);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (946 == $th_id && 4222 == $clasifica['idViejo']) {
    $clasifica['puntos'] = ($clasifica['puntos'] - 1);
    $clasifica['empatados'] = ($clasifica['empatados'] - 1);
    $clasifica['perdidos'] = ($clasifica['perdidos'] + 1);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (946 == $th_id && 4260 == $clasifica['idViejo']) {
    $clasifica['puntos'] = ($clasifica['puntos'] + 1);
    $clasifica['empatados'] = ($clasifica['empatados'] - 1);
    $clasifica['ganados'] = ($clasifica['ganados'] + 1);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (955 == $th_id && 347 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 38;
    $clasifica['puntos'] = ($clasifica['puntos'] - 3);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (955 == $th_id && 4254 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 38;
    $clasifica['puntos'] = ($clasifica['puntos'] - 3);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (955 == $th_id && 4245 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 38;
    $clasifica['puntos'] = ($clasifica['puntos'] + 2);
    $clasifica['ganados'] = ($clasifica['ganados'] + 1);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (955 == $th_id && 809 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 38;
    $clasifica['puntos'] = ($clasifica['puntos'] + 2);
    $clasifica['ganados'] = ($clasifica['ganados'] + 1);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (962 == $th_id && 4111 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 42;
    $clasifica['perdidos'] = 23;
    $clasifica['puntos'] = 0;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (962 == $th_id && 442 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 42;
    $clasifica['puntos'] = ($clasifica['puntos'] + 2);
    $clasifica['ganados'] = ($clasifica['ganados'] + 1);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (962 == $th_id && 5094 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 42;
    $clasifica['puntos'] = ($clasifica['puntos'] + 2);
    $clasifica['ganados'] = ($clasifica['ganados'] + 1);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (962 == $th_id && 287 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 42;
    $clasifica['puntos'] = ($clasifica['puntos'] + 2);
    $clasifica['ganados'] = ($clasifica['ganados'] + 1);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (962 == $th_id && 4108 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 42;
    $clasifica['puntos'] = ($clasifica['puntos'] + 2);
    $clasifica['ganados'] = ($clasifica['ganados'] + 1);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (961 == $th_id && 266 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 34;
    $clasifica['puntos'] = ($clasifica['puntos'] - 3);
    $clasifica['perdidos'] = ($clasifica['perdidos'] + 1);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (961 == $th_id && 4161 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 34;
    $clasifica['puntos'] = ($clasifica['puntos'] + 2);
    $clasifica['ganados'] = ($clasifica['ganados'] + 1);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (960 == $th_id && 152 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 34;
    $clasifica['puntos'] = 14;
    $clasifica['perdidos'] = 21;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (960 == $th_id && 86 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 34;
    $clasifica['puntos'] = 34;
    $clasifica['ganados'] = 14;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (952 == $th_id && 4128 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 27;
    $clasifica['empatados'] = 3;
    $clasifica['perdidos'] = 14;
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (952 == $th_id && 2186 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 43;
    $clasifica['ganados'] = 19;
    $clasifica['empatados'] = 5;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (973 == $th_id && 5075 == $clasifica['idViejo']) {
    $clasifica['puntos'] = ($clasifica['puntos'] - 3);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (973 == $th_id && 4188 == $clasifica['idViejo']) {
    $clasifica['puntos'] = ($clasifica['puntos'] - 3);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (975 == $th_id && 3027 == $clasifica['idViejo']) {
    $clasifica['puntos'] = ($clasifica['puntos'] - 2);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (975 == $th_id && 244 == $clasifica['idViejo']) {
    $clasifica['puntos'] = ($clasifica['puntos'] - 3);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (982 == $th_id && 5095 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 37;
    $clasifica['jugados'] = 34;
    $clasifica['ganados'] = 17;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (982 == $th_id && 5073 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 20;
    $clasifica['jugados'] = 34;
    $clasifica['perdidos'] = 20;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (981 == $th_id && 425 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 39;
    $clasifica['ganados'] = 18;
    $clasifica['empatados'] = 5;
    $clasifica['perdidos'] = 19;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (981 == $th_id && 767 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 56;
    $clasifica['ganados'] = 24;
    $clasifica['empatados'] = 8;
    $clasifica['perdidos'] = 10;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (969 == $th_id && 186 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 23;
    $clasifica['ganados'] = 10;
    $clasifica['empatados'] = 5;
    $clasifica['perdidos'] = 19;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (969 == $th_id && 541 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 45;
    $clasifica['ganados'] = 19;
    $clasifica['empatados'] = 7;
    $clasifica['perdidos'] = 8;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (971 == $th_id && 5102 == $clasifica['idViejo']) {
    $clasifica['puntos'] = ($clasifica['puntos'] - 2);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (971 == $th_id && 5103 == $clasifica['idViejo']) {
    $clasifica['puntos'] = ($clasifica['puntos'] - 2);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1038 == $th_id && 663 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 18;
    $clasifica['puntos'] = 26;
    $clasifica['ganados'] = 13;
    $clasifica['empatados'] = 0;
    $clasifica['perdidos'] = 5;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1038 == $th_id && 4190 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 18;
    $clasifica['puntos'] = 0;
    $clasifica['ganados'] = 1;
    $clasifica['empatados'] = 0;
    $clasifica['perdidos'] = 17;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1374 == $th_id && 189 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 11;
    $clasifica['ganados'] = 5;
    $clasifica['empatados'] = 3;
    $clasifica['perdidos'] = 10;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1374 == $th_id && 4163 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 21;
    $clasifica['ganados'] = 9;
    $clasifica['empatados'] = 3;
    $clasifica['perdidos'] = 6;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1361 == $th_id && 5083 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 22;
    $clasifica['puntos'] = 1;
    $clasifica['ganados'] = 0;
    $clasifica['empatados'] = 4;
    $clasifica['perdidos'] = 18;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1361 == $th_id && 4200 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 22;
    $clasifica['puntos'] = 21;
    $clasifica['ganados'] = 10;
    $clasifica['empatados'] = 1;
    $clasifica['perdidos'] = 11;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1363 == $th_id && 4172 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 29;
    $clasifica['ganados'] = 12;
    $clasifica['empatados'] = 5;
    $clasifica['perdidos'] = 5;
    $clasifica['diferencia'] = -50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1363 == $th_id && 4008 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 16;
    $clasifica['ganados'] = 7;
    $clasifica['empatados'] = 4;
    $clasifica['perdidos'] = 11;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1363 == $th_id && 5082 == $clasifica['idViejo']) {
    $clasifica['puntos'] = ($clasifica['puntos'] - 3);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1373 == $th_id && 4037 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 5;
    $clasifica['ganados'] = 3;
    $clasifica['empatados'] = 1;
    $clasifica['perdidos'] = 14;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1373 == $th_id && 4053 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 20;
    $clasifica['ganados'] = 9;
    $clasifica['empatados'] = 2;
    $clasifica['perdidos'] = 7;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1373 == $th_id && 4188 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 10;
    $clasifica['ganados'] = 6;
    $clasifica['empatados'] = 0;
    $clasifica['perdidos'] = 12;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1373 == $th_id && 4186 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 18;
    $clasifica['ganados'] = 8;
    $clasifica['empatados'] = 2;
    $clasifica['perdidos'] = 8;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1346 == $th_id && 3804 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 18;
    $clasifica['puntos'] = 15;
    $clasifica['ganados'] = 6;
    $clasifica['empatados'] = 3;
    $clasifica['perdidos'] = 9;
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1346 == $th_id && 4178 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 18;
    $clasifica['puntos'] = 15;
    $clasifica['ganados'] = 8;
    $clasifica['empatados'] = 1;
    $clasifica['perdidos'] = 9;
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1350 == $th_id && 5088 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 8;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1352 == $th_id && 318 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 20;
    $clasifica['ganados'] = 10;
    $clasifica['empatados'] = 0;
    $clasifica['perdidos'] = 8;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1352 == $th_id && 4140 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 8;
    $clasifica['ganados'] = 4;
    $clasifica['empatados'] = 1;
    $clasifica['perdidos'] = 13;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1336 == $th_id && 4082 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 2;
    $clasifica['ganados'] = 0;
    $clasifica['empatados'] = 5;
    $clasifica['perdidos'] = 13;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1336 == $th_id && 4098 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 24;
    $clasifica['ganados'] = 10;
    $clasifica['empatados'] = 4;
    $clasifica['perdidos'] = 4;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1336 == $th_id && 186 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 17;
    $clasifica['ganados'] = 8;
    $clasifica['empatados'] = 1;
    $clasifica['perdidos'] = 9;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1336 == $th_id && 5076 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 24;
    $clasifica['ganados'] = 11;
    $clasifica['empatados'] = 2;
    $clasifica['perdidos'] = 5;
    $clasifica['diferencia'] = 50;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1336 == $th_id && 4158 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 13;
    $clasifica['ganados'] = 7;
    $clasifica['empatados'] = 0;
    $clasifica['perdidos'] = 11;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1336 == $th_id && 636 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 9;
    $clasifica['ganados'] = 4;
    $clasifica['empatados'] = 2;
    $clasifica['perdidos'] = 12;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1070 == $th_id && 206 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 36;
    $clasifica['puntos'] = 38;
    $clasifica['ganados'] = 17;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1070 == $th_id && 3750 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 36;
    $clasifica['puntos'] = 35;
    $clasifica['ganados'] = 15;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1070 == $th_id && 266 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 36;
    $clasifica['puntos'] = 0;
    $clasifica['perdidos'] = 19;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1074 == $th_id && 4016 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 38;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

    if (1059 == $th_id && 245 == $clasifica['idViejo']) {
        $clasifica['puntos'] = ($clasifica['puntos'] - 1);
        $clasificacion[$clasifica['equipo_id']] = $clasifica;
    }
if (1060 == $th_id && 4008 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 12;
    $clasifica['empatados'] = 3;
    $clasifica['perdidos'] = 10;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1060 == $th_id && 4050 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 27;
    $clasifica['empatados'] = 3;
    $clasifica['ganados'] = 12;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1088 == $th_id && 663 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 30;
    $clasifica['puntos'] = 45;
    $clasifica['ganados'] = 19;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1088 == $th_id && 189 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 30;
    $clasifica['puntos'] = 16;
    $clasifica['perdidos'] = 20;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1022 == $th_id && 206 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 29;
    $clasifica['ganados'] = 12;
    $clasifica['perdidos'] = 17;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1022 == $th_id && 4044 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 24;
    $clasifica['ganados'] = 9;
    $clasifica['perdidos'] = 18;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1079 == $th_id && 613 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 34;
    $clasifica['puntos'] = 3;
    $clasifica['perdidos'] = 31;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1079 == $th_id && 4050 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 34;
    $clasifica['puntos'] = 33;
    $clasifica['ganados'] = 13;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1082 == $th_id && 477 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 36;
    $clasifica['ganados'] = 17;
    $clasifica['perdidos'] = 11;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1082 == $th_id && 482 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 5;
    $clasifica['ganados'] = 2;
    $clasifica['perdidos'] = 24;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1208 == $th_id && 4365 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 23;
    $clasifica['ganados'] = 10;
    $clasifica['empatados'] = 3;
    $clasifica['perdidos'] = 1;
    $clasifica['gFavor'] = 38;
    $clasifica['gContra'] = 13;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1208 == $th_id && 3983 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 10;
    $clasifica['ganados'] = 5;
    $clasifica['empatados'] = 0;
    $clasifica['perdidos'] = 9;
    $clasifica['gFavor'] = 27;
    $clasifica['gContra'] = 40;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1208 == $th_id && 3985 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 14;
    $clasifica['puntos'] = 11;
    $clasifica['ganados'] = 5;
    $clasifica['empatados'] = 1;
    $clasifica['perdidos'] = 8;
    $clasifica['gFavor'] = 28;
    $clasifica['gContra'] = 29;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1208 == $th_id && 234 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 14;
    $clasifica['puntos'] = 10;
    $clasifica['ganados'] = 4;
    $clasifica['empatados'] = 2;
    $clasifica['perdidos'] = 8;
    $clasifica['gFavor'] = 40;
    $clasifica['gContra'] = 41;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1199 == $th_id && 421 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 6;
    $clasifica['perdidos'] = 4;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1199 == $th_id && 4010 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 6;
    $clasifica['ganados'] = 4;
    $clasifica['puntos'] = 8;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1094 == $th_id && 4128 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 24;
    $clasifica['ganados'] = 11;
    $clasifica['empatados'] = 2;
    $clasifica['perdidos'] = 17;
    $clasifica['diferencia'] = 0;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1094 == $th_id && 4040 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 17;
    $clasifica['ganados'] = 8;
    $clasifica['empatados'] = 2;
    $clasifica['perdidos'] = 20;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1094 == $th_id && 636 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 26;
    $clasifica['ganados'] = 11;
    $clasifica['empatados'] = 5;
    $clasifica['perdidos'] = 14;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1094 == $th_id && 3995 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 27;
    $clasifica['ganados'] = 12;
    $clasifica['empatados'] = 3;
    $clasifica['perdidos'] = 15;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1248 == $th_id && 446 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 0;
    $clasifica['puntos'] = 0;
    $clasifica['ganados'] = 4;
    $clasifica['empatados'] = 2;
    $clasifica['perdidos'] = 4;
    $clasifica['gFavor'] = 18;
    $clasifica['gContra'] = 16;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1249 == $th_id && 337 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 0;
    $clasifica['puntos'] = 0;
    $clasifica['ganados'] = 4;
    $clasifica['empatados'] = 3;
    $clasifica['perdidos'] = 0;
    $clasifica['gFavor'] = 18;
    $clasifica['gContra'] = 8;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1250 == $th_id && 524 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 0;
    $clasifica['puntos'] = 0;
    $clasifica['ganados'] = 5;
    $clasifica['empatados'] = 0;
    $clasifica['perdidos'] = 3;
    $clasifica['gFavor'] = 26;
    $clasifica['gContra'] = 18;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1251 == $th_id && 868 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 0;
    $clasifica['puntos'] = 0;
    $clasifica['ganados'] = 2;
    $clasifica['empatados'] = 0;
    $clasifica['perdidos'] = 1;
    $clasifica['gFavor'] = 5;
    $clasifica['gContra'] = 2;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1252 == $th_id && 269 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 0;
    $clasifica['puntos'] = 0;
    $clasifica['ganados'] = 4;
    $clasifica['empatados'] = 3;
    $clasifica['perdidos'] = 1;
    $clasifica['gFavor'] = 13;
    $clasifica['gContra'] = 9;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1253 == $th_id && 549 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 0;
    $clasifica['puntos'] = 0;
    $clasifica['ganados'] = 4;
    $clasifica['empatados'] = 2;
    $clasifica['perdidos'] = 4;
    $clasifica['gFavor'] = 15;
    $clasifica['gContra'] = 18;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1017 == $th_id && 340 == $clasifica['idViejo']) {
    $clasifica['puntos'] = ($clasifica['puntos'] - 2);
    $clasifica['jugados'] = 18;
    $clasifica['perdidos'] = 13;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1017 == $th_id && 337 == $clasifica['idViejo']) {
    $clasifica['puntos'] = ($clasifica['puntos'] + 2);
    $clasifica['jugados'] = 18;
    $clasifica['ganados'] = 14;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1156 == $th_id && 1600 == $clasifica['idViejo']) {
    $clasifica['puntos'] = ($clasifica['puntos'] - 2);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1127 == $th_id && 4027 == $clasifica['idViejo']) {
    $clasifica['puntos'] = ($clasifica['puntos'] - 4);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1127 == $th_id && 4078 == $clasifica['idViejo']) {
    $clasifica['puntos'] = ($clasifica['puntos'] - 5);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1019 == $th_id && 4395 == $clasifica['idViejo']) {
    $clasifica['puntos'] = ($clasifica['puntos'] + 2);
    $clasifica['ganados'] = ($clasifica['ganados'] + 1);
    $clasifica['perdidos'] = ($clasifica['perdidos'] - 1);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1019 == $th_id && 4149 == $clasifica['idViejo']) {
    $clasifica['puntos'] = ($clasifica['puntos'] - 3);
    $clasifica['ganados'] = ($clasifica['ganados'] - 1);
    $clasifica['perdidos'] = ($clasifica['perdidos'] + 1);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1136 == $th_id && 4377 == $clasifica['idViejo']) {
    $clasifica['puntos'] = ($clasifica['puntos'] - 1);
    $clasifica['empatados'] = ($clasifica['empatados'] - 1);
    $clasifica['perdidos'] = ($clasifica['perdidos'] + 1);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1136 == $th_id && 244 == $clasifica['idViejo']) {
    $clasifica['puntos'] = ($clasifica['puntos'] + 1);
    $clasifica['empatados'] = ($clasifica['empatados'] - 1);
    $clasifica['ganados'] = ($clasifica['ganados'] + 1);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1128 == $th_id && 4155 == $clasifica['idViejo']) {
    $clasifica['puntos'] = ($clasifica['puntos'] + 2);
    $clasifica['jugados'] = ($clasifica['jugados'] + 1);
    $clasifica['ganados'] = ($clasifica['ganados'] + 1);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1128 == $th_id && 4378 == $clasifica['idViejo']) {
    $clasifica['puntos'] = ($clasifica['puntos'] - 2);
    $clasifica['jugados'] = ($clasifica['jugados'] + 1);
    $clasifica['perdidos'] = ($clasifica['perdidos'] + 1);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1128 == $th_id && 4379 == $clasifica['idViejo']) {
    $clasifica['jugados'] = ($clasifica['jugados'] + 2);
    $clasifica['perdidos'] = ($clasifica['perdidos'] + 1);
    $clasifica['ganados'] = ($clasifica['ganados'] + 1);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1129 == $th_id && 4134 == $clasifica['idViejo']) {
    $clasifica['puntos'] = ($clasifica['puntos'] - 2);
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1118 == $th_id && 186 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 4;
    $clasifica['ganados'] = 2;
    $clasifica['perdidos'] = 23;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1118 == $th_id && 636 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 31;
    $clasifica['ganados'] = 12;
    $clasifica['perdidos'] = 7;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1118 == $th_id && 4381 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 22;
    $clasifica['ganados'] = 6;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1118 == $th_id && 412 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 19;
    $clasifica['ganados'] = 6;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
if (1288 == $th_id && 4082 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 1;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1110 == $th_id && 4028 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 24;
    $clasifica['perdidos'] = 7;
    $clasifica['ganados'] = 15;
    $clasifica['puntos'] = 32;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1110 == $th_id && 4078 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 24;
    $clasifica['perdidos'] = 13;
    $clasifica['ganados'] = 8;
    $clasifica['puntos'] = 19;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1110 == $th_id && 4128 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 24;
    $clasifica['perdidos'] = 19;
    $clasifica['ganados'] = 2;
    $clasifica['puntos'] = 5;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1111 == $th_id && 4086 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 26;
    $clasifica['perdidos'] = 12;
    $clasifica['ganados'] = 9;
    $clasifica['puntos'] = 22;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1111 == $th_id && 668 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 26;
    $clasifica['perdidos'] = 10;
    $clasifica['ganados'] = 11;
    $clasifica['puntos'] = 27;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1114 == $th_id && 139 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 26;
    $clasifica['perdidos'] = 12;
    $clasifica['ganados'] = 11;
    $clasifica['puntos'] = 25;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1114 == $th_id && 572 == $clasifica['idViejo']) {
    $clasifica['jugados'] = 26;
    $clasifica['perdidos'] = 12;
    $clasifica['ganados'] = 7;
    $clasifica['puntos'] = 22;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1006 == $th_id && 4050 == $clasifica['idViejo']) {
    $clasifica['puntos'] = 5;
    $clasifica['perdidos'] = 3;
    $clasifica['ganados'] = 2;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1303 == $th_id && 735 == $clasifica['idViejo']) {
    $clasifica['perdidos'] = 2;
    $clasifica['ganados'] = 8;
    $clasifica['puntos'] = 16;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1303 == $th_id && 4389 == $clasifica['idViejo']) {
    $clasifica['perdidos'] = 8;
    $clasifica['ganados'] = 2;
    $clasifica['puntos'] = 3;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1304 == $th_id && 297 == $clasifica['idViejo']) {
    $clasifica['empatados'] = 1;
    $clasifica['perdidos'] = 4;
    $clasifica['ganados'] = 3;
    $clasifica['puntos'] = 5;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1304 == $th_id && 4058 == $clasifica['idViejo']) {
    $clasifica['empatados'] = 2;
    $clasifica['perdidos'] = 6;
    $clasifica['ganados'] = 2;
    $clasifica['puntos'] = 6;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1304 == $th_id && 4390 == $clasifica['idViejo']) {
    $clasifica['empatados'] = 3;
    $clasifica['perdidos'] = 2;
    $clasifica['ganados'] = 3;
    $clasifica['puntos'] = 9;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1191 == $th_id && 421 == $clasifica['idViejo']) {
    $clasifica['perdidos'] = ($clasifica['perdidos'] + 1);
    $clasifica['jugados'] = 14;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1191 == $th_id && 4365 == $clasifica['idViejo']) {
    $clasifica['ganados'] = ($clasifica['ganados'] + 1);
    $clasifica['puntos'] = ($clasifica['puntos'] + 2);
    $clasifica['jugados'] = 14;
}
if (1003 == $th_id && 421 == $clasifica['idViejo']) {
    $clasifica['perdidos'] = ($clasifica['perdidos'] + 1);
    $clasifica['jugados'] = 10;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}

if (1003 == $th_id && 4197 == $clasifica['idViejo']) {
    $clasifica['ganados'] = ($clasifica['ganados'] + 1);
    $clasifica['puntos'] = ($clasifica['puntos'] + 2);
    $clasifica['jugados'] = 10;
    $clasificacion[$clasifica['equipo_id']] = $clasifica;
}
