<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'PdfController::index');

// start peminjaman
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
$routes->get('admin/inventaris', 'Inventaris::index',['filter'=>'role:admin']);
$routes->get('admin/inventaris/index', 'Inventaris::index',['filter'=>'role:admin']);
$routes->get('admin/inventaris/create', 'Inventaris::create',['filter'=>'role:admin']);
$routes->post('admin/inventaris/save', 'Inventaris::save',['filter'=>'role:admin']);
$routes->PUT('admin/inventaris/edit/(:segment)', 'Inventaris::edit/$1',['filter'=>'role:admin']);
$routes->delete('admin/inventaris/(:segment)', 'Inventaris::delete/$1',['filter'=>'role:admin']);
$routes->post('admin/inventaris/update/(:any)', 'Inventaris::update/$1',['filter'=>'role:admin']);
//end inventaris



// multiuser

// $routes->get('/', 'User::index');
// $routes->get('/user', 'User::index');
// $routes->get('/admin', 'Admin::index',['filter'=>'role:admin']);
// $routes->get('/admin/index', 'Admin::index',['filter'=>'role:admin']);
// $routes->get('/admin/(:num)', 'Admin::detail/$1',['filter'=>'role:admin']);
// end multiuser