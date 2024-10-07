<?php

namespace App\Controllers;

use App\Core\Controller;

class TestController extends Controller
{
    public function index($id)
    {
        echo "Test Dynamic Router: $id";
    }
}
