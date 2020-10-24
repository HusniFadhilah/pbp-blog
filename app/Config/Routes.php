<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Post::index');

//Admin
$routes->get('/admin', 'Admin::index');
$routes->get('/admin/edit/(:num)', 'Admin::edit/$1');
$routes->get('/admin/update/(:num)', 'Admin::update/$1');
$routes->get('/admin/reset_penulis', 'Admin::reset_penulis');
$routes->get('/admin/process_reset/(:num)', 'Admin::process_reset/$1');
$routes->get('/admin/ubahpassword/(:num)', 'Admin::ubahPassword/$1');
$routes->get('/admin/updatepassword/(:num)', 'Admin::updatePassword/$1');

//AuthAdmin
$routes->get('/authadmin', 'AuthAdmin::index');
$routes->get('/authadmin/login', 'AuthAdmin::login');
$routes->get('/authadmin/logout', 'AuthAdmin::logout');

//AuthPenulis
$routes->get('/authpenulis', 'AuthPenulis::index');
$routes->get('/authpenulis/login', 'AuthPenulis::login');
$routes->get('/authpenulis/register', 'AuthPenulis::register');
$routes->get('/authpenulis/processregister', 'AuthPenulis::processRegister');
$routes->get('/authpenulis/logout', 'AuthPenulis::logout');
$routes->get('/authpenulis/loginkomentar', 'AuthPenulis::loginkomentar');

//Kategori
$routes->get('/kategori', 'Kategori::index');
$routes->get('/kategori/create', 'Kategori::create');
$routes->get('/kategori/save', 'Kategori::save');
$routes->get('/kategori/delete/(:num)', 'Kategori::delete/$1');
$routes->get('/kategori/edit/(:num)', 'Kategori::edit/$1');
$routes->get('/kategori/update/(:num)', 'Kategori::update/$1');

//Komentar
$routes->get('/komentar/save', 'Komentar::save');
$routes->get('/komentar/data', 'Komentar::data');
$routes->get('/komentar/delete/(:num)', 'Komentar::delete/$1');

//Penulis
$routes->get('/kategori', 'Kategori::index');
$routes->get('/kategori/edit/(:num)', 'Kategori::edit/$1');
$routes->get('/kategori/update/(:num)', 'Kategori::update/$1');
$routes->get('/kategori/ubahpassword/(:num)', 'Kategori::ubahPassword/$1');
$routes->get('/kategori/updatepassword/(:num)', 'Kategori::updatePassword/$1');

//Post
$routes->get('/post', 'Post::index');
$routes->get('/post/detail/(:segment)', 'Post::detail/$1');
$routes->get('/post/data', 'Post::data');
$routes->get('/post/add', 'Post::add');
$routes->get('/post/save', 'Post::save');
$routes->get('/post/edit/(:num)', 'Post::edit/$1');
$routes->get('/post/update/(:num)', 'Post::update/$1');
$routes->get('/post/delete/(:num)', 'Post::delete/$1');
$routes->get('/post/category/(:segment)', 'Post::category/$1');



/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
