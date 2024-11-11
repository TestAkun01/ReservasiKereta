<?php

namespace App\Core;

use Exception;

class Controller
{
    public function view($view, $data = [], $layout = 'main')
    {
        $viewPath = __DIR__ . '/../src/views/' . $view . '.php';
        $layoutPath = __DIR__ . '/../src/views/layouts/' . $layout . '.php';

        if (file_exists($viewPath)) {
            ob_start();
            require $viewPath;
            extract($data);
            $content = ob_get_clean();

            if (file_exists($layoutPath)) {
                require $layoutPath;
            } else {
                echo $content;
            }
        } else {
            throw new Exception("View not found: " . $view);
        }
    }

    function partial($partial, $data = [])
    {
        $partialPath = __DIR__ . '/../src/views/partials/' . $partial . '.php';
        if (file_exists($partialPath)) {
            extract($data);
            require $partialPath;
        } else {
            throw new Exception("Partial not found: " . $partial);
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
