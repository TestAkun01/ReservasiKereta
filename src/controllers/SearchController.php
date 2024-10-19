<?php

namespace App\Controllers;

use App\Core\Controller;

class SearchController extends Controller
{
    public function index()
    {
        $stationModel = $this->model('Station');
        $data['stations'] = $stationModel->getAllStations();
        $this->view('search/search', $data);
    }

    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $from = $_GET['from'] ?? null;
            $to = $_GET['to'] ?? null;
            $date = $_GET['date'] ?? null;
            $tickets = $_GET['tickets'] ?? null;

            $stationModel = $this->model('Station');
            $scheduleModel = $this->model('Schedule');
            $data = [
                'stations' => $stationModel->getAllStations(),
                'schedules' => $scheduleModel->getAvailableSchedules($from, $to, $date),
                'tickets' => $tickets
            ];
            $this->view('search/search', $data);
        } else {
            header("location: /");
            exit;
        }
    }
}
