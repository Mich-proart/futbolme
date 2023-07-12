<?php
namespace App\Application\Repositories;

use App\Application\Helpers\DbHelper;
use App\Application\Helpers\UrlHelper;

class EventoRepository
{
    private $db;

    public function __construct(DbHelper $db)
    {
        $this->db = $db;
        $this->urlHelper = new UrlHelper($this->db);
    }

    public function getUltimosEventos()
    {
        $ultimosEventosRutaFichero = '../json/eventos.json';
        $ultimosEventosJson = file_get_contents($ultimosEventosRutaFichero);
        $ultimosEventos = json_decode($ultimosEventosJson);

        return $ultimosEventos;
    }

    public function prepararUltimosEventosParaMostrar($ultimosEventos, $c_id)
    {
        $contador = 0;
        $eventosPreparados = [];

        foreach ($ultimosEventos as $ultimoEvento) {
            /*if ($c_id == 1 && $ultimoEvento->temporada_id > 680){
                continue;
            }*/

            if ($c_id > 1 && $ultimoEvento->comunidad_id != $c_id){
                continue;
            }

            $contador++;

            if ($contador > 20) {
                break;
            }

            $eventoPreparado = $this->prepararUltimosEventosParaMostrarSingle($ultimoEvento);

            if (!$eventoPreparado) {
                continue;
            }

            $eventosPreparados[] = $eventoPreparado;
        }

        return$eventosPreparados;
    }

    public function prepararUltimosEventosParaMostrarSingle($evento)
    {

        $pos = strpos($evento->valor, '*A');

        if ($pos > -1) {
            $evento->valor = substr($evento->valor, 0, $pos);
        }

        $titulo = null;
        $partido = null;
        $local = $evento->local;
        $visitante = $evento->visitante;
        $enJuego = false;
        $eventoText = '';

        $enlacePartido = $this->urlHelper->getUrlPartido($evento->partido_id, $evento->local, $evento->visitante);


        switch ($evento->evento) {
            case '1':
                $hora = explode(',', $evento->valor);
                if ('00:00:11' == $hora[1]) {
                    continue;
                }
                $eventoText = $hora[0].' '.substr($hora[1], 0, 2).':'.substr($hora[1], -2);
                $titulo = 'Fecha y hora para el partido ';
                $partido = $local.' - '.$visitante;
                break;

            case '2':
                $hora = explode(',', $evento->valor);
                if ('00:00:11' == $hora[1]) {
                    continue;
                }
                $eventoText = $hora[0].' '.substr($hora[1], 0, 2).':'.substr($hora[1], -2);
                $titulo = 'Fecha y hora para el partido ';
                $partido = $local.' - '.$visitante;
                break;

            case '3':
                $arbitro = explode(',', $evento->valor);
                $eventoText = $arbitro[2].', '.$arbitro[1];
                $titulo = 'Árbitro para el partido ';
                $partido = $local.' - '.$visitante;
                break;

            case '5':
                $valor = 'Gol del '.$local;
                $eventoText = $valor.' '.$evento->resultado;
                $titulo = 'En directo';
                $partido = $local.' - '.$visitante;
                $enJuego = true;
                break;

            case '6':
                $valor = 'Gol del '.$visitante;
                $eventoText = $valor.' '.$evento->resultado;
                $titulo = 'En directo';
                $partido = $local.' - '.$visitante;
                $enJuego = true;
                break;

            case '7':
                $valor = $evento->valor;
                $eventoText = $valor.' '.$evento->resultado;
                $titulo = 'En directo';
                $partido = $local.' - '.$visitante;
                $enJuego = true;
                break;

            case '8':


                $valor = $evento->valor;
                $eventoText = $valor.' '.$evento->resultado;
                $titulo = 'Descanso';
                $partido = $local.' - '.$visitante;
                $enJuego = true;
                break;

            case '9':
                $valor = $evento->valor;
                $eventoText = $valor.' '.$evento->resultado;
                $titulo = 'Inicia el segundo tiempo.';
                $partido = $local.' - '.$visitante;
                $enJuego = true;
                break;

            case '13':
                $resultado = $evento->resultado;
                $titulo = 'FINAL';
                $partido = $local.' - '.$visitante;
                break;

            //case 16 = No Jugado
            case '14':
                $valor = $evento->valor;
                $resultado = $valor;
                $titulo = 'Información: ';
                $partido = $local.' - '.$visitante;
                break;

            case '15':
                $valor = $evento->valor;
                $resultado = $valor;
                $titulo = 'Información: ';
                $partido = $local.' - '.$visitante;
                break;

            case '17':
                $observaciones = $evento->valor;
                if ('000000' == trim($observaciones)) {
                    $observaciones = '/mundodeportivo2.php?id='.$evento->equipoLocal_id.'&id2='.$evento->equipoVisitante_id;
                    $observaciones = "<div class='boldfont w100 text-center'><a href='".$observaciones."' target='_blank'>Todos sus enfrentamientos (MD)</a></div>";
                }
                $eventoText = $observaciones;
                $titulo = 'Información: ';
                $partido = $local.' - '.$visitante;
                break;

            case '18':
                $estadio = explode(',', $evento->valor);
                if (!isset($estadio[1])) {
                    continue;
                }
                $eventoText = $estadio[1];
                $titulo = 'Estadio para el partido ';
                $partido = $local.' - '.$visitante;
                break;

            /*case '25':
                $youtube = $evento['valor'];
                $partido_id = $evento['partido_id'];
                $equipoLocal_id = $evento['equipoLocal_id'];
                $equipoVisitante_id = $evento['equipoVisitante_id'];
                $resultado = '<span style="background-color:gainsboro; font-size:12px;">'.$evento['resultado'].'</span>';

                $titulo = 'Crónica MD';
                if (!isset($local[1]) || !isset($visitante[1])) {
                    continue;
                }
                $partido = $local[1].' - '.$visitante[1];
                break;*/

            case '26':
                $tele = substr($evento->valor, 0, -3);
                $eventoText = $tele;
                $titulo = 'TV';
                if (!isset($local[1]) || !isset($visitante[1])) {
                    continue;
                }
                $partido = $local.' - '.$visitante;
                break;

            default:
                #continue;
                break;
        }

        if (!$partido) {
            return false;
        }

        $evento->titulo = $titulo;
        $evento->eventoText = $eventoText;
        $evento->partido = $partido;
        $evento->local = $local;
        $evento->visitante = $visitante;
        $evento->enJuego = $enJuego;
        $evento->enlacePartido = $enlacePartido;

        if (!isset($evento->resultado)) {
            return false;
        }

        #REVISAR CRISTIAN
        $nombreTorneo = str_replace(array('PRIMERA', 'SEGUNDA', 'TERCERA', 'Grupo '), array('1ª', '2ª', '3ª', 'G.'), $evento->nombre_torneo);
        $jornada = 1;

        #$url = '/resultados-directo/torneo/'.$this->poner_guion1($nombreTorneo).'/'.$evento->temporada_id.'/'.$jornada;

        #$url = $this->urlHelper->getUrlTorneo($evento->temporada_id, 'jornada') . '/' . $jornada;
        $url = $this->urlHelper->getUrlTorneo($evento->temporada_id, 'jornada');

        $evento->nombreTorneo = mb_strtolower($nombreTorneo);
        $evento->jornada = $jornada;
        $evento->url = $url;

        return $evento;
    }

    function poner_guion1($cadena)
    {
        // $cadena = strtolower($cadena);

        $cadena = utf8_decode($cadena);
        $cadena = trim($cadena);
        $cadena = str_replace('"', '', $cadena);
        $cadena = str_replace(' ', '-', $cadena);
        $cadena = str_replace('?', '', $cadena);
        $cadena = str_replace('+', '', $cadena);
        $cadena = str_replace(':', '', $cadena);
        $cadena = str_replace('??', '', $cadena);
        $cadena = str_replace('`', '', $cadena);
        $cadena = str_replace('´', '', $cadena);
        $cadena = str_replace("'", '', $cadena);
        $cadena = str_replace('!', '', $cadena);
        $cadena = str_replace('¿', '', $cadena);
        $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýýþÿ??´`';
        $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuuyybyRr--';
        $cadena = strtr($cadena, utf8_decode($originales), $modificadas);

        $cadena = strtolower($cadena);

        return $cadena;
    }
}