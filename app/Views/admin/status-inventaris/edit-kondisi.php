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
                <a href="<?= base_url("admin/status-inventaris") ?>" class="btn btn-warning my-2">Kembali</a>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?= base_url(); ?>admin/status-inventaris/update-nama-kondisi/<?= $getDataIdNamaKondisi['id_kondisi']; ?>">
                            <div class="mb-3">
                                <label for="nama_kondisi" class="form-label">Nama Kondisi</label>
                                <input type="tesx" class="form-control" id="nama_kondisi" name="nama_kondisi" value="<?= $getDataIdNamaKondisi['nama_kondisi']; ?>" placeholder="tidak boleh kosong">

                                <div class="text-danger">
                                    <?= validation_show_error('nama_kondisi'); ?>
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