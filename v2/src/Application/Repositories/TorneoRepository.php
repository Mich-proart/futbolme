<?php
namespace App\Application\Repositories;

use App\Application\Helpers\DbHelper;

class TorneoRepository
{
    private $db;

    public function __construct(DbHelper $db)
    {
        $this->db = $db;
    }

    public function getTorneos()
    {
        return [
            [
                'idTorneo' => 1,
                'nombre' => 'Primera División'
            ],
            [
                'idTorneo' => 2,
                'nombre' => 'Segunda División'
            ]
        ];
    }
}