<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/index', 'Home::index');
$routes->get('/dashboard', 'Dashboard::index');
// start peminjaman
$routes->get('peminjaman-alat/index', 'PeminjamanAlat::index');
$routes->get('peminjaman-alat', 'PeminjamanAlat::index');
$routes->get('peminjaman-alat/create', 'PeminjamanAlat::create');
$routes->post('peminjaman-alat/save', 'PeminjamanAlat::save');
$routes->PUT('peminjaman-alat/edit/(:segment)', 'PeminjamanAlat::edit/$1');
$routes->get('peminjaman-alat/edit/(:segment)', 'PeminjamanAlat::edit/$1');
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
$routes->get('admin/inventaris/edit/(:segment)', 'Inventaris::edit/$1',['filter'=>'role:admin']);
$routes->delete('admin/inventaris/(:segment)', 'Inventaris::delete/$1',['filter'=>'role:admin']);
$routes->post('admin/inventaris/update/(:segment)', 'Inventaris::update/$1',['filter'=>'role:admin']);
//end inventaris
// start status inventaris
//jenis barang
$routes->get('admin/status-inventaris','StatusInventaris::index',['filter'=>'role:admin']);
$routes->get('admin/status-inventaris/index','StatusInventaris::index',['filter'=>'role:admin']);
$routes->get('admin/status-inventaris/edit-jenis-barang/(:segment)','StatusInventaris::edit_jenis_barang/$1',['filter'=>'role:admin']);
$routes->post('admin/status-inventaris/update_jenis_barang/(:segment)','StatusInventaris::update_jenis_barang/$1',['filter'=>'role:admin']);
$routes->post('admin/status-inventaris/save_jenis_barang','StatusInventaris::save_jenis_barang',['filter'=>'role:admin']);
$routes->get('admin/status-inventaris/create_jenis_barang','StatusInventaris::create_jenis_barang',['filter'=>'role:admin']);
$routes->delete('admin/status-inventaris/hapus_jenis_barang/(:segment)','StatusInventaris::delete_jenis_barang/$1',['filter'=>'role:admin']);
//jenis barang
//start lokasi
$routes->get('admin/status-inventaris/edit-nama-lokasi/(:segment)','StatusInventaris::edit_nama_lokasi/$1',['filter'=>'role:admin']);
$routes->post('admin/status-inventaris/update-nama-lokasi/(:segment)','StatusInventaris::update_nama_lokasi/$1',['filter'=>'role:admin']);
$routes->post('admin/status-inventaris/save_nama_lokasi','StatusInventaris::save_nama_lokasi',['filter'=>'role:admin']);
$routes->post('admin/status-inventaris/save_nama_lokasi/index','StatusInventaris::save_nama_lokasi',['filter'=>'role:admin']);
$routes->get('admin/status-inventaris/create-nama-lokasi','StatusInventaris::create_nama_lokasi',['filter'=>'role:admin']);
$routes->delete('admin/status-inventaris/hapus-nama-lokasi/(:segment)','StatusInventaris::delete_nama_lokasi/$1',['filter'=>'role:admin']);
//end lokasi
//start kondisi
$routes->get('admin/status-inventaris/edit-nama-kondisi/(:segment)','StatusInventaris::edit_nama_kondisi/$1',['filter'=>'role:admin']);
$routes->post('admin/status-inventaris/update-nama-kondisi/(:segment)','StatusInventaris::update_nama_kondisi/$1',['filter'=>'role:admin']);
$routes->post('admin/status-inventaris/save-nama-kondisi','StatusInventaris::save_nama_kondisi',['filter'=>'role:admin']);
$routes->post('admin/status-inventaris/save-nama-kondisi/index','StatusInventaris::save_nama_kondisi',['filter'=>'role:admin']);
$routes->get('admin/status-inventaris/create-nama-kondisi','StatusInventaris::create_nama_kondisi',['filter'=>'role:admin']);
$routes->delete('admin/status-inventaris/hapus-nama-kondisi/(:segment)','StatusInventaris::delete_nama_kondisi/$1',['filter'=>'role:admin']);
//end kondisi
// start status
$routes->get('admin/status-inventaris/edit-nama-status/(:segment)','StatusInventaris::edit_nama_status/$1',['filter'=>'role:admin']);
$routes->post('admin/status-inventaris/update-nama-status/(:segment)','StatusInventaris::update_nama_status/$1',['filter'=>'role:admin']);
$routes->post('admin/status-inventaris/save-nama-status','StatusInventaris::save_nama_status',['filter'=>'role:admin']);
$routes->post('admin/status-inventaris/save-nama-status/index','StatusInventaris::save_nama_status',['filter'=>'role:admin']);
$routes->get('admin/status-inventaris/create-nama-status','StatusInventaris::create_nama_status',['filter'=>'role:admin']);
$routes->delete('admin/status-inventaris/hapus-nama-status/(:segment)','StatusInventaris::delete_nama_status/$1',['filter'=>'role:admin']);
//kategori dinas lembur/shifting
// status-dinas-lembur-shifting
$routes->get('admin/status-dinas-lembur-shifting', 'StatusDinasLemburShifting::index',['filter'=>'role:admin']);
$routes->get('admin/status-dinas-lembur-shifting/index', 'StatusDinasLemburShifting::index',['filter'=>'role:admin']);
$routes->get('admin/status-dinas-lembur-shifting/kategori/create', 'StatusDinasLemburShifting::kategori_create',['filter'=>'role:admin']);
$routes->get('admin/status-dinas-lembur-shifting/acara/create', 'StatusDinasLemburShifting::acara_create',['filter'=>'role:admin']);
$routes->post('admin/status-dinas-lembur-shifting/acara/save', 'StatusDinasLemburShifting::acara_save',['filter'=>'role:admin']);
$routes->post('admin/status-dinas-lembur-shifting/kategori/save', 'StatusDinasLemburShifting::kategori_save',['filter'=>'role:admin']);
$routes->get('admin/status-dinas-lembur-shifting/edit-kategori/(:segment)', 'StatusDinasLemburShifting::edit_kategori/$1',['filter'=>'role:admin']);
$routes->get('admin/status-dinas-lembur-shifting/edit-acara/(:segment)', 'StatusDinasLemburShifting::edit_acara/$1',['filter'=>'role:admin']);
$routes->post('admin/status-dinas-lembur-shifting/acara_update/(:segment)', 'StatusDinasLemburShifting::acara_update/$1',['filter'=>'role:admin']);
$routes->post('admin/status-dinas-lembur-shifting/kategori_update/(:segment)', 'StatusDinasLemburShifting::kategori_update/$1',['filter'=>'role:admin']);
$routes->post('admin/status-dinas-lembur-shifting/delete-acara/(:segment)', 'StatusDinasLemburShifting::delete_acara/$1',['filter'=>'role:admin']);
$routes->post('admin/status-dinas-lembur-shifting/delete-kategori/(:segment)', 'StatusDinasLemburShifting::delete_kategori/$1',['filter'=>'role:admin']);
//end kategori dinas lembur /shifting

//end user

//start status out broadcast

$routes->get('admin/status-kategori-out-broadcast', 'StatusOutBroadcast::index',['filter'=>'role:admin']);
$routes->get('admin/status-kategori-out-broadcast/index', 'StatusOutBroadcast::index',['filter'=>'role:admin']);
$routes->get('admin/status-kategori-out-broadcast/edit/(:segment)', 'StatusOutBroadcast::edit/$1',['filter'=>'role:admin']);
$routes->get('admin/status-kategori-out-broadcast/create', 'StatusOutBroadcast::create',['filter'=>'role:admin']);
$routes->post('admin/status-kategori-out-broadcast/save', 'StatusOutBroadcast::save',['filter'=>'role:admin']);
$routes->post('admin/status-kategori-out-broadcast/update/(:segment)', 'StatusOutBroadcast::update/$1',['filter'=>'role:admin']);
$routes->delete('admin/status-kategori-out-broadcast/(:segment)', 'StatusOutBroadcast::delete/$1',['filter'=>'role:admin']);

// start kelola pengguna
// start aktivasi
$routes->get('admin/kelola-pengguna', 'KelolaPengguna::index',['filter'=>'role:admin']);
$routes->get('admin/kelola-pengguna/index', 'KelolaPengguna::index',['filter'=>'role:admin']);
$routes->get('admin/kelola-pengguna/setting/(:segment)', 'KelolaPengguna::setting/$1',['filter'=>'role:admin']);
$routes->post('admin/kelola-pengguna/update/(:segment)', 'KelolaPengguna::update/$1',['filter'=>'role:admin']);
//end aktivasi
//reset password
$routes->get('admin/kelola-pengguna/reset-password/(:segment)', 'KelolaPengguna::reset_password/$1',['filter'=>'role:admin']);
$routes->post('admin/kelola-pengguna/reset-password/update/(:segment)', 'KelolaPengguna::update_password/$1',['filter'=>'role:admin']);
//end reset password
// end kelola pengguna
//end status out broadcast
// end status
// end status inventaris
// start Kelola Surat Tugas OB Peminjaman
// start pemberi
$routes->get('admin/kelola-surat-tugas-ob-dan-peminjaman', 'KelolaSuratTugasObPeminjaman::index',['filter'=>'role:admin']);
$routes->get('admin/kelola-surat-tugas-ob-dan-peminjaman/index', 'KelolaSuratTugasObPeminjaman::index',['filter'=>'role:admin']);
$routes->get('admin/kelola-surat-tugas-ob-dan-peminjaman/edit-nomor-surat-pemberi/(:segment)', 'KelolaSuratTugasObPeminjaman::edit_nomor_surat_tugas_pemberi_pinjam/$1',['filter'=>'role:admin']);
$routes->POST('admin/kelola-surat-tugas-ob-dan-peminjaman/update-pemberi/(:segment)', 'KelolaSuratTugasObPeminjaman::update_nomor_surat_tugas_pemberi_pinjam/$1',['filter'=>'role:admin']);
// end pemberi
// start penerima
$routes->get('admin/kelola-surat-tugas-ob-dan-peminjaman/edit-nomor-surat-penerima/(:segment)', 'KelolaSuratTugasObPeminjaman::edit_nomor_surat_tugas_penerima_pinjam/$1',['filter'=>'role:admin']);
$routes->POST('admin/kelola-surat-tugas-ob-dan-peminjaman/update-penerima/(:segment)', 'KelolaSuratTugasObPeminjaman::update_nomor_surat_tugas_penerima_pinjam/$1',['filter'=>'role:admin']);
// end penerima
// start out-broadcast
$routes->get('admin/kelola-surat-tugas-ob-dan-peminjaman/edit-nomor-surat-ob/(:segment)', 'KelolaSuratTugasObPeminjaman::edit_nomor_surat_tugas_ob/$1',['filter'=>'role:admin']);
$routes->POST('admin/kelola-surat-tugas-ob-dan-peminjaman/update-ob/(:segment)', 'KelolaSuratTugasObPeminjaman::update_nomor_surat_tugas_ob/$1',['filter'=>'role:admin']);
// end end out-broadcast
// end Kelola Surat Tugas OB Peminjaman

// star kelola surat tugas lembur
$routes->get('admin/kelola-surat-tugas-lembur', 'KelolaSuratTugasLembur::index',['filter'=>'role:admin']);
$routes->get('admin/kelola-surat-tugas-lembur/index', 'KelolaSuratTugasLembur::index',['filter'=>'role:admin']);
$routes->get('admin/kelola-surat-tugas-lembur/edit-nomor-surat-lembur/(:segment)', 'KelolaSuratTugasLembur::edit_no_surat_lembur/$1',['filter'=>'role:admin']);
$routes->POST('admin/kelola-surat-tugas-lembur/update-lembur/(:segment)', 'KelolaSuratTugasLembur::update_nomor_surat_lembur/$1',['filter'=>'role:admin']);
// end kelola surat tugas lembur
// star kelola surat tugas shifting
$routes->get('admin/kelola-surat-tugas-shifting', 'KelolaSuratTugasShifting::index',['filter'=>'role:admin']);
$routes->get('admin/kelola-surat-tugas-shifting/index', 'KelolaSuratTugasShifting::index',['filter'=>'role:admin']);
$routes->get('admin/kelola-surat-tugas-shifting/edit-nomor-surat-shifting/(:segment)', 'KelolaSuratTugasShifting::edit_no_surat_shifting/$1',['filter'=>'role:admin']);
$routes->POST('admin/kelola-surat-tugas-shifting/update-shifting/(:segment)', 'KelolaSuratTugasShifting::update_nomor_surat_shifting/$1',['filter'=>'role:admin']);
// end kelola surat tugas shifting


//start user
$routes->get('surat-tugas', 'User::index');
$routes->get('surat-tugas/index', 'User::index');
$routes->get('surat-tugas/shifting/(:segment)', 'User::shifting/$1');
$routes->get('surat-tugas/lembur/(:segment)', 'User::lembur/$1');
// $routes->get('surat-tugas/nomor-surat-pemberi-pinjam/(:segment)', 'User::edit_nomor_surat_tugas_pemberi_pinjam/$1');
// $routes->POST('surat-tugas/nomor-surat-tugas-pemberi-pinjam/update/(:segment)', 'User::update_nomor_surat_tugas_pemberi_pinjam/$1');
$routes->get('user/print_pemberi_pinjam_preview/(:any)', 'PdfController::print_pemberi_pinjam_preview/$1');
$routes->get('user/print_pemberi_pinjam_download/(:any)', 'PdfController::print_pemberi_pinjam_download/$1');
$routes->get('user/print_penerima_pinjam_preview/(:any)', 'PdfController::print_penerima_pinjam_preview/$1');
$routes->get('user/print_penerima_pinjam_download/(:any)', 'PdfController::print_penerima_pinjam_download/$1');


// $routes->PUT('user/out_broadcast/(:any)', 'PdfController::out_broadcast/$1');
$routes->get('user/out_broadcast/download/(:segment)', 'PdfController::out_broadcast_download/$1');
$routes->get('user/out_broadcast/preview/(:segment)', 'PdfController::out_broadcast_preview/$1');

// $routes->PUT('user/peralatan_out_outbroadcast_download/(:segment)', 'PdfController::out_broadcast_download/$1');
// $routes->get('user/peralatan_out_outbroadcast_preview/(:segment)', 'PdfController::peralatan_out_outbroadcast_preview/$1');
$routes->get('user/peralatan_out_broadcast/preview/(:segment)', 'PdfController::peralatan_out_outbroadcast_preview/$1');
$routes->PUT('user/peralatan_out_broadcast/download/(:segment)', 'PdfController::peralatan_out_outbroadcast_download/$1');

//shifting
$routes->get('user/shifting/preview/(:segment)', 'PdfController::dinas_shifting_preview/$1');
$routes->PUT('user/shifting/download/(:segment)', 'PdfController::dinas_shifting_download/$1');
//endshifting
//lembur
$routes->get('user/lembur/preview/(:segment)', 'PdfController::dinas_lembur_preview/$1');
$routes->PUT('user/lembur/download/(:segment)', 'PdfController::dinas_lembur_download/$1');
//end lembur
$routes->get('user/setting_user/(:segment)', 'User::setting_user/$1');
// $routes->get('user/setting_user', 'User::setting_user');
$routes->post('change-password/(:segment)', 'User::update_password/$1');
$routes->get('user/change-password/(:segment)', 'User::change_password/$1');
$routes->get('user/setting-data-user', 'User::data_user');
$routes->post('user/setting-data-user/(:num)', 'User::update_user/$1');

// $routes->post('change-password', 'User::update_password');



//out-broadcast
$routes->get('out-broadcast', 'OutBroadcast::index');
$routes->get('out-broadcast/index', 'OutBroadcast::index');
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
// $routes->get('dinas-lembur', 'DinasLembur::index');

//end dinas lembur

//start dinas shifting
$routes->get('dinas-shifting', 'DinasShifting::index');
$routes->get('dinas-shifting/create', 'DinasShifting::create');
$routes->post('dinas-shifting/save', 'DinasShifting::save');
$routes->delete('dinas-shifting/(:segment)', 'DinasShifting::delete/$1');
$routes->get('dinas-shifting/edit/(:segment)', 'DinasShifting::edit/$1');
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