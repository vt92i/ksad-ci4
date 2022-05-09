<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

// Book
$routes->get('/books', 'Book::index');
$routes->get('/book-details/(:any)', 'Book::bookDetails/$1');
$routes->get('/add-book', 'Book::addBook');
$routes->post('/add-book', 'Book::addBook');

$routes->get('/edit-book/(:any)', 'Book::editBook/$1');
$routes->post('/edit-book/(:any)', 'Book::editBook/$1');

$routes->get('/delete-book/(:num)', 'Book::deleteBook/$1');

// Gallery
$routes->get('/gallery', 'Gallery::index');
$routes->post('/gallery', 'Gallery::addGallery');
$routes->get('/delete-gallery/(:any)', 'Gallery::deleteGallery/$1');

// Supplier
$routes->get('/suppliers', 'Supplier::index');
$routes->get('/add-supplier', 'Supplier::addSupplier');
$routes->post('/add-supplier', 'Supplier::addSupplier');

$routes->get('/edit-supplier/(:num)', 'Supplier::editSupplier/$1');
$routes->post('/edit-supplier/(:num)', 'Supplier::editSupplier/$1');

$routes->get('/delete-supplier/(:num)', 'Supplier::deleteSupplier/$1');

// Customers
$routes->get('/customer', 'Customer::index')->setAutoRoute(true);
$routes->addRedirect('/customers', 'customer/index');

// phpinfo()
$routes->get('/phpinfo', 'phpinfo::index');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}