<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/nav_bar'); ?>
<div id="layoutSidenav">
    <?= $this->include('layout/side_bar'); ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h5 class="mt-4">

                </h5>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        <?= $title ?>
                    </div>
                    <div class="card-body">

                        <form id="formAdd" method="post" action="<?= base_url("/inventaris/save"); ?>" class="needs-validation" novalidate>

                            <?= csrf_field(); ?>

                            <div class="row mb-3">
                                <label for="tanggal" class="col-sm-2 col-form-label">Nama Barang</label>
                                <div class="col-sm-10">
                                    <input type="text" required class="form-control" placeholder="Nama Barang" id="nama_barang" name="nama_barang" value="<?= old('nama_barang'); ?>">

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="sampai_dengan" class="col-sm-2 col-form-label">Merk</label>
                                <div class="col-sm-10">
                                    <input type="text" required class="form-control" placeholder="Merk" id="merk" name="merk" value="<?= old('merk'); ?>">

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="noHPPeminjam" class="col-sm-2 col-form-label">Serial Number</label>
                                <div class="col-sm-10">
                                    <input type="text" required class="form-control " placeholder="Serial Number" id="serial_number" name="serial_number" value="<?= old('serial_number'); ?>">
                                    <div class="text-danger">

                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nama_pemberi" class="col-sm-2 col-form-label">Jumlah</label>
                                <div class="col-sm-10">
                                    <input type="text" required class="form-control" placeholder="Jumlah" id="jumlah" name="jumlah" value="<?= old('jumlah'); ?>">

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nama_pemberi" class="col-sm-2 col-form-label">Tahun Pengadaan</label>
                                <div class="col-sm-10">
                                    <input type="text" required class="form-control" placeholder="Tahun Pengadaan" id="tahun_pengadaan" name="tahun_pengadaan" value="<?= old('tahun_pengadaan'); ?>">

                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>

                    </div>
                </div>
            </div>

        </main>

        <?= $this->include('layout/footer'); ?>


    </div>
</div>
<?= $this->endSection('content'); ?>