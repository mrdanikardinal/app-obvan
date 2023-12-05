<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// start peminjaman
$routes->get('/inventaris_gudang', 'InventarisGudang::index');
$routes->get('/inventaris_kamera', 'InventarisKamera::index');
$routes->get('/inventaris_sng_van', 'InventarisSNGVAN::index');
$routes->get('peminjaman-alat', 'PeminjamanAlat::index');
$routes->get('peminjaman-alat/create', 'PeminjamanAlat::create');
$routes->post('peminjaman-alat/save', 'PeminjamanAlat::save');
$routes->PUT('peminjaman-alat/edit/(:segment)', 'PeminjamanAlat::edit/$1');
$routes->get('peminjaman-alat/edit/(:segment)', 'PeminjamanAlat::edit/$1');
$routes->post('peminjaman-alat/update/(:any)', 'PeminjamanAlat::update/$1');
$routes->delete('peminjaman-alat/(:segment)', 'PeminjamanAlat::delete/$1');
$routes->post('peminjaman-alat/edit/(:segment)/(:segment)', 'PeminjamanAlat::hapus/$2');
//end peminjaman
//start inventaris
$routes->get('inventaris', 'Inventaris::index');
$routes->get('inventaris/create', 'Inventaris::create');
$routes->post('inventaris/save', 'Inventaris::save');
$routes->PUT('inventaris/edit/(:segment)', 'Inventaris::edit/$1');
$routes->delete('inventaris/(:segment)', 'Inventaris::delete/$1');
$routes->post('inventaris/update/(:any)', 'Inventaris::update/$1');


//end inventaris
//testing
// app/Config/Routes.php
$routes->get('product', 'PeminjamanAlat::index');
$routes->get('product/search', 'PeminjamanAlat::search');

