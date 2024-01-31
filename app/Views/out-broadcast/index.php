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
                                    <th>Crew Dinas</th>
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
                                    <tr>
                                        <th><?= $number++; ?></th>
                                        <td><?= $valueShowBroadcast['id_ob']; ?></td>
                                        <td><?= $valueShowBroadcast['nama_kategori']; ?></td>
                                        <td>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th class="text-center">Nama Crew</th>
                                                </tr>
                                                <?php $number2 = 1; ?>
                                                <?php foreach ($allDataOutBroadcast as $j) : ?>
                                                    <?php if ($valueShowBroadcast['id_ob'] == $j['id_ob']) : ?>
                                                        <tr>
                                                            <th><?= $number2++; ?></th>
                                                            <td class="text-center">
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
                                            <button type="submit" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-eye"></i>View Peralatan</button>

                                        </td>
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


        <!-- start modal -->
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Peralatan Digunakan OB</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Barang</th>
                                <th class="text-center">Merk</th>
                                <th class="text-center">Serial Number</th>
                                <th class="text-center">Jumlah</th>
                            </tr>
                            <?php $number2 = 1; ?>
                 
                            <?php foreach ($allAlatOB as $l) : ?>

                                <?php if (20 == $l['id_ob']) : ?>
                                    <?php foreach ($allInventaris as $m) : ?>
                                        <?php if ($l['id_inv'] == $m['id_inv']) : ?>
                                            <tr>
                                                <th><?= $number2++; ?></th>
                                                <td><?= $m['nama_barang']; ?></td>
                                                <td><?= $m['merk']; ?></td>
                                                <td><?= $m['serial_number']; ?></td>
                                                <td><?= $l['jumlah']; ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                         

                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                     
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal modal -->
        <?= $this->include('layout/footer'); ?>
    </div>
</div>
<?= $this->endSection('content'); ?>