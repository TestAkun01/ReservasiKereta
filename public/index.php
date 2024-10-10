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


$router->get("/test/{id}", "TestController@index");

$router->resolve();
