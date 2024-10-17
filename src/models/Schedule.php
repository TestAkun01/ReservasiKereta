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
                    t.name,
                    st_from.name AS from_name, 
                    st_from.city AS from_city, 
                    st_to.name AS to_name, 
                    st_to.city AS to_city 
                FROM schedules s 
                JOIN stations st_from ON s.station_from = st_from.id 
                JOIN stations st_to ON s.station_to = st_to.id 
                JOIN trains t ON s.train_id = t.id
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

    public function getAllSchedules()
    {
        try {
            $stmt = $this->db->query("SELECT * FROM schedules");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception('Error fetching all schedules: ' . $e->getMessage());
        }
    }

    public function getScheduleById($id)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM schedules WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception('Error fetching train: ' . $e->getMessage());
        }
    }

    public function createSchedule($data)
    {
        try {
            $stmt = $this->db->prepare("
                INSERT INTO schedules (train_id, station_from, station_to, departure_date, departure_time, seats_left, arrival_time, price) 
                VALUES (:train_id, :station_from, :station_to, :departure_date, :departure_time, :seats_left, :arrival_time, :price)
            ");
            $stmt->bindParam(':train_id', $data['train_id'], PDO::PARAM_INT);
            $stmt->bindParam(':station_from', $data['station_from'], PDO::PARAM_INT);
            $stmt->bindParam(':station_to', $data['station_to'], PDO::PARAM_INT);
            $stmt->bindParam(':departure_date', $data['departure_date']);
            $stmt->bindParam(':departure_time', $data['departure_time']);
            $stmt->bindParam(':seats_left', $data['seats_left'], PDO::PARAM_INT);
            $stmt->bindParam(':arrival_time', $data['arrival_time']);
            $stmt->bindParam(':price', $data['price']);
            $stmt->execute();

            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            throw new Exception('Error creating schedule: ' . $e->getMessage());
        }
    }

    public function updateSchedule($id, $data)
    {
        try {
            $stmt = $this->db->prepare("
                UPDATE schedules 
                SET train_id = :train_id, station_from = :station_from, station_to = :station_to, departure_date = :departure_date, departure_time = :departure_time, seats_left = :seats_left, arrival_time = :arrival_time, price = :price
                WHERE id = :id
            ");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':train_id', $data['train_id'], PDO::PARAM_INT);
            $stmt->bindParam(':station_from', $data['station_from'], PDO::PARAM_INT);
            $stmt->bindParam(':station_to', $data['station_to'], PDO::PARAM_INT);
            $stmt->bindParam(':departure_date', $data['departure_date']);
            $stmt->bindParam(':departure_time', $data['departure_time']);
            $stmt->bindParam(':seats_left', $data['seats_left'], PDO::PARAM_INT);
            $stmt->bindParam(':arrival_time', $data['arrival_time']);
            $stmt->bindParam(':price', $data['price']);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            throw new Exception('Error updating schedule: ' . $e->getMessage());
        }
    }

    public function deleteSchedule($id)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM schedules WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            throw new Exception('Error deleting schedule: ' . $e->getMessage());
        }
    }
}
