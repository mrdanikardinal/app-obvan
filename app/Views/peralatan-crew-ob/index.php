<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/nav_bar'); ?>
<div id="layoutSidenav">
    <?= $this->include('layout/side_bar'); ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <?php 
                $befofePageOn=$_SERVER['HTTP_REFERER'];
                //valueref:http://localhost:8080/out-broadcast
                
                $targetOutBroadcast= base_url().'out-broadcast';
                ?>
                <a href="<?=($befofePageOn===$targetOutBroadcast) ? base_url("out-broadcast") : base_url("surat-tugas") ?>" class="btn btn-warning my-2">Kembali</a>

                <form action="<?= base_url() ?>user/peralatan_out_broadcast/preview/<?= $getIDOB; ?>" method="post" class="d-inline">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="PUT">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-eye"></i>Preview</button>
                </form>

                <form action="<?= base_url() ?>user/peralatan_out_broadcast/download/<?= $getIDOB; ?>" method="post" class="d-inline">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="PUT">
                    <button type="submit" class="btn btn-success"><i class="fa-solid fa-download"></i>Download</button>
                </form>



                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                    </div>
                    <div id="card-body-AlatOBTable" class="card-body">
                        <table id="AlatOBTable" class="table table-bordered table-hover text-center align-middle" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama Barang</th>
                                    <th class="text-center">Merk</th>
                                    <th class="text-center">Serial Number</th>
                                    <th class="text-center">Jumlah</th>
                                </tr>
                            </thead>
                            <?php
                            $number2 = 1;
                            ?>
                            <input type="hidden" class="test" value="">
                            <tbody>
                                <?php foreach ($allDataCrewOB as $key => $valueShowBroadcast) : ?>
                                    <tr>
                                        <th><?= $number2++; ?></th>
                                        <td><?= $valueShowBroadcast['nama_barang']; ?></td>
                                        <td><?= $valueShowBroadcast['merk']; ?></td>
                                        <td><?= $valueShowBroadcast['serial_number']; ?></td>
                                        <td><?= $valueShowBroadcast['jumlah']; ?></td>
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