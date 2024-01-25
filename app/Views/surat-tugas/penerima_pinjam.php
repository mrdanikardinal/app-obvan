<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/nav_bar'); ?>
<div id="layoutSidenav">
    <?= $this->include('layout/side_bar'); ?>
    <div id="layoutSidenav_content">
        <main>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= base_url() ?>surat-tugas">Out Broadcast</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>surat-tugas/pemberi_pinjam">Pemberi Pinjam</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>surat-tugas/penerima_pinjam">Penerima Pinjam</a>
                </li>

            </ul>

            <div class="container-fluid px-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Pinjam</th>
                            <th>Tanggal</th>
                            <th>Sampai Dengan</th>
                            <th>Acara</th>
                            <th>Tempat</th>
                            <th>Durasi Pinjam</th>
                            <th>Nama Peminjam</th>
                            <th>No HP Peminjam</th>
                            <th>Nama Pemberi Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Nama Penerima Pinjam</th>
                            <th>Catatan</th>
                            <th>Print</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $number = 1; ?>
                        <?php foreach ($AllShowNamaPenerima as $key => $valuePDF) : ?>
                            <tr>
                                <th><?= $number++; ?></th>
                                <td><?= $valuePDF['id_pinjam']; ?></td>
                                <td><?= $valuePDF['tanggal']; ?></td>
                                <td><?= $valuePDF['sampai_dengan']; ?></td>
                                <td><?= $valuePDF['acara']; ?></td>
                                <td><?= $valuePDF['tempat']; ?></td>
                                <td><?= $valuePDF['durasi_pinjam']; ?></td>
                                <td><?= $valuePDF['nama_peminjam']; ?></td>
                                <td><?= $valuePDF['no_hp_peminjam']; ?></td>
                                <td>
                                    <?php if ($valuePDF['nama_penerima'] === NULL) : ?>
                                        <span>Kosong!</span>
                                    <?php endif; ?>

                                    <?php foreach ($getNamaPemberiPinjam as $key => $valueNamaPemberi) : ?>
                                        <?php if ($valueNamaPemberi['id'] == $valuePDF['nama_pemberi']) : ?>
                                            <div class="badge bg-warning text-wrap" style="width: 6rem;">
                                                <?= $valueNamaPemberi['fullname']; ?>
                                            </div>

                                        <?php endif; ?>
                                    <?php endforeach; ?>

                                </td>
                                <td>

                                    <?= ($valuePDF['tanggal_kembali'] === NULL) ? 'Belum Dikembalikan' : $valuePDF['tanggal_kembali']; ?>

                                </td>
                                <td>
                                    <div class="badge bg-primary text-wrap" style="width: 6rem;">
                                    <?= $valuePDF['fullname']; ?>
                                    </div>
                                </td>
                                <td>

                                    <?= ($valuePDF['catatan'] === NULL) ? '-' : $valuePDF['catatan']; ?>

                                </td>
                                <td>
                                    <!-- <form action="<?= base_url() ?>user/<?= $valuePDF['id_pinjam']; ?>" method="post">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="PUT">
                                        <button type="submit" class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i>Print</button>
                                    </form> -->
                                    <a href="<?= base_url() ?>user/print_penerima_pinjam/<?= $valuePDF['id_pinjam']; ?>">
                                        print
                                    </a>
                                </td>
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