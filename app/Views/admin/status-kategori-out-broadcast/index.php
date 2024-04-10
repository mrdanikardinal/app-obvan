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
                </h5>
                <a href="<?= base_url("admin/status-kategori-out-broadcast/create") ?>" class="btn btn-primary my-2">Tambah</a>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>

                    </div>
                    <div id="card-body-inventarisTable" class="card-body">
                        <table id="dinallTableStatusKategoriOB" class="table table-bordered table-hover text-center align-middle" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Kategori OB</th>
                                    <th>Nama Kategori</th>
                                    <th>Edit</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $number = 1; ?>
                                <?php foreach ($allDataKategoriOB as $key => $valueDataKategoriOB) : ?>
                                    <?php if ($key == 0) : ?>
                                        <tr>
                                            <th><?= $number++; ?></th>
                                            <td><?= $valueDataKategoriOB['id']; ?></td>
                                            <td><?= $valueDataKategoriOB['nama_kategori']; ?></td>
                                            <td>
                                                <form action="<?= base_url() ?>admin/status-kategori-out-broadcast/edit/<?= $valueDataKategoriOB['id']; ?>" method="post">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="POST">
                                                    <button type="submit" class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i>Edit</button>
                                                </form>

                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-success"><i class="fa-solid fa-check"></i></button>

                                            </td>

                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <?php foreach (array_slice($allDataKategoriOB, 1) as $valueDataKategoriOB) : ?>
                                    <?php if ($valueDataKategoriOB != null) : ?>
                                        <tr>
                                            <th><?= $number++; ?></th>
                                            <td><?= $valueDataKategoriOB['id']; ?></td>
                                            <td><?= $valueDataKategoriOB['nama_kategori']; ?></td>
                                            <td>
                                                <form action="<?= base_url(); ?>admin/status-kategori-out-broadcast/edit/<?= $valueDataKategoriOB['id']; ?>" method="post">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="POST">
                                                    <button type="submit" class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i>Edit</button>
                                                </form>

                                            </td>
                                            <td>
                                                <form id="hapus" action="<?= base_url(); ?>admin/status-kategori-out-broadcast/<?= $valueDataKategoriOB['id']; ?>" method="post">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="delete">
                                                    <button type="submit" class="btn btn-danger hapusStatusKatOB"><i class="fa-solid fa-trash"></i>Hapus</button>
                                                </form>
                                            </td>

                                        </tr>
                                    <?php endif; ?>
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