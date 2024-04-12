<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/nav_bar'); ?>
<div id="layoutSidenav">
    <?= $this->include('layout/side_bar'); ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h5 class="mt-4">
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('pesanHapus')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('pesanHapus'); ?>
                        </div>
                    <?php endif; ?>
                </h5>
                <a href="<?= base_url("admin/inventaris/create") ?>" class="btn btn-primary my-2">Tambah</a>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        <?= $title ?>
                    </div>
                    <div id="card-body-inventarisTable" class="card-body">
                        <table id="inventarisTable" class="table table-bordered table-hover text-center align-middle">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Barcode</th>
                                    <th>Merk</th>
                                    <th>Serial Number</th>
                                    <th>Lokasi</th>
                                    <th>Kondisi</th>
                                    <th>Status</th>
                                    <th>Tahun Pengadaan</th>
                                    <th>Edit</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $number = 1; ?>
                                <?php foreach ($dataJoins as $key => $valueInventaris) : ?>
                                    <tr>
                                        <th><?= $number++; ?></th>
                                        <td><?= $valueInventaris['nama_jns_barang']; ?></td>
                                        <td><?= $valueInventaris['nama_barang']; ?></td>
                                        <?php if ($valueInventaris['serial_number'] != NULL) : ?>
                                            <td class="text-center">
                                                <div>
                                                    <?= '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($valueInventaris['serial_number'], $generator::TYPE_CODE_128)) . '">'; ?>
                                                </div>
                                                <span><?= $valueInventaris['serial_number']; ?></span>
                                                <div>
                                                    <button type="button" class="btn btn-success btn-sm">Download</button>
                                                </div>
                                            </td>
                                        <?php elseif ($valueInventaris['serial_number'] == NULL) : ?>
                                            <td class="text-center">
                                                <div>
                                                    <?= '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($valueInventaris['kode_barcode'], $generator::TYPE_CODE_128)) . '">'; ?>
                                                </div>
                                                <span><?= $valueInventaris['kode_barcode']; ?></span>
                                                <div>
                                                    <button type="button" class="btn btn-primary btn-sm">Download</button>
                                                </div>

                                            </td>
                                        <?php endif; ?>

                                        <td><?= $valueInventaris['merk']; ?></td>
                                        <td>
                                        <?= $valueInventaris['serial_number']; ?>
                                            <!-- <?php if ($valueInventaris['serial_number'] != NULL) : ?>
                                                <?= $valueInventaris['serial_number']; ?>
                                            <?php elseif ($valueInventaris['serial_number'] == NULL) : ?>
                                                <h4><?= '-'; ?></h4>
                                            <?php endif; ?> -->
                                        </td>
                                        <td><?= $valueInventaris['nama_lokasi'] ?></td>
                                        <td><?= $valueInventaris['nama_kondisi'] ?></td>
                                        <td><?= $valueInventaris['nama_status'] ?></td>
                                        <td><?= $valueInventaris['thn_pengadaan']; ?></td>

                                        <td>
                                            <form action="<?= base_url() ?>admin/inventaris/edit/<?= $valueInventaris['id_inv']; ?>" method="get">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="GET">
                                                <button type="submit" class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i>Edit</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form id="hapus" action="<?= base_url() ?>admin/inventaris/<?= $valueInventaris['id_inv']; ?>" method="post">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger hapusInv"><i class="fa-solid fa-trash"></i>Hapus</button>
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