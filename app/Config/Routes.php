<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 ####################################################################################

$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::info');
$routes->get('/about', 'Home::about');
$routes->get('/listings/new', 'WanderLust::newlist');
$routes->post('/listings', 'WanderLust::addlist');
$routes->get('/all_listings', 'WanderLust::allshow');
$routes->get('/edit/(:num)', 'WanderLust::edit_list/$1');
$routes->post('/update','WanderLust::edited_list');
$routes->get('img/edit/(:num)', 'WanderLust::edit/$1');
$routes->post('img/update/(:num)','WanderLust::editedList/$1');
$routes->get('img/view/(:num)', 'WanderLust::single_view/$1');
$routes->get('img/delete/(:num)', 'WanderLust::single_delete/$1');

 #####################################################################################