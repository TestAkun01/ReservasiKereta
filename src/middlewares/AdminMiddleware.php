<?php

namespace App\Middlewares;

class AdminMiddleware
{
    public static function checkRole()
    {
        $uri = $_SERVER['REQUEST_URI'];

        if (strpos($uri, '/admin/') === 0) {
            if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'Admin') {
                header('Location: /user/auth');
                exit;
            }
        }
    }
}
