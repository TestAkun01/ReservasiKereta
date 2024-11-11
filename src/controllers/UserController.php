<?php

namespace App\Controllers;

use App\Core\Controller;

class UserController extends Controller
{
    public function auth()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $action = $_POST['action'] ?? '';

            $userModel = $this->model("User");

            if ($action === 'register') {
                if ($userModel->userExists($username)) {
                    $this->view("user/status/failure", ["message" => "Username already exists!"]);
                    return;
                }

                if ($userModel->createUser($username, $password)) {
                    $this->view("user/status/success", ["message" => "Registration successful!"]);
                } else {
                    $this->view("user/status/failure", ["message" => "Registration failed. Please try again."]);
                }
            } elseif ($action === 'login') {
                $user = $userModel->getUserByUsername($username);

                if ($user && $userModel->verifyUser($username, $password)) {
                    $_SESSION['user'] = [
                        'id' => $user['id'],
                        'username' => $user['username'],
                        'role' => $user['role']
                    ];

                    $this->view("user/status/success", ["message" => "Login successful! Will redirect after 5 seconds!"]);
                } else {
                    $this->view("user/status/failure", ["message" => "Login failed. Incorrect username or password."]);
                }
            }
        } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->view("user/auth");
        }
    }


    public function dashboard()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }

        $userId = $_SESSION['user']['id'];
        $reservationModel = $this->model("Reservation");
        $reservations = $reservationModel->getUserReservations($userId);

        $this->view("user/dashboard", ["reservations" => $reservations]);
    }

    public function logout(): void
    {
        session_destroy();
        header("Location: /");
        exit;
    }

    public function index()
    {
        $userModel = $this->model("User");
        $data["users"] = $userModel->getAllUsers();
        $this->view("admin/user/index", $data, "admin");
    }

    public function edit($id)
    {
        $userModel = $this->model("User");
        if ($_SERVER["REQUEST_METHOD"] == "GET") {

            $data["user"] = $userModel->getUserById($id);
            $this->view("admin/user/edit", $data, "admin");
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            $userModel->updateRoleUser($id, $_POST);
            header("Location: /admin/user");
            exit;
        }
    }

    public function delete($id)
    {
        $userModel = $this->model("User");
        $userModel->deleteUser($id);
        header("Location: /admin/user");
    }
}
