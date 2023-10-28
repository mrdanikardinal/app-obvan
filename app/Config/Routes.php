<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/inventaris_gudang', 'InventarisGudang::index');
$routes->get('/inventaris_kamera', 'InventarisKamera::index');
$routes->get('/inventaris_sng_van', 'InventarisSNGVAN::index');
$routes->get('peminjaman-alat/display', 'PeminjamanAlat::index');
$routes->get('peminjaman-alat/create', 'PeminjamanAlat::create');
$routes->post('peminjaman-alat/save', 'PeminjamanAlat::save');
$routes->get('peminjaman-alat/edit/(:segment)', 'PeminjamanAlat::edit/$1');
$routes->post('peminjaman-alat/update/(:any)', 'PeminjamanAlat::update/$1');
$routes->delete('peminjaman-alat/display/(:segment)', 'PeminjamanAlat::delete/$1');
$routes->post('peminjaman-alat/edit/(:segment)/(:segment)', 'PeminjamanAlat::hapus/$2');