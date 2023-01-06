<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Catalog\Home::index');

//  User
$routes->get('/profile', 'Catalog\Home::myProfile');
$routes->get('/informasiReservasi', 'Catalog\Home::informasiReservasi');
$routes->get('/informasiReservasi/(:any)', 'Catalog\Home::detail/$1');
$routes->get('/bukti/(:any)/(:any)', 'Catalog\Home::bukti/$1/$2');

$routes->get('/user', 'Catalog\User::role');
$routes->get('/user/login', 'Catalog\User::login');
$routes->get('/user/logout', 'Catalog\User::logout');
$routes->get('/user/(:any)', 'Catalog\User::registration/$1');
$routes->post('user/inputRegist', 'Catalog\User::inputRegist');
$routes->post('user/uploadKTP', 'Catalog\User::uploadKTP');
$routes->post('user/cekLogin', 'Catalog\User::cekLogin');

$routes->get('/hotel', 'Catalog\Hotel::index');
// EndUser

// Umrah
$routes->get('/umrah', 'Catalog\Umrah::index');
$routes->match(['get', 'post'], 'umrah/paketumrah', 'Catalog\Umrah::paketumrah');
$routes->get('/umrah/paspor', 'Catalog\Umrah::paspor');
// $routes->get('/umrah/paymentonline', 'Catalog\Umrah::paymentonline');
// $routes->get('/umrah/reader', 'Catalog\Umrah::reader');
$routes->post('umrah/mrz', 'Catalog\Umrah::mrz');
$routes->post('umrah/pligrim', 'Catalog\Umrah::pligrim');
$routes->post('umrah/inputPligrim', 'Catalog\Umrah::inputPligrim');
$routes->post('umrah/payment', 'Catalog\Umrah::payment');
$routes->get('/umrah/infoJamaah/(:any)', 'Catalog\Umrah::infoJamaah/$1');
$routes->get('/umrah/(:segment)', 'Catalog\Umrah::detail/$1');
$routes->get('/umrah/checkout/(:any)', 'Catalog\Umrah::checkout/$1');
$routes->get('/umrah/confirm/(:any)', 'Catalog\Umrah::confirm/$1');
$routes->post('umrah/bookingPaket', 'Catalog\Umrah::bookingPaket');
$routes->get('umrah/bookingBukti/(:segment)/(:segment)', 'Catalog\Umrah::bookingBukti/$1/$2');
// End Umrah

$routes->get('/haji', 'Catalog\Haji::index');
$routes->get('/visa', 'Catalog\Visa::index');
$routes->post('visa/saveVisa', 'Catalog\Visa::saveVisa');
$routes->get('/penerbangan', 'Catalog\Penerbangan::index');

// Payment
$routes->post('payment/umrah/', 'Catalog\Payment::index');
$routes->match(['get', 'post'], 'payment/callback/', 'Catalog\Payment::callback');
// EndPayment

// #####################################
// ADMIN
// #####################################

$routes->get('/adminuser', 'Admin\Dashboard::index');

// User
$routes->put('adminuser/user/(:num)', 'Admin\User::approve/$1');
$routes->get('/adminuser/user/agent', 'Admin\User::index');
// EndUser

// Umrah
$routes->get('/adminuser/paketumrah', 'Admin\PaketUmrah::index');

$routes->get('/adminuser/paketumrah/add', 'Admin\PaketUmrah::add');

$routes->post('adminuser/paketumrah/insert', 'Admin\PaketUmrah::insert');

$routes->get('/adminuser/paketumrah/statpop', 'Admin\PaketUmrah::statpop');

$routes->get('/adminuser/paketumrah/remaining', 'Admin\PaketUmrah::remaining');

$routes->post('adminuser/paketumrah/remainded', 'Admin\PaketUmrah::remainded');

$routes->get('/adminuser/paketumrah/jamaah', 'Admin\PaketUmrah::jamaah');

$routes->get('/adminuser/paketumrah/(:any)', 'Admin\PaketUmrah::edit/$1');

$routes->post('adminuser/paketumrah/update', 'Admin\PaketUmrah::update');

$routes->delete('/adminuser/paketumrah/(:num)', 'Admin\PaketUmrah::delete/$1');

$routes->put('/adminuser/paketumrah/status/(:any)', 'Admin\PaketUmrah::status/$1');

$routes->put('/adminuser/paketumrah/populer/(:any)', 'Admin\PaketUmrah::populer/$1');
// EndtUmrah

// Hotel
$routes->get('/adminuser/hotel', 'Admin\Hotel::index');
$routes->get('/adminuser/hotel/add', 'Admin\Hotel::add');
$routes->post('adminuser/hotel/insert', 'Admin\Hotel::insert');
$routes->delete('/adminuser/hotel/(:num)', 'Admin\Hotel::delete/$1');
// EndHotel

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
