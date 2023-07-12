<?php
namespace App\Application\Helpers;

class DbHelper
{
    public $db;

    public function __construct()
    {
        #$this->connect();
    }

    public function getConnection()
    {
        return $this->db;
    }

    public function connect()
    {
        $nombresServidoresPruebas = [
            'localhost',
            'version2'
        ];

        if (in_array($_SERVER['SERVER_NAME'], $nombresServidoresPruebas)) {
            $server = '127.0.0.1';
            $user = 'root';
            $pass = 'cojo';
            $dbName = 'futbolme_nueva';
        } else {
            $server = 'localhost';
            $user = 'futbolme_nueva';
            $pass = 'A3r0r3d';
            $dbName = 'futbolme_nueva';
        }

        $this->db = mysqli_connect($server, $user, $pass, $dbName) or die('Error');
        mysqli_query($this->db,'SET NAMES "utf8" COLLATE "utf8_general_ci"');
    }

    public function query($sql)
    {
        if (!$this->db) {
            $this->connect();
        }

        $query = mysqli_query($this->db, $sql);

        return $query;
    }

    public function fetch($query)
    {
        return $query->fetch_assoc();
    }

    public function fetchAll($query)
    {
        return $query->fetch_all(MYSQLI_ASSOC);
    }
}