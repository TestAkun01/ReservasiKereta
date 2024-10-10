<?php

namespace App\Controllers;

use App\Core\Controller;

class ReservationController extends Controller
{
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $schedule_id = $_POST['schedule_id'];
            $tickets = $_POST['tickets'];
            $user_id = $_POST['user_id'] ?? null;

            $data = [
                'schedule_id' => $schedule_id,
                'tickets' => $tickets,
                'user_id' => $user_id,
            ];

            $this->view('reservation/reserve', $data);
        }
    }

    public function confirm()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $schedule_id = $_POST['schedule_id'];
            $tickets = $_POST['tickets'];
            $user_id = $_POST['user_id'] ?? null;
            $name = $_POST['name'] ?? null;
            $identity = $_POST['identity'] ?? null;
            $contact = $_POST['contact'] ?? null;
            $contact = $_POST['contact'] ?? null;
            $email = $_POST['email'] ?? null;

            if (!$schedule_id || !$tickets || ((!$name || !$identity || !$contact || !$email))) {
                header("location: /reservation?error=Invalid input");
                exit;
            }

            $reservationModel = $this->model('Reservation');

            if ($reservationModel->checkAndBookTickets($schedule_id, $tickets, $user_id, $name, $identity, $contact, $email)) {
                header("location: /reservation/result?status=success&tickets=$tickets");
                exit;
            } else {
                header("location: /reservation/result?status=failure");
                exit;
            }
        } else {
            $this->view("reservation/reserve");
            exit;
        }
    }

    public function result()
    {
        $status = isset($_GET["status"]) ? $_GET["status"] : null;
        $tickets = isset($_GET['tickets']) ? $_GET['tickets'] : null;

        if ($status == 'success') {
            $this->view("reservation/status/success", ["tickets" => $tickets]);
        } elseif ($status == "failure") {
            $this->view("reservation/status/failure");
        } else {
            header("location: /");
            exit;
        }
    }
}
