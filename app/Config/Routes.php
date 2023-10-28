<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// $routes->get('/', 'Dashboard::index');
$routes->get('/inventaris_gudang', 'InventarisGudang::index');
$routes->get('/inventaris_kamera', 'InventarisKamera::index');
$routes->get('/inventaris_sng_van', 'InventarisSNGVAN::index');
$routes->get('/peminjaman_alat', 'PeminjamanAlat::index');
// $routes->get('/tambah_peminjaman_alat', 'TambahPeminjamanAlat::index');
// $routes->get('/peminjaman_alat/tambah_peminjaman_alat', 'TambahPeminjamanAlat::index');
$routes->get('/peminjaman_alat/create', 'PeminjamanAlat::create');
$routes->get('/peminjaman_alat/test', 'PeminjamanAlat::test');
$routes->get('/peminjaman_alat/edit/(:segment)', 'PeminjamanAlat::edit/$1');

$routes->post('/peminjaman_alat/save', 'PeminjamanAlat::save');
// $routes->post('/peminjaman_alat/(:segment)', 'PeminjamanAlat::formedit');

$routes->post('/peminjaman_alat/update/(:any)', 'PeminjamanAlat::update/$1');
$routes->get('/peminjaman_alat/(:segment)', 'PeminjamanAlat::delete/$1');
// $routes->delete('/peminjaman_alat/(:segment)', 'PeminjamanAlat::delete/$1');
$routes->post('/peminjaman_alat/edit/(:segment)/(:segment)', 'PeminjamanAlat::hapus/$2');
// $routes->delete('/peminjaman_alat/edit/(:segment)/(:segment)', 'PeminjamanAlat::deletemerk/$1/$2');