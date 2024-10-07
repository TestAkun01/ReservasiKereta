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
}
