<?php

namespace App\Core;

use Exception;

class Controller
{
    public function view($view, $data = [])
    {
        $viewPath = __DIR__ . '/../views/' . $view . '.php';
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            throw new Exception("View not found: " . $view);
        }
    }

    public function model($model)
    {
        $modelClass = 'App\\Models\\' . ucfirst($model);
        if (class_exists($modelClass)) {
            return new $modelClass;
        } else {
            throw new Exception("Model not found: " . $model);
        }
    }
}
