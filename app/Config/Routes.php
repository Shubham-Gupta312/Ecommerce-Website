<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');
$routes->get('/register', 'HomeController::register');
$routes->post('/register', 'HomeController::register');
$routes->get('/login', 'HomeController::login');
$routes->post('/login', 'HomeController::login');
$routes->get('/logout', 'HomeController::logout');


// Admin Routes
$routes->group('admin', static function ($routes) {
    $routes->get('admin_dashboard', 'AdminController::admin_dashboard');
});
