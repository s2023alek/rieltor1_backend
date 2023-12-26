<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->group( 'photos/upload', static function( $routes ) {
    $routes->get('/', 'Form::index');
    $routes->post('/', 'Form::store');
});

$routes->get('apartment/(:num)', 'Apartment::getOne/$1');
$routes->get('agents/(:num)', 'Rieltor::getOne/$1');

$routes->get('/', 'Home::index');
