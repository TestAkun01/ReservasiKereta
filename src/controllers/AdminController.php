<?php

namespace App\Controllers;

use App\Core\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $trainModel = $this->model("Train");
        $scheduleModel = $this->model("Schedule");
        $stationModel = $this->model("Station");
        $userModel = $this->model("User");
        $reservationModel = $this->model("Reservation");
        $data = [
            "totalTrains" => $trainModel->getTotaltrains(),
            "totalSchedules" => $scheduleModel->getTotalSchedules(),
            "totalStations" => $stationModel->getTotalStations(),
            "totalUsers" => $userModel->getTotalUsers(),
            "totalReservations" => $reservationModel->getTotalReservations(),
            "recentReservations" => $reservationModel->getRecentReservations()
        ];
        $this->view('admin/dashboard', $data, "admin");
    }
}
