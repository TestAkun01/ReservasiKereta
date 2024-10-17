<?php

namespace App\Models;

use PDO;
use PDOException;
use Exception;
use App\Core\Model;

class Train extends Model
{
    public function getAllTrains()
    {
        try {
            $stmt = $this->db->query("SELECT * FROM trains");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception('Error fetching all trains: ' . $e->getMessage());
        }
    }

    public function getTrainById($train_id)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM trains WHERE id = :id");
            $stmt->bindParam(':id', $train_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception('Error fetching train: ' . $e->getMessage());
        }
    }
}
