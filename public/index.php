<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';

use App\Core\Router;

$router = new Router();

$router->get('/', 'SearchController@index');

$router->get('/train/search', 'SearchController@search');
$router->post('/train/search', 'SearchController@search');

$router->post('/reservation', 'ReservationController@index');
$router->post('/reservation/confirm', 'ReservationController@confirm');
$router->get('/reservation/result', 'ReservationController@result');

$router->get("/user/auth", "UserController@auth");
$router->post("/user/auth", "UserController@auth");

$router->get("/user/dashboard", "UserController@dashboard");

$router->get("/user/logout", "UserController@logout");

$router->get("/admin/schedule", "ScheduleController@index");

$router->get("/admin/schedule/create", "ScheduleController@create");
$router->post("/admin/schedule/create", "ScheduleController@create");

$router->get("/admin/schedule/edit/{id}", "ScheduleController@edit");
$router->post("/admin/schedule/edit/{id}", "ScheduleController@edit");
$router->get("/admin/schedule/delete/{id}", "ScheduleController@delete");


$router->get("/test/{id}", "TestController@index");

$router->resolve();
