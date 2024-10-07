<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../config/database.php';

use App\Core\Router;

$router = new Router();

$router->get('/', 'TrainController@index');

$router->get('/train/search', 'TrainController@search');
$router->post('/train/search', 'TrainController@search');

$router->post('/reservation', 'ReservationController@index');
$router->get('/reservation/result', 'ReservationController@result');

$router->get("/user/login", "UserController@login");
$router->post("/user/login", "UserController@login");

$router->get("/user/register", "UserController@register");
$router->post("/user/register", "UserController@register");

$router->get("/user/dashboard", "UserController@dashboard");

$router->get("/user/logout", "UserController@logout");


$router->get("/test/{id}", "TestController@index");

$router->resolve();
