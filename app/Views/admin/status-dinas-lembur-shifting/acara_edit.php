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
                <a href="<?= base_url("admin/status-dinas-lembur-shifting") ?>" class="btn btn-warning my-2">Kembali</a>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?= base_url(); ?>admin/status-dinas-lembur-shifting/acara_update/<?=$getIdAcara['id_acara_shift'];?>">
                            <div class="mb-3">
                                <label for="nama_acara_edit" class="form-label">Nama Acara</label>
                                <input type="tesx" class="form-control" id="nama_acara_edit" name="nama_acara_edit" value="<?=$getIdAcara['nama_acara_shift']?>" placeholder="tidak boleh kosong">
                                <div class="text-danger">
                                    <?= validation_show_error('nama_acara_edit'); ?>
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