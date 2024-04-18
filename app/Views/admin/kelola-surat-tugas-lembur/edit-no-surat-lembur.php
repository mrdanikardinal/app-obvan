

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
                <a href="<?= base_url("admin/kelola-surat-tugas-lembur") ?>" class="btn btn-warning my-2">Kembali</a>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?= base_url(); ?>admin/kelola-surat-tugas-lembur/update-lembur/<?=$getIdDataLembur['id_dinas_shifting'];?>">
                            <div class="mb-3">
                                <label for="no_surat_lembur" class="form-label">Nomor surat</label>
                                <input type="tesx" class="form-control" id="no_surat_lembur" name="no_surat_lembur" placeholder="tidak boleh kosong" value="<?=$getIdDataLembur['nomor_surat_lembur'];?>">
                                <div class="text-danger">
                                    <?= validation_show_error('no_surat_lembur'); ?>
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
