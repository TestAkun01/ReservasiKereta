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
    public function getAllActiveTrains()
    {
        try {
            $stmt = $this->db->query("SELECT * FROM trains WHERE status = 'active'");
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

    public function createTrain($data)
    {
        try {
            $stmt = $this->db->prepare("
                INSERT INTO trains (name, total_seats, class, carriage, status) VALUE (:name, :total_seats, :class, :carriage, :status)
            ");
            $stmt->bindParam(':name', $data['name'], PDO::PARAM_STR);
            $stmt->bindParam(':total_seats', $data['total_seats'], PDO::PARAM_INT);
            $stmt->bindParam(':class', $data['class'], PDO::PARAM_STR);
            $stmt->bindParam(':carriage', $data['carriage'], PDO::PARAM_INT);
            $stmt->bindParam(':status', $data['status'], PDO::PARAM_STR);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            throw new Exception('Error creating train: ' . $e->getMessage());
        }
    }
    public function updateTrain($id, $data)
    {
        try {
            $stmt = $this->db->prepare("
                UPDATE trains 
                SET name = :name, total_seats = :total_seats, class = :class, carriage = :carriage, status = :status WHERE id = :id
            ");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':name', $data['name'], PDO::PARAM_STR);
            $stmt->bindParam(':total_seats', $data['total_seats'], PDO::PARAM_INT);
            $stmt->bindParam(':class', $data['class'], PDO::PARAM_STR);
            $stmt->bindParam(':carriage', $data['carriage'], PDO::PARAM_INT);
            $stmt->bindParam(':status', $data['status'], PDO::PARAM_STR);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            throw new Exception('Error updating train: ' . $e->getMessage());
        }
    }

    public function deleteTrain($id)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM trains WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            throw new Exception('Error deleting train: ' . $e->getMessage());
        }
    }
}
