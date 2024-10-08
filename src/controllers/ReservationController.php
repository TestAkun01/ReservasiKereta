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
            $user_id = $_POST["user_id"];
            $reservationModel = $this->model('Reservation');

            if ($reservationModel->checkAndBookTickets($schedule_id, $tickets, $user_id)) {
                header("location: /reservation/result?status=success&tickets=$tickets");
                exit;
            } else {
                header("location: /reservation/result?status=failed");
                exit;
            }
        } else {
            header("Location: /");
            exit;
        }
    }

    public function result()
    {
        $status = isset($_GET["status"]) ? $_GET["status"] : null;
        $tickets = isset($_GET['tickets']) ? $_GET['tickets'] : null;

        if ($status == 'success') {
            $this->view("reservation/status/success", ["tickets" => $tickets]);
        } elseif ($status == "failed") {
            $this->view("reservation/status/failed");
        } else {
            header("location: /");
            exit;
        }
    }
}
