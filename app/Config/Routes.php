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
// $routes->get('/admin', 'Admin::index',['filter' => 'auth']);
$routes->get('/admin', 'Admin/Dashboard::index',['filter' => 'auth']);
$routes->get('/admin/image', 'Admin/Image::index',['filter' => 'auth']);
$routes->get('/admin/image-gallery', 'Admin/Image::gallery',['filter' => 'auth']);
$routes->get('/admin/image-url', 'Admin/Image::url',['filter' => 'auth']);
$routes->post('/admin/image', 'Admin/Image::upload_gallery',['filter' => 'auth']);
$routes->group('api',['filter' => 'auth'], function($routes)
{
    $routes->get('media-upload', 'Admin/Image::media_upload');
	$routes->post('media-upload', 'Admin/Image::post_media_upload');
});
$routes->get('/admin/board-of-directors', 'Admin/Image::board_directors',['filter' => 'auth']);
$routes->get('/admin/table-our-business', 'Admin/Table::our_business',['filter' => 'auth']);
$routes->get('/api/table-our-business', 'Admin/Table::get_our_business');
$routes->post('/api/table-our-business/(:num)/(:any)', 'Admin/Table::post_our_business/$1/$2');

$routes->get('/admin/setting', 'Admin/Setting::index',['filter' => 'auth']);
$routes->get('/admin/setting-pages', 'Admin/Setting::pages',['filter' => 'auth']);
$routes->get('/admin/setting-info', 'Admin/Setting::info',['filter' => 'auth']);
$routes->post('/admin/setting-info', 'Admin/Setting::update_info',['filter' => 'auth']);
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
