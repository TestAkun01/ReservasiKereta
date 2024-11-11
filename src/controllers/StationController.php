<?php

namespace App\Controllers;

use App\Core\Controller;

class StationController extends Controller
{
    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $stationModel = $this->model("Station");
            $data["stations"] = $stationModel->getAllstations();
            $this->view('admin/station/index', $data, "admin");
        }
    }

    public function create()
    {
        $stationModel = $this->model("Station");

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $this->view('admin/station/create', [], 'admin');
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = [
                "name" => $_POST["name"],
                "city" => $_POST["city"]
            ];
            $stationModel->createStation($data);
            header('Location: /admin/station');
            exit();
        }
    }

    public function edit($id)
    {
        $stationModel = $this->model("station");
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $data["station"] = $stationModel->getStationById($id);
            $this->view('admin/station/edit', $data, "admin");
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = [
                "name" => $_POST["name"],
                "city" => $_POST["city"],
            ];
            $stationModel->updateStation($id, $data);
            header("Location: /admin/station");
            exit();
        }
    }


    public function delete($id)
    {
        $stationModel = $this->model("station");
        $stationModel->deleteStation($id);
        header('Location: /admin/station');
        exit();
    }
}
