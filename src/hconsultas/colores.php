<?php

function coloresTabla($temporada_id, $posicion)
{
    //imp($temporada_id);
    //imp($posicion);

    $color_fondo = 'white';
    $color_texto = 'black';

    if ($temporada_id > 1418 && $temporada_id < 1733) {
        if (1 === $posicion) {
            $color_fondo = 'yellow';
            $color_texto = 'black';
        }
    }

    switch ($temporada_id) {
    case 117: case 264:
    if ($posicion < 5) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 18) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 2023: case 2024: case 2025: case 2026: case 2029: case 2030: case 2027: case 2031: case 2032: case 2033: case 2035: case 2036: case 2037: case 2039: case 1661: case 1662: case 1663: case 1664: case 1665: case 1667: case 1668: case 1669: case 1670: case 1671: case 1673: case 1674: case 1675: case 1677: case 8: case 9: case 11: case 12: case 14: case 16: case 18: case 19: case 20: case 21: case 23: case 24: case 32: case 33: case 34: case 36: case 37: case 38: case 41: case 43: case 45: case 47: case 48: case 55: case 56: case 58: case 59: case 60: case 61: case 62: case 64: case 65: case 66: case 68: case 69: case 71: case 72: case 79: case 80: case 81: case 82: case 83: case 84: case 85: case 89: case 90: case 91: case 93: case 96: case 103: case 104: case 105: case 106: case 107: case 109: case 112: case 116: case 119: case 120: case 250: case 251: case 252: case 253: case 254: case 255: case 259: case 260: case 261: case 266: case 267: case 274: case 275: case 276: case 277: case 278: case 279: case 283: case 284: case 285: case 286: case 287: case 288: case 290: case 291:
    if ($posicion < 5) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 17) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    if (1667 == $temporada_id && 16 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 2022: case 2028: case 2038: case 1676: case 1666: case 1660: case 15: case 13: case 10: case 22: case 17: case 40: case 39: case 35: case 46: case 44: case 42: case 31: case 63: case 70: case 67: case 88: case 87: case 86: case 94: case 92: case 111: case 110: case 118: case 115: case 114: case 258: case 265: case 263: case 289: case 282:
    if ($posicion < 5) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 16) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    if (258 == $temporada_id && 1 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    if (114 == $temporada_id && 11 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1672: case 57: case 95: case 108: case 113: case 2034:
    if ($posicion < 5) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 15) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 7:
    if ($posicion < 5) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 14) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 262:
    if ($posicion < 6) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (4 == $posicion) {
        $color_fondo = 'white';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 14) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 280: case 281: case 256: case 257:
    if (2 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 15) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    if (281 == $temporada_id && 15 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    if (257 == $temporada_id && 15 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1:
    if ($posicion < 5) {
        $color_fondo = '#FFFFCC';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (5 == $posicion || 6 == $posicion || 7 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 17) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1654:
    //echo "posicion".$posicion."<br />";
    if ($posicion < 5) {
        $color_fondo = '#FFFFCC';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (5 == $posicion || 6 == $posicion || 10 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 17) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }

    //die("ko");
    break;

    case 2016:
    if ($posicion < 5) {
        $color_fondo = '#FFFFCC';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (5 == $posicion || 7 == $posicion || 9 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 17) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 2:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 3 && $posicion < 8) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 18) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1655:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 2 && $posicion < 7) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (12 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    if ($posicion > 19) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }

    break;

    case 2017:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 2 && $posicion < 7) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (18 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    if ($posicion > 19) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 49: case 25:
    if ($posicion < 5) {
        $color_fondo = '#FFFFCC';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (5 == $posicion || 6 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 17) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 73:
    if ($posicion < 5) {
        $color_fondo = '#FFFFCC';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (5 == $posicion || 6 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (8 == $posicion) {
        $color_fondo = '#FFCCFF';
        $color_texto = 'black';
    }
    if ($posicion > 17) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 121: case 97:
    if ($posicion < 5) {
        $color_fondo = '#FFFFCC';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (5 == $posicion || 6 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (7 == $posicion) {
        $color_fondo = '#FFCCFF';
        $color_texto = 'black';
    }
    if ($posicion > 17) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 268:
    if ($posicion < 5) {
        $color_fondo = '#FFFFCC';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (5 == $posicion || 6 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (7 == $posicion || 8 == $posicion || 9 == $posicion) {
        $color_fondo = '#FFCCFF';
        $color_texto = 'black';
    }
    if ($posicion > 17) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 292:
    if ($posicion < 5) {
        $color_fondo = '#FFFFCC';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (5 == $posicion || 6 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (7 == $posicion || 8 == $posicion) {
        $color_fondo = '#FFCCFF';
        $color_texto = 'black';
    }
    if ($posicion > 17) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 315:
    if ($posicion < 5) {
        $color_fondo = '#FFFFCC';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (5 == $posicion || 6 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (16 == $posicion || 15 == $posicion) {
        $color_fondo = '#FFCCFF';
        $color_texto = 'black';
    }
    if ($posicion > 17) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 338:
    if ($posicion < 5) {
        $color_fondo = '#FFFFCC';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (5 == $posicion || 6 == $posicion || 7 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (10 == $posicion || 15 == $posicion) {
        $color_fondo = '#FFCCFF';
        $color_texto = 'black';
    }
    if ($posicion > 17) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 362: case 339: case 316: case 293: case 269: case 122: case 98: case 74: case 50: case 26:
    if ($posicion < 4) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 18) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 361:
    if ($posicion < 5) {
        $color_fondo = '#FFFFCC';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (5 == $posicion || 6 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 17) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 384:
    if ($posicion < 6) {
        $color_fondo = '#FFFFCC';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (4 == $posicion || 6 == $posicion || 9 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (7 == $posicion || 10 == $posicion) {
        $color_fondo = '#FFCCFF';
        $color_texto = 'black';
    }
    if ($posicion > 17) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 385:
    if ($posicion < 4) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 18 || 17 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 304:
    if ($posicion < 5) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (19 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    if (21 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    break;

    case 298: case 299: case 300: case 301: case 302: case 303: case 308: case 309: case 311: case 313: case 314: case 322: case 323: case 324: case 325: case 327: case 329: case 334: case 336: case 337: case 390: case 391: case 392: case 393: case 395: case 396: case 398: case 399: case 400: case 401: case 402: case 403: case 404: case 406: case 367: case 368: case 369: case 370: case 371: case 372: case 373: case 374: case 375: case 376: case 378: case 380: case 383: case 344: case 346: case 347: case 348: case 349: case 350: case 352: case 353: case 354: case 356: case 357: case 359: case 360:
    if ($posicion < 5) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 17) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    if (395 == $temporada_id && 16 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    if (353 == $temporada_id && 6 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    if (298 == $temporada_id && 7 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    if (308 == $temporada_id && 6 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    if (311 == $temporada_id && 7 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    if (303 == $temporada_id && 9 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
        if (404 == $temporada_id) {
            if (5 == $posicion) {
                $color_fondo = 'orange';
                $color_texto = 'black';
            }
            if (2 == $posicion) {
                $color_fondo = 'white';
                $color_texto = 'black';
            }
        }
        if (309 == $temporada_id) {
            if (5 == $posicion) {
                $color_fondo = 'orange';
                $color_texto = 'black';
            }
            if (3 == $posicion) {
                $color_fondo = 'white';
                $color_texto = 'black';
            }
        }
    if (369 == $temporada_id && 2 == $posicion) {
        $color_fondo = 'white';
        $color_texto = 'black';
    }
    if (369 == $temporada_id && 5 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (346 == $temporada_id && 2 == $posicion) {
        $color_fondo = 'white';
        $color_texto = 'black';
    }
    if (346 == $temporada_id && 5 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    break;

    case 471: case 413: case 422: case 423: case 405: case 377: case 333:
    if ($posicion < 5) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 15) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 306: case 305: case 312: case 310: case 332: case 307: case 328: case 326: case 335: case 331: case 321: case 594: case 595: case 397: case 596: case 597: case 607: case 609: case 599: case 601: case 604: case 605: case 570: case 571: case 572: case 573: case 583: case 586: case 578: case 547: case 548: case 549: case 550: case 552: case 553: case 532: case 514: case 517: case 513: case 520: case 509: case 425: case 420: case 394: case 379: case 381: case 382: case 358: case 351:
    if ($posicion < 5) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 16) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    if (595 == $temporada_id && 16 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    if (572 == $temporada_id && 16 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    if (549 == $temporada_id && 16 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    if (425 == $temporada_id && 14 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    if (381 == $temporada_id && 4 == $posicion) {
        $color_fondo = 'white';
        $color_texto = 'black';
    }
    if (381 == $temporada_id && 5 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    break;

    case 436: case 437: case 438: case 439: case 440: case 441: case 442: case 443: case 444: case 445: case 446: case 448: case 449: case 450: case 452: case 414: case 415: case 416: case 417: case 418: case 419: case 421: case 424: case 426: case 427: case 428: case 429:
    if ($posicion < 5) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 17) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 407:
    if ($posicion < 5) {
        $color_fondo = '#FFFFCC';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (5 == $posicion || 6 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (7 == $posicion) {
        $color_fondo = '#FFCCFF';
        $color_texto = 'black';
    }
    if (17 == $posicion || 18 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 18) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 430:
    if ($posicion < 11) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (2 == $posicion || 4 == $posicion) {
        $color_fondo = '#FFFFCC';
        $color_texto = 'black';
    }
    if (5 == $posicion) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    if (9 == $posicion || 10 == $posicion) {
        $color_fondo = '#FFCCFF';
        $color_texto = 'black';
    }
    if (17 == $posicion || 18 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 18) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 408:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (3 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (4 == $posicion || 5 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 18) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 431:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (3 == $posicion || 4 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 18) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 482: case 491: case 492: case 493: case 494: case 495: case 498: case 483: case 484: case 485: case 487: case 488: case 489: case 490: case 497: case 459: case 468: case 469: case 472: case 473: case 474: case 475: case 461: case 462: case 463: case 464: case 465: case 466: case 467:
    if ($posicion < 5) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 17) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 496: case 486: case 470: case 447: case 451:
    if ($posicion < 5) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 16) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 453:
    if ($posicion < 8) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = '#FFFFCC';
        $color_texto = 'black';
    }
    if (4 == $posicion) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    if (18 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 18) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 454:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (3 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 16) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 476:
    if ($posicion < 6) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (3 == $posicion) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    if (6 == $posicion) {
        $color_fondo = '#FFFFFF';
        $color_texto = 'black';
    }
    if (19 == $posicion || 20 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 20) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 477:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (3 == $posicion || 5 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 16) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 499:
    if ($posicion < 8) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (2 == $posicion || 7 == $posicion) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    if (6 == $posicion) {
        $color_fondo = '#FFFFFF';
        $color_texto = 'black';
    }
    if (17 == $posicion || 18 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 18) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 2018: case 2019: case 2021: case 1656: case 1657: case 1658: case 1659: case 3: case 4: case 5: case 6: case 27: case 28: case 29: case 30: case 51: case 52: case 53: case 54: case 75: case 76: case 77: case 78: case 99: case 100: case 101: case 102: case 123: case 247: case 248: case 249: case 270: case 271: case 272: case 273: case 524: case 525: case 526: case 527: case 501: case 502: case 503: case 504: case 478: case 479: case 480: case 481: case 455: case 456: case 457: case 458: case 432: case 433: case 434: case 435: case 409: case 410: case 411: case 412: case 386: case 387: case 388: case 389: case 363: case 364: case 365: case 366: case 340: case 341: case 342: case 343: case 317: case 318: case 319: case 320: case 294: case 295: case 296: case 297:
    if ($posicion < 5) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (16 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 16) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
        if (272 == $temporada_id) {
            if (5 == $posicion) {
                $color_fondo = 'orange';
                $color_texto = 'black';
            }
            if (3 == $posicion) {
                $color_fondo = 'white';
                $color_texto = 'black';
            }
        }
    break;

    case 2020:
    if ($posicion < 5) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (17 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 17) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 522:
    if ($posicion < 6) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (3 == $posicion) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    if (17 == $posicion || 18 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 18) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 587: case 588:
    if ($posicion < 3) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 7) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 545:
    if ($posicion < 7) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    if (17 == $posicion || 18 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 18) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 568:
    if ($posicion < 7) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (3 == $posicion) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    if (17 == $posicion || 18 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 18) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 143: case 144:
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (16 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 16) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 139: case 140: case 141: case 142: case 145: case 146: case 131: case 134: case 135: case 136: case 138:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 17) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 147: case 132: case 133: case 137:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 16) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 130:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 15) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 611: case 612: case 606:
    if ($posicion < 3) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 16) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 608: case 610: case 614: case 602: case 603: case 584: case 590: case 519: case 576: case 577: case 579: case 580: case 582: case 551: case 560: case 561: case 562: case 565: case 566: case 554: case 555: case 556: case 557: case 558: case 559: case 521: case 537: case 538: case 539: case 540: case 541: case 544: case 533: case 534: case 535: case 536: case 531: case 505: case 515: case 516: case 518: case 507: case 508: case 510: case 511: case 512:
    if ($posicion < 5) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (515 == $temporada_id && 9 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    if ($posicion > 17) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 598: case 615: case 585: case 589: case 575: case 563: case 567: case 529: case 460:
    if ($posicion < 5) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 18) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 594: case 595: case 596: case 597: case 607: case 609: case 599: case 601: case 604: case 605: case 570: case 571: case 572: case 573: case 583: case 586: case 578: case 547: case 548: case 549: case 550: case 552: case 553: case 532: case 514: case 517: case 513: case 520: case 509:
    if ($posicion < 5) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 16) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    if (595 == $temporada_id && 16 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    if (572 == $temporada_id && 16 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    if (549 == $temporada_id && 16 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 600: case 574: case 591: case 528: case 543: case 530: case 345:
    if ($posicion < 5) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 15) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 613: case 581: case 506: case 355: case 330:
    if ($posicion < 5) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 14) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 564:
    if ($posicion < 5) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 13) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 124:
    if ($posicion < 6) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (3 == $posicion) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    if (17 == $posicion || 18 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 18) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 592:
    if ($posicion < 7) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    if (17 == $posicion || 18 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 18) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 148:
    if ($posicion < 7) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (2 == $posicion || 6 == $posicion) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    if (17 == $posicion || 18 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 18) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 149: case 593: case 125: case 569: case 546: case 523: case 500:
    if (2 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (3 == $posicion || 4 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 16) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
        if (125 == $temporada_id) {
            if (3 == $posicion) {
                $color_fondo = 'white';
                $color_texto = 'black';
            }
            if (5 == $posicion) {
                $color_fondo = 'orange';
                $color_texto = 'black';
            }
        }
    break;

    case 163: case 164: case 165: case 166: case 168: case 169: case 170: case 157: case 158: case 160: case 161: case 162:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 17) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    if (18 == $posicion && 158 == $temporada_id) {
        $color_fondo = 'white';
        $color_texto = 'black';
    }
    break;

    case 154: case 155: case 156: case 159:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 16) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 167:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (22 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 171:
    if ($posicion < 5) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (6 == $posicion) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    if (17 == $posicion || 18 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 18) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 172:
    if (2 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (4 == $posicion || 5 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 16) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 173: case 174: case 175: case 176: case 150: case 151: case 152: case 153: case 126: case 127: case 128: case 129:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 16) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    if (16 == $posicion && 176 == $temporada_id) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    if (11 == $posicion && 151 == $temporada_id) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    if (16 == $posicion && 152 == $temporada_id) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    if (16 == $posicion && 128 == $temporada_id) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 177: case 178: case 179: case 180: case 181: case 182: case 183: case 184: case 185: case 186: case 187: case 188: case 189: case 190: case 191: case 192: case 193:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 17) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    if (17 == $posicion && 191 == $temporada_id) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    if (18 == $posicion && 180 == $temporada_id) {
        $color_fondo = 'white';
        $color_texto = 'black';
    }
    break;

    case 1685:
    if (1 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    break;

    case 1684:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    break;

    case 1680:
    if ($posicion < 5) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    break;

    case 1681:
    if (2 == $posicion) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    break;

    case 1682:
    if ($posicion > 3) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if (5 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 201:
    if ($posicion < 4) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (20 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    break;

    case 199:
    if ($posicion < 4) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    break;

    case 205: case 206: case 207: case 211: case 198: case 200: case 202: case 203: case 204:
    if ($posicion < 4) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 17) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if (21 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 212:
    if ($posicion < 5) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 17) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    break;

    case 197: case 209:
    if ($posicion < 6) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 17) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    break;

    case 210:
    if ($posicion < 8) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 17) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    break;

    case 208:
    if ($posicion < 9) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 17) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    break;

    case 196:
    if ($posicion < 5) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    break;

    case 195:
        switch ($posicion) {
            case 1: case 3: case 5: case 7: case 9: case 11:
            $color_fondo = 'yellow'; $color_texto = 'black';
            break;
            case 2: case 4: case 6: case 8: case 10: case 12:
            $color_fondo = 'orange'; $color_texto = 'black';
            break;
        }
    if ($posicion > 12) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    break;

    case 194:
    if ($posicion < 7) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 6 && $posicion < 13) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 12) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    break;

    case 215: case 216:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 7) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 213:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 1 && $posicion < 6) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (4 == $posicion) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    if ($posicion > 15) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 231:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    if ($posicion > 2 && $posicion < 7) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 15) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 619:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 2 && $posicion < 6) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 16) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 618:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 1 && $posicion < 6) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (3 == $posicion) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    if ($posicion > 15) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 636:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 1 && $posicion < 6) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (4 == $posicion) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    if ($posicion > 15) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 653:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 1 && $posicion < 4) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    if ($posicion > 3 && $posicion < 8) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 15) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 217:
    if ($posicion < 3) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 15) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 223: case 225:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    break;

    case 226: case 228:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 13) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 674: case 675: case 685: case 666: case 660: case 646: case 650: case 651: case 629: case 241: case 242: case 229: case 218:
    if ($posicion < 3) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 16) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 679: case 683: case 669:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 17) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 680: case 681: case 682: case 686: case 664: case 665: case 667: case 659: case 661: case 640: case 647: case 632: case 633: case 626: case 616: case 227:
    if ($posicion < 3) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 18) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 235: case 236:
    if ($posicion < 3) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 19) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 684: case 676: case 677: case 678: case 657: case 663: case 668: case 658: case 645: case 648: case 649: case 652: case 642: case 643: case 644: case 622: case 628: case 634: case 635: case 624: case 625: case 244: case 245: case 246: case 237: case 238: case 239: case 224: case 219: case 220: case 221:
    if ($posicion < 3) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 17) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    if (10 == $posicion && 668 == $temporada_id) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 240:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 18) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 662: case 641: case 243: case 230: case 222:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 16) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 617:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 15) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 670:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 1 && $posicion < 5) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (5 == $posicion) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    if ($posicion > 15) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 687:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 1 && $posicion < 5) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (6 == $posicion) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    if ($posicion > 15) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 699:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 1 && $posicion < 5) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (5 == $posicion || 7 == $posicion) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    if ($posicion > 15) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 709:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 2 && $posicion < 6) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    if ($posicion > 15) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 710: case 700: case 688: case 671: case 654: case 637: case 232: case 214:
    if ($posicion < 4) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 16) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    if (7 == $posicion && 688 == $temporada_id) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    break;

    case 711: case 712: case 701: case 702: case 672: case 673: case 655: case 656: case 638: case 639: case 620: case 621: case 233: case 234:
    if ($posicion < 3) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 17) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 689: case 690:
    if ($posicion < 3) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 16) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 714: case 715: case 716: case 717: case 718: case 627:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 17) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 630: case 623:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 16) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 713: case 698: case 631:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 18) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 703: case 704: case 705: case 706: case 707: case 708: case 691: case 692: case 693: case 694: case 695: case 696: case 697:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 19) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 719:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 1 && $posicion < 5) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (5 == $posicion) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    if ($posicion > 15) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 725:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 1 && $posicion < 6) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (3 == $posicion) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    if ($posicion > 15) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 731:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (6 == $posicion) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    if ($posicion > 1 && $posicion < 5) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 15) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 737:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (8 == $posicion) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    if ($posicion > 1 && $posicion < 5) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 15) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 743:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (10 == $posicion) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    if ($posicion > 1 && $posicion < 5) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 15) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 720:
    if ($posicion < 4) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 16) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 750: case 744: case 738: case 732: case 726:
    if ($posicion < 4) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 12 && $posicion < 17) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 16) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 721: case 722: case 723: case 724:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 1 && $posicion < 11) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 18) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    break;

    case 749:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 1 && $posicion < 6) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (4 == $posicion) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    if ($posicion > 15) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 758:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (3 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 12 && $posicion < 17) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 16) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 757: case 759:
    if (1 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 13 && $posicion < 18) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 17) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 760: case 751: case 752: case 753: case 754: case 745: case 746: case 747: case 748: case 739: case 740: case 741: case 742: case 733: case 734: case 735: case 736: case 727: case 728: case 729: case 730:
    if (1 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 12 && $posicion < 17) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 16) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 756:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 1 && $posicion < 5) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 13 && $posicion < 18) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 17) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 755:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    if ($posicion > 2 && $posicion < 7) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 14) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 761:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (6 == $posicion) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    if ($posicion > 1 && $posicion < 6) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 13) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 771:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (11 == $posicion) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    if ($posicion > 1 && $posicion < 6) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 13) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 772: case 762:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 1 && $posicion < 4) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 12 && $posicion < 17) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 16) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 773: case 774: case 775: case 776: case 777: case 778: case 779: case 780:
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 18) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 763: case 764: case 765: case 766: case 767: case 768: case 769: case 770:
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 8) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 781:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    if ($posicion > 3 && $posicion < 8) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 12 && $posicion < 15) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 14) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 798:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (4 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (6 == $posicion) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    if (5 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (7 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 12 && $posicion < 15) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 14) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 815:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (3 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (4 == $posicion) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    if (5 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (8 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (9 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 12 && $posicion < 15) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 14) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 832:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    if (3 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (4 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (6 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (11 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 12 && $posicion < 15) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 14) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 848:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (3 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (4 == $posicion) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    if (6 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (8 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (7 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 12 && $posicion < 15) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 14) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 864:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (5 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (6 == $posicion) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    if (7 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 12 && $posicion < 15) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 14) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 881:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (3 == $posicion) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    if (6 == $posicion) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    if (4 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (7 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 12 && $posicion < 15) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 14) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 898:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = '#CCCC33';
        $color_texto = 'black';
    }
    if (4 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (5 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (10 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 12 && $posicion < 15) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 14) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 933: case 934: case 916: case 917: case 899: case 900: case 883: case 865: case 866: case 849: case 850: case 833: case 834: case 816: case 817: case 799: case 800:
    if (1 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 12 && $posicion < 15) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 14) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 782: case 783:
    if (1 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 6 && $posicion < 9) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 8) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 882:
    if (1 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 13 && $posicion < 16) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 15) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    if (5 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 963:
    if (1 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 11) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 946:
    if (1 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 11) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 959: case 908:
    if (1 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 12) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 958:
    if ($posicion < 7) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    } else {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    break;

    case 974: case 975: case 954:
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 16) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 973:
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 5) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 970: case 947: case 902: case 886: case 876: case 879: case 872: case 862: case 856: case 844: case 846: case 837: case 840: case 828: case 830: case 823: case 824: case 813:
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if (18 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 831: case 814: case 807:
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 17) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 983: case 971: case 1029: case 961: case 964: case 965: case 953: case 955: case 935: case 941: case 948: case 938: case 939: case 930: case 931: case 919: case 921: case 922: case 909: case 904: case 905: case 893: case 887: case 880: case 860: case 847: case 839: case 818: case 811: case 803: case 804: case 806:
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 15) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 863: case 1031: case 855: case 841: case 842: case 836: case 838: case 825: case 827: case 819: case 821: case 822: case 801: case 808: case 802: case 805:
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 14) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 969: case 976: case 978: case 972: case 952: case 1383: case 960: case 956: case 957: case 944: case 940: case 918: case 924: case 925: case 926: case 927: case 928: case 929: case 923: case 901: case 907: case 911: case 903: case 884: case 891: case 892: case 894: case 897: case 885: case 867: case 873: case 875: case 868: case 869: case 870: case 871: case 851: case 857: case 859:
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 14) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 977: case 942: case 943: case 936: case 937: case 920: case 910: case 912: case 913: case 914: case 906: case 890: case 895: case 888: case 858: case 852: case 853: case 854: case 835: case 843: case 1032: case 820: case 810:
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 13) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 889: case 874: case 826: case 809:
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 12) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 877: case 878:
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 11) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 784: case 791: case 792: case 793: case 794: case 797: case 785: case 786: case 788: case 789: case 790:
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if (10 == $posicion && 788 == $temporada_id) {
        $color_fondo = '#ffddff';
        $color_texto = 'black';
    }
    if ($posicion > 10) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 787:
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (3 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 10) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 796:
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 8) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 861: case 845: case 829:
    if ($posicion < 3) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 2 && $posicion < 5) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 18) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 812:
    if ($posicion < 3) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 2 && $posicion < 5) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 16) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 979:
    if (1 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (18 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 980: case 962: case 945:
    if ($posicion < 3) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 2 && $posicion < 5) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    break;

    case 795:
    if ($posicion < 3) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 2 && $posicion < 5) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 14 && $posicion < 19) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 18) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 981:
    if ($posicion < 3) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 18) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 982: case 971:
    if (1 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    break;

    case 950: case 951:
    if (1 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 12 && $posicion < 15) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 14) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 967: case 968:
    if (1 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 14 && $posicion < 17) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 16) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 966: case 949: case 932: case 915:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (3 == $posicion && 966 == $temporada_id) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ((932 == $temporada_id || 915 == $temporada_id) && (13 == $posicion || 14 == $posicion)) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 14) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1375:
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    break;

    case 1374:
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (5 == $posicion || 6 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    break;

    case 1373:
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (5 == $posicion or posicion > 8) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    break;

    case 1371:
    if (1 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if (4 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    break;

    case 1370: case 896:
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    break;

    case 1369:
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (5 == $posicion || 8 == $posicion || 9 == $posicion || 12 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    break;

    case 1368:
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (8 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    break;

    case 1367:
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 8) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    break;

    case 1366:
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (9 == $posicion or posicion > 10) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    break;

    case 1365:
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (9 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    break;

    case 1364:
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (10 == $posicion || 12 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    break;

    case 1363:
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (4 == $posicion || 8 == $posicion || 11 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (10 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1362:
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (6 == $posicion || 8 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 10) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1361:
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (10 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    break;

    case 1360:
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (4 == $posicion || 10 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    break;

    case 1359:
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (2 == $posicion || 6 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    break;

    case 1357: case 1358: case 1376: case 1377:
    if (1 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (3 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    break;

    case 1378:
    if ($posicion < 3) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (4 == $posicion || 6 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1033: case 1034:
    if (1 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 1 && $posicion < 4) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 14) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    break;

    case 1048: case 984:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (984 == $temporada_id && 3 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 12 && $posicion < 15) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 14) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1049: case 1050:
    if (1 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 1 && $posicion < 4) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 14) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1334: case 1335: case 1353: case 1354:
    if (1 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    break;

    case 1051: case 1057: case 1058: case 1059: case 1060: case 1061: case 1062: case 1065: case 1052: case 1053: case 1023: case 1024: case 1054: case 1055: case 1056: case 1356: case 1035: case 1025: case 1041: case 1042: case 1043: case 1044: case 1045: case 1047: case 1036: case 1037: case 1026: case 1027: case 1038: case 1039: case 1040:
    if ($posicion < 3) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    break;

    case 1063: case 1046:
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    break;

    case 1064: case 1028: case 1030: case 1372:
    if (1 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    break;

    case 1336:
    if ($posicion < 7) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 7) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    if (2 == $posicion || 7 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    break;

    case 1337:
    if ($posicion < 7) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 7) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    if (7 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    break;

    case 1338:
    $color_fondo = 'orange'; $color_texto = 'black';
    if (3 == $posicion || 6 == $posicion || 9 == $posicion || 11 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    break;

    case 1339:
    $color_fondo = 'orange'; $color_texto = 'black';
    if (1 == $posicion || 8 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (10 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1340:
    if ($posicion < 9) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (9 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    break;

    case 1341:
    if ($posicion < 11) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    break;

    case 1342:
    if ($posicion < 8) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (8 == $posicion || 9 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (10 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1343:
    if ($posicion < 8) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (8 == $posicion || 9 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    break;

    case 1344:
    if ($posicion < 7) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (7 == $posicion || 8 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 8) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1345:
    $color_fondo = 'orange'; $color_texto = 'black';
    if (7 == $posicion || 8 == $posicion || 3 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 10) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1346:
    if ($posicion < 10) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (6 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    break;

    case 1347:
    if ($posicion < 10) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (8 == $posicion) {
        $color_fondo = 'white';
        $color_texto = 'black';
    }
    break;

    case 1348:
    if ($posicion < 6) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (6 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    break;

    case 1349:
    if ($posicion < 3) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    break;

    case 1350:
    if ($posicion < 9) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    break;

    case 1351:
    if ($posicion < 9) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (7 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (9 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1352:
    if ($posicion < 9) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (3 == $posicion || 9 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (10 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1164:
    case 1015:
    case 1262:
    case 1263:
    case 1264:
    case 1265:
    case 1266:
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (8 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    break;

    case 1188:
    case 1189:
    if ($posicion < 3) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 6) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1187:
    if ($posicion < 3) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (6 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    if (8 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1191:
    case 1192:
    case 1193:
    if ($posicion < 3) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    break;

    case 1190:
    case 1186:
    case 1176:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 10) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1199:
    case 1200:
    case 997:
    case 998:
    case 999:
    case 1000:
    case 1001:
    case 1002:
    case 1007:
    case 1304:
    if ($posicion < 3) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    break;

    case 986:
    case 987:
    case 988:
    case 989:
    case 990:
    case 1212:
    case 1213:
    case 1207:
    case 1208:
    case 1203:
    case 1204:
    case 1241:
    case 1244:
    case 1086:
    case 1021:
    case 1087:
    case 1088:
    case 1089:
    case 1090:
    if (1 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    break;

    case 985:
    case 1211:
    case 991:
    case 992:
    case 993:
    case 994:
    case 995:
    case 996:
    case 1004:
    case 1005:
    case 1006:
    case 1008:
    case 1009:
    case 1181:
    case 1182:
    case 1183:
    case 1184:
    case 1185:
    case 1179:
    case 1010:
    case 1011:
    case 1012:
    case 1013:
    case 1014:
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    break;

    case 1209:
    case 1210:
    case 1205:
    case 1206:
    case 1201:
    case 1202:
    case 1197:
    case 1198:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (10 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1214:

    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (10 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    break;

    case 1215:
    if (1 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 8) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1288:
    case 1289:
    case 1290:
    case 1291:
    if ($posicion > 1) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1216:
    if ($posicion < 3) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 2) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1194:
    case 1229:
    case 1248:
    case 1249:
    case 1250:
    case 1251:
    case 1252:
    case 1253:
    case 1254:
    case 1255:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    break;

    case 1195:
    case 1230:
    case 1231:
    case 1127:
    case 1131:
    case 1132:
    case 1133:
    case 1019:
    case 1134:
    case 1135:
    case 1136:
    case 1137:
    case 1128:
    case 1129:
    case 1130:
    case 1285:
    case 1308:
    case 1309:
    if ($posicion < 3) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    break;

    case 1196:
    case 1003:
    case 1267:
    if ($posicion < 3) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (3 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    break;

    case 1232:
    case 1233:
    case 1234:
    if (1 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    break;

    case 1180:
    case 1161:
    case 1016:
    case 1162:
    case 1163:
    case 1165:
    case 1166:
    case 1167:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (10 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 10) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1177:
    case 1178:
    if ($posicion < 3) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (11 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (12 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1235:
    case 1236:
    case 1237:
    if ($posicion < 3) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    } else {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    break;
    case 1257:
    case 1258:
    case 1259:
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    break;

    case 1172:
    case 1100:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 12) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    break;

    case 1116:
    case 1108:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 12) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1117:
    case 1292:
    if ($posicion < 3) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 12) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1109:
    if ($posicion < 3) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 12) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    break;

    case 1118:
    case 1119:
    case 1120:
    case 1020:
    case 1121:
    case 1122:
    case 1123:
    case 1124:
    if (1 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (10 == $posicion || 11 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 11) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1173:
    case 1174:
    case 1175:
    if ($posicion < 3) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 2) {
        $color_fondo = '#ffcccc';
        $color_texto = 'black';
    }
    if (7 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (8 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1238:
    case 1247:
    if ($posicion < 3) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 2 && $posicion < 5) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    break;

    case 1245:
    if (3 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    break;

    case 1293:
    case 1078:
    case 1069:
    case 1070:
    case 1071:
    case 1072:
    case 1073:
    case 1074:
    if (1 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    break;

    case 1022:
    case 1079:
    case 1080:
    case 1081:
    case 1082:
    if (1 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 16) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    break;

    case 1294:
    if (1 == $posicion || 2 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (3 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1168:
    case 1159:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (11 == $posicion || 12 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 12) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1169:
    case 1170:
    case 1171:
    if ($posicion < 3) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (3 == $posicion || 4 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 4) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1110:
    case 1111:
    case 1112:
    case 1113:
    case 1114:
    case 1115:
    if ($posicion < 3) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (3 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    break;

    case 1160:
    case 1298:
    case 1300:
    if ($posicion < 3) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (3 == $posicion || 4 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 12) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1149:
    case 1138:
    case 1125:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if (12 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 12) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1150:
    case 1139:
    case 1126:
    if ($posicion < 3) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (3 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (12 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 12) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1151:
    case 1152:
    case 1017:
    case 1153:
    case 1155:
    case 1157:
    case 1158:
    if ($posicion < 3) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (10 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    break;

    case 1140:
    case 1142:
    case 1018:
    case 1143:
    case 1144:
    case 1145:
    case 1146:
    case 1147:
    case 1148:
    case 1141:
    if ($posicion < 4) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (10 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    break;

    case 1154:
    if ($posicion < 3) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 2) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    break;

    case 1156:
    case 1269:
    case 1270:
    case 1271:
    case 1286:
    case 1287:
    if ($posicion < 3) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (10 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1260:
    case 1296:
    if ($posicion < 3) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 2) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    break;

    case 1101:
    case 1102:
    if ($posicion < 3) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (14 == $posicion || 15 == $posicion) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if (16 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1103:
    if ($posicion < 3) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 15) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    break;

    case 1104: case 1105: case 1106: case 1107:
    if ($posicion < 3) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 15) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if (18 == $posicion) {
        $color_fondo = 'red';
        $color_texto = 'black';
    }
    break;

    case 1301:
    if (1 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (2 == $posicion || 3 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (4 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1305:
    if (2 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (4 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1302: case 1303:
    if ($posicion < 3) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (4 == $posicion || 5 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;
    case 1091: case 1083: case 1075: case 1066:
    if (1 == $posicion) {
        $color_fondo = 'gold';
        $color_texto = 'black';
    }
    if ($posicion > 12 && $posicion < 15) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 14) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1092:
    if (1 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 1 && $posicion < 4) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 15) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1093: case 1084: case 1085:
    if (1 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 1 && $posicion < 4) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 13) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1307:
    if ($posicion < 3) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 2 && $posicion < 5) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1094: case 1097: case 1099:
    if ($posicion < 3) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 14) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    break;

    case 1095: case 1096: case 1098:
    if ($posicion < 3) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 14 && $posicion < 17) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 16) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1310:
    if (2 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    break;

    case 1311:
    if (2 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (4 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1312: case 1313:
    if (1 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (5 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1314:
    if ($posicion < 3) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (5 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1315: case 1324:
    if ($posicion < 3) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    break;

    case 1316:
    if (2 == $posicion || 3 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    break;

    case 1317:
    if ($posicion > 2) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    break;

    case 1318: case 1319:
    if ($posicion > 3) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1076: case 1077: case 1067: case 1068:
    if (1 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if ($posicion > 1 && $posicion < 4) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if ($posicion > 11 && $posicion < 14) {
        $color_fondo = 'tomato';
        $color_texto = 'black';
    }
    if ($posicion > 13) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1320:
    if (1 == $posicion || 3 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    break;

    case 1321:
    if (2 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (1 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (4 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1325:
    if (1 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (2 == $posicion) {
        $color_fondo = 'orange';
        $color_texto = 'black';
    }
    if (4 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1322:
    if (1 == $posicion) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (3 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;

    case 1323:
    if ($posicion < 3) {
        $color_fondo = 'yellow';
        $color_texto = 'black';
    }
    if (3 == $posicion || 6 == $posicion) {
        $color_fondo = 'indianred';
        $color_texto = 'white';
    }
    break;
}

    $colores = array();

    $colores = array('posicion' => $posicion,
                'color_fondo' => $color_fondo,
                'color_texto' => $color_texto,
                 );

    return $colores;
}

function resumen($temporada_id)
{
    $txt = '';
    switch ($temporada_id) {
        case 2016:
        $txt = 'Campeón: <b>FC Barcelona</b><br />';
        $txt .= 'Liga de Campeones: <b>FC Barcelona, Real Madrid CF, Club Atlético de Madrid y Real Sociedad de Fútbol</b><br />';
        $txt .= 'Liga Europa: <b>Valencia CF, Real Betis Balompié y Sevilla FC</b><br />';
        $txt .= 'Descenso: <b>RCD Mallorca, RC Deportivo y Real Zaragoza</b><br />';
        break;

        case 2017:
        $txt = 'Campeón: <b>Elche CF</b><br />';
        $txt .= 'Ascenso: <b>Elche CF, Villarreal CF y UD Almería</b><br />';
        $txt .= 'Promoción de Ascenso: <b>UD Almería, Girona FC, AD Alcorcón y UD Las Palmas</b><br />';
        $txt .= 'Descenso: <b>CD Guadalajara, Real Racing Club, SD Huesca y Xerez CD</b><br />';

        break;

        case 2018:
        $txt = 'Campeón: <b>CD Tenerife</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Tenerife, CD Leganés, Real Oviedo y Caudal Deportivo</b><br />';
        $txt .= 'Promoción de Permanencia: <b>Zamora CF</b><br />';
        $txt .= 'Descenso: <b>UD Salamanca, UD San Sebastián de los Reyes, RSD Alcalá, Rayo Vallecano B y CD Marino</b><br />';

        break;

        case 2019:
        $txt = 'Campeón: <b>Deportivo Alavés</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Deportivo Alavés, SD Eibar, Athletic Club B y Lleida Esportiu TCF</b><br />';
        $txt .= 'Promoción de Permanencia: <b>Real Zaragoza B</b><br />';
        $txt .= 'Descenso: <b>RS Gimnástica, Real Zaragoza B, Real Racing Club B, CD Teruel, Club Atlético Osasuna B y CD Izarra</b><br />';

        break;

        case 2020:
        $txt = 'Campeón: <b>CE L´Hospitalet</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CE L´Hospitalet, Huracán Valencia CF, Levante UD B y CD Alcoyano</b><br />';
        $txt .= 'Promoción de Permanencia: <b>CE Constància</b><br />';
        $txt .= 'Descenso: <b>RCD Mallorca B, Orihuela CF, Yeclano Deportivo y CD Binissalem</b><br />';

        break;

        case 2021:
        $txt = 'Campeón: <b>Real Jaén CF</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Real Jaén CF, FC Cartagena, Albacete Balompié y Lucena CF</b><br />';
        $txt .= 'Promoción de Permanencia: <b>CF Villanovense</b><br />';
        $txt .= 'Descenso: <b>CF Villanovense, UCAM Murcia CF, CD San Roque de Lepe, Loja CD y Real Betis Balompié B</b><br />';

        break;

        case 2022:
        $txt = 'Campeón: <b>Racing Club Ferrol</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Racing Club Ferrol, RC Celta B, SD Compostela y RC Deportivo B</b><br />';
        $txt .= 'Descenso: <b>Villalonga FC, Bergantiños CF, Céltiga FC y Narón Balompé</b><br />';

        break;

        case 2023:
        $txt = 'Campeón: <b>CD Tuilla</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Tuilla, CD Universidad de Oviedo, CD Covadonga y UP Langreo</b><br />';
        $txt .= 'Descenso: <b>CD Llanes, Navia CF y Navarro CF</b><br />';

        break;

        case 2024:
        $txt = 'Campeón: <b>CD Tropezón</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Tropezón, Deportivo Rayo Cantabria, CD Cayón y CD Laredo</b><br />';
        $txt .= 'Descenso: <b>SD Textil Escudo, EMF Meruelo y SD San Martín de la Arena</b><br />';

        break;

        case 2025:
        $txt = 'Campeón: <b>CD Laudio FSR</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Laudio FSR, Arenas Club, Club Portugalete y SD Leioa</b><br />';
        $txt .= 'Descenso: <b>CD Getxo, CD Aurrera de Vitoria y CD Anaitasuna</b><br />';

        break;

        case 2026:
        $txt = 'Campeón: <b>UE Olot</b><br />';
        $txt .= 'Promoción de Ascenso: <b>UE Olot, UD Cornellà, CE Europa y AEC Manlleu</b><br />';
        $txt .= 'Descenso: <b>CE Júpiter, UE Vic y CF Balaguer</b><br />';

        break;

        case 2027:
        $txt = 'Campeón: <b>Elche CF Ilicitano</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Elche CF Ilicitano, Novelda CF, UD Alzira y CD Castellón</b><br />';
        $txt .= 'Descenso: <b>CD Burriana, Crevillente Deportivo, CD Dénia y Catarroja CF</b><br />';

        break;

        case 2028:
        $txt = 'Campeón: <b>CD Puerta Bonita</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Puerta Bonita, CU Collado Villalba, CF Trival Valderas y AD Unión Adarve</b><br />';
        $txt .= 'Descenso: <b>AD Villaviciosa de Odón, CD Colonia Moscardó, CD Griñón y DAV Santa Ana</b><br />';

        break;

        case 2029:
        $txt = 'Campeón: <b>Burgos CF</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Burgos CF, CyD Leonesa, Arandina CF y Gimnástica Segoviana CF</b><br />';
        $txt .= 'Descenso: <b>GCE – Villaralbo CF, CD Cuéllar Balompié y CF Palencia</b><br />';

        break;

        case 2030:
        $txt = 'Campeón: <b>CD El Palo</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD El Palo, Atlético Mancha Real, Granada CF B y MCF Atlético Malagueño</b><br />';
        $txt .= 'Descenso: <b>Juventud de Torremolinos CF, Alhaurín de la Torre CF y CD Comarca de Níjar</b><br />';

        break;

        case 2031:
        $txt = 'Campeón: <b>Algeciras CF</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Algeciras CF, Córdoba CF B, Coria CF y CD Mairena</b><br />';
        $txt .= 'Descenso: <b>Club Atlético Antoniano, UD Los Barrios y Montilla CF</b><br />';

        break;

        case 2032:
        $txt = 'Campeón: <b>SCR Peña Deportiva</b><br />';
        $txt .= 'Promoción de Ascenso: SCR Peña Deportiva, UD Poblense, SD Formentera y UE Alcudia</b><br />';
        $txt .= 'Descenso: CD España, CF Sóller y CF Son Ferrer</b><br />';

        break;

        case 2033:
        $txt = 'Campeón: <b>UD Las Palmas Atlético</b><br />';
        $txt .= 'Promoción de Ascenso: <b>UD Las Palmas Atlético, Club Atlético Granadilla, Estrella CF y CF Unión Viera</b><br />';
        $txt .= 'Descenso: <b>UD Tijarafe, UD Gomera y CD San Pedro Mártir</b><br />';

        break;

        case 2034:
        $txt = 'Campeón: <b>La Hoya Lorca CF</b><br />';
        $txt .= 'Promoción de Ascenso: <b>La Hoya Lorca CF, CD Cieza, Mar Menor CF y FC Jumilla</b><br />';
        $txt .= 'Descenso: <b>CD Bala Azul, CD Beniel y Pinatar CF</b><br />';

        break;

        case 2035:
        $txt = 'Campeón: <b>Extremadura UD</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Extremadura UD, UD Badajoz, CD Don Benito y CD Díter Zafra</b><br />';
        $txt .= 'Descenso: <b>Moralo CP, EF Emérita Augusta y CD Valdelacalzada</b><br />';

        break;

        case 2036:
        $txt = 'Campeón: <b>AD San Juan</b><br />';
        $txt .= 'Promoción de Ascenso: <b>AD San Juan, UD Mutilvera, CD Iruña y CD Cortes</b><br />';
        $txt .= 'Descenso: <b>CD Subiza, CD Peña Azagresa y SD Lagunak</b><br />';

        break;

        case 2037:
        $txt = 'Campeón: <b>Haro Deportivo</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Haro Deportivo, CD Alfaro, CD Calahorra y CD Varea</b><br />';
        $txt .= 'Descenso: <b>Yagüe CF, CF Rapid y CD Aldeano</b><br />';

        break;

        case 2038:
        $txt = 'Campeón: <b>CD Sariñena</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Sariñena, Andorra CF, CD Ebro y Utebo FC</b><br />';
        $txt .= 'Descenso: <b>CD La Almunia, CD Valdefierro, CD Robres y CD Binéfar</b><br />';

        break;

        case 2039:
        $txt = 'Campeón: <b>CD Toledo</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Toledo, UB Conquense, CD Azuqueca y CF Talavera de la Reina</b><br />';
        $txt .= 'Descenso: <b>CD Marchamalo, CD Torrijos y UD Talavera</b><br />';

        break;

        case 2040:
        break;

        case 2041:
        break;

        case 2042:
        break;

        case 2043:
        break;

        case 2044:
        break;

        case 2045:
        break;

        case 2046:
        break;

        case 1654:
        $txt = 'Campeón: <b>Real Madrid CF</b><br />';
        $txt .= 'Liga de Campeones: <b>Real Madrid CF, FC Barcelona, Valencia CF y Málaga CF</b><br />';
        $txt .= 'Liga Europa: <b>Club Atlético de Madrid, Levante UD y Athletic Club</b><br />';
        $txt .= 'Descenso: <b>Villarreal CF, Real Sporting y Real Racing Club</b><br />';
        break;

        case 1655:
        $txt = 'Campeón: <b>RC Deportivo</b><br />';
        $txt .= 'Ascenso: <b>RC Deportivo y RC Delta</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Real Valladolid CF, AD ALcorcón, Hércules CF y Cordoba CF</b><br />';
        $txt .= 'Descenso: <b>Villarreal CF B, FC Cartagena, CD Alcoyano y Gimnàstic de Tarragona</b><br />';
        break;

        case 1904:
        $txt = 'Asciende a Primera: <b>Real Valladolid CF</b><br />';
        break;

        case 1656:
        $txt = 'Campeón: <b>Real Madrid CF Castilla</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Real Madrid CF Castilla, CD Tenerife, CD Lugo y Albacete Balompié</b><br />';
        $txt .= 'Promoción de Permanencia: <b>UB Conquense</b><br />';
        $txt .= 'Descenso: <b>CD Toledo, Montañeros CF, UD Vecindario y RC Celta B</b><br />';
        break;

        case 1657:
        $txt = 'Campeón: <b>CD Mirandés</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Mirandés, SD Ponferradina, SD Eibar y SD Amorebieta</b><br />';
        $txt .= 'Promoción de Permanencia: <b>CF Palencia</b><br />';
        $txt .= 'Descenso: <b>Arandina CF, Gimnástica Segoviana CF, SD Lemona y Burgos CF</b><br />';
        break;

        case 1658:
        $txt = 'Campeón: <b>CD Atlético Baleares</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Atlético Baleares, Orihuela CF, Huracán Valencia CF y CF Badalona</b><br />';
        $txt .= 'Promoción de Permanencia: <b>Real Zaragoza B</b><br />';
        $txt .= 'Descenso: <b>Andorra CF, CF Gandia, CE Manacor y CE Sporting Mahonés</b><br />';
        break;

        case 1659:
        $txt = 'Campeón: <b>Cádiz CF</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Cádiz CF, RB Linense, Lucena CF y Real Jaén CF</b><br />';
        $txt .= 'Promoción de Permanencia: <b>Lorca Atlético CF</b><br />';
        $txt .= 'Descenso: <b>CD Roquetas, Caravaca CF, Sporting Villanueva Promesas y CP Ejido</b><br />';
        break;

        case 1762:
        $txt .= 'Campeón Absoluto: <b>Real Madrid CF Castilla</b><br />';
        $txt .= 'Ascienden a Segunda A: <b>Real Madrid CF Castilla y CD Mirandés</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda A: <b>CD Atlético Baleares y Cádiz CF</b><br />';
        break;

        case 1763:
        $txt = 'Ascienden a Segunda A: <b>SD Ponferradina y CD Lugo</b><br />';
        break;

        case 1764:
        $txt = 'Descienden a Tercera: <b>Lorca Atlético CF y UB Conquense</b><br />';
        break;

        case 1660:
        $txt = 'Campeón: <b>CD Ourense</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Ourense, Alondras CF, CCD Cerceda y Pontevedra CF</b><br />';
        $txt .= 'Descenso: <b>CD Estradense, Cultural Areas, CD Lalín y Club Xuventú Sanxenxo</b><br />';
        break;

        case 1661:
        $txt = 'Campeón: <b>Caudal Deportivo</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Caudal Deportivo, Real Avilés Industrial, UP Langreo y CD Tuilla</b><br />';
        $txt .= 'Descenso: <b>Nalón CF, Pumarín CF y SD Colloto</b><br />';
        break;

        case 1662:
        $txt = 'Campeón: <b>SD Noja</b><br />';
        $txt .= 'Promoción de Ascenso: <b>SD Noja, CD Laredo, Real Racing Club B y CD Cayón</b><br />';
        $txt .= 'Descenso: <b>SD Buelna, CD Barquereño y CD Arenas de Frajanas</b><br />';
        break;

        case 1663:
        $txt = 'Campeón: <b>CD Laudio FSR</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Laudio FSR, Barakaldo CF, Club Portugalete y SD Beasain</b><br />';
        $txt .= 'Descenso: <b>CD Vitoria, CD Hernani y Zarauzko KE</b><br />';
        break;

        case 1664:
        $txt = 'Campeón: <b>AE Prat</b><br />';
        $txt .= 'Promoción de Ascenso: <b>AE Prat, RCD Espanyol B, AEC Manlleu y CF Pobla de Mafumet</b><br />';
        $txt .= 'Descenso: <b>CF Vilanova i la Geltrú, CF Amposta y CD Masnou</b><br />';
        break;

        case 1665:
        $txt = 'Campeón: <b>Catarroja CF</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Catarroja CF, Levante UD B, Muro CF y UD Alzira</b><br />';
        $txt .= 'Descenso: <b>SC Requena, Alicante CF, Mislata CF, UDJ Barrio del Cristo y UD Altea</b><br />';
        break;

        case 1666:
        $txt = 'Campeón: <b>CF Fuenlabrada</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CF Fuenlabrada, Real Madrid CF C, CD Puerta Bonita y AD Parla</b><br />';
        $txt .= 'Descenso: <b>CD Móstoles, CDA Navalcarnero, CD Vicálvaro y CD Fortuna</b><br />';
        break;

        case 1667:
        $txt = 'Campeón: <b>Real Valladolid CF B</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Real Valladolid CF B, Real Ávila CF, CyD Leonesa y GCE Villaralbo CF</b><br />';
        $txt .= 'Descenso: <b>CD Burgos, CD Huracán Z, CD Burgos Promesas 2000, CD Béjar Industrial y SD Ponferradina B</b><br />';
        break;

        case 1668:
        $txt = 'Campeón: <b>Loja CD</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Loja CD, Unión Estepona CF, UD Marbella y UD Maracena</b><br />';
        $txt .= 'Descenso: <b>Arenas de Armilla CD, Antequera CF, CD Ciudad de Vícar y UD Carboneras</b><br />';
        break;

        case 1669:
        $txt = 'Campeón: <b>Atlético Sanluqueño CF</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Atlético Sanluqueño CF, San Fernando CF, CD Mairena y Coria CF</b><br />';
        $txt .= 'Descenso: <b>Murallas de Ceuta FC, UD Marinaleda y PD Rociera</b><br />';
        break;

        case 1670:
        $txt = 'Campeón: <b>CE Constància</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CE Constància, CD Binissalem, CD Llosetense y CD Montuïri</b><br />';
        $txt .= 'Descenso: <b>CF Platges de Calvià, CE Ferreries y CE Alaior</b><br />';
        break;

        case 1671:
        $txt = 'Campeón: <b>CD Marino</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Marino, SD Tenisca, UD Las Palmas Atlético y CD Vera</b><br />';
        $txt .= 'Descenso: <b>CD laguna, Real Sporting San José y CD Charco del Pino</b><br />';
        break;

        case 1672:
        $txt = 'Campeón: <b>Yeclano Deportivo</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Yeclano Deportivo, CDA Águilas FC, Mar Menor CF y La Hoya Lorca CF</b><br />';
        $txt .= 'Descenso: <b>Cartagena FC, CF Santomera, Abarán CF y EF Esperanza</b><br />';
        break;

        case 1673:
        $txt = 'Campeón: <b>Arroyo CP</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Arroyo CP, CD Diter Zafra, Extremadura UD y CD Don Benito</b><br />';
        $txt .= 'Descenso: <b>CP Sanvicenteño, SP Villafranca y CP Chinato</b><br />';
        break;

        case 1674:
        $txt = 'Campeón: <b>Peña Sport FC</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Peña Sport FC, CD Izarra, CD Tudelano y UD Mutilvera</b><br />';
        $txt .= 'Descenso: <b>CD Lourdes, CD Azkoyen y CD Aluvión</b><br />';
        break;

        case 1675:
        $txt = 'Campeón: <b>SD Logroñés</b><br />';
        $txt .= 'Promoción de Ascenso: <b>SD Logroñés, CD Alfaro, Haro Deportivo y CD Varea</b><br />';
        $txt .= 'Descenso: <b>CD Tedeón, CF Ciudad de Alfaro y CD Bañuelos</b><br />';
        break;

        case 1676:
        $txt = 'Campeón: <b>SD Ejea</b><br />';
        $txt .= 'Promoción de Ascenso: <b>SD Ejea, CD Sariñena,CD Cuarte Industrial y Utebo FC</b><br />';
        $txt .= 'Descenso: <b>CD Tauste, CD Giner Torrero, CD Quinto y UD San José</b><br />';
        break;

        case 1677:
        $txt = 'Campeón: <b>CP Villarrobledo</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CP Villarrobledo, UD Almansa, CD Azuqueca y Albacete Balompié B</b><br />';
        $txt .= 'Descenso: <b>La Gineta CF, CD Carranque y CD Puertollano B</b><br />';
        break;

        case 1765:
        $txt = 'Ascienden a Segunda B: <b>SD Noja, AE Prat, CE Constància, CD Marino, CD Ourense, Arroyo CP, SD Logroñés, Caudal Deportivo y Loja CD</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda B: <b>Catarroja CF, Atlético Sanluqueño CF, CP Villarrobledo, CF Fuenlabrada, CD Laudio FSR, SD Ejea, Peña Sport FC, Yeclano Deportivo y Real Valladolid CF B</b><br />';
        break;

        case 1766:
        $txt = 'Ascienden a Segunda B: <b>San Fernando CD, CD Tudelano, CF Fuenlabrada, Barakaldo CF, CD Izarra, CD Binissalem, Peña Sport FC, Yeclano Deportivo y Atlético Sanluqueño CF</b><br />';

        break;

        case 1:
        $txt = 'Campeón: <b>FC Barcelona</b><br />';
        $txt .= 'Liga de Campeones: <b>FC Barcelona, Real Madrid CF, Valencia CF y Villarreal CF</b><br />';
        $txt .= 'Liga Europa: <b>Sevilla FC, Athletic Club y Club Atlético de Madrid</b><br />';
        $txt .= 'Descenso: <b>RC Deportivo, Hércules CF y UD Almería</b><br />';
        break;

        case 2:
        $txt = 'Campeón: <b>Real Betis Balompié</b><br />';
        $txt .= 'Ascenso: <b>Real Betis Balompié y Rayo Vallecano</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Elche CF, Granada CF, RC Celta y Real Valladolid CF</b><br />';
        $txt .= 'Descenso: <b>UD Salamanca, CD Tenerife, SD Ponferradina y Albacete Balompié</b><br />';
        break;

        case 1903:
        $txt = 'Asciende a Primera: <b>Granada CF</b><br />';

        break;

        case 3:
        $txt = 'Campeón: <b>CD Lugo</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Lugo, CD Guadalajara, Real Madrid CF Castilla y CD Leganés</b><br />';
        $txt .= 'Promoción de Permanencia: <b>UB Conquense</b><br />';
        $txt .= 'Descenso: <b>RC Deportivo B, Pontevedra CF, Extremadura UD y AD Cerro Reyes Atlético</b><br />';
        $txt .= '<hr />Por alineación indebida, el partido Cerro Reyes - Vecindario, inicialmente 0-0, se dio por perdido a los locales por 0-3, descontándoseles además tres puntos de la clasificación. <br />';
        break;

        case 4:
        $txt = 'Campeón: <b>SD Éibar</b><br />';
        $txt .= 'Promoción de Ascenso: <b>SD Éibar, CD Mirandés, Deportivo Alavés y Real Unión Club</b><br />';
        $txt .= 'Promoción de Permanencia: <b>Caudal Deportivo</b><br />';
        $txt .= 'Descenso: <b>CD La Muela, Peña Sport FC, Real Sporting B y Barakaldo CF</b><br />';
        break;

        case 5:
        $txt = 'Campeón: <b>CE Sabadell FC</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CE Sabadell FC, CF Badalona, CD Alcoyano y Orihuela CF</b><br />';
        $txt .= 'Promoción de Permanencia: <b>Benidorm CF</b><br />';
        $txt .= 'Descenso: <b>UD Alzira, UDA Gramanet-Milán, RCD Mallorca B y FC Santboià</b><br />';
        break;

        case 6:
        $txt = 'Campeón: <b>Real Murcia CF</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Real Murcia CF, Sevilla FC Atlético, UD Melilla y Cádiz CF</b><br />';
        $txt .= 'Promoción de Permanencia: <b>Real Betis Balompié B</b><br />';
        $txt .= 'Descenso: <b>CD Alcalá, Unión Estepona CF, Yeclano Deportivo y Jumilla CF</b><br />';
        break;

        case 1757:
        $txt = 'Campeón Absoluto: <b>Real Murcia CF</b><br />';
        $txt .= 'Ascienden a Segunda A: <b>Real Murcia CF y CE Sabadell FC</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda A: <b>SD Éibar y CD Lugo</b><br />';
        break;

        case 1758:
        $txt = 'Ascienden a Segunda A: <b>CD Alcoyano y CD Guadalajara</b><br />';
        break;

        case 1759:
        $txt = 'Descienden a Tercera: <b>Caudal Deportivo y Benidorm CF</b><br />';

        break;

        case 7:
        $txt = 'Campeón: <b>CCD Cerceda</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CCD Cerceda, Racing Club Ferrol, CD Ourense y Racing Club Villalbés</b><br />';
        $txt .= 'Descenso: <b>Cultural Areas, Pontevedra CF B, Santa Comba CF, Narón BP y Portonovo SD</b><br />';
        break;

        case 17:
        $txt = 'Campeón: <b>Club Marino</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Club Marino, AD Universidad Oviedo, UP Langreo y CD Tuilla</b><br />';
        $txt .= 'Descenso: <b>UD Gijón Industrial, Andés CF, Ribadesella CF y CD Praviano</b><br />';
        break;

        case 18:
        $txt = 'Campeón: <b>SD Noja</b><br />';
        $txt .= 'Promoción de Ascenso: <b>SD Noja, Deportivo Rayo Cantabria, Real Racing Club B y AD Siete Villas</b><br />';
        $txt .= 'Descenso: <b>SD Solares, Santoña CF y SD Reocín</b><br />';
        $txt .= '<hr />El Reocín se retiró de la competición antes de disputarse la jornada 13 y la Federación le dio por perdidos todos los partidos que le quedaban por disputar por el resultado de 2-0 y le sancionó además con la pérdida de los puntos que había conquistado hasta el momento. <br />';
        break;

        case 19:
        $txt = 'Campeón: <b>SD Amorebieta</b><br />';
        $txt .= 'Promoción de Ascenso: <b>SD Amorebieta, CD Laudio FSR, Sestao River Club y SCD Durango</b><br />';
        $txt .= 'Descenso: <b>CD Santurtzi, Amurrio Club y CD Aurrera Vitoria</b><br />';
        break;

        case 20:
        $txt = 'Campeón: <b>UE Llagostera</b><br />';
        $txt .= 'Promoción de Ascenso: <b>UE Llagostera, CF Montañesa, CF Pobla Mafumet y CF Reus Deportiu</b><br />';
        $txt .= 'Descenso: <b>Palamós CF, FC Ascó y CE Premià</b><br />';
        break;

        case 21:
        $txt = 'Campeón: <b>Valencia CF Mestalla</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Valencia CF Mestalla, CD Olímpic, Novelda CF y CF La Nucía</b><br />';
        $txt .= 'Descenso: <b>Burjassot CF, Villajoyosa CF y UD Puzol</b><br />';
        break;

        case 22:
        $txt = 'Campeón: <b>Fútbol Alcobendas Sport</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Fútbol Alcobendas Sport, CF Pozuelo, AD Villaviciosa de Odón y UD San Sebastián Reyes</b><br />';
        $txt .= 'Descenso: <b>CD San Fernando, Vallecas CF, Las Rozas CF y CD Coslada</b><br />';
        $txt .= '<hr />Por alineación indebida, el partido Móstoles - Rayo Majadahonda, inicialmente 1-1, se dio por perdido a los visitantes por 3-0. <br />';
        break;

        case 23:
        $txt = 'Campeón: <b>Burgos CF</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Burgos CF, Villaralbo CF, Gimnástica Segoviana CF y Arandina CF</b><br />';
        $txt .= 'Descenso: <b>CD Cebrereña, UD Santa Marta y CF Venta Baños</b><br />';
        break;

        case 24:
        $txt = 'Campeón: <b>CD Comarca de Níjar</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Comarca de Níjar, Alhaurín de la Torre CF, Loja CD y MCF Atlético Malagueño</b><br />';
        $txt .= 'Descenso: <b>CD Baza, CD Alhaurino y AD Adra</b><br />';
        $txt .= '<hr />Por incomparecencia a los partidos Ronda - Adra y Adra - Marbella, el Adra fue expulsado de la competición, quitándosele todos sus puntos y dándosele por perdidos los partidos que quedaban por disputar por el resultado de 3-0. <br />';
        $txt .= 'Por alineación indebida, el partido Ciudad de Vícar - Ronda, inicialmente 1-1, se dio por perdidos a los locales por el resultado de 0-3.<br />';
        $txt .= 'El Casino del Real figura con un punto menos por sanción federativa, por alineación indebida en el partido Casino del Real - Marbella. <br />';
        break;

        case 8:
        $txt = 'Campeón: <b>RB Linense</b><br />';
        $txt .= 'Promoción de Ascenso: <b>RB Linense, San Fernando CD, CD Pozoblanco y CD Mairena</b><br />';
        $txt .= 'Descenso: <b>Jerez Industrial, Peñarroya Pueblonuevo y UD Los Barrios</b><br />';
        break;

        case 9:
        $txt = 'Campeón: <b>CD Manacor</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Manacor, UD Poblense, CD Constancia y CD Binissalem</b><br />';
        $txt .= 'Descenso: <b>AD Penya Arrabal, CF Norteño y UD Arenal</b><br />';
        break;

        case 10:
        $txt = 'Campeón: <b>UD Lanzarote</b><br />';
        $txt .= 'Promoción de Ascenso: <b>UD Lanzarote, UD Las Palmas Atlético, CD Tenerife B y Atlético Granadilla</b><br />';
        $txt .= 'Descenso: <b>CD Orientación Marítima, CD San Isidro, UD Guía y UD Realejos</b><br />';
        break;

        case 11:
        $txt = 'Campeón: <b>Costa Cálida CF</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Costa Cálida CF, Real Murcia B, Mar Menor CF y FC Cartagena La Unión</b><br />';
        $txt .= 'Descenso: <b>FC Puente Tocinos, CD Beniel y Lorca Deportivo Olímpico</b><br />';
        break;

        case 12:
        $txt = 'Campeón: <b>CF Villanovense</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CF Villanovense, Sporting Villanueva Promesas, Arroyo CP y Jerez CF</b><br />';
        $txt .= 'Descenso: <b>CD Santa Marta, Olivenza CP y Imperio de Mérida</b><br />';
        break;

        case 13:
        $txt = 'Campeón: <b>CD Tudelano</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Tudelano, CD Izarra, CD Valle de Egüés y UD Mutilvera</b><br />';
        $txt .= 'Descenso: <b>CD Ardoi, Lagun Artea KE, CD River Ega y CD Peña Azagresa</b><br />';
        break;

        case 14:
        $txt = 'Campeón: <b>Náxara CD</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Náxara CD, SD Logroñés, CD Anguiano y Haro Deportivo</b><br />';
        $txt .= 'Descenso: <b>CD Aldeano, CD Cenicero y AF Calahorra</b><br />';
        $txt .= '<hr />Por alineación indebida, el partido Náxara - Calahorra, inicialmente 2-2, se dio por perdido a los visitantes por 3-0. <br />';
        $txt .= 'El partido Náxara - Aldeano se suspendió con el resultado de 2-0 por quedarse los visitantes con seis jugadores, por lo que el resultado definitivo se transformó a 3-0. <br />';
        break;

        case 15:
        $txt = 'Campeón: <b>Andorra CF</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Andorra CF, Real Zaragoza B, Utebo FC y CD Binéfar</b><br />';
        $txt .= 'Descenso: <b>CD Altorricón, CF Pomar, RSD Santa Isabel y CD Mallén</b><br />';
        break;

        case 16:
        $txt = 'Campeón: <b>CD Toledo</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Toledo, Albacete Balompié B, La Roda CF y UD Almansa</b><br />';
        $txt .= 'Descenso: <b>CD Chozas de Canales, CD Piedrabuena y CD Unión Criptanense</b><br />';
        $txt .= '<hr />Por alineación indebida, los partidos Tomelloso - Criptanense, inicialmente 0-0, y Criptanense - Villarrubia, inicialmente 1-1, se dieron por perdidos al Criptanense por 3-0. <br />';
        break;

        case 1760:
        $txt = 'Ascienden a Segunda B: <b>Club Marino, CD Toledo, RB Linense, CF Villanovense, UE Llagostera, Andorra CF, Valencia CF Mestalla, Burgos CF y SD Amorebieta</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda B: <b>Costa Cálida CF, Náxara CD, CD Tudelano, CD Comarca de Níjar, CCD Cerceda, SD Noja, Fútbol Alcobendas Sport, UD Lanzarote y CD Manacor</b><br />';
        break;

        case 1761:
        $txt = 'Ascienden a Segunda B: <b>CF Reus Deportiu, Arandina CF, UD San Sebastián de los Reyes, CD Manacor, Gimnástica Segoviana CF, La Roda CF, Sestao River Club, Sporting Villanueva Promesas y CD Olímpic</b><br />';
        break;

        case 25:
        $txt = 'Campeón: <b>FC Barcelona</b><br />';
        $txt .= 'Liga de Campeones: <b>FC Barcelona, Real Madrid CF, Valencia CF y Sevilla FC</b><br />';
        $txt .= 'Copa de la UEFA: <b>RCD Mallorca y Getafe CF</b><br />';
        $txt .= 'Descenso: <b>Real Valladolid CF, CD Tenerife y Xerez CD</b><br />';
        break;

        case 26:
        $txt = 'Campeón: <b>Real Sociedad de Fútbol</b><br />';
        $txt .= 'Ascenso: <b>Real Sociedad de Fútbol, Hércules CF y Levante UD</b><br />';
        $txt .= 'Descenso: <b>Cádiz CF, Real Murcia CF, Real Unión Club y CD Castellón</b><br />';
        break;

        case 27:
        $txt = 'Campeón: <b>SD Ponferradina</b><br />';
        $txt .= 'Promoción de Ascenso: <b>SD Ponferradina, SD Éibar, CF Palencia y Pontevedra CF</b><br />';
        $txt .= 'Promoción de Permanencia: <b>CD Guijuelo</b><br />';
        $txt .= 'Descenso: <b>Sestao River Club, CD Izarra, Racing Club Ferrol y SD Compostela</b><br />';
        break;

        case 28:
        $txt = 'Campeón: <b>AD Alcorcón</b><br />';
        $txt .= 'Promoción de Ascenso: <b>AD Alcorcón, Real Oviedo, CD Guadalajara y Universidad LPGC</b><br />';
        $txt .= 'Promoción de Permanencia: <b>CD Toledo</b><br />';
        $txt .= 'Descenso: <b>Real Racing Club B, CF Villanovense, CD Tenerife B y UD Lanzarote</b><br />';
        break;

        case 29:
        $txt = 'Campeón: <b>UE Sant Andreu</b><br />';
        $txt .= 'Promoción de Ascenso: <b>UE Sant Andreu, FC Barcelona B, Ontinyent CF y CD Alcoyano</b><br />';
        $txt .= 'Promoción de Permanencia: <b>RCD Espanyol B</b><br />';
        $txt .= 'Descenso: <b>Villajoyosa CF, Valencia CF Mestalla, CF Gavà y Terrassa FC</b><br />';
        break;

        case 30:
        $txt = 'Campeón: <b>Granada CF</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Granada CF, UD Melilla, Real Jaén CF y CP Ejido</b><br />';
        $txt .= 'Promoción de Permanencia: <b>CD Roquetas</b><br />';
        $txt .= 'Descenso: <b>Moratalla CF, Jerez Industrial, UD Marbella y Águilas CF</b><br />';
        break;

        case 1752:
        $txt .= 'Campeón Absoluto: <b>Granada CF</b><br />';
        $txt .= 'Ascienden a Segunda A: <b>Granada CF y SD Ponferradina</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda A: <b>AD Alcorcón y UE Sant Andreu</b><br />';
        break;

        case 1753:
        $txt .= 'Ascienden a Segunda A: <b>AD Alcorcón y FC Barcelona B</b><br />';
        break;

        case 1754:
        $txt .= 'Descienden a Tercera: <b>RCD Espayol B y CD Toledo</b><br />';

        break;

        case 31:
        $txt = 'Campeón: <b>RC Deportivo B</b><br />';
        $txt .= 'Promoción de Ascenso: <b>RC Deportivo B,  Cerceda, CD Ourense y Coruxo CF</b><br />';
        $txt .= 'Descenso: <b>CD Lalín, Céltiga FC y Verín CF</b><br />';
        break;

        case 41:
        $txt = 'Campeón: <b>Caudal Deportivo</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Caudal Deportivo, Club Marino, AD Universidad Oviedo y CD Llanes</b><br />';
        $txt .= 'Descenso: <b>SD Colloto, CD Covadonga y Astur CF</b><br />';
        break;

        case 42:
        $txt = 'Campeón: <b>SD Noja</b><br />';
        $txt .= 'Promoción de Ascenso: <b>SD Noja, UM Escobedo, CD Tropezón y CD Bezana</b><br />';
        $txt .= 'Descenso: <b>Selaya FC, SD Barreda Balompié, SD Textil Escudo y Atlético Deva</b><br />';
        break;

        case 43:
        $txt = 'Campeón: <b>Real Sociedad de Fútbol B</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Real Sociedad de Fútbol B, Club Portugalete, SD Amorebieta y CD Elgóibar</b><br />';
        $txt .= 'Descenso: <b>Aretxabaleta KE, SD Retuerto Sport y SD Salvatierra</b><br />';
        break;

        case 44:
        $txt = 'Campeón: <b>CD L´Hospitalet</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD L´Hospitalet, CF Reus Deportiu, FC Santboià y AE Prat</b><br />';
        $txt .= 'Descenso: <b>CE Premià, UE Rapitenca, CD Blanes y CF Olesa de Montserrat</b><br />';
        break;

        case 45:
        $txt = 'Campeón: <b>CF Gandía</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CF Gandía, UD Alzira, Novelda CF y Villarreal CF C</b><br />';
        $txt .= 'Descenso: <b>Elche CF Ilicitano, CD Onda y Alicante CF B</b><br />';
        break;

        case 46:
        $txt = 'Campeón: <b>Rayo Vallecano B</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Rayo Vallecano B, AD Parla, Getafe CF B y CF Trival Valderas</b><br />';
        $txt .= 'Descenso: <b>AD Arganda, DAV Santa Ana, CD Ciempozuelos y Galáctico Pegaso</b><br />';
        $txt .= '<hr />Por alineación indebida, el partido Alcobendas Sport - Arganda, inicialmente 3-1, se dio por perdido a los locales por 0-3. <br />';
        $txt .= 'Por incomparecencia, el partido Pegaso - San Sebastián de los Reyes, se dio por perdido a los locales por 0-3, descontándoseles además tres puntos de la clasificación. <br />';
        break;

        case 47:
        $txt = 'Campeón: <b>Burgos CF</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Burgos CF, Real Valladolid CF B, Arandina CF y Real Ávila CF</b><br />';
        $txt .= 'Descenso: <b>CD Salmantino, CD La Granja y CyD Leonesa B</b><br />';
        $txt .= '<hr />Por alineación indebida, el partido Venta de Baños - Íscar, inicialmente 2-0, se dio por perdido a los locales por 0-3. <br />';
        break;

        case 48:
        $txt = 'Campeón: <b>Atlético Mancha Real</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Atlético Mancha Real, Motril CF, Centro Deportes El Palo y UD Almería B</b><br />';
        $txt .= 'Descenso: <b>Arenas de Armilla CyD, CP Ejido B y CD Vera</b><br />';
        $txt .= '<hr />El CP Ejido B fue excluido de la competición por dos incomparecencias, anulándose sus resultados de la segunda vuelta.<br />';
        $txt .= 'El Vera se retiró de la competición, anulándose sus resultados de la segunda vuelta.<br />';
        break;

        case 32:
        $txt = 'Campeón: <b>CD Alcalá</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Alcalá, CD Mairena, Ayamonte CF y UD Marinaleda</b><br />';
        $txt .= 'Descenso: <b>Murallas Ceuta FC, Dos Hermanas CF y AD Cartaya</b><br />';
        break;

        case 33:
        $txt = 'Campeón: <b>CD Atlético Baleares</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Atlético Baleares, SCR PD Santa Eulalia, CD Constancia y CD Ferriolense</b><br />';
        $txt .= 'Descenso: <b>SCD Independiente, CE Esporles y Atlètic Ciutadella</b><br />';
        break;

        case 34:
        $txt = 'Campeón: <b>Corralejo</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Corralejo, UD Las Palmas Atlético, UD Pájara-Playas de Jandía y CD Marino</b><br />';
        $txt .= 'Descenso: <b>CD Charco del Pino, UD Gáldar, UD Llanos de Aridane, Universidad LPGC B y UD Fuerteventura</b><br />';
        $txt .= '<hr />El partido Playas de Jandía - Fuerteventura se dio por perdido a los visitantes por 3-0, por incomparecencia. Una segunda incomparecencia determinó su expulsión de la competición, dándose por válidos sus resultados de la primera vuelta, incluyendo el anteriormente citado. <br />';
        $txt .= 'Por alineación indebida, el partido Las Zocas - Tenisca, inicialmente 1-0, se dio por perdido a los locales por el resultado de 0-3. <br />';
        break;

        case 35:
        $txt = 'Campeón: <b>Jumilla CF</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Jumilla CF, Yeclano Deportivo, Lorca Deportiva y Costa Cálida CF</b><br />';
        $txt .= 'Descenso: <b>CD Bala Azul, Mazarrón CF, CD Lumbreras y Cuarto Distrito JCF</b><br />';
        break;

        case 36:
        $txt = 'Campeón: <b>CD Badajoz</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Badajoz, Jerez CF, Extremadura UD y Arroyo CP</b><br />';
        $txt .= 'Descenso: <b>CP Montehermoso, UC La Estrella y SP Villafranca</b><br />';
        break;

        case 37:
        $txt = 'Campeón: <b>CD Tudelano</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Tudelano, Peña Sport FC, Atlético Cirbonero y CD Iruña</b><br />';
        $txt .= 'Descenso: <b>Atlético Valtierrano, CD Zarramonza y CD Cortes</b><br />';
        break;

        case 38:
        $txt = 'Campeón: <b>SD Oyonesa</b><br />';
        $txt .= 'Promoción de Ascenso: <b>SD Oyonesa, CD Alfaro, Haro Deportivo y CD Anguiano</b><br />';
        $txt .= 'Descenso: <b>CD Villegas, Yagüe CF y CCyD Alberite</b><br />';
        break;

        case 39:
        $txt = 'Campeón: <b>CD Teruel</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Teruel, CD La Muela, Real Zaragoza B y SD Ejea</b><br />';
        $txt .= 'Descenso: <b>CD Cuarte Industrial, Alcañiz CF, UD Fraga y CF Jacetano</b><br />';
        $txt .= '<hr />Por alineación indebida, el partido Zaragoza B - Mallén, inicialmente 0-2, se dio por perdido a los locales por el resultado de 0-3. <br />';

        break;

        case 40:
        $txt = 'Campeón: <b>La Roda CF</b><br />';
        $txt .= 'Promoción de Ascenso: <b>La Roda CF, CD Illescas, CD Azuqueca y Talavera CF</b><br />';
        $txt .= 'Descenso: <b>Tomelloso CF, Gimnástico Alcázar, Mora CF y Daimiel CF</b><br />';
        $txt .= '<hr />Por alineación indebida, los partidos Hellín - Piedrabuena, inicialmente 0-0, y Tomelloso - Azuqueca, inicialmente 2-3, se dieron por perdidos a los visitantes por 3-0. <br />';
        break;

        case 1755:
        $txt .= 'Ascienden a Segunda B: <b>CF Gandía, Real Sociedad B, Rayo Vallecano B, CD Atletico Baleares, CD Teruel, CD Badajoz, RC Deportivo B, CD Alcalá y Caudal Deportivo</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda B: <b>La Roda CF, SD Oyonesa, CD L´Hospitalet, CD Tudelano, SD Noja, Atlético Mancha Real, Burgos CF, CD Corralejo y Jumilla CF</b><br />';
        break;

        case 1756:
        $txt .= 'Ascienden a Segunda B: <b>CD L´Hospitalet, Coruxo CF, Extremadura UD, FC Santboià, Yeclano Deportivo, Getafe CF B, UD Alzira, Peña Sport FC y CD La Muela</b><br />';

        break;

        case 49:
        $txt = 'Campeón: <b>FC Barcelona</b><br />';
        $txt .= 'Liga de Campeones: <b>FC Barcelona, Real Madrid CF, Sevilla FC y Club Atlético de Madrid</b><br />';
        $txt .= 'Copa de la UEFA: <b>Villarreal CF y Valencia CF</b><br />';
        $txt .= 'Descenso: <b>Real Betis Balompié, CD Numancia y RC Recreativo</b><br />';
        break;

        case 50:
        $txt = 'Campeón: <b>Xerez CD</b><br />';
        $txt .= 'Ascenso: <b>Xerez CD, Real Zaragoza y CD Tenerife</b><br />';
        $txt .= 'Descenso: <b>Deportivo Alavés, Alicante CF, SD Éibar y Sevilla FC Atlético</b><br />';
        break;

        case 51:
        $txt = 'Campeón: <b>Real Unión Club</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Real Unión Club, CyD Leonesa, SD Ponferradina y Zamora CF</b><br />';
        $txt .= 'Promoción de Permanencia: <b>Real Sporting B</b><br />';
        $txt .= 'Descenso: <b>RC Deportivo B, Real Sociedad de Fútbol B, Real Valladolid CF B y Club Marino</b><br />';
        break;

        case 52:
        $txt = 'Campeón: <b>FC Cartagena</b><br />';
        $txt .= 'Promoción de Ascenso: <b>FC Cartagena, Lorca Deportiva, AD Alcorcón y CD Leganés</b><br />';
        $txt .= 'Promoción de Permanencia: <b>UD Las Palmas Atlético</b><br />';
        $txt .= 'Descenso: <b>CDA Navalcarnero, UD Pájara-Playas de Jandía, CD Alfaro y UD Villa Santa Brígida</b><br />';
        break;

        case 53:
        $txt = 'Campeón: <b>CD Alcoyano</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Alcoyano, Villarreal CF B, UE Sant Andreu y CE Sabadell FC</b><br />';
        $txt .= 'Promoción de Permanencia: <b>Terrassa FC</b><br />';
        $txt .= 'Descenso: <b>UD Alzira, UD Ibiza-Eivissa, SCR PD Santa Eulalia y CD Atlético Baleares</b><br />';
        break;

        case 54:
        $txt = 'Campeón: <b>Cádiz CF</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Cádiz CF, Real Jaén CF, CP Ejido y UD Marbella</b><br />';
        $txt .= 'Promoción de Permanencia: <b>Antequera CF</b><br />';
        $txt .= 'Descenso: <b>CD San Fernando, Granada 74 CF, RB Linense y Racing Club Portuense</b><br />';
        break;

        case 1747:
        $txt .= 'Campeón Absoluto: <b>Cádiz CF</b><br />';
        $txt .= 'Ascienden a Segunda A: <b>Cádiz CF y FC Cartagena</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda A: <b>Real Unión Club y CD Alcoyano</b><br />';
        break;

        case 1750:
        $txt .= 'Ascienden a Segunda A: <b>Real Unión Club y Villarreal CF B</b><br />';
        break;

        case 1748:
        $txt .= 'Descienden a Tercera: <b>Antequera CF y UD Las Palmas Atlético</b><br />';

        break;

        case 55:
        $txt = 'Campeón: <b>SD Compostela</b><br />';
        $txt .= 'Promoción de Ascenso: <b>SD Compostela, Montañeros CF, CD Ourense y CCD Cerceda</b><br />';
        $txt .= 'Descenso: <b>Portonovo SD, Arosa SC y Gran Peña FC</b><br />';
        break;

        case 65:
        $txt = 'Campeón: <b>Real Oviedo</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Real Oviedo, AD Universidad Oviedo, Candás CF y CD Llanes</b><br />';
        $txt .= 'Descenso: <b>Nalón CF, Club Siero y CD Mosconia</b><br />';
        break;

        case 66:
        $txt = 'Campeón: <b>RS Gimnástica</b><br />';
        $txt .= 'Promoción de Ascenso: <b>RS Gimnástica, SD Noja, CD Tropezón y UM Escobedo</b><br />';
        $txt .= 'Descenso: <b>Santoña CF, CyD Guarnizo y Velarde Camargo CF</b><br />';
        break;

        case 67:
        $txt = 'Campeón: <b>CD Lagún Onak</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Lagún Onak, Amurrio Club, CD Elgóibar y Club Portugalete</b><br />';
        $txt .= 'Descenso: <b>Zarautz KE, Ordizia KE, Deportivo Alavés B y Club San Ignacio</b><br />';
        break;

        case 68:
        $txt = 'Campeón: <b>RCD Espanyol B</b><br />';
        $txt .= 'Promoción de Ascenso: <b>RCD Espanyol B, CF Reus Deportiu, CD L´Hospitalet y FC Santboià</b><br />';
        $txt .= 'Descenso: <b>CE Mataró, UE Miapuesta Vilajuïa y CD Banyoles</b><br />';
        $txt .= '<hr />Por alineaciones indebidas, los partidos Banyoles - Balaguer, inicialmente 1-1, y Palamós - Banyoles, inicialmente 2-2, se dieron por perdidos al Banyoles por 3-0. <br />';
        break;

        case 69:
        $txt = 'Campeón: <b>Villajoyosa CF</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Villajoyosa CF, Alicante CF B, CF La Nucía y FC Torrevieja</b><br />';
        $txt .= 'Descenso: <b>CD Castellón B, Pego CF y CD Utiel</b><br />';
        break;

        case 70:
        $txt = 'Campeón: <b>RSD Alcalá</b><br />';
        $txt .= 'Promoción de Ascenso: <b>RSD Alcalá, AD Parla, CF Rayo Majadahonda y Fútbol Alcobendas Sport</b><br />';
        $txt .= 'Descenso: <b>CD Puerta Bonita, Las Rozas CF, CD Colonia Ofigevi, CF Pozuelo y CU Collado Villalba</b><br />';
        break;

        case 71:
        $txt = 'Campeón: <b>CF Palencia</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CF Palencia, CD Mirandés, Burgos CF y Real Ávila CF</b><br />';
        $txt .= 'Descenso: <b>CD Becerril, Norma San Leonardo CF y CyD Cebrereña</b><br />';
        $txt .= '<hr />Por incomparecencia, el partido Gim. Segoviana - Aguilar se dio por perdido a los locales por 0-3, descontándoseles además tres puntos de su clasificación. <br />';
        break;

        case 72:
        $txt = 'Campeón: <b>Unión Estepona CF</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Unión Estepona CF, UD Almería B, Motril CF y Málaga CF B</b><br />';
        $txt .= 'Descenso: <b>CP Granada 74, CD Imperio Albolote y Casino del Real CF</b><br />';
        break;

        case 56:
        $txt = 'Campeón: <b>CD San Roque</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD San Roque, Jerez Industrial, UD Los Barrios y CD Alcalá</b><br />';
        $txt .= 'Descenso: <b>Chiclana CF, Atlético Antoniano y CD Villanueva</b><br />';
        break;

        case 57:
        $txt = 'Campeón: <b>RCD Mallorca B</b><br />';
        $txt .= 'Promoción de Ascenso: <b>RCD Mallorca B, CF Sporting Mahonés, CD Santanyí y CD Binisalem</b><br />';
        $txt .= 'Descenso: <b>CE Mercadal, UD Arenal, CD Manacor, CE Artà y CD Andratx</b><br />';
        break;

        case 58:
        $txt = 'Campeón: <b>CD Tenerife B</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Tenerife B, SD Tenisca, Castillo CF y CD Mensajero</b><br />';
        $txt .= 'Descenso: <b>UD Tegueste, CD Arguineguín y CD Teguise</b><br />';
        break;

        case 59:
        $txt = 'Campeón: <b>Caravaca CF</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Caravaca CF, Moratalla CF, CD La Unión Athlétic y Yeclano Deportivo</b><br />';
        $txt .= 'Descenso: <b>CD Pozo Estrecho, Muleño CF y Ciudad de Lorca CF</b><br />';
        $txt .= '<hr />La Federación sancionó al Ciudad de Lorca con la pérdida de dos puntos, por no abonar en tres ocasiones los derechos de arbitraje. <br />';
        $txt .= 'El partido Santomera - La Unión se dio por perdido a los locales por 0-3 por quedarse con seis jugadores en el minuto 7, cuando el resultado era 0-0. <br />';
        $txt .= 'Por incomparecencia, el partido At. Pulpileño - Ciudad de Lorca se dio por perdido a los visitantes por 3-0, descontádoseles además tres puntos por sanción. <br />';
        break;

        case 60:
        $txt = 'Campeón: <b>AD Cerro Reyes Atlético</b><br />';
        $txt .= 'Promoción de Ascenso: <b>AD Cerro Reyes Atlético, CP Cacereño, CF Villanovense y CD Don Benito</b><br />';
        $txt .= 'Descenso: <b>CD Díter Zafra, UP Plasencia y CP Valdivia</b><br />';
        break;

        case 61:
        $txt = 'Campeón: <b>CD Izarra</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Izarra, Peña Sport FC, CD Tudelano y UD Mutilvera</b><br />';
        $txt .= 'Descenso: <b>CD Idoya, CD Ardoi, SD Lagunak y CD Mendi</b><br />';
        break;

        case 62:
        $txt = 'Campeón: <b>CD Varea</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Varea, Haro Deportivo, CD Anguiano y CD Calahorra</b><br />';
        $txt .= 'Descenso: <b>CD Tedeón, AD Fundación Logroñés y CD Logroñés</b><br />';
        break;

        case 63:
        $txt = 'Campeón: <b>Atlético de Monzón</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Atlético de Monzón, Real Zaragoza B, CD Teruel y CD La Muela</b><br />';
        $txt .= 'Descenso: <b>UD San Lorenzo Flumen, CD Binéfar, CD Zuera y CD Brea</b><br />';
        break;

        case 64:
        $txt = 'Campeón: <b>CD Toledo</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Toledo, UD Almansa, Manchego Ciudad Real CF y Hellín Deportivo</b><br />';
        $txt .= 'Descenso: <b>AD Torpedo 66 y CA Tarazona</b><br />';
        break;

        case 1749:
        $txt .= 'Ascienden a Segunda B: <b>Unión Estepona CF, CF Palencia, CD Varea, Real Oviedo, Villajoyosa CF, SD Compostela, RCD Espanyol B, RS Gimnástica y CD Toledo</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda B: <b>Caravaca CF, CD Izarra, AD Cerro Reyes Atlético, RCD Mallorca B, CD Alcalá, Atlético de Monzón, CD Tenerife B, CD Lagún Onak y CD San Roque</b><br />';
        break;

        case 1751:
        $txt .= 'Ascienden a Segunda B: <b>CD San Roque, AD Cerro Reyes Atlético, Caravaca CF, RCD Mallorca B, RSD Alcalá, CD Izarra, CF Sporting Mahonés, CP Cacereño y CD Mirandés</b><br />';

        break;

        case 73:
        $txt = 'Campeón: <b>Real MadridCF </b><br />';
        $txt .= 'Liga de Campeones: <b>Real Madrid CF, Villarreal CF, FC Barcelona y Club Atlético de Madrid</b><br />';
        $txt .= 'Copa de la UEFA: <b>Sevilla FC y Real Racing Club</b><br />';
        $txt .= 'Intertoto: <b>RC Deportivo</b><br />';
        $txt .= 'Descenso: <b>Real Zaragoza, Real Murcia CF y Levante UD</b><br />';
        $txt .= '<hr />El partido Betis - Ath. Bilbao se suspendió en el minuto 70 con el resultado de 1-2, por agresión al portero visitante. La Federación decidió dar por terminado el partido con el resultado que se registraba en ese momento. <br />';
        break;

        case 74:
        $txt = 'Campeón: <b>CD Numancia</b><br />';
        $txt .= 'Ascenso: <b>CD Numancia, Málaga CF y Real Sporting de Gijón</b><br />';
        $txt .= 'Descenso: <b>Racing Club Ferrol, Cádiz CF, Granada 74 CF y CP Ejido</b><br />';
        break;

        case 75:
        $txt = 'Campeón: <b>Rayo Vallecano</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Rayo Vallecano, Pontevedra CF, UD Fuerteventura y RC Deportivo B</b><br />';
        $txt .= 'Promoción de Permanencia: <b>UD Villa Santa Brígida</b><br />';
        $txt .= 'Descenso: <b>CD Ourense, CF Fuenlabrada, UD San Sebastián Reyes y CD San Isidro</b><br />';
        break;

        case 76:
        $txt = 'Campeón: <b>SD Ponferradina</b><br />';
        $txt .= 'Promoción de Ascenso: <b>SD Ponferradina, SD Huesca, Zamora CF y Barakaldo CF</b><br />';
        $txt .= 'Promoción de Permanencia: <b>Club Atlético Osasuna B</b><br />';
        $txt .= 'Descenso: <b>Logroñés CF, Burgos CF, CF Palencia y Peña Sport FC</b><br />';
        break;

        case 77:
        $txt = 'Campeón: <b>Girona FC</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Girona FC, Alicante CF, CF Gavà y Benidorm CD</b><br />';
        $txt .= 'Promoción de Permanencia: <b>Villajoyosa CF</b><br />';
        $txt .= 'Descenso: <b>Miapuesta Castelldefels, RCD Espanyol B, CD L´Hospitalet y Levante UD B</b><br />';
        break;

        case 78:
        $txt = 'Campeón: <b>Écija Balompié</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Écija Balompié, CD Linares, AD Ceuta y Mérida UD</b><br />';
        $txt .= 'Promoción de Permanencia: <b>CD Baza</b><br />';
        $txt .= 'Descenso: <b>Mazarrón CF, CD Alcalá, Talavera CF y Algeciras CF</b><br />';
        break;

        case 1879:
        $txt .= 'Asciende a Segunda A: <b>Rayo Vallecano</b><br />';
        break;

        case 1880:
        $txt .= 'Asciende a Segunda A: <b>Alicante CF</b><br />';
        break;

        case 1881:
        $txt .= 'Asciende a Segunda A: <b>SD Huesca</b><br />';
        break;

        case 1882:
        $txt .= 'Asciende a Segunda A: <b>Girona FC</b><br />';
        break;

        case 1883:
        $txt .= 'Descienden a Tercera: <b>Villajoyosa CF y CD Baza</b><br />';
        break;

        case 79:
        $txt = 'Campeón: <b>SD Ciudad de Santiago</b><br />';
        $txt .= 'Promoción de Ascenso: <b>SD Ciudad de Santiago, CD Lalín, Narón BP y Coruxo FC</b><br />';
        $txt .= 'Descenso: <b>Betanzos CF, CD Ourense B y Club Lemos</b><br />';
        $txt .= '<hr />El partido Arosa - Alondras, inicialmente 3-1, se dio por perdido al Arosa por 0-3 por alineación indebida.<br />';
        $txt .= 'El partido Órdenes - Montañeros, inicialmente 0-1, se dio por perdido al Montañeros por 3-0 por alineación indebida.<br />';
        break;

        case 89:
        $txt = 'Campeón: <b>Real Oviedo</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Real Oviedo, Real Sporting B, UP Langreo y AD Universidad Oviedo</b><br />';
        $txt .= 'Descenso: <b>Real Tapia CF, Club Hispano y SD Colloto</b><br />';
        $txt .= '<hr />El partido Astur - Tuilla, inicialmente 0-0, se dio por perdido al Astur por 0-3, por alineación indebida. <br />';
        break;

        case 90:
        $txt = 'Campeón: <b>RS Gimnástica</b><br />';
        $txt .= 'Promoción de Ascenso: <b>RS Gimnástica, Real Racing Club B, SD Noja y UM Escobedo</b><br />';
        $txt .= 'Descenso: <b>AD Trasmiera, SD Gama y SD Buelna</b><br />';
        break;

        case 91:
        $txt = 'Campeón: <b>Club Portugalete</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Club Portugalete, SD Gernika, Amurrio Club y SD Zamudio</b><br />';
        $txt .= 'Descenso: <b>SD San Pedro, Tolosa CF y CD Vitoria</b><br />';
        break;

        case 92:
        $txt = 'Campeón: <b>FC Barcelona B</b><br />';
        $txt .= 'Promoción de Ascenso: <b>FC Barcelona B, UE Sant Andreu, CF Reus Deportiu y FC Santboià</b><br />';
        $txt .= 'Descenso: <b>UE Castelldefels, CF Igualada, CE Manresa y CD Masnou</b><br />';
        break;

        case 93:
        $txt = 'Campeón: <b>UD Alzira</b><br />';
        $txt .= 'Promoción de Ascenso: <b>UD Alzira, Valencia CF Mestalla, CF La Nucía y Catarroja CF</b><br />';
        $txt .= 'Descenso: <b>CD Thader, CD Olímpic, Elche CF Ilicitano y CD Alone</b><br />';
        $txt .= '<hr />El partido Eldense - Alzira, inicialmente 1-1, se dio por perdido al Alzira por 3-0, por alineación indebida. <br />';
        break;

        case 94:
        $txt = 'Campeón: <b>CD Ciempozuelos</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Ciempozuelos, CDA Navalcarnero, RSD Alcalá y CD Móstoles</b><br />';
        $txt .= 'Descenso: <b>CD San Fernando, CD Humanes, AD Villaviciosa de Odón, AD Torrejón CF y AD Unión Adarve</b><br />';
        break;

        case 95:
        $txt = 'Campeón: <b>CD Mirandés</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Mirandés, Gimnástica Segoviana CF, Real Ávila CF y Arandina CF</b><br />';
        $txt .= 'Descenso: <b>SD Ponferradina B, CD Laguna, CD Cristo Atlético, Burgos CF B y Hullera Vasco Leonesa </b><br />';
        break;

        case 96:
        $txt = 'Campeón: <b>CD Roquetas</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Roquetas, Antequera CF, Granada Atlético CF y Vélez CF</b><br />';
        $txt .= 'Descenso: <b>Fuengirola-Los Boliches, Alhaurín de la Torre CF, Torredonjimeno CF y CD Peña Ciudad de Melilla</b><br />';
        $txt .= '<hr />Por incomparecencia, el partido Antequera - Peña Ciudad Melilla se dio por perdido al Peña Ciudad Melilla por 3-0, descontándosele además tres puntos de la clasificación. <br />';
        $txt .= 'El partido Peña Ciudad Melilla - Almería B se dio por perdido al Peña Ciudad Melilla por 0-3, por alineación indebida.<br />';
        break;

        case 80:
        $txt = 'Campeón: <b>CD San Fernando</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD San Fernando, Puerto Real CF, RB Linense y CD Villanueva</b><br />';
        $txt .= 'Descenso: <b>AD Cerro del Águila, Arcos CF y Xerez CD B</b><br />';
        break;

        case 81:
        $txt = 'Campeón: <b>CD Atlético Baleares</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Atlético Baleares, RCD Mallorca B, SCR PD Santa Eulalia y CD Santanyí</b><br />';
        $txt .= 'Descenso: <b>CD Margaritense, CD Serverense y CD Atlético Villacarlos</b><br />';
        break;

        case 82:
        $txt = 'Campeón: <b>Atlético Granadilla</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Atlético Granadilla, UD Las Palmas B, UD Gáldar y Castillo CF</b><br />';
        $txt .= 'Descenso: <b>UD Balos, UD Tenerife Sur Ibarra y Atlético Arona</b><br />';
        $txt .= '<hr />El partido Tegueste - Castillo, inicialmente 2-2, se dio por perdido al Tegueste por 0-3, por alineación indebida. <br />';
        break;

        case 83:
        $txt = 'Campeón: <b>Atlético Ciudad de Lorquí</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Atlético Ciudad de Lorquí, Sangonera Atlético CF, Real Murcia B y Caravaca CF</b><br />';
        $txt .= 'Descenso: <b>Olímpico de Totana, CD Alquerías y AD Ceutí Atlético</b><br />';
        $txt .= 'El partido La Unión - Moratalla, inicialmente 1-1, se dio por perdido al</b><br />';
        $txt .= 'conjunto local por 0-3 por alineación indebida. </b><br />';
        $txt .= '<hr />El partido Santomera - Muleño se suspendió con el resultado de 3-1 por quedarse los visitantes con seis jugadores. La Federación modificó el resultado a 3-0<br />';
        break;

        case 84:
        $txt = 'Campeón: <b>CD Don Benito</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Don Benito, AD Cerro Reyes Atlético, CF Villanovense y Jerez CF</b><br />';
        $txt .= 'Descenso: <b>Atlético Pueblonuevo, CD Santa Amalia y SP Villafranca</b><br />';
        break;

        case 85:
        $txt = 'Campeón: <b>CD Izarra</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Izarra, UD Mutilvera, CD Iruña y CD Tudelano</b><br />';
        $txt .= 'Descenso: <b>Atlético Artajonés, CD Zarramonza y UCD Burladés</b><br />';
        break;

        case 86:
        $txt = 'Campeón: <b>CD Alfaro</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Alfaro, CD Anguiano, Haro Deportivo y CD Calahorra</b><br />';
        $txt .= 'Descenso: <b>CD Villegas, Club Atlético Vianés, CF Rapid y CF Ciudad de Alfaro</b><br />';
        break;

        case 87:
        $txt = 'Campeón: <b>SD Ejea</b><br />';
        $txt .= 'Promoción de Ascenso: <b>SD Ejea, UD Barbastro, CD Teruel y Atlético de Monzón</b><br />';
        $txt .= 'Descenso: <b>CD Ebro, CF Figueruelas, CF Illueca, CD Peñas Oscenses y CF Jacetano</b><br />';
        break;

        case 88:
        $txt = 'Campeón: <b>CD Toledo</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Toledo, CP Villarrobledo, UD Almansa y Tomelloso CF</b><br />';
        $txt .= 'Descenso: <b>CD Quintanar del Rey, CD Torrijos, CD Miguelturreño y CD Cobeja</b><br />';
        break;

        case 1884:
        $txt .= 'Asciende a Segunda B: <b>Sangonera Atlético CF</b><br />';
        break;

        case 1885:
        $txt .= 'Asciende a Segunda B: <b>FC Barcelona B</b><br />';
        break;

        case 1886:
        $txt .= 'Asciende a Segunda B: <b>SD Ciudad de Santiago</b><br />';
        break;

        case 1887:
        $txt .= 'Asciende a Segunda B: <b>CD San Fernando</b><br />';
        break;

        case 1888:
        $txt .= 'Asciende a Segunda B: <b>Real Racing Club B</b><br />';
        break;

        case 1889:
        $txt .= 'Asciende a Segunda B: <b>UD Alzira</b><br />';
        break;

        case 1890:
        $txt .= 'Asciende a Segunda B: <b>UD Las Palmas B</b><br />';
        break;

        case 1891:
        $txt .= 'Asciende a Segunda B: <b>CD Roquetas</b><br />';
        break;

        case 1892:
        $txt .= 'Asciende a Segunda B: <b>Antequera CF</b><br />';
        break;

        case 1893:
        $txt .= 'Asciende a Segunda B: <b>Real Murcia B</b><br />';
        break;

        case 1894:
        $txt .= 'Asciende a Segunda B: <b>UE Sant Andreu</b><br />';
        break;

        case 1895:
        $txt .= 'Asciende a Segunda B: <b>Valencia CF Mestalla</b><br />';
        break;

        case 1896:
        $txt .= 'Asciende a Segunda B: <b>CD Atlético Baleares</b><br />';
        break;

        case 1897:
        $txt .= 'Asciende a Segunda B: <b>Atlético Ciudad de Lorquí</b><br />';
        break;

        case 1898:
        $txt .= 'Asciende a Segunda B: <b>CDA Navalcarnero</b><br />';
        break;

        case 1899:
        $txt .= 'Asciende a Segunda B: <b>RB Linense</b><br />';
        break;

        case 1900:
        $txt .= 'Asciende a Segunda B: <b>SCR PD Santa Eulalia</b><br />';
        break;

        case 1902:
        $txt .= 'Asciende a Segunda B: <b>Real Sporting B</b><br />';

        break;

        case 97:
        $txt = 'Campeón: <b>Real Madrid CF</b><br />';
        $txt .= 'Liga de Campeones: <b>Real Madrid CF, FC Barcelona, Sevilla FC y Valencia CF</b><br />';
        $txt .= 'Copa de la UEFA: <b>Villarreal CF y Real Zaragoza</b><br />';
        $txt .= 'Intertoto: <b>Club Atlético de Madrid</b><br />';
        $txt .= 'Descenso: <b>RC Celta, Real Sociedad de Fútbol y Gimnàstic de Tarragona</b><br />';
        break;

        case 98:
        $txt = 'Campeón: <b>Real Valladolid CF</b><br />';
        $txt .= 'Ascenso: <b>Real Valladolid CF, UD Almería y Real Murcia CF</b><br />';
        $txt .= 'Descenso: <b>Real Madrid CF Castilla, SD Ponferradina, Lorca Deportiva CF y UD Vecindario</b><br />';
        break;

        case 99:
        $txt = 'Campeón: <b>Pontevedra CF</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Pontevedra CF, Rayo Vallecano, Racing Club Ferrol y Universidad LPGC</b><br />';
        $txt .= 'Promoción de Permanencia: <b>UD Pájara-Playas de Jandía</b><br />';
        $txt .= 'Descenso: <b>RS Gimnástica, CD Cobeña, CD Orientación Marítima y Real Racing Club B</b><br />';
        break;

        case 100:
        $txt = 'Campeón: <b>SD Éibar</b><br />';
        $txt .= 'Promoción de Ascenso: <b>SD Éibar, Burgos CF, CF Palencia y Real Unión Club</b><br />';
        $txt .= 'Promoción de Permanencia: <b>Real Valladolid CF B</b><br />';
        $txt .= 'Descenso: <b>CD Alfaro, AD Universidad Oviedo, Real Oviedo y Amurrio Club</b><br />';
        break;

        case 101:
        $txt = 'Campeón: <b>Alicante CF</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Alicante CF, SD Huesca, CD Alcoyano y CD L´Hospitalet</b><br />';
        $txt .= 'Promoción de Permanencia: <b>Valencia CF Mestalla</b><br />';
        $txt .= 'Descenso: <b>UE Sant Andreu, CD Eldense, FC Barcelona B y UD Barbastro</b><br />';
        break;

        case 102:
        $txt = 'Campeón: <b>Sevilla FC Atlético</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Sevilla FC Atlético, CD Linares, Racing Club Portuense y Córdoba CF</b><br />';
        $txt .= 'Promoción de Permanencia: <b>CF Extremadura</b><br />';
        $txt .= 'Descenso: <b>AD Cerro Reyes Atlético, CD Villanueva, CF Villanovense y Málaga CF B</b><br />';
        break;

        case 1857:
        $txt .= 'Asciende a Segunda A: <b>Sevilla FC Atlético</b><br />';
        break;

        case 1858:
        $txt .= 'Asciende a Segunda A: <b>Córdoba CF</b><br />';
        break;

        case 1859:
        $txt .= 'Asciende a Segunda A: <b>Racing Club Ferrol</b><br />';
        break;

        case 1860:
        $txt .= 'Asciende a Segunda A: <b>SD Éibar</b><br />';
        break;

        case 1861:
        $txt .= 'Descienden a Tercera: <b>CF Extremadura y Valencia CF Mestalla</b><br />';

        break;

        case 103:
        $txt = 'Campeón: <b>RC Deportivo B</b><br />';
        $txt .= 'Promoción de Ascenso: <b>RC Deportivo B, Coruxo FC, SD Negreira y Villalonga FC</b><br />';
        $txt .= 'Descenso: <b>Bergantiños CF, Laracha CF y Cruceirodo Hío CF</b><br />';
        $txt .= '<hr />El partido Ourense B - Lemos, inicialmente 2-1, se dio por perdido al Ourense B por 0-3 por alineacion indebida. <br />';
        break;

        case 113:
        $txt = 'Campeón: <b>Caudal Deportivo</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Caudal Deportivo, CD Lealtad, UP Langreo y Real Sporting B</b><br />';
        $txt .= 'Descenso: <b>CD Covadonga, UD Gijón Industrial, CD Praviano, CD Mosconia y CD San Martín</b><br />';
        break;

        case 114:
        $txt = 'Campeón: <b>SD Noja</b><br />';
        $txt .= 'Promoción de Ascenso: <b>SD Noja, UM Escobedo, CD Tropezón y CD Bezana</b><br />';
        $txt .= 'Descenso: <b>SD Solares, CD Cayón, SD Textil Escudo y Selaya FC</b><br />';
        $txt .= '<hr />Al descender de Segunda B la RS Gimnástica, fue obligada a descender a Regional la RS Gimnástica B.<br />';
        break;

        case 115:
        $txt = 'Campeón: <b>Zalla UC</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Zalla UC, SD Amorebieta, Club Portugalete y SD Beasaín</b><br />';
        $txt .= 'Descenso: <b>Real Unión Club B, Santutxu FC, UPV / EHU y Club San Ignacio</b><br />';
        break;

        case 116:
        $txt = 'Campeón: <b>CF Reus Deportiu</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CF Reus Deportiu, Girona FC, UE Sabadell FC y CF Gavà</b><br />';
        $txt .= 'Descenso: <b>AE Prat, CF Peralada y CF Palafrugell</b><br />';
        $txt .= '<hr />Los partidos Santboià - Palafrugell, inicialmente 1-0, y Peralada - Vilanova, inicialmente 0-0, se dieron por ganados a los conjuntos visitantes por 0-3, por alineación indebida de los locales.<br />';
        break;

        case 117:
        $txt = 'Campeón: <b>CD Denia</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Denia, Villarreal CF B, FC Torrevieja y Ontinyent CF</b><br />';
        $txt .= 'Descenso: <b>SD Sueca, Alicante CF B, UD Oliva y SC Requena</b><br />';
        break;

        case 118:
        $txt = 'Campeón: <b>RSD Alcalá</b><br />';
        $txt .= 'Promoción de Ascenso: <b>RSD Alcalá, Getafe CF B, CD San Fernando y CD Ciempozuelos</b><br />';
        $txt .= 'Descenso: <b>Pegaso-Tres Cantos, CD Coslada, DAV Santa Ana, CD Colonia Ofigevi y AD Colmenar Viejo</b><br />';
        $txt .= '<hr />Por alineación indebida, el partido Pegaso - Real Madrid C, inicialmente 2-3, se dio por perdido al Real Madrid C por 3-0. <br />';
        break;

        case 119:
        $txt = 'Campeón: <b>CD Mirandés</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Mirandés, Gimnástica Segoviana CF, CD Numancia B y Real Ávila CF</b><br />';
        $txt .= 'Descenso: <b>Universidad de Valladolid, CD Benavente y La Bañeza FC</b><br />';
        break;

        case 120:
        $txt = 'Campeón: <b>Granada Atlético CF</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Granada Atlético CF, CD Roquetas, CP Ejido B y Motril CF</b><br />';
        $txt .= 'Descenso: <b>RUD Carolinense, CD Imperio Albolote y UD Maracena</b><br />';
        $txt .= '<hr />El partido Huercalense - Com. Níjar, inicialmente 2-0, se dio por perdido al Huercalense por 0-3 por alineación indebida.<br />';
        break;

        case 104:
        $txt = 'Campeón: <b>Algeciras CF</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Algeciras CF, Real Betis Balompié B, Lucena CF y CD San Fernando</b><br />';
        $txt .= 'Descenso: <b>Atlético Ceuta, CD Cabecense y Chiclana CF</b><br />';
        break;

        case 105:
        $txt = 'Campeón: <b>UD Ibiza-Eivissa </b><br />';
        $txt .= 'Promoción de Ascenso: <b>UD Ibiza-Eivissa, RCD Mallorca B, UD Poblense y CD Margaritense</b><br />';
        $txt .= 'Descenso: <b>UD Collerense, CD Andraitx y CF Sóller</b><br />';
        $txt .= '<hr />El partido Sóller - Montuiri, inicialmente 4-2, se dio por perdido al Sóller por 0-3 por alineación indebida.<br />';
        break;

        case 106:
        $txt = 'Campeón: <b>UD Las Palmas B</b><br />';
        $txt .= 'Promoción de Ascenso: <b>UD Las Palmas B, CD San Isidro, UD Villa Santa Brígida y UD Fuerteventura</b><br />';
        $txt .= 'Descenso: <b>AD Huracán, UD Realejos, UD Teror Balompié y Unión Sur Yaiza</b><br />';
        $txt .= '<hr />El partido Tijarafe - Ibarra, inicialmente 1-1, se dio por perdido al Ibarra por 3-0 por alineación indebida.<br />';
        break;

        case 107:
        $txt = 'Campeón: <b>Real Murcia B</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Real Murcia B, Mazarrón CF, Caravaca CF y Sangonera Atlético CF</b><br />';
        $txt .= 'Descenso: <b>CD Molinense, EF San Ginés y CD Beniel</b><br />';
        $txt .= '<hr />El partido Lorquí - Sangonera se da por perdido al Lorquí por 0-3 por incomparecencia, descontándosele además tres puntos de su clasificación.<br />';
        break;

        case 108:
        $txt = 'Campeón: <b>Jerez CF</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Jerez CF, CD Don Benito, Imperio de Mérida y CP Cacereño</b><br />';
        $txt .= 'Descenso: <b>Olivenza CP, CD Coria, CD Castuera, CP Monesterio y CP Moraleja</b><br />';
        break;

        case 109:
        $txt = 'Campeón: <b>CD Valle de Egüés</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Valle de Egüés, Peña Sport FC, UD Mutilvera y CD Tudelano</b><br />';
        $txt .= 'Descenso: <b>CM Peralta, SD Lagunak y CD Avance Ezcabarte</b><br />';
        break;

        case 110:
        $txt = 'Campeón: <b>Haro Deportivo</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Haro Deportivo, AD Fundación Logroñés, CD Calahorra y CD Anguiano</b><br />';
        $txt .= 'Descenso: <b>CD Autol, CD Pradejón, CD San Lorenzo y CD Bañuelos</b><br />';
        break;

        case 111:
        $txt = 'Campeón: <b>Real Zaragoza B</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Real Zaragoza B, Utebo FC, Andorra CFy Atlético de Monzón</b><br />';
        $txt .= 'Descenso: <b>Alcañiz CF, CD Zuera, CD Caspe y UD break;

		casetas</b><br />';
        break;

        case 112:
        $txt = 'Campeón: <b>UB Conquense</b><br />';
        $txt .= 'Promoción de Ascenso: <b>UB Conquense, CD Guadalajara, CD Toledo y UD Almansa</b><br />';
        $txt .= 'Descenso: <b>CF La Solana, AD Torpedo 66 y UD Talavera</b><br />';
        break;

        case 1862:
        $txt .= 'Asciende a Segunda B: <b>CF Gavà</b><br />';
        break;

        case 1863:
        $txt .= 'Asciende a Segunda B: <b>Lucena CF</b><br />';
        break;

        case 1864:
        $txt .= 'Asciende a Segunda B: <b>Girona FC</b><br />';
        break;

        case 1865:
        $txt .= 'Asciende a Segunda B: <b>CE Sabadell FC</b><br />';
        break;

        case 1866:
        $txt .= 'Asciende a Segunda B: <b>UD Fuerteventura</b><br />';
        break;

        case 1867:
        $txt .= 'Asciende a Segunda B: <b>Real Betis Balompié B</b><br />';
        break;

        case 1868:
        $txt .= 'Asciende a Segunda B: <b>CD Denia</b><br />';
        break;

        case 1869:
        $txt .= 'Asciende a Segunda B: <b>CD San Isidro</b><br />';
        break;

        case 1870:
        $txt .= 'Asciende a Segunda B: <b>RC Deportivo B</b><br />';
        break;

        case 1871:
        $txt .= 'Asciende a Segunda B: <b>Algeciras CF</b><br />';
        break;

        case 1872:
        $txt .= 'Asciende a Segunda B: <b>UB Conquense</b><br />';
        break;

        case 1873:
        $txt .= 'Asciende a Segunda B: <b>UD Villa Santa Brígida</b><br />';
        break;

        case 1874:
        $txt .= 'Asciende a Segunda B: <b>Ontinyent CF</b><br />';
        break;

        case 1875:
        $txt .= 'Asciende a Segunda B: <b>CD Guadalajara</b><br />';
        break;

        case 1876:
        $txt .= 'Asciende a Segunda B: <b>Mazarrón CF</b><br />';
        break;

        case 1877:
        $txt .= 'Asciende a Segunda B: <b>UD Ibiza-Eivissa</b><br />';
        break;

        case 1878:
        $txt .= 'Asciende a Segunda B: <b>Peña Sport FC</b><br />';
        break;

        case 1901:
        $txt .= 'Asciende a Segunda B: <b>Villarreal CF B</b><br />';

        break;

        case 121:
        $txt = 'Campeón: <b>FC Barcelona</b><br />';
        $txt .= 'Liga de Campeones: <b>FC Barcelona, Real Madrid CF, Valencia CF y Club Atlético Osasuna</b><br />';
        $txt .= 'Copa de la UEFA: <b>Sevilla FC y RC Celta</b><br />';
        $txt .= 'Intertoto: <b>Villarreal CF</b><br />';
        $txt .= 'Descenso: <b>Deportivo Alavés, Cádiz CF y Málaga CF</b><br />';
        break;

        case 122:
        $txt = 'Campeón: <b>RC Recreativo</b><br />';
        $txt .= 'Ascenso: <b>RC Recreativo, Gimnàstic de Tarragona y Levante UD</b><br />';
        $txt .= 'Descenso: <b>UE Lleida, Racing Club Ferrol, Málaga CF B y SD Éibar</b><br />';
        break;

        case 123:
        $txt = 'Campeón: <b>Universidad LPGC</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Universidad LPGC, Pontevedra CF , UD Las Palmas y UD Vecindario</b><br />';
        $txt .= 'Promoción de Permanencia: <b>Castillo CF</b><br />';
        $txt .= 'Descenso: <b>RSD Alcalá, CD San Isidro, CD Móstoles y SD Negreira</b><br />';
        break;

        case 247:
        $txt = 'Campeón: <b>UD Salamanca</b><br />';
        $txt .= 'Promoción de Ascenso: <b>UD Salamanca, Real Sociedad de Fútbol B, Burgos CF y SD Ponferradina</b><br />';
        $txt .= 'Promoción de Permanencia: <b>Amurrio Club</b><br />';
        $txt .= 'Descenso: <b>SCD Durango, Deportivo Alavés B, Club Portugalete y Zalla UC</b><br />';
        break;

        case 248:
        $txt = 'Campeón: <b>CF Badalona</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CF Badalona, Levante UD B, Alicante CF y UDA Gramanet-Milán</b><br />';
        $txt .= 'Promoción de Permanencia: <b>SD Huesca</b><br />';
        $txt .= 'Descenso: <b>CF Reus Deportiu, CE Sabadell CF, Real Zaragoza B y CM Peralta</b><br />';
        break;

        case 249:
        $txt = 'Campeón: <b>FC Cartagena</b><br />';
        $txt .= 'Promoción de Ascenso: <b>FC Cartagena, Águilas CF, Sevilla FC B y CD Linares</b><br />';
        $txt .= 'Promoción de Permanencia: <b>CD Baza</b><br />';
        $txt .= 'Descenso: <b>UD Almansa, UB Conquense, Algeciras CF y CD Díter Zafra</b><br />';
        $txt .= '<hr />Por alineación indebida, el partido Villanueva - Águilas, inicialmente 2-0, se dió por perdido al Villanueva por 0-3.<br />';

        break;

        case 1835:
        $txt .= 'Asciende a Segunda A: <b>UD Salamanca</b><br />';
        break;

        case 1836:
        $txt .= 'Asciende a Segunda A: <b>UD Las Palmas</b><br />';
        break;

        case 1837:
        $txt .= 'Asciende a Segunda A: <b>UD Vecindario</b><br />';
        break;

        case 1838:
        $txt .= 'Asciende a Segunda A: <b>SD Ponferradina</b><br />';
        break;

        case 1839:
        $txt .= 'Desciende a Tercera: <b>Castillo CF</b><br />';
        break;

        case 250:
        $txt = 'Campeón: <b>RC Deportivo B</b><br />';
        $txt .= 'Promoción de Ascenso: <b>RC Deportivo B, CD Lugo, Laracha CF y Alondras CF</b><br />';
        $txt .= 'Descenso: <b>Viveiro FC, SD O Val y break;

		caselas CF</b><br />';
        $txt .= '<hr />El partido Narón - Arousa, inicialmente 2-1, se dio por perdido al Narón por el resultado de 0-3, por alineación indebida. <br />';
        break;

        case 260:
        $txt = 'Campeón: <b>AD Universidad Oviedo</b><br />';
        $txt .= 'Promoción de Ascenso: <b>AD Universidad Oviedo, UP Langreo, Ribadesella CF y CD Lealtad</b><br />';
        $txt .= 'Descenso: <b>Real Tapia CF, Berrón CF y Real Titánico</b><br />';
        break;

        case 261:
        $txt = 'Campeón: <b>RS Gimnástica</b><br />';
        $txt .= 'Promoción de Ascenso: <b>RS Gimnástica, UM Escobedo, CD Bezana y SD Noja</b><br />';
        $txt .= 'Descenso: <b>CF Vimenor, SD Revilla y CD Barquereño</b><br />';
        break;

        case 262:
        $txt = 'Campeón: <b>Sestao River Club</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Sestao River Club, SD Gernika, SD Amorebieta y Arenas Club</b><br />';
        $txt .= 'Descenso: <b>CD Aurrera Vitoria, SD Zamudio, SD Indautxu, CD Getxo, CD Aurrera Ondarroa y SD Salvatierra</b><br />';
        $txt .= '<hr />El Baskonia no pudo disputar la fase de ascenso a Segunda B por militar en esta categoría el Athletic Club B y ser ambos filiales del Athletic Club.<br />';
        break;

        case 263:
        $txt = 'Campeón: <b>Girona FC</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Girona FC, RCD Espanyol B, CF Gavà y CF Vilanova i la Geltrú</b><br />';
        $txt .= 'Descenso: <b>UE Cornellà, FE Figueres, UE Rubí y EC Granollers</b><br />';
        $txt .= 'Por alineación indebida, el partido Mataró - Europa, inicialmente 0-1, se dio por perdido al Europa por 3-0. <br />';
        break;

        case 264:
        $txt = 'Campeón: <b>Villarreal CF B</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Villarreal CF B, Valencia CF B, CD Eldense y CD Denia</b><br />';
        $txt .= 'Descenso: <b>CD Burriana, CF Gandía, CD Benicàssim y Santa Pola CF</b><br />';
        break;

        case 265:
        $txt = 'Campeón: <b>Real Madrid CF C</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Real Madrid CF C, AD Parla, CD Cobeña y Getafe CF B</b><br />';
        $txt .= 'Descenso: <b>RCD Carabanchel, CD Colonia Moscardó, CD Leganés B y Real Aranjuez CF</b><br />';
        break;

        case 266:
        $txt = 'Campeón: <b>SD Gimnástica Segoviana </b><br />';
        $txt .= 'Promoción de Ascenso: <b>SD Gimnástica Segoviana, CD Mirandés, CD Guijuelo y CD Huracán Z</b><br />';
        $txt .= 'Descenso: <b>CD Atlético Tordesillas, CyD Cebrereña y SD Almazán</b><br />';
        break;

        case 267:
        $txt = 'Campeón: <b>Granada CF</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Granada CF, Granada Atlético CF, Motril CF y Arenas de Armilla CyD</b><br />';
        $txt .= 'Descenso: <b>CD Santa Fe, Úbeda CF y CD Basto</b><br />';
        break;

        case 251:
        $txt = 'Campeón: <b>Racing Club Portuense</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Racing Club Portuense, CD San Fernando, Arcos CF y RB Linense</b><br />';
        $txt .= 'Descenso: <b>Dos Hermanas CF, Coria CF y Bollullos CF</b><br />';
        break;

        case 252:
        $txt = 'Campeón: <b>SCR PD Santa Eulalia</b><br />';
        $txt .= 'Promoción de Ascenso: <b>SCR PD Santa Eulalia, RCD Mallorca B, CD Ferriolense y CF Sporting Mahonés</b><br />';
        $txt .= 'Descenso: <b>CF Platges de Calvià, CD Soledad Paguera, CE Felanitx y UD Arenal</b><br />';
        break;

        case 253:
        $txt = 'Campeón: <b>UD Fuerteventura</b><br />';
        $txt .= 'Promoción de Ascenso: <b>UD Fuerteventura, AD Laguna, CD Orientación Marítima y Atlético Granadilla</b><br />';
        $txt .= 'Descenso: <b>CD Maspalomas, CD Mensajero y Universidad LPGC B</b><br />';
        break;

        case 254:
        $txt = 'Campeón: <b>Orihuela CF</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Orihuela CF, AD Mar Menor, Pinatar CF EMF y Cartagena Promesas CF</b><br />';
        $txt .= 'Descenso: <b>Muleño CF, CD Balsicas y CF Santomera</b><br />';
        $txt .= '<hr />El partido Mazarrón - Sangonera se dio por perdido al Mazarrón por 0-3 por incomparecencia, descontándosele además tres puntos por sanción. <br />';
        break;

        case 255:
        $txt = 'Campeón: <b>CF Villanovense</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CF Villanovense, AD Cerro Reyes Atlético, CD Don Benito y Sporting Villanueva Promesas</b><br />';
        $txt .= 'Descenso: <b>CP Amanecer, CP Alburquerque, CD Santa Marta y CP Valdivia</b><br />';
        $txt .= 'Por alineación indebida, el partido Villafranca - Villanovense, inicialmente 0-3, se dio por perdido al Villanovense por el resultado de 3-0.<br />';
        break;

        case 256:
        $txt = 'Campeón: <b>Peña Sport FC</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Peña Sport FC y CD Iruña</b><br />';
        $txt .= 'Descenso: <b>Lagun Artea KE, Atlético Artajonés, CD Beti Onak y AD San Juan</b><br />';
        break;

        case 257:
        $txt = 'Campeón: <b>AD Fundación Logroñés</b><br />';
        $txt .= 'Promoción de Ascenso: <b>AD Fundación Logroñés y CD Logroñés</b><br />';
        $txt .= 'Descenso: <b>CD Berceo, CD Villegas y CCyD Alberite</b><br />';
        break;

        case 258:
        $txt = 'Campeón: <b>Universidad de Zaragoza</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Universidad de Zaragoza, UD Barbastro, Andorra CF y AD Sabiñánigo</b><br />';
        $txt .= 'Descenso: <b>CD La Almunia, CD Mallén, CD Fuentes y FC Lalueza</b><br />';
        $txt .= '<hr />Finalizada la temporada, el Universidad de Zaragoza descendió a Regional por haber descendido a este grupo el Real Zaragoza B y ser ambos filiales del Real Zaragoza.<br />';
        break;

        case 259:
        $txt = 'Campeón: <b>UD Puertollano</b><br />';
        $txt .= 'Promoción de Ascenso: <b>UD Puertollano, CD Guadalajara, CD Toledo y Gimnástico Alcázar</b><br />';
        $txt .= 'Descenso: <b>CD Quintanar de la Orden, CD Villacañas y Daimiel CF</b><br />';
        $txt .= '<hr />El partido Quintanar Orden - Puertollano, inicialmente 1-6, se dio por perdido al Puertollano por 3-0 por alineación indebida<br />';
        break;

        case 1840:
        $txt .= 'Asciende a Segunda B: <b>CD Cobeña</b><br />';
        break;

        case 1841:
        $txt .= 'Asciende a Segunda B: <b>CD Lugo</b><br />';
        break;

        case 1842:
        $txt .= 'Asciende a Segunda B: <b>CD Guijuelo</b><br />';
        break;

        case 1843:
        $txt .= 'Asciende a Segunda B: <b>AD Universidad Oviedo</b><br />';
        break;

        case 1844:
        $txt .= 'Asciende a Segunda B: <b>CD Logroñés</b><br />';
        break;

        case 1845:
        $txt .= 'Asciende a Segunda B: <b>Sestao River Club</b><br />';
        break;

        case 1846:
        $txt .= 'Asciende a Segunda B: <b>RS Gimnástica</b><br />';
        break;

        case 1847:
        $txt .= 'Asciende a Segunda B: <b>UD Barbastro</b><br />';
        break;

        case 1848:
        $txt .= 'Asciende a Segunda B: <b>Orihuela CF</b><br />';
        break;

        case 1849:
        $txt .= 'Asciende a Segunda B: <b>CD Eldense</b><br />';
        break;

        case 1850:
        $txt .= 'Asciende a Segunda B: <b>Valencia CF B</b><br />';
        break;

        case 1851:
        $txt .= 'Asciende a Segunda B: <b>RCD Espanyol B</b><br />';
        break;

        case 1852:
        $txt .= 'Asciende a Segunda B: <b>CF Villanovense</b><br />';
        break;

        case 1853:
        $txt .= 'Asciende a Segunda B: <b>Racing Club Portuense</b><br />';
        break;

        case 1854:
        $txt .= 'Asciende a Segunda B: <b>Granada CF</b><br />';
        break;

        case 1855:
        $txt .= 'Asciende a Segunda B: <b>UD Puertollano</b><br />';
        break;

        case 1856:
        $txt .= 'Asciende a Segunda B: <b>CD Orientación Marítima</b><br />';

        break;

        case 268:
        $txt = 'Campeón: <b>FC Barcelona</b><br />';
        $txt .= 'Liga de Campeones: <b>FC Barcelona, Real Madrid CF, Villarreal CF y Real Betis Balompié</b><br />';
        $txt .= 'Copa de la UEFA: <b>RCD Espanyol y Sevilla FC</b><br />';
        $txt .= 'Intertoto: <b>Valencia CF, RC Deportivo y Athletic Club</b><br />';
        $txt .= 'Descenso: <b>Levante UD, CD Numancia y Albacete Balompié</b><br />';
        break;

        case 269:
        $txt = 'Campeón: <b>Cádiz CF</b><br />';
        $txt .= 'Ascenso: <b>Cádiz CF, RC Celta y Deportivo Alavés</b><br />';
        $txt .= 'Descenso: <b>Córdoba CF, Terrassa FC, UD Salamanca y Pontevedra CF</b><br />';
        break;

        case 270:
        $txt = 'Campeón: <b>Real Madrid CF B</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Real Madrid CF B, Universidad LPGC, Rayo Vallecano y RSD Alcalá</b><br />';
        $txt .= 'Promoción de Permanencia: <b>CF Fuenlabrada</b><br />';
        $txt .= 'Descenso: <b>UD Fuerteventura, RCD Mallorca B, CDA Navalcarnero y Atlético Arteixo</b><br />';
        break;

        case 271:
        $txt = 'Campeón: <b>SD Ponferradina</b><br />';
        $txt .= 'Promoción de Ascenso: <b>SD Ponferradina, Real Unión Club, Burgos CF y Zamora CF</b><br />';
        $txt .= 'Promoción de Permanencia: <b>CD Mirandés</b><br />';
        $txt .= 'Descenso: <b>CD Guijuelo, RS Gimnástica, Sestao River Club y Haro Deportivo</b><br />';
        $txt .= '<hr />El partido Cult. Leonesa - Real Sociedad B, inicialmente 1-0, se dio por perdido al Cult. Leonesa por el resultado de 0-3 por alineación indebida.<br />';
        $txt .= 'El partido Dep. Alavés B - Recreación, inicialmente 1-1, se dio por perdido al Dep. Alavés B por el resultado de 0-3 por alineación indebida. <br />';
        break;

        case 272:
        $txt = 'Campeón: <b>Alicante CF</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Alicante CF, Hércules CF, CD Castellón y Real Zaragoza B</b><br />';
        $txt .= 'Promoción de Permanencia: <b>UDA Gramanet-Milán</b><br />';
        $txt .= 'Descenso: <b>Girona FC, RCD Espanyol B, Novelda CF y Peña Sport FC</b><br />';
        $txt .= '<hr />El Levante UD B quedó excluido de jugar la Promoción de Ascenso por ser filial del Levante UD, que acababa de descender a Segunda A.<br />';
        break;

        case 273:
        $txt = 'Campeón: <b>Sevilla FC B</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Sevilla FC B, UB Conquense, AD Ceuta y Lorca Deportiva </b><br />';
        $txt .= 'Promoción de Permanencia: <b>Talavera CF</b><br />';
        $txt .= 'Descenso: <b>Tomelloso CF, CD Don Benito, Jerez CF y Arenas de Armilla CyD</b><br />';
        break;

        case 1813:
        $txt .= 'Asciende a Segunda A: <b>Hércules CF</b><br />';
        break;

        case 1814:
        $txt .= 'Asciende a Segunda A: <b>CD Castellón</b><br />';
        break;

        case 1815:
        $txt .= 'Asciende a Segunda A: <b>Lorca Deportiva</b><br />';
        break;

        case 1816:
        $txt .= 'Asciende a Segunda A: <b>Real Madrid CF B</b><br />';
        break;

        case 1817:
        $txt .= 'Desciende a Tercera: <b>CD Mirandés</b><br />';
        break;

        case 274:
        $txt = 'Campeón: <b>Rápido de Bouzas</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Rápido de Bouzas, SD Negreira, CD Lugo y Coruxo FC</b><br />';
        $txt .= 'Descenso: <b>Porriño Industrial FC, CD Grove y Verín CF</b><br />';
        break;

        case 284:
        $txt = 'Campeón: <b>Real Oviedo</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Real Oviedo, Ribadesella CF, CD Mosconia y UP Langreo</b><br />';
        $txt .= 'Descenso: <b>CD Llanes, CD San Martín y Andés CF</b><br />';
        break;

        case 285:
        $txt = 'Campeón: <b>Real Racing Club B</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Real Racing Club B, UM Escobedo, SD Barreda Balompié y SD Noja</b><br />';
        $txt .= 'Descenso: <b>SD Textil Escudo, CyD Guarnizo y Atlético Deva</b><br />';
        break;

        case 286:
        $txt = 'Campeón: <b>Club Portugalete</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Club Portugalete, Zalla UC, SD Gernika y SCD Durango</b><br />';
        $txt .= 'Descenso: <b>Deportivo Alavés C, Berio FT y Bruno Villarreal</b><br />';
        break;

        case 287:
        $txt = 'Campeón: <b>CD L´Hospitalet</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD L´Hospitalet, CE Mataró, UE Sant Andreu y CF Reus Deportiu</b><br />';
        $txt .= 'Descenso: <b>UE Vilassar Mar, CD Banyoles y UE Tàrrega</b><br />';
        break;

        case 288:
        $txt = 'Campeón: <b>Valencia CF B</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Valencia CF B, CF Gandía, CD Eldense y Santa Pola CF</b><br />';
        $txt .= 'Descenso: <b>Paterna CF, Torrellano CF y CD Acero</b><br />';
        break;

        case 289:
        $txt = 'Campeón: <b>Las Rozas CF</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Las Rozas CF, CD Móstoles, AD Parla y CD Ciempozuelos</b><br />';
        $txt .= 'Descenso: <b>AD Orcasitas, AD Colmenar Viejo, AD Torrejón CF y CD El Álamo</b><br />';
        break;

        case 290:
        $txt = 'Campeón: <b>CF Promesas Ponferrada</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CF Promesas Ponferrada, Real Ávila CF, SD Gimnástica Segoviana y Real Valladolid CF B</b><br />';
        $txt .= 'Descenso: <b>SD Gimnástica Medinense, CD Cristo Atlético y Racing Lermeño CF</b><br />';
        break;

        case 291:
        $txt = 'Campeón: <b>CD Baza</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Baza, Torredonjimeno CF, CD Roquetas y CD Alhaurino</b><br />';
        $txt .= 'Descenso: <b>Atlético Mancha Real, CP Granada 74 y CF Rusadir</b><br />';
        $txt .= '<hr />Los partidos Rusadir - Alhaurino, inicialmente 0-0, y Rusadir - Úbeda, inicialmente 3-1, se dieron por perdidos al Rusadir por 0-3 por alineación indebida.<br />';
        $txt .= 'Por incomparecencia del Rusadir a su partido en campo del Carolinense, se le da por perdido dicho partido por el resultado de 3-0, descontándosele además tres puntos por sanción. <br />';
        break;

        case 275:
        $txt = 'Campeón: <b>CD Villanueva</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Villanueva, UD Los Barrios, Racing Club Portuense y RB Linense</b><br />';
        $txt .= 'Descenso: <b>AD Cerro del Águila, Atlético Antoniano, RCD Nueva Sevilla y AD Cartaya</b><br />';
        break;

        case 276:
        $txt = 'Campeón: <b>CD Constancia</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Constancia, CD Manacor, SCR PD Santa Eulalia y CF Sporting Mahonés</b><br />';
        $txt .= 'Descenso: <b>CE Campos, CD Atlético Baleares y SD Portmany</b><br />';
        break;

        case 277:
        $txt = 'Campeón: <b>SD Tenisca</b><br />';
        $txt .= 'Promoción de Ascenso: <b>SD Tenisca, CD San Isidro, AD Laguna y CD Orientación Marítima</b><br />';
        $txt .= 'Descenso: <b>UD Telde, CD La Oliva y Atlético Arona</b><br />';
        break;

        case 278:
        $txt = 'Campeón: <b>Águilas CF</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Águilas CF, Sangonera Atlético CF, AD Mar Menor y Mazarrón CF</b><br />';
        $txt .= 'Descenso: <b>CD Cieza, UCAM y CD Bala Azul</b><br />';
        break;

        case 279:
        $txt = 'Campeón: <b>UD Mérida</b><br />';
        $txt .= 'Promoción de Ascenso: <b>UD Mérida, CF Villanovense, AD Cerro Reyes Atlético y Moralo CP</b><br />';
        $txt .= 'Descenso: <b>CD Badajoz B, CD Grabasa Burguillos y Arroyo CP</b><br />';
        break;

        case 280:
        $txt = 'Campeón: <b>CD Valle de Egüés</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Valle de Egüés y UD Mutilvera</b><br />';
        $txt .= 'Descenso: <b>CD Urroztarra, CD Izarra y CD Subiza</b><br />';
        break;

        case 281:
        $txt = 'Campeón: <b>CD Calahorra</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Calahorra y AD Fundación Logroñés</b><br />';
        $txt .= 'Descenso: <b>CD San Cosme y Valvanera CD</b><br />';
        break;

        case 282:
        $txt = 'Campeón: <b>UD Barbastro</b><br />';
        $txt .= 'Promoción de Ascenso: <b>UD Barbastro, Utebo FC, Universidad de Zaragoza y CD Sariñena</b><br />';
        $txt .= 'Descenso: <b>UD Fraga, CD Alagón, SD Ejea y UD La Fueva</b><br />';
        $txt .= '<hr />El partido Alcañiz - Zuera, inicialmente 0-1, se dio por perdido al Zuera por el resultado de 3-0 por alineación indebida.<br />';
        break;

        case 283:
        $txt = 'Campeón: <b>UD Almansa</b><br />';
        $txt .= 'Promoción de Ascenso: <b>UD Almansa, Albacete Balompié B, Gimnástico Alcázar y UD Talavera</b><br />';
        $txt .= 'Descenso: <b>CD Torrijos, AD Torpedo 66 y Hellín Deportivo</b><br />';

        break;

        case 1818:
        $txt .= 'Asciende a Segunda B: <b>Real Oviedo</b><br />';
        break;

        case 1819:
        $txt .= 'Asciende a Segunda B: <b>SD Negreira</b><br />';
        break;

        case 1820:
        $txt .= 'Asciende a Segunda B: <b>Real Valladolid CF B</b><br />';
        break;

        case 1821:
        $txt .= 'Asciende a Segunda B: <b>CD Móstoles</b><br />';
        break;

        case 1822:
        $txt .= 'Asciende a Segunda B: <b>Club Portugalete</b><br />';
        break;

        case 1823:
        $txt .= 'Asciende a Segunda B: <b>SCD Durango</b><br />';
        break;

        case 1824:
        $txt .= 'Asciende a Segunda B: <b>Zalla UC</b><br />';
        break;

        case 1825:
        $txt .= 'Asciende a Segunda B: <b>Real Racing Club B</b><br />';
        break;

        case 1826:
        $txt .= 'Asciende a Segunda B: <b>UE Sant Andreu</b><br />';
        break;

        case 1827:
        $txt .= 'Asciende a Segunda B: <b>CD L´Hospitalet</b><br />';
        break;

        case 1828:
        $txt .= 'Asciende a Segunda B: <b>CF Reus Deportiu</b><br />';
        break;

        case 1829:
        $txt .= 'Asciende a Segunda B: <b>Águilas CF</b><br />';
        break;

        case 1830:
        $txt .= 'Asciende a Segunda B: <b>UD Mérida</b><br />';
        break;

        case 1831:
        $txt .= 'Asciende a Segunda B: <b>CD Baza</b><br />';
        break;

        case 1832:
        $txt .= 'Asciende a Segunda B: <b>CD Villanueva</b><br />';
        break;

        case 1833:
        $txt .= 'Asciende a Segunda B: <b>UD Almansa</b><br />';
        break;

        case 1834:
        $txt .= 'Asciende a Segunda B: <b>CD Isidro</b><br />';

        break;

        case 292:
        $txt = 'Campeón: <b>Valencia CF</b><br />';
        $txt .= 'Liga de Campeones: <b>Valencia CF, FC Barcelona, RC Deportivo y Real Madrid CF</b><br />';
        $txt .= 'Copa de la UEFA: <b>Athletic Club y Sevilla FC</b><br />';
        $txt .= 'Intertoto: <b>Club Atlético de Madrid y Villarreal CF</b><br />';
        $txt .= 'Descenso: <b>Real Valladolid CF, RC Celta y Real Murcia CF</b><br />';
        $txt .= '<hr />El Racing Santander fue sancionado con la pérdida de un punto por haber alineado simultáneamente a cuatro jugadores no comunitarios en su partido en casa contra el Osasuna. <br />';

        break;

        case 293:
        $txt = 'Campeón: <b>Levante UD</b><br />';
        $txt .= 'Ascenso: <b>Levante UD, Getafe CF y CD Numancia</b><br />';
        $txt .= 'Descenso: <b>CD Leganés, UD Las Palmas, Rayo Vallecano y Algeciras CF</b><br />';
        break;

        case 294:
        $txt = 'Campeón: <b>Pontevedra CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Pontevedra CF, Racing Club Ferrol, RC Celta B y CD Ourense</b><br />';
        $txt .= 'Promoción de Permanencia: <b>Peña Sport FC</b><br />';
        $txt .= 'Descenso: <b>Real Racing Club B, CD Calahorra, Caudal Deportivo y Real Avilés Industrial</b><br />';
        break;

        case 295:
        $txt = 'Campeón: <b>Atlético de Madrid B</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Atlético de Madrid B, Real Madrid CF B, CD Mirandés y CyD Leonesa</b><br />';
        $txt .= 'Promoción de Permanencia: <b>RSD Alcalá</b><br />';
        $txt .= 'Descenso: <b>UD break;

		casetas, CD Toledo, SD Compostela y CF Rayo Majadahonda</b><br />';
        $txt .= '<hr />El partido Conquense - Compostela se dio por vencedor al Conquense por el resultado de 3-0, por incomparecencia del segundo, descontándosele a este además tres puntos de su clasificación.<br />';
        break;

        case 296:
        $txt = 'Campeón: <b>UE Lleida</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>UE Lleida, Lorca Deportiva CF, Gimnàstic de Tarragona y CD Castellón</b><br />';
        $txt .= 'Promoción de Permanencia: <b>CE Sabadell FC</b><br />';
        $txt .= 'Descenso: <b>Valencia CF B, CE Mataró, Yeclano CF y Palamós CF</b><br />';
        break;

        case 297:
        $txt = 'Campeón: <b>UD Lanzarote</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>UD Lanzarote, UD Pájara-Playas de Jandía, Sevilla FC B y CD Badajoz</b><br />';
        $txt .= 'Promoción de Permanencia: <b>Real Betis Balompié B</b><br />';
        $txt .= 'Descenso: <b>CP Cacereño, UD Mérida, CF Villanovense y UD Los Palacios</b><br />';

        break;

        case 1729:
        $txt .= 'Asciende a Segunda A: <b>UE Lleida</b><br />';
        break;

        case 1730:
        $txt .= 'Asciende a Segunda A: <b>Pontevedra CF</b><br />';
        break;

        case 1731:
        $txt .= 'Asciende a Segunda A: <b>Racing Club Ferrol</b><br />';
        break;

        case 1732:
        $txt .= 'Asciende a Segunda A: <b>Gimnàstic de Tarragona</b><br />';
        break;

        case 1733:
        $txt .= 'Desciende a Tercera: <b>Real Betis Balompié B</b><br />';
        break;

        case 298:
        $txt = 'Campeón: <b>CCD Cerceda</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CCD Cerceda, Atlético Arteixo, RC Deportivo B y Verín CF</b><br />';
        $txt .= 'Descenso: <b>Ponte Ourense CF, Sporting Guardés y UD Xove Lago</b><br />';
        $txt .= 'El SD Compostela B fue obligado a descender a Regional por ser filial del SD Compostela, que descendió de Segunda B. </b><br />';
        break;

        case 307:
        $txt = 'Campeón: <b>Real Oviedo</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Real Oviedo, Oviedo Astur CF, Real Sporting B y Club Marino</b><br />';
        $txt .= 'Descenso: <b>Pumarín CF, Condal CF, Navia CF y SD Lenense</b><br />';
        $txt .= '<hr />El Oviedo figura con seis puntos menos por sanción impuesta por  la FIFA por impago a un club extranjero.<br />';
        break;

        case 308:
        $txt = 'Campeón: <b>SD Noja</b><br />';
        $txt .= 'Promoción de Ascenso: <b>SD Noja, CD Tropezón, CD Bezana y Velarde Camargo CF</b><br />';
        $txt .= 'Descenso: <b>CD Comillas, CD Pontejos y CD Cayón</b><br />';
        $txt .= '<hr />El Rayo Cantabria fue obligado a descender a Regional por descender de Segunda B el Racing Santander B, y ser ambos filiales del Racing Santander.<br />';
        break;

        case 309:
        $txt = 'Campeón: <b>Sestao River Club</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Sestao River Club, SD Lemona, SD Éibar B y Club Portugalete</b><br />';
        $txt .= 'Descenso: <b>CD Pasajes, UPV / EHU y Club Bermeo</b><br />';
        $txt .= '<hr />El Baskonia quedó excluido de jugar la Promoción de Ascenso por ser filial del Athletic Club como el Athletic Club B que ya jugaba en Segunda B.<br />';
        break;

        case 310:
        $txt = 'Campeón: <b>CF Badalona</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CF Badalona, CF Reus Deportiu, CD L´Hospitalet y EC Granollers</b><br />';
        $txt .= 'Descenso: <b>CE Europa, CF Palafrugell, AEC Manlleu y UDA Gramanet-Milan B</b><br />';
        break;

        case 311:
        $txt = 'Campeón: <b>Benidorm CD</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Benidorm CD, CD Alcoyano, Villarreal CF B y Levante UD B</b><br />';
        $txt .= 'Descenso: <b>CD Buñol, CD Castellón B y Hércules CF B</b><br />';
        $txt .= 'El partido Gandía - Castellón B, inicialmente 0-0 se dio por </b><br />';
        $txt .= 'ganado al primero</b><br />';
        $txt .= 'por 3-0, por alineación indebida del segundo. </b><br />';
        $txt .= '<hr />El Valencia C fue obligado a descender a Regional por descender de Segunda B el Valencia B, y ser ambos filiales del Valencia CF. <br />';
        break;

        case 312:
        $txt = 'Campeón: <b>CD Móstoles</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Móstoles, Pegaso-Tres Cantos, Atlético de Pinto y CDA Navalcarnero</b><br />';
        $txt .= 'Descenso: <b>Tornado Tres Cantos, CD Coslada, RCD Carabanchel y CD Puerta Bonita</b><br />';
        break;

        case 313:
        $txt = 'Campeón: <b>SD Gimnástica Segoviana </b><br />';
        $txt .= 'Promoción de Ascenso: <b>SD Gimnástica Segoviana , Norma San Leonardo CF, CD Guijuelo y Real Ávila CF</b><br />';
        $txt .= 'Descenso: <b>Atlético Bembibre, UD Santa Marta Tormes y SC Uxama</b><br />';
        $txt .= '<hr />El partido Benavente - Gim. Segoviana, inicialmente 2-2, se dio por perdido al Benavente por el resultado de 0-3, por alineación indebida.<br />';
        break;

        case 314:
        $txt = 'Campeón: <b>Granada CF</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Granada CF, Motril CF, CP Granada 74 y Arenas de Armilla CyD</b><br />';
        $txt .= 'Descenso: <b>UD San Pedro, Martos CD, Vandalia Industrial y Antequera CF</b><br />';
        $txt .= '<hr />El partido Granada 74 - Úbeda se suspendió con el resultado de 1-0 al quedarse el Úbeda con seis jugadores, por lo que el Comité de Competición estableció como resultado definitivo 3-0.<br />';
        break;

        case 299:
        $txt = 'Campeón: <b>CD Alcalá</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Alcalá, Bollullos CF , RB Linense y CD San Fernando</b><br />';
        $txt .= 'Descenso: <b>Córdoba CF B, Serrallo CF y Montilla CF</b><br />';
        $txt .= '<hr />El partido Coria - Linense se suspendió con el resultado de 2-1 al quedarse el Linense con seis jugadores, por lo que el Comité de Competición estableció como resultado definitivo 3-0. <br />';
        break;

        case 300:
        $txt = 'Campeón: <b>SCR PD Santa Eulalia</b><br />';
        $txt .= 'Promoción de Ascenso: <b>SCR PD Santa Eulalia, CD Santanyí, UD Poblense y CF Villafranca</b><br />';
        $txt .= 'Descenso: <b>UD Alcudia, CD Cardessar y RCD Santa Ponsa</b><br />';
        $txt .= '<hr />El partido At. Baleares - Manacor, inicialmente 1-1, se dio por perdido al At. Baleares por 0-3 por alineación indebida.<br />';
        break;

        case 301:
        $txt = 'Campeón: <b>Castillo CF</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Castillo CF, CD Villa Santa Brígida, AD Laguna y SD Tenisca</b><br />';
        $txt .= 'Descenso: <b>CD Tenerife B, CD Victoria y CD San Miguel</b><br />';
        $txt .= '<hr />El partido O. Marítima - Las Palmas B, inicialmente 2-3, se dio por ganado al O. Marítima por 3-0, por alineación indebida del Las Palmas B.<br />';
        break;

        case 302:
        $txt = 'Campeón: <b>AD Mar Menor</b><br />';
        $txt .= 'Promoción de Ascenso: <b>AD Mar Menor, Mazarrón CF, UD Horadada y Caravaca CF</b><br />';
        $txt .= 'Descenso: <b>CD Dolores, Muleño CF y CD Lumbreras</b><br />';
        break;

        case 303:
        $txt = 'Campeón: <b>CD Don Benito</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Don Benito, CD Díter Zafra, UP Plasencia y AD Cerro Reyes Atlético </b><br />';
        $txt .= 'Descenso: <b>CP Alburquerque, UD Montijo y AD Ciudad de Plasencia</b><br />';
        $txt .= 'El CP Cacereño B fue obligado a descender a Regional por ser filial del CP Cacereño, que descendió de Segunda B.<br />';
        break;

        case 304:
        $txt = 'Campeón: <b>CM Peralta</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CM Peralta, CD Valle de Egüés, UCD Burladés y Haro Deportivo</b><br />';
        $txt .= 'Descenso: <b>CD Lourdes</b><br />';
        $txt .= 'Promoción de Descenso: <b>CCyDAlberite</b><br />';
        $txt .= '<hr />Al dividirse en dos este grupo para la temporada siguiente (uno con los equipos navarros y otro con los riojanos), tan sólo descendió  directamente el último clasificado de los equipos navarros (CD Lourdes) y jugó una promoción de permanencia el último de los riojanos (CCyD Alberite).<br />';
        break;

        case 305:
        $txt = 'Campeón: <b>Utebo FC</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Utebo FC, CD Binéfar, Andorra CF y SD Huesca</b><br />';
        $txt .= 'Descenso: <b>CD Mallén, RSD Santa Isabel, CD Fuentes y Atlético Monzalbarba</b><br />';
        break;

        case 306:
        $txt = 'Campeón: <b>CD Quintanar del Rey</b><br />';
        $txt .= 'Promoción de Ascenso: <b>CD Quintanar del Rey, UD Puertollano, Hellín Deportivo y La Roda CF</b><br />';
        $txt .= 'Descenso: <b>Manzanares CF, CD Sigüenza, CD Toledo B y Sporting Cabanillas</b><br />';
        break;

        case 1734:
        $txt .= 'Asciende a Segunda B: <b>CDA Navalcarnero</b><br />';
        break;

        case 1794:
        $txt .= 'Asciende a Segunda B: <b>Atlético Arteixo</b><br />';
        break;

        case 1795:
        $txt .= 'Asciende a Segunda B: <b>Club Marino</b><br />';
        break;

        case 1796:
        $txt .= 'Asciende a Segunda B: <b>CD Guijuelo</b><br />';
        break;

        case 1797:
        $txt .= 'Asciende a Segunda B: <b>SD Huesca</b><br />';
        break;

        case 1798:
        $txt .= 'Asciende a Segunda B: <b>Sestao River Club</b><br />';
        break;

        case 1799:
        $txt .= 'Asciende a Segunda B: <b>CM Peralta</b><br />';
        break;

        case 1800:
        $txt .= 'Asciende a Segunda B: <b>SD Lemona</b><br />';
        break;

        case 1801:
        $txt .= 'Asciende a Segunda B: <b>CF Badalona</b><br />';
        break;

        case 1802:
        $txt .= 'Asciende a Segunda B: <b>Benidorm CD</b><br />';
        break;

        case 1803:
        $txt .= 'Asciende a Segunda B: <b>Levante UD B</b><br />';
        break;

        case 1804:
        $txt .= 'Asciende a Segunda B: <b>CD Alcoyano</b><br />';
        break;

        case 1805:
        $txt .= 'Asciende a Segunda B: <b>CD Díter Zafra</b><br />';
        break;

        case 1806:
        $txt .= 'Asciende a Segunda B: <b>CD Alcalá</b><br />';
        break;

        case 1807:
        $txt .= 'Asciende a Segunda B: <b>CD Don Benito</b><br />';
        break;

        case 1808:
        $txt .= 'Asciende a Segunda B: <b>Arenas de Armilla CyD</b><br />';
        break;

        case 1809:
        $txt .= 'Asciende a Segunda B: <b>Castillo CF</b><br />';

        break;

        case 315:
        $txt = 'Campeón: <b>Real Madrid CF</b><br />';
        $txt .= 'Liga de Campeones: <b>Real Madrid CF, Real Sociedad de Fútbol, RC Deportivo y RC Celta</b><br />';
        $txt .= 'Copa de la UEFA: <b>Valencia CF y FC Barcelona</b><br />';
        $txt .= 'Intertoto: <b>Villarreal CF y Real Racing Club</b><br />';
        $txt .= 'Descenso: <b>RC Recreativo, Deportivo Alavés y Rayo Vallecano</b><br />';
        break;

        case 316:
        $txt = 'Campeón: <b>Real Murcia CF</b><br />';
        $txt .= 'Ascenso: <b>Real Murcia CF, Real Zaragoza y Albacete Balompié</b><br />';
        $txt .= 'Descenso: <b>CD Leganés, Racing Club Ferrol, Real Oviedo y CD Badajoz</b><br />';
        break;

        case 317:
        $txt = 'Campeón: <b>Universidad LPGC</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Universidad LPGC, Zamora CF, UD Lanzarote y Pontevedra CF</b><br />';
        $txt .= 'Promoción de Permanencia: <b>UP Langreo</b><br />';
        $txt .= 'Descenso: <b>Club Marino, CD Lugo, Real Ávila CF y Ribadesella CF</b><br />';
        $txt .= '<hr />El partido Corralejo - Marino, inicialmente 2-0, se dio por perdido al Corralejo por 0-3 por alineación indebida. <br />';
        break;

        case 318:
        $txt = 'Campeón: <b>Real Unión Club</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Real Unión Club, Barakaldo CF, CD Logroñés y Athletic Club B</b><br />';
        $txt .= 'Promoción de Permanencia: <b>CD Calahorra</b><br />';
        $txt .= 'Descenso: <b>SD Gernika, CM Peralta, SD Noja y CD Binéfar</b><br />';
        $txt .= '<hr />El partido Binéfar - Logroñés se dio por perdido al Logroñés por incomparecencia, descontándosele además tres puntos de la clasificación.<br />';
        break;

        case 319:
        $txt = 'Campeón: <b>CD Castellón</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Castellón, FC Barcelona B, Burgos CF y UDA Gramanet-Milán</b><br />';
        $txt .= 'Promoción de Permanencia: <b>UE Figueres</b><br />';
        $txt .= 'Descenso: <b>CF Gavà, CF Reus Deportiu, CD L´Hospitalet y Orihuela CF</b><br />';
        break;

        case 320:
        $txt = 'Campeón: <b>Algeciras CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Algeciras CF, Málaga CF B, CF Ciudad de Murcia y Cádiz CF</b><br />';
        $txt .= 'Promoción de Permanencia: <b>CD Linares</b><br />';
        $txt .= 'Descenso: <b>CD Díter Zafra, Moralo CP, Torredonjimeno CF y Motril CF</b><br />';
        break;

        case 1708:
        $txt .= 'Asciende a Segunda A: <b>Cádiz CF</b><br />';
        break;

        case 1709:
        $txt .= 'Asciende a Segunda A: <b>Algeciras CF</b><br />';
        break;

        case 1710:
        $txt .= 'Asciende a Segunda A: <b>Málaga CF B</b><br />';
        break;

        case 1711:
        $txt .= 'Asciende a Segunda A: <b>CF Ciudad de Murcia</b><br />';
        break;

        case 1790:
        $txt .= 'Desciende a Tercera: <b>UP Langreo</b><br />';
        break;

        case 321:
        $txt = 'Campeón: <b>CCD Cerceda</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CCD Cerceda, RC Deportivo B, Atlético Arteixo y Rápido de Bouzas</b><br />';
        $txt .= 'Descenso: <b>Alondras CF, Racing Club Villalbés, Viveiro FC y Club Lemos</b><br />';
        break;

        case 330:
        $txt = 'Campeón: <b>Caudal Deportivo</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Caudal Deportivo, Real Titánico, Real Sporting B y Real Oviedo B</b><br />';
        $txt .= 'Descenso: <b>Pumarín CF, CD Covadonga, SD Narcea, Navarro CF, SD Colloto y CD Turón</b><br />';
        $txt .= '<hr />El partido Covadonga - Turón fue suspendido por quedarse el Turón con 6 jugadores cuando el marcador era 1-1. La federación decidió dárselo por perdido al Turón por 3-0. <br />';
        break;

        case 331:
        $txt = 'Campeón: <b>Velarde Camargo CF </b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Velarde Camargo CF , SD Barreda Balompié, CD Tropezón y SD Reocín</b><br />';
        $txt .= 'Descenso: <b>CF Minerva, CD Toranzo Sport, SD Revilla y CD Naval</b><br />';
        break;

        case 332:
        $txt = 'Campeón: <b>CD Basconia</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Basconia, Real Sociedad de Fútbol B, Zalla UC y SD Lemona</b><br />';
        $txt .= 'Descenso: <b>SCD Durango, SD San Pedro, Club San Ignacio y CD Aurrera Vitoria B</b><br />';
        break;

        case 333:
        $txt = 'Campeón: <b>CF Badalona</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CF Badalona, Girona CF, CF Vilanova i la Geltrú y UE Sant Andreu</b><br />';
        $txt .= 'Descenso: <b>AE Prat, CD Tortosa, CE Premià, AD Guíxols y CF Balaguer</b><br />';
        break;

        case 334:
        $txt = 'Campeón: <b>Benidorm CD</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Benidorm CD, Villajoyosa CF, CD Onda y Levante UD B</b><br />';
        $txt .= 'Descenso: <b>Vinarós CF, UD Alzira, UD Carcaixent, UDJ Barrio del Cristo y UD Puzol</b><br />';
        break;

        case 335:
        $txt = 'Campeón: <b>UD San Sebastián Reyes</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>UD San Sebastián Reyes, CDA Navalcarnero, CF Fuenlabrada y CF Rayo Majadahonda </b><br />';
        $txt .= 'Descenso: <b>CD Fortuna, Aravaca CF, CD Colonia Moscardó y CD Mejoreño</b><br />';
        break;

        case 336:
        $txt = 'Campeón: <b>CF Palencia</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CF Palencia, CF Promesas Ponferrada, La Bañeza FC y CD Guijuelo</b><br />';
        $txt .= 'Descenso: <b>UD Grupo Río Vena, CD Béjar Industrial y CD Aguilar</b><br />';
        break;

        case 337:
        $txt = 'Campeón: <b>CP Granada 74</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CP Granada 74, UD Marbella, RUD Carolinense y Granada CF</b><br />';
        $txt .= 'Descenso: <b>Vélez CF, Andalucía CF y CD Mármol Macael</b><br />';
        break;

        case 322:
        $txt = 'Campeón: <b>CD Villanueva</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Villanueva, UD Los Palacios, Atlético Lucentino Industrial y CD Alcalá</b><br />';
        $txt .= 'Descenso: <b>Ayamonte CF, RC Recreativo B, AD San José, Puerto Real CF y Atlético Cortegana</b><br />';
        $txt .= '<hr />El partido Lucentino - Puerto Real, inicialmente 0-1, se dio por perdido al Puerto Real por 3-0, por alineación indebida.<br />';
        break;

        case 323:
        $txt = 'Campeón: <b>CF Villafranca</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CF Villafranca, CD Constancia, CD Manacor y UD Poblense</b><br />';
        $txt .= 'Descenso: <b>CD Paguera, CD Génova y CF San Rafael</b><br />';
        break;

        case 324:
        $txt = 'Campeón: <b>UD Vecindario</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>UD Vecindario, Castillo CF, CD Tenerife B y UD Las Palmas B</b><br />';
        $txt .= 'Descenso: <b>UD Agaete, UD Esperanza, AD Huracán y UD Valle de la Frontera</b><br />';
        $txt .= '<hr />Los partidos San Isidro - Santa Brígida, inicialmente 3-2, y Victoria - La Oliva, inicialmente 1-1 se dieron por perdidos a los equipos locales por el resultado de 0-3, por alineación indebida. <br />';
        break;

        case 325:
        $txt = 'Campeón: <b>Lorca Deportiva CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Lorca Deportiva CF, Yeclano CF, AD Mar Menor y Águilas CF</b><br />';
        $txt .= 'Descenso: <b>CD Beniel, Blanca CF y Olímpico de Totana</b><br />';
        $txt .= '<hr />El partido Sangonera - Abarán se suspendió con el resultado de 2-2 por quedarse el Abarán con siete jugadores. El resultado final se modificó a 3-0 a favor del Sangonera.<br />';
        break;

        case 326:
        $txt = 'Campeón: <b>AD Cerro Reyes Atlético </b><br />';
        $txt .= 'Liguilla de Ascenso: <b>AD Cerro Reyes Atlético , CD Don Benito, CF Villanovense y CD Badajoz B</b><br />';
        $txt .= 'Descenso: <b>CD Valdelacalzada, CD Guadiana, Olivenza CP y CP Gran Maestre</b><br />';
        break;

        case 327:
        $txt = 'Campeón: <b>CD Mirandés</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Mirandés, CD Alfaro, CD Recreación y CD Oberena</b><br />';
        $txt .= 'Descenso: <b>CD Beti Onak, CD Subiza, Atlético River Ebro y CD Ilumberri</b><br />';
        $txt .= '<hr />El partido Chantrea - River Ebro, inicialmente 1-1, se dio por ganado al Chantrea por 3-0 por alineación indebida del River Ebro.<br />';
        break;

        case 328:
        $txt = 'Campeón: <b>UD Fraga</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>UD Fraga, SD Huesca, UD break;

		casetas y UD Barbastro</b><br />';
        $txt .= 'Descenso: <b>CF Jacetano, Villanueva CF, Alcañiz CF, CD La Almunia y CF Figueruelas</b><br />';
        break;

        case 329:
        $txt = 'Campeón: <b>Hellín Deportivo</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Hellín Deportivo, CD Quintanar del Rey, CD Guadalajara y Tomelloso CF</b><br />';
        $txt .= 'Descenso: <b>CA Tarazona, CD Los Yébenes y CF Valdepeñas</b><br />';
        break;

        case 1712:
        $txt .= 'Asciende a Segunda B: <b>CF Rayo Majadahonda</b><br />';
        break;

        case 1713:
        $txt .= 'Asciende a Segunda B: <b>UD San Sebastián Reyes</b><br />';
        break;

        case 1714:
        $txt .= 'Asciende a Segunda B: <b>CF Palencia</b><br />';
        break;

        case 1715:
        $txt .= 'Asciende a Segunda B: <b>CF Fuenlabrada</b><br />';
        break;

        case 1716:
        $txt .= 'Asciende a Segunda B: <b>UD break;

		casetas</b><br />';
        break;

        case 1717:
        $txt .= 'Asciende a Segunda B: <b>CD Recreación</b><br />';
        break;

        case 1718:
        $txt .= 'Asciende a Segunda B: <b>CD Mirandés</b><br />';
        break;

        case 1719:
        $txt .= 'Asciende a Segunda B: <b>CD Alfaro</b><br />';
        break;

        case 1720:
        $txt .= 'Asciende a Segunda B: <b>Yeclano CF</b><br />';
        break;

        case 1721:
        $txt .= 'Asciende a Segunda B: <b>Villajoyosa CF</b><br />';
        break;

        case 1722:
        $txt .= 'Asciende a Segunda B: <b>Girona FC</b><br />';
        break;

        case 1723:
        $txt .= 'Asciende a Segunda B: <b>Lorca Deportiva CF</b><br />';
        break;

        case 1724:
        $txt .= 'Asciende a Segunda B: <b>UD Los Palacios</b><br />';
        break;

        case 1725:
        $txt .= 'Asciende a Segunda B: <b>Tomelloso CF</b><br />';
        break;

        case 1726:
        $txt .= 'Asciende a Segunda B: <b>UD Marbella</b><br />';
        break;

        case 1727:
        $txt .= 'Asciende a Segunda B: <b>CF Villanovense</b><br />';
        break;

        case 1728:
        $txt .= 'Asciende a Segunda B: <b>UD Vecindario</b><br />';

        break;

        case 338:
        $txt = 'Campeón: <b>Valencia CF</b><br />';
        $txt .= 'Liga de Campeones: <b>Valencia CF, RC Deportivo, Real Madrid CF y FC Barcelona</b><br />';
        $txt .= 'Copa de la UEFA: <b>RC Celta, Real Betis Balompié y Deportivo Alavés</b><br />';
        $txt .= 'Intertoto: <b>Málaga CF y Villarreal CF</b><br />';
        $txt .= 'Descenso: <b>UD Las Palmas, CD Tenerife y Real Zaragoza</b><br />';
        break;

        case 339:
        $txt = 'Campeón: <b>Club Atlético de Madrid</b><br />';
        $txt .= 'Ascenso: <b>Club Atlético de Madrid, Real Racing Club y RC Recreativo</b><br />';
        $txt .= 'Descenso: <b>Levante UD, Gimnàstic de Tarragona, CF Extremadura y Real Jaén CF</b><br />';
        break;

        case 340:
        $txt = 'Campeón: <b>Barakaldo CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Barakaldo CF, CyD Leonesa, SD Compostela y Pontevedra CF</b><br />';
        $txt .= 'Promoción de Permanencia: <b>RS Gimnástica</b><br />';
        $txt .= 'Descenso: <b>Real Sporting B, Real Oviedo B, Caudal Deportivo y AD Universidad Oviedo</b><br />';
        break;

        case 341:
        $txt = 'Campeón: <b>FC Barcelona B</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>FC Barcelona B, RCD Espanyol B,  CD L´Hospitalet y Terrassa FC</b><br />';
        $txt .= 'Promoción de Permanencia: <b>SD Beasaín</b><br />';
        $txt .= 'Descenso: <b>Real Sociedad de Fútbol B, SD Éibar B, SD Huesca y CD Alfaro</b><br />';
        break;

        case 342:
        $txt = 'Campeón: <b>Real Madrid CF B</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Real Madrid CF B, Valencia CF B, Hércules CF y Getafe CF</b><br />';
        $txt .= 'Promoción de Permanencia: <b>AD Alcorcón</b><br />';
        $txt .= 'Descenso: <b>Benidorm CF, UD Vecindario, CD Onda y CD Mensajero</b><br />';
        break;

        case 343:
        $txt = 'Campeón: <b>Motril CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Motril CF, AD Ceuta, UD Almería y UD Mérida</b><br />';
        $txt .= 'Promoción de Permanencia: <b>UD Melilla</b><br />';
        $txt .= 'Descenso: <b>RB Linense, Dos Hermanas CF, CD San Fernando y Coria CF</b><br />';
        break;

        case 1687:
        $txt .= 'Asciende a Segunda A: <b>Terrassa FC</b><br />';
        break;

        case 1688:
        $txt .= 'Asciende a Segunda A: <b>SD Compostela</b><br />';
        break;

        case 1689:
        $txt .= 'Asciende a Segunda A: <b>Getafe CF</b><br />';
        break;

        case 1690:
        $txt .= 'Asciende a Segunda A: <b>UD Almería</b><br />';
        break;

        case 1788:
        $txt .= 'Desciende a Tercera: <b>SD Beasain</b><br />';
        break;

        case 344:
        $txt = 'Campeón: <b>SD Compostela B</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>SD Compostela B, Alondras CF, Betanzos CF y Club Lemos</b><br />';
        $txt .= 'Descenso: <b>CD Endesa As Pontes, Porriño Industrial FC y Gondomar CF</b><br />';
        break;

        case 353:
        $txt = 'Campeón: <b>UP Langreo</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>UP Langreo, Real Avilés Industrial, Club Siero y Ribadesella CF</b><br />';
        $txt .= 'Descenso: <b>CF Deportiva Piloñesa, Valdesoto CF y San Lázaro SD</b><br />';
        $txt .= '<hr />El CD San Martín descendió a Regional, por haber descendido el Real Sporting de Gijón B de Segunda B, y ser ambos filiales del Real Sporting de Gijón. <br />';
        break;

        case 354:
        $txt = 'Campeón: <b>SD Noja</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>SD Noja, Real Racing Club B, CD Tropezón y CD Bezana</b><br />';
        $txt .= 'Descenso: <b>CD Comillas, Ayrón CF y Santoña CF</b><br />';
        break;

        case 355:
        $txt = 'Campeón: <b>SD Lemona</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>SD Lemona, Sestao River Club, Zalla UC y SD Amorebieta</b><br />';
        $txt .= 'Descenso: <b>SD Zamudio, Real Unión Club B, Sodupe Unión Club, SD Salleko Lagunak, Zestoa KB y Anaitasuna FT</b><br />';
        break;

        case 356:
        $txt = 'Campeón: <b>Palamós CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Palamós CF, CF Gavà, CF Reus Deportiu y UE Sant Andreu</b><br />';
        $txt .= 'Descenso: <b>UE Cornellà, CE Júpiter y FC Andorra</b><br />';
        break;

        case 357:
        $txt = 'Campeón: <b>CD Burriana</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Burriana, Burjassot CF, UD Levante B y Villajoyosa CF</b><br />';
        $txt .= 'Descenso: <b>UD Vall d´Uixó, Pinoso CF y Atlético Denia</b><br />';
        break;

        case 358:
        $txt = 'Campeón: <b>UD San Sebastián Reyes</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>UD San Sebastián Reyes, Las Rozas CF, CDA Navalcarnero y CD Móstoles</b><br />';
        $txt .= 'Descenso: <b>AD Parla, Torrejón CF, CD Coslada, Atlético Valdemoro y Real Aranjuez CF</b><br />';
        break;

        case 359:
        $txt = 'Campeón: <b>Real Ávila CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Real Ávila CF, SD Gimnástica Segoviana, Real Valladolid CF B y CF Palencia</b><br />';
        $txt .= 'Descenso: <b>UD Santa Marta, AD Las Navas y CD Laguna</b><br />';
        $txt .= '<hr />El partido Palencia - Ávila (inicialmente 2-1) se  dio por perdido al Palencia por 0-3 por alineación indebida.<br />';
        break;

        case 360:
        $txt = 'Campeón: <b>CD Linares</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Linares, Málaga CF B, Torredonjimeno CF y CD Mármol Macael</b><br />';
        $txt .= 'Descenso: <b>UD San Pedro, Juventud Torremolinos, UD Maracena y CD Iliturgi</b><br />';
        break;

        case 345:
        $txt = 'Campeón: <b>CD Villanueva</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Villanueva, Jerez Industrial, Atlético Antoniano y RC Recreativo B</b><br />';
        $txt .= 'Descenso: <b>Racing Club Portuense, CD Pozoblanco, UD Tomares, CD San Roque y Recreativo Linense</b><br />';
        break;

        case 346:
        $txt = 'Campeón: <b>CD Atlético Baleares</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Atlético Baleares, CD Constancia, CF Villafranca y SCR PD Santa Eulalia</b><br />';
        $txt .= 'Descenso: <b>CF Sóller, CE España y CE Felanitx</b><br />';
        $txt .= '<hr />El Ferriolense quedó excluido de jugar la liguilla de ascenso, por militar en Segunda B el RCD Mallorca B y ser ambos filiales del RCD Mallorca. <br />';
        break;

        case 347:
        $txt = 'Campeón: <b>CD Corralejo</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Corralejo, Castillo CF, CD Villa Santa Brígida y UD Telde</b><br />';
        $txt .= 'Descenso: <b>CF Unión Carrizal, CD Maspalomas y SD Águilas Atlético</b><br />';
        break;

        case 348:
        $txt = 'Campeón: <b>Orihuela CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Orihuela CF, Yeclano CF, Águilas CF y Lorca CF</b><br />';
        $txt .= 'Descenso: <b>UD Horadada, Ceutí Atlético y CD Alquerías</b><br />';
        break;

        case 349:
        $txt = 'Campeón: <b>CP Cacereño</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CP Cacereño, CD Don Benito, Moralo CP y CF Villanovense</b><br />';
        $txt .= 'Descenso: <b>Imperio de Mérida, CP Moraleja y CD Calamonte</b><br />';
        break;

        case 350:
        $txt = 'Campeón: <b>CD Azkoyen</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Azkoyen, Peña Sport FC, CD Recreación y UCD Burladés</b><br />';
        $txt .= 'Descenso: <b>CD Agoncillo, CD Idoya y CD Pradejón</b><br />';
        break;

        case 351:
        $txt = 'Campeón: <b>UD Fraga</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>UD Fraga, CD Teruel, CD Zuera y CD Ebro</b><br />';
        $txt .= 'Descenso: <b>FC Lalueza, CD San Gregorio Arrabal, UD Alcampel y CD Altorricón</b><br />';
        break;

        case 352:
        $txt = 'Campeón: <b>Tomelloso CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Tomelloso CF, Albacete Balompié B, CP Villarrobledo y CD Quintanar del Rey</b><br />';
        $txt .= 'Descenso: <b>CD Piedrabuena, Sporting Cabanillas y UD Talavera</b><br />';
        break;

        case 1691:
        $txt .= 'Asciende a Segunda B: <b>Real Ávila CF</b><br />';
        break;

        case 1692:
        $txt .= 'Asciende a Segunda B: <b>Real Avilés Industrial</b><br />';
        break;

        case 1693:
        $txt .= 'Asciende a Segunda B: <b>Ribadesella CF</b><br />';
        break;

        case 1694:
        $txt .= 'Asciende a Segunda B: <b>UP Langreo</b><br />';
        break;

        case 1695:
        $txt .= 'Asciende a Segunda B: <b>SD Noja</b><br />';
        break;

        case 1696:
        $txt .= 'Asciende a Segunda B: <b>Real Racing Club B</b><br />';
        break;

        case 1697:
        $txt .= 'Asciende a Segunda B: <b>Peña Sport FC</b><br />';
        break;

        case 1698:
        $txt .= 'Asciende a Segunda B: <b>CD Azkoyen</b><br />';
        break;

        case 1699:
        $txt .= 'Asciende a Segunda B: <b>CF Gavà</b><br />';
        break;

        case 1700:
        $txt .= 'Asciende a Segunda B: <b>Palamós CF</b><br />';
        break;

        case 1701:
        $txt .= 'Asciende a Segunda B: <b>CF Reus Deportiu</b><br />';
        break;

        case 1702:
        $txt .= 'Asciende a Segunda B: <b>Levante UD B</b><br />';
        break;

        case 1703:
        $txt .= 'Asciende a Segunda B: <b>CP Cacereño</b><br />';
        break;

        case 1704:
        $txt .= 'Asciende a Segunda B: <b>CD Linares</b><br />';
        break;

        case 1705:
        $txt .= 'Asciende a Segunda B: <b>Torredonjimeno CF</b><br />';
        break;

        case 1706:
        $txt .= 'Asciende a Segunda B: <b>Moralo CP</b><br />';
        break;

        case 1707:
        $txt .= 'Asciende a Segunda B: <b>CD Corralejo</b><br />';

        break;

        case 361:
        $txt = 'Campeón: <b>Real Madrid CF</b><br />';
        $txt .= 'Copa de Europa: <b>Real Madrid CF, RC Deportivo, RCD Mallorca y FC Barcelona</b><br />';
        $txt .= 'Copa de la UEFA: <b>Valencia CF y RC Celta</b><br />';
        $txt .= 'Descenso a Segunda: <b>Real Oviedo, Real Racing Club y CD Numancia</b><br />';
        break;

        case 362:
        $txt = 'Campeón: <b>Sevilla</b><br />';
        $txt .= 'Ascenso a Primera: <b>Sevilla, Betis y Tenerife</b><br />';
        $txt .= 'Descenso a Segunda B: <b>Compostela, Univ. Las Palmas, Getafe y Lleida</b><br />';
        break;

        case 363:
        $txt = 'Campeón: <b>Atlético de Madrid B</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Atlético de Madrid B, CD Ourense, Zamora CF y CD Toledo</b><br />';
        $txt .= 'Promoción de Permanencia: <b>CF Fuenlabrada</b><br />';
        $txt .= 'Descenso: <b>Club Siero, UD San Sebastián Reyes, Real Ávila CF y RC Deportivo B</b><br />';
        $txt .= '<hr />El partido Vecindario - R. Madrid B, inicialmente 0-0, fue dado por perdido al R. Madrid B por el resultado de 3-0, por alineación indebida. <br />';
        break;

        case 364:
        $txt = 'Campeón: <b>Burgos CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Burgos CF, CyD Leonesa, CD  Calahorra y Amurrio Club</b><br />';
        $txt .= 'Promoción de Permanencia: <b>CD Binéfar</b><br />';
        $txt .= 'Descenso: <b>Real Racing Club B, Peña Sport FC, CD Tropezón y UDC Chantrea</b><br />';
        break;

        case 365:
        $txt = 'Campeón: <b>UDA Gramanet-Milán</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>UDA Gramanet-Milán, Gimnàstic de Tarragona, CE Sabadell FC y RCD Espanyol B</b><br />';
        $txt .= 'Promoción de Permanencia: <b>UB Conquense</b><br />';
        $txt .= 'Descenso: <b>CD Burriana, UD Alzira, CF Gandía y CE Premià</b><br />';
        break;

        case 366:
        $txt = 'Campeón: <b>Cádiz CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Cádiz CF, CP Ejido, Xerez CD y AD Ceuta</b><br />';
        $txt .= 'Promoción de Permanencia: <b>Algeciras CF</b><br />';
        $txt .= 'Descenso: <b>Guadix CF, CD Linares y CD Don Benito</b><br />';

        break;

        case 1459:
        $txt .= 'Asciende a Segunda A: <b>Burgos CF</b><br />';
        break;

        case 1460:
        $txt .= 'Asciende a Segunda A: <b>CP Ejido</b><br />';
        break;

        case 1461:
        $txt .= 'Asciende a Segunda A: <b>Gimnàstic de Tarragona</b><br />';
        break;

        case 1462:
        $txt .= 'Asciende a Segunda A: <b>Xerez CD</b><br />';
        break;

        case 1793:
        $txt .= 'Desciende a Tercera: <b>CF Fuenlabrada</b><br />';
        break;

        case 367:
        $txt = 'Campeón: <b>RC Celta B</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>RC Celta B, CD Endesa As Pontes, Ponte Ourense CF y UD Xove Lago</b><br />';
        $txt .= 'Descenso: <b>Malpica SCD, Sporting Pontenova y break;

		caselas CF</b><br />';
        break;

        case 376:
        $txt = 'Campeón: <b>Club Marino</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Club Marino, Real Oviedo B, UP Langreo y CD Lealtad</b><br />';
        $txt .= 'Descenso: <b>CD Trasona, CD Tuilla y CD Covadonga</b><br />';
        break;

        case 377:
        $txt = 'Campeón: <b>SD Noja</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>SD Noja, CD Laredo, SD Textil Escudo y CD Bezana</b><br />';
        $txt .= 'Descenso: <b>CyD Guarnizo, CD Naval, SD Revilla y SD Villaescusa</b><br />';
        break;

        case 378:
        $txt = 'Campeón: <b>SD Lemona</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>SD Lemona, Real Sociedad de Fútbol B, Sestao River Club y CD Aurrera Ondarroa </b><br />';
        $txt .= 'Descenso: <b>CD Hernani, Bergara KE y CD Lagún Onak</b><br />';
        break;

        case 379:
        $txt = 'Campeón: <b>CF Gavà</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CF Gavà, CF Balaguer, CE Europa y Palamós CF</b><br />';
        $txt .= 'Descenso: <b>CD Tortosa, FC Santboià, Vilobí CF y CD Banyoles</b><br />';
        break;

        case 380:
        $txt = 'Campeón: <b>Alicante CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Alicante CF, Valencia CF B, CD Onda y Pego CF</b><br />';
        $txt .= 'Descenso: <b>CD Denia, Foyos CD y CD Buñol</b><br />';
        break;

        case 381:
        $txt = 'Campeón: <b>CF Rayo Majadahonda</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CF Rayo Majadahonda, Las Rozas CF, CD Móstoles y RSD Alcalá</b><br />';
        $txt .= 'Descenso: <b>CD Colonia Moscardó, Getafe CF B, Atlético Aviación y CA Cercedilla</b><br />';
        $txt .= '<hr />El Real Madrid C quedó excluido de jugar la liguilla de ascenso por militar en Segunda B el Real Madrid B y ser ambos filiales del Real Madrid.<br />';
        break;

        case 382:
        $txt = 'Campeón: <b>CF Palencia</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CF Palencia, Real Valladolid CF B, UD Salamanca B y SD Gimnástica Segoviana</b><br />';
        $txt .= 'Descenso: <b>CF Venta de Baños, Atlético Astorga FC, Arandina CF y Racing Lermeño CF</b><br />';
        break;

        case 383:
        $txt = 'Campeón: <b>UD Marbella</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>UD Marbella, Málaga CF B, Torredonjimeno CF y CP Granada 74</b><br />';
        $txt .= 'Descenso: <b>CD Imperio Albolote, CD Los Boliches y UD Fuengirola</b><br />';
        break;

        case 368:
        $txt = 'Campeón: <b>Sevilla FC B</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Sevilla FC B, Real Betis Balompié B, Atlético Lucentino Industrial y Atlético Sanluqueño</b><br />';
        $txt .= 'Descenso: <b>Chiclana CF, La Palma CF y Serrallo CF</b><br />';
        break;

        case 369:
        $txt = 'Campeón: <b>CD Atlético Baleares</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Atlético Baleares, CF Villafranca, CD Manacor y CD Constancia</b><br />';
        $txt .= 'Descenso: <b>Atlètic Ciutadella, CA Montaura y CF Pollença</b><br />';
        $txt .= '<hr />El Ferriolense quedó excluido de jugar la liguilla de ascenso, por militar en Segunda B el RCD Mallorca B y ser ambos filiales del RCD Mallorca. <br />';
        break;

        case 370:
        $txt = 'Campeón: <b>UD Lanzarote</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>UD Lanzarote, SD Tenisca, UD Las Palmas B y CD San Isidro</b><br />';
        $txt .= 'Descenso: <b>UD Orotava, CD Doramas y UD Realejos</b><br />';
        break;

        case 371:
        $txt = 'Campeón: <b>CF Ciudad de Murcia </b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CF Ciudad de Murcia, Orihuela CF, Yeclano CF y Lorca CF</b><br />';
        $txt .= 'Descenso: <b>Olímpico de Totana, CDR Orenés-Alhameño, CD Cieza, Pinatar CF EMF y CD Lumbreras</b><br />';
        break;

        case 372:
        $txt = 'Campeón: <b>CD Díter Zafra</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Díter Zafra, CP Mérida B, UP Plasencia y CP Cacereño</b><br />';
        $txt .= 'Descenso: <b>CD Grabasa Burguillos, Sanvicenteño FC y CD Castuera</b><br />';
        break;

        case 373:
        $txt = 'Campeón: <b>CD Logroñés</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Logroñés, CD Mirandés, CD Alfaro y CD Izarra</b><br />';
        $txt .= 'Descenso: <b>Atlético Artajonés, CD Arnedo y CCyD Alberite</b><br />';

        break;

        case 374:
        $txt = 'Campeón: <b>CD Teruel</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Teruel, CF Figueruelas, UD Fraga y SD Huesca</b><br />';
        $txt .= 'Descenso: <b>SD Ejea, CF Jacetano, CJD Peralta y CDJ Tamarite</b><br />';
        $txt .= '<hr />El Alcampel figura con tres puntos menos por sanción federativa. <br />';
        break;

        case 375:
        $txt = 'Campeón: <b>CD Quintanar del Rey </b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Quintanar del Rey, CP Villarrobledo, Hellín Deportivo y CD Cuenca</b><br />';
        $txt .= 'Descenso: <b>AD Campillo, UD Socuéllamos y CD Bolañego</b><br />';
        break;

        case 1637:
        $txt .= 'Asciende a Segunda B: <b>Real Oviedo B</b><br />';
        break;

        case 1641:
        $txt .= 'Asciende a Segunda B: <b>RC Celta B</b><br />';
        break;

        case 1645:
        $txt .= 'Asciende a Segunda B: <b>RSD Alcalá</b><br />';
        break;

        case 1649:
        $txt .= 'Asciende a Segunda B: <b>Club Marino</b><br />';
        break;

        case 1638:
        $txt .= 'Asciende a Segunda B: <b>CD Logroñés</b><br />';
        break;

        case 1642:
        $txt .= 'Asciende a Segunda B: <b>Real Sociedad de Fútbol B</b><br />';
        break;

        case 1646:
        $txt .= 'Asciende a Segunda B: <b>CD Alfaro</b><br />';
        break;

        case 1650:
        $txt .= 'Asciende a Segunda B: <b>SD Huesca</b><br />';
        break;

        case 1639:
        $txt .= 'Asciende a Segunda B: <b>Alicante CF</b><br />';
        break;

        case 1643:
        $txt .= 'Asciende a Segunda B: <b>Valencia CF B</b><br />';
        break;

        case 1647:
        $txt .= 'Asciende a Segunda B: <b>CF Ciudad de Murcia</b><br />';
        break;

        case 1651:
        $txt .= 'Asciende a Segunda B: <b>CD Onda</b><br />';
        break;

        case 1640:
        $txt .= 'Asciende a Segunda B: <b>CP Mérida B</b><br />';
        break;

        case 1644:
        $txt .= 'Asciende a Segunda B: <b>Real Betis Balompié B</b><br />';
        break;

        case 1648:
        $txt .= 'Asciende a Segunda B: <b>Sevilla FC B</b><br />';
        break;

        case 1652:
        $txt .= 'Asciende a Segunda B: <b>CD Diter Zafra</b><br />';
        break;

        case 1653:
        $txt .= 'Asciende a Segunda B: <b>UD Lanzarote</b><br />';

        break;

        case 384:
        $txt = 'Campeón: <b>RC Deportivo</b><br />';
        $txt .= 'Copa de Europa: <b>RC Deportivo, FC Barcelona, Valencia CF y Real Madrid CF</b><br />';
        $txt .= 'Copa de la UEFA: <b>Real Zaragoza, Deportivo Alavés y Rayo Vallecano</b><br />';
        $txt .= 'Intertoto: <b>RC Celta y RCD Mallorca</b><br />';
        $txt .= 'Descenso a Segunda: <b>Real Betis Balompié, Club Atlético de Madrid y Sevilla FC</b><br />';
        break;

        case 385:
        $txt = 'Campeón: <b>UD Las Palmas</b><br />';
        $txt .= 'Ascenso a Primera: <b>UD Las Palmas, Club Atlético Osasuna y Villarreal CF</b><br />';
        $txt .= 'Descenso a Segunda B: <b>Getafe CF, CD Logroñés, RC Recreativo y CD Toledo</b><br />';
        $txt .= '<hr />El Atlético de Madrid B se vio obligado a descender a Segunda B por descender de Primera el Atlético de Madrid, del que era filial.<br />';
        break;

        case 386:
        $txt = 'Campeón: <b>Universidad LPGC</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Universidad LPGC, CD Ourense, Racing Club Ferrol y CD Mensajero</b><br />';
        $txt .= 'Promoción de Permanencia: <b>Real Avilés Industrial</b><br />';
        $txt .= 'Descenso: <b>UD Lanzarote, Real Oviedo B, SD Gimnástica Segoviana y CD Móstoles</b><br />';
        break;

        case 387:
        $txt = 'Campeón: <b>RS Gimnástica</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>RS Gimnástica, Real Zaragoza B, Burgos CF y Barakaldo CF</b><br />';
        $txt .= 'Promoción de Permanencia: <b>Real Unión Club</b><br />';
        $txt .= 'Descenso: <b>Club Bermeo, Real Valladolid CF B, CF Figueruelas y CD Izarra</b><br />';
        $txt .= '<hr />El partido Beasaín - Conquense, incialmente 1-0, se dio por perdido por 3-0 al Conquense por alineación indebida. <br />';
        break;

        case 388:
        $txt = 'Campeón: <b>CF Gandía</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CF Gandía, Real Murcia CF, UDA Gramanet-Milán y Hércules CF</b><br />';
        $txt .= 'Promoción de Permanencia: <b>Novelda CF</b><br />';
        $txt .= 'Descenso: <b>Valencia CF B, Yeclano CF, Ontinyent CF y Lorca CF</b><br />';
        break;

        case 389:
        $txt = 'Campeón: <b>Granada CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Granada CF, AD Ceuta, Xerez CD y Real Jaén CF</b><br />';
        $txt .= 'Promoción de Permanencia: <b>Talavera CF</b><br />';
        $txt .= 'Descenso: <b>Real Betis Balompié B, CP Cacereño, Sevilla FC B y Águilas CF</b><br />';
        break;

        case 1455:
        $txt .= 'Asciende a Segunda A: <b>Universidad LPGC</b><br />';
        break;

        case 1456:
        $txt .= 'Asciende a Segunda A: <b>Real Jaén CF </b><br />';
        break;

        case 1457:
        $txt .= 'Asciende a Segunda A: <b>Racing Club Ferrol</b><br />';
        break;

        case 1458:
        $txt .= 'Asciende a Segunda A: <b>Real Murcia CF</b><br />';
        break;

        case 1786:
        $txt .= 'Desciende a Tercera: <b>Real Avilés Industrial</b><br />';
        break;

        case 390:
        $txt = 'Campeón: <b>RC Celta B</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>RC Celta B, RC Deportivo B, UD Xove Lago y CD Lalín</b><br />';
        $txt .= 'Descenso: <b>Arosa SC, Villalonga FC y CD Ourense B</b><br />';

        break;

        case 399:
        $txt = 'Campeón: <b>CD Lealtad</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Lealtad, Club Siero, Club Marino y AD Universidad Oviedo </b><br />';
        $txt .= 'Descenso: <b>UD Gijón Industrial, SD Narcea y Andés CF</b><br />';

        break;

        case 400:
        $txt = 'Campeón: <b>SD Noja</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>SD Noja, CD Tropezón, Real Racing Club B y CD Miengo</b><br />';
        $txt .= 'Descenso: <b>CD Comillas, Marina Cudeyo CF y Ampuero FC</b><br />';
        break;

        case 401:
        $txt = 'Campeón: <b>Real Sociedad de Fútbol B</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Real Sociedad de Fútbol B, SD Lemona, Arenas Club y SD Éibar B</b><br />';
        $txt .= 'Descenso: <b>CD Elgóibar, CD Santurtzi y Tolosa CF</b><br />';
        break;

        case 402:
        $txt = 'Campeón: <b>CF Balaguer</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CF Balaguer, RCD Espanyol B, CE Mataró y UE Cornellà</b><br />';
        $txt .= 'Descenso: <b>CF Badalona, UA Horta y UE Vic</b><br />';
        break;

        case 403:
        $txt = 'Campeón: <b>CD Onda</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Onda, CD Burriana, Benidorm CD y Alicante CF</b><br />';
        $txt .= 'Descenso: <b>CDA San Marcelino, CD Olímpic y CD Pobla Llarga</b><br />';
        $txt .= '<hr />El partido Pobla Llarga - Alicante, inicialmente 2-0, fue dado por perdido al Pobla Llarga por 0-3 por alineación indebida.<br />';
        break;

        case 404:
        $txt = 'Campeón: <b>CD Coslada</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Coslada, DAV Santa Ana, RSD Alcalá y AD Alcorcón</b><br />';
        $txt .= 'Descenso: <b>AD Colmenar, RCD Carabanchel y AD Villaviciosa de Odón</b><br />';
        $txt .= '<hr />El Real Madrid C fue excluido de jugar la Liguilla de ascenso, por militar en Segunda B el Real Madrid B y ser ambos filiales del Real Madrid.<br />';
        break;

        case 405:
        $txt = 'Campeón: <b>UD Salamanca B</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>UD Salamanca B, La Bañeza FC, Atlético Bembibre y CD Béjar Industrial</b><br />';
        $txt .= 'Descenso: <b>CD Boecillo, SD Almazán, Betis CF, Cuéllar CF y Garray CF</b><br />';
        break;

        case 406:
        $txt = 'Campeón: <b>CP Ejido</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CP Ejido, CD Linares, UD Maracena y Almería CF</b><br />';
        $txt .= 'Descenso: <b>Martos CD, Atlético Mancha Real y UD San Isidro</b><br />';

        break;

        case 391:
        $txt = 'Campeón: <b>Algeciras CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Algeciras CF, CD San Fernando, Puerto Real CF y Racing Club Portuense</b><br />';
        $txt .= 'Descenso: <b>Viña Verde Montilla, CD Rota y AD Ceuta B</b><br />';
        break;

        case 392:
        $txt = 'Campeón: <b>CD Atlético Baleares</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Atlético Baleares, CD Constancia, CD Manacor y SCR PD Santa Eulalia</b><br />';
        $txt .= 'Descenso: <b>CD Felanitx, CD Génova y UD Arenal</b><br />';
        break;

        case 393:
        $txt = 'Campeón: <b>UD Las Palmas B</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>UD Las Palmas B, UD Orotava, UD Vecindario y Castillo CF</b><br />';
        $txt .= 'Descenso: <b>CD Puerto Cruz, UD Icodense y CD Maspalomas</b><br />';

        break;

        case 394:
        $txt = 'Campeón: <b>Olímpico de Totana</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Olímpico de Totana, UD Horadada, AD Mar Menor y Orihuela CF</b><br />';
        $txt .= 'Descenso: <b>Atlético Abarán, Muleño CF, Ceutí Atlético y CD Beniel</b><br />';
        break;

        case 395:
        $txt = 'Campeón: <b>CP Mérida B</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CP Mérida B, CD Don Benito, UP Plasencia y CF Villanovense</b><br />';
        $txt .= 'Descenso: <b>Olivenza CP, CP Guareña y CP Gran Maestre</b><br />';
        $txt .= '<hr />El CP Cacereño B se vio obligado a descender a Regional, por ser filial del CP Cacereño, que descendió de Segunda B. <br />';
        break;

        case 396:
        $txt = 'Campeón: <b>Peña Sport FC</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Peña Sport FC, UDC Chantrea, CD Mirandés y CD Logroñés B</b><br />';
        $txt .= 'Descenso: <b>AD San Juan, CD Huarte y CD Baztán</b><br />';
        break;

        case 397:
        $txt = 'Campeón: <b>UD Fraga</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>UD Fraga, SD Huesca, CD Endesa Andorra y UD Barbastro</b><br />';
        $txt .= 'Descenso: <b>Atlético Monzalbarba, CF Illueca, Alcañiz CF y CD Maella</b><br />';
        break;

        case 398:
        $txt = 'Campeón: <b>UD Puertollano</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>UD Puertollano, Albacete Balompié B, CP Villarrobledo y AD Torpedo 66</b><br />';
        $txt .= 'Descenso: <b>CD Sigüenza, CD Toledo B y CF La Solana</b><br />';

        break;

        case 1620:
        $txt .= 'Asciende a Segunda B: <b>RC Deportivo B</b><br />';
        break;

        case 1624:
        $txt .= 'Asciende a Segunda B: <b>AD Universidad Oviedo</b><br />';
        break;

        case 1628:
        $txt .= 'Asciende a Segunda B: <b>AD Alcorcón</b><br />';
        break;

        case 1632:
        $txt .= 'Asciende a Segunda B: <b>Club Siero</b><br />';
        break;

        case 1621:
        $txt .= 'Asciende a Segunda B: <b>Real Racing Club B</b><br />';
        break;

        case 1625:
        $txt .= 'Asciende a Segunda B: <b>SD Eibar B</b><br />';
        break;

        case 1629:
        $txt .= 'Asciende a Segunda B: <b>CD Tropezón</b><br />';
        break;

        case 1633:
        $txt .= 'Asciende a Segunda B: <b>Peña Sport FC</b><br />';
        break;

        case 1622:
        $txt .= 'Asciende a Segunda B: <b>Benidorm CD</b><br />';
        break;

        case 1626:
        $txt .= 'Asciende a Segunda B: <b>RCD Espanyol B</b><br />';
        break;

        case 1630:
        $txt .= 'Asciende a Segunda B: <b>CE Mataró</b><br />';
        break;

        case 1634:
        $txt .= 'Asciende a Segunda B: <b>CD Burriana</b><br />';
        break;

        case 1623:
        $txt .= 'Asciende a Segunda B: <b>CP Ejido</b><br />';
        break;

        case 1627:
        $txt .= 'Asciende a Segunda B: <b>CD Linares</b><br />';
        break;

        case 1631:
        $txt .= 'Asciende a Segunda B: <b>Algeciras CF</b><br />';
        break;

        case 1635:
        $txt .= 'Asciende a Segunda B: <b>Almería CF</b><br />';
        break;

        case 1636:
        $txt .= 'Asciende a Segunda B: <b>UD Vecindario</b><br />';

        break;

        case 407:
        $txt = 'Campeón: <b>FC Barcelona</b><br />';
        $txt .= 'Copa de Europa: <b>C Barcelona, Real Madrid CF, RCD Mallorca y Valencia CF</b><br />';
        $txt .= 'Copa de la UEFA: <b>RC Celta y RC Deportivo</b><br />';
        $txt .= 'Intertoto: <b>RCD Espanyol</b><br />';
        $txt .= 'Promoción de Descenso a Segunda: <b>CF Extremadura y Villarreal CF</b><br />';
        $txt .= 'Descenso a Segunda: <b>CD Tenerife y UD Salamanca</b><br />';
        break;

        case 408:
        $txt = 'Campeón: <b>Málaga CF</b><br />';
        $txt .= 'Ascenso a Primera: <b>Málaga CF y CD Numancia</b><br />';
        $txt .= 'Promoción de Ascenso a Primera: <b>Sevilla FC y Rayo Vallecano</b><br />';
        $txt .= 'Descenso a Segunda B: <b>RCD Mallorca B, FC Barcelona B, Hércules CF y CD Ourense</b><br />';
        break;

        case 1783:
        $txt .= 'Ascienden a Primera: <b>Sevilla CF y Rayo Vallecano</b><br />';
        $txt .= 'Descienden a Segunda: <b>CF Extremadura y Villarreal CF</b><br />';

        break;

        case 409:
        $txt = 'Campeón: <b>Getafe CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Getafe CF, Universidad LPGC, Real Madrid CF B y Racing Club Ferrol</b><br />';
        $txt .= 'Promoción de Permanencia: <b>Caudal Deportivo</b><br />';
        $txt .= 'Descenso: <b>RC Deportivo B, UP Langreo, CD Lalín y CD Lealtad</b><br />';
        break;

        case 410:
        $txt = 'Campeón: <b>CyD Leonesa</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CyD Leonesa, Club Bermeo, Barakaldo CF y Burgos CF</b><br />';
        $txt .= 'Promoción de Permanencia: <b>CD Aurrera Vitoria</b><br />';
        $txt .= 'Descenso: <b>SD Noja, SD Lemona, CD Tropezón y CD Elgóibar</b><br />';
        break;

        case 411:
        $txt = 'Campeón: <b>Levante UD</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Levante UD, Cartagonova FC, Elche CF y Real Murcia CF</b><br />';
        $txt .= 'Promoción de Permanencia: <b>Gimnàstic de Tarragona</b><br />';
        $txt .= 'Descenso: <b>RCD Espanyol B, Benidorm CD, Palamós CF y CF Gavà</b><br />';
        break;

        case 412:
        $txt = 'Campeón: <b>UD Melilla</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>UD Melilla, Sevilla FC B, Córdoba CF y Polideportivo Almería</b><br />';
        $txt .= 'Promoción de Permanencia: <b>Algeciras CF</b><br />';
        $txt .= 'Descenso: <b>UP Plasencia, Almería CF, Moralo CP y Isla Cristina CD</b><br />';
        break;

        case 1451:
        $txt .= 'Asciende a Segunda A: <b>Elche CF</b><br />';
        break;

        case 1452:
        $txt .= 'Asciende a Segunda A: <b>Getafe CF</b><br />';
        break;

        case 1453:
        $txt .= 'Asciende a Segunda A: <b>Levante UD</b><br />';
        break;

        case 1454:
        $txt .= 'Asciende a Segunda A: <b>Córdoba CF</b><br />';
        break;

        case 1784:
        $txt .= 'Desciende a Tercera: <b>Algeciras CF</b><br />';
        break;

        case 413:
        $txt = 'Campeón: <b>Porriño Industrial FC</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Porriño Industrial FC, RC Celta B, CCD Cerceda y Viveiro FC</b><br />';
        $txt .= 'Descenso: <b>break;

		caselas CF, Atlético Arteixo, Gran Peña FC, Club Xuventú Sanxenxo y UD Somozas</b><br />';
        break;

        case 422:
        $txt = 'Campeón: <b>Club Marino</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Club Marino, Club Siero, Navia CF y Real Titánico</b><br />';
        $txt .= 'Descenso: <b>Club Europa de Nava, Candás CF, CD Covadonga, Pumarín CF y CD Trasona</b><br />';
        break;

        case 423:
        $txt = 'Campeón: <b>Real Racing Club B</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Real Racing Club B, UM Escobedo, Ribamontán al Mar CF y CD Bezana</b><br />';
        $txt .= 'Descenso: <b>Castro FC, SD Unión Club, SD Villaescusa, Ayrón CF y CD Pontejos</b><br />';
        break;

        case 424:
        $txt = 'Campeón: <b>Real Sociedad de Fútbol B</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Real Sociedad de Fútbol B, Deportivo Alavés B, Real Unión Club y Zalla UC</b><br />';
        $txt .= 'Descenso: <b>CD Touring, SD Zamudio y CD Alegría</b><br />';
        break;

        case 425:
        $txt = 'Campeón: <b>AEC Manlleu</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>AEC Manlleu, CE Premià, CE Europa y CE Mataró</b><br />';
        $txt .= 'Descenso: <b>FC Andorra, FC Santboià, UE Sant Andreu y FC Vilafranca</b><br />';
        $txt .= '<hr />El UE Vilassar de Mar se vio obligado a descender a Regional, por descender de Segunda B el RCD Espanyol B y ser ambos filiales del RCD Espanyol.<br />';
        break;

        case 426:
        $txt = 'Campeón: <b>Elche CF B</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Elche CF B, Novelda CF, CD Alcoyano y UD Alzira</b><br />';
        $txt .= 'Descenso: <b>SD Sueca, CD Utiel y FC Torrevieja</b><br />';
        break;

        case 427:
        $txt = 'Campeón: <b>Real Madrid CF C</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Real Madrid CF C, CD Leganés B, CD Coslada y CP Amorós CF</b><br />';
        $txt .= 'Descenso: <b>AD Parla, CD San Fernando, CF Rayo Majadahonda y Aravaca CF</b><br />';
        break;

        case 428:
        $txt = 'Campeón: <b>Zamora CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Zamora CF, SD Gimnástica Segoviana, SD Ponferradina y Real Ávila CF</b><br />';
        $txt .= 'Descenso: <b>CF Endesa Ponferrada, Hullera Vasco Leonesa  y RCD Ríbert</b><br />';
        break;

        case 429:
        $txt = 'Campeón: <b>Málaga CF B</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Málaga CF B, CP Ejido, Guadix CF y UD Maracena</b><br />';
        $txt .= 'Descenso: <b>CD Mármol Macael, Arenas de Armilla CyD, CD Ronda, Baeza CF y CD Imperio Albolote</b><br />';
        break;

        case 414:
        $txt = 'Campeón: <b>RB Linense</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>RB Linense, Dos Hermanas CF, Coria CF y CD San Fernando</b><br />';
        $txt .= 'Descenso: <b>CD Utrera, CD San Roque y Serrallo CF</b><br />';
        $txt .= '<hr />El Serrallo figura con tres puntos de sanción por alineación indebida. <br />';
        break;

        case 415:
        $txt = 'Campeón: <b>CD Constancia</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Constancia, UD Poblense, CD Ferriolense y CD Atlético Baleares</b><br />';
        $txt .= 'Descenso: <b>CD Soledad, CD Andraitx y CD Ferreríes</b><br />';
        break;

        case 416:
        $txt = 'Campeón: <b>UD Las Palmas B</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>UD Las Palmas B, UD Orotava, UD Lanzarote y UD Telde</b><br />';
        $txt .= 'Descenso: <b>CF Unión Carrizal, Atlético Arona y UD Esperanza</b><br />';
        break;

        case 417:
        $txt = 'Campeón: <b>Orihuela CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Orihuela CF, Lorca CF, AD Mar Menor y UD Horadada</b><br />';
        $txt .= 'Descenso: <b>CF Santomera, Blanca CF y CF Imperial Murcia</b><br />';

        break;

        case 418:
        $txt = 'Campeón: <b>CD Grabasa Burguillos</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Grabasa Burguillos, SP Villafranca, CD Don Benito y CP Mérida B</b><br />';
        $txt .= 'Descenso: <b>CD Guadiana, CP Valencia Alcántara y CP Cabezuela</b><br />';
        $txt .= 'El partido Villanueva - Cabezuela no llegó a disputarse, siendo sancionado el Cabezuela con la pérdida de dos puntos por incomparecencia al mismo.<br />';
        break;

        case 419:
        $txt = 'Campeón: <b>Peña Sport FC</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Peña Sport FC, CD Azkoyen, CD Izarra y CD Logroñés B</b><br />';
        $txt .= 'Descenso: <b>CD Berceo, CD Murchante y CF Rapid</b><br />';
        break;

        case 420:
        $txt = 'Campeón: <b>CD Endesa Andorra</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Endesa Andorra, UD break;

		casetas, CF Figueruelas y UD Barbastro</b><br />';
        $txt .= 'Descenso: <b>CDJ Tamarite, CD Zuera, CD Endesa Escatrón y Atlético de Monzón</b><br />';
        break;

        case 421:
        $txt = 'Campeón: <b>Tomelloso CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Tomelloso CF, CD Guadalajara, Hellín Deportivo y Albacete Balompié B</b><br />';
        $txt .= 'Descenso: <b>CF Belmonte, UD Talavera y Atlético Teresiano</b><br />';
        break;

        case 1603:
        $txt .= 'Asciende a Segunda B: <b>Real Ávila CF</b><br />';
        break;

        case 1607:
        $txt .= 'Asciende a Segunda B: <b>SD Ponferradina</b><br />';
        break;

        case 1611:
        $txt .= 'Asciende a Segunda B: <b>SD Gimnástica Segoviana </b><br />';
        break;

        case 1615:
        $txt .= 'Asciende a Segunda B: <b>Zamora CF</b><br />';
        break;

        case 1604:
        $txt .= 'Asciende a Segunda B: <b>CF Figueruelas</b><br />';
        break;

        case 1608:
        $txt .= 'Asciende a Segunda B: <b>CD Izarra</b><br />';
        break;

        case 1612:
        $txt .= 'Asciende a Segunda B: <b>Deportivo Alavés B</b><br />';
        break;

        case 1616:
        $txt .= 'Asciende a Segunda B: <b>Real Unión Club</b><br />';
        break;

        case 1605:
        $txt .= 'Asciende a Segunda B: <b>Lorca CF</b><br />';
        break;

        case 1609:
        $txt .= 'Asciende a Segunda B: <b>CE Premià</b><br />';
        break;

        case 1613:
        $txt .= 'Asciende a Segunda B: <b>UD Alzira</b><br />';
        break;

        case 1617:
        $txt .= 'Asciende a Segunda B: <b>Novelda CF</b><br />';
        break;

        case 1606:
        $txt .= 'Asciende a Segunda B: <b>Dos Hermanas CF</b><br />';
        break;

        case 1610:
        $txt .= 'Asciende a Segunda B: <b>Coria CF</b><br />';
        break;

        case 1614:
        $txt .= 'Asciende a Segunda B: <b>Guadix CF </b><br />';
        break;

        case 1618:
        $txt .= 'Asciende a Segunda B: <b>RB Linense</b><br />';
        break;

        case 1619:
        $txt .= 'Asciende a Segunda B: <b>UD Lanzarote</b><br />';

        break;

        case 430:
        $txt = 'Campeón: <b>FC Barcelona</b><br />';
        $txt .= 'Copa de Europa: <b>FC Barcelona y Athletic Club</b><br />';
        $txt .= 'Recopa de Europa: <b>RCD Mallorca</b><br />';
        $txt .= 'Copa de la UEFA: <b>Real Sociedad de Fútbol, RC Celta, Club Atlético de Madrid y Real Betis Balompié</b><br />';
        $txt .= 'Intertoto: <b>Valencia CF y RCD Espanyol</b><br />';
        $txt .= 'Promoción de Descenso a Segunda: <b>SD Compostela y Real Oviedo</b><br />';
        $txt .= 'Descenso a Segunda: <b>CP Mérida y Real Sporting de Gijón</b><br />';

        break;

        case 431:
        $txt = 'Campeón: <b>Deportivo Alavés</b><br />';
        $txt .= 'Ascenso a Primera: <b>Deportivo Alavés y CF Extremadura</b><br />';
        $txt .= 'Promoción de Ascenso a Primera: <b>UD Las Palmas y Villarreal CF</b><br />';
        $txt .= 'Descenso a Segunda B: <b>Elche CF, Real Jaén CF, Xerez CD y Levante UD</b><br />';
        break;

        case 1781:
        $txt .= 'Asciende a Primera: <b>Villarreal CF</b><br />';
        $txt .= 'Permanece en Primera: <b>Real Oviedo</b><br />';
        $txt .= 'Desciende a Segunda: <b>SD Compostela</b><br />';
        $txt .= 'Permanece en Segunda: <b>UD Las Palmas</b><br />';

        break;

        case 432:
        $txt = 'Campeón: <b>CP Cacereño</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CP Cacereño, Real Madrid CF B, RC Deportivo B y Talavera CF</b><br />';
        $txt .= 'Promoción de Permanencia: <b>Real Avilés Industrial</b><br />';
        $txt .= 'Descenso: <b>CD Endesa As Pontes, CF Rayo Majadahonda, RCD Carabanchel y CD Leganés B</b><br />';
        break;

        case 433:
        $txt = 'Campeón: <b>Barakaldo CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Barakaldo CF, Athletic Club B, SD Beasaín y CyD Leonesa</b><br />';
        $txt .= 'Promoción de Permanencia: <b>Zamora CF</b><br />';
        $txt .= 'Descenso: <b>Real Racing Club B, Real Unión Club, CD Izarra y CD Endesa Andorra</b><br />';
        break;

        case 434:
        $txt = 'Campeón: <b>FC Barcelona B</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>FC Barcelona B, Terrassa FC, RCD Mallorca B y RCD Espanyol B</b><br />';
        $txt .= 'Promoción de Permanencia: <b>CD Mensajero</b><br />';
        $txt .= 'Descenso: <b>UD Gáldar, Novelda CF, CF Sóller y FC Andorra</b><br />';
        break;

        case 435:
        $txt = 'Campeón: <b>Málaga CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Málaga CF, RC Recreativo, Cádiz CF y Granada CF</b><br />';
        $txt .= 'Promoción de Permanencia: <b>Motril CF</b><br />';
        $txt .= 'Descenso: <b>Lorca CF, UD San Pedro, Guadix CF y AD Mar Menor</b><br />';

        break;

        case 1447:
        $txt .= 'Asciende a Segunda A: <b>Málaga CF</b><br />';
        break;

        case 1448:
        $txt .= 'Asciende a Segunda A: <b>RCD Mallorca B</b><br />';
        break;

        case 1449:
        $txt .= 'Asciende a Segunda A: <b>FC Barcelona B</b><br />';
        break;

        case 1450:
        $txt .= 'Asciende a Segunda A: <b>RC Recreativo</b><br />';
        break;

        case 1782:
        $txt .= 'Desciende a Tercera: <b>Zamora CF</b><br />';

        break;

        case 436:
        $txt = 'Campeón: <b>SD Compostela B</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>SD Compostela B, CD Lalín, RC Celta B y Betanzos CF</b><br />';
        $txt .= 'Descenso: <b>CD Estradense, Imperator Oar CF, Laracha CF y Juventud Cambados</b><br />';
        break;

        case 445:
        $txt = 'Campeón: <b>CD Lealtad</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Lealtad, AD Universidad Oviedo, Navia CF y Club Siero</b><br />';
        $txt .= 'Descenso: <b>CD Praviano, Club Hispano y CD Turón</b><br />';
        break;

        case 446:
        $txt = 'Campeón: <b>CD Tropezón</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Tropezón, SD Noja, UM Escobedo y Castro FC</b><br />';
        $txt .= 'Descenso: <b>Atlético Deva, CF Vimenor y SD Reocín</b><br />';
        break;

        case 447:
        $txt = 'Campeón: <b>CD Basconia</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Basconia, Zalla UC, Real Sociedad de Fútbol B y SD Amorebieta</b><br />';
        $txt .= 'Descenso: <b>Arratia CD, Zorroza FC, Club San Ignacio y CD Getxo</b><br />';
        break;

        case 448:
        $txt = 'Campeón: <b>FC Barcelona C</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>FC Barcelona C, Palamós CF, CE Mataró y CD Tortosa</b><br />';
        $txt .= 'Descenso: <b>UE Rubí, CF Igualada y CE Júpiter</b><br />';
        break;

        case 449:
        $txt = 'Campeón: <b>CD Eldense</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Eldense, Benidorm CD, Pinoso CF y CD Olímpic</b><br />';
        $txt .= 'Descenso: <b>AD Español de SVR, CD Acero y Lliria CF</b><br />';
        break;

        case 450:
        $txt = 'Campeón: <b>Aranjuez CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Aranjuez CF, CD Móstoles, Real Madrid CF C y UD San Sebastián Reyes</b><br />';
        $txt .= 'Descenso: <b>CD Fuencarral, AD Torrejón, AD Alcorcón y Atlético Valdemoro</b><br />';
        break;

        case 451:
        $txt = 'Campeón: <b>CF Palencia</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CF Palencia, SD Gimnástica Segoviana, SD Ponferradina y UD Salamanca B</b><br />';
        $txt .= 'Descenso: <b>Garray CF, Arandina CF, Atlético Astorga FC y CD Tardajos</b><br />';
        break;

        case 452:
        $txt = 'Campeón: <b>CD Linares</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Linares, CP Ejido, CP Granada 74 y Vélez CF</b><br />';
        $txt .= 'Descenso: <b>Granada CF B, UD Manilva-Sabinillas, UD Fuengirola y CD Gimnástico Melilla</b><br />';
        break;

        case 437:
        $txt = 'Campeón: <b>AD Ceuta</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>AD Ceuta, CD San Fernando, CD San Roque y Algeciras CF</b><br />';
        $txt .= 'Descenso: <b>Cádiz CF B, Cerámica La Rambla CF y CD Rayo Sanluqueño </b><br />';
        break;

        case 438:
        $txt = 'Campeón: <b>CD Atlético Baleares</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Atlético Baleares, CD Constancia, Sporting Mahonés y CF Villafranca</b><br />';
        $txt .= 'Descenso: <b>CD Cardessar, CDR La Victoria y SD Portmany</b><br />';
        break;

        case 439:
        $txt = 'Campeón: <b>Universidad LPGC</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Universidad LPGC, CD Corralejo, UD Las Palmas B y UD Lanzarote</b><br />';
        $txt .= 'Descenso: <b>Estrella CF, CD Puerto Cruz y CD Atlético Paso</b><br />';
        break;

        case 440:
        $txt = 'Campeón: <b>Cartagonova FC</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Cartagonova FC, Águilas CF, Sangonera Atlético CF y Caravaca CF</b><br />';
        $txt .= 'Descenso: <b>Pinatar CF EMF, AD Cotillas y Cartagena Atlético</b><br />';
        break;

        case 441:
        $txt = 'Campeón: <b>Jerez CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Jerez CF, CP Mérida B, SP Villafranca y CD Badajoz B</b><br />';
        $txt .= 'Descenso: <b>Arroyo CP, CP Moraleja y UD Montijo</b><br />';
        break;

        case 442:
        $txt = 'Campeón: <b>CD Calahorra</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Calahorra, Peña Sport FC, CD Logroñés B y CD Azkoyen</b><br />';
        $txt .= 'Descenso: <b>CD Ribaforada, CD Erri Berri, CD Cortes y AD Noaín</b><br />';
        break;

        case 443:
        $txt = 'Campeón: <b>CD Binéfar</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Binéfar, UD Fraga, CF Figueruelas y UD break;

		casetas</b><br />';
        $txt .= 'Descenso: <b>CD Oliver, CJD Peralta y SD Ejea</b><br />';
        break;

        case 444:
        $txt = 'Campeón: <b>Hellín Deportivo</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Hellín Deportivo, UB Conquense, Puertollano Industrial y CD Guadalajara</b><br />';
        $txt .= 'Descenso: <b>Almagro CF, Atlético Consuegra y CD Azuqueca</b><br />';
        break;

        case 1586:
        $txt .= 'Asciende a Segunda B: <b>CD Móstoles</b><br />';
        break;

        case 1590:
        $txt .= 'Asciende a Segunda B: <b>UD San Sebastián Reyes</b><br />';
        break;

        case 1594:
        $txt .= 'Asciende a Segunda B: <b>CD Lalín</b><br />';
        break;

        case 1598:
        $txt .= 'Asciende a Segunda B: <b>CD Lealtad</b><br />';
        break;

        case 1587:
        $txt .= 'Asciende a Segunda B: <b>CD Binéfar</b><br />';
        break;

        case 1591:
        $txt .= 'Asciende a Segunda B: <b>CD Tropezón</b><br />';
        break;

        case 1595:
        $txt .= 'Asciende a Segunda B: <b>CD Basconia</b><br />';
        break;

        case 1599:
        $txt .= 'Asciende a Segunda B: <b>CD Calahorra</b><br />';
        break;

        case 1588:
        $txt .= 'Asciende a Segunda B: <b>Cartagonova FC</b><br />';
        break;

        case 1592:
        $txt .= 'Asciende a Segunda B: <b>Águilas CF</b><br />';
        break;

        case 1596:
        $txt .= 'Asciende a Segunda B: <b>Palamós CF</b><br />';
        break;

        case 1600:
        $txt .= 'Asciende a Segunda B: <b>Benidorm CD</b><br />';
        break;

        case 1589:
        $txt .= 'Asciende a Segunda B: <b>UB Conquense</b><br />';
        break;

        case 1593:
        $txt .= 'Asciende a Segunda B: <b>AD Ceuta</b><br />';
        break;

        case 1597:
        $txt .= 'Asciende a Segunda B: <b>Algeciras CF</b><br />';
        break;

        case 1601:
        $txt .= 'Asciende a Segunda B: <b>Jerez CF</b><br />';
        break;

        case 1602:
        $txt .= 'Asciende a Segunda B: <b>Universidad LPGC</b><br />';

        break;

        case 453:
        $txt = 'Campeón: <b>Real Madrid CF</b><br />';
        $txt .= 'Copa de Europa: <b>Real Madrid CF y FC Barcelona</b><br />';
        $txt .= 'Recopa de Europa: <b>Real Betis Balompié</b><br />';
        $txt .= 'Copa de la UEFA: <b>RC Deportivo, Club Atlético de Madrid, Athletic Club y Real Valladolid CF</b><br />';
        $txt .= 'Promoción de Descenso a Segunda: <b>Rayo Vallecano</b><br />';
        $txt .= 'Descenso a Segunda: <b>CF Extremadura, Sevilla CF, Hércules CF y CD Logroñés</b><br />';

        break;

        case 454:
        $txt = 'Campeón: <b>CP Mérida</b><br />';
        $txt .= 'Ascenso a Primera: <b>CP Mérida y UD Salamanca</b><br />';
        $txt .= 'Promoción de Ascenso a Primera: <b>RCD Mallorca</b><br />';
        $txt .= 'Descenso a Segunda B: <b>Almería CF, Real Madrid CF B, FC Barcelona B y Écija Balompie</b><br />';
        break;

        case 1779:
        $txt .= 'Asciende a Primera: <b>RCD Mallorca</b><br />';
        $txt .= 'Desciende a Segunda: <b>Rayo Vallecano</b><br />';

        break;

        case 455:
        $txt = 'Campeón: <b>Real Sporting B</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Real Sporting B, Talavera CF, CD Manchego y RC Deportivo B</b><br />';
        $txt .= 'Promoción de Permanencia: <b>Getafe CF</b><br />';
        $txt .= 'Descenso: <b>Aranjuez CF, CD Colonia Moscardó, RC Celta B y Club Marino</b><br />';

        break;

        case 456:
        $txt = 'Campeón: <b>CD Aurrera Vitoria</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Aurrera Vitoria, CD Numancia, Barakaldo CF y SD Lemona</b><br />';
        $txt .= 'Promoción de Permanencia: <b>SD Huesca</b><br />';
        $txt .= 'Descenso: <b>Real Sociedad B, SD Zamudio, Zalla UC y CD Logroñés B </b><br />';
        break;

        case 457:
        $txt = 'Campeón: <b>Gimnàstic de Tarragona</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Gimnàstic de Tarragona, Elche CF, UDA Gramanet-Milán y UE Figueres</b><br />';
        $txt .= 'Promoción de Permanencia: <b>AD Mar Menor</b><br />';
        $txt .= 'Descenso: <b>AEC Manlleu, Benidorm CD, UE Sant Andreu y Lliria CF</b><br />';
        break;

        case 458:
        $txt = 'Campeón: <b>Córdoba CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Córdoba CF, Xerez CD, Real Jaén CF y RC Recreativo</b><br />';
        $txt .= 'Promoción de Permanencia: <b>Polideportivo Almería</b><br />';
        $txt .= 'Descenso: <b>CP Ejido, Vélez CF, UD Realejos y Atlético Marbella </b><br />';
        break;

        case 1443:
        $txt .= 'Asciende a Segunda A: <b>Elche CF</b><br />';
        break;

        case 1444:
        $txt .= 'Asciende a Segunda A: <b>Xerez CD</b><br />';
        break;

        case 1445:
        $txt .= 'Asciende a Segunda A: <b>Real Jaén CF</b><br />';
        break;

        case 1446:
        $txt .= 'Asciende a Segunda A: <b>CD Numancia</b><br />';
        break;

        case 1780:
        $txt .= 'Desciende a Tercera: <b>SD Huesca</b><br />';
        break;

        case 459:
        $txt = 'Campeón: <b>Vista Alegre SD</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Vista Alegre SD, Puente CF, CD Lalín y Viveiro FC</b><br />';
        $txt .= 'Descenso: <b>CD Mosteiro, SDC Mindoniense y Ribadeo FC</b><br />';
        break;

        case 468:
        $txt = 'Campeón: <b>Club Siero</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Club Siero, Navia CF, Caudal Deportivo y CD Lealtad</b><br />';
        $txt .= 'Descenso: <b>Santiago de Aller, CD Mosconia y Club Astur </b><br />';
        break;

        case 469:
        $txt = 'Campeón: <b>CD Tropezón</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Tropezón, Real Racing B, CD Bezana y Velarde Camargo CF </b><br />';
        $txt .= 'Descenso: <b>Ayrón Vargas, SD Textil Escudo y CE España Cueto</b><br />';
        break;

        case 470:
        $txt = 'Campeón: <b>CD Touring</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Touring, CD Elgóibar, Deportivo Alavés B y Amurrio Club</b><br />';
        $txt .= 'Descenso: <b>Urola KE, Aloñamendi KE, Balmaseda FC y SD Llodio </b><br />';
        break;

        case 471:
        $txt = 'Campeón: <b>Palamós CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Palamós CF, FC Barcelona C, UE Badaloní y CE Europa</b><br />';
        $txt .= 'Descenso: <b>UD Cerdanyola de Mataró, Atletic Roda de Barà, CF Balaguer, Girona FC, EC Granollers y UE Sants </b><br />';

        break;

        case 472:
        $txt = 'Campeón: <b>CD Alcoyano</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Alcoyano, Ontinyent CF, Novelda CF y CD Olímpic</b><br />';
        $txt .= 'Descenso: <b>CD Almoradí, Alicante CF, Crevillente Deportivo y Mutxamel CF</b><br />';
        break;

        case 473:
        $txt = 'Campeón: <b>CF Rayo Majadahonda</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CF Rayo Majadahonda, DAV Santa Ana, RSD Alcalá y CD Leganés B</b><br />';
        $txt .= 'Descenso: <b>AD Orcasitas, CD Fortuna, CU Collado Villalba, SR Villaverde Boetticher y CD Vicálvaro </b><br />';
        break;

        case 474:
        $txt = 'Campeón: <b>Burgos CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Burgos CF, CF Palencia, CD Salmantino y Zamora CF</b><br />';
        $txt .= 'Descenso: <b>SD Almazán y CD Íscar </b><br />';
        break;

        case 475:
        $txt = 'Campeón: <b>Motril CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Motril CF, UD Maracena, CD Linares y Úbeda CF</b><br />';
        $txt .= 'Descenso: <b>UD Melilla B, CD Baza, Atarfe Industrial y UD Carboneras</b><br />';

        break;

        case 460:
        $txt = 'Campeón: <b>Atlético Ceutí</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Atlético Ceutí, Isla Cristina CD, Algeciras CF y Ayamonte CF</b><br />';
        $txt .= 'Descenso: <b>Dos Hermanas CF, CD Mairena, Conil CF y UD Roteña </b><br />';
        break;

        case 461:
        $txt = 'Campeón: <b>CD Constancia</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Constancia, CD Atlético Baleares, CF Sóller y CD Manacor</b><br />';
        $txt .= 'Descenso: <b>CE Esporles, CD Felanitx y UD Alaró </b><br />';
        break;

        case 462:
        $txt = 'Campeón: <b>SD Tenisca</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>SD Tenisca, CD Tenerife B, CD Maspalomas y UD Pájara-Playas de Jandía</b><br />';
        $txt .= 'Descenso: <b>CD Arguineguín, UD San Antonio y Real Artesano FC</b><br />';
        break;

        case 463:
        $txt = 'Campeón: <b>Cartagonova FC</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Cartagonova FC, Lorca CF, Jumilla CF y Águilas CF</b><br />';
        $txt .= '<hr />El Cartagena FC, CD Torre Pacheco y CF Cutillas Fortuna se retiraron del grupo una vez iniciada la temporada, anulándose los resultados de los partidos que jugaron hasta entonces. Por este motivo, en este grupo no hay descensos.<br />';
        break;

        case 464:
        $txt = 'Campeón: <b>Jerez CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Jerez CF, Moralo CP, UP Plasencia y CD Burguillos</b><br />';
        $txt .= 'Descenso: <b>CD Miajadas, CP Guareña y UD Frexnense </b><br />';
        $txt .= '<hr />El partido Montijo - Badajoz B, inicialmente 0-1, se dio por ganado al Montijo por 3-0 por alineación indebida del Badajoz B.<br />';
        break;

        case 465:
        $txt = 'Campeón: <b>Peña Sport FC</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Peña Sport FC, UDC Chantrea, CD Oberena y Haro Deportivo</b><br />';
        $txt .= 'Descenso: <b>CD Baztán, CD Varea, Atlético River Ebro y CF Rapid</b><br />';
        break;

        case 466:
        $txt = 'Campeón: <b>CD Binéfar</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Binéfar, UD Barbastro, CD Endesa Andorra y UD Fraga</b><br />';
        $txt .= 'Descenso: <b>CD Ebro, CF Épila y CD Utrillas</b><br />';
        break;

        case 467:
        $txt = 'Campeón: <b>Tomelloso CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Tomelloso CF, CD Torrijos, CP Villarrobledo y UB Conquense</b><br />';
        $txt .= 'Descenso: <b>AD Campillo, Manzanares CF y Mora CF</b><br />';

        break;

        case 1569:
        $txt .= 'Asciende a Segunda B: <b>Burgos CF</b><br />';
        break;

        case 1573:
        $txt .= 'Asciende a Segunda B: <b>CD Leganés B</b><br />';
        break;

        case 1577:
        $txt .= 'Asciende a Segunda B: <b>Zamora CF</b><br />';
        break;

        case 1581:
        $txt .= 'Asciende a Segunda B: <b>Caudal Deportivo</b><br />';
        break;

        case 1570:
        $txt .= 'Asciende a Segunda B: <b>Amurrio Club</b><br />';
        break;

        case 1574:
        $txt .= 'Asciende a Segunda B: <b>CD Elgóibar</b><br />';
        break;

        case 1578:
        $txt .= 'Asciende a Segunda B: <b>Real Racing Club B</b><br />';
        break;

        case 1582:
        $txt .= 'Asciende a Segunda B: <b>CD Endesa Andorra</b><br />';
        break;

        case 1571:
        $txt .= 'Asciende a Segunda B: <b>Lorca CF</b><br />';
        break;

        case 1575:
        $txt .= 'Asciende a Segunda B: <b>Novelda CF</b><br />';
        break;

        case 1579:
        $txt .= 'Asciende a Segunda B: <b>CF Sóller</b><br />';
        break;

        case 1583:
        $txt .= 'Asciende a Segunda B: <b>Ontinyent CF</b><br />';
        break;

        case 1572:
        $txt .= 'Asciende a Segunda B: <b>Motril CF</b><br />';
        break;

        case 1576:
        $txt .= 'Asciende a Segunda B: <b>UP Plasencia</b><br />';
        break;

        case 1580:
        $txt .= 'Asciende a Segunda B: <b>Moralo CP</b><br />';
        break;

        case 1584:
        $txt .= 'Asciende a Segunda B: <b>Isla Cristina CD</b><br />';
        break;

        case 1585:
        $txt .= 'Asciende a Segunda B: <b>UD Pájara-Playas de Jandía</b><br />';

        break;

        case 1767:
        $txt .= 'Asciende a Primera: <b>CF Extremadura</b><br />';
        $txt .= 'Permanece en Primera: <b>Rayo Vallecano</b><br />';
        $txt .= 'Desciende a Segunda: <b>Albacete Balompié</b><br />';
        $txt .= 'Permanece en Segunda: <b>RCD Mallorca</b><br />';
        break;

        case 1769:
        $txt .= 'Asciende a Primera: <b>UD Salamanca</b><br />';
        $txt .= 'Permanece en Primera: <b>Real Sporting</b><br />';
        $txt .= 'Desciende a Segunda: <b>Albacete Balompié</b><br />';
        $txt .= 'Permanece en Segunda: <b>UE Lleida</b><br />';
        break;

        case 1770:
        $txt .= 'Asciende a Primera: <b>SD Compostela</b><br />';
        $txt .= 'Permanece en Primera: <b>Real Valladolid CF</b><br />';
        $txt .= 'Desciende a Segunda: <b>Rayo Vallecano</b><br />';
        $txt .= 'Permanece en Segunda: <b>CD Toledo</b><br />';
        break;

        case 1771:
        $txt .= 'Asciende a Primera: <b>Real Racing Club</b><br />';
        $txt .= 'Permanece en Primera: <b>Albacete Balompié</b><br />';
        $txt .= 'Desciende a Segunda: <b>RCD Español</b><br />';
        $txt .= 'Permanece en Segunda: <b>RCD Mallorca</b><br />';
        break;

        case 1772:
        $txt .= 'Permanecen en Primera: <b>RC Deportivo y Cádiz CF</b><br />';
        $txt .= 'Permanecen en Segunda: <b>Real Betis Balompié y UE Figueres</b><br />';
        break;

        case 1773:
        $txt .= 'Permanecen en Primera: <b>Real Zaragoza y Cádiz CF</b><br />';
        $txt .= 'Permanecen en Segunda: <b>CD Málaga y Real Murcia CF</b><br />';
        break;

        case 1774:
        $txt .= 'Asciende a Primera: <b>RCD Español</b><br />';
        $txt .= 'Permanece en Primera: <b>CD Tenerife</b><br />';
        $txt .= 'Desciende a Segunda: <b>CD Málaga</b><br />';
        $txt .= 'Permanece en Segunda: <b>RC Deportivo</b><br />';
        break;

        case 1775:
        $txt .= 'Ascienden a Primera: <b>RCD Mallorca y CD Tenerife</b><br />';
        $txt .= 'Descienden a Segunda: <b>RCD Español y Real Betis Balompié</b><br />';
        break;

        case 1776:
        $txt .= 'Asciende a Primera: <b>Real Oviedo</b><br />';
        $txt .= 'Permanece en Primera: <b>Real Murcia CF</b><br />';
        $txt .= 'Desciende a Segunda: <b>RCD Mallorca</b><br />';
        $txt .= 'Permanece en Segunda: <b>Rayo Vallecano</b><br />';

        break;

        case 1768:
        $txt .= 'Desciende a Tercera: <b>CD Leganés B</b><br />';
        break;

        case 1777:
        $txt .= 'Desciende a Tercera: <b>UD break;

		casetas</b><br />';
        break;

        case 1778:
        $txt .= 'Desciende a Tercera: <b>Arosa SC</b><br />';

        break;

        case 476:
        $txt .= 'Campeón y Copa de Europa: <b>Club Atlético de Madrid</b><br />';
        $txt .= 'Recopa de Europa: <b>FC Barcelona</b><br />';
        $txt .= 'Copa de la UEFA: <b>Valencia CF, RCD Espanyol y CD Tenerife</b><br />';
        $txt .= 'Promoción de Descenso a Segunda: <b>Rayo Vallecano y Albacete Balompié</b><br />';
        $txt .= 'Descenso a Segunda: <b>CP Mérida y UD Salamanca</b><br />';
        break;

        case 477:
        $txt = 'Campeón: <b>Hércules CF</b><br />';
        $txt .= 'Ascenso a Primera: <b>Hércules CF y CD Logroñés</b><br />';
        $txt .= 'Promoción de Ascenso a Primera: <b>RCD Mallorca y CF Extremadura</b><br />';
        $txt .= 'Descenso a Segunda B: <b>Sestao Sport Club, Athletic Club B, Getafe CF y Atlético Marbella</b><br />';
        break;

        case 478:
        $txt = 'Campeón: <b>UD Las Palmas</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>UD Las Palmas, Racing Club Ferrol, CD Orense y Atlético de Madrid B</b><br />';
        $txt .= 'Promoción de Permanencia: <b>CD Leganés B</b><br />';
        $txt .= 'Descenso: <b>UD San Sebastián Reyes, CD Tenerife B, CD Móstoles y DAV Santa Ana</b><br />';
        break;

        case 479:
        $txt = 'Campeón: <b>Real Sporting B</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Real Sporting B, Club Atlético Osasuna B, Real Avilés Industrial y CyD Leonesa</b><br />';
        $txt .= 'Promoción de Permanencia: <b>CD Logroñés B</b><br />';
        $txt .= 'Descenso: <b>CD Tudelano, SCD Durango, CF Palencia y Amurrio Club</b><br />';
        break;

        case 480:
        $txt = 'Campeón: <b>Levante UD</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Levante UD, Gimnàstic de Tarragona, UE Figueres y Valencia CF B</b><br />';
        $txt .= 'Promoción de Permanencia: <b>CE Sabadell CF</b><br />';
        $txt .= 'Descenso: <b>CD Alcoyano, Ontinyent CF, FC Barcelona C y CD Endesa Andorra</b><br />';
        break;

        case 481:
        $txt = 'Campeón: <b>Real Jaén CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Real Jaén CF, Granada CF, Elche CF y Córdoba CF</b><br />';
        $txt .= 'Promoción de Permanencia: <b>Benidorm CD</b><br />';
        $txt .= 'Descenso: <b>CD Mármol Macael, Novelda CF, Lorca CF y CD Utrera</b><br />';
        break;

        case 1439:
        $txt .= 'Asciende a Segunda A: <b>Levante UD</b><br />';
        break;

        case 1440:
        $txt .= 'Asciende a Segunda A: <b>UD Las Palmas</b><br />';
        break;

        case 1441:
        $txt .= 'Asciende a Segunda A: <b>CD Ourense</b><br />';
        break;

        case 1442:
        $txt .= 'Asciende a Segunda A: <b>Atlético de Madrid B</b><br />';
        break;

        case 482:
        $txt = 'Campeón: <b>CCD Cerceda</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CCD Cerceda, Ponte Ourense CF, Celta Turista CF y CD Lalín</b><br />';
        $txt .= 'Descenso: <b>SD Burela, Flavia SD y Coruxo FC</b><br />';
        break;

        case 491:
        $txt = 'Campeón: <b>Real Titánico</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Real Titánico, Real Oviedo B, Club Marino y Caudal Deportivo</b><br />';
        $txt .= 'Descenso: <b>CF Deportiva Piloñesa, Valdesoto CF y CD Praviano</b><br />';
        break;

        case 492:
        $txt = 'Campeón: <b>RS Gimnástica</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>RS Gimnástica, Real Racing Club B, CD Tropezón y SD Noja</b><br />';
        $txt .= 'Descenso: <b>Marina Cudeyo CF, CD Pontejos y CD Colindres</b><br />';
        break;

        case 493:
        $txt = 'Campeón: <b>Zalla UC</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Zalla UC, SD Zamudio, SD Gernika y CD Elgóibar</b><br />';
        $txt .= 'Descenso: <b>Mondragón CF, UPV / EHU y CD Juventus</b><br />';
        break;

        case 494:
        $txt = 'Campeón: <b>UE Tàrrega</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>UE Tàrrega, CE Europa, FC Santboià y Palamós CF</b><br />';
        $txt .= 'Descenso: <b>UA Horta, CF Igualada y AD Guíxols</b><br />';
        break;

        case 495:
        $txt = 'Campeón: <b>Lliria CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Lliria CF, CD Acero, CF Gandía y Pinoso CF</b><br />';
        $txt .= 'Descenso: <b>CD Alaquás, CD Villena y CE Alberic</b><br />';
        break;

        case 496:
        $txt = 'Campeón: <b>CF Rayo Majadahonda</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CF Rayo Majadahonda, AD Orcasitas, RCD Carabanchel y AD Colmenar Viejo</b><br />';
        $txt .= 'Descenso: <b>CDA Navalcarnero, Las Rozas CF, Vallecas CF y CD Mejoreño</b><br />';
        break;

        case 497:
        $txt = 'Campeón: <b>CD Laguna</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Laguna, Zamora CF, Atlético Bembibre y Atlético Burgalés</b><br />';
        $txt .= 'Descenso: <b>SD Gimnástica Medinense, CF Endesa Ponferrada, CD Benavente y SC Uxama</b><br />';
        break;

        case 498:
        $txt = 'Campeón: <b>CP Ejido</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CP Ejido, UD Maracena, Guadix CF y Motril CF</b><br />';
        $txt .= 'Descenso: <b>CD Alhaurino, Plus Ultra CF y AD Adra</b><br />';
        break;

        case 483:
        $txt = 'Campeón: <b>CD San Fernando</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD San Fernando, Atlético Sanluqueño, CD Isla Cristina y Chiclana CF</b><br />';
        $txt .= 'Descenso: <b>Jerez Industrial, CMD San Juan y CD O´Donnell</b><br />';
        break;

        case 484:
        $txt = 'Campeón: <b>CF Sóller</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CF Sóller, CD Playas de Calviá, CD Atlético Baleares y UD Poblense</b><br />';
        $txt .= 'Descenso: <b>CD Santanyí, UD Arenal y CD Cala Millor</b><br />';
        $txt .= '<hr />El Cala Millor figura con tres puntos menos por sanción federativa. <br />';
        break;

        case 485:
        $txt = 'Campeón: <b>CD Corralejo</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Corralejo, UD La Pared, UD Realejos y UD Las Palmas B</b><br />';
        $txt .= 'Descenso: <b>CD Tablero, UD Icodense y UD Güimar</b><br />';
        $txt .= '<hr />Orotava y Estrella figuran con tres puntos menos por incomparecencia. <br />';
        break;

        case 486:
        $txt = 'Campeón: <b>Real Murcia CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Real Murcia CF, Cartagena CF, AD Mar Menor y Águilas CF</b><br />';
        $txt .= 'Descenso: <b>Cehegín CF, CD Cieza, CD Roldán y Muleño CF</b><br />';
        break;

        case 487:
        $txt = 'Campeón: <b>CP Cacereño</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CP Cacereño, Jerez CF, Moralo CP y Mérida B</b><br />';
        $txt .= 'Descenso: <b>Sanvicenteño FC, UD Fornacense y CD Azuaga</b><br />';
        break;

        case 488:
        $txt = 'Campeón: <b>CD Calahorra</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Calahorra, CD Oberena, Peña Sport FC y CD Ribaforada</b><br />';
        $txt .= 'Descenso: <b>Yagüe CF, SD Lagunak y CD La Calzada</b><br />';
        break;

        case 489:
        $txt = 'Campeón: <b>Real Zaragoza B</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Real Zaragoza B, Utebo FC, UD break;

		casetas y UD Barbastro</b><br />';
        $txt .= 'Descenso: <b>Hernán Cortés CF, CD Caspe y CDJ Tamarite</b><br />';
        break;

        case 490:
        $txt = 'Campeón: <b>Tomelloso CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Tomelloso CF, CD Manchego, Puertollano Industrial y Manzanares CF</b><br />';
        $txt .= 'Descenso: <b>UD Santa Bárbara, Daimiel CF y CD Piedrabuena</b><br />';
        break;

        case 1552:
        $txt .= 'Asciende a Segunda B: <b>Real Oviedo B</b><br />';
        break;

        case 1556:
        $txt .= 'Asciende a Segunda B: <b>RCD Carabanchel</b><br />';
        break;

        case 1560:
        $txt .= 'Asciende a Segunda B: <b>Celta Turista CF</b><br />';
        break;

        case 1564:
        $txt .= 'Asciende a Segunda B: <b>Club Marino</b><br />';
        break;

        case 1553:
        $txt .= 'Asciende a Segunda B: <b>RS Gimnástica</b><br />';
        break;

        case 1557:
        $txt .= 'Asciende a Segunda B: <b>SD Gernika</b><br />';
        break;

        case 1561:
        $txt .= 'Asciende a Segunda B: <b>Real Zaragoza B</b><br />';
        break;

        case 1565:
        $txt .= 'Asciende a Segunda B: <b>Zalla UC</b><br />';
        break;

        case 1554:
        $txt .= 'Asciende a Segunda B: <b>CF Gandía</b><br />';
        break;

        case 1558:
        $txt .= 'Asciende a Segunda B: <b>AD Mar Menor</b><br />';
        break;

        case 1562:
        $txt .= 'Asciende a Segunda B: <b>Llíria CF</b><br />';
        break;

        case 1566:
        $txt .= 'Asciende a Segunda B: <b>Real Murcia CF</b><br />';
        break;

        case 1555:
        $txt .= 'Asciende a Segunda B: <b>CD Manchego</b><br />';
        break;

        case 1559:
        $txt .= 'Asciende a Segunda B: <b>CP Ejido</b><br />';
        break;

        case 1563:
        $txt .= 'Asciende a Segunda B: <b>CP Cacereño</b><br />';
        break;

        case 1567:
        $txt .= 'Asciende a Segunda B: <b>Guadix CF</b><br />';
        break;

        case 1568:
        $txt .= 'Asciende a Segunda B: <b>UD Realejos</b><br />';

        break;

        case 499:
        $txt .= 'Campeón y Copa de Europa: <b>Real Madrid CF</b><br />';
        $txt .= 'Recopa de Europa: <b>Real Zaragoza y RC Deportivo</b><br />';
        $txt .= 'Copa de la UEFA: <b>Real Betis Balompié, FC Barcelona y Sevilla FC</b><br />';
        $txt .= 'Promoción de Descenso a Segunda: <b>Albacete Balompié y Sporting Gijón</b><br />';
        $txt .= 'Descenso a Segunda: <b>Real Valladolid CF y CD Logroñés</b><br />';
        break;

        case 500:
        $txt = 'Campeón: <b>CP Mérida</b><br />';
        $txt .= 'Ascenso a Primera: <b>CP Mérida y Rayo Vallecano</b><br />';
        $txt .= 'Promoción de Ascenso a Primera: <b>UE Lleida y UD Salamanca</b><br />';
        $txt .= 'Descenso a Segunda B: <b>Palamós CF, Getafe CF, CD Leganés y CD Orense</b><br />';
        break;

        case 501:
        $txt = 'Campeón: <b>Racing Club Ferrol</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Racing Club Ferrol, CD Mensajero, UD Las Palmas y Pontevedra CF</b><br />';
        $txt .= 'Promoción de Permanencia: <b>CF Fuenlabrada</b><br />';
        $txt .= 'Descenso: <b>Real Oviedo B, Real Ávila CF, CD Corralejo y UD Realejos</b><br />';
        break;

        case 502:
        $txt = 'Campeón: <b>Deportivo Alavés</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Deportivo Alavés, CD Numancia, Sestao Sport Club y SD Beasaín</b><br />';
        $txt .= 'Promoción de Permanencia: <b>UD break;

		casetas</b><br />';
        $txt .= 'Descenso: <b>RS Gimnástica, Real Zaragoza B, SD Gernika y Hullera Vasco Leonesa</b><br />';

        break;

        case 503:
        $txt = 'Campeón: <b>Levante UD</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Levante UD, UDA Gramanet-Milán, Valencia CF B y CD Castellón</b><br />';
        $txt .= 'Promoción de Permanencia: <b>Gimnàstic de Tarragona</b><br />';
        $txt .= 'Descenso: <b>Real Murcia CF, Girona FC, CE Europa y CE Premià</b><br />';
        break;

        case 504:
        $txt = 'Campeón: <b>Córdoba CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Córdoba CF, Almería CF, Écija Balompié y Real Jaén CF</b><br />';
        $txt .= 'Promoción de Permanencia: <b>Cartagena FC</b><br />';
        $txt .= 'Descenso: <b>CD San Fernando, CD San Roque, CP Cacereño y CD Manchego</b><br />';
        break;

        case 1435:
        $txt .= 'Asciende a Segunda A: <b>Sestao Sport Club</b><br />';
        break;

        case 1436:
        $txt .= 'Asciende a Segunda A: <b>Almería CF</b><br />';
        break;

        case 1437:
        $txt .= 'Asciende a Segunda A: <b>Deportivo Alavés</b><br />';
        break;

        case 1438:
        $txt .= 'Asciende a Segunda A: <b>Écija Balompié</b><br />';
        break;

        case 505:
        $txt = 'Campeón: <b>CD Endesa As Pontes</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Endesa As Pontes, Viveiro FC, Celta Turista CF y RC Deportivo B</b><br />';
        $txt .= 'Descenso: <b>Racing Club Villalbés, Bergantiños CF y Órdenes SD</b><br />';
        break;

        case 514:
        $txt = 'Campeón: <b>Caudal Deportivo</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Caudal Deportivo, Club Siero, CD Lealtad y Real Titánico</b><br />';
        $txt .= 'Descenso: <b>CD Tuilla, Candás CF, SD Lenense y Santiago de Aller</b><br />';
        break;

        case 515:
        $txt = 'Campeón: <b>Real Racing Club B</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Real Racing Club B, CD Bezana, UM Escobedo y CD Tropezón</b><br />';
        $txt .= 'Descenso: <b>Santoña CF, SD Barreda Balompié y CD Naval</b><br />';
        $txt .= '<hr />Al descender de Segunda B la Gim. Torrelavega, su filial, G.Torrelavega B se vio obligado a descender a Regional. <br />';
        break;

        case 516:
        $txt = 'Campeón: <b>CD Aurrera Vitoria</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Aurrera Vitoria, SCD Durango, CD Hernani y Zalla UC</b><br />';
        $txt .= 'Descenso: <b>Tolosa CF, Arenas Club y CD Munguía</b><br />';
        break;

        case 517:
        $txt = 'Campeón: <b>RCD Español B</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>RCD Español B, UE Tàrrega, FC Barcelona C y Vilobí CF</b><br />';
        $txt .= 'Descenso: <b>CE Manresa, CF Badalona, FC Martinenc y CF Reus Deportiu</b><br />';
        break;

        case 518:
        $txt = 'Campeón: <b>CF Gandía</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CF Gandía, CD Onda, Novelda CF y Pinoso CF</b><br />';
        $txt .= 'Descenso: <b>CD Jávea, UD Oliva y UD Horadada</b><br />';
        break;

        case 519:
        $txt = 'Campeón: <b>DAV Santa Ana</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>DAV Santa Ana, Rayo Majadahonda, RCD Carabanchel y CD Leganés B</b><br />';
        $txt .= 'Descenso: <b>Getafe CF B, CD Vicálvaro, Alcobendas CF, AD Alcorcón y CD El Álamo</b><br />';
        break;

        case 520:
        $txt = 'Campeón: <b>CyD Leonesa</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CyD Leonesa, CD Salmantino, Atlético Bembibre y Zamora CF</b><br />';
        $txt .= 'Descenso: <b>CD Tardajos, CF Venta de Baños y Betis CF</b><br />';
        break;

        case 521:
        $txt = 'Campeón: <b>Málaga CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Málaga CF, UD San Pedro, CP Ejido y Vélez CF</b><br />';
        $txt .= 'Descenso: <b>CDR Melilla, Estación Atlético, Granada CF B y PD Garrucha</b><br />';
        break;

        case 506:
        $txt = 'Campeón: <b>CD Pozoblanco</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Pozoblanco, CD Utrera, Chiclana CF y Isla Cristina CD</b><br />';
        $txt .= 'Descenso: <b>Atlético Cortegana, Atlético Lucentino Industrial, UD Roteña, Atlético Ceuta, Puente Genil CF y Sanlúcar CF</b><br />';
        $txt .= '<hr />El Puente Genil figura con dos puntos menos por sanción federativa. <br />';
        break;

        case 507:
        $txt = 'Campeón: <b>RCD Mallorca B</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>RCD Mallorca B, CD Atlético Baleares, CF Sóller y UD Poblense</b><br />';
        $txt .= 'Descenso: <b>CD Montuiri, CD Binisalem y CD Felanitx</b><br />';

        break;

        case 508:
        $txt = 'Campeón: <b>Estrella CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Estrella CF, UD Salud Tenerife, UD Orotava y UD Gáldar</b><br />';
        $txt .= 'Descenso: <b>AD Laguna, UD Gomera y CD San Andrés</b><br />';
        break;

        case 509:
        $txt = 'Campeón: <b>Lorca CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Lorca CF, Águilas CF, Jumilla CF y Muleño CF</b><br />';
        $txt .= 'Descenso: <b>Real Murcia B, CD Dolores y Cartagena FC B</b><br />';
        break;

        case 510:
        $txt = 'Campeón: <b>CD Don Benito</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Don Benito, Jerez CF, CD Badajoz B y CD Burguillos</b><br />';
        $txt .= 'Descenso: <b>Trujillo CF, AD Llerenense y CD Miajadas</b><br />';
        break;

        case 511:
        $txt = 'Campeón: <b>CD Calahorra</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Calahorra, Peña Sport FC, UCD Burladés y SD Lagunak</b><br />';
        $txt .= 'Descenso: <b>CD Mirandés, Haro Deportivo y Peña Balsamaiso CF</b><br />';
        break;

        case 512:
        $txt = 'Campeón: <b>CD Endesa Andorra</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Endesa Andorra, SD Huesca, Utebo FC y UD Barbastro</b><br />';
        $txt .= 'Descenso: <b>AD Sabiñánigo, SD Tarazona y CD Alcorisa</b><br />';
        break;

        case 513:
        $txt = 'Campeón: <b>Hellín Deportivo</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Hellín Deportivo, Tomelloso CF, Puertollano Industrial y CD Torrijos</b><br />';
        $txt .= 'Descenso: <b>CD Yuncos, CD La Roda, CD Los Yébenes y Atlético Pedro Muñoz</b><br />';
        break;

        case 1535:
        $txt .= 'Asciende a Segunda B: <b>RC Deportivo B</b><br />';
        break;

        case 1539:
        $txt .= 'Asciende a Segunda B: <b>CD Endesa As Pontes</b><br />';
        break;

        case 1543:
        $txt .= 'Asciende a Segunda B: <b>CyD Leonesa</b><br />';
        break;

        case 1547:
        $txt .= 'Asciende a Segunda B: <b>DAV Santa Ana</b><br />';
        break;

        case 1536:
        $txt .= 'Asciende a Segunda B: <b>SD Huesca</b><br />';
        break;

        case 1540:
        $txt .= 'Asciende a Segunda B: <b>SCD Durango</b><br />';
        break;

        case 1544:
        $txt .= 'Asciende a Segunda B: <b>CD Endesa Andorra</b><br />';
        break;

        case 1548:
        $txt .= 'Asciende a Segunda B: <b>CD Aurrera Vitoria</b><br />';
        break;

        case 1537:
        $txt .= 'Asciende a Segunda B: <b>FC Barcelona C</b><br />';
        break;

        case 1541:
        $txt .= 'Asciende a Segunda B: <b>RCD Español B</b><br />';
        break;

        case 1545:
        $txt .= 'Asciende a Segunda B: <b>Novelda CF</b><br />';
        break;

        case 1549:
        $txt .= 'Asciende a Segunda B: <b>RCD Mallorca B</b><br />';
        break;

        case 1538:
        $txt .= 'Asciende a Segunda B: <b>UD San Pedro</b><br />';
        break;

        case 1542:
        $txt .= 'Asciende a Segunda B: <b>Málaga CF</b><br />';
        break;

        case 1546:
        $txt .= 'Asciende a Segunda B: <b>CD Utrera</b><br />';
        break;

        case 1550:
        $txt .= 'Asciende a Segunda B: <b>Vélez CF</b><br />';
        break;

        case 1551:
        $txt .= 'Asciende a Segunda B: <b>UD Salud Tenerife</b><br />';

        break;

        case 522:
        $txt .= 'Campeón y Copa de Europa: <b>FC Barcelona</b><br />';
        $txt .= 'Recopa de Europa: <b>Real Zaragoza</b><br />';
        $txt .= 'Copa de la UEFA: <b>RC Deportivo, Real Madrid CF y Athletic Club</b><br />';
        $txt .= 'Promoción de Descenso a Segunda: <b>Rayo Vallecano y Real Valladolid CF</b><br />';
        $txt .= 'Descenso a Segunda: <b>UE Lleida y Club Atlético Osasuna</b><br />';

        break;

        case 523:
        $txt = 'Campeón: <b>RCD Español</b><br />';
        $txt .= 'Ascenso a Primera: <b>RCD Español y Real Betis Balompié</b><br />';
        $txt .= 'Promoción de Ascenso a Primera: <b>SD Compostela y CD Toledo</b><br />';
        $txt .= 'Descenso a Segunda B: <b>CD Castellón, Real Murcia CF, Real Burgos CF y Cádiz CF</b><br />';

        break;

        case 524:
        $txt = 'Campeón: <b>UD Salamanca</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>UD Salamanca, Getafe CF, CD Orense y UP Langreo</b><br />';
        $txt .= 'Promoción de Permanencia: <b>Arosa SC</b><br />';
        $txt .= 'Descenso: <b>CyD Leonesa, Tomelloso CF, SD Ponferradina y Celta Turista CF</b><br />';
        break;

        case 525:
        $txt = 'Campeón: <b>Deportivo Alavés</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Deportivo Alavés, Sestao Sport Club, CD Numancia y Baracaldo CF</b><br />';
        $txt .= 'Promoción de Permanencia: <b>Real Valladolid Deportivo B</b><br />';
        $txt .= 'Descenso: <b>CD Basconia, CD Endesa Andorra, Utebo FC y CD Touring</b><br />';
        break;

        case 526:
        $txt = 'Campeón: <b>UD Atlético Gramanet</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>UD Atlético Gramanet, AEC Manlleu, Levante UD y UE Figueres</b><br />';
        $txt .= 'Promoción de Permanencia: <b>CE Premiá</b><br />';
        $txt .= 'Descenso: <b>UE Rubí, SCR PD Santa Eulalia, CD Cieza y CD Manacor</b><br />';
        break;

        case 527:
        $txt = 'Campeón: <b>CF Extremadura</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CF Extremadura, UD Las Palmas, RC Recreativo y Real Jaén CF</b><br />';
        $txt .= 'Promoción de Permanencia: <b>CD San Roque</b><br />';
        $txt .= 'Descenso: <b>CP Ejido, Atlético Malagueño, CD Estepona y CD Maspalomas</b><br />';
        break;

        case 1431:
        $txt .= 'Asciende a Segunda A: <b>Getafe CF</b><br />';
        break;

        case 1432:
        $txt .= 'Asciende a Segunda A: <b>UD Salamanca</b><br />';
        break;

        case 1433:
        $txt .= 'Asciende a Segunda A: <b>CD Orense</b><br />';
        break;

        case 1434:
        $txt .= 'Asciende a Segunda A: <b>CF Extremadura</b><br />';
        break;

        case 528:
        $txt = 'Campeón: <b>Bergantiños CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Bergantiños CF, Fabril Deportivo, CD Endesa As Pontes y Viveiro FC</b><br />';
        $txt .= 'Descenso: <b>CD Carballiño, CD Mosteiro, Portonovo SD, CD Barco y Juventud Cambados</b><br />';
        break;

        case 537:
        $txt = 'Campeón: <b>Caudal Deportivo</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Caudal Deportivo, Club Siero, CD Lealtad y Club Marino</b><br />';
        $txt .= 'Descenso: <b>Berrón CF, Club Astur y Valdesoto CF</b><br />';
        break;

        case 538:
        $txt = 'Campeón: <b>SD Noja</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>SD Noja, Real Racing Club B, CD Laredo y Castro FC</b><br />';
        $txt .= 'Descenso: <b>CD Ramales, SD Torina y SD Gama</b><br />';
        break;

        case 539:
        $txt = 'Campeón: <b>Amurrio Club</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Amurrio Club, Aurrerá Vitoria, SD Gernika y SCD Durango</b><br />';
        $txt .= 'Descenso: <b>Sodupe Unión Club, Anaitasuna FT y SD Erandio Club</b><br />';
        break;

        case 540:
        $txt = 'Campeón: <b>CE Sabadell FC</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CE Sabadell FC, Terrassa FC, FC Barcelona C y CE Europa</b><br />';
        $txt .= 'Descenso: <b>CE Palafrugell, UE Olot y CD Blanes</b><br />';
        break;

        case 541:
        $txt = 'Campeón: <b>Pinoso CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Pinoso CF, Ontinyent CF, Crevillente Deportivo y CD Eldense</b><br />';
        $txt .= 'Descenso: <b>Orihuela Deportiva, UD Alzira y Calpe CF</b><br />';
        break;

        case 542:
        $txt = 'Campeón: <b>Aranjuez</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Aranjuez, Fuenlabrada, Moscardó y Móstoles</b><br />';
        $txt .= 'Descenso: <b>Alcalá</b><br />';
        break;

        case 543:
        $txt = 'Campeón: <b>CD Laguna</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Laguna, CD Salmantino, Hullera Vasco Leonesa y Atlético Bembibre</b><br />';
        $txt .= 'Descenso: <b>Club Cultural de León, SD Almazán, CD Béjar Industrial, CD Aguilar y CD Guardo</b><br />';
        break;

        case 544:
        $txt = 'Campeón: <b>Polideportivo Almería</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Polideportivo Almería, Vélez CF, Martos CD y Guadix CF</b><br />';
        $txt .= 'Descenso: <b>Úbeda CF, CD Los Boliches y Iliturgi CF</b><br />';
        break;

        case 529:
        $txt = 'Campeón: <b>Real Betis Balompié B</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Real Betis Balompié B, UD Los Palacios, CD San Fernando y Atlético Cortegana</b><br />';
        $txt .= 'Descenso: <b>CD Egabrense y CD Lebrija</b><br />';
        break;

        case 530:
        $txt = 'Campeón: <b>RCD Mallorca B</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>RCD Mallorca B, CD Atlético Baleares, CD Montuiri y CD Cala Millor</b><br />';
        $txt .= 'Descenso: <b>SD Ibiza, CD Ferrerías, CD Esporlas, CD Calviá y CDR La Victoria</b><br />';
        break;

        case 531:
        $txt = 'Campeón: <b>UD Orotava</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>UD Orotava, CD Corralejo, UD Las Palmas B y SD Tenisca</b><br />';
        $txt .= 'Descenso: <b>UD Lanzarote, Ferreras CF y CD Gara</b><br />';
        break;

        case 532:
        $txt = 'Campeón: <b>Águilas CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Águilas CF, CD Roldán, CD Torre Pacheco y Caravaca CF</b><br />';
        $txt .= 'Descenso: <b>CD Lorca Deportiva, CD Bala Azul, Cehegín CF y CD Alberca</b><br />';
        $txt .= '<hr />Cartagena B y Cehegín figuran con dos puntos menos por sanción federativa. <br />';
        break;

        case 533:
        $txt = 'Campeón: <b>C. Cristian Lay</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>C. Cristian Lay, UP Plasencia, Mérida Promesas UD y CD Don Benito</b><br />';
        $txt .= 'Descenso: <b>UD Montijo, CD Valdelacalzada y CP Monesterio</b><br />';
        break;

        case 534:
        $txt = 'Campeón: <b>Peña Sport FC</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Peña Sport FC, CD Ribaforada, CD Calahorra y UDC Chantrea</b><br />';
        $txt .= 'Descenso: <b>Yagüe CF, CD Arnedo y CD Berceo</b><br />';
        break;

        case 535:
        $txt = 'Campeón: <b>SD Huesca</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>SD Huesca, Real Zaragoza CD B, UD break;

		casetas y UD Barbastro</b><br />';
        $txt .= 'Descenso: <b>Atlético de Monzón, CD Ebro y CD Valdefierro</b><br />';
        break;

        case 536:
        $txt = 'Campeón: <b>CD Manchego</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Manchego, Atlético Ciudad Real, CP Villarrobledo y Puertollano Industrial</b><br />';
        $txt .= 'Descenso: <b>UD Santa Bárbara, Mora CF y UD Socuéllamos</b><br />';
        break;

        case 1518:
        $txt .= 'Asciende a Segunda B: <b>Aranjuez CF</b><br />';
        break;

        case 1522:
        $txt .= 'Asciende a Segunda B: <b>CF Fuenlabrada</b><br />';
        break;

        case 1526:
        $txt .= 'Asciende a Segunda B: <b>CD Móstoles</b><br />';
        break;

        case 1530:
        $txt .= 'Asciende a Segunda B: <b>CD Colonia Moscardó</b><br />';
        break;

        case 1519:
        $txt .= 'Asciende a Segunda B: <b>SD Gernika</b><br />';
        break;

        case 1523:
        $txt .= 'Asciende a Segunda B: <b>Real Zaragoza B</b><br />';
        break;

        case 1527:
        $txt .= 'Asciende a Segunda B: <b>Amurrio Club</b><br />';
        break;

        case 1531:
        $txt .= 'Asciende a Segunda B: <b>UD break;

		casetas</b><br />';
        break;

        case 1520:
        $txt .= 'Asciende a Segunda B: <b>CE Europa</b><br />';
        break;

        case 1524:
        $txt .= 'Asciende a Segunda B: <b>CE Sabadell FC</b><br />';
        break;

        case 1528:
        $txt .= 'Asciende a Segunda B: <b>Terrassa FC</b><br />';
        break;

        case 1532:
        $txt .= 'Asciende a Segunda B: <b>Ontinyent CF</b><br />';
        break;

        case 1521:
        $txt .= 'Asciende a Segunda B: <b>Real Betis Balompié B</b><br />';
        break;

        case 1525:
        $txt .= 'Asciende a Segunda B: <b>Polideportivo Almería</b><br />';
        break;

        case 1529:
        $txt .= 'Asciende a Segunda B: <b>CD Manchego</b><br />';
        break;

        case 1533:
        $txt .= 'Asciende a Segunda B: <b>CD San Fernando</b><br />';
        break;

        case 1534:
        $txt .= 'Asciende a Segunda B: <b>CD Corralejo</b><br />';

        break;

        case 545:
        $txt .= 'Campeón y Copa de Europa: <b>FC Barcelona</b><br />';
        $txt .= 'Recopa de Europa: <b>Real Madrid CF</b><br />';
        $txt .= 'Copa de la UEFA: <b>RC Deportivo, Valencia CF, CD Tenerife y Club Atlético de Madrid</b><br />';
        $txt .= 'Promoción de Descenso a Segunda: <b>Albacete Balompié y RCD Español</b><br />';
        $txt .= 'Descenso a Segunda: <b>Cádiz CF y Real Burgos CF</b><br />';

        break;

        case 546:
        $txt = 'Campeón: <b>UE Lleida</b><br />';
        $txt .= 'Ascenso a Primera: <b>UE Lleida y Real Valladolid CF</b><br />';
        $txt .= 'Promoción de Ascenso a Primera: <b>Racing Santander y RCD Mallorca</b><br />';
        $txt .= 'Descenso a Segunda B: <b>UE Figueres, CD Lugo, Sestao Sport Club y CE Sabadell FC</b><br />';

        break;

        case 547:
        $txt = 'Campeón: <b>CD Leganés</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Leganés, UD Salamanca, CD Toledo y Getafe CF</b><br />';
        $txt .= 'Descenso: <b>CD Endesa As Pontes, CF Valdepeñas, Aranjuez CF y RSD Alcalá</b><br />';
        break;

        case 548:
        $txt = 'Campeón: <b>Deportivo Alavés</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Deportivo Alavés, Baracaldo CF, RS Gimnástica y CF Palencia</b><br />';
        $txt .= 'Descenso: <b>CD Hernani, Real Zaragoza CD B, CD Elgóibar y CD Santurtzi</b><br />';
        break;

        case 549:
        $txt = 'Campeón: <b>Real Murcia CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Real Murcia CF, UE Sant Andreu, Elche CF y Hércules CF</b><br />';
        $txt .= 'Descenso: <b>Torrevieja CF, Orihuela Deportiva, Lliria CF, CF Sporting Mahonés y UD Horadada</b><br />';
        $txt .= '<hr />El Torrevieja descendió por ser el peor de los decimosextos clasificados de los cuatro grupos de Segunda B. <br />';
        break;

        case 550:
        $txt = 'Campeón: <b>UD Las Palmas</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>UD Las Palmas, Xerez CD, Granada CF y Real Jaén CF</b><br />';
        $txt .= 'Descenso: <b>Real Betis Balompié B, RB Linense y CD Marino Tenerife-Sur </b><br />';
        $txt .= '<hr />El partido Las Palmas - Écija se dio por perdido al Écija por quedarse sin suficientes jugadores de campo debido a varias expulsiones.<br />';
        $txt .= 'El partido Melilla - Marino se dio por perdido al Marino por incomparecencia, descontándosele además dos puntos de su clasificación general. <br />';
        $txt .= 'Poco antes de finalizar la temporada, se retiró de la competición el Portuense, anulándose los resultados de todos sus partidos disputados hasta la fecha.<br />';
        break;

        case 1427:
        $txt .= 'Asciende a Segunda A: <b>CD Toledo</b><br />';
        break;

        case 1428:
        $txt .= 'Asciende a Segunda A: <b>CD Leganés</b><br />';
        break;

        case 1429:
        $txt .= 'Asciende a Segunda A: <b>Hércules CF</b><br />';
        break;

        case 1430:
        $txt .= 'Asciende a Segunda A: <b>Real Murcia CF</b><br />';
        break;

        case 551:
        $txt = 'Campeón: <b>Arosa SC</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Arosa SC, Viveiro FC, CD Carballiño y Villalonga FC</b><br />';
        $txt .= 'Descenso: <b>Gondomar CF, Gran Peña FC y Meirás CF</b><br />';
        break;

        case 560:
        $txt = 'Campeón: <b>Caudal Deportivo</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Caudal Deportivo, CD Lealtad, UP Langreo y Club Siero</b><br />';
        $txt .= 'Descenso: <b>CD Mosconia, AD Universidad de Oviedo y Club Europa de Nava</b><br />';
        break;

        case 561:
        $txt = 'Campeón: <b>UM Escobedo</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>UM Escobedo, SD Rayo Cantabria, CD Laredo y SD Noja</b><br />';
        $txt .= 'Descenso: <b>Santoña CF, SD Textil Escudo y Selaya FC</b><br />';
        break;

        case 562:
        $txt = 'Campeón: <b>Real Unión Club</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Real Unión Club, Club Bermeo, Mondragón CF y CD Touring</b><br />';
        $txt .= 'Descenso: <b>CD Lagun Onak, CD Galdakao y Santutxu FC</b><br />';
        $txt .= '<hr />El partido Galdákano - Lagún Onak se dio por perdido al primero por incomparecencia, descontándosele además dos puntos de su clasificación. <br />';
        break;

        case 563:
        $txt = 'Campeón: <b>CE Premiá</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CE Premiá, UD Atlético Gramanet, UE Rubí y CD Júpiter</b><br />';
        $txt .= 'Descenso: <b>CE Manresa y Joventut Mollerussa</b><br />';
        break;

        case 564:
        $txt = 'Campeón: <b>Pinoso CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Pinoso CF, Crevillente Deportivo, CD Villena y UD Oliva</b><br />';
        $txt .= 'Descenso: <b>UD Alzira, UD Carcaixent, CD Benicarló, Foyos CD, Torrent CF, Pibreak;

		casent CF y Atlético Saguntino</b><br />';
        break;

        case 565:
        $txt = 'Campeón: <b>CF Fuenlabrada</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CF Fuenlabrada, Real Madrid CF C, CD Colonia Moscardó y UD San Sebastián Reyes</b><br />';
        $txt .= 'Descenso: <b>CD Puerta Bonita, AD Colmenar Viejo y CDA Navalcarnero</b><br />';
        break;

        case 566:
        $txt = 'Campeón: <b>Zamora CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Zamora CF, CD Laguna, Atlético Bembibre y RCD Ríbert</b><br />';
        $txt .= 'Descenso: <b>SD Covaleda, Atlético Astorga CF y CP Monteresma</b><br />';
        break;

        case 567:
        $txt = 'Campeón: <b>Atlético Malagueño</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Atlético Malagueño, Almería CF, Polideportivo Almería y CD Mármol Macael</b><br />';
        $txt .= 'Descenso: <b>Motril CF y CDR Melilla</b><br />';
        break;

        case 552:
        $txt = 'Campeón: <b>Atlético Cortegana</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Atlético Cortegana, CD Mairena, CD San Fernando y CMD San Juan</b><br />';
        $txt .= 'Descenso: <b>Algeciras CF, Arcos CF, CD Rota y Chiclana CF</b><br />';
        break;

        case 553:
        $txt = 'Campeón: <b>CD Manacor</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Manacor, SCR PD Santa Eulalia, Mallorca Atlético y CD Playas de Calviá</b><br />';
        $txt .= 'Descenso: <b>SD Portmany, Porto Cristo CF, CD Llosetense y CD Son Roca</b><br />';
        break;

        case 554:
        $txt = 'Campeón: <b>UD Realejos</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>UD Realejos, AD Laguna, UD Telde y UD Orotava</b><br />';
        $txt .= 'Descenso: <b>UD Aridane, CD Unión Tejina y CD San Andrés</b><br />';
        break;

        case 555:
        $txt = 'Campeón: <b>CD Cieza</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Cieza, Caravaca CF, CD Roldán y AD Mar Menor</b><br />';
        $txt .= 'Descenso: <b>AD Cotillas, CD Cieza Promesas y AD San Miguel</b><br />';
        break;

        case 556:
        $txt = 'Campeón: <b>Moralo CP</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Moralo CP, CD Don Benito, C. Cristian Lay Jerez y UP Plasencia</b><br />';
        $txt .= 'Descenso: <b>CD Díter Zafra, CD Medellín y CP Talayuela-Cetarsa</b><br />';
        break;

        case 557:
        $txt = 'Campeón: <b>Peña Sport FC</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Peña Sport FC, CD Calahorra, CD Mirandés y CD Valle de Egüés</b><br />';
        $txt .= 'Descenso: <b>CD San Adrián, CD Azkoyen y SD Loyola</b><br />';
        break;

        case 558:
        $txt = 'Campeón: <b>SD Huesca</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>SD Huesca, Utebo FC, UD Barbastro y UD break;

		casetas</b><br />';
        $txt .= 'Descenso: <b>Alcolea CF, SD Ejea y CD Mallén</b><br />';
        break;

        case 559:
        $txt = 'Campeón: <b>Talavera CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Talavera CF, UB Conquense, CD Manchego y Manzanares CF</b><br />';
        $txt .= 'Descenso: <b>CF La Solana, Motilla CF y AD Tarancón</b><br />';

        break;

        case 1501:
        $txt .= 'Asciende a Segunda B: <b>UP Langreo</b><br />';
        break;

        case 1505:
        $txt .= 'Asciende a Segunda B: <b>Arosa SC</b><br />';
        break;

        case 1509:
        $txt .= 'Asciende a Segunda B: <b>UD San Sebastián Reyes</b><br />';
        break;

        case 1513:
        $txt .= 'Asciende a Segunda B: <b>Real Madrid CF C</b><br />';
        break;

        case 1502:
        $txt .= 'Asciende a Segunda B: <b>CD Touring</b><br />';
        break;

        case 1506:
        $txt .= 'Asciende a Segunda B: <b>Utebo FC</b><br />';
        break;

        case 1510:
        $txt .= 'Asciende a Segunda B: <b>Real Unión Club</b><br />';
        break;

        case 1514:
        $txt .= 'Asciende a Segunda B: <b>Club Bermeo</b><br />';
        break;

        case 1503:
        $txt .= 'Asciende a Segunda B: <b>UD Atlético Gramanet</b><br />';
        break;

        case 1507:
        $txt .= 'Asciende a Segunda B: <b>CE Premiá</b><br />';
        break;

        case 1511:
        $txt .= 'Asciende a Segunda B: <b>CD Manacor</b><br />';
        break;

        case 1515:
        $txt .= 'Asciende a Segunda B: <b>CD Cieza</b><br />';
        break;

        case 1504:
        $txt .= 'Asciende a Segunda B: <b>Atlético Malagueño</b><br />';
        break;

        case 1508:
        $txt .= 'Asciende a Segunda B: <b>Almería CF</b><br />';
        break;

        case 1512:
        $txt .= 'Asciende a Segunda B: <b>Talavera CF</b><br />';
        break;

        case 1516:
        $txt .= 'Asciende a Segunda B: <b>CD Mármol Macael</b><br />';
        break;

        case 1517:
        $txt .= 'Asciende a Segunda B: <b>UD Realejos</b><br />';

        break;

        case 568:
        $txt .= 'Campeón y Copa de Europa: <b>FC Barcelona</b><br />';
        $txt .= 'Recopa de Europa: <b>Club Atlético de Madrid</b><br />';
        $txt .= 'Copa de la UEFA: <b>Real Madrid CF, Valencia CF, Real Sociedad de Fútbol y Real Zaragoza CD</b><br />';
        $txt .= 'Promoción de Descenso a Segunda: <b>RC Deportivo y Cádiz CF</b><br />';
        $txt .= 'Descenso a Segunda: <b>Real Valladolid CF y RCD Mallorca</b><br />';

        break;

        case 569:
        $txt = 'Campeón: <b>RC Celta</b><br />';
        $txt .= 'Ascenso a Primera: <b>RC Celta y Rayo Vallecano</b><br />';
        $txt .= 'Promoción de Ascenso a Primera: <b>UE Figueres y Real Betis Balompié</b><br />';
        $txt .= 'Descenso a Segunda B: <b>Sestao Sport Club, CD Málaga, Avilés Industrial y UD Las Palmas</b><br />';

        break;

        case 570:
        $txt = 'Campeón: <b>UD Salamanca</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>UD Salamanca, CD Lugo, Sporting Gijón B y CD Endesa As Pontes</b><br />';
        $txt .= 'Descenso: <b>CD Lalín, Fabril Deportivo, Juventud Cambados y CD Mosconia</b><br />';
        break;

        case 571:
        $txt = 'Campeón: <b>UE Sant Andreu</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>UE Sant Andreu, AEC Manlleu, Girona FC y Deportivo Alavés</b><br />';
        $txt .= 'Descenso: <b>UD Fraga, SD Huesca, Joventut Mollerussa y CD Binéfar</b><br />';

        break;

        case 572:
        $txt = 'Campeón: <b>Cartagena FC</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Cartagena FC, Villarreal CF, Yeclano CF y Elche CF</b><br />';
        $txt .= 'Descenso: <b>CF Gandía, CD Roldán, UD Oliva, Torrent CF y UD Alzira</b><br />';
        $txt .= '<hr />El Gandía descendió por ser el peor de los decimosextos clasificados de los cuatro grupos de Segunda B. <br />';

        break;

        case 573:
        $txt = 'Campeón: <b>Atlético Marbella</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Atlético Marbella, CD Badajoz, CF Extremadura y RB Linense</b><br />';
        $txt .= 'Descenso: <b>Atlético Sanluqueño, CD Fuengirola, CD Los Boliches y CD Villanovense</b><br />';
        break;

        case 1423:
        $txt .= 'Asciende a Segunda A: <b>CD Badajoz</b><br />';
        break;

        case 1424:
        $txt .= 'Asciende a Segunda A: <b>Villarreal CF</b><br />';
        break;

        case 1425:
        $txt .= 'Asciende a Segunda A: <b>CD Lugo</b><br />';
        break;

        case 1426:
        $txt .= 'Asciende a Segunda A: <b>Atlético Marbella</b><br />';
        break;

        case 574:
        $txt = 'Campeón: <b>Racing Club Ferrol</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Racing Club Ferrol, Celta Turista CF, CD Carballino y Bergantiños CF</b><br />';
        $txt .= 'Descenso: <b>Flavia SD, Alondras CF, Brigantium CF, Coruxo FC y Club Lemos</b><br />';
        $txt .= '<hr />El Coruxo figura con dos puntos menos por sanción federativa. </b><br />';
        break;

        case 583:
        $txt = 'Campeón: <b>CD Lealtad</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Lealtad, Caudal Deportivo, UP Langreo y Club Hispano</b><br />';
        $txt .= 'Descenso: <b>CD Tuilla, Lada Langreo CF, CD Praviano y UD San Martín</b><br />';
        break;

        case 584:
        $txt = 'Campeón: <b>UM Escobedo</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>UM Escobedo, Marina Cudeyo CF, CD Laredo y CD Comillas</b><br />';
        $txt .= 'Descenso: <b>CD Barquereño, CF Vimenor y CD San Justo</b><br />';
        $txt .= '<hr />El CD Ramales figura con dos puntos menos por incomparecencia al partido Ramales - Naval, que además se dio por ganado al Naval. <br />';
        break;

        case 585:
        $txt = 'Campeón: <b>Real Unión Club</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Real Unión Club, SD Beasaín, CD Elgóibar y SD Amorebieta</b><br />';
        $txt .= 'Descenso: <b>CD Pasajes y ADC Abetxuko</b><br />';
        break;

        case 586:
        $txt = 'Campeón: <b>UD Atlético Gramanet</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>UD Atlético Gramanet, CF Balaguer, CD Júpiter y CE Premiá</b><br />';
        $txt .= 'Descenso: <b>CD Banyoles, UA Horta, UE Olot y Sant Cugat CE</b><br />';
        break;

        case 588:
        $txt = 'Campeón: <b>CD Eldense</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Eldense y UD Horadada</b><br />';
        $txt .= 'Descenso: <b>SD Villajoyosa, CD Ilicitano, CD Olímpic, Pego CF, UD Aspense, UD Canals, Alicante CF, CD Albatera, CF Ollería, CD Denia y Monóvar CD</b><br />';
        break;

        case 587:
        $txt = 'Campeón: <b>Valencia B</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Valencia CF B y Lliria CF</b><br />';
        $txt .= 'Descenso: <b>CD Acero, CD Almazora, UD Vall de Uxó, CD Onda, CD Betxí, Paiporta CF, Vinaroz CF, Paterna CF, CD Burriana, Ribarroja CF y CF Cullera</b><br />';
        break;

        case 589:
        $txt = 'Campeón: <b>Real Madrid CF C</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Real Madrid CF C, Aranjuez CF, CD Móstoles y RSD Alcalá</b><br />';
        $txt .= 'Descenso: <b>Alcobendas CF y Atlético Valdemoro</b><br />';
        break;

        case 590:
        $txt = 'Campeón: <b>Atlético Bembibre</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Atlético Bembibre, Atlético Astorga FC, Zamora CF y Cultural de León</b><br />';
        $txt .= 'Descenso: <b>CF Endesa Ponferrada, SD Fabero y CF Briviesca</b><br />';
        break;

        case 591:
        $txt = 'Campeón: <b>Vélez CF</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Vélez CF, CD Mármol Macael, Iliturgi CF y Atlético Malagueño</b><br />';
        $txt .= 'Descenso: <b>Juventud Torremolinos, CD Ronda, CD Nerja y CD Mijas</b><br />';
        $txt .= '<hr />El Mijas figura con dos puntos menos por sanción federativa. </b><br />';
        break;

        case 575:
        $txt = 'Campeón: <b>Sevilla FC B</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>Sevilla FC B, Écija Balompié, CD San Roque y Algeciras CF</b><br />';
        $txt .= 'Descenso: <b>Santaella CF y Atlético Ceuta</b><br />';
        break;

        case 576:
        $txt = 'Campeón: <b>SD Ibiza</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>SD Ibiza, CD Manacor, CD Atlético Baleares y Mallorca Atlético</b><br />';
        $txt .= 'Descenso: <b>CD España, UD Seislán y CD Cala d´Or</b><br />';
        break;

        case 577:
        $txt = 'Campeón: <b>UD Las Palmas B</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>UD Las Palmas B, CD Mensajero, UD Orotava y UD Gáldar</b><br />';
        $txt .= 'Descenso: <b>UD Icodense, CD I´Gara y Ferreras CF</b><br />';
        break;

        case 578:
        $txt = 'Campeón: <b>CD Beniel</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Beniel, Águilas CF, Imperial CF y CF Santomera</b><br />';
        $txt .= 'Descenso: <b>Olímpico de Totana, CD Alberca, Barinas CF y CD Algar</b><br />';
        $txt .= '<hr />El partido Barinas - Beniel se da por perdido al Barinas por incomparecencia, descontándosele además dos puntos de la clasificación general. <br />';
        break;

        case 579:
        $txt = 'Campeón: <b>UP Plasencia</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>UP Plasencia, CP Cacereño, Moralo CP y CD Don Benito</b><br />';
        $txt .= 'Descenso: <b>CP Cabezuela, CD Orellana y Racing Valverdeño</b><br />';
        break;

        case 580:
        $txt = 'Campeón: <b>CD Calahorra</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Calahorra, CD Izarra, Atlético Artajonés y Peña Sport FC</b><br />';
        $txt .= 'Descenso: <b>CD Berceo, CD Autol y Yagüe CF</b><br />';
        break;

        case 581:
        $txt = 'Campeón: <b>CD Endesa Andorra</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Endesa Andorra, UD Barbastro, Utebo FC y Hernán Cortés CF</b><br />';
        $txt .= 'Descenso: <b>RSD Santa Isabel, CJD Peralta, CD Tauste, CD Alcorisa, CD Calatayud y CD Utrillas</b><br />';
        break;

        case 582:
        $txt = 'Campeón: <b>CD Toledo</b><br />';
        $txt .= 'Liguilla de Ascenso: <b>CD Toledo, UB Conquense, Talavera CF y Gimnástico Alcázar</b><br />';
        $txt .= 'Descenso: <b>Sporting Quintanar, Daimiel CF y Herencia CF</b><br />';

        break;

        case 1483:
        $txt .= 'Asciende a Segunda B: <b>Aranjuez CF</b><br />';
        break;

        case 1487:
        $txt .= 'Asciende a Segunda B: <b>Racing Club Ferrol</b><br />';
        break;

        case 1491:
        $txt .= 'Asciende a Segunda B: <b>Celta Turista CF</b><br />';
        break;

        case 1495:
        $txt .= 'Asciende a Segunda B: <b>RSD Alcalá</b><br />';
        break;

        case 1484:
        $txt .= 'Asciende a Segunda B: <b>CD Elgóibar</b><br />';
        break;

        case 1488:
        $txt .= 'Asciende a Segunda B: <b>SD Beasaín</b><br />';
        break;

        case 1492:
        $txt .= 'Asciende a Segunda B: <b>CD Endesa Andorra</b><br />';
        break;

        case 1496:
        $txt .= 'Asciende a Segunda B: <b>CD Izarra</b><br />';
        break;

        case 1485:
        $txt .= 'Asciende a Segunda B: <b>Valencia CF B</b><br />';
        break;

        case 1489:
        $txt .= 'Asciende a Segunda B: <b>Lliria CF</b><br />';
        break;

        case 1493:
        $txt .= 'Asciende a Segunda B: <b>UD Horadada</b><br />';
        break;

        case 1497:
        $txt .= 'Asciende a Segunda B: <b>SD Ibiza</b><br />';
        break;

        case 1486:
        $txt .= 'Asciende a Segunda B: <b>CD San Roque</b><br />';
        break;

        case 1490:
        $txt .= 'Asciende a Segunda B: <b>Écija Balompié</b><br />';
        break;

        case 1494:
        $txt .= 'Asciende a Segunda B: <b>CD Toledo</b><br />';
        break;

        case 1498:
        $txt .= 'Asciende a Segunda B: <b>Sevilla FC B</b><br />';
        break;

        case 1499:
        $txt .= 'Asciende a Segunda B: <b>CD Mensajero</b><br />';

        break;

        case 592:
        $txt .= 'Campeón y Copa de Europa: <b>FC Barcelona</b><br />';
        $txt .= 'Recopa de Europa: <b>Club Atlético de Madrid</b><br />';
        $txt .= 'Copa de la UEFA: <b>Real Madrid CF, Club Atlético Osasuna, Sporting Gijón y Real Oviedo</b><br />';
        $txt .= 'Promoción de Descenso a Segunda: <b>Real Zaragoza CD y Cádiz CF</b><br />';
        $txt .= 'Descenso a Segunda: <b>CD Castellón y Real Betis Balompié</b><br />';

        break;

        case 593:
        $txt = 'Campeón: <b>Albacete Balompié</b><br />';
        $txt .= 'Ascenso a Primera: <b>Albacete Balompié y RC Deportivo</b><br />';
        $txt .= 'Promoción de Ascenso a Primera: <b>Real Murcia CF y CD Málaga</b><br />';
        $txt .= 'Descenso a Segunda B: <b>Elche CF, UD Salamanca, Levante UD y Xerez CD</b><br />';
        $txt .= '<hr /><i>Promoción Permanencia en primera</i></b><br /><br />';
        $txt .= '12/06/1991 - Real Murcia CF 0-0 Real Zaragoza CD<br />';
        $txt .= '12/06/1991 - CD Málaga 1-0 Cádiz CF<br /><br />';
        $txt .= '19/06/1991 - <b>Real Zaragoza CD</b> 5-2 Real Murcia CF<br />';
        $txt .= '19/06/1991 - <b>Cádiz CF</b> 1-0 CD Málaga (pr. + pen.)<br /><br />';
        $txt .= 'Permanecen en Primera: <b>Real Zaragoza CD y Cádiz CF</b><br />';

        break;

        case 594:
        $txt = 'Campeón: <b>Real Madrid CF B</b><br />';
        $txt .= 'Promoción de ascenso a Segunda: <b>Real Madrid CF B, CD Lugo, SD Compostela y Getafe CF</b><br />';
        $txt .= 'Descienden a Tercera: <b>CD Pegaso, UP Langreo, CD Móstoles y RSD Alcalá</b><br />';

        break;

        case 595:
        $txt = 'Campeón: <b>Racing Santander</b><br />';
        $txt .= 'Promoción de ascenso a Segunda: <b>Racing Santander, Deportivo Alavés, Atlético Osasuna Promesas y San Sebastián CF</b><br />';
        $txt .= 'Descienden a Tercera: <b>CD Izarra, CD Mirandés, SCD Durango, CD Endesa Andorra y CD Teruel</b><br />';
        $txt .= '<hr />El Izarra descendió por ser el peor de los decimosextos clasificados de los cuatro grupos de Segunda B. <br />';

        break;

        case 596:
        $txt = 'Campeón: <b>Badajoz</b><br />';
        $txt .= 'Promoción de ascenso a Segunda: <b>CD Badajoz, RC Recreativo, Córdoba CF y CP Mérida</b><br />';
        $txt .= 'Descienden a Tercera: <b>CD Toledo, Sevilla Atlético, UD Telde y UD Las Palmas Atlético </b><br />';
        $txt .= '<hr />Los partidos Fuengirola - Los Boliches (inicialmente 1-2) y  Los Boliches - Betis Dep. (inicialmente 3-2) tuvieron que repetirse después de finalizada la temporada, ante la reclamación presentada por el Toledo por alineación  indebida de un jugador de Los Boliches. </b><br />';

        break;

        case 597:
        $txt = 'Campeón: <b>FC Barcelona Atlético </b><br />';
        $txt .= 'Promoción de ascenso a Segunda: <b>FC Barcelona Atlético, Cartagena FC, AECManlleu y CD Alcoyano</b><br />';
        $txt .= 'Descienden a Tercera: <b>Mallorca Atlético, CD Eldense, CD Manacor y CD Olímpic</b><br />';

        break;

        case 1419:
        $txt .= 'Asciende a Segunda A: <b>Real Racing Club</b><br />';
        break;

        case 1420:
        $txt .= 'Asciende a Segunda A: <b>CP Mérida</b><br />';
        break;

        case 1421:
        $txt .= 'Asciende a Segunda A: <b>SD Compostela</b><br />';
        break;

        case 1422:
        $txt .= 'Asciende a Segunda A: <b>Real Madrid CF B</b><br />';

        break;

        case 598:
        $txt = 'Campeón: <b>CD Lalín</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>CD Lalín, Bergantiños CF, SD Burela y Fabril Deportivo</b><br />';
        $txt .= 'Descenso a Regional: <b>Sporting Sada y CD Boiro</b><br />';

        break;

        case 607:
        $txt = 'Campeón: <b>Caudal Deportivo</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>Caudal Deportivo, Club Hispano, CD Mosconia y Pumarín CF</b><br />';
        $txt .= 'Descenso a Regional: <b>CF Deportiva Piloñesa, Club Europa de Nava, Club Asturias y Luarca CF</b><br />';

        break;

        case 608:
        $txt = 'Campeón: <b>CD Pontejos</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>CD Pontejos, CD Laredo, CD Barquereño y UM Escobedo</b><br />';
        $txt .= 'Descenso a Regional: <b>SD Noja, Ayrón Vargas CF y SD Reocín</b><br />';
        break;

        case 609:
        $txt = 'Campeón: <b>CD Hernani</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>CD Hernani, CD Elgóibar, Tolosa CF y SD Amorebieta</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Aurrera Vitoria, CD Touring, Zarauz y CD Larramendi</b><br />';
        break;

        case 610:
        $txt = 'Campeón: <b>CF Balaguer</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>CF Balaguer, Gimnàstic de Tarragona, CD Banyoles y Atletic Roda de Barà</b><br />';
        $txt .= 'Descenso a Regional: <b>CF Lloret, CF Reus Deportiu y UD Esplugues</b><br />';
        break;

        case 611:
        $txt = 'Campeón: <b>SD Sueca</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>SD Sueca y Villarreal CF</b><br />';
        $txt .= 'Descenso a Regional: <b>Alboraya UD y Nules CF</b><br />';
        break;

        case 612:
        $txt = 'Campeón: <b>UD Oliva</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>UD Oliva y CD Dénia</b><br />';
        $txt .= 'Descenso a Regional: <b>Algemesí CF y CD Dolores</b><br />';
        break;

        case 613:
        $txt = 'Campeón: <b>Real Madrid CF C</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>Real Madrid CF C, CF Fuenlabrada, Atlético Valdemoro y AD Parla</b><br />';
        $txt .= 'Descenso a Regional: <b>AD Colmenar Viejo, CD Cubas, DAV Santa Ana, Vallecas CF, AD Alcorcón y AD El Pardo</b><br />';
        break;

        case 614:
        $txt = 'Campeón: <b>Valladolid Dep. Promesas</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>Valladolid Dep. Promesas, Zamora CF, SD Almazán y Atlético Burgalés</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Benavente, RS Monterrey CF y CD Aguilar</b><br />';
        break;

        case 615:
        $txt = 'Campeón: <b>Atlético Marbella</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>Atlético Marbella, CP Ejido, CD Mármol Macael y Real Jaén CF</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Antequerano y Atlético Benamiel CF</b><br />';
        break;

        case 599:
        $txt = 'Campeón: <b>Cádiz CF B</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>Cádiz CF B, Racing Club Portuense, Écija Balompié y CD San Roque</b><br />';
        $txt .= 'Descenso a Regional: <b>La Palma CF, Ayamonte CF, CD Utrera y Puerto Real CF</b><br />';
        break;

        case 600:
        $txt = 'Campeón: <b>CD Playas de Calviá</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>CD Playas de Calviá, SD Ibiza, CD Atlético Baleares y CD Cala d´Or</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Isleño, CF San Rafael, UD Alaró, UD Alcudia y Hospitalet Isla Blanca</b><br />';

        break;

        case 601:
        $txt = 'Campeón: <b>UD Realejos</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>UD Realejos, CD Mensajero, CD Corralejo y CD Maspalomas</b><br />';
        $txt .= 'Descenso a Regional: <b>SD Águilas Atlético, CD Puerto Cruz, Arucas CF y UD Las Torres</b><br />';
        $txt .= '<hr />Arucas y Las Torres figuran con dos puntos menos por sanción federativa. <br />';
        break;

        case 602:
        $txt = 'Campeón: <b>CD Roldán</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>CD Roldán, Imperial CF, AD Mar Menor y Águilas CF</b><br />';
        $txt .= 'Descenso a Regional: <b>La Unión Athletic, CD Naval y CD Torre Pacheco</b><br />';
        break;

        case 603:
        $txt = 'Campeón: <b>CD Don Benito</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>CD Don Benito, CP Cacereño, UP Plasencia y CD Villanovense</b><br />';
        $txt .= 'Descenso a Regional: <b>Sanvicenteño FC, CD Coria y AD Puebla Patria</b><br />';
        break;

        case 604:
        $txt = 'Campeón: <b>CD Tudelano</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>CD Tudelano, Logroñés Promesas, Peña Sport FC y CD Alfaro</b><br />';
        $txt .= 'Descenso a Regional: <b>AD San Juan, SD Loyola, SD Alsasua y AD Noaín</b><br />';
        break;

        case 605:
        $txt = 'Campeón: <b>UD Fraga</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>UD Fraga, UD Barbastro, AD Sabiñánigo y CD Calatayud</b><br />';
        $txt .= 'Descenso a Regional: <b>Alcañiz CF, SD Tarazona, AD Almudévar y UD Biescas</b><br />';
        break;

        case 606:
        $txt = 'Campeón: <b>Talavera CF</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>Talavera CF, CD Guadalajara, UB Conquense y UD Socuéllamos</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Madridejos, Almagro CF y CD Villacañas</b><br />';
        break;

        case 1463:
        $txt .= 'Asciende a Segunda B: <b>Fabril Deportivo</b><br />';
        break;

        case 1467:
        $txt .= 'Asciende a Segunda B: <b>CD Lalín</b><br />';
        break;

        case 1471:
        $txt .= 'Asciende a Segunda B: <b>CD Mosconia</b><br />';
        break;

        case 1475:
        $txt .= 'Asciende a Segunda B: <b>Valladolid Deportivo Promesas</b><br />';
        break;

        case 1464:
        $txt .= 'Asciende a Segunda B: <b>UD Fraga</b><br />';
        break;

        case 1468:
        $txt .= 'Asciende a Segunda B: <b>Logroñés Promesas</b><br />';
        break;

        case 1472:
        $txt .= 'Asciende a Segunda B: <b>CD Hernani</b><br />';
        break;

        case 1476:
        $txt .= 'Asciende a Segunda B: <b>CD Tudelano</b><br />';
        break;

        case 1465:
        $txt .= 'Asciende a Segunda B: <b>Gimnàstic de Tarragona</b><br />';
        break;

        case 1469:
        $txt .= 'Asciende a Segunda B: <b>UD Oliva</b><br />';
        break;

        case 1473:
        $txt .= 'Asciende a Segunda B: <b>Villarreal CF</b><br />';
        break;

        case 1477:
        $txt .= 'Asciende a Segunda B: <b>CD Roldán</b><br />';
        break;

        case 1466:
        $txt .= 'Asciende a Segunda B: <b>Atlético Marbella</b><br />';
        break;

        case 1470:
        $txt .= 'Asciende a Segunda B: <b>CP Ejido</b><br />';
        break;

        case 1474:
        $txt .= 'Asciende a Segunda B: <b>Racing Club Portuense</b><br />';
        break;

        case 1478:
        $txt .= 'Asciende a Segunda B: <b>Real Jaén CF</b><br />';
        break;

        case 1479:
        $txt .= 'Asciende a Segunda B: <b>CD Maspalomas</b><br />';

        break;

        case 124:
        $txt .= 'Campeón y Copa de Europa: <b>Real Madrid CF</b><br />';
        $txt .= 'Recopa de Europa: <b>FC Barcelona</b><br />';
        $txt .= 'Copa de la UEFA: <b>Valencia CF, Sevilla FC, Club Atlético de Madrid y Real Sociedad de Futbol</b><br />';
        $txt .= 'Promoción de Descenso a Segunda: <b>CD Málaga y CD Tenerife</b><br />';
        $txt .= 'Descenso a Segunda: <b>RC Celta y Rayo Vallecano</b><br />';
        break;

        case 125:
        $txt = 'Campeón: <b>Real Burgos CF</b><br />';
        $txt .= 'Ascenso a Primera: <b>Real Burgos CF y Real Betis Balompié</b><br />';
        $txt .= 'Promoción de Ascenso a Primera: <b>RC Deportivo y RCD Español</b><br />';
        $txt .= 'Descenso a Segunda B: <b>Racing Santander, Castilla CF, RC Recreativo y Atlético Madrileño</b><br />';
        $txt .= '<hr />El Bilbao Ath. quedó excluido de jugar la promoción de ascenso por ser filial del Ath. Bilbao que militaba en Primera. </b><br />';
        $txt .= '<hr /><i>Promoción Permanencia en primera</i></b><br /><br />';
        $txt .= '02/06/1990 - CD Tenerife 0-0 RC Deportivo<br />';
        $txt .= '02/06/1990 - RCD Español 1-0 CD Málaga<br /><br />';
        $txt .= '10/06/1990 - RC Deportivo 0-1 <b>CD Tenerife</b><br /><br />';
        $txt .= '10/06/1990 - CD Málaga  1-0 <b>RCD Español</b> (pr. + pen.)<br />';
        $txt .= 'Asciende a Primera: <b>RCD Español</b><br />';
        $txt .= 'Permanece en Primera: <b>CD Tenerife</b><br />';
        $txt .= 'Descienden a Segunda: <b>CD Málaga</b><br />';

        break;

        case 126:
        $txt .= 'Campeón y Ascenso a Segunda: <b>Real Avilés Industrial </b><br />';
        $txt .= 'Descenso a Tercera: <b>Racing Club Ferrol, CD Colonia Moscardó, CD Lalín y SC Arosa</b><br />';
        break;

        case 127:
        $txt .= 'Campeón y Ascenso a Segunda: <b>UE Lleida</b><br />';
        $txt .= 'Descenso a Tercera: <b>CD Laredo, UD Fraga, CD Calahorra y UD Barbastro</b><br />';
        break;

        case 128:
        $txt .= 'Campeón y Ascenso a Segunda: <b>Albacete Balompié</b><br />';
        $txt .= 'Descenso a Tercera: <b>Atlético Marbella, Real Jaén CF, CD Utrera, CD Maspalomas y UD Salud</b><br />';
        $txt .= '<hr />El Atlético Marbella descendió a Tercera por ser el peor clasificado de los decimosextos de los cuatro grupos. <br />';
        break;

        case 129:
        $txt .= 'Campeón y Ascenso a Segunda: <b>Orihuela Deportiva</b><br />';
        $txt .= 'Descenso a Tercera: <b>Gimnàstic de Tarragona, Villarreal CF, SD Ibiza y CD Atlético Baleares</b><br />';
        break;

        case 130:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>SD Compostela</b><br />';
        $txt .= 'Descenso a Regional: <b>Puebla FC, Tyde FC, Corujo FC, SD Juvenil Ponteareas y Vista Alegre SD</b><br />';
        break;

        case 139:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>SD Vetusta</b><br />';
        $txt .= 'Descenso a Regional: <b>SD Lenense, Atlético de Lugones y AD Ribadedeva</b><br />';
        break;

        case 140:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>RS Gimnástica</b><br />';
        $txt .= 'Descenso a Regional: <b>SD Unión Club, CyD Guarnizo y SD Gama</b><br />';
        break;

        case 141:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>Deportivo Alavés</b><br />';
        $txt .= 'Descenso a Regional: <b>ADC Abechuco, Zumaya y Anaitasuna</b><br />';
        break;

        case 142:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>UE Sant Andreu</b><br />';
        $txt .= 'Descenso a Regional: <b>Terrassa FC, FC Vilafranca y CE Manresa</b><br />';
        break;

        case 143:
        $txt .= 'Campeón y Promoción de Ascenso a Segunda B: <b>Torrent CF</b><br />';
        $txt .= 'Promoción de Permanencia: <b>CD Els Ibarsos</b><br />';
        $txt .= 'Descenso a Regional: <b>Foyos CD y SC Requena</b><br />';
        $txt .= 'Campeón y Promoción de Ascenso a Segunda B: <b>UD Oliva</b><br />';
        $txt .= 'Promoción de Permanencia: <b>SD Villajoyosa</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Cox y Bigastro CF</b><br />';
        $txt .= '<hr /><i>Final Tercera División Grupo VI</i><br /><br />';
        $txt .= '20/05/1990 - UD Oliva 2-1 Torrent CF<br /><br />';
        $txt .= '27/05/1990 - <b>Torrent CF</b> 2-0 UD Oliva<br /><br />';
        $txt .= 'Campeón y Asciende a Segunda B: <b>Torrent CF</b><br />';
        $txt .= '<hr /><i>Permanencia en Tercera División Grupo VI</i><br /><br />';
        $txt .= '10/06/1990 - Catral 2-0 SD Villajoyosa<br />';
        $txt .= '10/06/1990 - Paiporta 1-0 CD Els Ibarsos<br /><br />';
        $txt .= '17/06/1990 - <b>SD Villajoyosa</b> 4-0 Catral<br />';
        $txt .= '17/06/1990 - CD Els Ibarsos 0-1 <b>Paiporta</b><br /><br />';
        $txt .= 'Permanece en Tercera: <b>SD Villajoyosa</b><br />';
        $txt .= 'Asciende a Tercera: <b>Paiporta</b><br />';
        $txt .= 'Desciende a Regional: <b>CD Els Ibarsos</b><br />';
        break;

        case 144:
        $txt .= 'Campeón y Promoción de Ascenso a Segunda B: <b>UD Oliva</b><br />';
        $txt .= 'Promoción de Permanencia: <b>SD Villajoyosa</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Cox y Bigastro CF</b><br />';
        $txt .= '<hr /><i>Final Tercera División Grupo VI</i><br /><br />';
        $txt .= '20/05/1990 - UD Oliva 2-1 Torrent CF<br /><br />';
        $txt .= '27/05/1990 - <b>Torrent CF</b> 2-0 UD Oliva<br /><br />';
        $txt .= 'Campeón y Asciende a Segunda B: <b>Torrent CF</b><br />';
        $txt .= '<hr /><i>Permanencia en Tercera División Grupo VI</i><br /><br />';
        $txt .= '10/06/1990 - Catral 2-0 SD Villajoyosa<br />';
        $txt .= '10/06/1990 - Paiporta 1-0 CD Els Ibarsos<br /><br />';
        $txt .= '17/06/1990 - <b>SD Villajoyosa</b> 4-0 Catral<br />';
        $txt .= '17/06/1990 - CD Els Ibarsos 0-1 <b>Paiporta</b><br /><br />';
        $txt .= 'Permanece en Tercera: <b>SD Villajoyosa</b><br />';
        $txt .= 'Asciende a Tercera: <b>Paiporta</b><br />';
        $txt .= 'Desciende a Regional: <b>CD Els Ibarsos</b><br />';
        break;

        case 145:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>CD Móstoles</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Puerta Bonita, CD San Fernando y SR Villaverde Boetticher</b><br />';
        break;

        case 146:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>CF Palencia</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Barrio San José, ADM Herrera y Club Cultural de León </b><br />';
        break;

        case 147:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>CD Los Boliches</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Antequerano, Juventud Torremolinos, UD San Pedro y Centro Deportes El Palo</b><br />';
        break;

        case 131:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>Betis Deportivo</b><br />';
        $txt .= 'Descenso a Regional: <b>Dos Hermanas CF, CD Rota y Atlético Ceuta</b><br />';
        $txt .= '<hr />El At. Ceuta figura con dos puntos menos por sanción federativa. <br />';
        break;

        case 132:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>CD Manacor</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Constancia, Porto Cristo CF, CD Felanitx y  CD Llosetense</b><br />';
        $txt .= '<hr />El CD Llosetense figura con dos puntos menos por sanción federativa, por incomparecencia al partido Santa Eulalia - Llosetense. <br />';
        break;

        case 133:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>UD Las Palmas Atlético</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Atlético Paso, UD Gomera, UD Icodense y Real Artesano FC</b><br />';
        break;

        case 134:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>Yeclano CF</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Beniel, AD Sangonera y Moratalla CF</b><br />';
        break;

        case 135:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>CF Extremadura</b><br />';
        $txt .= 'Descenso a Regional: <b>Atlético Pueblonuevo, CD Orellana y CP Malpartida</b><br />';
        break;

        case 136:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>CD Izarra</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Beti Onak, CD Baztán y CD Corellano</b><br />';
        break;

        case 137:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>SD Huesca</b><br />';
        $txt .= 'Descenso a Regional: <b>Hernán Cortés CF, CDJ Tamarite, Gelsa CF y CF Luceni</b><br />';
        $txt .= '<hr />El CD Calatayud figura con dos puntos menos por sanción federativa. <br />';
        break;

        case 138:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>CD Valdepeñas</b><br />';
        $txt .= 'Descenso a Regional: <b>AD Campillo, CD La Roda y Puertollano Industrial</b><br />';

        break;

        case 148:
        $txt .= 'Campeón y Copa de Europa: <b>Real Madrid</b><br />';
        $txt .= 'Recopa de Europa: <b>FC Barcelona y Real Valladolid CF</b><br />';
        $txt .= 'Copa de la UEFA: <b>Valencia CF, Club Atlético de Madrid y Real Zaragoza CD</b><br />';
        $txt .= 'Promoción de Descenso a Segunda: <b>RCD Español y Real Betis Balompié</b><br />';
        $txt .= 'Descenso a Segunda: <b>Real Murcia CF y Elche CF</b><br />';

        break;

        case 149:
        $txt = 'Campeón: <b>CD Castellón</b><br />';
        $txt .= 'Ascenso a Primera: <b>CD Castellón y Rayo Vallecano</b><br />';
        $txt .= 'Promoción de Ascenso a Primera: <b>CD Tenerife y RCD Mallorca</b><br />';
        $txt .= 'Descenso a Segunda B: <b>FC Barcelona Atlético, UD Alzira, UE Lleida y Joventut Mollerussa</b><br />';
        $txt .= '<hr /><i>Promoción Permanencia en primera</i></b><br /><br />';
        $txt .= '28/06/1989 - RCD Español 1-0 RCD Mallorca<br />';
        $txt .= '28/06/1989 - CD Tenerife 4-0 Real Betis Balompié<br /><br />';
        $txt .= '02/07/1989 - <b>RCD Mallorca</b> 2-0 RCD Español<br />';
        $txt .= '02/07/1989 - Real Betis Balompié 1-0 <b>CD Tenerife</b><br /><br />';
        $txt .= 'Ascienden a Primera: <b>CD Tenerife y RCD Mallorca</b><br />';
        $txt .= 'Descienden a Segunda: <b>RCD Español y Real Betis Balompié</b><br />';

        break;

        case 150:
        $txt .= 'Campeón y Ascenso a Segunda: <b>Bilbao Athletic Club </b><br />';
        $txt .= 'Descenso a Tercera: <b>CD Arenteiro, Santoña CF, Real Oviedo Aficionado y Bergantiños CF</b><br />';
        break;

        case 151:
        $txt .= 'Campeón y Ascenso a Segunda: <b>Palamós CF</b><br />';
        $txt .= 'Descenso a Tercera: <b>CD Arnedo, UD Poblense, Terrassa FC y CD Santa Ponsa</b><br />';
        $txt .= '<hr />Al descender el FC Barcelona Atlético de Segunda División, el FC Barcelona Aficionados  se vio obligado a descender a Tercera, por ser ambos filiales del FC Barcelona.<br />';
        break;

        case 152:
        $txt .= 'Campeón y Ascenso a Segunda: <b>Atlético Madrileño</b><br />';
        $txt .= 'Descenso a Tercera: <b>UD San Sebastián Reyes, UP Plasencia, Betis Deportivo, CD Don Benito y SD Gimnástica Medinense</b><br />';
        $txt .= '<hr />La Gim. Medinense figura con dos puntos menos por incomparecencia al partido Marino - Gim. Medinense, que además se le dio por perdido. <br />';
        $txt .= 'El UD San Sebastián Reyes descendió a Tercera División por ser el peor de los decimosextos clasificados de los cuatro grupos. </b><br />';
        break;

        case 153:
        $txt .= 'Campeón y Ascenso a Segunda: <b>Levante UD</b><br />';
        $txt .= 'Descenso a Tercera: <b>Polideportivo Almería, Algeciras CF, CF Lorca Deportiva y Nules CF</b><br />';
        break;

        case 154:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>Juventud Cambados</b><br />';
        $txt .= 'Descenso a Regional: <b>Alondras CF, Sporting Sada, Céltiga FC y Atlético Orense</b><br />';

        break;

        case 163:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>Sporting Gijón Atlético </b><br />';
        $txt .= 'Descenso a Regional: <b>CD San Martín, Atlético La Camocha SD y El Entrego CD</b><br />';
        break;

        case 164:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>CD Laredo</b><br />';
        $txt .= 'Descenso a Regional: <b>Velarde Camargo CF, Ribamontán al Mar CF, Atlético Albericia, UD Sámano y CD Lope de Vega</b><br />';
        $txt .= '<hr />El partido Sámano - Ribamontán fue suspendido y no llegó a disputarse por ser intrascendente para la clasificación final. <br />';
        break;

        case 165:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>CD Santurtzi</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Aurrera Vitoria, Mutriku FT y CD Alegría</b><br />';
        break;

        case 166:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>Girona FC</b><br />';
        $txt .= 'Descenso a Regional: <b>CF Badalona, CD Tortosa, CP San Cristóbal, UE Vic y CF Calella</b><br />';
        $txt .= '<hr />Al descender el FC Barcelona Atlético de Segunda División, el FC Barcelona Aficionados  se vio obligado a descender a Tercera, por ser ambos filiales del FC Barcelona. Por ello, el Manlleu ascendió a Segunda División B. <br />';
        break;

        case 167:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>Benidorm CD</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Benicarló</b><br />';
        break;

        case 168:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>CD Colonia Moscardó</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Fuencarral, CD Ciempozuelos y UD Pozuelo</b><br />';
        break;

        case 169:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>CD Numancia</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Ejido, CD Toreno y UD Cacabelense</b><br />';
        break;

        case 170:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>CD Estepona</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Mojácar, Atlético La Zubia, Atlético Coín y CD Barea</b><br />';
        break;

        case 155:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>CD Utrera</b><br />';
        $txt .= 'Descenso a Regional: <b>UD Pilas, CD Miramar, Bollullos CF y CD Brenes</b><br />';
        break;

        case 156:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>Mallorca Atlético</b><br />';
        $txt .= 'Descenso a Regional: <b>UD Alcudia, UD Alaró, CD Santañy, CD Costa Calviá y CD Murense</b><br />';
        break;

        case 157:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>UD Salud</b><br />';
        $txt .= 'Descenso a Regional: <b>Arucas CF, UD Atalaya, CD San Andrés, UD Lanzarote, UD San Antonio y SD Santa Brígida</b><br />';
        $txt .= '<hr />El Artesano figura con dos puntos menos por sanción federativa, por incomparecencia al partido Gomera - Artesano que además se le dio por perdido. Lo mismo ocurrió con el Icodense en el partido Icodense - Ferreras.<br />';
        break;

        case 158:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>Orihuela Deportiva</b><br />';
        $txt .= 'Descenso a Regional: <b>Torreagüera CF y Callosa Deportiva</b><br />';
        break;

        case 159:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>CP Mérida</b><br />';
        $txt .= 'Descenso a Regional: <b>Cp Cabezuela, CD Coria, Racing Valverdeño, UD Fuente de Cantos y CD Atalaya</b><br />';
        break;

        case 160:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>CD Mirandés</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Urroztarra, CCyD Alberite y CD Iruña</b><br />';
        break;

        case 161:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>UD Barbastro</b><br />';
        $txt .= 'Descenso a Regional: <b>CF Illueca, CD Oliver y CF Jacetano</b><br />';
        break;

        case 162:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>CD Toledo</b><br />';
        $txt .= 'Descenso a Regional: <b>Yepes CF, AP Almansa, CD Sonseca, CD Mota del Cuervo y CD Unión Criptanense</b><br />';

        break;

        case 171:
        $txt .= 'Campeón y Copa de Europa: <b>Real Madrid</b><br />';
        $txt .= 'Recopa de Europa: <b>FC Barcelona</b><br />';
        $txt .= 'Copa de la UEFA: <b>Real Sociedad de Fútbol, Club Atlético de Madrid y Athletic Club</b><br />';
        $txt .= 'Promoción de descenso a Segunda: <b>Real Murcia CF y RCD Mallorca</b><br />';
        $txt .= 'Descenso a Segunda: <b>CE Sabadell y UD Las Palmas</b><br />';
        break;

        case 172:
        $txt = 'Campeón: <b>CD Málaga</b><br />';
        $txt .= 'Ascenso a Primera: <b>CD Málaga y Elche CF</b><br />';
        $txt .= 'Promoción de Ascenso a Primera: <b>Real Oviedo y Rayo Vallecano</b><br />';
        $txt .= 'Descenso a Segunda B: <b>Bilbao Athletic Club, Hércules CF, Granada CF y Cartagena FC</b><br />';
        $txt .= '<hr />El Castilla no pudo jugar la Promoción de Ascenso a Primera por ser filial del Real Madrid. </b><br />';
        $txt .= '<hr /><i>Promoción Permanencia en primera</i></b><br /><br />';
        $txt .= '29/05/1988 - Real Murcia CF 3-0 Rayo Vallecano<br />';
        $txt .= '29/05/1988 - Real Oviedo 2-1 RCD Mallorca<br /><br />';
        $txt .= '05/06/1988 - Rayo Vallecano 1-1 <b>Real Murcia CF</b><br />';
        $txt .= '05/06/1988 - RCD Mallorca 0-0 <b>Real Oviedo</b><br /><br />';
        $txt .= 'Asciende a Primera: <b>Real Oviedo</b><br />';
        $txt .= 'Permanece en Primera: <b>Real Murcia CF</b><br />';
        $txt .= 'Desciende a Segunda: <b>RCD Mallorca</b><br />';
        break;

        case 173:
        $txt .= 'Campeón y Ascenso a Segunda: <b>SD Éibar</b><br />';
        $txt .= 'Descenso a Tercera: <b>CD Laredo, Caudal Deportivo, SD Rayo Cantabria y RS Gimnástica</b><br />';
        break;

        case 174:
        $txt .= 'Campeón y Ascenso a Segunda: <b>Joventut Mollerussa</b><br />';
        $txt .= 'Descenso a Tercera: <b>CD Constancia, CD Mirandés, Girona FC y CD Júpiter</b><br />';
        break;

        case 175:
        $txt .= 'Campeón y Ascenso a Segunda: <b>UD Salamanca</b><br />';
        $txt .= 'Descenso a Tercera: <b>UD Las Palmas Atlético, AD Parla, CP Cacereño y Daimiel CF</b><br />';
        break;

        case 176:
        $txt .= 'Campeón y Ascenso a Segunda: <b>UD Alzira</b><br />';
        $txt .= 'Descenso a Tercera: <b>CD Mestalla, CD Ronda, Benidorm CD, UB Conquense y CD Cieza</b><br />';
        $txt .= '<hr />El Mestalla desciende a Tercera por ser el peor de los clasificados en 16ª posición de los cuatro grupos. <br />';
        break;

        case 177:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>Racing Club Ferrol</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Valladares, Portonovo SD y Flavia SD</b><br />';
        break;

        case 186:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>Real Oviedo Aficionado</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Tuilla, Canicas Atlético y UC Ceares</b><br />';
        break;

        case 187:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>SD Unión Club</b><br />';
        $txt .= 'Descenso a Regional: <b>SD Textil Escudo, CD Barquereño y SD San Martín Arena </b><br />';
        $txt .= '<hr />El SD Unión Club Astillero renunció al ascenso, cediendo su plaza al Santoña CF, segundo clasificado. <br />';
        break;

        case 188:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>Baracaldo CF</b><br />';
        $txt .= 'Descenso a Regional: <b>Club Portugalete, SD Erandio Club y UD Aretxabaleta</b><br />';
        break;

        case 189:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>Palamós CF</b><br />';
        $txt .= 'Descenso a Regional: <b>FC Santboià, CF Gavà y EC Granollers</b><br />';
        break;

        case 190:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>Nules CF </b><br />';
        $txt .= 'Descenso a Regional: <b>CD Benicarló, CD Castellón Aficionados, Monóvar CD y Novelda CF</b><br />';
        break;

        case 191:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>CD Pegaso</b><br />';
        $txt .= 'Descenso a Regional: <b>AD Maravillas, CD Coslada, AD Alcorcón y Atlético Velilla</b><br />';
        break;

        case 192:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>SD Gimnástica Medinense</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Velilla, CD Laguna, CF Briviesca, SC Uxama y Club Arévalo e Hijos</b><br />';
        break;

        case 193:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>Real Jaén CF</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Villanueva, CD Roquetas, CD Baza, Iliturgi CF y Vélez CF</b><br />';
        $txt .= '<hr />El Baza figura con dos puntos menos por sanción federativa. <br />';
        break;

        case 178:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>Algeciras CF</b><br />';
        $txt .= 'Descenso a Regional: <b>Ubrique Industrial, CD Mairena, África Ceutí, SD Imperio de Ceuta y CD Moguer</b><br />';
        $txt .= '<hr />El Moguer figura con dos puntos menos por sanción federativa. <br />';
        break;

        case 179:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>CD Santa Ponsa</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Santañy, CD Andraitx y CD Escolar</b><br />';
        break;

        case 180:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>CD Marino</b><br />';
        $txt .= 'Descenso a Regional: <b>UD Güimar y CD Unión Tejina</b><br />';
        break;

        case 181:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>Torrevieja CF</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Almoradí, CD Alberca y La Unión Athletic</b><br />';
        $txt .= '<hr />El Almoradí figura con dos puntos menos por sanción federativa, por incomparecencia al partido Almoradí - Torrevieja, que además se le dio por perdido. <br />';
        break;

        case 182:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>CD Don Benito</b><br />';
        $txt .= 'Descenso a Regional: <b>CD La Albuera, CD Azuaga y CD Aceuchal</b><br />';
        break;

        case 183:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>CD Calahorra</b><br />';
        $txt .= 'Descenso a Regional: <b>SD Alsasua, Yagüe CF y Atlético Cirbonero</b><br />';
        break;

        case 184:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>CD Binéfar</b><br />';
        $txt .= 'Descenso a Regional: <b>CD La Almunia, Mequinenza CD y CD Estadilla</b><br />';
        $txt .= '<hr />El Estadilla figura con dos puntos menos por sanción federativa, por incomparecencia al partido Estadilla - Sabiñánigo, que además se le da por perdido. <br />';
        break;

        case 185:
        $txt .= 'Campeón y Ascenso a Segunda B: <b>Tomelloso CF</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Manchego, Herencia CF y CD Illescas</b><br />';

        //temporada 1986-87
        break;

        case 1680:
        $txt .= 'Campeón y Copa de Europa: <b>Real Madrid CF</b><br />';
        $txt .= 'Copa de la UEFA: <b>FC Barcelona, RCD Español y Real Sporting Gijón</b><br />';
        break;

        case 1681:
        $txt .= 'Recopa de Europa: <b>Real Sociedad de Fútbol</b><br />';

        break;

        case 1682:
        $txt .= 'Promoción de descenso a Segunda: <b>Club Atlético Osasuna, Real Racing Santander y Cádiz CF</b><br />';
        $txt .= '<hr />En principio, los tres últimos clasificados de este grupo deberían haber descendido a Segunda División, pero al decidirse mediada la temporada ampliar la Primera a veinte equipos, sólo le correspondía descender al último clasificado, reclamando por ello el Cádiz, y resolviéndose que se jugara una promoción entre los tres a los que hubiera correspondido descender.<br />';
        $txt .= '<br /><i>Promoción Permanencia en Primera</i><br />';
        $txt .= '     24-JUN-1987 Racing Santander  1 - 1  Cádiz<br />';
        $txt .= '     28-JUN-1987 Cádiz  1 - 1  Osasuna <br />';
        $txt .= '     30-JUN-1987 Osasuna  2 - 0  Racing Santander <br /><br />';
        $txt .= 'Permanencia en Primera: <b>Club Atlético Osasuna y Cádiz CF</b><br />';
        $txt .= 'Descenso a Segunda: <b>Real Racing Santander</b><br />';
        break;

        case 1684:
        $txt = 'Campeón: <b>Valencia CF</b><br />';
        $txt .= 'Ascenso a Primera: <b>Valencia CF y CD Logroñés</b><br />';
        $txt .= '<hr />Se considera al Valencia como campeón de Segunda A este año, por tener más puntos que el Celta, campeón del Grupo A2.<br />';
        $txt .= 'Asciende el Logroñés, por obtener mejor clasificación que el Sestao, subcampeón del Grupo A2.<br />';
        break;

        case 1685:
        $txt .= 'Ascenso a Primera: <b>RC Celta</b><br />';
        $txt .= '<hr />El Celta no se considera campeón de Segunda A por obtener peor clasificación que el Valencia, campeón del Grupo A1.</b><br />';
        $txt .= 'El Sestao no asciende a Primera por obtener peor clasificación que el Logroñés, subcampeón del Grupo A1.</b><br />';
        break;

        case 1683:
        $txt .= 'En principio, en este grupo deberían haber descendido los tres últimos clasificados, pero no fue así, por ampliarse la Primera y Segunda división a veinte equipos para la temporada siguiente.<br />';

        break;

        case 194:
        $txt .= 'Grupo A - Play Off por el titulo: <b>Real Madrid CF, FC Barcelona, RCD Español, Real Sporting de Gijón, Real Zaragoza CD y RCD Mallorca</b><br /><br />';
        $txt .= 'Grupo B: <b>Club Atlético de Madrid, Real Sociedad de Fútbol, Sevilla FC, Real Betis Balompié, Real Murcia CF y Real Valladolid CF</b><br /><br />';
        $txt .= 'Grupo C - Fase de descenso: <b>Athletic Club, UD Las Palmas, Club Atlético Osasuna, Real Racing Club, CE Sabadell FC y Cádiz CF</b><br /><br />';
        $txt .= '<hr />El partido Sabadell - Osasuna, inicialmente 1-0, se anuló por alineación indebida del equipo local, repitiéndose posteriormente con el resultado de 2-1.<br />';

        break;

        case 195:
        $txt .= 'Fase de Ascenso - Grupo A: <b>Valencia CF, CD Logroñés, RC Recreativo, Elche CF, Bilbao Athletic Club y Hércules CF</b><br /><br />';
        $txt .= 'Fase de Ascenso - Grupo B: <b>RC Deportivo, RC Celta, Sestao Sport Club, Rayo Vallecano, CD Castellón y FC Barcelona Atlético</b><br /><br />';
        $txt .= 'Fase de descenso: <b>CD Málaga, Real Oviedo, UE Figueres, Cartagena FC, Castilla CF y Xerez CD</b><br /><br />';

        break;

        case 196:
        $txt = 'Campeón: <b>CD Tenerife</b><br />';
        $txt .= 'Ascenso a Segunda A: <b>CD Tenerife, UE Lleida, Granada CF y Real Burgos CF</b><br />';
        break;

        case 197:
        $txt = 'Campeón: <b>CD Endesa As Pontes</b><br />';
        $txt .= 'Ascenso a Segunda B: <b>CD Endesa As Pontes, CD Arenteiro, CD Lalín, Bergantiños CF y Arosa SC</b><br />';
        $txt .= 'Promoción de Descenso a Regional: <b>CD Boiro, Vivero CF y Corujo CF</b><br />';
        break;

        case 205:
        $txt = 'Campeón: <b>Caudal Deportivo</b><br />';
        $txt .= 'Ascenso a Segunda B: <b>Caudal Deportivo, Real Avilés Industrial y UP Langreo</b><br />';
        $txt .= 'Promoción de Descenso a Regional: <b>CD San Martín, UC Ceares y Atlético La Camocha SD </b><br />';
        break;

        case 206:
        $txt = 'Campeón: <b>SD Rayo Cantabria</b><br />';
        $txt .= 'Ascenso a Segunda B: <b>SD Rayo Cantabria, RS Gimnástica y CD Laredo</b><br />';
        $txt .= 'Promoción de Descenso a Regional: <b>SD Gama, SD San Martín Arena y SD Buelna</b><br />';
        $txt .= '<hr />El Buelna figura con dos puntos menos por sanción federativa, debida a su incomparecencia al partido Albericia - Buelna que, además, fue dado por vencedor al primero. </b><br />';
        break;

        case 207:
        $txt = 'Campeón: <b>SCD Durango</b><br />';
        $txt .= 'Ascenso a Segunda B: <b>SCD Durango, CD Basconia y SD Lemona</b><br />';
        $txt .= 'Promoción de Descenso a Regional: <b>CD Mutriku, SD Gernika y Santutxu FC</b><br />';
        break;

        case 208:
        $txt = 'Campeón: <b>FC Barcelona Aficionados </b><br />';
        $txt .= 'Ascenso a Segunda B: <b>FC Barcelona Aficionados, Joventut Mollerussa, Terrassa FC, Gimnàstic de Tarragona, CD L´Hospitalet, CD Júpiter, Girona FC y FC Andorra</b><br />';
        $txt .= 'Promoción de Descenso a Regional: <b>AE Prat, CF Reus Deportivo y UE Sant Andreu</b><br />';
        break;

        case 209:
        $txt = 'Campeón: <b>CD Olímpic</b><br />';
        $txt .= 'Ascenso a Segunda B: <b>CD Olímpic, Levante UD, Villarreal CF, Benidorm CD y CD Mestalla</b><br />';
        $txt .= 'Promoción de Descenso a Regional: <b>Vinaroz CF, Rayo Ibense CF y Catarroja CF</b><br />';
        break;

        case 210:
        $txt = 'Campeón: <b>AD Parla</b><br />';
        $txt .= 'Ascenso a Segunda B: <b>AD Parla, CD Pegaso, CD Leganés, RSD Alcalá, UB Conquense, Getafe CF y UD San Sebastián Reyes</b><br />';
        $txt .= 'Promoción de Descenso a Regional: <b>CF Fuenlabrada, CD La Roda y CD Guadalajara</b><br />';
        break;

        case 211:
        $txt = 'Campeón: <b>SD Ponferradina</b><br />';
        $txt .= 'Ascenso a Segunda B: <b>SD Ponferradina, CyD Leonesa y Real Ávila CF</b><br />';
        $txt .= 'Promoción de Descenso a Regional: <b>CD Béjar Industrial, CD Universitario y SD Gimnástica Medinense</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Guardo</b><br />';
        $txt .= '<hr />La Gim. Arandina se retiró de este grupo una vez iniciada la competición, anulándose los resultados de todos los partidos que había disputado hasta la fecha. </b><br />';
        break;

        case 212:
        $txt = 'Campeón: <b>Linares CF</b><br />';
        $txt .= 'Ascenso a Segunda B: <b>Linares CF, Atlético Marbella, UD Melilla y CD Ronda</b><br />';
        $txt .= 'Promoción de Descenso a Regional: <b>Juventud Torremolinos, CD Villanueva y Atlético Macael CF</b><br />';
        $txt .= '<hr />El Villanueva figura con dos puntos menos por sanción federativa, debido a su incomparecencia al partido U.D. Melilla - Villanueva, que además fue dado por vencedor al primero. </b><br />';
        break;

        case 198:
        $txt = 'Campeón: <b>Sevilla Atlético </b><br />';
        $txt .= 'Ascenso a Segunda B: <b>Sevilla Atlético , Betis Deportivo y Atlético Sanluqueño</b><br />';
        $txt .= 'Promoción de Descenso a Regional: <b>CD Pozoblanco, CD Egabrense y África Ceutí</b><br />';
        break;

        case 199:
        $txt = 'Campeón: <b>CF Sporting Mahonés</b><br />';
        $txt .= 'Ascenso a Segunda B: <b>CF Sporting Mahonés, CD Atlético Baleares y CD Badía-Cala Millor</b><br />';
        break;

        case 200:
        $txt = 'Campeón: <b>CD Maspalomas</b><br />';
        $txt .= 'Ascenso a Segunda B: <b>CD Maspalomas, UD Las Palmas Atlético y UD Telde</b><br />';
        $txt .= 'Promoción de Descenso a Regional: <b>UD Orotava, CD Juventud Silense y UD Tacoronte</b><br />';
        break;

        case 201:
        $txt = 'Campeón: <b>CD Cieza</b><br />';
        $txt .= 'Ascenso a Segunda B: <b>CD Cieza, CD Eldense y CF Lorca Deportiva </b><br />';
        $txt .= 'Promoción de Descenso a Regional: <b>Atlético de Albacete </b><br />';
        break;

        case 202:
        $txt = 'Campeón: <b>CP Cacereño</b><br />';
        $txt .= 'Ascenso a Segunda B: <b>CP Cacereño, CD Badajoz y UP Plasencia</b><br />';
        $txt .= 'Promoción de Descenso a Regional: <b>CD Azuaga, CP Guareña y CD La Albuera</b><br />';
        $txt .= '<hr />El Fuente Cantos figura con dos puntos menos por sanción federativa, debido a su incomparecencia al partido Extremadura - Fuente Cantos, que además fue dado por vencedor al primero. </b><br />';
        break;

        case 203:
        $txt = 'Campeón: <b>Atlético Osasuna Promesas </b><br />';
        $txt .= 'Ascenso a Segunda B: <b>Atlético Osasuna Promesas, CD Arnedo y CD Mirandés</b><br />';
        $txt .= 'Promoción de Descenso a Regional: <b>CD Iruña, SD Alsasua y AD Noaín</b><br />';
        break;

        case 204:
        $txt = 'Campeón: <b>CD Endesa Andorra</b><br />';
        $txt .= 'Ascenso a Segunda B: <b>CD Endesa Andorra, CD Teruel y UD Fraga</b><br />';
        $txt .= 'Promoción de Descenso a Regional: <b>Atlético de Monzón, SD Tarazona y CD Estadilla</b><br />';

        //temporada 1985-86
        break;

        case 213:
        $txt .= 'Campeón y Copa de Europa: <b>Real Madrid CF</b><br />';
        $txt .= 'Recopa de Europa: <b>Real Zaragoza CD</b><br />';
        $txt .= 'Copa de la UEFA: <b>FC Barcelona, Athletic Club y Club Atlético de Madrid</b><br />';
        $txt .= 'Descenso a Segunda: <b>Valencia CF, Hércules CF y RC Celta</b><br />';
        break;

        case 214:
        $txt = 'Campeón: <b>Real Murcia CF</b><br />';
        $txt .= 'Ascenso a Primera: <b>Real Murcia CF, CE Sabadell FC y RCD Mallorca</b><br />';
        $txt .= 'Descenso a Segunda B: <b>Albacete Balompié, Deportivo Aragón, CD Tenerife y Atlético Madrileño</b><br />';
        break;

        case 215:
        $txt .= 'Campeón y Ascenso a Segunda A: <b>UD Figueras</b><br />';
        $txt .= 'Descenso a Tercera: <b>San Sebastián CF, Pontevedra CF, CD L´Hospitalet, Zamora CF, CD Binéfar, CD Endesa Andorra, Gimnàstic de Tarragona, FC Andorra, Sporting Gijón Atlético, Arosa SC, SD Compostela, FC Barcelona Aficionados y CD Lalín</b><br />';
        break;

        case 216:
        $txt .= 'Campeón y Ascenso a Segunda A: <b>Xerez CD</b><br />';
        $txt .= 'Descenso a Tercera: <b>CF Calvo Sotelo, Orihuela Deportiva, Levante UD, AD Parla, UP Plasencia, CF Talavera, Linares CF, Betis Deportivo, CD Manacor, RSD Alcalá, Real Jaén CF, Algeciras CF y CF Lorca Deportiva</b><br />';
        break;

        case 217:
        $txt = 'Campeón: <b>CD Lugo</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda B: <b>CD Lugo y CD Endesa As Pontes </b><br />';
        $txt .= 'Descenso a Regional: <b>Tyde FC, Club Lemos, Marín CF, Club Turista y San Martín CF</b><br />';
        break;

        case 223:
        $txt = 'Campeón: <b>UP Langreo</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda B: <b>UP Langreo y Caudal Deportivo</b><br />';
        break;

        case 224:
        $txt = 'Campeón: <b>SD Éibar</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda B: <b>SD Éibar y Baracaldo CF</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Elgóibar, CD Bergara y CD Ortuella</b><br />';
        break;

        case 225:
        $txt = 'Campeón: <b>Atlético Osasuna Promesas</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda B: <b>Atlético Osasuna Promesas y SD Huesca</b><br />';
        break;

        case 226:
        $txt .= 'Campeón y Promoción de Ascenso a Segunda B: <b>Joventut Mollerussa</b><br />';
        $txt .= 'Descenso a Regional: <b>FC Martinenc, CD Europa, CD Masnou, UA Horta, FC Vilafranca, CF Badalona y CF Gavà</b><br />';
        $txt .= '<hr />Por incomparecencia al partido Banyoles - Igualada, el primero es sancionado con la pérdida del partido, descontándose además dos puntos de su clasificación.<br />';
        $txt .= 'El Girona fue excluido de la Promoción de ascenso por ser uno de los dos peores subcampeones de todos los grupos, excepto el IX, X y XIV. <br />';

        break;

        case 227:
        $txt = 'Campeón: <b>UD Alcira</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda B: <b>UD Alcira y CF Gandía</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Villena y UD Carcagente</b><br />';
        break;

        case 228:
        $txt .= 'Campeón y Promoción de Ascenso a Segunda B: <b>CD Leganés</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Móstoles, Aranjuez CF, CD Azuqueca, Tomelloso CF, CD San Fernando, CD Colonia Moscardó y CD Fuensalida</b><br />';
        $txt .= '<hr />El CD Valdepeñas fue excluido de la Promoción de ascenso por ser uno de los dos peores subcampeones de todos los grupos, sin contar el IX, X y XIV. <br />';
        break;

        case 229:
        $txt = 'Campeón: <b>CyD Leonesa</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda B: <b>CyD Leonesa y SD Ponferradina</b><br />';
        $txt .= 'Descenso a Regional: <b>UD Toresana, SDC Coyanza, CF Venta de Baños y CD Olmedo</b><br />';
        $txt .= '<hr />Por incomparecencia al partido Toreno - Olmedo, este último es sancionado con la pérdida del partido, descontándosele además dos puntos de su clasificación.<br />';
        break;

        case 230:
        $txt .= 'Campeón y Promoción de Ascenso a Segunda B: <b>Polideportivo Almería</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Alhaurino, Iliturgi CF, CD Fuengirola y Melilla FC</b><br />';
        $txt .= '<hr />El Marbella quedó excluido de la Promoción de ascenso por ser el peor segundo de los grupos IX y X. </b><br />';
        break;

        case 218:
        $txt = 'Campeón: <b>Sevilla Atlético </b><br />';
        $txt .= 'Promoción de Ascenso a Segunda B: <b>Sevilla Atlético y Coria CF</b><br />';
        $txt .= 'Descenso a Regional: <b>Jerez Industrial, Chiclana CF, SD Imperio de Ceuta, Puerto Real CF y Rute CF</b><br />';
        break;

        case 219:
        $txt = 'Campeón: <b>Mallorca Atlético</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda B: <b> Mallorca Atlético y CD Atlético Baleares</b><br />';
        $txt .= 'Descenso a Regional: <b>Atlético Ciudadela CF, CD Felanitx y CD Margaritense</b><br />';
        break;

        case 220:
        $txt = 'Campeón: <b>CD Maspalomas</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda B: <b>CD Maspalomas y Las Palmas Atlético</b><br />';
        $txt .= 'Descenso a Regional: <b>Tenerife Aficionados, UD Realejos, SD Santa Brígida y Racing CF</b><br />';
        $txt .= '<hr />Por incomparecencia al partido Silense - Racing, el último es sancionado con la pérdida del partido, descontándosele además dos puntos de la clasificación.<br />';
        break;

        case 221:
        $txt = 'Campeón: <b>CD Eldense</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda B: <b>CD Eldense y Bigastro CF</b><br />';
        $txt .= 'Descenso a Regional: <b>Olímpico de Totana, Caravaca CF y Alcantarilla CF</b><br />';
        break;

        case 222:
        $txt .= 'Campeón y Promoción de Ascenso a Segunda B: <b>CD Badajoz</b><br />';
        $txt .= 'Descenso a Regional: <b>Olivenza CP, SP Villafranca, CD Castuera y CD Calamonte</b><br />';
        $txt .= 'El Don Benito quedó excluido de la Promoción de Ascenso, por participar en ella un sólo equipo del grupo XIV. <br />';

        //temporada 1984-85
        break;

        case 1678:
        $txt .= 'Ascienden a Segunda B: <b>UP Plasencia, CD Lalín, Betis Deportivo, Córdoba CF, CD Orense y Real Burgos CF</b><br />';

        break;

        case 231:
        $txt .= 'Campeón y Copa de Europa: <b>Barcelona</b><br />';
        $txt .= 'Recopa de Europa: <b>Club Atlético de Madrid</b><br />';
        $txt .= 'Copa de la UEFA: <b>Athletic Club, Sporting Gijón, Real Madrid CF y Club Atlético Osasuna</b><br />';
        $txt .= 'Descenso a Segunda: <b>CD Málaga, Elche CF  y Real Murcia CF</b><br />';
        break;

        case 232:
        $txt = 'Campeón: <b>UD Las Palmas</b><br />';
        $txt .= 'Ascenso a Primera: <b>UD Las Palmas, Cádiz CF y RC Celta</b><br />';
        $txt .= 'Descenso a Segunda B: <b>UD Salamanca, Granada CF, CF Calvo Sotelo y CF Lorca Deportiva</b><br />';
        $txt .= '<hr />El partido Lorca Deportiva - Calvo Sotelo (inicialmente 7-0) se repitió en Murcia, por alineación indebida del Lorca Deportiva.<br />';
        break;

        case 233:
        $txt = 'Campeón: <b>Sestao Sport Club</b><br />';
        $txt .= 'Ascenso a Segunda A: <b>Sestao Sport Club y Deportivo Aragón</b><br />';
        $txt .= 'Descenso a Tercera: <b>Atlético Osasuna Promesas, Avilés Industrial y SD Erandio Club</b><br />';
        break;

        case 234:
        $txt = 'Campeón: <b>Rayo Vallecano</b><br />';
        $txt .= 'Ascenso a Segunda A: <b>Rayo Vallecano y Albacete Balompié</b><br />';
        $txt .= 'Descenso a Tercera: <b>Atlético Marbella, CD Badajoz y CD Antequerano</b><br />';
        break;

        case 235:
        $txt = 'Campeón: <b>CD Lalín</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda B: <b>CD Lalín y CD Orense</b><br />';
        $txt .= 'Descenso a Regional: <b>Noya SD</b><br />';
        break;

        case 241:
        $txt = 'Campeón: <b>Club Siero</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda B: <b>Club Siero y CD San Martín</b><br />';
        $txt .= 'Descenso a Regional: <b>Real Titánico, Club Europa de Nava, CD Cayón y SD Barreda Balompié</b><br />';
        break;

        case 242:
        $txt = 'Campeón: <b>CD Basconia</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda B: <b>CD Basconia y SD Éibar</b><br />';
        $txt .= 'Descenso a Regional:<b> CD Aurrerá Ondárroa, SD Lemona, CD Getxo y SD Deusto</b><br />';
        break;

        case 243:
        $txt .= 'Campeón y Promoción de Ascenso a Segunda B: <b>SD Huesca</b><br />';
        $txt .= 'Descenso a Regional: <b>UD Barbastro, SD Tarazona, CD Alfaro y UDC Chantrea</b><br />';
        $txt .= '<hr />El Izarra quedó excluido de participar en la Promoción de Ascenso por ser uno de los dos peores segundos de todos los grupos de Tercera, excepto el IX, X y XIV. <br />';
        break;

        case 244:
        $txt = 'Campeón: <b>UE Sant Andreu</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda B: <b>UE Sant Andreu y CF Lloret</b><br />';
        $txt .= 'Descenso a Regional: <b>FC Santboià, CF Reus Deportivo y UE Olot</b><br />';
        break;

        case 245:
        $txt = 'Campeón: <b>CD Mestalla</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda B: <b>CD Mestalla y UD Alcira</b><br />';
        $txt .= 'Descenso a Regional: <b>Torrent CF, UD Aspense y CD Denia</b><br />';
        break;

        case 246:
        $txt = 'Campeón: <b>Real Madrid CF Aficionados</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda B: <b>CD Valdepeñas</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Ciempozuelos, Gimnástico Alcázar y AD Arganda</b><br />';
        $txt .= '<hr />En principio, el Valdepeñas quedó excluido de jugar la Promoción de Ascenso, por ser uno de los peores segundos de todos los grupos de Tercera, excepto el IX, X y XIV. Sin embargo, al renunciar a dicha promoción el Real Madrid Af, su plaza pasó al Valdepeñas. <br />';
        break;

        case 616:
        $txt = 'Campeón: <b>Real Burgos CF</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda B: <b>Real Burgos CF y CyD Leonesa</b><br />';
        $txt .= 'Descenso a Regional: <b>La Bañeza FC y CP Salas</b><br />';
        break;

        case 617:
        $txt .= 'Campeón y Promoción de Ascenso a Segunda B: <b>Martos CD</b><br />';
        $txt .= 'Descenso a Regional: <b>UD San Pedro, Atlético Benamiel CF, Loja CD, CF Industrial de Melilla y Úbeda CF</b><br />';
        $txt .= '<hr />El Polideportivo Almería quedó excluido de la Promoción de Ascenso por ser el peor segundo de los grupos IX y X. <br />';
        break;

        case 236:
        $txt = 'Campeón: <b>Betis Deportivo</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda B: <b>Betis Deportivo y Córdoba CF</b><br />';
        $txt .= 'Descenso a Regional: <b>Racing de Ceuta</b><br />';
        break;

        case 237:
        $txt = 'Campeón: <b>Mallorca Atlético</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda B: <b>Mallorca Atlético y CD Murense</b><br />';
        $txt .= 'Descenso a Regional: <b>Porto Cristo CF, CD Artá y CD Xilvar</b><br />';
        break;

        case 238:
        $txt = 'Campeón: <b>CD Mensajero</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda B: <b>CD Mensajero y UD Telde</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Unión Tejina, Ferreras CF y CD Victoria</b><br />';
        $txt .= '<hr />Las Palmas Atlético figura con dos puntos menos por sanción federativa. <br />';
        break;

        case 239:
        $txt = 'Campeón: <b>CD Eldense</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda B: <b>CD Eldense y CD Cieza</b><br />';
        $txt .= 'Descenso a Regional: <b>AP Almansa, Jumilla CF y Atlético Muleño</b><br />';
        break;

        case 240:
        $txt .= 'Campeón y Promoción de Ascenso a Segunda B: <b>UP Plasencia</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Atalaya y CP Vasco Núñez</b><br />';
        $txt .= '<hr />El CF Extremadura quedó excluido de la Promoción de Ascenso, por participar en ella un sólo equipo del grupo XIV.<br />';
        $txt .= 'Al descender el CD Badajoz de Segunda B, el CD Badajoz Promesas fue obligado a descender a Regional, salvándose del descenso el Calamonte, que es a quien le hubiera correspondido.<br />';

        //temporada 1983-84
        break;

        case 1418:
        $txt .= 'Ascienden a Segunda B: <b>Pontevedra CF, Orihuela Deportiva, Atlético Marbella, CD Manacor, Levante UD y FC Barcelona Aficionados</b><br />';

        break;

        case 618:
        $txt .= 'Campeón y Copa de Europa: <b>Athletic Club</b><br />';
        $txt .= 'Recopa de Europa: <b>FC Barcelona</b><br />';
        $txt .= 'Copa de la UEFA: <b>Real Madrid CF, Atlético de Madrid y Real Betis Balompié</b><br />';
        $txt .= 'Descenso a Segunda: <b>Cádiz CF, RCD Mallorca y UD Salamanca</b><br />';
        break;

        case 619:
        $txt = 'Campeón: <b>Castilla CF</b><br />';
        $txt .= 'Ascenso a Primera: <b>Hércules CF, Racing Santander y Elche CF</b><br />';
        $txt .= 'Descenso a Segunda B: <b>Linares CF, Algeciras CF, Palencia CF y Rayo Vallecano</b><br />';
        $txt .= '<hr />El partido Bilbao Ath. - Cartagena (inicialmente 3-1) se repitió en Vallecas, por alineación indebida del Bilbao Ath. </b><br />';
        break;

        case 620:
        $txt = 'Campeón: <b>CE Sabadell CF</b><br />';
        $txt .= 'Ascenso a Segunda A: <b>CE Sabadell CF y CD Logroñés</b><br />';
        $txt .= 'Descenso a Tercera: <b>Baracaldo CF, SD Huesca y Racing Club Ferrol</b><br />';
        break;

        case 621:
        $txt = 'Campeón: <b>CF Lorca Deportiva</b><br />';
        $txt .= 'Ascenso a Segunda A: <b>CF Lorca Deportiva y CF Calvo Sotelo</b><br />';
        $txt .= 'Descenso a Tercera: <b>CD Antequerano, Córdoba CF y SD Ibiza</b><br />';
        break;

        case 622:
        $txt = 'Campeón: <b>Pontevedra CF</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda B: <b>Pontevedra CF y CD Orense</b><br />';
        $txt .= 'Descenso a Regional: <b>Flavia SD, Atlético Riveira y Eume Deportivo</b><br />';
        break;

        case 628:
        $txt = 'Campeón: <b>Caudal Deportivo</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda B: <b>Caudal Deportivo y Club Siero</b><br />';
        $txt .= 'Descenso a Regional: <b>CF Deportiva Piloñesa, SD Unión Club y SD Buelna</b><br />';
        break;

        case 629:
        $txt = 'Campeón: <b>CD Santurce</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda B: <b>CD Santurce y SD Éibar</b><br />';
        $txt .= 'Descenso a Regional: <b>UD Arechavaleta, SD Ilintxa, Mondragón CF y CD Touring</b><br />';
        break;

        case 630:
        $txt .= 'Campeón y Promoción de Ascenso a Segunda B: <b>CD Tudelano</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Utrillas, Club Burladés, Haro Deportivo y CF Jacetano</b><br />';
        $txt .= '<hr />El Numancia quedó excluido de jugar la promoción de ascenso por ser uno de los dos peores segundos de todos los grupos de tercera, sin contar el X y el XIV.<br />';
        break;

        case 631:
        $txt .= 'Campeón y Promoción de Ascenso a Segunda B: <b>FC Barcelona Aficionados </b><br />';
        $txt .= 'Descenso a Regional: <b>CD Tortosa y UD Vic</b><br />';
        $txt .= '<hr />El Lloret quedó excluido de jugar la promoción de ascenso por ser uno de los dos peores segundos de todos los grupos de tercera, sin contar el X y el XIV. <br />';
        break;

        case 632:
        $txt = 'Campeón: <b>UD Alcira</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda B: <b>UD Alcira y Levante UD</b><br />';
        $txt .= 'Descenso a Regional: <b>UD Vall de Uxó y Paterna CF</b><br />';
        break;

        case 633:
        $txt = 'Campeón: <b>CD Pegaso</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda B: <b>CD Pegaso y CD Manchego</b><br />';
        $txt .= 'Descenso a Regional: <b>AD Torrejón y AD Tarancón</b><br />';
        $txt .= '<hr />El R. Madrid Af. renunció a participar en la Promoción de Ascenso, cediendo su plaza al Manchego.<br />';
        break;

        case 634:
        $txt = 'Campeón: <b>Real Burgos CF</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda B: <b>Real Burgos CF y CyD Leonesa</b><br />';
        $txt .= 'Descenso a Regional: <b>UD Cacabelense, CD Guardo y CD Ejido</b><br />';
        break;

        case 635:
        $txt = 'Campeón: <b>UD Fuengirola</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda B: <b>UD Fuengirola y Atlético Marbella</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Torreperogil, Recreativo Bailén CF y CD Motril</b><br />';
        $txt .= '<hr />Por incomparecencia a su partido en campo del Torreperogil, se le dio por perdido el partido al Motril, descontándosele además dos puntos de su clasificación.<br />';
        break;

        case 623:
        $txt .= 'Campeón y Promoción de Ascenso a Segunda B: <b>Sevilla Atlético </b><br />';
        $txt .= 'Descenso a Regional: <b>Ayamonte CF, CD Alcalá, Atlético Lucentino Industrial y Riotinto Balompié</b><br />';
        $txt .= '<hr />El Betis Dep. quedó excluido de jugar la Promoción de Ascenso por haberse separado el antiguo Grupo X en dos; los actuales X y XIV.<br />';
        break;

        case 624:
        $txt = 'Campeón: <b>CD Constancia</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda B: <b>CD Constancia y CD Manacor</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Ses Salines, CD Santañy y CD Binisalem</b><br />';
        break;

        case 625:
        $txt = 'Campeón: <b>UD Güimar</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda B: <b>UD Güimar y CD Mensajero</b><br />';
        $txt .= 'Descenso a Regional: <b>UD San Antonio, UD Tamaraceite y Real Artesano FC</b><br />';
        $txt .= '<hr />El partido Güimar - Mensajero se suspendió con el resultado de 2-1 por retirada del equipo visitante. La Federación dio por definitivo el resultado y sancionó al Mensajero con la pérdida de dos puntos. </b><br />';
        break;

        case 626:
        $txt = 'Campeón: <b>CD Eldense</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda B: <b>CD Eldense y Orihuela Deportiva</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Molinense y CF Huercalense</b><br />';
        break;

        case 627:
        $txt .= 'Campeón y Promoción de Ascenso a Segunda B: <b>CD Díter Zafra</b><br />';
        $txt .= 'Descenso a Regional: <b>AD Puebla Patria, CD Quintana y AD Llerenense</b><br />';
        $txt .= '<hr />El Plasencia quedó excluido de jugar la Promoción de Ascenso por haberse separado el antiguo Grupo X en dos; los actuales X y XIV.<br />';

        //temporada 1982-83
        break;

        case 1417:
        $txt .= 'Ascienden a Segunda B: <b>UD Figueras, RB Linense, Arosa SC, Zamora CF , Deportivo Aragón y CD Ensidesa</b><br />';

        break;

        case 636:
        $txt .= 'Campeón y Copa de Europa:<b> Athletic Club</b><br />';
        $txt .= 'Recopa de Europa: <b>FC Barcelona</b><br />';
        $txt .= 'Copa de la UEFA: <b>Real Madrid CF, Atlético de Madrid y Sevilla FC</b><br />';
        $txt .= 'Descenso a Segunda: <b>UD Las Palmas, RC Celta y Racing Santander</b><br />';
        break;

        case 637:
        $txt = 'Campeón: <b>Real Murcia CF</b><br />';
        $txt .= 'Ascenso a Primera: <b>Real Murcia CF, Cádiz CF y RCD Mallorca</b><br />';
        $txt .= 'Descenso a Segunda B: <b>Deportivo Alavés, CE Sabadell CF, Xerez CD y Córdoba CF</b><br />';

        break;

        case 638:
        $txt = 'Campeón: <b>Bilbao Athletic Club </b><br />';
        $txt .= 'Ascenso a Segunda A: <b>Bilbao Athletic Club y CD Tenerife</b><br />';
        $txt .= 'Descenso a Tercera: <b>SD Erandio Club, CyD Leonesa y Reus Deportivo</b><br />';

        break;

        case 639:
        $txt = 'Campeón: <b>Granada CF</b><br />';
        $txt .= 'Ascenso a Segunda A: <b>Granada CF y Algeciras CF</b><br />';
        $txt .= 'Descenso a Tercera: <b>UD Fuengirola, CD San Fernando y AD Torrejón</b><br />';

        break;

        case 640:
        $txt = 'Campeón: <b>Pontevedra CF</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>Pontevedra CF y Arosa SC</b><br />';
        $txt .= 'Descenso a Regional: <b>Gondomar CF y Porriño Industrial CF</b><br />';
        break;

        case 645:
        $txt = 'Campeón: <b>CD Ensidesa</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>CD Ensidesa y UP Langreo</b><br />';
        $txt .= 'Descenso a Regional: <b>CF Deportiva Piloñesa, Club Europa de Nava y Club Asturias</b><br />';
        break;

        case 646:
        $txt = 'Campeón: <b>SCD Durango</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>SCD Durango y SD Éibar</b><br />';
        $txt .= 'Descenso a Regional: <b>SD Guernica Club, CD Lagún Onak, Zorroza CF y CD Alavés Aficionados</b><br />';
        break;

        case 647:
        $txt = 'Campeón: <b>Deportivo Aragón</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>Deportivo Aragón y AD Sabiñánigo</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Oberena y CD Tauste</b><br />';
        break;

        case 648:
        $txt = 'Campeón: <b>UE Olot</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>UE Olot y UD Figueras</b><br />';
        $txt .= 'Descenso a Regional: <b>UD Canovellas, CD La Cava y CE Mataró</b><br />';
        break;

        case 649:
        $txt = 'Campeón: <b>CD Mestalla</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>CD Mestalla y Levante UD</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Denia, UD Alginet y UD Puzol</b><br />';

        break;

        case 650:
        $txt = 'Campeón: <b>Aranjuez CF</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>Aranjuez CF y CD Manchego</b><br />';
        $txt .= 'Descenso a Regional: <b>SD Gimnástica Segoviana, CD Colonia Moscardó, Alcobendas CF y Atlético de Pinto</b><br />';
        break;

        case 651:
        $txt = 'Campeón: <b>Valladolid Deportivo Promesas</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>Valladolid Deportivo Promesas y Zamora CF</b><br />';
        $txt .= 'Descenso a Regional: <b>UD Cacabelense, CD Benavente, CD Laguna y SD Fabero</b><br />';

        break;

        case 652:
        $txt = 'Campeón: <b>RB Linense</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>RB Linense y Atlético Marbella</b><br />';
        $txt .= 'Descenso a Regional: <b>RUD Carolinense, Centro Deportes El Palo y Vélez CF</b><br />';

        break;

        case 641:
        $txt .= 'Campeón y Promoción de ascenso a Segunda B: <b>Sevilla Atlético </b><br />';
        $txt .= 'Descenso a Regional: <b>Riotinto Balompié, Moralo CP, Atletico Sanluqueño y UD Montijo</b><br />';
        $txt .= '<hr />El Coria CF quedó excluido de jugar la promoción de ascenso por ser uno de los dos peores segundos de los trece grupos de Tercera. <br />';
        break;

        case 642:
        $txt = 'Campeón: <b>CD Constancia</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>CD Constancia y CD Manacor</b><br />';
        $txt .= 'Descenso a Regional: <b>CD España, Atlético Ciudadela CF y CD Andraitx</b><br />';
        break;

        case 643:
        $txt .= 'Campeón y Promoción de ascenso a Segunda B: <b>UD Las Palmas Atlético</b><br />';
        $txt .= 'Descenso a Regional: <b>Real Unión Tenerife, Tenerife Aficionado y Sporting San José</b><br />';
        $txt .= '<hr />El CD Puerto Cruz quedó excluido de jugar la promoción de ascenso por ser uno de los dos peores segundos de los trece grupos de Tercera. <br />';
        break;

        case 644:
        $txt = 'Campeón: <b>CD Eldense</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>CD Eldense y Orihuela Deportiva</b><br />';
        $txt .= 'Descenso a Regional: <b>UD Horadada, Mazarrón CF y Pinatar CF</b><br />';

        //temporada 1981-82
        break;

        case 1416:
        $txt .= 'Ascienden a Segunda B: <b>Albacete Balompié, CD Binéfar, AD Parla, UD Poblense, Atlético Osasuna Promesas y CD L´Hospitalet</b><br />';

        break;

        case 653:
        $txt .= 'Campeón y Copa de Europa: <b>Real Sociedad de Fútbol</b><br />';
        $txt .= 'Recopa de Europa: <b>FC Barcelona y Real Madrid CF</b><br />';
        $txt .= 'Copa de la UEFA: <b>Athletic Club, Valencia CF, Real Betis Balompié y Sevilla FC</b><br />';
        $txt .= 'Descenso a Segunda: <b>Cádiz CF, Hércules CF y CD Castellón</b><br />';
        break;

        case 654:
        $txt = 'Campeón: <b>RC Celta</b><br />';
        $txt .= 'Ascenso a Primera: <b>RC Celta, UD Salamanca y CD Málaga</b><br />';
        $txt .= 'Descenso a Segunda B: <b>Deportivo Alavés, AD Almería, Levante UD y Getafe Deportivo</b><br />';
        $txt .= '<hr />Los partidos Coruña - Almería (inicialmente 0-1) y Almería - Mallorca (inicialmente 3-1) tuvieron que repetirse en Getafe y Alicante, por alineación indebida del Almería, sancionándose además al Almería con la pérdida de cuatro puntos. <br />';

        break;

        case 655:
        $txt = 'Campeón: <b>FC Barcelona Atlético </b><br />';
        $txt .= 'Ascenso a Segunda A: <b>FC Barcelona Atlético y Palencia CF</b><br />';
        $txt .= 'Descenso a Tercera: <b>CD Mirandés, CyD Leonesa y CD Ensidesa</b><br />';

        break;

        case 656:
        $txt = 'Campeón: <b>Xerez CD </b><br />';
        $txt .= 'Ascenso a Segunda A: <b>Xerez CD y Cartagena FC</b><br />';
        $txt .= 'Descenso a Tercera: <b>CD Tarrasa, UD Vall de Uxó y UD Las Palmas Atlético</b><br />';

        break;

        case 657:
        $txt = 'Campeón: <b>Pontevedra CF</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>Pontevedra CF y CD Orense</b><br />';
        $txt .= 'Descenso a Regional: <b>Juventud Cambados, SD Finisterre y Verín CF</b><br />';
        break;

        case 662:
        $txt .= 'Campeón y Promoción de ascenso a Segunda B: <b>SD Langreo</b><br />';
        $txt .= 'Descenso a Regional: <b>Atlético de Lugones, SD Buelna, UD Gijón Industrial y SD Barreda Balompié</b><br />';
        $txt .= '<hr />El Club Siero quedó excluido de jugar la promoción de ascenso por ser uno de los dos peores segundos de los trece grupos de Tercera. </b><br />';
        break;

        case 663:
        $txt = 'Campeón: <b>SD Éibar</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>SD Éibar y Aurrerá Ondárroa </b><br />';
        $txt .= 'Descenso a Regional: <b>Arenas Club, SD Valmaseda y CD Munguía</b><br />';
        break;

        case 664:
        $txt = 'Campeón: <b>CD Binéfar</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>CD Binéfar y Atlético Osasuna Promesas </b><br />';
        $txt .= 'Descenso a Regional: <b>SD Ejea y UDC Chantrea</b><br />';
        break;

        case 665:
        $txt = 'Campeón: <b>CD L´Hospitalet</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>CD L´Hospitalet y CF Badalona</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Malgrat y CF Gavá</b><br />';
        break;

        case 666:
        $txt = 'Campeón: <b>CD Alcoyano</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>CD Alcoyano y Catarroja CF</b><br />';
        $txt .= 'Descenso a Regional: <b>UD Alcira, CD Olímpico, UD Español San Vicente y UD Cuart de Poblet</b><br />';
        break;

        case 667:
        $txt = 'Campeón: <b>AD Parla</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>AD Parla y CF Talavera</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Móstoles y CD Guadalajara</b><br />';
        break;

        case 668:
        $txt = 'Campeón: <b>Valladolid Deportivo Promesas</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>Valladolid Deportivo Promesas y CD Salmantino</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Béjar Industrial, CD Ejido y Ciudad Rodrigo CF</b><br />';
        $txt .= '<hr />Por descenso de la CyD Leonesa de Segunda B, su filial, CyD Leonesa Promesas, desciende a Regional para la temporada siguiente, a pesar de la posterior repesca de la CyD Leonesa para Segunda B.<br />';
        break;

        case 669:
        $txt .= 'Campeón y Promoción de ascenso a Segunda B: <b>UD Fuengirola</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Ronda, Atarfe Industrial CF y Recreativo Granada</b><br />';
        $txt .= '<hr />El Martos CD quedó excluido de jugar la promoción de ascenso por ser uno de los dos peores segundos de los trece grupos de Tercera.<br />';
        break;

        case 658:
        $txt = 'Campeón: <b>CP Cacereño</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>CP Cacereño y Mérida Industrial CF</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Villanovense, UC La Estrella y SD Imperio de Ceuta</b><br />';
        break;

        case 659:
        $txt = 'Campeón: <b>UD Poblense</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>UD Poblense y CD Constancia</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Santañy y CF Sóller</b><br />';
        break;

        case 660:
        $txt = 'Campeón: <b>UD Telde</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>UD Telde y UD Güimar</b><br />';
        $txt .= 'Descenso a Regional: <b>Estrella CF, CD Mensajero, CD Unión Moral y Toscal CF</b><br />';
        break;

        case 661:
        $txt = 'Campeón: <b>Albacete Balompié</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>Albacete Balompié y Orihuela Deportiva</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Almoradí y Callosa Deportiva</b><br />';

        //temporada 1980-81
        break;

        case 1415:
        $txt .= 'Ascienden a Segunda B: <b>SD Erandio, CD Endesa Andorra, Sporting Gijón Atlético, CF Reus Deportivo, CD Antequerano y CF Lorca Deportiva</b><br />';

        break;

        case 670:
        $txt .= 'Campeón y Copa de Europa: <b>Real Sociedad de Fútbol</b><br />';
        $txt .= 'Recopa de Europa: <b>FC Barcelona</b><br />';
        $txt .= 'Copa de la UEFA: <b>Real Madrid CF, Atlético de Madrid y Valencia CF</b><br />';
        $txt .= 'Descenso a Segunda: <b>Real Murcia CF, UD Salamanca y AD Almería</b><br />';

        break;

        case 671:
        $txt = 'Campeón: <b>CD Castellón</b><br />';
        $txt .= 'Ascenso a Primera: <b>CD Castellón, Cádiz CF y Racing Santander</b><br />';
        $txt .= 'Descenso a Segunda B: <b>Granada CF, Palencia CF, Baracaldo CF y AD Ceuta</b><br />';
        break;

        case 672:
        $txt = 'Campeón: <b>RC Celta</b><br />';
        $txt .= 'Ascenso a Segunda A: <b>RC Celta y RC Deportivo</b><br />';
        $txt .= 'Descenso a Tercera: <b>Pontevedra CF, UP Langreo y SDG Arandina</b><br />';
        break;

        case 673:
        $txt = 'Campeón: <b>RCD Mallorca</b><br />';
        $txt .= 'Ascenso a Segunda A: <b>RCD Mallorca y Córdoba CF</b><br />';
        $txt .= 'Descenso a Tercera: <b>Mérida Industrial CF, CD Díter Zafra y CD Eldense</b><br />';
        break;

        case 674:
        $txt = 'Campeón: <b>Lugo</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>CD Lugo y Arosa SC</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Choco, Noya SD, Céltiga FC y CD Boiro</b><br />';
        break;

        case 679:
        $txt .= 'Campeón y Promoción de ascenso a Segunda B: <b>Sporting Gijón Atlético </b><br />';
        $txt .= 'Descenso a Regional: <b>SD Rayo Cantabria, El Entrego CD y SD San Martín Arena</b><br />';
        $txt .= '<hr />El Santoña CF quedó excluido de jugar la promoción de ascenso por ser uno de los dos peores segundos de los trece grupos de Tercera.<br />';
        break;

        case 680:
        $txt = 'Campeón: <b>SD Erandio Club</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>SD Erandio Club y Arenas Club </b><br />';
        $txt .= 'Descenso a Regional: <b>CD Motrico y CD Elorrio</b><br />';
        break;

        case 681:
        $txt = 'Campeón: <b>CD Binéfar</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>CD Binéfar y CD Endesa Andorra </b><br />';
        $txt .= 'Descenso a Regional: <b>SD Almazán y Haro Deportivo</b><br />';
        break;

        case 682:
        $txt = 'Campeón: <b>CF Reus Deportivo</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>CF Reus Deportivo y UD Figueras</b><br />';
        $txt .= 'Descenso a Regional: <b>UD Atlético Gramanet y CD Masnou</b><br />';
        break;

        case 683:
        $txt .= 'Campeón y Promoción de ascenso a Segunda B: <b>Catarroja CF</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Villena, Crevillente Deportivo y CD Acero</b><br />';
        $txt .= '<hr />El UD Carcagente quedó excluido de jugar la promoción de ascenso por ser uno de los dos peores segundos de los trece grupos de Tercera.<br />';
        break;

        case 684:
        $txt = 'Campeón: <b>Aranjuez CF</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>Aranjuez CF y CD Colonia Moscardó</b><br />';
        $txt .= 'Descenso a Regional: <b>AD Arganda, Atlético Valdemoro y CD Toledo</b><br />';
        break;

        case 685:
        $txt = 'Campeón: <b>Valladolid Deportivo Promesas</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>Valladolid Deportivo Promesas y SD Ponferradina</b><br />';
        $txt .= 'Descenso a Regional: <b>La Bañeza CF, CD Universitario, CD Cristo Olímpico y Burgos Promesas CF </b><br />';
        break;

        case 686:
        $txt = 'Campeón: <b>CD Antequerano</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>CD Antequerano y Martos CD</b><br />';
        $txt .= 'Descenso a Regional: <b>CF Industrial de Melilla y Loja CD</b><br />';
        break;

        case 675:
        $txt = 'Campeón: <b>Sevilla Atlético </b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>Sevilla Atlético y CD Don Benito</b><br />';
        $txt .= 'Descenso a Regional: <b>UD Montijo, AD Llerenense, África Ceutí y CD O´Donnell</b><br />';
        break;

        case 676:
        $txt = 'Campeón: <b>UD Poblense</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>UD Poblense y CD Constancia</b><br />';
        $txt .= 'Descenso a Regional: <b>CD España, CD Atlético Baleares y UD Seislán</b><br />';
        break;

        case 677:
        $txt = 'Campeón: <b>UD Realejos</b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>UD Realejos y UD Telde</b><br />';
        $txt .= 'Descenso a Regional: <b>SD Santa Brígida, Unión Chile CF y UD San Antonio</b><br />';
        break;

        case 678:
        $txt = 'Campeón: <b>CF Lorca Deportiva </b><br />';
        $txt .= 'Promoción de ascenso a Segunda B: <b>CF Lorca Deportiva  y Albacete Balompié</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Hellín, CF Santomera y SD Almansa</b><br />';

        //temporada 1979-80
        break;

        case 687:
        $txt .= 'Campeón y Copa de Europa: <b>Real Madrid</b><br />';
        $txt .= 'Recopa de Europa: <b>Valencia CF</b><br />';
        $txt .= 'Copa de la UEFA: <b>Real Sociedad, Sporting Gijón y FC Barcelona</b><br />';
        $txt .= 'Descenso a Segunda: <b>Rayo Vallecano, Burgos CF y CD Málaga</b><br />';
        $txt .= '<hr />El partido Málaga - Almería, que debía jugarse en Algeciras por clausura del campo del Málaga, no se disputó, por incomparecencia de este equipo, por lo que se le da por perdido, sancionándosele además con la pérdida de tres puntos en su clasificación.<br />';
        $txt .= 'El partido Málaga - Salamanca, inicialmente 0-3, queda anulado por haberse probado la compra del mismo por parte del Salamanca.<br />';
        break;

        case 688:
        $txt = 'Campeón: <b>Real Murcia CF</b><br />';
        $txt .= 'Recopa de Europa: <b>Castilla CF</b><br />';
        $txt .= 'Ascenso a Primera: <b>Real Murcia CF, Real Valladolid CF y Club Atlético Osasuna</b><br />';
        $txt .= 'Descenso a Segunda B: <b>RC Celta, RC Deportivo, Gimnàstic de Tarragona y Algeciras CF</b><br />';

        break;

        case 689:
        $txt = 'Campeón: <b>Baracaldo CF</b><br />';
        $txt .= 'Ascenso a Segunda A: <b>Baracaldo CF y Atlético Madrileño</b><br />';
        $txt .= 'Descenso a Tercera: <b>Sporting Gijón Atlético, Arenas Club, CD Orense y CD Guecho</b><br />';
        break;

        case 690:
        $txt = 'Campeón: <b>Linares CF</b><br />';
        $txt .= 'Ascenso a Segunda A: <b>Linares CF y AD Ceuta</b><br />';
        $txt .= 'Descenso a Tercera: <b>UD San Andrés, Sevilla Atlético, Gerona CF y Onteniente CF</b><br />';
        break;

        case 691:
        $txt .= 'Campeón y Asciende a Segunda B: <b>SD Compostela</b><br />';
        $txt .= 'Promoción de Descenso a Regional: <b>CD San Martín</b><br />';
        break;

        case 692:
        $txt .= 'Campeón y Asciende a Segunda B: <b>SDG Arandina</b><br />';
        $txt .= 'Promoción de Descenso a Regional: <b>RS  Gimnástica</b><br />';
        break;

        case 693:
        $txt .= 'Campeón y Asciende a Segunda B: <b>San Sebastián CF</b><br />';
        $txt .= 'Promoción de Descenso a Regional: <b>SD Lemona</b><br />';
        break;

        case 694:
        $txt .= 'Campeón y Asciende a Segunda B: <b>FC Andorra</b><br />';
        $txt .= 'Promoción de Descenso a Regional: <b>UA Horta</b><br />';
        break;

        case 695:
        $txt .= 'Campeón y Asciende a Segunda B: <b>RSD Alcalá</b><br />';
        $txt .= 'Promoción de Descenso a Regional: <b>Toscal CF</b><br />';
        break;

        case 696:
        $txt .= 'Campeón y Asciende a Segunda B: <b>Cartagena FC</b><br />';
        $txt .= 'Promoción de Descenso a Regional: <b>Paterna CF</b><br />';
        break;

        case 697:
        $txt .= 'Campeón y Asciende a Segunda B: <b>Mérida Industrial CF</b><br />';
        $txt .= 'Promoción de Descenso a Regional: <b>CF Industrial de Melilla</b><br />';
        $txt .= '<hr />El partido G. Melilla - Vélez se da por vencedor al segundo, por incomparecencia del G. Melilla.<br />';
        break;

        case 698:
        $txt .= 'Campeón y Asciende a Segunda B: <b>Mallorca</b><br />';
        $txt .= 'Descenso a Regional: <b>SD Formentera y CD Ibiza Atlético</b><br />';

        //temporada 1978-79
        break;

        case 699:
        $txt .= 'Campeón y Copa de Europa: <b>Real Madrid CF</b><br />';
        $txt .= 'Recopa de Europa: <b>FC Barcelona y Valencia CF</b><br />';
        $txt .= 'Copa de la UEFA: <b>Real Sporting Gijón, Atlético de Madrid y Real Sociedad de Fútbol</b><br />';
        $txt .= 'Descenso a Segunda: <b>RC Celta, Real Racing Club y RC Recreativo</b><br />';

        break;

        case 700:
        $txt = 'Campeón: <b>AD Almería</b><br />';
        $txt .= 'Ascenso a Primera: <b>AD Almería, CD Málaga y Real Betis Balompié</b><br />';
        $txt .= 'Descenso a Segunda B: <b>Real Jaén CF, CD Tarrasa, Baracaldo CF y Racing Club Ferrol</b><br />';

        break;

        case 701:
        $txt = 'Campeón: <b>Palencia CF</b><br />';
        $txt .= 'Ascenso a Segunda A: <b>Palencia CF y Real Oviedo</b><br />';
        $txt .= 'Descenso a Tercera: <b>CD Lugo, CD Pegaso y Caudal Deportivo</b><br />';
        break;

        case 702:
        $txt = 'Campeón: <b>Levante UD</b><br />';
        $txt .= 'Ascenso a Segunda A: <b>Levante UD y Gimnástico de Tarragona</b><br />';
        $txt .= 'Descenso a Tercera: <b>CD Cacereño, Vinaroz CF y CD Olímpico</b><br />';

        break;

        case 703:
        $txt .= 'Campeón y Asciende a Segunda B: <b>CD Gijón</b><br />';
        $txt .= 'Descenso a Regional: <b>Sporting Celanova CF</b><br />';
        break;

        case 704:
        $txt .= 'Campeón y Asciende a Segunda B: <b>CD Sangüesa</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Basconia</b><br />';
        break;

        case 705:
        $txt .= 'Campeón y Asciende a Segunda B: <b>UD Vall de Uxó</b><br />';
        $txt .= 'Descenso a Regional: <b>CD L´Hospitalet</b><br />';
        break;

        case 706:
        $txt .= 'Campeón y Asciende a Segunda B:<b>UD Las Palmas Atlético</b><br />';
        $txt .= 'Descenso a Regional: <b>SD Almazán</b><br />';
        break;

        case 707:
        $txt .= 'Campeón y Asciende a Segunda B: <b>CD Eldense</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Manacor</b><br />';
        break;

        case 708:
        $txt .= 'Campeón y Asciende a Segunda B: <b>CD San Fernando</b><br />';
        $txt .= 'Descenso a Regional: <b>Iliturgi CF</b><br />';
        $txt .= '<hr />El partido Iliturgi - At. Malagueño, se da por perdido al primero por incomparecencia, descontándosele además tres puntos de su clasificación.</b><br />';

        //temporada 1977-78
        break;

        case 709:
        $txt .= 'Campeón y Copa de Europa: <b>Real Madrid CF</b><br />';
        $txt .= 'Recopa de Europa: <b>FC Barcelona</b><br />';
        $txt .= 'Copa de la UEFA: <b>Athletic Club, Valencia CF y Sporting Gijón</b><br />';
        $txt .= 'Descenso a Segunda: <b>Real Betis Balompié, Elche CF y Cádiz CF</b><br />';
        break;

        case 710:
        $txt = 'Campeón: <b>Real Zaragoza CD</b><br />';
        $txt .= 'Ascenso a Primera: <b>Real Zaragoza CD, RC Recreativo y RC Celta</b><br />';
        $txt .= 'Descenso a Segunda B: <b>Real Oviedo, Córdoba CF, CD Tenerife y CF Calvo Sotelo</b><br />';
        break;

        case 711:
        $txt = 'Campeón: <b>Racing Club Ferrol</b><br />';
        $txt .= 'Ascenso a Segunda A: <b>Racing Club Ferrol y Castilla</b><br />';
        $txt .= 'Descenso a Tercera: <b>SD Compostela, CD Tudelano y CD Basconia</b><br />';
        break;

        case 712:
        $txt = 'Campeón: <b>AD Almería</b><br />';
        $txt .= 'Ascenso a Segunda A: <b>AD Almería y Algeciras CF</b><br />';
        $txt .= 'Descenso a Tercera: <b>RCD Mallorca, CD Eldense y CD Atlético Baleares</b><br />';
        break;

        case 713:
        $txt .= 'Campeón y Asciende a Segunda B:<b>CD Lugo</b><br />';
        $txt .= 'Descenso a Regional: <b>RS Gimnástica y Noya</b><br />';
        break;

        case 714:
        $txt .= 'Campeón y Asciende a Segunda B:<b>CD Logroñés</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Sariñena, SD Huesca B y CD Izarra</b><br />';
        break;

        case 715:
        $txt .= 'Campeón y Asciende a Segunda B:<b>Gimnástico de Tarragona</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Oliana, CD Moncada y UD Vic</b><br />';
        break;

        case 716:
        $txt .= 'Campeón y Asciende a Segunda B:<b>Zamora CF</b><br />';
        $txt .= 'Descenso a Regional: <b>UP Plasencia, AD Alcorcón y CD Guadalajara</b><br />';
        break;

        case 717:
        $txt .= 'Campeón y Asciende a Segunda B:<b>SD Ibiza</b><br />';
        $txt .= 'Descenso a Regional: <b>SD Portmany, UD Porreras y Yeclano CF</b><br />';
        break;

        case 718:
        $txt .= 'Campeón y Asciende a Segunda B:<b>CD Cacereño</b><br />';
        $txt .= 'Descenso a Regional: <b>Atlético Marbella, UD Montijo y Atlético  Ceuta</b><br />';

        //temporada 1976-77
        break;

        case 719:
        $txt .= 'Campeón y Copa de Europa: <b>Club Atlético de Madrid</b><br />';
        $txt .= 'Recopa de Europa: <b>Real Betis Balompié</b><br />';
        $txt .= 'Copa de la UEFA: <b>FC Barcelona, Athletic Club y UD Las Palmas</b><br />';
        $txt .= 'Descenso a Segunda: <b>Real Zaragoza CD , RC Celta y CD Málaga</b><br />';
        break;

        case 720:
        $txt = 'Campeón: <b>Sporting Gijón</b><br />';
        $txt .= 'Ascenso a Primera: <b>Sporting Gijón, Cádiz CF y Rayo Vallecano</b><br />';
        $txt .= 'Descenso a Segunda B: <b>Pontevedra CF, Levante UD, UD San Andrés y FC Barcelona Atlético </b><br />';
        break;

        case 721:
        $txt .= 'Campeón y Ascenso a Segunda A: <b>Baracaldo CF</b><br />';
        $txt .= 'Ascienden a Segunda B: <b>CD Orense, CD Ensidesa, Bilbao Athletic Club, Club Sestao, Racing Club Ferrol, UP Langreo, Caudal Deportivo, SD Compostela y CD Basconia</b><br />';
        $txt .= 'Promoción de descenso a Regional:<b> Gran Peña FC y CD Laredo</b><br />';
        break;

        case 722:
        $txt .= 'Campeón y Ascenso a Segunda A: <b>Club Atlético Osasuna</b><br />';
        $txt .= 'Ascienden a Segunda B: <b>CyD Leonesa, CD Pegaso, Castilla, Atlético Madrileño, CD Mirandés, Real Unión Club, Palencia CF, CD Tudelano y AD Torrejón</b><br />';
        $txt .= 'Promoción de descenso a Regional: <b>CD Lagún Onak y CD Touring</b><br />';

        break;

        case 723:
        $txt .= 'Campeón y Ascenso a Segunda A: <b>Centro Deportes Sabadell</b><br />';
        $txt .= 'Ascienden a Segunda B: <b> Gerona CF, RCD Mallorca, CD Eldense, CD Olímpico, CD Atlético Baleares, Vinaroz CF, SD Huesca, UD Lérida y Onteniente CF</b><br />';
        $txt .= 'Promoción de descenso a Regional: <b>CF Reus Deportivo y CD Acero</b><br />';
        break;

        case 724:
        $txt .= 'Campeón y Ascenso a Segunda A: <b>Real Murcia CF</b><br />';
        $txt .= 'Ascienden a Segunda B: <b> AD Ceuta, AD Almería, Linares CF, CD Díter Zafra, CD Badajoz, Algeciras CF, Xerez CD, Racing Club Portuense y Sevilla Atlético </b><br />';
        $txt .= 'Promoción de descenso a Regional: <b>Betis Deportivo</b><br />';
        $txt .= '<hr />La SD Melilla se retiró de la competición antes de comenzar esta. </b><br />';

        //temporada 1975-76

        break;

        case 1414:
        $txt .= 'Permanecen en Segunda: <b>UD San Andrés, CD Tarrasa, Cádiz CF y Deportivo Alavés</b><br />';

        break;

        case 725:
        $txt .= 'Campeón y Copa de Europa: <b>Real Madrid CF</b><br />';
        $txt .= 'Recopa de Europa: <b>Club Atlético de Madrid</b><br />';
        $txt .= 'Copa de la UEFA: <b>FC Barcelona, RCD Español y Athletic Club</b><br />';
        $txt .= 'Descenso a Segunda: <b>Real Oviedo, Granada CF y Sporting Gijón</b><br />';
        break;

        case 726:
        $txt = 'Campeón: <b>Burgos CF</b><br />';
        $txt .= 'Ascenso a Primera: <b>Burgos CF, RC Celta y CD Málaga</b><br />';
        $txt .= 'Promoción Descenso a Tercera: <b>Cádiz CF, UD San Andrés, Deportivo Alavés y CD Tarrasa</b><br />';
        $txt .= 'Descenso a Tercera: <b>Real Murcia CF, CD Ensidesa, Club Atlético Osasuna y Gimnástico de Tarragona</b><br />';
        break;

        case 727:
        $txt .= 'Campeón y Ascenso a Segunda: <b>Pontevedra CF</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda: <b>Baracaldo CF</b><br />';
        $txt .= 'Promoción de descenso a Regional: <b>Arosa SC, CD Laredo, CD Lugo y CD Basconia</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Turón, CD Santurce, Club Siero y Club Lemos</b><br />';
        break;

        case 728:
        $txt .= 'Campeón y Ascenso a Segunda: <b>Getafe Deportivo</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda: <b>CD Logroñés</b><br />';
        $txt .= 'Promoción de descenso a Regional:<b> CD Colonia Moscardó, AD Torrejón, CD Lagún Onak y Zamora CF</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Salmantino, CD Alfaro, SD Éibar y SDC Michelín</b><br />';
        break;

        case 729:
        $txt .= 'Campeón y Ascenso a Segunda: <b>Levante UD</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda: <b>SD Huesca</b><br />';
        $txt .= 'Promoción de descenso a Regional: <b>Villarreal CF, CD Endesa Andorra, CD Atlético Baleares y SD Ibiza</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Manresa, CD Mestalla, CD Masnou y CF Calella</b><br />';
        break;

        case 730:
        $txt .= 'Campeón y Ascenso a Segunda: <b>Real Jaén CF</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda: <b>AD Almería</b><br />';
        $txt .= 'Promoción de descenso a Regional: <b>Atlético Marbella, CD Badajoz, CD Díter Zafra y SD Melilla</b><br />';
        $txt .= 'Descenso a Regional: <b>Albacete Balompié, Melilla CF, RB Linense y SD Imperio de Ceuta</b><br />';

        //temporada 1974-75
        break;

        case 1413:
        $txt .= 'Asciende a Segunda: <b>CD Ensidesa</b><br />';
        $txt .= 'Permanecen en Segunda: <b>RC Recreativo, Deportivo Alavés y Gimnástico de Tarragona</b><br />';
        $txt .= 'Desciende a Tercera: <b>Baracaldo CF</b><br />';

        break;

        case 731:
        $txt .= 'Campeón y Copa de Europa: <b>Real Madrid CF</b><br />';
        $txt .= 'Recopa de Europa: <b>Club Atlético de Madrid</b><br />';
        $txt .= 'Copa de la UEFA: <b>Real Zaragoza CD, FC Barcelona y Real Sociedad de Fútbol</b><br />';
        $txt .= 'Descenso a Segunda: <b>CD Málaga, RC Celta y Real Murcia CF</b><br />';
        break;

        case 732:
        $txt = 'Campeón: <b>Real Oviedo</b><br />';
        $txt .= 'Ascenso a Primera: <b>Real Oviedo, Racing Santander y Sevilla CF</b><br />';
        $txt .= 'Promoción Descenso a Tercera: <b>Gimnástico de Tarragona, RC Recreativo, Baracaldo CF y Deportivo Alavés</b><br />';
        $txt .= 'Descenso a Tercera: <b>RCD Mallorca, CD Orense, Centro Deportes Sabadell y CyD Leonesa</b><br />';
        break;

        case 733:
        $txt .= 'Campeón y Ascenso a Segunda: <b>RC Deportivo</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda: <b>CD Ensidesa</b><br />';
        $txt .= 'Promoción de descenso a Regional: <b>CD Guecho, CD Basconia, Club Lemos y CD Turón</b><br />';
        $txt .= 'Descenso a Regional: <b>Gran Peña FC, Atlético Universitario, Caudal Deportivo y SD Unión Club</b><br />';
        break;

        case 734:
        $txt .= 'Campeón y Ascenso a Segunda: <b>Club Atlético Osasuna</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda: <b>Getafe Deportivo</b><br />';
        $txt .= 'Promoción de descenso a Regional: <b>AD Torrejón, CD Salmantino, SDC Michelín y SD Éibar</b><br />';
        $txt .= 'Descenso a Regional: <b>Béjar Industrial, CD Calahorra, CD Guadalajara y AD Arganda</b><br />';
        break;

        case 735:
        $txt .= 'Campeón y Ascenso a Segunda: <b>CD Tarrasa</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda: <b>Levante UD</b><br />';
        $txt .= 'Promoción de descenso a Regional: <b>Algemesí CF, CF Calella, UD Lérida y SD Huesca</b><br />';
        $txt .= 'Descenso a Regional: <b>Yeclano CF, Atlético Ciudadela, UD Poblense y CD Tortosa</b><br />';
        break;

        case 736:
        $txt .= 'Campeón y Ascenso a Segunda: <b>CF Calvo Sotelo</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda: <b>Atlético Marbella</b><br />';
        $txt .= 'Promoción de descenso a Regional: <b>RB Linense, Orihuela Deportiva, Melilla CF y AD Almería</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Cartagena, AD Hellín, CF Extremadura y Real Granada CF</b><br />';

        //temporada 1973-74
        break;

        case 1412:
        $txt .= 'Permanecen en Segunda: <b>Burgos CF, Córdoba CF, Centro Deportes Sabadell y Rayo Vallecano</b><br />';

        break;

        case 737:
        $txt .= 'Campeón y Copa de Europa: <b>FC Barcelona</b><br />';
        $txt .= 'Recopa de Europa: <b>Real Madrid CF</b><br />';
        $txt .= 'Copa de la UEFA: <b>Club Atlético de Madrid, Real Zaragoza CD y Real Sociedad de Fútbol</b><br />';
        $txt .= 'Descenso a Segunda: <b>CD Castellón, Racing Santander y Real Oviedo</b><br />';

        break;

        case 738:
        $txt = 'Campeón: <b>Real Betis Balompié</b><br />';
        $txt .= 'Ascenso a Primera: <b>Real Betis Balompié, Hércules CF y UD Salamanca</b><br />';
        $txt .= 'Promoción Descenso a Tercera: <b>Córdoba CF , Rayo Vallecano, Centro Deportes Sabadell y Burgos CF</b><br />';
        $txt .= 'Descenso a Tercera: <b>Club Atlético Osasuna, RC Deportivo, Levante UD y Linares CF</b><br />';
        break;

        case 739:
        $txt .= 'Campeón y Ascenso a Segunda: <b>CyD Leonesa</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda: <b>UP Langreo</b><br />';
        $txt .= 'Promoción de descenso a Regional: <b>Bilbao Athletic Club, Real Avilés, Zamora CF y Caudal Deportivo</b><br />';
        $txt .= 'Descenso a Regional: <b>SD Ponferradina, Rayo Cantabria, UD Gijón Industrial y Club Erandio</b><br />';
        break;

        case 740:
        $txt .= 'Campeón y Ascenso a Segunda: <b>Deportivo Alavés</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda: <b>SD Éibar</b><br />';
        $txt .= 'Promoción de descenso a Regional: <b>RCD Carabanchel, CD Salmantino, CD Mirandés y UD Barbastro</b><br />';
        $txt .= 'Descenso a Regional: <b>Peña Sport FC, CD Endesa Andorra, Tolosa CF y Atlético Osasuna Promesas </b><br />';
        break;

        case 741:
        $txt .= 'Campeón y Ascenso a Segunda: <b>CF Barcelona Atlético</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda: <b>CD Mestalla</b><br />';
        $txt .= 'Promoción de descenso a Regional: <b>UD Alcira, CF Calella, CD Menorca y CD Alcoyano</b><br />';
        $txt .= 'Descenso a Regional: <b>CF Gandía, CD Europa, UD Mahón y CD Manacor</b><br />';
        break;

        case 742:
        $txt .= 'Campeón y Ascenso a Segunda: <b>RC Recreativo</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda: <b>AD Almería</b><br />';
        $txt .= 'Promoción de descenso a Regional: <b>Atlético Marbella, Melilla CF, AD Ceuta y Xerez CD</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Cacereño, CD Valdepeñas, CD O´Donnell y CF Melilla Industrial</b><br />';
        $txt .= '<hr />El partido Jaén - Recr. Huelva (inicialmente 1-0) se da por perdido al Real Jaén por alineación indebida, descontándosele además dos puntos de su clasificación. </b><br />';

        //temporada 1972-73
        break;

        case 1411:
        $txt .= 'Permanecen en Segunda: <b>CD Tenerife, Club Atlético Osasuna, Córdoba CF y Gimnástico de Tarragona</b><br />';

        break;

        case 743:
        $txt .= 'Campeón y Copa de Europa: <b>Club Atlético de Madrid</b><br />';
        $txt .= 'Recopa de Europa: <b>Athletic Club</b><br />';
        $txt .= 'Copa de la UEFA:<b> CF Barcelona, RCD Español y Real Madrid CF</b><br />';
        $txt .= 'Descenso a Segunda: <b>Real Betis Balompié, RC Deportivo y Burgos CF</b><br />';

        break;

        case 744:
        $txt = 'Campeón: <b>Real Murcia CF</b><br />';
        $txt .= 'Ascenso a Primera: <b>Real Murcia CF, Elche CF y Racing Santander</b><br />';
        $txt .= 'Promoción Descenso a Tercera: <b>Córdoba CF, CD Tenerife, Club Atlético Osasuna y Gimnástico de Tarragona</b><br />';
        $txt .= 'Descenso a Tercera: <b>CD Logroñés, Pontevedra CF, CyD Leonesa y CD Mestalla</b><br />';

        break;

        case 745:
        $txt .= 'Campeón y Ascenso a Segunda: <b>CD Orense</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda: <b>CD Ensidesa</b><br />';
        $txt .= 'Promoción de descenso a Regional: <b>Real Avilés, SD Ponferradina, CD Basconia y CD Laredo</b><br />';
        $txt .= 'Descenso a Regional: <b>Gran Peña FC, SD Compostela, Club Siero y SD Llodio</b><br />';

        break;

        case 746:
        $txt .= 'Campeón y Ascenso a Segunda: <b>UD Salamanca</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda: <b>Atlético Madrileño</b><br />';
        $txt .= 'Promoción de descenso a Regional: <b>SD Huesca, Getafe Deportivo, UD Arechavaleta y CD Mirandés</b><br />';
        $txt .= 'Descenso a Regional: <b>AD Torrejón, UDC Chantrea, Béjar Industrial y SD Ejea</b><br />';
        break;

        case 747:
        $txt .= 'Campeón y Ascenso a Segunda: <b>Levante UD</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda: <b>Gerona CF</b><br />';
        $txt .= 'Promoción de descenso a Regional: <b>Atlético Ciudadela, Vinaroz CF, CD Olímpico y UD Poblense</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Júpiter, CD Masnou, CD Atlético Baleares y CD Acero</b><br />';

        break;

        case 748:
        $txt .= 'Campeón y Ascenso a Segunda: <b>Linares CF</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda: <b>CD Cartagena</b><br />';
        $txt .= 'Promoción de descenso a Regional: <b>CD San Fernando, CD Eldense CD O´Donnell y RB Linense</b><br />';
        $txt .= 'Descenso a Regional: <b>Algemesí CF, CF Extremadura, Atlético  Malagueño y Sevilla Atlético </b><br />';

        //temporada 1971-72
        break;

        case 1410:
        $txt .= 'Permanecen en Segunda: <b>Real Santander, Hércules CF, CD Mestalla y Cádiz CF</b><br />';

        break;

        case 749:
        $txt .= 'Campeón y Copa de Europa: <b>Real Madrid CF</b><br />';
        $txt .= 'Recopa de Europa: <b>Club Atlético de Madrid</b><br />';
        $txt .= 'Copa de la UEFA: <b>Valencia CF, CF Barcelona y UD Las Palmas</b><br />';
        $txt .= 'Descenso a Segunda: <b>Sevilla CF, Córdoba CF y Centro Deportes Sabadell</b><br />';

        break;

        case 750:
        $txt = 'Campeón: <b>Real Oviedo</b><br />';
        $txt .= 'Ascenso a Primera: <b>Real Oviedo, CD Castellón y Real Zaragoza CD</b><br />';
        $txt .= 'Promoción Descenso a Tercera: <b>CD Mestalla, Hércules CF, Real Santander y Cádiz CF</b><br />';
        $txt .= 'Descenso a Tercera: <b>Villarreal CF, Club Ferrol, Xerez CD y UP Langreo</b><br />';

        break;

        case 751:
        $txt .= 'Campeón y Ascenso a Segunda: <b>CD Baracaldo Altos Hornos</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda: <b>Club Sestao</b><br />';
        $txt .= 'Promoción de descenso a Regional: <b>Júpiter Leonés, SD Ponferradina, Club Lemos y CD Lugo</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Turón, SD Unión Club, Fabril Deportivo y Candás CF</b><br />';
        break;

        case 752:
        $txt .= 'Campeón y Ascenso a Segunda: <b>Club Atlético Osasuna</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda: <b>UD Salamanca</b><br />';
        $txt .= 'Promoción de descenso a Regional: <b>CF Talavera, Getafe Deportivo, CD Tudelano y CD Calvo Sotelo Andorra</b><br />';
        $txt .= 'Descenso a Regional: <b>SR Boetticher y Navarro, Deportivo Aragón, Real Unión Club y CD Oberena</b><br />';

        break;

        case 753:
        $txt .= 'Campeón y Ascenso a Segunda: <b>Gimnástico de Tarragona</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda: <b>CD Tarrasa</b><br />';
        $txt .= 'Promoción de descenso a Regional: <b>Algemesí CF, SD Ibiza, CD Acero y CD Europa</b><br />';
        $txt .= 'Descenso a Regional: <b>CF Badalona, CD Benicarló, CF Barcelona Atlético  y CF Gandía</b><br />';

        break;

        case 754:
        $txt .= 'Campeón y Ascenso a Segunda: <b>Real Murcia CF</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda: <b>CD Cartagena</b><br />';
        $txt .= 'Promoción de descenso a Regional: <b>RC Recreativo, CD Cacereño, CD Olímpico y Linares CF</b><br />';
        $txt .= 'Descenso a Regional: <b>Triana Balompié, CD Ilicitano, CD Español San Vicente y África Ceutí</b><br />';

        //temporada 1970-71
        break;

        case 1409:
        $txt .= 'Permanecen en Segunda: <b>CD Logroñés, Villarreal CF, Real Oviedo y UP Langreo</b><br />';

        break;

        case 755:
        $txt = 'Campeón: Valencia y Copa de Europa: <b>Valencia CF</b><br />';
        $txt .= 'Recopa de Europa: <b>CF Barcelona</b><br />';
        $txt .= 'Copa de la UEFA: <b>Club Atlético de Madrid, Real Madrid CF, Club Atlético de Bilbao y RC Celta</b><br />';
        $txt .= 'Descenso a Segunda: <b>Elche CF y Real Zaragoza CD</b><br />';
        $txt .= '<hr />Por aumentarse la Primera División a 18 equipos, esta temporada sólo descienden dos.<br />';

        break;

        case 756:
        $txt = 'Campeón: <b>Real Betis Balompié</b><br />';
        $txt .= 'Ascenso a Primera: <b>Real Betis Balompié, Burgos CF, RC Deportivo y Córdoba CF</b><br />';
        $txt .= 'Promoción Descenso a Tercera: <b>Real Oviedo, CD Logroñés, Villarreal CF y UP Langreo</b><br />';
        $txt .= 'Descenso a Tercera: <b>Onteniente CF, CF Calvo Sotelo y CD Colonia Moscardó</b><br />';
        $txt .= '<hr />Por aumentarse la Primera División a 18 equipos, este año ascienden cuatro y sólo descienden tres. </b><br />';

        break;

        case 757:
        $txt .= 'Campeón y Ascenso a Segunda: <b>CyD Leonesa</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda: <b>CD Orense</b><br />';
        $txt .= 'Promoción de descenso a Regional: <b>CD San Martín, Club Siero, Club Lemos y Barreda Balompié</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Toluca, SD Vetusta y La Bañeza CF</b><br />';

        break;

        case 758:
        $txt = 'Campeón: <b>CD Tenerife</b><br />';
        $txt .= 'Ascenso a Segunda: <b>CD Tenerife y Rea Valladolid CF</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda: <b>Palencia CF</b><br />';
        $txt .= 'Promoción de descenso a Regional: <b>Real Unión Club, SD Huesca, CD Calvo Sotelo Andorra y CD Tudelano</b><br />';
        $txt .= 'Descenso a Regional: <b>UDC Chantrea, SDC Michelín, RCD Carabanchel y SD Ejea</b><br />';

        break;

        case 759:
        $txt .= 'Campeón y Ascenso a Segunda: <b>CD Mestalla</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda: <b>Gerona CF</b><br />';
        $txt .= 'Promoción de descenso a Regional: <b>CD Tortosa, CD Acero, SD Ibiza y CD Atlético Baleares</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Júpiter, Paiporta CF y CD Mataró</b><br />';

        break;

        case 760:
        $txt .= 'Campeón y Ascenso a Segunda: <b>Xerez CD</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda: <b>CD Cartagena</b><br />';
        $txt .= 'Promoción de descenso a Regional: <b>Atlético Malagueño, CD Español San Vicente, CD Ilicitano y RB Linense</b><br />';
        $txt .= 'Descenso a Regional: <b>Mérida Industrial CF, Imperial CF, Recreativo Granada y AD Llerenense</b><br />';

        //temporada 1969-70
        break;

        case 1408:
        $txt .= 'Ascienden a Segunda los vencedores de la primera eliminatoria: <b>UP Langreo, CD Logroñés, Cádiz CF y CD Colonia Moscardó.<hr />';
        $txt .= 'Los perdedores de la primera eliminatoria juegan contra los equipos de Segunda que promocionan.<br /><br />';
        $txt .= 'Permanecen en Segunda: <b>Burgos CF</b><br />';
        $txt .= 'Ascienden a Segunda: <b>Hércules CF, Villarreal CF y Real Santander</b><br />';
        $txt .= 'Descienden a Tercera: <b>Club Atlético Osasuna, Bilbao Atlético Club  y CD Ilicitano</b><br />';

        break;

        case 761:
        $txt = 'Campeón: At. Madrid y Copa de Europa: <b>Club Atlético de Madrid</b><br />';
        $txt .= 'Recopa de Europa: <b>Real Madrid CF</b><br />';
        $txt .= 'Copa de la UEFA: <b>Club Atlético de Bilbao, Sevilla CF, CF Barcelona y Valencia CF</b><br />';
        $txt .= 'Descenso a Segunda: <b>RC Deportivo, RCD Mallorca y Pontevedra CF</b><br />';

        break;

        case 762:
        $txt = 'Campeón: <b>Real Gijón</b><br />';
        $txt .= 'Ascenso a Primera: <b>Real Gijón, CD Málaga y RCD Español</b><br />';
        $txt .= 'Promoción Descenso a Tercera: <b>Bilbao Atlético Club, Burgos CF, Club Atlético Osasuna y CD Ilicitano</b><br />';
        $txt .= 'Descenso a Tercera: <b>Real Valladolid CF, Real Murcia CF, UD Salamanca y CD Orense</b><br />';
        break;

        case 763:
        $txt .= 'Campeón y fase de Ascenso a Segunda: <b>UP Langreo</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Turón, SD Compostela, Fabril Deportivo, Gijón Industrial, Gran Peña FC, Club Turista, Atlético Pontevedrés, Atlético Orense, El Entrego CD ,  Alondras CF,  CD Praviano y Atlético Gijón</b><br />';
        break;

        case 764:
        $txt .= 'Campeón y fase de Ascenso a Segunda: <b>Real Santander</b><br />';
        $txt .= 'Descenso a Regional: <b>Deportivo Alavés, SD Indauchu, UD Cacabelense, CD Guecho,  CD Villosa, Cllub Erandio, Arenas Club, CD Laredo, Rayo Cantabria, Júpiter Leonés, Hullera Vasco Leonesa y Sporting Club Luchana</b><br />';
        break;

        case 765:
        $txt .= 'Campeón y fase de Ascenso a Segunda: <b>CD Logroñés</b><br />';
        $txt .= 'Descenso a Regional: <b>Aragón CF, CD Iruña, Tolosa CF, CD Numancia, UD Barbastro, CD Calahorra, CD Oberena, Atlético de Monzón, CD Motrico, CD Binéfar, CD Teruel y Utebo CF</b><br />';
        $txt .= '<hr />El Utebo figura con tres puntos menos en su clasificación por incomparecencia a su partido en campo del Calvo Sotelo And. </b><br />';
        break;

        case 766:
        $txt .= 'Campeón y fase de Ascenso a Segunda: <b>CD Tarrasa</b><br />';
        $txt .= 'Descenso a Regional: <b>UD Figueras, UD Lérida, 11 UD Atlético Gramanet, Atlético Cataluña, CF Gavá, CF Samboyano, CF Lloret, CD Moncada, CF Villanueva, CF Reus Deportivo, CF Villafranca y UD Olot</b><br />';
        break;

        case 767:
        $txt .= 'Campeón y fase de Ascenso a Segunda: <b>Villarreal CF</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Benicarló, UD Alcira, UD Mahón, Atlético Ciudadela, SD Sueca, UD Oliva, CD Onda, Torrente CF, CD Menorca, CF Palma,  CD Manacor y CD Soledad</b><br />';
        $txt .= '<hr />El Manacor figura con tres puntos menos por incomparecencia a su partido en campo del Torrente.<br />';
        break;

        case 768:
        $txt .= 'Campeón y fase de Ascenso a Segunda: <b>Hércules CF</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Eldense, Linares CF, Novelda CF, Orihuela Deportiva, CD Manchego, Albacete Balompié, CD La Unión, Atlético Calvo Sotelo, Benidorm CF, Atlético Cartagena, CD Iliturgi y Adra CF</b><br />';
        break;

        case 769:
        $txt .= 'Campeón y fase de Ascenso a Segunda: <b>Cádiz CF</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Estepona, Jerez Industrial, CD Alcalá, CD San Fernando, Atlético Marbella, Algeciras CF, Atlético Ceuta, Atlético Sanluqueño, Ayamonte CF, Puerto Malagueño, África Ceutí y CD Rota</b><br />';
        break;

        case 770:
        $txt .= 'Campeón y fase de Ascenso a Segunda: <b>CD Colonia Moscardó</b><br />';
        $txt .= 'Descenso a Regional: <b>Europa Delicias, CD Plasencia, CD Pegaso, SR Boetticher y Navarro, Aviaco Madrileño, RSD Alcalá, CF Extremadura, CD Cacereño, CD Quintanar, SD Gimnástica Segoviana, CD Toledo y Olivenza CF</b><br />';

        //temporada 1968-69
        break;

        case 1407:
        $txt .= 'Ascienden a Segunda los vencedores de la primera eliminatoria: <b>CD Orense, Club Atlético Osasuna, CD Castellón y UD Salamanca.<hr />';
        $txt .= 'Los perdedores de la primera eliminatoria juegan contra los equipos de Segunda que promocionan.<br /><br />';
        $txt .= 'Permanecen en Segunda: <b>CD Ilicitano y Onteniente CF</b><br />';
        $txt .= 'Ascienden a Segunda: <b>Bilbao Atlético Club y UD San Andrés</b><br />';
        $txt .= 'Descienden a Tercera: <b>Deportivo Alavés y CD Alcoyano</b><br />';
        break;

        case 771:
        $txt .= 'Campeón y Copa de Europa: <b>Real Madrid</b><br />';
        $txt .= 'Recopa de Europa: <b>Atlético de Bilbao</b><br />';
        $txt .= 'Copa de Ferias: <b>UD Las Palmas, CF Barcelona, Centro Deportes Sabadell y Valencia CF</b><br />';
        $txt .= 'Descenso a Segunda: <b>CD Málaga, RCD Español y Córdoba CF</b><br />';

        break;

        case 772:
        $txt = 'Campeón: <b>Sevilla CF</b><br />';
        $txt .= 'Ascenso a Primera: <b>Sevilla CF, RC Celta y RCD Mallorca</b><br />';
        $txt .= 'Promoción Descenso a Tercera: <b>CD Alcoyano, Deportivo Alavés, Onteniente CF y CD Ilicitano</b><br />';
        $txt .= 'Descenso a Tercera: <b>CD Mestalla, Cádiz CF , SD Indauchu y Jerez Industrial</b><br />';

        break;

        case 773:
        $txt .= 'Campeón y fase de Ascenso a Segunda: <b>CD Orense</b><br />';
        $txt .= 'Descenso a Regional: <b>Club Lemos y SC Arosa</b><br />';

        break;

        case 774:
        $txt .= 'Campeón y fase de Ascenso a Segunda: <b>Bilbao Atlético Club </b><br />';
        $txt .= 'Descenso a Regional: <b>Atlético Bembibre y SD Hulleras</b><br />';

        break;

        case 775:
        $txt .= 'Campeón y fase de Ascenso a Segunda: <b>Club Atlético Osasuna</b><br />';
        $txt .= 'Descenso a Regional: <b>SD Ejea y Arenas SD</b><br />';

        break;

        case 776:
        $txt .= 'Campeón y fase de Ascenso a Segunda: <b>UD San Andrés</b><br />';
        $txt .= 'Descenso a Regional: <b>CF Palafrugell y CF Igualada</b><br />';
        $txt .= '<hr />El partido Palafrugell - Lérida (inicialmente 2-1) se dio por perdido al primero por alineación indebida, descontándosele además dos puntos de su clasificación.<br />';

        break;

        case 777:
        $txt .= 'Campeón y fase de Ascenso a Segunda: <b>CD Castellón</b><br />';
        $txt .= 'Descenso a Regional: <b>UD Poblense y UP Santa Catalina</b><br />';

        break;

        case 778:
        $txt .= 'Campeón y fase de Ascenso a Segunda: <b>Hércules CF</b><br />';
        $txt .= 'Descenso a Regional: Águilas CF y Tomelloso CF</b><br />';
        break;

        case 779:
        $txt .= 'Campeón y fase de Ascenso a Segunda: <b>RC Recreativo</b><br />';
        $txt .= 'Descenso a Regional: <b>Balón de Cádiz CF</b><br />';
        $txt .= '<hr />El Almería se retiró de la competición por su mala situación económica, anulándose los resultados de todos los partidos que disputó hasta la fecha.<br />';
        $txt .= 'El Adra figura con tres puntos menos por retirarse del partido Adra – Marbella y con otros tres por incomparecencia al Sanluqueño - Adra. <br />';

        break;

        case 780:
        $txt .= 'Campeón y fase de Ascenso a Segunda: <b>Salamanca</b><br />';
        $txt .= 'Descenso a Regional: <b>Béjar Industrial y Askar CF</b><br />';

        //temporada 1967-68
        break;

        case 1406:
        $txt .= '<hr />Asciende a Segunda: <b>Jerez Industrial</b><br />';
        $txt .= 'Permanecen en Segunda: <b>Club Ferrol, Burgos CF  y CD Mestalla</b><br />';
        $txt .= 'Desciende a Tercera: <b>Atlético Ceuta</b><br />';

        break;

        case 1405:
        $txt .= '<hr />Ascienden a Segunda: <b>SD Indauchu, Deportivo Alavés, Onteniente CF y CD Ilicitano.</b><br />';

        break;

        case 781:
        $txt .= 'Campeón y Copa de Europa: <b>Real Madrid</b><br />';
        $txt .= 'Recopa de Europa: <b>CF Barcelona</b><br />';
        $txt .= 'Copa de Ferias: <b>Valencia CF, Real Zaragoza CD , Atlético de Madrid y Atlético de Bilbao</b><br />';
        $txt .= 'Promoción de Descenso a Segunda: <b>Córdoba CF y Real Sociedad de Fútbol</b><br />';
        $txt .= 'Descenso a Segunda: <b>Real Betis Balompié y Sevilla CF</b><br />';

        break;

        case 782:
        $txt .= 'Campeón y Ascenso a Primera: <b>RC Deportivo</b><br />';
        $txt .= 'Promoción de Ascenso a Primera: <b>Real Valladolid CF</b><br />';
        $txt .= 'Promoción Descenso a Tercera: <b>Club Ferrol y Burgos CF</b><br />';
        $txt .= 'Descenso a Tercera: <b>CF Badalona, UP Langreo, Real Santander, UD Lérida, CD Badajoz, CD Europa, Club Atlético Osasuna y RS Gimnástica </b><br />';
        $txt .= '<hr /><i>Promoción Permanencia o Ascenso en Primera</i><br /><br />';
        $txt .= '26/05/1968 - Córdoba CF 3-0 CF Calvo Sotelo<br />';
        $txt .= '02/06/1968 - CF Calvo Sotelo 1-3 <b>Córdoba CF</b><br /><br />';
        $txt .= '09/06/1968 - Real Valladolid CF 0-1 Real Sociedad de Fútbol<br />';
        $txt .= '16/06/1968 - <b>Real Sociedad de Fútbol</b> 0-0 Real Valladolid CF<br /><br />';
        $txt .= 'Permanecen en Primera: <b>Real Sociedad de Fútbol y Córdoba CF</b><br />';

        break;

        case 783:
        $txt = 'Campeón: Granada y Ascenso a Primera: <b>Granada CF</b><br />';
        $txt .= 'Promoción de Ascenso a Primera: <b>CF Calvo Sotelo</b><br />';
        $txt .= 'Promoción Descenso a Tercera: <b>Atlético Ceuta y CD Mestalla</b><br />';
        $txt .= 'Descenso a Tercera: <b>CD Tenerife, CD Castellón, Real Jaén, Xerez CD, RC Recreativo, Levante UD, Hércules CF y CD Constancia</b><br />';
        $txt .= '<hr /><i>Promoción Permanencia o Ascenso en Primera</i><br /><br />';
        $txt .= '26/05/1968 - Córdoba CF 3-0 CF Calvo Sotelo<br />';
        $txt .= '02/06/1968 - CF Calvo Sotelo 1-3 <b>Córdoba CF</b><br /><br />';
        $txt .= '09/06/1968 - Real Valladolid CF 0-1 Real Sociedad de Fútbol<br />';
        $txt .= '16/06/1968 - <b>Real Sociedad de Fútbol</b> 0-0 Real Valladolid CF<br /><br />';
        $txt .= 'Permanecen en Primera: <b>Real Sociedad de Fútbol y Córdoba CF</b><br />';

        break;

        case 784:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Orense</b><br />';
        $txt .= 'Promoción a Segunda: <b>SD Compostela</b><br />';
        $txt .= 'Descenso a Regional: <b>Club Turista, Arsenal CF, Rápido de Bouzas, Calvo Sotelo de PGR, SD Órdenes y Brigantium CF </b><br />';

        break;

        case 791:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Real Avilés</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Ensidesa</b><br />';
        $txt .= 'Descenso a Regional: <b>Club Marino, Club Siero, Real Titánico, Carbayedo CF, Club Calzada y Santa Marina CF</b><br />';

        break;

        case 792:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>SD Indauchu</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Baracaldo Altos Hornos</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Santurce, SD Amorebieta, SD Deusto, Club Portugalete, UM Escobedo y CD Galdácano</b><br />';

        break;

        case 793:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Deportivo Alavés</b><br />';
        $txt .= 'Promoción a Segunda: <b>SD Éibar</b><br />';
        $txt .= 'Descenso a Regional: <b>Haro Deportivo, CD Mirandés, CD Elgóibar, Mondragón CF, SD Euskalduna y CD Touring</b><br />';

        break;

        case 794:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>SD Huesca</b><br />';
        $txt .= 'Promoción a Segunda: <b>Aragón CF</b><br />';
        $txt .= 'Descenso a Regional: <b>Mequinenza CD , Calvo Sotelo Escatrón, Club Juvenil Jacetano, Utebo CF, CD Épila y CD Caspe</b><br />';
        $txt .= 'El Caspe figura con tres puntos menos por incomparecencia a su partido en campo del Teruel. </b><br />';

        break;

        case 795:
        $txt = 'Campeón: <b>CD Condal</b><br />';
        $txt .= 'Fase de Ascenso a Segunda: <b>CD Condal y CD Tarrasa</b><br />';
        $txt .= 'Promoción a Segunda: <b>Gimnástico de Tarragona y CF Calella</b><br />';
        $txt .= 'Promoción Descenso a Regional: <b>CD Granollers, UD Sans, CF Villanueva y CF Igualada</b><br />';
        $txt .= 'Descenso a Regional: <b>AD Guixols y CD Manresa</b><br />';

        break;

        case 796:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Atlético Baleares</b><br />';
        $txt .= 'Promoción a Segunda: <b>UD Mahón</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Binisalem, CF Palma, Atlético Ciudadela y CD Alayor</b><br />';

        break;

        case 797:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Onteniente CF</b><br />';
        $txt .= 'Promoción a Segunda: <b>CF Gandía</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Buñol, CD Burriana, UD Alcira, SC Requena, UD Carcagente, CD Jávea, CD Olímpico y Atlético Saguntino</b><br />';

        break;

        case 785:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Ilicitano</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Eldense</b><br />';
        $txt .= 'Descenso a Regional: <b>Atlético Cartagena, Rayo Ibense CF, Yeclano CF, SD Almansa, Alicante CF y CD Cieza</b><br />';
        $txt .= '<hr />El partido Yeclano - Imperial Murcia (inicialmente 4-0) se da por perdido al Yeclano por alineación indebida, descontándosele además dos puntos de su clasificación. </b><br />';

        break;

        case 786:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>RB Linense</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Almería</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Fuengirola, Recreativo Granada, Juventud Torremolinos, Hispania FJ, Olímpica Victoriana y Vandalia CF</b><br />';

        break;

        case 787:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Recreativo Portuense</b><br />';
        $txt .= 'Promoción a Segunda: <b>Jerez Industrial</b><br />';
        $txt .= 'Descenso a Regional: <b>AD Carmona, Coria CF, CD Utrera, Riotinto Balompié, La Palma CF y Atlético Onubense</b><br />';
        $txt .= '<hr />El Sevilla Atlético quedó excluido de jugar la promoción, por ser filial del Sevilla, que había descendido a Segunda.<br />';
        $txt .= 'El partido Carmona - Riotinto, inicialmente 0-1, se dio por perdido al Riotinto, por alineación indebida, descontándosele además dos puntos de la clasificación. </b><br />';

        break;

        case 788:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CyD Leonesa</b><br />';
        $txt .= 'Promoción a Segunda: <b>UD Salamanca</b><br />';
        $txt .= 'Promoción Descenso a Regional: <b>CD San Juan</b><br />';
        $txt .= 'Descenso a Regional: <b>La Bañeza CF, SDG Arandina, CD Juventud CC, CD Salmantino, SD Gimnástica Medinense y Castilla CF Palencia</b><br />';

        break;

        case 789:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>AD Plus Ultra</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Talavera</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Femsa, UD Socuéllamos, Real Ávila, UD Santa Bárbara, CD Guadalajara, CD Toledo, CD Villarrobledo y Pedro Muñoz CF</b><br />';

        break;

        case 790:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Cacereño</b><br />';
        $txt .= 'Promoción a Segunda: <b>Valdepeñas CF</b><br />';
        $txt .= 'Descenso a Regional: <b>Getafe Deportivo, Aranjuez CF, UD Díter Zafra, UB Conquense, CD Don Benito, CD Olivenza, CD Leganés y Imperio de Mérida</b><br />';

        //temporada 1966-67
        break;

        case 1404:
        $txt .= '<hr />Permanecen en Segunda: <b>UP Langreo, Burgos CF, CD Constancia y Atlético Ceuta</b><br />';

        break;

        case 1403:
        $txt .= '<hr />Ascienden a Segunda: <b>CD Alcoyano, Real Jaén, Xerez CD y CD Badajoz.</b><br />';

        break;

        case 798:
        $txt .= 'Campeón y Copa de Europa: <b>Real Madrid</b><br />';
        $txt .= 'Recopa de Europa: <b>Valencia CF</b><br />';
        $txt .= 'Copa de Ferias: <b>Atlético de Bilbao, Atlético de Madrid, CF Barcelona y Real Zaragoza CD</b><br />';
        $txt .= 'Promoción de descenso a Segunda: <b>Sevilla CF y Granada CF</b><br />';
        $txt .= 'Descenso a Segunda: <b>Hércules CF y RC Deportivo</b><br />';

        break;

        case 799:
        $txt .= 'Campeón y Ascenso a Primera: <b>Real Sociedad</b><br />';
        $txt .= 'Promoción de Ascenso a Primera: <b>Real Gijón</b><br />';
        $txt .= 'Promoción de Descenso a Tercera: <b>UP Langreo y Burgos CF</b><br />';
        $txt .= 'Descenso a Tercera: <b>CD Logroñés y SD Indauchu</b><br />';
        $txt .= '<hr /><i>Promoción Permanencia o Ascenso en Primera</i><br /><br />';
        $txt .= '28/05/1967 - Sevilla CF 1-0 Real Gijón<br />';
        $txt .= '04/06/1967 - Real Gijón 0-1 <b>Sevilla CF</b><br /><br />';
        $txt .= '18/06/1967 - Real Betis 2-0 Granada CF<br />';
        $txt .= '25/06/1967 - Granada CF 0-1 <b>Real Betis Balompié</b><br /><br />';
        $txt .= 'Asciende a Primera: <b>Real Betis Balompié</b><br />';
        $txt .= 'Permanece en Primera: <b>Sevilla CF</b><br />';
        $txt .= 'Desciende a Segunda: <b>Granada CF</b><br />';

        break;

        case 800:
        $txt .= 'Campeón y Ascenso a Primera: <b>CD Málaga</b><br />';
        $txt .= 'Promoción de Ascenso a Primera: <b>Real Betis Balompié</b><br />';
        $txt .= 'Promoción Descenso a Tercera: <b>Atlético Ceuta y CD Constancia</b><br />';
        $txt .= 'Descenso a Tercera: Algeciras <b>CF  y CD Condal</b><br />';
        $txt .= '<hr /><i>Promoción Permanencia o Ascenso en Primera</i><br /><br />';
        $txt .= '28/05/1967 - Sevilla CF 1-0 Real Gijón<br />';
        $txt .= '04/06/1967 - Real Gijón 0-1 <b>Sevilla CF</b><br /><br />';
        $txt .= '18/06/1967 - Real Betis 2-0 Granada CF<br />';
        $txt .= '25/06/1967 - Granada CF 0-1 <b>Real Betis Balompié</b><br /><br />';
        $txt .= 'Asciende a Primera: <b>Real Betis Balompié</b><br />';
        $txt .= 'Permanece en Primera: <b>Sevilla CF</b><br />';
        $txt .= 'Desciende a Segunda: <b>Granada CF</b><br />';

        break;

        case 801:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Orense</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Lugo</b><br />';
        $txt .= 'Descenso a Regional: <b>Corujo CF y CD Arenteiro</b><br />';

        break;

        case 808:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Real Avilés</b><br />';
        $txt .= 'Promoción a Segunda: <b>Caudal Deportivo</b><br />';
        $txt .= 'Descenso a Regional: <b>Luarca CF y Pelayo CF</b><br />';

        break;

        case 809:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Bilbao Atlético Club </b><br />';
        $txt .= 'Promoción a Segunda: <b>Club Sestao</b><br />';
        $txt .= 'Descenso a Regional: <b>Santoña CF, SD Unión Club, Barreda Balompié y CD Laredo</b><br />';

        break;

        case 810:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>SD Éibar</b><br />';
        $txt .= 'Promoción a Segunda: <b>Real Unión Club</b><br />';
        $txt .= 'Descenso a Regional: <b>Tolosa CF, SD Alfaro y CD Iruña</b><br />';

        break;

        case 811:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>SD Huesca</b><br />';
        $txt .= 'Promoción a Segunda: <b>Aragón CF</b><br />';
        $txt .= 'Descenso a Regional: <b>CF Renfe</b><br />';

        break;

        case 812:
        $txt = 'Campeón: UD Olot</b><br />';
        $txt .= 'Fase de ascenso a Segunda: <b>UD Olot y Gimnástico de Tarragona</b><br />';
        $txt .= 'Promoción a Segunda: <b>Gerona CF y CF Lloret</b><br />';
        $txt .= 'Descenso a Regional: <b>AD Balaguer, CD Mataró, CD L´Hospitalet y UD Vic</b><br />';

        break;

        case 813:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>UD Mahón</b><br />';
        $txt .= 'Promoción a Segunda: <b>SD Ibiza</b><br />';

        break;

        case 814:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Alcoyano</b><br />';
        $txt .= 'Promoción a Segunda: <b>Onteniente CF</b><br />';
        $txt .= 'Descenso a Regional: <b>UD Oliva</b><br />';

        break;

        case 802:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Eldense</b><br />';
        $txt .= 'Promoción a Segunda: <b>Albacete Balompié</b><br />';
        $txt .= 'Descenso a Regional: <b>Jumilla CF y La Roda CF</b><br />';

        break;

        case 803:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Real Jaén</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Almería</b><br />';
        $txt .= 'Descenso a Regional: <b>SD Imperio de Ceuta</b><br />';

        break;

        case 804:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Xerez CD</b><br />';
        $txt .= 'Promoción a Segunda: CJerez Industrial</b><br />';
        $txt .= 'Descenso a Regional: <b>CD San Roque</b><br />';

        break;

        case 805:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>UD Salamanca</b><br />';
        $txt .= 'Promoción a Segunda: <b>SD Ponferradina</b><br />';
        $txt .= 'Descenso a Regional: <b>Ciudad Rodrigo y Laciana CF</b><br />';

        break;

        case 806:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>RCD Carabanchel</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Colonia Moscardó</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Bolañego y CD Torrijos</b><br />';

        break;

        case 807:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Badajoz</b><br />';
        $txt .= 'Promoción a Segunda: <b>AD Plus Ultra</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Villacañas</b><br />';
        $txt .= '<hr />El Villacañas figura con tres puntos menos por incomparecencia a su partido como local ante el Olivenza. <br />';

        //temporada 1965-66
        break;

        case 1402:
        $txt .= '<hr />Permanecen en Segunda: <b>UP Langreo, CD Europa, CD Constancia y Atlético Ceuta</b><br />';

        break;

        case 1401:
        $txt .= '<hr />Ascienden a Segunda: <b>Club Ferrol, RS Gimnástica, CD Logroñés y CD Castellón</b><br />';

        break;

        case 815:
        $txt = 'Campeón: <b>Atletico de Madrid</b><br />';
        $txt .= 'Copa de Europa: <b>Atlético Madrid y Real Madrid CF</b><br />';
        $txt .= 'Recopa de Europa : <b>Real Zaragoza CD</b><br />';
        $txt .= 'Copa de la Ferias: <b>Atlético de Bilbao, CF Barcelona, Sevilla CF y Valencia CF</b><br />';
        $txt .= 'Promoción de Descenso a Segunda: <b>CD Málaga y Centro de Deportes Sabadell</b><br />';
        $txt .= 'Descenso a Segunda: <b>RCD Mallorca y Real Betis</b><br />';
        $txt .= '<hr />El Real Madrid se clasifica para jugar la próxima edición de la Copa de Europa por resultar campeón de la actual. </b><br />';

        break;

        case 816:
        $txt .= 'Campeón y ascenso a Primera: <b>RC Deportivo</b><br />';
        $txt .= 'Promoción de ascenso a Primera: <b>RC Celta</b><br />';
        $txt .= 'Promoción de descenso a Tercera: <b>UP Langreo y CD Europa</b><br />';
        $txt .= 'Descenso a Tercera: <b>CD L´Hospitalet y Baracaldo Altos Hornos </b><br />';
        $txt .= '<hr /><i>Promoción Permanencia o Ascenso en Primera</i><br /><br />';
        $txt .= '15/05/1966 - Granada CF 2-1 CD Málaga<br />';
        $txt .= '22/05/1966 - Centro de Deportes Sabadell 2-0 RC Celta<br /><br />';
        $txt .= '22/05/1966 - CD Málaga 1-1 <b>Granada CF</b><br />';
        $txt .= '29/05/1966 - RC Celta 0-0 <b>Centro de Deportes Sabadell</b><br /><br />';
        $txt .= 'Asciende a Primera: <b>Granada CF</b><br />';
        $txt .= 'Permanece en Primera: <b>Centro de Deportes Sabadell</b><br />';
        $txt .= 'Desciende a Segunda: <b>CD Málaga</b><br />';

        break;

        case 817:
        $txt .= 'Campeón y ascenso a Primera: <b>Hércules CF</b><br />';
        $txt .= 'Promoción de Ascenso a Primera: <b>Granada CF</b><br />';
        $txt .= 'Promoción de descenso a Tercera: <b>CD Constancia y Atlético Ceuta</b><br />';
        $txt .= 'Descenso a Tercera: <b>Melilla CF y CD Badajoz</b><br />';
        $txt .= '<hr /><i>Promoción Permanencia o Ascenso en Primera</i><br /><br />';
        $txt .= '15/05/1966 - Granada CF 2-1 CD Málaga<br />';
        $txt .= '22/05/1966 - Centro de Deportes Sabadell 2-0 RC Celta<br /><br />';
        $txt .= '22/05/1966 - CD Málaga 1-1 <b>Granada CF</b><br />';
        $txt .= '29/05/1966 - RC Celta 0-0 <b>Centro de Deportes Sabadell</b><br /><br />';
        $txt .= 'Asciende a Primera: <b>Granada CF</b><br />';
        $txt .= 'Permanece en Primera: <b>Centro de Deportes Sabadell</b><br />';
        $txt .= 'Desciende a Segunda: <b>CD Málaga</b><br />';

        break;

        case 818:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Club Ferrol</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Orense</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Choco</b><br />';

        break;

        case 825:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Praviano</b><br />';
        $txt .= 'Promoción a Segunda: <b>Real Avilés</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Lieres y UC Ceares</b><br />';

        break;

        case 826:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Gim. Torrelavega</b><br />';
        $txt .= 'Promoción a Segunda: <b>Rayo Cantabria</b><br />';
        $txt .= 'Descenso a Regional: <b>Club Portugalete, CD Guecho, US San Vicente y CyD Guarnizo</b><br />';

        break;

        case 827:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Logroñés</b><br />';
        $txt .= 'Promoción a Segunda: <b>SD Éibar</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Mirandés y Villafranca UC</b><br />';

        break;

        case 828:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Numancia</b><br />';
        $txt .= 'Promoción a Segunda: <b>Calvo Sotelo Andorra</b><br />';

        break;

        case 829:
        $txt = 'Campeón: <b>Gimnástico de Tarragona</b><br />';
        $txt .= 'Fase de ascenso a Segunda: <b>Gimnástico de Tarragona y UD Sans</b><br />';
        $txt .= 'Promoción a Segunda: <b>UD Olot y CD Tarrasa</b><br />';
        $txt .= 'Descenso a Regional: <b>CF Gavá y CD Puigreig</b><br />';

        break;

        case 830:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>UD Mahón</b><br />';
        $txt .= 'Promoción a Segunda: <b>Atlético Baleares</b><br />';

        break;

        case 831:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Castellón</b><br />';
        $txt .= 'Promoción a Segunda: <b>Onteniente CF</b><br />';
        $txt .= 'Descenso a Regional: <b>UD Alcira</b><br />';

        break;

        case 819:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Eldense</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Cartagena</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Abarán y CD Lorca</b><br />';
        $txt .= '<hr />El partido Cieza - Abarán se dio por perdido al Abarán por incomparecencia, sancionándosele además con la pérdidad de tres puntos. <br />';

        break;

        case 820:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>RB Linense</b><br />';
        $txt .= 'Promoción a Segunda: <b>Atlético Marbella</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Antequerano y Atético Cordobés</b><br />';
        $txt .= '<hr />El CD Ronda se retiró de la competición una vez iniciada la misma, anulándose los resultados de los partidos que disputó hasta la fecha. <br />';
        $txt .= 'El CD Antequerano figura con tres puntos menos por incomparecencia a su partido en el campo del Adra. </b><br />';

        break;

        case 821:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Jerez Industrial</b><br />';
        $txt .= 'Promoción a Segunda: <b>Sevilla Atlético </b><br />';
        $txt .= 'Descenso a Regional: <b>Puerto Real CF y CD Chiclanero</b><br />';
        $txt .= '<hr />Los partidos Alcalá - Chiclanero, inicialmente 1-1, y Riotinto - Chiclanero,  inicialmente 0-2, se diero por perdidos al Chiclanero por alineación indebida, descontándosele cuatro puntos de su clasificación. <br />';

        break;

        case 822:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Ponferradina</b><br />';
        $txt .= 'Promoción a Segunda: <b>CyD Leonesa</b><br />';
        $txt .= 'Descenso a Regional: <b>SD Hulleras Sabero y CD Astorga</b><br />';

        break;

        case 823:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>AD Plus Ultra</b><br />';
        $txt .= 'Promoción a Segunda: <b>Colonia Moscardó</b><br />';
        $txt .= '<hr />El partido Torrijos - Femsa, inicialmente 0-0, se dio por perdido al primero por alineación indebida, descontándosele además dos puntos de su clasificación. <br />';

        break;

        case 824:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CF Extremadura</b><br />';
        $txt .= 'Promoción a Segunda: <b>UD Díter Zafra</b><br />';
        $txt .= '<hr />El partido CD Bolañego - Alcázar CF, inicialmente 0-0, se da por perdido al Alcázar por alineación indebida, descontándosele además dos puntos de la clasificación. <br />';

        //temporada 1964-65
        break;

        case 1400:
        $txt .= 'Permanecen en Segunda: <b>CD Europa, CF Badalona, CD Constancia y Cádiz CF</b><br />';

        break;

        case 1399:
        $txt .= 'Ascienden a Segunda: <b>Club Condal, UD Lérida, Rayo Vallecano y CD Badajoz</b><br />';

        break;

        case 832:
        $txt .= 'Campeón y Copa de Europa: <b>Real Madrid CF</b><br />';
        $txt .= 'Recopa de Europa : <b>Club Atlético de Madrid</b><br />';
        $txt .= 'Copa de Ferias: <b>CF Barcelona, RCD Español, Valencia CF y Real Zaragoza CD</b><br />';
        $txt .= 'Promoción de Descenso a Segunda: <b>Real Murcia CF y Levante UD</b><br />';
        $txt .= 'Descenso a Segunda: <b>Real Oviedo y RC Deportivo</b><br />';

        break;

        case 833:
        $txt .= 'Campeón y ascenso a Primera: <b>Pontevedra CF</b><br />';
        $txt .= 'Promoción de ascenso a Primera: <b>Centro Deportes Sabadell</b><br />';
        $txt .= 'Promoción de descenso a Tercera: <b>CD Europa y CF Badalona</b><br />';
        $txt .= 'Descenso a Tercera: <b>CD Orense y Real Unión Club</b><br />';
        $txt .= '<hr /><i>Promoción Permanencia o Ascenso en Primera</i><br /><br />';
        $txt .= '06/06/1965 - Real Murcia 2-2 Centro Deportes Sabadell<br />';
        $txt .= '06/06/1965 - CD Málaga 4-2 Levante UD<br /><br />';
        $txt .= '13/06/1965 - <b>Centro Deportes Sabadell</b> 1-0 Real Murcia<br />';
        $txt .= '13/06/1965 - Levante UD 0-0 <b>CD Málaga</b><br /><br />';
        $txt .= 'Ascienden a Primera: <b>Centro Deportes Sabadell y CD Málaga</b><br />';
        $txt .= 'Descienden a Segunda: Real Murcia y Levante UD</b><br />';

        break;

        case 834:
        $txt .= 'Campeón y ascenso a Primera: <b>RCD Mallorca</b><br />';
        $txt .= 'Promoción de ascenso a Primera: <b>CD Málaga</b><br />';
        $txt .= 'Promoción de descenso a Tercera: <b>CD Constancia y Cádiz CF</b><br />';
        $txt .= 'Descenso a Tercera: <b>Onteniente CF y CD Abarán</b><br />';
        $txt .= '<hr /><i>Promoción Permanencia o Ascenso en Primera</i><br /><br />';
        $txt .= '06/06/1965 - Real Murcia 2-2 Centro Deportes Sabadell<br />';
        $txt .= '06/06/1965 - CD Málaga 4-2 Levante UD<br /><br />';
        $txt .= '13/06/1965 - <b>Centro Deportes Sabadell</b> 1-0 Real Murcia<br />';
        $txt .= '13/06/1965 - Levante UD 0-0 <b>CD Málaga</b><br /><br />';
        $txt .= 'Ascienden a Primera: <b>Centro Deportes Sabadell y CD Málaga</b><br />';
        $txt .= 'Descienden a Segunda: Real Murcia y Levante UD</b><br />';

        break;

        case 835:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Club Ferrol</b><br />';
        $txt .= 'Promoción a Segunda: <b>SD Compostela</b><br />';
        $txt .= 'Descenso a Regional: <b>Arsenal CF, Calvo Sotelo de PGR y CD Foz</b><br />';

        break;

        case 841:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Real Avilés</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Praviano</b><br />';
        $txt .= 'Descenso a Regional: <b>Santiago Aller y San Esteban</b><br />';
        $txt .= 'El partido Luarca - San Esteban (inicialmente 0-1) se da por perdido al San Esteban por alineación indebida, descontándosele además dos puntos de su clasificación.</b><br />';

        break;

        case 842:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>RS Gimnástica</b><br />';
        $txt .= 'Promoción a Segunda: <b>Club Sestao</b><br />';
        $txt .= 'Descenso a Regional: <b>SD Deusto y CD Villosa</b><br />';

        break;

        case 843:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Deportivo Alavés</b><br />';
        $txt .= 'Promoción a Segunda: <b>SD Éibar</b><br />';
        $txt .= 'Descenso a Regional: <b>Aurrerá Ondárroa, SD Beasaín y CD Azcoyen</b><br />';

        break;

        case 844:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Calvo Sotelo Andorra</b><br />';
        $txt .= 'Promoción a Segunda: <b>SD Huesca</b><br />';

        break;

        case 845:
        $txt = 'Campeón: Club Condal</b><br />';
        $txt .= 'Fase de ascenso a Segunda: <b>Club Condal y UD Lérida</b><br />';
        $txt .= 'Promoción a Segunda: <b>Gimnástico de Tarragona y UD Sans</b><br />';
        $txt .= 'Descenso a Regional: <b>CF Villafranca y Atlético Gironella</b><br />';

        break;

        case 846:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Atlético Baleares</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Menorca</b><br />';

        break;

        case 847:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Castellón</b><br />';
        $txt .= 'Promoción a Segunda: <b>CF Gandía</b><br />';
        $txt .= 'Descenso a Regional: <b>UD Canals</b><br />';

        break;

        case 1032:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Albacete Balompié</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Cartagena</b><br />';
        $txt .= 'Descenso a Regional: <b>SD Almansa, Aspense y Monóvar CD</b><br />';

        break;

        case 836:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Real Jaén CF</b><br />';
        $txt .= 'Promoción a Segunda: <b>Almería</b><br />';
        $txt .= 'Descenso a Regional: <b>Atlético Prieguense y Puerto Malagueño</b><br />';

        break;

        case 837:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Jerez</b><br />';
        $txt .= 'Promoción a Segunda: <b>RB Linense</b><br />';
        $txt .= 'El Écija se retiró de la competición una vez iniciada, anulándose los resultados de los partidos que disputó hasta entonces.</b><br />';

        break;

        case 838:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>UD Salamanca</b><br />';
        $txt .= 'Promoción a Segunda: <b>Béjar Industrial</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Peñaranda y CD Salmantino</b><br />';

        break;

        case 839:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Rayo Vallecano</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Talavera</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Leganés</b><br />';

        break;

        case 840:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Badajoz</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Cacereño</b><br />';

        //temporada 1963-64
        break;

        case 1398:
        $txt .= 'Permanecen en Segunda: <b>CF Badalona, CD L´Hospitalet, Atlético Ceuta y CD Abarán</b><br />';

        break;

        case 1397:
        $txt .= 'Ascienden a Segunda: <b>Baracaldo Altos Hornos, Centro de Deportes Sabadell, Real Unión Club  y CF Calvo Sotelo </b><br />';

        break;

        case 848:
        $txt .= 'Campeón y Copa de Europa : <b>Real Madrid</b><br />';
        $txt .= 'Recopa de Europa : <b>Real Zaragoza CD</b><br />';
        $txt .= 'Copa de Ferias: <b>CF Barcelona, Real Betis Balompié, Valencia CF, Club Atlético de Madrid y Atlético de Bilbao</b><br />';
        $txt .= 'Promoción de descenso a Segunda: <b>RCD Español y Real Oviedo</b><br />';
        $txt .= 'Descenso a Segunda: <b>Pontevedra CF  y Real Valladolid CF</b><br />';

        break;

        case 849:
        $txt .= 'Campeón y ascenso a Primera: <b>RC Deportivo</b><br />';
        $txt .= 'Promoción de ascenso a Primera: <b>Real Gijón</b><br />';
        $txt .= 'Promoción de descenso a Tercera: <b>CD L´Hospitalet y CF Badalona</b><br />';
        $txt .= 'Descenso a Tercera: <b>UD Salamanca y Deportivo  Alavés</b><br />';
        $txt .= '<hr /><i>Promoción Permanencia o Ascenso en Primera</i><br /><br />';
        $txt .= '07/06/1964 - Real Oviedo 4-1 Hércules CF<br />';
        $txt .= '14/06/1964 - Real Gijón 1-0 RCD Español<br />';
        $txt .= '14/06/1964 - Hércules CF 1-0 <b>Real Oviedo</b><br />';
        $txt .= '21/06/1964 - <b>RCD Español</b> 3-0 Real Gijón<br />';
        $txt .= 'Permanecen en Primera: RCD Español y Real Oviedo</b><br />';

        break;

        case 850:
        $txt .= 'Campeón y ascenso a Primera: <b>UD Las Palmas</b><br />';
        $txt .= 'Promoción de ascenso a Primera: <b>Hércules CF</b><br />';
        $txt .= 'Promoción de descenso a Tercera: <b>CD Abarán y Atlético Ceuta</b><br />';
        $txt .= 'Descenso a Tercera: <b>CD San Fernando y CD Eldense</b><br />';
        $txt .= '<hr /><i>Promoción Permanencia o Ascenso en Primera</i><br /><br />';
        $txt .= '07/06/1964 - Real Oviedo 4-1 Hércules CF<br />';
        $txt .= '14/06/1964 - Real Gijón 1-0 RCD Español<br />';
        $txt .= '14/06/1964 - Hércules CF 1-0 <b>Real Oviedo</b><br />';
        $txt .= '21/06/1964 - <b>RCD Español</b> 3-0 Real Gijón<br />';
        $txt .= 'Permanecen en Primera: RCD Español y Real Oviedo</b><br />';

        break;

        case 851:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>SD Compostela</b><br />';
        $txt .= 'Promoción a Segunda: <b>Fabril SD</b><br />';
        $txt .= 'Descenso a Regional: <b>Club Bueu SD y Marín CF</b><br />';

        break;

        case 857:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Caudal Deportivo</b><br />';
        $txt .= 'Promoción a Segunda: <b> Real Avilés</b><br />';
        $txt .= 'Descenso a Regional: <b>Club Calzada y Somió CF</b><br />';

        break;

        case 858:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Baracaldo Altos Hornos</b><br />';
        $txt .= 'Promoción a Segunda: <b>RS Gimnástica</b><br />';
        $txt .= 'Descenso a Regional: <b>Barreda Balompie, CD Galdácano y CD Naval</b><br />';

        break;

        case 859:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Real Unión Club</b><br />';
        $txt .= 'Promoción a Segunda: <b>SD Éibar</b><br />';
        $txt .= 'Descenso a Regional: <b> Tolosa CF y CD Iruña</b><br />';

        break;

        case 860:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Calvo Sotelo Andorra</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Numancia</b><br />';
        $txt .= 'Descenso a Regional: <b>AD Sabiñánigo</b><br />';
        $txt .= '<hr />El Sabiñánigo figura con tres puntos menos por sanción federativa, por incomparecencia en su partido en campo del Calvo Sotelo Escatrón</b><br />';

        break;

        case 861:
        $txt = 'Campeón: <b>Centro Deportes Sabadell</b><br />';
        $txt .= 'Fase de ascenso a Segunda: <b>Centro Deportes Sabadell y UD Lérida</b><br />';
        $txt .= 'Promoción a Segunda: <b>Gimnástico de Tarragona y CD Tarrasa</b><br />';
        $txt .= 'Descenso a Regional: <b>CF Villanueva y CD Puigreig</b><br />';
        $txt .= '<hr />El partido Puigreig - Gimnástico de Tarragona, inicialmente 2-1, se dio por perdido al Puigreig por alineación indebida, descontándosele además dos puntos de su clasificación.</b><br />';

        break;

        case 862:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Menorca</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Atlético Baleares</b><br />';

        break;

        case 863:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Castellón</b><br />';
        $txt .= 'Promoción a Segunda: <b>UD Alcira</b><br />';
        $txt .= 'Descenso a Regional: <b>UD Tabernes y CF Cullera</b><br />';

        break;

        case 1031:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Albacete Balompié</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Cartagena</b><br />';
        $txt .= 'Descenso a Regional: <b>Águilas CF y Madrigueras CF</b><br />';

        break;

        case 852:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Atético Malagueño</b><br />';
        $txt .= 'Promoción a Segunda: <b>Atlético Cordobés</b><br />';
        $txt .= 'Descenso a Regional: <b>Riffien Jaddú, CD Linares y CD Veleño</b><br />';

        break;

        case 853:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Jerez Industrial</b><br />';
        $txt .= 'Promoción a Segunda: <b>Jerez CD</b><br />';
        $txt .= 'Descenso a Regional: <b>La Palma CF, UD Cañamera y Barbate CF</b><br />';

        break;

        case 854:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Béjar Industrial</b><br />';
        $txt .= 'Promoción a Segunda: <b>SD Ponferradina</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Astorga, Palencia CF y CD San Pedro</b><br />';
        $txt .= '<hr />El partido San Pedro - Peñaranda (inicialmente 0-0) fue dado por perdido al San Pedro por alineación indebida, descontándosele además dos puntos de su clasificación.</b><br />';
        $txt .= 'El Palencia fue sancionado con la pérdida de tres puntos por incomparecencia a su partido de la última jornada en campo del Peñaranda.</b><br />';

        break;

        case 855:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>AD Plus Ultra</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Toledo</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Torrijos y Aranjuez CF</b><br />';

        break;

        case 856:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CF Calvo Sotelo</b><br />';
        $txt .= 'Promoción a Segunda: <b>CF Extremadura</b><br />';

        //temporada 1962-63
        break;

        case 1394:
        $txt .= 'Ascienden a Segunda: <b>Algeciras CF, CD L´Hospitalet y CF Badalona</b><br />';
        $txt .= 'Permanece en Segunda: <b>UP Langreo</b><br />';
        $txt .= 'Descienden a Tercera: <b>CD Atlético Baleares, Real Jaén CF y CD Cartagena</b><br />';
        break;

        case 1395:
        $txt .= 'Ascienden a Segunda: <b>Atlético de Ceuta, Onteniente CF , CD Abarán y CD Europa</b><br />';

        break;

        case 864:
        $txt .= 'Campeón y Copa de Europa: <b>Real Madrid CF</b><br />';
        $txt .= 'Recopa de Europa: <b>CF Barcelona</b><br />';
        $txt .= 'Copa de Ferias: <b>Club Atlético de Madrid, Real Zaragoza CD y Valencia CF</b><br />';
        $txt .= 'Promoción de descenso a Segunda: <b>RCD Mallorca y RC Deportivo</b><br />';
        $txt .= 'Descenso a Segunda: <b>Club Atlético Osasuna y CD Málaga</b><br />';
        break;

        case 865:
        $txt .= 'Campeón y ascenso a Primera: <b>Pontevedra CF</b><br />';
        $txt .= 'Promoción de ascenso a Primera: <b>RCD Español</b><br />';
        $txt .= 'Promoción de descenso a Tercera: <b>UP Langreo y CD Atlético Baleares</b><br />';
        $txt .= 'Descenso a Tercera: <b>CD Basconia y Centro Deportes Sabadell</b><br />';
        $txt .= '<hr /><i>Promoción Permanencia o Ascenso en Primera</i><br /><br />';
        $txt .= '12/05/1963 - RCD Español 2-1 RCD Mallorca<br />';
        $txt .= '26/05/1963 - RC Deportivo 1-2 Levante UD<br />';
        $txt .= '19/05/1963 - RCD Mallorca 2-1 RCD Español<br />';
        $txt .= '02/06/1963 - <b>Levante UD</b> 2-1 RC Deportivo<br />';
        $txt .= '25/05/1963 - Desempate: <b>RCD Español</b> 1-0 RCD Mallorca (jugado en Madrid)<br />';
        $txt .= '<br />Ascienden a Primera: <b>RCD Español y Levante UD</b><br />';
        $txt .= '<br />Descienden a Segunda: <b>RCD Mallorca y RC Deportivo</b><br />';

        break;

        case 866:
        $txt .= 'Campeón y ascenso a Primera: <b>Real Murcia CF</b><br />';
        $txt .= 'Promoción de ascenso a Primera: <b>Levante UD</b><br />';
        $txt .= 'Promoción de descenso a Tercera: <b>CD Cartagena y Real Jaén CF</b><br />';
        $txt .= 'Descenso a Tercera: <b>Sevilla Atlético Club y AD Plus Ultra</b><br />';
        $txt .= '<hr /><i>Promoción Permanencia o Ascenso en Primera</i><br /><br />';
        $txt .= '12/05/1963 - RCD Español 2-1 RCD Mallorca<br />';
        $txt .= '26/05/1963 - RC Deportivo 1-2 Levante UD<br />';
        $txt .= '19/05/1963 - RCD Mallorca 2-1 RCD Español<br />';
        $txt .= '02/06/1963 - <b>Levante UD</b> 2-1 RC Deportivo<br />';
        $txt .= '25/05/1963 - Desempate: <b>RCD Español</b> 1-0 RCD Mallorca (jugado en Madrid)<br />';
        $txt .= '<br />Ascienden a Primera: <b>RCD Español y Levante UD</b><br />';
        $txt .= '<br />Descienden a Segunda: <b>RCD Mallorca y RC Deportivo</b><br />';

        break;

        case 867:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Club Ferrol</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Lugo</b><br />';
        $txt .= 'Descenso a Regional: <b>Vivero CF y Zeltia Deportivo</b><br />';
        $txt .= '<hr />El partido Bueu - Zeltia (inicialmente 2-2) se da por perdido al Zeltia por alineación indebida, descontándosele además dos puntos de su clasificación.<br />';

        break;

        case 873:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Caudal Deportivo</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Llaranes</b><br />';
        $txt .= 'Descenso a Regional: <b>Club Marino y CD Lieres</b><br />';

        break;

        case 874:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Baracaldo Altos Hornos </b><br />';
        $txt .= 'Promoción a Segunda: <b>Arenas Club </b><br />';
        $txt .= 'Descenso a Regional: <b>CD Laredo, SD Deusto, Santoña CF y CD Larramendi</b><br />';
        break;

        case 875:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>SD Éibar</b><br />';
        $txt .= 'Promoción a Segunda: <b>Real Unión Club</b><br />';
        $txt .= 'Descenso a Regional: <b>Villafranca UC, CD Vergara y CD Vitoria</b><br />';
        $txt .= '<hr />El partido Vergara - Mondragón (inicialmente 2-1) se da por perdido al Vergara por alineación indebida, descontándosele además dos puntos de su clasificación.<br />';

        break;

        case 876:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Numancia</b><br />';
        $txt .= 'Promoción a Segunda: <b>SD Huesca</b><br />';
        $txt .= '<hr />El partido Barbastro - Caspe, inicialmente 4-3, se dio por perdido al Barbastro por alineación indebida, descontándosele además dos puntos de su clasificación.<br />';

        break;

        case 877:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Fabra y Coats</b><br />';
        $txt .= 'Promoción a Segunda: <b>CF Badalona</b><br />';
        $txt .= 'Descenso a Regional: <b>UD Figueras, CD Berga, UD Atlético Gramanet, Guixols CF y UD Artiguense</b><br />';
        break;

        case 878:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Europa</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD L´Hospitalet</b><br />';
        $txt .= 'Descenso a Regional: <b>CA Iberia, CF Igualada, UD San Martín, UD Pueblo Seco y AD Balaguer</b><br />';

        break;

        case 879:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>UD Mahón</b><br />';
        $txt .= 'Promoción a Segunda: <b>Atlético Ciudadela </b><br />';
        $txt .= '<hr />El Manacor figura con tres puntos de sanción por incomparecencia al partido Mahón - Manacor.<br />';
        break;

        case 880:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Onteniente CF</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Alcoyano</b><br />';
        $txt .= 'Descenso a Regional: <b>CD L´Alcúdia</b><br />';
        break;

        case 868:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Abarán</b><br />';
        $txt .= 'Promoción a Segunda: <b>Orihuela Deportiva</b><br />';
        $txt .= 'Descenso a Regional: <b>Crevillente Industrial y CD Almoradí</b><br />';
        break;

        case 869:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Hispania</b><br />';
        $txt .= 'Promoción a Segunda: <b>Atlético Malagueño</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Alhaurino</b><br />';
        $txt .= '<hr />El Peñarroya Pueblonuevo se retiró por motivos económicos una vez iniciada la competición, dándose por no jugados todos los partidos en que intervino hasta entonces.<br />';

        break;

        case 870:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Atlético Ceuta </b><br />';
        $txt .= 'Promoción a Segunda: <b>Algeciras CF</b><br />';
        $txt .= 'Descenso a Regional: <b>Tarifa UD y Bollullos CF</b><br />';
        $txt .= '<hr />El partido Barbate - Coria, inicialmente 4-1, se dio por perdido al Barbate por alineación indebida, descontándosele además dos puntos por sanción.<br />';

        break;

        case 871:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Béjar Industrial</b><br />';
        $txt .= 'Promoción a Segunda: <b>Palencia CF</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Astorga y CD San Pedro</b><br />';

        break;

        case 872:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CF Calvo Sotelo</b><br />';
        $txt .= 'Promoción a Segunda: <b>Rayo Vallecano</b><br />';

        //temporada 1961-62
        break;

        case 1394:
        $txt .= 'Asciende a Segunda: <b>Melilla CF</b><br />';
        $txt .= 'Permanecen en Segunda: <b>SD Indauchu, CD Basconia y CD San Fernando</b><br />';
        $txt .= 'Desciende a Tercera: <b>Albacete Balompié</b><br />';
        break;

        case 1393:
        $txt .= 'Ascienden a Segunda: <b>UP Langreo, CD Constancia, CD Eldense y Sevilla FC Atlético</b><br />';

        break;

        case 881:
        $txt = 'Campeón: <b>Real Madrid CF</b><br />';
        $txt .= 'Copa de Europa: <b>Real Madrid CF</b><br />';
        $txt .= 'Recopa de Europa: <b>Atlético de Madrid y Sevilla CF</b><br />';
        $txt .= 'Copa de Ferias: <b>CF Barcelona, Valencia CF y Real Zaragoza CD</b><br />';
        $txt .= 'Promoción de descenso a Segunda: <b>RCD Español y Real Santander </b><br />';
        $txt .= 'Descenso a Segunda: <b>Real Sociedad de Fútbol y CD Tenerife</b><br />';

        break;

        case 882:
        $txt .= 'Campeón y ascenso a Primera: <b>RC Deportivo</b><br />';
        $txt .= 'Promoción de ascenso a Primera: <b>Real Valladolid CF</b><br />';
        $txt .= 'Promoción de descenso a Tercera: <b>SD Indauchu y CD Basconia</b><br />';
        $txt .= 'Descenso a Tercera: <b>San Sebastián CF y CyD Leonesa</b> (El San Sebastián CF desciende por ser filial de la Real Sociedad, y haber descendido esta a Segunda división)<br />';
        $txt .= '<hr /><i>Promoción Permanencia o Ascenso en Primera</i><br /><br />';
        $txt .= '22/04/1962 - CD Málaga 3-0 Real Santander<br />';
        $txt .= '29/04/1962 - Real Santander 1-0 <b>CD Málaga</b><br />';
        $txt .= '29/04/1962 - RCD Español 1-0 Real Valladolid CF<br />';
        $txt .= '06/05/1962 - <b>Real Valladolid CF</b> 2-0 RCD Español<br />';
        $txt .= '<hr />Ascienden a Primera: <b>CD Málaga y Real Valladolid CF</b><br />';
        $txt .= 'Descienden a Segunda: <b>RCD Español y Real Santander </b><br />';

        break;

        case 883:
        $txt .= 'Campeón y ascenso a Primera: <b>Córdoba CF</b><br />';
        $txt .= 'Promoción de ascenso a Primera: <b>CD Málaga</b><br />';
        $txt .= 'Promoción de descenso a Tercera: <b>Albacete Balompié y CD San Fernando</b><br />';
        $txt .= 'Descenso a Tercera: <b>Atlético Ceuta y CD Villarrobledo</b><br />';
        $txt .= '<hr /><i>Promoción Permanencia o Ascenso en Primera</i><br /><br />';
        $txt .= '22/04/1962 - CD Málaga 3-0 Real Santander<br />';
        $txt .= '29/04/1962 - Real Santander 1-0 <b>CD Málaga</b><br />';
        $txt .= '29/04/1962 - RCD Español 1-0 Real Valladolid CF<br />';
        $txt .= '06/05/1962 - <b>Real Valladolid CF</b> 2-0 RCD Español<br />';
        $txt .= '<hr />Ascienden a Primera: <b>CD Málaga y Real Valladolid CF</b><br />';
        $txt .= 'Descienden a Segunda: <b>RCD Español y Real Santander </b><br />';

        break;

        case 884:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Lugo</b><br />';
        $txt .= 'Promoción a Segunda: <b>Club Ferrol</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Choco y Club Santiago</b><br />';
        $txt .= '<hr />El Santiago figura con dos puntos menos por alineación indebida en el partido Santiago - Gran Peña (incialmente 3-2) y con otros tres por presentarse con menos de ocho jugadores al partido Vivero - Santiago.<br />';
        break;

        case 890:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>UP Langreo</b><br />';
        $txt .= 'Promoción a Segunda: <b>Real Avilés</b><br />';
        $txt .= 'Descenso a Regional: <b>Club Recreativo Arnao, SD Lenense y Real Titánico</b><br />';
        $txt .= '<hr />Los partidos Lenense - Candás (inicialmente 2-1) y Siero - Lenense (1-1), se dan por perdidos a la Lenense por alineación indebida, descontándosele además 2 puntos de sanción por cada uno.<br />';
        break;

        case 891:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>RS Gimnástica</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Galdácano</b><br />';
        $txt .= 'Descenso a Regional: <b>SCD Durango y SD Izarra</b><br />';
        break;

        case 892:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>SD Éibar</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Logroñés</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Calahorra, Recreación de Logroño y CD Elgóibar</b><br />';
        break;

        case 893:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Numancia</b><br />';
        $txt .= 'Promoción a Segunda: <b>Juventud CF</b><br />';
        $txt .= 'Descenso a Regional: <b>Europa Delicias</b><br />';
        break;

        case 894:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Tarrasa</b><br />';
        $txt .= 'Promoción a Segunda: <b>Gerona CF</b><br />';
        $txt .= 'Descenso a Regional: <b>UD Olot, CD San Celoní y CD Moncada</b><br />';
        break;

        case 895:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Europa</b><br />';
        $txt .= 'Promoción a Segunda: <b>Club Condal</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Júpiter, UD Rapitense y CF Gavá</b><br />';
        $txt .= '<hr />El partido Balaguer - Gavá se da por perdido al Gavá por incomparecencia, descontándosele además tres puntos de su clasificación.<br />';
        break;

        case 896:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Constancia</b><br />';
        break;

        case 1030:
        $txt .= 'Campeón y Promoción a Segunda: <b>CD Menorca</b><br />';
        break;

        case 897:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CF Gandía</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Alcoyano</b><br />';
        $txt .= 'Descenso a Regional: <b>Pego CF y CD Portuarios</b><br />';
        $txt .= '<hr />El Onda se niega a jugar su partido como local contra el Alcoyano, por lo que se le da por perdido, descontándosele además tres puntos de su clasificación.<br />';
        break;

        case 885:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Eldense</b><br />';
        $txt .= 'Promoción a Segunda: <b>Imperial CF</b><br />';
        $txt .= 'Descenso a Regional: <b>Novelda CF y Callosa Deportiva</b><br />';
        break;

        case 886:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Algeciras CF</b><br />';
        $txt .= 'Promoción a Segunda: <b>Melilla CF</b><br />';

        break;

        case 887:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Sevilla Atlético Club</b><br />';
        $txt .= 'Promoción a Segunda: <b>Jerez CD</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Victoria</b><br />';

        break;

        case 888:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Béjar Industrial</b><br />';
        $txt .= 'Promoción a Segunda: <b>Europa Delicias</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Peñaranda, Atlético Zamora y Júpiter Leonés</b><br />';

        break;

        case 889:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CF Calvo Sotelo</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Manchego</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Don Benito, CD Guadalajara, CD Toledo y SR Boetticher y Navarro</b><br />';

        //temporada 1960-61 terminada

        break;

        case 1392:
        $txt .= 'Ascienden a Segunda: <b>Burgos CF, UD Cartagenera y CD Villarrobledo</b><br />';
        $txt .= 'Permanece en Segunda: <b>Real Jaén CF</b><br />';
        $txt .= 'Descienden a Tercera: <b>Real Gijón, Club Sestao y CD Castellón</b><br />';
        break;

        case 1391:
        $txt .= 'Ascienden a Segunda: <b>Sevilla FC Atlético, Albacete Balompié, CD Atlético Baleares y RC Recreativo</b><br />';
        break;

        case 901:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Club Ferrol</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Lugo</b><br />';
        $txt .= 'Descenso a Regional: <b>Órdenes SD y Flavia SD</b><br />';
        break;

        case 907:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>La Felguera SCP</b><br />';
        $txt .= 'Promoción a Segunda: <b>Real Avilés</b><br />';
        $txt .= 'Descenso a Regional: <b>Club Marino y CD Praviano</b><br />';
        break;

        case 908:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Rayo Cantabria</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Galdácano</b><br />';
        $txt .= 'Descenso a Regional: <b>SD Unión Club, CD Peña, SD Valmaseda y CD Naval</b><br />';
        break;

        case 909:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Deportivo Alavés</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Vitoria</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Izarra</b><hr />';
        $txt .= 'El partido Recreación - Vitoria, inicialmente 2-2, se da por perdido al Recreación por alineación indebida, descontándosele además 3 puntos de su clasificación.<br />';
        break;

        case 910:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>UD Amistad</b><br />';
        $txt .= 'Promoción a Segunda: <b>Arenas SD</b><br />';
        $txt .= 'Descenso a Regional: <b>UD Fraga, UD Jaca y CD Calatayud</b><br />';
        $txt .= 'El Mequinenza figura con tres puntos menos por retirarse del partido Juventud - Mequinenza.<hr />';
        $txt .= 'El partido Jaca - Tarazona (inicialmente 1-0) se da por perdido al Jaca por alineación indebida, quitándosele además dos puntos de su clasificación.<br />';
        break;

        case 911:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CF Badalona</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Manresa</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Adrianense y UD Vic</b><br />';
        break;

        case 912:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Gimnástico de Tarragona</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD L´Hospitalet</b><br />';
        $txt .= 'Descenso a Regional: <b>CF Amposta, CD La Cava y CF Samboyano</b><br />';
        break;

        case 913:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Atlético Baleares</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Constancia</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Cardessar y CF Sóller</b><br />';
        $txt .= 'El Murense se retiró de la competición, anulándose todos sus resultados anteriores.<br />';
        break;

        case 914:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Olímpico</b><br />';
        $txt .= 'Promoción a Segunda: <b>Onteniente CF</b><br />';
        $txt .= 'Descenso a Regional: <b>Villarreal CF, Catarroja CF y UD Alginet</b><br />';
        break;

        case 902:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Albacete Balompié</b><br />';
        $txt .= 'Promoción a Segunda: <b>UD Cartagenera</b><hr />';
        $txt .= 'El partido Callosa - Almoradí, inicialmente 1-1, se da por perdido al Callosa por alineación indebida, descontándosele además dos puntos de la clasificación.<br />';
        break;

        case 903:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Sevilla Atlético Club</b><br />';
        $txt .= 'Promoción a Segunda: <b>Melilla CF</b><br />';
        $txt .= 'Descenso a Regional: <b>Baeza Deportiva y Écija CF</b><br />';
        break;

        case 904:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>RC Recreativo</b><br />';
        $txt .= 'Promoción a Segunda: <b>Jerez CD</b><br />';
        $txt .= 'Descenso a Regional: <b>Atlético Sanluqueño</b><br />';
        break;

        case 905:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Cacereño</b><br />';
        $txt .= 'Promoción a Segunda: <b>Burgos CF</b><br />';
        $txt .= 'Descenso a Regional: <b>CD San Pedro</b><br />';
        break;

        case 906:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CF Calvo Sotelo</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Villarrobledo</b><br />';
        $txt .= 'Descenso a Regional: <b>CF Manzanares, SD Emeritense, UD San Lorenzo y Manufacturas Metálicas</b><br />';
        break;

        case 900:
        $txt .= 'Campeón y ascenso a Primera: <b>CD Tenerife</b><br />';
        $txt .= 'Promoción de ascenso a Primera: <b>Atlético Ceuta</b><br />';
        $txt .= 'Promoción de descenso a Tercera: <b>CD Castellón y Real Jaén CF</b><br />';
        $txt .= 'Descenso a Tercera: <b>CF Extremadura y Rayo Vallecano</b><br />';
        $txt .= '<hr /><i>Promoción Permanencia o Ascenso en Primera</i><br /><br />';
        $txt .= '04/06/1961 - Real Oviedo 1-0 RC Celta<br />';
        $txt .= '04/06/1961 - Atlético Ceuta 1-0 Elche CF<br /><br />';
        $txt .= '11/06/1961 - RC Celta 2-2 <b>Real Oviedo</b><br />';
        $txt .= '11/06/1961 - <b>Elche CF</b> 4-0 Atlético Ceuta<br />';
        $txt .= '<br />Permanecen en Primera: <b>Real Oviedo y Elche CF</b><br />';
        break;

        case 899:
        $txt .= 'Campeón y ascenso a Primera: <b>Atlético Osasuna</b><br />';
        $txt .= 'Promoción de ascenso a Primera: <b>RC Celta</b><br />';
        $txt .= 'Promoción de descenso a Tercera: <b>Real Gijón y Club Sestao</b><br />';
        $txt .= 'Descenso a Tercera: <b>CD Baracaldo Altos Hornos y CD Tarrasa</b><br />';
        $txt .= '<hr /><i>Promoción Permanencia o Ascenso en Primera</i><br /><br />';
        $txt .= '04/06/1961 - Real Oviedo 1-0 RC Celta<br />';
        $txt .= '04/06/1961 - Atlético Ceuta 1-0 Elche CF<br /><br />';
        $txt .= '11/06/1961 - RC Celta 2-2 <b>Real Oviedo</b><br />';
        $txt .= '11/06/1961 - <b>Elche CF</b> 4-0 Atlético Ceuta<br />';
        $txt .= '<br />Permanecen en Primera: <b>Real Oviedo y Elche CF</b><br />';

        break;

        case 898:
        $txt .= 'Campeón y Copa de Europa: <b>Real Madrid</b><br />';
        $txt .= 'Recopa de Europa: <b>Atlético de Madrid</b><br />';
        $txt .= 'Copa de Ferias: <b>CF Barcelona, Valencia CF y RCD Español</b><br />';
        $txt .= 'Promoción de descenso a Segunda: <b>Real Oviedo y Elche CF</b><br />';
        $txt .= 'Descenso a Segunda: <b>Real Valladolid y Granada CF</b><br />';
        break;

        case 1390:
        $txt .= 'Ascienden a Segunda: <b>UD Salamanca y CD Castellón</b><br />';
        $txt .= 'Permanecen en Segunda: <b>Club Sestao y Cádiz CF</b><br />';
        $txt .= 'Descienden a Tercera: <b>Deportivo Alavés y RC Recreativo</b><br />';
        break;

        case 1389:
        $txt .= 'Ascienden a Segunda: <b>Pontevedra CF, San Sebastián CF, Hércules CF y CD Málaga</b><br />';
        break;

        case 923:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Manchego</b><br />';
        $txt .= 'Promoción a Segunda: <b>CF Calvo Sotelo </b><br />';
        $txt .= 'Descenso a Regional: <b>RCD Carabanchel y CD Leganés</b><br />';
        break;

        case 922:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Burgos CF</b><br />';
        $txt .= 'Promoción a Segunda: <b>UD Salamanca</b><br />';
        $txt .= 'Descenso a Regional: <b>Júpiter Leonés</b><br />';
        $txt .= 'Antes de iniciarse la temporada siguiente, se fusionaron el At. Palencia y el Castilla, recién ascendido a Tercera. El Júpiter Leonés, inicialmente descendido, fue repescado para ocupar la plaza que quedó vacante.<br />';
        break;

        case 921:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Jerez CD</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Puerto</b><br />';
        $txt .= 'Descenso a Regional: <b>CA Morón</b><br />';

        break;

        case 920:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Málaga</b><br />';
        $txt .= 'Promoción a Segunda: <b>Algeciras CF</b><br />';
        $txt .= 'Descenso a Regional: <b>Guadix CF, CD Pozoblanco y Puente Genil CF </b><br />';
        break;

        case 919:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Hércules CF</b><br />';
        $txt .= 'Promoción a Segunda: <b>Crevillente Industrial</b><br />';
        $txt .= 'Descenso a Regional: <b>SD Villajoyosa</b><br />';
        break;

        case 931:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Olímpico</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Castellón</b><br />';
        $txt .= 'Descenso a Regional: <b>UD Carcagente </b><br />';
        break;

        case 930:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Manacor</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Atlético Baleares</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Binissalem</b><br />';
        break;

        case 929:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>UD Figueras</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Fabra y Coats</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Sallent y CG Mercantil</b><br />';
        break;

        case 928:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD L´Hospitalet</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Manresa </b><br />';
        $txt .= 'Descenso a Regional: <b>CD Tortosa y UD Pueblo Seco</b><br />';
        break;

        case 927:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>UD Amistad</b><br />';
        $txt .= 'Promoción a Segunda: <b>Arenas SD</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Numancia  y CD Binéfar</b><br />';
        break;

        case 926:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>San Sebastián CF</b><br />';
        $txt .= 'Promoción a Segunda: <b>Real Unión Club </b><br />';
        $txt .= 'Descenso a Regional: <b>CD Tudelano, CD Anaitasuna y CD Azkoyen</b><br />';
        break;

        case 925:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Arenas Club </b><br />';
        $txt .= 'Promoción a Segunda: <b>RS Gimnástica </b><br />';
        $txt .= 'Descenso a Regional: <b>Barreda Balompié y Apurtuarte Club</b><br />';
        $txt .= '<hr />El partido Peña - Apurtuarte Club (inicialmente 1-2), se da por perdido al Apurtuarte Club por alineación indebida, descontándosele además dos puntos de su clasificación.<br />';
        break;

        case 924:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Caudal Deportivo</b><br />';
        $txt .= 'Promoción a Segunda: <b>La Felguera SCP </b><br />';
        $txt .= 'Descenso a Regional: <b>Club Hispano y CD Carbayín</b><br />';
        break;

        case 918:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Pontevedra CF</b><br />';
        $txt .= 'Promoción a Segunda: <b>Arsenal CF</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Juvenil Coruña y CD Cambados</b><br />';
        $txt .= '<hr />El partido Arosa - Zeltia (inicialmente 2-0) se da por perdido al Arosa por alineación indebida de un jugador, descontándosele además dos puntos de su clasificación.<br />';
        break;

        case 917:
        $txt .= 'Campeón y ascenso a Primera: <b>RCD Mallorca</b><br />';
        $txt .= 'Promoción de ascenso a Primera: <b>Córdoba CF</b><br />';
        $txt .= 'Promoción de descenso a Tercera: <b>RC Recreativo y Cádiz CF</b><br />';
        $txt .= 'Descenso a Tercera: <b>CA Almería y CD Badajoz</b><br />';
        $txt .= '<hr /><i>Promoción Permanencia o Ascenso en Primera</i><br /><br />';
        $txt .= '22/05/1960 - RC Celta 2-2 Real Valladolid<br />';
        $txt .= '29/05/1960 - Real Sociedad de Fútbol 2-1 Córdoba CF<br /><br />';
        $txt .= '29/05/1960 - <b>Real Valladolid</b> 5-0 RC Celta<br />';
        $txt .= '05/06/1960 - Córdoba CF 1-0 Real Sociedad de Fútbol<br />';
        $txt .= '07/06/1960 - <b>Real Sociedad de Fútbol</b> 1-0 Córdoba CF (Jugado en Madrid)<br />';
        $txt .= '<br />Permanecen en Primera: <b>Real Valladolid y Real Sociedad de Fútbol</b><br />';
        break;

        case 916:
        $txt .= 'Campeón y ascenso a Primera: <b>Real Santander</b><br />';
        $txt .= 'Promoción de ascenso a Primera: <b>RC Celta</b><br />';
        $txt .= 'Promoción de descenso a Tercera: <b>Deportivo Alavés y Club Sestao</b><br />';
        $txt .= 'Descenso a Tercera: <b>Real Avilés y Club Ferrol</b><br />';
        $txt .= '<hr /><i>Promoción Permanencia o Ascenso en Primera</i><br /><br />';
        $txt .= '22/05/1960 - RC Celta 2-2 Real Valladolid<br />';
        $txt .= '29/05/1960 - Real Sociedad de Fútbol 2-1 Córdoba CF<br /><br />';
        $txt .= '29/05/1960 - <b>Real Valladolid</b> 5-0 RC Celta<br />';
        $txt .= '05/06/1960 - Córdoba CF 1-0 Real Sociedad de Fútbol<br />';
        $txt .= '07/06/1960 - <b>Real Sociedad de Fútbol</b> 1-0 Córdoba CF (Jugado en Madrid)<br />';
        $txt .= '<br />Permanecen en Primera: <b>Real Valladolid y Real Sociedad de Fútbol</b><br />';
        break;

        case 915:
        $txt = 'Campeón: <b>CF Barcelona</b><br />';
        $txt .= 'Copa de Europa: <b>CF Barcelona y Real Madrid CF</b><br />';
        $txt .= 'Promoción de descenso a Segunda: <b>Real Valladolid y Real Sociedad de Fútbol</b><br />';
        $txt .= 'Descenso a Segunda: <b>Club Atlético Osasuna y UD Las Palmas</b><br />';
        $txt .= '<hr />El Real Madrid se clasifica para jugar la próxima edición de la Copa de Europa por ser el campeón vigente.<br />';
        break;

        case 1388:
        $txt .= 'Permanecen en Segunda: <b>Deportivo Alavés, Rayo Vallecano  y CD Badajoz</b><br />';
        $txt .= 'Asciende a Segunda: <b>CD Mestalla</b><br />';
        $txt .= 'Desciende a Tercera: <b>Hércules CF</b><br />';
        break;

        case 1387:
        $txt .= 'Ascienden a Segunda: <b>CD Orense, CyD Leonesa, RCD Mallorca y RC Recreativo</b><br />';
        break;

        case 940:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CF Calvo Sotelo </b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Villarrobledo</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Parque Móvil y Moralo CF</b><br />';
        break;

        case 939:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CyD Leonesa</b><br />';
        $txt .= 'Promoción a Segunda: <b>UD Salamanca</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Fasa</b><br />';
        break;

        case 938:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>RC Recreativo</b><br />';
        $txt .= 'Promoción a Segunda: <b>Jerez CD </b><br />';
        $txt .= 'Descenso a Regional: <b>Coria CF</b><br />';
        break;

        case 937:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Adra CF</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Linares</b><br />';
        $txt .= 'Descenso a Regional: <b>Úbeda CF y UD Lucentina</b><br />';
        break;

        case 936:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Albacete Balompié</b><br />';
        $txt .= 'Promoción a Segunda: <b>Alicante CF</b><br />';
        $txt .= 'Descenso a Regional: <b>Hellín Deportivo, CD Tháder y UD Elda</b><br />';
        break;

        case 948:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Olímpico</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Mestalla</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Burriana, CD Acero y Burjassot CF</b><br />';
        break;

        case 947:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>RCD Mallorca</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Constancia</b><br />';
        break;

        case 946:
        $txt = 'Campeón: <b>CA Iberia</b><br />';
        $txt .= 'Promoción a Segunda: <b>CA Iberia y CF Amposta</b><br />';
        $txt .= 'Descenso a Regional: <b>Guíxols CF, CD Bañolas, UD Atlético Gramanet, CD Adrianense, CD San Cugat y UA Horta</b><br />';
        $txt .= 'El Atlético Pueblo Nuevo se retiró de la competición, anulándose los resultados de los partidos que había jugado.<br />';
        $txt .= '<hr />Clasificación fase de Promoción a Segunda Grupos VI/VII<br />';
        $txt .= 'A partido único - 25-04-1959<br />';
        $txt .= 'CA Iberia  1 - 2  <b>UD Olot</b> (En Les Corts) <br />';
        $txt .= '<b>CF Amposta</b>  3 - 2  CD L´Hospitalet (En Les Corts)<br />';
        $txt .= 'Clasificado para la fase de Promoción a Segunda: <b>UD Olot y CF Amposta</b> <br />';
        break;

        case 945:
        $txt = 'Campeón: <b>UD Sans</b><br />';
        $txt .= 'Fase de ascenso a Segunda: <b>UD Sans y Gimnástico de Tarragona</b><br />';
        $txt .= 'Promoción a Segunda: <b>UD Olot y CD L´Hospitalet</b><br />';
        $txt .= '<hr />Clasificación fase de Promoción a Segunda Grupos VI/VII<br />';
        $txt .= 'A partido único - 25-04-1959<br />';
        $txt .= 'CA Iberia  1 - 2  <b>UD Olot</b> (En Les Corts) <br />';
        $txt .= '<b>CF Amposta</b>  3 - 2  CD L´Hospitalet (En Les Corts)<br />';
        $txt .= 'Clasificado para la fase de Promoción a Segunda: <b>UD Olot y CF Amposta</b> <br />';
        break;

        case 944:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>UD Amistad</b><br />';
        $txt .= 'Promoción a Segunda: <b>Arenas SD</b><br />';
        $txt .= 'Descenso a Regional: <b>Utebo CF y CD Tauste</b><br />';
        break;

        case 943:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Logroñés</b><br />';
        $txt .= 'Promoción a Segunda: <b>SD Eibar</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Hernani, Recreación de Logroño y CD Oberena</b><br />';
        break;

        case 942:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Guecho </b><br />';
        $txt .= 'Promoción a Segunda: <b>Rayo Cantabria</b><br />';
        $txt .= 'Descenso a Regional: <b>SD Valmaseda</b><br />';
        break;

        case 941:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>La Felguera SCP </b><br />';
        $txt .= 'Promoción a Segunda: <b>Caudal Deportivo</b><br />';
        $txt .= 'Descenso a Regional: <b>Club Condal</b><br />';
        break;

        case 935:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Orense</b><br />';
        $txt .= 'Promoción a Segunda: <b>Club Turista</b><br />';
        $txt .= 'Descenso a Regional: <b>SD Juvenil Puenteareas</b><br />';
        break;

        case 934:
        $txt .= 'Campeón y ascenso a Primera: <b>Elche CF</b><br />';
        $txt .= 'Promoción de ascenso a Primera: <b>Levante UD</b><br />';
        $txt .= 'Promoción de descenso a Tercera: <b>Hércules CF y CD Badajoz</b><br />';
        $txt .= 'Descenso a Tercera: <b>CD Málaga y CD Eldense</b><br />';
        $txt .= '<hr /><i>Promoción Permanencia o Ascenso en Primera</i><br /><br />';
        $txt .= '10/05/1959 - Granada CD 5-0 Centro Deportes Sabadell<br />';
        $txt .= '10/05/1959 - Levante UD 1-2 UD Las Palmas<br /><br />';
        $txt .= '17/05/1959 - Centro Deportes Sabadell 1-1 <b>Granada</b><br />';
        $txt .= '17/05/1959 - <b>UD Las Palmas</b> 1-1 Levante UD<br />';
        $txt .= '<br />Permanecen en Primera: Granada CF y UD Las Palmas<br />';
        break;

        case 933:
        $txt .= 'Campeón y ascenso a Primera: <b>Real Valladolid CF</b><br />';
        $txt .= 'Promoción de ascenso a Primera: <b>Centro Deportes Sabadell</b><br />';
        $txt .= 'Promoción de descenso a Tercera: <b>Deportivo Alavés y Rayo Vallecano</b><br />';
        $txt .= 'Descenso a Tercera: <b>Gerona CF y Real Unión Club </b><br />';
        $txt .= '<hr /><i>Promoción Permanencia o Ascenso en Primera</i><br /><br />';
        $txt .= '10/05/1959 - Granada CD 5-0 Centro Deportes Sabadell<br />';
        $txt .= '10/05/1959 - Levante UD 1-2 UD Las Palmas<br /><br />';
        $txt .= '17/05/1959 - Centro Deportes Sabadell 1-1 <b>Granada</b><br />';
        $txt .= '17/05/1959 - <b>UD Las Palmas</b> 1-1 Levante UD<br />';
        $txt .= '<br />Permanecen en Primera: Granada CF y UD Las Palmas<br />';
        break;

        case 932:
        $txt = 'Campeón: <b>CF Barcelona</b><br />';
        $txt .= 'Copa de Europa: <b>CF Barcelona y Real Madrid CF </b><br />';
        $txt .= 'Promoción de Descenso a Segunda: <b>Granada CF y UD Las Palmas</b><br />';
        $txt .= 'Descenso a Segunda: <b>Real Gijón y RC Celta</b><hr />';
        $txt .= 'El Real Madrid se clasifica para jugar la próxima edición de la Copa de Europa por ser el vigente campeón.<br />';
        break;

        case 1386:
        $txt .= 'Ascienden a Segunda: <b>CD Baracaldo, Real Unión, Elche CF  y CA Almería</b><br />';
        break;

        case 1385:
        $txt .= 'Permanecen en Segunda: <b>RC Deportivo, CD Tarrasa, Atlético Ceuta y CD Málaga</b><br />';
        break;

        case 957:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Getafe Deportivo</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Manchego</b><br />';
        $txt .= 'Descenso a Regional: <b> Manzanares CF, Agromán CF, SD Gimnástica Segoviana, UB Conquense, Real Ávila CF  y CD Femsa.</b><br />';
        break;

        case 956:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>SD Ponferradina</b><br />';
        $txt .= 'Promoción a Segunda: <b>Burgos CF</b><br />';
        $txt .= 'Descenso a Regional: <b> CD San Pedro, CD Benavente, Ciudad Rodrigo, Juvenil Zamora, SD Unión Castilla  y Júpiter Atlético.</b><br />';
        break;

        case 955:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Jerez Industrial</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Utrera</b><br />';
        $txt .= 'Descenso a Regional: <b>UD Gaditana, Lora CF, Hércules CF (Ceuta), SD Los Barrios  y Arcos CF.</b><br />';
        $txt .= '<hr />Los Barrios y Arcos figuran con tres puntos menos por sanción federativa, por incomparecencia a los partidos Imperio Riffien - Los Barrios y Ayamonte - Arcos.<br />';
        break;

        case 954:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CA Almería</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Iliturgi</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Pozoblanco, Atlético Bastetano, Villa del Río CF y Peñarroya Pueblonuevo.</b><br />';
        break;

        case 953:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Elche CF</b><br />';
        $txt .= 'Promoción a Segunda: <b>UD Cartagenera</b><br />';
        $txt .= 'Descenso a Regional: <b>Deportiva Minera y SD Almansa.</b><br />';
        break;

        case 965:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Mestalla </b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Castellón</b><br />';
        $txt .= 'Descenso a Regional: <b>PD Soriano, CD Sagunto y UD Castellonense.</b><br />';
        break;

        case 964:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>RCD Mallorca</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Atlético Baleares</b><br />';
        $txt .= 'Descenso a Regional: <b>UD Poblense y CD Binissalem </b><br />';
        break;

        case 963:
        $txt = 'Campeón: <b>UD Pueblo Seco</b><br />';
        $txt .= 'Promoción a Segunda: <b>UD Pueblo Seco y CD Moncada</b><br />';
        $txt .= 'Descenso a Regional: <b>Atlético Pueblo Nuevo, UD Seo de Urgel, AD Balaguer, CF Calella, CF Vilafranca, CD Júpiter, CD Talleres Agut, CF Igualada, CF Reus Deportivo, CD San Celoni y CF Mollet UD</b><br />';
        $txt .= '<hr />Clasificación fase de Promoción a Segunda Grupos VI/VII<br />';
        $txt .= 'A partido único - 15-05-1958<br />';
        $txt .= '<b>UD Sans</b>  5 - 3  CD Moncada (En Sarriá)<br />';
        $txt .= 'CD Europa  1 - 4  <b>UD Pueblo Seco</b> (En Sarriá) <br />';
        $txt .= 'Clasificado para la fase de Promoción a Segunda: <b>UD Sans y UD Pueblo Seco</b> <br />';
        break;

        case 962:
        $txt = 'Campeón: <b>UD San Andrés </b><br />';
        $txt .= 'Fase de ascenso a Segunda: <b>UD San Andrés y UD Lérida</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Europa y UD Sans</b><br />';
        $txt .= '<hr />El CD La Cava es sancionado con la pérdida de todos sus puntos, por incomparecencia a sus últimos partidos.<br />';
        $txt .= '<hr />Clasificación fase de Promoción a Segunda Grupos VI/VII<br />';
        $txt .= 'A partido único - 15-05-1958<br />';
        $txt .= '<b>UD Sans</b>  5 - 3  CD Moncada (En Sarriá)<br />';
        $txt .= 'CD Europa  1 - 4  <b>UD Pueblo Seco</b> (En Sarriá) <br />';
        $txt .= 'Clasificado para la fase de Promoción a Segunda: <b>UD Olot y CD Europa</b> <br />';
        break;

        case 961:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>SD Ejea</b><br />';
        $txt .= 'Promoción a Segunda: <b>UD Amistad </b><br />';
        $txt .= 'Descenso a Regional: <b>AD Sabiñánigo, CD Caspe y UD Jaca</b><br />';
        $txt .= '<hr />El Cariñena se retiró de la competición después de la jornada 15, anulándose todos sus resultados anteriores.<br />';
        $txt .= 'El Binéfar figura con tres puntos de sanción por incomparecencia al partido CD Binéfar - UD Amistad<br />';
        break;

        case 960:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Real Unión Club </b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Mirandés </b><br />';
        $txt .= 'Descenso a Regional: <b>CD Calahorra, CD Touring, CD Vitoria y CD Izarra</b><br />';
        $txt .= '<hr />El Izarra fue sancionado con la pérdida de tres puntos por incomparecencia a la continuación del partido Izarra - Hernani, inicialmente 2-1.<br />';
        break;

        case 959:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Baracaldo Altos Hornos</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Galdacano</b><br />';
        $txt .= 'Descenso a Regional: <b>Club Portugalete, CD Villosa, CD Padura y SD Begoña</b><br />';
        break;

        case 1384:
        $txt .= 'Aunque esta fase se realizó para decidir que equipos descendián, finalmente no descendió ningún equipo, por ampliarse el grupo a 16 equipos.<br />';
        break;

        case 1383:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>UD Entrego</b><br />';
        $txt .= 'Promoción a Segunda: <b>Club Langreano</b><br />';
        break;

        case 958:
        $txt .= 'Fase de ascenso: <b>UD Entrego, Club Langreano, Luarca CF, Real Juvencia, Club Siero y Club Calzada.</b><br />';
        $txt .= 'Fase de descenso: <b>CD San Martín, CD Turón, Real Titánico, Club Condal, CD Carbayín y Club Marino.</b><br />';
        break;

        case 952:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Club Turista</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Orense</b><br />';
        $txt .= 'Descenso a Regional: <b>Club Lemos y Club Arenal</b><br />';
        $txt .= '<hr />El partido Arsenal CF - Gran Peña (inicialmente 1-1) se dio por perdido al Arsenal CF por alineación indebida, descontándosele además dos puntos por sanción.<br />';
        break;

        case 951:
        $txt .= 'Campeón y ascenso a Primera: <b>Real Betis Balompié</b><br />';
        $txt .= 'Promoción de descenso a Tercera: <b>Atlético Ceuta  y CD Málaga</b><br />';
        $txt .= 'Descenso a Tercera: <b>RC Recreativo, Jerez CD, Alicante CF y CD Alcoyano</b><br />';
        break;

        case 950:
        $txt .= 'Campeón y ascenso a Primera: <b>Real Oviedo</b><br />';
        $txt .= 'Promoción de descenso a Tercera: <b>RC Deportivo y CD Tarrasa</b><br />';
        $txt .= 'Descenso a Tercera: <b>Caudal Deportivo, CyD Leonesa, SD Eibar y La Felguera SCP </b><br />';
        break;

        case 949:
        $txt = 'Campeón: <b>Real Madrid CF</b><br />';
        $txt .= 'Copa de Europa: <b>Real Madrid CF y Atlético de Madrid</b><br />';
        $txt .= 'Descenso a Segunda: <b>Real Valladolid y Real Jaén</b><br />';
        $txt .= '<hr />El Real Madrid se clasifica para jugar la próxima edición de la Copa de Europa por resultar campeón de la actual, por lo que se clasifica también el Atlético de Madrid, subcampeón de Liga.<br />';
        break;

        case 1382:
        $txt .= 'Ascenso a Segunda: <b>AD Plus Ultra, CD Alcoyano, CD Basconia y RC Recreativo</b>';
        break;

        case 1381:
        $txt .= 'Permanencia en Segunda: <b>La Felguera SCP, Club Ferrol, Alicante CF y CD Eldense</b>';
        break;

        case 1029:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Melilla CF</b><br />';
        $txt .= 'Promoción a Segunda: <b>Trafalgar CF</b><br />';
        break;

        case 975:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>AD Plus Ultra</b><br />';
        $txt .= 'Promoción a Segunda: <b>CF Calvo Sotelo</b><br />';
        $txt .= 'Descenso a Regional: <b>UD Girod y CD Cuatro Caminos</b><br />';
        $txt .= 'El Aranjuez CF figura con dos puntos menos y el CD Toledo con tres, por sanción federativa.<br />';
        break;

        case 974:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>UD Salamanca</b><br />';
        $txt .= 'Promoción a Segunda: <b>Atlético Zamora</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Salmantino y CAA Salesianos</b><br />';
        break;

        case 973:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>SD Emeritense </b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Cacereño</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Villanovense y Metalúrgica Extremeña</b><br />';
        $txt .= 'El UD Azuaga se retiró de la competición a falta de ocho partidos, siendo anulados todos sus resultados anteriores.<br />';
        $txt .= 'CD Plasencia y el CD Villanovense figuran con tres puntos menos por sanción federativa.<br />';
        break;

        case 972:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>RC Recreativo</b><br />';
        $txt .= 'Promoción a Segunda: <b>Coria CF </b><br />';
        $txt .= 'Descenso a Regional: <b>Riotinto Balompié</b><br />';
        $txt .= 'El Chiclana CF se retiró de la competición a falta de trece partidos, siendo anulados todos sus resultados anteriores.<br />';
        break;

        case 971:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Linares</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Iliturgi</b><br />';
        $txt .= 'El Motril CF se retiró de la competición a falta de siete partidos, siendo anulados todos sus resultados anteriores.<br />';
        $txt .= 'Guadix CF y Martos Atlético figuran con dos puntos menos por sanción federativa.<br />';
        break;

        case 970:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Elche CF</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Eldense</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Aspense</b><br />';
        break;

        case 983:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Alcoyano</b><br />';
        $txt .= 'Promoción a Segunda: <b>CF Gandía</b><br />';
        $txt .= 'Descenso a Regional: <b>UD Manises, CD Utiel y UD Carlet</b><br />';

        break;

        case 982:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>RCD Mallorca</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Atlético Baleares</b><br />';

        break;

        case 981:
        $txt = 'Campeón: <b>UD Olot</b><br />';
        $txt .= 'Fase de promoción a Segunda: <b>UD Olot y CG Mercantil</b><br />';
        $txt .= 'Descenso a Regional: <b>CF Gavà, JD Molins de Rey, UD Cataluña y CD Santa Eulalia</b><br />';
        $txt .= '<hr />Clasificación fase de Promoción a Segunda Grupos VI/VII<br />';
        $txt .= 'A partido único - 25-05-1957<br />';
        $txt .= 'Manresa  0 - 2  <b>UD Olot</b> (En Les Corts) <br />';
        $txt .= '<b>CD Europa</b>  8 - 3  CG Mercantil (En Les Corts)<br />';
        $txt .= 'Clasificado para la fase de Promoción a Segunda: <b>UD Olot y CD Europa</b> <br />';

        break;

        case 980:
        $txt = 'Campeón: <b>UD Sans</b><br />';
        $txt .= 'Promoción a Segunda: <b>UD Sans y CF Badalona</b><br />';
        $txt .= 'Clasificación fase de promoción a Segunda: <b>CD Manresa y CD Europa</b><br />';
        $txt .= '<hr />Clasificación fase de Promoción a Segunda Grupos VI/VII<br />';
        $txt .= 'A partido único - 25-05-1957<br />';
        $txt .= 'Manresa  0 - 2  <b>UD Olot</b> (En Les Corts) <br />';
        $txt .= '<b>CD Europa</b>  8 - 3  CG Mercantil (En Les Corts)<br />';
        $txt .= 'Clasificado para la fase de Promoción a Segunda: <b>UD Olot y CD Europa</b> <br />';

        break;

        case 979:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>Arenas SD</b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Binéfar  </b><br />';
        $txt .= 'Descenso a Regional: <b>CD Cariñena</b><br />';
        break;

        case 978:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Elgóibar </b><br />';
        $txt .= 'Promoción a Segunda: <b>CD Azkoyen </b><br />';
        $txt .= 'Descenso a Regional: <b>JD Mondragón, Peña Sport FC,Atlético Castejón y CD Alesves</b><br />';
        break;

        case 977:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Basconia</b><br />';
        $txt .= 'Promoción a Segunda: <b>RS Gimnástica </b><br />';
        $txt .= 'Descenso a Regional: <b>Club Bermeo, CD Laredo y Santoña CF</b><br />';
        break;

        case 976:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>UD Entrego</b><br />';
        $txt .= 'Promoción a Segunda: <b>Club Langreano</b><hr />';
        $txt .= 'Este torneo se jugó a dos idas y dos vueltas.<br />';
        break;

        case 969:
        $txt .= 'Campeón y Fase de ascenso a Segunda: <b>CD Orense</b><br />';
        $txt .= 'Promoción a Segunda: <b>Club Turista</b><br />';
        $txt .= 'Descenso a Regional: <b>Pontevedra CF, Brigantium CF, Marín CF y Ribadeo FC</b><br />';
        break;

        case 968:
        $txt .= 'Campeón y ascenso a Primera: <b>Granada CF</b><br />';
        $txt .= 'Promoción de descenso a Tercera: <b>Alicante CF y CD Eldense</b><br />';
        $txt .= 'Descenso a Tercera: <b>CD Mestalla, España Algeciras, Puente Genil CF y CD Castellón</b><br />';
        break;

        case 967:
        $txt .= 'Campeón y ascenso a Primera: <b>Real Gijón</b><br />';
        $txt .= 'Promoción de descenso a Tercera: <b>La Felguera SCP y Club Ferrol</b><br />';
        $txt .= 'Descenso a Tercera: <b>CD Logroñés, Baracaldo CF, Burgos CF y UD Lérida</b><br />';
        break;

        case 966:
        $txt = 'Campeón: <b>Real Madrid CF</b><br />';
        $txt .= 'Copa de Europa: <b>Real Madrid CF y Sevilla CF</b><br />';
        $txt .= 'Copa de Ferias: <b>CF Barcelona</b><br />';
        $txt .= 'Descenso a Segunda: <b>RC Deportivo y CD Condal</b><br />';
        $txt .= '<hr />El Real Madrid se clasifica para jugar la próxima edición de la Copa de Europa por resultar campeón de la actual, por lo que se clasifica también el Sevilla, subcampeón de Liga.<br />';
        break;

        case 1380:
        $txt .= 'Juegan esta fase de clasificación a Segunda los 4 segundos clasificados en la fase de ascenso a Segunda y los 16 vencedores de las permanencias de Tercera División. Los 4 segundos de la fase de Ascenso entran directamente en la tercera eliminatoria.<hr />';
        $txt .= 'Ascienden a Segunda: <b>Real Avilés, Rayo Vallecano, Alicante CF y CD Pontanés</b><br />';
        break;

        case 1379:
        $txt .= 'Juegan esta promoción de ascenso y permanencia los 4 terceros clasificados en la fase de ascenso a Segunda y los clasificados en las posiciones 15 y 16 de cada grupo de Segunda División<hr />';
        $txt .= 'Asciende a Segunda: <b>CD Eldense</b><br />';
        $txt .= 'Permanecen en Segunda: <b>Club Sestao, CD Logroñes y CD Logroñes</b><br />';
        $txt .= 'Desciende a Tercera: <b>Plus Ultra CF</b><br />';
        break;

        case 1375:
        $txt .= 'Fase de clasificación a Segunda : <b>Agromán CF</b><br />';
        $txt .= 'Ascenso a Tercera : <b>CD Femsa</b><hr />';
        break;

        case 1374:
        $txt .= 'Fase de clasificación a Segunda : <b>Atlético Zamora</b><br />';
        $txt .= 'Ascenso a Tercera : <b>CD Juventud y CD Astorga</b><hr />';
        $txt .= 'El partido Gim. Segoviana - Europa Delicias, inicialmente 5-2, se dio por perdido al Gim. Segoviana por alineación indebida, descontándosele dos puntos de la clasificación.<br />';
        break;

        case 1373:
        $txt .= 'Fase de clasificación a Segunda : <b>SD Emeritense</b><br />';
        $txt .= 'Ascenso a Tercera : <b>CD Alcázar, Moralo CF y Manzanares CF</b><hr />';
        $txt .= 'El partido Moralo - Manchego (inicialmente 2-2), se dió por perdido al Moralo por alineación indebida, descontándoseles además dos puntos de su clasificación.<br />';
        $txt .= 'El partido Villanovense - Alcázar (inicialmente 8-1) se dió por perdido al Villanovense por alineación indebida, descontándoseles además dos puntos de su clasificación.<br />';
        break;

        case 1372:
        $txt .= 'El Villa Sanjurjo se retiró de este grupo una vez iniciada la competición.<br />';
        $txt .= 'El <b>Villa Nador</b> se enfrentó al África Ceutí, campeón del Grupo XIII Occidental, para determinar qué equipo participaba en la fase de clasificación a Segunda.<hr />';
        $txt .= '<i>Permanencia en Tercera Grupo XIII Final</i><br />';
        $txt .= '06-05-1956 : Villa Nador  1-1 África Ceutí<br />';
        $txt .= '13-05-1956 : <b>África Ceutí</b> 3-1 Villa Nador <br />';
        break;

        case 1371:
        $txt .= 'Ascenso a Tercera: <b>Imperio Riffien</b><hr />';
        $txt .= 'El Larache, Español Tetuán, Unión Tangerina y Alcazaba, pese a lograr la permanencia, no jugarían en Tercera la temporada siguiente, al concederse la independencia al protectorado de Marruecos.<hr />';
        $txt .= 'El <b>África Ceutí</b> se enfrentó al Villa Nador, campeón del Grupo XIII Oriental, para determinar qué equipo participaba en la fase de clasificación a Segunda.<hr />';
        $txt .= '<i>Permanencia en Tercera Grupo XIII Final</i><br />';
        $txt .= '06-05-1956 : Villa Nador  1-1 África Ceutí<br />';
        $txt .= '13-05-1956 : <b>África Ceutí</b> 3-1 Villa Nador <br />';
        break;

        case 1370:
        $txt .= 'Fase de clasificación a Segunda : <b>CD Pontanés </b><br />';
        break;

        case 1369:
        $txt .= 'Fase de clasificación a Segunda : <b>Recreativo de Huelva</b><br />';
        $txt .= 'Ascenso a Tercera : <b>Puerto Real CF, SD Marchena, Ayamonte CF y Olímpica Valverdeña</b><br />';
        break;

        case 1368:
        $txt .= 'Fase de clasificación a Segunda : <b>Elche CF</b><br />';
        $txt .= 'Ascenso a Tercera : <b>CD Eldense</b><br />';
        break;

        case 1367:
        $txt .= 'Fase de clasificación a Segunda : <b>CF Gandía </b><br />';
        $txt .= 'Ascenso a Tercera : <b>Villarreal CF y CD Olímpico</b><br />';
        break;

        case 1366:
        $txt .= 'Fase de clasificación a Segunda : <b>RCD Mallorca</b><br />';
        $txt .= 'Ascenso a Tercera : <b>CF Soller, CD Murense y CD Felanitx</b><br />';
        break;

        case 1365:
        $txt .= 'Fase de clasificación a Segunda : <b>CF Badalona</b><br />';
        $txt .= 'Ascenso a Tercera : <b>CD Fabra y Coats</b><br />';
        break;

        case 1364:
        $txt .= 'Fase de clasificación a Segunda : <b>Gimnástico de Tarragona</b><br />';
        $txt .= 'Ascenso a Tercera : <b>CD Adrianense y CD Sallent </b><br />';
        break;

        case 1363:
        $txt .= 'Fase de clasificación a Segunda : <b>Utebo CF</b><br />';
        $txt .= 'Ascenso a Tercera : <b>CD Teruel, UD Fraga y UD Jaca </b><br />';
        $txt .= 'Descenso a Regional : <b>UD Huesca</b><hr />';
        $txt .= 'El partido Huesca - Montañanesa, inicialmente 2-0, se da por perdido al SD Huesca.<br />El Huesca figura con dos puntos menos y el Zuera con tres, ambos por sanción federativa.<br />';
        break;

        case 1362:
        $txt .= 'Fase de clasificación a Segunda : <b>JD Mondragón </b><br />';
        $txt .= 'Ascenso a Tercera : <b>CD Hernani y CD Iruña </b><br />';
        $txt .= 'Descenso a Regional : <b>CD Izarra y Recreación Logroño  </b><br />';
        break;

        case 1361:
        $txt .= 'Fase de clasificación a Segunda : <b>Arenas Club</b><br />';
        $txt .= 'Ascenso a Tercera : <b>SD Deusto</b><hr />';
        $txt .= 'El Uritarra figura con tres puntos de sanción federativa, por incomparecencia a su partido en campo del Padura.<br />';
        break;

        case 1360:
        $txt .= 'Fase de clasificación a Segunda : <b>RS Gimnástica </b><br />';
        $txt .= 'Ascenso a Tercera : <b>Club Marino y CD Laredo</b><br />';
        break;

        case 1359:
        $txt .= 'Fase de clasificación a Segunda : <b>Club Lemos </b><br />';
        $txt .= 'Ascenso a Tercera : <b>Órdenes SD y Gran Peña</b><br />';
        break;

        case 1377:
        $txt .= 'Ascenso a Segunda : <b>Córdoba CF</b><br />';
        $txt .= 'Fase de clasificación a Segunda : <b>RB Linense </b><br />';
        $txt .= 'Fase de promoción de ascenso a Segunda : <b>Algeciras CF</b><br />';
        break;

        case 1376:
        $txt .= 'Ascenso a Segunda : <b>Levante UD </b><br />';
        $txt .= 'Fase de clasificación a Segunda : <b>Alicante CF</b><br />';
        $txt .= 'Fase de promoción de ascenso a Segunda : <b>CD Eldense</b><br />';
        break;

        case 1358:
        $txt .= 'Ascenso a Segunda : <b>Gerona CF</b><br />';
        $txt .= 'Fase de clasificación a Segunda : <b>Rayo Vallecano</b><br />';
        $txt .= 'Fase de promoción de ascenso a Segunda : <b>CD Manresa </b><br />';
        break;

        case 1357:
        $txt .= 'Ascenso a Segunda : <b>Burgos CF</b><br />';
        $txt .= 'Fase de clasificación a Segunda : <b>Real Avilés</b><br />';
        $txt .= 'Fase de promoción de ascenso a Segunda : <b>CD Orense</b><br />';
        break;

        case 1040:
        $txt .= 'Campeón : <b>Rayo Vallecano</b><br />';
        $txt .= 'Fase Final: <b>Rayo Vallecano y Real Aranjuez</b><br />';
        break;

        case 1039:
        $txt .= 'Campeón : <b>UD Salamanca</b><br />';
        $txt .= 'Fase Final: <b>UD Salamanca y Atlético Palentino </b><br />';
        break;

        case 1038:
        $txt .= 'Campeón : <b>CD Don Benito</b><br />';
        $txt .= 'Fase Final: <b>CD Don Benito y CD Cacereño</b><br />';
        $txt .= 'El Montijo figura con dos puntos de sanción por no comparecer a su partido en campo del Cacereño.<br />';
        break;

        case 1027:
        $txt .= 'Campeón : <b>SD Ceuta</b><br />';
        $txt .= 'Fase Final: <b>SD Ceuta y CDR Melilla</b><hr />';
        $txt .= 'El Alcázar figura con cuatro puntos de sanción por no presentarse a jugar los partidos Pescadores - Alcázar y Alcázar - Villa Nador.<br />';
        break;

        case 1026:
        $txt .= 'Campeón : <b>Córdoba CF</b><br />';
        $txt .= 'Fase Final: <b>Córdoba CF y CA Almería</b><br />';
        break;

        case 1037:
        $txt .= 'Campeón : <b>Algeciras CF </b><br />';
        $txt .= 'Fase Final: <b>Algeciras CF y RB Linense</b><br />';
        break;

        case 1036:
        $txt .= 'Campeón : <b>CD Eldense</b><br />';
        $txt .= 'Fase Final: <b>CD Eldense y UD Cartagenera</b><br />';
        break;

        case 1047:
        $txt .= 'Campeón : <b>Levante UD </b><br />';
        $txt .= 'Fase Final: <b>Levante UD y Alicante CF</b><br />';
        break;

        case 1028:
        $txt .= 'Campeón y Final Grupo VIII : <b>UD Mahón</b><hr />';
        $txt .= 'El UD Mahón, como campeón participa en una eliminatoria con el subcampeón del subgrupo de Mallorca, para determinar quién participa en la fase Final. <hr />';
        $txt .= '<i>Tercera División Grupo VIII Eliminatoria final </i><br />';
        $txt .= '08-01-1956 : Mallorca 4-0 UD Mahón<br />';
        $txt .= '15-01-1956 : UD Mahón 5-1 Mallorca<br />';
        $txt .= '<i>Desempate: </i><br />';
        $txt .= '17-01-1956 : Mallorca 1-2 <b>UD Mahón</b> (En la prórroga) Jugado en Ciudadela. <br />El UD Mahón se clasifica para la fase final.<br />';
        break;

        case 1046:
        $txt .= 'Campeón y Fase Final : <b>Atlético Baleares</b><br />';
        $txt .= 'Final Grupo VIII: <b>RCD Mallorca</b><hr />';
        $txt .= 'El Mallorca, como subcampeón participa en una eliminatoria con el campeón del subgrupo de Menorca para determinar quién accede a la Fase Final.<hr />';
        $txt .= '<i>Tercera División Grupo VIII Eliminatoria final </i><br />';
        $txt .= '08-01-1956 : Mallorca 4-0 UD Mahón<br />';
        $txt .= '15-01-1956 : UD Mahón 5-1 Mallorca<br />';
        $txt .= '<i>Desempate: </i><br />';
        $txt .= '17-01-1956 : Mallorca 1-2 <b>UD Mahón</b> (En la prórroga) Jugado en Ciudadela. <br />El UD Mahón se clasifica para la fase final.<br />';
        break;

        case 1045:
        $txt .= 'Campeón : <b>CD Granollers </b><br />';
        $txt .= 'Fase Final: <b>CD Granollers y CD Tortosa</b><br />';
        break;

        case 1044:
        $txt .= 'Campeón : <b>CD Manresa </b><br />';
        $txt .= 'Fase Final: <b>CD Manresa y Gerona CF</b><br />';
        break;

        case 1043:
        $txt .= 'Campeón : <b>Arenas SD</b><br />';
        $txt .= 'Fase Final: <b>Arenas SD y UD Amistad</b><br />';
        break;

        case 1042:
        $txt .= 'Campeón : <b>CD Elgóibar</b><br />';
        $txt .= 'Fase Final: <b>CD Elgóibar y Villafranca UC</b><br />';
        break;

        case 1041:
        $txt .= 'Campeón : <b>Burgos CF</b><br />';
        $txt .= 'Fase Final: <b>Burgos CF y SCD Durango</b><br />';
        break;

        case 1025:
        $txt .= 'Campeón : <b>Club Langreano</b><br />';
        $txt .= 'Fase Final: <b>Club Langreano y Real Avilés</b><br />';
        break;

        case 1035:
        $txt .= 'Campeón : <b>CD Orense</b><br />';
        $txt .= 'Fase Final: <b>CD Orense y Club Turista</b><br />';
        break;

        case 1378:
        $txt .= 'Ascenso a Primera: <b>SD España Industrial y Real Zaragoza</b><br />';
        $txt .= 'Descenso a Segunda: <b>Real Murcia CF y Deportivo Alavés</b><hr />';
        $txt .= 'El España Industrial renunció a seguir siendo filial del CF Barcelona para poder jugar la temporada siguiente en Primera.<br />';
        break;

        case 1034:
        $txt .= 'Campeón y ascenso a Primera: <b>Real Jaén</b><br />';
        $txt .= 'Promoción de Ascenso a Primera: <b>Real Betis Balompié y SD España Industrial</b><br />';
        $txt .= 'Promoción de descenso a Tercera: <b>Plus Ultra CF y CD Castellón</b><hr />';
        $txt .= 'No hay descensos directos a Tercera, por ampliarse el grupo a 20 equipos para la temporada siguiente.<br />';
        break;

        case 1033:
        $txt .= 'Campeón y ascenso a Primera: <b>Club Atlético Osasuna</b><br />';
        $txt .= 'Promoción de Ascenso a Primera: <b>Real Oviedo y Real Zaragoza</b><br />';
        $txt .= 'Promoción de descenso a Tercera: <b>Club Sestao y CD Logroñes</b><hr />';
        $txt .= 'No hay descensos directos a Tercera, por ampliarse el grupo a 20 equipos para la temporada siguiente.<br />';
        break;

        case 984:
        $txt = 'Campeón: <b>Atlético de Bilbao</b><br />';
        $txt .= 'Copa de Europa: <b>Atlético de Bilbao y Real Madrid CF </b><br />';
        $txt .= 'Promoción de Descenso a Segunda: <b>Real Murcia CF y Deportivo Alavés</b><br />';
        $txt .= 'Descenso a Segunda: <b>CyD Leonesa y Hércules CF</b><hr />';
        $txt .= 'El Real Madrid se clasifica para jugar la próxima edición de la Copa de Europa por ser el vigente campeón.<br />';
        break;

        case 1356:
        $txt .= 'Permanecen en Primera: <b>RCD Español y Real Sociedad de Fútbol.</b><br />';
        break;

        case 1352:
        $txt .= 'Permanencia en Tercera: <b>Real Aranjuez, CD Guadalajara, CD Toledo, UB Conquense, UD Girod, CD Leganés y CD Cuatro Caminos </b><br />';
        $txt .= 'Ascenso a Tercera: <b>CD Parque Móvil y RCD Carabanchel</b><br />';
        $txt .= 'Descenso a Regional: <b>UD San Lorenzo</b><br />';
        $txt .= 'El partido Conquense - San Lorenzo (inicialmente 2-2) se dio por perdido al San Lorenzo por alineación indebida, descontándosele además un punto de la clasificación.<br />';
        break;

        case 1351:
        $txt .= 'Permanencia en Tercera: <b>Real Ávila, Atlético Palentino, Júpiter Leonés, SD Ponferradina, Gimnástica Segoviana, SD Unión Castilla y Atlético Zamora</b><br />';
        $txt .= 'Ascenso a Tercera: <b>Béjar Industrial</b><br />';
        $txt .= 'Descenso a Regional: <b>CAA Salesianos </b><br />';
        break;

        case 1350:
        $txt .= 'Permanencia en Tercera: <b>CD Manchego, CP Cacereño, CD Montijo, CD Villanovense, CF Calvo Sotelo, UD Azuaga, CD Plasencia y Metalúrgica Extremeña.</b><br />';
        $txt .= 'El Herencia figura con un punto menos por sanción federativa.<br />';
        break;

        case 1349:
        $txt .= 'Permanencia en Tercera: <b>SD Villa Nador y CD Pescadores</b><br />';
        break;

        case 1348:
        $txt .= 'Permanencia en Tercera: <b>Larache CF, Español Tetuán, África Ceutí, Unión Tangerina y CD Alcázar </b><br />';
        $txt .= 'Ascenso a Tercera: <b>CD Alcazaba</b><br />';
        break;

        case 1347:
        $txt .= 'Permanencia en Tercera: <b>CD Linares, Atlético Almería, Recreativo Granada, CD Antequerano, Atlético Bastetano, Martos CF, Motril CF y Atlético Malagueño</b><br />';
        break;

        case 1346:
        $txt .= 'Permanencia en Tercera: <b>Peñarroya Pueblonuevo, Recreativo de Huelva, Chiclana CF, Constantina CF, CD Utrera, Córdoba CF, Recreativo Portuense y Lora CF</b><br />';
        $txt .= 'Ascenso a Tercera: <b>Coria CF</b><br />';
        $txt .= 'El Constantina figura con dos puntos menos por incomparecencia a su partido en campo del Lora.<br />';
        break;

        case 1345:
        $txt .= 'Permanencia en Tercera: <b>Hellín Deportivo, CD Yeclano, Novelda CF, CD Lorca, Imperial CF, UD Cartagenera y Orihuela Deportiva</b><br />';
        $txt .= 'Ascenso a Tercera: <b>Callosa Deportiva, SD Almansa y CD Cieza</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Aspense</b><br />';
        break;

        case 1344:
        $txt .= 'Permanencia en Tercera: <b>PD Soriano, CF Gandía, Albacete Balompié, Alicante CF, CD Burriana y UD Alcira</b><br />';
        $txt .= 'Ascenso a Tercera: <b>CD Acero y Onteniente CF</b><br />';
        $txt .= 'Descenso a Regional: <b>Villena CF y Catarroja CF</b><br />';
        break;

        case 1343:
        $txt .= 'Permanencia en Tercera: <b>CD Constancia, UD Poblense, CD Manacor, UD Porreras, Atlético Baleares, CD Binisalem y CD Santañy</b><br />';
        $txt .= 'Ascenso a Tercera: <b>CD España y CD Soledad</b><br />';
        break;

        case 1342:
        $txt .= 'Permanencia en Tercera: <b>Hércules Hospitalet, UD San Martín, CF Amposta, UA Horta, Reus Deportivo, UD Sans y CD Europa</b><br />';
        $txt .= 'Ascenso a Tercera: <b>CD La Cava y Atlético Pueblo Nuevo</b><br />';
        $txt .= 'Descenso a Regional: <b>UD Pueblo Seco</b><br />';
        break;

        case 1341:
        $txt .= 'Permanencia en Tercera: <b>CD San Andrés, CD Mataró, UD Vich, CF Mollet, CD Moncada, Puig Reig, CD Granollers, CF Badalona y CD Júpiter</b><br />';
        $txt .= 'Ascenso a Tercera: <b>UD Artiguense</b><br />';
        break;

        case 1340:
        $txt .= 'Permanencia en Tercera: <b>CD Gallur, SD Montañanesa, CD Numancia, CD Calatayud, CD Celta, Utebo FC, UD Huesca y UD Amistad</b><br />';
        $txt .= 'Ascenso a Tercera: <b>CD Tauste</b><br />';
        break;

        case 1339:
        $txt .= 'Permanencia en Tercera: <b>Villafranca UC, JD Mondragón, Recreación Logroño, CD Izarra, Peña Sport, CD Azcoyen y CD Calahorra</b><br />';
        $txt .= 'Ascenso a Tercera: <b>CD Touring y CD Oberena</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Anaitasuna</b><br />';
        break;

        case 1338:
        $txt .= 'Permanencia en Tercera: <b>CD Basconia, CD Guecho, SD Begoña, CD Mirandés, Arenas Club, CD Villosa, Club Erandio y Club Portugalete</b><br />';
        $txt .= 'Ascenso a Tercera: <b>SD Valmaseda, SCD Durango, Club Bermeo y CD Padura</b><br />';
        break;

        case 1337:
        $txt .= 'Permanencia en Tercera: <b>CD Turón, Real Titánico, Santoña CF , Club Calzada, Real Juvencia y Rayo Cantabria </b><br />';
        $txt .= 'Ascenso a Tercera: <b>UD Entrego</b><br />';
        $txt .= 'Descenso a Regional: <b>CD San Martín, CD Laredo y Barreda Balompié</b><br />';
        break;

        case 1336:
        $txt .= 'Permanencia en Tercera: <b>CD Orense, Club Turista, Fabril Deportivo, CD Lugo y Club Lemos</b> <br />';
        $txt .= 'Ascenso a Tercera: <b>Juvenil Puenteareas y Brigantium CF</b><br />';
        $txt .= 'Descenso a Regional: <b>Marín CF , Arosa SC y Club Santiago</b><br /><hr />';
        $txt .= 'El partido Turista - Marín (inicialmente 1-3) se dió por perdido al Marín y se le descontó un punto, por alineación indebida.<br />';
        $txt .= 'El partido Brigantium - Arosa (inicialmente 3-3) se dió por perdido al Arosa y se le descontó un punto, por alineación indebida.<br />';
        $txt .= 'Los partidos Santiago - Turista (inicialmente 2-1), Santiago - Juvenil Puenteareas (2-1) y el Santiago - Brigantium (3-1), se dieron por perdidos al Santiago y se le descontaron tres puntos, por alineación indebida.<br />';
        break;

        case 1056:
        $txt .= 'Campeón : <b>Plus Ultra CF</b><br />';
        $txt .= 'Fase Final: <b>Plus Ultra CF y Rayo Vallecano</b><br />';
        break;

        case 1055:
        $txt .= 'Campeón : <b>Europa Delicias</b><br />';
        $txt .= 'Fase Final: <b>Europa Delicias y UD Salamanca </b><br />';
        break;

        case 1054:
        $txt .= 'Campeón : <b>Don Benito</b><br />';
        $txt .= 'Fase Final: <b>Don Benito y SD Emeritense </b><br />';
        break;

        case 1024:
        $txt .= 'Campeón : <b>SD Ceuta</b><br />';
        $txt .= 'Fase Final: <b>SD Ceuta y CDR Melilla </b><br />';
        break;

        case 1023:
        $txt .= 'Campeón : <b>Úbeda CF</b><br />';
        $txt .= 'Fase Final: <b>Úbeda CF y CD Iliturgi </b><br />';
        break;

        case 1053:
        $txt .= 'Campeón : <b>Cádiz CF</b><br />';
        $txt .= 'Fase Final: <b>Cádiz CF y Algeciras CF </b><br />';
        break;

        case 1052:
        $txt .= 'Campeón : <b>Elche CF</b><br />';
        $txt .= 'Fase Final: <b>Elche CF y CD Eldense </b><br />';
        break;

        case 1065:
        $txt .= 'Campeón : <b>CD Alcoyano</b><br />';
        $txt .= 'Fase Final: <b>CD Alcoyano y CD Mestalla </b><br />';
        break;

        case 1064:
        $txt .= 'Campeón y Promoción a Fase Final: <b>UD Mahón</b><hr />';
        $txt .= '<i>Promoción para la Fase Final</i><br />';
        $txt .= '29-12-1954 : CD Constancia - UD Mahón : 1-0<br />';
        $txt .= '09-01-1955 : <b>UD Mahón</b> - CD Constancia : 2-0<br />';
        $txt .= 'Fase Final: <b>UD Mahón</b><br />';
        break;

        case 1063:
        $txt .= 'Campeón y Fase Final: <b>RCD Mallorca</b><br />';
        $txt .= 'Promoción a Fase Final: <b>CD Constancia</b><br />';
        $txt .= '<i>Promoción para la Fase Final</i><br />';
        $txt .= '29-12-1954 : CD Constancia - UD Mahón : 1-0<br />';
        $txt .= '09-01-1955 : <b>UD Mahón</b> - CD Constancia : 2-0<br />';
        $txt .= 'Fase Final: <b>UD Mahón</b><br />';
        break;

        case 1062:
        $txt .= 'Campeón : <b>Gimnástico de Tarragona</b><br />';
        $txt .= 'Fase Final: <b>Gimnástico de Tarragona y CD Tortosa </b><br />';
        break;

        case 1061:
        $txt .= 'Campeón : <b>Gerona CF</b><br />';
        $txt .= 'Fase Final: <b>Gerona CF y CD Manresa</b><br />';
        break;

        case 1060:
        $txt .= 'Campeón : <b>Arenas SD</b><br />';
        $txt .= 'Fase Final: <b>Arenas SD y CD Binéfar</b><br />';
        $txt .= 'El partido UD Huesca - Arenas SD, inicialmente 2-2, se dio por perdido al UD Huesca por alineación indebida, descontándosele además un punto de la clasificación.<br />';
        break;

        case 1059:
        $txt .= 'Campeón : <b>CD Tudelano</b><br />';
        $txt .= 'Fase Final: <b>CD Tudelano y CD Elgóibar</b><br />';
        $txt .= 'El Calahorra fue sancionado con la pérdida de un punto por alineación indebida en el partido CD Calahorra - CD Tudelano (0-3).<br />';
        break;

        case 1058:
        $txt .= 'Campeón : <b>Burgos CF </b><br />';
        $txt .= 'Fase Final: <b>Burgos CF y SD Indauchu</b><br />';
        break;

        case 1057:
        $txt .= 'Campeón : <b>Club Langreano</b><br />';
        $txt .= 'Fase Final: <b>Club Langreano y RS Gimnástica</b><br />';
        break;

        case 1048:
        $txt = 'Campeón: <b>Real Madrid CF</b><br />';
        $txt .= 'Copa de Europa: <b>Real Madrid CF </b><br />';
        $txt .= 'Promoción de Descenso a Segunda: <b>RCD Español y Real Sociedad de Fútbol</b><br />';
        $txt .= 'Descenso a Segunda: <b>Real Santander y CD Málaga</b><br />';
        break;

        case 1049:
        $txt .= 'Campeón y ascenso a Primera: <b>CyD Leonesa</b><br />';
        $txt .= 'Promoción de Ascenso a Primera: <b>Real Oviedo y Real Zaragoza</b><br />';
        $txt .= 'Descenso a Tercera: <b>Real Avilés y CD Juvenil Coruña</b><br />';
        break;

        case 1050:
        $txt .= 'Campeón y ascenso a Primera: <b>Real Murcia CF</b><br />';
        $txt .= 'Promoción de Ascenso a Primera: <b>Atlético Tetuán y Granada CF</b><br />';
        $txt .= 'Descenso a Tercera: <b>Levante UD y RB Linense</b><br />';
        break;

        case 1334:
        $txt .= 'Ascenso a Segunda: <b>SD Indauchu</b><br />';
        break;

        case 1335:
        $txt .= 'Ascenso a Segunda: <b>Plus Ultra CF</b><br />';
        break;

        case 1353:
        $txt .= 'Ascenso a Segunda: <b>CD Mestalla</b><br />';
        break;

        case 1354:
        $txt .= 'Ascenso a Segunda: <b>Cádiz CF </b><br />';
        break;

        case 1051:
        $txt .= 'Campeón : <b>Arsenal CF</b><br />';
        $txt .= 'Fase Final: <b>Arsenal CF y Pontevedra CF</b><br />';

        //temporada 1954-55 HASTA 1969-70 AQUI

        //DESDE 1928-29 HASTA 1953-54 AQUI ABAJO******************************************************************

        break;

        case 1074:
        $txt .= 'Campeón y ascenso a Segunda: <b>Real Betis Balompié</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda: <b>CD San Fernando </b><br />';
        $txt .= '<hr />Por retirarse en el encuentro CA Almería - Cádiz CF, se sanciona al CA Almería con la pérdida de dos puntos.<br />';
        break;

        case 1073:
        $txt .= 'Campeón y ascenso a Segunda: <b>Levante UD</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda: <b>Orihuela Deportiva </b><br />';
        break;

        case 1072:
        $txt .= 'Campeón y ascenso a Segunda: <b>CF Extremadura</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda: <b>CP Cacereño</b><br />';
        break;

        case 1071:
        $txt .= 'Campeón y ascenso a Segunda: <b>CD Tarrasa</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda: <b>Gerona CF</b><br />';
        break;

        case 1070:
        $txt .= 'Campeón y ascenso a Segunda: <b>Club Sestao</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda: <b>UD Huesca</b><br />';
        $txt .= '<hr />Por incomparecencia a sus partidos en campo del Erandio y del Rayo Cantabria, el Binéfar es sancionado a perder toda su puntuación.<br />';
        break;

        case 1069:
        $txt .= 'Campeón y ascenso a Segunda: <b>CD Juvenil Coruña </b><br />';
        $txt .= 'Promoción de Ascenso a Segunda: <b>SD Ponferradina</b><br />';
        break;

        case 1325:
        $txt .= 'Ascenso a Segunda: <b>CD San Fernando</b><br />';
        $txt .= 'Permanencia en Segunda: <b>Real Murcia CF</b><br />';
        $txt .= 'Descenso a Tercera: <b>CDR Melilla </b><br />';
        break;

        case 1324:
        $txt .= 'Permanencia en Segunda: <b>Caudal Deportivo y La Felguera SCP</b><br />';
        break;

        case 1323:
        $txt .= 'Ascenso a Primera: <b>CD Málaga y Hércules CF</b><br />';
        $txt .= 'Descenso a Segunda: <b>Club Atlético Osasuna y Real Jaén</b><br />';
        break;

        case 1068:
        $txt .= 'Campeón y ascenso a Primera: <b>UD Las Palmas</b><br />';
        $txt .= 'Promoción de Ascenso a Primera: <b>Hércules CF y CD Málaga</b><br />';
        $txt .= 'Promoción Descenso a Tercera: <b>Real Murcia CF y CDR Melilla</b><br />';
        $txt .= 'Descenso a Tercera: <b>CD Alcoyano, CD Mestalla y RCD Mallorca</b><br />';
        break;

        case 1067:
        $txt .= 'Campeón y ascenso a Primera: <b>Deportivo Alavés</b><br />';
        $txt .= 'Promoción de Ascenso a Primera: <b>Baracaldo CF y UD Lérida</b><br />';
        $txt .= 'Promoción Descenso a Tercera: <b>Caudal Deportivo y La Felguera SCP</b><br />';
        $txt .= 'Descenso a Tercera: <b>RSG Torrelavega, UD Salamanca y SD Escoriaza</b><br />';
        break;

        case 1066:
        $txt = 'Campeón: <b>Real Madrid CF</b><br />';
        $txt .= 'Promoción Descenso a Segunda: <b>Club Atlético Osasuna y Real Jaén.</b><br />';
        $txt .= 'Descenso a Segunda: <b>Real Oviedo y Real Gijón.</b><br />';
        break;

        case 1082:
        $txt .= 'Campeón y ascenso a Segunda: <b>Jerez CD</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda: <b>España de Tanger</b><br />';
        $txt .= '<hr />El partido Atlético Malagueño - Betis, inicialmente 2-0, se dio por perdido al Atlético Malagueño, por alineación indebida de dos jugadores, descontándosele además tres puntos de su clasificación.<br />';
        break;

        case 1081:
        $txt .= 'Campeón y ascenso a Segunda: <b>CD Castellón</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda: <b>Levante UD</b><br />';
        break;

        case 1080:
        $txt .= 'Campeón y ascenso a Segunda: <b>CD Badajoz</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda: <b>Calvo Sotelo</b><br />';
        break;

        case 1079:
        $txt .= 'Campeón y ascenso a Segunda: <b>SD Escoriaza </b><br />';
        $txt .= 'Promoción de Ascenso a Segunda: <b>CD Mataró</b><br />';
        $txt .= 'Descenso a Regional: <b>CF Igualada  y UD Tárrega</b><br />';
        $txt .= '<hr />Por incomparecencia del Tárrega a su partido en campo del Arenas, se le da por perdido el partido y se le descuentan además dos puntos de la clasificación.<br />';
        break;

        case 1022:
        $txt .= 'Campeón y ascenso a Segunda: <b>SD Eibar</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda: <b>Club Sestao</b><br />';
        $txt .= 'Descenso a Regional: <b>Recreación de Logroño y CD Calahorra</b><br />';
        $txt .= '<hr />El partido Recreación de Logroño - Rayo Cantabria (inicialmente 5-0) se da por perdido al primero por alineación indebida, descontándosele además un punto de su clasificación.<br />';
        break;

        case 1078:
        $txt .= 'Campeón y ascenso a Segunda: <b>CP La Felguera</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda: <b>CyD Leonesa</b><br />';
        break;

        case 1322:
        $txt .= 'Permanencia en Segunda: <b>España de Tanger</b><br />';
        $txt .= 'Descenso a Tercera: <b>RCD Córdoba</b><br />';
        break;

        case 1321:
        $txt .= 'Permanencia en Segunda: <b>RS Gimnástica</b><br />';
        $txt .= 'Ascenso a Segunda: <b>CyD Leonesa</b><br />';
        $txt .= 'Descenso a Tercera: <b>UD Salamanca</b><br />';
        break;

        case 1320:
        $txt .= 'Permanecen en Primera: <b>RC Deportivo y RC Celta</b><br />';
        $txt .= 'El SD España Industrial no pudo ascender a Primera por ser filial del CF Barcelona.<br />';
        break;

        case 1077:
        $txt .= 'Campeón y ascenso a Primera: <b>Real Jaén</b><br />';
        $txt .= 'Promoción de Ascenso a Primera: <b>Hércules CF y Atlético Tetuán</b><br />';
        $txt .= 'Promoción de descenso a Tercera: <b>Orihuela Deportiva y RCD Córdoba</b><br />';
        $txt .= 'Descenso a Tercera: <b>Atlético Baleares, Plus Ultra y CP Cacereño</b><br />';
        break;

        case 1076:
        $txt .= 'Campeón y ascenso a Primera: <b>Club Atlético Osasuna</b><br />';
        $txt .= 'Promoción de Ascenso a Primera: <b>SD España Industrial y Real Avilés</b><br />';
        $txt .= 'Promoción de descenso a Tercera: <b>Gim. Torrelavega y UD Salamanca</b><br />';
        $txt .= 'Descenso a Tercera: <b>Gimnástico de Tarragona, UD Huesca y Burgos CF</b><br />';
        break;

        case 1075:
        $txt = 'Campeón: <b>CF Barcelona</b><br />';
        $txt .= 'Promoción de descenso a Segunda: <b>RC Celta y RC Deportivo</b><br />';
        $txt .= 'Descenso a Segunda: <b>CD Málaga y Real Zaragoza CD</b><br />';
        break;

        case 1319:
        $txt .= 'Descenso a Regional: <b>CD Castellon y Tomelloso CF</b><br />';
        $txt .= '<hr />Se jugó esta promoción por la planeada reducción de Segunda División a un único grupo para la temporada siguiente. Finalmente, dicha reducción no se llevó a cabo, por lo que permanecieron en Segunda los seis equipos que formaron el grupo.<br />';
        break;

        case 1318:
        $txt .= 'Descenso a Regional: <b>CF Badalona y Gerona CF</b><br />';
        $txt .= '<hr />Se jugó esta promoción por la planeada reducción de Segunda División a un único grupo para la temporada siguiente. Finalmente, dicha reducción no se llevó a cabo, por lo que permanecieron en Segunda los seis equipos que formaron el grupo.<br />';
        break;

        case 1090:
        $txt .= 'Campeón y ascenso a Segunda: <b>Real Jaén</b><br />';
        //$txt.="Promoción de Permanencia: Recreativo</b><br />";
        $txt .= '<hr />El Maghreb y el Larache se retiraron antes de terminar la competición, anulándose todos los resultados que habían obtenido.<br />';
        break;

        case 1089:
        $txt .= 'Campeón y ascenso a Segunda: <b>Orihuela Deportiva</b><br />';
        //$txt.="Promoción de Permanencia: Castellón</b><hr />";
        $txt .= '<hr />El Hernán Cortés se retiró de este grupo una vez iniciada la competición, anulándose los resultados de los partidos que había disputado hasta entonces.<br />';
        break;

        case 1088:
        $txt .= 'Campeón y ascenso a Segunda: <b>CD Cacereño</b><br />';
        //$txt.="Promoción de Permanencia: Tomelloso</b><hr />";
        $txt .= 'El partido Cacereño - Gim. Segoviana se dio por perdido al visitante por incomparecencia, descontándosele además dos puntos por sanción.<br />';
        break;

        case 1087:
        $txt .= 'Campeón y ascenso a Segunda: <b>SD España Industrial</b><br />';
        //$txt.="Promoción de Permanencia: Gerona</b><br />";
        break;

        case 1021:
        $txt .= 'Campeón y ascenso a Segunda: <b>Burgos CF</b><br />';
        //$txt.="Promoción de Permanencia: Guecho</b><br />";
        break;

        case 1086:
        $txt .= 'Campeón y ascenso a Segunda: <b>Real Avilés</b><br />';
        //$txt.="Promoción de Permanencia: At. Zamora</b><br />";
        break;

        case 1317:
        $txt .= 'Descenso a Tercera: <b>RSG Torrelavega, Atlético Baleares, Deportivo Alavés y RCD Córdoba.</b><hr />';
        $txt .= 'Se jugó esta promoción por la planeada reducción de Segunda División a un único grupo para la temporada siguiente. Finalmente, dicha reducción no se llevó a cabo, por lo que permanecieron en Segunda los seis equipos que formaron el grupo.<br />';
        break;

        case 1316:
        $txt .= 'Permanencia en Primera: <b>Real Gijón y Raal Santander</b><br />';
        $txt .= 'El CD Mestalla no pudo ascender a Primera por ser filial del Valencia CF.</b><br />';
        break;

        case 1085:
        $txt .= 'Campeón y ascenso a Primera: <b>CD Málaga</b><br />';
        $txt .= 'Promoción de Ascenso a Primera: <b>CD Mestalla y CD Alcoyano</b><br />';
        //$txt.="Promoción de Permanencia: Melilla, Córdoba y At. Baleares</b><br />";
        $txt .= 'Descenso a Tercera: <b>Levante UD, Alicante CF y Cartagena CF</b><br />';
        break;

        case 1084:
        $txt .= 'Campeón y ascenso a Primera: <b>Real Oviedo</b><br />';
        $txt .= 'Promoción de Ascenso a Primera: <b>CD Logroñés y Club Ferrol</b><br />';
        //$txt.="Promoción de Permanencia: Caudal, Dep. Alavés y Gim. Torrelavega</b><br />";
        $txt .= 'Descenso a Tercera: <b>UD Orensana, CF Badalona y SG Lucense</b><br />';
        break;

        case 1083:
        $txt = 'Campeón: <b>CF Barcelona</b><br />';
        $txt .= 'Promoción de descenso a Segunda: <b>Real Gijón y Real Santander</b><br />';
        $txt .= 'Descenso a Segunda: <b>UD Las Palmas y Atlético de Tetuán</b><br />';
        break;

        case 1315:
        $txt .= 'Permanencia en Tercera: <b>Algeciras CF y Larache CF</b><hr />';
        $txt .= 'El partido Puerto Real - Juventud Sevilla (inicialmente 4-1) se dio por perdido al Puerto Real por alineación indebida, descontándosele 1 punto de la clasificación.';
        break;

        case 1314:
        $txt .= 'Ascenso a Tercera: <b>CD Aspense y Peña Soriano</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Eldense</b><hr />';
        break;

        case 1313:
        $txt .= 'Ascenso a Tercera: <b>UD San Lorenzo </b><br />';
        $txt .= 'Permanencia en Tercera: <b>CD Cuatro Caminos</b><br />';
        $txt .= 'Descenso a Regional: <b>RSD Alcalá</b><hr />';
        $txt .= 'Los partidos Montijo - Cuatro Caminos (inicialmente 0-0); Montijo - Miguel delPrado (inicialmente 3-1) y Montijo Boetticher (inicialmente 3-2) se dieron porperdidos al Montijo por alineación indebida, descontándosele además un punto porcada uno de los tres partidos.';
        break;

        case 1312:
        $txt .= 'Ascenso a Tercera: <b>CD Europa</b><br />';
        $txt .= 'Permanencia en Tercera: <b>UD Tárrega</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Júpiter</b><br />';
        break;

        case 1311:
        $txt .= 'Permanencia en Tercera: <b>Rayo Cantabria</b><br />';
        $txt .= 'Ascenso a Tercera: <b>Club Portugalete</b><br />';
        $txt .= 'Descenso a Regional: <b>Juventud Santander</b><br />';
        break;

        case 1310:
        $txt .= 'Permanencia en Tercera: <b>Club Santiago</b><br />';
        $txt .= 'Ascenso a Tercera: <b>Club Calzada</b><br />';
        break;

        case 1309:
        $txt .= 'Ascenso a Segunda: <b>Atlético Baleares y Alicante CF</b><br />';
        break;

        case 1308:
        $txt .= 'Ascenso a Segunda: <b>Caudal Deportivo y Deportivo Alavés</b><br />';
        break;

        case 1099:
        $txt .= 'Campe&oacute;n: <b>Recreativo de Huelva</b><br />';
        $txt .= 'Fase Final: <b>Recreativo de Huelva y Real Betis</b><br />';
        $txt .= 'Promoción de descenso a Regional: <b>Algeciras CF y Larache CF</b><br />';
        break;

        case 1098:
        $txt .= 'Campe&oacute;n: <b>Atlético Baleares</b><br />';
        $txt .= 'Fase Final: <b>Atlético Baleares y Alicante CF</b><br />';
        $txt .= 'Promoción de descenso a Regional: <b>CD Olímpico y CD Eldense</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Cieza</b><br />';
        $txt .= 'El partido Constancia - Olímpico se da por perdido al Olímpico por incomparecencia, descontándosele dos puntos de su clasificación.<br />';
        $txt .= 'El partido Olímpico - Novelda (2-0) se da por perdido al primero por alineación indebida, descontándosele un punto de su clasificación.<br />';
        $txt .= 'El partido Orihuela - Constancia se da por perdido al segundo por incomparecencia, descontándosele dos puntos de su clasificación.<br />';
        $txt .= 'El partido Segarra - Cieza se da por perdido al segundo por incomparecencia, descontándosele dos puntos de su clasificación.<br />';
        $txt .= 'El partido Manacor - Eldense fue aplazado en su fecha y ya no se jugó.<br />';
        break;

        case 1097:
        $txt .= 'Campe&oacute;n: <b>CD Cacereño</b><br />';
        $txt .= 'Fase Final: <b>CD Cacereño y CD Guadalajara</b><br />';
        $txt .= 'Promoción de descenso a Regional: <b>RSD Alcalá y CD Cuatro Caminos</b><br />';
        break;

        case 1096:
        $txt .= 'Campe&oacute;n: <b>UD San Martín</b><br />';
        $txt .= 'Fase Final: <b>UD San Martín y CD Tarrasa</b><br />';
        $txt .= 'Promoción de descenso a Regional: <b>CD Júpiter y UD Tárrega</b><br />';
        $txt .= 'Descenso a Regional: <b>Reus Deportivo</b><br />';
        break;

        case 1095:
        $txt .= 'Campe&oacute;n: <b>SD Eibar</b><br />';
        $txt .= 'Fase Final: <b>SD Eibar y Deportivo Alavés</b><br />';
        $txt .= 'Promoción de descenso a Regional: <b>Juventud de Santander y Rayo Cantabria</b><br />';
        $txt .= 'Descenso a Regional: <b>Real Unión y CD Tudelano</b><br />';
        break;

        case 1094:
        $txt .= 'Campe&oacute;n: <b>Atlético Zamora</b><br />';
        $txt .= 'Fase Final: <b>Atlético Zamora y Caudal Deportivo</b><br />';
        $txt .= 'Promoción de descenso a Regional: <b>CD FN Palencia y Club Santiago</b><hr />';
        $txt .= 'El partido Arosa - Avilés (1-0) se da por perdido al Arosa, por alineación indebida, descontándosele además un punto de su clasificación.';
        $txt .= 'El partido Arsenal Ferrol - F.N. Palencia (1-1) se da por perdido al F.N.Palencia, por alineación indebida, descontándosele además un punto de su clasificación.';
        break;

        case 1307:
        $txt .= 'Ascenso a Primera: <b>UD Las Palmas y Zaragoza CF</b><br />';
        $txt .= 'Descenso a Segunda: <b>CD Málaga y Real Murcia</b><br />';
        break;

        case 1093:
        $txt .= 'Campe&oacute;n y ascenso a Primera: <b>Atlético de Tetuán</b><br />';
        $txt .= 'Promoción de ascenso a Primera: <b>UD Salamanca y UD Las Palmas</b><br />';
        $txt .= 'Descenso a Tercera: <b>SD Ceuta y Albacete Balompié</b><br />';
        break;

        case 1092:
        $txt .= 'Campe&oacute;n y ascenso a Primera: <b>Real Gijón</b><br />';
        $txt .= 'Promoción de ascenso a Primera: <b>Zaragoza CF y CD Sabadell</b><br />';
        $txt .= 'Descenso a Tercera: <b>Gerona CF y CD Numancia</b><br />';
        $txt .= '<hr />Los partidos Numancia - San Andrés (3-1) y Numancia - Ferrol (3-0) se dan por perdidos al Numancia por alineación indebida, descontándosele además un punto por cada uno de ellos.<br />';

        break;

        case 1091:
        $txt .= 'Campe&oacute;n: <b>Atlético de Madrid</b><br />';
        $txt .= 'Promoción Permanencia en Primera: <b>CD Málaga y Real Murcia</b><br />';
        $txt .= 'Descenso a Segunda: <b>CD Alcoyano y UD Lérida</b><br />';
        break;

        case 1306:
        $txt .= 'Permanencia en Tercera: <b>Burgos CF</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Valdepeñas</b><br />';
        $txt .= 'En este grupo deberían haber participado además el Berbés, que fue repescado para la Promoción de Permanencia , y el Sueca y Electromecánicas, que renunciaron a participar.<br />';
        break;

        case 1305:
        $txt .= 'Ascenso a Tercera: <b>Español de Tetuán</b><br />';
        $txt .= 'Permanencia en Tercera: <b>Larache CF</b><br />';
        $txt .= 'Descenso a Regional: <b>SD Emeritense</b><br />';
        break;

        case 1304:
        $txt .= 'Permanencia en Tercera: <b>UB Conquense y Villena CF</b><br />';
        $txt .= 'Los partidos Cuatro Caminos - Novelda (inicialmente 1-1) y Novelda - Electrodo (inicialmente 4-1) se dan por perdidos al Novelda por alineación indebida, descontándosele además dos puntos de su clasificación..<br />';
        break;

        case 1303:
        $txt .= 'Ascenso a Tercera: <b>CD Manresa y España Industrial</b><br />';
        $txt .= 'Descenso a Regional: <b>CF Igualada y CD Acero</b><br />';
        $txt .= 'El partido Vinaroz - Manresa (inicialmente 4-3) se da por perdido al primero por alineación indebida, descontándosele además un punto de su clasificación.<br />';
        break;

        case 1302:
        $txt .= 'Ascenso a Tercera: <b>Éibar y Basconia</b><br />';
        $txt .= 'Descenso a Regional: <b>Real Unión y CD Calahorra</b><br />';
        break;

        case 1301:
        $txt .= 'Ascenso a Tercera: <b>Vetusta Oviedo</b><br />';
        $txt .= 'Permanencia en Tercera: <b>SD Ponferradina</b><br />';
        $txt .= 'Descenso a Regional: <b>Rayo Cantabria y Club Berbés</b><br />';
        $txt .= 'El Berbés debería haber participado en la Fase de Permanencia, pero fue repescado para la Promoción por la renuncia de algún equipo de Regional.<br />';
        $txt .= 'En este grupo también debería haber participado el Vimenor, pero se retiró antes de empezar la competición.<br />';
        break;

        case 1300:
        $txt .= 'Ascenso a Segunda: <b>CDR Melilla y UD Las Palmas</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda: <b>Imperial CF y SD Ceuta</b><br />';
        $txt .= 'En este grupo se incluyó a Las Palmas y Tenerife, que no habían jugado en Tercera División, y que debutaban de este modo en la Liga.<br />';
        break;

        case 1298:
        $txt .= 'Ascenso a Segunda: <b>CD Logroñés y UD Huesca</b><br />';
        $txt .= 'Promoción de Ascenso a Segunda: <b>UD San Andrés y CD Tortosa</b><br />';
        break;

        case 1107:
        $txt = 'Campeón: <b>SD Ceuta</b><br />';
        $txt .= 'Fase Final: <b>SD Ceuta y CDR Melilla</b><br />';
        $txt .= 'Promoción de Descenso a Regional: <b>SD Emeritense y Larache CF</b><br />';
        $txt .= 'Fase de Permanencia: <b>CD Electromecánicas</b><br />';
        break;

        case 1106:
        $txt = 'Campeón: <b>CD Toledo</b><br />';
        $txt .= 'Fase Final: <b>CD Toledo y Imperial CF</b><br />';
        $txt .= 'Promoción de Descenso a Regional: <b>UB Conquense y Villena CF</b><br />';
        $txt .= 'Fase de Permanencia: <b>CD Valdepeñas</b><br />';
        break;

        case 1105:
        $txt = 'Campeón: <b>UD San Andrés</b><br />';
        $txt .= 'Fase Final: <b>UD San Andrés y CD Tortosa</b><br />';
        $txt .= 'Promoción de Descenso a Regional: <b>CF Igualada y CD Acero</b><br />';
        $txt .= 'Fase de Permanencia: <b>SD Sueca</b><br />';
        break;

        case 1104:
        $txt = 'Campeón: <b>Campeón: UD Huesca</b><br />';
        $txt .= 'Fase Final: <b>UD Huesca y CD Logroñés</b><br />';
        $txt .= 'Promoción de Descenso a Regional: <b>CD Calahorra y Real Unión</b><br />';
        $txt .= 'Fase de Permanencia: <b>Burgos CF</b><br />';
        break;

        case 1103:
        $txt = 'Campeón: <b>Caudal Deportivo</b><br />';
        $txt .= 'Fase Final: <b>Caudal Deportivo Caudal y Real Avilés</b><br />';
        $txt .= 'Promoción de Descenso a Regional: <b>SD Ponferradina, Rayo Cantabria y Club Berbés</b><hr />';
        $txt .= 'Aunque el Berbés debería haber jugado la fase de Permanencia en Tercera, pasó a jugar la promoción, por la renuncia del Electrometálica de Lugo, de categoría Regional.</b><br />';
        break;

        case 1297:
        $txt .= 'Permanencia en Segunda: <b>CF Badalona y Cartagena CF</b><br />';
        $txt .= 'Ascenso a Segunda: <b>UD San Andrés y SD Ceuta</b><br />';
        $txt .= 'Descenso a Tercera: <b>Club Erandio y Elche CF</b><br />';
        break;

        case 1296:
        $txt .= 'Ascenso a Primera: <b>Real Santander y UD Lérida</b><br />';
        $txt .= 'Promoción de Ascenso a Primera: Real Murcia y CD Alcoyano</b><hr />';
        $txt .= '<b>Promoción de ascenso a Primera</b><br />';
        $txt .= '<i>Jugado en Barcelona. 2-07-1950</i><br />';
        $txt .= '<b>CD Alcoyano</b> 6-3 Gimnástico de Tarragona<br />';
        $txt .= '<i>Jugado en Burgos. 2-07-1950</i><br />';
        $txt .= '<b>Real Murcia</b> 2-0 Real Oviedo<hr />';
        $txt .= 'Ascienden a Primera: <b>CD Alcoyano y Real Murcia</b><br />';
        $txt .= 'Desciende a Segunda: <b>Gimnástico de Tarragona y Real Oviedo</b><br />';
        break;

        case 1102:
        $txt .= 'Campe&oacute;n: <b>CD Alcoyano</b><br />';
        $txt .= 'Promoción de Ascenso a Primera: <b>CD Alcoyano y Real Murcia CF</b><br />';
        $txt .= 'Promoción de Descenso a Tercera: <b>Elche CF y Cartagena CF</b><br />';
        $txt .= 'Descenso a Tercera: <b>CD Castellón</b><hr />';
        $txt .= 'El partido Elche - Murcia fue suspendido a falta de 17 minutos con el resultado de 0 - 1. Al no presentarse el Elche a jugar el tiempo restante en Albacete, se da este resultado como definitivo, y se le restan al Elche dos puntos de su clasificación.<br />';
        break;

        case 1101:
        $txt .= 'Campe&oacute;n: <b>Real Santander</b><br />';
        $txt .= 'Promoción de Ascenso a Primera: <b>Real Santander y UD Lérida</b><br />';
        $txt .= 'Promoción de Descenso a Tercera: <b>Club Erandio y CF Badalona</b><br />';
        $txt .= 'Descenso a Tercera: <b>Arosa SC</b><br />';
        break;

        case 1100:
        $txt .= 'Campe&oacute;n: <b>Atlético de Madrid</b><br />';
        $txt .= 'Promoción Permanencia en Primera: <b>Gimnástico de Tarragona y Real Oviedo</b><br />';
        $txt .= 'Este año no hay descensos directos, por ampliarse la categoría a 16 equipos para el año siguiente.<hr />';
        $txt .= '<b>Promoción de ascenso a Primera</b><br />';
        $txt .= '<i>Jugado en Barcelona. 2-07-1950</i><br />';
        $txt .= '<b>CD Alcoyano</b> 6-3 Gimnástico de Tarragona<br />';
        $txt .= '<i>Jugado en Burgos. 2-07-1950</i><br />';
        $txt .= '<b>Real Murcia</b> 2-0 Real Oviedo<hr />';
        $txt .= 'Ascienden a Primera: <b>CD Alcoyano y Real Murcia</b><br />';
        $txt .= 'Desciende a Segunda: <b>Gimnástico de Tarragona y Real Oviedo</b><br />';
        break;

        case 1295:
        $txt .= 'Esta fase final quedó sin efecto por la ampliación de la Segunda División.<hr />';
        break;

        case 1294:
        $txt .= 'Ascenso a Segunda: <b>Linense y CD Mallorca</b><br />';
        $txt .= 'Descenso a Tercera: <b>CF Badalona</b><br />';
        $txt .= 'Esta promoción quedó sin efecto por la ampliación de la Segunda División.<hr />';
        break;

        case 1293:
        $txt .= 'Ascenso a Segunda: <b>CD Numancia</b><br />';
        $txt .= 'Permanencia en Segunda: <b>Club Ferrol</b><br />';
        $txt .= 'Esta promoción quedó sin efecto por la ampliación de la Segunda División.<hr />';
        break;

        case 1115:
        $txt .= 'Campe&oacute;n: <b>At. Tetuán</b><br />';
        $txt .= 'Fase de Ascenso: <b>At. Tetuán y Córdoba</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Linense</b><hr />';
        break;

        case 1114:
        $txt .= 'Campe&oacute;n: <b>Albacete</b><br />';
        $txt .= 'Fase de Ascenso: <b>Albacete y Elche</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Cartagena</b><hr />';
        $txt .= 'El partido Alicante - Eldense (inicialmente 2-3) se dio por perdido al Eldense por alineación indebida, descontándosele además un punto de la clasificación.<hr />';
        break;

        case 1113:
        $txt .= 'Campe&oacute;n: <b>Plus Ultra</b><br />';
        $txt .= 'Fase de Ascenso: <b>Plus Ultra y Salamanca</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Numancia</b><hr />';
        break;

        case 1112:
        $txt .= 'Campe&oacute;n: <b>Lérida</b><br />';
        $txt .= 'Fase de Ascenso: <b>Lérida y Zaragoza</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Mallorca</b><hr />';
        break;

        case 1111:
        $txt .= 'Campe&oacute;n: <b>Osasuna</b><br />';
        $txt .= 'Fase de Ascenso: <b>Osasuna y Gim. Torrelavega</b><br />';
        $txt .= 'Promoción de Ascenso: <b>Erandio</b><hr />';
        $txt .= 'En el partido Burgos - Logroñés (inicialmente 3-1) se alineó indebidamente el portero suplente del Burgos como jugador de campo, lo cual estaba prohibido por las normas de entonces. Por ello, se da el partido por perdido al Burgos, descontándosele además un punto de la clasificación. <br />';
        break;

        case 1110:
        $txt .= 'Campe&oacute;n: <b>Orensana</b><br />';
        $txt .= 'Fase de Ascenso: <b>Orensana y Arosa</b><br />';
        $txt .= 'Promoción de Ascenso: <b>SG Lucense</b><hr />';
        $txt .= 'Los partidos Arsenal - Berbés (inicialmente 3-2) y Lucense - Arsenal (inicialmente 2-3) se dieron por perdidos al Arsenal, por alineación indebida, descontándosele además un punto por cada uno de los dos partidos.<br /><br />';
        break;

        case 1109:
        $txt .= 'Campe&oacute;n: <b>Real Sociedad</b><br />';
        $txt .= 'Ascenso a Primera: <b>Real Sociedad y CD Málaga</b><hr />';
        $txt .= 'Promoción descenso a Tercera: <b>CF Badalona y Club Ferrol</b><hr />';
        $txt .= 'El CF Badalona y el Ferrol jugaron la promoción, que posteriormente quedaría sin efecto por la ampliación de la categoría.<br />';
        break;

        case 1108:
        $txt .= 'Campe&oacute;n: <b>CF Barcelona</b><br />';
        $txt .= 'Descenso a Segunda: <b>CD Alcoyano y CD Sabadell</b><hr />';
        break;

        case 1291:
        $txt .= 'Descenso a Regional: <b>España Industrial, UD Sans y CD Almoradí</b><hr />';
        break;

        case 1290:
        $txt .= 'Descenso a Regional: <b>CD San Fernando, UB Conquense y Gimnástico Alcázar</b><hr />';
        $txt .= 'Por renuncia de otro equipo, UB Conquense fué repescado para jugar en Tercera la próxima temporada.<br />';
        break;

        case 1289:
        $txt .= 'Descenso a Regional: <b>Cultural Durango, Numancia CF y Deportivo Alavés</b><hr />';
        $txt .= 'Por renuncia de otros equipos, Numancia CF y Deportivo Alavés fueron repescados para jugar en Tercera la próxima temporada.<br />';
        break;

        case 1288:
        $txt .= 'Descenso a Regional: <b>Real Juvencia, Maestranza Aerea León y Club Santiago</b><hr />';
        $txt .= 'El Club Santiago figura con dos puntos menos por sanción federativa.<br />';
        $txt .= 'Por renuncia de otros equipos, los tres descendidos fueron repescados para jugar en Tercera la próxima temporada.<br />';
        break;

        case 1292:
        $txt .= 'Ascenso a Segunda: <b>Real Santander y Gerona CF</b><br />';
        break;

        case 1287:
        $txt .= 'Fase Final: <b>CDR Melilla y Gerona CF</b><br />';
        break;

        case 1286:
        $txt .= 'Fase Final: <b>Real Santander y UD Salamanca</b><br />';
        break;

        case 1124:
        $txt .= 'Campe&oacute;n y Fase Intermedia: <b>CDR Melilla</b><br />';
        $txt .= 'Promoción de permanencia: <b>CD Electromecánicas y CD San Fernando</b><br />';
        $txt .= 'Descenso a Regional: <b>Coria CF, CD Antequerano y Calavera CF</b><br />';
        break;

        case 1123:
        $txt .= 'Campe&oacute;n y Fase Intermedia: <b>Elche CF</b><br />';
        $txt .= 'Promoción de permanencia: <b>CD Almoradí y Orihuela Deportiva</b><br />';
        $txt .= 'Descenso a Regional: <b>Atlético Linares, Crevillente Deportivo y Gimnástica Abad</b><br />';
        break;

        case 1122:
        $txt .= 'Campe&oacute;n y Fase Intermedia: <b>UD Salamanca</b><br />';
        $txt .= 'Promoción de permanencia: <b>Gimnástica Alcázar y Real Ávila</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Manchego, AD Ferroviaria y AR Chamberí</b><br />';
        $txt .= 'El partido Tomelloso - Talavera, inicialmente 2-1, fue anulado y repetido en Madrid.<br />';
        break;

        case 1121:
        $txt .= 'Campe&oacute;n y Fase Intermedia: <b>Gerona CF</b><br />';
        $txt .= 'Promoción de permanencia: <b>España Industrial y UD Sans</b><br />';
        $txt .= 'Descenso a Regional: <b>Reus Deportivo, CD Tortosa y CD Granollers</b><br />';
        break;

        case 1020:
        $txt .= 'Campe&oacute;n y Fase Intermedia: <b>UD Huesca</b><br />';
        $txt .= 'Promoción de permanencia: <b>UB Conquense y CD Numancia</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Tauste, Saguntino CF y CF Belchite</b><br />';
        break;

        case 1120:
        $txt .= 'Campe&oacute;n y Fase Intermedia: <b>Club Atlético Osasuna</b><br />';
        $txt .= 'Promoción de permanencia: <b>Deportivo Alavés y SCD Durango</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Guecho, CD Izarra y Tolosa CF</b><br />';
        break;

        case 1119:
        $txt .= 'Campe&oacute;n y Fase Intermedia: <b>Real Santander</b><br />';
        $txt .= 'Promoción de permanencia: <b>CD Mirandés y Real Juvencia</b><br />';
        $txt .= 'Descenso a Regional: <b>RC Langreano, Rayo Cantabria y Santoña CF</b><br />';
        break;

        case 1118:
        $txt .= 'Campe&oacute;n y Fase Intermedia: <b>Pontevedra CF</b><br />';
        $txt .= 'Promoción de permanencia: <b>Club Santiago y Maestranza Aerea León</b><br />';
        $txt .= 'Descenso a Regional: <b>Club Lemos, Ponferradina y Betanzos</b><hr />';
        $txt .= 'Después del partido Betanzos - Arosa (2-1 inicialmente) se sanciona al primero con la pérdida del partido por alineación indebida, descontándosele además un punto de su clasificación. También se le dan por perdidos por incomparecencia los partidos: Betanzos - Maestranza Aérea, Betanzos - Ponferradina y Ponferradina - Betanzos.<br />';
        break;

        case 1117:
        $txt .= 'Campe&oacute;n: <b>Valladolid CF</b><br />';
        $txt .= 'Ascenso a Primera: <b>Valladolid CF y RC Deportivo</b><hr />';
        $txt .= 'Descenso a Tercera: <b>Mallorca y RCD Córdoba</b><hr />';
        break;

        case 1116:
        $txt .= 'Campe&oacute;n: <b>CF Barcelona</b><br />';
        $txt .= 'Descenso a Segunda: <b>Real Sociedad y Real Gijón</b><hr />';
        break;

        case 1285:
        $txt .= 'Ascenso a Segunda: <b>CD Mestalla y Badalona CF</b><br />';
        $txt .= 'Promoci&oacute;n de ascenso a Segunda: <b>Valladolid CF</b><hr />';
        $txt .= '<b>Promoción de ascenso a Segunda</b> - <i>Jugado en Oviedo. 13-07-1947</i><br /><br />';
        $txt .= 'Real Santander 1 - 3 <b>Valladolid CF</b><br /><hr /> ';
        $txt .= 'Ascenso a Segunda: <b>Valladolid CF</b><br />';
        $txt .= 'Descenso a Tercera: <b>Real Santander</b><br />';
        break;

        case 1271:
        $txt .= 'Fase Final: <b>CD Mestalla y Melilla</b><br />';
        break;

        case 1270:
        $txt .= 'Fase Final: <b>Atlético Osasuna y Badalona CF</b><br />';
        break;

        case 1269:
        $txt .= 'Fase Final: <b>Valladolid CF y UD Salamanca</b><hr />';
        $txt .= 'Cultural Leonesa y Albacete fueron excluidos de la competición por dejarse vencer el Cultural Leonesa en su partido de la jornada 11.<br />';
        break;

        case 1130:
        $txt .= 'Campe&oacute;n: <b>Melilla</b><br />';
        $txt .= 'Fase Intermedia: <b>Melilla y Cádiz CF</b><br />';
        break;

        case 1129:
        $txt .= 'Campe&oacute;n: <b>Alicante CF</b><br />';
        $txt .= 'Fase Intermedia: <b>Alicante CF y Elche CF</b><hr />';
        $txt .= 'El Gimnástica Abad se retiró de su partido en campo del Elche antes de la finalización del mismo, cuando el resultado era de 1-0. Se dio por bueno este resultado, sancionando además al Gimnástica Abad con dos puntos.<br />';
        break;

        case 1128:
        $txt .= 'Campe&oacute;n: <b>Recreativo de Huelva</b><br />';
        $txt .= 'Fase Intermedia: <b>Recreativo de Huelva y Olímpica Jienense</b><hr />';
        $txt .= 'Por incomparecencia del Lucena a jugar con el Calavera en campo de este, se le da por perdido el partido, descontándosele además dos puntos de su clasificación.<br />';
        $txt .= 'Por incomparecencia del Atlético Linares a jugar con el Lucena en campo de este, se le da por perdido el partido, descontándosele además dos puntos de su clasificación.<br />';
        break;

        case 1137:
        $txt .= 'Campe&oacute;n: <b>CD Segarra</b><br />';
        $txt .= 'Fase Intermedia: <b>CD Segarra y CD Mestalla</b><br />';
        break;

        case 1136:
        $txt .= 'Campe&oacute;n: <b>Albacete Balompié</b><br />';
        $txt .= 'Fase Intermedia: <b>Albacete Balompié y Tomelloso</b><hr />';
        $txt .= 'El partido Gim. Alcázar - Toledo, inicialmente 1-1, se da por perdido al primero, por incidentes del público.<br />';
        break;

        case 1135:
        $txt .= 'Campe&oacute;n: <b>Valladolid CF</b><br />';
        $txt .= 'Fase Intermedia: <b>Valladolid CF y UD Salamanca</b><br />';
        break;

        case 1134:
        $txt .= 'Campe&oacute;n: <b>Badalona CF</b><br />';
        $txt .= 'Fase Intermedia: <b>Badalona CF y CD Júpiter</b><br />';
        break;

        case 1019:
        $txt .= 'Campe&oacute;n: <b>Atlético Zaragoza</b><br />';
        $txt .= 'Fase Intermedia: <b>Atlético Zaragoza y Arenas CD</b><hr />';
        $txt .= 'El partido Mequinenza - Lérida, inicialmente 2-1, se da por perdido al primero por alineación indebida, descontándosele además un punto de la clasificación.<br />';
        break;

        case 1133:
        $txt .= 'Campe&oacute;n: <b>Gim. Burgalesa</b><br />';
        $txt .= 'Fase Intermedia: <b>Gim. Burgalesa y Atlético Osasuna</b><br />';
        break;

        case 1132:
        $txt .= 'Campe&oacute;n: <b>Arenas de Guecho</b><br />';
        $txt .= 'Fase Intermedia: <b>Arenas de Guecho y Indautxu</b><br />';
        break;

        case 1131:
        $txt .= 'Campe&oacute;n: <b>FN Palencia</b><br />';
        $txt .= 'Fase Intermedia: <b>FN Palencia y Cultural Leonesa</b><br />';
        break;

        case 1127:
        $txt .= 'Campe&oacute;n: <b>Pontevedra CF</b><br />';
        $txt .= 'Fase Intermedia: <b>Pontevedra CF  y SG Lucense</b><hr />';
        $txt .= 'Por irregularidades en el partido Berbés - Orensana, se descuentan a la Orensana 4 puntos y al Berbés 5</b><br />';
        break;

        case 1126:
        $txt .= 'Campe&oacute;n: <b>CD Alcoyano</b><br />';
        $txt .= 'Ascenso a Primera: <b>CD Alcoyano y Gimnástico de Tarragona</b><br />';
        $txt .= 'Promoci&oacute;n de ascenso a Primera: <b>Real Sociedad</b><br />';
        $txt .= 'Promoci&oacute;n de descenso a Tercera: <b>Real Santander</b><br />';
        $txt .= 'Descenso a Tercera: <b>Real Zaragoza y Real Betis</b><hr />';
        $txt .= '<b>Promoción de ascenso a Primera</b> - <i>Jugado en Madrid. 8-06-1947</i><br /><br />';
        $txt .= 'Murcia CF 0 - 2 <b>Real Sociedad</b><br /><br /> ';
        $txt .= 'Asciende a Primera: <b>Real Sociedad</b><hr />';
        $txt .= 'Desciende a Segunda: <b>Murcia CF</b><hr />';
        break;

        case 1125:
        $txt .= 'Campe&oacute;n: <b>Valencia CF</b><br />';
        $txt .= 'Promoci&oacute;n de descenso a Segunda: <b>Murcia CF</b><br />';
        $txt .= 'Descenso a Segunda: <b>RC Deportivo y CD Castellón </b><hr />';
        $txt .= '<b>Promoción de ascenso a Primera</b> - <i>Jugado en Madrid. 8-06-1947</i><br /><br />';
        $txt .= 'Murcia CF 0 - 2 <b>Real Sociedad</b><br /><br /> ';
        $txt .= 'Asciende a Primera: <b>Real Sociedad</b><hr />';
        $txt .= 'Desciende a Segunda: <b>Murcia CF</b><hr />';
        break;

        case 1268:
        $txt .= 'Permanencia en Tercera: <b>Gimnástica Segoviana</b><br />';
        $txt .= 'Ascenso a Tercera: <b>Juvenil Coruña, Caudal Deportivo, Cultural Durango, Belchite CF, Igualada CF, Segarra, Orihuela Deportiva, Electromecánicas y Atlético Tetuán</b><br />';
        $txt .= 'Descenso a Regional: <b>Club Galicia, Real Juvencia, Real Unión, CD Borja, UD Lérida, UD Teruel, Crevillente CF, SD Emeritense y Algeciras</b><br />';
        break;

        case 1267:
        $txt .= 'Ascenso a Segunda: <b>CD Málaga y Levante UD</b><br />';
        $txt .= 'Promoci&oacute;n de ascenso a Segunda: <b>CD Baracaldo</b><hr />';
        $txt .= '<b>Promoción de ascenso a Segunda</b> - <i>Jugado en Madrid. 29-06-1946</i><br /><br />';
        $txt .= 'Xerez 0 - 2 <b>CD Baracaldo</b> (prórroga)<br /><hr /> ';
        $txt .= 'Ascenso a Segunda: <b>CD Baracaldo</b><br />';
        $txt .= 'Descenso a Tercera: <b>Xerez</b><br />';
        break;

        case 1266:
        $txt .= 'Fase Final: <b>CD Málaga</b><br />';
        break;

        case 1265:
        $txt .= 'Fase Final: <b>Levante UD</b><br />';
        break;

        case 1264:
        $txt .= 'Fase Final: <b>Arenas SD</b><br />';
        break;

        case 1263:
        $txt .= 'Fase Final: <b>CD Baracaldo</b><br />';
        break;

        case 1262:
        $txt .= 'Fase Final: <b>Real Valladolid </b><br />';
        break;

        case 1141:
        $txt .= 'Campe&oacute;n: <b>CD Málaga </b><br />';
        $txt .= 'Fase Intermedia: <b>CD Málaga, Olímpica Jiennense  y CDR Melilla</b><br />';
        $txt .= 'Promoci&oacute;n descenso a Regional: <b>Algeciras CF</b><br />';
        break;

        case 1148:
        $txt .= 'Campe&oacute;n: <b>CD Badajoz</b><br />';
        $txt .= 'Fase Intermedia: <b>CD Badajoz, CP Cacereño  y CD Toledo</b><br />';
        $txt .= 'Promoci&oacute;n descenso a Regional: <b>SD Emeritense</b><br />';
        break;

        case 1147:
        $txt .= 'Campe&oacute;n: <b>Real Valladolid </b><br />';
        $txt .= 'Fase Intermedia: <b>Real Valladolid, Imperio CF  y Cultural Leonesa </b><br />';
        $txt .= 'Promoci&oacute;n descenso a Regional: <b>Gimnástica Segoviana</b><br />';
        break;

        case 1146:
        $txt .= 'Campe&oacute;n: <b>Albacete Balompié </b><br />';
        $txt .= 'Fase Intermedia: <b>Albacete Balompié, Elche CF  y CD Almansa </b><br />';
        $txt .= 'Promoci&oacute;n descenso a Regional: <b>Crevillente CF</b><br />';
        break;

        case 1145:
        $txt .= 'Campe&oacute;n: <b>Levante UD</b><br />';
        $txt .= 'Fase Intermedia: <b>Levante UD, CD Constancia  y Atlético Baleares </b><br />';
        $txt .= 'Promoci&oacute;n descenso a Regional: <b>UD Teruel</b><br />';
        break;

        case 1144:
        $txt .= 'Campe&oacute;n: <b>CF Badalona</b><br />';
        $txt .= 'Fase Intermedia: <b>CF Badalona, CD Jupiter  y Reus Deportivo </b><br />';
        $txt .= 'Promoci&oacute;n descenso a Regional: <b>UD Lérida</b><br />';
        break;

        case 1143:
        $txt .= 'Campe&oacute;n: <b>Arenas SD</b><br />';
        $txt .= 'Fase Intermedia: <b>Arenas SD, CD Logroñés  y Maestranza Aérea </b><br />';
        $txt .= 'Promoci&oacute;n descenso a Regional: <b>CD Borja</b><br />';
        break;

        case 1018:
        $txt .= 'Campe&oacute;n: <b>Arenas de Guecho</b><br />';
        $txt .= 'Fase Intermedia: <b>Arenas de Guecho, Club Sestao y CD Baracaldo </b><br />';
        $txt .= 'Promoci&oacute;n descenso a Regional: <b>Unión Club</b><br />';
        break;

        case 1142:
        $txt .= 'Campe&oacute;n: <b>Círculo Popular </b><br />';
        $txt .= 'Fase Intermedia: <b>Círculo Popular, RSG Torrelavega y CD Tánagra </b><br />';
        $txt .= 'Promoci&oacute;n descenso a Regional: <b>Real Juvencia</b><br />';
        break;

        case 1140:
        $txt .= 'Campe&oacute;n: <b>UD Orensana</b><br />';
        $txt .= 'Fase Intermedia: <b>UD Orensana, SD Ponferradina y Pontevedra CF</b><br />';
        $txt .= 'Promoci&oacute;n descenso a Regional: <b>Club Galicia</b><br />';
        break;

        case 1139:
        $txt .= 'Campe&oacute;n: <b>CD Sabadell CF</b><br />';
        $txt .= 'Ascenso a Primera: <b>CD Sabadell CF y RC Deportivo</b><br />';
        $txt .= 'Promoci&oacute;n de ascenso a Primera: <b>Gimnástico de Tarragona</b><br />';
        $txt .= 'Promoci&oacute;n de descenso a Tercera: <b>Jerez</b><br />';
        $txt .= 'Descenso a Tercera: <b>UD Salamanca y SD Ceuta</b><hr />';
        $txt .= '<b>Promoción de ascenso a Primera</b> - <i>Jugado en Madrid. 19-05-1946</i><br /><br />';
        $txt .= 'RCD Español 0 - 0 Gimnástico de Tarragona<br /><br /> ';
        $txt .= '<b>Desempate</b> - <i>Jugado en Barcelona. 26-05-1946</i><br /><br />';
        $txt .= '<b>RCD Español</b> 3 - 0 Gimnástico de Tarragona<br /><br /> ';
        $txt .= 'Permanece en Primera: <b>RCD Español</b><hr />';
        $txt .= '<b>Promoción de ascenso a Segunda</b> - <i>Jugado en Madrid. 29-06-1946</i><br /><br />';
        $txt .= 'Xerez 0 - 2 <b>CD Baracaldo</b> (prórroga)<br /><hr /> ';
        $txt .= 'Ascenso a Segunda: <b>CD Baracaldo</b><br />';
        $txt .= 'Descenso a Tercera: <b>Xerez</b><br />';
        break;

        case 1138:
        $txt .= 'Campe&oacute;n: <b>Sevilla CF</b><br />';
        $txt .= 'Promoci&oacute;n de descenso a Segunda: <b>RCD Español</b><br />';
        $txt .= 'Descenso a Segunda: <b>CD Alcoyano y Hércules CF </b><hr />';
        $txt .= '<b>Promoción de ascenso a Primera</b> - <i>Jugado en Madrid. 19-05-1946</i><br /><br />';
        $txt .= 'RCD Español 0 - 0 Gimnástico de Tarragona<br /><br /> ';
        $txt .= '<b>Desempate</b> - <i>Jugado en Barcelona. 26-05-1946</i><br /><br />';
        $txt .= '<b>RCD Español</b> 3 - 0 Gimnástico de Tarragona<br /><br /> ';
        $txt .= 'Permanece en Primera: <b>RCD Español</b><hr />';
        break;

        case 1261:
        $txt .= 'Exento: <b>Tomelloso</b><br />';
        $txt .= 'Permanencia en Tercera: <b>Betanzos, Club Langreano, Real Ávila y Gimnástica Abad</b><br />';
        $txt .= 'Ascenso a Tercera: <b>Guecho, Borja, Sans, Larache y Tomelloso</b><br />';
        $txt .= 'Descenso a Regional: <b>Cultural Durango, Izarra y Atlético Tetuán</b><br />';
        break;

        case 1260:
        $txt .= 'Ascenso a Segunda: <b>Gimnástico de Tarragona y UD Salamanca</b><br />';
        $txt .= 'Promoci&oacute;n de ascenso a Segunda: <b>RCD Córdoba</b><hr />';
        $txt .= '<b>Promoción de ascenso a Segunda</b> - <i>Jugado en Madrid. 24-06-1945</i><br /><br />';
        $txt .= 'CD Constancia 2 - 3 <b>RCD Córdoba</b><br /><hr /> ';
        $txt .= 'Ascenso a Segunda: <b>RCD Córdoba</b><br />';
        $txt .= 'Descenso a Tercera: <b>CD Constancia</b><br />';
        break;

        case 1259:
        $txt .= 'Fase Final: <b>RCD Córdoba</b><br />';
        break;

        case 1258:
        $txt .= 'Fase Final: <b>Gimnástico de Tarragona</b><br />';
        break;

        case 1257:
        $txt .= 'Fase Final: <b>UD Salamanca</b><br />';
        break;

        case 1158:
        $txt .= 'Campe&oacute;n: <b>RCD Córdoba</b><br />';
        $txt .= 'Fase Intermedia: <b>RCD Córdoba y CD Málaga</b><br />';
        $txt .= 'Promoci&oacute;n descenso a Regional: <b>Atlético Tetuán</b><br />';
        break;

        case 1157:
        $txt .= 'Campe&oacute;n: <b>Elche CF</b><br />';
        $txt .= 'Fase Intermedia: <b>Elche CF y CD Almansa</b><br />';
        $txt .= 'Promoci&oacute;n descenso a Regional: <b>CD Gimnástica Abad</b><br />';
        break;

        case 1156:
        $txt .= 'Campe&oacute;n: <b>CD Badajoz</b><br />';
        $txt .= 'Fase Intermedia: <b>CD Badajoz y CD Cifesa</b><br />';
        $txt .= 'Excluido y desciende a regional: <b>CF Trujillo</b><hr />';
        $txt .= 'El partido Toledo-Trujillo de la jornada 16 no se disputó por incomparecencia del Trujillo. Se le da el partido por ganado al Toledo y se le imponen 2 puntos de sanción al Trujillo. El Trujillo posteriormente será excluido de la competición y no disputará la promoción de permanencia, ascendiendo directamente el Tomelloso.<br />';
        break;

        case 1155:
        $txt .= 'Campe&oacute;n: <b>UD Salamanca</b><br />';
        $txt .= 'Fase Intermedia: <b>UD Salamanca y GD Burgalesa</b><br />';
        $txt .= 'Promoci&oacute;n descenso a Regional: <b>Real Avila</b><br />';
        break;

        case 1154:
        $txt .= 'Campe&oacute;n: <b>Gimnástico de Tarragona</b><br />';
        $txt .= 'Fase Intermedia: <b>Gimnástico de Tarragona y Levante UD</b><br />';
        $txt .= 'Al finalizar la temporada, los equipos no clasificados para la fase intermedia y otros de Regional, jugaron un torneo de clasificación a Tercera División.<br />';
        break;

        case 1153:
        $txt .= 'Campe&oacute;n: <b>Arenas SD</b><br />';
        $txt .= 'Fase Intermedia: <b>Arenas SD y Atlético Osasuna</b><br />';
        $txt .= 'Promoci&oacute;n descenso a Regional: <b>CD Izarra</b><br />';
        break;

        case 1017:
        $txt .= 'Campe&oacute;n: <b>Club Erandio</b><br />';
        $txt .= 'Fase Intermedia: <b>Club Erandio y Arenas de Guecho</b><br />';
        $txt .= 'Promoci&oacute;n descenso a Regional: <b>SCD Durango</b><br />';
        $txt .= 'La SCD Durango fué sancionado con dos puntos por incomparecencia ante el Arenas de Guecho en su propio campo.<br />';
        break;

        case 1152:
        $txt .= 'Campe&oacute;n: <b>Real Avilés</b><br />';
        $txt .= 'Fase Intermedia: <b>Real Avilés y Barreda</b><br />';
        $txt .= 'Promoci&oacute;n descenso a Regional: <b>Club Langreano</b><br />';
        break;

        case 1151:
        $txt .= 'Campe&oacute;n: <b>SG Lucense</b><br />';
        $txt .= 'Fase Intermedia: <b>SG Lucense y UD Orensana</b><br />';
        $txt .= 'Promoci&oacute;n descenso a Regional: <b>Betanzos</b><br />';
        break;

        case 1150:
        $txt .= 'Campe&oacute;n: <b>CD Alcoyano</b><br />';
        $txt .= 'Ascenso a Primera: <b>CD Alcoyano y Hércules CF</b><br />';
        $txt .= 'Promoci&oacute;n de ascenso a Primera: <b>RC Celta</b><br />';
        $txt .= 'Promoci&oacute;n de descenso a Tercera: <b>CD Constancia</b><br />';
        $txt .= 'Descenso a Tercera: <b>Cultural Leonesa y Baracaldo CF</b><hr />';
        $txt .= '<b>Promoción de ascenso a Primera</b> - <i>Jugado en Madrid. 17-06-1945</i><br /><br />';
        $txt .= '<b>RC Celta</b> 4 - 1 Granada CF<br /><hr /> ';
        $txt .= 'Ascenso a Primera: <b>RC Celta</b><br />';
        $txt .= 'Descenso a Segunda: <b>Granada CF</b><hr />';
        $txt .= '<b>Promoción de ascenso a Segunda</b> - <i>Jugado en Madrid. 24-06-1945</i><br /><br />';
        $txt .= 'CD Constancia 2 - 3 <b>RCD Córdoba</b><br /><hr /> ';
        $txt .= 'Ascenso a Segunda: <b>RCD Córdoba</b><br />';
        $txt .= 'Descenso a Tercera: <b>CD Constancia</b><hr />';
        break;

        case 1149:
        $txt .= 'Campe&oacute;n: <b>CF Barcelona</b><br />';
        $txt .= 'Promoci&oacute;n de descenso a Segunda: <b>Granada CF</b><br />';
        $txt .= 'Descenso a Segunda: <b>CE Sabadell FC y RC Deportivo</b><hr />';
        $txt .= '<b>Promoción de ascenso a Primera</b> - <i>Jugado en Madrid. 17-06-1945</i><br /><br />';
        $txt .= '<b>RC Celta</b> 4 - 1 Granada CF<br /><hr /> ';
        $txt .= 'Ascenso a Primera: <b>RC Celta</b><br />';
        $txt .= 'Descenso a Segunda: <b>Granada CF</b><br />';
        break;

        case 1256:
        $txt .= 'Permanencia en Tercera: <b>SD Ponferradina y Deportivo Tanagra.</b><br />';
        $txt .= 'Ascenso a Tercera: <b>CD Maestranza Aérea, CD Júpiter, UD Malvarrosa, CD Mediodía, CD Gimnástica Abad y UD Melilla.</b><br />';
        $txt .= 'Descenso a Regional: <b>Real Unión Club, UD Figueras, SD Emeritense, Lorca CF, Hércules de Cádiz CF y Torrente CF.</b><br />';
        $txt .= '<hr />Finalizada la temporada, se aumentó la Tercera División y se anularon los descensos, ascendiéndose también a todos los campeones de Regional. La excepción fue el Grupo V Valencia, del que descendieron todos los equipos excepto el Levante, no ascendiendo tampoco el Malvarrosa.<hr />';
        break;

        case 1234:
        $txt .= 'Ascenso a Segunda: <b>CD Mallorca</b><br />';
        $txt .= 'Promoci&oacute;n de ascenso a Segunda: <b>Levante UD</b><hr />';
        $txt .= '<b>Promoción permanencia en Segunda</b><br /><br />';
        $txt .= '<i>Jugado en Madrid. 19-04-1944</i><br /><br />';
        $txt .= '<b>Baracaldo CF</b> 3 - 2  Levante UD<br /><br /> ';
        $txt .= '<i>Jugado en Madrid. 23-04-1944</i><br /><br />';
        $txt .= 'Arenas de Guecho  0 - 1  <b>Club Ferrol</b><br /><hr /> ';
        $txt .= 'Permanencia en Segunda: <b>Baracaldo CF</b><br />';
        $txt .= 'Ascenso a Segunda: <b>Club Ferrol</b><br />';
        $txt .= 'Descenso a Tercera: <b>Arenas de Guecho</b><br />';
        break;

        case 1233:
        $txt .= 'Ascenso a Segunda: <b>Real Santander</b><br />';
        $txt .= 'Promoci&oacute;n de ascenso a Segunda: <b>Club Ferrol</b><hr />';
        $txt .= '<b>Promoción permanencia en Segunda</b><br /><br />';
        $txt .= '<i>Jugado en Madrid. 19-04-1944</i><br /><br />';
        $txt .= '<b>Baracaldo CF</b> 3 - 2  Levante UD<br /><br /> ';
        $txt .= '<i>Jugado en Madrid. 23-04-1944</i><br /><br />';
        $txt .= 'Arenas de Guecho  0 - 1  <b>Club Ferrol</b><br /><hr /> ';
        $txt .= 'Permanencia en Segunda: <b>Baracaldo CF</b><br />';
        $txt .= 'Ascenso a Segunda: <b>Club Ferrol</b><br />';
        $txt .= 'Descenso a Tercera: <b>Arenas de Guecho</b><br />';
        break;

        case 1167:
        $txt .= 'Campe&oacute;n y Fase Final: <b>CD Málaga</b><br />';
        $txt .= 'Promoci&oacute;n descenso a Regional: <b>Hércules de Cádiz</b><br />';
        break;

        case 1166:
        $txt .= 'Campe&oacute;n y Fase Final: <b>Elche CF</b><br />';
        $txt .= 'Promoci&oacute;n descenso a Regional: <b>Lorca CF</b><br />';
        break;

        case 1165:
        $txt .= 'Campe&oacute;n y Fase Final: <b>CP Cacereño</b><br />';
        $txt .= 'Promoci&oacute;n descenso a Regional: <b>SD Emeritense</b><br />';
        break;

        case 1015:
        $txt .= 'Promoci&oacute;n a Fase Final: <b>Levante UD</b><br />';
        $txt .= 'Promoci&oacute;n descenso a Regional: <b>Torrente</b><hr />';
        $txt .= '<b>Tercera División Grupo 5 - FINAL</b><br /><br />';
        $txt .= '<i>30-01-1944</i><br /><br />';
        $txt .= 'Atlético Zaragoza 0 - 1  Levante UD<br /><br /> ';
        $txt .= '<i>06-02-1944</i><br /><br />';
        $txt .= 'Levante UD  4 - 0  Atlético Zaragoza<br /><hr /> ';
        $txt .= 'Campe&oacute;n y Fase Final: <b>Levante UD</b><br />';
        break;

        case 1164:
        $txt .= 'Promoci&oacute;n a Fase Final: <b>Atlético Zaragoza</b><hr />';
        $txt .= '<b>Tercera División Grupo 5 - FINAL</b><br /><br />';
        $txt .= '<i>30-01-1944</i><br /><br />';
        $txt .= 'Atlético Zaragoza 0 - 1  Levante UD<br /><br /> ';
        $txt .= '<i>06-02-1944</i><br /><br />';
        $txt .= 'Levante UD  4 - 0  Atlético Zaragoza<br /><hr /> ';
        $txt .= 'Campe&oacute;n y Fase Final: <b>Levante UD</b><br />';
        break;

        case 1163:
        $txt .= 'Campe&oacute;n y Fase Final: <b>CD Mallorca</b><br />';
        $txt .= 'Promoci&oacute;n descenso a Regional: <b>UD Figueras</b><br />';
        break;

        case 1162:
        $txt .= 'Campe&oacute;n y Fase Final: <b>CD Logroñés</b><br />';
        $txt .= 'Promoci&oacute;n descenso a Regional: <b>Real Unión</b><br />';
        break;

        case 1016:
        $txt .= 'Campe&oacute;n y Fase Final: <b>Real Santander</b><br />';
        $txt .= 'Promoci&oacute;n descenso a Regional: <b>CD Tánagra</b><br />';
        break;

        case 1161:
        $txt .= 'Campe&oacute;n y Fase Final: <b>Club Ferrol</b><br />';
        $txt .= 'Promoci&oacute;n descenso a Regional: <b>SD Ponferradina</b><br />';
        break;

        case 1160:
        $txt .= 'Campe&oacute;n: <b>Real Gijon</b><br />';
        $txt .= 'Ascenso a Primera: <b>Real Gijon y Real Murcia CF</b><br />';
        $txt .= 'Promoci&oacute;n de ascenso a Primera: <b>CD Alcoyano y CD Constancia</b><br />';
        $txt .= 'Descenso a Tercera: <b>Real Valladolid y Atlético Osasuna</b><hr />';
        $txt .= '<b>Promoci&oacute;n de ascenso o permanencia</b><br /><br />';
        $txt .= '<i>Jugado en Barcelona, 16-04-1944</i><br /><br />';
        $txt .= '<b>RCD Espa&ntilde;ol</b> 7 - 1  CD Alcoyano<br /><br /> ';
        $txt .= '<i>Jugado en Madrid, 16-04-1944</i><br /><br />';
        $txt .= '<b>RC Deportivo</b>  4 - 0  CD Constancia<br /><hr /> ';
        $txt .= 'Permanecen en Primera: <b>RCD Espa&ntilde;ol y RC Deportivo</b><br />';
        break;

        case 1159:
        $txt .= 'Campe&oacute;n: <b>Valencia CF</b><br />';
        $txt .= 'Promoci&oacute;n de descenso a Segunda: <b>RCD Espa&ntilde;ol y RC Deportivo</b><br />';
        $txt .= 'Descenso a Segunda: <b>Real Sociedad de F&uacute;tbol y RC Celta</b><hr />';
        break;

        case 1254:
        $txt .= 'Permanece en Segunda: <b>Baracaldo CF</b><br />';
        break;

        case 1255:
        $txt .= 'Permanece en Segunda: <b>CD Alcoyano</b><br />';
        break;

        case 1253:
        $txt .= 'Fase Final: <b>CD M&aacute;laga</b><br />';
        $txt .= 'En este grupo particip&oacute; tambi&eacute;n el Real Murcia CF, sólo a efectos de clasificaci&oacute;n para la Copa, que no consigui&oacute;.<br />';
        break;

        case 1252:
        $txt .= 'Fase Final: <b>Levante UD</b><br />';
        $txt .= 'En este grupo particip&oacute; tambi&eacute;n el H&eacute;rcules, sólo a efectos de clasificaci&oacute;n para la Copa, que si consigui&oacute;.<br />';
        break;

        case 1251:
        $txt .= 'Fase Final: <b>CD Alcoyano</b><br />';
        $txt .= 'En este grupo particip&oacute; tambi&eacute;n el CD Constancia, sólo a efectos de clasificaci&oacute;n para la Copa, que si consigui&oacute;.<br />';
        break;

        case 1250:
        $txt .= 'Fase Final: <b>Deportivo Alav&eacute;s</b><br />';
        $txt .= 'En este grupo particip&oacute; tambi&eacute;n el Atl&eacute;tico Osasuna, sólo a efectos de clasificaci&oacute;n para la Copa, que si consigui&oacute;.<br />';
        break;

        case 1249:
        $txt .= 'Fase Final: <b>Baracaldo CF</b><br />';
        $txt .= 'En este grupo particip&oacute; tambi&eacute;n el Arenas de Guecho, sólo a efectos de clasificaci&oacute;n para la Copa, que si consigui&oacute;.<br />';
        break;

        case 1248:
        $txt .= 'Fase Final: <b>UD Salamanca</b><br />';
        $txt .= 'En este grupo particip&oacute; tambi&eacute;n la Cultural Leonesa, sólo a efectos de clasificaci&oacute;n para la Copa, que no consigui&oacute;.<br />';
        break;

        case 1247:
        $txt .= 'Campe&oacute;n: <b>CE Sabadell FC</b><br />';
        $txt .= 'Ascenso a Primera: <b>CE Sabadell FC y Real Sociedad de F&uacute;tbol</b><br />';
        $txt .= 'Promoci&oacute;n de ascenso a Primera: <b>Real Valladolid CF y Real Gij&oacute;n</b><hr />';
        $txt .= '<b>Promoci&oacute;n de ascenso o permanencia</b><br /><br />';
        $txt .= '<i>Jugado en Madrid, 18-04-1943</i><br /><br />';
        $txt .= '<b>RCD Espa&ntilde;ol</b> 2 - 1  Real Gij&oacute;n<br /><br /> ';
        $txt .= '<i>Jugado en Barcelona, 18-04-1943</i><br /><br />';
        $txt .= '<b>Granada CF</b>  2 - 0  Real Valladolid CF<br /><hr /> ';
        $txt .= 'Permanecen en Primera: <b>RCD Espa&ntilde;ol y Granada CF</b><br />';
        break;

        case 1171:
        $txt .= 'Fase Final: <b>SD Ceuta y Xerez CF</b><br />';
        $txt .= 'Promoci&oacute;n para participar en la Copa del General&iacute;simo: <b>Real Murcia CF y Club H&eacute;rcules</b><br />';
        $txt .= 'Promoci&oacute;n de descenso a Tercera: <b>CD M&aacute;laga, Elche CF, C&aacute;diz CF y CD Alcoyano.</b><br />';
        break;

        case 1170:
        $txt .= 'Fase Final: <b>Real Sociedad de F&uacute;tbol y CE Sabadell FC</b><br />';
        $txt .= 'Promoci&oacute;n para participar en la Copa del General&iacute;simo: <b>CD Constancia y Club Atl&eacute;tico Osasuna</b><br />';
        $txt .= 'Promoci&oacute;n de descenso a Tercera: <b>Tarrasa CF, Gerona CF, AD Ferroviaria y Deportivo Alav&eacute;s.</b><br />';
        break;

        case 1169:
        $txt .= 'Fase Final: <b>Real Gijón  y Real Valladolid CF</b><br />';
        $txt .= 'Promoci&oacute;n para participar en la Copa del General&iacute;simo: <b>Cultural Leonesa y Arenas de Guecho</b><br />';
        $txt .= 'Promoci&oacute;n de descenso a Tercera: <b>Baracaldo CF, Racing Club Ferrol, Real Santander y UD Salamanca.</b><br />';
        break;

        case 1168:
        $txt .= 'Campe&oacute;n: <b>Atl&eacute;ntico de Bilbao</b><br />';
        $txt .= 'Promoci&oacute;n de descenso a Segunda: <b>RCD Espa&ntilde;ol y Granada CF</b><br />';
        $txt .= 'Descenso a Segunda: <b>Real Zaragoza y Real Betis Balompi&eacute;n</b><hr />';
        break;

        case 1246:
        $txt .= 'El Xerez CF se salva al quedar por delante de los tres equipos de Regional.<br />';
        $txt .= 'El Recrecreativo &Oacute;nuba, primer clasificado de este grupo procedente de Regional, no ascendi&oacute; a Segunda por obtener peor clasificaci&oacute;n que el CD Alcoyano, del Grupo V.';
        break;

        case 1245:
        $txt .= 'Asciende a Segunda: <b>CD Alcoyano</b><br />';
        break;

        case 1244:
        $txt .= 'Asciende a Segunda: <b>Tarrasa</b><br />';
        break;

        case 1243:
        $txt .= 'El AD Ferroviaria se salva al quedar por delante de los tres equipos de Regional.<br />';
        $txt .= 'El Imperio Madrid, primer clasificado de este grupo procedente de Regional, no ascendi&oacute; a Segunda por obtener peor clasificaci&oacute;n que el Tarrasa, del Grupo IV.';
        break;

        case 1242:
        $txt .= 'El Arenas de Guecho se salva al quedar por delante de los tres equipos de Regional.<br />';
        $txt .= 'El CD Logroñes, primer clasificado de este grupo procedente de Regional, no ascendió a Segunda por obtener peor clasificación que la Cultural Leonesa, del Grupo I.';
        break;

        case 1241:
        $txt .= 'Asciende a Segunda: <b>Cultural Leonesa</b><br />';
        break;

        case 1238:
        $txt .= 'Campe&oacute;n: <b>Real Betis Balompié</b><br />';
        $txt .= 'Ascenso a Primera: <b>Real Betis Balompié y Real Zaragoza</b><br />';
        $txt .= 'Promoci&oacute;n de ascenso a Primera: <b>Real Murcia CF y CE Sabadell FC</b><hr />';
        $txt .= '<b>Promoci&oacute;n de ascenso o permanencia</b><br /><br />';
        $txt .= '<i>Jugado en Madrid, 04-06-1942</i><br /><br />';
        $txt .= '<b>Real Oviedo</b> 3 - 1  CE Sabadell FC<br /><br /> ';
        $txt .= '<i>Jugado en Madrid, 28-06-1942</i><br /><br />';
        $txt .= '<b>Barcelona CF</b>  5 - 1  Real Murcia<br /><hr /> ';
        $txt .= 'Permanecen en Primera: <b>Real Oviedo y Barcelona CF</b><br />';
        break;

        case 1175:
        $txt .= 'Fase Final: <b>Real Betis Balompié  y Real Murcia CF</b><br />';
        $txt .= 'Promoci&oacute;n de descenso: <b>Xerez CF</b><br />';
        $txt .= 'Descenso a Regional: <b>Cartagena CF</b><br />';
        break;

        case 1174:
        $txt .= 'Fase Final: <b>CE Sabadell  y Real Zaragoza</b><br />';
        $txt .= 'Promoci&oacute;n de descenso: <b>AD Ferroviaria</b><br />';
        $txt .= 'Descenso a Regional: <b>Levante UD</b><br />';
        break;

        case 1173:
        $txt .= 'Fase Final: <b>Real Gij&oacute;n y UD Salamanca</b><br />';
        $txt .= 'Promoci&oacute;n de descenso: <b>Arenas de Guecho</b><br />';
        $txt .= 'Descenso a Regional: <b>Real Uni&oacute;n Club</b><br />';
        break;

        case 1172:
        $txt .= 'Campe&oacute;n: <b>Valencia CF</b><br />';
        $txt .= 'Promoci&oacute;n de descenso a Segunda: <b>Real Oviedo y Barcelona CF</b><hr />';
        $txt .= 'Descenso a Segunda: <b>Alicante CD y Real Sociedad de F&uacute;tbol </b><hr />';
        break;

        case 1237:
        $txt .= 'Campe&oacute;n: <b>CD Constancia</b><br />';
        $txt .= 'Ascenso a Segunda: <b>CD Constancia y SD Ceuta</b><br />';
        $txt .= 'Promoci&oacute;n de ascenso a Segunda: <b>Elche CF</b><hr />';
        $txt .= '<b>Promoci&oacute;n de ascenso o permanencia</b><br /><br />';
        $txt .= '<i>Jugado en Santander, 04-05-1941</i><br /><br />';
        $txt .= 'Baracaldo FC  4 - 3  RC Langreano<br /><br /> ';
        $txt .= '<i>Jugado en Madrid, 15-05-1941</i><br /><br />';
        $txt .= 'Elche CF  1 - 0  RCD C&oacute;rdoba<br /><hr /> ';
        $txt .= 'Asciende a Segunda: <b>Elche CF</b><br />';
        $txt .= 'Desciende a Tercera: <b>RCD C&oacute;rdoba</b><br />';
        break;

        case 1236:
        $txt .= 'Campe&oacute;n: <b>Deportivo Alav&eacute;s</b><br />';
        $txt .= 'Ascenso a Segunda: <b>Deportivo Alav&eacute;s y AD Ferroviaria</b><br />';
        $txt .= 'Promoci&oacute;n de ascenso a Segunda: <b>RC Langreano</b><hr />';
        $txt .= '<b>Promoci&oacute;n de ascenso o permanencia</b><br /><br />';
        $txt .= '<i>Jugado en Santander, 04-05-1941</i><br /><br />';
        $txt .= 'Baracaldo FC  4 - 3  RC Langreano<br /><br /> ';
        $txt .= '<i>Jugado en Madrid, 15-05-1941</i><br /><br />';
        $txt .= 'Elche CF  1 - 0  RCD C&oacute;rdoba<br /><hr /> ';
        $txt .= 'Asciende a Segunda: <b>Elche CF</b><br />';
        $txt .= 'Desciende a Tercera: <b>RCD C&oacute;rdoba</b><br />';
        break;

        case 1014:
        $txt .= 'Fase Final: <b>SD Ceuta</b><br />';
        break;

        case 1013:
        $txt .= 'Fase Final: <b>Elche CF</b><br />';
        break;

        case 1012:
        $txt .= 'Fase Final: <b>CD Constancia</b><br />';
        break;

        case 1011:
        $txt .= 'Fase Final: <b>AD Ferroviaria</b><br />';
        break;

        case 1010:
        $txt .= 'Fase Final: <b>Deportivo Alavés</b><br />';
        break;

        case 1179:
        $txt .= 'Fase Final: <b>RC Langreano</b><br />';
        break;

        case 1235:
        $txt .= 'Campe&oacute;n: <b>Granada CF</b><br />';
        $txt .= 'Ascenso a Primera: <b>Granada CF y Real Sociedad de F&uacute;tbol</b><br />';
        $txt .= 'Promoci&oacute;n de ascenso a Primera: <b>RC Deportivo y CD Castell&oacute;n</b><hr />';
        $txt .= '<b>Promoci&oacute;n de ascenso o permanencia</b><br /><br />';
        $txt .= '<i>Jugado en Madrid, 02-05-1941</i><br /><br />';
        $txt .= 'CD Castell&oacute;n  3 - 2  Real Zaragoza<br /><br /> ';
        $txt .= '<i>Jugado en Madrid, 04-05-1941</i><br /><br />';
        $txt .= 'RC Deportivo  1 - 0  Murcia CF<br /><hr /> ';
        $txt .= 'Ascienden a Primera: <b>CD Castell&oacute;n y RC Deportivo</b><br />';
        $txt .= 'Descienden a Segunda: <b>Real Zaragoza y Murcia CF</b><br />';
        break;

        case 1178:
        $txt .= 'Fase Final: <b>CD Castell&oacute;n y Granada CF</b><br />';
        $txt .= 'Promoci&oacute;n de descenso: <b>RCD C&oacute;rdoba</b><br />';
        $txt .= 'Descenso a Regional: <b>CF Badalona</b><br />';
        break;

        case 1177:
        $txt .= 'Fase Final: <b>Real Sociedad de F&uacute;tbol y RC Deportivo</b><br />';
        $txt .= 'Promoci&oacute;n de descenso: <b>Baracaldo FC</b><br />';
        $txt .= 'Descenso a Regional: <b>Stadium Avilesino</b><br />';
        break;

        case 1176:
        $txt .= 'Campe&oacute;n: <b>Atl&eacute;tico Aviaci&oacute;n</b><br />';
        $txt .= 'Promoci&oacute;n de descenso a Segunda: <b>Real Zaragoza y Murcia CF</b><hr />';
        $txt .= 'El CD Oviedo vuelve a Primera División, tras su ausencia en la temporada anterior.<br />';
        $txt .= 'La proacute;xima temporada se ampliaraacute; el Campeonato a 14 equipos, por lo que no hay descensos.<br />';
        break;

        case 1232:
        $txt .= 'Campe&oacute;n y ascenso a Primera: <b>Murcia CF</b><br />';
        $txt .= 'Promoci&oacute;n de ascenso: <b>Deportivo</b><hr />';
        $txt .= '<b>Promoci&oacute;n de ascenso o permanencia</b><br /><br />';
        $txt .= '<i>Jugado en Madrid, 15-05-1940</i><br /><br />';
        $txt .= 'Celta  1 - 0  Deportivo<br /><br /> ';
        $txt .= 'Permanece en Primera: <b>Celta</b><hr />';
        break;

        case 1185:
        $txt .= 'Fase Final: <b>Cádiz CF</b><br />';
        break;

        case 1184:
        $txt .= 'Fase Final: <b>Murcia CF</b><br />';
        break;

        case 1183:
        $txt .= 'Fase Final: <b>Levante UD</b><br />';
        break;

        case 1182:
        $txt .= 'Fase Final: <b>Donostia FC</b><br />';
        break;

        case 1181:
        $txt .= 'Fase Final: <b>Deportivo</b><br />';
        break;

        case 1180:
        $txt .= 'Finalizada la guerra, se vuelve a organizar el campeonato, no se disputa la Tercera Divisi&oacute;n.<br />';
        $txt .= 'Para la pr&oacute;xima temporada va a reducirse la Segunda de 40 a 24 equipos.<br />';
        $txt .= 'Al no poder participar el Oviedo temporalmente por tener el campo destruido, se le autoriza a no participar y mantiene la vacante, jug&aacute;ndose una eliminatoria entre los dos descendidos en la &uacute;ltima temporada disputada para ocupar la plaza de &eacute;ste:<hr />';
        $txt .= '<i>Jugado en Valencia, 26-11-1939</i><br /><br />';
        $txt .= 'Atl&eacute;tico Aviaci&oacute;n  3 - 1  Atl&eacute;tico Osasuna<br /><br /> ';
        $txt .= 'Desciende a Segunda: <b>Atl&eacute;tico Osasuna</b><hr />';
        $txt .= 'Campe&oacute;n: <b>Atl&eacute;tico Aviaci&oacute;n</b><br />';
        $txt .= 'Promoci&oacute;n de Descenso: <b>Celta</b><br />';
        $txt .= 'Descenso a Segunda: <b>Betis Balompi&eacute; y Racing Club</b><br />';
        break;

        case 1231:
        $txt .= 'Campe&oacute;n: <b>Celta SC</b><br />';
        $txt .= 'Ascenso a Primera: <b>Celta SC y Zaragoza FC</b><br />';
        break;

        case 1189:
        $txt .= 'Fase Final: <b>Murcia FC y Xerez FC</b><br />';
        $txt .= 'Descenso a Regional: <b>SCD Mirandilla FC y Elche CF</b><br />';
        break;

        case 1188:
        $txt .= 'Fase Final: <b>Girona FC y Arenas Club</b><br />';
        $txt .= 'Descenso a Regional: <b>CE Jupiter y Uni&oacute;n Ir&uacute;n</b><br />';
        break;

        case 1187:
        $txt .= 'Fase Final: <b>Club Celta y Zaragoza FC</b><br />';
        $txt .= 'Descenso a Regional: <b>CD Nacional y Uni&oacute;n Sporting Club</b><hr />';
        $txt .= 'Los descensos de Segunda División se realizan sumando los puntos de liga mas los de los campeonatos superregionales de cada zona geográfica.<br />';
        $txt .= 'El Unión Sporting Club baja por parte del grupo 1 de superregional (Galicia-Asturias) y el CD Nacional por parte del grupo 2 de superregional (Castilla-Cantabria-Aragón).<br />';
        break;

        case 1186:
        $txt .= 'Campe&oacute;n: <b>Athletic Club</b><br />';
        $txt .= 'Descenso a Segunda: <b>Athletic de Madrid y Club Atl&eacute;tico Osasuna</b><br />';
        break;

        case 1230:
        $txt .= 'Campe&oacute;n: <b>H&eacute;rcules CF</b><br />';
        $txt .= 'Ascenso a Primera: <b>H&eacute;rcules CF y Club Atl&eacute;tico Osasuna</b><br />';
        $txt .= 'La jornada 1 son los resultados obtenidos en la fase anterior entre los equipos del mismo grupo, que contabilizaban para la clasificaci&oacute;n final.<br />';
        break;

        case 1193:
        $txt .= 'Fase Final: <b>H&eacute;rcules CF y Murcia CF</b><br />';
        $txt .= 'Descenso a Regional: <b>Sport Club La Plana</b><br />';
        break;

        case 1192:
        $txt .= 'Fase Final: <b>Club Atl&eacute;tico Osasuna y CE Sabadell FC</b><br />';
        $txt .= 'Antes de la cuarta jornada se retir&oacute; el Logroño, anul&aacute;ndose sus resultados anteriores.<br />';
        break;

        case 1191:
        $txt .= 'Fase Final: <b>Celta y Valladolid CF</b><br />';
        $txt .= 'Por incomparecencia, el partido Racing Ferrol - Baracaldo se di&oacute; por perdido a los locales.<br />';
        break;

        case 1190:
        $txt .= 'Campe&oacute;n: <b>Betis Balompi&eacute;</b><br />';
        $txt .= 'Descenso a Segunda: <b>Donostia CF y Arenas Club</b><br />';
        break;

        case 1229:
        $txt .= 'Asciende a Segunda Divisi&oacute;n: <b>Valladolid</b><br />';
        $txt .= 'El Baracaldo se retiró a falta de dos partidos, anul&aacute;ndose todos sus resultados.<br />';
        $txt .= 'Los partidos CD Logroño - Elche CF (inicialmente 2-2) y CD Logroño - Gimn&aacute;stico FC (inicialmente 2-0) se dieron por perdidos al equipo local.<br />';
        break;

        case 1228:
        $txt .= 'Fase Final: <b>CD Logroño y Gimn&aacute;stico FC</b><br />';
        break;

        case 1009:
        $txt .= 'Prefase Final: <b>Recreativo de Granada</b><br />';
        break;

        case 1008:
        $txt .= 'Prefase Final: <b>Alicante CF</b><br />';
        break;

        case 1007:
        $txt .= 'Prefase Final: <b>Girona FC y CE Jupiter</b><br />';
        break;

        case 1006:
        $txt .= 'Prefase Final: <b>AD Ferroviaria</b><br />';
        $txt .= 'Los partidos Ferroviaria - Huesca, Huesca - Ferroviaria, Arenas Zaragoza - Huesca, Arenas Zaragoza - Tranviaria y Tranviaria - Arenas Zaragoza se dieron por ganados a los respectivos equipos locales.<br />';
        break;

        case 1005:
        $txt .= 'Prefase Final: <b>Gimn&aacute;stica Torrelavega</b><br />';
        break;

        case 1004:
        $txt .= 'Prefase Final: <b>Uni&oacute;n Sporting Club</b><br />';
        break;

        case 1003:
        $txt .= 'Campe&oacute;n: <b>Valladolid</b><br />';
        $txt .= 'Fase Final: <b>Valladolid y Barakaldo FC</b><br />';
        $txt .= 'Prefase Final: <b>CD Logroño</b><br />';
        $txt .= 'El partido Racing Ferrol - CD Logroño se suspendi&oacute; y no llegó a celebrarse.<br />';
        break;

        case 1196:
        $txt .= 'Campe&oacute;n: <b>Zaragoza FC</b><br />';
        $txt .= 'Fase Final: <b>Zaragoza FC y Elche FC</b><br />';
        $txt .= 'Prefase Final: <b>Gimn&aacute;stico FC</b><br />';
        break;

        case 1195:
        $txt .= 'Campe&oacute;n: <b>Sevilla FC</b><br />';
        $txt .= 'Ascenso a Primera: <b>Sevilla y Athletic de Madrid</b><br />';
        $txt .= 'No hay descensos de categor&iacute;a, pues va a desaparecer la Tercera Divisi&oacute;n.<br />';
        $txt .= 'El partido Deportivo Alav&eacute;s - Sevilla FC,  se da por vencedor al Sevilla FC por incomparecencia del Deportivo Alav&eacute;s.';
        break;

        case 1194:
        $txt .= 'Campe&oacute;n: <b>Athletic Club</b><br />';
        $txt .= 'Esta temporada no hay descensos por ampliarse la Primera Divisi&oacute;n a 12 equipos.<br />';
        break;

        case 1227:
        $txt .= 'Asciende a Segunda Divisi&oacute;n: <b>CE Sabadell FC</b><br />';
        break;

        case 1002:
        $txt .= 'Campe&oacute;n: <b>FC Malagueño</b><br />';
        $txt .= 'Promoci&oacute;n de Ascenso: <b>FC Malagueño y CD C&oacute;rdoba</b><br />';
        break;

        case 1001:
        $txt .= 'Campe&oacute;n: <b>Cartagena FC</b><br />';
        $txt .= 'Promoci&oacute;n de Ascenso: <b>Cartagena FC y CD Cieza</b><br />';
        break;

        case 1000:
        $txt .= 'Campe&oacute;n: <b>Hércules FC</b><br />';
        $txt .= 'Promoci&oacute;n de Ascenso: <b>Hércules FC y Elche FC</b><br />';
        break;

        case 999:
        $txt .= 'Campe&oacute;n: <b>CF Badalona</b><br />';
        $txt .= 'Promoci&oacute;n de Ascenso: <b>CF Badalona y CE Sabadell FC</b><br />';
        break;

        case 998:
        $txt .= 'Campe&oacute;n: <b>Zaragoza FC</b><br />';
        $txt .= 'Promoci&oacute;n de Ascenso: <b>Zaragoza FC y CD Huesca</b><br />';
        break;

        case 997:
        $txt .= 'Campe&oacute;n: <b>CD Logroño</b><br />';
        $txt .= 'Promoci&oacute;n de Ascenso: <b>CD Logroño y Barakaldo FC</b><br />';
        break;

        case 1200:
        $txt .= 'Campe&oacute;n: <b>Valladolid</b><br />';
        $txt .= 'Promoci&oacute;n de Ascenso: <b>Valladolid y CD Nacional</b><br />';
        break;

        case 1199:
        $txt .= 'Campe&oacute;n: <b>Stadium Avilesino</b><br />';
        $txt .= 'Promoci&oacute;n de Ascenso: <b>Stadium Avilesino y Uni&oacute;n Sporting</b><br />';
        break;

        case 1198:
        $txt .= 'Campe&oacute;n y ascenso a Primera: <b>Oviedo CF</b><br />';
        $txt .= 'Descenso a Tercera: <b>CD Castell&oacute;n</b><br />';
        $txt .= 'El CD Castell&oacute;n fu&eacute; sancionado con jugar cuatro partidos en estadio neutral. Al negarse y no asistir a sus encuentros, estos partidos se le dan como perdidos.<br />';
        break;

        case 1197:
        $txt .= 'Campe&oacute;n: <b>Real Madrid CF</b><br />';
        $txt .= 'Descenso a Segunda: <b>Deportivo Alav&eacute;s</b><br />';
        break;

        case 1226:
        $txt .= 'Asciende a Segunda Divisi&oacute;n: <b>Club Atl&eacute;tico Osasuna</b><br />';
        break;

        case 1225:
        $txt .= 'Campe&oacute;n y promoci&oacute;n de Ascenso: <b>CD Nacional</b><br />';
        break;

        case 1224:
        $txt .= 'Campe&oacute;n y promoci&oacute;n de Ascenso: <b>CE Sabadell FC</b><br />';
        break;

        case 995:
        $txt .= 'Clasificado para la final del Grupo 4: <b>CD Nacional</b><br />';
        break;

        case 996:
        $txt .= 'Clasificado para la final del Grupo 4: <b>Hércules CF</b><br />';
        break;

        case 994:
        $txt .= 'Clasificado para la final del Grupo 3: <b>Levante FC</b><br />';
        break;

        case 993:
        $txt .= 'Clasificado para la final del Grupo 3: <b>CE Sabadell FC</b><br />';
        break;

        case 1204:
        $txt .= 'Campe&oacute;n y promoci&oacute;n de Ascenso: <b>Club Atl&eacute;tico Osasuna</b><br />';
        break;

        case 1203:
        $txt .= 'Campe&oacute;n y promoci&oacute;n de Ascenso: <b>Racing Ferrol FC</b><br />';
        break;

        case 1202:
        $txt .= 'Campe&oacute;n y ascenso a Primera: <b>Real Betis Balompié</b><br />';
        $txt .= 'A falta de 3 partidos, se retiró el Cataluña FC d&aacute;ndose por no jugados sus partidos. Por este motivo no hubo descensos a Tercera Divisi&oacute;n.<br />';
        break;

        case 1201:
        $txt .= 'Campe&oacute;n: <b>Real Madrid CF</b><br />';
        $txt .= 'Descenso a Segunda: <b>Real Uni&oacute;n Club</b><br />';
        break;

        case 1223:
        $txt .= 'Asciende a Segunda Divisi&oacute;n: <b>RC Celta</b><br />';
        break;

        case 1222:
        $txt .= 'Campe&oacute;n y promoci&oacute;n de Ascenso: <b>Recreativo de Huelva</b><br />';
        break;

        case 992:
        $txt .= 'Clasificado para la final del Grupo 3: <b>Recreativo de Huelva</b><br />';
        break;

        case 991:
        $txt .= 'Clasificado para la final del Grupo 3: <b>Sporting Club de Canet</b><br />';
        break;

        case 1208:
        $txt .= 'Campe&oacute;n y promoci&oacute;n de Ascenso: <b>Baracaldo FC</b><br />';
        break;

        case 1207:
        $txt .= 'Campe&oacute;n y promoci&oacute;n de Ascenso: <b>RC Celta</b><br />';
        break;

        case 1206:
        $txt .= 'Campe&oacute;n y ascenso a Primera: <b>Valencia CF</b><br />';
        $txt .= 'Descenso a Tercera: <b>Iberia SC</b><br />';
        break;

        case 1205:
        $txt .= 'Campe&oacute;n: <b>Athletic Club</b><br />';
        $txt .= 'Descenso a Segunda: <b>CD Europa</b><br />';
        break;

        case 1217:
        $txt .= 'Asciende a Segunda Divisi&oacute;n: <b>CD Castell&oacute;n</b><br />';
        break;

        case 1213:
        $txt .= 'Campe&oacute;n y promoci&oacute;n de Ascenso: <b>Recreativo de Huelva</b><br />';
        $txt .= 'El Don Benito retirado de la competici&oacute;n.<br />';
        break;

        case 1212:
        $txt .= 'Campe&oacute;n y promoci&oacute;n de Ascenso: <b>Cartagena FC</b><br />';
        break;

        case 990:
        $txt .= 'Campe&oacute;n y promoci&oacute;n de Ascenso: <b>Sporting Club de Canet</b><br />';
        break;

        case 989:
        $txt .= 'Campe&oacute;n y promoci&oacute;n de Ascenso: <b>CD Castell&oacute;n</b><br />';
        break;

        case 988:
        $txt .= 'Campe&oacute;n y promoci&oacute;n de Ascenso: <b>Patria Arag&oacute;n</b><br />';
        $txt .= 'Retirados Racing Club de Madrid y el Zaragoza CD.<br />';
        break;

        case 987:
        $txt .= 'Campe&oacute;n y promoci&oacute;n de Ascenso: <b>At. Aurora</b><br />';
        $txt .= 'Renunciaron a participar en este grupo el Pasayako, Osasuna, Izarra y Tolosa, siendo reemplazados por el At. Aurora.<br />';
        break;

        case 986:
        $txt .= 'Campe&oacute;n y promoci&oacute;n de Ascenso: <b>Barakaldo CF</b><br />';
        break;

        case 1221:
        $txt .= 'Campe&oacute;n y promoci&oacute;n de Ascenso: <b>Club Gij&oacute;n</b><br />';
        break;

        case 1211:
        $txt .= 'Clasificado para la final del Grupo 1: <b>Club Gij&oacute;n</b><br />';
        break;

        case 985:
        $txt .= 'Clasificado para la final del Grupo 1: <b>Racing Ferrol FC</b><br />';
        $txt .= 'El Celta de Vigo renunci&oacute; a participar en este grupo, siendo reemplazado por el Emdem. El Uni&oacute;n Sporting se retir&oacute; de la competici&oacute;n.<br />';
        break;

        case 1210:
        $txt .= 'Campe&oacute;n y ascenso a Primera: <b>Deportivo Alav&eacute;s</b><br />';
        $txt .= 'Descenso a Tercera: <b>CD Leonesa</b><br />';
        break;

        case 1209:
        $txt .= 'Campe&oacute;n: <b>Athletic Club</b><br />';
        $txt .= 'Descenso a Segunda: <b>Athletic de Madrid</b><br />';
        break;

        case 1216:
        $txt .= 'Ascenso a Segunda: <b>CD Leonesa y Real Murcia FC</b><br />';
        $txt .= 'Descenso a Tercera: <b>CD Castell&oacute;n, RS Gimn&aacute;stica, Real Zaragoza CD, Real Valladolid Deportivo, Club Atl&eacute;tico Osasuna, Tolosa FC, Baracaldo FC y Cartagena FC</b><br />';
        break;

        case 1219:
        $txt .= 'Torneo creado para completar los equipos participantes en la Segunda Divisi&oacute;n Grupo B. Consisti&oacute; en ir eliminando a los equipos que perdieran dos partidos, jug&aacute;ndose,';
        $txt .= ' previo sorteo, tantas jornadas como fueran necesarias hasta que quedasen dos clubes, no pudi&eacute;ndose repetir partidos entre las distintas jornadas.<hr />';
        $txt .= 'Jugar&aacute;n en Segunda Grupo B: <b>Baracaldo FC y Tolosa FC</b>';
        break;

        case 1215:
        $txt .= 'Campe&oacute;n: <b>Sevilla FC</b><br />';
        $txt .= 'Promoci&oacute;n Ascenso: <b>Sevilla FC</b><br />';
        $txt .= 'Descenso a Tercera: <b>RC Celta y Racing Club</b><br />';
        break;

        case 1220:
        $txt .= 'Promoci&oacute;n de permanencia o descenso:<br /><br />';
        $txt .= 'Permanece en Primera: <b>Real Santander RC</b>';
        break;

        case 1214:
        $txt .= 'Campe&oacute;n: <b>FC Barcelona</b><br />';
        $txt .= 'Promoci&oacute;n Descenso: <b>Real Santander RC</b><br />';
        break;

        case 1218:
        $txt .= 'El vencedor de este torneo acompa&ntilde;a a los nueve equipos que hab&iacute;an sido campeones o subcampeones del campeonato de Copa desde su creaci&oacute;n.<br />';
        $txt .= 'El resto de equipos jugar&aacute; en Segunda Divisi&oacute;n Grupo A, junto al Racing Club de Madrid.<br />';

        break;
    }

    return $txt;
}
