<?php

namespace App\Core;

use PDO;
use PDOException;

class Model
{
    protected $db;

    public function __construct()
    {
        $dbConfig = require __DIR__ . '/../config/database.php';

        try {
            $dsn = 'mysql:host=' . $dbConfig['host'] . ';dbname=' . $dbConfig['name'] . ';charset=utf8';
            $this->db = new PDO($dsn, $dbConfig['user'], $dbConfig['pass']);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        }
    }
}
