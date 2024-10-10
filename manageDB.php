<?php

require 'vendor/autoload.php';

use Dotenv\Dotenv;

class DatabaseManager
{
    private $pdo;

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load();

        $host = $_ENV['DB_HOST'];
        $dbname = $_ENV['DB_NAME'];
        $username = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASS'];

        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function exportDatabase($filename)
    {
        $tables = $this->getTables();
        $sql = '';

        foreach ($tables as $table) {
            $sql .= $this->getCreateTableSQL($table);
            $sql .= $this->getInsertDataSQL($table);
        }

        file_put_contents($filename, $sql);
    }

    private function getTables()
    {
        $stmt = $this->pdo->query("SHOW TABLES");
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    private function getCreateTableSQL($table)
    {
        $stmt = $this->pdo->query("SHOW CREATE TABLE $table");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['Create Table'] . ";\n\n";
    }

    private function getInsertDataSQL($table)
    {
        $sql = '';
        $stmt = $this->pdo->query("SELECT * FROM $table");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows as $row) {
            $columns = implode(',', array_keys($row));
            $values = implode(',', array_map([$this, 'quoteValue'], array_values($row)));
            $sql .= "INSERT INTO $table ($columns) VALUES ($values);\n";
        }

        $sql .= "\n";
        return $sql;
    }

    private function quoteValue($value)
    {
        return is_null($value) ? 'NULL' : $this->pdo->quote($value);
    }

    public function importDatabase($filename)
    {
        $sql = file_get_contents($filename);

        $this->pdo->exec("SET FOREIGN_KEY_CHECKS=0;");

        $tables = $this->getTables();
        foreach ($tables as $table) {
            $this->pdo->exec("DROP TABLE IF EXISTS `$table`;");
        }

        $this->pdo->exec($sql);

        $this->pdo->exec("SET FOREIGN_KEY_CHECKS=1;");
    }
}

$dbManager = new DatabaseManager();

// $dbManager->exportDatabase('backup.sql');

$dbManager->importDatabase('backup.sql');
