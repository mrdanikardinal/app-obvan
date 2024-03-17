<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// $routes->get('/print', 'PdfController::print');
// $routes->get('/user/index', 'PdfController::print');
// $routes->get('/print/(:segment)', 'PdfController::print/$1');
// $routes->get('/print/(:segment)', 'PdfController::print/$1');
// $routes->get('user', 'PdfController::index');


// $routes->get('user/print/(:num)','PdfController::print/$1');

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
//start user
$routes->get('surat-tugas', 'User::index');
$routes->get('surat-tugas/index', 'User::index');
$routes->get('surat-tugas/penerima_pinjam', 'User::penerima_pinjam');
$routes->get('surat-tugas/pemberi_pinjam', 'User::pemberi_pinjam');
// $routes->get('user/print_penerima_pinjam/(:any)','PdfController::print_penerima_pinjam/$1');
// $routes->get('user/print_pemberi_pinjam/(:any)','PdfController::print_pemberi_pinjam/$1');
$routes->PUT('user/print_pemberi_pinjam/(:any)', 'PdfController::print_pemberi_pinjam/$1');
$routes->PUT('user/print_penerima_pinjam/(:any)', 'PdfController::print_penerima_pinjam/$1');
// $routes->PUT('user/index/(:segment)', 'PdfController::print/$1');
//end user

//out-broadcast
$routes->get('out-broadcast', 'OutBroadcast::index');
$routes->PUT('out-broadcast/peralatan-crew-ob/(:segment)', 'OutBroadcast::peralatancrewob/$1');
$routes->delete('out-broadcast/(:segment)', 'OutBroadcast::delete/$1');
$routes->PUT('out-broadcast/edit/(:segment)', 'OutBroadcast::edit/$1');
$routes->get('out-broadcast/create', 'OutBroadcast::create');
$routes->post('out-broadcast/save', 'OutBroadcast::save');
$routes->post('out-broadcast/update/(:any)', 'OutBroadcast::update/$1');
$routes->post('out-broadcast/edit/(:segment)/(:segment)', 'OutBroadcast::hapus/$2');
$routes->put('out-broadcast/edit/(:segment)/(:segment)', 'OutBroadcast::hapusinv/$2');


//end-outbroadcast




// multiuser

// $routes->get('/', 'User::index');
// $routes->get('/user', 'User::index');
// $routes->get('/admin', 'Admin::index',['filter'=>'role:admin']);
// $routes->get('/admin/index', 'Admin::index',['filter'=>'role:admin']);
// $routes->get('/admin/(:num)', 'Admin::detail/$1',['filter'=>'role:admin']);
// end multiuser