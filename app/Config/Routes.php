<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/contact-us', 'Contact::index');
$routes->get('/gallery', 'Gallery::index');
$routes->get('/about-us', 'About::index');
$routes->get('/board-of-directors', 'About::board_directors');
$routes->get('/senior-management', 'About::senior_management');
$routes->get('/product-services', 'Business::index');
$routes->get('/investor-relations', 'Contact::index');
//auth
$routes->get('/login', 'Auth::login');
$routes->post('/login_proses', 'Auth::login_proses');
$routes->get('/register', 'Auth::register');
$routes->post('/register_proses', 'Auth::register_proses');
$routes->get('/logout', 'Auth::logout');
//admin
$routes->get('/admin', 'Admin::index',['filter' => 'auth']);
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
