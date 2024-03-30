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
$routes->get('surat-tugas/shifting/(:segment)', 'User::shifting/$1');
// $routes->PUT('surat-tugas/shifting/(:segment)', 'User::shifting/$1');
$routes->get('surat-tugas/lembur/(:segment)', 'User::lembur/$1');
// $routes->get('surat-tugas/lembur', 'User::lembur');
// $routes->get('surat-tugas/penerima_pinjam', 'User::penerima_pinjam');
// $routes->get('surat-tugas/pemberi_pinjam', 'User::pemberi_pinjam');
// $routes->get('surat-tugas/out_broadcast', 'User::out_broadcast');
// $routes->get('user/print_penerima_pinjam/(:any)','PdfController::print_penerima_pinjam/$1');
// $routes->get('user/print_pemberi_pinjam/(:any)','PdfController::print_pemberi_pinjam/$1');
$routes->PUT('user/print_pemberi_pinjam_preview/(:any)', 'PdfController::print_pemberi_pinjam_preview/$1');
$routes->PUT('user/print_pemberi_pinjam_download/(:any)', 'PdfController::print_pemberi_pinjam_download/$1');
$routes->PUT('user/print_penerima_pinjam_preview/(:any)', 'PdfController::print_penerima_pinjam_preview/$1');
$routes->PUT('user/print_penerima_pinjam_download/(:any)', 'PdfController::print_penerima_pinjam_download/$1');
// $routes->PUT('user/out_broadcast/(:any)', 'PdfController::out_broadcast/$1');
$routes->PUT('user/out_broadcast/download/(:segment)', 'PdfController::out_broadcast_download/$1');
$routes->PUT('user/out_broadcast/preview/(:segment)', 'PdfController::out_broadcast_preview/$1');

// $routes->PUT('user/peralatan_out_outbroadcast_download/(:segment)', 'PdfController::out_broadcast_download/$1');
// $routes->get('user/peralatan_out_outbroadcast_preview/(:segment)', 'PdfController::peralatan_out_outbroadcast_preview/$1');
$routes->PUT('user/peralatan_out_broadcast/preview/(:segment)', 'PdfController::peralatan_out_outbroadcast_preview/$1');
$routes->PUT('user/peralatan_out_broadcast/download/(:segment)', 'PdfController::peralatan_out_outbroadcast_download/$1');

// $routes->PUT('user/index/(:segment)', 'PdfController::print/$1');
//end user

//out-broadcast
$routes->get('out-broadcast', 'OutBroadcast::index');
// $routes->PUT('out-broadcast/peralatan-crew-ob/(:segment)', 'OutBroadcast::peralatancrewob/$1');
$routes->get('out-broadcast/peralatan-crew-ob/(:segment)', 'OutBroadcast::peralatancrewob/$1');
$routes->delete('out-broadcast/(:segment)', 'OutBroadcast::delete/$1');
$routes->PUT('out-broadcast/edit/(:segment)', 'OutBroadcast::edit/$1');
$routes->get('out-broadcast/create', 'OutBroadcast::create');
$routes->post('out-broadcast/save', 'OutBroadcast::save');
$routes->post('out-broadcast/update/(:any)', 'OutBroadcast::update/$1');
$routes->post('out-broadcast/edit/(:segment)/(:segment)', 'OutBroadcast::hapus/$2');
$routes->put('out-broadcast/edit/(:segment)/(:segment)', 'OutBroadcast::hapusinv/$2');
//end-outbroadcast

//start dinas lembur
$routes->get('dinas-lembur', 'DinasLembur::index');

//end dinas lembur

//start dinas shifting
$routes->get('dinas-shifting', 'DinasShifting::index');
$routes->get('dinas-shifting/create', 'DinasShifting::create');
$routes->post('dinas-shifting/save', 'DinasShifting::save');
$routes->delete('dinas-shifting/(:segment)', 'DinasShifting::delete/$1');
$routes->PUT('dinas-shifting/edit/(:segment)', 'DinasShifting::edit/$1');
$routes->POST('dinas-shifting/edit/(:segment)/(:segment)', 'DinasShifting::hapusdinasshift/$2');
$routes->post('dinas-shifting/update/(:any)', 'DinasShifting::update/$1');
//end dinas shifting



// multiuser

// $routes->get('/', 'User::index');
// $routes->get('/user', 'User::index');
// $routes->get('/admin', 'Admin::index',['filter'=>'role:admin']);
// $routes->get('/admin/index', 'Admin::index',['filter'=>'role:admin']);
// $routes->get('/admin/(:num)', 'Admin::detail/$1',['filter'=>'role:admin']);
// end multiuser