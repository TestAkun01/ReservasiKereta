<?php

namespace App\Controllers;

use App\Core\Controller;

class ErrorController extends Controller
{
    public function notFound()
    {
        http_response_code(404);
        $this->view("errors/notFound");
    }
}
