<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/nav_bar'); ?>
<div id="layoutSidenav">
    <?= $this->include('layout/side_bar'); ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <!-- <h1 class="mt-4">Peminjaman Alat</h1> -->
                <h5 class="mt-4">
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>
                </h5>
                <a href="<?= base_url("/inventaris/create") ?>" class="btn btn-primary my-2">Tambah</a>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Tabel Data Peminjaman Alat
                    </div>
                    <div class="card-body">
                        <table id="tableInventaris" class="table table-bordered table-hover text-center align-middle">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Barcode</th>
                                    <th>Merk</th>
                                    <th>Serial Number</th>
                                    <th>Tahun Pengadaan</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $number = 1; ?>
                                <?php foreach ($allInventaris as $key => $valueInventaris) : ?>
                                    <tr>
                                        <th><?= $number++; ?></th>
                                        <td><?= $valueInventaris['nama_barang']; ?></td>
                                        <td class="text-center">
                                            <?php

                              

                                            $redColor = [255, 0, 0];

                                            $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                                            // file_put_contents('barcode.png', $generator->getBarcode('081231723897', $generator::TYPE_CODE_128, 3, 50, $redColor));
                                         
                                            echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($valueInventaris['id_inv'], $generator::TYPE_CODE_128,3,50,$redColor)) . '">';
                                            ?>
                                        </td>

                                        <td><?= $valueInventaris['merk']; ?></td>
                                        <td><?= $valueInventaris['serial_number']; ?></td>
                                        <td><?= $valueInventaris['thn_pengadaan']; ?></td>
                                        <td><?= $valueInventaris['jumlah'] ?></td>
                                        <td>
                                            <form action="<?= base_url() ?>peminjaman-alat/edit/<?= $valueInventaris['id_inv']; ?>" method="post">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="PUT">
                                                <button type="submit" class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i>Edit</button>
                                            </form>

                                        </td>
                                        <td>
                                            <form id="hapus" action="<?= base_url() ?>peminjaman-alat/display/<?= $valueInventaris['id_inv']; ?>" method="post">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger hapusPjm"><i class="fa-solid fa-trash"></i>Hapus</button>
                                            </form>
                                        </td>

                                    </tr>

                                <?php endforeach; ?>
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>

        </main>

        <?= $this->include('layout/footer'); ?>


    </div>
</div>
<?= $this->endSection('content'); ?>