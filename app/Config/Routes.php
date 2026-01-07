<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'Pages::index');
$routes->get('/index', 'Pages::index');
$routes->get('/students/(:any)', 'Pages::detail/$1');
$routes->delete('students/(:num)', 'Pages::delete/$1');
$routes->get('/students/edit/(:segment)', 'Pages::edit/$1');
$routes->get('/contacts', 'Pages::contacts');
$routes->get('/pages/contacts', 'Pages::contacts');
$routes->setAutoRoute(true);


service('auth')->routes($routes);
