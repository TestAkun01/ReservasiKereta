<?php

namespace App\Middlewares;

class AuthMiddleware
{
    public function checkUserSession()
    {
        if (isset($_SESSION["user"])) {
            header("Location: /");
            exit;
        }
    }
}
