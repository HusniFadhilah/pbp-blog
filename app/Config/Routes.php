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

//About
$routes->add('/about', 'About::index');

//Admin
$routes->add('/admin', 'Admin::index');
$routes->add('/admin/edit/(:num)', 'Admin::edit/$1');
$routes->add('/admin/update/(:num)', 'Admin::update/$1');
$routes->add('/admin/reset_penulis', 'Admin::reset_penulis');
$routes->add('/admin/process_reset/(:num)', 'Admin::process_reset/$1');
$routes->add('/admin/ubahpassword/(:num)', 'Admin::ubahPassword/$1');
$routes->add('/admin/updatepassword/(:num)', 'Admin::updatePassword/$1');

//AuthAdmin
$routes->add('/authadmin', 'AuthAdmin::index');
$routes->add('/authadmin/login', 'AuthAdmin::login');
$routes->add('/authadmin/logout', 'AuthAdmin::logout');

//AuthPenulis
$routes->add('/authpenulis', 'AuthPenulis::index');
$routes->add('/authpenulis/login', 'AuthPenulis::login');
$routes->add('/authpenulis/register', 'AuthPenulis::register');
$routes->add('/authpenulis/processregister', 'AuthPenulis::processRegister');
$routes->add('/authpenulis/logout', 'AuthPenulis::logout');
$routes->add('/authpenulis/loginkomentar', 'AuthPenulis::loginkomentar');

//Kategori
$routes->add('/kategori', 'Kategori::index');
$routes->add('/kategori/create', 'Kategori::create');
$routes->add('/kategori/save', 'Kategori::save');
$routes->add('/kategori/delete/(:num)', 'Kategori::delete/$1');
$routes->add('/kategori/edit/(:num)', 'Kategori::edit/$1');
$routes->add('/kategori/update/(:num)', 'Kategori::update/$1');

//Komentar
$routes->add('/komentar/save', 'Komentar::save');
$routes->add('/komentar/data', 'Komentar::data');
$routes->add('/komentar/delete/(:num)', 'Komentar::delete/$1');

//Penulis
$routes->add('/kategori', 'Kategori::index');
$routes->add('/kategori/edit/(:num)', 'Kategori::edit/$1');
$routes->add('/kategori/update/(:num)', 'Kategori::update/$1');
$routes->add('/kategori/ubahpassword/(:num)', 'Kategori::ubahPassword/$1');
$routes->add('/kategori/updatepassword/(:num)', 'Kategori::updatePassword/$1');

//Post
$routes->add('/post', 'Post::index');
$routes->add('/post/detail/(:segment)', 'Post::detail/$1');
$routes->add('/post/data', 'Post::data');
$routes->add('/post/add', 'Post::add');
$routes->add('/post/save', 'Post::save');
$routes->add('/post/edit/(:num)', 'Post::edit/$1');
$routes->add('/post/update/(:num)', 'Post::update/$1');
$routes->add('/post/delete/(:num)', 'Post::delete/$1');
$routes->add('/post/category/(:segment)', 'Post::category/$1');

//// API ROUTES ////
$routes->get('/api/post', 'API/Post::index');
$routes->get('/api/komentar', 'API/Komentar::index');
$routes->get('/api/kategori', 'API/Kategori::index');

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
