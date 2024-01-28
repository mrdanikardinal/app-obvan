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
                <a href="<?= base_url("/out-broadcast/create") ?>" class="btn btn-primary my-2">Tambah</a>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Tabel Data Out Broadcast
                    </div>
                    <div class="card-body">
                        <table id="dinallTableOB" class="table table-bordered table-hover text-center align-middle">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Kategori</th>
                                    <th>Tanggal</th>
                                    <th>Sampai Dengan</th>
                                    <th>Acara</th>
                                    <th>lokasi</th>
                                    <th>Technical Producer(TP)</th>
                                    <th>Technical Director (TD)</th>
                                    <th>Assistant.TD</th>
                                    <th>Unit Manager</th>
                                    <th>Edit</th>
                                    <?php if (in_groups('admin')) : ?>
                                        <th>Hapus</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $number = 1; ?>
                                <?php foreach ($allShowOutBroadcast as $key => $valueShowBroadcast) : ?>
                                    <?php $convert = $valueShowBroadcast['tanggal'];
                                    $date = str_replace('/', '-', $convert);
                                    $tanggalconvert = date('d/m/Y', strtotime($date));
                                    ?>
                                    <?php if($valueShowBroadcast['sampai_dengan']!==null):?>
                                    <?php $convert2 = $valueShowBroadcast['sampai_dengan'];
                                    $date = str_replace('/', '-', $convert2);
                                    $convert_sampai_dengan = date('d/m/Y', strtotime($date));
                                    ?>
                                    <?php elseif($valueShowBroadcast['sampai_dengan']==null): ?>
                                    <?php $convert_sampai_dengan= '-' ?>
                                    <?php endif; ?>
                                    <tr>
                                        <th><?= $number++; ?></th>
                                        <td><?= $valueShowBroadcast['id_ob']; ?></td>
                                        <td><?= $valueShowBroadcast['kategori']; ?></td>
                                        <td><?= $tanggalconvert; ?></td>
                                        <td><?= $convert_sampai_dengan; ?></td>
                                        <td><?= $valueShowBroadcast['acara']; ?></td>
                                        <td><?= $valueShowBroadcast['lokasi']; ?></td>
                                        <td><?= $valueShowBroadcast['tp']; ?></td>
                                        <td><?= $valueShowBroadcast['td']; ?></td>
                                        <td><?= $valueShowBroadcast['ass_td']; ?></td>
                                        <td><?= $valueShowBroadcast['um']; ?> </td>

                                        <td>
                                            <form action="<?= base_url() ?>out-broadcast/edit/<?= $valueShowBroadcast['id_ob']; ?>" method="post">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="PUT">
                                                <button type="submit" class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i>Edit</button>
                                            </form>
                                        </td>
                                        <?php if (in_groups('admin')) : ?>
                                            <td>
                                                <form id="hapus" action="<?= base_url() ?>out-broadcast/<?= $valueShowBroadcast['id_ob']; ?>" method="post">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger hapusOB"><i class="fa-solid fa-trash"></i>Hapus</button>
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
    </div>
    <?= $this->include('layout/footer'); ?>
</div>
<?= $this->endSection('content'); ?>