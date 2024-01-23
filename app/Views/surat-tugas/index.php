<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/nav_bar'); ?>
<div id="layoutSidenav">
    <?= $this->include('layout/side_bar'); ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Sampai Dengan</th>
                            <th>Acara</th>
                            <th>Tempat</th>
                            <th>Durasi Pinjam</th>
                            <th>Nama Peminjam</th>
                            <th>No HP Peminjam</th>
                            <th>Nama Pemberi</th>
                            <th>Tanggal Kembali</th>
                            <th>Nama Penerima</th>
                            <th>Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $number = 1; ?>
                        <?php foreach ($testing as $key => $valuePDF) : ?>
                            <tr>
                                <th><?= $number++; ?></th>
                                <td><?= $valuePDF['tanggal']; ?></td>
                                <td><?= $valuePDF['sampai_dengan']; ?></td>
                                <td><?= $valuePDF['acara']; ?></td>
                                <td><?= $valuePDF['tempat']; ?></td>
                                <td><?= $valuePDF['durasi_pinjam']; ?></td>
                                <td><?= $valuePDF['nama_peminjam']; ?></td>
                                <td><?= $valuePDF['no_hp_peminjam']; ?></td>
                                <td>
                                    
                                <?= $valuePDF['nama_pemberi']; ?>
                                </td>
                                <td><?= $valuePDF['tanggal_kembali']; ?></td>
                                <td>
                                  
                                <?= $valuePDF['nama_penerima']; ?>
                                </td>
                                <td><?= $valuePDF['catatan']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
        <?= $this->include('layout/footer'); ?>
    </div>
</div>
<?= $this->endSection('content'); ?>