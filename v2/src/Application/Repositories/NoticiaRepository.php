<?php
namespace App\Application\Repositories;

use App\Application\Helpers\DbHelper;

class NoticiaRepository
{
    private $db;

    public function __construct(DbHelper $db)
    {
        $this->db = $db;
    }

    public function getNoticias()
    {
        $sql = '
            SELECT n.*
            FROM noticias n
            WHERE n.estado = 1
            ORDER BY fecha DESC
        ';
        $query = $this->db->query($sql);
        $noticia = $this->db->fetchAll($query);

        return $noticia;
    }

    public function getNoticiaSingle($idNoticia)
    {
        $sql = '
            SELECT n.*
            FROM noticias n
            WHERE id = ' . (int) $idNoticia . '
        ';
        $query = $this->db->query($sql);
        $noticia = $this->db->fetch($query);

        return $noticia;
    }

    public function otrasNoticias($nNoticias = 5, $idsNoticiasExcluir = [])
    {
        $where = 'WHERE n.estado = 1';

        if ($idsNoticiasExcluir) {
            $where .= ' AND id NOT IN (' . implode(',', $idsNoticiasExcluir) . ')';
        }

        $sql = '
            SELECT n.*
            FROM noticias n
            ' . $where . '
            ORDER BY fecha DESC
        ';
        $query = $this->db->query($sql);
        $noticias = $this->db->fetchAll($query);

        return $noticias;
    }

    public function getNoticiasPortada($date = '')
    {
        if ($date == '') {
            $tz = new \DateTimeZone('Europe/Madrid');
            $hoyDateTime = new \DateTime('now', $tz);
            $dateHoy = $hoyDateTime->format('Y-m-d');

            $ayerDateTime = new \DateTime('now', $tz);
            $ayerDateTime->modify('-1 day');
            $dateAyer = $ayerDateTime->format('Y-m-d');
        }

        #$date = '2020-11-17';

        $sql = "
            SELECT n.*
            FROM noticias n
            WHERE (fecha LIKE '" . $dateHoy . " %' OR fecha LIKE '" . $dateAyer . " %') AND portada = 1 AND n.estado = 1
            ORDER BY fecha ASC
        ";

        $query = $this->db->query($sql);
        $noticias = $this->db->fetchAll($query);

        return $noticias;
    }

    public function obtenerNoticiasPortadaPosiciones($posiciones = [], $date = '')
    {
        #return [];

        if (empty($posiciones)) {
            return [];
        }

        /*
        if ($date == '') {
            $tz = new \DateTimeZone('Europe/Madrid');
            $hoyDateTime = new \DateTime('now', $tz);

            $date = $hoyDateTime->format('Y-m-d');
        }

        $date = '2020-11-12';

        $sql = "
            SELECT n.*
            FROM noticias n
            WHERE fecha LIKE '" . $date . " %' AND portada = 1 AND posiciones IN (" . implode(',', $posiciones) . ")
        ";

        $query = $this->db->query($sql);
        $noticias = $this->db->fetchAll($query);

        return $noticias;
        */

        $ficheroNoticiasPorPosicionesPortada = '../json/noticias/portada.json';

        $contenidoFicheroNoticias = file_get_contents($ficheroNoticiasPorPosicionesPortada);


        if ($contenidoFicheroNoticias == '[]') {
            return [];
        }

        $noticiasPortada = json_decode($contenidoFicheroNoticias, true);

        #var_dump($noticiasPortada);

        /*
        if (!is_object($noticiasPortada)) {
            return [];
        }
        */

        $noticias = [];

        foreach ($posiciones as $posicion) {
            if (array_key_exists($posicion, $noticiasPortada)) {
                $noticias[] = $noticiasPortada[$posicion];
            }
        }

        return $noticias;
    }
}