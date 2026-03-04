<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;

$router = new Router();

$router->get('/', 'UsuarioController@index');
$router->get('/create', 'UsuarioController@create');
$router->get('/edit/{id}', 'UsuarioController@edit');
$router->post('/update', 'UsuarioController@update');
$router->post('/store', 'UsuarioController@store');
$router->get('/delete', 'UsuarioController@delete');

$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);