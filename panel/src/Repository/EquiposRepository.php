<?php

namespace App\Repository;

use App\Entity\Equipos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Equipos|null find($id, $lockMode = null, $lockVersion = null)
 * @method Equipos|null findOneBy(array $criteria, array $orderBy = null)
 * @method Equipos[]    findAll()
 * @method Equipos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EquiposRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Equipos::class);
    }

    public function getEquiposPorTemporadas($idsTemporadas = [])
    {
        $em = $this->getEntityManager();
        $c = $em->getConnection();

        $idsTemporadasComas = join(',', $idsTemporadas);

        $where = 'WHERE 1 ';

        if (count($idsTemporadas) > 0) {
            $where .= 'AND te.temporada_id IN(' . $idsTemporadasComas . ')';
        }

        $sql = "
            SELECT GROUP_CONCAT(e.id) idsEquipos
            FROM temporada_equipo te
            LEFT JOIN equipo e ON te.equipo_id = e.id
            " . $where . "
        ";

        $idsEquipos = explode(',', $c->query($sql)->fetch()['idsEquipos']);

        $equipos = $this->findBy([
            'id' => $idsEquipos
        ]);

        return $equipos;
    }
}
