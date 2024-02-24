<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/nav_bar'); ?>
<div id="layoutSidenav">
    <?= $this->include('layout/side_bar'); ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <a href="<?= base_url("out-broadcast") ?>" class="btn btn-warning my-2">Kembali</a>
                <a href="<?= base_url("admin/inventaris/create") ?>" class="btn btn-primary my-2">Print</a>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                    </div>
                    <div id="card-body-AlatOBTable" class="card-body">
                        <table id="AlatOBTable" class="table table-bordered table-hover text-center align-middle" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama Barang</th>
                                    <th class="text-center">Merk</th>
                                    <th class="text-center">Serial Number</th>
                                    <th class="text-center">Jumlah</th>
                                </tr>
                            </thead>
                            <?php
                            $number2 = 1;
                            ?>
                            <input type="hidden" class="test" value="">
                            <tbody>
                                <?php foreach ($allDataCrewOB as $key => $valueShowBroadcast) : ?>
                                    <tr>
                                        <th><?= $number2++; ?></th>
                                        <td><?= $valueShowBroadcast['nama_barang']; ?></td>
                                        <td><?= $valueShowBroadcast['merk']; ?></td>
                                        <td><?= $valueShowBroadcast['serial_number']; ?></td>
                                        <td><?= $valueShowBroadcast['jumlah']; ?></td>
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