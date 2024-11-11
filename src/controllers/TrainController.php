<?php

namespace App\Controllers;

use App\Core\Controller;

class TrainController extends Controller
{
    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $trainModel = $this->model("Train");
            $data["trains"] = $trainModel->getAllTrains();
            $this->view('admin/train/index', $data, "admin");
        }
    }

    public function create()
    {
        $trainModel = $this->model("Train");

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $this->view('admin/train/create', [], "admin");
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = [
                "name" => $_POST["name"],
                "total_seats" => $_POST["total_seats"],
                "class" => $_POST["class"],
                "carriage" => $_POST["carriage"],
                "status" => $_POST["status"]
            ];
            $trainModel->createTrain($data);
            header('Location: /admin/train');
            exit();
        }
    }

    public function edit($id)
    {
        $trainModel = $this->model("Train");
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $data["train"] = $trainModel->getTrainById($id);
            $this->view('admin/train/edit', $data, "admin");
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = [
                "name" => $_POST["name"],
                "total_seats" => $_POST["total_seats"],
                "class" => $_POST["class"],
                "carriage" => $_POST["carriage"],
                "status" => $_POST["status"]
            ];
            $trainModel->updateTrain($id, $data);
            header("Location: /admin/train");
            exit();
        }
    }


    public function delete($id)
    {
        $trainModel = $this->model("Train");
        $trainModel->deleteTrain($id);
        header('Location: /admin/train');
        exit();
    }
}
