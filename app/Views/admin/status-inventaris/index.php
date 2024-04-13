<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/nav_bar'); ?>
<div id="layoutSidenav">
    <?= $this->include('layout/side_bar'); ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <a href="<?= base_url(); ?>/admin/status-inventaris" class="btn btn-primary my-2">
                    <i class="fa-solid fa-arrows-rotate"></i> Refresh
                </a>
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
                <div class="card mb-4">

                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Tabel Status Inventaris
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <button class="nav-link active" id="ob-tab" data-bs-toggle="tab" data-bs-target="#jenisBarang" type="button" role="tab" aria-controls="jenisBarang" aria-selected="true">Jenis Barang</button>

                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="pemberi-tab" data-bs-toggle="tab" data-bs-target="#lokasi" type="button" role="tab" aria-controls="lokasi" aria-selected="true">Lokasi</button>

                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="penerima-tab" data-bs-toggle="tab" data-bs-target="#kondisi" type="button" role="tab" aria-controls="kondisi" aria-selected="true">Kondisi</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="penerima-tab" data-bs-toggle="tab" data-bs-target="#status" type="button" role="tab" aria-controls="status" aria-selected="true">Status</button>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane show active" id="jenisBarang">
                                <h3>Jenis Barang</h3>
                                <table id="dinallTableJenisBarang" class="table table-bordered table-hover text-center align-middle" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Kategori</th>
                                            <th>Nama Jenis Barang</th>
                                            <th>Edit</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $number = 1; ?>
                                        <?php foreach ($getDataBarang as $key => $valueJenisBarang) : ?>
                                            <?php if ($key == 0) : ?>
                                                <tr>
                                                    <th><?= $number++; ?></th>
                                                    <td><?= $valueJenisBarang['id_jns_barang']; ?></td>
                                                    <td><?= $valueJenisBarang['nama_jns_barang']; ?></td>
                                                    <td> 
                                                    <a href="<?= base_url() ?>admin/status-inventaris/edit-jenis-barang/<?= $valueJenisBarang['id_jns_barang']; ?>" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i>Edit</a>
                                                    </td>
                                                    <td>
                                                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-check"></i></button>
                                                    </td>

                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                        <?php foreach (array_slice($getDataBarang, 1) as $valueJenisBarang) : ?>
                                            <?php if ($valueJenisBarang != null) : ?>
                                                <tr>
                                                    <th><?= $number++; ?></th>
                                                    <td><?= $valueJenisBarang['id_jns_barang']; ?></td>
                                                    <td><?= $valueJenisBarang['nama_jns_barang']; ?></td>
                                                    <td>
                                                        <a href="<?= base_url() ?>admin/status-inventaris/edit-jenis-barang/<?= $valueJenisBarang['id_jns_barang']; ?>" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i>Edit</a>
                                                    </td>
                                                    <td>
                                                        <form action="<?= base_url() ?>admin/status-inventaris/hapus_jenis_barang/<?= $valueJenisBarang['id_jns_barang']; ?>" method="post">
                                                            <?= csrf_field(); ?>
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="btn btn-danger hapusStatusJenisBarang"> <i class="fa-solid fa-trash"></i>Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <a href="<?= base_url('admin/status-inventaris/create_jenis_barang'); ?>" class="btn btn-primary"><i class="fa-solid fa-plus"></i>Tambah</a>
                            </div>
                            <div class="tab-pane fade" id="lokasi">
                                <h3>Lokasi</h3>
                                <table id="dinallTableLokasi" class="table table-bordered table-hover text-center align-middle" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Lokasi</th>
                                            <th>Nama Lokasi</th>
                                            <th>Edit</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $number = 1; ?>
                                        <?php foreach ($getDataLokasi as $key => $valueLokasi) : ?>
                                            <?php if ($key == 0) : ?>
                                                <tr>
                                                    <th><?= $number++; ?></th>
                                                    <td><?= $valueLokasi['id_lokasi']; ?></td>
                                                    <td><?= $valueLokasi['nama_lokasi']; ?></td>
                                                    <td>
                                                        <a href="<?= base_url() ?>admin/status-inventaris/edit-nama-lokasi/<?= $valueLokasi['id_lokasi']; ?>" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i>Edit</a>
                                                    </td>
                                                    <td>
                                                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-check"></i></button>
                                                    </td>

                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                        <?php foreach (array_slice($getDataLokasi, 1) as $valueLokasi) : ?>
                                            <?php if ($valueLokasi != null) : ?>
                                                <tr>
                                                    <th><?= $number++; ?></th>
                                                    <td><?= $valueLokasi['id_lokasi']; ?></td>
                                                    <td><?= $valueLokasi['nama_lokasi']; ?></td>
                                                    <td>
                                                        <a href="<?= base_url() ?>admin/status-inventaris/edit-nama-lokasi/<?= $valueLokasi['id_lokasi']; ?>" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i>Edit</a>
                                                    </td>
                                                    <td>
                                                        <form action="<?= base_url() ?>admin/status-inventaris/hapus-nama-lokasi/<?= $valueLokasi['id_lokasi']; ?>" method="post">
                                                            <?= csrf_field(); ?>
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="btn btn-danger hapusNamaLokasi"> <i class="fa-solid fa-trash"></i>Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <a href="<?= base_url('admin/status-inventaris/create-nama-lokasi'); ?>" class="btn btn-primary"><i class="fa-solid fa-plus"></i>Tambah</a>
                            </div>
                            <div class="tab-pane fade" id="kondisi">
                                <h3>Kondisi</h3>
                                <table id="dinallTableKondisi" class="table table-bordered table-hover text-center align-middle" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Kondisi</th>
                                            <th>Nama Kondisi</th>
                                            <th>Edit</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $number = 1; ?>
                                        <?php foreach ($getDataKondisi as $key => $valueKondisi) : ?>
                                            <?php if ($key == 0) : ?>
                                                <tr>
                                                    <th><?= $number++; ?></th>
                                                    <td><?= $valueKondisi['id_kondisi']; ?></td>
                                                    <td><?= $valueKondisi['nama_kondisi']; ?></td>
                                                    <td>
                                                        <a href="<?= base_url() ?>admin/status-inventaris/edit-nama-kondisi/<?= $valueKondisi['id_kondisi']; ?>" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i>Edit</a>

                                                    </td>
                                                    <td>
                                                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-check"></i></button>
                                                    </td>

                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                        <?php foreach (array_slice($getDataKondisi, 1) as $valueKondisi) : ?>
                                            <?php if ($valueKondisi != null) : ?>
                                                <tr>
                                                    <th><?= $number++; ?></th>
                                                    <td><?= $valueKondisi['id_kondisi']; ?></td>
                                                    <td><?= $valueKondisi['nama_kondisi']; ?></td>
                                                    <td>
                                                        <a href="<?= base_url() ?>admin/status-inventaris/edit-nama-kondisi/<?= $valueKondisi['id_kondisi']; ?>" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i>Edit</a>
                                                    </td>
                                                    <td>
                                                        <form action="<?= base_url() ?>admin/status-inventaris/hapus-nama-kondisi/<?= $valueKondisi['id_kondisi']; ?>" method="post">
                                                            <?= csrf_field(); ?>
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="btn btn-danger hapusNamaKondisi"> <i class="fa-solid fa-trash"></i>Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <a href="<?= base_url() ?>admin/status-inventaris/create-nama-kondisi" class="btn btn-primary"><i class="fa-solid fa-plus"></i>Tambah</a>

                            </div>
                            <div class="tab-pane fade" id="status">
                                <h3>Status</h3>
                                <table id="dinallTableStatus" class="table table-bordered table-hover text-center align-middle" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Status</th>
                                            <th>Nama Status</th>
                                            <th>Edit</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $number = 1; ?>
                                        <?php foreach ($getDataStatus as $key => $valueStatus) : ?>
                                            <?php if ($key == 0) : ?>
                                                <tr>
                                                    <th><?= $number++; ?></th>
                                                    <td><?= $valueStatus['id_status']; ?></td>
                                                    <td><?= $valueStatus['nama_status']; ?></td>
                                                    <td>
                                                        <a href="<?= base_url() ?>admin/status-inventaris/edit-nama-status/<?= $valueStatus['id_status']; ?>" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i>Edit</a>
                                                    </td>
                                                    <td>
                                                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-check"></i></button>
                                                    </td>

                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                        <?php foreach (array_slice($getDataStatus, 1) as $valueStatus) : ?>
                                            <?php if ($valueStatus != null) : ?>
                                                <tr>
                                                    <th><?= $number++; ?></th>
                                                    <td><?= $valueStatus['id_status']; ?></td>
                                                    <td><?= $valueStatus['nama_status']; ?></td>
                                                    <td>
                                                        <a href="<?= base_url() ?>admin/status-inventaris/edit-nama-status/<?= $valueStatus['id_status']; ?>" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i>Edit</a>
                                                    </td>
                                                    <td>
                                                        <form action="<?= base_url() ?>admin/status-inventaris/hapus-nama-status/<?= $valueStatus['id_status']; ?>" method="post">
                                                            <?= csrf_field(); ?>
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="btn btn-danger hapusNamaStatus"> <i class="fa-solid fa-trash"></i>Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <a href="<?= base_url() ?>admin/status-inventaris/create-nama-status" class="btn btn-primary"><i class="fa-solid fa-plus"></i>Tambah</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?= $this->include('layout/footer'); ?>
    </div>
</div>
<?= $this->endSection('content'); ?>