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
                <a href="<?= base_url() ?>admin/kelola-surat-tugas-shifting" class="btn btn-primary my-2">Refresh</a>
                <div class="badge bg-primary text-wrap my-1" style="width: 15rem; height: 2rem">
                                    <h6><?= 'No.Surat Selanjutnya ' . ':' . ' ' . $contekanNomorSuratShifLembur; ?></h6>
                                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>

                    </div>
                    <div id="card-body-DinasShifTable" class="card-body">
                        <!-- content -->
                        <table id="dinallTableDinaLemburKelola" class="table table-bordered table-hover text-center align-middle" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Kategori</th>
                                    <th>Tanggal</th>
                                    <th>Shift</th>
                                    <th>Crew Dinas</th>
                                    <th>Acara</th>
                                    <th>lokasi</th>
                                    <th>No.Surat Shifting</th>
                                    <th>Set.No.Surat</th>
                                    <th>Preview</th>
                                    <th>Download</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $number = 1; ?>
                                <?php foreach ($allDataJoinShiftDanJoinNamaAcara as $key => $valueDinasShift) : ?>
                                    <?php $convert = $valueDinasShift['tanggal'];
                                    $date = str_replace('/', '-', $convert);
                                    $tanggalconvert = date('d/m/Y', strtotime($date));
                                    ?>
                                    <tr>
                                        <th><?= $number++; ?></th>
                                        <td><?= $valueDinasShift['id_dinas_shifting']; ?></td>
                                        <td><?= $valueDinasShift['nama_kategori_dinas_crew']; ?></td>
                                        <td><?= $tanggalconvert; ?></td>
                                        <td><?= $valueDinasShift['nama_kategori_shif']; ?></td>
                                        <td>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th class="text-center">Nama Crew</th>
                                                </tr>
                                                <?php $number2 = 1; ?>
                                                <?php foreach ($allDataDinasShifting as $j) : ?>
                                                    <?php if ($valueDinasShift['id_dinas_shifting'] == $j['id_dinas_shif']) : ?>
                                                        <tr>
                                                            <th><?= $number2++; ?></th>
                                                            <td class="text-start">
                                                                <?php foreach ($allUsers as $k) : ?>
                                                                    <?php if ($j['id_users'] == $k['id']) : ?>
                                                                        <?= $k['fullname']; ?>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </table>
                                        </td>

                                        <td><?= $valueDinasShift['nama_acara_shift']; ?></td>
                                        <td><?= $valueDinasShift['lokasi']; ?></td>
                                        <td>
                                            <?= ($valueDinasShift['nomor_surat'] !== NULL) ? '<div class="badge bg-primary text-wrap" style="width: 8rem; height: 2rem"><h6>' . $valueDinasShift['nomor_surat'] . '</h6></div>' : '<div class="badge bg-danger text-wrap" style="width: 8rem; height: 2rem"><h6>Kosong</h6></div>'; ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url() ?>admin/kelola-surat-tugas-shifting/edit-nomor-surat-shifting/<?= $valueDinasShift['id_dinas_shifting']; ?>" class="btn btn-primary my-2"><i class="fa-regular fa-pen-to-square"></i>Edit.No.Surat</a>
                                        </td>
                                        <td>
                                            <form action="<?= base_url() ?>user/shifting/preview/<?= $valueDinasShift['id_dinas_shifting']; ?>" method="post">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="PUT">
                                                <button type="submit" class="btn btn-primary"><i class="fa-regular fa-eye"></i>Preview</button>
                                            </form>
                                        </td>

                                        <td>
                                            <form action="<?= base_url() ?>user/shifting/download/<?= $valueDinasShift['id_dinas_shifting']; ?>" method="post">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="PUT">
                                                <button type="submit" class="btn btn-success"><i class="fa-solid fa-download"></i>Download</button>
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