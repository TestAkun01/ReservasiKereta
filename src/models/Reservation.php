<?php

namespace App\Models;

use PDO;
use PDOException;
use Exception;
use App\Models\Mail;
use App\Core\Model;

class Reservation extends Model
{
    public function checkAndBookTickets($schedule_id, $tickets, $user_id, $name, $identity, $contact, $email)
    {
        try {
            $this->db->beginTransaction();

            $stmt = $this->db->prepare("SELECT seats_left FROM schedules WHERE id = :schedule_id FOR UPDATE");
            $stmt->bindParam(':schedule_id', $schedule_id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result['seats_left'] < $tickets) {
                $this->db->rollBack();
                return false;
            }

            $stmt = $this->db->prepare("UPDATE schedules SET seats_left = seats_left - :tickets WHERE id = :schedule_id");
            $stmt->bindParam(':tickets', $tickets, PDO::PARAM_INT);
            $stmt->bindParam(':schedule_id', $schedule_id, PDO::PARAM_INT);
            $stmt->execute();

            $stmt = $this->db->prepare("INSERT INTO reservation (schedule_id, num_tickets, user_id, name, identity, contact, email) VALUES (:schedule_id, :tickets, :user_id, :name, :identity, :contact, :email)");
            $stmt->bindParam(':schedule_id', $schedule_id, PDO::PARAM_INT);
            $stmt->bindParam(':tickets', $tickets, PDO::PARAM_INT);

            if ($user_id) {
                $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            } else {
                $stmt->bindValue(':user_id', null, PDO::PARAM_NULL);
            }

            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':identity', $identity, PDO::PARAM_STR);
            $stmt->bindParam(':contact', $contact, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            $reservation_id = $this->db->lastInsertId();

            $mail = new Mail();
            $mail->sendBookingConfirmation($email, $tickets, $schedule_id, $reservation_id);

            $this->db->commit();
            return true;
        } catch (PDOException $e) {
            $this->db->rollBack();
            throw new Exception('Database Error: ' . $e->getMessage());
        } catch (Exception $e) {
            $this->db->rollBack();
            throw new Exception('Booking failed: ' . $e->getMessage());
        }
    }


    public function getUserReservations($userId)
    {
        $stmt = $this->db->prepare("
            SELECT r.*, t.name AS train_name, s.departure_date, s.departure_time
            FROM reservation r 
            JOIN schedules s ON r.schedule_id = s.id 
            JOIN trains t ON s.train_id = t.id
            WHERE r.user_id = :user_id
        ");
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
