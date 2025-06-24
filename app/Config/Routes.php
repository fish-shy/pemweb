<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->group('', ['namespace' => 'App\Modules\Dashboard\Controllers'], function ($routes) {
    $routes->get('/', 'Dashboard::index');
});

$routes->group('user', ['namespace' => 'App\Modules\User\Controllers'], function ($routes) {
    $routes->get('/', 'User::index');
    $routes->get('add-user', 'User::addUser');
    $routes->post('create', 'User::create');
    $routes->get('edit/(:num)', 'User::edit/$1');
    $routes->post('update/(:num)', 'User::update/$1');
    $routes->get('delete/(:num)', 'User::delete/$1');
});

$routes->group('product', ['namespace' => 'App\Modules\Product\Controllers'], function ($routes) {
    $routes->get('/', 'Product::index');
    $routes->get('add-product', 'Product::addProduct');
    $routes->post('create', 'Product::create');
    $routes->get('edit/(:num)', 'Product::edit/$1');
    $routes->post('update/(:num)', 'Product::update/$1');
    $routes->get('delete/(:num)', 'Product::delete/$1');
});


$routes->group('category', ['namespace' => 'App\Modules\Category\Controllers'], function ($routes) {
    $routes->get('/', 'Category::index');
    $routes->get('add-category', 'Category::addCategory');
    $routes->post('create', 'Category::create');
    $routes->get('edit/(:num)', 'Category::edit/$1');
    $routes->post('update/(:num)', 'Category::update/$1');
    $routes->get('delete/(:num)', 'Category::delete/$1');

});


$routes->group('', ['namespace' => 'App\Modules\Auth\Controllers'], function ($routes) {
    $routes->get('login', 'Auth::login');
    $routes->post('processLogin', 'Auth::processLogin');
    $routes->get('register', 'Auth::register');
    $routes->post('processRegister', 'Auth::processRegister');
    $routes->get('logout', 'Auth::logout');
});
