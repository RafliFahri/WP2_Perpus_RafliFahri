<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// Tugas Pertemuan 5.2
$routes->get('/menu', 'Menu::index');
$routes->post('/menu/create', 'Menu::create');
$routes->post('/menu/update', 'Menu::update');
$routes->delete('/menu/delete/(:num)', 'Menu::delete/$1');
$routes->post('/menu/delete/(:num)', 'Menu::delete/$1');