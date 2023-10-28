<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/nav_bar') ?>
<div id="layoutSidenav">
    <?= $this->include('layout/side_bar') ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Inventaris SNG-VAN</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Inventaris SNG-VAN</li>
                </ol>
                <button type="button" class="btn btn-primary mb-2">Tambah</button>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        DataTable Example
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Serial Number</th>
                                    <th>Merk</th>
                                    <th>Type</th>
                                    <th>Jumlah</th>
                                    <th>Lokasi Barang</th>
                                    <th>Kondisi</th>
                                    <th>Keterangan</th>
                                    <th>Edit</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Serial Number</th>
                                    <th>Merk</th>
                                    <th>Type</th>
                                    <th>Jumlah</th>
                                    <th>Lokasi Barang</th>
                                    <th>Kondisi</th>
                                    <th>Keterangan</th>
                                    <th>Edit</th>
                                    <th>Hapus</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>$320,800</td>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td><button class="btn btn-success"><i class="fa-regular fa-pen-to-square"></i>Edit</button></td>
                                    <td><button class="btn btn-danger"><i class="fa-solid fa-trash"></i>Hapus</button></td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <?= $this->include('layout/footer') ?>
    </div>
</div>
<?= $this->endSection('content'); ?>