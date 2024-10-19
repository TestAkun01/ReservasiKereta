<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';

use App\Core\Router;

$router = new Router();

$router->addGlobalMiddleware("AdminMiddleware@checkRole");

$router->get('/', 'SearchController@index');

$router->get('/train/search', 'SearchController@search');
$router->post('/train/search', 'SearchController@search');

$router->post('/reservation', 'ReservationController@index');
$router->post('/reservation/create', 'ReservationController@create');
$router->get('/reservation/result', 'ReservationController@result');

// user
$router->get("/user/auth", "UserController@auth",   "AuthMiddleware@checkUserSession");
$router->post("/user/auth", "UserController@auth");

$router->get("/user/dashboard", "UserController@dashboard");

$router->get("/user/logout", "UserController@logout");

// Admin

$router->get("/admin", "AdminController@index");

// Schedule
$router->get("/admin/schedule", "ScheduleController@index");

$router->get("/admin/schedule/create", "ScheduleController@create");
$router->post("/admin/schedule/create", "ScheduleController@create");

$router->get("/admin/schedule/edit/{id}", "ScheduleController@edit");
$router->post("/admin/schedule/edit/{id}", "ScheduleController@edit");
$router->get("/admin/schedule/delete/{id}", "ScheduleController@delete");

// Train
$router->get("/admin/train", "TrainController@index");

$router->get("/admin/train/create", "TrainController@create");
$router->post("/admin/train/create", "TrainController@create");

$router->get("/admin/train/edit/{id}", "TrainController@edit");
$router->post("/admin/train/edit/{id}", "TrainController@edit");
$router->get("/admin/train/delete/{id}", "TrainController@delete");

// Station
$router->get("/admin/station", "StationController@index");

$router->get("/admin/station/create", "StationController@create");
$router->post("/admin/station/create", "StationController@create");

$router->get("/admin/station/edit/{id}", "StationController@edit");
$router->post("/admin/station/edit/{id}", "StationController@edit");
$router->get("/admin/station/delete/{id}", "StationController@delete");

// User
$router->get("/admin/user", "UserController@index");

$router->get("/admin/user/edit/{id}", "UserController@edit");
$router->post("/admin/user/edit/{id}", "UserController@edit");
$router->get("/admin/user/delete/{id}", "UserController@delete");


$router->get("/test/{id}", "TestController@index");

$router->resolve();
