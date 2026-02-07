<?php

use App\Controllers\UserController;
use App\Controllers\PostController;
use App\Controllers\AuthController;

session_start();

// Dashboard
$router->get('area-administrativa', 'UserController@indexDashboard');

// Usuários
$router->get('usuarios', 'UserController@index');
$router->get('usuarios/busca', 'UserController@search');
$router->post('usuarios/create', 'UserController@create');
$router->post('usuarios/update', 'UserController@update');
$router->post('usuarios/delete', 'UserController@delete');

// Posts (admin)
$router->get('posts', 'PostController@index');
$router->get('posts/busca', 'PostController@search');
$router->post('posts/create', 'PostController@create');
$router->post('posts/update', 'PostController@update');
$router->post('posts/delete', 'PostController@delete');

// Site público
$router->get('', 'PostController@indexHome');
$router->get('galeria', 'PostController@indexPosts');
$router->get('galeria/busca', 'PostController@searchPosts');
$router->get('post/{id}', 'PostController@indexUnique');

// Login
$router->get('login', 'AuthController@index');
$router->post('login', 'AuthController@login');
$router->get('logout', 'AuthController@logout');

?>
