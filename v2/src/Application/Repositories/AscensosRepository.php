<?php
namespace App\Application\Repositories;
use App\Application\Helpers\DbHelper;

class AscensosRepository
{
    private $db;

    public function __construct(DbHelper $db)
    {
        $this->db = $db;
    }

        function ascensos($categoria_id=0)
    {
        $consulta = 'SELECT a.id, a.categoria_id, a.division_id, a.nombre, a.orden, ae.equipo_id, ae.ascenso_id, ae.posicion, ae.temporada_id, e.nombre equipo, e.club_id, cat.nombre categoria, t.nombre temporada
        FROM ascenso a
        INNER JOIN ascensoequipo ae ON a.id=ae.ascenso_id
        INNER JOIN equipo e ON e.id=ae.equipo_id
        INNER JOIN temporada t ON t.id=ae.temporada_id
        INNER JOIN torneo tor ON tor.id=t.torneo_id
        INNER JOIN categoriatorneo cat ON cat.id=a.categoria_id
        ORDER BY a.categoria_id, a.division_id, tor.orden, a.orden, ae.posicion';

        $resultadoSQL = $this->db->query($consulta);
        $ascensos = $this->db->fetchAll($resultadoSQL);       

        return $ascensos;
    }

    
}