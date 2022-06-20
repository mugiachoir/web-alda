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
$routes->get('/', 'Pages::index');
$routes->get('/home', 'Pages::home');
$routes->get('/profil', 'Pages::profil');
$routes->get('/galeri', 'Pages::galeri');
$routes->post('/galeri', 'Pages::galeri');
$routes->post('/teacher/save', 'Teacher::save');
$routes->get('/ppdb/register', 'Ppdb::register');
$routes->post('/ppdb/save', 'Ppdb::save');
$routes->post('/login/validasi', 'Login::validasi');
$routes->get('/login/validasi', 'Login::error');
$routes->get('/teacher/save', 'Teacher::create');
$routes->get('/teacher/edit/(:num)', 'Teacher::edit/$1');
$routes->delete('/teacher/(:num)', 'Teacher::delete/$1');
$routes->delete('/admin/users/(:num)', 'Admin::deleteUser/$1');
$routes->delete('/admin/pengumuman/(:num)', 'Admin::deletePengumuman/$1');
$routes->delete('/admin/news/(:num)', 'Admin::deleteNews/$1');
$routes->delete('/admin/galeri/(:num)', 'Admin::deleteGaleri/$1');
$routes->get('/ppdb/download', 'Ppdb::index');
$routes->post('/ppdb/download', 'Ppdb::download');
$routes->get('/ppdb/email', 'Ppdb::index');
$routes->post('/ppdb/email', 'Ppdb::email');
$routes->get('/ppdb/userDownload', 'Ppdb::email');
$routes->get('/akademik/(:any)', 'Akademik::detail/$1');
$routes->post('/akademik/(:any)', 'Akademik::detail/$1');
/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
