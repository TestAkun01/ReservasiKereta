<?php

namespace App\Controllers;

use App\Core\Controller;

class TrainController extends Controller
{
    public function index()
    {
        $stationModel = $this->model('Station');
        $data['stations'] = $stationModel->getAllStations();
        $this->view('search', $data);
    }

    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $from = $_GET['from'] ?? null;
            $to = $_GET['to'] ?? null;
            $date = $_GET['date'] ?? null;
            $tickets = $_GET['tickets'] ?? null;

            $scheduleModel = $this->model('Schedule');
            $availableSchedules = $scheduleModel->getAvailableSchedules($from, $to, $date, $tickets);

            $data['schedules'] = $availableSchedules;
            $data['tickets'] = $tickets;
            $this->view('result', $data);
        } else {
            header("location: /");
            exit;
        }
    }
}
