<?php

namespace App\Models;

use PDO;
use PDOException;
use Exception;
use App\Core\Model;

class Schedule extends Model
{
    public function getAvailableSchedules($from, $to, $date)
    {
        try {
            $stmt = $this->db->prepare("
                SELECT 
                    s.*, 
                    st_from.name AS from_name, 
                    st_from.city AS from_city, 
                    st_to.name AS to_name, 
                    st_to.city AS to_city 
                FROM 
                    schedules s 
                JOIN 
                    stations st_from ON s.station_from = st_from.id 
                JOIN 
                    stations st_to ON s.station_to = st_to.id 
                WHERE 
                    s.station_from = :from AND 
                    s.station_to = :to AND 
                    s.departure_date = :date
            ");

            $stmt->bindParam(':from', $from, PDO::PARAM_STR);
            $stmt->bindParam(':to', $to, PDO::PARAM_STR);
            $stmt->bindParam(':date', $date, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception('Error fetching available schedules: ' . $e->getMessage());
        }
    }
}
