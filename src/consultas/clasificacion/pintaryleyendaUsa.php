<?php

/****************************PINTANDO CLASIFICACION*********************************************************/
            $coloresClasifica = array();
            foreach ($colores as $color) {
                $coloresClasifica[$color['posicion']] = $color;
            }

        $clasificacionFinal = array();
        $coloresLeyenda = array();
        foreach ($clasificacion as $key => $clasifica) {
            $posicion = $key + 1;
            $colorFondo = '';
            $colorTexto = '';
            $css = 'color:black;background-color:white';

            if (array_key_exists($posicion, $coloresClasifica)) {
                $colorFondo = $coloresClasifica[$posicion]['color_fondo'];
                $colorTexto = $coloresClasifica[$posicion]['color_texto'];
                if (!empty($colorFondo)) {
                    $backgroundColor = 'background-color: '.$colorFondo;
                }
                $css = 'color:'.$colorTexto.';'.$backgroundColor ?? '';
                $coloresLeyenda[$coloresClasifica[$posicion]['color_id']]['color_fondo'] = $colorFondo;
                $coloresLeyenda[$coloresClasifica[$posicion]['color_id']]['color_texto'] = $colorTexto;
                $coloresLeyenda[$coloresClasifica[$posicion]['color_id']]['texto'] = $coloresClasifica[$posicion]['texto'];
                $coloresLeyenda[$coloresClasifica[$posicion]['color_id']]['color_id'] = $coloresClasifica[$posicion]['color_id'];
            }

            if ($clasifica['equipo_id'] > 0) {
                $clasificacionFinal[] = array(
                        'posicion' => $clasifica['posicion'],
                        'css' => $css,
                        'equipo_id' => $clasifica['equipo_id'],
                        'nombre' => $clasifica['nombre'],
                        'nombreCorto' => $clasifica['nombreCorto'],
                        'puntos' => $clasifica['puntos'],
                        'jugados' => $clasifica['jugados'],
                        'ganados' => $clasifica['ganados'],
                        'empatados' => $clasifica['empatados'],
                        'perdidos' => $clasifica['perdidos'],
                        'gFavor' => $clasifica['gFavor'],
                        'gContra' => $clasifica['gContra'],
                        'preferente' => $clasifica['preferente'],
                    );
            }
        }

        $leyenda = array();
        foreach ($coloresLeyenda as $key => $color) {
            $leyenda[] = array(
                'fondo' => $color['color_fondo'],
                'color' => $color['color_texto'],
                'leyenda' => $color['texto'],
                'color_id' => $color['color_id'],
            );
        }

        $resultado = array(
        'clasificacionFinal' => $clasificacionFinal,
        'leyenda' => $leyenda,
        );
