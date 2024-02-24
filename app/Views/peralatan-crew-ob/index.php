<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/nav_bar'); ?>
<div id="layoutSidenav">
    <?= $this->include('layout/side_bar'); ?>
    <div id="layoutSidenav_content">
        <main>
            <table class="table table-bordered">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Barang</th>
                    <th class="text-center">Merk</th>
                    <th class="text-center">Serial Number</th>
                    <th class="text-center">Jumlah</th>
                </tr>
                <?php
                $number2 = 1;
                ?>
                <input type="hidden" class="test" value="">
                <?php foreach ($allDataCrewOB as $key => $valueShowBroadcast) : ?>
                    <tr>
                        <th><?= $number2++; ?></th>
                        <td><?= $valueShowBroadcast['nama_barang']; ?></td>
                        <td><?= $valueShowBroadcast['merk']; ?></td>
                        <td><?= $valueShowBroadcast['serial_number']; ?></td>
                        <td><?= $valueShowBroadcast['jumlah']; ?></td>
                    </tr>
                <?php endforeach; ?>


            </table>
        </main>
        <?= $this->include('layout/footer'); ?>
    </div>
</div>
<?= $this->endSection('content'); ?>