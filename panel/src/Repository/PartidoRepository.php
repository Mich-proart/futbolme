<?php

namespace App\Repository;

use App\Entity\Partido;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Partido|null find($id, $lockMode = null, $lockVersion = null)
 * @method Partido|null findOneBy(array $criteria, array $orderBy = null)
 * @method Partido[]    findAll()
 * @method Partido[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PartidoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Partido::class);
    }

    public function getPartidosListadoPorTemporadas($idsTemporadas = [])
    {
        /*
        */
        $partidos = $this->findBy([
            'temporada' => $idsTemporadas
        ]);

        return $partidos;

        $em = $this->getEntityManager();
        $c = $em->getConnection();

        $idsTemporadasComas = join(',', $idsTemporadas);

        $sql = "
            SELECT p.id, CONCAT(el.nombre, ' - ', ev.nombre) nombrePartido
            FROM partido p
            LEFT JOIN equipo el ON p.equipoLocal_id = el.id
            LEFT JOIN equipo ev ON p.equipoVisitante_id = ev.id
            WHERE p.temporada_id IN(" . $idsTemporadasComas . ")
        ";

        $partidos = $c->query($sql)->fetchAll();

        $partidosArray = [];

        foreach ($partidos as $partido) {
            $partidosArray[] = [$partido];
        }

        return $partidosArray;
    }
}
