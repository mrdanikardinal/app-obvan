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
                <a href="<?= base_url("/peminjaman-alat/create") ?>" class="btn btn-primary my-2">Tambah</a>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Tabel Data Peminjaman Alat
                    </div>
                    <div class="card-body">
                        <table id="dinallTable" class="table table-bordered table-hover text-center align-middle">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Sampai Dengan</th>
                                    <th>Barang</th>
                                    <th>Acara</th>
                                    <th>Tempat</th>
                                    <th>Durasi Pinjam</th>
                                    <th>Nama Peminjam</th>
                                    <th>NO.HP Peminjam</th>
                                    <th>Nama Pemberi</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <?php if (in_groups('admin')) : ?>
                                        <th>Hapus</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $number = 1; ?>
                                <?php foreach ($peminjaman as $key => $valuePeminjaman) : ?>
                                    <?php $convert = $valuePeminjaman['tanggal'];
                                    $date = str_replace('/', '-', $convert);
                                    $tanggalconvert = date('d/m/Y', strtotime($date));
                                    ?>
                                    <?php $convert2 = $valuePeminjaman['sampai_dengan'];
                                    $date = str_replace('/', '-', $convert2);
                                    $convert_sampai_dengan = date('d/m/Y', strtotime($date));
                                    ?>
                                    <tr>
                                        <th><?= $number++; ?></th>
                                        <td><?= $valuePeminjaman['id_pinjam']; ?></td>
                                        <td><?= $tanggalconvert; ?></td>
                                        <td><?= $convert_sampai_dengan; ?></td>
                                        <td>

                                            <table class="table table-bordered">
                                                <tr>

                                                    <th class="text-center">No</th>
                                                    <th class="text-center">Nama Barang</th>
                                                    <th class="text-center">Merk</th>
                                                    <th class="text-center">S.N</th>
                                                    <th class="text-center">Jumlah</th>
                                                    <th class="text-center">Status</th>
                                                </tr>
                                                <?php $number2 = 1; ?>
                                                <?php foreach ($parentMerk as $j) : ?>
                                                    <?php if ($valuePeminjaman['id_pinjam'] == $j['id_pinjaman_alat']) : ?>
                                                        <tr>
                                                            <th><?= $number2++; ?></th>
                                                            <td class="text-center"><?= $j['nama_barang']; ?></td>
                                                            <td class="text-center"><?= $j['merk']; ?></td>
                                                            <td class="text-center"><?= $j['serial_number']; ?></td>
                                                            <td class="text-center"><?= $j['jumlah']; ?></td>
                                                            <td class="text-center">
                                                                <?php if ($j['status'] == true) : ?>
                                                                    <button type="button" class="btn btn-success btn-sm"><i class="fa-solid fa-check"></i>


                                                                    </button>
                                                                <?php elseif ($j['status'] == false) : ?>
                                                                    <button type="button" class="btn btn-danger"><i class="fa-solid fa-circle-exclamation"></i></button>
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </table>

                                        </td>
                                        <td><?= $valuePeminjaman['acara']; ?></td>
                                        <td><?= $valuePeminjaman['tempat']; ?></td>
                                        <td><?= $valuePeminjaman['durasi_pinjam']; ?></td>
                                        <td><?= $valuePeminjaman['nama_peminjam']; ?></td>
                                        <td><?= $valuePeminjaman['no_hp_peminjam']; ?></td>
                                        <!-- <td><?= $valuePeminjaman['nama_pemberi']; ?></td> -->
                                        <td>
                                            <?php foreach ($allNama_pemberi as $k) : ?>
                                                <?= ($valuePeminjaman['nama_pemberi'] == $k['id']) ? $k['fullname'] : Null; ?>
                                            <?php endforeach; ?>
                                        </td>

                                        <td>
                                            <?php foreach ($checkStatus[$key] as $valueCheck) : ?>
                                                <?php if ($valueCheck == true) : ?>
                                                    <?php
                                                    echo "Dikembalikan Tanggal,";
                                                    $convertTanggalKembali = $valuePeminjaman['tanggal_kembali'];
                                                    $dateTanggalKembali = str_replace('/', '-', $convertTanggalKembali);
                                                    $tanggalKembaliconvert = date('d/m/Y', strtotime($dateTanggalKembali));
                                                    ?>
                                                    <?= $tanggalKembaliconvert; ?>
                                                    <?php if ($valuePeminjaman['catatan'] !== NULL) : ?>
                                                        <div class="badge bg-danger text-wrap" style="width: 6rem;">
                                                            <?= ($valuePeminjaman['catatan'] == NULL) ? NULL : $valuePeminjaman['catatan']; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?= "Penerima" ?>
                                                    <?php foreach ($allNama_pemberi as $k) : ?>


                                                        <?= ($valuePeminjaman['nama_penerima'] == $k['id']) ? $k['fullname'] : Null; ?>

                                                    <?php endforeach; ?>


                                                <?php elseif ($valueCheck == false) : ?>
                                                    <button type="button" class="btn btn-info"><?= 'Tertunda' ?> <?= ($valuePeminjaman['catatan'] == NULL) ? NULL : $valuePeminjaman['catatan']; ?></button>

                                                <?php endif; ?>

                                        </td>
                                        <td>
                                            <!-- start if condition status -->
                                            <?php
                                                $today = date("Y-m-d");
                                                $tanggalPengembalian = $valuePeminjaman['sampai_dengan'];
                                            ?>
                                            <?php if ($tanggalPengembalian == $today && $valueCheck == false) : ?>
                                                <button type="button" class="btn btn-warning"><?= 'Hari Pengembalian' ?></button>
                                            <?php elseif ($tanggalPengembalian < $today && $valueCheck == false) : ?>
                                                <button type="button" class="btn btn-danger"><?= 'Pengembalian Expired' ?></button>
                                            <?php elseif ($tanggalPengembalian > $today && $valueCheck == false) : ?>
                                                <button type="button" class="btn btn-primary"><?= 'Sedang Dipinjam' ?></button>
                                            <?php elseif ($valueCheck == true) : ?>
                                                <button type="button" class="btn btn-success"><?= 'Selesai' ?></button>
                                            <?php endif; ?>
                                            <!-- endIfcondition status -->

                                        <?php endforeach; ?>
                                        </td>
                                        <td>
                                            <form action="<?= base_url() ?>peminjaman-alat/edit/<?= $valuePeminjaman['id_pinjam']; ?>" method="post">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="PUT">
                                                <button type="submit" class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i>Edit</button>
                                            </form>

                                        </td>
                                        <?php if (in_groups('admin')) : ?>
                                            <td>
                                                <form id="hapus" action="<?= base_url() ?>peminjaman-alat/<?= $valuePeminjaman['id_pinjam']; ?>" method="post">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger hapusPjm"><i class="fa-solid fa-trash"></i>Hapus</button>
                                                </form>
                                            </td>
                                        <?php endif;  ?>
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