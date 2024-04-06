<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/nav_bar'); ?>
<div id="layoutSidenav">
    <?= $this->include('layout/side_bar'); ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <a href="<?= base_url("admin/status-dinas-lembur-shifting") ?>" class="btn btn-primary my-2">
                    <i class="fa-solid fa-arrows-rotate"></i> Refresh
                </a>
                <div class="card mb-4">
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Tabel Status Kategori Dinas & Acara Dinas
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <button class="nav-link active" id="ob-tab" data-bs-toggle="tab" data-bs-target="#kategoriDinas" type="button" role="tab" aria-controls="kategoriDinas" aria-selected="true">Kategori</button>

                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="pemberi-tab" data-bs-toggle="tab" data-bs-target="#acaraDinas" type="button" role="tab" aria-controls="acaraDinas" aria-selected="true">Acara</button>

                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">

                            <div class="tab-pane show active" id="kategoriDinas">
                                <h3>Kategori Dinas</h3>
                                <table id="dinallTablekategoriDinas" class="table table-bordered table-hover text-center align-middle" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Kategori</th>
                                            <th>Nama Kategori</th>
                                            <th>Edit</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $number = 1; ?>
                                        <?php foreach ($dataKategoriDinasLemburShifting as $key => $valueKategoriLemburShifting) : ?>
                                            <?php if ($key == 0) : ?>
                                                <tr>
                                                    <th><?= $number++; ?></th>
                                                    <td><?= $valueKategoriLemburShifting['id_kategori_dinas_crew']; ?></td>
                                                    <td><?= $valueKategoriLemburShifting['nama_kategori_dinas_crew']; ?></td>
                                                    <td>
                                                        <form action="<?= base_url() ?>admin/status-dinas-lembur-shifting/edit-kategori/<?= $valueKategoriLemburShifting['id_kategori_dinas_crew']; ?>" method="post">
                                                            <?= csrf_field(); ?>
                                                            <input type="hidden" name="_method" value="POST">
                                                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i>Edit</button>
                                                        </form>

                                                    </td>
                                                    <td>
                                                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-check"></i></button>
                                                    </td>

                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                        <?php foreach (array_slice($dataKategoriDinasLemburShifting, 1) as $valueKategoriLemburShifting) : ?>
                                            <?php if ($valueKategoriLemburShifting != null) : ?>
                                                <tr>
                                                    <th><?= $number++; ?></th>
                                                    <td><?= $valueKategoriLemburShifting['id_kategori_dinas_crew']; ?></td>
                                                    <td><?= $valueKategoriLemburShifting['nama_kategori_dinas_crew']; ?></td>
                                                    <td>
                                                        <form action="<?= base_url() ?>admin/status-dinas-lembur-shifting/edit-kategori/<?= $valueKategoriLemburShifting['id_kategori_dinas_crew']; ?>" method="post">
                                                            <?= csrf_field(); ?>
                                                            <input type="hidden" name="_method" value="POST">
                                                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i>Edit</button>
                                                        </form>

                                                    </td>
                                                    <td>
                                                        <form action="<?= base_url() ?>admin/status-dinas-lembur-shifting/delete-kategori/<?= $valueKategoriLemburShifting['id_kategori_dinas_crew']; ?>" method="post">
                                                            <?= csrf_field(); ?>
                                                            <input type="hidden" name="_method" value="POST">
                                                            <button type="submit" class="btn btn-danger hapusKategoriDinas"> <i class="fa-solid fa-trash"></i>Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <a href="<?= base_url("admin/status-dinas-lembur-shifting/kategori/create") ?>" class="btn btn-primary my-2">
                                    <i class="fa-solid fa-plus"></i> Tambah
                                </a>
                            </div>
                            <div class="tab-pane fade" id="acaraDinas">
                                <h3>Acara Dinas</h3>
                                <table id="tableDinallAcaraDinas" class="table table-bordered table-hover text-center align-middle" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Acara</th>
                                            <th>Acara</th>
                                            <th>Edit</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $number = 1; ?>
                                        <?php foreach ($dataAcaraDinasLemburShifting as $key => $valueAcara) : ?>
                                            <?php if ($key == 0) : ?>
                                                <tr>
                                                    <td><?= $number++; ?></td>
                                                    <td><?= $valueAcara['id_acara_shift']; ?></td>
                                                    <td><?= $valueAcara['nama_acara_shift']; ?></td>
                                                    <td>
                                                        <form action=" <?= base_url() ?>admin/status-dinas-lembur-shifting/edit-acara/<?= $valueAcara['id_acara_shift']; ?>" method="post">
                                                            <?= csrf_field(); ?>
                                                            <input type="hidden" name="_method" value="POST">
                                                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i>Edit</button>
                                                        </form>

                                                    </td>
                                                    <td>
                                                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-check"></i></button>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php foreach (array_slice($dataAcaraDinasLemburShifting, 1) as $valueAcara) : ?>
                                            <?php if ($valueAcara != null) : ?>
                                                <tr>
                                                    <td><?= $number++; ?></td>
                                                    <td><?= $valueAcara['id_acara_shift']; ?></td>
                                                    <td><?= $valueAcara['nama_acara_shift']; ?></td>
                                                    <td>
                                                        <form action=" <?= base_url() ?>admin/status-dinas-lembur-shifting/edit-acara/<?= $valueAcara['id_acara_shift']; ?>" method="post">
                                                            <?= csrf_field(); ?>
                                                            <input type="hidden" name="_method" value="POST">
                                                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i>Edit</button>
                                                        </form>

                                                    </td>
                                                    <td>
                                                        <form action="<?= base_url() ?>admin/status-dinas-lembur-shifting/delete-acara/<?= $valueAcara['id_acara_shift']; ?>" method="post">
                                                            <?= csrf_field(); ?>
                                                            <input type="hidden" name="_method" value="POST">
                                                            <button type="submit" class="btn btn-danger hapusAcaraDinas"> <i class="fa-solid fa-trash"></i>Hapus</button>
                                                        </form>

                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <a href="<?= base_url("admin/status-dinas-lembur-shifting/acara/create") ?>" class="btn btn-primary my-2">
                                    <i class="fa-solid fa-plus"></i> Tambah
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        </main>
        <?= $this->include('layout/footer'); ?>
    </div>
</div>
<?= $this->endSection('content'); ?>