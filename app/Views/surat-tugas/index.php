<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/nav_bar'); ?>
<div id="layoutSidenav">
    <?= $this->include('layout/side_bar'); ?>
    <div id="layoutSidenav_content">
        <main>
            <!-- <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?= base_url() ?>surat-tugas">Out Broadcast</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>surat-tugas/pemberi_pinjam">Pemberi Pinjam</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>surat-tugas/penerima_pinjam">Penerima Pinjam</a>
                </li>
            </ul> -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#outBroadcast">Out Broadcast</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#pemberiPinjam">Pemberi Pinjam</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#penerimaPinjam">Penerima Pinjam</a>
                </li>
            </ul>
            <!-- <ul class="nav nav-pills" role="tablist">
                <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="<?= base_url() ?>surat-tugas">Out Broadcast</a>

                </li>
                <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="<?= base_url() ?>surat-tugas/pemberi_pinjam">Pemberi Pinjam</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="<?= base_url() ?>surat-tugas/penerima_pinjam">Penerima Pinjam</a>
                </li>
            </ul> -->


            <!-- Tab panes -->
            <div class="tab-content">
                <div id="outBroadcast" class="container-fluid px-4  tab-pane active"><br>
                    <h3>OutBroadcast</h3>
                    <table id="dinallTableCrewDinasByID" class="table table-bordered table-hover text-center align-middle" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID OB</th>
                                <th>Kategori</th>
                                <th>Crew Dinas</th>
                                <th>Tanggal</th>
                                <th>Sampai Dengan</th>
                                <th>Acara</th>
                                <th>lokasi</th>
                                <th>Technical Producer(TP)</th>
                                <th>Technical Director (TD)</th>
                                <th>Assistant.TD</th>
                                <th>Unit Manager</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $number = 1; ?>
                            <?php foreach ($showAllJoinsOBKategori as $key => $valueShowBroadcast) : ?>
                                <?php $convert = $valueShowBroadcast['tanggal'];
                                $date = str_replace('/', '-', $convert);
                                $tanggalconvert = date('d/m/Y', strtotime($date));
                                ?>
                                <?php if ($valueShowBroadcast['sampai_dengan'] !== null) : ?>
                                    <?php $convert2 = $valueShowBroadcast['sampai_dengan'];
                                    $date = str_replace('/', '-', $convert2);
                                    $convert_sampai_dengan = date('d/m/Y', strtotime($date));
                                    ?>
                                <?php elseif ($valueShowBroadcast['sampai_dengan'] == null) : ?>
                                    <?php $convert_sampai_dengan = '-' ?>
                                <?php endif; ?>
                                <?php foreach ($getAcaraOBFromIDUser as $key => $valueCrewDinasOBByIDUser) : ?>
                                    <tr>
                                        <th><?= $number++; ?></th>
                                        <td><?= $valueCrewDinasOBByIDUser['id_ob']; ?></td>
                                        <td><?= $valueShowBroadcast['nama_kategori']; ?></td>
                                        <td>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th class="text-center">Nama Crew</th>
                                                </tr>
                                                <?php $number2 = 1; ?>
                                                <?php foreach ($allDataOutBroadcast as $dataOB) : ?>
                                                    <?php if ($valueCrewDinasOBByIDUser['id_ob'] == $dataOB['id_ob']) : ?>
                                                        <tr>
                                                            <th><?= $number2++; ?></th>
                                                            <td class="text-center">
                                                                <?php foreach ($allUsers as $dataUser) : ?>
                                                                    <?php if ($dataOB['id_users'] == $dataUser['id']) : ?>
                                                                        <?= $dataUser['fullname']; ?>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </table>

                                        </td>

                                        <td><?= $tanggalconvert; ?></td>
                                        <td><?= $convert_sampai_dengan; ?></td>
                                        <td><?= $valueShowBroadcast['acara']; ?></td>
                                        <td><?= $valueShowBroadcast['lokasi']; ?></td>
                                        <td><?= $valueShowBroadcast['tp']; ?></td>
                                        <td><?= $valueShowBroadcast['td']; ?></td>
                                        <td><?= $valueShowBroadcast['ass_td']; ?></td>
                                        <td><?= $valueShowBroadcast['um']; ?> </td>

                                    </tr>
                                <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div id="pemberiPinjam" class="container-fluid px-4 tab-pane fade">
                    <h3>Pemberi Pinjam</h3>
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
                            <?php foreach ($AllShowNamaPemberi as $key => $valuePDF) : ?>
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
                                        <div class="badge bg-primary text-wrap" style="width: 6rem;">
                                            <?= $valuePDF['fullname']; ?>
                                        </div>
                                    </td>
                                    <td>

                                        <?= ($valuePDF['tanggal_kembali'] === NULL) ? 'Belum Dikembalikan' : $valuePDF['tanggal_kembali']; ?>

                                    </td>
                                    <td>
                                        <?php if ($valuePDF['nama_penerima'] === NULL) : ?>
                                            <span>Belum Dikembalikan</span>
                                        <?php endif; ?>

                                        <?php foreach ($getNamaPenerimaPinjam as $key => $valueNamaPenerima) : ?>
                                            <?php if ($valueNamaPenerima['id'] == $valuePDF['nama_penerima']) : ?>
                                                <div class="badge bg-warning text-wrap" style="width: 6rem;">
                                                    <?= $valueNamaPenerima['fullname']; ?>
                                                </div>

                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td>
                                        <?= ($valuePDF['catatan'] !== NULL) ? $valuePDF['catatan'] : '-'; ?>

                                    </td>
                                    <td>
                                        <!-- <form action="<?= base_url() ?>user/<?= $valuePDF['id_pinjam']; ?>" method="post">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="PUT">
                                        <button type="submit" class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i>Print</button>
                                    </form> -->
                                        <a href="<?= base_url() ?>user/print_pemberi_pinjam/<?= $valuePDF['id_pinjam']; ?>">
                                            print
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
                <div id="penerimaPinjam" class="container-fluid px-4 tab-pane fade">
                    <h3>Penerima Pinjam</h3>
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
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </main>
        <?= $this->include('layout/footer'); ?>
    </div>
</div>
<?= $this->endSection('content'); ?>