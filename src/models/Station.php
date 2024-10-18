<?php

namespace App\Models;

use PDO;
use PDOException;
use Exception;
use App\Core\Model;

class Station extends Model
{
    public function getAllStations()
    {
        try {
            $stmt = $this->db->query("SELECT * FROM stations");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception('Error fetching all stations: ' . $e->getMessage());
        }
    }
    public function getStationById($id)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM stations WHERE id = :id");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception('Error fetching all stations: ' . $e->getMessage());
        }
    }

    public function getStationName($station_id)
    {
        try {
            $stmt = $this->db->prepare("SELECT name FROM stations WHERE id = :id");
            $stmt->bindParam(':id', $station_id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result ? $result['name'] : null;
        } catch (PDOException $e) {
            throw new Exception('Error fetching station name: ' . $e->getMessage());
        }
    }

    public function createStation($data)
    {
        try {
            $stmt = $this->db->prepare("
                INSERT INTO stations (name, city) VALUE (:name, :city)
            ");
            $stmt->bindParam(':name', $data['name'], PDO::PARAM_STR);
            $stmt->bindParam(':city', $data['city'], PDO::PARAM_STR);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            throw new Exception('Error creating station: ' . $e->getMessage());
        }
    }

    public function updateStation($id, $data)
    {
        try {
            $stmt = $this->db->prepare("
                UPDATE stations 
                SET name = :name, city = :city WHERE id = :id
            ");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':name', $data['name'], PDO::PARAM_STR);
            $stmt->bindParam(':city', $data['city'], PDO::PARAM_STR);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            throw new Exception('Error updating station: ' . $e->getMessage());
        }
    }

    public function deleteStation($id)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM stations WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            throw new Exception('Error deleting station: ' . $e->getMessage());
        }
    }
}
