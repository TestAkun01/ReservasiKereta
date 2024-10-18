<?php

namespace App\Controllers;

use App\Core\Controller;

class ScheduleController extends Controller
{
    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $scheduleModel = $this->model("Schedule");
            $data["schedules"] = $scheduleModel->getAllSchedules();
            $this->view('admin/schedule/index', $data);
        }
    }
    public function create()
    {
        $trainModel = $this->model("Train");
        $scheduleModel = $this->model("Schedule");
        $stationModel = $this->model("Station");

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $data["stations"] = $stationModel->getAllStations();
            $data["trains"] = $trainModel->getAllActiveTrains();
            $this->view('admin/schedule/create', $data);
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {

            $data = [
                'train_id' => $_POST['train_id'] ?? null,
                'station_from' => $_POST['station_from'] ?? null,
                'station_to' => $_POST['station_to'] ?? null,
                'departure_date' => $_POST['departure_date'] ?? null,
                'departure_time' => $_POST['departure_time'] ?? null,
                'arrival_time' => $_POST['arrival_time'] ?? null,
                'price' => $_POST['price'] ?? null
            ];

            $data["seats_left"] = $trainModel->getTrainById($data['train_id'])["total_seats"];
            $scheduleModel->createSchedule($data);
            header('Location: /admin/schedule');
            exit();
        }
    }

    public function edit($id)
    {
        $trainModel = $this->model("Train");
        $stationModel = $this->model("Station");
        $scheduleModel = $this->model("Schedule");

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $data["schedule"] = $scheduleModel->getScheduleById($id);
            $data["stations"] = $stationModel->getAllStations();
            $data["trains"] = $trainModel->getAllActiveTrains();
            $this->view('admin/schedule/edit', $data);
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = [
                'train_id' => $_POST['train_id'] ?? null,
                'station_from' => $_POST['station_from'] ?? null,
                'station_to' => $_POST['station_to'] ?? null,
                'departure_date' => $_POST['departure_date'] ?? null,
                'departure_time' => $_POST['departure_time'] ?? null,
                'seats_left' => $_POST['seats_left'] ?? null,
                'arrival_time' => $_POST['arrival_time'] ?? null,
                'price' => $_POST['price'] ?? null
            ];
            $scheduleModel->updateSchedule($id, $data);
            header('Location: /admin/schedule');
            exit();
        }
    }

    public function delete($id)
    {
        $scheduleModel = $this->model("Schedule");
        $scheduleModel->deleteSchedule($id);
        header('Location: /admin/schedule');
        exit();
    }
}
